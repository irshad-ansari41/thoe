<?php
//echo $project_id;
//echo '<br/>'.$building_id;
//echo "<pre style='color:#fff;'>";print_r($CSUpdate);echo '</pre>'; exit();

$dlogourl = 'https://gallery.mailchimp.com/287c3c06b2b84c4cf85b63fef/images/2229ab84-fda6-4fab-9d05-ad5a0e80713c.png';
$slogourl = SITE_URL.'/assets/images/cusicon/logos/';
$progressurl = SITE_URL.'/assets/images/cusicon/';
$victorialogo = [60, 61, 81, 82, 83, 84, 85, 86,];
$rivieralogo = [25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 65, 66, 67, 68, 69, 70, 71, 72, 74, 75, 77, 78, 79];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Construction Updates</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body style="background:#fff; background-color:#fff; width:595px; margin:0 auto; font-family:Helvetica; font-size:13px;" bgcolor="#fff">

        <table width="595" border="0" align="center" style="background:#e9ecef; background-color:#e9ecef;" bgcolor="#e9ecef"  
               cellpadding="0" cellspacing="0" >
            <tr>
                <td style="padding:20px 20px;">
                    <img src="<?= $dlogourl ?>" width="100px"/>
                </td>

                <td></td>
                <?php if (in_array($CSUpdate['bpid'], $victorialogo)): ?>
                    <td align='right' style="padding:20px 20px;"> 
                        <img src="<?= !empty($CSUpdate['bpid']) ? $slogourl . '60.png' : $dlogourl; ?>" width='100px' />                    
                    </td>
                <?php elseif (in_array($CSUpdate['bpid'], $rivieralogo)): ?>
                    <td align='right' style="padding:20px 20px;"> 
                        <img src="<?= !empty($CSUpdate['bpid']) ? $slogourl . '34.png' : $dlogourl; ?>" width='100px' />                    
                    </td>
                <?php else: ?>
                    <td align='right' style="padding:20px 20px;"> 
                        <img src="<?= !empty($CSUpdate['bpid']) ? $slogourl . $CSUpdate['bpid'] . '.png' : $dlogourl; ?>" width='100px' />                    
                    </td>
                <?php endif; ?>
            </tr>

            <tr>
                <td colspan="3" style="padding:10px 20px;">
                    <h1 style="line-height:20px">Great Living</h1>
                    <span style="font-size:15px; line-height:0px">In The Heart Of Dubai</span>

                    <h1 style="line-height:20px;direction:rtl;font-family:tahoma;font-size: 18px;">أسلوب العيش الرائع</h1>
                    <p style="font-size:13px; line-height:0px; direction:rtl; font-family:tahoma;">في قلب دبي</p>
                </td>
            </tr>

            <tr>
                <td colspan="3" style="padding:10px 20px;"> 

                    <p style ="line-height: 25px;">
                        Dear Thoe Home Owner,
                    </p>

                    <p style ="line-height: 22px;">
                        It gives us great pleasure to present the construction progress of your Thoe home. Thoe Developments follows 
                        a construction-driven strategy and focuses on providing timely updates on all our projects under construction across 
                        Dubai, so you are well informed about the progress.
                    </p>

                    <p style ="line-height: 25px;">
                        Given below are the latest images of the construction at the site of the Thoe Developments:
                    </p>

                    <p style ="line-height: 25px; direction:rtl; font-family:tahoma;">
                        أعزاءنا المتملكين
                    </p>

                    <p style ="line-height: 22px; direction:rtl; font-family:tahoma;">
