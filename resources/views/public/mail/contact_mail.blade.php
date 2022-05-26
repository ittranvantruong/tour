<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        @media screen and (max-width: 660px) {

            table[class="email-wrapper"],
            table[class="t-n-c-wrapper"] {
                width: 600px !important;
            }
        }

        @media screen and (max-width: 440px) {

            table[class="email-wrapper"],
            table[class="t-n-c-wrapper"] {
                width: 300px !important;
            }

            .user-pic,
            .user-data {
                width: 100% !important;
            }
        }
        a{
            color: #fff;
        }

    </style>
</head>

<body style="margin:0;padding:0">
    <table align="center" class="main-wrapper" width="100%" cellpadding="0" cellspacing="0" border="0"
        bgcolor="#ffffff">
        <tr>
            <td>
                <table class="email-wrapper" width="500" cellpadding="10" cellspacing="0" border="0" bgcolor="#f1b614"
                    align="center">
                    <tr>
                        <td>
                            <table class="porfolio-wrapper" width="100%" cellpadding="0" cellspacing="0" border="0"
                                bgcolor="#eeeeee" align="center">
                                <tr>
                                    <td bgcolor="#f1b614">
                                        <table class="user-pic" cellpadding="10" cellspacing="0" border="0"
                                            width="100%" align="left" bgcolor="#fff">
                                            <tr>
                                                <td>
                                                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                        <tr>
                                                            <td align="center" style="text-align: center;">
                                                                <img src="{{ asset($data->tour->avatar) }}" alt="img"
                                                                    height="100%" width="100%">
                                                                <p
                                                                    style="font-family:arial; color: #037eb7;font-size: 16px;font-weight: 600; margin:0;padding-top:5px;">
                                                                    {{ $data->tour->title }}</p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                        <table class="user-data" cellpadding="10" cellspacing="0" border="0"
                                            width="100%" align="left">
                                            <tr>
                                                <td>
                                                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                                        <tr>
                                                            <td style="padding-top:8px;padding-right:0;padding-bottom:8px;padding-left: 0;"
                                                                width="25px">
                                                                <img style="vertical-align: middle;"
                                                                    src="https://cdn-icons-png.flaticon.com/512/1759/1759311.png"
                                                                    alt="" height="20px" width="20px">
                                                            </td>
                                                            <td
                                                                style="font-family:arial; color: #fff; font-size:14px;padding-top:8px;padding-right:0;padding-bottom:8px;padding-left: 8px;">
                                                                {{ $data->form_data->fullname }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding-top:8px;padding-right:0;padding-bottom:8px;padding-left:0;"
                                                                width="25px">
                                                                <img style="vertical-align: middle;"
                                                                    src="https://cdn-icons-png.flaticon.com/512/3652/3652191.png"
                                                                    alt="" height="20px" width="20px">
                                                            </td>
                                                            <td
                                                                style="font-family:arial; color: #fff; font-size:14px;padding-top:8px;padding-right:0;padding-bottom:8px;padding-left: 8px;">
                                                                {{ date('d/m/Y', strtotime($data->form_data->birthday)) }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding-top:8px;padding-right:0;padding-bottom:8px;padding-left:0;"
                                                                width="25px">
                                                                <img style="vertical-align: middle;"
                                                                    src="https://i.imgur.com/VCc719a.png" alt=""
                                                                    height="20px" width="20px">
                                                            </td>
                                                            <td
                                                                style="font-family:arial; color: #fff; font-size:14px;padding-top:8px;padding-right:0;padding-bottom:8px;padding-left: 8px;">
                                                                {{ $data->form_data->phone }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding-top:8px;padding-right:0;padding-bottom:8px;padding-left: 0"
                                                                width="25px">
                                                                <img style="vertical-align: middle;"
                                                                    src="https://cdn-icons-png.flaticon.com/512/552/552486.png"
                                                                    alt="" height="20px" width="20px">
                                                            </td>
                                                            <td
                                                                style="font-family:arial; color: #fff; font-size:14px;padding-top:8px;padding-right:0;padding-bottom:8px;padding-left: 8px;">
                                                                {{ $data->form_data->email }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding-top:8px;padding-right:0;padding-bottom:8px;padding-left: 0;"
                                                                width="25px">
                                                                <img style="vertical-align: middle;"
                                                                    src="https://i.imgur.com/hlyZYvp.png" alt=""
                                                                    height="20px" width="20px">
                                                            </td>
                                                            <td
                                                                style="font-family:arial; color: #fff; font-size:14px;padding-top:8px;padding-right:0;padding-bottom:8px;padding-left: 8px;">
                                                                {{ $data->form_data->amount_customer }} khách</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <table class="t-n-c-wrapper" width="500" cellpadding="10" cellspacing="0" border="0"
                                bgcolor="#fde2e2" align="center"
                                style=" color: #9d4c4c;font-family: arial; color: #000; font-size: 13px;">
                                <tr>
                                    <td>
                                        <span><b>Nội dung: </b>{{ $data->form_data->content }}</span>
                                    </td>
                                </tr>
                            </table>
                            <table class="social-links" width="100%" cellpadding="0" cellspacing="0" border="0"
                                bgcolor="#fff6f6" align="center">
                                <tr>
                                    <td style="padding-top:10px;padding-bottom:10px;" align="center">
                                        <table style="width:300px;" width="300px" cellpadding="0" cellspacing="0"
                                            border="0" align="center">
                                            <tr>
                                                <td style="text-align: center; padding: 10px">
                                                    <a href="#">
                                                        <img height="50px" width="50px"
                                                            src="{{ asset('public/images/zalo.png') }}"
                                                            alt="Zalo">
                                                    </a>
                                                </td>
                                                <td style="text-align: center;  padding: 10px">
                                                    <a href="#">
                                                        <img height="50px" width="50px"
                                                        src="{{ asset('public/images/messenger.png') }}"
                                                        alt="Messenger">
                                                    </a>
                                                </td>
                                                <td style="text-align: center;  padding: 10px">
                                                    <a href="#">
                                                        <img height="50px" width="50px"
                                                        src="{{ asset('public/images/youtube.png') }}"
                                                        alt="youtube">
                                                    </a>
                                                </td>
                                                <td style="text-align: center;  padding: 10px">
                                                    <a href="#">
                                                        <img height="50px" width="50px"
                                                        src="{{ asset('public/images/facebook.png') }}"
                                                        alt="facebook">
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <table class="buttons" width="100%" cellpadding="0" cellspacing="0" border="0"
                                align="center">
                                <tr>
                                    <td align="center">
                                        <table width="49%" cellpadding="8" cellspacing="0" border="0" align="left"
                                            bgcolor="#c40000">
                                            <tr>
                                                <td align="center">
                                                    <a class="first" href="#"
                                                        style="font-family:arial;text-decoration: none;color: #fff;width:100%; font-size: 15px;">
                                                        Truy cập Website</a>
                                                </td>
                                            </tr>
                                        </table>
                                        <table width="49%" cellpadding="8" cellspacing="0" border="0" align="right"
                                            bgcolor="#0270ad">
                                            <tr>
                                                <td align="center">
                                                    <a class="second" href="#"
                                                        style="font-family:arial;text-decoration: none;color: #fff;width:100%; font-size: 15px;">
                                                        Gọi liên hệ</a>
                                                </td>
                                            </tr>
                                        </table>

                                    </td>

                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table class="t-n-c-wrapper" width="500" cellpadding="10" cellspacing="0" border="0" bgcolor="#fde2e2"
                    align="center" style="font-family: arial; color: #000; font-size: 13px;">
                    <tr>
                        <td>
                            Chúng tôi sẽ liên hệ với bạn sớm, xin cảm ơn
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
