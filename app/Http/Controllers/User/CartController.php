<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addProduct(Request $request)
    {
        $product_id = $request->input("product_id");
        $product_quantity = $request->input("product_quantity");
        $product = Product::where('id', $product_id)->first();
        $cartItem_check = Cart::where('user_id', Auth::id())->where('product_id', $product_id)->first();

        if (Auth::check()) {
            if ($product) {
                if ($cartItem_check) {
                    $cartItem_check->product_quantity = $cartItem_check->product_quantity + $product_quantity;

                    $cartItem_check->update();
                } else {
                    $cartItem = new Cart();
                    $cartItem->user_id = Auth::id();
                    $cartItem->product_id = $product_id;
                    $cartItem->product_quantity = $product_quantity;

                    $cartItem->save();
                }
//                notify()->success($product->name . ' added to cart.');
                return response()->json(['status' => $product->name . ' added to cart.']);
            }
        } else {
            return response()->json(['status' => $product->name . ' added to cart.']);
        }
    }
}
