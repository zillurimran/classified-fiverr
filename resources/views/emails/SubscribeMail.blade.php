<!DOCTYPE html>
<html lang="en" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta charset="utf-8">
    <meta name="x-apple-disable-message-reformatting">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no, date=no, address=no, email=no">
    <!--[if mso]>
    <xml><o:officedocumentsettings><o:pixelsperinch>96</o:pixelsperinch></o:officedocumentsettings></xml>
  <![endif]-->
    <title>Subscribe Classified</title>
    <link
        href="https://fonts.googleapis.com/css?family=Montserrat:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700"
        rel="stylesheet" media="screen">
    <style>
        @media (max-width: 600px) {
            .sm-w-full {
                width: 100% !important;
            }

            .sm-px-24 {
                padding-left: 24px !important;
                padding-right: 24px !important;
            }

            .sm-py-32 {
                padding-top: 32px !important;
                padding-bottom: 32px !important;
            }

            .sm-leading-32 {
                line-height: 32px !important;
            }
        }
    </style>
</head>

<body style="margin: 0; width: 100%; padding: 0; word-break: break-word; -webkit-font-smoothing: antialiased;">
    <div style="font-family: 'Montserrat', sans-serif; mso-line-height-rule: exactly; display: none;">Thanks To Subscibe Us !!</div>
    <div role="article" aria-roledescription="email" aria-label="Verify Email Address" lang="en" style="font-family: 'Montserrat', sans-serif; mso-line-height-rule: exactly;">
        <table style="word-break: break-word; width: 100%; font-family: Montserrat, -apple-system, 'Segoe UI', sans-serif;" cellpadding="0" cellspacing="0" role="presentation">
            <tr>
                <td align="center" style="mso-line-height-rule: exactly; background-color: #eceff1; font-family: Montserrat, -apple-system, 'Segoe UI', sans-serif;">
                    <table class="sm-w-full" style="width: 600px;" cellpadding="0" cellspacing="0" role="presentation">
                        <tr>
                            <td class="sm-py-32 sm-px-24" style="mso-line-height-rule: exactly; padding: 48px; text-align: center; font-family: Montserrat, -apple-system, 'Segoe UI', sans-serif;">
                                <a href="{{config('app.php')}}" style="font-family: 'Montserrat', sans-serif; mso-line-height-rule: exactly;">
                                    <img src="{{asset('uploads/generalSettings')}}/{{generalSettings()->logo}}" width="155" alt="Pinlist Logo" style="max-width: 100%; vertical-align: middle; line-height: 100%; border: 0;">
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td align="center" class="sm-px-24" style="font-family: 'Montserrat', sans-serif; mso-line-height-rule: exactly;">
                                <table style="width: 100%;" cellpadding="0" cellspacing="0" role="presentation">
                                    <tr>
                                        <td class="sm-px-24" style="mso-line-height-rule: exactly; border-radius: 4px; padding: 48px; text-align: left; font-family: Montserrat, -apple-system, 'Segoe UI', sans-serif; font-size: 16px; line-height: 24px; color: #626262;">
                                            <p style="font-family: 'Montserrat', sans-serif; mso-line-height-rule: exactly; margin-bottom: 0; font-size: 20px; font-weight: 600;">Hi,
                                                {{-- <p style="font-family: 'Montserrat', sans-serif; mso-line-height-rule: exactly; margin-top: 0; font-size: 20px; font-weight: 700; color: #812bb2;">{{ $user->f_name }}!</p> --}}
                                            </p>

                                            <p class="sm-leading-32" style="font-family: 'Montserrat', sans-serif; mso-line-height-rule: exactly; margin: 0; margin-bottom: 16px; font-size: 24px; font-weight: 600; color: #0d1943;">Thanks To Subscribe Classified</p>
                                                

                                            <p style="font-family: 'Montserrat', sans-serif; mso-line-height-rule: exactly; margin: 0; margin-bottom: 24px;">If you did not request a Subscribe request, please <a href="{{ url('/classified/unsubscribe/' . $mailData['email'] . '/' .  $mailData['token']) }}">Unsubscribe</a> this email.</p>

                                            {{-- <p style="font-family: 'Montserrat', sans-serif; mso-line-height-rule: exactly; margin: 0; margin-bottom: 24px;">If you did not request a Subscribe request, please <a href="{{ route('unsubscribe',['email' => $mailData['email'], 'token' => $mailData['token']]) }}">Unsubscribe</a> this email.</p> --}}
                                            
                                            <table style="width: 100%;" cellpadding="0" cellspacing="0" role="presentation">
                                                <tr>
                                                    <td style="font-family: 'Montserrat', sans-serif; mso-line-height-rule: exactly; padding-top: 32px; padding-bottom: 32px;">
                                                        <div style="font-family: 'Montserrat', sans-serif; mso-line-height-rule: exactly; height: 1px; background-color: #eceff1; line-height: 1px;"> &zwnj;</div>
                                                    </td>
                                                </tr>
                                            </table>
                                            <p style="font-family: 'Montserrat', sans-serif; mso-line-height-rule: exactly; margin: 0; margin-bottom: 16px;">Regards, <br>classified.</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-family: 'Montserrat', sans-serif; mso-line-height-rule: exactly; height: 20px;"></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
