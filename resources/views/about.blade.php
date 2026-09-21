@extends('layouts.theme')
@section('title', 'About us | AI Digital Agency')
@section('meta_description', 'AI Digital Agency is a results-driven social media management company helping brands become visible, relevant, and unforgettable.')

@php
    use App\Support\Photos;

    $values = [
        ['target', 'Focused expertise', "We're not scattered. We do social media and we do it exceptionally well."],
        ['compass', 'Strategy before aesthetics', "Every post, caption, and campaign has a purpose. Beauty without direction doesn't convert."],
        ['shield', 'Audacity with integrity', 'We help brands show up boldly while operating with honesty and genuine care.'],
        ['sprout', 'Genuine care', 'We are personally invested in the long-term growth of every brand we manage.'],
    ];
    $burdens = [
        'Plan content consistently',
        'Study trends and platform algorithms',
        'Show up online with clarity and intention',
        'Stay disciplined long enough to see results',
    ];
@endphp

@section('content')

<x-page-banner title="Empowering brands to show up boldly and grow with integrity" breadcrumb="About us" image="team" />

<section class="py-20 lg:py-28">
    <div class="container-site grid items-center gap-12 lg:grid-cols-12 lg:gap-16">
        <div class="lg:col-span-6">
            <h2 class="text-4xl font-bold leading-[1.08] tracking-tight sm:text-5xl">Our mission</h2>
            <div class="prose-site mt-6 max-w-xl">
                <p>AI Digital Agency is a results-driven digital solutions company helping brands stand out in today's crowded digital space. We currently specialise in social media management, helping brands become visible, relevant, and unforgettable online.</p>
                <p>We take social media off your plate, so you can focus on running your business while your brand shows up consistently, strategically, and confidently online.</p>
            </div>
            <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                <a href="{{ route('contact.page') }}" class="btn-site btn-site-primary">Work with us <x-icon name="arrow-right" :size="18" /></a>
                <a href="{{ route('services.page') }}" class="btn-site btn-site-outline">Our services</a>
            </div>
        </div>
        <div class="lg:col-span-6">
            <div class="overflow-hidden rounded-[2rem]">
                <img src="{{ Photos::url('workshop', 1100, 800) }}" alt="A team planning content on a whiteboard" class="aspect-[11/8] w-full object-cover">
            </div>
        </div>
    </div>
</section>

<section class="bg-white py-20 lg:py-28">
    <div class="container-site grid gap-12 lg:grid-cols-12">
        <div class="lg:col-span-5">
            <h2 class="text-4xl font-bold leading-[1.08] tracking-tight sm:text-5xl">Running a business already demands your full attention</h2>
            <div class="prose-site mt-6">
                <p>Most business owners understand that social media matters. Visibility leads to trust, and trust leads to sales. But social media takes time, consistency, and strategy.</p>
                <p>Over <strong class="text-ink">5.3 billion</strong> people spend <strong class="text-ink">2+ hours</strong> daily on social media. Your audience is already there, but staying visible takes more than occasional posting.</p>
            </div>
            <a href="{{ route('services.page') }}" class="btn-site btn-site-outline mt-2">See our solution <x-icon name="arrow-right" :size="18" /></a>
        </div>
        <div class="lg:col-span-7">
            <p class="font-display text-xl font-semibold">Doing it yourself means you have to:</p>
            <ol class="mt-6">
                @foreach($burdens as $i => $item)
                    <li class="flex items-baseline gap-5 border-t border-line py-6 last:border-b">
                        <span class="font-display text-lg font-semibold text-brand">{{ $i + 1 }}</span>
                        <span class="font-display text-2xl font-semibold leading-snug sm:text-3xl">{{ $item }}</span>
                    </li>
                @endforeach
            </ol>
        </div>
    </div>
</section>

<section class="py-20 lg:py-28">
    <div class="container-site">
        <h2 class="max-w-2xl text-4xl font-bold leading-[1.08] tracking-tight sm:text-5xl">What makes us different</h2>
        <ul class="mt-12 grid gap-5 sm:grid-cols-2 xl:grid-cols-4">
            @foreach($values as [$icon, $title, $text])
                <li class="rounded-3xl border border-line bg-white p-7">
                    <span class="inline-flex h-12 w-12 items-center justify-center rounded-2xl bg-orchid text-brand"><x-icon :name="$icon" :size="24" /></span>
                    <h3 class="mt-5 text-xl font-semibold">{{ $title }}</h3>
                    <p class="mt-2 text-[15px] leading-7 text-ink-soft">{{ $text }}</p>
                </li>
            @endforeach
        </ul>
    </div>
</section>

<x-cta-marquee heading="Ready to build your brand?" linkText="Book a clarity call" />

@endsection
