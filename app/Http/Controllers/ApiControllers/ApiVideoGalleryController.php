<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use DB;
use Response;

class ApiVideoGalleryController extends Controller {

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

    public function videos(Request $request) {

        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            return $cached;
        }
        $gallery = [];
        $types = DB::table('tbl_video_gallery_master')->select('gallery_type')->groupBy("gallery_type")->get();
        foreach ($types as $type) {
            $title = $type->gallery_type == '1' ? 'Corporate' : ($type->gallery_type == '2' ? 'Commercial' : ($type->gallery_type == 3 ? 'Events' : ''));
            $galleries = DB::table('tbl_video_gallery_master')->where("gallery_type", $type->gallery_type)->where("status", "1")->orderBy("created", "desc")->get();
            foreach ($galleries as $value) {
                $gallery[$title][$value->id] = [
                    'id' => $value->id,
                    'name' => trim($value->gallery_title),
                    'info' => trim($value->gallery_title),
                    'category' => $title,
                    'video' => str_replace("https://www.youtube.com/watch?v=", 'https://www.youtube.com/embed/', trim($value->image)),
                    'video_id' => str_replace("https://www.youtube.com/watch?v=", '', trim($value->image)),
                ];
            }
        }
        set_cache_page($request->fullUrl(), Response::json($gallery), 60);
        return Response::json($gallery);
    }

}
