<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use DB;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $user=new User();

        if(Auth::user()->user_type=="user")
        return view('home');
        else
        return view('dealer.dashboard');
        
    }

    public function changePassword(){
        return view('auth.changepassword');
    }

    public function updatePassword(Request $request)
    {
        $password=Auth::user()->password;
        $oldpass=$request->oldpass;
        $newpass=$request->password;
        $confirm=$request->password_confirmation;
        if (Hash::check($oldpass,$password)) {
            if ($newpass === $confirm) {
                $user=User::find(Auth::id());
                $user->password=Hash::make($request->password);
                $user->save();
                Auth::logout();
                $notification=array(
                    'message'=>'Password Changed Successfully!',
                    'alert-type'=>'success'
                );
                return Redirect()->route('login')->with($notification);
            }else{
                $notification=array(
                    'message'=>'New password and Confirm Password Do Not Match!',
                    'alert-type'=>'error'
                );
                return Redirect()->back()->with($notification);
            }
        }else{
            $notification=array(
                'message'=>'Old Password Does Not Match!',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }

    }

    public function Logout()
    {
        // $logout= Auth::logout();
        Auth::logout();
        $notification=array(
            'message'=>'Logged Out',
            'alert-type'=>'success'
        );
        return Redirect()->route('login')->with($notification);


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

        return view('pages.view_order', compact('order','shipping','details'));
    }

}
