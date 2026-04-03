  <!-- Sidebar - Fixed Structure with Scrollable Nav and Fixed Profile -->
    <aside
      id="sidebar"
      class="fixed inset-y-0 left-0 z-50 w-72 bg-white dark:bg-gray-900 border-r border-gray-200 dark:border-gray-800 transform -translate-x-full md:translate-x-0 transition-transform duration-300 flex flex-col">
      <!-- ===== HEADER - Fixed at top ===== -->
      <div
        class="flex items-center justify-between p-4 border-b border-gray-200 dark:border-gray-800 flex-shrink-0">
        <div class="flex items-center gap-3">
          <div
            class="w-8 h-8 rounded-lg bg-emerald-600 flex items-center justify-center text-white font-bold text-xl">
            CL
          </div>
          <span
            class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">Company LOGO</span>
        </div>
        <button
          id="close-sidebar"
          class="md:hidden text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">
          <i class="fa-solid fa-xmark text-2xl"></i>
        </button>
      </div>

      @php
          $activeClass = 'bg-emerald-600 text-white';
          $inactiveClass = 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800';
      @endphp

      <!-- Navigation - Scrollable -->
      <nav class="flex-1 overflow-y-auto p-4 space-y-1 custom-scrollbar">
        <!-- Main Menu Items -->
        <div class="space-y-1">
            <a href="{{ route('admin.dashboard') }}"
              class="nav-link flex items-center gap-3 px-4 py-3 rounded-lg transition-colors
              {{ request()->routeIs('admin.dashboard') ? $activeClass : $inactiveClass }}">
                <i class="fa-solid fa-gauge w-5"></i>
                <span class="text-sm font-medium">Dashboard</span>
            </a>


          <a href="#" class="nav-link flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
            <i class="fa-solid fa-chart-line w-5"></i>
            <span class="text-sm font-medium">Analytics</span>
          </a>

          <a
            href="#"
            class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
            <i class="fa-solid fa-address-book w-5"></i>
            <span class="text-sm font-medium">Profile</span>
          </a>
        </div>

        <!-- Separator -->
        <div class="my-4 border-t border-gray-200 dark:border-gray-800"></div>

        <!-- Settings Section -->
        <div class="space-y-1">
          <p
            class="px-4 py-2 text-xs font-semibold text-gray-400 uppercase tracking-wider">
            Settings
          </p>

          @can('users-list')
            <a href="{{ route('users.index') }}"
              class="nav-link flex items-center gap-3 px-4 py-3 rounded-lg transition-colors
              {{ request()->routeIs('users.*') ? $activeClass : $inactiveClass }}">
                <i class="fa-solid fa-users w-5"></i>
                <span class="text-sm font-medium">Users</span>
            </a>
          @endcan

           @can('roles-list')
            <a href="{{ route('roles.index') }}"
              class="nav-link flex items-center gap-3 px-4 py-3 rounded-lg transition-colors
              {{ request()->routeIs('roles.*') ? $activeClass : $inactiveClass }}">
                <i class="fa-solid fa-gear w-5"></i>
                <span class="text-sm font-medium">Roles</span>
            </a>
          @endcan
        </div>

        
        <!-- Separator -->
        <div class="my-4 border-t border-gray-200 dark:border-gray-800"></div>

        <!-- Pages Section -->
        <div class="space-y-1">
          <p
            class="px-4 py-2 text-xs font-semibold text-gray-400 uppercase tracking-wider">
            Pages
          </p>

          @can('care-services-list')
            <a href="{{ route('care-services.index') }}"
              class="nav-link flex items-center gap-3 px-4 py-3 rounded-lg transition-colors
              {{ request()->routeIs('care-services.*') ? $activeClass : $inactiveClass }}">
               <i class="fa-solid fa-hand-holding-heart"></i>
                <span class="text-sm font-medium">Services</span>
            </a>
          @endcan

            <a
            href="#"
            class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
            <i class="fa-solid fa-box w-5"></i>
            <span class="text-sm font-medium">Products</span>
          </a>
        </div>
        <!-- Separator -->
        <div class="my-4 border-t border-gray-200 dark:border-gray-800"></div>

        <!-- Applications Section -->
        <div class="space-y-1">
          <p
            class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">
            Applications
          </p>

          <a
            href="#"
            class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
            <i class="fa-solid fa-calendar w-5"></i>
            <span class="text-sm font-medium">Calendar</span>
          </a>

          <a
            href="#"
            class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
            <i class="fa-solid fa-message w-5"></i>
            <span class="text-sm font-medium">Messages</span>
            <span
              class="ml-auto bg-red-500 text-white text-xs px-2 py-0.5 rounded-full">3</span>
          </a>

          <a
            href="#"
            class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
            <i class="fa-solid fa-bell w-5"></i>
            <span class="text-sm font-medium">Notifications</span>
            <span
              class="ml-auto bg-emerald-500 text-white text-xs px-2 py-0.5 rounded-full">12</span>
          </a>

          <a
            href="#"
            class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
            <i class="fa-solid fa-file w-5"></i>
            <span class="text-sm font-medium">Documents</span>
          </a>
        </div>

      
        <!-- Extra items to demonstrate scrolling -->
        <div class="space-y-1">
          <p
            class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider">
            Extra
          </p>

          <a
            href="#"
            class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
            <i class="fa-solid fa-box w-5"></i>
            <span class="text-sm font-medium">Products</span>
          </a>

          <a
            href="#"
            class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
            <i class="fa-solid fa-truck w-5"></i>
            <span class="text-sm font-medium">Orders</span>
          </a>

          <a
            href="#"
            class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
            <i class="fa-solid fa-tag w-5"></i>
            <span class="text-sm font-medium">Discounts</span>
          </a>

          <a
            href="#"
            class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
            <i class="fa-solid fa-chart-pie w-5"></i>
            <span class="text-sm font-medium">Reports</span>
          </a>

          <a
            href="#"
            class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
            <i class="fa-solid fa-database w-5"></i>
            <span class="text-sm font-medium">Backup</span>
          </a>
        </div>
      </nav>

      <!-- ===== USER PROFILE - Fixed at bottom ===== -->
      <div
        class="p-4 border-t border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900 flex-shrink-0">
        <div class="flex items-center">
          <img
            src="https://randomuser.me/api/portraits/men/32.jpg"
            alt="Admin"
            class="w-10 h-10 rounded-full ring-2 ring-emerald-500 ring-offset-2 dark:ring-offset-gray-900" />
          <div class="ml-3 flex-1">
            <p class="text-sm font-semibold text-gray-900 dark:text-white">
              Admin User
            </p>
            <p class="text-xs text-gray-500 dark:text-gray-400 truncate">
              admin@jobpilot.com
            </p>
          </div>
          <!-- Logout button -->
           <form method="POST" action="{{ route('logout') }}" class="block">
                                @csrf
          <button type="submit" class="p-2 text-gray-500 hover:text-red-600 dark:text-gray-400 dark:hover:text-red-400 transition-colors">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
          </button>
           </form>
        </div>
      </div>
    </aside>