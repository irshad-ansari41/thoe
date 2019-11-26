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
        <?= generate_breadcrumb([url("/$locale") => 'home', url("/$locale/projects") => 'Projects', url("/$locale/projects/{$project['slug']}") => $project['title_' . $locale], '' => $property['title_' . $locale]]) ?>
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
                    <h1 class="property__title">PORTOFINO HOTEL<span class="property__city">Family hotel experience</span></h1>
                    <div class="property__header">
                        <div class="property__header">
                            <div class="property__price"><span class="property__price-label">Invest from AED</span><strong class="property__price-value">1,500,000</strong></div>
                            <div class="property__price property__price--commision"><span class="property__price-label">Guaranteed ROI</span><strong class="property__price-value">100<span class="property__price-unit">%</span></strong></div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="property__header">
                            <?php
                            $brochures = glob(PUBLIC_PATH . '/assets/images/properties' . "/{$project['gallery_location']}/{$property->gallery_location}/brochures/*");
                            echo!empty($brochures) ? "<a href='" . str_replace(PUBLIC_PATH, SITE_URL, $brochures[0]) . "' target=_blank><button type=button class='btn--default'><i class='fa fa-book'></i>View Brochure</button></a>" : '';
                            ?>
                            <?php
                            $floorplans = glob(PUBLIC_PATH . '/assets/images/properties' . "/{$project['gallery_location']}/{$property->gallery_location}/floor-plans/*");
                            echo!empty($floorplans) ? "<a href='" . str_replace(PUBLIC_PATH, SITE_URL, $floorplans[0]) . "' target=_blank><button type=button class='btn--default'><i class='fa fa-book'></i>View Floorplans</button></a>" : '';
                            ?>
                            <a href="<?= url("/$locale/construction-updates/{$project['slug']}/{$property['slug']}") ?>"><button type="button" class="btn--default"><i class="fa fa-support"></i>View Construction Updates</button></a>
                        </div>
                        <!--<div class="property__header">
                                                <h4 class="property__subtitle">Add contact details as sales agent to brochure & floor-plans:</h4>
                            <button type="button" class="btn--default"><i class="fa fa-book"></i>View Brochure</button>
                            <button type="button" class="btn--default"><i class="fa fa-building"></i>View Floorplans</button>
                        </div>-->
                        <div class="site--main">
                            <div class="property__slider">
                                <div class="property__ribon">Sale Open</div>
                                <div class="property__ribon property__ribon--status property__ribon--done">Limited Availability</div>
                                <div id="properties-thumbs" class="slider slider--small js-slider-thumbs">
                                    <div class="slider__block js-slick-slider">
                                        <?php
                                        foreach ($gallery as $i => $slide) {
                                            $src = asset('assets/images/properties') . '/' . $project['gallery_location'] . '/' . $property['gallery_location'] . '/' . $slide->image;
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
                                                $src = asset('assets/images/properties') . '/' . $project['gallery_location'] . '/' . $property->gallery_location . '/' . $slide->image;
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
                        <div class="sidebar">
                            <div class="widget js-widget widget--sidebar">
                                <div class="widget__header">
                                    <!--<h2 class="widget__title">Know More!</h2>
                                    <h5 class="widget__headline">Find the right investment opportunity with The Heart of Europe.</h5>-->
                                    <a class="widget__btn js-widget-btn widget__btn--toggle">Register Interest!</a>
                                </div>
                                <div class="widget__content">
                                    <h3>Get in touch</h3>
                                    <!-- BEGIN SEARCH-->
                                    @include('include.lead-form')
                                    <!-- end of block-->
                                    <!-- END SEARCH-->
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>


                        <div class="clearfix"></div>
                        <div class="property__plan">
                            <?php
                            if (!empty($property->extra_details)) {
                                $extra_details = unserialize($property->extra_details);
                                foreach ($extra_details as $value) {
                                    if (empty($value['key'])) {
                                        break;
                                    }
                                    ?>
                                    <dl class="property__plan-item">
                                        <dt class="property__plan-icon">
                                            <svg>
                                            <use xlink:href="<?= $value['icon'] ?>"></use>
                                            </svg>
                                        </dt>
                                        <dd class="property__plan-title"><?= $value['key'] ?></dd>
                                        <dd class="property__plan-value"><?= $value['value'] ?></dd>
                                    </dl>
                                    <?php
                                }
                            }
                            ?>

                        </div>
                        <div class="property__description js-unhide-block">
                            <h4 class="property__subtitle">Description</h4>
                            <div class="property__description-wrap">
                                <?= $property['long_description_' . $locale] ?>
                            </div>
                            <button type="button" class="property__btn-more js-unhide">More information ...</button>
                        </div>
                        <div class="property__params">
                            <h4 class="property__subtitle">Features</h4>
                            <ul class="property__params-list property__params-list--options">
                                <?php
                                foreach ($aminities as $aminity) {
                                    $aminity = (array) $aminity;
                                    ?>
                                    <li><?= $aminity['title_' . $locale] ?></li>
                                <?php } ?>
                            </ul>
                        </div>

                        <div class="widget js-widget widget--details">
                            <div class="widget__content">
                                <div class="map map--properties">
                                    <div class="map__buttons">
                                        <button type="button" class="map__change-map js-map-btn active">Google Map</button>
                                    </div>
                                    <div class="map__wrap">
                                        <div data-type="map" class="map__view js-map-canvas"></div>
                                        <div data-type="panorama" class="map__view map__view--panorama js-map-canvas"></div>
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



