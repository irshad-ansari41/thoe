<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\News;
use App\Models\Project;
use App\Models\Properties;
use App\Models\Aminities;
use App\Models\Unities;
use App\Models\Category;
use App\Models\Event;
use App\Models\Content;
use App\Models\Payment;
use App\Models\Booking;
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

class AdminPaymentController extends Controller {

    /**
     * Show a list of all the properties.
     *
     * @return View
     */
    public function __construct() {
        $session_user_id = 1; //Sentinel::getUser()->id;

        $results_users = DB::selectOne(DB::raw("select users.*,tbl_module_access.* from users INNER JOIN tbl_module_access ON users.id=tbl_module_access.userid where users.id=" . $session_user_id));

        if ($results_users != NULL) {

            if ($results_users->booking_payments == "0") {
                redirect()->to('/admin/permissionDenied')->send();
            }
        }
    }

    public function payment() {

        // Grab all the properties

        $content = Content::find(23);
        $ptype = "1";
        $records_menu = get_menu(1);
        $footers_part1 = get_menu(2, 4, 0);
        $footers_part2 = get_menu(2, 5, 4);
        $setting = get_setting();


        // Show the page
        return view('online-payments', compact('content', 'ptype', 'records_menu', 'footers_part1', 'footers_part2', 'setting'));
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
            $type = 'edit';
            return view('admin.news.createproject', compact('project', 'type'));
        }
    }

    /**
     * properties create form processing.
     *
     * @return Redirect
     */
    public function store(Request $request) {
        $content = new Content();
        $content->title = $request->title;
        $content->description = $request->description;
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
                $input['imagename'] = make_image_slug($image->getClientOriginalName());;
                $destinationPath = STORE_PATH.('/assets/images/pressrelease');
                $image->move($destinationPath, $input['imagename']);
            }

            $new = new News();
            $new->title = $request->title_en;

            $new->description = $request->description_en;

            $new->date = $request->date;
            $new->image = $input['imagename'];
            $new->created = date("Y-m-d H:i:s");
            $new->status = '1';

            $new->save();

            $request->session()->flash('alert-success', 'News has been added!');
        }
        if ($request->type == "edit") {



            $image = $request->file('image');
            $input['imagename'] = '';
            if ($image) {
                $project = News::find($request->id);
                if ($project->image != "") {
                    $url = STORE_PATH . "/assets/images/pressrelease/" . $project->image;
                    @unlink($url);
                }

                $input['imagename'] = make_image_slug($image->getClientOriginalName());;
                $destinationPath = STORE_PATH.('/assets/images/pressrelease');
                $image->move($destinationPath, $input['imagename']);
            }


            $data = array();
            if ($input['imagename'] != "") {
                $data['image'] = $input['imagename'];
            }

            if ($request->date) {
                $data['date'] = $request->date;
            }
            if ($request->title_en) {
                $data['title'] = $request->title_en;
            }

            if ($request->description_en) {
                $data['description'] = $request->description_en;
            }


            if (!empty($data)) {
                News::where('id', $request->id)->update($data);
            }

            $request->session()->flash('alert-success', 'News has been updated!');
        }

        return redirect('admin/news');
    }

    public function getSearch(Request $request) {

        $str = '';


        $query = Payment::query();

        $sdata = $_POST;

        if ($request->order_no != "") {
            $query = $query->where('order_id', $request->order_no);
        }

        if ($request->email != "") {
            $query = $query->where('email_id','like', "%$request->email%");
        }

        if ($request->status != "") {
            $query = $query->where('payment_status', $request->status);
        }

        if ($request->payment != "") {
            if ($request->payment == "5001") {
                $query = $query->where('payment_amount', '>=', $request->payment);
            } else {
                $price = explode("-", $request->payment);
                $query->whereBetween('payment_amount', [$price[0], $price[1]]);
            }
        }

        if ($request->from_date != "" && $request->to_date == "") {
            $query = $query->whereDate('payment_date', '>=', $request->from_date);
        }

        if ($request->from_date == "" && $request->to_date != "") {
            $query = $query->whereDate('payment_date', '<=', $request->to_date);
        }

        if ($request->from_date != "" && $request->to_date != "") {
            $query->whereDate('payment_date', '>=', $request->from_date)->whereDate('payment_date', '<=', $request->to_date);
        }


        $results = $query->orderBy("id", "desc")->paginate(10);

        return view('admin.booking.list', compact('results', 'og_title', 'og_desc', 'sdata'));
    }

    public function getSearchBooking(Request $request) {

        $str = '';


        $query = Booking::query();

        $sdata = $_POST;

        if ($request->order_no != "") {
            $query = $query->where('order_id', $request->order_no);
        }

        if ($request->email != "") {
            $query = $query->where('email_id', $request->email);
        }

        if ($request->status != "") {
            $query = $query->where('payment_status', $request->status);
        }

        if ($request->payment != "") {
            if ($request->payment == "5001") {
                $query = $query->where('payment_amount', '>=', $request->payment);
            } else {

                $price = explode("-", $request->payment);
                $query->whereBetween('payment_amount', [$price[0], $price[1]]);
            }
        }

        if ($request->from_date != "" && $request->to_date == "") {
            $query = $query->whereDate('created', '>=', $request->from_date);
        }

        if ($request->from_date == "" && $request->to_date != "") {
            $query = $query->whereDate('created', '<=', $request->to_date);
        }

        if ($request->from_date != "" && $request->to_date != "") {
            $query->whereDate('created', '>=', $request->from_date)->whereDate('created', '<=', $request->to_date);
        }



        $results = $query->orderBy("id", "desc")->paginate(30);

        return view('admin.booking.blist', compact('results', 'og_title', 'og_desc', 'sdata'));
    }

}
