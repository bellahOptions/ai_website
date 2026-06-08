@extends('layouts.theme')
@section('title', 'About Us — AI Digital Agency')
@section('meta_description', 'Learn about AI Digital Agency — a results-driven social media management company helping brands become visible, relevant, and unforgettable.')

@section('content')

{{-- ==== page header start ==== --}}
<section class="cmn-banner" data-background="{{ asset('assets/images/banner/cmn-banner-bg.png') }}">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cmn-banner__content">
                    <h2 class="title title-anim">About Us</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home.page') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">About Us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="lines d-none d-lg-flex">
        <div class="line"></div><div class="line"></div><div class="line"></div>
        <div class="line"></div><div class="line"></div>
    </div>
</section>
{{-- ==== / page header end ==== --}}

{{-- ==== agency / mission start ==== --}}
<section class="section agency">
    <div class="container">
        <div class="row gaper align-items-center">
            <div class="col-12 col-lg-6">
                <div class="agency__thumb">
                    <img src="{{ asset('assets/images/agency/thumb-one.png') }}" alt="Our Team" class="thumb-one fade-left">
                    <img src="{{ asset('assets/images/agency/thumb-two.png') }}" alt="Our Work" class="thumb-two fade-right">
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="agency__content section__content">
                    <span class="sub-title">OUR MISSION <i class="fa-solid fa-arrow-right"></i></span>
                    <h2 class="title title-anim">Empowering brands to show up boldly and grow with integrity</h2>
                    <div class="paragraph">
                        <p>AI Digital Agency is a results-driven digital solutions company helping brands stand out in today's crowded digital space. We currently specialize in social media management, helping brands become visible, relevant, and unforgettable online.</p>
                        <p style="margin-top:1rem;">Our mission is to empower brands to show up boldly and grow with integrity. We take social media off your plate, so you can focus on running your business, while your brand shows up consistently, strategically, and confidently online.</p>
                    </div>
                    <div class="skill-wrap">
                        <div class="skill-bar-single">
                            <div class="skill-bar-title"><p class="primary-text">Social Media Strategy</p></div>
                            <div class="skill-bar-wrapper" data-percent="94%">
                                <div class="skill-bar"><div class="skill-bar-percent"><span class="percent-value"></span></div></div>
                            </div>
                        </div>
                        <div class="skill-bar-single">
                            <div class="skill-bar-title"><p class="primary-text">Content Creation</p></div>
                            <div class="skill-bar-wrapper" data-percent="90%">
                                <div class="skill-bar"><div class="skill-bar-percent"><span class="percent-value"></span></div></div>
                            </div>
                        </div>
                        <div class="skill-bar-single">
                            <div class="skill-bar-title"><p class="primary-text">Community Management</p></div>
                            <div class="skill-bar-wrapper" data-percent="87%">
                                <div class="skill-bar"><div class="skill-bar-percent"><span class="percent-value"></span></div></div>
                            </div>
                        </div>
                    </div>
                    <div class="section__content-cta">
                        <a href="{{ route('contact.page') }}" class="btn btn--primary">Work With Us</a>
                        <a href="{{ route('services.page') }}" class="btn btn--secondary">Our Services</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <img src="{{ asset('assets/images/star.png') }}" alt="" class="star">
</section>
{{-- ==== / agency end ==== --}}

{{-- ==== the problem start ==== --}}
<section class="section offer fade-wrapper light">
    <div class="container">
        <div class="row gaper">
            <div class="col-12 col-lg-5">
                <div class="offer__content section__content">
                    <span class="sub-title">THE PROBLEM WE SOLVE <i class="fa-solid fa-arrow-right"></i></span>
                    <h2 class="title title-anim">Running a business already demands your full attention</h2>
                    <div class="paragraph">
                        <p>Most business owners understand that social media matters. They know visibility leads to trust, and trust leads to sales. But social media isn't magic — it requires time, consistency, and strategy.</p>
                        <p style="margin-top:1rem;">Over <strong>5.3 billion</strong> people spend <strong>2+ hours</strong> daily on social media. Your audience is already there, but staying visible requires more than occasional posting.</p>
                    </div>
                    <div class="section__content-cta">
                        <a href="{{ route('services.page') }}" class="btn btn--secondary">See Our Solution</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-7 col-xl-6 offset-xl-1">
                <div class="offer__cta">
                    <div class="offer__cta-single fade-top">
                        <span class="sub-title">01 <i class="fa-solid fa-arrow-right"></i></span>
                        <h2><a href="#">Plan content consistently <i class="fa-sharp fa-solid fa-arrow-up-right"></i></a></h2>
                    </div>
                    <div class="offer__cta-single fade-top">
                        <span class="sub-title">02 <i class="fa-solid fa-arrow-right"></i></span>
                        <h2><a href="#">Study trends & platform algorithms <i class="fa-sharp fa-solid fa-arrow-up-right"></i></a></h2>
                    </div>
                    <div class="offer__cta-single fade-top">
                        <span class="sub-title">03 <i class="fa-solid fa-arrow-right"></i></span>
                        <h2><a href="#">Show up online with clarity & intention <i class="fa-sharp fa-solid fa-arrow-up-right"></i></a></h2>
                    </div>
                    <div class="offer__cta-single fade-top">
                        <span class="sub-title">04 <i class="fa-solid fa-arrow-right"></i></span>
                        <h2><a href="#">Stay disciplined long enough to see results <i class="fa-sharp fa-solid fa-arrow-up-right"></i></a></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="lines d-none d-lg-flex">
        <div class="line"></div><div class="line"></div><div class="line"></div>
        <div class="line"></div><div class="line"></div>
    </div>
