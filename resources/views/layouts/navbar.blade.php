@php
    $links = [
        ['Home', route('home.page'), request()->routeIs('home.page') || request()->is('/')],
        ['About', route('about.page'), request()->routeIs('about.page')],
        ['Services', route('services.page'), request()->routeIs('services.page')],
        ['Portfolio', route('portfolio.page'), request()->routeIs('portfolio.page')],
        ['Blog', route('blog.list'), request()->routeIs('blog.*')],
        ['Contact', route('contact.page'), request()->routeIs('contact.page')],
    ];
@endphp

<header class="sticky top-0 z-50 border-b border-line/80 bg-paper/90 backdrop-blur-md">
    <div class="container-site flex h-[72px] items-center justify-between gap-6">
        <a href="{{ route('home.page') }}" aria-label="AI Digital Agency, home" class="shrink-0">
            <img src="{{ asset('logo.svg') }}" alt="AI Digital Agency" class="h-9 w-auto">
        </a>

        <nav aria-label="Primary" class="hidden lg:block">
            <ul class="flex items-center gap-1">
                @foreach($links as [$label, $href, $active])
                    <li>
                        <a href="{{ $href }}" @if($active) aria-current="page" @endif
                           class="relative inline-flex min-h-11 items-center rounded-full px-4 text-[15px] font-medium transition-colors
                                  {{ $active ? 'bg-orchid text-brand' : 'text-ink-soft hover:text-ink' }}">
                            {{ $label }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>

        <div class="flex items-center gap-2">
            <a href="{{ route('contact.page') }}" class="btn-site btn-site-primary hidden sm:inline-flex">Book a clarity call</a>
            <button id="menu-toggle" type="button" aria-expanded="false" aria-controls="mobile-menu" aria-label="Toggle menu"
                    class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-line text-ink lg:hidden">
                <span data-open><x-icon name="menu" :size="22" /></span>
                <span data-close class="hidden"><x-icon name="x" :size="22" /></span>
            </button>
        </div>
    </div>

    <div id="mobile-menu" class="hidden max-h-[calc(100dvh-72px)] overflow-y-auto border-t border-line bg-paper lg:hidden">
        <nav aria-label="Mobile" class="container-site py-4">
            <ul>
                @foreach($links as [$label, $href, $active])
                    <li class="border-b border-line last:border-0">
                        <a href="{{ $href }}" @if($active) aria-current="page" @endif
                           class="flex min-h-14 items-center justify-between font-display text-2xl font-semibold {{ $active ? 'text-brand' : 'text-ink' }}">
                            {{ $label }}
                            <x-icon name="arrow-right" :size="20" class="text-ink-soft" />
                        </a>
                    </li>
                @endforeach
            </ul>
            <a href="{{ route('contact.page') }}" class="btn-site btn-site-primary my-5 w-full">Book a clarity call</a>
        </nav>
    </div>
</header>
