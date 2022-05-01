<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterValidationRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function createUser(RegisterValidationRequest $request)
    {
        $input = $request->all();
        if(array_key_exists('errors', $input))
            return redirect()->back()->withErrors($input['errors'])->withInput();
            
        $input['role_id'] = 2;
        $input['password'] = Hash::make($input['password']);
        $input['email_verified_at'] = Carbon::now();
        User::create($input);

        return redirect()->route('page.login')->with('success', 'Verify Emaill to continue');

    }

    public function checkUser(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            if(auth()->user()->role->name == 'admin')
                return redirect()->route('admin.dashboard');

                
            if(empty(auth()->user()->email_verified_at))
            {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Verify your email to continue.',
                ]);
            }
            

            return redirect()->route('landing');
        }
        else
        {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('landing');
    }
}
