<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Properties;
use DB;

class PaymentControllerPayFort extends Controller {

    public $gatewayHost = 'https://checkout.payfort.com/';
    public $gatewaySandboxHost = 'https://sbcheckout.payfort.com/';
    public $language = 'en';
    public $merchantIdentifier = 'cySyhUzX'; //'JjrDnJGm';
    public $accessCode = 'IsOGFMqbS84FUF00Va0r'; //JtSGWU3wvXuVz5Qyqcsm';
    public $SHARequestPhrase = 'THOESHAIN'; //TESTSHAIN';
    public $SHAResponsePhrase = 'THOESHAOUT'; //TESTSHAOUT';
    public $SHAType = 'sha256';
    public $command = 'PURCHASE';
    public $amount;
    public $currency = 'AED';
    public $itemName;
    public $customerEmail;
    public $sandboxMode = false;
    public $locale;
    public $orderid;

    /**
     * Initializer.
     *
     * @return void
     */
    public function __construct(Request $request) {
        $this->locale = get_locale($request->segment(1));
        \App::setLocale($this->locale);
        $this->orderid = hexdec(uniqid());
    }

    public function index(Request $request) {

        $content = Content::find(23);

        $data = [
            'content' => $content,
            'props' => Properties::All(),
            'meta_title' => $content->meta_title,
            'meta_keyword' => $content->meta_keyword,
            'meta_description' => $content->meta_desc,
            'og_title' => $content->meta_title,
            'og_desc' => $content->meta_desc,
            'og_pic' => ($content->image != "") ? url("/") . "/assets/images/banner/" . $content->image : '',
            'locale' => $this->locale,
        ];
        //check page
        set_cache_page($request->fullUrl(), view("pages.payment-payfort.index", $data)->render());

        return view('pages.payment-payfort.index', $data);
    }

    public function confirmation(Request $request) {

        $ptitle = '';

        if (isset($request->property)) {
            $prop = Properties::find($request->property);
            $ptitle = $prop->title_en;
        }

        $row = [
            'order_id' => $this->orderid,
            'first_name' => !empty($request->first_name) ? $this->clear_input($request->first_name) : '',
            'last_name' => !empty($request->last_name) ? $this->clear_input($request->last_name) : '',
            'email_id' => !empty($request->email_id) ? $this->clear_input($request->email_id) : '',
            'mobile_number' => (!empty($request->country_code) ? $this->clear_input($request->country_code) : '') .
            (!empty($request->acode) ? $this->clear_input($request->acode) : '') .
            (!empty($request->mobile_number) ? $this->clear_input($request->mobile_number) : ''),
            'landline_number' => (!empty($request->area_code) ? $this->clear_input($request->area_code) : '') .
            (!empty($request->acode1) ? $this->clear_input($request->acode1) : '') .
            (!empty($request->landline_number) ? $this->clear_input($request->landline_number) : ''),
            'passport_number' => !empty($request->passport_number) ? $this->clear_input($request->passport_number) : '',
            'address' => !empty($request->address) ? $this->clear_input($request->address) : '',
            'city' => !empty($request->city) ? $this->clear_input($request->city) : '',
            'state' => !empty($request->state) ? $this->clear_input($request->state) : '',
            'post_code' => !empty($request->post_code) ? $this->clear_input($request->post_code) : '',
            'country' => !empty($request->country) ? $this->clear_input($request->country) : '',
            'property_id' => !empty($request->property_id) ? $this->clear_input($request->property_id) : '',
            'floor_block' => !empty($request->floor_block) ? $this->clear_input($request->floor_block) : '',
            'unit_number' => !empty($request->unit_number) ? $this->clear_input($request->unit_number) : '',
            'payment_amount' => !empty($request->payment_amount) ? $this->clear_input($request->payment_amount) : '',
            'payment_for' => !empty($request->payment_for) ? $this->clear_input($request->payment_for) : '',
            'alt_phone_number' => (!empty($request->alter_code) ? $this->clear_input($request->alter_code) : '') .
            (!empty($request->acode2) ? $this->clear_input($request->acode2) : '') .
            (!empty($request->alt_phone_number) ? $this->clear_input($request->alt_phone_number) : ''),
            'payment_date' => date("Y-m-d H:i:s"),
            'created' => date("Y-m-d H:i:s"),
            'created_at' => date("Y-m-d H:i:s"),
            'payment_status' => 0,
            'customer_ip' => $this->clear_input($request->ip_address),
        ];

        DB::table('tbl_payment')->insertGetId($row);

        $meta_title = $meta_keyword = $meta_description = $slug = $og_title = $og_desc = $og_pic = '';

        $data = [
            'record' => $request->all(),
            'gateway' => $this->PayFort_Gateway($row),
            'meta_title' => $meta_title,
            'meta_keyword' => $meta_keyword,
            'meta_description' => $meta_description,
            'og_title' => $og_title,
            'og_desc' => $og_desc,
            'og_pic' => $og_pic,
            'slug' => $slug,
            'ptitle' => $ptitle,
            'locale' => $this->locale,
        ];
        return view('pages.payment-payfort.confirmation', $data);
    }

