<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;

class ProductController extends Controller
{
    public function productView($id, $product_name)
    {
        $product = DB::table('products')
                        ->join('categories','products.category_id','categories.id')
                        ->join('subcategories','products.subcategory_id','subcategories.id')
                        
                        ->select('products.*','categories.category_name','subcategories.subcategory_name',
                            )
                        ->where('products.id', $id)
                        ->first();

       


        return view('pages.product_details', compact('product'));
    }

    public function addCart(Request $request, $id)
    {
        $product = DB::table('products')->where('id',$id)->first(); 

        $data = array();

        if ($product->discount_price == NULL) {

            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = $request->qty;
            $data['price'] = $product->selling_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
           
            Cart::add($data);


            $notification = array(
                'message' => 'Product Added Successfully!',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);

        }else{

            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = $request->qty;
            $data['price'] = $product->discount_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
           Cart::add($data); 

            $notification = array(
                'message' => 'Product Added Successfully!',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);
        }
    }

    public function productsView($id)
    {
        $products = DB::table('products')->where('subcategory_id',$id)->paginate(5);

        $categories = DB::table('categories')->get();

        //$brands = DB::table('products')->where('subcategory_id',$id)->select('brand_id')->groupBy('brand_id')->get();

        return view('pages.all_products', compact('products','categories'));
    }

    public function categoryView($id)
    {
        $category_all = DB::table('products')->where('category_id',$id)->paginate(5);

        return view('pages.all_category', compact('category_all'));
    }
}
