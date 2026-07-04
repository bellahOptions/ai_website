@props(['heading', 'linkText' => 'Book a Clarity Call', 'whatsapp' => true])

{{-- ==== CTA start ==== --}}
<section class="section next-page light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="section__header text-center">
                    <a href="{{ route('contact.page') }}" class="sub-title mb-0">
                        {{ $heading }}
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                    @if($whatsapp)
                        <div class="mt-3">
                            <a href="https://wa.me/2349024083203?text=Hi%2C%20I%27d%20like%20to%20talk%20about%20growing%20my%20brand"
                               target="_blank" class="btn btn--secondary">
                                <i class="fa-brands fa-whatsapp me-2"></i>Chat on WhatsApp
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="next__text-slider">
        @for($i = 0; $i < 6; $i++)
        <div class="next__text-slider-single">
            <h2 class="h1"><a href="{{ route('contact.page') }}">{{ $linkText }} <i class="fa-sharp fa-solid fa-arrow-down-right"></i></a></h2>
        </div>
        @endfor
    </div>
    <div class="lines d-none d-lg-flex">
        <div class="line"></div><div class="line"></div><div class="line"></div>
        <div class="line"></div><div class="line"></div>
    </div>
</section>
{{-- ==== / CTA end ==== --}}
