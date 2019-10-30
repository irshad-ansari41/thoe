<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Project;
use App\Models\Properties;
use App\Models\Aminities;
use App\Models\Unities;
use App\Models\Category;
use App\Models\Event;
use App\Models\Near;
use App\Models\Gallery;
use App\Models\Unitgallery;
use App\Models\Merge_unit;
use App\Models\Merge_aminities;
use App\Models\Construction_gallery;
use App\Models\Unitdetails;
use App\Models\Floorplangallery;
use App\Models\Unitfloors;
use App\Models\Unitfeatures;
use App\Models\Unitmergeproperty;
use App\Models\Unitmergefeatures;
use App\Models\Availableunits;
use File;
use Redirect;
use View;
use Validator;
use DB;
use ZipArchive;

class AdminPropertiesController extends Controller {

    public function __construct() {
        $session_user_id = 1; //Sentinel::getUser()->id;

        $results_users = DB::selectOne(DB::raw("select users.*,tbl_module_access.* from users INNER JOIN tbl_module_access ON users.id=tbl_module_access.userid where users.id=" . $session_user_id));

        if ($results_users != NULL) {

            if ($results_users->properties == "0") {
                redirect()->to('/admin/permissionDenied')->send();
            }
        }
    }

    /**
     * Show a list of all the properties.
     *
     * @return View
     */
    public function index() {
        // Grab all the properties
        $properties = Property::All();

        // Show the page
        return View('admin.properties.index', compact('properties'));
    }

    /**
     * Create new properties
     *
     * @return View
     */
    public function create() {
        return View('admin.properties.create');
    }

    /**
     * properties create form processing.
     *
     * @return Redirect
     */
    public function store(Request $request) {
        $content = new Content();
        $content->title = input_trims($request->title);
        $content->description = input_trims($request->description);
        $content->created = date("Y-m-d H:i:s");
        $content->save();

        return redirect('admin/properties/');
    }

    protected function validator_image(array $data) {
        return Validator::make($data, [
                    'image' => 'mimes:jpg,jpeg,gif,png|min:100|max:1024'
        ]);
    }

    protected function validator_image_aminity(array $data) {
        return Validator::make($data, [
                    'image' => 'mimes:jpg,jpeg,gif,png|max:10'
        ]);
    }

    /* Project Management */

    public function projects(Request $request) {

        // Grab all the projects
        $projects = Project::orderBy("project_order", "asc")->get();

        // Show the page
        return View('admin.properties.projects', compact('projects'));
    }

    public function add_project(Request $request, $id = '') {

        if ($id == '') {

            $project = array();
            $type = 'add';
            return View('admin.properties.createproject', compact('project', 'type'));
        } else {
            $project = Project::find($id);
            $type = 'edit';
            return View('admin.properties.createproject', compact('project', 'type'));
        }
    }

    public function delete_project(Request $request, $id) {
        $project = Project::find($id);

        if ($project->image != "") {
            $url = STORE_PATH . "/assets/images/projects/" . $project->image;
            @unlink($url);
        }

        Project::destroy($id);
        $request->session()->flash('alert-success', 'Project has been deleted!');
        return redirect('admin/properties/projects');
    }

    public function store_project(Request $request, $id = '') {

        if ($request->type == "add") {

            /* $validator = $this->validator_image($request->all());

              if ($validator->fails()) {
              $this->throwValidationException(
              $request, $validator
              );
              } */
            $image = $request->file('image');
            $header_image = $request->file('header_image');
            $construction_header_image = $request->file('construction_header_image');
            $input['imagename'] = '';
            $input['headerimagename'] = '';

            if ($image) {
                $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = STORE_PATH . ('/assets/images/projects');
                $image->move($destinationPath, str_replace('', '-', input_trims(strtolower($input['imagename']))));
            }

            if ($header_image) {
                $input['headerimagename'] = time() . rand() . '.' . $header_image->getClientOriginalExtension();
                $destinationPath = STORE_PATH . ('/assets/images/projects');
                $header_image->move($destinationPath, str_replace('', '-', input_trims(strtolower($input['headerimagename']))));
            }

            if ($construction_header_image) {
                $input['construction_header_image'] = time() . rand() . '.' . $construction_header_image->getClientOriginalExtension();
                $destinationPath = STORE_PATH . ('/assets/images/projects');
                $construction_header_image->move($destinationPath, str_replace('', '-', input_trims(strtolower($input['construction_header_image']))));
            }

            $project = new Project();
            $project->holder_alt = input_trims($request->holder_alt);
            $project->header_alt = input_trims($request->header_alt);
            $project->construction_alt = input_trims($request->construction_alt);



            $project->title_ar = input_trims($request->title_ar);
            $project->title_ch = input_trims($request->title_ch);
            $project->title_hn = input_trims($request->title_hn);
            $project->title_ur = input_trims($request->title_ur);
            $project->subtitle_en = input_trims($request->subtitle_en);
            $project->subtitle_ar = input_trims($request->subtitle_ar);
            $project->subtitle_ch = input_trims($request->subtitle_ch);
            $project->subtitle_hn = input_trims($request->subtitle_hn);
            $project->subtitle_ur = input_trims($request->subtitle_ur);
            $project->description_en = input_trims($request->description_en);
            $project->description_ar = input_trims($request->description_ar);
            $project->description_ch = input_trims($request->description_ch);
            $project->description_hn = input_trims($request->description_hn);
            $project->description_ur = input_trims($request->description_ur);

            $project->slug = input_trims($request->slug);
            $project->slug_updates = str_replace(' ', '-', input_trims(strtolower($request->slug . '-updates')));
            //$project->latitude = trim($request->latitude);
            //$project->longitude = trim($request->longitude);

            $project->meta_title = input_trims($request->meta_title);
            $project->meta_keyword = input_trims($request->meta_keyword);
            $project->meta_desc = input_trims($request->meta_desc);

            $project->created = date("Y-m-d H:i:s");
            $project->image = str_replace('', '-', input_trims(strtolower($input['imagename'])));
            $project->header_image = str_replace('', '-', input_trims(strtolower($input['headerimagename'])));
            $project->construction_header_image = str_replace('', '-', input_trims(strtolower($input['construction_header_image'])));
            $project->status = '1';

            $project->save();

            $request->session()->flash('alert-success', 'Project has been added!');
        }
        if ($request->type == "edit") {

            /* $validator = $this->validator_image($request->all());

              if ($validator->fails()) {
              $this->throwValidationException(
              $request, $validator
              );
              } */
            $image = $request->file('image');
            $header_image = $request->file('header_image');
            $construction_header_image = $request->file('construction_header_image');

            $input['imagename'] = '';
            $input['headerimagename'] = '';
            $input['construction_header_image'] = '';
            if ($image) {
                $project = Project::find($request->id);
                if ($project->image != "") {
                    $url = STORE_PATH . "/assets/images/projects/" . $project->image;
                    @unlink($url);
                }

                $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = STORE_PATH . ('/assets/images/projects');
                $image->move($destinationPath, str_replace('', '-', input_trims(strtolower($input['imagename']))));
            }

            if ($header_image) {
                $project = Project::find($request->id);
                if ($project->header_image != "") {
                    $url = STORE_PATH . "/assets/images/projects/" . $project->header_image;
                    @unlink($url);
                }

                $input['headerimagename'] = time() . rand() . '.' . $header_image->getClientOriginalExtension();
                $destinationPath = STORE_PATH . ('/assets/images/projects');
                $header_image->move($destinationPath, str_replace('', '-', input_trims(strtolower($input['headerimagename']))));
            }

            if ($construction_header_image) {
                $project = Project::find($request->id);
                if ($project->construction_header_image != "") {
                    $url = STORE_PATH . "/assets/images/projects/" . $project->construction_header_image;
                    @unlink($url);
                }

                $input['construction_header_image'] = time() . rand() . '.' . $construction_header_image->getClientOriginalExtension();
                $destinationPath = STORE_PATH . ('/assets/images/projects');
                $construction_header_image->move($destinationPath, str_replace('', '-', input_trims(strtolower($input['construction_header_image']))));
            }


            $data = array();
            if ($input['imagename'] != "") {
                $data['image'] = str_replace('', '-', input_trims(strtolower($input['imagename'])));
            }
            if ($input['headerimagename'] != "") {
                $data['header_image'] = str_replace('', '-', input_trims(strtolower($input['headerimagename'])));
            }
            if ($input['construction_header_image'] != "") {
                $data['construction_header_image'] = str_replace('', '-', input_trims(strtolower($input['construction_header_image'])));
            }
            //if($request->title_en){
            $data['title_en'] = input_trims($request->title_en);
            // }
            // if($request->title_ar){
            $data['title_ar'] = input_trims($request->title_ar);
            // }
            //  if($request->title_ch){
            $data['title_ch'] = input_trims($request->title_ch);
            //  }
            // if($request->title_hn){
            $data['title_hn'] = input_trims($request->title_hn);
            //   }
            //  if($request->title_ur){
            $data['title_ur'] = input_trims($request->title_ur);
            //   }
            //  if($request->subtitle_en){
            $data['subtitle_en'] = input_trims($request->subtitle_en);
            //   }
            //  if($request->subtitle_ar){
            $data['subtitle_ar'] = input_trims($request->subtitle_ar);
            //   }
            //  if($request->subtitle_ch){
            $data['subtitle_ch'] = input_trims($request->subtitle_ch);
            //  }
            //  if($request->subtitle_hn){
            $data['subtitle_hn'] = input_trims($request->subtitle_hn);
            //  }
            //   if($request->subtitle_ur){
            $data['subtitle_ur'] = input_trims($request->subtitle_ur);
            //   }
            $data['slug'] = trim($request->slug);
            $data['slug_updates'] = str_replace(' ', '-', input_trims(strtolower($request->slug . '-updates')));

            //$data['latitude'] = trim($request->latitude);
            //$data['longitude'] = trim($request->longitude);


            $data['meta_title'] = input_trims($request->meta_title);
            $data['meta_keyword'] = input_trims($request->meta_keyword);
            $data['meta_desc'] = input_trims($request->meta_desc);

            $data['holder_alt'] = input_trims($request->holder_alt);

            $data['header_alt'] = input_trims($request->header_alt);
            $data['construction_alt'] = input_trims($request->construction_alt);

            //   if($request->description_en){
            $data['description_en'] = input_trims($request->description_en);
            //   }
            //   if($request->description_ar){
            $data['description_ar'] = input_trims($request->description_ar);
            //   }
            //   if($request->description_ch){
            $data['description_ch'] = input_trims($request->description_ch);
            //   }
            //   if($request->description_hn){
            $data['description_hn'] = input_trims($request->description_hn);
            //   }
            //   if($request->description_ur){
            $data['description_ur'] = input_trims($request->description_ur);
            //   }
            if (!empty($data)) {
                Project::where('id', $request->id)->update($data);
            }

            $request->session()->flash('alert-success', 'Project has been updated!');
        }

        return redirect('admin/properties/projects');
    }

    public function status(Request $request, $id, $flag) {

        Project::where('id', $id)->update(array("status" => $flag));
        $request->session()->flash('alert-success', 'Project status has been updated!');

        return redirect('admin/properties/projects');
    }

    /* Aminities Management */

    public function amenities(Request $request) {

        $aminities = Aminities::orderBy("id", "desc")->get();
        return View('admin.properties.aminities', compact('aminities'));
    }

    public function add_amenities(Request $request, $id = '') {

        if ($id == '') {

            $aminitie = array();
            $type = 'add';
            return View('admin.properties.createanimities', compact('aminitie', 'type'));
        } else {
            $aminitie = Aminities::find($id);
            $type = 'edit';
            return View('admin.properties.createanimities', compact('aminitie', 'type'));
        }
    }

