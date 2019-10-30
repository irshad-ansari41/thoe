<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model {

	protected $table = 'tbl_booking';
	
	public $timestamps = false;
	
	public function get_property(){
		
		return $this->hasOne('App\Models\Properties','id','property_id');
		
	}
	
	public function get_unit(){
		
		return $this->hasOne('App\Models\Unities','id','unit_number');
		
	}
	
	public function get_unit_floors(){
		
		return $this->hasOne('App\Models\Unitfloors','id','floor_block');
		
	}
	
	public function get_unit_features(){
		
		return $this->hasOne('App\Models\Unitfeatures','id','unity_feature');
		
	}
	public function get_project(){
		
		return $this->hasOne('App\Models\Project','id','project_id');
		
	}
	
	

}
