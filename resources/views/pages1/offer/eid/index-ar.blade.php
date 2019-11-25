@extends('layouts/default')


@section('header_styles')
<!-- Time line css -->
<style>
    table,tr,td{ padding: 10px 0; margin:0;}    
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
    .title2{font-size: 16px!important;font-weight: bold;color: #444;text-align: left;}
    .title3{font-size: 16px!important;color: #666;text-align: left;}
    .span1{font-size: 35px; font-weight: 100; line-height: 30px; margin-bottom: 10px;}
    .span2{font-weight: 100;}
    .enquire{background: #444!important;float:left }
    /*    table tr td:nth-child(1){width: 80px; vertical-align: middle;}
        table tr td:nth-child(2){vertical-align: middle; text-align: left; width: 20px;}*/
    .modal .modal-content{padding: 10px;}
    .grecaptcha-badge{display: none!important;}
    nav {height: 56px!important;line-height: 56px!important;}
    .tag-pro{left: unset;right:0}
</style>

@stop

@section('main_div_wrapper')

@stop

@section('section_content')

<!-- Header -->

<section>
    <div class="parallax-container valign-wrapper only-heading" style="background-image:url('<?=SITE_URL?>/uploads/2019/05/Victoria-Ramadan-Hero-Images-1280x400.jpg');">
        <img alt="Cityscape - Thoe Developments" src="<?=SITE_URL?>/uploads/2019/05/Victoria-Ramadan-Hero-Images-1280x400.jpg" class="imgtag"/>
        <div class="col s12 center-align card tag-pro">
            <h1>رمضان عروضنا </h1>
        </div>
    </div>
</section>


<section class="bg-white-lighter">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h2 class="title1">عزيزي ترد الجميل</h2>
            </div>
            <div class="col s12 m2">
                <img class="img-responsive" style="width:150px" src="<?=SITE_URL?>/emailer/ramadan/Ramadan-offers-mailer-dollar.jpg">
            </div>
            <div class="col s12 m1 separete" style="width:40px"></div>
            <div class="col s12 m9">
                <ul style="padding-left: 15px;">
                     <li style="list-style: circle;">احصل على رسوم خدمة مجانية لمدة 3 سنوات</li>
                </ul>
                <span>أو</span>
                <ul style="padding-left: 15px;">
                    <li style="list-style: circle;">	احصلوا على سلفة عزيزي بقيمة تصل إلى 20 ألف درهم إماراتي عند شراء شقة استديو</li>
                    <li style="list-style: circle;">	احصلوا على سلفة عزيزي بقيمة تصل إلى 165 ألف درهم إماراتي عند شراء شقة بغرفة نوم واحدة</li>
                    <li style="list-style: circle;">	احصلوا على سلفة عزيزي بقيمة تصل إلى 245 ألف درهم عند شراء شقة بغرفتي نوم</li>
                </ul>
                <br>
                <a href="#enquire-now" class="btn active modal-trigger enquire" data-campaign="Thoe Gives Back">استفسر الآن <i class="fa fa-angle-right"></i></a>
            </div>
        </div>   
    </div>
</section>

<section class="bg-gray-lighter text-center">
    <div class="container">
        <div class="row">
            <div class="col s12 m1" style="width:40px"></div>
            <div class="col s12 m11">
                <table>
                    <tr valign="middle">
                        <td style="padding-left: 30px;width: 50%;text-align: left;"><span style="font-size:160px;font-family: tahoma;line-height: 0;">0</span></td>
                        <td style="padding: 0 0 0 0;text-align: right;">
                            <div class="span2" style="line-height: 1;"><span style="font-size:50px;font-family: tahoma;">%</span> <span style="font-family: tahoma;">دفعة أولى</span></div>
                            <div class="span2">&bullet;	خطط دفع شهرية على مدى 48 شهراً </div>
                            <div class="span2">&bullet;	0% فائدة للأشهر الستة الأولى</div>
                            <div class="span2">&bullet;	خدمات مجانية لمدة عام كامل</div><br>
                            <div class="span2">العرض يشمل جميع مشاريع الشركة</div><br/>
                        </td>
                    </tr>
                </table>
                <a href="#enquire-now" class="btn active modal-trigger enquire" data-campaign="0% Down Payment" >استفسر الآن <i class="fa fa-angle-right"></i></a>
            </div>
        </div>   
    </div>
</section>


<section class="bg-white-lighter">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h2 class="title1">عزيزي ريفييرا</h2>
            </div>
            <div class="col s12 m4">
                <img class="img-responsive" src="<?=SITE_URL?>/emailer/ramadan/Ramadan-offers-mailer_07.jpg">
            </div>
            <div class="col s12 m1 separete" style="width:40px"></div>
            <div class="col s12 m7">
                <div class="span2"><strong>استفيدوا من خطط الدفع الاستثنائية لوحدات المرحلة الأولى من مشروع "عزيزي ريفييرا"</strong></div><br>
                <div class="span2">وحدات الاستديو: 40 - 60 </div>
                <div class="span2">شقق بغرفة نوم واحدة: 30 - 70 </div>
                <div class="span2">شقق بغرفتي نوم: 30 - 70 </div>

                <a href="#enquire-now" class="btn active modal-trigger enquire" data-campaign="Thoe Riviera">استفسر الآن <i class="fa fa-angle-right"></i></a>
            </div>
        </div>   
    </div>
</section>

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

