<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class CmsPage extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;

    protected $fillable = [
        'slug', 'meta_title', 'meta_description', 'meta_keywords', 'title', 'body', 'status'
    ];

     public function sluggable() {
        return [

            'slug' => [
                'source' => 'title'
            ]
        ];
    }

}
