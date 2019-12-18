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
        <?= generate_breadcrumb([url("/$locale") => 'home', url("/$locale/offers") => 'Offers']) ?>
    </div>
</nav>
@stop

@section('content')
<div class="center">
    <div class="container">
        <div class="row">
            <div class="site site--main">
                <header class="site__header">
                    <h1 class="site__title">Offers</h1>
                </header>
                <div class="site__main">
                    <div class="widget js-widget widget--main widget--no-margin">
                        <div class="widget__content">
                            <div class="listing listing--list listing--article">
                                <?php
                                $_offers = $offers->toArray();

                                foreach ($_offers['data'] as $offer) {
                                    $offer = (array) $offer;

                                    $month = date_format(date_create($offer['created']), 'M');
                                    $day = date_format(date_create($offer['created']), 'd');
                                    $year = date_format(date_create($offer['created']), 'Y');
                                    ?>
                                    <div class="listing__item">
                                        <article class="article--list">
                                            <div class="article__item-header">
                                                <time datetime="<?= $offer['date'] ?>" class="article__time text-uppercase"><?= $month ?><strong><?= $day ?></strong></time>
                                                <div class="article__item-info">
                                                    <h3 class="article__item-title"><a href="<?= url("/$locale/offers/{$offer['slug']}") ?>"><?= $offer['title_' . $locale] ?></a></h3>
                                                    <div class="article__tags">Offer Valid Till: <strong><?= date_format(date_create($offer['date']), 'd-M-Y') ?></strong></div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <br/><?= $offer['description_' . $locale] ?>
                                            <div class="clearfix"></div>
                                            <div class="article__preview">

                                                <?php
                                                $images = !empty($offer['image']) ? explode(',', $offer['image']) : [];
                                                if (!empty($offer['youtube'])) {
                                                    ?>
                                                    <div><iframe width="853" height="480" src="<?= $offer['youtube'] ?>" allowfullscreen></iframe></div>
                                                    <?php
                                                } else if (count($images) >= 1) {
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

                                            </div>
                                            <div class="article__intro">
                                                <p><?= str_limit($offer['description_long_' . $locale], 65) ?></p>
                                            </div><a href="<?= url("/$locale/offers/{$offer['slug']}") ?>" class="article__more">Read more</a>
                                        </article>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="site__footer">
                        <!-- BEGIN PAGINATION-->
                        <nav class="listing__pagination">
                            <?= $offers->links() ?>
                        </nav>
                        <!-- END PAGINATION-->
                    </div>
                </div>
            </div>
            <!-- END Site-->

            @includeIf('pages.offer.sidebar')

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- END CENTER SECTION-->
@stop


@section('footer_scripts')

@stop



