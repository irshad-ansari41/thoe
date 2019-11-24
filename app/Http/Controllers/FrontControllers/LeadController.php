<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use Response;
use DB;
use Cache;
use File;
use Mail;
use Jenssegers\Agent\Agent;

class LeadController extends Controller {

    public $name;
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
    public $secret;
    public $captcha;
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
    public $language;

    /**
     * Initializer.
     *
     * @return void
     */
    public function __construct(Request $request) {

        $this->locale = get_locale($request->segment(1));
        \App::setLocale($this->locale);

        //Server API
        $this->API_KEY = 'jdsflkjl09238490@#$@#$SDFflkwej923432wdmffks@#$@#$sdfk';
        $this->API_URL = 'https://crm.thoedevelopments.com/WebForms/websiteleads.aspx/InsertLeadV6';

        //Post Fields
        $this->name = !empty($request->name) ? $this->clear_input($request->name) : '';
        $this->email = !empty($request->email) ? $this->clear_input($request->email) : '';
        $this->country_code = !empty($request->country_code) ? $this->clear_input($request->country_code) : '';
        $this->mobile = !empty($request->mobile) ? $this->clear_input($request->mobile) : '';
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

        //Captcha
        $this->secret = '6LdRBpkUAAAAABCy8JCwtTKd42gfAMxvrXlNERja';
        $this->captcha = !empty(filter_input(INPUT_POST, 'g-recaptcha-response')) ? filter_input(INPUT_POST, 'g-recaptcha-response') : '';
    }

    public function save_lead(Request $request) {

        if (!$request->ajax()) {
            return "invalid Request";
        }
        $origin = request()->headers->get('origin');
        if ($origin != 'https://thoedevelopments.com') {
            //return "invalid Host";
        }

        $validCaptcha = $this->validCaptcha();
        if ($validCaptcha->success != 1) {
            $EMessage ='';
            return $result = ['status' => 'failed', 'msg' => $EMessage, 'response' => $validCaptcha];
        }


        $lead_id = $this->check_lead();
        if (!empty($lead_id)) {
            //$this->EPMSLeads($lead_id);
            $this->salesForceLead($lead_id);
            //subscribe_newsletter($this->name, $this->email, $this->locale);
            $result = ['status' => 'success', 'msg' => 'Successfully submit.', 'redirect_url' => $this->redirect_url, 'response' => $validCaptcha];
        } else {
            $result = ['status' => 'success', 'msg' => 'Successfully submit.', 'redirect_url' => 'https://thoedevelopments.com', 'response' => $validCaptcha];
        }
        $this->sendmail();
        return Response::json($result);
        
    }

    //End Save Leads

    public function save_lead_salesforace(Request $request) {

        if (!$request->ajax()) {
            return "invalid Request";
        }
        $origin = request()->headers->get('origin');
        if ($origin != 'https://thoedevelopments.com') {
            //return "invalid Host";
        }

        $lead_id = $this->check_lead();
        if (!empty($lead_id)) {
            $this->salesForceLead($lead_id);
            $result = ['status' => 'success', 'msg' => 'Successfully submit.', 'redirect_url' => $this->redirect_url];
        } else {
            $result = ['status' => 'success', 'msg' => 'Successfully submit.', 'redirect_url' => 'https://thoedevelopments.com'];
        }
        return Response::json($result);
    }

    //save_lead_salesforace end

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

    public function push_lead(Request $request) {

        if ($request->isMethod('get')) {
            return view("pages.lead-form.push-index");
        }

        if (!empty($request->key) && $request->key != '2019@Leads') {
            return view("pages.lead-form.push-index", ['status' => 'failed', 'key' => $request->key]);
        }

        $validCaptcha = $this->validCaptcha();
        if ($validCaptcha->success != 1) {
            return view("pages.lead-form.push-index", ['status' => 'failed', 'msg' => 'Invalid Captcha.', 'response' => $validCaptcha, 'key' => $request->key]);
        }

        $lead_id = $this->check_lead();
        if (!empty($lead_id)) {
            //$result = $this->EPMSLeads($lead_id);
            $result1 = $this->salesForceLead($lead_id);
        }

        return redirect()->route("push-lead", [
                    'status' => (!empty($result) ? 'Successfully Pushed to EPMS' : 'Not Pushed to EPMS') . ' <br/>' . (!empty($result1) ? 'Successfully Pushed to Sales Force' : 'Not Pushed to Sales Force'),
                    'key' => (!empty($request->key) ? $request->key : '')]);
    }

