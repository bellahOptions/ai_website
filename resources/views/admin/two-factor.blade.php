<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify it's you — AI Digital Agency</title>
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
        .brand p  { font-size: 13.5px; color: #6b7280; margin: 0; }
        .card {
            background: #fff; border: 1px solid #e5e7eb;
            border-radius: 16px; padding: 32px;
            box-shadow: 0 4px 24px rgba(0,0,0,.07); text-align: center;
        }
        .lock-icon {
            width: 56px; height: 56px; border-radius: 50%;
            background: #f5f0ff; display: flex; align-items: center; justify-content: center;
            margin: 0 auto 18px; color: #61078B;
        }
        .card-title { font-size: 17px; font-weight: 700; color: #111827; margin: 0 0 8px; }
        .card-desc  { font-size: 13.5px; color: #6b7280; line-height: 1.6; margin: 0 0 24px; }
        .card-desc strong { color: #111827; font-weight: 600; }
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
            font-size: 13px; margin-bottom: 16px; text-align: left;
        }
        .divider { border: none; border-top: 1px solid #f3f4f6; margin: 20px 0; }
        .link-btn {
            background: none; border: none; cursor: pointer; font-family: inherit; padding: 4px 0;
            font-size: 13px; color: #61078B; font-weight: 600; text-decoration: none;
        }
        .link-btn:hover:not(:disabled) { text-decoration: underline; }
        .link-btn:disabled { color: #9ca3af; cursor: default; font-weight: 500; }
        .grey-link { color: #6b7280; font-size: 13px; text-decoration: none; }
        .grey-link:hover { color: #61078B; }
        .options { display: flex; flex-direction: column; gap: 6px; align-items: center; }
    </style>
</head>
<body>
    @php
        $titles = [
            'email' => 'Check your email',
            'totp' => 'Enter authenticator code',
            'recovery' => 'Enter recovery code',
        ];
    @endphp
    <div class="wrap">
        <div class="brand">
            <div class="brand-icon">
                <svg width="26" height="26" viewBox="0 0 20 20" fill="white"><path d="M10 2L3 7v11h5v-5h4v5h5V7L10 2z"/></svg>
            </div>
            <h1>Admin Portal</h1>
            <p>AI Digital Agency</p>
        </div>

        <div class="card">
            <div class="lock-icon" aria-hidden="true">
                @if($method === 'email')
                    <svg width="26" height="26" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                @else
                    <svg width="26" height="26" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><rect width="18" height="11" x="3" y="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                @endif
            </div>

            <h2 class="card-title">{{ $titles[$method] }}</h2>
            <p class="card-desc">
                @if($method === 'email')
                    We sent a 6-digit code to <strong>{{ $maskedEmail }}</strong>. It expires in 10 minutes.
                @elseif($method === 'totp')
                    Open your authenticator app and enter the 6-digit code.
                @else
                    Enter one of the recovery codes you saved when you set up your authenticator app.
                @endif
            </p>

            @if(session('status'))
                <div class="alert-success" role="status">{{ session('status') }}</div>
            @endif

            @if($sendFailed)
                <div class="alert-error" role="alert">
                    We couldn't send the email right now.
                    @if($hasTotp) Use your authenticator app instead, or try again shortly. @else Please try again shortly. @endif
                </div>
            @endif

            @if($errors->any())
                <div class="alert-error" role="alert">
                    @foreach($errors->all() as $e)<p style="margin:0 0 2px;">{{ $e }}</p>@endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('admin.2fa.verify') }}">
                @csrf
                <input type="hidden" name="method" value="{{ $method }}">
                @if($method === 'recovery')
                    <label for="recovery_code" class="sr-only">Recovery code</label>
                    <input id="recovery_code" type="text" name="recovery_code" placeholder="xxxxx-xxxxx" autocomplete="off" autofocus
                           class="otp-input" style="letter-spacing:2px;font-size:18px;">
                @else
                    <label for="code" class="sr-only">6-digit code</label>
                    <input id="code" type="text" name="code" inputmode="numeric" pattern="\d{6}" maxlength="6"
                           autocomplete="one-time-code" autofocus placeholder="000000" class="otp-input">
                @endif
                <button type="submit" class="btn-verify">Verify & Sign In</button>
            </form>

            <hr class="divider">

            <div class="options">
                @if($method === 'email')
                    <form method="POST" action="{{ route('admin.2fa.resend') }}" id="resend-form">
                        @csrf
                        <button type="submit" class="link-btn" id="resend-btn" data-wait="{{ $resendIn }}" @disabled($resendIn > 0)>Resend code</button>
                    </form>
                    @if($hasTotp)
                        <a href="{{ route('admin.2fa.form', ['method' => 'totp']) }}" class="link-btn" style="text-decoration:none;">Use authenticator app instead</a>
                    @endif
                @else
                    <a href="{{ route('admin.2fa.form') }}" class="link-btn" style="text-decoration:none;">Email me a code instead</a>
                    @if($method === 'totp')
                        <a href="{{ route('admin.2fa.form', ['method' => 'recovery']) }}" class="link-btn" style="text-decoration:none;">Use a recovery code</a>
                    @else
                        <a href="{{ route('admin.2fa.form', ['method' => 'totp']) }}" class="link-btn" style="text-decoration:none;">Use authenticator app instead</a>
                    @endif
                @endif
                <a href="{{ route('admin.login') }}" class="grey-link" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Back to login</a>
            </div>
        </div>
    </div>

    <form id="logout-form" method="POST" action="{{ route('admin.logout') }}" style="display:none;">@csrf</form>

    <script>
        (function () {
            var btn = document.getElementById('resend-btn');
            if (!btn) return;
            var wait = parseInt(btn.dataset.wait, 10) || 0;
            if (wait <= 0) return;
            var label = 'Resend code';
            function tick() {
                if (wait <= 0) { btn.disabled = false; btn.textContent = label; return; }
                btn.textContent = label + ' (' + wait + 's)';
                wait--; setTimeout(tick, 1000);
            }
            tick();
        })();
    </script>
</body>
</html>
