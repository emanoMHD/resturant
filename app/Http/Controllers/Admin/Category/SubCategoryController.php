<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function subcategory()
    {
        $category = DB::table('categories')->get();
        $subcat = DB::table('subcategories')
            ->join('categories', 'subcategories.category_id', 'categories.id')
            ->select('subcategories.*', 'categories.category_name')
            ->get();

        return view('admin.category.subcategory', compact('category', 'subcat'));
    }

    public function storeSubCat(Request $request)
    {
        $validateData = $request->validate([
           'category_id' => 'required',
           'subcategory_name' => 'required',
        ]);

        $data = array();
        $data['category_id'] = $request->category_id;
        $data['subcategory_name'] = $request->subcategory_name;
        DB::table('subcategories')->insert($data);
        $notification = array(
            'message' => 'sub category inserted successfully!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function deleteSubCat($id)
    {
        DB::table('subcategories')->where('id', $id)->delete();
        $notification = array(
            'message' => 'sub category deleted successfully!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function editSubCat($id)
    {
        $subcat = DB::table('subcategories')->where('id', $id)->first();
        $category = DB::table('categories')->get();
        return view('admin.category.edit_subcat', compact('subcat', 'category'));
    }

    public function updateSubCat(Request $request, $id)
    {
        $data = array();
        $data['category_id'] = $request->category_id;
        $data['subcategory_name'] = $request->subcategory_name;
        DB::table('subcategories')->where('id', $id)->update($data);
        $notification = array(
            'message' => 'sub category updated successfully!',
            'alert-type' => 'success',
        );
        return redirect()->route('sub.categories')->with($notification);
    }
}
