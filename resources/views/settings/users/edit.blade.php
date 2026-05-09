@extends('layouts.app')

@section('content')
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="page-header-title">
                    <h5 class="mb-0 font-medium">Edit Users</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item" aria-current="page">Edit Users</li>
                </ul>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- [ Main Content ] start -->
        <div class="grid grid-cols-12 gap-x-6">

            <div class="col-span-12 xl:col-span-12 md:col-span-12">
                <div class="card table-card">
                    <div class="card-header flex justify-between">
                        <h3>Edit Users</h3>
                        <div class="pull-right">
                            <a class="btn btn-primary btn-sm mb-2" href="{{ route('users.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="p-5">
                            <form method="POST" action="{{ route('users.update', $user->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="grid grid-row-12 gap-x-6">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <!-- Name -->
                                        <div class="md:col-span-2 mb-3">
                                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">
                                                Name
                                            </label>
                                            <input
                                                type="text"
                                                name="name"
                                                id="name"
                                                value="{{ $user->name }}"
                                                placeholder="Enter name"
                                                class="form-control w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2">
                                        </div>


                                        <!-- Email -->
                                        <div class="md:col-span-2 mb-3">
                                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">
                                                Email
                                            </label>
                                            <input
                                                type="email"
                                                name="email"
                                                id="email"
                                                value="{{ $user->email }}"
                                                placeholder="Enter email"
                                                class="form-control w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2">
                                        </div>

                                        <!-- Password -->
                                        <div class="md:col-span-2 mb-3">
                                            <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">
                                                Password
                                            </label>
                                            <input
                                                type="password"
                                                name="password"
                                                id="password"
                                                placeholder="Enter password"
                                                class="form-control w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2">
                                        </div>

                                        <!-- Confirm Password -->
                                        <div class="md:col-span-2 mb-3">
                                            <label for="confirm-password" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">
                                                Confirm Password
                                            </label>
                                            <input
                                                type="password"
                                                name="confirm-password"
                                                id="confirm-password"
                                                placeholder="Confirm password"
                                                class="form-control w-full rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2">
                                        </div>
                                        <!-- Roles -->
                                        <div class="md:col-span-2 mb-3">
                                            <label for="roles" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">
                                                Roles
                                            </label>
                                            <select
                                                name="roles"
                                                id="roles"
                                                class="form-control p-2">
                                                @foreach ($roles as $value => $label)
                                                <option value="{{ $value }}" {{ isset($userRole[$value]) ? 'selected' : ''}}>
                                                    {{ $label }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <button type="submit" class="flex justify-center btn btn-primary btn-sm mt-2 mb-3 px-3"><i class="mx-2" data-feather="save"></i> Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
@endsection