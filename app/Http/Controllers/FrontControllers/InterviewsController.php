<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Models\Interviews;
use App\Models\Content;
use View;

//use DB;

class InterviewsController extends Controller {

    public $locale;

    public function __construct(Request $request) {
        $this->locale = get_locale($request->segment(1));
        \App::setLocale($this->locale);
    }
    
    public function index(Request $request) {

        //if chached then return
        //$cached = get_cache_page($request->fullUrl());
        //if (!empty($cached)) {
            //return $cached;
        //}
        
        $content = Content::find(31);

        $data = [
            'content' => $content,
            'interviews' => Interviews::where("status", "1")->orderBy('id','DESC')->orderBy('interview_order','DESC')->paginate(5),
            'meta_title' => $content->meta_title,
            'meta_keyword' => $content->meta_keyword,
            'meta_description' => $content->meta_desc,
            'og_title' => $content->meta_title,
            'og_desc' => $content->meta_desc,
            'og_pic' => $content->image != "" ? url("/") . "/assets/images/banner/" . $content->image : '',
            'locale' => $this->locale,
        ];
        //return $data;
        //check page
        //set_cache_page($request->fullUrl(), view("pages.media-center.index-{$this->locale}", $data)->render());
        if($this->locale == 'en'){ return view("pages.interviews.index-{$this->locale}", $data);}
        else{ return abort(404);}
    }
    
}
