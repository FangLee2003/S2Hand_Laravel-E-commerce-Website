<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChangePasswordController extends Controller
{
    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'current_password' => 'required|string',
            'new_password' => 'required|confirmed|min:8|string'
        ]);

        // The passwords matches
        if (!Hash::check($request->get('current_password'), Auth::user()->password)) {
            return back()->with('error', "Current Password is Invalid");
        }

// Current password and new password same
        if (strcmp($request->get('current_password'), $request->new_password) == 0) {
            return redirect()->back()->with("error", "New Password cannot be same as your current password.");
        }

        $user = User::find($auth->id);
        $user->password = Hash::make($request->new_password);
        $user->save();
        return back()->with('success', "Password Changed Successfully");
    }
}
