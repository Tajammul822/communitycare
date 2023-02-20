<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="x-apple-disable-message-reformatting" />
    <title>Welcome Email</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <style type="text/css">
        @media only screen and (max-width: 616px) {
            table.outer {
                width: 100% !important;
            }

            img.bnr-img {
                width: 100% !important;
            }

            table.inner {
                padding: 0 30px;
            }
        }

        @media only screen and (max-width: 516px) {
            table.inner {
                width: 100% !important;
                padding: 0 15px;
            }
        }
    </style>
</head>

<body style="margin: 0; padding: 0;">
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td>
                <table class="outer" align="center" width="600" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td align="center" style="padding: 27px 0 22px; background: #0377B8;">
                            <a target="_blank" href="{{ url('/') }}"><img width="200px" src="{{ url('theme/media/logos/logo-5.svg')}}" alt="" title=""></a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table class="outer" align="center" width="600" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="padding:30px 0;">
                            <table class="inner" align="center" width="500" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="font-size:14px; line-height:1.4; font-weight: 700; font-family: 'Open Sans', Roboto, Arial; color: #626262; padding-bottom: 15px;">
                                        Dear {{$data['name']}},
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size:14px; line-height:1.6; font-weight: 400; font-family: 'Open Sans', Roboto, Arial; color: #626262; padding-bottom: 20px;">
                                        This Assesment Form is shared with you by {{$data['sender_name'] }}. You can see it by clicking the flowing link.
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size:14px; line-height:1.6; font-weight: 400; font-family: 'Open Sans', Roboto, Arial; color: #626262; padding-bottom: 10px;">
                                        Link: <b><a href="{{$data['form_link']}}">{{$data['form_link']}}</a></b>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size:14px; line-height:1.6; font-weight: 400; font-family: 'Open Sans', Roboto, Arial; color: #626262; padding-bottom: 30px;">
                                        Sender Name: <b>{{$data['sender_name']}}</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size:14px; line-height:1.6; font-weight: 400; font-family: 'Open Sans', Roboto, Arial; color: #626262; padding-bottom: 10px;">
                                        Sender Email: <b>{{$data['sender_email']}}</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size:14px; line-height:1.6; font-weight: 400; font-family: 'Open Sans', Roboto, Arial; color: #626262;">
                                        Sincerely,
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size:14px; line-height:1.6; font-weight: 400; font-family: 'Open Sans', Roboto, Arial; color: #626262;">
                                        <b>Community Healthcare Team</b>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table class="outer" align="center" width="600" border="0" cellpadding="0" cellspacing="0" bgcolor="#ECECF2">
                    <tr>
                        <td style="padding: 30px 0;">
                            <table class="inner" align="center" width="500" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="font-size:14px; font-style: italic; line-height:1.6; font-weight: 400; font-family: 'Open Sans', Roboto, Arial; color: #A8A8A8; text-align: center;">
                                        All written information and materials disclosed or provided
                                        by AFM to the users is confidential information regardless
                                        of whether it was provided before or after the date of joining the network.
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table class="outer" align="center" width="600" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="padding: 13px 0; background: #99C93D;">
                            <table class="inner" align="center" width="500" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="font-size:14px; line-height:1.6; font-weight: 400; font-family: 'Open Sans', Roboto, Arial; color: #FFFFFF; text-align: center;">
                                        Copyright © 2023 Community Healthcare.
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>