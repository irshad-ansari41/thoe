<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use App\About;
use DB;

class AboutController extends Controller {

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

    public function about_thoe(Request $request) {

        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            return $cached;
        }
        $content = About::find(1);
        $data = [
            'about' => $content,
            'meta_title' => '',
            'meta_keyword' => '',
            'meta_description' => '',
            'og_title' => '',
            'og_desc' => '',
            'og_pic' => '',
            'locale' => $this->locale,
        ];
        //check page
        set_cache_page($request->fullUrl(), view("pages.about.about-thoe-{$this->locale}", $data)->render());

        return view("pages.about.about-thoe-{$this->locale}", $data);
    }

    public function about_the_world(Request $request) {

        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            return $cached;
        }
        $content = About::find(2);
        $data = [
            'about' => $content,
            'meta_title' => '',
            'meta_keyword' => '',
            'meta_description' => '',
            'og_title' => '',
            'og_desc' => '',
            'og_pic' => '',
            'locale' => $this->locale,
        ];
        //check page
        set_cache_page($request->fullUrl(), view("pages.about.about-the-world-{$this->locale}", $data)->render());

        return view("pages.about.about-the-world-{$this->locale}", $data);
    }

    public function about_developer(Request $request) {

        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            return $cached;
        }
        $content = About::find(3);
        $data = [
            'about' => $content,
            'meta_title' => '',
            'meta_keyword' => '',
            'meta_description' => '',
            'og_title' => '',
            'og_desc' => '',
            'og_pic' => '',
            'locale' => $this->locale,
        ];
        //check page
        set_cache_page($request->fullUrl(), view("pages.about.about-developer-{$this->locale}", $data)->render());

        return view("pages.about.about-developer-{$this->locale}", $data);
    }

    public function chairmans_message(Request $request) {

        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            return $cached;
        }
        $content = About::find(4);
        $data = [
            'about' => $content,
            'meta_title' => '',
            'meta_keyword' => '',
            'meta_description' => '',
            'og_title' => '',
            'og_desc' => '',
            'og_pic' => '',
            'locale' => $this->locale,
        ];
        //check page
        set_cache_page($request->fullUrl(), view("pages.about.chairmans-message-{$this->locale}", $data)->render());

        return view("pages.about.chairmans-message-{$this->locale}", $data);
    }

    public function management_team(Request $request) {

        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            return $cached;
        }
        $content = About::find(5);
        $data = [
            'about' => $content,
            'meta_title' => '',
            'meta_keyword' => '',
            'meta_description' => '',
            'og_title' => '',
            'og_desc' => '',
            'og_pic' => '',
            'locale' => $this->locale,
        ];
        //check page
        set_cache_page($request->fullUrl(), view("pages.about.management-team-{$this->locale}", $data)->render());

        return view("pages.about.management-team-{$this->locale}", $data);
    }

    public function awards(Request $request) {

        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            return $cached;
        }
        $content = About::find(6);
        $data = [
            'about' => $content,
            'meta_title' => '',
            'meta_keyword' => '',
            'meta_description' => '',
            'og_title' => '',
            'og_desc' => '',
            'og_pic' => '',
            'locale' => $this->locale,
        ];
        //check page
        set_cache_page($request->fullUrl(), view("pages.about.awards-{$this->locale}", $data)->render());

        return view("pages.about.awards-{$this->locale}", $data);
    }

}
