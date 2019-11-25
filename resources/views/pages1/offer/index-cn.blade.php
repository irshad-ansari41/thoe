@extends('layouts/default')


@section('header_styles')
<!-- Time line css -->
<style>
    table,tr,td{ line-height: 0 !important; padding: 10px 0; margin:0;}    
    @media only screen and (min-width: 1024px){
        .bg-gray-lighter{background-color: #f8f8f8;padding: 50px 65px 50px 65px;font-size: 14px}
        .bg-white-lighter{background-color: #fff;padding: 50px 65px 50px 65px;font-size: 14px}
        .cptext{margin: 0 120px;font-size: 22px!important; line-height: 30px!important;}
    }
    @media only screen and (max-width: 1024px){
        .bg-gray-lighter{background-color: #f8f8f8;padding: 50px 0 50px 0;}
        .bg-white-lighter{background-color: #fff;padding: 50px 0 50px 0;}
        .separete{display: none;}
        .cptext{font-size: 22px!important; line-height: 30px!important;}

    }

    @media only screen and (min-width: 768px){
        /*        .paraclass{ font-size:1.1rem !important; margin: 0px 50px 15px 0px;} 
                .parallax-container {background-position: top center; background-size: cover; background-repeat: no-repeat; height: 425px !important;}*/
        .imgtag{display: none;}

    }
    @media only screen and (max-width: 768px){
        /*        .paraclass{font-size:1.1rem !important; margin: 0px 0px 20px 0px;}
                .parallax-container{ background: none; height: auto !important;}*/
        .imgtag{display: block; width: 100%;}
        .smtext{display: block;margin: 15px 0;}


    }
    .parallax-container{width: 100%;}
    .p-text{margin-top: 0;text-align: left;font-size: 14px}
    .text-center{text-align: center}
    .img-responsive{width: 100%;}
    .title1{ margin: 0 0 20px;text-transform: unset!important;}
    .title2{font-size: 16px!important;font-weight: bold;color: #444;text-align: left;}
    .title3{font-size: 16px!important;color: #666;text-align: left;}
    .span1{font-size: 35px; font-weight: 100; line-height: 30px; margin-bottom: 10px;}
    .span2{font-weight: 100;}
    .enquire{background: #444!important;float:right }
    /*    table tr td:nth-child(1){width: 80px; vertical-align: middle;}
        table tr td:nth-child(2){vertical-align: middle; text-align: left; width: 20px;}*/
    .modal .modal-content{padding: 10px;}
    .grecaptcha-badge{display: none!important;}
    nav {height: 56px!important;line-height: 56px!important;}
    .bb{border-bottom: 1px solid #eee;}
    @media screen and (min-width: 769px){
        .enq-now{display: none;}
        .az-btns{ display: none;}
    }
    @media screen and (max-width: 768px){
        .mobileds{display: none;}
        .enq-now{display: none;}
    }
    #stick-form{background:rgba(21, 88, 149, 0.8) !important;height: 330px;padding: 10px 0px;border:2px solid #dadada;position: absolute;right: 35px;top:35px}
    .modal{background-color: #fff;}
</style>

@stop

@section('main_div_wrapper')

@stop

@section('section_content')

<!-- Header -->

<section>
    <div class="container">
        <div class="parallax-container valign-wrapper">
            <div class="parallax">
                <img alt="" src="<?=SITE_URL?>/assets/images/ips/hero-image.jpg">
            </div>

            <div class="col s12 center-align card tag-pro only-heading">
                <h1>Offers</h1>
            </div>

            <div id='stick-form' class="mobileds">
                <iframe src="<?=SITE_URL?>/<?= $locale ?>/lead-form" border="0" style="width:349px;height:360px;border:none;" scrolling="No"></iframe>                             
            </div>
        </div>
    </div>
</section>

<?php /* if ($locale == 'en') { ?>
  <a class="enq-now" id="#register-with-us"><h6 class="btn-enquire"><strong style="font-size: 20px;margin-right: 5px;"><i class="ion-ios-paperplane-outline"></i></strong>{{trans('words.Enquire Now')}}</h6></a>
  <a href="#enquire-now"  class="az-btns active modal-trigger"><h6 class="btn-enquire"><strong style="font-size: 20px;margin-right: 5px;"><i class="ion-ios-paperplane-outline"></i></strong>{{trans('words.Enquire Now')}}</h6></a>

  <?php } else if ($locale == 'cn') { ?>
  <a class="enq-now" id="#register-with-us"><h6 class="btn-enquire" style="right: -3em"><strong style="font-size: 20px;margin-right: 5px;"><i class="ion-ios-paperplane-outline"></i></strong>立即咨询</h6></a>
  <?php } else if ($locale == 'ar') { ?>
  <a class="enq-now" id="#register-with-us"><h6 class="btn-enquire"><strong style="font-size: 20px;margin-right: 5px;"><i class="ion-ios-paperplane-outline"></i></strong>{{trans('words.Enquire Now')}}</h6></a>
  <a href="#enquire-now"  class="az-btns active modal-trigger"><h6 class="btn-enquire"><strong style="font-size: 20px;margin-right: 5px;"><i class="ion-ios-paperplane-outline"></i></strong>{{trans('words.Enquire Now')}}</h6></a>
  <?php } */ ?>


<section class="bg-gray-lighter">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h2 class="title1">Thoe Riviera, Meydan</h2>
            </div>
            <div class="col s12 m4">
                <img class="img-responsive" src="<?=SITE_URL?>/assets/images/ips/IPS-All-Offers-Emailer_Riviera.jpg">
            </div>
            <div class="col s12 m1 separete" style="width:40px"></div>
            <div class="col s12 m7">

                <p class="p-text">
                    Thoe Riviera combines the best of French Mediterranean design perspective and modern architecture to create the ideal place for modern community living. Thoe Riviera comprises of 69 mid-rise residential buildings, a mega integrated retail district, breathtaking waterfront views and lush greenery.
                </p>
                <span class="title2">Limited Time Offer</span>
                <table style="width: 200px;">
                    <tr>
                        <td style="width: 75px;"><div class="span1">50%</div><div>on booking</div></td>
                        <td>-</td>
                        <td><div class="span1">50%</div><div>on handover</div></td>
                    </tr>
                </table>
                <div class="span2"> Studio  - 2 years service charge free, 1 Bed - 2 Years service charge free, 2 Bed - 3 years service charge free</div>
                <p class="title2">Construction progress of Phase 1 at 39% and completion in Q4 2019</p>
                <a href="#enquire-now" class="btn active modal-trigger enquire" data-campaign="Thoe Riviera Select">Enquire Now <i class="fa fa-angle-right"></i></a>
            </div>
        </div>   
    </div>
</section>

<section class="bg-white-lighter">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h2 class="title1">BAYT by Thoe</h2>
            </div>
            <div class="col s12 m4">
                <img class="img-responsive" src="<?=SITE_URL?>/assets/images/ips/IPS-All-Offers-Emailer_BAYT.jpg">
            </div>
            <div class="col s12 m1 separete" style="width:40px"></div>
            <div class="col s12 m7">
                <p class="p-text">
                    BAYT is a new short-term rental home concept through which investors can yield higher returns by having their owned apartments managed and serviced for them. Following the success of BAYT by Thoe in Dubai Sports City, Dubai will be home to the 2nd BAYT concept now in Thoe Riviera.
                </p>
                <span class="title2">Limited Time Offer</span>
                <div class="span2">Payment plan 65% - 35%</div>
                <!--                <div class="span2">Furnished property starting from AED 545,000</div>
                                <p class="title2">Construction progress at 35% and completion in Q4 2019</p>-->
                <a href="#enquire-now" class="btn active modal-trigger enquire" data-campaign="BAYT by Thoe Riviera">Enquire Now <i class="fa fa-angle-right"></i></a>
            </div>
        </div>   
    </div>
</section>





<section class="bg-gray-lighter">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h2 class="title1">Al Furjan Community</h2>
            </div>
            <div class="col s12 m4">
                <img class="img-responsive" src="<?=SITE_URL?>/assets/images/ips/IPS-All-Offers-Emailer_Al-Furjan.jpg">
            </div>
            <div class="col s12 m1 separete" style="width:40px"></div>
            <div class="col s12 m7">
                <p class="p-text">
                    An up and coming location, with excellent connectivity, built around the EXPO Route 2020. Al Furjan comprises of 5 low rise units with a vast array of retail areas and leisure options in their vicinity. These properties offer the best of modern living, allowing residents to see the bustle of the city without having to live in it.  
                </p>
                <span class="title2">Limited Time Payment Plan</span>
                <table style="width: 300px">
                    <tr>
                        <td><div class="span1">10%</div><div>on booking</div></td>
                        <td><div class="span1">75%</div><div>on handover</div></td>
                        <td><div class="span1">15%</div><div>on post handover</div></td>
                    </tr>
                </table>
                <p class="title2">Completion of Farishta and Plaza in Q2 2019<br/>Completion of Samia, Shaista and Star in Q4 2019</p>
                <a href="#enquire-now" class="btn active modal-trigger enquire" data-campaign="Al Furjan">Enquire Now <i class="fa fa-angle-right"></i></a>
            </div>
        </div> 
    </div>
</section>

<section class="bg-white-lighter">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h2 class="title1">Thoe Victoria, Meydan</h2>
            </div>
            <div class="col s12 m4">
                <img class="img-responsive" src="<?=SITE_URL?>/assets/images/ips/IPS-All-Offers-Emailer_Victoria.jpg">
            </div>
            <div class="col s12 m1 separete" style="width:40px"></div>
            <div class="col s12 m7">
                <p class="p-text">
                    Positioned as a vibrant hub of activity, Thoe Victoria is centered around community living, emulating the perfect balance of entertainment, work and living spaces offering visitors and residents a contemporary urban lifestyle.
                </p>
                <span class="title2">Limited Time Offer</span>
                <table style="width: 200px;">
                    <tr>
                        <td style="width: 75px;"><div class="span1">50%</div><div>on booking</div></td>
                        <td>-</td>
                        <td><div class="span1">50%</div><div>on handover</div></td>
                    </tr>
                </table>
                <div class="span2"> Studio  - 2 years service charge free, 1 Bed - 2 Years service charge free, 2 Bed - 3 years service charge free</div>
                <p class="title2">Completion of Thoe Victoria Phase 1 in Q1 2021</p>
                <a href="#enquire-now" class="btn active modal-trigger enquire" data-campaign="Thoe Victoria">Enquire Now <i class="fa fa-angle-right"></i></a>
            </div>
        </div>   
    </div>
</section>

<section class="bg-gray-lighter">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h2 class="title1">Mina by Thoe</h2>
            </div>
            <div class="col s12 m4">
                <img class="img-responsive" src="<?=SITE_URL?>/assets/images/ips/IPS-All-Offers-Emailer_Mina.jpg">
            </div>
            <div class="col s12 m1 separete" style="width:40px"></div>
            <div class="col s12 m7">
                <p class="p-text">
                    Nestled on the East Crescent of Palm Jumeirah, Mina by Thoe is a prestigious development comprising premium residential and commercial units that feature luxury amenities, private beach access and breathtaking sea views from every apartment.
                </p>
                <span class="title2">Limited Time Payment Plan</span>
                <table style="width: 162px;">
                    <tr>
                        <td style="width: 75px;"><div class="span1">25%</div><div>on booking</div></td>
                        <td>-</td>
                        <td><div class="span1">75%</div><div>on handover</div></td>
                    </tr>
                </table><br/>
                <div class="span2">1 Bedroom available from  AED 1,843,000<sup>*</sup></div>
                <div class="span2">2 years service charge free</div>
                <p class="title2">Construction progress at 60% and completion in Q4 2019</p>
                <a href="#enquire-now" class="btn active modal-trigger enquire" data-campaign="Mina by Thoe" >Enquire Now <i class="fa fa-angle-right"></i></a>
            </div>
        </div>   
    </div>
</section>


<section class="bg-white-lighter">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h2 class="title1">Aliyah</h2>
            </div>
            <div class="col s12 m4">
                <img class="img-responsive" src="<?=SITE_URL?>/uploads/2019/04/aliyah.jpg">
            </div>
            <div class="col s12 m1 separete" style="width:40px"></div>
            <div class="col s12 m7">
                <p class="p-text">
                    Thoe Aliyah is nestled between the hustle and bustle of city life, and the harmonious surroundings of serene landscapes in Dubai Healthcare City. Rising 17 floors above the basement, this plush 346-unit project will offer studios, one, and two-bedroom apartments along with upscale retail space of 16,000 sqft.
                </p>
                <span class="title2">Limited Time Payment Plan</span>
                <table style="width: 300px">
                    <tr>
                        <td><div class="span1">10%</div><div>on booking</div></td>
                        <td><div class="span1">75%</div><div>on handover</div></td>
                        <td><div class="span1">15%</div><div>on post handover</div></td>
                    </tr>
                </table><br/>
                <!--<div class="span2">1 Bedroom available from  AED 1,843,000<sup>*</sup></div>-->
                <div class="span2">1 Bed - 2 Years service charge free, 2 Bed - 3 years service charge free</div>
                <p class="title2">Construction progress at 60% and completion in Q4 2019</p>
                <a href="#enquire-now" class="btn active modal-trigger enquire" data-campaign="Mina by Thoe" >Enquire Now <i class="fa fa-angle-right"></i></a>
            </div>
        </div>   
    </div>
</section>


<section class="bg-gray-lighter">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h2 class="title1">Farhad & Fawad</h2>
            </div>
            <div class="col s12 m4">
                <img class="img-responsive" src="<?=SITE_URL?>/uploads/2019/04/farhad.jpg">
            </div>
            <div class="col s12 m1 separete" style="width:40px"></div>
            <div class="col s12 m7">
                <p class="p-text">
                    Rising up 17 impressive storeys, Farhad Thoe is the new benchmark for convenience, practicality and modernism. There's a choice of 634 comfortable residential units including 396 studios, 218 one-bedroom apartments and 20 two-bedroom apartments, all elegantly conceived with ultra-modern finishing and spectacular contemporary design.
                </p>
                <span class="title2">Limited Time Payment Plan</span>
                <table style="width: 162px;">
                    <tr>
                        <td style="width: 75px;"><div class="span1">30%</div><div>on booking</div></td>
                        <td>-</td>
                        <td><div class="span1">70%</div><div>on handover</div></td>
                    </tr>
                </table><br/>
                <!--<div class="span2">Studio  - 2 years service charge free, 1 Bed   - 2 Years service charge free, 2 Bed -  3 years service charge free</div>-->
<!--                <div class="span2">2 years service charge free</div>
                <p class="title2">Construction progress at 60% and completion in Q4 2019</p>-->
                <a href="#enquire-now" class="btn active modal-trigger enquire" data-campaign="Mina by Thoe" >Enquire Now <i class="fa fa-angle-right"></i></a>
            </div>
        </div>   
    </div>
</section>


<section class="bg-white-lighter">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h2 class="title1">Thoe Aura, Jebel Ali</h2>
            </div>
            <div class="col s12 m4">
                <img class="img-responsive" src="<?=SITE_URL?>/assets/images/ips/IPS-All-Offers-Emailer_Mina.jpg">
            </div>
            <div class="col s12 m1 separete" style="width:40px"></div>
            <div class="col s12 m7">
                <p class="p-text">
                    As one of the most comprehensive developments in Jabal Ali, Aura rises up 17 floors and is home to 479 unfurnished elegant residential units. The apartments of the complex vary in size and shape with 349 studios, 87 one-bedroom, and 43 two-bedroom apartments, each honing masterful finishing and beautifully-intricate designs.
                </p>
                <span class="title2">Limited Time Payment Plan</span>
                <table style="width: 162px;">
                    <tr>
                        <td style="width: 75px;"><div class="span1">25%</div><div>on booking</div></td>
                        <td>-</td>
                        <td><div class="span1">75%</div><div>on handover</div></td>
                    </tr>
                </table>
                <!--<div class="span2">1 Bedroom available from  AED 1,843,000<sup>*</sup></div>-->
                <div class="span2"> Studio  - 2 years service charge free, 1 Bed - 2 Years service charge free, 2 Bed - 3 years service charge free</div>
                <!--<p class="title2">Construction progress at 60% and completion in Q4 2019</p>-->
                <a href="#enquire-now" class="btn active modal-trigger enquire" data-campaign="Thoe Aura" >Enquire Now <i class="fa fa-angle-right"></i></a>
            </div>
        </div>   
    </div>
</section>














<!-- Enquire Now -->
<div id="enquire-now" class="modal" style="max-height: 100%; top:0.5%; max-width: 475px">
    <div class="modal-content book-now">
        <div class="modal-header" style="border: none;">
            <a href="#" class="modal-close waves-effect waves-green btn-flat " style="width: 33px; position: absolute; right: 2px; font-size: 30px; top: 2px;">&times;</a>
            <h4 class="modal-title" style="margin: 5px 5px 0;">{{trans('words.ENQUIRE NOW')}}</h4>
        </div>
        <div class="row m0">
            <div class="col s12" style="padding: 0;">
                <iframe src="<?=SITE_URL?>/<?= $locale ?>/lead-form" class="iframe-lead-form" border="0" style="width:100%;height:260px;border:none;"></iframe>
            </div>
        </div>
    </div>
</div>
<!-- End -->

@stop

@section('footer_main_scripts')

<script>
$('.enquire').click(function () {
    sessionStorage.setItem("utm_campaign", $(this).data('campaign'));
    $('iframe').each(function () {
        this.contentWindow.location.reload(true);
    });
});
sessionStorage.setItem("ips_offers_url",'<?=SITE_URL?>/en/offers');
</script>	

@stop

