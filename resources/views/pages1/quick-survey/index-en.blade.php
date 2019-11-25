<!DOCTYPE>
<html>
    <head>
        <META HTTP-EQUIV='Content-Type' CONTENT='text/html; charset=UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>Quick Survey</title>
        <link href='//fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
        <link rel="shortcut icon" href="<?=SITE_URL?>/assets/favicon/apple-icon-57x57.png">
        <link rel="stylesheet prefetch" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link href="<?=SITE_URL?>/assets/css/selectstyle.css" rel="stylesheet" type="text/css"/>
        <style>
            @import "//fonts.googleapis.com/css?family=Roboto:400,300,600,400italic";
            *{margin:0;padding:0;box-sizing:border-box;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;-webkit-font-smoothing:antialiased;-moz-font-smoothing:antialiased;-o-font-smoothing:antialiased;font-smoothing:antialiased;text-rendering:optimizeLegibility}
            body{font-family:'PT Sans',sans-serif;font-weight:100;font-size:14px;line-height:30px;color:#777;background:#1B619A}
            p{line-height:25px}
            a{color:#777;text-decoration:none}
            input[type='radio']{height: 0px; width: 0px; margin-left: 15px !important;-webkit-appearance: inherit;border-color: #f9f9f9!important;}
            .container{max-width:1000px;width:100%;margin:0 auto;position:relative;background:#fff}
            .frm-container1{width:50%;position:relative;float:left;border-right:2px solid #ccc}
            .frm-container2{width:50%;position:relative;float:left;border-right:2px solid #ccc}
            .contact-form input[type="text"],.contact-form input[type="email"],.contact-form input[type="tel"],.contact-form input[type="url"],.contact-form textarea,.contact-form button[type="submit"]{}
            .contact-form{background:#F9F9F9;padding:0 25px;margin:0}
            .contact-form h3{display:block;font-size:20px;font-weight:300;margin-bottom:10px}
            .contact-form h4{margin:5px 0 15px;display:block;font-size:13px;font-weight:400}
            fieldset{border:medium none!important;margin:0 0 10px;min-width:100%;padding:0;width:100%}
            .contact-form input[type="text"],.contact-form input[type="email"],.contact-form input[type="tel"],.contact-form input[type="url"],.contact-form textarea{width:100%;border:1px solid #ccc;background:#FFF;margin:0 0 5px;padding:10px}
            .contact-form input[type="text"]:hover,.contact-form input[type="email"]:hover,.contact-form input[type="tel"]:hover,.contact-form input[type="url"]:hover,.contact-form textarea:hover{-webkit-transition:border-color .3s ease-in-out;-moz-transition:border-color .3s ease-in-out;transition:border-color .3s ease-in-out;border:1px solid #aaa}
            .contact-form textarea{height:150px;max-width:100%;resize:none}
            .contact-form button[type="submit"]{cursor:pointer;width:100%;border:none;background:#1B619A;color:#FFF;margin:0 0 5px;padding:6px;font-size:15px}
            .contact-form button[type="submit"]:hover{background:#43A047;-webkit-transition:background .3s ease-in-out;-moz-transition:background .3s ease-in-out;transition:background-color .3s ease-in-out}
            .contact-form button[type="submit"]:active{box-shadow:inset 0 1px 3px rgba(0,0,0,0.5)}
            .contact-form button[type="button"]{cursor:pointer;width:100%;border:none;background:rgba(99,99,99,0.5);color:#FFF;margin:0 0 5px;padding:0 10px;font-size:15px}
            .contact-form button[type="button"]:hover{background:#ef9027;-webkit-transition:background .3s ease-in-out;-moz-transition:background .3s ease-in-out;transition:background-color .3s ease-in-out}
            .copyright{text-align:center}
            .contact-form input:focus,.contact-form textarea:focus{outline:0;border:1px solid #aaa}
            ::-webkit-input-placeholder{color:#555}
            :-moz-placeholder{color:#555}
            ::-moz-placeholder{color:#555}
            :-ms-input-placeholder{color:#555}
            .nopadding{padding:0}
            hr { margin-top: 10px; margin-bottom: 10px; border: 0; border-top: 1px solid #eee; }
            @media only screen and (max-width: 640px) {
                .radio-inline+.radio-inline, .checkbox-inline+.checkbox-inline{margin-left: 0;}
                .radio-inline, .checkbox-inline{margin-bottom: 15px;text-align: center;}
            }
            @media only screen and (min-width: 640px) {
                .radio-inline, .checkbox-inline{text-align: center;}
            }
            /*input[type='radio']{visibility: hidden}*/
            .emoji{border-radius: 50%; width: 50px;margin-left: 10px; }
            .Excellent{background: #8ec640;color:#fff}
            .Good{background: #f3ce10;color:#fff}
            .Neutral{background: #f79520;color:#000}
            .Poor{background: #f1592c;color:#fff}
            .Very-Poor{background: #ec1f27;color:#fff}
            .active{padding: 5px 0;}
            .lang{ float: right; margin-right: 20px; margin-top: 14px; }
            option:first-child{color: #888;}
            .form-control{color:#888;}
            
        </style>

    </head>
    <body><br/>
        <?php
        $get = filter_input_array(INPUT_GET);
        $scale = ['5' => 'Excellent', '4' => 'Good', '3' => 'Neutral', '2' => 'Poor', '1' => 'Very Poor'];
        $color = ['5' => '#8ec640', '4' => '#f3ce10', '3' => '#f79520', '2' => '#f1592c', '1' => '#ec1f27'];
        $source = ['1' => 'Online', '2' => 'Radio', '3' => 'Print', '4' => 'Outdoor', '5' => 'Social Media', '6' => 'Friend/Referral'];
        ?>
        <div class="container">  
            <div class="row" >
                <div class="col-lg-12">
                    <div style="position: fixed; height: 90px; width: 100%; background: #fff; top: 0; z-index: 9999; max-width: 1000px; margin-left: -15px;border-bottom: 1px solid #ddd;">
                        <a href="<?=SITE_URL?>/en/quick-survey-lp"><img alt="logo" src="//thoe.com/assets/images/logo-retina-light1.png" style="width: 150px;margin-top:10px;margin-left:10px;"></a>
                        <a class="lang" href="<?=SITE_URL?>/ar/quick-survey">العربية</a>
                        <div class="progress" style="margin-left:15px;margin-right:15px;margin-top:5px;">
                            <div id="que1" class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="1" style="width:0%">

                            </div>
                            <div id="que2" class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="1" style="width:0%">

                            </div>
                            <div id="que3" class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="1" style="width:0%">

                            </div>
                            <div id="que4" class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="1" style="width:0%">

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">  

            <form id="clientForm" action="{{route('quick-survey.store')}}" method="post" class="contact-form" style="margin-top: 40px;min-height: 800px;">
                <br/>
                @if(!empty($get['status']) && $get['status']=='success')
                <div class="alert alert-success" style="margin-top: 40px;text-align: center;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <h3 style=" margin-top: 0;font-weight: 700 ">Thank You for your Feedback.</h3>
                    <strong>Your details have been sent successfully !</strong>
                    <div id="msg"></div>
                </div>
                @endif

                @if(!empty($get['status']) && $get['status']=='failed')
                <div class="alert alert-danger"  style="margin-top: 40px;text-align: center;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Warning!</strong> Please select answer before submit.
                </div>
                @endif

                @if(empty($get['status']))
                <h3 style=" margin-top: 0;font-weight: 700 ">Customer Satisfaction Survey</h2>

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Full Name" required="required">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Email Address" required="required">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="number" name="phone" class="form-control" placeholder="Phone Number" required="required" maxlength="15">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <select name="nationality" id="nationality" class="form-control" required="required" data-placeholder="Nationality" data-search="true">
                                    <option value="Afganistan">Afghanistan</option>
                                    <option value="Albania">Albania</option>
                                    <option value="Algeria">Algeria</option>
                                    <option value="American Samoa">American Samoa</option>
                                    <option value="Andorra">Andorra</option>
                                    <option value="Angola">Angola</option>
                                    <option value="Anguilla">Anguilla</option>
                                    <option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Armenia">Armenia</option>
                                    <option value="Aruba">Aruba</option>
                                    <option value="Australia">Australia</option>
                                    <option value="Austria">Austria</option>
                                    <option value="Azerbaijan">Azerbaijan</option>
                                    <option value="Bahamas">Bahamas</option>
                                    <option value="Bahrain">Bahrain</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="Barbados">Barbados</option>
                                    <option value="Belarus">Belarus</option>
                                    <option value="Belgium">Belgium</option>
                                    <option value="Belize">Belize</option>
                                    <option value="Benin">Benin</option>
                                    <option value="Bermuda">Bermuda</option>
                                    <option value="Bhutan">Bhutan</option>
                                    <option value="Bolivia">Bolivia</option>
                                    <option value="Bonaire">Bonaire</option>
                                    <option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
                                    <option value="Botswana">Botswana</option>
                                    <option value="Brazil">Brazil</option>
                                    <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                    <option value="Brunei">Brunei</option>
                                    <option value="Bulgaria">Bulgaria</option>
                                    <option value="Burkina Faso">Burkina Faso</option>
                                    <option value="Burundi">Burundi</option>
                                    <option value="Cambodia">Cambodia</option>
                                    <option value="Cameroon">Cameroon</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Canary Islands">Canary Islands</option>
                                    <option value="Cape Verde">Cape Verde</option>
                                    <option value="Cayman Islands">Cayman Islands</option>
                                    <option value="Central African Republic">Central African Republic</option>
                                    <option value="Chad">Chad</option>
                                    <option value="Channel Islands">Channel Islands</option>
                                    <option value="Chile">Chile</option>
                                    <option value="China">China</option>
                                    <option value="Christmas Island">Christmas Island</option>
                                    <option value="Cocos Island">Cocos Island</option>
                                    <option value="Colombia">Colombia</option>
                                    <option value="Comoros">Comoros</option>
                                    <option value="Congo">Congo</option>
                                    <option value="Cook Islands">Cook Islands</option>
                                    <option value="Costa Rica">Costa Rica</option>
                                    <option value="Cote DIvoire">Cote D'Ivoire</option>
                                    <option value="Croatia">Croatia</option>
                                    <option value="Cuba">Cuba</option>
                                    <option value="Curaco">Curacao</option>
                                    <option value="Cyprus">Cyprus</option>
                                    <option value="Czech Republic">Czech Republic</option>
                                    <option value="Denmark">Denmark</option>
                                    <option value="Djibouti">Djibouti</option>
                                    <option value="Dominica">Dominica</option>
                                    <option value="Dominican Republic">Dominican Republic</option>
                                    <option value="East Timor">East Timor</option>
                                    <option value="Ecuador">Ecuador</option>
                                    <option value="Egypt">Egypt</option>
                                    <option value="El Salvador">El Salvador</option>
                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                    <option value="Eritrea">Eritrea</option>
                                    <option value="Estonia">Estonia</option>
                                    <option value="Ethiopia">Ethiopia</option>
                                    <option value="Falkland Islands">Falkland Islands</option>
                                    <option value="Faroe Islands">Faroe Islands</option>
                                    <option value="Fiji">Fiji</option>
                                    <option value="Finland">Finland</option>
                                    <option value="France">France</option>
                                    <option value="French Guiana">French Guiana</option>
                                    <option value="French Polynesia">French Polynesia</option>
                                    <option value="French Southern Ter">French Southern Ter</option>
                                    <option value="Gabon">Gabon</option>
                                    <option value="Gambia">Gambia</option>
                                    <option value="Georgia">Georgia</option>
                                    <option value="Germany">Germany</option>
                                    <option value="Ghana">Ghana</option>
                                    <option value="Gibraltar">Gibraltar</option>
                                    <option value="Great Britain">Great Britain</option>
                                    <option value="Greece">Greece</option>
                                    <option value="Greenland">Greenland</option>
                                    <option value="Grenada">Grenada</option>
                                    <option value="Guadeloupe">Guadeloupe</option>
                                    <option value="Guam">Guam</option>
                                    <option value="Guatemala">Guatemala</option>
                                    <option value="Guinea">Guinea</option>
                                    <option value="Guyana">Guyana</option>
                                    <option value="Haiti">Haiti</option>
                                    <option value="Hawaii">Hawaii</option>
                                    <option value="Honduras">Honduras</option>
                                    <option value="Hong Kong">Hong Kong</option>
                                    <option value="Hungary">Hungary</option>
                                    <option value="Iceland">Iceland</option>
                                    <option value="India">India</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="Iran">Iran</option>
                                    <option value="Iraq">Iraq</option>
                                    <option value="Ireland">Ireland</option>
                                    <option value="Isle of Man">Isle of Man</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Jamaica">Jamaica</option>
                                    <option value="Japan">Japan</option>
                                    <option value="Jordan">Jordan</option>
                                    <option value="Kazakhstan">Kazakhstan</option>
                                    <option value="Kenya">Kenya</option>
                                    <option value="Kiribati">Kiribati</option>
                                    <option value="Korea North">Korea North</option>
                                    <option value="Korea Sout">Korea South</option>
                                    <option value="Kuwait">Kuwait</option>
                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                    <option value="Laos">Laos</option>
                                    <option value="Latvia">Latvia</option>
                                    <option value="Lebanon">Lebanon</option>
                                    <option value="Lesotho">Lesotho</option>
                                    <option value="Liberia">Liberia</option>
                                    <option value="Libya">Libya</option>
                                    <option value="Liechtenstein">Liechtenstein</option>
                                    <option value="Lithuania">Lithuania</option>
                                    <option value="Luxembourg">Luxembourg</option>
                                    <option value="Macau">Macau</option>
                                    <option value="Macedonia">Macedonia</option>
                                    <option value="Madagascar">Madagascar</option>
                                    <option value="Malaysia">Malaysia</option>
                                    <option value="Malawi">Malawi</option>
                                    <option value="Maldives">Maldives</option>
                                    <option value="Mali">Mali</option>
                                    <option value="Malta">Malta</option>
                                    <option value="Marshall Islands">Marshall Islands</option>
                                    <option value="Martinique">Martinique</option>
                                    <option value="Mauritania">Mauritania</option>
                                    <option value="Mauritius">Mauritius</option>
                                    <option value="Mayotte">Mayotte</option>
                                    <option value="Mexico">Mexico</option>
                                    <option value="Midway Islands">Midway Islands</option>
                                    <option value="Moldova">Moldova</option>
                                    <option value="Monaco">Monaco</option>
                                    <option value="Mongolia">Mongolia</option>
                                    <option value="Montserrat">Montserrat</option>
                                    <option value="Morocco">Morocco</option>
                                    <option value="Mozambique">Mozambique</option>
                                    <option value="Myanmar">Myanmar</option>
                                    <option value="Nambia">Nambia</option>
                                    <option value="Nauru">Nauru</option>
                                    <option value="Nepal">Nepal</option>
                                    <option value="Netherland Antilles">Netherland Antilles</option>
                                    <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                    <option value="Nevis">Nevis</option>
                                    <option value="New Caledonia">New Caledonia</option>
                                    <option value="New Zealand">New Zealand</option>
                                    <option value="Nicaragua">Nicaragua</option>
                                    <option value="Niger">Niger</option>
                                    <option value="Nigeria">Nigeria</option>
                                    <option value="Niue">Niue</option>
                                    <option value="Norfolk Island">Norfolk Island</option>
                                    <option value="Norway">Norway</option>
                                    <option value="Oman">Oman</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="Palau Island">Palau Island</option>
                                    <option value="Palestine">Palestine</option>
                                    <option value="Panama">Panama</option>
                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                    <option value="Paraguay">Paraguay</option>
                                    <option value="Peru">Peru</option>
                                    <option value="Phillipines">Philippines</option>
                                    <option value="Pitcairn Island">Pitcairn Island</option>
                                    <option value="Poland">Poland</option>
                                    <option value="Portugal">Portugal</option>
                                    <option value="Puerto Rico">Puerto Rico</option>
                                    <option value="Qatar">Qatar</option>
                                    <option value="Republic of Montenegro">Republic of Montenegro</option>
                                    <option value="Republic of Serbia">Republic of Serbia</option>
                                    <option value="Reunion">Reunion</option>
                                    <option value="Romania">Romania</option>
                                    <option value="Russia">Russia</option>
                                    <option value="Rwanda">Rwanda</option>
                                    <option value="St Barthelemy">St Barthelemy</option>
                                    <option value="St Eustatius">St Eustatius</option>
                                    <option value="St Helena">St Helena</option>
                                    <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                    <option value="St Lucia">St Lucia</option>
                                    <option value="St Maarten">St Maarten</option>
                                    <option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
                                    <option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
                                    <option value="Saipan">Saipan</option>
                                    <option value="Samoa">Samoa</option>
                                    <option value="Samoa American">Samoa American</option>
                                    <option value="San Marino">San Marino</option>
                                    <option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                    <option value="Senegal">Senegal</option>
                                    <option value="Serbia">Serbia</option>
                                    <option value="Seychelles">Seychelles</option>
                                    <option value="Sierra Leone">Sierra Leone</option>
                                    <option value="Singapore">Singapore</option>
                                    <option value="Slovakia">Slovakia</option>
                                    <option value="Slovenia">Slovenia</option>
                                    <option value="Solomon Islands">Solomon Islands</option>
                                    <option value="Somalia">Somalia</option>
                                    <option value="South Africa">South Africa</option>
                                    <option value="Spain">Spain</option>
                                    <option value="Sri Lanka">Sri Lanka</option>
                                    <option value="Sudan">Sudan</option>
                                    <option value="Suriname">Suriname</option>
                                    <option value="Swaziland">Swaziland</option>
                                    <option value="Sweden">Sweden</option>
                                    <option value="Switzerland">Switzerland</option>
                                    <option value="Syria">Syria</option>
                                    <option value="Tahiti">Tahiti</option>
                                    <option value="Taiwan">Taiwan</option>
                                    <option value="Tajikistan">Tajikistan</option>
                                    <option value="Tanzania">Tanzania</option>
                                    <option value="Thailand">Thailand</option>
                                    <option value="Togo">Togo</option>
                                    <option value="Tokelau">Tokelau</option>
                                    <option value="Tonga">Tonga</option>
                                    <option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
                                    <option value="Tunisia">Tunisia</option>
                                    <option value="Turkey">Turkey</option>
                                    <option value="Turkmenistan">Turkmenistan</option>
                                    <option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
                                    <option value="Tuvalu">Tuvalu</option>
                                    <option value="Uganda">Uganda</option>
                                    <option value="Ukraine">Ukraine</option>
                                    <option value="United Arab Erimates">United Arab Emirates</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="United States of America">United States of America</option>
                                    <option value="Uraguay">Uruguay</option>
                                    <option value="Uzbekistan">Uzbekistan</option>
                                    <option value="Vanuatu">Vanuatu</option>
                                    <option value="Vatican City State">Vatican City State</option>
                                    <option value="Venezuela">Venezuela</option>
                                    <option value="Vietnam">Vietnam</option>
                                    <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                    <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                    <option value="Wake Island">Wake Island</option>
                                    <option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
                                    <option value="Yemen">Yemen</option>
                                    <option value="Zaire">Zaire</option>
                                    <option value="Zambia">Zambia</option>
                                    <option value="Zimbabwe">Zimbabwe</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>1. How would you rate the project knowledge and response time of our Sales Representatives? </label><br/>
                                <?php
                                foreach ($scale as $key => $value) {
                                    $slug = (str_replace(' ', '-', $value));
                                    echo "<label class='radio-inline'><img src='<?=SITE_URL?>/assets/images/$slug.png' class='emoji'><br/> 
                                &nbsp;<input type='radio' class='custom-radio' name='que_1' data-slug='$slug' data-color='$color[$key]'  value='$key' required='required'>&nbsp; <span class='que-1'>$value</span></label>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>2. What do you think of our Range of Properties?</label><br/>
                                <?php
                                foreach ($scale as $key => $value) {
                                    $slug = (str_replace(' ', '-', $value));
                                    echo "<label class='radio-inline'><img src='<?=SITE_URL?>/assets/images/$slug.png' class='emoji'><br/> 
                                &nbsp;<input type='radio' class='custom-radio' name='que_2' data-slug='$slug' data-color='$color[$key]' value='$key' required='required'>&nbsp; <span class='que-2'>$value</span></label>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>3. How would you rate our Payment Plans?</label><br/>
                                <?php
                                foreach ($scale as $key => $value) {
                                    $slug = (str_replace(' ', '-', $value));
                                    echo "<label class='radio-inline'><img src='<?=SITE_URL?>/assets/images/$slug.png' class='emoji'><br/> 
                                &nbsp;<input type='radio' class='custom-radio' name='que_3' data-slug='$slug' data-color='$color[$key]' value='$key' required='required'>&nbsp; <span class='que-3'>$value</span></label>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>4. How would you rate our Cityscape Offers? </label><br/>
                                <?php
                                foreach ($scale as $key => $value) {
                                    $slug = (str_replace(' ', '-', $value));
                                    echo "<label class='radio-inline'><img src='<?=SITE_URL?>/assets/images/$slug.png' class='emoji'><br/> 
                                &nbsp;<input type='radio' class='custom-radio' name='que_4' data-slug='$slug' data-color='$color[$key]' value='$key' required='required'>&nbsp; <span class='que-4'>$value</span></label>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>5. Where did you hear about our Cityscape Offers?</label><br/>
                                <select name="que_5" class="form-control" required='required'>
                                    <option value=''>Select Source</option>
                                    <?php
                                    foreach ($source as $key => $value) {
                                        echo " <option value='$value'>$value</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr/>

                    <div class="row">
                        <div class="col-xs-8">
                            <button name="submit" type="submit"  data-submit="...Sending" tabindex="12" class="btn btn-success">Submit</button> <br/><br/>
                        </div>
                        <div class="col-xs-4">
                            <input type="reset" name="reset" value="Reset" class="btn btn-danger" style="width:100%" onclick="return confirm_reset();"> <br/><br/>
                        </div>
                    </div>
                    @endif
            </form>
        </div>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="<?=SITE_URL?>/assets/js/selectstyle.js"></script>
        <?php if (!empty($get['status']) && $get['status'] == 'success') { ?>
            <script>
                                    setTimeout(function () {
                                        window.location = '<?=SITE_URL?>/en/quick-survey';
                                    }, 5000);
            </script>
        <?php } ?>
        <script>

            jQuery(document).ready(function ($) {
                $('select[name=nationality]').selectstyle();
            });

            $('input').keypress(function (event) {
                if (event.keyCode == '13') {
                    event.preventDefault();
                }
            });

            $('input[name=phone]').keyup(function () {
                if ($(this).val().length > 15) {
                    $(this).val($(this).val().substr(0, 15));
                }

            });

            $('input,select').on('click change', function () {
                if ($('input[name=que_1]').is(':checked')) {
                    $('#que1').removeClass();
                    var s1 = $('input[name=que_1]:checked').data('slug');
                    var c1 = $('input[name=que_1]:checked').data('color');
                    $('span.que-1').css("border-bottom", '');
                    $('#que1').addClass(s1 + ' progress-bar progress-bar-striped').attr('aria-valuenow', 1).css('width', '25%').text('');
                    $('input[name=que_1]:checked+span').addClass('active').css("border-bottom", "5px solid " + c1);
                }
                if ($('input[name=que_2]').is(':checked')) {
                    $('#que2').removeClass();
                    var s2 = $('input[name=que_2]:checked').data('slug');
                    var c2 = $('input[name=que_2]:checked').data('color');
                    $('span.que-2').css("border-bottom", '');
                    $('#que2').addClass(s2 + ' progress-bar progress-bar-striped').attr('aria-valuenow', 1).css('width', '25%').text('');
                    $('input[name=que_2]:checked+span').addClass('active').css("border-bottom", "5px solid " + c2);
                }
                if ($('input[name=que_3]').is(':checked')) {
                    $('#que3').removeClass();
                    var s3 = $('input[name=que_3]:checked').data('slug');
                    var c3 = $('input[name=que_3]:checked').data('color');
                    $('span.que-3').css("border-bottom", '');
                    $('#que3').addClass(s3 + ' progress-bar progress-bar-striped').attr('aria-valuenow', 1).css('width', '25%').text('');
                    $('input[name=que_3]:checked+span').addClass('active').css("border-bottom", "5px solid " + c3);
                }
                if ($('input[name=que_4]').is(':checked')) {
                    $('#que4').removeClass();
                    var s4 = $('input[name=que_4]:checked').data('slug');
                    var c4 = $('input[name=que_4]:checked').data('color');
                    $('span.que-4').css("border-bottom", '');
                    $('#que4').addClass(s4 + ' progress-bar progress-bar-striped').attr('aria-valuenow', 1).css('width', '25%').text('');
                    $('input[name=que_4]:checked+span').addClass('active').css("border-bottom", "5px solid " + c4);
                }

            });



            function confirm_reset() {
                var r = confirm("Are you sure you want to reset form?");
                if (r) {
                    setTimeout(function () {
                        jQuery('.progress-bar').attr('aria-valuenow', 0).css('width', '0%').text('');
                    }, 100);
                }
                return r;
            }

        </script>
    </body>
</html>