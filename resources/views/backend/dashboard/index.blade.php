@extends('backend.layouts.app')

@section('title', 'Dashboard ')

@section('content')
<!-- Content -->
<!-- ========== MAIN DASHBOARD CONTENT ========== -->

<main
  class="flex-1 overflow-y-auto p-4 md:p-6 lg:p-8 bg-gray-50 dark:bg-gray-950">
  <!-- Welcome Section -->
  <div class="mb-6 md:mb-8">
    <h2
      class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white">
      Welcome back, Aigars
    </h2>
    <p
      class="text-sm md:text-base text-gray-600 dark:text-gray-400 mt-1">
      Here's what's happening with your business today.
    </p>
  </div>

  <!-- Stats Cards Grid -->
  <div
    class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 mb-6 md:mb-8">
    <div
      class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-md p-6 shadow-sm dark:shadow-none">
      <p class="text-sm text-gray-500 dark:text-gray-400">
        Total Revenue
      </p>
      <p
        class="text-2xl font-bold mt-1 text-gray-900 dark:text-gray-100">
        $48,295
      </p>
      <div class="mt-4 text-sm">
        <span class="text-emerald-600 dark:text-emerald-400">↑ +12.5%</span>
        vs last month
      </div>
    </div>

    <div
      class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-md p-6 shadow-sm dark:shadow-none">
      <p class="text-sm text-gray-500 dark:text-gray-400">
        Active Users
      </p>
      <p class="text-2xl font-bold mt-1">2,847</p>
      <div class="mt-4 text-sm">
        <span class="text-emerald-600 dark:text-emerald-400">↑ +8.2%</span>
        vs last month
      </div>
    </div>

    <div
      class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-md p-6 shadow-sm dark:shadow-none">
      <p class="text-sm text-gray-500 dark:text-gray-400">
        Total Orders
      </p>
      <p class="text-2xl font-bold mt-1">1,432</p>
      <div class="mt-4 text-sm">
        <span class="text-red-600 dark:text-red-400">↓ -3.1%</span> vs
        last month
      </div>
    </div>

    <div
      class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-md p-6 shadow-sm dark:shadow-none">
      <p class="text-sm text-gray-500 dark:text-gray-400">Page Views</p>
      <p class="text-2xl font-bold mt-1">284K</p>
      <div class="mt-4 text-sm">
        <span class="text-emerald-600 dark:text-emerald-400">↑ +24.7%</span>
        vs last month
      </div>
    </div>
  </div>

  <!-- ========== STATS CARDS ========== -->
  <div
    class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 mb-6 md:mb-8">
    <!-- Total Revenue Card -->
    <div
      class="stat-card bg-white dark:bg-gray-800 rounded-md p-5 md:p-6 shadow-sm border border-gray-200 dark:border-gray-700">
      <div class="flex items-center justify-between mb-3">
        <div
          class="w-10 h-10 bg-green-100 dark:bg-green-900/30 rounded-md flex items-center justify-center">
          <i
            class="fas fa-dollar-sign text-green-600 dark:text-green-400"></i>
        </div>
        <span
          class="text-xs font-medium px-2 py-1 bg-green-100 dark:bg-green-900/30 text-green-600 dark:text-green-400 rounded-full">
          +12.5%
        </span>
      </div>
      <h3
        class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
        Total Revenue
      </h3>
      <div class="flex items-baseline gap-2">
        <span
          class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white">$48,295</span>
        <span class="text-xs text-green-600 dark:text-green-400">vs last month</span>
      </div>
    </div>

    <!-- Active Users Card -->
    <div
      class="stat-card bg-white dark:bg-gray-800 rounded-md p-5 md:p-6 shadow-sm border border-gray-200 dark:border-gray-700">
      <div class="flex items-center justify-between mb-3">
        <div
          class="w-10 h-10 bg-blue-100 dark:bg-blue-900/30 rounded-md flex items-center justify-center">
          <i class="fas fa-users text-blue-600 dark:text-blue-400"></i>
        </div>
        <span
          class="text-xs font-medium px-2 py-1 bg-green-100 dark:bg-green-900/30 text-green-600 dark:text-green-400 rounded-full">
          +8.2%
        </span>
      </div>
      <h3
        class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
        Active Users
      </h3>
      <div class="flex items-baseline gap-2">
        <span
          class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white">2,847</span>
        <span class="text-xs text-green-600 dark:text-green-400">vs last month</span>
      </div>
    </div>

    <!-- Total Orders Card -->
    <div
      class="stat-card bg-white dark:bg-gray-800 rounded-md p-5 md:p-6 shadow-sm border border-gray-200 dark:border-gray-700">
      <div class="flex items-center justify-between mb-3">
        <div
          class="w-10 h-10 bg-purple-100 dark:bg-purple-900/30 rounded-md flex items-center justify-center">
          <i
            class="fas fa-shopping-cart text-purple-600 dark:text-purple-400"></i>
        </div>
        <span
          class="text-xs font-medium px-2 py-1 bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-400 rounded-full">
          -3.1%
        </span>
      </div>
      <h3
        class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
        Total Orders
      </h3>
      <div class="flex items-baseline gap-2">
        <span
          class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white">1,432</span>
        <span class="text-xs text-red-600 dark:text-red-400">vs last month</span>
      </div>
    </div>

    <!-- Page Views Card -->
    <div
      class="stat-card bg-white dark:bg-gray-800 rounded-md p-5 md:p-6 shadow-sm border border-gray-200 dark:border-gray-700">
      <div class="flex items-center justify-between mb-3">
        <div
          class="w-10 h-10 bg-orange-100 dark:bg-orange-900/30 rounded-md flex items-center justify-center">
          <i
            class="fas fa-eye text-orange-600 dark:text-orange-400"></i>
        </div>
        <span
          class="text-xs font-medium px-2 py-1 bg-green-100 dark:bg-green-900/30 text-green-600 dark:text-green-400 rounded-full">
          +24.7%
        </span>
      </div>
      <h3
        class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
        Page Views
      </h3>
      <div class="flex items-baseline gap-2">
        <span
          class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white">284K</span>
        <span class="text-xs text-green-600 dark:text-green-400">vs last month</span>
      </div>
    </div>
  </div>

  <!-- ========== MAIN GRID ========== -->
  <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 md:gap-8">
    <!-- LEFT + MIDDLE: Chart Section (spans 2 columns) -->
    <div class="lg:col-span-2 space-y-6">
      <!-- Overview Card with Chart -->
      <div
        class="bg-white dark:bg-gray-800 rounded-md p-5 md:p-6 shadow-sm border border-gray-200 dark:border-gray-700">
        <!-- Header -->
        <div
          class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
          <div>
            <h2
              class="text-lg md:text-xl font-semibold text-gray-900 dark:text-white">
              Overview
            </h2>
            <p class="text-sm text-gray-500 dark:text-gray-400">
              Monthly performance for the current year
            </p>
          </div>

          <!-- Legend -->
          <div class="flex flex-wrap items-center gap-4 text-xs">
            <div class="flex items-center gap-1">
              <span class="w-3 h-3 bg-blue-600 rounded-full"></span>
              <span class="text-gray-600 dark:text-gray-400">Direct</span>
            </div>
            <div class="flex items-center gap-1">
              <span class="w-3 h-3 bg-green-500 rounded-full"></span>
              <span class="text-gray-600 dark:text-gray-400">Organic</span>
            </div>
            <div class="flex items-center gap-1">
              <span class="w-3 h-3 bg-purple-500 rounded-full"></span>
              <span class="text-gray-600 dark:text-gray-400">Referral</span>
            </div>
            <div class="flex items-center gap-1">
              <span class="w-3 h-3 bg-orange-500 rounded-full"></span>
              <span class="text-gray-600 dark:text-gray-400">Social</span>
            </div>
          </div>
        </div>

        <!-- Chart Container -->
        <div class="chart-container relative h-64 md:h-80">
          <canvas id="revenueChart"></canvas>
        </div>
      </div>

      <!-- Traffic Sources Card (visible on mobile) -->
      <div
        class="block lg:hidden bg-white dark:bg-gray-800 rounded-md p-5 md:p-6 shadow-sm border border-gray-200 dark:border-gray-700">
        <h2
          class="text-lg md:text-xl font-semibold text-gray-900 dark:text-white mb-4">
          Traffic Sources
        </h2>
        <p class="text-sm text-gray-500 dark:text-gray-400 mb-6">
          Where your visitors come from
        </p>

        <div class="space-y-4">
          <!-- Direct -->
          <div>
            <div class="flex items-center justify-between mb-1">
              <div class="flex items-center gap-2">
                <span class="w-2 h-2 bg-blue-600 rounded-full"></span>
                <span
                  class="text-sm font-medium text-gray-700 dark:text-gray-300">Direct</span>
              </div>
              <span
                class="text-sm font-semibold text-gray-900 dark:text-white">35%</span>
            </div>
            <div
              class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
              <div
                class="bg-blue-600 h-2 rounded-full"
                style="width: 35%"></div>
            </div>
          </div>

          <!-- Organic -->
          <div>
            <div class="flex items-center justify-between mb-1">
              <div class="flex items-center gap-2">
                <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                <span
                  class="text-sm font-medium text-gray-700 dark:text-gray-300">Organic</span>
              </div>
              <span
                class="text-sm font-semibold text-gray-900 dark:text-white">28%</span>
            </div>
            <div
              class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
              <div
                class="bg-green-500 h-2 rounded-full"
                style="width: 28%"></div>
            </div>
          </div>

          <!-- Referral -->
          <div>
            <div class="flex items-center justify-between mb-1">
              <div class="flex items-center gap-2">
                <span class="w-2 h-2 bg-purple-500 rounded-full"></span>
                <span
                  class="text-sm font-medium text-gray-700 dark:text-gray-300">Referral</span>
              </div>
              <span
                class="text-sm font-semibold text-gray-900 dark:text-white">22%</span>
            </div>
            <div
              class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
              <div
                class="bg-purple-500 h-2 rounded-full"
                style="width: 22%"></div>
            </div>
          </div>

          <!-- Social -->
          <div>
            <div class="flex items-center justify-between mb-1">
              <div class="flex items-center gap-2">
                <span class="w-2 h-2 bg-orange-500 rounded-full"></span>
                <span
                  class="text-sm font-medium text-gray-700 dark:text-gray-300">Social</span>
              </div>
              <span
                class="text-sm font-semibold text-gray-900 dark:text-white">15%</span>
            </div>
            <div
              class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
              <div
                class="bg-orange-500 h-2 rounded-full"
                style="width: 15%"></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- RIGHT SIDEBAR: Traffic Sources & Monthly Goals -->
    <div class="space-y-6">
      <!-- Traffic Sources Card (desktop) -->
      <div
        class="hidden lg:block bg-white dark:bg-gray-800 rounded-md p-5 md:p-6 shadow-sm border border-gray-200 dark:border-gray-700">
        <h2
          class="text-lg md:text-xl font-semibold text-gray-900 dark:text-white mb-4">
          Traffic Sources
        </h2>
        <p class="text-sm text-gray-500 dark:text-gray-400 mb-6">
          Where your visitors come from
        </p>

        <div class="space-y-5">
          <!-- Direct -->
          <div>
            <div class="flex items-center justify-between mb-2">
              <div class="flex items-center gap-2">
                <span class="w-3 h-3 bg-blue-600 rounded-full"></span>
                <span
                  class="text-sm font-medium text-gray-700 dark:text-gray-300">Direct</span>
              </div>
              <span
                class="text-sm font-semibold text-gray-900 dark:text-white">35%</span>
            </div>
            <div
              class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
              <div
                class="bg-blue-600 h-2.5 rounded-full"
                style="width: 35%"></div>
            </div>
          </div>

          <!-- Organic -->
          <div>
            <div class="flex items-center justify-between mb-2">
              <div class="flex items-center gap-2">
                <span class="w-3 h-3 bg-green-500 rounded-full"></span>
                <span
                  class="text-sm font-medium text-gray-700 dark:text-gray-300">Organic</span>
              </div>
              <span
                class="text-sm font-semibold text-gray-900 dark:text-white">28%</span>
            </div>
            <div
              class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
              <div
                class="bg-green-500 h-2.5 rounded-full"
                style="width: 28%"></div>
            </div>
          </div>

          <!-- Referral -->
          <div>
            <div class="flex items-center justify-between mb-2">
              <div class="flex items-center gap-2">
                <span class="w-3 h-3 bg-purple-500 rounded-full"></span>
                <span
                  class="text-sm font-medium text-gray-700 dark:text-gray-300">Referral</span>
              </div>
              <span
                class="text-sm font-semibold text-gray-900 dark:text-white">22%</span>
            </div>
            <div
              class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
              <div
                class="bg-purple-500 h-2.5 rounded-full"
                style="width: 22%"></div>
            </div>
          </div>

          <!-- Social -->
          <div>
            <div class="flex items-center justify-between mb-2">
              <div class="flex items-center gap-2">
                <span class="w-3 h-3 bg-orange-500 rounded-full"></span>
                <span
                  class="text-sm font-medium text-gray-700 dark:text-gray-300">Social</span>
              </div>
              <span
                class="text-sm font-semibold text-gray-900 dark:text-white">15%</span>
            </div>
            <div
              class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
              <div
                class="bg-orange-500 h-2.5 rounded-full"
                style="width: 15%"></div>
            </div>
          </div>
        </div>

        <!-- Mini Pie Chart Placeholder (optional) -->
        <div
          class="mt-6 pt-4 border-t border-gray-200 dark:border-gray-700">
          <div class="flex justify-center">
            <div
              class="w-24 h-24 rounded-full border-4 border-blue-600 border-r-green-500 border-b-purple-500 border-l-orange-500"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Charts & Traffic + Goals sections remain the same -->
  <!-- You can copy them from previous version and just adjust colors like bg-white → dark:bg-gray-900, text-gray-900 → dark:text-gray-100, etc. -->
</main>
<!-- End Content -->

@endsection