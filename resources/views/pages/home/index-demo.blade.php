
@extends('layouts/home')

@section('header_styles')
<style>
    #page-footer .inner #footer-main,.wide-2 .white{background-color:#ededed}
    #page-footer .inner h3{color:#000;margin:20px 0 13px;font-family:"Open Sans Condensed";font-size:20px}
    #page-footer .inner .contact-us,footer a,footer a:visited,footer li,footer p{font-size:13px;color:#000}
    .txt-white{color:#000}
    .wide-2 .white{margin:0 0 10px;display:table}
    #page-content_home{background:#fff}
    .modal-body .form-group input{padding:5px;width:100%;border:1px solid #e6e6e6;margin-bottom:0}
    .form-group label{font-size:13px;color:#7b7b7b;font-weight:400}
    /*#footer-main .container{padding:0}*/
    .navigation .navbar .navbar-nav > li .child-navigation {left: -60px !important;}

    @media only screen and (min-width: 993px) {
        .container{width:100%!important}
        .navigation .navbar .navbar-nav > li .child-navigation { left: 0px !important; }
    }
    @media screen and (max-width: 1024px) {
        .home_2 a{font-size:10px;width:98px}
        .navigation .navbar .navbar-nav > li .child-navigation { left: 0px !important; }
    }
    @media screen and (max-width: 767px) {
        .btn-half-wth{width:50%;padding-right:0;top:35px}
        .home_2 .head-title-2 .title{padding:15px;bottom:0!important;position:absolute!important;left:0!important;margin:0!important}
        .wide-2 .item-price .btn-small{font-size:14px;padding:9px 0!important;margin-top:-3rem}
        .navigation .navbar .navbar-nav > li .child-navigation { left: 0px !important; }
    }
    @media screen and (max-width: 640px) {
        .home_2 .head-title-2 h1{font-size:15px}
        .home_2 .head-title-2 h4{font-size:12px}
        .navigation .navbar .navbar-nav > li .child-navigation { left: 0px !important; }
    } 
    @media screen and (max-width: 480px) {
        .owl-item  .item  .head-title-2{background-size: 100% 273px!important;background-repeat: no-repeat!important;background-position: top center!important;height: 450px;}
        .owl-item  .item  .head-title-2 .Smsgbox{margin: -20px 0!important;width: 100%!important;left: 0;}
        .owl-item  .item  .head-title-2 .title{padding: 10px;width: 100%;min-height: 177px;}
        .owl-item  .item  .head-title-2 .title a{height: 26px; padding: 4px 7px 3px 10px; font-size: 11px; width: 100px;}
    }
    @media screen and (max-width: 414px) {
        .home_2 .head-title-2 h1{padding-top:10px}
        .home_2 a{font-size:7px;width:75px}
        .wide-2 .item-price .btn-small{font-size:14px;padding:9px 0!important;margin-top:-3rem}
        .navigation .navbar .navbar-nav > li .child-navigation { left: 0px !important; }
    }


    .container{margin:0 auto!important;max-width:1280px!important;width:100%!important}
    .pointer{cursor: pointer}
    .Smsgbox{left: 100px;}

    .videoWrapper {
        position: relative;
        padding-bottom: 56.25%; /* 16:9 */
        padding-top: 25px;
        height: 0;
    }
    .videoWrapper iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
    .home_2{}
    .Smsgbox .title{padding: 15px;
                    bottom: 0!important;
                    position: absolute!important;
                    left: 0!important;
                    background-color: rgba(13, 55, 101, 0.65);
                    margin: 0!important;}
    .Smsgbox .title h1{color: #fff;font-size: 15px;font-weight: 600;
                       margin-top: 10px;}
    .Smsgbox .title h4{color: #fff;
                       line-height: 1.5;
                       font-weight: 300;}
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
        <div class="home_2">
            <div id="owl-demo-header" class="owl-carousel owl-theme carousel-full-width">
                @foreach ($sliders as $slider)
                <div class="item">
                    <span class="filter"></span>
                    <img src="<?= asset('assets/images/home_banners/') ?>/{!! $slider->banner_image !!}" class="img-responsive">
                    <div class="container Smsgbox">
                        <?php
                        $banner_Title = preg_replace('/\s+/', '', $slider->banner_title_en);
                        if ($banner_Title != "") {
                            ?>
                            <div class="title col-lg-6  col-md-6 col-sm-8 col-xs-9">
                                <h1><?= $slider->banner_title_en ?></h1>
                                <h4><?= $slider->banner_short_description_en ?></h4>
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
                        <?php }
                        ?>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
        <div class="container ">
            <div class="explore">
                <h2><?= trans('words.explore_projects') ?></h2>
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
                    //if ($i == 1 || $i == count($bannersliders) || $i == 4) {
                    if ($i == 1 || $i == count($bannersliders) + 1 || $i == 9) {
                        echo '<div class="col-md-8">';
                    } else {
                        echo '<div class="col-md-4 col-sm-6">';
                    }
                    $link = str_replace("{lang}", $locale, $bannerslider->explore_link);
                    ?>
                    <a href="<?php echo $link; ?>" class="exp-img" 
                       style="background:url(<?= asset('assets/images/home_banners/') ?>/{!! $bannerslider->banner_image !!}) 
                       center;background-size: cover;">
                        <span class="filter"></span>
                        <div class="img-info">
                            <h3>
                                <?= $bannerslider->banner_title_en ?>
                            </h3>
                            <span class="ffs-bs btn btn-small btn-primary"> <?= trans('words.explore_more') ?></span>
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
                    <a href="<?= url("/$locale/events/$event->slug") ?>">
                        <div class="exp-img-2" style="background:url(<?= url('/') . "/assets/images/events/" . $event->event_photo ?>) center;background-size:  100% 100%;">
                            <span class="filter"></span>
                            <a href="<?= url("/$locale/events/$event->slug") ?>">
                                <span class="ffs-bs"><label  class="btn btn-small btn-primary"> <?= trans('words.view_more') ?></label>
                                </span></a>
                            <div class="overlay">
                                <div class="img-counter hidden">23 Photo</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="item-info col-lg-7 col-md-6 col-sm-6">
                    <a href="<?= url("/$locale/events/$event->slug") ?>"><h4><?= $event->event_title ?></h4></a>
                    <!--p class="team-color"><?= date_format(date_create($event->event_date), 'd F, Y') ?></p-->
                    <!--<p class="team-color">7th & 8th December 2018</p>-->
                    <?php
                        $symbols = !empty($event->symbols) ? $symbols.$event->symbols.' ' : '';
                        $cuday = date('jS', strtotime($event->event_date));
                        $Lsday =!empty($event->levent_date) ? $symbols.date('jS',strtotime($event->levent_date)) : '';
                        $MYear = date('F, Y',strtotime($event->event_date));
                    ?>   
                    <p class="team-color"><?php echo $cuday.$Lsday.' '.$MYear;?></p>
                    <p>
                        <?php
                        if (!empty($event->extra_desc)) {
                            echo str_limit($event->extra_desc, 190);
                        }
                        ?>
                    </p>
                    <div class="block">
                        <div class="col-md-3 col-sm-3 col-xs-3 cat-img">
                            <p class="info-line"><?= $event->event_location ?></p>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3 cat-img">
                            <p class="info-line"><?= $event->event_place ?></p>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3 cat-img">
                            <p class="info-line">                              
                                <span><?= date_format(date_create($event->event_date), 'd F, Y') ?></span>                                                                
                                <!--<span>7th & 8th December 2018</span>-->                                                                
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
                        <a data-toggle="modal" data-target="#lead-form-model" class="btn btn-blue btn-small pointer" style="margin:0 0 10px;"><?= trans('words.RSVP NOW') ?> <i class="fa fa-caret-right"></i></a>
                        <a href="<?= url("/$locale/events/$event->slug") ?>" class="btn btn-blue btn-small pointer" style="margin:0 0 10px;"><?= trans('words.view_more') ?> <i class="fa fa-caret-right"></i></a>
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


<!-- Popup -->

<div class="modal" id="lead-form-model" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">ENQUIRE NOW</h4>
            </div>
            <div class="modal-body" style="padding:0 5px;">
                <iframe src="<?=SITE_URL?>/lead-form/index-<?= $locale ?>.php?redirect_url=<?= urldecode(SITE_URL."/{$locale}/thank-you") ?>&page_url=<?= urlencode(Request::fullurl()) ?>" border="0" style="width:100%;height:450px;border:none;"></iframe>
            </div>
        </div>
    </div>
</div>

<!-- End popup -->

{{-- @include('include.popup-slider-bt') --}}

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


        //script for autolooping of banner slider
        setInterval(function () {
            $('.owl-next').click();
        }, 500000);

    });

    //$("#cityscapepop").load("<?= url('cityscapepop') ?>");

</script>
@stop