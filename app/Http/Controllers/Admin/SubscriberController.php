<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function index()
    {
        $subscribers = Subscriber::get();

        return view('admin.subscriber.index', compact('subscribers'));
    }

    public function delete($id)
    {
        $subscriber = Subscriber::find($id);

        $subscriber->delete();

        return back()->with('success', 'Subscriber Deleted Successfully');
    }
}
