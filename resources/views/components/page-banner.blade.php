@props(['title', 'breadcrumb' => null, 'intro' => null, 'image' => 'meeting'])

@php($breadcrumb = $breadcrumb ?? $title)

<section class="relative isolate overflow-hidden bg-ink text-white">
    <img src="{{ \App\Support\Photos::url($image, 1800, 700, 60) }}" alt="" class="absolute inset-0 -z-20 h-full w-full object-cover opacity-45" fetchpriority="high">
    <div class="absolute inset-0 -z-10 bg-gradient-to-r from-ink via-ink/85 to-ink/30"></div>
    <div class="container-site py-20 sm:py-28">
        <nav aria-label="Breadcrumb" class="hero-rise">
            <ol class="flex items-center gap-2 text-sm text-white/70">
                <li><a href="{{ route('home.page') }}" class="hover:text-white">Home</a></li>
                <li aria-hidden="true">/</li>
                <li aria-current="page" class="text-white">{{ \Illuminate\Support\Str::limit($breadcrumb, 40) }}</li>
            </ol>
        </nav>
        <h1 class="hero-rise hero-rise-2 mt-5 max-w-3xl text-4xl font-bold leading-[1.05] tracking-tight sm:text-6xl">{{ $title }}</h1>
        @if($intro)
            <p class="hero-rise hero-rise-3 mt-5 max-w-xl text-lg leading-8 text-white/80">{{ $intro }}</p>
        @endif
    </div>
</section>
