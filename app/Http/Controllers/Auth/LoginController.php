<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Menampilkan halaman form login.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        // Mengembalikan view yang sudah kita buat sebelumnya
        return view('auth.login');
    }

    /**
     * Menangani permintaan login dari form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // 1. Validasi input dari form
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Mencoba untuk mengotentikasi pengguna
        //    Parameter kedua (boolean) adalah untuk fitur "Ingat Saya"
        if (Auth::attempt($credentials, $request->filled('remember-me'))) {
            // Jika berhasil, regenerate session untuk keamanan
            $request->session()->regenerate();

            // Redirect ke halaman yang dimaksud setelah login (defaultnya /home)
            // Anda bisa mengganti '/dashboard' dengan route tujuan Anda
            return redirect()->intended('/dashboard');
        }

        // 3. Jika otentikasi gagal
        //    Kembali ke halaman login dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    /**
     * Menangani proses logout pengguna.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // Redirect ke halaman utama atau halaman login setelah logout
        return redirect('/login');
    }
}
