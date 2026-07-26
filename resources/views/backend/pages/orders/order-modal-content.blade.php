<!-- Modal Header -->
<div class="flex justify-between items-center border-b pb-3 mb-4 border-gray-200 dark:border-gray-700">
    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
        Order Details for: <span class="text-blue-600 dark:text-blue-400">{{ $user->name }}</span>
    </h3>
    <button type="button" class="closeModal text-gray-500 hover:bg-red-100 dark:hover:bg-red-900/30 hover:text-red-600 transition font-bold text-3xl">&times;</button>
</div>

<!-- Modal Body Cards Scrollable Area -->
<div class="max-h-[70vh] overflow-y-auto space-y-4 pr-1">
    @forelse ($user->orders as $order)
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-md border border-gray-100 dark:border-gray-700 overflow-hidden hover:shadow-xl transition-all duration-300">
            <div class="flex flex-col sm:flex-row">

                <!-- Image -->
                <div class="sm:w-48 md:w-56 lg:w-64 h-48 sm:h-auto flex-shrink-0 bg-gray-100 dark:bg-gray-700">
                    <img
                        src="{{ $order->careService?->care_services_image ? asset($order->careService->care_services_image) : asset('images/default.jpg') }}"
                        alt="{{ $order->careService->care_services_name ?? 'Service Name' }}"
                        class="w-full h-full object-cover" 
                    />
                </div>

                <!-- Content -->
                <div class="flex-1 p-5 sm:p-6 flex flex-col justify-between">
                    <div>
                        <!-- Title & Status -->
                        <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-3 mb-3">
                            <div>
                                <h3 class="text-lg sm:text-xl font-bold text-gray-900 dark:text-white">
                                    {{ $order->careService->care_services_name ?? 'Service Name' }}
                                </h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                                    Order #ORD-{{ $order->id }}
                                </p>
                            </div>
                            
                            <!-- Dynamic Status Badges based on status -->
                            @php
                                $status = strtolower($order->status ?? 'pending');
                                $statusClasses = match($status) {
                                    'completed' => 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400',
                                    'pending' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400',
                                    'cancelled' => 'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400',
                                    default => 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300'
                                };
                                $statusIcon = match($status) {
                                    'completed' => 'fa-check-circle',
                                    'pending' => 'fa-clock',
                                    'cancelled' => 'fa-times-circle',
                                    default => 'fa-info-circle'
                                };
                            @endphp

                            <span class="inline-flex items-center self-start px-3 py-1 rounded-full text-sm font-medium {{ $statusClasses }}">
                                <i class="fas {{ $statusIcon }} mr-1.5"></i>
                                {{ ucfirst($order->status ?? 'Unknown') }}
                            </span>
                        </div>

                        <!-- Details Grid -->
                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 text-sm mb-5">
                            <div>
                                <p class="text-gray-500 dark:text-gray-400">Preferred Date</p>
                                <p class="font-medium text-gray-900 dark:text-gray-200">
                                    {{ \Carbon\Carbon::parse($order->preferred_date)->format('d M, Y') }}
                                </p>
                            </div>
                            <div>
                                <p class="text-gray-500 dark:text-gray-400">Time Duration</p>
                                <p class="font-medium text-gray-900 dark:text-gray-200">{{ $order->preferred_time }}</p>
                            </div>
                            <div>
                                <p class="text-gray-500 dark:text-gray-400">Price</p>
                                <p class="font-bold text-blue-600 dark:text-blue-400">৳ {{ number_format($order->total_price, 2) }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Notes -->
                    <div class="text-sm text-gray-600 dark:text-gray-300 bg-gray-50 dark:bg-gray-700/50 p-3 rounded-lg">
                        <p><strong>Note:</strong> {{ $order->notes ?? 'No notes available' }}</p>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="text-center py-8">
            <p class="text-gray-500 dark:text-gray-400">No orders available for this user.</p>
        </div>
    @endforelse
</div>

<!-- Modal Footer -->
<div class="mt-6 flex justify-end border-t pt-3 border-gray-200 dark:border-gray-700">
    <button type="button" class="closeModal px-4 py-2 bg-gray-200 hover:bg-red-300 dark:bg-gray-700 dark:hover:bg-red-600 text-gray-800 dark:text-white rounded-md transition text-sm">
        Close
    </button>
</div>


