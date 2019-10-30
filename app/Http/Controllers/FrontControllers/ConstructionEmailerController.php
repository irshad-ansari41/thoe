<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use App\Banner;
use App\Models\Project;
use App\Models\Properties;
use html;
use DB;
use Mail;

class ConstructionEmailerController extends Controller {

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

    public function index() {
        //return __METHOD__;

        $Content = Content::all();
        $Project = Project::select('id', 'title_en', 'gallery_location')->where('cons_status', 'Yes')->where('id', '!=', 10)->orderBy('title_en', 'ASC')->get();
        $Properties = Properties::select('id', 'project_id', 'title_en', 'mobilization_percentage', 'structure_percentage', 'mep_percentage', 'finishes_percentage', 'gallery_location', 'header_image', 'holder_image', 'nfcstatus')
                        ->where('status', 1)->where('completed', 0)->where('constrution_show', 'Yes')->orderBy('title_en', 'ASC')->get();

        /* $option[0] ='---SELECT---';
          if(!empty($Project)):foreach($Project as $rows):
          $option[$rows->id]=$rows->title_en;
          endforeach; endif;

          $option1[0] ='---SELECT---';
          if(!empty($Properties)):foreach($Properties as $rows):
          $option1[$rows->id]=['project_id'=>$rows->project_id,'title_en'=>$rows->title_en];
          endforeach; endif;

          $data['option']=$option;
          $data['option1']=$option1; */

        return View('csu.frmcsu', ['Project' => $Project, 'Properties' => $Properties]);
    }

    public function csusend(Request $request) {

        $this->validate(
                $request, [
            'projectid' => 'required',
            'buildingid' => 'required',
            'fMOBILIZATION' => 'required',
            'fGROUND' => 'required',
            'fSTRUCTURE' => 'required',
            'fFINISHING' => 'required',
            'email' => 'required|email',
                ]
        );
        //return __METHOD__;
        $ProjectId = $request->projectid;
        $BuildingId = $request->buildingid;
        $fMOBILIZATION = $request->fMOBILIZATION;
        $fGROUND = $request->fGROUND;
        $fSTRUCTURE = $request->fSTRUCTURE;
        $fFINISHING = $request->fFINISHING;
        $EmailAddress = $request->email;
        $Subjects = 'Construction Updates -' . date('d F Y');
        //echo $ProjectId.' '.$BuildingId.' '.$fGROUND.' '.$fSTRUCTURE.' '.$fFINISHING;

        $result = (array) DB::table('tbl_projects')
                        ->join('tbl_properties', 'tbl_projects.id', '=', 'tbl_properties.project_id')
                        ->where('tbl_properties.id', $BuildingId)
                        ->select('tbl_properties.*', 'tbl_projects.id', 'tbl_projects.title_en', 'tbl_projects.gallery_location', 'tbl_properties.gallery_location As bpgallery_location', 'tbl_properties.id As bpid', 'nfcstatus')
                        ->first();
        //echo '<pre>'; print_r($result); echo '</pre>';
        $result['name'] = 'Azizi Developments';
        $result['EmailAddress'] = $EmailAddress;
        $result['fMOBILIZATION'] = $fMOBILIZATION;
        $result['GROUND'] = $fGROUND;
        $result['STRUCTURE'] = $fSTRUCTURE;
        $result['FINISHING'] = $fFINISHING;
        $result['Subject'] = $Subjects;

        Mail::send('csu.send', ['CSUpdate' => $result], function($msg) use ($result) {
            $msg->from('info@azizidevelopments.com', 'Azizi Developments')
                    ->to($result['EmailAddress'], 'Azizi Developments')
                    //->cc('zubair.khan@azizidevelopments.com','Azizi Developments') 
                    ->subject($result['Subject']);
        });

        return redirect(route('csu.index'));
    }

    public function frm_csu_emailer() {

        $Content = Content::all();
        $title = ['Mr' => 'Mr.', 'Mrs' => 'Mrs.'];
        $Project = Project::select('id', 'title_en', 'gallery_location')->where('cons_status', 'Yes')->where('id', '!=', 10)->orderBy('title_en', 'ASC')->get();
        $Properties = Properties::select('id', 'project_id', 'title_en', 'mobilization_percentage', 'structure_percentage', 'mep_percentage', 'finishes_percentage', 'gallery_location', 'header_image', 'holder_image', 'nfcstatus')
                        ->where('status', 1)->where('completed', 0)->where('constrution_show', 'Yes')->orderBy('title_en', 'ASC')->get();
        return View('csu.frm-csu-emailer', ['Project' => $Project, 'Properties' => $Properties, 'title' => $title]);
    }

