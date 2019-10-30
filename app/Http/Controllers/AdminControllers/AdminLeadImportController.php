<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;


class AdminLeadImportController extends Controller {

    public function __construct(Request $request) {

        //$this->middleware('auth.basic');
    }

    public function index(Request $request) {
        return view('admin.leads.import');
    }

    public function importExcel(Request $request) {

        $data = [];

        $msg = 'Invalid FIle Type. Leads file should be .xlsx format';

        for ($i = 0; $i < count($_FILES["file"]["name"]); $i++) {
            $name = str_replace(' ', '-', $_FILES["file"]["name"][$i]);
            if (!file_exists(UPLOAD_PATH)) {
                mkdir(UPLOAD_PATH, 0777, true);
            }
            file_put_contents(UPLOAD_PATH . '/' . $name, file_get_contents($_FILES["file"]["tmp_name"][$i]));
            $filename = UPLOAD_PATH .'/'. $name;
            $pathinfo = pathinfo($filename);
            if ($pathinfo['extension'] == 'csv') {
                $data[$i] = csv_to_array($filename);
            } else {
                return view('admin.leads.import', ['msg' => $msg]);
            }
        }
        return view('admin.leads.import', ['data' => $data]);
    }

}
