<!DOCTYPE HTML>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="x-apple-disable-message-reformatting">
    <meta name="format-detection" content="date=no">
    <meta name="format-detection" content="telephone=no">
    <style type="text/CSS"></style>
    <style @import url('https://dopplerhealth.com/fonts/BasierCircle/basiercircle-regular-webfont.woff2');></style>
    <title></title>
    <style>
        table,
        td,
        div,
        h1,
        p {
            font-family: 'Basier Circle', 'Roboto', 'Helvetica', 'Arial', sans-serif;
        }

        @media screen and (max-width: 530px) {
            .unsub {
                display: block;
                padding: 8px;
                margin-top: 14px;
                border-radius: 6px;
                background-color: #FFEADA;
                text-decoration: none !important;
                font-weight: bold;
            }

            .button {
                min-height: 42px;
                line-height: 42px;
            }

            .col-lge {
                max-width: 100% !important;
            }
        }

        @media screen and (min-width: 531px) {
            .col-sml {
                max-width: 27% !important;
            }

            .col-lge {
                max-width: 73% !important;
            }
        }
    </style>
</head>

<body style="margin:0;padding:0;word-spacing:normal;background-color:#FDF8F4;">
    <div role="article" aria-roledescription="email" lang="en" style="text-size-adjust:100%;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;background-color:#FDF8F4;">
        <table role="presentation" style="width:100%;border:none;border-spacing:0;">
            <tr>
                <td align="center" style="padding:0;">
                    <table role="presentation" style="width:94%;max-width:600px;border:none;border-spacing:0;text-align:left;font-family:'Basier Circle', 'Roboto', 'Helvetica', 'Arial', sans-serif;font-size:1em;line-height:1.37em;color:#384049;">
                        <tr>
                            <td style="padding:40px 30px 30px 30px;text-align:center;font-size:1.5em;font-weight:bold;">
                                <a href="#" style="text-decoration:none;">
                                    <img src="{{ $chw_data['logo'] }}" width="2170" style="width:2170px;max-width:80%;height:auto;border:none;text-decoration:none;color:#ffffff">
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:30px;background-color:#ffffff;">
                                <h1 style="margin-top:0;margin-bottom:1.38em;font-size:1.953em;line-height:1.3;font-weight:bold;letter-spacing:-0.02em;">Welcome to Community Health Care</h1>
                                <p style="margin:0;">Hi, {{$chw_data['name']}}</p>
                                <p>Your account has been created on the Conmmunity Health Care.</p>
                                <p>Below are your system generated credentials:</p>
                                <p>Email: {{$chw_data['receiver_email']}}</p>
                                <p>Password: {{$chw_data['password']}}</p>
                                <p>Please click on this link to get logged in into the system.</p>
                                <p style="text-align: center;margin: 2.5em auto;">
                                    <a class="button" href="{{$chw_data['app_link']}}" style="background: #DE4D3B; text-decoration: none; padding: 1em 1.5em; color: #ffffff; 
                       border-radius: 48px;
                       mso-padding-alt:0;
                       text-underline-color:#ff3884">
                                        <span style="mso-text-raise:10pt;font-weight:bold;">Click Here!</span>
                                    </a>
                                </p>
                                <p>Thank you for your time and for using Community Health Care.</p>
                                <p>The Community Health Care Team</p>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:30px;text-align:center;font-size: 0.75em;background-color:#ffeada;color:#384049;border: 1em solid #fff;">
                                <p style="margin:0;font-size:.75rem;line-height:1.5em;text-align: center;">
                                    Community Health Care, 20222. All rights reserved.
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>