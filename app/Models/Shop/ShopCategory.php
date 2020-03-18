<?php

namespace App\Models\Shop;
 
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use App\Models\Products\ProductCategory;
class ShopCategory extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;

    public function sluggable()
    {
        return [

            'slug' => [
                'source' => 'name'
            ]
        ];
    }




    public function parentCategory($shop_id,$parent=0)
    {
        $categoryIDs = $this->where('shop_id',$shop_id)->where('parent',$parent)->pluck('category_id')->toArray();
        return ProductCategory::whereIn('id',$categoryIDs)->where('parent',$parent)->where('status',1)->orderBy('sorting','ASC')->get();
    }


     public function childCategory($shop_id,$parent=0)
    {
        $categoryIDs = $this->where('shop_id',$shop_id)->where('parent',$parent)->pluck('category_id')->toArray();
        return ProductCategory::whereIn('id',$categoryIDs)->where('parent',$parent)->where('status',1)->orderBy('sorting','ASC')->get();
    }


   



    


}
