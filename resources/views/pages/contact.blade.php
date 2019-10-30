@extends('layouts/default')

{{-- page level styles --}}
@section('header_styles')

<link rel="stylesheet" href="{{asset('assets/build/css/intlTelInput.css')}}">
<link rel="stylesheet" href="{{asset('assets/build/css/demo.css')}}">

<style>
    .select-dropdown {
        border: none !important;
        border-radius: 0 !important;
        color: #b7b7b7 !important;
        border-bottom: 1px solid #e4e4e4 !important;
    }
</style>
<style>.parallax-container .parallax img {top: auto !important;}
    .book-now .select-wrapper input.select-dropdown {
        border-bottom: none !important;}
    .pay-mob .col.s3 {
        width: 23% !important;
        margin-top: 3px !important;
        padding-left: 1px !important;
    }
</style>
@stop

@section('main_div_wrapper')
@stop
@section('section_content')



@if($locale=='ar')
<style>
    .collapsible-body .row .col {
        float: right;
    }
</style>

@endif


<!-- Header -->
<section class="az-section">

    <div class="container">

        <div class="parallax-container valign-wrapper">
            <div class="parallax">

                @if($content->image!="")
                <img alt="{{ $content->alt }}" src="{{asset('assets/images/banner/')}}/{{ $content->image }}" >
                @else
                <img alt="{{ $content->alt }}" src="http://gr8-homes.com/wp-content/uploads/2017/03/Montrell-Serviced-Apartment-Gallery-1.jpg">
                @endif
            </div>
        </div>
        <!--parallax-container end -->

        <div class="row m0">
            <div class="col s12 p0">
                <div class="col s12 p0">
                    <ul>
                        <li>
                            @if($locale=='en')
                            <span class="ion-ios-arrow-left" style=""></span>
                            @endif
                            @if($locale=='ar')
                            <span class="ion-ios-arrow-left" style=""></span>
                            @endif

                            @if($locale=='en')
                            <a href="#" style="color: #5a5a5a;">{{trans('words.home')}} / </a>
                            <a style="font-weight: 600;">{{trans('words.Contact Us')}}</a>
                            @elseif($locale=='cn')

                            <a href="#" style="color: #5a5a5a;">主页 / </a>
                            <a style="font-weight: 600;">联系我们</a>
                            @elseif($locale=='ar')
                            <a href="#" style="color: #5a5a5a;">{{trans('words.home')}} / </a>
                            <a style="font-weight: 600;">{{trans('words.Contact Us')}}</a>
                            @endif



                            @if($locale=='ar')
                            <span class="ion-ios-arrow-left" style=""></span>
                            @endif


                        </li>	
                    </ul>
                </div>
            </div>
        </div>
        <!--breadcrumb end -->
    </div>
    <!--Header Container End -->


    <div class="container">


        <div class="row">


            <div class="col s12" style="margin-bottom: 0rem; margin-top:40px;">
                <h5 style="margin-top: 0;margin-bottom: 0;"> 
                    @if($locale=='en')
                    {!! $content->title_en !!}
                    @elseif($locale=='ar')
                    {!! $content->title_ar !!}
                    @elseif($locale=='cn')
                    {!! $content->title_ch !!}
                    @endif
                </h5>
                <div class="divider az-header-divider" style="margin-bottom: 20px;"></div>

                <div class="row">

                    @if($locale=='en')
                    <div class="col s12" style="margin-bottom: 2rem;">
                        <p class="az-pcontent" style="">
                            In line with our commitment to continually improve our customer service, Azizi Developments has launched its new 
                            Customer Care Program. Contact our dedicated team of Care professionals in case of any issue with your Azizi unit:
                        </p>
                        <div class="col s12 m6 p0">
                            <h4 style="font-size: 15px;font-weight: 100">         
                                <span class="ion-ios-telephone" style="font-size: 25px;margin: 0px 10px;"></span> 
                                <span style="font-weight: 500;font-size: 20px;">
                                    <a href="tel:+97145184555  ">800 CARES (22737)  </a>
                                </span>
                            </h4>
                        </div>
                        <div class="col s12 m6 p0">
                            <h4 style="font-size: 15px;font-weight: 100">         
                                <span class="ion-ios-email" style="font-size: 25px;margin: 0px 10px;"></span> 
                                <span style="font-weight: 500;font-size: 20px;">
                                    <a href="mailto:customercare@<?=DOMAIN_NAME?>">customercare@<?=DOMAIN_NAME?></a>
                                </span>
                            </h4>
                        </div>
                    </div>  
                    @elseif($locale=='ar')
                    <div class="col s12" style="margin-bottom: 2rem;">
                        <p class="az-pcontent" style="">
                            تماشيًا مع التزامنا المستمر بتحسين خدمة العملاء، أطلقت شركة "عزيزي للتطوير العقاري" برنامج رعاية العملاء الجديد. اتصل بفريقنا المتخصص من أخصائي رعاية العملاء في حالة وجود أي مشكلة 
                            تخص وحدتك من عزيزي:
                        </p>
                        <div class="col s12 m6 p0">
                            <h4 style="font-size: 15px;font-weight: 100">         
                                <span class="ion-ios-telephone" style="font-size: 25px;margin: 0px 10px;"></span> 
                                <span style="font-weight: 500;font-size: 20px;">
                                    <a style="font-family: initial !important;" href="tel:+97145184555  ">800 CARES (22737) </a>
                                </span>
                            </h4>
                        </div>
                        <div class="col s12 m6 p0">
                            <h4 style="font-size: 15px;font-weight: 100">         
                                <span class="ion-ios-email" style="font-size: 25px;margin: 0px 10px;"></span> 
                                <span style="font-weight: 500;font-size: 20px;">
                                    <a href="mailto:customercare@<?=DOMAIN_NAME?>">customercare@<?=DOMAIN_NAME?></a>
                                </span>
                            </h4>
                        </div>
                    </div>  
                    @elseif($locale=='cn')
                    <div class="col s12" style="margin-bottom: 2rem;">
                        <p class="az-pcontent" style="">
                            为了配合我们不断改善客户服务的承诺，AZIZI地产公司推出了新的客户服务方式。如果您的AZIZI公寓有任何问题，我们的专业客服团队将随时为您服务：
                        </p>
                        <div class="col s12 m6 p0">
                            <h4 style="font-size: 15px;font-weight: 100">         
                                <span class="ion-ios-telephone" style="font-size: 25px;margin: 0px 10px;"></span> 
                                <span style="font-weight: 500;font-size: 20px;">
                                    <a href="tel:+97145184555  ">800 CARES (22737)</a>
                                </span>
                            </h4>
                        </div>
                        <div class="col s12 m6 p0">
                            <h4 style="font-size: 15px;font-weight: 100">         
                                <span class="ion-ios-email" style="font-size: 25px;margin: 0px 10px;"></span> 
                                <span style="font-weight: 500;font-size: 20px;">
                                    <a href="mailto:customercare@<?=DOMAIN_NAME?>">customercare@<?=DOMAIN_NAME?></a>
                                </span>
                            </h4>
                        </div>
                    </div>  
                    @endif

                </div>


            </div>
            <!--Row -->




            <div class="col s12">

                <h5 style="margin-top: 0;margin-bottom: 0;">
                    <!-- {{trans('words.Get in touch')}} -->
                    @if($locale=='en')
                    Get in touch
                    @elseif($locale=='ar')
                    ابقى على تواصل
                    @elseif($locale=='cn')
                    取得联系
                    @endif
                </h5>
                <div class="divider az-header-divider" style="    margin-bottom: 20px;"></div>


            </div>

            <div class="col s12 m12">


                <p class="az-pcontent" style="    margin: 0px 0px 20px 0px;">
                    @if($locale=='en')
                    {!! $content->short_description_en !!}
                    @elseif($locale=='ar')
                    {!! $content->short_description_ar !!}
                    @elseif($locale=='cn')
                    {!! $content->short_description_ch !!}
                    @endif
                </p>

            </div>

            <!--Contact_Number -->
            <div class="col s12 m12" style="margin-bottom:25px;">

                <!--Start -->

                <div class="col s12 p0">

                    <div class="col s12 m6" style="    padding-left: 9px;">

                        <h4 style="font-size: 15px;font-weight: 100">

    <!-- <span class="ion-ios-telephone" style="font-size: 25px;"></span>
    {{trans('words.Inside the UAE toll free number')}} 
    <span style="font-weight: 500;"><a href="tel:80029494">{{trans('words.tollfree_no')}}</a></span> -->

                            <!-- 800-AZIZI-(29494) -->

                            @if($locale=='en')

                            <span class="ion-ios-telephone" style="font-size: 25px;"></span>
                            {{trans('words.Inside the UAE toll free number')}} 
                            <span style="font-weight: 500;font-size: 20px;">
                                <a href="tel:80029494">{{trans('words.tollfree_no')}}</a>
                            </span>
                            @elseif($locale=='ar')
                            <span class="ion-ios-telephone" style="font-size: 25px;"></span>

                            <span style="font-weight: 500;font-size: 20px;">
                                <a href="tel:80029494" class="num-fo">(29494)800AZIZI</a>
                            </span>
                            {{trans('words.Inside the UAE toll free number')}} 
                            @elseif($locale=='cn')
                            <span class="ion-ios-telephone" style="font-size: 25px;"></span>
                            {{trans('words.Inside the UAE toll free number')}} 
                            <span style="font-weight: 500;font-size: 20px;">
                                <a href="tel:80029494">{{trans('words.tollfree_no')}}</a>
                            </span>
                            @endif


                        </h4>

                    </div>

                    <div class="col s12 m6" style="padding-left: 9px;">

                        <h4 style="font-size: 15px;font-weight: 100;">
                            <span class="ion-earth" style="font-size: 25px;"></span>
                            <!--  {{trans('words.International contact number')}} 
                            <span style="font-weight: 500;"><a href="tel:+9714359 6673">{{trans('words.intrntaional_contact_no')}}</a> -->

                            @if($locale=='en')
                            International contact number:
                            <span style=" font-size: 20px;font-weight: 500;">
                                <a href="tel:+9714359 6673">+971 4 359 6673</a>
                            </span>
                            @elseif($locale=='ar')
                            <span class="num-fo" style="font-size: 20px;font-weight: 500;">
                                <a href="tel:+9714359 6673" class="num-fo" style="">
                                    <span style="font-family: 'Open Sans',sans-serif !important;margin-left: 14px;">
                                        6673 359 4 971+</span>
                                </a>
                            </span>
                            للاتصال من خارج دولة الامارات العربية المتحدة اتصل على: 

                            @elseif($locale=='cn')
                            国际联系电话: <span style=" font-size: 20px;font-weight: 500;">
                                <a href="tel:+9714359 6673">+971 4 359 6673</a>
                            </span>
                            @endif

                        </h4>

                    </div>

                    <div style="margin-bottom:20px;"></div>
                </div>

                <!-- End -->                            

            </div>
            <!--End-->



            <div class="col s12">

                <!-- Form -->
                <form method="post" action="{{route('contact.send')}}" name="contact">


                    <!-- <div class="flash-message">
                        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                          @if(Session::has('alert-' . $msg))

                          <p class="alert alert-{{ $msg }}" style="text-align:left;">{{ Session::get('alert-' . $msg) }}</p>
                          @endif
                        @endforeach
                    </div> -->

                    <div class="flash-message">
                        @foreach (['danger', 'warning', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))

                        <p class="alert alert-{{ $msg }}" style="text-align:left;">{{ Session::get('alert-' . $msg) }}</p>
                        @endif
                        @endforeach
                    </div>








                    <div class="row card m0" style="    margin-bottom: 3rem !important">

                        @foreach (['success'] as $msg)
                        @if(Session::has('alert-' . $msg))

                                                      <!-- <p class="alert alert-{{ $msg }}" style="text-align:left;">{{ Session::get('alert-' . $msg) }}</p> -->

                        <div class="col s12 flash-message" style="margin: 3rem 0rem;border: 1px solid #e0e0e0;padding: 50px 0px;background: #f7f7f7a6;padding-bottom: 5rem;">
                            <div class="">
                                <p class="alert alert-success" style="text-align:left;font-size: 2rem;text-align: center;font-weight: 500;line-height: 25px;">{{trans('words.Thank you for your message')}}<br><span style="font-size: 19px;font-weight: 100;">{{(trans('words.contact_note'))}}<span></span></span></p>
                            </div>
                        </div>

                        @endif
                        @endforeach

                        <!-- <div class="col s12 m9 flash-message" style="margin: 3rem 0rem;border: 1px solid #e0e0e0;padding: 50px 0px;background: #f7f7f7a6;padding-bottom: 5rem;">
                               <div class="">
                                   <p class="alert alert-success" style="text-align:left;font-size: 2rem;text-align: center;font-weight: 500;line-height: 25px;">Thank you for your message<br><span style="font-size: 19px;font-weight: 100;">A member of our organization will contact you with in 48 hours<span></span></span></p>
                               </div>
                           </div> -->


                        @if(Session::has('alert-success'))
                        <div class="col s12" style=" margin-top: 2rem;display:none;">
                            @else
                            <div class="col s12" style=" margin-top: 2rem;">
                                @endif
                                <div class="col s12 m3">
                                    <div class="input-field col s12" style="border: 1px solid #e4e4e4;border-radius: 2px;">
                                        <div class="col s12">
                                            <input type="text" autocomplete="off" autocomplete="off" id="autocomplete-input" class="autocomplete" style="border-bottom: none;margin-bottom: 0;font-size: 15px;letter-spacing: 1px;font-weight: 100;" placeholder="{{trans('words.first_name_label')}}" name="first_name" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col s12 m3">
                                    <div class="input-field col s12" style="border: 1px solid #e4e4e4;border-radius: 2px;">
                                        <div class="col s12">
                                            <input type="text" autocomplete="off" autocomplete="off" id="autocomplete-input" class="autocomplete" style="border-bottom: none;margin-bottom: 0;font-size: 15px;letter-spacing: 1px;font-weight: 100;" placeholder="{{trans('words.last_name_label')}}" name="last_name" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col s12 m6 book-now">
                                    <div class="input-field col s12" style="border: 1px solid #e4e4e4;border-radius: 2px;">
                                        <select name="country" required>
                                            <option value="">{{trans('words.country_label')}}</option>
                                            <option value="Afghanistan">{{trans('words.afghanistan')}}</option>
                                            <option value="AL">{{trans('words.albania')}}</option>
                                            <option value="DZ">{{trans('words.algeria')}}</option>
                                            <option value="AD">{{trans('words.andorra')}}</option>
                                            <option value="AO">{{trans('words.angola')}}</option>
                                            <option value="AI">{{trans('words.anguilla')}}</option>
                                            <option value="AG">{{trans('words.antigua_and_barbuda')}}</option>
                                            <option value="AR">{{trans('words.argentina')}}</option>
                                            <option value="AM">{{trans('words.armenia')}}</option>
                                            <option value="AU">{{trans('words.australia')}}</option>
                                            <option value="AT">{{trans('words.austria')}}</option>
                                            <option value="AZ">{{trans('words.azerbaijan')}}</option>
                                            <option value="BS">{{trans('words.Bahamas')}}</option>
                                            <option value="BH">{{trans('words.Bahrain')}}</option>
                                            <option value="BD">{{trans('words.Bangladesh')}}</option>
                                            <option value="BB">{{trans('words.Barbados')}}</option>
                                            <option value="BY">{{trans('words.Belarus')}}</option>
                                            <option value="BE">{{trans('words.Belgium')}}</option>
                                            <option value="BZ">{{trans('words.Belize')}}</option>
                                            <option value="BJ">{{trans('words.Benin')}}</option>
                                            <option value="BM">{{trans('words.Bermuda')}}</option>
                                            <option value="BT">{{trans('words.Bhutan')}}</option>
                                            <option value="BO">{{trans('words.Bolivia')}}</option>
                                            <option value="BA">{{trans('words.Bosnia and Herzegovina')}}</option>
                                            <option value="BW">{{trans('words.Botswana')}}</option>
                                            <option value="BR">{{trans('words.Brazil')}}</option>
                                            <option value="BN">{{trans('words.Brunei Darussalam')}}</option>
                                            <option value="BG">{{trans('words.Bulgaria')}}</option>
                                            <option value="BF">{{trans('words.Burkina Faso')}}</option>
                                            <option value="MM">{{trans('words.Myanmar')}}</option>
                                            <option value="BI">{{trans('words.Burundi')}}</option>
                                            <option value="KH">{{trans('words.Cambodia')}}</option>
                                            <option value="CM">{{trans('words.Cameroon')}}</option>
                                            <option value="CA">{{trans('words.Canada')}}</option>
                                            <option value="CV">{{trans('words.Cape Verde')}}</option>
                                            <option value="KY">{{trans('words.Cayman Islands')}}</option>
                                            <option value="CF">{{trans('words.Central African Republic')}}</option>
                                            <option value="TD">{{trans('words.Chad')}}</option>
                                            <option value="CL">{{trans('words.Chile')}}</option>
                                            <option value="CN">{{trans('words.China')}}</option>
                                            <option value="CO">{{trans('words.Colombia')}}</option>
                                            <option value="KM">{{trans('words.Comoros')}}</option>
                                            <option value="CG">{{trans('words.Congo')}}</option>
                                            <option value="CR">{{trans('words.Costa Rica')}}</option>
                                            <option value="HR">{{trans('words.Croatia')}}</option>
                                            <option value="CU">{{trans('words.Cuba')}}</option>
                                            <option value="CY">{{trans('words.Cyprus')}}</option>
                                            <option value="CZ">{{trans('words.Czech Republic')}}</option>
                                            <option value="DO">{{trans('words.Democratic Republic of the Congo')}}</option>
                                            <option value="DK">{{trans('words.Denmark')}}</option>
                                            <option value="DJ">{{trans('words.Djibouti')}}</option>
                                            <option value="DO">{{trans('words.Dominican Republic')}}</option>
                                            <option value="DM">{{trans('words.Dominica')}}</option>
                                            <option value="EC">{{trans('words.Ecuador')}}</option>
                                            <option value="EG">{{trans('words.Egypt')}}</option>
                                            <option value="SV">{{trans('words.El Salvador')}}</option>
                                            <option value="GQ">{{trans('words.Equatorial Guinea')}}</option>
                                            <option value="ER">{{trans('words.Eritrea')}}</option>
                                            <option value="EE">{{trans('words.Estonia')}}</option>
                                            <option value="ET">{{trans('words.Ethiopia')}}</option>
                                            <option value="FJ">{{trans('words.Fiji')}}</option>
                                            <option value="FI">{{trans('words.Finland')}}</option>
                                            <option value="FR">{{trans('words.France')}}</option>
                                            <option value="GF">{{trans('words.French Guiana')}}</option>
                                            <option value="GA">{{trans('words.Gabon')}}</option>
                                            <option value="GM">{{trans('words.Gambia')}}</option>
                                            <option value="GE">{{trans('words.Georgia')}}</option>
                                            <option value="DE">{{trans('words.Germany')}}</option>
                                            <option value="GH">{{trans('words.Ghana')}}</option>
                                            <option value="GB">{{trans('words.Great')}}</option>
                                            <option value="GR">{{trans('words.Greece')}}</option>
                                            <option value="GD">{{trans('words.Grenada')}}</option>
                                            <option value="GP">{{trans('words.Guadeloupe')}}</option>
                                            <option value="GT">{{trans('words.Guatemala')}}</option>
                                            <option value="GN">{{trans('words.Guinea')}}</option>
                                            <option value="GW">{{trans('words.Guinea-Bissau')}}</option>
                                            <option value="GY">{{trans('words.Guyana')}}</option>
                                            <option value="HT">{{trans('words.Haiti')}}</option>
                                            <option value="HN">{{trans('words.Honduras')}}</option>
                                            <option value="HU">{{trans('words.Hungary')}}</option>
                                            <option value="IS">{{trans('words.Iceland')}}</option>
                                            <option value="IN">{{trans('words.India')}}</option>
                                            <option value="ID">{{trans('words.Indonesia')}}</option>
                                            <option value="IR">{{trans('words.Iran')}}</option>
                                            <option value="IQ">{{trans('words.Iraq')}}</option>
                                            <option value="IL">{{trans('words.Territories')}}</option>
                                            <option value="IT">{{trans('words.Italy')}}</option>
                                            <option value="CDI">{{trans('words.Coast')}}</option>
                                            <option value="JM">{{trans('words.Jamaica')}}</option>
                                            <option value="JP">{{trans('words.Japan')}}</option>
                                            <option value="JO">{{trans('words.Jordan')}}</option>
                                            <option value="KZ">{{trans('words.Kazakhstan')}}</option>
                                            <option value="KE">{{trans('words.Kenya')}}</option>
                                            <option value="Kosovo">{{trans('words.Kosovo')}}</option>
                                            <option value="KW">{{trans('words.Kuwait')}}</option>
                                            <option value="KG">{{trans('words.Kyrgyzstan')}}</option>
                                            <option value="LA">{{trans('words.Laos')}}</option>
                                            <option value="LV">{{trans('words.Latvia')}}</option>
                                            <option value="LB">{{trans('words.Lebanon')}}</option>
                                            <option value="LS">{{trans('words.Lesotho')}}</option>
                                            <option value="LR">{{trans('words.Liberia')}}</option>
                                            <option value="LY">{{trans('words.Libya')}}</option>
                                            <option value="LI">{{trans('words.Liechtenstein')}}</option>
                                            <option value="LT">{{trans('words.Lithuania')}}</option>
                                            <option value="LU">{{trans('words.Luxembourg')}}</option>
                                            <option value="MK">{{trans('words.Macedonia')}}</option>
                                            <option value="MG">{{trans('words.Madagascar')}}</option>
                                            <option value="MW">{{trans('words.Malawi')}}</option>
                                            <option value="MY">{{trans('words.Malaysia')}}</option>
                                            <option value="MV">{{trans('words.Maldives')}}</option>
                                            <option value="ML">{{trans('words.Mali')}}</option>
                                            <option value="MT">{{trans('words.Malta')}}</option>
                                            <option value="MQ">{{trans('words.Martinique')}}</option>
                                            <option value="MR">{{trans('words.Mauritania')}}</option>
                                            <option value="MU">{{trans('words.Mauritius')}}</option>
                                            <option value="YT">{{trans('words.Mayotte')}}</option>
                                            <option value="MX">{{trans('words.Mexico')}}</option>
                                            <option value="MD">{{trans('words.Moldova')}}</option>
                                            <option value="MC">{{trans('words.Monaco')}}</option>
                                            <option value="MN">{{trans('words.Mongolia')}}</option>
                                            <option value="ME">{{trans('words.Montenegro')}}</option>
                                            <option value="MS">{{trans('words.Montserrat')}}</option>
                                            <option value="MA">{{trans('words.Morocco')}}</option>
                                            <option value="MZ">{{trans('words.Mozambique')}}</option>
                                            <option value="NA">{{trans('words.Namibia')}}</option>
                                            <option value="NP">{{trans('words.Nepal')}}</option>
                                            <option value="NL">{{trans('words.Netherlands')}}</option>
                                            <option value="NZ">{{trans('words.New Zealand')}}</option>
                                            <option value="NI">{{trans('words.Nicaragua')}}</option>
                                            <option value="NE">{{trans('words.Niger')}}</option>
                                            <option value="NG">{{trans('words.Nigeria')}}</option>
                                            <option value="KP">{{trans('words.North_Korea')}}</option>
                                            <option value="NO">{{trans('words.Norway')}}</option>
                                            <option value="OM">{{trans('words.Oman')}}</option>
                                            <option value="PICT">{{trans('words.Pacific Islands')}}</option>
                                            <option value="PK">{{trans('words.Pakistan')}}</option>
                                            <option value="PA">{{trans('words.Panama')}}</option>
                                            <option value="PG">{{trans('words.Papua New Guinea')}}</option>
                                            <option value="PY">{{trans('words.Paraguay')}}</option>
                                            <option value="PE">{{trans('words.Peru')}}</option>
                                            <option value="PH">{{trans('words.Philippines')}}</option>
                                            <option value="PL">{{trans('words.Poland')}}</option>
                                            <option value="PT">{{trans('words.Portugal')}}</option>
                                            <option value="PR">{{trans('words.Puerto Rico')}}</option>
                                            <option value="QA">{{trans('words.Qatar')}}</option>
                                            <option value="RE">{{trans('words.Reunion')}}</option>
                                            <option value="RO">{{trans('words.Romania')}}</option>
                                            <option value="RU">{{trans('words.Russian Federation')}}</option>
                                            <option value="RW">{{trans('words.Rwanda')}}</option>
                                            <option value="KN">{{trans('words.Saint Kitts and Nevis')}}</option>
                                            <option value="LC">{{trans('words.Saint Lucia')}}</option>
                                            <option value="VC">{{trans('words.Saint Vincents & Grenadines')}}</option>
                                            <option value="WS">{{trans('words.Samoa')}}</option>
                                            <option value="ST">{{trans('words.Sao Tome and Principe')}}</option>
                                            <option value="SA">{{trans('words.Saudi Arabia')}}</option>
                                            <option value="SN">{{trans('words.Senegal')}}</option>
                                            <option value="RS">{{trans('words.Serbia')}}</option>
                                            <option value="SC">{{trans('words.Seychelles')}}</option>
                                            <option value="SL">{{trans('words.Sierra Leone')}}</option>
                                            <option value="SG">{{trans('words.Singapore')}}</option>
                                            <option value="SK">{{trans('words.Slovakia')}}</option>
                                            <option value="SI">{{trans('words.Slovenia')}}</option>
                                            <option value="SB">{{trans('words.Solomon Islands')}}</option>
                                            <option value="SO">{{trans('words.Somalia')}}</option>
                                            <option value="ZA">{{trans('words.South Africa')}}</option>
                                            <option value="KR">{{trans('words.Korea')}}</option>
                                            <option value="SS">{{trans('words.South Sudan')}}</option>
                                            <option value="ES">{{trans('words.Spain')}}</option>
                                            <option value="LK">{{trans('words.Sri Lanka')}}</option>
                                            <option value="SD">{{trans('words.Sudan')}}</option>
                                            <option value="SR">{{trans('words.Suriname')}}</option>
                                            <option value="SZ">{{trans('words.Swaziland')}}</option>
                                            <option value="SE">{{trans('words.Sweden')}}</option>
                                            <option value="CH">{{trans('words.Switzerland')}}</option>
                                            <option value="SY">{{trans('words.Syrian Arab Republic (Syria)')}}</option>
                                            <option value="TJ">{{trans('words.Tajikistan')}}</option>
                                            <option value="TZ">{{trans('words.Tanzania, United Republic of')}}</option>
                                            <option value="TH">{{trans('words.Thailand')}}</option>
                                            <option value="TL">{{trans('words.Timor-Leste')}}</option>
                                            <option value="TG">{{trans('words.Togo')}}</option>
                                            <option value="TT">{{trans('words.Trinidad and Tobago')}}</option>
                                            <option value="TN">{{trans('words.Tunisia')}}</option>
                                            <option value="TR">{{trans('words.Turkey')}}</option>
                                            <option value="TM">{{trans('words.Turkmenistan')}}</option>
                                            <option value="TC">{{trans('words.Turks and Caicos Islands')}}</option>
                                            <option value="UG">{{trans('words.Uganda')}}</option>
                                            <option value="UA">{{trans('words.Ukraine')}}</option>
                                            <option value="AE">{{trans('words.United Arab Emirates')}}</option>
                                            <option value="US">{{trans('words.United States of America')}}</option>
                                            <option value="UY">{{trans('words.Uruguay')}}</option>
                                            <option value="UZ">{{trans('words.Uzbekistan')}}</option>
                                            <option value="VE">{{trans('words.Venezuela (Bolivarian Republic)')}}</option>
                                            <option value="VN">{{trans('words.Viet Nam')}}</option>
                                            <option value="VG">{{trans('words.Virgin Islands (UK)')}}</option>
                                            <option value="VI">{{trans('words.Virgin Islands, US')}}</option>
                                            <option value="YE">{{trans('words.Yemen')}}</option>
                                            <option value="ZM">{{trans('words.Zambia')}}</option>
                                            <option value="ZW">{{trans('words.Zimbabwe')}}</option>
                                        </select>

                                    </div>
                                </div>


                                <div class="col s12 m6">
                                    <div class="input-field col s12" style="border: 1px solid #e4e4e4;border-radius: 2px;">
                                        <div class="col s12">
                                            <input type="email" id="autocomplete-input" class="autocomplete" style="border-bottom: none;margin-bottom: 0;font-size: 15px;letter-spacing: 1px;font-weight: 100;" placeholder="{{trans('words.email_label')}}" name="email" required>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col s12 m6">
                                    <div class="input-field col s12" style="border: 1px solid #e4e4e4;border-radius: 2px;">
                                        <div class="col s12">
                                            <input type="text" autocomplete="off" autocomplete="off" id="autocomplete-input" class="autocomplete" style="border-bottom: none;margin-bottom: 0;font-size: 15px;letter-spacing: 1px;font-weight: 100;" placeholder="Company Name" name="company_name" required>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- div class="col s12 m6">
                                    <div class="input-field col s12" style="border: 1px solid #e4e4e4;border-radius: 2px;">
                                        <div class="col s12">
                                            <input type="text" autocomplete="off" autocomplete="off" maxlength="13" onkeypress='validate(event)' id="phone" class="autocomplete" style="border-bottom: none;margin-bottom: 0;font-size: 15px;letter-spacing: 1px;font-weight: 100;" placeholder="Contact Number *" name="contact_number" required>
                                        </div>
                                    </div>
                                </div> -->


                                <!-- Mobile Number -->
                                <div class="col s12 m6 pay-mob">
                                    <div class="input-field col s12" style="border: 1px solid #e4e4e4;border-radius: 2px;    float: left !important;">
                                        <div class="col s3 m2" style="float: left !important;">
                                            <input type="text" autocomplete="off" autocomplete="off" id="code" name="code" class="autocomplete" style="border-bottom: none;margin-bottom: 0;font-size: 15px;letter-spacing: 1px;font-weight: 100;    direction: initial !important;" value="+971" required maxlength="4" >
                                        </div>
                                        <!-- <div class="col s3">
                                            <input type="text" autocomplete="off" autocomplete="off" id="acode" name="acode" class="autocomplete" style="border-bottom: none;margin-bottom: 0;font-size: 15px;letter-spacing: 1px;font-weight: 100;" value="" maxlength="0">
                                        </div> -->

                                        @if($locale=='en')
                                        <div class="col s9 m10" style="border-left: 1px solid #e6e6e6;padding-right: 0;    float: left !important;">
                                            @endif
                                            @if($locale=='ar')
                                            <div class="col s9 m10" style="border-left: 1px solid #e6e6e6;padding-right: 0;    float: left !important;">
                                                @endif
                                                @if($locale=='cn')
                                                <div class="col s9 m10" style="border-left: 1px solid #e6e6e6;padding-right: 0;    float: left !important;">
                                                    @endif

                                                    <!-- <div class="col s9 m10" style="border-left: 1px solid #e6e6e6;padding-right: 0;"> -->
                                                    <input type="text" autocomplete="off" autocomplete="off" onkeypress='validate(event)'   class="autocomplete" style="border-bottom: none;margin-bottom: 0;font-size: 15px;letter-spacing: 1px;font-weight: 100;" maxlength="10" placeholder="" name="mobile_no" required >
                                                    <!-- <label>Mobile Number*</label> -->
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->


                                        <div class="col s12 book-now">
                                            <div class="input-field col s12" style="border: 1px solid #e4e4e4;border-radius: 2px;">
                                                <select name="department" required>
                                                    <option value="" disabled selected>{{trans('words.Select Department *')}}</option>
                                                    <option value="5">{{trans('words.Sales')}}</option>
                                                    <option value="3">{{trans('words.Customer Service')}}</option>
                                                    <option value="2">{{trans('words.Marketing')}}</option>
                                                    <option value="1">{{trans('words.Corporate Communication')}}</option>
                                                    <option value="4">{{trans('words.Legal')}}</option>

                                                    <!-- <option value="1">General</option> -->





                                                </select>
                                            </div>
                                        </div>

                                        <div class="col s12">
                                            <div class="input-field col s12" style="border: 1px solid #e4e4e4;border-radius: 2px;">
                                                <div class="col s12">
                                                    <textarea id="textarea1" style="border-bottom: none;margin-bottom: 0;font-size: 15px;letter-spacing: 1px;font-weight: 100;" placeholder="{{trans('words.Message *')}}" class="materialize-textarea" name="message" required></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col s12">
                                           <!--  <input type="submit" class="inquire az-btn active" style="margin: 35px 0px;" value="submit"> -->

                                            @if($locale=='en')
                                            <input type="submit" class="inquire az-btn active" style="margin: 35px 0px;" value="submit">
                                            @elseif($locale=='ar')
                                            <input type="submit" class="inquire az-btn active" style="margin: 35px 0px;" value="ارسل">
                                            @elseif($locale=='cn')
                                            <input type="submit" class="inquire az-btn active" style="margin: 35px 0px;" value="提交">
                                            @endif


                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                            <input type="hidden" id="frm" name="frm" value="contact" />
                                            <!--<a class="inquire az-btn active" style="margin: 35px 0px;">Submit</a>-->
                                        </div>
                                    </div>
                                </div>
                                </form>
                                <!-- end -->


                            </div>


                            <div class="col s12">
                                <!-- <h5 style="margin-top: 0;margin-bottom: 0;">{{trans("words.Azizi Developments Offices")}}</h5> -->
                                @if($locale=='en')
                                <h5 style="margin-top: 0;margin-bottom: 0;">Azizi Developments Offices</h5>
                                @elseif($locale=='ar')
                                <h5 style="margin-top: 0;margin-bottom: 0;">مقرات عزيزي للتطوير العقاري</h5>
                                @elseif($locale=='cn')
                                <h5 style="margin-top: 0;margin-bottom: 0;">Azizi 地产公司办公室</h5>
                                @endif
                                <div class="divider az-header-divider" style="    margin-bottom: 20px;"></div>


                                <!-- Contact Addresses -->
                                <div class="col s12 p0">
                                    <ul class="collapsible" data-collapsible="accordion">

                                        <li>
                                            <div class="collapsible-header"><i class="ion-location"></i>
                                                <!--  <h5 class="m0" style="font-size: 15px;margin-top: 10px !important;">{{trans('words.UAE')}}</h5> -->
                                                @if($locale=='en')
                                                <h5 class="m0" style="font-size: 15px;margin-top: 10px !important;">UAE</h5>
                                                @elseif($locale=='ar')
                                                <h5 class="m0" style="font-size: 15px;margin-top: 10px !important;">الإمارات العربية المتحدة</h5>
                                                @elseif($locale=='cn')
                                                <h5 class="m0" style="font-size: 15px;margin-top: 10px !important;">阿联酋</h5>
                                                @endif
                                                <h5 class="contact-arrow-collapse" style="margin: 0;position: absolute;right: 11em; margin-top: 5px;"><span class="ion-ios-arrow-down"></span></h5>
                                            </div>
                                            <div class="collapsible-body">

                                                <!-- Inner -->
                                                <ul class="collapsible" data-collapsible="accordion" style="box-shadow: none;">
                                                    <?php
                                                    $i = 1;
                                                    ?>
                                                    @foreach($contacts_dubai as $contact_dubai)
                                                    <input type="hidden" id="addstore<?php echo $i; ?>" value="{!! $contact_dubai->address !!}" />
                                                    <li>
                                                        <div class="collapsible-header" onclick="loadgooglemap(<?php echo $i; ?>,<?php echo $contact_dubai->lat; ?>,<?php echo $contact_dubai->lng; ?>)" id="abc"><i class="ion-location"></i>
                                                            <h5 class="m0" style="font-size: 15px;margin-top: 10px !important;">

                                                                @if($locale=='en')
                                                                {!! $contact_dubai->address_title !!}
                                                                @elseif($locale=='ar')
                                                                {!! $contact_dubai->address_title_ar !!}
                                                                @elseif($locale=='cn')
                                                                {!! $contact_dubai->address_title_ch !!}
                                                                @endif
                                                            </h5>
                                                            <h5 class="contact-arrow-collapse" style="margin: 0;position: absolute;right: 11em;" margin-top: 5px;><span class="ion-ios-arrow-down"></span></h5>
                                                        </div>
                                                        <div class="collapsible-body">
                                                            <div class="row">
                                                                <div class="col s12 m6">
                                                                    <!-- Address -->
                                                                    <div class="col s12 p0" style="border-bottom: 1px solid #e8e8e8;">
                                                                        <div class="col s2">
                                                                            <h2 style="margin: 0;margin-top: 0.5em;"><span class="ion-ios-paper-outline"></span></h2>
                                                                        </div>
                                                                        <div class="col s10">
                                                                            <p class="az-pcontent num-fo">
                                                                                @if($locale=='en')
                                                                                {!! $contact_dubai->address !!}
                                                                                @elseif($locale=='ar')
                                                                                {!! $contact_dubai->address_ar !!}
                                                                                @elseif($locale=='cn')
                                                                                {!! $contact_dubai->address_ch !!}
                                                                                @endif</p>
                                                                        </div>
                                                                    </div>
                                                                    <!-- end -->

                                                                    <!-- Contact -->
                                                                    <div class="col s12 p0" style="border-bottom: 1px solid #e8e8e8;">
                                                                        <div class="col s2">
                                                                            <h2 style="margin: 0;margin-top: 0.5em;"><span class="ion-ios-telephone-outline"></span></h2>
                                                                        </div>
                                                                        <div class="col s10">
                                                                            <p class="az-pcontent">{{trans('words.Telephone')}}- <span class="num-flip num-fo">{!! $contact_dubai->phone_no !!}</span>
                                                                                <br>{{trans('words.Fax')}}- <span class="num-flip num-fo">{!! $contact_dubai->fax_no !!}</span></p>
                                                                        </div>
                                                                    </div>
                                                                    <!-- end -->

                                                                    <!-- Email -->
                                                                    <div class="col s12 p0" style="border-bottom: 1px solid #e8e8e8;">
                                                                        <div class="col s2">
                                                                            <h2 style="margin: 0;margin-top: 0.5em;"><span class="ion-ios-email-outline"></span></h2>
                                                                        </div>
                                                                        <div class="col s10">
                                                                            <p class="az-pcontent num-fo">{!! $contact_dubai->email_id !!}</p>
                                                                        </div>
                                                                    </div>
                                                                    <!-- end -->

                                                                    <!-- Working hours -->
                                                                    <div class="col s12 p0" style="border-bottom: 1px solid #e8e8e8;">
                                                                        <div class="col s2">
                                                                            <h2 style="margin: 0;margin-top: 0.5em;"><span class="ion-ios-time-outline"></span></h2>
                                                                        </div>
                                                                        <div class="col s10">
                                                                            <p class="az-pcontent num-fo">{{trans('words.Working hours')}}-
                                                                                @if($locale=='en')
                                                                                {!! $contact_dubai->working_hours !!}
                                                                                @elseif($locale=='ar')
                                                                                {!! $contact_dubai->working_hours_ar !!}
                                                                                @elseif($locale=='cn')
                                                                                {!! $contact_dubai->working_hours_ch !!}
                                                                                @endif 
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <!-- end -->
                                                                </div>
                                                                <div class="col s12 m6">
                                                                    <div id="map<?php echo $i; ?>" style="height:221px !important;" height="221" width="542">

                                                                    </div>
                                                                    <!--<img src="assets/images/map.jpg" class="responsive-img">-->
                                                                    <div class="col s12 p0">
                                                                        <a class="az-btn m0 active" style="margin: 35px 0px;" href="https://www.google.co.in/maps/place/API+World+Tower/@25.2252897,55.2814847,17z/data=!4m8!1m2!2m1!1sSuite+No.+902+%2F+904,+API+World+Tower,+Sheikh+Zayed+Road,+Dubai,+UAE!3m4!1s0x3e5f42ee7c67b1dd:0x823df13de82eab67!8m2!3d25.2252897!4d55.2836734?hl=en" target="_blank"><!-- {{trans('words.Get direction')}} -->
                                                                            @if($locale=='en')
                                                                            Get direction
                                                                            @elseif($locale=='ar')
                                                                            احصل على الموقع
                                                                            @elseif($locale=='cn')
                                                                            获取路线
                                                                            @endif
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <?php $i++; ?>
                                                    @endforeach
                                                </ul>
                                                <!-- End -->
                                            </div>
                                        </li>

                                        <!--<li>
                                            <div class="collapsible-header"><i class="ion-location"></i>
                                                <h5 class="m0" style="font-size: 15px;margin-top: 10px !important;">{{trans('words.International')}}</h5>
                                                <h5 class="contact-arrow-collapse" style="margin: 0;position: absolute;right: 5em;"><span class="ion-ios-arrow-down"></span></h5>
                                            </div>
                                            <div class="collapsible-body">
    
                                                
                                                <ul class="collapsible" data-collapsible="accordion" style="box-shadow: none;">
                                                
                                                @foreach($contacts_internet as $contact_internet)
                                                
                                                
                                                <input type="hidden" id="addstore<?php echo $i; ?>" value="{!! $contact_internet->address !!}" />
                                                        
                                                    <li>
                                                        <div class="collapsible-header" onclick="loadgooglemap(<?php echo $i; ?>,<?php echo $contact_internet->lat; ?>,<?php echo $contact_internet->lng; ?>)"><i class="ion-location"></i>
                                                            <h5 class="m0" style="font-size: 15px;margin-top: 10px !important;">
                                                             @if($locale=='en')
                                                            {!! $contact_internet->address_title !!}
                                                            @elseif($locale=='ar')
                                                            {!! $contact_internet->address_title_ar !!}
                                                            @elseif($locale=='cn')
                                                            {!! $contact_internet->address_title_ch !!}
                                                            @endif </h5>
                                                            <h5 class="contact-arrow-collapse" style="margin: 0;position: absolute;right: 5em;"><span class="ion-ios-arrow-down"></span></h5>
                                                        </div>
                                                        <div class="collapsible-body">
                                                            <div class="row">
                                                                <div class="col s12 m6">
                                                                    
                                                                    <div class="col s12 p0" style="border-bottom: 1px solid #e8e8e8;">
                                                                        <div class="col s2">
                                                                            <h2 style="margin: 0;margin-top: 0.5em;"><span class="ion-ios-paper-outline"></span></h2>
                                                                        </div>
                                                                        <div class="col s10">
                                                                            <p class="az-pcontent num-fo">
                                                                                @if($locale=='en')
                                                                                {!! $contact_internet->address !!}
                                                                                @elseif($locale=='ar')
                                                                                {!! $contact_internet->address_ar !!}
                                                                                @elseif($locale=='cn')
                                                                                {!! $contact_internet->address_ch !!}
                                                                                @endif</p>
                                                                        </div>
                                                                    </div>
                                                                   
    
                                                                    
                                                                    <div class="col s12 p0" style="border-bottom: 1px solid #e8e8e8;">
                                                                        <div class="col s2">
                                                                            <h2 style="margin: 0;margin-top: 0.5em;"><span class="ion-ios-telephone-outline"></span></h2>
                                                                        </div>
                                                                        <div class="col s10">
                                                                            <p class="az-pcontent num-fo">{{trans('words.Telephone')}}- <span>{!! $contact_internet->phone_no !!}</span>
                                                                                <br>{{trans('words.Fax')}}- <span>{!! $contact_internet->fax_no !!}</span></p>
                                                                        </div>
                                                                    </div>
                                                                    
    
                                                                    
                                                                    <div class="col s12 p0" style="border-bottom: 1px solid #e8e8e8;">
                                                                        <div class="col s2">
                                                                            <h2 style="margin: 0;margin-top: 0.5em;"><span class="ion-ios-email-outline"></span></h2>
                                                                        </div>
                                                                        <div class="col s10">
                                                                            <p class="az-pcontent num-fo">{!! $contact_internet->email_id !!}</p>
                                                                        </div>
                                                                    </div>
                                                                    
    
                                                                    
                                                                    <div class="col s12 p0" style="border-bottom: 1px solid #e8e8e8;">
                                                                        <div class="col s2">
                                                                            <h2 style="margin: 0;margin-top: 0.5em;"><span class="ion-ios-time-outline"></span></h2>
                                                                        </div>
                                                                        <div class="col s10">
                                                                            <p class="az-pcontent num-fo>{{trans('words.Working hours')}}- 
                                                                                @if($locale=='en')
                                                                                {!! $contact_internet->working_hours !!}
                                                                                @elseif($locale=='ar')
                                                                                {!! $contact_internet->working_hours_ar !!}
                                                                                @elseif($locale=='cn')
                                                                                {!! $contact_internet->working_hours_ch !!}
                                                                                @endif</p>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div>
                                                                <div class="col s12 m6">
                                                                    <div id="map<?php echo $i; ?>" style="height:221px !important;" height="221" width="542">
                                                                    
                                                                    </div>
                                                                    
                                                                    <div class="col s12 p0">
                                                                        <a class="az-btn m0 active" style="margin: 35px 0px;" href="https://www.google.co.in/maps/place/Century+Business+Centre/@13.0314815,80.2495857,17z/data=!3m1!4b1!4m5!3m4!1s0x3a5266341d693651:0x6af011148796d240!8m2!3d13.0314815!4d80.2517744?hl=en" target="_blank">
                                                                            @if($locale=='en')
                                                                    Get direction
                                                                    @elseif($locale=='ar')
                                                                    احصل على الموقع
                                                                    @elseif($locale=='cn')
                                                                    获取路线
                                                                    @endif
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                        <?php $i++; ?>
                                                @endforeach
                                                </ul>
                                                
    
                                            </div>
                                        </li>-->
                                    </ul>
                                </div>
                                <!-- End -->


                                <div class="col s12 p0" style="    margin-top: 2rem;">
                                    <div >
                                        <div class="col s12" id="map">
                                            <!--<img src="assets/images/map.jpg" class="responsive-img">-->

                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <!--row end contact Info-->


















                        <!-- <div class="col s12 m10">
                            <h5 style="margin-top: 0;margin-bottom: 0;">{!! $content->title_en !!}</h5>
                            <div class="divider az-header-divider" style="    margin-bottom: 20px;"></div>
                            <p class="az-pcontent" style="    margin: 0px 0px 40px 0px;">{!! $content->short_description_en !!}</p>
                        </div> -->


                        <!-- Address -->
                        <div class="row hide">

                            <!-- Contact Addresses -->
                            <div class="col s12">
                                <ul class="collapsible" data-collapsible="accordion">

                                    <li>
                                        <div class="collapsible-header"><i class="ion-location"></i>
                                            <h5 class="m0" style="font-size: 15px;margin-top: 10px !important;">{{trans('words.Dubai')}}</h5>
                                            <h5 class="contact-arrow-collapse" style="margin: 0;position: absolute;right: 10em; margin-top: 5px;"><span class="ion-ios-arrow-down"></span></h5>
                                        </div>
                                        <div class="collapsible-body">

                                            <!-- Inner -->
                                            <ul class="collapsible" data-collapsible="accordion" style="box-shadow: none;">
                                                <?php
                                                $i = 1;
                                                ?>
                                                @foreach($contacts_dubai as $contact_dubai)
                                                <input type="hidden" id="addstore<?php echo $i; ?>" value="{!! $contact_dubai->address !!}" />
                                                <li>
                                                    <div class="collapsible-header" onclick="loadgooglemap(<?php echo $i; ?>,<?php echo $contact_dubai->lat; ?>,<?php echo $contact_dubai->lng; ?>)" id="abc"><i class="ion-location"></i>
                                                        <h5 class="m0" style="font-size: 15px;margin-top: 10px !important;">{!! $contact_dubai->address_title !!}</h5>
                                                        <h5 class="contact-arrow-collapse" style="margin: 0;position: absolute;right: 11em; margin-top: 5px;"><span class="ion-ios-arrow-down"></span></h5>
                                                    </div>
                                                    <div class="collapsible-body">
                                                        <div class="row">
                                                            <div class="col s12 m6">
                                                                <!-- Address -->
                                                                <div class="col s12 p0" style="border-bottom: 1px solid #e8e8e8;">
                                                                    <div class="col s2">
                                                                        <h2 style="margin: 0;margin-top: 0.5em;"><span class="ion-ios-paper-outline"></span></h2>
                                                                    </div>
                                                                    <div class="col s10">
                                                                        <p class="az-pcontent">{!! $contact_dubai->address !!}</p>
                                                                    </div>
                                                                </div>
                                                                <!-- end -->

                                                                <!-- Contact -->
                                                                <div class="col s12 p0" style="border-bottom: 1px solid #e8e8e8;">
                                                                    <div class="col s2">
                                                                        <h2 style="margin: 0;margin-top: 0.5em;"><span class="ion-ios-telephone-outline"></span></h2>
                                                                    </div>
                                                                    <div class="col s10">
                                                                        <p class="az-pcontent">Telephone- {!! $contact_dubai->phone_no !!}
                                                                            <br>Fax- {!! $contact_dubai->fax_no !!}</p>
                                                                    </div>
                                                                </div>
                                                                <!-- end -->

                                                                <!-- Email -->
                                                                <div class="col s12 p0" style="border-bottom: 1px solid #e8e8e8;">
                                                                    <div class="col s2">
                                                                        <h2 style="margin: 0;margin-top: 0.5em;"><span class="ion-ios-email-outline"></span></h2>
                                                                    </div>
                                                                    <div class="col s10">
                                                                        <p class="az-pcontent">{!! $contact_dubai->email_id !!}</p>
                                                                    </div>
                                                                </div>
                                                                <!-- end -->

                                                                <!-- Working hours -->
                                                                <div class="col s12 p0" style="border-bottom: 1px solid #e8e8e8;">
                                                                    <div class="col s2">
                                                                        <h2 style="margin: 0;margin-top: 0.5em;"><span class="ion-ios-time-outline"></span></h2>
                                                                    </div>
                                                                    <div class="col s10">
                                                                        <p class="az-pcontent num-fo">Working hours- {!! $contact_dubai->working_hours !!}</p>
                                                                    </div>
                                                                </div>
                                                                <!-- end -->
                                                            </div>
                                                            <div class="col s12 m6">
                                                                <div id="map<?php echo $i; ?>" style="height:221px !important;" height="221" width="542">

                                                                </div>
                                                                <!--<img src="assets/images/map.jpg" class="responsive-img">-->
                                                                <div class="col s12 p0">
                                                                    <a class="az-btn m0 active" style="margin: 35px 0px;" href="https://www.google.co.in/maps/place/API+World+Tower/@25.2252897,55.2814847,17z/data=!4m8!1m2!2m1!1sSuite+No.+902+%2F+904,+API+World+Tower,+Sheikh+Zayed+Road,+Dubai,+UAE!3m4!1s0x3e5f42ee7c67b1dd:0x823df13de82eab67!8m2!3d25.2252897!4d55.2836734?hl=en" target="_blank"><!-- {{trans('words.Get direction')}} -->
                                                                        @if($locale=='en')
                                                                        Get direction
                                                                        @elseif($locale=='ar')
                                                                        احصل على الموقع


                                                                        @endif
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <?php $i++; ?>
                                                @endforeach
                                            </ul>
                                            <!-- End -->
                                        </div>
                                    </li>

                                    <li>
                                        <div class="collapsible-header"><i class="ion-location"></i>
                                            <h5 class="m0" style="font-size: 15px;margin-top: 10px !important;">{{trans('words.International')}}</h5>
                                            <h5 class="contact-arrow-collapse" style="margin: 0;position: absolute;right: 11em; margin-top: 5px;"><span class="ion-ios-arrow-down"></span></h5>
                                        </div>
                                        <div class="collapsible-body">

                                            <!-- Inner -->
                                            <ul class="collapsible" data-collapsible="accordion" style="box-shadow: none;">

                                                @foreach($contacts_internet as $contact_internet)


                                                <input type="hidden" id="addstore<?php echo $i; ?>" value="{!! $contact_internet->address !!}" />

                                                <li>
                                                    <div class="collapsible-header" onclick="loadgooglemap(<?php echo $i; ?>,<?php echo $contact_internet->lat; ?>,<?php echo $contact_internet->lng; ?>)"><i class="ion-location"></i>
                                                        <h5 class="m0" style="font-size: 15px;margin-top: 10px !important;">{!! $contact_internet->address_title !!}</h5>
                                                        <h5 class="contact-arrow-collapse" style="margin: 0;position: absolute;right: 11em; margin-top: 5px;"><span class="ion-ios-arrow-down"></span></h5>
                                                    </div>
                                                    <div class="collapsible-body">
                                                        <div class="row">
                                                            <div class="col s12 m6">
                                                                <!-- Address -->
                                                                <div class="col s12 p0" style="border-bottom: 1px solid #e8e8e8;">
                                                                    <div class="col s2">
                                                                        <h2 style="margin: 0;margin-top: 0.5em;"><span class="ion-ios-paper-outline"></span></h2>
                                                                    </div>
                                                                    <div class="col s10">
                                                                        <p class="az-pcontent">{!! $contact_internet->address !!}</p>
                                                                    </div>
                                                                </div>
                                                                <!-- end -->

                                                                <!-- Contact -->
                                                                <div class="col s12 p0" style="border-bottom: 1px solid #e8e8e8;">
                                                                    <div class="col s2">
                                                                        <h2 style="margin: 0;margin-top: 0.5em;"><span class="ion-ios-telephone-outline"></span></h2>
                                                                    </div>
                                                                    <div class="col s10">
                                                                        <p class="az-pcontent">Telephone- {!! $contact_internet->phone_no !!}
                                                                            <br>Fax- {!! $contact_internet->fax_no !!}</p>
                                                                    </div>
                                                                </div>
                                                                <!-- end -->

                                                                <!-- Email -->
                                                                <div class="col s12 p0" style="border-bottom: 1px solid #e8e8e8;">
                                                                    <div class="col s2">
                                                                        <h2 style="margin: 0;margin-top: 0.5em;"><span class="ion-ios-email-outline"></span></h2>
                                                                    </div>
                                                                    <div class="col s10">
                                                                        <p class="az-pcontent">{!! $contact_internet->email_id !!}</p>
                                                                    </div>
                                                                </div>
                                                                <!-- end -->

                                                                <!-- Working hours -->
                                                                <div class="col s12 p0" style="border-bottom: 1px solid #e8e8e8;">
                                                                    <div class="col s2">
                                                                        <h2 style="margin: 0;margin-top: 0.5em;"><span class="ion-ios-time-outline"></span></h2>
                                                                    </div>
                                                                    <div class="col s10">
                                                                        <p class="az-pcontent num-fo">Working hours- {!! $contact_internet->working_hours !!}</p>
                                                                    </div>
                                                                </div>
                                                                <!-- end -->
                                                            </div>
                                                            <div class="col s12 m6">
                                                                <div id="map<?php echo $i; ?>" style="height:221px !important;" height="221" width="542">

                                                                </div>
                                                                <!--<img src="assets/images/map.jpg" class="responsive-img">-->
                                                                <div class="col s12 p0">
                                                                    <a class="az-btn m0 active" style="margin: 35px 0px;" href="https://www.google.co.in/maps/place/Century+Business+Centre/@13.0314815,80.2495857,17z/data=!3m1!4b1!4m5!3m4!1s0x3a5266341d693651:0x6af011148796d240!8m2!3d13.0314815!4d80.2517744?hl=en" target="_blank"><!-- {{trans('words.Get direction')}} -->
                                                                        @if($locale=='en')
                                                                        Get direction
                                                                        @elseif($locale=='ar')
                                                                        احصل على الموقع


                                                                        @endif
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <?php $i++; ?>
                                                @endforeach
                                            </ul>
                                            <!-- End -->

                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- End -->

                        </div>
                        <!--  End -->

                    </div>
                    <!--Contact Info Container End-->

                    </section>
                    <!-- az-section End -->
                    @stop
                    @section('footer_main_scripts')
                    
                    <script type="text/javascript" src="{{asset('assets/build/js/intlTelInput.js')}}"></script>

                    <script>
                                                        $("select[required]").css({position: "absolute", display: "inline", height: 0, padding: 0, width: 0});
                                                        function validate(evt) {
                                                            var theEvent = evt || window.event;
                                                            var key = theEvent.keyCode || theEvent.which;
                                                            key = String.fromCharCode(key);
                                                            var regex = /[0-9]|\./;
                                                            if (!regex.test(key)) {
                                                                theEvent.returnValue = false;
                                                                if (theEvent.preventDefault)
                                                                    theEvent.preventDefault();
                                                            }
                                                        }


                                                        $("#phone").intlTelInput({
                                                            nationalMode: false,
                                                            preferredCountries: ['ae'],
                                                            utilsScript: "/assets/build/js/utils.js"
                                                        });

                                                        $("#code").intlTelInput({
                                                            nationalMode: false,
                                                            autoHideDialCode: false,
                                                            preferredCountries: ['ae'],
                                                            utilsScript: "/assets/build/js/utils.js"
                                                        });

                                                        $("#area_code").intlTelInput({
                                                            nationalMode: false,
                                                            autoHideDialCode: false,
                                                            preferredCountries: ['ae'],
                                                            utilsScript: "/assets/build/js/utils.js"
                                                        });

                                                        $("#alter_code").intlTelInput({
                                                            nationalMode: false,
                                                            autoHideDialCode: false,
                                                            preferredCountries: ['ae'],
                                                            utilsScript: "/assets/build/js/utils.js"
                                                        });


                    </script>	
                    @stop
                    @section('footer_scripts')
                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD9Wr9zSssUdao0Zxt1Ow4VYgozpT9h1Vg"></script>
                    <script type="text/javascript">
                                                        /* var locations = [
                                                         ['<b>HEAD OFFICE DUBAI</b> <br/><br/> Suite No. 902 / 904, API World Tower, Sheikh Zayed Road, Dubai, UAE', 25.2252897, 55.2814847, 1],
                                                         ['<b>SALES OFFICE DUBAI BUSINESS BAY</b> <br/><br/> Suite No. 3201, Vision Tower, Business Bay, Dubai, UAE', 25.187406, 55.2620113, 2],
                                                         ['<b>SALES OFFICE DUBAI MARINA OFFICE</b> <br/><br/> Office 3401, Marina Plaza, Sheikh Zayed Road, Dubai', 25.0759058, 55.1393641, 3],
                                                         ['<b>SALES OFFICE - SHEIKH ZAYED ROAD</b> <br/><br/> 204, 2nd Floor, opposite FGB Metro Station', 25.1272989, 55.200341, 4],
                                                         ['<b>SALES OFFICE - CONRAD HOTEL</b> <br/><br/> Office 1302, 13th Floor Conrad Sales Office Tower, behind Conrad Hotel, Sheikh Zayed Road', 25.1272989, 55.200341, 5],
                                                         ['<b>SALES OFFICE – INDIA</b> <br/><br/> Liaison Office-India 2nd Floor, Century Centre, New No. 75, Old No. 39, Ttk Road, Alwarpet, Chennai-600018 Tamil Nadu, India', 13.0314815, 80.2495857, 6],
                                                         ['<b>SALES OFFICE - MEYDAN</b> <br/><br/> Meydan Sales Office Nr. Khazana Data Center, Al Ain Road Exit A1:19 Dubai, UAE', 25.1595609, 55.3005939, 7]
                                                         ];*/

                                                        /*var locations = [
                                                         ['<b>DUBAI HEAD OFFICE</b> <br/><br/>  Suite No. 902 / 904, API World Tower, Sheikh Zayed Road, Dubai, UAE',25.2252897,55.2814847,1],
                                                         ['<b>SALES OFFICE - DUBAI BUSINESS BAY</b> <br/><br/>  Suite No. 3201, Vision Tower, Business Bay, Dubai, UAE,25.187406,55.2620113,2],
                                                         ['<b>SALES OFFICE - DUBAI MARINA OFFICE</b> <br/><br/>  Office 3401, Marina Plaza, Sheikh Zayed Road, Dubai,25.0759058,55.1393641,3],
                                                         ['<b>SALES OFFICE - SHEIKH ZAYED ROAD</b> <br/><br/>  204, 2nd Floor, opposite FGB Metro Station,25.1272989,55.200341,4],
                                                         ['<b>SALES OFFICE - CONRAD HOTEL</b> <br/><br/>  Office 1302, 13th Floor Conrad Sales Office Tower, behind Conrad Hotel, Sheikh Zayed Road,25.1272989,55.200341,5],
                                                         ['<b>SALES OFFICE - MEYDAN</b> <br/><br/>  Meydan Sales Office Nr. Khazana Data Center, Al Ain Road Exit A1:19 Dubai, UAE,25.1595609,55.3005939,6]]*/


