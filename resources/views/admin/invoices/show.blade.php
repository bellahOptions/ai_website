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
    .inv-download-btn {
        display:inline-flex; align-items:center; gap:6px;
        padding:9px 16px; background:#61078B; color:#fff;
        border:none; border-radius:8px; font-size:13.5px; font-weight:600;
        font-family:inherit; cursor:pointer;
        transition:background 150ms, box-shadow 150ms;
        box-shadow:0 2px 8px rgba(97,7,139,.3);
        text-decoration:none;
    }
    .inv-download-btn:hover { background:#7c22a8; box-shadow:0 4px 16px rgba(97,7,139,.4); }
    .inv-download-btn:disabled { background:#c4b5d4; cursor:not-allowed; box-shadow:none; }
    .inv-download-btn svg { flex-shrink:0; }
    .inv-action-bar {
        display:flex; align-items:center; justify-content:space-between;
        padding:14px 20px; background:#fff; border:1px solid #e5e7eb;
        border-radius:10px; margin-bottom:16px;
        box-shadow:0 1px 4px rgba(0,0,0,.05);
    }
    .inv-action-left { display:flex; align-items:center; gap:8px; }
    .inv-action-right { display:flex; align-items:center; gap:8px; flex-wrap:wrap; }
</style>
@endpush

@section('content')

{{-- Toolbar --}}
<div class="no-print" style="margin-top:4px;">
    <a href="{{ route('admin.invoices.index') }}" class="back-link">
        <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></svg>
        Back to Invoices
    </a>
</div>

<div class="inv-action-bar no-print" style="margin-top:12px;">
    <div class="inv-action-left">
        <h2 style="font-size:18px;font-weight:700;color:#111827;margin:0;">{{ $invoice->invoice_number }}</h2>
        <span class="badge badge-{{ $invoice->status }}">{{ ucfirst($invoice->status) }}</span>
    </div>
    <div class="inv-action-right">
        <button onclick="window.print()" class="btn btn-secondary">
            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="6 9 6 2 18 2 18 9"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect x="6" y="14" width="12" height="8"/></svg>
            Print
        </button>
        <a href="{{ route('admin.invoices.pdf', $invoice) }}" class="inv-download-btn">
            <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
            Download PDF
        </a>
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

{{-- Invoice document --}}
<div style="max-width:780px;">
<div id="invoice_pdf_section" class="invoice-doc" style="background:#fff;border:1px solid #e5e7eb;border-radius:14px;overflow:hidden;box-shadow:0 4px 24px rgba(0,0,0,.07);">

    {{-- PDF Header band --}}
    <div style="background:#61078B;padding:28px 36px;display:flex;align-items:center;justify-content:space-between;">
        <div style="display:flex;align-items:center;gap:14px;">
            <img src="{{ asset('assets/images/logo-light.png') }}" alt="AI Digital Agency"
                 style="height:48px;width:auto;display:block;object-fit:contain;">
            <div>
                <p style="font-size:16px;font-weight:700;color:#fff;margin:0;line-height:1.2;">AI Digital Agency</p>
                <p style="font-size:12px;color:rgba(255,255,255,.7);margin:0;">sales@aidigitalagency.com.ng</p>
            </div>
        </div>
        <div style="text-align:right;">
            <p style="font-size:28px;font-weight:800;color:#fff;letter-spacing:-0.5px;margin:0 0 2px;">INVOICE</p>
            <p style="font-size:13px;font-weight:600;color:rgba(255,255,255,.85);margin:0 0 6px;">{{ $invoice->invoice_number }}</p>
            <span style="display:inline-block;padding:3px 10px;border-radius:20px;background:rgba(255,255,255,.2);font-size:11px;font-weight:700;color:#fff;text-transform:uppercase;letter-spacing:.05em;">{{ ucfirst($invoice->status) }}</span>
        </div>
    </div>

    {{-- Bill To + Dates --}}
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:24px;padding:28px 36px;border-bottom:1px solid #f0f1f3;">
        <div>
            <p style="font-size:10.5px;font-weight:700;color:#61078B;text-transform:uppercase;letter-spacing:.1em;margin:0 0 10px;">Bill To</p>
            @if($invoice->client)
            <p style="font-size:15px;font-weight:700;color:#111827;margin:0 0 3px;">{{ $invoice->client->name }}</p>
            @if($invoice->client->company)<p style="font-size:13px;color:#6b7280;margin:0 0 2px;">{{ $invoice->client->company }}</p>@endif
            <p style="font-size:13px;color:#6b7280;margin:0 0 2px;">{{ $invoice->client->email }}</p>
            @if($invoice->client->phone)<p style="font-size:13px;color:#6b7280;margin:0 0 2px;">{{ $invoice->client->phone }}</p>@endif
            @if($invoice->client->address)<p style="font-size:12.5px;color:#9ca3af;margin:6px 0 0;">{{ $invoice->client->address }}{{ $invoice->client->city ? ', '.$invoice->client->city : '' }}</p>@endif
            @else
            <p style="font-size:13.5px;color:#9ca3af;">No client assigned</p>
            @endif
        </div>
        <div style="text-align:right;">
            <div style="display:inline-flex;flex-direction:column;gap:10px;text-align:left;">
                <div style="background:#f9f5ff;border-radius:8px;padding:10px 16px;min-width:160px;">
                    <p style="font-size:10.5px;font-weight:700;color:#61078B;text-transform:uppercase;letter-spacing:.08em;margin:0 0 3px;">Issue Date</p>
                    <p style="font-size:13.5px;font-weight:600;color:#111827;margin:0;">{{ $invoice->issue_date->format('F j, Y') }}</p>
                </div>
                <div style="background:#f9f5ff;border-radius:8px;padding:10px 16px;">
                    <p style="font-size:10.5px;font-weight:700;color:{{ $invoice->isOverdue() ? '#b91c1c' : '#61078B' }};text-transform:uppercase;letter-spacing:.08em;margin:0 0 3px;">Due Date</p>
                    <p style="font-size:13.5px;font-weight:600;margin:0;color:{{ $invoice->isOverdue() ? '#b91c1c' : '#111827' }};">
                        {{ $invoice->due_date->format('F j, Y') }}
                        @if($invoice->isOverdue())<span style="font-size:10px;"> · Overdue</span>@endif
                    </p>
                </div>
                @if($invoice->paid_at)
                <div style="background:#f0fdf4;border-radius:8px;padding:10px 16px;">
                    <p style="font-size:10.5px;font-weight:700;color:#15803d;text-transform:uppercase;letter-spacing:.08em;margin:0 0 3px;">Paid On</p>
                    <p style="font-size:13.5px;font-weight:600;color:#15803d;margin:0;">{{ $invoice->paid_at->format('F j, Y') }}</p>
                </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Line items --}}
    <div style="padding:24px 36px;border-bottom:1px solid #f0f1f3;">
        <table style="width:100%;border-collapse:collapse;">
            <thead>
                <tr style="background:#f9f5ff;">
                    <th style="text-align:left;padding:10px 14px;font-size:11px;font-weight:700;color:#61078B;text-transform:uppercase;letter-spacing:.07em;border-radius:6px 0 0 6px;">Description</th>
                    <th style="text-align:right;padding:10px 14px;width:120px;font-size:11px;font-weight:700;color:#61078B;text-transform:uppercase;letter-spacing:.07em;">Price</th>
                    <th style="text-align:right;padding:10px 14px;width:110px;font-size:11px;font-weight:700;color:#61078B;text-transform:uppercase;letter-spacing:.07em;">Discount</th>
                    <th style="text-align:center;padding:10px 14px;width:70px;font-size:11px;font-weight:700;color:#61078B;text-transform:uppercase;letter-spacing:.07em;">VAT</th>
                    <th style="text-align:right;padding:10px 14px;width:120px;font-size:11px;font-weight:700;color:#61078B;text-transform:uppercase;letter-spacing:.07em;border-radius:0 6px 6px 0;">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($invoice->items as $item)
                <tr style="border-bottom:1px solid #f3f4f6;">
                    <td style="padding:13px 14px;font-size:13.5px;color:#374151;">{{ $item->description }}</td>
                    <td style="padding:13px 14px;font-size:13.5px;color:#6b7280;text-align:right;">{{ $invoice->currencySymbol() }}{{ number_format($item->unit_price, 2) }}</td>
                    <td style="padding:13px 14px;font-size:13.5px;color:#6b7280;text-align:right;">
                        @if($item->discount > 0)− {{ $invoice->currencySymbol() }}{{ number_format($item->discount, 2) }}@else—@endif
                    </td>
                    <td style="padding:13px 14px;font-size:12px;text-align:center;">
                        @if($item->apply_vat)<span style="background:#f5f0ff;color:#61078B;padding:2px 7px;border-radius:10px;font-weight:600;">7.5%</span>@else—@endif
                    </td>
                    <td style="padding:13px 14px;font-size:13.5px;font-weight:600;color:#111827;text-align:right;">{{ $invoice->currencySymbol() }}{{ number_format($item->total, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Totals --}}
    <div style="padding:20px 36px;border-bottom:1px solid #f0f1f3;">
        <div style="max-width:280px;margin-left:auto;display:flex;flex-direction:column;gap:8px;">
            <div style="display:flex;justify-content:space-between;">
                <span style="font-size:13.5px;color:#6b7280;">Subtotal</span>
                <span style="font-size:13.5px;color:#374151;">{{ $invoice->currencySymbol() }}{{ number_format($invoice->subtotal, 2) }}</span>
            </div>
            @if($invoice->tax_amount > 0)
            <div style="display:flex;justify-content:space-between;">
                <span style="font-size:13.5px;color:#6b7280;">VAT (7.5%)</span>
                <span style="font-size:13.5px;color:#374151;">{{ $invoice->currencySymbol() }}{{ number_format($invoice->tax_amount, 2) }}</span>
            </div>
            @endif
            @if($invoice->discount > 0)
            <div style="display:flex;justify-content:space-between;">
                <span style="font-size:13.5px;color:#6b7280;">Discount</span>
                <span style="font-size:13.5px;color:#b91c1c;">− {{ $invoice->currencySymbol() }}{{ number_format($invoice->discount, 2) }}</span>
            </div>
            @endif
            <div style="border-top:2px solid #e9eaec;padding-top:12px;display:flex;justify-content:space-between;align-items:center;">
                <span style="font-size:14px;font-weight:700;color:#111827;">Total Due</span>
                <span style="font-size:22px;font-weight:800;color:#61078B;">{{ $invoice->currencySymbol() }}{{ number_format($invoice->total, 2) }}</span>
            </div>
            @if($invoice->status === 'paid')
            <div style="background:#f0fdf4;border:1.5px solid #bbf7d0;border-radius:8px;padding:9px 14px;text-align:center;margin-top:4px;">
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
            <p style="font-size:10.5px;font-weight:700;color:#61078B;text-transform:uppercase;letter-spacing:.1em;margin:0 0 8px;">Notes</p>
            <p style="font-size:13px;color:#6b7280;line-height:1.6;margin:0;">{{ $invoice->notes }}</p>
        </div>
        @endif
        @if($invoice->terms)
        <div>
            <p style="font-size:10.5px;font-weight:700;color:#61078B;text-transform:uppercase;letter-spacing:.1em;margin:0 0 8px;">Terms & Conditions</p>
            <p style="font-size:13px;color:#6b7280;line-height:1.6;margin:0;">{{ $invoice->terms }}</p>
        </div>
        @endif
    </div>
    @endif

    {{-- Bank Account Details --}}
    <div style="padding:20px 36px;border-bottom:1px solid #f0f1f3;background:#fdfbff;">
        <p style="font-size:10.5px;font-weight:700;color:#61078B;text-transform:uppercase;letter-spacing:.1em;margin:0 0 12px;">Payment Details</p>
        <div style="display:flex;align-items:flex-start;gap:12px;">
            <div style="width:36px;height:36px;border-radius:8px;background:#f0e6f8;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                <svg width="18" height="18" fill="none" stroke="#61078B" stroke-width="1.8" viewBox="0 0 24 24">
                    <rect x="3" y="8" width="18" height="13" rx="2"/>
                    <path d="M3 10l9-6 9 6"/>
                    <line x1="12" y1="12" x2="12" y2="17"/>
                    <line x1="8" y1="14" x2="8" y2="17"/>
                    <line x1="16" y1="14" x2="16" y2="17"/>
                </svg>
            </div>
            <div style="display:grid;grid-template-columns:repeat(3,auto);gap:6px 32px;">
                <div>
                    <p style="font-size:10.5px;color:#9ca3af;text-transform:uppercase;letter-spacing:.07em;margin:0 0 2px;">Bank Name</p>
                    <p style="font-size:13.5px;font-weight:700;color:#111827;margin:0;">FCMB</p>
                </div>
                <div>
                    <p style="font-size:10.5px;color:#9ca3af;text-transform:uppercase;letter-spacing:.07em;margin:0 0 2px;">Account Name</p>
                    <p style="font-size:13.5px;font-weight:700;color:#111827;margin:0;">Alet Inspirationz</p>
                </div>
                <div>
                    <p style="font-size:10.5px;color:#9ca3af;text-transform:uppercase;letter-spacing:.07em;margin:0 0 2px;">Account Number</p>
                    <p style="font-size:15px;font-weight:800;color:#61078B;margin:0;letter-spacing:.05em;">9693297015</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Footer --}}
    <div style="padding:16px 36px;background:#f9f5ff;display:flex;align-items:center;justify-content:space-between;">
        <p style="font-size:12px;color:#9ca3af;margin:0;">Thank you for your business</p>
        <p style="font-size:12px;color:#9ca3af;margin:0;">AI Digital Agency · sales@aidigitalagency.com.ng · +234 902 408 3203</p>
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

