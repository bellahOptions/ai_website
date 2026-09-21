@extends('layouts.theme')
@section('title', 'Our services | AI Digital Agency')
@section('meta_description', 'Social media management services: content strategy, creation, community management, brand positioning, and growth reporting.')

@php
    use App\Support\Photos;

    $services = [
        [
            'id' => 'content-strategy', 'title' => 'Content strategy & planning', 'photo' => 'workshop', 'icon' => 'compass',
            'text' => 'We build data-informed content strategies aligned to your brand voice, audience, and goals. Before a single post goes live, we map out the roadmap that will guide your growth.',
            'points' => ['Audience research', 'Content calendar planning', 'Platform and format selection'],
        ],
        [
            'id' => 'content-creation', 'title' => 'Content creation & scheduling', 'photo' => 'planning', 'icon' => 'pen',
            'text' => 'From compelling captions to eye-catching visuals, we create and schedule content that resonates with your audience and keeps your brand consistently visible.',
            'points' => ['Captions and copywriting', 'Graphics and short-form video', 'Scheduling and publishing'],
        ],
        [
            'id' => 'community', 'title' => 'Community management', 'photo' => 'community', 'icon' => 'users',
            'text' => 'We manage your community by responding to comments and DMs and building authentic relationships with the people who follow you.',
            'points' => ['Comment and DM replies', 'Audience engagement', 'Reputation care'],
        ],
        [
            'id' => 'brand-positioning', 'title' => 'Brand positioning & messaging', 'photo' => 'brand', 'icon' => 'sparkles',
            'text' => 'We define how your brand sounds and looks across every touchpoint, from bio copy to visual identity guardrails, so your audience recognises you instantly.',
            'points' => ['Brand voice and tone', 'Bio and profile copy', 'Visual guidelines'],
        ],
        [
            'id' => 'reporting', 'title' => 'Growth-focused reporting', 'photo' => 'analytics', 'icon' => 'chart',
            'text' => "You'll always know what's working. We share clear, jargon-free performance reports so you can see the direct link between our work and your growth.",
            'points' => ['Monthly performance reports', 'Insights and recommendations', 'Goal tracking'],
        ],
    ];

    $audiences = [
        ['store', 'SMEs & startups', 'Small and medium enterprises building their digital presence from the ground up.'],
        ['heart-handshake', 'NGOs & social enterprises', 'Mission-driven organisations amplifying their impact through strategic digital storytelling.'],
        ['briefcase', 'Service-based businesses', 'Professionals who need their expertise to be seen by the right audience.'],
        ['sparkles', 'Creators & personal brands', 'Educators, coaches, and individuals building influence and monetising their expertise.'],
    ];
@endphp

@section('content')

<x-page-banner title="Strategic social media management built for growth" breadcrumb="Services"
    intro="We don't just post. We manage your presence with intention, patience, and long-term growth in mind." image="planning" />

<section class="py-8 lg:py-12">
    <div class="container-site">
        <nav aria-label="Services" class="-mx-5 overflow-x-auto px-5 sm:mx-0 sm:px-0">
            <ul class="flex gap-2 py-4 sm:flex-wrap">
                @foreach($services as $s)
                    <li class="shrink-0"><a href="#{{ $s['id'] }}" class="inline-flex min-h-11 items-center rounded-full border border-line bg-white px-5 text-[15px] font-medium transition-colors hover:border-brand hover:text-brand">{{ $s['title'] }}</a></li>
                @endforeach
            </ul>
        </nav>
    </div>
</section>

@foreach($services as $i => $s)
<section id="{{ $s['id'] }}" class="py-16 lg:py-24 {{ $i % 2 ? 'bg-white' : '' }}">
    <div class="container-site grid items-center gap-10 lg:grid-cols-12 lg:gap-16">
        <div class="lg:col-span-6 {{ $i % 2 ? 'lg:order-2' : '' }}">
            <div class="overflow-hidden rounded-[2rem] bg-orchid">
                <img src="{{ Photos::url($s['photo'], 1100, 800) }}" alt="{{ $s['title'] }}" loading="lazy" class="aspect-[11/8] w-full object-cover">
            </div>
        </div>
        <div class="lg:col-span-6 {{ $i % 2 ? 'lg:order-1' : '' }}">
            <span class="inline-flex h-12 w-12 items-center justify-center rounded-2xl bg-orchid text-brand"><x-icon :name="$s['icon']" :size="24" /></span>
            <h2 class="mt-5 text-3xl font-bold leading-[1.1] tracking-tight sm:text-4xl">{{ $s['title'] }}</h2>
            <p class="mt-4 max-w-xl text-lg leading-8 text-ink-soft">{{ $s['text'] }}</p>
            <ul class="mt-6 space-y-3">
                @foreach($s['points'] as $point)
                    <li class="flex items-center gap-3 text-[16px]"><x-icon name="check-circle" class="text-brand" :size="20" /> {{ $point }}</li>
                @endforeach
            </ul>
            <a href="{{ route('contact.page') }}" class="btn-site btn-site-primary mt-8">Get started <x-icon name="arrow-right" :size="18" /></a>
        </div>
    </div>
</section>
@endforeach

<section class="py-20 lg:py-28">
    <div class="container-site">
        <h2 class="max-w-2xl text-4xl font-bold leading-[1.08] tracking-tight sm:text-5xl">The right fit for growing brands</h2>
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

<x-cta-marquee heading="Ready for a custom social media plan?" linkText="Contact us today" />

@endsection
