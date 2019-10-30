<?php

namespace App\Http\Controllers\AdminControllers;


use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;

use DB;

class AdminSyncController extends Controller {

    

    public function __construct(Request $request) {

        //$this->middleware('auth.basic');
    }

    public function getSyncVersion(Request $request) {
        $versions = DB::table('sync_versions')->select('id', 'type', 'version', 'size', 'files', 'updated_at')->orderBy('id', 'desc')->get();
        return view('admin.mobileapps.app-sync-version', ['versions' => $versions]);
    }

    public function setSyncVersion(Request $request) {
        $result = $this->getSyncMedia($request->type, $request->date);

        DB::table('sync_versions')->insert([
            "type" => $request->type,
            "version" => $request->version,
            "content" => implode(',', $result['content']),
            "size" => $result['size'],
            "files" => $result['files'],
            "status" => 'Active',
            "created_at" => \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now(),]);
        return redirect(route('admin.app-sync-version.index'));
    }

    public function getSyncMedia($type, $date) {

        $media[] = $this->getfloorplandetails();
        $media[] = $this->getBrochuredetails();
        $media[] = $this->getLocationdetails();
        $media[] = $this->getCommunitydetails();
        $media[] = $this->getPropertydetails($type);
        $media[] = $this->getEventdetails();
        //if ($type == 'azd') {
            $media[] = $this->getConstructiondetails();
        //}

        $result = array_filter(array_reduce($media, 'array_merge', array()));
        $files = [];
        foreach ($result as $key => $value) {
            $pathinfo = pathinfo($value);
            $filepath = str_replace(['http://d20tuhk9p77p3f.cloudfront.net/', 'http://azizidevelopments.in/'], ['/home/aziziin/public_html/'], $value);
            $filetime = date("Y-m-d", filemtime($filepath));
            $files[$key]['path'] = $filepath;
            $files[$key]['url'] = $value;
            $files[$key]['name'] = $pathinfo['basename'];
            $files[$key]['mime'] = mime_content_type($filepath);
            $files[$key]['time'] = date("Y-m-d", filemtime($filepath));
            $files[$key]['htime'] = \Carbon\Carbon::createFromTimeStamp(strtotime($filetime))->diffForHumans();
            $files[$key]['size'] = round(@filesize($filepath) / (1024 * 1024), 2);
        }
        $totalsize = 0;

        foreach ($files as $key => $file) {
            if (strtotime($file['time']) > strtotime($date)) {
                $newFiles[] = $file['url'];
                $totalsize += $file['size'];
            }
        }
        
        
        return ['content' => $newFiles, 'files' => count($newFiles), 'size' => $totalsize];
    }

    public function getLocationdetails() {
        $locations = DB::table('areas')->where('status', 'active')->get();
        foreach ($locations as $k => $value) {
            $img = getImageSrcBySize($value->cover, 'medium');
            if (empty($img)) {
                $img = getImageSrcBySize($value->cover, 'thumb');
            }
            $media[$value->id . '-area-' . $k] = !empty($img) ? $img : '';
        }
        return $media;
    }

    public function getCommunitydetails() {
        $communities = DB::table('communities')->where('status', 'active')->get();
        foreach ($communities as $k => $value) {
            $img = getImageSrcBySize($value->cover, 'medium');
            if (empty($img)) {
                $img = getImageSrcBySize($value->cover, 'thumb');
            }
            $media[$value->id . '-community-' . $k] = !empty($img) ? $img : '';
        }
        return $media;
    }

    public function getEventdetails() {
        $communities = DB::table('posts')->where('post_type', 'event')->where('status', 'Publish')->get();
        foreach ($communities as $k => $value) {
            $img = getImageSrcBySize($value->cover, 'medium');
            if (empty($img)) {
                $img = getImageSrcBySize($value->cover, 'thumb');
            }
            $media[$value->id . '-event-' . $k] = !empty($img) ? $img : '';
        }
        return $media;
    }

    public function getPropertydetails($type = null) {
        $availability_lists = DB::table('properties')->where('status', 'active')->get();
        foreach ($availability_lists as $value) {
            $img = getImageSrcBySize($value->cover, 'medium');
            if (empty($img)) {
                $img = getImageSrcBySize($value->cover, 'thumb');
            }
            $media[$value->id . '-featuredimages'] = !empty($img) ? $img : '';

            $gallery_images = self::getPropertiesImage($value->id);
            //if ($type == 'azd' && !empty($gallery_images)) {
                foreach ($gallery_images as $k => $v) {
                    $media[$value->id . '-gallery-images-' . $k] = $v;
                }
            //}
            if ($type == 'azd') {
                //$media[$value->id . '-gmap'] = !empty($value->gmap) ? $value->gmap : '';
            }
        }
        return $media;
    }

    public function getBrochuredetails() {
        $properties = DB::table('properties')->where('status', 'active')->get();
        foreach ($properties as $value) {
            $brochure = freecdn_url(getFile($value->brochure, 'guid'));
            $media[$value->id . '-brochure'] = !empty($brochure) ? $brochure : '';
        }
        return $media;
    }

    public function getfloorplandetails() {
        $properties = DB::table('properties')->where('status', 'active')->get();
        foreach ($properties as $value) {
            $floor_plan = freecdn_url(getFile($value->floor_plan, 'guid'));
            $media[$value->id . '-floorplan'] = !empty($floor_plan) ? $floor_plan : '';
        }
        return $media;
    }

    public function getConstructiondetails() {
        $properties = DB::table('properties')->where('status', 'active')->get();
        foreach ($properties as $value) {
            $construction_images = self::getConstructionsImage($value->id);
            if (!empty($construction_images)) {
                foreach ($construction_images as $k => $v) {
                    $media[$value->id . '-construction-images-' . $k] = $v;
                }
            }
        }
        return $media;
    }

    static public function getPropertiesImage($id) {
        $cover_id = DB::table('properties')->where('id', $id)->value('cover');
        $property_images[] = getImageSrcBySize($cover_id, 'medium');
        $images = DB::table('property_images')->where('property_id', $id)->pluck('file_id');
        foreach ($images as $img_id) {
            $file = DB::table('files')->where('id', $img_id)->first();
            if (!empty($file) && $img_id != $cover_id) {
                $property_images[] = getImageSrcBySize($img_id, 'medium');
            }
        }
        if (!empty($property_images)) {
            return array_slice(array_filter($property_images), 0, 6);
        }
    }

    static public function getConstructionsImage($id) {
        $construction_images = '';
        $images = DB::table('construction_images')->where('construction_id', $id)->pluck('file_id');
        foreach ($images as $img_id) {
            $file = DB::table('files')->where('id', $img_id)->first();
            if (!empty($file)) {
                $construction_images[] = getImageSrcBySize($img_id, 'medium');
            }
        }
        if (!empty($construction_images)) {
            return array_slice(array_filter($construction_images), 0, 12);
        }
    }

    public function deleteSyncVersion(Request $request) {
        DB::table('sync_versions')->where('id', $request->id)->delete();
        return redirect(route('admin.app-sync-version.index'));
    }

}
