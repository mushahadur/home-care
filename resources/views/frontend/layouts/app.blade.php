<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title> @yield('title', 'Nurse Next Door') - Nurse Next Door </title>


  <!-- <link rel="stylesheet" href="{{ asset('css/main.css') }}" /> -->
  <link rel="stylesheet" href="{{ asset('css/custom.css') }}" />
   <script src="{{ asset('assets/frontend/js/tailwind.min.js') }}"></script>
   <link rel="stylesheet" href="{{ asset('assets/frontend/css/swiper-bundle.min.css') }}">

  <!-- Font Awesome 6 (free) for tiny icons & super user lock -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
 <style>

    /* custom smooth shadow & card hover effect, keeping the palette */
    .shadow-soft {
      box-shadow:
        0 1px 3px rgba(0, 119, 190, 0.1),
        0 1px 2px rgba(0, 119, 190, 0.06);
    }
    .card-hover {
      transition:
        transform 0.2s ease,
        box-shadow 0.2s ease;
    }

    .card-hover:hover {
      transform: translateY(-4px);
      box-shadow:
        0 20px 25px -5px rgba(0, 119, 190, 0.1),
        0 8px 10px -6px rgba(0, 119, 190, 0.1);
    }

    .pink-accent-bg {
      background-color: #f9b0b0;
      /* warm pink for small accents */
    }

    .pink-accent-text {
      color: #c63e5a;
      /* deeper pink for readability on white */
    }

    .soft-blue-bg {
      background-color: #e6f2fc;
      /* medical soft blue */
    }

    .border-soft-blue {
      border-color: #b8d9f5;
    }

    .required-badge {
      background: #fce4e4;
      border-left: 6px solid #f9b0b0;
    }

    /* Smooth fade for slides */
    .slide {
      opacity: 0;
      transition: opacity 1.2s ease-in-out;
      pointer-events: none;
    }

    .slide.active {
      opacity: 1;
      pointer-events: auto;
    }

    /* Optional overlay gradient */
    .slider-overlay {
      background: linear-gradient(to right,
          rgba(0, 0, 0, 0.4) 0%,
          rgba(0, 0, 0, 0.1) 100%);
    }

    .tab-active {
      color: var(--primary);
      border-bottom: 3px solid var(--primary);
      font-weight: 600;
    }
    .tab-inactive {
      color: #4b5563;
    }
    .tab-content {
      display: none;
    }
    .tab-content.active {
      display: block;
    }


     /* Smooth accordion transitions */
   /* Mobile first responsive adjustments */
    @media (max-width: 640px) {
        .line-clamp-1 {
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    }
    
    /* Smooth transitions */
    .transition-all {
        transition-property: all;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 300ms;
    }
    
    /* Modal animation */
    #videoModal {
        transition: opacity 0.3s ease;
    }
    
    #videoModal.show {
        display: flex;
        animation: fadeIn 0.3s ease;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    
    /* Better touch targets for mobile */
    button, a {
        -webkit-tap-highlight-color: transparent;
    }
    
    /* Hide scrollbar for thumbnails on mobile if needed */
    .hide-scrollbar::-webkit-scrollbar {
        display: none;
    }
    .hide-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
  </style>
</head>

<body class="bg-white font-sans antialiased">
  <!-- NAVIGATION (Home, About, Services, Working Stuffs, Super User) -->
  @include('frontend.layouts.includes.header')

   @yield('content')

  <!-- AUTH MODAL -->
  <div
    id="authModal"
    class="fixed inset-0 z-50 hidden items-center justify-center bg-black/40 backdrop-blur-sm p-4">
    <div
      class="bg-white w-full max-w-md rounded-xl shadow-xl relative overflow-hidden">
      <!-- Close -->
      <button
        id="closeAuth"
        class="absolute top-3 right-3 text-red-400 hover:text-red-600 text-2xl">
        ✕
      </button>

      <!-- Tabs -->
      <div class="flex border-b">
        <button
          id="tabLogin"
          class="flex-1 py-3 font-semibold text-gray-600 border-b-2 border-[#2B4F6E]">
          Login
        </button>
        <button
          id="tabSignup"
          class="flex-1 py-3 font-semibold text-gray-600">
          Register
        </button>
      </div>

      <!-- LOGIN -->
      <div id="loginForm" class="p-6 space-y-4">
        <h3 class="text-xl font-bold text-[#1A3B4F]">Welcome Back</h3>

        <input
          type="text"
          placeholder="Email or Phone"
          class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#B8D9F5]" />

        <input
          type="password"
          placeholder="Password"
          class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#B8D9F5]" />

        <button
          class="w-full bg-[#2B4F6E] text-white py-2 rounded-lg hover:bg-[#1A3B4F] transition">
          Login
        </button>
      </div>

      <!-- SIGNUP -->
      <div id="signupForm" class="p-6 space-y-4 hidden">
        <h3 class="text-xl font-bold text-[#1A3B4F]">Create Account</h3>

        <input
          type="text"
          placeholder="Full Name"
          class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#B8D9F5]" />

        <input
          type="text"
          placeholder="Phone"
          class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#B8D9F5]" />

        <input
          type="password"
          placeholder="Password"
          class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#B8D9F5]" />

        <button
          class="w-full bg-[#C63E5A] text-white py-2 rounded-lg hover:bg-[#a52e46] transition">
          Register
        </button>
      </div>
    </div>
  </div>

  <!-- GEOGRAPHIC FOCUS BADGE + FOOTER NOTICE (Exclusive to Brahmanbaria Municipality) -->
  @include('frontend.layouts.includes.footer')

</body>

</html>