<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller as Controller;

use Illuminate\Http\Request;
use App\Models\Properties;
use App\Models\Payment;
use App\Models\Booking;
use App\Models\Project;
use App\Models\Unities;
use App\Models\Unitfloors;
use App\Models\Unitfeatures;
use DB;

class AdminPayController extends Controller {

    public function getBookingTransactionStatus(Request $request) {

        $results = Booking::with("get_property", "get_unit", "get_unit_floors", "get_unit_features", "get_project")->orderBy("id", "desc")->get();

        if (count($results) > 0) {
            foreach ($results as $result) {
                $networkOnlineArray = array('Network_Online_setting' => array(
                        'merchantKey' => "7kb3Jg6jZez/49sV/UcHUTmkl7yZ1O8WDZxAGcs19Ho=", // "<YOUR_KEY>" Your key provided by network international
                        'merchantId' => '201602161000001', // <YOUR_MERCHANT_ID> Your merchant ID ex: 201408191000001
                        'collaboratorId' => 'NI', // Constant used by Network Online international
                        'iv' => '0123456789abcdef', // Used for initializing CBC encryption mode
                        'url' => false                // Set to false if you are using testing environment , set to true if you are using live environment
                    ),
                    'Block_Existence_Indicator' => array(
                        'transactionDataBlock' => true
                    ),
                    'Field_Existence_Indicator_Transaction' => array(
                        'ReferenceID' => '', // Optional Value 
                        'merchantOrderNumber' => $result['order_id'], //  Merchant Order Number Mandatory field 
                        'transactionType' => ''           //   Optional Value 
                ));

                $resp = $this->booking_fun($networkOnlineArray);

                $res = explode("|", $resp['text']);
                $data = array();

                if ($res[13] == "Auth Success") {
                    $data['payment_status'] = 1;
                }
                if ($res[13] == "Capture/Sale Success") {
                    $data['verified'] = 1;
                }
                if ($res[13] == "Settled") {
                    $data['merchant_payment_status'] = 1;
                }
                Booking::where('id', $result['id'])->update($data);
            }
        }

        return redirect('admin/payment/booking');
    }

    public function book_propery(Request $request) {


        $record = $_POST;

        $ptitle = '';

        if (isset($_POST['first_name'])) {
            $project = Project::find($_POST['project_id']);
            $projecttitle = $project->title_en;

            $prop = Properties::find($_POST['property_id']);
            $ptitle = $prop->title_en;

            $units = Unities::find($_POST['unit_number']);
            $unitname = $units->title_en;

            $unit_floor = Unitfloors::find($_POST['floor_block']);
            $unit_floor_name = $unit_floor->title_en;

            $unit_feature = Unitfeatures::find($_POST['unity_feature']);
            $unit_feature_name = $unit_feature->title_en;
        }

        $booking = new Booking();
        $orderid = hexdec(uniqid());
        $booking->order_id = $orderid;
        $booking->first_name = $request->first_name;
        $booking->last_name = $request->last_name;
        $booking->email_id = $request->email_id;
        $booking->mobile_number = $request->mobile_number;
        $booking->landline_number = $request->landline_number;
        $booking->passport_number = $request->passport_number;
        $booking->address = $request->address;
        $booking->city = $request->city;
        $booking->state = $request->state;
        $booking->post_code = $request->post_code;

        $booking->country = $request->country;
        $booking->project_id = $request->project_id;
        $booking->property_id = $request->property_id;
        $booking->floor_block = $request->floor_block;
        $booking->unit_number = $request->unit_number;
        $booking->unity_feature = $request->unity_feature;
        $booking->comments = $request->comments;
        $booking->sales_code = $request->sales_code;

        if ($request->payment_amount) {
            $booking->payment_amount = $request->payment_amount;
        } else {
            $booking->payment_amount = 0;
        }

        $booking->payment_status = "0";
        $booking->created = date("Y-m-d H:i:s");
        $booking->save();

        $networkOnlineArray = array('Network_Online_setting' => array(
                'merchantKey' => "7PrJT0m3yBXPp7/6Rec1uSje0YD/DygGmIFaTYpSi50=", // Your key provided by network international
                'merchantId' => '201706121000003', //  Your merchant ID ex: 201408191000001
                'collaboratorId' => 'NI', // Constant used by Network Online international
                'iv' => '0123456789abcdef', // Used for initializing CBC encryption mode
                'url' => true              // Set to false if you are using testing environment ,
            ),
            'Block_Existence_Indicator' => array(
                'transactionDataBlock' => true,
                'billingDataBlock' => true,
                'shippingDataBlock' => true,
                'paymentDataBlock' => true,
                'merchantDataBlock' => true,
                'otherDataBlock' => true,
                'DCCDataBlock' => true
            ),
            'Field_Existence_Indicator_Transaction' => array(
                'merchantOrderNumber' => $orderid,
                'amount' => $_POST['payment_amount'],
                'successUrl' => SITE_URL.'/en/success_payment_booking',
                'failureUrl' => SITE_URL.'/en/success_payment_booking',
                'transactionMode' => 'INTERNET',
                'payModeType' => 'true',
                'transactionType' => '02',
                'currency' => 'AED'
            ),
            'Field_Existence_Indicator_Billing' => array(
                'billToFirstName' => $request->first_name,
                'billToLastName' => $request->last_name,
                'billToStreet1' => $request->address,
                'billToStreet2' => $request->address,
                'billToCity' => $request->city,
                'billToState' => $request->state,
                'billtoPostalCode' => $request->post_code,
                'billToCountry' => $request->country,
                'billToEmail' => $request->email_id,
                'billToMobileNumber' => ltrim($request->code . $request->acode . $request->mobile_number, "+"),
                'billToPhoneNumber1' => ltrim($request->area_code, "+"),
                'billToPhoneNumber2' => ltrim($request->acode1, "+"),
                'billToPhoneNumber3' => ltrim($request->landline_number, "+")
            ),
            'Field_Existence_Indicator_Shipping' => array(
                'shipToFirstName' => $request->first_name,
                'shipToLastName' => $request->last_name,
                'shipToStreet1' => $request->address,
                'shipToStreet2' => $request->address,
                'shipToCity' => $request->city,
                'shipToState' => $request->state,
                'shipToPostalCode' => $request->post_code,
                'shipToCountry' => $request->country,
                'shipToPhoneNumber1' => ltrim($request->area_code, "+"),
                'shipToPhoneNumber2' => ltrim($request->acode1, "+"),
                'shipToPhoneNumber3' => ltrim($request->landline_number, "+"),
                'shipToMobileNumber' => ltrim($request->code . $request->acode . $request->mobile_number, "+")
            ),
            'Field_Existence_Indicator_Payment' => array(
                'cardNumber' => '4111111111111111', // 1. Card Number  
                'expMonth' => '08', // 2. Expiry Month 
                'expYear' => '2020', // 3. Expiry Year
                'CVV' => '123', // 4. CVV  
                'cardHolderName' => 'Soloman', // 5. Card Holder Name 
                'cardType' => 'Visa', // 6. Card Type
                'custMobileNumber' => '9820998209', // 7. Customer Mobile Number
                'paymentID' => '123456', // 8. Payment ID 
                'OTP' => '123456', // 9. OTP field 
                'gatewayID' => '1026', // 10.Gateway ID 
                'cardToken' => '1202'              // 11.Card Token 
            ),
            'Field_Existence_Indicator_Merchant' => array(
                'UDF1' => '115.121.181.112', // This is a ‘user-defined field’ that can be used to send additional information about the transaction.
                'UDF2' => 'abc', // This is a ‘user-defined field’ that can be used to send additional information about the transaction.
                'UDF3' => 'abc', // This is a ‘user-defined field’ that can be used to send additional information about the transaction.
                'UDF4' => 'abc', // This is a ‘user-defined field’ that can be used to send additional information about the transaction.
                'UDF5' => 'abc', // This is a ‘user-defined field’ that can be used to send additional information about the transaction.
                'UDF6' => 'abc', // This is a ‘user-defined field’ that can be used to send additional information about the transaction.
                'UDF7' => 'abc', // This is a ‘user-defined field’ that can be used to send additional information about the transaction.
                'UDF8' => 'abc', // This is a ‘user-defined field’ that can be used to send additional information about the transaction.
                'UDF9' => 'abc', // This is a ‘user-defined field’ that can be used to send additional information about the transaction.
                'UDF10' => 'abc'              // This is a ‘user-defined field’ that can be used to send additional information about the transaction.							
            ),
            'Field_Existence_Indicator_OtherData' => array(
                'custID' => '12345',
                'transactionSource' => 'IVR',
                'productInfo' => 'Book',
                'isUserLoggedIn' => 'Y',
                'itemTotal' => '500.00, 1000.00',
                'itemCategory' => 'CD, Book',
                'ignoreValidationResult' => 'FALSE'
            ),
            'Field_Existence_Indicator_DCC' => array(
                'DCCReferenceNumber' => '09898787', // DCC Reference Number
                'foreignAmount' => '240.00', // Foreign Amount
                'ForeignCurrency' => 'USD'  // Foreign Currency
            )
        );

        $this->payment_fun($networkOnlineArray);

        if (isset($_REQUEST['responseParameter']) && $_REQUEST['responseParameter'] != '') {

            $response = $this->decryptData($_REQUEST['responseParameter'], $this->merchantKey, $this->iv);
            $this->AddLog('Network Online Response : ' . print_r($response, TRUE), '16');
        }

        $requestParameter = $this->NeoPostData;

        $meta_title = '';
        $meta_keyword = '';
        $meta_description = '';
        $slug = '';
        $og_title = '';
        $og_desc = '';
        $og_pic = '';

        $records_menu = get_menu('en',1);
        $footers_part1 = get_menu('en',2, 4, 0);
        $footers_part2 = get_menu('en',2, 5, 4);
        $setting = get_setting();
        $about = array();
        $executive = array();
        $timeline = array();
        $teams = array();

        $requestUrl = 'https://NeO.network.ae/direcpay/secure/PaymentTxnServlet';

        $request->session()->flash('alert-success', 'Thanks you for booking property. We will contact to you shortly.');

        $ptype = "1";
        return view('confirm_booking_payment', compact('record', 'records_menu', 'footers_part1', 'footers_part2', 'setting', 'ptitle', 'projecttitle', 'unitname', 'unit_floor_name', 'unit_feature_name', 'meta_title', 'meta_keyword', 'meta_description', 'ptype', 'slug', 'requestUrl', 'requestParameter', 'og_title', 'og_desc', 'og_pic'));
    }

