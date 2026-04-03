<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Notifications\SendOtpNotification;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    // public function store(Request $request): RedirectResponse
    // {
    //     $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
    //         'password' => ['required', 'confirmed', Rules\Password::defaults()],
    //     ]);

    //     // OTP Generate
    //     $otp = Str::random(6);
    //     $otpExpiresAt = now()->addMinutes(5);

    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //         'otp' => $otp,
    //         'otp_expires_at' => $otpExpiresAt,
    //         'is_verified' => false,
    //     ]);

    //     // event(new Registered($user));
    //     //__ Send OTP
    //     $user->notify(new SendOtpNotification($otp));

    //     Auth::login($user);

    //     // return redirect(route('dashboard', absolute: false));
    //     return redirect()->route('otp.verify');
    // }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // OTP
        $otp = rand(100000, 999999);
        $hashedOtp = Hash::make($otp);
         
        $otpExpiresAt = now()->addMinutes(5);
        // dd($otp);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'otp' => $hashedOtp,
            'otp_expires_at' => $otpExpiresAt,
            'is_verified' => false,
        ]);

        $user->notify(new SendOtpNotification($otp));

         return redirect()->route('otp.verify', [
        'email'   => Crypt::encryptString($user->email),
        'expires' => Crypt::encryptString($user->otp_expires_at),
        ])->with('success', 'Check your mail inbox! Please verify your email with the OTP sent.');
    }
}
