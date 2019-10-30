<?php

namespace App\Http\Controllers\APIControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Properties;
use DB;
use File;
use Response;

class ApiPropertyController extends Controller {

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

    // Mobile Application Api

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
                    $json_array[$Projects->id] = array(
                        'id' => $Projects->id,
                        'name' => $Projects->title_en,
                        'slug' => $Projects->slug,
                        'image' => SITE_URL . "/assets/images/projects/" . $Projects->image,
                        'community_id' => $Projects->id == 10 ? 1 : 0,
                    );
                }
            }
        }
        set_cache_page($request->fullUrl(), Response::json(array_values($json_array)));
        return Response::json(array_values($json_array));
    }

    /**
     * 
     * @return type
     */
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
                        'name' => $Projects->title_en,
                        'slug' => $Projects->slug,
                        'image' => SITE_URL . "/assets/images/projects/" . $Projects->image,
                    );
                }
            }
        }
        set_cache_page($request->fullUrl(), Response::json(array_values($json_array)));
        return Response::json(array_values($json_array));
    }

    /**
     * 
     * @param type $area
     * @return type
     */
    public function projects(Request $request, $area) {
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            //return $cached;
        }
        $json_array = [];
        $project = Project::where('slug', $area)->where('status', '1')->orderBy("id", "ASC")->first();
        if (!empty($project)) {
            $properties = Properties::where("project_id", $project->id)->where("status", "1")->orderBy('sort_order', 'ASC')->get();
            if (!empty($properties)) {
                foreach ($properties as $property) {
                    $json_array[$property->id] = array(
                        'id' => $property->id,
                        'name' => $property->title_en,
                        'area_slug' => $project->slug,
                        'slug' => $property->slug,
                        'image' => SITE_URL . "/assets/images/properties/{$project->gallery_location}/{$property->gallery_location}/{$property->holder_image}",
                    );
                }
            }
        }
        set_cache_page($request->fullUrl(), Response::json(array_values($json_array)));
        return Response::json(array_values($json_array));
    }

    /**
     * 
     * @param type $area
     * @param type $propertySLug
     * @return type
     */
    public function property(Request $request, $area, $propertySLug) {
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            //return $cached;
        }
        $json_array = $images = [];
        $property = Properties::where('slug', $propertySLug)->where('status', '1')->first();
        $project = Project::where('slug', $area)->where('status', '1')->orderBy("id", "ASC")->first();
        if (!empty($property) && !empty($project)) {
            $galleries = DB::table('tbl_property_gallery')->where('property_id', $property->id)->where('status', '1')->orderBy("id", "DESC")->get();
            $og_pic = '';
            if (!empty($property->construction_header)) {
                $og_pic = url("/") . "/assets/images/properties/" . $project->gallery_location . "/" . $property->gallery_location . "/" . $property->construction_header;
            }
            $file_path = "/assets/images/properties/" . $project->gallery_location . '/' . $property->gallery_location;
            $files1 = File::files(PUBLIC_PATH . $file_path . '/brochures');
            $files2 = File::files(PUBLIC_PATH . $file_path . '/floor-plans');
            $brochure = !empty($files1[0]) ? APP_URL . $file_path . "/brochures/" . basename($files1[0]) : '';
            $floor_plan = !empty($files2[0]) ? APP_URL . $file_path . "/floor-plans/" . basename($files2[0]) : '';
            foreach ($galleries as $value) {
                $images[] = SITE_URL . "/assets/images/properties/{$project->gallery_location}/{$property->gallery_location}/$value->image";
            }
            $json_array = [
                'name' => trim($property->title_en),
                'latitude' => $property->latitude,
                'longitude' => $property->longitude,
                'gallery_location' => $property->gallery_location,
                'gallery_location' => $property->gallery_location,
                'building_height' => $property->building_height,
                'floor_plan' => $floor_plan,
                'brochure' => $brochure,
                'video' => $property->video_url,
                'total_apartment' => $property->total_apartment,
                'last update' => $property->updated_at,
                'short_description_en' => $property->short_description_en,
                'long_description_en' => $property->long_description_en,
                'location' => $property->location,
                'panorama' => $property->views_360,
                'images' => $images,
            ];
        }
        set_cache_page($request->fullUrl(), Response::json($json_array));
        return Response::json($json_array);
    }

    /**
     * 
     * @param type $area
     * @param type $propertySLug
     * @return type
     */
    public function brochures(Request $request) {
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            //return $cached;
        }
        $json_array = [];
        $projects = Project::select('id', 'title_en', 'gallery_location')->where('status', '1')->orderBy("id", "ASC")->get();
        foreach ($projects as $project) {
            $properties = DB::table('tbl_properties')->select('title_en', 'gallery_location')->where("project_id", $project->id)->where("status", "1")->orderBy('sort_order', 'ASC')->get();
            foreach ($properties as $property) {
                $file_path = "/assets/images/properties/" . $project->gallery_location . '/' . $property->gallery_location;
                $files = File::files(PUBLIC_PATH . $file_path . '/brochures');
                $file = !empty($files[0]) ? APP_URL . $file_path . "/brochures/" . basename($files[0]) : '';
                $json_array[trim($project->title_en)][] = [
                    'name' => $property->title_en,
                    'file' => $file,
                ];
            }
        }
        set_cache_page($request->fullUrl(), Response::json($json_array));
        return Response::json($json_array);
    }

    /**
     * 
     * @param type $area
     * @param type $propertySLug
     * @return type
     */
    public function floorplans(Request $request) {
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            //return $cached;
        }
        $json_array = [];
        $projects = Project::select('id', 'title_en', 'gallery_location')->where('status', '1')->orderBy("id", "ASC")->get();
        foreach ($projects as $project) {
            $properties = DB::table('tbl_properties')->select('title_en', 'gallery_location')->where("project_id", $project->id)->where("status", "1")->orderBy('sort_order', 'ASC')->get();
            foreach ($properties as $property) {
                $file_path = "/assets/images/properties/" . $project->gallery_location . '/' . $property->gallery_location;
                $files = File::files(PUBLIC_PATH . $file_path . '/floor-plans');
                $file = !empty($files[0]) ? APP_URL . $file_path . "/floor-plans/" . basename($files[0]) : '';
                $json_array[trim($project->title_en)][] = [
                    'name' => $property->title_en,
                    'file' => $file,
                ];
            }
        }
        set_cache_page($request->fullUrl(), Response::json($json_array));
        return Response::json($json_array);
    }

}
