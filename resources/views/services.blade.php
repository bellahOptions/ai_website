@extends('layouts.theme')
@section('title', 'Our Services — AI Digital Agency')
@section('meta_description', 'Comprehensive social media management services: content strategy, creation, community management, brand positioning, and growth reporting.')

@section('content')

{{-- ==== page header start ==== --}}
<section class="cmn-banner" data-background="{{ asset('assets/images/banner/cmn-banner-bg.png') }}">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cmn-banner__content">
                    <h2 class="title title-anim">Our Services</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home.page') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Services</li>
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

{{-- ==== services list start ==== --}}
<section class="section offer fade-wrapper light">
    <div class="container">
        <div class="row gaper">
            <div class="col-12 col-lg-5">
                <div class="offer__content section__content">
                    <span class="sub-title">WHAT WE DO <i class="fa-solid fa-arrow-right"></i></span>
                    <h2 class="title title-anim">Strategic Social Media Management Built for Growth</h2>
                    <div class="paragraph">
                        <p>We don't just post — we manage your presence with intention, patience, and long-term growth in mind. Every strategy is built around one goal: helping your brand thrive online.</p>
                    </div>
                    <div class="section__content-cta">
                        <a href="{{ route('contact.page') }}" class="btn btn--primary">Get a Custom Plan</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-7 col-xl-6 offset-xl-1">
                <div class="offer__cta">
                    <div class="offer__cta-single fade-top">
                        <span class="sub-title">01 <i class="fa-solid fa-arrow-right"></i></span>
                        <h2><a href="#content-strategy">Content Strategy & Planning <i class="fa-sharp fa-solid fa-arrow-up-right"></i></a></h2>
                        <div class="offer-thumb-hover d-none d-md-block" data-background="{{ asset('assets/images/offer/blog-thumb.png') }}"></div>
                    </div>
                    <div class="offer__cta-single fade-top">
                        <span class="sub-title">02 <i class="fa-solid fa-arrow-right"></i></span>
                        <h2><a href="#content-creation">Content Creation & Scheduling <i class="fa-sharp fa-solid fa-arrow-up-right"></i></a></h2>
                        <div class="offer-thumb-hover d-none d-md-block" data-background="{{ asset('assets/images/offer/two.png') }}"></div>
                    </div>
                    <div class="offer__cta-single fade-top">
                        <span class="sub-title">03 <i class="fa-solid fa-arrow-right"></i></span>
                        <h2><a href="#community">Community Management <i class="fa-sharp fa-solid fa-arrow-up-right"></i></a></h2>
                        <div class="offer-thumb-hover d-none d-md-block" data-background="{{ asset('assets/images/offer/three.png') }}"></div>
                    </div>
                    <div class="offer__cta-single fade-top">
                        <span class="sub-title">04 <i class="fa-solid fa-arrow-right"></i></span>
                        <h2><a href="#brand">Brand Positioning & Messaging <i class="fa-sharp fa-solid fa-arrow-up-right"></i></a></h2>
                        <div class="offer-thumb-hover d-none d-md-block" data-background="{{ asset('assets/images/offer/blog-thumb.png') }}"></div>
                    </div>
                    <div class="offer__cta-single fade-top">
                        <span class="sub-title">05 <i class="fa-solid fa-arrow-right"></i></span>
                        <h2><a href="#reporting">Growth-Focused Reporting <i class="fa-sharp fa-solid fa-arrow-up-right"></i></a></h2>
                        <div class="offer-thumb-hover d-none d-md-block" data-background="{{ asset('assets/images/offer/blog-thumb.png') }}"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <img src="{{ asset('assets/images/offer/star.png') }}" alt="" class="star">
    <div class="lines d-none d-lg-flex">
        <div class="line"></div><div class="line"></div><div class="line"></div>
        <div class="line"></div><div class="line"></div>
    </div>
</section>
{{-- ==== / services list end ==== --}}

