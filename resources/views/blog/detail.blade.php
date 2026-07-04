@extends('layouts.theme')
@section('title', $post->title . ' — AI Digital Agency')
@section('meta_description', $post->excerpt ?? $post->title)

@section('content')

<x-page-banner :title="$post->title" breadcrumb="Blog" />

<section class="section blog-details fade-wrapper light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-9">
                <div class="blog__single-thumb mb-4">
                    <img src="{{ asset('assets/images/blog/' . ($post->cover_image ?? 'one.png')) }}" alt="{{ $post->title }}" style="width:100%;border-radius:12px;">
                </div>
                <div class="blog__single-meta mb-4">
                    <span class="sub-title">{{ $post->category ?? 'insights' }} <i class="fa-solid fa-arrow-right"></i></span>
                    <p>{{ strtoupper($post->published_at->format('M j, Y')) }}</p>
                </div>
                <div class="paragraph">
                    {!! $post->body !!}
                </div>
            </div>
        </div>

        @if($related->isNotEmpty())
        <div class="row justify-content-center mt-5">
            <div class="col-12 col-lg-9">
                <div class="section__header">
                    <span class="sub-title">Related Posts <i class="fa-solid fa-arrow-right"></i></span>
                </div>
            </div>
        </div>
        <div class="row gaper justify-content-center">
            <div class="col-12 col-lg-9">
                <div class="row gaper">
                    @foreach($related as $relatedPost)
                    <div class="col-12 col-md-6">
                        <div class="blog__single fade-top">
                            <div class="blog__single-thumb topy-tilt">
                                <a href="{{ route('blog.detail', $relatedPost->slug) }}"><img src="{{ asset('assets/images/blog/' . ($relatedPost->cover_image ?? 'one.png')) }}" alt="{{ $relatedPost->title }}"></a>
                            </div>
                            <div class="blog__single-content">
                                <h4><a href="{{ route('blog.detail', $relatedPost->slug) }}">{{ $relatedPost->title }}</a></h4>
                                <div class="blog__single-meta">
                                    <a href="{{ route('blog.detail', $relatedPost->slug) }}" class="sub-title">{{ $relatedPost->category ?? 'insights' }} <i class="fa-solid fa-arrow-right"></i></a>
                                    <p>{{ strtoupper($relatedPost->published_at->format('M j, Y')) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
    </div>
</section>

<x-cta-marquee heading="Ready to Get Started?" linkText="Book a Clarity Call" />

@endsection
