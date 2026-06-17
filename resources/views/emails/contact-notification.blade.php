<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Form Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .header {
            background: linear-gradient(135deg, #7c3aed 0%, #4c1d95 100%);
            color: #ffffff;
            padding: 20px;
            border-radius: 8px 8px 0 0;
            margin: -30px -30px 30px -30px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .field {
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }
        .field:last-child {
            border-bottom: none;
        }
        .label {
            font-weight: bold;
            color: #7c3aed;
            display: block;
            margin-bottom: 5px;
        }
        .value {
            color: #333;
        }
        .message-box {
            background-color: #f9fafb;
            border-left: 4px solid #7c3aed;
            padding: 15px;
            border-radius: 4px;
            margin-top: 10px;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            color: #666;
            font-size: 12px;
        }
        .reply-button {
            display: inline-block;
            background: linear-gradient(135deg, #7c3aed 0%, #4c1d95 100%);
            color: #ffffff;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 6px;
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ asset('logo-wt.svg') }}" alt="AI Digital Agency" style="height:40px;width:auto;display:block;margin:0 auto 12px;">
            <h1>📧 New Contact Form Submission</h1>
        </div>

        <div class="field">
            <span class="label">Name:</span>
            <span class="value">{{ $contact->full_name }}</span>
        </div>

        <div class="field">
            <span class="label">Email:</span>
            <span class="value">
                <a href="mailto:{{ $contact->email }}" style="color: #7c3aed;">{{ $contact->email }}</a>
            </span>
        </div>

        <div class="field">
            <span class="label">Phone:</span>
            <span class="value">
                <a href="tel:{{ $contact->phone }}" style="color: #7c3aed;">{{ $contact->phone }}</a>
            </span>
        </div>

        <div class="field">
            <span class="label">Subject:</span>
            <span class="value">{{ $contact->subject }}</span>
        </div>

        <div class="field">
            <span class="label">Message:</span>
            <div class="message-box">
                {{ $contact->message }}
            </div>
        </div>

        <div class="field">
            <span class="label">Submitted:</span>
            <span class="value">{{ $contact->created_at->format('F d, Y \a\t g:i A') }}</span>
        </div>

        <div style="text-align: center;">
            <a href="mailto:{{ $contact->email }}?subject=Re: {{ $contact->subject }}" class="reply-button">
                Reply to {{ $contact->full_name }}
            </a>
        </div>

        <div class="footer">
            <p><strong>AI Digital Agency</strong></p>
            <p>Lagos State, Nigeria</p>
            <p style="margin-top: 10px; color: #999;">
                This is an automated notification from your contact form.
            </p>
        </div>
    </div>
</body>
</html>