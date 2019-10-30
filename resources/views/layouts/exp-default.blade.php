<?php
$meta = DB::table('tbl_meta')->where('page_url', Request::url())->first();
if (!empty($meta) && !empty($meta->meta_title)) {
    $meta_title = $og_title = $meta->meta_title;
}
if (!empty($meta) && !empty($meta->meta_desc)) {
    $meta_description = $meta->meta_desc;
}
if (!empty($meta) && !empty($meta->meta_key)) {
    $meta_keyword = $meta->meta_key;
}

/* Preload Setting */
$locale = get_locale(Request::segment(1));
$records_menu = get_menu($locale, 1);
$footers_part1 = get_menu($locale, 2, 7, 0);
$footers_part2 = get_menu($locale, 2, 6, 5);
$setting = get_setting($locale);
$ptype = 1;

$curr_url = str_replace('http:', 'https:', Request::url());
$full_url = str_replace('http:', 'https:', Request::fullurl());
$home_url = SITE_URL;
$site_url = $home_url . '/' . $locale;
$ip = '//35.168.87.174';

if (!empty(Request::segment(1)) && !empty(Request::segment(2))) {
    $en_url = str_replace(['/en/', '/ar/', '/cn/'], '/en/', $full_url);
    $ar_url = str_replace(['/en/', '/ar/', '/cn/'], '/ar/', $full_url);
    $cn_url = str_replace(['/en/', '/ar/', '/cn/'], '/cn/', $full_url);
} else if (!empty(Request::segment(1))) {
    $en_url = str_replace(['/en', '/ar', '/cn'], '/en', $full_url);
    $ar_url = str_replace(['/en', '/ar', '/cn'], '/ar', $full_url);
    $cn_url = str_replace(['/en', '/ar', '/cn'], '/cn', $full_url);
} else {
    $en_url = SITE_URL.'/en';
    $ar_url = SITE_URL.'/ar';
    $cn_url = SITE_URL.'/cn';
}
$hreflang = $locale == 'en' ? 'en-uk' : ($locale == 'ar' ? 'ar-ae' : ($locale == 'cn' ? 'zh-Hans-cn' : ''));

