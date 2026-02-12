<?php

namespace App\Actions\Fortify;

use App\Models\RegistrationOtp;
use App\Mail\RegistrationOtpMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:20'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'address' => ['required', 'string', 'max:500'],
        ])->validate();

        $otp = rand(100000, 999999);

        RegistrationOtp::updateOrCreate(
            ['email' => $input['email']],
            [
                'name' => $input['name'],
                'phone' => $input['phone'],
                'password' => Hash::make($input['password']),
                'address' => $input['address'],
                'otp' => $otp,
                'expires_at' => now()->addMinutes(10),
            ]
        );

        Mail::to($input['email'])->send(new RegistrationOtpMail($otp));

        abort(redirect()->route('otp.verify')->with('email', $input['email']));
    }
}
