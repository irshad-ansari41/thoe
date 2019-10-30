@extends('layouts/default')

{{-- page level styles --}}
@section('header_styles')
<link rel="stylesheet" href="./build/css/intlTelInput.css">
<link rel="stylesheet" href="./build/css/demo.css">
<style>.modal-overlay {opacity: 0.9 !important;z-index: 999 !important;}
    .book-now .select-wrapper input.select-dropdown {
        position: relative;
        cursor: pointer;
        background-color: transparent;
        border: none !important;
        border-bottom: 1px solid #9e9e9e;
        outline: none;
        height: auto;
        line-height: inherit;
    }
    .col.s12.m4 .az-btn.active, .az-btn:hover {
        background: #000;
        color: #fff;
        border-color: #000;
        min-width: 100% !important;
    }
</style>
@stop

@section('main_div_wrapper')
@stop
@section('section_content')



@if($locale=='en')
<style>
    .row .col {
        float: left !important;
    }
</style>
@elseif($locale=='ar')
<style>
    .row .col {
        float: right !important;
    }
    form p {
        margin-bottom: 10px;
        text-align: right;
    }
</style>
@elseif($locale=='cn')
<style>
    .row .col {
        float: left !important;
    }
</style>
@endif


<!-- Header -->
<section class="az-section">

    <div class="container">
        <div class="parallax-container valign-wrapper">
            <div class="parallax">
                @if($content->image!="")
                <img alt="{{ $content->alt }}" src="{{ asset('assets/images/banner/') }}/{{ $content->image }}" >
                @endif
            </div>
        </div>
        <div class="row m0">
            <div class="col s12 p0">
                <div class="col s12 p0">
                    <ul>
                        <li>
                            @if($locale=='en')
                            <span class="ion-ios-arrow-left" style=""></span>
                            @endif

                            @if($locale=='en')
                            <a href="{{ url("/")}}/<?php echo $locale ?>" style="color: #5a5a5a;">{{trans('words.home')}} / </a>

                            @elseif($locale=='ar')
                            <a href="{{ url("/")}}/<?php echo $locale ?>" style="color: #5a5a5a;">{{trans('words.home')}} / </a>

                            @elseif($locale=='cn')

                            <a href="{{ url("/")}}/<?php echo $locale ?>" style="color: #5a5a5a;">主页 / </a>


                            @endif


                            <a style="font-weight: 600;">
                                @if($locale=='en')
                                {!! $content->title_en !!}
                                @elseif($locale=='ar')
                                {!! $content->title_ar !!}
                                @elseif($locale=='cn')
                                {!! $content->title_ch !!}
                                @endif</a>
                            @if($locale=='ar')
                            <span class="ion-ios-arrow-left" style=""></span>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="container">
        <div class="row">
            @if($locale=='en'|| $locale=='ar') 
            <div class="col s12 m12" style="padding-bottom:70px;">
                <h5 class="m0">
                    @if($locale=='en')
                    E-SERVICES
                    @elseif($locale=='ar')
                    الخدمات الإلكترونية
                    @elseif($locale=='cn')
                    
                    @endif
                </h5>
                <div class="divider az-header-divider"></div>
                <p class="az-pcontent">   
                    @if($locale=='en')
                        Are you a real estate agent operating out of the UAE? Sign up to know all about our projects and offers.
                    @elseif($locale=='ar')
                    هل أنت وكيل عقاري من خارج الإمارات العربية المتحدة؟ سجل دخولك للتعرف على عروضنا ومشاريعنا   .
                    @elseif($locale=='cn')
                    
                    @endif</p>
                <p></p>
                <p></p>
            </div>
            <!--E-Service end-->
            @endif
            

            
            <div class="col s12 m3">
                <h5 class="m0">
                    @if($locale=='en')
                    {!! $content->title_en !!}
                    @elseif($locale=='ar')
                    {!! $content->title_ar !!}
                    @elseif($locale=='cn')
                    {!! $content->title_ch !!}
                    @endif
                </h5>
                <!--div class="divider az-header-divider"></div-->
                <p class="az-pcontent">   
                    @if($locale=='en')
                    {!! $content->short_description_en !!}
                    @elseif($locale=='ar')
                    {!! $content->short_description_ar !!}
                    @elseif($locale=='cn')
                    {!! $content->short_description_ch !!}
                    @endif</p>
            </div>
            <div class="col s12 m9">
                <div class="col s12 m9 offset-m1">
                    <form method="post" action="{{route('agent-login')}}" name="login" autocomplete="off">
                        @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-dismissable margin5">
                            <strong>Error:</strong> {{ $message }}
                        </div>
                        @endif

                        @if ($message = Session::get('success'))
                        <div class="alert alert-danger alert-dismissable margin5">
                            <strong>Success:</strong> {{ $message }}
                        </div>
                        @endif
                        <div class="col s12">
                            <p class="az-pcontent">{{trans('words.login_cradential_string')}}</p>
                        </div>
                        <div class="col s12 m4">
                            <div class="input-field col s12" style="border: 1px solid #e4e4e4;border-radius: 2px;">
                                <div class="col s12">
                                    <input name="email" type="text" id="autocomplete-input" class="autocomplete" style="border-bottom: none;margin-bottom: 0;font-size: 15px;letter-spacing: 1px;font-weight: 100;height: 35px;" placeholder="{{trans('words.email_label')}}" autocomplete="false" required="">
                                </div>
                            </div>
                        </div>

                        <div class="col s12 m4">
                            <div class="input-field col s12" style="border: 1px solid #e4e4e4;border-radius: 2px;">
                                <div class="col s12">
                                    <input name="password" type="password" id="autocomplete-input" class="autocomplete" style="border-bottom: none;margin-bottom: 0;font-size: 15px;letter-spacing: 1px;font-weight: 100;height: 35px;" placeholder="{{trans('words.password_label')}}" required="">
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m4">
                            <input type="submit" class="inquire az-btn active" style="margin-left: 0px;" value="{{trans('words.Login')}}">
                            <!--<a href="agentdashboard.php" class="inquire az-btn active" style="margin-left: 0px;">Login</a>-->
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />


                        <div class="col s12" style="margin-bottom: 2rem">
                            <p class="az-pcontent">{{trans('words.do_you_want_to_register')}}</p>
                            <a href="#register-with-us" class="az-btn active modal-trigger" style="margin-left: 0;">
                                @if($locale=='en')
                                {{ trans('words.register')}}
                                @elseif($locale=='cn')
                                注册
                                @elseif($locale=='ar')
                                {{ trans('words.register')}}
                                @endif
                            </a>
                        </div>
                        <input type="hidden" name="type" value="1">
                    </form>


                    <!-- Registration Pop Up -->
                    <!-- <a class="waves-effect waves-light btn modal-trigger" href="#register-with-us">Register</a> -->

                    <div id="register-with-us" class="modal" style="max-height: 100%;">
                        <div class="modal-content book-now" id="msgp" style="display:none;">
                            <div class="row">
                                <div class="col s12" style="padding: 0px 65px;">

                                    @if($locale=='en')
                                    <h4 class="modal-action modal-close right-align" style="position: absolute;right: 2rem;color: #d0d0d0;"><span class="ion-ios-close-outline"></span></h4>
                                    @endif
                                    @if($locale=='ar')
                                    <h4 class="modal-action modal-close left-align" style="position: absolute;left: 2rem;color: #d0d0d0;"><span class="ion-ios-close-outline"></span></h4>
                                    @endif


                                    <!-- <h5 class="m0">Thank you</h5>
                                    <div class="divider az-header-divider"></div>
                                    <p class="az-pcontent">Your account has been created successfully. Please wait for admin approval. You can login after admin approval</p> -->

                                    <h4 style="margin-top: 10rem;">{{ trans('words.thank_you_for_submit_app')}}</h4>
                                    <p style="margin-bottom: 7rem;">{{ trans('words.register_description')}}</p>

                                </div>
                            </div>
                        </div>

                        <div class="modal-content book-now" id="errorp" style="display:none;">
                            <div class="row">
                                <div class="col s12">
                                    <h4 class="modal-action modal-close right-align" style="position: absolute;right: 2rem;color: #d0d0d0;"><span class="ion-ios-close-outline"></span></h4>
                                    <h5 class="m0">{{ trans('words.sorry')}}</h5>
                                    <div class="divider az-header-divider"></div>
                                    <p class="az-pcontent">{{ trans('words.email_exist')}}</p>
                                </div>
                            </div>
                        </div>

                        <div class="modal-content book-now" id="formp">

                            <div class="row">
                                <div class="col s12">
                                  <!--  <h4 class="modal-action modal-close right-align" style="position: absolute;right: 2rem;color: #d0d0d0;"><span class="ion-ios-close-outline"></span></h4> -->
                                    @if($locale=='en')
                                    <h4 class="modal-action modal-close right-align" style="position: absolute;right: 2rem;color: #d0d0d0;"><span class="ion-ios-close-outline"></span></h4>
                                    @endif
                                    @if($locale=='ar')
                                    <h4 class="modal-action modal-close left-align" style="position: absolute;left: 2rem;color: #d0d0d0;"><span class="ion-ios-close-outline"></span></h4>
                                    @endif
                                    <h5 class="m0">{{trans('words.agent_regstration_label')}}</h5>
                                    <div class="divider az-header-divider"></div>
                                    <p class="az-pcontent">{{trans('words.agent_regstration_description')}}</p>
                                    <div>
                                        <p id="f_name_error" style="color:red; display:none;margin-top:0px;margin-bottom:0px;">{{trans('words.firstname_validation_msg')}}</p>
                                        <p id="l_name_error" style="color:red; display:none;margin-top:0px;margin-bottom:0px;">{{trans('words.lastname_validation_msg')}}</p>
                                        <p id="c_number_error" style="color:red; display:none;margin-top:0px;margin-bottom:0px;">{{trans('words.contact_no_validation_msg')}}</p>
                                        <p id="email_error" style="color:red; display:none;margin-top:0px;margin-bottom:0px;">{{trans('words.email_address_validation_msg')}}</p>
                                        <p id="company_name_error" style="color:red; display:none;margin-top:0px;margin-bottom:0px;">{{trans('words.company_validation_msg')}}</p>
                                        <p id="country_error" style="color:red; display:none;margin-top:0px;margin-bottom:0px;">{{trans('words.country_validation_msg')}}</p>
                                    </div>
                                </div>
                            </div>

                            <form method="post" action="{{route('agent-register')}}" name="register" id="registerform"> 
                                <div class="row">
                                    <div class="col s12 m6">
                                        <div class="input-field col s12">
                                            <div class="col s12">
                                                <input type="text" id="first_name" class="autocomplete" style="border-bottom: none;margin-bottom: 0;font-size: 15px;letter-spacing: 1px;font-weight: 100;" placeholder="{{trans('words.first_name_placeholder')}}"  name="first_name" required> 
                                                <label class="active">{{trans('words.first_name_label')}}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col s12 m6">
                                        <div class="input-field col s12">
                                            <div class="col s12">
                                                <input type="text" id="last" class="autocomplete" style="border-bottom: none;margin-bottom: 0;font-size: 15px;letter-spacing: 1px;font-weight: 100;" placeholder="{{trans('words.last_name_placeholder')}}"  name="last_name" required> 
                                                <label class="active">{{trans('words.last_name_label')}}</label>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- <div class="col s12 m6">
                                        <div class="input-field col s12">
                                            <div class="col s6">
                                                <input type="text" id="phone" class="autocomplete" style="border-bottom: none;margin-bottom: 0;font-size: 15px;letter-spacing: 1px;font-weight: 100;" placeholder="Enter your contact number"  name="contact_no" required>
                                                <label class="active" >Contact Number*</label>
                                            </div>
                                        </div>
                                    </div> -->


                                    <div class="col s12 p0">

                                        <!-- Contact Number -->
                                        <div class="col s12 m6 pay-mob">
                                            <div class="input-field col s12" style="border: 1px solid #e4e4e4;border-radius: 2px;    float: left !important;">
                                                <div class="col s3 m2" style="float: left !important;">
                                                    <input type="text" id="phone" name="code" class="autocomplete" style="border-bottom: none;margin-bottom: 0;font-size: 15px;letter-spacing: 1px;font-weight: 100;" value="+971" required maxlength="4" >
                                                </div>
                                                <div class="col s9 m10" style="border-left: 1px solid #e6e6e6;padding-right: 0;    float: left !important;">
                                                    <input id="phone-num" type="number" class="autocomplete" style="border-bottom: none;margin-bottom: 0;font-size: 15px;letter-spacing: 1px;font-weight: 100;" maxlength="10" placeholder="" name="mobile_no" required >
                                                    <label>{{trans('words.contact_no_label')}}</label>
                                                </div>
                                            </div>
                                        </div>
                                        <!--  -->






                                        <div class="col s12 m6">
                                            <div class="input-field col s12">
                                                <div class="col s12">
                                                    <input type="text" id="email" class="autocomplete" style="border-bottom: none;margin-bottom: 0;font-size: 15px;letter-spacing: 1px;font-weight: 100;" placeholder="{{trans('words.email_plcaholder')}}"  name="email" required>
                                                    <label class="active">{{trans('words.email_label')}}</label>
                                                    <input type="hidden"  name="password" value="P@ssword">

                                                </div>
                                            </div>
                                        </div>

                                    </div>



                                    <div class="col s12 m6">
                                        <div class="input-field col s12">
                                            <div class="col s12">
                                                <input type="text" id="company" class="autocomplete" style="border-bottom: none;margin-bottom: 0;font-size: 15px;letter-spacing: 1px;font-weight: 100;" placeholder="{{trans('words.company_plcaholder')}}"  name="company" required>
                                                <label class="active">{{trans('words.company_label')}}</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col s12 m6 book-now">
                                        <div class="input-field col s12" style="border: 1px solid #e4e4e4;border-radius: 2px;">
                                            <select name="country" required id="country_name">
                                                <option value="" selected>{{trans('words.country_label')}}</option>
                                                <option value="Afghanistan">{{trans('words.afghanistan')}}</option>
                                                <option value="Aland Islands">{{trans('words.aland_island')}}</option>
                                                <option value="Albania">{{trans('words.albania')}}</option>
                                                <option value="Algeria">{{trans('words.algeria')}}</option>
                                                <option value="American Samoa">{{trans('words.american_samoa')}}</option>
                                                <option value="Andorra">{{trans('words.andorra')}}</option>
                                                <option value="Angola">{{trans('words.angola')}}</option>
                                                <option value="Anguilla">{{trans('words.anguilla')}}</option>
                                                <option value="Antarctica">{{trans('words.antarctica')}}</option>
                                                <option value="Antigua and Barbuda">{{trans('words.antigua_and_barbuda')}}</option>
                                                <option value="Argentina">{{trans('words.argentina')}}</option>
                                                <option value="Armenia">{{trans('words.armenia')}}</option>
                                                <option value="Aruba">{{trans('words.aruba')}}</option>
                                                <option value="Australia">{{trans('words.australia')}}</option>
                                                <option value="Austria">{{trans('words.austria')}}</option>
                                                <option value="Azerbaijan">{{trans('words.azerbaijan')}}</option>
                                                <option value="Bahamas">{{trans('words.Bahamas')}}</option>

                                                <option value="Bahrain">{{trans('words.Bahrain')}}</option>
                                                <option value="Bangladesh">{{trans('words.Bangladesh')}}</option>
                                                <option value="Barbados">{{trans('words.Barbados')}}</option>
                                                <option value="Belarus">{{trans('words.Belarus')}}</option>
                                                <option value="Belgium">{{trans('words.Belgium')}}</option>
                                                <option value="Belize">{{trans('words.Belize')}}</option>
                                                <option value="Benin">{{trans('words.Benin')}}</option>
                                                <option value="Bermuda">{{trans('words.Bermuda')}}</option>
                                                <option value="Bhutan">{{trans('words.Bhutan')}}</option>
                                                <option value="Bolivia">{{trans('words.Bolivia')}}</option>
                                                <option value="Bosnia and Herzegovina">{{trans('words.Bosnia and Herzegovina')}}</option>
                                                <option value="Botswana">{{trans('words.Botswana')}}</option>
                                                <option value="Bouvet Island">{{trans('words.Bouvet Island')}}</option>
                                                <option value="Brazil">{{trans('words.Brazil')}}</option>
                                                <option value="British Virgin Islands">{{trans('words.British Virgin Islands')}}</option>
                                                <option value="British Indian Ocean Territory">{{trans('words.British Indian Ocean Territory')}}</option>

                                                <option value="Brunei Darussalam">{{trans('words.Brunei Darussalam')}}</option>
                                                <option value="Bulgaria">{{trans('words.Bulgaria')}}</option>
                                                <option value="Burkina Faso">{{trans('words.Burkina Faso')}}</option>
                                                <option value="Burundi">{{trans('words.Burundi')}}</option>
                                                <option value="Cambodia">{{trans('words.Cambodia')}}</option>
                                                <option value="Cameroon">{{trans('words.Cameroon')}}</option>
                                                <option value="Canada">{{trans('words.Canada')}} </option>
                                                <option value="Cape Verde">{{trans('words.Cape Verde')}}</option>
                                                <option value="Cayman Islands">{{trans('words.Cayman Islands')}} </option>
                                                <option value="Central African Republic">{{trans('words.Central African Republic')}}</option>
                                                <option value="Chad">{{trans('words.Chad')}}</option>
                                                <option value="Chile">{{trans('words.Chile')}}</option>
                                                <option value="China">{{trans('words.China')}}</option>
                                                <option value="Hong Kong, SAR China">{{trans('words.Hong Kong, SAR China')}}</option>
                                                <option value="Macao, SAR China">{{trans('words.Macao, SAR China')}}</option>
                                                <option value="Christmas Island">{{trans('words.Christmas Island')}}</option>
                                                <option value="Cocos (Keeling) Islands">{{trans('words.Cocos (Keeling) Islands')}}</option>
                                                <option value="Colombia">{{trans('words.Colombia')}}</option>
                                                <option value="Comoros">{{trans('words.Comoros')}}</option>
                                                <option value="Congo (Brazzaville)">{{trans('words.Congo (Brazzaville)')}} </option>
                                                <option value="Congo, (Kinshasa)">{{trans('words.Congo, (Kinshasa)')}}</option>
                                                <option value="Cook Islands">{{trans('words.Cook Islands')}} </option>
                                                <option value="Costa Rica">{{trans('words.Costa Rica')}}</option>
                                                <option value="Côte d'Ivoire">{{trans('words.Côte d\'Ivoire')}}</option>
                                                <option value="Croatia">{{trans('words.Croatia')}}</option>
                                                <option value="Cuba">{{trans('words.Cuba')}}</option>
                                                <option value="Cyprus">{{trans('words.Cyprus')}}</option>
                                                <option value="Czech Republic">{{trans('words.Czech Republic')}}</option>

                                                <option value="Denmark">{{trans('words.Denmark')}}</option>
                                                <option value="Djibouti">{{trans('words.Djibouti')}}</option>
                                                <option value="Dominica">{{trans('words.Dominica')}}</option>
                                                <option value="Dominican Republic">{{trans('words.Dominican Republic')}}</option>
                                                <option value="Ecuador">{{trans('words.Ecuador')}}</option>
                                                <option value="Egypt">{{trans('words.Egypt')}}</option>
                                                <option value="El Salvador">{{trans('words.El Salvador')}}</option>
                                                <option value="Equatorial Guinea">{{trans('words.Equatorial Guinea')}}</option>
                                                <option value="Eritrea">{{trans('words.Eritrea')}}</option>
                                                <option value="Estonia">{{trans('words.Estonia')}}</option>
                                                <option value="Ethiopia">{{trans('words.Ethiopia')}}</option>
                                                <option value="Falkland Islands (Malvinas)">{{trans('words.Falkland Islands (Malvinas)')}}  </option>
                                                <option value="Faroe Islands">{{trans('words.Faroe Islands')}}</option>
                                                <option value="Fiji">{{trans('words.Fiji')}}</option>
                                                <option value="Finland">{{trans('words.Finland')}}</option>
                                                <option value="France">{{trans('words.France')}}</option>
                                                <option value="French Guiana">{{trans('words.French Guiana')}}</option>
                                                <option value="French Polynesia">{{trans('words.French Polynesia')}}</option>
                                                <option value="French Southern Territories">{{trans('words.French Southern Territories')}} </option>
                                                <option value="Gabon">{{trans('words.Gabon')}}</option>
                                                <option value="Gambia">{{trans('words.Gambia')}}</option>
                                                <option value="Georgia">{{trans('words.Georgia')}}</option>
                                                <option value="Germany">{{trans('words.Germany')}} </option>
                                                <option value="Ghana">{{trans('words.Ghana')}}</option>
                                                <option value="Gibraltar">{{trans('words.Gibraltar')}} </option>
                                                <option value="Greece">{{trans('words.Greece')}}</option>
                                                <option value="Greenland">{{trans('words.Greenland')}}</option>
                                                <option value="Grenada">{{trans('words.Grenada')}}</option>
                                                <option value="Guadeloupe">{{trans('words.Guadeloupe')}}</option>
                                                <option value="Guam">{{trans('words.Guam')}}</option>
                                                <option value="Guatemala">{{trans('words.Guatemala')}}</option>
                                                <option value="Guernsey">{{trans('words.Guernsey')}}</option>
                                                <option value="Guinea">{{trans('words.Guinea')}}</option>
                                                <option value="Guinea-Bissau">{{trans('words.Guinea-Bissau')}}</option>
                                                <option value="Guyana">{{trans('words.Guyana')}}</option>
                                                <option value="Haiti">{{trans('words.Haiti')}}</option>
                                                <option value="Heard and Mcdonald Islands">{{trans('words.Heard and Mcdonald Islands')}}</option>
                                                <option value="Holy See (Vatican City State)">{{trans('words.Holy See (Vatican City State)')}}</option>
                                                <option value="Honduras">{{trans('words.Honduras')}}</option>
                                                <option value="Hungary">{{trans('words.Hungary')}}</option>
                                                <option value="Iceland">{{trans('words.Iceland')}}</option>
                                                <option value="India">{{trans('words.India')}}</option>
                                                <option value="Indonesia">{{trans('words.Indonesia')}}</option>
                                                <option value="Iran, Islamic Republic of">{{trans('words.Iran, Islamic Republic of')}}</option>
                                                <option value="Iraq">{{trans('words.Iraq')}}</option>
                                                <option value="Ireland">{{trans('words.Ireland')}}</option>
                                                <option value="Isle of Man">{{trans('words.Isle of Man')}} </option>
                                                <option value="Israel">{{trans('words.Israel')}} </option>
                                                <option value="Italy">{{trans('words.Italy')}} </option>

                                                <option value="Jamaica">{{trans('words.Jamaica')}}</option>
                                                <option value="Japan">{{trans('words.Japan')}}</option>
                                                <option value="Jersey">{{trans('words.Jersey')}}</option>
                                                <option value="Jordan">{{trans('words.Jordan')}}</option>
                                                <option value="Kazakhstan">{{trans('words.Kazakhstan')}}</option>
                                                <option value="Kenya">{{trans('words.Kenya')}}</option>
                                                <option value="Kiribati">{{trans('words.Kiribati')}}</option>
                                                <option value="Korea (North)">{{trans('words.Korea (North)')}}</option>
                                                <option value="Korea (North)">{{trans('words.Korea (South)')}}</option>
                                                <option value="Kuwait">{{trans('words.Kuwait')}}</option>
                                                <option value="Kyrgyzstan">{{trans('words.Kyrgyzstan')}}</option>
                                                <option value="Lao PDR">{{trans('words.Lao PDR')}}</option>
                                                <option value="Latvia">{{trans('words.Latvia')}}</option>
                                                <option value="Lebanon">{{trans('words.Lebanon')}}</option>
                                                <option value="Lesotho">{{trans('words.Lesotho')}}</option>
                                                <option value="Liberia">{{trans('words.Liberia')}}</option>
                                                <option value="Libya">{{trans('words.Libya')}}</option>
                                                <option value="Liechtenstein">{{trans('words.Liechtenstein')}}</option>
                                                <option value="Lithuania">{{trans('words.Lithuania')}}</option>
                                                <option value="Luxembourg">{{trans('words.Luxembourg')}}</option>
                                                <option value="Macedonia, Republic of">{{trans('words.Macedonia, Republic of')}}</option>
                                                <option value="Madagascar">{{trans('words.Madagascar')}}</option>
                                                <option value="Malawi">{{trans('words.Malawi')}}</option>
                                                <option value="Malaysia">{{trans('words.Malaysia')}}</option>
                                                <option value="Maldives">{{trans('words.Maldives')}}</option>
                                                <option value="Mali">{{trans('words.Mali')}}</option>
                                                <option value="Malta">{{trans('words.Malta')}}</option>
                                                <option value="Marshall Islands">{{trans('words.Marshall Islands')}}</option>
                                                <option value="Martinique">{{trans('words.Martinique')}}</option>
                                                <option value="Mauritania">{{trans('words.Mauritania')}}</option>
                                                <option value="Mauritius">{{trans('words.Mauritius')}}</option>
                                                <option value="Mayotte">{{trans('words.Mayotte')}}</option>
                                                <option value="Mexico">{{trans('words.Mexico')}}</option>
                                                <option value="Micronesia, Federated States of">{{trans('words.Micronesia, Federated States of')}}</option>
                                                <option value="Moldova">{{trans('words.Moldova')}}</option>
                                                <option value="Monaco">{{trans('words.Monaco')}}</option>
                                                <option value="Mongolia">{{trans('words.Mongolia')}}</option>
                                                <option value="Montenegro">{{trans('words.Montenegro')}}</option>
                                                <option value="Montserrat">{{trans('words.Montserrat')}}</option>
                                                <option value="Morocco">{{trans('words.Morocco')}}</option>
                                                <option value="Mozambique">{{trans('words.Mozambique')}}</option>
                                                <option value="Myanmar">{{trans('words.Myanmar')}}</option>
                                                <option value="Namibia">{{trans('words.Namibia')}}</option>
                                                <option value="Nauru">{{trans('words.Nauru')}}</option>
                                                <option value="Nepal">{{trans('words.Nepal')}}</option>
                                                <option value="Netherlands">{{trans('words.Netherlands')}}</option>
                                                <option value="Netherlands Antilles">{{trans('words.Netherlands Antilles')}}</option>
                                                <option value="New Caledonia">{{trans('words.New Caledonia')}}</option>
                                                <option value="New Zealand">{{trans('words.New Zealand')}}</option>
                                                <option value="Nicaragua">{{trans('words.Nicaragua')}}</option>
                                                <option value="Niger">{{trans('words.Niger')}}</option>
                                                <option value="Nigeria">{{trans('words.Nigeria')}}</option>
                                                <option value="Niue">{{trans('words.Niue')}} </option>
                                                <option value="Norfolk Island">{{trans('words.Norfolk Island')}}</option>
                                                <option value="Northern Mariana Islands">{{trans('words.Northern Mariana Islands')}}</option>
                                                <option value="Norway">{{trans('words.Norway')}}</option>

                                                <option value="Oman">{{trans('words.Oman')}}</option>
                                                <option value="Pakistan">{{trans('words.Pakistan')}}</option>
                                                <option value="Palau">{{trans('words.Palau')}}</option>
                                                <option value="Palestinian Territory">{{trans('words.Palestinian Territory')}}</option>
                                                <option value="Panama">{{trans('words.Panama')}}</option>
                                                <option value="Papua New Guinea">{{trans('words.Papua New Guinea')}}</option>
                                                <option value="Paraguay">{{trans('words.Paraguay')}}</option>
                                                <option value="Peru">{{trans('words.Peru')}}</option>
                                                <option value="Pitcairn">{{trans('words.Philippines')}}</option>
                                                <option value="Pitcairn">{{trans('words.Pitcairn')}} </option>
                                                <option value="Poland">{{trans('words.Poland')}}</option>
                                                <option value="Portugal">{{trans('words.Portugal')}}</option>
                                                <option value="Puerto Rico">{{trans('words.Puerto Rico')}}</option>
                                                <option value="Qatar">{{trans('words.Qatar')}}</option>
                                                <option value="Réunion">{{trans('words.Réunion')}}</option>
                                                <option value="Romania">{{trans('words.Romania')}}</option>
                                                <option value="Russian Federation">{{trans('words.Russian Federation ')}}</option>
                                                <option value="Rwanda">{{trans('words.Rwanda')}}</option>
                                                <option value="Saint-Barthélemy">{{trans('words.Saint-Barthélemy')}}</option>
                                                <option value="Saint Helena">{{trans('words.Saint Helena')}} </option>
                                                <option value="Saint Kitts and Nevis">{{trans('words.Saint Kitts and Nevis')}}</option>
                                                <option value="Saint Lucia">{{trans('words.Saint Lucia')}}</option>
                                                <option value="Saint-Martin (French part)"> {{trans('words.Saint-Martin (French part)')}}</option>
                                                <option value="Saint Pierre and Miquelon">{{trans('words.Saint Pierre and Miquelon')}} </option>
                                                <option value="Saint Vincent and Grenadines">{{trans('words.Saint Vincent and Grenadines')}}</option>
                                                <option value="Samoa">{{trans('words.Samoa')}}</option>
                                                <option value="San Marino">{{trans('words.San Marino')}}</option>
                                                <option value="Sao Tome and Principe">{{trans('words.Sao Tome and Principe')}}</option>
                                                <option value="Saudi Arabia">{{trans('words.Saudi Arabia')}}</option>
                                                <option value="Senegal">{{trans('words.Senegal')}}</option>
                                                <option value="Serbia">{{trans('words.Serbia')}}</option>
                                                <option value="Seychelles">{{trans('words.Seychelles')}}</option>
                                                <option value="Sierra Leone">{{trans('words.Sierra Leone')}}</option>
                                                <option value="Singapore">{{trans('words.Singapore')}}</option>
                                                <option value="Slovakia">{{trans('words.Slovakia')}}</option>
                                                <option value="Slovenia">{{trans('words.Slovenia')}}</option>
                                                <option value="Solomon Islands">{{trans('words.Solomon Islands')}}</option>
                                                <option value="Somalia">{{trans('words.Somalia')}}</option>
                                                <option value="South Africa">{{trans('words.South Africa')}}</option>
                                                <option value="South Georgia and the South Sandwich Islands">{{trans('words.South Georgia and the South Sandwich Islands')}}</option>
                                                <option value="South Sudan">{{trans('words.South Sudan')}}</option>
                                                <option value="Spain">{{trans('words.Spain')}}</option>
                                                <option value="Sri Lanka">{{trans('words.Sri Lanka')}}</option>
                                                <option value="Sudan">{{trans('words.Sudan')}}</option>
                                                <option value="Suriname">{{trans('words.Suriname')}}</option>
                                                <option value="Svalbard and Jan Mayen Islands">{{trans('words.Svalbard and Jan Mayen Islands')}}</option>
                                                <option value="Swaziland">{{trans('words.Swaziland')}}</option>
                                                <option value="Sweden">{{trans('words.Sweden')}}</option>
                                                <option value="Switzerland">{{trans('words.Switzerland')}}</option>
                                                <option value="Syrian Arab Republic (Syria)">{{trans('words.Syrian Arab Republic (Syria)')}}</option>
                                                <option value="Taiwan, Republic of China">{{trans('words.Taiwan, Republic of China')}} </option>
                                                <option value="Tajikistan">{{trans('words.Tajikistan')}}</option>
                                                <option value="Tanzania, United Republic of">{{trans('words.Tanzania, United Republic of')}} </option>
                                                <option value="Thailand">{{trans('words.Thailand')}}</option>
                                                <option value="Timor-Leste">{{trans('words.Timor-Leste')}}</option>
                                                <option value="Togo">{{trans('words.Togo')}}</option>
                                                <option value="Tokelau">{{trans('words.Tokelau')}} </option>
                                                <option value="Tonga">{{trans('words.Tonga')}}</option>
                                                <option value="Trinidad and Tobago">{{trans('words.Trinidad and Tobago')}}</option>
                                                <option value="Tunisia">{{trans('words.Tunisia')}}</option>
                                                <option value="Turkey">{{trans('words.Turkey')}}</option>
                                                <option value="Turkmenistan">{{trans('words.Turkmenistan')}}</option>
                                                <option value="Turks and Caicos Islands">{{trans('words.Turks and Caicos Islands ')}}</option>
                                                <option value="Tuvalu">{{trans('words.Tuvalu')}}</option>
                                                <option value="Uganda">{{trans('words.Uganda')}}</option>
                                                <option value="Ukraine">{{trans('words.Ukraine')}}</option>
                                                <option value="United Arab Emirates">{{trans('words.United Arab Emirates')}}</option>
                                                <option value="United Kingdom">{{trans('words.United Kingdom')}}</option>
                                                <option value="United States of America">{{trans('words.United States of America')}}</option>
                                                <option value="US Minor Outlying Islands">{{trans('words.US Minor Outlying Islands')}} </option>
                                                <option value="Uruguay">{{trans('words.Uruguay')}}</option>
                                                <option value="Uzbekistan">{{trans('words.Uzbekistan')}}</option>
                                                <option value="Vanuatu">{{trans('words.Vanuatu')}}</option>
                                                <option value="Venezuela (Bolivarian Republic)">{{trans('words.Venezuela (Bolivarian Republic)')}}</option>
                                                <option value="Viet Nam">{{trans('words.Viet Nam')}}</option>
                                                <option value="Virgin Islands, US">{{trans('words.Virgin Islands, US')}}</option>
                                                <option value="Wallis and Futuna Islands">{{trans('words.Wallis and Futuna Islands ')}}</option>
                                                <option value="Western Sahara ">{{trans('words.Western Sahara')}} </option>
                                                <option value="Yemen">{{trans('words.Yemen')}}</option>
                                                <option value="Zambia">{{trans('wordsZambia')}}</option>
                                                <option value="Zimbabwe">{{trans('words.Zimbabwe')}}</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col s12">
                                        <div class="input-field col s12">
                                            <div class="col s12">
                                                <textarea id="comment" class="materialize-textarea" placeholder="{{trans('words.comment_placeholder')}}"  name="comment" required></textarea>
                                                <label class="active">{{trans('words.Comment')}}</label>
                                            </div>
                                        </div> 
                                    </div>   
                                    <div class="col s12 center-align">                     
                                        @if($locale=='en')
                                        <input type="submit" class="inquire az-btn active" style="margin-left: 0px;" value="Register Now" id="reg_submit">
                                        @endif
                                        @if($locale=='ar')
                                        <input type="submit" class="inquire az-btn active" style="margin-left: 0px;" value="تسجيل" id="reg_submit">
                                        @endif
                                        @if($locale=='cn')
                                        <input type="submit" class="inquire az-btn active" style="margin-left: 0px;" value="现在注册" id="reg_submit">
                                        @endif




                                    </div>                               
                                </div>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <input type="hidden" name="type" value="2">
                            </form>
                        </div>
                    </div>
                    <!-- End -->



                </div>
            </div>
        </div>
    </div>
    <!-- End -->

