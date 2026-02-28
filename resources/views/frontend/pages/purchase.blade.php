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
                <span class="bn-only block text-rose-700">ব্রাহ্মণবাড়িয়া পৌরসভা</span>
            </p>
        </div>
      </div>

      <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-8 pt-12">
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

      <!-- Review Section - Fully Responsive -->
    </main>
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