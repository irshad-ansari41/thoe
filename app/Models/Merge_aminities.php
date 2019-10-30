<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Merge_aminities extends Model {

	protected $table = 'tbl_property_merge_aminities';
	
	public $timestamps = false;
	
	public function amin(){
		return $this->belongsTo('App\Models\Aminities', 'aminity_id');
	}

	
}
