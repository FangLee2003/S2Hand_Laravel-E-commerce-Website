<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = Wishlist::where('user_id', Auth::id())->get();
        return view('user.wishlist', compact('wishlist'));
    }

    public function updateProduct(Request $request)
    {
        $product_id = $request->input("product_id");
        $product = Product::where('id', $product_id)->first();
        $wishlistItem_check = Wishlist::where('user_id', Auth::id())->where('product_id', $product_id)->first();

        if (Auth::check()) {
            if ($product) {
                if ($wishlistItem_check) {
                    $wishlistItem_check->delete();

                    return response()->json(['success' => Product::where('id', $product_id)->first()->name . ' deleted from wishlist.']);
                } else {
                    $wishlistItem = new Wishlist();
                    $wishlistItem->user_id = Auth::id();
                    $wishlistItem->product_id = $product_id;

                    $wishlistItem->save();

                    return response()->json(['success' => $product->name . ' added to wishlist.']);
                }
//                notify()->success($product->name . ' added to cart.');
            }
        } else {
            return response()->json(['warning' => 'Please login first!']);
        }
    }

    public function countProduct(Request $request)
    {
        $countWishlist = Wishlist::where('user_id', Auth::id())->get()->count();
        return response()->json(['countWishlist' => $countWishlist]);
    }
}
