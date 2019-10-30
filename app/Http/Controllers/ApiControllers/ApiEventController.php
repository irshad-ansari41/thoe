<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Response;

class ApiEventController extends Controller {

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

    public function events(Request $request) {
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            return $cached;
        }
        $json_array = [];
        $date_start = date('Y-m-d');
        $date_end = date('Y-m-d', strtotime('+1 days'));
        $events = Event::where("status", "1")->where('event_date', '>=', $date_start)->where('event_date', '<=', $date_end)->orWhere('event_date', '>', $date_end)->where("event_title_{$this->locale}", '!=', '')->orderBy('event_order', 'ASC')->limit(5)->get();
        if (!empty($events)) {
            foreach ($events as $event) {
                $json_array[$event->id] = array(
                    'id' => $event->id,
                    'name' => $event->event_title_en,
                    'image' => SITE_URL.'/assets/images/events/main/' . $event->event_main_photo_en,
                    'event_date' => date_format(date_create($event->event_date), 'd M, Y'),
                    'content' => $event->long_desc_en . '<p style= color:inherit; font-szie:inherit><br/><b>Visit Us:</b> <br/>' . $event->visit_us_at_en . '</p>',
                    'text' => strip_tags($event->long_desc_en),
                        //''=>array(''=>$event->event_start_time),
                );
            }
        }
        set_cache_page($request->fullUrl(), Response::json($json_array));
        return Response::json($json_array);
    }

    // End api_Events
}
