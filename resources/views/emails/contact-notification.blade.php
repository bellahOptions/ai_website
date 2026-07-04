<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>New Contact Form Submission — AI Digital Agency</title>
</head>
<body style="margin:0;padding:0;background:#f3f4f6;font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" style="background:#f3f4f6;padding:40px 16px;">
  <tr>
    <td align="center">
      <table width="600" cellpadding="0" cellspacing="0" style="max-width:600px;width:100%;">

        {{-- Header --}}
        <tr>
          <td style="background:#61078B;border-radius:14px 14px 0 0;padding:32px 40px;text-align:center;">
            <img src="{{ asset('logo-wt.svg') }}" alt="AI Digital Agency" style="height:40px;width:auto;display:block;margin:0 auto 12px;">
            <span style="display:inline-block;background:rgba(255,255,255,.2);color:#fff;font-size:11px;font-weight:700;padding:4px 14px;border-radius:20px;text-transform:uppercase;letter-spacing:.06em;">New Contact Form Submission</span>
          </td>
        </tr>

        {{-- Body --}}
        <tr>
          <td style="background:#ffffff;padding:36px 40px 28px;">

            <table width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;margin-bottom:20px;">
              <tr>
                <td style="padding:10px 0;font-size:13px;color:#6b7280;border-bottom:1px solid #f3f4f6;width:120px;">Name</td>
                <td style="padding:10px 0;font-size:13.5px;font-weight:600;color:#111827;border-bottom:1px solid #f3f4f6;">{{ $contact->full_name }}</td>
              </tr>
              <tr>
                <td style="padding:10px 0;font-size:13px;color:#6b7280;border-bottom:1px solid #f3f4f6;">Email</td>
                <td style="padding:10px 0;font-size:13.5px;border-bottom:1px solid #f3f4f6;">
                  <a href="mailto:{{ $contact->email }}" style="color:#61078B;text-decoration:none;font-weight:600;">{{ $contact->email }}</a>
                </td>
              </tr>
              <tr>
                <td style="padding:10px 0;font-size:13px;color:#6b7280;border-bottom:1px solid #f3f4f6;">Phone</td>
                <td style="padding:10px 0;font-size:13.5px;border-bottom:1px solid #f3f4f6;">
                  <a href="tel:{{ $contact->phone }}" style="color:#61078B;text-decoration:none;font-weight:600;">{{ $contact->phone }}</a>
                </td>
              </tr>
              <tr>
                <td style="padding:10px 0;font-size:13px;color:#6b7280;">Subject</td>
                <td style="padding:10px 0;font-size:13.5px;font-weight:600;color:#111827;">{{ $contact->subject }}</td>
              </tr>
            </table>

            <p style="font-size:10.5px;font-weight:700;color:#61078B;text-transform:uppercase;letter-spacing:.1em;margin:0 0 8px;">Message</p>
            <div style="background:#f9fafb;border-left:3px solid #61078B;border-radius:0 8px 8px 0;padding:14px 18px;margin-bottom:24px;">
              <p style="font-size:13.5px;color:#374151;line-height:1.6;margin:0;">{{ $contact->message }}</p>
            </div>

            <p style="font-size:12.5px;color:#9ca3af;margin:0 0 24px;">Submitted {{ $contact->created_at->format('F j, Y \a\t g:i A') }}</p>

            <table cellpadding="0" cellspacing="0" style="margin:0 auto;">
              <tr>
                <td style="background:#61078B;border-radius:8px;">
                  <a href="mailto:{{ $contact->email }}?subject={{ rawurlencode('Re: ' . $contact->subject) }}"
                     style="display:inline-block;padding:12px 28px;font-size:14px;font-weight:700;color:#fff;text-decoration:none;">
                    Reply to {{ $contact->full_name }}
                  </a>
                </td>
              </tr>
            </table>

          </td>
        </tr>

        {{-- Footer --}}
        <tr>
          <td style="background:#f9f5ff;border-radius:0 0 14px 14px;padding:20px 40px;text-align:center;">
            <p style="font-size:13px;font-weight:600;color:#61078B;margin:0 0 4px;">AI Digital Agency</p>
            <p style="font-size:12px;color:#9ca3af;margin:0;">This is an automated notification from your contact form &nbsp;·&nbsp; Lagos, Nigeria</p>
          </td>
        </tr>

      </table>
    </td>
  </tr>
</table>

</body>
</html>
