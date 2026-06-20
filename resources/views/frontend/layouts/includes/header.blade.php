    <nav
      class="sticky top-0 z-50 backdrop-blur-2xl bg-gradient-to-r from-white/20 via-white/10 to-white/20 border-b border-white/15 shadow-xl"
    >
      <div
        class="container mx-auto px-6 lg:px-12 py-3 flex items-center justify-between flex-wrap gap-4"
      >
        <!-- logo / name with pink dot -->
        <a class="flex items-center gap-2 cursor-pointer" href="{{route('home')}}">
          <div class="text-2xl sm:text-3xl font-light blue-primary">
            Nurse<span class="font-semibold text-rose-600"
              >NextDoor</span
            >
          </div>
          <div class="w-3 h-3 rounded-full pink-accent hidden sm:block"></div>
          </a>
        <!-- menu links + super user -->
        <div class="flex items-center gap-6 text-sm md:text-base flex-wrap">
          <a
            href="{{route('home')}}"
            class="text-[#2B4F6E] hover:text-[#C63E5A] font-medium transition"
            >Home</a
          >
          <a
            href="{{route('home')}}#service"
            class="text-[#2B4F6E] hover:text-[#C63E5A] font-medium transition"
            >Services</a
          >
          <!-- super user login button (soft blue bg, pink accent) -->
           @if (Auth::user())
           <a href="{{route('user.profile')}}"
             class="ml-2 flex items-center gap-2 bg-[#E6F2FC] px-4 py-2 rounded-lg text-[#2B4F6E] font-medium border border-[#B8D9F5] hover:bg-[#FCE4E4] hover:border-[#F9B0B0] transition">
             <i class="fas fa-user text-[#C63E5A]"></i>
             <span>{{Auth::user()->name}}</span>
           </a>
           <!-- Logout Form -->
              <form method="POST" action="{{ route('logout') }}" class="block">
                                @csrf
                <button
                  class="inline-flex items-center gap-2 px-2 py-2 rounded-lg border border-rose-600 transition shadow-sm"
                >
                  <i class="fas fa-sign-out-alt text-[#C63E5A]"></i> 
                </button>
              </form>
           @else
           <a
             href="{{route('login')}}"
             class="ml-2 flex items-center gap-2 bg-[#E6F2FC] px-4 py-2 rounded-md text-[#2B4F6E] font-medium border border-[#B8D9F5] hover:bg-[#FCE4E4] hover:border-[#F9B0B0] transition"
           >
             <i class="fas fa-user-lock text-[#C63E5A]"></i>
             <span>Login</span>
           </a>
           @endif
        </div>
      </div>
    </nav>