<?php
$meta = DB::table('tbl_meta')->where('page_url', Request::url())->first();
if (!empty($meta)) {
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
?>

<!DOCTYPE html>
<html lang="{{$hreflang}}">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="57x57" href="<?= asset('assets/favicon') ?>/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="<?= asset('assets/favicon') ?>/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?= asset('assets/favicon') ?>/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="<?= asset('assets/favicon') ?>/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?= asset('assets/favicon') ?>/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="<?= asset('assets/favicon') ?>/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="<?= asset('assets/favicon') ?>/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="<?= asset('assets/favicon') ?>/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?= asset('assets/favicon') ?>/apple-icon-180x180.png">
        <link rel="icon" type="image/x-icon"  sizes="192x192"  href="<?= asset('assets/favicon') ?>/android-icon-192x192.png">
        <link rel="icon" type="image/x-icon"  sizes="32x32" href="<?= asset('assets/favicon') ?>/favicon-32x32.png">
        <link rel="icon" type="image/x-icon"  sizes="96x96" href="<?= asset('assets/favicon') ?>/favicon-96x96.png">
        <link rel="icon" type="image/x-icon"  sizes="16x16" href="<?= asset('assets/favicon') ?>/favicon-16x16.png">
        <link rel="manifest" href="<?= asset('assets/favicon') ?>/manifest.json">
        <!--link rel="alternate" href="{{$site_url}}" hreflang="{{$hreflang}}"/-->
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="<?= asset('assets/favicon') ?>/ms-icon-144x144.png">
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

        <link rel="canonical" href="https://azizidevelopments.com/">
        <link rel="stylesheet" href="<?= asset('assets/css/ionicons.css') ?>" type="text/css">
        <link rel="stylesheet" href="<?= asset('assets/css/awesome-bootstrap-owl-style-custom-cmp.css') ?>?version=<?= date('y-m-d') ?>" type="text/css">

        <?php if ($locale == 'ar') { ?>
            <style>
                .navigation .navbar .navbar-nav > li > .child-navigation > li {
                    border-bottom: 1px solid #eee;
                    width: 100%;
                }
                .navigation .navbar .navbar-nav > li .child-navigation {
                    right: -160px !important; min-width:190px !important; top:24px!important;
                }
                .FooterAboutAr {
                    margin: 0 0 8px 0;
                    padding-left: 100px !important;
                    width: auto;
                }
                #close-menu {
                    position: relative !important;
                    right: -15px;
                    font-size: 40px;
                } 
                @media screen and (max-width: 768px) {
                    .fmob{ float: left !important; text-align: left !important;}
                    .fcopyright{float: right !important; text-align:right !important;}
                }
            </style>
        <?php } ?>

        <?php if ($locale == 'cn') { ?>
            <style>
                .sp-caption-container {
                    text-align: left !important;
                    margin-top: 10px;
                }
            </style>
        <?php } ?>

        <?php if ($locale == 'ar') { ?>
            <link rel="stylesheet" href="<?= asset('assets/ar-font/stylesheet.css') ?>" type="text/css">

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
                .navigation .navbar a.drop-left, .navigation .navbar a.drop-close{padding: 35px 35px 35px 30px;}
                .navigation .navbar .navbar-brand { padding: 10px 10px 10px 0px; }                
            </style>
        <?php } ?>


        <!-- New footer style -->
        <style>
            #page-footer .inner{display:table;width:100%;color:#dadada}#page-footer .inner #footer-main,.wide-2 .white{background-color:#ededed}#page-footer .inner #footer-main{padding:40px 20px}#page-footer .inner .contact-us,footer a,footer a:visited,footer li,footer p{font-size:13px;color:#000;line-height:1.75;font-family:"Open Sans",sans-serif}address{margin-bottom:20px;font-style:normal;line-height:1.42857143}#page-footer .inner #footer-copyright{background-color:#1b1d20;display:table;padding:20px 0;width:100%}#page-footer .inner #footer-copyright a{font-size:14px;color:#dadada;opacity:.5}#page-footer .inner #footer-copyright .bank-logo{height:25px;vertical-align:middle;margin-right:7px;margin-left:8px}.pull-right{float:right!important}#page-footer .inner #footer-copyright span{opacity:.5;line-height:26px}
            .whtslive{ position: fixed; right: 2px; bottom: 60px;}
            .whtslivea{width: 55px; border:none !important; background: inherit !important;}
        </style>
        <!-- End -->


        <!-- Google Tag Manager -->
        <script>
            (function (w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({'gtm.start': new Date().getTime(), event: 'gtm.js'});
                var f = d.getElementsByTagName(s)[0], j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
                j.async = true;
                j.src = "<?= PROPTOCOL ?>//www.googletagmanager.com/gtm.js?id=" + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer', 'GTM-559DSQ');
        </script>
        <!-- End Google Tag Manager -->
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56309380-1"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-56309380-1', { 'optimize_id': 'GTM-K4B433M'});
        </script>        

        <!--page level css-->
        @yield('header_styles')
        <!--end of page level css-->
        <?php if (isset($schema_tag)) { ?>
            <?= $schema_tag ?>
        <?php } ?>

        <?php 
            $min = '4.4'; $max = '4.8';
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
            "ratingValue": "<?=!empty($AllRatings->ratingvalue) ? $AllRatings->ratingvalue : $RatingValue?>",
            "ratingCount": "<?=!empty($AllRatings->ratingcount) ? $AllRatings->ratingcount : $RatingCount;?>",
            "reviewCount": "<?=!empty($AllRatings->reviewcount) ? $AllRatings->reviewcount: $reviewCount; ?>"
            }
            }
        </script>
    </head>

    <body class="<?= $locale == 'ar' ? 'txtRight' : 'txtLeft' ?>">

        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe data-src="<?= PROPTOCOL ?>//www.googletagmanager.com/ns.html?id=GTM-559DSQ" height="0" width="0" class="hidden none"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->

        @yield('main_div_wrapper')


        <section class="sticky">
            <div class="container">
                <a class="logo <?= $locale == 'ar' ? 'floatRight' : 'floatLeft' ?>" href="<?= url("/") ?>" title="" rel="home">
                    <?php $logo = $locale == 'ar' ? $setting['mobile_wh_ar'] : ($locale == 'cn' ? $setting['mobile_wh_en'] : $setting['mobile_wh_en']); ?>
                    <img alt="Azizi Developments" src="<?= asset('assets/images/logo/') ?>/<?= $logo ?>" class="containerlog">
                </a>

                <a href="#" id="open-menu" class="<?= $locale == 'ar' ? 'floatLeft' : 'floatRight' ?> drop-left">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <ul class="nav navbar-nav topmg <?= $locale == 'ar' ? 'floatLeft' : 'floatRight' ?>">
                    <li><a id="offer-icon" href="<?= SITE_URL ?>/{{$locale}}/<?=OFFERS_URL?>"><span><?=OFFERS_Name?></span></a></li>
                    <li><a id="call-icon" class="telephone" data-telephone="80029494"><i class="ion-android-call"></i><span>Call Us 800 (AZIZI) 29494</span></a></li>
                    <li><a id="mail-icon" data-toggle="modal" data-target="#lead-form-model" href="#lead-form-model"><i class="ion-android-mail"></i><span>{{trans('words.register-your-interest')}}</span></a></li>
                    <li>
                        <?php if ($locale == 'en') { ?>
                            <a href="<?= $ar_url ?>">  العربية</a>
                        <?php } elseif ($locale == 'ar') { ?>
                            <a href="<?= $en_url ?>"> English</a>
                        <?php } ?>
                    </li>
                </ul> 

            </div>
            <?php //echo '<pre style=color:red>';print_r($records_menu); echo '</pre>';      ?>
        </section>

        <!-- Home menu -->
        <div id="header" class="menu-wht">
            <div class="navigation">
                <header class="navbar" id="top">
                    <div class="container" style="padding:0px;">
                        <nav class="primary start main-menu">
                            <?php if (!empty($records_menu)) : ?>
                                <ul id="primary-menu-1" class="nav navbar-nav <?= $locale == 'ar' ? 'floatRight' : 'floatLeft' ?>">
                                    <?php foreach ($records_menu as $menu): ?>
                                        <?php if ($menu['title_en'] == 'E-Services') { ?>
                                        <?php } else { ?>
                                            <li class="active <?php
                                            if (!empty($menu['submenus'])) {
                                                echo 'has-child';
                                            }
                                            ?>">
                                                <a href="<?= url("/") ?>/<?= $locale ?>/<?= $menu['slug'] ?>">
                                                    <?= $menu['title_en'] ?>
                                                </a>
                                                <?php if (!empty($menu['submenus'])): ?> 
                                                    <ul class="child-navigation">
                                                        <?php foreach ($menu['submenus'] as $submenu): ?>
                                                            <li>
                                                                <a href="<?= url("/") ?>/<?= $locale ?>/<?= $submenu['slug'] ?>">
                                                                    <?= $submenu['title_en']; ?>
                                                                </a>
                                                            </li>
                                                        <?php endforeach; ?>    
                                                    </ul>
                                                <?php endif; ?>
                                            </li> 
                                        <?php } ?>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </nav>                            
                        <nav class="primary start main-menu">
                            <?php if (!empty($records_menu)) : ?>
                                <?php foreach ($records_menu as $menu): ?>
                                    <?php if ($menu['title_en'] == 'E-Services') { ?>
                                        <?php if (!empty($menu['submenus'])): ?> 
                                            <ul id="primary-menu-2" class="nav navbar-nav <?= $locale == 'ar' ? 'floatLeft' : 'floatRight' ?>">
                                                <?php foreach ($menu['submenus'] as $submenu): ?>
                                                    <li>
                                                        <a href="<?= url("/") ?>/<?= $locale ?>/<?= $submenu['slug'] ?>" style=" text-align: right !important;">
                                                            <?= $submenu['title_en']; ?>
                                                        </a>
                                                    </li>
                                                <?php endforeach; ?>    
                                            </ul>
                                        <?php endif; ?>
                                    <?php } ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </nav>                            
                    </div>
                    <div class="site-header">
                        <?php $MenuLocation = $locale == 'ar' ? 'left' : 'right'; ?>
                        <div class="mob-menu drop-close hidden" style="overflow:scroll;">
                            <?php $logo = $locale == 'en' ? 'azizi-logo.png' : 'logo/1520924041615925084.png' ?>
                            <a href="<?= $site_url ?>"><img alt="Azizi Developments" src="<?= SITE_URL ?>/assets/images/<?= $logo ?>" class="responsive-img img1 pull-<?= $pull = $locale == 'ar' ? 'right' : 'left'; ?>"></a>
                            <a href="#" id="close-menu" class="pull-<?= $MenuLocation ?> drop-close black-cross hidden"><span class="ion-ios-close-empty"></span></a>
                            <div class="bb2">                 
                                <a class="active txt-black" href="<?= $en_url ?>">English</a>&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;<a class="active txt-black" href="<?= $ar_url ?>">العربية</a>
                            </div>
                            <nav class="secondary">  
                                <?php if (!empty($records_menu)) : ?>
                                    <ul class="nav navbar-nav <?= $locale == 'ar' ? 'pull-left' : '' ?>">
                                        <?php foreach ($records_menu as $menu): ?>
                                            <?php if ($menu['title_en'] == 'E-Services') { ?>
                                                <?php if (!Sentinel::guest() && Sentinel::check()) { ?>
                                                    <li>
                                                        <a href="{{ url("/") }}/{{$locale}}/agent-dashboard">{{trans('words.agent_service')}}</a></a>
                                                    </li>
                                                <?php } else {
                                                    ?>
                                                    <li>
                                                        <a href="{{ url("/") }}/{{$locale}}/agent-login">{{trans('words.agent_service')}}</a></a>
                                                    </li>
                                                <?php }
                                                ?>
                                            <?php } else { ?>
                                                <li class="active <?php
                                                if (!empty($menu['submenus'])) {
                                                    echo 'has-child';
                                                }
                                                ?>"<?= $locale == 'ar' ? "style='margin-bottom:30px;'" : '' ?>>
                                                    <a href="<?= url("/") ?>/<?= $locale ?>/<?= $menu['slug'] ?>">
                                                        <?= $menu['title_en'] ?>
                                                    </a>
                                                    <?php if (!empty($menu['submenus'])): ?> 
                                                        <ul class="child-navigation">
                                                            <?php foreach ($menu['submenus'] as $submenu): ?>
                                                                <li>
                                                                    <a href="<?= url("/") ?>/<?= $locale ?>/<?= $submenu['slug'] ?>">
                                                                        <?= $submenu['title_en']; ?>
                                                                    </a>
                                                                </li>
                                                            <?php endforeach; ?>    
                                                        </ul>
                                                    <?php endif; ?>
                                                </li> 
                                            <?php } ?>
                                        <?php endforeach; ?>



                                    </ul>
                                <?php endif; ?>

                            </nav>
                            <!-- /.navbar collapse-->
                        </div>
                    </div>
                </header><!-- /.navbar -->
            </div>
        </div>
        <!-- Search Modal -->

        <div id="nav-search" class="modal">
            <h2 class="modal-action modal-close"><span class="ion-android-close"></span></h2>
            <div class="modal-content" >
                <div class="row">
                    <div class="col s12">
                        <div class="row">
                            <h5><?= trans('words.search_in_azizi_developments') ?></h5>
                            <div class="input-field col s12">
                                <form action="<?= url("$locale/search") ?>" name="searchform" id="searchform" method="post" enctype="multipart/form-data">
                                    <div class="col s10">
                                        <input type="text" name="searchtext" class="autocomplete" >
                                    </div>
                                    <div class="col s2 right-align">
                                        <i class="material-icons" >search</i>
                                        <input type="hidden" name="_token" value="<?= csrf_token() ?>" />
                                        <input type="submit" name="search" value="search" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- End home menu -->

        <!-- Middle Content Section -->
        @yield('section_content')
        <!-- Middle Content Section Ends-->

        <!-- Footer starts -->
        <footer id="page-footer">
            <div class="inner">
                <section id="footer-main">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 col-md-4">
                                <article>
                                    <h3><?= trans('words.Azizi Developments') ?></h3>
                                    <?php $Style_AR = $locale == "ar" ? "style='text-align:right;'" : '' ?>
                                    <p class="FooterAbout<?= $locale == "ar" ? 'Ar' : '' ?>" <?= $Style_AR ?>><?= $setting['description_en'] ?></p>
                                </article>
                            </div>
                            <!-- /.col-sm-3 -->
                            <div class="col-sm-4 col-md-3 Quicklinks">
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
                                    <?= $locale == 'ar' ? '<a href="#" class="num-fo telephone" data-telephone="97143596673">971 4 359 6673+</a><br>' : '' ?>

                                    <?= trans('words.Fax') ?>: 
                                    <?= $locale == 'ar' ? '<span class=" num-fo" >97143329102+</span><br>' : '<span class="">+971 4 332 9102</span><br>' ?>


                                    <?php if ($locale == 'ar') { ?>
                                        <?= trans('words.Email') ?>: <a id="foo-email" href="" class=" num-fo f-s-12"></a><br/>
                                    <?php } else { ?>
                                        <?= trans('words.Email') ?>: <a id="foo-email" href="" class=" num-fo"></a><br/>
                                    <?php } ?>


                                    <!-- <span>Working hours: <span class='txt-white'>9am - 6pm, Sun-Thu</span></span> -->

                                    <div>
                                        <a target="_blank" href="<?= PROPTOCOL ?>//www.facebook.com/AziziGroup/" class="socialIcon"><i class="fa fa-facebook"></i></a>
                                        <a target="_blank" href="<?= PROPTOCOL ?>//www.instagram.com/azizigroup/?hl=en" class="socialIcon"><i  class="fa fa-instagram"></i></a>
                                        <a target="_blank" href="<?= PROPTOCOL ?>//www.linkedin.com/company/azizi-developments" class="socialIcon"><i  class="fa fa-linkedin-square"></i></a>
                                        <!--<a target="_blank" href="<?= PROPTOCOL ?>//plus.google.com/u/0/107107586826814442634" class="socialIcon"><i  class="ion-social-googleplus"></i></a>-->
                                        <a target="_blank" href="<?= PROPTOCOL ?>//twitter.com/azizigroup?lang=en" class="socialIcon"><i  class="fa fa-twitter"></i></a>
                                        <a target="_blank" href="<?= PROPTOCOL ?>//www.youtube.com/channel/UCmUtuRMwJxaovjGBNSXx-Jw" class="socialIcon"><i  class="fa fa-youtube-play"></i></a>
                                    </div>

                                </article>
                            </div>
                            <!-- /.col-sm-3 -->
                            <div class="col-sm-4 col-md-2 Quicklinks">
                                <article>
                                    <h3><?= trans('words.Quick Links') ?></h3>
                                    <ul class="list-unstyled list-links">
                                        <?php foreach ($footers_part1 as $fmenu) { ?>
                                            <li>
                                                <?php if ($fmenu['slug'] == "javascript:void(0)") { ?>
                                                    <a href="<?= $fmenu['slug'] ?>"><?= $fmenu['title_en'] ?></a> 
                                                <?php } else { ?>
                                                    <a href="<?= url('/') ?>/<?= $locale ?>/<?= $fmenu['slug'] ?>"><?= $fmenu['title_en'] ?></a>
                                                <?php } ?>

                                            </li>
                                        <?php } ?>
                                        <li>
                                            <a href="mailto:careers@<?= DOMAIN_NAME ?>?Subject=Applying%20for%20Job" target="_top">Careers</a>
                                        </li>
                                    </ul>
                                </article>            
                            </div>
                            <!-- /.col-sm-3 -->
                            <div class="col-sm-4 col-md-3">
                                @include('include.news-letter')
                            </div>
                            <!-- /.col-sm-3 -->

                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container -->
                </section>
                <!-- /#footer-main -->
                <section id="footer-thumbnails" class="footer-thumbnails"></section><!-- /#footer-thumbnails -->
                <section id="footer-copyright">
                    <div class="container">
                        <div class="row">
                            <?php if ($locale == 'ar') { ?>
                                <a target="blank"><?= trans('words.copyright_string') ?></a> 
                                <img class="pull-left bank-logo" alt="master-card" src="" data-src="<?= asset('assets/img/') ?>/master-card.png" >
                                <img class="pull-left bank-logo" alt="visa" src="" data-src="<?= asset('assets/img/') ?>/visa.png">
                                <span class="pull-left"><?= trans('words.We accept') ?>:</span>
                            <?php } else { ?>
                                <a target="blank"><?= trans('words.copyright_string') ?></a> 
                                <img class="pull-right bank-logo" alt="master-card" src="" data-src="<?= asset('assets/img/') ?>/master-card.png">
                                <img class="pull-right bank-logo" alt="visa" src="" data-src="<?= asset('assets/img/') ?>/visa.png" >
                                <span class="pull-right"><?= trans('words.We accept') ?>:</span>
                            <?php } ?>
                        </div>
                    </div>
                </section>
            </div><!-- /.inner -->
        </footer>
        <!-- Footer Ends -->

        <!-- Popup -->

        <div class="modal" id="lead-form-model" role="dialog" >
            <div class="modal-dialog" style="max-width:350px">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close txt-white" data-dismiss="modal" style="<?= $locale == 'ar' ? 'left: 10px; top:10px;' : 'right: 10px; top:10px;' ?>">&times;</button>
                        <h4 class="modal-title txt-white">{{trans('words.ENQUIRE NOW')}}</h4>
                    </div>
                    <div class="modal-body" style="margin-bottom: 0; padding: 0px 5px; margin-top: 15px;">
                        <iframe src="<?= SITE_URL ?>/<?= $locale ?>/lead-form" class="iframe-lead-form"  border="0"></iframe>
                    </div>
                </div>
            </div>
        </div>

        <!-- End popup -->


        {{-- @include('include.popup-slider-bt') --}}


        <!-- Footer Scripts -->
        @yield('footer_main_scripts')
        <script type="text/javascript" src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>
        <script  src="<?= asset('assets/js/') ?>/jquery-bootstrap-carousel-cmp.js"></script>
        <script type="text/javascript" src="{{asset('assets/js/bootstrap-swipe-carousel.min.js')}}"></script>
        <script src="{{asset('assets/js/breakingNews.js')}}"></script>



        <script>
            if (parseInt($('#owl-demo-header').find('.item').length) <= 1) {
                t_f_header = false;
            } else {
                t_f_header = true;
            }
            $('#owl-demo-header').owlCarousel({
                items: 1,
                autoPlay: true,
                stopOnHover: true,
                pagination: true,
                nav: t_f_header,
                smartSpeed: 1500,
                loop: t_f_header,
                touchDrag: t_f_header,
                mouseDrag: t_f_header,
                navText: [
                    "<i class='fa fa-chevron-left'></i>",
                    "<i class='fa fa-chevron-right'></i>"
                ]
            });
        </script>

        <!-- begin page level js -->
        @yield('footer_scripts')
        <script>@stack('scripts')</script>

        <!-- Twitter single-event website tag code -->
        <script src="<?= asset('assets/js/') ?>/othersjs/twitter/oct.js" type="text/javascript"></script>
        <script type="text/javascript">twttr.conversion.trackPid('nx7zm', {tw_sale_amount: 0, tw_order_quantity: 0});</script>
        <noscript>
        <img height="1" width="1" class="none" alt="Twitter - AZIZI Developments" src="" data-src="<?= PROPTOCOL ?>//analytics.twitter.com/i/adsct?txn_id=nx7zm&p_id=Twitter&tw_sale_amount=0&tw_order_quantity=0" />
        <img height="1" width="1" class="none" alt="Twitter - AZIZI Developments" src="" data-src="<?= PROPTOCOL ?>//t.co/i/adsct?txn_id=nx7zm&p_id=Twitter&tw_sale_amount=0&tw_order_quantity=0" />
        </noscript>
        <!-- End Twitter single-event website tag code -->

        <script>


            $(document).ready(function () {
                $('#open-menu').click(function () {
                    $('#close-menu,.mob-menu').removeClass('hidden');
                    console.log(1);
                });
                $('#close-menu').click(function () {
                    $('#close-menu,.mob-menu').addClass('hidden');
                    $('#open-menu').removeClass('hidden');
                    console.log(2);
                });
                setInterval(function () {
                    $('.owl-next').click();
                }, 10000);
                setTimeout(function () {
                    imginit();
                }, 1000);
                setTimeout(function () {
                    $("#blue-tags-div").prev("img").hide();
                }, 3000);
                $("a[href$='index.html']").attr('href', '<?= SITE_URL ?>/cityscape-lp/index.html');

            });
            setTimeout(function () {
                jQuery.ajax({url: '<?= url('cache-page') ?>', cache: false, data: {page_url: '<?= $curr_url ?>', user_id: '1'}, success: function (html) { }});

                var data = {meta_id: '<?= !empty($meta_id) ? $meta_id : 0 ?>', meta_title: $('title').text(),
                    meta_desc: $('meta[name="description"]').attr('content'),
                    meta_key: $('meta[name="keywords"]').attr('content'),
                    page_url: '<?= Request::url() ?>'};
                jQuery.ajax({url: '<?= url('save-meta') ?>', method: 'post', cache: false, data: data, success: function (html) { }});
            }, 3000);
            var string1 = "info";
            var string2 = "@";
            var string3 = "<?= DOMAIN_NAME ?>";
            var string4 = string1 + string2 + string3;
            $('#foo-email').attr("href", "mail" + "to:" + string4).text(string4);
            //$('#foo-email').text(string4);

            $('.telephone').click(function (e) {
                event.preventDefault();
                window.open('tel:' + $(this).data('telephone'), "_top");
            });


            var popupSlider = localStorage.getItem('popupSlider');
            var today = '<?= date('d-m-Y') ?>';
            if (popupSlider === null && popupSlider !== today) {
                $('#videoURL').attr('src', '<?= PROPTOCOL ?>//www.youtube.com/embed/WXI9386UcR0?autoplay=1&rel=0&loop=1&playlist=WXI9386UcR0');
                $('#modelPopupSlider').modal({backdrop: 'static', keyboard: false});
            }
            if (popupSlider !== today) {
                $('#videoURL').attr('src', '<?= PROPTOCOL ?>//www.youtube.com/embed/WXI9386UcR0?autoplay=1&rel=0&loop=1&playlist=WXI9386UcR0');
                $('#modelPopupSlider').modal({backdrop: 'static', keyboard: false});
            }

            $('#modelPopupSlider').on('hidden.bs.modal', function () {
                localStorage.setItem('popupSlider', '<?= date('d-m-Y') ?>');
                $('#modelPopupSlider').modal('hide');
                $('#videoURL').attr('src', '#');
            });
            $('#learnMore').on('click', function () {
                localStorage.setItem('popupSlider', '<?= date('d-m-Y') ?>');
                $('#modelPopupSlider').modal('toggle');
                $('.close').trigger('click');
                $('#videoURL').attr('src', '#');
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
            var medium = url.searchParams.get("utm_medium");
            var content = url.searchParams.get("utm_content");
            var term = url.searchParams.get("utm_term");

            if (source !== '' && source !== null) {
                sessionStorage.setItem("utm_source", capitalize(source.replace("-", " ")));
            } else {
                sessionStorage.setItem("utm_source", 'Website');
            }
            if (campaign !== '' && campaign !== null) {
                sessionStorage.setItem("utm_campaign", capitalize(campaign.replace("-", " ")));
            } else {
                sessionStorage.setItem("utm_campaign", 'Home Page Sticky Bar');
            }
            if (medium !== '' && medium !== null) {
                sessionStorage.setItem("utm_medium", capitalize(medium.replace("-", " ")));
            }
            if (content !== '' && content !== null) {
                sessionStorage.setItem("utm_content", capitalize(content.replace("-", " ")));
            }
            if (term !== '' && term !== null) {
                sessionStorage.setItem("utm_term", capitalize(term.replace("-", " ")));
            }
            sessionStorage.setItem("lead_url", '<?= Request::fullurl() ?>');
            sessionStorage.setItem("thank_url", '<?= url("{$locale}/thank-you") ?>');
            sessionStorage.setItem("website_page_url", '<?= url("{$locale}") ?>');

//            $('#lead-form-model').click(function () {
//                sessionStorage.setItem("utm_campaign", $(this).data('campaign'));
//                $('iframe').each(function () {
//                    this.contentWindow.location.reload(true);
//                });
//            });

            function capitalize(str) {
                strVal = '';
                str = str.split(' ');
                for (var chr = 0; chr < str.length; chr++) {
                    strVal += str[chr].substring(0, 1).toUpperCase() + str[chr].substring(1, str[chr].length) + ' ';
                }
                return strVal;
            }
            /*$(function(){
                var screenwidth = $(window).width();
                var redirectpage ='';
                console.log(screenwidth);
                if(screenwidth <= '800'){ redirectpage = '<?= url('home-four') ?>'; }
                else if(screenwidth >= '801'){ redirectpage = '<?= url('/en') ?>';}
                window.location.href = redirectpage;
                console.log(redirectpage);
                return false;
            });*/
            
        </script>
        <?PHP if(!empty($_GET['test']) && $_GET['test']==1):?>
            <!--script type="text/javascript">
            (function(w, d, s, u) {
                    w.Verloop = function(c) { w.Verloop._.push(c) }; w.Verloop._ = []; w.Verloop.url = u;
                    var h = d.getElementsByTagName(s)[0], j = d.createElement(s); j.async = true;
                    j.src = 'https://azizidevelopments.verloop.io/livechat/script.min.js';
                    h.parentNode.insertBefore(j, h);
            })(window, document, 'script', 'https://azizidevelopments.verloop.io/livechat');
            </script-->
            
            <a href="http://wa.me/97180029494" target="_blank" class="whtslive">
                <img src="https://azizidevelopments.com/PRLNewsLetters/PRLW/clogo/WhatsApp-logo.png" alt="WhtatsApp" class="whtslivea img-responsive img-thumbnail"/>            
            </a>
        <?PHP  endif; ?>

        <!--Mobile Responsive area -->
        <section class="MobSection">
            <div class="container">
                <div class="Mobilestickfrm">
                    <span class="ffs-bs">
                        <a data-toggle="modal"  data-target="#lead-form-model" class="btn btn-default  pointer">
                            <i class="ion-android-mail" style="font-size:15px;"></i>
                            &nbsp; <?= trans('words.register-your-interest') ?>
                        </a>
                    </span>
                </div>
            </div>
        </section>

    </body>
</html>