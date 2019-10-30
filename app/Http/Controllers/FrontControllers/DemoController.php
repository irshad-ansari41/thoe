<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Banner;
use App\FeatureBanner;
use App\Models\Content;
use App\Models\Event;
use View;

class DemoController extends Controller {

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


        $content = Content::find(27);

        $data = [
            'sliders' => Banner::where('status', 1)->orderBy('banner_order', 'ASC')->get(),
            'content' => $content,
            'events' => Event::where('event_date', '>=', date('Y-m-d'))->where('status', '1', date('Y-m-d'))->where("event_title_{$this->locale}",'!=','')->orderBy('event_order', 'asc')->paginate(5),
            'bannersliders' => FeatureBanner::where("status", "1")->orderBy('banner_order', 'asc')->get(),
            'meta_title' => $content->meta_title,
            'meta_keyword' => $content->meta_keyword,
            'meta_description' => $content->meta_desc,
            'og_title' => $content->meta_title,
            'og_desc' => $content->meta_desc,
            'og_pic' => $content->banner_image != "" ? url("/") . "/assets/images/about/" . $content->banner_image : '',
            'locale' => $this->locale,
        ];
        if(!empty($_GET['test'])  && $_GET['test']){ return view("pages.home.expriments-{$this->locale}", $data);}
    }

}
