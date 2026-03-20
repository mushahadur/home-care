<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Str;

class OtpVerificationController extends Controller
{
    public function show(): View
    {
        return view('auth.verify-otp');
    }

    public function verify(Request $request): RedirectResponse
    {
        $request->validate([
            'otp' => ['required', 'string', 'size:6'],
        ]);

        $user = Auth::user();
        // dd($user);

        if ($user->otp === $request->otp && $user->otp_expires_at > now()) {
            $user->update([
                'otp' => null,
                'otp_expires_at' => null,
                'is_verified' => true,
            ]);

            // Defult user role
            $user->assignRole('user');

            // Send Notification for Supper Admin
            $superAdmins = \App\Models\User::role('super-admin')->get();
            foreach ($superAdmins as $admin) {
                $admin->notify(new \App\Notifications\NewUserVerifiedNotification($user));
            }

            return redirect()->route('dashboard')->with('success', 'ইমেইল ভেরিফিকেশন সফল হয়েছে!');
        }

        return back()->withErrors(['otp' => 'Envalide or Expired OTP।']);
    }

    public function resend(Request $request): RedirectResponse
    {
        $user = Auth::user();
        $otp = Str::random(6);
        $user->update([
            'otp' => $otp,
            'otp_expires_at' => now()->addMinutes(5),
        ]);
        $user->notify(new \App\Notifications\SendOtpNotification($otp));

        return back()->with('success', 'New OTP Sended।');
    }
}
