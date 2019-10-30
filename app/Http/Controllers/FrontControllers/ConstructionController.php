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
            //return $cached;
        }

        $content = Content::find(13);

        $og_pic = ($content->image != "") ? url("/") . "/assets/images/banner/" . $content->image : '';
        $projects = Project::where("status", "1")->where("cons_status", "Yes")->orderBy('project_order', 'ASC')->get();

        $meta_title = metaTitleByLocale($this->locale, [
            'en' => "Azizi Developments Construction Updates – Dubai Region",
            'ar' => "Azizi Developments Construction Updates – Dubai Region, AR",
            'cn' => "Azizi Developments Construction Updates – Dubai Region, CN"]);
        $meta_desc = metaDescByLocale($this->locale, [
            'en' => "View latest construction updates and news of all projects that are currently being developed by Azizi Developments.",
            'ar' => "View latest construction updates and news of all projects that are currently being developed by Azizi Developments. AR",
            'cn' => "View latest construction updates and news of all projects that are currently being developed by Azizi Developments. CN",]);


        $data = [
            "AllRatings" => DB::table('tbl_ratings')->where('menu_id',36)->first(),
            'himage' => '',
            'abc' => $request->segment(2),
            'construction_content' => $content,
            'projects' => $projects,
            'meta_title' => $meta_title,
            'meta_keyword' => "Azizi developments, azizidevelopments, azizi development construction",
            'meta_description' => $meta_desc,
            'og_title' => $meta_title,
            'og_desc' => $meta_desc,
            'og_pic' => $og_pic,
            'locale' => $this->locale,
        ];



        //check page
        set_cache_page($request->fullUrl(), view("pages.construction.index", $data)->render());

        return view('pages.construction.index', $data);
    }

    public function community(Request $request) {

        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            //return $cached;
        }

        $content = Content::find(13);

        $meta_title = metaTitleByLocale($this->locale, [
            'en' => trim($content->title_en) . " Meydan Projects Construction Updates – Azizi Developments",
            'ar' => trim($content->title_ar) . " Meydan Projects Construction Updates – Azizi Developments",
            'cn' => trim($content->title_ch) . " Meydan Projects Construction Updates – Azizi Developments"]);
        $meta_desc = metaDescByLocale($this->locale, [
            'en' => "Last Updated on " . date('M d,Y') . " – View latest construction updates of all " . trim($content->title_en) . " Meydan projects that are currently being developed by Azizi Developments",
            'ar' => "Last Updated on " . date('M d,Y') . " – View latest construction updates of all " . trim($content->title_ar) . " Meydan projects that are currently being developed by Azizi Developments",
            'cn' => "Last Updated on " . date('M d,Y') . " – View latest construction updates of all " . trim($content->title_ch) . " Meydan projects that are currently being developed by Azizi Developments",]);


        $data = [
            'himage' => '',
            'abc' => $request->segment(2),
            'construction_content' => $content,
            'projects' => Project::where("status", "1")->where("cons_status", "Yes")->orderBy('project_order', 'ASC')->get(),
            'meta_title' => $meta_title,
            'meta_keyword' => trim($content->title_en) . " Meydan construction update, azizi Meydan" . trim($content->title_en) . ", azizi developments Meydan" . trim($content->title_en),
            'meta_description' => $meta_desc,
            'og_title' => $meta_title,
            'og_desc' => $meta_desc,
            'og_pic' => ($content->image != "") ? url("/") . "/assets/images/banner/" . $content->image : '',
            'locale' => $this->locale,
        ];

        //check page
        set_cache_page($request->fullUrl(), view("pages.construction.community", $data)->render());

        return view('pages.construction.community', $data);
    }

    public function projects(Request $request, $area) {


        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            //return $cached;
        }

        $project = Project::where('slug', $area)->where('status', '1')->orderBy("id", "ASC")->first();
        if (empty($project)) {
            return redirect("$this->locale/dubai/construction-updates", 301);
        }

        $meta_title = metaTitleByLocale($this->locale, [
            'en' => trim($project->title_en) . " Projects Construction Updates – Azizi Developments",
            'ar' => trim($project->title_ar) . " Projects Construction Updates – Azizi Developments",
            'cn' => trim($project->title_ch) . " Projects Construction Updates – Azizi Developments"]);
        $meta_desc = metaDescByLocale($this->locale, [
            'en' => "Last Updated on " . date('M d,Y') . " – View latest construction updates of all " . trim($project->title_en) . " projects that are currently being developed by Azizi Developments",
            'ar' => "Last Updated on " . date('M d,Y') . " – View latest construction updates of all " . trim($project->title_ar) . " projects that are currently being developed by Azizi Developments",
            'cn' => "Last Updated on " . date('M d,Y') . " – View latest construction updates of all " . trim($project->title_ch) . " projects that are currently being developed by Azizi Developments",]);

        $ratingpage;
        if($project->title_en == 'Dubai Sports City'): $ratingpage = 'Sports City'; else: $ratingpage = $project->title_en; endif;

        $data = [
            "AllRatings" => DB::table('tbl_ratings')->where('menu_title',$ratingpage)->first(),
            'himage' => '',
            'abc' => $request->segment(2),
            'project' => $project,
            'properties' => Properties::where("project_id", $project->id)->where("status", "1")->where("constrution_show", "Yes")->orderBy('sort_order', 'ASC')->get(),
            'area' => $area,
            'meta_title' => $meta_title,
            'meta_keyword' => trim($project->title_en) . " construction update, azizi " . trim($project->title_en) . ", azizi developments " . trim($project->title_en),
            'meta_description' => $meta_desc,
            'og_title' => $meta_title,
            'og_desc' => $meta_desc,
            'og_pic' => ($project->image != "") ? url("/") . "/assets/images/banner/" . $project->image : '',
            'locale' => $this->locale,
        ];



        //check page
        set_cache_page($request->fullUrl(), view("pages.construction.projects", $data)->render());

        return view('pages.construction.projects', $data);
    }

    public function property(Request $request, $area, $propertySLug) {

        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            //return $cached;
        }
        $galleries = [];
        $property = Properties::where('slug', $propertySLug)->where('constrution_show', 'Yes')->where('status', '1')->first();
        if (empty($property)) {
            return redirect("$this->locale/dubai/$area/construction-updates", 301);
        }
        $project = Project::where('slug', $area)->where('status', '1')->orderBy("id", "ASC")->first();
        if (empty($project)) {
            return redirect("$this->locale/dubai/$area/construction-updates", 301);
        }
        if ($area == 'riviera') {
            $month = date("m", strtotime("-1 months"));
            $counts = DB::table('tbl_construction_gallery')->where('property_id', $property->id)->where('status', '1')->whereYear('caption_date','=',date('Y'))->whereMonth('caption_date','=',date('m'))->count(); 
            if($counts == 0){ $counts = DB::table('tbl_construction_gallery')->where('property_id', $property->id)->where('status', '1')->whereYear('caption_date','=',date('Y'))->whereMonth('caption_date','=',$month)->count(); }
            $galleries = DB::table('tbl_construction_gallery')->where('property_id', $property->id)
            ->where('status', '1')->orderBy("id", "DESC")->limit($counts)->get();
        } else {
            $galleries = DB::table('tbl_construction_gallery')->where('property_id', $property->id)
                            ->where('status', '1')->orderBy("created", "DESC")->orderBy("id", "DESC")->limit(5)->get();
        }

        $og_pic = '';
        if (!empty($property->construction_header)) {
            $og_pic = url("/") . "/assets/images/properties/" . $project->gallery_location . "/" . $property->gallery_location . "/" . $property->construction_header;
        }

        $meta_title = metaTitleByLocale($this->locale, [
            'en' => "$property->title_en, $project->title_en Construction Updates – Azizi Developments",
            'ar' => "$property->title_ar, $project->title_ar Construction Updates – Azizi Developments|",
            'cn' => "$property->title_ch, $project->title_ch Construction Updates – Azizi Developments"]);
        $meta_desc = metaDescByLocale($this->locale, [
            'en' => "Last Updated on " . date('M d,Y') . " – View latest construction updates of {$property->title_en} project in {$project->title_en} which is under construction by Azizi Development",
            'ar' => "Last Updated on " . date('M d,Y') . " – View latest construction updates of {$property->title_ar} project in {$project->title_ar} which is under construction by Azizi Development",
            'cn' => "Last Updated on " . date('M d,Y') . " – View latest construction updates of {$property->title_ch} project in {$project->title_ch} which is under construction by Azizi Development",]);



        $data = [
            'himage' => '',
            'abc' => $request->segment(2),
            'property' => $property,
            'project' => $project,
            'galleries' => $galleries,
            'area' => $area,
            'meta_title' => $meta_title,
            'meta_keyword' => "{$property->title_en}, {$property->title_en} {$project->title_en}, {$property->title_en} azizi developments",
            'meta_description' => $meta_desc,
            'og_title' => $meta_title,
            'og_desc' => $meta_desc,
            'og_pic' => $og_pic,
            'locale' => $this->locale,
        ];

        //check page
        set_cache_page($request->fullUrl(), view("pages.construction.details", $data)->render());
        
        if(!empty($_GET['test']) && $_GET['test']==1){ 
            return view('pages.construction.details-up', $data);
        }
        return view('pages.construction.details', $data);
    }

    public function constructiondownload() {
        return abort(404);
    }

}
