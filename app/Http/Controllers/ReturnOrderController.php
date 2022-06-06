<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class ReturnOrderController extends Controller
{
    public function returnOrder()
    {
        $order = DB::table('orders')->where('user_id',Auth::id())->where('status',3)->orderBy('id','DESC')
            ->limit(5)->get();

        return view('pages.returnorder',compact('order'));
    }
    
    public function returnRequest($id)
    {
        DB::table('orders')->where('id',$id)->update(['return_order' => 1]);

        $notification = array(
        'message'=>'Return Order Has Been Registered.',
        'alert-type'=>'success'
        );

        return Redirect()->back()->with($notification);
    }
}
