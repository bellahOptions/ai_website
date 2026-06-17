@php
    $sym     = $invoice->currencySymbol();
    $client  = $invoice->client;
    $overdue = $invoice->isOverdue();
    $logoSrc = 'file://' . str_replace('\\', '/', public_path('assets/images/logo-light.png'));
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<style>
* { margin:0; padding:0; box-sizing:border-box; }
body { font-family: DejaVu Sans, sans-serif; font-size:12px; color:#374151; background:#fff; }
.hdr  { background-color:#61078B; padding:24px 32px; }
.htbl { width:100%; border-collapse:collapse; }
.inv-label  { font-size:26px; font-weight:bold; color:#fff; letter-spacing:-0.5px; }
.inv-num    { font-size:12px; font-weight:bold; color:rgba(255,255,255,0.85); margin-top:2px; }
.inv-badge  { display:inline-block; background:rgba(255,255,255,0.2); color:#fff; font-size:10px;
              font-weight:bold; padding:2px 10px; border-radius:12px; text-transform:uppercase;
              letter-spacing:0.05em; margin-top:5px; }
.sec  { padding:20px 32px; border-bottom:1px solid #f0f1f3; }
.lbl-s { font-size:9px; font-weight:bold; color:#61078B; text-transform:uppercase;
          letter-spacing:0.1em; margin-bottom:6px; }
.cli-name { font-size:14px; font-weight:bold; color:#111827; margin-bottom:2px; }
.cli-info { font-size:11px; color:#6b7280; margin-bottom:1px; }
.dbox { background:#f9f5ff; border-radius:6px; padding:8px 14px; }
.dlbl { font-size:9px; font-weight:bold; color:#61078B; text-transform:uppercase;
        letter-spacing:0.08em; margin-bottom:2px; }
.dlbl-ov { font-size:9px; font-weight:bold; color:#b91c1c; text-transform:uppercase;
           letter-spacing:0.08em; margin-bottom:2px; }
.dval    { font-size:12px; font-weight:bold; color:#111827; }
.dval-ov { font-size:12px; font-weight:bold; color:#b91c1c; }
table.items { width:100%; border-collapse:collapse; }
table.items thead tr { background-color:#f9f5ff; }
table.items th { padding:9px 12px; font-size:9.5px; font-weight:bold; color:#61078B;
                 text-transform:uppercase; letter-spacing:0.06em; }
table.items th.l { text-align:left; }
table.items th.r { text-align:right; }
table.items th.c { text-align:center; }
table.items td { padding:11px 12px; border-bottom:1px solid #f3f4f6; }
table.items td.desc  { font-size:12px; color:#374151; }
table.items td.price { font-size:12px; color:#6b7280; text-align:right; }
table.items td.c     { text-align:center; color:#6b7280; }
table.items td.tot   { font-size:12px; font-weight:bold; color:#111827; text-align:right; }
.vbadge { font-size:9.5px; font-weight:bold; color:#61078B; }
.ttbl { width:240px; margin-left:auto; border-collapse:collapse; }
.ttbl td { padding:4px 0; font-size:12px; }
.ttbl td.lbl { color:#6b7280; }
.ttbl td.val { text-align:right; color:#374151; }
.ttbl td.vred { text-align:right; color:#b91c1c; }
.tsep { border-top:2px solid #e9eaec; height:1px; }
.tdlbl { font-size:13px; font-weight:bold; color:#111827; padding-top:8px; }
.tdval { font-size:20px; font-weight:bold; color:#61078B; text-align:right; padding-top:8px; }
.paid-box { background:#f0fdf4; border:1.5px solid #bbf7d0; border-radius:6px;
            padding:8px 14px; text-align:center; margin-top:8px; width:240px; margin-left:auto; }
.paid-box span { font-size:12px; font-weight:bold; color:#15803d; }
.nbox { background:#f9fafb; border-left:3px solid #61078B; padding:12px 16px; margin-bottom:14px; }
.tbox { background:#f9fafb; border-left:3px solid #d1d5db; padding:12px 16px; }
.bank-sec { background:#fdfbff; padding:18px 32px; border-top:1px solid #f0f1f3;
            border-bottom:1px solid #f0f1f3; }
.btbl { width:100%; border-collapse:collapse; }
.blbl { font-size:9px; color:#9ca3af; text-transform:uppercase; letter-spacing:0.07em; margin-bottom:2px; }
.bval { font-size:12.5px; font-weight:bold; color:#111827; }
.bacct { font-size:14px; font-weight:bold; color:#61078B; letter-spacing:0.04em; }
.ftr { background:#f9f5ff; padding:14px 32px; text-align:center; }
.ftr p { font-size:11px; color:#9ca3af; }
</style>
</head>
<body>

<div class="hdr">
    <table class="htbl">
        <tr>
            <td>
                <img src="{{ $logoSrc }}" alt="AI Digital Agency" style="height:42px;width:auto;display:block;">
            </td>
            <td style="text-align:right;vertical-align:top;">
                <div class="inv-label">INVOICE</div>
                <div class="inv-num">{{ $invoice->invoice_number }}</div>
                <div class="inv-badge">{{ ucfirst($invoice->status) }}</div>
            </td>
        </tr>
    </table>
</div>

<div class="sec">
    <table style="width:100%;border-collapse:collapse;">
        <tr>
            <td style="width:55%;vertical-align:top;">
                <div class="lbl-s">Bill To</div>
                @if($client)
                    <div class="cli-name">{{ $client->name }}</div>
                    @if($client->company)
                        <div class="cli-info">{{ $client->company }}</div>
                    @endif
                    <div class="cli-info">{{ $client->email }}</div>
                    @if($client->phone)
                        <div class="cli-info">{{ $client->phone }}</div>
                    @endif
                    @if($client->address)
                        <div class="cli-info" style="margin-top:4px;color:#9ca3af;font-size:10.5px;">
                            {{ $client->address }}@if($client->city), {{ $client->city }}@endif
                        </div>
                    @endif
                @else
                    <div class="cli-info">No client assigned</div>
                @endif
            </td>
            <td style="width:45%;vertical-align:top;text-align:right;">
                <table style="margin-left:auto;border-collapse:collapse;">
                    <tr>
                        <td style="padding-bottom:8px;">
                            <div class="dbox">
                                <div class="dlbl">Issue Date</div>
                                <div class="dval">{{ $invoice->issue_date->format('F j, Y') }}</div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="dbox">
                                @if($overdue)
                                    <div class="dlbl-ov">Due Date</div>
                                    <div class="dval-ov">{{ $invoice->due_date->format('F j, Y') }} &middot; Overdue</div>
                                @else
                                    <div class="dlbl">Due Date</div>
                                    <div class="dval">{{ $invoice->due_date->format('F j, Y') }}</div>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @if($invoice->paid_at)
                    <tr>
                        <td style="padding-top:8px;">
                            <div class="dbox" style="background:#f0fdf4;">
                                <div class="dlbl" style="color:#15803d;">Paid On</div>
                                <div class="dval" style="color:#15803d;">{{ $invoice->paid_at->format('F j, Y') }}</div>
                            </div>
                        </td>
                    </tr>
                    @endif
                </table>
            </td>
        </tr>
    </table>
</div>

<div class="sec">
    <table class="items">
        <thead>
            <tr>
                <th class="l">Description</th>
                <th class="r" style="width:100px;">Price</th>
                <th class="r" style="width:90px;">Discount</th>
                <th class="c" style="width:55px;">VAT</th>
                <th class="r" style="width:100px;">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoice->items as $item)
            <tr>
                <td class="desc">{{ $item->description }}</td>
                <td class="price">{{ $sym }}{{ number_format($item->unit_price, 2) }}</td>
                <td class="price">
                    @if($item->discount > 0)
                        &minus;{{ $sym }}{{ number_format($item->discount, 2) }}
                    @else
                        &mdash;
                    @endif
                </td>
                <td class="c">
                    @if($item->apply_vat)
                        <span class="vbadge">7.5%</span>
                    @else
                        &mdash;
                    @endif
                </td>
                <td class="tot">{{ $sym }}{{ number_format($item->total, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="sec">
    <table class="ttbl">
        <tr>
            <td class="lbl">Subtotal</td>
            <td class="val">{{ $sym }}{{ number_format($invoice->subtotal, 2) }}</td>
        </tr>
        @if($invoice->tax_amount > 0)
        <tr>
            <td class="lbl">VAT (7.5%)</td>
            <td class="val">{{ $sym }}{{ number_format($invoice->tax_amount, 2) }}</td>
        </tr>
        @endif
        @if($invoice->discount > 0)
        <tr>
            <td class="lbl">Discount</td>
            <td class="vred">&minus; {{ $sym }}{{ number_format($invoice->discount, 2) }}</td>
        </tr>
        @endif
        <tr>
            <td colspan="2" class="tsep"></td>
        </tr>
        <tr>
            <td class="tdlbl">Total Due</td>
            <td class="tdval">{{ $sym }}{{ number_format($invoice->total, 2) }}</td>
        </tr>
    </table>
    @if($invoice->status === 'paid')
    <div class="paid-box">
        <span>&#10003; PAYMENT RECEIVED</span>
    </div>
    @endif
</div>

@if($invoice->notes || $invoice->terms)
<div class="sec">
    @if($invoice->notes)
    <div class="nbox">
        <div class="lbl-s">Notes</div>
        <p style="font-size:11px;color:#6b7280;line-height:1.6;margin-top:5px;">{{ $invoice->notes }}</p>
    </div>
    @endif
    @if($invoice->terms)
    <div class="tbox">
        <div class="lbl-s" style="color:#6b7280;">Terms &amp; Conditions</div>
        <p style="font-size:11px;color:#6b7280;line-height:1.6;margin-top:5px;">{{ $invoice->terms }}</p>
    </div>
    @endif
</div>
@endif

<div class="bank-sec">
    <div class="lbl-s" style="margin-bottom:12px;">Payment Details</div>
    <table class="btbl">
        <tr>
            <td>
                <div class="blbl">Bank Name</div>
                <div class="bval">FCMB</div>
            </td>
            <td>
                <div class="blbl">Account Name</div>
                <div class="bval">Alet Inspirationz</div>
            </td>
            <td>
                <div class="blbl">Account Number</div>
                <div class="bacct">9693297015</div>
            </td>
        </tr>
    </table>
</div>

<div class="ftr">
    <p>Thank you for your business &nbsp;&middot;&nbsp; AI Digital Agency &nbsp;&middot;&nbsp; sales&#64;aidigitalagency.com.ng &nbsp;&middot;&nbsp; +234 902 408 3203</p>
</div>

</body>
</html>
