<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function index()
    {
        return view('user.password');
    }

    public function updatePassword(Request $request)
    {
        echo(2);
        try {
            if (!Hash::check($request->input('current_password'), Auth::user()->password)) {
                return back()->with('warning', 'Wrong password');
            }
            if ($request->input('current_password') == $request->input('new_password')) {
                return back()->with('warning', 'Duplicate password');
            }
            if ($request->input('new_password') != $request->input('confirm_password')) {
                return back()->with('warning', "Doesn't match password");
            }
            $user = Auth::user();
            $user->password = $request->input('new_password');

            $user->update();

            return back()->with('success', "Update password successfully");
        } catch (Exception $e) {
            return back()->with('warning', 'Missing information');
        }
    }
}
