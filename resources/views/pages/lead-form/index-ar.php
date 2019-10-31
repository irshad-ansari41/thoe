<!DOCTYPE html>
<html lang="ar">
    <head>
        <title>Lead Form</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?=SITE_URL?>/lead-form/css/bootstrap-chosen-compress.css"/>
        <link rel="stylesheet" href="<?=SITE_URL?>/assets/ar-font/stylesheet.css" type="text/css">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">        
        <script src="https://www.google.com/recaptcha/api.js?render=6LdRBpkUAAAAAKaRIKEKbbspNqp_joj6_-epmRk0"></script>
        <style>
            body{direction: rtl;text-align: right; font-family:'AZD'!important;background: transparent;}
            #lead-form-model .modal-body{padding: 0;}
            #lead_form{background: rgba(255,255,255,0.5);padding: 20px 15px 5px;border-radius: 3px;border: 1px solid #999;}
            #lead_form select, #lead_form input{height: 34px; padding: 6px 12px; margin-bottom: 15px;font-size: 12px;border:1px solid #ccc;}
            .txt-red{color:red}
            .txt-white-err{color:#fff !important;}
            #lead-form-model .modal-dialog{margin-top:75px!important;}
            #lead_form button[type=submit]{width: 100%; margin-top: 15px; margin-bottom: 15px; height: 34px;padding: 7px;}
            .g-recaptcha{margin-bottom: 0;margin-top: 0;}
            #rc-imageselect {transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;} 
            @media screen and (max-height: 575px){ 
                #rc-imageselect, .g-recaptcha {transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;}
            }
            #lead_lang_id{display:inline!important}
            .lead_lang{width: 20px !important;height: 20px !important;display: inline;vertical-align: middle;padding: 0 !important;margin: 0 0 3px !important;}
            #lead_form label{float: left; color: #000; font-size: 11px;display: none}
            #lead-form-model .modal-title{text-align: left;}
            label{margin-bottom: 0!important;}
            .ss_ulsearch .search input{border-bottom: 1px solid #b6b0b0;padding: 10px 5px;}
            .ss_text{font-size: 14px;margin-right: 0!important;}
            .ss_button{padding: 7px 10px;text-align: right}
            .ss_ulsearch{padding-right: 15px;}
            .hidden{display: none!important;}
            .ss_image{right: 7px; top: 13px;}
            .form-control{color: #888;font-size: 13px;}
            .ss_ul li {text-align: right;}
            .ss_ulsearch .search input{background-position: top 8px left 6px;float: right}
            .ss_image{left: 7px;right: unset;}
            .form-group {margin-bottom: .7rem;}
            .ss_text{width: 100%;text-overflow: unset!important;}
            .chosen-container{width:100%!important;background: #fff;border-radius: 3px;}
            .chosen-container-single .chosen-single{padding: 5px  8px 0  0;height: 37px;border-radius: 3px;background: none!important;border:1px solid #ced4da;color: #888!important;font-size: 0.8rem !important;}
            .chosen-container-active{color:#495057;background-color:#fff;border-color:#80bdff;outline:0;box-shadow:0 0 0 .2rem rgba(0,123,255,.25);border-radius: 3px;}
            .chosen-container-single .chosen-single span{margin-right: 0px;}
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
            .invalid{display: inline;}
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
    <body>
        <div align="center" >
            <form id="lead-form" action="" method="post" >
                <table width="340" cellpadding="7"  cellspacing="7">
                    <tr>
                        <td colspan="2">
                            <input type="text" class="form-control lead_name"  placeholder="الاسم الكامل * "  name="name" id="name"  maxlength="40">
                            <small  class="txt-white-err valid" id='msg-name'>
                                الاسم الكامل
                            </small>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="email" class="form-control lead_email"  placeholder="البريد الإلكتروني *"  name="email" id="email" maxlength="50" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$">
                            <small  class="txt-white-err valid" id='msg-email'>
                                البريد الالكتروني
                            </small>
                        </td>
                    </tr>

                    <tr>
                        <td style="width: 120px;padding-bottom:0;">
                            <select name="country_code" id="country_code" class="form-control chosen-select  txt-888" >
                                <option value=""> البلد</option>
                                <?php
                                foreach ($country_codes as $country) {
                                    $selected = ''; //$country->code == '+971' ? 'selected' : '';
                                    echo " <option value='{$country->code}' $selected data-name='{$country->name}'>{$country->code} ({$country->name_ar})</option>";
                                }
                                ?>
                            </select>
                        </td>
                        <td style="padding-bottom:0;">
                            <input type="text" pattern="\d*" minlength="8" maxlength="10" class="form-control lead_mobile"  placeholder="رقم الهاتف *" name="mobile"  id="mobile" title="Mobile number should only contain digit.">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding: 0 5px;">
                            <small  class="txt-white-err valid" id='msg-country_code'>
                                البلد
                            </small>
                            <small  class="txt-white-err valid" id='msg-mobile'>
                            رقم الهاتف   
                            </small> 
                        </td>
                    </tr>
                    <tr style="display:none">
                        <td colspan="2">
                            <select name="nationality" id="nationality" class="form-control chosen-select  txt-888" >
                                <option value="">الجنسية</option>
                                <?php
                                foreach ($countries as $country) {
                                    echo " <option value='{$country->name}'>{$country->name_ar}</option>";
                                }
                                ?>
                            </select>
                            <small  class="txt-white-err valid" id='msg-nationality'>
                                الجنسية
                            </small>
                        </td>
                    </tr>
                    <tr style="display:none">
                        <td colspan="2">
                            <select name="country" id="country" class="form-control chosen-select  txt-888" >
                                <option value="">الرقم</option>
                                <?php
                                foreach ($countries as $country) {
                                    $selected = $country->name == 'UAE' ? 'selected' : '';
                                    echo " <option value='{$country->name}' $selected data-code='{$country->code}'>{$country->name_ar}</option>";
                                }
                                ?>
                            </select>
                            <small  class="txt-white-err valid" id='msg-country'>
                                الرقم
                            </small>
                        </td>
                    </tr>
                    <tr style="display:none">
                        <td colspan="2">
                            <select name="language" id="language" class="form-control txt-888" data-placeholder="اللّغة" >
                                <option value="">اللّغة*</option>
                                <option value="Arabic" selected="selected">Arabic</option>
                                <option value="English">English</option>
                                <option value="Hindi/Urdu">Hindi/Urdu</option>
                            </select>
                            <small  class="txt-white-err valid" id='msg-language'>
                                اللّغة
                            </small>
                        </td>
                    </tr>
                    <tr style="display:none">
                        <td colspan="2">
                            <input type="text" class="form-control lead_city"  placeholder="المدينة"  name="city" >
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label>
                                <input type="checkbox" name="newsletter" id="newsletter" style="margin-right: 5px;"  value="1"> 
                                <span class="txt-white">أرسلوا لي تفاصيل جميع المشاريع القادمة</span>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
                            <input type="hidden" name="action" value="validate_captcha">
                            <small  class="txt-white-err invalid" id='msg-captcha' style="display: none;">
                                انتهت الجلسة . يرجى إعادة التحميل
                            </small>
                            <small>
                                <a id="refreshbtn" style="color: #fff; position: relative; padding: 2px 0px 0px 0px; cursor: default; float: left; display:none;">
                                    إعادة التحميل
                                    &nbsp;<i class="fa fa-refresh"></i>
                                </a>
                            </small>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" class="form-control lead_source"  name="source" value="Website">
                            <input type="hidden" class="form-control lead_campaign"  name="campaign" value="">
                            <input type="hidden" class="form-control lead_url" name="url" >
                            <input type="hidden" class="form-control lead_medium"  name="medium" value="">
                            <input type="hidden" class="form-control lead_content"  name="content" value="">
                            <input type="hidden" class="form-control lead_term" name="term" value="">                            
                            <!--div class="alert alert-success hidden"><strong>نجاح!</strong> تم إرسال معلوماتك بنجاح.</div>
                            <div class="alert alert-danger hidden"><strong>خطأ!</strong> لم نفلح في العثور على إجابة ريكابتشا</div-->
                            <button type="submit" class="btn btn-outline-dark btn-block submit-btn"  value="Register Now" name="Save">سجل الآن</button>
                        </td>
                    </tr>
            </form>
        </div>
        <script src="<?=SITE_URL?>/lead-form/js/jquery-popper-bootstrap-chosen-compress.js"></script>
        <script src="<?=SITE_URL?>/lead-form/js/custom.js"></script>
        <script>
            //jQuery.ajax({url: '<?= url('cache-page') ?>', method: 'post', cache: false, data: {page_url: '<?= Request::url() ?>', user_id: '1'}, success: function (html) { }});
            grecaptcha.ready(function () {
                grecaptcha.execute('6LdRBpkUAAAAAKaRIKEKbbspNqp_joj6_-epmRk0', {action: 'validate_captcha'}).then(function (token) {
                    document.getElementById('g-recaptcha-response').value = token;

                });
            });
            //End
            
            $('#refreshbtn').click(function() {
                location.reload();
            });

        </script>
    </body>
</html>

