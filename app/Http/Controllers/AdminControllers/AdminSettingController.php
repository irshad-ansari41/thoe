<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Menu;
use App\Models\Banner;
use App\Models\Press;
use App\Models\Project;
use App\Models\FeatureBanner;
use Validator;
use App\Models\Team;
use App\Models\Event;
use App\Models\VGallery_master;
use App\Models\Gallery_master;
use App\Models\Gellery_child;
use DB;

class AdminSettingController extends Controller {

    public function __construct() {

        $session_user_id = 1; //Sentinel::getUser()->id;

        $results_users = DB::selectOne(DB::raw("select users.*,tbl_module_access.* from users INNER JOIN tbl_module_access ON users.id=tbl_module_access.userid where users.id=" . $session_user_id));


        if ($results_users != NULL) {
            if ($results_users->general_settings == "0") {
                redirect()->to('/admin/permissionDenied')->send();
            }
        }
    }

    /* fetch website logo */

    public function index() {
        $setting = Setting::find(1);
        return view('admin.setting.index', compact('setting'));
    }

    /* header logo image validation */

    protected function logo_validator_image(array $data) {
        return Validator::make($data, [
                    'logo' => 'required|image|mimes:jpg,jpeg,gif,png|max:20'
        ]);
    }

    /* header logo image validation */

    protected function inner_logo_validator_image(array $data) {
        return Validator::make($data, [
                    'inner_logo' => 'required|image|mimes:jpg,jpeg,gif,png|max:20'
        ]);
    }

    /* footer logo image validation */

    protected function footer_logo_validator_image(array $data) {
        return Validator::make($data, [
                    'footer_logo' => 'required|image|mimes:jpg,jpeg,gif,png|max:20'
        ]);
    }

    /* update website logo */

    public function update_logo(Request $request) {




        $setting = Setting::find(1);

        $image = $request->file('logo');
        $image_ar = $request->file('logo_ar');
        $image_ch = $request->file('logo_ch');

        $inner_logo = $request->file('inner_logo');
        $inner_logo_ar = $request->file('inner_logo_ar');
        $inner_logo_ch = $request->file('inner_logo_ch');

        $footer_logo = $request->file('footer_logo');
        $footer_logo_ar = $request->file('footer_logo_ar');
        $footer_logo_ch = $request->file('footer_logo_ch');



        if ($image) {
            $limage = time() . rand() . '.' . $image->getClientOriginalExtension();
            $destinationPath = STORE_PATH . ('/assets/images/logo');
            if ($limage != "") {
                $url = STORE_PATH . "/assets/images/logo/" . $setting->logo;
                @unlink($url);
            }
            $image->move($destinationPath, $limage);
        } else {
            $limage = '';
        }

        if ($image_ar) {
            $limage_ar = time() . rand() . '.' . $image_ar->getClientOriginalExtension();
            $destinationPath = STORE_PATH . ('/assets/images/logo');
            if ($limage_ar != "") {
                $url = STORE_PATH . "/assets/images/logo/" . $setting->logo_ar;
                @unlink($url);
            }
            $image_ar->move($destinationPath, $limage_ar);
        } else {
            $limage_ar = '';
        }

        if ($image_ch) {
            $limage_ch = time() . rand() . '.' . $image_ch->getClientOriginalExtension();
            $destinationPath = STORE_PATH . ('/assets/images/logo');
            if ($limage_ch != "") {
                $url = STORE_PATH . "/assets/images/logo/" . $setting->logo_ch;
                @unlink($url);
            }
            $image_ch->move($destinationPath, $limage_ch);
        } else {
            $limage_ch = '';
        }

        if ($inner_logo) {
            $inimage = time() . rand() . '.' . $inner_logo->getClientOriginalExtension();
            $destinationPath = STORE_PATH . ('/assets/images/logo');
            if ($inimage != "") {
                $inurl = STORE_PATH . "/assets/images/logo/" . $setting->inner_logo;
                @unlink($inurl);
            }
            $inner_logo->move($destinationPath, $inimage);
        } else {
            $inimage = '';
        }

        if ($inner_logo_ar) {
            $inimage_ar = time() . rand() . '.' . $inner_logo_ar->getClientOriginalExtension();
            $destinationPath = STORE_PATH . ('/assets/images/logo');
            if ($inimage_ar != "") {
                $inurl = STORE_PATH . "/assets/images/logo/" . $setting->inner_logo_ar;
                @unlink($inurl);
            }
            $inner_logo_ar->move($destinationPath, $inimage_ar);
        } else {
            $inimage_ar = '';
        }

        if ($inner_logo_ch) {
            $inimage_ch = time() . rand() . '.' . $inner_logo_ch->getClientOriginalExtension();
            $destinationPath = STORE_PATH . ('/assets/images/logo');
            if ($inimage_ch != "") {
                $inurl = STORE_PATH . "/assets/images/logo/" . $setting->inner_logo_ch;
                @unlink($inurl);
            }
            $inner_logo_ch->move($destinationPath, $inimage_ch);
        } else {
            $inimage_ch = '';
        }

        if ($footer_logo) {
            $fimage = time() . rand() . '.' . $footer_logo->getClientOriginalExtension();
            $destinationPath = STORE_PATH . ('/assets/images/logo');
            if ($fimage != "") {
                $furl = STORE_PATH . "/assets/images/logo/" . $setting->footer_logo;
                @unlink($furl);
            }
            $footer_logo->move($destinationPath, $fimage);
        } else {
            $fimage = '';
        }

        if ($footer_logo_ar) {
            $fimage_ar = time() . rand() . '.' . $footer_logo_ar->getClientOriginalExtension();
            $destinationPath = STORE_PATH . ('/assets/images/logo');
            if ($fimage_ar != "") {
                $furl = STORE_PATH . "/assets/images/logo/" . $setting->footer_logo_ar;
                @unlink($furl);
            }
            $footer_logo_ar->move($destinationPath, $fimage_ar);
        } else {
            $fimage_ar = '';
        }

        if ($footer_logo_ch) {
            $fimage_ch = time() . rand() . '.' . $footer_logo_ch->getClientOriginalExtension();
            $destinationPath = STORE_PATH . ('/assets/images/logo');
            if ($fimage_ch != "") {
                $furl = STORE_PATH . "/assets/images/logo/" . $setting->footer_logo_ch;
                @unlink($furl);
            }
            $footer_logo_ch->move($destinationPath, $fimage_ch);
        } else {
            $fimage_ch = '';
        }


        $data = array();
        if ($limage) {
            $data['logo'] = $limage;
        }

        if ($limage_ar) {
            $data['logo_ar'] = $limage_ar;
        }


        if ($limage_ch) {
            $data['logo_ch'] = $limage_ch;
        }

        if ($inimage) {
            $data['inner_logo'] = $inimage;
        }
        if ($inimage_ar) {
            $data['inner_logo_ar'] = $inimage_ar;
        }
        if ($inimage_ch) {
            $data['inner_logo_ch'] = $inimage_ch;
        }

        if ($fimage) {
            $data['footer_logo'] = $fimage;
        }
        if ($fimage_ar) {
            $data['footer_logo_ar'] = $fimage_ar;
        }
        if ($fimage_ch) {
            $data['footer_logo_ch'] = $fimage_ch;
        }

        if ($request->banner_postion) {
            $data['banner_postion'] = $request->banner_postion;
        }

        if ($request->slider_style) {
            $data['slider_style'] = $request->slider_style;
        }

        if (!empty($data)) {
            Setting::where('id', 1)->update($data);
        }

        $request->session()->flash('alert-success', 'Setting has been updated!');

        return redirect('admin/setting/');
    }

