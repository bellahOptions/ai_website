<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') — AI Digital Agency</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    {{-- Tailwind via Vite --}}
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/base.css">
    @endif

    <style>
        /* shadcn-inspired purple admin design */
        :root {
            --brand: #61078B;
            --brand-light: #7c22a8;
            --brand-faint: #f3e8ff;
        }
        body { font-family: 'Inter', 'Segoe UI', system-ui, sans-serif; }
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        .sidebar-link { @apply flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-gray-600 hover:bg-purple-50 hover:text-purple-800 transition-all duration-150; }
        .sidebar-link.active { background: #f3e8ff; color: #61078B; font-weight: 600; }
        .stat-card { @apply bg-white border border-gray-200 rounded-xl p-5 shadow-sm; }
        .btn-primary { background: #61078B; color: white; }
        .btn-primary:hover { background: #7c22a8; }
        .badge { @apply inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold; }
        .badge-draft { @apply bg-gray-100 text-gray-700; }
        .badge-sent { @apply bg-blue-50 text-blue-700; }
        .badge-paid { @apply bg-green-50 text-green-700; }
        .badge-overdue { @apply bg-red-50 text-red-700; }
        .badge-cancelled { @apply bg-yellow-50 text-yellow-700; }
        .badge-active { @apply bg-green-50 text-green-700; }
        .badge-inactive { @apply bg-gray-100 text-gray-500; }
    </style>
    @stack('styles')
</head>
<body class="bg-gray-50 text-gray-900">

<div class="flex min-h-screen">

    {{-- Sidebar --}}
    <aside class="w-64 bg-white border-r border-gray-200 flex flex-col fixed inset-y-0 left-0 z-30 shadow-sm">

        {{-- Logo --}}
        <div class="px-6 py-5 border-b border-gray-100">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2">
                <div class="w-8 h-8 rounded-lg flex items-center justify-center" style="background:#61078B;">
                    <svg width="16" height="16" viewBox="0 0 20 20" fill="white"><path d="M10 2L3 7v11h5v-5h4v5h5V7L10 2z"/></svg>
                </div>
                <div>
                    <p class="text-sm font-bold text-gray-900">AI Digital Agency</p>
                    <p class="text-xs text-gray-400">Admin Portal</p>
                </div>
            </a>
        </div>

        {{-- Navigation --}}
        <nav class="flex-1 px-3 py-4 space-y-1 overflow-y-auto">
            <p class="px-3 mb-2 text-xs font-semibold text-gray-400 uppercase tracking-wider">Main</p>

            <a href="{{ route('admin.dashboard') }}"
               class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
                Dashboard
            </a>

            <p class="px-3 pt-4 mb-2 text-xs font-semibold text-gray-400 uppercase tracking-wider">Finance</p>

            <a href="{{ route('admin.invoices.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.invoices.*') ? 'active' : '' }}">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                Invoices
            </a>

            <p class="px-3 pt-4 mb-2 text-xs font-semibold text-gray-400 uppercase tracking-wider">CRM</p>

            <a href="{{ route('admin.clients.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.clients.*') ? 'active' : '' }}">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                Clients
            </a>
        </nav>

        {{-- User footer --}}
        <div class="px-4 py-4 border-t border-gray-100">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold text-white" style="background:#61078B;">
                    {{ substr(auth()->user()->name ?? 'A', 0, 1) }}
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900 truncate">{{ auth()->user()->name ?? 'Admin' }}</p>
                    <p class="text-xs text-gray-400 truncate">{{ auth()->user()->email ?? '' }}</p>
                </div>
            </div>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full text-left flex items-center gap-2 text-sm text-gray-500 hover:text-red-600 transition-colors px-1">
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                    Sign Out
                </button>
            </form>
        </div>
    </aside>

    {{-- Main content --}}
    <div class="flex-1 ml-64 flex flex-col min-h-screen">

        {{-- Top bar --}}
        <header class="h-14 bg-white border-b border-gray-200 flex items-center px-6 gap-4 sticky top-0 z-20">
            <div class="flex-1">
                <h1 class="text-sm font-semibold text-gray-700">@yield('page_title', 'Dashboard')</h1>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('home.page') }}" target="_blank"
                   class="text-xs text-gray-400 hover:text-purple-700 transition-colors flex items-center gap-1">
                    <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                    View Site
                </a>
            </div>
        </header>

        {{-- Flash messages --}}
        <div class="px-6 pt-4">
            @if(session('success'))
            <div class="flex items-center gap-3 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg text-sm mb-4">
                <svg width="16" height="16" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                {{ session('success') }}
            </div>
            @endif
            @if(session('error'))
            <div class="flex items-center gap-3 bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg text-sm mb-4">
                <svg width="16" height="16" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/></svg>
                {{ session('error') }}
            </div>
            @endif
            @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg text-sm mb-4">
                <ul class="space-y-1">
                    @foreach($errors->all() as $error)<li>• {{ $error }}</li>@endforeach
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
