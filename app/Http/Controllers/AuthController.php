<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // validasi input
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // cari user berdasarkan username
        $user = User::where('username', $request->username)->first();

        if (!$user) {
            return back()->with('error', 'Username tidak ditemukan');
        }

        // CEK PASSWORD TANPA HASH (langsung dibandingkan)
        if ($request->password !== $user->password) {
            return back()->with('error', 'Password salah');
        }

        // simpan session login
        Session::put('login', true);
        Session::put('user_id', $user->id);
        Session::put('username', $user->username);
        Session::put('role', $user->role->role);

        if ($user->role->role === 'admin') {
            return redirect('/admin/dashboard');
        }
        if ($user->role->role === 'petugas') {
            return redirect('/petugas/dashboard');
        }
        if ($user->role->role === 'owner') {
            return redirect('/owner/dashboard');
        }

        // return redirect('/dashboard');
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('login');
    }
}