    /* Header menu section */

    public function header_menu() {
        $menus = Menu::where("type", "1")->get();

        $records = array();
        if ($menus) {
            $i = 0;
            foreach ($menus as $menu) {
                $records[$i]['id'] = $menu->id;
                $records[$i]['title'] = $menu->title_en;
                $records[$i]['created'] = $menu->created;
                $records[$i]['status'] = $menu->status;
                $records[$i]['ordering'] = $menu->ordering;

                $parent = Menu::where("id", $menu->parent_id)->first();

                if ($parent) {
                    $records[$i]['parent'] = $parent->title_en;
                } else {
                    $records[$i]['parent'] = "";
                }

                $i++;
            }
        }

        return view('admin.setting.headers', compact('menus', 'records'));
    }

    public function footer_menu() {
        $menus = Menu::where("type", "2")->get();

        $records = array();

        if ($menus) {
            $i = 0;
            foreach ($menus as $menu) {
                $records[$i]['id'] = $menu->id;
                $records[$i]['title'] = $menu->title_en;
                $records[$i]['created'] = $menu->created;
                $records[$i]['status'] = $menu->status;

                $parent = Menu::where("id", $menu->parent_id)->first();

                if ($parent) {
                    $records[$i]['parent'] = $parent->title_en;
                } else {
                    $records[$i]['parent'] = "";
                }

                $i++;
            }
        }

        return view('admin.setting.footers', compact('menus', 'records'));
    }

    public function add_menu() {
        return view('admin.setting.create');
    }

    public function store_menu(Request $request) {
        $menu = new Menu();
        $menu->title_en = $request->title_en;
        $menu->title_ar = $request->title_ar;
        $menu->title_ch = $request->title_ch;
        $menu->type = $request->type;
        $menu->created = date("Y-m-d H:i:s");
        $menu->save();

        $request->session()->flash('alert-success', 'Menu has been created!');

        if ($request->type == "1") {
            return redirect('admin/setting/header_menu');
        } else {
            return redirect('admin/setting/footer_menu');
        }
    }

    public function edit_menu(Request $request, $id) {

        $menu = Menu::find($id);

        $parents = Menu::where("type", $menu->type)->where("parent_id", "0")->get();

        $type = 'edit';
        return view('admin.setting.edit', compact('menu', 'type', 'parents'));
    }

    public function update_menu(Request $request) {

        if ($request->is_parent != "") {
            Menu::where('id', $request->id)->update(array("title_en" => $request->title_en, "title_ar" => $request->title_ar, "title_ch" => $request->title_ch, "title_hn" => $request->title_hn, "title_ur" => $request->title_ur, "parent_id" => $request->is_parent));
        } else {
            Menu::where('id', $request->id)->update(array("title_en" => $request->title_en, "title_ar" => $request->title_ar, "title_ch" => $request->title_ch, "title_hn" => $request->title_hn, "title_ur" => $request->title_ur));
        }

        $request->session()->flash('alert-success', 'Menu has been updated!');

        $menu = Menu::where("id", $request->id)->first();

        if ($menu->type == "1") {
            return redirect('admin/setting/header_menu');
        } else {
            return redirect('admin/setting/footer_menu');
        }
    }

    public function delete_menu(Request $request, $id) {
        Menu::destroy($id);
        $request->session()->flash('alert-success', 'Menu has been deleted!');
        return redirect('admin/setting/header_menu');
    }

    public function status(Request $request, $id, $flag) {

        $menu = Menu::find($id);

        Menu::where('id', $id)->update(array("status" => $flag));
        $request->session()->flash('alert-success', 'Menu status has been updated!');

        if ($menu->type == "1") {
            return redirect('admin/setting/header_menu');
        } else {
            return redirect('admin/setting/footer_menu');
        }
    }

    /* Footer section */

    public function footer_setting() {
        $setting = Setting::find(1);
        return view('admin.setting.footerindex', compact('setting'));
    }

