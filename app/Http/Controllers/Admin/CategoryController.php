<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Auth;
use App\CategoryVaritant;
use App\Event;
use App\Amenity;
use App\CategoryVariation;
use App\Season;
use App\Models\Tools\DefaultTask;
class CategoryController extends AdminController {

    private $path ='images/categories/';

    # category list page

    public function index2()
    { 
    	return view('admin.category.index')
    	->with('addLink','create_category')
    	->with('title','Categories');
    }

    #=================================================================

    public function index()
    {
        $category = Category::with([
          'subCategory' => function($t){ $t->orderBy('sorting', 'ASC'); },
          'subCategory.childCategory'  => function($t){ $t->orderBy('sorting', 'ASC'); } 
        ])
        ->where('parent',0)
        ->orderBy('sorting','ASC')
        ->get();
        return view('admin.category.index1')
        ->with('addLink','create_category')
        ->with('title','Manager Category & SubCategory')
        ->with('category', $category);
    }

    # category create function

    public function create(Request $request)
    {
    	$categories = Category::where('parent',0)->where('status',1)->get();
       return view('admin.category.create')
    	->with('addLink', route('list_category'))
    	->with('category', $categories)
    	->with('title', 'Categories');
    }


    # fun
    public function sorting(Request $request)
    {
      
         foreach ($request->list as $key => $category) {
           
              $this->updatesorting($category['id'],0,0,$key);
               

               if(!empty($category['children'])){

                       foreach ($category['children'] as $k => $sub) {

                             $this->updatesorting($sub['id'],$category['id'],0,$k);
                          if(!empty($sub['children'])){
                               foreach ($sub['children'] as $k1 => $ch) {

                                      $this->updatesorting($ch['id'],$category['id'],$sub['id'],$k1);

                               }
                          }
                       }

               }


         }

    }


    public function updatesorting($id,$parent,$subparent,$sort)
    {
       $cate = Category::find($id);
       if(!empty($cate)){
              
               $cate->parent = $parent;
               $cate->subparent = $subparent;
               $cate->sorting =($sort + 1);
               $cate->save();

       }
    }


    # category create function

    public function store(Request $request)
    {

       $this->validate($request,[
              'parent' => 'required',
              'subparent' => 'required',
              'meta_title' => 'required',
              'meta_tag' => 'required',
              'meta_description' => 'required',
              'label' => 'required',
              'image' => 'image',
       ]);

       $c=new Category;
       $c->label = trim($request->label);
       $c->color = trim($request->color);
       $c->parent = trim($request->parent);
       $c->subparent = trim($request->subparent);
       $c->image = $request->hasFile('image') ? uploadFileWithAjax($this->path,$request->file('image')) : '';
       $c->thumbnail_image = $request->hasFile('thumbnail_image') ? uploadFileWithAjax($this->path,$request->file('thumbnail_image')) : '';
       $c->meta_title = trim($request->meta_title);
       $c->meta_tag = trim($request->meta_tag);
       $c->meta_description = trim($request->meta_description);
       $c->capacity = trim($request->capacity);
       $c->status = 1;
       $c->featured = $request->featured;
       $c->cover_type = $request->cover_type;
       $c->save();

      return redirect(route('list_category'))->with('flash_message','Category saved!');

    }


    # category create function

    public function edit(Request $request,$slug)
    {
    	$categories = Category::where('slug', $slug)->first();

    	if(empty($categories)) {
    		return redirect(Auth::user()->role.'/category/index');
    	}

    	$parent = Category::where('parent',0)->where('slug','!=',$slug)->orderBy('label','ASC')->get();
    	$subparent = Category::where('parent',$categories->parent)
      ->where('subparent',0)->where('parent','!=',0)->where('slug','!=',$slug)->orderBy('label','ASC')->get();


       return view('admin.category.edit')
    	->with('addLink',route('list_category'))
    	->with('category',$categories)
    	->with('parent',$parent)
    	->with('subparent',$subparent)
    	->with('title','Categories');
    }

     public function edit2(Request $request)
    {
      $categories = Category::where('id',$request->category_id)->first();
 
      $parent = Category::where('parent',0)->where('id','!=',$request->category_id)->orderBy('label','ASC')->get();
      $subparent = Category::where('parent',$categories->parent)
      ->where('subparent',0)->where('parent','!=',0)->where('id','!=',$request->category_id)->orderBy('label','ASC')->get();


       $vv= view('admin.category.edit1')
      ->with('addLink',route('list_category'))
      ->with('category',$categories)
      ->with('parent',$parent)
      ->with('subparent',$subparent)
      ->with('title','Categories');

      return response()->json($vv->render());
    }


