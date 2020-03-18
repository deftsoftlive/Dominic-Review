<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Amenity;
use Illuminate\Support\Str;

class AmenityGamesController extends Controller
{
	
   public function index() {
		return view('admin.amenities.index')
		                ->with('title', 'Amenity Types')
		                ->with('addLink', 'create_amenities_type');
	}

	public function game_index() {
		return view('admin.amenities.game_index')
		                ->with('title', 'Amenity Types')
		                ->with('addLink', 'create_amenities_type');
	}	

	/*__________________________________________________________________________________________
	|
	|  Next Function starts
	|___________________________________________________________________________________________
	*/

	public function create()
	{
		 return view('admin.amenities.add') 
	                    ->with('title','Amenity Types')
	                    ->with('addLink','list_amenities');
	} 

	/*__________________________________________________________________________________________
	|
	|  Next Function starts
	|___________________________________________________________________________________________
	*/

	public function store(Request $request)
	{
		 $this->validate($request, [
	                 'name' => 'required|max:10',
	                 'description' => 'required'
	                 
		 ],[
	        'name.unique' => 'This amenity type is already exists.'
		 ]);
		 
         // default status 1
         $request['status'] = 1;
         $storeAmenities = new Amenity($request->all());
         if(($storeAmenities->save())) {
         	$route = $request->type == 'amenity' ? 'list_amenities' : 'list_games';
            return redirect()->route($route)->with('flash_message', Str::ucfirst($request->type).' Type has been saved successfully!');
         }
	}


	/*__________________________________________________________________________________________
	|
	|  Next Function starts
	|___________________________________________________________________________________________
	*/

	public function edit($slug)
	{

		$amenity = Amenity::where('slug', $slug)->first();
		 return !empty($amenity) ?  view('admin.amenities.edit') 
	                    ->with('title','Edit Amenity Type')
	                    ->with('amenity', $amenity)
	                    ->with('addLink','list_amenities') : redirect()->back()->with('error_flash_message','Something Went Wrong!');
	}



	/*__________________________________________________________________________________________
	|
	|  Next Function starts
	|___________________________________________________________________________________________
	*/

	public function update(Request $request,$slug)
	{
	     $amenity = Amenity::where('slug', $slug)->first();
	     // $validatedData = $request->validate([
      //       'name' => ['required', 'string', 'max:10', 'unique:amenities'],
      //       'description' => ['required', 'string', 'max:10'],
      //   ]);
	     
		 // $this->validate($request,[
	  //                'name' => 'required|max:10|unique: amenities,name,'.$amenity->id,
	  //                'description' => 'required'
	                 
		 // ], [
	  //       'name.unique' => 'This amenity type is already exists.'
		 // ]);


		 $amenity->update($request->all());

		 $route = $request->type == 'amenity' ? 'list_amenities' : 'list_games';
		 
		 return redirect()->route($route)->with('flash_message', Str::ucfirst($request->type).' Type has been updated successfully!');
	}


	/*__________________________________________________________________________________________
	|
	|  Next Function starts
	|___________________________________________________________________________________________
	*/
    

    public function amenity_status($slug)
    {
         $amenity= Amenity::where('slug', $slug)->first();

         if(!empty($amenity)){
            $amenity->status = $amenity->status == 1 ? 0 : 1;
            $amenity->save();
                     $msg= $amenity->status == 1 ? '<b>'.$amenity->name.'</b> is Activated' : '<b>'.$amenity->name.'</b> is Deactivated';
                   $route = $amenity->type == 'amenity' ? 'list_amenities' : 'list_games';
                    return redirect(route($route))->with('flash_message', $msg);
         }
         return redirect()->back()->with('flash_message', 'Something Went Woring!');
    }


	/*__________________________________________________________________________________________
	|
	|  Next Function starts
	|___________________________________________________________________________________________
	*/	


	public function ajax_getAmenity()
	{
		$amenities = Amenity::select(['name', 'description', 'status', 'slug'])
		              ->where('type', 'amenity')->get();
		
		return datatables()->of($amenities)
		->addColumn('action', function ($t) {
			return  $this->Actions($t);
		})->editColumn('status', function($t){
			return $t->status == 1 ? 'Active' : 'In-Active';
		})->editColumn('description',function($t){
		return str_limit($t->description, 50);
		})->make(true);
	}

	public function ajax_getGames()
	{
		$amenities = Amenity::select(['name', 'description', 'status', 'slug'])
		              ->where('type', 'game')->get();
		
		return datatables()->of($amenities)
		->addColumn('action', function ($t) {
			return  $this->Actions($t);
		})->editColumn('status', function($t){
			return $t->status == 1 ? 'Active' : 'In-Active';
		})->editColumn('description',function($t){
		return str_limit($t->description, 50);
		})->make(true);
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


            $text .='<a href="'.route('edit_amenity', $data->slug).'" class="dropdown-item">Edit</a>';
            $text .='<div class="dropdown-divider"></div>';
            $status=$data->status == 0 ? 'Active' : 'In-Active';
            $text .='<a href="'.route('amenity_status', $data->slug).'" class="dropdown-item">'.$status.'</a>';


            $text .='</div>';
            $text .='</div>';

            return $text;
    }		
   
}