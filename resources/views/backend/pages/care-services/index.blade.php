@extends('backend.layouts.app')

@section('title', 'Care Services - NurseNextDoor')

@section('content')
<!-- Main content area -->
<main class="flex-1 overflow-y-auto p-5 md:p-8 bg-gray-50 dark:bg-gray-950 transition-colors">

    <!-- Breadcrumb -->
    <h3 class="text-sm font-bold pb-3">
        <a href="/dashboard" class="hover:underline text-blue-600">Dashboard</a>
        <span class="mx-2"> / </span>
        <span class="text-gray-700 dark:text-gray-300">Care Services</span>
    </h3>

    <!-- Care Services Table Card -->
    <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded shadow-sm dark:shadow-none overflow-hidden">
        
    <div class="p-5 md:p-6 border-b border-gray-200 dark:border-gray-800 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                    <i class="fas fa-hand-holding-heart mr-2 text-emerald-500"></i>Care Services
                </h2>

            <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4 w-full sm:w-auto">
                <!-- Search -->
                <div class="relative w-full sm:w-72 min-w-[220px]">
                    <input
                        id="table-search"
                        type="text"
                        placeholder="Search orders..."
                        class="w-full pl-10 pr-4 py-2 bg-gray-50 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition" />
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fa-solid fa-magnifying-glass text-gray-400"></i>
                    </div>
                </div>

                <!-- Create User Button -->
                <a href="{{ route('admin.care-services.create') }}" 
                class="bg-emerald-600 hover:bg-emerald-700 text-white font-medium py-2 px-4 rounded transition flex items-center gap-2 shadow-sm text-sm">
                    <i class="fas fa-plus"></i>
                    Add Care Service
                </a>
            </div>
        </div>


        <!-- Table Container with Horizontal Scroll for Mobile -->
        <div class="overflow-x-auto">
            <table class="w-full" id="care-services-table">
                <thead class="bg-gray-50 dark:bg-gray-800/50 border-b border-gray-200 dark:border-gray-700">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">SI</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">Service Name</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">Single Price</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">3-Days Price</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">7-Days Price</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">Image</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">Status</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">Created</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse ($care_services as $key => $care_service)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50 transition">
                        <!-- SI -->
                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                            {{ $loop->iteration }}
                        </td>
                        
                        <!-- Service Name -->
                        <td class="px-4 py-3 text-sm text-gray-900 dark:text-gray-100">
                            <span class="font-medium">{{ Str::limit($care_service->care_services_name, 50, '...') }}</span>
                        </td>
                        
                         <!-- Single Price -->
                        <!-- Price -->
                        <td class="px-4 py-3 whitespace-nowrap text-sm">
                            <span class="font-semibold text-emerald-600 dark:text-emerald-400">
                                ৳{{ number_format($care_service->single_services_price, 2) }}
                            </span>
                        </td>
                        <!-- Triple Price -->
                        <td class="px-4 py-3 whitespace-nowrap text-sm">
                            <span class="font-semibold text-emerald-600 dark:text-emerald-400">
                                ৳{{ number_format($care_service->triple_services_price, 2) }}
                            </span>
                        </td>
                        <!-- Seven Days Price -->
                        <td class="px-4 py-3 whitespace-nowrap text-sm">
                            <span class="font-semibold text-emerald-600 dark:text-emerald-400">
                                ৳{{ number_format($care_service->seven_services_price, 2) }}
                            </span>
                        </td>
                        
                        <!-- image -->
                        <td class="px-4 py-3 whitespace-nowrap">
                            @if($care_service->care_services_image)
                                <img src="{{ asset($care_service->care_services_image) }}" 
                                     alt="{{ $care_service->care_services_name }}"
                                     class="h-10 w-12 object-cover rounded-lg border border-gray-200 dark:border-gray-700">
                            @else
                                <span class="text-xs text-gray-400">No image</span>
                            @endif
                        </td>
                        
                        <!-- Status -->
                        <td class="px-4 py-3 whitespace-nowrap">
                            @if($care_service->care_services_status == '1')
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 dark:bg-green-900/40 text-green-800 dark:text-green-300">
                                    <i class="fas fa-circle text-[8px] mr-1.5 text-green-500"></i>
                                    Active
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-red-100 dark:bg-red-900/40 text-red-800 dark:text-red-300">
                                    <i class="fas fa-circle text-[8px] mr-1.5 text-red-500"></i>
                                    Inactive
                                </span>
                            @endif
                        </td>
                        
                        <!-- Created Date -->
                        <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                            {{ $care_service->created_at ? $care_service->created_at->format('M d, Y') : 'N/A' }}
                        </td>
                        
                        <!-- Actions -->
                        <td class="px-4 py-3 whitespace-nowrap">
                            <div class="flex items-center gap-2">
                                <!-- View Button -->
                                <button onclick="viewService({{ $care_service->id }})" 
                                    class="text-blue-500 hover:text-blue-600 dark:text-blue-400 dark:hover:text-blue-600 transition"
                                    title="View Service">
                                    <i class="fas fa-eye"></i>
                                </button>
                                
                                <!-- Edit Button -->
                                <a href="{{ route('admin.care-services.edit', $care_service->id) }}" 
                                   class="text-emerald-500 hover:text-emerald-600 dark:text-emerald-400 dark:hover:text-emerald-600 transition"
                                   title="Edit Service">
                                    <i class="fas fa-edit"></i>
                                </a>
                                
                                <!-- Delete Button -->
                                <button type="button"
                                        onclick="confirmDelete('{{ $care_service->id }}')"
                                        class="text-red-700 hover:text-red-600 dark:text-red-500 dark:hover:text-red-600 transition"
                                        title="Delete Service">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                            
                            <!-- Hidden Delete Form -->
                            <form id="delete-care-service-form-{{ $care_service->id }}"
                                  method="POST"
                                  action="{{ route('admin.care-services.destroy', $care_service->id) }}"
                                  style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="px-4 py-12 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <i class="fas fa-box-open text-5xl text-gray-400 dark:text-gray-600 mb-3"></i>
                                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">No Care Services Found</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Get started by creating your first care service.</p>
                                <a href="{{ route('admin.care-services.create') }}" 
                                   class="mt-4 inline-flex items-center gap-2 px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg transition text-sm">
                                    <i class="fas fa-plus"></i>
                                    Add Care Service
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Footer with Pagination -->
        @if($care_services->hasPages())
        <div class="px-6 py-4 flex flex-col sm:flex-row justify-between items-center gap-4 border-t border-gray-200 dark:border-gray-700">
            <!-- Showing Results Info -->
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Showing 
                <span class="font-medium text-gray-800 dark:text-gray-200">{{ $care_services->firstItem() }}</span>
                to 
                <span class="font-medium text-gray-800 dark:text-gray-200">{{ $care_services->lastItem() }}</span>
                of 
                <span class="font-medium text-gray-800 dark:text-gray-200">{{ $care_services->total() }}</span>
                results
            </p>
            
            <!-- Pagination Links -->
            <div class="flex items-center gap-2">
                <!-- Previous Page -->
                @if($care_services->onFirstPage())
                    <span class="px-3 py-2 rounded-lg text-sm font-medium text-gray-400 bg-gray-100 dark:bg-gray-800 dark:text-gray-600 cursor-not-allowed">
                        <i class="fas fa-chevron-left mr-1"></i> Previous
                    </span>
                @else
                    <a href="{{ $care_services->previousPageUrl() }}" 
                       class="px-3 py-2 rounded-lg text-sm font-medium text-gray-700 bg-white dark:bg-gray-800 dark:text-gray-300 border border-gray-300 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        <i class="fas fa-chevron-left mr-1"></i> Previous
                    </a>
                @endif
                
                <!-- Page Numbers (responsive - show limited on mobile) -->
                <div class="hidden sm:flex items-center gap-1">
                    @foreach($care_services->getUrlRange(max(1, $care_services->currentPage() - 2), min($care_services->lastPage(), $care_services->currentPage() + 2)) as $page => $url)
                        @if($page == $care_services->currentPage())
                            <span class="px-3 py-2 rounded-lg text-sm font-medium bg-emerald-600 text-white">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" 
                               class="px-3 py-2 rounded-lg text-sm font-medium text-gray-700 bg-white dark:bg-gray-800 dark:text-gray-300 border border-gray-300 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                </div>
                
                <!-- Mobile Page Indicator -->
                <div class="sm:hidden px-3 py-2 rounded-lg text-sm font-medium text-gray-700 bg-gray-100 dark:bg-gray-800 dark:text-gray-300">
                    Page {{ $care_services->currentPage() }} of {{ $care_services->lastPage() }}
                </div>
                
                <!-- Next Page -->
                @if($care_services->hasMorePages())
                    <a href="{{ $care_services->nextPageUrl() }}" 
                       class="px-3 py-2 rounded-lg text-sm font-medium text-gray-700 bg-white dark:bg-gray-800 dark:text-gray-300 border border-gray-300 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        Next <i class="fas fa-chevron-right ml-1"></i>
                    </a>
                @else
                    <span class="px-3 py-2 rounded-lg text-sm font-medium text-gray-400 bg-gray-100 dark:bg-gray-800 dark:text-gray-600 cursor-not-allowed">
                        Next <i class="fas fa-chevron-right ml-1"></i>
                    </span>
                @endif
            </div>
        </div>
        @endif
    </div>


    <!-- View Service Modal -->
