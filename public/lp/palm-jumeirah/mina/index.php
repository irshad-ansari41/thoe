<?php
$page_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
$thank_url = "https://azizidevelopments.com/lp/thank-you-en.html";
$website_url = "https://azizidevelopments.com/en/dubai/palm-jumeirah/azizi-mina";
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
        <title>Azizi Developments - Palm Jumeirah</title>
        <style type=text/css>div.login{border-radius:2px;background-color:#5f84f2;padding:4px 8px;cursor:pointer;display:none}#header .logo img{height:50px}</style>
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
                                    <a href=<?= $page_url ?>><img src="images/logo_Azizi.png" alt></a>
                                </div>
                            </div>
                            <div class="logo col-md-3 col-sm-6 col-xs-6" data-wow-delay=1s>
                                <div class=logo-image>
                                    <a href=<?= $page_url ?>><img src="images/mina-logo.png" alt align=right /></a>
                                </div>
                            </div>
                            <div class="mobile-menu wow fadeInDown" data-wow-delay=1s>
                                <button id=slide-buttons class="icon icon-navicon-round"></button>
                            </div>
                            <nav id=c-menu--slide-right class="c-menu c-menu--slide-right">
                                <button class="c-menu__close icon icon-remove-delete"></button>
                                <ul class=menus-mobile>
                                    <li><a href=<?= $page_url ?>>Home</a></li>
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
                    <div class=container style>
                        <div class=row>
                            <div class=col-md-8>
                                <div class=slider-text>
                                    <h3>Live the dream on Palm Jumeirah</h3>
                                    <br/>
                                    <p>
                                        AED 9,255 monthly mortgage.<BR/>
                                        Secluded beach.       <BR/>                             
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
                                    <h2><span class=bold>The hidden</span> gem for investors and buyers.</h2>
                                </div>
                                <div class=facilities-content>
                                    <h3>Community</h3>
                                    <p class=intro>Mina by Azizi is home to 178 residences divided into one and two-bedroom apartments and penthouses. This beautifully-crafted waterfront development hugs the shores and is caressed by the lapping sea, on the sands of one of the world's most sought-after addresses.</p>
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
                            <h2><span class=bold>Mina by Azizi </span> </h2>
                        </div>

                        <section id=grid class="grid clearfix mobile-hide">
                            <a class="" data-path-hover="M 0,0 0,38 90,58 180.5,38 180,0 z" href="images/gallery/lg/mina-ext-lg-1.jpg" data-fancybox="gallery-1" data-title>
                                <figure>
                                    <img src="images/gallery/mina-ext-1.jpg" />
                                    <svg viewBox="0 0 180 500" preserveAspectRatio=none>
                                    <path d="M 0 0 L 0 182 L 90 126.5 L 180 182 L 180 0 L 0 0 z "/>
                                    </svg>
                                    <figcaption>
                                        <span>Mina by Azizi</span>
                                    </figcaption>
                                </figure>
                            </a>
                            <a class="" data-path-hover="M 0,0 0,38 90,58 180.5,38 180,0 z" href="images/gallery/lg/mina-ext-lg-2.jpg" data-fancybox="gallery-1" data-title>
                                <figure>
                                    <img src="images/gallery/mina-ext-2.jpg" />
                                    <svg viewBox="0 0 180 500" preserveAspectRatio=none>
                                    <path d="M 0 0 L 0 182 L 90 126.5 L 180 182 L 180 0 L 0 0 z "/>
                                    </svg>
                                    <figcaption>
                                        <span>Mina by Azizi</span>
                                    </figcaption>
                                </figure>
                            </a>
                            <a class="" data-path-hover="M 0,0 0,38 90,58 180.5,38 180,0 z" href="images/gallery/lg/mina-ext-lg-3.jpg" data-fancybox="gallery-1" data-title>
                                <figure>
                                    <img src="images/gallery/mina-ext-3.jpg" />
                                    <svg viewBox="0 0 180 500" preserveAspectRatio=none>
                                    <path d="M 0 0 L 0 182 L 90 126.5 L 180 182 L 180 0 L 0 0 z "/>
                                    </svg>
                                    <figcaption>
                                        <span>Mina by Azizi</span>
                                    </figcaption>
                                </figure>
                            </a>
                            <a class="" data-path-hover="M 0,0 0,38 90,58 180.5,38 180,0 z" href="images/gallery/lg/mina-ext-lg-4.jpg" data-fancybox="gallery-1" data-title>
                                <figure>
                                    <img src="images/gallery/mina-ext-4.jpg" />
                                    <svg viewBox="0 0 180 500" preserveAspectRatio=none>
                                    <path d="M 0 0 L 0 182 L 90 126.5 L 180 182 L 180 0 L 0 0 z "/>
                                    </svg>
                                    <figcaption>
                                        <span>Mina by Azizi</span>
                                    </figcaption>
                                </figure>
                            </a>
                            <a class="" data-path-hover="M 0,0 0,38 90,58 180.5,38 180,0 z" href="images/gallery/lg/mina-ext-lg-5.jpg" data-fancybox="gallery-1" data-title>
                                <figure>
                                    <img src="images/gallery/mina-ext-5.jpg" />
                                    <svg viewBox="0 0 180 500" preserveAspectRatio=none>
                                    <path d="M 0 0 L 0 182 L 90 126.5 L 180 182 L 180 0 L 0 0 z "/>
                                    </svg>
                                    <figcaption>
                                        <span>Mina by Azizi</span>
                                    </figcaption>
                                </figure>
                            </a>
                            <a class="" data-path-hover="M 0,0 0,38 90,58 180.5,38 180,0 z" href="images/gallery/lg/mina-ext-lg-6.jpg" data-fancybox="gallery-1" data-title>
                                <figure>
                                    <img src="images/gallery/mina-ext-6.jpg" />
                                    <svg viewBox="0 0 180 500" preserveAspectRatio=none>
                                    <path d="M 0 0 L 0 182 L 90 126.5 L 180 182 L 180 0 L 0 0 z "/>
                                    </svg>
                                    <figcaption>
                                        <span>Mina by Azizi</span>
                                    </figcaption>
                                </figure>
                            </a>
                            <a class="" data-path-hover="M 0,0 0,38 90,58 180.5,38 180,0 z" href="images/gallery/lg/mina-int-lg-1.jpg" data-fancybox="gallery-1" data-title>
                                <figure>
                                    <img src="images/gallery/mina-int-1.jpg" />
                                    <svg viewBox="0 0 180 500" preserveAspectRatio=none>
                                    <path d="M 0 0 L 0 182 L 90 126.5 L 180 182 L 180 0 L 0 0 z "/>
                                    </svg>
                                    <figcaption>
                                        <span>Mina by Azizi</span>
                                    </figcaption>
                                </figure>
                            </a>
                            <a class="" data-path-hover="M 0,0 0,38 90,58 180.5,38 180,0 z" href="images/gallery/lg/mina-int-lg-2.jpg" data-fancybox="gallery-1" data-title>
                                <figure>
                                    <img src="images/gallery/mina-int-2.jpg" />
                                    <svg viewBox="0 0 180 500" preserveAspectRatio=none>
                                    <path d="M 0 0 L 0 182 L 90 126.5 L 180 182 L 180 0 L 0 0 z "/>
                                    </svg>
                                    <figcaption>
                                        <span>Mina by Azizi</span>
                                    </figcaption>
                                </figure>
                            </a>
                            <a class="" data-path-hover="M 0,0 0,38 90,58 180.5,38 180,0 z" href="images/gallery/lg/mina-int-lg-3.jpg" data-fancybox="gallery-1" data-title>
                                <figure>
                                    <img src="images/gallery/mina-int-3.jpg" />
                                    <svg viewBox="0 0 180 500" preserveAspectRatio=none>
                                    <path d="M 0 0 L 0 182 L 90 126.5 L 180 182 L 180 0 L 0 0 z "/>
                                    </svg>
                                    <figcaption>
                                        <span>Mina by Azizi</span>
                                    </figcaption>
                                </figure>
                            </a>
                            <a class="" data-path-hover="M 0,0 0,38 90,58 180.5,38 180,0 z" href="images/gallery/lg/mina-int-lg-4.jpg" data-fancybox="gallery-1" data-title>
                                <figure>
                                    <img src="images/gallery/mina-int-4.jpg" />
                                    <svg viewBox="0 0 180 500" preserveAspectRatio=none>
                                    <path d="M 0 0 L 0 182 L 90 126.5 L 180 182 L 180 0 L 0 0 z "/>
                                    </svg>
                                    <figcaption>
                                        <span>Mina by Azizi</span>
                                    </figcaption>
                                </figure>
                            </a>
                            <a class="" data-path-hover="M 0,0 0,38 90,58 180.5,38 180,0 z" href="images/gallery/lg/mina-int-lg-5.jpg" data-fancybox="gallery-1" data-title>
                                <figure>
                                    <img src="images/gallery/mina-int-5.jpg" />
                                    <svg viewBox="0 0 180 500" preserveAspectRatio=none>
                                    <path d="M 0 0 L 0 182 L 90 126.5 L 180 182 L 180 0 L 0 0 z "/>
                                    </svg>
                                    <figcaption>
                                        <span>Mina by Azizi</span>
                                    </figcaption>
                                </figure>
                            </a>
                            <a class="" data-path-hover="M 0,0 0,38 90,58 180.5,38 180,0 z" href="images/gallery/lg/mina-int-lg-6.jpg" data-fancybox="gallery-1" data-title>
                                <figure>
                                    <img src="images/gallery/mina-int-6.jpg" />
                                    <svg viewBox="0 0 180 500" preserveAspectRatio=none>
                                    <path d="M 0 0 L 0 182 L 90 126.5 L 180 182 L 180 0 L 0 0 z "/>
                                    </svg>
                                    <figcaption>
                                        <span>Mina by Azizi</span>
                                    </figcaption>
                                </figure>
                            </a>
                        </section>
                    </div>
                </div>

            </section>

            <section id=content class="homepage clearfix">
                <div class="gallery wrapper clearfix pbottom">
                    <div class=container-flud>
                        <div class="col-sm-12 col-md-12" style="padding:0;">
                            <div style="width: 100%"><iframe width="100%" height="400" src="https://maps.google.com/maps?width=100%&amp;height=300&amp;hl=en&amp;q=Mina%20By%20Azizi%20-%20Dubai+(Mina%20By%20Azizi%20-%20Dubai)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/create-google-map/">Google Maps iframe generator</a></iframe></div>
                        </div>
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
                        <p>Copyright <?= date('Y'); ?> Azizi Developments. All Right Reserved.</p>
                    </div>
                </div>
            </div>
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
                    sessionStorage.setItem("utm_campaign", 'Palm Jumeirah');
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