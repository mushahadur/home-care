@extends('backend.layouts.app')

@section('title', 'Package List - NurseNextDoor')

@section('content')
<!-- Main content area -->
<main class="flex-1 overflow-y-auto p-4 md:p-6 lg:p-8 bg-gray-50 dark:bg-gray-950 transition-colors">

    <!-- Breadcrumb -->
    <div class="mb-6">
        <div class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
            <a href="/dashboard" class="hover:text-emerald-600 transition flex items-center gap-1">
                <i class="fas fa-home text-xs"></i>
                <span>Dashboard</span>
            </a>
            <i class="fas fa-chevron-right text-xs text-gray-400"></i>
            <span class="text-emerald-600 dark:text-emerald-400 font-medium">Package List</span>
        </div>
        <h1 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white mt-2">Package List</h1>
        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">See our special home nursing packages and manage them</p>
    </div>

    <!-- Stats Cards Row -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        <div class="bg-white dark:bg-gray-900 rounded-2xl p-5 shadow-sm border border-gray-200 dark:border-gray-800">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Total Packages</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white mt-1">12</p>
                </div>
                <div class="w-12 h-12 bg-emerald-100 dark:bg-emerald-900/30 rounded-xl flex items-center justify-center">
                    <i class="fas fa-boxes text-emerald-600 dark:text-emerald-400 text-xl"></i>
                </div>
            </div>
            <div class="mt-3 flex items-center gap-1 text-xs text-green-600">
                <i class="fas fa-arrow-up"></i>
                <span>+2 new</span>
                <span class="text-gray-400 ml-1">This month</span>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-900 rounded-2xl p-5 shadow-sm border border-gray-200 dark:border-gray-800">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Active Packages</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white mt-1">8</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-xl flex items-center justify-center">
                    <i class="fas fa-check-circle text-blue-600 dark:text-blue-400 text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-900 rounded-2xl p-5 shadow-sm border border-gray-200 dark:border-gray-800">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Total Orders</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white mt-1">156</p>
                </div>
                <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900/30 rounded-xl flex items-center justify-center">
                    <i class="fas fa-shopping-cart text-purple-600 dark:text-purple-400 text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-900 rounded-2xl p-5 shadow-sm border border-gray-200 dark:border-gray-800">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Income (This Month)</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white mt-1">৳ 45,280</p>
                </div>
                <div class="w-12 h-12 bg-orange-100 dark:bg-orange-900/30 rounded-xl flex items-center justify-center">
                    <i class="fas fa-chart-line text-orange-600 dark:text-orange-400 text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Package Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-8">
        
        <!-- Package Card 1 - Basic Care -->
        <div class="group bg-white dark:bg-gray-900 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-800 overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
            <div class="relative">
                <div class="h-32 bg-gradient-to-r from-emerald-500 to-teal-500 relative overflow-hidden">
                    <div class="absolute inset-0 bg-black/10"></div>
                    <i class="fas fa-hand-holding-heart absolute bottom-3 right-3 text-white/20 text-5xl"></i>
                </div>
                <div class="absolute -bottom-6 left-4">
                    <div class="w-14 h-14 bg-white dark:bg-gray-800 rounded-xl shadow-lg flex items-center justify-center border-2 border-white dark:border-gray-700">
                        <i class="fas fa-heartbeat text-emerald-600 text-2xl"></i>
                    </div>
                </div>
            </div>
            
            <div class="p-5 pt-8">
                <div class="flex items-start justify-between mb-2">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white">Basic Care Package</h3>
                    <span class="px-2 py-1 bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400 text-xs rounded-full">Popular</span>
                </div>
                <p class="text-gray-500 dark:text-gray-400 text-sm mb-4 line-clamp-2">Primary healthcare services, regular health check-ups and nursing care</p>

                <div class="flex items-baseline gap-1 mb-4">
                    <span class="text-2xl font-bold text-gray-900 dark:text-white">৳ ২,৫০০</span>
                    <span class="text-gray-500 dark:text-gray-400 text-sm">/month</span>
                </div>
                
                <div class="space-y-2 mb-5">
                    <div class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                        <i class="fas fa-check-circle text-emerald-500 text-xs w-4"></i>
                        <span>2 times a week nurse visit</span>
                    </div>
                    <div class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                        <i class="fas fa-check-circle text-emerald-500 text-xs w-4"></i>
                        <span>Blood pressure check</span>
                    </div>
                    <div class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                        <i class="fas fa-check-circle text-emerald-500 text-xs w-4"></i>
                        <span>24/7 Phone Support</span>
                    </div>
                </div>
                
                <div class="flex gap-2">
                    <button class="flex-1 bg-emerald-600 hover:bg-emerald-700 text-white py-2.5 rounded-xl text-sm font-medium transition flex items-center justify-center gap-1">
                        <i class="fas fa-edit"></i> Edit
                    </button>
                    <button class="px-4 py-2.5 border border-gray-300 dark:border-gray-700 rounded-xl text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Package Card 2 - Elder Care -->
        <div class="group bg-white dark:bg-gray-900 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-800 overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
            <div class="relative">
                <div class="h-32 bg-gradient-to-r from-blue-500 to-indigo-500 relative overflow-hidden">
                    <i class="fas fa-user-graduate absolute bottom-3 right-3 text-white/20 text-5xl"></i>
                </div>
                <div class="absolute -bottom-6 left-4">
                    <div class="w-14 h-14 bg-white dark:bg-gray-800 rounded-xl shadow-lg flex items-center justify-center border-2 border-white dark:border-gray-700">
                        <i class="fas fa-user-graduate text-blue-600 text-2xl"></i>
                    </div>
                </div>
            </div>
            
            <div class="p-5 pt-8">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Elder Care Package</h3>
                <p class="text-gray-500 dark:text-gray-400 text-sm mb-4 line-clamp-2">Comprehensive care and services for elderly caregivers</p>
                
                <div class="flex items-baseline gap-1 mb-4">
                    <span class="text-2xl font-bold text-gray-900 dark:text-white">৳ ৪,৫০০</span>
                    <span class="text-gray-500 dark:text-gray-400 text-sm">/month</span>
                </div>
                
                <div class="space-y-2 mb-5">
                    <div class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                        <i class="fas fa-check-circle text-emerald-500 text-xs w-4"></i>
                        <span>Regular Health Check-ups</span>
                    </div>
                    <div class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                        <i class="fas fa-check-circle text-emerald-500 text-xs w-4"></i>
                        <span>Medication Management</span>
                    </div>
                    <div class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                        <i class="fas fa-check-circle text-emerald-500 text-xs w-4"></i>
                        <span>Personal Care Services</span>
                    </div>
                </div>
                
                <div class="flex gap-2">
                    <button class="flex-1 bg-emerald-600 hover:bg-emerald-700 text-white py-2.5 rounded-xl text-sm font-medium transition">Edit</button>
                    <button class="px-4 py-2.5 border border-gray-300 dark:border-gray-700 rounded-xl text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Package Card 3 - Post-Operative Care -->
        <div class="group bg-white dark:bg-gray-900 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-800 overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
            <div class="relative">
                <div class="h-32 bg-gradient-to-r from-purple-500 to-pink-500 relative overflow-hidden">
                    <i class="fas fa-hospital-user absolute bottom-3 right-3 text-white/20 text-5xl"></i>
                </div>
                <div class="absolute -bottom-6 left-4">
                    <div class="w-14 h-14 bg-white dark:bg-gray-800 rounded-xl shadow-lg flex items-center justify-center border-2 border-white dark:border-gray-700">
                        <i class="fas fa-hospital-user text-purple-600 text-2xl"></i>
                    </div>
                </div>
            </div>
            
            <div class="p-5 pt-8">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Post-Operative Care</h3>
                <p class="text-gray-500 dark:text-gray-400 text-sm mb-4 line-clamp-2">Specialized nursing and rehabilitation services after surgery</p>
                
                <div class="flex items-baseline gap-1 mb-4">
                    <span class="text-2xl font-bold text-gray-900 dark:text-white">৳ ৫,৮০০</span>
                    <span class="text-gray-500 dark:text-gray-400 text-sm">/month</span>
                </div>
                
                <div class="space-y-2 mb-5">
                    <div class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                        <i class="fas fa-check-circle text-emerald-500 text-xs w-4"></i>
                        <span>Regular Nursing Visits</span>
                    </div>
                    <div class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                        <i class="fas fa-check-circle text-emerald-500 text-xs w-4"></i>
                        <span>Wound Dressing and Care</span>
                    </div>
                    <div class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                        <i class="fas fa-check-circle text-emerald-500 text-xs w-4"></i>
                        <span>Physiotherapy Sessions</span>
                    </div>
                </div>
                
                <div class="flex gap-2">
                    <button class="flex-1 bg-emerald-600 hover:bg-emerald-700 text-white py-2.5 rounded-xl text-sm font-medium transition">Edit</button>
                    <button class="px-4 py-2.5 border border-gray-300 dark:border-gray-700 rounded-xl text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Package Card 4 - Baby Care -->
        <div class="group bg-white dark:bg-gray-900 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-800 overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
            <div class="relative">
                <div class="h-32 bg-gradient-to-r from-pink-500 to-rose-500 relative overflow-hidden">
                    <i class="fas fa-baby-carriage absolute bottom-3 right-3 text-white/20 text-5xl"></i>
                </div>
                <div class="absolute -bottom-6 left-4">
                    <div class="w-14 h-14 bg-white dark:bg-gray-800 rounded-xl shadow-lg flex items-center justify-center border-2 border-white dark:border-gray-700">
                        <i class="fas fa-baby-carriage text-pink-600 text-2xl"></i>
                    </div>
                </div>
            </div>
            
            <div class="p-5 pt-8">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Baby Care Services</h3>
                <p class="text-gray-500 dark:text-gray-400 text-sm mb-4 line-clamp-2">Specialized nursing care for newborns and infants</p>

                <div class="flex items-baseline gap-1 mb-4">
                    <span class="text-2xl font-bold text-gray-900 dark:text-white">৳ ৩,২০০</span>
                    <span class="text-gray-500 dark:text-gray-400 text-sm">/month</span>
                </div>
                
                <div class="space-y-2 mb-5">
                    <div class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                        <i class="fas fa-check-circle text-emerald-500 text-xs w-4"></i>
                        <span>Specialized Nursing Care</span>
                    </div>
                    <div class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                        <i class="fas fa-check-circle text-emerald-500 text-xs w-4"></i>
                        <span>Weight and Temperature Monitoring</span>
                    </div>
                    <div class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                        <i class="fas fa-check-circle text-emerald-500 text-xs w-4"></i>
                        <span>Vaccination Assistance</span>
                    </div>
                </div>
                
                <div class="flex gap-2">
                    <button class="flex-1 bg-emerald-600 hover:bg-emerald-700 text-white py-2.5 rounded-xl text-sm font-medium transition">Edit</button>
                    <button class="px-4 py-2.5 border border-gray-300 dark:border-gray-700 rounded-xl text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Data Table View (Alternative View) -->
    <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl shadow-sm overflow-hidden">
        <div class="p-5 md:p-6 border-b border-gray-200 dark:border-gray-800">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                    <i class="fas fa-table-list mr-2 text-emerald-500"></i>All Packages
                </h2>
                
                <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4 w-full sm:w-auto">
                    <!-- Search -->
                    <div class="relative w-full sm:w-72 min-w-[220px]">
                        <input
                            id="table-search"
                            type="text"
                            placeholder="Search Package..."
                            class="w-full pl-10 pr-4 py-2.5 bg-gray-50 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition" />
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fa-solid fa-magnifying-glass text-gray-400"></i>
                        </div>
                    </div>
                    
                    <a href="{{ route('admin.packages.create') }}" class="px-5 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white font-medium rounded-lg flex items-center justify-center gap-2 transition shadow-sm">
                        <i class="fas fa-plus"></i>
                        New Package
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Table Container with Horizontal Scroll for Mobile -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-800">
                <thead class="bg-gray-50 dark:bg-gray-800">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">SI</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Package Name</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Price</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Duration</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Order</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-800">
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50 transition">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">1</td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-900 dark:text-gray-100">Basic Care Package</td>
                        <td class="px-6 py-4 text-sm font-semibold text-emerald-600 dark:text-emerald-400">৳ ২,৫০০</td>
                        <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">Monthly</td>
                        <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">156 pieces</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400">
                                <i class="fas fa-circle text-[8px] mr-1.5 text-green-600"></i>
                                Active
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <button class="p-2 text-blue-600 hover:bg-blue-100 rounded-lg transition">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="p-2 text-red-600 hover:bg-red-100 rounded-lg transition">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <button class="p-2 text-gray-600 hover:bg-gray-100 rounded-lg transition">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50 transition">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">2</td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-900 dark:text-gray-100">Senior Care Package</td>
                        <td class="px-6 py-4 text-sm font-semibold text-emerald-600 dark:text-emerald-400">৳ ৪,৫০০</td>
                        <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">Monthly</td>
                        <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">89 pieces</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400">
                                <i class="fas fa-circle text-[8px] mr-1.5 text-green-600"></i>
                                Active
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <button class="p-2 text-blue-600 hover:bg-blue-100 rounded-lg transition">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="p-2 text-red-600 hover:bg-red-100 rounded-lg transition">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <button class="p-2 text-gray-600 hover:bg-gray-100 rounded-lg transition">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-800">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div class="text-sm text-gray-500 dark:text-gray-400">
                    Showing <span class="font-medium">1</span> to <span class="font-medium">4</span> of <span class="font-medium">12</span> packages
                </div>
                <div class="flex items-center gap-2">
                    <button class="px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-lg text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-800 transition" disabled>
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="px-3 py-2 bg-emerald-600 text-white rounded-lg text-sm font-medium">1</button>
                    <button class="px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-lg text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-800 transition">2</button>
                    <button class="px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-lg text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-800 transition">3</button>
                    <button class="px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-lg text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-800 transition">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@push('scripts')
<script>
    // Table search functionality
    document.addEventListener('DOMContentLoaded', () => {
        const searchInput = document.getElementById('table-search');
        
        if (searchInput) {
            const table = document.querySelector('table');
            const rows = table?.querySelectorAll('tbody tr');
            
            searchInput.addEventListener('input', (e) => {
                const query = e.target.value.toLowerCase().trim();
                
                rows?.forEach(row => {
                    const text = row.textContent.toLowerCase();
                    row.style.display = text.includes(query) ? '' : 'none';
                });
            });
        }
    });
</script>
@endpush

@push('styles')
<style>
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    @media (max-width: 640px) {
        .table-responsive {
            display: block;
            overflow-x: auto;
            white-space: nowrap;
        }
    }
</style>
@endpush