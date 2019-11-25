<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use DB;
use View;

class VideoGalleryController extends Controller {

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

        $gallery_type = $type == 'corporate' ? 1 : ($type == 'commercial' ? 2 : 3);
        $content = Content::find(19);

        $query = DB::table('tbl_video_gallery_master');
        if (!empty($request->year)) {
            $query->where("year", $request->year);
        }
        $galleries = $query->where("gallery_type", $gallery_type)->where("status", "1")->orderBy("created", "desc")->get();
        $years = DB::table('tbl_video_gallery_master')->select('year')->groupBy("year")->get();
        $tabs = DB::table('tbl_mediacenter_imagegallery_tabs')->orderBy("ordering", "asc")->get();
        
        if (!empty($id)) {
            foreach ($galleries as $key => $value) {
                if ($value->id == $id || $value->slug == $id) {
                    $gallery = $galleries[$key];
                    $meta_title = metaTitleByLocale($this->locale, ['en' => $gallery->gallery_title, 'ar' => $gallery->gallery_title_ar, ]). ' | ' . $content->meta_title;
                    $meta_desc = metaDescByLocale($this->locale, ['en' => $gallery->gallery_long_title, 'ar' => $gallery->gallery_long_title_ar, ]). ' | ' . $content->meta_title;
                    break;
                }
            }
        } else {
            $gallery = $galleries[0];
            $meta_title = metaTitleByLocale($this->locale, ['en' => $content->short_description_en, 'ar' => $content->short_description_ar, ]) . ' | ' . $content->meta_title . ' | ' . $type;
            $meta_desc = metaDescByLocale($this->locale, ['en' => $content->description_en, 'ar' => $content->description_ar, ]) . ' | ' . $content->meta_title . ' | ' . $type;
        }

        if(empty($gallery)){
            return redirect("$this->locale/video-gallery", 301);
        }
        
        $data = [
            "AllRatings" => DB::table('tbl_ratings')->where('menu_title','Video Gallery')->where('menu_id',31)->first(),
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
        set_cache_page($request->fullUrl(), view("pages.video-gallery", $data)->render());

        return view('pages.video-gallery', $data);
    }
    

}
