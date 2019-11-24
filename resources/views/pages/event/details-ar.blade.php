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
                                        <div class="clearfix"></div>
                                        <div class="article__preview">
                                            <div class="slider slider--small slider--small js-slick-blog">
                                                <div class="slider__block js-slick-slider">
                                                    <div class="slider__item"><a href="<?= asset("/assets/images/events/{$event['event_photo_' . $locale]}") ?>" data-size="1168x550" class="slider__img js-gallery-item"><img data-lazy="<?= asset('frontend-assets/media-demo/properties/1740x960/02.jpg') ?>" src="<?= asset("/assets/images/events/{$event['event_photo_' . $locale]}") ?>" alt=""></a></div>
                                                    <div class="slider__item"><a href="<?= asset("/assets/images/events/{$event['event_photo_' . $locale]}") ?>" data-size="1168x550" class="slider__img js-gallery-item"><img data-lazy="<?= asset('frontend-assets/media-demo/properties/1740x960/03.jpg') ?>" src="<?= asset("/assets/images/events/{$event['event_photo_' . $locale]}") ?>" alt=""></a></div>
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
                                        </div>
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
                                                <dl class="contacts__address-column">
                                                    <dt class="contacts__address-column__title"></dt>
                                                    <dd><a href="<?= url("/$locale/events/{$event['slug_' . $locale]}") ?>" class="article__more">Read more</a><br></dd>
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

