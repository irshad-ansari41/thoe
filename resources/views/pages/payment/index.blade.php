<?php
$get = filter_input_array(INPUT_GET);
?>
@extends('layouts/default')



{{-- page level styles --}}
@section('header_styles')
<link rel="stylesheet" href="{{asset('assets/build/css/intlTelInput.css')}}">
<link rel="stylesheet" href="{{asset('assets/build/css/demo.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/chosen.min.css')}}">
<style>
    select{border:0!important}
    .select-dropdown{border:0 solid #e4e4e4!important;padding-left:0!important;color:#b7b7b7!important;border-radius:0!important}
    .pay-mob .col.s3{width:23%!important;margin-top:3px!important;padding-left:1px!important}
    .input-box{border-bottom:none;margin-bottom:0;font-size:15px;letter-spacing:normal;font-weight:100;height:32px;width:100%}
    .input-dir{direction:initial!important}
    .nopadding{padding:0!important}
    .date{background:#2f2f2f;color:#fff;padding:10px 15px}
    .error{color:#fff;padding:7px 15px;background:red}
    .success{color:#fff;padding:7px 15px;background:green}
    /*select[name="country"],select[name="property_id"],select[name="payment_for"]{width:1px!important;top:0}*/
    .book-now .input-field{padding:0 10px}
    .input-field label{left:10px}
    .mb-0{margin-bottom:0}
    textarea{font-weight:100}
    .chosen-container{width:100%!important}
    .chosen-container-single .chosen-single{background:none!important;border:1px solid #eee!important;height:39px;border-radius:0;box-shadow:none!important;padding:7px 10px}
    .form-group{margin:10px 0}
    .form-control{border:1px solid #eee!important;padding:10px!important;width:95%!important;font-weight:100}
    .txt-444{color:#444!important}
    .txt-888{color:#888}
    .chosen-single span{color:#b7b7b7;font-weight:100}
    .chosen-container-single .chosen-search input[type=text]{width:92%}
    .select-dropdown{border:none!important;border-radius:0!important;color:#b7b7b7!important;border-bottom:1px solid #e4e4e4!important}
    .parallax-container .parallax img{top:auto!important}
    .book-now .select-wrapper input.select-dropdown{border-bottom:none!important}
    select[name="country"],select[name="department"]{border-color:#fff!important;top:0}
    .form-control{border:1px solid #eee!important;padding:10px!important;width:95%!important;font-weight:100;color:#000}
    .valid{display:none}
    .invalid{display:inline}
    .text-red{color:red}
    #contact .card{padding:10px}
    table tr th,table tr td{padding:0}
    textarea.materialize-textarea{min-height:7rem}
</style>
<script>
    if (/Windows/i.test(window.navigator.userAgent) || /iP(od|hone)/i.test(window.navigator.userAgent) || /IEMobile/i.test(window.navigator.userAgent) || /Windows Phone/i.test(window.navigator.userAgent) || /BlackBerry/i.test(window.navigator.userAgent) || /BB10/i.test(window.navigator.userAgent) || /Android.*Mobile/i.test(window.navigator.userAgent)) {
        console.log('Chosen Select Inactive');
        document.write('<style>#country_code,#alternate_code,#country,#project,#payment,#payment{border-color:#eee!important;display:inline-block;}</style>');
    } else {
        //console.log('Chosen Select Active');
        //document.write('<style>#nationality,#country,#country_code{display: inline-block!important; width: .5px; height: .5px; position: absolute; left: 18px; top: 12px; border: 0; padding: 0; margin: 0;}</style>');
    }
</script>
@stop

@section('main_div_wrapper')
@stop

@section('section_content')
<section class="az-section">

    <div class="container">
        <div class="parallax-container valign-wrapper only-heading">
            <div class="parallax">
                @if($content->image!="")
                <img alt="banner" src="{{ asset('assets/images/banner/') }}/{{ $content->image }}" >
                @endif
            </div>
            <div class="col s12 center-align card tag-pro{{$locale=='ar'?'-ar':''}}">
                <h1>{{trans('words.Pay Online')}}</h1>
                <!--<p><i class="ion ion-ios-location-outline" class="text-bold-900"></i></p>-->
            </div>
        </div>
        <div class="row m0">
            <div class="col s12 p0">
                <div class="col s12 p0">
                    <?php
                    if ($locale == 'en') {
                        $links = [url("$locale") => trans('words.home'), '' => trans('words.Pay Online')];
                    } elseif ($locale == 'cn') {
                        $links = [url("$locale") => '主页', '' => '在线支付'];
                    } elseif ($locale == 'ar') {
                        $links = [url("$locale") => trans('words.home'), '' => trans('words.Pay Online')];
                    }
                    ?>
                    <?= generate_breadcrumb($links, $locale) ?>                   
                </div>
            </div>
        </div>
    </div>



    <div class="container">
        <div class="row">
            <div class="col s8 m8">
                <?php
                if (isset($get['error']) && $get['error'] == 1) {
                    echo "<h6 class='error'>Something went wrong. Please fill payment form again.</h6>";
                }
                if (!empty($get['status']) && $get['status'] == 'success') {
                    echo "<h6 class='success'>{$get['message']}</span>";
                }
                if (!empty($get['status']) && $get['status'] == 'cancel') {
                    echo "<h6 class='error'>{$get['message']}</span>";
                }
                if (!empty($get['status']) && $get['status'] == 'failed') {
                    echo "<h6 class='error'>{$get['message']}</span>";
                }
                ?>
            </div>
            <div class="col s6 m4">
                <h6 class="date">{{trans('words.Date')}}: <span>{{showTextByLocale($locale, ['en'=>date("d/M/Y", strtotime(date("Y-m-d"))),'ar'=>ArabicDate(),'cn'=>ChineseDate()])}}</span></h6>
            </div>
        </div>

        <form action="{{route('payment.confirmation')}}" method="post" id="payment_form">	
            <!-- Online payment -->
            <div class="row book-now">
                <!-- Basic info -->
                <div class="col s12">
                    <div class="card-panel">

                        <div class="row" style="margin-bottom: 1em;">
                            <!-- Name -->
                            <div class="col s12 m4 form-group">
                                <label>{{trans('words.first_name_label')}}<span class="text-red">*</span></label>
                                <input type="text" id="fname" autocomplete="off" class="autocomplete form-control" pattern="[A-Za-z ]{1,32}" placeholder="{{trans('words.first_name_placeholder')}}" name="first_name"  maxlength="20" value="{{old('first_name')}}">
                            </div>

                            <!-- Name -->
                            <div class="col s12 m4 form-group">
                                <label>{{trans('words.last_name_label')}}<span class="text-red">*</span></label>
                                <input type="text" id="lname" autocomplete="off" class="autocomplete form-control" pattern="[A-Za-z ]{1,32}" placeholder="{{trans('words.last_name_placeholder')}}" name="last_name"  maxlength="20" value="{{old('lsst_name')}}">
                            </div>

                            <!-- Passport Number -->
                            <div class="col s12 m4 form-group">
                                <label>{{trans('words.passport_no_label')}}<span class="text-red">*</span></label>
                                <input type="text" id="passport" autocomplete="off" class="autocomplete form-control" placeholder="{{trans('words.passport_no_placeholder')}}" name="passport_number"  maxlength="10" value="{{old('passport_number')}}">
                            </div>
                        </div>


                        <div class="row" style="margin-bottom: 1em;">
                            <!-- Email -->
                            <div class="col s12 m4 form-group">
                                <label>{{trans('words.email_label')}}<span class="text-red">*</span></label>
                                <input type="email" id="email" autocomplete="off" class="autocomplete form-control" placeholder="{{trans('words.email_plcaholder')}}" name="email_id"  maxlength="40" value="{{old('email_id')}}">
                            </div>

                            <!-- Mobile Number -->
                            <div class="col s12 m4 form-group">
                                <label>{{trans('words.mobile_no')}}<span class="text-red">*</span></label>
                                <table>
                                    <tr>
                                        <td>
                                            <select name="country_code" id="country_code" class="chosen-select txt-888 form-control" >
                                                <option value="">Country Code*</option>
                                                <?php
                                                foreach ($country_codes as $country) {
                                                    $selected = $country->code == '+971' ? 'selected' : '';
                                                    echo " <option value='{$country->code}' $selected>{$country->code} ({$country->name})</option>";
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" id="mobile" pattern="\d*"  autocomplete="off" class="autocomplete form-control" minlength="8" maxlength="12" placeholder="Mobile Number" name="mobile_number"   value="{{old('mobile_number')}}">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <!-- Alternate Number -->
                            <div class="col s12 m4 form-group">
                                <label>{{trans('words.Alternate Phone Number')}}</label>
                                <table>
                                    <tr>
                                        <td>
                                            <select name="alter_code" id="alternate_code" class="chosen-select txt-888 form-control" >
                                                <option value="">Country Code*</option>
                                                <?php
                                                foreach ($country_codes as $country) {
                                                    $selected = $country->code == '+971' ? 'selected1' : '';
                                                    echo " <option value='{$country->code}' $selected>{$country->code} ({$country->name})</option>";
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" id="phone" pattern="\d*"  autocomplete="off" class="autocomplete form-control" minlength="8" maxlength="12" placeholder="{{trans('words.Enter Alternate Phone Number')}}" name="alt_phone_number"   value="{{old('alt_phone_number')}}">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>



                        <div class="row" style="margin-bottom: 1em;">
                            <!-- Address -->
                            <div class="col s12 m6 form-group">
                                <label class="active">{{trans('words.address_label')}}<span class="text-red">*</span></label>
                                <textarea name="address" id="address" class="materialize-textarea form-control" placeholder="{{trans('words.address_label_placeholder')}}" ></textarea>
                            </div>

                            <!-- address city, po country -->
                            <div class="col s12 m6">
                                <div class="row mb-0">
                                    <!-- City -->
                                    <div class="col s12 m6 form-group">
                                        <label>{{trans('words.city_label')}}<span class="text-red">*</span></label>
                                        <input type="text" id="city" autocomplete="off" class="autocomplete form-control" pattern="[A-Za-z ]{1,32}" maxlength="30" placeholder="{{trans('words.city_label_placeholder')}}" name="city" >
                                    </div>

                                    <!-- State -->
                                    <div class="col s12 m6 form-group">
                                        <label>{{trans('words.state_label')}}<span class="text-red">*</span></label>
                                        <input type="text" id="state" autocomplete="off" class="autocomplete form-control" pattern="[A-Za-z ]{1,32}" maxlength="30" placeholder="{{trans('words.state_label_placeholder')}}" name="state" >
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col s12 m6 form-group">
                                        <label>{{trans('words.post_code_label')}}<span class="text-red">*</span></label>
                                        <input type="text" id="zipcode" autocomplete="off" class="autocomplete form-control" pattern="[A-Za-z0-9]{1,32}" maxlength="10" placeholder="{{trans('words.post_code_label')}}" name="post_code" >
                                    </div>
                                    <div class="col s12 m6 form-group">
                                        <label>{{trans('words.country_label')}}<span class="text-red">*</span></label>
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
                            </div>
                        </div>

                        <div class="row" style="margin-bottom: 1em;">
                            <!-- Avail projects in area -->
                            <div class="col s12 m4 form-group">
                                <label>{{trans('words.Select Project*')}}<span class="text-red">*</span></label>
                                <select name="property_id" id="project"  class="chosen-select txt-888 form-control">
                                    <option value="">{{showTextByLocale($locale, ['en'=>trans('words.Select Property'),'ar'=>trans('words.Select Property'),'cn'=>'选择项目'])}}</option>
                                    <?php
                                    if (!empty($props)) {
                                        foreach ($props as $prop) {
                                            ?>
                                            <option value="{!! $prop->id !!}">{!! $prop->title_en !!}</option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>

                            <!-- Avail floor -->
                            <div class="col s12 m4 form-group">
                                <label>{{trans('words.Floor/Block*')}}<span class="text-red">*</span></label>
                                <input type="text" id="floor" autocomplete="off" class="autocomplete form-control" pattern="[A-Za-z0-9]{1,32}" maxlength="10" placeholder="{{trans('words.floor_block_placeholder')}}" name="floor_block" >                                        
                            </div>

                            <!-- Avail units features in projects -->
                            <div class="col s12 m4 form-group">
                                <label>{{trans('words.unit_label')}}<span class="text-red">*</span></label>
                                <input type="text" id="unit" autocomplete="off" class="autocomplete form-control" pattern="[A-Za-z0-9]{1,32}" maxlength="10" placeholder="{{trans('words.unit_no_placeholder')}}" name="unit_number" >
                            </div>
                        </div>

                        <div class="row" style="margin-bottom: 1em;">
                            <!-- Payment -->
                            <div class="col s12 m3 form-group">
                                <label>{{trans('words.payment_amount_label')}}</label>
                                <input type="number" id="amount" autocomplete="off" class="autocomplete form-control" placeholder="{{trans('words.payment_amount_placeholder')}}" name="payment_amount"  min="1" max="100000" maxlength="6">
                                <input type="hidden" value="<?= $_SERVER['REMOTE_ADDR'] ?>" name="ip_address" />

                            </div>

                            <div class="col s12 m3 form-group">
                                <label>{{trans('words.Payment for')}}<span class="text-red">*</span></label>
                                <select name="payment_for" id="payment"  class="chosen-select txt-888 form-control">
                                    <option value="">{{trans('words.payment_category_label')}}</option>
                                    <option value="Booking Fee">{{trans('words.Booking Fee')}}</option>
                                    <option value="Installment">{{trans('words.Installment')}}</option>
                                    <option value="Oqood Fee">{{trans('words.Oqood Fee')}}</option>
                                    <option value="ERES Fee">{{trans('words.ERES Fee')}}</option>
                                    <option value="Other">{{trans('words.Other')}}</option>
                                </select>
                                <!---->
                            </div>

                            <div class="col s12 m6 form-group">
                                <label class="active">{{trans('words.Payment Description')}}<span class="text-red">*</span></label>
                                <textarea id="description" class="materialize-textarea form-control" placeholder="{{trans('words.payment_desc_placeholder')}}" name="payment_desc" ></textarea>
                            </div>
                        </div>

                        <div class="row" style="margin-bottom: 1em;">

                            <!-- Proceed -->
                            <div class="col s12">
                                <div class="col s6">
                                    <label class="text-bold"><input type="checkbox" id="term" value="1" style="opacity:1;width: 15px;height: 25px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Accept Terms & Conditions</label> <span id="terms" style="cursor: pointer"> &#9432;</span>
                                    <br/>
                                    <p id="termsinfo" style="display:none;margin:5px">No refunds/cancellation will be accepted for any card transactions made on the website.<br/>Governing Law and Jurisdiction: “Any purchase, dispute or claim arising out of or in connection with this website shall be governed and construed in accordance with the laws of UAE”</p>
                                    &nbsp;&nbsp;&nbsp;
                                </div>
                                <div class="col s6 right-align">
                                    <div class="col s12 m12">
                                        <small  class="txt-red valid" id='msg-fname'>Please enter first name.</small>
                                        <small  class="txt-red valid" id='msg-lname'>Please enter last name.</small>
                                        <small  class="txt-red valid" id='msg-email'>Please enter email address.</small>
                                        <small  class="txt-red valid" id='msg-passport'>Please enter passport number.</small>
                                        <small  class="txt-red valid" id='msg-country_code'>Please select country code.</small>
                                        <small  class="txt-red valid" id='msg-mobile'>Please enter mobile number.</small>
                                        <small  class="txt-red valid" id='msg-alternate_code'>Please select alternate country code.</small>
                                        <small  class="txt-red valid" id='msg-phone'>Please enter alternate phone number.</small>
                                        <small  class="txt-red valid" id='msg-address'>Please enter your address.</small>
                                        <small  class="txt-red valid" id='msg-city'>Please enter your city.</small>
                                        <small  class="txt-red valid" id='msg-state'>Please enter your state.</small>
                                        <small  class="txt-red valid" id='msg-zipcode'>Please enter your zip code.</small>
                                        <small  class="txt-red valid" id='msg-country'>Please select your country.</small>
                                        <small  class="txt-red valid" id='msg-project'>Please select your project.</small>
                                        <small  class="txt-red valid" id='msg-floor'>Please enter your floor/block.</small>
                                        <small  class="txt-red valid" id='msg-unit'>Please enter your unit number.</small>
                                        <small  class="txt-red valid" id='msg-amount'>Please enter your amount.</small>
                                        <small  class="txt-red valid" id='msg-payment'>Please select  payment for.</small>
                                        <small  class="txt-red valid" id='msg-description'>Please write payment description.</small>
                                        <small  class="txt-red valid" id='msg-term'>Please accept terms & condition.</small>
                                    </div>
                                    <input type="submit" class="inquire az-btn active" value="{{trans('words.Proceed Payment')}}">
                                </div>
                            </div>

                            <!-- End -->

                        </div>


                    </div>

                </div>
            </div>
            <!-- End -->
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        </form>
    </div>


</section>


<!-- End -->
@stop
@section('footer_main_scripts')

@stop

@section('footer_scripts')

<script type="text/javascript" src="{{asset('assets/build/js/intlTelInput.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/payment_form.js')}}"></script>
<script src="{{asset('assets/js/chosen.jquery.min.js')}}"></script>
<script>

    $('.chosen-select').chosen();


    $('#terms').click(function () {
        $('#termsinfo').toggle();
    });

    $('#fname,#lname,#email,#passport,#country_code,#mobile,#alternate_code,#phone,#address,#city,#state,#zipcode,#country,#project,#floor,#unit,#amount,#payment,#description,#term')
            .on('keyup change', function () {
                inputValid('fname'), inputValid('lname'), inputValid('passport'), inputValid('email'), selectValid('country_code'), inputValid('mobile');
                selectValid('alternate_code'), inputValid('phone'), inputValid('address'), inputValid('city'), inputValid('state'), inputValid('zipcode'), selectValid('country');
                selectValid('project'), inputValid('floor'), inputValid('unit'), inputValid('amount'), inputValid('amount'), selectValid('payment'), inputValid('description');
                checkValid('term');
            });
            
    $('#payment_form').on('submit', function () {
        if (inputInvalid('fname') || inputInvalid('lname') || inputInvalid('passport') || inputInvalid('email') || selectInvalid('country_code') || inputInvalid('mobile') ||
                selectInvalid('alternate_code') || inputInvalid('phone') || inputInvalid('address') || inputInvalid('city') || inputInvalid('state') || inputInvalid('zipcode') ||
                selectInvalid('country') || selectInvalid('project') || inputInvalid('floor') || inputInvalid('unit') || inputInvalid('amount') || inputInvalid('amount') ||
                selectInvalid('payment') || inputInvalid('description') || checkInvalid('term')) {
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
    function checkValid(id) {
        if ($('#' + id).prop('checked')) {
            $('#msg-' + id).removeClass('invalid').addClass('valid');
        }
    }

    function inputInvalid(id) {
        if ($('#' + id).val() === '') {
            $('#msg-' + id).addClass('invalid');
            return true;
        }
    }
    function selectInvalid(id) {
        if ($('#' + id).val() === '') {
            $('#msg-' + id).addClass('invalid');
            $('#' + id + '_chosen .chosen-single span').removeClass('txt-444');
            $('#' + id).removeClass('txt-444').addClass('txt-888');
            return true;
        }
    }
    function checkInvalid(id) {
        if (!$('#' + id).prop('checked')) {
            $('#msg-' + id).addClass('invalid');
            return true;
        }
    }
</script>
@stop
