<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;

class UserRoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function userRole()
    {
        $user = DB::table('admins')->where('type',2)->get();

        return view('admin.role.all_role', compact('user'));
    }

    public function createUser()
    {
        return view('admin.role.create_role');
    }

    public function storeUser(Request $request)
    {

        $data = array();

        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['category'] = $request->category;
        $data['coupon'] = $request->coupon;
        $data['product'] = $request->product;
        $data['blog'] = $request->blog;
        $data['order'] = $request->order;
        $data['other'] = $request->other;
        $data['report'] = $request->report;
        $data['role'] = $request->role;
        $data['return'] = $request->return;
        $data['contact'] = $request->contact;
        $data['comment'] = $request->comment;
        $data['setting'] = $request->setting;
        $data['stock'] = $request->stock;
        $data['type'] = 2;

        DB::table('admins')->insert($data);

        $notification=array(
            'message'=>'Moderator Inserted Successfully',
            'alert-type'=>'success'
        ); 

        return Redirect()->back()->with($notification);   
    }

    public function deleteUser($id)
    {
        DB::table('admins')->where('id',$id)->delete();

        $notification=array(
            'message'=>'Moderator Deleted Successfully',
            'alert-type'=>'success'
        ); 

        return Redirect()->back()->with($notification);

    }

    public function editUser($id)
    {
        $user = DB::table('admins')->where('id',$id)->first();

        return view('admin.role.edit_role', compact('user'));
    }

    public function updateUser(Request $request)
    {
        $id = $request->id;

        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['category'] = $request->category;
        $data['coupon'] = $request->coupon;
        $data['product'] = $request->product;
        $data['blog'] = $request->blog;
        $data['order'] = $request->order;
        $data['other'] = $request->other;
        $data['report'] = $request->report;
        $data['role'] = $request->role;
        $data['return'] = $request->return;
        $data['contact'] = $request->contact;
        $data['comment'] = $request->comment;
        $data['setting'] = $request->setting;
        $data['stock'] = $request->stock;

        DB::table('admins')->where('id',$id)->update($data);

        $notification=array(
            'message'=>'Moderator Updated Successfully',
            'alert-type'=>'success'
        ); 

        return Redirect()->route('admin.all.user')->with($notification);   

    }
}
