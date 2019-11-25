<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\About;
use View;
use App\Models\Event;
use App\Press;
use App\Models\Properties;
use DB;

class SearchController extends Controller {

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

        return redirect('/');
        $this->locale = get_locale($request->segment(1));
        $about = About::find(1);
        $meta_title = $about->meta_title;
        $meta_keyword = $about->meta_keyword;
        $meta_description = $about->meta_desc;
        $og_title = trim($about->meta_title);
        $og_desc = trim($about->meta_keyword);
        $og_pic = ($about->banner_image != "") ? url("/") . "/assets/images/about/" . $about->banner_image : '';

        $og_title = '';
        $og_desc = '';
        $og_pic = '';
        $searchtext = "";
        $ptype = "1";

        $about = array();
        $executive = array();
        $timeline = array();
        $teams = array();
        $events = array();
        $news = array();
        $projects = array();
        $news_results = array();
        $project_results = array();
        $all = array();


        $searchtext = trim($request->searchtext);

        $event_results = Event::where("event_title", 'LIKE', '%' . $searchtext . '%')
                        ->orWhere("event_date", 'LIKE', '%' . $searchtext . '%')
                        ->orWhere("long_desc", 'LIKE', '%' . $searchtext . '%')
                        ->orWhere("extra_desc", 'LIKE', '%' . $searchtext . '%')
                        ->orWhere("visit_us_at", 'LIKE', '%' . $searchtext . '%')
                        ->orWhere("starting_from", 'LIKE', '%' . $searchtext . '%')
                        ->orWhere("booking_fees", 'LIKE', '%' . $searchtext . '%')
                        ->orWhere("payment_plan", 'LIKE', '%' . $searchtext . '%')
                        ->orWhere("mortgage_starting", 'LIKE', '%' . $searchtext . '%')
                        ->orderBy('event_date', 'desc')->paginate(5);

        $news_results = Press::where("title", 'LIKE', '%' . $searchtext . '%')->orWhere("description", 'LIKE', '%' . $searchtext . '%')->orWhere("date", 'LIKE', '%' . $searchtext . '%')->orderBy('date', 'desc')->paginate(5);


        $project_results = Properties::where("title_en", 'LIKE', '%' . $searchtext . '%')->orWhere("location", 'LIKE', '%' . $searchtext . '%')->orWhere("short_description_en", 'LIKE', '%' . $searchtext . '%')->orWhere("long_description_en", 'LIKE', '%' . $searchtext . '%')->orderBy('id', 'desc')->paginate(5);


        $event_results2 = Event::select('tbl_events.id as id', 'tbl_events.slug as slug', 'tbl_events.event_title as title', 'tbl_events.event_title_ar as title_ar', 'tbl_events.long_desc as descr', DB::raw("'event' as tag"))->where("event_title", 'LIKE', '%' . $searchtext . '%')->orWhere("event_date", 'LIKE', '%' . $searchtext . '%')->orWhere("long_desc", 'LIKE', '%' . $searchtext . '%')->orWhere("extra_desc", 'LIKE', '%' . $searchtext . '%')->orWhere("visit_us_at", 'LIKE', '%' . $searchtext . '%')->orWhere("starting_from", 'LIKE', '%' . $searchtext . '%')->orWhere("booking_fees", 'LIKE', '%' . $searchtext . '%')->orWhere("payment_plan", 'LIKE', '%' . $searchtext . '%')->orWhere("mortgage_starting", 'LIKE', '%' . $searchtext . '%')->paginate(2);

        $news_results2 = Press::select('tbl_pressrelease.id as id', 'tbl_pressrelease.slug as slug', 'tbl_pressrelease.title as title', 'tbl_pressrelease.title_ar as title_ar', 'tbl_pressrelease.description_ar as descr_ar', 'tbl_pressrelease.description as descr', DB::raw("'news' as tag"))->where("title", 'LIKE', '%' . $searchtext . '%')->orWhere("description", 'LIKE', '%' . $searchtext . '%')->orWhere("date", 'LIKE', '%' . $searchtext . '%')->paginate(2);


        $project_results2 = Properties::select('tbl_properties.id as id', 'tbl_properties.slug as slug', 'tbl_properties.title_en as title', 'tbl_properties.title_ar as title_ar', 'tbl_properties.short_description_en as descr', 'tbl_properties.short_description_ar as descr_ar', DB::raw("'project' as tag"))->where("title_en", 'LIKE', '%' . $searchtext . '%')->orWhere("location", 'LIKE', '%' . $searchtext . '%')->orWhere("short_description_en", 'LIKE', '%' . $searchtext . '%')->orWhere("long_description_en", 'LIKE', '%' . $searchtext . '%')->paginate(2);

        $All_final_r = $event_results2->merge($news_results2);

        $All_final_r = $All_final_r->merge($project_results2);

