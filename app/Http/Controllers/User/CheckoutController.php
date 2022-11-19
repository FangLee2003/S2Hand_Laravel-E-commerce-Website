<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();

        $sum = 0;
        foreach ($cartItems as $item) {
            $sum += ($item->findProduct->selling_price * $item->product_quantity);
        }

        return view('user.checkout',compact('cartItems', 'sum'));
    }
}
