@extends('layouts/home')

@section('title')
Home Page
@parent
@stop

@section('header_styles')

@stop

@section('breadcrumb')

@stop

@section('content')
<div class="site-wrap js-site-wrap">
    <div class="widget js-widget">
        <div class="widget__content">
            <div class="banner js-banner-slider banner--slider">
                <!-- BEGIN SLIDER-->
                <div class="slider slider--dots">
                    <div class="slider__block js-slick-slider">
                        <?php foreach ($sliders as $slide) { ?>
                            <div class="slider__item">
                                <div class="slider__preview">
                                    <div class="slider__img"><img data-lazy="<?= asset("assets/images/home_banners/" . $slide['banner_image']) ?>" src="<?= asset('frontend-assets/media-demo/banner/banner-5.jpg') ?>" alt=""></div>
                                    <div class="slider__container">
                                        <div class="container">
                                            <div class="row">
                                                <div class="slider__caption">
                                                    <h1 class="banner__title"><?= $slide['banner_title_' . $locale] ?></h1>
                                                    <h3 class="banner__subtitle"><?= $slide['banner_short_description_' . $locale] ?></h3>
                                                    <?php if ($slide['explore_link']) { ?>
                                                        <a href="<?= $slide['explore_link'] ?>" class="article__more">Read more</a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <!-- end of block .slider__block-->
                </div>
                <!-- END SLIDER-->
                <div class="banner__container">
                    <div class="container">
                        <div class="row">
                            <div class="banner__sidebar">
                                <h4 class="banner__sidebar-title">The Best Hospitality Investment Opportunity in Dubai</h4>
                                <!-- BEGIN SEARCH-->
                                @include("include.home-get-in-touch")
                                <!-- end of block-->
                                <!-- END SEARCH-->
                            </div>
                            <!-- end of block .banner__search-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="widget js-widget widget--landing widget--gray">
        <div class="widget__header">
            <h2 class="widget__title">The Heart of Europe</br>Explore Our Projects</h2>
            <h5 class="widget__headline">Our agents are licensed professionals that specialise in searching, evaluating and negotiating the purchase of property on behalf of the buyer. They will sell you real estate. Insights, tips & how-to guides on selling property and preparing your home or investment property for sale and working to maximise your sale price.</h5>
        </div>
        <div class="widget__content">
            <!-- BEGIN PROPERTIES INDEX-->
            <div class="tab tab--properties">
                <!-- Nav tabs-->
                <ul role="tablist" class="nav tab__nav">
                    <li class="active"><a href="#tab-features" aria-controls="tab-popular" role="tab" data-toggle="tab" class="properties__btn js-pgroup-tab">Features</a></li>
                    <li><a href="#tab-projects" aria-controls="tab-recent" role="tab" data-toggle="tab" class="properties__btn js-pgroup-tab">Projects</a></li>
                </ul>
                <!-- Tab panes-->
                <div class="tab-content">
                    <div id="tab-features" class="tab-pane in active">
                        <div class="listing listing--grid">
                            <?php
                            foreach ($bannersliders as $slide) {
                                $slide = (array) $slide;
                                ?>
                                <div class="listing__item">
                                    <div class="properties properties--grid">
                                        <div class="properties__thumb"><a href="<?= $slide['explore_link'] ?>" class="item-photo"><img src="<?= asset("assets/images/home_banners/{$slide['banner_image']}") ?>" alt=""/>
                                                <figure class="item-photo__hover item-photo__hover--params"><span class="properties__intro">Read more!</span>
                                                </figure></a>
                                        </div>
                                        <!-- end of block .properties__thumb-->
                                        <div class="properties__details">
                                            <div class="properties__info"><a href="<?= $slide['explore_link'] ?>" class="properties__address"><span class="properties__address-street"><?= $slide['banner_title_' . $locale] ?></span><span class="properties__intro"><?= $slide['banner_long_description_' . $locale] ?></span>
                                            </div></a>
                                        </div>
                                        <!-- end of block .properties__info-->
                                    </div>
                                    <!-- end of block .properties__item-->
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div id="tab-projects" class="tab-pane">
                        <div class="listing listing--grid">
                            <div class="listing__item">
                                <div class="properties properties--grid">
                                    <div class="properties__thumb"><a href="#" class="item-photo"><img src="<?= asset("assets/media-demo/properties/554x360/01.jpg") ?>" alt=""/>
                                            <figure class="item-photo__hover item-photo__hover--params"><span class="properties__intro">Witness the magic of snowfall in the outdoor plaza in Main Europe Island Centre Plaza, the world’s first climate controlled resort....</span>
                                            </figure></a><span class="properties__ribon">Sale On</span>
                                    </div>
                                    <!-- end of block .properties__thumb-->
                                    <div class="properties__details">
                                        <div class="properties__info"><a href="#" class="properties__address"><span class="properties__address-street">Main Europe</span></a>
                                            <div class="properties__offer">
                                                <div class="properties__offer-column">
                                                    <div class="properties__offer-label">Invest From AED</div>
                                                    <div class="properties__offer-value"><strong> 1,500,000</strong>
                                                    </div>
                                                </div>
                                                <div class="properties__offer-column">
                                                    <div class="properties__offer-label">Guaranteed ROI</div>
                                                    <div class="properties__offer-value"><strong> 100%</strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end of block .properties__info-->
                                </div>
                                <!-- end of block .properties__item-->
                            </div>
                            <div class="listing__item">
                                <div class="properties properties--grid">
                                    <div class="properties__thumb"><a href="#" class="item-photo"><img src="<?= asset("assets/media-demo/properties/554x360/02.jpg") ?>" alt=""/>
                                            <figure class="item-photo__hover item-photo__hover--params"><span class="properties__intro">Witness the magic of snowfall in the outdoor plaza in Main Europe Island Centre Plaza, the world’s first climate controlled resort....</span>
                                            </figure></a><span class="properties__ribon">Sale On</span>
                                    </div>
                                    <!-- end of block .properties__thumb-->
                                    <div class="properties__details">
                                        <div class="properties__info"><a href="property_details.html" class="properties__address"><span class="properties__address-street">Portofino</span></a>
                                            <div class="properties__offer">
                                                <div class="properties__offer-column">
                                                    <div class="properties__offer-label">Invest From AED</div>
                                                    <div class="properties__offer-value"><strong> 1,500,000</strong>
                                                    </div>
                                                </div>
                                                <div class="properties__offer-column">
                                                    <div class="properties__offer-label">Guaranteed ROI</div>
                                                    <div class="properties__offer-value"><strong> 100%</strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end of block .properties__info-->
                                </div>
                                <!-- end of block .properties__item-->
                            </div>
                            <div class="listing__item">
                                <div class="properties properties--grid">
                                    <div class="properties__thumb"><a href="#" class="item-photo"><img src="<?= asset("assets/media-demo/properties/554x360/03.jpg") ?>" alt=""/>
                                            <figure class="item-photo__hover item-photo__hover--params"><span class="properties__intro">Witness the magic of snowfall in the outdoor plaza in Main Europe Island Centre Plaza, the world’s first climate controlled resort....</span>
                                            </figure></a><span class="properties__ribon">Sale On</span>
                                    </div>
                                    <!-- end of block .properties__thumb-->
                                    <div class="properties__details">
                                        <div class="properties__info"><a href="#" class="properties__address"><span class="properties__address-street">Cote D'Azur</span></a>
                                            <div class="properties__offer">
                                                <div class="properties__offer-column">
                                                    <div class="properties__offer-label">Invest From AED</div>
                                                    <div class="properties__offer-value"><strong> 1,500,000</strong>
                                                    </div>
                                                </div>
                                                <div class="properties__offer-column">
                                                    <div class="properties__offer-label">Guaranteed ROI</div>
                                                    <div class="properties__offer-value"><strong> 100%</strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end of block .properties__info-->
                                </div>
                                <!-- end of block .properties__item-->
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="widget js-widget">
        <div class="widget__content">
            <!-- BEGIN SECTION FEATURE-->
            <section class="feature">
                <div class="feature__picture"></div>
                <!-- end of .feature__picture-->
                <div class="container">
                    <div class="feature__content">
                        <div class="feature__header">
                            <h3 data-sr="enter right ease-in-out 150px" class="feature__title">Why Invest with The Heart of Europe!</h3>
                            <h4 data-sr="enter right ease-in-out 250px" class="feature__headline">Our mission is to empower consumers with information to make smart decisions. RealtySpace is a real estate marketplace dedicated to helping homeowners, home buyers, sellers, renters and agents find and share information about homes, real estate and home improvement.</h4>
                        </div>
                        <!-- end of block .feature__header-->
                        <div class="feature__list">
                            <div data-sr="enter right ease 150px" class="feature__item">
                                <svg class="feature__icon feature__icon--money-save">
                                <use xlink:href="#icon-money-save"></use>
                                </svg>
                                <div class="feature__item-content">
                                    <h3 class="feature__item-title">Reason One</h3>
                                    <div class="feature__text">
                                        <p>It starts with our living database of more than 110 million U.S. homes &ndash; including homes for sale, homes for rent and homes not currently on the market.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- end of block .feature__item-->
                            <div data-sr="enter right ease 250px" class="feature__item">
                                <svg class="feature__icon feature__icon--good-sales">
                                <use xlink:href="#icon-good-sales"></use>
                                </svg>
                                <div class="feature__item-content">
                                    <h3 class="feature__item-title">Reasone Two</h3>
                                    <div class="feature__text">
                                        <p>In addition, RealtySpace operates the largest real estate and rental advertising networks in the U.S. in partnership with Livemile Homes!</p>
                                    </div>
                                </div>
                            </div>
                            <!-- end of block .feature__item-->
                            <div data-sr="enter right ease 150px" class="feature__item">
                                <svg class="feature__icon">
                                <use xlink:href="#icon-comfort"></use>
                                </svg>
                                <div class="feature__item-content">
                                    <h3 class="feature__item-title">Reasone Three</h3>
                                    <div class="feature__text">
                                        <p>We are transforming the way consumers make home-related decisions and connect with professionals.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- end of block .feature__item-->
                            <div data-sr="enter right ease 250px" class="feature__item">
                                <svg class="feature__icon">
                                <use xlink:href="#icon-easy"></use>
                                </svg>
                                <div class="feature__item-content">
                                    <h3 class="feature__item-title">Reasone Four</h3>
                                    <div class="feature__text">
                                        <p>It starts with our living database of more than 110 million U.S. homes &ndash; including homes for sale, homes for rent and homes not currently on the market.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- end of block .feature__item-->
                        </div>
                        <!-- end of block .feature__list-->
                    </div>
                    <!-- end of .feature__content-->
                </div>
            </section>
            <!-- END SECTION FEATURE-->
        </div>
    </div>

    <?php if (!empty($press)) { ?>
        <div class="widget js-widget widget--landing">
            <div class="widget__header">
                <h2 class="widget__title">News & PR</h2>
                <div class="widget__footer"><a href="<?= url("/$locale/news-pr") ?>" class="widget__more"> More News</a></div>
            </div>
            <div class="widget__content">
                <!--include ../widgets/article-->
                <div class="listing listing--grid">
                    <?php
                    foreach ($press as $news) {
                        $month = date_format(date_create($news['date']), 'M');
                        $day = date_format(date_create($news['date']), 'd');
                        ?>
                        <div class="listing__item">
                            <!-- BEGIN SECTION ARTICLE-->
                            <div class="article article--grid"><a href="<?= url("/$locale/news-pr/{$news['slug']}") ?>" class="article__photo">
                                    <img src="<?= asset("/assets/images/pressrelease/{$news['image']}") ?>" alt="News title" class="article__photo-img">
                                    <time datetime="<?= $news['date'] ?>" class="article__time text-uppercase"><?= $month ?><strong><?= $day ?></strong></time></a>
                                <div class="article__details"><a href="blog_details.html" class="article__item-title"><?= $news['title_' . $locale] ?></a>
                                    <div class="article__intro">
                                        <p><?= str_limit($news['description_long_' . $locale], 20) ?></p>
                                    </div><a href="<?= url("/$locale/news-pr/{$news['slug']}") ?>" class="article__more">Read more</a>
                                </div>
                                <!-- end of block .articl-->
                            </div>
                            <!-- END SECTION ARTICLE-->
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php if (!empty($press)) { ?>
        <div class="widget js-widget widget--landing">
            <div class="widget__header">
                <h2 class="widget__title">Events</h2>
                <div class="widget__footer"><a href="<?= url("/$locale/events") ?>" class="widget__more"> More Events</a></div>
            </div>

            <div class="widget__content">
                <!--include ../widgets/article-->
                <div class="listing listing--grid">
                    <?php
                    foreach ($events as $event) {
                        $month = date_format(date_create($event['event_date']), 'M');
                        $day = date_format(date_create($event['event_date']), 'd');
                        ?>
                        <div class="listing__item">
                            <!-- BEGIN SECTION ARTICLE-->
                            <div class="article article--grid"><a href="<?= url("/$locale/events/{$event['slug_' . $locale]}") ?>" class="article__photo">
                                    <img src="<?= asset("/assets/images/events/{$event['event_photo_' . $locale]}") ?>" alt="News title" class="article__photo-img">
                                    <time datetime="<?= $event['event_date'] ?>" class="article__time text-uppercase"><?= $month ?><strong><?= $day ?></strong></time></a>
                                <div class="article__details"><a href="blog_details.html" class="article__item-title"><?= $event['event_title_' . $locale] ?></a>
                                    <div class="article__intro">
                                        <p><?= str_limit($event['long_desc_' . $locale], 20) ?></p>
                                    </div><a href="<?= url("/$locale/events/{$event['slug_' . $locale]}") ?>" class="article__more">Read more</a>
                                </div>
                                <!-- end of block .articl-->
                            </div>
                            <!-- END SECTION ARTICLE-->
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- END CENTER SECTION-->
</div>
@stop

@section('footer_scripts')

@stop


