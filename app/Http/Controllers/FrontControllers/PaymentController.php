<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Properties;
use DB;
use Cache;

class PaymentController extends Controller {

    const HMAC_SHA256 = 'sha256';

    /* test
      const PROFILE_ID = '6A428355-7EF7-4439-9871-7990B662B62A';
      const ACCESS_KEY = 'e9033b83bd0b302381dce89ac22a15a6';
      const SECRET_KEY = '249b7b0f95c8472bb859411ab93bada72823f926b18643bc9744dacf2530c825a0ff51c7511d4d08a151b9cb6291558528ce120c03674ce3978368d6bf6970544348724c2ad042d6b8548d8781aefab0a020d0b710ba4ad3b7f583c8d43f31e8d7d9989a152649d9b062d668c5a5e5ed7b2c23ef08cd4268a36ec554080b616d';
      const REQUEST_URL = 'https://testsecureacceptance.cybersource.com/pay';
     */

    /* live */
    const PROFILE_ID = 'F154B749-C943-484D-A538-F647B43534B2';
    const ACCESS_KEY = '556e0897435c3151b7506382ace1b9ee';
    const SECRET_KEY = '1c1a22b017584c68b03756e94b0d3813eb2f2f636fa4438c8321b82d3ac4d8c90c9cf415e7de4a0cbb40eee0787d47d8ff06cd4169114339b9ef524f67830fc3a5c25cd6dbce4c649467886b560131abd8606d3270fd4346b8dd28477bad361b10b67ccafcb94ba29fdc67f86fa58492311e59eb62f741609118021ca8e6ef84';
    const REQUEST_URL = 'https://secureacceptance.cybersource.com/pay';

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

        $props = Properties::All();
        $content = Content::find(23);
        $meta_title = $content->meta_title;
        $meta_keyword = $content->meta_keyword;
        $meta_description = $content->meta_desc;

        $og_title = trim($content->meta_title);
        $og_desc = trim($content->meta_desc);
        $og_pic = ($content->image != "") ? url("/") . "/assets/images/banner/" . $content->image : '';

        $countries = Cache::remember('payment_country_list', 300, function () {
                    return DB::table('country')->where('status', 1)->orderBy('name', 'asc')->get();
                });
        $country_codes = Cache::remember('payment_country_codes', 300, function () {
                    return DB::table('country')->where('status', 1)->orderBy('code', 'asc')->get();
                });


        $data = [
            "AllRatings" => DB::table('tbl_ratings')->where('menu_title','Pay Online')->where('menu_id',41)->first(),
            'records_menu' => get_menu($this->locale, 1),
            'footers_part1' => get_menu($this->locale, 2, 4, 0),
            'footers_part2' => get_menu($this->locale, 2, 5, 4),
            'setting' => get_setting($this->locale),
            'content' => $content,
            'props' => $props,
            'countries' => $countries,
            'country_codes' => $country_codes,
            'ptype' => 1,
            'meta_title' => $meta_title,
            'meta_keyword' => $meta_keyword,
            'meta_description' => $meta_description,
            'og_title' => $og_title,
            'og_desc' => $og_desc,
            'og_pic' => $og_pic,
            'locale' => $this->locale,
        ];
        //check page
        set_cache_page($request->fullUrl(), view("pages.payment.index", $data)->render());


