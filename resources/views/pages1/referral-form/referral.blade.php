@extends('layouts/default')


@section('header_styles')
<!-- Time line css -->
<link rel="stylesheet" type="text/css" href="<?= asset('assets/css/timeline_style.css') ?>">
<link rel="stylesheet" type="text/css" href="<?=SITE_URL?>/lead-form/css/chosen.min.css"/>

<style>
    .parallax-container .parallax img {    top: initial;}.cd-horizontal-timeline .timeline {position: relative;height: 100px;margin: 0 auto;width: 60%;}
    input:not([type]), input[type=date]:not(.browser-default), input[type=datetime-local]:not(.browser-default), input[type=datetime]:not(.browser-default), input[type=email]:not(.browser-default), input[type=number]:not(.browser-default), input[type=password]:not(.browser-default), input[type=search]:not(.browser-default), input[type=tel]:not(.browser-default), input[type=text]:not(.browser-default), input[type=time]:not(.browser-default), input[type=url]:not(.browser-default), textarea.materialize-textarea{ 
        border:1px solid rgba(0, 0, 0, 0.38) !important; height: 40px; border-radius: 1px !important; padding:0 0 0 5px !important; color:#000 !important;background-color:#fff;
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
    .select-dropdown{ border-radius: 0px !important;}
    .h4, h4{margin:0px 0 10px 0; position: relative; left:-20px;}
    .az-btn{ margin: 0px;}

    /*input, select{ border:none !important;}*/
    table,tr,td{ line-height: 0 !important; padding: 8px 8px 8px 0px; margin:0;}

    .chosen-container{ width:100%!important; }
    .chosen-container-single .chosen-single{background: #fff !important;border:1px solid rgba(0, 0, 0, 0.38) !important;height: 42px;border-radius: 0;box-shadow:none!important;padding: 7px 10px;}
    .form-group{margin: 10px 0;}
    .form-control{border: 1px solid #eee!important;padding: 10px!important;width: 95%!important;font-weight: 100;}
    .txt-444{color:#444!important;}
    .txt-888{color:#888;}
    .chosen-single span {color: #b7b7b7; font-weight: 100;}
    .chosen-container-single .chosen-search input[type=text]{width: 70%;} 
    .chosen-single > span{ width: 90px !important; text-overflow:ellipsis !important; color:#000;}
    select{ border:1px solid rgba(0, 0, 0, 0.38) !important; height: 42px;}
    
    @media only screen and (min-width: 768px){
        
    }
    @media only screen and (max-width: 768px){
        .az-btn{ width:100%;}
    }

</style>

@stop

@section('main_div_wrapper')

@stop

@section('section_content')

<!-- Header -->
<section class="az-section">

    <div class="container">

        <div class="parallax-container valign-wrapper only-heading">
            <div class="parallax">
                <img alt="Referrals - Thoe Developments" src="<?=SITE_URL?>/lp/meydan/les-jardins/images/slider/slide-lg-2.jpg">
            </div>
            <div class="col s12 center-align card tag-pro">
                <h1>Thoe Referral Form</h1>
            </div>
        </div>

        <!--div class="row m0">
            <div class="col s12 p0">
                <div class="col s12 p0">
        <?= generate_breadcrumb([url("$locale") => trans('words.home'), '' => 'Referral Form']) ?>
                </div>
            </div>
        </div-->
        <br/>

    </div>

    <div class="container"  style="padding:20px 0 80px 0;">

        <div class="row m0">

            <!--h5 style="margin:0;"></h5-->

            <p style="font-size:1.1rem !important; margin: 0px 0px 15px 0px;">
                Dear valued customer,
            </p>
            <p style="font-size:1.1rem !important; margin:0px 0px 15px 0px;">
                Get 3% off on your property value for your first referral and 2% off for every subsequent referral.
            </p>

            <p style="font-size:1.1rem !important; margin:0px 0px 15px 0px;">
                Simply fill in your details in the form, along with the
                name of the person you would like to introduce and
                one of our agents will reach out to you shortly.                
            </p>
            <p style="font-size:1.1rem !important; margin:0px 0px 15px 0px;">&nbsp;</p>
            <?php
            //print_r($Properties);
            //function my_sort($a,$b) {return strcmp($a['title_en'],$b['title_en']); }
            //$a= $Properties;
            //usort($Properties,"my_sort");
            //echo '<pre>'; print_r($Properties);echo '</pre>';
            ?>                                                

        </div>   
        <form action="{{route('form-referral.send')}}" method="post">
            {{ csrf_field() }}
            <div class="row m0">
                
                <div class="col m1 s12"></div>
                
                <div class="col m5 s12" style="background-color:rgba(238, 238, 238, 0.59); border-radius: 5px 0px 5px 0px;  padding:40px;"> 

                    


                    <table width="340" border="0" align="center" style="width: 100%;max-width: 400px;">
                        <tr>
                            <td colspan="2"><h4>Your Details</h4></td>
                        </tr>
                        <tr>
                            <td colspan="2"> 
                                <label for="fullname" class="lbl">Your Full Name:</label>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2"> 
                                <input placeholder="Full Name" id="fullname" type="text" name="fullname" required="required" maxlength="50">
                            </td>
                        </tr>

                        <tr>
                            <td> 
                                <label for="countrycode" class="lbl">Country Code:</label>
                            </td>

                            <td > 
                                <label for="phone" class="lbl">Mobile Number:</label>
                            </td>

                        </tr>

                        <tr>
                            <td> 
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
                            <td > 
                                <input placeholder="Mobile Number" id="phone" type="tel" name="phone" required="required" minlength="8" maxlength="12" pattern="\d*">
                            </td>

                        </tr>


                        <tr>
                            <td colspan="2"> 
                                <label for="email" class="lbl">Your Email Address:</label>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2"> 
                                <input placeholder="Email Address" id="email" type="email" name="email" required="required" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" maxlength="50">
                            </td>
                        </tr>


                        <tr>
                            <td colspan="2" style="padding:8px 0px;">

                                <table border="0" width="100%">
                                    <tr>

                                        <td> 
                                            <label for="building" class="lbl">Your Building Name: </label>
                                        </td>

                                        <td> 
                                            <label for="unitnumber" class="lbl">Unit:</label>
                                        </td>

                                    </tr>

                                    <tr>

                                        <td width="55%"> 
                                            <select class="browser-default" id="Building" name="building" required="required">
                                                <option value="">--Select Building---</option>
                                                <?php
                                                if (!empty($Properties)):
                                                    $as = array_column($Properties, 'title_en');
                                                    natsort($as);
                                                    foreach ($as as $rows): ?>
                                                        <option value="<?= $rows ?>"><?= $rows ?></option>
                                                    <?php endforeach; endif; ?>
                                            </select>
                                        </td>

                                        <td> 
                                            <input placeholder="Unit Number" id="unitnumber" type="text" name="unitnumber" required="required"  maxlength="5">
                                        </td>


                                    </tr>


                                </table>
                            </td>
                        </tr>

                    </table>

                </div>
               
                <div class="col m5 s12" style="background-color:rgba(238, 238, 238, 0.59); border-radius: 5px 0px 5px 0px; padding: 40px;"> 


                    <table width="340" border="0" align="center"  style="width: 100%;max-width: 400px;">

                        <tr>
                            <td colspan="2"><h4>Your Referrals Details</h4></td>
                        </tr>

                        <tr>
                            <td colspan="2"> 
                                <label for="referralfullname" class="lbl">Full Name</label>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2"> 
                                <input placeholder="Full Name" id="referralfullname" type="text" name="referralfullname" required="required" maxlength="50">
                            </td>
                        </tr>

                        <tr>
                            <td> 
                                <label for="referralcountrycode" class="lbl">Country Code:</label>
                            </td>

                            <td> 
                                <label for="referralphone" class="lbl">Mobile Number:</label>
                            </td>
                        </tr>

                        <tr>
                            <td width="130"> 
                                <select name="referralcountrycode" id="referralcountrycode" class="browser-default chosen-select " style="width:100px;">
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
                                <input placeholder="Mobile Number" id="referralphone" type="tel" name="referralphone" required="required" minlength="8" maxlength="12" pattern="\d*">
                            </td>


                        </tr>


                        <tr>
                            <td colspan="2"> 
                                <label for="referralemail" class="lbl">Email Address:</label>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2"> 
                                <input placeholder="Email Address" id="referralemail" type="email" name="referralemail" maxlength="50"/>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2" style="text-align:right;padding: 23px 0px;"> 
                                <input type="submit" name="submit" value="Submit" class="inquire az-btn active"/>
                            </td>
                        </tr>

                    </table>


                </div>  


            </div>
        </form>            


    </div>


</section>
<!-- End -->
@stop

@section('footer_main_scripts')

<script type="text/javascript" src="<?=SITE_URL?>/lead-form/js/chosen.jquery.min.js"></script>
<script>

$('.chosen-select').chosen({width: "10%"});

sessionStorage.setItem("website_ref_url",'<?=SITE_URL?>/en/form-referral');

</script>	

@stop

