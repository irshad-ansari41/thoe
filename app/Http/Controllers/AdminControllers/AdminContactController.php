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
        $session_user_id = 1; //Sentinel::getUser()->id;

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

            
            $contact->address_type = $request->address_type;
            $contact->address_title_en = $request->address_title_en;
            $contact->address_title_ar = $request->address_title_ar;
            $contact->title_en = $request->title_en;
            $contact->title_ar = $request->title_ar;
            $contact->description_en = $request->description_en;
            $contact->description_ar = $request->description_ar;
            $contact->phone_no = $request->phone_no;
            $contact->address = $request->address;
            $contact->address_ar = $request->address_ar;
            $contact->fax_no = $request->fax_no;
            $contact->email_id = $request->email_id;
            $contact->working_hours_en = $request->working_hours_en;
            $contact->working_hours_ar = $request->working_hours_ar;
            $contact->google_map = $request->google_map;
            $contact->created = date("Y-m-d H:i:s");
            $contact->status = '1';

            $contact->save();

            $request->session()->flash('alert-success', 'Contact has been added!');
        }
        if ($request->type == "edit") {

            $data = array();

            
            $data['address_type'] = $request->address_type;
            $data['address_title_en'] = $request->address_title_en;
            $data['address_title_ar'] = $request->address_title_ar;
            $data['title_en'] = $request->title_en;
            $data['title_ar'] = $request->title_ar;
            $data['description_en'] = $request->description_en;
            $data['description_ar'] = $request->description_ar;
            $data['phone_no'] = $request->phone_no;
            $data['address_en'] = $request->address_en;
            $data['address_ar'] = $request->address_ar;
            $data['fax_no'] = $request->fax_no;
            $data['email_id'] = $request->email_id;
            $data['working_hours_en'] = $request->working_hours_en;
            $data['working_hours_ar'] = $request->working_hours_ar;
            $data['google_map'] = $request->google_map;

            if (!empty($data)) {
                Contact::where('id', $request->id)->update($data);
            }

            $request->session()->flash('alert-success', 'Contact has been updated!');
        }

        return redirect('admin/contact/1/edit');
    }

}
