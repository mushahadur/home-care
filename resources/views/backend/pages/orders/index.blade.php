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
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">User Name</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">User Phone</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">User Address</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">Total</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">Pending</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">Completed</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">User Status</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">Joining Date</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse ($usersWithOrderStats as $key => $user)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50 transition">
                        <!-- SI -->
                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                            {{ $loop->iteration }}
                        </td>

                        <!-- User Name -->
                        <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                            <span class="font-medium">{{ $user->name }}</span>
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                            <span class="font-medium">{{ $user->phone }}</span>
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                            <span class="font-medium">{{ $user->address }}</span>
                        </td>

                        <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                            <span class="font-medium">{{ $user->total_orders }}</span>
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                            <span class="font-medium">{{ $user->pending_orders }}</span>
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                            <span class="font-medium">{{ $user->completed_orders }}</span>
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm {{ $user->is_verified ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                <i class="fas {{ $user->is_verified ? 'fa-check-circle' : 'fa-times-circle' }} mr-1.5"></i>
                                {{ $user->is_verified ? 'Verified' : 'Guest' }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                            <span class="font-medium">{{ $user->created_at->format('d M Y') }}</span>
                        </td>




                        <!-- Actions -->
                        <td class="px-4 py-3 whitespace-nowrap">
                            <div class="flex items-center gap-2">
                                <a href="javascript:void(0)"
                                    data-url="{{ route('admin.orders.show', $user->id) }}"
                                    class="showOrderShow px-3 py-1 bg-blue-600 hover:bg-blue-700 text-white rounded-sm transition text-sm">
                                    <i class="fas fa-eye"></i> View
                                </a>
                            </div>
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
        @if($usersWithOrderStats->hasPages())
        <div class="px-6 py-4 flex flex-col sm:flex-row justify-between items-center gap-4 border-t border-gray-200 dark:border-gray-700">
            <!-- Showing Results Info -->
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Showing
                <span class="font-medium text-gray-800 dark:text-gray-200">{{ $usersWithOrderStats->firstItem() }}</span>
                to
                <span class="font-medium text-gray-800 dark:text-gray-200">{{ $usersWithOrderStats->lastItem() }}</span>
                of
                <span class="font-medium text-gray-800 dark:text-gray-200">{{ $usersWithOrderStats->total() }}</span>
                results
            </p>

            <!-- Pagination Links -->
            <div class="flex items-center gap-2">
                <!-- Previous Page -->
                @if($usersWithOrderStats->onFirstPage())
                <span class="px-3 py-2 rounded-lg text-sm font-medium text-gray-400 bg-gray-100 dark:bg-gray-800 dark:text-gray-600 cursor-not-allowed">
                    <i class="fas fa-chevron-left mr-1"></i> Previous
                </span>
                @else
                <a href="{{ $usersWithOrderStats->previousPageUrl() }}"
                    class="px-3 py-2 rounded-lg text-sm font-medium text-gray-700 bg-white dark:bg-gray-800 dark:text-gray-300 border border-gray-300 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                    <i class="fas fa-chevron-left mr-1"></i> Previous
                </a>
                @endif

                <!-- Page Numbers (responsive - show limited on mobile) -->
                <div class="hidden sm:flex items-center gap-1">
                    @foreach($usersWithOrderStats->getUrlRange(max(1, $usersWithOrderStats->currentPage() - 2), min($usersWithOrderStats->lastPage(), $usersWithOrderStats->currentPage() + 2)) as $page => $url)
                    @if($page == $usersWithOrderStats->currentPage())
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
                    Page {{ $usersWithOrderStats->currentPage() }} of {{ $usersWithOrderStats->lastPage() }}
                </div>

                <!-- Next Page -->
                @if($usersWithOrderStats->hasMorePages())
                <a href="{{ $usersWithOrderStats->nextPageUrl() }}"
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



   <!-- Order Details Modal -->
<div id="orderDetailsModal" class="fixed inset-0 z-50 hidden overflow-y-auto">>
    <div class="fixed inset-0 bg-black/60 dark:bg-black/80 closeModal backdrop-blur-xs"></div>

    <!-- Modal Content Box Wrapper -->
    <div class="relative min-h-screen flex items-center justify-center p-4">
        <!-- Main Modal Container Box -->
        <div class="relative bg-white dark:bg-gray-900 border border-gray-100 dark:border-gray-800 rounded-lg shadow-2xl max-w-4xl w-full p-6 dynamic-modal-content transition-all duration-300">
            
            <!-- Loading Spinner  -->
            <div id="modalLoading" class="flex flex-col justify-center items-center py-16 space-y-4">
                <div class="animate-spin rounded-full h-12 w-12 border-4 border-gray-200 dark:border-gray-700 border-t-blue-600 dark:border-t-blue-500"></div>
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400 animate-pulse">Loading details...</p>
            </div>

            <!-- Dynamic Response Container  -->
            <div id="modalBody" class="hidden text-gray-900 dark:text-gray-100">
            </div>
            
        </div>
    </div>
</div>




</main>
@endsection

@push('scripts')
<script>
    const modal = document.getElementById('orderDetailsModal');
    const modalBody = document.getElementById('modalBody');
    const modalLoading = document.getElementById('modalLoading');

    // Update query selector here to target the new anchor class name
    document.querySelectorAll('.showOrderShow').forEach(button => {
        button.addEventListener('click', function() {
            const fetchUrl = this.getAttribute('data-url');

            modal.classList.remove('hidden');
            modalLoading.classList.remove('hidden');
            modalBody.classList.add('hidden');

            fetch(fetchUrl, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.text())
                .then(htmlOutput => {
                    modalLoading.classList.add('hidden');
                    modalBody.innerHTML = htmlOutput;
                    modalBody.classList.remove('hidden');
                })
                .catch(error => {
                    modalBody.innerHTML = '<p class="text-red-500">Failed to load data. Try again.</p>';
                    modalLoading.classList.add('hidden');
                    modalBody.classList.remove('hidden');
                });
        });


            modal.addEventListener('click', function (event) {
                //if the clicked element has the class 'closeModal' or is a child of an element with that class, close the modal
                if (event.target.classList.contains('closeModal') || event.target.closest('.closeModal')) {
                    modal.classList.add('hidden');
                }
            });

        // Close modal on pressing the Escape key
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