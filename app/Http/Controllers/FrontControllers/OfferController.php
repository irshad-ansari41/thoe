<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Offer;
use DB;
use View;

class OfferController extends Controller {

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


        $query = DB::table('tbl_offers');
        if (!empty($request->category)) {
            $query->where('category', 'like', "%-$request->category-%");
        }
        $offers = $query->paginate(10);

        $latest = DB::table('tbl_offers')->orderBy('created', 'desc')->limit(5)->get();

        $data = [
            'offers' => $offers,
            'latest' => $latest,
            'meta_title' => '',
            'meta_keyword' => '',
            'meta_description' => '',
            'og_title' => '',
            'og_desc' => '',
            'og_pic' => '',
            'locale' => $this->locale,
        ];

        //check page
        set_cache_page($request->fullUrl(), View("pages.offer.index-{$this->locale}", $data)->render());

        return View("pages.offer.index-{$this->locale}", $data);
    }

    public function details(Request $request, $slug) {
        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            return $cached;
        }

        $offer = DB::table('tbl_offers')->where('slug', $slug)->first();
        if (empty($offer)) {
            return redirect("$this->locale/offers", 301);
        }

        if ($this->locale == 'ar' && empty($offer->title_ar)) {
            return redirect(url("{$this->locale}/offers"));
        }

        $latest = DB::table('tbl_offers')->where('id', '!=', $offer->id)->orderBy('created', 'desc')->limit(5)->get()->toArray();

        $data = [
            'offer' => (array) $offer,
            'latest' => $latest,
            'meta_title' => $offer->meta_title,
            'meta_keyword' => $offer->meta_keyword,
            'meta_description' => $offer->meta_desc,
            'og_title' => $offer->meta_title,
            'og_desc' => $offer->meta_desc,
            'og_pic' => !empty($offer->image) ? url("/") . "/assets/images/offer/" . $offer->image : '',
            'banner' => $offer->image,
            'locale' => $this->locale,
        ];

        //check page
        set_cache_page($request->fullUrl(), View("pages.offer.details-{$this->locale}", $data)->render());

        return view("pages.offer.details-{$this->locale}", $data);
    }

    public function count_category_post() {
        $result = [];
        $categories = DB::table('tbl_offer_categories')->get();
        foreach ($categories as $category) {
            $category->count = DB::table('tbl_offers')->where('category', 'like', "%-$category->id-%")->count();
            $result[] = $category;
        }
        return $result;
    }

}
