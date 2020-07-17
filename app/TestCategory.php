<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class TestCategory extends Model
{
	use Sluggable;
    use SluggableScopeHelpers;

    protected $fillable = [
        'slug', 'title', 'description', 'created_at', 'updated_at'
    ];

    public function sluggable() {
        return [

            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
