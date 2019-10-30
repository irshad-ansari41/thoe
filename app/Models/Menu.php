<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model {

	protected $table = 'tbl_menu';
	
	protected $fillable = array('title', 'type', 'created');
	
	public $timestamps = false;

}
