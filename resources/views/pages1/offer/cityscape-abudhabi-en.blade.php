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
        .paraclass{ font-size:1.1rem !important; margin: 0px 50px 15px 0px;} 
        .parallax-container {background-position: top center; background-size: cover; background-repeat: no-repeat; height: 425px !important;}
        .imgtag{display: none;}

    }
    @media only screen and (max-width: 768px){
        .paraclass{font-size:1.1rem !important; margin: 0px 0px 20px 0px;}
        .parallax-container{ background: none; height: auto !important;}
        .imgtag{display: block; width: 100%;}
        .smtext{display: block;margin: 15px 0;}


    }
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
</style>

@stop

@section('main_div_wrapper')

@stop

@section('section_content')

<!-- Header -->

<section>
    <div class="parallax-container valign-wrapper only-heading" style="background-image:url('<?=SITE_URL?>/assets/images/ips/hero-image.jpg');">
        <img alt="Cityscape - Thoe Developments" src="<?=SITE_URL?>/assets/images/ips/hero-image.jpg" class="imgtag"/>
        <div class="col s12 center-align card tag-pro">
            <h1>Cityscape Abu Dhabi</h1>
        </div>
    </div>
</section>


<section class="bg-white-lighter">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h2 class="title1">UAE Nationals Offer</h2>
            </div>
            <div class="col s12 m4">
                <img class="img-responsive" src="<?=SITE_URL?>/uploads/2019/04/Cityscape-AUH-Mailer-Flag.jpg" alt=""/>
            </div>
            <div class="col s12 m1 separete" style="width:40px"></div>
            <div class="col s12 m7">
                <!-- Text Intro -->
                <span style="font-size: 80px; line-height: 53px;">0%</span>
                <span>down payment</span><br/><br/>

                <span class="title2">Limited Time Offer</span>
                <div class="span2">Monthly payment plan</div>
                <div class="span2">On studios in Thoe Victoria starting from AED 421,000</div>
                <p class="title2">Handover in 24 months</p>
                <!-- Read More Link -->
                <a href="#enquire-now" class="btn active modal-trigger enquire" data-campaign="Thoe Riviera Select">Enquire Now <i class="fa fa-angle-right"></i></a>
            </div>
        </div>   
    </div>
</section>
<section class="bg-gray-lighter text-center">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h2 class="title1">Own your dream home through an amazing financing solution</h2>
            </div>

            <div class="col s12">
                <p class="text-center cptext">
                    Making property purchases more affordable than ever before<br/>
                    Thoe Developments has partnered with Dubai Islamic Bank to bring you MyHome<br/>
                    A unique new home financing solution
                </p>
                <br/>
                <a href="#enquire-now" class="btn active modal-trigger enquire" data-campaign="Live for free" style="float: unset;">Enquire Now <i class="fa fa-angle-right"></i></a>
            </div>
        </div>   
    </div>
</section>
<section class="bg-white-lighter">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h2 class="title1">Thoe Riviera Select</h2>
            </div>
            <div class="col s12 m4">
                <img class="img-responsive" src="<?=SITE_URL?>/assets/images/ips/IPS-All-Offers-Emailer_Riviera.jpg">
            </div>
            <div class="col s12 m1 separete" style="width:40px"></div>
            <div class="col s12 m7">

                <p class="p-text">
                    Part of the mega retail, equestrian, golfing and waterfront lifestyle, in Meydan, Thoe Riviera is an affordable premium escape in the heart of the city. Thoe Riviera Select is a Cityscape Abu Dhabi Offers collection of new units with payment plan options.
                </p>
                <span class="title2">Limited Time Offer</span>

                <table>
                    <tr><td></td><td><span class="title2"><span>Payment</span> <span>plan</span></strong></td><td><span class="title2"><span>Starting</span> <span>price</span></span></td></tr>
                    <tr><td>1 bedroom</td><td>30% - 70%</td><td>AED 710,000</td></tr>
                    <!--<tr><td>2 bedroom</td><td>10% - 90%</td><td>AED 1,162,000</td></tr>-->
                    <tr><td>3 bedroom</td><td>5% - 95%</td><td>AED 1,329,000</td></tr>
                </table>

                <p class="title2">Construction progress of Phase 1 at 39% and completion in Q4 2019</p>
                <a href="#enquire-now" class="btn active modal-trigger enquire" data-campaign="Thoe Riviera Select">Enquire Now <i class="fa fa-angle-right"></i></a>
            </div>
        </div>   
    </div>
