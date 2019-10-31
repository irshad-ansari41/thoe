<?php
$meta = DB::table('tbl_meta')->where('page_url', Request::url())->first();
if (!empty($meta) && !empty($meta->meta_title)) {
    $meta_id = $meta->id;
    $meta_title = $og_title = $meta->meta_title;
    $meta_description = $meta->meta_desc;
    $meta_keyword = $meta->meta_key;
}

/* Preload Setting */
$locale = get_locale(Request::segment(1));
$records_menu = get_menu($locale, 1);
$footers_part1 = get_menu($locale, 2, 7, 0);
$footers_part2 = get_menu($locale, 2, 6, 5);
$setting = get_setting($locale);
$ptype = 1;

$curr_url = str_replace('http:', PROPTOCOL, Request::url());
$full_url = str_replace('http:', PROPTOCOL, Request::fullurl());
$home_url = SITE_URL;
$site_url = $home_url . '/' . $locale;
$ip = '//' . SITE_IP;

$hreflang = $locale == 'en' ? 'en' : ($locale == 'ar' ? 'ar' : ($locale == 'cn' ? 'zh' : ''));

if (!empty(Request::segment(1)) && !empty(Request::segment(2))) {
    $en_url = str_replace(['/en/', '/ar/', '/cn/'], '/en/', $full_url);
    $ar_url = str_replace(['/en/', '/ar/', '/cn/'], '/ar/', $full_url);
    $cn_url = str_replace(['/en/', '/ar/', '/cn/'], '/cn/', $full_url);
} else if (!empty(Request::segment(1))) {
    $en_url = str_replace(['/en', '/ar', '/cn'], '/en', $full_url);
    $ar_url = str_replace(['/en', '/ar', '/cn'], '/ar', $full_url);
    $cn_url = str_replace(['/en', '/ar', '/cn'], '/cn', $full_url);
} else {
    $en_url = SITE_URL . '/en';
    $ar_url = SITE_URL . '/ar';
    $cn_url = SITE_URL . '/cn';
    $hreflang = 'en';
}

if (strpos($curr_url, 'news-pr/') !== false && empty($press->title_ar)) {
    $ar_url = '';
}
if (strpos($curr_url, 'events/') !== false && empty($content->event_title_ar)) {
    $ar_url = '';
}
?>

