<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use Response;
use DB;
use Cache;

class ApiZoomPropertyController extends Controller {

    public $locales;

    /**
     * Initializer.
     *
     * @return void
     */
    public function __construct(Request $request) {

        $this->locale = get_locale($request->segment(1));
        \App::setLocale($this->locale);
    }
    
    public function create_lead(Request $request) {
        
        if (empty($request->name) && empty($request->email) && empty($request->country_code) && empty($request->mobile) && empty($request->source)) {
            return Response::json(['status' => 'failed']);
        }
        
        $data = [
            'name' => !empty($request->name) ? $this->clear_input($request->name) : '',
            'email' => !empty($request->email) ? $this->clear_input($request->email) : '',
            'country_code' => !empty($request->country_code) ? str_replace(['+', '-'], '', $request->country_code) : '',
            'mobile' => !empty($request->mobile) ? $this->clear_input($request->mobile) : '',
            'country' => !empty($request->country) ? $this->clear_input($request->country) : '',
            'nationality' => !empty($request->nationality) ? $this->clear_input($request->nationality) : '',
            'city' => !empty($request->city) ? $this->clear_input($request->city) : '',
            'language' => !empty($request->language) ? $this->clear_input($request->language) : 'English',
            'comment' => !empty($request->comment) ? $this->clear_input($request->comment) : '',
            //
            'age' => !empty($request->age) ? $this->clear_input($request->age) : '',
            'uae_residence' => !empty($request->uae_residence) ? $this->clear_input($request->uae_residence) : '',
            'gender' => !empty($request->gender) ? $this->clear_input($request->gender) : '',
            'promoter' => !empty($request->promoter) ? $this->clear_input($request->promoter) : '',
            'manager' => !empty($request->manager) ? $this->clear_input($request->manager) : '',
            'kiosk' => !empty($request->kiosk) ? true : '',
            'user_id' => !empty($request->user_id) ? $request->user_id : '0',
            //
            'source' => !empty($request->source) ? $this->clear_input($request->source) : '',
            'campaign' => !empty($request->campaign) ? $this->clear_input($request->campaign) : '',
            //
            'target_url' => !empty($request->url) ? $this->clear_input($request->url) : '',
            'created' => date('Y-m-d'),
            'created_at' => date('Y-m-d h:i:s'),
        ];

        if (!empty($data['email'])) {
            $exist1 = DB::table('tbl_leads')->where('email', $data['email'])->first();
        } elseif ($data['mobile']) {
            $exist2 = DB::table('tbl_leads')->where('mobile', $data['mobile'])->first();
        }

        if (!empty($exist1->email) && $exist1->created == date('Y-m-d')) {
            DB::table('tbl_leads')->where('email', $exist1->email)->update($data);
            $result = ['status' => 'success', 'msg' => 'Successfully submit.', 'redirect_url' => SITE_URL, 'response' => ''];
        } elseif (!empty($exist2->phone) && $exist2->created == date('Y-m-d')) {
            DB::table('tbl_leads')->where('phone', $exist2->phone)->update($data);
            $result = ['status' => 'success', 'msg' => 'Successfully submit.', 'redirect_url' => SITE_URL, 'response' => ''];
        } else {
            $id = DB::table('tbl_leads')->insertGetId($data);
            $this->salesForceLead($data, $id);
            //$sf = $this->salesForceLead($data, $id);
            //subscribe_newsletter($request->name, $request->email, $request->locale);
            //$result = ['status' => 'success', 'msg' => 'Successfully submit.', 'response' => ['sf' => $sf]];
            $result = ['status' => 'success', 'msg' => 'Successfully submit.'];
        }
        return Response::json($result);
    }

    public function salesForceLead($data, $id) {

        if (strpos(strtolower($data['name']), 'test lead') !== false) {
            DB::table('tbl_leads')->where('id', $id)->update(['salesforce_status' => 2]);
            return false;
        }

        $this->GetAccessToken();

        $apiurl = $this->instance_url . '/services/apexrest/pushLead';

        $body_json = json_encode([
            'name' => $data['name'],
            'email' => $data['email'],
            //'country_code' => $data['country_code'],
            'mobile' => str_replace(['+', '-'], '', $data['country_code']) . $data['mobile'],
            'nationality' => $data['nationality'],
            'country' => $data['country'],
            'city' => $data['city'],
            'language' => $data['language'],
            //
            'age' => $data['age'],
            'gender' => $data['gender'],
            'promoter' => $data['promoter'],
            'manager' => $data['manager'],
            'kiosk' => $data['kiosk'],
            //
            'source' => $data['source'],
            'campaign' => $data['campaign'],
            'comment' => $data['comment'],
        ]);

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
            return $result;
        } else if (!empty($result->status) && $result->status == 'failure') {
            DB::table('tbl_leads')->where('id', $id)->update(['salesforce_status' => 3]);
            return $result;
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

    private function clear_input($string) {
        if (!empty($string)) {
            $data = preg_replace('/[ \t]+/', ' ', preg_replace('/\s*$^\s*/m', "\n", $string));
            return htmlspecialchars(stripslashes(trim($data)));
        }
    }

    public function count_lead($user_id = null) {
        $query = DB::table('users');
        $query->leftjoin('activations', 'users.id', '=', 'activations.user_id');
        $query->leftjoin('role_users', 'users.id', '=', 'role_users.user_id');
        $query->leftjoin('roles', 'role_users.role_id', '=', 'roles.id');
        $query->select('users.id', 'users.first_name', 'users.last_name', 'users.email');
        $agents = $query->where('role_users.role_id', 6)->get();

        foreach ($agents as $value) {
            $user_ids[] = $value->id;
        }
        if (!empty($user_id)) {
            $count = DB::table('tbl_leads')->whereIn('user_id', [$user_id])->count();
        } else {
            $count = DB::table('tbl_leads')->whereIn('user_id', $user_ids)->count();
        }
        return $count;
    }

}

?>
