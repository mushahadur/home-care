
@extends('frontend.layouts.app')

@section('title')
Forgot Password - NurseNextDoor
@endsection

@section('content')
<style>
    /* custom glassmorphism & background image */


    /* subtle overlay for readability (optional) — we also have glass card, so overlay can be soft */


    /* glass card effect */
    .glass-card {
        background: rgba(255, 255, 255, 0.25);
        backdrop-filter: blur(16px) saturate(180%);
        -webkit-backdrop-filter: blur(16px) saturate(180%);
        border: 1px solid rgba(255, 255, 255, 0.4);
        box-shadow: 0 20px 40px rgba(0, 20, 40, 0.2), 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    /* input glass style (lighter inside) */
    .glass-input {
        background: rgba(255, 255, 255, 0.5);
        backdrop-filter: blur(4px);
        border: 1px solid rgba(255, 255, 255, 0.6);
        transition: all 0.2s ease;
    }

    .glass-input:focus {
        background: rgba(255, 255, 255, 0.8);
        border-color: #F9B0B0;
        box-shadow: 0 0 0 3px rgba(249, 176, 176, 0.2);
    }

    /* tab button glass (not fully transparent) */
    .glass-tab {
        background: rgba(255, 255, 255, 0.3);
        backdrop-filter: blur(8px);
        border: 1px solid rgba(255, 255, 255, 0.25);
    }

    .glass-tab-active {
        background: rgba(255, 255, 255, 0.75);
        backdrop-filter: blur(8px);
        border: 1px solid rgba(255, 255, 255, 0.6);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    /* badge glass */
    .glass-badge {
        background: rgba(230, 242, 252, 0.5);
        backdrop-filter: blur(4px);
        border: 1px solid rgba(255, 255, 255, 0.5);
    }
</style>

<div style=" background-image: url('https://images.unsplash.com/photo-1576091160550-2173dba999ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');

        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
        padding-left: 30px;
        padding-right: 30px;"
    class="pt-12 sm:pt-12 md:pt-24 lg:pt-32 xl:pt-20 pb-16  sm:pb-12 md:pb-24 lg:pb-32 xl:pb-40 sm:px-4 flex items-center justify-center">
    <!-- main glass card container -->
    <div class="w-full max-w-md glass-card rounded-lg overflow-hidden shadow-2xl border border-white/40 text-[#1e3a5f]">

        <!-- decorative top bar with soft blue & pink accent -->
        <div class="h-2 w-full flex">
            <div class="w-1/2 bg-[#E6F2FC]"></div>
            <div class="w-1/2 bg-[#F9B0B0]"></div>
        </div>

        <!-- inner padding (mobile friendly) -->
        <div class="px-6 py-8 md:px-8">

            <!-- === LOGIN / REGISTER TOGGLE (two tabs) === -->
                <!-- === LOGIN / REGISTER TOGGLE (two tabs) === -->
            <div class="flex rounded-lg bg-teal-700 p-1 mb-8">
                <button  class="auth-toggle-transition flex-1 py-3 text-sm font-bold rounded-md bg-white shadow-sm text-[#2B4F6E] transition-all">Forgot Password</button>
            </div>
            <!-- === FORGOT PASSWORD FORM (Laravel Blade optimized) === -->
            <div id="forgotPasswordForm" class="space-y-5 transition-opacity duration-200">
                <!-- CSRF protection (Laravel) & session error display (optional but recommended) -->
                @csrf

                <!-- display validation errors if any (optional, but good practice) -->
                @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-md text-sm mb-4">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}" class="space-y-5" autocomplete="off" novalidate>
                    @csrf
                    <!-- email / phone (using Laravel old() helper) -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-[#1A3B4F] mb-1">
                            <i class="far fa-envelope mr-2 text-[#C63E5A]"></i>Email Address
                        </label>
                        <input
                            type="text"
                            name="email"
                            id="email"
                            value="{{ old('email') }}"
                            placeholder="you@example.com"
                            class="w-full px-5 py-3 rounded-lg border border-[#d3e4f0] bg-white/80 focus:ring-2 focus:ring-[#F9B0B0] focus:border-transparent outline-none transition text-sm @error('email') border-red-500 @enderror"
                            autofocus
                            autocomplete="off"
                            required>
                        @error('email')
                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- submit button -->
                    <button
                        type="submit"
                        class="w-full bg-[#2B4F6E] hover:bg-[#1f3a50] text-white font-bold py-3.5 rounded-lg shadow-md transition flex items-center justify-center gap-2">
                        <i class="fas fa-sign-in-alt"></i> {{ __('Email Password Reset Link') }}
                    </button>
                </form>
                <!-- divider with "or" (optional, if you have social login) -->
            </div>

          
        </div>
    </div>
</div>
<!-- tiny JavaScript for tab switching (no Vue, just plain toggling) – mobile responsive + smooth -->
@endsection

