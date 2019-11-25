<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
//use App\Http\Requests;
use App\Models\Content;
use App\Models\About;
use App\Models\Executive;
use App\Models\Timeline;
use App\Models\Team;
use File;
use Hash;
use Lang;
use Mail;
use Redirect;
use Sentinel;
use URL;
use View;
use Validator;
use App\Models\Careers;
use App\Models\Steps;
use App\Models\Jobs;
use DB;

class AdminContentsController extends Controller {

    public function __construct() {
        $session_user_id = '1';//Sentinel::getUser()->id;

        $results_users = DB::selectOne(DB::raw("select users.*,tbl_module_access.* from users INNER JOIN tbl_module_access ON users.id=tbl_module_access.userid where users.id=" . $session_user_id));

        if ($results_users != NULL) {
            if ($results_users->static_pages == "0" && $results_users->about_us == "0") {
                redirect()->to('/admin/permissionDenied')->send();
            }
        }
    }

    public function index() {
        $contents = Content::All();
        return View('admin.contents.index', compact('contents'));
    }

    protected function validator_image(array $data) {
        return Validator::make($data, [
                    'image' => 'mimes:jpg,jpeg,gif,png|min:300|max:2048'
        ]);
    }

    public function create() {
        return View('admin.contents.create');
    }

    public function store(Request $request) {

        $validator = $this->validator_image($request->all());



        $image = $request->file('image');

        if ($image) {
            $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = STORE_PATH.'/assets/images/banner/';
            $image->move($destinationPath, $input['imagename']);
        } else {
            $input['imagename'] = '';
        }

        $content = new Content();
        $content->title_en = input_trims($request->title_en);
        $content->alt = input_trims($request->alt);
        $content->description_en = input_trims($request->description_en);
        $content->title_ar = input_trims($request->title_ar);
        $content->description_ar = input_trims($request->description_ar);
       
        $content->created = date("Y-m-d H:i:s");
        $content->image = $input['imagename'];
        $content->save();

        return redirect('admin/content/');
    }

    public function update(Request $request) {



        $image = $request->file('image');
        if ($image) {
            $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = STORE_PATH.'/assets/images/banner/';
            $image->move($destinationPath, $input['imagename']);
        } else {
            $input['imagename'] = '';
        }

        if ($input['imagename'] != "") {
            Content::where('id', $request->id)->update(
                    array(
                        "title_en" => input_trims($request->title_en), 
                        "alt" => input_trims($request->alt), 
                        "description_en" => input_trims($request->description_en), 
                        "title_ar" => input_trims($request->title_ar), 
                        "description_ar" => input_trims($request->description_ar), 
                        
                        "image" => $input['imagename'], 
                        
                        "short_description_en" => input_trims($request->short_description_en), 
                        "short_description_ar" => input_trims($request->short_description_ar), 
                       
                        "meta_title" => input_trims($request->meta_title), 
                        "meta_keyword" => input_trims($request->meta_keyword), 
                        "meta_desc" => input_trims($request->meta_desc), 
                        "slug" => input_trims($request->slug)
                    )
                );
        } else {
            Content::where('id', $request->id)->update(
                    array(
                        "title_en" => input_trims($request->title_en), 
                        "alt" => input_trims($request->alt), 
                        "description_en" => input_trims($request->description_en), 
                        "title_ar" => input_trims($request->title_ar), 
                        "description_ar" => input_trims($request->description_ar), 
                        
                        "short_description_en" => input_trims($request->short_description_en), 
                        "short_description_ar" => input_trims($request->short_description_ar), 
                        
                        "meta_title" => input_trims($request->meta_title), 
                        "meta_keyword" => input_trims($request->meta_keyword), 
                        "meta_desc" => input_trims($request->meta_desc), 
                        "slug" => input_trims($request->slug)
                    )
                );
        }

        $request->session()->flash('alert-success', 'Content has been updated!');
        return redirect('admin/content/');
    }

    public function edit(Request $request, $id) {

        $contents = Content::find($id);
        $type = 'edit';
        return View('admin.contents.edit', compact('contents', 'type'));
    }

