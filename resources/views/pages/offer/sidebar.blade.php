<!-- BEGIN SIDEBAR-->
<div class="sidebar">
    <div class="widget js-widget widget--sidebar">
        <div class="widget__header">
            <h2 class="widget__title"> </h2>
            <h5 class="widget__headline"> </h5>
            <a class="widget__btn js-widget-btn widget__btn--toggle">View Offers</a>
        </div>
        <div class="widget__content">
            <h3>Latest Offers</h3>
            <!-- BEGIN ARTICLE CATEGORIES-->
            <div class="article-categories">
                <div class="article-categories__list js-categories-article">
                    <ul>
                        <?php
                        foreach ($latest as $offer) {
                            $offer = (array) $offer;
                            ?>
                            <li class="article-categories__item"><a href="<?= url("/{$locale}/offers/{$offer['slug']}") ?>" class="article-categories__name"><?= $offer['title_' . $locale] ?><span class="article-categories__count"></span></a></li>
                        <?php } ?>
                    </ul>
                </div>
                <!-- end of block .article-categories__list-->
            </div>
            <!-- END ARTICLE CATEGORIES-->
        </div>
        <div class="widget__content">
            <h3>Get in touch</h3>
            <!-- BEGIN SEARCH-->
            @includeIf("include.lead-form-$locale")
            <!-- end of block-->
            <!-- END SEARCH-->
        </div>
    </div>
    <!-- END SIDEBAR-->
</div>
<!-- END SIDEBAR-->