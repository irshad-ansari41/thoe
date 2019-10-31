<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'php-html-css-js-minifier.php';

if (!defined('STORE_PATH')) {
    define('STORE_PATH', '/var/www/html/azizi/public');
}
if(!defined('SalesForceKey')){
    define('SalesForceKey','https://login.salesforce.com/services/oauth2/token?grant_type=password&client_id=3MVG9fTLmJ60pJ5KrRUqX1XPM76O2pql3eIKgbbff2muacjWV5XUSVDe1h3j4qmKWG8sOUrS1rcEAuoLUWi_r&client_secret=13BBC7762904A64067E05F2F3149D719326A374E56D1EC8208091CCBB6E7FAE2&username=api.integrator@azizidevelopments.com&password=Integration1234$');
}
if (!defined('PROPTOCOL')) {
    define('PROPTOCOL', 'https:');
}

if (!defined('APP_PATH')) {
    define('APP_PATH', '/var/www/html/azizi');
}

if (!defined('PUBLIC_PATH')) {
    define('PUBLIC_PATH', '/var/www/html/azizi/public');
}

if (!defined('APP_URL')) {
    define('APP_URL', 'https://azizidevelopments.com');
}

if (!defined('SITE_URL')) {
    define('SITE_URL', 'https://azizidevelopments.com');
}

if (!defined('SITE_NAME')) {
    define('SITE_NAME', 'Azizi Developments');
}

if (!defined('SITE_IP')) {
    define('SITE_IP', '35.168.87.174');
}

if (!defined('DOMAIN_NAME')) {
    define('DOMAIN_NAME', 'azizidevelopments.com');
}

if (!defined('UPLOAD_PATH')) {
    define('UPLOAD_PATH', '/var/www/html/azizi/public/uploads/' . date('Y') . '/' . date('m'));
}
if (!defined('FB_APP_ID')) {
    define('FB_APP_ID', '136745863654131');
}

if (!defined('MONTHS')) {
    define('MONTHS', serialize([
        1 => ['en' => 'Jan', 'ar' => 'يناير', 'cn' => '一月'],
        2 => ['en' => 'Feb', 'ar' => 'فبراير', 'cn' => '二月'],
        3 => ['en' => 'Mar', 'ar' => 'مارس', 'cn' => '三月'],
        4 => ['en' => 'Apr', 'ar' => 'أبريل', 'cn' => '四月'],
        5 => ['en' => 'May', 'ar' => 'مايو', 'cn' => '五月'],
        6 => ['en' => 'Jun', 'ar' => 'يونيو', 'cn' => '六月'],
        7 => ['en' => 'Jul', 'ar' => 'يوليو', 'cn' => '七月'],
        8 => ['en' => 'Aug', 'ar' => 'أغسطس', 'cn' => '八月'],
        9 => ['en' => 'Sep', 'ar' => 'سبتمبر', 'cn' => '九月'],
        10 => ['en' => 'Oct', 'ar' => 'أكتوبر', 'cn' => '十月'],
        11 => ['en' => 'Nov', 'ar' => 'نوفمبر', 'cn' => '十一月'],
        12 => ['en' => 'Dec', 'ar' => 'ديسمبر', 'cn' => '十二月'],
    ]));
}

if (!defined('DAYS')) {
    define('DAYS', serialize([
        1 => ['en' => 'Sat', 'ar' => 'السبت', 'cn' => '星期六'],
        2 => ['en' => 'Sun', 'ar' => 'الأحد', 'cn' => '星期天'],
        3 => ['en' => 'Mon', 'ar' => 'الإثنين', 'cn' => '星期一'],
        4 => ['en' => 'Tue', 'ar' => 'الثلاثاء', 'cn' => '星期二'],
        5 => ['en' => 'Wed', 'ar' => 'الأربعاء', 'cn' => '星期三'],
        6 => ['en' => 'Thu', 'ar' => 'الخميس', 'cn' => '星期四'],
        7 => ['en' => 'Fri', 'ar' => 'الجمعة', 'cn' => '星期五'],
    ]));
}

