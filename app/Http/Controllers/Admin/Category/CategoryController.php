<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Models\Admin\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function category()
    {
        $category = Category::all();

        return view('admin.category.category', compact('category'));
    }

    public function storeCategory(Request $request)
    {
        $validate = $request->validate([
           'category_name' => 'required|unique:categories|max:255',
        ]);

        //inserting data using query builder
//        $data = array();
//        $data['category_name'] = $request->category_name;
//        DB::table('categories')->insert($data);

        //inserting data using eloquent model
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->save();


        $notification = array(
            'message' => 'category added successfully!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function deleteCategory($id)
    {
        DB::table('categories')->where('id', $id)->delete();
        $notification = array(
            'message' => 'category deleted successfully!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);

    }

    public function editCategory($id)
    {
        $category = DB::table('categories')->where('id', $id)->first();
        return view('admin.category.edit_category', compact('category'));

    }

    public function updateCategory(Request $request, $id)
    {
        $validate = $request->validate([
            'category_name' => 'required|max:255',
        ]);

        $data = array();
        $data['category_name'] = $request->category_name;
        $update = DB::table('categories')->where('id', $id)->update($data);

        if ($update) {
            $notification = array(
                'message' => 'category updated successfully!',
                'alert-type' => 'success',
            );
            return redirect()->route('categories')->with($notification);
        }else{
            $notification = array(
                'message' => 'Nothing to update!',
                'alert-type' => 'error',
            );
            return redirect()->route('categories')->with($notification);
        }
    }
}
