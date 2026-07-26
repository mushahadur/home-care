<nav class="sticky top-0 z-50 backdrop-blur-2xl bg-gradient-to-r from-white/20 via-white/10 to-white/20 border-b border-white/15 shadow-xl">
    <div class="container mx-auto px-2 lg:px-12 py-3 flex items-center justify-between flex-wrap gap-1 md:gap-2 lg:gap-4 xl:gap-4 2xl:gap-6">

        <!-- Logo -->
        <a class="flex items-center gap-2 cursor-pointer" href="{{ route('home') }}">
            <div class="text-sm md:text-2xl lg:text-3xl xl:text-3xl 2xl:text-3xl font-light blue-primary">
                Home<span class="font-semibold text-rose-600">Care</span>
            </div>
            <div class="w-3 h-3 rounded-full pink-accent hidden sm:block"></div>
        </a>

        <!-- Right side: menu links + language dropdown + auth buttons -->
        <div class="flex items-center gap-2 md:gap-4 lg:gap-6 xl:gap-6 text-xs md:text-sm lg:text-md xl:text-md 2xl:text-lg font-light blue-primary">

            <!-- Language Dropdown (Tailwind + Vanilla JS) -->
            <div class="relative" id="langDropdown">
                <button type="button" id="langToggle"
                    class="flex items-center gap-1 px-1 py-2 rounded-lg bg-white/20 hover:bg-white/30 text-[#2B4F6E] font-medium transition border border-white/10 focus:outline-none focus:ring-2 focus:ring-rose-400">
                    <span>{{ Config::get('languages')[App::getLocale()] }}</span>
                    <i class="fas fa-chevron-down text-xs"></i>
                </button>

                <!-- Dropdown menu -->
                <div id="langMenu"
                    class="absolute right-0 mt-2 w-18 bg-white/90 backdrop-blur-md rounded-xl shadow-lg border border-white/20 overflow-hidden hidden origin-top-right transition-all duration-200">
                    @foreach (Config::get('languages') as $lang => $language)
                    @if ($lang != App::getLocale())
                    <a href="{{ route('lang.switch', $lang) }}"
                        class="block px-4 py-1.5 text-[#2B4F6E] hover:bg-rose-50 hover:text-rose-600 transition">
                        {{ $language }}
                    </a>
                    @endif
                    @endforeach
                </div>
            </div>

            <!-- Home -->
            <a href="{{ route('home') }}" class="text-[#2B4F6E] hover:text-[#C63E5A] font-medium transition">{{ __('menu.home') }}</a>

            <!-- Services -->
            <a href="{{ route('home') }}#service" class="text-[#2B4F6E] hover:text-[#C63E5A] font-medium transition">{{ __('menu.services') }}</a>

            <!-- Auth section -->
            @if (Auth::user())
            <a href="{{ route('user.profile') }}"
                class="ml-2 flex items-center gap-2 bg-[#E6F2FC] px-4 py-2 rounded-lg text-[#2B4F6E] font-medium border border-[#B8D9F5] hover:bg-[#FCE4E4] hover:border-[#F9B0B0] transition">
                <i class="fas fa-user text-[#C63E5A]"></i>
                <span>{{ Auth::user()->name }}</span>
            </a>
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="inline-flex items-center gap-2 px-2 py-2 rounded-lg border border-rose-600 transition shadow-sm">
                    <i class="fas fa-sign-out-alt text-[#C63E5A]"></i>
                </button>
            </form>
            @else
            <a href="{{ route('login') }}"
                class="ml-2 flex items-center gap-2 bg-[#E6F2FC] px-2 py-1 rounded-md text-[#2B4F6E] font-medium border border-[#B8D9F5] hover:bg-[#FCE4E4] hover:border-[#F9B0B0] transition">
                <i class="fas fa-user-lock text-[#C63E5A]"></i>
                <span>{{ __('menu.login') }}</span>
            </a>
            <a style="display: none;" href="{{ route('register') }}"
                class="ml-2 flex items-center gap-2 bg-[#E6F2FC] px-4 py-2 rounded-md text-[#2B4F6E] font-medium border border-[#B8D9F5] hover:bg-[#FCE4E4] hover:border-[#F9B0B0] transition">
                <i class="fas fa-user-plus text-[#C63E5A]"></i>
                <span>{{ __('menu.register') }}</span>
            </a>
            @endif
        </div>
    </div>
</nav>

<!-- Inline JavaScript for dropdown toggle -->
<script>
    (function() {
        const toggle = document.getElementById('langToggle');
        const menu = document.getElementById('langMenu');

        if (toggle && menu) {
            toggle.addEventListener('click', function(e) {
                e.stopPropagation();
                const isOpen = !menu.classList.contains('hidden');
                menu.classList.toggle('hidden');
                // optional: rotate chevron
                const icon = toggle.querySelector('i.fa-chevron-down');
                if (icon) icon.classList.toggle('rotate-180');
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', function(e) {
                const container = document.getElementById('langDropdown');
                if (container && !container.contains(e.target)) {
                    menu.classList.add('hidden');
                    const icon = toggle.querySelector('i.fa-chevron-down');
                    if (icon) icon.classList.remove('rotate-180');
                }
            });
        }
    })();
</script>