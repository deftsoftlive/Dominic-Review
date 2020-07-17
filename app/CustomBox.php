<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class CustomBox extends Model
{
	use Sluggable;
    use SluggableScopeHelpers;
    
    protected $fillable = [
        'type', 'position', 'title', 'slug', 'description', 'more_text', 'image', 'status', 'sort', 'created_at', 'updated_at'
    ];

    public function sluggable() {
        return [

            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
