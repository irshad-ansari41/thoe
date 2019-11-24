@extends('layouts/default')


@section('header_styles')
<!-- Time line css -->
<style>
    table,tr,td{ padding: 10px 0; margin:0;}  
    .cards{background-color:#0d1f36 !important; margin:0;}
    .cards h5{color:#fff; text-transform:unset; font-size: 18px!important; letter-spacing: 1px; line-height: 30px !important; }
    .sicon{width:90px;}
    .DPborder{border-right: 1px solid rgba(132, 132, 132, 0.4); border-radius: 1px;}
    .colspace{ margin: 25px 0 0 0;}
    .tag-pro{ background: rgba(18, 50, 81, .8)!important; }
    .row .col.s12{padding-bottom: 20px !important;}
    @media only screen and (min-width: 1024px){
        .bg-gray-lighter{background-color: #f8f8f8;padding: 50px 65px 40px 65px;font-size: 14px}
        .bg-white-lighter{background-color: #fff;padding: 50px 65px 50px 65px;font-size: 14px}
        .cptext{margin: 0 120px;font-size: 22px!important; line-height: 30px!important;}
    }
    @media only screen and (max-width: 1024px){
        .bg-gray-lighter{background-color: #f8f8f8;padding: 50px 0px 0px 0px;}
        .bg-white-lighter{background-color: #fff;padding: 50px 0 50px 0;}
        .separete{display: none;}
        .cptext{font-size: 22px!important; line-height: 30px!important;}
    }

    @media only screen and (min-width: 768px){
        .paraclass{ font-size:1.1rem !important; margin: 0px 50px 15px 0px;}
        .parallax-container {background-position: top center; background-size: cover; background-repeat: no-repeat; height: 425px !important;}
        .imgtag{display: none;}
        #stick-form{padding: 10px 10px!important;}
        .mobileds-1{display: none;}
        #stick-form{background:rgba(18, 50, 81, .8)!important;height: 345px;padding: 10px 0px;border:0 solid #dadada;position: absolute;right: 35px;top:35px}

    }
    @media only screen and (max-width: 768px){
        .paraclass{font-size:1.1rem !important; margin: 0px 0px 20px 0px;}
        .parallax-container{ background: none; height: 460px;}
        .imgtag{display: block; width: 100%;}
        .smtext{display: block;margin: 15px 0;}
        #stick-form{right:5px!important;}
        #stick-form{padding: 10px 10px!important;}
        .mobileds{display: none;}
        .mobileds-1 #stick-form{
            background: rgba(18, 50, 81, .8)!important;
            height: 345px;
            padding: 10px 0px;
            position: relative !important;
        }
        .colspace{margin: 15px 0;}
        .FooterAbout{padding-right: 0px !important;}
        .container{width: 100%;}
        .container .row{margin:0 auto !important;}

    }
    @media only screen and (max-width: 420px){
        #stick-form{right:0px!important;width: 100%;text-align: center;left:0px!important; }
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
    #stick-form{background:#0d1e35 !important;}
    table,tr, td{padding:95px 0;}
</style>

@stop

@section('main_div_wrapper')

@stop

@section('section_content')

<!-- Header -->

<section>
    <div class="parallax-container valign-wrapper only-heading" style="background-image:url('<?= SITE_URL ?>/emailer/berton-offers/Azizi-offer-slider-image-7.jpg');">
        <!--img  src="<?= SITE_URL ?>/emailer/uk-offers/Azizi-offer-slider-image-7-2.jpg" alt="Berton - Azizi Developments" class="imgtag"/-->
        <img srcset="<?= SITE_URL ?>/emailer/berton-offers/Azizi-offer-slider-image-7.jpg 320w,
             <?= SITE_URL ?>/emailer/berton-offers/Azizi-offer-slider-image-7.jpg 480w,
             <?= SITE_URL ?>/emailer/berton-offers/Azizi-offer-slider-image-7.jpg 768w,
             <?= SITE_URL ?>/emailer/berton-offers/Azizi-offer-slider-image-7.jpg 800w"
             sizes="(max-width: 320px) 300px,
             (max-width: 480px) 300px,
             (max-width: 768px) 500px,
             100vh"
             src="<?= SITE_URL ?>/emailer/berton-offers/Azizi-offer-slider-image-7.jpg" alt="Uk Offers - Azizi Developments" width="100%" height="100%" />

        <div id='stick-form' class="mobileds">
            <h5 class="info-color white-text text-center" style="text-transform: uppercase; font-size: 24px!important; text-align: center; margin: 10px;display: block;">
                <strong>ENQUIRE NOW</strong>
            </h5>
            <iframe src="https://azizidevelopments.com/<?= $locale ?>/lead-form" class="iframe-lead-form" border="0" style="width:320px;height:330px;border:none;" scrolling="No"></iframe>                            
        </div>

        <div class="col s12 center-align card tag-pro">
            <h1 style="text-align:center;">Now launching</h1>
            <h1 style="text-align:center; font-weight: 200;">
                Berton by Azizi <br>
                Starting AED 457K <br/>
                Up to 4% Value Back
            </h1>
        </div>

    </div>
</section>


<!--Form Start-->
<section class="bg-white-lighter" style="padding:0px 0 0px 0;">
    <div class="container" style="width:100%;">
        <div class="row">

            <div class="col s12 m12 pro-holder center-align Completed mobileds-1">
                <h1 class="span2"><b></b></h1>
                <h6 style="padding-bottom:20px;color:#fff;font-size: 18px !important;padding: 20px;">Now launching: Berton by Azizi! The next generation of strategic urban connectivity is brought to life.</h6>
                <!--img alt="Berton By Azizi" src="<?= SITE_URL ?>/emailer/offers-week/img/limited-time-offers.png" data-src="<?= SITE_URL ?>/emailer/offers-week/img/limited-time-offers.png" class="responsive-img pro-image"-->
                
            </div>

            <div id='stick-form' class="mobileds-1">
                <h5 class="info-color white-text text-center" style="text-transform: uppercase; font-size: 24px!important; text-align: center; margin: 10px;display: block;">
                    <strong>ENQUIRE NOW</strong>
                </h5>
                <iframe src="https://azizidevelopments.com/<?= $locale ?>/lead-form" class="iframe-lead-form" border="0" style="" scrolling="No"></iframe>                            
            </div>
        </div> 
        <!--row One end-->
    </div>
</section>
<!--Form End-->

<!--New Offers 1 Start here-->
<section class="bg-white-lighter">
    <div class="container">
        <div class="row">
            <div class="col s12 m12 pro-holder center-align Completed mobileds">
                <!--h1 class="span2"><b></b></h1-->
                <h6 style="padding-bottom:20px;">Now launching: Berton by Azizi! The next generation of strategic urban connectivity is brought to life.</h6>
                <!--img alt="Berton By Azizi" src="<?= SITE_URL ?>/emailer/offers-week/img/limited-time-offers.jpg" data-src="<?= SITE_URL ?>/emailer/offers-week/img/limited-time-offers.jpg" class="responsive-img pro-image"-->
            </div>

            <div class="col s12 m4 pro-holder center-align Completed">

                <div class="card col s12 p0 cards">
                    <img alt="Berton By Azizi" src="<?= SITE_URL ?>/emailer/berton-offers/Berton-Carousel-camp-1.jpg" data-src="<?= SITE_URL ?>/emailer/berton-offers/Berton-Carousel-camp-1.jpg" class="responsive-img pro-image">
                    <div class="col s12 title-holder">
                        <h5>Starting From AED 457K</h5>                       
                    </div>
                </div>
            </div>

            <div class="col s12 m4 pro-holder center-align Completed">

                <div class="card col s12 p0 cards">
                    <img alt="Azizi Mina" src="<?= SITE_URL ?>/emailer/berton-offers/Berton-Carousel-camp-2.jpg" data-src="<?= SITE_URL ?>/emailer/berton-offers/Berton-Carousel-camp-2.jpg" class="responsive-img pro-image">
                    <div class="col s12 title-holder">
                        <h5>Studio / 1 / 2-bedrooms</h5>                       
                    </div>
                </div>
            </div>
            <div class="col s12 m4 pro-holder center-align Completed">

                <div class="card col s12 p0 cards">
                    <img alt="Berton By Azizi" src="<?= SITE_URL ?>/emailer/berton-offers/Berton-Carousel-camp-3.jpg" data-src="<?= SITE_URL ?>/emailer/berton-offers/Berton-Carousel-camp-3.jpg" class="responsive-img pro-image">
                    <div class="col s12 title-holder">
                        <h5>From JBR / D.Marina</h5>                       
                    </div>
                </div>
            </div>

            <div class="col s12 m4 pro-holder center-align Completed">

                <div class="card col s12 p0 cards">
                    <img alt="Azizi Mina" src="<?= SITE_URL ?>/emailer/berton-offers/Berton-Carousel-camp-4.jpg" data-src="<?= SITE_URL ?>/emailer/berton-offers/Berton-Carousel-camp-4.jpg" class="responsive-img pro-image">
                    <div class="col s12 title-holder">
                        <h5>Artistry </h5>                       
                    </div>
                </div>
            </div>
            <div class="col s12 m4 pro-holder center-align Completed">

                <div class="card col s12 p0 cards">
                    <img alt="Berton By Azizi" src="<?= SITE_URL ?>/emailer/berton-offers/Berton-Carousel-camp-5.jpg" data-src="<?= SITE_URL ?>/emailer/berton-offers/Berton-Carousel-camp-5.jpg" class="responsive-img pro-image">
                    <div class="col s12 title-holder">
                        <h5>Craftsmanship</h5>                       
                    </div>
                </div>
            </div>

            <div class="col s12 m4 pro-holder center-align Completed">

                <div class="card col s12 p0 cards">
                    <img alt="Berton By Azizi" src="<?= SITE_URL ?>/emailer/berton-offers/Berton-Carousel-camp-6.jpg" data-src="<?= SITE_URL ?>/emailer/berton-offers/Berton-Carousel-camp-6.jpg" class="responsive-img pro-image">
                    <div class="col s12 title-holder">
                        <h5>Buy your home now</h5>                       
                    </div>
                </div>
            </div>


        </div> 
        <!--row One end-->

    </div>
</section>
<!--New Offers 1-->


<!--offer 2-->
<!--section class="bg-gray-lighter">
    <div class="container">
        <div class="row">
<!--div class="col s12 m12 pro-holder center-align Completed">
    <h1 class="span2"><b>Unmissable limited-time offers</b></h1>

</div->

<div class="col s12 m3 pro-holder center-align Completed">

    <div class="card col s12 p0">
        <img alt="Candace Acacia" src="<?= SITE_URL ?>/emailer/eid-offers/eid-offers-1.jpg" data-src="<?= SITE_URL ?>/emailer/eid-offers/eid-offers-1.jpg" class="responsive-img pro-image">
        <div class="col s12 title-holder">
            <h5 style="text-transform:unset;font-size: 14px!important;letter-spacing: 1px;">Flexible payment plan </h5>                       
        </div>
    </div>

</div>

<div class="col s12 m3 pro-holder center-align Completed">

    <div class="card col s12 p0">
        <img alt="Candace Acacia" src="<?= SITE_URL ?>/emailer/eid-offers/eid-offers-2.jpg" data-src="<?= SITE_URL ?>/emailer/eid-offers/eid-offers-2.jpg" class="responsive-img pro-image">
        <div class="col s12 title-holder">
            <h5 style="text-transform:unset;font-size: 13.5px!important;letter-spacing: 1px;"> Up to 22% value back </h5>                       
        </div>
    </div>

</div>

<div class="col s12 m3 pro-holder center-align Completed">

    <div class="card col s12 p0">
        <img alt="Candace Acacia" src="<?= SITE_URL ?>/emailer/uk-offers/offers-1.jpg" data-src="<?= SITE_URL ?>/emailer/uk-offers/offers-1.jpg" class="responsive-img pro-image">
        <div class="col s12 title-holder">
            <h5 style="text-transform:unset;font-size: 14px!important;letter-spacing: 1px;"> On off-plan and ready apartments </h5>                       
        </div>
    </div>

</div>

<div class="col s12 m3 pro-holder center-align Completed">

    <div class="card col s12 p0">
        <img alt="Candace Acacia" src="<?= SITE_URL ?>/emailer/eid-offers/eid-offers-3.jpg" data-src="<?= SITE_URL ?>/emailer/eid-offers/eid-offers-3.jpg" class="responsive-img pro-image">
        <div class="col s12 title-holder">
            <h5 style="text-transform:unset;font-size: 14px!important;letter-spacing: 1px;"> Prices starting from GBP 107k* </h5>                       
        </div>
    </div>

</div>

</div>  
</div>
</section-->
<!--offers2 end-->

@stop

@section('footer_main_scripts')

<script>

    var url = new URL('<?= Request::fullurl() ?>');
    var source = url.searchParams.get("utm_source");
    var campaign = url.searchParams.get("utm_campaign");

    if (source !== '' && source !== null) {
        sessionStorage.setItem("utm_source", capitalize(source.replace("-", " ")));
    } else {
        sessionStorage.setItem("utm_source", 'Website');
    }
    if (campaign !== '' && campaign !== null) {
        sessionStorage.setItem("utm_campaign", capitalize(campaign.replace("-", " ")));
    } else {
        sessionStorage.setItem("utm_campaign", 'Now launching Berton by Azizi');
    }

    sessionStorage.setItem("ips_offers_url", '<?= SITE_URL ?>/en/berton-offers');
</script>             

@stop