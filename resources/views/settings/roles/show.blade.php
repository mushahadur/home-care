
@extends('layouts.app')

@section('content')
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="page-header-title">
                    <h5 class="mb-0 font-medium">Show Role</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item" aria-current="page">Show Role</li>
                </ul>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <!-- [ Main Content ] start -->
        <div class="grid grid-cols-12 gap-x-6">
            <div class="col-span-12 xl:col-span-12 md:col-span-12">
                <div class="card table-card">
                    <div class="card-header flex justify-between">
                        <h3>Show Role</h3>
                        <div class="pull-right">
                            <a class="btn btn-primary btn-sm mb-2" href="{{ route('roles.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="p-5">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="mb-3">
                                        <strong><h4>Role: {{ $role->name }}</h4></strong>
                                       
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Permissions:</strong>
                                        @if(!empty($rolePermissions))
                                        @foreach($rolePermissions as $v)
                                        <label class="label badge bg-theme-bg-2 text-white text-[12px] mx-2">{{ $v->name }}</label>
                                        @endforeach
                                        @endif
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