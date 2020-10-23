<?php

namespace App\Http\Controllers\Admin\Products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products\ProductCategory;
use App\Models\Products\ProductVariation;
use App\Models\Products\ProductCategoryVariation;
use App\Models\Products\Variation;
use App\Models\Products\ProductCategoryBrand;
class CategoryController extends Controller
{
   
public $path = 'admin.products.category.';
public $folder = 'images/products/categories/';
   

public function getCategory($parent=0,$subparent=0)
{
	return $category = ProductCategory::with('subCategory')
	                                  ->where('parent',$parent)
	                                  ->where('subparent',$subparent)
	                                  ->OrderBy('sorting','ASC')->get();

}
#--------------------------------------------------------------------------------------------
# Product category listing
#--------------------------------------------------------------------------------------------

	public function index()
	{
		    
		return view($this->path.'index')->with('title','Category')->with('category',$this->getCategory())->with('addLink',route('admin.products.category.create'));
	}
   

#--------------------------------------------------------------------------------------------
# Product category listing
#--------------------------------------------------------------------------------------------

    public function create()
    {
    	return view($this->path.'add')
    	->with('category',$this->getCategory())
    	->with('title','Product Category')
    	->with('addLink',route('admin.products.category.create'));
    }




#--------------------------------------------------------------------------------------------
# Product category listing
#--------------------------------------------------------------------------------------------

public function store(Request $request)
{
	 $this->validate($request,[
              'parent' => 'required',
              'subparent' => 'required',
              'meta_title' => 'required',
              'meta_tag' => 'required',
              'meta_description' => 'required',
              'label' => 'required|max:30',
              // 'label' => 'required|max:30|unique:product_categories',
              'image' => 'image',
       ]);

       $c=new ProductCategory;
       $c->label = trim($request->label);
       $c->parent = trim($request->parent);
       $c->subparent = trim($request->subparent);
       $c->image = $request->hasFile('image') ? uploadFileWithAjax($this->folder,$request->file('image')) : '';
       $c->thumbnail_image = $request->hasFile('thumbnail_image') ? uploadFileWithAjax($this->folder,$request->file('thumbnail_image')) : '';
       $c->meta_title = trim($request->meta_title);
       $c->meta_tag = trim($request->meta_tag);
       $c->meta_description = trim($request->meta_description);
       $c->status = 1;
       $c->featured = $request->featured;
       $c->type = $request->type;
       
       $c->save();

      return redirect(route('admin.products.category'))->with('flash_message','Category saved!');

}


#--------------------------------------------------------------------------------------------
# Product category listing
#--------------------------------------------------------------------------------------------


    # fun
    public function sorting(Request $request)
    {
      

         foreach ($request->list as $key => $category) {
           
             $parent = $this->updatesorting($category['id'],0,0,$key);
               

               if(!empty($category['children'])){

                       foreach ($category['children'] as $k => $sub) {
                         $subparent = $this->updatesorting($sub['id'],$parent,0,$k);

                          if(!empty($sub['children'])){
                               foreach ($sub['children'] as $k1 => $ch) {

                                      $this->updatesorting($ch['id'],$parent,$subparent,$k1);

                               }
                          }
                       }

               }


         }

    }


    public function updatesorting($id,$parent,$subparent,$sort)
    {
       $cate = ProductCategory::find($id);
       if(!empty($cate)){
              
               $cate->parent = $parent;
               $cate->subparent = $subparent;
               $cate->sorting =($sort + 1);
               $cate->save();
               return $cate->id;
       }
    }



#--------------------------------------------------------------------------------------------
# Product category listing
#--------------------------------------------------------------------------------------------

    public function category(Request $request)
    {
    	 $data = ProductCategory::where('parent',$request->parent)->where('subparent',$request->subparent)->OrderBy('sorting','ASC')->get();

    	 return response()->json($data);
    }







#--------------------------------------------------------------------------------------------
# Product category listing
#--------------------------------------------------------------------------------------------

