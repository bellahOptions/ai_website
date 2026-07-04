<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Set Up Two-Factor Authentication — AI Digital Agency</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; }
        body {
            font-family: 'Inter', system-ui, sans-serif;
            min-height: 100vh;
            display: flex; align-items: center; justify-content: center;
            background: #f5f0ff; padding: 20px; margin: 0;
        }
        .wrap { width: 100%; max-width: 440px; }
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
        .card-title { font-size: 17px; font-weight: 700; color: #111827; margin: 0 0 8px; }
        .card-desc  { font-size: 13.5px; color: #6b7280; line-height: 1.6; margin: 0 0 24px; }
        .step { display: none; }
        .step.active { display: block; }
        #qr-wrap { display: flex; justify-content: center; margin-bottom: 18px; }
        #qr-wrap svg { border: 8px solid #fff; box-shadow: 0 0 0 1px #e5e7eb; border-radius: 8px; }
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
        .btn-verify:disabled { opacity: .6; cursor: default; }
        .alert-error {
            background: #fef2f2; border: 1px solid #fecaca;
            color: #b91c1c; padding: 10px 14px; border-radius: 9px;
            font-size: 13px; margin-bottom: 16px; text-align: left;
        }
        .recovery-codes {
            list-style: none; margin: 0 0 20px; padding: 16px;
            background: #fdfbff; border: 1px dashed #d8c2ea; border-radius: 10px;
            font-family: 'Courier New', monospace; font-size: 13.5px; color: #374151;
            text-align: left; display: grid; grid-template-columns: 1fr 1fr; gap: 6px;
        }
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
            {{-- Step 1: scan QR --}}
            <div class="step active" id="step-scan">
                <h2 class="card-title">Set up two-factor authentication</h2>
                <p class="card-desc">Scan this QR code with an authenticator app (Google Authenticator, Authy, etc.), then enter the 6-digit code it shows you.</p>
                <div id="qr-wrap"></div>
                <div id="scan-error" class="alert-error" style="display:none;"></div>
                <input type="text" id="confirm-code" inputmode="numeric" pattern="\d{6}" maxlength="6"
                       autocomplete="one-time-code" placeholder="000000" class="otp-input">
                <button type="button" id="confirm-btn" class="btn-verify">Confirm & Enable</button>
            </div>

            {{-- Step 2: recovery codes --}}
            <div class="step" id="step-codes">
                <h2 class="card-title">Save your recovery codes</h2>
                <p class="card-desc">Store these somewhere safe. Each code can be used once if you lose access to your authenticator app.</p>
                <ul class="recovery-codes" id="recovery-codes-list"></ul>
                <form method="POST" action="{{ route('admin.2fa.setup.complete') }}">
                    @csrf
                    <button type="submit" class="btn-verify">I've saved my recovery codes — Continue to Dashboard</button>
                </form>
            </div>
        </div>

        <div style="text-align:center;margin-top:16px;">
            <a href="{{ route('admin.logout') }}" class="grey-link" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log out</a>
        </div>
        <form id="logout-form" method="POST" action="{{ route('admin.logout') }}" style="display:none;">@csrf</form>
    </div>

    <script>
        var csrfToken = document.querySelector('meta[name="csrf-token"]').content;

        function apiPost(url) {
            return fetch(url, {
                method: 'POST',
                headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': csrfToken, 'Content-Type': 'application/json' },
                body: '{}',
            });
        }
        function apiGet(url) {
            return fetch(url, { headers: { 'Accept': 'application/json' } });
        }

        @if($confirmed)
            // Already confirmed this account, just not this session (e.g. the
            // page was reloaded after confirming but before continuing) — skip
            // straight to the recovery-codes step instead of restarting enrollment.
            apiGet('{{ route('two-factor.recovery-codes') }}')
                .then(function (r) { return r.json(); })
                .then(function (codes) {
                    var list = document.getElementById('recovery-codes-list');
                    list.innerHTML = '';
                    codes.forEach(function (code) {
                        var li = document.createElement('li');
                        li.textContent = code;
                        list.appendChild(li);
                    });
                    document.getElementById('step-scan').classList.remove('active');
                    document.getElementById('step-codes').classList.add('active');
                });
        @else
            apiPost('{{ route('two-factor.enable') }}')
                .then(function () { return apiGet('{{ route('two-factor.qr-code') }}'); })
                .then(function (r) { return r.json(); })
                .then(function (data) {
                    document.getElementById('qr-wrap').innerHTML = data.svg;
                })
                .catch(function () {
                    document.getElementById('scan-error').textContent = 'Could not load the QR code. Please refresh the page.';
                    document.getElementById('scan-error').style.display = 'block';
                });
        @endif

        document.getElementById('confirm-btn').addEventListener('click', function () {
            var btn = this;
            var code = document.getElementById('confirm-code').value;
            var errorBox = document.getElementById('scan-error');
            errorBox.style.display = 'none';
            btn.disabled = true;
            btn.textContent = 'Confirming…';

            fetch('{{ route('two-factor.confirm') }}', {
                method: 'POST',
                headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': csrfToken, 'Content-Type': 'application/json' },
                body: JSON.stringify({ code: code }),
            }).then(function (r) {
                if (!r.ok) {
                    return r.json().then(function (data) {
                        throw new Error((data.errors && data.errors.code && data.errors.code[0]) || 'Invalid code.');
                    });
                }
                return apiGet('{{ route('two-factor.recovery-codes') }}').then(function (r2) { return r2.json(); });
            }).then(function (codes) {
                var list = document.getElementById('recovery-codes-list');
                list.innerHTML = '';
                codes.forEach(function (code) {
                    var li = document.createElement('li');
                    li.textContent = code;
                    list.appendChild(li);
                });
                document.getElementById('step-scan').classList.remove('active');
                document.getElementById('step-codes').classList.add('active');
            }).catch(function (err) {
                errorBox.textContent = err.message;
                errorBox.style.display = 'block';
                btn.disabled = false;
                btn.textContent = 'Confirm & Enable';
            });
        });
    </script>
</body>
</html>
