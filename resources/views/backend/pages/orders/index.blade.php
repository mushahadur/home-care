@extends('backend.layouts.app')

@section('title', 'Users Order list - NurseNextDoor')

@section('content')
<!-- Main content area -->
<main class="flex-1 overflow-y-auto p-5 md:p-8 bg-gray-50 dark:bg-gray-950 transition-colors">

    <!-- Breadcrumb -->
    <h3 class="text-sm font-bold pb-3">
        <a href="/dashboard" class="hover:underline text-blue-600">Dashboard</a>
        <span class="mx-2"> / </span>
        <span class="text-gray-700 dark:text-gray-300">Users Order list</span>
    </h3>

    <!-- Care Services Table Card -->
    <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-lg shadow-sm dark:shadow-none overflow-hidden">

        <div class="p-5 md:p-6 border-b border-gray-200 dark:border-gray-800 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                <i class="fas fa-hand-holding-heart mr-2 text-emerald-500"></i>Users Order list
            </h2>

            <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4 w-full sm:w-auto">
                <!-- Search -->
                <div class="relative w-full sm:w-72 min-w-[220px]">
                    <input
                        id="table-search"
                        type="text"
                        placeholder="Search orders..."
                        class="w-full pl-10 pr-4 py-2 bg-gray-50 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition" />
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fa-solid fa-magnifying-glass text-gray-400"></i>
                    </div>
                </div>
            </div>
        </div>


        <!-- Table Container with Horizontal Scroll for Mobile -->
        <div class="overflow-x-auto">
            <table class="w-full" id="order-table">
                <thead class="bg-gray-50 dark:bg-gray-800/50 border-b border-gray-200 dark:border-gray-700">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">SI</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">Order ID</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">Service Name</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">Preferred Date</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">Preferred Time</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">Patient Name</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">Patient Phone</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">Patient Address</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">Prescription</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">Price</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">Created</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse ($orders as $key => $order)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50 transition">
                        <!-- SI -->
                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                            {{ $loop->iteration }}
                        </td>

                        <!-- Order ID -->
                        <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                            <span class="font-medium">ID#_00-{{ $order->id }}</span>
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                            <span class="font-medium">{{ $order->careService->care_services_name ?? 'No Service' }}</span>
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                            <span class="font-medium">{{ \Carbon\Carbon::parse($order->preferred_date)->format('d M Y') }}</span>
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                            <span class="font-medium">{{ $order->preferred_time }}</span>
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                            <span class="font-medium">{{ $order->user_name }}</span>
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                            <span class="font-medium">{{ $order->user_phone }}</span>
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                            <span class="font-medium">{{ $order->user_address }}</span>
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap">
                            @if($order->prescription)
                            <img src="{{ asset($order->prescription) }}"
                                alt="Prescription for Order #{{ $order->id }}"
                                class="h-10 w-12 object-cover rounded-lg border border-gray-200 dark:border-gray-700">
                            @else
                            <span class="text-xs text-gray-400">No image</span>
                            @endif
                        </td>

                        <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                            <span class="font-medium">{{ $order->total_price }}</span>
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                            <span class="font-medium">{{ $order->status }}</span>
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                            <span class="font-medium">{{ \Carbon\Carbon::parse($order->created_at)->format('d M Y, h:i A') }}</span>
                        </td>



                        <!-- Actions -->
                        <td class="px-4 py-3 whitespace-nowrap">
                            <div class="flex items-center gap-2">
                                <a href="#"
                                    class="showOrderDetails px-3 py-1 bg-blue-600 hover:bg-blue-700 text-white rounded-sm transition text-sm">
                                    <i class="fas fa-eye"></i> View
                                </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="px-4 py-12 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <i class="fas fa-box-open text-5xl text-gray-400 dark:text-gray-600 mb-3"></i>
                                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">No Care Services Found</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Get started by creating your first care service.</p>
                                <a href="{{ route('care-services.create') }}"
                                    class="mt-4 inline-flex items-center gap-2 px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg transition text-sm">
                                    <i class="fas fa-plus"></i>
                                    Add Care Service
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Footer with Pagination -->
        @if($orders->hasPages())
        <div class="px-6 py-4 flex flex-col sm:flex-row justify-between items-center gap-4 border-t border-gray-200 dark:border-gray-700">
            <!-- Showing Results Info -->
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Showing
                <span class="font-medium text-gray-800 dark:text-gray-200">{{ $orders->firstItem() }}</span>
                to
                <span class="font-medium text-gray-800 dark:text-gray-200">{{ $orders->lastItem() }}</span>
                of
                <span class="font-medium text-gray-800 dark:text-gray-200">{{ $orders->total() }}</span>
                results
            </p>

            <!-- Pagination Links -->
            <div class="flex items-center gap-2">
                <!-- Previous Page -->
                @if($orders->onFirstPage())
                <span class="px-3 py-2 rounded-lg text-sm font-medium text-gray-400 bg-gray-100 dark:bg-gray-800 dark:text-gray-600 cursor-not-allowed">
                    <i class="fas fa-chevron-left mr-1"></i> Previous
                </span>
                @else
                <a href="{{ $orders->previousPageUrl() }}"
                    class="px-3 py-2 rounded-lg text-sm font-medium text-gray-700 bg-white dark:bg-gray-800 dark:text-gray-300 border border-gray-300 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                    <i class="fas fa-chevron-left mr-1"></i> Previous
                </a>
                @endif

                <!-- Page Numbers (responsive - show limited on mobile) -->
                <div class="hidden sm:flex items-center gap-1">
                    @foreach($orders->getUrlRange(max(1, $orders->currentPage() - 2), min($orders->lastPage(), $orders->currentPage() + 2)) as $page => $url)
                    @if($page == $orders->currentPage())
                    <span class="px-3 py-2 rounded-lg text-sm font-medium bg-emerald-600 text-white">{{ $page }}</span>
                    @else
                    <a href="{{ $url }}"
                        class="px-3 py-2 rounded-lg text-sm font-medium text-gray-700 bg-white dark:bg-gray-800 dark:text-gray-300 border border-gray-300 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        {{ $page }}
                    </a>
                    @endif
                    @endforeach
                </div>

                <!-- Mobile Page Indicator -->
                <div class="sm:hidden px-3 py-2 rounded-lg text-sm font-medium text-gray-700 bg-gray-100 dark:bg-gray-800 dark:text-gray-300">
                    Page {{ $orders->currentPage() }} of {{ $orders->lastPage() }}
                </div>

                <!-- Next Page -->
                @if($orders->hasMorePages())
                <a href="{{ $orders->nextPageUrl() }}"
                    class="px-3 py-2 rounded-lg text-sm font-medium text-gray-700 bg-white dark:bg-gray-800 dark:text-gray-300 border border-gray-300 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                    Next <i class="fas fa-chevron-right ml-1"></i>
                </a>
                @else
                <span class="px-3 py-2 rounded-lg text-sm font-medium text-gray-400 bg-gray-100 dark:bg-gray-800 dark:text-gray-600 cursor-not-allowed">
                    Next <i class="fas fa-chevron-right ml-1"></i>
                </span>
                @endif
            </div>
        </div>
        @endif
    </div>





</main>
@endsection

@push('scripts')
<script>
    // Table search functionality
    document.addEventListener('DOMContentLoaded', () => {
        const searchInput = document.getElementById('table-search');
        const table = document.getElementById('order-table');
        const rows = table.querySelectorAll('tbody tr');

        searchInput.addEventListener('input', (e) => {
            const query = e.target.value.toLowerCase().trim();

            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(query) ? '' : 'none';
            });
        });
    });
</script>

@endpush