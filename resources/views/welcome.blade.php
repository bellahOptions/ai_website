@extends('layouts.theme')
@section('title', 'AI Digital Agency — Building Brands That Thrive')
@section('meta_description', 'Strategic social media management that drives visibility, engagement, and growth for your brand.')

@section('content')

{{-- ==== banner start ==== --}}
<section class="banner">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="banner__content">
                    <h1 class="text-uppercase text-start fw-9 mb-0 title-anim">
                        Building Brands
                        <span class="text-stroke">That Thrive</span>
                        <span class="interval">
                            <i class="icon-arrow-top-right"></i>
                            with Audacity
                        </span>
                    </h1>
                    <div class="banner__content-inner">
                        <p>We help brands show up boldly through strategic social media management that drives visibility, engagement, and long-term growth.</p>
                        <div class="cta section__content-cta">
                            <div class="single">
                                <h5 class="fw-7">5.3B+</h5>
                                <p class="fw-5">people on social media</p>
                            </div>
                            <div class="single">
                                <h5 class="fw-7">2h+</h5>
                                <p class="fw-5">avg daily usage</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <img src="{{ asset('assets/images/banner/banner-one-thumb.png') }}" alt="AI Digital Agency" class="banner-one-thumb d-none d-sm-block g-ban-one">
    <img src="{{ asset('assets/images/star.png') }}" alt="" class="star">
    <div class="banner-left-text banner-social-text d-none d-md-flex">
        <a href="tel:+2347077776734">Call : +234 707 777 6734</a>
        <a href="mailto:aidigitalagency08@gmail.com">mail : aidigitalagency08@gmail.com</a>
    </div>
    <div class="banner-right-text banner-social-text d-none d-md-flex">
        <a href="#" target="_blank">Instagram</a>
        <a href="#" target="_blank">LinkedIn</a>
        <a href="#" target="_blank">Facebook</a>
    </div>
    <div class="lines d-none d-lg-flex">
        <div class="line"></div><div class="line"></div><div class="line"></div>
        <div class="line"></div><div class="line"></div>
    </div>
</section>
{{-- ==== / banner end ==== --}}

{{-- ==== agency / about intro start ==== --}}
<section class="section agency">
    <div class="container">
        <div class="row gaper align-items-center">
            <div class="col-12 col-lg-6">
                <div class="agency__thumb">
                    <img src="{{ asset('assets/images/agency/thumb-one.png') }}" alt="AI Digital Agency Team" class="thumb-one fade-left">
                    <img src="{{ asset('assets/images/agency/thumb-two.png') }}" alt="AI Digital Agency Work" class="thumb-two fade-right">
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="agency__content section__content">
                    <span class="sub-title">
                        WHO WE ARE
                        <i class="fa-solid fa-arrow-right"></i>
                    </span>
                    <h2 class="title title-anim">
                        Results-driven social media management for growing brands
                    </h2>
                    <div class="paragraph">
                        <p>AI Digital Agency is a results-driven digital solutions company helping brands stand out in today's crowded digital space. We specialize in social media management — helping brands become visible, relevant, and unforgettable online.</p>
                    </div>
                    <div class="skill-wrap">
                        <div class="skill-bar-single">
                            <div class="skill-bar-title"><p class="primary-text">Content Strategy</p></div>
                            <div class="skill-bar-wrapper" data-percent="92%">
                                <div class="skill-bar"><div class="skill-bar-percent"><span class="percent-value"></span></div></div>
                            </div>
                        </div>
                        <div class="skill-bar-single">
                            <div class="skill-bar-title"><p class="primary-text">Brand Growth & Engagement</p></div>
                            <div class="skill-bar-wrapper" data-percent="88%">
                                <div class="skill-bar"><div class="skill-bar-percent"><span class="percent-value"></span></div></div>
                            </div>
                        </div>
                    </div>
                    <div class="section__content-cta">
                        <a href="{{ route('about.page') }}" class="btn btn--primary">Know More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <img src="{{ asset('assets/images/star.png') }}" alt="" class="star">
    <img src="{{ asset('assets/images/agency/dot-large.png') }}" alt="" class="dot-large">
