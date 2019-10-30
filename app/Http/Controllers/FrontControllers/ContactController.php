<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use View;
use Mail;
use DB;
use App\Models\Contact;
use Cache;
use Response;

class ContactController extends Controller {

    public $locale;
    public $secret;
    public $captcha;
    public $LeadControllers;

    public $name;
    public $first_name;
    public $last_name;
    public $email;
    public $country_code;
    public $mobile;
    public $phone_country_code;
    public $phone;
    public $city;
    public $country;
    public $nationality;
    public $source;
    public $campaign;
    public $comment;
    public $url;
    public $datetime;
    public $date;
    private $API_KEY;
    public $locales;
    public $medium;
    public $content;
    public $term;
    public $age;
    public $uae_residence;
    public $gender;
    public $user_id;
    public $manager;
    public $promoter;
    public $wystay;
    public $hot_leads;
    public $kiosk;

    /**
     * Initializer.
     *
     * @return void     
     */
    public function __construct(Request $request) {
        $this->locale = get_locale($request->segment(1));
        \App::setLocale($this->locale);
        //Captcha
        $this->secret = '6LdRBpkUAAAAABCy8JCwtTKd42gfAMxvrXlNERja';
        $this->captcha = !empty(filter_input(INPUT_POST, 'g-recaptcha-response')) ? filter_input(INPUT_POST, 'g-recaptcha-response') : '';
        $this->LeadControllers = app('App\Http\Controllers\FrontControllers\LeadController');
        
        $this->first_name = !empty($request->first_name) ? $this->clear_input($request->first_name) : '';
        $this->last_name = !empty($request->last_name) ? $this->clear_input($request->last_name) : '';
        $this->name = $this->first_name.' '.$this->last_name;
        $this->email = !empty($request->email) ? $this->clear_input($request->email) : '';
        $this->country_code = !empty($request->country_code) ? $this->clear_input($request->country_code) : '';
        $this->mobile = !empty($request->mobile_no) ? $this->clear_input($request->mobile_no) : '';
        $this->phone_country_code = !empty($request->phone_country_code) ? $this->clear_input($request->phone_country_code) : '';
        $this->phone = !empty($request->phone) ? $this->clear_input($request->phone) : '';
        $this->city = !empty($request->city) ? $this->clear_input($request->city) : '';
        $this->language = !empty($request->language) ? $this->clear_input($request->language) : 'English';
        $this->country = !empty($request->country) ? $this->clear_input($request->country) : '';
        $this->nationality = !empty($request->nationality) ? $this->clear_input($request->nationality) : '';
        $this->source = !empty($request->source) ? $this->clear_input($request->source) : '';
        $this->medium = !empty($request->medium) ? $this->clear_input($request->medium) : '';
        $this->content = !empty($request->content) ? $this->clear_input($request->content) : '';
        $this->term = !empty($request->term) ? $this->clear_input($request->term) : '';
        $this->campaign = !empty($request->campaign) ? $this->clear_input($request->campaign) : '';
        $this->comment = !empty($request->comment) ? $this->clear_input($request->comment) : '';
        $this->age = !empty($request->age) ? $this->clear_input($request->age) : '';
        $this->uae_residence = !empty($request->uae_residence) ? $this->clear_input($request->uae_residence) : '';
        $this->gender = !empty($request->gender) ? $this->clear_input($request->gender) : '';
        $this->user_id = !empty($request->user_id) ? $this->clear_input($request->user_id) : '';
        $this->manager = !empty($request->manager) ? $this->clear_input($request->manager) : '';
        $this->promoter = !empty($request->promoter) ? $this->clear_input($request->promoter) : '';
        $this->wystay = !empty($request->wystay) ? $this->clear_input($request->wystay) : '';
        $this->hot_leads = !empty($request->hot_leads) ? $this->clear_input($request->hot_leads) : '';
        $this->url = !empty($request->url) ? $this->clear_input($request->url) : '';
        $this->redirect_url = !empty($request->redirect_url) ? $this->clear_input($request->redirect_url) : '';
        $this->kiosk = !empty($request->kiosk) ? $request->kiosk : '';
        $this->datetime = date('Y-m-d h:i:s');
        $this->date = date('Y-m-d');        
    }

    public function index(Request $request) {

        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            //return $cached;
        }

        $countries = Cache::remember('contact_country_list', 300, function () {
                    return DB::table('country')->where('status', '1')->orderBy('name', 'asc')->get();
                });
        $country_codes = Cache::remember('contact_country_codes', 300, function () {
                    return DB::table('country')->where('status', '1')->orderBy('code', 'asc')->get();
                });

        $content = Content::find(17);

