<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Category;
use App\VendorCategory;
class CategoryController extends Controller
{
 
#-----------------------------------------------------------------
#  index
#-----------------------------------------------------------------


   public function index()
   {
   	# code...
   }

#-----------------------------------------------------------------
#  assign
#-----------------------------------------------------------------


   public function assign()
   {

       if(Auth::user()->services->count() > 0){
          	return redirect()->route('vendor_dashboard');
       }

   	   $category = Category::where('status',1)->where('parent',0)->orderBy('sorting','ASC')->get();


   	   return view('vendors.category.assign')
   	          ->with('category',$category);
   }



#-----------------------------------------------------------------
#  assign
#-----------------------------------------------------------------


   public function assign2()
   {

        

      $category = Category::where('categories.status',1)
       ->where('categories.parent',0)
       ->orderBy('categories.sorting','ASC')->get();


       return view('vendors.category.assign')
              ->with('category',$category);
   }


#-----------------------------------------------------------------
#  assignCategory
#-----------------------------------------------------------------


   public function assignCategory(Request $request)
   {
      
        $v= \Validator::make($request->all(),[
            'category' => 'required'
        ]);


        if($v->fails()){
        	 return response()->json(['status' => 0 , 'errors' => $v->errors()]);
         }else{

          $status =0;


         	foreach ($request->category as $key => $value) {
         		    
         		 $parent = $this->categorySave($value);
         		 
                 if(!empty($request->subcategory[$value])):
         
                 	   $status++;
                 	   $subcategory = $request->subcategory[$value];
         		    foreach ($subcategory as $k => $v) {
                         $this->categorySave($v[0],$parent);
                            $status++;
         		     }
         		  endif;


         	}

          $cate= VendorCategory::where('user_id',Auth::user()->id);
          if($cate->count() > 0){

              $url = !empty($request->url) ? $request->url : url(route('vendor_dashboard'));
          	  return response()->json(['status' => 1 , 'redirect_links' => $url]);
          }


         }
   	    
   }



public function categorySave($value,$parent=0)
{
	    $v= VendorCategory::where('parent',$parent)->where('category_id',$value)->where('user_id',Auth::user()->id);
        $id = 0;
	    if($v->count() == 0){
	    	$vCate = new VendorCategory;
            $vCate->parent = $parent;
            $vCate->category_id = $value;
            $vCate->user_id = Auth::user()->id;
            $vCate->status = 1;
            $vCate->save();

            $id = $vCate->id;

        }else{
        	$category = $v->first();
        	$id = $category->id;
        }
        return $id;
}


}
