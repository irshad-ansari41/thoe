<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use Mail;
use DB;

class CityScapeController extends Controller {

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

    public function index() {
        $data = [
            'meta_title' => 'Cityscape Abudhabi 2019',
            'meta_keyword' => 'Cityscape Abudhabi 2019',
            'meta_description' => 'Cityscape Abudhabi 2019',
            'locale' => $this->locale,
        ];
        $data['country_codes'] = DB::table('country')->get();

        return view("pages.cityscape.index", $data);
    }

    public function send(Request $request) {

        $data = [
            'subject' => "Azizi Developments World Cup Offers",
            'fullname' => $request->fullname,
            'countrycode' => $request->countrycode,
            'phone' => $request->phone,
            'source' => $request->source,
            'email' => $request->email,
        ];

        Mail::send('pages.cityscape.emailer', ['data' => $data], function ($message) use ($data) {
            $message->subject($data['subject']);
            $message->from('info@azizidevelopments.com', 'Azizi Developments');
            $message->to($data['email'], $data['fullname']);
        });

        $this->create($data);

        return redirect(route('cityscape.thank-you'));
    }

    public function create($data) {

        $dbinsert = [
            'fullname' => $data['fullname'],
            'countrycode' => $data['countrycode'],
            'phone' => $data['phone'],
            'source' => $data['source'],
            'email' => $data['email'],
            'status' => 'Yes',
            'created_at' => date('Y-m-d h:i:s'),
        ];

        DB::table('tbl_cityscape_leads')->insert($dbinsert);
    }

    public function thankyou() {
        return view("pages.cityscape.thank-you");
    }

    public function offers() {
        return view("pages.cityscape.offers", ['locale' => $this->locale]);
    }

}