        if (!empty($All_final_r)) {
            $i = 0;
            foreach ($All_final_r as $result) {
                $all['all'][$i]['id'] = $result->id;

                if (session()->get('lang') == 'en') {
                    $all['all'][$i]['title_en'] = $result->title;
                } else if (session()->get('lang') == 'ar') {
                    $all['all'][$i]['title_en'] = $result->title_ar;
                }
                $all['all'][$i]['slug'] = $result->slug;

                if (strlen($result->descr) <= 400) {

                    if (session()->get('lang') == 'en') {

                        $all['all'][$i]['short_description_en'] = $result->descr;
                    } else if (session()->get('lang') == 'ar') {
                        $all['all'][$i]['short_description_en'] = $result->descr_ar;
                    }
                } else {
                    if (session()->get('lang') == 'en') {
                        $all['all'][$i]['short_description_en'] = substr($result->descr, 0, 400) . "...";
                    } else if (session()->get('lang') == 'ar') {
                        $all['all'][$i]['short_description_en'] = substr($result->descr_ar, 0, 400) . "...";
                    }
                }

                $all['all'][$i]['tag'] = $result->tag;
                $i++;
            }
        }

        $events['render'] = $event_results->render();


        if (!empty($event_results)) {
            $i = 0;
            foreach ($event_results as $result) {
                $events['events'][$i]['id'] = $result->id;
                $events['events'][$i]['event_photo'] = $result->event_photo;
                $events['events'][$i]['event_photo_ar'] = $result->event_photo_ar;

                $events['events'][$i]['event_main_photo'] = $result->event_main_photo;

                if (session()->get('lang') == 'en') {
                    $events['events'][$i]['event_title'] = $result->event_title;
                } else if (session()->get('lang') == 'ar') {
                    $events['events'][$i]['event_title'] = $result->event_title_ar;
                }

                $events['events'][$i]['slug'] = $result->slug;
                if (strlen($result->long_desc) <= 200) {

                    if (session()->get('lang') == 'en') {
                        $events['events'][$i]['long_desc'] = $result->long_desc;
                    } else if (session()->get('lang') == 'ar') {
                        $events['events'][$i]['long_desc'] = $result->long_desc_ar;
                    }
                } else {

                    if (session()->get('lang') == 'en') {
                        $events['events'][$i]['long_desc'] = substr($result->long_desc, 0, 200) . "...";
                    } else if (session()->get('lang') == 'ar') {
                        $events['events'][$i]['long_desc'] = substr($result->long_desc_ar, 0, 200) . "...";
                    }
                }

                if (session()->get('lang') == 'en') {
                    $events['events'][$i]['extra_desc'] = $result->extra_desc;
                } else if (session()->get('lang') == 'ar') {
                    $events['events'][$i]['extra_desc'] = $result->extra_desc_ar;
                }
                $events['events'][$i]['starting_from'] = $result->starting_from;
                $events['events'][$i]['event_date'] = date("d F Y", strtotime($result->event_date));
                $i++;
            }
        }


        $news['render'] = $news_results->render();

        if (!empty($news_results)) {
            $i = 0;
            foreach ($news_results as $result) {
                $news['news'][$i]['id'] = $result->id;

                if (session()->get('lang') == 'en') {
                    $news['news'][$i]['description'] = $result->description;
                    $news['news'][$i]['title'] = $result->title;
                } else if (session()->get('lang') == 'ar') {
                    $news['news'][$i]['description'] = $result->description_ar;
                    $news['news'][$i]['title'] = $result->title_ar;
                }

                $news['news'][$i]['date'] = $result->date;
                $news['news'][$i]['slug'] = $result->slug;
                $i++;
            }
        }

        $projects['render'] = $project_results->render();

        if (!empty($project_results)) {
            $i = 0;
            foreach ($project_results as $result) {
                $projects['projects'][$i]['id'] = $result->id;
                $projects['projects'][$i]['slug'] = $result->slug;

                if (session()->get('lang') == 'en') {
                    $projects['projects'][$i]['title_en'] = $result->title_en;
                    $projects['projects'][$i]['short_description_en'] = $result->short_description_en;
                } else if (session()->get('lang') == 'ar') {
                    $projects['projects'][$i]['title_en'] = $result->title_ar;
                    $projects['projects'][$i]['short_description_en'] = $result->short_description_ar;
                }
                $i++;
            }
        }





        $data = [
            'about' => $about,
            'events' => $events,
            'project_results' => $project_results,
            'searchtext' => '',
            'timeline' => $timeline,
            'meta_title' => $meta_title,
            'meta_keyword' => $meta_keyword,
            'meta_description' => $meta_description,
            'og_title' => $og_title,
            'og_desc' => $og_desc,
            'og_pic' => $og_pic,
            'locale' => $this->locale,
        ];

        if ($request->ajax()) {

            $parent_id = $request->parent_id;

            if ($parent_id == "news_pagination") {
                return view("ajax-news-search", compact('news'));
            }
            if ($parent_id == "event_pagination") {
                return view("ajax-event-search", compact('events'));
            }
            if ($parent_id == "projects_pagination") {
                return view("ajax-project-search", compact('projects'));
            }
        }

        return view('pages.search', $data);
    }

}
