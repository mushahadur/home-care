<!-- Topbar -->
      <!-- ========== TOP HEADER ========== -->
      <header
        class="bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-800 px-4 md:px-6 py-3 flex items-center justify-between shadow-sm transition-colors flex-shrink-0">
        <div class="flex items-center gap-4">
          <button
            id="open-sidebar"
            class="md:hidden text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">
            <i class="fa-solid fa-bars text-xl"></i>
          </button>

          <!-- Dashboard heading with icon -->
          <div class="flex items-center gap-3">
            <i class="fa-solid fa-gauge-high text-emerald-600 text-2xl"></i>
            <h1 class="text-xl md:text-2xl font-semibold">Dashboard</h1>
          </div>
        </div>

        <div class="flex items-center gap-4">
          <!-- Dark / Light toggle button -->
          <button
            id="theme-toggle"
            class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white focus:outline-none transition">
            <i id="theme-icon" class="fa-solid fa-moon text-xl"></i>
          </button>

          <button
            class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white relative">
            <i class="fa-solid fa-bell text-xl"></i>
            <span
              class="absolute -top-1 -right-1 w-4 h-4 bg-red-500 rounded-full text-[10px] flex items-center justify-center text-white">3</span>
          </button>

          <!-- User Profile Dropdown - Working Version -->
          <div
            class="flex items-center gap-3 relative"
            id="userDropdownContainer">
            <!-- Avatar Button -->
            <div class="relative">
              <button
                id="dropdownToggle"
                type="button"
                class="flex items-center justify-center w-10 h-10 rounded-full focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900 transition-all"
                aria-haspopup="true"
                aria-expanded="false">
                <img
                  class="w-10 h-10 rounded-full border-2 border-emerald-500 object-cover"
                  src="https://lh3.googleusercontent.com/a/ACg8ocKe8UJbs87S75Kp0E6i41iB-nPlbvF2ty5NHxEey1b-Kg2gyUl5=s288-c-no"
                  alt="Avatar"
                  onerror="
                      this.src =
                        'https://ui-avatars.com/api/?name=Aigars+S&background=10b981&color=fff'
                    " />
              </button>

              <!-- Online Status Indicator (Optional) -->
              <span
                class="absolute bottom-0 right-0 w-3 h-3 bg-emerald-500 border-2 border-white dark:border-gray-900 rounded-full"></span>
            </div>

            <!-- User Info (Hidden on mobile) -->
            <div class="hidden sm:block">
              <p class="font-medium text-gray-900 dark:text-white">
                Aigars S.
              </p>
              <p class="text-xs text-gray-500 dark:text-gray-400">Admin</p>
            </div>

            <!-- Dropdown Menu -->
            <div
              id="dropdownMenu"
              class="absolute right-0 top-full mt-2 w-52 bg-white dark:bg-gray-800 rounded-md shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden transition-all duration-200 origin-top-right scale-95 opacity-0 pointer-events-none z-50"
              style="transform-origin: top right"
              role="menu"
              aria-orientation="vertical"
              aria-labelledby="dropdownToggle">
              <!-- User Header -->
              <div
                class="px-4 py-3 bg-gray-50 dark:bg-gray-700/50 border-b border-gray-200 dark:border-gray-700">
                <p class="text-xs text-gray-500 dark:text-gray-400">
                  Signed in as
                </p>
                <p
                  class="text-sm font-semibold text-gray-900 dark:text-white">
                  Aigars S.
                </p>
                <p
                  class="text-xs text-gray-500 dark:text-gray-400 truncate mt-1">
                  mrk@gmail.com
                </p>
              </div>

              <!-- Menu Items -->
              <div class="p-1.5">
                <!-- Newsletter -->
                <a
                  href="#"
                  class="flex items-center gap-3 px-3 py-2.5 rounded-md text-sm text-gray-700 dark:text-gray-300 hover:bg-emerald-50 dark:hover:bg-emerald-500/10 hover:text-emerald-700 dark:hover:text-emerald-400 transition-colors group">
                  <i
                    class="fa-regular fa-bell text-gray-400 group-hover:text-emerald-500 text-base w-5"></i>
                  <span>Newsletter</span>
                </a>

                <!-- Purchases -->
                <a
                  href="#"
                  class="flex items-center gap-3 px-3 py-2.5 rounded-md text-sm text-gray-700 dark:text-gray-300 hover:bg-emerald-50 dark:hover:bg-emerald-500/10 hover:text-emerald-700 dark:hover:text-emerald-400 transition-colors group">
                  <i
                    class="fa-regular fa-folder text-gray-400 group-hover:text-emerald-500 text-base w-5"></i>
                  <span>Purchases</span>
                </a>

                <!-- Downloads -->
                <a
                  href="#"
                  class="flex items-center gap-3 px-3 py-2.5 rounded-md text-sm text-gray-700 dark:text-gray-300 hover:bg-emerald-50 dark:hover:bg-emerald-500/10 hover:text-emerald-700 dark:hover:text-emerald-400 transition-colors group">
                  <i
                    class="fa-regular fa-circle-down text-gray-400 group-hover:text-emerald-500 text-base w-5"></i>
                  <span>Downloads</span>
                  <span
                    class="ml-auto bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-400 text-xs px-1.5 py-0.5 rounded-full">3</span>
                </a>

                <!-- Team Account -->
                <a
                  href="#"
                  class="flex items-center gap-3 px-3 py-2.5 rounded-md text-sm text-gray-700 dark:text-gray-300 hover:bg-emerald-50 dark:hover:bg-emerald-500/10 hover:text-emerald-700 dark:hover:text-emerald-400 transition-colors group">
                  <i
                    class="fa-regular fa-users text-gray-400 group-hover:text-emerald-500 text-base w-5"></i>
                  <span>Team Account</span>
                </a>

                <!-- Divider -->
                <div
                  class="my-1.5 border-t border-gray-200 dark:border-gray-700"></div>

                <!-- Settings -->
                <a
                  href="#"
                  class="flex items-center gap-3 px-3 py-2.5 rounded-md text-sm text-gray-700 dark:text-gray-300 hover:bg-emerald-50 dark:hover:bg-emerald-500/10 hover:text-emerald-700 dark:hover:text-emerald-400 transition-colors group">
                  <i
                    class="fa-regular fa-gear text-gray-400 group-hover:text-emerald-500 text-base w-5"></i>
                  <span>Settings</span>
                </a>

                <!-- Logout Form -->
                <form method="POST" action="{{ route('logout') }}" class="block">
                                @csrf
                  <button
                    type="submit"
                    class="flex items-center gap-3 px-3 py-2.5 w-full text-left rounded-md text-sm text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-500/10 transition-colors group">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                                        <polyline points="16 17 21 12 16 7" />
                                        <line x1="21" y1="12" x2="9" y2="12" />
                                    </svg>
                    <span>Logout</span>
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </header>