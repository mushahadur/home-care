@extends('backend.layouts.app')

@section('title', 'Role Settings ')

@section('content')
<!-- ... Keep everything from previous version up to </header> ... -->

<!-- Main content area -->
<main class="flex-1 overflow-y-auto p-5 md:p-8 bg-gray-50 dark:bg-gray-950 transition-colors">

    <h3 class="text-sm font-bold pb-3">
        <a href="/dashboard" class="hover:underline text-blue-600">Dashboard</a>
        <span class="mx-2"> / </span>
        <span>Roles</span>
    </h3>
    <!-- New: Roles Data Table -->
    <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded shadow-sm dark:shadow-none overflow-hidden">

        <!-- Header + Search -->
        <!-- Header + Search + Create Button -->
        <div class="p-5 md:p-6 border-b border-gray-200 dark:border-gray-800 flex flex-col sm:flex-row sm:items-center justify-between gap-4">

            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 flex items-center gap-2.5">
                <i class="fa-solid fa-receipt text-emerald-600 text-xl"></i>
                Recent Roles
            </h3>

            <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4 w-full sm:w-auto">
                <!-- Search -->
                <div class="relative w-full sm:w-72 min-w-[220px]">
                    <input
                        id="table-search"
                        type="text"
                        placeholder="Search roles..."
                        class="w-full pl-10 pr-4 py-2.5 bg-gray-50 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition" />
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fa-solid fa-magnifying-glass text-gray-400"></i>
                    </div>
                </div>

                <!-- Create Role Button -->
                <a href="{{ route('admin.roles.create') }}"
                    class="px-5 py-2.5 bg-emerald-600 hover:bg-emerald-700 active:bg-emerald-800 text-white font-medium rounded flex items-center justify-center gap-2 transition shadow-sm hover:shadow focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 focus:ring-offset-gray-50 dark:focus:ring-offset-gray-900 min-w-[140px]">
                    <i class="fa-solid fa-plus text-base"></i>
                    Create Role
                </a>
            </div>
        </div>

        <!-- Table Wrapper (horizontal scroll on mobile) -->
        <div class="overflow-x-auto">
            <table id="roles-table" class="min-w-full divide-y divide-gray-200 dark:divide-gray-800">
                <thead class="bg-gray-50 dark:bg-gray-800">
                    <tr>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">SI</th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Name</th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Permission</th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Status</th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Date</th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-800">
                    <!-- Sample Row -->
                    @foreach ($roles as $key => $role)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $role->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">
                            <div class="max-w-[1200px] overflow-x-auto">
                                <div class="flex flex-wrap gap-1.5 min-w-min">
                                    @foreach($role->permissions as $permission)
                                    <span class="px-2.5 py-1 inline-flex items-center text-xs leading-5 font-semibold rounded-full bg-green-100 dark:bg-green-900/40 text-green-800 dark:text-green-300 whitespace-nowrap">
                                        <svg class="w-2.5 h-2.5 mr-1 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                        </svg>
                                        <span>{{ $permission->name }}</span>
                                    </span>
                                    @endforeach
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2.5 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 dark:bg-blue-900/40 text-blue-800 dark:text-blue-300">Active</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $role->created_at->format('M j, Y') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                            <div class="flex items-center gap-3">

                                {{-- Edit Button --}}
                                <a href="{{ route('admin.roles.edit', $role->id) }}"
                                    class="inline-flex items-center justify-center w-9 h-9 rounded-md 
                  bg-blue-50 text-blue-600 
                  hover:bg-blue-600 hover:text-white 
                  transition-all duration-200"
                                    title="Edit Role">

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
                                    onclick="confirmDelete({{ $role->id }})"
                                    class="inline-flex items-center justify-center w-9 h-9 rounded-md
                       bg-red-50 text-red-600
                       hover:bg-red-600 hover:text-white
                       transition-all duration-200"
                                    title="Delete Role">

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
                                <form id="delete-role-form-{{ $role->id }}"
                                    method="POST"
                                    action="{{ route('admin.roles.destroy', $role->id) }}"
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
        @if($roles->hasPages())
        <div class="px-6 py-4 flex flex-col sm:flex-row justify-between items-center gap-4 border-t border-gray-200 dark:border-gray-700">
            <!-- Showing Results Info -->
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Showing
                <span class="font-medium text-gray-800 dark:text-gray-200">{{ $roles->firstItem() }}</span>
                to
                <span class="font-medium text-gray-800 dark:text-gray-200">{{ $roles->lastItem() }}</span>
                of
                <span class="font-medium text-gray-800 dark:text-gray-200">{{ $roles->total() }}</span>
                results
            </p>

            <!-- Pagination Links -->
            <div class="flex items-center gap-2">
                <!-- Previous Page -->
                @if($roles->onFirstPage())
                <span class="px-3 py-2 rounded-sm text-sm font-medium text-gray-400 bg-gray-100 dark:bg-gray-800 dark:text-gray-600 cursor-not-allowed">
                    <i class="fas fa-chevron-left mr-1"></i> Previous
                </span>
                @else
                <a href="{{ $roles->previousPageUrl() }}"
                    class="px-3 py-2 rounded-sm text-sm font-medium text-gray-700 bg-white dark:bg-gray-800 dark:text-gray-300 border border-gray-300 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                    <i class="fas fa-chevron-left mr-1"></i> Previous
                </a>
                @endif

                <!-- Page Numbers (responsive - show limited on mobile) -->
                <div class="hidden sm:flex items-center gap-1">
                    @foreach($roles->getUrlRange(max(1, $roles->currentPage() - 2), min($roles->lastPage(), $roles->currentPage() + 2)) as $page => $url)
                    @if($page == $roles->currentPage())
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
                    Page {{ $roles->currentPage() }} of {{ $roles->lastPage() }}
                </div>

                <!-- Next Page -->
                @if($roles->hasMorePages())
                <a href="{{ $roles->nextPageUrl() }}"
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

<!-- ... rest of the layout ... -->

@endsection

@push('scripts')
<script src="{{ asset('assets/backend/js/sweetalert2@11.js') }}"></script>
<script>
    function confirmDelete(roleId) {
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
                // role Confiremed
                const form = document.getElementById('delete-role-form-' + roleId);
                if (form) {
                    form.submit();
                } else {
                    console.error('Delete form not found for role:', roleId);
                }
            }
        });
    }

    // Table search functionality
    document.addEventListener('DOMContentLoaded', () => {
        const searchInput = document.getElementById('table-search');
        const table = document.getElementById('roles-table');
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