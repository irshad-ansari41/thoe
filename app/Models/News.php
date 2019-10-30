<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model {

	protected $table = 'tbl_pressrelease';
	
	public $timestamps = false;
	
	
	/*public function get_images(){
		return $this->hasMany('App\Gallery','property_id','id');
	}*/
}
