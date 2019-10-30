@extends('layouts/ips')

{{-- page level styles --}}
@section('header_styles')
<!-- Time line css -->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/timeline_style.css')}}">
<style>
    .parallax-container .parallax img { top: initial;}
    .cd-horizontal-timeline .timeline {position: relative;height: 100px;margin: 0 auto;width: 60%;}
    .az-nav-header{ background: #004196 !important;  }
    #page-footer .inner #footer-copyright{ 
        background: #004196 !important;  padding:10px 0px;
        position:sticky; bottom: 0;
    }

</style>
<!-- End -->
@stop

@section('main_div_wrapper')

@stop

@section('section_content')
<?php //$get = filter_input_array(INPUT_GET); ?>
<!-- Header -->
<section class="az-section">
    <div class="container" style="margin-bottom: 5rem;">
        <div class="parallax-container valign-wrapper" style="min-height: 600px;margin-top: 6rem;">
            <div class="parallax">
                <img alt="thank you" src="http://aziziriviera.com/azizi-emailer/images/ips-2019/26-28_Mar_IPS_Emailer_New.jpg" style="display: block; transform: translate3d(-50%, 137px, 0px);">
            </div>
            <div class="row m0 center-align" style="background: #ffffffd6;padding: 5rem;width: 100%;">
                <div class="col s12">
                    <h5 class="m0" id="msg"></h5>
                    <p style="text-align: center;">{{trans('words.If you have any queries, please feel to contact us.')}}</p>
                    <h6 style="display: inline-block;cursor: pointer;text-decoration: underline;">
                        <span class="ion-arrow-left-a" style="margin-right: 5px;"></span>
                        <a href="{{ route('ips.index') }}">{{trans('words.home')}}</a>
                    </h6>
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
var ipsUrl = sessionStorage.getItem("website_ips_url");
console.log(ipsUrl);
if (ipsUrl !== null) {
    $('#msg').text('Thank you for submitting your details, you will receive an email from us shortly.');
    setTimeout(function () {
        window.location.href = ipsUrl;
    }, 10000);

}
var refUrl = sessionStorage.getItem("website_ref_url");
console.log(refUrl);
if (refUrl !== null) {
    $('#msg').text('Thank you for submitting your details and details of the person you would like to introduce.  One of our agents will reach out to you shortly.');
    setTimeout(function () {
        window.location.href = refUrl;
    }, 10000);

}
</script>





@stop
@section('footer_scripts')
<!-- Timeline -->
<script type="text/javascript" src="{{asset('assets/js/timeline-main.js')}}"></script>
<script>
var docheight = $(document).height();
var azheight = $('.az-section').height();
var footerheight = $('#footer-copyright').height();
$('#footer-copyright').css('margin-top', (docheight - azheight) + footerheight - 70);
//alert($('#footer-copyright').height());

</script>
@stop
