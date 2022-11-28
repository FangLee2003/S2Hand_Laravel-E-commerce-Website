<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('user.orders', compact('orders'));
    }

    public function orderDetails($id)
    {
        $order = Order::where('user_id', Auth::id())->where('id', $id)->first();
        $orderItems = OrderItem::where('user_id', Auth::id())->where('order_id', $id)->get();

        return view('user.order', compact('order', 'orderItems'));
    }

    public function cancelOrder($id)
    {
        $cartItems = Order::where('id', $id)->get();
        Order::destroy($cartItems);

        return back()->with('success', 'Cancel order successfully');
    }
}