if (strpos($curr_url, 'news-pr/') !== false && empty($press->title_ar)) {
    $ar_url = '';
}
if (strpos($curr_url, 'events/') !== false && empty($content->event_title_ar)) {
    $ar_url = '';
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/favicon') }}/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/favicon') }}/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/favicon') }}/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/favicon') }}/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/favicon') }}/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/favicon') }}/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/favicon') }}/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/favicon') }}/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/favicon') }}/apple-icon-180x180.png">
        <link rel="icon" type="image/x-icon"  sizes="192x192"  href="{{ asset('assets/favicon') }}/android-icon-192x192.png">
        <link rel="icon" type="image/x-icon"  sizes="32x32" href="{{ asset('assets/favicon') }}/favicon-32x32.png">
        <link rel="icon" type="image/x-icon"  sizes="96x96" href="{{ asset('assets/favicon') }}/favicon-96x96.png">
        <link rel="icon" type="image/x-icon"  sizes="16x16" href="{{ asset('assets/favicon') }}/favicon-16x16.png">
        <link rel="manifest" href="{{ asset('assets/favicon') }}/manifest.json">
        <link rel="alternate" href="{{$site_url}}" hreflang="{{$hreflang}}"/>
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="{{ asset('assets/favicon') }}/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
        <!-- End -->
        <title><?= !empty($meta_title) ? $meta_title : '' ?></title>
        <meta name="description" content="<?= !empty($meta_description) ? $meta_description : '' ?>">
        <meta name="keywords" content="<?= !empty($meta_keyword) ? $meta_keyword : '' ?>">
        <meta property="og:url" content="<?= $curr_url ?>" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="<?= !empty($og_title) ? $og_title : '' ?>" />
        <meta property="og:description" content="<?= !empty($meta_description) ? $meta_description : '' ?>" />
        <meta property="og:image" content="<?= !empty($og_pic) ? $og_pic : '' ?>" />
        <meta property="fb:app_id" content="136745863654131" />
        <meta name="google-site-verification" content="0WxA6_GyN5YnA7ACg_AD-LY-yPvCvMzUGUAM7sZjSmU" />
        <meta name="twitter:card" content="summary">
        <meta name="twitter:site" content="@publisher_handle">
        <meta name="twitter:title" content="<?= !empty($og_title) ? $og_title : '' ?>">
        <meta name="twitter:description" content="<?= !empty($meta_description) ? $meta_description : '' ?>">
        <meta name="twitter:creator" content="@author_handle">
        <meta name="twitter:image" content="<?= !empty($og_pic) ? $og_pic : '' ?>">




        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/materialize.min.css') }}" media="screen,projection" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/az-styles.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/ionicons.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/aos.css') }}">

        <link rel="stylesheet" type="text/css" href="{{ asset('assets/slideshow-new/css/style1.css')}}" />



        @if($locale=='cn')
        <style>
            .sp-caption-container {
                text-align: left !important;
                margin-top: 10px;
            }
        </style>
        @endif

        @if($locale=='ar')
        <link rel="stylesheet" href="{{ asset('assets/ar-font/stylesheet.css') }}" type="text/css">

        <style>
            body{font-family:'AZD'!important;text-align:right!important;direction:rtl;letter-spacing:0!important}
            b{font-weight:100!important}
            @font-face{font-family:'Oxygen';font-style:normal;font-weight:400;src:local(Oxygen),local(Oxygen-Regular),url(//fonts.gstatic.com/s/oxygen/v5/LC4u_jU27qpsdszDEgeU_3-_kf6ByYO6CLYdB4HQE-Y.woff2) format("woff2")}
            .num-flip{font-family:inherit!important;direction:ltr;float:left;width:85%}
            .slide-cont{direction:ltr!important}
            .home_2 .head-title-2 h4{text-align:right!important}
            html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video{font-family:'AZD'!important}
            .num-fo,input{font-family:"Open Sans",sans-serif!important}
            .input-field.col label{left:initial!important;right:0!important}
            .az-btn.active,.az-btn:hover{background:#000;color:#fff;border-color:#000;letter-spacing:0!important}
            .contact-arrow-collapse{right:initial!important;left:7rem}
            .vert-tab.active-vert span{margin-top:-20px!important;margin-right:35px!important;margin-left:20px!important}
            .vert-tab span{margin-top:20px!important;margin-right:35px!important;margin-left:20px!important}
            .select-wrapper span.caret{right:initial!important;left:0!important}
            .press-news-header.row .col{float:right!important}
            .press-news-header h4,.press-news-header .select-wrapper span.caret{right:initial!important;left:0!important}
            .press-news-header .search-tt{float:initial!important;margin-right:-35px!important}
            nav ul a{font-size:15px!important}
            .dropdown-content li>a,.dropdown-content li>span{font-size:15px!important}
            body h1,h2,h3,h4,h5,h6,p,a,i,.person-name{letter-spacing:0!important}
            .dropdown-content li>a,.dropdown-content li>span{text-align:right!important}
            #owl-demo-header{direction:ltr}
            ul{padding:0}
            form .row .col{float:right!important}
            .az-nav-header{text-align:left!important;direction:initial!important}
            .about-title-text{width:100%!important}
            .az-header-divider{display:none!important;float:right;position:absolute;right:5rem}
            .about-chairman-sec{width:62%!important}
            .az-footer p{padding-right:0!important}
            .az-footer i{float:right!important}
            .az-footer .ion-ios-email-outline{font-size:30px;float:left;margin-top:-15px;margin-right:9px;float:initial;margin-left:10px}
            nav ul li{float:right!important}
            .navbar-brand{float: right}
            .row .col{float: right}
            .floatRight{float: right}
            nav .button-collapse{margin: 0px;}
        </style>
        @else
        <style>
            nav .button-collapse{margin: 0px 0px 0px 0px  !important;}
            @media only screen and (min-width: 767px){ 
                nav .button-collapse{margin: 0px !important;} 
                .brand-logo{padding-top:5px;}
                nav, nav .nav-wrapper i, nav a.button-collapse, nav a.button-collapse i{height: 48px !important; line-height: 30px !important;}
            }
        </style>
        @endif


        <!-- New footer style -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans|Open+Sans+Condensed:300,700" rel="stylesheet">
        <style>
            #page-footer .inner{display:table;width:100%;color:#dadada}#page-footer .inner #footer-main,.wide-2 .white{background-color:#ededed}#page-footer .inner #footer-main{padding:40px 0}#page-footer .inner .contact-us,footer a,footer a:visited,footer li,footer p{font-size:13px;color:#000;line-height:1.75;font-family:"Open Sans",sans-serif}address{margin-bottom:20px;font-style:normal;line-height:1.42857143}#page-footer .inner #footer-copyright{background-color:#1b1d20;display:table;padding:20px 0;width:100%}#page-footer .inner #footer-copyright a{font-size:14px;color:#dadada;opacity:.5}#page-footer .inner #footer-copyright .bank-logo{height:25px;vertical-align:middle;margin-right:7px;margin-left:8px}.pull-right{float:right!important}#page-footer .inner #footer-copyright span{opacity:.5;line-height:26px}
        </style>
        <!-- End -->

        <!-- Google Tag Manager -->
        <script>(function (w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({'gtm.start': new Date().getTime(), event: 'gtm.js'});
                var f = d.getElementsByTagName(s)[0], j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
                j.async = true;
                j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer', 'GTM-559DSQ');</script>
        <!-- End Google Tag Manager -->


        <!--page level css-->
        @yield('header_styles')
        <!--end of page level css-->


        <style>
            .sidebar-menu-holder {
                margin-top: 0rem;
                max-height: 600px;
                overflow: auto;
            }
            .parallax-container .parallax img {
                /*top: 30px !important;*/
            }

            .side-nav li>a {
                background: #ffffffba !important;
                padding: 0px 15px;
                font-size: 16px;
            }

            img.responsive-img, video.responsive-video {
                max-width: 100%;
                height: auto;
                width: 100%;
            }
            .project-amenities img {
                max-width: 32px !important;
            }

            html {padding: 0 !important;}

            #sf-resetcontent{
                display: none !important;
            }
            #blue-tags-div{
                display: none;
            }
            .txtLeft{text-align: left !important;}
            .txtRight{text-align: right !important;}
            .hidden{visibility:hidden}
            .none{display:none}
            .f-s-12{font-size: 12px;}
            .m-r-75{margin-right: 75px;}
            .m-w-15{max-width: 15px!important;}
            .m-w-125{max-width: 125px!important;}
            .m-w-100{max-width: 100px!important;}
            .langSwitch{display: block;opacity: 1;left: -12vw;}
            .color-4f4f4f{color: #4f4f4f}
            .socialIcon{display: inline-block; margin: 8px;}
            .socialIcon i{font-size: 20px;}
            .floatLeft{float: left;}
            .directionInitial{direction: initial;}
            #nav-search{color: white;position: absolute;top: 0;right: 0;cursor:pointer;}
            #nav-search .modal-content{padding-top: 30vh;}
            #nav-search .modal-content h5{color: white;font-weight: 100;letter-spacing: 1px;font-size: 20px;}
            #nav-search .modal-content .input-field{border: 2px solid white;border-radius: 35px;}
            #nav-search #searchform input[type="text"]{border-bottom: none;margin-bottom: 0;padding-top: 10px;font-size: 17px;color: white;letter-spacing: 1px;font-weight: 100;height: 1.2rem;}
            #nav-search #searchform input[type="submit"]{z-index: 99;position: absolute;right: 0;background: none;border: none;    color: transparent;}
            #nav-search #searchform .material-icons{color: white;padding-top: 5px;font-size: 30px;}
            #prop-map-view{min-height: 100%;}
            #prop-map-view .modal-content{padding: 0;}
            #prop-map-view .modal-content .row{background: white;}
            #prop-map-view .modal-content .az-title{font-weight: 800;}
            #prop-map-view .modal-content .az-title1{float: right;position: absolute;right: 2em;margin-top: -3.5em;color: #8c8c8c;cursor:pointer;}
            .copyRight{padding: 0px 35px;}
            .copyRight p{font-size: 12px;letter-spacing: 1px;line-height: 15px;color: #828282;}
            #dropdown1{min-width: 155px; top: 94px; white-space: nowrap; position: absolute; left: 1074.39px; display: none; opacity: 1;}
            .txt-white{color: white;}
            #mobile-demo{z-index: 9999;}
            #mobile-demo .bt3{margin-top: 3rem !important;}
            #mobile-demo .bb1{border-bottom: 1px solid #f3f3f3;}
            #mobile-demo .bb2{border-bottom: 1px solid #f3f3f3;text-align: center;background: #ddd;margin-top: 10px;}
            #mobile-demo .close-nav{position: absolute;right: 20px;top: -10px;}
            #mobile-demo .ion-ios-close-empty{font-size: 50px;}
            /*#mobile-demo .sidebar-menu-holder{margin: 0;height: 576px;background: url(<?= asset('assets/images') ?>/mobile-menu-bg.jpg);}*/
            #mobile-demo .img1{max-width: 175px;margin-top: -25px;margin-left: 15px;}
            .dropdown3{min-width: 155px; top: 94px; white-space: nowrap; position: absolute; left: 445.578px; display: none; opacity: 1;}
            nav.container{background:#fff;}
            ul.langSwitch{min-width: 105px!important;}

            .FooterAbout{margin: 0; padding-right: 100px!important;width: auto;}.Quicklinks{margin-left: 0px!important;}
            #nl{background:url(../images/newsletter-bg.jpg);width:100%;text-align:center;padding-left:0;padding-right:0;margin-bottom:10px;}
            #nl .nl-title{margin:0;color:#fff;font-size:20px;font-weight:bold;}
            #nl .nl-name,#nl .nl-email{background:transparent;color:#666;outline:none;border:none;border-bottom:1px solid #1b619a!important;padding:7px 5px;font-size:15px;border-radius:0;}
            #nl .nl-submit{ border: 0px solid #fff!important; padding: 3px; width: 100%; background: #1b619a; height: auto;}
            table#nl{width: 100%;overflow: hidden;}
            table#nl tr:nth-child(1) td{padding: 0px 1px 15px}
            table#nl tr:nth-child(2) td{padding: 0px 0px 30px}
            table#nl tr:nth-child(3) td{padding: 0}
            .valid{display: none;}
            .invalid{display: inline;}
            .txt-red{color:red}
            #sub-msg p{color:green;text-align: left}
            .containerlog{ padding: 13px 0px 5px; width: 110px}
            .topmg a{ font-size: 12px; color:#fff; margin-top: 8px; }
            .topmg a:hover, .topmg a:active, .topmg a:visited,  .topmg a:focus{ color:#eee; cursor: pointer !important; }
            .sticky ul{float:right;}
            .sticky ul li{float:left;}
            .az-nav-header{background:rgba(0,0,0,.4);top:55px;}
            @media  screen and (min-width: 1024px) {
                section.sticky{ position: fixed; top: 0; width:100% ;background:rgba(0, 0, 0, 0.5); z-index: 9991; }
                .button-collapse{display:none}
                #call-icon i,#mail-icon i{display:none!important}
                ul.topmg li a{padding:0px 10px}
                ul.topmg li:nth-child(2) a{border-left: 1px solid #a5a2a2;border-right: 1px solid #a5a2a2;}
                .az-nav-header{margin-bottom: 55px;}
            }
            @media  screen and (max-width: 1024px) {
                section.sticky{ position: fixed; top: 0;width:100%; background:rgba(0, 0, 0, 0.5); z-index: 9991; }
                .button-collapse{display:none}
                ul.topmg{margin-top: 10px;}
                ul.topmg li a{padding:5px 10px}
                #call-icon i,#mail-icon i{display:none}
                ul.topmg li:nth-child(2) a{border-left: 1px solid #a5a2a2;border-right: 1px solid #a5a2a2;}
                nav ul a{padding:8px 15px}
                .parallax-container{margin-top:55px;}
            }
            @media  screen and (min-width:768px){
                /*section.sticky{ display: none !important; }*/

            }
            @media  screen and (max-width:812px){
                nav ul a{padding:8px}

            }
            @media  screen and (max-width:768px){
                /*section.sticky{ display: none !important; }*/
                .large-menu{display:none}
                .az-nav-header{display:none}
                .button-collapse{display:inline}
                ul.topmg li:nth-child(3){display:none;}
                #hero-image-cont {width:100%;}

            }
            @media  screen and (max-width:480px){
                section.sticky{height:50px;}
                ul.topmg{margin: 0 0 10px;}
                ul.topmg li a { padding: 5px 18px; }
                ul.topmg li:nth-child(3){display:none;}
                #call-icon span,#mail-icon span{display:none}
                #call-icon i,#mail-icon i{font-size:25px;display:inline;vertical-align: middle;}
                .parallax-container{margin-top:50px;}
                
            }
            .tag-pro{top:unset}
            .parallax-container{width:100%;}
            .agent-login{display:none;}
            .button-collapse i small{top: -9px;font-size: 14px;}
            .button-collapse i{color:#fff;font-size: 2em;}
            .button-collapse{padding-left: 20px;margin-top: 12px;}
            nav {padding-bottom: 2.6em;padding-top: .8em;}
            #enquire-now{z-index:9999!important;}
        </style>

        <script async src="{{asset('assets/js/modernizr.js')}}"></script>
        @if(isset($schema_tag))
        <?= $schema_tag ?>
        @endif
    </head>
    @if($locale=='en')
    <body class="txtLeft">
        @elseif($locale=='ar')
    <body class="txtRight">
        @elseif($locale=='ch')
    <body class="txtLeft">
        @else
    <body>
        @endif


        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-559DSQ"
                          height="0" width="0" class="hidden none"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->


        @yield('main_div_wrapper')

        <section class="sticky">
            <div class="container">
                <a class="logo" href="<?= url("/") ?>/<?php echo $locale ?>" title="" rel="home">
                    <?php $logo = $locale == 'ar' ? $setting['header_logo_ar'] : ($locale == 'cn' ? $setting['header_logo_ch'] : $setting['header_logo']); ?>
                    <img alt="Azizi Developments" src="<?= asset('assets/images/logo/') ?>/<?= $logo ?>" class="containerlog">
                </a>
                <a href="#" data-activates="mobile-demo" class="button-collapse <?= $locale == 'ar' ? 'left' : 'right' ?> ">
                    <i class="large material-icons">menu</i>
                </a>
                <ul class="nav navbar-nav pull-right topmg">
                    <li><a id="call-icon" class="telephone" data-telephone="80029494"><i class="ion-android-call"></i><span>Call Us 80029494</span></a></li>
                    <li><a id="mail-icon" class="modal-trigger" href="#enquire-now"><i class="ion-android-mail"></i><span>Register Your Interest</span></a></li>
                    <li>
                        <?php if ($locale == 'en') { ?>
                            <a href="<?= $ar_url ?>">  العربية</a>
                        <?php } elseif ($locale == 'ar') { ?>
                            <a href="<?= $en_url ?>"> English</a>
                        <?php } elseif ($locale == 'cn') { ?>
                            <a href="<?= $en_url ?>"> English</a>
                        <?php } ?>
                    </li>
                </ul> 
            </div>
        </section>


        <nav class="nav-down az-nav-header">
            <div class="container">


                <ul class="<?= $locale == 'ar' ? 'right' : 'left' ?> large-menu">
                    <?php foreach ($records_menu as $menu) { ?>
                        <li class="top-nav dropdown-button <?= $menu['slug'] ?>" data-activates="dropdown-<?= $menu['id'] ?>">
                            <a class="m-nav" href="{{ url("/") }}/{{$locale}}/<?= $menu['slug'] ?>"><?= $menu['title_en'] ?></a>
                        </li>
                        <?php if ($menu['submenus']) { ?>
                            <ul id="dropdown-<?= $menu['id'] ?>" class="dropdown-content dropdown3" > 
                                <?php foreach ($menu['submenus'] as $submenu) { ?>
                                    <?php
                                    if (!in_array($submenu['id'], [34, 12, 45])) {
                                        ?>
                                        <li class="sub-menu "><a href="{{ url("/") }}/{{$locale}}/<?= $submenu['slug'] ?>"><?= $submenu['title_en'] ?></a></li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                            <?php
                        }
                    }
                    ?>
                </ul>

                <ul class="<?= $locale == 'ar' ? 'left' : 'right' ?> large-menu">
                    <?php if (!Sentinel::guest() && Sentinel::check()) { ?>
                        <li class="top-nav dropdown-button" data-activates="dropdown-<?= $menu['id'] ?>">
                            <a href="{{ url("/") }}/{{$locale}}/agent-dashboard">{{trans('words.agent_service')}}</a></a>
                        </li>
                    <?php } else {
                        ?>
                        <li class="top-nav dropdown-button" data-activates="dropdown-<?= $menu['id'] ?>">
                            <a href="{{ url("/") }}/{{$locale}}/agent-login">{{trans('words.agent_service')}}</a></a>
                        </li>
                    <?php }
                    ?>
                </ul>


            </div>
        </nav>




        <div class="container">
            <div class="nav-wrapper">    
                <div class="side-nav" id="mobile-demo">
                    <div class="row m0 bt3">
                        <div class="col s12 p0 bb1">
                            <?php $logo = $locale == 'en' ? 'azizi-logo.png' : 'logo/1520924041615925084.png' ?>
                            <img alt="Azizi Developments" src=<?=SITE_URL?>"/assets/images/{{$logo}}" class="responsive-img img1">
                            <div class="col s12 p0 bb2">                 
                                <a class="active txt-white" href="{{$en_url}}" >English</a>&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;<a class="active txt-white" href="{{$ar_url}}" >العربية</a>
                            </div>
                        </div>

                        <div class="col s12 sidebar-menu-holder">
                            <span class="close-nav" <?= $locale == 'ar' ? 'style="left: 20px; right: unset;"' : '' ?>>
                                <span class="ion-ios-close-empty"></span>
                            </span>
                            <ul>
                                <li class="bold"><a href="{{ url("/") }}/" class="waves-effect waves-grey">Home</a></li>
                                @foreach ($records_menu as $menu)
                                <li class="no-padding">

                                    <ul class="collapsible collapsible-accordion">
                                        <li class="bold">

                                            @if($menu['slug']=="contact" || $menu['slug']=="online-payments")
                                            <a href="{{ url("/") }}/{{$locale}}/<?= $menu['slug'] ?>"><?= $menu['title_en'] ?></a>
                                            @else
                                            <a class="collapsible-header waves-effect waves-grey"><?= $menu['title_en'] ?></a>
                                            @endif
                                            @if($menu['submenus'])
                                            <div class="collapsible-body none" >
                                                <ul>
                                                    @if($menu['slug']=="azizi-properties")
                                                    <li><a href="{{ url("/") }}/{{$locale}}/<?= $menu['slug'] ?>">Projects by Area</a></li>
                                                    @endif
                                                    @if($menu['slug']=="mediacenter")
                                                    <li><a href="{{ url("/") }}/{{$locale}}/<?= $menu['slug'] ?>">Media Home</a></li>
                                                    @endif

                                                    @foreach ($menu['submenus'] as $submenu)

                                                    <li><a href="{{ url("/") }}/{{$locale}}/<?= $submenu['slug'] ?>"><?= $submenu['title_en'] ?></a></li>
                                                    @endforeach 
                                                </ul>
                                            </div>
                                            @endif

                                        </li> 
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- Footer -->
                        <div class="col s12 sidebar-footer">
                            <div class="col s12">
                                <ul>
                                    <li>
                                        <a href="#"><i class="ion-social-youtube"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="ion-social-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="ion-social-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="ion-social-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="ion-social-googleplus"></i></a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col s12 copyRight">
                                <p class="m0">© 2018 AZIZI Developments. All right reserved</p>
                            </div>
                        </div>
                        <!-- End -->
                    </div>
                </div>
            </div>
        </div>

        <style>


        </style>
        <div id="prop-map-view" class="modal bottom-sheet">
            <div class="modal-content">
                <div class="row center-align" >
                    <div class="col s12">
                        <h5 class="az-title">Project Map</h5>
                        <span class="az-title"><span class="ion-close-round close-loc"></span></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search Modal -->
        <div id="nav-search" class="modal">
            <div  class="modal-action modal-close"><span class="ion-android-close"></span></div>
            <div class="modal-content" >
                <div class="row">
                    <div class="col s12">
                        <div class="row">
                            <h5 >{{trans('words.search_in_azizi_developments')}}</h5>
                            <div class="input-field col s12" >
                                <form action="{{ url('/') }}/search" name="searchform" id="searchform" method="post" enctype="multipart/form-data">
                                    <div class="col s10">
                                        <input type="text" name="searchtext" class="autocomplete" >
                                    </div>
                                    <div class="col s2 right-align">
                                        <i class="material-icons" >search</i>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        <input type="submit" name="search" value="search"/>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- End -->
        <!-- Middle Content Section -->
        @yield('section_content')
        <!-- Middle Content Section Ends-->



        <!-- Footer starts -->

        <footer id="page-footer">
            <div class="inner">
                <section id="footer-main">
                    <div class="container">
                        <div class="row">
                            <div class="col s12 m4">
                                <article>
                                    <h3>{{trans('words.Azizi Developments')}}</h3>
                                    <?php $Style_AR = $locale == 'ar' ? '-ar' : '' ?>
                                    <p class="FooterAbout<?= $Style_AR ?>"><?= $setting['description_en'] ?></p>
                                </article>
                            </div>
                            <div class="col s12 m3 Quicklinks<?= $Style_AR ?>">
                                <article class="contact-us">
                                    <h3><?= trans('words.Contact Us') ?></h3>

                                    <?= $locale == 'en' ? '<address>Suite No. 805, Conrad Hotel, <br/>Sheikh Zayed Road, Dubai, UAE</address>' : ''; ?>

                                    <?php if ($locale == 'ar') { ?>
                                        <address>
                                            جناح رقم 805 ، فندق كونراد ، شارع الشيخ زايد ، دبي ، الإمارات العربية المتحدة
                                        </address>
                                    <?php } ?>
                                    <?= trans('words.Toll Free') ?>: 
                                    <?= $locale == 'ar' ? '<a href="#" class="telephone" data-telephone="80029494">(29494)800AZIZI</a><br>' : '<a href="#" class="telephone" data-telephone="80029494">800 AZIZI (29494)</a><br>'; ?>                                    


                                    <?= $locale == 'cn' ? '<address>阿联酋，迪拜，谢赫扎伊德路，API World Tower，902/904号办公室</address>' : '' ?>
                                    <?= trans('words.Tel') ?>:                                     
                                    <?= $locale == 'en' || $locale == 'cn' ? '<a href="#" class="telephone" data-telephone="97143596673">+971 4 359 6673</a><br>' : ''; ?>                                    
                                    <?= $locale == 'ar' ? '<a href="#" class="num-fo telephone" data-telephone="97143596673">97143596673+</a><br>' : '' ?>

                                    <?= trans('words.Fax') ?>: 
                                    <?= $locale == 'ar' ? '<span class="num-fo" >97143329102+</span><br>' : '<span>+97143329102</span><br>' ?>


                                    <?php if ($locale == 'ar') { ?>
                                        <?= trans('words.Email') ?>: <a id="foo-email" href="" class=" num-fo f-s-12"></a><br/>
                                    <?php } else { ?>
                                        <?= trans('words.Email') ?>: <a id="foo-email" href="" class=" num-fo"></a><br/>
                                    <?php } ?>


                                    <!-- <span>Working hours: <span class='txt-white'>9am - 6pm, Sun-Thu</span></span> -->

                                    <div>
                                        <a target="_blank" href="https://www.facebook.com/AziziGroup/" class="socialIcon"><i class="ion-social-facebook"></i></a>
                                        <a target="_blank" href="https://www.instagram.com/azizigroup/?hl=en" class="socialIcon"><i  class="ion-social-instagram"></i></a>
                                        <a target="_blank" href="https://www.linkedin.com/company/azizi-developments" class="socialIcon"><i  class="ion-social-linkedin"></i></a>
                                        <!--<a target="_blank" href="https://plus.google.com/u/0/107107586826814442634" class="socialIcon"><i  class="ion-social-googleplus"></i></a>-->
                                        <a target="_blank" href="https://twitter.com/azizigroup?lang=en" class="socialIcon"><i  class="ion-social-twitter"></i></a>
                                        <a target="_blank" href="https://www.youtube.com/channel/UCmUtuRMwJxaovjGBNSXx-Jw" class="socialIcon"><i  class="ion-social-youtube"></i></a>
                                    </div>

                                </article>
                            </div>
                            <!-- /.col-sm-3 -->

                            <div class="col s12 m2 Quicklinks<?= $Style_AR ?>">
                                <article>
                                    <h3>{{trans('words.Quick Links')}}</h3>
                                    <ul class="list-unstyled list-links">
                                        @foreach ($footers_part1 as $fmenu)
                                        <li>
                                            @if($fmenu['slug']=="javascript:void(0)")
                                            <a href="<?= $fmenu['slug'] ?>"><?= $fmenu['title_en'] ?></a> 
                                            @else
                                            <a href="{{ url('/') }}/{{$locale}}/<?= $fmenu['slug'] ?>"><?= $fmenu['title_en'] ?></a>
                                            @endif

                                        </li>
                                        @endforeach
                                        <li>
                                            <a href="mailto:careers@azizidevelopments.com?Subject=Applying%20for%20Job" target="_top">Careers</a>
                                        </li>

                                    </ul>
                                </article>            
                            </div>
                            <!-- /.col-sm-3 -->

                            <div class="col s12 m3">
                                <?php if (!empty($_GET['demo'])) { ?>
                                    @include('include.news-letter')
                                <?php } ?>
                            </div>
                            <!-- /.col-sm-3 -->


                        </div><!-- /.row -->
                    </div><!-- /.container -->
                </section><!-- /#footer-main -->
                <section id="footer-thumbnails" class="footer-thumbnails"></section><!-- /#footer-thumbnails -->
                <section id="footer-copyright">

                    @if($locale=='ar')
                    <div class="container directionInitial">
                        <a href="{{url('/delete-session')}}"  class="floatRight">حقوق الطبع والنشر لعام 2017 محفوظة لصالح شركة عزيزي للتطوير العقاري</a> 
                        <img class="floatLeft bank-logo" alt="master-card" src="{{asset('assets/img/')}}/master-card.png" >
                        <img class="floatLeft bank-logo" alt="visa" src="{{asset('assets/img/')}}/visa.png" >
                        <span class="floatLeft">:نحن نقبل</span>
                    </div>
                    @else
                    <div class="container">

                        <a href="{{url('/delete-session')}}" >{{trans('words.copyright_string')}}</a> 
                        <img class="floatRight bank-logo" alt="master-card" src="{{asset('assets/img/')}}/master-card.png">
                        <img class="floatRight bank-logo" alt="visa" src="{{asset('assets/img/')}}/visa.png">
                        <span class="floatRight">{{trans('words.We accept')}}:</span>
                    </div>
                    @endif


                </section>
            </div><!-- /.inner -->
        </footer>

        <!-- Footer Ends -->

        <!-- Enquire Now -->
        <div id="enquire-now" class="modal" style="max-width: 350px; top:55px;max-height: 100%;">
            <div class="modal-content book-now" style="padding:15px">
                <div class="modal-header" style="border: none;">
                    <a href="#!" class="modal-close waves-effect waves-green btn-flat " style=" width: 33px; position: absolute; right: 10px;top:5px;font-size: 30px; ">&times;</a>
                    <h4 class="modal-title">{{trans('words.ENQUIRE NOW')}}</h4>
                </div>
                <div class="row">
                    <div class="col s12" style="padding: 0;">
                        <iframe src="<?=SITE_URL?>/<?= $locale ?>/lead-form/" border="0" style="width:100%;height:270px;border:none;"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <!-- End -->


        <!-- Footer Scripts -->
        @yield('footer_main_scripts')


        <script type="text/javascript" src="{{asset('assets/js/materialize.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/js/az-scripts.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/js/aos.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/js/jquery.scrollify.js')}}"></script>


        <!-- begin page level js -->
        @yield('footer_scripts')
        <script>@stack('scripts')</script>

        <!-- Twitter single-event website tag code -->
        <script src="https://platform.twitter.com/oct.js" type="text/javascript"></script>
        <script type="text/javascript">twttr.conversion.trackPid('nx7zm', {tw_sale_amount: 0, tw_order_quantity: 0});</script>
        <noscript>
        <img height="1" width="1" class="none" alt="Twitter - AZIZI Developments" src="https://analytics.twitter.com/i/adsct?txn_id=nx7zm&p_id=Twitter&tw_sale_amount=0&tw_order_quantity=0" />
        <img height="1" width="1" class="none" alt="Twitter - AZIZI Developments" src="https://t.co/i/adsct?txn_id=nx7zm&p_id=Twitter&tw_sale_amount=0&tw_order_quantity=0" />
        </noscript>
        <!-- End Twitter single-event website tag code -->

        <script>
            $(document).ready(function () {
                setTimeout(function () {
                    $("#blue-tags-div").prev("img").hide();
                    imginit();
                }, 1500);
                $("a[href$='index.html']").attr('href', '<?=SITE_URL?>/cityscape-lp/index.html');
                $("a[href$='Default.aspx']").attr('href', 'http://www.azizicareers.com/CS/Default.aspx');

            });
            setTimeout(function () {
                jQuery.ajax({url: '<?= url('cache-page') ?>', cache: false, data: {page_url: '<?= $curr_url ?>', user_id: '1'}, success: function (html) { }});

                var data = {meta_title: $('title').text(),
                    meta_desc: $('meta[name="description"]').attr('content'),
                    meta_key: $('meta[name="keywords"]').attr('content'),
                    page_url: '<?= Request::url() ?>'};
                jQuery.ajax({url: '<?= url('save-meta') ?>', method: 'post', cache: false, data: data, success: function (html) { }});
            }, 3000);


            var string1 = "info";
            var string2 = "@";
            var string3 = "azizidevelopments.com";
            var string4 = string1 + string2 + string3;
            $('#foo-email').attr("href", "mail" + "to:" + string4).text(string4);
            //$('#foo-email').text(string4);

            $('.telephone').click(function (e) {
                event.preventDefault();
                window.open('tel:' + $(this).data('telephone'), "_top");
                console.log('click');
            });

            function imginit() {
                var imgDefer = document.getElementsByTagName('img');
                for (var i = 0; i < imgDefer.length; i++) {
                    if (imgDefer[i].getAttribute('data-src')) {
                        imgDefer[i].setAttribute('src', imgDefer[i].getAttribute('data-src'));
                    }
                }

                var iframeDefer = document.getElementsByTagName('iframe');
                for (var i = 0; i < iframeDefer.length; i++) {
                    if (iframeDefer[i].getAttribute('data-src')) {
                        iframeDefer[i].setAttribute('src', iframeDefer[i].getAttribute('data-src'));
                    }
                }

                var divBgImageDefer = document.getElementsByTagName('div');

                for (var i = 0; i < divBgImageDefer.length; i++) {
                    if (divBgImageDefer[i].getAttribute('data-original')) {
                        divBgImageDefer[i].style.backgroundImage = 'url(' + divBgImageDefer[i].getAttribute('data-original') + ')';
                        divBgImageDefer[i].style.backgroundPosition = 'center';
                        divBgImageDefer[i].style.backgroundSize = 'cover';
                    }
                }
            }

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

        </script>

    </body>
</html>