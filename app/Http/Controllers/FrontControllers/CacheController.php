<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use Cache;
use DB;

class CacheController extends Controller {

    /**
     * Display a listing of the Lead.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {

        if ($request->action == 'single') {
            clear_cache_page($request->page_url);
            $msg = $this->delete_single_cache($request->page_url);
            return view('cache-clear', ['url' => '', 'msg' => 'Cache has been cleared. ' . $msg, 'page_url' => $request->page_url]);
        } else if ($request->action == 'bulk') {
            $this->clear_bulk_pages($request->url_keyword);
            return view('cache-clear', ['url' => '', 'msg' => 'Cache has been cleared']);
        } else if ($request->action == 'all' && $request->token == 'Azizi@2018') {
            DB::table('cache')->truncate();
            $this->delete_files('/var/www/html/caches/*');
            DB::table('cache')->update(['status' => 0]);
            Cache::flush();
            return view('cache-clear', ['url' => '', 'msg' => 'Cache has been cleared']);
        } else if ($request->action == 'files' && $request->token == 'Azizi@2018') {
            $this->clear_session_views();
            return view('cache-clear', ['url' => '', 'msg' => 'Session and Views has been delete.', 'token' => $request->token]);
        } else if ($request->action == 'store_all' && $request->token == 'Azizi@2018') {
            $this->store_all();
            return view('cache-clear', ['url' => '', 'msg' => 'Pages has been Cached']);
        } elseif (!empty($request->token) && $request->token != 'Azizi@2018') {
            return view('cache-clear', ['url' => '', 'msg' => 'Invalid Token']);
        }

        return view('cache-clear');
    }

    public function clear_session_views() {
        $app_path = '/var/www/html/az_core/';
        file_put_contents($app_path . '/storage/logs/laravel.log', '');
        $this->delete_files($app_path . '/storage/framework/views/*');
        //$this->delete_files($app_path . '/storage/framework/sessions/*');
        file_put_contents($app_path . '/storage/logs/laravel.log', '');
    }

    public function ulrToKey($url) {
        $newurl = preg_replace('/&?_=[0-9]*/', '', $url);
        if ((strpos($newurl, 'http') === false)) {
            $page_url = 'https:' . $newurl;
        } else {
            $page_url = $newurl;
        }

        return md5($page_url);
    }

    public function delete_single_cache($url) {
        $key = $this->ulrToKey($url);
        if (file_exists("/var/www/html/caches/$key.html")) {
            unlink("/var/www/html/caches/$key.html");
            DB::table('cache')->where('key', $key)->update(['status' => 0]);
            return "</br/>$url<br/>Deletion Success";
        } else {
            return "Deletion Failed";
        }
    }

    public function clear_bulk_pages($url_keyword) {
        $urls = DB::table('cache')->where('url', 'like', "%{$url_keyword}%")->get();
        foreach ($urls as $value) {
            clear_cache_page($value->url);
            $this->delete_single_cache($value->url);
            DB::table('cache')->where('id', $value->id)->update(['status' => 0]);
        }
    }

    public function delete_files($dir) {
        $files = glob($dir);
        foreach ($files as $file) { // iterate files
            if (is_file($file)) {
                unlink($file);
            }
        }
    }

    public function delete_session_views(Request $request) {
        $app_path = '/var/www/html/az_core/';
        $this->delete_files($app_path . '/storage/framework/views/*');
        //$this->delete_files($app_path . '/storage/framework/sessions/*');
        file_put_contents($app_path . '/storage/logs/laravel.log', '');
        return redirect($request->url);
    }

    public function store(Request $request) {
        $str =trim(stripslashes(htmlspecialchars($request->page_url)));
        $test = str_replace('%','-', $str );
        $newurl = preg_replace('/&?_=[0-9]*/', '', $test);

        //$newurl = preg_replace('/&?_=[0-9]*/', '', $request->page_url);
        if ((strpos($newurl, 'http') === false)) {
            $newurl = 'https:' . $newurl;
        }
        if ($newurl == 'https://azizidevelopments.com') {
            $newurl = 'https://azizidevelopments.com/';
        }
        //$page_url = str_replace(['http:'], ['https:'], $newurl);
        $page_url = str_replace(['https:'], ['http:'], $newurl);
        $this->saveFileByUrl($page_url);
    }

    public function store_all() {
        $urls = DB::table('cache')->where('status', 0)->get();
        foreach ($urls as $value) {
            $this->saveFileByUrl($value->url);
        }
    }

    public function saveFileByUrl($page_url) {

        if ($page_url == SITE_URL) {
            $page_url = $page_url . '/';
        }

        $key = md5($page_url);

        if (!file_exists("/var/www/html/caches/$key.html") || !Cache::has($key)) {
            $exist = DB::table('cache')->where('key', $key)->where('status', 0)->value('key');
            if (empty($exist)) {
                DB::table('cache')->insert(['key' => $key, 'url' => $page_url, 'expiration' => 60, 'status' => 1]);
            }

            $time1 = \Carbon\Carbon::now()->addMinutes(60);
            $arrContextOptions = ["ssl" => array("verify_peer" => false, "verify_peer_name" => false,),];
            $text = file_get_contents($page_url, false, stream_context_create($arrContextOptions));
            if (empty($text)) {
                return;
            }
            /* minify */
            ob_start('minify_html');
            $content = preg_replace_callback('#<style(>|\s[^<>]*?>)([\s\S]*?)<\/style>#', function($m) {
                return '<style' . $m[1] . minify_css($m[2]) . '</style>';
            }, $text);
            $content1 = preg_replace_callback('#<script(>|\s[^<>]*?>)([\s\S]*?)<\/script>#', function($m) {
                return '<script' . $m[1] . minify_js($m[2]) . '</script>';
            }, $content);

            echo $content1;

            $content2 = minify_html(ob_get_clean());
            $content3 = str_replace('/"', '"', $content2);
            Cache::put($key, $content3, $time1); //30 days cache in minutes
            file_put_contents("/var/www/html/azizi/public/caches/$key.html", $content3);
            echo $page_url . '<br/>Successfully Cached';
        }

        echo $page_url . '<br/>Already Cached';
    }

}
