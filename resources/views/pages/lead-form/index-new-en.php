<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Lead Form</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet"  href="<?=SITE_URL?>/lead-form/css/bootstrap-chosen-compress.css"  />
        <link rel="stylesheet" type="text/css" href="<?=SITE_URL?>/assets/build/css/intlTelInput.css">
        <link rel="stylesheet" type="text/css" href="<?=SITE_URL?>/assets/build/css/demo.css">
        
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
            label{margin-bottom: 0!important;display: inline!important}
            .ss_ulsearch .search input{border-bottom: 1px solid #b6b0b0;padding: 10px 5px;}
            .ss_text{font-size: 14px;}
            .ss_button{padding: 7px 10px;}
            .ss_ulsearch{padding-left: 15px;}
            .hidden{display: none!important;}
            .ss_image{right: 7px; top: 13px;}
            .form-control{color: #444;font-size: 13px; border-radius:0.10rem !important;}

            /*#nationality,#country,#country_code{display: inline-block!important; width: .5px; height: .5px; position: absolute; left: 18px; top: 12px; border: 0; padding: 0; margin: 0;}*/


           .submit-btn{ background: #4c4c4c!important; color: #fff!important; border: none;border-radius: 0; }
            .form-group {margin-bottom: .7rem;}
            .ss_text{width: 100%;text-overflow: unset!important;}
            .chosen-container{width:100%!important;}
            .chosen-container-single .chosen-single{padding: 5px 0 0 12px;height: 38px;border-radius: 3px;background: #000!important;border:1px solid #fff;color: #888!important;font-size: 0.8rem !important;}
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
            .invalid{display: inline;padding-left: 8px;}
            .chosen-single span{color:#6c757d}
            .txt-444{color:#fff!important;}
            .txt-888{color:#888;}
            select option:first-child {
                color: #888;
            }
            select option{
                color: #444;
            }
            .btn-outline-dark{color: #4c4c4c; background-color: #fff; background-image: none; border-color: #fff; font-weight: bold;}
            #country_code_chosen{background: transparent!important}
            .newInput{background: transparent!important; border: none; border-bottom: 1px solid #524f4f; border-radius: 0; color: #fff!important; outline: none!important;}
            #country_code{background: #000!important;border: none; border-bottom: 1px solid #524f4f; padding: .375rem .75rem}
            .chosen-container-single .chosen-single{-webkit-box-shadow:none;border: none;border-bottom: 1px solid #524f4f;border-radius: 0;line-height: 27px;}
            .chosen-container .chosen-drop{min-width: 200px!important}
            .chosen-container-single .chosen-single span{margin-right: 0}
            table{width: 100%;}
            table tr td {padding-bottom: 15px;}
            .newInput{color:#66727b!important;}
            .intl-tel-input .country-list{ width: 255px !important;}
            #defaultAll{display: none;}
            .country{font-size:12px!important;}
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
    <body>
        <div class="container-fluid" style="padding:0">
            <form id="lead-form" action="" method="post" >
                <table>
                    <tr>
                        <td colspan="2">
                            <input type="text" class="form-control lead_name newInput"  placeholder="Full Name *"  name="name" id="name"  maxlength="40">
                            <small  class="txt-red valid" id='msg-name'>Please enter your name.</small>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="email" class="form-control lead_email newInput"  placeholder="Enter email *"  name="email" id="email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$">
                            <small  class="txt-red valid" id='msg-email'>Please enter your email.</small>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:130px;">
                            <input type="text" id="code" name="country_code" class="form-control newInput autocomplete input-box input-dir"  value="+971" required maxlength="4" >
                            <!--select name="country_code" id="country_code" class="form-control chosen-select txt-888" >
                                <option value="">Country Code*</option>
                                <?php
                                foreach ($country_codes as $country) {
                                    $selected = $country->code == '+971' ? 'selected' : '';
                                    echo " <option value='{$country->code}' $selected>{$country->code} ({$country->name})</option>";
                                }
                                ?>
                            </select-->
                        </td>
                        <td style="width:250px">
                            <input type="text" pattern="\d*" minlength="8" maxlength="10" class="form-control lead_phone newInput"  placeholder="Phone Number *" id="phone" name="phone" >
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding: 0;"> <small  class="txt-red valid" id='msg-country_code'>Please Select Country Code.</small><small  class="txt-red valid" id='msg-phone'>Please enter your phone number.</small></td>
                    </tr>
                </table>


                <div class="form-group row hidden">
                    <div class="col-sm-12 col-12 with-select">
                        <label for="nationality">Nationality:<span class="txt-red">*</span></label>
                        <select name="nationality" id="nationality" class="form-control chosen-select txt-888" >
                            <option value="">Nationality*</option>
                            <?php
                            foreach ($countries as $country) {
                                echo " <option value='{$country->name}'>{$country->name}</option>";
                            }
                            ?>
                        </select>
                        <small  class="txt-red valid" id='msg-nationality'>Please select your nationality.</small>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 hidden">
                        <div class="form-group with-select">
                            <label for="country">Country of Residence:<span class="txt-red">*</span></label>
                            <select name="country" id="country" class="form-control chosen-select txt-888" >
                                <option value="">Country of Residence*</option>
                                <?php
                                foreach ($countries as $country) {
                                    echo " <option value='{$country->name}' data-code='{$country->code}'>{$country->name}</option>";
                                }
                                ?>
                            </select>
                            <small  class="txt-red valid" id='msg-country'>Please select your residence country.</small>
                        </div>
                    </div>
                </div>
                <div class="row hidden">
                    <div class="col-sm-4 col-6">
                        <div class="form-group ">
                            <label for="lead_lang">Language:</label>
                            <select name="language" id="language" class="form-control txt-888" data-placeholder="Language *">
                                <option value="">Language *</option>
                                <option value="Arabic">Arabic</option>
                                <option value="English" selected="selected">English</option>
                                <option value="Hindi/Urdu">Hindi/Urdu</option>
                            </select>
                            <small  class="txt-red valid" id='msg-language'>Please select language.</small>
                        </div>
                    </div>
                    <div class="col-sm-8 col-6">
                        <div class="form-group">
                            <label for="lead_city">City:</label>
                            <input type="text" class="form-control lead_city"  placeholder="City"  name="city" >
                        </div>
                    </div>
                </div>
                <div class="form-group1 row hidden">
                    <div class="col-sm-12 col-12">
                        <label for="lead_recaptcha">Human Verification:</label>
                        <div class="g-recaptcha" data-sitekey="6LcBiWMUAAAAALtV6ji69xcW9QMcPGQq9w1tRoDn"></div>
                    </div>
                </div><br/>
                <div class="form-group row">
                    <div class="col-sm-12 col-12">
                        <input type="hidden" class="form-control lead_source"  name="source" value="Website">
                        <input type="hidden" class="form-control lead_campaign"  name="campaign" value="">
                        <input type="hidden" class="form-control lead_url" name="url" value="">
                        <div class="alert alert-success hidden"><strong>Success!</strong> Your information has been submitted successfully.</div>
                        <button type="submit" class="btn btn-primary btn-block submit-btn"  value="Submit" name="Save">Submit</button>
                    </div>
                </div><br/><br/>
            </form>
        </div>
        <script src="<?=SITE_URL?>/lead-form/js/jquery-popper-bootstrap-chosen-compress.js"></script>
        <script src="<?=SITE_URL?>/lead-form/js/custom.js"></script>

        <script type="text/javascript" src="<?=SITE_URL?>/assets/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="<?=SITE_URL?>/assets/build/js/intlTelInput.js"></script>
        <script type="text/javascript" src="<?=SITE_URL?>/assets/js/payment_form.js"></script>
        <script>
        
        //$("select[required]").css({position: "absolute", display: "inline", height: 0, padding: 0, width: 0});
        $("#code").intlTelInput({
            /*formatOnDisplay: true,
            geoIpLookup: function (callback) {
                $.get("http://ipinfo.io", function () { }, "jsonp").always(function (resp) {
                    var countryCode = (resp && resp.country) ? resp.country : "";
                    callback(countryCode);
                });
            },
            initialCountry: "auto",
            defaultCountry: "ae",
            nationalMode: true,
            separateDialCode: true,*/
            nationalMode: false,
            autoHideDialCode: false,
            preferredCountries: ['ae'],
            
            utilsScript: "<?=SITE_URL?>/assets/build/js/utils.js"
        });
        

        </script> 
        
        <script>jQuery.ajax({url: '<?= url('cache-page') ?>', cache: false, data: {page_url: '<?= Request::url() ?>', user_id: '1'}, success: function (html) { }});</script>
    </body>
</html>

