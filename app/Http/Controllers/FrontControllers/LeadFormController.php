<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use DB;
use Cache;
use Sentinel;

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

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index(Request $request, $new = null) {
        
        $cpage = get_cache_page($request->fullUrl());
        if ($cpage) {
            //return $cpage;
        }
        $countries = Cache::remember('country_list', 30, function () {
                    return DB::table('country')->where('status', 1)->orderBy('sort_order', 'desc')->orderBy('name', 'asc')->get();
                });
        $country_codes = Cache::remember('country_codes', 30, function () {
                    return DB::table('country')->where('status', 1)->orderBy('sort_order', 'desc')->orderBy('code', 'asc')->get();
                });

        $data = [
            'countries' => $countries,
            'country_codes' => $country_codes,
            'meta_title' => "Lead Form | {$this->locale} | Azizi Developments",
            'meta_keyword' => "Lead Form | {$this->locale} | Azizi Developments",
            'meta_description' => "Lead Form | {$this->locale} | Azizi Developments",
            'locale' => $this->locale,
        ];

        set_cache_page($request->fullUrl(), View("pages.lead-form.index-{$this->locale}", $data)->render());

        if ($new == 'social') {
            return view("pages.lead-form.index-{$new}-{$this->locale}", $data);
        } 
        elseif($new == 'dubizzle'){
            return view("pages.lead-form.index-{$new}-{$this->locale}", $data);
        }
        elseif($new == 'propertyfinder'){
            return view("pages.lead-form.index-{$new}-{$this->locale}", $data);
        }
        elseif($new == 'zoomproperty'){
            return view("pages.lead-form.index-{$new}-{$this->locale}", $data);
        }        
        elseif($new == 'ycgc'){
            return view("pages.lead-form.index-{$new}-{$this->locale}", $data);
        }
        elseif($new =='newsletter'){
            return view("pages.lead-form.index-{$new}-{$this->locale}", $data);
        }
        elseif($new == 'whitedoors'){
            return view("pages.lead-form.white-doors.index-{$new}-{$this->locale}", $data);
        }
        elseif($new == 'whitedoorslanding'){
            return view("pages.lead-form.white-doors.index-{$new}-{$this->locale}", $data);
        } 
        elseif($new == 'whitedoorslandingdemo'){
            return view("pages.lead-form.white-doors.index-{$new}-{$this->locale}", $data);
        }
        elseif($new == 'expriments'){
            return view("pages.lead-form.index-{$new}-{$this->locale}", $data);
        }
        else {
            return view("pages.lead-form.index-{$this->locale}", $data);
        }
    }
    
    //Agent Leads
    public function agent_leads(Request $request, $new = null) {
        
        if (!Sentinel::check()) { return redirect('login'); }
        
        $cpage = get_cache_page($request->fullUrl());
        if ($cpage) {
            //return $cpage;
        }
        $countries = Cache::remember('country_list', 30, function () {
                    return DB::table('country')->where('status', 1)->orderBy('sort_order', 'desc')->orderBy('name', 'asc')->get();
                });
        $country_codes = Cache::remember('country_codes', 30, function () {
                    return DB::table('country')->where('status', 1)->orderBy('sort_order', 'desc')->orderBy('code', 'asc')->get();
                });

        $data = [
            'countries' => $countries,
            'user' => Sentinel::getUser(),
            'country_codes' => $country_codes,
            'meta_title' => "Lead Form | {$this->locale} | Azizi Developments",
            'meta_keyword' => "Lead Form | {$this->locale} | Azizi Developments",
            'meta_description' => "Lead Form | {$this->locale} | Azizi Developments",
            'locale' => $this->locale,
        ];

        //set_cache_page($request->fullUrl(), View("pages.lead-form.index-{$this->locale}", $data)->render());
        //if(!empty($_GET['test']) && $_GET['test']==1){return view("pages.lead-form.index-agents-test-{$this->locale}", $data);}
        return view("pages.lead-form.index-agents-test-{$this->locale}", $data);
        
    }    
    public function form_2(Request $request, $new = null) {

        $cpage = get_cache_page($request->fullUrl());
        if ($cpage) {
            //return $cpage;
        }
        $countries = Cache::remember('country_list', 30, function () {
                    return DB::table('country')->where('status', 1)->orderBy('sort_order', 'desc')->orderBy('name', 'asc')->get();
                });
        $country_codes = Cache::remember('country_codes', 30, function () {
                    return DB::table('country')->where('status', 1)->orderBy('sort_order', 'desc')->orderBy('code', 'asc')->get();
                });

        $data = [
            'countries' => $countries,
            'country_codes' => $country_codes,
            'meta_title' => "Lead Form | {$this->locale} | Azizi Developments",
            'meta_keyword' => "Lead Form | {$this->locale} | Azizi Developments",
            'meta_description' => "Lead Form | {$this->locale} | Azizi Developments",
            'locale' => $this->locale,
        ];

        //set_cache_page($request->fullUrl(), View("pages.lead-form.horizental-form.index-{$this->locale}", $data)->render());
        return view("pages.lead-form.horizental-form.index-{$this->locale}", $data);   
    }
    
    public function push_lead(Request $request) {

        //echo $this->requestedByTheSameDomain();

        if ($request->isMethod('get')) {
            return view("pages.lead-form.push-index");
        }
    }

    public function lead_report(Request $request) {

        $source = Cache::remember('leads_source', 30, function () {
                    return DB::table('tbl_leads')->select('source')->groupby('source')->get();
                });
        $campaign = Cache::remember('leads_campaign', 30, function () {
                    return DB::table('tbl_leads')->select('campaign')->groupby('campaign')->get();
                });
        $country = Cache::remember('leads_country', 30, function () {
                    return DB::table('tbl_leads')->select('country')->groupby('country')->get();
                });
        $nationality = Cache::remember('leads_nationality', 30, function () {
                    return DB::table('tbl_leads')->select('nationality')->groupby('nationality')->get();
                });


        $query = DB::table('tbl_leads');

        if (!empty($request->keyword) && !empty($request->type) && $request->type == 'name') {
            $query->where('name', 'like', "%$request->keyword%");
        } else if (!empty($request->keyword) && !empty($request->type) && $request->type == 'email') {
            $query->where('email', 'like', "%$request->keyword%");
        } else if (!empty($request->keyword) && !empty($request->type) && $request->type == 'phone') {
            $query->where('phone', 'like', "%$request->keyword%");
        } else if (!empty($request->keyword) && !empty($request->type) && $request->type == 'comment') {
            $query->where('comment', 'like', "%$request->keyword%");
        } else if (isset($request->keyword) && !empty($request->type) && $request->type == 'epms_status') {
            $query->where('epms_status', 'like', "%$request->keyword%");
        } else if (!empty($request->keyword) && empty($request->type)) {
            $query->where('name', 'like', "%$request->keyword%");
            $query->Orwhere('email', 'like', "%$request->keyword%");
            $query->Orwhere('phone', 'like', "%$request->keyword%");
            $query->Orwhere('comment', 'like', "%$request->keyword%");
        }

        if (!empty($request->source)) {
            $query->where('source', $request->source);
        }
        if (!empty($request->campaign)) {
            $query->where('campaign', $request->campaign);
        }
        if (!empty($request->country)) {
            $query->where('country', $request->country);
        }
        if (!empty($request->nationality)) {
            $query->where('nationality', $request->nationality);
        }

        if (empty($request->start_date) && empty($request->end_date)) {
            $query->whereBetween('created_at', [date('Y-m-d', strtotime(date('Y-m-d') . " -30 day")) . ' 00:00:00', date('Y-m-d') . ' 23:59:59']);
        }

        if (!empty($request->start_date) && !empty($request->end_date)) {
            $query->whereBetween('created_at', [$request->start_date . ' 00:00:00', $request->end_date . ' 23:59:59']);
        }
        $leads = $query->orderBy('id', 'desc')->get();

        if (!empty($request->password) && $request->password == '2019@Report') {
            return view('pages.lead-form.report', ['source' => $source, 'campaign' => $campaign, 'country' => $country, 'nationality' => $nationality, 'status' => 'success', 'leads' => $leads]);
        } else if (!empty($request->password)) {
            return view('pages.lead-form.report', ['source' => $source, 'campaign' => $campaign, 'country' => $country, 'nationality' => $nationality, 'msg' => 'Invalid Access Key']);
        }
        return view('pages.lead-form.report', ['source' => $source, 'campaign' => $campaign, 'country' => $country, 'nationality' => $nationality, 'msg' => 'Invalid Access Key']);
    }

}
