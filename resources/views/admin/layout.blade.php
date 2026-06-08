<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') — AI Digital Agency</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    @stack('styles')
</head>
<body class="bg-[#f8f9fb] text-gray-900" style="font-family:'Inter',system-ui,sans-serif;margin:0;">

<div class="flex min-h-screen">

    {{-- ── Sidebar ── --}}
    <aside class="w-60 bg-white border-r border-gray-200 flex flex-col fixed inset-y-0 left-0 z-30"
           style="box-shadow:2px 0 8px rgba(0,0,0,.04);">

        {{-- Logo --}}
        <a href="{{ route('admin.dashboard') }}"
           class="flex items-center gap-2.5 px-5 py-[18px] border-b border-gray-100 no-underline">
            <div class="w-[34px] h-[34px] rounded-[9px] bg-[#61078B] flex items-center justify-center shrink-0">
                <svg width="17" height="17" viewBox="0 0 20 20" fill="white">
                    <path d="M10 2L3 7v11h5v-5h4v5h5V7L10 2z"/>
                </svg>
            </div>
            <div class="leading-tight">
                <span class="block text-[13px] font-bold text-gray-900">AI Digital Agency</span>
                <span class="block text-[11px] text-gray-400">Admin Portal</span>
            </div>
        </a>

        {{-- Navigation --}}
        <nav class="flex-1 px-2.5 py-3 overflow-y-auto">

            <p class="px-2.5 pt-3.5 pb-1.5 text-[10.5px] font-semibold text-gray-400 uppercase tracking-[.06em]">
                Main
            </p>
            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center gap-2.5 px-2.5 py-2 rounded-lg text-[13.5px] font-medium no-underline mb-0.5 transition-colors duration-150
                      {{ request()->routeIs('admin.dashboard')
                           ? 'bg-[#f3e8ff] text-[#61078B] font-semibold'
                           : 'text-gray-600 hover:bg-[#f5f0ff] hover:text-[#61078B]' }}">
                <svg class="{{ request()->routeIs('admin.dashboard') ? 'opacity-100' : 'opacity-60' }} shrink-0"
                     width="17" height="17" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <rect x="3" y="3" width="7" height="7" rx="1.5"/>
                    <rect x="14" y="3" width="7" height="7" rx="1.5"/>
                    <rect x="3" y="14" width="7" height="7" rx="1.5"/>
                    <rect x="14" y="14" width="7" height="7" rx="1.5"/>
                </svg>
                Dashboard
            </a>

            <p class="px-2.5 pt-3.5 pb-1.5 text-[10.5px] font-semibold text-gray-400 uppercase tracking-[.06em]">
                Finance
            </p>
            <a href="{{ route('admin.invoices.index') }}"
               class="flex items-center gap-2.5 px-2.5 py-2 rounded-lg text-[13.5px] font-medium no-underline mb-0.5 transition-colors duration-150
                      {{ request()->routeIs('admin.invoices.*')
                           ? 'bg-[#f3e8ff] text-[#61078B] font-semibold'
                           : 'text-gray-600 hover:bg-[#f5f0ff] hover:text-[#61078B]' }}">
                <svg class="{{ request()->routeIs('admin.invoices.*') ? 'opacity-100' : 'opacity-60' }} shrink-0"
                     width="17" height="17" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                    <polyline points="14 2 14 8 20 8"/>
                    <line x1="16" y1="13" x2="8" y2="13"/>
                    <line x1="16" y1="17" x2="8" y2="17"/>
                </svg>
                Invoices
            </a>

            <p class="px-2.5 pt-3.5 pb-1.5 text-[10.5px] font-semibold text-gray-400 uppercase tracking-[.06em]">
                CRM
            </p>
            <a href="{{ route('admin.clients.index') }}"
               class="flex items-center gap-2.5 px-2.5 py-2 rounded-lg text-[13.5px] font-medium no-underline mb-0.5 transition-colors duration-150
                      {{ request()->routeIs('admin.clients.*')
                           ? 'bg-[#f3e8ff] text-[#61078B] font-semibold'
                           : 'text-gray-600 hover:bg-[#f5f0ff] hover:text-[#61078B]' }}">
                <svg class="{{ request()->routeIs('admin.clients.*') ? 'opacity-100' : 'opacity-60' }} shrink-0"
                     width="17" height="17" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                    <circle cx="9" cy="7" r="4"/>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                </svg>
                Clients
            </a>
        </nav>

        {{-- User footer --}}
        <div class="px-3.5 py-3 border-t border-gray-100">
            <div class="flex items-center gap-2.5 p-2 rounded-lg mb-1.5">
                <div class="w-8 h-8 rounded-full bg-[#61078B] text-white flex items-center justify-center text-[13px] font-bold shrink-0">
                    {{ substr(auth()->user()->name ?? 'A', 0, 1) }}
                </div>
                <div class="flex-1 min-w-0">
                    <span class="block text-[13px] font-semibold text-gray-900 truncate">
                        {{ auth()->user()->name ?? 'Admin' }}
                    </span>
                    <span class="block text-[11px] text-gray-400 truncate">
                        {{ auth()->user()->email ?? '' }}
                    </span>
                </div>
            </div>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit"
                        class="flex items-center gap-2 w-full px-2.5 py-[7px] bg-transparent border-none cursor-pointer text-[13px] text-gray-500 rounded-[7px] transition-colors hover:bg-red-50 hover:text-red-600"
                        style="font-family:inherit;">
                    <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                        <polyline points="16 17 21 12 16 7"/>
                        <line x1="21" y1="12" x2="9" y2="12"/>
                    </svg>
                    Sign Out
                </button>
            </form>
        </div>
    </aside>

    {{-- ── Main content ── --}}
    <div class="ml-60 flex flex-col min-h-screen flex-1">

        {{-- Top bar --}}
        <header class="h-[54px] bg-white border-b border-gray-200 flex items-center px-6 sticky top-0 z-20 gap-3">
            <span class="flex-1 text-sm font-semibold text-gray-700">
                @yield('page_title', 'Dashboard')
            </span>
            <a href="{{ route('home.page') }}" target="_blank"
               class="flex items-center gap-1.5 text-xs text-gray-400 no-underline px-2.5 py-[5px] rounded-md transition-colors hover:bg-[#f5f0ff] hover:text-[#61078B]">
                <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/>
                    <polyline points="15 3 21 3 21 9"/>
                    <line x1="10" y1="14" x2="21" y2="3"/>
                </svg>
                View Site
            </a>
        </header>

        {{-- Flash messages --}}
        <div class="px-6 pt-4">
            @if(session('success'))
            <div class="flex items-center gap-2.5 bg-green-50 border border-green-200 text-green-700 px-3.5 py-2.5 rounded-[9px] text-[13.5px] mb-4">
                <svg class="shrink-0" width="16" height="16" fill="#15803d" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div class="flex items-center gap-2.5 bg-red-50 border border-red-200 text-red-700 px-3.5 py-2.5 rounded-[9px] text-[13.5px] mb-4">
                <svg class="shrink-0" width="16" height="16" fill="#b91c1c" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                </svg>
                {{ session('error') }}
            </div>
            @endif

            @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 px-3.5 py-2.5 rounded-[9px] text-[13.5px] mb-4">
                <ul class="m-0 pl-4 space-y-0.5">
                    @foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach
                </ul>
            </div>
            @endif
        </div>

        {{-- Page content --}}
        <main class="flex-1 px-6 pb-10">
            @yield('content')
        </main>
    </div>
</div>

@stack('scripts')
</body>
</html>
