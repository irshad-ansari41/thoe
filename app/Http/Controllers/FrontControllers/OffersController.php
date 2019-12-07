<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Models\Offer;
use View;

class OffersController extends Controller {

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

        $content = Offer::find(1)->toArray();
        $data = [
            'offer' => $content,
            'meta_title' => 'The Heart of Europe Offers 2019',
            'meta_keyword' => 'The Heart of Europe Offers  2019',
            'meta_description' => 'The Heart of Europe Offers  2019',
            'og_title' => '',
            'og_desc' => '',
            'og_pic' => '',
            'locale' => $this->locale,
        ];
        //check page

        set_cache_page($request->fullUrl(), View("pages.offer.index-{$this->locale}", $data)->render());

        return View("pages.offer.index-{$this->locale}", $data);
    }

}
