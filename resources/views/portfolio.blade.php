@extends('layouts.theme')
@section('title', 'Portfolio — AI Digital Agency')
@section('meta_description', 'A showcase of social media management and brand growth work done by AI Digital Agency.')

@section('content')

<x-page-banner title="Portfolio" />

<section class="section blog fade-wrapper">
    <div class="container">
        <div class="row gaper">
            @forelse($items as $item)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="blog__single fade-top">
                    <div class="blog__single-thumb topy-tilt">
                        <img src="{{ $item->imageUrl() }}" alt="{{ $item->title }}">
                    </div>
                    <div class="blog__single-content">
                        <h4>{{ $item->title }}</h4>
                        @if($item->category)
                        <div class="blog__single-meta">
                            <span class="sub-title">{{ $item->category }}</span>
                        </div>
                        @endif
                        @if($item->description)
                            <p class="mt-2">{{ $item->description }}</p>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center" style="padding:60px 0;">
                <p style="color:#9ca3af;">More work coming soon.</p>
            </div>
            @endforelse
        </div>
        <div class="row">
            <div class="col-12 mt-4">
                {{ $items->links() }}
            </div>
        </div>
    </div>
</section>

<x-cta-marquee heading="Ready to Get Started?" linkText="Book a Clarity Call" />

@endsection
