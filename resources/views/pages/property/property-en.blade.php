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
        <?= generate_breadcrumb([url("/$locale") => 'home', url("/$locale/projects") => 'Projects', '' => $project['title_' . $locale]]) ?>
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
                            <button type="button" class="btn--default"><i class="fa fa-book"></i>View Brochure</button>
                            <button type="button" class="btn--default"><i class="fa fa-building"></i>View Floorplans</button>
                            <button type="button" class="btn--default"><i class="fa fa-support"></i>View Construction Updates</button>
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
                                    <!--                    <h2 class="widget__title">Know More!</h2>
                                                        <h5 class="widget__headline">Find the right investment opportunity with The Heart of Europe.</h5>--><a class="widget__btn js-widget-btn widget__btn--toggle">Register Interest!</a>
                                </div>
                                <div class="widget__content">
                                    <h3>Get in touch</h3>
                                    <!-- BEGIN SEARCH-->
                                    <form action="properties_listing_list.html" class="form form--flex form--search js-search-form form--sidebar">
                                        <div class="row">
                                            <div class="form-group">
                                                <label for="in-keyword" class="control-label">Full Name</label>
                                                <input type="text" id="in-keyword" placeholder="John Carter" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="in-keyword" class="control-label">Mobile</label>
                                                <input type="text" id="in-keyword" placeholder="+97150" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="in-keyword" class="control-label">Email</label>
                                                <input type="email" id="in-keyword" placeholder="name@name.com" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="in-keyword" class="control-label">Intention</label>
                                                <select id="in-contract-type" data-placeholder="Register interest for" class="form-control">
                                                    <option label=""></option>
                                                    <option>Investments</option>
                                                    <option>Real Estate Brokers</option>
                                                    <option>Suppliers</option>
                                                    <option>Careers</option>
                                                </select>
                                            </div>
                                            <div class="form__buttons">
                                                <button type="submit" class="button__action ui__button ui__button--3">Register Interest</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- end of block-->
                                    <!-- END SEARCH-->
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>


                        <div class="clearfix"></div>
                        <div class="property__plan">
                            <dl class="property__plan-item">
                                <dt class="property__plan-icon">
                                    <svg>
                                    <use xlink:href="#icon-area"></use>
                                    </svg>
                                </dt>
                                <dd class="property__plan-title">Area</dd>
                                <dd class="property__plan-value">120</dd>
                            </dl>
                            <dl class="property__plan-item">
                                <dt class="property__plan-icon property__plan-icon--window">
                                    <svg>
                                    <use xlink:href="#icon-window"></use>
                                    </svg>
                                </dt>
                                <dd class="property__plan-title">Bedrooms</dd>
                                <dd class="property__plan-value">5</dd>
                            </dl>
                            <dl class="property__plan-item">
                                <dt class="property__plan-icon property__plan-icon--bathrooms">
                                    <svg>
                                    <use xlink:href="#icon-bathrooms"></use>
                                    </svg>
                                </dt>
                                <dd class="property__plan-title">Bathrooms</dd>
                                <dd class="property__plan-value">3</dd>
                            </dl>
                            <dl class="property__plan-item">
                                <dt class="property__plan-icon">
                                    <svg>
                                    <use xlink:href="#icon-bedrooms"></use>
                                    </svg>
                                </dt>
                                <dd class="property__plan-title">Beds</dd>
                                <dd class="property__plan-value">2</dd>
                            </dl>
                            <dl class="property__plan-item">
                                <dt class="property__plan-icon property__plan-icon--garage">
                                    <svg>
                                    <use xlink:href="#icon-garage"></use>
                                    </svg>
                                </dt>
                                <dd class="property__plan-title">Beds</dd>
                                <dd class="property__plan-value">0</dd>
                            </dl>
                        </div>
                        <div class="property__description js-unhide-block">
                            <h4 class="property__subtitle">Description</h4>
                            <div class="property__description-wrap">
                                <p>Center of the Meatpacking district. Spacious room with queen Sized bed, Large desk and lots of windows and light. In a large apt with huge private outdoor patio! (Very rare in the city) washer dryer/ Gourmet kitchen. Close to the city&apos;s best night clubs, restaurants and shopping</p>
                                <p>This is a spacious private room for rent in my Large 2 bedroom apt with large outdoor patio suitable for eating in the heart of the Meat-Packing District. right across the street from the chelsea market and just steps away from the cites best shopping, restaurants, and night-life</p>
                                <p>
                                    The apartment is newly renovated with brand new furniture and appliances. It&apos;s a clean and cozy oasis in the coolest neighborhood in nyc.
                                    The private outdoor patio is huge and has a covered eating area, a gas Webber BBQ , 2 lounge chairs for sunbathing and plenty of space to just hang out.
                                </p>
                                <p>The bedroom has a queen-sized bed that sleeps 2 and a large desk, a 32 inch flatscreen cable/tv, with 3 large windows overlooking the posh area we call the meatpacking district.</p>
                                <p>
                                    The bathroom has a shower/tub (perfect for soaking) with sliding glass doors. (towels and bedding provided)
                                    Living room has a new huge leather sectional couch that comfortably holds 5 for movies/meals or just hanging.There is a brand new 42&quot; flat screen TV mounted on the wall. with playstation 3, dvd, and free cable TV w DVR.
                                    this apartment also has a dj booth for anyone that is experienced. or an iPod dock for ppl that just want to play music that way
                                    The kitchen is very large with black marble counter tops,and bar to eat and hang out. It has all the appliances you&apos;ll need including trash compactor, dishwasher, stove/over, toaster, blender and enough space for a chef and several helpers. Air conditioning. And yes, the apartment does have free wireless Internet access.
                                </p>
                            </div>
                            <button type="button" class="property__btn-more js-unhide">More information ...</button>
                        </div>
                        <div class="property__params">
                            <h4 class="property__subtitle">Features</h4>
                            <ul class="property__params-list property__params-list--options">
                                <?php foreach ($aminities as $aminity) { ?>
                                    <li>1111<?= $aminity['title_' . $locale] ?></li>
                                <?php } ?>

                                <li>Kitchen</li>
                                <li>Internet</li>
                                <li>Air Conditioning</li>
                                <li>Heating</li>
                                <li>Smoking Allowed</li>
                                <li>Wheelchair Accessible</li>
                                <li>Washer</li>
                                <li>Dryer</li>
                                <li>TV</li>
                                <li>Suitable for Events</li>
                                <li>Smoking Allowed</li>
                                <li>Wheelchair Accessible</li>
                                <li>Elevator in Building</li>
                                <li>Indoor Fireplace</li>
                                <li>Buzzer/Wireless Intercom</li>
                                <li>Doorman</li>
                                <li>Pool</li>
                                <li>Hot Tub</li>
                                <li>Gym</li>
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