    public function delete_amenities(Request $request, $id) {
        $aminitie = Aminities::find($id);

        if ($aminitie->icon != "") {
            $url = STORE_PATH . "/assets/images/icon/" . $aminitie->icon;
            @unlink($url);
        }

        Aminities::destroy($id);
        $request->session()->flash('alert-success', 'Aminity has been deleted!');
        return redirect('admin/properties/amenities');
    }

    public function store_amenities(Request $request, $id = '') {

        if ($request->type == "add") {

            $validator = $this->validator_image_aminity($request->all());

            if ($validator->fails()) {
                $this->throwValidationException(
                        $request, $validator
                );
            }
            $image = $request->file('image');
            $input['imagename'] = '';
            if ($image) {
                $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = STORE_PATH . ('/assets/images/icon');
                $image->move($destinationPath, $input['imagename']);
            }

            $aminitie = new Aminities();
            $aminitie->title_en = input_trims($request->title_en);
            $aminitie->title_ar = input_trims($request->title_ar);
            $aminitie->title_ch = input_trims($request->title_ch);
            $aminitie->title_hn = input_trims($request->title_hn);
            $aminitie->title_ur = input_trims($request->title_ur);
            $aminitie->created = date("Y-m-d H:i:s");
            $aminitie->icon = $input['imagename'];
            $aminitie->status = '1';

            $aminitie->save();

            $request->session()->flash('alert-success', 'Aminity has been added!');
        }
        if ($request->type == "edit") {

            $validator = $this->validator_image_aminity($request->all());

            if ($validator->fails()) {
                $this->throwValidationException(
                        $request, $validator
                );
            }

            $image = $request->file('image');
            $input['imagename'] = '';
            if ($image) {
                $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = STORE_PATH . ('/assets/images/icon');
                $image->move($destinationPath, $input['imagename']);

                $aminitie = Aminities::find($request->id);
                if ($aminitie->icon != "") {
                    $url = STORE_PATH . "/assets/images/icon/" . $aminitie->icon;
                    @unlink($url);
                }
            }


            $data = array();
            if ($input['imagename'] != "") {
                $data['icon'] = $input['imagename'];
            }
            if ($request->title_en) {
                $data['title_en'] = input_trims($request->title_en);
            }
            if ($request->title_ar) {
                $data['title_ar'] = input_trims($request->title_ar);
            }
            if ($request->title_ch) {
                $data['title_ch'] = input_trims($request->title_ch);
            }
            if ($request->title_hn) {
                $data['title_hn'] = input_trims($request->title_hn);
            }
            if ($request->title_ur) {
                $data['title_ur'] = input_trims($request->title_ur);
            }
            if ($request->description_en) {
                $data['description_en'] = input_trims($request->description_en);
            }
            if ($request->description_ar) {
                $data['description_ar'] = input_trims($request->description_ar);
            }
            if ($request->description_ch) {
                $data['description_ch'] = input_trims($request->description_ch);
            }

            if (!empty($data)) {
                Aminities::where('id', $request->id)->update($data);
            }

            $request->session()->flash('alert-success', 'Aminity has been updated!');
        }

        return redirect('admin/properties/amenities');
    }

    public function status_am(Request $request, $id, $flag) {

        Aminities::where('id', $id)->update(array("status" => $flag));
        $request->session()->flash('alert-success', 'Aminity status has been updated!');

        return redirect('admin/properties/amenities');
    }

    /* Units Management */

    public function units(Request $request) {

        $units = Unities::orderBy("id", "desc")->get();
        return View('admin.properties.units', compact('units'));
    }

    public function add_units(Request $request, $id = '') {

        if ($id == '') {

            $unit = array();
            $type = 'add';
            return View('admin.properties.createunits', compact('unit', 'type'));
        } else {
            $unit = Unities::find($id);
            $type = 'edit';
            return View('admin.properties.createunits', compact('unit', 'type'));
        }
    }

    /* Unit Details */

    public function add_units_detail(Request $request, $id = '') {

        $unit_detail_data = array();

        $unit_merge_data = Merge_unit::find($id);

        $property_id = $unit_merge_data->property_id;
        $unit_id = $unit_merge_data->unit_id;

        $property_data = Properties::find($property_id);
        $project_data = Project::where('id', $property_data->project_id)->get()->first();
        $unit_data = Unities::find($unit_id);

        $unitfloors = Unitfloors::All();
        $unitfeatures = Unitfeatures::All();

        $unitmergefloor = Unitmergeproperty::where("property_merge_unit", $id)->get();
        $unitmergefeature = Unitmergefeatures::where("property_merge_unit", $id)->get();

        $unit_detail_data = Unitdetails::where('pmuid', $id)->get()->first();

        $type = 'edit';
        return View('admin.properties.units_detail', compact('type', 'property_data', 'unit_data', 'id', 'unit_detail_data', 'project_data', 'unitfloors', 'unitfeatures', 'unitmergefloor', 'unitmergefeature'));
    }

    public function store_units_detail(Request $request, $id = '') {

        if ($request->id != '') {
            $unit_feature_string = "";
            $floor_name_string = "";

            if (count($request->unit_feature) > 0) {
                for ($i = 0; $i < count($request->unit_feature); $i++) {
                    $unit_feature_string = $request->unit_feature[$i] . ',' . $unit_feature_string;
                }
            }
            if (count($request->floor_name) > 0) {
                for ($i = 0; $i < count($request->floor_name); $i++) {
                    $floor_name_string = $request->floor_name[$i] . ',' . $floor_name_string;
                }
            }


            // Update data
            $property_data = Properties::find($request->pid);
            $project_data = Project::where('id', $property_data->project_id)->get()->first();


            $path2 = STORE_PATH . '/assets/images/properties/' . $project_data->gallery_location . '/' . $property_data->gallery_location . '/Unit';
            $image = $request->file('image');
            $input['imagename'] = '';
            if ($image) {
                $unit = Unitdetails::find($request->id);
                if ($unit->unit_banner != "") {
                    $url = $path2 . "/" . $unit->unit_banner;
                    @unlink($url);
                }

                $input['imagename'] = $image->getClientOriginalName();
                $destinationPath = $path2;
                $image->move($destinationPath, $input['imagename']);
            }
            $data = array();

            if ($input['imagename'] != "") {
                $data['unit_banner'] = $input['imagename'];
            }

            if ($request->unit_banner_alt) {
                $data['unit_banner_alt'] = $request->unit_banner_alt;
            }

            if ($unit_feature_string != '') {
                $data['available_unit_features'] = $unit_feature_string;
            }
            if ($floor_name_string != '') {
                $data['available_floors'] = $floor_name_string;
            }

            if ($request->unit_description) {
                $data['unit_description'] = $request->unit_description;
            }
            if ($request->price_starts_at) {
                $data['price_starts_at'] = $request->price_starts_at;
            }
            if ($request->price_sqft_starts_at) {
                $data['price_sqft_starts_at'] = $request->price_sqft_starts_at;
            }
            if ($request->reference) {
                $data['reference'] = $request->reference;
            }
            if ($request->bedrooms) {
                $data['bedrooms'] = $request->bedrooms;
            }
            if ($request->bathrooms) {
                $data['bathrooms'] = $request->bathrooms;
            }
            if ($request->area) {
                $data['area'] = $request->area;
            }
            if ($request->virtual_tour_link) {
                $data['virtual_tour_link'] = $request->virtual_tour_link;
            }
            if ($request->slug) {
                $data['slug'] = $request->slug;
            }
            if ($request->meta_title) {
                $data['meta_title'] = $request->meta_title;
            }
            if ($request->meta_keyword) {
                $data['meta_keyword'] = $request->meta_keyword;
            }
            if ($request->meta_desc) {
                $data['meta_desc'] = $request->meta_desc;
            }

            if (!empty($data)) {
                Unitdetails::where('id', $request->id)->update($data);
            }

            Unitmergeproperty::where('property_merge_unit', $request->pmuid)->delete();

            if (count($request->floor_name) > 0) {

                for ($i = 0; $i < count($request->floor_name); $i++) {
                    $unit_merge_property_detail = new Unitmergeproperty();
                    $unit_merge_property_detail->property_id = $request->pid;
                    $unit_merge_property_detail->unit_id = $request->uid;
                    $unit_merge_property_detail->property_merge_unit = $request->pmuid;
                    $unit_merge_property_detail->unit_detail_id = $request->id;
                    $unit_merge_property_detail->unit_floor_id = $request->floor_name[$i];
                    $unit_merge_property_detail->save();
                }
            }

            Unitmergefeatures::where('property_merge_unit', $request->pmuid)->delete();

            if (count($request->unit_feature) > 0) {

                for ($i = 0; $i < count($request->unit_feature); $i++) {
                    $unit_merge_property_detail = new Unitmergefeatures();
                    $unit_merge_property_detail->property_id = $request->pid;
                    $unit_merge_property_detail->unit_id = $request->uid;
                    $unit_merge_property_detail->property_merge_unit = $request->pmuid;
                    $unit_merge_property_detail->unit_detail_id = $request->id;
                    $unit_merge_property_detail->unit_feature_id = $request->unit_feature[$i];
                    $unit_merge_property_detail->save();
                }
            }

            $request->session()->flash('alert-success', 'Unit Detail has been updated!');

            return redirect('admin/properties/list');
        } else {
            $property_data = Properties::find($request->pid);
            $project_data = Project::where('id', $property_data->project_id)->get()->first();

            // insert uniit details


            $path2 = STORE_PATH . '/assets/images/properties/' . $project_data->gallery_location . '/' . $property_data->gallery_location . '/Unit';

            if (!file_exists($path2)) {

                $sudopath2 = STORE_PATH . "/assets/images/properties/" . $project_data->gallery_location . '/' . $property_data->gallery_location . "/Unit";
                $result = File::makeDirectory($path2, $mode = 0777, true, true);
                chmod($sudopath2, 0777);
            }

            $image = $request->file('image');
            $input['imagename'] = '';
            if ($image) {
                $input['imagename'] = $image->getClientOriginalName();
                $destinationPath = $path2;
                $image->move($destinationPath, $input['imagename']);
            }

            $unit_feature_string = "";
            $floor_name_string = "";

            if (count($request->unit_feature) > 0) {
                for ($i = 0; $i < count($request->unit_feature); $i++) {
                    $unit_feature_string = $request->unit_feature[$i] . ',' . $unit_feature_string;
                }
            }
            if (count($request->floor_name) > 0) {
                for ($i = 0; $i < count($request->floor_name); $i++) {
                    $floor_name_string = $request->floor_name[$i] . ',' . $floor_name_string;
                }
            }

            $unit_detail = new Unitdetails();
            $unit_detail->pid = $request->pid;
            $unit_detail->uid = $request->uid;
            $unit_detail->pmuid = $request->pmuid;
            $unit_detail->unit_banner = $input['imagename'];
            $unit_detail->unit_banner_alt = $request->unit_banner_alt;
            $unit_detail->available_floors = $floor_name_string;
            $unit_detail->available_unit_features = $unit_feature_string;
            $unit_detail->unit_description = $request->unit_description;
            $unit_detail->price_starts_at = $request->price_starts_at;
            $unit_detail->price_sqft_starts_at = $request->price_sqft_starts_at;
            $unit_detail->reference = $request->reference;
            $unit_detail->bedrooms = $request->bedrooms;
            $unit_detail->bathrooms = $request->bathrooms;
            $unit_detail->area = $request->area;
            $unit_detail->virtual_tour_link = $request->virtual_tour_link;
            $unit_detail->created_date = date("Y-m-d H:i:s");
            $unit_detail->slug = $request->slug;
            $unit_detail->meta_title = $request->meta_title;
            $unit_detail->meta_keyword = $request->meta_keyword;
            $unit_detail->meta_desc = $request->meta_desc;

            $unit_detail->status = '1';
            $unit_detail->save();

            $insertedId = $unit_detail->id;

            if (count($request->floor_name) > 0) {

                for ($i = 0; $i < count($request->floor_name); $i++) {
                    $unit_merge_property_detail = new Unitmergeproperty();
                    $unit_merge_property_detail->property_id = $request->pid;
                    $unit_merge_property_detail->unit_id = $request->uid;
                    $unit_merge_property_detail->property_merge_unit = $request->pmuid;
                    $unit_merge_property_detail->unit_detail_id = $insertedId;
                    $unit_merge_property_detail->unit_floor_id = $request->floor_name[$i];
                    $unit_merge_property_detail->save();
                }
            }


            if (count($request->unit_feature) > 0) {

                for ($i = 0; $i < count($request->unit_feature); $i++) {
                    $unit_merge_property_detail = new Unitmergefeatures();
                    $unit_merge_property_detail->property_id = $request->pid;
                    $unit_merge_property_detail->unit_id = $request->uid;
                    $unit_merge_property_detail->property_merge_unit = $request->pmuid;
                    $unit_merge_property_detail->unit_detail_id = $insertedId;
                    $unit_merge_property_detail->unit_feature_id = $request->unit_feature[$i];
                    $unit_merge_property_detail->save();
                }
            }
            $request->session()->flash('alert-success', 'Unit Detail has been updated!');
            return redirect('admin/properties/list');
        }
    }

