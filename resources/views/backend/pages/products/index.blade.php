@extends('backend.layouts.app')

@section('title', 'Products')

@section('content')
<!-- Content -->
<div class="w-full lg:ps-64">
    <div class="sm:p-6 space-y-4 sm:space-y-6">
        <!-- Table Start -->
        <div class="flex flex-col">
            <div class="overflow-x-auto">
                <div class="min-w-full">
                    <div class="bg-white dark:bg-neutral-800 border border-gray-200 dark:border-neutral-700 rounded-xl shadow-sm">
                        <!-- Header -->
                        <div class="px-6 py-4 flex justify-between items-center border-b border-gray-200 dark:border-neutral-700">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">Product Table</h2>
                                <p class="text-sm text-gray-600 dark:text-neutral-400">Manage products</p>
                            </div>
                            <!-- Trigger button -->
                            <div class="flex gap-x-2">
                                <button id="openProductModal" class="py-2 px-3 text-sm font-medium rounded-lg bg-blue-600 text-white hover:bg-blue-700 flex items-center gap-x-2">
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                    </svg>
                                    Add Product
                                </button>
                            </div>
                        </div>
                        <!-- End Header -->
                        <!-- Table -->
                        <table class="min-w-full border border-gray-300 dark:border-neutral-600">
                            <thead class="bg-gray-50 dark:bg-neutral-900">
                                <tr>
                                    <th class="border-r border-gray-300 dark:border-neutral-600 px-6 py-3 text-left text-sm font-semibold text-gray-800 uppercase dark:text-neutral-200">SI</th>
                                    <th class="border-r border-gray-300 dark:border-neutral-600 px-6 py-3 text-left text-sm font-semibold text-gray-800 uppercase dark:text-neutral-200">Name</th>
                                    <th class="border-r border-gray-300 dark:border-neutral-600 px-6 py-3 text-left text-xs font-semibold text-gray-800 uppercase dark:text-neutral-200">Price</th>
                                    <th class="border-r border-gray-300 dark:border-neutral-600 px-6 py-3 text-left text-xs font-semibold text-gray-800 uppercase dark:text-neutral-200">Description</th>
                                    <th class="border-r border-gray-300 dark:border-neutral-600 px-6 py-3 text-left text-xs font-semibold text-gray-800 uppercase dark:text-neutral-200">Image</th>
                                    <th class="border-r border-gray-300 dark:border-neutral-600 px-6 py-3 text-left text-xs font-semibold text-gray-800 uppercase dark:text-neutral-200">Status</th>
                                    <th class="border-r border-gray-300 dark:border-neutral-600 px-6 py-3 text-left text-xs font-semibold text-gray-800 uppercase dark:text-neutral-200">Created</th>
                                    <th class="border-r border-gray-300 dark:border-neutral-600 px-6 py-3 text-left text-xs font-semibold text-gray-800 uppercase dark:text-neutral-200">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                @if(empty($products))
                                <tr>
                                    <td class="border-r border-gray-300 dark:border-neutral-600 px-6 py-2" colspan="6">
                                        No Data Available
                                    </td>
                                </tr>
                                @else
                                @foreach ($products as $key => $product)
                                <tr>
                                    <td class="border-r border-gray-300 dark:border-neutral-600 px-6 py-2">
                                        <div class="flex items-center gap-x-3">
                                            <div>
                                                <span class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">{{ $loop->iteration }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="border-r border-gray-300 dark:border-neutral-600 px-6 py-2">
                                        <div class="flex items-center gap-x-3">
                                            <div>
                                                <span class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">{{ $product->name }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="border-r border-gray-300 dark:border-neutral-600 px-6 py-2">
                                        <div class="flex items-center gap-x-3">
                                            <div>
                                                <span class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">{{ $product->price }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="border-r border-gray-300 dark:border-neutral-600 px-6 py-2">
                                        <div class="flex items-center gap-x-3">
                                            <div>
                                                <span class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">{{ $product->description }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="border-r border-gray-300 dark:border-neutral-600 px-6 py-2">
                                        <div class="flex items-center gap-x-3">
                                            <div>
                                                <span class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">
                                                    @if($product->image)
                                                    <img src="{{ asset( $product->image) }}" alt="{{ $product->name }}"
                                                        height="40" width="50" class="rounded">
                                                    @else
                                                    <span class="text-gray-400 text-sm">No image</span>
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="border-r border-gray-300 dark:border-neutral-600 px-6 py-2">
                                        <span class="inline-flex items-center px-2 py-1 text-xs font-medium bg-blue-100 text-blue-800 rounded-full dark:bg-blue-500/10 dark:text-blue-500">
                                            <svg class="w-2.5 h-2.5 mr-1" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                            </svg>
                                            <span class="">Active</span>
                                        </span>
                                    </td>
                                    <td class="border-r border-gray-300 dark:border-neutral-600 px-6 py-2 text-sm text-gray-500 dark:text-neutral-500">
                                        28 Dec, 12:12
                                    </td>
                                    <td class="px-6 py-2 w-5 text-right flex justify-between">
                                        <a href="#" title="View Button" class="text-sm text-green-600 hover:underline dark:text-green-500">
                                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>
                                        <!-- <a href="#" title="Edit Button" class="text-sm px-2 text-blue-600 hover:underline dark:text-blue-500">
                                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h11a2 2 0 0 0 2-2v-5M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                            </svg>
                                        </a> -->
                                        <button type="button"
                                            onclick="openEditModal('{{ $product->id }}')"
                                            class="text-blue-600 hover:text-blue-900">
                                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h11a2 2 0 0 0 2-2v-5M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                            </svg>
                                        </button>

                                        <!-- Hidden Update Form -->
                                        <form id="update-product-form-{{ $product->id }}"
                                            method="POST"
                                            action="{{ route('products.update', $product->id) }}"
                                            style="display: none;"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <!-- এখানে name, price ইত্যাদি ইনপুট রাখা দরকার নয় কারণ AJAX পূরণ করবে dynamically -->
                                        </form>
                                        <!-- <button type="button" onclick="openDeleteModal('{{ $product->id }}')" class="text-red-600 hover:text-red-900">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m-2-10h4" />
                                            </svg>
                                        </button> -->
                                        <button type="button"
                                            onclick="confirmDelete('{{ $product->id }}')"
                                            class="text-red-600 hover:text-red-900">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m-2-10h4" />
                                            </svg>
                                        </button>

                                        <!-- Hidden Form -->
                                        <form id="delete-product-form-{{ $product->id }}"
                                            method="POST"
                                            action="{{ route('products.destroy', $product->id) }}"
                                            style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                    </div>
                    <!-- <form id="delete-product-form-{{ $product->id }}" action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form> -->
                    </td>
                    </tr>
                    @endforeach
                    @endif
                    </tbody>
                    </table>
                    <!-- End Table -->
                    <!-- Footer -->
                    @if ($products->hasPages())
                    <div class="px-6 py-4 flex justify-between items-center border-t border-gray-200 dark:border-neutral-700">
                        <!-- Showing Count -->
                        <p class="text-sm text-gray-600 dark:text-neutral-400">
                            <span class="font-semibold text-gray-800 dark:text-neutral-200">{{ $products->total() }}</span> results
                        </p>
                        <!-- Pagination Controls -->
                        <div class="flex gap-x-2">
                            <!-- Previous Page Link -->
                            @if ($products->onFirstPage())
                            <span class="py-2 px-3 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-400 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-500 flex items-center gap-x-2 cursor-not-allowed">
                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 18L9 12l6-6" />
                                </svg>
                                Prev
                            </span>
                            @else
                            <a href="{{ $products->previousPageUrl() }}" class="py-2 px-3 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 hover:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 flex items-center gap-x-2">
                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 18L9 12l6-6" />
                                </svg>
                                Prev
                            </a>
                            @endif
                            <!-- Next Page Link -->
                            @if ($products->hasMorePages())
                            <a href="{{ $products->nextPageUrl() }}" class="py-2 px-3 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 hover:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-700 flex items-center gap-x-2">
                                Next
                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 18l6-6-6-6" />
                                </svg>
                            </a>
                            @else
                            <span class="py-2 px-3 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-400 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-500 flex items-center gap-x-2 cursor-not-allowed">
                                Next
                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 18l6-6-6-6" />
                                </svg>
                            </span>
                            @endif
                        </div>
                    </div>
                    @endif
                    <!-- End Footer -->
                </div>
            </div>
        </div>
    </div>
    <!-- Table End -->
    <!-- Modal -->
    <!-- Reusing productModal but with hidden inputs or dynamic filling -->
    <div id="productModal"
        class="fixed inset-0 z-50 flex items-center justify-center bg-opacity-50 z-50 hidden bg-black/50 backdrop-blur-sm transition-all duration-300 ease-out">
        <div class="w-full max-w-md mx-4 bg-white dark:bg-neutral-800 rounded-xl shadow-lg overflow-hidden">
            <div class="flex justify-between items-center px-6 py-4 border-b border-gray-200 dark:border-neutral-700">
                <h2 id="modalTitle" class="text-lg font-semibold text-gray-900 dark:text-white">Add / Edit Product</h2>
                <button id="closeProductModal"
                    class="text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-red-500 text-3xl leading-none">&times;</button>
            </div>
            <div class="p-6">
                <form id="productForm" class="space-y-4" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" id="formMethod" value="POST">
                    <input type="hidden" name="product_id" id="productId" value="">
                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-neutral-300">Name</label>
                        <input type="text" id="name" name="name"
                            class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 dark:bg-neutral-800 dark:border-neutral-600 dark:text-neutral-200 focus:ring focus:ring-blue-500 dark:focus:ring-blue-400"
                            placeholder="Enter product name">
                    </div>
                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-neutral-300">Description</label>
                        <input type="text" id="description" name="description"
                            class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 dark:bg-neutral-800 dark:border-neutral-600 dark:text-neutral-200 focus:ring focus:ring-blue-500 dark:focus:ring-blue-400"
                            placeholder="Enter product description">
                    </div>
                    <!-- Price -->
                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700 dark:text-neutral-300">Price</label>
                        <input type="text" id="price" name="price"
                            class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 dark:bg-neutral-800 dark:border-neutral-600 dark:text-neutral-200 focus:ring focus:ring-blue-500 dark:focus:ring-blue-400"
                            placeholder="Enter product price">
                    </div>

                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700 dark:text-neutral-300">Image</label>
                        <input type="file"
                            id="image"
                            name="image"
                            accept="image/*"
                            class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2 dark:bg-neutral-800 dark:border-neutral-600 dark:text-neutral-200">
                    </div>

                    <!-- Preview image -->
                    <div class="mt-2">
                        <img id="imagePreview" src="" alt="Image Preview"
                            class="w-100% h-32 max-w-xs rounded border border-gray-300 hidden">
                    </div>
            </div>
            <div class="w-full p-6">
                <button type="submit"
                    class="w-full mt-4 bg-blue-600 text-white font-medium py-2 rounded-md hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-400">
                    Save Product
                </button>
            </div>
            </form>
        </div>
    </div>
