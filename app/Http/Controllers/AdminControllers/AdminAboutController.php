<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Content;
use App\Models\About;
use File;
use Hash;
use Lang;
use Mail;
use Redirect;
use Sentinel;
use URL;
use View;
use Validator;

class AdminAboutController extends Controller {


    public function index() {
        $contents = Content::All();
        return view('about', compact('contents'));
    }

    protected function validator_image(array $data) {
        return Validator::make($data, [
                    'image' => 'mimes:jpg,jpeg,gif,png|min:300|max:2048'
        ]);
    }

    public function create() {
        return view('admin.contents.create');
    }

    public function store(Request $request) {

        $validator = $this->validator_image($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                    $request, $validator
            );
        }

        $image = $request->file('image');

        if ($image) {
            $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = STORE_PATH.('/assets/images/banner');
            $image->move($destinationPath, $input['imagename']);
        } else {
            $input['imagename'] = '';
        }

        $content = new Content();
        $content->title_en = $request->title_en;
        $content->description_en = $request->description_en;
        $content->title_ar = $request->title_ar;
        $content->description_ar = $request->description_ar;
        $content->title_ch = $request->title_ch;
        $content->description_ch = $request->description_ch;
        $content->title_hn = $request->title_hn;
        $content->description_hn = $request->description_hn;
        $content->title_ur = $request->title_ur;
        $content->description_ur = $request->description_ur;
        $content->created = date("Y-m-d H:i:s");
        $content->image = $input['imagename'];
        $content->save();

        return redirect('admin/content/');
    }

    public function update(Request $request) {

        $validator = $this->validator_image($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                    $request, $validator
            );
        }

        $image = $request->file('image');
        if ($image) {
            $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = STORE_PATH.('/assets/images/banner');
            $image->move($destinationPath, $input['imagename']);
        } else {
            $input['imagename'] = '';
        }

        if ($input['imagename'] != "") {
            Content::where('id', $request->id)->update(array("title_en" => $request->title_en, "description_en" => $request->description_en, "title_ar" => $request->title_ar, "description_ar" => $request->description_ar, "title_ch" => $request->title_ch, "description_ch" => $request->description_ch, "image" => $input['imagename'], "title_hn" => $request->title_hn, "description_hn" => $request->description_hn, "title_ur" => $request->title_ur, "description_ur" => $request->description_ur));
        } else {
            Content::where('id', $request->id)->update(array("title_en" => $request->title_en, "description_en" => $request->description_en, "title_ar" => $request->title_ar, "description_ar" => $request->description_ar, "title_ch" => $request->title_ch, "description_ch" => $request->description_ch, "title_hn" => $request->title_hn, "description_hn" => $request->description_hn, "title_ur" => $request->title_ur, "description_ur" => $request->description_ur));
        }


        $request->session()->flash('alert-success', 'Content has been updated!');
        return redirect('admin/content/');
    }

    public function edit(Request $request, $id) {

        $contents = Content::find($id);
        $type = 'edit';
        return view('admin.contents.edit', compact('contents', 'type'));
    }

    public function delete(Request $request, $id) {


        $contents = Content::find($id);

        if ($contents->image != "") {
            $url = STORE_PATH . "/assets/images/banner/" . $contents->image;
            @unlink($url);
        }

        Content::destroy($id);
        $request->session()->flash('alert-success', 'Content has been deleted!');
        return redirect('admin/content/');
    }

    public function about_us() {
        $contents = About::find(1);
        $type = 'edit';
        return view('admin.contents.aboutus', compact('contents', 'type'));
    }

    public function update_about(Request $request) {

        $contents = About::find(1);

        $image = $request->file('banner_image');
        if ($image) {
            $bimage = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = STORE_PATH.('/assets/images/about');
            $image->move($destinationPath, $bimage);
            /* unlink old image */
            $url = STORE_PATH . "/assets/images/about/" . $contents->banner_image;
            @unlink($url);
        } else {
            $bimage = '';
        }

        $cimage = $request->file('chairmen_image');
        if ($cimage) {
            $c_image = time() . rand() . '.' . $cimage->getClientOriginalExtension();
            $destinationPath = STORE_PATH.('/assets/images/about');
            $cimage->move($destinationPath, $c_image);

            /* unlink old image */
            $url = STORE_PATH . "/assets/images/about/" . $contents->chairmen_image;
            @unlink($url);
        } else {
            $c_image = '';
        }

        $data = array();

        if ($bimage != "") {
            $data['banner_image'] = $bimage;
        }
        if ($c_image != "") {
            $data['chairmen_image'] = $c_image;
        }

        if ($request->title_en != "") {
            $data['title_en'] = $request->title_en;
        }
        if ($request->title_ar != "") {
            $data['title_ar'] = $request->title_ar;
        }
        if ($request->title_ch != "") {
            $data['title_ch'] = $request->title_ch;
        }
        if ($request->title_hn != "") {
            $data['title_hn'] = $request->title_hn;
        }
        if ($request->title_ur != "") {
            $data['title_ur'] = $request->title_ur;
        }

        if ($request->description_en != "") {
            $data['description_en'] = $request->description_en;
        }
        if ($request->description_ar != "") {
            $data['description_ar'] = $request->description_ar;
        }
        if ($request->description_ch != "") {
            $data['description_ch'] = $request->description_ch;
        }
        if ($request->description_hn != "") {
            $data['description_hn'] = $request->description_hn;
        }
        if ($request->description_ur != "") {
            $data['description_ur'] = $request->description_ur;
        }

        if ($request->chairment_description_en != "") {
            $data['chairment_description_en'] = $request->chairment_description_en;
        }
        if ($request->chairment_description_ar != "") {
            $data['chairment_description_ar'] = $request->chairment_description_ar;
        }
        if ($request->chairment_description_ch != "") {
            $data['chairment_description_ch'] = $request->chairment_description_ch;
        }
        if ($request->chairment_description_hn != "") {
            $data['chairment_description_hn'] = $request->chairment_description_hn;
        }
        if ($request->chairment_description_ur != "") {
            $data['chairment_description_ur'] = $request->chairment_description_ur;
        }

        if (!empty($data)) {
            About::where('id', 1)->update($data);
        }


        $request->session()->flash('alert-success', 'Content has been updated!');
        return redirect('admin/content/about');
    }

    

}
