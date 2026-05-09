<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Role Settings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="pc-container">
                    <div class="pc-content">
                        <!-- [ breadcrumb ] start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="page-header-title"></div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Role</li>
                                </ul>
                            </div>
                        </div>
                        <!-- [ breadcrumb ] end -->

                        <!-- [ Main Content ] start -->
                        <div class="grid grid-cols-12 gap-x-6">
                            <div class="col-span-12">
                                <div class="card table-card">
                                    <div class="card-header flex justify-between">
                                        <h3>Role Management</h3>
                                        @can('role-create')
                                        <a class="btn badge bg-theme-bg-1 text-white flex items-center px-4 py-2" href="{{ route('roles.create') }}">
                                            <i data-feather="plus" class="mr-2"></i>
                                            <span>Create Role</span>
                                        </a>
                                        @endcan
                                    </div>

                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr class="font-bold">
                                                        <th>SI</th>
                                                        <th>Role Name</th>
                                                        <th>Date</th>
                                                        <th>Permissions</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $i = ($roles->currentPage() - 1) * $roles->perPage(); @endphp

                                                    @foreach ($roles as $role)
                                                    @if ($role->name !== 'super-admin')
                                                    <tr>
                                                        <td>#{{ sprintf('%03d', ++$i) }}</td>
                                                        <td>{{ $role->name }}</td>
                                                        <td>
                                                            <span class="text-muted">
                                                                {{-- Optional formatting --}}
                                                                {{ $role->created_at->format('d M Y H:i') }}
                                                            </span>
                                                        </td>
                                                        <td>
                                                            @foreach ($role->permissions as $permission)
                                                            <span class="badge bg-theme-bg-2 text-white">
                                                                {{ $permission->name }}
                                                            </span>
                                                            @endforeach
                                                        </td>
                                                        <td class="flex space-x-2">
                                                            @can('role-show')
                                                            <a href="{{ route('roles.show', $role->id) }}" class="text-success-500">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                                    <circle cx="12" cy="12" r="3"></circle>
                                                                </svg>

                                                            </a>
                                                            @endcan

                                                            @can('role-edit')
                                                            <a href="{{ route('roles.edit', $role->id) }}" class="text-primary-500">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                                    <circle cx="12" cy="12" r="3"></circle>
                                                                </svg>

                                                            </a>
                                                            @endcan

                                                            @can('role-delete')
                                                            <form method="POST" action="{{ route('roles.destroy', $role->id) }}" onsubmit="return confirm('Are you sure?');">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="text-red-500">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
    <circle cx="12" cy="12" r="3"></circle>
</svg>
>
                                                                </button>
                                                            </form>
                                                            @endcan
                                                        </td>
                                                    </tr>
                                                    @endif
                                                    @endforeach
                                                </tbody>
                                            </table>

                                            <!-- Pagination -->
                                            <div class="mt-4">
                                                {!! $roles->links('pagination::bootstrap-5') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- [ Main Content ] end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>