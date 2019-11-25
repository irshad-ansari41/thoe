<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>IPS 2019</title>
        <style type="text/css">
            *{ margin:0; padding:0; font-family: tahoma;}
            hr { display: block; height: 0.1px; border: 0; border-top: 1px solid #c1c1c1; } 
            p{ margin-bottom: 10px;}

        </style>
    </head>

    <body style="background:#e0e0e0; background-color:#e0e0e0;width:595px;margin:0 auto;" bgcolor="#e0e0e0">
        <table style="background:#004196; background-color:#004196;width:595px;margin:0 auto" align="center" bgcolor="#004196" width="595">
            <tr>
                <td>
                    <table width="595" border="0" align="center" style="background:#004196; width:595px; background-color:#004196;" bgcolor="#004196" cellpadding="0" cellspacing="0">

                        <tr valign="top">
                            <td >

                                <a target="_blank" href="<?=SITE_URL?>/en" style="text-decoration: none; color: #001F5B; 
                                   font-family:Helvetica; font-size:12px;">
                                    <img src="http://thoeriviera.com/thoe-emailer/images/ips-2019/26-28_Mar_IPS_Emailer_Top_opt-1.jpg"  width="595"/>
                                </a>
                            </td>
                        </tr>

                        <tr valign="top">
                            <td style="padding:20px 50px; color:#f1f1f1; text-align: left; font-size: 14px; line-height: 20px;">
                                <?php //print_r($data); ?>
                                <p>
                                    Dear <?= $data['fullname'] ?>,
                                </p>
                                

                                <p>
                                    Thank you for your interest in 
                                    <?php //$data['details']['title_en'] ?>

                                </p>
                                
                                <p>
                                    Simply click on the links below to download brochure and floorplans

                                </p>
                               
                                <?php if ((!empty($data['brochuresdownloadlink'])) || !empty($data['floorplandownloadlink'])): ?>
                                <p style="padding:0 60px;">
                                    <ul
                                        <li>
                                            Brochure – <a href="<?= $data['brochuresdownloadlink'] ?>" style=" text-decoration: none; color: #f1f1f1 !important; "> Click here </a>
                                        </li>

                                        <li>
                                            Floor plans – <a href="<?= $data['floorplandownloadlink'] ?>" style=" text-decoration: none; color: #f1f1f1 !important; "> Click here </a>
                                        </li>
                                    </ul>  
                                </p>
                                <?php endif; ?>
                                <p>
                                    <br/>
                                    Should you require further information please 
                                    <?php if(!empty($data['websiteurl'])): ?><a href="<?= $data['websiteurl'] ?>" style=" text-decoration: none; color: #f1f1f1 !important;">Click here</a><?php endif; ?> 
                                    , alternatively contact us on 800 THOE (29494).
                                </p>
                                
                            </td>

                        </tr>


                        <tr valign="top">
                            <td style="padding:0px 150px 5px 150px; color:#fff; text-align: center; font-size: 14px; ">
                                <hr width="295" />
                            </td>
                        </tr>


                        <tr valign="top">
                            <td style="padding:20px 90px; color:#f1f1f1; text-align: center; font-size: 14px; line-height: 20px;">
                                <strong style="font-size: 20px; color:#fff;">
                                    Hall 7, Stand No. H7B-29
                                </strong><br/>
                                <span>26 - 28 March, 2019  |  10 AM - 7 PM</span><br/>
                                <span>Dubai World Trade Centre</span><br/>
                            </td>

                        </tr>

                        <tr valign="top">
                            <td >
                                <img src="http://thoeriviera.com/thoe-emailer/images/ips-2019/26-28_Mar_IPS_Emailer_800.jpg" 
                                     width="595" height="120" />
                            </td>
                        </tr>

                    </table>
                </td>
            </tr>
        </table>


    </body>

</html>
