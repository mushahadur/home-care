@extends('frontend.layouts.app')

@section('title')
    Home
@endsection

@section('content')
    
  <!-- Hero Section -->
  <section
    class="relative sm:py-3 md:py-6 lg:py-16 xl:py-20 flex items-center bg-gradient-to-br from-white to-[#E6F2FC] overflow-hidden">
    <div class="container mx-auto px-6 lg:px-12 py-16 lg:py-0">
      <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
        <!-- LEFT – Text Content -->

        <div
          class="flex-1 text-center max-w-xl order-2 lg:order-1 text-center lg:text-left">
          <!-- bilingual headline: Bangla & English -->
          <p class="text-2xl md:text-3xl font-medium text-[#2B4F6E] mb-2">
            নির্ভরযোগ্য হোম কেয়ার
          </p>
          <h1
            class="text-4xl md:text-5xl font-bold text-[#1A3B4F] leading-tight">
            <span class="text-[#C63E5A]">Reliable</span> Home Care
          </h1>
          <p class="text-lg text-gray-600 mt-4 max-w-lg mx-auto md:mx-0">
            professional nursing, right in the comfort of your home —
            Brahmanbaria’s trusted choice.
          </p>
          <!-- CTA buttons (soft blue & pink) -->
          <div
            class="flex flex-wrap gap-4 mt-8 justify-center md:justify-start">
            <a
              href="#"
              class="bg-[#2B4F6E] text-white px-7 py-3 rounded-full shadow-md hover:bg-[#1f3a50] transition">আজই যোগাযোগ করুন</a>
            <a
              href="#"
              class="bg-white border border-[#B8D9F5] text-[#2B4F6E] px-7 py-3 rounded-full shadow-sm hover:border-[#F9B0B0] hover:bg-[#FCE4E4] transition">See services</a>
          </div>
        </div>

        <!-- RIGHT – Slider -->
        <div
          class="relative order-1 lg:order-2 rounded-2xl overflow-hidden shadow-2xl shadow-indigo-200/30 bg-gray-900 aspect-[4/5] lg:aspect-auto lg:h-[620px]">
          <!-- Slides -->
          <div id="slider" class="relative w-full h-full">
            <!-- Slide 1 -->
            <div class="slide absolute inset-0 active">
              <img
                src="https://images.unsplash.com/photo-1584515933487-779824d29309"
                alt="Product 1"
                class="w-full h-full object-cover" />
              <div class="slider-overlay absolute inset-0"></div>
            </div>

            <!-- Slide 2 -->
            <div class="slide absolute inset-0">
              <img
                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTyDWiXIIXuAstBF0vfU2kbBDEorRAmmm-kB1vhP0VereFDEG1h6dyQVWENSiw4gwk_KNJof-_VyT6IqIUn7Cnqn3ou0BFHpMSlFEEQ0qg&s=10"
                alt="Product 2"
                class="w-full h-full object-cover" />
              <div class="slider-overlay absolute inset-0"></div>
            </div>

            <!-- Slide 3 -->
            <div class="slide absolute inset-0">
              <img
                src="https://doctorshomecarebd.com/wp-content/uploads/2024/09/White-and-Blue-Illustrative-Senior-Home-Care-Health-and-Wellness-Service-Instagram-Post-1587-x-1000-px.png.webp"
                alt="Product 3"
                class="w-full h-full object-cover" />
              <div class="slider-overlay absolute inset-0"></div>
            </div>
          </div>

          <!-- Dots (bottom center) -->
          <div
            id="dots"
            class="absolute bottom-6 left-1/2 -translate-x-1/2 flex gap-3 z-10">
            <!-- Created by JS -->
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- container mx-auto px-6 lg:px-12 py-16 lg:py-0 -->
  <!-- SERVICE GRID: interactive cards (single & 7‑day pricing) -->
  <section
    id="service"
    class="flex items-center bg-gradient-to-br from-white to-[#e4f6d1] overflow-hidden">
    <div class="container mx-auto px-6 lg:px-12 py-16 lg:py-10">
      <div class="text-center mb-12">
        <span class="text-[#C63E5A] font-semibold tracking-wider text-sm">PROFESSIONAL SERVICES</span>
        <h2 class="text-3xl md:text-4xl font-bold text-[#1A3B4F] mt-2">
          Home nursing, <span class="text-[#2B4F6E]">on your terms</span>
        </h2>
        <p class="text-gray-500 max-w-2xl mx-auto mt-3">
          choose a single visit or a full week — transparent pricing, no
          surprises.
        </p>
      </div>

      <!-- responsive grid: interactive cards (hover scale + shadow) -->
      <div class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-2 gap-5">
        <!-- service 1: IV Injection -->
        <!-- Service Card: Left Image Layout -->
        <div
          class="bg-white border border-soft-blue rounded-2xl shadow-sm card-hover overflow-hidden flex flex-col md:flex-row cursor-pointer transition">
          <!-- Left Image -->
          <div class="md:w-48 w-full h-40 md:h-auto">
            <img
              src="https://images.unsplash.com/photo-1584515933487-779824d29309"
              alt="IV Injection"
              class="w-full h-full object-cover" />
          </div>

          <!-- Right Content -->
          <div class="flex-1 p-5 flex flex-col justify-between">
            <!-- Title -->
            <h3 class="font-bold text-[#1A3B4F] text-lg">
              Redesigned Service Card mage Layout
            </h3>

            <!-- Prices Row -->
            <div class="flex flex-wrap items-center gap-4 mt-3">
              <!-- Single -->
              <div class="flex items-center gap-2">
                <span
                  class="bg-[#FCE4E4] text-[#C63E5A] px-3 py-1 rounded-full text-xs font-semibold">
                  Single
                </span>
                <span class="text-[#2B4F6E] font-bold">৳350</span>
              </div>

              <!-- 7 Day -->
              <div class="flex items-center gap-2">
                <span
                  class="bg-[#E6F2FC] text-[#1A3B4F] px-3 py-1 rounded-full text-xs font-semibold border border-[#B8D9F5]">
                  7-Day
                </span>
                <span class="text-[#2B4F6E] font-bold">৳2100</span>
              </div>
            </div>

            <!-- Description -->
            <p class="text-sm text-gray-700 mt-3">
              পিপল হোম কেয়ার লিমিটেড একটি সেবা মূলক প্রতিষ্ঠান। আমরা
              বাসাবাড়িতে নার্সিং সার্ভিস, হোম কেয়ার সার্ভিস, ফিজিওথেরাপি
              সার্ভিস, ইলডারলি কেয়ার সার্ভিস সহ যেকোন স্ব্যাথ্য সেবা দিয়ে থাকি
              এবং সকল ধরনের মেডিকেল সরঞ্জাম ভাড়া দেয়া কিংবা বিক্রয় করে থাকি।
            </p>

            <!-- Button -->
            <a
               href="{{route('purchase')}}"
              type="submit"
              class="mt-4 bg-[#1A3B4F] text-white px-5 py-2 rounded-lg text-sm hover:bg-[#163344] w-full md:w-fit text-center no-underline">
              Order Service
            </a>
          </div>
        </div>

        <!-- Service Card: Left Image Layout -->
        <div
          class="bg-white border border-soft-blue rounded-2xl shadow-sm card-hover overflow-hidden flex flex-col md:flex-row cursor-pointer transition">
          <!-- Left Image -->
          <div class="md:w-48 w-full h-40 md:h-auto">
            <img
              src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR9aRFjXOVjIkog40iAbKuzK0VmhciccBqqtg&s"
              alt="IV Injection"
              class="w-full h-full object-cover" />
          </div>

          <!-- Right Content -->
          <div class="flex-1 p-5 flex flex-col justify-between">
            <!-- Title -->
            <h3 class="font-bold text-[#1A3B4F] text-lg">
              Redesigned Service Card mage Layout
            </h3>

            <!-- Prices Row -->
            <div class="flex flex-wrap items-center gap-20 mt-3">
              <!-- Single -->
              <div class="flex items-center gap-2">
                <span
                  class="bg-[#FCE4E4] text-[#C63E5A] px-3 py-1 rounded-full text-xs font-semibold">
                  Single
                </span>
                <span class="text-[#2B4F6E] font-bold">৳350</span>
              </div>

              <!-- 7 Day -->
              <div class="flex items-center gap-2">
                <span
                  class="bg-[#E6F2FC] text-[#1A3B4F] px-3 py-1 rounded-full text-xs font-semibold border border-[#B8D9F5]">
                  7-Day
                </span>
                <span class="text-[#2B4F6E] font-bold">৳2100</span>
              </div>
            </div>

            <!-- Description -->
            <p class="text-sm text-gray-700 mt-3">
              পিপল হোম কেয়ার লিমিটেড একটি সেবা মূলক প্রতিষ্ঠান। আমরা
              বাসাবাড়িতে নার্সিং সার্ভিস, হোম কেয়ার সার্ভিস, ফিজিওথেরাপি
              সার্ভিস, ইলডারলি কেয়ার সার্ভিস সহ যেকোন স্ব্যাথ্য সেবা দিয়ে
              থাকি এবং সকল ধরনের মেডিকেল সরঞ্জাম ভাড়া দেয়া কিংবা বিক্রয় করে
              থাকি।
            </p>

            <!-- Button -->
             <a
               href="{{route('purchase')}}"
              type="submit"
              class="mt-4 bg-[#1A3B4F] text-white px-5 py-2 rounded-lg text-sm hover:bg-[#163344] w-full md:w-fit text-center no-underline">
              Order Service
            </a>
          </div>
        </div>

        <!-- Service Card: Left Image Layout -->
        <div
          class="bg-white border border-soft-blue rounded-2xl shadow-sm card-hover overflow-hidden flex flex-col md:flex-row cursor-pointer transition">
          <!-- Left Image -->
          <div class="md:w-48 w-full h-40 md:h-auto">
            <img
              src="https://c-care.ca/wp-content/uploads/2019/04/5-important-benefits-of-homecare.jpg"
              alt="IV Injection"
              class="w-full h-full object-cover" />
          </div>

          <!-- Right Content -->
          <div class="flex-1 p-5 flex flex-col justify-between">
            <!-- Title -->
            <h3 class="font-bold text-[#1A3B4F] text-lg">
              Redesigned Service Card mage Layout
            </h3>

            <!-- Prices Row -->
            <div class="flex flex-wrap items-center gap-20 mt-3">
              <!-- Single -->
              <div class="flex items-center gap-2">
                <span
                  class="bg-[#FCE4E4] text-[#C63E5A] px-3 py-1 rounded-full text-xs font-semibold">
                  Single
                </span>
                <span class="text-[#2B4F6E] font-bold">৳350</span>
              </div>

              <!-- 7 Day -->
              <div class="flex items-center gap-2">
                <span
                  class="bg-[#E6F2FC] text-[#1A3B4F] px-3 py-1 rounded-full text-xs font-semibold border border-[#B8D9F5]">
                  7-Day
                </span>
                <span class="text-[#2B4F6E] font-bold">৳2100</span>
              </div>
            </div>

            <!-- Description -->
            <p class="text-sm text-gray-700 mt-3">
              পিপল হোম কেয়ার লিমিটেড একটি সেবা মূলক প্রতিষ্ঠান। আমরা
              বাসাবাড়িতে নার্সিং সার্ভিস, হোম কেয়ার সার্ভিস, ফিজিওথেরাপি
              সার্ভিস, ইলডারলি কেয়ার সার্ভিস সহ যেকোন স্ব্যাথ্য সেবা দিয়ে
              থাকি এবং সকল ধরনের মেডিকেল সরঞ্জাম ভাড়া দেয়া কিংবা বিক্রয় করে
              थাকি।
            </p>

            <!-- Button -->
            <a
               href="{{route('purchase')}}"
              type="submit"
              class="mt-4 bg-[#1A3B4F] text-white px-5 py-2 rounded-lg text-sm hover:bg-[#163344] w-full md:w-fit text-center no-underline">
              Order Service
            </a>
          </div>
        </div>

        <!-- Service Card: Left Image Layout -->
        <div
          class="bg-white border border-soft-blue rounded-2xl shadow-sm card-hover overflow-hidden flex flex-col md:flex-row cursor-pointer transition">
          <!-- Left Image -->
          <div class="md:w-48 w-full h-40 md:h-auto">
            <img
              src="https://doctorshomecarebd.com/wp-content/uploads/2024/09/White-and-Blue-Illustrative-Senior-Home-Care-Health-and-Wellness-Service-Instagram-Post-1587-x-1000-px.png.webp"
              alt="IV Injection"
              class="w-full h-full object-cover" />
          </div>

          <!-- Right Content -->
          <div class="flex-1 p-5 flex flex-col justify-between">
            <!-- Title -->
            <h3 class="font-bold text-[#1A3B4F] text-lg">
              Redesigned Service Card mage Layout
            </h3>

            <!-- Prices Row -->
            <div class="flex flex-wrap items-center gap-20 mt-3">
              <!-- Single -->
              <div class="flex items-center gap-2">
                <span
                  class="bg-[#FCE4E4] text-[#C63E5A] px-3 py-1 rounded-full text-xs font-semibold">
                  Single
                </span>
                <span class="text-[#2B4F6E] font-bold">৳350</span>
              </div>

              <!-- 7 Day -->
              <div class="flex items-center gap-2">
                <span
                  class="bg-[#E6F2FC] text-[#1A3B4F] px-3 py-1 rounded-full text-xs font-semibold border border-[#B8D9F5]">
                  7-Day
                </span>
                <span class="text-[#2B4F6E] font-bold">৳2100</span>
              </div>
            </div>

            <!-- Description -->
            <p class="text-sm text-gray-700 mt-3">
              পিপল হোম কেয়ার লিমিটেড একটি সেবা মূলক প্রতিষ্ঠান। আমরা
              বাসাবাড়িতে নার্সিং সার্ভিস, হোম কেয়ার সার্ভিস, ফিজিওথেরাপি
              সার্ভিস, ইলডারলি কেয়ার সার্ভিস সহ যেকোন স্ব্যাথ্য সেবা দিয়ে
              থাকি এবং সকল ধরনের মেডিকেল সরঞ্জাম ভাড়া দেয়া কিংবা বিক্রয় করে
              थাকি।
            </p>

            <!-- Button -->
             <a
               href="{{route('purchase')}}"
              type="submit"
              class="mt-4 bg-[#1A3B4F] text-white px-5 py-2 rounded-lg text-sm hover:bg-[#163344] w-full md:w-fit text-center no-underline">
              Order Service
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- IMPORTANT NOTE (prominent, high‑visibility requirement) -->
  <section class="max-w-5xl mx-auto px-6 my-14">
    <div
      class="required-badge bg-[#FCE4E4] border-l-[10px] border-[#F9B0B0] rounded-r-2xl p-7 shadow-md flex flex-col md:flex-row items-start md:items-center gap-6">
      <div class="bg-white p-4 rounded-full shadow-sm">
        <i class="fas fa-exclamation-triangle text-4xl text-[#C63E5A]"></i>
      </div>
      <div class="flex-1">
        <h3 class="text-2xl font-bold text-[#1A3B4F] flex items-center gap-2">
          <span class="bg-[#F9B0B0] w-4 h-4 rounded-full inline-block"></span>
          গুরুত্বপূর্ণ নির্দেশনা / Important Notice
        </h3>
        <p class="text-lg font-medium text-[#2B4F6E] mt-2">
          <span class="bg-white/60 px-2 py-1 rounded">📄 ডাক্তারের প্রেসক্রিপশন বাধ্যতামূলক</span>
          —
          <span class="bg-white/60 px-2 py-1 rounded">✍️ signed consent mandatory</span>
        </p>
        <p class="text-[#C63E5A] font-semibold mt-1 text-base">
          A valid doctor’s prescription and signed patient consent are
          required before any service.
        </p>
        <div class="flex gap-3 mt-3 text-sm text-gray-600 flex-wrap">
          <span class="bg-white px-4 py-1 rounded-full shadow-sm"><i class="far fa-file-pdf text-[#C63E5A] mr-1"></i> prescription
            upload</span>
          <span class="bg-white px-4 py-1 rounded-full shadow-sm"><i class="far fa-check-circle text-[#2B4F6E] mr-1"></i> consent
            form</span>
        </div>
      </div>
    </div>
  </section>

  <!-- ABOUT SECTION -->
  <section id="about" class="flex items-center bg-gray-100">
    <div class="container mx-auto px-6 lg:px-12 py-16 lg:py-10">
      <div class="space-y-12">
        <!-- ROW 1: Image + About -->
        <div class="grid md:grid-cols-2 gap-8 items-center">
          <!-- Image -->
          <div class="rounded-2xl overflow-hidden shadow-md">
            <img
              src="https://kiwialiwarga.com/wp-content/uploads/2021/02/layanan-layanan-yang-disediakan-medical-home-care.jpg"
              alt="Home nursing care"
              class="w-full h-full object-cover" />
          </div>

          <!-- About Text -->
          <div>
            <h2 class="text-2xl md:text-3xl font-bold text-[#1A3B4F]">
              About Nurse Next Door
            </h2>

            <p class="mt-4 text-slate-800 leading-relaxed">
              Nurse Next Door প্রবীণ, অসুস্থতা থেকে সেরে ওঠা এবং দীর্ঘমেয়াদি
              রোগে আক্রান্ত রোগীদের জন্য সহানুভূতিশীল, নির্ভরযোগ্য ও পেশাদার
              মানের ঘরে বসেই নার্সিং সেবা প্রদান করে। আমাদের প্রশিক্ষিত ও
              অভিজ্ঞ নার্সরা রোগীর বাড়িতেই নিরাপদভাবে চিকিৎসা সহায়তা পৌঁছে
              দেন, যাতে রোগী তার পরিচিত পরিবেশে স্বাচ্ছন্দ্য, মর্যাদা ও
              ব্যক্তিগত যত্নের সাথে সেবা পেতে পারেন। আমরা বিশ্বাস করি, সুস্থতা
              ও আরোগ্যের জন্য নিজের ঘরের পরিচিত পরিবেশ সবচেয়ে সহায়ক। তাই
              আমাদের সেবায় অন্তর্ভুক্ত রয়েছে চিকিৎসকের পরামর্শ অনুযায়ী ওষুধ
              প্রয়োগ, ইনজেকশন ও স্যালাইন প্রদান, ক্ষত ও ড্রেসিং পরিচর্যা,
              ভিটাল সাইন পর্যবেক্ষণ, অপারেশন-পরবর্তী সেবা, দীর্ঘমেয়াদি রোগীর
              নিয়মিত পরিচর্যা এবং চলাফেরা ও দৈনন্দিন কাজে সহায়তা। প্রতিটি
              সেবা জীবাণুমুক্ত (স্টেরাইল) পদ্ধতি অনুসরণ করে এবং আন্তর্জাতিক
              মানের নিরাপত্তা নীতিমালা মেনে প্রদান করা হয়।
            </p>

            <p class="mt-3 text-slate-800 leading-relaxed">
              আমরা জীবাণুমুক্ত (স্টেরাইল) চিকিৎসা পদ্ধতি, চিকিৎসকের নির্দেশনা
              অনুযায়ী সেবা এবং মানবিক যত্নকে সর্বোচ্চ গুরুত্ব দিয়ে থাকি।
              আমাদের লক্ষ্য হলো রোগীদের দ্রুত আরোগ্য লাভে সহায়তা করা এবং
              পরিবারকে নিশ্চিন্ত ও সহায়ক পরিবেশ প্রদান করা, যাতে তারা নিজেদের
              ঘরেই মানসম্মত চিকিৎসা ও সেবার অভিজ্ঞতা পান।
            </p>
          </div>
        </div>

        <!-- ROW 2: Mission + Vision -->
        <div class="grid md:grid-cols-2 gap-6">
          <!-- Mission -->
          <div class="bg-[#F8FBFF] border border-[#D9ECFF] rounded-2xl p-6">
            <div class="flex items-center gap-3">
              <span
                class="bg-[#E6F2FC] text-[#1A3B4F] px-4 py-1 rounded-full text-sm font-semibold border border-[#B8D9F5]">
                Mission
              </span>
            </div>

            <p class="mt-4 text-slate-800 leading-relaxed">
              আমাদের মিশন হলো রোগী, প্রবীণ ও দীর্ঘমেয়াদি অসুস্থতায় আক্রান্ত
              ব্যক্তিদের জন্য নিরাপদ, সহানুভূতিশীল এবং উচ্চমানের ঘরে বসে
              নার্সিং সেবা প্রদান করা, যাতে তারা নিজেদের বাড়ির স্বাচ্ছন্দ্য ও
              পরিচিত পরিবেশে থেকেই প্রয়োজনীয় চিকিৎসা ও পরিচর্যা লাভ করতে
              পারেন। প্রবীণদের সুস্থতা, পুনর্বাসন-পরবর্তী পরিচর্যা এবং
              দীর্ঘমেয়াদি চিকিৎসা সহায়তার ক্ষেত্রে পরিবারকে সহায়ক ও
              নির্ভরযোগ্য অংশীদার হিসেবে পাশে থাকা আমাদের অঙ্গীকার। আমরা এমন
              একটি মানবিক ও সম্মানজনক সেবার পরিবেশ গড়ে তুলতে চাই, যেখানে
              প্রতিটি রোগী মর্যাদা, নিরাপত্তা ও আস্থার সাথে চিকিৎসা সেবা গ্রহণ
              করতে পারেন।
            </p>
          </div>

          <!-- Vision -->
          <div class="bg-[#FFF7F9] border border-[#FFD6E0] rounded-2xl p-6">
            <div class="flex items-center gap-3">
              <span
                class="bg-[#FCE4E4] text-[#C63E5A] px-4 py-1 rounded-full text-sm font-semibold">
                Vision
              </span>
            </div>

            <p class="mt-4 text-slate-800 leading-relaxed">
              আমাদের ভিশন হলো ঘরে বসে নার্সিং সেবার ক্ষেত্রে একটি বিশ্বস্ত,
              মানবিক ও মানসম্মত সেবাপ্রতিষ্ঠান হিসেবে প্রতিষ্ঠিত হওয়া, যেখানে
              প্রতিটি রোগী ও প্রবীণ ব্যক্তি নিরাপদ, সম্মানজনক এবং
              ব্যক্তিকেন্দ্রিক পরিচর্যা লাভ করতে পারেন। আমরা এমন একটি
              সেবাব্যবস্থা গড়ে তুলতে চাই, যা হাসপাতাল-পরবর্তী সেবা,
              দীর্ঘমেয়াদি পরিচর্যা এবং প্রবীণদের সুস্থ জীবনযাপনকে ঘরের
              পরিবেশেই সহজলভ্য ও নির্ভরযোগ্য করে তোলে। আমরা ভবিষ্যতে এমন একটি
              সেবানেটওয়ার্ক গড়ে তুলতে প্রত্যাশী, যেখানে প্রতিটি প্রয়োজনীয়
              পরিবার সহজে প্রশিক্ষিত নার্সিং সহায়তা পাবে এবং ঘরেই নিরাপদ
              চিকিৎসা সেবার সুযোগ নিশ্চিত হবে।
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- TEAM GRID: professional nurses -->
  <section
    class="flex items-center bg-gradient-to-br from-white to-[#fffbfb] overflow-hidden">
    <div class="container mx-auto px-6 lg:px-12 py-16 lg:py-10">
      <div class="text-center mb-12">
        <span class="text-[#C63E5A] font-semibold tracking-wider text-sm">
          OUR NURSING TEAM
        </span>
        <h2 class="text-3xl md:text-4xl font-bold text-[#1A3B4F] mt-2">
          Skilled hands, <span class="text-[#2B4F6E]">caring hearts</span>
        </h2>
        <p class="text-gray-500 max-w-2xl mx-auto mt-3">
          Experienced and trained nurses delivering safe, compassionate, and
          professional care at your home.
        </p>
      </div>

      <!-- responsive grid -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Nurse Card -->
        <div
          class="bg-white border border-soft-blue rounded-2xl p-5 shadow-lg card-hover transition text-center">
          <!-- Photo -->
          <div
            class="w-32 h-32 mx-auto rounded-full overflow-hidden border-4 border-[#E6F2FC]">
            <img
              src="https://images.unsplash.com/photo-1582750433449-648ed127bb54"
              class="w-full h-full object-cover" />
          </div>

          <!-- Name -->
          <h3 class="font-bold text-[#1A3B4F] text-lg mt-4">Staff Nurse</h3>

          <!-- Role -->
          <p class="text-sm text-gray-500">Registered Nurse</p>

          <!-- Badges -->
          <div class="flex flex-wrap justify-center gap-2 mt-3">
            <span
              class="bg-[#E6F2FC] text-[#1A3B4F] px-3 py-1 rounded-full text-xs font-semibold border border-[#B8D9F5]">
              5+ yrs exp
            </span>
            <span
              class="bg-[#FCE4E4] text-[#C63E5A] px-3 py-1 rounded-full text-xs font-semibold">
              Injection
            </span>
          </div>

          <!-- Description -->
          <p class="text-xs text-gray-400 mt-3">
            IV, IM, dressing & home care specialist
          </p>
        </div>

        <!-- Nurse 2 -->
        <div
          class="bg-white border border-soft-blue rounded-2xl p-5 shadow-lg card-hover transition text-center">
          <div
            class="w-32 h-32 mx-auto rounded-full overflow-hidden border-4 border-[#E6F2FC]">
            <img
              src="https://images.unsplash.com/photo-1607746882042-944635dfe10e"
              class="w-full h-full object-cover" />
          </div>
          <h3 class="font-bold text-[#1A3B4F] text-lg mt-4">Senior Nurse</h3>
          <p class="text-sm text-gray-500">Clinical Nurse</p>
          <div class="flex flex-wrap justify-center gap-2 mt-3">
            <span
              class="bg-[#E6F2FC] text-[#1A3B4F] px-3 py-1 rounded-full text-xs font-semibold border border-[#B8D9F5]">
              8+ yrs exp
            </span>
            <span
              class="bg-[#FCE4E4] text-[#C63E5A] px-3 py-1 rounded-full text-xs font-semibold">
              Elderly care
            </span>
          </div>
          <p class="text-xs text-gray-400 mt-3">
            Post-operative & chronic care specialist
          </p>
        </div>

        <!-- Nurse 3 -->
        <div
          class="bg-white border border-soft-blue rounded-2xl p-5 shadow-lg card-hover transition text-center">
          <div
            class="w-32 h-32 mx-auto rounded-full overflow-hidden border-4 border-[#E6F2FC]">
            <img
              src="https://images.unsplash.com/photo-1594824476967-48c8b964273f"
              class="w-full h-full object-cover" />
          </div>
          <h3 class="font-bold text-[#1A3B4F] text-lg mt-4">Care Nurse</h3>
          <p class="text-sm text-gray-500">Home Care Nurse</p>
          <div class="flex flex-wrap justify-center gap-2 mt-3">
            <span
              class="bg-[#E6F2FC] text-[#1A3B4F] px-3 py-1 rounded-full text-xs font-semibold border border-[#B8D9F5]">
              6+ yrs exp
            </span>
            <span
              class="bg-[#FCE4E4] text-[#C63E5A] px-3 py-1 rounded-full text-xs font-semibold">
              Dressing
            </span>
          </div>
          <p class="text-xs text-gray-400 mt-3">
            Wound care & patient support specialist
          </p>
        </div>

        <!-- Nurse 4 -->
        <div
          class="bg-white border border-soft-blue rounded-2xl p-5 shadow-lg card-hover transition text-center">
          <div
            class="w-32 h-32 mx-auto rounded-full overflow-hidden border-4 border-[#E6F2FC]">
            <img
              src="https://images.unsplash.com/photo-1576765608535-5f04d1e3f289"
              class="w-full h-full object-cover" />
          </div>
          <h3 class="font-bold text-[#1A3B4F] text-lg mt-4">
            Visiting Nurse
          </h3>
          <p class="text-sm text-gray-500">Community Nurse</p>
          <div class="flex flex-wrap justify-center gap-2 mt-3">
            <span
              class="bg-[#E6F2FC] text-[#1A3B4F] px-3 py-1 rounded-full text-xs font-semibold border border-[#B8D9F5]">
              4+ yrs exp
            </span>
            <span
              class="bg-[#FCE4E4] text-[#C63E5A] px-3 py-1 rounded-full text-xs font-semibold">
              BP/RBS
            </span>
          </div>
          <p class="text-xs text-gray-400 mt-3">
            Monitoring & routine home visits
          </p>
        </div>
      </div>

      <p class="text-xs text-gray-400 mt-6 text-center">
        All nurses are trained, verified & registered · Home visits in
        Brahmanbaria municipality
      </p>
    </div>
  </section>

  <section
    class="flex items-center bg-gradient-to-br from-white to-[#c8ecff] overflow-hidden">
    <div class="container mx-auto px-6 lg:px-12 py-16 lg:py-10">
      <!-- Heading -->
      <div class="text-center mb-10">
        <h2 class="text-2xl md:text-3xl font-bold text-[#1A3B4F]">
          What Our Customers Say
        </h2>
        <p class="text-gray-500 text-sm mt-2">
          Real experiences from our satisfied patients
        </p>
      </div>

      <!-- Slider -->
      <div class="swiper reviewSwiper">
        <div class="swiper-wrapper">
          <!-- Review 1 -->
          <div class="swiper-slide">
            <div
              class="bg-white rounded-2xl p-6 shadow-sm border border-soft-blue h-full">
              <div class="flex items-center gap-4">
                <img
                  src="https://i.pravatar.cc/80?img=12"
                  class="w-12 h-12 rounded-full object-cover" />
                <div>
                  <h4 class="font-semibold text-[#1A3B4F]">Rahim Ahmed</h4>
                  <p class="text-xs text-gray-400">Dhaka</p>
                </div>
              </div>

              <p class="text-sm text-gray-600 mt-4 leading-relaxed">
                Excellent nursing service. The staff was very professional and
                caring. Highly recommended for home medical support.
              </p>

              <div class="flex text-yellow-400 mt-4">★★★★★</div>
            </div>
          </div>

          <!-- Review 1 -->
          <div class="swiper-slide">
            <div
              class="bg-white rounded-2xl p-6 shadow-sm border border-soft-blue h-full">
              <div class="flex items-center gap-4">
                <img
                  src="https://i.pravatar.cc/80?img=12"
                  class="w-12 h-12 rounded-full object-cover" />
                <div>
                  <h4 class="font-semibold text-[#1A3B4F]">Rahim Ahmed</h4>
                  <p class="text-xs text-gray-400">Dhaka</p>
                </div>
              </div>

              <p class="text-sm text-gray-600 mt-4 leading-relaxed">
                Excellent nursing service. The staff was very professional and
                caring. Highly recommended for home medical support.
              </p>

              <div class="flex text-yellow-400 mt-4">★★★★★</div>
            </div>
          </div>

          <!-- Review 1 -->
          <div class="swiper-slide">
            <div
              class="bg-white rounded-2xl p-6 shadow-sm border border-soft-blue h-full">
              <div class="flex items-center gap-4">
                <img
                  src="https://i.pravatar.cc/80?img=12"
                  class="w-12 h-12 rounded-full object-cover" />
                <div>
                  <h4 class="font-semibold text-[#1A3B4F]">Rahim Ahmed</h4>
                  <p class="text-xs text-gray-400">Dhaka</p>
                </div>
              </div>

              <p class="text-sm text-gray-600 mt-4 leading-relaxed">
                Excellent nursing service. The staff was very professional and
                caring. Highly recommended for home medical support.
              </p>

              <div class="flex text-yellow-400 mt-4">★★★★★</div>
            </div>
          </div>

          <!-- Review 2 -->
          <div class="swiper-slide">
            <div
              class="bg-white rounded-2xl p-6 shadow-sm border border-soft-blue h-full">
              <div class="flex items-center gap-4">
                <img
                  src="https://i.pravatar.cc/80?img=32"
                  class="w-12 h-12 rounded-full object-cover" />
                <div>
                  <h4 class="font-semibold text-[#1A3B4F]">Shamima Akter</h4>
                  <p class="text-xs text-gray-400">Gazipur</p>
                </div>
              </div>

              <p class="text-sm text-gray-600 mt-4 leading-relaxed">
                IV injection service was safe and hygienic. Nurse arrived on
                time and handled everything perfectly.
              </p>

              <div class="flex text-yellow-400 mt-4">★★★★★</div>
            </div>
          </div>

          <!-- Review 3 -->
          <div class="swiper-slide">
            <div
              class="bg-white rounded-2xl p-6 shadow-sm border border-soft-blue h-full">
              <div class="flex items-center gap-4">
                <img
                  src="https://i.pravatar.cc/80?img=45"
                  class="w-12 h-12 rounded-full object-cover" />
                <div>
                  <h4 class="font-semibold text-[#1A3B4F]">Kamal Hossain</h4>
                  <p class="text-xs text-gray-400">Narayanganj</p>
                </div>
              </div>

              <p class="text-sm text-gray-600 mt-4 leading-relaxed">
                Very reliable home care service. Are the Booking process was
                easy and support team was responsive.
              </p>

              <div class="flex text-yellow-400 mt-4">★★★★☆</div>
            </div>
          </div>
        </div>

        <!-- Pagination -->
        <div class="swiper-pagination mt-6"></div>
      </div>
    </div>
  </section>
@endsection