    public function EPMSLeads($id) {

        if (strpos(strtolower($this->name), 'test lead') !== false) {
            DB::table('tbl_leads')->where('id', $id)->update(['epms_status' => 2]);
            return false;
        }

        $postData['Lead'] = ['FullName' => $this->name, 'PhoneNumber' => $this->country_code . $this->mobile, 'WorkPhoneNumber' => $this->phone, 'Email' => $this->email,
            'Country' => $this->country, 'Nationality' => $this->nationality, 'PromoterName' => '',
            'Language' => $this->language, 'City' => $this->city, 'Campaign' => $this->campaign, 'Comment' => $this->comment, 'Source' => $this->source,
            'AppKey' => $this->API_KEY, 'CompanyId' => '1000',];

        $opts = ['http' => ['method' => 'POST', 'header' => "Content-type: application/json; charset=utf-8; \r\n",
                'content' => json_encode($postData, JSON_UNESCAPED_UNICODE), 'ignore_errors' => true, 'timeout' => 30,]];

        $context = stream_context_create($opts);
        $content = file_get_contents($this->API_URL, false, $context);
        $result = json_decode($content);

        if (!empty($result) && !empty($result->d) && $result->d == 1) {
            DB::table('tbl_leads')->where('id', $id)->update(['epms_status' => 1]);
            return true;
        } else {
            return $result;
        }
    }

    private function clear_input($string) {
        if (!empty($string)) {
            $data = preg_replace('/[ \t]+/', ' ', preg_replace('/\s*$^\s*/m', "\n", $string));
            return htmlspecialchars(stripslashes(trim($data)));
        }
    }

    public function salesForceLead($id) {

        $this->GetAccessToken();

        $apiurl = $this->instance_url . '/services/apexrest/pushLead';

        if (strpos(strtolower($this->name), 'test lead') !== false) {
            DB::table('tbl_leads')->where('id', $id)->update(['salesforce_status' => 2]);
            return false;
        }

        /* $body_json = json_encode(['name' => $this->name, 'email' => $this->email, 'mobile' => $this->mobile, 'country_code' => str_replace(['+', '-'], '', $this->country_code),
          'phone' => $this->phone, 'phone_country_code' => str_replace(['+', '-'], '', $this->phone_country_code), 'language' => $this->language, 'country' => $this->country, 'promoter' => $this->promoter,
          'nationality' => $this->nationality, 'city' => $this->city, 'campaign' => $this->campaign, 'comment' => $this->comment, 'source' => $this->source, 'kiosk' => $this->kiosk,]); */

        $body_json = json_encode(['name' => $this->name, 'email' => $this->email, 'mobile' => str_replace(['+', '-'], '', $this->country_code) . $this->mobile,
            'phone' => str_replace(['+', '-'], '', $this->phone_country_code) . $this->phone, 'language' => $this->language, 'country' => $this->country, 'promoter' => $this->promoter,
            'nationality' => $this->nationality, 'city' => $this->city, 'campaign' => $this->campaign, 'comment' => $this->comment, 'source' => $this->source, 'kiosk' => $this->kiosk,]);

        $headers = ["Authorization: {$this->token_type} {$this->access_token}", 'Content-Type: application/json'];

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

        if (!empty($result) && !empty($result->status) && $result->status == 'success') {
            DB::table('tbl_leads')->where('id', $id)->update(['salesforce_status' => 1]);
            return true;
        } else if (!empty($result->status) && $result->status == 'failure') {
            return false;
        }
        return $result;
    }

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

    public function requestedByTheSameDomain() {

        $myDomain = !empty($_SERVER['SCRIPT_URI']) ? $_SERVER['SCRIPT_URI'] : '';
        $requestsSource = !empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
        if (!empty($myDomain) && !empty($requestsSource)) {
            return parse_url($myDomain, PHP_URL_HOST) === parse_url($requestsSource, PHP_URL_HOST);
        }
        return false;
    }

    public function validCaptcha() {
        $remote_addr = !empty($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$this->secret}&response={$this->captcha}&remoteip={$remote_addr}");
        $result = json_decode($response);
        return $result;
    }

    public function import_leads() {
        //$this->import_EPMS_leads();
        $this->import_SF_leads();
        return redirect(route('push-lead'));
    }

