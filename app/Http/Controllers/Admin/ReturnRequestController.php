<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ReturnRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function returnRequest()
    {
        $order = DB::table('orders')->where('return_order',1)->get();

        return view('admin.return.request',compact('order'));
    }

    public function approveReturn($id)
    {
        DB::Table('orders')->where('id',$id)->update(['return_order' => 2]);

        $notification = array(
            'message'=>'Return Request Approved Successfully.',
            'alert-type'=>'success'
        );

        return Redirect()->back()->with($notification);
    }

    public function denyReturn($id)
    {
        DB::Table('orders')->where('id',$id)->update(['return_order' => 3]);

        $notification = array(
            'message'=>'Return Request Denied.',
            'alert-type'=>'success'
        );

        return Redirect()->back()->with($notification);
    }

    public function allRequests()
    {
        $order = DB::table('orders')->whereIn('return_order',[2,3])->get();

        return view('admin.return.all', compact('order'));
    }
}
