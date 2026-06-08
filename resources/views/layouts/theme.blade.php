<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <meta name="theme-color" content="#61078B">

    <title>@yield('title', 'AI Digital Agency')</title>
    <meta name="keywords" content="social media management, digital agency, content creation, brand strategy">
    <meta name="description" content="@yield('meta_description', 'AI Digital Agency — Building Brands That Thrive through strategic social media management.')">

    {{-- Bootstrap 5 CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    {{-- Glyphter icon font --}}
    <link rel="stylesheet" href="{{ asset('assets/vendor/glyyphter/css/xpovio.css') }}">
    {{-- Font Awesome 6 --}}
    <link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/all.css') }}">
    {{-- Nice Select --}}
    <link rel="stylesheet" href="{{ asset('assets/vendor/nice-select/css/nice-select.css') }}">
    {{-- Magnific Popup --}}
    <link rel="stylesheet" href="{{ asset('assets/vendor/magnific-popup/css/magnific-popup.css') }}">
    {{-- Slick Carousel --}}
    <link rel="stylesheet" href="{{ asset('assets/vendor/slick/css/slick.css') }}">
    {{-- Xpovio Main CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/main.min.css') }}">
    {{-- Purple Theme Override --}}
    <link rel="stylesheet" href="{{ asset('assets/css/purple-theme.css') }}">

    @stack('styles')
</head>
<body class="home-light">
    <div class="my-app">
        {{-- Preloader --}}
        <div class="preloader" id="preloader">
            <div class="preloader__image">
                <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="30" cy="30" r="28" stroke="rgba(255,255,255,0.3)" stroke-width="3"/>
                    <path d="M30 2 A28 28 0 0 1 58 30" stroke="#ffffff" stroke-width="3" stroke-linecap="round"/>
                </svg>
            </div>
        </div>

        {{-- Custom cursor --}}
        <div class="cursor-big"></div>
        <div class="cursor-small"></div>

        {{-- Header / Navbar --}}
        @include('layouts.navbar')

        {{-- Smooth scroll wrapper --}}
        <div id="smooth-wrapper">
            <div id="smooth-content">
                <main>
                    @yield('content')
                </main>

                {{-- Footer --}}
                @include('layouts.footer')
            </div>
        </div>

        {{-- Scroll to top --}}
        <a href="javascript:void(0)" id="scrollUp" aria-label="scroll to top">
            <i class="fa-sharp fa-solid fa-arrow-up"></i>
        </a>

        {{-- Vertical lines decoration --}}
        <div class="line">
            <span></span><span></span><span></span><span></span><span></span>
        </div>
    </div>

    {{-- jQuery --}}
    <script src="{{ asset('assets/vendor/jquery/jquery-3.7.0.min.js') }}"></script>
    {{-- Bootstrap 5 JS --}}
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    {{-- Nice Select --}}
    <script src="{{ asset('assets/vendor/nice-select/js/jquery.nice-select.min.js') }}"></script>
    {{-- Magnific Popup --}}
    <script src="{{ asset('assets/vendor/magnific-popup/js/jquery.magnific-popup.min.js') }}"></script>
    {{-- Slick --}}
    <script src="{{ asset('assets/vendor/slick/js/slick.min.js') }}"></script>
    {{-- Images Loaded --}}
    <script src="{{ asset('assets/vendor/images-loaded/imagesloaded.pkgd.min.js') }}"></script>
    {{-- Isotope --}}
    <script src="{{ asset('assets/vendor/isotope/isotope.pkgd.min.js') }}"></script>
    {{-- GSAP Suite --}}
    <script src="{{ asset('assets/vendor/gsap/chroma.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/gsap/SplitText.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/gsap/ScrollSmoother.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/gsap/ScrollToPlugin.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/gsap/ScrollTrigger.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/gsap/gsap.min.js') }}"></script>
    {{-- Vanilla Tilt --}}
    <script src="{{ asset('assets/vendor/vanilla-tilt/tilt.jquery.js') }}"></script>
    {{-- Template plugins & main --}}
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    {{-- WhatsApp Widget --}}
    <script>
        var url = 'https://cdn.waplus.io/waplus-crm/settings/ossembed.js';
        var s = document.createElement('script');
        s.type = 'text/javascript'; s.async = true; s.src = url;
        var options = {
            "enabled": true,
            "chatButtonSetting": {
                "backgroundColor": "#61078B",
                "borderRadius": "12",
                "marginLeft": "20",
                "marginBottom": "50",
                "marginRight": "20",
                "position": "left",
                "textColor": "#ffffff",
                "phoneNumber": "+2347077776734",
                "messageText": "👋🏻 Hello, I'm visiting from your website"
            }
        };
        s.onload = function() { CreateWhatsappBtn(options); };
        var x = document.getElementsByTagName('script')[0];
        x.parentNode.insertBefore(s, x);
    </script>

    @stack('scripts')
</body>
</html>
