<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
 
use App\Models\Products\Product;
use Auth;
use App\Models\Vendors\Eshop;
use App\Models\Products\ProductCategory;
use App\Models\Shop\ShopCategory;
use App\Models\Products\ProductInventory;
use App\Models\Products\ProductImage;
class ProductController extends Controller
{
    
    public $filePath = 'e-shop.modules.products.';
    public $include = 'e-shop.includes.products.';

#================================================================================================
#================================================================================================
#================================================================================================

	public function index($cateSlug,$subcate,$childSlug=null)
	{
       $ProductCategory = ProductCategory::with([
       	  'categoryParent',
          'categorySubparent'
         ])
         ->where('slug',$childSlug)
         ->first();
		   return view($this->filePath.'index')
           
            ->with('childCategory',$ProductCategory->categorySubparent->childCategory)
            ->with('categorySubparent',$ProductCategory->categorySubparent)
		        ->with('category',$ProductCategory);
	}

  public function index2($cateSlug,$subcate)
  {
      $ProductCategory = ProductCategory::with([
          'categoryParent',
          'childCategory'
         ])
         ->where('slug',$subcate)
         ->first();

       return view($this->filePath.'index')
            
            ->with('childCategory',$ProductCategory->childCategory)
            ->with('categorySubparent',$ProductCategory)
            ->with('category',$ProductCategory);
  }




#================================================================================================
#================================================================================================
#================================================================================================

	public function detail($slug)
	{

    $p = Product::where('slug',$slug)
                        ->where('shop_id',0)
                        ->where('user_id',1)
                        ->where('create_status',1)
                        ->get();
      // $p = Product::has('eshop')->with('getParentProductData')
                                  
      //                            ->where('slug',$slug)
      //                            ->where('create_status',1)
      //                            ->where('approved_status',1)
      //                            ->where('status',1);

                                 
      // if($p->count() == 0){
      //   return redirect('/shop');
      // }
       $pro = $p->first();




         $product = $pro->parent > 0 ? $pro->getParentProductData : $pro;	
         $relatedProduct=Product::has('eshop')->where('childcategory_id',$product->childcategory_id)
                                  
                                 ->where('create_status',1)
                                 ->where('approved_status',1)
                                 ->where('status',1)
                                 ->take(20)
                                 ->get();
         return view($this->filePath.'detail')
                            ->with('product',$product)
		                        ->with('pro',$pro)
                            ->with('relatedProduct',$relatedProduct);
	}



#=================================================================================================
#=================================================================================================
#=================================================================================================


  public function view_product($id)
  {
     $pro = $product = Product::where(['id'=>$id])->first(); 

        $all_data_fileview_page = view('e-shop.modules.products.quick-view',compact('pro','product'))->render();

        return $all_data_fileview_page;
  }

}