<div id="viewServiceModal" class="fixed inset-0 z-50 hidden overflow-y-auto bg-black/50 backdrop-blur-sm transition-all duration-300">
    <div class="min-h-screen px-4 flex items-center justify-center py-8">
        <!-- Modal Content -->
        <div class="relative bg-white dark:bg-gray-900 rounded-2xl shadow-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto transform transition-all duration-300">
            
            <!-- Modal Header -->
            <div class="sticky top-0 bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-700 px-6 py-4 flex justify-between items-center rounded-t-2xl z-10">
                <div class="flex items-center gap-3">
                    <div class="p-2 bg-emerald-100 dark:bg-emerald-900/30 rounded-lg">
                        <i class="fas fa-hand-holding-heart text-emerald-600 dark:text-emerald-400"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100">Service Details</h3>
                </div>
                <button onclick="closeViewModal()" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition">
                    <i class="fas fa-times text-2xl"></i>
                </button>
            </div>
            
            <!-- Modal Body -->
            <div class="p-6" id="modalContent">
                <!-- Loading State -->
                <div class="text-center py-12" id="loadingState">
                    <i class="fas fa-spinner fa-spin text-4xl text-emerald-500"></i>
                    <p class="mt-3 text-gray-500 dark:text-gray-400">Loading service details...</p>
                </div>
                
                <!-- Content will be injected here via JavaScript -->
                <div id="modalContentBody" class="hidden"></div>
            </div>
            
            <!-- Modal Footer -->
            <div class="sticky bottom-0 bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-700 px-6 py-4 rounded-b-2xl">
                <div class="flex flex-col sm:flex-row gap-3 justify-end">
                    <button onclick="closeViewModal()" class="px-6 py-2 bg-gray-100 hover:bg-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg transition">
                        Close
                    </button>
                    <a href="#" id="editServiceLink" class="px-6 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg transition text-center">
                        <i class="fas fa-edit mr-2"></i> Edit Service
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