    public function edit(Request $request,$id)
    {

    	 $data = ProductCategory::find($id);
         return view($this->path.'edit')
    	 ->with('category',$this->getCategory())
    	 ->with('subcategory',$this->getCategory($data->parent))
    	 ->with('cate',$data)

    	->with('title','Product Category')
    	->with('addLink',route('admin.products.category.create'));
    }





public function update(Request $request,$id)
{
	 $this->validate($request,[
              'parent' => 'required',
              'subparent' => 'required',
              'meta_title' => 'required',
              'meta_tag' => 'required',
              'meta_description' => 'required',
             'label' => 'required|max:30|unique:product_categories,id,'.$id,
              'category_image' => 'image',
       ]);

       $c=ProductCategory::find($id);
       $c->label = trim($request->label);
       $c->parent = trim($request->parent);
       $c->subparent = trim($request->subparent);
       $c->image = $request->hasFile('category_image') ? uploadFileWithAjax($this->folder,$request->file('category_image')) : $c->image;
       $c->thumbnail_image = $request->hasFile('thumbnail_image') ? uploadFileWithAjax($this->folder,$request->file('thumbnail_image')) : $c->thumbnail_image;
       $c->meta_title = trim($request->meta_title);
       $c->meta_tag = trim($request->meta_tag);
       $c->meta_description = trim($request->meta_description);
       $c->status = 1;
       $c->featured = $request->featured;
       $c->type = $request->type;
       $c->template_id = $request->template;
       
       $c->save();

      return redirect(route('admin.products.category'))->with('flash_message','Category saved!');

}







#-----------------------------------------------------------------------------------------------
# admin.products.category.variation
#-----------------------------------------------------------------------------------------------



public function variation($id)
{
    $cate = ProductCategory::where('id',$id)->where('parent','>',0)->where('subparent',0);

    if($cate->count() == 0){
      return redirect()->back()->with('messages','Something Wrong');

    }

    $variations = Variation::with('ProductVariation')->get();
    $CategoryVariation = new ProductCategoryVariation;

     
    return view($this->path.'variations')
           ->with('category',$cate->first())
           ->with('variations',$variations)
           ->with('CategoryVariation',$CategoryVariation)
           ->with('title','Product Category')
           ->with('addLink',route('admin.products.category.create'));
    

}





#----------------------------------------------------------------------------------------------------
#  post Variation
#----------------------------------------------------------------------------------------------------

public function postVariation(Request $request,$id)
{


  $var = [
      '_token','brands'
  ];

  foreach ($request->all() as $key => $value) {

     if(!in_array($key, $var)){

      $this->saveVariation($value,$key,$id);
     }
  }


if(!empty($request->brands)){
  foreach ($request->brands as $brand_id) {
     $bb = ProductCategoryBrand::where('category_id',$id)->where('brand_id',$brand_id);
     $b = $bb->count() > 0 ? $bb->first() : new ProductCategoryBrand;
     $b->category_id = $id;
     $b->type = 'brands';
     $b->brand_id = $brand_id;
     $b->save();
  }
}




  return response()->json(['status'=> 1,'messages' => 'Product variations are assigned to category variation.']);
   
}



#---------------------------------------------------------------------------------------------------_
# saveVariation
#----------------------------------------------------------------------------------------------------


public function saveVariation($request,$type,$category_id)
{
  $v = ProductCategoryVariation::where('category_id',$category_id)
                               ->where('type',$type)
                               ->delete();
   foreach($request as $key => $value) {
       $this->saveVariationInTable($value,$type,$category_id);                   
   }  
   return 1;                          
  
}




#---------------------------------------------------------------------------------------------------_
# saveVariationInTable
#----------------------------------------------------------------------------------------------------


public function saveVariationInTable($value,$type,$category_id)
{
  $v =new ProductCategoryVariation;
  $v->key = $type;
  $v->type = $type;
  $v->value = $value;
  $v->category_id = $category_id;
  $v->save();
  return $v->id;
}






}
