<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use View;
use DB;
use Response;

class MetaController extends Controller {

    /**
     * Create new properties
     *
     * @return View
     */
    public function create($meta) {
        if (!empty($meta['page_url'])) {
            $exist = DB::table('tbl_meta')->where('page_url', $meta['page_url'])->count();
            $data = [
                'page_url' => $meta['page_url'],
                'meta_title' => !empty($meta['meta_title']) ? $this->checkTitle($meta['meta_title']) : 'Property Developer in Dubai, Azizi Developments | ' . time(),
                'meta_desc' => !empty($meta['meta_desc']) ? $this->checkTitle($meta['meta_desc']) : 'Property Developer in Dubai, Azizi Developments | ' . time(),
                'meta_key' => $meta['meta_key']
            ];

            if (empty($exist)) {
                //DB::table('tbl_meta')->insert($data);
            } else if (!empty($meta['meta_id'])) {
                //DB::table('tbl_meta')->where('id', $meta['meta_id'])->update($data);
            }

            $row = DB::table('tbl_meta')->where('meta_title', $meta['meta_title'])->first();
            return Response::json(['data' => $data, 'row' => $row]);
        }
    }

    /**
     * Create new properties
     *
     * @return View
     */
    public function save(Request $request) {
        $meta = $request->all();
        return $this->create($meta);
    }

    public function checkTitle($title) {
        $count = DB::table('tbl_meta')->where('meta_title', $title)->count();
        $value = DB::table('tbl_meta')->where('meta_title', $title)->value('meta_title');
        if ($count > 1 && !empty($value)) {
            $len = $count > 10 ? 67 : 68;
            $new_title = substr($value, 0, $len) . '|' . ($count + 1);
        }
        return !empty($new_title) ? $new_title : $title;
    }

    public function checkDesc($desc) {
        $count = DB::table('tbl_meta')->where('meta_desc', $desc)->count();
        $value = DB::table('tbl_meta')->where('meta_desc', $desc)->value('meta_desc');
        if ($count > 1 && !empty($value)) {
            $len = $count > 10 ? 152 : 153;
            $new_desc = substr($value, 0, $len) . '|' . ($count + 1);
        }
        return !empty($new_desc) ? $new_desc : $desc;
    }

}
