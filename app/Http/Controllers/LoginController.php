<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index()
    {

        return view('auth.login');
    }
    public function login(Request $request)
    {
        $login = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        
        if (Auth::attempt($login)) {
            $request->session()->regenerate();
            if (Auth::user()->level != 'admin') {
                return redirect()->intended('/');
            }
            return redirect()->intended('/dashboard');
  
        }
        return back()->with('loginError', 'Terjadi Kesalahan Saat login!');
    }
    public function logout(Request $request)
    {
        //logout akun
        Auth::logout();
        // validasi session logout
        $request->session()->invalidate();
        // buat ulang token
        $request->session()->regenerateToken();
        //kembalikan ke login
        return redirect('/login')->with('logoutSuccess', 'Akun telah berhasil di keluarkan!');
    }
}
