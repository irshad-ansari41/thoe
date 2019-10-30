<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Models\Properties;
use View;
use Mail;
use DB;


class FormReferralController extends Controller {

    public $locale;

    /**
     * Initializer.
     *
     * @return void
     */
    public function __construct(Request $request) {
        $this->locale = get_locale($request->segment(1));
        \App::setLocale($this->locale);
    }

    public function index(Request $request) {
        
        $data = [
            'meta_title' => '',
            'meta_keyword' => '',
            'meta_description' => '',
            'locale' => $this->locale,
        ];        
        $data['Properties'] = Properties::where('status','1')->orderBy("id", "asc")->orderBy("title_en", "asc")->orderBy("sort_order", "asc")->get();
        return view("pages.referral-form.referral",$data);
    }
    
    public function send(Request $request){
        
        //echo '<pre>'; print_r($request);echo '</pre>';
        $data = [
            'fullname' => trim($request->fullname),
            'countrycode'=>trim($request->countrycode),
            'phone'=>trim($request->phone),
            'email' => trim($request->email),
            'building'=>trim($request->building),
            'unitnumber'=>trim($request->unitnumber),
            'referralfullname'=>trim($request->referralfullname),
            'referralcountrycode'=>trim($request->referralcountrycode),
            'referralphone'=>trim($request->referralphone),
            'referralemail'=>trim($request->referralemail)
            //'phone'=>$request->phone,            
        ];
        //echo '</pre>'; print_r($data); echo '</pre>';
        DB::table('tbl_referral')->insert($data);
        
        /*Mail::send('pages.referral-form.newletter', ['data' => $data], function ($message) use ($data) {
            $message->subject($data['subject']);
            $message->from('info@azizidevelopments.com', 'Azizi Developments');
            $message->to($data['email'],$data['fullname']);
        });*/
        
        return redirect(route('thank')); 
    }
}
