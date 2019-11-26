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
        <?= generate_breadcrumb([url("/$locale") => 'home', url("/$locale/media-gallery") => 'Media Gallery', url("/$locale/media-gallery/image-gallery") => 'Image Gallery']) ?>
    </div>
</nav>
@stop

@section('content')
<div class="center">
    <div class="container">
        <div class="row">
            <div class="site">
                <div class="property">
                    <h1 class="property__title">PORTOFINO HOTEL<span class="property__city">Family hotel experience</span></h1>
                    <div class="property__header">
                        <div class="site__main">
                            <div class="widget js-widget widget--main widget--no-margin">
                                <div class="widget__content">


                                    <div class="site--main">
                                        <div class="property__slider">
                                            <div class="property__ribon">Sale Open</div>
                                            <div class="property__ribon property__ribon--status property__ribon--done">Limited Availability</div>
                                            <div id="properties-thumbs" class="slider slider--small js-slider-thumbs">
                                                <div class="slider__block js-slick-slider">
                                                    <?php
                                                    foreach ($gallery as $i => $slide) {
                                                        $src = asset('assets/images/media/') . '/' . $gallery->slug . '/' . $gallery->holder_image
                                                        ?>
                                                        <div class="slider__item slider__item--<?= $i ?>"><a href="<?= $src ?>" data-size="1740x960" data-gallery-index='<?= $i ?>' class="slider__img js-gallery-item"><img data-lazy="<?= $src ?>" src="<?= asset('frontend-assets/img/lazy-image.jpg') ?>" alt=""></a></div>
                                                    <?php } ?>

                                                </div>
                                            </div>
                                            <div class="slider slider--thumbs">
                                                <div class="slider__wrap">
                                                    <div class="slider__block js-slick-slider">
                                                        <?php
                                                        foreach ($gallery as $i => $slide) {
                                                            $src = asset('assets/images/media/') . '/' . $gallery->slug . '/' . $gallery->holder_image
                                                            ?>
                                                            <div data-slide-rel='<?= $i ?>' class="slider__item slider__item--<?= $i ?>">
                                                                <div class="slider__img"><img data-lazy="<?= $src ?>" src="<?= asset('frontend-assets/img/lazy-image.jpg') ?>" alt=""></div>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                    <button type="button" class="slider__control slider__control--prev js-slick-prev">
                                                        <svg class="slider__control-icon">
                                                        <use xlink:href="#icon-arrow-left"></use>
                                                        </svg>
                                                    </button>
                                                    <button type="button" class="slider__control slider__control--next js-slick-next">
                                                        <svg class="slider__control-icon">
                                                        <use xlink:href="#icon-arrow-right"></use>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- END Site-->
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- END CENTER SECTION-->
    @stop


    @section('footer_scripts')

    @stop



