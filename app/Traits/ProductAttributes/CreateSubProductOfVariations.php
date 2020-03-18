<?php
namespace App\Traits\ProductAttributes;
use Illuminate\Http\Request;
use App\Models\Products\Product;
use Auth;
use App\Models\Vendors\Eshop;
use App\Models\Products\ProductCategory;
use App\Models\Shop\ShopCategory;
use App\Models\Products\ProductAttribute;
use App\Models\Products\ProductInventory;
use App\Models\Products\ProductAssignedVariation;
use App\Traits\ProductAttributes\ProductAttributes;
 
trait CreateSubProductOfVariations{


#=========================================================================================================
#   CreateSubProductOfVariations
#=========================================================================================================



public function CreateSubProductOfVariationFunction($product)
{
	 
	 foreach ($product->ProductAssignedVariations as $variation) {
	 	      $this->createSubProductVariations($product,$variation);
	 }

}





#=========================================================================================================
#   CreateSubProductOfVariations
#=========================================================================================================



public function createSubProductVariations($product,$variation)
{
      $pro = Product::where('parent',$product->id)->where('variant_id',$variation->id);

	  $p = $pro->count() > 0 ? $pro->first() : new Product;
	  $p->parent = $product->id;
	  $p->product_type = $product->product_type;
	  $p->shop_id = $product->shop_id;
	  $p->category_id = $product->category_id;
	  $p->subcategory_id = $product->subcategory_id;
	  $p->childcategory_id = $product->childcategory_id;
	  $p->thumbnail = $variation->thumbnail;
	  $p->user_id = $product->user_id;
	  $p->name = $product->name;
      $p->price = $variation->price;
	  $p->sale_price = $variation->sale_price;
	  $p->final_price = $variation->final_price;
	  $p->variant_id = $variation->id;
	  $p->create_status = $product->create_status;
	  $p->save();
	  $p->sluggable();
	  
}

























}