if (!defined('NUMBERS')) {
    define('NUMBERS', serialize([
        1 => ['en' => '0', 'ar' => '٠', 'cn' => '零'],
        2 => ['en' => '1', 'ar' => '١', 'cn' => '一'],
        3 => ['en' => '2', 'ar' => '٢', 'cn' => '二'],
        4 => ['en' => '3', 'ar' => '٣', 'cn' => '三'],
        5 => ['en' => '4', 'ar' => '٤', 'cn' => '四'],
        6 => ['en' => '5', 'ar' => '٥', 'cn' => '五'],
        7 => ['en' => '6', 'ar' => '٦', 'cn' => '六'],
        8 => ['en' => '7', 'ar' => '٧', 'cn' => '七'],
        9 => ['en' => '8', 'ar' => '٨', 'cn' => '八'],
        10 => ['en' => '9', 'ar' => '٩', 'cn' => '九'],
    ]));
}



/* CACHE PAFE FUNCTIONS */

function get_cache_page($url) {

    if (strpos($url, 'online-payments') !== false || strpos($url, 'debug') !== false) {
        return false;
    }
    $newurl = preg_replace('/&?_=[0-9]*/', '', $url);

    $key = md5($newurl);
    return Cache::get($key);
}

function set_cache_page($url, $value, $time = 60) {

    $newurl = preg_replace('/&?_=[0-9]*/', '', $url);
    $key = md5($newurl);
    if (!Cache::has($key)) {
        $exist = DB::table('cache')->where('key', $key)->value('key');
        if (empty($exist)) {
            DB::table('cache')->insert(['key' => $key, 'url' => $newurl, 'expiration' => $time]);
        }
        $time = \Carbon\Carbon::now()->addMinutes($time);
        Cache::put($key, $value, $time); //30 days cache in minutes
    }
}

function delete_cache_page($key) {
    if (!is_array($key)) {
        $keys = DB::table('cache')->where('key', 'like', '%' . $key . '%')->get();
        foreach ($keys as $v) {
            if (!empty($v->key)) {
                Cache::forget($v->key);
                DB::table('cache')->where('key', $v->key)->delete();
            }
        }
        return;
    }
    foreach ($key as $val) {
        $keys = DB::table('cache')->where('key', 'like', '%' . $val . '%')->get();
        foreach ($keys as $v) {
            if (!empty($v->key)) {
                Cache::forget($v->key);
                DB::table('cache')->where('key', $v->key)->delete();
            }
        }
    }
}

function delete_cache_homepage() {
    $homepage = SITE_URL . '-';
    $keys = DB::table('cache')->where('key', 'like', '%' . $homepage . '%')->get();
    foreach ($keys as $v) {
        if (!empty($v->key)) {
            Cache::forget($v->key);
            DB::table('cache')->where('key', $v->key)->delete();
        }
    }
}

function clear_cache_page($url) {
    $newurl = preg_replace('/&?_=[0-9]*/', '', $url);
    $key = md5($newurl);
    Cache::forget($key);
    DB::table('cache')->where('key', $key)->delete();
}

/* END CACHE PAFE FUNCTIONS */

function get_locale($segment) {
    if (!empty($segment) && in_array($segment, ['en', 'ar', 'cn'])) {
        $locale = $segment;
    } else {
        $locale = 'en';
    }
    return $locale;
}

function get_menu($locale, $type, $limit1 = '', $limit2 = '') {

    if ($limit1 != '') {
        $menus = DB::table('tbl_menu')->orderBy('ordering', 'asc')->where('status', '1')->where("type", $type)->where("parent_id", "0")->limit($limit1)->offset($limit2)->get();
    } else {
        $menus = DB::table('tbl_menu')->orderBy('ordering', 'asc')->where('status', '1')->where("type", $type)->where("parent_id", "0")->get();
    }

    $records = array();

    if (!empty($menus)) {
        $i = 0;

        foreach ($menus as $menu) {

            if ($locale == 'en') {
                $records[$i]['title_en'] = $menu->title_en;
            } else if ($locale == 'ar') {
                $records[$i]['title_en'] = $menu->title_ar;
            } else if ($locale == 'cn') {
                $records[$i]['title_en'] = $menu->title_ch;
            } else {
                $records[$i]['title_en'] = $menu->title_en;
            }
            $records[$i]['link'] = $menu->link;
            $records[$i]['slug'] = $menu->slug;
            $records[$i]['ordering'] = $menu->ordering;
            $records[$i]['id'] = $menu->id;

            $subs = DB::table('tbl_menu')->orderBy('ordering', 'asc')->where("parent_id", $menu->id)->where('status', '1')->get();

            if (!empty($subs)) {

                $j = 0;
                foreach ($subs as $sub) {

                    if ($locale == 'en') {
                        $records[$i]['submenus'][$j]['title_en'] = $sub->title_en;
                    } else if ($locale == 'ar') {
                        $records[$i]['submenus'][$j]['title_en'] = $sub->title_ar;
                    } else if ($locale == 'cn') {
                        $records[$i]['submenus'][$j]['title_en'] = $sub->title_ch;
                    } else {
                        $records[$i]['submenus'][$j]['title_en'] = $sub->title_en;
                    }
                    $records[$i]['submenus'][$j]['id'] = $sub->id;
                    $records[$i]['submenus'][$j]['link'] = $sub->link;
                    $records[$i]['submenus'][$j]['slug'] = $sub->slug;
                    $records[$i]['submenus'][$j]['ordering'] = $sub->ordering;
                    $records[$i]['submenus'][$j]['parent_id'] = $sub->parent_id;
                    $j++;
                }
            } else {
                $records[$i]['submenus'] = '';
            }

            $i++;
        }
    }
    return $records;
}

