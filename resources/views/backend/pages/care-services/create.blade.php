@extends('backend.layouts.app')

@section('title', 'Create Care Services - NurseNextDoor')

@section('content')
<!-- Main content area -->
<main class="flex-1 overflow-y-auto p-5 md:p-8 bg-gray-50 dark:bg-gray-950 transition-colors">

    <!-- Breadcrumb -->
    <h3 class="text-sm font-bold pb-3">
        <a href="/dashboard" class="hover:underline text-blue-600">Dashboard</a>
        <span class="mx-2"> / </span>
        <span><a href="{{ route('admin.care-services.index') }}" class="hover:underline text-blue-600">Care Services</a></span>
        <span class="mx-2"> / </span>
        <span class="text-gray-700 dark:text-gray-300">Create New Service</span>
    </h3>

    <!-- Care Services Form Card -->
    <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded shadow-sm dark:shadow-none overflow-hidden">
        
        <div class="p-6 md:p-8">
            <h4 class="flex justify-between items-center text-lg font-semibold text-gray-800 dark:text-gray-200 mb-6 pb-2 border-b border-gray-200 dark:border-gray-700">
                <span><i class="fas fa-hand-holding-heart mr-2 text-emerald-500"></i> Add Care Service</span>
                <a href="{{ route('admin.care-services.index') }}" 
                    class="bg-gray-100 hover:bg-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 text-gray-800 dark:text-gray-200 font-medium py-2 px-4 rounded transition flex items-center gap-2 border border-gray-300 dark:border-gray-600 text-sm">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </h4>

            <form action="{{ route('admin.care-services.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- Service Name Field -->
                <div class="space-y-2">
                    <label for="care_services_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        <i class="fas fa-tag mr-2 text-emerald-500"></i>Service Name
                    </label>
                    <input 
                        type="text" 
                        name="care_services_name" 
                        id="care_services_name"
                        value="{{ old('care_services_name') }}" 
                        placeholder="Enter service name (e.g., IV Injection, Home Visit)"
                        class="w-full px-4 py-2 rounded border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none transition @error('care_services_name') border-red-500 dark:border-red-500 @enderror"
                        required
                        autofocus
                    >
                    @error('care_services_name')
                        <span class="text-red-600 dark:text-red-400 text-sm flex items-center gap-1 mt-1">
                            <i class="fas fa-exclamation-circle"></i> {{ $message }}
                        </span>
                    @enderror
                </div>

                 <!-- Price & Time Row (Responsive Grid) -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <!-- Single Price Field -->
                    <div class="space-y-2">
                        <label for="single_services_price" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            <i class="fas fa-dollar-sign mr-2 text-emerald-500"></i> Single Price (BDT)
                        </label>
                        <input 
                            type="number" 
                            name="single_services_price" 
                            id="single_services_price"
                            value="{{ old('single_services_price') }}" 
                            placeholder="Enter service price"
                            step="0.01"
                            class="w-full px-4 py-2 rounded border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none transition @error('single_services_price') border-red-500 dark:border-red-500 @enderror"
                            required
                        >
                        @error('single_services_price')
                            <span class="text-red-600 dark:text-red-400 text-sm flex items-center gap-1 mt-1">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <!-- Triple Days Price Field -->
                    <div class="space-y-2">
                        <label for="triple_services_price" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            <i class="fas fa-dollar-sign mr-2 text-emerald-500"></i> Triple Days Price (BDT)
                        </label>
                        <input 
                            type="number" 
                            name="triple_services_price" 
                            id="triple_services_price"
                            value="{{ old('triple_services_price') }}" 
                            placeholder="Enter service price"
                            step="0.01"
                            class="w-full px-4 py-2 rounded border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none transition @error('triple_services_price') border-red-500 dark:border-red-500 @enderror"
                            required
                        >
                        @error('triple_services_price')
                            <span class="text-red-600 dark:text-red-400 text-sm flex items-center gap-1 mt-1">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <!-- Seven Days Price Field -->
                    <div class="space-y-2">
                        <label for="seven_services_price" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            <i class="fas fa-dollar-sign mr-2 text-emerald-500"></i> Seven Days Price (BDT)
                        </label>
                        <input 
                            type="number" 
                            name="seven_services_price" 
                            id="seven_services_price"
                            value="{{ old('seven_services_price') }}" 
                            placeholder="Enter service price"
                            step="0.01"
                            class="w-full px-4 py-2 rounded border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none transition @error('seven_services_price') border-red-500 dark:border-red-500 @enderror"
                            required
                        >
                        @error('seven_services_price')
                            <span class="text-red-600 dark:text-red-400 text-sm flex items-center gap-1 mt-1">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>

                <!-- Description Field -->
                <div class="space-y-2">
                    <label for="care_services_description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        <i class="fas fa-align-left mr-2 text-emerald-500"></i>Description
                    </label>
                    <textarea 
                        name="care_services_description" 
                        id="care_services_description"
                        rows="5" 
                        placeholder="Enter detailed service description (e.g., procedure, benefits, what to expect)"
                        class="w-full px-4 py-2 rounded border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none transition @error('care_services_description') border-red-500 dark:border-red-500 @enderror"
                    >{{ old('care_services_description') }}</textarea>
                    @error('care_services_description')
                        <span class="text-red-600 dark:text-red-400 text-sm flex items-center gap-1 mt-1">
                            <i class="fas fa-exclamation-circle"></i> {{ $message }}
                        </span>
                    @enderror
                </div>

               <!-- Image Field -->
                <div class="space-y-2">
                    <label for="care_services_image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        <i class="fas fa-image mr-2 text-emerald-500"></i>Upload Image
                    </label>
                    
                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
                        <!-- File Input -->
                        <div class="flex-1 w-full">
                            <input 
                                type="file" 
                                name="care_services_image" 
                                id="care_services_image"
                                accept="image/*"
                                class="w-full px-4 py-1 rounded border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none transition file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 dark:file:bg-emerald-900/30 dark:file:text-emerald-400 @error('care_services_image') border-red-500 dark:border-red-500 @enderror"
                            >
                        </div>
                        
                        <!-- Image Preview -->
                        <div id="image-preview" class="hidden w-20 h-20 rounded border-2 border-dashed border-gray-300 dark:border-gray-600 overflow-hidden bg-gray-50 dark:bg-gray-800 flex-shrink-0">
                            <img id="image-img" class="w-full h-full object-cover" alt="Image preview">
                        </div>
                    </div>
                    
                    <!-- Helper Text -->
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1 flex items-center gap-1">
                        <i class="fas fa-info-circle"></i>
                        <span>Recommended size: 300x300px. Max 2MB. Supported formats: JPG, PNG, GIF.</span>
                    </p>
                    
                    @error('care_services_image')
                        <span class="text-red-600 dark:text-red-400 text-sm flex items-center gap-1 mt-1">
                            <i class="fas fa-exclamation-circle"></i> {{ $message }}
                        </span>
                    @enderror
                </div>
                <!-- Form Actions -->
                <div class="flex flex-col sm:flex-row gap-3 pt-4 border-t border-gray-200 dark:border-gray-700">
                    <button 
                        type="submit" 
                        class="flex-1 bg-emerald-600 hover:bg-emerald-700 text-white font-medium py-2 px-6 rounded transition flex items-center justify-center gap-2 shadow-sm"
                    >
                        <i class="fas fa-save"></i>
                        Create Service
                    </button>
                    
                    <a 
                        href="{{ route('admin.care-services.index') }}" 
                        class="flex-1 bg-gray-100 hover:bg-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 text-gray-800 dark:text-gray-200 font-medium py-2 px-6 rounded transition flex items-center justify-center gap-2 border border-gray-300 dark:border-gray-600"
                    >
                        <i class="fas fa-times"></i>
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Quick Tips Card -->
    <div class="mt-6 bg-rose-50 dark:bg-rose-900/20 border border-rose-200 dark:border-rose-800 rounded-xl p-4">
        <div class="flex items-start gap-3">
            <i class="fas fa-lightbulb text-rose-600 dark:text-rose-400 mt-1"></i>
            <div>
                <h5 class="font-medium text-rose-800 dark:text-rose-300">Quick Tips</h5>
                <ul class="text-sm text-rose-700 dark:text-rose-400 space-y-1 mt-1 list-disc list-inside">
                    <li>Use a clear and descriptive service name that patients will understand</li>
                    <li>Add a detailed description explaining the procedure and benefits</li>
                    <li>Upload high-quality images that represent your service professionally</li>
                    <li>Set competitive pricing based on market rates and service quality</li>
                </ul>
            </div>
        </div>
    </div>

</main>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Image Preview Functionality
    const imageInput = document.getElementById('care_services_image');
    const imagePreview = document.getElementById('image-preview');
    const imageImg = document.getElementById('image-img');
    
    if (imageInput) {
        imageInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    imageImg.src = event.target.result;
                    imagePreview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                imagePreview.classList.add('hidden');
                imageImg.src = '';
            }
        });
    }
});
</script>
@endpush