    public function online_payment(Request $request) {



        $ptitle = '';

        if (isset($_POST['property'])) {
            $prop = Properties::find($_POST['property']);
            $ptitle = $prop->title_en;
        }
        $record = $_POST;



        $payment_data = array();

        $payment = new Payment();
        $orderid = hexdec(uniqid());

        $payment->order_id = $orderid;
        $payment->first_name = $request->first_name;
        $payment->last_name = $request->last_name;
        $payment->email_id = $request->email;
        $payment->mobile_number = $request->code . " " . $request->acode . " " . $request->mobile_no;
        $payment->landline_number = $request->area_code . " " . $request->acode1 . " " . $request->land_no;
        $payment->passport_number = $request->passport_no;
        $payment->address = $request->address;
        $payment->city = $request->city;
        $payment->state = $request->state;
        $payment->post_code = $request->post_code;
        if (isset($request->country)) {
            $payment->country = "";
        } else {
            $payment->country = $request->country;
        }
        $payment->property_id = $request->property;
        $payment->floor_block = $request->floor;
        $payment->unit_number = $request->unit;
        $payment->payment_amount = $request->payment_amount;
        $payment->payment_for = $request->payment_category;
        $payment->alt_phone_number = $request->area_code . " " . $request->acode2 . " " . $request->alternate_phone_no;
        $payment->payment_desc = $request->payment_description;
        $payment->payment_date = date("Y-m-d H:i:s");
        $payment->created = date("Y-m-d H:i:s");
        $payment->payment_status = "0";

        $payment->save();


        $records_menu = get_menu('en',1);
        $footers_part1 = get_menu('en',2, 4, 0);
        $footers_part2 = get_menu('en',2, 5, 4);
        $setting = get_setting();
        $about = array();
        $executive = array();
        $timeline = array();
        $teams = array();



        $networkOnlineArray = array('Network_Online_setting' => array(
                'merchantKey' => "7PrJT0m3yBXPp7/6Rec1uSje0YD/DygGmIFaTYpSi50=", // Your key provided by network international
                'merchantId' => '201706121000003', //  Your merchant ID ex: 201408191000001
                'collaboratorId' => 'NI', // Constant used by Network Online international
                'iv' => '0123456789abcdef', // Used for initializing CBC encryption mode
                'url' => true              // Set to false if you are using testing environment ,
            ),
            'Block_Existence_Indicator' => array(
                'transactionDataBlock' => true,
                'billingDataBlock' => true,
                'shippingDataBlock' => true,
                'paymentDataBlock' => true,
                'merchantDataBlock' => true,
                'otherDataBlock' => true,
                'DCCDataBlock' => true
            ),
            'Field_Existence_Indicator_Transaction' => array(
                'merchantOrderNumber' => $orderid,
                'amount' => $_POST['payment_amount'],
                'successUrl' => SITE_URL.'/en/success_payment_booking',
                'failureUrl' => SITE_URL.'/en/success_payment_booking',
                'transactionMode' => 'INTERNET',
                'payModeType' => 'true',
                'transactionType' => '01',
                'currency' => 'AED'
            ),
            'Field_Existence_Indicator_Billing' => array(
                'billToFirstName' => $request->first_name,
                'billToLastName' => $request->last_name,
                'billToStreet1' => $request->address,
                'billToStreet2' => $request->address,
                'billToCity' => $request->city,
                'billToState' => $request->state,
                'billtoPostalCode' => $request->post_code,
                'billToCountry' => $request->country,
                'billToEmail' => $request->email,
                'billToMobileNumber' => ltrim($request->code . $request->acode . $request->mobile_no, "+"),
                'billToPhoneNumber1' => ltrim($request->area_code, "+"),
                'billToPhoneNumber2' => ltrim($request->acode1, "+"),
                'billToPhoneNumber3' => ltrim($request->land_no, "+")
            ),
            'Field_Existence_Indicator_Shipping' => array(
                'shipToFirstName' => $request->first_name,
                'shipToLastName' => $request->last_name,
                'shipToStreet1' => $request->address,
                'shipToStreet2' => $request->address,
                'shipToCity' => $request->city,
                'shipToState' => $request->state,
                'shipToPostalCode' => $request->post_code,
                'shipToCountry' => $request->country,
                'shipToPhoneNumber1' => ltrim($request->area_code, "+"),
                'shipToPhoneNumber2' => ltrim($request->acode1, "+"),
                'shipToPhoneNumber3' => ltrim($request->land_no, "+"),
                'shipToMobileNumber' => ltrim($request->code . $request->acode . $request->mobile_no, "+")
            ),
            'Field_Existence_Indicator_Payment' => array(
                'cardNumber' => '4111111111111111', // 1. Card Number  
                'expMonth' => '08', // 2. Expiry Month 
                'expYear' => '2020', // 3. Expiry Year
                'CVV' => '123', // 4. CVV  
                'cardHolderName' => 'Soloman', // 5. Card Holder Name 
                'cardType' => 'Visa', // 6. Card Type
                'custMobileNumber' => '9820998209', // 7. Customer Mobile Number
                'paymentID' => '123456', // 8. Payment ID 
                'OTP' => '123456', // 9. OTP field 
                'gatewayID' => '1026', // 10.Gateway ID 
                'cardToken' => '1202'              // 11.Card Token 
            ),
            'Field_Existence_Indicator_Merchant' => array(
                'UDF1' => '115.121.181.112', // This is a ‘user-defined field’ that can be used to send additional information about the transaction.
                'UDF2' => 'abc', // This is a ‘user-defined field’ that can be used to send additional information about the transaction.
                'UDF3' => 'abc', // This is a ‘user-defined field’ that can be used to send additional information about the transaction.
                'UDF4' => 'abc', // This is a ‘user-defined field’ that can be used to send additional information about the transaction.
                'UDF5' => 'abc', // This is a ‘user-defined field’ that can be used to send additional information about the transaction.
                'UDF6' => 'abc', // This is a ‘user-defined field’ that can be used to send additional information about the transaction.
                'UDF7' => 'abc', // This is a ‘user-defined field’ that can be used to send additional information about the transaction.
                'UDF8' => 'abc', // This is a ‘user-defined field’ that can be used to send additional information about the transaction.
                'UDF9' => 'abc', // This is a ‘user-defined field’ that can be used to send additional information about the transaction.
                'UDF10' => 'abc'              // This is a ‘user-defined field’ that can be used to send additional information about the transaction.							
            ),
            'Field_Existence_Indicator_OtherData' => array(
                'custID' => '12345',
                'transactionSource' => 'IVR',
                'productInfo' => 'Book',
                'isUserLoggedIn' => 'Y',
                'itemTotal' => '500.00, 1000.00',
                'itemCategory' => 'CD, Book',
                'ignoreValidationResult' => 'FALSE'
            ),
            'Field_Existence_Indicator_DCC' => array(
                'DCCReferenceNumber' => '09898787', // DCC Reference Number
                'foreignAmount' => '240.00', // Foreign Amount
                'ForeignCurrency' => 'USD'  // Foreign Currency
            )
        );

        $this->payment_fun($networkOnlineArray);

        if (isset($_REQUEST['responseParameter']) && $_REQUEST['responseParameter'] != '') {

            $response = $this->decryptData($_REQUEST['responseParameter'], $this->merchantKey, $this->iv);
            $this->AddLog('Network Online Response : ' . print_r($response, TRUE), '16');
        }

        $requestParameter = $this->NeoPostData;

        $meta_title = '';
        $meta_keyword = '';
        $meta_description = '';
        $slug = '';
        $og_title = '';
        $og_desc = '';
        $og_pic = '';

        $requestUrl = 'https://NeO.network.ae/direcpay/secure/PaymentTxnServlet';



        $ptype = "1";
        return view('confirm_payment', compact('record', 'records_menu', 'footers_part1', 'footers_part2', 'setting', 'ptitle', 'meta_title', 'meta_keyword', 'meta_description', 'ptype', 'slug', 'requestUrl', 'requestParameter', 'og_title', 'og_desc', 'og_pic'));
    }

