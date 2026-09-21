<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | AI Digital Agency</title>
    <meta name="robots" content="noindex, nofollow">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,500..800&family=Figtree:wght@400;500;600;700&display=swap" rel="stylesheet">
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css'])
    @endif
</head>
<body class="site-body">
    <div class="grid min-h-dvh lg:grid-cols-2">
        <div class="flex flex-col justify-between px-6 py-8 sm:px-12 lg:px-16">
            <a href="{{ url('/') }}" aria-label="AI Digital Agency, home">
                <img src="{{ asset('logo.svg') }}" alt="AI Digital Agency" class="h-9 w-auto">
            </a>

            <div class="py-16">
                <p class="font-display text-8xl font-extrabold leading-none tracking-tight text-brand sm:text-9xl">@yield('code')</p>
                <h1 class="mt-6 text-3xl font-bold tracking-tight sm:text-4xl">@yield('title')</h1>
                <p class="mt-4 max-w-md text-lg leading-8 text-ink-soft">@yield('message')</p>
                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <a href="{{ url('/') }}" class="btn-site btn-site-primary">Back to homepage</a>
                    <a href="{{ route('contact.page') }}" class="btn-site btn-site-outline">Contact us</a>
                </div>
            </div>

            <p class="text-sm text-ink-soft">&copy; {{ date('Y') }} AI Digital Agency</p>
        </div>

        <div class="relative hidden bg-ink lg:block">
            <img src="{{ \App\Support\Photos::url('office', 1200, 1400, 60) }}" alt="" class="absolute inset-0 h-full w-full object-cover opacity-60">
            <div class="absolute inset-0 bg-gradient-to-t from-ink/70 to-brand/30"></div>
        </div>
    </div>
</body>
</html>
