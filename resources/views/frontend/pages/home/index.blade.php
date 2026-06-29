@extends('frontend.layouts.app')

@section('title')
Home
@endsection

@section('content')

<!-- Hero Section -->
<section
  class="relative sm:py-3 md:py-6 lg:py-16 xl:py-20 flex items-center bg-gradient-to-br from-white to-[#E6F2FC] overflow-hidden">
  <div class="container mx-auto px-6 lg:px-12 py-6 md:py-6 lg:py-2 xl:py-2">
    <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
      <!-- LEFT – Text Content -->

      <div
        class="flex-1 text-center max-w-xl order-2 lg:order-1 text-center lg:text-left">
        <!-- bilingual headline: Bangla & English -->
        <p class="text-xl md:text-3xl lg:text-4xl xl:text-4xl font-medium text-[#2B4F6E] mb-2">{{ __('hero.subtitle') }}</p>
        <h1
          class="text-3xl md:text-5xl font-bold text-[#1A3B4F] leading-tight">
          <span class="text-[#C63E5A]">{{ __('hero.title_1') }}</span> {{ __('hero.title_2') }}
        </h1>
        <p class="text-md md:text-lg text-gray-600 mt-4 max-w-lg mx-auto md:mx-0">
          {{ __('hero.description_1') }} 
          {{ __('hero.description_2') }}
        </p>
        <!-- CTA buttons (soft blue & pink) -->
        <div class="flex flex-wrap gap-4 mt-8 justify-center md:justify-start items-center">
          <!-- Phone Group (Button and Number aligned) -->
          <div class="flex flex-col items-center md:items-start gap-1">
            <a href="tel:+8801812345678"
              class="bg-[#2B4F6E] text-white px-7 py-3 rounded-md shadow-md hover:bg-[#1f3a50] transition text-center">
              {{ __('hero.contact_btn') }}
            </a>
            <!-- <p class="text-sm text-center font-medium text-gray-600 px-1">+88 01812345678</p> -->
          </div>

          <!-- Services Button -->
          <a href="{{route('home')}}#service"
            class="bg-white border border-[#B8D9F5] text-[#2B4F6E] font-bold px-7 py-3 rounded-md shadow-sm hover:border-[#F9B0B0] hover:bg-[#FCE4E4] transition self-start">
            {{ __('hero.service_btn') }}
          </a>
        </div>
      </div>

      <!-- RIGHT – Slider -->
      <div
        class="relative order-1 lg:order-2 rounded-lg overflow-hidden shadow-2xl shadow-indigo-200/30 bg-gray-900 aspect-[4/5] lg:aspect-auto lg:h-[620px]">
        <!-- Slides -->
        <div id="slider" class="relative w-full h-full">
          <!-- Slide 1 -->
          <div class="slide absolute inset-0 active">
            <img
              src="{{asset('assets/frontend/images/sliders/s1.jpeg')}}"
              alt="Product 1"
              class="w-full h-full object-cover" />
            <div class="slider-overlay absolute inset-0"></div>
          </div>

          <!-- Slide 2 -->
          <div class="slide absolute inset-0">
            <img
              src="{{asset('assets/frontend/images/sliders/s2.webp')}}"
              alt="Product 2"
              class="w-full h-full object-cover" />
            <div class="slider-overlay absolute inset-0"></div>
          </div>

          <!-- Slide 3 -->
          <div class="slide absolute inset-0">
            <img
              src="{{asset('assets/frontend/images/sliders/s3.webp')}}"
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
  <div class="container mx-auto px-6 lg:px-12 py-6 md:py-10 lg:py-10 xl:py-10">
    <div class="text-center mb-12">
      <span class="text-[#C63E5A] font-semibold tracking-wider text-sm">{{ __('service.subtitle') }}</span>
      <h2 class="text-2xl md:text-4xl font-bold text-[#1A3B4F] mt-2">
        {{ __('service.title') }}
      </h2>
      <p class="text-xs md:text-lg lg:text-lg xl:text-lg text-gray-500 max-w-2xl mx-auto mt-3 ">
        {{ __('service.description') }}
      </p>
    </div>

    <!-- responsive grid: interactive cards (hover scale + shadow) -->
    <div class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-2 gap-5">

      <!-- Service Card: Left Image Layout -->
      @foreach ($careServices as $careService)
      <div
        class="bg-white border border-soft-blue rounded-lg shadow-sm card-hover overflow-hidden flex flex-col md:flex-row cursor-pointer transition">
        <!-- Left Image -->
        <div class="md:w-48 w-full h-40 md:h-auto">
          @if($careService->care_services_image)
          <img src="{{ asset($careService->care_services_image) }}"
            alt="{{ $careService->care_services_name }}"
            class="w-full h-full object-cover" />
          @else
          <img src="https://placehold.co/600x400@2x.png?text=No+Image"
            alt="{{ $careService->care_services_name }}"
            class="w-full h-full" />
          @endif
        </div>

        <!-- Right Content -->
        <div class="flex-1 p-5 flex flex-col justify-between">
          <!-- Title -->
          <h3 class="font-bold text-[#1A3B4F] text-lg">
            {{ $careService->care_services_name }}
          </h3>

          <!-- Prices Row - Modern Pill Design -->
          <div class="flex flex-wrap items-center gap-2 mt-3">
            <!-- Single -->
            <div class="bg-[#FCE4E4] px-3 py-1 rounded-full font-semibold">
              <span class="text-xs font-medium text-gray-700"> {{ __('service.single') }}</span>
              <span class="text-xs font-bold text-rose-700">৳{{ $careService->single_services_price }}</span>
            </div>

            <!-- 3 Day -->
            <div class="bg-[#E6F2FC] px-3 py-1 rounded-full font-semibold">
              <span class="text-xs font-medium text-gray-700"> {{ __('service.three') }}</span>
              <span class="text-xs font-bold text-blue-700">৳{{ $careService->triple_services_price }}</span>
            </div>

            <!-- 7 Day -->
            <div class="bg-[#e0fff6] px-3 py-1 rounded-full font-semibold">
              <span class="text-xs font-medium text-gray-700"> {{ __('service.seven') }}</span>
              <span class="text-xs font-bold text-cyan-600">৳{{ $careService->seven_services_price }}</span>
            </div>
          </div>

          <!-- Description -->
          <p class="text-sm text-gray-700 mt-3 text-justify">
            {{ Str::limit($careService->care_services_description, 298, '...') }}
          </p>

          <!-- Original Button (with an ID for JavaScript) -->
          <a href="{{ route('order.show', $careService->id) }}"
            class="orderServiceBtn mt-4 bg-[#1A3B4F] text-white px-5 py-2 rounded-lg text-sm hover:bg-[#163344] w-full md:w-fit text-center no-underline inline-block" data-auth="{{ auth()->check() ? '1' : '0' }}">
             {{ __('service.order_btn') }}
          </a>
        </div>
      </div>
      @endforeach
    </div>
  </div>

  <!-- Modal Component -->
  <div id="orderModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 backdrop-blur-sm transition-all duration-300">
    <div class="bg-white dark:bg-gray-900 rounded-2xl shadow-2xl max-w-md w-full mx-4 transform transition-all scale-95 opacity-0" id="modalContent">
      <div class="flex justify-between items-center p-5 border-b border-gray-200 dark:border-gray-800">
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Place Your Order</h3>
        <button id="closeModalBtn" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition">
          <i class="fas fa-times text-xl"></i>
        </button>
      </div>
      <div class="p-6">
        <p class="text-gray-700 dark:text-gray-300 mb-6 text-center">
          Please choose how you would like to continue:
        </p>
        <div class="flex flex-col sm:flex-row gap-4">
          <!-- Guest Button -->
          <a id="guestOrderBtn" href="#"
            class="flex-1 bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-white py-3 rounded-xl font-medium text-center hover:bg-gray-200 dark:hover:bg-gray-700 transition border border-gray-300 dark:border-gray-700">
            <i class="fas fa-user-friends mr-2"></i> Continue as Guest
          </a>
          <!-- Login Button -->
          <a id="loginOrderBtn" href="#"
            class="flex-1 bg-[#1A3B4F] text-white py-3 rounded-xl font-medium text-center hover:bg-[#163344] transition shadow-md">
            <i class="fas fa-sign-in-alt mr-2"></i> Login to Order
          </a>
        </div>
      </div>
    </div>
  </div>

