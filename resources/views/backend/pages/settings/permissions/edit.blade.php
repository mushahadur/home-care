@extends('backend.layouts.app')

@section('title', 'Edit Permission - NurseNextDoor')

@section('content')
<!-- Main content area -->
<main class="flex-1 overflow-y-auto p-5 md:p-8 bg-gray-50 dark:bg-gray-950 transition-colors">

    <h3 class="text-sm font-bold pb-3">
        <a href="/dashboard" class="hover:underline text-blue-600">Dashboard</a>
        <span class="mx-2"> / </span>
        <span><a href="{{ route('permissions.index') }}" class="hover:underline text-blue-600">Permissions</a></span>
        <span class="mx-2"> / </span>
        <span class="text-gray-700 dark:text-gray-300">Edit Permission</span>
    </h3>

    <!-- Users / Customers Form Card -->
    <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl shadow-sm dark:shadow-none overflow-hidden">
        
        <div class="p-6 md:p-8">
            <h4 class="flex justify-between items-center text-lg font-semibold text-gray-800 dark:text-gray-200 mb-6 pb-2 border-b border-gray-200 dark:border-gray-700">
                <span><i class="fas fa-user-edit mr-2 text-emerald-500"></i> Edit Permission: {{ $groupName}}</span>
                <a href="{{ route('permissions.index') }}" 
                    class="bg-gray-100 hover:bg-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 text-gray-800 dark:text-gray-200 font-medium py-2 px-4 rounded-lg transition flex items-center gap-2 border border-gray-300 dark:border-gray-600 text-sm"
                >
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </h4>

            <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Group Name -->
                <div>
                    <label for="group_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                        Group Name
                    </label>

                    <input 
                        type="text" 
                        id="group_name"
                        name="group_name"
                        value="{{ old('group_name', $groupName) }}"
                        placeholder="Enter group name"
                        class="w-full px-4 py-2 rounded-lg border 
                        {{ $errors->has('group_name') 
                            ? 'border-red-500 focus:ring-red-500 focus:border-red-500' 
                            : 'border-gray-300 dark:border-gray-700 focus:ring-blue-500 focus:border-blue-500' 
                        }}
                        bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100
                        focus:outline-none focus:ring-2 transition duration-150"
                    >

                    @error('group_name')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Actions -->
                <div class="mt-4">
                    <label class="block text-sm font-medium mb-2">Select Actions</label>

                    @php
                        $actions = ['list','create','store','show','edit','update','destroy','manage'];
                    @endphp

                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                        @foreach ($actions as $action)
                            <label class="flex items-center gap-2">
                                <input 
                                    type="checkbox" 
                                    name="actions[]" 
                                    value="{{ $action }}"
                                    {{ in_array($action, old('actions', $selectedActions)) ? 'checked' : '' }}
                                >
                                <span>{{ ucfirst($action) }}</span>
                            </label>
                        @endforeach
                    </div>

                    @error('actions')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Submit -->
                <button class="mt-5 bg-[#2B4F6E] text-white px-6 py-2 rounded-lg">
                    Update Permission
                </button>
            </form>
        </div>
    </div>

    <!-- Optional: Quick Tips Card -->
    <div class="mt-6 bg-rose-50 dark:bg-rose-900/20 border border-rose-200 dark:border-rose-800 rounded-xl p-4">
        <div class="flex items-start gap-3">
            <i class="fas fa-lightbulb text-rose-600 dark:text-rose-400 mt-1"></i>
            <div>
                <h5 class="font-medium text-rose-800 dark:text-rose-300">Quick Tips</h5>
                <ul class="text-sm text-rose-700 dark:text-rose-400 space-y-1 mt-1 list-disc list-inside">
                    <li>Leave password blank to keep current password</li>
                    <li>Click the eye icon to show/hide password</li>
                    <li>You can assign multiple roles to a single user</li>
                    <li>Email addresses must be unique in the system</li>
                    <li>Set status to "Inactive" to disable user access</li>
                </ul>
            </div>
        </div>
    </div>

</main>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Password show/hide toggle function
        window.togglePasswordVisibility = function(inputId, iconId) {
            const passwordInput = document.getElementById(inputId);
            const toggleIcon = document.getElementById(iconId);
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        };

        // Optional: Password strength checker (only when password field is filled)
        const passwordInput = document.getElementById('password');
        const strengthBar = document.getElementById('strength-bar');
        const strengthText = document.getElementById('strength-text');
        const strengthContainer = document.getElementById('password-strength');

        if (passwordInput && strengthBar && strengthText && strengthContainer) {
            passwordInput.addEventListener('input', function() {
                const password = this.value;
                
                if (password.length > 0) {
                    strengthContainer.classList.remove('hidden');
                    
                    // Simple password strength calculation
                    let strength = 0;
                    
                    // Length check
                    if (password.length >= 8) strength += 25;
                    
                    // Contains number
                    if (/\d/.test(password)) strength += 25;
                    
                    // Contains lowercase
                    if (/[a-z]/.test(password)) strength += 25;
                    
                    // Contains uppercase or special char
                    if (/[A-Z]/.test(password) || /[^a-zA-Z0-9]/.test(password)) strength += 25;
                    
                    // Update strength bar
                    strengthBar.style.width = strength + '%';
                    
                    // Update colors and text
                    if (strength <= 25) {
                        strengthBar.className = 'h-full bg-red-500';
                        strengthText.textContent = 'Weak';
                        strengthText.className = 'text-red-500';
                    } else if (strength <= 50) {
                        strengthBar.className = 'h-full bg-yellow-500';
                        strengthText.textContent = 'Fair';
                        strengthText.className = 'text-yellow-500';
                    } else if (strength <= 75) {
                        strengthBar.className = 'h-full bg-blue-500';
                        strengthText.textContent = 'Good';
                        strengthText.className = 'text-blue-500';
                    } else {
                        strengthBar.className = 'h-full bg-green-500';
                        strengthText.textContent = 'Strong';
                        strengthText.className = 'text-green-500';
                    }
                } else {
                    strengthContainer.classList.add('hidden');
                    strengthBar.style.width = '0%';
                }
            });
        }

        // Mobile multi-select enhancement
        const roleSelect = document.getElementById('roles');
        if (roleSelect && window.innerWidth < 640) {
            roleSelect.addEventListener('touchstart', function(e) {
                this.size = Math.min(this.options.length, 6);
            });
        }
    });
</script>

<!-- Add this CSS for better password toggle button positioning -->
<style>
    /* Ensure the password toggle button doesn't interfere with input focus */
    input[type="password"]:focus + button,
    input[type="text"]:focus + button {
        color: #3b82f6;
    }
    
    /* Smooth transitions for password strength bar */
    #strength-bar {
        transition: width 0.3s ease, background-color 0.3s ease;
    }
    
    /* Make sure the eye icon is always clickable */
    .relative button {
        cursor: pointer;
        z-index: 10;
    }
</style>
@endpush