    public function delete_units(Request $request, $id) {
        $uniti = Unities::find($id);

        if ($uniti->icon != "") {
            $url = STORE_PATH . "/assets/images/icon/" . $uniti->icon;
            @unlink($url);
        }

        Unities::destroy($id);
        $request->session()->flash('alert-success', 'Unit has been deleted!');
        return redirect('admin/properties/units');
    }

    public function store_units(Request $request, $id = '') {

        if ($request->type == "add") {

            $validator = $this->validator_image_aminity($request->all());

            if ($validator->fails()) {
                $this->throwValidationException(
                        $request, $validator
                );
            }
            $image = $request->file('image');
            $input['imagename'] = '';
            if ($image) {
                $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = STORE_PATH . ('/assets/images/icon');
                $image->move($destinationPath, $input['imagename']);
            }

            $unity = new Unities();
            $unity->title_en = $request->title_en;
            $unity->title_ar = $request->title_ar;
            $unity->title_ch = $request->title_ch;
            $unity->title_hn = $request->title_hn;
            $unity->title_ur = $request->title_ur;
            $unity->created = date("Y-m-d H:i:s");
            $unity->icon = $input['imagename'];
            $unity->status = '1';
            $unity->save();

            $request->session()->flash('alert-success', 'Unit has been added!');
        }
        if ($request->type == "edit") {

            $validator = $this->validator_image_aminity($request->all());

            if ($validator->fails()) {
                $this->throwValidationException(
                        $request, $validator
                );
            }

            $image = $request->file('image');
            $input['imagename'] = '';
            if ($image) {
                $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = STORE_PATH . ('/assets/images/icon');
                $image->move($destinationPath, $input['imagename']);

                $unit = Unities::find($request->id);
                if ($unit->icon != "") {
                    $url = STORE_PATH . "/assets/images/icon/" . $unit->icon;
                    @unlink($url);
                }
            }


            $data = array();
            if ($input['imagename'] != "") {
                $data['icon'] = $input['imagename'];
            }
            if ($request->title_en) {
                $data['title_en'] = $request->title_en;
            }
            if ($request->title_ar) {
                $data['title_ar'] = $request->title_ar;
            }
            if ($request->title_ch) {
                $data['title_ch'] = $request->title_ch;
            }
            if ($request->title_hn) {
                $data['title_hn'] = $request->title_hn;
            }
            if ($request->title_ur) {
                $data['title_ur'] = $request->title_ur;
            }

            if (!empty($data)) {
                Unities::where('id', $request->id)->update($data);
            }

            $request->session()->flash('alert-success', 'Unit has been updated!');
        }

        return redirect('admin/properties/units');
    }

    public function status_u(Request $request, $id, $flag) {

        Unities::where('id', $id)->update(array("status" => $flag));
        $request->session()->flash('alert-success', 'Unit status has been updated!');

        return redirect('admin/properties/units');
    }

    /* Category Management */

    public function categories(Request $request) {

        $categories = Category::orderBy("id", "desc")->get();
        return View('admin.properties.categories', compact('categories'));
    }

    public function add_category(Request $request, $id = '') {

        if ($id == '') {

            $category = array();
            $type = 'add';
            return View('admin.properties.createcategory', compact('category', 'type'));
        } else {
            $category = Category::find($id);
            $type = 'edit';
            return View('admin.properties.createcategory', compact('category', 'type'));
        }
    }

    public function delete_category(Request $request, $id) {
        Category::destroy($id);
        $request->session()->flash('alert-success', 'Category has been deleted!');
        return redirect('admin/properties/categories');
    }

    public function store_category(Request $request, $id = '') {

        if ($request->type == "add") {

            $category = new Category();
            $category->title_en = input_trims($request->title_en);
            $category->title_ar = input_trims($request->title_ar);
            $category->title_ch = input_trims($request->title_ch);
            $category->title_hn = input_trims($request->title_hn);
            $category->title_ur = input_trims($request->title_ur);
            $category->created = date("Y-m-d H:i:s");
            $category->status = '1';
            $category->save();

            $request->session()->flash('alert-success', 'Category has been added!');
        }
        if ($request->type == "edit") {

            $data = array();
            if ($request->title_en) {
                $data['title_en'] = input_trims($request->title_en);
            }
            if ($request->title_ar) {
                $data['title_ar'] = input_trims($request->title_ar);
            }
            if ($request->title_ch) {
                $data['title_ch'] = input_trims($request->title_ch);
            }
            if ($request->title_hn) {
                $data['title_hn'] = input_trims($request->title_hn);
            }
            if ($request->title_ur) {
                $data['title_ur'] = input_trims($request->title_ur);
            }

            if (!empty($data)) {
                Category::where('id', $request->id)->update($data);
            }

            $request->session()->flash('alert-success', 'Category has been updated!');
        }

        return redirect('admin/properties/categories');
    }

    public function status_c(Request $request, $id, $flag) {

        Category::where('id', $id)->update(array("status" => $flag));
        $request->session()->flash('alert-success', 'Category status has been updated!');

        return redirect('admin/properties/categories');
    }

    /* Property Management */

    public function list1(Request $request) {

        $properties = Properties::with("get_project_detail", "get_unit", "get_unit.unit", "get_aminities", "get_aminities.amin", "get_category_detail")->orderBy("project_id", "desc")->
                        orderBy("sort_order", "ASC")->get();

        return View('admin.properties.list', compact('properties'), compact('selectedcategories'));
    }

    public function add_property(Request $request, $id = '') {

        if ($id == '') {

            $properties = array();
            $projects = Project::All();
            $categories = Category::All();
            $aminities = Aminities::All();
            $units = Unities::All();
            $type = 'add';
            $selectedaminities = array();
            $selectedunits = array();
            return View('admin.properties.createproperty', compact('properties', 'projects', 'categories', 'aminities', 'units', 'selectedaminities', 'selectedunits', 'type'));
        } else {
            $properties = Properties::find($id);
            $projects = Project::All();
            $selectedprojects = Project::find($properties->project_id);
            $categories = Category::All();
            $selectedcategories = Category::find($properties->property_type);

            $aminities = Aminities::All();
            $selectedaminities = Merge_aminities::where('property_id', $properties->id)->get();

            $units = Unities::All();
            $selectedunits = Merge_unit::where('property_id', $properties->id)->get();
            $type = 'edit';
            return View('admin.properties.createproperty', compact('properties', 'projects', 'selectedprojects', 'categories', 'selectedcategories', 'aminities', 'selectedaminities', 'units', 'selectedunits', 'type'));
        }
    }

    public function delete_property(Request $request, $id) {

        $properties = Properties::find($id);
        $project = Project::find($properties->project_id);

        if ($properties->gallery_location != "") {
            $url = STORE_PATH . "/assets/images/properties/" . $project->gallery_location . "/" . $properties->gallery_location;
            $success = File::deleteDirectory($url);
        }

        Merge_unit::where('property_id', $id)->delete();
        Merge_aminities::where('property_id', $id)->delete();
        Gallery::where('property_id', $id)->delete();
        Properties::destroy($id);

        $request->session()->flash('alert-success', 'Property has been deleted!');
        return redirect('admin/properties/list');
    }

