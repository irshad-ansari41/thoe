<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Content;
use App\Models\Gallery_master;
use App\Models\Gallery_child;
use App\Models\VGallery_master;
use App\Models\Event;
use File;
use Hash;
use Lang;
use Mail;
use Redirect;
use Sentinel;
use URL;
use View;
use Validator;
use DB;

class AdminEventsController extends Controller {

    /**
     * Show a list of all the properties.
     *
     * @return View
     */
    public function __construct() {
        $session_user_id = 1;

        $results_users = DB::selectOne(DB::raw("select users.*,tbl_module_access.* from users INNER JOIN tbl_module_access ON users.id=tbl_module_access.userid where users.id=" . $session_user_id));

        if ($results_users != NULL) {

            if ($results_users->events == "0") {
                redirect()->to('/admin/permissionDenied')->send();
            }
        }
    }

    public function index() {
        // Grab all the properties
        $events = Event::orderBy('id', 'desc')->paginate(5);

        // Show the page
        return View('admin.events.index', compact('events'));
    }

    /* Gallery Management */

    public function gallery() {
        $results = Gallery_master::All();
        $response = array();
        if (!empty($results)) {
            $i = 0;
            foreach ($results as $res) {
                $response[$i]['id'] = $res->id;
                $response[$i]['title'] = $res->gallery_title_en;
                $response[$i]['holder_image'] = $res->holder_image;

                $text = '';
                if ($res->gallery_type == "1") {
                    $text = 'Corporate';
                } else if ($res->gallery_type == "2") {
                    $text = 'Identity';
                } else if ($res->gallery_type == "3") {
                    $text = 'Event';
                }


                $response[$i]['gallery_type'] = $text;
                $response[$i]['status'] = $res->status;
                $response[$i]['year'] = $res->year;
                $i++;
            }
        }
        return View('admin.events.galleries', compact('response'));
    }

    public function videos() {
        $results = VGallery_master::All();
        $response = array();
        if (!empty($results)) {
            $i = 0;
            foreach ($results as $res) {
                $response[$i]['id'] = $res->id;
                $response[$i]['title'] = $res->gallery_title_en;
                $response[$i]['holder_image'] = $res->holder_image;
                $response[$i]['image'] = $res->image;

                $text = '';
                if ($res->gallery_type == "1") {
                    $text = 'Corporate';
                } else if ($res->gallery_type == "2") {
                    $text = 'Promotional';
                } else if ($res->gallery_type == "3") {
                    $text = 'Event';
                }


                $response[$i]['gallery_type'] = $text;
                $response[$i]['status'] = $res->status;
                $response[$i]['year'] = $res->year;
                $response[$i]['created'] = $res->created;
                $i++;
            }
        }
        return View('admin.events.videos', compact('response'));
    }

    public function add_gallery(Request $request, $id = '') {

        $year = date("Y");

        if ($id == '') {
            $results = array();
            $type = 'add';
            return View('admin.events.addgallery', compact('results', 'type', 'id', 'year'));
        } else {
            $results = Gallery_master::find($id);
            $type = 'edit';
            return View('admin.events.addgallery', compact('results', 'type', 'id', 'year'));
        }
    }

    public function add_video(Request $request, $id = '') {

        $year = date("Y");

        if ($id == '') {
            $results = array();
            $type = 'add';
            return View('admin.events.addvideo', compact('results', 'type', 'id', 'year'));
        } else {
            $results = VGallery_master::find($id);
            $type = 'edit';
            return View('admin.events.addvideo', compact('results', 'type', 'id', 'year'));
        }
    }

    public function ajax_getproperties(Request $request, $id = '') {
        $results = Properties::where("project_id", $request->title_en)->get();
        return View('admin.properties.ajax_properties', compact('results'));
    }

