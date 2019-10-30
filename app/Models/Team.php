<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model {

	protected $table = 'tbl_team';
	
	public $timestamps = false;
	
	
	public function get_team_detail(){
		return $this->belongsTo('App\Models\Team', 'parent_id');
	}

	public function team_detail(){
		return $this->hasMany('App\Models\Team', 'parent_id','id');
	}

	


}
