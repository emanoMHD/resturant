<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Models\Admin\Brand;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function brand()
    {
        $brand = Brand::all();
        return view('admin.category.brand', compact('brand'));
    }


    public function storeBrand(Request $request)
    {
        $validate = $request->validate([
            'brand_name' => 'required|unique:brands|max:55',
        ]);
        $userId =  Auth::user()->id;

        $data = array();
        $data['brand_name'] = $request->brand_name;
          $data['user_id'] =   $userId;
        $image = $request->file('brand_logo');

        if ($image) {
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public\media\brand';
            $image_url = $upload_path . '\\' . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            $data['brand_logo'] = $image_url;
            $brand = DB::table('brands')->insert($data);
            $notification = array(
                'message' => 'Brand Added successfully!',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
        }else{
            $brand = DB::table('brands')->insert($data);
            $notification = array(
                'message' => 'it\'s DONE',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);

        }
    }

    public function deleteBrand($id)
    {
        $data = DB::table('brands')->where('id', $id)->first();
        $image = $data->brand_logo;
        unlink($image);

        $brand = DB::table('brands')->where('id', $id)->delete();
        $notification = array(
            'message' => 'brand Deleted successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);

    }

    public function editBrand( $id)
    {
        $brand = DB::table('brands')->where('id', $id)->first();
        return view('admin.category.edit_brand', compact('brand'));
    }

    public function updateBrand(Request $request, $id)
    {
        $old_logo = $request->old_logo;

        $data = array();
        $data['brand_name'] = $request->brand_name;
        $image = $request->file('brand_logo');

        if ($image) {
            unlink($old_logo);
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public\media\brand';
            $image_url = $upload_path . '\\' . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            $data['brand_logo'] = $image_url;
            $brand = DB::table('brands')->where('id', $id)->update($data);
            $notification = array(
                'message' => 'Brand Updated successfully!',
                'alert-type' => 'success',
            );
            return redirect()->route('brands')->with($notification);
        }else{
            $brand = DB::table('brands')->where('id', $id)->update($data);
            $notification = array(
                'message' => 'updated without image',
                'alert-type' => 'success',
            );
            return redirect()->route('brands')->with($notification);

        }
    }
}