    public function update_gallery(Request $request) {

        if ($request->type == "add") {


            $pname = str_replace(' ', '_', $request->gallery_title_en);
            $path = STORE_PATH . '/assets/images/media/' . $pname;
            if (!file_exists($path)) {
                File::makeDirectory($path);
            }
            $spath = STORE_PATH . '/assets/images/media' . $pname;
            @chmod($spath, 0777);


            $path1 = STORE_PATH . '/assets/images/media/' . $pname . '/images';
            if (!file_exists($path1)) {
                File::makeDirectory($path1, $mode = 777, true, true);
            }
            $spath1 = STORE_PATH . '/assets/images/media/' . $pname . "/images";
            @chmod($spath1, 0777);



            $image = $request->file('image');
            $input['imagename'] = '';

            if ($image) {
                $input['imagename'] = make_image_slug($image->getClientOriginalName());
                $destinationPath = STORE_PATH . '/assets/images/media/' . $pname;
                $image->move($destinationPath, $input['imagename']);
            }

            $gal = new Gallery_master();

            $gal->gallery_title_en = $request->gallery_title_en;
            $gal->gallery_title_ar = $request->gallery_title_ar;

            $gal->gallery_long_title_en = $request->gallery_long_title_en;
            $gal->gallery_long_title_ar = $request->gallery_long_title_ar;

            $gal->short_description_en = $request->short_description_en;
            $gal->short_description_ar = $request->short_description_ar;

            $gal->slug = $request->slug;
            $gal->path = $pname;
            $gal->holder_image = $input['imagename'];
            $gal->gallery_type = $request->gallery_type;
            $gal->status = '1';
            $gal->created = date("Y-m-d H:i:s");
            $gal->year = $request->year;

            $gal->meta_title = $request->meta_title;
            $gal->meta_keyword = $request->meta_keyword;
            $gal->meta_desc = $request->meta_desc;

            $gal->save();
            $request->session()->flash('alert-success', 'Gallery has been added!');
        }
        if ($request->type == "edit") {


            $old_data = Gallery_master::find($request->id);

            $image = $request->file('image');
            $input['imagename'] = '';

            if ($image) {
                $input['imagename'] = make_image_slug($image->getClientOriginalName());
                $destinationPath = STORE_PATH . '/assets/images/media/' . $old_data->path;
                $image->move($destinationPath, $input['imagename']);

                $url = STORE_PATH . "/assets/images/media/" . $old_data->path . '/' . $old_data->holder_image;
                @unlink($url);
            }


            $data = array();
            $data['gallery_title_en'] = $request->gallery_title_en;
            $data['gallery_title_ar'] = $request->gallery_title_ar;

            $data['gallery_long_title_en'] = $request->gallery_long_title_en;
            $data['gallery_long_title_ar'] = $request->gallery_long_title_ar;

            if ($input['imagename'] != "") {
                $data['holder_image'] = $input['imagename'];
            }
            $data['short_description_en'] = $request->short_description_en;
            $data['short_description_ar'] = $request->short_description_ar;

            $data['slug'] = $request->slug;
            $data['gallery_type'] = $request->gallery_type;
            $data['status'] = "1";
            $data['year'] = $request->year;

            $data['meta_title'] = $request->meta_title;
            $data['meta_keyword'] = $request->meta_keyword;
            $data['meta_desc'] = $request->meta_desc;

            Gallery_master::where('id', $request->id)->update($data);

            $request->session()->flash('alert-success', 'Gallery has been updated!');
        }

        return redirect('admin/events/gallery');
    }

    public function update_video(Request $request) {

        if ($request->type == "add") {

            $image = $request->file('holder_image');
            $input['imagename'] = '';

            if ($image) {
                $input['imagename'] = make_image_slug($image->getClientOriginalName());
                $destinationPath = STORE_PATH . '/assets/images/video';
                $image->move($destinationPath, $input['imagename']);
            }

            $gal = new VGallery_master();
            $gal->gallery_title_en = $request->gallery_title_en;
            $gal->gallery_title_ar = $request->gallery_title_ar;
            $gal->slug = $request->slug;
            $gal->gallery_long_title_en = $request->gallery_long_title_en;
            $gal->gallery_long_title_ar = $request->gallery_long_title_ar;

            $gal->short_description_en = $request->short_description_en;
            $gal->short_description_ar = $request->short_description_ar;

            $gal->holder_image = $input['imagename'];
            $gal->image = $request->image;
            $gal->gallery_type = $request->gallery_type;
            $gal->status = '1';
            $gal->created = date("Y-m-d H:i:s");
            $gal->year = $request->year;
            $gal->meta_title = $request->meta_title;
            $gal->meta_keyword = $request->meta_keyword;
            $gal->meta_desc = $request->meta_desc;
            $gal->save();
            $request->session()->flash('alert-success', 'Gallery has been added!');
        }
        if ($request->type == "edit") {


            $old_data = VGallery_master::find($request->id);

            $image = $request->file('holder_image');
            $input['imagename'] = '';

            if ($image) {
                $input['imagename'] = make_image_slug($image->getClientOriginalName());
                $destinationPath = STORE_PATH . '/assets/images/video/';
                $image->move($destinationPath, $input['imagename']);

                $url = STORE_PATH . "/assets/images/video/" . $old_data->holder_image;
                @unlink($url);
            }


            $data = array();
            $data['gallery_title_en'] = $request->gallery_title_en;
            $data['gallery_title_ar'] = $request->gallery_title_ar;
            $data['slug'] = $request->slug;
            $data['gallery_long_title_en'] = $request->gallery_long_title_en;
            $data['gallery_long_title_ar'] = $request->gallery_long_title_ar;


            if ($input['imagename'] != "") {
                $data['holder_image'] = $input['imagename'];
            }
            $data['image'] = $request->image;
            $data['short_description_en'] = $request->short_description_en;
            $data['short_description_ar'] = $request->short_description_ar;

            $data['gallery_type'] = $request->gallery_type;
            $data['year'] = $request->year;
            $data['meta_title'] = $request->meta_title;
            $data['meta_keyword'] = $request->meta_keyword;
            $data['meta_desc'] = $request->meta_desc;

            VGallery_master::where('id', $request->id)->update($data);

            $request->session()->flash('alert-success', 'Gallery has been updated!');
        }

        return redirect('admin/events/videos');
    }

