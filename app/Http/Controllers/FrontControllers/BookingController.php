<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use DB;

class BookingController extends Controller {

    public $locale;

    /**
     * Initializer.
     *
     * @return void
     */
    public function __construct(Request $request) {
        $this->locale = 'en';
        get_locale($request->segment(1));
        \App::setLocale($this->locale);
    }

    public function index(Request $request) {

        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            //return $cached;
        }
        $data = [
            'projects' => DB::table('tbl_projects')->where("status", "1")->where("project_status", "Yes")->orderBy('project_order', 'ASC')->get(),
            'meta_title' => '',
            'meta_keyword' => '',
            'meta_description' => '',
            'og_title' => '',
            'og_desc' => '',
            'og_pic' => '',
            'locale' => $this->locale,
        ];
        //check page
        set_cache_page($request->fullUrl(), view("pages.online-booking.index-{$this->locale}", $data)->render());
        return view("pages.online-booking.index-{$this->locale}", $data);
    }

    public function project(Request $request, $slug) {

        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            //return $cached;
        }

        $project = DB::table('tbl_projects')->where("status", "1")->where('slug', $slug)->where("project_status", "Yes")->orderBy('project_order', 'ASC')->first();
        if (empty($project)) {
            return redirect(route('booking.index'));
        }

        $unitTypes = get_unit_types_project($project->id);
        $amenity = get_amenity_project($project->id);
        $nearby = get_nearby_project($project->id);
        $images = get_images_project($project->id,5);
        
        $data = [
            'project' => $project,
            'unitTypes' => $unitTypes,
            'amenity' => $amenity,
            'nearby' => $nearby,
            'images' => $images,
            'map' => $this->area_map($project->slug),
            'meta_title' => '',
            'meta_keyword' => '',
            'meta_description' => '',
            'og_title' => '',
            'og_desc' => '',
            'og_pic' => '',
            'locale' => $this->locale,
        ];
        
        //check page
        set_cache_page($request->fullUrl(), view("pages.online-booking.project-{$this->locale}", $data)->render());
        return view("pages.online-booking.project-{$this->locale}", $data);
    }

    public function book(Request $request, $slug) {

        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            //return $cached;
        }

        $project = DB::table('tbl_projects')->where("status", "1")->where('slug', $slug)->where("project_status", "Yes")->orderBy('project_order', 'ASC')->first();
        if (empty($project)) {
            return redirect(route('booking.index'));
        }

        $unitTypes = get_unit_types_project($project->id);
        $amenity = get_amenity_project($project->id);
        $nearby = get_nearby_project($project->id);

        $data = [
            'project' => $project,
            'unitTypes' => $unitTypes,
            'amenity' => $amenity,
            'nearby' => $nearby,
            'meta_title' => '',
            'meta_keyword' => '',
            'meta_description' => '',
            'og_title' => '',
            'og_desc' => '',
            'og_pic' => '',
            'locale' => $this->locale,
        ];
        //check page
        set_cache_page($request->fullUrl(), view("pages.online-booking.book-{$this->locale}", $data)->render());
        return view("pages.online-booking.book-{$this->locale}", $data);
    }

    public function area_map($name) {
        $maps['al-furjan'] = '<div style="width: 100%"><iframe width="100%" height="150" src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;coord=25.028419,55.134223&amp;q=Al%20Furjan+(THOE%20Developments)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/create-google-map/">Embed Google Map</a></iframe></div>';
        $maps['riviera'] = '<div style="width: 100%"><iframe width="100%" height="150" src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;coord=25.1574719, 55.3019084&amp;q=THOE%20Riviera%20at%20Meydan+(THOE%20Developments)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/create-google-map/">Add map to website</a></iframe></div>';
        $maps['victoria'] = '<div style="width: 100%"><iframe width="100%" height="150" src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;coord=25.1574719,55.3019084&amp;q=THOE%20Victoria%20at%20Meydan%20District%207+(THOE%20Developments)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=A&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/create-google-map/">Google Maps iframe generator</a></iframe></div>';
        $maps['dubai-health-care-city'] = '<div style="width: 100%"><iframe width="100%" height="150" src="https://maps.google.com/maps?width=100%&amp;height=400&amp;hl=en&amp;q=Dubai%20Healthcare%20City+(THOE%20Farhad%20%26%20THOE%20Fawad)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/map-my-route/">Plot a route map</a></iframe></div>';
        $maps['palm-jumeirah'] = '<div style="width: 100%"><iframe width="100%" height="150" src="https://maps.google.com/maps?width=100%&amp;height=300&amp;hl=en&amp;q=Mina%20By%20THOE%20-%20Dubai+(Mina%20By%20THOE%20-%20Dubai)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/create-google-map/">Google Maps iframe generator</a></iframe></div>';
        $maps['jebel-ali'] = '<div style="width: 100%"><iframe width="100%" height="150" src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;q=Jebel%20Ali+(THOE%20Aura)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/map-my-route/">Create a route on google maps</a></iframe></div>';
        $maps['sport-city'] = '<div style="width: 100%"><iframe width="100%" height="150" src="https://maps.google.com/maps?width=100%&amp;height=150&amp;hl=en&amp;q=Dubai%20Sport%20City+(THOE%20Grand)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/map-my-route/">Map a route</a></iframe></div>';
        $maps['studio-city'] = '<div style="width: 100%"><iframe width="100%" height="150" src="https://maps.google.com/maps?width=100%&amp;height=150&amp;hl=en&amp;q=Dubai%20Studio%20City+(THOE%20Mirage%201)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/map-my-route/">Create a route on google maps</a></iframe></div>';
        return $maps[$name];
    }

    public function starting_price($name) {
        $maps['al-furjan'] = '667,000';
        $maps['riviera'] = '667,000';
        $maps['victoria'] = '667,000';
        $maps['dubai-health-care-city'] = '667,000';
        $maps['palm-jumeirah'] = '667,000';
        $maps['jebel-ali'] = '667,000';
        $maps['sport-city'] = '667,000';
        $maps['studio-city'] = '667,000';
        return $maps[$name];
    }

}
