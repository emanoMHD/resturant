<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function coupon()
    {
        $coupon = DB::table('coupons')->get();
        return view('admin.coupon.coupon', compact('coupon'));
    }

    public function storeCoupon(Request $request)
    {
           $userId =  Auth::user()->id;
        $data = array();
        $data['coupon'] = $request->coupon;
        $data['discount'] = $request->discount;
          $data['user_id'] =$userId;
        DB::table('coupons')->insert($data);

        $notification = array(
            'message' => 'coupon added successfully!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function deleteCoupon($id)
    {
        DB::table('coupons')->where('id', $id)->delete();
        $notification = array(
            'message' => 'coupon deleted successfully!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function editCoupon($id)
    {
        $coupon = DB::table('coupons')->where('id', $id)->first();
        return view('admin.coupon.edit_coupon', compact('coupon'));
    }

    public function updateCoupon(Request $request, $id)
    {
        $data = array();
        $data['coupon'] = $request->coupon;
        $data['discount'] = $request->discount;
        DB::table('coupons')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'coupon updated successfully!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.coupon')->with($notification);
    }

    public function newsletter()
    {
        $sub = DB::table('newsletters')->get();
        return view('admin.coupon.newsletter', compact('sub'));
    }

    public function deleteSubscriber($id)
    {
        DB::table('newsletters')->where('id', $id)->delete();
        $notification = array(
            'message' => 'subscriber deleted successfully!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }


}
