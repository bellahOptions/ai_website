@props(['platforms' => ['facebook', 'twitter', 'instagram', 'linkedin'], 'tone' => 'dark'])

@php
    $labels = ['facebook' => 'Facebook', 'twitter' => 'X', 'instagram' => 'Instagram', 'linkedin' => 'LinkedIn', 'behance' => 'Behance'];
    $tones = [
        'dark'  => 'border-white/20 text-white/80 hover:bg-white hover:text-ink',
        'light' => 'border-line text-ink-soft hover:bg-ink hover:text-white',
    ];
@endphp

<ul class="flex items-center gap-2">
    @foreach($platforms as $platform)
        @php($url = config("social.$platform"))
        @if($url)
            <li>
                <a href="{{ $url }}" target="_blank" rel="noopener" aria-label="{{ $labels[$platform] ?? ucfirst($platform) }}"
                   class="inline-flex h-11 w-11 items-center justify-center rounded-full border transition-colors {{ $tones[$tone] }}">
                    <x-icon :name="$platform" :size="18" />
                </a>
            </li>
        @endif
    @endforeach
</ul>
