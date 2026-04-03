@extends('backend.layouts.app')

@section('title', 'Edit Role - NurseNextDoor')

@section('content')
<!-- Main content area -->
<main class="flex-1 overflow-y-auto p-5 md:p-8 bg-gray-50 dark:bg-gray-950 transition-colors">

    <!-- Breadcrumb -->
    <h3 class="text-sm font-bold pb-3">
        <a href="/dashboard" class="hover:underline text-blue-600">Dashboard</a>
        <span class="mx-2"> / </span>
        <span><a href="{{ route('roles.index') }}" class="hover:underline text-blue-600">Roles</a></span>
        <span class="mx-2"> / </span>
        <span class="text-gray-700 dark:text-gray-300">Edit Role: {{ $role->name }}</span>
    </h3>

    <!-- Role Form Card -->
    <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl shadow-sm dark:shadow-none overflow-hidden">
        
        <div class="p-6 md:p-8">
            <h4 class="flex justify-between items-center text-lg font-semibold text-gray-800 dark:text-gray-200 mb-6 pb-2 border-b border-gray-200 dark:border-gray-700">
                <span><i class="fas fa-edit mr-2 text-emerald-500"></i> Edit Role: {{ $role->name }}</span>
                <a href="{{ route('roles.index') }}" 
                    class="bg-gray-100 hover:bg-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 text-gray-800 dark:text-gray-200 font-medium py-2 px-4 rounded-lg transition flex items-center gap-2 border border-gray-300 dark:border-gray-600 text-sm"
                >
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </h4>

            <form action="{{ route('roles.update', $role->id) }}" method="POST" class="space-y-6" autocomplete="off">
                @csrf
                @method('PUT')

                <!-- Role Name Field -->
                <div class="space-y-2">
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        <i class="fas fa-tag mr-2 text-emerald-500"></i>Role Name
                    </label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        value="{{ old('name', $role->name) }}" 
                        placeholder="Enter role name (e.g., Admin, Editor, Viewer)"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none transition @error('name') border-red-500 dark:border-red-500 @enderror"
                        required
                        autofocus
                    >
                    @error('name')
                        <span class="text-red-600 dark:text-red-400 text-sm flex items-center gap-1 mt-1">
                            <i class="fas fa-exclamation-circle"></i> {{ $message }}
                        </span>
                    @enderror
                </div>

                <!-- Permissions Field -->
                <div class="space-y-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        <i class="fas fa-key mr-2 text-emerald-500"></i>Permissions
                    </label>
                    
                    <div class="space-y-6">
                        @foreach($groupedPermissions as $group => $permissions)
                        <!-- Permission Group Card -->
                        <div class="bg-gray-50 dark:bg-gray-800/50 rounded-xl border border-gray-200 dark:border-gray-700 overflow-hidden">
                            <!-- Group Header -->
                            <div class="px-4 py-3 bg-gray-100 dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3">
                                <h3 class="font-semibold text-gray-800 dark:text-gray-200">
                                    <i class="fas fa-folder-open mr-2 text-emerald-500"></i>
                                    {{ ucwords(str_replace('-', ' ', $group)) }}
                                </h3>
                                <label class="flex items-center gap-2 text-sm font-medium cursor-pointer bg-white dark:bg-gray-700 px-3 py-1.5 rounded-lg border border-gray-300 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-600 transition">
                                    <input type="checkbox" class="group-checkbox h-4 w-4 text-emerald-600 border-gray-300 rounded focus:ring-2 focus:ring-emerald-500" data-group="{{ $group }}">
                                    <span class="text-gray-700 dark:text-gray-300">Select All</span>
                                </label>
                            </div>
                            
                            <!-- Permissions List -->
                            <div class="p-4">
                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3">
                                    @foreach($permissions as $permission)
                                    <label class="flex items-center gap-2 text-sm font-medium text-gray-700 dark:text-gray-300 p-2 rounded-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 transition cursor-pointer">
                                        <input 
                                            type="checkbox"
                                            name="permissions[]"
                                            value="{{ $permission->id }}"
                                            class="child-checkbox h-4 w-4 text-emerald-600 border-gray-300 rounded focus:ring-2 focus:ring-emerald-500"
                                            data-group="{{ $group }}"
                                            {{ in_array($permission->id, old('permissions', $rolePermissions)) ? 'checked' : '' }}
                                        >
                                        <span class="truncate">{{ ucwords(str_replace('-', ' ', $permission->name)) }}</span>
                                    </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                    @error('permissions')
                        <span class="text-red-600 dark:text-red-400 text-sm flex items-center gap-1 mt-1">
                            <i class="fas fa-exclamation-circle"></i> {{ $message }}
                        </span>
                    @enderror
                    
                    @error('permissions.*')
                        <span class="text-red-600 dark:text-red-400 text-sm flex items-center gap-1 mt-1">
                            <i class="fas fa-exclamation-circle"></i> {{ $message }}
                        </span>
                    @enderror
                </div>

                <!-- Form Actions -->
                <div class="flex flex-col sm:flex-row gap-3 pt-4 border-t border-gray-200 dark:border-gray-700">
                    <button 
                        type="submit" 
                        class="flex-1 bg-emerald-600 hover:bg-emerald-700 text-white font-medium py-2.5 px-6 rounded-lg transition flex items-center justify-center gap-2 shadow-sm"
                    >
                        <i class="fas fa-save"></i>
                        Update Role
                    </button>
                    
                    <a 
                        href="{{ route('roles.index') }}" 
                        class="flex-1 bg-gray-100 hover:bg-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 text-gray-800 dark:text-gray-200 font-medium py-2.5 px-6 rounded-lg transition flex items-center justify-center gap-2 border border-gray-300 dark:border-gray-600"
                    >
                        <i class="fas fa-times"></i>
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Quick Tips Card -->
    <div class="mt-6 bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-xl p-4">
        <div class="flex items-start gap-3">
            <i class="fas fa-lightbulb text-blue-600 dark:text-blue-400 mt-1"></i>
            <div>
                <h5 class="font-medium text-blue-800 dark:text-blue-300">Quick Tips</h5>
                <ul class="text-sm text-blue-700 dark:text-blue-400 space-y-1 mt-1 list-disc list-inside">
                    <li>Role names should be unique and descriptive (e.g., Admin, Editor, Viewer)</li>
                    <li>Use "Select All" to quickly assign all permissions in a module</li>
                    <li>You can select individual permissions by clicking on each checkbox</li>
                    <li>Permissions control what actions users with this role can perform</li>
                    <li>Changes will take effect immediately for users with this role</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Additional Info Card (Optional) -->
    <div class="mt-4 bg-gray-50 dark:bg-gray-800/50 border border-gray-200 dark:border-gray-700 rounded-xl p-4">
        <div class="flex items-start gap-3">
            <i class="fas fa-info-circle text-gray-500 dark:text-gray-400 mt-1"></i>
            <div>
                <h5 class="font-medium text-gray-700 dark:text-gray-300">Role Information</h5>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                    Role ID: <span class="font-mono">{{ $role->id }}</span> | 
                    Created: {{ $role->created_at ? $role->created_at->format('M d, Y') : 'N/A' }} | 
                    Last Updated: {{ $role->updated_at ? $role->updated_at->format('M d, Y') : 'N/A' }}
                </p>
                @if($role->users && $role->users->count() > 0)
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                        <i class="fas fa-users mr-1"></i> 
                        This role is currently assigned to {{ $role->users->count() }} user(s).
                    </p>
                @endif
            </div>
        </div>
    </div>

