<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Near extends Model {

	protected $table = 'tbl_near_place';
	
	public $timestamps = false;
	
	public function get_project_info(){
		return $this->belongsTo('App\Models\Project', 'project_id');
	}

}
