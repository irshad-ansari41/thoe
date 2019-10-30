<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model {

	protected $table = 'tbl_setting';
	
	protected $fillable = array('logo', 'contact_email');
	
	public $timestamps = false;

}
