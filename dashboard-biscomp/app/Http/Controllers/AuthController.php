<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman form login.
     */
    public function showLoginForm()
    {
        return view('auth.login'); // Pastikan file login Anda berada di resources/views/auth/login.blade.php
    }

    /**
     * Memproses autentikasi login email & password.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'Alamat email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
        ]);

        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect()->intended(route('dashboard'));
        }

        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    /**
     * Redirect ke halaman login Microsoft 365 (SSO).
     * Membutuhkan package: laravel/socialite & socialiteproviders/microsoft
     */
    public function redirectToMicrosoft()
    {
        // Jika sudah install Laravel Socialite Microsoft, gunakan baris di bawah:
        // return \Laravel\Socialite\Facades\Socialite::driver('microsoft')->redirect();

        return back()->withErrors([
            'email' => 'Integrasi Microsoft 365 SSO belum dikonfigurasi di server.',
        ]);
    }

    /**
     * Menangani callback dari Microsoft 365 setelah user berhasil login.
     */
    public function handleMicrosoftCallback()
    {
        /* Contoh implementasi jika menggunakan Laravel Socialite:
        $microsoftUser = \Laravel\Socialite\Facades\Socialite::driver('microsoft')->user();
        
        $user = \App\Models\User::where('email', $microsoftUser->getEmail())->first();
        
        if (!$user) {
            return redirect()->route('login')->withErrors([
                'email' => 'Akun Microsoft Anda tidak terdaftar di sistem BComp GDPS.'
            ]);
        }

        Auth::login($user);
        return redirect()->intended(route('dashboard'));
        */
    }

    /**
     * Memproses logout pengguna dan menghapus sesi.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}