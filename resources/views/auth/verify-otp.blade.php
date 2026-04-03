@extends('frontend.layouts.app')

@section('title', 'Login - NurseNextDoor')

@section('content')
<style>
    /* custom glassmorphism & background image */
    body {
        background-image: url('https://images.unsplash.com/photo-1576091160550-2173dba999ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
    }

    /* subtle overlay for readability */
    body::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.3);
        backdrop-filter: blur(2px);
        z-index: -1;
    }

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

    /* custom utility classes */
    .d-none {
        display: none !important;
    }

    .timer {
        font-weight: 600;
        color: #C63E5A;
    }

    .alert-warning {
        background-color: rgba(255, 243, 205, 0.9);
        border: 1px solid #ffeeba;
        color: #856404;
        padding: 0.75rem 1.25rem;
        border-radius: 1rem;
        margin-bottom: 1rem;
    }

    .btn-success {
        background-color: #2B4F6E;
        border: none;
        color: white;
        padding: 0.5rem 1.5rem;
        border-radius: 2rem;
        font-size: 0.875rem;
        font-weight: 600;
        transition: all 0.2s ease;
        cursor: pointer;
        width: 100%;
    }

    .btn-success:hover {
        background-color: #1f3a50;
    }

    .text-dark {
        color: #333 !important;
    }
</style>

<div class="pt- sm:pt-12 md:pt-24 lg:pt-32 xl:pt-20 pb-16 sm:pb-12 md:pb-24 lg:pb-32 xl:pb-40 flex items-center justify-center min-h-screen">
    <!-- main glass card container -->
    <div class="w-full max-w-md glass-card rounded-3xl overflow-hidden shadow-2xl border border-white/40 text-[#1e3a5f] mx-4">

        <!-- decorative top bar with soft blue & pink accent -->
        <div class="h-2 w-full flex">
            <div class="w-1/2 bg-[#E6F2FC]"></div>
            <div class="w-1/2 bg-[#F9B0B0]"></div>
        </div>

        <!-- inner padding (mobile friendly) -->
        <div class="px-6 py-8 md:px-8">
            <!-- OTP Timer Display -->
            <div class="text-center mb-4">
                <p class="text-lg font-medium text-[#1A3B4F]">
                    OTP expires in:
                    <span id="otp-timer" class="timer text-[#C63E5A] font-bold"></span>
                </p>
            </div>

            <!-- Display validation errors if any -->
            @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-2xl text-sm mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- Display session messages -->
            @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-2xl text-sm mb-4">
                {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-2xl text-sm mb-4">
                {{ session('error') }}
            </div>
            @endif

            @if($isOtpExpiresValid)
            <div id="otp-section" class="space-y-5 transition-opacity duration-200">
                <form method="POST" action="{{ route('otp.verify') }}" class="space-y-5">
                    @csrf

                    <!-- OTP Code Input -->
                    <div>
                        <label for="otp" class="block text-sm font-medium text-[#1A3B4F] mb-1">
                            <i class="far fa-envelope mr-2 text-[#C63E5A]"></i>OTP Code
                        </label>
                        <input type="hidden" class="bg-white/80" name="email" value="{{$email}}">
                        <input
                            type="text"
                            name="otp"
                            id="otp"
                            value="{{ old('otp') }}"
                            placeholder="Enter 6-digit OTP"
                            class="w-full px-5 py-3 rounded-2xl border transition text-sm outline-none bg-white/80
                                @error('otp') 
                                    border-red-500 focus:ring-red-200 
                                @else 
                                    border-[#d3e4f0] focus:ring-2 focus:ring-[#F9B0B0] focus:border-transparent 
                                @enderror"
                            autofocus
                            required
                            maxlength="6"
                            title="Please enter a 6-digit OTP">
                        @error('otp')
                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button
                        type="submit"
                        class="w-full bg-[#2B4F6E] hover:bg-[#1f3a50] text-white font-bold py-3.5 rounded-2xl shadow-md transition flex items-center justify-center gap-2">
                        <i class="fas fa-sign-in-alt"></i> Verify OTP
                    </button>
                </form>
            </div>
            @else
            <!-- Resend OTP Section (shown when OTP expired) -->
            <div id="resend-section" class="space-y-4 transition-opacity duration-200">
                <div class="alert-warning p-4 rounded-2xl text-center">
                    <i class="fas fa-exclamation-triangle text-[#C63E5A] mr-2"></i>
                    <span class="font-medium">The OTP has expired. Click below to receive a new OTP.</span>
                </div>

                <form action="{{ route('otp.resend') }}" method="POST" class="text-center">
                    @csrf
                    <input type="hidden" class="bg-white/80" name="email" value="{{$email}}">
                    <button type="submit" class="btn-success w-full py-3 px-4 rounded-2xl flex items-center justify-center gap-2">
                        <i class="fas fa-paper-plane"></i>
                        Resend OTP
                    </button>
                </form>
            </div>
            @endif
            <!-- Back to Login Link -->
            <div class="text-center mt-6">
                <a href="{{ route('login') }}" class="text-sm text-[#2B4F6E] hover:text-[#C63E5A] transition">
                    <i class="fas fa-arrow-left mr-1"></i> Back to login
                </a>
            </div>
        </div>
    </div>
</div>

@endsection


@push('scripts')
<script>
    const expiresAt = "{{ $expires }}"; // Example: 2026-03-31 23:30:52
    const timerElement = document.getElementById("otp-timer");

    function updateOtpTimer() {
        const expiryTime = new Date(expiresAt.replace(" ", "T")).getTime();
        const now = new Date().getTime();
        const distance = expiryTime - now;

        if (distance <= 0) {
            timerElement.innerHTML = "Expired";
            clearInterval(timerInterval);
            return;
        }

        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        timerElement.innerHTML =
            String(minutes).padStart(2, '0') + ":" + String(seconds).padStart(2, '0');
    }

    updateOtpTimer(); // Run immediately
    const timerInterval = setInterval(updateOtpTimer, 1000);
</script>
@endpush