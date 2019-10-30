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
    .p-text{margin-top: 0;text-align: right;font-size: 14px}
    .text-center{text-align: center}
    .img-responsive{width: 100%;}
    .title1{ margin: 0 0 20px;text-transform: unset!important;}
    .title2{font-size: 16px!important;font-weight: bold;color: #444;text-align: right;}
    .title3{font-size: 16px!important;color: #666;text-align: right;}
    .span1{font-size: 30px; font-weight: 100; line-height: 30px; margin-bottom: 10px;}
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
        <img alt="IPS - Azizi Developments" src="<?=SITE_URL?>/assets/images/ips/hero-image.jpg" class="imgtag"/>
        <div class="col s12 center-align card tag-pro">
            <h1>Cityscape Abu Dhabi</h1>
        </div>
    </div>
</section>


<section class="bg-gray-lighter">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h2 class="title1">
                    عزيزي ريفييرا سيلكت
                </h2>
            </div>
            <div class="col s12 m4">
                <img class="img-responsive" src="<?=SITE_URL?>/assets/images/ips/IPS-All-Offers-Emailer_Riviera.jpg">
            </div>
            <div class="col s12 m1 separete" style="width:40px"></div>
            <div class="col s12 m7">

                <p class="p-text">
                    يُعدّ مشروع "عزيزي ريفييرا سيلكت" جزءاً من مساحة كبيرة للبيع بالتجزئة، مع مرافق لممارسة رياضتي الفروسية والغولف، وإطلالة بحرية خلابة في قلب ميدان. يحظى المشروع بموقع استراتيجي متميز موفراً ملاذاً هادئاً في قلب المدينة وبأسعار معقولة. وخلال مشاركتها في "معرض العقارات الدولي 2019"، تقدم "عزيزي للتطوير العقاري" عرضاً حصرياً على مجموعة من الوحدات السكنية الجديدة ضمن المشروع مع خطط سداد ميسرة.
                </p>
                <span class="title2">
                    العرض (لفترة محدودة)
                </span>

                <table>
                    <tr>
                        <td></td>
                        <td>
                            <span class="title2">
                                <span>
                                    خطة السداد 
                                </span> 
                            </span>
                        </td>
                        <td>
                            <span class="title2">
                                <span>
                                    الأسعار ابتداءً من
                                </span> 
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            شقة بغرفة نوم واحدة
                        </td>
                        <td>30% - 70%</td>
                        <td>
                            710 ألف درهم إماراتي
                        </td>
                    </tr>
<!--                    <tr>
                        <td>
                            شقة بغرفتي نوم 
                        </td>
                        <td>10% - 90%</td>
                        <td>
                            1,162 ألف درهم إماراتي
                        </td>
                    </tr>-->
                    <tr>
                        <td>
                            شقة بثلاث غرفة نوم 
                        </td>
                        <td>5% - 95%</td>
                        <td>
                            1,329 ألف درهم إماراتي
                        </td>
                    </tr>
                </table>

                <p class="title2">
                    تم إنجاز 39% من المرحلة الأولى من المشروع، ومن المقرر استكمالها في الربع الأخير من عام 2019
                </p>
                <a href="#enquire-now" class="btn active modal-trigger enquire" data-campaign="Azizi Riviera Select"><?= trans('words.inquire_now') ?> <i class="fa fa-angle-right"></i></a>
            </div>
        </div>   
    </div>
</section>

<section class="bg-white-lighter">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h2 class="title1">
                    "بيت باي عزيزي" في "عزيزي ريفييرا"
                </h2>
            </div>
            <div class="col s12 m4">
                <img class="img-responsive" src="<?=SITE_URL?>/assets/images/ips/IPS-All-Offers-Emailer_BAYT.jpg">
            </div>
            <div class="col s12 m1 separete" style="width:40px"></div>
            <div class="col s12 m7">
                <p class="p-text">
                    يقدم مشروع "بيت باي عزيزي" في مدينة دبي الرياضية مفهوماً جديداً لتأجير المنازل على المدى القصير، ويضمن تحقيق عائدات أعلى للمستثمرين من خلال إدارة ودعم شققهم بالخدمات اللازمة. وبعد النجاح الذي حققه المشروع، سيتم استخدام مفهومه في مشروع "عزيزي ريفييرا".
                </p>
                <span class="title2">
                    العرض (لفترة محدودة)
                </span>
                <div class="span2">
                    خطة السداد: 30% - 70%
                </div>
                <div class="span2">
                    العقارات المفروشة بأسعار تبدأ من 547 ألف درهم إماراتي 
                </div>

                <p class="title2">
                    تم إنجاز 25% من المشروع، ومن المقرر استكماله في الربع الأخير من عام 2019
                </p>
                <a href="#enquire-now" class="btn active modal-trigger enquire" data-campaign="BAYT by Azizi Riviera"><?= trans('words.inquire_now') ?><i class="fa fa-angle-right"></i></a>
            </div>
        </div>   
    </div>
</section>

<section class="bg-gray-lighter text-center">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h2 class="title1">
                    ودع الإيجار في عام 2020
                </h2>
            </div>

            <div class="col s12">
                <p class="text-center cptext">
                    اغتنم الفرصة وأرح نفسك من أعباء الإيجار في العام المقبل بشرائك الآن حزمة تضم شقة استوديو وشقة بغرفة نوم واحدة في مشروع "عزيزي ريفييرا". وستغطي رسوم الإيجار المستلمة تكلفة الرهن العقاري لكلا النمطين من الوحدات. 
                </p>
                <span class="title2">
                    خطة السداد (لفترة محدودة)
                </span><br/>
                <span class="title3">
                    شقة استوديو وشقة بغرفة نوم واحدة 
                </span>
                
                <table style="width: 450px;margin: auto;">
                    <tr>
                        <td style="width: 450px;">
                            <div class="span1"> 30% عند الحجز، 70% عند الاستلام</div>                            
                        </td>
                    </tr>
                </table>
                <p class="text-center">
                    هذا العرض بسعر يبدأ من 1,267 ألف درهم إماراتي
                </p>
                <a href="#enquire-now" class="btn active modal-trigger enquire" data-campaign="Live for free" style="float: unset;"><?= trans('words.inquire_now') ?><i class="fa fa-angle-right"></i></a>
            </div>
        </div>   
    </div>
</section>


<section class="bg-white-lighter">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h2 class="title1">
                    مجتمع الفرجان
                </h2>
            </div>
            <div class="col s12 m4">
                <img class="img-responsive" src="<?=SITE_URL?>/assets/images/ips/IPS-All-Offers-Emailer_Al-Furjan.jpg">
            </div>
            <div class="col s12 m1 separete" style="width:40px"></div>
            <div class="col s12 m7">
                <p class="p-text">
                    هو مشروع في طور البناء يتمتع بشبكة اتصال ممتازة، ويقع على طريق موقع إكسبو 2020 دبي. يتضمن "مجتمع الفرجان" 5 وحدات منخفضة الارتفاع تتمتع بباقة واسعة من المحلات التجارية والمراكز الترفيهية في محيطها متيحةً للقاطنين الإحساس بنبض المدينة بعيداً عن صخب العيش فيها. 
                </p>
                <span class="title2">
                    خطة السداد (لفترة محدودة)
                </span>

                <table style="width: 300px">
                    <tr>
                        <td>
                            <div class="span1">10%</div>
                            <div>
                            عند الحجز،
                            </div>
                        </td>
                        <td>
                            <div class="span1">75%</div>
                            <div>
                                عند التسليم،
                            </div>
                        </td>
                        <td>
                            <div class="span1">15%</div>
                            <div>
                                لاحقاً
                            </div>
                        </td>
                    </tr>
                </table>

                <p class="title2">
                    شقة بغرفة نوم واحدة بسعر يبدأ من 787 ألف درهم إماراتي
                    <br/>
                    شقة بغرفتي نوم بسعر يبدأ من 1,086 ألف درهم إماراتي
                    <br/>
                    استكمال "فاريشتا عزيزي" و"عزيزي بلازا" في الربع الثاني من عام 2019
                    <br/>
                    استكمال "سامية عزيزي"، و"شايستا عزيزي"، و"عزيزي ستار" في الربع الأخير من عام 2019
                </p>
                <a href="#enquire-now" class="btn active modal-trigger enquire" data-campaign="Al Furjan"><?= trans('words.inquire_now') ?><i class="fa fa-angle-right"></i></a>
            </div>
        </div>   
    </div>
</section>

<section class="bg-gray-lighter">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h2 class="title1">
                    عزيزي فيكتوريا
                </h2>
            </div>
            <div class="col s12 m4">
                <img class="img-responsive" src="<?=SITE_URL?>/assets/images/ips/IPS-All-Offers-Emailer_Victoria.jpg">
            </div>
            <div class="col s12 m1 separete" style="width:40px"></div>
            <div class="col s12 m7">
                <p class="p-text">
                    يشكل مشروع "عزيزي فيكتوريا" مركزاً حيوياً نابضاً بالنشاط يتمحور حول توفير أسلوب عيش مجتمعي، ويوفر التوازن الأمثل بين أماكن الترفيه والعمل والمعيشة، متيحاً لزواره والمقيمين فيه نمط حياة عصري.
                </p>
                <span class="title2">
                    العرض (لفترة محدودة)
                </span>
                <div class="span2">
                    شقة بغرفة نوم واحدة بسعر حصري يبدأ من 667 ألف درهم إماراتي
                </div>
                <div class="span2">
                    خطط السداد 50% - 50%
                </div>

                <p class="title2">
                    اكتمال المرحلة الأولى من "عزيزي فيكتوريا" في الربع الأول من عام 2021
                </p>
                <a href="#enquire-now" class="btn active modal-trigger enquire" data-campaign="Azizi Victoria"><?= trans('words.inquire_now') ?> <i class="fa fa-angle-right"></i></a>
            </div>
        </div>   
    </div>
</section>

<section class="bg-white-lighter">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h2 class="title1">
                    عزيزي مينا
                </h2>
            </div>
            <div class="col s12 m4">
                <img class="img-responsive" src="<?=SITE_URL?>/assets/images/ips/IPS-All-Offers-Emailer_Mina.jpg">
            </div>
            <div class="col s12 m1 separete" style="width:40px"></div>
            <div class="col s12 m7">
                <p class="p-text">
                    يمتاز مشروع "عزيزي مينا" بموقعه المميز على الهلال الشرقي من نخلة جميرا، ويضم وحدات سكنية وتجارية فريدة، كما ينطوي على عدد من المرافق الفاخرة، وشاطئ خاص، وإطلالات ساحرة للشقق السكنية على البحر.
                </p>
                <span class="title2">
                    خطة السداد (لفترة محدودة)
                </span>
                <table style="width: 400px;">
                    <tr>
                        <td style="width: 400px;">
                            <div class="span1">
                                25% عند الحجز، 75% عند التسليم
                            </div>
                        </td>
                    </tr>
                </table>

                <p class="title2">
                    تم إنجاز 55% من المشروع ومن المقرر استكماله في الربع الأول من عام 2020
                </p>
                <a href="#enquire-now" class="btn active modal-trigger enquire" data-campaign="Mina by Azizi" ><?= trans('words.inquire_now') ?><i class="fa fa-angle-right"></i></a>
            </div>
        </div>   
    </div>
</section>

<!-- Enquire Now -->
<div id="enquire-now" class="modal" style="max-height: 100%; top:0.5%; max-width: 475px">
    <div class="modal-content book-now">
        <div class="modal-header" style="border: none;">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat " style=" width: 33px; position: absolute; left: 10px;font-size: 30px; ">&times;</a>
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

