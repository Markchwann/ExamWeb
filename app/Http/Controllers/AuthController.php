<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Pengguna berhasil diautentikasi
            return redirect()->intended('/home');
        } else {
            // Otentikasi gagal
            return back()->withErrors([
                'email' => 'Email atau kata sandi salah.',
            ]);
        }
    }


}

