<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class VendorPackage extends Model
{
	use Sluggable;
    use SluggableScopeHelpers;

    protected $fillable = ['title', 'slug', 'description', 'no_of_hours', 'no_of_days', 'menus',
    'status', 'category_id', 'user_id', 'price', 'price_type', 'min_person', 'max_person','vendor_category_id',
    'custom_package_id','type','user_requested_by'
];

    public function sluggable() {
        return [

            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function package_addons() {
       return $this->hasMany('App\PackageMetaData', 'package_id')->where('type', 'addons');
    }

    public function amenities() {
       return $this->hasMany('App\PackageMetaData', 'package_id')->where('type', 'amenities');
    }

    public function events() {
       return $this->hasMany('App\PackageMetaData', 'package_id')
                    ->where('package_meta_datas.type', 'events');
    }

    public function games() {
       return $this->hasMany('App\PackageMetaData', 'package_id')->where('type', 'games');
    } 

     

    public function business() {
        return $this->belongsTo('App\VendorCategory', 'vendor_category_id', 'id');
    }

      public function category()
    {
       return $this->belongsTo('App\Category','category_id','id');
    }


    //  public function assignedDeal() {
    //     return $this->belongsTo('App\Models\Vendors\DiscountDeal','package_id');
    // }
    
}