        $data = [
            "AllRatings" => DB::table('tbl_ratings')->where('menu_title', 'Contact Us')->where('menu_id', 18)->first(),
            'content' => $content,
            'contacts_dubai' => Contact::where('address_type', '1')->where('status', '1')->orderBy('list_orders', 'ASC')->get(),
            'contacts_internet' => Contact::where('address_type', '2')->where('status', '1')->orderBy('list_orders', 'ASC')->get(),
            'countries' => $countries,
            'country_codes' => $country_codes,
            'meta_title' => $content->meta_title,
            'meta_keyword' => $content->meta_keyword,
            'meta_description' => $content->meta_desc,
            'og_title' => $content->meta_title,
            'og_desc' => $content->meta_desc,
            'og_pic' => ($content->image != "") ? url("/") . "/assets/images/banner/" . $content->image : '',
            'locale' => $this->locale,
        ];
        //check page
        set_cache_page($request->fullUrl(), View("pages.contact.index-{$this->locale}", $data)->render());

        return View("pages.contact.index-{$this->locale}", $data);
    }
    //end Index

    public function sendContact(Request $request) {
        
        $validCaptcha = $this->validCaptcha();
        $res = '';
        $en_msg = "Thank you for reaching out. We're looking into your enquiry and we'll get back to you within 2 business days (Sunday-Thursday 9am-6pm GST).";
        $ar_msg = "شكراً لتواصلكم معنا، نعمل الآن على الإجابة على استفساراتكم وسوف نقوم بالرد عليكم في ظرف يومي عمل (الأحد – الخميس 9 صباحاً – 6 مساءً  حسب التوقيت المحلي)";

        if ($validCaptcha->success != 1) {
            return redirect()->route('contact.index', ['msg' => 'Invalid Captcha', 'response' => $validCaptcha]);
        }

        if ($request->frm == "contact") {

            $departments = [
                1 => ['text' => 'Corporate Communication', 'email' => 'marcom@azizidevelopments.com'],
                2 => ['text' => 'Marketing', 'email' => 'marcom@azizidevelopments.com'],
                3 => ['text' => 'Customer Service', 'email' => 'customercare@azizidevelopments.com'],
                4 => ['text' => 'Legal', 'email' => 'legal@azizidevelopments.com'],
                5 => ['text' => 'Sales', 'email' => 'marketing@azizidevelopments.com']
            ];

            $data = [
                'subject' => "New enquiry has been generated",
                'emailTo' => $departments[$request->department]['email'],
                'nameTo' => $departments[$request->department]['text'],
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'country' => $request->country,
                'phone' => $request->country_code . $request->mobile_no,
                'department' => $departments[$request->department]['text'],
                'message' => $request->comment,
            ];
            
            if ($departments[$request->department]['text'] == 'Sales'):
                $lead_id = $this->check_lead();
                if(!empty($lead_id)):
                    $this->salesForceLead($lead_id);
                    $res = ['status' => 'success', 'msg' => 'Successfully submit.', 'redirect_url' => $this->redirect_url];
                else:
                    $res = ['status' => 'success', 'msg' => 'Successfully submit.', 'redirect_url' => 'https://azizidevelopments.com'];
                endif;
                //return Response::json($result);
                return redirect()->route('contact.index', ['msg' => $this->locale == 'en' ? $en_msg : $ar_msg, 'response' => $res]);
            else:
                DB::table('contacts')->insert(['first_name' => $request->first_name, 'last_name' => $request->last_name, 'email' => $request->email, 'country' => $request->country, 'country_code' => $request->country_code, 
                'department' => $departments[$request->department]['text'] . ', ' . $departments[$request->department]['email'], 'phone' => $request->mobile_no, 'message' => $request->comment,
                'created_at' => date('Y-m-d h:i:s')]);

                $res = Mail::send('emails.contact', ['data' => $data], function ($message) use ($data) {
                    $message->subject($data['subject']);
                    $message->from('website@azizidevelopments.com', 'Azizi Developments');
                    $message->to($data['emailTo'], $data['nameTo']);
                    //$message->to('zubair.khan@azizidevelopments.com', 'ZUBAIR KHAN');
                });
                //return redirect()->route('contact.index', ['dedug' => 1, 'msg' => $this->locale == 'en' ? $en_msg : $ar_msg, 'response' => $res]);
                return redirect()->route('contact.index', ['msg' => $this->locale == 'en' ? $en_msg : $ar_msg, 'response' => $res]);
            endif;
        }
    }
    //End sendContact

    public function validCaptcha() {
        $remote_addr = !empty($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$this->secret}&response={$this->captcha}&remoteip={$remote_addr}");
        $result = json_decode($response);
        return $result;
    }
    //End validCaptcha
    
    public function requestedByTheSameDomain() {

        $myDomain = !empty($_SERVER['SCRIPT_URI']) ? $_SERVER['SCRIPT_URI'] : '';
        $requestsSource = !empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
        if (!empty($myDomain) && !empty($requestsSource)) {
            return parse_url($myDomain, PHP_URL_HOST) === parse_url($requestsSource, PHP_URL_HOST);
        }
        return false;
    }
    //End requestedByTheSameDomain

    public function check_lead() {
        $data = ['name' => $this->name, 'email' => $this->email, 'country' => $this->country, 'nationality' => $this->nationality, 'language' => $this->language,
            'country_code' => $this->country_code, 'mobile' => $this->mobile, 'phone_country_code' => $this->phone_country_code, 'phone' => $this->phone, 'hot_leads' => $this->hot_leads,
            'city' => $this->city, 'source' => $this->source, 'comment' => $this->comment, 'campaign' => $this->campaign, 'medium' => $this->medium, 'wystay' => $this->wystay, 'kiosk' => $this->kiosk,
            'age' => $this->age, 'gender' => $this->gender, 'uae_residence' => $this->uae_residence, 'promoter' => $this->promoter, 'manager' => $this->manager, 'user_id' => $this->user_id,
            'content' => $this->content, 'term' => $this->term, 'target_url' => $this->url, 'created' => $this->date, 'created_at' => $this->datetime, 'updated_at' => $this->datetime,];

        if (!empty($this->email)) {
            $exist1 = DB::table('tbl_leads')->where('email', $this->email)->first();
        } elseif ($this->mobile) {
            $exist2 = DB::table('tbl_leads')->where('phone', $this->mobile)->first();
        }

        if (!empty($exist1->email) && $exist1->created == date('Y-m-d')) {
            DB::table('tbl_leads')->where('email', $exist1->email)->update($data);
        } elseif (!empty($exist2->mobile) && $exist2->created == date('Y-m-d')) {
            DB::table('tbl_leads')->where('phone', $exist2->mobile)->update($data);
        } else {
            $id = DB::table('tbl_leads')->insertGetId($data);
            return $id;
        }
        return false;
    }
    //End check_lead
    
    public function salesForceLead($id) {

        $this->GetAccessToken();

        $apiurl = $this->instance_url . '/services/apexrest/pushLead';

        if (strpos(strtolower($this->name), 'test lead') !== false) {
            DB::table('tbl_leads')->where('id', $id)->update(['salesforce_status' => 2]);
            return false;
        }

        /*$body_json = json_encode(['name' => $this->name, 'email' => $this->email, 'mobile' => $this->mobile, 'country_code' => str_replace(['+', '-'], '', $this->country_code),
        'phone' => $this->phone, 'phone_country_code' => str_replace(['+', '-'], '', $this->phone_country_code), 'language' => $this->language, 'country' => $this->country, 'promoter' => $this->promoter,
        'nationality' => $this->nationality, 'city' => $this->city, 'campaign' => $this->campaign, 'comment' => $this->comment, 'source' => $this->source, 'kiosk' => $this->kiosk,]);*/

        $body_json = json_encode(['name' => $this->name, 'email' => $this->email, 'mobile' => str_replace(['+', '-'], '', $this->country_code).$this->mobile, 
        'phone' => str_replace(['+', '-'], '', $this->phone_country_code).$this->phone, 'language' => $this->language, 'country' => $this->country, 'promoter' => $this->promoter,
        'nationality' => $this->nationality, 'city' => $this->city, 'campaign' => $this->campaign, 'comment' => $this->comment, 'source' => $this->source, 'kiosk' => $this->kiosk,]);

        $http = curl_init();

        curl_setopt($http, CURLOPT_HEADER, false);
        curl_setopt($http, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($http, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($http, CURLOPT_URL, $apiurl);
        curl_setopt($http, CURLOPT_POST, true);
        curl_setopt($http, CURLOPT_POSTFIELDS, $body_json);
        //curl_setopt($http, CURLOPT_TIMEOUT, 1000);


        $content = curl_exec($http);
        //$http_status = curl_getinfo($http, CURLINFO_HTTP_CODE);
        //$info = curl_getinfo($http);
        curl_close($http);

        $result = json_decode($content);

        if (!empty($res) && !empty($res->status) && $res->status == 'success') {
            DB::table('tbl_leads')->where('id', $id)->update(['salesforce_status' => 1]);
            return true;
        } else if (!empty($res->status) && $res->status == 'failure') {
            return false;
        }

        return $res;
    }
    //End salesForceLead
    
    public function GetAccessToken() {

        $http = curl_init();
        $apiurl = SalesForceKey;

        curl_setopt($http, CURLOPT_HEADER, false);
        curl_setopt($http, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($http, CURLOPT_URL, $apiurl);
        //curl_setopt($http, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($http, CURLOPT_POST, true);
        //curl_setopt($http,CURLOPT_POSTFIELDS, $body_json);
        curl_setopt($http, CURLOPT_CUSTOMREQUEST, 'POST');

        $results = curl_exec($http);
        //$http_status = curl_getinfo($http, CURLINFO_HTTP_CODE);
        //$info = curl_getinfo($http);
        curl_close($http);

        $apiToken = json_decode($results);

        $this->instance_url = $apiToken->instance_url;
        $this->token_type = $apiToken->token_type;
        $this->access_token = $apiToken->access_token;
    }
    //End GetAccessToken
    
    private function clear_input($string) {
        if (!empty($string)) {
            $data = preg_replace('/[ \t]+/', ' ', preg_replace('/\s*$^\s*/m', "\n", $string));
            return htmlspecialchars(stripslashes(trim($data)));
        }
    }
    //End clear_input
    
}
