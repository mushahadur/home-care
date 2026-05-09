@extends('frontend.layouts.app')

@section('title')
Login - NurseNextDoor
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
        font-family: 'Inter', system-ui, -apple-system, sans-serif;" class="pt-12 sm:pt-12 md:pt-24 lg:pt-32 xl:pt-20 pb-16  sm:pb-12 md:pb-24 lg:pb-32 xl:pb-40 flex items-center justify-center">
    <!-- main glass card container -->
    <div class="w-full max-w-md glass-card rounded-3xl overflow-hidden shadow-2xl border border-white/40 text-[#1e3a5f]">

        <!-- decorative top bar with soft blue & pink accent -->
        <div class="h-2 w-full flex">
            <div class="w-1/2 bg-[#E6F2FC]"></div>
            <div class="w-1/2 bg-[#F9B0B0]"></div>
        </div>

        <!-- inner padding (mobile friendly) -->
        <div class="px-6 py-8 md:px-8">

            <!-- === LOGIN / REGISTER TOGGLE (two tabs) === -->
            <div class="flex rounded-full bg-[#f0f5fa] p-1 mb-8">
                <button id="tabLoginBtn" class="auth-toggle-transition flex-1 py-3 text-sm font-semibold rounded-full bg-white shadow-sm text-[#2B4F6E] transition-all">Login</button>
                <button id="tabRegisterBtn" class="auth-toggle-transition flex-1 py-3 text-sm font-semibold rounded-full text-[#4a627a] hover:text-[#2B4F6E] transition-all">Register</button>
            </div>

            <!-- === LOGIN FORM (Laravel Blade optimized) === -->
            <div id="loginForm" class="space-y-5 transition-opacity duration-200">
                <!-- CSRF protection (Laravel) & session error display (optional but recommended) -->
                @csrf

                <!-- display validation errors if any (optional, but good practice) -->
                @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-2xl text-sm mb-4">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf
                    <!-- email / phone (using Laravel old() helper) -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-[#1A3B4F] mb-1">
                            <i class="far fa-envelope mr-2 text-[#C63E5A]"></i>Email or phone
                        </label>
                        <input
                            type="text"
                            name="email"
                            id="email"
                            value="{{ old('email') }}"
                            placeholder="you@example.com / +8801XXXXXXXXX"
                            class="w-full px-5 py-3 rounded-2xl border border-[#d3e4f0] bg-white/80 focus:ring-2 focus:ring-[#F9B0B0] focus:border-transparent outline-none transition text-sm @error('email') border-red-500 @enderror"
                            autofocus
                            required>
                        @error('email')
                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-[#1A3B4F] mb-1">
                            <i class="fas fa-lock mr-2 text-[#C63E5A]"></i>Password
                        </label>
                        <input
                            type="password"
                            name="password"
                            id="password"
                            placeholder="••••••••"
                            class="w-full px-5 py-3 rounded-2xl border border-[#d3e4f0] bg-white/80 focus:ring-2 focus:ring-[#F9B0B0] focus:border-transparent outline-none transition text-sm @error('password') border-red-500 @enderror"
                            required>
                        @error('password')
                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- remember & forgot -->
                    <div class="flex items-center justify-between text-sm">
                        <label class="flex items-center gap-2 text-[#2B4F6E] cursor-pointer">
                            <input
                                type="checkbox"
                                name="remember"
                                id="remember"
                                {{ old('remember') ? 'checked' : '' }}
                                class="rounded border-[#b8d1e5] text-[#C63E5A] focus:ring-[#F9B0B0]">
                            <span>Remember me</span>
                        </label>
                        <a href="{{ route('password.request') }}" class="text-[#C63E5A] hover:underline">
                            Forgot password?
                        </a>
                    </div>

                    <!-- submit button -->
                    <button
                        type="submit"
                        class="w-full bg-[#2B4F6E] hover:bg-[#1f3a50] text-white font-bold py-3.5 rounded-2xl shadow-md transition flex items-center justify-center gap-2">
                        <i class="fas fa-sign-in-alt"></i> Sign in
                    </button>
                </form>
                <!-- divider with "or" (optional, if you have social login) -->


                <!-- switch to register hint (mobile friendly) -->
                <p class="text-center text-sm text-[#3b5d7a] mt-4 md:hidden">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="text-[#C63E5A] font-semibold hover:underline">
                        Register
                    </a>
                </p>
            </div>

            <!-- === REGISTER FORM (hidden by default) === -->
            <div id="registerForm" class="space-y-5 hidden transition-opacity duration-200">
                <!-- full name -->
                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf
                    
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

                    <!-- Full name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-[#1A3B4F] mb-1">
                            <i class="far fa-user mr-2 text-[#C63E5A]"></i>Full name
                        </label>
                        <input 
                            type="text" 
                            name="name" 
                            id="name" 
                            value="{{ old('name') }}" 
                            placeholder="Dr. Mrinal Kanti" 
                            class="w-full px-5 py-3 rounded-2xl border transition text-sm outline-none
                                @error('name') 
                                    border-red-500 focus:ring-red-200 
                                @else 
                                    border-[#d3e4f0] focus:ring-2 focus:ring-[#F9B0B0] focus:border-transparent 
                                @enderror
                                bg-white/80"
                            required
                            autofocus
                        >
                        @error('name')
                            <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Email address -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-[#1A3B4F] mb-1">
                            <i class="far fa-envelope mr-2 text-[#C63E5A]"></i>Email address
                        </label>
                        <input 
                            type="email" 
                            name="email" 
                            id="email" 
                            value="{{ old('email') }}" 
                            placeholder="name@example.com" 
                            class="w-full px-5 py-3 rounded-2xl border transition text-sm outline-none
                                @error('email') 
                                    border-red-500 focus:ring-red-200 
                                @else 
                                    border-[#d3e4f0] focus:ring-2 focus:ring-[#F9B0B0] focus:border-transparent 
                                @enderror
                                bg-white/80"
                            required
                        >
                        @error('email')
                            <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Password + Confirm (grid) -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-[#1A3B4F] mb-1">
                                <i class="fas fa-lock mr-2 text-[#C63E5A]"></i>Password
                            </label>
                            <input 
                                type="password" 
                                name="password" 
                                id="password" 
                                placeholder="min. 8 chars" 
                                class="w-full px-5 py-3 rounded-2xl border transition text-sm outline-none
                                    @error('password') 
                                        border-red-500 focus:ring-red-200 
                                    @else 
                                        border-[#d3e4f0] focus:ring-2 focus:ring-[#F9B0B0] focus:border-transparent 
                                    @enderror
                                    bg-white/80"
                                required
                            >
                            @error('password')
                                <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-[#1A3B4F] mb-1">
                                <i class="fas fa-check-circle mr-2 text-[#C63E5A]"></i>Confirm
                            </label>
                            <input 
                                type="password" 
                                name="password_confirmation" 
                                id="password_confirmation" 
                                placeholder="re-enter" 
                                class="w-full px-5 py-3 rounded-2xl border transition text-sm outline-none
                                    @error('password') 
                                        border-red-500 focus:ring-red-200 
                                    @else 
                                        border-[#d3e4f0] focus:ring-2 focus:ring-[#F9B0B0] focus:border-transparent 
                                    @enderror
                                    bg-white/80"
                                required
                            >
                        </div>
                    </div>

                    <!-- Terms checkbox -->
                    <label for="terms" class="flex items-start gap-3 text-sm text-[#2B4F6E] cursor-pointer">
                        <input 
                            type="checkbox" 
                            name="terms" 
                            id="terms" 
                            {{ old('terms') ? 'checked' : '' }}
                            class="mt-1 rounded border-[#b8d1e5] text-[#C63E5A] focus:ring-[#F9B0B0]
                                @error('terms') border-red-500 @enderror"
                            required
                        >
                        <span>I agree to the <a href="#" class="text-[#C63E5A] underline">Terms</a> and privacy policy.</span>
                    </label>
                    @error('terms')
                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                    @enderror

                    <!-- Register button -->
                    <button 
                        type="submit" 
                        class="w-full bg-[#C63E5A] hover:bg-[#b12e4a] text-white font-bold py-3.5 rounded-2xl shadow-md transition flex items-center justify-center gap-2"
                    >
                        <i class="fas fa-user-plus"></i> Create account
                    </button>
                </form>
                <!-- hint to go back to login (mobile) -->
                <p class="text-center text-sm text-[#3b5d7a] mt-2 md:hidden">
                    Already have an account? <button id="mobileLoginTrigger" class="text-[#C63E5A] font-semibold">Login</button>
                </p>
            </div>
        </div>
    </div>
</div>
<!-- tiny JavaScript for tab switching (no Vue, just plain toggling) – mobile responsive + smooth -->
<script>
    (function() {
        const tabLogin = document.getElementById('tabLoginBtn');
        const tabRegister = document.getElementById('tabRegisterBtn');
        const loginForm = document.getElementById('loginForm');
        const registerForm = document.getElementById('registerForm');
        // mobile triggers inside forms
        const mobileRegisterTrigger = document.getElementById('mobileRegisterTrigger');
        const mobileLoginTrigger = document.getElementById('mobileLoginTrigger');

        function setActiveTab(isLogin) {
            if (isLogin) {
                // login active
                tabLogin.classList.add('bg-white', 'shadow-sm', 'text-[#2B4F6E]');
                tabLogin.classList.remove('text-[#4a627a]', 'hover:text-[#2B4F6E]');
                tabRegister.classList.remove('bg-white', 'shadow-sm', 'text-[#2B4F6E]');
                tabRegister.classList.add('text-[#4a627a]', 'hover:text-[#2B4F6E]');
                // show login, hide register
                loginForm.classList.remove('hidden');
                registerForm.classList.add('hidden');
            } else {
                // register active
                tabRegister.classList.add('bg-white', 'shadow-sm', 'text-[#2B4F6E]');
                tabRegister.classList.remove('text-[#4a627a]', 'hover:text-[#2B4F6E]');
                tabLogin.classList.remove('bg-white', 'shadow-sm', 'text-[#2B4F6E]');
                tabLogin.classList.add('text-[#4a627a]', 'hover:text-[#2B4F6E]');
                registerForm.classList.remove('hidden');
                loginForm.classList.add('hidden');
            }
        }

        // event listeners
        tabLogin.addEventListener('click', function(e) {
            e.preventDefault();
            setActiveTab(true);
        });
        tabRegister.addEventListener('click', function(e) {
            e.preventDefault();
            setActiveTab(false);
        });
        if (mobileRegisterTrigger) {
            mobileRegisterTrigger.addEventListener('click', function(e) {
                e.preventDefault();
                setActiveTab(false);
            });
        }
        if (mobileLoginTrigger) {
            mobileLoginTrigger.addEventListener('click', function(e) {
                e.preventDefault();
                setActiveTab(true);
            });
        }

        // initial state (login visible)
        setActiveTab(true);
    })();
</script>


@endsection