<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use View;
use DB;

class AdminMetaController extends Controller {

    /**
     * Show a list of all the properties.
     *
     * @return View
     */
    public function index(Request $request) {
// Grab all the properties


        if (!empty($request->submit)) {
            foreach ($request->meta as $value) {
                //echo '<pre>'; print_r($value); echo '</pre>'; die();
                if (!empty($value['id'])) {
                    $this->update($value);
                }
                if (!empty($value['del_id'])) {
                    $this->delete($value);
                } else {
                    $this->create($value);
                }
            }
        }

        $query = DB::table('tbl_meta');

        if (!empty($request->page_url) && !empty($request->url_match)) {
            if ($request->url_match == 'Contain') {
                $query->where('page_url', 'like', "%$request->page_url%");
            } else {
                $query->where('page_url', 'like', "$request->page_url");
            }
        }

        if (!empty($request->meta_title)) {
            $query->where('meta_title', 'like', "%$request->meta_title%");
        }
        if (!empty($request->meta_desc)) {
            $query->where('meta_desc', 'like', "%$request->meta_desc%");
        }
        if (!empty($request->meta_key)) {
            $query->where('meta_key', 'like', "%$request->meta_key%");
        }
        if (!empty($request->dup)) {
            $query->where('dup', $request->dup)->orderBy('meta_title', 'desc');
        }

        $count = $query->count();

        $meta = $query->paginate(!empty($request->limit) ? $request->limit : 12);
        // Show the page

        return view('admin.meta.index', ['meta' => $meta, 'count' => $count]);
    }

    /**
     * Create new properties
     *
     * @return View
     */
    public function create($meta) {
        if (!empty($meta['page_url'])) {
            $exist = DB::table('tbl_meta')->where('page_url', $meta['page_url'])->count();
            if (empty($exist)) {
                DB::table('tbl_meta')->insert([
                    'page_url' => $meta['page_url'],
                    'meta_title' => !empty($meta['meta_title']) ? $meta['meta_title'] : 'Property Developer in Dubai, The Heart of Europe | ' . time(),
                    'meta_desc' => !empty($meta['meta_desc']) ? $meta['meta_desc'] : 'Property Developer in Dubai, The Heart of Europe | ' . time(),
                    'meta_key' => $meta['meta_key'],
                ]);
            }
            $dup_title = DB::table('tbl_meta')->where('meta_title', $meta['meta_title'])->count();
            if (!empty($dup_title) && $dup_title > 1) {
                DB::table('tbl_meta')->where('meta_title', $meta['meta_title'])->update(['dup' => 1,]);
        }
    }
    }

    /**
     * Create new properties
     *
     * @return View
     */
    public function update($meta) {

        DB::table('tbl_meta')->where('id', $meta['id'])->update([
            'page_url' => $meta['page_url'],
            'meta_title' => $meta['meta_title'],
            'meta_desc' => $meta['meta_desc'],
            'meta_key' => $meta['meta_key'],
        ]);

        $exist = DB::select("SELECT COUNT(meta_title) c FROM tbl_meta where meta_title='{$meta['meta_title']}'  GROUP BY meta_title HAVING c > 1");
        if (empty($exist[0]->c)) {
            DB::table('tbl_meta')->where('id', $meta['id'])->update(['dup' => '0',]);
    }
    }

    /**
     * Create new properties
     *
     * @return View
     */
    public function delete($meta) {
        DB::table('tbl_meta')->where('id', $meta['del_id'])->delete();
    }

    /**
     * Create new properties
     *
     * @return View
     */
    public function save(Request $request) {
        $meta = $request->all();
        $this->create($meta);
    }

}
