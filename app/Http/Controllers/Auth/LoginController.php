<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

public function login(Request $request)
{
    $request->validate([
        'email'    => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($request->only('email', 'password'))) {
        $user = Auth::user();

        return $user->role === 'admin'
            ? redirect('/admin/dashboard')
            : redirect('/warga/dashboard');
    }

    return back()->withErrors([
        'email' => 'Email atau password salah.'
    ]);
}

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}