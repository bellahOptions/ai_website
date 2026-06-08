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

    <style>
        *, *::before, *::after { box-sizing: border-box; }
        body {
            font-family: 'Inter', system-ui, sans-serif;
            background: #f8f9fb;
            color: #111827;
            margin: 0;
        }

        /* ── Sidebar ── */
        .admin-sidebar {
            width: 240px;
            background: #fff;
            border-right: 1px solid #e9eaec;
            display: flex;
            flex-direction: column;
            position: fixed;
            inset: 0 auto 0 0;
            z-index: 30;
            box-shadow: 2px 0 8px rgba(0,0,0,.04);
        }
        .sidebar-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 18px 20px;
            border-bottom: 1px solid #f0f1f3;
            text-decoration: none;
        }
        .sidebar-logo-icon {
            width: 34px; height: 34px;
            border-radius: 9px;
            background: #61078B;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .sidebar-logo-text { line-height: 1.2; }
        .sidebar-logo-title { font-size: 13px; font-weight: 700; color: #111827; display: block; }
        .sidebar-logo-sub   { font-size: 11px; color: #9ca3af; display: block; }

        .sidebar-nav { flex: 1; padding: 12px 10px; overflow-y: auto; }
        .sidebar-section {
            font-size: 10.5px;
            font-weight: 600;
            color: #9ca3af;
            text-transform: uppercase;
            letter-spacing: .06em;
            padding: 14px 10px 6px;
        }
        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 10px;
            border-radius: 8px;
            font-size: 13.5px;
            font-weight: 500;
            color: #4b5563;
            text-decoration: none;
            transition: background 120ms, color 120ms;
            margin-bottom: 2px;
        }
        .sidebar-link:hover { background: #f5f0ff; color: #61078B; }
        .sidebar-link.active { background: #f3e8ff; color: #61078B; font-weight: 600; }
        .sidebar-link svg { opacity: .7; flex-shrink: 0; }
        .sidebar-link:hover svg, .sidebar-link.active svg { opacity: 1; }

        .sidebar-footer {
            padding: 12px 14px;
            border-top: 1px solid #f0f1f3;
        }
        .sidebar-user {
            display: flex; align-items: center; gap: 10px;
            padding: 8px; border-radius: 8px;
            margin-bottom: 6px;
        }
        .sidebar-avatar {
            width: 32px; height: 32px;
            border-radius: 50%;
            background: #61078B;
            color: white;
            display: flex; align-items: center; justify-content: center;
            font-size: 13px; font-weight: 700;
            flex-shrink: 0;
        }
        .sidebar-user-name  { font-size: 13px; font-weight: 600; color: #111827; display: block; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
        .sidebar-user-email { font-size: 11px; color: #9ca3af; display: block; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
        .sidebar-signout {
            display: flex; align-items: center; gap: 8px;
            width: 100%; padding: 7px 10px;
            background: none; border: none; cursor: pointer;
            font-size: 13px; color: #6b7280;
            border-radius: 7px;
            transition: background 120ms, color 120ms;
            font-family: inherit;
        }
        .sidebar-signout:hover { background: #fef2f2; color: #dc2626; }

        /* ── Main wrap ── */
        .admin-main { margin-left: 240px; display: flex; flex-direction: column; min-height: 100vh; }

        /* ── Top bar ── */
        .admin-topbar {
            height: 54px;
            background: #fff;
            border-bottom: 1px solid #e9eaec;
            display: flex; align-items: center;
            padding: 0 24px;
            position: sticky; top: 0; z-index: 20;
            gap: 12px;
        }
        .topbar-title { flex: 1; font-size: 14px; font-weight: 600; color: #374151; }
        .topbar-link {
            display: flex; align-items: center; gap: 5px;
            font-size: 12px; color: #9ca3af;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 6px;
            transition: background 120ms, color 120ms;
        }
        .topbar-link:hover { background: #f5f0ff; color: #61078B; }

        /* ── Flash messages ── */
        .flash-success {
            display: flex; align-items: center; gap: 10px;
            background: #f0fdf4; border: 1px solid #bbf7d0;
            color: #15803d; padding: 10px 14px;
            border-radius: 9px; font-size: 13.5px;
            margin-bottom: 16px;
        }
        .flash-error {
            display: flex; align-items: center; gap: 10px;
            background: #fef2f2; border: 1px solid #fecaca;
            color: #b91c1c; padding: 10px 14px;
            border-radius: 9px; font-size: 13.5px;
            margin-bottom: 16px;
        }
        .flash-errors {
            background: #fef2f2; border: 1px solid #fecaca;
            color: #b91c1c; padding: 10px 14px;
            border-radius: 9px; font-size: 13.5px;
            margin-bottom: 16px;
        }
        .flash-errors ul { margin: 0; padding-left: 16px; }
        .flash-errors li { margin-top: 2px; }

        /* ── Stat cards ── */
        .stat-card {
            background: #fff;
            border: 1px solid #e9eaec;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 1px 4px rgba(0,0,0,.05);
        }

        /* ── Badges ── */
        .badge {
            display: inline-flex; align-items: center;
            padding: 3px 10px;
            border-radius: 99px;
            font-size: 11.5px; font-weight: 600;
            white-space: nowrap;
        }
        .badge-draft     { background: #f3f4f6; color: #374151; }
        .badge-sent      { background: #eff6ff; color: #1d4ed8; }
        .badge-paid      { background: #f0fdf4; color: #15803d; }
        .badge-overdue   { background: #fef2f2; color: #b91c1c; }
        .badge-cancelled { background: #fefce8; color: #854d0e; }
        .badge-active    { background: #f0fdf4; color: #15803d; }
        .badge-inactive  { background: #f3f4f6; color: #6b7280; }

        /* ── Buttons ── */
        .btn { display: inline-flex; align-items: center; gap: 6px; padding: 8px 16px; border-radius: 8px; font-size: 13.5px; font-weight: 600; cursor: pointer; border: none; text-decoration: none; transition: background 120ms, box-shadow 120ms; font-family: inherit; }
        .btn-primary { background: #61078B; color: #fff; }
        .btn-primary:hover { background: #7c22a8; box-shadow: 0 2px 8px rgba(97,7,139,.35); }
        .btn-secondary { background: #fff; color: #374151; border: 1px solid #d1d5db; }
        .btn-secondary:hover { background: #f9fafb; }
        .btn-danger { background: #fff; color: #b91c1c; border: 1px solid #fca5a5; }
        .btn-danger:hover { background: #fef2f2; }
        .btn-blue { background: #3b82f6; color: #fff; }
        .btn-blue:hover { background: #2563eb; }
        .btn-green { background: #16a34a; color: #fff; }
        .btn-green:hover { background: #15803d; }
        .btn-sm { padding: 5px 11px; font-size: 12px; border-radius: 6px; }

        /* ── Table ── */
        .data-table { width: 100%; border-collapse: collapse; }
        .data-table thead tr { border-bottom: 1px solid #f0f1f3; background: #fafafa; }
        .data-table thead th { padding: 11px 16px; text-align: left; font-size: 11px; font-weight: 600; color: #9ca3af; text-transform: uppercase; letter-spacing: .05em; }
        .data-table thead th.text-right { text-align: right; }
        .data-table tbody tr { border-bottom: 1px solid #f5f6f8; transition: background 100ms; }
        .data-table tbody tr:last-child { border-bottom: none; }
        .data-table tbody tr:hover { background: #fafbff; }
        .data-table tbody td { padding: 13px 16px; font-size: 13.5px; color: #374151; vertical-align: middle; }
        .data-table tbody td.text-right { text-align: right; }

        /* ── Card ── */
        .admin-card {
            background: #fff;
            border: 1px solid #e9eaec;
            border-radius: 12px;
            box-shadow: 0 1px 4px rgba(0,0,0,.05);
            overflow: hidden;
        }
        .admin-card-header {
            display: flex; align-items: center; justify-content: space-between;
            padding: 14px 20px;
            border-bottom: 1px solid #f0f1f3;
        }
        .admin-card-title { font-size: 13.5px; font-weight: 600; color: #111827; }

        /* ── Form inputs ── */
        .form-input {
            width: 100%;
            padding: 9px 13px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 13.5px;
            color: #111827;
            background: #fff;
            font-family: inherit;
            transition: border 150ms, box-shadow 150ms;
            outline: none;
        }
        .form-input:focus {
            border-color: #a855f7;
            box-shadow: 0 0 0 3px rgba(168,85,247,.12);
        }
        .form-label {
            display: block;
            font-size: 13px; font-weight: 500;
            color: #374151;
            margin-bottom: 6px;
        }
        .form-label span.req { color: #ef4444; margin-left: 2px; }
        .form-group { margin-bottom: 0; }

        /* ── Page header ── */
        .page-header {
            display: flex; align-items: flex-start; justify-content: space-between;
            margin-bottom: 22px; margin-top: 4px;
        }
        .page-header h2 { font-size: 20px; font-weight: 700; color: #111827; margin: 0; }
        .page-header p  { font-size: 13px; color: #9ca3af; margin: 3px 0 0; }
        .back-link {
            display: inline-flex; align-items: center; gap: 5px;
            font-size: 13px; color: #6b7280;
            text-decoration: none;
            margin-bottom: 10px;
            transition: color 120ms;
        }
        .back-link:hover { color: #61078B; }

        /* ── Pagination override ── */
        nav[role="navigation"] span, nav[role="navigation"] a {
            font-size: 12.5px !important;
        }

        /* ── Scrollbar ── */
        ::-webkit-scrollbar { width: 5px; height: 5px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #d1d5db; border-radius: 99px; }
    </style>
    @stack('styles')
</head>
<body>
<div style="display:flex; min-height:100vh;">

    {{-- Sidebar --}}
    <aside class="admin-sidebar">
        <a href="{{ route('admin.dashboard') }}" class="sidebar-logo">
            <div class="sidebar-logo-icon">
                <svg width="17" height="17" viewBox="0 0 20 20" fill="white"><path d="M10 2L3 7v11h5v-5h4v5h5V7L10 2z"/></svg>
            </div>
            <div class="sidebar-logo-text">
                <span class="sidebar-logo-title">AI Digital Agency</span>
                <span class="sidebar-logo-sub">Admin Portal</span>
            </div>
        </a>

        <nav class="sidebar-nav">
            <div class="sidebar-section">Main</div>
            <a href="{{ route('admin.dashboard') }}"
               class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <svg width="17" height="17" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1.5"/><rect x="14" y="3" width="7" height="7" rx="1.5"/><rect x="3" y="14" width="7" height="7" rx="1.5"/><rect x="14" y="14" width="7" height="7" rx="1.5"/></svg>
                Dashboard
            </a>

            <div class="sidebar-section">Finance</div>
            <a href="{{ route('admin.invoices.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.invoices.*') ? 'active' : '' }}">
                <svg width="17" height="17" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
                Invoices
            </a>

            <div class="sidebar-section">CRM</div>
            <a href="{{ route('admin.clients.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.clients.*') ? 'active' : '' }}">
                <svg width="17" height="17" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                Clients
            </a>
        </nav>

        <div class="sidebar-footer">
            <div class="sidebar-user">
                <div class="sidebar-avatar">{{ substr(auth()->user()->name ?? 'A', 0, 1) }}</div>
                <div style="flex:1; min-width:0;">
                    <span class="sidebar-user-name">{{ auth()->user()->name ?? 'Admin' }}</span>
                    <span class="sidebar-user-email">{{ auth()->user()->email ?? '' }}</span>
                </div>
            </div>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="sidebar-signout">
                    <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                    Sign Out
                </button>
            </form>
        </div>
    </aside>

    {{-- Main content --}}
    <div class="admin-main">

        {{-- Top bar --}}
        <header class="admin-topbar">
            <span class="topbar-title">@yield('page_title', 'Dashboard')</span>
            <a href="{{ route('home.page') }}" target="_blank" class="topbar-link">
                <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                View Site
            </a>
        </header>

        {{-- Flash messages --}}
        <div style="padding: 16px 24px 0;">
            @if(session('success'))
            <div class="flash-success">
                <svg width="16" height="16" fill="#15803d" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                {{ session('success') }}
            </div>
            @endif
            @if(session('error'))
            <div class="flash-error">
                <svg width="16" height="16" fill="#b91c1c" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/></svg>
                {{ session('error') }}
            </div>
            @endif
            @if($errors->any())
            <div class="flash-errors">
                <ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
            </div>
            @endif
        </div>

        {{-- Page content --}}
        <main style="flex:1; padding: 6px 24px 40px;">
            @yield('content')
        </main>
    </div>
</div>
@stack('scripts')
</body>
</html>
