<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller as Controller;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Contact;
use App\Models\Project;
use App\Models\Properties;
use App\Models\Aminities;
use App\Models\Unities;
use App\Models\Category;
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

class AdminContactController extends Controller {

    public function __construct() {
        $session_user_id = 1;//Sentinel::getUser()->id;

        $results_users = DB::selectOne(DB::raw("select users.*,tbl_module_access.* from users INNER JOIN tbl_module_access ON users.id=tbl_module_access.userid where users.id=" . $session_user_id));

        if ($results_users != NULL) {

            if ($results_users->contact_us == "0") {
                redirect()->to('/admin/permissionDenied')->send();
            }
        }
    }

    public function index() {
        // Grab all the properties
        $contacts = Contact::All();

        // Show the page
        return view('admin.contact.index', compact('contacts'));
    }

    public function status(Request $request, $id, $flag) {

        Contact::where('id', $id)->update(array("status" => $flag));
        $request->session()->flash('alert-success', 'Contact status has been updated!');

        return redirect('admin/contact');
    }

    public function delete(Request $request, $id) {
        $contact = Contact::find($id);
        Contact::destroy($id);
        $request->session()->flash('alert-success', 'Contact has been deleted!');
        return redirect('admin/contact');
    }

    public function create(Request $request, $id = '') {
        if ($id == '') {

            $contacts = array();
            $type = 'add';
            return view('admin.contact.createcontact', compact('contacts', 'type'));
        } else {
            $contacts = Contact::find($id);
            $type = 'edit';
            return view('admin.contact.createcontact', compact('contacts', 'type'));
        }
    }

    public function store_contact(Request $request, $id = '') {

        if ($request->type == "add") {

            $contact = new Contact();

            $Address = urlencode($request->address);
            $request_url = "http://maps.googleapis.com/maps/api/geocode/xml?address=" . $Address . "&sensor=true";
            $xml = simplexml_load_file($request_url) or die("url not loading");
            $status = $xml->status;
            if ($status == "OK") {
                $lat = $xml->result->geometry->location->lat;
                $lng = $xml->result->geometry->location->lng;
            } else {
                $lat = '';
                $lng = '';
            }

            $contact->address_type = $request->address_type;
            $contact->address_title = $request->address_title;
            $contact->address_title_ar = $request->address_title_ar;
            $contact->address_title_ch = $request->address_title_ch;

            $contact->phone_no = $request->phone_no;

            $contact->address = $request->address;
            $contact->address_ar = $request->address_ar;
            $contact->address_ch = $request->address_ch;

            $contact->lat = $lat;
            $contact->lng = $lng;
            $contact->fax_no = $request->fax_no;
            $contact->email_id = $request->email_id;

            $contact->working_hours = $request->working_hours;
            $contact->working_hours_ar = $request->working_hours_ar;
            $contact->working_hours_ch = $request->working_hours_ch;

            $contact->created = date("Y-m-d H:i:s");
            $contact->status = '1';

            $contact->save();

            $request->session()->flash('alert-success', 'Contact has been added!');
        }
        if ($request->type == "edit") {

            $data = array();

            $Address = urlencode($request->address);
            $request_url = "http://maps.googleapis.com/maps/api/geocode/xml?address=" . $Address . "&sensor=true";
            $xml = simplexml_load_file($request_url) or die("url not loading");
            $status = $xml->status;
            if ($status == "OK") {
                $lat = $xml->result->geometry->location->lat;
                $lng = $xml->result->geometry->location->lng;
            } else {
                $lat = '';
                $lng = '';
            }

            if ($request->address_type) {
                $data['address_type'] = $request->address_type;
            }


            if ($request->address_title) {
                $data['address_title'] = $request->address_title;
            }
            if ($request->address_title_ar) {
                $data['address_title_ar'] = $request->address_title_ar;
            }
            if ($request->address_title_ch) {
                $data['address_title_ch'] = $request->address_title_ch;
            }
            if ($request->phone_no) {
                $data['phone_no'] = $request->phone_no;
            }

            if ($request->address) {
                $data['address'] = $request->address;
            }
            if ($request->address_ar) {
                $data['address_ar'] = $request->address_ar;
            }
            if ($request->address_ch) {
                $data['address_ch'] = $request->address_ch;
            }

            if ($lat) {
                $data['lat'] = $lat;
            }

            if ($lng) {
                $data['lng'] = $lng;
            }
            if ($request->fax_no) {
                $data['fax_no'] = $request->fax_no;
            }
            if ($request->email_id) {
                $data['email_id'] = $request->email_id;
            }
            if ($request->working_hours) {
                $data['working_hours'] = $request->working_hours;
            }
            if ($request->working_hours_ar) {
                $data['working_hours_ar'] = $request->working_hours_ar;
            }
            if ($request->working_hours_ch) {
                $data['working_hours_ch'] = $request->working_hours_ch;
            }


            if (!empty($data)) {
                Contact::where('id', $request->id)->update($data);
            }

            $request->session()->flash('alert-success', 'Contact has been updated!');
        }

        return redirect('admin/contact');
    }

}
