<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Comman;
use App\Models\Menu;
use App\Banner;
use File;
use Hash;
use Lang;
use Mail;
use Redirect;
use Sentinel;
use URL;
use View;
use Validator;

class AdminCommanController extends Controller {

    public function index() {

        $sliders = Banner::All();
        $records = get_menu(1);
        $footers_part1 = get_menu(2, 4, 0);
        $footers_part2 = get_menu(2, 5, 4);
        $setting = get_setting();

        return view('index', compact('records', 'sliders', 'footers_part1', 'footers_part2', 'setting'));
    }

}
