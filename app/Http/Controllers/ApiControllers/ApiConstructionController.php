<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Properties;
use DB;
use Response;

class ApiConstructionController extends Controller {

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

    public function area(Request $request) {
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            //return $cached;
        }
        $json_array = [];
        $projects = Project::where("status", "1")->where("cons_status", "Yes")->orderBy('project_order', 'ASC')->get();
        if (!empty($projects)) {
            foreach ($projects as $Projects) {
                if (!in_array($Projects->id, [15, 16, 17])) {
                    $json_array[$Projects->id] = [
                        'id' => $Projects->id,
                        'name' => $Projects->title_en,
                        'slug' => $Projects->slug,
                        'subtitle' => $Projects->subtitle_en,
                        'description' => $Projects->description_en,
                        'image' => SITE_URL."/assets/images/projects/" . $Projects->image,
                        'community_id' => $Projects->id == 10 ? 1 : 0,
                    ];
                }
            }
        }
        set_cache_page($request->fullUrl(), Response::json(array_values($json_array)));
        return Response::json(array_values($json_array));
    }

    //end api_Areas

    public function community(Request $request) {
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            //return $cached;
        }
        $json_array = [];
        $projects = Project::where("status", "1")->where("cons_status", "Yes")->orderBy('project_order', 'ASC')->get();
        if (!empty($projects)) {
            foreach ($projects as $Projects) {
                if (in_array($Projects->id, [15, 16, 17])) {
                    $json_array[$Projects->id] = array(
                        'id' => $Projects->id,
                        'area_id' => 10,
                        'name' => $Projects->title_en,
                        'slug' => $Projects->slug,
                        'subtitle' => $Projects->subtitle_en,
                        'description' => $Projects->description_en,
                        'image' => SITE_URL."/assets/images/projects/" . $Projects->image,
                    );
                }
            }
        }
        set_cache_page($request->fullUrl(), Response::json(array_values($json_array)));
        return Response::json(array_values($json_array));
    }

    //end api_community

    public function projects(Request $request, $area) {
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            //return $cached;
        }
        $json_array = [];
        $project = Project::where('slug', $area)->where('status', '1')->orderBy("id", "ASC")->first();
        if (!empty($project)) {
            $properties = Properties::where("project_id", $project->id)->where("status", "1")->where('constrution_show', 'yes')->where("completed", "0")->orderBy('sort_order', 'ASC')->get();
            if (!empty($properties)) {
                foreach ($properties as $property) {
                    $json_array[$property->id] = array(
                        'id' => $property->id,
                        'name' => $property->title_en,
                        'area_slug' => $project->slug,
                        'slug' => $property->slug,
                        'image' => SITE_URL."/assets/images/properties/{$project->gallery_location}/{$property->gallery_location}/{$property->holder_image}",
                    );
                }
            }
        }
        set_cache_page($request->fullUrl(), Response::json(array_values($json_array)));
        return Response::json(array_values($json_array));
    }

    public function property(Request $request, $area, $propertySLug) {
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            //return $cached;
        }
        $json_array = $images = [];
        $property = Properties::where('slug', $propertySLug)->where('constrution_show', 'Yes')->where('status', '1')->first();
        $project = Project::where('slug', $area)->where('status', '1')->orderBy("id", "ASC")->first();
        if (!empty($property) && !empty($project)) {
            $galleries = DB::table('tbl_construction_gallery')->where('property_id', $property->id)->where('status', '1')->orderBy("id", "DESC")->limit(5)->get();
            $og_pic = '';
            if (!empty($property->construction_header)) {
                $og_pic = url("/") . "/assets/images/properties/" . $project->gallery_location . "/" . $property->gallery_location . "/" . $property->construction_header;
            }
            foreach ($galleries as $value) {
                $images[] = SITE_URL."/assets/images/properties/{$project->gallery_location}/{$property->gallery_location}/construction-update/$value->image";
            }
            $json_array = [
                'name' => trim($property->title_en),
                'mobilization' => $property->mobilization_percentage,
                'structure' => $property->structure_percentage,
                'mep' => $property->mep_percentage,
                'finishes' => $property->finishes_percentage,
                'finish_at' => !empty($property->plan_end_date) ? date_format(date_create($property->plan_end_date), 'd M, Y') : $property->nfcstatus,
                'updated_at' => date_format(date_create($property->updated_at), 'd M, Y'),
                'images' => $images,
            ];
        }
        set_cache_page($request->fullUrl(), Response::json($json_array));
        return Response::json($json_array);
    }

}
