<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use DB;
use View;

class MediaGalleryController extends Controller {

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
            return $cached;
        }

        $content = Content::find(34)->toArray();
        ;

        $query = DB::table('tbl_image_gallery_master as t1');
        $query->leftjoin('tbl_image_gallery as t2', 't2.gallery_id', '=', 't1.id');
        $query->select('t1.*', DB::raw('group_concat(t2.image) as images'));
        $image_galleries = $query->where("t1.status", "1")->groupBy("t2.gallery_id")->orderBy("t1.ordering", "asc")->paginate(1);

        $video_galleries = DB::table('tbl_video_gallery_master')->where("status", "1")->orderBy("created", "desc")->paginate(1);

        $data = [
            'content' => $content,
            'image_galleries' => $image_galleries,
            'video_galleries' => $video_galleries,
            'meta_title' => $content['meta_title'],
            'meta_keyword' => $content['meta_keyword'],
            'meta_description' => $content['meta_desc'],
            'og_title' => $content['meta_title'],
            'og_desc' => $content['meta_desc'],
            'og_pic' => $content['image'] != "" ? url("/") . "/assets/images/banner/" . $content['image'] : '',
            'locale' => $this->locale,
        ];

        //check page
        set_cache_page($request->fullUrl(), view("pages.media-gallery.index-{$this->locale}", $data)->render());

        return view("pages.media-gallery.index-{$this->locale}", $data);
    }

    public function image_galleries(Request $request) {

        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            return $cached;
        }

        $content = Content::find(18)->toArray();

        $query = DB::table('tbl_image_gallery_master as t1');
        $query->leftjoin('tbl_image_gallery as t2', 't2.gallery_id', '=', 't1.id');
        $query->select('t1.*', DB::raw('group_concat(t2.image) as images'));
        $image_galleries = $query->where("t1.status", "1")->groupBy("t2.gallery_id")->orderBy("t1.ordering", "asc")->paginate(1);

        $data = [
            'content' => $content,
            'image_galleries' => $image_galleries,
            'meta_title' => $content['meta_title'],
            'meta_keyword' => $content['meta_keyword'],
            'meta_description' => $content['meta_desc'],
            'og_title' => $content['meta_title'],
            'og_desc' => $content['meta_desc'],
            'og_pic' => $content['image'] != "" ? url("/") . "/assets/images/banner/" . $content['image'] : '',
            'locale' => $this->locale,
        ];

        //check page
        set_cache_page($request->fullUrl(), view("pages.media-gallery.image-galleries-{$this->locale}", $data)->render());

        return view("pages.media-gallery.image-galleries-{$this->locale}", $data);
    }

    public function video_galleries(Request $request) {

        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            return $cached;
        }

        $content = Content::find(19)->toArray();

        $video_galleries = DB::table('tbl_video_gallery_master')->where("status", "1")->orderBy("created", "desc")->paginate(1);

        $data = [
            'content' => $content,
            'video_galleries' => $video_galleries,
            'meta_title' => $content['meta_title'],
            'meta_keyword' => $content['meta_keyword'],
            'meta_description' => $content['meta_desc'],
            'og_title' => $content['meta_title'],
            'og_desc' => $content['meta_desc'],
            'og_pic' => $content['image'] != "" ? url("/") . "/assets/images/banner/" . $content['image'] : '',
            'locale' => $this->locale,
        ];

        //check page
        set_cache_page($request->fullUrl(), view("pages.media-gallery.video-galleries-{$this->locale}", $data)->render());

        return view("pages.media-gallery.video-galleries-{$this->locale}", $data);
    }

    public function image_gallery(Request $request, $gallery_slug) {

        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            return $cached;
        }

        $gallery = DB::table('tbl_image_gallery_master')->where("slug", $gallery_slug)->first();
        $images = DB::table('tbl_image_gallery')->where("gallery_id", $gallery->id)->get()->toArray();

        $data = [
            'gallery' => (array) $gallery,
            'images' => $images,
            'meta_title' => $gallery->meta_title,
            'meta_keyword' => $gallery->meta_keyword,
            'meta_description' => $gallery->meta_desc,
            'og_title' => $gallery->meta_title,
            'og_desc' => $gallery->meta_desc,
            'og_pic' => $gallery->holder_image != "" ? url("/") . "/assets/images/media/{$gallery->slug}/" . $gallery->holder_image : '',
            'locale' => $this->locale,
        ];


        //check page
        set_cache_page($request->fullUrl(), view("pages.media-gallery.image-gallery-{$this->locale}", $data)->render());

        return view("pages.media-gallery.image-gallery-{$this->locale}", $data);
    }

    public function video_gallery(Request $request, $gallery_slug) {


        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            return $cached;
        }

        $query = DB::table('tbl_video_gallery_master as t1');
        $query->leftjoin('tbl_video_gallery as t2', 't2.gallery_id', '=', 't1.id');
        $query->select('t1.*', DB::raw('group_concat(t2.image) as videos'));
        $query->where("t1.slug", $gallery_slug);
        $gallery = $query->where("t1.status", "1")->groupBy("t2.gallery_id")->orderBy("t1.ordering", "asc")->first();

        $data = [
            'gallery' => (array) $gallery,
            'meta_title' => $gallery->meta_title,
            'meta_keyword' => $gallery->meta_keyword,
            'meta_description' => $gallery->meta_desc,
            'og_title' => $gallery->meta_title,
            'og_desc' => $gallery->meta_desc,
            'og_pic' => $gallery->holder_image != "" ? url("/") . "/assets/images/media/{$gallery->slug}/" . $gallery->holder_image : '',
            'locale' => $this->locale,
        ];


        //check page
        set_cache_page($request->fullUrl(), view("pages.media-gallery.video-gallery-{$this->locale}", $data)->render());

        return view("pages.media-gallery.video-gallery-{$this->locale}", $data);
    }

}
