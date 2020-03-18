<?php

namespace App\Models\Shop;
use Illuminate\Database\Eloquent\Model;
use App\Models\Review;
use Auth;
class ShopCartItems extends Model
{
   
 protected $fillable = [
  'payment_status',
  'type',
  'orderID',
  'order_id'
];

#========================================================================================================


	public function product()
	{
		return $this->belongsTo('App\Models\Products\Product','product_id','id');
	}


  public function reviews()
  {
    return $this->belongsTo('App\Models\Review','order_id','id')->where('type','products');
  }


  public function orderReview()
  {
    return Review::where('order_id',$this->id)
                 ->where('product_id',$this->product_id)
                 ->where('user_id',$this->user_id)
                 ->where('type','products');
  }


  public function VariantProduct()
  {
    return $this->belongsTo('App\Models\Products\Product','variant_id','variant_id');
  }


    public function choosedVariation()
	{
		return $this->belongsTo('App\Models\Products\ProductAssignedVariation','variant_id','id')->where('parent',0);
	}
 


   public function getOrderOfSingleVendor()
   {
   	    return $this->hasMany($this,'vendor_id','vendor_id');
   }
   

    public function vendor()
    {
       return $this->belongsTo('App\User','vendor_id','id');
    }



    public function order()
    {
       return $this->belongsTo('App\Models\Shop\ShopOrder','order_id','id');
    }

    
    public function checkOutOfStockProductValidation()
    {
          $user_id = Auth::check() && Auth::user()->role == "user" ? Auth::user()->id : 0;
          $items = $this->with('VariantProduct','product')
                        ->where('user_id',$user_id)
                        ->where('type','cart')
                        ->get();
          $status = 1;
          foreach ($items as $item) {
                    $product = $item->variant_id > 0 ? $item->VariantProduct : $item->product;
                    $stock = $product->checkStock(); 
                    if($stock != null){
                          $total = $stock->stock >= $item->quantity ? ($stock->stock - $item->quantity) : 0;
                          if($total <= 0){
                              $status = 0;
                          }
                    }                    
          }
          return $status;
    }


}