</div>


<!-- Delete Confirmation Modal -->
<div id="deleteConfirmModal"
    class="fixed inset-0 bg-black bg-opacity-50 z-50 flex hidden items-center justify-center bg-black/50 backdrop-blur-sm transition-all duration-300 ease-out">
    <div
        class="w-full max-w-md rounded-xl border border-gray-200 bg-white p-4 shadow-xl dark:border-neutral-700 dark:bg-neutral-800  transition-all duration-300 ease-out ">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Delete User</h2>
            <button onclick="closeDeleteModal()"
                class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-red-500 text-3xl leading-none">
                &times;
            </button>
        </div>
        <div class="p-2 md:p-3">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Are you sure you want to delete this user?</h2>
            <div class="flex justify-end gap-3">
                <button onclick="closeDeleteModal()"
                    class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300 dark:bg-neutral-700 dark:text-white dark:hover:bg-neutral-600">
                    Cancel
                </button>
                <button onclick="submitDeleteForm()" id="confirmDeleteBtn"
                    class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                    Confirm
                </button>
            </div>
        </div>
    </div>
</div>
</div>

<!-- End Content -->

@endsection


@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(productId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // User Confiremed
                const form = document.getElementById('delete-product-form-' + productId);
                if (form) {
                    form.submit();
                } else {
                    console.error('Delete form not found for product:', productId);
                }
            }
        });
    }


    // Store/Update products
    document.addEventListener('DOMContentLoaded', () => {
        const openModalBtn = document.getElementById('openProductModal');
        const closeModalBtn = document.getElementById('closeProductModal');
        const modal = document.getElementById('productModal');

        const productForm = document.getElementById('productForm');
        const imageInput = document.getElementById('image');
        const imagePreview = document.getElementById('imagePreview');

        openModalBtn.addEventListener('click', () => {
            resetForm();
            document.getElementById('modalTitle').innerText = 'Add Product';
            document.getElementById('formMethod').value = 'POST';
            modal.classList.remove('hidden');
        });

        closeModalBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
        });

        imageInput.addEventListener('change', (event) => {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    imagePreview.src = e.target.result;
                    imagePreview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                imagePreview.src = '';
                imagePreview.classList.add('hidden');
            }
        });

        productForm.addEventListener('submit', async (e) => {
            e.preventDefault();

            const productId = document.getElementById('productId').value;
            const method = document.getElementById('formMethod').value;
            const url = productId ? `{{ url('products') }}/${productId}` : `{{ route('products.store') }}`;

            const formData = new FormData(productForm);
            if (method === 'PUT') {
                formData.append('_method', 'PUT');
            }

            try {
                const res = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    body: formData
                });
                if (!res.ok) throw await res.json();
                const data = await res.json();

                Swal.fire('Success', data.message, 'success').then(() => {
                    modal.classList.add('hidden');
                    window.location.reload();
                });
            } catch (error) {
                const msg = error.errors ? Object.values(error.errors).flat().join('<br>') : 'Something went wrong';
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    html: msg
                });
            }
        });

        window.openEditModal = async (productId) => {
            try {
                const res = await fetch(`{{ url('products') }}/${productId}/edit`, {
                    headers: {
                        'Accept': 'application/json'
                    }
                });
                const responseData = await res.json();
                const product = responseData.product;

                document.getElementById('modalTitle').innerText = 'Edit Product';
                document.getElementById('formMethod').value = 'PUT';
                document.getElementById('productId').value = product.id;

                document.getElementById('name').value = product.name;
                document.getElementById('price').value = product.price;
                document.getElementById('description').value = product.description;

                if (product.image) {
                    imagePreview.src = product.image;
                    imagePreview.classList.remove('hidden');
                } else {
                    imagePreview.src = '';
                    imagePreview.classList.add('hidden');
                }

                modal.classList.remove('hidden');
            } catch (error) {
                console.error('Could not fetch product data', error);
                Swal.fire('Error', 'Could not fetch product details', 'error');
            }
        };

        function resetForm() {
            productForm.reset();
            document.getElementById('productId').value = '';
            document.getElementById('formMethod').value = 'POST';
            imagePreview.src = '';
            imagePreview.classList.add('hidden');
        }
    });
</script>

@endpush