</main>
@endsection

@push('scripts')
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
<script src="{{ asset('assets/backend/js/sweetalert2@11.js')}}"></script>
<script>
    function confirmDelete(serviceId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.getElementById('delete-care-service-form-' + serviceId);
                if (form) {
                    form.submit();
                } else {
                    Swal.fire('Error!', 'Delete form not found.', 'error');
                }
            }
        });
    }

    
     // Table search functionality
    document.addEventListener('DOMContentLoaded', () => {
        const searchInput = document.getElementById('table-search');
        const table = document.getElementById('care-services-table');
        const rows = table.querySelectorAll('tbody tr');

        searchInput.addEventListener('input', (e) => {
            const query = e.target.value.toLowerCase().trim();

            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(query) ? '' : 'none';
            });
        });
    });


// Open View Modal with Service Details
function viewService(serviceId) {
    // Show modal
    const modal = document.getElementById('viewServiceModal');
    const loadingState = document.getElementById('loadingState');
    const modalContentBody = document.getElementById('modalContentBody');
    
    // Reset and show modal
    modal.classList.remove('hidden');
    loadingState.classList.remove('hidden');
    modalContentBody.classList.add('hidden');
    
    // Fetch service details via AJAX
    fetch(`/admin/care-services/${serviceId}`, {
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const service = data.data;
            
            // Build modal content
            modalContentBody.innerHTML = `
                <div class="space-y-6">
                    <!-- Service Image -->
                    ${service.care_services_image ? `
                    <div class="flex justify-center">
                        <div class="relative w-full max-w-md rounded-xl overflow-hidden border-2 border-gray-200 dark:border-gray-700 shadow-lg">
                            <img src="${service.care_services_image}" 
                                 alt="${service.care_services_name}"
                                 class="w-full h-auto object-cover">
                        </div>
                    </div>
                    ` : ''}
                    
                    <!-- Service Name -->
                    <div class="bg-gray-50 dark:bg-gray-800/50 rounded-xl p-4">
                        <label class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Service Name</label>
                        <p class="text-lg font-bold text-gray-900 dark:text-gray-100 mt-1">${escapeHtml(service.care_services_name)}</p>
                    </div>
                    
                    <!-- Pricing Section -->
                    <div class="bg-gradient-to-r from-emerald-50 to-blue-50 dark:from-emerald-900/20 dark:to-blue-900/20 rounded-xl p-4">
                        <h4 class="font-semibold text-gray-800 dark:text-gray-200 mb-3 flex items-center gap-2">
                            <i class="fas fa-tags text-emerald-500"></i> Pricing Plans
                        </h4>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                            <div class="bg-white dark:bg-gray-800 rounded-lg p-3 text-center border border-gray-200 dark:border-gray-700">
                                <div class="text-xs text-gray-500 dark:text-gray-400 mb-1">Single Visit</div>
                                <div class="text-xl font-bold text-rose-600 dark:text-rose-400">৳${formatPrice(service.single_services_price)}</div>
                            </div>
                            <div class="bg-white dark:bg-gray-800 rounded-lg p-3 text-center border border-gray-200 dark:border-gray-700">
                                <div class="text-xs text-gray-500 dark:text-gray-400 mb-1">3-Day Package</div>
                                <div class="text-xl font-bold text-blue-600 dark:text-blue-400">৳${formatPrice(service.triple_services_price)}</div>
                                <div class="text-xs text-green-600">~৳${Math.round(service.triple_services_price / 3)}/day</div>
                            </div>
                            <div class="bg-white dark:bg-gray-800 rounded-lg p-3 text-center border-2 border-emerald-300 dark:border-emerald-700">
                                <div class="text-xs text-gray-500 dark:text-gray-400 mb-1">7-Day Package</div>
                                <div class="text-xl font-bold text-emerald-600 dark:text-emerald-400">৳${formatPrice(service.seven_services_price)}</div>
                                <div class="text-xs text-emerald-600 font-semibold">Best Value ~৳${Math.round(service.seven_services_price / 7)}/day</div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Description -->
                    <div class="bg-gray-50 dark:bg-gray-800/50 rounded-xl p-4">
                        <label class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider flex items-center gap-2">
                            <i class="fas fa-align-left"></i> Description
                        </label>
                        <div class="mt-2 text-gray-700 dark:text-gray-300 leading-relaxed whitespace-pre-wrap">
                            ${escapeHtml(service.care_services_description) || 'No description provided.'}
                        </div>
                    </div>
                    
                    <!-- Additional Info -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="bg-gray-50 dark:bg-gray-800/50 rounded-xl p-3">
                            <label class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Status</label>
                            <div class="mt-1">
                                ${service.status === 'active' ? 
                                    '<span class="inline-flex items-center gap-1 px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400"><i class="fas fa-circle text-[6px]"></i> Active</span>' : 
                                    '<span class="inline-flex items-center gap-1 px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400"><i class="fas fa-circle text-[6px]"></i> Inactive</span>'
                                }
                            </div>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-800/50 rounded-xl p-3">
                            <label class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Service ID</label>
                            <p class="text-sm font-mono text-gray-700 dark:text-gray-300 mt-1">#${service.id}</p>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-800/50 rounded-xl p-3">
                            <label class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Created At</label>
                            <p class="text-sm text-gray-700 dark:text-gray-300 mt-1">${new Date(service.created_at).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit' })}</p>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-800/50 rounded-xl p-3">
                            <label class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Last Updated</label>
                            <p class="text-sm text-gray-700 dark:text-gray-300 mt-1">${new Date(service.updated_at).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit' })}</p>
                        </div>
                    </div>
                </div>
            `;
            
            // Update edit button link
            document.getElementById('editServiceLink').href = `/admin/care-services/${service.id}/edit`;
            
            // Hide loading, show content
            loadingState.classList.add('hidden');
            modalContentBody.classList.remove('hidden');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        loadingState.innerHTML = `
            <i class="fas fa-exclamation-triangle text-4xl text-red-500"></i>
            <p class="mt-3 text-gray-500 dark:text-gray-400">Failed to load service details.</p>
            <button onclick="viewService('${serviceId}')" class="mt-4 px-4 py-2 bg-emerald-600 text-white rounded-lg">Retry</button>
        `;
    });
}

// Close Modal Function
function closeViewModal() {
    const modal = document.getElementById('viewServiceModal');
    modal.classList.add('hidden');
    
    // Reset content
    document.getElementById('loadingState').innerHTML = `
        <i class="fas fa-spinner fa-spin text-4xl text-emerald-500"></i>
        <p class="mt-3 text-gray-500 dark:text-gray-400">Loading service details...</p>
    `;
    document.getElementById('modalContentBody').innerHTML = '';
}

// Helper Functions
function escapeHtml(text) {
    if (!text) return '';
    const div = document.createElement('div');
    div.textContent = text;
    return div.innerHTML;
}

function formatPrice(price) {
    return parseFloat(price).toLocaleString('en-IN', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });
}

// Close modal on escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeViewModal();
    }
});

// Close modal when clicking outside
document.getElementById('viewServiceModal')?.addEventListener('click', function(e) {
    if (e.target === this) {
        closeViewModal();
    }
});

</script>
@endpush