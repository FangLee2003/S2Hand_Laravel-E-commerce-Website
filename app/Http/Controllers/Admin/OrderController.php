<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('status', '0')->get();
        return view('admin.order.index', compact('orders'));
    }

    public function completeOrder($id)
    {
        $order = Order::where('id', $id)->first();
        $order->status = '1';

        $order->update();

        return back()->with('success', 'Complete order successfully');
    }
}
