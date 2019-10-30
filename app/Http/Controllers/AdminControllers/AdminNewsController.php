<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Models\News;
use File;
use Redirect;
use View;
use Validator;
use DB;

class AdminNewsController extends Controller {

    /**
     * Show a list of all the properties.
     *
     * @return View
     */
    public function __construct() {
        $session_user_id = 1; //Sentinel::getUser()->id;

        $results_users = DB::selectOne(DB::raw("select users.*,tbl_module_access.* from users INNER JOIN tbl_module_access ON users.id=tbl_module_access.userid where users.id=" . $session_user_id));

        if ($results_users != NULL) {

            if ($results_users->news == "0") {
                redirect()->to('/admin/permissionDenied')->send();
            }
        }
    }

    public function index() {
        // Grab all the properties
        $news = News::orderBy('id','desc')->paginate(5);

        // Show the page
        return view('admin.news.index', compact('news'));
    }

    public function status(Request $request, $id, $flag) {

        News::where('id', $id)->update(array("status" => $flag));
        $request->session()->flash('alert-success', 'Press release status has been updated!');

        return redirect('admin/news');
    }

    /**
     * Create new properties
     *
     * @return View
     */
    public function create(Request $request, $id = '') {
        if ($id == '') {

            $project = array();
            $type = 'add';
            return view('admin.news.createproject', compact('project', 'type'));
        } else {
            $project = News::find($id);
            $coverage = DB::table('tbl_newscoverage')->where('news_pr_id', $id)->get();
            $type = 'edit';
            return view('admin.news.createproject', compact('project', 'type', 'coverage'));
        }
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

    public function store_news(Request $request, $id = '') {

        if ($request->type == "add") {

            $image = $request->file('image');
            $input['imagename'] = '';
            if ($image) {
                $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = STORE_PATH.('/assets/images/pressrelease');
                $image->move($destinationPath, $input['imagename']);
            }

            $new = new News();
            $new->title = input_trims($request->title_en);
            $new->title_ar = input_trims($request->title_ar);
            $new->title_ch = input_trims($request->title_ch);
            $new->alt = input_trims($request->alt);

            $new->description = input_trims($request->description_en);
            $new->description_ar = input_trims($request->description_ar);
            $new->description_ch = input_trims($request->description_ch);
            $new->slug = str_replace(' ', '-', preg_replace('/[^a-zA-Z0-9_ -]/s', '', input_trims(strtolower(substr($request->title_en, 0, 60)))));
            $new->description_long = input_trims($request->description_long_en);
            $new->description_long_ar = input_trims($request->description_long_ar);
            $new->description_long_ch = input_trims($request->description_long_ch);
            $new->meta_title = input_trims($request->meta_title);
            $new->meta_keyword = input_trims($request->meta_keyword);
            $new->meta_desc = input_trims($request->meta_desc);
            $new->date = input_trims($request->date);
            $new->image = $input['imagename'];
            $new->created = date("Y-m-d H:i:s");
            $new->status = '1';

            $new->save();

            $number = count($request['newstitle']);
            if ($number > 0) {
                for ($i = 0; $i < $number; $i++) {
                    if (!empty($request['newstitle'][$i]) && !empty($request['newsurl'][$i])) {
                        $sql = DB::table('tbl_newscoverage')->insert(array('news_pr_id' => $request['id'], 'newstitle' => $request['newstitle'][$i], 'newsurl' => $request['newsurl'][$i], 'updated_at' => date('Y-m-d h:i:s')));
                    }
                }
            }
            // end Coverage News
            // get insert news id

            $insertedId = $new->id;

            if ($insertedId != 0) {
                $path = STORE_PATH . '/assets/images/pressrelease/download/' . $insertedId;
                $sudopath = STORE_PATH . "/assets/images/pressrelease/download/" . $insertedId;
                $result = File::makeDirectory($path, $mode = 0777, true, true);

                $path2 = STORE_PATH . '/assets/images/pressrelease/download/' . $insertedId . '/document';
                $sudopath2 = STORE_PATH . "/assets/images/pressrelease/download/" . $insertedId . '/document';
                $result2 = File::makeDirectory($path2, $mode = 0777, true, true);

                $path3 = STORE_PATH . '/assets/images/pressrelease/download/' . $insertedId . '/image';
                $sudopath3 = STORE_PATH . "/assets/images/pressrelease/download/" . $insertedId . '/image';
                $result3 = File::makeDirectory($path3, $mode = 0777, true, true);

                chmod($sudopath, 0777);
                chmod($sudopath2, 0777);
                chmod($sudopath3, 0777);

                $doc = $request->file('doc');
                $image1 = $request->file('image1');



                if ($image1) {
                    $input['imagename'] = $image1->getClientOriginalName();
                    $destinationPath = $path3;
                    $image1->move($destinationPath, $input['imagename']);
                }

                if ($doc) {
                    $input['docname'] = $doc->getClientOriginalName();
                    $destinationPath = $path2;
                    $doc->move($destinationPath, $input['docname']);
                }
            }

            $request->session()->flash('alert-success', 'News has been added!');
        }
        if ($request->type == "edit") {


            $image = $request->file('image');

            $doc = $request->file('doc');
            $image1 = $request->file('image1');

            $input['imagename'] = '';

            if ($image) {
                $project = News::find($request->id);
                if ($project->image != "") {
                    $url = STORE_PATH . "/assets/images/pressrelease/" . $project->image;
                    @unlink($url);
                }

                $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = STORE_PATH . '/assets/images/pressrelease';
                $image->move($destinationPath, $input['imagename']);
            }

            $path_c = STORE_PATH . '/assets/images/pressrelease/download/' . $request->id;
            if (!is_dir($path_c)) {
                $path_c = STORE_PATH .'/assets/images/pressrelease/download/' . $request->id;
                $sudopath = STORE_PATH ."/assets/images/pressrelease/download/" . $request->id;
                File::makeDirectory($path_c, $mode = 0777, true, true);
                chmod($sudopath, 0777);

                $path2 = STORE_PATH .'/assets/images/pressrelease/download/' . $insertedId . '/document';
                $sudopath2 = STORE_PATH ."/assets/images/pressrelease/download/" . $insertedId . '/document';
                $result2 = File::makeDirectory($path2, $mode = 0777, true, true);
                chmod($sudopath2, 0777);

                $path3 = STORE_PATH .'/assets/images/pressrelease/download/' . $insertedId . '/image';
                $sudopath3 = STORE_PATH ."/assets/images/pressrelease/download/" . $insertedId . '/image';
                $result3 = File::makeDirectory($path3, $mode = 0777, true, true);
                chmod($sudopath3, 0777);
            }

            if ($doc) {
                $url = STORE_PATH . "/assets/images/pressrelease/download/" . $request->id . "/document";
                //@unlink($url);
                $success = File::cleanDirectory($url);

                $doc1 = $doc->getClientOriginalName();
                $destinationPath = STORE_PATH.('/assets/images/pressrelease/download/' . $request->id . '/document');
                $doc->move($destinationPath, $doc1);
            }

            if ($image1) {
                $url = STORE_PATH . "/assets/images/pressrelease/download/" . $request->id . "/image";
                //@unlink($url);
                $success = File::cleanDirectory($url);

                $img = $image1->getClientOriginalName();
                $destinationPath = STORE_PATH.('/assets/images/pressrelease/download/' . $request->id . '/image');
                $image1->move($destinationPath, $img);
            }


            $data = array();
            if ($input['imagename'] != "") {
                $data['image'] = $input['imagename'];
            }

            $data['alt'] = input_trims($request->alt);

            if ($request->date) {
                $data['date'] = input_trims($request->date);
            }
            if ($request->title_en) {
                $data['title'] = input_trims($request->title_en);
                $data['slug'] = str_replace(' ', '-', preg_replace('/[^a-zA-Z0-9_ -]/s', '', input_trims(strtolower($request->slug))));
                $data['meta_title'] = input_trims($request->meta_title);
                $data['meta_keyword'] = input_trims($request->meta_keyword);
                $data['meta_desc'] = input_trims($request->meta_desc);
            }
            if ($request->title_ar) {
                $data['title_ar'] = input_trims($request->title_ar);
            }
            if ($request->title_ch) {
                $data['title_ch'] = input_trims($request->title_ch);
            }

            if ($request->description_en) {
                $data['description'] = input_trims($request->description_en);
            }
            if ($request->description_ar) {
                $data['description_ar'] = input_trims($request->description_ar);
            }
            if ($request->description_ch) {
                $data['description_ch'] = input_trims($request->description_ch);
            }
            if ($request->description_long_en) {
                $data['description_long'] = input_trims($request->description_long_en);
            }
            if ($request->description_long_ar) {
                $data['description_long_ar'] = input_trims($request->description_long_ar);
            }
            if ($request->description_long_ch) {
                $data['description_long_ch'] = input_trims($request->description_long_ch);
            }

            if (!empty($data)) {
                News::where('id', $request->id)->update($data);
            }
            $number = count($request['newstitle']);
            if ($number > 0) {
                for ($i = 0; $i < $number; $i++) {
                    if (!empty($request['newstitle'][$i]) && !empty($request['newsurl'][$i])) {
                        if (!empty($request['ncarea_id'][$i])) {
                            $sql = DB::table('tbl_newscoverage')->where('id', $request['ncarea_id'][$i])->update(array('news_pr_id' => $request['id'], 'newstitle' => $request['newstitle'][$i], 'newsurl' => $request['newsurl'][$i], 'updated_at' => date('Y-m-d h:i:s')));
                        } else {
                            $sql = DB::table('tbl_newscoverage')->insert(array('news_pr_id' => $request['id'], 'newstitle' => $request['newstitle'][$i], 'newsurl' => $request['newsurl'][$i], 'updated_at' => date('Y-m-d h:i:s')));
                        }
                    }
                }
            }
            $request->session()->flash('alert-success', 'News has been updated!');
        }

        return redirect('admin/news');
    }

    public function delete_news(Request $request, $id) {

        $news = News::find($id);

        if ($news->image != "") {
            $url = STORE_PATH . "/assets/images/pressrelease/" . @$news->image;
            @unlink($url);

            $url = STORE_PATH . "/assets/images/pressrelease/download/" . $id;
            File::deleteDirectory($url);
        }

        News::destroy($id);

        $request->session()->flash('alert-success', 'News has been deleted!');
        return redirect('admin/news');
    }

    public function delete_coverage(Request $request) {
        //echo $request['id']; 
        DB::table('tbl_newscoverage')->where('id', '=', $request['id'])->delete();
        echo '<span style=color:red; font-weight:bold; >Record Successfully Deleted !</span><br/>';
    }

    //end delete_coverage
}