    public function success_payment_booking() {

        if (isset($_REQUEST['responseParameter'])) {

            $response = $this->decryptData($_REQUEST['responseParameter'], '7PrJT0m3yBXPp7/6Rec1uSje0YD/DygGmIFaTYpSi50=', "0123456789abcdef");


            $res = explode("|", $response['Transaction_Response']);

            $res1 = explode("|", $response['Transaction_Status_information']);



            if ($res1[1] == "SUCCESS") {
                $order_id = $res[1];
                $records_menu = get_menu('en',1);
                $footers_part1 = get_menu('en',2, 4, 0);
                $footers_part2 = get_menu('en',2, 5, 4);
                $setting = get_setting();
                $about = array();
                $executive = array();
                $timeline = array();
                $teams = array();
                $ptype = 1;

                $data = array();
                $data['payment_status'] = 1;
                $data['merchant_currency'] = $res[2];
                $data['error_code'] = $res1[2];


                if (isset($order_id)) {


                    $rec = Payment::select("tbl_payment.*", "tbl_properties.title_en as property_title", "tbl_property_unit.title_en as unit_title", "tbl_property_unit_floors.title_en as unit_floor_title")->where("order_id", $order_id)->leftJoin("tbl_properties", "tbl_properties.id", "=", "tbl_payment.property_id")->leftJoin("tbl_property_unit", "tbl_property_unit.id", "=", "tbl_payment.unit_number")->leftJoin("tbl_property_unit_floors", "tbl_property_unit_floors.id", "=", "tbl_payment.floor_block")->first();



                    if (!empty($rec)) {

                        $fullname = $rec->first_name . " " . $rec->last_name;

                        $message = '<!doctype html><html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office"><head><!--[if gte mso 15]> <xml> <o:OfficeDocumentSettings> <o:AllowPNG/> <o:PixelsPerInch>96</o:PixelsPerInch> </o:OfficeDocumentSettings> </xml><![endif]--> <meta charset="UTF-8"> <meta http-equiv="X-UA-Compatible" content="IE=edge"> <meta name="viewport" content="width=device-width, initial-scale=1"> <title>THOE DEVELOPMENTS</title> <style type="text/css"> p{margin:10px 0;padding:0}table{border-collapse:collapse}h1,h2,h3,h4,h5,h6{display:block;margin:0;padding:0}img,a img{border:0;height:auto;outline:none;text-decoration:none}body,#bodyTable,#bodyCell{height:100%;margin:0;padding:0;width:100%}.mcnPreviewText{display:none!important}#outlook a{padding:0}img{-ms-interpolation-mode:bicubic}table{mso-table-lspace:0pt;mso-table-rspace:0pt}.ReadMsgBody{width:100%}.ExternalClass{width:100%}p,a,li,td,blockquote{mso-line-height-rule:exactly}a[href^=tel],a[href^=sms]{color:inherit;cursor:default;text-decoration:none}p,a,li,td,body,table,blockquote{-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}.ExternalClass,.ExternalClass p,.ExternalClass td,.ExternalClass div,.ExternalClass span,.ExternalClass font{line-height:100%}a[x-apple-data-detectors]{color:inherit!important;text-decoration:none!important;font-size:inherit!important;font-family:inherit!important;font-weight:inherit!important;line-height:inherit!important}a.mcnButton{display:block}.mcnImage{vertical-align:bottom}.mcnTextContent{word-break:break-word}.mcnTextContent img{height:auto!important}.mcnDividerBlock{table-layout:fixed!important}body,#bodyTable{background-color:#FFF}#bodyCell{border-top:0}#templateContainer{background-color:#FFF;border:0}h1{color:#B2B2B2!important;font-family:Helvetica;font-size:30px;font-style:normal;font-weight:700;line-height:125%;letter-spacing:-1px;text-align:left}h2{color:#303030!important;font-family:Helvetica;font-size:16px;font-style:normal;font-weight:700;line-height:125%;letter-spacing:-.75px;text-align:left}h3{color:#606060!important;font-family:Helvetica;font-size:18px;font-style:normal;font-weight:700;line-height:125%;letter-spacing:-.5px;text-align:left}h4{color:#808080!important;font-family:Helvetica;font-size:16px;font-style:normal;font-weight:700;line-height:125%;letter-spacing:normal;text-align:left}#templatePreheader{background-color:#FFF;border-top:0;border-bottom:0}.preheaderContainer .mcnTextContent,.preheaderContainer .mcnTextContent p{color:#606060;font-family:Helvetica;font-size:11px;line-height:125%;text-align:left}.preheaderContainer .mcnTextContent a{color:#606060;font-weight:400;text-decoration:underline}#templateHeader{background-color:#fff;border-top:0;border-bottom:0}.headerContainer .mcnTextContent,.headerContainer .mcnTextContent p{color:#606060;font-family:Helvetica;font-size:15px;line-height:150%;text-align:left}.headerContainer .mcnTextContent a{color:#60CA2E;font-weight:400;text-decoration:underline}#templateUpperBody,#templateLowerBody{background-color:#fff}#templateUpperBody{border-top:0}#templateLowerBody{border-bottom:0}.bodyContainer .mcnTextContent,.bodyContainer .mcnTextContent p{color:#606060;font-family:Helvetica;font-size:15px;line-height:150%;text-align:left}.bodyContainer .mcnTextContent a{color:#0a71a2;font-weight:400;text-decoration:underline}#templateFooter{background-color:#EFEFEF;border-top:10px solid #FFF;border-bottom:0}.footerContainer .mcnTextContent,.footerContainer .mcnTextContent p{color:#606060;font-family:Helvetica;font-size:11px;line-height:125%;text-align:center}.footerContainer .mcnTextContent a{color:#4caad8;font-weight:700;text-decoration:none}@media only screen and (max-width:480px){body,table,td,p,a,li,blockquote{-webkit-text-size-adjust:none!important}}@media only screen and (max-width:480px){body{width:100%!important;min-width:100%!important}}@media only screen and (max-width:480px){#bodyCell{padding-top:10px!important}}@media only screen and (max-width:480px){#templateContainer,#templatePreheader,#templateHeader,#templateUpperBody,#templateLowerBody,#templateFooter,.flexibleContainer{max-width:600px!important;width:100%!important}}@media only screen and (max-width:480px){.mcnImage{height:auto!important;width:100%!important}}@media only screen and (max-width:480px){.mcnCartContainer,.mcnCaptionTopContent,.mcnRecContentContainer,.mcnCaptionBottomContent,.mcnTextContentContainer,.mcnBoxedTextContentContainer,.mcnImageGroupContentContainer,.mcnCaptionLeftTextContentContainer,.mcnCaptionRightTextContentContainer,.mcnCaptionLeftImageContentContainer,.mcnCaptionRightImageContentContainer,.mcnImageCardLeftTextContentContainer,.mcnImageCardRightTextContentContainer,.mcnImageCardLeftImageContentContainer,.mcnImageCardRightImageContentContainer{max-width:100%!important;width:100%!important}}@media only screen and (max-width:480px){.mcnBoxedTextContentContainer{min-width:100%!important}}@media only screen and (max-width:480px){.mcnImageGroupContent{padding:9px!important}}@media only screen and (max-width:480px){.mcnCaptionLeftContentOuter .mcnTextContent,.mcnCaptionRightContentOuter .mcnTextContent{padding-top:9px!important}}@media only screen and (max-width:480px){.mcnImageCardTopImageContent,.mcnCaptionBottomContent:last-child .mcnCaptionBottomImageContent,.mcnCaptionBlockInner .mcnCaptionTopContent:last-child .mcnTextContent{padding-top:18px!important}}@media only screen and (max-width:480px){.mcnImageCardBottomImageContent{padding-bottom:9px!important}}@media only screen and (max-width:480px){.mcnImageGroupBlockInner{padding-top:0!important;padding-bottom:0!important}}@media only screen and (max-width:480px){.mcnImageGroupBlockOuter{padding-top:9px!important;padding-bottom:9px!important}}@media only screen and (max-width:480px){.mcnTextContent,.mcnBoxedTextContentColumn{padding-right:18px!important;padding-left:18px!important}}@media only screen and (max-width:480px){.mcnImageCardLeftImageContent,.mcnImageCardRightImageContent{padding-right:18px!important;padding-bottom:0!important;padding-left:18px!important}}@media only screen and (max-width:480px){.mcpreview-image-uploader{display:none!important;width:100%!important}}@media only screen and (max-width:480px){h1{font-size:24px!important;line-height:125%!important}}@media only screen and (max-width:480px){h2{font-size:20px!important;line-height:125%!important}}@media only screen and (max-width:480px){h3{font-size:18px!important;line-height:125%!important}}@media only screen and (max-width:480px){h4{font-size:16px!important;line-height:125%!important}}@media only screen and (max-width:480px){.mcnBoxedTextContentContainer .mcnTextContent,.mcnBoxedTextContentContainer .mcnTextContent p{font-size:18px!important;line-height:125%!important}}@media only screen and (max-width:480px){#templatePreheader{display:block!important}}@media only screen and (max-width:480px){.preheaderContainer .mcnTextContent,.preheaderContainer .mcnTextContent p{font-size:14px!important;line-height:115%!important}}@media only screen and (max-width:480px){.headerContainer .mcnTextContent,.headerContainer .mcnTextContent p{font-size:18px!important;line-height:125%!important}}@media only screen and (max-width:480px){.bodyContainer .mcnTextContent,.bodyContainer .mcnTextContent p{font-size:18px!important;line-height:125%!important}}@media only screen and (max-width:480px){.footerContainer .mcnTextContent,.footerContainer .mcnTextContent p{font-size:14px!important;line-height:115%!important}}</style></head><body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0"> <span class="mcnPreviewText" style="display:none; font-size:0px; line-height:0px; max-height:0px; max-width:0px; opacity:0; overflow:hidden; visibility:hidden; mso-hide:all;"></span> <center> <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable"> <tr> <td align="center" valign="top" id="bodyCell"> <table border="0" cellpadding="0" cellspacing="0" width="600" class="flexibleContainer"> <tbody> <tr> <td align="center" valign="top"> <table border="0" cellpadding="0" cellspacing="0" width="620" id="templatePreheader"> <tbody> <tr> <td align="center" valign="top"> <table border="0" cellpadding="0" cellspacing="0" width="600" class="flexibleContainer"> <tbody> <tr> <td valign="top" class="preheaderContainer" style="padding-bottom:9px;"></td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr><tr> <td align="center" valign="top" style="padding-bottom:40px;"> <table border="0" cellpadding="0" cellspacing="0" width="620" id="templateContainer" style="background-color:#FFFFFF;"> <tbody> <tr> <td align="center" valign="top" style="padding-top:10px; padding-right:10px; padding-bottom:10px; padding-left:10px;"> <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border: 1px solid #fbfbfb;"> <tbody> <tr> <td align="center" valign="top"> <table border="0" cellpadding="0" cellspacing="0" width="600" id="templateUpperBody"> <tbody> <tr> <td valign="middle" width="100%" class="bodyContainer"> <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;"> <tbody class="mcnTextBlockOuter"> <tr> <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;"><!--[if mso]> <table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;"> <tr><![endif]--><!--[if mso]> <td valign="top" width="600" style="width:600px;"><![endif]--> <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer"> <tbody> <tr> <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;"> <h1 style="text-align: center;"><img data-file-id="2533737" height="51" src="https://gallery.mailchimp.com/c1f4421889758b6ca52d47ab4/images/1bd9eb80-8296-4e49-8c15-f5c6a9a4972e.png" style="border: 0px ; width: 200px; height: 51px; margin: 0px;" width="200"></h1> </td></tr></tbody> </table><!--[if mso]> </td><![endif]--><!--[if mso]> </tr></table><![endif]--> </td></tr></tbody> </table> <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageBlock" style="min-width:100%;"> <tbody class="mcnImageBlockOuter"> <tr> <td valign="top" style="padding:0px" class="mcnImageBlockInner"> <table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" class="mcnImageContentContainer" style="min-width:100%;"> <tbody> <tr> <td class="mcnImageContent" valign="top" style="padding-right: 0px; padding-left: 0px; padding-top: 0; padding-bottom: 0; text-align:center;"> <img align="center" alt="" src="https://gallery.mailchimp.com/c1f4421889758b6ca52d47ab4/images/36389632-dca1-46de-a353-d98b6b85baa8.jpg" width="600" style="max-width:1230px; padding-bottom: 0; display: inline !important; vertical-align: bottom;" class="mcnImage"> </td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr><tr> <td align="center" valign="top"> <table border="0" cellpadding="0" cellspacing="0" width="600" id="templateLowerBody"> <tbody> <tr> <td valign="middle" width="100%" class="bodyContainer"> <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;"> <tbody class="mcnTextBlockOuter"> <tr> <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;"><!--[if mso]> <table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;"> <tr><![endif]--><!--[if mso]> <td valign="top" width="585" style="width:585px;"><![endif]--> <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer"> <tbody> <tr> <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;"> <div style="text-align: left;"> <br><strong><span style="font-size:25px;color: black;text-transform: uppercase;letter-spacing: 5px;">Thank You !!!</span></strong></div></td></tr></tbody> </table><!--[if mso]> </td><![endif]--><!--[if mso]> </tr></table><![endif]--> </td></tr></tbody> </table> <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;"> <tbody class="mcnTextBlockOuter"> <tr> <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;"><!--[if mso]> <table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;"> <tr><![endif]--><!--[if mso]> <td valign="top" width="585" style="width:585px;"><![endif]--> <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer"> <tbody> <tr> <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;"> <div style="text-align: left;color: #0c0c0c;letter-spacing: 1px;">We have received your booking request. THOE team will check your request and confirm it as soon as possible. If you have any queries, <br>Please feel free to contact us at <a id="sudin@thoedevelopments.com" name="sudin@thoedevelopments.com"><strong>sudin@thoedevelopments.com</strong></a> &nbsp; <br>or <a id="+971 4 359 6673" name="+971 4 359 6673">+971 4 359 6673</a></div></td></tr></tbody> </table><!--[if mso]> </td><![endif]--><!--[if mso]> </tr></table><![endif]--> </td></tr></tbody> </table> <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnBoxedTextBlock" style="min-width:100%;"><!--[if gte mso 9]> <table align="center" border="0" cellspacing="0" cellpadding="0" width="100%"><![endif]--> <tbody class="mcnBoxedTextBlockOuter"> <tr> <td valign="top" class="mcnBoxedTextBlockInner"><!--[if gte mso 9]> <td align="center" valign="top" "><![endif]--> <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;" class="mcnBoxedTextContentContainer"> <tbody> <tr> <td style="padding-top:9px; padding-left:18px; padding-bottom:9px; padding-right:18px;"> <table border="0" cellspacing="0" class="mcnTextContentContainer" width="100%" style="min-width:100% !important;"> <tbody> <tr> <td valign="top" class="mcnTextContent" style="color: #413F3F;font-family: Helvetica;font-size: 14px;font-weight: normal;text-align: center;letter-spacing: 1px;border: 1px solid #efefef;"> <div style="text-align: left;background: #f7f7f7;padding: 10px 15px;"><span style="font-size:18px;">Your payment summary</span> </div><table style="text-align: left;margin: 20px 15px;width: 95%;color: #5f5f5f;text-transform: capitalize;font-size: 12px;letter-spacing: 2px;"> <tbody> <tr style="border-bottom: 1px solid #f7f7f7;"> <td>Order Number:</td><td>' . $order_id . '</td></tr><tr style="border-bottom: 1px solid #f7f7f7;"> <td>Booking Date:</td><td>' . date("d-m-Y h:i:s", strtotime($rec->created)) . '</td></tr><tr style="border-bottom: 1px solid #f7f7f7;"> <td>Booking Amount:</td><td>AED ' . number_format($rec->payment_amount, 2) . '</td></tr><tr style="border-bottom: 1px solid #f7f7f7;"> <td>First Name:</td><td>' . $rec->first_name . '</td></tr><tr style="border-bottom: 1px solid #f7f7f7;"> <td>Last Name:</td><td>' . $rec->last_name . '</td></tr><tr style="border-bottom: 1px solid #f7f7f7;"> <td>Email ID:</td><td>' . $rec->email_id . '</td></tr><tr style="border-bottom: 1px solid #f7f7f7;"> <td>Mobile Number:</td><td>' . $rec->mobile_number . '</td></tr><tr style="border-bottom: 1px solid #f7f7f7;"> <td>Landline Number:</td><td>' . $rec->landline_number . '</td></tr><tr style="border-bottom: 1px solid #f7f7f7;"> <td>Passport Number:</td><td>' . $rec->passport_number . '</td></tr><tr style="border-bottom: 1px solid #f7f7f7;"> <td>Address :</td><td>' . $rec->address . '</td></tr><tr style="border-bottom: 1px solid #f7f7f7;"> <td>City :</td><td>' . $rec->city . '</td></tr><tr style="border-bottom: 1px solid #f7f7f7;"> <td>State :</td><td>' . $rec->state . '</td></tr><tr style="border-bottom: 1px solid #f7f7f7;"> <td>Country :</td><td>' . $rec->country . '</td></tr><tr style="border-bottom: 1px solid #f7f7f7;"> <td>Postal code :</td><td>' . $rec->post_code . '</td></tr><tr style="border-bottom: 1px solid #f7f7f7;"> <td>Project by area :</td><td></td></tr><tr style="border-bottom: 1px solid #f7f7f7;"> <td>Property :</td><td>' . $rec->property_title . '</td></tr><tr style="border-bottom: 1px solid #f7f7f7;"> <td>Unit :</td><td>' . $rec->unit_title . '</td></tr><tr style="border-bottom: 1px solid #f7f7f7;"> <td>Unit Floor:</td><td>' . $rec->unit_floor_title . '</td></tr><tr style="border-bottom: 1px solid #f7f7f7;"> <td>Unit Feature:</td><td></td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr></tbody> </table><!--[if gte mso 9]> </td><![endif]--><!--[if gte mso 9]> </tr></table><![endif]--> </td></tr></tbody> </table> <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnButtonBlock" style="min-width:100%;"> </table> </td><td align="left" valign="middle" style="padding-top:9px; padding-bottom:9px;"><img src="https://gallery.mailchimp.com/27aac8a65e64c994c4416d6b8/images/image_pointer_right_white.1.png" height="30" width="15"></td></tr></tbody> </table> </td></tr><tr> <td align="center" valign="top"> <table border="0" cellpadding="0" cellspacing="0" width="600" id="templateFooter"> <tbody> <tr> <td valign="top" class="footerContainer" style="padding-top:9px; padding-bottom:9px;"> <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;"> <tbody class="mcnTextBlockOuter"> <tr> <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;"><!--[if mso]> <table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;"> <tr><![endif]--><!--[if mso]> <td valign="top" width="600" style="width:600px;"><![endif]--> <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer"> <tbody> <tr> <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;"> <img src="' . SITE_URL . '/public/assets/images/logo/1512057079974960845.png" style="width: 115px;"> <br><p style="margin: 0;">Copyright © The Heart of Europe, All rights reserved.</p><a href="mailto:enquire@thoedevelopments.com" style="font-weight: 400;"><span style="color:#000000">enquire@thoedevelopments.com</span></a> <br><a id="thoedevelopments.com" name="thoedevelopments.com" style="font-weight: 400;"><span style="color:#000000">www.thoedevelopments.com</span></a> </td></tr></tbody> </table><!--[if mso]> </td><![endif]--><!--[if mso]> </tr></table><![endif]--> </td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr></table> </center></body></html>';


                        $headers = "From: THOE Developments< info@thoedevelopments.com >\n";
                        $headers .= 'X-Mailer: PHP/' . phpversion();
                        $headers .= "X-Priority: 1\n"; // Urgent message!
                        $headers .= "MIME-Version: 1.0\r\n";
                        $headers .= "Content-Type: text/html; charset=iso-8859-1\n";


                        mail($rec->email_id, "Payment Success", $message, $headers);
                    }
                }
            } else {

                if ($res1[1] == "FAILURE") {
                    $data = array();
                    $data['payment_status'] = 2;
                    $data['error_code'] = $res1[2];
                    $meta_title = '';
                    $meta_keyword = '';
                    $meta_description = '';
                    $og_title = '';
                    $og_desc = '';
                    $og_pic = '';
                    $flag = 0;

                    return redirect('' . session()->get('lang') . '/online-payments?error=1');
                }
                $data = array();
                $data['payment_status'] = 2;
                $data['error_code'] = $res1[2];
            }

            Payment::where('order_id', $order_id)->update($data);
            $flag = 1;
        } else {
            $flag = 0;
        }

        $meta_title = '';
        $meta_keyword = '';
        $meta_description = '';
        $og_title = '';
        $og_desc = '';
        $og_pic = '';



        $pdata = Payment::select("tbl_payment.*", "tbl_properties.title_en as property_title", "tbl_property_unit.title_en as unit_title", "tbl_property_unit_floors.title_en as unit_floor_title")->where("order_id", $order_id)->leftJoin("tbl_properties", "tbl_properties.id", "=", "tbl_payment.property_id")->leftJoin("tbl_property_unit", "tbl_property_unit.id", "=", "tbl_payment.unit_number")->leftJoin("tbl_property_unit_floors", "tbl_property_unit_floors.id", "=", "tbl_payment.floor_block")->first();

        return view('paymentstatus_booking', compact('records_menu', 'footers_part1', 'footers_part2', 'setting', 'meta_title', 'meta_keyword', 'meta_description', 'ptype', 'og_title', 'og_desc', 'og_pic', 'flag', 'pdata'));
    }