    public function store_property(Request $request, $id = '') {

        if ($request->type == "add") {

            $project = Project::find($request->project_id);
            $pname = str_replace(' ', '-', input_trims(strtolower($request->title_en)));

            $path = STORE_PATH . '/assets/images/properties/' . str_replace(' ', '-', input_trims(strtolower($project->gallery_location))) . '/' . $pname;
            $sudopath = STORE_PATH . "/assets/images/properties/" . str_replace(' ', '-', input_trims(strtolower($project->gallery_location))) . "/" . $pname;
            $result = File::makeDirectory($path, $mode = 0777, true, true);
            chmod($sudopath, 0777);

            $path2 = STORE_PATH . '/assets/images/properties/' . str_replace(' ', '-', input_trims(strtolower($project->gallery_location))) . '/' . $pname . '/brochures';
            $sudopath2 = STORE_PATH . "/assets/images/properties/" . str_replace(' ', '-', input_trims(strtolower($project->gallery_location))) . '/' . $pname . "/brochures";
            $result = File::makeDirectory($path2, $mode = 0777, true, true);
            chmod($sudopath2, 0777);
            $files[] = '';
            $filename[] = '';


            $path3 = STORE_PATH . '/assets/images/properties/' . str_replace(' ', '-', input_trims(strtolower($project->gallery_location))) . '/' . $pname . '/floor-plans';
            $sudopath3 = STORE_PATH . "/assets/images/properties/" . str_replace(' ', '-', input_trims(strtolower($project->gallery_location))) . '/' . $pname . "/floor-plans";
            $result = File::makeDirectory($path3, $mode = 0777, true, true);
            chmod($sudopath3, 0777);


            /* Broucher and Floor plan */
            $doc = $request->file('doc');
            $image1 = $request->file('image1');
            if ($image1) {
                $input['imagename'] = $image1->getClientOriginalName();
                $destinationPath = $path2;
                $image1->move($destinationPath, str_replace(' ', '-', strtolower($input['imagename'])));
            }

            if ($doc) {
                $input['docname'] = $doc->getClientOriginalName();
                $destinationPath = $path3;
                $doc->move($destinationPath, str_replace(' ', '-', strtolower($input['docname'])));
            }


            $image = $request->file('image');
            $header_image = $request->file('header_image');
            $construction_header = $request->file('construction_header');
            $footer_image = $request->file('footer_image');
            $input['imagename'] = '';
            $input['headerimagename'] = '';
            $input['footerimagename'] = '';
            if ($image) {
                $input['imagename'] = 'holder.' . $image->getClientOriginalExtension();
                $destinationPath = $path;
                $image->move($destinationPath, $input['imagename']);
            }

            if ($header_image) {
                $input['headerimagename'] = 'header.' . $header_image->getClientOriginalExtension();
                $destinationPath = $path;
                $header_image->move($destinationPath, $input['headerimagename']);
            }

            if ($construction_header) {
                $input['conheaderimagename'] = 'conheader.' . $construction_header->getClientOriginalExtension();
                $destinationPath = $path;
                $construction_header->move($destinationPath, $input['conheaderimagename']);
            }

            if ($footer_image) {
                $input['footerimagename'] = 'footer.' . $footer_image->getClientOriginalExtension();
                $destinationPath = $path;
                $footer_image->move($destinationPath, $input['footerimagename']);
            }
            $properties = new Properties();

            $properties->project_id = input_trims($request->project_id);
            $properties->title_en = input_trims($request->title_en);
            $properties->title_ar = input_trims($request->title_ar);
            $properties->title_ch = input_trims($request->title_ch);
            $properties->title_hn = input_trims($request->title_hn);
            $properties->title_ur = input_trims($request->title_ur);

            $properties->holder_alt = input_trims($request->holder_alt);
            $properties->header_alt = input_trims($request->header_alt);
            $properties->construction_alt = input_trims($request->construction_alt);
            $properties->footer_alt = input_trims($request->footer_alt);

            $properties->footer_banner_link = input_trims($request->footer_banner_link);

            $properties->location = input_trims($request->location);
            $properties->latitude = input_trims($request->latitude);
            $properties->longitude = input_trims($request->longitude);
            $properties->views_360 = input_trims($request->views_360);

            $properties->short_description_en = input_trims($request->short_description_en);
            $properties->short_description_ar = input_trims($request->short_description_ar);
            $properties->short_description_ch = input_trims($request->short_description_ch);
            $properties->short_description_ur = input_trims($request->short_description_ur);
            $properties->short_description_hn = input_trims($request->short_description_hn);

            $properties->slug = !empty($request->slug) ? str_replace(' ', '-', input_trims(strtolower($request->slug))) : str_replace(' ', '-', input_trims(strtolower($request->title_en)));

            $properties->sort_order = $request->sort_order;
            $properties->slug_updates = !empty($request->slug) ? str_replace(' ', '-', input_trims(strtolower($request->slug . '-updates'))) : str_replace(' ', '-', input_trims(strtolower($request->title_en . '-updates')));
            $properties->meta_title = input_trims($request->meta_title);
            $properties->meta_desc = input_trims($request->meta_desc);
            $properties->meta_keyword = input_trims($request->meta_keyword);

            $properties->long_description_en = input_trims($request->long_description_en);
            $properties->long_description_ar = input_trims($request->long_description_ar);
            $properties->long_description_ch = input_trims($request->long_description_ch);
            $properties->long_description_ur = input_trims($request->long_description_ur);
            $properties->long_description_hn = input_trims($request->long_description_hn);


            $properties->featured = input_trims($request->featured);
            $properties->recent = input_trims($request->recent);
            $properties->completed = input_trims($request->completed);
            $properties->ongoing = input_trims($request->ongoing);

            $properties->property_type = input_trims($request->project_type_id);

            $properties->total_apartment = input_trims($request->total_apartment);
            $properties->video_url = input_trims($request->video_url);
            $properties->building_height = input_trims($request->building_height);
            $properties->building_height_ar = input_trims($request->building_height_ar);
            $properties->building_height_ch = input_trims($request->building_height_ch);
            $properties->building_height_hn = input_trims($request->building_height_hn);
            $properties->building_height_ur = input_trims($request->building_height_ur);


            $properties->status = 1;

            $properties->gallery_location = $pname;
            $properties->header_image = $input['headerimagename'];
            $properties->footer_image = $input['footerimagename'];
            $properties->holder_image = $input['imagename'];
            $properties->construction_header = $input['conheaderimagename'];

            $properties->enquire_call_us = input_trims($request->enquire_call_us);
            $properties->enquire_address = input_trims($request->enquire_address);
            $properties->enquire_email = input_trims($request->enquire_email);
            $properties->updated_at = date('Y-m-d');
            $properties->save();


            $insertedId = $properties->id;

            if (count($request->unit_id) > 0) {

                for ($i = 0; $i < count($request->unit_id); $i++) {
                    $merge_unit = new Merge_unit();
                    $merge_unit->property_id = $insertedId;
                    $merge_unit->unit_id = $request->unit_id[$i];
                    $merge_unit->save();
                }
            }
            if (count($request->aminity_id) > 0) {

                for ($i = 0; $i < count($request->aminity_id); $i++) {
                    $merge_aminities = new Merge_aminities();
                    $merge_aminities->property_id = $insertedId;
                    $merge_aminities->aminity_id = $request->aminity_id[$i];
                    $merge_aminities->save();
                }
            }

            $request->session()->flash('alert-success', 'Project has been added!');
        }
        if ($request->type == "edit") {

            $image = $request->file('image');
            $header_image = $request->file('header_image');
            $construction_header = $request->file('construction_header');
            $footer_image = $request->file('footer_image');
            $input['imagename'] = '';
            $input['headerimagename'] = '';
            $input['footerimagename'] = '';
            $input['conheaderimagename'] = '';


            if ($image) {
                $properties = Properties::find($request->id);
                $project = Project::find($properties->project_id);
                if ($properties->image != "") {
                    $path = STORE_PATH . '/assets/images/properties/' . $project->gallery_location . '/' . $properties->gallery_location . "/" . $properties->image;
                    @unlink($url);
                }
                $input['imagename'] = 'holder.' . $image->getClientOriginalExtension();
                $destinationPath = STORE_PATH . '/assets/images/properties/' . $project->gallery_location . '/' . $properties->gallery_location;
                $image->move($destinationPath, $input['imagename']);
            }
            if ($header_image) {
                $properties = Properties::find($request->id);
                $project = Project::find($properties->project_id);
                if ($properties->header_image != "") {
                    $url = STORE_PATH . '/assets/images/properties/' . $project->gallery_location . '/' . $properties->gallery_location . "/" . $properties->header_image;
                    @unlink($url);
                }

                $input['headerimagename'] = 'header.' . $header_image->getClientOriginalExtension();
                $destinationPath = STORE_PATH . '/assets/images/properties/' . $project->gallery_location . '/' . $properties->gallery_location;
                $header_image->move($destinationPath, $input['headerimagename']);
            }

            if ($construction_header) {
                $properties = Properties::find($request->id);
                $project = Project::find($properties->project_id);
                if ($properties->construction_header != "") {
                    $url = STORE_PATH . '/assets/images/properties/' . $project->gallery_location . '/' . $properties->gallery_location . "/" . $properties->construction_header;
                    @unlink($url);
                }

                $input['conheaderimagename'] = 'conheader.' . $construction_header->getClientOriginalExtension();
                $destinationPath = STORE_PATH . '/assets/images/properties/' . $project->gallery_location . '/' . $properties->gallery_location;
                $construction_header->move($destinationPath, $input['conheaderimagename']);
            }

            if ($footer_image) {
                $properties = Properties::find($request->id);
                $project = Project::find($properties->project_id);
                if ($properties->footer_image != "") {
                    $url = STORE_PATH . '/assets/images/properties/' . $project->gallery_location . '/' . $properties->gallery_location . "/" . $properties->footer_image;
                    @unlink($url);
                }

                $input['footerimagename'] = 'footer.' . $footer_image->getClientOriginalExtension();
                $destinationPath = STORE_PATH . '/assets/images/properties/' . $project->gallery_location . '/' . $properties->gallery_location;
                $footer_image->move($destinationPath, $input['footerimagename']);
            }

            /* Broucher and Floor plans */
            $doc = $request->file('doc');
            $image1 = $request->file('image1');

            $properties = Properties::find($request->id);
            $project = Project::find($properties->project_id);

            if ($doc) {
                $url = STORE_PATH . '/assets/images/properties/' . $project->gallery_location . '/' . $properties->gallery_location . '/floor-plans';
                //@unlink($url);
                $success = File::cleanDirectory($url);

                $doc1 = $doc->getClientOriginalName();
                $destinationPath = STORE_PATH . '/assets/images/properties/' . $project->gallery_location . '/' . $properties->gallery_location . '/floor-plans';
                $doc->move($destinationPath, str_replace(' ', '-', strtolower($doc1)));
            }

            if ($image1) {
                $url = STORE_PATH . '/assets/images/properties/' . $project->gallery_location . '/' . $properties->gallery_location . '/brochures';
                //@unlink($url);
                $success = File::cleanDirectory($url);

                $img = $image1->getClientOriginalName();
                $destinationPath = STORE_PATH . '/assets/images/properties/' . $project->gallery_location . '/' . $properties->gallery_location . '/brochures';
                $image1->move($destinationPath, str_replace(' ', '-', strtolower($img)));
            }

            $data = array();
            if ($input['imagename'] != "") {
                $data['holder_image'] = $input['imagename'];
            }
            if ($input['headerimagename'] != "") {
                $data['header_image'] = $input['headerimagename'];
            }

            if ($input['conheaderimagename']) {
                $data['construction_header'] = $input['conheaderimagename'];
            }

            if ($input['footerimagename'] != "") {
                $data['footer_image'] = $input['footerimagename'];
            }

            $data['footer_banner_link'] = input_trims($request->footer_banner_link);
            if ($request->project_id) {
                $data['project_id'] = input_trims($request->project_id);
            }
            if ($request->title_en) {
                $data['title_en'] = input_trims($request->title_en);
            }
            if ($request->title_ar) {
                $data['title_ar'] = input_trims($request->title_ar);
            }
            if ($request->title_ch) {
                $data['title_ch'] = input_trims($request->title_ch);
            }
            if ($request->title_hn) {
                $data['title_hn'] = input_trims($request->title_hn);
            }
            if ($request->title_ur) {
                $data['title_ur'] = input_trims($request->title_ur);
            }
            if ($request->location) {
                $data['location'] = input_trims($request->location);
            }
            if ($request->latitude) {
                $data['latitude'] = input_trims($request->latitude);
            }
            if ($request->longitude) {
                $data['longitude'] = input_trims($request->longitude);
            }

            if ($request->views_360) {
                $data['views_360'] = input_trims($request->views_360);
            }

            if ($request->short_description_en) {
                $data['short_description_en'] = input_trims($request->short_description_en);
            }
            if ($request->short_description_ar) {
                $data['short_description_ar'] = input_trims($request->short_description_ar);
            }
            if ($request->short_description_ch) {
                $data['short_description_ch'] = input_trims($request->short_description_ch);
            }
            if ($request->short_description_ur) {
                $data['short_description_ur'] = input_trims($request->short_description_ur);
            }
            if ($request->short_description_hn) {
                $data['short_description_hn'] = input_trims($request->short_description_hn);
            }
            if ($request->long_description_en) {
                $data['long_description_en'] = input_trims($request->long_description_en);
            }
            if ($request->long_description_ar) {
                $data['long_description_ar'] = input_trims($request->long_description_ar);
            }
            if ($request->long_description_ch) {
                $data['long_description_ch'] = input_trims($request->long_description_ch);
            }
            if ($request->long_description_ur) {
                $data['long_description_ur'] = input_trims($request->long_description_ur);
            }
            if ($request->long_description_hn) {
                $data['long_description_hn'] = input_trims($request->long_description_hn);
            }

            $data['holder_alt'] = input_trims($request->holder_alt);
            $data['header_alt'] = input_trims($request->header_alt);
            $data['construction_alt'] = input_trims($request->construction_alt);
            $data['footer_alt'] = input_trims($request->footer_alt);
            $data['building_height_ar'] = input_trims($request->building_height_ar);
            $data['building_height_ch'] = input_trims($request->building_height_ch);
            $data['building_height_hn'] = input_trims($request->building_height_hn);
            $data['building_height_ur'] = input_trims($request->building_height_ur);

            $data['featured'] = input_trims($request->featured);
            $data['recent'] = input_trims($request->recent);
            $data['completed'] = input_trims($request->completed);
            $data['ongoing'] = input_trims($request->ongoing);
            $data['slug_updates'] = !empty($request->slug) ? str_replace(' ', '-', input_trims(strtolower($request->slug . '-updates'))) : str_replace(' ', '-', input_trims(strtolower($request->title_en . '-updates')));
            $data['slug'] = !empty($request->slug) ? str_replace(' ', '-', input_trims(strtolower($request->slug))) : str_replace(' ', '-', input_trims(strtolower($request->title_en)));
            $data['gallery_location'] = !empty($request->slug) ? str_replace(' ', '-', input_trims(strtolower($request->slug))) : str_replace(' ', '-', input_trims(strtolower($request->title_en)));
            $data['sort_order'] = input_trims($request->sort_order);
            $data['meta_title'] = input_trims($request->meta_title);
            $data['meta_keyword'] = input_trims($request->meta_keyword);
            $data['meta_desc'] = input_trims($request->meta_desc);
            $data['updated_at'] = date('Y-m-d');
            if ($request->project_type_id) {
                $data['property_type'] = input_trims($request->project_type_id);
            }
            if ($request->total_apartment) {
                $data['total_apartment'] = input_trims($request->total_apartment);
            }
            if ($request->video_url) {
                $data['video_url'] = input_trims($request->video_url);
            }
            if ($request->building_height) {
                $data['building_height'] = input_trims($request->building_height);
            }
            if ($request->enquire_call_us) {
                $data['enquire_call_us'] = input_trims($request->enquire_call_us);
            }
            if ($request->enquire_address) {
                $data['enquire_address'] = input_trims($request->enquire_address);
            }
            if ($request->enquire_email) {
                $data['enquire_email'] = input_trims($request->enquire_email);
            }
            //echo '<pre>'; print_r($data); echo '</pre>'; die();
            Merge_unit::where('property_id', $request->id)->delete();

            if (count($request->unit_id) > 0) {

                for ($i = 0; $i < count($request->unit_id); $i++) {
                    $merge_unit = new Merge_unit();
                    $merge_unit->property_id = $request->id;
                    $merge_unit->unit_id = $request->unit_id[$i];
                    $merge_unit->save();
                }
            }

            Merge_aminities::where('property_id', $request->id)->delete();

            if (count($request->aminity_id) > 0) {

                for ($i = 0; $i < count($request->aminity_id); $i++) {
                    $merge_aminities = new Merge_aminities();
                    $merge_aminities->property_id = $request->id;
                    $merge_aminities->aminity_id = $request->aminity_id[$i];
                    $merge_aminities->save();
                }
            }

            if (!empty($data)) {
                Properties::where('id', $request->id)->update($data);
            }

            $request->session()->flash('alert-success', 'Property has been updated!');
        }

        return redirect('admin/properties/list');
    }

