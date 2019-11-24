@extends('layouts/default')

{{-- page level styles --}}
@section('header_styles')
<link rel="stylesheet" href="./build/css/intlTelInput.css">
<link rel="stylesheet" href="./build/css/demo.css">
<style>.select-dropdown{border:1px solid #e4e4e4!important;padding-left:1em!important;color:#b7b7b7!important;border-radius:0!important}
    .pay-mob .col.s3 {
        width: 23% !important;
        margin-top: 3px !important;
        padding-left: 1px !important;
    }
</style>
@stop

@section('main_div_wrapper')
@stop
@section('section_content')
<section class="az-section">

    <div class="container">
        <div class="parallax-container valign-wrapper">
            <div class="parallax">
                @if($content->image!="")
                <img alt="banner" src="{{ asset('assets/images/banner/') }}/{{ $content->image }}" >
                @endif
            </div>
        </div>
        <div class="row m0">
            <div class="col s12 p0">
                <div class="col s12 p0">
                    <ul>
                        <li>
                            <span class="ion-ios-arrow-left" style=""></span>
                            <a href="#" style="color: #5a5a5a;">Home / </a>
                            <a href="#" style="color: #5a5a5a;">E-Services / </a>
                            <a style="font-weight: 600;">{{ $content->title_en }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="row">
            <div class="col s12 m10">
                <h5 class="mt0 mb0">{{ $content->title_en }}</h5>
                <div class="divider az-header-divider"></div>
                <p class="az-pcontent title-p">{{ $content->short_description_en }}</p>


                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))

                <p class="alert alert-{{ $msg }} az-pcontent title-p">{{ Session::get('alert-' . $msg) }} </p>
                @endif
                @endforeach
            </div>

        </div>

        <!-- Online payment -->
        <form action="" name="booking" method="post"> 
            <div class="row book-now">
                <div class="col s12 card-panel" style="margin: 1em;">

                    <!-- Basic info -->
                    <div class="col s12">
                        <h6 style="margin-bottom: 2em;">Your info</h6>
                        <!-- Today date -->
                        <?php $cdate = date("d/M/Y", strtotime(date("Y-m-d"))); ?>
                        <h6 style="float: right;margin-top: -7rem;background: #2f2f2f;color: white;padding: 10px 15px;">Date: <span style="font-weight: 800;margin-left: 10px;text-transform: uppercase;">{!! $cdate !!}</span></h6>
                        <!-- End -->
                    </div>

                    <div class="col s12 p0" style="margin-bottom: 1em;">
                        <div class="col s12 p0">
                            <!-- Name -->
                            <div class="col s6 m3">
                                <div class="input-field col s12">
                                    <div class="col s12">
                                        <input type="text" id="autocomplete-input" class="autocomplete" style="border-bottom: none;margin-bottom: 0;font-size: 15px;letter-spacing: 1px;font-weight: 100;" placeholder="Your First Name" name="first_name" required>
                                        <label>First Name*</label>
                                    </div>
                                </div>
                            </div>
                            <!--  -->

                            <!-- Name -->
                            <div class="col s6 m3">
                                <div class="input-field col s12">
                                    <div class="col s12">
                                        <input type="text" id="autocomplete-input" class="autocomplete" style="border-bottom: none;margin-bottom: 0;font-size: 15px;letter-spacing: 1px;font-weight: 100;" placeholder="Your Last Name" name="last_name" required>
                                        <label>Last Name*</label>
                                    </div>
                                </div>
                            </div>
                            <!--  -->

                            <!-- Email -->
                            <div class="col s6 m3">
                                <div class="input-field col s12">
                                    <div class="col s12">
                                        <input type="email" id="autocomplete-input" class="autocomplete" style="border-bottom: none;margin-bottom: 0;font-size: 15px;letter-spacing: 1px;font-weight: 100;" placeholder="Email Address" name="email_id" required>
                                        <label>Email*</label>
                                    </div>
                                </div>
                            </div>
                            <!--  -->

                            <!-- Mobile Number -->
                            <div class="col s12 m3 pay-mob">
                                <div class="input-field col s12">
                                    <div class="col s3">
                                        <input type="text" id="code" name="code" class="autocomplete" style="border-bottom: none;margin-bottom: 0;font-size: 15px;letter-spacing: 1px;font-weight: 100;" value="+971" required>
                                    </div>
                                    <div class="col s3">
                                        <input type="text" id="acode" name="acode" class="autocomplete" style="border-bottom: none;margin-bottom: 0;font-size: 15px;letter-spacing: 1px;font-weight: 100;" value="" maxlength="0">
                                    </div>
                                    <div class="col s6" style="border-left: 1px solid #e6e6e6;padding-right: 0;">
                                        <input type="number" id="autocomplete-input" class="autocomplete" style="border-bottom: none;margin-bottom: 0;font-size: 15px;letter-spacing: 1px;font-weight: 100;" placeholder="" name="mobile_number" required maxlength="10">
                                        <label>Mobile Number*</label>
                                    </div>
                                </div>
                            </div>

                            <!--  -->

                            <!-- Landline Number -->
                            <div class="col s12 m3 pay-mob">
                                <div class="input-field col s12">
                                    <div class="col s3">
                                        <input type="text" name="area_code" id="area_code" class="autocomplete" style="border-bottom: none;margin-bottom: 0;font-size: 15px;letter-spacing: 1px;font-weight: 100;" value="+971" required>
                                    </div>
                                    <div class="col s3">
                                        <input type="text" id="acode1" name="acode1" class="autocomplete" style="border-bottom: none;margin-bottom: 0;font-size: 15px;letter-spacing: 1px;font-weight: 100;" value="" maxlength="0">
                                    </div>
                                    <div class="col s6" style="border-left: 1px solid #e6e6e6;padding-right: 0;">
                                        <input type="number" id="autocomplete-input" class="autocomplete" style="border-bottom: none;margin-bottom: 0;font-size: 15px;letter-spacing: 1px;font-weight: 100;" placeholder="" name="landline_number" required maxlength="10">
                                        <label>Landline Number*</label>
                                    </div>
                                </div>
                            </div>
                            <!--  -->

                            <!-- Passport Number -->
                            <div class="col s6 m3">
                                <div class="input-field col s12">
                                    <div class="col s12">
                                        <input type="text" id="autocomplete-input" class="autocomplete" style="border-bottom: none;margin-bottom: 0;font-size: 15px;letter-spacing: 1px;font-weight: 100;" placeholder="Enter your passport Number" name="passport_number" required>
                                        <label>Passport Number*</label>
                                    </div>
                                </div>
                            </div>
                            <!--  -->

                        </div>

                        <!-- Address -->
                        <div class="col s12 m6">
                            <div class="input-field col s12">
                                <div class="col s12">
                                    <textarea id="textarea1" class="materialize-textarea" placeholder="Your address" required name="address"></textarea>
                                    <label class="active">Address*</label>
                                </div>
                            </div>
                        </div>
                        <!--  -->

                        <!-- address city, po country -->
                        <div class="col s12 m6 p0">
                            <!-- City -->
                            <div class="col s12 m6">
                                <div class="input-field col s12">
                                    <div class="col s12">
                                        <input type="text" id="autocomplete-input" class="autocomplete" style="border-bottom: none;margin-bottom: 0;font-size: 15px;letter-spacing: 1px;font-weight: 100;" placeholder="Your City" name="city" required>
                                        <label>City*</label>
                                    </div>
                                </div>
                            </div>
                            <!--  -->

                            <!-- State -->
                            <div class="col s12 m6">
                                <div class="input-field col s12">
                                    <div class="col s12">
                                        <input type="text" id="autocomplete-input" class="autocomplete" style="border-bottom: none;margin-bottom: 0;font-size: 15px;letter-spacing: 1px;font-weight: 100;" placeholder="Your State" name="state" required>
                                        <label>State*</label>
                                    </div>
                                </div>
                            </div>
                            <!--  -->

                            <!-- PO -->
                            <div class="col s12 m6">
                                <div class="input-field col s12">
                                    <div class="col s12">
                                        <input type="text" id="autocomplete-input" class="autocomplete" style="border-bottom: none;margin-bottom: 0;font-size: 15px;letter-spacing: 1px;font-weight: 100;" placeholder="Post Code" name="post_code" required>
                                        <label>Post Code*</label>
                                    </div>
                                </div>
                            </div>
                            <!--  -->

                            <!-- Country -->
                            <div class="col s12 m6">
                                <div class="input-field col s12" style="padding-left: 0;border: none;">

                                    <select name="country" required>
                                        <option value="">Your Country</option>
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">Anguilla</option>
                                        <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
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
                                        <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Myanmar/Burma">Myanmar/Burma</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Cape Verde">Cape Verde</option>
                                        <option value="Cayman Islands">Cayman Islands</option>
                                        <option value="Central African Republic">Central African Republic</option>
                                        <option value="Chad">Chad</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Comoros">Comoros</option>
                                        <option value="Congo">Congo</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Croatia">Croatia</option>
                                        <option value="Cuba">Cuba</option>
                                        <option value="Cyprus">Cyprus</option>
                                        <option value="Czech Republic">Czech Republic</option>
                                        <option value="Democratic Republic of the Congo">Democratic Republic of the Congo</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Djibouti">Djibouti</option>
                                        <option value="Dominican Republic">Dominican Republic</option>
                                        <option value="Dominica">Dominica</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                        <option value="Eritrea">Eritrea</option>
                                        <option value="Estonia">Estonia</option>
                                        <option value="Ethiopia">Ethiopia</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="French Guiana">French Guiana</option>
                                        <option value="Gabon">Gabon</option>
                                        <option value="Gambia">Gambia</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Great Britain">Great Britain</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Guadeloupe">Guadeloupe</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Guinea-Bissau">Guinea-Bissau</option>
                                        <option value="Guyana">Guyana</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Iran">Iran</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Israel and the Occupied Territories">Israel and the Occupied Territories</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Ivory Coast (Cote d'Ivoire)">Ivory Coast (Cote d'Ivoire)</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Kosovo">Kosovo</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Kyrgyz Republic (Kyrgyzstan)">Kyrgyz Republic (Kyrgyzstan)</option>
                                        <option value="Laos">Laos</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libya">Libya</option>
                                        <option value="Liechtenstein">Liechtenstein</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Luxembourg">Luxembourg</option>
                                        <option value="Republic of Macedonia">Republic of Macedonia</option>
                                        <option value="Madagascar">Madagascar</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Maldives">Maldives</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Martinique">Martinique</option>
                                        <option value="Mauritania">Mauritania</option>
                                        <option value="Mauritius">Mauritius</option>
                                        <option value="Mayotte">Mayotte</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Moldova, Republic of">Moldova, Republic of</option>
                                        <option value="Monaco">Monaco</option>
                                        <option value="Mongolia">Mongolia</option>
                                        <option value="Montenegro">Montenegro</option>
                                        <option value="Montserrat">Montserrat</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Mozambique">Mozambique</option>
                                        <option value="Namibia">Namibia</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherlands">Netherlands</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Korea, Democratic Republic of (North Korea)">Korea, Democratic Republic of (North Korea)</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Pacific Islands">Pacific Islands</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Panama">Panama</option>
                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Philippines">Philippines</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Puerto Rico">Puerto Rico</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Reunion">Reunion</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russian Federation">Russian Federation</option>
                                        <option value="Rwanda">Rwanda</option>
                                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                        <option value="Saint Lucia">Saint Lucia</option>
                                        <option value="Saint Vincent's & Grenadines">Saint Vincent's & Grenadines</option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Serbia">Serbia</option>
                                        <option value="Seychelles">Seychelles</option>
                                        <option value="Sierra Leone">Sierra Leone</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Slovak Republic (Slovakia)">Slovak Republic (Slovakia)</option>
                                        <option value="Slovenia">Slovenia</option>
                                        <option value="Solomon Islands">Solomon Islands</option>
                                        <option value="Somalia">Somalia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="Korea, Republic of (South Korea)">Korea, Republic of (South Korea)</option>
                                        <option value="South Sudan">South Sudan</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Suriname">Suriname</option>
                                        <option value="Swaziland">Swaziland</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syria">Syria</option>
                                        <option value="Tajikistan">Tajikistan</option>
                                        <option value="Tanzania">Tanzania</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Timor Leste">Timor Leste</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Turkmenistan">Turkmenistan</option>
                                        <option value="Turks & Caicos Islands">Turks & Caicos Islands</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="United States of America (USA)">United States of America (USA)</option>
                                        <option value="Uruguay">Uruguay</option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Vietnam">Vietnam</option>
                                        <option value="Virgin Islands (UK)">Virgin Islands (UK)</option>
                                        <option value="Virgin Islands (US)">Virgin Islands (US)</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select>
                                    <label>Country*</label>

                                </div>
                            </div>
                            <!--  -->
                        </div>
                        <!--  -->
                    </div>
                    <!-- End -->

                    <!-- Property info -->
                    <div class="col s12">
                        <h6 style="margin-bottom: 2em;">Property</h6>
                        <!-- <h5 class="title-uppercase mt0">Enter your details</h5> -->
                    </div>

                    <div class="col s12 p0">
                        <!-- address city, po country -->
                        <div class="col s12 m6 p0">
                            <div class="col s12 m6">
                                <div class="input-field col s12" style="padding-left: 0;border: none;">
                                    <select name="project_id" id="project_id"  onchange="get_property_booking()" required>
                                        <option value="">Select Project</option>
                                        <?php
                                        for ($i = 0; $i < count($project_id); $i++) {
                                            ?>
                                            <option value="{!! $project_id[$i] !!}">{!! $project_name[$i] !!}</option>
                                        <?php } ?>
                                    </select>
                                    <label>Project by area*</label>
                                </div>
                            </div>
                            <!-- Avail projects in area -->
                            <div class="col s12 m6">
                                <div class="input-field col s12" style="padding-left: 0;border: none;">
                                    <select name="property_id" id="property_id" onchange="get_unit_booking()" required >
                                        <option value="">Select Property</option>
                                    </select>
                                    <label>Property*</label>
                                </div>
                            </div>
                            <!--  -->

                            <!-- Avail units in projects -->
                            <div class="col s12 m4">
                                <div class="input-field col s12" style="padding-left: 0;border: none;">
                                    <select name="unit_number" id="unit_id" onchange="get_unit_floor_feature_booking()"  required >
                                        <option value="">Select unit</option>
                                    </select>	

                                    <label>Unit*</label>
                                </div>
                            </div>
                            <!--  -->

                            <!-- Avail floor -->
                            <div class="col s12 m4">
                                <div class="input-field col s12" style="padding-left: 0;border: none;">
                                    <select name="floor_block" id="floor_id" required>
                                        <option value="">Select floor</option>
                                    </select>
                                    <label>Unit floors*</label>
                                </div>
                            </div>
                            <!--  -->

                            <!-- Avail units features in projects -->
                            <div class="col s12 m4">
                                <div class="input-field col s12" style="padding-left: 0;border: none;">
                                    <select name="unity_feature" id="feature_id" required >
                                        <option value="">Select unit features</option>
                                    </select>
                                    <label>Unit features*</label>
                                </div>
                            </div>
                            <!--  -->
                        </div>
                        <!--  -->

                        <!-- Address -->
                        <div class="col s12 m6">
                            <div class="input-field col s12">
                                <div class="col s12">
                                    <textarea name="comments" id="textarea1" class="materialize-textarea" placeholder="Comments"></textarea>
                                    <label class="active">Your Comments</label>
                                </div>
                            </div>
                        </div>
                        <!--  -->

                    </div>
                    <!-- End -->

                    <!-- Proceed -->
                    <div class="col s12 p0">
                        <!--<div class="col s12 m12">
                            <a href="#">
                                <h6>Select more <i class="ion-ios-plus-empty"></i></h6>
                            </a>
                        </div>-->

                        <div class="col s12 m6" style="margin-top: 1.5em;">
                            <div class="input-field col s12">
                                <div class="col s12">
                                    <input type="text" id="autocomplete-input" class="autocomplete" style="border-bottom: none;margin-bottom: 0;font-size: 15px;letter-spacing: 1px;font-weight: 100;" placeholder="Please put the relevant sales code here." name="sales_code">
                                    <label>Sales Code</label>
                                </div>
                            </div>
                        </div>

                        <div class="col s12 m6  right-align">
                            <br/>
                            <h6 class="m0" style="">Total Amount: <span id="priceval" style="font-size: 30px;font-weight: 600;margin-left: 10px;">AED 0.00</span></h6>
                            <!--<a class="inquire az-btn active" style="margin: 35px 0px;">Book Property Now</a>-->
                            <input type="submit" name="submit" value="Book Property Now" class="inquire az-btn active" style="margin: 35px 0px;">
                        </div>
                    </div>
                    <!-- End -->

                </div>
            </div>
            <!-- End -->
            <input type="hidden" name="payment_amount" id="payment_amount" value="" />
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        </form>

    </div>