</section>

<!-- IMPORTANT NOTE (prominent, high‑visibility requirement) -->
<section class="max-w-5xl mx-auto px-6 my-14">
  <div
    class="required-badge bg-[#FCE4E4] border-l-[10px] border-[#F9B0B0] rounded-r-2xl p-4 md:p-7 lg:p-7 xl:p-7 shadow-md flex flex-col md:flex-row items-start md:items-center gap-6">
    <div class="bg-white p-4 rounded-full shadow-sm">
      <i class="fas fa-exclamation-triangle text-4xl text-[#C63E5A]"></i>
    </div>
    <div class="flex-1">
      <p class="pb-6 text-red-900 font-mono text-xs md:text-sm lg:text-base xl:text-md"> {{ __('notice.subtitle') }}</p>
      <h3 class="text-xl md:text-4xl font-bold text-[#1A3B4F] flex items-center gap-2">
        <span class="bg-[#F9B0B0] w-4 h-4 rounded-full inline-block"></span>
        {{ __('notice.title') }}
      </h3>
     <div class="flex flex-col md:flex-row md:items-center gap-2 md:gap-4 text-sm md:text-base lg:text-lg font-medium text-[#2B4F6E] mt-6">
        <p class="bg-white/60 px-2 py-1 rounded">📄 {{ __('notice.warning_1') }}</p>
        <span class="hidden md:inline text-gray-400">—</span>
        <p class="bg-white/60 px-2 py-1 rounded">✍️ {{ __('notice.warning_2') }}</p>
      </div>

      <p class="text-[#C63E5A] font-semibold mt-1 text-sm md:text-md lg:text-base xl:text-base">
        {{ __('notice.warning_3') }}
      </p>
      <div class="flex gap-3 mt-3 text-sm text-gray-600 flex-wrap">
        <span class="bg-white px-4 py-1 rounded-full shadow-sm"><i class="far fa-file-pdf text-[#C63E5A] mr-1"></i> {{ __('notice.warning_4') }}</span>
        <span class="bg-white px-4 py-1 rounded-full shadow-sm"><i class="far fa-check-circle text-[#2B4F6E] mr-1"></i> {{ __('notice.warning_5') }}</span>
      </div>
    </div>
  </div>
