@extends('layouts.theme')
@section('title', $post->title . ' | AI Digital Agency')
@section('meta_description', $post->excerpt ?? $post->title)

@section('content')

<article class="pb-16 lg:pb-24">
    <header class="container-site max-w-4xl pt-10 sm:pt-16">
        <a href="{{ route('blog.list') }}" class="inline-flex min-h-11 items-center gap-2 text-[15px] font-medium text-ink-soft hover:text-brand">
            <x-icon name="arrow-right" :size="18" class="rotate-180" /> All articles
        </a>
        <div class="mt-4 flex items-center gap-3 text-sm text-ink-soft">
            @if($post->category)<span class="rounded-full bg-orchid px-3 py-1 font-semibold text-brand">{{ $post->category }}</span>@endif
            <time datetime="{{ $post->published_at->toDateString() }}">{{ $post->published_at->format('F j, Y') }}</time>
        </div>
        <h1 class="mt-5 text-4xl font-bold leading-[1.08] tracking-tight sm:text-6xl">{{ $post->title }}</h1>
        @if($post->excerpt)<p class="mt-5 max-w-2xl text-xl leading-9 text-ink-soft">{{ $post->excerpt }}</p>@endif
    </header>

    <div class="container-site mt-10 max-w-5xl">
        <div class="overflow-hidden rounded-[2rem] bg-orchid">
            <img src="{{ $post->coverUrl(1600, 900) }}" alt="" class="aspect-[16/9] w-full object-cover" fetchpriority="high">
        </div>
    </div>

    <div class="container-site mt-12 max-w-2xl">
        <div class="prose-site">{!! $post->body !!}</div>

        <div class="mt-12 rounded-3xl bg-orchid p-7">
            <p class="font-display text-xl font-semibold">Want this working for your brand?</p>
            <p class="mt-1 text-ink-soft">Book a clarity call and we'll map out a plan.</p>
            <a href="{{ route('contact.page') }}" class="btn-site btn-site-primary mt-5">Book a clarity call <x-icon name="arrow-right" :size="18" /></a>
        </div>
    </div>
</article>

@if($related->isNotEmpty())
<section class="bg-white py-16 lg:py-24">
    <div class="container-site">
        <h2 class="text-3xl font-bold tracking-tight sm:text-4xl">Keep reading</h2>
        <div class="mt-10 grid gap-8 md:grid-cols-2">
            @foreach($related as $relatedPost)<x-post-card :post="$relatedPost" />@endforeach
        </div>
    </div>
</section>
@endif

@endsection
