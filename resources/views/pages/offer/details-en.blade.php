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
        <?= generate_breadcrumb([url("/$locale") => 'home', url("/$locale/offers") => 'Offers', '' => $offer['title_' . $locale]]) ?>
    </div>
</nav>
@stop

@section('content')
<div class="center">
    <div class="container">
        <div class="row">
            <div class="site site--main">
                <header class="site__header">
                    <h1 class="site__title"><?= $offer['title_' . $locale] ?></h1>
                </header>
                <div class="site__main">
                    <div class="widget js-widget widget--main widget--no-margin">
                        <div class="widget__content">
                            <div class="listing listing--list listing--article">
                                <?php
                                $month = date_format(date_create($offer['date']), 'M');
                                $day = date_format(date_create($offer['date']), 'd');
                                $year = date_format(date_create($offer['date']), 'Y');
                                ?>
                                <div class="listing__item">
                                    <article class="article--list">
                                        <div class="article__item-header">
                                            <time datetime="<?= $offer['date'] ?>" class="article__time text-uppercase"><?= $month ?><strong><?= $day ?></strong></time>
                                            <div class="article__item-info">
                                                <div class="article__tags">Offer Valid Till: <strong><?= date_format(date_create($offer['date']), 'd-M-Y') ?></strong></div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <br/><?= $offer['description_' . $locale] ?>
                                        <div class="clearfix"></div>
                                        <div class="article__preview">

                                            <?php
                                            $images = !empty($offer['image']) ? explode(',', $offer['image']) : [];
                                            if (count($images) >= 1) {
                                                ?>
                                                <div class="slider slider--small slider--small js-slick-blog">
                                                    <div class="slider__block js-slick-slider">
                                                        <?php foreach (array_filter($images) as $image) { ?>
                                                            <div class="slider__item">
                                                                <a href="<?= asset("/assets/images/offer/{$image}") ?>" data-size="1168x550" class="slider__img js-gallery-item">
                                                                    <img data-lazy="<?= asset('frontend-assets/media-demo/properties/1740x960/02.jpg') ?>" src="<?= asset("/assets/images/offer/{$image}") ?>" alt="">
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
                                                <a href="#" class=""><img src="<?= asset("/assets/images/offer/{$images[0]}") ?>" alt=""></a>
                                            <?php } ?>

                                            <?php if (!empty($offer['youtube'])) { ?>
                                                <br/><br/><div><iframe width="853" height="480" src="<?= $offer['youtube'] ?>" allowfullscreen></iframe></div>
                                            <?php } ?>

                                        </div>
                                        <div class="article__intro">
                                            <br/><?= $offer['description_long_' . $locale] ?>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Site-->

            @include('pages.offer.sidebar')

            <div class="clearfix"></div>
        </div>
    </div>
</div>
@stop


@section('footer_scripts')

@stop

