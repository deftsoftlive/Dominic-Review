<?php

namespace App\Http\Controllers\Admin\Products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products\ProductVariation;
use App\Traits\Variations\ProductVariationMetaData;
class ProductVariationController extends Controller
{
use ProductVariationMetaData;
public $path = 'admin.products.variations.';
public $folder = 'images/products/categories/';

#----------------------------------------------------------------------------------------------------------------
# Product Variations
#----------------------------------------------------------------------------------------------------------------
 
public function index($type)
{
	 
	return view($this->path.'index',[
        'title' => $type,
        'addLink' => route('admin.products.variation',$type),
        'ajaxLink' => url(route('admin.products.variationAjax',$type)),
	]);
}


#----------------------------------------------------------------------------------------------------------------
# Product Variations
#----------------------------------------------------------------------------------------------------------------
 
public function create($type)
{
  $textboxs = $this->varaitionFields($type);
	return view($this->path.'add',[
        'title' => $type,
        'textboxs' => $textboxs,
        'type' => $type,
        'addLink' => route('admin.products.variations',$type),
        'ajaxLink' => url(route('admin.products.variationAjax',$type)),
	]);
}




#----------------------------------------------------------------------------------------------------------------
# Product Variations
#----------------------------------------------------------------------------------------------------------------
 
public function store(Request $request,$type)
{
	//return $request->all();
         $this->validate($request,[
               'name' => 'required'
         ]);

         $vv = ProductVariation::where('name',$request->name)->where('type',$type)->count();

         if($vv > 0){
         	return redirect()->back()->with('name','This name is already taken.')->withInput();
         }

         $v = new ProductVariation;
         $v->name = trim($request->name);
         $v->status = 1;
         $v->type = trim($request->type);
         $v->data = json_encode($request->all());
         $v->save();
         $msg = "Product $type variation is saved Successfully!";
         return redirect()->back()->with('messages',$msg);

}





#----------------------------------------------------------------------------------------------------------------
# Product Variations
#----------------------------------------------------------------------------------------------------------------


public function edit(Request $request,$type,$id)
{
	  $p = ProductVariation::find($id);
     $textboxs = $this->varaitionFields($type,$p);
	return view($this->path.'edit',[
        'title' => $type,
        'textboxs' => $textboxs,
        'type' => $type,
        'variation' => $p,
        'addLink' => route('admin.products.variations',$type),
        'ajaxLink' => url(route('admin.products.variationAjax',$type)),
	]);

}

#----------------------------------------------------------------------------------------------------------------
# Product Variations
#----------------------------------------------------------------------------------------------------------------
 
public function update(Request $request,$type,$id)
{
	    //return $request->all();
         $this->validate($request,[
               'name' => 'required'
         ]);

         $vv = ProductVariation::where('name',$request->name)->where('id','!=',$id)->where('type',$type)->count();

         if($vv > 0){
         	return redirect()->back()->with('name','This name is already taken.')->withInput();
         }

         $v =ProductVariation::find($id);
         $v->name = trim($request->name);
         //$v->status = 1;
         // $v->type = trim($request->type);
         $v->data = json_encode($request->all());
         $v->save();
         $msg = "Product $type variation is updated Successfully!";
         return redirect()->route('admin.products.variations',$type)->with('messages',$msg);

}

#----------------------------------------------------------------------------------------------------------------
# Product Variations
#----------------------------------------------------------------------------------------------------------------

    public function Ajax($type)
	{
	 
		$events = ProductVariation::select(['id','name','type','status'])->where('type',$type)->get();

		return datatables()->of($events)
		->addColumn('action', function ($t) {
		return  $this->Actions($t);
		})
		// ->editColumn('status',function($t){
		// return $t->status == 1 ? 'Active' : 'In-Active';
		// })
		->make(true);
	}


	/*__________________________________________________________________________________________
	|
	|  Next Function starts
	|___________________________________________________________________________________________
	*/
    

    public function Actions($data)
    {
            $text  ='<div class="btn-group">';
            $text .='<button type="button" class="btn btn-primary">Action</button>';
            $text .='<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">';
            $text .='<span class="caret"></span>';
            $text .='<span class="sr-only">Toggle Dropdown</span>';
            $text .='</button>';
            $text .='<div class="dropdown-menu" role="menu" x-placement="top-start" style="position: absolute; transform: translate3d(67px, -165px, 0px); top: 0px; left: 0px; will-change: transform;">';

            $text .='<a href="'.route('admin.products.variation.edit',[$data->type,$data->id]).'" class="dropdown-item">Edit</a>';
            // $text .='<div class="dropdown-divider"></div>';
            // $status=$data->status == 0 ? 'Active' : 'In-Active';
            // $text .='<a href="'.route('event_status',$data->type).'" class="dropdown-item">'.$status.'</a>';

            $text .='</div>';
            $text .='</div>';

            return $text;
    }	
}