    public function delete(Request $request, $id) {


        $contents = Content::find($id);

        if ($contents->image != "") {
            $url = STORE_PATH.'/assets/images/banner/' . $contents->image;
            @unlink($url);
        }

        Content::destroy($id);
        $request->session()->flash('alert-success', 'Content has been deleted!');
        return redirect('admin/content/');
    }

    /* About THOE Development */

    public function about_us() {
        $contents = About::find(1);
        $type = 'edit';
        return View('admin.contents.aboutus', compact('contents', 'type'));
    }

    public function update_about(Request $request) {

        $contents = About::find(1);

        $image = $request->file('banner_image');
        if ($image) {
            $bimage = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = STORE_PATH.'/assets/images/about/';
            $image->move($destinationPath, $bimage);
            /* unlink old image */
            $url = STORE_PATH.'/assets/images/about/' . $contents->banner_image;
            @unlink($url);
        } else {
            $bimage = '';
        }

        $cimage = $request->file('chairmen_image');
        if ($cimage) {
            $c_image = time() . rand() . '.' . $cimage->getClientOriginalExtension();
            $destinationPath = STORE_PATH.'/assets/images/about/';
            $cimage->move($destinationPath, $c_image);

            /* unlink old image */
            $url = STORE_PATH.'/assets/images/about/' . $contents->chairmen_image;
            @unlink($url);
        } else {
            $c_image = '';
        }

        $data = array();

        if ($bimage != "") {
            $data['banner_image'] = $bimage;
        }
        if ($c_image != "") {
            $data['chairmen_image'] = $c_image;
        }

        if ($request->title_en != "") {
            $data['title_en'] = input_trims($request->title_en);
        }
        if ($request->title_ar != "") {
            $data['title_ar'] = input_trims($request->title_ar);
        }
        

        if ($request->description_en != "") {
            $data['description_en'] = input_trims($request->description_en);
        }
        if ($request->description_ar != "") {
            $data['description_ar'] = input_trims($request->description_ar);
        }
        

        if ($request->slug != "") {
            $data['slug'] = input_trims($request->slug);
        }
        $data['banner_image_alt'] = $request->banner_image_alt;
        $data['chairment_image_alt'] = $request->chairment_image_alt;
        //if($request->meta_title!=""){
        $data['meta_title'] = input_trims($request->meta_title);
        //}
        //if($request->meta_keyword!=""){
        $data['meta_keyword'] = input_trims($request->meta_keyword);
        //}
        //if($request->meta_desc!=""){
        $data['meta_desc'] = input_trims($request->meta_desc);
        //}

        if ($request->chairment_description_en != "") {
            $data['chairment_description_en'] = input_trims($request->chairment_description_en);
        }
        if ($request->chairment_description_ar != "") {
            $data['chairment_description_ar'] = input_trims($request->chairment_description_ar);
        }
        

        if (!empty($data)) {
            About::where('id', 1)->update($data);
        }

        $request->session()->flash('alert-success', 'Content has been updated!');
        return redirect('admin/content/about');
    }

    /* Timeline - Awards */

    public function fun_timeline(Request $request) {

        $timelines = Timeline::orderBy("year", "desc")->get();
        return View('admin.contents.timeline', compact('timelines'));
    }

    public function createtimeline(Request $request, $id = 0) {

        //return View('admin.contents.createtimeline');
        $date = date("Y");
        if ($id != 0) {
            $timeline = Timeline::find($id);
            $type = 'edit';
            return View('admin.contents.createtimeline', compact('timeline', 'type', 'date'));
        } else {
            $timeline = array();
            $type = 'add';
            return View('admin.contents.createtimeline', compact('timeline', 'type', 'date'));
        }
    }

