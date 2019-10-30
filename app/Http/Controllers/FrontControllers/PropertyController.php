<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Project;
use App\Models\Properties;
use DB;
use File;
use Jenssegers\Agent\Agent;
class PropertyController extends Controller {

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
        $agent = new Agent();
        $content = Content::find(15);

        $meta_title = metaTitleByLocale($this->locale, ['en' => $content->short_description_en, 'ar' => $content->short_description_ar, 'cn' => $content->short_description_ch,]);
        $meta_desc = metaDescByLocale($this->locale, ['en' => $content->description_en, 'ar' => $content->description_ar, 'cn' => $content->description_ch,]);
        
        $data = [
            "AllRatings" => DB::table('tbl_ratings')->where('menu_id',19)->first(),
            'agent'=>$agent,
            'Community' =>DB::table('tbl_community_place')->get(),
            'himage' => '',
            'abc' => $request->segment(2),
            'construction_content' => $content,
            'projects' => Project::where("status", "1")->where("project_status", "Yes")->orderBy('project_order', 'ASC')->get(),
            'meta_title' => $meta_title,
            'meta_keyword' => $content->meta_keyword,
            'meta_description' => $meta_desc,
            'og_title' => $meta_title,
            'og_desc' => $meta_desc,
            'og_pic' => ($content->image != "") ? url("/") . "/assets/images/banner/" . $content->image : '',
            'locale' => $this->locale,
        ];