    # category create function

    public function update(Request $request,$slug)
    {

       $this->validate($request,[
              'parent' => 'required',
              'subparent' => 'required',
              'label' => 'required',
              'meta_title' => 'required',
              'meta_tag' => 'required',
              'meta_description' => 'required',
              'image' => 'image',
       ]);

        $categories = Category::where('slug',$slug)->first();

    	if(empty($categories)){
    		return redirect(Auth::user()->role.'/category/index')->with('error_flash_message','This category slug does not matched!');
    	}

       $c=Category::where('slug',$slug)->first();
       $c->label = trim($request->label);
       $c->color = trim($request->color);
       $c->parent = trim($request->parent);
       $c->subparent = trim($request->subparent);
       $c->image = $request->hasFile('image') ? uploadFileWithAjax($this->path,$request->file('image')) : $categories->image;
       $c->thumbnail_image = $request->hasFile('thumbnail_image') ? uploadFileWithAjax($this->path,$request->file('thumbnail_image')) : $categories->thumbnail_image;
       $c->meta_title = trim($request->meta_title);
       $c->meta_tag = trim($request->meta_tag);
       $c->meta_description = trim($request->meta_description);
       $c->capacity = trim($request->capacity);
       $c->status = 1;
       $c->featured = $request->featured;
        $c->cover_type = $request->cover_type;
       $c->save();

        return redirect(route('list_category'))->with('flash_message','Category updated!');

    }


    # Get Category Id

    public function get_category_id($id){

    	$cat_id = Category::find($id);

    }




    # delete category



  # active de-active

    public function delete($id)
    {
        $c= Category::find($id);
        $c->status = $c->status == 1 ? 0 : 1;
        $c->save();

        $msg= $c->status == 1 ? '<b>'.$c->label.'</b> is Activated' : '<b>'.$c->label.'</b> is Deactivated';
        return redirect(route('list_category'))->with('flash_message',$msg);
    }





   # variations

  public function variations($id)
  {


    //return Category::with('CategoryMaterials','CategoryMaterials.CategoryVariantMaterials')->where('id',$id)->first();


     $category = Category::where('id',$id)->where('parent','!=',0)->where('subparent',0)->first();

     if(empty($category)){
       return redirect(route('list_category'))->with('error_flash_message','Can not be assigned variation to this Category');
     }


     $brands = \App\Brand::orderBy('brand_name','ASC')->where('status',1)->get();
     $techniques = \App\Technique::orderBy('technique_name','ASC')->where('status',1)->get();
     $ProductModel = \App\ProductModel::orderBy('title','ASC')->where('status',1)->get();
     $ProductSize = \App\ProductSize::orderBy('title','ASC')->where('status',1)->get();

     $ProductStyle = \App\ProductStyle::orderBy('title','ASC')->where('status',1)->get();
     $materials = \App\Material::orderBy('title','ASC')->where('status',1)->get();

     $CaptureArea = \App\CaptureArea::where('parent',0)->where('subparent',0)->get();


     return view('admin.category.variations')
      ->with('addLink',Auth::User()->role.'/category/index')
      ->with('techniques',$techniques)
      ->with('brands',$brands)
      ->with('CaptureArea',$CaptureArea)
      ->with('materials',$materials)
      ->with('styles',$ProductStyle)
      ->with('ProductModel',$ProductModel)
      ->with('ProductSize',$ProductSize)
      ->with('category_id',$id)
      ->with('ControllerOject',$this)
      ->with('title',$category->label."'s Variatants");
  }

  public function category_variations(Request $request, $slug) {
    $category = Category::FindBySlugOrFail($slug);
    $events = Event::where('status', 1)->get();
    $seasons = Season::where('status', 1)->get();
    $amenities = Amenity::where('type', 'amenity')->where('status', 1)->get();
    $games = Amenity::where('type', 'game')->where('status', 1)->get();
    $category_variation = CategoryVariation::where('category_id', $category->id)->get();

    return view('admin.category.variations')
    ->with('addLink',route('list_category'))
    ->with('title', 'Add Category Variatants')
    ->with('category', $category)
    ->with('seasons', $seasons)
    ->with('events', $events)
    ->with('amenities', $amenities)
    ->with('category_variation', $category_variation)
    ->with('games', $games);
  }

