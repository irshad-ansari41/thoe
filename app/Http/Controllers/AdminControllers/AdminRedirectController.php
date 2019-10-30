<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use DB;

class AdminRedirectController extends Controller {

    /**
     * Show a list of all the properties.
     *
     * @return View
     */
    public function index(Request $request) {
// Grab all the properties


        if (!empty($request->submit)) {
            foreach ($request->redirect as $value) {
                //echo '<pre>'; print_r($value); echo '</pre>';
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

        $query = DB::table('url_redirects');

        if (!empty($request->source) && !empty($request->url_match)) {
            if ($request->url_match == 'Contain') {
                $query->where('source', 'like', "%$request->source%");
            } else {
                $query->where('source', 'like', "$request->source");
            }
        }

        if (!empty($request->destination)) {
            $query->where('destination', 'like', "%$request->destination%");
        }

        if (!empty($request->status)) {
            $query->where('status', $request->status);
        }

        $count = $query->count();

        $redirect = $query->paginate(!empty($request->limit) ? $request->limit : 12);
        // Show the page

        return view('admin.redirect.index', ['redirect' => $redirect, 'count' => $count]);
    }

    /**
     * Create new properties
     *
     * @return View
     */
    public function create($redirect) {
        if (!empty($redirect['source'])) {
            $exist = DB::table('url_redirects')->where('source', $redirect['source'])->count();
            if (empty($exist) && strpos($redirect['destination'], SITE_URL.'/') !== false) {
                DB::table('url_redirects')->insert([
                    'source' => $redirect['source'],
                    'destination' => $redirect['destination'],
                    'status' => $redirect['status'],
                    'created_at' => date('Y-m-d h:i:s'),
                ]);
            }
        }
    }

    /**
     * Create new properties
     *
     * @return View
     */
    public function update($redirect) {

        if (strpos($redirect['destination'], SITE_URL.'/') !== false) {
            DB::table('url_redirects')->where('id', $redirect['id'])->update([
                'source' => $redirect['source'],
                'destination' => $redirect['destination'],
                'status' => $redirect['status'],
            ]);
        }
    }

    /**
     * Create new properties
     *
     * @return View
     */
    public function delete($redirect) {
        DB::table('url_redirects')->where('id', $redirect['del_id'])->delete();
    }

    
}