    public function success_payment() {


        if (isset($_REQUEST['responseParameter'])) {

            $response = $this->decryptData($_REQUEST['responseParameter'], '7kb3Jg6jZez/49sV/UcHUTmkl7yZ1O8WDZxAGcs19Ho=', "0123456789abcdef");

            $res = explode("|", $response['Transaction_Response']);

            $res1 = explode("|", $response['Transaction_Status_information']);



            if ($res1[1] == "SUCCESS") {
                $order_id = $res[1];
                $records_menu = get_menu('en',1);
                $footers_part1 = get_menu('en',2, 4, 0);
                $footers_part2 = get_menu('en',2, 5, 4);
                $setting = get_setting();
                $about = array();
                $executive = array();
                $timeline = array();
                $teams = array();
                $ptype = 1;

                $data = array();
                $data['payment_status'] = 1;
                $data['merchant_currency'] = $res[2];
                $data['error_code'] = $res1[2];

                if (isset($order_id)) {
                    $rec = Payment::select("tbl_payment.*", "tbl_properties.title_en as project_title")->where("order_id", $order_id)->join("tbl_properties", "tbl_properties.id", "=", "tbl_payment.property_id")->first();

                    $fullname = $rec->first_name . " " . $rec->last_name;

                    $message = '<!doctype html><html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office"><head><!--[if gte mso 15]> <xml> <o:OfficeDocumentSettings> <o:AllowPNG/> <o:PixelsPerInch>96</o:PixelsPerInch> </o:OfficeDocumentSettings> </xml><![endif]--> <meta charset="UTF-8"> <meta http-equiv="X-UA-Compatible" content="IE=edge"> <meta name="viewport" content="width=device-width, initial-scale=1"> <title>THOE DEVELOPMENTS</title> <style type="text/css"> p{margin:10px 0;padding:0}table{border-collapse:collapse}h1,h2,h3,h4,h5,h6{display:block;margin:0;padding:0}img,a img{border:0;height:auto;outline:none;text-decoration:none}body,#bodyTable,#bodyCell{height:100%;margin:0;padding:0;width:100%}.mcnPreviewText{display:none!important}#outlook a{padding:0}img{-ms-interpolation-mode:bicubic}table{mso-table-lspace:0pt;mso-table-rspace:0pt}.ReadMsgBody{width:100%}.ExternalClass{width:100%}p,a,li,td,blockquote{mso-line-height-rule:exactly}a[href^=tel],a[href^=sms]{color:inherit;cursor:default;text-decoration:none}p,a,li,td,body,table,blockquote{-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}.ExternalClass,.ExternalClass p,.ExternalClass td,.ExternalClass div,.ExternalClass span,.ExternalClass font{line-height:100%}a[x-apple-data-detectors]{color:inherit!important;text-decoration:none!important;font-size:inherit!important;font-family:inherit!important;font-weight:inherit!important;line-height:inherit!important}a.mcnButton{display:block}.mcnImage{vertical-align:bottom}.mcnTextContent{word-break:break-word}.mcnTextContent img{height:auto!important}.mcnDividerBlock{table-layout:fixed!important}body,#bodyTable{background-color:#FFF}#bodyCell{border-top:0}#templateContainer{background-color:#FFF;border:0}h1{color:#B2B2B2!important;font-family:Helvetica;font-size:30px;font-style:normal;font-weight:700;line-height:125%;letter-spacing:-1px;text-align:left}h2{color:#303030!important;font-family:Helvetica;font-size:16px;font-style:normal;font-weight:700;line-height:125%;letter-spacing:-.75px;text-align:left}h3{color:#606060!important;font-family:Helvetica;font-size:18px;font-style:normal;font-weight:700;line-height:125%;letter-spacing:-.5px;text-align:left}h4{color:#808080!important;font-family:Helvetica;font-size:16px;font-style:normal;font-weight:700;line-height:125%;letter-spacing:normal;text-align:left}#templatePreheader{background-color:#FFF;border-top:0;border-bottom:0}.preheaderContainer .mcnTextContent,.preheaderContainer .mcnTextContent p{color:#606060;font-family:Helvetica;font-size:11px;line-height:125%;text-align:left}.preheaderContainer .mcnTextContent a{color:#606060;font-weight:400;text-decoration:underline}#templateHeader{background-color:#fff;border-top:0;border-bottom:0}.headerContainer .mcnTextContent,.headerContainer .mcnTextContent p{color:#606060;font-family:Helvetica;font-size:15px;line-height:150%;text-align:left}.headerContainer .mcnTextContent a{color:#60CA2E;font-weight:400;text-decoration:underline}#templateUpperBody,#templateLowerBody{background-color:#fff}#templateUpperBody{border-top:0}#templateLowerBody{border-bottom:0}.bodyContainer .mcnTextContent,.bodyContainer .mcnTextContent p{color:#606060;font-family:Helvetica;font-size:15px;line-height:150%;text-align:left}.bodyContainer .mcnTextContent a{color:#0a71a2;font-weight:400;text-decoration:underline}#templateFooter{background-color:#EFEFEF;border-top:10px solid #FFF;border-bottom:0}.footerContainer .mcnTextContent,.footerContainer .mcnTextContent p{color:#606060;font-family:Helvetica;font-size:11px;line-height:125%;text-align:center}.footerContainer .mcnTextContent a{color:#4caad8;font-weight:700;text-decoration:none}@media only screen and (max-width:480px){body,table,td,p,a,li,blockquote{-webkit-text-size-adjust:none!important}}@media only screen and (max-width:480px){body{width:100%!important;min-width:100%!important}}@media only screen and (max-width:480px){#bodyCell{padding-top:10px!important}}@media only screen and (max-width:480px){#templateContainer,#templatePreheader,#templateHeader,#templateUpperBody,#templateLowerBody,#templateFooter,.flexibleContainer{max-width:600px!important;width:100%!important}}@media only screen and (max-width:480px){.mcnImage{height:auto!important;width:100%!important}}@media only screen and (max-width:480px){.mcnCartContainer,.mcnCaptionTopContent,.mcnRecContentContainer,.mcnCaptionBottomContent,.mcnTextContentContainer,.mcnBoxedTextContentContainer,.mcnImageGroupContentContainer,.mcnCaptionLeftTextContentContainer,.mcnCaptionRightTextContentContainer,.mcnCaptionLeftImageContentContainer,.mcnCaptionRightImageContentContainer,.mcnImageCardLeftTextContentContainer,.mcnImageCardRightTextContentContainer,.mcnImageCardLeftImageContentContainer,.mcnImageCardRightImageContentContainer{max-width:100%!important;width:100%!important}}@media only screen and (max-width:480px){.mcnBoxedTextContentContainer{min-width:100%!important}}@media only screen and (max-width:480px){.mcnImageGroupContent{padding:9px!important}}@media only screen and (max-width:480px){.mcnCaptionLeftContentOuter .mcnTextContent,.mcnCaptionRightContentOuter .mcnTextContent{padding-top:9px!important}}@media only screen and (max-width:480px){.mcnImageCardTopImageContent,.mcnCaptionBottomContent:last-child .mcnCaptionBottomImageContent,.mcnCaptionBlockInner .mcnCaptionTopContent:last-child .mcnTextContent{padding-top:18px!important}}@media only screen and (max-width:480px){.mcnImageCardBottomImageContent{padding-bottom:9px!important}}@media only screen and (max-width:480px){.mcnImageGroupBlockInner{padding-top:0!important;padding-bottom:0!important}}@media only screen and (max-width:480px){.mcnImageGroupBlockOuter{padding-top:9px!important;padding-bottom:9px!important}}@media only screen and (max-width:480px){.mcnTextContent,.mcnBoxedTextContentColumn{padding-right:18px!important;padding-left:18px!important}}@media only screen and (max-width:480px){.mcnImageCardLeftImageContent,.mcnImageCardRightImageContent{padding-right:18px!important;padding-bottom:0!important;padding-left:18px!important}}@media only screen and (max-width:480px){.mcpreview-image-uploader{display:none!important;width:100%!important}}@media only screen and (max-width:480px){h1{font-size:24px!important;line-height:125%!important}}@media only screen and (max-width:480px){h2{font-size:20px!important;line-height:125%!important}}@media only screen and (max-width:480px){h3{font-size:18px!important;line-height:125%!important}}@media only screen and (max-width:480px){h4{font-size:16px!important;line-height:125%!important}}@media only screen and (max-width:480px){.mcnBoxedTextContentContainer .mcnTextContent,.mcnBoxedTextContentContainer .mcnTextContent p{font-size:18px!important;line-height:125%!important}}@media only screen and (max-width:480px){#templatePreheader{display:block!important}}@media only screen and (max-width:480px){.preheaderContainer .mcnTextContent,.preheaderContainer .mcnTextContent p{font-size:14px!important;line-height:115%!important}}@media only screen and (max-width:480px){.headerContainer .mcnTextContent,.headerContainer .mcnTextContent p{font-size:18px!important;line-height:125%!important}}@media only screen and (max-width:480px){.bodyContainer .mcnTextContent,.bodyContainer .mcnTextContent p{font-size:18px!important;line-height:125%!important}}@media only screen and (max-width:480px){.footerContainer .mcnTextContent,.footerContainer .mcnTextContent p{font-size:14px!important;line-height:115%!important}}</style></head><body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0"> <span class="mcnPreviewText" style="display:none; font-size:0px; line-height:0px; max-height:0px; max-width:0px; opacity:0; overflow:hidden; visibility:hidden; mso-hide:all;"></span> <center> <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable"> <tr> <td align="center" valign="top" id="bodyCell"> <table border="0" cellpadding="0" cellspacing="0" width="600" class="flexibleContainer"> <tbody> <tr> <td align="center" valign="top"> <table border="0" cellpadding="0" cellspacing="0" width="620" id="templatePreheader"> <tbody> <tr> <td align="center" valign="top"> <table border="0" cellpadding="0" cellspacing="0" width="600" class="flexibleContainer"> <tbody> <tr> <td valign="top" class="preheaderContainer" style="padding-bottom:9px;"></td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr><tr> <td align="center" valign="top" style="padding-bottom:40px;"> <table border="0" cellpadding="0" cellspacing="0" width="620" id="templateContainer" style="background-color:#FFFFFF;"> <tbody> <tr> <td align="center" valign="top" style="padding-top:10px; padding-right:10px; padding-bottom:10px; padding-left:10px;"> <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border: 1px solid #fbfbfb;"> <tbody> <tr> <td align="center" valign="top"> <table border="0" cellpadding="0" cellspacing="0" width="600" id="templateUpperBody"> <tbody> <tr> <td valign="middle" width="100%" class="bodyContainer"> <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;"> <tbody class="mcnTextBlockOuter"> <tr> <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;"><!--[if mso]> <table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;"> <tr><![endif]--><!--[if mso]> <td valign="top" width="600" style="width:600px;"><![endif]--> <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer"> <tbody> <tr> <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;"> <h1 style="text-align: center;"><img data-file-id="2533737" height="51" src="https://gallery.mailchimp.com/c1f4421889758b6ca52d47ab4/images/1bd9eb80-8296-4e49-8c15-f5c6a9a4972e.png" style="border: 0px ; width: 200px; height: 51px; margin: 0px;" width="200"></h1> </td></tr></tbody> </table><!--[if mso]> </td><![endif]--><!--[if mso]> </tr></table><![endif]--> </td></tr></tbody> </table> <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageBlock" style="min-width:100%;"> <tbody class="mcnImageBlockOuter"> <tr> <td valign="top" style="padding:0px" class="mcnImageBlockInner"> <table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" class="mcnImageContentContainer" style="min-width:100%;"> <tbody> <tr> <td class="mcnImageContent" valign="top" style="padding-right: 0px; padding-left: 0px; padding-top: 0; padding-bottom: 0; text-align:center;"> <img align="center" alt="" src="https://gallery.mailchimp.com/c1f4421889758b6ca52d47ab4/images/36389632-dca1-46de-a353-d98b6b85baa8.jpg" width="600" style="max-width:1230px; padding-bottom: 0; display: inline !important; vertical-align: bottom;" class="mcnImage"> </td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr><tr> <td align="center" valign="top"> <table border="0" cellpadding="0" cellspacing="0" width="600" id="templateLowerBody"> <tbody> <tr> <td valign="middle" width="100%" class="bodyContainer"> <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;"> <tbody class="mcnTextBlockOuter"> <tr> <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;"><!--[if mso]> <table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;"> <tr><![endif]--><!--[if mso]> <td valign="top" width="585" style="width:585px;"><![endif]--> <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer"> <tbody> <tr> <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;"> <div style="text-align: left;"> <br><strong><span style="font-size:25px;color: black;text-transform: uppercase;letter-spacing: 5px;">Thank You !!!</span></strong></div></td></tr></tbody> </table><!--[if mso]> </td><![endif]--><!--[if mso]> </tr></table><![endif]--> </td></tr></tbody> </table> <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;"> <tbody class="mcnTextBlockOuter"> <tr> <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;"><!--[if mso]> <table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;"> <tr><![endif]--><!--[if mso]> <td valign="top" width="585" style="width:585px;"><![endif]--> <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer"> <tbody> <tr> <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;"> <div style="text-align: left;color: #0c0c0c;letter-spacing: 1px;">We have received your payment. If you have any queries, <br>Please feel free to contact us at <a id="sudin@thoedevelopments.com" name="sudin@thoedevelopments.com"><strong>sudin@thoedevelopments.com</strong></a> &nbsp; <br>or <a id="+971 4 359 6673" name="+971 4 359 6673">+971 4 359 6673</a></div></td></tr></tbody> </table><!--[if mso]> </td><![endif]--><!--[if mso]> </tr></table><![endif]--> </td></tr></tbody> </table> <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnBoxedTextBlock" style="min-width:100%;"><!--[if gte mso 9]> <table align="center" border="0" cellspacing="0" cellpadding="0" width="100%"><![endif]--> <tbody class="mcnBoxedTextBlockOuter"> <tr> <td valign="top" class="mcnBoxedTextBlockInner"><!--[if gte mso 9]> <td align="center" valign="top" "><![endif]--> <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;" class="mcnBoxedTextContentContainer"> <tbody> <tr> <td style="padding-top:9px; padding-left:18px; padding-bottom:9px; padding-right:18px;"> <table border="0" cellspacing="0" class="mcnTextContentContainer" width="100%" style="min-width:100% !important;"> <tbody> <tr> <td valign="top" class="mcnTextContent" style="color: #413F3F;font-family: Helvetica;font-size: 14px;font-weight: normal;text-align: center;letter-spacing: 1px;border: 1px solid #efefef;"> <div style="text-align: left;background: #f7f7f7;padding: 10px 15px;"><span style="font-size:18px;">Your payment summary</span> </div><table style="text-align: left;margin: 20px 15px;width: 95%;color: #5f5f5f;text-transform: capitalize;font-size: 12px;letter-spacing: 2px;"> <tbody> <tr style="border-bottom: 1px solid #f7f7f7;"> <td>Order Number:</td><td>' . $order_id . '</td></tr><tr style="border-bottom: 1px solid #f7f7f7;"> <td>Booking Date:</td><td>' . $rec->payment_date . '</td></tr><tr style="border-bottom: 1px solid #f7f7f7;"> <td>First Name:</td><td>' . $rec->first_name . '</td></tr><tr style="border-bottom: 1px solid #f7f7f7;"> <td>Last Name:</td><td>' . $rec->last_name . '</td></tr><tr style="border-bottom: 1px solid #f7f7f7;"> <td>Email ID:</td><td>' . $rec->email_id . '</td></tr><tr style="border-bottom: 1px solid #f7f7f7;"> <td>Mobile Number:</td><td>' . $rec->mobile_number . '</td></tr><tr style="border-bottom: 1px solid #f7f7f7;"> <td>Passport Number:</td><td>' . $rec->passport_number . '</td></tr><tr style="border-bottom: 1px solid #f7f7f7;"> <td>Property :</td><td>' . $rec->project_title . '</td></tr><tr style="border-bottom: 1px solid #f7f7f7;"> <td>Flat No.:</td><td>' . $rec->floor_block . '</td></tr><tr style="border-bottom: 1px solid #f7f7f7;"> <td>Unit Number:</td><td>' . $rec->unit_number . '</td></tr><tr style="border-bottom: 1px solid #f7f7f7;"> <td>Payment Amount :</td><td>' . $rec->payment_amount . ' AED</td></tr><tr style="border-bottom: 1px solid #f7f7f7;"> <td>Address :</td><td>' . $rec->address . '</td></tr><tr style="border-bottom: 1px solid #f7f7f7;"> <td>City :</td><td>' . $rec->city . '</td></tr><tr style="border-bottom: 1px solid #f7f7f7;"> <td>State :</td><td>' . $rec->state . '</td></tr><tr style="border-bottom: 1px solid #f7f7f7;"> <td>Country :</td><td>' . $rec->country . '</td></tr><tr style="border-bottom: 1px solid #f7f7f7;"> <td>Postcode :</td><td>' . $rec->post_code . '</td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr></tbody> </table><!--[if gte mso 9]> </td><![endif]--><!--[if gte mso 9]> </tr></table><![endif]--> </td></tr></tbody> </table> <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnButtonBlock" style="min-width:100%;"> </table> </td><td align="left" valign="middle" style="padding-top:9px; padding-bottom:9px;"><img src="https://gallery.mailchimp.com/27aac8a65e64c994c4416d6b8/images/image_pointer_right_white.1.png" height="30" width="15"></td></tr></tbody> </table> </td></tr><tr> <td align="center" valign="top"> <table border="0" cellpadding="0" cellspacing="0" width="600" id="templateFooter"> <tbody> <tr> <td valign="top" class="footerContainer" style="padding-top:9px; padding-bottom:9px;"> <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;"> <tbody class="mcnTextBlockOuter"> <tr> <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;"><!--[if mso]> <table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;"> <tr><![endif]--><!--[if mso]> <td valign="top" width="600" style="width:600px;"><![endif]--> <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer"> <tbody> <tr> <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;"> <img src="' . SITE_URL . '/public/assets/images/logo/1512057079974960845.png" style="width: 115px;"> <br><p style="margin: 0;">Copyright © The Heart of Europe, All rights reserved.</p><a href="mailto:enquire@thoedevelopments.com" style="font-weight: 400;"><span style="color:#000000">enquire@thoedevelopments.com</span></a> <br><a id="thoedevelopments.com" name="thoedevelopments.com" style="font-weight: 400;"><span style="color:#000000">www.thoedevelopments.com</span></a> </td></tr></tbody> </table><!--[if mso]> </td><![endif]--><!--[if mso]> </tr></table><![endif]--> </td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr></tbody> </table> </td></tr></table> </center></body></html>';


                    $headers = "From: THOE Developments< info@thoedevelopments.com >\n";
                    $headers .= 'X-Mailer: PHP/' . phpversion();
                    $headers .= "X-Priority: 1\n"; // Urgent message!
                    $headers .= "MIME-Version: 1.0\r\n";
                    $headers .= "Content-Type: text/html; charset=iso-8859-1\n";


                    mail($rec->email_id, "Payment Success", $message, $headers);
                }
            } else {

                if ($res1[1] == "FAILURE") {
                    $data = array();
                    $data['payment_status'] = 2;
                    $data['error_code'] = $res1[2];
                    $meta_title = '';
                    $meta_keyword = '';
                    $meta_description = '';
                    $og_title = '';
                    $og_desc = '';
                    $og_pic = '';
                    $flag = 0;

                    return redirect('online-payments?error=1');
                }
                $data = array();
                $data['payment_status'] = 2;
                $data['error_code'] = $res1[2];
            }

            Payment::where('order_id', $order_id)->update($data);
            $flag = 1;
        } else {
            $flag = 0;
        }

        $meta_title = '';
        $meta_keyword = '';
        $meta_description = '';
        $og_title = '';
        $og_desc = '';
        $og_pic = '';

        /* Email Sending to admin and customer  */
        $pdata = Payment::where("order_id", $order_id)->first();

        return view('paymentstatus', compact('records_menu', 'footers_part1', 'footers_part2', 'setting', 'meta_title', 'meta_keyword', 'meta_description', 'ptype', 'og_title', 'og_desc', 'og_pic', 'flag', 'pdata'));
    }

