<!doctype html>
<html lang="en" class="dark">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Apex Dashboard - Dark/Light Toggle</title>
  <!-- <script src="https://cdn.tailwindcss.com"></script> -->
   <script src="{{ asset('assets/backend/js/tailwindcss.js') }}"></script>
  <!-- Chart.js for the graph -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script> -->
  <script src="{{asset('/')}}assets/backend/js/chart.umd.min.js"></script>
  <script>
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          colors: {
            primary: "#10b981",
          },
        },
      },
    };
  </script>
  <!-- <link href="{{asset('/')}}assets/backend/css/all.min.css" rel="stylesheet">-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <script src="{{ asset('assets/backend/css/custom.css') }}"></script>

  <script>
    // All nav-link find
    const navLinks = document.querySelectorAll('.nav-link');

    navLinks.forEach(link => {
      link.addEventListener('click', function(e) {
        // firstly, remove active class from all links
        navLinks.forEach(l => l.classList.remove('active'));

        // that link clicked, add active class
        this.classList.add('active');
      });
    });

    // ---------------- optional: page load  ----------------
    window.addEventListener('load', () => {
      const currentPath = window.location.pathname; // of window.location.href

      navLinks.forEach(link => {
        if (link.getAttribute('href') === currentPath || link.href === window.location.href) {
          link.classList.add('active');
        }
      });
    });
  </script>
<style>
  .nav-link.active {
    @apply bg-emerald-700 text-white font-semibold;
  }
  .dark .nav-link.active {
    @apply bg-emerald-800 text-white;
  }
</style>
</head>

<body
  class="bg-gray-50 dark:bg-gray-950 text-gray-900 dark:text-gray-100 min-h-screen font-sans antialiased transition-colors duration-300">
  <!-- Mobile sidebar overlay -->
  <div
    id="mobile-menu-backdrop"
    class="fixed inset-0 bg-black/60 z-40 hidden md:hidden transition-opacity"></div>

  <!-- Main Flex Container -->
  <div class="flex h-screen overflow-hidden">
    <!-- Sidebar - Fixed Structure with Scrollable Nav and Fixed Profile -->
    @include('backend.layouts.includes.sidebar')

    <!-- ========== MAIN CONTENT AREA ========== -->
    <div class="flex-1 flex flex-col overflow-hidden md:ml-72">
      <!-- Topbar -->
      <!-- ========== TOP HEADER ========== -->
      @include('backend.layouts.includes.header')

      <!-- Main content area -->
         <!-- Content -->
  <!-- [ Main Content ] start -->
  @yield('content')
  

  <!-- End Content -->
    
    </div>
  </div>

     <!-- Global JS -->
  <script src="{{asset('/')}}assets/backend/js/chart.umd.min.js"></script>
  <script src="{{ asset('assets/backend/js/chart.js') }}"></script>
  <script src="{{ asset('assets/backend/js/custom.js') }}"></script>

   <!-- Stack for Page-wise Scripts -->
    @stack('scripts')


</body>

</html>