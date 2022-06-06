<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class WishlistController extends Controller
{
    public function addWishlist($id)
    {
        $userid = Auth::id();
                                            //user is authenticated       and product is the same as in request
        $check = DB::table('wishlists')->where('user_id', $userid)->where('product_id', $id)->first();

        $data = array(
            'user_id' => $userid,
            'product_id' => $id,
        );

        if (Auth::Check()) {
            
            if ($check) {
                
                return response()->json(['error' => 'Product Is Already In Your Wishlist']);
            }else{
               
                DB::table('wishlists')->insert($data);
                return response()->json(['success' => 'Product Has Been Added To wishlist']);
            }

        }else{

            return response()->json(['error' => 'You Must Be Logged In First.']);
        }

    }
}
