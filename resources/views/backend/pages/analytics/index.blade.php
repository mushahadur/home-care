@extends('backend.layouts.app')

@section('title', 'Analytics ')

@section('content')
<!-- Content -->
<!-- ========== MAIN Analytics CONTENT ========== -->

<main
    class="flex-1 overflow-y-auto p-4 md:p-6 lg:p-8 bg-gray-50 dark:bg-gray-950">
    <!-- Welcome Section -->
    <div class="mb-6 md:mb-8">
        <!-- Breadcrumb -->
        <h3 class="text-sm font-bold pb-4">
            <a href="/dashboard" class="hover:underline text-blue-600">Dashboard</a>
            <span class="mx-2"> / </span>
            <span class="text-gray-700 dark:text-gray-300">Analytics</span>
        </h3>
    </div>

    <!-- Header with Filters -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white">View of Analytics</h1>
            <p class="text-sm text-gray-500 dark:text-gray-400">Deep insights into your business performance</p>
        </div>
        <div class="flex flex-wrap items-center gap-3">
            <!-- Date Range Picker -->
            <div class="flex items-center gap-2 bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-700 rounded-lg px-3 py-2 text-sm text-gray-700 dark:text-gray-300">
                <i class="fas fa-calendar-alt text-gray-400"></i>
                <span id="dateRangeDisplay">Jan 1 – Mar 31, 2025</span>
                <i class="fas fa-chevron-down text-gray-400 ml-1"></i>
            </div>
            <!-- Filter Button -->
            <button class="px-4 py-2 bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-700 rounded-lg text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-800 transition flex items-center gap-2">
                <i class="fas fa-sliders-h"></i> Filters
            </button>
            <!-- Export Button -->
            <button class="px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg text-sm font-medium transition shadow-sm flex items-center gap-2">
                <i class="fas fa-download"></i> Export
            </button>
        </div>
    </div>


    <!-- KPI Cards Row -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 mb-6">
        <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-5 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Total Revenue</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white mt-1">$52,430</p>
                </div>
                <div class="p-3 bg-emerald-100 dark:bg-emerald-900/30 rounded-lg">
                    <i class="fas fa-dollar-sign text-emerald-600 dark:text-emerald-400"></i>
                </div>
            </div>
            <div class="mt-3 flex items-center gap-2 text-sm">
                <span class="text-emerald-600 dark:text-emerald-400 font-medium">↑ 12.5%</span>
                <span class="text-gray-500 dark:text-gray-400">vs previous period</span>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-5 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Active Users</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white mt-1">3,284</p>
                </div>
                <div class="p-3 bg-blue-100 dark:bg-blue-900/30 rounded-lg">
                    <i class="fas fa-users text-blue-600 dark:text-blue-400"></i>
                </div>
            </div>
            <div class="mt-3 flex items-center gap-2 text-sm">
                <span class="text-emerald-600 dark:text-emerald-400 font-medium">↑ 8.2%</span>
                <span class="text-gray-500 dark:text-gray-400">vs previous period</span>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-5 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Conversions</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white mt-1">1,872</p>
                </div>
                <div class="p-3 bg-purple-100 dark:bg-purple-900/30 rounded-lg">
                    <i class="fas fa-exchange-alt text-purple-600 dark:text-purple-400"></i>
                </div>
            </div>
            <div class="mt-3 flex items-center gap-2 text-sm">
                <span class="text-emerald-600 dark:text-emerald-400 font-medium">↑ 4.6%</span>
                <span class="text-gray-500 dark:text-gray-400">vs previous period</span>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-5 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Conversion Rate</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white mt-1">3.8%</p>
                </div>
                <div class="p-3 bg-rose-100 dark:bg-rose-900/30 rounded-lg">
                    <i class="fas fa-percent text-rose-600 dark:text-rose-400"></i>
                </div>
            </div>
            <div class="mt-3 flex items-center gap-2 text-sm">
                <span class="text-red-600 dark:text-red-400 font-medium">↓ 0.2%</span>
                <span class="text-gray-500 dark:text-gray-400">vs previous period</span>
            </div>
        </div>
    </div>



    <!-- Charts Row -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
        <!-- Line Chart: Revenue & Orders Trend -->
        <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-5 shadow-sm">
            <div class="flex justify-between items-center mb-4">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Revenue & Orders</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Weekly trends</p>
                </div>
                <div class="flex items-center gap-3 text-xs">
                    <span class="flex items-center gap-1"><span class="w-3 h-3 bg-emerald-500 rounded-full"></span> Revenue</span>
                    <span class="flex items-center gap-1"><span class="w-3 h-3 bg-blue-500 rounded-full"></span> Orders</span>
                </div>
            </div>
            <div class="relative h-64">
                <canvas id="trendChart"></canvas>
            </div>
        </div>

        <!-- Bar Chart: Service Performance -->
        <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-5 shadow-sm">
            <div class="flex justify-between items-center mb-4">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Top Services</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">By number of bookings</p>
                </div>
            </div>
            <div class="relative h-64">
                <canvas id="servicesChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Bottom Row: Data Table + Donut -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Recent Orders Table (spans 2 cols on large) -->
        <div class="lg:col-span-2 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-5 shadow-sm">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Recent Orders</h3>
                <a href="#" class="text-sm text-emerald-600 dark:text-emerald-400 hover:underline">View All</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="border-b border-gray-200 dark:border-gray-700">
                        <tr class="text-left text-gray-500 dark:text-gray-400">
                            <th class="pb-2 font-medium">Order ID</th>
                            <th class="pb-2 font-medium">Customer</th>
                            <th class="pb-2 font-medium">Service</th>
                            <th class="pb-2 font-medium">Amount</th>
                            <th class="pb-2 font-medium">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                        <tr>
                            <td class="py-3 font-medium text-gray-900 dark:text-white">#1024</td>
                            <td class="py-3 text-gray-700 dark:text-gray-300">Fatema Begum</td>
                            <td class="py-3 text-gray-700 dark:text-gray-300">IV Injection</td>
                            <td class="py-3 text-gray-900 dark:text-white font-semibold">$45</td>
                            <td class="py-3"><span class="px-2 py-1 bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-300 rounded-full text-xs font-medium">Completed</span></td>
                        </tr>
                        <tr>
                            <td class="py-3 font-medium text-gray-900 dark:text-white">#1023</td>
                            <td class="py-3 text-gray-700 dark:text-gray-300">Kamal Hossain</td>
                            <td class="py-3 text-gray-700 dark:text-gray-300">Home Visit</td>
                            <td class="py-3 text-gray-900 dark:text-white font-semibold">$80</td>
                            <td class="py-3"><span class="px-2 py-1 bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 rounded-full text-xs font-medium">In Progress</span></td>
                        </tr>
                        <tr>
                            <td class="py-3 font-medium text-gray-900 dark:text-white">#1022</td>
                            <td class="py-3 text-gray-700 dark:text-gray-300">Rokeya Sultana</td>
                            <td class="py-3 text-gray-700 dark:text-gray-300">Blood Pressure Check</td>
                            <td class="py-3 text-gray-900 dark:text-white font-semibold">$20</td>
                            <td class="py-3"><span class="px-2 py-1 bg-yellow-100 dark:bg-yellow-900/30 text-yellow-700 dark:text-yellow-300 rounded-full text-xs font-medium">Pending</span></td>
                        </tr>
                        <tr>
                            <td class="py-3 font-medium text-gray-900 dark:text-white">#1021</td>
                            <td class="py-3 text-gray-700 dark:text-gray-300">Abdul Karim</td>
                            <td class="py-3 text-gray-700 dark:text-gray-300">Wound Dressing</td>
                            <td class="py-3 text-gray-900 dark:text-white font-semibold">$55</td>
                            <td class="py-3"><span class="px-2 py-1 bg-red-100 dark:bg-red-900/30 text-red-700 dark:text-red-300 rounded-full text-xs font-medium">Cancelled</span></td>
                        </tr>
                        <tr>
                            <td class="py-3 font-medium text-gray-900 dark:text-white">#1020</td>
                            <td class="py-3 text-gray-700 dark:text-gray-300">Salma Khatun</td>
                            <td class="py-3 text-gray-700 dark:text-gray-300">Physiotherapy</td>
                            <td class="py-3 text-gray-900 dark:text-white font-semibold">$100</td>
                            <td class="py-3"><span class="px-2 py-1 bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-300 rounded-full text-xs font-medium">Completed</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Donut Chart: Device / Channel Breakdown -->
        <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-5 shadow-sm">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Device Breakdown</h3>
            <div class="relative h-48 flex items-center justify-center">
                <canvas id="deviceChart"></canvas>
            </div>
            <div class="mt-4 grid grid-cols-2 gap-2 text-sm">
                <div class="flex items-center gap-2"><span class="w-3 h-3 bg-blue-500 rounded-full"></span> <span class="text-gray-700 dark:text-gray-300">Desktop 45%</span></div>
                <div class="flex items-center gap-2"><span class="w-3 h-3 bg-emerald-500 rounded-full"></span> <span class="text-gray-700 dark:text-gray-300">Mobile 35%</span></div>
                <div class="flex items-center gap-2"><span class="w-3 h-3 bg-purple-500 rounded-full"></span> <span class="text-gray-700 dark:text-gray-300">Tablet 20%</span></div>
            </div>
        </div>
    </div>

    <!-- ==================== PERFORMANCE INSIGHTS PANEL ==================== -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 my-6">
        <!-- Left Column -->
        <div class="space-y-6">

            <!-- Patient Satisfaction Card with Gauge -->
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-5 shadow-sm">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Patient Satisfaction</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Average rating from feedback</p>
                    </div>
                    <div class="flex items-center gap-1 text-amber-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
                <div class="flex items-end justify-between">
                    <div>
                        <span class="text-4xl font-bold text-gray-900 dark:text-white">4.7</span>
                        <span class="text-sm text-gray-500 dark:text-gray-400">/ 5.0</span>
                    </div>
                    <div class="text-sm text-emerald-600 dark:text-emerald-400 font-medium">
                        <i class="fas fa-arrow-up mr-1"></i> +6.2%
                    </div>
                </div>
                <!-- Mini gauge bar -->
                <div class="mt-3 w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                    <div class="bg-gradient-to-r from-amber-400 to-emerald-400 h-2 rounded-full" style="width: 94%"></div>
                </div>
                <div class="flex justify-between text-xs text-gray-500 dark:text-gray-400 mt-1">
                    <span>Poor</span>
                    <span>Excellent</span>
                </div>
            </div>

            <!-- Top Performing Nurses -->
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-5 shadow-sm">
                <div class="flex justify-between items-center mb-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Top Nurses</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">By patient rating & completion</p>
                    </div>
                    <a href="#" class="text-sm text-emerald-600 dark:text-emerald-400 hover:underline">View All</a>
                </div>
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <img src="https://ui-avatars.com/api/?name=Sara+Ahmed&background=10b981&color=fff&size=40" alt="Nurse" class="w-10 h-10 rounded-full border-2 border-emerald-200 dark:border-emerald-800">
                        <div class="flex-1 min-w-0">
                            <p class="font-medium text-gray-900 dark:text-white truncate">Sara Ahmed</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">IV Specialist · 4.9 ⭐</p>
                        </div>
                        <span class="text-sm font-semibold text-emerald-600 dark:text-emerald-400">98%</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <img src="https://ui-avatars.com/api/?name=Rajib+Das&background=3b82f6&color=fff&size=40" alt="Nurse" class="w-10 h-10 rounded-full border-2 border-blue-200 dark:border-blue-800">
                        <div class="flex-1 min-w-0">
                            <p class="font-medium text-gray-900 dark:text-white truncate">Rajib Das</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Home Care · 4.8 ⭐</p>
                        </div>
                        <span class="text-sm font-semibold text-blue-600 dark:text-blue-400">95%</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <img src="https://ui-avatars.com/api/?name=Nadia+Karim&background=8b5cf6&color=fff&size=40" alt="Nurse" class="w-10 h-10 rounded-full border-2 border-purple-200 dark:border-purple-800">
                        <div class="flex-1 min-w-0">
                            <p class="font-medium text-gray-900 dark:text-white truncate">Nadia Karim</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Geriatric · 4.7 ⭐</p>
                        </div>
                        <span class="text-sm font-semibold text-purple-600 dark:text-purple-400">92%</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div class="space-y-6">

            <!-- Service Completion & Response Time -->
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-5 shadow-sm">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Operational Efficiency</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Completion Rate</p>
                        <p class="text-2xl font-bold text-gray-900 dark:text-white">94.6%</p>
                        <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-1.5 mt-1">
                            <div class="bg-emerald-500 h-1.5 rounded-full" style="width: 94.6%"></div>
                        </div>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Avg. Response Time</p>
                        <p class="text-2xl font-bold text-gray-900 dark:text-white">12m</p>
                        <p class="text-xs text-emerald-600 dark:text-emerald-400"><i class="fas fa-arrow-down mr-1"></i> -2m vs last month</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">No‑show Rate</p>
                        <p class="text-2xl font-bold text-gray-900 dark:text-white">2.8%</p>
                        <p class="text-xs text-red-600 dark:text-red-400"><i class="fas fa-arrow-up mr-1"></i> +0.4%</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Follow‑up Adherence</p>
                        <p class="text-2xl font-bold text-gray-900 dark:text-white">88%</p>
                        <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-1.5 mt-1">
                            <div class="bg-blue-500 h-1.5 rounded-full" style="width: 88%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Regional Demand / Geographic Distribution -->
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl p-5 shadow-sm">
                <div class="flex justify-between items-center mb-3">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Regional Demand</h3>
                    <span class="text-xs text-gray-500 dark:text-gray-400">Brahmanbaria</span>
                </div>
                <div class="space-y-3">
                    <div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-700 dark:text-gray-300">Ward 3 – Sadar</span>
                            <span class="font-semibold text-gray-900 dark:text-white">32%</span>
                        </div>
                        <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-1.5">
                            <div class="bg-emerald-500 h-1.5 rounded-full" style="width: 32%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-700 dark:text-gray-300">Ward 5 – Hapania</span>
                            <span class="font-semibold text-gray-900 dark:text-white">28%</span>
                        </div>
                        <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-1.5">
                            <div class="bg-blue-500 h-1.5 rounded-full" style="width: 28%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-700 dark:text-gray-300">Ward 8 – Kasba</span>
                            <span class="font-semibold text-gray-900 dark:text-white">20%</span>
                        </div>
                        <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-1.5">
                            <div class="bg-purple-500 h-1.5 rounded-full" style="width: 20%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-700 dark:text-gray-300">Others</span>
                            <span class="font-semibold text-gray-900 dark:text-white">20%</span>
                        </div>
                        <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-1.5">
                            <div class="bg-amber-500 h-1.5 rounded-full" style="width: 20%"></div>
                        </div>
                    </div>
                </div>
                <div class="mt-3 text-xs text-gray-400 flex items-center gap-1">
                    <i class="fas fa-map-pin text-emerald-500"></i> Service exclusive to Brahmanbaria Municipality
                </div>
            </div>
        </div>
    </div>

