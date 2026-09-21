@props(['heading', 'linkText' => 'Book a clarity call', 'whatsapp' => true])

<section class="container-site pb-20 pt-4 lg:pb-28">
    <div class="relative isolate overflow-hidden rounded-[2rem] bg-brand px-6 py-14 text-white sm:px-14 sm:py-20">
        <img src="{{ \App\Support\Photos::url('team', 1400, 700, 55) }}" alt="" loading="lazy" class="absolute inset-0 -z-20 h-full w-full object-cover opacity-25 mix-blend-luminosity">
        <div class="absolute inset-0 -z-10 bg-gradient-to-br from-brand-deep/90 via-brand/80 to-brand-bright/60"></div>
        <h2 class="max-w-2xl text-4xl font-bold leading-[1.05] tracking-tight sm:text-5xl">{{ $heading }}</h2>
        <p class="mt-4 max-w-lg text-lg leading-8 text-white/85">Tell us about your brand and we'll come back within 24 hours with a plan.</p>
        <div class="mt-8 flex flex-col gap-3 sm:flex-row">
            <a href="{{ route('contact.page') }}" class="btn-site btn-site-accent">{{ $linkText }} <x-icon name="arrow-right" :size="18" /></a>
            @if($whatsapp)
                <a href="https://wa.me/2349024083203?text=Hi%2C%20I%27d%20like%20to%20talk%20about%20growing%20my%20brand" target="_blank" rel="noopener" class="btn-site btn-site-outline-light">
                    <x-icon name="message" :size="18" /> Chat on WhatsApp
                </a>
            @endif
        </div>
    </div>
</section>
