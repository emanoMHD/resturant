<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UserSearchController extends Controller
{
    public function search(Request $request)
    {
        $item = $request->search;


        $products = DB::table('products')
                        ->where('product_name','LIKE',"%$item%")
                        ->paginate(10);

        return view('pages.search', compact('products'));
    }   
}
