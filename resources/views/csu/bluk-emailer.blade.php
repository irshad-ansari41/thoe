<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Construction Updates | <?php date('f-j-Y') ?></title>
    </head>

    <body style="background:#e0e0e0; background-color:#e0e0e0;width:600px;margin:0 auto;" bgcolor="#e0e0e0">

        <table width="600" border="0" align="center" style="background:#f6f6f6; width:600px; background-color:#f6f6f6;" bgcolor="#f6f6f6" cellpadding="0" cellspacing="0">

            <tbody>
                <tr valign="top">
                    <td colspan="2">
                        <a target="_blank" href="https://azizidevelopments.com/en" style="text-decoration: none; color: #001F5B;font-family:Helvetica; font-size:12px;">
                            <img src="https://azizidevelopments.com/assets/images/constructions-updates-progress-bars/construction-mailer-v3-top.jpg" width="600"  height="428">
                        </a>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" style="padding:10px 15px;font-family: tahoma;font-size: 14px;">
                        <strong>
                            Dear <?=$CSUpdate['fullname']?>,
                        </strong>
                    </td>

                </tr>

                <tr>
                    <td colspan="2" style="padding:10px 15px;font-family: tahoma;font-size: 14px;">
                        <span> 
                            Thank you for choosing to make an Azizi Developments property your new home.
                        </span>
                    </td>

                </tr>

                <tr>
                    <td colspan="2" style="padding:10px 15px;font-family: tahoma;font-size: 14px;">
                        <span> 
                            We would like to inform you of our initiative to keep you updated on the construction progress of your property through monthly emails. We hope that this update reassures you of the swift progress that we are making and excites you as much as it does us.  
                        </span>
                    </td>

                </tr>



                <tr>
                    <td colspan="2" style="padding:10px 15px;font-family: tahoma;font-size: 14px;">
                        <span>Please see below the construction update for <?=$CSUpdate['BulidingName']; ?> in <?=$CSUpdate['location']; ?> .  </span>
                    </td>
                </tr>

                <tr>
                    <td style="padding:10px 10px;">
                        <img src="https://azizidevelopments.com/assets/images/properties/<?=$CSUpdate['gallery_location']; ?>/<?=$CSUpdate['bpgallery_location']; ?>/construction-update/<?=$CSUpdate['picture']; ?>" width="380" height="180">
                    </td>
                    <td style="padding:10px 10px;;text-align: center">
                        <img src="https://azizidevelopments.com/emailer/construction/img/<?=$CSUpdate['public_completion']; ?>.png" alt="" width="160" height="160"><br/>
                        <span style="font-family: tahoma;font-size: 14px;">Ovarall</span>
                    </td>
                </tr>

                <!--tr>
                    <td colspan=2 style="padding:10px 20px;font-family: tahoma;font-size: 16px;">
                        <table style="margin:0 auto;text-align: center;" width="100%" border="0">
                            <tbody>
                                <tr>
                                    <td>
                                        <img src="https://azizidevelopments.com/emailer/construction/img/100.png" alt=""  width="125"><br/>
                                        <span style="font-family: tahoma;font-size: 14px;">Mobilization</span>
                                    </td>
                                    <td>
                                        <img src="https://azizidevelopments.com/emailer/construction/img/26.png" alt="" width="125"><br/>
                                        <span style="font-family: tahoma;font-size: 14px;">Structure</span>
                                    </td>
                                    <td>
                                        <img src="https://azizidevelopments.com/emailer/construction/img/0.png" alt="" width="125"><br/>
                                        <span style="font-family: tahoma;font-size: 14px;">MEP</span>
                                    </td>
                                    <td>
                                        <img src="https://azizidevelopments.com/emailer/construction/img/0.png" alt="" width="125"><br/>
                                        <span style="font-family: tahoma;font-size: 14px;">FInishes</span>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </td>

                </tr-->

                <tr>
                    <td colspan="2" style="padding:10px 15px;font-family: tahoma;font-size: 14px;">
                        <span> 
                            Azizi’s mission for 2019 is to become the most customer-centric real estate developer in the UAE. In line with our Year of Construction, we are handing over many properties this year and hope to become your developer of choice moving forward.                        </span>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" style="padding:10px 15px;font-family: tahoma;font-size: 14px;">
                        <span> 
                            If you have any suggestions on how we can improve our service, please don’t hesitate to contact us through any of the following channels. 
                        </span><br/><br/>
                        <span>Visit <a href=" https://azizidevelopments.com/en/contact">www.azizidevelopments.com</a></span><br/>
                        <span>Call <a href="tel:80029494">800-AZIZI </a> or <a href="tel:80022737">800-CARES</a></span><br/>
                        <span>Visit us at Suite No. 805 of the Conrad Hotel on Sheikh Zayed Road, Dubai, UAE </span><br/><br/><br/>
                    </td>

                </tr>


                <tr>
                    <td colspan="2" style="padding:10px 15px;font-family: tahoma;font-size: 14px;">
                        <strong>
                            Best regards,<br>
                            Azizi Developments
                        </strong><br><br>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="padding:10px 15px;font-family: tahoma;font-size: 14px;"></td>
                </tr>



                <tr valign="top">
                    <td colspan="2">
                        <img src="https://azizidevelopments.com/assets/images/constructions-updates-progress-bars/construction-mailer-v3_bottom.jpg" width="600" height="52">
                    </td>
                </tr>

            </tbody>
        </table>


    </body>

</html>