    function import_EPMS_leads() {
        $leads = DB::table('tbl_leads')->where('epms_status', 0)->where('manager', '!=', 'GIBRAN HUSSAIN BUKHARI')->get();
        foreach ($leads as $lead) {
            $this->name = !empty($lead->name) ? $lead->name : '';
            $this->email = !empty($lead->email) ? $lead->email : '';
            $this->country_code = !empty($lead->country_code) ? $lead->country_code : '';
            $this->mobile = !empty($lead->mobile) ? $lead->mobile : '';
            $this->phone_country_code = !empty($lead->phone_country_code) ? $lead->phone_country_code : '';
            $this->phone = !empty($lead->phone) ? $lead->phone : '';
            $this->language = !empty($lead->language) ? $lead->language : '';
            $this->country = !empty($lead->country) ? $lead->country : '';
            $this->nationality = !empty($lead->nationality) ? $lead->nationality : '';
            $this->city = !empty($lead->city) ? $lead->city : '';
            $this->campaign = !empty($lead->campaign) ? $lead->campaign : '';
            $this->comment = !empty($lead->comment) ? $lead->comment : '';
            $this->source = !empty($lead->source) ? $lead->source : '';
            $this->EPMSLeads($lead->id);
        }
    }

    function import_SF_leads() {
        $leads = DB::table('tbl_leads')->whereIn('salesforce_status', [0,3])->where('manager', '!=', 'GIBRAN HUSSAIN BUKHARI')->orderby('id', 'desc')->get();
        foreach ($leads as $lead) {
            $this->name = !empty($lead->name) ? $lead->name : 'Unknown';
            $this->email = !empty($lead->email) ? $lead->email : '';
            $this->country_code = !empty($lead->country_code) ? str_replace(['+', '-'], '', $lead->country_code) : '';
            $this->mobile = !empty($lead->mobile) ? $lead->mobile : '';
            $this->phone_country_code = !empty($lead->phone_country_code) ? str_replace(['+', '-'], '', $lead->phone_country_code) : '';
            $this->phone = !empty($lead->phone) ? $lead->phone : '';
            $this->language = !empty($lead->language) ? $lead->language : '';
            $this->country = 'UAE'; //!empty($lead->country) ? $lead->country : '';
            $this->nationality = 'UAE'; //!empty($lead->nationality) ? $lead->nationality : '';
            $this->city = !empty($lead->city) ? $lead->city : '';
            $this->campaign = !empty($lead->campaign) ? $lead->campaign : '';
            $this->comment = !empty($lead->comment) ? $lead->comment : '';
            $this->source = !empty($lead->source) ? $lead->source : '';
            $this->kiosk = !empty($lead->kiosk) ? $lead->kiosk : '';
            $this->promoter = !empty($lead->promoter) ? $lead->promoter : '';
            $result = $this->salesForceLead($lead->id);
            //sleep(5);
//            if (!empty($result) && empty($result->status) && $result == 1) {
//                DB::table('tbl_leads')->where('id', $lead->id)->update(['salesforce_status' => 1]);
//                return true;
//            } 

            echo '<pre>';
            print_r($lead);
            print_r($result);
            echo '</pre>';
        }

        echo "done";
    }

