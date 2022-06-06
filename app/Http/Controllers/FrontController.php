<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class FrontController extends Controller
{
    public function storeNewsletter(Request $request)
    {
        $validateData = $request->validate([
           'email' => 'required|unique:newsletters|max:55'
        ]);

        $data = array();
        $data['email'] = $request->email;
        DB::table('newsletters')->insert($data);

        $notification = array(
            'message' => 'Thank you for subscribing!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function orderTracking(Request $request)
    {
        $code = $request->code;

        $track = DB::table('orders')->where('status_code',$code)->first();

        if ($track) {

            // echo "<pre>";
            // print_r($track);
            return view('pages.tracking', compact('track'));

        }else{
            $notification = array(
            'message' => 'Invalid Status Code!!',
            'alert-type' => 'error',
            );
            return redirect()->back()->with($notification);
        }
    }
}
