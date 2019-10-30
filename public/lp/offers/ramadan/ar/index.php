<?php
$page_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
$thank_url = "https://azizidevelopments.com/lp/thank-you-en.html";
$website_url = "https://azizidevelopments.com/lp/offers/cityscape-abudhabi/index.php";

define('PAGE_URL', 'https://azizidevelopments.com/lp/offers');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Azizi Developments &mdash; Ramadan Offers</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta charset="utf-8">
        <meta name="author" content="">
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

        <!-- Favicons -->
        <link rel="shortcut icon" href="https://azizidevelopments.com/assets/favicon/apple-icon-72x72.png">

        <!-- CSS -->
        <link rel="stylesheet" href="<?= PAGE_URL ?>/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="<?= PAGE_URL ?>/css/style.css"/>
        <link rel="stylesheet" href="<?= PAGE_URL ?>/css/style-responsive.css"/>
        <link rel="stylesheet" href="<?= PAGE_URL ?>/css/animate.min.css"/>
        <link rel="stylesheet" href="<?= PAGE_URL ?>/css/vertical-rhythm.min.css"/>
        <link rel="stylesheet" href="<?= PAGE_URL ?>/css/owl.carousel.css"/>
        <link rel="stylesheet" href="<?= PAGE_URL ?>/css/magnific-popup.css"/>  
        <link rel="stylesheet" href="<?= PAGE_URL ?>/css/custom-style.css"/>  

        <style>
            body{direction: rtl;}
            .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, 
            .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, 
            .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, 
            .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9{float: right}
            .enquire{float: left}
            .inner-nav ul li{float: right;}
            .inner-nav{float: left;}
            .nav-logo-wrap{float: right;}
        </style>
    </head>
    <body class="appear-animate">

        <!-- Page Loader       
        <div class="page-loader">
            <div class="loader">Loading...</div>
        </div>
        <!-- End Page Loader -->

        <!-- Page Wrap -->
        <div class="page" id="top">


            <!-- Navigation panel -->
            <nav class="main-nav js-stick ">
                <div class="full-wrapper relative clearfix CenterMenu">
                    <!-- Logo ( * your text or image into link tag *) -->
                    <div class="nav-logo-wrap local-scroll">
                        <span class="logo">
                            <img src="https://azizidevelopments.com/assets/images/media/Azizi_Developments/images/1512399705728108771.jpg" alt="Azizi Developments" />
                        </span>
                    </div>
                    <div class="mobile-nav">
                        <i class="fa fa-bars"></i>
                    </div>

                    <!-- Main Menu -->
                    <div class="inner-nav desktop-nav">
                        <ul class="clearlist scroll-nav local-scroll">

                            <!-- Item With Sub -->
                            <li><a href="#Azizi-Gives-Back" class="">عزيزي ترد الجميلk</a></li>
                            <li><a href="#zero-down-payment" class="">0% دفعة أولى</a></li>
                            <li><a href="#Azizi-Riviera" class="">عزيزي ريفييرا</a></li>
                            <li><a href="#"  data-toggle="modal" data-target="#lead-form-model" class="active">سجل اهتمامك الأن</a></li>
                            <li><a href="<?= PAGE_URL ?>/ramadan/" class="active">English</a></li>
                            <!-- End Item With Sub -->

                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navigation panel -->


            <!-- Fullwidth Slider -->
            <div class="bg-dark relative" id="home">
                <div class="fullwidth-gallery">

                    <!-- Slide Item -->
                    <section class="home-section bg-scroll bg-dark-alfa-30" data-background="https://azizidevelopments.com/assets/images/home_banners/1556779050.jpg"
                             style="background-position: center center; background-size: cover; height: 100vh;">
                        <div class="js-height-full">
                        </div>
                    </section>
                    <!-- End Slide Item -->

                </div>
                <!-- End Fullwidth Slider -->

                <!-- Header Content -->
                <div class="js-height-full fullwidth-galley-content">
                    <!-- Hero Content -->
                    <div class="home-content container">
                        <div class="home-text local-scroll" id="LeadsFrm">
                            <div class="" style="text-align: left;position: absolute;left: 50px;bottom:100px">
                                <div class="hs-line-6 no-transp font-alt mb-40 mb-xs-20">

                                </div>
                                <div class="hs-line-7 mb-50 mb-xs-30">
                                    <h1 style=" BACKGROUND: rgba(21,88,149,0.8); PADDING: 10PX; ">رمضان عروضنا</h1>
                                </div>                            
                            </div>
                            <div id='stick-form' class="mobileds">
                                <h5><strong>استفسر الآن</strong></h5>
                                <iframe src="https://azizidevelopments.com/ar/lead-form" border="0" scrolling="No"></iframe>                             
                            </div>
                        </div>
                    </div>
                    <!-- End Hero Content -->

                    <!-- Scroll Down -->
                    <!--div class="local-scroll">
                        <a href="#Meydan" class="scroll-down"><i class="fa fa-angle-down scroll-down-icon"></i></a>
                    </div-->
                    <!-- End Scroll Down -->

                </div>
            </div>
            <!-- End Fullwidth Slider -->            


            <!-- Section -->
            <section class="small-section bg-white-lighter" id="Azizi-Gives-Back">
                <div class="container relative">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="blog-item-title font-alt mb-10" >
                                <a href="#" >
                                    <h2 class="title1">عزيزي ترد الجميل</h2>
                                </a>
                            </h3>
                            <!-- Blog Post -->
                            <div class="row" >
                                <div class="col-md-4">
                                    <img class="img-responsive" style="width:150px" src="https://azizidevelopments.com/emailer/ramadan/Ramadan-offers-mailer-dollar.jpg">
                                </div>
                                <div class="col-md-8 mb-30">
                                    <!-- Text Intro -->
                                    <ul style="padding-left: 15px;">
                                        <li style="list-style: circle;">احصل على رسوم خدمة مجانية لمدة 3 سنوات</li>
                                    </ul>
                                    <span>أو</span><br/><br/>
                                    <ul style="padding-left: 15px;">
                                        <li style="list-style: circle;">	احصلوا على سلفة عزيزي بقيمة تصل إلى 20 ألف درهم إماراتي عند شراء شقة استديو</li>
                                        <li style="list-style: circle;">	احصلوا على سلفة عزيزي بقيمة تصل إلى 165 ألف درهم إماراتي عند شراء شقة بغرفة نوم واحدة</li>
                                        <li style="list-style: circle;">	احصلوا على سلفة عزيزي بقيمة تصل إلى 245 ألف درهم عند شراء شقة بغرفتي نوم</li>
                                    </ul>
                                    <br>
                                    <!-- Read More Link -->
                                    <a href="#" data-toggle="modal" data-target="#lead-form-model" class="btn btn-mod btn-round  btn-small enquire" data-campaign="Azizi Gives Back">استفسر الآن <i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                            <!-- End Blog Post -->
                        </div>
                    </div>
                </div>
            </section>
            <!--end Al Furjan Section -->

            <!-- Section -->

            <!-- Section -->
            <section class="small-section bg-gray-lighter" id="zero-down-payment">
                <div class="container relative">
                    <div class="row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-11">
                            <table>
                                <tr valign="middle">
                                    <td style="padding-left: 30px;width: 50%;text-align: left;"><span style="font-size:160px;font-family: tahoma;line-height: 0;">0</span></td>
                                    <td style="padding: 0 0 0 0;text-align: right;">
                                        <div class="span2" style="line-height: 1;"><span style="font-size:50px;font-family: tahoma;">%</span> <span style="font-family: tahoma;">دفعة أولى</span></div>
                                        <div class="span2">&bullet;	خطط دفع شهرية على مدى 48 شهراً </div>
                                        <div class="span2">&bullet;	0% فائدة للأشهر الستة الأولى</div>
                                        <div class="span2">&bullet;	خدمات مجانية لمدة عام كامل</div><br>
                                        <div class="span2">العرض يشمل جميع مشاريع الشركة</div><br/>
                                    </td>
                                </tr>
                            </table>
                            <!-- Read More Link -->
                            <a href="#"  data-toggle="modal" data-target="#lead-form-model" class="btn btn-mod btn-round  btn-small enquire" data-campaign="0% Down Payment">استفسر الآن <i class="fa fa-angle-right"></i></a>

                        </div>
                    </div>
                </div>
            </section>
            <!--end Meydan Section -->

            <!-- Section -->
            <section class="small-section bg-white-lighter" id="Azizi-Riviera">
                <div class="container relative">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="blog-item-title font-alt mb-10" >
                                <a href="#" >
                                    عزيزي ريفييرا
                                </a>
                            </h3>
                            <!-- Blog Post -->
                            <div class="row" >
                                <div class="col-md-4">
                                    <img class="img-responsive" src="https://azizidevelopments.com/emailer/ramadan/Ramadan-offers-mailer_07.jpg">
                                </div>
                                <div class="col-md-8 mb-30">
                                    <!-- Text Intro -->
                                    <div class="span2"><strong>استفيدوا من خطط الدفع الاستثنائية لوحدات المرحلة الأولى من مشروع "عزيزي ريفييرا"</strong></div><br>
                                    <div class="span2">وحدات الاستديو: 40 - 60 </div>
                                    <div class="span2">شقق بغرفة نوم واحدة: 30 - 70 </div>
                                    <div class="span2">شقق بغرفتي نوم: 30 - 70 </div><br/>

                                    <!-- Read More Link -->
                                    <a href="#"  data-toggle="modal" data-target="#lead-form-model" class="btn btn-mod btn-round  btn-small enquire" data-campaign="Azizi Riviera">استفسر الآن <i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                            <!-- End Blog Post -->
                        </div>
                    </div>
                </div>
            </section>
            <!--end Dubai Healthcare City Section -->

            <!-- Foter -->
            <footer class="page-section footer">
                <div class="container">
                    <!-- Footer Text -->
                    <div class="footer-text">
                        <!-- Copyright -->
                        <div class="font-alt">
                            <a href="https://azizidevelopments.com/" >&copy; Azizi Developments 2019</a>.
                        </div>
                        <!-- End Copyright -->
                        <div class="footer-made">
                            <!--Made with love for great people.-->
                        </div>
                    </div>
                    <!-- End Footer Text --> 
                </div>
                <!-- Top Link -->
                <div class="local-scroll">
                    <a href="#top" class="link-to-top"><i class="fa fa-caret-up"></i></a>
                </div>
                <!-- End Top Link -->
            </footer>
            <!-- End Foter -->
        </div>
        <!-- End Page Wrap -->


        <!-- Popup -->
        <div class="modal" id="lead-form-model" role="dialog" >
            <div class="modal-dialog" style="">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close text-white" data-dismiss="modal" style="left:10px;">&times;</button>
                        <h4 class="modal-title text-white">استفسر الآن</h4>
                    </div>
                    <div class="modal-body">
                        <iframe src="https://azizidevelopments.com/ar/lead-form/" border="0" style=""></iframe>
                    </div>
                </div>
            </div>
        </div>
        <!-- End popup -->


        <!-- JS -->
        <script type="text/javascript" src="<?= PAGE_URL ?>/js/jquery-1.11.2.min.js"></script>
        <script type="text/javascript" src="<?= PAGE_URL ?>/js/bootstrap.min.js"></script>        
        <script type="text/javascript" src="<?= PAGE_URL ?>/js/SmoothScroll.js"></script>
        <script type="text/javascript" src="<?= PAGE_URL ?>/js/jquery.scrollTo.min.js"></script>
        <script type="text/javascript" src="<?= PAGE_URL ?>/js/jquery.localScroll.min.js"></script>
        <script type="text/javascript" src="<?= PAGE_URL ?>/js/jquery.viewport.mini.js"></script>
        <script type="text/javascript" src="<?= PAGE_URL ?>/js/jquery.countTo.js"></script>
        <script type="text/javascript" src="<?= PAGE_URL ?>/js/jquery.appear.js"></script>
        <script type="text/javascript" src="<?= PAGE_URL ?>/js/jquery.sticky.js"></script>
        <script type="text/javascript" src="<?= PAGE_URL ?>/js/jquery.parallax-1.1.3.js"></script>
        <script type="text/javascript" src="<?= PAGE_URL ?>/js/jquery.fitvids.js"></script>
        <script type="text/javascript" src="<?= PAGE_URL ?>/js/owl.carousel.min.js"></script>
        <script type="text/javascript" src="<?= PAGE_URL ?>/js/isotope.pkgd.min.js"></script>
        <script type="text/javascript" src="<?= PAGE_URL ?>/js/imagesloaded.pkgd.min.js"></script>
        <script type="text/javascript" src="<?= PAGE_URL ?>/js/jquery.magnific-popup.min.js"></script>
        <script type="text/javascript" src="<?= PAGE_URL ?>/js/wow.min.js"></script>
        <script type="text/javascript" src="<?= PAGE_URL ?>/js/masonry.pkgd.min.js"></script>
        <script type="text/javascript" src="<?= PAGE_URL ?>/js/jquery.simple-text-rotator.min.js"></script>
        <script type="text/javascript" src="<?= PAGE_URL ?>/js/all.js"></script>
        <script type="text/javascript" src="<?= PAGE_URL ?>/js/contact-form.js"></script>
        <script type="text/javascript" src="<?= PAGE_URL ?>/js/jquery.ajaxchimp.min.js"></script>        
        <!--[if lt IE 10]><script type="text/javascript" src="<?= PAGE_URL ?>/js/placeholder.js"></script><![endif]-->
        <script>

            sessionStorage.setItem("utm_source", 'Ramadan Offer');

            sessionStorage.setItem("lead_url", '<?= $page_url ?>');
            sessionStorage.setItem("thank_url", '<?= $thank_url ?>');
            sessionStorage.setItem("website_page_url", '<?= $website_url ?>');


            $('.enquire').click(function () {
                sessionStorage.setItem("utm_campaign", $(this).data('campaign'));
                $('iframe').each(function () {
                    this.contentWindow.location.reload(true);
                });
            });
            sessionStorage.setItem("ips_offers_url", '<?= $website_url ?>');

            $('#first-name,#last-name,#email').on('keyup change', function () {
                if ($('#first-name').val() !== '') {
                    $('#msg-first-name').removeClass('invalid').addClass('valid');
                }
                if ($('#last-name').val() !== '') {
                    $('#msg-last-name').removeClass('invalid').addClass('valid');
                }
                if ($('#email').val() !== '') {
                    $('#msg-email').removeClass('invalid').addClass('valid');
                }

            });

            $('#nl-form').on('submit', function () {

                if ($('#first-name').val() === '') {
                    $('#msg-first-name').addClass('invalid');
                    return false;
                } else if ($('#last-name').val() === '') {
                    $('#msg-last-name').addClass('invalid');
                    return false;
                } else if ($('#email').val() === '') {
                    $('#msg-email').addClass('invalid');
                    return false;
                }

                var formData = $(this).serialize();

                $('.nl-submit').text('Sending...').prop("disabled", true);
                sendMyAjax('https://azizidevelopments.com/en/newsletter/subscribe', formData);
                return false;
            });

            function sendMyAjax(URL_address, formData) {
                $.ajax({
                    type: 'POST',
                    data: formData,
                    url: URL_address,
                    datatype: 'json',
                    success: function (data) {
                        if (data.status === 'success') {
                            $('.nl-submit').text('Sent');
                            $('#nl-form').hide();
                            $('#sub-msg').html(data.msg);
                        } else {
                            $('.nl-submit').text('Subscribe');
                            return false;
                        }
                    }
                });
            }
        </script>
    </body>
</html>
