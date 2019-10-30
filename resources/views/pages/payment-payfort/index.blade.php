@extends('layouts/default')

{{-- page level styles --}}
@section('header_styles')
<link rel="stylesheet" href="{{asset('assets/build/css/intlTelInput.css')}}">
<link rel="stylesheet" href="{{asset('assets/build/css/demo.css')}}">
<style>
    select{border:0!important}
    .select-dropdown{border:1px solid #e4e4e4!important;padding-left:0em!important;color:#b7b7b7!important;border-radius:0!important}
    .pay-mob .col.s3 {
        width: 23% !important;
        margin-top: 3px !important;
        padding-left: 1px !important;
    }
    .input-box{border-bottom: none;margin-bottom: 0;font-size: 15px;letter-spacing: 1px;font-weight: 100;height: 32px;width: 100%;}
    .input-dir{direction: initial !important}

</style>
@stop

@section('main_div_wrapper')
@stop

@section('section_content')
<?php
$get = filter_input_array(INPUT_GET);
?>
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
                            @if($locale=='en')
                            <span class="ion-ios-arrow-left" style=""></span>
                            @endif

                            @if($locale=='en')
                            <a href="{{ url("/")}}/<?php echo $locale ?>" style="color: #5a5a5a;">{{trans('words.home')}} / </a>

                            <a style="font-weight: 600;">{{trans('words.Pay Online')}}</a>
                            @elseif($locale=='cn')

                            <a href="{{ url("/")}}/<?php echo $locale ?>" style="color: #5a5a5a;">主页 / </a>

                            <a style="font-weight: 600;">在线支付</a>

                            @elseif($locale=='ar')
                            <a href="{{ url("/")}}/<?php echo $locale ?>" style="color: #5a5a5a;">{{trans('words.home')}} / </a>

                            <a style="font-weight: 600;">{{trans('words.Pay Online')}}</a>
                            @endif


                            @if($locale=='ar')
                            <span class="ion-ios-arrow-left" style=""></span>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="row">
            <div class="col s12 m12">
                <h5 class="mt0 mb0">{{trans('words.Pay Online')}}</h5>
                <div class="divider az-header-divider"></div>
                <!--<p class="az-pcontent title-p">Pay your bill online</p>
                <p class="az-pcontent">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut liquip ex ea commodo.</p>-->
                <?php
                if (isset($get['error']) && $get['error'] == 1) {
                    echo "<span style='color:red'>Something went wrong. Please fill payment form again.</span>";
                }
                if (!empty($get['status']) && $get['status'] == 'success') {
                    echo "<span style='color:green'>{$get['message']}</span>";
                }
                if (!empty($get['status']) && $get['status'] == 'cancel') {
                    echo "<span style='color:red'>{$get['message']}</span>";
                }
                if (!empty($get['status']) && $get['status'] == 'failed') {
                    echo "<span style='color:red'>{$get['message']}</span>";
                }
                ?>
            </div>

        </div>

        <form action="{{route('payment-payfort.confirmation')}}" method="post" id="payment_form">	
            <!-- Online payment -->
            <div class="row book-now">
                <div class="col s12 card-panel" style="margin: 1em;">

                    <!-- Basic info -->
                    <div class="col s12">
                        <h6 style="margin-bottom: 2em;">{{trans('words.Your info')}}</h6>
                        <!-- Today date -->
                        <?php
                        $cdate = date("d/M/Y", strtotime(date("Y-m-d")));
                        if (!function_exists('ArabicDate')) {

                            function ArabicDate() {
                                $months = array("Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل", "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس", "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر");
                                $your_date = date('y-m-d'); // The Current Date
                                $en_month = date("M", strtotime($your_date));
                                foreach ($months as $en => $ar) {
                                    if ($en == $en_month) {
                                        $ar_month = $ar;
                                    }
                                }

                                $find = array("Sat", "Sun", "Mon", "Tue", "Wed", "Thu", "Fri");
                                $replace = array("السبت", "الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة");
                                $ar_day_format = date('D'); // The Current Day
                                $ar_day = str_replace($find, $replace, $ar_day_format);

                                header('Content-Type: text/html; charset=utf-8');
                                $standard = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
                                $eastern_arabic_symbols = array("٠", "١", "٢", "٣", "٤", "٥", "٦", "٧", "٨", "٩");
                                $current_date = $ar_day . ' ' . date('d') . ' / ' . $ar_month . ' / ' . date('Y');
                                $arabic_date = str_replace($standard, $eastern_arabic_symbols, $current_date);

                                return $arabic_date;
                            }

                        }

                        if (!function_exists('ChineseDate')) {

                            function ChineseDate() {
                                $months = array("Jan" => "一月", "Feb" => "二月", "Mar" => "三月", "Apr" => "四月", "May" => "五月", "Jun" => "六月", "Jul" => "七月", "Aug" => "八月", "Sep" => "九月", "Oct" => "十月", "Nov" => "十一月", "Dec" => "十二月");
                                $your_date = date('y-m-d'); // The Current Date
                                $en_month = date("M", strtotime($your_date));
                                foreach ($months as $en => $ar) {
                                    if ($en == $en_month) {
                                        $ar_month = $ar;
                                    }
                                }

                                $find = array("Sat", "Sun", "Mon", "Tue", "Wed", "Thu", "Fri");
                                $replace = array("星期六", "星期天", "星期一", "星期二", "星期三", "星期四", "星期五");
                                $ar_day_format = date('D'); // The Current Day
                                $ar_day = str_replace($find, $replace, $ar_day_format);

                                header('Content-Type: text/html; charset=utf-8');
                                $standard = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
                                $eastern_arabic_symbols = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
                                $current_date = $ar_day . ' ' . date('d') . ' / ' . $ar_month . ' / ' . date('Y');
                                $arabic_date = str_replace($standard, $eastern_arabic_symbols, $current_date);

                                return $arabic_date;
                            }

                        }
                        ?>



                        @if($locale=='en')
                        <h6 style="float: right;margin-top: -7rem;background: #2f2f2f;color: white;padding: 10px 15px;">{{trans('words.Date')}}: <span style="font-weight: 800;margin-left: 10px;text-transform: uppercase;font-family: initial !important;">{!! $cdate !!}</span></h6>
                        @endif
                        @if($locale=='ar')
                        <h6 style="float: left;margin-top: -7rem;background: #2f2f2f;color: white;padding: 10px 15px;">{{trans('words.Date')}}: <span style="font-weight: 800;margin-left: 10px;text-transform: uppercase;font-family: initial !important;"><!-- {!! $cdate !!} --><?php echo ArabicDate(); ?></span></h6>
                        @endif
                        @if($locale=='cn')
                        <h6 style="float: left;margin-top: -7rem;background: #2f2f2f;color: white;padding: 10px 15px;">{{trans('words.Date')}}: <span style="font-weight: 800;margin-left: 10px;text-transform: uppercase;font-family: initial !important;"><!-- {!! $cdate !!} --><?php echo ChineseDate(); ?></span></h6>
                        @endif

                        <!-- End -->
                    </div>

                    <div class="col s12 p0" style="margin-bottom: 1em;">
                        <div class="col s12 p0">
                            <!-- Name -->
                            <div class="col s6 m3">
                                <div class="input-field col s12">
                                    <div class="col s12">
                                        <input type="text" id="autocomplete-input" class="autocomplete input-box" placeholder="{{trans('words.first_name_placeholder')}}" name="first_name" required>
                                        <label>{{trans('words.first_name_label')}}</label>
                                    </div>
                                </div>
                            </div>
                            <!--  -->

                            <!-- Name -->
                            <div class="col s6 m3">
                                <div class="input-field col s12">
                                    <div class="col s12">
                                        <input type="text" id="autocomplete-input" class="autocomplete input-box" placeholder="{{trans('words.last_name_placeholder')}}" name="last_name" required>
                                        <label>{{trans('words.last_name_label')}}</label>
                                    </div>
                                </div>
                            </div>
                            <!--  -->

                            <!-- Email -->
                            <div class="col s12 m3">
                                <div class="input-field col s12">
                                    <div class="col s12">
                                        <input type="email" id="autocomplete-input" class="autocomplete input-box" placeholder="{{trans('words.email_plcaholder')}}" name="email_id" required>
                                        <label>{{trans('words.email_label')}}</label>
                                    </div>
                                </div>
                            </div>
                            <!--  -->

                            <!-- Mobile Number -->
                            <div class="col s12 m3 pay-mob">
                                <div class="input-field col s12" style="float: left !important;">
                                    <div class="col s3" style="float: left !important;">
                                        <input type="text" id="code" name="country_code" class="autocomplete input-box input-dir"  value="+971" required maxlength="4" >
                                    </div>
                                    <div class="col s3" style="float: left !important;">
                                        <input type="text" id="acode" name="acode" class="autocomplete input-box" value="" maxlength="0">
                                    </div>
                                    @if($locale=='en')
                                    <div class="col s6" style="border-left: 1px solid #e6e6e6;padding-right: 0;float: left !important;">
                                        @endif
                                        @if($locale=='ar')
                                        <div class="col s6" style="border-left: 1px solid #e6e6e6;padding-right: 0;float: left !important;">
                                            @endif
                                            @if($locale=='cn')
                                            <div class="col s6" style="border-left: 1px solid #e6e6e6;padding-right: 0;float: left !important;">
                                                @endif
                                                <!-- <div class="col s6" style="border-left: 1px solid #e6e6e6;padding-right: 0;"> -->
                                                <input type="number" id="autocomplete-input" class="autocomplete input-box" maxlength="10" placeholder="" name="mobile_number" required >
                                                <label>{{trans('words.mobile_no')}}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  -->

                                    <!-- Landline Number -->
                                    <div class="col s12 m3 pay-mob">
                                        <div class="input-field col s12" style="float: left !important;">
                                            <div class="col s3" style="float: left !important;">
                                                <input type="text" name="area_code" id="area_code" class="autocomplete  input-box input-dir"  value="+971" required>
                                            </div>
                                            <div class="col s3" style="float: left !important;">
                                                <input type="text" id="acode1" name="acode1" class="autocomplete input-box" value="" maxlength="0">
                                            </div>
                                            @if($locale=='en')
                                            <div class="col s6" style="border-left: 1px solid #e6e6e6;padding-right: 0;float: left !important;">
                                                @endif
                                                @if($locale=='ar')
                                                <div class="col s6" style="border-left: 1px solid #e6e6e6;padding-right: 0;float: left !important;">
                                                    @endif
                                                    @if($locale=='cn')
                                                    <div class="col s6" style="border-left: 1px solid #e6e6e6;padding-right: 0;float: left !important;">
                                                        @endif
                                                        <!-- <div class="col s6" style="border-left: 1px solid #e6e6e6;padding-right: 0;"> -->
                                                        <input type="number" id="autocomplete-input" class="autocomplete input-box" placeholder="" name="landline_number" required maxlength="10">
                                                        <label>{{trans('words.landline_no')}}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--  -->

                                            <!-- Passport Number -->
                                            <div class="col s12 m3">
                                                <div class="input-field col s12">
                                                    <div class="col s12">
                                                        <input type="text" id="autocomplete-input" class="autocomplete input-box" placeholder="{{trans('words.passport_no_placeholder')}}" name="passport_number" required>
                                                        <label>{{trans('words.passport_no_label')}}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--  -->

                                        </div>

                                        <!-- Address -->
                                        <div class="col s12 m6">
                                            <div class="input-field col s12">
                                                <div class="col s12">
                                                    <textarea id="textarea1" name="address" class="materialize-textarea" placeholder="{{trans('words.address_label_placeholder')}}" required></textarea>
                                                    <label class="active">{{trans('words.address_label')}}</label>
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
                                                        <input type="text" id="autocomplete-input" class="autocomplete input-box" placeholder="{{trans('words.city_label_placeholder')}}" name="city" required>
                                                        <label>{{trans('words.city_label')}}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--  -->

                                            <!-- State -->
                                            <div class="col s12 m6">
                                                <div class="input-field col s12">
                                                    <div class="col s12">
                                                        <!-- <input type="text" id="autocomplete-input" class="autocomplete input-box" placeholder="{{trans('words.state_label_placeholder')}}" name="state" required> -->
                                                        <!-- <label>{{trans('words.state_label')}}</label> -->


                                                        @if($locale=='en')
                                                        <input type="text" id="autocomplete-input" class="autocomplete input-box" placeholder="{{trans('words.state_label_placeholder')}}" name="state" required>
                                                        <label>{{trans('words.state_label')}}</label>
                                                        @elseif($locale=='ar')
                                                        <input type="text" id="autocomplete-input" class="autocomplete input-box" placeholder="{{trans('words.state_label_placeholder')}}" name="state" required>
                                                        <label>{{trans('words.state_label')}}</label>
                                                        @elseif($locale=='cn')
                                                        <label>省份</label>
                                                        <input type="text" id="autocomplete-input" class="autocomplete input-box" placeholder="您的省份" name="state" required>
                                                        @endif


                                                    </div>
                                                </div>
                                            </div>
                                            <!--  -->

                                            <!-- PO -->
                                            <div class="col s12 m6">
                                                <div class="input-field col s12">
                                                    <div class="col s12">
                                                        <input type="text" id="autocomplete-input" class="autocomplete input-box" placeholder="{{trans('words.post_code_label')}}" name="post_code" required>
                                                        <label>{{trans('words.post_code_label')}}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--  -->

                                            <!-- Country -->
                                            <div class="col s12 m6">
                                                <div class="input-field col s12" style="padding-left: 0;border: none;padding-right: 0;">

                                                    <select name="country" required>
                                                        <option value="">{{trans('words.country_label')}}</option>
                                                        <option value="Afghanistan">{{trans('words.afghanistan')}}</option>
                                                        <option value="AL">{{trans('words.albania')}}</option>
                                                        <option value="DZ">{{trans('words.algeria')}}</option>
                                                        <option value="AD">{{trans('words.andorra')}}</option>
                                                        <option value="AO">{{trans('words.angola')}}</option>
                                                        <option value="AI">{{trans('words.anguilla')}}</option>
                                                        <option value="AG">{{trans('words.antigua_and_barbuda')}}</option>
                                                        <option value="AR">{{trans('words.argentina')}}</option>
                                                        <option value="AM">{{trans('words.armenia')}}</option>
                                                        <option value="AU">{{trans('words.australia')}}</option>
                                                        <option value="AT">{{trans('words.austria')}}</option>
                                                        <option value="AZ">{{trans('words.azerbaijan')}}</option>
                                                        <option value="BS">{{trans('words.Bahamas')}}</option>
                                                        <option value="BH">{{trans('words.Bahrain')}}</option>
                                                        <option value="BD">{{trans('words.Bangladesh')}}</option>
                                                        <option value="BB">{{trans('words.Barbados')}}</option>
                                                        <option value="BY">{{trans('words.Belarus')}}</option>
                                                        <option value="BE">{{trans('words.Belgium')}}</option>
                                                        <option value="BZ">{{trans('words.Belize')}}</option>
                                                        <option value="BJ">{{trans('words.Benin')}}</option>
                                                        <option value="BM">{{trans('words.Bermuda')}}</option>
                                                        <option value="BT">{{trans('words.Bhutan')}}</option>
                                                        <option value="BO">{{trans('words.Bolivia')}}</option>
                                                        <option value="BA">{{trans('words.Bosnia and Herzegovina')}}</option>
                                                        <option value="BW">{{trans('words.Botswana')}}</option>
                                                        <option value="BR">{{trans('words.Brazil')}}</option>
                                                        <option value="BN">{{trans('words.Brunei Darussalam')}}</option>
                                                        <option value="BG">{{trans('words.Bulgaria')}}</option>
                                                        <option value="BF">{{trans('words.Burkina Faso')}}</option>
                                                        <option value="MM">{{trans('words.Myanmar')}}</option>
                                                        <option value="BI">{{trans('words.Burundi')}}</option>
                                                        <option value="KH">{{trans('words.Cambodia')}}</option>
                                                        <option value="CM">{{trans('words.Cameroon')}}</option>
                                                        <option value="CA">{{trans('words.Canada')}}</option>
                                                        <option value="CV">{{trans('words.Cape Verde')}}</option>
                                                        <option value="KY">{{trans('words.Cayman Islands')}}</option>
                                                        <option value="CF">{{trans('words.Central African Republic')}}</option>
                                                        <option value="TD">{{trans('words.Chad')}}</option>
                                                        <option value="CL">{{trans('words.Chile')}}</option>
                                                        <option value="CN">{{trans('words.China')}}</option>
                                                        <option value="CO">{{trans('words.Colombia')}}</option>
                                                        <option value="KM">{{trans('words.Comoros')}}</option>
                                                        <option value="CG">{{trans('words.Congo')}}</option>
                                                        <option value="CR">{{trans('words.Costa Rica')}}</option>
                                                        <option value="HR">{{trans('words.Croatia')}}</option>
                                                        <option value="CU">{{trans('words.Cuba')}}</option>
                                                        <option value="CY">{{trans('words.Cyprus')}}</option>
                                                        <option value="CZ">{{trans('words.Czech Republic')}}</option>
                                                        <option value="DO">{{trans('words.Democratic Republic of the Congo')}}</option>
                                                        <option value="DK">{{trans('words.Denmark')}}</option>
                                                        <option value="DJ">{{trans('words.Djibouti')}}</option>
                                                        <option value="DO">{{trans('words.Dominican Republic')}}</option>
                                                        <option value="DM">{{trans('words.Dominica')}}</option>
                                                        <option value="EC">{{trans('words.Ecuador')}}</option>
                                                        <option value="EG">{{trans('words.Egypt')}}</option>
                                                        <option value="SV">{{trans('words.El Salvador')}}</option>
                                                        <option value="GQ">{{trans('words.Equatorial Guinea')}}</option>
                                                        <option value="ER">{{trans('words.Eritrea')}}</option>
                                                        <option value="EE">{{trans('words.Estonia')}}</option>
                                                        <option value="ET">{{trans('words.Ethiopia')}}</option>
                                                        <option value="FJ">{{trans('words.Fiji')}}</option>
                                                        <option value="FI">{{trans('words.Finland')}}</option>
                                                        <option value="FR">{{trans('words.France')}}</option>
                                                        <option value="GF">{{trans('words.French Guiana')}}</option>
                                                        <option value="GA">{{trans('words.Gabon')}}</option>
                                                        <option value="GM">{{trans('words.Gambia')}}</option>
                                                        <option value="GE">{{trans('words.Georgia')}}</option>
                                                        <option value="DE">{{trans('words.Germany')}}</option>
                                                        <option value="GH">{{trans('words.Ghana')}}</option>
                                                        <option value="GB">{{trans('words.Great')}}</option>
                                                        <option value="GR">{{trans('words.Greece')}}</option>
                                                        <option value="GD">{{trans('words.Grenada')}}</option>
                                                        <option value="GP">{{trans('words.Guadeloupe')}}</option>
                                                        <option value="GT">{{trans('words.Guatemala')}}</option>
                                                        <option value="GN">{{trans('words.Guinea')}}</option>
                                                        <option value="GW">{{trans('words.Guinea-Bissau')}}</option>
                                                        <option value="GY">{{trans('words.Guyana')}}</option>
                                                        <option value="HT">{{trans('words.Haiti')}}</option>
                                                        <option value="HN">{{trans('words.Honduras')}}</option>
                                                        <option value="HU">{{trans('words.Hungary')}}</option>
                                                        <option value="IS">{{trans('words.Iceland')}}</option>
                                                        <option value="IN">{{trans('words.India')}}</option>
                                                        <option value="ID">{{trans('words.Indonesia')}}</option>
                                                        <option value="IR">{{trans('words.Iran')}}</option>
                                                        <option value="IQ">{{trans('words.Iraq')}}</option>
                                                        <option value="IL">{{trans('words.Territories')}}</option>
                                                        <option value="IT">{{trans('words.Italy')}}</option>
                                                        <option value="CDI">{{trans('words.Coast')}}</option>
                                                        <option value="JM">{{trans('words.Jamaica')}}</option>
                                                        <option value="JP">{{trans('words.Japan')}}</option>
                                                        <option value="JO">{{trans('words.Jordan')}}</option>
                                                        <option value="KZ">{{trans('words.Kazakhstan')}}</option>
                                                        <option value="KE">{{trans('words.Kenya')}}</option>
                                                        <option value="Kosovo">{{trans('words.Kosovo')}}</option>
                                                        <option value="KW">{{trans('words.Kuwait')}}</option>
                                                        <option value="KG">{{trans('words.Kyrgyzstan')}}</option>
                                                        <option value="LA">{{trans('words.Laos')}}</option>
                                                        <option value="LV">{{trans('words.Latvia')}}</option>
                                                        <option value="LB">{{trans('words.Lebanon')}}</option>
                                                        <option value="LS">{{trans('words.Lesotho')}}</option>
                                                        <option value="LR">{{trans('words.Liberia')}}</option>
                                                        <option value="LY">{{trans('words.Libya')}}</option>
                                                        <option value="LI">{{trans('words.Liechtenstein')}}</option>
                                                        <option value="LT">{{trans('words.Lithuania')}}</option>
                                                        <option value="LU">{{trans('words.Luxembourg')}}</option>
                                                        <option value="MK">{{trans('words.Macedonia')}}</option>
                                                        <option value="MG">{{trans('words.Madagascar')}}</option>
                                                        <option value="MW">{{trans('words.Malawi')}}</option>
                                                        <option value="MY">{{trans('words.Malaysia')}}</option>
                                                        <option value="MV">{{trans('words.Maldives')}}</option>
                                                        <option value="ML">{{trans('words.Mali')}}</option>
                                                        <option value="MT">{{trans('words.Malta')}}</option>
                                                        <option value="MQ">{{trans('words.Martinique')}}</option>
                                                        <option value="MR">{{trans('words.Mauritania')}}</option>
                                                        <option value="MU">{{trans('words.Mauritius')}}</option>
                                                        <option value="YT">{{trans('words.Mayotte')}}</option>
                                                        <option value="MX">{{trans('words.Mexico')}}</option>
                                                        <option value="MD">{{trans('words.Moldova')}}</option>
                                                        <option value="MC">{{trans('words.Monaco')}}</option>
                                                        <option value="MN">{{trans('words.Mongolia')}}</option>
                                                        <option value="ME">{{trans('words.Montenegro')}}</option>
                                                        <option value="MS">{{trans('words.Montserrat')}}</option>
                                                        <option value="MA">{{trans('words.Morocco')}}</option>
                                                        <option value="MZ">{{trans('words.Mozambique')}}</option>
                                                        <option value="NA">{{trans('words.Namibia')}}</option>
                                                        <option value="NP">{{trans('words.Nepal')}}</option>
                                                        <option value="NL">{{trans('words.Netherlands')}}</option>
                                                        <option value="NZ">{{trans('words.New Zealand')}}</option>
                                                        <option value="NI">{{trans('words.Nicaragua')}}</option>
                                                        <option value="NE">{{trans('words.Niger')}}</option>
                                                        <option value="NG">{{trans('words.Nigeria')}}</option>
                                                        <option value="KP">{{trans('words.North_Korea')}}</option>
                                                        <option value="NO">{{trans('words.Norway')}}</option>
                                                        <option value="OM">{{trans('words.Oman')}}</option>
                                                        <option value="PICT">{{trans('words.Pacific Islands')}}</option>
                                                        <option value="PK">{{trans('words.Pakistan')}}</option>
                                                        <option value="PA">{{trans('words.Panama')}}</option>
                                                        <option value="PG">{{trans('words.Papua New Guinea')}}</option>
                                                        <option value="PY">{{trans('words.Paraguay')}}</option>
                                                        <option value="PE">{{trans('words.Peru')}}</option>
                                                        <option value="PH">{{trans('words.Philippines')}}</option>
                                                        <option value="PL">{{trans('words.Poland')}}</option>
                                                        <option value="PT">{{trans('words.Portugal')}}</option>
                                                        <option value="PR">{{trans('words.Puerto Rico')}}</option>
                                                        <option value="QA">{{trans('words.Qatar')}}</option>
                                                        <option value="RE">{{trans('words.Reunion')}}</option>
                                                        <option value="RO">{{trans('words.Romania')}}</option>
                                                        <option value="RU">{{trans('words.Russian Federation')}}</option>
                                                        <option value="RW">{{trans('words.Rwanda')}}</option>
                                                        <option value="KN">{{trans('words.Saint Kitts and Nevis')}}</option>
                                                        <option value="LC">{{trans('words.Saint Lucia')}}</option>
                                                        <option value="VC">{{trans('words.Saint Vincents & Grenadines')}}</option>
                                                        <option value="WS">{{trans('words.Samoa')}}</option>
                                                        <option value="ST">{{trans('words.Sao Tome and Principe')}}</option>
                                                        <option value="SA">{{trans('words.Saudi Arabia')}}</option>
                                                        <option value="SN">{{trans('words.Senegal')}}</option>
                                                        <option value="RS">{{trans('words.Serbia')}}</option>
                                                        <option value="SC">{{trans('words.Seychelles')}}</option>
                                                        <option value="SL">{{trans('words.Sierra Leone')}}</option>
                                                        <option value="SG">{{trans('words.Singapore')}}</option>
                                                        <option value="SK">{{trans('words.Slovakia')}}</option>
                                                        <option value="SI">{{trans('words.Slovenia')}}</option>
                                                        <option value="SB">{{trans('words.Solomon Islands')}}</option>
                                                        <option value="SO">{{trans('words.Somalia')}}</option>
                                                        <option value="ZA">{{trans('words.South Africa')}}</option>
                                                        <option value="KR">{{trans('words.Korea')}}</option>
                                                        <option value="SS">{{trans('words.South Sudan')}}</option>
                                                        <option value="ES">{{trans('words.Spain')}}</option>
                                                        <option value="LK">{{trans('words.Sri Lanka')}}</option>
                                                        <option value="SD">{{trans('words.Sudan')}}</option>
                                                        <option value="SR">{{trans('words.Suriname')}}</option>
                                                        <option value="SZ">{{trans('words.Swaziland')}}</option>
                                                        <option value="SE">{{trans('words.Sweden')}}</option>
                                                        <option value="CH">{{trans('words.Switzerland')}}</option>
                                                        <option value="SY">{{trans('words.Syrian Arab Republic (Syria)')}}</option>
                                                        <option value="TJ">{{trans('words.Tajikistan')}}</option>
                                                        <option value="TZ">{{trans('words.Tanzania, United Republic of')}}</option>
                                                        <option value="TH">{{trans('words.Thailand')}}</option>
                                                        <option value="TL">{{trans('words.Timor-Leste')}}</option>
                                                        <option value="TG">{{trans('words.Togo')}}</option>
                                                        <option value="TT">{{trans('words.Trinidad and Tobago')}}</option>
                                                        <option value="TN">{{trans('words.Tunisia')}}</option>
                                                        <option value="TR">{{trans('words.Turkey')}}</option>
                                                        <option value="TM">{{trans('words.Turkmenistan')}}</option>
                                                        <option value="TC">{{trans('words.Turks and Caicos Islands')}}</option>
                                                        <option value="UG">{{trans('words.Uganda')}}</option>
                                                        <option value="UA">{{trans('words.Ukraine')}}</option>
                                                        <option value="AE">{{trans('words.United Arab Emirates')}}</option>
                                                        <option value="US">{{trans('words.United States of America')}}</option>
                                                        <option value="UY">{{trans('words.Uruguay')}}</option>
                                                        <option value="UZ">{{trans('words.Uzbekistan')}}</option>
                                                        <option value="VE">{{trans('words.Venezuela (Bolivarian Republic)')}}</option>
                                                        <option value="VN">{{trans('words.Viet Nam')}}</option>
                                                        <option value="VG">{{trans('words.Virgin Islands (UK)')}}</option>
                                                        <option value="VI">{{trans('words.Virgin Islands, US')}}</option>
                                                        <option value="YE">{{trans('words.Yemen')}}</option>
                                                        <option value="ZM">{{trans('words.Zambia')}}</option>
                                                        <option value="ZW">{{trans('words.Zimbabwe')}}</option>
                                                    </select>

                                                    @if($locale=='en')
                                                    <label>Country*</label>
                                                    @elseif($locale=='ar')
                                                    <label>بلد *</label>
                                                    @elseif($locale=='cn')
                                                    <label>国家*</label>
                                                    @endif




                                                </div>
                                            </div>
                                            <!--  -->
                                        </div>
                                        <!--  -->
                                    </div>
                                    <!-- End -->

                                    <!-- Property info -->
                                    <div class="col s12">
                                        <h6 style="margin-bottom: 2em;">{{trans('words.payment_label')}}</h6>
                                        <!-- <h5 class="title-uppercase mt0">Enter your details</h5> -->
                                    </div>

                                    <div class="col s12 p0">

                                        <!-- address city, po country -->
                                        <div class="col s12 p0">

                                            <!-- Avail projects in area -->
                                            <div class="col s12 m4">
                                                <div class="input-field col s12" style="padding-left: 0;border: none;padding-right: 0;">
                                                    <select name="property_id" required>
                                                        <!-- <option value="">{{trans('words.Select Property')}}</option> -->

                                                        @if($locale=='en')
                                                        <option value="">{{trans('words.Select Property')}}</option>
                                                        @elseif($locale=='ar')
                                                        <option value="">{{trans('words.Select Property')}}</option>
                                                        @elseif($locale=='cn')
                                                        <option value="">选择项目</option>
                                                        @endif

                                                        @if(!empty($props))
                                                        @foreach($props as $prop)
                                                        <option value="{!! $prop->id !!}">{!! $prop->title_en !!}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                    <label>{{trans('words.Select Project*')}}</label>
                                                </div>
                                            </div>
                                            <!--  -->

                                            <!-- Avail floor -->
                                            <div class="col s12 m4">
                                                <div class="input-field col s12">
                                                    <div class="col s12">
                                                        <!-- <input type="text" id="autocomplete-input" class="autocomplete input-box" placeholder="{{trans('words.floor_block_placeholder')}}" name="floor" required> -->

                                                        @if($locale=='en')
                                                        <input type="text" id="autocomplete-input" class="autocomplete input-box" placeholder="{{trans('words.floor_block_placeholder')}}" name="floor_block" required>
                                                        @elseif($locale=='ar')
                                                        <input type="text" id="autocomplete-input" class="autocomplete input-box" placeholder="{{trans('words.floor_block_placeholder')}}" name="floor_block" required>
                                                        @elseif($locale=='cn')
                                                        <input type="text" id="autocomplete-input" class="autocomplete input-box" placeholder="输入您的楼层/街区" name="floor" required>
                                                        @endif

                                                        <label>
                                                            <!-- {{trans('words.Floor/Block*')}} -->
                                                            @if($locale=='en')
                                                            {{trans('words.Floor/Block*')}}
                                                            @elseif($locale=='ar')
                                                            {{trans('words.Floor/Block*')}}
                                                            @elseif($locale=='cn')
                                                            楼层/街区
                                                            @endif
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--  -->

                                            <!-- Avail units features in projects -->
                                            <div class="col s12 m4">
                                                <div class="input-field col s12">
                                                    <div class="col s12">
                                                        <input type="text" id="autocomplete-input" class="autocomplete input-box" placeholder="{{trans('words.unit_no_placeholder')}}" name="unit_number" required>
                                                        <label><!-- {{trans('words.unit_label')}} -->
                                                            @if($locale=='en')
                                                            {{trans('words.unit_label')}}
                                                            @elseif($locale=='ar')
                                                            {{trans('words.unit_label')}}
                                                            @elseif($locale=='cn')
                                                            公寓编号
                                                            @endif

                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--  -->
                                        </div>
                                        <!--  -->

                                        <!-- Payment -->
                                        <div class="col s12 m6">
                                            <div class="input-field col s12 m6">
                                                <div class="col s12">
                                                    <input type="number" id="autocomplete-input" class="autocomplete input-box" placeholder="{{trans('words.payment_amount_placeholder')}}" name="payment_amount" required min="1" max="100000">
                                                    <input type="hidden" value="<?= $_SERVER['REMOTE_ADDR'] ?>" name="ip_address" />
                                                    <label>{{trans('words.payment_amount_label')}}</label>
                                                </div>
                                            </div>

                                            @if($locale=='en')
                                            <div class="input-field col s12 m6" style="border: none;padding-right: 0;">
                                                @elseif($locale=='ar')
                                                <div class="input-field col s12 m6" style="padding-left: 0;border: none;">
                                                    @elseif($locale=='cn')
                                                    <div class="input-field col s12 m6" style="border: none;padding-right: 0;">
                                                        @endif


                                                        <select name="payment_for" required>
                                                            <option value="">{{trans('words.payment_category_label')}}</option>
                                                            <option value="Booking Fee">{{trans('words.Booking Fee')}}</option>
                                                            <option value="Installment">{{trans('words.Installment')}}</option>
                                                            <option value="Oqood Fee">{{trans('words.Oqood Fee')}}</option>
                                                            <option value="ERES Fee">{{trans('words.ERES Fee')}}</option>
                                                            <option value="Other">{{trans('words.Other')}}</option>
                                                        </select>
                                                        <label>{{trans('words.Payment for*')}}</label>
                                                    </div>
                                                    <div class="input-field col s12 m12 pay-mob">
                                                        <div class="col s3" id="" style="float: left !important;">
                                                            <input type="text" id="alter_code" name="alter_code" class="autocomplete  input-box input-dir"  value="+971" required>
                                                        </div>

                                                        <div class="col s3" style="width:0% !important" style="float: left !important;">
                                                            <input type="text" id="acode2" name="acode2" class="autocomplete input-box" value="" maxlength="0">
                                                        </div>


                                                        @if($locale=='en')
                                                        <div class="col s6" style="border-left: 1px solid #e6e6e6;padding-right: 0;float: left !important;">
                                                            @endif
                                                            @if($locale=='ar')
                                                            <div class="col s6" style="border-left: 1px solid #e6e6e6;padding-right: 0;float: left !important;">
                                                                @endif
                                                                @if($locale=='cn')
                                                                <div class="col s6" style="border-left: 1px solid #e6e6e6;padding-right: 0;float: left !important;">
                                                                    @endif

                                                                    <!-- <div class="col s6" style="border-left: 1px solid #e6e6e6;padding-right: 0;"> -->
                                                                    <input type="number" id="autocomplete-input" class="autocomplete input-box" placeholder="{{trans('words.Enter Alternate Phone Number')}}" name="alt_phone_number" required maxlength="10">
                                                                    <label>{{trans('words.Alternate Phone Number*')}}</label>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <!--  -->

                                                        <!-- Address -->
                                                        <div class="col s12 m6">
                                                            <div class="input-field col s12">
                                                                <div class="col s12">
                                                                    <textarea id="textarea1" class="materialize-textarea" placeholder="{{trans('words.payment_desc_placeholder')}}" style="border: none !important;" name="payment_desc" required></textarea>
                                                                    <label class="active">{{trans('words.Payment Description*')}}</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--  -->

                                                    </div>
                                                    <!-- End -->

                                                    <!-- Proceed -->
                                                    <div class="col s12 p0">
                                                        <div class="col s6 ">
                                                            <span id="terms" style="cursor: pointer">Terms & Conditions &#9432;</span><br/>
                                                            <p id="termsinfo" style="display:none;margin:5px">No refunds/cancellation will be accepted for any card transactions made on the website.<br/>Governing Law and Jurisdiction: “Any purchase, dispute or claim arising out of or in connection with this website shall be governed and construed in accordance with the laws of UAE”</p>
                                                            &nbsp;&nbsp;&nbsp;<label><input type="checkbox" value="1" required="required" style="opacity:1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                Accept </label> <span id="terms"></span> <br/>
                                                        </div>
                                                        <div class="col s6 right-align">
                                                            <!--<a class="inquire az-btn active" style="margin: 35px 0px;">Proceed Payment</a>-->
                                                            <input type="submit" class="inquire az-btn active" style="margin: 35px 0px;" value="{{trans('words.Proceed Payment')}}">
                                                        </div>
                                                    </div>
                                                    <!-- End -->

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
                                        
                                        <script type="text/javascript" src="{{asset('assets/build/js/intlTelInput.js')}}"></script>
                                        <script type="text/javascript" src="{{asset('assets/js/payment_form.js')}}"></script>
                                        <script>
$(".phone").intlTelInput({
    nationalMode: false,
    preferredCountries: ['ae'],
    utilsScript: "<?= asset('assets/build/js/utils.js') ?>"
});

$("select[required]").css({position: "absolute", display: "inline", height: 0, padding: 0, width: 0});
$("#code").intlTelInput({
    nationalMode: false,
    autoHideDialCode: false,
    preferredCountries: ['ae'],
    utilsScript: "<?= asset('assets/build/js/utils.js') ?>"
});

$("#area_code").intlTelInput({
    nationalMode: false,
    autoHideDialCode: false,
    preferredCountries: ['ae'],
    utilsScript: "<?= asset('assets/build/js/utils.js') ?>"
});

$("#alter_code").intlTelInput({
    nationalMode: false,
    autoHideDialCode: false,
    preferredCountries: ['ae'],
    utilsScript: "<?= asset('assets/build/js/utils.js') ?>"
});
$('#terms').click(function () {
    $('#termsinfo').toggle();
});
                                        </script>	
                                        @stop
                                        @section('footer_scripts')
                                        @stop
