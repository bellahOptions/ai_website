@props(['post'])

<article class="group">
    <a href="{{ route('blog.detail', $post->slug) }}" class="block overflow-hidden rounded-3xl bg-orchid">
        <img src="{{ $post->coverUrl(900, 560) }}" alt="" loading="lazy" class="aspect-[16/10] w-full object-cover transition-transform duration-500 group-hover:scale-105">
    </a>
    <div class="mt-5 flex items-center gap-3 text-sm text-ink-soft">
        @if($post->category)<span class="rounded-full bg-orchid px-3 py-1 font-semibold text-brand">{{ $post->category }}</span>@endif
        <time datetime="{{ $post->published_at->toDateString() }}">{{ $post->published_at->format('M j, Y') }}</time>
    </div>
    <h3 class="mt-3 text-2xl font-bold leading-snug tracking-tight">
        <a href="{{ route('blog.detail', $post->slug) }}" class="hover:text-brand">{{ $post->title }}</a>
    </h3>
    @if($post->excerpt)
        <p class="mt-2 line-clamp-2 text-[15px] leading-7 text-ink-soft">{{ $post->excerpt }}</p>
    @endif
</article>
