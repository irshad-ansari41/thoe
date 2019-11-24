<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Models\Properties;
use App\Models\Project;
use View;
use Mail;
use DB;
use File;

class FormTestController extends Controller {

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
        $data = [
            'meta_title' => '',
            'meta_keyword' => '',
            'meta_description' => '',
            'locale' => $this->locale,
        ];
        //DB::country
        $data['country_codes'] = DB::table('country')->get();
        $data['Project'] = Project::where('status', '1')->orderBy("id", "asc")->orderBy("title_en", "asc")->orderBy("project_order", "asc")->get();
        $data['Properties'] = Properties::where('status', '1')->orderBy("id", "asc")->orderBy("title_en", "asc")->orderBy("sort_order", "asc")->get();

        return view("pages.test-form.form", $data);
    }

    public function send(Request $request) {
        
        //Property and Project Details Data Set
        $details = (array) DB::table('tbl_projects')
        ->join('tbl_properties', 'tbl_projects.id', '=', 'tbl_properties.project_id')
        ->where('tbl_properties.id', $request->building)
        ->select('tbl_properties.*', 'tbl_projects.id', 'tbl_projects.title_en As Project_title','tbl_projects.slug As pslug', 'tbl_properties.title_en', 'tbl_projects.gallery_location', 'tbl_properties.gallery_location As bpgallery_location', 'tbl_properties.id As bpid', 'nfcstatus')
        ->first();
        
        //Website $Path
        $Path = APP_URL. "/assets/images/properties/" . $details['gallery_location'] . '/' . $details['bpgallery_location'];
        
        //Brochures
        $brochuresdownloadlink=null;
        $file_brochures = STORE_PATH . "/assets/images/properties/" . $details['gallery_location'] . '/' . $details['bpgallery_location'] . "/brochures";
        $files = File::files($file_brochures);
        if(!empty($files)) { $brochuresdownloadlink =  $Path.'/brochures'.'/'.basename($files[0]); } 

        //Floor Plans
        $floorplandownloadlink=null;
        $file_floor_plans = STORE_PATH . "/assets/images/properties/" . $details['gallery_location'] . '/' . $details['bpgallery_location'] . "/floor-plans";
        $files_fl = File::files($file_floor_plans);
        if(!empty($files_fl)) { $floorplandownloadlink =  $Path.'/floor-plans'.'/'.basename($files_fl[0]); } 
        
        //Propery page Details Website url
        $websiteurl=null;
        !empty($details['pslug'] == 'riviera' ||  $details['pslug'] == 'victoria')? $websiteurl = SITE_URL."/en/dubai/meydan/".$details['pslug'].'/'.$details['slug']: $websiteurl = SITE_URL."/en/dubai/".$details['pslug'].'/'.$details['slug'];;
        //exit();
        
        $data = [
            'details' => $details,
            'brochuresdownloadlink'=> $brochuresdownloadlink,
            'floorplandownloadlink'=> $floorplandownloadlink,
            'websiteurl'=>$websiteurl,
            'subject' => "IPS Inquire - ".date('d M Y'),
            'fullname' => $request->fullname,
            'countrycode' => $request->countrycode,
            'phone' => $request->phone,
            'community' => $request->community,
            'building' => $request->building,
            'email' => $request->email,
        ];
        //return view('pages.test-form.newletter', $data);
        Mail::send('pages.test-form.newletter', ['data' => $data], function ($message) use ($data) {
          $message->subject($data['subject']);
          $message->from('info@thoedevelopments.com', 'The Heart of Europe');
          $message->to($data['email'],$data['fullname']);
          });

        return redirect(route('thank')); 
    }
    

}
