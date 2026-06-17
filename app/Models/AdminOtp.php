<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminOtp extends Model
{
    public $timestamps = false;

    protected $fillable = ['user_id', 'code', 'expires_at'];

    protected $casts = ['expires_at' => 'datetime'];

    public function isExpired(): bool
    {
        return $this->expires_at->isPast();
    }
}
