<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Event;
use View;

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
            return $cached;
        }

        $content = Content::find(16);

        $keyword = $sort = "";
        $date_start = date('Y-m-d');
        $date_end = date('Y-m-d', strtotime('+1 days'));
        $events = Event::where("status", "1")->where('event_date', '>=', $date_start)->where('event_date', '<=', $date_end)->orWhere('event_date', '>', $date_end)->where("event_title_{$this->locale}", '!=', '')->orderBy('event_order', 'ASC')->paginate(5);

        $data = [
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
        ];

        //check page
        set_cache_page($request->fullUrl(), View("pages.event.index-{$this->locale}", $data)->render());

        return view("pages.event.index-{$this->locale}", $data);
    }

    public function details(Request $request, $slug) {

        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            return $cached;
        }
        $event = Event::where("slug_{$this->locale}", $slug)->where("event_title_{$this->locale}", '!=', '')->first();
        if (empty($event)) {
            return redirect("$this->locale/events", 301);
        }
        $data = [
            'event' => $event,
            'meta_title' => $event->event_title_en . " | The Heart of Europe Event",
            'meta_keyword' => $event->event_title_en . ", Upcoming Events, Events in UAE, Property Developer Events",
            'meta_description' => $event->extra_des_en,
            'og_title' => $event->event_title_en . " | The Heart of Europe Event",
            'og_desc' => $event->extra_desc,
            'og_pic' => $event['event_main_photo_' . $this->locale] != "" ? url("/") . '/assets/images/events/main/' . $event['event_main_photo_' . $this->locale] : '',
            'locale' => $this->locale,
        ];

        //check page
        set_cache_page($request->fullUrl(), View("pages.event.details-{$this->locale}", $data)->render());

        return view("pages.event.details-{$this->locale}", $data);
    }

}