    public function delete_gallery(Request $request, $id = '') {
        $galleries = Gallery_master::find($id);

        $photos = Gallery_child::where("gallery_id", $id)->get();

        if ($galleries->holder_image != "") {
            $url = STORE_PATH . "/assets/images/media/" . $galleries->path . '/' . $galleries->holder_image;
            @unlink($url);
        }

        if (!empty($photos)) {
            foreach ($photos as $photo) {
                $url = STORE_PATH . "/assets/images/media/" . $galleries->path . '/images/' . $photo->image;
                @unlink($url);
            }
        }

        Gallery_master::where('id', $id)->delete();
        Gallery_child::where('gallery_id', $id)->delete();
        $request->session()->flash('alert-success', 'Gallery has been deleted!');
        return redirect('admin/events/gallery');
    }

    public function delete_video(Request $request, $id = '') {
        $galleries = VGallery_master::find($id);

        if ($galleries->holder_image != "") {
            $url = STORE_PATH . "/assets/images/video/" . $galleries->holder_image;
            @unlink($url);
        }

        VGallery_master::where('id', $id)->delete();
        $request->session()->flash('alert-success', 'Gallery has been deleted!');
        return redirect('admin/events/videos');
    }

    public function statusg(Request $request, $id, $flag) {

        Gallery_master::where('id', $id)->update(array("status" => $flag));
        $request->session()->flash('alert-success', 'Status has been updated!');
        return redirect('admin/events/gallery');
    }

    public function statusvideo(Request $request, $id, $flag) {

        VGallery_master::where('id', $id)->update(array("status" => $flag));
        $request->session()->flash('alert-success', 'Status has been updated!');
        return redirect('admin/events/videos');
    }

    public function addphoto(Request $request, $id = '') {
        $results = Gallery_child::where("gallery_id", $id)->get();
        $master = Gallery_master::find($id);
        $path = $master->path;
        $type = $props = $project_id = $ptitle = '';
        return View('admin.events.editupload', compact('results', 'type', 'master', 'id', 'props', 'project_id', 'ptitle'));
    }

    public function updateupload(Request $request, $id = '') {

        $gallery = Gallery_master::find($request->id);

        $old_files = $request->old_files;
        $image = $request->file('image');
        $old_id = $request->old_id;


        $photos = Gallery_child::where('gallery_id', $request->id)->get();

        $photoids = array();
        if (!empty($photos)) {
            foreach ($photos as $photo) {
                if (!in_array($photo->id, $old_id)) {

                    $rec = Gallery_child::find($photo->id);
                    if ($rec->image != "") {
                        $url = STORE_PATH . "/assets/images/media/" . $gallery->path . "/images/" . @$rec->image;
                        @unlink($url);
                    }

                    Gallery_child::where('id', $photo->id)->delete();
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

                    $input['imagename'] = make_image_slug($image[$i]->getClientOriginalName());
                    $destinationPath = STORE_PATH . '/assets/images/media/' . $gallery->path . "/images";
                    $image[$i]->move($destinationPath, $input['imagename']);

                    if (isset($image[$i]) && $old_id[$i] == "") {
                        $gal = new Gallery_child();
                        $gal->gallery_id = $request->id;
                        $gal->image = $input['imagename'];
                        $gal->caption = '';
                        $gal->status = '1';
                        $gal->created = date("Y-m-d H:i:s");
                        $gal->save();
                    } else if (isset($image[$i]) && $old_id[$i] != "") {
                        $data = array();
                        $data['image'] = $input['imagename'];
                        Gallery_child::where('gallery_id', $old_id[$i])->update($data);

                        $url = STORE_PATH . "/assets/images/media/" . $gallery->path . "/images/" . @$old_image[$i];
                        @unlink($url);
                    }
                } else {
                    
                }
            }
        }

        $request->session()->flash('alert-success', 'Photo has been uploaded into ' . $gallery->gallery_title);
        return redirect('admin/events/gallery');
    }

