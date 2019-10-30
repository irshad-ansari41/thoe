
@extends('layouts/default')

{{-- page level styles --}}
@section('header_styles')
<link rel="stylesheet" href="{{asset('assets/build/css/intlTelInput.css')}}">
<link rel="stylesheet" href="{{asset('assets/build/css/demo.css')}}">
<style>
    .select-dropdown{border:1px solid #e4e4e4!important;padding-left:0!important;color:#b7b7b7!important;border-radius:0!important}
    .pay-mob .col.s3{width:23%!important;margin-top:3px!important;padding-left:1px!important}
    .input-box{border-bottom:none;margin-bottom:0;font-size:15px;letter-spacing:1px;font-weight:100}
    .input-dir{direction:initial!important}
    dashboard_title{width:99%;color:#025A8D;font-size:14px;font-weight:700;background:#aab2c8;padding:8px 4px 8px 17px;margin:8px 0;border-bottom:1px #7986a9 solid}
    table{background:#fff;border-color:#666;clear:both;color:#333;margin:0 auto;margin-bottom:10px;width:100%}
    table tr td{vertical-align:top;border-bottom:0 solid #ddd;border:solid #efefef 1px;padding:5px;font-size:12px;vertical-align:middle}
    @media print {
        .myDivToPrint{background-color:#fff;height:100%;width:100%;position:fixed;top:0;left:0;margin:0;padding:15px;font-size:14px;line-height:18px}
    }
</style>
@stop

@section('main_div_wrapper')
@stop

@section('section_content')
<?php
$get = filter_input_array(INPUT_GET);
$paymentstring = @unserialize($row->paymentstring);
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
                if (!empty($response['response_message']) && $response['response_message'] == 'Success') {
                    echo "<span style='color:green'>Success</span>";
                } elseif (!empty($response['response_message'])) {
                    echo "<span style='color:red'>{$response['response_message']}</span>";
                }
                ?>
                <a  href="{{route('payment-payfort.index')}}" style="float: right;margin: 5px 5px 0 0;width: 180px;padding: 1.5px 17px;border-radius:1px;margin-bottom: 10px;background: gray;border: none;color: #fff;cursor: pointer;" >Back To Payment</a>
                <input type="button" class="button"  value="Print" style="float: right;margin: 5px 5px 0 0;width: 100px;padding: 5px 17px;margin-bottom: 10px;background: green;border: none;color: #fff;cursor: pointer;" onclick="PrintElem('myDivToPrint')" />
                <div id="myDivToPrint">
                    <table cellpadding="10" cellspacing="10" border="1" class="left_content" width="100%" style="border-collapse:collapse">
                        <tr><td colspan="11" class="dashboard_title" style="padding:10px 7px"><h6>View Payment Detail</h6></td></tr>	

                        <tr class="content">
                            <td valign="top" width="30%" style="padding:7px"><strong>First Name: </strong></td>
                            <td width="70%"><?= $row->first_name ?></td>
                        </tr>
                        <tr class="content">
                            <td valign="top" width="30%" style="padding:7px"><strong>Last Name: </strong></td>
                            <td width="70%"><?= $row->last_name ?></td>
                        </tr>
                        <tr class="content">
                            <td valign="top" width="30%" style="padding:7px"><strong>Email: </strong></td>
                            <td width="70%"><?= $row->email_id ?></td>
                        </tr>
                        <tr class="content">
                            <td valign="top" width="30%" style="padding:7px"><strong>Address: </strong></td>
                            <td width="70%"><?= $row->address ?></td>
                        </tr>
                        <tr class="content">
                            <td valign="top" width="30%" style="padding:7px"><strong>City: </strong></td>
                            <td width="70%"><?= $row->city ?></td>
                        </tr>
                        <tr class="content">
                            <td valign="top" width="30%" style="padding:7px"><strong>State: </strong></td>
                            <td width="70%"><?= $row->state ?></td>
                        </tr><tr class="content">
                            <td valign="top" width="30%" style="padding:7px"><strong>Country: </strong></td>
                            <td width="70%"><?= DB::table('countries')->where('countries_iso_code', $row->country)->value('countries_name') ?></td>
                        </tr>
                        <tr class="content">
                            <td valign="top" width="30%" style="padding:7px"><strong>Zip Code: </strong></td>
                            <td width="70%"><?= $row->post_code ?></td>
                        </tr>
                        <?php if (!empty($response['fort_id'])) { ?>
                            <tr class="content">
                                <td valign="top" width="30%" style="padding:7px"><strong>Transaction ID: </strong></td>
                                <td width="70%"><?= $response['fort_id'] ?></td>
                            </tr>
                        <?php } ?>
                        <tr class="content">
                            <td valign="top" width="30%" style="padding:7px"><strong>Reference Number: </strong></td>
                            <td width="70%"><?= $row->order_id ?></td>
                        </tr>
                        <tr class="content">
                            <td valign="top" width="30%" style="padding:7px"><strong>Amount: </strong></td>
                            <td width="70%"><?= $row->payment_amount ?></td>
                        <tr class="content">
                            <td valign="top" width="30%" style="padding:7px"><strong>Currency: </strong></td>
                            <td width="70%"><?= $response['currency'] ?></td>
                        <tr class="content">
                            <td valign="top" width="30%" style="padding:7px"><strong>Message: </strong></td>
                            <td width="70%"><?= !empty($paymentstring['response_message'])?$paymentstring['response_message']:'' ?></td>
                        </tr>
                        <tr class="content">
                            <td valign="top" width="30%" style="padding:7px"><strong>Data & Time: </strong></td>
                            <td width="70%"><?= $row->payment_date ?></td>
                        </tr>
                        <tr class="content">
                            <td valign="top" width="30%" style="padding:7px"><strong>Payment Status: </strong></td>
                            <td width="70%">
                                <?php
                                if (!empty($response['response_message']) && $response['response_message'] == 'Success') {
                                    echo"<span style='color:green;padding: 3px;'>Success</span>";
                                } elseif (!empty($response['response_message'])) {
                                    echo "<span style='color:red;padding: 3px;'>{$response['response_message']}</span>";
                                }
                                ?>
                            </td>
                        </tr>

                    </table>
                </div>
            </div>

        </div>



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
                        utilsScript: "./build/js/utils.js"
                    });

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

                    function PrintElem(elem)
                    {
                        var mywindow = window.open('', 'PRINT', 'height=400,width=600');

                        mywindow.document.write('<html><head><title>' + document.title + '</title>');
                        mywindow.document.write('</head><body >');
                        mywindow.document.write('<h2>Online Payment Receipt</h2>');
                        mywindow.document.write(document.getElementById(elem).innerHTML);
                        mywindow.document.write('</body></html>');

                        mywindow.document.close(); // necessary for IE >= 10
                        mywindow.focus(); // necessary for IE >= 10*/

                        mywindow.print();
                        mywindow.close();

                        return true;
                    }
</script>	
@stop
@section('footer_scripts')
@stop