    public function status_property(Request $request, $id, $flag) {

        properties::where('id', $id)->update(array("status" => $flag));
        $request->session()->flash('alert-success', 'Property status has been updated!');

        return redirect('admin/properties/list');
    }

    # Front property list

    public function getProperty(Request $request, $id = 0) {

        $project = Project::find($id);

        $records = Properties::where('project_id', $id)->where('status', '1')->get();
        $properties = array();

        if (!empty($records)) {
            $i = 0;
            foreach ($records as $record) {

                if (strlen($record->title_en) <= 24) {
                    $properties[$i]['title'] = $record->title_en;
                } else {
                    $properties[$i]['title'] = substr($record->title_en, 0, 24) . "..";
                }

                $properties[$i]['id'] = $record->id;
                $properties[$i]['featured'] = $record->featured;
                $properties[$i]['recent'] = $record->recent;
                $properties[$i]['completed'] = $record->completed;
                $properties[$i]['ongoing'] = $record->ongoing;

                $class = " ";
                if ($record->featured == "1") {
                    $class .= " featured ";
                }
                if ($record->recent == "1") {
                    $class .= " recent ";
                }
                if ($record->completed == "1") {
                    $class .= " completed ";
                }
                if ($record->ongoing == "1") {
                    $class .= " ongoing ";
                }

                $properties[$i]['class'] = $class;

                $i++;
            }
        }



        return View('projects-by-area', compact('properties', 'project'));
    }

    public function getPropertyDetail(Request $request, $id = 0) {

        $records = Properties::with("get_project_detail", "get_unit", "get_unit.unit", "get_aminities", "get_aminities.amin")->find($id);

        $project = $records->get_project_detail->title_en;


        $units = $records->get_unit;
        $aminities = $records->get_aminities;

        return View('project_detail', compact('records', 'units', 'aminities', 'project'));
    }

    public function getEventDetail(Request $request, $id = 0) {

        $record = Event::find($id);
        $data = array();
        $data['event_title'] = $record->event_title;
        $data['event_photo'] = $record->event_photo;
        $data['event_date'] = date("d F Y", strtotime($record->event_date));
        $data['long_desc'] = $record->long_desc;
        $data['extra_desc'] = $record->extra_desc;
        $data['starting_from'] = $record->starting_from;
        $data['booking_fees'] = $record->booking_fees;
        $data['payment_plan'] = $record->payment_plan;
        $data['mortgage_starting'] = $record->mortgage_starting;
        $data['visit_us_at'] = $record->visit_us_at;

        $ptype = "1";

        return View('mediacenter-eventgallery-detail', compact('data', 'ptype'));
    }

    /* Near by place seaction */

    public function near_places(Request $request, $id = 0) {


        $results = DB::table('tbl_near_place')
                ->leftJoin('tbl_projects', 'tbl_projects.id', '=', 'tbl_near_place.project_id')
                ->groupBy("project_id")
                ->get();



        return View('admin.properties.near_places', compact('results'));
    }

    public function add_places(Request $request, $id = '') {

        $projects = Project::All();

        if ($id == '') {

            $near = array();
            $type = 'add';
            return View('admin.properties.createplaces', compact('near', 'type', 'projects', 'id'));
        } else {
            $near = Near::where("project_id", $id)->get();
            $type = 'edit';
            return View('admin.properties.createplaces', compact('near', 'type', 'projects', 'id'));
        }
    }

    public function updateplace(Request $request, $id = '') {

        if ($request->type == "add") {

            $titles_en = $request->title_en;
            $titles_ch = $request->title_ch;
            $titles_hn = $request->title_hn;
            $titles_ur = $request->title_ur;
            $titles_ar = $request->title_ar;

            $des_en = $request->description_en;
            $des_ar = $request->description_ar;
            $des_ch = $request->description_ch;
            $des_hn = $request->description_hn;
            $des_ur = $request->description_ur;
            $image = $request->file('image');

            if (!empty($titles_en)) {
                for ($i = 0; $i < count($titles_en); $i++) {

                    $input['imagename'] = '';
                    if ($image[$i]) {
                        $input['imagename'] = time() . rand() . '.' . $image[$i]->getClientOriginalExtension();
                        $destinationPath = STORE_PATH . ('/assets/images/near');
                        $image[$i]->move($destinationPath, $input['imagename']);
                    }

                    $near = new Near();
                    $near->project_id = input_trims($request->project_id);
                    $near->title_en = input_trims($titles_en[$i]);
                    $near->title_ar = input_trims($titles_ar[$i]);
                    $near->title_ch = input_trims($titles_ch[$i]);
                    $near->title_hn = input_trims($titles_hn[$i]);
                    $near->title_ur = input_trims($titles_ur[$i]);

                    $near->description_en = input_trims($des_en[$i]);
                    $near->description_ar = input_trims($des_ar[$i]);
                    $near->description_ch = input_trims($des_ch[$i]);
                    $near->description_hn = input_trims($des_hn[$i]);
                    $near->description_ur = input_trims($des_ur[$i]);

                    $near->created = date("Y-m-d H:i:s");
                    $near->image = input_trims($input['imagename']);
                    $near->status_flag = '1';
                    $near->save();
                }
            }

            $request->session()->flash('alert-success', 'Near by place has been added!');
        }
        if ($request->type == "edit") {

            // Delete record

            Near::where('project_id', $id)->delete();
            // insert	

            $titles_en = $request->title_en;
            $titles_ch = $request->title_ch;
            $titles_hn = $request->title_hn;
            $titles_ur = $request->title_ur;
            $titles_ar = $request->title_ar;
            $old_image = $request->old_images;

            $des_en = $request->description_en;
            $des_ar = $request->description_ar;
            $des_ch = $request->description_ch;
            $des_hn = $request->description_hn;
            $des_ur = $request->description_ur;
            $image = $request->file('image');


            if (!empty($titles_en)) {
                for ($i = 0; $i < count($titles_en); $i++) {

                    $input['imagename'] = '';
                    if (isset($image[$i])) {
                        $input['imagename'] = time() . rand() . '.' . $image[$i]->getClientOriginalExtension();
                        $destinationPath = STORE_PATH . ('/assets/images/near');
                        $image[$i]->move($destinationPath, $input['imagename']);

                        $url = STORE_PATH . "/assets/images/near/" . @$old_image[$i];
                        @unlink($url);
                    } else {
                        $input['imagename'] = @$old_image[$i];
                    }

                    $near = new Near();
                    $near->project_id = input_trims($request->project_id);
                    $near->title_en = input_trims($titles_en[$i]);
                    $near->title_ar = input_trims($titles_ar[$i]);
                    $near->title_ch = input_trims($titles_ch[$i]);
                    $near->title_hn = input_trims($titles_hn[$i]);
                    $near->title_ur = input_trims($titles_ur[$i]);

                    $near->description_en = input_trims($des_en[$i]);
                    $near->description_ar = input_trims($des_ar[$i]);
                    $near->description_ch = input_trims($des_ch[$i]);
                    $near->description_hn = input_trims($des_hn[$i]);
                    $near->description_ur = input_trims($des_ur[$i]);

                    $near->created = date("Y-m-d H:i:s");
                    $near->image = input_trims($input['imagename']);
                    $near->status_flag = '1';
                    $near->save();
                }
            }

            $request->session()->flash('alert-success', 'Near by place has been updated!');
        }

        return redirect('admin/properties/near');
    }

    public function status_n(Request $request, $id, $flag) {

        Near::where('project_id', $id)->update(array("status_flag" => $flag));
        $request->session()->flash('alert-success', 'Status has been updated!');

        return redirect('admin/properties/near');
    }

    public function delete_place(Request $request, $id) {
        $nears = Near::where("project_id", $id)->get();

        if (!empty($nears)) {
            foreach ($nears as $near) {
                if ($near->image != "") {
                    $url = STORE_PATH . "/assets/images/near/" . $near->image;
                    @unlink($url);
                }
            }
        }

        Near::where('project_id', $id)->delete();
        $request->session()->flash('alert-success', 'Record has been deleted!');
        return redirect('admin/properties/near');
    }

    /* Available Units for Booking Management */

    public function availableunits() {
        $results = Availableunits::groupBy("property_id")->get();
        $response = array();
        if (!empty($results)) {
            $i = 0;
            foreach ($results as $res) {
                $prop = Properties::find($res->property_id);
                $response[$i]['prop_id'] = $res->property_id;
                $response[$i]['title'] = $prop->title_en;
                $response[$i]['image'] = $res->image;
                $response[$i]['status'] = $res->status;
                $i++;
            }
        }
        return View('admin.properties.availableunits', compact('response'));
    }

