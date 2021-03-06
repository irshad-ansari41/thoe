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
                                                        <a href="<?= $slide['explore_link'] ?>" class="article__more" style="color:#fff;border-color: #fff;z-index:9999">Read more</a>
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
                                @includeIf("include.home-get-in-touch")
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
            <h2 class="widget__title"><?= $content['short_description_' . $locale] ?></h2>
            <h5 class="widget__headline"><?= $content['description_' . $locale] ?></h5>
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
                            foreach ($features as $feature) {
                                $feature = (array) $feature;
                                ?>
                                <div class="listing__item">
                                    <div class="properties properties--grid">
                                        <div class="properties__thumb"><a href="<?= url("$locale/features/{$feature['slug']}") ?>" class="item-photo"><img src="<?= asset("uploads/feature/{$feature['image']}") ?>" alt=""/>
                                                <figure class="item-photo__hover item-photo__hover--params">
                                                    <!--<span class="properties__intro"><?= str_limit($feature['content'], 35) ?> Read more!</span>-->
                                                </figure></a>
                                        </div>
                                        <!-- end of block .properties__thumb-->
                                        <div class="properties__details">
                                            <div class="properties__info"><a href="<?= url("$locale/features/{$feature['slug']}") ?>" class="properties__address">
                                                    <span class="properties__address-street"><?= $feature['title'] ?></span>
                                                    <span class="properties__intro"><?= str_limit($feature['content'], 35) ?> Read more!</span>
                                                </a>
                                            </div>
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


                            <div class="listing listing--grid">
                                <?php
                                foreach ($properties as $value) {
                                    $project = (array) $value['project'];
                                    foreach ($value['properties'] as $property) {
                                        $property = (array) $property;
                                        ?>
                                        <div class="listing__item">
                                            <div class="properties properties--grid">
                                                <div class="properties__thumb"><a href="<?= url("/$locale/projects/{$project['slug']}/{$property['slug']}") ?>" class="item-photo"><img src="{{asset('assets/images/properties')}}/{{ $project['gallery_location'] }}/{{ $property['gallery_location'] }}/{{ $property['holder_image'] }}" alt=""/>
                                                        <figure class="item-photo__hover item-photo__hover--params"><span class="properties__intro"><?= str_limit($property['long_description_' . $locale], 35) ?></span>
                                                        </figure></a><span class="properties__ribon">Sale On</span>
                                                </div>
                                                <!-- end of block .properties__thumb-->
                                                <div class="properties__details">
                                                    <div class="properties__info"><a href="<?= url("/$locale/projects/{$project['slug']}/{$property['slug']}") ?>" class="properties__address"><span class="properties__address-street"><?= $property['title_' . $locale] ?></span></a>
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
                                        <?php
                                    }
                                }
                                ?>
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
                <div class="feature__picture" style="background-image:url(<?= asset("/assets/images/invest/{$invest['image']}") ?>)"></div>
                <!-- end of .feature__picture-->
                <div class="container">
                    <div class="feature__content">
                        <div class="feature__header">
                            <h3 data-sr="enter right ease-in-out 150px" class="feature__title"><?= $invest['title_' . $locale] ?></h3>
                            <h4 data-sr="enter right ease-in-out 250px" class="feature__headline"><?= $invest['description_' . $locale] ?></h4>
                        </div>
                        <?php
                        $section_en = unserialize($invest['section_en']);
                        $section_ar = unserialize($invest['section_ar']);
                        ?>
                        <!-- end of block .feature__header-->
                        <div class="feature__list">
                            <div data-sr="enter right ease 150px" class="feature__item">
                                <svg class="feature__icon feature__icon--<?= !empty($section_en[0]['icon']) ? $section_en[0]['icon'] : '' ?>">
                                <use xlink:href="#icon-<?= !empty($section_en[0]['icon']) ? $section_en[0]['icon'] : '' ?>"></use>
                                </svg>
                                <div class="feature__item-content">
                                    <h3 class="feature__item-title"><?= !empty($section_en[0]['title']) ? $section_en[0]['title'] : '' ?></h3>
                                    <div class="feature__text">
                                        <p><?= !empty($section_en[0]['desc']) ? $section_en[0]['desc'] : '' ?></p>
                                    </div>
                                </div>
                            </div>
                            <!-- end of block .feature__item-->
                            <div data-sr="enter right ease 250px" class="feature__item">
                                <svg class="feature__icon feature__icon--<?= !empty($section_en[1]['icon']) ? $section_en[1]['icon'] : '' ?>">
                                <use xlink:href="#icon-<?= !empty($section_en[1]['icon']) ? $section_en[1]['icon'] : '' ?>"></use>
                                </svg>
                                <div class="feature__item-content">
                                    <h3 class="feature__item-title"><?= !empty($section_en[1]['title']) ? $section_en[1]['title'] : '' ?></h3>
                                    <div class="feature__text">
                                        <p><?= !empty($section_en[1]['desc']) ? $section_en[1]['desc'] : '' ?></p>
                                    </div>
                                </div>
                            </div>
                            <!-- end of block .feature__item-->
                            <div data-sr="enter right ease 150px" class="feature__item">
                                <svg class="feature__icon">
                                <use xlink:href="#<?= !empty($section_en[2]['icon']) ? $section_en[2]['icon'] : '' ?>"></use>
                                </svg>
                                <div class="feature__item-content">
                                    <h3 class="feature__item-title"><?= !empty($section_en[2]['title']) ? $section_en[2]['title'] : '' ?></h3>
                                    <div class="feature__text">
                                        <p><?= !empty($section_en[2]['desc']) ? $section_en[2]['desc'] : '' ?></p>
                                    </div>
                                </div>
                            </div>
                            <!-- end of block .feature__item-->
                            <div data-sr="enter right ease 250px" class="feature__item">
                                <svg class="feature__icon">
                                <use xlink:href="#<?= !empty($section_en[3]['icon']) ? $section_en[3]['icon'] : '' ?>"></use>
                                </svg>
                                <div class="feature__item-content">
                                    <h3 class="feature__item-title"><?= !empty($section_en[3]['title']) ? $section_en[3]['title'] : '' ?></h3>
                                    <div class="feature__text">
                                        <p><?= !empty($section_en[3]['desc']) ? $section_en[3]['desc'] : '' ?></p>
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
                        $images = !empty($news['image']) ? explode(',', $news['image']) : ['empty.png'];
                        ?>
                        <div class="listing__item">
                            <!-- BEGIN SECTION ARTICLE-->
                            <div class="article article--grid"><a href="<?= url("/$locale/news-pr/{$news['slug']}") ?>" class="article__photo">
                                    <img src="<?= asset("/assets/images/pressrelease/{$images[0]}") ?>" alt="News title" class="article__photo-img">
                                    <time datetime="<?= $news['date'] ?>" class="article__time text-uppercase"><?= $month ?><strong><?= $day ?></strong></time></a>
                                <div class="article__details"><a href="blog_details.html" class="article__item-title"><?= $news['title_' . $locale] ?></a>
                                    <div class="article__intro">
                                        <p><?= str_limit($news['description_' . $locale], 20) ?></p>
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

    <?php if (!empty($events)) { ?>
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
                            <div class="article article--grid"><a href="<?= url("/$locale/events/{$event['slug']}") ?>" class="article__photo">
                                    <img src="<?= asset("/assets/images/events/{$event['event_photo_' . $locale]}") ?>" alt="News title" class="article__photo-img">
                                    <time datetime="<?= $event['event_date'] ?>" class="article__time text-uppercase"><?= $month ?><strong><?= $day ?></strong></time></a>
                                <div class="article__details"><a href="blog_details.html" class="article__item-title"><?= $event['event_title_' . $locale] ?></a>
                                    <div class="article__intro">
                                        <p><?= str_limit($event['extra_desc_' . $locale], 20) ?></p>
                                    </div><a href="<?= url("/$locale/events/{$event['slug']}") ?>" class="article__more">Read more</a>
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