<?php
$i = 1;
$lo = "";
foreach ($contacts_dubai as $contact_dubai) {
    $lo .= "['<b>" . $contact_dubai->address_title . "</b> <br/><br/>" . $contact_dubai->address . "'," . $contact_dubai->lat . "," . $contact_dubai->lng . "," . $i . "],";
    /* if(count($contacts_dubai)>$i)
      {
      $lo.= ",";
      } */
    $i++;
}
$j = $i;
foreach ($contacts_internet as $contact_internet) {
    $c = count($contacts_internet) + $j;
    $lo .= "['<b>" . $contact_internet->address_title . "</b> <br/><br/>" . $contact_internet->address . "'," . $contact_internet->lat . "," . $contact_internet->lng . "," . $i . "]";
    if ($c > $i) {
        $lo .= ",";
    }
    $i++;
}
?>
                                                        var locations = [
<?php echo $lo; ?>
                                                        ];
                                                        var map = new google.maps.Map(document.getElementById('map'), {
                                                            zoom: 10,
                                                            center: new google.maps.LatLng(25.226218, 55.284469),
                                                            mapTypeId: google.maps.MapTypeId.ROADMAP,
                                                            styles: [
                                                                {
                                                                    "featureType": "administrative",
                                                                    "elementType": "all",
                                                                    "stylers": [
                                                                        {
                                                                            "saturation": "-100"
                                                                        }
                                                                    ]
                                                                },
                                                                {
                                                                    "featureType": "administrative.province",
                                                                    "elementType": "all",
                                                                    "stylers": [
                                                                        {
                                                                            "visibility": "off"
                                                                        }
                                                                    ]
                                                                },
                                                                {
                                                                    "featureType": "landscape",
                                                                    "elementType": "all",
                                                                    "stylers": [
                                                                        {
                                                                            "saturation": -100
                                                                        },
                                                                        {
                                                                            "lightness": 65
                                                                        },
                                                                        {
                                                                            "visibility": "on"
                                                                        }
                                                                    ]
                                                                },
                                                                {
                                                                    "featureType": "poi",
                                                                    "elementType": "all",
                                                                    "stylers": [
                                                                        {
                                                                            "saturation": -100
                                                                        },
                                                                        {
                                                                            "lightness": "50"
                                                                        },
                                                                        {
                                                                            "visibility": "simplified"
                                                                        }
                                                                    ]
                                                                },
                                                                {
                                                                    "featureType": "road",
                                                                    "elementType": "all",
                                                                    "stylers": [
                                                                        {
                                                                            "saturation": "-100"
                                                                        }
                                                                    ]
                                                                },
                                                                {
                                                                    "featureType": "road.highway",
                                                                    "elementType": "all",
                                                                    "stylers": [
                                                                        {
                                                                            "visibility": "simplified"
                                                                        }
                                                                    ]
                                                                },
                                                                {
                                                                    "featureType": "road.arterial",
                                                                    "elementType": "all",
                                                                    "stylers": [
                                                                        {
                                                                            "lightness": "30"
                                                                        }
                                                                    ]
                                                                },
                                                                {
                                                                    "featureType": "road.local",
                                                                    "elementType": "all",
                                                                    "stylers": [
                                                                        {
                                                                            "lightness": "40"
                                                                        }
                                                                    ]
                                                                },
                                                                {
                                                                    "featureType": "transit",
                                                                    "elementType": "all",
                                                                    "stylers": [
                                                                        {
                                                                            "saturation": -100
                                                                        },
                                                                        {
                                                                            "visibility": "simplified"
                                                                        }
                                                                    ]
                                                                },
                                                                {
                                                                    "featureType": "water",
                                                                    "elementType": "geometry",
                                                                    "stylers": [
                                                                        {
                                                                            "hue": "#ffff00"
                                                                        },
                                                                        {
                                                                            "lightness": -25
                                                                        },
                                                                        {
                                                                            "saturation": -97
                                                                        }
                                                                    ]
                                                                },
                                                                {
                                                                    "featureType": "water",
                                                                    "elementType": "labels",
                                                                    "stylers": [
                                                                        {
                                                                            "lightness": -25
                                                                        },
                                                                        {
                                                                            "saturation": -100
                                                                        }
                                                                    ]
                                                                }
                                                            ]
                                                        });

                                                        var infowindow = new google.maps.InfoWindow();
                                                        var marker, i;

                                                        for (i = 0; i < locations.length; i++) {
                                                            marker = new google.maps.Marker({
                                                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                                map: map
                                                            });

                                                            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                                                                return function () {
                                                                    infowindow.setContent(locations[i][0]);
                                                                    infowindow.open(map, marker);
                                                                }
                                                            })(marker, i));
                                                        }
                                                        function loadgooglemap(id, lat, lng)
                                                        {
                                                            var aa = "addstore" + id;
                                                            var address = document.getElementById(aa).value;
                                                            var mapid = "map" + id;

                                                            var locations = [
                                                                [address, lat, lng, id]
                                                            ];
                                                            var map = new google.maps.Map(document.getElementById(mapid), {
                                                                zoom: 12,
                                                                center: new google.maps.LatLng(25.226218, 55.284469),
                                                                mapTypeId: google.maps.MapTypeId.ROADMAP,
                                                                styles: [
                                                                    {
                                                                        "featureType": "administrative",
                                                                        "elementType": "all",
                                                                        "stylers": [
                                                                            {
                                                                                "saturation": "-100"
                                                                            }
                                                                        ]
                                                                    },
                                                                    {
                                                                        "featureType": "administrative.province",
                                                                        "elementType": "all",
                                                                        "stylers": [
                                                                            {
                                                                                "visibility": "off"
                                                                            }
                                                                        ]
                                                                    },
                                                                    {
                                                                        "featureType": "landscape",
                                                                        "elementType": "all",
                                                                        "stylers": [
                                                                            {
                                                                                "saturation": -100
                                                                            },
                                                                            {
                                                                                "lightness": 65
                                                                            },
                                                                            {
                                                                                "visibility": "on"
                                                                            }
                                                                        ]
                                                                    },
                                                                    {
                                                                        "featureType": "poi",
                                                                        "elementType": "all",
                                                                        "stylers": [
                                                                            {
                                                                                "saturation": -100
                                                                            },
                                                                            {
                                                                                "lightness": "50"
                                                                            },
                                                                            {
                                                                                "visibility": "simplified"
                                                                            }
                                                                        ]
                                                                    },
                                                                    {
                                                                        "featureType": "road",
                                                                        "elementType": "all",
                                                                        "stylers": [
                                                                            {
                                                                                "saturation": "-100"
                                                                            }
                                                                        ]
                                                                    },
                                                                    {
                                                                        "featureType": "road.highway",
                                                                        "elementType": "all",
                                                                        "stylers": [
                                                                            {
                                                                                "visibility": "simplified"
                                                                            }
                                                                        ]
                                                                    },
                                                                    {
                                                                        "featureType": "road.arterial",
                                                                        "elementType": "all",
                                                                        "stylers": [
                                                                            {
                                                                                "lightness": "30"
                                                                            }
                                                                        ]
                                                                    },
                                                                    {
                                                                        "featureType": "road.local",
                                                                        "elementType": "all",
                                                                        "stylers": [
                                                                            {
                                                                                "lightness": "40"
                                                                            }
                                                                        ]
                                                                    },
                                                                    {
                                                                        "featureType": "transit",
                                                                        "elementType": "all",
                                                                        "stylers": [
                                                                            {
                                                                                "saturation": -100
                                                                            },
                                                                            {
                                                                                "visibility": "simplified"
                                                                            }
                                                                        ]
                                                                    },
                                                                    {
                                                                        "featureType": "water",
                                                                        "elementType": "geometry",
                                                                        "stylers": [
                                                                            {
                                                                                "hue": "#ffff00"
                                                                            },
                                                                            {
                                                                                "lightness": -25
                                                                            },
                                                                            {
                                                                                "saturation": -97
                                                                            }
                                                                        ]
                                                                    },
                                                                    {
                                                                        "featureType": "water",
                                                                        "elementType": "labels",
                                                                        "stylers": [
                                                                            {
                                                                                "lightness": -25
                                                                            },
                                                                            {
                                                                                "saturation": -100
                                                                            }
                                                                        ]
                                                                    }
                                                                ]
                                                            });

                                                            var infowindow = new google.maps.InfoWindow();
                                                            var marker, i;
                                                            for (i = 0; i < locations.length; i++) {
                                                                marker = new google.maps.Marker({
                                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                                    map: map
                                                                });

                                                                google.maps.event.addListener(marker, 'click', (function (marker, i) {
                                                                    return function () {
                                                                        infowindow.setContent(locations[i][0]);
                                                                        infowindow.open(map, marker);
                                                                    }
                                                                })(marker, i));

                                                                google.maps.event.addListenerOnce(map, 'idle', function () {
                                                                    google.maps.event.trigger(map, 'resize');
                                                                    map.panTo(marker.getPosition());
                                                                });

                                                            }
                                                        }
                    </script>

                    @stop
