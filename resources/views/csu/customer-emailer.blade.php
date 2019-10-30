<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Construction Update - Azizi Developments</title>
        <style>
            html, body { width: 100%; font-family: arial, helvetica, sans-serif; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; padding: 0;  }
            h1, h2, h3, h4, h5 { font-family: arial, helvetica, sans-serif; }
            h1, h2, h3, h4, h5,p{margin:0; padding: 0;}
            a{ text-decoration: none; }
            p{margin:0; padding:0;}
        </style>
    </head>
    <body style="background:#fff; background-color:#fff; width:550px; margin:0px auto;" bgcolor="#fff">
    <center>
        <table align="center" style="background: #e8ecef; width: 550px;border-spacing: 0px;" bgcolor="#e8ecef">
            <tbody>
                <tr>
                    <td>
                        <table border="0" cellpadding="0" cellspacing="0" align="center" style="background: #fff; width: 550px;" bgcolor="#ece6e6">
                            <tbody>
                                <tr valign="top">
                                    <td style="padding: 0px 0px; text-align: center; ">
                                        <img alt="Azizi Developments" src="https://azizidevelopments.com/assets/72ppi/main.jpg" width="550" height="550" />
                                    </td>
                                </tr>

                                <tr valign="top">
                                    <td style="padding-left:  80px; padding-right:  80px;">
                                        <p style="font-family: arial, helvetica, sans-serif; color: #153151; font-size: 12px; text-align: center; line-height: 24px; margin: 0; padding-bottom: 3px;letter-spacing: 1px">
                                            <span style="font-family: arial, helvetica, sans-serif;"><strong>Dear <?= $CSUpdate['fullname'] ?>,</strong> </span>
                                        </p>
                                        <br />
                                        <p style="font-family: arial, helvetica, sans-serif; color: #153151; font-size: 11px; text-align: center; line-height: 24px; margin: 0; padding-bottom: 3px; letter-spacing: 1px">
                                            <span style="font-family: arial, helvetica, sans-serif;">Thank you for choosing to make an <br> Azizi Developments property your new home. </span>
                                        </p>
                                        <br />
                                        <p style="font-family: arial, helvetica, sans-serif; color: #153151; font-size: 11px; text-align: center; line-height: 24px; margin: 0; padding-bottom: 3px; letter-spacing: 1px">
                                            <span style="font-family: arial, helvetica, sans-serif;">
                                                We hope that this update reassures you of the swift progress that we are making and excites you as much as it does us.
                                            </span>
                                        </p>
                                        <br />
                                        <p style="font-family: arial, helvetica, sans-serif; color: #153151; font-size: 11px; text-align: center; line-height: 24px; margin: 0; padding-bottom: 6px; letter-spacing: 1px">
                                            <span style="font-family: arial, helvetica, sans-serif; text-decoration: none;color: #153151"> 
                                                Please see below the construction update
                                                <br>for <strong> <?= $CSUpdate['phase']; ?> in <?php if ($CSUpdate['protitle'] == 'Azizi Riviera - Meydan'): echo 'Meydan'; elseif ($CSUpdate['protitle'] == 'Azizi Victoria - Meydan'): echo 'Meydan'; else: echo trim($CSUpdate['protitle']); endif; ?></strong>.</span></p>
                                        <br>
                                    </td>
                                </tr>

                                <tr valign="top">
                                    <td style="height: 0px;"></td>
                                </tr>

                                <tr valign="top">
                                    <td style="height:20px"></td>
                                </tr> 

                                <tr valign="top">
                                    <td style="padding: 0px 0px; text-align: center; ">
                                        <a href="https://azizidevelopments.com/en/" target="_blank">
                                            <?php $Phease = array("Riviera Phase 1"); $Phease1 = array("Riviera Phase 2", "Riviera Phase 3");  if(in_array($CSUpdate['phase'], $Phease)): ?>
                                                <img alt="Azizi Developments" src="https://azizidevelopments.com/assets/72ppi/Riviera-phase-top-view.jpg" width="350" height="224" />
                                            <?php elseif(in_array($CSUpdate['phase'], $Phease1)) : ?> 
                                                <img alt="Azizi Developments" src="https://azizidevelopments.com/assets/72ppi/Riviera-phase-II.jpg" width="350" height="224" />
                                            <?php else:?>
                                                <img alt="<?= $CSUpdate['BulidingName']; ?>" src="https://azizidevelopments.com/assets/images/properties/<?= $CSUpdate['gallery_location']; ?>/<?= $CSUpdate['bpgallery_location']; ?>/construction-update/<?= $CSUpdate['picture']; ?>" width="350" height="224" />
                                            <?php endif;?>
                                        </a>
                                    </td>
                                </tr>
                                <tr valign="top">
                                    <td style="height:15px"></td>
                                </tr>
                                <tr valign="top">
                                    <td style="padding: 0px 0px; text-align: center; ">
                                        <br/>
                                        <img alt="Azizi Developments" src="https://azizidevelopments.com/assets/72ppi/<?= $CSUpdate['public_completion']; ?>.png" width="150" height="150" />
                                        <br/>
                                        <!--span style="font-family: arial, helvetica, sans-serif; color: #cccccc; font-size: 11px; text-align: center; line-height: 24px; margin: 0; padding-bottom: 3px;letter-spacing: 1px">
                                            <em><?= $CSUpdate['phase']; ?> in <?php if ($CSUpdate['protitle'] == 'Azizi Riviera - Meydan'): echo 'Meydan';
                                            elseif ($CSUpdate['protitle'] == 'Azizi Victoria - Meydan'): echo 'Meydan'; else: echo $CSUpdate['protitle']; endif; ?> construction update</em>
                                        </span-->
                                    </td>
                                </tr>

                                <tr valign="top">
                                    <td style="height: 10px"></td>
                                </tr>
                                <tr valign="top">
                                    <td style="height: 10px;"></td>
                                </tr>
                                <tr valign="top">
                                    <td style="padding-left:  80px; padding-right:  80px;">
                                        <br />
                                        <p style="font-family: arial, helvetica, sans-serif; color: #153151; font-size: 11px; text-align: center; line-height: 24px; margin: 0; padding-bottom: 3px;letter-spacing: 1px">
                                            <span style="font-family: arial, helvetica, sans-serif;">Azizi’s mission for <?= date('Y'); ?> is to become the most customer-centric real estate developer in the UAE. In line with our Year of Construction, we are handing over many properties this year and hope to become your developer of choice. </span>
                                        </p>
                                        <br />
                                        <p style="font-family: arial, helvetica, sans-serif; color: #153151; font-size: 11px; text-align: center; line-height: 24px; margin: 0; padding-bottom: 3px; letter-spacing: 1px">
                                            <span style="font-family: arial, helvetica, sans-serif;">If you have any suggestions on how we can improve our service, please don’t hesitate to contact us through any of the following channels: </span>
                                        </p>
                                        <br />
                                        <p style="font-family: arial, helvetica, sans-serif; color: #153151; font-size: 11px; text-align: center; line-height: 24px; margin: 0; padding-bottom: 3px; letter-spacing: 1px">
                                            <span style="font-family: arial, helvetica, sans-serif;">
                                                <span style="font-family: arial, helvetica, sans-serif;"> Visit our <a href="https://azizidevelopments.com/en/" style="text-decoration: none; color: #153151; font-size: 11px; text-align: center;" target="_blank">www.azizidevelopments.com</a></span>	
                                                <br>
                                                <span style="font-family: arial, helvetica, sans-serif;"> 
                                                    <a href="tel:80029494" style="text-decoration: none; color: #153151; font-size: 11px; text-align: center;" >Call 800-AZIZI</a> or 
                                                    <a href="tel:80022737" style="text-decoration: none; color: #153151; font-size: 11px; text-align: center;" >800-CARES</a>
                                                </span> 
                                                <br>
                                                Visit us at Suite No. 804 of the Conrad Hotel on<br>Sheikh Zayed Road, Dubai, UAE
                                            </span>
                                        </p>
                                        <br/>
                                        <p style="font-family: arial, helvetica, sans-serif; color: #153151; font-size: 11px; text-align: center; line-height: 24px; margin: 0; padding-bottom: 6px; letter-spacing: 1px">
                                            <span style="font-family: arial, helvetica, sans-serif; text-decoration: none;color: #153151">
                                                <strong>Best regards,</strong><br>
                                                <strong>Azizi Developments</strong>
                                            </span>
                                            <br />
                                        </p>
                                        <br>
                                    </td>
                                </tr>
                                <tr valign="top">
                                    <td style="height: 16px;"></td>
                                </tr>
                                <tr valign="middle">
                                <tr valign="top">
                                    <td style="padding: 0px 0px; text-align: left; ">
                                        <img alt="Azizi Developments" src="https://azizidevelopments.com/assets/72ppi/footer.jpg" width="550" height="112px" />
                                    </td>
                                </tr>
                                </tr>
                                <!--<tr valign="top"><td  style="height: 20px"></td></tr>-->
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </center>
</body>
</html>