  public function category_variations_save(Request $request, $slug) {
    $category = Category::FindBySlugOrFail($slug);

    if(!empty($request->events) && count($request->events)) {
        CategoryVariation::where(['category_id' => $category->id, 'type'=> 'event'])->delete();
      foreach ($request->events as $key => $value) {
        CategoryVariation::create([
          'category_id' => $category->id,
          'variant_id' => $value,
          'type' => 'event'
        ]);        
      }
    }

    if(!empty($request->amenities) && count($request->amenities)) {
      CategoryVariation::where(['category_id' => $category->id, 'type'=> 'amenity'])->delete();
      foreach ($request->amenities as $key => $value) {
        CategoryVariation::create([
          'category_id' => $category->id,
          'variant_id' => $value,
          'type' => 'amenity'
        ]);        
      }
    }

    if(!empty($request->games) && count($request->games)) {
      CategoryVariation::where(['category_id' => $category->id, 'type'=> 'game'])->delete();
      foreach ($request->games as $key => $value) {
        CategoryVariation::create([
          'category_id' => $category->id,
          'variant_id' => $value,
          'type' => 'game'
        ]);        
      }
    }

    if(!empty($request->seasons) && count($request->seasons)) {
      CategoryVariation::where(['category_id' => $category->id, 'type'=> 'seasons'])->delete();
      foreach ($request->seasons as $key => $value) {
        CategoryVariation::create([
          'category_id' => $category->id,
          'variant_id' => $value,
          'type' => 'seasons'
        ]);        
      }
    }

      return redirect()->route('list_category')->with('flash_message', 'Category has been saved successfully!');

  }

public function checkCheckBrand($key,$category_id,$brand_id)
{
   $count = CategoryVaritant::where('category_id',$category_id)
                     ->where('variantValue',$brand_id)
                     ->where('variantKey',$key)
                     ->count();

   return $count == 1 ? 'checked' : '';
}







public function variationStore(Request $request,$id)
{
     $category = Category::where('id',$id)->where('parent','>',0)->where('subparent',0)->count();

     if($category == 0){
       return response()->json(0);
     }else{

       /*-------------------------------------------------------------------------------------------
       |
       |  BRANDS
       |--------------------------------------------------------------------------------------------
       */
                $v=CategoryVaritant::where('category_id',$id)->where('variantKey','brands')->delete();
         if(!empty($request->brand)){
                


                foreach ($request->brand as $k) {
                   
                   $v =new CategoryVaritant;

                   $v->category_id = $id;
                   $v->variantKey = 'brands';
                   $v->variantValue = $k;
                   $v->save();
                }

         }

      /*-------------------------------------------------------------------------------------------
       |
       |  techniques
       |--------------------------------------------------------------------------------------------
       */
                $v=CategoryVaritant::where('category_id',$id)->where('variantKey','techniques')->delete();
         if(!empty($request->techniques)){
                


                foreach ($request->techniques as $k) {
                   
                   $v =new CategoryVaritant;

                   $v->category_id = $id;
                   $v->variantKey = 'techniques';
                   $v->variantValue = $k;
                   $v->save();
                }

         } 

       /*-------------------------------------------------------------------------------------------
       |
       |  styles
       |--------------------------------------------------------------------------------------------
       */
                $v=CategoryVaritant::where('category_id',$id)->where('variantKey','styles')->delete();
         if(!empty($request->styles)){
                


                foreach ($request->styles as $k) {
                   
                   $v =new CategoryVaritant;

                   $v->category_id = $id;
                   $v->variantKey = 'styles';
                   $v->variantValue = $k;
                   $v->save();
                }

         } 



       /*-------------------------------------------------------------------------------------------
       |
       |  models
       |--------------------------------------------------------------------------------------------
       */
                $v=CategoryVaritant::where('category_id',$id)->where('variantKey','models')->delete();
         if(!empty($request->ProductModel)){
                


                foreach ($request->ProductModel as $k) {
                   
                   $v =new CategoryVaritant;

                   $v->category_id = $id;
                   $v->variantKey = 'models';
                   $v->variantValue = $k;
                   $v->save();
                }

         } 





       /*-------------------------------------------------------------------------------------------
       |
       |  sizes
       |--------------------------------------------------------------------------------------------
       */
                $v=CategoryVaritant::where('category_id',$id)->where('variantKey','sizes')->delete();
         if(!empty($request->sizes)){
                


                foreach ($request->sizes as $k) {
                   
                   $v =new CategoryVaritant;

                   $v->category_id = $id;
                   $v->variantKey = 'sizes';
                   $v->variantValue = $k;
                   $v->save();
                }

         } 
       /*-------------------------------------------------------------------------------------------
       |
       |  materials
       |--------------------------------------------------------------------------------------------
       */


         $v=CategoryVaritant::where('category_id',$id)->where('variantKey','materials')->delete();
         if(!empty($request->materials)){
                


                foreach ($request->materials as $k) {
                   
                   $v =new CategoryVaritant;

                   $v->category_id = $id;
                   $v->variantKey = 'materials';
                   $v->variantValue = $k;
                   $v->save();
                }

         } 
       /*-------------------------------------------------------------------------------------------
       |
       |  CaptureArea
       |--------------------------------------------------------------------------------------------
       */


         $v=CategoryVaritant::where('category_id',$id)->where('variantKey','CaptureArea')->delete();
         if(!empty($request->CaptureArea)){
                


                foreach ($request->CaptureArea as $k) {
                   
                   $v =new CategoryVaritant;

                   $v->category_id = $id;
                   $v->variantKey = 'CaptureArea';
                   $v->variantValue = $k;
                   $v->save();
                }

         } 









         return response()->json(1);
     }

}




# jax


