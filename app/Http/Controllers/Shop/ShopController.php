<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products\ProductCategory;
use App\Traits\ProductCart\UserCartTrait;
use App\Product;

class ShopController extends Controller
{
    use UserCartTrait;
    
    public $filePath = 'e-shop.';
    public $include = 'e-shop.includes.';


    public function index(Request $request)
    {
        if(!empty(request()->get('selected_cat')) && !empty(request()->get('selected_sub_cat')))
        {
          $sel_cat = request()->get('selected_cat');
          $sel_sub_cat = request()->get('selected_sub_cat');

          $product = \DB::table('products')
                     ->where('category_id', '=', $sel_cat)
                     ->where('subcategory_id', '=', $sel_sub_cat)
                     ->where('status',1)
                     ->orderBy('id','asc')->get();

            // get slug of category
            $cat = \DB::table('product_categories')->where('id',$sel_cat)->first(); 
            $cat_slug = $cat->slug;

            // get slug of sub-cat   
            $sub_cat = \DB::table('product_categories')->where('id',$sel_sub_cat)->first();
            $sub_cat_slug = $sub_cat->slug;

          return redirect('/shop/products/'.$cat_slug.'/'.$sub_cat_slug);      

        }else{

          return view($this->filePath.'index');
        }

    	//return $this->featuredCategory();
    	
    }

#---------------------------------------------------------------------------------------------------------
# Featured Category
#---------------------------------------------------------------------------------------------------------

public function featuredCategory()
{
	 $category = ProductCategory::with('categoryParent')->where('featured',1)
	                          ->where('parent' ,'>',0)
	                          ->where('subparent',0)
	                          ->groupBy('template_id')
	                          ->orderBy('template_id')
	                          ->orderBy('updated_at','DESC')
	                          ->take(4)
	                          ->get();

	 $arr = $this->getFetauredCategory($category);

    $view = view($this->include.'home.featuredCategory')
    ->with('topThree',$arr['topThree'])
    ->with('topforth',$arr['topforth'])
    ->render();

    return response()->json(['status' => 1, 'htm' => $view]);
}

#---------------------------------------------------------------------------------------------------------
# Featured Category
#---------------------------------------------------------------------------------------------------------


public function getFetauredCategory($category)
{

  $topThree ='';
  $topforth ='';
 
  foreach($category as $k => $cate){
    $no  = $cate->template_id;
    $box = $this->templateFeaturedCategory($no);
    $link= route('shop.subcategory',[$cate->categoryParent->slug,$cate->slug]);
    $box = str_replace("[{`image`}]",url($cate->image), $box);
    $box = str_replace("[{`label`}]",$cate->label, $box);
    $box = str_replace("[{`link`}]",$link, $box);

    if($no < 4){
     $topThree .=$box;
    }else{
     $topforth .=$box;
    }


  }
    return ['topThree' => $topThree, 'topforth' => $topforth];


}

public function templateFeaturedCategory($no)
{

	switch ($no) {
		case 1:
			     return '<div class="col-lg-6 col-md-6 col-12 m-b-30">
			               <a href="[{`link`}]"  class="Trending-p-card">
                                    <div class="row no-gutters cstm-flex-row">
                                        <div class="col-6">
                                            <figure class="prioduct-img mr-3"><img src="[{`image`}]"></figure>
                                        </div>
                                            <div class="col-6">
                                            <figcaption class="trend-product-details">
                                                <h2>[{`label`}]</h2>
                                                <div class="small-description">
                                                    <p>as cheap as $0.30</p>
                                                    <p class="sale-status">on sale now </p>
                                                </div>
                                            </figcaption>
                                        </div>
                                    </div>
                                
                                </a>
                            </div>';
			break;

	    case 2:
			     return '<div class="col-lg-6 col-md-6 col-12 m-b-30">
			               
                               <a href="[{`link`}]" class="Trending-p-card">
                                    <div class="row no-gutters cstm-flex-row">
                                            <div class="col-6">
                                            <figcaption class="trend-product-details">
                                                <h2>[{`label`}]</h2>
                                                <div class="small-description">
                                                    <p>as cheap as $0.30</p>
                                                    <p class="sale-status">on sale now </p>
                                                </div>
                                            </figcaption>
                                        </div>
                                        <div class="col-6">
                                            <figure class="prioduct-img mr-3"><img src="[{`image`}]"></figure>
                                        </div>
                                    </div>                              
                                </a>
                            </div>';
			break;


		  case 3:
			     return '<div class="col-lg-12 col-12 m-b-30">
			                
                               <a href="[{`link`}]" class="Trending-p-card">
                                    <div class="row no-gutters cstm-flex-row">
                                        
                                        <div class="col-5">
                                            <figcaption class="trend-product-details">
                                                <h2>[{`label`}]</h2>
                                                <div class="small-description">
                                                    <p>as cheap as $0.30</p>
                                                    <p class="sale-status">on sale now </p>
                                                </div>
                                            </figcaption>
                                        </div>
                                        <div class="col-7">
                                            <figure class="prioduct-img text-right"><img src="[{`image`}]"></figure>
                                        </div>
                                    </div>                              
                               </a>
                            </div>';
			break;

			 case 4:
			     return '<div class="col-lg-4 m-b-30">
                       <a href="[{`link`}]" class="Trending-p-card text-center">
                       
                                    <div class="row no-gutters cstm-flex-row">
                                        <div class="col-12">
                                            <figure class="prioduct-img w-100 text-center"><img src="[{`image`}]"></figure>
                                        </div>
                                            <div class="col-12">
                                            <figcaption class="trend-product-details mt-3 w-100 text-center">
                                                <h2>[{`label`}]</h2>
                                                <div class="small-description">
                                                    <p>as cheap as $0.30</p>
                                                    <p class="sale-status">on sale now </p>
                                                </div>
                                            </figcaption>
                                        </div>
                                    </div>
                             </a>
                      
                        
                    </div>';
			break;
		
		default:
			# code...
			break;
	}
}



#====================================================================================================

public function page($slug)
{
    $page = \App\Models\Shop\ShopPage::where('slug',$slug)->first();

    return view('e-shop.modules.pages.index')->with('page',$page);
}





}
