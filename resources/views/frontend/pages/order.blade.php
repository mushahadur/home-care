@extends('frontend.layouts.app')

@section('title')
    Oreder
@endsection

@section('content')
     <!-- Main Content -->
<main class="bg-gray-50 min-h-screen pb-12">
    <!-- Header with Search -->
<div class="bg-gradient-to-r from-[#115c7e] to-[#1a7a9e] py-8 md:py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10">
            <h1 class="text-2xl md:text-3xl lg:text-3xl font-bold text-white mb-4">
                <span class="bn-only block">আমার অর্ডারসমূহ</span>
            </h1>
            
            <p class="text-base md:text-lg text-blue-100 max-w-2xl mx-auto">
                <span class="en-only block">Track and manage your home nursing service bookings</span>
                <span class="bn-only block">আপনার হোম নার্সিং সেবার বুকিং ট্র্যাক ও পরিচালনা করুন</span>
            </p>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 max-w-4xl mx-auto">
            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 text-center">
                <p class="text-2xl font-bold text-white">12</p>
                <p class="text-xs text-blue-100">Total Orders</p>
            </div>
            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 text-center">
                <p class="text-2xl font-bold text-white">8</p>
                <p class="text-xs text-blue-100">Completed</p>
            </div>
            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 text-center">
                <p class="text-2xl font-bold text-white">3</p>
                <p class="text-xs text-blue-100">Active</p>
            </div>
            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 text-center">
                <p class="text-2xl font-bold text-white">1</p>
                <p class="text-xs text-blue-100">Cancelled</p>
            </div>
        </div>
    </div>
</div>

    <!-- Content Container -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8">
        

        <!-- Orders List Container -->
        <div class="space-y-6 pt-16">
            
            <!-- Active Order Card (Confirmed) -->
            <div class="bg-white rounded-2xl shadow-soft border border-gray-100 overflow-hidden hover:shadow-xl transition-all duration-300">
        <div class="flex flex-col sm:flex-row">
          
          <!-- Image -->
          <div class="sm:w-48 md:w-56 lg:w-64 h-48 sm:h-auto flex-shrink-0">
            <img 
              src="https://doctorshomecarebd.com/wp-content/uploads/2024/09/White-and-Blue-Illustrative-Senior-Home-Care-Health-and-Wellness-Service-Instagram-Post-1587-x-1000-px.png.webp" 
              alt="IV Injection Service" 
              class="w-full h-full object-cover"
            />
          </div>

          <!-- Content -->
          <div class="flex-1 p-5 sm:p-6 flex flex-col">
            <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-3 mb-3">
              <div>
                <h3 class="text-lg sm:text-xl font-bold text-gray-900">IV Injection & Fluid Administration</h3>
                <p class="text-sm text-gray-500 mt-1">Order #ORD-20260224-0789</p>
              </div>
              <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                <i class="fas fa-check-circle mr-1.5"></i> Confirmed
              </span>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 text-sm mb-5">
              <div>
                <p class="text-gray-500">Date</p>
                <p class="font-medium">25 February 2026</p>
              </div>
              <div>
                <p class="text-gray-500">Time</p>
                <p class="font-medium">Morning (9:00 AM – 11:00 AM)</p>
              </div>
              <div>
                <p class="text-gray-500">Price</p>
                <p class="font-bold text-[var(--accent)]">৳ 350</p>
              </div>
            </div>

            <div class="text-sm text-gray-600 mb-5">
              <p><strong>Patient:</strong> Md. Rahim Khan</p>
              <p><strong>Address:</strong> House #12, Road #3, Kandipara, Brahmanbaria</p>
              <p class="mt-2"><strong>Note:</strong> Patient has diabetes, please bring glucometer if needed.</p>
            </div>

            <!-- Actions -->
            <div class="flex flex-wrap gap-3 mt-auto">
              <button class="inline-flex items-center px-5 py-2.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition text-sm font-medium">
                <i class="fas fa-eye mr-2"></i> View Details
              </button>
              <button class="inline-flex items-center px-5 py-2.5 bg-red-50 text-red-700 rounded-lg hover:bg-red-100 transition text-sm font-medium border border-red-200">
                <i class="fas fa-times-circle mr-2"></i> Cancel Order
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Another Example Order (Completed) -->
      <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden opacity-90">
        <div class="flex flex-col sm:flex-row">
          <div class="sm:w-48 md:w-56 lg:w-64 h-48 sm:h-auto flex-shrink-0">
            <img 
              src="https://c-care.ca/wp-content/uploads/2019/04/5-important-benefits-of-homecare.jpg" 
              alt="Wound Dressing" 
              class="w-full h-full object-cover"
            />
          </div>
          <div class="flex-1 p-5 sm:p-6">
            <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-3 mb-3">
              <div>
                <h3 class="text-lg sm:text-xl font-bold text-gray-900">Wound Dressing & Care</h3>
                <p class="text-sm text-gray-500">Order #ORD-20260220-0451</p>
              </div>
              <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                <i class="fas fa-check-double mr-1.5"></i> Completed
              </span>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 text-sm mb-5">
              <div>
                <p class="text-gray-500">Date</p>
                <p class="font-medium">25 February 2026</p>
              </div>
              <div>
                <p class="text-gray-500">Time</p>
                <p class="font-medium">Morning (9:00 AM – 11:00 AM)</p>
              </div>
              <div>
                <p class="text-gray-500">Price</p>
                <p class="font-bold text-[var(--accent)]">৳ 350</p>
              </div>
            </div>

            <div class="text-sm text-gray-600 mb-5">
              <p><strong>Patient:</strong> Md. Rahim Khan</p>
              <p><strong>Address:</strong> House #12, Road #3, Kandipara, Brahmanbaria</p>
              <p class="mt-2"><strong>Note:</strong> Patient has diabetes, please bring glucometer if needed.</p>
            </div>

            <!-- Actions -->
            <div class="flex flex-wrap gap-3 mt-auto">
              <button class="inline-flex items-center px-5 py-2.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition text-sm font-medium">
                <i class="fas fa-eye mr-2"></i> View Details
              </button>
              <button class="inline-flex items-center px-5 py-2.5 bg-red-50 text-red-700 rounded-lg hover:bg-red-100 transition text-sm font-medium border border-red-200">
                <i class="fas fa-times-circle mr-2"></i> Cancel Order
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Empty State (uncomment when no orders) -->
      
      <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-10 text-center py-16 sm:py-24">
        <i class="fas fa-calendar-times text-6xl text-gray-300 mb-6"></i>
        <h3 class="text-xl sm:text-2xl font-bold text-gray-700 mb-3">No orders yet</h3>
        <p class="text-gray-500 max-w-md mx-auto mb-8">
          You haven't booked any nursing services yet. Start by booking your first home care service.
        </p>
        <a href="#" class="inline-flex items-center gap-2 bg-[var(--primary)] text-white px-8 py-4 rounded-xl font-medium hover:bg-[#1e3a54] transition">
          <i class="fas fa-plus"></i> Book a Service Now
        </a>
      </div>
    
    </div>

  </main>
@endsection