<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use Sentinel;
use View;
use App\Banner;
use App\Models\Project;
use App\Models\Properties;
use File;
use DB;

class AgentController extends Controller {

    public $locale;

    /**
     * Initializer.
     *
     * @return void
     */
    public function __construct(Request $request) {
        $this->locale = get_locale($request->segment(1));
        \App::setLocale($this->locale);
    }

    public function index(Request $request) {


        if (Sentinel::check()) {
            return redirect('agent-dashboard');
        }
        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            //return $cached;
        }

        $content = Content::find(24);

        $data = [
            "AllRatings" => DB::table('tbl_ratings')->where('menu_title','Agent Services')->where('menu_id',34)->first(),
            'content' => $content,
            'meta_title' => $content->meta_title,
            'meta_keyword' => $content->meta_keyword,
            'meta_description' => $content->meta_desc,
            'og_title' => $content->meta_title,
            'og_desc' => $content->meta_desc,
            'og_pic' => $content->image != "" ? url("/") . "/assets/images/banner/" . $content->image : '',
            'locale' => $this->locale,
        ];
        //check page
        set_cache_page($request->fullUrl(), view("pages.agent.index", $data)->render());

        return view('pages.agent.index', $data);
    }

    public function agent_dashboard(Request $request) {

        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            return $cached;
        }

        $this->locale = get_locale($request->segment(1));

        if (!Sentinel::check()) {
            return redirect('agent-login');
        }

        $projects = Project::All();

        if (!empty($projects)) {
            $i = 0;
            foreach ($projects as $project) {

                if (session()->get('lang') == 'en') {
                    $adatas[$i]['title'] = $project->title_en;
                } else if (session()->get('lang') == 'ar') {
                    $adatas[$i]['title'] = $project->title_ar;
                } else if (session()->get('lang') == 'cn') {
                    $adatas[$i]['title'] = $project->title_ch;
                }

                $adatas[$i]['id'] = $project->id;
                $adatas[$i]['path'] = $project->gallery_location;

                $properties = Properties::where("project_id", $project->id)->get();

                if (!empty($properties)) {
                    $j = 0;
                    foreach ($properties as $prop) {
                        $adatas[$i]['results'][$j]['id'] = $prop->id;
                        $adatas[$i]['results'][$j]['path'] = $project->gallery_location;

                        if (strlen($prop->title_en) <= 18) {
                            $adatas[$i]['results'][$j]['title_en'] = $prop->title_en;
                        } else {
                            $adatas[$i]['results'][$j]['title_en'] = substr($prop->title_en, 0, 18) . "..";
                        }


                        $adatas[$i]['results'][$j]['ppath'] = $prop->gallery_location;

                        $imagepath = url("/") . "/assets/images/properties/" . $project->gallery_location . "/" . $prop->gallery_location . "/" . $prop->holder_image;

                        if ($prop->holder_image != "") {
                            $adatas[$i]['results'][$j]['imagepath'] = $imagepath;
                        } else {
                            $adatas[$i]['results'][$j]['imagepath'] = "";
                        }
                        $j++;
                    }
                }

                $i++;
            }
        }
        $all_properties = Properties::All();
        $login_user = Sentinel::getUser();
        $username = $login_user->first_name;

        $data = [
            'all_properties' => $all_properties,
            'adatas' => $adatas,
            'username' => $username,
            'sort' => '',
            'keyword' => '',
            'from_date' => '',
            'to_date' => '',
            'meta_title' => '',
            'meta_keyword' => '',
            'meta_description' => '',
            'og_title' => '',
            'og_desc' => '',
            'og_pic' => '',
            'locale' => $this->locale,
        ];
        //check page
        set_cache_page($request->fullUrl(), view("pages.agent.dashboard", $data)->render());

        return view('pages.agent.dashboard', $data);
    }

    public function agent_dash(Request $request){

        $this->locale = get_locale($request->segment(1));

        
        $login_user = Sentinel::getUser();
        $username = $login_user->first_name;
        
        $projects = DB::table('tbl_projects')->where('title_'.$this->locale,'!=','Meydan')->where('status','1')->get();
        $properties = DB::table('tbl_properties')
        ->join('tbl_projects', 'tbl_projects.id', '=', 'tbl_properties.project_id')
        ->where('tbl_projects.status','1')->where('tbl_properties.status','1')
        ->select('tbl_properties.*', 'tbl_projects.*','tbl_projects.title_en As project_title_en', 'tbl_properties.title_en As property_title_en',
        'tbl_properties.id As proid','tbl_projects.gallery_location As project_location','tbl_properties.gallery_location As propert_location')                        
        ->orderBy('tbl_properties.title_en','ASC')->get();
        
        $data = [
            'projects'=>$projects, 
            'properties'=>$properties,
            'locale' => $this->locale, 
            'username' => $username,
            'sort' => '',
            'keyword' => '',
            'from_date' => '',
            'to_date' => '',
            'meta_title' => '',
            'meta_keyword' => '',
            'meta_description' => '',
            'og_title' => '',
            'og_desc' => '',
            'og_pic' => '',
                
        ];
        return view('pages.agent.dash', $data);
        
    }
    //
    public function agentLogin(Request $request) {

        $this->locale = get_locale($request->segment(1));
        if ($request->type == "1") {
            try {
                // Try to log the user in
                if (Sentinel::authenticate($request->only('email', 'password'), $request->get('remember-me', 0))) {
                    $approve = Sentinel::getUser()->approve;
                    $status = Sentinel::getUser()->status;
                    if ($approve == 0) {
                        Sentinel::logout();
                        return Redirect::to('agent-login')->with('error', 'Your account is not approve by admin');
                    } else if ($status == 0) {
                        Sentinel::logout();
                        return Redirect::to('agent-login')->with('error', 'Your account is disable by admin');
                    } else {
                        return redirect($this->locale . '/agent-dashboard');
                    }
                } else {
                    return Redirect::to('agent-login')->with('error', 'Username or password is incorrect.');
                }
            } catch (UserNotFoundException $e) {
                $this->messageBag->add('email', Lang::get('auth/message.account_not_found'));
            } catch (NotActivatedException $e) {
                $this->messageBag->add('email', Lang::get('auth/message.account_not_activated'));
            } catch (UserSuspendedException $e) {
                $this->messageBag->add('email', Lang::get('auth/message.account_suspended'));
            } catch (UserBannedException $e) {
                $this->messageBag->add('email', Lang::get('auth/message.account_banned'));
            }

            // Ooops.. something went wrong
            return Redirect::back()->withInput()->withErrors($this->messageBag);
        }
    }

    public function agentRegister(Request $request) {
        $activate = true;
        $user = Sentinel::register($request->except('_token'), $activate);

        //add user to 'User' group
        $role = Sentinel::findRoleByName('User');
        $role->users()->attach($user);

        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $country = $request->country;
        $contact_no = $request->contact_no;
        $email = $request->email;
        $company = $request->company;
        $comment = $request->comment;

        $message = "
                Hello ,<br>
                Following new user has been register into site<br><br>						
                Name 			: $first_name $last_name<br>
                Contact No.		: $contact_no<br>
                E-mail 			: $email<br>
                Country 		: $country<br>
                Company 		: $company<br>
                Comment 		: $comment<br><br>
                Thanks...<br>
                Azizi Development..
                            ";



        $headers = "From: $first_name $last_name< $email >\n";
        $headers .= 'X-Mailer: PHP/' . phpversion();
        $headers .= "X-Priority: 1\n"; // Urgent message!
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=iso-8859-1\n";

        mail($email, "New Agent Register", $message, $headers);

        return 1;
    }

    public function downloaddata(Request $request) {
        if ($request->agentdash_project) {
            $id = $request->agentdash_project;
            $records = Properties::find($id);
            $records2 = Project::find($records->project_id);

            if ($request->agentdash_project_asset == "1") {
                if (File::exists(STORE_PATH . "/assets/images/properties/" . $records2->gallery_location . '/' . $records->gallery_location . '/Brochures.zip')) {
                    return response()->download(STORE_PATH . ("/assets/images/properties/" . $records2->gallery_location . '/' . $records->gallery_location . '/Brochures.zip'));
                } else {
                    return redirect('agent-dashboard');
                }
            }
            if ($request->agentdash_project_asset == "2") {
                if (File::exists(STORE_PATH . "/assets/images/properties/" . $records2->gallery_location . '/' . $records->gallery_location . '/Floor_Plans.zip')) {
                    return response()->download(STORE_PATH . ("/assets/images/properties/" . $records2->gallery_location . '/' . $records->gallery_location . '/Floor_Plans.zip'));
                } else {
                    return redirect('agent-dashboard');
                }
            }
            if ($request->agentdash_project_asset == "3") {
                return redirect('agent-dashboard');
            }
        } else {
            return redirect('agent-dashboard');
        }
    }

}