function get_setting($locale) {
    $record = DB::table('tbl_setting')->first();

    $data = array();

    if ($locale == 'en') {
        $data['description_en'] = $record->description_en;
    } else if ($locale == 'ar') {
        $data['description_en'] = $record->description_ar;
    } else if ($locale == 'cn') {
        $data['description_en'] = $record->description_ch;
    } else {
        $data['description_en'] = $record->description_en;
    }
    $data['header_logo'] = $record->logo;
    $data['header_logo_ar'] = $record->logo_ar;
    $data['header_logo_ch'] = $record->logo_ch;


    $data['inner_logo'] = $record->inner_logo;
    $data['inner_logo_ar'] = $record->inner_logo_ar;
    $data['inner_logo_ch'] = $record->inner_logo_ch;


    $data['slider_style'] = $record->slider_style;
    $data['banner_postion'] = $record->banner_postion;
    $data['footer_logo'] = $record->footer_logo;
    $data['footer_logo_ar'] = $record->footer_logo_ar;
    $data['footer_logo_ch'] = $record->footer_logo_ch;

    $data['contact_email'] = $record->contact_email;


    $data['linkedin_link'] = $record->linkedin_link;
    $data['facebook_link'] = $record->facebook_link;
    $data['twitter_link'] = $record->twitter_link;
    $data['instagram_link'] = $record->instagram_link;
    $data['google_link'] = $record->google_link;
    $data['mobile_wh_en'] =$record->mobile_wh_en;
    $data['mobile_bl_en'] =$record->mobile_bl_en;
    $data['mobile_wh_ar'] =$record->mobile_wh_ar;
    $data['mobile_bl_ar'] =$record->mobile_bl_ar;

    return $data;
}

function showTextByLocale($locale, $content) {
    if ($locale == 'en') {
        return !empty($content['en']) ? $content['en'] : (!empty($content[0]) ? $content[0] : '');
    } else if ($locale == 'ar') {
        return !empty($content['ar']) ? $content['ar'] : (!empty($content[1]) ? $content[1] : '');
    } else if ($locale == 'cn') {
        return !empty($content['cn']) ? $content['cn'] : (!empty($content[2]) ? $content[2] : '');
    }
}

function metaTitleByLocale($locale, $content) {
    if ($locale == 'en') {
        $title = !empty($content['en']) ? $content['en'] : (!empty($content[0]) ? $content[0] : '');
    } else if ($locale == 'ar') {
        $title = !empty($content['ar']) ? $content['ar'] : (!empty($content[1]) ? $content[1] : '');
    } else if ($locale == 'cn') {
        $title = !empty($content['cn']) ? $content['cn'] : (!empty($content[2]) ? $content[2] : '');
    }
    mb_internal_encoding("UTF-8");
    return mb_substr(az_strip_all_tags(preg_replace('/\s+/', ' ', $title)), 0, 60);
}

function metaDescByLocale($locale, $content) {
    if ($locale == 'en') {
        $desc = !empty($content['en']) ? $content['en'] : (!empty($content[0]) ? $content[0] : '');
    } else if ($locale == 'ar') {
        $desc = !empty($content['ar']) ? $content['ar'] : (!empty($content[1]) ? $content[1] : '');
    } else if ($locale == 'cn') {
        $desc = !empty($content['cn']) ? $content['cn'] : (!empty($content[2]) ? $content[2] : '');
    }
    mb_internal_encoding("UTF-8");
    return mb_substr(az_strip_all_tags(preg_replace('/\s+/', ' ', $desc)), 0, 155);
}

