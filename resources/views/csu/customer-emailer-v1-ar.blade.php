
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Construction Update - Azizi Developments</title>
        <style>
            html, body { direction: rtl; width: 100%; font-family: arial, helvetica, sans-serif; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; padding: 0;  }
            h1, h2, h3, h4, h5 { font-family: arial, helvetica, sans-serif; }
            h1, h2, h3, h4, h5,p{margin:0; padding: 0;}
            a{ text-decoration: none; }
            p{margin:0; padding:0;}
        </style>
    </head>
    <body style="background:#fff; background-color:#fff; width:550px; margin:0px auto; direction: rtl" bgcolor="#fff">
    <center>
        <table align="center" style="background: #e8ecef; width: 550px;border-spacing: 0px; direction: rtl" bgcolor="#e8ecef" dir="rtl">
            <tbody>
                <tr>
                    <td>
                        <table border="0" cellpadding="0" cellspacing="0" align="center" style="background: #fff; width: 550px; direction: rtl;" bgcolor="#ece6e6" dir="rtl">
                            <tbody>
                                <tr valign="top">
                                    <td style="padding: 0px 0px; text-align: center; ">
                                        <img alt="Azizi Developments" src="https://azizidevelopments.com/assets/72ppi/main.jpg" width="550" height="550" />
                                    </td>
                                </tr>

                                <tr valign="top">
                                    <td style="padding-left:  80px; padding-right:  80px;">
                                        <p style="font-family: arial, helvetica, sans-serif; color: #153151; font-size: 12px; text-align: center; line-height: 24px; margin: 0; padding-bottom: 3px;letter-spacing: 1px">
                                            <span style="font-family: tahoma;">
                                                <strong>
                                                    الى  
                                                    <?= $CSUpdate['fullname'] ?>،
                                                </strong> 
                                            </span>
                                        </p>
                                        <br />

                                        <p style="font-family: tahoma; color: #153151; font-size: 13px; text-align: center; line-height: 24px; margin: 0; padding-bottom: 3px; letter-spacing: 1px">
                                            <span style="font-family: tahoma;">
                                                شكراً لاختيارك عزيزي للتطوير العقاري كمنزلك الجديد. 
                                            </span>
                                        </p>
                                        <br />

                                        <p style="font-family: tahoma; color: #153151; font-size: 13px; text-align: center; line-height: 24px; margin: 0; padding-bottom: 3px; letter-spacing: 1px">
                                            <span style="font-family: tahoma;">
                                                نأمل أن يكون هذا التحديث لطمأنتكم على تقدمنا السريع الذي نحققه وان يسعدكم بقدر ما يسعدنا.
                                            </span>
                                        </p>
                                        <br />

                                        <p style="font-family: tahoma; color: #153151; font-size: 13px; text-align: center; line-height: 24px; margin: 0; padding-bottom: 3px; letter-spacing: 1px">
                                            <span style="font-family: tahoma;">
                                                حيث ان اقتربنا لانهاء مشروع <?= $CSUpdate['phase_ar']; ?> ، نود اطلاعكم وتقديم لكم فرصة أخيرة للاستفادة من التوفير على دفعتكم النهائية.
                                                هذا العرض قائم لفترة محدودة، نرجوا التواصل معنا  للاطلاع على المزيد من للتفاصيل.
                                            </span>
                                        </p>
                                        <br />

                                        <p style="font-family: tahoma; color: #153151; font-size: 13px; text-align: center; line-height: 24px; margin: 0; padding-bottom: 6px; letter-spacing: 1px">
                                            <span style="font-family: tahoma; text-decoration: none;color: #153151"> 
                                                يرجى الاطلاع ادناه على تحديث نسبة انجاز المشروع
                                                <br>
                                                <strong> <?= $CSUpdate['phase_ar']; ?> 
                                                في
                                                <?php if ($CSUpdate['protitle_ar'] == 'Azizi Riviera - Meydan'): echo 'Meydan';
                                                elseif ($CSUpdate['protitle_ar'] == 'Azizi Victoria - Meydan'): echo 'Meydan';
                                                else: echo trim($CSUpdate['protitle_ar']);
                                                endif; ?></strong>.
                                            </span>
                                        </p>
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
                                        <a href="https://www.youtube.com/embed/<?=$CSUpdate['csuyoutubelink']?>" target="_blank">
                                            <?php $Phease = array("Riviera Phase 1");
                                            $Phease1 = array("Riviera Phase 2", "Riviera Phase 3");
                                            if (in_array($CSUpdate['phase'], $Phease)): ?>
                                                <img alt="Azizi Developments" src="https://azizidevelopments.com/assets/72ppi/Riviera-phase-top-view.jpg" width="350" height="224" />
                                            <?php elseif (in_array($CSUpdate['phase'], $Phease1)) : ?> 
                                                <img alt="Azizi Developments" src="https://azizidevelopments.com/assets/72ppi/Riviera-phase-II.jpg" width="350" height="224" />
                                            <?php else: ?>
                                                <img alt="<?= $CSUpdate['BulidingName']; ?>" src="https://azizidevelopments.com/assets/images/properties/<?= $CSUpdate['gallery_location']; ?>/<?= $CSUpdate['bpgallery_location']; ?>/construction-update/<?= $CSUpdate['picture']; ?>" width="350" height="224" />
                                            <?php endif; ?>
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
                                            <em>Azizi Mina in Palm Jumeirah construction update</em>
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
                                        <p style="font-family: tahoma; color: #153151; font-size: 13px; text-align: center; line-height: 24px; margin: 0; padding-bottom: 3px;letter-spacing: 1px">
                                            <span style="font-family: tahoma;">
                                                مهمتنا في عزيزي لعام 2019 أن نصبح الشركة العقارية الأكبر مركزا للعملاء في الامارات.
                                                تماشيا مع عام البناء في دولة الامارات ، نقوم بتسليم العديد من العقارات ونأمل ان نكون اختياركم الأمثل.
                                            </span>
                                        </p>
                                        <br />
                                        <p style="font-family: tahoma; color: #153151; font-size: 13px; text-align: center; line-height: 24px; margin: 0; padding-bottom: 3px; letter-spacing: 1px">
                                            <span style="font-family: tahoma;">
                                                اذا كان لديكم اي اقتراحات حول تحسين خدماتنا،
                                                يرجى عدم التردد في التواصل معنا من خلال اي من قنواتنا التالية:
                                            </span>
                                        </p>
                                        <br />
                                        <p style="font-family: tahoma; color: #153151; font-size: 13px; text-align: center; line-height: 24px; margin: 0; padding-bottom: 3px; letter-spacing: 1px">
                                            <span style="font-family: tahoma;">
                                                <span style="font-family: tahoma;"> 
                                                    زوروا موقعنا 
                                                    <a href="https://azizidevelopments.com" style="text-decoration: none; color: #153151; font-size: 13px; text-align: center;" target="_blank">
                                                        www.azizidevelopments.com
                                                    </a>
                                                </span>	
                                                <br>
                                                <span style="font-family: tahoma;"> 
                                                    <a href="tel:80029494" style="text-decoration: none; color: #153151; font-size: 13px; text-align: center;" >
                                                        للاتصال 
                                                        800-AZIZI
                                                    </a> 
                                                    أو 
                                                    <a href="tel:80022737" style="text-decoration: none; color: #153151; font-size: 13px; text-align: center;" >
                                                        800-CARES
                                                    </a>
                                                </span> 
                                                <br>
                                                قوموا بزيارتنا بجناح رقم 804 في فندق كونراد شارع الشيخ زايد ،دبي، الامارات.
                                            </span>
                                        </p>
                                        <br/>
                                        <p style="font-family: tahoma; color: #153151; font-size: 13px; text-align: center; line-height: 24px; margin: 0; padding-bottom: 6px; letter-spacing: 1px">
                                            <span style="font-family: tahoma; text-decoration: none;color: #153151">
                                                <strong>
                                                    تحياتنا،
                                                </strong><br>
                                                <strong>
                                                    شركة عزيزي للعقارات
                                                </strong>
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