@extends('admin.layout')
@section('title', $invoice->invoice_number)
@section('page_title', 'Invoice Preview')

@push('styles')
<style>
    @media print {
        .no-print { display:none !important; }
        .admin-sidebar, .admin-topbar { display:none !important; }
        .admin-main { margin-left:0 !important; }
        body { background:#fff !important; }
        .invoice-doc { border:none !important; box-shadow:none !important; border-radius:0 !important; }
    }
</style>
@endpush

@section('content')

{{-- Toolbar --}}
<div class="no-print" style="margin-top:4px;">
    <a href="{{ route('admin.invoices.index') }}" class="back-link">
        <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></svg>
        Back to Invoices
    </a>

    <div style="display:flex;align-items:center;justify-content:space-between;margin-top:12px;margin-bottom:20px;">
        <div style="display:flex;align-items:center;gap:10px;">
            <h2 style="font-size:20px;font-weight:700;color:#111827;margin:0;">{{ $invoice->invoice_number }}</h2>
            <span class="badge badge-{{ $invoice->status }}">{{ ucfirst($invoice->status) }}</span>
        </div>
        <div style="display:flex;gap:8px;flex-wrap:wrap;">
            <button onclick="window.print()" class="btn btn-secondary">
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="6 9 6 2 18 2 18 9"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect x="6" y="14" width="12" height="8"/></svg>
                Print
            </button>
            <a href="{{ route('admin.invoices.edit', $invoice) }}" class="btn btn-secondary">
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                Edit
            </a>

            @if(in_array($invoice->status, ['draft','overdue']))
            <form action="{{ route('admin.invoices.send', $invoice) }}" method="POST" style="display:inline;">
                @csrf
                <button class="btn btn-blue" type="submit"
                        onclick="return confirm('Send invoice to {{ $invoice->client?->email }}?')">
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
                    Send Invoice
                </button>
            </form>
            @endif

            @if($invoice->status === 'sent')
            <form action="{{ route('admin.invoices.mark-paid', $invoice) }}" method="POST" style="display:inline;">
                @csrf
                <button class="btn btn-green" type="submit"
                        onclick="return confirm('Mark this invoice as paid?')">
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
                    Mark as Paid
                </button>
            </form>
            @endif
        </div>
    </div>
</div>

{{-- Invoice document --}}
<div style="max-width:760px;" class="invoice-doc">
    <div class="admin-card invoice-doc" style="overflow:visible;">

        {{-- Header --}}
        <div style="display:flex;align-items:flex-start;justify-content:space-between;padding:32px 36px 24px;border-bottom:1px solid #f0f1f3;">
            <div>
                <div style="display:flex;align-items:center;gap:10px;margin-bottom:10px;">
                    <div style="width:36px;height:36px;border-radius:9px;background:#61078B;display:flex;align-items:center;justify-content:center;">
                        <svg width="18" height="18" viewBox="0 0 20 20" fill="white"><path d="M10 2L3 7v11h5v-5h4v5h5V7L10 2z"/></svg>
                    </div>
                    <span style="font-size:15px;font-weight:700;color:#111827;">AI Digital Agency</span>
                </div>
                <p style="font-size:12.5px;color:#9ca3af;line-height:1.7;margin:0;">
                    Lagos, Nigeria<br>
                    aidigitalagency08@gmail.com<br>
                    +234 707 777 6734
                </p>
            </div>
            <div style="text-align:right;">
                <h1 style="font-size:28px;font-weight:700;color:#111827;letter-spacing:-0.5px;margin:0 0 4px;">INVOICE</h1>
                <p style="font-size:14px;font-weight:700;color:#61078B;margin:0 0 8px;">{{ $invoice->invoice_number }}</p>
                <span class="badge badge-{{ $invoice->status }}">{{ ucfirst($invoice->status) }}</span>
            </div>
        </div>

        {{-- Bill To + Dates --}}
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:24px;padding:24px 36px;border-bottom:1px solid #f0f1f3;">
            <div>
                <p style="font-size:11px;font-weight:600;color:#9ca3af;text-transform:uppercase;letter-spacing:.06em;margin:0 0 10px;">Bill To</p>
                @if($invoice->client)
                <p style="font-size:14px;font-weight:700;color:#111827;margin:0 0 3px;">{{ $invoice->client->name }}</p>
                @if($invoice->client->company)<p style="font-size:13.5px;color:#6b7280;margin:0 0 2px;">{{ $invoice->client->company }}</p>@endif
                <p style="font-size:13.5px;color:#6b7280;margin:0 0 2px;">{{ $invoice->client->email }}</p>
                @if($invoice->client->phone)<p style="font-size:13.5px;color:#6b7280;margin:0 0 2px;">{{ $invoice->client->phone }}</p>@endif
                @if($invoice->client->address)<p style="font-size:13px;color:#9ca3af;margin:6px 0 0;">{{ $invoice->client->address }}{{ $invoice->client->city ? ', ' . $invoice->client->city : '' }}</p>@endif
                @else
                <p style="font-size:13.5px;color:#9ca3af;">No client assigned</p>
                @endif
            </div>
            <div style="text-align:right;">
                <dl style="display:flex;flex-direction:column;gap:8px;margin:0;">
                    <div>
                        <dt style="font-size:11px;color:#9ca3af;text-transform:uppercase;letter-spacing:.05em;">Issue Date</dt>
                        <dd style="font-size:13.5px;font-weight:600;color:#111827;margin:2px 0 0;">{{ $invoice->issue_date->format('F j, Y') }}</dd>
                    </div>
                    <div>
                        <dt style="font-size:11px;color:#9ca3af;text-transform:uppercase;letter-spacing:.05em;">Due Date</dt>
                        <dd style="font-size:13.5px;font-weight:600;margin:2px 0 0;color:{{ $invoice->isOverdue() ? '#b91c1c' : '#111827' }};">
                            {{ $invoice->due_date->format('F j, Y') }}
                            @if($invoice->isOverdue())<span style="font-size:11px;color:#b91c1c;"> (Overdue)</span>@endif
                        </dd>
                    </div>
                    @if($invoice->paid_at)
                    <div>
                        <dt style="font-size:11px;color:#9ca3af;text-transform:uppercase;letter-spacing:.05em;">Paid On</dt>
                        <dd style="font-size:13.5px;font-weight:600;color:#15803d;margin:2px 0 0;">{{ $invoice->paid_at->format('F j, Y') }}</dd>
                    </div>
                    @endif
                </dl>
            </div>
        </div>

        {{-- Line items --}}
        <div style="padding:24px 36px;border-bottom:1px solid #f0f1f3;">
            <table style="width:100%;border-collapse:collapse;">
                <thead>
                    <tr style="border-bottom:2px solid #f0f1f3;">
                        <th style="text-align:left;padding:0 0 10px;font-size:11px;font-weight:600;color:#9ca3af;text-transform:uppercase;letter-spacing:.05em;">Description</th>
                        <th style="text-align:center;padding:0 0 10px;width:60px;font-size:11px;font-weight:600;color:#9ca3af;text-transform:uppercase;letter-spacing:.05em;">Qty</th>
                        <th style="text-align:right;padding:0 0 10px;width:120px;font-size:11px;font-weight:600;color:#9ca3af;text-transform:uppercase;letter-spacing:.05em;">Unit Price</th>
                        <th style="text-align:right;padding:0 0 10px;width:120px;font-size:11px;font-weight:600;color:#9ca3af;text-transform:uppercase;letter-spacing:.05em;">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($invoice->items as $item)
                    <tr style="border-bottom:1px solid #f8f9fb;">
                        <td style="padding:12px 0;font-size:13.5px;color:#374151;">{{ $item->description }}</td>
                        <td style="padding:12px 0;font-size:13.5px;color:#6b7280;text-align:center;">{{ $item->quantity }}</td>
                        <td style="padding:12px 0;font-size:13.5px;color:#6b7280;text-align:right;">{{ $invoice->currency }} {{ number_format($item->unit_price, 2) }}</td>
                        <td style="padding:12px 0;font-size:13.5px;font-weight:600;color:#111827;text-align:right;">{{ $invoice->currency }} {{ number_format($item->total, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Totals --}}
        <div style="padding:20px 36px;border-bottom:1px solid #f0f1f3;">
            <div style="max-width:260px;margin-left:auto;display:flex;flex-direction:column;gap:8px;">
                <div style="display:flex;justify-content:space-between;">
                    <span style="font-size:13.5px;color:#6b7280;">Subtotal</span>
                    <span style="font-size:13.5px;color:#374151;">{{ $invoice->currency }} {{ number_format($invoice->subtotal, 2) }}</span>
                </div>
                @if($invoice->tax_rate > 0)
                <div style="display:flex;justify-content:space-between;">
                    <span style="font-size:13.5px;color:#6b7280;">Tax ({{ number_format($invoice->tax_rate, 1) }}%)</span>
                    <span style="font-size:13.5px;color:#374151;">{{ $invoice->currency }} {{ number_format($invoice->tax_amount, 2) }}</span>
                </div>
                @endif
                @if($invoice->discount > 0)
                <div style="display:flex;justify-content:space-between;">
                    <span style="font-size:13.5px;color:#6b7280;">Discount</span>
                    <span style="font-size:13.5px;color:#b91c1c;">− {{ $invoice->currency }} {{ number_format($invoice->discount, 2) }}</span>
                </div>
                @endif
                <div style="border-top:2px solid #e9eaec;padding-top:10px;display:flex;justify-content:space-between;align-items:center;">
                    <span style="font-size:15px;font-weight:700;color:#111827;">Total Due</span>
                    <span style="font-size:20px;font-weight:700;color:#61078B;">{{ $invoice->currency }} {{ number_format($invoice->total, 2) }}</span>
                </div>
                @if($invoice->status === 'paid')
                <div style="background:#f0fdf4;border:1.5px solid #bbf7d0;border-radius:8px;padding:8px 14px;text-align:center;margin-top:4px;">
                    <span style="font-size:13px;font-weight:700;color:#15803d;">✓ PAYMENT RECEIVED</span>
                </div>
                @endif
            </div>
        </div>

        {{-- Notes / Terms --}}
        @if($invoice->notes || $invoice->terms)
        <div style="display:grid;grid-template-columns:{{ $invoice->notes && $invoice->terms ? '1fr 1fr' : '1fr' }};gap:24px;padding:22px 36px;border-bottom:1px solid #f0f1f3;">
            @if($invoice->notes)
            <div>
                <p style="font-size:11px;font-weight:600;color:#9ca3af;text-transform:uppercase;letter-spacing:.06em;margin:0 0 8px;">Notes</p>
                <p style="font-size:13px;color:#6b7280;line-height:1.6;margin:0;">{{ $invoice->notes }}</p>
            </div>
            @endif
            @if($invoice->terms)
            <div>
                <p style="font-size:11px;font-weight:600;color:#9ca3af;text-transform:uppercase;letter-spacing:.06em;margin:0 0 8px;">Terms & Conditions</p>
                <p style="font-size:13px;color:#6b7280;line-height:1.6;margin:0;">{{ $invoice->terms }}</p>
            </div>
            @endif
        </div>
        @endif

        {{-- Footer --}}
        <div style="padding:16px 36px;background:#fafafa;text-align:center;">
            <p style="font-size:12px;color:#9ca3af;margin:0;">Thank you for your business — AI Digital Agency · aidigitalagency08@gmail.com</p>
        </div>
    </div>

    {{-- Delete link --}}
    <div class="no-print" style="margin-top:14px;text-align:right;">
        <form action="{{ route('admin.invoices.destroy', $invoice) }}" method="POST" style="display:inline;"
              onsubmit="return confirm('Permanently delete {{ $invoice->invoice_number }}?')">
            @csrf @method('DELETE')
            <button type="submit" style="background:none;border:none;cursor:pointer;font-size:12.5px;color:#9ca3af;font-family:inherit;">
                Delete invoice
            </button>
        </form>
    </div>
</div>

@endsection
