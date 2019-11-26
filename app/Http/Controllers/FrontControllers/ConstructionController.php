<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use App\Banner;
use App\Models\Project;
use App\Models\Properties;
use DB;

class ConstructionController extends Controller {

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

        $content = Content::find(13);
        $projects = Project::where("status", "1")->where("cons_status", "Yes")->orderBy('project_order', 'ASC')->paginate(6);
        $meta_title = metaTitleByLocale($this->locale, [
            'en' => "The Heart of Europe Construction Updates – Dubai Region",
            'ar' => "The Heart of Europe Construction Updates – Dubai Region, AR",]);
        $meta_desc = metaDescByLocale($this->locale, [
            'en' => "View latest construction updates and news of all projects that are currently being developed by The Heart of Europe.",
            'ar' => "View latest construction updates and news of all projects that are currently being developed by The Heart of Europe. AR",]);
        $data = [
            'construction_content' => $content,
            'projects' => $projects,
            'meta_title' => $meta_title,
            'meta_keyword' => "THOE developments, thoedevelopments, thoe development construction",
            'meta_description' => $meta_desc,
            'og_title' => $meta_title,
            'og_desc' => $meta_desc,
            'og_pic' => ($content->image != "") ? url("/") . "/assets/images/banner/" . $content->image : '',
            'locale' => $this->locale,
        ];

        //check page
        set_cache_page($request->fullUrl(), view("pages.construction.index-{$this->locale}", $data)->render());

        return view("pages.construction.index-{$this->locale}", $data);
    }

    public function properties(Request $request, $project_slug) {


        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            return $cached;
        }
        $project = Project::where("slug", $project_slug)->first();
        $properties = Properties::where('project_id', $project->id)->where('status', '1')->orderBy("id", "ASC")->paginate(6);
        if (empty(count($properties))) {
            return redirect("$this->locale/construction-updates", 301);
        }

        $meta_title = metaTitleByLocale($this->locale, [
            'en' => trim($project->title_en) . " Projects Construction Updates – The Heart of Europe",
            'ar' => trim($project->title_ar) . " Projects Construction Updates – The Heart of Europe",]);

        $meta_desc = metaDescByLocale($this->locale, [
            'en' => "Last Updated on " . date('M d,Y') . " – View latest construction updates of all " . trim($project->title_en) . " projects that are currently being developed by The Heart of Europe",
            'ar' => "Last Updated on " . date('M d,Y') . " – View latest construction updates of all " . trim($project->title_ar) . " projects that are currently being developed by The Heart of Europe",
        ]);


        $data = [
            'project' => $project,
            'properties' => $properties,
            'meta_title' => $meta_title,
            'meta_keyword' => trim($project->title_en) . " construction update, thoe " . trim($project->title_en) . ", thoe developments " . trim($project->title_en),
            'meta_description' => $meta_desc,
            'og_title' => $meta_title,
            'og_desc' => $meta_desc,
            'og_pic' => ($project->image != "") ? url("/") . "/assets/images/banner/" . $project->image : '',
            'locale' => $this->locale,
        ];

        //check page
        set_cache_page($request->fullUrl(), view("pages.construction.properties-{$this->locale}", $data)->render());

        return view("pages.construction.properties-{$this->locale}", $data);
    }

    public function property(Request $request, $project_slug, $property_slug) {

        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            return $cached;
        }
        $property = Properties::where('slug', $property_slug)->where('status', '1')->first();
        if (empty($property)) {
            return redirect("$this->locale/construction-updates/$project_slug", 301);
        }

        $project = Project::where('slug', $project_slug)->where('status', '1')->orderBy("id", "ASC")->first();
        if (empty($project)) {
            return redirect("$this->locale/construction-updates", 301);
        }

        $galleries = DB::table('tbl_construction_gallery')->where('property_id', $property->id)->where('status', '1')->orderBy("created", "DESC")->orderBy("id", "DESC")->limit(5)->get();

        $og_pic = '';
        if (!empty($property->construction_header)) {
            $og_pic = url("/") . "/assets/images/properties/" . $project->gallery_location . "/" . $property->gallery_location . "/" . $property->construction_header;
        }

        $meta_title = metaTitleByLocale($this->locale, [
            'en' => "$property->title_en, $project->title_en Construction Updates – The Heart of Europe",
            'ar' => "$property->title_ar, $project->title_ar Construction Updates – The Heart of Europe|",]);
        $meta_desc = metaDescByLocale($this->locale, [
            'en' => "Last Updated on " . date('M d,Y') . " – View latest construction updates of {$property->title_en} project in {$project->title_en} which is under construction by THOE Development",
            'ar' => "Last Updated on " . date('M d,Y') . " – View latest construction updates of {$property->title_ar} project in {$project->title_ar} which is under construction by THOE Development",]);



        $data = [
            'himage' => '',
            'abc' => $request->segment(2),
            'property' => $property,
            'project' => $project,
            'galleries' => $galleries,
            'meta_title' => $meta_title,
            'meta_keyword' => "{$property->title_en}, {$property->title_en} {$project->title_en}, {$property->title_en} thoe developments",
            'meta_description' => $meta_desc,
            'og_title' => $meta_title,
            'og_desc' => $meta_desc,
            'og_pic' => $og_pic,
            'locale' => $this->locale,
        ];

        //check page
        set_cache_page($request->fullUrl(), view("pages.construction.property-{$this->locale}", $data)->render());

        return view("pages.construction.property-{$this->locale}", $data);
    }

    public function constructiondownload() {
        return abort(404);
    }

}
