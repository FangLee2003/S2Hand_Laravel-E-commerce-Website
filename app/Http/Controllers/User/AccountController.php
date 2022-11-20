<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index()
    {
        return view('user.account');
    }

    public function updateAccount(Request $request)
    {
        $user = Auth::user();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->city = $request->input('city');
        $user->country = $request->input('country');
        $user->postcode = $request->input('postcode');
        $user->address1 = $request->input('address1');
        $user->address2 = $request->input('address2');

        $user->update();

        return back()->with('success', 'Update account information successfully');
    }
}
