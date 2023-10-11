<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginPController extends Controller
{
    public function index()
    {
        return view('penjamin.login');
    }
    
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('penjamin')->attempt($credentials)) 
        {
            if (Auth::guard('biro_kemahasiswaan')->check()) {
                Auth::guard('biro_kemahasiswaan')->logout();
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
        return redirect('penjamin/login');
    }
}
