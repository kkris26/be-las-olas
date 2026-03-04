<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Message from Website</title>
        <style>
            body {
                font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
                margin: 0px;
                padding: 0px;
                -webkit-font-smoothing: antialiased;
            }
            .wrapper {
                width: 100%;
                table-layout: fixed;
                padding: 40px 0;
            }
            .container {
                max-width: 600px;
                margin: 0 auto;
                background-color: #ffffff;
                border-radius: 8px;
                overflow: hidden;
                border: 1px solid #eeeeee !important;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            }
            .header {
                background-color: #0f4172; 
                padding: 30px;
                text-align: center;
            }
            .header h1 {
                color: #ffffff;
                margin: 0;
                font-size: 16px;
                letter-spacing: 2px;
                text-transform: uppercase;
            }
            .content {
                padding: 40px 50px;
            }
            .intro {
                font-size: 16px;
                color: #333333;
                line-height: 1.6;
                margin-bottom: 30px;
            }
            .info-table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px;
            }
            .info-table td {
                padding: 12px 0;
                border-bottom: 1px solid #eeeeee;
            }
            .label {
                font-weight: 600;
                color: #000000;
                font-size: 12px;
                text-transform: uppercase;
                letter-spacing: 1px;
                width: 120px;
            }
            .value {
                color: #1a1a1a;
                font-size: 15px;
            }
            .message-title {
                font-size: 12px;
                font-weight: 600;
                color: #000000;
                text-transform: uppercase;
                letter-spacing: 1px;
                margin-bottom: 15px;
            }
            .message-text {
                font-size: 15px;
                color: #333333;
                line-height: 1.8;
            }
            .footer {
                text-align: center;
                padding: 10px 0 30px 0;
                font-size: 12px;
                color: #aaaaaa;
            }
            .footer p {
                margin: 5px 0;
            }
            @media only screen and (max-width: 600px) {
                .container {
                    width: 100% !important;
                    margin: 0 auto !important;
                    border-radius: 6px !important;
                }
                .header {
                    padding: 20px 15px !important;
                }
                .header h1 {
                    font-size: 14px !important;
                    letter-spacing: 1px !important;
                }
                .content {
                    padding: 25px 20px !important;
                }
                .intro {
                    font-size: 15px !important;
                    margin-bottom: 20px !important;
                }
                .info-table td {
                    display: block !important;
                    width: 100% !important;
                    border-bottom: none !important;
                    padding: 5px 0 !important;
                }
                .label {
                    width: 100% !important;
                    margin-bottom: 2px !important;
                }
                .value {
                    margin-bottom: 12px !important;
                    font-weight: 500 !important;
                }
                .info-table tr {
                    display: block !important;
                    margin-bottom: 10px !important;
                    border-bottom: 1px solid #eeeeee !important;
                }
                .info-table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-bottom: 12px;
                }
                .message-title {
                    margin-top: 10px !important;
                }
                .footer {
                padding: 10px 0 15px 0;
                font-size: 10px;
            }
            }
        </style>
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
                        <div class="message-title">Message</div>
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