function lead_excel_csv($file) {

    require_once(app_path() . '/ExcelClasses/PHPExcel.php');

    $inputfilename = $file;

//  Read your Excel workbook
    try {
        $inputfiletype = PHPExcel_IOFactory::identify($inputfilename);
        $objReader = PHPExcel_IOFactory::createReader($inputfiletype);
        $objPHPExcel = $objReader->load($inputfilename);
    } catch (Exception $e) {
        die('Error loading file "' . pathinfo($inputfilename, PATHINFO_BASENAME) . '": ' . $e->getMessage());
    }

//  Get worksheet dimensions
    $sheet = $objPHPExcel->getSheet(0);
    $highestRow = $sheet->getHighestRow();
    $highestColumn = $sheet->getHighestColumn();
    $fields = [];
//  Loop through each row of the worksheet in turn
    $header = [];
    for ($row = 1; $row <= $highestRow; $row++) {
        $trimmed_array = [];
        //  Read a row of data into an array
        $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
        if (empty($header)) {
            $header = $rowData[0];
        } else {
            $trimmed_array = $rowData[0];
        }

        if (!empty($header) && !empty($trimmed_array)) {
            $record = array_combine($header, $trimmed_array);
            $fields[$row]["Source"] = 'Facebook';
            $fields[$row]["Lead Name"] = !empty($record['full_name']) ? $record['full_name'] : '';
            $fields[$row]["Work E-Mail"] = !empty($record['email']) ? $record['email'] : '';
            $fields[$row]["Home Phone"] = !empty($record['phone_number']) ? str_replace('p:', '', $record['phone_number']) : '';
            $fields[$row]["Work Phone"] = !empty($record['work_phone_number']) ? $record['work_phone_number'] : '';
            $fields[$row]["City"] = !empty($record['city']) ? $record['city'] : '';
        }
    }
    return $fields;
}

function csv_to_array($filename = '', $delimiter = ',') {
    if (!file_exists($filename) || !is_readable($filename)) {
        return FALSE;
    }

    $header = NULL;
    $data = array();
    if (($handle = fopen($filename, 'r')) !== FALSE) {
        while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE) {
            if (!$header) {
                $header = $row;
            } else {
                $data[] = array_combine($header, $row);
            }
        }
        fclose($handle);
    }
    return $data;
}

function set_option($key, $value, $timer = null) {
    $exist = DB::table('tbl_options')->where('option_key', $key)->count();
    if (empty($exist)) {
        DB::table('tbl_options')->insert(['option_key' => $key, 'option_value' => $value, 'timer' => $timer]);
    } else {
        DB::table('tbl_options')->where('option_key', $key)->update(['option_value' => $value, 'timer' => $timer]);
    }
}

function get_option($key) {
    $value = DB::table('tbl_options')->where('option_key', $key)->value('option_value');
    if (!empty($value)) {
        return $value;
    }
}

function url_segment($url, $index = null) {
    $uri_path = parse_url($url, PHP_URL_PATH);
    $uri_segments = explode('/', $uri_path);
    if (empty($index)) {
        $segment = end($uri_segments);
    } else {
        $segment = !empty($uri_segments[$index]) ? $uri_segments[$index] : '';
    }
    return str_replace('-', ' ', ucwords($segment));
}

function get_images_project($project_id, $slice = null) {
    $project = DB::table('tbl_projects')->select('gallery_location')->where('id', $project_id)->first();
    $properties = DB::table('tbl_properties')->select('id', 'gallery_location', 'header_image')->where("project_id", $project_id)->get();

    foreach ($properties as $property) {
        $images[] = asset("assets/images/properties/{$project->gallery_location}/{$property->gallery_location}/{$property->header_image}");
    }
    if (!empty($slice)) {
        return array_slice(array_unique($images), 0, $slice);
    }
    return array_unique($images);
}

