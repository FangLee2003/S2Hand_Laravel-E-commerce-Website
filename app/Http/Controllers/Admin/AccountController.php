<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = User::all();
        return view('admin.account.index', compact('accounts'));
    }

    public function getAdd()
    {
        return view('admin.account.add');
    }

    public function postAdd(Request $request)
    {
        $request->validate(['email' => 'required|string|unique:users,email',
            'password' => 'required|string|min:8|max:255'
        ]);

        $user = new User();

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/avatar/', $filename);

            $user->avatar = $filename;
        }

        $user->name = $request->input('name');
        $user->password = $request->input('password');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->city = $request->input('city');
        $user->country = $request->input('country');
        $user->postcode = $request->input('postcode');
        $user->address1 = $request->input('address1');
        $user->address2 = $request->input('address2');
        $user->role_as = $request->input('admin') == TRUE ? '1' : '0';;

        $user->save();

        return redirect('admin/accounts')->with('success', 'User Added Successfully');
    }

    public function getEdit($id)
    {
        $user = User::find($id);
        return view('admin.account.edit', compact('user'));
    }

    public function putEdit(Request $request, $id)
    {
        $user = User::find($id);

        if ($request->hasFile('avatar')) {
            $path = 'assets/uploads/avatar/' . $user->avatar;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('avatar');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/avatar/', $filename);

            $user->avatar = $filename;
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->city = $request->input('city');
        $user->country = $request->input('country');
        $user->postcode = $request->input('postcode');
        $user->address1 = $request->input('address1');
        $user->address2 = $request->input('address2');
        $user->role_as = $request->input('admin') == TRUE ? '1' : '0';

        $user->update();

        return redirect('admin/accounts')->with('success', 'User Edited Successfully');
    }

    public function delete($id)
    {
        $user = User::find($id);

        if ($user->avatar) {
            $path = 'assets/uploads/avatar/' . $user->avatar;
            if (File::exists($path)) {
                File::delete($path);
            }
        }

        $user->delete();

        return redirect('admin/accounts')->with('success', 'User Deleted Successfully');
    }
}