    public function fail_payment() {
        
    }

    public function get_setting() {

        $record = DB::table('tbl_setting')->first();

        $data = array();
        $data['header_logo'] = $record->logo;
        $data['inner_logo'] = $record->inner_logo;
        $data['slider_style'] = $record->slider_style;
        $data['banner_postion'] = $record->banner_postion;
        $data['footer_logo'] = $record->footer_logo;
        $data['contact_email'] = $record->contact_email;
        $data['description_en'] = $record->description_en;
        $data['description_ar'] = $record->description_ar;

        $data['linkedin_link'] = $record->linkedin_link;
        $data['facebook_link'] = $record->facebook_link;
        $data['twitter_link'] = $record->twitter_link;
        $data['instagram_link'] = $record->instagram_link;
        $data['google_link'] = $record->google_link;

        return $data;
    }

    public function get_menu($type, $limit1 = '', $limit2 = '') {

        if ($limit1 != '') {
            $menus = DB::table('tbl_menu')->orderBy('ordering', 'asc')->where('status', '1')->where("type", $type)->where("parent_id", "0")->limit($limit1)->offset($limit2)->get();
        } else {
            $menus = DB::table('tbl_menu')->orderBy('ordering', 'asc')->where('status', '1')->where("type", $type)->where("parent_id", "0")->get();
        }

        $records = array();

        if (!empty($menus)) {
            $i = 0;
            foreach ($menus as $menu) {

                $records[$i]['title_en'] = $menu->title_en;
                $records[$i]['title_ar'] = $menu->title_ar;
                $records[$i]['link'] = $menu->link;
                $records[$i]['ordering'] = $menu->ordering;
                $records[$i]['id'] = $menu->id;
                $records[$i]['slug'] = $menu->slug;

                $subs = DB::table('tbl_menu')->orderBy('ordering', 'asc')->where('status', '1')->where("parent_id", $menu->id)->get();

                if (!empty($subs)) {

                    $j = 0;
                    foreach ($subs as $sub) {
                        $records[$i]['submenus'][$j]['title_en'] = $sub->title_en;
                        $records[$i]['submenus'][$j]['title_ar'] = $sub->title_ar;
                        $records[$i]['submenus'][$j]['slug'] = $sub->slug;
                        $records[$i]['submenus'][$j]['id'] = $sub->id;
                        $records[$i]['submenus'][$j]['link'] = $sub->link;
                        $records[$i]['submenus'][$j]['ordering'] = $sub->ordering;
                        $j++;
                    }
                } else {
                    $records[$i]['submenus'] = '';
                }

                $i++;
            }
        }
        return $records;
    }

    public function show_list(Request $request) {
        $og_title = '';
        $og_desc = '';
        $og_pic = '';

        $results = Payment::with("get_property", "get_unit")->orderBy("id", "desc")->paginate(10);

        $sdata = array();
        $sdata['order_no'] = '';
        $sdata['email'] = '';
        $sdata['status'] = '';
        $sdata['payment'] = '';
        $sdata['from_date'] = '';
        $sdata['to_date'] = '';


        return view('admin.booking.list', compact('results', 'og_title', 'og_desc', 'sdata'));
    }

    public function booking(Request $request) {
        $og_title = '';
        $og_desc = '';
        $og_pic = '';

        $sdata = array();
        $sdata['order_no'] = '';
        $sdata['email'] = '';
        $sdata['status'] = '';
        $sdata['payment'] = '';
        $sdata['from_date'] = '';
        $sdata['to_date'] = '';

        $results = Booking::with("get_property", "get_unit", "get_unit_floors", "get_unit_features", "get_project")->orderBy("id", "desc")->paginate(30);
        
        return view('admin.booking.blist', compact('results', 'og_title', 'og_desc', 'og_pic', 'sdata'));
    }

}
