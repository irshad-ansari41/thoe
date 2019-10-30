<?php
$page_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
$redirect_url = "https://azizidevelopments.com/lp/thank-you-en.html";
$website_page_url = "https://azizidevelopments.com/en/dubai/meydan/riviera";
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
        <title>Retail</title>
        <style type=text/css>
            div.login{border-radius:2px;background-color:#5f84f2;padding:4px 8px;cursor:pointer;display:none}
            #bottom { height: 150px; width: 300px; background-color: green; }
            .slider-text-wrap{background-size: cover!important;background-position:bottom center !important;margin-top: auto;padding-top: 100px;height: 100vh;}
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
                            <div class="logo col-md-12" data-wow-delay=1s>
                                <div class=logo-image>
                                    <a href=https://azizidevelopments.com/lp/meydan/retail/>
                                    <img src="https://azizidevelopments.com/lp/meydan/les-jardins/images/logo_Azizi.png" alt="Azizi Developments">
                                    </a>
                                </div>
                            </div>
                            <!--div class="logo col-md-3" data-wow-delay=1s>
                                <div class=logo-image>
                                    <a href=index.html><img src="https://azizidevelopments.com/lp/meydan/les-jardins/images/logo.png" alt></a>
                                </div>
                            </div-->
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
                                        Coming Soon!<br/>
                                    </h3>
                                    <br/>
                                    <p>
                                        Retail spaces coming very soon<br/>
                                        Multiple units, of various sizes, to suit all needs<br/>
                                        Available in premium locations across Dubai<br/>
                                        Submit form for more information<br/>
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

        </div>
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
                sessionStorage.setItem("utm_campaign", 'Les Jardins');
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
            $(document).ready(function () {
                resizeDiv();
            });

            window.onresize = function (event) {
                resizeDiv();
            };

            function resizeDiv() {
                vpw = $(window).width();
                vph = $(window).height();
                        $(‘.slider - text - wrap’).css({‘height’: vph + ‘px’}
                );
            }

        </script>
    </body>
</html>