</section>
<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}" />
@stop
@section('footer_main_scripts')

<script src="{{url("/")}}/build/js/intlTelInput.js"></script>
@stop
@section('footer_scripts')
<script>
                                        $("select[required]").css({position: "absolute", display: "inline", height: 0, padding: 0, width: 0});
                                        $("#code").intlTelInput({
                                            nationalMode: false,
                                            autoHideDialCode: false,
                                            preferredCountries: ['ae'],
                                            utilsScript: "./build/js/utils.js"
                                        });

                                        $("#area_code").intlTelInput({
                                            nationalMode: false,
                                            autoHideDialCode: false,
                                            preferredCountries: ['ae'],
                                            utilsScript: "./build/js/utils.js"
                                        });

                                        $("#alter_code").intlTelInput({
                                            nationalMode: false,
                                            autoHideDialCode: false,
                                            preferredCountries: ['ae'],
                                            utilsScript: "./build/js/utils.js"
                                        });

                                        function get_property_booking()
                                        {
                                            var pid = $("#project_id").val();
                                            document.getElementById("property_id").innerHTML = '<option value="">Select property</option>';
                                            document.getElementById("unit_id").innerHTML = '<option value="">Select unit</option>';
                                            document.getElementById("floor_id").innerHTML = '<option value="">Select floor</option>';
                                            document.getElementById("feature_id").innerHTML = '<option value="">Select feature</option>';
                                            $.ajax({
                                                url: "ajax_get_properties",
                                                data: {_token: $("#token").val(), project_id: pid},
                                                type: "POST",
                                                success: function (data) {
                                                    document.getElementById("property_id").innerHTML = data;
                                                    $("select").material_select();
                                                }
                                            });
                                        }
                                        function get_unit_booking()
                                        {
                                            document.getElementById("unit_id").innerHTML = '<option value="">Select unit</option>';
                                            document.getElementById("floor_id").innerHTML = '<option value="">Select floor</option>';
                                            document.getElementById("feature_id").innerHTML = '<option value="">Select feature</option>';
                                            var propid = $("#property_id").val();
                                            $.ajax({
                                                url: "ajax_get_units",
                                                data: {_token: $("#token").val(), property_id: propid},
                                                type: "POST",
                                                success: function (data) {
                                                    document.getElementById("unit_id").innerHTML = data;
                                                    $("select").material_select();
                                                }
                                            });
                                        }
                                        function get_unit_floor_feature_booking()
                                        {
                                            var propid = $("#property_id").val();
                                            var unitid = $("#unit_id").val();
                                            $.ajax({
                                                url: "ajax_get_unit_floors",
                                                data: {_token: $("#token").val(), unit_id: unitid, property_id: propid},
                                                type: "POST",
                                                success: function (data) {
                                                    var res = data.split("#####");
                                                    document.getElementById("floor_id").innerHTML = res[0];
                                                    document.getElementById("feature_id").innerHTML = res[1];
                                                    document.getElementById("priceval").innerHTML = res[2];
                                                    document.getElementById("payment_amount").value = res[2];
                                                    $("select").material_select();
                                                }
                                            });
                                        }
</script>
@stop
