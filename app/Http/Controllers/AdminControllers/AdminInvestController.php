<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Models\Invest;
use File;
use Redirect;
use View;
use Validator;
use DB;

class AdminInvestController extends Controller {

    /**
     * Show a list of all the properties.
     *
     * @return View
     */
    public function __construct() {
        $session_user_id = 1; //Sentinel::getUser()->id;

        $results_users = DB::selectOne(DB::raw("select users.*,tbl_module_access.* from users INNER JOIN tbl_module_access ON users.id=tbl_module_access.userid where users.id=" . $session_user_id));

        if ($results_users != NULL) {

            if ($results_users->invest == "0") {
                redirect()->to('/admin/permissionDenied')->send();
            }
        }
    }

    public function index() {

        return redirect('admin/invest/1/edit');

        // Grab all the properties
        $invest = Invest::orderBy('id', 'desc')->paginate(5);

        // Show the page
        return view('admin.invest.index', compact('invest'));
    }

    public function status(Request $request, $id, $flag) {

        Invest::where('id', $id)->update(array("status" => $flag));
        $request->session()->flash('alert-success', 'Press release status has been updated!');

        return redirect('admin/invest');
    }

    /**
     * Create new properties
     *
     * @return View
     */
    public function create(Request $request, $id = '') {
        if ($id == '') {
            $invest = array();
            $type = 'add';
            return view('admin.invest.createinvest', compact('invest', 'type'));
        } else {
            $invest = Invest::find($id);
            $type = 'edit';
            return view('admin.invest.createinvest', compact('invest', 'type'));
        }
    }

    /**
     * properties create form processing.
     *
     * @return Redirect
     */
    public function store(Request $request) {
        $content = new Content();
        $content->title_en = input_trims($request->title_en);
        $content->description_en = input_trims($request->description_en);
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

    public function store_invest(Request $request, $id = '') {

        if ($request->type == "add") {

            $image = $request->file('image');
            $input['imagename'] = '';
            if ($image) {
                $input['imagename'] = make_image_slug($image->getClientOriginalName());;
                $destinationPath = STORE_PATH . ('assets/images/invest');
                $image->move($destinationPath, $input['imagename']);
            }

            $new = new Invest();
            $new->title_en = input_trims($request->title_en);
            $new->title_ar = input_trims($request->title_ar);
            $new->alt = input_trims($request->alt);
            $new->description_en = input_trims($request->description_en);
            $new->description_ar = input_trims($request->description_ar);
            $new->section_en = serialize($request->section_en);
            $new->section_ar = serialize($request->section_ar);
            $new->image = $input['imagename'];
            $new->created = date("Y-m-d H:i:s");
            $new->status = '1';

            $new->save();

            $request->session()->flash('alert-success', 'Invest has been added!');
        }
        if ($request->type == "edit") {


            $image = $request->file('image');


            $input['imagename'] = '';

            if ($image) {
                $invest = Invest::find($request->id);
                if ($invest->image != "") {
                    $url = STORE_PATH . "/assets/images/invest/" . $invest->image;
                    @unlink($url);
                }

                $input['imagename'] = make_image_slug($image->getClientOriginalName());;
                $destinationPath = STORE_PATH . '/assets/images/invest';
                $image->move($destinationPath, $input['imagename']);
            }

            $data = array();
            if ($input['imagename'] != "") {
                $data['image'] = $input['imagename'];
            }

            $data['alt'] = input_trims($request->alt);
            $data['title_en'] = input_trims($request->title_en);
            $data['title_ar'] = input_trims($request->title_ar);
            $data['description_en'] = input_trims($request->description_en);
            $data['description_ar'] = input_trims($request->description_ar);
            $data['section_en'] = serialize($request->section_en);
            $data['section_ar'] = serialize($request->section_ar);


            if (!empty($data)) {
                Invest::where('id', $request->id)->update($data);
            }

            $request->session()->flash('alert-success', 'Invest has been updated!');
        }

        return redirect('admin/invest');
    }

    public function delete_invest(Request $request, $id) {

        $invest = Invest::find($id);

        if ($invest->image != "") {
            $url = STORE_PATH . "/assets/images/invest/" . @$invest->image;
            @unlink($url);

            $url = STORE_PATH . "/assets/images/invest/download/" . $id;
            File::deleteDirectory($url);
        }

        Invest::destroy($id);

        $request->session()->flash('alert-success', 'Invest has been deleted!');
        return redirect('admin/invest');
    }

    public function delete_coverage(Request $request) {
        //echo $request['id']; 
        DB::table('tbl_investcoverage')->where('id', '=', $request['id'])->delete();
        echo '<span style=color:red; font-weight:bold; >Record Successfully Deleted !</span><br/>';
    }

    //end delete_coverage
}
