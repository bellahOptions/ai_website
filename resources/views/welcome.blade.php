@extends('layouts.theme')
@section('title', 'AI Digital Agency | Social media management for growing brands')
@section('meta_description', 'Strategic social media management that drives visibility, engagement, and growth for your brand.')

@php
    use App\Support\Photos;

    $services = [
        ['Content strategy & planning', 'A roadmap built on your audience, voice and goals before a single post goes live.', 'workshop', 'content-strategy'],
        ['Content creation & scheduling', 'Captions and visuals that resonate, published on a calendar you can see.', 'planning', 'content-creation'],
        ['Community management', 'We answer comments and DMs and build real relationships with your audience.', 'community', 'community'],
        ['Brand positioning & messaging', 'How your brand sounds and looks at every touchpoint, from bio copy to visual guardrails.', 'brand', 'brand-positioning'],
        ['Growth-focused reporting', 'Clear, jargon-free reports that link our work to your growth.', 'analytics', 'reporting'],
    ];

    $values = [
        ['target', 'Focused expertise', 'We do social media, and we do it exceptionally well.'],
        ['compass', 'Strategy before aesthetics', 'Every post, caption and campaign has a purpose. Beauty without direction does not convert.'],
        ['shield', 'Audacity with integrity', 'Bold brands, honest care. We never trade one for the other.'],
        ['sprout', 'Genuine care', 'We are personally invested in the long-term growth of every brand we manage.'],
    ];

    $audiences = [
        ['store', 'SMEs & startups', 'Building a digital presence from the ground up.'],
        ['heart-handshake', 'NGOs & social enterprises', 'Amplifying impact through digital storytelling.'],
        ['briefcase', 'Service-based businesses', 'Getting your expertise in front of the right people.'],
        ['sparkles', 'Creators & personal brands', 'Building influence and monetising your expertise.'],
    ];
@endphp

@section('content')

{{-- Hero --}}
<section class="relative overflow-hidden">
    <div class="container-site grid items-center gap-12 py-14 sm:py-20 lg:grid-cols-12 lg:gap-8 lg:py-24">
        <div class="lg:col-span-6">
            <h1 class="hero-rise text-[2.75rem] font-extrabold leading-[1.02] tracking-tight sm:text-6xl xl:text-7xl">
                Building brands that thrive, with audacity.
            </h1>
            <p class="hero-rise hero-rise-2 mt-6 max-w-lg text-lg leading-8 text-ink-soft">
                We take social media off your plate, so your brand shows up consistently, strategically and confidently while you run your business.
            </p>
            <div class="hero-rise hero-rise-3 mt-9 flex flex-col gap-3 sm:flex-row">
                <a href="{{ route('contact.page') }}" class="btn-site btn-site-primary">Book a clarity call <x-icon name="arrow-right" :size="18" /></a>
                <a href="{{ route('services.page') }}" class="btn-site btn-site-outline">See our services</a>
            </div>
            <dl class="hero-rise hero-rise-4 mt-12 flex gap-10 border-t border-line pt-6">
                <div>
                    <dt class="text-sm text-ink-soft">People on social media</dt>
                    <dd class="mt-1 font-display text-3xl font-bold">5.3B+</dd>
                </div>
                <div>
                    <dt class="text-sm text-ink-soft">Average daily use</dt>
                    <dd class="mt-1 font-display text-3xl font-bold">2h+</dd>
                </div>
            </dl>
        </div>

        <div class="hero-rise hero-rise-2 relative lg:col-span-6 lg:pl-6">
            <div class="relative ml-auto aspect-[4/5] w-[88%] overflow-hidden rounded-[2rem] bg-orchid sm:aspect-[5/5]">
                <img src="{{ Photos::url('hero', 1000, 1100) }}" alt="Two colleagues reviewing content on a laptop" class="h-full w-full object-cover" fetchpriority="high">
            </div>
            <div class="absolute -bottom-6 left-0 hidden w-[44%] overflow-hidden rounded-3xl border-[6px] border-paper bg-orchid sm:block">
                <img src="{{ Photos::url('hero-phone', 600, 700) }}" alt="Smartphone showing social media apps" class="aspect-[6/7] w-full object-cover">
            </div>
            <div class="absolute right-0 top-8 w-64 rounded-2xl border border-line bg-white p-4 sm:-right-2 lg:right-[-1.5rem]" aria-hidden="true">
                <p class="text-xs font-semibold text-ink-soft">This week's schedule</p>
                <ul class="mt-3 space-y-3 text-sm">
                    <li class="flex items-center gap-3"><span class="h-2.5 w-2.5 rounded-full bg-brand"></span><span><b class="font-semibold">Tue 9:00</b> Product reel<br><span class="text-ink-soft">Instagram</span></span></li>
                    <li class="flex items-center gap-3"><span class="h-2.5 w-2.5 rounded-full bg-marigold"></span><span><b class="font-semibold">Thu 12:30</b> Customer story<br><span class="text-ink-soft">LinkedIn</span></span></li>
                </ul>
            </div>
        </div>
    </div>