    public function add_availableunits(Request $request, $id = '') {
        $projects = Project::All();
        if ($id == '') {
            $props = array();
            $results = array();
            $type = 'add';
            $project_id = '';
            return View('admin.properties.addavailableunits', compact('results', 'type', 'projects', 'id', 'props', 'project_id'));
        } else {
            $props = Properties::All();
            $results = Gallery::where("property_id", $id)->get();
            $project = Properties::find($id);
            $project_id = $project->project_id;
            $allunitsforprop = Merge_unit::where("property_id", $id)->get();

            $i = 0;
            foreach ($allunitsforprop as $allunitsforpro) {
                $availableunits = Unities::where("id", $allunitsforpro->unit_id)->get()->first();
                $availableunitname[$i] = $availableunits->title_en;
                $i++;
            }

            $availableun = Availableunits::where("property_id", $id)->get();

            $i = 0;
            foreach ($availableun as $availableunit) {
                $unitsa = Unities::where("id", $availableunit->unit_id)->get();
                foreach ($unitsa as $unitsav) {
                    $unit_ids[$i] = $unitsav->id;
                    $availableunitprice[$i] = $availableunit->price;
                }
                $i++;
            }

            $type = 'edit';
            return View('admin.properties.addavailableunits', compact('results', 'type', 'projects', 'id', 'props', 'project_id', 'availableunitname', 'unit_ids', 'unit_names', 'allunitsforprop', 'availableunitprice'));
        }
    }

    public function ajax_getproperties_unit(Request $request, $id = '') {
        $results = Properties::where("project_id", $request->title_en)->get();
        return View('admin.properties.ajax_properties_units', compact('results'));
    }

    public function ajax_getunits(Request $request, $id = '') {
        $results = Merge_unit::where("property_id", $request->pid)->get();
        $i = 0;
        foreach ($results as $res) {
            $uu = Unities::where("id", $res->unit_id)->get()->first();
            $allunits[$i] = $uu->title_en;
            $allunitsids[$i] = $uu->id;
            $i++;
        }
        return View('admin.properties.ajax_units', compact('results', 'allunits', 'allunitsids'));
    }

    public function update_availableunits(Request $request) {
        if ($request->type == "add") {

            if (count($request->avail_unit_name) > 0) {
                for ($i = 0; $i < count($request->avail_unit_name); $i++) {

                    $availableunits = new Availableunits();
                    $availableunits->property_id = $request->pid;
                    $availableunits->unit_id = $request->avail_unit_name[$i];
                    $availableunits->unit_merge_property_id = $request->merge_unit_array[$i];
                    if ($request->avail_unit_price[$request->avail_unit_name[$i]]) {
                        $availableunits->price = $request->avail_unit_price[$request->avail_unit_name[$i]];
                    } else {
                        $availableunits->price = 0;
                    }

                    $availableunits->status = '1';
                    $availableunits->created = date("Y-m-d H:i:s");
                    $availableunits->save();
                }
            }


            $request->session()->flash('alert-success', 'Available Units has been added!');
        }
        if ($request->type == "edit") {

            Availableunits::where('property_id', $request->pid)->delete();

            $newpricearray = array();
            $i = 0;

            $data = array();

            if (count($request->avail_unit_name) > 0) {
                for ($i = 0; $i < count($request->avail_unit_name); $i++) {
                    $availableunits = new Availableunits();
                    $availableunits->property_id = $request->pid;
                    $availableunits->unit_id = $request->avail_unit_name[$i];
                    $availableunits->unit_merge_property_id = $request->merge_unit_array[$i];
                    $availableunits->price = $request->avail_unit_price[$request->avail_unit_name[$i]];
                    $availableunits->status = '1';
                    $availableunits->created = date("Y-m-d H:i:s");
                    $availableunits->save();
                }
            }
            $request->session()->flash('alert-success', 'Available Units has been updated!');
        }
        return redirect('admin/properties/availableunits');
    }

    public function delete_availableunit(Request $request, $id) {
        Availableunits::where('property_id', $id)->delete();
        $request->session()->flash('alert-success', 'Available units has been deleted!');
        return redirect('admin/properties/availableunits');
    }

    public function statusavailableunits(Request $request, $id, $flag) {
        Availableunits::where('property_id', $id)->update(array("status" => $flag));
        $request->session()->flash('alert-success', 'Status has been updated!');
        return redirect('admin/properties/availableunits');
    }

    /* Gallery Management */

    public function gallery() {
        $results = Gallery::groupBy("property_id")->get();
        $response = array();
        if (!empty($results)) {
            $i = 0;

            foreach ($results as $res) {
                $prop = Properties::find($res->property_id);
                if (isset($prop)) {
                    $response[$i]['prop_id'] = $res->property_id;
                    $response[$i]['title'] = $prop->title_en;
                    $response[$i]['image'] = $res->image;
                    $response[$i]['status'] = $res->status;
                }
                $i++;
            }
        }
        return View('admin.properties.galleries', compact('response'));
    }

    public function unitgallery() {
        $results = Gallery::groupBy("property_id")->get();
        $response = array();
        if (!empty($results)) {
            $i = 0;
            foreach ($results as $res) {
                $prop = Properties::find($res->property_id);
                $response[$i]['prop_id'] = $res->property_id;
                $response[$i]['title'] = $prop->title_en;
                $response[$i]['image'] = $res->image;
                $response[$i]['status'] = $res->status;
                $i++;
            }
        }
        return View('admin.properties.unitgalleries', compact('response'));
    }

    /* Unit Gallery */

    public function addphoto(Request $request, $id = '') {
        $results = Unitgallery::where("unit_merge_property_id", $id)->get();
        $unit_detail_data = array();
        $unit_detail_id = "";

        $unit_merge_data = Merge_unit::find($id);
        $property_id = $unit_merge_data->property_id;
        $unit_id = $unit_merge_data->unit_id;

        $property_data = Properties::find($property_id);
        $project_data = Project::where('id', $property_data->project_id)->get()->first();
        $unit_data = Unities::find($unit_id);

        $unit_detail_data = Unitdetails::where('pmuid', $id)->get()->first();
        if (count($unit_detail_data) > 0) {
            $unit_detail_id = $unit_detail_data->id;
        }

        return View('admin.properties.unitgalleries', compact('results', 'id', 'property_data', 'unit_data', 'property_id', 'unit_id', 'unit_detail_id', 'project_data'));
    }

    public function updateupload(Request $request, $id = '') {

        $photos = Unitgallery::where("unit_merge_property_id", $request->id)->get();

        $unit_merge_data = Merge_unit::find($id);
        $property_id = $unit_merge_data->property_id;
        $unit_id = $unit_merge_data->unit_id;

        $property_data = Properties::find($property_id);
        $project_data = Project::where('id', $property_data->project_id)->get()->first();
        $unit_data = Unities::find($unit_id);

        $unit_detail_data = array();
        $unit_detail_data = Unitdetails::where('pmuid', $id)->get()->first();


        $old_files = $request->old_files;

        $image = $request->file('image');
        $old_id = $request->old_id;



        $photoids = array();
        if (!empty($photos)) {
            foreach ($photos as $photo) {
                if (!in_array($photo->id, $old_id)) {
                    $rec = Unitgallery::find($photo->id);
                    if ($rec->image != "") {
                        $path2 = STORE_PATH . '/assets/images/properties/' . $project_data->gallery_location . '/' . $property_data->gallery_location . '/unit';
                        if (file_exists($path2)) {
                            $url = STORE_PATH . "/assets/images/properties/" . $project_data->gallery_location . "/" . $property_data->gallery_location . "/unit/" . @$rec->image;
                            @unlink($url);
                        }
                    }
                    Unitgallery::where('id', $photo->id)->delete();
                }
            }
        }

        $files = array();
        $filename = array();
        if (!empty($old_files)) {
            for ($i = 0; $i < count($old_files); $i++) {
                $input['imagename'] = '';
                $flag = 0;
                if (isset($image[$i])) {
                    $input['imagename'] = time() . rand() . '.' . $image[$i]->getClientOriginalExtension();
                    $path2 = STORE_PATH . '/assets/images/properties/' . $project_data->gallery_location . '/' . $property_data->gallery_location . '/unit';
                    if (!file_exists($path2)) {
                        $sudopath2 = STORE_PATH . "/assets/images/properties/" . $project_data->gallery_location . '/' . $property_data->gallery_location . "/unit";
                        $result = File::makeDirectory($path2, $mode = 0777, true, true);
                        chmod($sudopath2, 0777);
                    }
                    $image[$i]->move($path2, $input['imagename']);
                    if (isset($image[$i]) && $old_id[$i] == "") {
                        $gal = new Unitgallery();
                        $gal->property_id = $property_id;
                        $gal->unit_id = $unit_id;

                        if (count($unit_detail_data) > 0) {
                            $gal->unit_detail_id = $unit_detail_data->id;
                        } else {
                            $gal->unit_detail_id = '0';
                        }
                        $gal->unit_merge_property_id = $request->id;
                        $gal->image = $input['imagename'];
                        $gal->status = '1';
                        $gal->created = date("Y-m-d H:i:s");
                        $gal->save();
                    } else if (isset($image[$i]) && $old_id[$i] != "") {
                        $data = array();
                        $data['image'] = $input['imagename'];
                        $rec = Unitgallery::find($old_id[$i]);
                        Unitgallery::where('id', $old_id[$i])->update($data);
                        $url = STORE_PATH . "/assets/images/properties/" . $project_data->gallery_location . "/" . $property_data->gallery_location . "/Unit/" . @$rec->image;
                        @unlink($url);
                    }
                } else {
                    
                }
            }
        }

        $request->session()->flash('alert-success', 'Photo has been uploaded into UNIT gallery');
        return redirect('admin/properties/list');
    }

    /* Floor Plan Gallery */

    public function addphotosfloorplan(Request $request, $id = '') {
        $results = Floorplangallery::where("unit_merge_property_id", $id)->get();
        $unit_detail_data = array();
        $unit_detail_id = "";

        $unit_merge_data = Merge_unit::find($id);
        $property_id = $unit_merge_data->property_id;
        $unit_id = $unit_merge_data->unit_id;

        $property_data = Properties::find($property_id);
        $project_data = Project::where('id', $property_data->project_id)->get()->first();
        $unit_data = Unities::find($unit_id);

        $unit_detail_data = Unitdetails::where('pmuid', $id)->get()->first();
        if (count($unit_detail_data) > 0) {
            $unit_detail_id = $unit_detail_data->id;
        }

        return View('admin.properties.unitgalleriesfloorplan', compact('results', 'id', 'property_data', 'unit_data', 'property_id', 'unit_id', 'unit_detail_id', 'project_data'));
    }

    public function updatefloorplanupload(Request $request, $id = '') {

        $photos = Floorplangallery::where("unit_merge_property_id", $request->id)->get();

        $unit_merge_data = Merge_unit::find($id);
        $property_id = $unit_merge_data->property_id;
        $unit_id = $unit_merge_data->unit_id;

        $property_data = Properties::find($property_id);
        $project_data = Project::where('id', $property_data->project_id)->get()->first();
        $unit_data = Unities::find($unit_id);

        $unit_detail_data = array();
        $unit_detail_data = Unitdetails::where('pmuid', $id)->get()->first();


        $old_files = $request->old_files;

        $image = $request->file('image');
        $old_id = $request->old_id;



        $photoids = array();
        if (!empty($photos)) {
            foreach ($photos as $photo) {
                if (!in_array($photo->id, $old_id)) {
                    $rec = Floorplangallery::find($photo->id);
                    if ($rec->image != "") {
                        $path2 = STORE_PATH . '/assets/images/properties/' . $project_data->gallery_location . '/' . $property_data->gallery_location . '/unit';
                        if (file_exists($path2)) {
                            $url = STORE_PATH . "/assets/images/properties/" . $project_data->gallery_location . "/" . $property_data->gallery_location . "/unit/" . @$rec->image;
                            @unlink($url);
                        }
                    }
                    Floorplangallery::where('id', $photo->id)->delete();
                }
            }
        }

        $files = array();
        $filename = array();
        if (!empty($old_files)) {
            for ($i = 0; $i < count($old_files); $i++) {
                $input['imagename'] = '';
                $flag = 0;
                if (isset($image[$i])) {
                    $input['imagename'] = time() . rand() . '.' . $image[$i]->getClientOriginalExtension();
                    $path2 = STORE_PATH . '/assets/images/properties/' . $project_data->gallery_location . '/' . $property_data->gallery_location . '/unit';
                    if (!file_exists($path2)) {
                        $sudopath2 = STORE_PATH . "/assets/images/properties/" . $project_data->gallery_location . '/' . $property_data->gallery_location . "/unit";
                        $result = File::makeDirectory($path2, $mode = 0777, true, true);
                        chmod($sudopath2, 0777);
                    }
                    $image[$i]->move($path2, $input['imagename']);
                    if (isset($image[$i]) && $old_id[$i] == "") {
                        $gal = new Floorplangallery();
                        $gal->property_id = $property_id;
                        $gal->unit_id = $unit_id;

                        if (count($unit_detail_data) > 0) {
                            $gal->unit_detail_id = $unit_detail_data->id;
                        } else {
                            $gal->unit_detail_id = '0';
                        }
                        $gal->unit_merge_property_id = $request->id;
                        $gal->image = $input['imagename'];
                        $gal->status = '1';
                        $gal->created = date("Y-m-d H:i:s");
                        $gal->save();
                    } else if (isset($image[$i]) && $old_id[$i] != "") {
                        $data = array();
                        $data['image'] = $input['imagename'];
                        $rec = Floorplangallery::find($old_id[$i]);
                        Floorplangallery::where('id', $old_id[$i])->update($data);
                        $url = STORE_PATH . "/assets/images/properties/" . $project_data->gallery_location . "/" . $property_data->gallery_location . "/unit/" . @$rec->image;
                        @unlink($url);
                    }
                } else {
                    
                }
            }
        }

        $request->session()->flash('alert-success', 'Photo has been uploaded into UNIT gallery');
        return redirect('admin/properties/list');
    }

