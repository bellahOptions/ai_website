@extends('layouts.theme')
@section('title', 'Contact Us — AI Digital Agency')
@section('meta_description', 'Get in touch with AI Digital Agency. Book a clarity call or send us a message to start growing your brand today.')

@section('content')

{{-- ==== page header start ==== --}}
<section class="cmn-banner" data-background="{{ asset('assets/images/banner/cmn-banner-bg.png') }}">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cmn-banner__content">
                    <h2 class="title title-anim">Contact Us</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home.page') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
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

{{-- ==== contact cards start ==== --}}
<section class="section contact-m fade-wrapper">
    <div class="container">
        <div class="row gaper">
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="contact-m__single topy-tilt fade-top">
                    <div class="thumb"><i class="fa-sharp fa-solid fa-phone-volume" style="font-size:2rem;color:#61078B;"></i></div>
                    <div class="content">
                        <h4>Phone</h4>
                        <p><a href="tel:+2349024083203">+234 902 408 3203</a></p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="contact-m__single topy-tilt fade-top">
                    <div class="thumb"><i class="fa-sharp fa-solid fa-envelope" style="font-size:2rem;color:#61078B;"></i></div>
                    <div class="content">
                        <h4>Email</h4>
                        <p><a href="mailto:sales@aidigitalagency.com.ng">sales@aidigitalagency.com.ng</a></p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="contact-m__single topy-tilt fade-top">
                    <div class="thumb"><i class="fa-sharp fa-solid fa-location-dot" style="font-size:2rem;color:#61078B;"></i></div>
                    <div class="content">
                        <h4>Location</h4>
                        <p><a href="https://maps.google.com" target="_blank">Lagos State, Nigeria</a></p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="contact-m__single topy-tilt fade-top">
                    <div class="thumb"><i class="fa-sharp fa-solid fa-clock" style="font-size:2rem;color:#61078B;"></i></div>
                    <div class="content">
                        <h4>Response Time</h4>
                        <p>Mon - Fri: 9am - 6pm</p>
                        <p>Within 24 hours</p>
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
{{-- ==== / contact cards end ==== --}}

{{-- ==== contact form start ==== --}}
<section class="section contact fade-wrapper light" style="padding-top:0;">
    <div class="container">

        {{-- Flash messages --}}
        @if(session('success') && !session('_newsletter'))
        <div class="alert alert-success mb-4" style="background:rgba(97,7,139,0.1); border:1px solid #61078B; color:#61078B; border-radius:8px; padding:1rem 1.5rem;">
            <i class="fa-solid fa-circle-check me-2"></i>{{ session('success') }}
        </div>
        @endif
        @if(session('error'))
        <div class="alert alert-danger mb-4" style="border-radius:8px; padding:1rem 1.5rem;">
            <i class="fa-solid fa-circle-exclamation me-2"></i>{{ session('error') }}
        </div>
        @endif
        @if($errors->any())
        <div class="alert alert-danger mb-4" style="border-radius:8px; padding:1rem 1.5rem;">
            <ul class="mb-0 ps-3">
                @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
            </ul>
        </div>
        @endif

        <div class="row gaper">
            {{-- Form --}}
            <div class="col-12 col-lg-7">
                <div class="contact__form">
                    <div class="section__content" style="margin-bottom:2rem;">
                        <span class="sub-title">SEND A MESSAGE <i class="fa-solid fa-arrow-right"></i></span>
                        <h2 class="title title-anim">Let's Start a Conversation</h2>
                    </div>
                    <a href="https://wa.me/2349024083203?text=Hi%2C%20I%27d%20like%20to%20talk%20about%20growing%20my%20brand"
                       target="_blank" class="btn btn--secondary" style="margin-bottom:2rem;">
                        <i class="fa-brands fa-whatsapp me-2"></i>Prefer WhatsApp? Chat with us instantly
                    </a>
                    <form action="{{ route('contact.submit') }}" method="POST">
                        @csrf
                        <div class="row gaper">
                            <div class="col-12 col-sm-6">
                                <div class="input-single">
                                    <input type="text" name="fullName" placeholder="Full Name *" required value="{{ old('fullName') }}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="input-single">
                                    <input type="email" name="email" placeholder="Email Address *" required value="{{ old('email') }}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="input-single">
                                    <input type="tel" name="phone" placeholder="Phone Number *" required value="{{ old('phone') }}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="input-single">
                                    <input type="text" name="subject" placeholder="Subject *" required value="{{ old('subject') }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-single">
                                    <textarea name="message" placeholder="Tell us about your project or inquiry... *" rows="6" required>{{ old('message') }}</textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn--primary">
                                    Send Message
                                    <i class="fa-sharp fa-solid fa-arrow-right ms-2"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Map + Info --}}
            <div class="col-12 col-lg-5">
                <div class="contact__map" style="border-radius:12px; overflow:hidden; height:300px; margin-bottom:2rem;">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1981.9380274525274!2d3.3674707420482566!3d6.537333184432875!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b8dfdb843befb%3A0xf2de5f1f7bd17a63!2sAi%20Digital%20Agency!5e0!3m2!1sen!2sng!4v1769509776358!5m2!1sen!2sng"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade" title="AI Digital Agency Location">
                    </iframe>
                </div>
                <div class="section__content">
                    <h4 style="margin-bottom:1rem;">Follow Us</h4>
                    <div class="social" style="justify-content:flex-start; gap:0.75rem;">
                        <x-social-links :platforms="['facebook', 'twitter', 'instagram', 'linkedin', 'behance']" />
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
{{-- ==== / contact form end ==== --}}

{{-- ==== FAQ start ==== --}}
<section class="section faq fade-wrapper light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="section__header text-center">
                    <span class="sub-title">FAQ <i class="fa-solid fa-arrow-right"></i></span>
                    <h2 class="title title-anim">Frequently Asked Questions</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                What services do you offer?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">We offer strategic social media management including content strategy & planning, content creation & scheduling, community management, brand positioning & messaging, and growth-focused reporting.</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                How quickly do you respond to enquiries?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">We typically respond within 24 hours on business days (Monday to Friday). For urgent matters, you can reach us directly by phone.</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                What types of businesses do you work with?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">We work with SMEs, startups, NGOs, social enterprises, service-based businesses, creators, educators, and personal brands — any growing brand that wants a consistent, strategic social media presence.</div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                Do you offer monthly retainer packages?
                            </button>
                        </h2>
                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">Yes! We offer customised monthly retainer packages tailored to your business goals and budget. Book a clarity call to discuss what works best for you.</div>
                        </div>
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
{{-- ==== / FAQ end ==== --}}

@endsection
