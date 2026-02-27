@extends('frontend.layouts.app')

@section('title')
    Oreder
@endsection

@section('content')
    <main class="bg-[#F7FAFC] min-h-screen py-10 px-4">
      <div class="text-center mb-8 sm:mb-12">
        <h1
          class="text-2xl sm:text-3xl md:text-4xl font-bold blue-primary mb-3"
        >
          Book Home Nursing Care
        </h1>
        <p class="text-base sm:text-lg text-gray-600 max-w-3xl mx-auto">
          Professional, compassionate care at your doorstep — exclusively in
          <strong class="text-rose-700">ব্রাহ্মণবাড়িয়া পৌরসভা</strong>
        </p>
      </div>

      <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- LEFT: FORM -->
        <div class="lg:col-span-2 space-y-6">
          <!-- Patient Info -->
          <div class="bg-white rounded-2xl shadow-sm border p-6">
            <h2 class="text-xl font-bold text-[#1A3B4F] mb-5">
              Patient Information
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 sm:gap-6">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5"
                  >Full Name <span class="text-red-600">*</span></label
                >
                <input
                  type="text"
                  required
                  class="w-full border border-gray-300 rounded-lg px-4 py-2 text-base focus:border-[var(--primary)]"
                  placeholder="Patient full name"
                />
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5"
                  >Phone Number <span class="text-red-600">*</span></label
                >
                <input
                  type="tel"
                  required
                  class="w-full border border-gray-300 rounded-lg px-4 py-2 text-base focus:border-[var(--primary)]"
                  placeholder="+880 1X XXX XXXX"
                />
              </div>

              <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1.5"
                  >Full Address <span class="text-red-600">*</span></label
                >
                <textarea
                  required
                  rows="2"
                  class="w-full border border-gray-300 rounded-lg px-4 py-2 text-base focus:border-[var(--primary)]"
                  placeholder="House no, road, area, Brahmanbaria"
                ></textarea>
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5"
                  >Preferred Date</label
                >
                <input
                  type="date"
                  class="w-full border border-gray-300 rounded-lg px-4 py-2 text-base focus:border-[var(--primary)]"
                />
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5"
                  >Preferred Time</label
                >
                <select
                  class="w-full border border-gray-300 rounded-lg px-4 py-2 text-base focus:border-[var(--primary)]"
                >
                  <option>Morning (8 AM – 12 PM)</option>
                  <option>Afternoon (12 PM – 4 PM)</option>
                  <option>Evening (4 PM – 8 PM)</option>
                </select>
              </div>
            </div>
          </div>

          <!-- Upload + Note -->
          <!-- Upload + Preview -->
          <div class="bg-white rounded-2xl shadow-sm border p-6 space-y-5">
            <h2 class="text-xl font-bold text-[#1A3B4F]">
              Prescription / Instructions
            </h2>

            <!-- Upload Area -->
            <label
              class="flex flex-col items-center justify-center border-2 border-dashed border-[#B8D9F5] rounded-xl p-3 cursor-pointer hover:bg-[#F7FBFF] transition text-center"
            >
              <i
                class="fas fa-cloud-upload-alt text-3xl text-[#2B4F6E] mb-2"
              ></i>
              <span class="text-sm text-gray-500">
                Upload prescription or medical file
              </span>

              <input
                id="fileInput"
                type="file"
                class="hidden"
                accept="image/*,.pdf,.doc,.docx"
              />
            </label>

            <!-- Preview -->
            <div
              id="filePreview"
              class="hidden border rounded-xl p-4 flex items-center gap-4"
            >
              <!-- Image/File preview -->
              <div
                id="previewMedia"
                class="w-16 h-10 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center"
              >
                <!-- image OR icon -->
              </div>

              <!-- File info -->
              <div class="flex-1">
                <p
                  id="fileName"
                  class="text-sm font-medium text-[#1A3B4F] truncate"
                ></p>
                <p class="text-xs text-gray-400">Selected file</p>
              </div>

              <!-- Remove -->
              <button
                id="removeFile"
                class="text-red-500 hover:text-red-700 text-sm font-semibold"
              >
                Remove
              </button>
            </div>

            <!-- Note -->
            <textarea
              rows="2"
              placeholder="Additional notes for nurse (optional)"
              class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#B8D9F5] outline-none"
            ></textarea>
          </div>
        </div>

        <!-- RIGHT: ORDER SUMMARY -->
        <div class="lg:col-span-1">
          <div class="bg-white rounded-2xl shadow-lg border p-6 sticky top-24">
            <h2 class="text-xl font-bold text-[#1A3B4F] mb-5">Order Summary</h2>

            <!-- Service -->
            <div class="flex items-center justify-between mb-3">
              <span class="text-gray-600">Service</span>
              <span class="font-semibold text-[#2B4F6E]">IV Injection</span>
            </div>

            <!-- Plan -->
            <div class="flex items-center justify-between mb-3">
              <span class="text-gray-600">Plan</span>
              <span class="font-semibold">Single Visit</span>
            </div>

            <!-- Price -->
            <div class="flex items-center justify-between mb-3">
              <span class="text-gray-600">Price</span>
              <span class="font-semibold">৳350</span>
            </div>

            <!-- Discount -->
            <div class="flex items-center justify-between mb-3">
              <span class="text-gray-600">Discount</span>
              <span class="text-green-600 font-semibold">−৳50</span>
            </div>

            <hr class="my-4" />

            <!-- Total -->
            <div class="flex items-center justify-between text-lg font-bold">
              <span>Total</span>
              <span class="text-[#C63E5A]">৳300</span>
            </div>

            <!-- Button -->
            <!-- <button
              class="w-full mt-6 bg-[#2B4F6E] text-white py-3 rounded-xl font-semibold hover:bg-[#1A3B4F] transition"
            >
              Confirm Order
            </button> -->
            <a
  href="{{ route('order') }}"
  class="w-full mt-6 bg-[#2B4F6E] text-white py-3 rounded-xl font-semibold hover:bg-[#1A3B4F] transition inline-block text-center no-underline"
>
  Confirm Order
</a>

             <!-- <a
              href="{{route('order')}}"
              type="submit"
              class="w-full mt-6 bg-[#2B4F6E] text-white py-3 rounded-xl font-semibold hover:bg-[#1A3B4F] transition"
            >
              Confirm Order
            </a> -->

            <p class="text-xs text-gray-400 mt-3 text-center">
              Nurse will contact you after confirmation
            </p>
          </div>
        </div>
      </div>
    </main>
@endsection