    public function update_setting(Request $request) {

        $data = array();

        if ($request->description_en) {
            $data['description_en'] = $request->description_en;
        }

        if ($request->description_ar) {
            $data['description_ar'] = $request->description_ar;
        }

        if ($request->description_ch) {
            $data['description_ch'] = $request->description_ch;
        }

        if ($request->description_hn) {
            $data['description_hn'] = $request->description_hn;
        }

        if ($request->description_ur) {
            $data['description_ur'] = $request->description_ur;
        }

        if ($request->contact_email) {
            $data['contact_email'] = $request->contact_email;
        }
        if ($request->linkedin_link) {
            $data['linkedin_link'] = $request->linkedin_link;
        }
        if ($request->facebook_link) {
            $data['facebook_link'] = $request->facebook_link;
        }
        if ($request->twitter_link) {
            $data['twitter_link'] = $request->twitter_link;
        }
        if ($request->instagram_link) {
            $data['instagram_link'] = $request->instagram_link;
        }
        if ($request->google_link) {
            $data['google_link'] = $request->google_link;
        }

        if (!empty($data)) {
            Setting::where('id', 1)->update($data);
        }

        $request->session()->flash('alert-success', 'Setting has been updated!');

        return redirect('admin/setting/footer');
    }

    /* Banner Slider */

    public function add_banner(Request $request, $id) {

        $videos = VGallery_master::All();

        if ($id != 0) {
            $bannerslider = Banner::find($id);
            $type = 'edit';
            return view('admin.setting.createbanner', compact('bannerslider', 'type', 'videos'));
        } else {
            $bannerslider = array();
            $type = 'add';
            return view('admin.setting.createbanner', compact('bannerslider', 'type', 'videos'));
        }
    }

    public function banner_slider(Request $request) {

        $query = DB::table('tbl_banner_slider');
        if (!empty($request->str)) {
            $query->where("banner_title_en", "like", "%{$request->str}%")->orWhere("banner_short_description_en", "like", "%{$request->str}%")->orWhere("banner_long_description_en", "like", "%{$request->str}%");
        }
        $bannersliders = $query->orderBy("status", "desc")->orderBy("id", "desc")->paginate(10);

        return view('admin.setting.bannersliders', ['bannersliders' => $bannersliders]);
    }

