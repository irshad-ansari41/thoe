<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use Cache;
use DB;

class ApiJsController extends Controller {

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

    public function index() {


        //$this->getPropertiesImage();

        Cache::flush();

        //Property List by Area and Type

        $content = $this->getRestData(SITE_URL . '/api/dubai', 'areas');
        $content .= $this->getRestData(SITE_URL . '/api/dubai/meydan', 'property_communities_10');

        $projects = DB::table('tbl_projects')->get();
        foreach ($projects as $project) {
            if (in_array($project->id, [15, 16, 17])) {
                $content .= $this->getRestData(SITE_URL . "/api/dubai/meydan/{$project->slug}", "properties_{$project->id}");
            } else {
                $content .= $this->getRestData(SITE_URL . "/api/dubai/{$project->slug}", "properties_{$project->id}");
            }
            $properties = DB::table('tbl_properties')->where('project_id', $project->id)->where('status', '1')->get();
            foreach ($properties as $property) {
                if (in_array($project->id, [15, 16, 17])) {
                    $content .= $this->getRestData(SITE_URL . "/api/dubai/meydan/{$project->slug}/{$property->slug}", "property_{$property->id}");
                } else {
                    $content .= $this->getRestData(SITE_URL . "/api/dubai/{$project->slug}/{$property->slug}", "property_{$property->id}");
                }
                //sleep(1);
            }
        }

        //Property List by Area and Type

        $content .= $this->getRestData(SITE_URL . '/api/dubai/construction-updates', 'construction_areas');
        $content .= $this->getRestData(SITE_URL . '/api/dubai/meydan/construction-updates', 'constructions_communities_10');

        $cprojects = DB::table('tbl_projects')->get();
        foreach ($cprojects as $project) {
            if (in_array($project->id, [15, 16, 17])) {
                $content .= $this->getRestData(SITE_URL . "/api/dubai/meydan/{$project->slug}/construction-updates", "constructions_{$project->id}");
            } else {
                $content .= $this->getRestData(SITE_URL . "/api/dubai/{$project->slug}/construction-updates", "constructions_{$project->id}");
            }
            $cproperties = DB::table('tbl_properties')->where('project_id', $project->id)->where('status', '1')->get();
            foreach ($cproperties as $property) {
                if (in_array($project->id, [15, 16, 17])) {
                    $content .= $this->getRestData(SITE_URL . "/api/dubai/meydan/{$project->slug}/{$property->slug}/construction-updates", "construction_{$property->id}");
                } else {
                    $content .= $this->getRestData(SITE_URL . "/api/dubai/{$project->slug}/{$property->slug}/construction-updates", "construction_{$property->id}");
                }
                //sleep(1);
            }
        }




        //brochures Areas
        $content .= $this->getRestData(SITE_URL . '/api/properties/brochures', 'brochures');

        //Floorplan Areas
        $content .= $this->getRestData(SITE_URL . '/api/properties/floorplans', 'floorplans');

        $content .= $this->getRestData(SITE_URL . '/api/events', 'events');

        $content .= $this->getRestData(SITE_URL . '/api/videos', 'videos');


        $this->setRestData(PUBLIC_PATH . '/uploads/online.js', $content);
    }

    function getRestData($url, $variable) {

        $ch = curl_init();
        $timeout = 5;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $data = curl_exec($ch);
        curl_close($ch);
        return $content = "var $variable=$data;\n\n"
                . "localStorage.setItem('$variable', JSON.stringify($variable));\n\n\n";
    }

    /*
      public function getRestData1($url, $variable) {
      $content1 = file_get_contents($url);

      return $content = "var $variable=$content1;\n\n\n"
      . "localStorage.setItem('$variable', JSON.stringify($variable));\n\n\n\n\n";
      }
     */

    public function setRestData($filename, $content) {

        file_put_contents($filename, $content);
    }

    function getDirContents($dir, &$results = array()) {
        $files = scandir($dir);

        foreach ($files as $key => $value) {
            $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
            if (!is_dir($path)) {
                $results[] = $path;
            } else if ($value != "." && $value != "..") {
                $this->getDirContents($path, $results);
                //$results[] = $path;
            }
        }

        return $results;
    }

    public function getPropertiesImage() {
        $g = '/var/www/html/assets/images/properties';
        $files = $this->getDirContents($g);
        $property_images = [];
        foreach ($files as $file) {
            $result = changeUrl($file);
            echo '<pre>';
            print_r($result);
            echo '</pre>';
            die;
           
        }
        return $property_images;
        // End api_Events
    }

}
