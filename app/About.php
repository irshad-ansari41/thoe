<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Cviebrock\EloquentTaggable\Taggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class About extends Model {

    use SoftDeletes;

    use Sluggable;
    use SluggableScopeHelpers;
    use Taggable;

    protected $dates = ['deleted_at'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable() {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $table = 'abouts';
    protected $guarded = ['id'];

   

}