</section>

{{-- About --}}
<section class="py-20 lg:py-28">
    <div class="container-site grid items-center gap-12 lg:grid-cols-12 lg:gap-16">
        <div class="lg:col-span-5">
            <div class="overflow-hidden rounded-[2rem]">
                <img src="{{ Photos::url('team', 900, 1000) }}" alt="Team collaborating around a table" loading="lazy" class="aspect-[9/10] w-full object-cover">
            </div>
        </div>
        <div class="lg:col-span-7">
            <h2 class="max-w-2xl text-4xl font-bold leading-[1.08] tracking-tight sm:text-5xl">Results-driven social media management for growing brands</h2>
            <p class="mt-6 max-w-xl text-lg leading-8 text-ink-soft">
                AI Digital Agency helps brands stand out in a crowded digital space. We specialise in social media management, so your brand becomes visible, relevant and unforgettable online.
            </p>
            <ul class="mt-8 grid gap-4 sm:grid-cols-2">
                <li class="rounded-2xl border border-line bg-white p-5">
                    <x-icon name="compass" class="text-brand" :size="24" />
                    <p class="mt-3 font-display text-lg font-semibold">Content strategy</p>
                    <p class="mt-1 text-[15px] leading-7 text-ink-soft">Every post is planned around your goals and audience.</p>
                </li>
                <li class="rounded-2xl border border-line bg-white p-5">
                    <x-icon name="chart" class="text-brand" :size="24" />
                    <p class="mt-3 font-display text-lg font-semibold">Brand growth & engagement</p>
                    <p class="mt-1 text-[15px] leading-7 text-ink-soft">We track what works and double down on it.</p>
                </li>
            </ul>
            <a href="{{ route('about.page') }}" class="btn-site btn-site-outline mt-8">About us <x-icon name="arrow-right" :size="18" /></a>
        </div>
    </div>
</section>

{{-- Services --}}
<section class="bg-white py-20 lg:py-28">
    <div class="container-site grid gap-12 lg:grid-cols-12">
        <div class="lg:col-span-4">
            <div class="lg:sticky lg:top-28">
                <h2 class="text-4xl font-bold leading-[1.08] tracking-tight sm:text-5xl">Social media solutions that move the needle</h2>
                <p class="mt-6 text-lg leading-8 text-ink-soft">We don't just post. We manage your presence with intention, patience and long-term growth in mind.</p>
                <a href="{{ route('services.page') }}" class="btn-site btn-site-primary mt-8">View all services <x-icon name="arrow-right" :size="18" /></a>
            </div>
        </div>
        <ul class="lg:col-span-8">
            @foreach($services as [$title, $desc, $photo, $anchor])
                <li class="border-t border-line last:border-b">
                    <a href="{{ route('services.page') }}#{{ $anchor }}" class="group grid grid-cols-[auto_1fr_auto] items-center gap-5 py-6 sm:gap-8">
                        <img src="{{ Photos::url($photo, 300, 300) }}" alt="" loading="lazy" class="h-20 w-20 rounded-2xl object-cover sm:h-28 sm:w-28">
                        <span>
                            <span class="block font-display text-xl font-semibold leading-snug sm:text-2xl">{{ $title }}</span>
                            <span class="mt-1 block max-w-md text-[15px] leading-7 text-ink-soft">{{ $desc }}</span>
                        </span>
                        <span class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-line text-ink transition-colors group-hover:border-brand group-hover:bg-brand group-hover:text-white">
                            <x-icon name="arrow-up-right" :size="18" />
                        </span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</section>

{{-- Why us --}}
<section class="bg-ink py-20 text-white lg:py-28">
    <div class="container-site grid gap-12 lg:grid-cols-12">
        <div class="lg:col-span-5">
            <h2 class="text-4xl font-bold leading-[1.08] tracking-tight sm:text-5xl">Why brands choose AI Digital Agency</h2>
            <p class="mt-6 max-w-md text-lg leading-8 text-white/75">We're not a generic agency. We're a focused team personally invested in the growth of every brand we manage.</p>
        </div>
        <ul class="grid gap-4 sm:grid-cols-2 lg:col-span-7">
            @foreach($values as [$icon, $title, $text])
                <li class="rounded-3xl border border-white/10 bg-white/[0.04] p-7">
                    <span class="inline-flex h-12 w-12 items-center justify-center rounded-2xl bg-marigold text-ink"><x-icon :name="$icon" :size="24" /></span>
                    <h3 class="mt-5 text-xl font-semibold">{{ $title }}</h3>
                    <p class="mt-2 text-[15px] leading-7 text-white/70">{{ $text }}</p>
                </li>
            @endforeach
        </ul>
    </div>
