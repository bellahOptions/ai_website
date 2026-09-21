<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Your sign-in code</title>
</head>
<body style="margin:0;padding:0;background:#f3f4f6;font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;">
<table width="100%" cellpadding="0" cellspacing="0" style="background:#f3f4f6;padding:40px 16px;">
  <tr>
    <td align="center">
      <table width="480" cellpadding="0" cellspacing="0" style="max-width:480px;width:100%;">
        <tr>
          <td style="background:#61078B;border-radius:14px 14px 0 0;padding:28px 40px;text-align:center;">
            <img src="{{ asset('logo-wt.svg') }}" alt="AI Digital Agency" style="height:36px;width:auto;display:block;margin:0 auto;">
          </td>
        </tr>
        <tr>
          <td style="background:#ffffff;padding:36px 40px;text-align:center;">
            <p style="margin:0 0 6px;font-size:16px;font-weight:700;color:#111827;">Hi {{ $user->name }}, here's your sign-in code</p>
            <p style="margin:0 0 24px;font-size:14px;line-height:1.6;color:#6b7280;">Enter this code to finish signing in to the Admin Portal.</p>
            <p style="margin:0 0 24px;font-family:'Courier New',monospace;font-size:36px;font-weight:700;letter-spacing:10px;color:#61078B;background:#faf5ff;border:1px dashed #d8c2ea;border-radius:12px;padding:18px 0;">{{ $code }}</p>
            <p style="margin:0;font-size:13px;line-height:1.6;color:#6b7280;">This code expires in {{ $minutes }} minutes and can be used once. If you didn't try to sign in, ignore this email and consider changing your password.</p>
          </td>
        </tr>
        <tr>
          <td style="background:#faf5ff;border-radius:0 0 14px 14px;padding:16px 40px;text-align:center;font-size:12px;color:#9ca3af;">
            &copy; {{ date('Y') }} AI Digital Agency
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
</body>
</html>