<!DOCTYPE html>
<html lang="{{$hreflang}}">
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
        <!--link rel="alternate" href="{{$site_url}}" hreflang="{{$hreflang}}"/-->
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
        <meta name="insight-app-sec-validation" content="525fc7f0-20d9-4261-8822-a3f8e12821ab">




        <link href="<?= PROPTOCOL ?>//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/materialize.min.css') }}" media="screen,projection" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/az-styles.css') }}?version=<?= date('y-m-d-h') ?>">
        <link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/ionicons.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/aos.css') }}">

        <!--<link rel="stylesheet" type="text/css" href="{{ asset('assets/slideshow-new/css/style1.css')}}" />-->



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
        <link href="<?= PROPTOCOL ?>//fonts.googleapis.com/css?family=Open+Sans|Open+Sans+Condensed:300,700" rel="stylesheet">
        <style>
            #page-footer .inner{display:table;width:100%;color:#dadada}#page-footer .inner #footer-main,.wide-2 .white{background-color:#ededed}#page-footer .inner #footer-main{padding:40px 0}#page-footer .inner .contact-us,footer a,footer a:visited,footer li,footer p{font-size:13px;color:#000;line-height:1.75;font-family:"Open Sans",sans-serif}address{margin-bottom:20px;font-style:normal;line-height:1.42857143}#page-footer .inner #footer-copyright{background-color:#1b1d20;display:table;padding:20px 0;width:100%}#page-footer .inner #footer-copyright a{font-size:14px;color:#dadada;opacity:.5}#page-footer .inner #footer-copyright .bank-logo{height:25px;vertical-align:middle;margin-right:7px;margin-left:8px}.pull-right{float:right!important}#page-footer .inner #footer-copyright span{opacity:.5;line-height:26px}
            @media only screen and (max-width: 768px){
                .button-collapse{border-right:0 !important;}
                /*.containerlog{position: relative; left:-30px !important;}*/
            }
        </style>
        <!-- End -->

        <!-- Google Tag Manager -->
        <!--script>(function (w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({'gtm.start': new Date().getTime(), event: 'gtm.js'});
                var f = d.getElementsByTagName(s)[0], j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
                j.async = true;
                j.src = "<?= PROPTOCOL ?>//www.googletagmanager.com/gtm.js?id=" + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer', 'GTM-559DSQ');</script-->
        <!-- End Google Tag Manager -->


        <!--page level css-->
        @yield('header_styles')
        <!--end of page level css-->


        <script async src="{{asset('assets/js/modernizr.js')}}"></script>
        @if(isset($schema_tag))
        <?= $schema_tag ?>
        @endif

        <?php
        $min = '4.4';
        $max = '4.8';
        $reviewCount = rand(1, 1000);
        $RatingValue = number_format(rand($min * $reviewCount, $max * $reviewCount) / $reviewCount, 1);
        $RatingCount = 5;
        $ReviewCount = $reviewCount = rand(1, 1000);
        ?>
        <script type='application/ld+json'>
            {
            "@context": "<?= PROPTOCOL ?>//schema.org/",
            "@type": "Product",
            "name": "Azizi Developments",
            "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "<?= !empty($AllRatings->ratingvalue) ? $AllRatings->ratingvalue : $RatingValue ?>",
            "ratingCount": "<?= !empty($AllRatings->ratingcount) ? $AllRatings->ratingcount : $RatingCount; ?>",
            "reviewCount": "<?= !empty($AllRatings->reviewcount) ? $AllRatings->reviewcount : $reviewCount; ?>"
            }
            }
        </script>

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
        <noscript><iframe src="<?= PROPTOCOL ?>//www.googletagmanager.com/ns.html?id=GTM-559DSQ"
                          height="0" width="0" class="hidden none"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->


        @yield('main_div_wrapper')

        <section class="sticky">
            <div class="container">
                <a class="logo <?= $locale == 'ar' ? 'floatRight' : 'floatLeft' ?>" href="<?= url("/") ?>" title="" rel="home">
                    <?php $logo = $locale == 'ar' ? $setting['mobile_wh_ar'] : ($locale == 'cn' ? $setting['mobile_wh_en'] : $setting['mobile_wh_en']); ?>
                    <img alt="Azizi Developments" src="<?= asset('assets/images/logo/') ?>/<?= $logo ?>" class="containerlog">
                </a>
                <!--a href="#" data-activates="mobile-demo" class="button-collapse <?= $locale == 'ar' ? 'floatLeft' : 'floatRight' ?> ">
                    <i class="large material-icons">menu</i>
                </a-->
                <ul class="nav navbar-nav topmg <?= $locale == 'ar' ? 'floatLeft' : 'floatRight' ?>">
                    <!--li><a id="offer-icon" href="<?= SITE_URL ?>/{{$locale}}/<?=OFFERS_URL?>"><span><?=OFFERS_Name?></span></a></li-->
                    <li><a id="call-icon" class="telephone" data-telephone="80029494"><i class="ion-android-call"></i><span>Call Us 800 (AZIZI) 29494</span></a></li>
                    <li><a id="mail-icon" class="modal-trigger" href="#enquire-now"><i class="ion-android-mail"></i><span>{{trans('words.register-your-interest')}}</span></a></li>                    
                    <li>
                        <a data-activates="mobile-demo" class="button-collapse <?= $locale == 'ar' ? 'floatLeft' : 'floatRight' ?> ">
                            <i class="large material-icons">menu</i>
                        </a>
                    </li>
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
                        <?php if (!empty($menu['submenus'])) { ?>
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

                <!--ul class="<?= $locale == 'ar' ? 'left' : 'right' ?> large-menu">
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
                </ul-->


            </div>
        </nav>




        <div class="container">
            <div class="nav-wrapper">    
                <div class="side-nav" id="mobile-demo">
                    <div class="row m0 bt3">
                        <div class="col s12 p0 bb1">
                            <?php //$logo = $locale == 'en' ? 'azizi-logo.png' : 'logo/1520924041615925084.png' ?>
                            <?php $logo = $locale == 'ar' ? $setting['mobile_bl_ar'] : ($locale == 'cn' ? $setting['mobile_bl_en'] : $setting['mobile_bl_en']); ?>
                            <img alt="Azizi Developments" src="<?= SITE_URL ?>/assets/images/logo/{{$logo}}" class="responsive-img img1">
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
                                            @if(!empty($menu['submenus']))
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
                        <div class="row" style="margin-bottom:0">
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

                                    <?= $locale == 'en' ? '<address>Suite No. 805 (Customer Service)<br/> Suite No. 1302 (Sales)<br/> Conrad Hotel, <br/>Sheikh Zayed Road, Dubai, UAE</address>' : ''; ?>

                                    <?php if ($locale == 'ar') { ?>
                                        <address>
                                            جناح رقم 805 (التسويق)<br/>جناح رقم 1302 (خدمة العملاء) <br/> فندق كونراد ،<br/> شارع الشيخ زايد ، دبي ، الإمارات العربية المتحدة
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
                                        <a target="_blank" href="<?= PROPTOCOL ?>//www.facebook.com/AziziGroup/" class="socialIcon"><i class="ion-social-facebook"></i></a>
                                        <a target="_blank" href="<?= PROPTOCOL ?>//www.instagram.com/azizigroup/?hl=en" class="socialIcon"><i  class="ion-social-instagram"></i></a>
                                        <a target="_blank" href="<?= PROPTOCOL ?>//www.linkedin.com/company/azizi-developments" class="socialIcon"><i  class="ion-social-linkedin"></i></a>
                                        <!--<a target="_blank" href="<?= PROPTOCOL ?>//plus.google.com/u/0/107107586826814442634" class="socialIcon"><i  class="ion-social-googleplus"></i></a>-->
                                        <a target="_blank" href="<?= PROPTOCOL ?>//twitter.com/azizigroup?lang=en" class="socialIcon"><i  class="ion-social-twitter"></i></a>
                                        <a target="_blank" href="<?= PROPTOCOL ?>//www.youtube.com/channel/UCmUtuRMwJxaovjGBNSXx-Jw" class="socialIcon"><i  class="ion-social-youtube"></i></a>
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
                                            <a href="mailto:careers@<?= DOMAIN_NAME ?>?Subject=Applying%20for%20Job" target="_top">Careers</a>
                                        </li>

                                    </ul>
                                </article>            
                            </div>
                            <!-- /.col-sm-3 -->

                            <div class="col s12 m3">
                                @include('include.news-letter')
                            </div>
                            <!-- /.col-sm-3 -->


                        </div><!-- /.row -->
                    </div><!-- /.container -->
                </section><!-- /#footer-main -->
                <section id="footer-thumbnails" class="footer-thumbnails"></section><!-- /#footer-thumbnails -->
                <section id="footer-copyright">

                    @if($locale=='ar')
                    <div class="container directionInitial">
                        <a href="#"  class="floatRight"><?= trans('words.copyright_string') ?></a> 
                        <img class="floatLeft bank-logo" alt="master-card" src="{{asset('assets/img/')}}/master-card.png" >
                        <img class="floatLeft bank-logo" alt="visa" src="{{asset('assets/img/')}}/visa.png" >
                        <span class="floatLeft">:نحن نقبل</span>
                    </div>
                    @else
                    <div class="container">
                        <a href="#" >{{trans('words.copyright_string')}}</a> 
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
        <div id="enquire-now" class="modal" style="">
            <div class="modal-content book-now">
                <div class="modal-header">
                    <span class="close modal-close waves-effect waves-green btn-flat txt-white"  style="<?= $locale == 'ar' ? 'left: 10px;' : 'right: 10px;' ?>" data-dismiss="modal">&times;</span>
                    <h4 class="modal-title txt-white">{{trans('words.ENQUIRE NOW')}}</h4>
                </div>
                <div class="row" style="margin-top: 15px; margin-bottom: 0;">
                    <div class="col s12">
                        <iframe src="<?= SITE_URL ?>/<?= $locale ?>/lead-form" class="iframe-lead-form" border="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <!-- End -->


        <!-- Footer Scripts -->
        @yield('footer_main_scripts')


        <!--script type="text/javascript" src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/js/materialize.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/js/az-scripts.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/js/aos.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/js/jquery.scrollify.js')}}"></script-->


        <!-- begin page level js -->
        @yield('footer_scripts')
        <script>@stack('scripts')</script>

        <!-- Twitter single-event website tag code -->
        <script src="<?= asset('assets/js/') ?>/othersjs/twitter/oct.js" type="text/javascript"></script>
        <script type="text/javascript">twttr.conversion.trackPid('nx7zm', {tw_sale_amount: 0, tw_order_quantity: 0});</script>
        <noscript>
        <img height="1" width="1" class="none" alt="Twitter - AZIZI Developments" src="<?= PROPTOCOL ?>//analytics.twitter.com/i/adsct?txn_id=nx7zm&p_id=Twitter&tw_sale_amount=0&tw_order_quantity=0" />
        <img height="1" width="1" class="none" alt="Twitter - AZIZI Developments" src="<?= PROPTOCOL ?>//t.co/i/adsct?txn_id=nx7zm&p_id=Twitter&tw_sale_amount=0&tw_order_quantity=0" />
        </noscript>
        <!-- End Twitter single-event website tag code -->
    </body>
</html>

