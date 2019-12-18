@extends('layouts/default')

@section('title')
Events
@parent
@stop

@section('header_styles')

@stop

@section('breadcrumbs')
<nav class="breadcrumbs">
    <div class="container">
        <?= generate_breadcrumb([url("/$locale") => 'home', url("/$locale/events") => 'Events', '' => $event['event_title_' . $locale]]) ?>
    </div>
</nav>
@stop

@section('content')
<div class="center">
    <div class="container">
        <div class="row">
            <div class="site site--main">
                <header class="site__header">
                    <h1 class="site__title"><?= $event['event_title_' . $locale] ?></h1>
                </header>
                <div class="site__main">
                    <div class="widget js-widget widget--main widget--no-margin">
                        <div class="widget__content">
                            <div class="listing listing--list listing--article">
                                <?php
                                $month = date_format(date_create($event['event_date']), 'M');
                                $day = date_format(date_create($event['event_date']), 'd');
                                $year = date_format(date_create($event['event_date']), 'Y');
                                ?>
                                <div class="listing__item">
                                    <article class="article--list">
                                        <div class="article__item-header">
                                            <time datetime="<?= $event['event_date'] ?>" class="article__time text-uppercase"><?= $month ?><strong><?= $day ?></strong></time></a>
                                            <div class="article__item-info">
                                                <h3 class="article__item-title"><a href="#"><?= $event['event_title_' . $locale] ?></a></h3>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div><br/>
                                        <?= $event['extra_desc_' . $locale] ?>
                                        <div class="clearfix"></div>
                                        <div class="article__preview">

                                            <?php
                                            $images = !empty($event['event_main_photo_' . $locale]) ? explode(',', $event['event_main_photo_' . $locale]) : [];
                                            if (count($images) >= 1) {
                                                ?>
                                                <div class="slider slider--small slider--small js-slick-blog">
                                                    <div class="slider__block js-slick-slider">
                                                        <?php foreach (array_filter($images) as $image) { ?>
                                                            <div class="slider__item">
                                                                <a href="<?= asset("/assets/images/events/{$image}") ?>" data-size="1168x550" class="slider__img js-gallery-item">
                                                                    <img data-lazy="<?= asset('frontend-assets/media-demo/properties/1740x960/02.jpg') ?>" src="<?= asset("/assets/images/events/{$image}") ?>" alt="">
                                                                </a>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="slider__controls">
                                                        <button type="button" class="slider__control slider__control--prev js-slick-prev">
                                                            <svg class="slider__control-icon">
                                                            <use xlink:href="#icon-arrow-left"></use>
                                                            </svg>
                                                        </button><span class="slider__current js-slick-current">1 /</span><span class="slider__total js-slick-total">3</span>
                                                        <button type="button" class="slider__control slider__control--next js-slick-next">
                                                            <svg class="slider__control-icon">
                                                            <use xlink:href="#icon-arrow-right"></use>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </div>
                                            <?php } else if (!empty($images[0])) { ?>
                                                <a href="#" class=""><img src="<?= asset("/assets/images/events/{$images[0]}") ?>" alt=""></a>
                                            <?php } ?>

                                            <?php if (!empty($press['youtube'])) {
                                                ?>
                                                <br/><br/><div><iframe width="853" height="480" src="<?= $press['youtube'] ?>" allowfullscreen></iframe></div>
                                            <?php } ?>

                                        </div>
                                        <div class="clearfix"></div><br/>
                                        <?= $event['long_desc_' . $locale] ?>
                                        <div class="clearfix"></div>
                                        <div class="contacts__address">
                                            <address class="contacts__address-item">
                                                <dl class="contacts__address-column">
                                                    <dt class="contacts__address-column__title">Date & Time:</dt>
                                                    <dd><?= $day ?> <?= $month ?> <?= $year ?>, <?= $event['event_start_time'] ?>-<?= $event['event_end_time'] ?></dd>
                                                    <dt class="contacts__address-column__title">Phone:</dt>
                                                    <dd>+971 4 818 1481</dd>
                                                </dl>
                                                <dl class="contacts__address-column">
                                                    <dt class="contacts__address-column__title">Venue:</dt>
                                                    <dd><?= $event['visit_us_at_' . $locale] ?></dd>
                                                </dl>
                                            </address>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Site-->

            @include('pages.event.sidebar')

            <div class="clearfix"></div>
        </div>
    </div>
</div>
@stop


@section('footer_scripts')

@stop