</main>
<!-- End Content -->

@endsection

@push('scripts')
<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // ---- Trend Chart (Line) ----
        const ctx1 = document.getElementById('trendChart').getContext('2d');
        new Chart(ctx1, {
            type: 'line',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                        label: 'Revenue ($)',
                        data: [1200, 1900, 1500, 2200, 1800, 2600, 2100],
                        borderColor: '#10b981',
                        backgroundColor: 'rgba(16, 185, 129, 0.1)',
                        fill: true,
                        tension: 0.4,
                        pointRadius: 4,
                    },
                    {
                        label: 'Orders',
                        data: [45, 62, 38, 75, 68, 92, 80],
                        borderColor: '#3b82f6',
                        backgroundColor: 'rgba(59, 130, 246, 0.1)',
                        fill: true,
                        tension: 0.4,
                        pointRadius: 4,
                        borderDash: [5, 5],
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0,0,0,0.05)'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });

        // ---- Services Chart (Bar) ----
        const ctx2 = document.getElementById('servicesChart').getContext('2d');
        new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ['IV Injection', 'Home Visit', 'BP Check', 'Wound Care', 'Physiotherapy'],
                datasets: [{
                    label: 'Bookings',
                    data: [120, 95, 70, 55, 40],
                    backgroundColor: ['#10b981', '#3b82f6', '#8b5cf6', '#f59e0b', '#ef4444'],
                    borderRadius: 6,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0,0,0,0.05)'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });

        // ---- Device Chart (Donut) ----
        const ctx3 = document.getElementById('deviceChart').getContext('2d');
        new Chart(ctx3, {
            type: 'doughnut',
            data: {
                labels: ['Desktop', 'Mobile', 'Tablet'],
                datasets: [{
                    data: [45, 35, 20],
                    backgroundColor: ['#3b82f6', '#10b981', '#8b5cf6'],
                    borderWidth: 2,
                    borderColor: '#fff',
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '70%',
                plugins: {
                    legend: {
                        display: false
                    }
                },
            }
        });

        // ---- Date range display update (demo) ----
        document.getElementById('dateRangeDisplay').textContent = 'Feb 1 – Apr 30, 2025';
    });
</script>
@endpush