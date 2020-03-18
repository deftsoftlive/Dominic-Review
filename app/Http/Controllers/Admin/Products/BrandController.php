<?php

namespace App\Http\Controllers\Admin\Products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products\Brand;

class BrandController extends Controller
{
    public $path = 'admin.products.brands.';


#----------------------------------------------------------------------------------------------------------------
# Show Brand List function
#----------------------------------------------------------------------------------------------------------------

public function index(){
	return view($this->path.'index',[
        'title' => 'Brands',
        'addLink' => route('admin.products.create.brands'),
        'ajaxLink' => url(route('admin.products.brandsAjax')),
    ]);
}


#----------------------------------------------------------------------------------------------------------------
# Brand Add View function
#----------------------------------------------------------------------------------------------------------------


public function create()
{  
    return view($this->path.'add',[
        'title' => 'Brand',
        'addLink' => route('admin.products.list.brands'),
        'ajaxLink' => url(route('admin.products.brandsAjax')),
    ]);
}


#----------------------------------------------------------------------------------------------------------------
# Store Brand function
#----------------------------------------------------------------------------------------------------------------


public function store(Request $request)
{
    //return $request->all();
    $this->validate($request,[
        'name' => 'required|unique:brands',
    ]);

    $v = new Brand;
    $v->name = trim($request->name);
    $v->status = 1;
    $v->save();
    $msg = "Brand is saved Successfully!";
    return redirect()->back()->with('messages',$msg);
}


#----------------------------------------------------------------------------------------------------------------
# Brand Edit View function
#----------------------------------------------------------------------------------------------------------------

public function edit(Request $request,$id)
{
    $p = Brand::find($id);
    return view($this->path.'edit',[
        'title' => 'Brand',
        'brands' => $p,
        'addLink' => route('admin.products.list.brands'),
        'ajaxLink' => url(route('admin.products.brandsAjax')),
    ]);

}

#----------------------------------------------------------------------------------------------------------------
# Brand Update function
#----------------------------------------------------------------------------------------------------------------


public function update(Request $request,$id)
{
    // return $request->all();
    $this->validate($request,[
        'name' => 'required|unique:brands,name,'.$id
    ]);

    $v =Brand::find($id);
    $v->name = trim($request->name);
    $v->save();
    $msg = "Brand is updated Successfully!";
    return redirect()->route('admin.products.list.brands')->with('messages',$msg);
}


#----------------------------------------------------------------------------------------------------------------
# Brand Status Active In-Active function
#----------------------------------------------------------------------------------------------------------------


public function event_status($id){
    $v =Brand::find($id);
    $v->status = $v->status == 1 ? 0 : 1;
    $v->save();
    $msg = "Brand Status Changed Successfully!";
    return redirect()->route('admin.products.list.brands')->with('messages',$msg);
}   

#----------------------------------------------------------------------------------------------------------------
# Brand list search function
#----------------------------------------------------------------------------------------------------------------

    public function Ajax()
	{        
		$events = Brand::select(['id','name','status'])->get();
		return datatables()->of($events)
		->addColumn('action', function ($t) {
		return  $this->Actions($t);
		})
		->editColumn('status',function($t){
		return $t->status == 1 ? 'Active' : 'In-Active';
		})
		->make(true);
	}


/*__________________________________________________________________________________________
|
|  Next Function starts calls from Ajax function, append here all actions
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

        $text .='<a href="'.route('admin.products.edit.brands',$data->id).'" class="dropdown-item">Edit</a>';
        $text .='<div class="dropdown-divider"></div>';
        $status=$data->status == 0 ? 'Active' : 'In-Active';
        $text .='<a href="'.route('admin.products.brands.event_status',$data->id).'" class="dropdown-item">'.$status.'</a>';

        $text .='</div>';
        $text .='</div>';

        return $text;
    }

}
