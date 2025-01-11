<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;


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
    protected function redirectTo()
    {
        $role = Auth::user()->role;

        if ($role === 'admin') {
            return '/admin';
        } elseif ($role === 'user') {
            return '/index';
        }

        return '/';
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
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Logged out successfully!');
    }

    public function login(Request $request)
    {
        $username = $request->input('username');

        if (Cache::has("login_attempts_lockout_$username")) {
            $secondsRemaining = Cache::get("login_attempts_lockout_$username") - time();
            return response()->json([
                'status' => 'error',
                'message' => "Your account is locked due to too many failed login attempts. Please try again in $secondsRemaining seconds."
            ]);
        }

        if (!Auth::attempt($request->only('username', 'password'))) {
            $attempts = Cache::get("login_attempts_$username", 0) + 1;

            if ($attempts >= 5) {
                Cache::put("login_attempts_lockout_$username", time() + 120, 120);
                Cache::forget("login_attempts_$username");
                return response()->json([
                    'status' => 'error',
                    'message' => 'Too many failed login attempts. Your account is locked for 2 minutes.'
                ]);
            }

            Cache::put("login_attempts_$username", $attempts, 120);
            return response()->json([
                'status' => 'error',
                'message' => "Invalid credentials. You have " . (5 - $attempts) . " attempts left."
            ]);
        }

        Cache::forget("login_attempts_$username");

        return response()->json([
            'status' => 'success',
            'message' => 'Login successful!',
            'redirect' => route('index') 
        ]);
    }
}