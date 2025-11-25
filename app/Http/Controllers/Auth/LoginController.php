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
        // Ambil email & password
        $credentials = $request->only('email', 'password');

        // Coba login
        if (Auth::attempt($credentials)) {

            $user = Auth::user(); // data user

            // Cek role admin
            if ($user->role === 'admin') {
                return redirect('/admin/dashboard');
            }

            // Jika bukan admin -> warga
            return redirect('/warga/dashboard');
        }

        // Jika gagal login
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