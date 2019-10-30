<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use Response;
use DB;
use Cache;

class AdminSalesForceController extends Controller {

    private $access_token;
    private $instance_url;
    private $token_type;

    /**
     * Initializer.
     *
     * @return void
     */
    public function __construct(Request $request) {
        //Server API
        $this->getAccessToken();
        //$this->getLeadFields();
    }

    public function avaliablilityListApi() {

        $this->GetAccessToken();
        $apiurl = $this->instance_url . '/services/apexrest/fetchAvailableProperties';
        $headers = ["Authorization: {$this->token_type} {$this->access_token}", 'Content-Type: application/json'];

        $http = curl_init();

        curl_setopt($http, CURLOPT_HEADER, false);
        curl_setopt($http, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($http, CURLOPT_URL, $apiurl);
        curl_setopt($http, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($http, CURLOPT_POST, true);
        //curl_setopt($http, CURLOPT_POSTFIELDS, $body_json);
        curl_setopt($http, CURLOPT_CUSTOMREQUEST, 'GET');

        $results = curl_exec($http);
        //$http_status = curl_getinfo($http, CURLINFO_HTTP_CODE);
        //$info = curl_getinfo($http);
        curl_close($http);

        //return $results;
        echo $results_json = json_decode($results);

        //echo '<pre>'; print_r($results_json); echo '</pre>';
        //echo $results_json;
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

        //echo '<pre>'; print_r($apiToken); echo '</pre>';

        $this->instance_url = $apiToken->instance_url;
        $this->token_type = $apiToken->token_type;
        $this->access_token = $apiToken->access_token;
    }

    public function getLeadFields() {

        $url = $this->sf_instance_url . '/services/apexrest/getAllPicklistForLead';

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: {$this->sf_token_type} {$this->sf_access_token}",
            'Content-type: application/json'
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec($ch);

        curl_close($ch);

        $result = json_decode($server_output);
        echo '<pre>';
        print_r($result);
        die;
        $this->preferredLanguage = !empty($result->preferredLanguage) ? $result->preferredLanguage : [];
        $this->phoneCountryCode = !empty($result->phoneCountryCode) ? $result->phoneCountryCode : [];
        $this->nationality = !empty($result->nationality) ? $result->nationality : [];
        $this->leadSource = !empty($result->leadSource) ? $result->leadSource : [];
        $this->countryOfResidence = !empty($result->countryOfResidence) ? $result->countryOfResidence : [];
    }

}

?>
