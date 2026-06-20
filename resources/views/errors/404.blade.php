@extends('frontend.layouts.app') {{-- or your layout --}}

@section('title', '404 - Page Not Found')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-500 flex items-center justify-center p-4">
    <div class="max-w-2xl w-full text-center">
        <!-- Animated 404 Number -->
        <div class="relative mb-8">
            <div class="text-[120px] md:text-[180px] font-extrabold text-gray-200 dark:text-gray-800 select-none">
                404
            </div>
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="bg-gradient-to-r from-emerald-500 to-blue-500 bg-clip-text text-transparent text-[100px] md:text-[150px] font-extrabold animate-pulse">
                    404
                </div>
            </div>
        </div>
        
        <!-- Error Message -->
        <h1 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-gray-200 mb-4">
            Oops! Page Not Found
        </h1>
        
        <p class="text-gray-600 dark:text-gray-400 mb-8 text-sm md:text-base">
            The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.
        </p>
        
        
        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ url('/') }}" 
               class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-emerald-600 hover:bg-emerald-700 text-white font-medium rounded-lg transition shadow-md hover:shadow-lg">
                <i class="fas fa-home"></i>
                Back to Home
            </a>
            <a href="#" 
               class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-300 font-medium rounded-lg border border-gray-300 dark:border-gray-600 transition">
                <i class="fas fa-hand-holding-heart"></i>
                Browse Services
            </a>
        </div>
        
        <!-- Quick Links -->
        <div class="mt-12 pt-8 border-t border-gray-200 dark:border-gray-700">
            <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">You might find these helpful:</p>
            <div class="flex flex-wrap gap-3 justify-center">
                <a href="{{ route('home') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:text-emerald-600 dark:hover:text-emerald-400 transition">About Us</a>
                <span class="text-gray-300 dark:text-gray-600">•</span>
                <a href="{{ route('home') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:text-emerald-600 dark:hover:text-emerald-400 transition">Contact Support</a>
                <span class="text-gray-300 dark:text-gray-600">•</span>
                <a href="{{ route('home') }}" class="text-sm text-gray-600 dark:text-gray-400 hover:text-emerald-600 dark:hover:text-emerald-400 transition">FAQ</a>
            </div>
        </div>
    </div>
</div>

@endsection