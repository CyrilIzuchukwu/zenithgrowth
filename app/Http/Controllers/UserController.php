<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\Plan;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //

    public function signup()
    {
        return view('auth.register');
    }

    public function create_user(Request $request)
    {
        // validate inputs
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email|max:255,string',
            'username' => 'required|unique:users,username|max:255,string',
            'phone' => 'required|string',
            'password' => 'required|min:5|max:40',
            'confirm_password' => 'required|min:5|max:40|same:password',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // saving to database
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->active = 1;
        $save = $user->save();

        if ($save) {
            return redirect()->route('login')->with('message', 'Registration Successful');
        } else {
            return redirect()->back()->with('error', 'Registration failed');
        }
    }

    public function user_dashboard()
    {

        $user = auth()->user();
        return view('dashboard.index');
    }

}
