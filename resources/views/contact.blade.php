@extends('layouts.theme')
@section('title', 'Contact us | AI Digital Agency')
@section('meta_description', 'Get in touch with AI Digital Agency. Book a clarity call or send us a message to start growing your brand today.')

@php
    $faqs = [
        ['What services do you offer?', 'We offer strategic social media management including content strategy and planning, content creation and scheduling, community management, brand positioning and messaging, and growth-focused reporting.'],
        ['How quickly do you respond to enquiries?', 'We typically respond within 24 hours on business days (Monday to Friday). For urgent matters, you can reach us directly by phone.'],
        ['What types of businesses do you work with?', 'We work with SMEs, startups, NGOs, social enterprises, service-based businesses, creators, educators, and personal brands. Any growing brand that wants a consistent, strategic social media presence.'],
        ['Do you offer monthly retainer packages?', 'Yes. We offer customised monthly retainer packages tailored to your business goals and budget. Book a clarity call to discuss what works best for you.'],
    ];
@endphp

@section('content')

<x-page-banner title="Let's talk about growing your brand" breadcrumb="Contact us"
    intro="Send us a message or book a clarity call. We reply within 24 hours on business days." image="office" />

<section class="py-16 lg:py-24">
    <div class="container-site grid gap-12 lg:grid-cols-12 lg:gap-16">

        {{-- Form --}}
        <div class="lg:col-span-7">
            @if(session('success') && !session('_newsletter'))
                <div role="status" class="mb-6 flex items-start gap-3 rounded-2xl border border-[#b7e3c7] bg-[#effaf3] p-4 text-[15px] text-[#14532d]">
                    <x-icon name="check-circle" :size="20" class="mt-0.5" /> <p>{{ session('success') }}</p>
                </div>
            @endif
            @if(session('error'))
                <div role="alert" class="mb-6 flex items-start gap-3 rounded-2xl border border-[#f2b8b8] bg-[#fdf1f1] p-4 text-[15px] text-[#7f1d1d]">
                    <x-icon name="alert-circle" :size="20" class="mt-0.5" /> <p>{{ session('error') }}</p>
                </div>
            @endif
            @if($errors->any() && !$errors->has('subscribe_email'))
                <div role="alert" class="mb-6 rounded-2xl border border-[#f2b8b8] bg-[#fdf1f1] p-4 text-[15px] text-[#7f1d1d]">
                    <p class="flex items-center gap-2 font-semibold"><x-icon name="alert-circle" :size="20" /> Please fix the following:</p>
                    <ul class="mt-2 list-disc pl-9">
                        @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                    </ul>
                </div>
            @endif

            <h2 class="text-3xl font-bold tracking-tight sm:text-4xl">Send a message</h2>
            <p class="mt-3 text-ink-soft">Tell us about your project or question. Fields marked * are required.</p>

            <form action="{{ route('contact.submit') }}" method="POST" class="mt-8 grid gap-5 sm:grid-cols-2">
                @csrf
                @foreach([
                    ['fullName', 'Full name', 'text', 'name', 'Amaka Obi'],
                    ['email', 'Email address', 'email', 'email', 'you@company.com'],
                    ['phone', 'Phone number', 'tel', 'tel', '+234 800 000 0000'],
                    ['subject', 'Subject', 'text', 'off', 'How can we help?'],
                ] as [$name, $label, $type, $auto, $ph])
                    <div>
                        <label for="{{ $name }}" class="mb-2 block text-[15px] font-semibold">{{ $label }} <span aria-hidden="true" class="text-brand">*</span></label>
                        <input id="{{ $name }}" name="{{ $name }}" type="{{ $type }}" required autocomplete="{{ $auto }}" placeholder="{{ $ph }}" value="{{ old($name) }}"
                               class="field @error($name) !border-[#c53030] @enderror" @error($name) aria-invalid="true" aria-describedby="{{ $name }}-error" @enderror>
                        @error($name)<p id="{{ $name }}-error" class="mt-1.5 text-sm text-[#c53030]">{{ $message }}</p>@enderror
                    </div>
                @endforeach
                <div class="sm:col-span-2">
                    <label for="message" class="mb-2 block text-[15px] font-semibold">Your message <span aria-hidden="true" class="text-brand">*</span></label>
                    <textarea id="message" name="message" rows="6" required placeholder="Tell us about your brand and what you want to achieve"
                              class="field @error('message') !border-[#c53030] @enderror" @error('message') aria-invalid="true" aria-describedby="message-error" @enderror>{{ old('message') }}</textarea>
                    @error('message')<p id="message-error" class="mt-1.5 text-sm text-[#c53030]">{{ $message }}</p>@enderror
                </div>
                <div class="sm:col-span-2">
                    <button type="submit" class="btn-site btn-site-primary w-full sm:w-auto">Send message <x-icon name="send" :size="18" /></button>
                </div>
            </form>
        </div>

        {{-- Details --}}
        <aside class="lg:col-span-5">
            <div class="rounded-3xl bg-ink p-8 text-white">
                <h2 class="text-2xl font-bold">Prefer a quicker reply?</h2>
                <p class="mt-2 text-white/75">Chat with us on WhatsApp and we'll respond during business hours.</p>
                <a href="https://wa.me/2349024083203?text=Hi%2C%20I%27d%20like%20to%20talk%20about%20growing%20my%20brand" target="_blank" rel="noopener" class="btn-site btn-site-accent mt-6 w-full sm:w-auto">
                    <x-icon name="message" :size="18" /> Chat on WhatsApp
                </a>
            </div>

            <ul class="mt-6 divide-y divide-line rounded-3xl border border-line bg-white">
                <li class="flex items-start gap-4 p-5"><x-icon name="phone" class="mt-1 text-brand" /><div><p class="text-sm text-ink-soft">Phone</p><a href="tel:+2349024083203" class="font-semibold hover:text-brand">+234 902 408 3203</a></div></li>
                <li class="flex items-start gap-4 p-5"><x-icon name="mail" class="mt-1 text-brand" /><div class="min-w-0"><p class="text-sm text-ink-soft">Email</p><a href="mailto:sales@aidigitalagency.com.ng" class="break-all font-semibold hover:text-brand">sales@aidigitalagency.com.ng</a></div></li>
                <li class="flex items-start gap-4 p-5"><x-icon name="map-pin" class="mt-1 text-brand" /><div><p class="text-sm text-ink-soft">Location</p><p class="font-semibold">Lagos State, Nigeria</p></div></li>
                <li class="flex items-start gap-4 p-5"><x-icon name="clock" class="mt-1 text-brand" /><div><p class="text-sm text-ink-soft">Hours</p><p class="font-semibold">Mon to Fri, 9am to 6pm</p><p class="text-sm text-ink-soft">We reply within 24 hours</p></div></li>
            </ul>

            <div class="mt-6 overflow-hidden rounded-3xl border border-line">
                <iframe title="AI Digital Agency location" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="h-64 w-full border-0"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1981.9380274525274!2d3.3674707420482566!3d6.537333184432875!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b8dfdb843befb%3A0xf2de5f1f7bd17a63!2sAi%20Digital%20Agency!5e0!3m2!1sen!2sng!4v1769509776358!5m2!1sen!2sng"></iframe>
            </div>

            <div class="mt-6"><x-social-links tone="light" :platforms="['instagram', 'linkedin', 'facebook', 'twitter', 'behance']" /></div>
        </aside>
    </div>
</section>

<section class="bg-white py-20 lg:py-28">
    <div class="container-site grid gap-10 lg:grid-cols-12">
        <h2 class="text-4xl font-bold leading-[1.08] tracking-tight sm:text-5xl lg:col-span-5">Frequently asked questions</h2>
        <div class="lg:col-span-7">
            @foreach($faqs as $i => [$q, $a])
                <details class="group border-t border-line py-5 last:border-b" @if($i === 0) open @endif>
                    <summary class="flex min-h-11 cursor-pointer list-none items-center justify-between gap-6 font-display text-xl font-semibold [&::-webkit-details-marker]:hidden">
                        {{ $q }}
                        <span class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-full border border-line transition-transform duration-200 group-open:rotate-180"><x-icon name="chevron-down" :size="18" /></span>
                    </summary>
                    <p class="mt-3 max-w-2xl text-[16px] leading-7 text-ink-soft">{{ $a }}</p>
                </details>
            @endforeach
        </div>
    </div>
</section>

@endsection
