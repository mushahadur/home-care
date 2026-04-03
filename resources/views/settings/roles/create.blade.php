@extends('layouts.app')

@section('content')
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="page-header-title">
                    <h5 class="mb-0 font-medium">Create Role</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item" aria-current="page">Create Role</li>
                </ul>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="grid grid-cols-12 gap-x-6">
            <div class="col-span-12 xl:col-span-12 md:col-span-12">
                <div class="card table-card">
                    <div class="card-header flex justify-between">
                        <h3>Create Role</h3>
                        <div class="pull-right">
                            <a class="btn btn-primary btn-sm mb-2" href="{{ route('roles.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="p-5">

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

                            <form method="POST" action="{{ route('roles.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <h5 style="margin-bottom: 10px;">Role Name:</h5>
                                            <input type="text" name="name" placeholder="Enter Role Name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 my-3">
                                        <div class="form-group">
                                            <strong><h5 style="margin-bottom: 10px;">Permission:</h5></strong>
                                            @foreach($permission as $value)
                                            <label class="py-3">
                                                <input type="checkbox" name="permission[{{$value->id}}]" value="{{$value->id}}" class="name py-3"  style="margin-bottom: 16px; margin-top: 10px;" />
                                                {{ $value->name }}
                                            </label>
                                            <br />
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                        <button type="submit" class="flex justify-center btn btn-primary btn-sm mt-2 mb-3 px-3"><i class="mx-2" data-feather="save"></i> Submit</button>
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