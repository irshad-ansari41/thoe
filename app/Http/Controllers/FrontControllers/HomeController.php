<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Content;
use App\Models\Event;
use App\Models\Press;
use DB;

class HomeController extends Controller {

    public $locale;

    /**
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
            'Testimonials' => DB::table('tbl_testimonials')->where(['status' => 'Yes'])->get(),
            "AllRatings" => DB::table('tbl_ratings')->where('menu_id', 0)->first(),
            'sliders' => Banner::where('status', '1')->orderBy('banner_order', 'ASC')->get()->toArray(),
            'content' => $content,
            'events' => Event::where('event_date', '>=', date('Y-m-d'))->where('status', '1', date('Y-m-d'))->where("event_title_{$this->locale}", '!=', '')->orderBy('event_order', 'asc')->limit(6)->get()->toArray(),
            'press' => Press::where('status', '1', date('Y-m-d'))->where("title_{$this->locale}", '!=', '')->orderBy('press_order', 'asc')->limit(6)->get()->toArray(),
            'bannersliders' => DB::table('tbl_feature_banner_slider')->orderby('tbl_feature_banner_slider.banner_order', 'ASC')->get()->toArray(),
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

}
