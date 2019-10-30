<?php
$countries = DB::table('country')->where('status', 1)->orderBy('name', 'asc')->get();
$country_codes = DB::table('country')->where('status', 1)->orderBy('sort_order', 'desc')->orderBy('code', 'asc')->get();
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Push Leads</title>
        <style>
            #main{width:100%;margin: 20px auto}
            textarea{width: 100%;height: 250px; }
            span{background: gray; color: #fff; padding: 10px; border: 1px solid #000; border-radius: 3px;}
            .input{padding: 0 5px; margin: 5px; width: 100%; height: 35px; border-radius: 4px; border: 1px solid #666;}
            .submit{height: 35px; background: #03A9F4; color: #fff; border-radius: 4px; border: 0;}
        </style>
        <script src="https://www.google.com/recaptcha/api.js?render=6LdRBpkUAAAAAKaRIKEKbbspNqp_joj6_-epmRk0"></script>
    </head>
    <body>

        <div id='main'>
            <?php
            $input_get = filter_input_array(INPUT_GET);
            if (!empty($input_get['status'])) {
                echo "<h4>{$input_get['status']}</h4>";
            }
            if (!empty($epms)) {
                print_r($epms);
            }
            if (!empty($sf)) {
                print_r($sf);
            }
            ?>

            <a href="<?= SITE_URL ?>/push-lead/import">Push Import Leads</a>

            <table style="width:100%" cellpadding="10" cellspacing="10">
                <tr>
                    <td width="600">
                        <?= !empty($msg) ? $msg : ''; ?>
                        <?= !empty($response) ? print_r($response) : ''; ?>
                        <form method="post" action="{{route('push-lead')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input type="password" name="key" placeholder="Access Key"  value="<?= !empty($input_get['key']) ? $input_get['key'] : '' ?>" class="input" required="required" pattern="2019@Leads" style="color:blue"><br/><br/>

                            <input type="text" name="name"  placeholder="Full Name" class="input"  maxlength="30"><br/>
                            <input list="email" name="email" placeholder="Email" class="input"  maxlength="50"><br/>
                            <table style="width:100%;">
                                <tr>
                                    <td style="width:150px">
                                        <select name="country_code"  class="input">
                                            <option value="">Country Code*</option>
                                            <?php
                                            foreach ($country_codes as $country) {
                                                echo "<option value='{$country->code}' data-name='{$country->name}'>{$country->code} ({$country->name})</option>";
                                            }
                                            ?>
                                        </select>
                                    </td> 
                                    <td>
                                        <input list="number" name="mobile" placeholder="Mobile Number" class="input" minlength="8" maxlength="10">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:150px">
                                        <select name="phone_country_code"  class="input">
                                            <option value="">Country Code*</option>
                                            <?php
                                            foreach ($country_codes as $country) {
                                                echo "<option value='{$country->code}' data-name='{$country->name}'>{$country->code} ({$country->name})</option>";
                                            }
                                            ?>
                                        </select>
                                    </td> 
                                    <td>
                                        <input list="number" name="phone" placeholder="Phone Number" class="input"  minlength="8" maxlength="10">
                                    </td>
                                </tr>
                            </table>


                            <input list="language" name="language" placeholder="language" class="input">
                            <datalist id="language">
                                <option value="English">
                                <option value="Arabic">
                                <option value="Urdu">
                                <option value="Hindi">
                            </datalist>
                            <br/>
                            <input list="source" name="source" placeholder="Source *" class="input" required>
                            <datalist id="source" >
                                <option value="99 Acres">
                                <option value="Bayut Listings">
                                <option value="Dubizzle Listings">
                                <option value="Facebook">
                                <option value="Instagram">
                                <option value="Digitas Linkedin">
                                <option value="Digitas Bayut">
                                <option value="Digitas Maddict">
                                <option value="Digitas Souqalmal">
                                <option value="Digitas Yallacompare"> 
                                <option value="Digitas Property Geeks"> 
                                <option value="Property Finder">
                                <option value="Website">
                            </datalist>
                            <br/>
                            <input type="text" name="city" placeholder="City" class="input"><br/>

                            <select name="country" id="country" class="input" >
                                <option value="">Country of Residence*</option>
                                <?php
                                foreach ($countries as $country) {
                                    echo " <option value='{$country->name}' data-code='{$country->code}'>{$country->name}</option>";
                                }
                                ?>
                            </select>
                            <br/>
                            <select name="nationality" id="nationality" class="input" required>
                                <option value="">Nationality*</option>
                                <?php
                                foreach ($countries as $country) {
                                    echo " <option value='{$country->name}' >{$country->name}</option>";
                                }
                                ?>
                            </select>
                            <br/>
                            <input list="campaign" name="campaign" placeholder="Campaign" class="input">
                            <datalist id="campaign" >
                                <option value="Azizi Riviera">
                                <option value="Azizi Mina">
                                <option value="Al Furjan">
                                <option value="Call Summary">
                                <option value="Facebook Chat">
                                <option value="Facebook Comment">
                                <option value="Property Listing">
                            </datalist>
                            <br/>
                            <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
                            <input type="hidden" name="action" value="validate_captcha">
                            <small  class="txt-red invalid" id='msg-captcha'></small>
                            <br/>
                            <input type="text" name="comment" placeholder="Comment"  class="input"><br/>
                            <input type="hidden" name="redirect_url" value="<?= SITE_URL ?>/push-lead"><br/>
                            <input type='submit' name="insert" value="Push Lead" class="input submit"><br/>
                            <input type='reset' name="insert" value="Reset" class="input"><br/>
                        </form> 
                    </td>
                    <td>Property Finder
                        <textarea id="pf" rows="50"></textarea>
                        <br/><br/>
                        Bayut
                        <textarea id="bayut" rows="50"></textarea>
                        <div id="result"></div>
                    </td>
                </tr>
            </table>
        </div>


        <script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>

        <script>

grecaptcha.ready(function () {
    grecaptcha.execute('6LdRBpkUAAAAAKaRIKEKbbspNqp_joj6_-epmRk0', {action: 'validate_captcha'}).then(function (token) {
        document.getElementById('g-recaptcha-response').value = token;

    });
});

jQuery('#pf').blur(function () {
    if ($(this).val() !== '') {
        var text = $(this).val().split(/\r\n|\r|\n/g);
        var name = text[0].replace('Full Name:', '').trim();
        var email = text[1].replace('Email Address:', '').trim();
        var mobile = text[2].replace('Phone Number:', '').trim().replace(/ /g, '').replace('+971', '');
        var nationality = text[3].replace('Nationality:', '').trim();
        $('input[name=name]').val(name);
        $('input[name=email]').val(email);
        $('input[name=mobile]').val(mobile);
        $('input[name=nationality]').val(nationality);
        $('input[name=source]').val('Property Finder');
        $('input[name=campaign]').val('Al Furjan');
    }
});

jQuery('#bayut').blur(function () {
    if ($(this).val() !== '') {
        var text = $(this).val().split(/\r\n|\r|\n/g);
        var filtered = text.filter(function (el) {
            return el !== "";
        });
        console.log(filtered);
        var email = filtered[0].replace('Email:', '').trim();
        var name = filtered[1].replace('Name:', '').trim();
        var mobile = filtered[2].replace('Cell:', '').trim().replace(/ /g, '').replace('+971', '');
        var phone = filtered[4].replace('Contact:', '').trim().replace(/ /g, '').replace('+971', '');
        $('input[name=name]').val(name);
        $('input[name=email]').val(email);
        $('input[name=mobile]').val(mobile);
        $('input[name=phone]').val(phone);
        $('input[name=source]').val('Optimedia Bayut');
        $('input[name=campaign]').val('Azizi Riviera');
    }
});


        </script>
    </body>
</html>







