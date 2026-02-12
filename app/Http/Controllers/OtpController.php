<?php

namespace App\Http\Controllers;

use App\Models\RegistrationOtp;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class OtpController extends Controller
{
    public function show()
    {
        return view('auth.verify-otp');
    }

    public function verify()
    {
        request()->validate([
            'email' => ['required', 'email'],
            'otp' => ['required', 'digits:6'],
        ]);

        $record = RegistrationOtp::where('email', request('email'))
            ->where('otp', request('otp'))
            ->where('expires_at', '>', now())
            ->first();

        if (!$record) {
            return back()->withErrors(['otp' => 'Invalid or expired OTP']);
        }

        $user = User::create([
            'name' => $record->name,
            'email' => $record->email,
            'phone' => $record->phone,
            'password' => $record->password,
            'address' => $record->address,
            'user_role' => '0',
        ]);

        $record->delete();

        Auth::login($user);

        return redirect()->route('dashboard');
    }
}
