<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
</head>

<body style="background:#f4f6f9; padding:40px; margin:0;">

    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">

                <table width="600"
                       cellpadding="0"
                       cellspacing="0"
                       style="
                           background:#ffffff;
                           border-radius:15px;
                           padding:35px;
                           font-family:Arial,sans-serif;
                           box-shadow:0 5px 15px rgba(0,0,0,0.1);
                       ">

                    <!-- HEADER -->
                    <tr>
                        <td align="center">

                            <img
                                src="{{ $message->embed(public_path('images/logo.png')) }}"
                                width="90"
                                alt="Logo">

                            <h2 style="color:#0d6efd;">
                                Lintang Sport Recovery
                            </h2>

                        </td>
                    </tr>

                    <!-- CONTENT -->
                    <tr>
                        <td>

                            <p>
                                Halo <b>{{ $user->name }}</b> 👋
                            </p>

                            <p>
                                Kami menerima permintaan untuk mengatur ulang
                                password akun Anda.
                            </p>

                            <p>
                                Klik tombol berikut untuk membuat password baru:
                            </p>

                            <!-- TOMBOL RESET -->
                            <p align="center">

                                <a href="{{ $url }}"
                                   style="
                                       display:inline-block;
                                       background:#0d6efd;
                                       color:#ffffff;
                                       text-decoration:none;
                                       padding:14px 30px;
                                       border-radius:8px;
                                       font-weight:bold;
                                       font-size:16px;
                                   ">
                                    RESET PASSWORD
                                </a>

                            </p>

                            <p style="
                                font-size:12px;
                                color:#777;
                                word-break:break-all;
                            ">
                                Jika tombol di atas tidak dapat diklik,
                                silakan buka link berikut:
                            </p>

                            <p style="
                                font-size:12px;
                                word-break:break-all;
                            ">
                                <a href="{{ $url }}">
                                    {{ $url }}
                                </a>
                            </p>

                            <p>
                                Link ini berlaku selama
                                <b>60 menit</b>.
                            </p>

                            <p>
                                Jika Anda tidak meminta reset password,
                                silakan abaikan email ini.
                            </p>

                            <hr>

                            <p align="center">
                                © {{ date('Y') }}
                                <br>
                                <b>Lintang Sport Recovery</b>
                            </p>

                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>
</html>