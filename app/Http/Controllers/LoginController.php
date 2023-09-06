<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('mahasiswa')->attempt($credentials)) 
        {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        else if (Auth::guard('penjamin')->attempt($credentials)) 
        {
            $request->session()->regenerate();
            return redirect()->intended('/');
        } 
        else if (Auth::guard('biro_kemahasiswaan')->attempt($credentials)) 
        {
            $request->session()->regenerate();
            return redirect()->intended('/');
        } 

        return back()->with('loginError', 'Login failed!');
    }
    
    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
}