    public function store_banner(Request $request, $id) {


        if ($request->type == "add") {

            $image = $request->file('banner_image');
            $image_ar = $request->file('banner_image_ar');
            $image_ch = $request->file('banner_image_ch');
            $image_hn = $request->file('banner_image_hn');
            $image_ur = $request->file('banner_image_ur');

            $input['imagename'] = '';
            if ($image) {
                $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = STORE_PATH . '/assets/images/home_banners/';
                $image->move($destinationPath, $input['imagename']);
            }

            $input['imagename_ar'] = '';
            if ($image_ar) {
                $input['imagename_ar'] = time() . '.' . $image_ar->getClientOriginalExtension();
                $destinationPath = STORE_PATH . '/assets/images/home_banners/';
                $image_ar->move($destinationPath, $input['imagename_ar']);
            }

            $input['imagename_ch'] = '';
            if ($image_ch) {
                $input['imagename_ch'] = time() . '.' . $image_ch->getClientOriginalExtension();
                $destinationPath = STORE_PATH . '/assets/images/home_banners/';
                $image_ch->move($destinationPath, $input['imagename_ch']);
            }

            $input['imagename_hn'] = '';
            if ($image_hn) {
                $input['imagename_hn'] = time() . '.' . $image_hn->getClientOriginalExtension();
                $destinationPath = STORE_PATH . '/assets/images/home_banners/';
                $image_hn->move($destinationPath, $input['imagename_hn']);
            }

            $input['imagename_ur'] = '';
            if ($image_ur) {
                $input['imagename_ur'] = time() . '.' . $image_ur->getClientOriginalExtension();
                $destinationPath = STORE_PATH . '/assets/images/home_banners/';
                $image_ur->move($destinationPath, $input['imagename_ur']);
            }

            $banner = new Banner();
            $banner->alt = $request->alt;
            $banner->banner_title_en = $request->banner_title_en;
            $banner->banner_title_ar = $request->banner_title_ar;
            $banner->banner_title_ch = $request->banner_title_ch;
            $banner->banner_title_hn = $request->banner_title_hn;
            $banner->banner_title_ur = $request->banner_title_ur;

            $banner->explore_button_option = $request->explore_button_option;
            $banner->inquire_button_option = $request->inquire_button_option;

            $banner->explore_link = $request->explore_link;
            $banner->explore_link_ar = $request->explore_link_ar;
            $banner->explore_link_ch = $request->explore_link_ch;

            $banner->explore_button_color = $request->explore_button_color;
            $banner->explore_button_hover_color = $request->explore_button_hover_color;
            $banner->video_id = $request->video_id;

            $banner->banner_short_description_en = $request->banner_short_description_en;
            $banner->banner_short_description_ar = $request->banner_short_description_ar;
            $banner->banner_short_description_ch = $request->banner_short_description_ch;
            $banner->banner_short_description_hn = $request->banner_short_description_hn;
            $banner->banner_short_description_ur = $request->banner_short_description_ur;

            $banner->banner_long_description_en = $request->banner_long_description_en;
            $banner->banner_long_description_ar = $request->banner_long_description_ar;
            $banner->banner_long_description_ch = $request->banner_long_description_ch;
            $banner->banner_long_description_hn = $request->banner_long_description_hn;
            $banner->banner_long_description_ur = $request->banner_long_description_ur;

            $banner->created_on = date("Y-m-d H:i:s");

            if ($request->type1 == "1") {
                $banner->banner_image = $input['imagename'];
                $banner->banner_image_ar = $input['imagename_ar'];
                $banner->banner_image_ch = $input['imagename_ch'];
                $banner->banner_image_hn = $input['imagename_hn'];
                $banner->banner_image_ur = $input['imagename_ur'];
                $banner->type = "1";
            } else {
                $banner->banner_image = $request->youtubeurl;
                $banner->banner_image_ar = $request->youtubeurl;
                $banner->banner_image_ch = $request->youtubeurl;
                $banner->banner_image_hn = $request->youtubeurl;
                $banner->banner_image_ur = $request->youtubeurl;
                $banner->type = "2";
            }


            $banner->save();

            $request->session()->flash('alert-success', 'Banner Slider has been added!');
        }
        if ($request->type == "edit") {



            $image = $request->file('banner_image');
            $image_ar = $request->file('banner_image_ar');
            $image_ch = $request->file('banner_image_ch');
            $image_hn = $request->file('banner_image_hn');
            $image_ur = $request->file('banner_image_ur');

            $input['imagename'] = '';
            if ($image) {
                $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = STORE_PATH . '/assets/images/home_banners/';
                $image->move($destinationPath, $input['imagename']);
            }

            $input['imagename_ar'] = '';
            if ($image_ar) {
                $input['imagename_ar'] = time() . '.' . $image_ar->getClientOriginalExtension();
                $destinationPath = STORE_PATH . '/assets/images/home_banners/';
                $image_ar->move($destinationPath, $input['imagename_ar']);
            }

            $input['imagename_ch'] = '';
            if ($image_ch) {
                $input['imagename_ch'] = time() . '.' . $image_ch->getClientOriginalExtension();
                $destinationPath = STORE_PATH . '/assets/images/home_banners/';
                $image_ch->move($destinationPath, $input['imagename_ch']);
            }

            $input['imagename_hn'] = '';
            if ($image_hn) {
                $input['imagename_hn'] = time() . '.' . $image_hn->getClientOriginalExtension();
                $destinationPath = STORE_PATH . '/assets/images/home_banners/';
                $image_hn->move($destinationPath, $input['imagename_hn']);
            }

            $input['imagename_ur'] = '';
            if ($image_ur) {
                $input['imagename_ur'] = time() . '.' . $image_ur->getClientOriginalExtension();
                $destinationPath = STORE_PATH . '/assets/images/home_banners/';
                $image_ur->move($destinationPath, $input['imagename_ur']);
            }

            $data = array();

            if ($request->type1 == "1") {
                if ($input['imagename'] != "") {
                    $data['banner_image'] = $input['imagename'];
                }
                if ($input['imagename_ar'] != "") {
                    $data['banner_image_ar'] = $input['imagename_ar'];
                }
                if ($input['imagename_ch'] != "") {
                    $data['banner_image_ch'] = $input['imagename_ch'];
                }
                if ($input['imagename_hn'] != "") {
                    $data['banner_image_hn'] = $input['imagename_hn'];
                }
                if ($input['imagename_ur'] != "") {
                    $data['banner_image_ur'] = $input['imagename_ur'];
                }
                $data['type'] = "1";
            } else {
                $data['banner_image'] = $request->youtubeurl;
                $data['banner_image_ar'] = $request->youtubeurl;
                $data['banner_image_ch'] = $request->youtubeurl;
                $data['banner_image_hn'] = $request->youtubeurl;
                $data['banner_image_ur'] = $request->youtubeurl;
                $data['type'] = "2";
            }

            $data['alt'] = $request->alt;
            if ($request->banner_title_en) {
                $data['banner_title_en'] = $request->banner_title_en;
            }
            if ($request->banner_title_ar) {
                $data['banner_title_ar'] = $request->banner_title_ar;
            }
            if ($request->banner_title_ch) {
                $data['banner_title_ch'] = $request->banner_title_ch;
            }

            if ($request->banner_title_hn) {
                $data['banner_title_hn'] = $request->banner_title_hn;
            }

            $data['video_id'] = $request->video_id;
            if ($request->banner_title_ur) {
                $data['banner_title_ur'] = $request->banner_title_ur;
            }

            if ($request->explore_link) {
                $data['explore_link'] = $request->explore_link;
            }


            if ($request->explore_link_ar) {
                $data['explore_link_ar'] = $request->explore_link_ar;
            }

            if ($request->explore_link_ch) {
                $data['explore_link_ch'] = $request->explore_link_ch;
            }

            if ($request->explore_button_color) {
                $data['explore_button_color'] = $request->explore_button_color;
            }

            if ($request->explore_button_hover_color) {
                $data['explore_button_hover_color'] = $request->explore_button_hover_color;
            }

            $data['explore_button_option'] = $request->explore_button_option;
            $data['inquire_button_option'] = $request->inquire_button_option;

            // if($request->banner_short_description_en){
            $data['banner_short_description_en'] = $request->banner_short_description_en;
            //}
            if ($request->banner_short_description_ar) {
                $data['banner_short_description_ar'] = $request->banner_short_description_ar;
            }
            if ($request->banner_short_description_ch) {
                $data['banner_short_description_ch'] = $request->banner_short_description_ch;
            }
            if ($request->banner_short_description_hn) {
                $data['banner_short_description_hn'] = $request->banner_short_description_hn;
            }
            if ($request->banner_short_description_ur) {
                $data['banner_short_description_ur'] = $request->banner_short_description_ur;
            }

            // if($request->banner_long_description_en){
            $data['banner_long_description_en'] = $request->banner_long_description_en;
            // }
            if ($request->banner_long_description_ar) {
                $data['banner_long_description_ar'] = $request->banner_long_description_ar;
            }
            //if ($request->banner_long_description_ch) {
            $data['banner_long_description_ch'] = $request->banner_long_description_ch;
            //}
            if ($request->banner_long_description_hn) {
                $data['banner_long_description_hn'] = $request->banner_long_description_hn;
            }
            if ($request->banner_long_description_ur) {
                $data['banner_long_description_ur'] = $request->banner_long_description_ur;
            }

            if (!empty($data)) {
                Banner::where('id', $request->id)->update($data);
            }

            $request->session()->flash('alert-success', 'Banner has been updated!');
        }

        return redirect('admin/setting/banner_slider');
    }

    public function delete_banner(Request $request, $id) {

        $banner = Banner::find($id);

        if ($banner->banner_image != "") {
            $url = STORE_PATH . "/assets/images/home_banners/" . $banner->banner_image;
            @unlink($url);
        }

        Banner::destroy($id);
        $request->session()->flash('alert-success', 'Banner has been deleted!');
        return redirect('admin/setting/banner_slider');
    }

    public function bannerstatus(Request $request, $id, $flag) {

        $banner = Banner::find($id);

        Banner::where('id', $id)->update(array("status" => $flag));
        $request->session()->flash('alert-success', 'Banner status has been updated!');

        return redirect('admin/setting/banner_slider');
    }

    /* Feature Slider */

    public function feature_slider() {

        $bannersliders = FeatureBanner::orderBy("id", "desc")->get();

        return view('admin.setting.featurebannersliders', compact('bannersliders'));
    }

