<?php
#old url redirect
//$new_url = DB::table('url_redirects')->where('source', Request::fullurl())->where('status', 1)->value('new_url');
//if (!empty($new_url)) {
//    header("Location: $new_url", true, 301);
//    exit();
//}
$meta = DB::table('tbl_meta')->where('page_url', Request::url())->first();
if (!empty($meta)) {
    $meta_title = $og_title = $meta->meta_title;
    $meta_description = $meta->meta_desc;
    $meta_keyword = $meta->meta_key;
}
/* Preload Setting */
$locale = get_locale(Request::segment(1));
$records_menu = get_menu($locale, 1);
$footers_part1 = get_menu($locale, 2, 5, 0);
$footers_part2 = get_menu($locale, 2, 6, 5);
$setting = get_setting($locale);
$ptype = 1;

$curr_url = str_replace('https:', 'http:', Request::url());
$full_url = str_replace('https:', 'http:', Request::fullurl());
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
    $en_url = '//azizidevelopments.com/en';
    $ar_url = '//azizidevelopments.com/ar';
    $cn_url = '//azizidevelopments.com/cn';
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Online Booking - Azizi Developments</title>

        <!-- Bootstrap core CSS -->
        <link href="<?=SITE_URL?>/online-booking/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="//fonts.googleapis.com/css?family=Open+Sans|Open+Sans+Condensed:300,700" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="<?=SITE_URL?>/online-booking/css/full-width-pics.css" rel="stylesheet">
        @yield('styles')
        <style>
            body{background: #dedede none repeat scroll 0 0;
                 font-family: "content-light", "Helvetica Neue", Helvetica, Arial, sans-serif;
                 font-size: 14px;
                 height: 100%;
                 line-height: 18px;
                 margin: 0;}
            .card{border-radius: 0;border-bottom:0.5px solid rgba(0,0,0,.125);margin-bottom: 15px;}
            .no-padding{padding:0}
            .no-padding-left{padding-left:0}
            .no-padding-right{padding-right:0}
            a:hover{text-decoration: none;}
            /*Nav Menu*/
            ul.navbar-nav li.nav-item a.nav-link{padding: 10px;}
            ul.navbar-nav li.nav-item a.nav-link:hover{background: #0c6ebd;color: #fff;}
            ul.navbar-nav li.nav-item .dropdown-menu{border:1px solid #eee;border-radius: 0}
            ul.navbar-nav li.nav-item a.dropdown-item{border-bottom: 1px solid #eee;padding: 10px;}
            ul.navbar-nav li.nav-item a.dropdown-item:hover{background: #0c6ebd;color: #fff;}
            /*footer style*/
            #page-footer .inner{display:table;width:100%;color:#dadada}
            #page-footer .inner #footer-main,.wide-2 .white{background-color:#fff}
            #page-footer .inner #footer-main{padding:40px 0}#page-footer .inner h3{color:#000;margin:20px 0 13px;font-family:"Open Sans Condensed";font-size:20px;font-weight:600}
            #page-footer .inner .contact-us,footer a,footer a:visited,footer li,footer p{font-size:13px;color:#000;line-height:1.75;font-family:"Open Sans",sans-serif}
            address{margin-bottom:20px;font-style:normal;line-height:1.42857143}#page-footer .inner #footer-copyright{background-color:#1b1d20;display:table;padding:20px 0;width:100%}
            #page-footer .inner #footer-copyright a{font-size:14px;color:#dadada;opacity:.5}
            #page-footer .inner #footer-copyright .bank-logo{height:25px;vertical-align:middle;margin-right:7px;margin-left:8px}
            .pull-right{float:right!important}
            #page-footer .inner #footer-copyright span{opacity:.5;line-height:26px}
            #bannerImg img{width:80px;margin-top: 13px;}
            #bannerImg .block1{padding: 15px; text-align: center;}
            #bannerImg .block2{padding: 15px; text-align: center;}
            .border-bottom{border-bottom:1px solid #eee;}
            .breadcrumb{border-radius:0}
            @media only screen and (min-width: 576px) {
                .extend-row{margin-right: -25px;margin-left: -25px;}

            }
            @media only screen and (max-width: 576px) {
                .block0{background: #ffc107;margin-bottom: 15px;}

            }
            .bg-azizi-blue{background-color: #0c6ebd!important;}
            .btn-azizi-blue{background-color: #0c6ebd;color: #fff!important;border-radius: 0;}
            .text-azizi-blue{color: #0c6ebd!important;}

        </style>
        <!-- End -->
    </head>

    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top border-bottom">
            <div class="container no-padding">
                <a class="navbar-brand" href="{{url("/$locale")}}"><img alt="Azizi Developments" src="<?=SITE_URL?>/assets/images/logo/1512057079974431552.png" width="120"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto text-uppercase">
                        <?php
                        foreach ($records_menu as $menu) {
                            $submenu = !empty($menu['submenus']) ? 1 : 0;
                            ?>
                            <li class="nav-item {{$submenu?'dropdown':''}}">
                                <a class="nav-link {{$submenu?'dropdown-toggle':''}}" <?= $submenu ? 'data-toggle="dropdown"' : '' ?>  href="#"><?= $menu['title_en'] ?></a>
                                <?php if (!empty($menu['submenus'])) { ?>
                                    <div class="dropdown-menu">
                                        <?php foreach ($menu['submenus'] as $value) { ?>
                                            <a class="dropdown-item" href="<?= url("/$locale/{$value['slug']}") ?>">{{$value['title_en']}}</a>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Header - set the background image for the header in the line below -->
        <!--        <header class="py-5 bg-image-full" style="background-image: url('https://unsplash.it/1900/1080?image=1076');">
                    <img class="img-fluid d-block mx-auto" src="http://placehold.it/200x200&text=Logo" alt="">
                </header>-->




        @yield('content')

        <!-- Image Section - set the background image for the header in the line below -->
        <!--<section class="py-5 bg-image-full" style="background-image: url('https://unsplash.it/1900/1080?image=1081');">-->
        <!-- Put anything you want here! There is just a spacer below for demo purposes! -->
        <!--<div style="height: 200px;"></div>-->
        <!--</section>-->



        <!-- Footer starts -->
        <footer id="page-footer">
            <div class="inner">
                <section id="footer-main">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 col-md-3">
                                <article>
                                    <h3><?= trans('words.Azizi Developments') ?></h3>
                                    <p><?= $setting['description_en'] ?></p>
                                </article>
                            </div><!-- /.col-sm-3 -->
                            <div class="col-sm-12 col-md-3">
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
                                    </ul>
                                </article>            
                            </div><!-- /.col-sm-3 -->
                            <div class="col-sm-12 col-md-3">
                                <article>
                                    <?php if ($locale == 'en') { ?>
                                        <h3 style="visibility: hidden;">Legal</h3>
                                    <?php } ?>
                                    <?php if ($locale == 'ar') { ?>
                                        <h3 style="visibility: hidden;">قوانين الموقع</h3>
                                    <?php } ?>
                                    <?php if ($locale == 'cn') { ?>
                                        <h3 style="visibility: hidden;">法务</h3>
                                    <?php } ?>
                                    <ul class="list-unstyled list-links">
                                        <?php foreach ($footers_part2 as $fmenu) { ?>
                                            <li>
                                                <a href="<?= url('/') ?>/<?= $locale ?>/<?= $fmenu['slug'] ?>"><?= $fmenu['title_en'] ?></a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </article>
                            </div><!-- /.col-sm-3 -->
                            <div class="col-sm-12 col-md-3">
                                <article class="contact-us">
                                    <h3><?= trans('words.Contact Us') ?></h3>

                                    <?= $locale == 'en' ? '<address>Suite No. 902 / 904, API World Tower, <br/>Sheikh Zayed Road, Dubai, UAE</address>' : ''; ?>

                                    <?php if ($locale == 'ar') { ?>
                                        <address>
                                            برج العالم أي بي آي، شارع الشيخ زايد، مكتب رقم 904\902.
                                            <br/>
                                            دبي الإمارات العربية المتحدة.
                                        </address>
                                    <?php } ?>
                                    <?= trans('words.Toll Free') ?>: 
                                    <?= $locale == 'ar' ? '<a href="#" class="telephone" data-telephone="80029494" >(29494)800AZIZI</a><br>' : '<a href="#" class="telephone" data-telephone="80029494">800 AZIZI (29494)</a><br>'; ?>                                    


                                    <?= $locale == 'cn' ? '<address>阿联酋，迪拜，谢赫扎伊德路，API World Tower，902/904号办公室</address>' : '' ?>
                                    <?= trans('words.Tel') ?>:                                     
                                    <?= $locale == 'en' ? '<a href="#" class="telephone" data-telephone="97143596673">+971 4 359 6673</a><br>' : ''; ?>                                    
                                    <?= $locale == 'ar' ? '<a href="#" class="num-fo telephone"  data-telephone="97143596673">97143596673+</a><br>' : '' ?>

                                    <?= trans('words.Fax') ?>: 
                                    <?= $locale == 'ar' ? '<span class="txt-white num-fo" >97143329102+</span><br>' : '<span class="txt-white">+971 4 332 9102</span><br>' ?>


                                    <?php if ($locale == 'ar') { ?>
                                        <?= trans('words.Email') ?>: <a id="foo-email" href="" class="txt-white num-fo f-s-12"></a><br/>
                                    <?php } else { ?>
                                        <?= trans('words.Email') ?>: <a id="foo-email" href="" class="txt-white num-fo"></a><br/>
                                    <?php } ?>


              <!-- <span>Working hours: <span class='txt-white'>9am - 6pm, Sun-Thu</span></span> -->

                                    <div>
                                        <a target="_blank" href="//www.facebook.com/AziziGroup/" class="socialIcon"><i class="ion-social-facebook"></i></a>
                                        <a target="_blank" href="//www.instagram.com/azizigroup/?hl=en" class="socialIcon"><i  class="ion-social-instagram"></i></a>
                                        <a target="_blank" href="//www.linkedin.com/company/azizi-developments" class="socialIcon"><i  class="ion-social-linkedin"></i></a>
                                        <!--<a target="_blank" href="//plus.google.com/u/0/107107586826814442634" class="socialIcon"><i  class="ion-social-googleplus"></i></a>-->
                                        <a target="_blank" href="//twitter.com/azizigroup?lang=en" class="socialIcon"><i  class="ion-social-twitter"></i></a>
                                        <a target="_blank" href="//www.youtube.com/channel/UCmUtuRMwJxaovjGBNSXx-Jw" class="socialIcon"><i  class="ion-social-youtube"></i></a>
                                    </div>

                                </article>
                            </div><!-- /.col-sm-3 -->


                        </div><!-- /.row -->
                    </div><!-- /.container -->
                </section><!-- /#footer-main -->
                <section id="footer-thumbnails" class="footer-thumbnails"></section><!-- /#footer-thumbnails -->
                <section id="footer-copyright">
                    <div class="container">
                        <?php if ($locale == 'ar') { ?>
                            <a target="blank"><?= trans('words.copyright_string') ?></a> 
                            <img class="pull-left bank-logo" alt="master-card" src="<?= asset('assets/img/') ?>/master-card.png">
                            <img class="pull-left bank-logo" alt="visa" src="<?= asset('assets/img/') ?>/visa.png">
                            <span class="pull-left"><?= trans('words.We accept') ?>:</span>
                        <?php } else { ?>
                            <a target="blank"><?= trans('words.copyright_string') ?></a> 
                            <img class="pull-right bank-logo" alt="master-card" src="<?= asset('assets/img/') ?>/master-card.png">
                            <img class="pull-right bank-logo" alt="visa" src="<?= asset('assets/img/') ?>/visa.png">
                            <span class="pull-right"><?= trans('words.We accept') ?>:</span>
                        <?php } ?>
                    </div>
                </section>
            </div><!-- /.inner -->
        </footer>
        <!-- Footer Ends -->

        <!-- Bootstrap core JavaScript -->
        <script src="<?=SITE_URL?>/online-booking/vendor/jquery/jquery.min.js"></script>
        <script src="<?=SITE_URL?>/online-booking/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        @yield('scripts')
        <script>
$(document).ready(function () {
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

});


        </script>
    </body>

</html>
