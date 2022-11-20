<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        if (count($cartItems) > 0) {
            $sum = 0;
            foreach ($cartItems as $item) {
                $sum += ($item->findProduct->selling_price * $item->product_quantity);
            }

            return view('user.checkout', compact('cartItems', 'sum'));
        } else {
            return back()->with('warning', 'Cart is empty');
        }
    }

    public function placeOrder(Request $request)
    {
        try {
            $order = new Order();
            $order->user_id = Auth::id();
            $order->name = $request->input('name');
            $order->email = $request->input('email');
            $order->phone = $request->input('phone');
            $order->city = $request->input('city');
            $order->country = $request->input('country');
            $order->address1 = $request->input('address1');
            $order->address2 = $request->input('address2');
            $order->postcode = $request->input('postcode');
            $order->notes = $request->input('notes');
            $order->total_price = $request->input('total_price');
            $order->tracking_number = rand(1111, 9999);

            $order->save();

            $cartItems = Cart::where('user_id', Auth::id())->get();
            foreach ($cartItems as $item) {
                OrderItem::create(['order_id' => $order->id,
                    'user_id' => Auth::id(),
                    'product_id' => $item->product_id,
                    'product_price' => $item->findProduct->selling_price,
                    'product_quantity' => $item->product_quantity]);

                $product = Product::where('id', $item->product_id)->first();
                $product->quantity -= $item->product_quantity;

                $product->update();
            }

            $cartItems = Cart::where('user_id', Auth::id())->get();
            Cart::destroy($cartItems);

            AccountController::updateAccount($request);

            return redirect('/')->with('success', 'Order successfully');
        } catch (Exception $e) {
            return back()->with('warning', 'Missing information');
        }
    }
}
