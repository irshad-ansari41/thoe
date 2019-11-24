@extends('layouts/default')


@section('header_styles')
<!-- Time line css -->
<style>
    table,tr,td{ line-height: 0 !important; padding: 10px 0; margin:0; direction: rtl;}    



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

    @media only screen and (min-width: 1024px){
        .bg-gray-lighter{background-color: #f8f8f8;padding: 50px 65px 50px 65px;font-size: 14px}
        .bg-white-lighter{background-color: #fff;padding: 30px 65px 30px 65px;font-size: 14px}
        .cptext{margin: 0 120px;font-size: 22px!important; line-height: 30px!important;}
    }
    @media only screen and (max-width: 1024px){
        .bg-gray-lighter{background-color: #f8f8f8;padding: 50px 0 50px 0;}
        .bg-white-lighter{background-color: #fff;padding: 30px 0 30px 0;}
        .separete{display: none;}
        .cptext{font-size: 22px!important; line-height: 30px!important;}

    }
    @media screen and (min-width: 768px){
        .enq-now{display: none;}
        .az-btns{ display: none;}
        #cons-img{width:200px;margin-top:15px;}
        .imgtag{display: none;}
    }
    @media screen and (max-width: 768px){
        .mobileds{display: none;}
        .enq-now{display: none;}
        nav .brand-logo.left img{padding-top: 11px !important;}
        nav a.button-collapse i{line-height: 50px !important; height: 56px;}
        nav a.button-collapse{height: 56px;}
        #hero-image .container{width:100%}
        #cons-img{width:100px;margin-top:15px;}
        .imgtag{display: block; width: 100%;}
        .smtext{display: block;margin: 15px 0;}
    }
    @media screen and (max-width: 480px){
        #hero-image .container{width:100%}
        #video-section .container{width:100%}
    }

    #stick-form{background:rgba(21, 88, 149, 0.8) !important;height: 330px;padding: 10px 0px;border:2px solid #dadada;position: absolute;right: 35px;top:35px}
    .modal{background-color: #fff;}
    .videoWrapper {
        position: relative;
        padding-bottom: 56.25%; /* 16:9 */
        padding-top: 25px;
        height: 0;
    }
    .videoWrapper iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
    .tag-pro{left:15px;bottom:15px;}
    #stick-form{right: 121px; top: 77px;display: none}
</style>

@stop

@section('main_div_wrapper')

@stop

@section('section_content')

<!-- Header -->

<section id="hero-image">
    <div class="container">
        <div class="row m0">
            <div class="col s12 p0" style="position: relative;">
                <img alt="" src="<?=SITE_URL?>/uploads/2019/04/construction-year.jpg" style="width: 100%;">
                <a href="#enquire-now" class="modal-trigger" style=" background: #155895; color: #fff; padding: 5px 10px; position: absolute; right: 1px; top: 200px; ">
                    استفسر الآن

                </a>
                <!--                <div class="center-align card tag-pro only-heading">
                                    <h1>2019,Year of Construction</h1>
                                </div>-->
                <div id='stick-form' class="mobileds">
                    <iframe src="<?=SITE_URL?>/<?= $locale ?>/lead-form" border="0" style="width:349px;height:360px;border:none;" scrolling="No"></iframe>                             
                </div>
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


<section class="">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <!--<h1>2019, Year of Construction</h1>-->
                <div style="text-align:center">
                    <img id="cons-img" src="<?=SITE_URL?>/uploads/2019/04/Azizi-Construction-Logo.png" style="">
                </div>
                <p>
                    تتبع شركة عزيزي للتطوير العقاري نهجًا يعتمد على البناء، كما ننطلق من التزامنا الذي نركز من خلاله على تطوير المشاريع عالية الجودة وإنجازها في الأوقات المحددة. وفي العام الجاري 2019 الذي أطلقنا عليه "عام البناء"، فإننا نبذل كافة الجهود الممكنة لضمان سير عمليات البناء بسرعة، والعمل على إنجاز المشاريع التي أطلقناها. ويمكننا تحقيق ذلك عن طريق إختيار مقاولينا بدقة، ومن ثم العمل معهم بشكل وثيق، للتأكد من إنجاز كافة الأعمال وفق الجدول الزمني المعلن عنه مسبقًا، إضافة إلى توقع مواعيد واقعية للإنجاز والإعلان عنها. إننا نضع الوفاء بوعودنا لعملائنا على قمة أولوياتنا، ليكون العام 2019 عام التقدم السريع في البناء، وتسليم المشاريع في المواعيد المحددة لها.
                </p>
            </div>
        </div>
    </div>
</section>

<section id="video-section">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <div class="videoWrapper">
                    <!-- Copy & Pasted from YouTube -->
                    <iframe width="560" height="349" src="https://www.youtube.com/embed/1qIaPS7Of7E?rel=0&hd=1" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>   
    </div>
</section>
<br/>


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

