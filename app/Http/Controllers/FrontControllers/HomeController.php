<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Content;
use App\Models\Event;
use DB;
use Jenssegers\Agent\Agent;

class HomeController extends Controller {

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
        
        if ($request->demo == 1) {
            return view("pages.home.expriments-{$this->locale}", $data);
        }elseif($request->demo == 2){
           return view("pages.home.expriments2-{$this->locale}", $data); 
        }

        $agent = new Agent();
        if($agent->isMobile() || $agent->isTablet()){ return redirect()->route('MobileTwo'); }
        return view("pages.home.dview.homevform-{$this->locale}", $data);
        
    }
    
}
