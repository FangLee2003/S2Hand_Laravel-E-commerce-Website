<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function postSubscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $email = $request->input('email');

        $subscriber_check = Subscriber::where('email', $email)->first();
        if ($subscriber_check) {
            return back()->with('warning', 'You are already registered');
        }
        $subscriber = new Subscriber();
        $subscriber->email = $email;

        $subscriber->save();

        return back()->with('success', "Registered successfully");
    }
}