</section>

<!-- ABOUT SECTION -->
<section id="about" class="flex bg-gray-100">
  <div class="container mx-auto px-6 lg:px-12 py-6 lg:py-10">
    <div class="space-y-6">
      <!-- ROW 1: Image + About -->
       <p class="text-center text-4xl font-bold text-[#1A3B4F]">{{ __('about.section') }}</p>
      <div class="grid md:grid-cols-2 gap-8">
        <!-- Image -->
        <div class="rounded-2xl overflow-hidden shadow-md">
          <img
            src="{{ asset('assets/frontend/images/about/about.webp') }}"
            alt="Home nursing care"
            class="w-full h-64 md:h-[455px] object-cover" />
        </div>

        <!-- About Text -->
        <div>
          <h2 class="text-xl md:text-3xl font-bold text-[#1A3B4F]">{{__('about.title')}}</h2>

          <p class="text-slate-800 leading-relaxed md:leading-8 mt-4 text-sm md:text-md lg:text-lg xl:text-lg">{{__('about.description_1')}}</p>

          <p class="mt-3 text-slate-800 leading-relaxed md:leading-8 text-sm md:text-md lg:text-lg xl:text-lg">{{__('about.description_2')}}</p>
        </div>
      </div>

      <!-- ROW 2: Mission + Vision -->
      <div class="grid md:grid-cols-2 gap-6 pt-4">
        <!-- Mission -->
        <div class="bg-[#F8FBFF] border border-[#D9ECFF] rounded-2xl p-6">
          <div class="flex items-center gap-3">
            <span
              class="bg-[#E6F2FC] text-[#1A3B4F] px-4 py-1 rounded-full text-sm font-semibold border border-[#B8D9F5]">
              {{__('about.mission_name')}}
            </span>
          </div>

          <p class="mt-4 text-slate-800  leading-relaxed md:leading-8 text-sm md:text-md lg:text-lg xl:text-lg">{{__('about.mission_description')}}</p>
        </div>

        <!-- Vision -->
        <div class="bg-[#FFF7F9] border border-[#FFD6E0] rounded-2xl p-6">
          <div class="flex items-center gap-3">
            <span
              class="bg-[#FCE4E4] text-[#C63E5A] px-4 py-1 rounded-full text-sm font-semibold">
              {{__('about.vision_name')}}
            </span>
          </div>

          <p class="mt-4 text-slate-800  leading-relaxed md:leading-8 text-sm md:text-md lg:text-lg xl:text-lg">{{__('about.vision_description')}}</p>
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
            src="{{asset('assets/frontend/images/team/t1.jpeg')}}"
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
            src="{{asset('assets/frontend/images/team/t2.jpeg')}}"
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
            src="{{asset('assets/frontend/images/team/t3.jpeg')}}"
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
            src="{{asset('assets/frontend/images/team/t4.jpg')}}"
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

