@extends('layouts/default')


@section('header_styles')
<!-- Time line css -->
<style>
    table,tr,td{ padding: 10px 0; margin:0;}   
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

    }
    @media only screen and (max-width: 768px){
        .paraclass{font-size:1.1rem !important; margin: 0px 0px 20px 0px;}
        .parallax-container{ background: none; height: 460px !important;}
        .imgtag{display: block; width: 100%;}
        .smtext{display: block;margin: 15px 0;}
        #stick-form{right:5px!important;}
        #stick-form{padding: 10px 10px!important;}
        .FooterAbout{padding-right: 0px !important;}

    }
    @media only screen and (max-width: 420px){
        #stick-form{right:0px!important;width: 100%;text-align: center;left:0px!important;}
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
    #stick-form{background:rgba(18, 50, 81, .8)!important;height: 345px;padding: 10px 0px;border:0 solid #dadada;position: absolute;right: 35px;top:35px}
    table,tr, td{padding:95px 0;}
</style>

@stop

@section('main_div_wrapper')

@stop

@section('section_content')

<!-- Header -->

<section>
    <div class="parallax-container valign-wrapper only-heading" style="background-image:url('<?= SITE_URL ?>/uploads/2019/06/Offer-page-Slidder-2.jpg');">
        <img alt="Cityscape - Azizi Developments" src="<?= SITE_URL ?>/uploads/2019/06/Offer-page-Slidder-2.jpg" class="imgtag"/>
        <div class="col s12 center-align card tag-pro">
            <h1>Summer Offers</h1>
        </div>
        <div id='stick-form' class="mobileds">
            <h5 class="info-color white-text text-center" style="text-transform: uppercase; font-size: 24px!important; text-align: center; margin: 10px;display: block;">
                <strong>ENQUIRE NOW</strong>
            </h5>
            <iframe src="https://azizidevelopments.com/<?= $locale ?>/lead-form" class="iframe-lead-form" border="0" style="width:320px;height:330px;border:none;" scrolling="No"></iframe>                            
        </div>

    </div>
</section>


<!--section class="bg-white-lighter">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h2 class="title1">Azizi Gives Back</h2>
            </div>
            <div class="col s12 m2">
                <img class="img-responsive" style="width:150px" src="<?= SITE_URL ?>/emailer/ramadan/Ramadan-offers-mailer-dollar.jpg">
            </div>
            <div class="col s12 m1 separete" style="width:40px"></div>
            <div class="col s12 m9">
                <ul style="padding-left: 15px;">
                    <li style="list-style: circle;">Get 3 years free service charge</li>
                </ul>
                <span>OR</span>
                <ul style="padding-left: 15px;">
                   <li style="list-style: circle;"> Up to <b>AED 20,000</b> of Azizi Credit when purchasing a <b>studio</b></li>
                    <li style="list-style: circle;"> Up to <b>AED 165,000</b> of Azizi Credit when purchasing a <b>1-bedroom unit</b></li>
                    <li style="list-style: circle;"> Up to <b>AED 245,000</b> of Azizi Credit when purchasing a <b>2-bedroom unit</b></li>
                </ul>
                <br>
                <a href="#enquire-now" class="btn active modal-trigger enquire" data-campaign="Azizi Riviera Select">Enquire Now <i class="fa fa-angle-right"></i></a>
            </div>
        </div>  
    </div>
</section-->


<!--section class="bg-gray-lighter text-center">
    <div class="container">
        <div class="row">
            <div class="col s12 m1" style="width:40px"></div>
            <div class="col s12 m11">
                <table>
                    <tr valign="middle">
                        <td style="padding-right: 30px;width: 30%;text-align: right;"><span style="font-size:48px;font-family: tahoma; position: relative;top: -145px;"> Up to </span> <span style="font-size:250px;font-family: tahoma;line-height: 0;">5</span></td>
                        <td style="padding: 0 0 0 0;">
                            <div class="span2" style="line-height: 0;"><span style="font-size:48px;font-family: tahoma; position: relative;top: -35px;">years free service charge</span> <span style="font-family: tahoma;"></span></div>
                            <div class="span2"> &bullet; <b>Unmissable limited-time offers </b> </div>
                            <div class="span2"> &bullet; <b>Pay 1% booking fee</b> </div>
                            <div class="span2"> &bullet; <b>On off-plan and ready apartments</b> </div>
                            <div class="span2"> &bullet; <b>Prices starting from AED 546k*</b> </div>
                            <br/>
                            <a href="#enquire-now" class="btn active modal-trigger enquire" data-campaign="Eid Offers" >Enquire Now <i class="fa fa-angle-right"></i></a>
                        </td>
                    </tr>
                </table>
 
            </div>
        </div>  
    </div>
</section-->

<!--New Offers 1 Start here-->
<section class="bg-white-lighter">
    <div class="container">
        <div class="row">
            <div class="col s12 m12 pro-holder center-align Completed">
                <h1 class="span2"><b>Summer surprises – too hot to handle!</b></h1>
                <h6 style="padding-bottom:20px;">Convert your down payment into monthly instalments.</h6>
            </div>

            <div class="col s12 m3 pro-holder center-align Completed">

                <div class="card col s12 p0">
                    <img alt="Candace Acacia" src="<?= SITE_URL ?>/emailer/summer-offers/summer-offer-carousel-1.jpg" data-src="<?= SITE_URL ?>/emailer/summer-offers/summer-offer-carousel-1.jpg" class="responsive-img pro-image">
                    <div class="col s12 title-holder">
                        <h5 style="text-transform:unset;font-size: 14px!important;letter-spacing: 1px;">Convert your down payment Into monthly instalments</h5>                       
                    </div>
                </div>

            </div>
            
            <div class="col s12 m3 pro-holder center-align Completed">

                <div class="card col s12 p0">
                    <img alt="Candace Acacia" src="<?= SITE_URL ?>/emailer/summer-offers/Summer-Offer-Carousel-02.jpg" data-src="<?= SITE_URL ?>/emailer/summer-offers/Summer-Offer-Carousel-02.jpg" class="responsive-img pro-image">
                    <div class="col s12 title-holder">
                        <h5 style="text-transform:unset;font-size: 13.5px!important;letter-spacing: 1px;"> Year 1-4: AED 4,659 <br> Year 5: AED 1,838 </h5>                       
                    </div>
                </div>

            </div>

            <div class="col s12 m3 pro-holder center-align Completed">

                <div class="card col s12 p0">
                    <img alt="Candace Acacia" src="<?= SITE_URL ?>/emailer/summer-offers/Summer-Offer-Carousel-03.jpg" data-src="<?= SITE_URL ?>/emailer/summer-offers/Summer-Offer-Carousel-03.jpg" class="responsive-img pro-image">
                    <div class="col s12 title-holder">
                        <h5 style="text-transform:unset;font-size: 14px!important;letter-spacing: 1px;">Year 1-4: AED 6,395 <br/> Year 5: AED 3,252</h5>                       
                    </div>
                </div>

            </div>

            <div class="col s12 m3 pro-holder center-align Completed">

                <div class="card col s12 p0">
                    <img alt="Candace Acacia" src="<?= SITE_URL ?>/emailer/summer-offers/Summer-Offer-Carousel-05.jpg" data-src="<?= SITE_URL ?>/emailer/summer-offers/Summer-Offer-Carousel-05.jpg" class="responsive-img pro-image">
                    <div class="col s12 title-holder">
                        <h5 style="text-transform:unset;font-size: 14px!important;letter-spacing: 1px;">Year 1-4: AED 10,401 <br/> Year 5: AED 4,103 </h5>                       
                    </div>
                </div>

            </div>

        </div> 
        <!--row One end-->
        
    </div>
</section>
<!--New Offers 1-->


<!--offer 2-->
<section class="bg-gray-lighter">
    <div class="container">
        <div class="row">
            <div class="col s12 m12 pro-holder center-align Completed">
                <h1 class="span2"><b>Unmissable limited-time offers</b></h1>

            </div>

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
                    <img alt="Candace Acacia" src="<?= SITE_URL ?>/emailer/eid-offers/eid-offers-4.jpg" data-src="<?= SITE_URL ?>/emailer/eid-offers/eid-offers-4.jpg" class="responsive-img pro-image">
                    <div class="col s12 title-holder">
                        <h5 style="text-transform:unset;font-size: 14px!important;letter-spacing: 1px;"> On off-plan and ready apartments </h5>                       
                    </div>
                </div>

            </div>

            <div class="col s12 m3 pro-holder center-align Completed">

                <div class="card col s12 p0">
                    <img alt="Candace Acacia" src="<?= SITE_URL ?>/emailer/eid-offers/eid-offers-3.jpg" data-src="<?= SITE_URL ?>/emailer/eid-offers/eid-offers-3.jpg" class="responsive-img pro-image">
                    <div class="col s12 title-holder">
                        <h5 style="text-transform:unset;font-size: 14px!important;letter-spacing: 1px;"> Prices starting from AED 490k* </h5>                       
                    </div>
                </div>

            </div>

        </div>  
    </div>
</section>
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
        sessionStorage.setItem("utm_campaign", 'Summer Offers');
    }

    sessionStorage.setItem("ips_offers_url", '<?= SITE_URL ?>/en/offers');
</script>             

@stop