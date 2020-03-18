<?php

namespace App\Models\Products;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use App\Models\Products\ProductAssignedVariation;
use App\Models\Shop\ShopCartItems;
use App\Traits\ProductAttributes\CreateSubProductOfVariations;
class Product extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;
    use CreateSubProductOfVariations;

    
    public function sluggable()
    {
        return [

            'slug' => [
                'source' => 'name'
            ]
        ];
    }



    public function productPrice()
    {    
        $arr = [];
        $product = $this;
        if($this->product_type == 0){

                 $arr['price'] = ($this->price);
                 $arr['sale_price'] = ($this->price - $product->sale_price);
                 $sale = $product->sale_price;

        }else{ 

                 $arr['price'] = ($this->price);
                 $arr['sale_price'] = ($this->price - $product->sale_price);
                 $sale = $product->sale_price;                        
        }

           $text  = '<div class="product-price">';
        if($sale > 0){
           $text .='<small>$'.custom_format($arr['price'],2).'</small>';
        }
           $text .='$'.custom_format($arr['sale_price'],2).'</div>';
           $arr['html'] = $text;

        return $arr;
    }



       public function RejectionReason()
    {
       return $this->hasOne('App\Models\Vendors\RejectionReason','type_id')
         ->where('type','product')
         ->orderBy('id','DESC');
    }




     public function category()
     {
       return $this->belongsTo('App\Models\Products\ProductCategory','category_id');
     }


     public function getParentProductData()
     {
       return $this->belongsTo($this,'parent');
     }


     public function reviews()
     {
       return $this->hasMany('App\Models\Review','product_id','id')->where('type','products');
     }



     public function user()
     {
     	 return $this->belongsTo('App\User');
     }

     public function eshop()
     {
       return $this->belongsTo('App\Models\Vendors\Eshop','shop_id','id')
                   ->where('status',1)
                   ->where('approved_status',1);
     }

      public function shop()
     {
       return $this->belongsTo('App\Models\Vendors\Eshop','shop_id','id');
     }

     public function subcategory()
     {
     	 return $this->belongsTo('App\Models\Products\ProductCategory','subcategory_id','id');
     }

     public function childcategory()
     {
     	 return $this->belongsTo('App\Models\Products\ProductCategory','childcategory_id','id');
     }


     public function variationAttributes()
     {
          return $this->hasMany('App\Models\Products\ProductAttribute','product_id','id')->where('parent',0);
     }


     public function HasInventory()
     {
          return $this->hasOne('App\Models\Products\ProductInventory','product_id','id');
     }


     public function ProductImages()
     {
          return $this->hasMany('App\Models\Products\ProductImage','product_id','id');
     }

     public function ProductAssignedVariations()
     {
          return $this->hasMany('App\Models\Products\ProductAssignedVariation','product_id')->where('parent',0);
     }



     public function ProductAttributeVariableProduct()
     {
         return $this->hasMany('App\Models\Products\ProductAttribute','product_id','id')->where('parent',0)->where('product_variant',1);
     }


     public function ProductAttributeVariableVisibles()
     {
         return $this->hasMany('App\Models\Products\ProductAttribute','product_id','id')
                     ->where('parent',0)
                     ->where('product_view',1);
     }

#=============================================================================================================================================

    public function cartOptions()
    {
        $types = $this->getVariationTypes();
        $typeArray = [];
        foreach ($types as $key => $type) {
                 $ProductAttribute = ProductAssignedVariation::where('type',$type)
                                                             ->where('product_id',$this->id)
                                                             ->groupBy('attribute_id')
                                                             ->pluck('attribute_id')
                                                             ->toArray();

                 $typeArray[$type] = $ProductAttribute;
        }

        return $typeArray;
    }



  #============================================================================================================================================


  public function getVariationTypes()
  {
      return $this->hasMany('App\Models\Products\ProductAssignedVariation','product_id')
                  ->where('parent','>',0)
                  ->groupBy('type')
                  ->pluck('type');
  }


  public function getProductRelatedVariation()
  {
      return $this->hasMany('App\Models\Products\ProductAssignedVariation','parent','variant_id')
                  ->where('parent','>',0);
  }


