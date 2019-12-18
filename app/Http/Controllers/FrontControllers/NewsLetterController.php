<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use DB;
use Mail;
use Response;

class NewsLetterController extends Controller {
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

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function subscribe(Request $request) {

        $name = $request->first_name . ' ' . $request->last_name;
        $msg = subscribe_newsletter($name, $request->email, $this->locale);

        return Response::json(['status' => 'success', 'error' => '', 'msg' => $msg]);
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

}