function get_amenity_project($project_id, $locale = 'en') {
    $properties = DB::table('tbl_properties')->select('id')->where("project_id", $project_id)->get();
    foreach ($properties as $property) {
        $property_ids[] = $property->id;
    }
    $aminities = DB::table('tbl_property_merge_aminities as t1')->leftjoin('tbl_aminities as t2', 't1.aminity_id', '=', 't2.id')->whereIn('t1.property_id', $property_ids)->orderBy("t2.id", "DESC")->get();
    foreach ($aminities as $value) {
        if ($locale == 'en') {
            $aminity[] = trim($value->title_en);
        }
        if ($locale == 'ar') {
            $aminity[] = trim($value->title_ar);
        }
        if ($locale == 'cn') {
            $aminity[] = trim($value->title_ch);
        }
    }
    return implode(', ', array_unique($aminity));
}

function get_unit_types_project($project_id, $locale = 'en') {
    $properties = DB::table('tbl_properties')->select('id')->where("project_id", $project_id)->get();
    foreach ($properties as $property) {
        $property_ids[] = $property->id;
    }
    $units = DB::table('tbl_property_merge_unit as t1')->leftjoin('tbl_property_unit as t2', 't1.unit_id', '=', 't2.id')->whereIn('t1.property_id', $property_ids)->orderBy("t2.id", "DESC")->get();
    foreach ($units as $value) {
        if ($locale == 'en') {
            $unit[] = trim($value->title_en);
        }
        if ($locale == 'ar') {
            $unit[] = trim($value->title_ar);
        }
        if ($locale == 'cn') {
            $unit[] = trim($value->title_ch);
        }
    }
    return implode(', ', array_unique($unit));
}

function get_nearby_project($project_id, $locale = 'en') {
    $nearsby = DB::table('tbl_near_place')->where("project_id", $project_id)->get();
    foreach ($nearsby as $value) {
        if ($locale == 'en') {
            $nearby[] = trim($value->title_en);
        }
        if ($locale == 'ar') {
            $nearby[] = trim($value->title_ar);
        }
        if ($locale == 'cn') {
            $nearby[] = trim($value->title_ch);
        }
    }
    return implode(', ', array_unique($nearby));
}

function generate_breadcrumb($links, $locale = null) {

    $html = '<ul class="breadcrumb' . ($locale == 'ar' ? '-ar' : "") . '"><li>';
    $i = 1;
    foreach ($links as $key => $value) {
        $html .= ($i > 1 ? ' / ' : '') . ($i != count($links) ? "<a href=" . $key . ">" . $value . "</a>" : "<strong>{$value}</strong>");
        $i++;
    }
    $html .= '<li></ul>';
    return $html;
}

if (!function_exists('ArabicDate')) {

    function ArabicDate() {
        $months = array("Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل", "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس", "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر");
        $your_date = date('y-m-d'); // The Current Date
        $en_month = date("M", strtotime($your_date));
        foreach ($months as $en => $ar) {
            if ($en == $en_month) {
                $ar_month = $ar;
            }
        }

        $find = array("Sat", "Sun", "Mon", "Tue", "Wed", "Thu", "Fri");
        $replace = array("السبت", "الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة");
        $ar_day_format = date('D'); // The Current Day
        $ar_day = str_replace($find, $replace, $ar_day_format);

        header('Content-Type: text/html; charset=utf-8');
        $standard = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
        $eastern_arabic_symbols = array("٠", "١", "٢", "٣", "٤", "٥", "٦", "٧", "٨", "٩");
        $current_date = $ar_day . ' ' . date('d') . ' / ' . $ar_month . ' / ' . date('Y');
        $arabic_date = str_replace($standard, $eastern_arabic_symbols, $current_date);

        return $arabic_date;
    }

}

if (!function_exists('ChineseDate')) {

    function ChineseDate() {
        $months = array("Jan" => "一月", "Feb" => "二月", "Mar" => "三月", "Apr" => "四月", "May" => "五月", "Jun" => "六月", "Jul" => "七月", "Aug" => "八月", "Sep" => "九月", "Oct" => "十月", "Nov" => "十一月", "Dec" => "十二月");
        $your_date = date('y-m-d'); // The Current Date
        $en_month = date("M", strtotime($your_date));
        foreach ($months as $en => $ar) {
            if ($en == $en_month) {
                $ar_month = $ar;
            }
        }

        $find = array("Sat", "Sun", "Mon", "Tue", "Wed", "Thu", "Fri");
        $replace = array("星期六", "星期天", "星期一", "星期二", "星期三", "星期四", "星期五");
        $ar_day_format = date('D'); // The Current Day
        $ar_day = str_replace($find, $replace, $ar_day_format);

        header('Content-Type: text/html; charset=utf-8');
        $standard = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
        $eastern_arabic_symbols = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
        $current_date = $ar_day . ' ' . date('d') . ' / ' . $ar_month . ' / ' . date('Y');
        $arabic_date = str_replace($standard, $eastern_arabic_symbols, $current_date);

        return $arabic_date;
    }

}