#==================================================================================================================

  public function hasInWishlist()
  {
      
      if(\Auth::check() && \Auth::user()->role == "user"){
           $count = ShopCartItems::where('user_id',\Auth::user()->id)
                                 ->where('product_id',$this->id)
                                 ->where('type','wishlist');

          return $count->count() > 0 ? 'active' : '';
      }
  }



#===================================================================================================================
#===================================================================================================================

public function createProductWithVariation()
{
     if($this->product_type == 1){
           $this->CreateSubProductOfVariationFunction($this);
     }else{
          if($this->subProducts != null && $this->subProducts->count() > 0){
            
          $this->subProducts->delete();
          }
     }
}

#===================================================================================================================
#===================================================================================================================


public function subProducts()
{
   return $this->hasMany($this,'parent');
}


public function getProductName()
{
     $Product = $this;
     if($this->parent > 0){
       return $this->getParentProductData->count() > 0 ? $this->getParentProductData->name : '';
     }else{
      return $this->name;
     }
}






#==============================================================================================
#==============================================================================================

public function getChildVariationAccordingSubProduct()
{
            $array = [];
            if($this->getProductRelatedVariation->count() > 0){
                  $firstVariant = $this->getProductRelatedVariation->first();
                  $parent = ProductAssignedVariation::where('type',$firstVariant->type)
                                                 ->where('product_id',$firstVariant->product_id)
                                                 ->where('attribute_id',$firstVariant->attribute_id)
                                                 ->where('user_id',$firstVariant->user_id)
                                                 ->groupBy('parent')
                                                 ->pluck('parent')
                                                 ->toArray();
                  $all = ProductAssignedVariation::whereIn('parent',$parent) ->groupBy('type')->get();
                  foreach($all as $p){
                          $child = ProductAssignedVariation::whereIn('parent',$parent)
                                                            ->where('type',$p->type)
                                                             ->groupBy('attribute_id')
                                                            ->pluck('attribute_id')
                                                            ->toArray();;

                          
                             
                     $array[$p->type] = $child;
                  }
 
        
          }

      return $array;
}


#==============================================================================================
#==============================================================================================




public function getUrlAccordingToVariations($type,$attribute_id)
{
 

    $product = ProductAssignedVariation::where('product_id',$this->id)
                                       ->where('type',$type)
                                       ->where('parent','>',0)
                                       ->where('attribute_id',$attribute_id)
                                       ->groupBy('attribute_id');

    if($product->count() > 0){
       $variantion = $product->pluck('parent');

      if(!empty($variantion[0])){
          $id = $variantion[0];
           $p = Product::where('variant_id',$id);
           if($p->count() > 0){
               return url(route('shop.product.detail.page',$p->first()->slug));
           }
        
      }
   }

}


#=======================================================================================
#=======================================================================================


public function ProductInventoryWithVariation()
{
  return $this->hasOne('App\Models\Products\ProductInventory','variation_id','variant_id');
}


#=======================================================================================
#=======================================================================================

public function checkStock()
{
    return $this->product_type == 1 ? $this->ProductInventoryWithVariation : $this->HasInventory;
}


#=======================================================================================
#=======================================================================================

public static function NewProducts()
{
     return $product = self::has('eshop')->withCount('subProducts')
                                               ->where('create_status',1)
                                               ->where('approved_status',1)
                                               ->orderBy('id','DESC')
                                               ->where('parent',0)
                                               ->where('status',1)
                                               ->paginate(12);
}

#=======================================================================================
#=======================================================================================

public static function featuredProducts()
{
         return  $productIDs = self::has('eshop')
                            ->where('create_status',1)
                            ->where('approved_status',1)
                            ->where('featured',1)
                            ->where('status',1)
                            ->where('parent',0);

                                                      

}

#=======================================================================================
#=======================================================================================

}
