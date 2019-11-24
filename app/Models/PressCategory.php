<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PressCategory extends Model {

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'tbl_press_categories';

    protected $guarded = ['id'];

    public function press()
    {
        return $this->hasMany(Press::class);
    }

}
