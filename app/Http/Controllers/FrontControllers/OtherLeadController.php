<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use Response;
use DB;
use Cache;
use Mail;

class OtherLeadController extends Controller {

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
        $this->datetime = date('Y-m-d h:i:s');
        $this->date = date('Y-m-d');

        //Captcha
        $this->secret = '6LdRBpkUAAAAABCy8JCwtTKd42gfAMxvrXlNERja';
        $this->captcha = !empty(filter_input(INPUT_POST, 'g-recaptcha-response')) ? filter_input(INPUT_POST, 'g-recaptcha-response') : '';
    }

    public function save_lead_wdoors(Request $request) {

        if (!$request->ajax()) {
            return "invalid Request";
        }
        $origin = request()->headers->get('origin');
        if ($origin != 'https://thoedevelopments.com') {
            //return "invalid Host";
        }
        
        $validCaptcha = $this->validCaptcha();
        if ($validCaptcha->success != 1) {
            return $result = ['status' => 'failed', 'msg' => 'Session Expired, please click refresh', 'response' => $validCaptcha];
        }
        $lead_id = $this->check_lead();
        $this->sendmail();
        $result = ['status' => 'success', 'msg' => 'Successfully submit.', 'redirect_url' => 'http://whitedoorestate.com/index-whitedoor.html', 'response' => $validCaptcha];
        return Response::json($result);
    }

    public function check_lead() {
        $data = ['name' => $this->name, 'email' => $this->email, 'country' => $this->country, 'nationality' => $this->nationality, 'language' => $this->language,
            'country_code' => $this->country_code, 'mobile' => $this->mobile, 'phone_country_code' => $this->phone_country_code, 'phone' => $this->phone,'hot_leads'=>$this->hot_leads,
            'city' => $this->city, 'source' => $this->source, 'comment' => $this->comment, 'campaign' => $this->campaign,'medium' => $this->medium,'wystay'=>$this->wystay,
            'age' => $this->age,'gender' => $this->gender,'uae_residence' => $this->uae_residence,'promoter' => $this->promoter,'manager' => $this->manager,'user_id' => $this->user_id,
            'content' => $this->content,'term' => $this->term, 'target_url' => $this->url, 'created' => $this->date, 'created_at' => $this->datetime, 'updated_at' => $this->datetime,];

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
    public function sendmail(){
        $result['Name'] = $this->name;
        $result['EmailAddress'] = $this->email;
        $result['country_code'] = $this->country_code;
        $result['mobile'] = $this->mobile;
        $result['source'] = $this->source;
        $result['campaign'] = $this->campaign;
        $result['language'] = $this->language;
        
        $result['Subject'] = 'White Door Estate - New enquiry has been generated!';
        Mail::send('csu.leads-emailer', ['CSUpdate' => $result], function($msg) use ($result) {
            $msg->from('info@thoedevelopments.com', 'White Door Estate')
                    //->to($result['EmailAddress'], 'The Heart of Europe')
                    //->to('Gibran@whitedoorestate.com','The Heart of Europe') 
                    //->to('gibran@thoedevelopments.com','White Door Estate') 
                    //->to('natasha.gomes@thoedevelopments.com','White Door Estate')
                    //->to('tariq.khan@thoedevelopments.com','White Door Estate')
                    //->to('zubair.khan@thoedevelopments.com','White Door Estate')
                    ->to('ramina.Ibrokhimova@whitedoorestate.com','White Door Estate')
                    ->subject($result['Subject']);
        });
        sleep(4);
    }
    private function clear_input($string) {
        if (!empty($string)) {
            $data = preg_replace('/[ \t]+/', ' ', preg_replace('/\s*$^\s*/m', "\n", $string));
            return htmlspecialchars(stripslashes(trim($data)));
        }
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

}
?>