<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SettingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function siteSetting()
    {
        $setting = DB::table('sitesetting')->first();

        return view('admin.setting.site_setting', compact('setting'));
    }

    public function updateSetting(Request $request)
    {
        $id = $request->id;

        $data = array();

        $data['phone_one'] = $request->phone_one;
        $data['phone_two'] = $request->phone_two;
        $data['email'] = $request->email;
        $data['company_name'] = $request->company_name;
        $data['company_address'] = $request->company_address;

        if ($request->facebook == NULL) {
            $data['facebook'] = '';
        }else{
            $data['facebook'] = $request->facebook;
        }
        
        if ($request->youtube == NULL) {
            $data['youtube'] = '';
        }else{
            $data['youtube'] = $request->youtube;
        }

        if ($request->instagram == NULL) {
            $data['instagram'] = '';
        }else{
            $data['instagram'] = $request->instagram;
        }

        if ($request->twitter == NULL) {
            $data['twitter'] = '';
        }else{
            $data['twitter'] = $request->twitter;
        }
        
        DB::table('sitesetting')->where('id',$id)->update($data);

        $notification = array(
                'message' => 'Site Settings Updated Successfully',
                'alert-type' => 'success'
        );
        
        return redirect('admin/home')->with($notification);
    }
}
