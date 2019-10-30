<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Thank you Emailer | Azizi Developments</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <style>
            html, body { width: 100%; font-family:Baskerville, "Palatino Linotype", Palatino, "Century Schoolbook L", "Times New Roman", "serif";  -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; padding: 0;  }
            h1, h2, h3, h4, h5 { font-family:Baskerville, "Palatino Linotype", Palatino, "Century Schoolbook L", "Times New Roman", "serif"; }
            h1, h2, h3, h4, h5,p{margin:0; padding: 0;}
            a{ text-decoration: none!important; color: #808285!important; }
            span a{ text-decoration: none !important; color: #808285!important;}
            a span{text-decoration: none !important; color: #808285!important;}
            p{margin:0; padding:0;}
            img{ margin: 0 auto;}
            .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{ padding: 0px; border-top:0;}
        </style>
    </head>
    <body style="background:#e0e0e0; background-color:#e0e0e0; margin:0 auto;" bgcolor="#e0e0e0">

        <div class="container">
            <div class="row">
                <div class="col">

                    <table class="table" align="center" style="background:#fff; background-color:#fff; border-spacing: 0px;" bgcolor="#fff">
                        <!--thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead-->
                        <tbody>
                            <tr valign="top">
                                <?php if ($CSUpdate['headerImage'] == 'https://azizidevelopments.com/emailer/thankyou/generic-image.jpg'): ?>
                                    <td colspan="3" style="text-align: center">
                                        <img src="<?= $CSUpdate['headerImage'] ?>" class="img-responsive" />
                                    </td>
                                <?php else: ?>
                                    <td colspan="3" style="text-align: center">
                                        <img src="<?= $CSUpdate['headerImage'] ?>" class="img-responsive" alt="<?= $CSUpdate['details']['title_en']; ?>" />
                                    </td>
                                <?php endif; ?>
                            </tr>
                            <!--Banner Image Section End -->
                            <tr>
                                <td valign="top" width="10%" style="padding: 0px 0px; vertical-align: top; text-align: left;">
                                    <img style="vertical-align:top; border: 0px; padding:0; display:block; line-height: 0;" src="https://azizidevelopments.com/emailer/thankyou/right_line.png" class="img-responsive"  />
                                </td>
                                <!--image top Section End -->

                                <td valign="top">
                                    <table class="table">

                                        <tr>
                                            <td valign="top" style="text-align: center; padding-top:14px;">
                                                <span style="font-family: 'times new roman', times; font-size: 13px; color: #808285; line-height: 20px; letter-spacing: 0.6px;">Dear <?= $CSUpdate['Name'] ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td valign="top" style="text-align: center; padding-top:7px;">
                                                <span style="font-family: 'times new roman', times; font-size: 13px;"> <span style="font-family: 'times new roman', times; color: #808285; font-size: 13px; letter-spacing: 0.6px; line-height: 20px;">Thank you for registering your interest.</span> </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td valign="top" style="text-align: center; padding-top:7px;">
                                                <span style="font-family: 'times new roman', times; font-size: 13px;"> <span style="font-family: 'times new roman', times; color: #808285; font-size: 13px; line-height: 20px; letter-spacing: 0.6px;">One of our sales representatives will be in</span> </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td valign="top" style="text-align: center; padding-top:7px;">
                                                <span style="font-family: 'times new roman', times; font-size: 13px; color: #808285 !important;"> <span style="font-family: 'times new roman', times; color: #808285 !important; font-size: 13px; line-height: 20px;letter-spacing: 0.6px;">touch with you shortly.</span></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center; padding-top: 28px;">
                                                <img src="https://azizidevelopments.com/emailer/thankyou/line.png" alt="line" width="40" height="8" /> 
                                            </td>
                                        </tr>
                                        <?php if (!empty($CSUpdate['details'])): ?>
                                            <tr>
                                                <td colspan="3" style=" padding:  10px 0px"></td>
                                            </tr>
                                            <tr>
                                                <td align="center" valign="top">
                                                    <table class="table" width="100%" border="0" cellspacing="0" align="center" cellpadding="0" bgcolor="#fff" >
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <a href="<?= $CSUpdate['brochuresdownloadlink'] ?>?utm_source=Email&utm_medium=Organic&utm_campaign=Thankyou%20Emailer&utm_content=EN_lead_Gen&utm_term=Offplan" target="_blank">
                                                                        <img class="img-responsive" style="font-family: 'times new roman', times;; font-size: 10px; color: #4d4d4f; text-transform: uppercase; line-height: 20px; letter-spacing: 1px; text-align: center; display: block;" src="https://azizidevelopments.com/emailer/thankyou/brs4.png" alt="Download Brochure">
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    <a href="<?= $CSUpdate['floorplandownloadlink'] ?>?utm_source=Email&utm_medium=Organic&utm_campaign=Thankyou%20Emailer&utm_content=EN_lead_Gen&utm_term=Offplan" target="_blank">
                                                                        <img class="img-responsive" style="font-family: 'times new roman', times;; font-size: 10px; color: #4d4d4f; text-transform: uppercase; line-height: 20px; letter-spacing: 1px; text-align: center; display: block;" src="https://azizidevelopments.com/emailer/thankyou/fps4.png" alt="Download Floor Plans">
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    <a href="<?= $CSUpdate['websiteurl'] ?>?utm_source=Email&utm_medium=Organic&utm_campaign=Thank%20you%20Email%202019&utm_content=EN_lead_Gen&utm_term=Offplan" target="_blank">
                                                                        <img class="img-responsive"  style="font-family: 'times new roman', times;; font-size: 10px; color: #4d4d4f; text-transform: uppercase; line-height: 20px; letter-spacing: 1px; text-align: center; display: block;" src="https://azizidevelopments.com/emailer/thankyou/wbs4.png" alt="Explore More About <?= $CSUpdate['details']['title_en']; ?>">
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3" style=" padding:  3px 0px"></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="text-align: center; ">
                                                                    <span style="font-family: 'times new roman', times; font-size: 13px;"><span style="font-family: 'times new roman', times; color: #808285; text-align: center; font-size: 13px; line-height: 20px;letter-spacing: 0.6px;">Brochure</span></span>
                                                                </td>
                                                                <td style="text-align: center; ">
                                                                    <span style="font-family: 'times new roman', times; font-size: 13px;"><span style="font-family: 'times new roman', times; color: #808285; text-align: center; font-size: 13px; line-height: 20px;letter-spacing: 0.6px;">Floor plan</span></span>
                                                                </td>
                                                                <td style="text-align: center;">
                                                                    <span style="font-family: 'times new roman', times; font-size: 13px;"><span style="font-family: 'times new roman', times; color: #808285; text-align: center; font-size: 13px; line-height: 20px;letter-spacing: 0.6px;">Project page</span></span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                        <tr valign="top">
                                            <td colspan="2" style="padding: 0px 0px; text-align: center; ">
                                                <a style="text-decoration: none; color: #fff;" href="https://azizidevelopments.com/en/dubai/?utm_source=Email&utm_medium=Organic&utm_campaign=Thank%20you%20Email%202019&utm_content=EN_lead_Gen&utm_term=Offplan" target="_blank">
                                                    <img src="https://azizidevelopments.com/emailer/thankyou/explore-bts.png" style="vertical-align: top" alt="Register Here" class="img-responsive"/>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" align="center" style="padding-top: 14px;">
                                                <span style="font-family: 'times new roman', times; font-size: 13px;">
                                                    <span style="font-family: 'times new roman', times; color: #808285; font-size: 13px; line-height: 25px;letter-spacing: 0.6px;">
                                                        You can also visit us at: 
                                                        <br/> Azizi Sales Centre, Conrad Hotel: Office 1302, 
                                                        <br/> 13th Floor Conrad Sales Office Tower, 
                                                        <br/> Sheikh Zayed Road.<br/>
                                                        <span style="font-family: 'times new roman', times; font-size: 13px; color:#808285 !important;">
                                                            <a style="text-decoration:none !important; color:#808285 !important;" >
                                                                <span style="text-decoration:none; font-family:'times new roman', times; color:#808285 !important; font-size:13px; letter-spacing: 0.6px;">
                                                                    Saturday - Thursday 9 AM - 6 PM
                                                                </span>
                                                            </a>
                                                        </span>
                                                    </span>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr valign="top">
                                            <td colspan="2" style="padding-top: 14px; text-align: center; ">
                                                <a style="text-decoration: none; color: #fff;" href="https://www.google.com/maps/place/Azizi+developments+-+Sales+Office/@25.2252897,55.2814847,17z/data=!3m1!4b1!4m5!3m4!1s0x3e5f6bb818788ba1:0x62a479770c27e4ab!8m2!3d25.2252897!4d55.2836734/?utm_source=Email&utm_medium=Organic&utm_campaign=Thankyou%20Emailer&utm_content=EN_lead_Gen&utm_term=Offplan" target="_blank">
                                                    <img src="https://azizidevelopments.com/emailer/thankyou/Click-location.png" style="vertical-align: top" alt="Register Here" class="img-responsive" />
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td valign="top" style="text-align: center; padding-top: 14px;">
                                                <span style="font-family: 'times new roman', times; font-size: 13px;"><span style="font-family: 'times new roman', times; color: #808285; font-size: 13px; line-height: 20px;letter-spacing: 0.6px;">For more information, please call us at</span></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td valign="top" style="text-align: center; ">
                                                <span style="font-family: 'times new roman', times; font-size: 13px;"><a href="tel:80029494" style="text-decoration:none; color:#808285;" ><span style="text-decoration:none; font-family:'times new roman', times; color:inherit; font-size:13px; line-height:21px;letter-spacing: 0.6px;">800-29494</span></a></span>
                                            </td>
                                        </tr>
                                        <tr valign="top" style="">
                                            <td valign="top" style="text-align: center; padding-top:14px;">
                                                <span style="font-family: 'times new roman', times; font-size: 13px;"><span style="font-family: 'times new roman', times; color: #808285; font-size: 13px; line-height: 20px;letter-spacing: 0.6px;">Follow on</span></span>
                                            </td>
                                        </tr>
                                        <tr valign="top">
                                            <td style="text-align: center;padding-left:  65px; padding-right:  65px;">
                                                <table class="table" align="center" style="background:#fff; background-color:#fff; margin:0 auto; color:#fff;" bgcolor="#fff" border="0">
                                                    <tr valign="center">
                                                        <th align="center" width="90">
                                                            <a href="https://www.instagram.com/azizigroup/?hl=en?utm_source=Email&utm_medium=Organic&utm_campaign=Thankyou%20Emailer&utm_content=EN_lead_Gen&utm_term=Offplan" target="_blank" style="text-decoration:none;  color: #fff;">
                                                                <img src="https://azizidevelopments.com/emailer/thankyou/insta-logo.png" width="20" height="20">
                                                            </a>
                                                        </th>
                                                        <th align="center" width="90">
                                                            <a style="text-decoration:none;  color: #fff;" href="https://www.facebook.com/AziziGroup/?utm_source=Email&utm_medium=Organic&utm_campaign=Thankyou%20Emailer&utm_content=EN_lead_Gen&utm_term=Offplan" target="_blank" >
                                                                <img src="https://azizidevelopments.com/emailer/thankyou/facebook-logo.png" width="20" height="20">
                                                            </a>
                                                        </th>
                                                        <th align="center" width="90">
                                                            <a style="text-decoration:none;  color: #fff;" href="https://www.linkedin.com/company/azizi-developments/?utm_source=Email&utm_medium=Organic&utm_campaign=Thankyou%20Emailer&utm_content=EN_lead_Gen&utm_term=Offplan" target="_blank" >
                                                                <img src="https://azizidevelopments.com/emailer/thankyou/linkedin-logo.png" width="20" height="20">
                                                            </a>
                                                        </th>
                                                        <th align="center" width="90">
                                                            <a style="text-decoration:none;  color: #fff;" href="https://twitter.com/azizigroup?lang=en&utm_source=Email&utm_medium=Organic&utm_campaign=Thankyou%20Emailer&utm_content=EN_lead_Gen&utm_term=Offplan" target="_blank" >
                                                                <img src="https://azizidevelopments.com/emailer/thankyou/twit-logo.png" width="20" height="20">
                                                            </a>
                                                        </th>
                                                        <th align="center" width="90">
                                                            <a style="text-decoration:none;  color: #fff;" href="https://www.youtube.com/channel/UCmUtuRMwJxaovjGBNSXx-Jw?utm_source=Email&utm_medium=Organic&utm_campaign=Thankyou%20Emailer&utm_content=EN_lead_Gen&utm_term=Offplan" target="_blank" >
                                                                <img src="https://azizidevelopments.com/emailer/thankyou/youtube-logo.png" width="20" height="20">
                                                            </a>
                                                        </th>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td valign="top" style="text-align: center; padding-top: 28px;">
                                                <span style="font-family: 'times new roman', times; font-size: 14px;"> <span style="font-family: 'times new roman', times; color: #808285; font-size: 14px; line-height: 20px;letter-spacing: 0.6px;">Best regards,</span></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td valign="top" style="text-align: center; padding-top: 10px; padding-bottom: 10px;">
                                                <a style="text-decoration: none; color: #fff;" href="https://azizidevelopments.com?utm_source=Email&utm_medium=Organic&utm_campaign=Thank%20you%20Emailer&utm_content=EN_lead_Gen&utm_term=Offplan" target="_blank">
                                                    <img src="https://azizidevelopments.com/emailer/thankyou/footer.png" alt="line" width="90" height="26" style=" vertical-align: center;" />
                                                </a>	  
                                            </td>
                                        </tr>
                                        <tr>
                                            <td valign="top" style=" text-align: center; ">
                                                <a style="text-decoration: none; color: #fff;" href="https://azizidevelopments.com?utm_source=Email&utm_medium=Organic&utm_campaign=Thank%20you%20Emailer&utm_content=EN_lead_Gen&utm_term=Offplan" target="_blank">
                                                    <img src="https://azizidevelopments.com/emailer/thankyou/azizidevelopments.png" style="padding: 0;" width="145" height="15" alt="azizidevelopments.com"/>
                                                </a>
                                            </td>
                                        </tr>
                                            
                                    </table>
                                </td>
                                <!-- Body Section End -->

                                <td valign="bottom" width="10%" style="padding:0px 0px; vertical-align:bottom; text-align:right;">
                                    <img style="border:0; line-height:0; display:block; padding:0; vertical-align:bottom; border: 0px;" src="https://azizidevelopments.com/emailer/thankyou/left_line.png" class="img-responsive" />
                                </td>
                                <!--Image Bottom Section End -->
                            </tr>

                        </tbody>
                    </table>                     

                </div>


            </div>
        </div>

    </body>
</html>