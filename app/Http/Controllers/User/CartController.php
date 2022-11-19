<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();

        $sum = 0;
        foreach ($cartItems as $item) {
            $sum += ($item->findProduct->selling_price * $item->product_quantity);
        }

        return view('user.cart', compact('cartItems', 'sum'));
    }

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
                return response()->json(['success' => $product->name . ' added to cart.']);
            }
        } else {
            return response()->json(['warning' => 'Please login first!']);
        }
    }

    public function deleteProduct(Request $request)
    {
        if (Auth::check()) {
            $product_id = $request->input('product_id');
            $cartItem = Cart::where('user_id', Auth::id())->where('product_id', $product_id)->first();
            if ($cartItem) {
                $cartItem->delete();
                return response()->json(['success' => Product::where('id', $product_id)->first()->name . ' deleted from cart.']);
            }
        } else {
            return response()->json(['warning' => 'Please login first!']);
        }
    }

    public function updateProduct(Request $request)
    {
        $product_id = $request->input("product_id");
        $product_quantity = $request->input("product_quantity");
        $cartItem = Cart::where('user_id', Auth::id())->where('product_id', $product_id)->first();

        if (Auth::check()) {
            if ($cartItem) {
                $cartItem->product_quantity = $product_quantity;

                $cartItem->update();
//                notify()->success($product->name . ' added to cart.');
                return response()->json(['success' => 'Quantity of ' . $cartItem->findProduct->name . ' updated.']);
            }
        } else {
            return response()->json(['warning' => 'Please login first!']);
        }
    }
}
