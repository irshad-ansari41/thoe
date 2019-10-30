<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use Response;
use DB;
use Cache;

class AdminMobileAppsController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {

        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard to the usep.
     *
     * @return Response
     */
    public function availabilityAppGetSetting(Request $request) {
        $options = DB::table('options')->select('option_key', 'option_value')->where('option_key', 'like', 'AVL_APP_%')->get();

        $setting = [];
        foreach ($options as $value) {
            $setting[$value->option_key] = $value->option_value;
        }

        return view('admin.mobileapps.availability-app-setting', ['setting' => (object) $setting]);
    }

    /**
     * Show the application dashboard to the usep.
     *
     * @return Response
     */
    public function availabilityAppSetSetting(Request $request) {

        $options = $request->all();

        foreach ($options as $key => $value) {
            if ($key != '_token') {
                set_option($key, $value);
            }
        }


        return redirect(route('availability-app-setting.index'));
    }

    /**
     * Show the application dashboard to the usep.
     *
     * @return Response
     */
    public function aziziAppGetSetting(Request $request) {
        $options = DB::table('options')->select('option_key', 'option_value')->where('option_key', 'like', 'AZD_APP_%')->get();

        $setting = [];
        foreach ($options as $value) {
            $setting[$value->option_key] = $value->option_value;
        }

        return view('admin.mobileapps.azizi-app-setting', ['setting' => (object) $setting]);
    }

    /**
     * Show the application dashboard to the usep.
     *
     * @return Response
     */
    public function aziziAppSetSetting(Request $request) {

        $options = $request->all();

        foreach ($options as $key => $value) {
            if ($key != '_token') {
                set_option($key, $value);
            }
        }


        return redirect(route('azizi-app-setting.index'));
    }
 
   
}
