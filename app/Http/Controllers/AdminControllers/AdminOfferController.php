<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Models\Offer;
use File;
use Redirect;
use View;
use Validator;
use DB;

class AdminOfferController extends Controller {

    /**
     * Show a list of all the properties.
     *
     * @return View
     */
    public function __construct() {
        $session_user_id = 1; //Sentinel::getUser()->id;

        $results_users = DB::selectOne(DB::raw("select users.*,tbl_module_access.* from users INNER JOIN tbl_module_access ON users.id=tbl_module_access.userid where users.id=" . $session_user_id));

        if ($results_users != NULL) {

            if ($results_users->offer == "0") {
                redirect()->to('/admin/permissionDenied')->send();
            }
        }
    }

    public function index() {
        // Grab all the properties
        $offer = Offer::orderBy('id', 'desc')->paginate(5);

        // Show the page
        return view('admin.offer.index', compact('offer'));
    }

    public function status(Request $request, $id, $flag) {

        Offer::where('id', $id)->update(array("status" => $flag));
        $request->session()->flash('alert-success', 'Press release status has been updated!');

        return redirect('admin/offer');
    }

    /**
     * Create new properties
     *
     * @return View
     */
    public function create(Request $request, $id = '') {
        if ($id == '') {
            $offer = array();
            $type = 'add';
            return view('admin.offer.createoffer', compact('offer', 'type'));
        } else {
            $offer = Offer::find($id);
            $type = 'edit';
            return view('admin.offer.createoffer', compact('offer', 'type'));
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

    public function store_offer(Request $request, $id = '') {

        if ($request->type == "add") {
            $image_names = [];
            for ($i = 0; $i <= 3; $i++) {
                $image = $request->file('image_' . $i);
                if (!empty($image)) {
                    $image_names[$i] = make_image_slug($image->getClientOriginalName());
                    $destinationPath = STORE_PATH . ('assets/images/offer');
                    $image->move($destinationPath, $image_names[$i]);
                }
            }

            $new = new Offer();
            $new->title_en = input_trims($request->title_en);
            $new->title_ar = input_trims($request->title_ar);
            $new->alt = input_trims($request->alt);

            $new->description_en = input_trims($request->description_en);
            $new->description_ar = input_trims($request->description_ar);
            $new->slug = str_replace(' ', '-', preg_replace('/[^a-zA-Z0-9_ -]/s', '', input_trims(strtolower(substr($request->title_en, 0, 60)))));
            $new->description_long_en = input_trims($request->description_long_en);
            $new->description_long_ar = input_trims($request->description_long_ar);
            $new->meta_title = input_trims($request->meta_title);
            $new->meta_keyword = input_trims($request->meta_keyword);
            $new->meta_desc = input_trims($request->meta_desc);
            $new->date = input_trims($request->date);
            $new->image = implode(',', $image_names);
            $new->youtube = $request->youtube;
            $new->created = date("Y-m-d H:i:s");
            $new->status = '1';

            $new->save();

            $request->session()->flash('alert-success', 'Offer has been added!');
        }
        if ($request->type == "edit") {
            $offer = Offer::find($request->id);
            $images = !empty($offer->image) ? explode(',', $offer->image) : [];
            $image_names = [];
            for ($i = 0; $i <= 3; $i++) {
                $image = $request->file('image_' . $i);
                if (!empty($image)) {
                    !empty($images[$i]) ? @unlink(STORE_PATH . "/assets/images/offer/" . $images[$i]) : '';
                    $image_names[$i] = make_image_slug($image->getClientOriginalName());
                    $destinationPath = STORE_PATH . ('assets/images/offer');
                    $image->move($destinationPath, $image_names[$i]);
                } else {
                    $image_names[$i] = !empty($images[$i]) ? $images[$i] : '';
                }
            }

            $data = array();

            if (!empty($image_names)) {
                $data['image'] = implode(',', array_filter($image_names));
            }

            $data['alt'] = input_trims($request->alt);
            $data['date'] = input_trims($request->date);
            $data['title_en'] = input_trims($request->title_en);
            $data['slug'] = $request->slug;
            $data['meta_title'] = input_trims($request->meta_title);
            $data['meta_keyword'] = input_trims($request->meta_keyword);
            $data['meta_desc'] = input_trims($request->meta_desc);
            $data['title_ar'] = input_trims($request->title_ar);
            $data['description_en'] = input_trims($request->description_en);
            $data['description_ar'] = input_trims($request->description_ar);
            $data['description_long_en'] = input_trims($request->description_long_en);
            $data['description_long_ar'] = input_trims($request->description_long_ar);
            $data['youtube'] = $request->youtube;;

            if (!empty($data)) {
                Offer::where('id', $request->id)->update($data);
            }

            $request->session()->flash('alert-success', 'Offer has been updated!');
        }

        return redirect('admin/offer');
    }

    public function delete_offer(Request $request, $id) {

        $offer = Offer::find($id);

        if ($offer->image != "") {
            $url = STORE_PATH . "/assets/images/offer/" . @$offer->image;
            @unlink($url);

            $url = STORE_PATH . "/assets/images/offer/download/" . $id;
            File::deleteDirectory($url);
        }

        Offer::destroy($id);

        $request->session()->flash('alert-success', 'Offer has been deleted!');
        return redirect('admin/offer');
    }

    public function delete_coverage(Request $request) {
        //echo $request['id']; 
        DB::table('tbl_offercoverage')->where('id', '=', $request['id'])->delete();
        echo '<span style=color:red; font-weight:bold; >Record Successfully Deleted !</span><br/>';
    }

    //end delete_coverage
}
