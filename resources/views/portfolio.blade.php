@extends('layouts.theme')
@section('title', 'Portfolio | AI Digital Agency')
@section('meta_description', 'A showcase of social media management and brand growth work done by AI Digital Agency.')

@section('content')

<x-page-banner title="Work that builds brands" breadcrumb="Portfolio"
    intro="A look at the social media and brand growth work we've delivered." image="brand" />

<section class="py-16 lg:py-24">
    <div class="container-site">
        @if($items->isEmpty())
            <div class="mx-auto max-w-md py-16 text-center">
                <span class="mx-auto inline-flex h-14 w-14 items-center justify-center rounded-2xl bg-orchid text-brand"><x-icon name="image" :size="28" /></span>
                <h2 class="mt-6 text-2xl font-bold">New work is on its way</h2>
                <p class="mt-2 text-ink-soft">We're preparing case studies. In the meantime, tell us about your brand and we'll show you what we'd do.</p>
                <a href="{{ route('contact.page') }}" class="btn-site btn-site-primary mt-6">Start a conversation</a>
            </div>
        @else
            <ul class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($items as $item)
                    <li>
                        <div class="overflow-hidden rounded-3xl bg-orchid">
                            <img src="{{ $item->imageUrl() }}" alt="{{ $item->title }}" loading="lazy" class="aspect-[4/3] w-full object-cover">
                        </div>
                        @if($item->category)<p class="mt-4 text-sm font-semibold text-brand">{{ $item->category }}</p>@endif
                        <h2 class="mt-1 text-xl font-bold leading-snug">{{ $item->title }}</h2>
                        @if($item->description)<p class="mt-2 text-[15px] leading-7 text-ink-soft">{{ $item->description }}</p>@endif
                    </li>
                @endforeach
            </ul>
            @if($items->hasPages())<div class="mt-12">{{ $items->links() }}</div>@endif
        @endif
    </div>
</section>

<x-cta-marquee heading="Want results like these?" linkText="Book a clarity call" />

@endsection
