@extends('backend.layouts.app')

@section('title', 'Permission Settings ')

@section('content')
<!-- ... Keep everything from previous version up to </header> ... -->

<!-- Main content area -->
<main class="flex-1 overflow-y-auto p-5 md:p-8 bg-gray-50 dark:bg-gray-950 transition-colors">

    <h3 class="text-sm font-bold pb-3">
        <a href="/dashboard" class="hover:underline text-blue-600">Dashboard</a>
        <span class="mx-2"> / </span>
        <span>Permissions</span>
    </h3>
    <!-- New: Users / Customers Data Table -->
    <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded shadow-sm dark:shadow-none overflow-hidden">

        <!-- Header + Search -->
        <!-- Header + Search + Create Button -->
        <div class="p-5 md:p-6 border-b border-gray-200 dark:border-gray-800 flex flex-col sm:flex-row sm:items-center justify-between gap-4">

            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 flex items-center gap-2.5">
                <i class="fa-solid fa-receipt text-emerald-600 text-xl"></i>
                Recent Permissions
            </h3>

            <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4 w-full sm:w-auto">
                <!-- Search -->
                <div class="relative w-full sm:w-72 min-w-[220px]">
                    <input
                        id="table-search"
                        type="text"
                        placeholder="Search permissions..."
                        class="w-full pl-10 pr-4 py-2 bg-gray-50 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition" />
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fa-solid fa-magnifying-glass text-gray-400"></i>
                    </div>
                </div>

                <!-- Create User Button -->
                <a href="{{ route('admin.permissions.create') }}"
                    class="px-5 py-2 bg-emerald-600 hover:bg-emerald-700 active:bg-emerald-800 text-white font-medium rounded flex items-center justify-center gap-2 transition shadow-sm hover:shadow focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 focus:ring-offset-gray-50 dark:focus:ring-offset-gray-900 min-w-[140px]">
                    <i class="fa-solid fa-plus text-base"></i>
                    Create Permission
                </a>
            </div>
        </div>

        <!-- Table Wrapper (horizontal scroll on mobile) -->
        <div class="overflow-x-auto">
            <table id="permission-table" class="min-w-full divide-y divide-gray-200 dark:divide-gray-800">
                <thead class="bg-gray-50 dark:bg-gray-800">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-800 dark:text-gray-100 uppercase">SI</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-800 dark:text-gray-100 uppercase">Group Name</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-800 dark:text-gray-100 uppercase">Permissions</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-800 dark:text-gray-100 uppercase">Created At</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-800 dark:text-gray-100 uppercase">Action</th>
                    </tr>
                </thead>

                <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-800">

                    @foreach ($permissions as $group => $groupPermissions)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50 transition">

                        <!-- SI -->
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">{{ $loop->iteration }}</td>

                        <!-- Group Name -->
                        <td class="px-6 py-4 text-sm font-medium text-gray-900 dark:text-gray-100 capitalize">
                            {{ str_replace('-', ' ', $group) }}
                        </td>

                        <!-- Permissions -->
                        <td class="px-6 py-4 text-sm text-gray-600">
                            <div class="flex flex-wrap gap-2">
                                @foreach ($groupPermissions as $perm)
                                <span class="px-3 py-1 text-xs rounded-full bg-blue-100 text-blue-700 font-medium">
                                    {{ explode('-', $perm->name)[1] }}
                                </span>
                                @endforeach
                            </div>
                        </td>

                        <!-- Date -->
                        <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">
                            {{ optional($groupPermissions->first()->created_at)->format('M d, Y') }}
                        </td>


                        <td class="px-6 py-4 text-sm">
                            <div class="flex items-center gap-2">

                                {{-- Edit --}}
                                @can('permissions-edit')
                                <button
                                    onclick="window.location.href='{{ route('admin.permissions.edit', $groupPermissions->first()->id) }}'"
                                    class="text-blue-500 hover:text-blue-700 transition-colors">
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h11a2 2 0 0 0 2-2v-5M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                    </svg>
                                </button>
                                @endcan

                                {{-- Delete --}}
                                @can('permissions-destroy')
                                <button class="text-red-500 hover:text-red-700 ml-2" onclick="confirmDelete('{{ $groupPermissions->first()->id }}')">
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m-3-3v3" />
                                    </svg>
                                </button>
                                <!-- Hidden Form -->
                                <form id="delete-permissions-form-{{ $groupPermissions->first()->id }}" method="POST" action="{{ route('admin.permissions.destroy', $groupPermissions->first()->id) }}" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                @endcan

                            </div>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        <!-- Optional footer / pagination placeholder -->
        <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-800 text-sm text-gray-500 dark:text-gray-400 flex justify-between items-center">
            <span>Showing 1–10 of 48 orders</span>
            <div class="flex gap-2">
                <button class="px-3 py-1 border border-gray-300 dark:border-gray-700 rounded hover:bg-gray-50 dark:hover:bg-gray-800 disabled:opacity-50" disabled>Previous</button>
                <button class="px-3 py-1 border border-gray-300 dark:border-gray-700 rounded hover:bg-gray-50 dark:hover:bg-gray-800">Next</button>
            </div>
        </div>
    </div>

</main>

<!-- ... rest of the layout ... -->

@endsection

@push('scripts')
<script src="{{ asset('assets/backend/js/sweetalert2@11.js') }}"></script>
<script>
    function confirmDelete(permissionsId) {
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
                const form = document.getElementById('delete-permissions-form-' + permissionsId);
                if (form) {
                    form.submit();
                } else {
                    console.error('Delete form not found for permissions:', permissionsId);
                }
            }
        });
    }

    // Table search functionality
    document.addEventListener('DOMContentLoaded', () => {
        const searchInput = document.getElementById('table-search');
        const table = document.getElementById('permission-table');
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