    public function update_timeline(Request $request) {

        if ($request->type == "add") {

            $image = $request->file('image');
            $timage = '';
            if ($image) {
                $timage = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = STORE_PATH.'/assets/images/timeline/';
                $image->move($destinationPath, $timage);
            }

            $timeline = new Timeline();
            $timeline->year = input_trims($request->year);
            $timeline->alt = input_trims($request->alt);
            $timeline->title_en = input_trims($request->title_en);
            $timeline->title_ar = input_trims($request->title_ar);
           

            $timeline->description_en = input_trims($request->description_en);
            $timeline->description_ar = input_trims($request->description_ar);
           
            $timeline->created = date("Y-m-d H:i:s");
            $timeline->image = $timage;
            $timeline->save();

            $request->session()->flash('alert-success', 'Timeline has been added!');
        }


        if ($request->type == "edit") {

            $image = $request->file('image');
            $timage = '';
            if ($image) {

                $timage = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = STORE_PATH.'/assets/images/timeline/';
                $image->move($destinationPath, $timage);

                // remove old timeline image
                $oldtimeline = Timeline::find($request->id);
                $url = STORE_PATH.'/assets/images/timeline/' . $oldtimeline->image;
                @unlink($url);
            }


            $data = array();

            if ($timage != "") {
                $data['image'] = $timage;
            }

            if ($request->year) {
                $data['year'] = input_trims($request->year);
            }

            $data['alt'] = input_trims($request->alt);

            if ($request->title_en) {
                $data['title_en'] = input_trims($request->title_en);
            }
            if ($request->title_ar) {
                $data['title_ar'] = input_trims($request->title_ar);
            }
            

            if ($request->description_en) {
                $data['description_en'] = input_trims($request->description_en);
            }
            if ($request->description_ar) {
                $data['description_ar'] = input_trims($request->description_ar);
            }
           

            if (!empty($data)) {
                Timeline::where('id', $request->id)->update($data);
            }

            $request->session()->flash('alert-success', 'Timeline has been updated!');
        }

        return redirect('admin/content/timeline');
    }

    public function timelinestatus(Request $request, $id, $flag) {

        Timeline::where('id', $id)->update(array("status" => $flag));
        $request->session()->flash('alert-success', 'Timeline status has been updated!');

        return redirect('admin/content/timeline');
    }

    public function delete_timeline(Request $request, $id) {

        $timeline = Timeline::find($id);

        if ($timeline->image != "") {
            $url = STORE_PATH.'/assets/images/timeline/' . $timeline->image;
            @unlink($url);
        }

        Timeline::destroy($id);
        $request->session()->flash('alert-success', 'Timeline has been deleted!');
        return redirect('admin/content/timeline');
    }

    /* Corporate Executives */

    public function executives() {
        $contents = Executive::find(1);
        $type = 'edit';
        return View('admin.contents.executives', compact('contents', 'type'));
    }

