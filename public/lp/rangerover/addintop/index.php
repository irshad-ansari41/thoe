<?php
$page_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
$thank_url = "https://azizidevelopments.com/lp/thank-you-en.html";
$website_url = "https://azizidevelopments.com/lp/rangerover/index.php";
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
        <title>Azizi Developments - Al Furjan</title>
        <style type=text/css>div.login{border-radius:2px;background-color:#5f84f2;padding:4px 8px;cursor:pointer;display:none}iframe { overflow: hidden; }</style>
        <?php require('../../js/gtm-head.php') ?>
    </head>
    <body>
        <?php require('../../js/gtm-body.php') ?>
        <div id=main-wrapper class="animsition clearfix">
            <header id=header class="site-header transparent-header clearfix">
                <div class=header-navigation>
                    <div class=container>
                        <div class=row>
                            <div class="logo col-md-9" data-wow-delay=1s>
                                <div class=logo-image>
                                    <a href=index.html><img lsrc=../assets/img/logo_Azizi.png alt></a>
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
            <section id=slider class="flexslider-wrap fullscreen clearfix" style="min-height: 850px;">
                <div class=slider-text-wrap style=background:url(../assets/img/content/slider/slide-lg-1.jpg);>
                    <div class=container>
                        <div class=row>
                            <div class=col-md-8>
                                <div class=slider-text style=margin-top:0>
                                    <h2>Win A Range Rover Velar</h2>
                                    <p>
                                        When You Buy Your Home With Azizi Developments<br>
                                    </p>
                                    <p style=margin:0>Prices Starting From</p>
                                    <h2>AED 1671/-* PM</h2>
                                    <p>
                                    </p>
                                    <h3></h3>
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
                        <div class="title text-center wow fadeIn">
                            <h2><span class=bold>Azizi Developments</span> Projects</h2>
                        </div>
                        <div class="room-slider desktop-hide col-md-12">
                            <div class=flexslider>
                                <ul class=slides>
                                    <li>
                                        <img lsrc=../assets/img/content/gallery/alfurjan/acacia_thumb.jpg alt />
                                    </li>
                                    <li>
                                        <img lsrc=../assets/img/content/gallery/alfurjan/aster_thumb.jpg alt />
                                    </li>
                                    <li>
                                        <img lsrc=../assets/img/content/gallery/alfurjan/montrell_thumb.jpg alt />
                                    </li>
                                    <li>
                                        <img lsrc=../assets/img/content/gallery/alfurjan/royalbay_thumb.jpg alt />
                                    </li>
                                    <li>
                                        <img lsrc=../assets/img/content/gallery/alfurjan/roy_thumb.jpg alt />
                                    </li>
                                    <li>
                                        <img lsrc=../assets/img/content/gallery/alfurjan/tulip_thumb.jpg alt />
                                    </li>
                                    <li>
                                        <img lsrc=../assets/img/content/gallery/victoria/image1.jpg alt />
                                    </li>
                                    <li>
                                        <img lsrc=../assets/img/content/gallery/victoria/image2.jpg alt />
                                    </li>
                                    <li>
                                        <img lsrc=../assets/img/content/gallery/victoria/image3.jpg alt />
                                    </li>
                                    <li>
                                        <img lsrc=../assets/img/content/gallery/riviera/image2.jpg alt />
                                    </li>
                                    <li>
                                        <img lsrc=../assets/img/content/gallery/riviera/image3.jpg alt />
                                    </li>
                                    <li>
                                        <img lsrc=../assets/img/content/gallery/riviera/image4.jpg alt />
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <section id=grid class="grid clearfix mobile-hide">
                            <a class="wow fadeInUp b24-web-form-popup-btn-42" data-path-hover="M 0,0 0,38 90,58 180.5,38 180,0 z" href=assets/img/content/gallery/alfurjan/lg/acacia_large.jpg data-lightbox="Canal views are back" data-title="Candace Acacia by Azizi">
                                <figure>
                                    <img lsrc=../assets/img/content/gallery/alfurjan/acacia_thumb.jpg />
                                    <svg viewBox="0 0 180 500" preserveAspectRatio=none>
                                    <path d="M 0 0 L 0 182 L 90 126.5 L 180 182 L 180 0 L 0 0 z "/>
                                    </svg>
                                    <figcaption>
                                        <span>Candace Acacia by Azizi</span>
                                    </figcaption>
                                </figure>
                            </a>
                            <a class="wow fadeInUp b24-web-form-popup-btn-42" data-path-hover="M 0,0 0,38 90,58 180.5,38 180,0 z" href=assets/img/content/gallery/alfurjan/lg/aster_large.jpg data-lightbox="Canal views are back" data-title="Candace Aster by Azizi">
                                <figure>
                                    <img lsrc=../assets/img/content/gallery/alfurjan/aster_thumb.jpg />
                                    <svg viewBox="0 0 180 500" preserveAspectRatio=none>
                                    <path d="M 0 0 L 0 182 L 90 126.5 L 180 182 L 180 0 L 0 0 z "/>
                                    </svg>
                                    <figcaption>
                                        <span>Candace Aster by Azizi</span>
                                    </figcaption>
                                </figure>
                            </a>
                            <a class="wow fadeInUp b24-web-form-popup-btn-42" data-path-hover="M 0,0 0,38 90,58 180.5,38 180,0 z" href=assets/img/content/gallery/alfurjan/lg/montrell_large.jpg data-lightbox="Canal views are back" data-title="Montrell by Azizi">
                                <figure>
                                    <img lsrc=../assets/img/content/gallery/alfurjan/montrell_thumb.jpg />
                                    <svg viewBox="0 0 180 500" preserveAspectRatio=none>
                                    <path d="M 0 0 L 0 182 L 90 126.5 L 180 182 L 180 0 L 0 0 z "/>
                                    </svg>
                                    <figcaption>
                                        <span>Montrell by Azizi</span>
                                    </figcaption>
                                </figure>
                            </a>
                            <a class="wow fadeInUp b24-web-form-popup-btn-42" data-path-hover="M 0,0 0,38 90,58 180.5,38 180,0 z" href=assets/img/content/gallery/alfurjan/lg/roy-mediterranean_large.jpg data-lightbox="Canal views are back" data-title="Roy Mediterranean by Azizi">
                                <figure>
                                    <img lsrc=../assets/img/content/gallery/alfurjan/roy_thumb.jpg />
                                    <svg viewBox="0 0 180 500" preserveAspectRatio=none>
                                    <path d="M 0 0 L 0 182 L 90 126.5 L 180 182 L 180 0 L 0 0 z "/>
                                    </svg>
                                    <figcaption>
                                        <span>Roy Mediterranean by Azizi</span>
                                    </figcaption>
                                </figure>
                            </a>
                            <a class="wow fadeInUp b24-web-form-popup-btn-42" data-path-hover="M 0,0 0,38 90,58 180.5,38 180,0 z" href=assets/img/content/gallery/alfurjan/lg/royalbay_large.jpg data-lightbox="Canal views are back" data-title="Royal Bay by Azizi">
                                <figure>
                                    <img lsrc=../assets/img/content/gallery/alfurjan/royalbay_thumb.jpg />
                                    <svg viewBox="0 0 180 500" preserveAspectRatio=none>
                                    <path d="M 0 0 L 0 182 L 90 126.5 L 180 182 L 180 0 L 0 0 z "/>
                                    </svg>
                                    <figcaption>
                                        <span>Royal Bay by Azizi</span>
                                    </figcaption>
                                </figure>
                            </a>
                            <a class="wow fadeInUp b24-web-form-popup-btn-42" data-path-hover="M 0,0 0,38 90,58 180.5,38 180,0 z" href=assets/img/content/gallery/alfurjan/lg/tulip_large.jpg data-lightbox="Canal views are back" data-title="Azizi Tulip">
                                <figure>
                                    <img lsrc=../assets/img/content/gallery/alfurjan/tulip_thumb.jpg />
                                    <svg viewBox="0 0 180 500" preserveAspectRatio=none>
                                    <path d="M 0 0 L 0 182 L 90 126.5 L 180 182 L 180 0 L 0 0 z "/>
                                    </svg>
                                    <figcaption>
                                        <span>Azizi Tulip</span>
                                    </figcaption>
                                </figure>
                            </a>
                            <a class="wow fadeInUp b24-web-form-popup-btn-42" data-path-hover="M 0,0 0,38 90,58 180.5,38 180,0 z" href=assets/img/content/gallery/victoria/lg/image1.jpg data-lightbox="Canal views are back" data-title>
                                <figure>
                                    <img lsrc=../assets/img/content/gallery/victoria/image1.jpg />
                                    <svg viewBox="0 0 180 500" preserveAspectRatio=none>
                                    <path d="M 0 0 L 0 182 L 90 126.5 L 180 182 L 180 0 L 0 0 z "/>
                                    </svg>
                                    <figcaption>
                                        <span>Azizi Victoria</span>
                                    </figcaption>
                                </figure>
                            </a>
                            <a class="wow fadeInUp b24-web-form-popup-btn-42" data-path-hover="M 0,0 0,38 90,58 180.5,38 180,0 z" href=assets/img/content/gallery/victoria/lg/image2.jpg data-lightbox="Canal views are back" data-title>
                                <figure>
                                    <img lsrc=../assets/img/content/gallery/victoria/image2.jpg />
                                    <svg viewBox="0 0 180 500" preserveAspectRatio=none>
                                    <path d="M 0 0 L 0 182 L 90 126.5 L 180 182 L 180 0 L 0 0 z "/>
                                    </svg>
                                    <figcaption>
                                        <span>Azizi Victoria</span>
                                    </figcaption>
                                </figure>
                            </a>
                            <a class="wow fadeInUp b24-web-form-popup-btn-42" data-path-hover="M 0,0 0,38 90,58 180.5,38 180,0 z" href=assets/img/content/gallery/victoria/lg/image3.jpg data-lightbox="Canal views are back" data-title>
                                <figure>
                                    <img lsrc=../assets/img/content/gallery/victoria/image3.jpg />
                                    <svg viewBox="0 0 180 500" preserveAspectRatio=none>
                                    <path d="M 0 0 L 0 182 L 90 126.5 L 180 182 L 180 0 L 0 0 z "/>
                                    </svg>
                                    <figcaption>
                                        <span>Azizi Victoria</span>
                                    </figcaption>
                                </figure>
                            </a>
                            <a class="wow fadeInUp b24-web-form-popup-btn-42" data-path-hover="M 0,0 0,38 90,58 180.5,38 180,0 z" href=assets/img/content/gallery/riviera/lg/image2.jpg data-lightbox="Canal views are back" data-title>
                                <figure>
                                    <img lsrc=../assets/img/content/gallery/riviera/image2.jpg />
                                    <svg viewBox="0 0 180 500" preserveAspectRatio=none>
                                    <path d="M 0 0 L 0 182 L 90 126.5 L 180 182 L 180 0 L 0 0 z "/>
                                    </svg>
                                    <figcaption>
                                        <span>Azizi Riviera</span>
                                    </figcaption>
                                </figure>
                            </a>
                            <a class="wow fadeInUp b24-web-form-popup-btn-42" data-path-hover="M 0,0 0,38 90,58 180.5,38 180,0 z" href=assets/img/content/gallery/riviera/lg/image3.jpg data-lightbox="Canal views are back" data-title>
                                <figure>
                                    <img lsrc=../assets/img/content/gallery/riviera/image3.jpg />
                                    <svg viewBox="0 0 180 500" preserveAspectRatio=none>
                                    <path d="M 0 0 L 0 182 L 90 126.5 L 180 182 L 180 0 L 0 0 z "/>
                                    </svg>
                                    <figcaption>
                                        <span>Azizi Riviera</span>
                                    </figcaption>
                                </figure>
                            </a>
                            <a class="wow fadeInUp b24-web-form-popup-btn-42" data-path-hover="M 0,0 0,38 90,58 180.5,38 180,0 z" href=assets/img/content/gallery/riviera/lg/image4.jpg data-lightbox="Canal views are back" data-title>
                                <figure>
                                    <img lsrc=../assets/img/content/gallery/riviera/image4.jpg />
                                    <svg viewBox="0 0 180 500" preserveAspectRatio=none>
                                    <path d="M 0 0 L 0 182 L 90 126.5 L 180 182 L 180 0 L 0 0 z "/>
                                    </svg>
                                    <figcaption>
                                        <span>Azizi Riviera</span>
                                    </figcaption>
                                </figure>
                            </a>
                        </section>
                    </div>
                </div>
                <div class="agent clearfix">
                    <div class=row>
                        <div class="col-sm-12 col-md-6"><div class="agent-img wow fadeInLeft">
                                <div id=map><img lsrc=../map.png alt=Map></div>
                            </div></div>
                        <div class="col-sm-12 col-md-6"><div class="agent-detail wow fadeIn" data-wow-delay=0.5s>
                                <div class="title text-center">
                                    <h2><span class=bold>The hidden</span> gem for investors and buyers.</h2>
                                </div>
                                <div class=facilities-content>
                                    <h3>Community</h3>
                                    <p class=intro>Al Furjan is a vibrant residential development located between Sheikh Zayed Road and Mohammed Bin Zayed Road, adjacent to the Discovery Gardens community and is accessible from Al Yalayis Street and Al Asayel Street. Al Furjan continues to grow in popularity for its great reputation as a strategic location for residential and commercial developments. Residents can find all the amenities desired and enjoy easy access to Dubai’s landmarks. Additionally, with the new metro line ‘Route 2020’ that is currently under construction for Expo 2020, Al Furjan will soon have extensive inroads into greater Dubai.</p>
                                </div>
                            </div></div>
                    </div>
                </div>
            </section>
        </div>
        <footer id=footer class="wrapper clearfix">
            <div class="footer-text wow fadeIn text-center">
                <h1>Want More Information?</h1>
                <p>Let one of our professional property consultants provide you full information tailored to your requirements.</p>
                <a class="button-normal yellow b24-web-form-popup-btn-105" id=open-lead-form data-toggle=modal data-target=#lead-form-model>Register Your Interest!</a>
            </div>
            <div class="footer-copyright wow fadeIn text-center">
                <div class=container>
                    <div class=copyright>
                        <p>Copyright 2018 Azizi Developments. All Right Reserved.</p>
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
                        <iframe src="https://azizidevelopments.com/en/lead-form" class="FMLeadFrm"></iframe>
                    </div>
                </div>
            </div>
        </div>
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
                sessionStorage.setItem("utm_campaign", 'Range Rover');
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