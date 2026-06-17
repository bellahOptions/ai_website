<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Payment Received — {{ $invoice->invoice_number }}</title>
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
                  <span style="display:inline-block;background:rgba(255,255,255,.2);color:#fff;font-size:11px;font-weight:700;padding:4px 14px;border-radius:20px;text-transform:uppercase;letter-spacing:.06em;">Payment Receipt</span>
                </td>
              </tr>
            </table>
          </td>
        </tr>

        {{-- Checkmark band --}}
        <tr>
          <td style="background:#15803d;padding:20px 40px;text-align:center;">
            <table width="100%" cellpadding="0" cellspacing="0">
              <tr>
                <td align="center">
                  <span style="display:inline-block;width:44px;height:44px;border-radius:50%;background:rgba(255,255,255,.2);line-height:44px;font-size:22px;color:#fff;text-align:center;">✓</span>
                  <p style="font-size:18px;font-weight:700;color:#fff;margin:10px 0 2px;">Payment Received!</p>
                  <p style="font-size:13px;color:rgba(255,255,255,.8);margin:0;">Your account is now up to date.</p>
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
              We have received your payment for <strong style="color:#111827;">Invoice {{ $invoice->invoice_number }}</strong>.
              Thank you for your prompt payment — we truly value your business.
            </p>

            {{-- Receipt card --}}
            <table width="100%" cellpadding="0" cellspacing="0" style="background:#f9f5ff;border-radius:10px;padding:0;margin-bottom:28px;border:1px solid #e9d8f9;">
              <tr>
                <td style="padding:24px 28px;">
                  <table width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="padding:6px 0;font-size:13px;color:#6b7280;border-bottom:1px solid #ede9f8;">Invoice Number</td>
                      <td style="padding:6px 0;font-size:13px;font-weight:600;color:#111827;text-align:right;border-bottom:1px solid #ede9f8;">{{ $invoice->invoice_number }}</td>
                    </tr>
                    <tr>
                      <td style="padding:6px 0;font-size:13px;color:#6b7280;border-bottom:1px solid #ede9f8;">Date Paid</td>
                      <td style="padding:6px 0;font-size:13px;font-weight:600;color:#111827;text-align:right;border-bottom:1px solid #ede9f8;">{{ $invoice->paid_at->format('F j, Y') }}</td>
                    </tr>
                    <tr>
                      <td style="padding:10px 0 0;font-size:14px;font-weight:700;color:#111827;">Amount Paid</td>
                      <td style="padding:10px 0 0;font-size:22px;font-weight:800;color:#61078B;text-align:right;">{{ $invoice->currency }} {{ number_format($invoice->total, 2) }}</td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>

            {{-- Items summary --}}
            <p style="font-size:11px;font-weight:700;color:#61078B;text-transform:uppercase;letter-spacing:.1em;margin:0 0 12px;">Services Covered</p>
            <table width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;margin-bottom:28px;">
              @foreach($invoice->items as $item)
              <tr style="border-bottom:1px solid #f3f4f6;">
                <td style="padding:10px 0;font-size:13.5px;color:#374151;">{{ $item->description }}</td>
                <td style="padding:10px 0;font-size:13.5px;color:#6b7280;text-align:center;width:50px;">×{{ $item->quantity }}</td>
                <td style="padding:10px 0;font-size:13.5px;font-weight:600;color:#111827;text-align:right;width:110px;">{{ $invoice->currency }} {{ number_format($item->total, 2) }}</td>
              </tr>
              @endforeach
            </table>

            <p style="font-size:13.5px;color:#6b7280;line-height:1.6;margin:0;">
              If you have any questions about this receipt, please don't hesitate to reach out at
              <a href="mailto:aidigitalagency08@gmail.com" style="color:#61078B;text-decoration:none;font-weight:600;">aidigitalagency08@gmail.com</a>
              or call <strong style="color:#111827;">+234 707 777 6734</strong>.
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
