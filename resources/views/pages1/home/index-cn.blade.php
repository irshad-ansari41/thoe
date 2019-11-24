

@extends('layouts/home')

@section('header_styles')

@stop

@section('main_div_wrapper')

@stop

@section('section_content')
<!-- Preloader 
<div id="page-preloader">
       <div class="loader-ring"></div>
       <div class="loader-ring2"></div>
</div>
End Preloader -->

<style>
    #page-footer .inner #footer-main,.wide-2 .white{background-color:#ededed}
    #page-footer .inner h3{color:#000;margin:20px 0 13px;font-family:"Open Sans Condensed";font-size:24px !important;}
    #page-footer .inner .contact-us,footer a,footer a:visited,footer li,footer p{font-size:13px;color:#000}
    .txt-white{color:#000}
    .wide-2 .white{margin:0 0 10px;display:table}
    #page-content_home{background:#fff}
    .modal-body .form-group input{padding:5px;width:100%;border:1px solid #e6e6e6;margin-bottom:0}
    .form-group label{font-size:13px;color:#7b7b7b;font-weight:400}
    #footer-main .container{padding:0}
    .navigation .navbar .navbar-nav > li .child-navigation {left: -60px !important;}

    a:hover,a:focus{
        outline: none;
        text-decoration: none;
    }
    .tab .nav-tabs{
        border: none;
        margin-bottom: 0px;
    }
    .tab .nav-tabs li a{
        padding: 10px 20px;
        margin-right: 15px;
        background: #717171;
        font-size: 17px;
        font-weight: 600;
        color: #fff;
        text-transform: uppercase;
        border: none;
        border-left: 0.5px solid #a2a2a2;
        border-top: 0px solid #717171;
        border-bottom: 0px solid #717171;
        border-radius: 0;
        overflow: hidden;
        position: relative;
        transition: all 0.3s ease 0s;

    }
    .tab .nav-tabs li.active a,
    .tab .nav-tabs li a:hover{
        border: none;
        border-top: 0px solid #717171;
        border-bottom: 0px solid #717171;
        background: #fff;
        color: #717171;
    }
    .tab .nav-tabs li a:before{
        content: "";
        border-top: 0px solid #717171;
        border-right: 0px solid transparent;
        border-bottom: 0px solid transparent;
        position: absolute;
        top: 0;
        left: -50%;
        transition: all 0.3s ease 0s;
    }
    .tab .nav-tabs li a:hover:before,
    .tab .nav-tabs li.active a:before{ left: 0; }
    .tab .nav-tabs li a:after{
        content: "";
        border-bottom: 0px solid #717171;
        border-left: 0px solid transparent;
        border-top: 0px solid transparent;
        position: absolute;
        bottom: 0;
        right: -50%;
        transition: all 0.3s ease 0s;
    }
    .tab .nav-tabs li a:hover:after,
    .tab .nav-tabs li.active a:after{ right: 0; }
    .tab .tab-content{
        padding: 20px 30px;
        border-top: 3px solid #384d48;
        border-bottom: 3px solid #384d48;
        font-size: 17px;
        color: #384d48;
        letter-spacing: 1px;
        line-height: 30px;
        position: relative;
    }
    .tab .tab-content:before{
        content: "";
        border-top: 25px solid #384d48;
        border-right: 25px solid transparent;
        border-bottom: 25px solid transparent;
        position: absolute;
        top: 0;
        left: 0;
    }
    .tab .tab-content:after{
        content: "";
        border-bottom: 25px solid #384d48;
        border-left: 25px solid transparent;
        border-top: 25px solid transparent;
        position: absolute;
        bottom: 0;
        right: 0;
    }
    .tab .tab-content h3{
        font-size: 24px;
        margin-top: 0;
    }

    .container{margin:0 auto!important;max-width:1280px!important;width:100%!important}
    .pointer{cursor: pointer}
    .Smsgbox{left: 100px;}


    @media screen and (min-width: 1024px){ 
        .bigSlide{display: block;height: 100vh;}
        .smallSlide{display: none!important;}
    }

    @media only screen and (min-width: 993px) {
        .container{width:100%!important}
        .navigation .navbar .navbar-nav > li .child-navigation { left: 0px !important; }
    }

    @media screen and (max-width: 1024px) {
        .CSlider{background-size: cover;}
        .home_2 a{font-size:10px;width:98px}
        .navigation .navbar .navbar-nav > li .child-navigation { left: 0px !important; }
        .bigSlide{display: none!important;}
    }


    @media screen and (min-width: 769px) {
        .btn-half-wth{width:50%;padding-right:0;top:35px}
        .home_2 .title{background-color:rgba(13, 55, 101, 0.65);padding:15px;bottom:0!important;position:absolute!important;left:0!important;margin:0!important}
        .wide-2 .item-price .btn-small{font-size:14px;padding:9px 0!important;margin-top:-3rem}
        .navigation .navbar .navbar-nav > li .child-navigation { left: 0px !important; }
        .home_2 h1{font-size:21px !important; font-weight: bold !important; color:#fff;}
        .vsmall{font-size:13.5px !important; line-height: 1.5; font-weight: 300; color:#fff;}
        .vsmall b{ font-size: 18px !important; font-weight: bold !important; color:#fff !important;}
        .explore {
            /*margin-top: 100px !important;*/
        }        
        .explore h1{ 
            margin-top: 50px; margin-bottom: 0; text-align: center;
            font-size: 36px; font-weight: 400; color: #4c4c4c;            
        }

    }
    @media screen and (min-width:  769px){
        .MobileDs{display: none;}
    }    
    @media screen and (max-width: 768px)
    {
        .navigation .navbar .site-header .mob-menu{width: 100%;}

        .navbar{
            background-color: rgb(8, 68, 115);
        }
        .home_2{
            top:0; height: auto !important; 
            background:#fff !important;
        }
        .home_2 .container{ 
            width: 100% !important;
        }
        .container{ 
            position: relative;
        }
        .Smsgbox{ 
            left:0!important; 
            position:relative !important; 
            bottom:0px; padding: 0px;
        }
        .home_2 h1{
            font-size:16px !important; 
            font-weight: bold !important; 
            color:#fff;
        }
        .home_2 .filter{display: none}
        .vsmall{
            font-size:13.5px !important; 
            line-height: 1.5; 
            font-weight: 300;
        }
        .vsmall ,h2 { margin-top: 7px !important;}
        .vsmall b{ font-size: 18px !important; font-weight: bold !important; color:#fff !important;}
        .home_2 a{ 
            display:none; 
            font-size: 10px !important; 
            width: 100px !important; 
            height: 30px !important; 
            line-height: 6px!important; 
            padding: 10px !important;
        }
        .home_2 .title{ 
            width:100%; 
            padding:0 15px !important; 
            background-color: rgb(13, 55, 101) !important; 
            color:#fff;
        }
        .owl-carousel .fa-chevron-right, .owl-carousel .fa-chevron-left{ 
            font-size: 20px !important; 
            top:40% !important; 
            bottom:0px !important; 
            padding:0 0px !important; 
        }
        .owl-carousel .fa-chevron-left{
            left:85% !important;
        }
        .MobileDs{ 
            position: relative; 
            background-color:rgb(113, 113, 113); 
            width:100%; 
        }
        .nav-tabs>li{ 
            float: none;  
        }
        .tab .nav-tabs li a{ 
            padding: 12px 0px !important; 
            margin: 0; 
            width: 33.33% !important; 
            float: left; 
            text-align: center; 
            font-size: 12px !important;
        }
        .navigation .navbar .navbar-brand img { 
            margin: 2px 0px 0px -18px; 
        }
        .home_2 .owl-carousel{ 
            position: relative !important;
        }
        .owl-carousel .fa-chevron-right {
            right: 3% !important;
        }
        .owl-carousel .fa-chevron-left {
            left: 3% !important;
        }

        .navigation .navbar .navbar-brand {
            padding: 10px 0 10px 15px;
        }
        .explore {
            margin-top: 20px;
        }        
        /* New Style for Slider End */

        .home_2 .head-title-2 h1{font-size:21px}
        .home_2 .head-title-2 h4{font-size:12px}
        .navigation .navbar .navbar-nav > li .child-navigation { left: 0px !important; }
        .navigation .navbar .site-header .mob-menu a.drop-close {
            top: 15px;
            position: absolute;
            padding: 0!important;
            margin: 0!important;
            right: 100px;
        }
        .explore h1{ 
            margin-top: 50px; margin-bottom: 0; text-align: center;
            font-size: 28px; font-weight: 400; color: #4c4c4c;            
        }

    }

    .mob-menu .img1 {
        max-width: 100px;
        margin-top: -25px;
        margin-left: 15px;
    }
    .mob-menu .bb2 {
        border-bottom: 1px solid #f3f3f3;
        background: #ddd;
        margin: 15px auto;
        padding: 7px 0 7px 30px;
        text-align: left;
    }
    .mob-menu .bb2 a{color: #000;font-weight: 700;}

</style>


<!-- Wrapper -->
<div class="wrapper">
    <!-- Start Header -->
    <div id="header" class="menu-wht"></div>
    <!-- End Header -->

    <!-- Page Content -->
    <div id="page-content_home">
        <div class="home_2">
            <div id="owl-demo-header" class="owl-carousel owl-theme carousel-full-width">
                @foreach ($sliders as $slider)
                <div class="item">
                    <span class="filter"></span>

                    <div class="MobileDs">

                        <div class="tab" role="tabpanel">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <?php
                                $explore_Link = preg_replace('/\s+/', '', $slider->explore_link);
                                if ($explore_Link != "") {
                                    if ($slider->explore_button_option == "1") {
                                        $slider_explore_Link = $slider->explore_link;
                                        ?>
                                        <li role="presentation" class="">
                                            <a href="{!! trim($slider_explore_Link) !!}" class="btn btn-default btn-small">
                                                <?= trans('words.explore_more') ?>
                                            </a>
                                        </li>
                                        <?php
                                    }
                                }
                                ?> 

                                <?php if ($slider->inquire_button_option == "1") { ?>
                                    <li role="presentation" class="">
                                        <a aria-controls="home1"  data-toggle="modal"  data-target="#lead-form-model" class="btn btn-default btn-small pointer">
                                            <?= trans('words.inquire_now') ?>
                                        </a>
                                    </li>
                                <?php } ?>

                                <li role="presentation" class="">
                                    <a aria-controls="home2" href="tel:80029494" >800 AZIZI</a>
                                </li>

                            </ul>
                        </div>	
                        <!-- Tab panes -->
                    </div>

                    <img class="smallSlide"  src="<?= asset("assets/images/100-blank-img.jpg") ?>"  data-src="<?= asset("assets/images/home_banners/" . $slider->banner_image) ?>" alt="{{ $slider->banner_title_ch }}" >
                    <div class="bigSlide"  data-original="<?= asset("assets/images/home_banners/" . $slider->banner_image) ?>"></div>

                    <div class="container Smsgbox">
                        <?php
                        $banner_Title = preg_replace('/\s+/', '', $slider->banner_title_ch);
                        if ($banner_Title != "") {
                            ?>
                            <div class="title col-lg-6  col-md-6 col-sm-8 col-xs-9">
                                <h2 class="vsmall" style="margin-bottom:7px !important;"><b><?= $slider->banner_title_ch ?></b></h2>
                                <?= $slider->banner_short_description_ch ?>
                                <?php
                                $explore_Link = preg_replace('/\s+/', '', $slider->explore_link);
                                if ($explore_Link != "") {
                                    if ($slider->explore_button_option == "1") {
                                        $slider_explore_Link = $slider->explore_link;
                                        ?>
                                        <span class="ffs-bs"><a href="{!! trim($slider_explore_Link) !!}" class="btn btn-default btn-small"><?= trans('words.explore_more') ?></a></span>
                                        <?php
                                    }
                                }
                                ?>
                                <?php if ($slider->inquire_button_option == "1") { ?>
                                    <span class="ffs-bs"><a data-toggle="modal"  data-target="#lead-form-model" class="btn btn-default btn-small pointer">
                                            <?= trans('words.inquire_now') ?></a></span>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>                    
                </div>
                @endforeach

            </div>
        </div>
        <div class="container ">
            <div class="explore">                
                <h1>了解更多我们的项目</h1>
                <h5>
                    <i class="fa fa-map-marker"></i>
                    迪拜，阿拉伯联合酋长国                    
                </h5>
            </div>
            <div class="row">
                <?php
                $i = 1;
                foreach ($bannersliders as $bannerslider) {
                    //if ($i == 1 || $i == count($bannersliders) || $i == 4) {
                    if ($i == 1 || $i == count($bannersliders) + 1 || $i == 9) {
                        echo '<div class="col-md-8">';
                    } else {
                        echo '<div class="col-md-4 col-sm-6">';
                    }
                    $link = str_replace("{lang}", $locale, $bannerslider->explore_link);
                    ?>
                    <a href="<?php echo $link; ?>"> 
                        <div class="exp-img" data-original="<?= asset("assets/images/home_banners/{$bannerslider->banner_image}") ?>">
                            <span class="filter"></span>
                            <div class="img-info">
                                <h3>
                                    <?= $bannerslider->banner_title_ch ?>
                                </h3>
                                <!-- <h6><?= $bannerslider->banner_short_description_en ?></h6> -->
                                <span class="ffs-bs btn btn-small btn-primary"> <?= trans('words.explore_more') ?></span>
                            </div>
                        </div>
                    </a>
                </div>
                <?php
                $i++;
            }
            ?>

        </div>

    </div>
    <!-- end container -->
    <div class="wide-2">

        <div class="container">
            @if(!empty(count($events)))
            <div class="explore">
                <h2>即将举办的项目推介会</h2>
                <h5 class="team-color">我们在迪拜和世界范围即将举办的项目推介会</h5>                
            </div>

            @foreach($events as $event)
            <div class="row white sales-event" style="width: 100%;">
                <div class="col-md-3 col-sm-3 prp-img">
                    <a href="<?= url("/$locale/events/$event->slug_cn") ?>">
                        <div class="exp-img-2" data-original="<?= url('/') . "/assets/images/events/" . $event->event_photo_cn ?>;">
                            <span class="filter"></span>
                            <span class="ffs-bs"><label  class="btn btn-small btn-primary"> <?= trans('words.view_more') ?></label>
                            </span>
                            <div class="overlay">
                                <div class="img-counter hidden">23 Photo</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="item-info col-lg-7 col-md-6 col-sm-6">
                    <a href="<?= url("/$locale/events/$event->slug_cn") ?>"><h4>
                            <?= $event->event_title_cn ?>
                        </h4></a>
                    <p class="team-color">
                        <?php
                        $date = $event->event_date;
                        $Month = date("F", strtotime($date));
                        $Day = date("d", strtotime($date));
                        $Year = date("Y", strtotime($date));

                        //echo "<br>--------------------------";
                        $months = array(
                            "Jan" => "1月",
                            "Feb" => "2月",
                            "Mar" => "3月",
                            "Apr" => "4月",
                            "May" => "5月",
                            "Jun" => "6月",
                            "Jul" => "7月",
                            "Aug" => "8月",
                            "Sep" => "9月",
                            "Oct" => "10月",
                            "Nov" => "11月",
                            "Dec" => "12月"
                        );
                        //$your_date = "2012-12-25"; // for example
                        $en_month = date("M", strtotime($date));
                        $ar_month = $months[$en_month];
                        $en_month . " = " . $ar_month;

                        echo $Year . " 年 " . $ar_month . " " . $Day . " 日 ";
                        ?>
                    </p>
                    <p>
                        <?php
                        if (!empty($event->extra_desc_cn)) {
                            str_limit($event->extra_desc_cn, 190);
                        }
                        ?>
                    </p>
                    <div class="block">
                        <div class="col-md-3 col-sm-3 col-xs-3 cat-img">
                            <p class="info-line"><?= $event->event_location_cn ?></p>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3 cat-img">
                            <p class="info-line"><?= $event->event_place_cn ?></p>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3 cat-img">
                            <p class="info-line">
                                <?php echo $Year . " 年 " . $ar_month . " " . $Day . " 日 ";
                                ?>
                            </p>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3 cat-img">
                            <p class="info-line"><?= $event->event_start_time ?> - <?= $event->event_end_time ?></p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-3 line"></div>
                    <div class="col-md-3 col-sm-3 col-xs-3 line"></div>
                    <div class="col-md-3 col-sm-3 col-xs-3 line"></div>
                    <div class="col-md-3 col-sm-3 col-xs-3 line"></div>
                    <hr>
                </div>
                <div class="item-price col-lg-2 col-md-3 col-sm-3 col-xs-12">
                    <div class="sum col-sm-12 col-xs-6">
                        <p class="team-color"> <?= trans('words.explore_more') ?></p>
                        <!--p><?= $event->currency_type ?> <?= $event->starting_from ?></p-->
                        <?php if (!empty($event->starting_from)) { ?><p><?= trans('words.aed') ?> <?= $event->starting_from ?></p><?php } ?>
                    </div>
                    <span class="ffs-bs col-xs-12 btn-half-wth1">
                        <a data-toggle="modal" data-target="#lead-form-model" class="btn btn-blue btn-small pointer" style="margin:0 0 10px;"><?= trans('words.RSVP NOW') ?> <i class="fa fa-caret-right"></i></a>
                        <a href="<?= url("/$locale/events/$event->slug_cn") ?>" class="btn btn-blue btn-small pointer" style="margin:0 0 10px;"><?= trans('words.view_more') ?> <i class="fa fa-caret-right"></i></a>
                    </span>

                </div>
            </div>
            @endforeach

            <span class="ffs-bs bottom">
                <a href="<?= url("/$locale/events") ?>" class="btn btn-blue btn-large"> 
                    <?= trans('words.explore_more') ?>
                </a>
            </span>

        </div>
        @endif
    </div>	
    <!-- end wide-2 -->

</div>
<!-- end Page Content -->

<!-- Start Footer -->
<div id="footer"></div>

<!-- End Footer -->
</div>


<!-- Modal login, register, custom gallery -->
<div id="login-modal-open"></div>
<div id="register-modal-open"></div>
<div class="custom-galery">
    <input type="checkbox" class="gal" id="op">
    <div class="lower"></div>
    <div class="overlay overlay-hugeinc">
        <label for="op"></label>
        <nav>
            <!-- Owl carousel -->
            <div class="owl-carousel owl-theme carousel-full-width owl-demo-3">
                <div class="item" style="background-image: url(https://placehold.it/950X800);"></div>
                <div class="item" style="background-image: url(https://placehold.it/800X650);"></div>
            </div>
            <!-- End Owl carousel -->
        </nav>
    </div>
</div>
<!-- End Modal login, register, custom gallery -->
<!--<div id="cityscapepop"></div>--> 
@stop

@section('footer_main_scripts')


@stop

@section('footer_scripts')


<script type="text/javascript">
    $(document).ready(function () {
        console.log('ready............');
        setTimeout(function () {

            //  Smooth Navigation Scrolling
            $('a[href^="#"].roll').on('click', function (e) {
                e.preventDefault();
                var target = this.hash,
                        $target = $(target);
                if ($(window).width() > 768) {
                    $('html, body').stop().animate({
                        'scrollTop': $target.offset().top - $('.navigation').height()
                    }, 2000);
                } else {
                    $('html, body').stop().animate({
                        'scrollTop': $target.offset().top
                    }, 2000);
                }
            });


            // Menu Button
            $('.navbar a.drop-left, .navbar a.drop-close').on('click', function (e) {
                //pressing more first time
                if ($('.start').length > 0) {
                    $('.primary.main-menu').removeClass("start");
                    $('.primary.main-menu>ul').addClass("smooth");
                    $('.drop-close, .secondary.main-menu>ul').addClass("hidden");
                }
                //pressing close
                if ($('.drop-left').hasClass("hidden")) {
                    $('.secondary.main-menu').addClass("open");
                    $('.secondary.open li').css('opacity', '1');
                    $('.blog-nv .secondary>ul, .blog-mn .secondary>ul').removeClass("hidden");
                    $('.secondary.main-menu>ul').removeClass("smooth");
                    setTimeout(function () {
                        $('.secondary.main-menu').addClass("smooth-remove");
                    }, 100);
                    setTimeout(function () {
                        $('.secondary.main-menu').removeClass("open smooth-remove");
                    }, 500);
                    setTimeout(function () {
                        $('.drop-left, .primary.main-menu>ul').removeClass("hidden");
                        $('.drop-close, .secondary.main-menu>ul').addClass("hidden");
                    }, 600);
                    setTimeout(function () {
                        $('.primary.main-menu>ul').addClass("smooth");
                    }, 620);
                }
                //pressing more
                else {
                    $('.primary.main-menu, .drop-left').addClass("smooth-remove");
                    $('.secondary.open li').css('opacity', '0');
                    setTimeout(function () {
                        $('.drop-left, .primary.main-menu>ul').addClass("hidden");
                        $('.drop-close, .secondary.main-menu>ul').removeClass("hidden");
                        $('.primary.main-menu').removeClass("smooth-remove");
                        $('.drop-left').removeClass("smooth-remove");
                        $('.primary.main-menu>ul').removeClass("smooth");
                    }, 300);
                    $('.blog-nv .secondary>ul, .blog-mn .secondary>ul').removeClass("hidden");
                    setTimeout(function () {
                        $('.secondary.main-menu>ul').addClass("smooth");
                    }, 350);
                }
            });
            $('.wrapper').on('click', function (e) {
                if ($('.secondary').hasClass("open")) {
                    $('.drop-left, .primary.main-menu>ul').removeClass("hidden");
                    $('.drop-close, .secondary.main-menu>ul').addClass("hidden");
                    setTimeout(function () {
                        $('.primary.main-menu>ul').addClass("smooth");
                        $('.drop-close, .secondary.main-menu>ul').removeClass("smooth");
                    }, 100);
                }
            });


            $('.active.has-child .menusub').removeAttr("href");

            $('.navigation .site-header .mob-menu li.has-child>a').click(function () {
                event.preventDefault();
                var $t = $(this).parent();
                if (!($t).hasClass("opened")) {
                    $('.mob-menu .child-navigation').slideUp("fast");
                    $('.mob-menu .child-navigation').parent().removeClass("opened");
                    $($t).addClass("opened");
                    $($t).children('.mob-menu .child-navigation').slideToggle("fast");
                } else {
                    $('.mob-menu .child-navigation').slideUp("fast");
                    $('.mob-menu .child-navigation').parent().removeClass("opened");
                }
            });

        }, 1000);

        var url = new URL('<?= Request::fullurl() ?>');
        var source = url.searchParams.get("utm_source");
        var campaign = url.searchParams.get("utm_campaign");

        if (source !== '' && source !== null) {
            sessionStorage.setItem("utm_source", capitalize(source.replace("-", " ")));
        }
        if (campaign !== '' && campaign !== null) {
            sessionStorage.setItem("utm_campaign", capitalize(campaign.replace("-", " ")));
        }

        sessionStorage.setItem("lead_url", '<?= Request::fullurl() ?>');
        sessionStorage.setItem("thank_url", '<?= url("{$locale}/thank-you") ?>');
        sessionStorage.setItem("website_page_url", '<?= url("{$locale}") ?>');

        function capitalize(str) {
            strVal = '';
            str = str.split(' ');
            for (var chr = 0; chr < str.length; chr++) {
                strVal += str[chr].substring(0, 1).toUpperCase() + str[chr].substring(1, str[chr].length) + ' ';
            }
            return strVal;
        }

    });

    //$("#cityscapepop").load("<?= url('cityscapepop') ?>");



</script>
@stop