يسرنا تقديم آخر المستجدات عن تقدم سير الأعمال في منزلك من عزيزي. تتبنى عزيزي للتطوير العقاري خطة بناء إستراتيجية وتضمن في الوقت المحدد تقديم آخر أخبار مشاريعها قيد الإنشاء في دبي، لإبقائك على اطلاع دائم بوتيرة سير الأعمال.
                    </p>

                    <p style ="line-height: 25px; direction:rtl; font-family:tahoma;">
                        يمكنك الاطلاع فيما يلي على أحدث صور مواقع البناء في مشاريع عزيزي للتطوير العقاري:
                    </p>


                </td>
            </tr>

            <tr>
                <?php if (!empty($CSUpdate['GROUND']) == 'GROUND'): ?>
                    <td align="left" style="padding:20px 20px;width: 198px;">

                        <img src="<?= !empty($CSUpdate['structure_percentage']) ? $progressurl . $CSUpdate['structure_percentage'] : $progressurl . '0' ?>.png"/>
                        <h2 style="line-height:20px;margin: 0px;font-size:13px;text-align: center;padding-top: 10px;"><b>GROUND WORKS</b></h2>
                        <h2 style="line-height:20px;margin: 0px;font-size:13px;text-align: center;padding-top: 7px; font-family:tahoma;">الأعمال الأرضية</h2>
                    </td>
                <?php endif; ?>

                <?php if (!empty($CSUpdate['STRUCTURE']) == 'STRUCTURE'): ?>
                    <td align="left" style="padding:20px 20px;width: 199px;">

                        <img src="<?= !empty($CSUpdate['mep_percentage']) ? $progressurl . $CSUpdate['mep_percentage'] : $progressurl . '0' ?>.png"/>
                        <h2 style="line-height:20px;margin: 0px;font-size:13px;text-align: center; padding-top: 10px;"><b>STRUCTURE</b></h2>
                        <h2 style="line-height:20px;margin: 0px;font-size:13px;text-align: center;padding-top: 7px; font-family:tahoma;">الهيكل</h2>
                    </td>
                <?php endif; ?>

                <?php if (!empty($CSUpdate['FINISHING']) == 'SERVICES & FINISHING'): ?>
                    <td align="left" style="padding:20px 20px;width: 198px;">

                        <img src="<?= !empty($CSUpdate['finishes_percentage']) ? $progressurl . $CSUpdate['finishes_percentage'] : $progressurl . '0' ?>.png"/>
                        <h2 style="line-height:20px;margin: 0px;font-size:13px;text-align: center;padding-top: 10px;"><b>SERVICES & FINISHING</b></h2>
                        <h2 style="line-height:20px;margin: 0px;font-size:13px;text-align: center;padding-top: 7px; font-family:tahoma;">
                            <b>  الخدمات والتشطيبات   </b>
                        </h2>
                    </td>
                <?php endif; ?>

            </tr>



            <tr>
                <td colspan="3"> 
                    <br/>
                    <!--img src="https://gallery.mailchimp.com/287c3c06b2b84c4cf85b63fef/images/b7d9bd51-0327-4bb3-be04-b18c6eac874a.png" 
                    width="595px" /-->
                    <img src="<?=SITE_URL?>/assets/images/properties/{{$CSUpdate['gallery_location']}}/{{$CSUpdate['bpgallery_location']}}/{{ $CSUpdate['header_image'] }}" 
                         height="298" width="595" style="height:298px; width:595px; max-width: 595px; min-width:595px;" />
                         <!--img src="<?php //$holder_image   ?>" height="298" width="595" style="height:298px; width:595px; max-width: 595px; min-width:595px;" /-->
                    <br/><br/>

                </td>
            </tr>


            <tr>
                <td style="padding-left:20px;">
                    <a href="" style="text-decoration: none; color: #000; font-family:Helvetica; font-size:12px;">
                        www.<?=DOMAIN_NAME?>
                    </a>
                </td>

                <td align="right"> 
                    <span>
                        <a href="https://www.facebook.com/ThoeGroup" target="_blank">
                            <img src="https://cdn-images.mailchimp.com/icons/social-block-v2/color-facebook-48.png" 
                                 style="display:inline;" height="24" width="24" class="">
                        </a>
                    </span>

                    <span>
                        <a href="https://twitter.com/thoegroup" target="_blank">
                            <img src="https://cdn-images.mailchimp.com/icons/social-block-v2/color-twitter-48.png"
                                 style="display:inline;" height="24" width="24" class=""></a>
                    </span>

                    <span>
                        <a href="https://www.linkedin.com/company/thoe-developments" target="_blank">
                            <img src="https://cdn-images.mailchimp.com/icons/social-block-v2/color-linkedin-48.png" 
                                 style="display:inline;" height="24" width="24" class="">
                        </a>
                    </span>

                    <span>
                        <a href="https://www.youtube.com/channel/UCmUtuRMwJxaovjGBNSXx-Jw/featured" target="_blank">
                            <img src="https://cdn-images.mailchimp.com/icons/social-block-v2/color-youtube-48.png" 
                                 style="display:inline;" height="24" width="24" class=""></a>
                    </span>

                </td>

                <td align="right"  style="padding-right:20px;">
                    <!--img src="https://gallery.mailchimp.com/287c3c06b2b84c4cf85b63fef/images/a9573693-e90e-485c-bb46-25384e5bd8e2.png" 
                    width="50px" style="width:50px; max-width:50px; min-width:50px;" /-->

                    <?php if (in_array($CSUpdate['bpid'], $victorialogo)): ?>
                        <img src="<?= !empty($CSUpdate['bpid']) ? $slogourl . '60.png' : $dlogourl; ?>" width="100px" style="width:100px; max-width:100px; min-width:100px;" />
                    <?php elseif (in_array($CSUpdate['bpid'], $rivieralogo)): ?>
                        <img src="<?= !empty($CSUpdate['bpid']) ? $slogourl . '34.png' : $dlogourl; ?>" width="100px" style="width:100px; max-width:100px; min-width:100px;" />
                    <?php else: ?>    
                        <img src="<?= !empty($CSUpdate['bpid']) ? $slogourl . $CSUpdate['bpid'] . '.png' : $dlogourl; ?>" width="50px" style="width:100px; max-width:100px; min-width:100px;" />
                    <?php endif; ?>
                </td>


            </tr>

            <tr>

                <td colspan='2' style='padding-left:20px; color: #000; font-family:Helvetica; font-size:9px; width:250px;'>
                    <p>In line with our commitment to continually improve our customer service, Thoe Developments has launched its new Customer Care Program. Contact our dedicated team of Care professionals in case of any issue with your Thoe unit:</p>
                </td>

                <td align='right' style='padding-right:20px;'>
                    <a href="#" class="telephone" data-telephone="80022737" style="text-decoration: none; color: #000; font-family:Helvetica; font-size:12px;">
                        <b>800 CARES (22737)</b>
                    </a>
                </td>

            <br/><br/>

        </tr>


    </table>        

</body>
</html>

