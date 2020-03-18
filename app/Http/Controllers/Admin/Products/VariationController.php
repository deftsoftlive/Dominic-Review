<?php

namespace App\Http\Controllers\Admin\Products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products\Variation;
use App\Traits\Variations\VariationAttributes;
use App\Models\Products\VariationExtra;
class VariationController extends Controller
{
 
public $path = 'admin.products.variations.';
public $folder = 'images/products/categories/';

use VariationAttributes;

#------------------------------------------------------------------------------------
#  index
#------------------------------------------------------------------------------------

public function index($id=0)
{

	  $Variation = Variation::with('ProductVariation')->get();
    $variatant = Variation::find($id);
    $val = !empty($variatant) ? $variatant->name : '';
    $vary = !empty($variatant) && $variatant->value != null ? json_decode($variatant->value) : [];

	return view($this->path.'new',[
        'title' => 'Variation',
        'variations' => $Variation,
        'variation' => $variatant,
        'variation_id' => $id,
        'vary' => $vary,
        'val' => $val
          
	]);
}

#------------------------------------------------------------------------------------
#  store
#------------------------------------------------------------------------------------

public function store(Request $request,$id=0)
{

	if($id == 0){
       $rules = ['name' => 'required|unique:variations'];
	}else{
       $rules = ['name' => 'required|unique:variations,id,'.$id];
  }
	$this->validate($request,$rules);
     
     $v =$id == 0 ? new Variation : Variation::find($id);
     $v->name = trim($request->name);
     $v->value = json_encode($request->extra);
     $v->status =1;
     $v->save();


     return redirect()->route('admin.products.create.variations')->with('messages','New variation is saved');

}


#------------------------------------------------------------------------------------
#  store
#------------------------------------------------------------------------------------

public function fields(Request $request,$type=0,$id=0)
{
    $variation = Variation::with('VariationExtras')->where('type',$type)->first();
	 
	return view($this->path.'fields',[
        'title' => 'Variation',
        'variations' => $variation,
        'VariationExtra' => VariationExtra::find($id),
        'variation_id' => $id,
        'type' => $type,
        'types' => $this->InputTypeAttribute(),
        'obj' => $this
    ]);
}

 
#------------------------------------------------------------------------------------
#  store
#------------------------------------------------------------------------------------

public function postVariation(Request $request,$type=0,$id=0)
{

	if($id == 0){
        $rules = [
       	           'label' => 'required',
       	           'name' => 'required',
       	           'type' => 'required'
       	        ];
	}else{
       $rules = [
       	         'label' => 'required',
                 'name' => 'required',
                 'type' => 'required'
              ];

	}

	 $this->validate($request,$rules);
	 $variation = Variation::where('type',$type)->first();

	 $v2 = VariationExtra::where('type',$type)->where('status',1)
	                                         ->orWhere(function($t) use($request){
	                                         	     $t->where('name',$request->name);
	                                               $t->orWhere('label',$request->label);
                                            });

	 if($v2->count() > 0){
          $name = $request->label == $v2->first()->label ? 'label' : 'name';
          return redirect()
                           ->route('admin.products.custom.fields.variations',$variation->type)
                           ->with($name,'This is alredy taken.');
	 }

     $v =$id == 0 ? new VariationExtra : VariationExtra::find($id);
     $v->name = trim($request->name);
     $v->label = trim($request->label);
     $v->type = trim($request->type);
     $v->slug = $variation->type;
     $v->attributes = json_encode($this->getAttribts($request));
     $v->status =1;
     $v->save();


     return redirect()->route('admin.products.custom.fields.variations',$variation->type)->with('messages','New variation is saved');

}


#---------------------------------------------------------------------------------------------------------
#---------------------------------------------------------------------------------------------------------
#---------------------------------------------------------------------------------------------------------

public function getAttribts($request)
{    
	$arr = [];
	 foreach ($request->attribute_key as $key => $value) {
	     $arr[$value] = !empty($request->attribute_value[$key]) ? $request->attribute_value[$key] : '';
	 }

	 if($request->required == 1){
	 	$arr['required'] = 'true';
	 }


	 return (array)$arr;
}




#----------------------------------------------------------------------------------------------------------
#----------------------------------------------------------------------------------------------------------
#----------------------------------------------------------------------------------------------------------


public function fieldDelete($type,$id)
{
	$v = VariationExtra::find($id);
	$v->status = 0;
	$v->save();
    return redirect()->route('admin.products.custom.fields.variations',$type)->with('messages','New variation is deletedsuccessfully!');
}












}
