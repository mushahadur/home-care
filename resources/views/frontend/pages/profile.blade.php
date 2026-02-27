@extends('frontend.layouts.app')

@section('title')
    Profile
@endsection

@section('content')
 <main class="py-8 sm:py-12 px-4 sm:px-6 lg:px-8 max-w-6xl mx-auto">
      <!-- Profile Header -->
      <div
        class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden mb-8"
      >
        <div
          class="h-32 sm:h-40 bg-gradient-to-r from-[#2B4F6E] to-[#3a6a8f]"
        ></div>
        <div class="px-6 sm:px-10 pb-8 sm:pb-10 relative">
          <div class="absolute -top-16 left-6 sm:left-10">
            <div
              class="w-28 h-28 sm:w-32 sm:h-32 rounded-full border-4 border-white overflow-hidden shadow-xl bg-gray-200"
            >
              <img
                src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&auto=format&fit=crop&w=987&q=80"
                alt="User"
                class="w-full h-full object-cover"
              />
            </div>
          </div>
          <div class="pt-14 sm:pt-20">
            <div
              class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4"
            >
              <div>
                <h1 class="text-2xl sm:text-3xl font-bold text-gray-900">
                  Rahima Akter
                </h1>
                <p class="text-gray-600 mt-1">
                  +880 1712-345678 • rahima@example.com
                </p>
                <div class="flex items-center gap-4 mt-3 flex-wrap">
                  <span
                    class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-green-100 text-green-800"
                  >
                    <i class="fas fa-check-circle mr-1.5"></i> Verified
                  </span>
                  <span class="text-sm text-gray-500"
                    >Member since Feb 2025</span
                  >
                </div>
              </div>
              <button
                class="inline-flex items-center gap-2 px-6 py-2.5 bg-[var(--primary)] text-white rounded-lg hover:bg-[#1e3a54] transition shadow-sm"
              >
                <i class="fas fa-edit"></i> Edit Profile
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Tabs Navigation -->
      <div
        class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden"
      >
        <div class="border-b border-gray-200">
          <div class="flex overflow-x-auto scrollbar-hide px-2 sm:px-6">
            <button
              class="tab-btn py-4 px-5 sm:px-8 font-medium tab-active"
              data-tab="info"
            >
              Personal
            </button>
            <button
              class="tab-btn py-4 px-5 sm:px-8 font-medium tab-inactive"
              data-tab="orders"
            >
              Orders
            </button>
            <button
              class="tab-btn py-4 px-5 sm:px-8 font-medium tab-inactive"
              data-tab="addresses"
            >
              Addresses
            </button>
            <button
              class="tab-btn py-4 px-5 sm:px-8 font-medium tab-inactive"
              data-tab="security"
            >
              Security
            </button>
          </div>
        </div>

        <!-- Tab Contents -->
        <div class="p-6 sm:p-10">
          <!-- Personal Info -->
          <div id="info" class="tab-content active">
            <h2 class="text-xl sm:text-2xl font-bold text-gray-900 mb-6">
              Personal Information
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div>
                <label class="block text-sm font-medium text-gray-600 mb-1.5"
                  >Full Name</label
                >
                <p class="text-gray-900 font-medium">Rahima Akter</p>
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-600 mb-1.5"
                  >Phone Number</label
                >
                <p class="text-gray-900 font-medium">+880 1712-345678</p>
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-600 mb-1.5"
                  >Email</label
                >
                <p class="text-gray-900 font-medium">rahima.khan@example.com</p>
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-600 mb-1.5"
                  >Date of Birth</label
                >
                <p class="text-gray-900 font-medium">15 March 1992</p>
              </div>
              <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-600 mb-1.5"
                  >Blood Group</label
                >
                <p class="text-gray-900 font-medium">O+</p>
              </div>
            </div>
            <div class="mt-10">
              <button
                class="inline-flex items-center gap-2 px-6 py-3 bg-[var(--primary)] text-white rounded-lg hover:bg-[#1e3a54] transition"
              >
                <i class="fas fa-edit"></i> Edit Information
              </button>
            </div>
          </div>

          <!-- My Orders -->
          <div id="orders" class="tab-content">
            <h2 class="text-xl sm:text-2xl font-bold text-gray-900 mb-6">
              Recent Orders
            </h2>

            <div class="space-y-5">
              <!-- Order item -->
              <div
                class="border border-gray-200 rounded-xl p-5 hover:shadow-sm transition"
              >
                <div
                  class="flex flex-col sm:flex-row sm:items-center justify-between gap-4"
                >
                  <div>
                    <h3 class="font-semibold text-lg">IV Injection at Home</h3>
                    <p class="text-sm text-gray-600 mt-1">
                      Order #ORD-20260224-0789 • 24 Feb 2026, 10:30 AM
                    </p>
                  </div>
                  <div class="flex items-center gap-4">
                    <span
                      class="px-3 py-1 rounded-full text-sm bg-green-100 text-green-800 font-medium"
                      >Completed</span
                    >
                    <span class="font-bold text-[var(--accent)]">৳350</span>
                  </div>
                </div>
                <div class="mt-4 text-sm text-gray-600">
                  Patient: Md. Rahim • Kandipara, Brahmanbaria
                </div>
              </div>

              <!-- Another order -->
              <div
                class="border border-gray-200 rounded-xl p-5 hover:shadow-sm transition"
              >
                <div
                  class="flex flex-col sm:flex-row sm:items-center justify-between gap-4"
                >
                  <div>
                    <h3 class="font-semibold text-lg">Wound Dressing</h3>
                    <p class="text-sm text-gray-600 mt-1">
                      Order #ORD-20260215-0342 • 15 Feb 2026, 2:45 PM
                    </p>
                  </div>
                  <div class="flex items-center gap-4">
                    <span
                      class="px-3 py-1 rounded-full text-sm bg-green-100 text-green-800 font-medium"
                      >Completed</span
                    >
                    <span class="font-bold text-[var(--accent)]">৳480</span>
                  </div>
                </div>
                <div class="mt-4 text-sm text-gray-600">
                  Patient: Self • College Road, Brahmanbaria
                </div>
              </div>

              <p class="text-center text-gray-500 mt-8 italic">
                Showing last 2 orders •
                <a href="#" class="text-[var(--primary)] hover:underline"
                  >View all orders</a
                >
              </p>
            </div>
          </div>

          <!-- Addresses -->
          <div id="addresses" class="tab-content">
            <div
              class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6"
            >
              <h2 class="text-xl sm:text-2xl font-bold text-gray-900">
                Saved Addresses
              </h2>
              <button
                class="inline-flex items-center gap-2 px-5 py-2.5 bg-[var(--primary)] text-white rounded-lg hover:bg-[#1e3a54] transition text-sm"
              >
                <i class="fas fa-plus"></i> Add New Address
              </button>
            </div>

            <div class="space-y-5">
              <div class="border border-gray-200 rounded-xl p-5">
                <div class="flex justify-between items-start">
                  <div>
                    <p class="font-medium">Home</p>
                    <p class="text-sm text-gray-600 mt-1">
                      House #12, Road #3, Kandipara<br />
                      Brahmanbaria Sadar, Brahmanbaria<br />
                      +880 1712-345678
                    </p>
                  </div>
                  <div class="flex gap-3">
                    <button class="text-blue-600 hover:text-blue-800 text-sm">
                      <i class="fas fa-edit"></i>
                    </button>
                    <button class="text-red-600 hover:text-red-800 text-sm">
                      <i class="fas fa-trash"></i>
                    </button>
                  </div>
                </div>
                <span
                  class="inline-block mt-3 px-3 py-1 bg-green-100 text-green-800 text-xs rounded-full"
                  >Default</span
                >
              </div>

              <div class="border border-gray-200 rounded-xl p-5">
                <div class="flex justify-between items-start">
                  <div>
                    <p class="font-medium">Office / Relative</p>
                    <p class="text-sm text-gray-600 mt-1">
                      Flat #B3, Green Tower<br />
                      College Road, Brahmanbaria
                    </p>
                  </div>
                  <div class="flex gap-3">
                    <button class="text-blue-600 hover:text-blue-800 text-sm">
                      <i class="fas fa-edit"></i>
                    </button>
                    <button class="text-red-600 hover:text-red-800 text-sm">
                      <i class="fas fa-trash"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Security -->
          <div id="security" class="tab-content">
            <h2 class="text-xl sm:text-2xl font-bold text-gray-900 mb-6">
              Security & Login
            </h2>

            <div class="space-y-6">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2"
                  >Current Password</label
                >
                <input
                  type="password"
                  class="w-full max-w-md border border-gray-300 rounded-lg px-4 py-2.5 focus:border-[var(--primary)] focus:ring-1 focus:ring-[var(--primary)]"
                  placeholder="••••••••"
                />
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2"
                  >New Password</label
                >
                <input
                  type="password"
                  class="w-full max-w-md border border-gray-300 rounded-lg px-4 py-2.5 focus:border-[var(--primary)] focus:ring-1 focus:ring-[var(--primary)]"
                  placeholder="New password"
                />
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2"
                  >Confirm New Password</label
                >
                <input
                  type="password"
                  class="w-full max-w-md border border-gray-300 rounded-lg px-4 py-2.5 focus:border-[var(--primary)] focus:ring-1 focus:ring-[var(--primary)]"
                  placeholder="Confirm new password"
                />
              </div>

              <div class="pt-4">
                <button
                  class="px-6 py-3 bg-[var(--primary)] text-white rounded-lg hover:bg-[#1e3a54] transition"
                >
                  Update Password
                </button>
              </div>

              <div class="pt-6 border-t border-gray-200">
                <h3 class="text-lg font-semibold mb-3">
                  Two-Factor Authentication
                </h3>
                <p class="text-gray-600 mb-4">
                  Protect your account with an extra layer of security.
                </p>
                <button
                  class="px-6 py-2.5 border border-[var(--primary)] text-[var(--primary)] rounded-lg hover:bg-[var(--light)] transition"
                >
                  Enable 2FA
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    
@endsection