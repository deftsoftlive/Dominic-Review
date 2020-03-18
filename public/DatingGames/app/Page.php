<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Page extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;

    protected $fillable = ['slug', 'name', 'body', 'metatitle', 
    'metakeywords', 'metadescription', 'status'];

    public function sluggable() {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
	}

}
