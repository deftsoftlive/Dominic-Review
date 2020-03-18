<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Season;
class SeasonController extends Controller
{
	public function index(){
		return view('admin.seasons.index')
		                ->with('title', 'Manage Seasons')
		                ->with('addLink', 'create_seasons');
	}
	/*__________________________________________________________________________________________
	|
	|  Next Function starts
	|___________________________________________________________________________________________
	*/
	public function create()
	{
		 return view('admin.seasons.add') 
	                    ->with('title','Manage Seasons')
	                    ->with('addLink','list_seasons');
	} 
	/*__________________________________________________________________________________________
	|
	|  Next Function starts
	|___________________________________________________________________________________________
	*/
	public function store(Request $request)
	{
		 $this->validate($request,[
	                 'name' => 'required|max:50|unique:seasons',
	                 'description' => 'required'
	                 
		 ],[
	        'name.unique' => 'This season name already exists.'
		 ]);
         
         $storeSeason = new Season($request->all());
         if(($storeSeason->save())){
            return redirect()->route('list_seasons')->with('flash_message','Season has been saved successfully!');
         }
	}
	/*__________________________________________________________________________________________
	|
	|  Next Function starts
	|___________________________________________________________________________________________
	*/
	public function edit($slug)
	{
		$seasons = Season::where('slug', $slug)->first();
		 return !empty($seasons) ?  view('admin.seasons.edit') 
	                    ->with('title','Edit Season')
	                    ->with('seasons',$seasons)
	                    ->with('addLink','list_seasons') : redirect()->back()->with('error_flash_message','Something Wrong!');
	}	
	/*__________________________________________________________________________________________
	|
	|  Next Function starts
	|___________________________________________________________________________________________
	*/
	public function update(Request $request,$slug)
	{
	     $season= Season::where('slug',$slug)->first();
		 $this->validate($request,[
	                 'name' => 'required|max:50|unique:seasons,name,'.$season->id,
	                 'description' => 'required'
	                 
		 ],[
	        'name.unique' => 'This season type is already exists.'
		 ]);
		 $season->update($request->all());
		 $season->save();
		 return redirect()->route('list_seasons')->with('flash_message','Season has been updated successfully!');
	}
	/*__________________________________________________________________________________________
	|
	|  Next Function starts
	|___________________________________________________________________________________________
	*/
    
    public function event_status($slug)
    {
         $season= Season::where('slug',$slug)->first();
         if(!empty($season)){
            $season->status = $season->status == 1 ? 0 : 1;
            $season->save();
                     $msg= $season->status == 1 ? '<b>'.$season->name.'</b> is Activated' : '<b>'.$season->name.'</b> is Deactivated';
                    return redirect(route('list_seasons'))->with('flash_message',$msg);
         }
         return redirect()->back()->with('flash_message','Something Woring!');
    }
	/*__________________________________________________________________________________________
	|
	|  Next Function starts
	|___________________________________________________________________________________________
	*/	
	public function ajax_getEvent()
	{
	 
		$events = Season::select(['name','description', 'status', 'slug'])
		              ->get();
		return datatables()->of($events)
		->addColumn('action', function ($t) {
		return  $this->Actions($t);
		})
		->editColumn('status',function($t){
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
            $text .='<a href="'.route('edit_seasons',$data->slug).'" class="dropdown-item">Edit</a>';
            $text .='<div class="dropdown-divider"></div>';
            $status=$data->status == 0 ? 'Active' : 'In-Active';
            $text .='<a href="'.route('seasons_status',$data->slug).'" class="dropdown-item">'.$status.'</a>';
            $text .='</div>';
            $text .='</div>';
            return $text;
    }		
   
}