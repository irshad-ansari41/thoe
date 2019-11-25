<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Project;
use App\Models\Properties;
use DB;
use File;

class PropertyController extends Controller {

    public $locale;

    /**
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
        $content = Content::find(15)->toArray();

        $meta_title = metaTitleByLocale($this->locale, ['en' => $content['short_description_en'], 'ar' => $content['short_description_ar']]);
        $meta_desc = metaDescByLocale($this->locale, ['en' => $content['description_en'], 'ar' => $content['description_ar'],]);

        $data = [
            'content' => $content,
            'projects' => Project::where("status", "1")->where("project_status", "Yes")->orderBy('project_order', 'ASC')->paginate(6),
            'meta_title' => $meta_title,
            'meta_keyword' => $content['meta_keyword'],
            'meta_description' => $meta_desc,
            'og_title' => $meta_title,
            'og_desc' => $meta_desc,
            'og_pic' => ($content['image'] != "") ? url("/") . "/assets/images/banner/" . $content['image'] : '',
            'locale' => $this->locale,
        ];

        //check page
        set_cache_page($request->fullUrl(), view("pages.property.index-{$this->locale}", $data)->render());

        return view("pages.property.index-{$this->locale}", $data);
    }

    public function properties(Request $request, $project_slug) {


        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            return $cached;
        }

        $project = Project::where('slug', $project_slug)->first()->toArray();
        $properties = DB::table('tbl_properties')->where("project_id", $project['id'])->where("status", "1")->orderBy('sort_order', 'ASC')->paginate(6);

        $meta_title = metaTitleByLocale($this->locale, ['en' => $project['title_en'], 'ar' => $project['title_ar'],]);
        $meta_desc = metaDescByLocale($this->locale, ['en' => $project['description_en'], 'ar' => $project['description_ar'],]);

        $data = [
            'project' => $project,
            'properties' => $properties,
            'meta_title' => $meta_title,
            'meta_keyword' => $project['meta_keyword'],
            'meta_description' => $meta_desc,
            'og_title' => $meta_title,
            'og_desc' => $meta_desc,
            'og_pic' => ($project['image'] != "") ? url("/") . "/assets/images/banner/" . $project['image'] : '',
            'locale' => $this->locale,
        ];

        //check page
        set_cache_page($request->fullUrl(), view("pages.property.properties-{$this->locale}", $data)->render());

        return view("pages.property.properties-{$this->locale}", $data);
    }

    public function property(Request $request, $project_slug, $property_slug) {

        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            return $cached;
        }

        $project = Project::where('slug', $project_slug)->first()->toArray();

        $property = Properties::where('slug', $property_slug)->where('status', '1')->first();

        if (empty($property)) {
            return redirect("$this->locale/projects/$project_slug");
        }

        $gallery = DB::table('tbl_property_gallery')->where('property_id', $property['id'])->where('status', '1')->where('unit_type_id', 0)->orderBy("id", "DESC")->get();
        $aminities = DB::table('tbl_property_merge_aminities as t1')->leftjoin('tbl_aminities as t2', 't1.aminity_id', '=', 't2.id')->where('t1.property_id', $property->id)->orderBy("t2.id", "DESC")->get();
        $units = DB::table('tbl_property_merge_unit as t1')->leftjoin('tbl_property_unit as t2', 't1.unit_id', '=', 't2.id')->where('t1.property_id', $property->id)->orderBy("t2.id", "ASC")->get();
        $nears = DB::table('tbl_near_place')->where("project_id", $project['id'])->get();

        $og_pic = ($property['header_image'] != "") ? url("/") . "/assets/images/properties/" . $project['gallery_location'] . "/" . $property['gallery_location'] . "/" . $property['header_image'] : '';

        $meta_title = metaTitleByLocale($this->locale, ['en' => $property->title_en, 'ar' => $property->title_ar, ]);
        $meta_desc = metaDescByLocale($this->locale, ['en' => $property->short_description_en, 'ar' => $property->short_description_ar, ]);

        $data = [
            'himage' => '',
            'abc' => $request->segment(2),
            'property' => $property,
            'project' => $project,
            'gallery' => $gallery,
            'aminities' => $aminities,
            'units' => $units,
            'nears' => $nears,
            'booklink' => '',
            'meta_title' => $meta_title,
            'meta_keyword' => $property->meta_keyword,
            'meta_description' => $meta_desc,
            'og_title' => $meta_title,
            'og_desc' => $meta_desc,
            'og_pic' => $og_pic,
            'locale' => $this->locale,
        ];

        //check page
        set_cache_page($request->fullUrl(), view("pages.property.property-{$this->locale}", $data)->render());

        return view("pages.property.property-{$this->locale}", $data);
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
            "AllRatings" => DB::table('tbl_ratings')->where('menu_id', 51)->first(),
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

    public function mortgageCalculator() {
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

}
