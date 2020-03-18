<?php
namespace App\Traits\ProductCart;
use Illuminate\Http\Request;
 
use App\Models\Products\Product;
use Auth;
use App\Models\Vendors\Eshop;
use App\Models\Products\ProductCategory;
use App\Models\Shop\ShopCategory;
use App\Models\Products\ProductInventory;
use App\Models\Products\ProductImage;
use App\Models\Products\ProductAssignedVariation;
use App\Models\Shop\ShopCartItems;
use Cart; 
trait UserCartTrait{

#============================================================================================
 
public function TransferCartItemToUserTable()
{
    if(Auth::check() && Auth::user()->role == "user"){
    
    	 foreach(Cart::getContent() as $item){
    	 	$this->saveCartItemIntoRecort($item);
    	 }

	}
	 
}



#============================================================================================


public function saveCartItemIntoRecort($item)
{

	 $product = Product::where('id',$item->attributes->product_id)->first();
	 $old = ShopCartItems::where('product_id',$item->attributes->product_id)
	                     ->where('variant_id',$item->attributes->variant_id)
	                     ->where('user_id',Auth::user()->id);


	 $s= $old->count() > 0 ? $old->first() : new ShopCartItems;

     $quantity = $old->count() > 0 ? ($old->first()->quantity + $item->quantity) : $item->quantity;
         

	 $s->product_id = $item->attributes->product_id;
	 $s->variant_id = $item->attributes->variant_id;
	 $s->price = $item->price;
	 $s->vendor_id = $product->user_id;
	 $s->shop_id = $product->shop_id;
	 $s->quantity = $quantity;
	 $s->type="cart";
	 $s->total = ($quantity * $item->price);
	 $s->user_id = Auth::user()->id;
	 if($s->save()){
	 	Cart::remove($item->id);
	 }
}
















}	