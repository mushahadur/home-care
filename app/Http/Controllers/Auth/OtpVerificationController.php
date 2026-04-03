<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;

class OtpVerificationController extends Controller
{
    public function show(Request $request)
    {
        try {
            $email = Crypt::decryptString($request->email);
            $expires = Crypt::decryptString($request->expires);
            $isOtpExpiresValid = Carbon::parse($expires)->isFuture();
            // dd($email, $expires, $isOtpExpiresValid);

            return view('auth.verify-otp', compact('email', 'expires', 'isOtpExpiresValid'));
        } catch (\Exception $e) {
            return redirect()->route('register')->with('error', 'Invalid or tampered verification link.');
        }
    }


    // public function verify(Request $request): RedirectResponse
    // {
    //     $request->validate([
    //         'otp' => ['required', 'string', 'size:6'],
    //     ]);

    //     $user = Auth::user();
    //     // dd($user);Hash::check($inputOtp, $user->otp);

    //     if (Hash::check($request->otp, $user->otp) && $user->otp_expires_at > now()) {
    //         $user->update([
    //             'otp' => null,
    //             'otp_expires_at' => null,
    //             'is_verified' => true,
    //         ]);

    //         // Defult user role
    //         $user->assignRole('user');

    //         // Send Notification for Supper Admin
    //         $superAdmins = \App\Models\User::role('super-admin')->get();
    //         foreach ($superAdmins as $admin) {
    //             $admin->notify(new \App\Notifications\NewUserVerifiedNotification($user));
    //         }

    //         return redirect()->route('dashboard')->with('success', 'successfully verified your email!');
    //     }

    //     return back()->withErrors(['otp' => 'Invalid or Expired OTP.']);
    // }

    public function verify(Request $request): RedirectResponse
    {
        // dd($request->all());
        // Validate input
        $request->validate([
            'otp' => ['required', 'string', 'size:6'],
        ]);

        // Find the user by email
        $user = User::where('email', $request->email)->first();

        // Check if OTP exists, not expired, and matches
        $isValidOtp = $user->otp && $user->otp_expires_at && Carbon::parse($user->otp_expires_at)->isFuture() && Hash::check($request->otp, $user->otp);
        if ($isValidOtp) {
            // Update user as verified
            $user->update([
                'otp' => null,
                'otp_expires_at' => null,
                'is_verified' => true,
            ]);

            Auth::login($user);

            // Assign default role safely
            if (!$user->hasRole('user')) {
                $user->assignRole('user');
            }

            // Notify all super-admins
            $superAdmins = \App\Models\User::role('super-admin')->get();
            foreach ($superAdmins as $admin) {
                $admin->notify(new \App\Notifications\NewUserVerifiedNotification($user));
            }

            if ($user->default_role === 'user' && $user->is_verified) {
                return redirect()->intended(route('user.dashboard'));
            }
            if ($user->hasRole('super-admin') || $user->is_verified) {
                return redirect()->intended(route('admin.dashboard'));
            }

            // return redirect()->route('admin.dashboard')
            //     ->with('success', 'Successfully verified your email!');
        }

        // If OTP invalid or expired
        return back()->withErrors(['otp' => 'Invalid or expired OTP.']);
    }

    public function resend(Request $request): RedirectResponse
    {
        // Find the user by email
        $user = User::where('email', $request->email)->first();
        // dd($user);
        $otp = rand(100000, 999999);
        $hashedOtp = Hash::make($otp);

        $user->update([
            'otp' => $hashedOtp,
            'otp_expires_at' => now()->addMinutes(5),
        ]);
// dd($user);
        $user->notify(new \App\Notifications\SendOtpNotification($otp));

        // return back()->with('success', 'New OTP Sended।');
         return redirect()->route('otp.verify', [
        'email'   => Crypt::encryptString($user->email),
        'expires' => Crypt::encryptString($user->otp_expires_at),
        ])->with('success', 'Resend OTP! Check your mail inbox! Please verify your email with the OTP sent.');
    }
}