    public function add_feature(Request $request, $id) {

        if ($id != 0) {
            $bannerslider = FeatureBanner::find($id);
            $type = 'edit';
            return view('admin.setting.createfeaturebanner', compact('bannerslider', 'type'));
        } else {
            $bannerslider = array();
            $type = 'add';
            return view('admin.setting.createfeaturebanner', compact('bannerslider', 'type'));
        }
    }

    public function store_feature(Request $request, $id) {

        if ($request->type == "add") {
            $image = $request->file('banner_image');

            $input['imagename'] = '';
            if ($image) {
                $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = STORE_PATH . '/assets/images/home_banners/';
                $image->move($destinationPath, $input['imagename']);
            }

            $banner = new FeatureBanner();
            $banner->alt = $request->alt;
            $banner->banner_title_en = $request->banner_title_en;
            $banner->banner_title_ar = $request->banner_title_ar;
            $banner->banner_title_ch = $request->banner_title_ch;
            $banner->banner_title_hn = $request->banner_title_hn;
            $banner->banner_title_ur = $request->banner_title_ur;

            $banner->explore_link = $request->explore_link;
            $banner->video_id = $request->video_id;

            $banner->banner_short_description_en = $request->banner_short_description_en;
            $banner->banner_short_description_ar = $request->banner_short_description_ar;
            $banner->banner_short_description_ch = $request->banner_short_description_ch;
            $banner->banner_short_description_hn = $request->banner_short_description_hn;
            $banner->banner_short_description_ur = $request->banner_short_description_ur;

            $banner->banner_long_description_en = $request->banner_long_description_en;
            $banner->banner_long_description_ar = $request->banner_long_description_ar;
            $banner->banner_long_description_ch = $request->banner_long_description_ch;
            $banner->banner_long_description_hn = $request->banner_long_description_hn;
            $banner->banner_long_description_ur = $request->banner_long_description_ur;

            $banner->created_on = date("Y-m-d H:i:s");
            $banner->banner_starting_at = $request->banner_starting_at;
            $banner->banner_image = $input['imagename'];


            $banner->save();

            $request->session()->flash('alert-success', 'Banner Slider has been added!');
        }
        if ($request->type == "edit") {


            $image = $request->file('banner_image');
            $input['imagename'] = '';
            if ($image) {
                $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = STORE_PATH . '/assets/images/home_banners/';
                $image->move($destinationPath, $input['imagename']);
            }


            $data = array();
            if ($input['imagename'] != "") {
                $data['banner_image'] = $input['imagename'];
            }

            $data['alt'] = $request->alt;
            if ($request->banner_title_en) {
                $data['banner_title_en'] = $request->banner_title_en;
            }
            if ($request->banner_title_ar) {
                $data['banner_title_ar'] = $request->banner_title_ar;
            }
            if ($request->banner_title_ch) {
                $data['banner_title_ch'] = $request->banner_title_ch;
            }

            if ($request->banner_title_hn) {
                $data['banner_title_hn'] = $request->banner_title_hn;
            }

            if ($request->banner_title_ur) {
                $data['banner_title_ur'] = $request->banner_title_ur;
            }

            if ($request->explore_link) {
                $data['explore_link'] = $request->explore_link;
            }

            if ($request->banner_starting_at) {
                $data['banner_starting_at'] = $request->banner_starting_at;
            }

            // if($request->banner_short_description_en){
            $data['banner_short_description_en'] = $request->banner_short_description_en;
            //}
            if ($request->banner_short_description_ar) {
                $data['banner_short_description_ar'] = $request->banner_short_description_ar;
            }
            if ($request->banner_short_description_ch) {
                $data['banner_short_description_ch'] = $request->banner_short_description_ch;
            }
            if ($request->banner_short_description_hn) {
                $data['banner_short_description_hn'] = $request->banner_short_description_hn;
            }
            if ($request->banner_short_description_ur) {
                $data['banner_short_description_ur'] = $request->banner_short_description_ur;
            }

            // if($request->banner_long_description_en){
            $data['banner_long_description_en'] = $request->banner_long_description_en;
            // }
            if ($request->banner_long_description_ar) {
                $data['banner_long_description_ar'] = $request->banner_long_description_ar;
            }
            if ($request->banner_long_description_ch) {
                $data['banner_long_description_ch'] = $request->banner_long_description_ch;
            }
            if ($request->banner_long_description_hn) {
                $data['banner_long_description_hn'] = $request->banner_long_description_hn;
            }
            if ($request->banner_long_description_ur) {
                $data['banner_long_description_ur'] = $request->banner_long_description_ur;
            }

            if (!empty($data)) {
                FeatureBanner::where('id', $request->id)->update($data);
            }

            $request->session()->flash('alert-success', 'Feature Banner has been updated!');
        }

        return redirect('admin/setting/feature_slider');
    }

    public function delete_feature(Request $request, $id) {

        $banner = FeatureBanner::find($id);

        if ($banner->banner_image != "") {
            $url = STORE_PATH . '/assets/images/home_banners/' . $banner->banner_image;
            @unlink($url);
        }

        FeatureBanner::destroy($id);
        $request->session()->flash('alert-success', 'Feature Banner has been deleted!');
        return redirect('admin/setting/feature_slider');
    }

    public function featurestatus(Request $request, $id, $flag) {

        $banner = FeatureBanner::find($id);

        FeatureBanner::where('id', $id)->update(array("status" => $flag));
        $request->session()->flash('alert-success', 'Feature Banner status has been updated!');

        return redirect('admin/setting/banner_slider');
    }

    /* Header menu ordering */

    public function getOrdering() {
        $menus = get_menu('en', 1);
        $type = '1';
        return view('admin.setting.ordering', compact('menus', 'type'));
    }

    public function update_ordering(Request $request) {

        $orders = $request->orders;


        foreach ($orders as $key => $val) {
            Menu::where('id', $key)->update(array("ordering" => $val));
        }

        $request->session()->flash('alert-success', 'Menu order has been updated');

        return redirect('admin/setting/ordering');
    }

    /* Video ordering */

