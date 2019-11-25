@extends('layouts/default')

{{-- page level styles --}}
@section('header_styles')
<!-- Time line css -->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/timeline_style.css')}}">
<style>.parallax-container .parallax img {    top: initial;}.cd-horizontal-timeline .timeline {position: relative;height: 100px;margin: 0 auto;width: 60%;}</style>
<!-- End -->
@stop

@section('main_div_wrapper')

@stop

@section('section_content')
<?php $get = filter_input_array(INPUT_GET); ?>
<!-- Header -->
<section class="az-section">
    <div class="container" style="margin-bottom: 5rem;">
        <div class="parallax-container valign-wrapper" style="min-height: 600px;margin-top: 6rem;">
            <div class="parallax">
                <img alt="thank you" src="https://d20sujmgffrs6.cloudfront.net/sakkini-projects/2016/11/06145932/aliyah-gallery-6.jpg" style="display: block; transform: translate3d(-50%, 137px, 0px);">
            </div>
            <div class="row m0 center-align" style="background: #ffffffd6;padding: 5rem;width: 100%;">
                <div class="col s12">
                    <?php if (!empty($get['nl']) && $get['nl'] = 'C') { ?>
                        <h5 class="m0">YOU ARE NOW SUBSCRIBED TO OUR NEWSLETTER!</h5>
                        <p style="text-align: center;">Thank you for subscribing to our newsletter! We’ll keep you up-to-date on the latest Thoe news and projects.</p>
                        <h6 style="display: inline-block;cursor: pointer;text-decoration: underline;">
                            <span class="ion-arrow-left-a" style="margin-right: 5px;"></span>
                            <a href="{{ url('/') }}">{{trans('words.home')}}</a>
                        </h6> 
                    <?php } else { ?>
                        <h5 class="m0">{{trans('words.THANK YOU FOR YOUR INTEREST')}}!</h5>
                        <p style="text-align: center;">{{trans('words.If you have any queries, please feel to contact us.')}}</p>
                        <h6 style="display: inline-block;cursor: pointer;text-decoration: underline;">
                            <span class="ion-arrow-left-a" style="margin-right: 5px;"></span>
                            <a href="{{ url('/') }}">{{trans('words.home')}}</a>
                        </h6>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
        </div>
    </div>

</section>
<!-- End -->

@stop

@section('footer_main_scripts')


<script>
    setInterval(function () {
        var getRedirUrl = sessionStorage.getItem("file_url");
        if (getRedirUrl !== null) {
            sessionStorage.removeItem("file_url");
            localStorage.setItem("hide_popup", "<?= date('i') + 4 ?>");
            window.location.href = getRedirUrl;
        }
    }, 3000);

    var website_page_url = localStorage.getItem("website_page_url");
    if (website_page_url !== null) {
        window.setTimeout(function () {
            location.href = website_page_url;
        }, 15000);

    }
</script>


@stop
@section('footer_scripts')
<!-- Timeline -->
<script type="text/javascript" src="{{asset('assets/js/timeline-main.js')}}"></script>
@stop
