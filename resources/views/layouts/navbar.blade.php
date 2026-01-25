<header>  

  <nav class="bg-white/80 dark:bg-purple-950 backdrop-blur-md border-b border-gray-200 dark:border-gray-800 w-full p-5">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

      <div class="flex justify-between h-16">

        <!-- Logo -->

        <div class="flex items-center">

          <a href="{{ asset('/') }}" class="flex items-center space-x-2">

                <img src="{{ asset('images/logo-06.svg') }}" 

         alt="AI Digitals Logo" 

         class="h-10 w-auto block dark:hidden">



    <!-- Dark Mode Logo -->

    <img src="{{ asset('images/logo-08.svg') }}" 

         alt="Bellah Options Logo (Dark Mode)" 

         class="h-10 w-auto hidden dark:block">

          </a>

        </div>



        <!-- Desktop Menu -->

        <div class="hidden md:flex space-x-8 items-center">

          <a href="{{ asset('/') }}" class="nav-link dark:text-white">Home</a>

          <a href="{{ asset('/about-bellah-options') }}" class="nav-link dark:text-white">About Us</a>

          <a href="{{ asset('/bellah-options-services') }}" class="nav-link dark:text-white">Services</a>
          <a href="{{ asset('/gallery') }}" class="nav-link dark:text-white">Gallery</a>

          <a href="{{ asset('/contact-bellah-options') }}" class="nav-link dark:text-white">Contact</a>



          <!-- Dark Mode Toggle -->

          <button id="theme-toggle" class="p-2 rounded-lg bg-gray-100 dark:bg-purple-800 text-gray-800 dark:text-white hover:bg-gray-200 dark:hover:bg-cyan-700 transition">

            <!-- Sun Icon (light mode) -->

            <svg id="theme-toggle-light-icon" class="hidden w-5 h-5 dark:text-white" fill="currentColor" viewBox="0 0 20 20">

              <path d="M10 3.22a.75.75 0 0 1 .75.75v1.5a.75.75 0 0 1-1.5 0v-1.5A.75.75 0 0 1 10 3.22Zm0 10.53a3.75 3.75 0 1 1 0-7.5 3.75 3.75 0 0 1 0 7.5Zm6.78-3.03a.75.75 0 0 1 .75.75h1.5a.75.75 0 0 1 0 1.5h-1.5a.75.75 0 0 1 0-1.5Zm-13.56 0a.75.75 0 0 1 .75.75H3a.75.75 0 0 1 0 1.5H1.5a.75.75 0 0 1 0-1.5H3a.75.75 0 0 1 .75-.75ZM10 16.28a.75.75 0 0 1 .75.75v1.5a.75.75 0 0 1-1.5 0v-1.5a.75.75 0 0 1 .75-.75Z" class="dark:text-gray-300"/>

            </svg>

            <!-- Moon Icon (dark mode) -->

            <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20">

              <path d="M17.293 13.293A8 8 0 0 1 8 2a8 8 0 1 0 9.293 11.293Z" class="dark:text-gray-300"/>

            </svg>

          </button>



          <a href="{{ asset('/order-design') }}" class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition">Book an Appointment </a>

        </div>



        <!-- Mobile Menu Button -->

        <div class="md:hidden flex items-center">

          <button id="menu-toggle" class="text-gray-700 dark:text-white focus:outline-none">

            <svg xmlns="http://www.w3.org/2000/svg" id="menu-icon" class="h-6 w-6 dark:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">

              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"

                d="M4 6h16M4 12h16M4 18h16" />

            </svg>

          </button>

        </div>

      </div>

    </div>



    <!-- Mobile Menu -->

    <div id="mobile-menu" class="md:hidden hidden border-t border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900">

      <a href="{{ asset('/') }}" class="block px-4 py-2 nav-link">Home</a>

      <a href="{{ asset('/about-bellah-options') }}" class="block px-4 py-2 nav-link dark:text-white">About Us</a>

      <a href="{{ asset('/bellah-options-services') }}" class="block px-4 py-2 nav-link dark:text-white">Services</a>
      <a href="{{ asset('/gallery') }}" class="block px-4 py-2 nav-link dark:text-white">Gallery</a>
      <a href="{{ asset('/contact-bellah-options') }}" class="block px-4 py-2 nav-link dark:text-white">Contact</a>

      <div class="flex items-center justify-between px-4 py-2">

        <button id="theme-toggle-mobile" class="p-2 rounded-lg bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700 transition">

          <svg id="theme-toggle-light-icon-mobile" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20">

            <path d="M10 3.22a.75.75 0 0 1 .75.75v1.5a.75.75 0 0 1-1.5 0v-1.5A.75.75 0 0 1 10 3.22Z"/>

          </svg>

          <svg id="theme-toggle-dark-icon-mobile" class="hidden w-5 h-5 dark:text-white" fill="currentColor" viewBox="0 0 20 20">

            <path d="M17.293 13.293A8 8 0 0 1 8 2a8 8 0 1 0 9.293 11.293Z"/>

          </svg>

        </button>

      </div>

      <a href="{{ asset('/order-design') }}" class="px-4 py-2 mb-3 bg-purple-600 w-full block text-white rounded-lg hover:bg-purple-700 transition">Book an Appointment</a>

    </div>

  </nav>



  <!-- Custom Styles -->

  <style>

    .nav-link {

      @apply text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400 transition;

    }

  </style>



  <!-- Script for Mobile Menu + Theme Toggle -->

  <script>

    const menuToggle = document.getElementById('menu-toggle');

    const mobileMenu = document.getElementById('mobile-menu');

    menuToggle.addEventListener('click', () => mobileMenu.classList.toggle('hidden'));



    // Theme toggle

    const toggles = [

      { btn: 'theme-toggle', dark: 'theme-toggle-dark-icon', light: 'theme-toggle-light-icon' },

      { btn: 'theme-toggle-mobile', dark: 'theme-toggle-dark-icon-mobile', light: 'theme-toggle-light-icon-mobile' }

    ];



    toggles.forEach(({ btn, dark, light }) => {

      const button = document.getElementById(btn);

      const darkIcon = document.getElementById(dark);

      const lightIcon = document.getElementById(light);

      if (!button) return;



      // Initialize

      if (localStorage.getItem('color-theme') === 'dark' ||

          (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {

        document.documentElement.classList.add('dark');

        lightIcon.classList.remove('hidden');

      } else {

        document.documentElement.classList.remove('dark');

        darkIcon.classList.remove('hidden');

      }



      // Toggle click

      button.addEventListener('click', function() {

        darkIcon.classList.toggle('hidden');

        lightIcon.classList.toggle('hidden');

        if (document.documentElement.classList.contains('dark')) {

          document.documentElement.classList.remove('dark');

          localStorage.setItem('color-theme', 'light');

        } else {

          document.documentElement.classList.add('dark');

          localStorage.setItem('color-theme', 'dark');

        }

      });

    });

  </script>

</header>

