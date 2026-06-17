<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    protected $fillable = [
        'invoice_id', 'description', 'quantity', 'unit_price', 'discount', 'apply_vat', 'total', 'sort_order',
    ];

    protected $casts = [
        'unit_price' => 'decimal:2',
        'discount'   => 'decimal:2',
        'total'      => 'decimal:2',
        'apply_vat'  => 'boolean',
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function netAmount(): float
    {
        return max(0, (float) $this->unit_price - (float) $this->discount);
    }

    public function vatAmount(): float
    {
        return $this->apply_vat ? round($this->netAmount() * 0.075, 2) : 0;
    }

    protected static function booted(): void
    {
        static::saving(function ($item) {
            $net = max(0, (float) $item->unit_price - (float) $item->discount);
            $vat = $item->apply_vat ? round($net * 0.075, 2) : 0;
            $item->total = round($net + $vat, 2);
        });
    }
}