    public function add_gallery(Request $request, $id = '') {
        $projects = Project::All();
        $UnitTypes = Unities::select('id', 'title_en')->get();
        if ($id == '') {
            $props = array();
            $results = array();
            $type = 'add';
            $project_id = '';
            return View('admin.properties.addgallery', compact('results', 'type', 'projects', 'id', 'props', 'project_id', 'UnitTypes'));
        } else {
            $props = Properties::All();
            $results = Gallery::where("property_id", $id)->get();
            $project = Properties::find($id);
            $project_id = $project->project_id;
            $project_data = Project::where("id", $project_id)->first();

            $project_location = $project_data->gallery_location;
            $prop_location = $project->gallery_location;
            $type = 'edit';
            return View('admin.properties.addgallery', compact('results', 'type', 'projects', 'id', 'props', 'project_id', 'project_location', 'prop_location', 'UnitTypes'));
        }
    }

    public function ajax_getproperties(Request $request, $id = '') {
        $results = Properties::where("project_id", $request->title_en)->get();
        return View('admin.properties.ajax_properties', compact('results'));
    }

    public function update_gallery(Request $request) {
        if ($request->type == "add") {

            $image = $request->file('image');
            $prop = Properties::find($request->pid);
            $project = Project::find($prop->project_id);
            $unitid = $request->unitid;

            if (!empty($image)) {
                for ($i = 0; $i < count($image); $i++) {

                    $input['imagename'] = '';
                    if ($image[$i]) {
                        $input['imagename'] = time() . rand() . '.' . $image[$i]->getClientOriginalExtension();
                        $destinationPath = STORE_PATH . ('/assets/images/properties/' . $project->gallery_location . '/' . $prop->gallery_location);
                        $image[$i]->move($destinationPath, $input['imagename']);
                    }

                    $gal = new Gallery();
                    $gal->property_id = $request->pid;
                    $gal->image = input_trims($input['imagename']);
                    $gal->unit_type_id = !empty($unitid[$i]) ? $unitid[$i] : 0;
                    $gal->created = date("Y-m-d H:i:s");
                    $gal->status = '1';
                    $gal->save();
                }
            }

            $request->session()->flash('alert-success', 'Gallery has been added!');
        }
        if ($request->type == "edit") {

            $image = $request->file('image');
            $old_image = $request->old_images;
            $old_id = $request->old_id;
            $unitid = $request->unitid;
            $prop = Properties::find($request->pid);
            $project = Project::find($prop->project_id);


            $photos = Gallery::where('property_id', $request->pid)->get();

            $photoids = array();
            if (!empty($photos)) {
                foreach ($photos as $photo) {
                    if (!in_array($photo->id, $old_id)) {

                        $rec = Gallery::find($photo->id);
                        if ($rec->image != "") {
                            $url = STORE_PATH . "/assets/images/properties/" . $project->gallery_location . '/' . $prop->gallery_location . "/" . @$rec->image;
                            @unlink($url);
                        }

                        Gallery::where('id', $photo->id)->delete();
                    }
                }
            }
            
            if (!empty($old_image)) {
                for ($i = 0; $i < count($old_image); $i++) {

                    $input['imagename'] = '';
                    $flag = 0;
                    
                    if (empty($image[$i]) && $old_id[$i] != "") {
                        $data = array();
                        $data['property_id'] = $request->pid;
                        //$data['image'] = $input['imagename'];
                        $data['created'] = date("Y-m-d H:i:s");
                        $data['unit_type_id'] = !empty($unitid[$i]) ? $unitid[$i] : 0;
                        $data['status'] = "1";
                        //echo '<pre>'; print_r($data); echo '</pre>';
                        Gallery::where('property_id', $request->pid )->where('id', $old_id[$i])->update($data);
                        //$url = STORE_PATH . "/assets/images/properties/" . $project->gallery_location . '/' . $prop->gallery_location . "/" . @$old_image[$i];
                        //@unlink($url);
                    }                     
                    else if (isset($image[$i])) {
                        $input['imagename'] = time() . rand() . '.' . $image[$i]->getClientOriginalExtension();
                        $destinationPath = STORE_PATH . ('/assets/images/properties/' . $project->gallery_location . '/' . $prop->gallery_location);
                        $image[$i]->move($destinationPath, $input['imagename']);

                        if (!empty($image[$i]) && $old_id[$i] == "") {
                            $gal = new Gallery();
                            $gal->property_id = $request->pid;
                            $gal->image = $input['imagename'];
                            $gal->created = date("Y-m-d H:i:s");
                            $gal->status = '1';
                            $gal->unit_type_id = !empty($unitid[$i]) ? $unitid[$i] : 0;
                            //echo '<pre>'; print_r($gal); echo '</pre>'; die();
                            $gal->save();
                        } 
                    }
                    
                }
                
                
            }

            $request->session()->flash('alert-success', 'Gallery has been updated!');
        }

        return redirect('admin/properties/gallery');
    }

    public function delete_gallery(Request $request, $id = '') {
        $galleries = Gallery::where("property_id", $id)->get();

        $prop = Properties::find($id);
        $property_location = $prop->gallery_location;

        $project = Project::find($prop->project_id);
        $project_location = $project->gallery_location;

        if (!empty($galleries)) {
            foreach ($galleries as $gal) {
                if ($gal->image != "") {
                    $url = STORE_PATH . "/assets/images/properties/" . $project_location . "/" . $property_location . "/" . $gal->image;
                    @unlink($url);
                }
            }
        }

        Gallery::where('property_id', $id)->delete();
        $request->session()->flash('alert-success', 'Gallery has been deleted!');
        return redirect('admin/properties/gallery');
    }

    public function statusg(Request $request, $id, $flag) {
        Gallery::where('property_id', $id)->update(array("status" => $flag));
        $request->session()->flash('alert-success', 'Status has been updated!');
        return redirect('admin/properties/gallery');
    }

    /* Construction management */

    public function construction() {
        $results = Properties::orderBy('title_en','asc')->get();
        return View('admin.properties.construction', compact('results'));
    }

    public function edit_construction(Request $request, $id = '') {
        $result = Properties::find($id);
        return View('admin.properties.constructionedit', compact('result'));
    }

    public function updateconstruction(Request $request, $id = '') {
        $result = [];
        if ($request->id != "") {
            $data = array();
            $data['mobilization_percentage'] = !empty($request->mobilization_percentage)?$request->mobilization_percentage:0;
            $data['structure_percentage'] = !empty($request->structure_percentage)?$request->structure_percentage:0;
            $data['mep_percentage'] =!empty( $request->mep_percentage)? $request->mep_percentage:0;
            $data['finishes_percentage'] = !empty($request->finishes_percentage)?$request->finishes_percentage:0;
            $data['nfcstatus'] = !empty($request->nfcstatus)?$request->nfcstatus:'';
            $data['total_completion'] = $request->total_completion;
            $data['enquire_call_us'] = $request->enquire_call_us;
            $data['enquire_address'] = $request->enquire_address;
            $data['enquire_email'] = $request->enquire_email;
            if ($request->plan_start_date != "") {
                $data['plan_start_date'] = $request->plan_start_date;
            }
            if ($request->plan_end_date != "") {
                $data['plan_end_date'] = $request->plan_end_date;
            }

            Properties::where('id', $request->id)->update($data);
            $result = Properties::find($id);
            $request->session()->flash('alert-success', 'Construction has been updated');
        } else {
            $request->session()->flash('alert-danger', 'Something wrong..');
        }


        return View('admin.properties.constructionedit', compact('result'));
    }

    /* Construction Gallery Management */

    public function medias() {
        $results = Construction_gallery::groupBy("property_id")->get();
        $response = array();
        if (!empty($results)) {
            $i = 0;
            foreach ($results as $res) {
                $prop = Properties::find($res->property_id);


                if (!empty($prop)) {
                    $response[$i]['prop_id'] = $res->property_id;
                    $response[$i]['title'] = $prop->title_en;
                    $response[$i]['image'] = $res->image;
                    $response[$i]['status'] = $res->status;
                    $i++;
                }
            }
        }
        return View('admin.properties.medias', compact('response'));
    }

    public function add_media(Request $request, $id = '') {

        $projects = Project::All();

        if ($id == '') {
            $props = array();
            $results = array();
            $type = 'add';
            $project_id = '';
            return View('admin.properties.addmedia', compact('results', 'type', 'projects', 'id', 'props', 'project_id'));
        } else {
            $props = Properties::All();

            $results = Construction_gallery::where("property_id", $id)->get();
            $project = Properties::find($id);
            $project_id = $project->project_id;
            $project_data = Project::where("id", $project_id)->first();

            $project_location = $project_data->gallery_location;
            $prop_location = $project->gallery_location;
            $type = 'edit';

            return View('admin.properties.addmedia', compact('results', 'type', 'projects', 'id', 'props', 'project_id', 'project_location', 'prop_location'));
        }
    }

    public function add_caption(Request $request, $id = '') {
        $type = 'edit';
        $props = Properties::All();

        $results = Construction_gallery::where("property_id", $id)->get();
        $project = Properties::find($id);
        $project_id = $project->project_id;
        $project_data = Project::where("id", $project_id)->first();

        $project_location = $project_data->gallery_location;
        $prop_location = $project->gallery_location;
        $type = 'edit';

        return View('admin.properties.addcaption', compact('results', 'type', 'projects', 'id', 'props', 'project_id', 'project_location', 'prop_location'));
    }

    public function update_caption(Request $request, $id = '') {

        $allc_ids = $request->images_ids;
        $allc_captions = $request->imagecaption;
        $allc_captions_date = $request->caption_date;
        $i = 0;

        foreach ($allc_ids as $allc_id) {
            $data = array();
            $data['caption'] = $allc_captions[$i];
            $data['caption_date'] = $allc_captions_date[$i];
            Construction_gallery::where('id', $allc_id)->update($data);
            $i++;
        }
        $request->session()->flash('alert-success', 'Image caption has been added !');
        return redirect('admin/properties/medias');
    }

