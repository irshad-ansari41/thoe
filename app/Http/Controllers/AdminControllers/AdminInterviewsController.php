<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Models\Interviews;
use View;
use DB;

class AdminInterviewsController extends Controller {

    /**
     * Show a list of all the properties.
     *
     * @return View
     */
    public function __construct() {
        $session_user_id = 1;//Sentinel::getUser()->id;

        $results_users = DB::selectOne(DB::raw("select users.*,tbl_module_access.* from users INNER JOIN tbl_module_access ON users.id=tbl_module_access.userid where users.id=" . $session_user_id));

        if ($results_users != NULL) {

            if ($results_users->events == "0") {
                redirect()->to('/admin/permissionDenied')->send();
            }
        }
    }

    public function index() {
        // Grab all the properties
        $interviews = Interviews::orderBy('id','desc')->paginate(5);
        // Show the page
        return view('admin.interviews.index', compact('interviews'));
    }

    public function status(Request $request, $id, $flag) {

        Interviews::where('id', $id)->update(array("status" => $flag));
        $request->session()->flash('alert-success', 'Status has been updated!');
        return redirect('admin/interviews/');
    }

    public function delete_interviews(Request $request, $id = '') {
        $interview = Interviews::find($id);

        if ($interview->interview_photo_en != "") {
            $url = STORE_PATH . "/assets/images/media/interviews/" . $interview->interview_photo_en;
            @unlink($url);
        }
        Interviews::where('id', $id)->delete();
        //Gallery_child::where('gallery_id', $id)->delete();
        $request->session()->flash('alert-success', 'Event has been deleted!');
        return redirect('admin/interviews');
    }

    public function create(Request $request, $id = '') {
        //return view('admin.news.createproject');
        if ($id == '') {
            $project = array();
            $type = 'add';
            return view('admin.interviews.createproject', compact('project', 'type'));
        } else {
            $project = Interviews::find($id);
            $type = 'edit';
            return view('admin.interviews.createproject', compact('project', 'type'));
        }
    }

    public function store_interviews(Request $request, $id = '') {

        if ($request->type == "add") {

            $image = $request->file('image');
            $input['imagename'] = '';
            if ($image) {
                $input['imagename'] = time() . rand() . '.' . $image->getClientOriginalExtension();
                $destinationPath = STORE_PATH . '/assets/images/media/interviews';
                $image->move($destinationPath, $input['imagename']);
            }

            $new = new Interviews();
            $new->interview_title_en = trim($request->event_title);
            $new->interview_title_ar = trim($request->event_title_ar);
            $new->interview_title_cn = trim($request->event_title_ch);
            $new->interview_date = trim($request->date);

            $new->interview_photo = $input['imagename'];
            $new->interview_photo_alt = trim($request->event_photo_alt);

            $new->slug_en = trim($request->slug);
            $new->slug_ar = trim($request->slug_ar);
            $new->slug_cn = trim($request->slug_ch);

            $new->meta_title = trim($request->meta_title);
            $new->meta_keyword = trim($request->meta_keyword);
            $new->meta_desc = trim($request->meta_desc);

            $new->long_desc_en = trim($request->extra_desc);
            $new->long_desc_ar = trim($request->extra_desc_ar);
            $new->long_desc_cn = trim($request->extra_desc_ch);

            $new->created = date("Y-m-d H:i:s");
            $new->status = '1';

            $new->save();
            $request->session()->flash('alert-success', 'Event has been added!');
        }
        if ($request->type == "edit") {


            $image = $request->file('image');
            $input['imagename'] = '';
            if ($image) {
                $project = Interviews::find($request->id);
                if ($project->interview_photo != "") {
                    $url = STORE_PATH . "/assets/images/media/interviews/" . $project->interview_photo;
                    @unlink($url);
                }

                $input['imagename'] = time() . rand() . '.' . $image->getClientOriginalExtension();
                $destinationPath = STORE_PATH . '/assets/images/media/interviews';
                $image->move($destinationPath, $input['imagename']);
            }
            $data = array();
            if ($input['imagename'] != "") {
                $data['interview_photo'] = $input['imagename'];
            }
            $data['interview_title_en'] = trim($request->event_title);
            $data['interview_title_ar'] = trim($request->event_title_ar);
            $data['interview_title_cn'] = trim($request->event_title_ch);
            
            $data['slug_en'] = trim($request->slug);
            $data['slug_ar'] = trim($request->slug_ar);
            $data['slug_cn'] = trim($request->slug_ch);

            $data['meta_title'] = trim($request->meta_title);
            $data['meta_keyword'] = trim($request->meta_keyword);
            $data['meta_desc'] = trim($request->meta_desc);
            $data['interview_photo_alt'] = trim($request->event_photo_alt);
            $data['interview_date'] = trim($request->date);

            $data['long_desc_en'] = trim($request->extra_desc);
            $data['long_desc_ar'] = trim($request->extra_desc_ar);
            $data['long_desc_cn'] = trim($request->extra_desc_ch);

            if (!empty($data)) {
                Interviews::where('id', $request->id)->update($data);
            }

            $request->session()->flash('alert-success', 'Event has been updated!');
        }

        return redirect('admin/interviews');
    }

}
