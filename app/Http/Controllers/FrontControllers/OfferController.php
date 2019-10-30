<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use View;

class OfferController extends Controller {

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

        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            return $cached;
        }
        $data = [
            'meta_title' => 'Azizi Developments Offers 2019',
            'meta_keyword' => 'Azizi Developments Offers  2019',
            'meta_description' => 'Azizi Developments Offers  2019',
            'locale' => $this->locale,
        ];
        /* $IPaddress = $_SERVER['REMOTE_ADDR'];
          $details = $this->ip_details($IPaddress);
          //echo 'City: '.$details->city.' County: '.$details->country;
          //echo $details->ip;
          //echo $details->region;
          //echo $details->loc;
          //echo $details->org;
          //echo $details->hostname;
          //echo '<br/> <pre>';print_r($details);
          if ($details->country == 'GB') {
          //check page
          //set_cache_page($request->fullUrl(), View("pages.offer.index-uk-{$this->locale}", $data)->render());
          return View("pages.offer.index-uk-{$this->locale}", $data);
          } else {
          //check page
          //set_cache_page($request->fullUrl(), View("pages.offer.index-{$this->locale}", $data)->render());
          return View("pages.offer.index-{$this->locale}", $data);
          } */

        //check page

        set_cache_page($request->fullUrl(), View("pages.offer.index-{$this->locale}", $data)->render());


        if (!empty($_GET['test']) && $_GET['test'] == 1) {

            $IPaddress = $_SERVER['REMOTE_ADDR'];
            $details = $this->ip_details($IPaddress);
            echo 'City: ' . $details->city . ' County: ' . $details->country;
            //echo $details->org;      
            //echo $details->hostname; 
            echo '<';
            print_r($details);
        }

        return View("pages.offer.index-{$this->locale}", $data);
    }

    public function ips(Request $request) {

        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            return $cached;
        }

        $data = [
            'meta_title' => 'IPS 2019',
            'meta_keyword' => 'IPS 2019',
            'meta_description' => 'IPS 2019',
            'locale' => $this->locale,
        ];


        //check page
        set_cache_page($request->fullUrl(), View("pages.offer.ips-{$this->locale}", $data)->render());
        return View("pages.offer.ips-{$this->locale}", $data);
    }

    public function cityscape_abudhabi(Request $request) {

        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            return $cached;
        }

        $data = [
            'meta_title' => 'Cityscape Abudhabi 2019',
            'meta_keyword' => 'Cityscape Abudhabi  2019',
            'meta_description' => 'Cityscape Abudhabi  2019',
            'locale' => $this->locale,
        ];


        //check page
        set_cache_page($request->fullUrl(), View("pages.offer.cityscape-abudhabi-{$this->locale}", $data)->render());
        return View("pages.offer.cityscape-abudhabi-{$this->locale}", $data);
    }

    public function uk_event(Request $request) {
        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            return $cached;
        }
        $data = [
            'meta_title' => 'Azizi Developments Offers 2019',
            'meta_keyword' => 'Azizi Developments Offers  2019',
            'meta_description' => 'Azizi Developments Offers  2019',
            'locale' => $this->locale,
        ];
        //check page
        //set_cache_page($request->fullUrl(), View("pages.offer.index-uk-{$this->locale}", $data)->render());
        return View("pages.offer.index-uk-{$this->locale}", $data);
    }

    //End Uk Offers

    public function Diamond_Week(Request $request) {
        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            return $cached;
        }
        $data = [
            'meta_title' => 'Azizi Developments Offers 2019',
            'meta_keyword' => 'Azizi Developments Offers  2019',
            'meta_description' => 'Azizi Developments Offers  2019',
            'locale' => $this->locale,
        ];
        //check page
        //set_cache_page($request->fullUrl(), View("pages.offer.index-uk-{$this->locale}", $data)->render());
        return View("pages.offer.index-diamond-{$this->locale}", $data);
    }

    //End Diamond Week Offer

    public function Lp_Diamond_Week(Request $request) {
        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            return $cached;
        }
        $data = [
            'meta_title' => 'Azizi Developments Offers 2019',
            'meta_keyword' => 'Azizi Developments Offers  2019',
            'meta_description' => 'Azizi Developments Offers  2019',
            'locale' => $this->locale,
        ];
        //check page
        //set_cache_page($request->fullUrl(), View("pages.offer.index-uk-{$this->locale}", $data)->render());
        return View("pages.offer.lp.index-lp-diamond-{$this->locale}", $data);
    }

    //End Lp Diamond Week Offer

    public function Adha_Offers(Request $request) {
        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            return $cached;
        }
        $data = [
            'meta_title' => 'Azizi Developments Offers 2019',
            'meta_keyword' => 'Azizi Developments Offers  2019',
            'meta_description' => 'Azizi Developments Offers  2019',
            'locale' => $this->locale,
        ];
        //check page
        //set_cache_page($request->fullUrl(), View("pages.offer.index-uk-{$this->locale}", $data)->render());
        return View("pages.offer.index-adha-{$this->locale}", $data);
    }

    //End Ahad Offers

    public function Lp_Adha(Request $request) {
        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            return $cached;
        }
        $data = [
            'meta_title' => 'Azizi Developments Offers 2019',
            'meta_keyword' => 'Azizi Developments Offers  2019',
            'meta_description' => 'Azizi Developments Offers  2019',
            'locale' => $this->locale,
        ];
        //check page
        //set_cache_page($request->fullUrl(), View("pages.offer.index-uk-{$this->locale}", $data)->render());
        return View("pages.offer.lp.index-lp-adha-{$this->locale}", $data);
    }

    //End Lp Adha  Offer    

    public function offers_Week(Request $request) {
        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            return $cached;
        }
        $data = [
            'meta_title' => 'Azizi Developments Offers 2019',
            'meta_keyword' => 'Azizi Developments Offers  2019',
            'meta_description' => 'Azizi Developments Offers  2019',
            'locale' => $this->locale,
        ];
        //check page
        //set_cache_page($request->fullUrl(), View("pages.offer.index-uk-{$this->locale}", $data)->render());
        return View("pages.offer.index-week-offers-{$this->locale}", $data);
    }

    //End offers Week Offer 24th Aug 2019

    public function Berton_offers(Request $request) {
        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            return $cached;
        }
        $data = [
            'meta_title' => 'Azizi Developments Offers 2019',
            'meta_keyword' => 'Azizi Developments Offers  2019',
            'meta_description' => 'Azizi Developments Offers  2019',
            'locale' => $this->locale,
        ];
        //check page
        //set_cache_page($request->fullUrl(), View("pages.offer.index-uk-{$this->locale}", $data)->render());
        return View("pages.offer.index-berton-offers-{$this->locale}", $data);
    }
    //End Berton Offers 31st Aug 2019.

    public function Creek_Views(Request $request) {
        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            return $cached;
        }
        $data = [
            'meta_title' => 'Azizi Developments Offers 2019',
            'meta_keyword' => 'Azizi Developments Offers  2019',
            'meta_description' => 'Azizi Developments Offers  2019',
            'locale' => $this->locale,
        ];
        //check page
        //set_cache_page($request->fullUrl(), View("pages.offer.index-uk-{$this->locale}", $data)->render());
        return View("pages.offer.index-farhad-offers-{$this->locale}", $data);
    }
    //End Creek Views Offers 14th Sep 2019.
    

    public function ip_details($IPaddress) {
        $json = file_get_contents("http://ipinfo.io/{$IPaddress}");
        $details = json_decode($json);
        return $details;
    }

}
