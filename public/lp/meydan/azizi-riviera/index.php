<?php
$page_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
$thank_url = "https://azizidevelopments.com/lp/thank-you-en.html";
$website_url = "https://azizidevelopments.com/en/dubai/meydan/riviera";
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang=en-US> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang=en-US> <![endif]-->
<!--[if gte IE 8]><html class="ie ie8" lang=en-US> <![endif]-->
<html dir=ltr lang=en-US>
    <head>
        <meta http-equiv=content-type content="text/html; charset=utf-8" />
        <meta http-equiv=X-UA-Compatible content="IE=edge" />
        <meta name=viewport content="width=device-width, initial-scale=1, maximum-scale=1" />
        <link rel=stylesheet href=https://azizidevelopments.com/lp/css/bootstrap-style.css type=text/css />
        <!--[if IE]>
        <script src=http://html5shiv.googlecode.com/svn/trunk/html5.js></script>
        <![endif]-->
        <title>Azizi Riviera at Meydan One</title>
        <style type=text/css>
            div.login{border-radius:2px;background-color:#5f84f2;padding:4px 8px;cursor:pointer;display:none}
            #bottom { height: 150px; width: 300px; background-color: green; }
            .slider-text-wrap{background-size: cover!important;margin-top: auto;padding-top: 100px;height: 100vh;}
            .downarrow{ position: fixed; right: 50%; bottom: 10px; z-index: 999; padding:10px 0px;  background: rgba(7, 22, 48, 0.37); border-radius: 4px; }            
            .facilities-item{width: 100%;}
        </style>
        <?php require('../../js/gtm-head.php') ?>
    </head>
    <body>
        <?php require('../../js/gtm-body.php') ?>
        <div id=main-wrapper class="animsition clearfix">
            <header id=header class="site-header transparent-header clearfix">
                <div class=header-navigation>
                    <div class=container>
                        <div class=row>
                            <div class="logo col-md-9 col-sm-6 col-xs-6" data-wow-delay=1s>
                                <div class=logo-image>
                                    <a href=https://azizidevelopments.com/en>
                                        <img src="https://azizidevelopments.com/lp/meydan/azizi-riviera/images/logo_Azizi.png" alt="Azizi Developments">
                                    </a>
                                </div>
                            </div>
                            <div class="logo col-md-3 col-sm-6 col-xs-6" data-wow-delay=1s>
                                <div class=logo-image>
                                    <a href=index.html><img src="https://azizidevelopments.com/lp/meydan/azizi-riviera/images/logo.png" alt></a>
                                </div>
                            </div>
                            <div class="mobile-menu wow fadeInDown" data-wow-delay=1s>
                                <button id=slide-buttons class="icon icon-navicon-round"></button>
                            </div>
                            <nav id=c-menu--slide-right class="c-menu c-menu--slide-right">
                                <button class="c-menu__close icon icon-remove-delete"></button>
                                <ul class=menus-mobile>
                                    <li><a href=index.html>Home</a></li>
                                    <li><a href=room-detail.html>Room Detail</a></li>
                                    <li class=has-child>
                                        <a href=blog.html>Blog</a>
                                        <ul class=child>
                                            <li><a href=single-post.html>Single Post</a></li>
                                        </ul>
                                    </li>
                                    <li><a href=contact.html>Contact Agent</a></li>
                                </ul>
                            </nav>
                            <div id=slide-overlay class=slide-overlay></div>
                        </div>
                    </div>
                </div>
            </header>
            <section id=slider class="flexslider-wrap fullscreen clearfix" style="min-height: 690px;">
                <div class=slider-text-wrap style=background:url(images/slider/slide-lg-1.jpg);>
                    <div class=container>
                        <div class=row>
                            <div class=col-md-8>
                                <div class=slider-text>
                                    <h3>
                                        Last Canal Units In Riviera<br/>
                                        <small style="color:#fff;">Own a dream apartment in Azizi Riviera</small>
                                    </h3>
                                    <br/>
                                    <p>

                                        Pay 10% and book your home now!<br/>
                                        50% on handover.<br/>
                                        Monthly Installments starting AED 720 <br/>                                       
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4 text-center">
                                <div class="slider-form">
                                    <iframe src="https://azizidevelopments.com/en/lead-form" class="FMLeadFrm"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id=content class="homepage clearfix">
                <div class="gallery wrapper clearfix">
                    <div class=container>
                        <div class="col-sm-12 col-md-12">
                            <div class="agent-detail wow fadeIn" data-wow-delay=0.5s>
                                <div class="title text-center">
                                    <h2><span class=bold>Embrace</span> the new Riviera lifestyle</h2>
                                </div>
                                <div class=facilities-content>
                                    <p class=intro>Positioned in the prestigious Meydan One project, Azizi Riviera is set within a multiphase development
                                        of 71 buildings spread across four phases comprising 13 regions, a mega integrated retail district, vibrant
                                        four and five-star hotel and lush greenery.</p>
                                    <div class=facilities-item>
                                        <h3>Community Living</h3>
                                        <p>The new Azizi Riviera is all about community living, evoking the classic Mediterranean Riviera lifestyle with a modern, contemporary outlook. Long walks on paved paths, beautiful sunsets and just a short distance from water transport, yachting facilities and a proposed marina, you will always
                                            feel safe and warm.</p>
                                    </div>
                                    <div class=facilities-item>
                                        <h3>Embrace The Good Life</h3>
                                        <p>This is a place to embrace the good life and profitez, as the French say. Built to emulate the Riviera, Azizi Riviera brings the best of French Mediterranean contemporary living to Dubai to create a lasting sense of community. The open spaces and public areas offer several conveniences, while the clean line, modern glass and wood facades add a touch of uniquely Dubai glitz and glamour.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>


            <section id=content class="homepage clearfix">
                <div class="gallery wrapper clearfix">
                    <div class=container>
                        <div class="title text-center wow fadeIn">
                            <h2><span class=bold>Azizi Riviera</span> Image Gallery</h2>
                        </div>

                        <section id=grid class="grid clearfix mobile-hide">
                            <div class="row">
                                <?php
                                $lgimg = glob('images/gallery/lg/*');
                                $smimg = glob('images/gallery/*');
                                for ($i = 0; $i < count($lgimg); $i++):
                                    ?>
                                    <a class="col-sm-4 wow fadeInUp b24-web-form-popup-btn-42" data-path-hover="M 0,0 0,38 90,58 180.5,38 180,0 z" href="<?= $lgimg[$i] ?>" data-fancybox="gallery-1" data-title>
                                        <figure>
                                            <img src="<?= $smimg[$i] ?>" />
                                            <svg viewBox="0 0 180 500" preserveAspectRatio=none>
                                            <path d="M 0 0 L 0 182 L 90 126.5 L 180 182 L 180 0 L 0 0 z "/>
                                            </svg>
                                            <figcaption>
                                                <span>View Image</span>
                                            </figcaption>
                                        </figure>
                                    </a>
                                <?php endfor; ?>       

                            </div>

                        </section>



                        <section id=content class="homepage clearfix">
                            <div class="gallery wrapper clearfix pbottom">
                                <div class=container-flud>
                                    <div class="col-sm-12 col-md-12" style="padding:0;">
                                        <div style="width: 100%"><iframe width="100%" height="400" src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;coord=25.1574719, 55.3019084&amp;q=Azizi%20Riviera%20at%20Meydan+(Azizi%20Developments)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/create-google-map/">Add map to website</a></iframe></div>
                                    </div>
                                </div>
                            </div>
                        </section>


                    </div>
                    <footer id=footer class="wrapper clearfix">
                        <div class="footer-text wow fadeIn text-center">
                            <h1>Want More Information?</h1>
                            <p>Let one of our professional property consultants provide you full information tailored to your requirements.</p>
                            <a class="button-normal yellow b24-web-form-popup-btn-99" data-toggle=modal data-target=#lead-form-model>Register Your Interest!</a>
                        </div>
                        <div class="footer-copyright wow fadeIn text-center">
                            <div class=container>
                                <div class=copyright>
                                    <p>Copyright <?= date('Y'); ?> Azizi Developments. All Right Reserved.</p>
                                </div>
                            </div>
                        </div>
                    </footer>
                    <div class="modal" id="lead-form-model" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">ENQUIRE NOW</h4>
                                </div>
                                <div class="modal-body" style="padding:0 5px;">
                                    <iframe src="https://azizidevelopments.com/en/lead-form" class="FMLeadFrm" scrolling="no"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--a href="#footer" id="bottom" title="Click to scroll down"><img src="images/down-arrow.svg" class='downarrow' width="54px"/></a-->    
            <script src=https://azizidevelopments.com/lp/js/jquery-popper-bootstrap.js></script>
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
                    sessionStorage.setItem("utm_campaign", 'Azizi Reviera');
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