<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Two-Factor Authentication — AI Digital Agency</title>
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
            display: flex; align-items: center; justify-content: center;
            background: #f5f0ff; padding: 20px; margin: 0;
        }
        .wrap { width: 100%; max-width: 400px; }
        .brand { text-align: center; margin-bottom: 28px; }
        .brand-icon {
            width: 52px; height: 52px; border-radius: 14px;
            background: #61078B; display: flex; align-items: center; justify-content: center;
            margin: 0 auto 14px; box-shadow: 0 6px 24px rgba(97,7,139,.35);
        }
        .brand h1 { font-size: 22px; font-weight: 700; color: #111827; margin: 0 0 4px; }
        .brand p  { font-size: 13.5px; color: #9ca3af; margin: 0; }
        .card {
            background: #fff; border: 1px solid #e5e7eb;
            border-radius: 16px; padding: 32px;
            box-shadow: 0 4px 24px rgba(0,0,0,.07); text-align: center;
        }
        .lock-icon {
            width: 56px; height: 56px; border-radius: 50%;
            background: #f5f0ff; display: flex; align-items: center; justify-content: center;
            margin: 0 auto 18px;
        }
        .card-title { font-size: 17px; font-weight: 700; color: #111827; margin: 0 0 8px; }
        .card-desc  { font-size: 13.5px; color: #6b7280; line-height: 1.6; margin: 0 0 24px; }
        .otp-input {
            width: 100%; padding: 14px; text-align: center;
            font-size: 28px; font-weight: 700; letter-spacing: 12px;
            border: 2px solid #d1d5db; border-radius: 10px;
            font-family: 'Courier New', monospace; color: #61078B;
            outline: none; transition: border 150ms, box-shadow 150ms;
            background: #fdfbff;
        }
        .otp-input:focus { border-color: #61078B; box-shadow: 0 0 0 3px rgba(97,7,139,.12); }
        .btn-verify {
            width: 100%; padding: 11px; margin-top: 16px;
            background: #61078B; color: #fff; border: none; border-radius: 9px;
            font-size: 14.5px; font-weight: 600; font-family: inherit; cursor: pointer;
            transition: background 150ms, box-shadow 150ms;
            box-shadow: 0 2px 8px rgba(97,7,139,.3);
        }
        .btn-verify:hover { background: #7c22a8; box-shadow: 0 4px 16px rgba(97,7,139,.4); }
        .alert-error {
            background: #fef2f2; border: 1px solid #fecaca;
            color: #b91c1c; padding: 10px 14px; border-radius: 9px;
            font-size: 13px; margin-bottom: 16px; text-align: left;
        }
        .alert-success {
            background: #f0fdf4; border: 1px solid #bbf7d0;
            color: #15803d; padding: 10px 14px; border-radius: 9px;
            font-size: 13px; margin-bottom: 16px;
        }
        .divider { border: none; border-top: 1px solid #f3f4f6; margin: 20px 0; }
        .link-btn {
            background: none; border: none; cursor: pointer; font-family: inherit;
            font-size: 13px; color: #61078B; font-weight: 600; text-decoration: none;
        }
        .link-btn:hover { text-decoration: underline; }
        .grey-link { color: #9ca3af; font-size: 13px; text-decoration: none; }
        .grey-link:hover { color: #61078B; }
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
            <div class="lock-icon">
                <svg width="26" height="26" fill="none" stroke="#61078B" stroke-width="1.8" viewBox="0 0 24 24">
                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                    <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                </svg>
            </div>

            <h2 class="card-title">Check your email</h2>
            <p class="card-desc">We sent a 6-digit code to your email address. Enter it below to continue.</p>

            @if(session('status'))
            <div class="alert-success">{{ session('status') }}</div>
            @endif

            @if($errors->any())
            <div class="alert-error">
                @foreach($errors->all() as $e)<p style="margin:0 0 2px;">{{ $e }}</p>@endforeach
            </div>
            @endif

            <form method="POST" action="{{ route('admin.2fa.verify') }}">
                @csrf
                <input type="text" name="code" inputmode="numeric" pattern="\d{6}" maxlength="6"
                       autocomplete="one-time-code" autofocus placeholder="000000"
                       class="otp-input" value="{{ old('code') }}">
                <button type="submit" class="btn-verify">Verify & Sign In</button>
            </form>

            <hr class="divider">

            <form method="POST" action="{{ route('admin.2fa.resend') }}" style="display:inline;">
                @csrf
                <button type="submit" class="link-btn">Resend code</button>
            </form>
            &nbsp;·&nbsp;
            <a href="{{ route('admin.login') }}" class="grey-link">Back to login</a>
        </div>
    </div>
</body>
</html>
