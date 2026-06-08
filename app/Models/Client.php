<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'email', 'phone', 'company',
        'address', 'city', 'country', 'status', 'notes',
    ];

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function totalBilled(): float
    {
        return $this->invoices()->whereIn('status', ['sent', 'paid'])->sum('total');
    }

    public function totalPaid(): float
    {
        return $this->invoices()->where('status', 'paid')->sum('total');
    }
}
