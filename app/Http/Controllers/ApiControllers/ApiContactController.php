<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use Mail;
use DB;
use Response;

class ApiContactController extends Controller {

    public function create_contact(Request $request) {

        if ($request->isMethod('get')) {
            //return 'invalid Request';
        }

        if (!$request->ajax()) {
            //return response::json(["invalid Request"]);
        }

        $data = [
            'subject' => !empty($request->subject) ? $request->subject : '',
            'first_name' => !empty($request->first_name) ? $request->first_name : '',
            'last_name' => !empty($request->last_name) ? $request->last_name : '',
            'email' => !empty($request->email) ? $request->email : '',
            'phone' => !empty($request->mobile) ? $request->mobile : '',
            'message' => !empty($request->comment) ? $request->comment : '',
        ];

        if (empty(array_filter($data))) {
            return response::json(["invalid Request"]);
        }

        Mail::send('emails.contact', ['data' => $data], function ($message) use ($data) {
            $message->subject('New Contact has been generated');
            $message->from('mobile@thoedevelopments.com', 'The Heart of Europe');
            $message->to('marketing@thoedevelopmets.com', 'Digital Marketing Team');
            //$message->bcc('irshad.ansari@thoedevelopments.com', 'Irshad Ansari');
            //$message->bcc('irshad.ansari41@gmail.com', 'Irshad Ansari');
        });

        $id = DB::table('contacts')->insertGetId(['first_name' => $request->first_name, 'last_name' => $request->last_name, 'email' => $request->email, 'country' => $request->country,
            'phone' => $request->mobile_no, 'message' => $request->comment,
            'created_at' => date('Y-m-d h:i:s')]);

        $result = ['status' => 'success', 'msg' => 'Successfully submit.','contact_id'=>$id];
        
        return Response::json($result);
    }

}
