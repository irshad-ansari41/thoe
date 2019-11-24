<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use View;
use DB;
use Cache;

class PushLeadController extends Controller {

    public $locale;
    private $API_KEY;

    /**
     * Initializer.
     *
     * @return void
     */
    public function __construct(Request $request) {
        $this->locale = get_locale($request->segment(1));
        //$this->API_KEY ='alkfw8MLKusdf@#@#dSMDfk23$#@92348adskfm';
        $this->API_KEY = 'jdsflkjl09238490@#$@#$SDFflkwej923432wdmffks@#$@#$sdfk';
        \App::setLocale($this->locale);
    }

    public function indexlp() {
        return view("pages.push-lead.index");
    }

    public function push_lead() {
        return view("pages.push-lead.index");
    }

    public function store(Request $request) {
        $input = $request->all();

        if (!empty($input['key']) && $input['key'] != 'Lead@2018') {
            return view("pages.push-lead.index", ['status' => 'failed', 'key' => (!empty($input['key']) ? $input['key'] : '')]);
        }

        $data = [
            'name' => !empty($input['name']) ? $input['name'] : '',
            'email' => !empty($input['email']) ? $input['email'] : '',
            'phone' => !empty($input['phone']) ? str_replace('-', '', $input['phone']) : '',
            'language' => !empty($input['language']) ? $input['language'] : '',
            'source' => !empty($input['source']) ? $input['source'] : '',
            'campaign' => !empty($input['campaign']) ? $input['campaign'] : '',
            'comment' => !empty($input['comment']) ? $input['comment'] : '',
            'city' => !empty($input['city']) ? $input['city'] : '',
            'country' => !empty($input['country']) ? $input['country'] : '',
            'nationality' => !empty($input['nationality']) ? $input['nationality'] : '',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
            'history' => date('d-m-Y h:i:a'),
        ];

        $id = DB::table('tbl_leads')->insertGetId($data);

        $result = $this->push_lead_epms($data, $id);
        //$result = $this->push_lead_salesforce($data, $id);
        
        return redirect()->route("push-lead.index", ['status' => (!empty($result) ? 'success' : 'failed'), 'key' => $input['key']]);
    }

    public function push_lead_epms($data, $id) {
        $postData['Lead'] = [
            'FullName' => !empty($data['name']) ? str_replace("'", '', $data['name']) : 'Not Provided',
            'Email' => !empty($data['email']) ? $data['email'] : 'ignore.' . mt_rand() . '@ignore.com',
            'PhoneNumber' => !empty($data['phone']) ? $data['phone'] : mt_rand(),
            'Language' => !empty($data['language']) ? $data['language'] : 'English',
            'Country' => $data['country'],
            'Nationality' => $data['nationality'],
            'PromoterName' => '',
            'City' => $data['city'],
            'Campaign' => '',
            'Comment' => $data['comment'],
            'Source' => $data['source'],
            'AppKey' => $this->API_KEY,
            'CompanyId' => "1000",
        ];

        $opts = ['http' => [
                'method' => 'POST',
                'header' => "Content-type: application/json \r\n",
                //"X-Requested-With: XMLHttpRequest \r\n".
                //"curl/7.9.8 (i686-pc-linux-gnu) libcurl 7.9.8 (OpenSSL 0.9.6b) (ipv6 enabled)\r\n",
                'content' => json_encode($postData),
                'ignore_errors' => true,
                'timeout' => 300,
            ]
        ];
        //echo json_encode($postData);
        $context = stream_context_create($opts);
        $content = file_get_contents("https://crm.thoedevelopments.com/WebForms/websiteleads.aspx/InsertLeadV5", false, $context);
        $result = json_decode($content);

        print_r($result);

        if (!empty($result) && $result->d == 1) {
            DB::table('tbl_leads')->where('id', $id)->update(['epms_status' => 1]);
            return true;
        }
        return false;
    }
    
    public function push_lead_salesforce($data, $id){

        $this->GetAccessToken();
        
        $apiurl = $this->instance_url.'/services/apexrest/pushLead';
        $body = array(
            'name' => !empty($data['name']) ? str_replace("'", '', $data['name']) : 'Not Provided',
            'email' => !empty($data['email']) ? $data['email'] : 'ignore.' . mt_rand() . '@ignore.com',
            'phone' => !empty($data['phone']) ? $data['phone'] : mt_rand(),
            'language' => !empty($data['language']) ? $data['language'] : 'English',
            'source'=> !empty($data['source']) ? $data['source'] : 'Website/Google',
            'country' => !empty($data['country']) ?$data['country'] : '',
            'nationality' => !empty($data['country']) ? $data['nationality'] : '',
            'city' => !empty($data['city']) ? $data['city']: '',
            'campaign' => !empty($data['campaign']) ? $data['campaign']:'',
            'comment' => !empty($data['comment']) ? $data['comment']: '',
            'source' => !empty($data['source']) ?  $data['source']:'',
        );

        $body_json = json_encode($body);

        $headers = [
            "Authorization: {$this->token_type} {$this->access_token}",
            'Content-Type: application/json'
        ];
            
        $http = curl_init();

        curl_setopt($http, CURLOPT_HEADER, false);
        curl_setopt($http, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($http, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($http,CURLOPT_URL, $apiurl);
        curl_setopt($http,CURLOPT_POST, true);
        curl_setopt($http,CURLOPT_POSTFIELDS, $body_json);

        $results = curl_exec($http);
        $http_status = curl_getinfo($http, CURLINFO_HTTP_CODE);
        $info = curl_getinfo($http);
        curl_close($http);
        
        $results_json = json_decode($results);
        //print_r($results_json);
        
        
        if (!empty($results_json) && $results_json->status == 'success') {
            DB::table('tbl_leads')->where('id', $id)->update(['salesforce_status' => 1]);
            return true;
        }
        return false;
        
    }
    // Lead Push into Salesforce end
    
    public function GetAccessToken(){
        
        $http = curl_init();
        $apiurl = SalesForceKey;

        curl_setopt($http, CURLOPT_HEADER, false);
        curl_setopt($http, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($http,CURLOPT_URL, $apiurl);
        //curl_setopt($http, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($http,CURLOPT_POST, true);
        //curl_setopt($http,CURLOPT_POSTFIELDS, $body_json);
        curl_setopt($http, CURLOPT_CUSTOMREQUEST, 'POST');

        $results = curl_exec($http);
        $http_status = curl_getinfo($http, CURLINFO_HTTP_CODE);
        $info = curl_getinfo($http);
        curl_close($http);

        $apiToken = json_decode($results);        
        $this->instance_url = $apiToken->instance_url;
        $this->token_type = $apiToken->token_type; 
        $this->access_token = $apiToken->access_token;
        
    }
    // Get Access Token End.

}