    public function getvideoordering() {

        $gallery_res = array();
        $years = VGallery_master::groupBy("year")->get();
        $lastyear = VGallery_master::groupBy("year")->orderBy("year", "desc")->first();
        $lastyear = $lastyear->year;


        $temp_years1 = array();
        $temp_years2 = array();
        $temp_years3 = array();

        if (!empty($years)) {
            $i = 0;
            $l = 0;
            $u = 0;
            $k = 0;

            foreach ($years as $year) {
                $temps = VGallery_master::where("year", $year->year)->where("status", "1")->get();

                if (!empty($temps)) {
                    foreach ($temps as $temp) {
                        $text = '';
                        if ($temp->gallery_type == "1") {
                            $text = 'corporate';
                            $gallery_res[$text][$i]['id'] = $temp->id;
                            $gallery_res[$text][$i]['title'] = $temp->gallery_title;
                            $gallery_res[$text][$i]['gallery_long_title'] = $temp->gallery_long_title;
                            $gallery_res[$text][$i]['short_description'] = $temp->short_description;
                            $gallery_res[$text][$i]['holder_image'] = $temp->holder_image;
                            $gallery_res[$text][$i]['year'] = $temp->year;
                            $gallery_res[$text][$i]['gallery_type'] = $temp->gallery_type;
                            $temp_years1[] = $year->year;
                            $img = explode("=", $temp->image);
                            $gallery_res[$text][$i]['timage'] = $img[1];
                            $gallery_res[$text][$i]['video'] = "https://www.youtube.com/embed/" . $img[1];
                            $gallery_res[$text][$i]['ordering'] = $temp->ordering;
                            $i++;
                        } else if ($temp->gallery_type == "2") {
                            $text = 'commercial';
                            $gallery_res[$text][$l]['id'] = $temp->id;
                            $gallery_res[$text][$l]['title'] = $temp->gallery_title;
                            $gallery_res[$text][$l]['gallery_long_title'] = $temp->gallery_long_title;
                            $gallery_res[$text][$l]['short_description'] = $temp->short_description;
                            $gallery_res[$text][$l]['holder_image'] = $temp->holder_image;
                            $gallery_res[$text][$l]['year'] = $temp->year;
                            $temp_years2[] = $year->year;
                            $gallery_res[$text][$l]['gallery_type'] = $temp->gallery_type;
                            $img = explode("=", $temp->image);
                            $gallery_res[$text][$l]['timage'] = $img[1];
                            $gallery_res[$text][$l]['video'] = "https://www.youtube.com/embed/" . $img[1];
                            $gallery_res[$text][$l]['ordering'] = $temp->ordering;

                            $l++;
                        } else if ($temp->gallery_type == "3") {
                            $text = 'events';
                            $gallery_res[$text][$u]['id'] = $temp->id;
                            $gallery_res[$text][$u]['title'] = $temp->gallery_title;
                            $gallery_res[$text][$u]['gallery_long_title'] = $temp->gallery_long_title;
                            $gallery_res[$text][$u]['short_description'] = $temp->short_description;
                            $gallery_res[$text][$u]['holder_image'] = $temp->holder_image;
                            $gallery_res[$text][$u]['year'] = $temp->year;
                            $temp_years3[] = $year->year;
                            $gallery_res[$text][$u]['gallery_type'] = $temp->gallery_type;
                            $img = explode("=", $temp->image);
                            $gallery_res[$text][$u]['timage'] = $img[1];
                            $gallery_res[$text][$u]['video'] = "https://www.youtube.com/embed/" . $img[1];
                            $gallery_res[$text][$u]['ordering'] = $temp->ordering;

                            $u++;
                        }
                    }
                    $k++;
                }
            }
        }

        $temp_years1 = array_unique($temp_years1);
        $temp_years2 = array_unique($temp_years2);
        $temp_years3 = array_unique($temp_years3);


        return view('admin.setting.videogalleryordering', compact('gallery_res', 'years', 'temp_years1', 'temp_years2', 'temp_years3', 'lastyear'));
    }

    public function update_video_ordering(Request $request) {

        $orders = $request->orders;

        foreach ($orders as $key => $val) {
            if ($val != '') {
                VGallery_master::where('id', $key)->update(array("ordering" => $val));
            }
        }

        $request->session()->flash('alert-success', 'Video Gallery order has been updated');

        return redirect('admin/setting/videoordering');
    }

