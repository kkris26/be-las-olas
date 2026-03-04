<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Message from Website</title>
    </head>
    <body>
        <div class="wrapper">
            <div class="container">
                <div class="header">
                              <img
                        src="https://res.cloudinary.com/ddl6ef7ib/image/upload/v1772627179/logo-loi-new_fda0ka.png"
                        alt="{{ config('app.name') }} Logo"
                        width="50"
                        style="display: block; margin: 0 auto 10px"
                    />
          
                    <h1>{{ config('app.name') }}</h1>
                </div>
                <div class="content">
                    <p class="intro">
                        You have received a new message from the website contact
                        form. Here are the details:
                    </p>

                    <table class="info-table">
                        <tr>
                            <td class="label">Date</td>
                            <td class="value">{{ now()->format('d M Y, h:i A') }}</td>
                        </tr>
                        <tr>
                            <td class="label">Sender</td>
                            <td class="value">{{ $data['name'] ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td class="label">Email</td>
                            <td class="value">
                                <a
                                    href="mailto:{{ $data['email'] ?? '' }}"
                                    style="
                                        color: #000;
                                        text-decoration: none;
                                        border-bottom: 1px solid #ccc;
                                    "
                                    >{{ $data['email'] ?? 'N/A' }}</a
                                >
                            </td>
                        </tr>
                        <tr>
                            <td class="label">Subject</td>
                            <td class="value">{{ $data['subject'] ?? 'Inquiry via Website' }}</td>
                        </tr>
                    </table>

                    <div>
                        <div class="message-title">Message Content</div>
                        <div class="message-text">
                            {!! nl2br(e($data['message'] ?? '')) !!}
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
                    <p>This is an automated notification from your website's contact form.</p>
                </div>
            </div>
        </div>
    </body>
</html>
