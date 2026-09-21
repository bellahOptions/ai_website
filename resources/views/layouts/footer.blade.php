<footer class="bg-ink text-white/80">
    <div class="container-site grid gap-12 py-16 lg:grid-cols-12 lg:py-20">
        <div class="lg:col-span-5">
            <a href="{{ route('home.page') }}" aria-label="AI Digital Agency, home">
                <img src="{{ asset('logo-wt.svg') }}" alt="AI Digital Agency" class="h-9 w-auto">
            </a>
            <p class="mt-6 max-w-sm text-[15px] leading-7 text-white/70">
                Social media management for brands that want to show up consistently, strategically, and confidently online.
            </p>
            <ul class="mt-6 space-y-3 text-[15px]">
                <li><a href="tel:+2349024083203" class="inline-flex min-h-8 items-center gap-3 hover:text-white"><x-icon name="phone" :size="18" /> +234 902 408 3203</a></li>
                <li><a href="mailto:sales@aidigitalagency.com.ng" class="inline-flex min-h-8 items-center gap-3 break-all hover:text-white"><x-icon name="mail" :size="18" /> sales@aidigitalagency.com.ng</a></li>
                <li class="inline-flex items-center gap-3"><x-icon name="map-pin" :size="18" /> Lagos State, Nigeria</li>
            </ul>
        </div>

        <nav aria-label="Footer" class="grid grid-cols-2 gap-8 lg:col-span-3">
            <div>
                <h2 class="font-display text-base font-semibold text-white">Company</h2>
                <ul class="mt-4 space-y-1 text-[15px]">
                    <li><a class="inline-flex min-h-9 items-center hover:text-white" href="{{ route('about.page') }}">About</a></li>
                    <li><a class="inline-flex min-h-9 items-center hover:text-white" href="{{ route('services.page') }}">Services</a></li>
                    <li><a class="inline-flex min-h-9 items-center hover:text-white" href="{{ route('portfolio.page') }}">Portfolio</a></li>
                    <li><a class="inline-flex min-h-9 items-center hover:text-white" href="{{ route('blog.list') }}">Blog</a></li>
                    <li><a class="inline-flex min-h-9 items-center hover:text-white" href="{{ route('contact.page') }}">Contact</a></li>
                </ul>
            </div>
            <div>
                <h2 class="font-display text-base font-semibold text-white">Services</h2>
                <ul class="mt-4 space-y-1 text-[15px]">
                    <li><a class="inline-flex min-h-9 items-center hover:text-white" href="{{ route('services.page') }}#content-strategy">Content strategy</a></li>
                    <li><a class="inline-flex min-h-9 items-center hover:text-white" href="{{ route('services.page') }}#content-creation">Content creation</a></li>
                    <li><a class="inline-flex min-h-9 items-center hover:text-white" href="{{ route('services.page') }}#community">Community</a></li>
                    <li><a class="inline-flex min-h-9 items-center hover:text-white" href="{{ route('services.page') }}#brand-positioning">Brand positioning</a></li>
                    <li><a class="inline-flex min-h-9 items-center hover:text-white" href="{{ route('services.page') }}#reporting">Reporting</a></li>
                </ul>
            </div>
        </nav>

        <div class="lg:col-span-4">
            <h2 class="font-display text-base font-semibold text-white">Social media tips, monthly</h2>
            <p class="mt-4 text-[15px] leading-7 text-white/70">Short, practical notes on strategy and brand growth. No spam.</p>

            @if(session('success') && session('_newsletter'))
                <p role="status" class="mt-4 inline-flex items-center gap-2 rounded-xl bg-white/10 px-4 py-3 text-[15px] text-white">
                    <x-icon name="check-circle" :size="18" /> {{ session('success') }}
                </p>
            @endif
            @error('subscribe_email')
                <p role="alert" class="mt-4 text-[15px] text-[#ffb4b4]">{{ $message }}</p>
            @enderror

            <form action="{{ route('newsletter.subscribe') }}" method="post" class="mt-4">
                @csrf
                <label for="subscribe_email" class="sr-only">Email address</label>
                <div class="flex flex-col gap-2 sm:flex-row">
                    <input id="subscribe_email" type="email" name="subscribe_email" required autocomplete="email" placeholder="you@company.com"
                           class="min-h-12 w-full rounded-full border border-white/20 bg-white/5 px-5 text-[15px] text-white placeholder:text-white/40 focus:border-marigold focus:outline-none">
                    <button type="submit" class="btn-site btn-site-accent">Subscribe</button>
                </div>
            </form>

            <div class="mt-8">
                <x-social-links :platforms="['instagram', 'linkedin', 'facebook', 'twitter', 'behance']" />
            </div>
        </div>
    </div>

    <div class="border-t border-white/10">
        <div class="container-site flex flex-col gap-2 py-6 text-sm text-white/55 sm:flex-row sm:items-center sm:justify-between">
            <p>&copy; {{ date('Y') }} AI Digital Agency. All rights reserved.</p>
            <p>Lagos, Nigeria &middot; Mon to Fri, 9am to 6pm</p>
        </div>
    </div>
</footer>
