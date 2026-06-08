<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login — AI Digital Agency</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css'])
    @endif
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body { font-family: 'Inter', system-ui, sans-serif; }
    </style>
</head>
<body class="min-h-screen bg-gray-50 flex items-center justify-center p-4">

    <div class="w-full max-w-sm">

        {{-- Logo --}}
        <div class="text-center mb-8">
            <div class="w-14 h-14 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg" style="background:#61078B;">
                <svg width="28" height="28" viewBox="0 0 20 20" fill="white"><path d="M10 2L3 7v11h5v-5h4v5h5V7L10 2z"/></svg>
            </div>
            <h1 class="text-2xl font-bold text-gray-900">Admin Portal</h1>
            <p class="text-sm text-gray-500 mt-1">AI Digital Agency</p>
        </div>

        {{-- Card --}}
        <div class="bg-white border border-gray-200 rounded-2xl shadow-sm p-8">

            @if(session('error'))
            <div class="bg-red-50 border border-red-200 text-red-700 text-sm px-4 py-3 rounded-lg mb-5">
                {{ session('error') }}
            </div>
            @endif

            @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 text-sm px-4 py-3 rounded-lg mb-5">
                @foreach($errors->all() as $error)<p>{{ $error }}</p>@endforeach
            </div>
            @endif

            <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1.5">Email address</label>
                    <input
                        type="email" id="email" name="email" required autofocus
                        value="{{ old('email') }}"
                        class="w-full px-3.5 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent transition"
                        style="focus:ring-color:#61078B;"
                        placeholder="admin@aidigitalagency.com"
                    >
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1.5">Password</label>
                    <input
                        type="password" id="password" name="password" required
                        class="w-full px-3.5 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:border-transparent transition"
                        placeholder="••••••••"
                    >
                </div>

                <div class="flex items-center gap-2">
                    <input type="checkbox" id="remember" name="remember" class="rounded border-gray-300" style="accent-color:#61078B;">
                    <label for="remember" class="text-sm text-gray-600">Remember me</label>
                </div>

                <button type="submit"
                        class="w-full py-2.5 px-4 rounded-lg text-sm font-semibold text-white transition shadow-sm hover:shadow-md"
                        style="background:#61078B;"
                        onmouseover="this.style.background='#7c22a8'"
                        onmouseout="this.style.background='#61078B'">
                    Sign In to Admin
                </button>
            </form>
        </div>

        <p class="text-center text-xs text-gray-400 mt-6">
            <a href="{{ route('home.page') }}" class="hover:text-gray-600 transition-colors">← Back to website</a>
        </p>
    </div>

</body>
</html>
