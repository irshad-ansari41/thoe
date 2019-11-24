
<!-- BEGIN FOOTER-->
<footer class="footer">
    <div class="container">
        <div class="footer__wrap">
            <div class="footer__col footer__col--first">
                <div class="widget js-widget widget--footer">
                    <div class="widget__header">
                        <h2 class="widget__title">About</h2>
                    </div>
                    <div class="widget__content">
                        <aside class="widget_text">
                            <div class="textwidget">
                                <p><?= $setting['description_' . $locale] ?></p>
                                <p></p>
                                <p><a href="<?= url("{$locale}/about") ?>">Read more</a></p>
                            </div>

                        </aside>
                    </div>
                </div>
            </div>
            <!-- end of block .footer__col-first-->
            <div class="footer__col footer__col--second">
                <div class="widget js-widget widget--footer">
                    <div class="widget__header">
                        <h2 class="widget__title">Contact</h2>
                    </div>
                    <div class="widget__content">
                        <section class="address address--footer">
                            <address class="address__main">
                                <span><?= $setting['footer_address_' . $locale] ?></span>
                                <span><?= $setting['footer_timing_' . $locale] ?></span>
                                <a href="tel:<?= $setting['contact_phone'] ?>"><?= $setting['contact_phone'] ?></a>
                                <a href="emailto:<?= $setting['contact_email'] ?>"><?= $setting['contact_email'] ?></a>
                            </address>
                        </section>
                        <!-- end of block .address-->
                    </div>
                </div>
            </div>
            <!--end of block .footer__col-second-->
            <div class="footer__col footer__col--third">
                <div class="widget js-widget widget--footer">
                    <div class="widget__header">
                        <h2 class="widget__title">Menu</h2>
                    </div>
                    <div class="widget__content">
                        <nav class="nav nav--footer">
                            <?php foreach ($footers_menu as $menu) { ?>
                                <a href="<?= url("/$locale/{$menu['link']}") ?>"><?= $menu['title_' . $locale] ?></a>
                            <?php } ?>
                            <!-- end of block .nav-footer-->
                        </nav>
                    </div>
                </div>
                <div class="widget js-widget widget--footer">
                    <div class="widget__header">
                        <h2 class="widget__title">Social</h2>
                    </div>
                    <div class="widget__content">
                        <div class="social social--footer">
                            <a href="<?= $setting['facebook_link'] ?>" class="social__item"><i class="fa fa-facebook"></i></a>
                            <a href="<?= $setting['instagram_link'] ?>" class="social__item"><i class="fa fa-instagram"></i></a>
                            <a href="<?= $setting['twitter_link'] ?>" class="social__item"><i class="fa fa-twitter"></i></a>
                            <a href="<?= $setting['youtube_link'] ?>" class="social__item"><i class="fa fa-youtube-play"></i></a>
                        </div>
                        <!-- end of block .social-footer-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <span class="footer__copyright">&copy; <?= $setting['copy_right_' . $locale] ?></span>
    <!-- end of block .footer__col-third-->
    <div class="clearfix"></div>
    <!-- end of block .footer__copyright-->
</div>
</div>
</footer>
<!-- end of block .footer-->
<!-- END FOOTER-->