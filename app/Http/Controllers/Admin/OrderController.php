<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function newOrder()
    {
        $order = DB::table('orders')->where('status',0)->get();
        
        return view('admin.order.pending', compact('order'));        
    }

    public function viewOrder($id)
    {
        $order = DB::table('orders')
                    ->join('users','orders.user_id','users.id')
                    ->select('orders.*','users.name','users.phone')
                    ->where('orders.id',$id)
                    ->first();

        $shipping = DB::table('shipping')->where('order_id',$id)->first();

        $details = DB::table('orders_details')
                        ->join('products','orders_details.product_id','products.id')
                        ->select('orders_details.*','products.product_code','products.image_one')
                        ->where('orders_details.order_id',$id)
                        ->get();

        return view('admin.order.view_order', compact('order','shipping','details'));
    }   

    public function paymentAccept($id)
    {
     
        $product = DB::table('orders_details')->where('order_id', $id)->get();

        foreach($product as $row){

            //qty is quantity of product in stock
            //row->qunatity is quantity of order
            $qty = DB::table('products')->where('id',$row->product_id)->first();

            if ($qty->product_quantity < $row->quantity) {
                
                DB::table('orders')->where('id',$id)->update(['status' => 4]);

                $notification = array(
                    'message' => 'Order Denied, Quantity Not Available',
                    'alert-type' => 'error',
                );

                return Redirect()->route('admin.neworder')->with($notification);
            }
        }

        DB::table('orders')->where('id',$id)->update(['status' => 1]);

        $notification = array(
            'message' => 'Payment Accerpted',
            'alert-type' => 'success',
        );

        return Redirect()->route('admin.neworder')->with($notification);

    }

    public function paymentCancel($id)
    {
        DB::table('orders')->where('id',$id)->update(['status' => 4]);

        $notification = array(
            'message' => 'Order Cancelled',
            'alert-type' => 'danger',
        );

        return Redirect()->route('admin.neworder')->with($notification);
    }
    
    public function accepted()
    {
        $order = DB::table('orders')->where('status',1)->get();

        return view('admin.order.pending', compact('order'));
    }
    
    public function cancel()
    {
        $order = DB::table('orders')->where('status',4)->get();

        return view('admin.order.pending', compact('order'));
    }

    public function process()
    {
        $order = DB::table('orders')->where('status',2)->get();

        return view('admin.order.pending', compact('order'));
    }

    public function success()
    {
        $order = DB::table('orders')->where('status',3)->get();

        return view('admin.order.pending', compact('order'));
    }


    public function delivery($id)
    {
        DB::table('orders')->where('id',$id)->update(['status' => 2]);

        $notification = array(
            'message' => 'Starting Delivery',
            'alert-type' => 'success',
        );

        return Redirect()->route('admin.accept.payment')->with($notification);
    }


    public function done($id)
    {

        $product = DB::table('orders_details')->where('order_id', $id)->get();

        foreach($product as $row){
            DB::table('products')
                    ->where('id',$row->product_id)
                    ->update(['product_quantity' => DB::raw('product_quantity-'.$row->quantity)]);

        }

        DB::table('orders')->where('id',$id)->update(['status' => 3]);

        $notification = array(
            'message' => 'Product Marked As Delivered',
            'alert-type' => 'success',
        );

        return Redirect()->route('admin.success.payment')->with($notification);
    }
}
