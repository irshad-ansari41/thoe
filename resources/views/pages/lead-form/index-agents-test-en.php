<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Lead Form</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet"  href="https://azizidevelopments.com/lead-form/css/bootstrap-chosen-compress.css"  />
        <!--script src="https://www.google.com/recaptcha/api.js?render=6LdRBpkUAAAAAKaRIKEKbbspNqp_joj6_-epmRk0"></script-->
        <style>
            body{background: transparent;}
            #lead-form-model .modal-body{padding: 0;}
            #lead_form{background: rgba(255,255,255,0.5);padding: 20px 15px 5px;border-radius: 3px;border: 1px solid #999;}
            #lead_form select, #lead_form input{height: 34px; padding: 6px 12px; margin-bottom: 15px;font-size: 12px;border:1px solid #ccc;}
            .txt-red{color:red}
            #lead-form-model .modal-dialog{margin-top:75px!important;}
            #lead_form button[type=submit]{width: 100%; margin-top: 15px; margin-bottom: 15px; height: 34px;padding: 7px;}
            .g-recaptcha{margin-bottom: 0;margin-top: 0;}
            #rc-imageselect {transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;} 
            @media screen and (max-height: 575px){ 
                /*#lead-form-model .modal-dialog{margin-top:0px!important;}*/
                #rc-imageselect, .g-recaptcha {transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;}
            }
            #lead_lang_id{display:inline!important}
            .lead_lang{width: 20px !important;height: 20px !important;display: inline;vertical-align: middle;padding: 0 !important;margin: 0 0 3px !important;}
            #lead_form label{float: left; color: #000; font-size: 11px;display: none}
            #lead-form-model .modal-title{text-align: left;}
            label{margin-bottom: 0!important;}
            .ss_ulsearch .search input{border-bottom: 1px solid #b6b0b0;padding: 10px 5px;}
            .ss_text{font-size: 14px;}
            .ss_button{padding: 7px 10px;}
            .ss_ulsearch{padding-left: 15px;}
            .hidden{display: none!important;}
            .ss_image{right: 7px; top: 13px;}
            .form-control{color: #444;font-size: 13px;}

            /*#nationality,#country,#country_code{display: inline-block!important; width: .5px; height: .5px; position: absolute; left: 18px; top: 12px; border: 0; padding: 0; margin: 0;}*/


            /*.submit-btn{position: sticky;bottom: 0;}*/
            .form-group {margin-bottom: .7rem;}
            .ss_text{width: 100%;text-overflow: unset!important;}
            .chosen-container{width:100%!important;background: #fff;border-radius: 3px;}
            .chosen-container-single .chosen-single{padding: 5px 0 0 8px;height: 37px;border-radius: 3px;background: none!important;border:1px solid #ced4da;color: #888!important;font-size: 0.8rem !important;}
            .chosen-container-active{color:#495057;background-color:#fff;border-color:#80bdff;outline:0;box-shadow:0 0 0 .2rem rgba(0,123,255,.25);border-radius: 3px;}
            error {
                color: red;
            }

            .with-select > span,
            .with-select > label.error {
                vertical-align: top;
                margin-top: 5px;
                display: inline-block;
            }
            .valid{display: none;}
            .invalid{display: inline; padding:0 5px;}
            .chosen-single span{color:#888}
            .txt-444{color:#444!important;}
            .txt-888{color:#888;}
            select option:first-child {
                color: #888;
            }
            select option{
                color: #444;
            }
            .chosen-container .chosen-drop{min-width: 200px!important}
            .grecaptcha-badge{display: none!important;}
            .txt-444{color: #444;font-size: 13px;}
            .btn-outline-dark{color: #4c4c4c; background-color: #fff; background-image: none; border-color: #fff; font-weight: bold;}
            .btn-outline-dark:hover { color: #fff; background-color:#1b1d20; border-color: #fff; } 
            .txt-white{color: #fff;font-size: 13px;}
        </style>
        <script>
            if (/Windows/i.test(window.navigator.userAgent) || /iP(od|hone)/i.test(window.navigator.userAgent) || /IEMobile/i.test(window.navigator.userAgent) || /Windows Phone/i.test(window.navigator.userAgent) || /BlackBerry/i.test(window.navigator.userAgent) || /BB10/i.test(window.navigator.userAgent) || /Android.*Mobile/i.test(window.navigator.userAgent)) {
                console.log('Chosen Select Inactive');
            } else {
                //console.log('Chosen Select Active');
                //document.write('<style>#nationality,#country,#country_code{display: inline-block!important; width: .5px; height: .5px; position: absolute; left: 18px; top: 12px; border: 0; padding: 0; margin: 0;}</style>');
            }
        </script>
    </head>
    <body style="background:rgba(21, 88, 149, 0.8)">
        <div align="center" >
            
            <h4 style="color:#fff; text-align:right; margin: 0 auto; padding: 0 25px; font-size:20px; font-weight:bold;">
                <a href="/logout" class="logout" style="color:#fff;">Logout</a>
            </h4>
            
            
            <form id="lead-form" action="https://azizidevelopments.com/save-lead-salesforace" method="post" >
                <table width="440" cellpadding="7"  cellspacing="7" style="background: #fff;margin-top: 50px;">
                    <tr>
                        <td colspan="3">
                            <h5 class="text-center" style="margin: 0">ENQUIRE NOW</h5>
                        </td>
                    </tr>
                    
                    <tr>
                        <td colspan="3">
                            <input type="text" class="form-control lead_name"  placeholder="Full Name*"  name="name" id="name"  maxlength="30">
                            <small  class="txt-red valid" id='msg-name'>Please enter your full name.</small>
                        </td>
                    </tr>
                    
                    <tr>
                        <td colspan="3">
                            <input type="email" class="form-control lead_email"  placeholder="Email Address*"  name="email" id="email"  maxlength="50" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$">
                            <small  class="txt-red valid" id='msg-email'>Please enter your Email Address.</small>
                        </td>
                    </tr>
                    
                    <tr>
                        <td colspan="3">
                            <select name="age" id="age" class="form-control chosen-select txt-888" >
                                <option value="">Select Age Range *</option>
                                <option value="18-25">18-25</option>
                                <option value="26-35">26-35</option>
                                <option value="36-45">36-45</option>
                                <option value="46-55">46-55</option>
                                <option value="56-65">56-65</option>
                                <option value="66-75">66-75</option>
                                <option value="76-85">76-85</option>
                                <option value="86-95">86-95</option>
                                <option value="96-100">96-100</option>
                            </select>    
                        </td>
                    </tr>
                    
                    <tr>
                        <td colspan="3" style="padding:0 5px;">
                            <small  class="txt-red valid" id='msg-age'>Please select your age range.</small-->
                        </td>
                    </tr>
                    
                    <tr>
                        <td colspan="3">
                            <input type="text" class="form-control lead_wystay"  placeholder="Where you stay"  name="wystay" id="wystay"  maxlength="50">
                            <small  class="txt-red valid" id='msg-wystay'>Please enter where you stay.</small>
                        </td>
                    </tr>

                    <tr>
                        <td style="width: 120px;padding-bottom:0;">
                            <select name="country_code" id="country_code" class="form-control chosen-select txt-888" >
                                <option value="">Country Code*</option>
                                <?php
                                foreach ($country_codes as $country) {
                                    $selected = ''; //$country->code == '+971' ? 'selected' : '';
                                    echo "<option value='{$country->code}' $selected data-name='{$country->name}'>{$country->code} ({$country->name})</option>";
                                }
                                ?>
                            </select>
                        </td>
                        <td colspan="2" style="padding-bottom:0;">
                            <input type="text" pattern="\d*" minlength="8" maxlength="10" class="form-control lead_mobile"  placeholder="Mobile Number*" id="mobile" name="mobile" title="Mobile number should only contain digit.">
                        </td>
                    </tr>
                    
                    <tr>
                        <td colspan="3" style="padding: 0 5px;">
                            <small  class="txt-red valid" id='msg-country_code'>Plase enter country code.</small>
                            <small  class="txt-red valid" id='msg-mobile'>Please enter mobile number.</small> 
                        </td>
                    </tr>

                    <tr>
                        <td colspan="3" style="padding: 12px 8px 0px 8px;">
                            <select name="nationality" id="nationality" class="form-control chosen-select txt-888" >
                                <option value="">Nationality*</option>
                                <?php
                                foreach ($countries as $country) {
                                    echo " <option value='{$country->name}'>{$country->name}</option>";
                                }
                                ?>
                            </select>
                            <small  class="txt-red valid" id='msg-nationality'>Please select your nationality.</small>
                        </td>
                    </tr>
                    
                    <tr style="display:none">
                        <td colspan="3">
                            <select name="country" id="country" class="form-control chosen-select txt-888" >
                                <option value="">Country of Residence*</option>
                                <?php
                                foreach ($countries as $country) {
                                    $selected = $country->name == 'UAE' ? 'selected' : '';
                                    echo " <option value='{$country->name}' $selected data-code='{$country->code}'>{$country->name}</option>";
                                }
                                ?>
                            </select>
                            <small  class="txt-red valid" id='msg-country'>Please select your residence country.</small>
                        </td>
                    </tr>
                    
                    <tr style="display:none">
                        <td colspan="3">
                            <select name="language" id="language" class="form-control txt-888" data-placeholder="Language*">
                                <option value="">Language *</option>
                                <option value="Arabic">Arabic</option>
                                <option value="English" selected="selected">English</option>
                                <option value="Hindi/Urdu">Hindi/Urdu</option>
                            </select>
                            <small  class="txt-red valid" id='msg-language'>Please select language.</small>
                        </td>
                    </tr>
                    
                    <tr style="display:none">
                        <td colspan="3">
                            <input type="text" class="form-control lead_city"  placeholder="City"  name="city" >
                        </td>
                    </tr>
                    
                    <tr>
                        <td colspan="3">
                            <select name="source" id="source" class="form-control txt-888" style="margin-top: 7px;">
                                <option value="">Source *</option>
                                <!--option value="Airport">Airport</option>
                                <option value="La Mer">La Mer</option>
                                <option value="Ibn Battuta Mall">Ibn Battuta Mall</option>
                                <option value="City Walk">City Walk</option>
                                <option value="Hilton JBR">Hilton JBR</option-->
                                <option value="Events">Events</option>
                                <option value="Hilton Hotel">Hilton Hotel</option>
                                <option value="Dragon Mart">Dragon Mart</option>
                                <option value="Others">Others</option>
                            </select>
                            <small  class="txt-red valid" id='msg-source'>Please select source.</small>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <select name="gender" id="gender" class="form-control txt-888" style="margin-top: 7px;">
                                <option value="">Gender *</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            
                        </td>
                        <td>
                            <select name="uae_residence" id="uae_residence" class="form-control txt-888" style="margin-top: 7px;">
                                <option value="">UAE Residence</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                            
                        </td>
                        <td>
                            <select name="hot_leads" id="hot_leads" class="form-control txt-888" style="margin-top: 7px;">
                                <option value="">Hot Leads</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                            
                        </td>                        
                    </tr>
                    
                    <tr>
                        <td colspan="3">
                            <small  class="txt-red valid" id='msg-gender'>Please select gender.</small>
                            <small  class="txt-red valid" id='msg-uae_residence'>Please select residence.</small>
                            <small  class="txt-red valid" id='msg-hot_leads'>Please select hot leads.</small>
                        </td>
                    </tr>
                    
                    <tr>
                        <td colspan="3">
                            <input type="hidden" class="form-control lead_managerr" name="manager" id="manager" value="Hanna" maxlength="50">
                            <input type="hidden" class="form-control lead_kiosk"  name="kiosk" id="kiosk" value="true" maxlength="50">
                            <input type="text" class="form-control lead_promoter"  placeholder="Agent Name"  name="promoter" id="promoter" maxlength="50">
                            <small  class="txt-red valid" id='msg-promoter'>Please enter agent name.</small>
                        </td>
                    </tr>                    
                    <tr>
                        <td colspan="3">
                            <textarea type="text" class="form-control lead_comment"  placeholder="Comment"  name="comment" rows="10" ></textarea>
                        </td>
                    </tr>
                    <tr style="display:none">
                        <td colspan="3">
                            <label>
                                <input type="checkbox" name="newsletter" id="newsletter" style="margin-right: 5px;"  value="1"> 
                                <span class="txt-white">Keep me updated on property launches & offers</span>
                            </label>
                        </td>
                    </tr>
                    <!--tr>
                        <td colspan="3">
                            <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
                            <input type="hidden" name="action" value="validate_captcha_Agent">
                            <small  class="txt-red invalid" id='msg-captcha'></small>
                        </td>
                    </tr-->
                    <tr>
                        <td colspan="3">
                            <input type="hidden" class="form-control lead_campaign"  name="campaign" value="">
                            <input type="hidden" class="form-control lead_url" name="url" value="">
                            <div class="alert alert-success hidden"><strong>Success!</strong> Your information has been submitted successfully.</div>
                            <button type="submit" class="btn btn-dark btn-block submit-btn"  value="Submit" name="Save">Submit</button><br/>
                        </td>
                    </tr>
                </table>                
            </form>
        </div>
        <script src="https://azizidevelopments.com/lead-form/js/jquery-popper-bootstrap-chosen-compress.js"></script>
        <script src="https://azizidevelopments.com/lead-form/js/agents-custom-1.js"></script>
        <script>
            //jQuery.ajax({url: '<?= url('cache-page') ?>', method: 'post', cache: false, data: {page_url: '<?= Request::url() ?>', user_id: '1'}, success: function (html) { }});
            /*grecaptcha.ready(function () {
                grecaptcha.execute('6LdRBpkUAAAAAKaRIKEKbbspNqp_joj6_-epmRk0', {action: 'validate_captcha_Agent'}).then(function (token) {
                    document.getElementById('g-recaptcha-response').value = token;

                });
            });*/
            sessionStorage.setItem("lead_url", '<?= Request::fullurl() ?>');
            sessionStorage.setItem("thank_url", '<?= Request::fullurl() ?>');
            sessionStorage.setItem("website_page_url", '<?= Request::fullurl() ?>');
        </script>
    </body>
</html>

