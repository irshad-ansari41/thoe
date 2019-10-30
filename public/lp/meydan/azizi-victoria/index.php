<?php
$page_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
$thank_url = "https://azizidevelopments.com/lp/thank-you.html";
$website_url = "https://azizidevelopments.com/en/dubai/meydan/victoria";
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
        <title>Azizi Victoria at Meydan One</title>
        <style type=text/css>div.login{border-radius:2px;background-color:#5f84f2;padding:4px 8px;cursor:pointer;display:none}.facilities-item{width: 100%;}</style>
        <?php require('../../js/gtm-head.php') ?>
    </head>
    <body>
        <?php require('../../js/gtm-body.php') ?>
        <div id=main-wrapper class="animsition clearfix">
            <header id=header class="site-header transparent-header clearfix">
                <div class=header-navigation>
                    <div class=container>
                        <div class=row>
                            <div class="logo col-md-3" data-wow-delay=1s>
                                <div class=logo-image>
                                    <a href=index.html><img src=https://azizidevelopments.com/lp/meydan/azizi-victoria/images/logo.png alt></a>
                                </div>
                            </div>
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
                <div class=slider-text-wrap style=background:url(https://azizidevelopments.com/lp/meydan/azizi-victoria/images/slider/slide-lg-3.jpg);>
                    <div class=container>
                        <div class=row>
                            <div class=col-md-8>
                                <div class=slider-text>
                                    <h2>AZIZI VICTORIA</h2>
                                    <p>Experience An Unmatchable British Lifestyle.</p>
                                    <h2>AED 1,671*</h2>
                                    <p>Monthly Mortgage</p>
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
                                    <h2><span class=bold>Embrace</span> the new Victoria lifestyle</h2>
                                </div>
                                <div class=facilities-content>
                                    <p class=intro>The new Azizi Victoria will offer residents a taste of the unmatchable British lifestyle, from its charming living spaces to its vibrant streets filled with a variety of excellent retail options. The project is centred on community living, emulating the perfect balance of entertainment, work and living spaces from Victoria, London. Azizi Victoria will be home to 30,000 units – studio, one-, two- and three bedroom – a mega integrated retail district, high end hotels, lush greenery, parks and gardens, with modern, futuristic Azizi Victoria is easily accessible via Business Bay, Sheikh Zayed Road, Al Khail Road and Meydan Road.</p>
                                    <div class=facilities-item>
                                        <h3>Great Living</h3>
                                        <p style="margin:0 15px 10px 0">At Azizi Victoria, we want our customers to not just live the good life, but live a great life. Hence, the project will also include several gardens and parks to create beautiful open spaces to relax at any time of day. Whether you want to take the kids for a walk in the park, exercise in the fresh air or just relax with friends after work, these open spaces will offer a welcome escape in the city.</p>
                                    </div>
                                    <div class=facilities-item>
                                        <h3>The Modern Necessities</h3>
                                        <p>At Azizi Victoria, you will find High Street-style retail options, groceries and convenience stores to fulfil the many needs and wants of residents. To enhance the community feel, buildings will be set on shared podiums, allowing for great community amenities like playgrounds, water features, swimming pools, gymnasiums, BBQ areas, badminton courts, tennis courts, putting greens, jogging tracks, etc. The ground levels will have cycling tracks, 5-a-side football pitches, community parks and green pockets along with retail units.</p>
                                    </div>
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
                            <h2><span class=bold>Azizi Victoria</span> Image Gallery</h2>
                        </div>

                        <section id=grid class="grid clearfix mobile-hide">
                            <div class="row">
                                <?php
                                $lgimg = glob('images/gallery/lg/*');
                                $smimg = glob('images/gallery/*');
                                for ($i = 0; $i < count($lgimg); $i++):
                                    ?>
                                    <a class="col-sm-4 wow fadeInUp b24-web-form-popup-btn-42" data-path-hover="M 0,0 0,38 90,58 180.5,38 180,0 z" href="<?= $lgimg[$i] ?>" data-fancybox="gallery-1" data-title>
                                        <figure>
                                            <img src="<?= $smimg[$i] ?>" />
                                            <svg viewBox="0 0 180 500" preserveAspectRatio=none>
                                            <path d="M 0 0 L 0 182 L 90 126.5 L 180 182 L 180 0 L 0 0 z "/>
                                            </svg>
                                            <figcaption>
                                                <span>View Image</span>
                                            </figcaption>
                                        </figure>
                                    </a>
                                <?php endfor; ?>       

                            </div>

                        </section>

                        <section id=content class="homepage clearfix">
                            <div class="gallery wrapper clearfix pbottom">
                                <div class=container-flud>
                                    <div class="col-sm-12 col-md-12" style="padding:0;">
                                        <div style="width: 100%"><iframe width="100%" height="400" src="https://maps.google.com/maps?width=100%&amp;height=400&amp;hl=en&amp;coord=25.1574719,55.3019084&amp;q=Azizi%20Victoria%20at%20Meydan%20District%207+(Azizi%20Developments)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=A&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/create-google-map/">Google Maps iframe generator</a></iframe></div>
                                    </div>
                                </div>
                            </div>

                        </section>

                    </div>
                    <footer id=footer class="wrapper clearfix">
                        <div class="footer-text wow fadeIn text-center">
                            <h1>Want More Information?</h1>
                            <p>Let one of our professional property consultants provide you full information tailored to your requirements.</p>
                            <a class="button-normal yellow b24-web-form-popup-btn-101" data-toggle=modal data-target=#lead-form-model>Register Your Interest!</a>
                        </div>
                        <div class="footer-copyright wow fadeIn text-center">
                            <div class=container>
                                <div class=copyright>
                                    <p>Copyright <?= date('Y'); ?> Azizi Developments. All Right Reserved.</p>
                                </div>
                            </div>
                        </div>
                    </footer>
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
                </div>
            </section>
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
                    sessionStorage.setItem("utm_campaign", 'Azizi Victoria');
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