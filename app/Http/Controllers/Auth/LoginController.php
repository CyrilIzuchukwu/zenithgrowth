<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    public function authenticated()
    {
        if (Auth::user()->role_as == '1') {
            // dd('Welcome Admin');
            return redirect('admin/dashboard')->with('message', 'Welcome to your dashboard');
        } elseif (Auth::user()->role_as == '0') {
            return redirect('user/dashboard')->with('message', 'Welcome to your user dashboard');
        }

//         } elseif (Auth::user()->role_as == '0') {
//     if (Auth::user()->status == '1') { // Check if user is active
//         return redirect('user/dashboard')->with('message', 'Welcome to your user dashboard');
//     } else {
//         return redirect('/')->with('error', 'Your account is not active. Please contact support.');
//     }
// }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}
