<!DOCTYPE>
<html lang="ar">
    <head>
        <META HTTP-EQUIV='Content-Type' CONTENT='text/html; charset=UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>Quick Survey</title>
        <link href='//fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
        <link rel="shortcut icon" href="<?=SITE_URL?>/assets/favicon/apple-icon-57x57.png">
        <link rel="stylesheet prefetch" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link href="<?=SITE_URL?>/assets/css/selectstyle.css" rel="stylesheet" type="text/css"/>
        <style>
            @import "//fonts.googleapis.com/css?family=Roboto:400,300,600,400italic";
            body{direction: rtl;}
            *{margin:0;padding:0;box-sizing:border-box;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;-webkit-font-smoothing:antialiased;-moz-font-smoothing:antialiased;-o-font-smoothing:antialiased;font-smoothing:antialiased;text-rendering:optimizeLegibility}
            body{font-family:'PT Sans',sans-serif;font-weight:100;font-size:14px;line-height:30px;color:#777;background:#1B619A}
            p{line-height:25px}
            a{color:#777;text-decoration:none}
            input[type='radio']{height: 0px; width: 0px; margin-right: 15px !important;-webkit-appearance: inherit;border-color: #f9f9f9!important;}
            .container{max-width:1000px;width:100%;margin:0 auto;position:relative;background:#fff}
            .frm-container1{width:50%;position:relative;float:left;border-right:2px solid #ccc}
            .frm-container2{width:50%;position:relative;float:left;border-right:2px solid #ccc}
            .contact-form input[type="text"],.contact-form input[type="email"],.contact-form input[type="tel"],.contact-form input[type="url"],.contact-form textarea,.contact-form button[type="submit"]{}
            .contact-form{background:#F9F9F9;padding:0 25px;margin:0}
            .contact-form h3{display:block;font-size:20px;font-weight:300;margin-bottom:10px}
            .contact-form h4{margin:5px 0 15px;display:block;font-size:13px;font-weight:400}
            fieldset{border:medium none!important;margin:0 0 10px;min-width:100%;padding:0;width:100%}
            .contact-form input[type="text"],.contact-form input[type="email"],.contact-form input[type="tel"],.contact-form input[type="url"],.contact-form textarea{width:100%;border:1px solid #ccc;background:#FFF;margin:0 0 0px;padding:10px}
            .contact-form input[type="text"]:hover,.contact-form input[type="email"]:hover,.contact-form input[type="tel"]:hover,.contact-form input[type="url"]:hover,.contact-form textarea:hover{-webkit-transition:border-color .3s ease-in-out;-moz-transition:border-color .3s ease-in-out;transition:border-color .3s ease-in-out;border:1px solid #aaa}
            .contact-form textarea{height:150px;max-width:100%;resize:none}
            .contact-form button[type="submit"]{cursor:pointer;width:100%;border:none;background:#1B619A;color:#FFF;margin:0 0 5px;padding:6px;font-size:15px}
            .contact-form button[type="submit"]:hover{background:#43A047;-webkit-transition:background .3s ease-in-out;-moz-transition:background .3s ease-in-out;transition:background-color .3s ease-in-out}
            .contact-form button[type="submit"]:active{box-shadow:inset 0 1px 3px rgba(0,0,0,0.5)}
            .contact-form button[type="button"]{cursor:pointer;width:100%;border:none;background:rgba(99,99,99,0.5);color:#FFF;margin:0 0 5px;padding:0 10px;font-size:15px}
            .contact-form button[type="button"]:hover{background:#ef9027;-webkit-transition:background .3s ease-in-out;-moz-transition:background .3s ease-in-out;transition:background-color .3s ease-in-out}
            .copyright{text-align:center}
            .contact-form input:focus,.contact-form textarea:focus{outline:0;border:1px solid #aaa}
            ::-webkit-input-placeholder{color:#555}
            :-moz-placeholder{color:#555}
            ::-moz-placeholder{color:#555}
            :-ms-input-placeholder{color:#555}
            .nopadding{padding:0}
            hr { margin-top: 10px; margin-bottom: 10px; border: 0; border-top: 1px solid #eee; }
            @media only screen and (max-width: 640px) {
                .radio-inline+.radio-inline, .checkbox-inline+.checkbox-inline{margin-left: 0;}
                .radio-inline, .checkbox-inline{margin-bottom: 15px;}
            }
            @media only screen and (min-width: 640px) {
                /*                .radio-inline, .checkbox-inline{text-align: center;}*/
            }
            /*input[type='radio']{visibility: hidden}*/
            .emoji{border-radius: 50%; width: 50px;margin-left: 10px; }
            .Excellent{background: #8ec640;color:#fff}
            .Good{background: #f3ce10;color:#fff}
            .Neutral{background: #f79520;color:#000}
            .Poor{background: #f1592c;color:#fff}
            .Very-Poor{background: #ec1f27;color:#fff}
            .active{padding: 5px 0;}
            .col-xs-1, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9, .col-xs-10, .col-xs-11, .col-xs-12,.progress-bar{float: right!important}
            .lang{ float: left; margin-left: 20px; margin-top: 14px; }
            select option:first-child{color: #888;}
            .form-control{color:#888}
            .ss_ul li{text-align: right}
        </style>

    </head>
    <body><br/>
        <?php
        $get = filter_input_array(INPUT_GET);
        $arscale = ['5' => 'ممتاز', '4' => 'جيّد', '3' => 'محايد', '2' => 'ضعيف', '1' => 'ضعيف جداً'];
        $scale = ['5' => 'Excellent', '4' => 'Good', '3' => 'Neutral', '2' => 'Poor', '1' => 'Very Poor'];
        $color = ['5' => '#8ec640', '4' => '#f3ce10', '3' => '#f79520', '2' => '#f1592c', '1' => '#ec1f27'];
        $source = ['1' => 'Online', '2' => 'Radio', '3' => 'Print', '4' => 'Outdoor', '5' => 'Social Media', '6' => 'Friend/Referral'];
        $arsource = ['1' => 'عبر الإنترنت', '2' => 'راديو', '3' => 'مطبوعات', '4' => 'إعلانات خارجية', '5' => 'وسائل التواصل الاجتماعي', '6' => 'أصدقاء\ توصية'];
        ?>
        <div class="container">  
            <div class="row" >
                <div class="col-lg-12">
                    <div style="position: fixed; height: 90px; width: 100%; background: #fff; top: 0; z-index: 9999; max-width: 1000px; margin-right: -15px;border-bottom: 1px solid #ddd;">
                        <a href="<?=SITE_URL?>/ar/quick-survey-lp">
                            <img alt="logo" src="//thoe.com/assets/images/logo-retina-light1.png" style="width: 150px;margin-top:10px;margin-left:10px;"></a>
                        <a class="lang" href="<?=SITE_URL?>/en/quick-survey">English</a>
                        <div class="progress" style="margin-left:15px;margin-right:15px;margin-top:5px;">
                            <div id="que1" class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="1" style="width:0%">

                            </div>
                            <div id="que2" class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="1" style="width:0%">

                            </div>
                            <div id="que3" class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="1" style="width:0%">

                            </div>
                            <div id="que4" class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="1" style="width:0%">

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">  

            <form id="clientForm" action="{{route('quick-survey.store')}}" method="post" class="contact-form" style="margin-top: 40px;min-height: 800px;">
                <br/>
                @if(!empty($get['status']) && $get['status']=='success')
                <div class="alert alert-success" style="margin-top: 40px;text-align: center;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <h3 style=" margin-top: 0;font-weight: 700 ">شكراً على مشاركتنا رأيك.</h3>
                    <strong>تم ارسال بياناتك بنجاح !</strong>
                    <div id="msg"></div>
                </div>
                @endif

                @if(!empty($get['status']) && $get['status']=='failed')
                <div class="alert alert-danger"  style="margin-top: 40px;text-align: center;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Warning!</strong> Please select answer before submit.
                </div>
                @endif

                @if(empty($get['status']))
                <h3 style=" margin-top: 0;font-weight: 700 ">استبيان رضا العملاء</h2>

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="row" dir="rtl">
                        <div class="col-sm-3 col-xs-12">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="الاسم الكامل" required="required">
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-12">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="البريد الإلكتروني" required="required">
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-12">
                            <div class="form-group">
                                <input type="number" name="phone" class="form-control" placeholder="رقم الهاتف" required="required" min="0" maxlength="15">
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-12">
                            <div class="form-group">
                                <select name="nationality" id="nationality" class="form-control" required="required" data-placeholder="الجنسية" data-search="true">
                                    <div class="section result" style="margin-top:80px;">
                                        <option value="أذربيجان">أذربيجان</option><option value="أرمينيا">أرمينيا</option><option value="أوروبا">أوروبا</option><option value="أريتريا">أريتريا</option><option value="أسبانيا">أسبانيا</option><option value="أستراليا">أستراليا</option><option value="أفغانستان">أفغانستان</option><option value="ألبانيا">ألبانيا</option><option value="ألمانيا">ألمانيا</option><option value="أنتاركتيكا">أنتاركتيكا</option><option value="أنتيغوا وبربودا">أنتيغوا وبربودا</option><option value="أنجويلا">أنجويلا</option><option value="أندورا">أندورا</option><option value="أنغولا">أنغولا</option><option value="أورغواي">أورغواي</option><option value="أوزباكستان">أوزباكستان</option><option value="أوغندا">أوغندا</option><option value="أوكرانيا">أوكرانيا</option><option value="أيرلندا">أيرلندا</option><option value="أيسلندا">أيسلندا</option><option value="إثيوبيا">إثيوبيا</option><option value="إستونيا">إستونيا</option><option value="إقليم المحيط الهندي البريطاني">إقليم المحيط الهندي البريطاني</option><option value="إندونيسيا">إندونيسيا</option><option value="إيران">إيران</option><option value="إيطاليا">إيطاليا</option><option value="الأرجنتين">الأرجنتين</option><option value="الأردن">الأردن</option><option value="الأقاليم الجنوبية الفرنسية">الأقاليم الجنوبية الفرنسية</option><option value="الإكوادور">الإكوادور</option><option value="الإمارات العربية المتحدة">الإمارات العربية المتحدة</option><option value="البحرين">البحرين</option><option value="البرازيل">البرازيل</option><option value="البرتغال">البرتغال</option><option value="البوسنة والهرسك">البوسنة والهرسك</option><option value="الجابون">الجابون</option><option value="الجبل الأسود">الجبل الأسود</option><option value="الجزائر">الجزائر</option><option value="الدنمارك">الدنمارك</option><option value="السلفادور">السلفادور</option><option value="السنغال">السنغال</option><option value="السودان">السودان</option><option value="السويد">السويد</option><option value="الصحراء ">الصحراء </option><option value="الصومال">الصومال</option><option value="الصين">الصين</option><option value="العراق">العراق</option><option value="الفيليبين">الفيليبين</option><option value="الكاميرون">الكاميرون</option><option value="الكرسي الرسولي (دولة مدينة الفاتيكان)">الكرسي الرسولي (دولة مدينة الفاتيكان)</option><option value="الكونغو">الكونغو</option><option value="الكويت">الكويت</option><option value="المارتينيك">المارتينيك</option><option value="المجر">المجر</option><option value="المغرب">المغرب</option><option value="المكسيك">المكسيك</option><option value="المملكة العربية السعودية">المملكة العربية السعودية</option><option value="المملكة المتحدة">المملكة المتحدة</option><option value="النرويج">النرويج</option><option value="النمسا">النمسا</option><option value="النيجر">النيجر</option><option value="الهند">الهند</option><option value="الولايات المتحدة">الولايات المتحدة</option><option value="اليابان">اليابان</option><option value="اليمن">اليمن</option><option value="اليونان">اليونان</option><option value="بابوا غينيا الجديدة">بابوا غينيا الجديدة</option><option value="باراغواي">باراغواي</option><option value="باكستان">باكستان</option><option value="بالاو">بالاو</option><option value="بتسوانا">بتسوانا</option><option value="بربادوس">بربادوس</option><option value="برمودا">برمودا</option><option value="بروناي">بروناي</option><option value="بلجيكا">بلجيكا</option><option value="بلغاريا">بلغاريا</option><option value="بنغلاديش">بنغلاديش</option><option value="بنما">بنما</option><option value="بنين">بنين</option><option value="بوتان">بوتان</option><option value="بورتوريكو">بورتوريكو</option><option value="بوركينا فاس">بوركينا فاس</option><option value="بوروندي">بوروندي</option><option value="بولندا">بولندا</option><option value="بوليفيا">بوليفيا</option><option value="بولينيزيا الفرنسية">بولينيزيا الفرنسية</option><option value="بونير وسينت أوستاتيوس وسابا">بونير وسينت أوستاتيوس وسابا</option><option value="بيتكارين">بيتكارين</option><option value="بيرو">بيرو</option><option value="بيلاروسيا">بيلاروسيا</option><option value="بيليز">بيليز</option><option value="تايلاند">تايلاند</option><option value="تايوان">تايوان</option><option value="تركمانستان">تركمانستان</option><option value="تركيا">تركيا</option><option value="ترينيداد وتوباغ">ترينيداد وتوباغ</option><option value="تشاد">تشاد</option><option value="تشيلي">تشيلي</option><option value="تنزانيا">تنزانيا</option><option value="توغو">توغو</option><option value="توفالو">توفالو</option><option value="توكيلاو">توكيلاو</option><option value="تونجا">تونجا</option><option value="تونس">تونس</option><option value="تيمور الشرقية">تيمور الشرقية</option><option value="جامايكا">جامايكا</option><option value="جبل طارق">جبل طارق</option><option value="جزر آلاند">جزر آلاند</option><option value="جزر الباهاما">جزر الباهاما</option><option value="جزر القمر">جزر القمر</option><option value="جزر الكريسماس">جزر الكريسماس</option><option value="جزر المالديف">جزر المالديف</option><option value="جزر توركس وكايكوس">جزر توركس وكايكوس</option><option value="جزر سليمان">جزر سليمان</option><option value="جزر فارو">جزر فارو</option><option value="جزر فوكلاند (مالفيناس)">جزر فوكلاند (مالفيناس)</option><option value="جزر فيرجن البريطانية">جزر فيرجن البريطانية</option><option value="جزر فيرجن بالولايات المتحدة الأمريكية">جزر فيرجن بالولايات المتحدة الأمريكية</option><option value="جزر كايمان">جزر كايمان</option><option value="جزر كوك">جزر كوك</option><option value="جزر كوكس (كيلينغ)">جزر كوكس (كيلينغ)</option><option value="جزر مارشال">‬جزر مارشال</option><option value="جزر ماريانا الشمالية">جزر ماريانا الشمالية</option><option value="جزر والس وفوتونا">جزر والس وفوتونا</option><option value="جزيرة بوفيت">جزيرة بوفيت</option><option value="جزيرة سانت مارتن">جزيرة سانت مارتن</option><option value="جزيرة مان">جزيرة مان</option><option value="جزيرة نورفولك">جزيرة نورفولك</option><option value="جزيرة هيرد وجزر ماكدونالد">جزيرة هيرد وجزر ماكدونالد</option><option value="جمهورية إفريقيا الوسطى">جمهورية إفريقيا الوسطى</option><option value="جمهورية التشيك">جمهورية التشيك</option><option value="جمهورية الدومينكان">جمهورية الدومينكان</option><option value="جمهورية الكونغو الديمقراطية">جمهورية الكونغو الديمقراطية</option><option value="جنوب إفريقيا">جنوب إفريقيا</option><option value="جنوب السودان">جنوب السودان</option><option value="جورجيا">جورجيا</option><option value="جورجيا الجنوبية وجزر ساندويتش الجنوبية">جورجيا الجنوبية وجزر ساندويتش الجنوبية</option><option value="جيبوتي">جيبوتي</option><option value="جيرسي">جيرسي</option><option value="دومينيكا">دومينيكا</option><option value="رواندا">رواندا</option><option value="روسيا">روسيا</option><option value="رومانيا">رومانيا</option><option value="ريونيون">ريونيون</option><option value="زامبيا">زامبيا</option><option value="زيمبابوي">زيمبابوي</option><option value="ساحل العاج">ساحل العاج</option><option value="ساموا">ساموا</option><option value="ساموا الأمريكية">ساموا الأمريكية</option><option value="سان بارتليمي">سان بارتليمي</option><option value="سان بيير وميكليون">سان بيير وميكليون</option><option value="سان مارينو">سان مارينو</option><option value="سانت فنسنت وجزر غرينادين">سانت فنسنت وجزر غرينادين</option><option value="سانت كيتس ونيفيس">سانت كيتس ونيفيس</option><option value="سانت لوشيا">سانت لوشيا</option><option value="سانت هلينا">سانت هلينا</option><option value="ساوتومي وبرنسيبي">ساوتومي وبرنسيبي</option><option value="سريلانكا">سريلانكا</option><option value="سفالبارد وجان ماين">سفالبارد وجان ماين</option><option value="سلوفاكيا">سلوفاكيا</option><option value="سلوفينيا">سلوفينيا</option><option value="سنغافورة">سنغافورة</option><option value="سوازيلاند">سوازيلاند</option><option value="سوريا">سوريا</option><option value="سورينام">سورينام</option><option value="سويسرا">سويسرا</option><option value="سيراليون">سيراليون</option><option value="سيشيل">سيشيل</option><option value="سينت مارتن">سينت مارتن</option><option value="صربيا">صربيا</option><option value="طاجيكستان">طاجيكستان</option><option value="عُمان">عُمان</option><option value="غامبيا">غامبيا</option><option value="غانا">غانا</option><option value="غرينادا">غرينادا</option><option value="غرينلاند">غرينلاند</option><option value="غواتيمالا">غواتيمالا</option><option value="غوادلوب">غوادلوب</option><option value="غوام">غوام</option><option value="غويانا">غويانا</option><option value="غيانا الفرنسية">غيانا الفرنسية</option><option value="غيرنسي">غيرنسي</option><option value="غينيا">غينيا</option><option value="غينيا الاستوائية">غينيا الاستوائية</option><option value="غينيا بيساو">غينيا بيساو</option><option value="فانواتو">فانواتو</option><option value="فرنسا">فرنسا</option><option value="فنزويلا">فنزويلا</option><option value="فنلندا">فنلندا</option><option value="فيتنام">فيتنام</option><option value="فيجي">فيجي</option><option value="فلسطين">فلسطين</option><option value="قبرص">قبرص</option><option value="قرغيزستان">قرغيزستان</option><option value="قطر">قطر</option><option value="كازاخستان">كازاخستان</option><option value="كرواتيا">كرواتيا</option><option value="كمبوديا">كمبوديا</option><option value="كوبا">كوبا</option><option value="كوراساو">كوراساو</option><option value="كوريا الجنوبية">كوريا الجنوبية</option><option value="كوريا الشمالية">كوريا الشمالية</option><option value="كوستاريكا">كوستاريكا</option><option value="كولومبيا">كولومبيا</option><option value="كيب فيرد">كيب فيرد</option><option value="كيريباتي">كيريباتي</option><option value="كينيا">كينيا</option><option value="لاتفيا">لاتفيا</option><option value="لاوس">لاوس</option><option value="لبنان">لبنان</option><option value="لوكسمبورغ">لوكسمبورغ</option><option value="ليبريا">ليبريا</option><option value="ليبيا">ليبيا</option><option value="ليتوانيا">ليتوانيا</option><option value="ليسوتو">ليسوتو</option><option value="ليشتنشتاين">ليشتنشتاين</option><option value="ماكاو">ماكاو</option><option value="مالاوي">مالاوي</option><option value="مالطة">مالطة</option><option value="مالي">مالي</option><option value="ماليزيا">ماليزيا</option><option value="مايوت">مايوت</option><option value="مدغشقر">مدغشقر</option><option value="مصر">مصر</option><option value="مقدونيا">مقدونيا</option><option value="منغوليا">منغوليا</option><option value="موريتانيا">موريتانيا</option><option value="موريشيوس">موريشيوس</option><option value="موزمبيق">موزمبيق</option><option value="مولدوفا">مولدوفا</option><option value="موناكو">موناكو</option><option value="مونتسيرات">مونتسيرات</option><option value="ميانمار">ميانمار</option><option value="ناميبيا">ناميبيا</option><option value="ناورو">ناورو</option><option value="نيبال">نيبال</option><option value="نيجيريا">نيجيريا</option><option value="نيكاراغوا">نيكاراغوا</option><option value="نيوزيلندا">نيوزيلندا</option><option value="نيوكاليدونيا">نيوكاليدونيا</option><option value="نيوي">نيوي</option><option value="هايتي">هايتي</option><option value="هندوراس">هندوراس</option><option value="هولندا">هولندا</option><option value="هونغ كونغ">هونغ كونغ</option><option value="ولايات ميكرونيزيا الموحدة">ولايات ميكرونيزيا الموحدة</option>      
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>1.	كيف تقيّمون أداء مستشاري المبيعات وسرعة الرد على استفساراتكم؟</label><br/>
                                <?php
                                foreach ($scale as $key => $value) {
                                    $slug = (str_replace(' ', '-', $value));
                                    echo "<label class='radio-inline'><img src='".SITE_URL."/assets/images/$slug.png' class='emoji'><br/> 
                                &nbsp;<input type='radio' class='custom-radio' name='que_1' data-slug='$slug' data-color='$color[$key]'  value='$key' required='required'>&nbsp; <span class='que-1'>$arscale[$key]</span></label>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>2.	ما رأيكم في خيارات مشاريعنا العقارية؟</label><br/>
                                <?php
                                foreach ($scale as $key => $value) {
                                    $slug = (str_replace(' ', '-', $value));
                                    echo "<label class='radio-inline'><img src='".SITE_URL."/assets/images/$slug.png' class='emoji'><br/> 
                                &nbsp;<input type='radio' class='custom-radio' name='que_2' data-slug='$slug' data-color='$color[$key]' value='$key' required='required'>&nbsp; <span class='que-2'>$arscale[$key]</span></label>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>3.	كيف تقيّمون خطط الدفع الخاصة بنا؟</label><br/>
                                <?php
                                foreach ($scale as $key => $value) {
                                    $slug = (str_replace(' ', '-', $value));
                                    echo "<label class='radio-inline'><img src='".SITE_URL."/assets/images/$slug.png' class='emoji'><br/> 
                                &nbsp;<input type='radio' class='custom-radio' name='que_3' data-slug='$slug' data-color='$color[$key]' value='$key' required='required'>&nbsp; <span class='que-3'>$arscale[$key]</span></label>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>4.	كيف تقيّمون عروض سيتي سكيب الخاصة بنا؟</label><br/>
                                <?php
                                foreach ($scale as $key => $value) {
                                    $slug = (str_replace(' ', '-', $value));
                                    echo "<label class='radio-inline'><img src='".SITE_URL."/assets/images/$slug.png' class='emoji'><br/> 
                                &nbsp;<input type='radio' class='custom-radio' name='que_4' data-slug='$slug' data-color='$color[$key]' value='$key' required='required'>&nbsp; <span class='que-4'>$arscale[$key]</span></label>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>5.	كيف سمعتم بعروض سيتي سكيب الخاصة بنا؟ </label><br/>
                                <select name="que_5" class="form-control" required='required'>
                                    <option value=''>اختر المصدر</option>
                                    <?php
                                    foreach ($source as $key => $value) {
                                        echo " <option value='$value'>$arsource[$key]</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr/>

                    <div class="row">
                        <div class="col-xs-8">
                            <button name="submit" type="submit"  data-submit="...Sending" tabindex="12" class="btn btn-success">ارسال</button> <br/><br/>
                        </div>
                        <div class="col-xs-4">
                            <input type="reset" name="reset" value="إعادة تشغيل" class="btn btn-danger" style="width:100%" onclick="return confirm_reset();"> <br/><br/>
                        </div>
                    </div>
                    @endif
            </form>
        </div>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="<?=SITE_URL?>/assets/js/selectstyle.js"></script>
        <?php if (!empty($get['status']) && $get['status'] == 'success') { ?>
            <script>
                                    setTimeout(function () {
                                        window.location = '<?=SITE_URL?>/ar/quick-survey';
                                    }, 5000);
            </script>
        <?php } ?>
        <script>
            jQuery(document).ready(function ($) {
                $('select[name=nationality]').selectstyle();
                setTimeout(function () {
                    $('#ss_search input').attr('data-placeholder', 'بحث');
                }, 1000);

                /*var nationality;
                 var count = $("select[name=nationality] option").length;
                 $("select[name=nationality] option").each(function () {
                 nationality += `<option value='${this.text}' data-value='${this.value}'>${this.text}</option>`;
                 //console.log(count);
                 if (!--count) {
                 $("select[name=nationality]").html('');
                 $("select[name=nationality]").html(nationality);
                 $('select[name=nationality]').selectstyle();
                 $('#ss_search input').attr('placeholder', 'بحث');
                 }
                 });*/
            });

            $('input').keypress(function (event) {
                if (event.keyCode == '13') {
                    event.preventDefault();
                }
            });

            $("input[name=submit]").on('click hover', function () {
                //$("select[name=nationality]").val($("select[name=nationality]").data('value'));
            });


            $('input[name=phone]').keyup(function () {
                if ($(this).val().length > 15) {
                    $(this).val($(this).val().substr(0, 15));
                }

            });

            $('input,select').on('click change', function () {
                if ($('input[name=que_1]').is(':checked')) {
                    $('#que1').removeClass();
                    var s1 = $('input[name=que_1]:checked').data('slug');
                    var c1 = $('input[name=que_1]:checked').data('color');
                    $('span.que-1').css("border-bottom", '');
                    $('#que1').addClass(s1 + ' progress-bar progress-bar-striped').attr('aria-valuenow', 1).css('width', '25%').text('');
                    $('input[name=que_1]:checked+span').addClass('active').css("border-bottom", "5px solid " + c1);
                }
                if ($('input[name=que_2]').is(':checked')) {
                    $('#que2').removeClass();
                    var s2 = $('input[name=que_2]:checked').data('slug');
                    var c2 = $('input[name=que_2]:checked').data('color');
                    $('span.que-2').css("border-bottom", '');
                    $('#que2').addClass(s2 + ' progress-bar progress-bar-striped').attr('aria-valuenow', 1).css('width', '25%').text('');
                    $('input[name=que_2]:checked+span').addClass('active').css("border-bottom", "5px solid " + c2);
                }
                if ($('input[name=que_3]').is(':checked')) {
                    $('#que3').removeClass();
                    var s3 = $('input[name=que_3]:checked').data('slug');
                    var c3 = $('input[name=que_3]:checked').data('color');
                    $('span.que-3').css("border-bottom", '');
                    $('#que3').addClass(s3 + ' progress-bar progress-bar-striped').attr('aria-valuenow', 1).css('width', '25%').text('');
                    $('input[name=que_3]:checked+span').addClass('active').css("border-bottom", "5px solid " + c3);
                }
                if ($('input[name=que_4]').is(':checked')) {
                    $('#que4').removeClass();
                    var s4 = $('input[name=que_4]:checked').data('slug');
                    var c4 = $('input[name=que_4]:checked').data('color');
                    $('span.que-4').css("border-bottom", '');
                    $('#que4').addClass(s4 + ' progress-bar progress-bar-striped').attr('aria-valuenow', 1).css('width', '25%').text('');
                    $('input[name=que_4]:checked+span').addClass('active').css("border-bottom", "5px solid " + c4);
                }

            });



            function confirm_reset() {
                var r = confirm("هل أنت متأكد من أنك تود إعادة التشغيل ؟");
                if (r) {
                    setTimeout(function () {
                        jQuery('.progress-bar').attr('aria-valuenow', 0).css('width', '0%').text('');
                    }, 100);
                }
                return r;
            }

        </script>
    </body>
</html>