    public function getimagealbumordering() {
        $gallery_res = array();
        $years = Gallery_master::groupBy("year")->get();

        $temp_years1 = array();
        $temp_years2 = array();
        $temp_years3 = array();

        $lastyear = Gallery_master::where("status", "1")->groupBy("year")->orderBy("year", "desc")->first();
        $lastyear = $lastyear->year;

        if (!empty($years)) {
            $i = 0;
            $l = 0;
            $u = 0;
            foreach ($years as $year) {

                $temps = Gallery_master::where("status", "1")->where("year", $year->year)->orderBy("ordering", "asc")->get();

                if (!empty($temps)) {
                    $image = array();

                    foreach ($temps as $temp) {
                        $check = Gellery_child::where("gallery_id", $temp->id)->orderBy("id", "asc")->get();

                        if ($check->count() != 0) {

                            $text = '';
                            $image = Gellery_child::where("gallery_id", $temp->id)->orderBy("id", "asc")->get();
                            if ($temp->gallery_type == "1") {
                                $text = 'corporate';
                                $gallery_res[$text][$i]['id'] = $temp->id;
                                $gallery_res[$text][$i]['title'] = $temp->gallery_title;
                                $gallery_res[$text][$i]['gallery_long_title'] = $temp->gallery_long_title;
                                $gallery_res[$text][$i]['short_description'] = $temp->short_description;
                                $gallery_res[$text][$i]['path'] = $temp->path;
                                $gallery_res[$text][$i]['holder_image'] = $temp->holder_image;
                                $gallery_res[$text][$i]['year'] = $temp->year;
                                $gallery_res[$text][$i]['created'] = $temp->created;
                                $gallery_res[$text][$i]['gallery_type'] = $temp->gallery_type;
                                $gallery_res[$text][$i]['ordering'] = $temp->ordering;
                                $gallery_res[$text][$i]['gallery_date'] = $temp->gallery_date;
                                $temp_years1[] = $year->year;

                                if (!empty($image)) {
                                    foreach ($image as $img) {
                                        $gallery_res[$text][$i]['photo'][] = $img->image;
                                    }
                                }
                                $i++;
                            } else if ($temp->gallery_type == "2") {
                                $text = 'identity';
                                $gallery_res[$text][$l]['id'] = $temp->id;
                                $gallery_res[$text][$l]['title'] = $temp->gallery_title;
                                $gallery_res[$text][$l]['gallery_long_title'] = $temp->gallery_long_title;
                                $gallery_res[$text][$l]['short_description'] = $temp->short_description;
                                $gallery_res[$text][$l]['path'] = $temp->path;
                                $gallery_res[$text][$l]['holder_image'] = $temp->holder_image;
                                $gallery_res[$text][$i]['created'] = $temp->created;
                                $gallery_res[$text][$l]['year'] = $temp->year;
                                $gallery_res[$text][$l]['gallery_type'] = $temp->gallery_type;
                                $gallery_res[$text][$l]['ordering'] = $temp->ordering;
                                $gallery_res[$text][$i]['gallery_date'] = $temp->gallery_date;
                                $temp_years2[] = $year->year;
                                if (!empty($image)) {
                                    foreach ($image as $img) {
                                        $gallery_res[$text][$l]['photo'][] = $img->image;
                                    }
                                }
                                $l++;
                            } else if ($temp->gallery_type == "3") {
                                $text = 'events';
                                $gallery_res[$text][$u]['id'] = $temp->id;
                                $gallery_res[$text][$u]['title'] = $temp->gallery_title;
                                $gallery_res[$text][$u]['gallery_long_title'] = $temp->gallery_long_title;
                                $gallery_res[$text][$u]['short_description'] = $temp->short_description;
                                $gallery_res[$text][$u]['path'] = $temp->path;
                                $gallery_res[$text][$u]['holder_image'] = $temp->holder_image;
                                $gallery_res[$text][$i]['created'] = $temp->created;
                                $gallery_res[$text][$u]['year'] = $temp->year;
                                $gallery_res[$text][$u]['gallery_type'] = $temp->gallery_type;
                                $gallery_res[$text][$u]['ordering'] = $temp->ordering;
                                $gallery_res[$text][$i]['gallery_date'] = $temp->gallery_date;
                                $temp_years3[] = $year->year;
                                if (!empty($image)) {
                                    foreach ($image as $img) {
                                        $gallery_res[$text][$u]['photo'][] = $img->image;
                                    }
                                }
                                $u++;
                            }
                        }
                    }
                }
            }
        }
        $temp_years1 = array_unique($temp_years1);
        $temp_years2 = array_unique($temp_years2);
        $temp_years3 = array_unique($temp_years3);


        return view('admin.setting.imagegalleryordering', compact('gallery_res', 'years', 'temp_years1', 'temp_years2', 'temp_years3', 'lastyear'));
    }

    public function update_image_album_ordering(Request $request) {

        $orders = $request->orders;

        foreach ($orders as $key => $val) {
            if ($val != '') {
                Gallery_master::where('id', $key)->update(array("ordering" => $val + 1));
            }
        }

        $request->session()->flash('alert-success', 'Image album Gallery order has been updated');

        return redirect('admin/setting/imagealbumordering');
    }

    public function getimagethumordering() {
        $gallery_res = array();
        $years = Gallery_master::groupBy("year")->get();

        $temp_years1 = array();
        $temp_years2 = array();
        $temp_years3 = array();

        $lastyear = Gallery_master::where("status", "1")->groupBy("year")->orderBy("year", "desc")->first();
        $lastyear = $lastyear->year;

        if (!empty($years)) {
            $i = 0;
            $l = 0;
            $u = 0;
            foreach ($years as $year) {

                $temps = Gallery_master::where("status", "1")->where("year", $year->year)->get();

                if (!empty($temps)) {
                    $image = array();

                    foreach ($temps as $temp) {
                        $check = Gellery_child::where("gallery_id", $temp->id)->orderBy("id", "asc")->get();

                        if ($check->count() != 0) {

                            $text = '';
                            $image = Gellery_child::where("gallery_id", $temp->id)->get();
                            if ($temp->gallery_type == "1") {
                                $text = 'corporate';
                                $gallery_res[$text][$i]['id'] = $temp->id;
                                $gallery_res[$text][$i]['title'] = $temp->gallery_title;
                                $gallery_res[$text][$i]['gallery_long_title'] = $temp->gallery_long_title;
                                $gallery_res[$text][$i]['short_description'] = $temp->short_description;
                                $gallery_res[$text][$i]['path'] = $temp->path;
                                $gallery_res[$text][$i]['holder_image'] = $temp->holder_image;
                                $gallery_res[$text][$i]['created'] = $temp->created;
                                $gallery_res[$text][$i]['year'] = $temp->year;
                                $gallery_res[$text][$i]['gallery_type'] = $temp->gallery_type;
                                $temp_years1[] = $year->year;

                                if (!empty($image)) {
                                    $k = 0;
                                    foreach ($image as $img) {
                                        $gallery_res[$text][$i]['photo'][$k]['image'] = $img->image;
                                        $gallery_res[$text][$i]['photo'][$k]['ordering'] = $img->ordering;
                                        $gallery_res[$text][$i]['photo'][$k]['photoid'] = $img->id;
                                        $k++;
                                    }
                                }
                                $i++;
                            } else if ($temp->gallery_type == "2") {
                                $text = 'identity';
                                $gallery_res[$text][$l]['id'] = $temp->id;
                                $gallery_res[$text][$l]['title'] = $temp->gallery_title;
                                $gallery_res[$text][$l]['gallery_long_title'] = $temp->gallery_long_title;
                                $gallery_res[$text][$l]['short_description'] = $temp->short_description;
                                $gallery_res[$text][$l]['path'] = $temp->path;
                                $gallery_res[$text][$l]['holder_image'] = $temp->holder_image;
                                $gallery_res[$text][$i]['created'] = $temp->created;
                                $gallery_res[$text][$l]['year'] = $temp->year;
                                $gallery_res[$text][$l]['gallery_type'] = $temp->gallery_type;
                                $temp_years2[] = $year->year;
                                if (!empty($image)) {
                                    $k2 = 0;
                                    foreach ($image as $img) {
                                        $gallery_res[$text][$l]['photo'][$k2]['image'] = $img->image;
                                        $gallery_res[$text][$l]['photo'][$k2]['ordering'] = $img->ordering;
                                        $gallery_res[$text][$l]['photo'][$k2]['photoid'] = $img->id;
                                        $k2++;
                                    }
                                }
                                $l++;
                            } else if ($temp->gallery_type == "3") {
                                $text = 'events';
                                $gallery_res[$text][$u]['id'] = $temp->id;
                                $gallery_res[$text][$u]['title'] = $temp->gallery_title;
                                $gallery_res[$text][$u]['gallery_long_title'] = $temp->gallery_long_title;
                                $gallery_res[$text][$u]['short_description'] = $temp->short_description;
                                $gallery_res[$text][$u]['path'] = $temp->path;
                                $gallery_res[$text][$u]['holder_image'] = $temp->holder_image;
                                $gallery_res[$text][$i]['created'] = $temp->created;
                                $gallery_res[$text][$u]['year'] = $temp->year;
                                $gallery_res[$text][$u]['gallery_type'] = $temp->gallery_type;
                                $temp_years3[] = $year->year;
                                if (!empty($image)) {
                                    $k3 = 0;
                                    foreach ($image as $img) {
                                        $gallery_res[$text][$u]['photo'][$k3]['image'] = $img->image;
                                        $gallery_res[$text][$u]['photo'][$k3]['ordering'] = $img->ordering;
                                        $gallery_res[$text][$u]['photo'][$k3]['photoid'] = $img->id;
                                        $k3++;
                                    }
                                }
                                $u++;
                            }
                        }
                    }
                }
            }
        }

        $temp_years1 = array_unique($temp_years1);
        $temp_years2 = array_unique($temp_years2);
        $temp_years3 = array_unique($temp_years3);


        return view('admin.setting.imagethumordering', compact('gallery_res', 'years', 'temp_years1', 'temp_years2', 'temp_years3', 'lastyear'));
    }

