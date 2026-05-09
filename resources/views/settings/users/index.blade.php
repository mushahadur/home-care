<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User') }}
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
                <div class="page-header-title">
                    <h5 class="mb-0 font-medium">Users</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item" aria-current="page">Users</li>
                </ul>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <!-- [ Main Content ] start -->
        <div class="grid grid-cols-12 gap-x-6">

            <div class="col-span-12 xl:col-span-12 md:col-span-12">
                <div class="card table-card">
                    <div class="card-header flex justify-between">
                        <h3>Users Management</h3>
                        @can('user-create')
                        <div class="">
                            <a class="btn badge bg-theme-bg-1 text-white flex justify-between items-center px-4 py-2 w-full" href="{{ route('users.create') }}">
                                <i data-feather="user-plus"></i>
                                <span>Create New User</span>
                            </a>

                        </div>
                        @endcan
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr class="text-bold"> <!-- or style="font-weight: bold;" -->
                                        <th>SI</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Date</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @foreach ($data as $key => $user)
                                <tbody>
                                    <tr class="unread">
                                        <td>
                                            #00{{ ++$i }}
                                        </td>
                                        <td>
                                            <img class="rounded-full max-w-10" style="width: 40px" src="../assets/images/user/avatar-2.jpg" alt="activity-user" />
                                        </td>
                                        <td>
                                            <h6 class="mb-1">{{ $user->name }}</h6>
                                        </td>
                                        <td>
                                            <h6 class="mb-1">{{ $user->email }}</h6>
                                        </td>
                                        <td>
                                            <h6 class="text-muted">
                                                <i class="fas fa-circle text-danger text-[10px] ltr:mr-4 rtl:ml-4"></i>
                                                11 MAY 10:35
                                                <!-- {{ $user->created_date }} -->
                                            </h6>
                                        </td>
                                        <td>
                                            @if(!empty($user->getRoleNames()))
                                            @foreach($user->getRoleNames() as $v)
                                            <label class="badge bg-theme-bg-1 text-white text-[12px] mx-2">{{ $v }}</label>
                                            @endforeach
                                            @endif
                                            <!-- <a href="#!" class="badge bg-theme-bg-2 text-white text-[12px] mx-2">Admin</a> -->
                                            <!-- <a href="#!" class="badge bg-theme-bg-1 text-white text-[12px]">Approve</a> -->
                                        </td>

                                        <td>
                                            @can('user-show')
                                            <div class="i-block mx-1" data-clipboard-text="eye" data-filter="eye" style="display: inline-flex;">
                                                <a href="{{ route('users.show',$user->id) }}" class="text-success-500">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye w-5 h-5">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle cx="12" cy="12" r="3"></circle>
                                                    </svg>
                                                </a>
                                            </div>
                                            @endcan
                                            @can('user-edit')
                                            <div class="i-block mx-2" data-clipboard-text="eye" data-filter="eye" style="display: inline-flex;">
                                                <a href="{{ route('users.edit',$user->id) }}" class="text-primary-500">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit w-5 h-5">
                                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                                    </svg>
                                                </a>
                                            </div>
                                            @endcan
                                            @can('user-delete')

                                            <div class="i-block mx-1" data-clipboard-text="eye" data-filter="eye" style="display: inline-flex;">
                                                <form method="POST" action="{{ route('users.destroy', $user->id) }}" style="display:inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-500">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 w-5 h-5">
                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                            @endcan
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>

                            {!! $data->links('pagination::bootstrap-5') !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>>
            </div>
        </div>
    </div>
</x-app-layout>