    public function update_executives(Request $request) {

        $contents = Executive::find(1);

        $image = $request->file('banner_image');
        if ($image) {
            $bimage = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = STORE_PATH.'/assets/images/executives';
            $image->move($destinationPath, $bimage);

            if ($contents->banner_image) {
                /* unlink old image */
                $url = STORE_PATH.'/assets/images/executives'. $contents->banner_image;
                @unlink($url);
            }
        } else {
            $bimage = '';
        }

        $cimage = $request->file('chairmen_image');
        if ($cimage) {
            $c_image = time() . rand() . '.' . $cimage->getClientOriginalExtension();
            $destinationPath = STORE_PATH.'/assets/images/executives';
            $cimage->move($destinationPath, $c_image);

            if ($contents->chairmen_image) {
                /* unlink old image */
                $url = STORE_PATH.'/assets/images/executives'. $contents->chairmen_image;
                @unlink($url);
            }
        } else {
            $c_image = '';
        }

        echo "<pre/>";


        $ceoimage = $request->file('ceo_image');
        if ($ceoimage) {
            $ceo_image = time() . rand() . '.' . $ceoimage->getClientOriginalExtension();
            $destinationPath = STORE_PATH.'/assets/images/executives';
            $ceoimage->move($destinationPath, $ceo_image);

            if ($contents->ceo_image) {
                /* unlink old image */
                $url = STORE_PATH.'/assets/images/executives'. $contents->ceo_image;
                @unlink($url);
            }
        } else {
            $ceo_image = '';
        }

        $deputyceoimage = $request->file('deputy_ceo_image');
        if ($deputyceoimage) {
            $dceo_image = time() . rand() . '.' . $deputyceoimage->getClientOriginalExtension();
            $destinationPath = STORE_PATH.'/assets/images/executives';
            $deputyceoimage->move($destinationPath, $dceo_image);

            if ($contents->deputy_ceo_image) {
                /* unlink old image */
                $url = STORE_PATH.'/assets/images/executives' . $contents->deputy_ceo_image;
                @unlink($url);
            }
        } else {
            $dceo_image = '';
        }

        $data = array();

        if ($bimage != "") {
            $data['banner_image'] = $bimage;
        }
        if ($c_image != "") {
            $data['chairmen_image'] = $c_image;
        }
        if ($ceo_image != "") {
            $data['ceo_image'] = $ceo_image;
        }
        if ($dceo_image != "") {
            $data['deputy_ceo_image'] = $dceo_image;
        }

        if ($request->title_en != "") {
            $data['title_en'] = input_trims($request->title_en);
        }
        if ($request->title_ar != "") {
            $data['title_ar'] = input_trims($request->title_ar);
        }
        

        $data['slug'] = input_trims($request->slug);
        $data['meta_title'] = input_trims($request->meta_title);
        $data['meta_keyword'] = input_trims($request->meta_keyword);
        $data['meta_desc'] = input_trims($request->meta_desc);

        $data['banner_alt'] = input_trims($request->banner_alt);
        $data['chairment_alt'] = input_trims($request->chairment_alt);
        $data['ceo_alt'] = input_trims($request->ceo_alt);
        $data['deputy_ceo_alt'] = input_trims($request->deputy_ceo_alt);

        if ($request->description_en != "") {
            $data['description_en'] = input_trims($request->description_en);
        }
        if ($request->description_ar != "") {
            $data['description_ar'] = input_trims($request->description_ar);
        }
        

        if ($request->chairmen_name_en != "") {
            $data['chairmen_name_en'] = input_trims($request->chairmen_name_en);
        }
        if ($request->chairmen_description_en != "") {
            $data['chairmen_description_en'] = input_trims($request->chairmen_description_en);
        }
        if ($request->chairmen_description_ar != "") {
            $data['chairmen_description_ar'] = input_trims($request->chairmen_description_ar);
        }
       


        if ($request->ceo_name_en != "") {
            $data['ceo_name_en'] = input_trims($request->ceo_name_en);
        }
        if ($request->ceo_description_en != "") {
            $data['ceo_description_en'] = input_trims($request->ceo_description_en);
        }
        if ($request->ceo_description_ar != "") {
            $data['ceo_description_ar'] = input_trims($request->ceo_description_ar);
        }
        

        if ($request->deputy_ceo_name_en != "") {
            $data['deputy_ceo_name_en'] = input_trims($request->deputy_ceo_name_en);
        }
        if ($request->deputy_ceo_description_en != "") {
            $data['deputy_ceo_description_en'] = input_trims($request->deputy_ceo_description_en);
        }
        if ($request->deputy_ceo_description_ar != "") {
            $data['deputy_ceo_description_ar'] = input_trims($request->deputy_ceo_description_ar);
        }
       


        if (!empty($data)) {
            Executive::where('id', 1)->update($data);
        }

        $request->session()->flash('alert-success', 'Content has been updated!');
        return redirect('admin/content/executives');
    }

    /* Teams */

    public function fun_team(Request $request) {

        $teams = Team::where("parent_id", 0)->orderBy("team_order", "asc")->get();
        return View('admin.contents.team', compact('teams'));
    }

    public function createteam(Request $request, $id = 0) {

        $date = date("Y");
        if ($id != 0) {
            $team = Team::find($id);
            $type = 'edit';
            return View('admin.contents.createteam', compact('team', 'type', 'date'));
        } else {
            $team = array();
            $type = 'add';
            return View('admin.contents.createteam', compact('team', 'type', 'date'));
        }
    }