    public function update_image_thumb_ordering(Request $request) {

        $orders = $request->orders;

        foreach ($orders as $key => $val) {
            if ($val != '') {
                Gellery_child::where('id', $key)->update(array("ordering" => $val));
            }
        }

        $request->session()->flash('alert-success', 'Image album Gallery order has been updated');
        return redirect('admin/setting/imagethumbordering');
    }

    public function getOrderingf() {
        $type = '2';
        $menus = get_menu('en', 2);
        return view('admin.setting.ordering', compact('menus', 'type'));
    }

    public function update_orderingf(Request $request) {

        $orders = $request->orders;


        foreach ($orders as $key => $val) {
            Menu::where('id', $key)->update(array("ordering" => $val));
        }

        $request->session()->flash('alert-success', 'Menu order has been updated');

        return redirect('admin/setting/fordering');
    }

    /* Project Ordering */

    public function getProjectOrdering() {
        $project = Project::orderBy('project_order', 'ASC')->get();
        return view('admin.setting.projectordering', compact('project'));
    }

    public function update_project_ordering(Request $request) {

        $orders = $request->orders;
        foreach ($orders as $key => $val) {
            project::where('id', $key)->update(array("project_order" => $val));
        }
        $request->session()->flash('alert-success', 'Project order has been updated');
        return redirect('admin/setting/projectordering');
    }

    /* Banner Ordering */

    public function getBannerOrdering() {
        //$banners = Banner::orderBy('banner_order', 'ASC')->get();
        $banners = Banner::orderBy('created_on', 'DESC')->where('status', '1')->get();
        return view('admin.setting.bannerodering', compact('banners'));
    }

    public function update_banner_ordering(Request $request) {

        $orders = $request->orders;
        foreach ($orders as $key => $val) {
            Banner::where('id', $key)->update(array("banner_order" => $val + 1));
        }
        $request->session()->flash('alert-success', 'Banner order has been updated');
        return redirect('admin/setting/bannerodering');
    }

    /* Team Ordering */

    public function getTeamOrdering() {
        $teams = Team::orderBy('team_order', 'ASC')->get();
        return view('admin.setting.teamrordering', compact('teams'));
    }

    public function update_team_ordering(Request $request) {

        $orders = $request->orders;
        foreach ($orders as $key => $val) {
            Team::where('id', $key)->update(array("team_order" => $val));
        }
        $request->session()->flash('alert-success', 'Team order has been updated');
        return redirect('admin/setting/teamrordering');
    }

    public function getEventOrdering() {
        $date_start = date('Y-m-d', strtotime('-60 days'));
        $date_end = date('Y-m-d');

        $results = Event::where('event_date', '>=', $date_start)->where('event_date', '<=', $date_end)->orWhere('event_date', '>', $date_end)->orderBy('event_date', 'DESC')->get();

        return view('admin.setting.eventordering', compact('results'));
    }

    public function updateEventOrdering(Request $request) {
        $orders = $request->orders;
        foreach ($orders as $key => $val) {
            Event::where('id', $key)->update(array("event_order" => $val + 1));
        }
        $request->session()->flash('alert-success', 'Event order has been updated');
        return redirect('admin/setting/eventordering');
    }

    public function getPressOrdering() {

        //$results = Press::All();
        $results = Press::orderBy('press_order', 'ASC')->get();

        return view('admin.setting.pressordering', compact('results'));
    }

    public function updatePressOrdering(Request $request) {
        $orders = $request->orders;
        foreach ($orders as $key => $val) {
            Press::where('id', $key)->update(array("press_order" => $val + 1));
        }
        $request->session()->flash('alert-success', 'Press release order has been updated');
        return redirect('admin/setting/pressordering');
    }

}
