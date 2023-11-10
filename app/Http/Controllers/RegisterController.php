<?php

namespace App\Http\Controllers;

use App\Models\Penjamin;
use Twilio\Rest\Client;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index()
    {
        return view('penjamin.register');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => ['required', 'min:3', 'max:255', 'unique:penjamins'],
            'password' => 'required|min:5|max:255',
            'nama' => 'required|max:255',
            'nomor_telp' => 'required|max:120'
        ]);

        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);

        $validatedData['otp'] = mt_rand(100000, 999999);

        //store OTP in session
        $request->session()->put('username', $validatedData['username']);
        $request->session()->put('password', $validatedData['password']);
        $request->session()->put('nama', $validatedData['nama']);
        $request->session()->put('nomor_telp', $validatedData ['nomor_telp']);
        $request->session()->put('otp', $validatedData['otp']);

        //send OTP to user's WhatsApp
        $this->sendOtpWhatsApp($request->nomor_telp, $validatedData['otp']);        
        // $request->session()->flash('success', 'Registration successfull! Please login');
        
        return redirect('penjamin/verify-otp');
    }

    private function sendOtpWhatsApp($nomor_telp, $otp) {
        $account_sid = getenv("TWILIO_ACCOUNT_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = getenv("TWILIO_WHATSAPP_NUMBER");

        $client = new Client($account_sid, $auth_token);
        $client->messages->create(
            "whatsapp:".$nomor_telp,
                [
                   "from" => "whatsapp:".$twilio_number,
                   "body" => "Hello, OTP $otp"
                ]
            );
    }

    public function showVerifyOtpForm(Request $request)
    {
        return view('penjamin.verify-otp');
    }

    public function verifyOtp(Request $request) {
        $username = $request->session()->get('username');
        $password = $request->session()->get('password');
        $nama = $request->session()->get('nama');
        $nomor_telp = $request->session()->get('nomor_telp');
        $otp = $request->session()->get('otp');

        if($request->otp == $otp) {
            // OTP verification successful, proceed with user registration
            Penjamin::create([
                'username' => $username,
                'password' => $password,
                'nama' => $nama,
                'nomor_telp' => $nomor_telp,
            ]);
        } else {
            return redirect('/login')->with('error', 'OTP tidak valid');
        }
    }
}