<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use DB;
use View;

class ImageGalleryController extends Controller {

    public $ocale;

    /**
     * Initializer.
     *
     * @return void
     */
    public function __construct(Request $request) {
        $this->locale = get_locale($request->segment(1));
        \App::setLocale($this->locale);
    }

    public function index(Request $request, $type = 'corporate', $id = null) {

        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            //return $cached;
        }

        $gallery_type = $type == 'corporate' ? 1 : ($type == 'identity' ? 2 : 3);
        $content = Content::find(18);
        $query = DB::table('tbl_image_gallery_master as t1');
        $query->leftjoin('tbl_image_gallery as t2', 't2.gallery_id', '=', 't1.id');
        $query->select('t1.*', DB::raw('group_concat(t2.image) as images'));
        $query->where("t1.gallery_type", $gallery_type);
        if (!empty($request->year)) {
            $query->where("t1.year", $request->year);
        }
        $galleries = $query->where("t1.status", "1")->groupBy("t2.gallery_id")->orderBy("t1.ordering", "asc")->get();
        $years = DB::table('tbl_image_gallery_master')->select('year')->groupBy("year")->get();
        $tabs = DB::table('tbl_mediacenter_imagegallery_tabs')->orderBy("ordering", "asc")->get();

        if (!empty($id)) {
            foreach ($galleries as $key => $value) {
                if ($value->id == $id || $value->slug == $id) {
                    $gallery = $galleries[$key];
                    $meta_title = metaTitleByLocale($this->locale, ['en' => $gallery->gallery_title, 'ar' => $gallery->gallery_title_ar, 'cn' => $gallery->gallery_title_ch,]). ' | ' . $content->meta_title;
                    $meta_desc = metaDescByLocale($this->locale, ['en' => $gallery->gallery_long_title, 'ar' => $gallery->gallery_long_title_ar, 'cn' => $gallery->gallery_long_title_ch,]). ' | ' . $content->meta_title;
                    break;
                }
            }
        } else {
            $gallery = $galleries[0];
            $meta_title = metaTitleByLocale($this->locale, ['en' => $content->short_description_en, 'ar' => $content->short_description_ar, 'cn' => $content->short_description_ch,]) . ' | ' . $content->meta_title . ' | ' . $type;
            $meta_desc = metaDescByLocale($this->locale, ['en' => $content->description_en, 'ar' => $content->description_ar, 'cn' => $content->description_ch,]) . ' | ' . $content->meta_title . ' | ' . $type;
        }

        $data = [
            "AllRatings" => DB::table('tbl_ratings')->where('menu_title','Image Gallery')->where('menu_id',30)->first(),
            'content' => $content,
            'galleries' => $galleries,
            'gallery' => $gallery,
            'years' => $years,
            'tabs' => $tabs,
            'type' => $type,
            'keyword' => !empty($request->keyword) ? $request->keyword : '',
            'sort' => !empty($request->sort) ? $request->sort : '',
            'from_date' => !empty($request->from_date) ? $request->from_date : '',
            'to_date' => !empty($request->to_date) ? $request->to_date : '',
            'lastyear' => date('Y'),
            'year' => !empty($request->year) ? $request->year : date('Y'),
            'gallery_id' => $id,
            'meta_title' => $meta_title,
            'meta_keyword' => $content->meta_keyword,
            'meta_description' => $meta_desc,
            'og_title' => $meta_title,
            'og_desc' => $meta_desc,
            'og_pic' => $content->image != "" ? url("/") . "/assets/images/banner/" . $content->image : '',
            'locale' => $this->locale,
        ];


        //check page
        set_cache_page($request->fullUrl(), view("pages.image-gallery", $data)->render());

        return view('pages.image-gallery', $data);
    }

}