</section>
{{-- ==== / agency end ==== --}}

{{-- ==== services / offer start ==== --}}
<section class="section offer fade-wrapper light">
    <div class="container">
        <div class="row gaper">
            <div class="col-12 col-lg-5">
                <div class="offer__content section__content">
                    <span class="sub-title">
                        WHAT WE OFFER
                        <i class="fa-solid fa-arrow-right"></i>
                    </span>
                    <h2 class="title title-anim">
                        Social Media Solutions That Move the Needle
                    </h2>
                    <div class="paragraph">
                        <p>We don't just post — we manage your presence with intention, patience, and long-term growth in mind. Every strategy is built around one goal: helping your brand thrive online.</p>
                    </div>
                    <div class="section__content-cta">
                        <a href="{{ route('services.page') }}" class="btn btn--secondary">View All Services</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-7 col-xl-6 offset-xl-1">
                <div class="offer__cta">
                    <div class="offer__cta-single fade-top">
                        <span class="sub-title">01 <i class="fa-solid fa-arrow-right"></i></span>
                        <h2>
                            <a href="{{ route('services.page') }}">Content Strategy & Planning <i class="fa-sharp fa-solid fa-arrow-up-right"></i></a>
                        </h2>
                        <div class="offer-thumb-hover d-none d-md-block" data-background="{{ asset('assets/images/offer/blog-thumb.png') }}"></div>
                    </div>
                    <div class="offer__cta-single fade-top">
                        <span class="sub-title">02 <i class="fa-solid fa-arrow-right"></i></span>
                        <h2>
                            <a href="{{ route('services.page') }}">Content Creation & Scheduling <i class="fa-sharp fa-solid fa-arrow-up-right"></i></a>
                        </h2>
                        <div class="offer-thumb-hover d-none d-md-block" data-background="{{ asset('assets/images/offer/two.png') }}"></div>
                    </div>
                    <div class="offer__cta-single fade-top">
                        <span class="sub-title">03 <i class="fa-solid fa-arrow-right"></i></span>
                        <h2>
                            <a href="{{ route('services.page') }}">Community Management <i class="fa-sharp fa-solid fa-arrow-up-right"></i></a>
                        </h2>
                        <div class="offer-thumb-hover d-none d-md-block" data-background="{{ asset('assets/images/offer/three.png') }}"></div>
                    </div>
                    <div class="offer__cta-single fade-top">
                        <span class="sub-title">04 <i class="fa-solid fa-arrow-right"></i></span>
                        <h2>
                            <a href="{{ route('services.page') }}">Brand Positioning & Messaging <i class="fa-sharp fa-solid fa-arrow-up-right"></i></a>
                        </h2>
                        <div class="offer-thumb-hover d-none d-md-block" data-background="{{ asset('assets/images/offer/blog-thumb.png') }}"></div>
                    </div>
                    <div class="offer__cta-single fade-top">
                        <span class="sub-title">05 <i class="fa-solid fa-arrow-right"></i></span>
                        <h2>
                            <a href="{{ route('services.page') }}">Growth-Focused Reporting <i class="fa-sharp fa-solid fa-arrow-up-right"></i></a>
                        </h2>
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
{{-- ==== / offer end ==== --}}

