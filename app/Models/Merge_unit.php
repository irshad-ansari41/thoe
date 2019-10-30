<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Merge_unit extends Model {

	protected $table = 'tbl_property_merge_unit';
	
	public $timestamps = false;
	
	public function unit(){
		return $this->belongsTo('App\Models\Unities', 'unit_id');
	}

	
}
