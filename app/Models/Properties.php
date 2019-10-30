<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Properties extends Model {

    protected $table = 'tbl_properties';
    public $timestamps = false;

    public function get_unit() {

        return $this->hasMany('App\Models\Merge_unit', 'property_id', 'id');
    }

    public function get_images() {
        return $this->hasMany('App\Models\Gallery', 'property_id', 'id');
    }

    public function get_cimages() {
        return $this->hasMany('App\Models\Cgallery', 'property_id', 'id')->orderBy('caption_date', 'desc');
    }

    public function get_aminities() {

        return $this->hasMany('App\Models\Merge_aminities', 'property_id', 'id');
    }

    public function get_project_detail() {
        return $this->belongsTo('App\Models\Project', 'project_id');
    }

    public function get_category_detail() {
        return $this->belongsTo('App\Models\Category', 'property_type');
    }

}
