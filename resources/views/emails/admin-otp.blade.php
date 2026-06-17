<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Your Login Code — AI Digital Agency</title>
</head>
<body style="margin:0;padding:0;background:#f3f4f6;font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" style="background:#f3f4f6;padding:40px 16px;">
  <tr>
    <td align="center">
      <table width="520" cellpadding="0" cellspacing="0" style="max-width:520px;width:100%;">

        {{-- Header --}}
        <tr>
          <td style="background:#61078B;border-radius:14px 14px 0 0;padding:28px 36px;">
            <table width="100%" cellpadding="0" cellspacing="0">
              <tr>
                <td>
                  <img src="{{ asset('logo-wt.svg') }}" alt="AI Digital Agency" style="height:40px;width:auto;display:block;">
                </td>
                <td align="right">
                  <span style="display:inline-block;background:rgba(255,255,255,.2);color:#fff;font-size:11px;font-weight:700;padding:4px 12px;border-radius:20px;text-transform:uppercase;letter-spacing:.06em;">Security Code</span>
                </td>
              </tr>
            </table>
          </td>
        </tr>

        {{-- Body --}}
        <tr>
          <td style="background:#ffffff;padding:36px;text-align:center;">
            <div style="width:52px;height:52px;border-radius:50%;background:#f5f0ff;margin:0 auto 18px;display:flex;align-items:center;justify-content:center;">
              <svg width="26" height="26" fill="none" stroke="#61078B" stroke-width="1.8" viewBox="0 0 24 24" style="display:block;margin:13px auto;">
                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
              </svg>
            </div>

            <p style="font-size:17px;font-weight:700;color:#111827;margin:0 0 8px;">Two-Factor Authentication</p>
            <p style="font-size:14px;color:#6b7280;line-height:1.6;margin:0 0 28px;">
              Hi <strong style="color:#111827;">{{ $user->name }}</strong>, use the code below to complete your login.
              It expires in <strong style="color:#111827;">10 minutes</strong>.
            </p>

            {{-- OTP code --}}
            <div style="background:#f9f5ff;border:2px dashed #c4b5d4;border-radius:12px;padding:24px 32px;margin:0 auto 28px;max-width:280px;">
              <p style="font-size:38px;font-weight:800;color:#61078B;letter-spacing:10px;margin:0;font-family:'Courier New',monospace;">{{ $code }}</p>
            </div>

            <p style="font-size:13px;color:#9ca3af;line-height:1.6;margin:0;">
              If you didn't attempt to log in, please ignore this email and consider changing your password immediately.<br>
              Never share this code with anyone.
            </p>
          </td>
        </tr>

        {{-- Footer --}}
        <tr>
          <td style="background:#f9f5ff;border-radius:0 0 14px 14px;padding:18px 36px;text-align:center;">
            <p style="font-size:13px;font-weight:600;color:#61078B;margin:0 0 4px;">AI Digital Agency</p>
            <p style="font-size:12px;color:#9ca3af;margin:0;">sales@aidigitalagency.com.ng &nbsp;·&nbsp; +234 902 408 3203</p>
          </td>
        </tr>

      </table>
    </td>
  </tr>
</table>

</body>
</html>
