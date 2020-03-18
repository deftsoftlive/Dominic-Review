<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class UserEvent extends Model
{
	use Sluggable;
    use SluggableScopeHelpers;

    protected $fillable = [
    	  'slug', 
          'title',
          'user_id',
          'description',
          'start_date',
          'end_date',
          'min_person',
          'max_person',
          'location',
          'latitude', 
          'longitude', 
          'event_type',
          'status',
          'ideas',
          'notepad',
          'colour',
          'seasons',
          'start_time',
          'end_time',
          'long_description',
          'event_picture'
    ];

    public function sluggable() {
        return [

            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function eventCategories() {
        return $this->hasMany('App\UserEventMetaData', 'event_id')->where('key', 'category_id');
    }

    public function order() {
        return $this->hasMany('App\Models\Order', 'event_id');
    }


    public function eventType() {
        return $this->belongsTo('App\Event', 'event_type');
    }


    public function eventOrder() {
        return $this->belongsTo('App\Models\EventOrder')
                                 ->where('type','order');
    }


    public function myEventTasksList()
    {
       return $this->hasMany('App\Models\Tools\MyCheckListTask','event_id','id');
    }
    public function taskCategories()
    {
       return $this->hasMany('App\Models\Tools\CheckList','event_id','id');
    }



    // public function ToDoTasks($category_id=null)
    // {
    //    return App\Models\Tools\MyCheckListTaskwhere(function($t) use($category_id){
    //       if($category_id != null){
    //         $t->where('category_id',$category_id);
    //       }
    //    })
    //    ->whereDate('task_date','<',date('Y-m-d h:i:s'));
    // }



    public function ToDoTasks($category_id=null)
    {
       return \App\Models\Tools\MyCheckListTask::where(function($t) use($category_id){
          if($category_id != null){
             $t->where('category_id',$category_id);
          }
       })
       ->where('event_id',$this->id)
       ->where('status',0)
       ->whereDate('task_date','>=',date('Y-m-d'));
    }

     public function OverDueTasks($category_id=null)
    {
       return \App\Models\Tools\MyCheckListTask::where(function($t) use($category_id){
          if($category_id != null){
             $t->where('category_id',$category_id);
          }
       })
       ->where('event_id',$this->id)
       ->whereDate('task_date','<',date('Y-m-d'));
    }
}
