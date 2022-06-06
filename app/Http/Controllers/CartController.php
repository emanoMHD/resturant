<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;  
use Response;
use Auth;
use Session;

class CartController extends Controller
{
    public function addCart($id)
    { if(Auth::check()){
        $product = DB::table('products')->where('id',$id)->first(); 

        $data = array();

        if ($product->discount_price == NULL) {

            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = 1;
            $data['price'] = $product->selling_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = '';
            $data['options']['size'] = '';

            Cart::add($data);

            return response()->json(['success' => 'Product Has Been Added To Cart']);

        }else{

            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = 1;
            $data['price'] = $product->discount_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = '';
            $data['options']['size'] = '';

            Cart::add($data);

            return response()->json(['success' => 'Product Has Been Added To Cart']);
        }}
    }

    public function check()
    {
        $content = Cart::content();

        return response()->json($content);

    }

    public function showCart()
    { if(Auth::check()){
        $cart = Cart::content();
        return view('pages.cart', compact('cart'));

    }
else
return Redirect()->back();
}

    public function removeCart($rowId)
    {
        Cart::remove($rowId);

        $notification = array(
            'message' => 'Product removed from Cart',
            'alert-type' => 'success',
        );

        return Redirect()->back()->with($notification);

    }

    public function updateCart(Request $request)
    {
        $rowId = $request->productid;

        $qty = $request->qty;

        Cart::update($rowId, $qty);

        $notification = array(
            'message' => 'Product quantity updated',
            'alert-type' => 'success',
        );

        return Redirect()->back()->with($notification);
    }

    public function viewProduct($id)
    {
        $product = DB::table('products')
                    ->join('categories','products.category_id','categories.id')
                    ->join('subcategories','products.subcategory_id','subcategories.id')
                   
                    ->select('products.*','categories.category_name','subcategories.subcategory_name'
                    )
                    ->where('products.id',$id)
                    ->first();
        // return response()->json($product);

        $color = $product->product_color;
        $product_color = explode(',',$color);

        $size = $product->product_size;
        $product_size = explode(',',$size);


        return Response::json(array(
            'product' => $product,
            'color' => $product_color,
            'size' => $product_size,
        ));

    }

    public function insertCart(Request $request)
    {
        $id = $request->product_id;
        
        $product = DB::table('products')->where('id',$id)->first(); 

        $color = $request->color;
        $size = $request->size;
        $qty = $request->qty;

        $data = array();

        if ($product->discount_price == NULL) {

            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = $qty;
            $data['price'] = $product->selling_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = $color;
            $data['options']['size'] = $size;

            Cart::add($data);

            $notification = array(
            'message' => 'Product added successfully to cart',
            'alert-type' => 'success',
            );

            return Redirect()->back()->with($notification);

        }else{

            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = $qty;
            $data['price'] = $product->discount_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = $color;
            $data['options']['size'] = $size;

            Cart::add($data);

            $notification = array(
            'message' => 'Product added successfully to cart',
            'alert-type' => 'success',
            );

            return Redirect()->back()->with($notification);
        }

    }

    public function checkout()
    {
        if(Auth::check()){

            $cart = Cart::content();
            return view('pages.checkout', compact('cart'));

        }else{

            $notification = array(
            'message' => 'Please Login in first',
            'alert-type' => 'error',
            );

            return Redirect()->route('login')->with($notification);  
        }
    }

    public function wishlist()
    {
        $userid = Auth::id();

        $product = DB::table('wishlists')
                        ->join('products','wishlists.product_id','products.id')
                        ->select('products.*','wishlists.user_id')
                        ->where('wishlists.user_id',$userid)
                        ->get();

        return view('pages.wishlist', compact('product'));        

    }

    public function coupon(Request $request)
    {
        $coupon = $request->coupon;

        $check = DB::table('coupons')->where('coupon', $coupon)->first();

        if($check){
            Session::put('coupon',[
                'name' => $check->coupon,
                'discount' => $check->discount,
                'balance' => Cart::Subtotal()-$check->discount,

            ]);

            $notification = array(
            'message' => 'coupon applied successfully',
            'alert-type' => 'success',
            );

            return Redirect()->back()->with($notification);  


        }else{
            $notification = array(
            'message' => 'Invalid Coupon',
            'alert-type' => 'error',
            );

            return Redirect()->back()->with($notification); 

        }
    }

    public function couponRemove()
    {
        Session::forget('coupon');

        $notification = array(
            'message' => 'Coupon Removed Successfully',
            'alert-type' => 'success',
            );

        return Redirect()->back()->with($notification); 
    }

    public function paymentPage()
    {
        $cart = Cart::content();

        return view('pages.payment', compact('cart'));
    }

}
