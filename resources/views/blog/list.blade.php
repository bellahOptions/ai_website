@extends('layouts.theme')
@section('title', 'Blog | AI Digital Agency')
@section('meta_description', 'Insights on social media strategy and brand growth for Nigerian SMEs and growing brands.')

@section('content')

<x-page-banner title="Insights on social media and brand growth" breadcrumb="Blog" image="laptop" />

<section class="py-16 lg:py-24">
    <div class="container-site">
        @if($posts->isEmpty())
            <p class="py-16 text-center text-ink-soft">No articles published yet. Check back soon.</p>
        @else
            @php($featured = $posts->currentPage() === 1 ? $posts->first() : null)
            @if($featured)
                <article class="group grid items-center gap-8 lg:grid-cols-12 lg:gap-12">
                    <a href="{{ route('blog.detail', $featured->slug) }}" class="block overflow-hidden rounded-[2rem] bg-orchid lg:col-span-7">
                        <img src="{{ $featured->coverUrl(1200, 750) }}" alt="" class="aspect-[16/10] w-full object-cover transition-transform duration-500 group-hover:scale-105" fetchpriority="high">
                    </a>
                    <div class="lg:col-span-5">
                        <div class="flex items-center gap-3 text-sm text-ink-soft">
                            @if($featured->category)<span class="rounded-full bg-orchid px-3 py-1 font-semibold text-brand">{{ $featured->category }}</span>@endif
                            <time datetime="{{ $featured->published_at->toDateString() }}">{{ $featured->published_at->format('M j, Y') }}</time>
                        </div>
                        <h2 class="mt-4 text-3xl font-bold leading-tight tracking-tight sm:text-4xl"><a href="{{ route('blog.detail', $featured->slug) }}" class="hover:text-brand">{{ $featured->title }}</a></h2>
                        @if($featured->excerpt)<p class="mt-4 text-lg leading-8 text-ink-soft">{{ $featured->excerpt }}</p>@endif
                        <a href="{{ route('blog.detail', $featured->slug) }}" class="btn-site btn-site-outline mt-6">Read article <x-icon name="arrow-right" :size="18" /></a>
                    </div>
                </article>
            @endif

            @php($rest = $featured ? $posts->slice(1) : $posts)
            @if($rest->isNotEmpty())
                <div class="mt-16 grid gap-x-8 gap-y-14 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach($rest as $post)<x-post-card :post="$post" />@endforeach
                </div>
            @endif

            @if($posts->hasPages())<div class="mt-16">{{ $posts->links() }}</div>@endif
        @endif
    </div>
</section>

<x-cta-marquee heading="Ready to get started?" linkText="Book a clarity call" />

@endsection