</section>
{{-- ==== / problem end ==== --}}

{{-- ==== values start ==== --}}
<section class="section fade-wrapper light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="section__header text-center">
                    <span class="sub-title">OUR VALUES <i class="fa-solid fa-arrow-right"></i></span>
                    <h2 class="title title-anim">What Makes Us Different</h2>
                </div>
            </div>
        </div>
        <div class="row gaper">
            <div class="col-12 col-md-6 col-xl-3">
                <div class="contact-m__single topy-tilt fade-top" style="padding:2rem; border:1px solid rgba(97,7,139,0.12); border-radius:12px; height:100%;">
                    <div class="thumb" style="margin-bottom:1.5rem;"><i class="fa-solid fa-bullseye" style="font-size:2.5rem;color:#61078B;"></i></div>
                    <div class="content">
                        <h4>Focused Expertise</h4>
                        <p>We're not scattered. We do social media and we do it exceptionally well.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
                <div class="contact-m__single topy-tilt fade-top" style="padding:2rem; border:1px solid rgba(97,7,139,0.12); border-radius:12px; height:100%;">
                    <div class="thumb" style="margin-bottom:1.5rem;"><i class="fa-solid fa-chess" style="font-size:2.5rem;color:#61078B;"></i></div>
                    <div class="content">
                        <h4>Strategy Before Aesthetics</h4>
                        <p>Every post, caption, and campaign has a purpose. Beauty without direction doesn't convert.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
                <div class="contact-m__single topy-tilt fade-top" style="padding:2rem; border:1px solid rgba(97,7,139,0.12); border-radius:12px; height:100%;">
                    <div class="thumb" style="margin-bottom:1.5rem;"><i class="fa-solid fa-shield-heart" style="font-size:2.5rem;color:#61078B;"></i></div>
                    <div class="content">
                        <h4>Audacity with Integrity</h4>
                        <p>We help brands show up boldly while operating with honesty and genuine care.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
                <div class="contact-m__single topy-tilt fade-top" style="padding:2rem; border:1px solid rgba(97,7,139,0.12); border-radius:12px; height:100%;">
                    <div class="thumb" style="margin-bottom:1.5rem;"><i class="fa-solid fa-seedling" style="font-size:2.5rem;color:#61078B;"></i></div>
                    <div class="content">
                        <h4>Genuine Care</h4>
                        <p>We are personally invested in the long-term growth of every brand we manage.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="lines d-none d-lg-flex">
        <div class="line"></div><div class="line"></div><div class="line"></div>
        <div class="line"></div><div class="line"></div>
    </div>
</section>
{{-- ==== / values end ==== --}}

{{-- ==== CTA start ==== --}}
<section class="section next-page light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="section__header text-center">
                    <a href="{{ route('contact.page') }}" class="sub-title mb-0">
                        Ready to Build Your Brand?
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="next__text-slider">
        @for($i = 0; $i < 6; $i++)
        <div class="next__text-slider-single">
            <h2 class="h1"><a href="{{ route('contact.page') }}">Book a Clarity Call <i class="fa-sharp fa-solid fa-arrow-down-right"></i></a></h2>
        </div>
        @endfor
    </div>
    <div class="lines d-none d-lg-flex">
        <div class="line"></div><div class="line"></div><div class="line"></div>
        <div class="line"></div><div class="line"></div>
    </div>
</section>

@endsection
