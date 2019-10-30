<!DOCTYPE>
<html>
    <head>
        <META HTTP-EQUIV='Content-Type' CONTENT='text/html; charset=UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>Azizi Developments Emailer</title>
        <style>
            html, body { width: 100%; font-family: helvetica, "helvetica neue", arial, verdana, sans-serif; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
            h1, h2, h3, h4, h5 { font-family: helvetica, "helvetica neue", arial, verdana, sans-serif; }
            h1, h2, h3, h4, h5,p{margin:0}
            a{ text-decoration: none; }
            p{margin:0}
        </style>
    </head>
    <body style="background:#ece6e6; background-color:#ece6e6; width:605px; margin:0px auto;" bgcolor="#ece6e6">
    <center>
        <table align="center" width="605" style="background:#d9d5d5; background-color:#d9d5d5;" bgcolor="#d9d5d5">
            <tr>
                <td>

                    <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" style="background:#fff; background-color:#fff;" bgcolor="#ece6e6">
                        <tbody>
                            <tr valign="top">
                                <td style="background:#1b619a;padding:15px;text-align: center">
                                    <a href='http://www.veggiebuzz.com' rel='home'><img src='<?=SITE_URL?>/assets/images/logo/1512057079483688018.png' style='width: 125px;height: 32px;' alt='Azizi Developments' /></a>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding:15px;">
                                    <br/>
                                    @yield('content') 
                                    <br/>
                                </td>
                            </tr>
                            <tr>
                                <td style="background:#ededed;padding:15px;text-align:center">
                                    <p style='color: #666; '><br/><small style='font-size:12px'>
                                            <a style='color:#666' href='https://www.azizidevelopments.com'> Azizi Developments</a> | 
                                            <a style='color:#666' href='tel:+97143596673'>Tel: +971 4 359 6673</a> | 
                                            <a style='color:#666' href='mailto:info@azizidevelopments.com'>info@azizidevelopments.com</a>
                                            <br/> Copyright &copy; <?= date('Y') ?> Azizi Developments, All rights reserved.</small></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </table>
    </center>
</body>
</html>
