
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
<section class="az-section">
    <div class="container">
        <div class="parallax-container valign-wrapper only-heading">
            <div class="parallax">
                @if($content->image!="")
                <img alt="banner" src="{{ asset('assets/images/banner/') }}/{{ $content->image }}" >
                @endif
            </div>
            <div class="col s12 center-align card tag-pro{{$locale=='ar'?'-ar':''}}">
                <h1>{{trans('words.Pay Online')}}</h1>
                <!--<p><i class="ion ion-ios-location-outline" class="text-bold-900"></i></p>-->
            </div>

        </div>
        <div class="row m0">
            <div class="col s12 p0">
                <div class="col s12 p0">
                    <?php
                    if ($locale == 'en') {
                        $links = [url("$locale") => trans('words.home'), '' => trans('words.Pay Online')];
                    } elseif ($locale == 'cn') {
                        $links = [url("$locale") => '主页', '' => '在线支付'];
                    } elseif ($locale == 'ar') {
                        $links = [url("$locale") => trans('words.home'), '' => trans('words.Pay Online')];
                    }
                    ?>
                    <?= generate_breadcrumb($links, $locale) ?>                   
                </div>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="row">
            <div class="col s12 m12">
                <h5 class="mt0 mb0">{{trans('words.Pay Online')}}</h5>
                <!--<p class="az-pcontent title-p">Pay your bill online</p>
                <p class="az-pcontent">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut liquip ex ea commodo.</p>-->
                <?php
                if (!empty($_GET['status']) && $_GET['status'] == 'success') {
                    echo "<span style='color:green'>{$_GET['message']}</span>";
                }
                if (!empty($_GET['status']) && $_GET['status'] == 'cancel') {
                    echo "<span style='color:red'>{$_GET['message']}</span>";
                }
                //echo '<pre>'; print_r($payment); echo '</pre>';
                ?>

                <?php if ($payment->payment_for != 'Online Booking') { ?>
                    <a  href="{{route('payment.index')}}" style="float: right; margin: 0px 5px 0 0; width: 180px; padding: 8px 17px; border-radius: 1px; margin-bottom: 10px; background: gray; border: none; color: #fff; cursor: pointer;" >Back To Payment</a>
                <?php } ?>
                <?php if ($payment->payment_for == 'Online Booking') { ?>
                    <a  href="{{url("/$locale/online-booking")}}" style="float: right; margin: 0px 5px 0 0; width: 180px; padding: 8px 17px; border-radius: 1px; margin-bottom: 10px; background: gray; border: none; color: #fff; cursor: pointer;" >Back To Book Online</a>
                <?php } ?>

                <input type="button" class="button"  value="Print" style="float: right; margin: 0px 5px 0 0; width: 100px; padding: 0px 17px; margin-bottom: 10px; background: #ffc107; border: none; color: #fff; cursor: pointer;" onclick="PrintElem('myDivToPrint')" />
                <div id="myDivToPrint">
                    <table cellpadding="10" cellspacing="10" border="1" class="left_content striped" width="100%" style="border-collapse:collapse">
                        <tr><td colspan="11" class="dashboard_title" style="padding:10px 7px"><h6>View Payment Detail</h6></td></tr>	

                        <tr class="content">
                            <td valign="top" width="30%" style="padding:7px"><strong>First Name: </strong></td>
                            <td width="70%"><?= $response['req_bill_to_forename'] ?></td>
                        </tr>
                        <tr class="content">
                            <td valign="top" width="30%" style="padding:7px"><strong>Last Name: </strong></td>
                            <td width="70%"><?= $response['req_bill_to_surname'] ?></td>
                        </tr>
                        <tr class="content">
                            <td valign="top" width="30%" style="padding:7px"><strong>Email: </strong></td>
                            <td width="70%"><?= $response['req_bill_to_email'] ?></td>
                        </tr>
                        <tr class="content">
                            <td valign="top" width="30%" style="padding:7px"><strong>Address: </strong></td>
                            <td width="70%"><?= $response['req_bill_to_address_line1'] ?></td>
                        </tr>
                        <tr class="content">
                            <td valign="top" width="30%" style="padding:7px"><strong>City: </strong></td>
                            <td width="70%"><?= $response['req_bill_to_address_city'] ?></td>
                        </tr>
                        <tr class="content">
                            <td valign="top" width="30%" style="padding:7px"><strong>State: </strong></td>
                            <td width="70%"><?= $response['req_bill_to_address_state'] ?></td>
                        </tr><tr class="content">
                            <td valign="top" width="30%" style="padding:7px"><strong>Country: </strong></td>
                            <td width="70%"><?= $response['req_bill_to_address_country'] ?></td>
                        </tr>
                        <tr class="content">
                            <td valign="top" width="30%" style="padding:7px"><strong>Zip Code: </strong></td>
                            <td width="70%"><?= $response['req_bill_to_address_postal_code'] ?></td>
                        </tr>
                        <tr class="content">
                            <td valign="top" width="30%" style="padding:7px"><strong>Transaction ID: </strong></td>
                            <td width="70%"><?= !empty($response['transaction_id']) ? $response['transaction_id'] : '' ?></td>
                        </tr>
                        <tr class="content">
                            <td valign="top" width="30%" style="padding:7px"><strong>Reference Number: </strong></td>
                            <td width="70%"><?= $response['req_reference_number'] ?></td>
                        </tr>
                        <tr class="content">
                            <td valign="top" width="30%" style="padding:7px"><strong>Payment for: </strong></td>
                            <td width="70%"><?= $payment->payment_for ?></td>
                        </tr>
                        <tr class="content">
                            <td valign="top" width="30%" style="padding:7px"><strong>Amount: </strong></td>
                            <td width="70%"><?= $response['req_amount'] ?></td>
                        </tr>
                        <tr class="content">
                            <td valign="top" width="30%" style="padding:7px"><strong>Currency: </strong></td>
                            <td width="70%"><?= $response['req_currency'] ?></td>
                        </tr>
                        <tr class="content">
                            <td valign="top" width="30%" style="padding:7px"><strong>Message: </strong></td>
                            <td width="70%"><span style="<?= $response['decision'] != 'ACCEPT' ? 'color:red;' : '' ?>"><?= $response['message'] ?></span></td>
                        </tr>
                        <tr class="content">
                            <td valign="top" width="30%" style="padding:7px"><strong>Data & Time: </strong></td>
                            <td width="70%"><?= $response['signed_date_time'] ?></td>
                        </tr>
                        <tr class="content">
                            <td valign="top" width="30%" style="padding:7px"><strong>Payment Status: </strong></td>
                            <td width="70%">
                                <?php
                                if ($response['decision'] == 'ACCEPT') {
                                    echo"<span style='color:green;padding: 3px 5px;'>Success</span>";
                                } else if ($response['decision'] == 'CANCEL') {
                                    echo "<span style='color:red;padding: 3px 5px;'>Cancel</span>";
                                }
                                ?>
                            </td>
                        </tr>

                    </table>
                </div>
                <?php if ($payment->payment_for == 'Online Booking' && $response['decision'] == 'ACCEPT') { ?>
                    <a  href="{{route('payment.index')}}" style="float: right;margin: 5px 5px 0 0;width: 180px;padding: 1.5px 17px;border-radius:1px;margin-bottom: 10px;background: #28a745;border: none;color: #fff;cursor: pointer;" > Please Choose Unit</a>
                <?php } ?>
            </div>
        </div>
        <br/>
        <br/>
        <br/>
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
