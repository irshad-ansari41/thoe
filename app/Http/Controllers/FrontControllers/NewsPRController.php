<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Press;
use DB;
use View;
use Cache;

class NewsPrController extends Controller {

    public $locale;
    public $countries;

    /**
     * Initializer.
     *
     * @return void
     */
    public function __construct(Request $request) {
        $this->locale = get_locale($request->segment(1));
        \App::setLocale($this->locale);
        $this->countries = Cache::remember('countries', 30, function () {
                    return DB::table('country')->get();
                });
    }

    public function index(Request $request) {

        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            return $cached;
        }
        $content = Content::find(25);

        $sort = !empty($request->sort) && $request->sort == 'old' ? 'asc' : 'desc';

        $query = DB::table('tbl_pressrelease');
        if (!empty($request->from_date) && !empty($request->to_date)) {
            $query->whereBetween('date', [date("Y-m-d", strtotime($request->from_date)), date("Y-m-d", strtotime($request->to_date))]);
        } elseif (!empty($request->from_date)) {
            $query->where('date', '>=', date("Y-m-d", strtotime($request->from_date)));
        } elseif (!empty($request->to_date)) {
            $query->where('date', '<=', date("Y-m-d", strtotime($request->to_date)));
        } elseif (!empty($request->category)) {
            $query->where('category', 'like', "%-$request->category-%");
        }
        if (!empty($request->keyword)) {
            $query->where("title_{$this->locale}", 'like', "%$request->keyword%");
        }
        $query->where("title_{$this->locale}", '!=', "");
        $results = $query->where("status", "1")->orderBy('date', $sort)->orderBy('press_order', 'asc')->paginate(10);

        $meta_title = metaTitleByLocale($this->locale, ['en' => $content->title_en, 'ar' => $content->title_ar, ]);
        $meta_desc = metaDescByLocale($this->locale, ['en' => $content->description_long, 'ar' => $content->description_long_ar, ]);


        $data = [
            'presss' => $results,
            'content' => $content,
            'countries' => $this->countries,
            'cat_count' => $this->count_category_post(),
            'keyword' => !empty($request->keyword) ? $request->keyword : '',
            'sort' => !empty($request->sort) ? $request->sort : '',
            'from_date' => !empty($request->from_date) ? $request->from_date : '',
            'to_date' => !empty($request->to_date) ? $request->to_date : '',
            'meta_title' => $meta_title,
            'meta_keyword' => 'real estate news, press release, thoe developments news, thoe developments',
            'meta_description' => $meta_desc,
            'og_title' => $meta_title,
            'og_desc' => $meta_desc,
            'og_pic' => !empty($content->image) ? url("/") . "/assets/images/banner/" . $content->image : '',
            'locale' => $this->locale,
        ];

        //check page
        set_cache_page($request->fullUrl(), View("pages.pr.index-{$this->locale}", $data)->render());

        return View("pages.pr.index-{$this->locale}", $data);
    }

    public function details(Request $request, $slug) {
        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            return $cached;
        }

        $pr = DB::table('tbl_pressrelease')->where('slug', $slug)->first();
        if (empty($pr)) {
            return redirect("$this->locale/news-pr", 301);
        }

        if ($this->locale == 'ar' && empty($pr->title_ar)) {
            return redirect(url("{$this->locale}/news-pr"));
        }

        $content = Content::find(25);
        $coverage = DB::table('tbl_newscoverage')->where('news_pr_id', $pr->id)->get();

        $meta_title = metaTitleByLocale($this->locale, ['en' => $pr->title_en, 'ar' => $pr->title_ar, ]);
        $meta_desc = metaDescByLocale($this->locale, ['en' => $pr->description_long_en, 'ar' => $pr->description_long_ar, ]);

        $data = [
            'press' => (array) $pr,
            'content' => $content,
            'countries' => $this->countries,
            'meta_title' => $meta_title,
            'meta_keyword' => 'real estate news, press release, thoe developments news, thoe developments',
            'meta_description' => $meta_desc,
            'og_title' => $meta_title,
            'og_desc' => $meta_desc,
            'og_pic' => !empty($content->image) ? url("/") . "/assets/images/pressrelease/" . $pr->image : '',
            'banner' => $content->image,
            'locale' => $this->locale,
            'coverage' => $coverage,
            'cat_count' => $this->count_category_post(),
        ];

        //check page
        set_cache_page($request->fullUrl(), View("pages.pr.details-{$this->locale}", $data)->render());

        return view("pages.pr.details-{$this->locale}", $data);
    }

    public function count_category_post() {
        $result = [];
        $categories = DB::table('tbl_press_categories')->get();
        foreach ($categories as $category) {
            $category->count = DB::table('tbl_pressrelease')->where('category', 'like', "%-$category->id-%")->count();
            $result[] = $category;
        }
        return $result;
    }

}
