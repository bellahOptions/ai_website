<?php

namespace App\Support;

/**
 * Curated Unsplash photography used across the public site.
 * Keys are stable slots so views never hard-code photo IDs.
 */
class Photos
{
    /** @var array<string, string> slot => Unsplash photo id */
    private const IDS = [
        'hero'        => '1531482615713-2afd69097998',
        'hero-phone'  => '1611926653458-09294b3142bf',
        'planning'    => '1432888498266-38ffec3eaf0a',
        'team'        => '1522202176988-66273c2fd55f',
        'workshop'    => '1557804506-669a67965ba0',
        'analytics'   => '1460925895917-afdab827c52f',
        'community'   => '1529156069898-49953e39b3ac',
        'brand'       => '1483058712412-4245e9b90334',
        'meeting'     => '1521737604893-d14cc237f11d',
        'office'      => '1542744173-8e7e53415bb0',
        'laptop'      => '1573164713714-d95e436ab8d6',
        'portrait-m'  => '1531384441138-2736e62e0919',
        'portrait-f'  => '1589156280159-27698a70f29e',
    ];

    /** Fallback covers for blog posts / portfolio items without a usable image. */
    private const FALLBACKS = ['planning', 'analytics', 'workshop', 'brand', 'community', 'meeting', 'team'];

    public static function url(string $slot, int $width = 1200, ?int $height = null, int $quality = 75): string
    {
        $id = self::IDS[$slot] ?? self::IDS['team'];
        $url = "https://images.unsplash.com/photo-{$id}?auto=format&fit=crop&q={$quality}&w={$width}";

        return $height ? "{$url}&h={$height}" : $url;
    }

    /** Deterministic fallback so a given post always gets the same photo. */
    public static function fallback(int|string $seed, int $width = 900, ?int $height = null): string
    {
        $slot = self::FALLBACKS[crc32((string) $seed) % count(self::FALLBACKS)];

        return self::url($slot, $width, $height);
    }
}
