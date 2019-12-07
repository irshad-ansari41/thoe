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
        <?=
        generate_breadcrumb([url("/$locale") => 'home', url("/$locale/media-gallery") => 'Media Gallery', url("/$locale/image-gallery") => 'Image Gallery',
            '' => $gallery['gallery_title_' . $locale],])
        ?>
    </div>
</nav>
@stop

@section('content')

<div class="center">
    <div class="container">
        <div class="row">
            <div class="site">
                <!-- BEGIN PROPERTY DETAILS-->
                <div class="property">
                    <h1 class="property__title"><?= $gallery['gallery_title_' . $locale] ?><span class="property__city"><?= $gallery['gallery_long_title_' . $locale] ?></span></h1>
                    <div class="property__header">

                        <div class="clearfix"></div>
                        <?= $gallery['short_description_' . $locale] ?>
                        <div class="clearfix"></div>

                        <div class="site--main">
                            <div class="property__slider">
                                
                                <div id="properties-thumbs" class="slider slider--small js-slider-thumbs">
                                    <div class="slider__block js-slick-slider">
                                        <?php
                                        foreach ($images as $i => $value) {
                                            $src = asset('assets/images/media/') . '/' . $gallery['path'] . '/images/' . $value->image;
                                            ?>
                                            <div class="slider__item slider__item--<?= $i ?>"><a href="<?= $src ?>" data-size="1740x960" data-gallery-index='<?= $i ?>' class="slider__img js-gallery-item"><img data-lazy="<?= $src ?>" src="<?= asset('frontend-assets/img/lazy-image.jpg') ?>" alt=""></a></div>
                                        <?php } ?>

                                    </div>
                                </div>
                                <div class="slider slider--thumbs">
                                    <div class="slider__wrap">
                                        <div class="slider__block js-slick-slider">
                                            <?php
                                            foreach ($images as $i => $value) {
                                                $src = asset('assets/images/media/') . '/' . $gallery['path'] . '/images/' . $value->image
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
                    <!-- end of block .property-->
                    <!-- END PROPERTY DETAILS-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END CENTER SECTION-->
@stop


@section('footer_scripts')

@stop