{{-- ==== why us start ==== --}}
<section class="section why-choose fade-wrapper light">
    <div class="container">
        <div class="row gaper align-items-center">
            <div class="col-12 col-lg-5">
                <div class="section__content">
                    <span class="sub-title">
                        WHY CHOOSE US
                        <i class="fa-solid fa-arrow-right"></i>
                    </span>
                    <h2 class="title title-anim">Why Brands Choose AI Digital Agency</h2>
                    <div class="paragraph">
                        <p>We're not a generic agency. We're a focused team personally invested in the growth of every brand we manage.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 offset-lg-1">
                <div class="offer__cta">
                    <div class="offer__cta-single fade-top">
                        <span class="sub-title">01 <i class="fa-solid fa-arrow-right"></i></span>
                        <h2><a href="{{ route('about.page') }}">Focused Expertise — we do social media and we do it well <i class="fa-sharp fa-solid fa-arrow-up-right"></i></a></h2>
                    </div>
                    <div class="offer__cta-single fade-top">
                        <span class="sub-title">02 <i class="fa-solid fa-arrow-right"></i></span>
                        <h2><a href="{{ route('about.page') }}">Strategy Before Aesthetics — every post has a purpose <i class="fa-sharp fa-solid fa-arrow-up-right"></i></a></h2>
                    </div>
                    <div class="offer__cta-single fade-top">
                        <span class="sub-title">03 <i class="fa-solid fa-arrow-right"></i></span>
                        <h2><a href="{{ route('about.page') }}">Audacity with Integrity — bold brands, honest care <i class="fa-sharp fa-solid fa-arrow-up-right"></i></a></h2>
                    </div>
                    <div class="offer__cta-single fade-top">
                        <span class="sub-title">04 <i class="fa-solid fa-arrow-right"></i></span>
                        <h2><a href="{{ route('about.page') }}">Genuine Care — invested in your long-term success <i class="fa-sharp fa-solid fa-arrow-up-right"></i></a></h2>
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
{{-- ==== / why us end ==== --}}

{{-- ==== clients / sponsor start ==== --}}
<div class="sponsor section pb-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="section__header text-center">
                    <span class="sub-title">
                        OUR CLIENTS
                        <i class="fa-solid fa-arrow-right"></i>
                    </span>
                    <h2 class="title title-anim">Trusted by SMEs, NGOs & Growing Brands</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="sponsor__slider">
                    <div class="sponsor__slider-item"><img src="{{ asset('assets/images/sponsor/one-dark.png') }}" alt="Client"></div>
                    <div class="sponsor__slider-item"><img src="{{ asset('assets/images/sponsor/two-dark.png') }}" alt="Client"></div>
                    <div class="sponsor__slider-item"><img src="{{ asset('assets/images/sponsor/three-dark.png') }}" alt="Client"></div>
                    <div class="sponsor__slider-item"><img src="{{ asset('assets/images/sponsor/four-dark.png') }}" alt="Client"></div>
                    <div class="sponsor__slider-item"><img src="{{ asset('assets/images/sponsor/five-dark.png') }}" alt="Client"></div>
                    <div class="sponsor__slider-item"><img src="{{ asset('assets/images/sponsor/six-dark.png') }}" alt="Client"></div>
                    <div class="sponsor__slider-item"><img src="{{ asset('assets/images/sponsor/one-dark.png') }}" alt="Client"></div>
                    <div class="sponsor__slider-item"><img src="{{ asset('assets/images/sponsor/two-dark.png') }}" alt="Client"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="lines d-none d-lg-flex">
        <div class="line"></div><div class="line"></div><div class="line"></div>
        <div class="line"></div><div class="line"></div>
    </div>
</div>
{{-- ==== / sponsor end ==== --}}

