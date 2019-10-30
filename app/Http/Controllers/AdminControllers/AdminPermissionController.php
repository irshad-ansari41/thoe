<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Contact;
use App\Users;
use File;
use Hash;
use Lang;
use Mail;
use Redirect;
use Sentinel;
use URL;
use View;
use Validator;
use App\Models\Moduleaccess;
use App\Userrole;
use DB;

class AdminPermissionController extends Controller {

    public function noPermission() {
        return view('admin.noPermission');
    }

}