function az_strip_all_tags($string, $remove_breaks = false) {
    $string = preg_replace('@<(script|style)[^>]*?>.*?</\\1>@si', '', $string);
    $string = strip_tags($string);

    if ($remove_breaks) {
        $string = preg_replace('/[\r\n\t ]+/', ' ', $string);
    }

    return trim($string);
}

function az_trim_words($text, $num_words = 50, $more = ' &hellip;') {

    $str = az_strip_all_tags($text);

    $words_ar_array = explode(' ', $str);
    $words_array = array_slice($words_ar_array, 0, $num_words);
    $sep = ' ';

    if (count($words_array) > $num_words) {
        array_pop($words_array);
        $text = implode($sep, $words_array);
        $text = $text . $more;
    } else {
        $text = implode($sep, $words_array) . $more;
    }

    return $text;
}

function input_trims($data) {
    return trim($data);
    //$data = stripslashes($data);
    //$data = htmlspecialchars($data);
}

function changeUrl($oldUrl) {

    $pathinfo = pathinfo($oldUrl);

    if (!empty($pathinfo['extension'])) {

        $source = str_replace(SITE_URL . '/', '/var/www/html/', $pathinfo['dirname']) . "/{$pathinfo['filename']}.{$pathinfo['extension']}";
        $destination1 = str_replace(SITE_URL . '/', '/var/www/html/', $pathinfo['dirname']);
        $destination2 = preg_replace('!\s+!', '-', strtolower($destination1));
        $destination3 = preg_replace('/_+/', '-', $destination2);
        $destination = rtrim(preg_replace('/-+/', '-', $destination3), '-');

        $filename1 = preg_replace('!\s+!', '-', strtolower($pathinfo['filename'] . '.' . $pathinfo['extension']));
        $filename2 = preg_replace('/_+/', '-', strtolower($filename1));
        $filename3 = preg_replace('/-+/', '-', $filename2);
        $filename4 = str_replace('-.', '.', $filename3);
        $filename = rtrim($destination . '/' . $filename4, '-');
        if (!file_exists($destination)) {
            mkdir($destination, 0777, true);
        } else {
            //rename($source, $destination);
        }
        if (!file_exists($filename)) {
            copy($source, $filename);
            //rename($source, $filename);
        }
        return ['source' => $source, 'destination' => $destination, 'filename' => $filename];
    } else {
        $source = str_replace(SITE_IP . '/', '/var/www/html/', $pathinfo['dirname']) . "/{$pathinfo['basename']}";
        $destination1 = str_replace(SITE_IP . '/', '/var/www/html/', "{$pathinfo['dirname']}/{$pathinfo['basename']}");
        $destination2 = preg_replace('!\s+!', '-', strtolower($destination1));
        $destination3 = preg_replace('/_+/', '-', $destination2);
        $destination4 = str_replace('-.', '.', $destination3);
        $destination = rtrim(preg_replace('/-+/', '-', $destination4), '-');
        if (!file_exists($destination)) {
            mkdir($destination, 0777, true);
        } else {
            //rename($source, $destination);
        }
        return ['source' => $source, 'destination' => $destination];
    }
}

function subscribe_newsletter($name, $email, $locale) {
    $is_confirmed = $msg = '';
    $exist = DB::table('subscribers')->where('email', trim($email))->first();
    $token = substr(md5(rand()), 0, 10);
    if (empty($exist)) {
        $sid = DB::table('subscribers')->insertGetId(['name' => trim($name), 'email' => trim($email), 'created_at' => date('Y-m-d h:i:s'),
            'status' => 'S', 'token' => $token]);
    } else {
        $sid = $exist->id;
        DB::table('subscribers')->where('email', trim($email))->update(['name' => trim($name), 'email' => trim($email)]);
        $is_confirmed = $exist->status;
    }

    $data = [
        'name' => $name,
        'email' => $email,
        'subject' => "Please Confirm Subscription - Azizi Developments Newsletter",
        'site_url' => SITE_URL,
        'nl_url' => url("{$locale}/newsletter/confirm/$sid/$token"),
    ];
    if ($is_confirmed == 'C') {
        $msg = '<p>Thank you for subscribing to our newsletter.</p>'
                . '<p> Our records show that you are already a subscriber.</p>'
                . '<p>You’ll receive the latest Azizi news to your inbox soon.</p>';
    } else {
        Mail::send('emails.confirm-subscription', ['data' => $data], function ($message) use ($data) {
            $message->subject($data['subject']);
            $message->from('subscription@azizidevelopments.com', 'Azizi Developments');
            $message->to($data['email'], $data['name']);
        });
        $msg = '<p>Thank you for subscribing to our newsletter! We’ll keep you up-to-date on the latest Azizi projects.</p>
                <p>You will receive a confirmation email very soon.</p>
                <p>If you don’t receive an email within 15 minutes, please check your spam folder</p>';
    }
    return $msg;
}

