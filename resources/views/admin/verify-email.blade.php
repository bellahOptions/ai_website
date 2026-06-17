<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email — AI Digital Agency</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css'])
    @endif
    <style>
        *, *::before, *::after { box-sizing: border-box; }
        body {
            font-family: 'Inter', system-ui, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f5f0ff;
            padding: 20px;
            margin: 0;
        }
        .wrap { width: 100%; max-width: 420px; }
        .brand { text-align: center; margin-bottom: 28px; }
        .brand-icon {
            width: 52px; height: 52px;
            border-radius: 14px;
            background: #61078B;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 14px;
            box-shadow: 0 6px 24px rgba(97,7,139,.35);
        }
        .brand h1 { font-size: 22px; font-weight: 700; color: #111827; margin: 0 0 4px; }
        .brand p  { font-size: 13.5px; color: #9ca3af; margin: 0; }
        .card {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            padding: 32px;
            box-shadow: 0 4px 24px rgba(0,0,0,.07);
            text-align: center;
        }
        .email-icon {
            width: 60px; height: 60px;
            border-radius: 50%;
            background: #f5f0ff;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 18px;
        }
        .card-title { font-size: 17px; font-weight: 700; color: #111827; margin: 0 0 10px; }
        .card-desc  { font-size: 13.5px; color: #6b7280; line-height: 1.6; margin: 0 0 24px; }
        .email-highlight {
            display: inline-block;
            background: #f5f0ff; color: #61078B;
            font-weight: 600; font-size: 13.5px;
            padding: 4px 12px; border-radius: 6px;
            margin-bottom: 24px;
        }
        .btn-resend {
            width: 100%; padding: 11px;
            background: #61078B; color: #fff;
            border: none; border-radius: 9px;
            font-size: 14.5px; font-weight: 600;
            font-family: inherit; cursor: pointer;
            transition: background 150ms, box-shadow 150ms;
            box-shadow: 0 2px 8px rgba(97,7,139,.3);
        }
        .btn-resend:hover { background: #7c22a8; box-shadow: 0 4px 16px rgba(97,7,139,.4); }
        .alert-success {
            background: #f0fdf4; border: 1px solid #bbf7d0;
            color: #15803d; padding: 10px 14px;
            border-radius: 9px; font-size: 13px;
            margin-bottom: 18px;
        }
        .divider { border: none; border-top: 1px solid #f3f4f6; margin: 20px 0; }
        .logout-link { font-size: 13px; color: #9ca3af; text-decoration: none; transition: color 120ms; }
        .logout-link:hover { color: #61078B; }
    </style>
</head>
<body>
    <div class="wrap">
        <div class="brand">
            <div class="brand-icon">
                <svg width="26" height="26" viewBox="0 0 20 20" fill="white"><path d="M10 2L3 7v11h5v-5h4v5h5V7L10 2z"/></svg>
            </div>
            <h1>Admin Portal</h1>
            <p>AI Digital Agency</p>
        </div>

        <div class="card">
            <div class="email-icon">
                <svg width="28" height="28" fill="none" stroke="#61078B" stroke-width="1.8" viewBox="0 0 24 24">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                    <polyline points="22,6 12,13 2,6"/>
                </svg>
            </div>

            <h2 class="card-title">Check your email</h2>
            <p class="card-desc">We sent a verification link to:</p>
            <span class="email-highlight">{{ auth()->user()->email }}</span>

            @if(session('status') === 'verification-link-sent')
            <div class="alert-success">A new verification link has been sent to your email.</div>
            @endif

            <p class="card-desc" style="margin-bottom:20px;">
                Click the link in the email to verify your account and access the admin panel.
                If you didn't receive it, click below to resend.
            </p>

            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="btn-resend">Resend Verification Email</button>
            </form>

            <hr class="divider">

            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" style="background:none;border:none;cursor:pointer;font-family:inherit;" class="logout-link">
                    Sign out of this account
                </button>
            </form>
        </div>
    </div>
</body>
</html>
