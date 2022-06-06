<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;


class SeoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function seo()
    {
        $seo = DB::table('seo')->first();
        return view('admin.coupon.seo', compact('seo'));

    }

    public function update(Request $request)
    {
        $data = array();

        $data['meta_title'] = $request->meta_title;
        $data['meta_author'] = $request->meta_author;
        $data['meta_tag'] = $request->meta_tag;
        $data['meta_description'] = $request->meta_description;
        $data['google_analytics'] = $request->google_analytics;
        $data['bing_analytics'] = $request->bing_analytics;

        DB::table('seo')->where('id',$request->id)->Update($data);

        $notification = array(
            'message' => 'SEO Updated successfully',
            'alert-type' => 'success',
        );

        return redirect('admin/home')->with($notification);
    }
}
