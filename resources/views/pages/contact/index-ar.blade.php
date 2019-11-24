@extends('layouts/default')

@section('title')
About us
@parent
@stop

@section('header_styles')

@stop

@section('breadcrumbs')
<nav class="breadcrumbs">
    <div class="container">
        <ul>
            <li class="breadcrumbs__item"><a href="" class="breadcrumbs__link">Home</a></li>
            <li class="breadcrumbs__item"><a href="" class="breadcrumbs__link">Contact</a></li>
        </ul>
    </div>
</nav>
@stop

@section('content')
<div class="center">
    <div class="container">
        <div class="widget js-widget widget--landing">
            <div class="widget__header">
                <h2 class="widget__title">Contact Us</h2>
            </div>
            <div class="widget__content">
                <div class="contacts">
                    <div class="row">
                        <div class="contacts__column">
                            <div class="contacts__address">
                                <address class="contacts__address-item"><span class="contacts__address-title">The Hear of Europe - Head Office</span>
                                    <dl class="contacts__address-column">
                                        <dt class="contacts__address-column__title">Address:</dt>
                                        <dd>Arenco Tower, 20th Floor<br>Dubai Media City, Dubai<br>United Arab Emirates</dd>
                                    </dl>
                                    <dl class="contacts__address-column">
                                        <dt class="contacts__address-column__title">Phone:</dt>
                                        <dd>+971 4 818 1481</dd>
                                    </dl>
                                    <dl class="contacts__address-column">
                                        <dt class="contacts__address-column__title">Email:</dt>
                                        <dd><a href="mailto:">info@thoe.com</a><br><a href="mailto:">sales@thoe.com</a><br></dd>
                                    </dl>
                                </address>
                            </div>
                            <div class="contacts__form">
                                <div class="alert alert-info">Or fill in the form below to reach us!</div>
                                <form action="#" method="POST" class="form form--flex js-contact-form form--contacts">
                                    <div class="row">
                                        <div class="form-group required">
                                            <label for="in-form-name" class="control-label">Your Name</label>
                                            <input id="in-form-name" type="text" name="name" required class="form-control">
                                        </div>
                                        <div class="form-group form-group--col-6">
                                            <label for="in-form-phone" class="control-label">Mobile</label>
                                            <input id="in-form-phone" type="text" name="phone" class="form-control">
                                        </div>
                                        <div class="form-group form-group--col-6 required">
                                            <label for="in-form-email" class="control-label">E-mail</label>
                                            <input id="in-form-email" type="email" name="email" required data-parsley-trigger="change" class="form-control">
                                        </div>
                                        <div class="form-group required">
                                            <label for="in-form-message" class="control-label">Message</label>
                                            <textarea id="in-form-message" name="message" required data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-validation-threshold="10" data-parsley-minlength-message="You need to enter at least a 20 caracters long comment.." class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <button type="submit" class="form__submit">Submit</button>
                                    </div>
                                </form>
                                <!-- end of block form-->
                            </div>
                        </div>
                        <div class="contacts__column">
                            <div class="contacts__body">
                                <h4>The Heart of Europe</h4>
                                <p>All The Heart of Europe’s hotels, palaces, villas, vessels and underwater living experiences are inspired by iconic European experiences and culture. 4,000+ units tailored for the most refined vacationers and staycationers.</p>
                                <p>With breath-taking entertainment, beaches, pools, snow streets, yacht culture and culinary delights. Along with the perfect climate, breathtaking natural beauty and a wealth of cultural prestige.</p>
                            </div>
                            <div class="contacts__social">
                                <div class="social social--worker social--contacts"><span class="contacts__social-title">Our social profiles:</span><a href="#" class="social__item"><i class="fa fa-facebook"></i></a><a href="#" class="social__item"><i class="fa fa-twitter"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- END CENTER SECTION-->
<div class="map map--contacts">
    <div class="map__buttons">
        <button type="button" class="map__change-map js-map-btn">Address Map</button>
    </div>
    <div class="map__wrap">
        <div data-infobox-theme="white" class="map__view js-map-canvas-contact"></div>
    </div>
</div>
<!-- BEGIN AFTER CENTER SECTION-->
@stop


@section('footer_scripts')

@stop

