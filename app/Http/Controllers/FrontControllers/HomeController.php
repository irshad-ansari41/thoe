<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Content;
use App\Models\Event;
use App\Models\Press;
use App\Models\Project;
use DB;
use Response;
use Cache;

class HomeController extends Controller {

    public $locale;
    public $countries;

    /**
     *
     * @return void
     */
    public function __construct(Request $request) {
        $this->locale = get_locale($request->segment(1));
        \App::setLocale($this->locale);

        $this->countries = Cache::remember('countries', 30, function () {
                    return DB::table('country')->get();
                });
    }

    public function index(Request $request) {

        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            //return $cached;
        }

        $content = Content::where('id', 27)->first();
        $properties = [];
        $projects = Project::all()->toArray();
        foreach ($projects as $key => $project) {
            $properties[$key]['project'] = (array) $project;
            $properties[$key]['properties'] = DB::table('tbl_properties')->where("project_id", $project['id'])->where("status", "1")->orderBy('sort_order', 'ASC')->limit(3)->get()->toArray();
        }

        $data = [
            'sliders' => Banner::where('status', '1')->orderBy('banner_order', 'ASC')->get()->toArray(),
            'content' => $content->toArray(),
            'properties' => $properties,
            'countries' => $this->countries,
            'events' => Event::where('event_date', '>=', date('Y-m-d'))->where('status', '1', date('Y-m-d'))->where("event_title_{$this->locale}", '!=', '')->orderBy('event_order', 'asc')->limit(6)->get()->toArray(),
            'press' => Press::where('status', '1', date('Y-m-d'))->where("title_{$this->locale}", '!=', '')->orderBy('press_order', 'asc')->limit(6)->get()->toArray(),
            'features' => DB::table('features')->orderby('id', 'DESC')->get()->toArray(),
            'invest' => (array) DB::table('tbl_invest')->first(),
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
