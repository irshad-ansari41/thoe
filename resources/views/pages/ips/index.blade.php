@extends('layouts/ips')


@section('header_styles')
<!-- Time line css -->
<link rel="stylesheet" type="text/css" href="<?= asset('assets/css/timeline_style.css') ?>">
<link rel="stylesheet" type="text/css" href="<?=SITE_URL?>/lead-form/css/chosen.min.css"/>

<style>

    input:not([type]), input[type=date]:not(.browser-default), input[type=datetime-local]:not(.browser-default), input[type=datetime]:not(.browser-default), input[type=email]:not(.browser-default), input[type=number]:not(.browser-default), input[type=password]:not(.browser-default), input[type=search]:not(.browser-default), input[type=tel]:not(.browser-default), input[type=text]:not(.browser-default), input[type=time]:not(.browser-default), input[type=url]:not(.browser-default), textarea.materialize-textarea{ 
        border:1px solid rgba(0, 0, 0, 0.38) !important; height: 40px; border-radius: 1px !important; padding:0 0 0 5px !important; color:#000 !important;
    }
    input:not([type]):focus:not([readonly]), input[type=text]:not(.browser-default):focus:not([readonly]), input[type=password]:not(.browser-default):focus:not([readonly]), input[type=email]:not(.browser-default):focus:not([readonly]), input[type=url]:not(.browser-default):focus:not([readonly]), input[type=time]:not(.browser-default):focus:not([readonly]), input[type=date]:not(.browser-default):focus:not([readonly]), input[type=datetime]:not(.browser-default):focus:not([readonly]), input[type=datetime-local]:not(.browser-default):focus:not([readonly]), input[type=tel]:not(.browser-default):focus:not([readonly]), input[type=number]:not(.browser-default):focus:not([readonly]), input[type=search]:not(.browser-default):focus:not([readonly]), textarea.materialize-textarea:focus:not([readonly]){
        border:1px solid rgba(0, 0, 0, 0.38) !important; 
    }
    .input-field label{ 
        position:relative !important; left:0 !important; color:rgba(0, 0, 0, 0.6784313725490196)!important; 
    }    
    input[type="text"]::-webkit-input-placeholder, input[type="email"]::-webkit-input-placeholder,input[type="tel"]::-webkit-input-placeholder {
        padding: 0px 5px !important; color:#000;
    }
    select::placeholder{color: #000;}

    .az-btn{ margin:0px; width:100% !important;}
    /*.intl-tel-input.allow-dropdown input, .intl-tel-input.allow-dropdown input[type=text], .intl-tel-input.allow-dropdown input[type=tel], .intl-tel-input.separate-dial-code input, .intl-tel-input.separate-dial-code input[type=text], .intl-tel-input.separate-dial-code input[type=tel]{ padding: 0px !important;}
    .intl-tel-input .flag-container{padding:0!important;}
    .intl-tel-input.allow-dropdown .selected-flag, .intl-tel-input.separate-dial-code .selected-flag{ width: 120px; padding:0 !important;}
    .intl-tel-input .selected-flag .iti-flag{ position: relative !important; top: 15px !important; left: 30px !important; padding:0  !important;}
    */
    input, select{ border:none !important;}
    table,tr,td{ line-height: 0 !important; padding: 8px 0px 8px 0px; margin:0;}    
    .az-nav-header{ background: #004196 !important;  }
    #page-footer .inner #footer-copyright{ 
        background: #004196 !important;  padding:10px 0px;
        position:sticky; bottom: 0;
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


        /*.tag-pro { top: 40px !important; }*/
    }
    /*
    .select-dropdown{ border-radius: 0px !important;}
    .select-wrapper input.select-dropdown, .chosen-select, .caret{display: none;}
    select { 
        display: none; width: 100%; border: 1px solid #9e9e9e !important; 
    }
    .chosen-container-single .chosen-single{ 
        height: 42px; border-radius:0 !important;
    } */

    .chosen-container{ width:100%!important; }
    .chosen-container-single .chosen-single{background: none!important;border:1px solid rgba(0, 0, 0, 0.38) !important;height: 42px;border-radius: 0;box-shadow:none!important;padding: 7px 10px;}
    .form-group{margin: 10px 0;}
    .form-control{border: 1px solid #eee!important;padding: 10px!important;width: 95%!important;font-weight: 100;}
    .txt-444{color:#444!important;}
    .txt-888{color:#888;}
    .chosen-single span {color: #b7b7b7; font-weight: 100;}
    .chosen-container-single .chosen-search input[type=text]{width: 70%;} 
    .chosen-single > span{ width: 90px !important; text-overflow:ellipsis !important; color:#000;}
    select{ border:1px solid rgba(0, 0, 0, 0.38) !important;}

</style>

@stop

@section('main_div_wrapper')

@stop

@section('section_content')

<!-- Header -->
<section class="az-section">

    <section>

        <div class="parallax-container valign-wrapper only-heading" style="background-image:url('http://aziziriviera.com/azizi-emailer/images/ips-2019/26-28_Mar_IPS_Emailer_New.jpg');">
            <img alt="IPS - Azizi Developments" src="http://aziziriviera.com/azizi-emailer/images/ips-2019/26-28_Mar_IPS_Emailer_New.jpg" class="imgtag"/>
            <div class="col s12 center-align card tag-pro">
                <h1>IPS Form</h1>
            </div>
        </div>

    </section>

    <div class="container"  style="padding:20px 0 20px 0;">

        <div class="row m0">

            <!--h5 style="margin:0;"></h5-->

            <p class="paraclass">
                Thank you for visiting Azizi Developments at the International Property Show. We are pleased to hear that you want more information on the unmissable offers from our most sought after projects.

            </p>
            <p class="paraclass">
                Simply enter your details below and we’ll send the information directly to your email address.
            </p>


        </div>   
        <form action="{{route('ips.send')}}" method="post">
            {{ csrf_field() }}
            <p class="paraclass">&nbsp;</p>
            <div style="max-width:500px; margin: auto;border: 1px solid #eee; border-radius: 4px;background-color: #eee3;">


                <table width="360" border="0" align="center" style="margin:49px auto 49px auto; width: 360px;">
                    <tr>
                        <td  colspan="2">
                            <h4 style="margin:0px 0px 10px 0px;">
                                Your Details
                            </h4>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"> 
                            <label for="fullname" class="lbl">Full Name:</label>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2"> 
                            <input placeholder="Full Name" id="fullname" type="text" name="fullname" required="required" value="{{old('fullname')}}">
                            <input type="hidden" value="IPS" name="IPS"/>
                        </td>
                    </tr>

                    <tr>
                        <td style=" padding: 0px 10px 0px 0px; "> 
                            <label for="countrycode" class="lbl">Country Code:</label>
                        </td>

                        <td > 
                            <label for="phone" class="lbl">Mobile Number:</label>
                        </td>

                    </tr>

                    <tr>
                        <td style=" padding: 0px 10px 0px 0px; width:100px;" width="80"> 
                            <!--input type="text"  id="countrycode" name="countrycode"  style="border-bottom: none;margin-bottom: 0;font-size: 15px;
                            letter-spacing: 1px;font-weight: 100;    direction: initial !important; padding: 0px 0px 0px 50px !important; width: 66px;"  required maxlength="4" value="{{old('fullname')}}"-->
                            <select name="countrycode" id="countrycode" class="browser-default chosen-select " style="width:100px;">
                                <option value="">Country Code*</option>
                                <?php
                                foreach ($country_codes as $country) {
                                    $selected = $country->code == '+971' ? 'selected' : '';
                                    echo " <option value='{$country->code}' $selected>{$country->code} ({$country->name})</option>";
                                }
                                ?>
                            </select>                                    
                        </td>
                        <td width="320"> 
                            <input placeholder="Mobile Number" id="phone" type="tel" name="phone" required="required" maxlength="12" value="{{old('phone')}}" pattern="\d*">
                        </td>

                    </tr>


                    <tr>
                        <td colspan="2"> 
                            <label for="email" class="lbl">Email Address:</label>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2"> 
                            <input placeholder="Email Address" id="email" type="email" name="email" required="required" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" value="{{old('email')}}">
                        </td>
                    </tr>

                    <!--tr>
                        <td colspan="2">
                            <table width="100%" border="0">
                                <tr>
                                    <td style=" padding: 0px 10px 0px 0px; "> 
                                        <label for="projectname" class="lbl">Community:</label>
                                    </td>

                                    <td> 
                                        <label for="building" class="lbl">Building Name: </label>
                                    </td>


                                </tr>

                                <tr>
                                    <td style=" padding: 0px 10px 0px 0px; "> 
                                        <select class="browser-default" name="community" id="community" required="required">
                                            <option value="">---Select Community---</option>
                    <?php if (!empty($Project)): foreach ($Project as $rows): if ($rows->title_en != 'Meydan'): ?>
                                                                                                            <option value="<?= $rows->id ?>"><?= $rows->title_en ?></option>
                                <?php
                            endif;
                        endforeach;
                    endif;
                    ?>
                                        </select>                                    
                                    </td>

                                    <td> 
                                        <select class="browser-default" name="building" id="building" required="required">
                                            <option value="">---Select Building---</option>
                    <?php //print_r($Properties);  ?>
                                            
                    <?php if (!empty($Properties)): foreach ($Properties as $rows): ?>
                                                                                            <option value="<?= $rows->id ?>" data-projectid="<?= $rows->project_id ?>"><?= $rows->title_en ?></option>
                            <?php
                        endforeach;
                    endif;
                    ?>
                                        </select>
                                    </td>

                                </tr>                                        
                            </table>    
                        </td>
                    </tr-->

                    <tr>
                        <td colspan="2" style="text-align:right;"> 
                            <input type="submit" name="submit" value="Submit" class="inquire az-btn active"/>
                        </td>
                    </tr>

                </table>                
            </div>
            <p class="paraclass">&nbsp;</p>
        </form>            


    </div>


</section>
<!-- End -->
@stop

@section('footer_main_scripts')

<script type="text/javascript" src="<?=SITE_URL?>/lead-form/js/chosen.jquery.min.js"></script>
<script>


/*$("select[required]").css({position: "absolute", display: "inline", height: 0, padding: 0, width: 0});
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
 
 $("#countrycode").intlTelInput({
 nationalMode: false,
 autoHideDialCode: false,
 preferredCountries: ['ae'],
 utilsScript: "/assets/build/js/utils.js"
 });
 $("#referralcountrycode").intlTelInput({
 nationalMode: false,
 autoHideDialCode: false,
 preferredCountries: ['ae'],
 utilsScript: "/assets/build/js/utils.js"
 });*/
$('.chosen-select').chosen({width: "10%"});

$("#community").change(function () {
    if (typeof $(this).data('options') === "undefined") {
        $(this).data('options', $('#building option').clone());
    }
    var id = $(this).val();

    var options = $(this).data('options').filter('[data-projectid=' + id + ']');
    $('#building').html(options);
    console.log('1');
});
$("#community").trigger('change');

var docheight = $(document).height();
var azheight = $('.az-section').height();
var footerheight = $('#footer-copyright').height();
$('#footer-copyright').css('margin-top', (docheight - azheight) + footerheight - 70);
//alert($('#footer-copyright').height());

$("body").scroll(function (e) {
    e.preventDefault()
});

sessionStorage.setItem("website_ips_url",'<?=SITE_URL?>/en/ips-form');

</script>	

@stop

