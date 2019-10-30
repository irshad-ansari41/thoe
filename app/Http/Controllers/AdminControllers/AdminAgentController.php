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
use App\Models\Agent;
use App\Models\AgentRole;
use App\Activations;
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

class AdminAgentController extends Controller {

    public function __construct() {
        $session_user_id = 1;//Sentinel::getUser()->id;

        $results_users = DB::selectOne(DB::raw("select users.*,tbl_module_access.* from users INNER JOIN tbl_module_access ON users.id=tbl_module_access.userid where users.id=" . $session_user_id));

        if ($results_users != NULL) {

            if ($results_users->agents == "0") {
                redirect()->to('/admin/permissionDenied')->send();
            }
        }
    }

    public function index() {
        // Grab all the properties
        $agents = Agent::where('user_type', '2')->paginate(10);

        // Show the page
        return view('admin.agents.index', compact('agents'));
    }

    public function status(Request $request, $id, $flag) {

        Agent::where('id', $id)->update(array("status" => $flag));
        $request->session()->flash('alert-success', 'Agent status has been updated!');

        return redirect('admin/agents');
    }

    public function delete(Request $request, $id) {
        $agents = Agent::find($id);
        Agent::destroy($id);
        $request->session()->flash('alert-success', 'Agent has been deleted!');
        return redirect('admin/agents');
    }

    public function resetf(Request $request, $id = '') {

        if ($request->type == "") {
            
        } else {
            return view('admin.agents.resetpassword', compact('id'));
        }
    }

    public function create(Request $request, $id = '') {
        if ($id == '') {

            $agents = array();
            $type = 'add';
            return view('admin.agents.createagent', compact('agents', 'type'));
        } else {
            $agents = Agent::find($id);
            $type = 'edit';
            return view('admin.agents.createagent', compact('agents', 'type'));
        }
    }

    public function store_contact(Request $request, $id = '') {

        if ($request->type == "add") {

            $agents = new Agent();

            $agents->username = $request->email;
            $agents->email = $request->email;
            $agents->first_name = $request->first_name;
            $agents->contact_no = $request->contact_no;
            $agents->created_at = date("Y-m-d H:i:s");
            $agents->user_type = '2';
            $agents->company = $request->company;
            $agents->comment = $request->comment;
            $agents->approve = '0';
            $agents->status = '1';
            $agents->password = 'P@ssword';

            $agents->save();


            $agent_role = new AgentRole();
            $agent_role->user_id = $agents->id;
            $agent_role->role_id = 2;
            $agent_role->created_at = date("Y-m-d H:i:s");

            $agent_role->save();

            $request->session()->flash('alert-success', 'Agent has been added!');
        }
        if ($request->type == "edit") {

            $data = array();

            if ($request->first_name) {
                $data['first_name'] = $request->first_name;
            }
            if ($request->contact_no) {
                $data['contact_no'] = $request->contact_no;
            }
            if ($request->company) {
                $data['company'] = $request->company;
            }
            if ($request->comment) {
                $data['comment'] = $request->comment;
            }
            if (!empty($data)) {
                Agent::where('id', $request->id)->update($data);
            }

            $request->session()->flash('alert-success', 'Agent has been updated!');
        }

        return redirect('admin/agents');
    }

    public function approveagent(Request $request, $id) {

        $agents = Agent::find($id);

        $activations = new Activations();

        $activations->user_id = $id;
        $activations->code = str_random(32);
        $activations->completed = 1;
        $activations->completed_at = date("Y-m-d H:i:s");
        $activations->created_at = date("Y-m-d H:i:s");
        $activations->updated_at = date("Y-m-d H:i:s");

        $activations->save();


        $name = $agents->first_name;
        $send_email = $agents->email;
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
        $random_apss = substr(str_shuffle($chars), 0, 6);
        $new_pass = Hash::make($random_apss);

        Agent::where('id', $id)->update(array("approve" => 1, "status" => 1, "password" => $new_pass));

        $message = "
				Hi, " . $name . "<br>
				Your account has been approved by AZIZI Development.<br/> 
				Following are the credentials for login.<br/><br/>
				URL : <a href='http://54.161.55.240/public/agentlogin'>Agent Login</a><br/>
				Username : " . $send_email . "<br/>
				Password : " . $random_apss . "<br/><br/>
				
				Thanks,<br>
				Azizi Development
		";

        $headers = "From: $name < $send_email >\n";
        $headers .= 'X-Mailer: PHP/' . phpversion();
        $headers .= "X-Priority: 1\n"; // Urgent message!
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=iso-8859-1\n";

        mail($send_email, "AZIZI - Your Account is approve !!", $message, $headers);

        $request->session()->flash('alert-success', 'Agent is approve!');
        return redirect('admin/agents');
    }

}
