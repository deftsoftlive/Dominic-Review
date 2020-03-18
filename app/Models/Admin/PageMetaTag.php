<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
class PageMetaTag extends Model
{
    

       use Sluggable;
       use SluggableScopeHelpers;
    
		public function sluggable()
		{
		    return [

		        'type' => [
		            'source' => 'title'
		        ]
		    ];
		}

}