    public function update_team(Request $request) {

        if ($request->type == "add") {

            $image = $request->file('image');
            $timage = '';
            if ($image) {
                $timage = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = STORE_PATH.'/assets/images/team/';
                $image->move($destinationPath, $timage);
            }

            $team = new Team();
            $team->name = input_trims($request->name);
            $team->name_ar = input_trims($request->name_ar);
           

            $team->alt = input_trims($request->alt);
            $team->designation = input_trims($request->designation);
            $team->designation_ar = input_trims($request->designation_ar);
            

            $team->image = $timage;
            $team->description_en = input_trims($request->description_en);
            $team->description_ar = input_trims($request->description_ar);
            
            $team->long_description_en = input_trims($request->long_description_en);
            $team->long_description_ar = input_trims($request->long_description_ar);
            
            $team->team_short_description_en = input_trims($request->team_short_description_en);
            $team->team_short_description_ar = input_trims($request->team_short_description_ar);
            
            $team->tag1 = input_trims($request->tag1);
            $team->tag2 = input_trims($request->tag2);
            $team->tag3 = input_trims($request->tag3);
            $team->tag4 = input_trims($request->tag4);
            $team->tag5 = input_trims($request->tag5);
            $team->created = date("Y-m-d H:i:s");

            $team->save();

            $request->session()->flash('alert-success', 'Team has been added!');
        }


        if ($request->type == "edit") {
            
            $image = $request->file('image');
            $timage = '';
            $data = array();
            
            if ($image) {

                $timage = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = STORE_PATH.'/assets/images/team/'; 
                $image->move($destinationPath, $timage);

                // remove old team image
                $oldtimeline = Team::find($request->id);
                $url = STORE_PATH.'/assets/images/team/'. $oldtimeline->image;
                @unlink($url);
            }

            
            if ($timage != "") {
                $data['image'] = $timage;
            }

            if ($request->name) {
                $data['name'] = input_trims($request->name);
            }
            if ($request->name_ar) {
                $data['name_ar'] = input_trims($request->name_ar);
            }
            

            if ($request->designation) {
                $data['designation'] = input_trims($request->designation);
            }

            $data['designation_ar'] = input_trims($request->designation_ar);
           


            $data['description_en'] = input_trims($request->description_en);
            $data['description_ar'] = input_trims($request->description_ar);
            

            $data['long_description_en'] = input_trims($request->long_description_en);
            $data['long_description_ar'] = input_trims($request->long_description_ar);
            

            $data['team_short_description_en'] = input_trims($request->team_short_description_en);
            $data['team_short_description_ar'] = input_trims($request->team_short_description_ar);
           

            $data['alt'] = input_trims($request->alt);

            if ($request->tag1) {
                $data['tag1'] = input_trims($request->tag1);
            }
            if ($request->tag2) {
                $data['tag2'] = input_trims($request->tag2);
            }

            if ($request->tag3) {
                $data['tag3'] = input_trims($request->tag3);
            }

            if ($request->tag4) {
                $data['tag4'] = input_trims($request->tag4);
            }

            if ($request->tag5) {
                $data['tag5'] = input_trims($request->tag5);
            }
            
            if (!empty($data)) {
                Team::where('id', $request->id)->update($data);
            }

            $request->session()->flash('alert-success', 'Team member has been updated!');
        }

        return redirect('admin/content/team');
    }

    public function delete_team(Request $request, $id) {

        $team = Team::find($id);

        if ($team->image != "") {
            $url = STORE_PATH.'/assets/images/team/'. $team->image;
            @unlink($url);
        }

        Team::destroy($id);
        $request->session()->flash('alert-success', 'Team member has been deleted!');
        return redirect('admin/content/team');
    }

    public function status(Request $request, $id, $flag) {

        Team::where('id', $id)->update(array("status" => $flag));
        $request->session()->flash('alert-success', 'Team member status has been updated!');

        return redirect('admin/content/team');
    }

    /* Team Members	 */

    public function fun_team_member(Request $request) {
        $teams = Team::with("get_team_detail")->where('parent_id', '!=', 0)->orderBy("team_order", "asc")->get();

        $subteam = array();
        $i = 0;
        foreach ($teams as $team) {
            if ($team->get_team_detail->parent_id == 0) {
                $subteam[$i] = "";
            } else {
                $s_teams = Team::where('id', $team->get_team_detail->parent_id)->get()->first();
                $subteam[$i] = $s_teams->name;
            }
            $i++;
        }
        return View('admin.contents.team_member', compact('teams', 'subteam'));
    }

