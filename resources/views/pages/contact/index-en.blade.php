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
                                <address class="contacts__address-item"><span class="contacts__address-title"><?= $contact['address_title_' . $locale] ?></span>
                                    <dl class="contacts__address-column">
                                        <dt class="contacts__address-column__title">Address:</dt>
                                        <dd><?= $contact['address_' . $locale] ?></dd>
                                    </dl>
                                    <dl class="contacts__address-column">
                                        <dt class="contacts__address-column__title">Phone:</dt>
                                        <dd><a href="tel:<?= $contact['address_' . $locale] ?>"><?= $contact['address_' . $locale] ?></a></dd>
                                    </dl>
                                    <dl class="contacts__address-column">
                                        <dt class="contacts__address-column__title">Email:</dt>
                                        <dd>
                                            <?php foreach (explode(',', $contact['email_id']) as $email) { ?>
                                                <a href="mailto:<?= $email ?>"><?= $email ?></a><br>
                                            <?php } ?>
                                        </dd>
                                    </dl>
                                </address>
                            </div>
                            <div class="contacts__form">
                                <div class="alert alert-info">Or fill in the form below to reach us!</div>
                                <form id="get-in-touch" action="<?= url("$locale/contact-send") ?>" method="post" class="form form--flex js-contact-form form--contacts">   
                                    @csrf
                                    <div class="row">
                                        <div class="form-group required">
                                            <label for="in-form-name" class="control-label">Your Name</label>
                                            <input id="in-form-name" type="text" name="name" required class="form-control">
                                        </div>
                                        <div class="form-group form-group--col-6">
                                            <label for="in-form-phone" class="control-label">Mobile</label>
                                            <input id="in-form-phone" type="text" name="phone" class="form-control" required>
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
                                        <div id="response-msg"></div>
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
                                <h4><?= $contact['title_' . $locale] ?></h4>
                                <?= $contact['description_' . $locale] ?>
                            </div>
                            <div class="contacts__social">
                                <div class="social social--worker social--contacts"><span class="contacts__social-title">Our social profiles:</span><a href="<?= $setting['facebook_link'] ?>" class="social__item"><i class="fa fa-facebook"></i></a><a href="<?= $setting['twitter_link'] ?>" class="social__item"><i class="fa fa-twitter"></i></a></div>
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
        <?= $contact['google_map'] ?>

    </div>
</div>
<!-- BEGIN AFTER CENTER SECTION-->
@stop


@section('footer_scripts')

@stop


@push('custom_script')
<script>
    $('#get-in-touch').on('submit', function () {
        $.ajax({
            type: 'POST',
            data: $(this).serialize(),
            url: $(this).attr('action'),
            datatype: 'json',
            success: function (data) {
                if (data.status === 'success') {
                    $('.form__submit').text('Sent');
                    $('#response-msg').text(data.msg).removeClass('hidden').addClass('text-green');
                    setTimeout(function () {
                        $('.submit-btn').text('Register Interest');
                        $('#response-msg').addClass('hidden');
                        $("#in-form-name,#in-form-email,#in-form-phone,#in-form-message").val("");
                    }, 5000);
                } else if (data.status === 'failed') {
                    $('#response-msg').text(data.error).removeClass('hidden').addClass('text-red');
                    $('.form__submit').text('Register Interest').removeProp("disabled");
                } else {
                    $('.submit-btn').text('Register Interest');
                    return false;
                }
            }
        });
        return false;
    });
</script>
@endpush