    public function update_media(Request $request) {
        if ($request->type == "add") {

            $image = $request->file('image');
            $prop = Properties::find($request->pid);
            $project = Project::find($prop->project_id);

            if (!empty($image)) {
                for ($i = 0; $i < count($image); $i++) {

                    $input['imagename'] = '';
                    if ($image[$i]) {
                        $input['imagename'] = time() . rand() . '.' . $image[$i]->getClientOriginalExtension();
                        $destinationPath = STORE_PATH . '/assets/images/properties/' . $project->gallery_location . '/' . $prop->gallery_location . "/construction-update";
                        $image[$i]->move($destinationPath, $input['imagename']);
                    }

                    $gal = new Construction_gallery();
                    $gal->property_id = $request->pid;
                    $gal->image = $input['imagename'];
                    $gal->created = date("Y-m-d H:i:s");
                    $gal->caption = strtoupper(date('M Y'));
                    $gal->caption_date = date("Y-m-d H:i:s");
                    $gal->status = '1';
                    $gal->save();
                }
            }

            $request->session()->flash('alert-success', 'Gallery has been added!');
        }
        if ($request->type == "edit") {

            $image = $request->file('image');
            $old_image = $request->old_images;
            $old_id = $request->old_id;

            $prop = Properties::find($request->pid);
            $project = Project::find($prop->project_id);

            $photos = Construction_gallery::where('property_id', $request->pid)->get();
            $photoids = array();

            if (!empty($photos)) {
                foreach ($photos as $photo) {
                    if (!in_array($photo->id, $old_id)) {

                        $rec = Construction_gallery::find($photo->id);
                        if ($rec->image != "") {
                            $url = STORE_PATH . "/assets/images/properties/" . $project->gallery_location . '/' . $prop->gallery_location . "/construction-update/" . @$rec->image;
                            @unlink($url);
                        }
                        Construction_gallery::where('id', $photo->id)->delete();
                    }
                }
            }


            if (!empty($old_image)) {
                for ($i = 0; $i < count($old_image); $i++) {

                    $input['imagename'] = '';
                    $flag = 0;
                    if (isset($image[$i])) {
                        $input['imagename'] = time() . rand() . '.' . $image[$i]->getClientOriginalExtension();
                        $destinationPath = STORE_PATH . '/assets/images/properties/' . $project->gallery_location . '/' . $prop->gallery_location . "/construction-update";
                        $image[$i]->move($destinationPath, $input['imagename']);

                        if (isset($image[$i]) && $old_id[$i] == "") {
                            $gal = new Construction_gallery();
                            $gal->property_id = $request->pid;
                            $gal->image = $input['imagename'];
                            $gal->created = date("Y-m-d H:i:s");
                            $gal->caption = strtoupper(date('M Y'));
                            $gal->caption_date = date("Y-m-d H:i:s");
                            $gal->status = '1';
                            $gal->save();
                        } else if (isset($image[$i]) && $old_id[$i] != "") {
                            $data = array();
                            $data['property_id'] = $request->pid;
                            $data['image'] = $input['imagename'];
                            $data['created'] = date("Y-m-d H:i:s");
                            $data['caption'] = strtoupper(date('M Y'));
                            $data['caption_date'] = date("Y-m-d H:i:s");
                            $data['status'] = "1";
                            Construction_gallery::where('property_id', $old_id[$i])->update($data);

                            $url = STORE_PATH . "/assets/images/properties/" . $project->gallery_location . '/' . $prop->gallery_location . "/construction-update/" . @$old_image[$i];
                            @unlink($url);
                        }
                    }
                }
            }

            $request->session()->flash('alert-success', 'Gallery has been updated!');
        }

        return redirect('admin/properties/medias');
    }

    public function delete_media(Request $request, $id = '') {
        $galleries = Construction_gallery::where("property_id", $id)->get();

        $prop = Properties::find($id);
        $property_location = $prop->gallery_location;

        $project = Project::find($prop->project_id);
        $project_location = $project->gallery_location;

        if (!empty($galleries)) {
            foreach ($galleries as $gal) {
                if ($gal->image != "") {
                    $url = STORE_PATH . "/assets/images/properties/" . $project_location . "/" . $property_location . "/construction-update/" . $gal->image;
                    @unlink($url);
                }
            }
        }

        Construction_gallery::where('property_id', $id)->delete();
        $request->session()->flash('alert-success', 'Gallery has been deleted!');
        return redirect('admin/properties/medias');
    }

    public function statusc(Request $request, $id, $flag) {
        Construction_gallery::where('property_id', $id)->update(array("status" => $flag));
        $request->session()->flash('alert-success', 'Status has been updated!');
        return redirect('admin/properties/medias');
    }

    public function create_zip($files = array(), $destination = '', $overwrite = false, $filename = array()) {

        $valid_files = array();
        $valid_files_name = array();
        if (is_array($files)) {
            $i = 0;
            foreach ($files as $file) {
                if (file_exists($file)) {
                    $valid_files[] = $file;
                    $valid_files_name[] = $filename[$i];
                }
                $i++;
            }
        }

        if (count($valid_files)) {
            $zip = new ZipArchive();
            if ($zip->open($destination, $overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) {
                return false;
            }
            $j = 0;
            foreach ($valid_files as $file) {
                $zip->addFile($file, $valid_files_name[$j]);
                $j++;
            }
            $zip->close();
            return file_exists($destination);
        } else {
            return false;
        }
    }

    /* Unit floor Management */

    public function unitsfloor(Request $request) {

        $units = Unitfloors::orderBy("id", "desc")->get();
        return View('admin.properties.unitsfloor', compact('units'));
    }

    public function add_unitsfloor(Request $request, $id = '') {

        if ($id == '') {

            $unit = array();
            $type = 'add';
            return View('admin.properties.createunitsfloor', compact('unit', 'type'));
        } else {
            $unit = Unitfloors::find($id);
            $type = 'edit';
            return View('admin.properties.createunitsfloor', compact('unit', 'type'));
        }
    }

    public function store_unitsfloor(Request $request, $id = '') {

        if ($request->type == "add") {

            $image = $request->file('image');
            $input['imagename'] = '';
            if ($image) {
                $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = STORE_PATH . '/assets/images/icon';
                $image->move($destinationPath, $input['imagename']);
            }

            $unity = new Unitfloors();
            $unity->title_en = $request->title_en;
            $unity->title_ar = $request->title_ar;
            $unity->title_ch = $request->title_ch;
            $unity->title_hn = $request->title_hn;
            $unity->title_ur = $request->title_ur;
            $unity->created = date("Y-m-d H:i:s");
            $unity->icon = $input['imagename'];
            $unity->status = '1';
            $unity->save();

            $request->session()->flash('alert-success', 'Unit Floor has been added!');
        }
        if ($request->type == "edit") {


            $image = $request->file('image');
            $input['imagename'] = '';
            if ($image) {
                $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = STORE_PATH . '/assets/images/icon';
                $image->move($destinationPath, $input['imagename']);

                $unit = Unitfloors::find($request->id);
                if ($unit->icon != "") {
                    $url = STORE_PATH . "/assets/images/icon/" . $unit->icon;
                    @unlink($url);
                }
            }

            $data = array();
            if ($input['imagename'] != "") {
                $data['icon'] = $input['imagename'];
            }
            if ($request->title_en) {
                $data['title_en'] = $request->title_en;
            }
            if ($request->title_ar) {
                $data['title_ar'] = $request->title_ar;
            }
            if ($request->title_ch) {
                $data['title_ch'] = $request->title_ch;
            }
            if ($request->title_hn) {
                $data['title_hn'] = $request->title_hn;
            }
            if ($request->title_ur) {
                $data['title_ur'] = $request->title_ur;
            }

            if (!empty($data)) {
                Unitfloors::where('id', $request->id)->update($data);
            }

            $request->session()->flash('alert-success', 'Unit Floor has been updated!');
        }

        return redirect('admin/properties/unitsfloor');
    }

    public function delete_unitsfloor(Request $request, $id) {
        $uniti = Unitfloors::find($id);

        if ($uniti->icon != "") {
            $url = STORE_PATH . "/assets/images/icon/" . $uniti->icon;
            @unlink($url);
        }

        Unitfloors::destroy($id);
        $request->session()->flash('alert-success', 'Unit Floor has been deleted!');
        return redirect('admin/properties/unitsfloor');
    }

    public function status_ufloor(Request $request, $id, $flag) {

        Unitfloors::where('id', $id)->update(array("status" => $flag));
        $request->session()->flash('alert-success', 'Unit Floor status has been updated!');

        return redirect('admin/properties/unitsfloor');
    }

    /* Unit feature Management */

    public function unitsfeature(Request $request) {

        $units = Unitfeatures::orderBy("id", "desc")->get();
        return View('admin.properties.unitsfeature', compact('units'));
    }

    public function add_unitsfeature(Request $request, $id = '') {

        if ($id == '') {

            $unit = array();
            $type = 'add';
            return View('admin.properties.createunitsfeature', compact('unit', 'type'));
        } else {
            $unit = Unitfeatures::find($id);
            $type = 'edit';
            return View('admin.properties.createunitsfeature', compact('unit', 'type'));
        }
    }

    public function store_unitsfeature(Request $request, $id = '') {

        if ($request->type == "add") {


            $image = $request->file('image');
            $input['imagename'] = '';
            if ($image) {
                $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = STORE_PATH . '/assets/images/icon';
                $image->move($destinationPath, $input['imagename']);
            }

            $unity = new Unitfeatures();
            $unity->title_en = $request->title_en;
            $unity->title_ar = $request->title_ar;
            $unity->title_ch = $request->title_ch;
            $unity->title_hn = $request->title_hn;
            $unity->title_ur = $request->title_ur;
            $unity->created = date("Y-m-d H:i:s");
            $unity->icon = $input['imagename'];
            $unity->status = '1';
            $unity->save();

            $request->session()->flash('alert-success', 'Unit Feature has been added!');
        }
        if ($request->type == "edit") {


            $image = $request->file('image');
            $input['imagename'] = '';
            if ($image) {
                $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = STORE_PATH . '/assets/images/icon';
                $image->move($destinationPath, $input['imagename']);

                $unit = Unitfeatures::find($request->id);
                if ($unit->icon != "") {
                    $url = STORE_PATH . "/assets/images/icon/" . $unit->icon;
                    @unlink($url);
                }
            }


            $data = array();
            if ($input['imagename'] != "") {
                $data['icon'] = $input['imagename'];
            }
            if ($request->title_en) {
                $data['title_en'] = $request->title_en;
            }
            if ($request->title_ar) {
                $data['title_ar'] = $request->title_ar;
            }
            if ($request->title_ch) {
                $data['title_ch'] = $request->title_ch;
            }
            if ($request->title_hn) {
                $data['title_hn'] = $request->title_hn;
            }
            if ($request->title_ur) {
                $data['title_ur'] = $request->title_ur;
            }

            if (!empty($data)) {
                Unitfeatures::where('id', $request->id)->update($data);
            }

            $request->session()->flash('alert-success', 'Unit has been updated!');
        }

        return redirect('admin/properties/unitsfeature');
    }

    public function delete_unitsfeature(Request $request, $id) {
        $uniti = Unitfeatures::find($id);

        if ($uniti->icon != "") {
            $url = STORE_PATH . "/assets/images/icon/" . $uniti->icon;
            @unlink($url);
        }

        Unitfeatures::destroy($id);
        $request->session()->flash('alert-success', 'Unit Feature has been deleted!');
        return redirect('admin/properties/unitsfeature');
    }

    public function status_ufeature(Request $request, $id, $flag) {

        Unitfeatures::where('id', $id)->update(array("status" => $flag));
        $request->session()->flash('alert-success', 'Unit Feature status has been updated!');

        return redirect('admin/properties/unitsfeature');
    }

}
