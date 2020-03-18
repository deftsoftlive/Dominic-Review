<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Event extends Model
{
    use Sluggable;
    

    protected $fillable = [
        'name', 'description',
    ];
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */

    public function sluggable() {
        return [

            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function categoryVariation() {
       return $this->hasMany('App\CategoryVariation', 'variant_id', 'id');
                    
    }
    
    public function taskCategory() {
        return $this->hasMany('App\Models\Tools\DefaultTask', 'event_id', 'id')
                    ->where('parent',0);
                    
    }

    public function taskCategoryGeneral() {
        return  \App\Models\Tools\DefaultTask::where('event_id',0)->where('parent',0);
                 
    }
    
}