{{-- ==== service detail #1 start ==== --}}
<section class="section agency" id="content-strategy">
    <div class="container">
        <div class="row gaper align-items-center">
            <div class="col-12 col-lg-6">
                <div class="agency__thumb">
                    <img src="{{ asset('assets/images/agency/thumb-one.png') }}" alt="Content Strategy" class="thumb-one fade-left">
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="agency__content section__content">
                    <span class="sub-title">SERVICE 01 <i class="fa-solid fa-arrow-right"></i></span>
                    <h2 class="title title-anim" id="content-creation">Content Strategy & Planning</h2>
                    <div class="paragraph">
                        <p>We build data-informed content strategies aligned to your brand voice, audience, and goals. Before a single post goes live, we map out the roadmap that will guide your growth.</p>
                    </div>
                    <div class="skill-wrap">
                        <div class="skill-bar-single">
                            <div class="skill-bar-title"><p class="primary-text">Audience Research</p></div>
                            <div class="skill-bar-wrapper" data-percent="95%">
                                <div class="skill-bar"><div class="skill-bar-percent"><span class="percent-value"></span></div></div>
                            </div>
                        </div>
                        <div class="skill-bar-single">
                            <div class="skill-bar-title"><p class="primary-text">Content Calendar Planning</p></div>
                            <div class="skill-bar-wrapper" data-percent="92%">
                                <div class="skill-bar"><div class="skill-bar-percent"><span class="percent-value"></span></div></div>
                            </div>
                        </div>
                    </div>
                    <div class="section__content-cta">
                        <a href="{{ route('contact.page') }}" class="btn btn--primary">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ==== service detail #2 start ==== --}}
<section class="section agency" id="community" style="background:#fafafa;">
    <div class="container">
        <div class="row gaper align-items-center">
            <div class="col-12 col-lg-6 order-lg-2">
                <div class="agency__thumb">
                    <img src="{{ asset('assets/images/agency/thumb-two.png') }}" alt="Community Management" class="thumb-one fade-right">
                </div>
            </div>
            <div class="col-12 col-lg-6 order-lg-1">
                <div class="agency__content section__content">
                    <span class="sub-title">SERVICE 02–03 <i class="fa-solid fa-arrow-right"></i></span>
                    <h2 class="title title-anim" id="brand">Content Creation & Community Management</h2>
                    <div class="paragraph">
                        <p>From compelling captions to eye-catching visuals, we create and schedule content that resonates. We also manage your community — responding to comments, DMs, and building authentic relationships with your audience.</p>
                    </div>
                    <div class="section__content-cta">
                        <a href="{{ route('contact.page') }}" class="btn btn--primary">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- ==== / service details end ==== --}}

{{-- ==== who we serve start ==== --}}
<section class="section fade-wrapper light" id="reporting">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="section__header text-center">
                    <span class="sub-title">WHO WE SERVE <i class="fa-solid fa-arrow-right"></i></span>
                    <h2 class="title title-anim">The Right Fit for Growing Brands</h2>
                </div>
            </div>
        </div>
        <div class="row gaper">
            <div class="col-12 col-md-6 col-xl-3">
                <div class="contact-m__single topy-tilt fade-top" style="padding:2rem;border:1px solid rgba(97,7,139,0.12);border-radius:12px;height:100%;">
                    <div class="thumb" style="margin-bottom:1.5rem;"><i class="fa-solid fa-store" style="font-size:2.5rem;color:#61078B;"></i></div>
                    <div class="content"><h4>SMEs & Startups</h4><p>Small and medium enterprises building their digital presence from the ground up.</p></div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
                <div class="contact-m__single topy-tilt fade-top" style="padding:2rem;border:1px solid rgba(97,7,139,0.12);border-radius:12px;height:100%;">
                    <div class="thumb" style="margin-bottom:1.5rem;"><i class="fa-solid fa-hand-holding-heart" style="font-size:2.5rem;color:#61078B;"></i></div>
                    <div class="content"><h4>NGOs & Social Enterprises</h4><p>Mission-driven organisations amplifying their impact through strategic digital storytelling.</p></div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
                <div class="contact-m__single topy-tilt fade-top" style="padding:2rem;border:1px solid rgba(97,7,139,0.12);border-radius:12px;height:100%;">
                    <div class="thumb" style="margin-bottom:1.5rem;"><i class="fa-solid fa-briefcase" style="font-size:2.5rem;color:#61078B;"></i></div>
                    <div class="content"><h4>Service-Based Businesses</h4><p>Professionals who need their expertise to be seen by the right audience.</p></div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
                <div class="contact-m__single topy-tilt fade-top" style="padding:2rem;border:1px solid rgba(97,7,139,0.12);border-radius:12px;height:100%;">
                    <div class="thumb" style="margin-bottom:1.5rem;"><i class="fa-solid fa-user-tie" style="font-size:2.5rem;color:#61078B;"></i></div>
                    <div class="content"><h4>Creators & Personal Brands</h4><p>Educators, coaches, and individuals building influence and monetising their expertise.</p></div>
                </div>
            </div>
        </div>
    </div>
    <div class="lines d-none d-lg-flex">
        <div class="line"></div><div class="line"></div><div class="line"></div>
        <div class="line"></div><div class="line"></div>
    </div>
</section>
{{-- ==== / who we serve end ==== --}}

{{-- ==== CTA start ==== --}}
<section class="section next-page light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="section__header text-center">
                    <a href="{{ route('contact.page') }}" class="sub-title mb-0">
                        Ready for a Custom Social Media Plan?
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="next__text-slider">
        @for($i = 0; $i < 6; $i++)
        <div class="next__text-slider-single">
            <h2 class="h1"><a href="{{ route('contact.page') }}">Contact Us Today <i class="fa-sharp fa-solid fa-arrow-down-right"></i></a></h2>
        </div>
        @endfor
    </div>
    <div class="lines d-none d-lg-flex">
        <div class="line"></div><div class="line"></div><div class="line"></div>
        <div class="line"></div><div class="line"></div>
    </div>
</section>

@endsection
