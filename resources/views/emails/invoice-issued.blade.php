<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Invoice {{ $invoice->invoice_number }} — AI Digital Agency</title>
</head>
<body style="margin:0;padding:0;background:#f3f4f6;font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" style="background:#f3f4f6;padding:40px 16px;">
  <tr>
    <td align="center">
      <table width="600" cellpadding="0" cellspacing="0" style="max-width:600px;width:100%;">

        {{-- Header --}}
        <tr>
          <td style="background:#61078B;border-radius:14px 14px 0 0;padding:32px 40px;">
            <table width="100%" cellpadding="0" cellspacing="0">
              <tr>
                <td>
                  <table cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:rgba(255,255,255,.15);border-radius:10px;width:42px;height:42px;text-align:center;vertical-align:middle;">
                        <img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjIiIGhlaWdodD0iMjIiIHZpZXdCb3g9IjAgMCAyMCAyMCIgZmlsbD0id2hpdGUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggZD0iTTEwIDJMMyA3djExaDV2LTVoNHY1aDVWN0wxMCAyeiIvPjwvc3ZnPg==" width="22" height="22" alt="logo" style="display:block;margin:10px auto;">
                      </td>
                      <td style="padding-left:12px;">
                        <p style="font-size:16px;font-weight:700;color:#fff;margin:0;line-height:1.2;">AI Digital Agency</p>
                        <p style="font-size:12px;color:rgba(255,255,255,.7);margin:0;">aidigitalagency08@gmail.com</p>
                      </td>
                    </tr>
                  </table>
                </td>
                <td align="right">
                  <p style="font-size:26px;font-weight:800;color:#fff;margin:0 0 4px;letter-spacing:-0.5px;">INVOICE</p>
                  <p style="font-size:13px;font-weight:600;color:rgba(255,255,255,.85);margin:0 0 8px;">{{ $invoice->invoice_number }}</p>
                  <span style="display:inline-block;background:rgba(255,255,255,.2);color:#fff;font-size:11px;font-weight:700;padding:3px 12px;border-radius:20px;text-transform:uppercase;letter-spacing:.06em;">New Invoice</span>
                </td>
              </tr>
            </table>
          </td>
        </tr>

        {{-- Body --}}
        <tr>
          <td style="background:#ffffff;padding:36px 40px 28px;">

            <p style="font-size:16px;font-weight:600;color:#111827;margin:0 0 6px;">Hi {{ $invoice->client->name }},</p>
            <p style="font-size:14px;color:#6b7280;line-height:1.6;margin:0 0 28px;">
              Please find your invoice details below. Payment is due by
              <strong style="color:#111827;">{{ $invoice->due_date->format('F j, Y') }}</strong>.
            </p>

            {{-- Dates row --}}
            <table width="100%" cellpadding="0" cellspacing="0" style="margin-bottom:28px;">
              <tr>
                <td width="50%" style="background:#f9f5ff;border-radius:8px;padding:14px 18px;">
                  <p style="font-size:10.5px;font-weight:700;color:#61078B;text-transform:uppercase;letter-spacing:.1em;margin:0 0 4px;">Issue Date</p>
                  <p style="font-size:14px;font-weight:600;color:#111827;margin:0;">{{ $invoice->issue_date->format('F j, Y') }}</p>
                </td>
                <td width="8"></td>
                <td width="50%" style="background:#f9f5ff;border-radius:8px;padding:14px 18px;">
                  <p style="font-size:10.5px;font-weight:700;color:#61078B;text-transform:uppercase;letter-spacing:.1em;margin:0 0 4px;">Due Date</p>
                  <p style="font-size:14px;font-weight:600;color:#111827;margin:0;">{{ $invoice->due_date->format('F j, Y') }}</p>
                </td>
              </tr>
            </table>

            {{-- Items table --}}
            <table width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;margin-bottom:20px;">
              <thead>
                <tr style="background:#f9f5ff;">
                  <th style="text-align:left;padding:10px 14px;font-size:11px;font-weight:700;color:#61078B;text-transform:uppercase;letter-spacing:.07em;border-radius:6px 0 0 6px;">Description</th>
                  <th style="text-align:center;padding:10px 14px;font-size:11px;font-weight:700;color:#61078B;text-transform:uppercase;letter-spacing:.07em;width:50px;">Qty</th>
                  <th style="text-align:right;padding:10px 14px;font-size:11px;font-weight:700;color:#61078B;text-transform:uppercase;letter-spacing:.07em;width:110px;">Unit Price</th>
                  <th style="text-align:right;padding:10px 14px;font-size:11px;font-weight:700;color:#61078B;text-transform:uppercase;letter-spacing:.07em;width:110px;border-radius:0 6px 6px 0;">Total</th>
                </tr>
              </thead>
              <tbody>
                @foreach($invoice->items as $item)
                <tr style="border-bottom:1px solid #f3f4f6;">
                  <td style="padding:12px 14px;font-size:13.5px;color:#374151;">{{ $item->description }}</td>
                  <td style="padding:12px 14px;font-size:13.5px;color:#6b7280;text-align:center;">{{ $item->quantity }}</td>
                  <td style="padding:12px 14px;font-size:13.5px;color:#6b7280;text-align:right;">{{ $invoice->currency }} {{ number_format($item->unit_price, 2) }}</td>
                  <td style="padding:12px 14px;font-size:13.5px;font-weight:600;color:#111827;text-align:right;">{{ $invoice->currency }} {{ number_format($item->total, 2) }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>

            {{-- Totals --}}
            <table width="100%" cellpadding="0" cellspacing="0" style="margin-bottom:28px;">
              <tr>
                <td width="55%"></td>
                <td width="45%">
                  <table width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="padding:5px 0;font-size:13.5px;color:#6b7280;">Subtotal</td>
                      <td style="padding:5px 0;font-size:13.5px;color:#374151;text-align:right;">{{ $invoice->currency }} {{ number_format($invoice->subtotal, 2) }}</td>
                    </tr>
                    @if($invoice->tax_rate > 0)
                    <tr>
                      <td style="padding:5px 0;font-size:13.5px;color:#6b7280;">Tax ({{ number_format($invoice->tax_rate, 1) }}%)</td>
                      <td style="padding:5px 0;font-size:13.5px;color:#374151;text-align:right;">{{ $invoice->currency }} {{ number_format($invoice->tax_amount, 2) }}</td>
                    </tr>
                    @endif
                    @if($invoice->discount > 0)
                    <tr>
                      <td style="padding:5px 0;font-size:13.5px;color:#6b7280;">Discount</td>
                      <td style="padding:5px 0;font-size:13.5px;color:#b91c1c;text-align:right;">− {{ $invoice->currency }} {{ number_format($invoice->discount, 2) }}</td>
                    </tr>
                    @endif
                    <tr>
                      <td colspan="2" style="padding-top:10px;border-top:2px solid #e9eaec;"></td>
                    </tr>
                    <tr>
                      <td style="padding:6px 0;font-size:14px;font-weight:700;color:#111827;">Total Due</td>
                      <td style="padding:6px 0;font-size:20px;font-weight:800;color:#61078B;text-align:right;">{{ $invoice->currency }} {{ number_format($invoice->total, 2) }}</td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>

            @if($invoice->notes)
            <div style="background:#f9fafb;border-left:3px solid #61078B;border-radius:0 8px 8px 0;padding:14px 18px;margin-bottom:20px;">
              <p style="font-size:10.5px;font-weight:700;color:#61078B;text-transform:uppercase;letter-spacing:.1em;margin:0 0 5px;">Notes</p>
              <p style="font-size:13px;color:#6b7280;line-height:1.6;margin:0;">{{ $invoice->notes }}</p>
            </div>
            @endif

            @if($invoice->terms)
            <div style="background:#f9fafb;border-left:3px solid #d1d5db;border-radius:0 8px 8px 0;padding:14px 18px;margin-bottom:20px;">
              <p style="font-size:10.5px;font-weight:700;color:#6b7280;text-transform:uppercase;letter-spacing:.1em;margin:0 0 5px;">Payment Terms</p>
              <p style="font-size:13px;color:#6b7280;line-height:1.6;margin:0;">{{ $invoice->terms }}</p>
            </div>
            @endif

            <p style="font-size:13.5px;color:#6b7280;line-height:1.6;margin:20px 0 0;">
              To arrange payment or for any queries, please reply to this email or call us at
              <strong style="color:#111827;">+234 707 777 6734</strong>.
            </p>

          </td>
        </tr>

        {{-- Footer --}}
        <tr>
          <td style="background:#f9f5ff;border-radius:0 0 14px 14px;padding:20px 40px;text-align:center;">
            <p style="font-size:13px;font-weight:600;color:#61078B;margin:0 0 4px;">AI Digital Agency</p>
            <p style="font-size:12px;color:#9ca3af;margin:0;">aidigitalagency08@gmail.com &nbsp;·&nbsp; +234 707 777 6734 &nbsp;·&nbsp; Lagos, Nigeria</p>
          </td>
        </tr>

      </table>
    </td>
  </tr>
</table>

</body>
</html>