    public function PayFort_Gateway($data) {
        if ($this->sandboxMode) {
            $gatewayUrl = $this->gatewaySandboxHost . 'FortAPI/paymentPage';
        } else {
            $gatewayUrl = $this->gatewayHost . 'FortAPI/paymentPage';
        }
        $postData = array(
            'amount' => $this->convertFortAmount($data['payment_amount'], $this->currency),
            'currency' => strtoupper($this->currency),
            'merchant_identifier' => $this->merchantIdentifier,
            'access_code' => $this->accessCode,
            'merchant_reference' => $this->orderid,
            'customer_email' => $data['email_id'],
            'command' => $this->command,
            'language' => $this->language,
            //'payment_option' => 'MASTERCARD',
            'order_description' => 'SADAD',
            'customer_name' => $data['first_name'] . ' ' . $data['last_name'],
            'phone_number' => $data['mobile_number'],
            'return_url' => route('payment-payfort.response'),
        );

        $postData['signature'] = $this->calculateSignature($postData, 'request');
        $this->log("Fort Redirect Request Parameters \n" . print_r($postData, 1));
        return array('url' => $gatewayUrl, 'params' => $postData);
    }

    public function response() {

        $fortParams = filter_input_array(INPUT_POST);

        if (empty($fortParams)) {
            return redirect()->route('payment-payfort.index', ['status' => 'failed', 'message' => 'Opps! Something went Wrong.']);
        }

        $debugMsg = "Fort Redirect Response Parameters \n" . print_r($fortParams, 1);
        $this->log($debugMsg);
        $reason = '';
        $response_code = '';
        $success = true;
        if (empty($fortParams)) {
            $success = false;
            $reason = "Invalid Response Parameters";
            $debugMsg = $reason;
            $this->log($debugMsg);
        } else {
            //validate payfort response
            $params = $fortParams;
            $responseSignature = $fortParams['signature'];
            $merchantReference = $params['merchant_reference'];
            unset($params['r']);
            unset($params['signature']);
            unset($params['integration_type']);
            $calculatedSignature = $this->calculateSignature($params, 'response');
            $success = true;
            $reason = '';
            if ($responseSignature != $calculatedSignature) {
                $success = false;
                $reason = 'Invalid signature.';
                $debugMsg = sprintf('Invalid Signature. Calculated Signature: %1s, Response Signature: %2s', $responseSignature, $calculatedSignature);
                $this->log($debugMsg);
            } else {
                $response_code = $params['response_code'];
                $response_message = $params['response_message'];
                $status = $params['status'];
                if (substr($response_code, 2) != '000') {
                    $success = false;
                    $reason = $response_message;
                    $debugMsg = $reason;
                    $this->log($debugMsg);
                }
            }
        }

        if (!$success) {
            $row = ['paymentstring' => @serialize($params), 'payment_status' => 0,];
        } else {
            $row = ['paymentstring' => @serialize($params), 'payment_status' => 1,];
        }
        DB::table('tbl_payment')->where('order_id', $params['merchant_reference'])->update($row);
        $content = Content::find(23);
        $data = [
            'content' => $content,
            'response' => $params,
            'row' => DB::table('tbl_payment')->where('order_id', $params['merchant_reference'])->first(),
            'meta_title' => $content->meta_title,
            'meta_keyword' => $content->meta_keyword,
            'meta_description' => $content->meta_desc,
            'og_title' => $content->meta_title,
            'og_desc' => $content->meta_desc,
            'og_pic' => ($content->image != "") ? url("/") . "/assets/images/banner/" . $content->image : '',
            'slug' => '',
            'locale' => $this->locale,
        ];

        return view('pages.payment-payfort.response', $data);
    }

    /**
     * calculate fort signature
     * @param array $arrData
     * @param string $signType request or response
     * @return string fort signature
     */
    public function calculateSignature($arrData, $signType = 'request') {
        $shaString = '';
        ksort($arrData);
        foreach ($arrData as $k => $v) {
            $shaString .= "$k=$v";
        }
        if ($signType == 'request') {
            $shaString = $this->SHARequestPhrase . $shaString . $this->SHARequestPhrase;
        } else {
            $shaString = $this->SHAResponsePhrase . $shaString . $this->SHAResponsePhrase;
        }
        $signature = hash($this->SHAType, $shaString);
        return $signature;
    }

    /**
     * Convert Amount with dicemal points
     * @param decimal $amount
     * @param string  $currencyCode
     * @return decimal
     */
    public function convertFortAmount($amount, $currencyCode) {
        $total = $amount;
        $decimalPoints = $this->getCurrencyDecimalPoints($currencyCode);
        $new_amount = round($total, $decimalPoints) * (pow(10, $decimalPoints));
        return $new_amount;
    }

    public function castAmountFromFort($amount, $currencyCode) {
        $decimalPoints = $this->getCurrencyDecimalPoints($currencyCode);
        $new_amount = round($amount, $decimalPoints) / (pow(10, $decimalPoints));
        return $new_amount;
    }

    /**
     * 
     * @param string $currency
     * @param integer 
     */
    public function getCurrencyDecimalPoints($currency) {
        $decimalPoint = 2;
        $arrCurrencies = array(
            'JOD' => 3,
            'KWD' => 3,
            'OMR' => 3,
            'TND' => 3,
            'BHD' => 3,
            'LYD' => 3,
            'IQD' => 3,
        );
        if (isset($arrCurrencies[$currency])) {
            $decimalPoint = $arrCurrencies[$currency];
        }
        return $decimalPoint;
    }

    /**
     * Log the error on the disk
     */
    public function log($messages) {
        $messages = "========================================================\n\n" . $messages . "\n\n";
        $file = 'trace.log';
        if (filesize($file) > 907200) {
            $fp = fopen($file, "r+");
            ftruncate($fp, 0);
            fclose($fp);
        }
        $myfile = fopen($file, "a+");
        fwrite($myfile, $messages);
        fclose($myfile);
    }

    private function clear_input($data) {
        return $input = htmlspecialchars(stripslashes(trim(!empty($data) ? $data : '')));
    }

}
