<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Menampilkan halaman login
    public function index()
    {
        return view('Login');
    }

    // Menangani proses login
    public function postLogin(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:1',
        ]);

        // Tentukan guard berdasarkan permintaan
        $guard = $request->has('admin') ? 'admin' : 'web';
        $dashboard = $guard === 'admin' ? 'admin-dashboard' : 'customer-dashboard';

        // Autentikasi pengguna
        $credentials = $request->only('email', 'password');
        if (Auth::guard($guard)->attempt($credentials)) {
            // Ambil data pengguna
            $user = Auth::guard($guard)->user();
            return redirect()->intended($dashboard)
                ->with('user', $user)
                ->withSuccess("You have Successfully logged in as " . ucfirst($guard));
        } else {
            return redirect()->route('login')
                ->withErrors("Invalid {$guard} credentials.");
        }
    }

    // Menangani proses logout
    public function logout(Request $request)
    {
        if ($request->has('admin')) {
            // Logout admin
            Auth::guard('admin')->logout();

            // Menghapus sesi pengguna
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            // Arahkan ke halaman login dengan pesan sukses
            return redirect()->route('login')->with('success', 'Admin logged out successfully.');

        } else {
            // Logout customer
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('login')->withSuccess('Customer logged out successfully.');
        }
    }
}