    public function createteam_member(Request $request, $id = 0) {

        $date = date("Y");
        if ($id != 0) {
            $main_team_id = 0;
            $sub_teams = array();
            $team = Team::find($id);
            $parent_team = Team::where('id', $team->parent_id)->get()->first();
            $sub_team_id = $parent_team->id;
            if ($parent_team->parent_id != 0) {
                $sub_team = Team::where('parent_id', $parent_team->parent_id)->get();
                $sub_teams = Team::where('id', $parent_team->parent_id)->get()->first();
                $main_team_id = $sub_teams->id;
                $sub_team_name = $sub_teams->name;
            } else {
                $main_team_id = $parent_team->id;
            }

            $parent_teams = Team::where('parent_id', '=', 0)->get();
            $type = 'edit';
            return View('admin.contents.createteam_member', compact('team', 'type', 'date', 'parent_teams', 'main_team_id', 'sub_team_id', 'sub_team_name', 'sub_teams', 'sub_team'));
        } else {
            $main_team_id = 0;
            $team = array();
            $parent_teams = Team::where('parent_id', '=', 0)->get();
            $type = 'add';
            return View('admin.contents.createteam_member', compact('team', 'type', 'date', 'parent_teams', 'main_team_id'));
        }
    }

    public function update_team_member(Request $request) {

        if ($request->type == "add") {

            $image = $request->file('image');
            $timage = '';
            if ($image) {
                $timage = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = STORE_PATH.'/assets/images/team/';
                $image->move($destinationPath, $timage);
            }

            $team = new Team();

            if ($request->team_id != 0) {
                $team->parent_id = input_trims($request->team_id);
            }
            if ($request->sub_team_id != 0) {
                $team->parent_id = input_trims($request->sub_team_id);
            }
            $team->name = input_trims($request->name);
            $team->name_ar = input_trims($request->name_ar);


            $team->alt = input_trims($request->alt);
            $team->designation = input_trims($request->designation);
            $team->designation_ar = input_trims($request->designation_ar);
            $team->image = $timage;
            $team->description_en = input_trims($request->description_en);
            $team->description_ar = input_trims($request->description_ar);
           
            $team->created = date("Y-m-d H:i:s");

            $team->save();

            $request->session()->flash('alert-success', 'Team has been added!');
        }


        if ($request->type == "edit") {

            $image = $request->file('image');
            $timage = '';
            if ($image) {

                $timage = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = STORE_PATH.'/assets/images/team/';
                $image->move($destinationPath, $timage);

                // remove old team image
                $oldtimeline = Team::find($request->id);
                $url = STORE_PATH.'/assets/images/team/' . $oldtimeline->image;
                @unlink($url);
            }


            $data = array();

            if ($request->team_id != 0) {
                $data['parent_id'] = input_trims($request->team_id);
            }

            if ($request->sub_team_id != 0) {
                $data['parent_id'] = input_trims($request->sub_team_id);
            }


            if ($timage != "") {
                $data['image'] = $timage;
            }

            if ($request->name) {
                $data['name'] = input_trims($request->name);
            }

            if ($request->name_ar) {
                $data['name_ar'] = input_trims($request->name_ar);
            }
           

            if ($request->designation) {
                $data['designation'] = input_trims($request->designation);
            }

            if ($request->designation_ar) {
                $data['designation_ar'] = input_trims($request->designation_ar);
            }

           


            if ($request->description_en) {
                $data['description_en'] = input_trims($request->description_en);
            }
            if ($request->description_ar) {
                $data['description_ar'] = input_trims($request->description_ar);
            }
            

            $data['alt'] = $request->alt;

            if (!empty($data)) {
                Team::where('id', $request->id)->update($data);
            }

            $request->session()->flash('alert-success', 'Team member has been updated!');
        }

        return redirect('admin/content/team_member');
    }

    public function delete_team_member(Request $request, $id) {

        $team = Team::find($id);
        $sub_team = Team::where("parent_id", $id)->get();

        if (count($sub_team) > 0) {
            foreach ($sub_team as $sub_tm) {
                if ($sub_tm->image != "") {
                    $url = STORE_PATH.'/assets/images/team/'. $sub_tm->image;
                    @unlink($url);
                }
                Team::destroy($sub_tm->id);
            }
        }

        if ($team->image != "") {
            $url = STORE_PATH.'/assets/images/team/'. $team->image;
            @unlink($url);
        }

        Team::destroy($id);
        $request->session()->flash('alert-success', 'Team member has been deleted!');
        return redirect('admin/content/team_member');
    }

