<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class StockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function viewStock()
    {
        $product = DB::table('products')
                    ->join('categories','products.category_id','categories.id')
                    ->join('brands','products.brand_id','brands.id')
                    ->select('products.*','categories.category_name','brands.brand_name')
                    ->get();

        return view ('admin.stock.stock', compact('product'));

    }

}