</div>

</section>
<!-- End -->


@stop
@section('footer_main_scripts')

<script type="text/javascript" src="{{asset('public/assets/build/js/intlTelInput.js')}}"></script>

<script>
$("#phone").intlTelInput({
    nationalMode: false,
    preferredCountries: ['ae'],
    utilsScript: "./assets/build/js/utils.js"
});

function ValidateEmail(inputText) {
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (inputText.match(mailformat)) {
        return true;
    } else {
        return false;
    }
}


/*
$(document).on('click', '#reg_submit', function () {
    var error = 0;

    document.getElementById("f_name_error").style.display = "none";
    document.getElementById("l_name_error").style.display = "none";
    document.getElementById("c_number_error").style.display = "none";
    document.getElementById("email_error").style.display = "none";
    document.getElementById("company_name_error").style.display = "none";
    document.getElementById("country_error").style.display = "none";

    if ($("#first_name").val() == "")
    {
        document.getElementById("f_name_error").style.display = "block";
        error = 1;
    }
    if ($("#last").val() == "")
    {
        document.getElementById("l_name_error").style.display = "block";
        error = 1;
    }
    if ($("#phone").val() == "" || $("#phone-num").val() == "")
    {
        document.getElementById("c_number_error").style.display = "block";
        error = 1;
    }
    if ($("#email").val().trim() == "") {
        document.getElementById("email_error").style.display = "block";
        error = 1;
    } else {
        if (ValidateEmail($("#email").val()) == false) {
            document.getElementById("email_error").style.display = "block";
            error = 1;
        }
    }
    if ($("#company").val() == "")
    {
        document.getElementById("company_name_error").style.display = "block";
        error = 1;
    }
    if ($("#country_name").val() == "")
    {
        document.getElementById("country_error").style.display = "block";
        error = 1;
    }

    if (error == 1)
    {
        return false;
    }

    $.ajax({
        url: "./agentlogin",
        data: $('#registerform').serialize(),
        type: "POST",
        success: function (data) {
            if (data == 1) {
                $("input[type=text], textarea").val("");
                $("#formp").hide();
                $("#msgp").show();
            } else if (data == 2) {
                $("input[type=text], textarea").val("");
                $("#formp").hide();
                $("#errorp").show();
            }
        }
    });
});

*/

$(document).on('click', '.modal-close', function () {
    $("#formp").show();
    $("#msgp").hide();
    $("#errorp").hide();
})
</script>	
@stop
@section('footer_scripts')

@stop
