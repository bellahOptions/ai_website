<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password — AI Digital Agency</title>
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
        .login-wrap { width: 100%; max-width: 400px; }
        .login-brand {
            text-align: center;
            margin-bottom: 28px;
        }
        .login-icon {
            width: 52px; height: 52px;
            border-radius: 14px;
            background: #61078B;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 14px;
            box-shadow: 0 6px 24px rgba(97,7,139,.35);
        }
        .login-brand h1 { font-size: 22px; font-weight: 700; color: #111827; margin: 0 0 4px; }
        .login-brand p  { font-size: 13.5px; color: #9ca3af; margin: 0; }
        .login-card {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            padding: 32px;
            box-shadow: 0 4px 24px rgba(0,0,0,.07);
        }
        .card-title { font-size: 16px; font-weight: 600; color: #111827; margin: 0 0 6px; }
        .card-desc  { font-size: 13.5px; color: #6b7280; margin: 0 0 22px; line-height: 1.5; }
        .form-group { margin-bottom: 18px; }
        .form-label { display: block; font-size: 13.5px; font-weight: 500; color: #374151; margin-bottom: 7px; }
        .form-input {
            width: 100%; padding: 10px 14px;
            border: 1.5px solid #d1d5db;
            border-radius: 9px;
            font-size: 14px; color: #111827;
            font-family: inherit;
            outline: none;
            transition: border 150ms, box-shadow 150ms;
            background: #fff;
        }
        .form-input:focus { border-color: #61078B; box-shadow: 0 0 0 3px rgba(97,7,139,.12); }
        .form-input::placeholder { color: #d1d5db; }
        .btn-submit {
            width: 100%; padding: 11px;
            background: #61078B; color: #fff;
            border: none; border-radius: 9px;
            font-size: 14.5px; font-weight: 600;
            font-family: inherit; cursor: pointer;
            transition: background 150ms, box-shadow 150ms;
            box-shadow: 0 2px 8px rgba(97,7,139,.3);
        }
        .btn-submit:hover { background: #7c22a8; box-shadow: 0 4px 16px rgba(97,7,139,.4); }
        .alert-error {
            background: #fef2f2; border: 1px solid #fecaca;
            color: #b91c1c; padding: 10px 14px;
            border-radius: 9px; font-size: 13px;
            margin-bottom: 18px;
        }
        .alert-success {
            background: #f0fdf4; border: 1px solid #bbf7d0;
            color: #15803d; padding: 10px 14px;
            border-radius: 9px; font-size: 13px;
            margin-bottom: 18px;
        }
        .back-link-wrap { text-align: center; margin-top: 20px; }
        .back-link-wrap a { font-size: 13px; color: #9ca3af; text-decoration: none; transition: color 120ms; }
        .back-link-wrap a:hover { color: #61078B; }
    </style>
</head>
<body>
    <div class="login-wrap">
        <div class="login-brand">
            <div class="login-icon">
                <svg width="26" height="26" viewBox="0 0 20 20" fill="white"><path d="M10 2L3 7v11h5v-5h4v5h5V7L10 2z"/></svg>
            </div>
            <h1>Admin Portal</h1>
            <p>AI Digital Agency</p>
        </div>

        <div class="login-card">
            <p class="card-title">Forgot your password?</p>
            <p class="card-desc">Enter your email address and we'll send you a link to reset your password.</p>

            @if(session('status'))
            <div class="alert-success">{{ session('status') }}</div>
            @endif

            @if($errors->any())
            <div class="alert-error">
                @foreach($errors->all() as $error)<p style="margin:0 0 3px;">{{ $error }}</p>@endforeach
            </div>
            @endif

            <form action="{{ route('admin.password.email') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" id="email" name="email" class="form-input"
                           value="{{ old('email') }}" required autofocus
                           placeholder="you@example.com">
                </div>
                <button type="submit" class="btn-submit">Send Reset Link</button>
            </form>
        </div>

        <div class="back-link-wrap">
            <a href="{{ route('admin.login') }}">← Back to login</a>
        </div>
    </div>
</body>
</html>
