<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') — AI Digital Agency</title>
    <meta name="robots" content="noindex, nofollow">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; }
        html, body {
            height: 100%; margin: 0;
            font-family: 'Inter', system-ui, sans-serif;
            background: #fbf8ff;
            color: #111827;
            overflow-x: hidden;
        }
        .canvas {
            position: relative;
            min-height: 100vh;
            display: flex; flex-direction: column; align-items: center; justify-content: center;
            text-align: center;
            padding: 32px 20px;
            background:
                radial-gradient(circle at 12% 18%, rgba(97,7,139,.16) 0%, transparent 42%),
                radial-gradient(circle at 88% 82%, rgba(97,7,139,.14) 0%, transparent 45%),
                radial-gradient(circle at 90% 10%, rgba(97,7,139,.08) 0%, transparent 40%),
                #fbf8ff;
        }
        .blob {
            position: absolute; border-radius: 50%; filter: blur(60px);
            background: linear-gradient(135deg, rgba(97,7,139,.25), rgba(124,34,168,.06));
            z-index: 0;
        }
        .blob-1 { width: 340px; height: 340px; top: -80px; left: -100px; }
        .blob-2 { width: 420px; height: 420px; bottom: -140px; right: -120px; }

        .content { position: relative; z-index: 1; max-width: 560px; }

        .brand { display: inline-flex; align-items: center; gap: 10px; margin-bottom: 44px; }
        .brand img { height: 26px; width: auto; }

        .code {
            font-size: clamp(88px, 18vw, 168px);
            font-weight: 800; line-height: 1;
            letter-spacing: -4px;
            background: linear-gradient(135deg, #61078B 0%, #a03cd6 100%);
            -webkit-background-clip: text; background-clip: text; color: transparent;
            margin: 0;
        }
        .title { font-size: clamp(20px, 3vw, 26px); font-weight: 700; color: #111827; margin: 8px 0 12px; }
        .desc  { font-size: 15px; color: #6b7280; line-height: 1.7; margin: 0 0 36px; }

        .actions { display: flex; flex-wrap: wrap; gap: 12px; justify-content: center; }
        .btn {
            display: inline-flex; align-items: center; justify-content: center;
            padding: 12px 26px; border-radius: 10px; font-size: 14.5px; font-weight: 600;
            font-family: inherit; text-decoration: none; cursor: pointer; border: none;
            transition: background 150ms, box-shadow 150ms, transform 150ms;
        }
        .btn-primary {
            background: #61078B; color: #fff;
            box-shadow: 0 4px 16px rgba(97,7,139,.32);
        }
        .btn-primary:hover { background: #7c22a8; box-shadow: 0 6px 20px rgba(97,7,139,.4); transform: translateY(-1px); }
        .btn-outline {
            background: #fff; color: #61078B; border: 1.5px solid #e5d9f0;
        }
        .btn-outline:hover { border-color: #61078B; background: #faf5ff; }

        .foot { margin-top: 56px; font-size: 12.5px; color: #b3a9c2; position: relative; z-index: 1; }
    </style>
    @stack('styles')
</head>
<body>
    <div class="canvas">
        <div class="blob blob-1"></div>
        <div class="blob blob-2"></div>

        <div class="content">
            <a href="{{ url('/') }}" class="brand">
                <img src="{{ asset('logo.svg') }}" alt="AI Digital Agency">
            </a>

            <p class="code">@yield('code')</p>
            <h1 class="title">@yield('title')</h1>
            <p class="desc">@yield('message')</p>

            <div class="actions">
                <a href="{{ url('/') }}" class="btn btn-primary">Back to homepage</a>
                <a href="{{ route('contact.page') }}" class="btn btn-outline">Contact support</a>
            </div>
        </div>

        <p class="foot">AI Digital Agency &copy; {{ date('Y') }}</p>
    </div>
</body>
</html>