   # ajax

    public function ajax()
    {
//return datatables()->of(\DB::table('users'))->toJson();
         $users = Category::with('category_subparent','category_parent')->select(['id','label','slug', 'status','parent','subparent'])
                              ->get();

        return datatables()->of($users)
            ->addColumn('action', function ($t) {
                return  $this->Actions($t);
            })
             ->addColumn('category', function ($data) {
                $text = !empty($data->category_parent) ? $data->category_parent->label : '/';
                return $text .=!empty($data->category_subparent) ? ' / '.$data->category_subparent->label : '';
            })
            ->editColumn('status',function($t){
                return $t->status == 1 ? 'Activated' : 'Deactivated';
            })
            // ->editColumn('image', '<img src="/images/{{ $image }}" class="small-img">')
            // ->editColumn('description',' {{ substr($description,0.120) }} @if(strlen($description) > 120) <a href="" class="show_description" id="{{$id}}">Read More</a> @endif')
            ->removeColumn('id')
            ->make(true);
    }



   # actions

    public function Actions($data)
    {
            $text  ='<div class="btn-group">';
            $text .='<button type="button" class="btn btn-default">Action</button>';
            $text .='<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">';
            $text .='<span class="caret"></span>';
            $text .='<span class="sr-only">Toggle Dropdown</span>';
            $text .='</button>';
            $text .='<div class="dropdown-menu" role="menu" x-placement="top-start" style="position: absolute; transform: translate3d(67px, -165px, 0px); top: 0px; left: 0px; will-change: transform;">';


            $text .='<a href="'.route('edit_category',$data->slug).'" class="dropdown-item '.Actions('edit_category').'">Edit</a>';

            $text .='<a href="'.route('edit_category',$data->slug).'" class="dropdown-item '.Actions('edit_category').'">View</a>';
            $text .='<div class="dropdown-divider"></div>';
            $status=$data->status == 1 ? 'Deactive' : 'Active';
           $text .='<a href="'.route('delete_category',$data->id).'" class="dropdown-item '.Actions('delete_category').'">'.$status.'</a>';

              $text .= '<div class="dropdown-divider"></div>';
              if(!empty($data->category_parent) && empty($data->category_subparent)): 
                
                $text .='<a href="'.route('variation_category',$data->id).'" class="dropdown-item '.Actions('variation_category').'">Add Variants</a>';

               endif;  
            $text .='</div>';
            $text .='</div>';

            return $text;
    }



