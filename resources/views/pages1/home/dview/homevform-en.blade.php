
@extends('layouts/ldview/homevform')

@section('header_styles')
<style>
    .info-line{letter-spacing: -1px; word-spacing: 2px;}
    #page-footer .inner #footer-main,.wide-2 .white{background-color:#ededed}
    #page-footer .inner h3{color:#000;margin:20px 0 13px;font-family:"Open Sans Condensed";font-size:20px!important}
    #page-footer .inner .contact-us,footer a,footer a:visited,footer li,footer p{font-size:13px;color:#000}
    .txt-white{color:#000}
    .wide-2 .white{margin:0 0 10px;display:table}
    #page-content_home{background:#fff}
    .modal-body .form-group input{padding:5px;width:100%;border:1px solid #e6e6e6;margin-bottom:0}
    .form-group label{font-size:13px;color:#7b7b7b;font-weight:400}
    #footer-main .container{padding:0}
    .navigation .navbar .navbar-nav > li .child-navigation{left:-60px!important}
    a:hover,a:focus{outline:none;text-decoration:none}
    .tab .nav-tabs{border:none;margin-bottom:0}
    .tab .nav-tabs li a{padding:10px 20px;margin-right:15px;background:#717171;font-size:17px;font-weight:600;color:#fff;text-transform:uppercase;border:none;border-left:.5px solid #a2a2a2;border-top:0 solid #717171;border-bottom:0 solid #717171;border-radius:0;overflow:hidden;position:relative;transition:all .3s ease 0}
    .tab .nav-tabs li.active a,.tab .nav-tabs li a:hover{border:none;border-top:0 solid #717171;border-bottom:0 solid #717171;background:#fff;color:#717171}
    .tab .nav-tabs li a:before{content:"";border-top:0 solid #717171;border-right:0 solid transparent;border-bottom:0 solid transparent;position:absolute;top:0;left:-50%;transition:all .3s ease 0}
    .tab .nav-tabs li a:hover:before,.tab .nav-tabs li.active a:before{left:0}
    .tab .nav-tabs li a:after{content:"";border-bottom:0 solid #717171;border-left:0 solid transparent;border-top:0 solid transparent;position:absolute;bottom:0;right:-50%;transition:all .3s ease 0}
    .tab .nav-tabs li a:hover:after,.tab .nav-tabs li.active a:after{right:0}
    .tab .tab-content{padding:20px 30px;border-top:3px solid #384d48;border-bottom:3px solid #384d48;font-size:17px;color:#384d48;letter-spacing:1px;line-height:30px;position:relative}
    .tab .tab-content:before{content:"";border-top:25px solid #384d48;border-right:25px solid transparent;border-bottom:25px solid transparent;position:absolute;top:0;left:0}
    .tab .tab-content:after{content:"";border-bottom:25px solid #384d48;border-left:25px solid transparent;border-top:25px solid transparent;position:absolute;bottom:0;right:0}
    .tab .tab-content h3{font-size:24px;margin-top:0}
    .container{margin:0 auto!important;max-width:1280px!important;width:100%!important}
    .pointer{cursor:pointer}
    .Smsgbox{left:100px}
    .row{margin: 0 auto !important;}
    .mob-menu .img1 {
        max-width: 125px;
        margin-top: -25px;
        margin-right: 15px;
    }
    .mob-menu .bb2 {
        border-bottom: 1px solid #f3f3f3;
        background: #ddd;
        /*margin: 15px auto;*/
        margin-top:10px;
        padding: 7px 0px 4px 0px;
        text-align: center;
    }
    .mob-menu .bb2 a{color: #000;font-weight: 800; padding:0 16px; font-size: 13.5px;}
    #stick-form{/*background:rgba(21, 88, 149, 0.8) !important;*/ background:rgba(0, 0, 0, 0.52) !important; height: 345px;padding: 10px 0px;border:2px solid #dadada;position: absolute;right: 35px;top:35px}
    .text-center{height: auto !important;}

    .MyHead h2 {
        /*
        color: #000;
        font-size: 26px;
        text-transform: uppercase;
        font-weight: 400;
        */

        text-align: center;
        position: relative;
        margin: 30px 0 70px;
    }
    .MyHead h2::after {
        content: "";
        width: 100px;
        position: absolute;
        margin: 0 auto;
        height: 4px;
        border-radius: 1px;
        /*background: #1a619a;*/
        left: 0;
        right: 0;
        bottom: -20px;
    }
    .MyHead .carousel {
        margin: 50px auto;
        padding: 0 70px;
        /*padding:0;*/
    }
    .MyHead .carousel .item {
        color: #999;
        overflow: hidden;
        min-height: 120px;
        font-size: 13px;
    }
    .MyHead .carousel .media img {
        width: 80px;
        height: 80px;
        display: block;
        border-radius: 50%;
    }
    .MyHead .carousel .testimonial {
        padding: 0 15px 0 60px ;
        position: relative;
    }
    .MyHead .carousel .testimonial::before {
        content: '\93';
        color: #e2e2e2;
        font-weight: bold;
        font-size: 68px;
        line-height: 54px;
        position: absolute;
        left: 15px;
        top: 0;
    }
    .MyHead .carousel .overview b {
        text-transform: uppercase;
        color: #1a619a;
    }
    .MyHead .carousel .carousel-indicators {
        bottom: -40px;
    }
    .MyHead .carousel-indicators li, .carousel-indicators li.active {
        width: 18px;
        height: 18px;
        border-radius: 50%;
        margin: 1px 3px;
    }
    .MyHead .carousel-indicators li {	
        background: #e2e2e2;
        border: 4px solid #fff;
    }
    .MyHead .carousel-indicators li.active {
        color: #fff;
        background: #1a619a;    
        border: 5px double;    
    }    
    .MyHead .mr-3{ float:left;}

    .MyTicker{
        position: absolute; bottom: 0%; /*background: rgba(21, 88, 149, 0.8) !important;*/ background: rgba(0, 0, 0, 0.52) !important; z-index: 9999; 
        width: 352px; right: 4%; height: 83px;    
    }
    .MyTicker h2 {
        /* color: #333; text-transform: uppercase; font-weight: bold; */
        text-align: center;
        position: relative;
        margin: 35px 0 60px !important;
    }
    .MyTicker h2::after {
        content: "";
        width: 100px;
        position: absolute;
        margin: 0 auto;
        height: 3px;
        /*background: #1a619a;*/
        left: 0;
        right: 0;
        bottom: -10px;
    }
    .MyTicker .col-center {
        margin: 0 auto;
        float: none !important;
        height:100%;
    }
    .MyTicker .carousel {
        height: 83px;
        /*
        margin: 50px auto;
        padding: 0 70px;
        padding:30px auto;
        */
    }
    .MyTicker .carousel .item {
        color: #999;
        font-size: 14px;
        text-align: center;
        overflow: hidden;
        min-height: 83px;
    }
    .MyTicker .carousel .item .img-box {
        width: 135px;
        height: 135px;
        margin: 0 auto;
        padding: 5px;
        border: 1px solid #ddd;
        border-radius: 50%;
    }
    .MyTicker .carousel .img-box img {
        width: 100%;
        height: 100%;
        display: block;
        border-radius: 50%;
    }
    .MyTicker .carousel .testimonial {
        padding: 7px 0px; color:#fff; margin:0;
    }
    .MyTicker .carousel .overview {	
        font-style: italic; padding:0px; color: #fff; margin:0;
    }
    .MyTicker .carousel .overview b {
        text-transform: uppercase; color: #fff;
    }
    .MyTicker .carousel .carousel-control {
        width: 40px;
        height: 40px;
        margin-top: -20px;
        top: 90%;
        background: none;
    }
    .MyTicker .carousel-control i {
        font-size: 40px;
        line-height: 42px;
        position: absolute;
        display: inline-block;
        color: rgba(0, 0, 0, 0.8);
        text-shadow: 0 3px 3px #e6e6e6, 0 0 0 #000;
    }
    .MyTicker .carousel .carousel-indicators {
        bottom: -40px;
    }
    .MyTicker .carousel-indicators li, .carousel-indicators li.active {
        width: 18px;
        height: 18px;
        margin: 1px 3px;
        border-radius: 50%;
    }
    .MyTicker .carousel-indicators li {	
        background: #999;
        border-color: transparent;
        box-shadow: inset 0 2px 1px rgba(0,0,0,0.2);
    }
    .MyTicker .carousel-indicators li.active {	
        background: #1a619a;		
        box-shadow: inset 0 2px 1px rgba(0,0,0,0.2);
    }  
    /*MyTicker End*/

    @media screen and (min-width: 1025px) {
        .bigSlide{display:block;height:100vh}
        .smallSlide{display:none!important}
        .secondary .main-menu{display:none}
    }
    @media only screen and (min-width: 993px) {
        .container{width:100%!important}
        .navigation .navbar .navbar-nav > li .child-navigation{left:0!important}
    }
    @media screen and (min-width: 769px) {
        .btn-half-wth{width:50%;padding-right:0;top:35px}
        .home_2 .title{/*background-color:rgba(13,55,101,0.65);8*/ background-color:rgba(0, 0, 0, 0.52); padding:15px;bottom:0!important;position:absolute!important;left:0!important;margin:0!important}
        .wide-2 .item-price .btn-small{font-size:14px;padding:9px 0!important;margin-top:-3rem}
        .navigation .navbar .navbar-nav > li .child-navigation{left:0!important}
        .home_2 h1{font-size:16px!important;font-weight:700!important;color:#fff}
        .vsmall{font-size:13.5px!important;line-height:1.5;font-weight:300;color:#fff}
        .vsmall b{font-size:18px!important;font-weight:700!important;color:#fff!important}
        .explore h1{margin-top:-100px;margin-bottom:0;text-align:center;font-size:36px;font-weight:400;color:#4c4c4c}
    }
    @media screen and (max-width: 1024px) {
        .MTicker{ bottom:-21% !important;}
        .CSlider{background-size:cover}
        .home_2 a{font-size:10px;width:98px}
        .navigation .navbar .navbar-nav > li .child-navigation{left:0!important}
        .bigSlide{display:none!important}
        .navigation .navbar .icon-bar{left:50px!important;width:20px!important}
        .navigation .navbar .icon-bar:nth-child(2){left:50px!important;width:20px!important}
        .navigation .navbar .icon-bar:nth-child(3){left:50px!important;width:20px!important}
        .primary .start .main-menu{display:none}
        .master-logo{margin:0 0 0 10px !important}
        .explore h1{margin-top:50px}
        .MyHead h2 {
            /*
            color: #000;
            font-size: 26px;
            text-transform: uppercase;
            font-weight: 400;
            */

            text-align: center;
            position: relative;
            margin: 30px 0 70px;
        }
        .MyHead h2::after {
            content: "";
            width: 100px;
            position: absolute;
            margin: 0 auto;
            height: 4px;
            border-radius: 1px;
            /*background: #1a619a;*/
            left: 0;
            right: 0;
            bottom: -20px;
        }
        .MyHead .carousel {
            margin: 50px auto;
            padding: 0 70px;
            /*padding:0;*/
        }
        .MyHead .carousel .item {
            color: #999;
            overflow: hidden;
            min-height: 120px;
            font-size: 13px;
        }
        .MyHead .carousel .media img {
            width: 80px;
            height: 80px;
            display: block;
            border-radius: 50%;
        }
        .MyHead .carousel .testimonial {
            padding: 0 15px 0 60px ;
            position: relative;
        }
        .MyHead .carousel .testimonial::before {
            content: '\93';
            color: #e2e2e2;
            font-weight: bold;
            font-size: 68px;
            line-height: 54px;
            position: absolute;
            left: 15px;
            top: 0;
        }
        .MyHead .carousel .overview b {
            text-transform: uppercase;
            color: #1a619a;
        }
        .MyHead .carousel .carousel-indicators {
            bottom: -40px;
        }
        .MyHead .carousel-indicators li, .carousel-indicators li.active {
            width: 18px;
            height: 18px;
            border-radius: 50%;
            margin: 1px 3px;
        }
        .MyHead .carousel-indicators li {	
            background: #e2e2e2;
            border: 4px solid #fff;
        }
        .MyHead .carousel-indicators li.active {
            color: #fff;
            background: #1a619a;    
            border: 5px double;    
        }    
        .MyHead .mr-3{ float:left;}

        .MyTicker{
            position: absolute; bottom: 0%; /*background: rgba(21, 88, 149, 0.8) !important;*/ background: rgba(0, 0, 0, 0.52) !important; z-index: 9999; 
            width: 352px; right: 4%; height: 83px;    
        }
        .MyTicker h2 {
            /* color: #333; text-transform: uppercase; font-weight: bold; */
            text-align: center;
            position: relative;
            margin: 35px 0 60px !important;
        }
        .MyTicker h2::after {
            content: "";
            width: 100px;
            position: absolute;
            margin: 0 auto;
            height: 3px;
            /*background: #1a619a;*/
            left: 0;
            right: 0;
            bottom: -10px;
        }
        .MyTicker .col-center {
            margin: 0 auto;
            float: none !important;
            height:100%;
        }
        .MyTicker .carousel {
            height: 83px;
            /*
            margin: 50px auto;
            padding: 0 70px;
            padding:30px auto;
            */
        }
        .MyTicker .carousel .item {
            color: #999;
            font-size: 14px;
            text-align: center;
            overflow: hidden;
            min-height: 83px;
        }
        .MyTicker .carousel .item .img-box {
            width: 135px;
            height: 135px;
            margin: 0 auto;
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 50%;
        }
        .MyTicker .carousel .img-box img {
            width: 100%;
            height: 100%;
            display: block;
            border-radius: 50%;
        }
        .MyTicker .carousel .testimonial {
            padding: 7px 0px; color:#fff; margin:0;
        }
        .MyTicker .carousel .overview {	
            font-style: italic; padding:0px; color: #fff; margin:0;
        }
        .MyTicker .carousel .overview b {
            text-transform: uppercase; color: #fff;
        }
        .MyTicker .carousel .carousel-control {
            width: 40px;
            height: 40px;
            margin-top: -20px;
            top: 90%;
            background: none;
        }
        .MyTicker .carousel-control i {
            font-size: 40px;
            line-height: 42px;
            position: absolute;
            display: inline-block;
            color: rgba(0, 0, 0, 0.8);
            text-shadow: 0 3px 3px #e6e6e6, 0 0 0 #000;
        }
        .MyTicker .carousel .carousel-indicators {
            bottom: -40px;
        }
        .MyTicker .carousel-indicators li, .carousel-indicators li.active {
            width: 18px;
            height: 18px;
            margin: 1px 3px;
            border-radius: 50%;
        }
        .MyTicker .carousel-indicators li {	
            background: #999;
            border-color: transparent;
            box-shadow: inset 0 2px 1px rgba(0,0,0,0.2);
        }
        .MyTicker .carousel-indicators li.active {	
            background: #1a619a;		
            box-shadow: inset 0 2px 1px rgba(0,0,0,0.2);
        }  
        /*MyTicker End*/        
    }
    @media screen and (min-width: 769px) {
        .MobileDs,.mobiledevices-1{display:none}
    }
    @media screen and (max-width:800px){.mobiledevices, .MyTicker{display: none;}}
    @media screen and (max-width:900px){.mobiledevices, .MyTicker{display: none;}}
    @media screen and (max-width: 768px) {
        .MyTicker{display: none;}
        #stick-form{border: 0px !important; background:#0d3765 !important;}
        .mobiledevices{display: none;}
        .navbar{background-color:#084473}
        .home_2{top:0;height:auto!important;background:#fff!important}
        .home_2 .container{width:100%!important}
        .container{position:relative}
        .Smsgbox{left:0!important;position:relative!important;bottom:0;padding:0}
        .home_2 h1{font-size:16px!important;font-weight:700!important;color:#fff;line-height:20px}
        .home_2 .filter{display:none}
        .vsmall{font-size:13.5px!important;line-height:1.5;font-weight:300}
        .vsmall,h2{margin-top:7px!important}
        .vsmall b{font-size:18px!important;font-weight:700!important;color:#fff!important}
        .home_2 a{font-size:10px!important;width:100px!important;height:30px!important;line-height:6px!important;padding:10px!important}
        .mobileds{display:none}
        .home_2 .title{width:100%;padding:0 15px!important;background-color:#0d3765!important;color:#fff;min-height:235px}
        .owl-carousel .fa-chevron-right,.owl-carousel .fa-chevron-left{font-size:20px!important;top:40%!important;bottom:0!important;padding:0!important}
        .owl-carousel .fa-chevron-left{left:85%!important}
        .MobileDs{position:relative;background-color:#717171;width:100%}
        .nav-tabs>li{float:none}
        .tab .nav-tabs li a{padding:10px 0!important;margin:0;width:50%!important;float:left;text-align:center;font-size:12px!important}
        .navigation .navbar .navbar-brand img{margin:2px 0 0 -18px}
        .home_2 .owl-carousel{position:relative!important}
        .owl-carousel .fa-chevron-right{right:3%!important}
        .owl-carousel .fa-chevron-left{left:3%!important}
        .navigation .navbar .navbar-brand{padding:10px 0 10px 15px}
        .explore{margin-top:0}
        .home_2 .head-title-2 h1{font-size:21px}
        .home_2 .head-title-2 h4{font-size:12px}
        .navigation .navbar .navbar-nav > li .child-navigation{left:0!important}
        .navigation .navbar .site-header .mob-menu a.drop-close{top:15px;position:absolute;padding:0!important;margin:0!important;}
        .explore h1{margin-top:0;margin-bottom:0;text-align:center;font-size:28px;font-weight:400;color:#4c4c4c}
        .FooterAbout{padding-right: 0px !important;}
    }


</style>
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




<!-- Wrapper -->
<div class="wrapper">
    <!-- Start Header -->
    <div id="header" class="menu-wht"></div>
    <!-- End Header -->

    <!-- Page Content -->
    <div id="page-content_home">

        <div class="MobileDs">
            <div class="tab" role="tabpanel">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="">
                        <a aria-controls="home1"  data-toggle="modal"  data-target="#lead-form-model" class="btn btn-default btn-small pointer">
                            <?= trans('words.inquire_now') ?>
                        </a>
                    </li>
                    <li role="presentation" class="">
                        <a aria-controls="home2" href="#" class="btn btn-default btn-small pointer telephone" data-telephone="80029494">800 THOE 29494</a>
                    </li>

                </ul>
            </div>	
            <!-- Tab panes -->
        </div>


        <div class="home_2">

            <div id='stick-form' class="mobiledevices" style="position:absolute; top:33%; right:4%; z-index: 99999;">
                <h5 class="info-color white-text text-center" style="text-transform: uppercase; font-size: 18px!important; text-align: center; margin: 10px;display: block; color:#fff !important;">
                    <strong>Request A Call Back</strong>
                </h5> 
                <iframe src="<?= SITE_URL ?>/<?= $locale ?>/lead-form" class="iframe-lead-form" border="0" style="width:349px;height:330px;border:none;" scrolling="No"></iframe>                             
            </div>

            <?php if(!empty($Testimonials) && count($Testimonials) != 0): ?>
            <!--Ticker Start-->
            <div class="row MyTicker MTicker">
                <div class="col-md-12 col-center m-auto">
                    <div id="myCarousel-1" class="carousel slide" data-ride="carousel">
                        <!-- Carousel indicators -->
                        <!-- Wrapper for carousel items -->
                        <div class="carousel-inner">
                            <?php foreach($Testimonials as $Trows):?>
                            <div class="item <?= !empty($Trows->position == 1) ? 'active':'' ?>">
                                <p class="testimonial"><?=$Trows->message ?></p>
                                <p class="overview"><b><?=$Trows->fullname ?></b> </p>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>            
            <!--Tikcer end -->
            <?php endif;?>

            <div id="owl-demo-header" class="owl-carousel owl-theme carousel-full-width">

                @foreach ($sliders as $slider)
                <div class="item">
                    <span class="filter"></span>
                    <?php if($slider->explore_button_option == "1"):?>
                        <a href="<?=trim($slider->explore_link)?>">
                            <img class="smallSlide" src="<?= asset("assets/images/100-blank-img.jpg") ?>"  data-src="<?= asset("assets/images/home_banners/" . $slider->banner_image) ?>" alt="{{ $slider->banner_title_en }}" >
                            <div class="bigSlide"  data-original="<?= asset("assets/images/home_banners/" . $slider->banner_image) ?>"></div>
                        </a>
                    <?php else: ?>
                        <img class="smallSlide" src="<?= asset("assets/images/100-blank-img.jpg") ?>"  data-src="<?= asset("assets/images/home_banners/" . $slider->banner_image) ?>" alt="{{ $slider->banner_title_en }}" >
                        <div class="bigSlide"  data-original="<?= asset("assets/images/home_banners/" . $slider->banner_image) ?>"></div>
                    <?php endif;?>
                </div>
                @endforeach                
            </div>

            <div id='stick-form' class="mobiledevices-1" style="position:relative ;left:0%; top:0; width: 100%;">
                <h5 class="info-color white-text text-center" style="text-transform: uppercase; font-size: 24px!important; text-align: center; margin: 10px;display: block; color:#fff !important;">
                    <strong>Request A Call Back</strong>
                </h5> 
                <iframe src="<?= SITE_URL ?>/<?= $locale ?>/lead-form" class="iframe-lead-form" border="0" style="width:100%;height:330px;border:none;" scrolling="No"></iframe>                             
            </div>

        </div>
        <div class="container" style="margin-bottom: 40px!important;">

            <div class="explore">
                <h1><?= trans('words.explore_projects') ?></h1>
                <h5>
                    <i class="fa fa-map-marker"></i>
                    <?= trans('words.explore_project_address1') ?> 
                    <span class="team-color"><?= trans('words.explore_project_address2') ?></span>
                </h5>
            </div>
            <div class="row">
                <?php
                $i = 1;
                foreach ($bannersliders as $bannerslider) {
                    if ($i == 1 || $i == count($bannersliders) + 1 || $i == 9) {
                        echo '<div class="col-md-8">';
                    } else {
                        echo '<div class="col-md-4 col-sm-6">';
                    }
                    $link = str_replace("{lang}", $locale, $bannerslider->explore_link);
                    ?>
                    <a href="<?= $link; ?>">
                        <div class="exp-img"  data-original="<?= asset("assets/images/home_banners/{$bannerslider->banner_image}") ?>">
                            <span class="filter"></span>
                            <div class="img-info">
                                <h3>
                                    <?= $bannerslider->banner_title_en ?>
                                </h3>
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
                <h2><?= trans('words.event_title') ?></h2>
                <h5 class="team-color"><?= trans('words.event_subtitle') ?></h5>
            </div>

            @foreach($events as $event)
            <div class="row white sales-event" style="width: 100%;">
                <div class="col-md-3 col-sm-3 prp-img">
                    <a href="<?= url("/$locale/events/$event->slug_en") ?>">
                        <div class="exp-img-2" data-original="<?= url('/') . "/assets/images/events/" . $event->event_photo_en ?>">
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
                    <a href="<?= url("/$locale/events/$event->slug_en") ?>"><h4><?= $event->event_title_en ?></h4></a>
                    <!--p class="team-color"><?= date_format(date_create($event->event_date), 'd F, Y') ?></p-->
                    <!--<p class="team-color">7th & 8th December 2018</p>-->
                    <?php
                        $symbols = !empty($event->symbols) ? ' '.$event->symbols.' ' : '';
                        $cuday = date('jS', strtotime($event->event_date));
                        $Lsday =!empty($event->levent_date) ? $symbols.date('jS',strtotime($event->levent_date)) : '';
                        $MYear = date('F, Y',strtotime($event->event_date));
                    ?>   
                    <p class="team-color"><?php echo $cuday.$Lsday.' '.$MYear;?></p>
                    <p>
                        <?php
                        if (!empty($event->extra_desc_en)) {
                            echo str_limit($event->extra_desc_en, 190);
                        }
                        ?>
                    </p>
                    <div class="block">
                        <div class="col-md-3 col-sm-3 col-xs-3 cat-img">
                            <p class="info-line"><?= $event->event_location_en ?></p>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3 cat-img">
                            <p class="info-line"><?= $event->event_place_en ?></p>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3 cat-img">
                            <p class="info-line">                              
                                <!--span><?= date_format(date_create($event->event_date), 'd F, Y') ?></span>                                                                
                                <span>7th & 8th December 2018</span>--> 
                                <span><?php echo $cuday.$Lsday.' '.$MYear;?></span>

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
                    <div class="sum col-sm-12 col-xs-12">
                        <p class="team-color"> <?= trans('words.explore_more') ?></p>
                        <p><?= !empty($event->starting_from) ? trans('words.aed') . ' ' . $event->starting_from : '' ?></p>
                    </div>
                    <span class="ffs-bs col-xs-12 btn-half-wth1">
                        <a data-toggle="modal" data-target="#lead-form-model" class="btn btn-blue btn-small pointer" style="margin:0 0 15px;"><?= trans('words.RSVP NOW') ?> <i class="fa fa-caret-right"></i></a>
                        <a href="<?= url("/$locale/events/$event->slug_en") ?>" class="btn btn-blue btn-small pointer" style="margin:0 0 15px;"><?= trans('words.view_more') ?> <i class="fa fa-caret-right"></i></a>
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

        <!--Testominals Start-->
        <!--div class="row MyHead">
            <div class="col-sm-12">
                <h2>What Our Customers Are Saying</h2>
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Carousel indicators -->
                    <!--ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    </ol->   
                    <!-- Wrapper for carousel items ->
                    <div class="carousel-inner">
                        <div class="item carousel-item active">
                            <div class="row">
                                
                                <div class="col-sm-6">
                                    <div class="media">
                                        <div class="media-left d-flex mr-3">
                                            <a href="#">
                                                <img src="{{ asset('assets/images/testimonials/daisy-603.jpg')}}" alt="">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <div class="testimonial">
                                                <p>
                                                    A superb building. Thank you!
                                                </p>
                                                <p class="overview"><b>Alaxander MarkTambling</b></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <div class="media">
                                        <div class="media-left d-flex mr-3">
                                            <a href="#">
                                                <img src="{{ asset('assets/images/testimonials/daisy-401.jpg')}}" alt="">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <div class="testimonial">
                                                <p>
                                                    Excellent facilities.
                                                </p>
                                                <p class="overview"><b>Yazan Labib Habib</b></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>			
                        </div>
                        
                    </div>
                </div>
            </div>
        </div-->
        <!--testiomail End-->

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
        //setTimeout(function () {

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
                //setTimeout(function () {
                $('.secondary.main-menu').addClass("smooth-remove");
                //}, 100);
                //setTimeout(function () {
                $('.secondary.main-menu').removeClass("open smooth-remove");
                //}, 500);
                //setTimeout(function () {
                $('.drop-left, .primary.main-menu>ul').removeClass("hidden");
                $('.drop-close, .secondary.main-menu>ul').addClass("hidden");
                //}, 600);
                //setTimeout(function () {
                $('.primary.main-menu>ul').addClass("smooth");
                //}, 620);
            }
            //pressing more
            else {
                $('.primary.main-menu, .drop-left').addClass("smooth-remove");
                $('.secondary.open li').css('opacity', '0');
                //setTimeout(function () {
                $('.drop-left, .primary.main-menu>ul').addClass("hidden");
                $('.drop-close, .secondary.main-menu>ul').removeClass("hidden");
                $('.primary.main-menu').removeClass("smooth-remove");
                $('.drop-left').removeClass("smooth-remove");
                $('.primary.main-menu>ul').removeClass("smooth");
                //}, 300);
                $('.blog-nv .secondary>ul, .blog-mn .secondary>ul').removeClass("hidden");
                //setTimeout(function () {
                $('.secondary.main-menu>ul').addClass("smooth");
                //}, 350);
            }
        });
        $('.wrapper').on('click', function (e) {
            if ($('.secondary').hasClass("open")) {
                $('.drop-left, .primary.main-menu>ul').removeClass("hidden");
                $('.drop-close, .secondary.main-menu>ul').addClass("hidden");
                //setTimeout(function () {
                $('.primary.main-menu>ul').addClass("smooth");
                $('.drop-close, .secondary.main-menu>ul').removeClass("smooth");
                //}, 100);
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

        //}, 1000);

    });
    $('#myCarousel,#myCarousel-1').carousel().swipeCarousel({/*code here*/});
    //$("#cityscapepop").load("<?= url('cityscapepop') ?>");

</script>
@stop