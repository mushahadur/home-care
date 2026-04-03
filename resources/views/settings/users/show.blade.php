@extends('layouts.app')

@section('content')
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="page-header-title">
                    <h5 class="mb-0 font-medium">Show User</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item" aria-current="page">Show User</li>
                </ul>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <!-- [ Main Content ] start -->
        <div class="grid grid-cols-12 gap-x-6">
            <div class="col-span-12 xl:col-span-12 md:col-span-12">
                <div class="card table-card shadow-lg">
                    <div class="card-header flex justify-between items-center">
                        <h3 class="text-lg font-semibold">User Profile</h3>
                        <div class="pull-right">
                            <a class="btn btn-primary btn-sm mb-2" href="{{ route('users.index') }}">
                                <i class="fa fa-arrow-left"></i> Back
                            </a>
                        </div>
                    </div>

                    <div class="col-span-12 xl:col-span-4 my-5 p-5">
                        <div class="card card-social">
                            <div class="card-body border-b border-theme-border dark:border-themedark-border">
                                <div class="flex items-center justify-center">
                                    <div class="shrink-0">
                                        <div class="mx-5">
                                            <img
                                                src="{{ $user->profile_image_url ?? 'https://placehold.co/128x128/6d6aa6/FFF?text=Hello+World' }}"
                                                alt="User Image"
                                                class="rounded-full w-64 h-64 border-2 border-gray-300">
                                        </div>
                                    </div>
                                     <div class="grow ltr:text-right rtl:text-left">
                                    @if(!empty($user->getRoleNames()))
                                    @foreach($user->getRoleNames() as $v)
                                    <label class="badge bg-theme-bg-1 text-white text-[12px]">{{ $v }}</label>
                                    @endforeach
                                    @endif
                                </div>
                                    <div class="grow ltr:text-right rtl:text-left">
                                        <h4 class="mb-2">{{ $user->name }}</h4>
                                        <h5 class="text-success-500 mb-0"><span class="text-muted">{{ $user->email }}</span></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
</div>
</div>
@endsection