    public function status(Request $request, $id, $flag) {

        Event::where('id', $id)->update(array("status" => $flag));
        $request->session()->flash('alert-success', 'Status has been updated!');
        return redirect('admin/events/');
    }

    public function delete_event(Request $request, $id = '') {
        $event = Event::find($id);

        if ($event->event_photo != "") {
            $url = STORE_PATH . "/assets/images/events/" . $event->event_photo;
            @unlink($url);
        }

        if ($event->event_main_photo != "") {
            $url2 = STORE_PATH . "/assets/images/events/main/" . $event->event_main_photo;
            @unlink($url2);
        }


        Event::where('id', $id)->delete();
        //Gallery_child::where('gallery_id', $id)->delete();
        $request->session()->flash('alert-success', 'Event has been deleted!');
        return redirect('admin/events');
    }

    public function create(Request $request, $id = '') {
        //return View('admin.news.createproject');
        if ($id == '') {

            $project = array();
            $type = 'add';
            return View('admin.events.createproject', compact('project', 'type'));
        } else {
            $project = Event::find($id);
            $type = 'edit';
            return View('admin.events.createproject', compact('project', 'type'));
        }
    }

    public function store_events(Request $request, $id = '') {


        if ($request->type == "add") {

            $this->validate($request, [
                'event_title' => 'required',
                'extra_desc_en' => 'required',
                'long_desc_en' => 'required',
                    //'image' => 'required|image|mimes:jpeg,png,jpg,gif|dimensions:width=313,height=197|max:50',
                    //'main_image' => 'required|image|mimes:jpeg,png,jpg,gif|dimensions:width=845,height=592|max:150',
                    //'image_ar' => 'mimes:jpeg,png,jpg,gif|dimensions:width=313,height=197|max:50',
                    //'image_cn' => 'mimes:jpeg,png,jpg,gif|dimensions:width=313,height=197|max:50',
                    ], [
                'event_title.required' => 'Sales event title required !',
                'extra_desc_en.required' => 'Sales event short description requried !',
                'long_desc_en.required' => 'Sales event Details !',
                'image.required' => 'Thumbnail image required !',
                'image.dimensions:width=313,height=197' => 'Image width must be 313X197 px!',
                'image.max' => 'Image size must be less then 50kb !',
                'main_image.required' => 'Main image required',
                'main_image.dimensions:width=845,height=592' => 'Image width must be 845X592 px',
                'main_image.max' => 'Image size must be less then 50kb'
            ]);

            $slugdate = date_create($request->date);
            $image = $request->file('image');
            $image_ar = $request->file('image_ar');
            $input['imagename'] = '';
            $input['imagename_ar'] = '';
            if ($image) {
                $input['imagename'] = make_image_slug($image->getClientOriginalName());
                $destinationPath = STORE_PATH . '/assets/images/events';
                $image->move($destinationPath, $input['imagename']);
            }
            if ($image_ar) {
                $input['imagename_ar'] = make_image_slug($image->getClientOriginalName());
                $destinationPath = STORE_PATH . '/assets/images/events';
                $image_ar->move($destinationPath, $input['imagename_ar']);
            }


            $image_en_names = [];
            for ($i = 0; $i <= 3; $i++) {
                $image = $request->file('event_main_photo_en_' . $i);
                if (!empty($image)) {
                    $image_en_names[$i] = make_image_slug($image->getClientOriginalName());
                    $destinationPath = STORE_PATH . ('assets/images/events');
                    $image->move($destinationPath, $image_en_names[$i]);
                }
            }

            $image_ar_names = [];
            for ($i = 0; $i <= 3; $i++) {
                $image = $request->file('event_main_photo_ar_' . $i);
                if (!empty($image)) {
                    $image_ar_names[$i] = make_image_slug($image->getClientOriginalName());
                    $destinationPath = STORE_PATH . ('assets/images/events');
                    $image->move($destinationPath, $image_ar_names[$i]);
                }
            }

            $new = new Event();
            $new->event_title_en = input_trims($request->event_title);
            $new->event_title_ar = input_trims($request->event_title_ar);
            $new->event_date = input_trims($request->event_date);
            $new->event_start_time = input_trims($request->event_start_time);
            $new->event_end_time = input_trims($request->event_end_time);

            $new->event_location_en = input_trims($request->event_location);
            $new->event_location_ar = input_trims($request->event_location_ar);
            $new->event_place_en = input_trims($request->event_place);
            $new->event_place_ar = input_trims($request->event_place_ar);

            $new->long_desc_en = input_trims($request->long_desc);
            $new->long_desc_ar = input_trims($request->long_desc_ar);

            $new->event_photo_en = $input['imagename'];
            $new->event_photo_ar = $input['imagename_ar'];
            $new->event_main_photo_en = implode(',', $image_en_names);
            $new->event_main_photo_ar = implode(',', $image_ar_names);

            $new->event_photo_alt = input_trims($request->event_title);
            $new->event_main_photo_alt = input_trims($request->event_title);

            $new->slug = $request->slug;

            $new->youtube = input_trims($request->youtube);
            $new->meta_title = input_trims($request->event_title);
            $new->meta_keyword = input_trims($request->meta_keyword);
            $new->meta_desc = input_trims($request->meta_desc);

            $new->extra_desc_en = input_trims($request->extra_desc_en);
            $new->extra_desc_ar = input_trims($request->extra_desc_ar);
            $new->starting_from = input_trims($request->starting_from);
            $new->currency_type = input_trims($request->currency_type);
            $new->booking_fees = input_trims($request->booking_fees);
            $new->payment_plan_en = input_trims($request->payment_plan);
            $new->payment_plan_ar = input_trims($request->payment_plan_ar);

            $new->mortgage_starting = input_trims($request->mortgage_starting);
            $new->visit_us_at_en = input_trims($request->visit_us_at);
            $new->visit_us_at_ar = input_trims($request->visit_us_at_ar);

            // if(isset($request->date)){
            $new->event_date = input_trims($request->date);
            $new->symbols = input_trims($request->symbols);
            $new->levent_date = !empty($request->ldate) ? input_trims($request->ldate) : '';
            /* }else{
              $new->event_date = date("Y-m-d");
              } */
            $new->created = date("Y-m-d H:i:s");
            $new->status = '1';


            $new->save();

            $request->session()->flash('alert-success', 'Event has been added!');
        }
        if ($request->type == "edit") {

            $this->validate($request, [
                'event_title' => 'required',
                'extra_desc_en' => 'required',
                'long_desc_en' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg,gif|dimensions:width=313,height=197|max:50',
                'main_image' => 'image|mimes:jpeg,png,jpg,gif|dimensions:width=845,height=592|max:150',
                    //'image_ar' => 'mimes:jpeg,png,jpg,gif|dimensions:width=313,height=197|max:50',
                    //'image_cn' => 'mimes:jpeg,png,jpg,gif|dimensions:width=313,height=197|max:50',
                    ], [
                'event_title.required' => 'Sales event title required !',
                'extra_desc_en.required' => 'Sales event short description requried !',
                'long_desc_en.required' => 'Sales event Details !',
                'image.dimensions:width=313,height=197' => 'Image width must be 313X197 px!',
                'image.max' => 'Image size must be less then 50kb !',
                'main_image.dimensions:width=845,height=592' => 'Image width must be 845X592 px',
                'main_image.max' => 'Image size must be less then 50kb'
            ]);



            $image = $request->file('image');
            $image_ar = $request->file('image_ar');

            $input['imagename'] = '';
            $input['imagename_ar'] = '';
            if ($image) {
                $project = Event::find($request->id);
                if ($project->event_photo_en != "") {
                    $url = STORE_PATH . "/assets/images/events/" . $project->event_photo_en;
                    @unlink($url);
                }

                $input['imagename'] = make_image_slug($image->getClientOriginalName());
                $destinationPath = STORE_PATH . '/assets/images/events';
                $image->move($destinationPath, $input['imagename']);
            }

            if ($image_ar) {
                $project = Event::find($request->id);
                if ($project->event_photo_ar != "") {
                    $url = STORE_PATH . "/assets/images/events/" . $project->event_photo_ar;
                    @unlink($url);
                }

                $input['imagename_ar'] = make_image_slug($image_ar->getClientOriginalName());
                $destinationPath = STORE_PATH . '/assets/images/events';
                $image_ar->move($destinationPath, $input['imagename_ar']);
            }


            $project = Event::find($request->id);
            $images = !empty($project->event_main_photo_en) ? explode(',', $project->event_main_photo_en) : [];
            $image_en_names = [];
            for ($i = 0; $i <= 3; $i++) {
                $image = $request->file('event_main_photo_en_' . $i);
                if (!empty($image)) {
                    !empty($images[$i]) ? @unlink(STORE_PATH . "/assets/images/events/" . $images[$i]) : '';
                    $image_en_names[$i] = make_image_slug($image->getClientOriginalName());
                    $destinationPath = STORE_PATH . ('assets/images/events');
                    $image->move($destinationPath, $image_en_names[$i]);
                } else {
                    $image_en_names[$i] = !empty($images[$i]) ? $images[$i] : '';
                }
            }


            $images = !empty($project->event_main_photo_ar) ? explode(',', $project->event_main_photo_ar) : [];
            $image_ar_names = [];
            for ($i = 0; $i <= 3; $i++) {
                $image = $request->file('event_main_photo_ar_' . $i);
                if (!empty($image)) {
                    !empty($images[$i]) ? @unlink(STORE_PATH . "/assets/images/events/" . $images[$i]) : '';
                    $image_ar_names[$i] = make_image_slug($image->getClientOriginalName());
                    $destinationPath = STORE_PATH . ('assets/images/events');
                    $image->move($destinationPath, $image_ar_names[$i]);
                } else {
                    $image_ar_names[$i] = !empty($images[$i]) ? $images[$i] : '';
                }
            }

            $data = array();
            if ($input['imagename'] != "") {
                $data['event_photo_en'] = $input['imagename'];
            }
            if ($input['imagename_ar'] != "") {
                $data['event_photo_ar'] = $input['imagename_ar'];
            }

            $data['event_main_photo_en'] = implode(',', array_filter($image_en_names));
            $data['event_main_photo_ar'] = implode(',', array_filter($image_ar_names));



            $data['slug'] = $request->slug;

            $data['youtube'] = input_trims($request->youtube);
            $data['meta_title'] = input_trims($request->event_title);
            $data['meta_keyword'] = input_trims($request->meta_keyword);
            $data['meta_desc'] = input_trims($request->meta_desc);
            $data['event_photo_alt'] = input_trims($request->event_title);
            $data['event_main_photo_alt'] = input_trims($request->event_title);

            $data['event_date'] = input_trims($request->date);
            $data['symbols'] = input_trims($request->symbols);
            $data['levent_date'] = !empty($request->ldate) ? input_trims($request->ldate) : '';



            $data['event_start_time'] = input_trims($request->event_start_time);
            $data['event_end_time'] = input_trims($request->event_end_time);
            $data['event_location_en'] = input_trims($request->event_location);
            $data['event_location_ar'] = input_trims($request->event_location_ar);
            $data['event_place_en'] = input_trims($request->event_place);
            $data['event_place_ar'] = input_trims($request->event_place_ar);
            $data['event_title_en'] = input_trims($request->event_title);
            $data['event_title_ar'] = input_trims($request->event_title_ar);


            $data['long_desc_en'] = input_trims($request->long_desc_en);
            $data['long_desc_ar'] = input_trims($request->long_desc_ar);


            $data['extra_desc_en'] = input_trims($request->extra_desc_en);
            $data['extra_desc_ar'] = input_trims($request->extra_desc_ar);


            $data['starting_from'] = input_trims($request->starting_from);
            $data['currency_type'] = input_trims($request->currency_type);


            $data['booking_fees'] = input_trims($request->booking_fees);

            $data['payment_plan_en'] = input_trims($request->payment_plan);
            $data['payment_plan_ar'] = input_trims($request->payment_plan_ar);

            $data['mortgage_starting'] = input_trims($request->mortgage_starting);

            $data['visit_us_at_en'] = input_trims($request->visit_us_at);
            $data['visit_us_at_ar'] = input_trims($request->visit_us_at_ar);



            if (!empty($data)) {
                Event::where('id', $request->id)->update($data);
            }

            $request->session()->flash('alert-success', 'Event has been updated!');
        }

        return $request->type == 'edit' ? redirect('admin/events/' . $request->id . '/edit') : redirect('admin/events');
    }

}