<!-- FAQ & Video Section - Fully Responsive -->
<section
  class="flex items-center bg-gradient-to-br from-white to-[#fff7e8] overflow-hidden">
  <div class="container mx-auto px-6 lg:px-12 py-16 lg:py-10">

    <!-- <section class="py-12 md:py-20 bg-gradient-to-b from-white to-[#f8fafc] overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"> -->

    <!-- Section Header - Mobile Optimized -->
    <div class="text-center mb-8 md:mb-12">
      <span class="inline-flex items-center px-3 py-1.5 md:px-4 md:py-2 bg-[#e6f0fa] text-[#115c7e] rounded-full text-xs md:text-sm font-semibold mb-3 md:mb-4">
        <i class="fas fa-play-circle mr-1.5 text-xs md:text-sm"></i>
        <span class="bn-only">আমাদের সেবা সম্পর্কে জানুন</span>
      </span>
      <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900 mb-2 md:mb-4 px-2">
        <span class="bn-only">দেখুন ও জানুন</span>
      </h2>
      <p class="text-sm md:text-base text-gray-600 max-w-2xl mx-auto px-4">
        <span class="bn-only">দেখুন কীভাবে আমরা যত্নশীল সেবা প্রদান করি এবং সাধারণ প্রশ্নের উত্তর পান</span>
      </p>
    </div>

    <!-- Main Content - Mobile First (Stacked) -->
    <div class="flex flex-col lg:flex-row gap-6 md:gap-8 lg:gap-12">

      <!-- LEFT SIDE: Video Section - Full width on mobile -->
      <div class="w-full lg:w-1/2 space-y-4 md:space-y-6">

        <!-- Main Video Player - Mobile Optimized -->
        <div class="relative group rounded-xl md:rounded-2xl lg:rounded-3xl overflow-hidden shadow-lg md:shadow-xl bg-[#115c7e] aspect-video">
          <!-- Video Thumbnail -->
          <img src="https://shojonsheba.com/wp-content/uploads/2023/09/343404682_1366211944230060_285782814863529458_n.jpg"
            alt="Home Nursing Care"
            class="w-full h-full object-cover">

          <!-- Gradient Overlay - Lighter on mobile -->
          <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>

          <!-- Play Button - Smaller on mobile -->
          <button onclick="openVideoModal()"
            class="absolute inset-0 w-full h-full flex items-center justify-center">
            <div class="w-14 h-14 md:w-16 md:h-16 lg:w-20 lg:h-20 bg-[#dd88a0] rounded-full flex items-center justify-center shadow-xl transform transition-transform duration-300 hover:scale-110 active:scale-95">
              <!-- <i class="fas fa-youtube text-xl md:text-2xl lg:text-3xl text-white ml-1"></i> -->
              <i class="fab fa-youtube text-white text-2xl md:text-3xl"></i>
            </div>
          </button>

          <!-- Video Duration - Mobile adjusted -->
          <div class="absolute bottom-2 right-2 md:bottom-3 md:right-3 bg-black/70 backdrop-blur-sm text-white px-2 py-1 md:px-3 md:py-1.5 rounded-full text-xs md:text-sm font-medium">
            <i class="far fa-clock mr-1 text-xs"></i> 1:45
          </div>

          <!-- Video Title - Mobile optimized -->
          <div class="absolute bottom-2 left-2 md:bottom-4 md:left-4 text-white max-w-[80%]">
            <h3 class="text-sm md:text-base lg:text-xl font-bold leading-tight mb-0.5 md:mb-1">
              <span class="bn-only line-clamp-1">সেরা হোম নার্সিং সেবা</span>
            </h3>
            <p class="text-[10px] md:text-xs text-gray-200 line-clamp-1">
              <span class="bn-only">দেখুন কীভাবে আমরা আপনার প্রিয়জনদের যত্ন নেই</span>
            </p>
          </div>
        </div>

        <!-- Video Gallery Thumbnails - Horizontal scroll on mobile -->
        <div class="grid grid-cols-3 gap-2 md:gap-3">
          <!-- Thumbnail 1 -->
          <div class="relative rounded-lg md:rounded-xl overflow-hidden cursor-pointer group aspect-video">
            <img src="https://images.pexels.com/photos/7551645/pexels-photo-7551645.jpeg?auto=compress&cs=tinysrgb&w=400"
              alt="Elderly Care"
              class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
            <div class="absolute inset-0 bg-black/30 group-hover:bg-black/40 transition flex items-center justify-center">
              <i class="fab fa-youtube text-white text-xs md:text-sm opacity-0 group-hover:opacity-100"></i>
            </div>
            <span class="absolute bottom-1 left-1 text-[8px] md:text-xs text-white bg-black/60 px-1.5 py-0.5 rounded">2:30</span>
          </div>

          <!-- Thumbnail 2 -->
          <div class="relative rounded-lg md:rounded-xl overflow-hidden cursor-pointer group aspect-video">
            <img src="https://images.pexels.com/photos/7659568/pexels-photo-7659568.jpeg?auto=compress&cs=tinysrgb&w=400"
              alt="Nurse with Patient"
              class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
            <div class="absolute inset-0 bg-black/30 group-hover:bg-black/40 transition flex items-center justify-center">
              <i class="fab fa-youtube text-white text-xs md:text-sm opacity-0 group-hover:opacity-100"></i>
            </div>
            <span class="absolute bottom-1 left-1 text-[8px] md:text-xs text-white bg-black/60 px-1.5 py-0.5 rounded">4:15</span>
          </div>

          <!-- Thumbnail 3 -->
          <div class="relative rounded-lg md:rounded-xl overflow-hidden cursor-pointer group aspect-video">
            <img src="https://images.pexels.com/photos/6647009/pexels-photo-6647009.jpeg?auto=compress&cs=tinysrgb&w=400"
              alt="Medical Care"
              class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
            <div class="absolute inset-0 bg-black/30 group-hover:bg-black/40 transition flex items-center justify-center">
              <i class="fab fa-youtube text-white text-xs md:text-sm opacity-0 group-hover:opacity-100"></i>
            </div>
            <span class="absolute bottom-1 left-1 text-[8px] md:text-xs text-white bg-black/60 px-1.5 py-0.5 rounded">5:20</span>
          </div>
        </div>

        <!-- Video Stats - Mobile compact -->
        <div class="flex items-center justify-between bg-white rounded-xl md:rounded-2xl p-3 md:p-4 shadow-sm">
          <div class="flex items-center gap-2 md:gap-4">
            <div class="flex -space-x-2">
              <img src="https://randomuser.me/api/portraits/women/44.jpg" class="w-6 h-6 md:w-8 md:h-8 rounded-full border-2 border-white">
              <img src="https://randomuser.me/api/portraits/men/32.jpg" class="w-6 h-6 md:w-8 md:h-8 rounded-full border-2 border-white">
              <img src="https://randomuser.me/api/portraits/women/68.jpg" class="w-6 h-6 md:w-8 md:h-8 rounded-full border-2 border-white">
            </div>
            <div>
              <p class="text-xs md:text-sm font-semibold text-gray-900">
                <span class="bn-only">১২০০+ পরিবার</span>
              </p>
              <p class="text-[10px] md:text-xs text-gray-500">
                <span class="bn-only">দেখেছেন ও আস্থা রেখেছেন</span>
              </p>
            </div>
          </div>
          <div class="flex items-center gap-0.5 md:gap-1 text-[#dd88a0]">
            <i class="fas fa-star text-xs md:text-sm"></i>
            <i class="fas fa-star text-xs md:text-sm"></i>
            <i class="fas fa-star text-xs md:text-sm"></i>
            <i class="fas fa-star text-xs md:text-sm"></i>
            <i class="fas fa-star-half-alt text-xs md:text-sm"></i>
            <span class="text-gray-700 ml-1 text-xs md:text-sm">4.8</span>
          </div>
        </div>
      </div>

      <!-- RIGHT SIDE: FAQ Section - Full width on mobile -->
      <div class="w-full lg:w-1/2 mt-6 lg:mt-0">
        <div class="bg-white rounded-xl md:rounded-2xl lg:rounded-3xl shadow-md p-4 md:p-6 lg:p-8">

          <!-- FAQ Header - Mobile optimized -->
          <div class="flex items-center gap-2 md:gap-3 mb-4 md:mb-6 pb-3 md:pb-4 border-b border-gray-100">
            <div class="w-8 h-8 md:w-10 md:h-10 lg:w-12 lg:h-12 bg-[#e6f0fa] rounded-lg md:rounded-xl flex items-center justify-center flex-shrink-0">
              <i class="fas fa-question-circle text-base md:text-xl lg:text-2xl text-[#115c7e]"></i>
            </div>
            <div>
              <h3 class="text-lg md:text-xl lg:text-2xl font-bold text-gray-900">
                <span class="bn-only">সাধারণ জিজ্ঞাসা</span>
              </h3>
              <p class="text-xs md:text-sm text-gray-500">
                <span class="bn-only">সাধারণ প্রশ্নের দ্রুত উত্তর</span>
              </p>
            </div>
          </div>

          <!-- FAQ Accordion Items - Mobile friendly touch targets -->
          <div class="space-y-2 md:space-y-3" x-data="{selected:null}">

            <!-- FAQ Item 1 -->
            <div class="border border-gray-100 rounded-lg md:rounded-xl overflow-hidden hover:border-[#dd88a0] transition">
              <button @click="selected !== 1 ? selected = 1 : selected = null"
                class="w-full flex items-center justify-between p-3 md:p-4 text-left bg-white hover:bg-gray-50 transition">
                <div class="flex items-center gap-2 md:gap-3 flex-1 pr-2">
                  <span class="w-5 h-5 md:w-6 md:h-6 bg-[#e6f0fa] rounded-full flex items-center justify-center text-[#115c7e] font-semibold text-xs md:text-sm flex-shrink-0">1</span>
                  <span class="font-semibold text-gray-900 text-xs md:text-sm lg:text-base">
                    <span class="bn-only">কিভাবে সেবা বুক করব?</span>
                  </span>
                </div>
                <i class="fas fa-chevron-down text-xs md:text-sm transition-transform duration-300 flex-shrink-0" :class="{'rotate-180': selected === 1}"></i>
              </button>
              <div x-show="selected === 1"
                x-collapse.duration.300ms
                class="px-3 md:px-4 pb-3 md:pb-4 text-gray-600 border-t border-gray-100 pt-2 md:pt-3">
                <p class="text-xs md:text-sm">
                  <span class="bn-only">"বুক সার্ভিস" এ ক্লিক করে অনলাইনে অথবা ২৪/৭ হেল্পলাইনে কল করে বুক করুন। চিকিৎসা সেবার জন্য প্রেসক্রিপশন প্রয়োজন।</span>
                </p>
              </div>
            </div>

            <!-- FAQ Item 2 -->
            <div class="border border-gray-100 rounded-lg md:rounded-xl overflow-hidden hover:border-[#dd88a0] transition">
              <button @click="selected !== 2 ? selected = 2 : selected = null"
                class="w-full flex items-center justify-between p-3 md:p-4 text-left bg-white hover:bg-gray-50 transition">
                <div class="flex items-center gap-2 md:gap-3 flex-1 pr-2">
                  <span class="w-5 h-5 md:w-6 md:h-6 bg-[#e6f0fa] rounded-full flex items-center justify-center text-[#115c7e] font-semibold text-xs md:text-sm flex-shrink-0">2</span>
                  <span class="font-semibold text-gray-900 text-xs md:text-sm lg:text-base">
                    <span class="bn-only">সেবা এলাকা?</span>
                  </span>
                </div>
                <i class="fas fa-chevron-down text-xs md:text-sm transition-transform duration-300 flex-shrink-0" :class="{'rotate-180': selected === 2}"></i>
              </button>
              <div x-show="selected === 2"
                x-collapse.duration.300ms
                class="px-3 md:px-4 pb-3 md:pb-4 text-gray-600 border-t border-gray-100 pt-2 md:pt-3">
                <p class="text-xs md:text-sm">
                  <span class="bn-only">বর্তমানে শুধুমাত্র ব্রাহ্মণবাড়িয়া পৌরসভায় সেবা দিচ্ছি। শীঘ্রই অন্যান্য এলাকায় সম্প্রসারণ হবে।</span>
                </p>
                <div class="mt-2 flex items-center gap-1 text-[10px] md:text-xs text-[#115c7e]">
                  <i class="fas fa-map-marker-alt"></i>
                  <span class="bn-only">ব্রাহ্মণবাড়িয়া পৌরসভা</span>
                </div>
              </div>
            </div>

            <!-- FAQ Item 3 -->
            <div class="border border-gray-100 rounded-lg md:rounded-xl overflow-hidden hover:border-[#dd88a0] transition">
              <button @click="selected !== 3 ? selected = 3 : selected = null"
                class="w-full flex items-center justify-between p-3 md:p-4 text-left bg-white hover:bg-gray-50 transition">
                <div class="flex items-center gap-2 md:gap-3 flex-1 pr-2">
                  <span class="w-5 h-5 md:w-6 md:h-6 bg-[#e6f0fa] rounded-full flex items-center justify-center text-[#115c7e] font-semibold text-xs md:text-sm flex-shrink-0">3</span>
                  <span class="font-semibold text-gray-900 text-xs md:text-sm lg:text-base">
                    <span class="bn-only">নার্সরা কি যোগ্য?</span>
                  </span>
                </div>
                <i class="fas fa-chevron-down text-xs md:text-sm transition-transform duration-300 flex-shrink-0" :class="{'rotate-180': selected === 3}"></i>
              </button>
              <div x-show="selected === 3"
                x-collapse.duration.300ms
                class="px-3 md:px-4 pb-3 md:pb-4 text-gray-600 border-t border-gray-100 pt-2 md:pt-3">
                <p class="text-xs md:text-sm">
                  <span class="bn-only">হ্যাঁ, সকল নার্স পেশাদারভাবে প্রশিক্ষিত এবং সার্টিফিকেট প্রাপ্ত। অধিকাংশের ৫+ বছরের অভিজ্ঞতা রয়েছে।</span>
                </p>
              </div>
            </div>

            <!-- FAQ Item 4 -->
            <div class="border border-gray-100 rounded-lg md:rounded-xl overflow-hidden hover:border-[#dd88a0] transition">
              <button @click="selected !== 4 ? selected = 4 : selected = null"
                class="w-full flex items-center justify-between p-3 md:p-4 text-left bg-white hover:bg-gray-50 transition">
                <div class="flex items-center gap-2 md:gap-3 flex-1 pr-2">
                  <span class="w-5 h-5 md:w-6 md:h-6 bg-[#e6f0fa] rounded-full flex items-center justify-center text-[#115c7e] font-semibold text-xs md:text-sm flex-shrink-0">4</span>
                  <span class="font-semibold text-gray-900 text-xs md:text-sm lg:text-base">
                    <span class="bn-only">কি কি ডকুমেন্ট প্রয়োজন?</span>
                  </span>
                </div>
                <i class="fas fa-chevron-down text-xs md:text-sm transition-transform duration-300 flex-shrink-0" :class="{'rotate-180': selected === 4}"></i>
              </button>
              <div x-show="selected === 4"
                x-collapse.duration.300ms
                class="px-3 md:px-4 pb-3 md:pb-4 text-gray-600 border-t border-gray-100 pt-2 md:pt-3">
                <p class="text-xs md:text-sm">
                  <span class="bn-only">ডাক্তারের প্রেসক্রিপশন এবং স্বাক্ষরিত সম্মতি ফর্ম প্রয়োজন। আমরা ইমেইল/হোয়াটসঅ্যাপে ফর্ম পাঠাব।</span>
                </p>
              </div>
            </div>
          </div>

          <!-- Still Have Questions? - Mobile optimized -->
          <div class="mt-4 md:mt-6 pt-4 md:pt-6 border-t border-gray-100">
            <div class="bg-gradient-to-r from-[#e6f0fa] to-[#fbe4e8] rounded-xl md:rounded-2xl p-3 md:p-5">
              <div class="flex items-start gap-2 md:gap-4">
                <div class="w-8 h-8 md:w-10 md:h-10 lg:w-12 lg:h-12 bg-white rounded-full flex items-center justify-center flex-shrink-0">
                  <i class="fas fa-headset text-base md:text-xl lg:text-2xl text-[#115c7e]"></i>
                </div>
                <div class="flex-1">
                  <h4 class="font-semibold text-gray-900 text-sm md:text-base mb-0.5 md:mb-1">
                    <span class="bn-only">এখনও প্রশ্ন আছে?</span>
                  </h4>
                  <p class="text-xs md:text-sm text-gray-700 mb-2 md:mb-3">
                    <span class="bn-only">আমাদের টিম ২৪/৭ উপলব্ধ</span>
                  </p>
                  <div class="flex gap-2">
                    <a href="tel:+8801XXXXXXXXX"
                      class="flex items-center gap-1 md:gap-2 bg-white px-2 py-1.5 md:px-4 md:py-2 rounded-lg md:rounded-xl text-xs md:text-sm font-semibold text-[#115c7e] hover:shadow transition">
                      <i class="fas fa-phone-alt text-xs md:text-sm"></i>
                      <span class="bn-only hidden sm:inline">কল</span>
                      <span class="bn-only sm:hidden">কল</span>
                    </a>
                    <a href="#"
                      class="flex items-center gap-1 md:gap-2 bg-[#115c7e] px-2 py-1.5 md:px-4 md:py-2 rounded-lg md:rounded-xl text-xs md:text-sm font-semibold text-white hover:bg-[#0d4a66] transition">
                      <i class="fas fa-envelope text-xs md:text-sm"></i>
                      <span class="bn-only hidden sm:inline">ইমেইল</span>
                      <span class="bn-only sm:hidden">ইমেইল</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Trust Badges - Responsive grid -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-2 md:gap-4 mt-8 md:mt-12">
      <div class="bg-white rounded-lg md:rounded-xl p-2 md:p-4 text-center shadow-sm hover:shadow transition">
        <i class="fas fa-user-md text-lg md:text-2xl lg:text-3xl text-[#115c7e] mb-1 md:mb-2"></i>
        <p class="font-semibold text-[10px] md:text-sm bn-only">১০০+ নার্স</p>
      </div>
      <div class="bg-white rounded-lg md:rounded-xl p-2 md:p-4 text-center shadow-sm hover:shadow transition">
        <i class="fas fa-clock text-lg md:text-2xl lg:text-3xl text-[#dd88a0] mb-1 md:mb-2"></i>
        <p class="font-semibold text-[10px] md:text-sm bn-only">২৪/৭ সেবা</p>
      </div>
      <div class="bg-white rounded-lg md:rounded-xl p-2 md:p-4 text-center shadow-sm hover:shadow transition">
        <i class="fas fa-heartbeat text-lg md:text-2xl lg:text-3xl text-[#115c7e] mb-1 md:mb-2"></i>
        <p class="font-semibold text-[10px] md:text-sm bn-only">৫k+ পরিবার</p>
      </div>
      <div class="bg-white rounded-lg md:rounded-xl p-2 md:p-4 text-center shadow-sm hover:shadow transition">
        <i class="fas fa-shield-alt text-lg md:text-2xl lg:text-3xl text-[#dd88a0] mb-1 md:mb-2"></i>
        <p class="font-semibold text-[10px] md:text-sm bn-only">বীমাকৃত</p>
      </div>
    </div>
  </div>

  <!-- Video Modal - Mobile Optimized -->
  <div id="videoModal" class="fixed inset-0 bg-black/95 hidden items-center justify-center z-50 p-2 md:p-4">
    <div class="relative w-full max-w-4xl">
      <button onclick="closeVideoModal()"
        class="absolute -top-8 md:-top-12 right-0 text-white hover:text-[#dd88a0] transition z-10">
        <i class="fas fa-times-circle text-2xl md:text-3xl"></i>
      </button>
      <div class="aspect-video bg-black rounded-lg md:rounded-xl overflow-hidden">
        <iframe class="w-full h-full"
          src="https://www.youtube.com/embed/NlIQfZHrG3k?autoplay=0&rel=0"
          title="Nurse Next Door"
          frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
          allowfullscreen>
        </iframe>
      </div>
    </div>
  </div>
