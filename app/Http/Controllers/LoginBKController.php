<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginBKController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }
    
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('biro_kemahasiswaan')->attempt($credentials)) 
        {
            if (Auth::guard('penjamin')->check()) {
                Auth::guard('penjamin')->logout();
            }
            
            if (Auth::guard('mahasiswa')->check()) {
                Auth::guard('mahasiswa')->logout();
            }

            $request->session()->regenerate();

            return redirect()->intended('/');
        } 

        return back()->with('loginError', 'Kombinasi Username dan Password Tidak Cocok!');
    }
    
    public function logout()
    {
        if (Auth::guard('biro_kemahasiswaan')->check()) {
            Auth::guard('biro_kemahasiswaan')->logout();
        }

        if (Auth::guard('penjamin')->check()) {
            Auth::guard('penjamin')->logout();
        }

        if (Auth::guard('mahasiswa')->check()) {
            Auth::guard('mahasiswa')->logout();
        }

        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('bk/login');
    }
}
