<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Media;
use DB;

class PageController extends Controller {

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

    public function thankYou(Request $request) {

        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            //return $cached;
        }
        $content = Content::find(29);

        $data = [
            'content' => $content,
            'meta_title' => "thank-you",
            'meta_keyword' => "thank-you",
            'meta_description' => "thank-you",
            'og_title' => "thank-you",
            'og_desc' => "thank-you",
            'og_pic' => $content->image != "" ? url("/") . "/assets/images/banner/" . $content->image : '',
            'locale' => $this->locale,
        ];

        //check page
        set_cache_page($request->fullUrl(), View("pages.thank-you", $data)->render());

        return View('pages.thank-you', $data);
    }

    public function privacy(Request $request) {
        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            //return $cached;
        }
        $content = Content::find(30);

        $data = [
            "AllRatings" => DB::table('tbl_ratings')->where('menu_title','Privacy Policy')->where('menu_id',15)->first(),
            'content' => $content,
            'meta_title' => $content->meta_title,
            'meta_keyword' => $content->meta_keyword,
            'meta_description' => $content->meta_desc,
            'og_title' => $content->meta_title,
            'og_desc' => $content->meta_desc,
            'og_pic' => $content->image != "" ? url("/") . "/assets/images/banner/" . $content->image : '',
            'locale' => $this->locale,
        ];

        //check page
        set_cache_page($request->fullUrl(), View("pages.privacy", $data)->render());

        return View('pages.privacy', $data);
    }

    public function terms(Request $request) {
        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            //return $cached;
        }
        $content = Content::find(30);

        $data = [
            'content' => $content,
            'meta_title' => $content->meta_title,
            'meta_keyword' => $content->meta_keyword,
            'meta_description' => $content->meta_desc,
            'og_title' => $content->meta_title,
            'og_desc' => $content->meta_desc,
            'og_pic' => $content->image != "" ? url("/") . "/assets/images/banner/" . $content->image : '',
            'locale' => $this->locale,
        ];


        //check page
        set_cache_page($request->fullUrl(), View("pages.terms", $data)->render());

        //return View('pages.terms', $data);
        return abort(404);
    }

    public function mediacenter(Request $request) {

        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            //return $cached;
        }

        $content = Content::find(26);
        $data = [
            "AllRatings" => DB::table('tbl_ratings')->where('menu_title','Media Centre')->where('menu_id',7)->first(),
            'content' => $content,
            'medias' => Media::where("status", "1")->get(),
            'meta_title' => $content->meta_title,
            'meta_keyword' => $content->meta_keyword,
            'meta_description' => $content->meta_desc,
            'og_title' => $content->meta_title,
            'og_desc' => $content->meta_desc,
            'og_pic' => $content->image != "" ? url("/") . "/assets/images/banner/" . $content->image : '',
            'locale' => $this->locale,
        ];

        //check page
        set_cache_page($request->fullUrl(), View("pages.media-center.index-{$this->locale}", $data)->render());

        return View("pages.media-center.index-{$this->locale}", $data);
    }

    public function careersAtAzizi(Request $request) {
        return abort(404);
        /*
          //if chached then return
          $cached = get_cache_page($request->fullUrl());
          if (!empty($cached)) {
          //return $cached;
          }

          $content = Content::find(20);

          $data = [
          'content' => $content,
          'meta_title' => $content->meta_title,
          'meta_keyword' => $content->meta_keyword,
          'meta_description' => $content->meta_desc,
          'og_title' => $content->meta_title,
          'og_desc' => $content->meta_desc,
          'og_pic' => $content->image != "" ? url("/") . "/assets/images/banner/" . $content->image : '',
          'locale' => $this->locale,
          ];

          return abort(404);
          //check page
          //set_cache_page($request->fullUrl(), View("pages.careers-at-azizi", $data)->render());
          //return View('pages.careers-at-azizi', $data);
         */
    }

}
