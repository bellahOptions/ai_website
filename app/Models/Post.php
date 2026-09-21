<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Support\Photos;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'body',
        'category',
        'cover_image',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function scopePublished(Builder $query): Builder
    {
        return $query->whereNotNull('published_at')->where('published_at', '<=', now());
    }
    /**
     * Cover image URL: an absolute URL or an uploaded file if present,
     * otherwise a stable Unsplash photo.
     */
    public function coverUrl(int $width = 900, ?int $height = null): string
    {
        $cover = $this->cover_image;

        if ($cover && preg_match('#^https?://#', $cover)) {
            return $cover;
        }

        if ($cover && Storage::disk('public')->exists($cover)) {
            return Storage::disk('public')->url($cover);
        }

        return Photos::fallback($this->id ?? $this->slug, $width, $height);
    }
}