function count_property($property_id) {
    $total = DB::table('sc_units')->where('property_id', $property_id)->where('wishlist', 1)->count();
    $b = DB::table('sc_units')->where('property_id', $property_id)->where('wishlist', 1)->where('bayut', 1)->count();
    $p = DB::table('sc_units')->where('property_id', $property_id)->where('wishlist', 1)->where('pf', 1)->count();
    $d = DB::table('sc_units')->where('property_id', $property_id)->where('wishlist', 1)->where('dubizzle1', 1)->count();
    return "$total (B-$b, P-$p, D-$d)";
}

function count_avl_unit($property_id) {
    return DB::table('sc_units')->where('property_id', $property_id)->where('status', 'Available')->count();
}

function getPropertiesImage($unit) {

    //$unittype= $unit->Bedrooms == "Studio" ? [1,0] : ($unit->Bedrooms == "1BR"?[0,2]:($unit->Bedrooms == "2BR"?[0,3]:($unit->Bedrooms == "3BR"?[0,4]:0)));
    $unittype = $unit->Bedrooms == "Studio" ? [1, 0] : [0, 2, 3, 4];
    $property_old_id = DB::table('sc_properties')->where('id', $unit->property_id)->value('property_old_id');
    $property = DB::table('tbl_properties')->where('id', $property_old_id)->first();
    $project = db::table('tbl_projects')->where('id', $property->project_id)->where('status', '1')->orderBy("id", "ASC")->first();
    $galleries = DB::table('tbl_property_gallery')->where('property_id', $property_old_id)->where('status', '1')->whereIn('unit_type_id', $unittype)->orderBy("id", "DESC")->get();
    foreach ($galleries as $value) {
        $images[] = "https://azizidevelopments.com/assets/images/properties/{$project->gallery_location}/{$property->gallery_location}/$value->image";
    }
    shuffle($images);
    return $images;
}

function viewMenuByRole(array $role) {
    $user_id = Sentinel::getUser()->id;
    if (empty($user_id)) {
        return;
    }
    $role_ids = DB::table('roles')->whereIn('slug', $role)->get();
    $res[] = '';
    foreach ($role_ids as $value) {
        $exist = DB::table('role_users')->where('user_id', $user_id)->where('role_id', $value->id)->value('user_id');
        if (!empty($exist)) {
            $res[] = $exist;
        }
        $res[] = '';
    }
    return array_filter($res);
}

function social_share($title, $content, $picture, $url) {
    $via = 'AZIZI Developments';
    $hash_tags = '#AZIZI Developments';
    $text = $title;//az_trim_words(az_strip_all_tags($content),10);
    $url = urlencode($url);

    return (object) $share = [
        'facebook' => 'https://www.facebook.com/dialog/feed?app_id=' . FB_APP_ID . '&redirect_uri=' . $url . '&link=' . $url . '&picture=' . $picture . '&caption=' . $title . '&description=' . $text,
        'linkedin' => 'https://www.linkedin.com/shareArticle?mini=true&url=' . $url . '&title=' . $title . '&summary=' . $text . '&source=' . SITE_NAME,
        'twitter' => 'https://twitter.com/intent/tweet?url=' . $url . '&text=' . $text . '&via=' . $via . '&hashtags=' . $hash_tags,
    ]; 
}  

function Ratings(){ $record = DB::table('tbl_setting')->first(); return $record->ratings; }

//Offer Page Settings
if (!defined('OFFERS_Name')) { define('OFFERS_Name', 'offers'); }
if (!defined('OFFERS_URL')) { define('OFFERS_URL', 'offers'); }

function str_limit($text,$len=null){
    return $text;
}