    public function status_member(Request $request, $id, $flag) {

        Team::where('id', $id)->update(array("status" => $flag));
        Team::where('parent_id', $id)->update(array("status" => $flag));
        $request->session()->flash('alert-success', 'Team member status has been updated!');

        return redirect('admin/content/team_member');
    }

    public function ajax_get_teams(Request $request, $id = '') {
        $results = Team::where("parent_id", $request->team_id)->get();
        return View('admin.contents.ajax_get_team', compact('results'));
    }

    /* Careers */

    public function careers() {
        $contents = Careers::find(1);
        $type = 'edit';
        return View('admin.contents.careers', compact('contents', 'type'));
    }

    public function update_careers(Request $request) {

        $contents = Careers::find(1);

        $image = $request->file('banner_image');
        if ($image) {
            $bimage = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = STORE_PATH.('/assets/images/banner');
            $image->move($destinationPath, $bimage);
            /* unlink old image */
            $url = STORE_PATH . "/assets/images/banner/" . $contents->banner_image;
            @unlink($url);
        } else {
            $bimage = '';
        }

        $data = array();

        if ($bimage != "") {
            $data['banner_image'] = $bimage;
        }

        if ($request->title_en != "") {
            $data['title_en'] = $request->title_en;
        }
        if ($request->description_en != "") {
            $data['description_en'] = $request->description_en;
        }
        if ($request->recruitment_title_en != "") {
            $data['recruitment_title_en'] = $request->recruitment_title_en;
        }
        if ($request->recruitment_description_en != "") {
            $data['recruitment_description_en'] = $request->recruitment_description_en;
        }
        if ($request->opening_title_en != "") {
            $data['opening_title_en'] = $request->opening_title_en;
        }
        if ($request->opening_description_en != "") {
            $data['opening_description_en'] = $request->opening_description_en;
        }
        if ($request->find_more_job_title_en != "") {
            $data['find_more_job_title_en'] = $request->find_more_job_title_en;
        }
        if ($request->more_jobs_button_text != "") {
            $data['more_jobs_button_text'] = $request->more_jobs_button_text;
        }
        if ($request->more_jobs_button_link != "") {
            $data['more_jobs_button_link'] = $request->more_jobs_button_link;
        }
        if ($request->slug != "") {
            $data['slug'] = $request->slug;
        }
        $data['banner_image_alt'] = $request->banner_image_alt;

        if (!empty($data)) {
            Careers::where('id', 1)->update($data);
        }

        $request->session()->flash('alert-success', 'Career Content has been updated!');
        return redirect('admin/content/careers');
    }

    /* Steps Management */

    public function steps(Request $request) {

        $steps = Steps::orderBy("id", "desc")->get();
        return View('admin.contents.steps', compact('steps'));
    }

    public function add_steps(Request $request, $id = '') {

        if ($id == '') {

            $steps = array();
            $type = 'add';
            return View('admin.contents.createsteps', compact('steps', 'type'));
        } else {
            $steps = Steps::find($id);
            $type = 'edit';
            return View('admin.contents.createsteps', compact('steps', 'type'));
        }
    }

