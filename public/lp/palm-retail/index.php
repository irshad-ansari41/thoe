
<?php
$page_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
$thank_url = "https://azizidevelopments.com/lp/thank-you-en.html";
$website_url = "https://azizidevelopments.com/en/dubai/palm-jumeirah";
?>
<!DOCTYPE html>
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
    <head>

        <!-- Basic Page Needs -->
        <meta charset="utf-8">
        <title>Azizi Retail | Palm Jumeirah</title>
        <meta name="description" content="Responsive Hotel  Site template">
        <meta name="author" content="">

        <!-- Mobile Specific Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- CSS -->
        <link rel="stylesheet" href="css/base.css">
        <link rel="stylesheet" href="css/skeleton.css">
        <link rel="stylesheet" href="css/layout.css">

        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Favicons-->
        <link rel="shortcut icon" href="https://azizidevelopments.com/assets/favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">
        <style>
            .videoWrapper { position: relative; padding-bottom: 56.25%; /*16:9 */ padding-top:0px; height: 0; }
            .videoWrapper video { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }
            .column, .columns{ margin-left: 0px !important; margin-right: 0px !important;}
        </style>
        <!-- Jquery -->
        <?php require('../js/gtm-head.php') ?>

    </head>
    <body>
        <?php require('../js/gtm-body.php') ?>

        <section style="background:rgba(0, 0, 0, 0.7803921568627451);">
            <div class="container" >
                <div class="sixteen" id="logo" style="text-align:left !important;">
                    <img src="img/azizi-logo-white.png">
                </div>                    
            </div>
        </section>

        <div id="line_oblique_1">
            <div class="container">

                <div class="sixteen" id="logo">
                    <!--img src="img/azizi-logo-white.png"-->
                    <!--h1>Exclusive opportunity to expand your business.</h1-->
                    <h1 style="text-align:center;">Exclusive Palm retail opportunity</h1>
                    <p style="color: #fff; text-align: left; font-size: 15px; padding: 0px 0px 15px 0px; ">The only freehold commercial retail space available on Palm Jumeirah.  Don’t miss out on this exclusive retail opportunity, which offers excellent returns on investment.</p>

                </div>

                <div class="twelve columns omega" id="video_container" >
                    <div class="videoWrapper margin-b-30">
                        <video controls autoplay="true">
                            <source src="./vid/Palm-Retail_v1_Low-Res.mp4" type="video/mp4">
                        </video>
                    </div>

                </div>
                <div class="four columns alpha" id="timer_container" >
                    <div id="back_in"><h2>Fill in the form below and an agent will contact you directly</h2></div>
                    <iframe src="https://azizidevelopments.com/en/lead-form/new"  scrolling="no" style="width: 100%;height: 300px;margin-top:12px;border:0px solid gray;"></iframe><!-- Countdown -->
                </div><!-- End timer_container -->



                <footer class="sixteen columns" >

                    <!-- END SEND MAIL SCRIPT -->    
            </div>

            <div id="copy">
                <p class="omega" style="text-align:center">© <?= date('Y') ?> Azizi Developments. All rights reserved.</p>
            </div>
        </footer><!-- End footer -->

    </div><!-- container -->
</div><!-- End line_oblique_1 -->
<div class="demo-resizeme"></div>
<!-- JQUERY plugins: Moderniz, Tooltip, form Validate -->
<script src=https://azizidevelopments.com/lp/js/jquery-popper-bootstrap.js></script>
<script type="text/javascript" src="js/scripts.js"></script>
<script type="text/javascript" src="js/functions.js"></script>  

<script>
    var url = new URL('<?= $page_url ?>');
    var source = url.searchParams.get("utm_source");
    var campaign = url.searchParams.get("utm_campaign");

    if (source !== '' && source !== null) {
        sessionStorage.setItem("utm_source", capitalize(source.replace("-", " ")));
    } else {
        sessionStorage.setItem("utm_source", 'Landing Page');
    }
    if (campaign !== '' && campaign !== null) {
        sessionStorage.setItem("utm_campaign", capitalize(campaign.replace("-", " ")));
    } else {
        sessionStorage.setItem("utm_campaign", 'Palm Retail');
    }

    sessionStorage.setItem("lead_url", '<?= $page_url ?>');
    sessionStorage.setItem("thank_url", '<?= $thank_url ?>');
    sessionStorage.setItem("website_page_url", '<?= $website_url ?>');

    function capitalize(str) {
        strVal = '';
        str = str.split(' ');
        for (var chr = 0; chr < str.length; chr++) {
            strVal += str[chr].substring(0, 1).toUpperCase() + str[chr].substring(1, str[chr].length) + ' ';
        }
        return strVal;
    }
</script>
</body>
</html>