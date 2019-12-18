<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use DB;
use Mail;
use Response;

class LeadFormController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Home Controller
      |--------------------------------------------------------------------------
      |
      | This controller renders your application's "dashboard" for users that
      | are authenticated. Of course, you are free to change or remove the
      | controller as you wish. It is just here to get your app started!
      |
     */

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

    public function get_in_touch(Request $request) {

        $error = $msg = '';
        if (!$request->ajax()) {
            $error = "invalid Request";
            $status = 'error';
        }

        $origin = request()->headers->get('origin');
        if ($origin != 'https://thoedevelopments.com') {
            //return "invalid Host";
        }

        $data = ['name' => $request->input('name'), 'email' => $request->input('email'), 'phone' => $request->input('phone'), 'intention' => $request->input('intention'), 'created_at' => date('Y-m-d h:i:s')];
        $id = DB::table('contacts')->where('email', $request->input('email'))->value('id');
        if (empty($id)) {
            $id = DB::table('contacts')->insertGetId($data);
            $msg = 'Thank you for your interest.';
            $status = 'success';
        } else {
            DB::table('contacts')->where('id', $id)->update(['updated_at' => date('Y-m-d h:i:s')]);
            $msg = 'Thank you for your interest.';
            $status = 'success';
        }

        if (in_array($request->input('intention'), ['Investments', 'Real Estate Brokers'])) {
            $data['country'] = $request->input('name');
            $this->push_sf($id, $data);
        } else {
//            Mail::send('emails.contact', ['data' => $data], function ($message) use ($data) {
//                $message->subject('New enquiry has been generated');
//                $message->from('website@thoedevelopments.com', 'The Heart of Europe');
//                $message->to('info@thoe.com', 'THOE');
//            });
        }

        $result = ['msg' => $msg, 'status' => $status, 'error' => $error];

        return Response::json($result);
    }

    public function push_sf($id, $data) {

        $name = explode(' ', $data['name']);
        $postData['Lead'] = ['first_name' => (!empty($name[0]) ? $name[0] : $data['name']),
            'last_name' => (!empty($name[0]) ? $name[0] : $data['name']),
            '00Nf2000003E424' => $data['country'], 'mobile' => $data['phone'],
            '00Nf2000003E42G' => $data['email'], '00Nf2000003E61z' => '005f2000008tbuP',
            'lead_source' => 'Website', '00Nf200000EMm3J' => 'utm-s', '00Nf200000EMm3O' => 'utm-m',
            '00Nf200000EMm3T' => 'utm-c', '00Nf2000003E41t' => 'New', '00Nf2000003E41z' => 'New',];

        $opts = ['http' => ['method' => 'POST', 'header' => "Content-type: application/json; charset=utf-8; \r\n",
                'content' => json_encode($postData, JSON_UNESCAPED_UNICODE), 'ignore_errors' => true, 'timeout' => 30,]];

        $context = stream_context_create($opts);
        $content = @file_get_contents('http://webto.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8', false, $context);
        $result = json_decode($content);

        if (!empty($result) && !empty($result->d) && $result->d == 1) {
            DB::table('contacts')->where('id', $id)->update(['sf_status' => 1]);
            return true;
        } else {
            return $result;
        }
    }

}
