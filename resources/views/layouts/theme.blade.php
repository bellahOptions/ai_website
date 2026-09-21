<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-pt-24">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <meta name="theme-color" content="#61078B">

    <title>@yield('title', 'AI Digital Agency')</title>
    <meta name="description" content="@yield('meta_description', 'AI Digital Agency: strategic social media management that drives visibility, engagement, and growth for your brand.')">
    <meta property="og:title" content="@yield('title', 'AI Digital Agency')">
    <meta property="og:description" content="@yield('meta_description', 'Strategic social media management for growing brands.')">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ \App\Support\Photos::url('hero', 1200) }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,500..800&family=Figtree:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://images.unsplash.com">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="site-body">
    <a href="#main" class="sr-only focus:not-sr-only focus:fixed focus:left-4 focus:top-4 focus:z-[100] focus:rounded-full focus:bg-ink focus:px-5 focus:py-3 focus:text-white">Skip to content</a>

    @include('layouts.navbar')

    <main id="main">
        @yield('content')
    </main>

    @include('layouts.footer')

    <a href="https://wa.me/2349024083203?text=Hi%2C%20I%27d%20like%20to%20talk%20about%20growing%20my%20brand"
       target="_blank" rel="noopener"
       class="fixed bottom-5 right-5 z-40 inline-flex h-14 items-center gap-2 rounded-full bg-[#1f9d55] px-5 font-semibold text-white shadow-lg shadow-black/20 transition-colors hover:bg-[#178446] sm:bottom-6 sm:right-6"
       aria-label="Chat with us on WhatsApp">
        <x-icon name="message" :size="22" />
        <span class="hidden sm:inline">WhatsApp</span>
    </a>

    <script>
        (function () {
            var btn = document.getElementById('menu-toggle');
            var panel = document.getElementById('mobile-menu');
            if (!btn || !panel) return;
            function set(open) {
                btn.setAttribute('aria-expanded', open);
                panel.classList.toggle('hidden', !open);
                btn.querySelector('[data-open]').classList.toggle('hidden', open);
                btn.querySelector('[data-close]').classList.toggle('hidden', !open);
                document.body.classList.toggle('overflow-hidden', open);
            }
            btn.addEventListener('click', function () { set(btn.getAttribute('aria-expanded') !== 'true'); });
            document.addEventListener('keydown', function (e) { if (e.key === 'Escape') set(false); });
            panel.querySelectorAll('a').forEach(function (a) { a.addEventListener('click', function () { set(false); }); });
            var mq = window.matchMedia('(min-width: 1024px)');
            (mq.addEventListener ? mq.addEventListener.bind(mq, 'change') : mq.addListener.bind(mq))(function (e) { if (e.matches) set(false); });
        })();
    </script>
    @stack('scripts')
</body>
</html>
