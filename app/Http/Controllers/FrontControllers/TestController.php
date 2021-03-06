<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Content;
use App\Models\Event;
use DB;
use Jenssegers\Agent\Agent;

class TestController extends Controller {

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

        
        $pages = array(redirect()->route('HomeOne'),redirect()->route('HomeTwo'),redirect()->route('HomeThree')); 
        $randpage = array_rand($pages);
        return $pages[$randpage];
        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            //return $cached;
        }

        $content = Content::find(27);
        $data = [
            'Testimonials'=>DB::table('tbl_testimonials')->where(['status'=>'Yes'])->get(),
            "AllRatings" => DB::table('tbl_ratings')->where('menu_id',0)->first(),
            'sliders' => Banner::where('status', '1')->orderBy('banner_order', 'ASC')->get(),
            'content' => $content,
            'events' => Event::where('event_date', '>=', date('Y-m-d'))->where('status', '1', date('Y-m-d'))->where("event_title_{$this->locale}",'!=','')->orderBy('event_order', 'asc')->paginate(5),
            //'bannersliders' => FeatureBanner::where("status", "1")->orderBy('banner_order', 'asc')->get(),
            'bannersliders' => DB::table('tbl_feature_banner_slider')
            ->join('tbl_menu', 'tbl_menu.id', '=',  'tbl_feature_banner_slider.menu_id')
            ->where('tbl_menu.status','1')     
            ->select('tbl_feature_banner_slider.*', 'tbl_menu.id','tbl_menu.status')
            ->orderby('tbl_feature_banner_slider.banner_order','ASC')        
            ->get(),
            'meta_title' => $content->meta_title,
            'meta_keyword' => $content->meta_keyword,
            'meta_description' => $content->meta_desc,
            'og_title' => $content->meta_title,
            'og_desc' => $content->meta_desc,
            'og_pic' => $content->banner_image != "" ? url("/") . "/assets/images/about/" . $content->banner_image : '',
            'locale' => $this->locale,
        ];
        
        /* Start Cache */
        set_cache_page($request->fullUrl(), view("pages.home.index-{$this->locale}", $data)->render());
        /* end Cache */
        return view("pages.home.index-{$this->locale}", $data);        
    }

    public function home_two(Request $request) {

        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            //return $cached;
        }

        $content = Content::find(27);

        $data = [
            'Testimonials'=>DB::table('tbl_testimonials')->where(['status'=>'Yes'])->get(),
            "AllRatings" => DB::table('tbl_ratings')->where('menu_id',0)->first(),
            'sliders' => Banner::where('status', '1')->orderBy('banner_order', 'ASC')->get(),
            'content' => $content,
            'events' => Event::where('event_date', '>=', date('Y-m-d'))->where('status', '1', date('Y-m-d'))->where("event_title_{$this->locale}",'!=','')->orderBy('event_order', 'asc')->paginate(5),
            //'bannersliders' => FeatureBanner::where("status", "1")->orderBy('banner_order', 'asc')->get(),
            'bannersliders' => DB::table('tbl_feature_banner_slider')
            ->join('tbl_menu', 'tbl_menu.id', '=',  'tbl_feature_banner_slider.menu_id')
            ->where('tbl_menu.status','1')     
            ->select('tbl_feature_banner_slider.*', 'tbl_menu.id','tbl_menu.status')
            ->orderby('tbl_feature_banner_slider.banner_order','ASC')        
            ->get(),
            'meta_title' => $content->meta_title,
            'meta_keyword' => $content->meta_keyword,
            'meta_description' => $content->meta_desc,
            'og_title' => $content->meta_title,
            'og_desc' => $content->meta_desc,
            'og_pic' => $content->banner_image != "" ? url("/") . "/assets/images/about/" . $content->banner_image : '',
            'locale' => $this->locale,
                    
        ];
            
        /* Start Cache */
        set_cache_page($request->fullUrl(), view("pages.home.dview.homevform-{$this->locale}", $data)->render());
        /* end Cache */
        return view("pages.home.dview.homevform-{$this->locale}", $data);
    }
    //End Home_Two 
    
    public function home_three(Request $request) {

        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            //return $cached;
        }

        $content = Content::find(27);

        $data = [
            'Testimonials'=>DB::table('tbl_testimonials')->where(['status'=>'Yes'])->get(),
            "AllRatings" => DB::table('tbl_ratings')->where('menu_id',0)->first(),
            'sliders' => Banner::where('status', '1')->orderBy('banner_order', 'ASC')->get(),
            'content' => $content,
            'events' => Event::where('event_date', '>=', date('Y-m-d'))->where('status', '1', date('Y-m-d'))->where("event_title_{$this->locale}",'!=','')->orderBy('event_order', 'asc')->paginate(5),
            //'bannersliders' => FeatureBanner::where("status", "1")->orderBy('banner_order', 'asc')->get(),
            'bannersliders' => DB::table('tbl_feature_banner_slider')
            ->join('tbl_menu', 'tbl_menu.id', '=',  'tbl_feature_banner_slider.menu_id')
            ->where('tbl_menu.status','1')     
            ->select('tbl_feature_banner_slider.*', 'tbl_menu.id','tbl_menu.status')
            ->orderby('tbl_feature_banner_slider.banner_order','ASC')        
            ->get(),
            'meta_title' => $content->meta_title,
            'meta_keyword' => $content->meta_keyword,
            'meta_description' => $content->meta_desc,
            'og_title' => $content->meta_title,
            'og_desc' => $content->meta_desc,
            'og_pic' => $content->banner_image != "" ? url("/") . "/assets/images/about/" . $content->banner_image : '',
            'locale' => $this->locale,
        ];

        /* Start Cache */
        set_cache_page($request->fullUrl(), view("pages.home.dview.homehform-{$this->locale}", $data)->render());
        /* end Cache */
        return view("pages.home.dview.homehform-{$this->locale}", $data);
    }  
    //End Home_Three
    
    public function home_four(Request $request) {

        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            //return $cached;
        }

        $content = Content::find(27);

        $data = [
            'Testimonials'=>DB::table('tbl_testimonials')->where(['status'=>'Yes'])->get(),
            "AllRatings" => DB::table('tbl_ratings')->where('menu_id',0)->first(),
            'sliders' => Banner::where('status', '1')->orderBy('banner_order', 'ASC')->get(),
            'content' => $content,
            'events' => Event::where('event_date', '>=', date('Y-m-d'))->where('status', '1', date('Y-m-d'))->where("event_title_{$this->locale}",'!=','')->orderBy('event_order', 'asc')->paginate(5),
            //'bannersliders' => FeatureBanner::where("status", "1")->orderBy('banner_order', 'asc')->get(),
            'bannersliders' => DB::table('tbl_feature_banner_slider')
            ->join('tbl_menu', 'tbl_menu.id', '=',  'tbl_feature_banner_slider.menu_id')
            ->where('tbl_menu.status','1')     
            ->select('tbl_feature_banner_slider.*', 'tbl_menu.id','tbl_menu.status')
            ->orderby('tbl_feature_banner_slider.banner_order','ASC')        
            ->get(),
            'meta_title' => $content->meta_title,
            'meta_keyword' => $content->meta_keyword,
            'meta_description' => $content->meta_desc,
            'og_title' => $content->meta_title,
            'og_desc' => $content->meta_desc,
            'og_pic' => $content->banner_image != "" ? url("/") . "/assets/images/about/" . $content->banner_image : '',
            'locale' => $this->locale,
        ];

        /* Start Cache */
        set_cache_page($request->fullUrl(), view("pages.home.mview.index-{$this->locale}", $data)->render());
        /* end Cache */
        return view("pages.home.mview.index-{$this->locale}", $data);
    }  
    //End Home_Four
    
    public function mobile_one(Request $request){
       $agent = new Agent();
       if($agent->isDesktop()){ return redirect()->route('home.index'); }
       else{return $this->home_two($request);}
       
    }
    //end Mobile One
    
    public function mobile_two(Request $request){
        $agent = new Agent();
        if($agent->isDesktop()){ return redirect()->route('home.index'); }
        else{return $this->home_four($request);}
    }
    //end Mobile Two
    
    public function Mobile_View(Request $request){
        $pages = array(redirect()->route('HomeOne'),redirect()->route('HomeTwo')); 
        $randpage = array_rand($pages);
        return $pages[$randpage];
    }
    public function mtest(Request $request){
        
        $agent = new Agent();
        $devicetype = ($agent->isMobile() ? ($agent->isTablet() ? 'Tablet' :'Phone') : 'Desktop'); 

        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            //return $cached;
        }

        $content = Content::find(27);

        $data = [
            'Testimonials'=>DB::table('tbl_testimonials')->where(['status'=>'Yes'])->get(),
            "AllRatings" => DB::table('tbl_ratings')->where('menu_id',0)->first(),
            'Agent'=>$devicetype,
            'sliders' => Banner::where('status', '0')->whereIn('id',[52,53,54])->orderBy('banner_order', 'ASC')->get(),
            'content' => $content,
            'events' => Event::where('event_date', '>=', date('Y-m-d'))->where('status', '1', date('Y-m-d'))->where("event_title_{$this->locale}",'!=','')->orderBy('event_order', 'asc')->paginate(5),
            //'bannersliders' => FeatureBanner::where("status", "1")->orderBy('banner_order', 'asc')->get(),
            'bannersliders' => DB::table('tbl_feature_banner_slider')
            ->join('tbl_menu', 'tbl_menu.id', '=',  'tbl_feature_banner_slider.menu_id')
            ->where('tbl_menu.status','1')     
            ->select('tbl_feature_banner_slider.*', 'tbl_menu.id','tbl_menu.status')
            ->orderby('tbl_feature_banner_slider.banner_order','ASC')        
            ->get(),
            'meta_title' => $content->meta_title,
            'meta_keyword' => $content->meta_keyword,
            'meta_description' => $content->meta_desc,
            'og_title' => $content->meta_title,
            'og_desc' => $content->meta_desc,
            'og_pic' => $content->banner_image != "" ? url("/") . "/assets/images/about/" . $content->banner_image : '',
            'locale' => $this->locale,
        ];

        /* Start Cache */
        //set_cache_page($request->fullUrl(), view("pages.home.expriments3-{$this->locale}", $data)->render());
        /* end Cache */
        if(!empty($_GET['Demo']) && $_GET['Demo'] ==1) {
            if($agent->isMobile()) { return view("pages.home.exp.index-{$this->locale}", $data); }
            elseif($agent->isTablet()){return view("pages.home.exp.index-{$this->locale}", $data);}
            else{ return view("pages.home.exp.index-{$this->locale}", $data); }
        }   
        if($agent->isMobile()) { return view("pages.home.mview.index-{$this->locale}", $data); }
        elseif($agent->isTablet()){return view("pages.home.tview.index-{$this->locale}", $data);}
        else{ return view("pages.home.dview.homehform-{$this->locale}", $data); }
        
    }
        
}