    public function subscribe(Request $request) {

        $name = $request->first_name . ' ' . $request->last_name;
        $msg = subscribe_newsletter($name, $request->email, $this->locale);

        return Response::json(['status' => 'success', 'msg' => $msg, 'url' => 'https://thoedevelopments.com/en/lead-form/newsletter']);
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function confirm($sid, $token) {

        if (!empty($sid) && !empty($token)) {
            $exist = DB::table('subscribers')->where('token', trim($token))->first();
            if (!empty($exist)) {
                DB::table('subscribers')->where('id', trim($sid))->where('token', trim($token))->update(['status' => 'C']);
            }
            return redirect(SITE_URL . '/en/thank-you?nl=c');
        }
    }

    //end confirm 

    public function sendmail() {
        $details=null;
        $PropertyId = DB::table('tbl_properties')->where('title_en', $this->campaign)->first();
        if (!empty($PropertyId)):
            $details = (array) DB::table('tbl_projects')
            ->join('tbl_properties', 'tbl_projects.id', '=', 'tbl_properties.project_id')
            ->where('tbl_properties.id', $PropertyId->id)
            ->select('tbl_properties.*', 'tbl_projects.id', 'tbl_projects.title_en As Project_title', 'tbl_projects.slug As pslug', 'tbl_properties.title_en', 'tbl_projects.gallery_location', 'tbl_properties.gallery_location As bpgallery_location', 'tbl_properties.id As bpid', 'nfcstatus')
            ->first();

            //Website $Path
            $Path = APP_URL . "/assets/images/properties/" . $details['gallery_location'] . '/' . $details['bpgallery_location'];

            //Brochures
            $brochuresdownloadlink = null;
            $file_brochures = STORE_PATH . "/assets/images/properties/" . $details['gallery_location'] . '/' . $details['bpgallery_location'] . "/brochures";
            $files = File::files($file_brochures);
            if (!empty($files)) {
                $brochuresdownloadlink = $Path . '/brochures' . '/' . basename($files[0]);
            }

            //Floor Plans
            $floorplandownloadlink = null;
            $file_floor_plans = STORE_PATH . "/assets/images/properties/" . $details['gallery_location'] . '/' . $details['bpgallery_location'] . "/floor-plans";
            $files_fl = File::files($file_floor_plans);
            if (!empty($files_fl)) {
                $floorplandownloadlink = $Path . '/floor-plans' . '/' . basename($files_fl[0]);
            }
            $headerImage = null;
            $headerImage = SITE_URL . "/assets/images/properties/" . $details['gallery_location'] . '/' . $details['bpgallery_location'] . "/" . $details['header_image'];
            //Propery page Details Website url
            $websiteurl = null;
            !empty($details['pslug'] == 'riviera' || $details['pslug'] == 'victoria') ? $websiteurl = SITE_URL . "/en/dubai/meydan/" . $details['pslug'] . '/' . $details['slug'] : $websiteurl = SITE_URL . "/en/dubai/" . $details['pslug'] . '/' . $details['slug'];

        //exit();
        endif;
        $result['headerImage'] = !empty($headerImage) ? $headerImage : SITE_URL . '/emailer/thankyou/generic-image.jpg';
        $result['details'] = !empty($details) ? $details : '';
        $result['brochuresdownloadlink'] = !empty($brochuresdownloadlink) ? $brochuresdownloadlink : '';
        $result['floorplandownloadlink'] = !empty($floorplandownloadlink) ? $floorplandownloadlink : '';
        $result['websiteurl'] = !empty($websiteurl) ? $websiteurl : '';
        $result['Name'] = !empty($this->name) ? $this->name : 'Zubair Moinuddin khan';
        $result['EmailAddress'] = !empty($this->email) ? $this->email : 'zubair.khan@thoedevelopments.com';
        $result['country_code'] = $this->country_code;
        $result['mobile'] = $this->mobile;
        $result['source'] = $this->source;
        $result['campaign'] = $this->campaign;
        $result['language'] = $this->language;
        $result['Subject'] = 'Thank You For Registering Your Interest';
        
        //return view('csu.thankyou-emailer-project', ['CSUpdate' => $result]); die();

        DB::table('tbl_thankyou_emails')->insert([
            'fullname' => $result['Name'], 'email' => $result['EmailAddress'], 'propoerty_id' => !empty($details['bpid']) ? $details['bpid'] : 0,
            'countrycode' => $result['country_code'], 'mobile' => $result['mobile'], 'source' => $result['source'],
            'campaign' => $result['campaign'], 'language' => $result['language'], 'subject' => $result['Subject'],
        ]);
        //insert data end

        Mail::send('csu.thankyou-emailer-project', ['CSUpdate' => $result], function($msg) use ($result) {
            $msg->from('info@thoedevelopments.com', 'The Heart of Europe')
                    ->to($result['EmailAddress'], $result['Name'])
                    //->to('zubair.khan@thoedevelopments.com', 'The Heart of Europe')
                    //->to('ankit.kathuria@thoedevelopments.com', 'The Heart of Europe')
                    //->to('mohammed.abulkhair@thoedevelopments.com', 'The Heart of Europe')                  
                    ->subject($result['Subject']);
        });
        //sleep(2);
        //return view('csu.thankyou-emailer-project', ['CSUpdate' => $result]);
        //End Sending Section
    }

    //end sendmail

    public function Thankyou_preview(Request $request) {

        if (!empty($request->propertyslug) && (!empty($request->fullname) && !empty($request->email))):
            $PropertyId = DB::table('tbl_properties')->where('slug', $request->propertyslug)->first();
            if (!empty($PropertyId)):
                $details = (array) DB::table('tbl_projects')
                ->join('tbl_properties', 'tbl_projects.id', '=', 'tbl_properties.project_id')
                ->where('tbl_properties.id', $PropertyId->id)
                ->select('tbl_properties.*', 'tbl_projects.id', 'tbl_projects.title_en As Project_title', 'tbl_projects.slug As pslug', 'tbl_properties.title_en', 'tbl_projects.gallery_location', 'tbl_properties.gallery_location As bpgallery_location', 'tbl_properties.id As bpid', 'nfcstatus')
                ->first();

                //Website $Path
                $Path = APP_URL . "/assets/images/properties/" . $details['gallery_location'] . '/' . $details['bpgallery_location'];

                //Brochures
                $brochuresdownloadlink = null;
                $file_brochures = STORE_PATH . "/assets/images/properties/" . $details['gallery_location'] . '/' . $details['bpgallery_location'] . "/brochures";
                $files = File::files($file_brochures);
                if (!empty($files)) {
                    $brochuresdownloadlink = $Path . '/brochures' . '/' . basename($files[0]);
                }

                //Floor Plans
                $floorplandownloadlink = null;
                $file_floor_plans = STORE_PATH . "/assets/images/properties/" . $details['gallery_location'] . '/' . $details['bpgallery_location'] . "/floor-plans";
                $files_fl = File::files($file_floor_plans);
                if (!empty($files_fl)) {
                    $floorplandownloadlink = $Path . '/floor-plans' . '/' . basename($files_fl[0]);
                }
                $headerImage = null;
                $headerImage = SITE_URL . "/assets/images/properties/" . $details['gallery_location'] . '/' . $details['bpgallery_location'] . "/" . $details['header_image'];
                //Propery page Details Website url
                $websiteurl = null;
                !empty($details['pslug'] == 'riviera' || $details['pslug'] == 'victoria') ? $websiteurl = SITE_URL . "/en/dubai/meydan/" . $details['pslug'] . '/' . $details['slug'] : $websiteurl = SITE_URL . "/en/dubai/" . $details['pslug'] . '/' . $details['slug'];

                $EmailInfo = DB::table('tbl_thankyou_emails')->where(['propoerty_id' => $details['bpid'], 'fullname' => $request->fullname, 'email' => $request->email])->first();
            //exit();
            endif;

            DB::table('tbl_thankyou_emails')->where(['fullname' => $request->fullname, 'email' => $request->email])->update(['status' => 'Yes', 'updated_at' => date('Y-m-d h:i:s')]); elseif (!empty($request->fullname) && !empty($request->email)):
            $EmailInfo = DB::table('tbl_thankyou_emails')->where(['fullname' => $request->fullname, 'email' => $request->email])->first();
            DB::table('tbl_thankyou_emails')->where(['fullname' => $request->fullname, 'email' => $request->email])->update(['status' => 'Yes', 'updated_at' => date('Y-m-d h:i:s')]);
        endif;

        $result['headerImage'] = !empty($headerImage) ? $headerImage : SITE_URL . '/emailer/thankyou/generic-image.jpg';
        $result['details'] = !empty($details) ? $details : '';
        $result['brochuresdownloadlink'] = !empty($brochuresdownloadlink) ? $brochuresdownloadlink : '';
        $result['floorplandownloadlink'] = !empty($floorplandownloadlink) ? $floorplandownloadlink : '';
        $result['websiteurl'] = !empty($websiteurl) ? $websiteurl : '';
        $result['Name'] = !empty($EmailInfo->fullname) ? $EmailInfo->fullname : 'Zubair Moinuddin khan';
        $result['EmailAddress'] = !empty($EmailInfo->email) ? $EmailInfo->email : 'zubair.khan@thoedevelopments.com';
        $result['country_code'] = !empty($EmailInfo->countrycode) ? $EmailInfo->countrycode : '+971';
        $result['mobile'] = !empty($EmailInfo->mobile) ? $EmailInfo->mobile : '568670592';
        $result['source'] = !empty($EmailInfo->source) ? $EmailInfo->source : 'Website';
        $result['campaign'] = !empty($EmailInfo->campaign) ? $EmailInfo->campaign : 'Generic';
        $result['language'] = !empty($EmailInfo->language) ? $EmailInfo->language : 'English';
        $result['Subject'] = !empty($EmailInfo->subject) ? $EmailInfo->subject : 'Thank you for showing your interest to us';

        $agent = new Agent();
        if ($agent->isMobile() || $agent->isTablet()) {
            return view('csu.thankyou-mv-emailer-project', ['CSUpdate' => $result]);
        }
        return view('csu.thankyou-dv-emailer-project', ['CSUpdate' => $result]);
    }

}

?>
