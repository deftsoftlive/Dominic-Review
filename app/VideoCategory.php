<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class VideoCategory extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;

    protected $fillable = [
        'slug', 'name', 'status', 'created_at', 'updated_at'
    ];

    public function sluggable() {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