</section>

{{-- Who we serve --}}
<section class="py-20 lg:py-28">
    <div class="container-site">
        <h2 class="max-w-2xl text-4xl font-bold leading-[1.08] tracking-tight sm:text-5xl">Trusted by SMEs, NGOs and growing brands</h2>
        <ul class="mt-12 grid gap-x-8 gap-y-10 sm:grid-cols-2 lg:grid-cols-4">
            @foreach($audiences as [$icon, $title, $text])
                <li class="border-t-2 border-brand pt-5">
                    <x-icon :name="$icon" class="text-brand" :size="28" />
                    <h3 class="mt-4 text-xl font-semibold">{{ $title }}</h3>
                    <p class="mt-2 text-[15px] leading-7 text-ink-soft">{{ $text }}</p>
                </li>
            @endforeach
        </ul>
    </div>
</section>

{{-- Testimonials --}}
<section class="bg-orchid py-20 lg:py-28">
    <div class="container-site">
        <h2 class="max-w-2xl text-4xl font-bold leading-[1.08] tracking-tight sm:text-5xl">What our clients say</h2>
        <div class="mt-12 grid gap-6 lg:grid-cols-2">
            <figure class="flex flex-col justify-between rounded-3xl bg-white p-8 sm:p-10">
                <blockquote class="font-display text-2xl font-medium leading-snug sm:text-[1.7rem]">
                    "Working with AI Digital Agency transformed our online presence. Their strategy-first approach helped us grow our following by 300% in just 4 months."
                </blockquote>
                <figcaption class="mt-8 flex items-center gap-4">
                    <img src="{{ Photos::url('portrait-f', 160, 160) }}" alt="" loading="lazy" class="h-14 w-14 rounded-full object-cover">
                    <span><b class="block font-semibold">Adaeze Okonkwo</b><span class="text-sm text-ink-soft">Founder, Bloom & Co.</span></span>
                </figcaption>
            </figure>
            <figure class="flex flex-col justify-between rounded-3xl bg-white p-8 sm:p-10">
                <blockquote class="font-display text-2xl font-medium leading-snug sm:text-[1.7rem]">
                    "They took social media completely off my plate. My brand now shows up consistently and my engagement has never been better. I can finally focus on running my business."
                </blockquote>
                <figcaption class="mt-8 flex items-center gap-4">
                    <img src="{{ Photos::url('portrait-m', 160, 160) }}" alt="" loading="lazy" class="h-14 w-14 rounded-full object-cover">
                    <span><b class="block font-semibold">Emeka Nwosu</b><span class="text-sm text-ink-soft">CEO, TechBridge NG</span></span>
                </figcaption>
            </figure>
        </div>
    </div>
</section>

{{-- Portfolio --}}
@if($portfolioItems->isNotEmpty())
<section class="py-20 lg:py-28">
    <div class="container-site">
        <div class="flex flex-col justify-between gap-6 sm:flex-row sm:items-end">
            <h2 class="max-w-2xl text-4xl font-bold leading-[1.08] tracking-tight sm:text-5xl">A look at work we've done</h2>
            <a href="{{ route('portfolio.page') }}" class="btn-site btn-site-outline self-start sm:self-auto">View portfolio <x-icon name="arrow-right" :size="18" /></a>
        </div>
        <ul class="mt-12 grid grid-cols-2 gap-4 lg:grid-cols-4">
            @foreach($portfolioItems as $item)
                <li class="group relative overflow-hidden rounded-2xl bg-orchid">
                    <img src="{{ $item->imageUrl() }}" alt="{{ $item->title }}" loading="lazy" class="aspect-square w-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <span class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-ink/85 to-transparent p-4 pt-12 text-sm font-semibold text-white">{{ $item->title }}</span>
                </li>
            @endforeach
        </ul>
    </div>
</section>
@endif

{{-- Blog --}}
@if($latestPosts->isNotEmpty())
<section class="bg-white py-20 lg:py-28">
    <div class="container-site">
        <div class="flex flex-col justify-between gap-6 sm:flex-row sm:items-end">
            <h2 class="max-w-2xl text-4xl font-bold leading-[1.08] tracking-tight sm:text-5xl">Insights on social media and brand growth</h2>
            <a href="{{ route('blog.list') }}" class="btn-site btn-site-outline self-start sm:self-auto">All articles <x-icon name="arrow-right" :size="18" /></a>
        </div>
        <div class="mt-12 grid gap-8 md:grid-cols-2">
            @foreach($latestPosts as $post)
                <x-post-card :post="$post" />
            @endforeach
        </div>
    </div>
</section>
@endif

<div class="pt-20 lg:pt-28">
    <x-cta-marquee heading="Ready to get started?" linkText="Book a clarity call" />
</div>

@endsection
