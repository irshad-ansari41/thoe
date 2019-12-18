<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Feature;
use View;

class FeatureController extends Controller {

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

        $features = Feature::all()->toArray();

        $data = [
            'features' => $features,
            'meta_title' => '',
            'meta_keyword' => '',
            'meta_description' => '',
            'og_title' => '',
            'og_desc' => '',
            'og_pic' => '',
            'locale' => $this->locale,
        ];

        //check page
        set_cache_page($request->fullUrl(), View("pages.feature.index-{$this->locale}", $data)->render());

        return view("pages.feature.index-{$this->locale}", $data);
    }

    public function details(Request $request, $slug) {

        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            return $cached;
        }
        $feature = Feature::where("slug", $slug)->where("title", '!=', '')->first();
        if (empty($feature)) {
            return redirect("$this->locale/features", 301);
        }

        $features = Feature::where('id', '!=', $feature->id)->orderBy('created_at', 'desc')->limit(5)->get()->toArray();

        $data = [
            'feature' => $feature,
            'features' => $features,
            'meta_title' => '',
            'meta_keyword' => '',
            'meta_description' => '',
            'og_title' => '',
            'og_desc' => '',
            'og_pic' => '',
            'locale' => $this->locale,
        ];

        //check page
        set_cache_page($request->fullUrl(), View("pages.feature.details-{$this->locale}", $data)->render());

        return view("pages.feature.details-{$this->locale}", $data);
    }

}