</main>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Group select all functionality
        const groupCheckboxes = document.querySelectorAll('.group-checkbox');
        const childCheckboxes = document.querySelectorAll('.child-checkbox');
        
        // Handle group checkbox click
        groupCheckboxes.forEach(function(groupCheckbox) {
            groupCheckbox.addEventListener('change', function() {
                const group = this.dataset.group;
                const children = document.querySelectorAll('.child-checkbox[data-group="' + group + '"]');
                children.forEach(function(child) {
                    child.checked = groupCheckbox.checked;
                });
            });
        });
        
        // Handle individual checkbox clicks
        childCheckboxes.forEach(function(child) {
            child.addEventListener('change', function() {
                const group = this.dataset.group;
                const children = document.querySelectorAll('.child-checkbox[data-group="' + group + '"]');
                const groupCheckbox = document.querySelector('.group-checkbox[data-group="' + group + '"]');
                
                // Check if all children are checked
                const allChecked = Array.from(children).every(c => c.checked);
                groupCheckbox.checked = allChecked;
            });
        });
        
        // Initialize: check group checkboxes if all children are pre-checked
        const groups = [...new Set(Array.from(childCheckboxes).map(cb => cb.dataset.group))];
        groups.forEach(function(group) {
            const children = document.querySelectorAll('.child-checkbox[data-group="' + group + '"]');
            const groupCheckbox = document.querySelector('.group-checkbox[data-group="' + group + '"]');
            if (groupCheckbox && children.length > 0) {
                const allChecked = Array.from(children).every(c => c.checked);
                groupCheckbox.checked = allChecked;
            }
        });
        
        // Optional: Add confirmation before leaving if changes are made
        let formChanged = false;
        const form = document.querySelector('form');
        const inputs = form.querySelectorAll('input, select, textarea');
        
        inputs.forEach(input => {
            input.addEventListener('change', function() {
                formChanged = true;
            });
        });
        
        // Warn before leaving if changes are unsaved
        window.addEventListener('beforeunload', function(e) {
            if (formChanged) {
                e.preventDefault();
                e.returnValue = 'You have unsaved changes. Are you sure you want to leave?';
                return e.returnValue;
            }
        });
        
        // Reset formChanged flag on form submit
        form.addEventListener('submit', function() {
            formChanged = false;
        });
        
        // Optional: Add keyboard navigation support
        const roleNameInput = document.getElementById('name');
        if (roleNameInput) {
            roleNameInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    const submitButton = document.querySelector('button[type="submit"]');
                    if (submitButton) submitButton.click();
                }
            });
        }
    });
</script>
@endpush