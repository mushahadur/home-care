@extends('backend.layouts.app')

@section('title', '403 Forbidden')

@section('content')

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <div class="flex flex-col items-center justify-center min-h-screen bg-gray-100 dark:bg-gray-900">
                <h1 class="text-6xl font-bold text-red-600 mb-4">403</h1>
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100 mb-2">Forbidden</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-6">You do not have permission to access this page.</p>

                <a href="{{ route('dashboard') }}" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
                    Go Back to Dashboard
                </a>
            </div>
        </div>
    </div>
</div>
@endsection