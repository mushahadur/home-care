@extends('backend.layouts.app')


@section('title', 'Page Not Found')

@section('content')
    <div class="text-center py-24">
        <h1 class="text-5xl font-bold text-gray-800 dark:text-white">404</h1>
        <p class="mt-4 text-lg text-gray-600 dark:text-gray-300">Oops! Page not found or you don’t have access.</p>
        <a href="{{ url('/') }}" class="mt-6 inline-block px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Go Home
        </a>
    </div>
@endsection
