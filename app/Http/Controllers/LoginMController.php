<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginMController extends Controller
{
    public function index()
    {
        return view('mahasiswa.login');
    }
    
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'nim' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('mahasiswa')->attempt($credentials)) 
        {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with('loginError', 'Kombinasi NIM dan Password Tidak Cocok!!');
    }
    
    public function logout()
    {
        Auth::guard('mahasiswa')->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('mhs/login');
    }
}
