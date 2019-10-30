@extends('layouts/booking')

@section('styles')
<style>
    .img-full-width{width: 100%}
    @media only screen and (min-width: 768px) {
        .section-border-left {
            border-left:7.5px solid #dedede;
        }
        .section-border-right {
            border-right:7.5px solid #dedede;
        }
    }
    .white-section{
        background: #fff;
        padding: 20px;
        margin: 20px 0;
    }
    .gray-section{
        background: #ececec;
        padding: 20px;
        margin: 20px 0;
    }
    .no-padding{padding:0}
    .no-padding-left{padding-left:0}
    .no-padding-right{padding-right:0}
    .form-control{padding:.375rem .5rem}
    .card .card-header .open,.card .card-header .close{float:right;}
    .card .card-header a[aria-expanded="false"] .close{display:none}
    .card .card-header a[aria-expanded="true"] .open{display:none}
</style>
@stop


@section('content')
<?php
//$remainging_projects = array_splice($projects, 1);
?>
<pre>
    <?php
    //print_r($nearby);
    ?>
</pre>

<!-- Content section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <img src="<?=SITE_URL?>/booking/images/1150.png" class="img-fluid">
            </div>
        </div>
    </div>
    <br/>
    <div class="container bg-white"><br/>
        <?php
        if ($project->id != 10) {
            ?>
            <h2>{{ $locale=='ar'?$project->title_ar:($locale=='cn'?$project->title_ch:$project->title_en) }}</h2>
            <h6>Starting from AED 667,000</h6>
            <div class="row">
                <div class="col-12 col-sm-3"><br/>
                    <img alt="" src="{{ asset('/assets/images/projects/') }}/{{ $project->image }}" class="img-fluid img-full-width"> <br/><br/>
                </div>
                <div class="col-12 col-sm-9"><br/>
                    <h6>Maydan One, Dubai</h6>
                    <hr/>
                    <p><small><strong>Project type:</strong> RESIDENTIAL APARTMENTS</small><br/>
                        <small><strong>Units type:</strong> <?= get_unit_types_project($project->id) ?></small><br/>
                        <small><strong>Amenities:</strong> <?= get_amenity_project($project->id) ?></small><br/>
                        <small><strong>Nearby:</strong> <?= get_nearby_project($project->id) ?></small>
                    </p>
                    <hr/>
                    <p>Your deposit will guarantee a hold on the property and our agent will reach out to you within 24 hours. You will be fully guided through the rest of the purchase process later.</p>
                </div>
                <br/>

            </div>
            <br/>
            <br/>
            <form>
                <div id="accordion">
                    <div class="card">
                        <div class="card-header">
                            <a class="card-link" data-toggle="collapse" href="#collapseOne">
                                <h6>Choose your unit later <span class="open">+</span> <span class="close">-</span></h6>
                            </a>
                        </div>
                        <div id="collapseOne" class="collapse show" data-parent="#accordion">
                            <div class="card-body">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="" name="optradio" > Choose your unit later and our Property Consultant will call you within 48 hours to help you select your preferred unit.
                                    </label>
                                    <a href="#payment-section" class="btn btn-primary float-right">Choose Later</a><br/><br/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                                <h6>Book Studio <span class="open">+</span> <span class="close">-</span></h6>
                            </a>
                        </div>
                        <div id="collapseTwo" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="optradio" >Studio – 460 sqft
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div id="payment-section"></div>
            <br/>
            <br/>

            <div class="row gray-section">
                <div class="col-sm-6">
                    <div class="gray-section text-center">
                        <h4>You are booking a unit in:</h4>
                        <p>Booking Fee</p>
                        <div class="white-section">
                            <h2>AED 20,000</h2>
                            <small>Guarantees your hold and starts the process.</small>
                        </div>
                        <h4>Location:  Dubailand, Dubai, UAE</h4>
                        <hr/>
                        <h4>You are free to select your unit later.</h4>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="white-section">
                        <h3>Make a payment</h3>
                        <form action="#" method="POST" id="form-booking">
                            <input type="hidden" name="_token" value="XZuS86V14RmtNp5F2fNRpck1Rl4iDOJm0dpCOD0S">
                            <input name="PROJECT_ID" value="3157" type="hidden">
                            <input name="P_UNIT_ID" value="" id="field-uid" type="hidden">
                            <input name="P_CURRENCY" value="AED" id="field-currency" type="hidden">

                            <div class="row">
                                <div class="col-12 col-sm-6 form-group">
                                    <div class="field-title">First name: *</div>
                                    <div class="field-wrapper"><input name="first_name" class="form-control" value="" type="text" required="required"></div>
                                </div>
                                <div class="col-12 col-sm-6 form-group">
                                    <div class="field-title">Last name: *</div>
                                    <div class="field-wrapper"><input name="last_name" class="form-control" value="" type="text" required="required"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-6 form-group">
                                    <div class="field-title">Phone No: *</div>
                                    <div class="row">
                                        <div class="col-3 col-sm-3 no-padding-right">
                                            <select name="country" class="form-control" id="country" required="required">
                                                <option data-name="" data-code="+971" value="AE" selected="selected" class="active">AE</option>
                                                <option data-name="Afghanistan" data-code="+93" value="AF">Afghanistan</option>
                                                <option data-name="Albania" data-code="+355" value="AL">Albania</option>
                                                <option data-name="Algeria" data-code="+213" value="DZ">Algeria</option>
                                                <option data-name="American Samoa" data-code="+1" value="AS">American Samoa</option>
                                                <option data-name="Andorra" data-code="+376" value="AD">Andorra</option>
                                                <option data-name="Angola" data-code="+244" value="AO">Angola</option>
                                                <option data-name="Anguilla" data-code="+1" value="AI">Anguilla</option>
                                                <option data-name="Antigua" data-code="+1" value="AG">Antigua</option>
                                                <option data-name="Argentina" data-code="+54" value="AR">Argentina</option>
                                                <option data-name="Armenia" data-code="+374" value="AM">Armenia</option>
                                                <option data-name="Aruba" data-code="+297" value="AW">Aruba</option>
                                                <option data-name="Australia" data-code="+61" value="AU">Australia</option>
                                                <option data-name="Austria" data-code="+43" value="AT">Austria</option>
                                                <option data-name="Azerbaijan" data-code="+994" value="AZ">Azerbaijan</option>
                                                <option data-name="Bahrain" data-code="+973" value="BH">Bahrain</option>
                                                <option data-name="Bangladesh" data-code="+880" value="BD">Bangladesh</option>
                                                <option data-name="Barbados" data-code="+1" value="BB">Barbados</option>
                                                <option data-name="Belarus" data-code="+375" value="BY">Belarus</option>
                                                <option data-name="Belgium" data-code="+32" value="BE">Belgium</option>
                                                <option data-name="Belize" data-code="+501" value="BZ">Belize</option>
                                                <option data-name="Benin" data-code="+229" value="BJ">Benin</option>
                                                <option data-name="Bermuda" data-code="+1" value="BM">Bermuda</option>
                                                <option data-name="Bhutan" data-code="+975" value="BT">Bhutan</option>
                                                <option data-name="Bolivia" data-code="+591" value="BO">Bolivia</option>
                                                <option data-name="Bosnia and Herzegovina" data-code="+387" value="BA">Bosnia and Herzegovina</option>
                                                <option data-name="Botswana" data-code="+267" value="BW">Botswana</option>
                                                <option data-name="Brazil" data-code="+55" value="BR">Brazil</option>
                                                <option data-name="British Indian Ocean Territory" data-code="+246" value="IO">British Indian Ocean Territory</option>
                                                <option data-name="British Virgin Islands" data-code="+1" value="VG">British Virgin Islands</option>
                                                <option data-name="Brunei" data-code="+673" value="BN">Brunei</option>
                                                <option data-name="Bulgaria" data-code="+359" value="BG">Bulgaria</option>
                                                <option data-name="Burkina Faso" data-code="+226" value="BF">Burkina Faso</option>
                                                <option data-name="Burma Myanmar" data-code="+95" value="MM">Burma Myanmar</option>
                                                <option data-name="Burundi" data-code="+257" value="BI">Burundi</option>
                                                <option data-name="Cambodia" data-code="+855" value="KH">Cambodia</option>
                                                <option data-name="Cameroon" data-code="+237" value="CM">Cameroon</option>
                                                <option data-name="Canada" data-code="+1" value="CA">Canada</option>
                                                <option data-name="Cape Verde" data-code="+238" value="CV">Cape Verde</option>
                                                <option data-name="Cayman Islands" data-code="+1" value="KY">Cayman Islands</option>
                                                <option data-name="Central African Republic" data-code="+236" value="CF">Central African Republic</option>
                                                <option data-name="Chad" data-code="+235" value="TD">Chad</option>
                                                <option data-name="Chile" data-code="+56" value="CL">Chile</option>
                                                <option data-name="China" data-code="+86" value="CN">China</option>
                                                <option data-name="Colombia" data-code="+57" value="CO">Colombia</option>
                                                <option data-name="Comoros" data-code="+269" value="KM">Comoros</option>
                                                <option data-name="Cook Islands" data-code="+682" value="CK">Cook Islands</option>
                                                <option data-name="Costa Rica" data-code="+506" value="CR">Costa Rica</option>
                                                <option data-name="Côte d'Ivoire" data-code="+225" value="CI">Côte d'Ivoire</option>
                                                <option data-name="Croatia" data-code="+385" value="HR">Croatia</option>
                                                <option data-name="Cuba" data-code="+53" value="CU">Cuba</option>
                                                <option data-name="Cyprus" data-code="+357" value="CY">Cyprus</option>
                                                <option data-name="Czech Republic" data-code="+420" value="CZ">Czech Republic</option>
                                                <option data-name="Democratic Republic of Congo" data-code="+243" value="CD">Democratic Republic of Congo</option>
                                                <option data-name="Denmark" data-code="+45" value="DK">Denmark</option>
                                                <option data-name="Djibouti" data-code="+253" value="DJ">Djibouti</option>
                                                <option data-name="Dominica" data-code="+1" value="DM">Dominica</option>
                                                <option data-name="Dominican Republic" data-code="+1" value="DO">Dominican Republic</option>
                                                <option data-name="Ecuador" data-code="+593" value="EC">Ecuador</option>
                                                <option data-name="Egypt" data-code="+20" value="EG">Egypt</option>
                                                <option data-name="El Salvador" data-code="+503" value="SV">El Salvador</option>
                                                <option data-name="Equatorial Guinea" data-code="+240" value="GQ">Equatorial Guinea</option>
                                                <option data-name="Eritrea" data-code="+291" value="ER">Eritrea</option>
                                                <option data-name="Estonia" data-code="+372" value="EE">Estonia</option>
                                                <option data-name="Ethiopia" data-code="+251" value="ET">Ethiopia</option>
                                                <option data-name="Falkland Islands" data-code="+500" value="FK">Falkland Islands</option>
                                                <option data-name="Faroe Islands" data-code="+298" value="FO">Faroe Islands</option>
                                                <option data-name="Federated States of Micronesia" data-code="+691" value="FM">Federated States of Micronesia</option>
                                                <option data-name="Fiji" data-code="+679" value="FJ">Fiji</option>
                                                <option data-name="Finland" data-code="+358" value="FI">Finland</option>
                                                <option data-name="France" data-code="+33" value="FR">France</option>
                                                <option data-name="French Guiana" data-code="+594" value="GF">French Guiana</option>
                                                <option data-name="French Polynesia" data-code="+689" value="PF">French Polynesia</option>
                                                <option data-name="Gabon" data-code="+241" value="GA">Gabon</option>
                                                <option data-name="Georgia" data-code="+995" value="GE">Georgia</option>
                                                <option data-name="Germany" data-code="+49" value="DE">Germany</option>
                                                <option data-name="Ghana" data-code="+233" value="GH">Ghana</option>
                                                <option data-name="Gibraltar" data-code="+350" value="GI">Gibraltar</option>
                                                <option data-name="Greece" data-code="+30" value="GR">Greece</option>
                                                <option data-name="Greenland" data-code="+299" value="GL">Greenland</option>
                                                <option data-name="Grenada" data-code="+1" value="GD">Grenada</option>
                                                <option data-name="Guadeloupe" data-code="+590" value="GP">Guadeloupe</option>
                                                <option data-name="Guam" data-code="+1" value="GU">Guam</option>
                                                <option data-name="Guatemala" data-code="+502" value="GT">Guatemala</option>
                                                <option data-name="Guinea" data-code="+224" value="GN">Guinea</option>
                                                <option data-name="Guinea-Bissau" data-code="+245" value="GW">Guinea-Bissau</option>
                                                <option data-name="Guyana" data-code="+592" value="GY">Guyana</option>
                                                <option data-name="Haiti" data-code="+509" value="HT">Haiti</option>
                                                <option data-name="Honduras" data-code="+504" value="HN">Honduras</option>
                                                <option data-name="Hong Kong" data-code="+852" value="HK">Hong Kong</option>
                                                <option data-name="Hungary" data-code="+36" value="HU">Hungary</option>
                                                <option data-name="Iceland" data-code="+354" value="IS">Iceland</option>
                                                <option data-name="India" data-code="+91" value="IN">India</option>
                                                <option data-name="Indonesia" data-code="+62" value="ID">Indonesia</option>
                                                <option data-name="Iran" data-code="+98" value="IR">Iran</option>
                                                <option data-name="Iraq" data-code="+964" value="IQ">Iraq</option>
                                                <option data-name="Ireland" data-code="+353" value="IE">Ireland</option>
                                                <option data-name="Israel" data-code="+972" value="IL">Israel</option>
                                                <option data-name="Italy" data-code="+39" value="IT">Italy</option>
                                                <option data-name="Jamaica" data-code="+1" value="JM">Jamaica</option>
                                                <option data-name="Japan" data-code="+81" value="JP">Japan</option>
                                                <option data-name="Jordan" data-code="+962" value="JO">Jordan</option>
                                                <option data-name="Kazakhstan" data-code="+7" value="KZ">Kazakhstan</option>
                                                <option data-name="Kenya" data-code="+254" value="KE">Kenya</option>
                                                <option data-name="Kiribati" data-code="+686" value="KI">Kiribati</option>
                                                <option data-name="Kosovo" data-code="+381" value="XK">Kosovo</option>
                                                <option data-name="Kuwait" data-code="+965" value="KW">Kuwait</option>
                                                <option data-name="Kyrgyzstan" data-code="+996" value="KG">Kyrgyzstan</option>
                                                <option data-name="Laos" data-code="+856" value="LA">Laos</option>
                                                <option data-name="Latvia" data-code="+371" value="LV">Latvia</option>
                                                <option data-name="Lebanon" data-code="+961" value="LB">Lebanon</option>
                                                <option data-name="Lesotho" data-code="+266" value="LS">Lesotho</option>
                                                <option data-name="Liberia" data-code="+231" value="LR">Liberia</option>
                                                <option data-name="Libya" data-code="+218" value="LY">Libya</option>
                                                <option data-name="Liechtenstein" data-code="+423" value="LI">Liechtenstein</option>
                                                <option data-name="Lithuania" data-code="+370" value="LT">Lithuania</option>
                                                <option data-name="Luxembourg" data-code="+352" value="LU">Luxembourg</option>
                                                <option data-name="Macau" data-code="+853" value="MO">Macau</option>
                                                <option data-name="Macedonia" data-code="+389" value="MK">Macedonia</option>
                                                <option data-name="Madagascar" data-code="+261" value="MG">Madagascar</option>
                                                <option data-name="Malawi" data-code="+265" value="MW">Malawi</option>
                                                <option data-name="Malaysia" data-code="+60" value="MY">Malaysia</option>
                                                <option data-name="Maldives" data-code="+960" value="MV">Maldives</option>
                                                <option data-name="Mali" data-code="+223" value="ML">Mali</option>
                                                <option data-name="Malta" data-code="+356" value="MT">Malta</option>
                                                <option data-name="Marshall Islands" data-code="+692" value="MH">Marshall Islands</option>
                                                <option data-name="Martinique" data-code="+596" value="MQ">Martinique</option>
                                                <option data-name="Mauritania" data-code="+222" value="MR">Mauritania</option>
                                                <option data-name="Mauritius" data-code="+230" value="MU">Mauritius</option>
                                                <option data-name="Mayotte" data-code="+262" value="YT">Mayotte</option>
                                                <option data-name="Mexico" data-code="+52" value="MX">Mexico</option>
                                                <option data-name="Moldova" data-code="+373" value="MD">Moldova</option>
                                                <option data-name="Monaco" data-code="+377" value="MC">Monaco</option>
                                                <option data-name="Mongolia" data-code="+976" value="MN">Mongolia</option>
                                                <option data-name="Montenegro" data-code="+382" value="ME">Montenegro</option>
                                                <option data-name="Montserrat" data-code="+1" value="MS">Montserrat</option>
                                                <option data-name="Morocco" data-code="+212" value="MA">Morocco</option>
                                                <option data-name="Mozambique" data-code="+258" value="MZ">Mozambique</option>
                                                <option data-name="Namibia" data-code="+264" value="NA">Namibia</option>
                                                <option data-name="Nauru" data-code="+674" value="NR">Nauru</option>
                                                <option data-name="Nepal" data-code="+977" value="NP">Nepal</option>
                                                <option data-name="Netherlands" data-code="+31" value="NL">Netherlands</option>
                                                <option data-name="Netherlands Antilles" data-code="+599" value="AN">Netherlands Antilles</option>
                                                <option data-name="New Caledonia" data-code="+687" value="NC">New Caledonia</option>
                                                <option data-name="New Zealand" data-code="+64" value="NZ">New Zealand</option>
                                                <option data-name="Nicaragua" data-code="+505" value="NI">Nicaragua</option>
                                                <option data-name="Niger" data-code="+227" value="NE">Niger</option>
                                                <option data-name="Nigeria" data-code="+234" value="NG">Nigeria</option>
                                                <option data-name="Niue" data-code="+683" value="NU">Niue</option>
                                                <option data-name="Norfolk Island" data-code="+672" value="NF">Norfolk Island</option>
                                                <option data-name="North Korea" data-code="+850" value="KP">North Korea</option>
                                                <option data-name="Northern Mariana Islands" data-code="+1" value="MP">Northern Mariana Islands</option>
                                                <option data-name="Norway" data-code="+47" value="NO">Norway</option>
                                                <option data-name="Oman" data-code="+968" value="OM">Oman</option>
                                                <option data-name="Pakistan" data-code="+92" value="PK">Pakistan</option>
                                                <option data-name="Palau" data-code="+680" value="PW">Palau</option>
                                                <option data-name="Palestine" data-code="+970" value="PS">Palestine</option>
                                                <option data-name="Panama" data-code="+507" value="PA">Panama</option>
                                                <option data-name="Papua New Guinea" data-code="+675" value="PG">Papua New Guinea</option>
                                                <option data-name="Paraguay" data-code="+595" value="PY">Paraguay</option>
                                                <option data-name="Peru" data-code="+51" value="PE">Peru</option>
                                                <option data-name="Philippines" data-code="+63" value="PH">Philippines</option>
                                                <option data-name="Poland" data-code="+48" value="PL">Poland</option>
                                                <option data-name="Portugal" data-code="+351" value="PT">Portugal</option>
                                                <option data-name="Puerto Rico" data-code="+1" value="PR">Puerto Rico</option>
                                                <option data-name="Qatar" data-code="+974" value="QA">Qatar</option>
                                                <option data-name="Republic of the Congo" data-code="+242" value="CG">Republic of the Congo</option>
                                                <option data-name="Réunion" data-code="+262" value="RE">Réunion</option>
                                                <option data-name="Romania" data-code="+40" value="RO">Romania</option>
                                                <option data-name="Russia" data-code="+7" value="RU">Russia</option>
                                                <option data-name="Rwanda" data-code="+250" value="RW">Rwanda</option>
                                                <option data-name="Saint Barthélemy" data-code="+590" value="BL">Saint Barthélemy</option>
                                                <option data-name="Saint Helena" data-code="+290" value="SH">Saint Helena</option>
                                                <option data-name="Saint Kitts and Nevis" data-code="+1" value="KN">Saint Kitts and Nevis</option>
                                                <option data-name="Saint Martin" data-code="+590" value="MF">Saint Martin</option>
                                                <option data-name="Saint Pierre and Miquelon" data-code="+508" value="PM">Saint Pierre and Miquelon</option>
                                                <option data-name="Saint Vincent and the Grenadines" data-code="+1" value="VC">Saint Vincent and the Grenadines</option>
                                                <option data-name="Samoa" data-code="+685" value="WS">Samoa</option>
                                                <option data-name="San Marino" data-code="+378" value="SM">San Marino</option>
                                                <option data-name="São Tomé and Príncipe" data-code="+239" value="ST">São Tomé and Príncipe</option>
                                                <option data-name="Saudi Arabia" data-code="+966" value="SA">Saudi Arabia</option>
                                                <option data-name="Senegal" data-code="+221" value="SN">Senegal</option>
                                                <option data-name="Serbia" data-code="+381" value="RS">Serbia</option>
                                                <option data-name="Seychelles" data-code="+248" value="SC">Seychelles</option>
                                                <option data-name="Sierra Leone" data-code="+232" value="SL">Sierra Leone</option>
                                                <option data-name="Singapore" data-code="+65" value="SG">Singapore</option>
                                                <option data-name="Slovakia" data-code="+421" value="SK">Slovakia</option>
                                                <option data-name="Slovenia" data-code="+386" value="SI">Slovenia</option>
                                                <option data-name="Solomon Islands" data-code="+677" value="SB">Solomon Islands</option>
                                                <option data-name="Somalia" data-code="+252" value="SO">Somalia</option>
                                                <option data-name="South Africa" data-code="+27" value="ZA">South Africa</option>
                                                <option data-name="South Korea" data-code="+82" value="KR">South Korea</option>
                                                <option data-name="Spain" data-code="+34" value="ES">Spain</option>
                                                <option data-name="Sri Lanka" data-code="+94" value="LK">Sri Lanka</option>
                                                <option data-name="St. Lucia" data-code="+1" value="LC">St. Lucia</option>
                                                <option data-name="Sudan" data-code="+249" value="SD">Sudan</option>
                                                <option data-name="Suriname" data-code="+597" value="SR">Suriname</option>
                                                <option data-name="Swaziland" data-code="+268" value="SZ">Swaziland</option>
                                                <option data-name="Sweden" data-code="+46" value="SE">Sweden</option>
                                                <option data-name="Switzerland" data-code="+41" value="CH">Switzerland</option>
                                                <option data-name="Syria" data-code="+963" value="SY">Syria</option>
                                                <option data-name="Taiwan" data-code="+886" value="TW">Taiwan</option>
                                                <option data-name="Tajikistan" data-code="+992" value="TJ">Tajikistan</option>
                                                <option data-name="Tanzania" data-code="+255" value="TZ">Tanzania</option>
                                                <option data-name="Thailand" data-code="+66" value="TH">Thailand</option>
                                                <option data-name="The Bahamas" data-code="+1" value="BS">The Bahamas</option>
                                                <option data-name="The Gambia" data-code="+220" value="GM">The Gambia</option>
                                                <option data-name="Timor-Leste" data-code="+670" value="TL">Timor-Leste</option>
                                                <option data-name="Togo" data-code="+228" value="TG">Togo</option>
                                                <option data-name="Tokelau" data-code="+690" value="TK">Tokelau</option>
                                                <option data-name="Tonga" data-code="+676" value="TO">Tonga</option>
                                                <option data-name="Trinidad and Tobago" data-code="+1" value="TT">Trinidad and Tobago</option>
                                                <option data-name="Tunisia" data-code="+216" value="TN">Tunisia</option>
                                                <option data-name="Turkey" data-code="+90" value="TR">Turkey</option>
                                                <option data-name="Turkmenistan" data-code="+993" value="TM">Turkmenistan</option>
                                                <option data-name="Turks and Caicos Islands" data-code="+1" value="TC">Turks and Caicos Islands</option>
                                                <option data-name="Tuvalu" data-code="+688" value="TV">Tuvalu</option>
                                                <option data-name="Uganda" data-code="+256" value="UG">Uganda</option>
                                                <option data-name="Ukraine" data-code="+380" value="UA">Ukraine</option>
                                                <option data-name="United Arab Emirates" data-code="+971" value="AE">AE</option>
                                                <option data-name="United Kingdom" data-code="+44" value="GB">United Kingdom</option>
                                                <option data-name="United States" data-code="+1" value="US">United States</option>
                                                <option data-name="Uruguay" data-code="+598" value="UY">Uruguay</option>
                                                <option data-name="US Virgin Islands" data-code="+1" value="VI">US Virgin Islands</option>
                                                <option data-name="Uzbekistan" data-code="+998" value="UZ">Uzbekistan</option>
                                                <option data-name="Vanuatu" data-code="+678" value="VU">Vanuatu</option>
                                                <option data-name="Vatican City" data-code="+39" value="VA">Vatican City</option>
                                                <option data-name="Venezuela" data-code="+58" value="VE">Venezuela</option>
                                                <option data-name="Vietnam" data-code="+84" value="VN">Vietnam</option>
                                                <option data-name="Wallis and Futuna" data-code="+681" value="WF">Wallis and Futuna</option>
                                                <option data-name="Yemen" data-code="+967" value="YE">Yemen</option>
                                                <option data-name="Zambia" data-code="+260" value="ZM">Zambia</option>
                                                <option data-name="Zimbabwe" data-code="+263" value="ZW">Zimbabwe</option>
                                            </select></div>
                                        <div class="col-3 col-sm-3 no-padding">
                                            <input name="country_code" class="form-control" value="" type="text" id="country_code" value="{{old('country_code')}}" readonly="readonly">
                                        </div>
                                        <div class="col-6 col-sm-6 no-padding-left">
                                            <input name="phone" class="form-control" value="" type="text" id="phone" value="{{old('phone')}}" pattern="\d*" required="required" minlength="7" maxlength="10">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 form-group">
                                    <div class="field-title">E-mail: *</div>
                                    <div class="field-wrapper field-EMAIL"><input name="email" class="form-control" value="{{old('email')}}" type="text" required="required"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-6 form-group">
                                    <div class="field-title">State / Province: </div>
                                    <div class="field-wrapper field-P_STATE"><input name="state" class="form-control" value="{{old('state')}}" type="text" required="required"></div>
                                </div>
                                <div class="col-12 col-sm-6 form-group">
                                    <div class="field-title">City: *</div>
                                    <div class="field-wrapper field-P_City"><input name="city" class="form-control" value="{{old('city')}}" type="text" required="required"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-6 form-group">
                                    <div class="field-title">Address: *</div>
                                    <div class="field-wrapper field-P_ADDRESS"><input name="address" class="form-control" value="{{old('address')}}" type="text" required="required"></div>
                                </div>
                                <div class="col-12 col-sm-6 form-group">
                                    <div class="field-title">Zip code / PO Box: </div>
                                    <div class="field-wrapper field-P_ZIP_POBOX"><input name="zip_code" class="form-control" value="{{old('zip_code')}}" pattern="\d*" type="text" minlength="4" maxlength="8" required="required"></div>
                                </div>
                            </div>
                            <div class="row m-t-s">
                                <div class="col-12 col-sm-6">
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" value=""><span class="terms-label">I acknowledge that I have read and agree to the <a href="https://booking.damacproperties.com/terms" class="popup-inline cboxElement">terms and conditions</a></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="field-wrapper field-submit"><input value="Pay Now" class="btn btn-primary btn-block" type="submit"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="white-section">
                            <h4>You're in complete control</h4>
                            <p>Want to make a change? Have a special request? Need to cancel? It just takes a few clicks. Flexibility to change the unit after booking.</p>
                            <hr/>
                            <h4>Best price guaranteed online</h4>
                            <p>You won’t do better price-wise than here!</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="white-section">
                            <h3>Here's what to expect:</h3>
                            <p>You will receive a confirmation e-mail with your deposit, which guarantees we hold the property until all the paperwork is signed.</p>
                            <p>An agent will schedule a meeting with you in the next 7 days to close the transaction.</p>
                            <p>If there are additional units still available, you may still change the unit type.</p>
                        </div>
                    </div>
                </div>
            </div>

            <?php
        }
        ?>
        <br/>
    </div>
    <br/>
</section>


@stop


@section('scripts')
<script>
    $(document).ready(function () {
        var code = $(this).find(':selected').data('code');
        $('#country_code').val(code);
        $('#country').change(function () {
            var code = $(this).find(':selected').data('code');
            $('#country_code').val(code);
        });
    });
</script>
@stop