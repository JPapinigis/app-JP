<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Validation\ValidatesRequests;


class AuthController extends Controller
{
    use ValidatesRequests;

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        //dd($credentials);
        if (Auth::guard('administrators')->attempt(['email' => $request->email, 'password' => $request->password])) {
            session(['login' => true]);
            if (session()->has('login')) {
                // Session is started
                return redirect()->intended('/conferences');
            } else {
                // Session is not started
                return back()->withErrors([
                    'email' => 'Session not started.',
                ]);

            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        session(['login' => false]);
        return redirect('/conferences');
    }
}
