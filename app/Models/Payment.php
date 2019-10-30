<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model {

	protected $table = 'tbl_payment';
	
	public $timestamps = false;

	public function get_property(){
		
		return $this->hasOne('App\Models\Properties','id','property_id');
		
	}
	
	public function get_unit(){
		
		return $this->hasOne('App\Models\Unities','id','unit_number');
		
	}
}
