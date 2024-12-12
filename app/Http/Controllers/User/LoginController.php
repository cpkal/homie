<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('users.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('phone');


        $user = User::where('phone', $credentials['phone'])->first();

        if (!$user) {
            $user = new User();
            $user->phone = $credentials['phone'];
            $user->otp_code = rand(1000, 9999);
            $user->save();

            // send otp to user

            return redirect()->route('otp', ['phone' => $user->phone]);
        }

        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        }

        return redirect()->back()->with('error', 'Terjadi kesalahan');
    }

    public function otpView() {
        return view('users.otp');
    }

    public function otp(Request $request)
    {
        $user = User::where('phone', $request->phone)->first();
        
        if ($user->otp_code == $request->otp) {
            Auth::login($user);

            return redirect()->route('home');
        }

        return redirect()->back()->with('error', 'OTP salah');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
