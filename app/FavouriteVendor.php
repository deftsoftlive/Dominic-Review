<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FavouriteVendor extends Model {
	
    protected $fillable = [
    	'vendor_id', 'user_id'
    ];

    public function business() {
    	return $this->hasOne('App\VendorCategory', 'id', 'vendor_id');
    }
}
