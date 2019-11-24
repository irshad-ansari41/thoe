@extends('layouts/default')

@section('title')
About us
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
                        <div class="slider__item">
                            <div class="slider__preview">
                                <div class="slider__img"><img data-lazy="assets/media-demo/banner/banner-4.jpg" src="assets/img/lazy-image.jpg" alt=""></div>
                                <div class="slider__container">
                                    <div class="container">
                                        <div class="row">
                                            <div class="slider__caption">
                                                <h1 class="banner__title">Witness the magic of snowfall</br>in Dubai</h1>
                                                <h3 class="banner__subtitle">The Heart of Europe brings authentic European hospitality to the Middle East’s Arabian Sea. An island destination comprising opulent palaces and island villas amid 13 luxury hotel resorts.</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slider__item">
                            <div class="slider__preview">
                                <div class="slider__img"><img data-lazy="assets/media-demo/banner/banner-5.jpg" src="assets/img/lazy-image.jpg" alt=""></div>
                                <div class="slider__container">
                                    <div class="container">
                                        <div class="row">
                                            <div class="slider__caption">
                                                <h1 class="banner__title">The world's first climate-controlled resort</h1>
                                                <h3 class="banner__subtitle">The Heart of Europe brings authentic European hospitality to the Middle East’s Arabian Sea. An island destination comprising opulent palaces and island villas amid 13 luxury hotel resorts.</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slider__item">
                            <div class="slider__preview">
                                <div class="slider__img"><img data-lazy="assets/media-demo/banner/banner-3.jpg" src="assets/img/lazy-image.jpg" alt=""></div>
                                <div class="slider__container">
                                    <div class="container">
                                        <div class="row">
                                            <div class="slider__caption">
                                                <h1 class="banner__title">We do more than luxury.</br>We do the impossible.</h1>
                                                <h3 class="banner__subtitle">The Heart of Europe brings authentic European hospitality to the Middle East’s Arabian Sea. An island destination comprising opulent palaces and island villas amid 13 luxury hotel resorts.</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slider__item">
                            <div class="slider__preview">
                                <div class="slider__img"><img data-lazy="assets/media-demo/banner/banner-1.jpg" src="assets/img/lazy-image.jpg" alt=""></div>
                                <div class="slider__container">
                                    <div class="container">
                                        <div class="row">
                                            <div class="slider__caption">
                                                <h1 class="banner__title">We do more than luxury.</br>We do the impossible.</h1>
                                                <h3 class="banner__subtitle">The Heart of Europe brings authentic European hospitality to the Middle East’s Arabian Sea. An island destination comprising opulent palaces and island villas amid 13 luxury hotel resorts.</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--<div class="slider__item">
                          <div class="slider__preview">
                            <div class="slider__img"><img data-lazy="assets/media-demo/banner/banner-2.jpg" src="assets/img/lazy-image.jpg" alt=""></div>
                            <div class="slider__container">
                              <div class="container">
                                <div class="row">
                                  <div class="slider__caption">
                                    <h1 class="banner__title banner__title--2">Over than <span>500 000</span> Happy Customers</h1>
                                    <h4 class="banner__subtitle banner__subtitle--2">After settling on a search location, you can narrow down your results by specifying preferences such as number of bedrooms and bathrooms, square footage, monthly rent, and whatever else you want to specify in the filter.</h4>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>-->
                        <!--<div class="slider__item">
                          <div class="slider__preview">
                            <div class="slider__img"><img data-lazy="assets/media-demo/banner/banner-3.jpg" src="assets/img/lazy-image.jpg" alt=""></div>
                            <div class="slider__container">
                              <div class="container">
                                <div class="row">
                                  <div class="slider__caption">
                                    <h1 class="banner__title banner__title--3">Find the <strong>latest homes for sale, </strong> property news & real estate market data</h1>
                                    <h4 class="banner__subtitle banner__subtitle--2">RealtySpace.com is USA’s Number 1 property site for real estate.</h4>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>-->
                        <!--<div class="slider__item">
                          <div class="slider__preview">
                            <div class="slider__img"><img data-lazy="assets/media-demo/banner/banner-4.jpg" src="assets/img/lazy-image.jpg" alt=""></div>
                            <div class="slider__container">
                              <div class="container">
                                <div class="row">
                                  <div class="slider__caption">
                                    <h1 class="banner__title banner__title--4"><span class="banner__title-span-1">Find your</span><span class="banner__title-border-bottom"></span><span class="banner__title-span-2">perfect home</span><span class="banner__title-border-top"></span><span class="banner__title-span-3">We have 570,302 for you to choose from</span></h1>
                                    <div class="clearfix"></div>
                                    <h4 class="banner__subtitle banner__subtitle--4">The Right Place To Buy, Sell, Rent or Let Property In All Of The World. Selling Property In USA Just Got Easier And Cheaper Thanks To RealtySpace.com. List a Property, Land Or Real Estate In Any Country.</h4>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>-->
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
                                <form action="properties_listing_list.html" class="form form--flex form--search js-search-form form--banner-sidebar">
                                    <h3 class="banner__subtitle">Get in touch to know more!</br></h3>
                                    <div class="row">
                                        <div class="form-group">
                                            <!--                            <label for="in-keyword" class="control-label">Full Name</label>-->
                                            <input type="text" id="in-keyword" placeholder="Full Name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <!--                            <label for="in-keyword" class="control-label">Mobile</label>-->
                                            <input type="text" id="in-keyword" placeholder="Mobile" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <!--                            <label for="in-keyword" class="control-label">Email</label>-->
                                            <input type="email" id="in-keyword" placeholder="Email" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <!--                            <label for="in-contract-type" class="control-label">Intention</label>-->
                                            <select id="in-contract-type" data-placeholder="Register interest for" class="form-control">
                                                <option label=" "></option>
                                                <option>Investments</option>
                                                <option>Real Estate Brokers</option>
                                                <option>Suppliers</option>
                                                <option>Careers</option>
                                            </select>
                                        </div>
                                        <div class="form__buttons">
                                            <button type="submit" class="form__submit">Register Interest</button>
                                        </div>
                                    </div>
                                </form>
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
                            <div class="listing__item">
                                <div class="properties properties--grid">
                                    <div class="properties__thumb"><a href="#" class="item-photo"><img src="assets/media-demo/features/554x360/01.jpg" alt=""/>
                                            <figure class="item-photo__hover item-photo__hover--params"><span class="properties__intro">Read more!</span>
                                            </figure></a>
                                    </div>
                                    <!-- end of block .properties__thumb-->
                                    <div class="properties__details">
                                        <div class="properties__info"><a href="#" class="properties__address"><span class="properties__address-street">Snow Plaza</span><span class="properties__intro">Witness the magic of snowfall in the outdoor plaza in Main Europe Island Centre Plaza, the world’s first climate controlled resort....</span>
                                        </div></a>
                                    </div>
                                    <!-- end of block .properties__info-->
                                </div>
                                <!-- end of block .properties__item-->
                            </div>
                            <div class="listing__item">
                                <div class="properties properties--grid">
                                    <div class="properties__thumb"><a href="#" class="item-photo"><img src="assets/media-demo/features/554x360/02.jpg" alt=""/>
                                            <figure class="item-photo__hover item-photo__hover--params"><span class="properties__intro">Read more!</span>
                                            </figure></a>
                                    </div>
                                    <!-- end of block .properties__thumb-->
                                    <div class="properties__details">
                                        <div class="properties__info"><a href="#" class="properties__address"><span class="properties__address-street">Rainy Street</span><span class="properties__intro">Witness the magic of snowfall in the outdoor plaza in Main Europe Island Centre Plaza, the world’s first climate controlled resort....</span>
                                        </div></a>
                                    </div>
                                    <!-- end of block .properties__info-->
                                </div>
                                <!-- end of block .properties__item-->
                            </div>
                            <div class="listing__item">
                                <div class="properties properties--grid">
                                    <div class="properties__thumb"><a href="#" class="item-photo"><img src="assets/media-demo/features/554x360/03.jpg" alt=""/>
                                            <figure class="item-photo__hover item-photo__hover--params"><span class="properties__intro">Read more!</span>
                                            </figure></a>
                                    </div>
                                    <!-- end of block .properties__thumb-->
                                    <div class="properties__details">
                                        <div class="properties__info"><a href="#" class="properties__address"><span class="properties__address-street">Coral Nursery</span><span class="properties__intro">Witness the magic of snowfall in the outdoor plaza in Main Europe Island Centre Plaza, the world’s first climate controlled resort....</span>
                                        </div></a>
                                    </div>
                                    <!-- end of block .properties__info-->
                                </div>
                                <!-- end of block .properties__item-->
                            </div>
                            <div class="listing__item">
                                <div class="properties properties--grid">
                                    <div class="properties__thumb"><a href="#" class="item-photo"><img src="assets/media-demo/features/554x360/04.jpg" alt=""/>
                                            <figure class="item-photo__hover item-photo__hover--params"><span class="properties__intro">Read more!</span>
                                            </figure></a>
                                    </div>
                                    <!-- end of block .properties__thumb-->
                                    <div class="properties__details">
                                        <div class="properties__info"><a href="#" class="properties__address"><span class="properties__address-street">European Landscape</span><span class="properties__intro">Witness the magic of snowfall in the outdoor plaza in Main Europe Island Centre Plaza, the world’s first climate controlled resort....</span>
                                        </div></a>
                                    </div>
                                    <!-- end of block .properties__info-->
                                </div>
                                <!-- end of block .properties__item-->
                            </div>
                            <div class="listing__item">
                                <div class="properties properties--grid">
                                    <div class="properties__thumb"><a href="#" class="item-photo"><img src="assets/media-demo/features/554x360/05.jpg" alt=""/>
                                            <figure class="item-photo__hover item-photo__hover--params"><span class="properties__intro">Read more!</span>
                                            </figure></a>
                                    </div>
                                    <!-- end of block .properties__thumb-->
                                    <div class="properties__details">
                                        <div class="properties__info"><a href="#" class="properties__address"><span class="properties__address-street">Collection of Fine Things</span><span class="properties__intro">Witness the magic of snowfall in the outdoor plaza in Main Europe Island Centre Plaza, the world’s first climate controlled resort....</span>
                                        </div></a>
                                    </div>
                                    <!-- end of block .properties__info-->
                                </div>
                                <!-- end of block .properties__item-->
                            </div>
                            <div class="listing__item">
                                <div class="properties properties--grid">
                                    <div class="properties__thumb"><a href="#" class="item-photo"><img src="assets/media-demo/features/554x360/06.jpg" alt=""/>
                                            <figure class="item-photo__hover item-photo__hover--params"><span class="properties__intro">Read more!</span>
                                            </figure></a>
                                    </div>
                                    <!-- end of block .properties__thumb-->
                                    <div class="properties__details">
                                        <div class="properties__info"><a href="#" class="properties__address"><span class="properties__address-street">European Hospitality</span><span class="properties__intro">Witness the magic of snowfall in the outdoor plaza in Main Europe Island Centre Plaza, the world’s first climate controlled resort....</span>
                                        </div></a>
                                    </div>
                                    <!-- end of block .properties__info-->
                                </div>
                                <!-- end of block .properties__item-->
                            </div>
                            <div class="listing__item">
                                <div class="properties properties--grid">
                                    <div class="properties__thumb"><a href="#" class="item-photo"><img src="assets/media-demo/features/554x360/03.jpg" alt=""/>
                                            <figure class="item-photo__hover item-photo__hover--params"><span class="properties__intro">Read more!</span>
                                            </figure></a>
                                    </div>
                                    <!-- end of block .properties__thumb-->
                                    <div class="properties__details">
                                        <div class="properties__info"><a href="#" class="properties__address"><span class="properties__address-street">Coral Nursery</span><span class="properties__intro">Witness the magic of snowfall in the outdoor plaza in Main Europe Island Centre Plaza, the world’s first climate controlled resort....</span>
                                        </div></a>
                                    </div>
                                    <!-- end of block .properties__info-->
                                </div>
                                <!-- end of block .properties__item-->
                            </div>
                            <div class="listing__item">
                                <div class="properties properties--grid">
                                    <div class="properties__thumb"><a href="#" class="item-photo"><img src="assets/media-demo/properties/554x360/01.jpg" alt=""/>
                                            <figure class="item-photo__hover item-photo__hover--params"><span class="properties__intro">Read more!</span>
                                            </figure></a>
                                    </div>
                                    <!-- end of block .properties__thumb-->
                                    <div class="properties__details">
                                        <div class="properties__info"><a href="#" class="properties__address"><span class="properties__address-street">Main Europe</span><span class="properties__intro">Witness the magic of snowfall in the outdoor plaza in Main Europe Island Centre Plaza, the world’s first climate controlled resort....</span>
                                        </div></a>
                                    </div>
                                    <!-- end of block .properties__info-->
                                </div>
                                <!-- end of block .properties__item-->
                            </div>
                            <div class="listing__item">
                                <div class="properties properties--grid">
                                    <div class="properties__thumb"><a href="#" class="item-photo"><img src="assets/media-demo/features/554x360/02.jpg" alt=""/>
                                            <figure class="item-photo__hover item-photo__hover--params"><span class="properties__intro">Read more!</span>
                                            </figure></a>
                                    </div>
                                    <!-- end of block .properties__thumb-->
                                    <div class="properties__details">
                                        <div class="properties__info"><a href="#" class="properties__address"><span class="properties__address-street">Rainy Street</span><span class="properties__intro">Witness the magic of snowfall in the outdoor plaza in Main Europe Island Centre Plaza, the world’s first climate controlled resort....</span>
                                        </div></a>
                                    </div>
                                    <!-- end of block .properties__info-->
                                </div>
                                <!-- end of block .properties__item-->
                            </div>
                        </div>
                    </div>
                    <div id="tab-projects" class="tab-pane">
                        <div class="listing listing--grid">
                            <div class="listing__item">
                                <div class="properties properties--grid">
                                    <div class="properties__thumb"><a href="#" class="item-photo"><img src="assets/media-demo/properties/554x360/01.jpg" alt=""/>
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
                                    <div class="properties__thumb"><a href="#" class="item-photo"><img src="assets/media-demo/properties/554x360/02.jpg" alt=""/>
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
                                    <div class="properties__thumb"><a href="#" class="item-photo"><img src="assets/media-demo/properties/554x360/03.jpg" alt=""/>
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
                            <div class="listing__item">
                                <div class="properties properties--grid">
                                    <div class="properties__thumb"><a href="#" class="item-photo"><img src="assets/media-demo/properties/554x360/04.jpg" alt=""/>
                                            <figure class="item-photo__hover item-photo__hover--params"><span class="properties__intro">Witness the magic of snowfall in the outdoor plaza in Main Europe Island Centre Plaza, the world’s first climate controlled resort....</span>
                                            </figure></a><span class="properties__ribon">Sale On</span>
                                    </div>
                                    <!-- end of block .properties__thumb-->
                                    <div class="properties__details">
                                        <div class="properties__info"><a href="#" class="properties__address"><span class="properties__address-street">Sweden</span></a>
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
                                    <div class="properties__thumb"><a href="#" class="item-photo"><img src="assets/media-demo/properties/554x360/05.jpg" alt=""/>
                                            <figure class="item-photo__hover item-photo__hover--params"><span class="properties__intro">Witness the magic of snowfall in the outdoor plaza in Main Europe Island Centre Plaza, the world’s first climate controlled resort....</span>
                                            </figure></a><span class="properties__ribon">Sale On</span>
                                    </div>
                                    <!-- end of block .properties__thumb-->
                                    <div class="properties__details">
                                        <div class="properties__info"><a href="#" class="properties__address"><span class="properties__address-street">Floating Seahorse Villa</span></a>
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
                                    <div class="properties__thumb"><a href="#" class="item-photo"><img src="assets/media-demo/properties/554x360/06.jpg" alt=""/>
                                            <figure class="item-photo__hover item-photo__hover--params"><span class="properties__intro">Witness the magic of snowfall in the outdoor plaza in Main Europe Island Centre Plaza, the world’s first climate controlled resort....</span>
                                            </figure></a><span class="properties__ribon">Sale On</span>
                                    </div>
                                    <!-- end of block .properties__thumb-->
                                    <div class="properties__details">
                                        <div class="properties__info"><a href="#" class="properties__address"><span class="properties__address-street">Germany</span></a>
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
                                    <div class="properties__thumb"><a href="#" class="item-photo"><img src="assets/media-demo/properties/554x360/07.jpg" alt=""/>
                                            <figure class="item-photo__hover item-photo__hover--params"><span class="properties__intro">Witness the magic of snowfall in the outdoor plaza in Main Europe Island Centre Plaza, the world’s first climate controlled resort....</span>
                                            </figure></a><span class="properties__ribon">Sale On</span>
                                    </div>
                                    <!-- end of block .properties__thumb-->
                                    <div class="properties__details">
                                        <div class="properties__info"><a href="#" class="properties__address"><span class="properties__address-street">Switzerland</span></a>
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
                                    <div class="properties__thumb"><a href="#" class="item-photo"><img src="assets/media-demo/properties/554x360/08.jpg" alt=""/>
                                            <figure class="item-photo__hover item-photo__hover--params"><span class="properties__intro">Witness the magic of snowfall in the outdoor plaza in Main Europe Island Centre Plaza, the world’s first climate controlled resort....</span>
                                            </figure></a><span class="properties__ribon">Sale On</span>
                                    </div>
                                    <!-- end of block .properties__thumb-->
                                    <div class="properties__details">
                                        <div class="properties__info"><a href="#" class="properties__address"><span class="properties__address-street">ST. Petersberg</span></a>
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
                                    <div class="properties__thumb"><a href="#" class="item-photo"><img src="assets/media-demo/properties/554x360/09.jpg" alt=""/>
                                            <figure class="item-photo__hover item-photo__hover--params"><span class="properties__intro">Witness the magic of snowfall in the outdoor plaza in Main Europe Island Centre Plaza, the world’s first climate controlled resort....</span>
                                            </figure></a><span class="properties__ribon">Sale On</span>
                                    </div>
                                    <!-- end of block .properties__thumb-->
                                    <div class="properties__details">
                                        <div class="properties__info"><a href="#" class="properties__address"><span class="properties__address-street">Floating Lido</span></a>
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

    <div class="widget js-widget widget--landing">
        <div class="widget__header">
            <h2 class="widget__title">News & PR</h2>
            <div class="widget__footer"><a href="blog.html" class="widget__more"> More News</a></div>
        </div>
        <div class="widget__content">
            <!--include ../widgets/article-->
            <div class="listing listing--grid">
                <div class="listing__item">
                    <!-- BEGIN SECTION ARTICLE-->
                    <div class="article article--grid"><a href="blog_details.html" class="article__photo"><img src="assets/media-demo/news/news-1.jpg" alt="News title" class="article__photo-img">
                            <time datetime="2009-08-29" class="article__time">OCT<strong>27</strong></time></a>
                        <div class="article__details"><a href="blog_details.html" class="article__item-title">Sustainable architecture &amp; design.</a>
                            <div class="article__intro">
                                <p>With the current state of the global climate and the depletion of natural  resources ...</p>
                            </div><a href="blog_details.html" class="article__more">Read more</a>
                        </div>
                        <!-- end of block .articl-->
                    </div>
                    <!-- END SECTION ARTICLE-->
                </div>
                <div class="listing__item">
                    <!-- BEGIN SECTION ARTICLE-->
                    <div class="article article--grid"><a href="blog_details.html" class="article__photo"><img src="assets/media-demo/news/news-2.jpg" alt="News title" class="article__photo-img">
                            <time datetime="2009-08-29" class="article__time">SEP<strong>02</strong></time></a>
                        <div class="article__details"><a href="blog_details.html" class="article__item-title">Hospitality Investment.</a>
                            <div class="article__intro">
                                <p>If you bought a home in these four areas during the downturn, you’ll make a tidy ...</p>
                            </div><a href="blog_details.html" class="article__more">Read more</a>
                        </div>
                        <!-- end of block .articl-->
                    </div>
                    <!-- END SECTION ARTICLE-->
                </div>
                <div class="listing__item">
                    <!-- BEGIN SECTION ARTICLE-->
                    <div class="article article--grid"><a href="blog_details.html" class="article__photo"><img src="assets/media-demo/news/news-3.jpg" alt="News title" class="article__photo-img">
                            <time datetime="2009-08-29" class="article__time">AUG<strong>11</strong></time></a>
                        <div class="article__details"><a href="blog_details.html" class="article__item-title">Experience Europe in Dubai.</a>
                            <div class="article__intro">
                                <p>The low-slung ranch house has been reborn. These minimalist designs have high ...</p>
                            </div><a href="blog_details.html" class="article__more">Read more</a>
                        </div>
                        <!-- end of block .articl-->
                    </div>
                    <!-- END SECTION ARTICLE-->
                </div>
            </div>
        </div>
    </div>
    <div class="widget js-widget widget--landing">
        <div class="widget__header">
            <h2 class="widget__title">Events</h2>
            <div class="widget__footer"><a href="blog.html" class="widget__more"> More Events</a></div>
        </div>
        <div class="widget__content">
            <!--include ../widgets/article-->
            <div class="listing listing--grid">
                <div class="listing__item">
                    <!-- BEGIN SECTION ARTICLE-->
                    <div class="article article--grid"><a href="blog_details.html" class="article__photo"><img src="assets/media-demo/news/news-1.jpg" alt="News title" class="article__photo-img">
                            <time datetime="2009-08-29" class="article__time">OCT<strong>27</strong></time></a>
                        <div class="article__details"><a href="blog_details.html" class="article__item-title">Event One</a>
                            <div class="article__intro">
                                <p>With the current state of the global climate and the depletion of natural  resources ...</p>
                            </div><a href="blog_details.html" class="article__more">Read more</a>
                        </div>
                        <!-- end of block .articl-->
                    </div>
                    <!-- END SECTION ARTICLE-->
                </div>
                <div class="listing__item">
                    <!-- BEGIN SECTION ARTICLE-->
                    <div class="article article--grid"><a href="blog_details.html" class="article__photo"><img src="assets/media-demo/news/news-2.jpg" alt="News title" class="article__photo-img">
                            <time datetime="2009-08-29" class="article__time">SEP<strong>02</strong></time></a>
                        <div class="article__details"><a href="blog_details.html" class="article__item-title">Event Two</a>
                            <div class="article__intro">
                                <p>If you bought a home in these four areas during the downturn, you’ll make a tidy ...</p>
                            </div><a href="blog_details.html" class="article__more">Read more</a>
                        </div>
                        <!-- end of block .articl-->
                    </div>
                    <!-- END SECTION ARTICLE-->
                </div>
                <div class="listing__item">
                    <!-- BEGIN SECTION ARTICLE-->
                    <div class="article article--grid"><a href="blog_details.html" class="article__photo"><img src="assets/media-demo/news/news-3.jpg" alt="News title" class="article__photo-img">
                            <time datetime="2009-08-29" class="article__time">AUG<strong>11</strong></time></a>
                        <div class="article__details"><a href="blog_details.html" class="article__item-title">Event Three</a>
                            <div class="article__intro">
                                <p>The low-slung ranch house has been reborn. These minimalist designs have high ...</p>
                            </div><a href="blog_details.html" class="article__more">Read more</a>
                        </div>
                        <!-- end of block .articl-->
                    </div>
                    <!-- END SECTION ARTICLE-->
                </div>
            </div>
        </div>
    </div>
    <!-- END CENTER SECTION-->
</div>
@stop

@section('footer_scripts')

@stop


