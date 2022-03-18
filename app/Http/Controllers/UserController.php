<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\CheckOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function viewProfile()
    {
        return view('user.profile');
    }

    public function editProfile()
    {
        return view('user.edit-profile');
    }

    public function changePassword()
    {
        return view('user.change-password');
    }

    public function updateProfile(Request $request)
    {
        $user = User::findorfail(auth()->id());
        $user->update($request->all());

        return redirect()->route('user.profile');
    }

    public function updatePasword(Request $request)
    {
        $request->validate([
            'oldpassword' => ['required', new CheckOldPassword],
            'password' => 'required|string|min:6|confirmed',
        ]);
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->password)]);

        return redirect()->back()->with('success', 'Password Updated!');
    }
}
