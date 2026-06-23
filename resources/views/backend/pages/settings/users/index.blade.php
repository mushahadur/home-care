@extends('backend.layouts.app')

@section('title', 'User Settings ')

@section('content')
<!-- ... Keep everything from previous version up to </header> ... -->

<!-- Main content area -->
<main class="flex-1 overflow-y-auto p-5 md:p-8 bg-gray-50 dark:bg-gray-950 transition-colors">

    <h3 class="text-sm font-bold pb-3">
        <a href="/dashboard" class="hover:underline text-blue-600">Dashboard</a>
        <span class="mx-2"> / </span>
        <span>Users</span>
    </h3>
    <!-- New: Users / Customers Data Table -->
    <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-md shadow-sm dark:shadow-none overflow-hidden">

        <!-- Header + Search -->
        <!-- Header + Search + Create Button -->
        <div class="p-5 md:p-6 border-b border-gray-200 dark:border-gray-800 flex flex-col sm:flex-row sm:items-center justify-between gap-4">

            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 flex items-center gap-2.5">
                <i class="fa-solid fa-receipt text-emerald-600 text-xl"></i>
                Recent Users
            </h3>

            <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4 w-full sm:w-auto">
                <!-- Search -->
                <div class="relative w-full sm:w-72 min-w-[220px]">
                    <input
                        id="table-search"
                        type="text"
                        placeholder="Search orders..."
                        class="w-full pl-10 pr-4 py-2.5 bg-gray-50 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition" />
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fa-solid fa-magnifying-glass text-gray-400"></i>
                    </div>
                </div>

                <!-- Create User Button -->
                <a href="{{ route('admin.users.create') }}"
                    class="px-5 py-2.5 bg-emerald-600 hover:bg-emerald-700 active:bg-emerald-800 text-white font-medium rounded-md flex items-center justify-center gap-2 transition shadow-sm hover:shadow focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 focus:ring-offset-gray-50 dark:focus:ring-offset-gray-900 min-w-[140px]">
                    <i class="fa-solid fa-plus text-base"></i>
                    Create User
                </a>
            </div>
        </div>

        <!-- Table Wrapper (horizontal scroll on mobile) -->
        <div class="overflow-x-auto">
            <table id="users-table" class="min-w-full divide-y divide-gray-200 dark:divide-gray-800">
                <thead class="bg-gray-50 dark:bg-gray-800">
                    <tr>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">SI</th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Name</th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Email</th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Role</th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Date</th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-800">
                    <!-- Sample Row -->
                    @foreach ($users as $key => $user)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $user->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $user->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if(!empty($user->getRoleNames()))
                            @foreach($user->getRoleNames() as $role)
                            <label class="px-2.5 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 dark:bg-blue-900/40 text-blue-800 dark:text-blue-300">{{ $role }}</label>
                            @endforeach
                            @endif
                            <!-- <span class="px-2.5 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 dark:bg-green-900/40 text-green-800 dark:text-green-300">Completed</span> -->
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $user->created_at->format('M j, Y') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                            <div class="flex items-center gap-3">

                                {{-- Edit Button --}}
                                <a href="{{ route('admin.users.edit', $user->id) }}"
                                    class="inline-flex items-center justify-center w-9 h-9 rounded-md 
                  bg-blue-50 text-blue-600 
                  hover:bg-blue-600 hover:text-white 
                  transition-all duration-200"
                                    title="Edit User">

                                    <svg class="w-6 h-6"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="2">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M11 5H6a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h11a2 2 0 0 0 2-2v-5M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                    </svg>

                                </a>


                                {{-- Delete Button --}}
                                <button type="button"
                                    onclick="confirmDelete({{ $user->id }})"
                                    class="inline-flex items-center justify-center w-9 h-9 rounded-md
                       bg-red-50 text-red-600
                       hover:bg-red-600 hover:text-white
                       transition-all duration-200"
                                    title="Delete User">

                                    <svg class="w-6 h-6"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="2">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m-3-3v3" />
                                    </svg>

                                </button>


                                {{-- Hidden Delete Form --}}
                                <form id="delete-user-form-{{ $user->id }}"
                                    method="POST"
                                    action="{{ route('admin.users.destroy', $user->id) }}"
                                    class="hidden">

                                    @csrf
                                    @method('DELETE')

                                </form>

                            </div>
                        </td>
                    </tr>
                    @endforeach

                    <!-- ... more rows ... -->
                </tbody>
            </table>
        </div>

        <!-- Footer with Pagination -->
        @if($users->hasPages())
        <div class="px-6 py-4 flex flex-col sm:flex-row justify-between items-center gap-4 border-t border-gray-200 dark:border-gray-700">
            <!-- Showing Results Info -->
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Showing
                <span class="font-medium text-gray-800 dark:text-gray-200">{{ $users->firstItem() }}</span>
                to
                <span class="font-medium text-gray-800 dark:text-gray-200">{{ $users->lastItem() }}</span>
                of
                <span class="font-medium text-gray-800 dark:text-gray-200">{{ $users->total() }}</span>
                results
            </p>

            <!-- Pagination Links -->
            <div class="flex items-center gap-2">
                <!-- Previous Page -->
                @if($users->onFirstPage())
                <span class="px-3 py-2 rounded-sm text-sm font-medium text-gray-400 bg-gray-100 dark:bg-gray-800 dark:text-gray-600 cursor-not-allowed">
                    <i class="fas fa-chevron-left mr-1"></i> Previous
                </span>
                @else
                <a href="{{ $users->previousPageUrl() }}"
                    class="px-3 py-2 rounded-sm text-sm font-medium text-gray-700 bg-white dark:bg-gray-800 dark:text-gray-300 border border-gray-300 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                    <i class="fas fa-chevron-left mr-1"></i> Previous
                </a>
                @endif

                <!-- Page Numbers (responsive - show limited on mobile) -->
                <div class="hidden sm:flex items-center gap-1">
                    @foreach($users->getUrlRange(max(1, $users->currentPage() - 2), min($users->lastPage(), $users->currentPage() + 2)) as $page => $url)
                    @if($page == $users->currentPage())
                    <span class="px-3 py-2 rounded-sm text-sm font-medium bg-emerald-600 text-white">{{ $page }}</span>
                    @else
                    <a href="{{ $url }}"
                        class="px-3 py-2 rounded-sm text-sm font-medium text-gray-700 bg-white dark:bg-gray-800 dark:text-gray-300 border border-gray-300 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        {{ $page }}
                    </a>
                    @endif
                    @endforeach
                </div>

                <!-- Mobile Page Indicator -->
                <div class="sm:hidden px-3 py-2 rounded-sm text-sm font-medium text-gray-700 bg-gray-100 dark:bg-gray-800 dark:text-gray-300">
                    Page {{ $users->currentPage() }} of {{ $users->lastPage() }}
                </div>

                <!-- Next Page -->
                @if($users->hasMorePages())
                <a href="{{ $users->nextPageUrl() }}"
                    class="px-3 py-2 rounded-sm text-sm font-medium text-gray-700 bg-white dark:bg-gray-800 dark:text-gray-300 border border-gray-300 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                    Next <i class="fas fa-chevron-right ml-1"></i>
                </a>
                @else
                <span class="px-3 py-2 rounded-sm text-sm font-medium text-gray-400 bg-gray-100 dark:bg-gray-800 dark:text-gray-600 cursor-not-allowed">
                    Next <i class="fas fa-chevron-right ml-1"></i>
                </span>
                @endif
            </div>
        </div>
        @endif
        <!-- Optional footer / pagination placeholder -->
    </div>

</main>



@endsection

@push('scripts')
<script src="{{ asset('assets/backend/js/sweetalert2@11.js') }}"></script>
<script>
    function confirmDelete(userId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // User Confiremed
                const form = document.getElementById('delete-user-form-' + userId);
                if (form) {
                    form.submit();
                } else {
                    console.error('Delete form not found for user:', userId);
                }
            }
        });
    }

    // Table search functionality
    document.addEventListener('DOMContentLoaded', () => {
        const searchInput = document.getElementById('table-search');
        const table = document.getElementById('users-table');
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
@push('scripts')