/*
Random page load on same url code
public function index(Request $request) {

        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            //return $cached;
        }

        $content = Content::find(27);
        $data = [
            'sliders' => Banner::where('status', '1')->orderBy('banner_order', 'ASC')->get(),
            'content' => $content,
            'events' => Event::where('event_date', '>=', date('Y-m-d'))->where('status', '1', date('Y-m-d'))->where("event_title_{$this->locale}", '!=', '')->orderBy('event_order', 'asc')->paginate(5),
            //'bannersliders' => FeatureBanner::where("status", "1")->orderBy('banner_order', 'asc')->get(),
            'bannersliders' => DB::table('tbl_feature_banner_slider')
                    ->join('tbl_menu', 'tbl_menu.id', '=', 'tbl_feature_banner_slider.menu_id')
                    ->where('tbl_menu.status', '1')
                    ->select('tbl_feature_banner_slider.*', 'tbl_menu.id', 'tbl_menu.status')
                    ->orderby('tbl_feature_banner_slider.banner_order', 'ASC')
                    ->get(),
            'meta_title' => $content->meta_title,
            'meta_keyword' => $content->meta_keyword,
            'meta_description' => $content->meta_desc,
            'og_title' => $content->meta_title,
            'og_desc' => $content->meta_desc,
            'og_pic' => $content->banner_image != "" ? url("/") . "/assets/images/about/" . $content->banner_image : '',
            'locale' => $this->locale,
        ];

        $pages = array("Homepage-One" => "pages.home.index-{$this->locale}", "Homepage-Two" => "pages.home.expriments-{$this->locale}", "Homepage-Three" => "pages.home.expriments2-{$this->locale}");
        $randpage = array_rand($pages);
        //return $pages[$randpage];

        // Start Cache
        set_cache_page($request->fullUrl(), view($pages[$randpage], $data)->render());
        // end Cache
        return view($pages[$randpage], $data);
    }

    public function Mobile_View(Request $request) {
        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            //return $cached;
        }

        $content = Content::find(27);
        $data = [
            'sliders' => Banner::where('status', '1')->orderBy('banner_order', 'ASC')->get(),
            'content' => $content,
            'events' => Event::where('event_date', '>=', date('Y-m-d'))->where('status', '1', date('Y-m-d'))->where("event_title_{$this->locale}", '!=', '')->orderBy('event_order', 'asc')->paginate(5),
            //'bannersliders' => FeatureBanner::where("status", "1")->orderBy('banner_order', 'asc')->get(),
            'bannersliders' => DB::table('tbl_feature_banner_slider')
                    ->join('tbl_menu', 'tbl_menu.id', '=', 'tbl_feature_banner_slider.menu_id')
                    ->where('tbl_menu.status', '1')
                    ->select('tbl_feature_banner_slider.*', 'tbl_menu.id', 'tbl_menu.status')
                    ->orderby('tbl_feature_banner_slider.banner_order', 'ASC')
                    ->get(),
            'meta_title' => $content->meta_title,
            'meta_keyword' => $content->meta_keyword,
            'meta_description' => $content->meta_desc,
            'og_title' => $content->meta_title,
            'og_desc' => $content->meta_desc,
            'og_pic' => $content->banner_image != "" ? url("/") . "/assets/images/about/" . $content->banner_image : '',
            'locale' => $this->locale,
        ];

        $pages = array("Homepage-One" => "pages.home.index-{$this->locale}", "Homepage-Two" => "pages.home.expriments-{$this->locale}");
        $randpage = array_rand($pages);
        //return $pages[$randpage];

        //Start Cache
        set_cache_page($request->fullUrl(), view($pages[$randpage], $data)->render());
        //end Cache
        return view($pages[$randpage], $data);
    }
*/