{{-- ==== testimonial start ==== --}}
<section class="section testimonial pt-0 position-relative">
    <div class="testimonial__text-slider">
        @for($i = 0; $i < 6; $i++)
        <div class="testimonial__text-slider-single">
            <h2 class="h1"><a href="{{ route('contact.page') }}">client's testimonial <i class="fa-sharp fa-solid fa-arrow-down-right"></i></a></h2>
        </div>
        @endfor
    </div>
    <div class="container position-relative">
        <div class="row">
            <div class="col-12 col-xxl-10">
                <div class="testimonial-s__slider">
                    <div class="testimonial-s__slider-single">
                        <div class="row gaper align-items-center">
                            <div class="col-12 col-lg-4">
                                <div class="thumb">
                                    <img src="{{ asset('assets/images/testimonial/s-thumb.png') }}" alt="Client">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="44" height="322" viewBox="0 0 44 322" fill="none"><path d="M43 0V152L2 193H43V322" stroke="#D9D9D9"/></svg>
                                </div>
                            </div>
                            <div class="col-12 col-lg-7 offset-lg-1">
                                <div class="testimonial-s__content">
                                    <div class="quote"><i class="fa-solid fa-quote-right"></i></div>
                                    <div class="content">
                                        <h4>Working with AI Digital Agency transformed our online presence. Their strategy-first approach helped us grow our following by 300% in just 4 months. Highly recommended.</h4>
                                    </div>
                                    <div class="content-cta">
                                        <h5>Adaeze Okonkwo</h5>
                                        <p>Founder, Bloom & Co.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-s__slider-single">
                        <div class="row gaper align-items-center">
                            <div class="col-12 col-lg-4">
                                <div class="thumb">
                                    <img src="{{ asset('assets/images/testimonial/s-thumb-two.png') }}" alt="Client">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="44" height="322" viewBox="0 0 44 322" fill="none"><path d="M43 0V152L2 193H43V322" stroke="#D9D9D9"/></svg>
                                </div>
                            </div>
                            <div class="col-12 col-lg-7 offset-lg-1">
                                <div class="testimonial-s__content">
                                    <div class="quote"><i class="fa-solid fa-quote-right"></i></div>
                                    <div class="content">
                                        <h4>They took social media completely off my plate. My brand now shows up consistently and my engagement rates have never been better. I can finally focus on running my business.</h4>
                                    </div>
                                    <div class="content-cta">
                                        <h5>Emeka Nwosu</h5>
                                        <p>CEO, TechBridge NG</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slide-group justify-content-start">
            <a href="javascript:void(0)" aria-label="previous" class="slide-btn prev-testimonial-three"><i class="fa-light fa-angle-left"></i></a>
            <a href="javascript:void(0)" aria-label="next" class="slide-btn next-testimonial-three"><i class="fa-light fa-angle-right"></i></a>
        </div>
    </div>
    <div class="other-section">
        <img class="other-section-image" src="{{ asset('assets/images/testimonial/s-thumb.png') }}" alt="">
    </div>
    <div class="lines d-none d-lg-flex">
        <div class="line"></div><div class="line"></div><div class="line"></div>
        <div class="line"></div><div class="line"></div>
    </div>
</section>
{{-- ==== / testimonial end ==== --}}

{{-- ==== blog start ==== --}}
<section class="section blog fade-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="section__header text-center">
                    <span class="sub-title">News & Blog <i class="fa-solid fa-arrow-right"></i></span>
                    <h2 class="title title-anim">Insights on Social Media & Brand Growth</h2>
                </div>
            </div>
        </div>
        <div class="row gaper">
            <div class="col-12 col-md-6">
                <div class="blog__single fade-top">
                    <div class="blog__single-thumb topy-tilt">
                        <a href="{{ route('blog.list') }}"><img src="{{ asset('assets/images/blog/one.png') }}" alt="Blog"></a>
                    </div>
                    <div class="blog__single-content">
                        <h4><a href="{{ route('blog.list') }}">A Simple Social Media Marketing Checklist for Businesses</a></h4>
                        <div class="blog__single-meta">
                            <a href="{{ route('blog.list') }}" class="sub-title">strategy <i class="fa-solid fa-arrow-right"></i></a>
                            <p>JUNE 1, 2025</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="blog__single fade-top">
                    <div class="blog__single-thumb topy-tilt">
                        <a href="{{ route('blog.list') }}"><img src="{{ asset('assets/images/blog/two.png') }}" alt="Blog"></a>
                    </div>
                    <div class="blog__single-content">
                        <h4><a href="{{ route('blog.list') }}">Transforming Social Media Challenges into Opportunities</a></h4>
                        <div class="blog__single-meta">
                            <a href="{{ route('blog.list') }}" class="sub-title">growth <i class="fa-solid fa-arrow-right"></i></a>
                            <p>MAY 15, 2025</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- ==== / blog end ==== --}}

{{-- ==== CTA / next page start ==== --}}
<section class="section next-page light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="section__header text-center">
                    <a href="{{ route('contact.page') }}" class="sub-title mb-0">
                        Ready to Get Started?
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
{{-- ==== / CTA end ==== --}}

@endsection
