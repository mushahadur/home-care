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
    <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl shadow-sm dark:shadow-none overflow-hidden">

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
                        class="w-full pl-10 pr-4 py-2.5 bg-gray-50 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition" />
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fa-solid fa-magnifying-glass text-gray-400"></i>
                    </div>
                </div>

                <!-- Create User Button -->
                <a href="{{ route('permissions.create') }}"
                    class="px-5 py-2.5 bg-emerald-600 hover:bg-emerald-700 active:bg-emerald-800 text-white font-medium rounded-lg flex items-center justify-center gap-2 transition shadow-sm hover:shadow focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 focus:ring-offset-gray-50 dark:focus:ring-offset-gray-900 min-w-[140px]">
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
                                <a href="{{ route('permissions.edit', $groupPermissions->first()->id) }}"
                                    class="inline-flex items-center px-3 py-1.5 rounded-md bg-yellow-100 text-yellow-700 hover:bg-yellow-200 text-xs font-medium transition">
                                    <i class="fas fa-pen"></i>
                                </a>
                                @endcan

                                {{-- Delete --}}
                                @can('permissions-destroy')
                                <form action="{{ route('permissions.destroy', $groupPermissions->first()->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this group? All permissions in this group will be deleted.')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="inline-flex items-center px-3 py-1.5 rounded-md bg-red-100 text-red-700 hover:bg-red-200 text-xs font-medium transition">
                                        <i class="fas fa-trash"></i>
                                    </button>
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
    function confirmDelete(productId) {
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
                const form = document.getElementById('delete-product-form-' + productId);
                if (form) {
                    form.submit();
                } else {
                    console.error('Delete form not found for product:', productId);
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