    public function deleteImage($id)
    {
        $variant = Category::find($id);

         $file_path = public_path().'/'.$variant->image;

            if($variant->image != "") :

                    if (file_exists( $file_path )) {

                            unlink($file_path); 

                    } 
                    $variant->image = "";
                    $variant->save();

            endif;

        return response()->json(array());


     }


 
#======================================================================================
#======================================================================================

public function taskList()
{
  
     $categories = \App\Event::where('type','event')->where('status',1)->get();
       return view('admin.tasks.index')
      ->with('addLink', route('admin.category.tasks.add'))
      ->with('category', $categories)
      ->with('title', 'Default Task For Checklist');
}


 
#======================================================================================
#======================================================================================

public function tasks()
{
  
     $categories = \App\Event::where('type','event')->where('status',1)->get();
       return view('admin.tasks.add')
      ->with('addLink', route('admin.category.taskList'))
      ->with('category', $categories)
      ->with('title', 'Default Task For Checklist');
}




public function postTasks(Request $request)
{ 
    $this->validate($request,[
        'task' => 'required',
        'description' => 'required',
        'parent' => 'required',
         
    ]);

    $event = DefaultTask::where('parent',$request->parent)
                        ->where('event_id',$request->event)
                        ->where('task',$request->task)->count();
    if($event > 0 && !empty($request->event)){
      return redirect()->back()->with('task','This value already exists')->withInput();
    }else{

        $c = new DefaultTask;
        $c->parent = $request->parent;
        $c->task = $request->task;
        $c->description = $request->description;
        $c->event_id = !empty($request->event) ? $request->event : 0;
        $c->save();
    }
    return redirect()->back()->with('messages','Task is saved successfully');

}
public function editTask($id)
{
  
      $categories = \App\Event::where('type','event')->where('status',1)->get();
      $task = DefaultTask::find($id);
       $CheckList = DefaultTask::where('event_id',$task->event_id)
                           ->where('parent',0)
                           ->orderBy('task','ASC')
                           ->get();
       return view('admin.tasks.edit')
          ->with('addLink', route('admin.category.taskList'))
          ->with('CheckList', $CheckList)
          ->with('task', $task)
          ->with('category', $categories)
          ->with('title', 'Default Task For Checklist');
}




public function updateTask(Request $request,$id)
{ 
    $this->validate($request,[
        'task' => 'required',
        'description' => 'required',
        'parent' => 'required',
         
    ]);

    $event = DefaultTask::where('parent',$request->parent)
                        ->where('event_id',$request->event)
                        ->where('id','!=',$id)
                        ->where('task',$request->task)->count();
    if($event > 0 && !empty($request->event)){
      return redirect()->back()->with('task','This value already exists')->withInput();
    }else{

        $c = DefaultTask::find($id);
        $c->parent = $request->parent;
        $c->task = $request->task;
        $c->description = $request->description;
        $c->event_id = !empty($request->event) ? $request->event : 0;
        $c->save();
    }
    return redirect()->route('admin.category.taskList')->with('messages','Task is updated successfully');

}


#======================================================================================
#======================================================================================




public function getTaskCategory(Request $request)
{ 
   $CheckList = DefaultTask::where('event_id',$request->category_id)
                           ->where('parent',0)
                           ->orderBy('task','ASC')
                           ->get();
   return response()->json($CheckList);
}





#===============================================================================================
#===============================================================================================
#===============================================================================================


 public function ajax2()
    {
 
         $users = DefaultTask::with('event','parentCategory')->select('*')->get();
                       return datatables()->of($users)
                            ->addColumn('action', function ($t) {
                                return  $this->Actions2($t);
                            })
                             ->addColumn('category', function ($t) {
                                return  $t->parent > 0 ? $t->parentCategory->task : 'N/A';
                            })
                            ->addColumn('event_name', function ($data) {
                                return !empty($data->event) ? $data->event->name : 'General';
                            })
                           // ->removeColumn('id')
                            ->make(true);
    }



   # actions

    public function Actions2($data)
    {
            $text  ='<div class="btn-group">';
            $text .='<button type="button" class="btn btn-default">Action</button>';
            $text .='<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">';
            $text .='<span class="caret"></span>';
            $text .='<span class="sr-only">Toggle Dropdown</span>';
            $text .='</button>';
            $text .='<div class="dropdown-menu" role="menu" x-placement="top-start" style="position: absolute; transform: translate3d(67px, -165px, 0px); top: 0px; left: 0px; will-change: transform;">';
            $text .='<a href="'.route('admin.category.tasks.edit',$data->id).'">Edit</a>';
            $text .='</div>';
            $text .='</div>';

            return $text;
    }






}
