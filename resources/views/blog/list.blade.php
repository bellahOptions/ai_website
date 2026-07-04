@extends('layouts.theme')
@section('title', 'Blog — AI Digital Agency')
@section('meta_description', 'Insights on social media strategy and brand growth for Nigerian SMEs and growing brands.')

@section('content')

<x-page-banner title="Blog" />

<section class="section blog fade-wrapper">
    <div class="container">
        <div class="row gaper">
            @foreach($posts as $post)
            <div class="col-12 col-md-6">
                <div class="blog__single fade-top">
                    <div class="blog__single-thumb topy-tilt">
                        <a href="{{ route('blog.detail', $post->slug) }}"><img src="{{ asset('assets/images/blog/' . ($post->cover_image ?? 'one.png')) }}" alt="{{ $post->title }}"></a>
                    </div>
                    <div class="blog__single-content">
                        <h4><a href="{{ route('blog.detail', $post->slug) }}">{{ $post->title }}</a></h4>
                        <div class="blog__single-meta">
                            <a href="{{ route('blog.detail', $post->slug) }}" class="sub-title">{{ $post->category ?? 'insights' }} <i class="fa-solid fa-arrow-right"></i></a>
                            <p>{{ strtoupper($post->published_at->format('M j, Y')) }}</p>
                        </div>
                        @if($post->excerpt)
                            <p class="mt-2">{{ $post->excerpt }}</p>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12 mt-4">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</section>

<x-cta-marquee heading="Ready to Get Started?" linkText="Book a Clarity Call" />

@endsection
