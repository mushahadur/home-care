@extends('backend.layouts.app')

@section('title', 'Edit User - NurseNextDoor')

@section('content')
<!-- Main content area -->
<main class="flex-1 overflow-y-auto p-5 md:p-8 bg-gray-50 dark:bg-gray-950 transition-colors">

    <h3 class="text-sm font-bold pb-3">
        <a href="/admin/dashboard" class="hover:underline text-blue-600">Dashboard</a>
        <span class="mx-2"> / </span>
        <span><a href="{{ route('admin.users.index') }}" class="hover:underline text-blue-600">Users</a></span>
        <span class="mx-2"> / </span>
        <span class="text-gray-700 dark:text-gray-300">Edit User</span>
    </h3>

    <!-- Users / Customers Form Card -->
    <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded shadow-sm dark:shadow-none overflow-hidden">

        <div class="p-6 md:p-8">
            <h4 class="flex justify-between items-center text-lg font-semibold text-gray-800 dark:text-gray-200 mb-6 pb-2 border-b border-gray-200 dark:border-gray-700">
                <span><i class="fas fa-user-edit mr-2 text-emerald-500"></i> Edit User: {{ $user->name }}</span>
                <a href="{{ route('admin.users.index') }}"
                    class="bg-gray-100 hover:bg-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 text-gray-800 dark:text-gray-200 font-medium py-2 px-4 rounded transition flex items-center gap-2 border border-gray-300 dark:border-gray-600 text-sm">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </h4>

            <form method="POST" action="{{ route('admin.users.update', $user->id) }}" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Name Field -->
                <div class="space-y-2">
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        <i class="fas fa-user mr-2 text-emerald-500"></i>Full Name
                    </label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        value="{{ old('name', $user->name) }}"
                        placeholder="Enter full name"
                        class="w-full px-4 py-2 rounded border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none transition @error('name') border-red-500 dark:border-red-500 @enderror"
                        required
                        autofocus>
                    @error('name')
                    <span class="text-red-600 dark:text-red-400 text-sm flex items-center gap-1 mt-1">
                        <i class="fas fa-exclamation-circle"></i> {{ $message }}
                    </span>
                    @enderror
                </div>

                <!-- Email Field -->
                <div class="space-y-2">
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        <i class="fas fa-envelope mr-2 text-emerald-500"></i>Email Address
                    </label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        value="{{ old('email', $user->email) }}"
                        placeholder="user@example.com"
                        class="w-full px-4 py-2 rounded border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none transition @error('email') border-red-500 dark:border-red-500 @enderror"
                        required>
                    @error('email')
                    <span class="text-red-600 dark:text-red-400 text-sm flex items-center gap-1 mt-1">
                        <i class="fas fa-exclamation-circle"></i> {{ $message }}
                    </span>
                    @enderror
                </div>

                <!-- Password Field with Show/Hide (Optional - leave blank to keep current password) -->
                <div class="space-y-2">
                    <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        <i class="fas fa-lock mr-2 text-emerald-500"></i>Password
                        <span class="text-xs text-gray-500 dark:text-gray-400 font-normal ml-2">(Leave blank to keep current password)</span>
                    </label>
                    <div class="relative">
                        <input
                            type="password"
                            name="password"
                            id="password"
                            placeholder="Enter new password (optional)"
                            class="w-full px-4 py-2 rounded border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none transition @error('password') border-red-500 dark:border-red-500 @enderror">
                        <button
                            type="button"
                            onclick="togglePasswordVisibility('password', 'password-toggle-icon')"
                            class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 focus:outline-none"
                            tabindex="-1">
                            <i id="password-toggle-icon" class="fas fa-eye"></i>
                        </button>
                    </div>
                    @error('password')
                    <span class="text-red-600 dark:text-red-400 text-sm flex items-center gap-1 mt-1">
                        <i class="fas fa-exclamation-circle"></i> {{ $message }}
                    </span>
                    @enderror
                </div>

                <!-- Confirm Password Field with Show/Hide -->
                <div class="space-y-2">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        <i class="fas fa-check-circle mr-2 text-emerald-500"></i>Confirm Password
                    </label>
                    <div class="relative">
                        <input
                            type="password"
                            name="password_confirmation"
                            id="password_confirmation"
                            placeholder="Confirm new password"
                            class="w-full px-4 py-2 rounded border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none transition">
                        <button
                            type="button"
                            onclick="togglePasswordVisibility('password_confirmation', 'confirm-password-toggle-icon')"
                            class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 focus:outline-none"
                            tabindex="-1">
                            <i id="confirm-password-toggle-icon" class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <!-- Password Strength Indicator (Optional) -->
                <div id="password-strength" class="text-xs hidden space-y-1">
                    <div class="flex items-center gap-2">
                        <div class="h-1 flex-1 bg-gray-200 dark:bg-gray-700 rounded-full overflow-hidden">
                            <div id="strength-bar" class="h-full transition-all duration-300" style="width: 0%"></div>
                        </div>
                        <span id="strength-text" class="text-gray-600 dark:text-gray-400 min-w-[60px]">Weak</span>
                    </div>
                </div>

                <!-- Roles Field (Multi-select with enhanced styling) -->
                <div class="space-y-2">
                    <label for="roles" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        <i class="fas fa-tags mr-2 text-emerald-500"></i>User Roles
                    </label>

                    <!-- Mobile-friendly multi-select with better UX -->
                    <div class="relative">
                        <select
                            name="roles[]"
                            id="roles"
                            multiple="multiple"
                            class="w-full px-4 py-2 rounded border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none transition min-h-[120px] @error('roles') border-red-500 dark:border-red-500 @enderror"
                            size="4">
                            @foreach ($roles as $value => $label)
                            <option value="{{ $value }}" {{ in_array($value, old('roles', $user->roles->pluck('id')->toArray())) ? 'selected' : '' }} class="py-2">
                                {{ $label }}
                            </option>
                            @endforeach
                        </select>

                        <!-- Helper text for multi-select -->
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-2 flex items-center gap-1">
                            <i class="fas fa-info-circle"></i> Hold Ctrl (Windows) or Cmd (Mac) to select multiple roles
                        </p>
                    </div>

                    @error('roles')
                    <span class="text-red-600 dark:text-red-400 text-sm flex items-center gap-1 mt-1">
                        <i class="fas fa-exclamation-circle"></i> {{ $message }}
                    </span>
                    @enderror

                    <!-- Individual role errors (if any) -->
                    @error('roles.*')
                    <span class="text-red-600 dark:text-red-400 text-sm flex items-center gap-1 mt-1">
                        <i class="fas fa-exclamation-circle"></i> {{ $message }}
                    </span>
                    @enderror
                </div>

                <!-- Status Field (Optional - if you want to enable/disable user) -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        <i class="fas fa-toggle-on mr-2 text-emerald-500"></i>Status
                    </label>
                    <div class="flex items-center gap-4">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="status" value="active" {{ old('status', $user->status ?? 'active') == 'active' ? 'checked' : '' }} class="text-emerald-500 focus:ring-emerald-500">
                            <span class="text-sm text-gray-700 dark:text-gray-300">Active</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="status" value="inactive" {{ old('status', $user->status ?? '') == 'inactive' ? 'checked' : '' }} class="text-red-500 focus:ring-red-500">
                            <span class="text-sm text-gray-700 dark:text-gray-300">Inactive</span>
                        </label>
                    </div>
                    @error('status')
                    <span class="text-red-600 dark:text-red-400 text-sm flex items-center gap-1 mt-1">
                        <i class="fas fa-exclamation-circle"></i> {{ $message }}
                    </span>
                    @enderror
                </div>

                <!-- Form Actions (Responsive buttons) -->
                <div class="flex flex-col sm:flex-row gap-3 pt-4 border-t border-gray-200 dark:border-gray-700">
                    <button
                        type="submit"
                        class="flex-1 bg-emerald-600 hover:bg-emerald-700 text-white font-medium py-2 px-6 rounded transition flex items-center justify-center gap-2 shadow-sm">
                        <i class="fas fa-save"></i>
                        Update User
                    </button>

                    <a
                        href="{{ route('admin.users.index') }}"
                        class="flex-1 bg-gray-100 hover:bg-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 text-gray-800 dark:text-gray-200 font-medium py-2 px-6 rounded transition flex items-center justify-center gap-2 border border-gray-300 dark:border-gray-600">
                        <i class="fas fa-times"></i>
                        Cancel
                    </a>
                </div>
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
    input[type="password"]:focus+button,
    input[type="text"]:focus+button {
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