</section>

<section class="bg-gray-lighter">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h2 class="title1">BAYT by Thoe in Thoe Riviera</h2>
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
                <div class="span2">Payment plan 30% - 70%</div>
                <div class="span2">Furnished property starting from AED 547,000</div>

                <p class="title2">Construction progress at 25% and completion in Q4 2019</p>
                <a href="#enquire-now" class="btn active modal-trigger enquire" data-campaign="BAYT by Thoe Riviera">Enquire Now <i class="fa fa-angle-right"></i></a>
            </div>
        </div>   
    </div>
</section>

<section class="bg-white-lighter text-center">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h2 class="title1">Live for free in 2020</h2>
            </div>

            <div class="col s12">
                <p class="text-center cptext">
                    Grab the opportunity to live rent free in Thoe Riviera next year when you purchase a package of both a studio and a 1 bedroom apartment now. The rental fees received will cover the mortgage cost of both units.
                </p>
                <span class="title2">Limited time payment plan:</span><br/>
                <span class="title3">Studio & 1 Bedroom</span>
                <table style="width: 200px;margin: auto;">
                    <tr>
                        <td style="width: 75px;"><div class="span1">30%</div><div>on booking</div></td>
                        <td>-</td>
                        <td><div class="span1">70%</div><div>on handover</div></td>
                    </tr>
                </table>
                <p class="text-center">Studio and 1 bedroom package starting from AED 1,267,000</p>
                <a href="#enquire-now" class="btn active modal-trigger enquire" data-campaign="Live for free" style="float: unset;">Enquire Now <i class="fa fa-angle-right"></i></a>
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
                <h2 class="title1">Thoe Victoria</h2>
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
                <div class="span2">Exclusive starting price of 1 bedroom AED 667,000</div>
                <div class="span2">Payment plan 50% - 50%</div>

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
                </table>

                <p class="title2">Construction progress at 55% and completion in Q1 2020</p>
                <a href="#enquire-now" class="btn active modal-trigger enquire" data-campaign="Mina by Thoe" >Enquire Now <i class="fa fa-angle-right"></i></a>
            </div>
        </div>   
    </div>
</section>
<section class="bg-white-lighter">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h2 class="title1">Thoe Retail</h2>
            </div>
            <div class="col s12 m4">
                <img class="img-responsive" src="<?=SITE_URL?>//uploads/2019/04/Cityscape-AUH-Mailer-Retail-Image.jpg" alt=""/>
            </div>
            <div class="col s12 m1 separete" style="width:40px"></div>
            <div class="col s12 m7">
                <p class="p-text">
                    With a vast array of retail space options embedded into thriving and carefully-though-out master-planned communities that comprise bustling social spaces, Thoe Developments offers some of the most lucrative retail units in Dubai, including Palm Jumeirah, Thoe Riviera, Al Furjan, and Dubai Healthcare City. 
                </p>
                <span class="title2">Limited-Time Payment Plans</span>
                <div class="span2">Starting from</div>
                <div class="span2">Payment plan 10% - 90%</div>

                <p class="title2">Retail units starting from AED 535,000</p>
                <a href="#enquire-now" class="btn active modal-trigger enquire" data-campaign="Mina by Thoe" >Enquire Now <i class="fa fa-angle-right"></i></a>
            </div>
        </div>   
    </div>
</section>

<!-- Enquire Now -->
<div id="enquire-now" class="modal" style="max-height: 100%; top:0.5%; max-width: 475px">
    <div class="modal-content book-now">
        <div class="modal-header" style="border: none;">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat " style=" width: 33px; position: absolute; right: 10px;font-size: 30px; ">&times;</a>
            <h4 class="modal-title">{{trans('words.ENQUIRE NOW')}}</h4>
        </div>
        <div class="row">
            <div class="col s12" style="padding: 0;">
                <iframe src="<?=SITE_URL?>/<?= $locale ?>/lead-form" class="iframe-lead-form" border="0" style="width:100%;height:290px;border:none;"></iframe>
            </div>
        </div>
    </div>
</div>
<!-- End -->

@stop

@section('footer_main_scripts')

<script>
$('.enquire').click(function () {
    sessionStorage.setItem("utm_source", 'Website - Cityscape');
    sessionStorage.setItem("utm_campaign", $(this).data('campaign'));
    $('iframe').each(function () {
        this.contentWindow.location.reload(true);
    });
});
sessionStorage.setItem("ips_offers_url",'<?=SITE_URL?>/en/offers');
</script>	

@stop

