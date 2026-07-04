@props(['platforms' => ['facebook', 'twitter', 'instagram', 'linkedin']])

@php
    $icons = [
        'facebook' => 'fa-brands fa-facebook-f',
        'twitter' => 'fa-brands fa-twitter',
        'instagram' => 'fa-brands fa-instagram',
        'linkedin' => 'fa-brands fa-linkedin-in',
        'behance' => 'fa-brands fa-behance',
    ];
@endphp

@foreach($platforms as $platform)
    @php($url = config("social.$platform"))
    <a href="{{ $url ?? '#' }}"
       @if($url) target="_blank" @else aria-disabled="true" class="is-placeholder" @endif
       aria-label="{{ ucfirst($platform) }}">
        <i class="{{ $icons[$platform] ?? '' }}"></i>
    </a>
@endforeach
