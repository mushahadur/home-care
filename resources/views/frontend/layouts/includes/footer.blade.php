 
    <!-- <footer class="bg-gradient-to-br from-white to-[#ffe2f1] border-t border-soft-blue py-8 relative"> -->
    <footer class="bg-gray-900 border-t border-soft-blue py-8 relative">
      <!-- Floating Municipality Badge -->
      <div
        class="absolute -top-6 left-1/2 -translate-x-1/2 w-full px-4 flex justify-center"
      >
        <div
          class="bg-[#2B4F6E] text-white rounded-full shadow-lg flex items-center justify-center gap-2 md:gap-3 px-4 md:px-7 py-2 md:py-2.5 text-xs sm:text-sm md:text-base lg:text-lg font-medium tracking-wide max-w-max text-center"
        >
          <i
            class="fas fa-map-marker-alt text-[#F9B0B0] text-sm md:text-base"
          ></i>

          <span class="leading-tight whitespace-normal">
            এক্সক্লুসিভ ব্রাহ্মণবাড়িয়া municipality · Exclusive to
            Brahmanbaria
          </span>

          <i class="fas fa-city text-white/70 text-sm md:text-base"></i>
        </div>
      </div>

      <!-- footer columns with simple links & again geographic focus -->
      <div
        class="container mx-auto px-6 lg:px-12 py-16 lg:py-10 pt-10 grid grid-cols-1 md:grid-cols-4 gap-8 text-sm"
      >
        <div>
          <h4 class="font-bold text-[#1A3B4F] text-lg">Nurse Next Door</h4>
          <p class="text-gray-500 mt-2">
            professional home care <br />
            Brahmanbaria’s heart.
          </p>
          <div class="flex gap-3 mt-4">
            <span
              class="w-8 h-8 soft-blue-bg rounded-full flex items-center justify-center text-[#2B4F6E]"
              ><i class="fab fa-facebook-f"></i
            ></span>
            <span
              class="w-8 h-8 soft-blue-bg rounded-full flex items-center justify-center text-[#2B4F6E]"
              ><i class="fab fa-whatsapp"></i
            ></span>
          </div>
        </div>
        <div>
          <h5 class="font-semibold text-[#2B4F6E]">Quick links</h5>
          <ul class="mt-3 space-y-2 text-gray-500">
            <li><a href="#" class="hover:text-[#C63E5A]">Home</a></li>
            <li><a href="#" class="hover:text-[#C63E5A]">About</a></li>
            <li><a href="#" class="hover:text-[#C63E5A]">Services</a></li>
            <li><a href="#" class="hover:text-[#C63E5A]">Working Stuffs</a></li>
          </ul>
        </div>
        <div>
          <h5 class="font-semibold text-[#2B4F6E]">Legal & consent</h5>
          <ul class="mt-3 space-y-2 text-gray-500">
            <li>
              <i class="far fa-file-alt text-[#C63E5A] mr-1"></i> prescription
              required
            </li>
            <li>
              <i class="far fa-check-circle text-[#C63E5A] mr-1"></i> signed
              consent
            </li>
            <li>
              <i class="fas fa-shield-alt text-[#2B4F6E] mr-1"></i> privacy
              policy
            </li>
          </ul>
        </div>
        <div>
          <h5 class="font-semibold text-[#2B4F6E]">Service area</h5>
          <div class="mt-3 bg-gray-950 p-4 rounded-lg border border-[#B8D9F5]">
            <p class="font-medium flex items-center gap-2 text-[#1A3B4F]">
              <i class="fas fa-map-pin text-[#C63E5A]"></i> exclusively within
            </p>
            <p class="text-lg font-bold text-[#2B4F6E]">
              ব্রাহ্মণবাড়িয়া পৌরসভা
            </p>
            <p class="text-sm text-gray-600">Brahmanbaria Municipality only</p>
          </div>
        </div>
      </div>
      <button
        id="scrollToTopProgress"
        class="fixed bottom-6 right-4 z-50 w-10 h-10 rounded-full bg-white shadow-xl border border-red-600 flex items-center justify-center group hover:border-[var(--accent)] transition-all duration-300 opacity-0 scale-90 pointer-events-none"
        aria-label="Scroll to top"
      >
        <div class="relative w-8 h-8">
          <svg class="w-full h-full -rotate-90" viewBox="0 0 24 24">
            <circle
              class="text-gray-200"
              cx="18"
              cy="18"
              r="16"
              fill="none"
              stroke-width="2.5"
            ></circle>
            <circle
              id="progressCircle"
              class="text-[var(--accent)] transition-all duration-500"
              cx="18"
              cy="18"
              r="16"
              fill="none"
              stroke-width="2.5"
              stroke-dasharray="100.53"
              stroke-dashoffset="100.53"
            ></circle>
          </svg>
          <div
            class="absolute inset-0 flex items-center justify-center text-[var(--primary)] group-hover:text-[var(--accent)]"
          >
            <i class="fas fa-arrow-up text-xl"></i>
          </div>
        </div>
      </button>

      <div
        class="text-center text-xs text-white mt-10 border-t border-soft-blue pt-5"
      >
        © Nurse Next Door — compassionate home nursing, Brahmanbaria. 💙
        doctor’s prescription & consent mandatory.
      </div>
    </footer>


    <!-- <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script> -->
    <!-- <script src="js/swiper-bundle.min.js"></script> -->
     <!-- <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script> -->
    <script src="{{ asset('assets/frontend/js/swiper-bundle.min.js') }}"></script> 
    <script src="{{ asset('assets/frontend/js/alpine.min.js') }}"></script> 
    <script src="{{ asset('assets/frontend/js/custom.js') }}"></script> 
    <!-- tiny "super user" hint (floating?) but already in nav -->
   