        //check page
        set_cache_page($request->fullUrl(), view("pages.property.index", $data)->render());
        if(!empty($_GET['demo']) && $_GET['demo'] ==1){
            return view('pages.property.devs', $data);
        }
        return view('pages.property.index', $data);
    }

    public function community(Request $request) {

        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            //return $cached;
        }

        $content = Project::where('slug', 'meydan')->where('status', '1')->orderBy("id", "ASC")->first();

        $meta_title = metaTitleByLocale($this->locale, ['en' => $content->short_description_en, 'ar' => $content->short_description_ar, 'cn' => $content->short_description_ch,]);
        $meta_desc = metaDescByLocale($this->locale, ['en' => $content->description_en, 'ar' => $content->description_ar, 'cn' => $content->description_ch,]);


        $data = [
            'himage' => '',
            'abc' => $request->segment(2),
            'content' => $content,
            'projects' => Project::where("status", "1")->where("project_status", "Yes")->orderBy('project_order', 'ASC')->get(),
            'meta_title' => $meta_title,
            'meta_keyword' => $content->meta_keyword,
            'meta_description' => $meta_desc,
            'og_title' => $meta_title,
            'og_desc' => $meta_desc,
            'og_pic' => ($content->image != "") ? url("/") . "/assets/images/banner/" . $content->image : '',
            'locale' => $this->locale,
        ];



        //check page
        set_cache_page($request->fullUrl(), view("pages.property.community", $data)->render());

        return view('pages.property.community', $data);
    }

    public function projects(Request $request, $area, $str = null) {


        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            //return $cached;
        }

        $project = Project::where('slug', $area)->where('status', '1')->orderBy("id", "ASC")->first();
        if (empty($project)) {
            return redirect("$this->locale/dubai");
        }

        $query = DB::table('tbl_properties')->where("project_id", $project->id)->where("status", "1")->where("show_property", "Yes");
        if (strpos($request->fullurl(), '?afm=1') !== false) {
            $query->whereIn('id', [3, 6, 8, 7, 11]);
        }
        $properties = $query->orderBy('sort_order', 'ASC')->get();

        $meta_title = metaTitleByLocale($this->locale, ['en' => $project->title_en, 'ar' => $project->title_ar, 'cn' => $project->title_ch,]);
        $meta_desc = metaDescByLocale($this->locale, ['en' => $project->description_en, 'ar' => $project->description_ar, 'cn' => $project->description_ch,]);
        $ratingpage;
        if($project->title_en == 'Dubai Sports City'): $ratingpage = 'Sports City'; else: $ratingpage = $project->title_en; endif;
        $data = [
            "AllRatings" => DB::table('tbl_ratings')->where('menu_title',$ratingpage)->first(),
            'himage' => '',
            'abc' => $request->segment(2),
            'project' => $project,
            'properties' => $properties,
            'area' => $area,
            'meta_title' => $meta_title,
            'meta_keyword' => $project->meta_keyword,
            'meta_description' => $meta_desc,
            'og_title' => $meta_title,
            'og_desc' => $meta_desc,
            'og_pic' => ($project->image != "") ? url("/") . "/assets/images/banner/" . $project->image : '',
            'locale' => $this->locale,
        ];

        //check page
        set_cache_page($request->fullUrl(), view("pages.property.projects", $data)->render());

        return view('pages.property.projects', $data);
    }

    public function property(Request $request, $area, $propertySLug) {

        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            //return $cached;
        }

        // send to projects
        if (strpos($request->fullurl(), '?afm=1') !== false) {
            return $this->projects($request, $area, $propertySLug);
        }
        
        $property;
        if(!empty($_GET['demo']) && $_GET['demo'] == 1){
          $property = Properties::where('slug', $propertySLug)->where('status', '0')->first();  
        }else{ $property = Properties::where('slug', $propertySLug)->where('status', '1')->first(); }
        
        if (empty($property)) {
            return redirect("$this->locale/dubai/$area");
        }
        $project = Project::where('slug', $area)->where('status', '1')->orderBy("id", "ASC")->first();
        $galleries = DB::table('tbl_property_gallery')->where('property_id', $property->id)->where('status', '1')->where('unit_type_id',0)->orderBy("id", "DESC")->get();
        $aminities = DB::table('tbl_property_merge_aminities as t1')->leftjoin('tbl_aminities as t2', 't1.aminity_id', '=', 't2.id')->where('t1.property_id', $property->id)->orderBy("t2.id", "DESC")->get();
        $units = DB::table('tbl_property_merge_unit as t1')->leftjoin('tbl_property_unit as t2', 't1.unit_id', '=', 't2.id')->where('t1.property_id', $property->id)->orderBy("t2.id", "ASC")->get();
        $nears = DB::table('tbl_near_place')->where("project_id", $project->id)->get();

        $og_pic = ($property->header_image != "") ? url("/") . "/assets/images/properties/" . $project->gallery_location . "/" . $property->gallery_location . "/" . $property->header_image : '';

        $meta_title = metaTitleByLocale($this->locale, ['en' => $property->title_en, 'ar' => $property->title_ar, 'cn' => $property->title_ch,]);
        $meta_desc = metaDescByLocale($this->locale, ['en' => $property->short_description_en, 'ar' => $property->short_description_ar, 'cn' => $property->short_description_ch,]);

        $data = [
            'himage' => '',
            'abc' => $request->segment(2),
            'property' => $property,
            'project' => $project,
            'galleries' => $galleries,
            'aminities' => $aminities,
            'units' => $units,
            'nears' => $nears,
            'booklink' => '',
            'area' => $area,
            'meta_title' => $meta_title,
            'meta_keyword' => $property->meta_keyword,
            'meta_description' => $meta_desc,
            'og_title' => $meta_title,
            'og_desc' => $meta_desc,
            'og_pic' => $og_pic,
            'locale' => $this->locale,
        ];

        //check page
        set_cache_page($request->fullUrl(), view("pages.property.details", $data)->render());

        if (!empty($_GET['demo']) && $_GET['demo'] == 1) {
            return view('pages.property.exp-details', $data);
        }
        return view('pages.property.details', $data);
    }

    public function download(Request $request, $id) {
        $type = !empty($request->type) && $request->type == 'b' ? 'brochures' : 'floor-plans';
        $records = Properties::find($id);
        $records2 = Project::find($records->project_id);

        $file_check_path_d = STORE_PATH . "/assets/images/properties/" . $records2->gallery_location . '/' . $records->gallery_location . "/{$type}";
        $files = File::files($file_check_path_d);

        if (!empty($files)) {
            if (count($files) == 1) {
                $doc_path = $files[0];
            } else {
                $doc_path = STORE_PATH . "/assets/images/properties/" . $records2->gallery_location . '/' . $records->gallery_location . "/{$type}.zip";
            }
        } else {
            $doc_path = STORE_PATH . "/assets/images/properties/" . $records2->gallery_location . '/' . $records->gallery_location . "/{$type}.zip";
        }

        if (File::exists($doc_path)) {
            if (count($files) == 1) {
                if ($request->action == 'view') {
                    return redirect(APP_URL . ("/assets/images/properties/" . $records2->gallery_location . '/' . $records->gallery_location . "/{$type}/" . basename($doc_path)));
                } return response()->download(STORE_PATH . ("/assets/images/properties/" . $records2->gallery_location . '/' . $records->gallery_location . "/{$type}/" . basename($doc_path)));
            } else {
                return response()->download(STORE_PATH . ("/assets/images/properties/" . $records2->gallery_location . '/' . $records->gallery_location . "/{$type}.zip"));
            }
        } else {
            return redirect($request->fullurl());
        }
    }

    public function propertyBooking(Request $request) {
        return abort(404);
    }

    public function offers(Request $request) {
        $data = [
            'meta_title' => 'Property Offers | Azizi Developments',
            'meta_keyword' => 'Azizi Developments Property Offers',
            'meta_description' => 'Azizi Developments Property Offers',
            'locale' => $this->locale,
        ];
        return view("pages.property.offers-" . $this->locale, $data);
    }

    public function completed(Request $request) {
        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            //return $cached;
        }

        $projects = Project::where('status', '1')->orderBy("title_en", "ASC")->get();
        foreach ($projects as $project) {
            $query = DB::table('tbl_properties')->where("project_id", $project->id)->where("status", "1")->where("completed", "1");
            $properties = $query->orderBy('sort_order', 'ASC')->get();
            $completed[$project->id] = ['project' => $project, 'properties' => $properties,];
        }

        $meta_title = metaTitleByLocale($this->locale, ['en' => 'Completed Properties', 'ar' => 'Completed Properties', 'cn' => 'Completed Properties',]);
        $meta_desc = metaDescByLocale($this->locale, ['en' => 'Completed Properties', 'ar' => 'Completed Properties', 'cn' => 'Completed Properties',]);

        $data = [
            "AllRatings" => DB::table('tbl_ratings')->where('menu_id',51)->first(),
            'completed' => $completed,
            'meta_title' => $meta_title,
            'meta_keyword' => $project->meta_keyword,
            'meta_description' => $meta_desc,
            'og_title' => $meta_title,
            'og_desc' => $meta_desc,
            'og_pic' => ($project->image != "") ? url("/") . "/assets/images/banner/" . $project->image : '',
            'locale' => $this->locale,
        ];

        //check page
        set_cache_page($request->fullUrl(), view("pages.property.completed-projects", $data)->render());

        return view('pages.property.completed-projects', $data);
    }

    public function mortgageCalculator(Request $request) {
        $data = [
            'meta_title' => 'Mortgage Calculator',
            'meta_keyword' => 'Mortgage Calculator',
            'meta_description' => 'Mortgage Calculator',
            'og_title' => 'Mortgage Calculator',
            'og_desc' => 'Mortgage Calculator',
            'og_pic' => '',
            'locale' => $this->locale,
        ];
        return view('pages.property.mortgage-calculator', $data);
    }

    public function lp_property(Request $request, $area, $propertySLug) {

        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            //return $cached;
        }

        // send to projects
        if (strpos($request->fullurl(), '?afm=1') !== false) {
            return $this->projects($request, $area, $propertySLug);
        }
        
        $property;
        if(!empty($_GET['demo']) && $_GET['demo'] == 1){
          $property = Properties::where('slug', $propertySLug)->where('status', '0')->first();  
        }else{ $property = Properties::where('slug', $propertySLug)->where('status', '1')->first(); }
        
        if (empty($property)) {
            return redirect("$this->locale/dubai/$area");
        }
        $project = Project::where('slug', $area)->where('status', '1')->orderBy("id", "ASC")->first();
        $galleries = DB::table('tbl_property_gallery')->where('property_id', $property->id)->where('status', '1')->where('unit_type_id',0)->orderBy("id", "DESC")->get();
        $aminities = DB::table('tbl_property_merge_aminities as t1')->leftjoin('tbl_aminities as t2', 't1.aminity_id', '=', 't2.id')->where('t1.property_id', $property->id)->orderBy("t2.id", "DESC")->get();
        $units = DB::table('tbl_property_merge_unit as t1')->leftjoin('tbl_property_unit as t2', 't1.unit_id', '=', 't2.id')->where('t1.property_id', $property->id)->orderBy("t2.id", "ASC")->get();
        $nears = DB::table('tbl_near_place')->where("project_id", $project->id)->get();

        $og_pic = ($property->header_image != "") ? url("/") . "/assets/images/properties/" . $project->gallery_location . "/" . $property->gallery_location . "/" . $property->header_image : '';

        $meta_title = metaTitleByLocale($this->locale, ['en' => $property->title_en, 'ar' => $property->title_ar, 'cn' => $property->title_ch,]);
        $meta_desc = metaDescByLocale($this->locale, ['en' => $property->short_description_en, 'ar' => $property->short_description_ar, 'cn' => $property->short_description_en,]);

        $data = [
            'himage' => '',
            'abc' => $request->segment(2),
            'property' => $property,
            'project' => $project,
            'galleries' => $galleries,
            'aminities' => $aminities,
            'units' => $units,
            'nears' => $nears,
            'booklink' => '',
            'area' => $area,
            'meta_title' => $meta_title,
            'meta_keyword' => $property->meta_keyword,
            'meta_description' => $meta_desc,
            'og_title' => $meta_title,
            'og_desc' => $meta_desc,
            'og_pic' => $og_pic,
            'locale' => $this->locale,
        ];

        //check page
        set_cache_page($request->fullUrl(), view("pages.property.details", $data)->render());
        return view('pages.property.lp.details-lp', $data);
    }
    

}
