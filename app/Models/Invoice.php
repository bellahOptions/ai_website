<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'invoice_number', 'client_id', 'status',
        'issue_date', 'due_date',
        'subtotal', 'tax_rate', 'tax_amount', 'discount', 'total',
        'currency', 'notes', 'terms', 'sent_at', 'paid_at',
    ];

    protected $casts = [
        'issue_date'  => 'date',
        'due_date'    => 'date',
        'sent_at'     => 'datetime',
        'paid_at'     => 'datetime',
        'subtotal'    => 'decimal:2',
        'tax_rate'    => 'decimal:2',
        'tax_amount'  => 'decimal:2',
        'discount'    => 'decimal:2',
        'total'       => 'decimal:2',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function items()
    {
        return $this->hasMany(InvoiceItem::class)->orderBy('sort_order');
    }

    public function recalculate(): void
    {
        $items = $this->items()->get();

        $subtotal   = $items->sum(fn($i) => max(0, (float)$i->unit_price - (float)$i->discount));
        $taxAmount  = $items->sum(fn($i) => $i->apply_vat ? round(max(0, (float)$i->unit_price - (float)$i->discount) * 0.075, 2) : 0);

        $this->subtotal   = round($subtotal, 2);
        $this->tax_amount = round($taxAmount, 2);
        $this->total      = round($subtotal + $taxAmount - (float)$this->discount, 2);
        $this->saveQuietly();
    }

    public function currencySymbol(): string
    {
        return match($this->currency) {
            'NGN'   => '₦',
            'USD'   => '$',
            'GBP'   => '£',
            'EUR'   => '€',
            default => $this->currency . ' ',
        };
    }

    public static function generateNumber(): string
    {
        $prefix = 'INV-' . date('Y') . '-';
        $last   = static::withTrashed()->where('invoice_number', 'like', $prefix . '%')
                        ->orderByDesc('id')->value('invoice_number');
        $seq    = $last ? (intval(substr($last, -4)) + 1) : 1;
        return $prefix . str_pad($seq, 4, '0', STR_PAD_LEFT);
    }

    public function statusBadge(): string
    {
        return match($this->status) {
            'draft'     => 'secondary',
            'sent'      => 'primary',
            'paid'      => 'success',
            'overdue'   => 'danger',
            'cancelled' => 'warning',
            default     => 'secondary',
        };
    }

    public function isOverdue(): bool
    {
        return in_array($this->status, ['sent']) && $this->due_date->isPast();
    }
}
