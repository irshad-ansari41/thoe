<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use View;
use Mail;
use Response;
use DB;
use App\Models\Contact;

class ContactController extends Controller {

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

        //if chached then return
        $cached = get_cache_page($request->fullUrl());
        if (!empty($cached)) {
            return $cached;
        }

        $content = Content::find(17);

        $data = [
            'content' => $content,
            'contact' => Contact::first()->toArray(),
            'setting' => (array) DB::table('tbl_setting')->first(),
            'meta_title' => $content->meta_title,
            'meta_keyword' => $content->meta_keyword,
            'meta_description' => $content->meta_desc,
            'og_title' => $content->meta_title,
            'og_desc' => $content->meta_desc,
            'og_pic' => ($content->image != "") ? url("/") . "/assets/images/banner/" . $content->image : '',
            'locale' => $this->locale,
        ];
        //check page
        set_cache_page($request->fullUrl(), View("pages.contact.index-{$this->locale}", $data)->render());

        return View("pages.contact.index-{$this->locale}", $data);
    }

    public function send_contact(Request $request) {
        $en_msg = "Thank you for reaching out. We're looking into your enquiry and we'll get back to you within 2 business days (Sunday-Thursday 9am-6pm GST).";
        $ar_msg = "شكراً لتواصلكم معنا، نعمل الآن على الإجابة على استفساراتكم وسوف نقوم بالرد عليكم في ظرف يومي عمل (الأحد – الخميس 9 صباحاً – 6 مساءً  حسب التوقيت المحلي)";
        $data = ['name' => $request->input('name'), 'email' => $request->input('email'), 'phone' => $request->input('phone'), 'message' => $request->input('message'), 'created_at' => date('Y-m-d h:i:s')];
        $id = DB::table('contacts')->where('email', $request->input('email'))->value('id');
        if (empty($id)) {
            DB::table('contacts')->insert($data);
        } else {
            DB::table('contacts')->where('id', $id)->update(['message' => $request->input('message'), 'updated_at' => date('Y-m-d h:i:s')]);
        }

        Mail::send('emails.contact', ['data' => $data], function ($message) use ($data) {
            $message->subject('New enquiry has been generated');
            $message->from('website@thoedevelopments.com', 'The Heart of Europe');
            $message->to('info@thoe.com', 'THOE');
        });

        $result = ['msg' => ($this->locale == 'en' ? $en_msg : $ar_msg), 'status' => 'success'];

        return Response::json($result);
    }

}
