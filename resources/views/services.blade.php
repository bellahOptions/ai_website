@extends('layouts.theme')
@section('title', 'Our Services — AI Digital Agency')
@section('meta_description', 'Comprehensive social media management services: content strategy, creation, community management, brand positioning, and growth reporting.')

@section('content')

<x-page-banner title="Our Services" breadcrumb="Services" />

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
                        <h2><a href="#brand-positioning">Brand Positioning & Messaging <i class="fa-sharp fa-solid fa-arrow-up-right"></i></a></h2>
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
                    <h2 class="title title-anim">Content Strategy & Planning</h2>
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
<section class="section agency" id="content-creation" style="background:#fafafa;">
    <div class="container">
        <div class="row gaper align-items-center">
            <div class="col-12 col-lg-6 order-lg-2">
                <div class="agency__thumb">
                    <img src="{{ asset('assets/images/agency/thumb-two.png') }}" alt="Content Creation" class="thumb-one fade-right">
                </div>
            </div>
            <div class="col-12 col-lg-6 order-lg-1">
                <div class="agency__content section__content">
                    <span class="sub-title">SERVICE 02 <i class="fa-solid fa-arrow-right"></i></span>
                    <h2 class="title title-anim">Content Creation & Scheduling</h2>
                    <div class="paragraph">
                        <p>From compelling captions to eye-catching visuals, we create and schedule content that resonates.</p>
                    </div>
                    <div class="section__content-cta">
                        <a href="{{ route('contact.page') }}" class="btn btn--primary">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- ==== / service detail #2 end ==== --}}

{{-- ==== service detail #3 start ==== --}}
<section class="section agency" id="community">
    <div class="container">
        <div class="row gaper align-items-center">
            <div class="col-12 col-lg-6">
                <div class="agency__thumb">
                    <img src="{{ asset('assets/images/agency/thumb-one.png') }}" alt="Community Management" class="thumb-one fade-left">
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="agency__content section__content">
                    <span class="sub-title">SERVICE 03 <i class="fa-solid fa-arrow-right"></i></span>
                    <h2 class="title title-anim">Community Management</h2>
                    <div class="paragraph">
                        <p>We manage your community — responding to comments, DMs, and building authentic relationships with your audience.</p>
                    </div>
                    <div class="section__content-cta">
                        <a href="{{ route('contact.page') }}" class="btn btn--primary">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- ==== / service detail #3 end ==== --}}

{{-- ==== service detail #4 start ==== --}}
<section class="section agency" id="brand-positioning" style="background:#fafafa;">
    <div class="container">
        <div class="row gaper align-items-center">
            <div class="col-12 col-lg-6 order-lg-2">
                <div class="agency__thumb">
                    <img src="{{ asset('assets/images/agency/thumb-two.png') }}" alt="Brand Positioning" class="thumb-one fade-right">
                </div>
            </div>
            <div class="col-12 col-lg-6 order-lg-1">
                <div class="agency__content section__content">
                    <span class="sub-title">SERVICE 04 <i class="fa-solid fa-arrow-right"></i></span>
                    <h2 class="title title-anim">Brand Positioning & Messaging</h2>
                    <div class="paragraph">
                        <p>We help you define how your brand sounds and looks across every touchpoint — from bio copy to visual identity guardrails — so your audience recognizes you instantly.</p>
                    </div>
                    <div class="section__content-cta">
                        <a href="{{ route('contact.page') }}" class="btn btn--primary">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- ==== / service detail #4 end ==== --}}

{{-- ==== service detail #5 start ==== --}}
<section class="section agency" id="reporting">
    <div class="container">
        <div class="row gaper align-items-center">
            <div class="col-12 col-lg-6">
                <div class="agency__thumb">
                    <img src="{{ asset('assets/images/agency/thumb-one.png') }}" alt="Growth-Focused Reporting" class="thumb-one fade-left">
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="agency__content section__content">
                    <span class="sub-title">SERVICE 05 <i class="fa-solid fa-arrow-right"></i></span>
                    <h2 class="title title-anim">Growth-Focused Reporting</h2>
                    <div class="paragraph">
                        <p>You'll always know what's working. We share clear, jargon-free performance reports so you can see the direct link between our work and your growth.</p>
                    </div>
                    <div class="section__content-cta">
                        <a href="{{ route('contact.page') }}" class="btn btn--primary">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- ==== / service detail #5 end ==== --}}

{{-- ==== who we serve start ==== --}}
<section class="section fade-wrapper light" id="who-we-serve">
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
                <div class="value-card topy-tilt fade-top">
                    <div class="thumb"><i class="fa-solid fa-store"></i></div>
                    <div class="content"><h4>SMEs & Startups</h4><p>Small and medium enterprises building their digital presence from the ground up.</p></div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
                <div class="value-card topy-tilt fade-top">
                    <div class="thumb"><i class="fa-solid fa-hand-holding-heart"></i></div>
                    <div class="content"><h4>NGOs & Social Enterprises</h4><p>Mission-driven organisations amplifying their impact through strategic digital storytelling.</p></div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
                <div class="value-card topy-tilt fade-top">
                    <div class="thumb"><i class="fa-solid fa-briefcase"></i></div>
                    <div class="content"><h4>Service-Based Businesses</h4><p>Professionals who need their expertise to be seen by the right audience.</p></div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-3">
                <div class="value-card topy-tilt fade-top">
                    <div class="thumb"><i class="fa-solid fa-user-tie"></i></div>
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

<x-cta-marquee heading="Ready for a Custom Social Media Plan?" linkText="Contact Us Today" />

@endsection