    public function send_csu_emailer(Request $request) {
        $this->validate(
                $request, [
            'title' => 'required',
            'customername' => 'required',
            'projectid' => 'required',
            'buildingid' => 'required',
            'MOBILIZATION' => 'required',
            'STRUCTURE' => 'required',
            'MEP_WORKS' => 'required',
            'FINISHING' => 'required',
            'email' => 'required|email',
                ], [
            'title.required' => 'Please Select Title',
            'customername.required' => 'Please Enter Customer Name',
            'projectname.required' => 'Please Select Project Area',
            'buildingname.required' => 'Please Select Building Name',
                ]
        );
        //return __METHOD__;
        $ProjectId = $request->projectid;
        $BuildingId = $request->buildingid;
        $fMOBILIZATION = $request->MOBILIZATION;
        $fGROUND = $request->MEP_WORKS;
        $fSTRUCTURE = $request->STRUCTURE;
        $fFINISHING = $request->FINISHING;
        $EmailAddress = $request->email;
        $Subjects = 'Construction Updates -' . date('d F Y');
        //echo $ProjectId.' '.$BuildingId.' '.$fGROUND.' '.$fSTRUCTURE.' '.$fFINISHING;

        $result = (array) DB::table('tbl_projects')
                        ->join('tbl_properties', 'tbl_projects.id', '=', 'tbl_properties.project_id')
                        ->where('tbl_properties.id', $BuildingId)
                        ->select('tbl_properties.*', 'tbl_projects.id', 'tbl_projects.title_en', 'tbl_projects.gallery_location', 'tbl_properties.gallery_location As bpgallery_location', 'tbl_properties.id As bpid', 'nfcstatus')
                        ->first();
        //echo '<pre>'; print_r($result); echo '</pre>';
        $result['name'] = 'Azizi Developments';
        $result['EmailAddress'] = $EmailAddress;
        $result['fMOBILIZATION'] = $fMOBILIZATION;
        $result['GROUND'] = $fGROUND;
        $result['STRUCTURE'] = $fSTRUCTURE;
        $result['FINISHING'] = $fFINISHING;
        $result['Subject'] = $Subjects;

        Mail::send('csu.emailer-construction-updates', ['CSUpdate' => $result], function($msg) use ($result) {
            $msg->from('info@azizidevelopments.com', 'Azizi Developments')
                    ->to($result['EmailAddress'], 'Azizi Developments')
                    //->cc('zubair.khan@azizidevelopments.com','Azizi Developments') 
                    ->subject($result['Subject']);
        });

        return redirect(route('csu.csu-emailer'));
    }

    public function send_csu_emailer_bulk(Request $request, $id) {

        if ($id == '2019@Azizi'):
            $emailer = DB::table('tbl_customer')
                            ->where('status', 'No')
                            ->where('email', '!=', '0')
                            ->where('email', '!=', '')
                            //->where('email','NOT LIKE','%_@__%.__%')
                            ->whereIn('pro_type', ['Testing','Customer'])
                            ->whereIn('pro_phase', ['Riviera Phase 1', 'Riviera Phase 2', 'Riviera Phase 3', 'Azizi Plaza', 'Azizi Star', 'Farishta Azizi', 'Samia Azizi', 'Shaista Azizi', 'Azizi Aura', 'Azizi Aliyah Residence', 'Farhad Azizi Residence', 'Azizi Mina'])->get();
            foreach ($emailer as $rows):
                //echo 'Email Address: '. $rows['email'].' Building Name: '.$rows['buildingname'].'<br/>';
                $result = DB::table('tbl_projects')
                        ->join('tbl_properties', 'tbl_projects.id', '=', 'tbl_properties.project_id')
                        ->where('tbl_properties.title_en', $rows->property)
                        //->whereNotIn('tbl_properties.title_en',['Azizi Riviera 37','Azizi Riviera 38','Azizi Riviera 39','Azizi Riviera 40','Azizi Riviera 48'])
                        ->select('tbl_properties.*', 'tbl_projects.id', 'tbl_projects.title_en As protitle', 'tbl_projects.title_ar As protitle_ar', 'tbl_projects.gallery_location', 'tbl_properties.gallery_location As bpgallery_location', 'tbl_properties.id As bpid', 'nfcstatus', 'tbl_properties.title_en As BulidingName')
                        ->get();

                foreach ($result as $Results):
                    $img = DB::table('tbl_construction_gallery')->where('property_id', $Results->bpid)->orderby('created', 'DESC')->select('image')->first();
                    //print_r($Results); die();
                    $data = [
                        'protitle' => $Results->protitle,
                        'protitle_ar' => $Results->protitle_ar,
                        'picture' => !empty($img->image) ? $img->image : '',
                        'BulidingName' => $Results->BulidingName,
                        'fMOBILIZATION' => $Results->mobilization_percentage,
                        'STRUCTURE' => $Results->structure_percentage,
                        'GROUND' => $Results->mep_percentage,
                        'FINISHING' => $Results->finishes_percentage,
                        'nfcstatus' => $Results->nfcstatus,
                        'location' => $Results->location,
                        'public_completion' => $Results->public_completion,
                        'gallery_location' => $Results->gallery_location,
                        'bpgallery_location' => $Results->bpgallery_location,
                        'EmailAddress' => !empty($rows->email) ? filter_var($rows->email, FILTER_VALIDATE_EMAIL) : '',
                        'fullname' => $rows->fullname,
                        'phase' => $rows->pro_phase,
                        'phase_ar' => $rows->pro_phase_ar,
                        'Subject' => 'Construction Updates Azizi Developments - ' . $rows->pro_phase,
                        'name' => 'Azizi Developments',
                    ];
                endforeach;
                
                if (!empty($data['EmailAddress'])):
                    Mail::send('csu.customer-emailer', ['CSUpdate' => $data], function($msg) use ($data) {
                        $msg->from('info@azizidevelopments.com', 'Azizi Developments')
                                ->to($data['EmailAddress'], 'Azizi Developments')
                                //->cc('zubair.khan@azizidevelopments.com','Azizi Developments') 
                                ->subject($data['Subject']);
                    });
                    sleep(4);
                    echo '<span>Full Name: ' . $rows->fullname . ' Email Address: ' . $rows->email . ' Building Name: ' . $rows->pro_phase . '  Email Has been Sent !</span><br/>';
                    DB::table('tbl_customer')->where('status', 'No')->where('email', $rows->email)->where('id', $rows->id)->update(['status' => 'Yes']);
                    //echo '<pre>'; print_r($data); echo '</pre>';
                    //return view('csu.customer-emailer-v1-en',['CSUpdate' => $data]);
                    //return view('csu.customer-emailer-v1-ar',['CSUpdate' => $data]);
                endif;
                
            endforeach;
        //return redirect(route('csu.csu-emailer'));
            
        endif;
    }

}
