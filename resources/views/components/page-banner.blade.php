@props(['title', 'breadcrumb' => null])

@php($breadcrumb = $breadcrumb ?? $title)

{{-- ==== page header start ==== --}}
<section class="cmn-banner" data-background="{{ asset('assets/images/banner/cmn-banner-bg.png') }}">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cmn-banner__content">
                    <h2 class="title title-anim">{{ $title }}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home.page') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb }}</li>
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
