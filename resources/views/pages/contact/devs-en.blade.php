@extends('layouts/default')

{{-- page level styles --}}
@section('header_styles')


<link rel="stylesheet" href="{{asset('assets/css/chosen.min.css')}}">

<style>
    .select-dropdown {
        border: none !important;
        border-radius: 0 !important;
        color: #b7b7b7 !important;
        border-bottom: 1px solid #e4e4e4 !important;
    }

    .parallax-container .parallax img {top: auto !important;}
    .book-now .select-wrapper input.select-dropdown {
        border-bottom: none !important;}
    .pay-mob .col.s3 {
        width: 23% !important;
        margin-top: 3px !important;
        padding-left: 1px !important;
    }
    select[name="country"],select[name="department"]{border-color:#fff!important;top: 0;};
    .chosen-container{width:100%!important;}
    .chosen-container-single .chosen-single{background: none!important;border:1px solid #eee!important;height: 40px;border-radius: 0;box-shadow:none!important;padding: 7px 10px;}
    .form-group{margin: 10px 0;}
    .form-control{border: 1px solid #eee!important;padding: 10px!important;width: 95%!important;font-weight: 100;}
    .txt-444{color:#444!important;}
    .txt-888{color:#888;}
    .chosen-single span {color: #b7b7b7; font-weight: 100;}
    .chosen-container-single .chosen-search input[type=text]{width: 92%;}
    .valid{display: none;}
    .invalid{display: inline;}
    .txt-red{color:red}
    #contact .card{padding: 10px;}
</style>
<script>
    if (/Windows/i.test(window.navigator.userAgent) || /iP(od|hone)/i.test(window.navigator.userAgent) || /IEMobile/i.test(window.navigator.userAgent) || /Windows Phone/i.test(window.navigator.userAgent) || /BlackBerry/i.test(window.navigator.userAgent) || /BB10/i.test(window.navigator.userAgent) || /Android.*Mobile/i.test(window.navigator.userAgent)) {
        console.log('Chosen Select Inactive');
        document.write('<style>#country,#country_code,#department{border-color:#eee!important;display:inline-block;}</style>');
    } else {
        //console.log('Chosen Select Active');
        //document.write('<style>#nationality,#country,#country_code{display: inline-block!important; width: .5px; height: .5px; position: absolute; left: 18px; top: 12px; border: 0; padding: 0; margin: 0;}</style>');
    }
</script>
@stop

@section('main_div_wrapper')
@stop
@section('section_content')



<!-- Header -->
<section class="az-section">

    <div class="container">

        <div class="parallax-container valign-wrapper only-heading">
            <div class="parallax">
                @if($content->image!="")
                <img alt="{{ $content->alt }}" src="{{asset('assets/images/banner/')}}/{{ $content->image }}" >
                @else
                <img alt="{{ $content->alt }}" src="http://gr8-homes.com/wp-content/uploads/2017/03/Montrell-Serviced-Apartment-Gallery-1.jpg">
                @endif
            </div>
            <div class="col s12 center-align card tag-pro">
                <h1>{{trans('words.Contact Us')}}</h1>
            </div>

        </div>
        <!--parallax-container end -->

        <div class="row m0">
            <div class="col s12 p0">
                <div class="col s12 p0">
                    <?= generate_breadcrumb([url("$locale") => trans('words.home'), '' => trans('words.Contact Us')]) ?>
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
                    {!! $content->title_en !!}                    
                </h5>
                <div class="divider az-header-divider" style="margin-bottom: 20px;"></div>

                <div class="row">
                    <div class="col s12" style="margin-bottom: 2rem;">
                        <p class="az-pcontent" style="">
                            In line with our commitment to continually improve our customer service, Azizi Developments has launched its new 
                            Customer Care Program. Contact our dedicated team of Care professionals in case of any issue with your Azizi unit:
                        </p>
                        <div class="col s12 m6 p0">
                            <h4 style="font-size: 15px;font-weight: 100">         
                                <span class="ion-ios-telephone" style="font-size: 25px;margin: 0px 10px;"></span> 
                                <span style="font-weight: 500;font-size: 20px;">
                                    <a href="#" class="telephone" data-telephone="97145184555">800 CARES (22737)  </a>
                                </span>
                            </h4>
                        </div>
                        <div class="col s12 m6 p0">
                            <h4 style="font-size: 15px;font-weight: 100">         
                                <span class="ion-ios-email" style="font-size: 25px;margin: 0px 10px;"></span> 
                                <span style="font-weight: 500;font-size: 20px;">
                                    <a href="mailto:customercare@<?= DOMAIN_NAME ?>">customercare@<?= DOMAIN_NAME ?></a>
                                </span>
                            </h4>
                        </div>
                    </div>  
                </div>
            </div>
            <!--Row -->




            <div class="col s12">

                <h5 style="margin-top: 0;margin-bottom: 0;">
                    Get in touch                    
                </h5>
                <div class="divider az-header-divider" style="    margin-bottom: 20px;"></div>
            </div>

            <div class="col s12 m12">
                <p class="az-pcontent" style="    margin: 0px 0px 20px 0px;">
                    {!! $content->short_description_en !!}                    
                </p>
            </div>

            <!--Contact_Number -->
            <div class="col s12 m12" style="margin-bottom:25px;">

                <!--Start -->

                <div class="col s12 p0">

                    <div class="col s12 m6" style="    padding-left: 9px;">

                        <h4 style="font-size: 15px;font-weight: 100">
                            <span class="ion-ios-telephone" style="font-size: 25px;"></span>
                            {{trans('words.Inside the UAE toll free number')}} 
                            <span style="font-weight: 500;font-size: 20px;">
                                <a href="#" class="telephone" data-telephone="80029494">{{trans('words.tollfree_no')}}</a>
                            </span>

                        </h4>

                    </div>

                    <div class="col s12 m6" style="padding-left: 9px;">

                        <h4 style="font-size: 15px;font-weight: 100;">
                            <span class="ion-earth" style="font-size: 25px;"></span>
                            <!--  {{trans('words.International contact number')}} 
                            <span style="font-weight: 500;"><a href="#" class="telephone" data-telephone="97143596673">{{trans('words.intrntaional_contact_no')}}</a> -->

                            International contact number:
                            <span style=" font-size: 20px;font-weight: 500;">
                                <a href="#" class="telephone" data-telephone="97143596673">+971 4 359 6673</a>
                            </span>


                        </h4>

                    </div>

                    <div style="margin-bottom:20px;"></div>
                </div>

                <!-- End -->                            

            </div>
            <!--End-->



            <div class="col s12">
                <!-- Form -->
                <form method="post" action="<?= url($locale . '/Contacts-Sends') ?>" name="contact" id="contact">
                    <div class="card">
                        <div class="row m0">

                            @if(!empty($_GET['msg']))
                                <div style="padding:15px;"><strong style="color:green"><?= $_GET['msg'] ?> <?= !empty($_GET['error-codes']) ? $_GET['error-codes'] : '' ?></strong></div>
                            @endif

                            <div class="col s12 m3 form-group">
                                <input type="text" autocomplete="off" class="autocomplete form-control"  placeholder="{{trans('words.first_name_label')}}" name="first_name" id="fname" pattern="[A-Za-z]{1,15}" title="First name should only contain letters." value="<?=!empty(old('first_name')) ? old('first_name'):''?>">
                            </div>

                            <div class="col s12 m3 form-group">
                                <input type="text" autocomplete="off"  class="autocomplete form-control"  placeholder="{{trans('words.last_name_label')}}" name="last_name"  id="lname" pattern="[A-Za-z]{1,15}" title="Last name should only contain letters." value="<?=!empty(old('last_name')) ? old('last_name'):''?>">
                            </div>

                            <div class="col s12 m3 form-group">
                                <input type="email" class="autocomplete form-control" placeholder="{{trans('words.email_label')}}" name="email" id="email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" value="<?=!empty(old('email')) ? old('email'):''?>">
                            </div>
                            <div class="col s12 m3 form-group">
                                <select name="country" id="country" class="chosen-select txt-888 form-control" >
                                    <option value="">{{trans('words.country_label')}}</option>
                                    <?php
                                    foreach ($countries as $country) {
                                        echo " <option value='{$country->name}' data-code='{$country->code}'>{$country->name}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row m0">
                            <div class="col s12 m3 form-group">
                                <select name="country_code" id="country_code" class="chosen-select txt-888 form-control" >
                                    <option value="">Country Code*</option>
                                    <?php
                                    foreach ($country_codes as $country) {
                                        $selected = $country->code == '+971' ? 'selected' : '';
                                        echo " <option value='{$country->code}' $selected>{$country->code} ({$country->name})</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col s12 m3 form-group">
                                <input type="text" autocomplete="off"  onkeypress='validate(event)'   class="autocomplete form-control"  maxlength="10" placeholder="Phone Number" pattern="\d*" name="mobile_no" id="phone"  title="Mobile number should only contain digit." value="<?=!empty(old('mobile_no'))? old('mobile_no'):''?>">
                            </div>

                            <div class="col s12 m3 form-group">
                                <select name="department" id="department" class="chosen-select txt-888 form-control" >
                                    <option value="">{{trans('words.Select Department *')}}</option>
                                    <option value="5">{{trans('words.Sales')}}</option>
                                    <option value="3">{{trans('words.Customer Service')}}</option>
                                    <option value="2">{{trans('words.Marketing')}}</option>
                                    <option value="1">{{trans('words.Corporate Communication')}}</option>
                                    <!--<option value="4">{{trans('words.Legal')}}</option>-->
                                    <!-- <option value="1">General</option> -->
                                </select>
                            </div>
                        </div>
                        <div class="row m0">
                            <div class="col s12 m12 form-group">
                                <textarea  placeholder="{{trans('words.Message *')}}" class="materialize-textarea form-control" name="comment" id="message" ><?=!empty(old('comment'))? old('comment'):''?></textarea>
                            </div>
                            <div class="col s12 m12">
                                <small  class="txt-red valid" id='msg-fname'>Please enter first name.</small>
                                <small  class="txt-red valid" id='msg-lname'>Please enter last name.</small>
                                <small  class="txt-red valid" id='msg-email'>Please enter email address.</small>
                                <small  class="txt-red valid" id='msg-country'>Please select your country.</small>
                                <small  class="txt-red valid" id='msg-country_code'>Please select country code.</small>
                                <small  class="txt-red valid" id='msg-phone'>Please enter phone number.</small>
                                <small  class="txt-red valid" id='msg-department'>Please select department.</small>
                                <small  class="txt-red valid" id='msg-message'>Please write message.</small>
                            </div>
                            <div class="col s12 m12 form-group">
                                <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
                                <input type="hidden" name="action" value="validate_captcha">
                                <input type="hidden" class="form-control lead_source"  name="source" value="Website">
                                <input type="hidden" class="form-control lead_campaign"  name="campaign" value="">
                                <input type="hidden" class="form-control lead_url" name="url" value="">
                                <input type="hidden" class="form-control lead_medium"  name="medium" value="">
                                <input type="hidden" class="form-control lead_content"  name="content" value="">
                                <input type="hidden" class="form-control lead_term" name="term" value="">
                                
                            </div>
                            <div class="col s12 m12 form-group">
                                 <!--  <input type="submit" class="inquire az-btn active" style="margin: 35px 0px;" value="submit"> -->
                                <input type="submit" class="inquire az-btn active" value="submit" style="margin: 0 0 20px;">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <input type="hidden" id="frm" name="frm" value="contact" />
                                <!--<a class="inquire az-btn active" style="margin: 35px 0px;">Submit</a>-->
                            </div>
                        </div>
                    </div>
                </form>
                <!-- end -->
            </div>

            <br/><br/>
            <div class="col s12" style="margin-top: 3rem;">
                <h5 style="margin-top: 0;margin-bottom: 0;">Azizi Developments Offices</h5>               
                <div class="divider az-header-divider" style="    margin-bottom: 20px;"></div>
                <!-- Contact Addresses -->
                <div class="col s12 p0">
                    <ul class="collapsible" data-collapsible="accordion">

                        <li>
                            <div class="collapsible-header"><i class="ion-location"></i>
                                <!--  <h5 class="m0" style="font-size: 15px;margin-top: 10px !important;">{{trans('words.UAE')}}</h5> -->
                                <h5 class="m0" style="font-size: 15px;margin-top: 10px !important;">UAE</h5>                               
                                <h5 class="contact-arrow-collapse" style="margin: 0;position: absolute;right: 11em; margin-top: 5px;"><span class="ion-ios-arrow-down"></span></h5>
                            </div>
                            <div class="collapsible-body">

                                <!-- Inner -->
                                <ul class="collapsible" data-collapsible="accordion" style="box-shadow: none;">
                                    <?php $i = 1; ?>
                                    @foreach($contacts_dubai as $contact_dubai)
                                    <input type="hidden" id="addstore<?php echo $i; ?>" value="{!! $contact_dubai->address !!}" />
                                    <li>
                                        <div class="collapsible-header" onclick="loadgooglemap(<?php echo $i; ?>,<?php echo $contact_dubai->lat; ?>,<?php echo $contact_dubai->lng; ?>)" id="abc"><i class="ion-location"></i>
                                            <h5 class="m0" style="font-size: 15px;margin-top: 10px !important;">
                                                {!! $contact_dubai->address_title !!}                                                
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
                                                                {!! $contact_dubai->address !!}
                                                            </p>
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
                                                                {!! $contact_dubai->working_hours !!}                                                                
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <!-- end -->
                                                </div>
                                                <div class="col s12 m6">
                                                    <div id="map<?php echo $i; ?>" style="height:221px !important;" height="221" width="542">

                                                    </div>
                                                    <div class="col s12 p0">
                                                        <a class="az-btn m0 active" style="margin: 35px 0px;" href="https://www.google.co.in/maps/place/API+World+Tower/@25.2252897,55.2814847,17z/data=!4m8!1m2!2m1!1sSuite+No.+902+%2F+904,+API+World+Tower,+Sheikh+Zayed+Road,+Dubai,+UAE!3m4!1s0x3e5f42ee7c67b1dd:0x823df13de82eab67!8m2!3d25.2252897!4d55.2836734?hl=en" target="_blank"><!-- {{trans('words.Get direction')}} -->
                                                            Get directions                                                           
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
                                            {!! $contact_internet->address_title !!}
                                            </h5>
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
                                                                {!! $contact_internet->address !!}
                                                                </p>
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
                                                                {!! $contact_internet->working_hours !!}
                                                                </p>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="col s12 m6">
                                                    <div id="map<?php echo $i; ?>" style="height:221px !important;" height="221" width="542">
                                                    
                                                    </div>
                                                    
                                                    <div class="col s12 p0">
                                                        <a class="az-btn m0 active" style="margin: 35px 0px;" href="https://www.google.co.in/maps/place/Century+Business+Centre/@13.0314815,80.2495857,17z/data=!3m1!4b1!4m5!3m4!1s0x3a5266341d693651:0x6af011148796d240!8m2!3d13.0314815!4d80.2517744?hl=en" target="_blank">
                                                    Get directions
                                                    
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

                        </div>
                    </div>

                </div>

            </div>

        </div>
        <!--row end contact Info-->

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
                                                <div class="col s12 p0">
                                                    <a class="az-btn m0 active" style="margin: 35px 0px;" href="https://www.google.co.in/maps/place/API+World+Tower/@25.2252897,55.2814847,17z/data=!4m8!1m2!2m1!1sSuite+No.+902+%2F+904,+API+World+Tower,+Sheikh+Zayed+Road,+Dubai,+UAE!3m4!1s0x3e5f42ee7c67b1dd:0x823df13de82eab67!8m2!3d25.2252897!4d55.2836734?hl=en" target="_blank"><!-- {{trans('words.Get direction')}} -->
                                                        Get directions                                                       
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
                                                <div class="col s12 p0">
                                                    <a class="az-btn m0 active" style="margin: 35px 0px;" href="https://www.google.co.in/maps/place/Century+Business+Centre/@13.0314815,80.2495857,17z/data=!3m1!4b1!4m5!3m4!1s0x3a5266341d693651:0x6af011148796d240!8m2!3d13.0314815!4d80.2517744?hl=en" target="_blank"><!-- {{trans('words.Get direction')}} -->
                                                        Get directions                                                        
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


@stop
@section('footer_scripts')
<script src="<?= asset('assets/js/chosen.jquery.min.js') ?>"></script>
<script src="https://www.google.com/recaptcha/api.js?render=6LdRBpkUAAAAAKaRIKEKbbspNqp_joj6_-epmRk0"></script>
<script>

                                        grecaptcha.ready(function () {
                                            grecaptcha.execute('6LdRBpkUAAAAAKaRIKEKbbspNqp_joj6_-epmRk0', {action: 'validate_captcha'}).then(function (token) {
                                                document.getElementById('g-recaptcha-response').value = token;

                                            });
                                        });

                                        $('.chosen-select').chosen();

                                        $('#fname,#lname,#email,#country,#country_code,#phone,#department,#message').on('keyup change', function () {
                                            inputValid('fname'), inputValid('lname'), inputValid('email'), selectValid('country_code');
                                            inputValid('country'), inputValid('phone'), selectValid('department'), inputValid('message');
                                        });

                                        $('#contact').on('submit', function () {
                                            if (inputInvalid('fname') || inputInvalid('lname') || inputInvalid('email') || selectInalid('country_code') ||
                                                    inputInvalid('phone') || selectInalid('department') || selectInalid('country') || inputInvalid('message')) {
                                                return false;
                                            }
                                            $('input[type=submit]').val('Sending...').prop("disabled", true);
                                        });

                                        function inputValid(id) {
                                            if ($('#' + id).val() !== '') {
                                                $('#msg-' + id).removeClass('invalid').addClass('valid');
                                            }
                                        }
                                        function selectValid(id) {
                                            if ($('#' + id).val() !== '') {
                                                $('#msg-' + id).removeClass('invalid').addClass('valid');
                                                $('#' + id + '_chosen .chosen-single span').addClass('txt-444');
                                                $('#' + id).addClass('txt-444').removeClass('txt-888');
                                            }
                                        }

                                        function inputInvalid(id) {
                                            if ($('#' + id).val() === '') {
                                                $('#msg-' + id).addClass('invalid');
                                                return true;
                                            }
                                        }
                                        function selectInalid(id) {
                                            if ($('#' + id).val() === '') {
                                                $('#msg-' + id).addClass('invalid');
                                                $('#' + id + '_chosen .chosen-single span').removeClass('txt-444');
                                                $('#' + id).removeClass('txt-444').addClass('txt-888');
                                                return true;
                                            }
                                        }


</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD9Wr9zSssUdao0Zxt1Ow4VYgozpT9h1Vg"></script>

<?php
$i = 1;
$lo = "";
foreach ($contacts_dubai as $contact_dubai) {
    $lo .= trim(preg_replace('/\s\s+/', ' ', "['<b>" . $contact_dubai->address_title . "</b> <br/><br/>" . $contact_dubai->address . "'," . $contact_dubai->lat . "," . $contact_dubai->lng . "," . $i . "],\n"));
    /* if(count($contacts_dubai)>$i)
      {
      $lo.= ",";
      } */
    $i++;
}
$j = $i;
foreach ($contacts_internet as $contact_internet) {
    $c = count($contacts_internet) + $j;
    $lo .= trim(preg_replace('/\s\s+/', ' ', "['<b>" . $contact_internet->address_title . "</b> <br/><br/>" . $contact_internet->address . "'," . $contact_internet->lat . "," . $contact_internet->lng . "," . $i . "]\n"));
    if ($c > $i) {
        $lo .= ",";
    }
    $i++;
}
?>
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



                                        var locations = [<?php echo $lo; ?>];
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
                                            console.log(locations[i]);
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
                                        sessionStorage.setItem("utm_source", 'Website');
                                        sessionStorage.setItem("utm_campaign", 'Others');

</script>

@stop