</section>


@push('scripts')
<script>

   const isAuthenticated = @json(auth()->check());

document.addEventListener('DOMContentLoaded', function () {

    // Elements
    const orderButtons = document.querySelectorAll('.orderServiceBtn');
    const modal = document.getElementById('orderModal');
    const modalContent = document.getElementById('modalContent');
    const closeBtn = document.getElementById('closeModalBtn');
    const guestBtn = document.getElementById('guestOrderBtn');
    const loginBtn = document.getElementById('loginOrderBtn');

    // Selected service URL
    let orderUrl = '';

    // Safety check
    if (!modal || !modalContent) {
        return;
    }

    // Show Modal
    function showModal() {
        modal.classList.remove('hidden');
        modal.classList.add('flex');

        setTimeout(() => {
            modalContent.classList.remove('scale-95', 'opacity-0');
            modalContent.classList.add('scale-100', 'opacity-100');
        }, 10);
    }

    // Hide Modal
    function hideModal() {
        modalContent.classList.remove('scale-100', 'opacity-100');
        modalContent.classList.add('scale-95', 'opacity-0');

        setTimeout(() => {
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        }, 300);
    }

    // Order Service Buttons
    orderButtons.forEach(button => {
        button.addEventListener('click', function (e) {

            const isLoggedIn = this.dataset.auth === '1';
            const serviceUrl = this.getAttribute('href');

            // User already logged in
            if (isLoggedIn) {
                window.location.href = serviceUrl;
                return;
            }

            // Guest user
            e.preventDefault();

            orderUrl = serviceUrl;

            showModal();
        });
    });
    
    // Close button
    if (closeBtn) {
        closeBtn.addEventListener('click', hideModal);
    }

    // Click outside modal
    modal.addEventListener('click', function (e) {
        if (e.target === modal) {
            hideModal();
        }
    });

    // Guest Order
    if (guestBtn) {
        guestBtn.addEventListener('click', function (e) {
            e.preventDefault();

            if (!orderUrl) return;

            window.location.href = orderUrl;
        });
    }

    // Login Order
    if (loginBtn) {
        loginBtn.addEventListener('click', function (e) {
            e.preventDefault();

            if (!orderUrl) return;

            const loginUrl =
                "{{ route('login') }}" +
                "?redirect_to=" +
                encodeURIComponent(orderUrl);

            window.location.href = loginUrl;
        });
    }

    // ESC key close
    document.addEventListener('keydown', function (e) {
        if (
            e.key === 'Escape' &&
            modal &&
            !modal.classList.contains('hidden')
        ) {
            hideModal();
        }
    });

});
</script>
@endpush

@endsection