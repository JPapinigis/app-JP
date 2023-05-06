<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
// Show the login form
    public function showLoginForm()
    {
        return view('login');
    }

    // Handle the login form submission
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('conferences');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // Handle the logout request
    public function logout()
    {
        Auth::logout();

        return redirect()->route('conferences');
    }

}
