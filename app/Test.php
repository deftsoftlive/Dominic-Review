<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Test extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;

    protected $fillable = [
        'test_cat_id', 'season', 'courses', 'slug', 'title', 'description', 'status', 'created_at', 'updated_at'
    ];

    public function sluggable() {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
     
}
