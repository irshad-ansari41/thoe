<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Event;
use View;
use DB;

class EventController extends Controller {

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

        $content = Content::find(16);

        $keyword = $sort = "";
        $date_start = date('Y-m-d');
        $date_end = date('Y-m-d', strtotime('+1 days'));
        $events = Event::where("status", "1")->where('event_date', '>=', $date_start)->where('event_date', '<=', $date_end)->orWhere('event_date', '>', $date_end)->where("event_title_{$this->locale}",'!=','')->orderBy('event_order', 'ASC')->paginate(5);
        $ratingpage;
        if($content->title_en == 'Events'): $ratingpage = 'Events Calendar'; endif;
            
        $data = [
            "AllRatings" => DB::table('tbl_ratings')->where('menu_title',$ratingpage)->where('menu_id',37)->first(),
            'content' => $content,
            'events' => $events,
            'meta_title' => $content->meta_title,
            'meta_keyword' => $content->meta_keyword,
            'meta_description' => $content->meta_desc,
            'og_title' => $content->meta_title,
            'og_desc' => $content->meta_desc,
            'og_pic' => $content->image != "" ? url("/") . "/assets/images/banner/" . $content->image : '',
            'locale' => $this->locale,
            'keyword' => $keyword,
            'sort' => $sort,
            'from_date' => $date_start,
            'to_date' => $date_end,
            'schema_tag' => "",
            'render' => $events->render(),
        ];

        //check page
        set_cache_page($request->fullUrl(), View("pages.event.index-{$this->locale}", $data)->render());

        return view("pages.event.index-{$this->locale}", $data);
    }

    public function details(Request $request, $slug) {

        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            //return $cached;
        }
        $content = Event::where("slug_{$this->locale}", $slug)->where("event_title_{$this->locale}",'!=','')->first();
        if (empty($content)) {
            return redirect("$this->locale/events", 301);
        }
        $data = [
            'content' => $content,
            'meta_title' => $content->event_title_en . " | Azizi Developments Event",
            'meta_keyword' => $content->event_title_en . ", Upcoming Events, Events in UAE, Property Developer Events",
            'meta_description' => $content->extra_des_en,
            'og_title' => $content->event_title_en . " | Azizi Developments Event",
            'og_desc' => $content->extra_desc,
            'og_pic' => $content['event_main_photo_'.$this->locale] != "" ? url("/") . '/assets/images/events/main/' . $content['event_main_photo_'.$this->locale] : '',
            'locale' => $this->locale,
        ];

        //check page
        set_cache_page($request->fullUrl(), View("pages.event.details-{$this->locale}", $data)->render());

        return view("pages.event.details-{$this->locale}", $data);
    }
    
    public function api_events(){
        $json_array;
        $date_start = date('Y-m-d');
        $date_end = date('Y-m-d', strtotime('+1 days'));
        $events = Event::where("status", "1")->where('event_date', '>=', $date_start)->where('event_date', '<=', $date_end)->orWhere('event_date', '>', $date_end)->where("event_title_{$this->locale}",'!=','')->orderBy('event_order', 'ASC')->limit(5)->get();
        //return response()->json($events, 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);        
        if(!empty($events)):foreach($events as $event):
            $json_array[$event->id] =array(
                'id'=>$event->id,
                'name'=>$event->event_title_en,
                'image'=> SITE_URL.'/assets/images/events/main/'.$event->event_main_photo_en,
                'event_date'=> date_format(date_create($event->event_date), 'd M, Y'),
                'content'=>$event->long_desc_en.'<p style= color:inherit; font-szie:inherit><br/><b>Visit Us:</b> <br/>'.$event->visit_us_at_en.'</p>',
                'text'=> strip_tags($event->long_desc_en),
                //''=>array(''=>$event->event_start_time),
            );
        endforeach; endif;
        
        return response()
        ->json($json_array, 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);        
    }
    // End api_Events

}
