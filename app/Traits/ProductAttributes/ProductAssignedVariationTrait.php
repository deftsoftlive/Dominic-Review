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
 
trait ProductAssignedVariationTrait{





#===============================================================================================================
#===============================================================================================================
#===============================================================================================================


public function createNewVariationWithAttributeAndStockManagable(Request $request,$product_id)
{
     
      $product = Product::find($product_id);

      
	  if($product->user_id == Auth::user()->id){
	  	if($this->checkAlreadyExistVariationOrNot($request,$product) == 1){
	  		$status =['status' => 0,'messages' => 'This variation already Exist Please check again'];
	  	}elseif(!empty($request->hasStockManage) && $this->checkAlreadyExistSKUOrNot($request,$product) == 0){
	  		$status =['status' => 0,'messages' => 'This Sku is already Exists!'];
	  	}else{
             $this->createInventoryAndVariations($request,$product);
             $status =['status' => 1,'messages' => 'This variation is saved successfully.'];
	  	}

       return response()->json($status);
			 

	  }
}



#==============================================================================================================
#==============================================================================================================
#==============================================================================================================


public function createInventoryAndVariations($request,$product)
{
       
        $path = 'images/products/';
        $v = !empty($request->variation_id) ? ProductAssignedVariation::find($request->variation_id) : new ProductAssignedVariation;
        $image = !empty($request->variation_id) ? $v->thumbnail : $product->thumbnail;
		$v->shop_id = $product->shop_id;
		$v->user_id = $product->user_id;
		$v->product_id = $product->id;
		$v->price = $request->price;
		$v->thumbnail = $request->hasFile('thumbnail') ? uploadFileWithAjax($path, $request->thumbnail) : $image;
		$v->sale_price = $request->sale_price;
		$v->final_price = trim(($request->price - $request->sale_price));
		$v->status = $request->stock_status;
		$v->stock_managable = !empty($request->hasStockManage) ? 1 : 0;
		$v->weight=$request->weight;
        $v->height=$request->height;
        $v->width=$request->width;
        $v->length=$request->length;
        if($v->save()){
           
        	$product->createProductWithVariation();
            return $this->savingAttributeOfVariation($request,$product,$v->id);
        }
}


#==============================================================================================================
#==============================================================================================================
#==============================================================================================================

public function savingAttributeOfVariation($request,$product,$variation_id)
{
 
    $old = ProductAssignedVariation::where('product_id',$product->id)
                            ->where('shop_id',$product->shop_id)
                            ->where('user_id',$product->user_id)
                            ->where('parent',$variation_id);
    if($old->count() > 0){
     	  $old->delete();
    }

	foreach ($request->variations as $type => $attribute_id) {
            $v = new ProductAssignedVariation;
			$v->product_id = $product->id;
			$v->shop_id = $product->shop_id;
			$v->user_id = $product->user_id;
			$v->parent = $variation_id;
			$v->type = $type;
			$v->attribute_id = $attribute_id;
			$v->save();
	}

	return $this->ProductInventoryChecking($request,$product,$variation_id);

  
}


#==============================================================================================================
#==============================================================================================================
#==============================================================================================================

public function checkAlreadyExistVariationOrNot($request,$product)
{
        $variation_id = !empty($request->variation_id) ? $request->variation_id : 0;
        $variations = $product->ProductAssignedVariations->where('id','!=',$variation_id);


        $arr = [];
        foreach ($request->variations as $key => $value) {
        	 $arr[$key]=$value;
        }

        $status = 0;

        foreach ($variations as $key => $v) {
        	   $ids = $v->hasVariationAttributes->pluck('attribute_id','type')->toArray();
               if($arr == $ids){
               	$status = 1;
               }

        }

        return $status;

}

 

#==========================================================================================================
#==========================================================================================================
#==========================================================================================================


public function ProductInventoryChecking($request,$product,$variation_id=0)
{
	$status = 1;
	if(!empty($request->hasStockManage)){
       
       if($variation_id > 0){
          $ProductInventory = ProductInventory::where('shop_id',$product->shop_id)
		                                     ->where('product_id',$product->id)
		                                     ->where('user_id',$product->user_id)
		                                     ->where('variation_id',$variation_id);
         

          $stock = $ProductInventory->count() > 0 ? $ProductInventory->first() : new ProductInventory;

		 
	      $stock->shop_id = $product->shop_id; 
	      $stock->product_id = $product->id; 
	      $stock->user_id = $product->user_id; 
	      $stock->sku = $request->sku;
	      $stock->status = !empty($request->hasStock) ? 1 : 0;
	      $stock->stock = $request->stock;
	      $stock->variation_id = $variation_id;
	      $stock->lowInStock = $request->lowInStock;
	      $stock->save();
	     }
		                                     
	}else{
		 $ProductInventory = ProductInventory::where('shop_id',$product->shop_id)
		                                     ->where('product_id',$product->id)
		                                     ->where('user_id',$product->user_id)
		                                     ->where('variation_id',$variation_id)
		                                     ->delete();
	}
	return 1;
}




#==================================================================================================
#==================================================================================================
#==================================================================================================


public function checkAlreadyExistSKUOrNot($request,$product)
{
	  $variation_id = !empty($request->variation_id) ? $request->variation_id : 0;
	  $c = ProductInventory::where('sku',$request->sku)
	                  ->where('variation_id','!=',$variation_id);
	                   
	  return $c->count() > 0 ? 0 : 1;
}










}