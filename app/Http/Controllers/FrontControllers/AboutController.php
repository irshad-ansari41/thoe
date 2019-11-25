<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\About;
use App\Models\Timeline;
use App\Models\Executive;
use App\Models\Team;
use DB;
class AboutController extends Controller {

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

    public function about_thoe(Request $request) {

        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            return $cached;
        }
        $content = About::find(1);
        $data = [
            "AllRatings" => DB::table('tbl_ratings')->where('menu_id',5)->first(),
            'about' => $content,
            'years' => Timeline::select('year')->groupBy('year')->get()->toArray(),
            'timelines' => Timeline::where("status", "1")->get()->toArray(),
            'meta_title' => $content->meta_title,
            'meta_keyword' => $content->meta_keyword,
            'meta_description' => $content->meta_desc,
            'og_title' => $content->meta_title,
            'og_desc' => $content->meta_desc,
            'og_pic' => ($content->banner_image != "") ? url("/") . "/assets/images/about/" . $content->banner_image : '',
            'locale' => $this->locale,
        ];
        //check page
        set_cache_page($request->fullUrl(), view("pages.about.index-{$this->locale}", $data)->render());
        
        return view("pages.about.index-{$this->locale}", $data);
    }

    public function our_founder(Request $request) {

        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            return $cached;
        }
        $content = Content::find(29);
        $data = [
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
        set_cache_page($request->fullUrl(), view("pages.our-founder.index-{$this->locale}", $data)->render());
        return view("pages.our-founder.index-{$this->locale}", $data);
    }
    
    public function board_of_directors(Request $request){
        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            //return $cached;
        }
        
        $executive = Executive::find(1);
        $this->locale = get_locale($request->segment(1));
        $content = Content::find(32);
        
        $data = [
            "AllRatings" => DB::table('tbl_ratings')->where('menu_id',48)->first(),
            'content' => $content,
            'meta_title' => $content->meta_title,
            'meta_keyword' => $content->meta_keyword,
            'meta_description' => $content->meta_desc,
            'og_title' => $content->meta_title,
            'og_desc' => $content->meta_desc,
            'og_pic' => $content->image != "" ? url("/") . "/assets/images/banner/" . $content->image : '',
            'executive' => $executive,
            'teams' => Team::where("parent_id", "0")->where('description_'.$this->locale,'!=','')->where("status", "1")->orderBy('team_order', 'ASC')->get(),
            'locale' => $this->locale,
        ];
        //check page
        if(!empty($_GET['test'])){
           return view("pages.management.temp-index-{$this->locale}", $data);
        }
        set_cache_page($request->fullUrl(), view("pages.management.index-{$this->locale}", $data)->render());
        return view("pages.directors.index-{$this->locale}", $data);
        
    }
    //board_of_directors End
    
    public function management1(Request $request) {
        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            //return $cached;
        }

        $this->locale = get_locale($request->segment(1));
        $executive = Executive::find(1);
        
        $data = [
            "AllRatings" => DB::table('tbl_ratings')->where('menu_id',22)->first(),
            'executive' => $executive,
            'teams' => Team::where("parent_id", "0")->where('description_'.$this->locale,'!=','')->where("status", "1")->orderBy('team_order', 'ASC')->get(),
            'meta_title' => $executive->meta_title,
            'meta_keyword' => $executive->meta_keyword,
            'meta_description' => $executive->meta_desc,
            'og_title' => $executive->meta_title,
            'og_desc' => $executive->meta_desc,
            'og_pic' => $executive->image != "" ? url("/") . "/assets/images/banner/" . $executive->image : '',
            'locale' => $this->locale,
        ];
        //check page
        if(!empty($_GET['test'])){
           return view("pages.management.temp-index-{$this->locale}", $data);
        }
        set_cache_page($request->fullUrl(), view("pages.management.index-{$this->locale}", $data)->render());
        return view("pages.management.index-{$this->locale}", $data);
    }

    public function management(Request $request) {

        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            return $cached;
        }

        $this->locale = get_locale($request->segment(1));
        $result = Executive::find(1);

        $executive['banner_image'] = $result->banner_image;
        $executive['chairmen_image'] = $result->chairmen_image;
        $executive['ceo_image'] = $result->ceo_image;
        $executive['deputy_ceo_image'] = $result->deputy_ceo_image;

        $executive['banner_alt'] = $result->banner_alt;
        $executive['ceo_alt'] = $result->ceo_alt;
        $executive['deputy_ceo_alt'] = $result->deputy_ceo_alt;
        $executive['chairment_alt'] = $result->chairment_alt;


        if ($this->locale == 'en') {
            $executive['title_en'] = $result->title_en;
            $executive['description_en'] = $result->description_en;

            $executive['chairmen_name_en'] = $result->chairmen_name_en;
            $executive['chairmen_description_en'] = $result->chairmen_description_en;


            $executive['ceo_name_en'] = $result->ceo_name_en;
            $executive['ceo_description_en'] = $result->ceo_description_en;


            $executive['deputy_ceo_name_en'] = $result->deputy_ceo_name_en;
            $executive['deputy_ceo_description_en'] = $result->deputy_ceo_description_en;
        } else if ($this->locale == 'ar') {
            $executive['title_en'] = !empty($result->title_ar) ? $result->title_ar : $result->title_en;
            ;
            $executive['description_en'] = !empty($result->description_ar) ? $result->description_ar :
                    $result->description_en;

            $executive['chairmen_name_en'] = !empty($result->chairmen_name_ar) ? $result->chairmen_name_ar :
                    $result->chairmen_name_en;
            $executive['chairmen_description_en'] = !empty($result->chairmen_description_ar) ?
                    $result->chairmen_description_ar : $result->chairmen_description_en;

            $executive['ceo_name_en'] = !empty($result->ceo_name_ar) ? $result->ceo_name_ar : $result->ceo_name_en;
            $executive['ceo_description_en'] = !empty($result->ceo_description_ar) ? $result->ceo_description_ar :
                    $result->ceo_description_en;

            $executive['deputy_ceo_name_en'] = !empty($result->deputy_ceo_name_ar) ? $result->deputy_ceo_name_ar :
                    $result->deputy_ceo_name_en;
            $executive['deputy_ceo_description_en'] = !empty($result->deputy_ceo_description_ar) ?
                    $result->deputy_ceo_description_ar : $result->deputy_ceo_description_en;
        } 


        $executive['title_ar'] = $result->title_ar;


        //Get Team Data

        $results1 = Team::where("parent_id", "0")->where("status", "1")->orderBy('team_order', 'ASC')->get();
        $teams = [];
        if (!empty($results1)) {
            $k = 0;
            foreach ($results1 as $res) {
                $teams[$k]['id'] = $res->id;

                if ($this->locale == 'en') {
                    $teams[$k]['description'] = $res->description_en;
                    $teams[$k]['name'] = $res->name;
                    $teams[$k]['designation'] = $res->designation;
                } else if ($this->locale == 'ar') {
                    $teams[$k]['description'] = !empty($res->description_ar) ? $res->description_ar : $res->description_en;
                    $teams[$k]['name'] = !empty($res->name_ar) ? $res->name_ar : $res->name;
                    $teams[$k]['designation'] = !empty($res->designation_ar) ? $res->designation_ar : $res->designation;
                } 

                $teams[$k]['alt'] = $res->alt;
                $teams[$k]['image'] = $res->image;
                $teams[$k]['tag1'] = $res->tag1;
                $teams[$k]['tag2'] = $res->tag2;
                $teams[$k]['tag3'] = $res->tag3;
                $teams[$k]['tag4'] = $res->tag4;
                $teams[$k]['tag5'] = $res->tag5;
                $k++;
            }
        }
        $data = [
            'executive' => $executive,
            'teams' => $teams,
            'meta_title' => !empty($result->meta_title) ? $result->meta_title : '',
            'meta_keyword' => !empty($result->meta_keyword) ? $result->meta_keyword : '',
            'meta_description' => !empty($result->meta_desc) ? $result->meta_desc : '',
            'og_title' => !empty($result->meta_title) ? $result->meta_title : '',
            'og_desc' => !empty($result->meta_keyword) ? $result->meta_keyword : '',
            'og_pic' => !empty($result->banner_image)?url("/") . "/assets/images/executives/" . $result->banner_image:'',
            'locale' => $this->locale,
        ];
        //check page
        set_cache_page($request->fullUrl(), view("pages.management", $data)->render());

        return view('pages.management', $data);
    }

    public function ajax_get_team(Request $request) {

        $this->locale = get_locale($request->segment(1));
        $id = $request->team_id;
        $team_string = "";
        $team1 = Team::where('long_description_'.$this->locale,'!=','')->where("id", $id)->get()->first();
        $teams2 = Team::where("parent_id", $id)->where("status", "1")->orderBy('team_order', 'ASC')->get();
        $logo_url = url("/") . "/assets/images/thoe-logo.png";

        $teamname = '';
        $designation = '';
        $long_description_en = '';
        $team_short_description_en = '';
        if ($this->locale == 'en') {
            $teamname = $team1->name;
            $designation = $team1->designation;
            $long_description_en = $team1->long_description_en;
            $team_short_description_en = $team1->team_short_description_en;
        } else if ($this->locale == 'ar') {
            $teamname = $team1->name_ar;
            $designation = $team1->designation_ar;
            $long_description_en = $team1->long_description_ar;
            $team_short_description_en = $team1->team_short_description_ar;
        } else if ($this->locale == 'cn') {
            $teamname = $team1->name_cn;
            $designation = $team1->designation_cn;
            $long_description_en = $team1->long_description_cn;
            $team_short_description_en = $team1->team_short_description_cn;
        } else {
            $teamname = $team1->name;
            $designation = $team1->designation;
            $long_description_en = $team1->long_description_en;
            $team_short_description_en = $team1->team_short_description_en;
        }
        $ArPadding = $this->locale == 'ar'? 'padding-left: 20px;':'padding-right: 20px;';
        $team_string = '<div class="col s12 m12 l12 xl12">
                            <img src="' . $logo_url . '" class="responsive-img" style="width:100px !important; border:0;">
			</div>

			<div class="row" style="padding-top: 5rem;">
                            <div class="col s12 m12 l3 xl3">
                                <img src="' . url("/") . '/assets/images/team/' . $team1->image . '" class="responsive-img">
                            </div>
                            <div class="col s12 m12 l9 xl9">
                                <h5 class="m0" style="font-size: 25px;'.$ArPadding.'">' . $teamname . '</h5>
                            <p class="az-pcontent mt0" style="display: inline-block;">' . $designation . '</p>
                            <div class="divider az-header-divider mb0"></div>
                            <p class="az-pcontent left-align">' . $long_description_en . '</p>
                            </div>    
			</div>';


        if (count($teams2) > 0) {
            if ($this->locale == 'en') {
                $team_string .= '<div class="col s12 m12" style="margin: 15px 0px;border-top: 1px solid #d6d6d6;border-bottom: 1px solid #d6d6d6;padding: 10px;">
                                    <h5 class="m0" style="font-size: 17px;">' . $teamname . ' Team</h5>
                                    <p class="az-pcontent m0" style="">' . $team_short_description_en . '</p>
				</div>';
            } else if ($this->locale == 'ar') {
                $team_string .= '<div class="col s12 m12" style="margin: 15px 0px;border-top: 1px solid #d6d6d6;border-bottom: 1px solid #d6d6d6;padding: 10px;">
                                    <h5 class="m0" style="font-size: 17px;">فريق  ' . $teamname . '</h5>
                                    <p class="az-pcontent m0" style="">' . $team_short_description_en . '</p>
				</div>';
            } else if ($this->locale == 'cn') {
                $team_string .= '<div class="col s12 m12" style="margin: 15px 0px;border-top: 1px solid #d6d6d6;border-bottom: 1px solid #d6d6d6;padding: 10px;">
                                    <h5 class="m0" style="font-size: 17px;">' . $teamname . ' 球队</h5>
                                    <p class="az-pcontent m0" style="">' . $team_short_description_en . '</p>
				</div>';
            }


            foreach ($teams2 as $team2) {
                $teams3 = Team::where("parent_id", $team2->id)->where("status", "1")->orderBy('team_order', 'ASC')->get();

                $teamname = '';
                $designation = '';
                $description_en = '';
                if ($this->locale == 'en') {
                    $teamname = $team2->name;
                    $designation = $team2->designation;
                    $description_en = $team2->description_en;
                } else if ($this->locale == 'ar') {
                    $teamname = $team2->name_ar;
                    $designation = $team2->designation_ar;
                    $description_en = $team2->description_ar;
                } else if ($this->locale == 'cn') {
                    $teamname = $team2->name_cn;
                    $designation = $team2->designation_cn;
                    $description_en = $team2->description_cn;
                } else {
                    $teamname = $team2->name;
                    $designation = $team2->designation;
                    $description_en = $team2->description_en;
                }

                $team_string .= '<div class="row m0">
                <div class="col s12 m6 p0" style="margin: 1.3rem 0rem;">
                        <div class="col s12 team-tag p0">
                                <div class="col s12 m5">
                                        <img src="' . url("/") . '/assets/images/team/' . $team2->image . '" class="responsive-img">
                                </div>
                                <div class="col s12 m7">
                                        <div class="desig-person">
                                                <div class="person-name mt0" style="font-size: 17px;">' . $teamname . '</div>
                                                <div class="divider az-header-divider mb0"></div>
                                                <i style="font-size: 12px;">' . $designation . ' </i>
                                        </div>
                                        <p class="az-pcontent mt0 mb0" style="letter-spacing: initial;text-transform: capitalize;font-size: 13px;text-align: justify;">' . $description_en . '</p>
                                </div>
                        </div>
                </div>';

                if (count($teams3) > 0) {

                    if ($this->locale == 'en') {
                        $team_string .= '<div class="col s12 m6 p0" style="margin:1rem 0rem;">
                                            <div class="col s12 m12 p0" style="border-bottom: 1px solid #d6d6d6;margin-bottom: 3rem;">
                                                <h5 class="m0" style="font-size: 17px;">Team Members</h5>
                                            </div>

                                            <div class="col s12 team-tag p0" style="margin-bottom: 1rem;">';
                    } else if ($this->locale == 'ar') {
                        $team_string .= '<div class="col s12 m6 p0" style="margin:1rem 0rem;">
                                            <div class="col s12 m12 p0" style="border-bottom: 1px solid #d6d6d6;margin-bottom: 3rem;">
                                                <h5 class="m0" style="font-size: 17px;">أعضاء الفريق</h5>
                                            </div>

                                            <div class="col s12 team-tag p0" style="margin-bottom: 1rem;">';
                    } else if ($this->locale == 'cn') {
                        $team_string .= '<div class="col s12 m6 p0" style="margin:1rem 0rem;">
                                            <div class="col s12 m12 p0" style="border-bottom: 1px solid #d6d6d6;margin-bottom: 3rem;">
                                                <h5 class="m0" style="font-size: 17px;">团队成员</h5>
                                            </div>

                                            <div class="col s12 team-tag p0" style="margin-bottom: 1rem;">';
                    }


                    foreach ($teams3 as $team3) {

                        $teamname = '';
                        $designation = '';
                        if ($this->locale == 'en') {
                            $teamname = $team3->name;
                            $designation = $team3->designation;
                        } else if ($this->locale == 'ar') {
                            $teamname = $team3->name_ar;
                            $designation = $team3->designation_ar;
                        } else if ($this->locale == 'cn') {
                            $teamname = $team3->name_cn;
                            $designation = $team3->designation_cn;
                        } else {
                            $teamname = $team3->name;
                            $designation = $team3->designation;
                        }

                        $team_string .= '<div class="col s6 m4" style="min-height: 240px;text-align: center;">
                                        <img src="' . url("/") . '/assets/images/team/' . $team3->image . '" class="responsive-img" style="
                                        max-width: 150px;
                                        ">

                                        <div class="desig-person center-align">
                                        <div class="person-name m0" style="font-size: 10px;line-height: 15px;">' . $teamname . '</div>
                                        </div>
                                        <p style="margin-top: 0;text-align: center;"><i style="font-size: 12px;margin: 0;">' . $designation . ' </i></p>

                                        </div>';
                    }
                    $team_string .= '</div>
                    </div>';
                }


                $team_string .= '</div>';
            }
        }
        return $team_string;
    }
    
    public function construction_year(Request $request) {

        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            return $cached;
        }
        $data = [
            "AllRatings" => DB::table('tbl_ratings')->where('menu_id',52)->first(),
            'meta_title' => 'Construction Year | The Heart of Europe',
            'meta_keyword' => 'The Heart of Europe construction-year',
            'meta_description' => 'The Heart of Europe construction-year',
            'locale' => $this->locale,
        ];
        //check page
        set_cache_page($request->fullUrl(), view("pages.construction.construction-year-{$this->locale}", $data)->render());
        return view("pages.construction.construction-year-{$this->locale}", $data);
    }

}
