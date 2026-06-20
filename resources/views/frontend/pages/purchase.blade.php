@extends('frontend.layouts.app')

@section('title')
Oreder
@endsection

@section('content')
<main class="bg-gray-50 min-h-screen pb-12">
  <div class="bg-gradient-to-r from-[#115c7e] to-[#1a7a9e] py-8 md:py-8">
    <div class="text-center">
      <h1 class="text-2xl md:text-3xl lg:text-3xl font-bold text-white mb-4">
        <span class="en-only block">অর্ডার টি কনফার্ম করুন </span>
      </h1>

      <p class="text-base md:text-lg text-blue-100 max-w-2xl mx-auto">
        <span class="en-only block">Professional, compassionate care at your doorstep — exclusively in</span>
      </p>
    </div>
  </div>

  <!-- <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-8 pt-12"> -->
  <form class="space-y-6 " action="{{ route('order.place') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container mx-auto grid grid-cols-1 lg:grid-cols-3 gap-8 pt-6">
      <!-- LEFT: FORM -->
      <div class="lg:col-span-2 space-y-6 p-5 sm:p-7 md:p-0 lg:p-0 xl:p-0 2xl:p-0">
        <!-- 1. Service Selection -->
        <section class="rounded-lg sm:rounded-lg bg-white shadow-lg shadow-gray-900/50 border border-1 border-blue-200">
          <!-- Collapsible Header -->
          <button type="button" id="toggleServicesBtn" class="w-full flex items-center rounded-t-lg rounded-b-none justify-between bg-blue-50 hover:bg-blue-100 p-4 transition">
            <h2 class="text-xl font-bold text-[#2b4f6e]">Select Service</h2>
            <span id="toggleIcon" class="text-2xl font-bold text-[#2b4f6e]">−</span>
          </button>

          <!-- Service Options Container (collapsible) -->
          <div id="servicesContainer" class="mt-5 p-5 sm:p-6 md:p-7 lg:p-8 xl:p-8 2xl:p-8">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-6">
              <!-- Single Day -->
              <!-- <label class="service-option flex items-start gap-3 border-1 border-gray-200 rounded-md p-5 sm:p-6 cursor-pointer transition hover:border-[#2b4f6e] has-[:checked]:border-rose-600 has-[:checked]:bg-red-50/30 has-[:checked]:shadow-sm">
                <input type="radio" name="service" value="single" data-price="{{ $careService->single_services_price }}" checked class="mt-1 w-5 h-5 accent-rose-600">
                <div class="w-full">
                  <div class="flex justify-between items-center">
                    <span class="font-semibold text-base sm:text-lg">For Single Days</span>
                    <span class="text-rose-600 font-bold text-lg">৳{{ $careService->single_services_price }}</span>
                  </div>
                  <span class="text-xs text-gray-600 mt-1.5 block">Safe & skilled administration at home</span>
                </div>
              </label> -->
               <!-- Single Day -->
            <label
              class="flex items-start gap-3 border-2 border-gray-200 rounded-md p-5 sm:p-6 cursor-pointer transition
                    hover:border-[#2b4f6e]
                    has-[:checked]:border-rose-600
                    has-[:checked]:bg-red-50/30
                    has-[:checked]:shadow-sm">
              <input
                type="radio"
                name="service"
                value="single"
                data-price="{{ $careService->single_services_price }}"
                checked
                class="mt-1 w-5 h-5 accent-rose-600" />

              <div class="w-full">
                <div class="flex justify-between items-center">
                  <span class="font-semibold text-base sm:text-lg">For Single Days</span>
                  <span class="text-rose-600 font-bold text-lg">৳{{ $careService->single_services_price }}</span>
                </div>

                <span class="text-xs text-gray-600 mt-1.5 block">
                  Safe & skilled administration at home
                </span>
              </div>
            </label>

              <!-- Triple Days -->
              <label class="service-option flex items-start gap-3 border-2 border-gray-200 rounded-md p-5 sm:p-6 cursor-pointer transition hover:border-[#2b4f6e] has-[:checked]:border-rose-600 has-[:checked]:bg-red-50/30 has-[:checked]:shadow-sm">
                <input type="radio" name="service" value="triple" data-price="{{ $careService->triple_services_price }}" class="mt-1 w-5 h-5 accent-rose-600">
                <div class="w-full">
                  <div class="flex justify-between items-center">
                    <span class="font-semibold text-base sm:text-lg">For Triple Days</span>
                    <span class="text-rose-600 font-bold text-lg">৳{{ $careService->triple_services_price }}</span>
                  </div>
                  <span class="text-xs text-gray-600 mt-1.5 block">Sterile cleaning & gentle care</span>
                </div>
              </label>

              <!-- Seven Days -->
              <label class="service-option flex items-start gap-3 border-2 border-gray-200 rounded-md p-5 sm:p-6 cursor-pointer transition hover:border-[#2b4f6e] has-[:checked]:border-rose-600 has-[:checked]:bg-red-50/30 has-[:checked]:shadow-sm">
                <input type="radio" name="service" value="seven_days" data-price="{{ $careService->seven_services_price }}" class="mt-1 w-5 h-5 accent-rose-600">
                <div class="w-full">
                  <div class="flex justify-between items-center">
                    <span class="font-semibold text-base sm:text-lg">For Seven Days</span>
                    <span class="text-rose-600 font-bold text-lg">৳{{ $careService->seven_services_price }}</span>
                  </div>
                  <span class="text-xs text-gray-600 mt-1.5 block">Comprehensive care & support</span>
                </div>
              </label>
            </div>
          </div>
        </section>


        <!-- Patient Info -->
        <div class="bg-white shadow-lg shadow-gray-900/50 rounded-lg border  border-1 border-blue-200">
          <!-- Toggle Button -->
          <button type="button" id="togglePatientInfoBtn" class="w-full flex items-center justify-between bg-blue-50 hover:bg-blue-100 p-4 transition" aria-expanded="true">
            <h2 class="text-xl font-bold text-[#2b4f6e]">Patient Information</h2>
            <span id="patientInfoIcon" class="text-2xl font-bold text-[#2b4f6e]">−</span>
          </button>
          <div id="patientInfoContainer">
            <!-- Collapsible Content -->
            <div id="patientInfoContainer" class="grid grid-cols-1 md:grid-cols-3 gap-5 sm:gap-6 p-6 sm:p-7 md:p-8 lg:p-8 xl:p-8 2xl:p-8">

              <!-- Field 1: Full Name -->
              <div>
                @php
                $user = Auth::user();
                @endphp
                <label class="block text-sm font-medium text-gray-700 mb-1.5">
                  Full Name <span class="text-red-600">*</span>
                </label>

                <input
                  type="text"
                  name="patient_name"
                  required
                  value="{{ old('patient_name') ?? ($user->name ?? '') }}"
                  class="w-full border border-gray-300 rounded-lg px-4 py-2 text-base focus:border-[#2b4f6e] {{ ($user && $user->name) ? 'bg-gray-100 cursor-not-allowed' : '' }}"
                  {{ ($user && $user->name) ? 'readonly' : '' }}
                  placeholder="Patient full name" />
                @error('patient_name')
                <span class="text-red-600 text-xs">{{ $message }}</span>
                @enderror
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Email <span class="text-red-600">*</span></label>
                <input
                  type="email"
                  name="email"
                  required
                  value="{{ old('email') ?? ($user->email ?? '') }}"
                  class="w-full border border-gray-300 rounded-lg px-4 py-2 text-base focus:border-[#2b4f6e]"
                  {{ ($user && $user->email) ? 'readonly' : '' }}
                  placeholder="example@email.com" />
                @error('email')
                <span class="text-red-600 text-xs">{{ $message }}</span>
                @enderror
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Phone Number <span class="text-red-600">*</span></label>
                <input
                  type="tel"
                  name="phone"
                  required
                  value="{{ old('phone') ?? ($user->phone ?? '') }}"
                  class="w-full border border-gray-300 rounded-lg px-4 py-2 text-base focus:border-[#2b4f6e]"
                  {{ ($user && $user->phone) ? 'readonly' : '' }}
                  placeholder="+880 1X XXX XXXX" />
                @error('phone')
                <span class="text-red-600 text-xs">{{ $message }}</span>
                @enderror
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Full Address <span class="text-red-600">*</span></label>
                <textarea
                  name="address"
                  required
                  rows="3"
                  {{ ($user && $user->address) ? 'readonly' : '' }}
                  class="w-full border border-gray-300 rounded-lg px-4 py-2 text-base focus:border-[#2b4f6e]"
                  placeholder="House no, road, area, Brahmanbaria">{{ old('address') ?? ($user->address ?? '') }}</textarea>
                @error('address')
                <span class="text-red-600 text-xs">{{ $message }}</span>
                @enderror
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Preferred Date</label>
                <input
                  type="date"
                  name="preferred_date"
                  value="{{ old('preferred_date', date('Y-m-d')) }}"
                  min="{{ date('Y-m-d') }}"
                  class="w-full border border-gray-300 rounded-lg px-4 py-2 text-base focus:border-[#2b4f6e]" />
                @error('preferred_date')
                <span class="text-red-600 text-xs">{{ $message }}</span>
                @enderror
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Preferred Time</label>
                <select
                  name="preferred_time"
                  class="w-full border rounded-lg px-4 py-2 
                    @error('preferred_time') border-red-500 @enderror">

                  <option value="">Select Time</option>

                  <option value="Morning (8 AM – 12 PM)"
                    {{ old('preferred_time') == 'Morning (8 AM – 12 PM)' ? 'selected' : '' }}>
                    Morning (8 AM – 12 PM)
                  </option>

                  <option value="Afternoon (12 PM – 4 PM)"
                    {{ old('preferred_time') == 'Afternoon (12 PM – 4 PM)' ? 'selected' : '' }}>
                    Afternoon (12 PM – 4 PM)
                  </option>

                  <option value="Evening (4 PM – 8 PM)"
                    {{ old('preferred_time') == 'Evening (4 PM – 8 PM)' ? 'selected' : '' }}>
                    Evening (4 PM – 8 PM)
                  </option>
                </select>

                @error('preferred_time')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
              </div>

            </div>
          </div>
        </div>



        <!-- Upload + Preview -->
        <div class="bg-white rounded-lg border  border-1 border-blue-200 shadow-xl shadow-gray-900/50 space-y-5">
          <!-- Toggle Button -->
          <button type="button" id="togglePrescriptionBtn" class="w-full flex items-center justify-between bg-blue-50 hover:bg-blue-100 p-4 transition" aria-expanded="true">
            <h2 class="text-xl font-bold text-[#2b4f6e]">Upload Prescription</h2>
            <span id="prescriptionIcon" class="text-2xl font-bold text-[#2b4f6e]">−</span>
          </button>
          <div id="prescriptionContainer">
            <div class="space-y-6 p-6 sm:p-7 md:p-8 lg:p-8 xl:p-8 2xl:p-8">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Upload Doctor's Prescription
                  <span class="text-red-600 text-xs">(required)</span></label>
                <label
                  class="flex flex-col items-center justify-center border-2 border-dashed border-gray-300 rounded-xl p-3 sm:p-3 cursor-pointer hover:border-[#2b4f6e] bg-gray-50 transition min-h-[40px]">
                  <i
                    class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-4"></i>
                  <span class="text-gray-600 font-medium text-base sm:text-lg">Tap to upload or drag file here</span>
                  <span class="text-xs sm:text-sm text-gray-500 mt-2">JPG, PNG, PDF • max 5 MB</span>
                  <input
                    type="file"
                    name="prescription"
                    accept="image/*,application/pdf"
                    class="hidden"
                    id="prescriptionUpload" />
                  <span>{{ old('prescription') ? 'File uploaded' : '' }}</span>
                  @error('prescription')
                  <span class="text-red-600 text-xs">{{ $message }}</span>
                  @enderror
                </label>
              </div>

              <div
                id="previewArea"
                class="hidden flex flex-col sm:flex-row items-start sm:items-center gap-4 p-4 bg-gray-50 rounded-lg border">
                <div
                  id="previewThumb"
                  class="w-20 h-20 sm:w-16 sm:h-16 rounded bg-gray-200 flex-shrink-0 overflow-hidden"></div>
                <div class="flex-1 min-w-0">
                  <p
                    id="fileDisplayName"
                    class="font-medium text-base truncate"></p>
                  <p class="text-sm text-gray-500">Uploaded successfully</p>
                </div>
                <button
                  id="removeFile"
                  class="text-red-600 hover:text-red-800 font-medium whitespace-nowrap mt-3 sm:mt-0">
                  Remove
                </button>
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Additional Notes for Nurse (optional)</label>
                <textarea
                  name="additional_notes"
                  rows="2"
                  class="w-full border border-slate-300 rounded-lg px-4 py-3.5 text-base focus:border-slate-600"
                  placeholder="Allergies, mobility issues, special instructions, caregiver gender preference, etc..."></textarea>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- RIGHT: ORDER SUMMARY -->
      <div class="lg:col-span-1 px-6 sm:px-6 md:px-8 lg:px-0 xl:px-0 2xl:px-0">
        <div class="bg-white rounded-lg shadow-lg shadow-gray-900/50 border  border-1 border-blue-200 sticky top-24">
          <!-- Toggle Button -->
          <button type="button" class="w-full flex items-center justify-between bg-blue-50 hover:bg-blue-100 p-4 transition">
            <h2 class="text-xl font-bold text-[#2b4f6e]">Order Summary</h2>
          </button>
          <div class="p-6 sm:p-7 md:p-8 lg:p-8 xl:p-8 2xl:p-8">
            <!-- Service -->
            <div class="flex items-center justify-between mb-1">
              <p class="text-gray-900 font-semibold">Service</p>
              <span class="font-semibold text-[#2B4F6E]">{{ $careService->care_services_name }}</span>
            </div>
            <hr class="mb-3 border-dotted border-t-2 border-gray-300" />
            <!-- Plan -->
            <div class="flex items-center justify-between mb-1">
              <span class="text-gray-900 font-semibold">Plan</span>
              <span class="font-semibold"><span id="plan_name">Single</span></span>
            </div>
            <hr class="mb-3 border-dotted border-t-2 border-gray-300" />
            <!-- Price -->
            <div class="flex items-center justify-between mb-1">
              <span class="text-gray-900 font-semibold">Price</span>
              <span class="font-semibold">৳<span id="basePrice">00</span></span>
            </div>
            <hr class="mb-3 border-dotted border-t-2 border-gray-300" />

            <!-- Discount -->
            <div class="flex items-center justify-between mb-1">
              <span class="text-gray-900 font-semibold">Discount</span>
              <span class="text-green-600 font-semibold">−৳<span id="discount">00</span></span>
            </div>
            <hr class="mb-3 border-dotted border-t-2 border-gray-300" />

            <!-- Tax -->
            <div class="flex items-center justify-between mb-1">
              <span class="text-gray-900 font-semibold">Tax</span>
              <span class="text-gray-600 font-semibold">৳<span id="tax">00</span></span>
            </div>

            <hr class="mb-5 border-dotted border-t-1 border-gray-500" />
            <input type="hidden" name="service_id" id="service_id" value="{{ $careService->id }}">
            <!-- Total -->
            <div class="flex items-center justify-between text-lg font-bold mb-4">
              <span>Total</span>
              <span class="text-[#C63E5A]">৳<span id="totalPrice">0</span></span>
            </div>

            <!-- Button -->
            <!-- <button
              class="w-full mt-6 bg-[#2B4F6E] text-white py-3 rounded-xl font-semibold hover:bg-[#1A3B4F] transition"
            >
              Confirm Order
            </button> -->
            <button type="submit"
              class="w-full mt-6 bg-[#2B4F6E] text-white py-3 rounded-md font-semibold hover:bg-[#1A3B4F] transition inline-block text-center no-underline">
              Confirm Order
            </button>
          </div>
        </div>
      </div>

    </div>
  </form>

</main>
<!-- Review Section - Fully Responsive -->
<section class="pb-16 bg-gradient-to-b from-white to-[#ecffe1] overflow-hidden border-t border-soft-blue pt-5">
  <div class="container mx-auto px-4 sm:px-6 lg:px-8">

    <!-- Section Header - Mobile Optimized -->
    <div class="text-center mb-10 md:mb-16">
      <span class="inline-flex items-center px-3 py-1.5 md:px-4 md:py-2 bg-[#e6f0fa] text-[#115c7e] rounded-full text-xs md:text-sm font-semibold mb-3 md:mb-4">
        <i class="fas fa-star mr-1.5 text-[#dd88a0]"></i>
        <span class="bn-only">রোগীদের মতামত</span>
      </span>

      <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900 mb-3 md:mb-4">
        <span class="bn-only">পরিবারগুলো আমাদের সম্পর্কে কী বলে</span>
      </h2>

      <p class="text-sm md:text-base text-gray-600 max-w-2xl mx-auto px-4">
        <span class="bn-only">যে পরিবারগুলি তাদের প্রিয়জনের যত্নের জন্য আমাদের উপর আস্থা রেখেছে তাদের বাস্তব গল্প</span>
      </p>
    </div>

    <!-- Overall Rating Summary - Mobile First -->
    <div class="bg-white rounded-2xl md:rounded-3xl shadow-soft p-5 md:p-8 mb-8 md:mb-12">
      <div class="flex flex-col md:flex-row items-center justify-between gap-6 md:gap-8">

        <!-- Rating Score -->
        <div class="text-center md:text-left">
          <div class="flex items-center gap-3 md:gap-4 mb-2">
            <span class="text-4xl md:text-5xl lg:text-6xl font-bold text-[#115c7e]">4.8</span>
            <div class="flex flex-col">
              <div class="flex items-center gap-1">
                <i class="fas fa-star text-[#dd88a0] text-sm md:text-base"></i>
                <i class="fas fa-star text-[#dd88a0] text-sm md:text-base"></i>
                <i class="fas fa-star text-[#dd88a0] text-sm md:text-base"></i>
                <i class="fas fa-star text-[#dd88a0] text-sm md:text-base"></i>
                <i class="fas fa-star-half-alt text-[#dd88a0] text-sm md:text-base"></i>
              </div>
              <p class="text-xs md:text-sm text-gray-500 mt-1">
                <span class="bn-only">২৫০০+ রিভিউর ভিত্তিতে</span>
              </p>
            </div>
          </div>
        </div>

        <!-- Rating Bars -->
        <div class="flex-1 w-full max-w-md space-y-2">
          <!-- 5 Star -->
          <div class="flex items-center gap-2">
            <span class="text-xs md:text-sm font-medium w-12">5 star</span>
            <div class="flex-1 h-2 bg-gray-200 rounded-full overflow-hidden">
              <div class="h-full bg-[#115c7e] rounded-full" style="width: 85%"></div>
            </div>
            <span class="text-xs md:text-sm text-gray-600">85%</span>
          </div>
          <!-- 4 Star -->
          <div class="flex items-center gap-2">
            <span class="text-xs md:text-sm font-medium w-12">4 star</span>
            <div class="flex-1 h-2 bg-gray-200 rounded-full overflow-hidden">
              <div class="h-full bg-[#115c7e] rounded-full" style="width: 10%"></div>
            </div>
            <span class="text-xs md:text-sm text-gray-600">10%</span>
          </div>
          <!-- 3 Star -->
          <div class="flex items-center gap-2">
            <span class="text-xs md:text-sm font-medium w-12">3 star</span>
            <div class="flex-1 h-2 bg-gray-200 rounded-full overflow-hidden">
              <div class="h-full bg-[#115c7e] rounded-full" style="width: 3%"></div>
            </div>
            <span class="text-xs md:text-sm text-gray-600">3%</span>
          </div>
          <!-- 2 Star -->
          <div class="flex items-center gap-2">
            <span class="text-xs md:text-sm font-medium w-12">2 star</span>
            <div class="flex-1 h-2 bg-gray-200 rounded-full overflow-hidden">
              <div class="h-full bg-[#115c7e] rounded-full" style="width: 1%"></div>
            </div>
            <span class="text-xs md:text-sm text-gray-600">1%</span>
          </div>
          <!-- 1 Star -->
          <div class="flex items-center gap-2">
            <span class="text-xs md:text-sm font-medium w-12">1 star</span>
            <div class="flex-1 h-2 bg-gray-200 rounded-full overflow-hidden">
              <div class="h-full bg-[#115c7e] rounded-full" style="width: 1%"></div>
            </div>
            <span class="text-xs md:text-sm text-gray-600">1%</span>
          </div>
        </div>

        <!-- Write Review Button -->
        <button class="w-full md:w-auto bg-[#dd88a0] hover:bg-[#c46f89] text-white px-6 py-3 rounded-xl font-medium transition-all duration-300 transform hover:scale-105 shadow-md">
          <i class="fas fa-pen mr-2"></i>
          <span class="bn-only">রিভিউ লিখুন</span>
        </button>
      </div>
    </div>

    <!-- Reviews Grid - Mobile Responsive -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6 lg:gap-8">

      <!-- Review Card 1 - Featured -->
      <div class="bg-white rounded-xl md:rounded-2xl shadow-soft p-5 md:p-6 hover:shadow-lg transition-all duration-300 border border-gray-100">
        <!-- Verified Badge -->
        <div class="flex items-center justify-between mb-4">
          <span class="inline-flex items-center gap-1 bg-green-50 text-green-700 text-xs px-2 py-1 rounded-full">
            <i class="fas fa-check-circle text-green-600 text-xs"></i>
            <span class="bn-only">নিশ্চিত রোগী</span>
          </span>
          <div class="flex items-center gap-1">
            <i class="fas fa-star text-[#dd88a0] text-xs"></i>
            <i class="fas fa-star text-[#dd88a0] text-xs"></i>
            <i class="fas fa-star text-[#dd88a0] text-xs"></i>
            <i class="fas fa-star text-[#dd88a0] text-xs"></i>
            <i class="fas fa-star text-[#dd88a0] text-xs"></i>
          </div>
        </div>

        <!-- Review Content -->
        <p class="text-gray-700 text-sm md:text-base mb-4 line-clamp-3">
          <span class="bn-only">"নার্স অত্যন্ত পেশাদার এবং যত্নশীল ছিল। আমার মা অবিলম্বে স্বাচ্ছন্দ্য বোধ করেছেন। তাদের সেবা অত্যন্ত সুপারিশ করছি!"</span>
        </p>

        <!-- Reviewer Info -->
        <div class="flex items-center gap-3">
          <img src="https://randomuser.me/api/portraits/women/32.jpg"
            alt="Reviewer"
            class="w-10 h-10 md:w-12 md:h-12 rounded-full object-cover border-2 border-[#e6f0fa]">
          <div>
            <h4 class="font-semibold text-gray-900 text-sm md:text-base">Nasrin Akter</h4>
            <div class="flex items-center gap-2 text-xs text-gray-500">
              <span class="bn-only">২ দিন আগে</span>
              <span>•</span>
              <span class="bn-only">বয়স্ক সেবা</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Review Card 2 -->
      <div class="bg-white rounded-xl md:rounded-2xl shadow-soft p-5 md:p-6 hover:shadow-lg transition-all duration-300 border border-gray-100">
        <div class="flex items-center justify-between mb-4">
          <span class="inline-flex items-center gap-1 bg-green-50 text-green-700 text-xs px-2 py-1 rounded-full">
            <i class="fas fa-check-circle text-green-600 text-xs"></i>
            <span class="bn-only">নিশ্চিত</span>
          </span>
          <div class="flex items-center gap-1">
            <i class="fas fa-star text-[#dd88a0] text-xs"></i>
            <i class="fas fa-star text-[#dd88a0] text-xs"></i>
            <i class="fas fa-star text-[#dd88a0] text-xs"></i>
            <i class="fas fa-star text-[#dd88a0] text-xs"></i>
            <i class="fas fa-star text-[#dd88a0] text-xs"></i>
          </div>
        </div>

        <p class="text-gray-700 text-sm md:text-base mb-4 line-clamp-3">
          <span class="bn-only">"পোস্ট-অপারেটিভ যত্নের জন্য চমৎকার সেবা। নার্স সময়ানুবর্তী, দক্ষ এবং খুব ভদ্র ছিল। অবশ্যই আবার বুক করব।"</span>
        </p>

        <div class="flex items-center gap-3">
          <img src="https://randomuser.me/api/portraits/men/45.jpg"
            alt="Reviewer"
            class="w-10 h-10 md:w-12 md:h-12 rounded-full object-cover border-2 border-[#e6f0fa]">
          <div>
            <h4 class="font-semibold text-gray-900 text-sm md:text-base">Kamal Hossain</h4>
            <div class="flex items-center gap-2 text-xs text-gray-500">
              <span class="bn-only">৫ দিন আগে</span>
              <span>•</span>
              <span class="bn-only">পোস্ট-অপ কেয়ার</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Review Card 3 -->
      <div class="bg-white rounded-xl md:rounded-2xl shadow-soft p-5 md:p-6 hover:shadow-lg transition-all duration-300 border border-gray-100">
        <div class="flex items-center justify-between mb-4">
          <span class="inline-flex items-center gap-1 bg-green-50 text-green-700 text-xs px-2 py-1 rounded-full">
            <i class="fas fa-check-circle text-green-600 text-xs"></i>
            <span class="bn-only">নিশ্চিত</span>
          </span>
          <div class="flex items-center gap-1">
            <i class="fas fa-star text-[#dd88a0] text-xs"></i>
            <i class="fas fa-star text-[#dd88a0] text-xs"></i>
            <i class="fas fa-star text-[#dd88a0] text-xs"></i>
            <i class="fas fa-star text-[#dd88a0] text-xs"></i>
            <i class="fas fa-star text-[#dd88a0] text-xs"></i>
          </div>
        </div>

        <p class="text-gray-700 text-sm md:text-base mb-4 line-clamp-3">
          <span class="bn-only">"অত্যন্ত পেশাদার সেবা। নার্স সবকিছু পরিষ্কারভাবে ব্যাখ্যা করেছেন এবং আমার বাবার খুব যত্ন নিয়েছেন। নার্স নেক্সট ডোরকে ধন্যবাদ!"</span>
        </p>

        <div class="flex items-center gap-3">
          <img src="https://randomuser.me/api/portraits/women/68.jpg"
            alt="Reviewer"
            class="w-10 h-10 md:w-12 md:h-12 rounded-full object-cover border-2 border-[#e6f0fa]">
          <div>
            <h4 class="font-semibold text-gray-900 text-sm md:text-base">Shamima Yasmin</h4>
            <div class="flex items-center gap-2 text-xs text-gray-500">
              <span class="bn-only">১ সপ্তাহ আগে</span>
              <span>•</span>
              <span class="bn-only">নার্সিং কেয়ার</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- View All Reviews Button -->
    <div class="text-center mt-8 md:mt-12">
      <a href="#" class="inline-flex items-center gap-2 border-2 border-[#115c7e] text-[#115c7e] hover:bg-[#115c7e] hover:text-white px-6 py-2 md:px-8 md:py-4 lg:py-2 xl:py-2 rounded-lg font-medium transition-all duration-300">
        <span class="bn-only">সব রিভিউ দেখুন</span>
        <i class="fas fa-arrow-right ml-2"></i>
      </a>
    </div>
  </div>
</section>
@endsection

@push('scripts')
<script>
  // File preview
  const fileInput = document.getElementById("prescriptionUpload");
  const previewArea = document.getElementById("previewArea");
  const fileNameEl = document.getElementById("fileDisplayName");
  const thumbEl = document.getElementById("previewThumb");
  const removeBtn = document.getElementById("removeFile");

  fileInput?.addEventListener("change", (e) => {
    const file = e.target.files[0];
    if (!file) return;

    fileNameEl.textContent = file.name;
    previewArea.classList.remove("hidden");

    if (file.type.startsWith("image/")) {
      const reader = new FileReader();
      reader.onload = (ev) => {
        thumbEl.innerHTML = `<img src="${ev.target.result}" class="w-full h-full object-cover" alt="preview">`;
      };
      reader.readAsDataURL(file);
    } else {
      thumbEl.innerHTML =
        '<div class="w-full h-full flex items-center justify-center"><i class="fas fa-file-medical text-3xl text-[#2b4f6e]"></i></div>';
    }
  });

  removeBtn?.addEventListener("click", () => {
    fileInput.value = "";
    previewArea.classList.add("hidden");
  });
  // Price calculation
  document.addEventListener('DOMContentLoaded', function() {
    const radios = document.querySelectorAll('input[name="service"]');
    const planNameEl = document.getElementById('plan_name');
    const basePriceEl = document.getElementById('basePrice');
    const discountEl = document.getElementById('discount');
    const taxEl = document.getElementById('tax');
    const totalEl = document.getElementById('totalPrice');

    // You can change these anytime
    // const DISCOUNT_PERCENT = 10;
    // const TAX_PERCENT = 5;
    const DISCOUNT_PERCENT = 0;
    const TAX_PERCENT = 0;


    function formatPlanName(value) {
      switch (value) {
        case 'single':
          return 'Single Day';
        case 'triple':
          return 'Triple Days';
        case 'seven_days':
          return 'Seven Days';
        default:
          return value;
      }
    }

    function updateSummary() {
      const selected = document.querySelector('input[name="service"]:checked');
      if (!selected) return;

      const basePrice = parseFloat(selected.dataset.price) || 0;

      const discount = (basePrice * DISCOUNT_PERCENT) / 100;
      const tax = (basePrice * TAX_PERCENT) / 100;
      const total = basePrice - discount + tax;

      // Update UI
      planNameEl.textContent = formatPlanName(selected.value);
      basePriceEl.textContent = basePrice.toFixed(2);
      discountEl.textContent = discount.toFixed(2);
      taxEl.textContent = tax.toFixed(2);
      totalEl.textContent = total.toFixed(2);
    }

    // Listen for changes
    radios.forEach(radio => {
      radio.addEventListener('change', updateSummary);
    });

    // Initial load
    updateSummary();
  });

  // ===============================================================

  (function() {
    // ---------- Collapsible functionality ----------
    const toggleBtn = document.getElementById('toggleServicesBtn');
    const servicesContainer = document.getElementById('servicesContainer');
    const toggleIcon = document.getElementById('toggleIcon');

    // Initially open (you can change to false if you want closed by default)
    let isOpen = true;

    function toggleSection() {
      if (isOpen) {
        // Collapse
        servicesContainer.style.display = 'none';
        toggleIcon.textContent = '+';
      } else {
        // Expand
        servicesContainer.style.display = 'block';
        toggleIcon.textContent = '−';
      }
      isOpen = !isOpen;
    }

    if (toggleBtn) {
      toggleBtn.addEventListener('click', toggleSection);
    }

    // ---------- Radio change handling (optional: update global price) ----------
    const radioButtons = document.querySelectorAll('input[name="service"]');

    function handleServiceChange(event) {
      const selectedRadio = event.target;
      const price = selectedRadio.getAttribute('data-price');
      // You can update a separate total price element here
      // For example: document.getElementById('totalPrice').innerText = price;
      console.log(`Selected service: ${selectedRadio.value}, Price: ${price}`);

      // Optional: remove previous active styles and add to the parent label
      // The CSS `has-[:checked]` already handles styling, but we can also trigger a custom event
    }

    radioButtons.forEach(radio => {
      radio.addEventListener('change', handleServiceChange);
    });

    // If you need to trigger the initial selected price (the one with 'checked')
    const checkedRadio = document.querySelector('input[name="service"]:checked');
    if (checkedRadio) {
      // Optionally call handler
      handleServiceChange({
        target: checkedRadio
      });
    }
  })();

  // ===========================================================================
  // Pure JavaScript toggle for Patient Information section
  (function() {
    const toggleBtn = document.getElementById('togglePatientInfoBtn');
    const container = document.getElementById('patientInfoContainer');
    const iconSpan = document.getElementById('patientInfoIcon');

    let isOpen = true; // initially open (since it's visible)

    function toggleSection() {
      if (isOpen) {
        // Close
        container.style.display = 'none';
        iconSpan.textContent = '+';
        toggleBtn.setAttribute('aria-expanded', 'false');
      } else {
        // Open
        container.style.display = 'block';
        iconSpan.textContent = '−';
        toggleBtn.setAttribute('aria-expanded', 'true');
      }
      isOpen = !isOpen;
    }

    if (toggleBtn) {
      toggleBtn.addEventListener('click', toggleSection);
    }

    // Optional: If you prefer the section to be hidden by default, set isOpen = false and call toggleSection() once after page load.
  })();


  // ===========================================================================
  // Pure JavaScript toggle for Patient Information section
  (function() {
    const toggleBtn = document.getElementById('togglePrescriptionBtn');
    const container = document.getElementById('prescriptionContainer');
    const iconSpan = document.getElementById('prescriptionIcon');

    let isOpen = true; // initially open (since it's visible)

    function toggleSection() {
      if (isOpen) {
        // Close
        container.style.display = 'none';
        iconSpan.textContent = '+';
        toggleBtn.setAttribute('aria-expanded', 'false');
      } else {
        // Open
        container.style.display = 'block';
        iconSpan.textContent = '−';
        toggleBtn.setAttribute('aria-expanded', 'true');
      }
      isOpen = !isOpen;
    }

    if (toggleBtn) {
      toggleBtn.addEventListener('click', toggleSection);
    }

    // Optional: If you prefer the section to be hidden by default, set isOpen = false and call toggleSection() once after page load.
  })();
</script>
@endpush