        return view('pages.payment.index', $data);
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
            'property_id' => !empty($request->property_id) ? $this->clear_input($request->property_id) : '0',
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
            'records_menu' => get_menu($this->locale, 1),
            'footers_part1' => get_menu($this->locale, 2, 4, 0),
            'footers_part2' => get_menu($this->locale, 2, 5, 4),
            'setting' => get_setting($this->locale),
            'ptype' => 1,
            'record' => $request->all(),
            'gateway' => $this->FAB_Gateway($row),
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
        return view('pages.payment.confirmation', $data);
    }

    public function response() {

        $post = filter_input_array(INPUT_POST);

        //echo'</pre>';PRINT_R($post);echo'</pre>';die;

        if (!empty($post)) {
            DB::table('tbl_payment')->where('order_id', $post['req_transaction_uuid'])->update(['response' => $this->arrayToStr($post)]);
            if (strpos(strtolower($post['message']), 'success') !== false) {
                DB::table('tbl_payment')->where('order_id', $post['req_transaction_uuid'])->update(['paymentstring' => $post['message'], 'payment_status' => 1,]);
            }

            $content = Content::find(23);

            $data = ['content' => $content,
                'payment' => DB::table('tbl_payment')->where('order_id', $post['req_transaction_uuid'])->first(),
                'response' => $post,
                'meta_title' => $content->meta_title,
                'meta_keyword' => $content->meta_keyword,
                'meta_description' => $content->meta_desc,
                'og_title' => $content->meta_title,
                'og_desc' => $content->meta_desc,
                'og_pic' => ($content->image != "") ? url("/") . "/assets/images/banner/" . $content->image : '',
                'slug' => '',
                'locale' => $this->locale,];

            return view('pages.payment.response', $data);
        }
        return redirect()->route('payment.index', ['status' => 'failed', 'message' => 'Something went wrong.']);
    }

    public function cancel() {

        $post = filter_input_array(INPUT_POST);

        //echo'</pre>';PRINT_R($this->arrayToStr($post));echo'</pre>';

        if (!empty($post)) {

            DB::table('tbl_payment')->where('order_id', $post['req_transaction_uuid'])->update(['response' => $this->arrayToStr($post)]);
            DB::table('tbl_payment')->where('order_id', $post['req_transaction_uuid'])->update(['paymentstring' => $post['message'], 'payment_status' => 0,]);

            $content = Content::find(23);

            $data = ['content' => $content,
                'payment' => DB::table('tbl_payment')->where('order_id', $post['req_transaction_uuid'])->first(),
                'response' => $post,
                'meta_title' => $content->meta_title,
                'meta_keyword' => $content->meta_keyword,
                'meta_description' => $content->meta_desc,
                'og_title' => $content->meta_title,
                'og_desc' => $content->meta_desc,
                'og_pic' => ($content->image != "") ? url("/") . "/assets/images/banner/" . $content->image : '',
                'slug' => '',
                'locale' => $this->locale,];

            return view('pages.payment.response', $data);
        }
        return redirect()->route('payment.index', ['status' => 'failed', 'message' => 'Something went wrong.']);
    }

    private function FAB_Gateway($data) {

        $params = [
            'access_key' => self::ACCESS_KEY,
            'profile_id' => self::PROFILE_ID,
            'transaction_uuid' => $this->orderid,
            'signed_field_names' => 'access_key,profile_id,transaction_uuid,signed_field_names,unsigned_field_names,signed_date_time,locale,transaction_type,reference_number,amount,currency,bill_to_forename,bill_to_surname,bill_to_email,bill_to_address_line1,bill_to_address_city,bill_to_address_postal_code,bill_to_address_state,bill_to_address_country,customer_ip_address',
            'unsigned_field_names' => '',
            'signed_date_time' => gmdate("Y-m-d\TH:i:s\Z"),
            'locale' => 'en',
            'transaction_type' => 'sale', //'authorization'
            'reference_number' => $this->orderid,
            'amount' => $data['payment_amount'],
            'card_type' => '001',
            'card_number' => '4242424242424242',
            'card_expiry_date' => '11-2020',
            'currency' => 'AED',
            'bill_to_forename' => $data['first_name'],
            'bill_to_surname' => $data['last_name'],
            'bill_to_email' => $data['email_id'],
            'bill_to_address_line1' => $data['address'],
            'bill_to_address_city' => $data['city'],
            'bill_to_address_postal_code' => $data['post_code'],
            'bill_to_address_state' => $data['state'],
            'bill_to_address_country' => $data['country'],
            'customer_ip_address' => $data['customer_ip'],
        ];

        $signature = $this->sign($params);

        return ['signature' => $signature, 'requestUrl' => SELF::REQUEST_URL, 'params' => $params];
    }

    private function sign($params) {
        return $this->signData($this->buildDataToSign($params), self::SECRET_KEY);
    }

    private function signData($data, $secretKey) {
        return base64_encode(hash_hmac('sha256', $data, $secretKey, true));
    }

    private function buildDataToSign($params) {
        $signedFieldNames = explode(",", $params["signed_field_names"]);
        foreach ($signedFieldNames as $field) {
            $dataToSign[] = $field . "=" . $params[$field];
        }
        return $this->commaSeparate($dataToSign);
    }

    private function commaSeparate($dataToSign) {
        return implode(",", $dataToSign);
    }

    private function clear_input($data) {
        return $input = htmlspecialchars(stripslashes(trim(!empty($data) ? $data : '')));
    }

    public function arrayToStr($data) {
        $str = '';
        foreach ($data as $key => $value) {
            $str .= "{$key}=>{$value},\n";
        }
        return $str;
    }

}