    public function store_steps(Request $request, $id = '') {

        if ($request->type == "add") {

            $step = new Steps();
            $step->title_en = $request->title_en;
            $step->title_ar = $request->title_ar;
           
            $step->short_description_en = $request->short_description_en;
            $step->short_description_ar = $request->short_description_ar;
           
            $step->long_description_en = $request->long_description_en;
            $step->long_description_ar = $request->long_description_ar;
           

            $step->created = date("Y-m-d H:i:s");
            $step->status = '1';
            $step->save();

            $request->session()->flash('alert-success', 'Career steps has been added!');
        }
        if ($request->type == "edit") {

            $data = array();
            if ($request->title_en) {
                $data['title_en'] = $request->title_en;
            }
            if ($request->title_ar) {
                $data['title_ar'] = $request->title_ar;
            }
           

            if ($request->short_description_en) {
                $data['short_description_en'] = $request->short_description_en;
            }
            if ($request->short_description_ar) {
                $data['short_description_ar'] = $request->short_description_ar;
            }
           

            if ($request->long_description_en) {
                $data['long_description_en'] = $request->long_description_en;
            }
            if ($request->long_description_ar) {
                $data['long_description_ar'] = $request->long_description_ar;
            }
            

            if (!empty($data)) {
                Steps::where('id', $request->id)->update($data);
            }

            $request->session()->flash('alert-success', 'Career steps has been updated!');
        }

        return redirect('admin/content/steps');
    }

    public function delete_steps(Request $request, $id) {
        $uniti = Steps::find($id);

        if ($uniti->icon != "") {
            $url = STORE_PATH . "/assets/images/icon/" . $uniti->icon;
            @unlink($url);
        }

        Steps::destroy($id);
        $request->session()->flash('alert-success', 'Career steps has been deleted!');
        return redirect('admin/content/steps');
    }

    public function status_steps(Request $request, $id, $flag) {

        Steps::where('id', $id)->update(array("status" => $flag));
        $request->session()->flash('alert-success', 'Career steps status has been updated!');

        return redirect('admin/content/steps');
    }

    /* Jobs Management */

    public function jobs(Request $request) {

        $jobs = Jobs::orderBy("id", "desc")->get();
        return View('admin.contents.jobs', compact('jobs'));
    }

    public function add_jobs(Request $request, $id = '') {

        if ($id == '') {

            $jobs = array();
            $type = 'add';
            return View('admin.contents.createjobs', compact('jobs', 'type'));
        } else {
            $jobs = Jobs::find($id);
            $type = 'edit';
            return View('admin.contents.createjobs', compact('jobs', 'type'));
        }
    }

    public function store_jobs(Request $request, $id = '') {

        if ($request->type == "add") {

            $job = new Jobs();
            $job->title_en = $request->title_en;
            $job->title_ar = $request->title_ar;
            
            $job->short_description_en = $request->short_description_en;
            $job->short_description_ar = $request->short_description_ar;
            
            $job->long_description_en = $request->long_description_en;
            $job->long_description_ar = $request->long_description_ar;
           
            $job->page_link = $request->page_link;

            $job->created = date("Y-m-d H:i:s");
            $job->status = '1';
            $job->save();

            $request->session()->flash('alert-success', 'Career Jobs has been added!');
        }
        if ($request->type == "edit") {

            $data = array();
            if ($request->title_en) {
                $data['title_en'] = $request->title_en;
            }
            if ($request->title_ar) {
                $data['title_ar'] = $request->title_ar;
            }
            

            if ($request->short_description_en) {
                $data['short_description_en'] = $request->short_description_en;
            }
            if ($request->short_description_ar) {
                $data['short_description_ar'] = $request->short_description_ar;
            }
            

            if ($request->long_description_en) {
                $data['long_description_en'] = $request->long_description_en;
            }
            if ($request->long_description_ar) {
                $data['long_description_ar'] = $request->long_description_ar;
            }
           
            if ($request->page_link) {
                $data['page_link'] = $request->page_link;
            }

            if (!empty($data)) {
                Jobs::where('id', $request->id)->update($data);
            }

            $request->session()->flash('alert-success', 'Career jobs has been updated!');
        }

        return redirect('admin/content/jobs');
    }

    public function delete_jobs(Request $request, $id) {
        $uniti = Jobs::find($id);

        if ($uniti->icon != "") {
            $url = STORE_PATH . "/assets/images/icon/" . $uniti->icon;
            @unlink($url);
        }

        Jobs::destroy($id);
        $request->session()->flash('alert-success', 'Career jobs has been deleted!');
        return redirect('admin/content/jobs');
    }

    public function status_jobs(Request $request, $id, $flag) {

        Jobs::where('id', $id)->update(array("status" => $flag));
        $request->session()->flash('alert-success', 'Career jobs status has been updated!');

        return redirect('admin/content/jobs');
    }
    
}
