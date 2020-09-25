<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shop\ShopOrder;
use App\Models\Shop\ShopCartItems;
use App\Badge;
use App\UserBadge;
use App\Course;
use App\User;
use App\TestScore;

class BadgeController extends Controller
{
    /*----------------------------------------
    |
    |   BADGE MANAGEMENT
    |
    |----------------------------------------*/


    /*----------------------------------------
    |   Listing of badges
    |----------------------------------------*/ 
    public function badge_index() {
        $badge = Badge::select(['id','name','image','description','end_date','points','status','slug','sort'])->orderBy('sort','asc')->paginate(10);
    	return view('admin.badge.index',compact('badge'))
    	->with(['name' => 'Badge Management', 'addLink' => 'admin.badge.showCreate']);
    }

    public function badge_showCreate() {
    	return view('admin.badge.create')->with(['name' => 'Create Badge', 'addLink' => 'admin.badge.list']);
    }

    /*----------------------------------------
    |   Listing of active badges
    |----------------------------------------*/ 
    public function badge_active() {
        $badge = Badge::select(['id','name','image','description','end_date','points','status','slug','sort'])->where('status',1)->orderBy('sort','asc')->paginate(10);
        return view('admin.badge.active',compact('badge'))
        ->with(['name' => 'Badge Management', 'addLink' => 'admin.badge.showCreate']);
    }

    /*----------------------------------------
    |   Listing of in-active badges
    |----------------------------------------*/ 
    public function badge_inactive() {
        $badge = Badge::select(['id','name','image','description','end_date','points','status','slug','sort'])->where('status',0)->orderBy('sort','asc')->paginate(10);
        return view('admin.badge.inactive',compact('badge'))
        ->with(['name' => 'Badge Management', 'addLink' => 'admin.badge.showCreate']);
    }

    /*----------------------------------------
    |   Add badge 
    |----------------------------------------*/ 
    public function badge_create(Request $request) {    
    	$validatedData = $request->validate([
            'name' => ['required', 'max:50'],
            'description' => ['required'],
            'end_date' => ['required','date'],
            'points' => ['required','numeric']
        ]);

    	if ($request->hasFile('image')) {
	        $image = $request->file('image');
	        $filename = time().'.'.$image->getClientOriginalExtension();
	        $destinationPath = public_path('/uploads');
	        $image->move($destinationPath, $filename);
    	}

    	Badge::create([
    		'name' => $request['name'],
            'end_date' => $request['end_date'],
    		'description' => $request['description'],
    		'image' => isset($filename) ? $filename : '',
    		'points' => $request['points']
    	]);
    	return redirect()->route('admin.badge.list')->with('flash_message', 'Badge has been created successfully!');
    }

    /*----------------------------------------
    |   Edit badge content
    |----------------------------------------*/ 
    public function badge_showEdit($slug) {
    	$venue = Badge::FindBySlugOrFail($slug);
    	return view('admin.badge.edit')
    	->with(['venue' => $venue, 'name' => 'Edit Badge', 'addLink' => 'admin.badge.list']);
    }

    /*----------------------------------------
    |   Update badge content
    |----------------------------------------*/ 
    public function badge_update(Request $request, $slug) {    
    	$validatedData = $request->validate([
            'name' => ['required', 'max:50'],
            'description' => ['required'],
            'end_date' => ['required','date'],
            'points' => ['required','numeric']
        ]);

    	$venue = Badge::FindBySlugOrFail($slug);
    	$filename = $venue->image;
    	if ($request->hasFile('image')) {
	        $image = $request->file('image');
	        $filename = time().'.'.$image->getClientOriginalExtension();
	        $destinationPath = public_path('/uploads');
	        $img_path = public_path().'/uploads/'.$venue->image;
	     //    if (file_exists($img_path)) {
		    //     unlink($img_path);
		    // }
	        $image->move($destinationPath, $filename);
    	}
    	$venue->update([
    		'name' => $request['name'],
            'end_date' => $request['end_date'],
    		'description' => $request['description'],
    		'image' => isset($filename) ? $filename : '',
    		'points' => $request['points']
    	]);
    	return redirect()->route('admin.badge.list')->with('flash_message', 'Badge has been updated successfully!');
    }

    /*----------------------------------------
    |   Delete Badge
    |----------------------------------------*/
    public function delete_badge($id) {
        $bd = Badge::find($id);
        $bd->delete();
        return \Redirect::back()->with('flash_message','Badge has been deleted successfully!');
    }

    /*----------------------------------------
    |   Change the status of the badge
    |----------------------------------------*/ 
    public function badge_Status($slug) {
     $venue = Badge::FindBySlugOrFail($slug);

     if(!empty($venue)){
        $venue->status = $venue->status == 1 ? 0 : 1;
        $venue->save();
        $msg= $venue->status == 1 ? 'Badge of <b>'.$venue->name.'</b> is Activated' : 'Badge of <b>'.$venue->name.'</b> is Deactivated';
       return redirect(route('admin.badge.list'))->with('flash_message', $msg);
     }
     return redirect()->back()->with('flash_message', 'Something Went Woring!');
    }

    /*----------------------------------------
    |   List of players who purchased courses
    |----------------------------------------*/
    public function players_listing()
    {   
        $user_id = request()->get('user_id');
        $season = request()->get('season'); 
        // $age_group = request()->get('age_group');

        // dd($season, $user_id, $age_group);

        if(!empty($season) && empty($user_id))
        {
            // $course = Course::where('season',$season)->get(); 
            // $cour_id[] = array();    
            // foreach($course as $cour)
            // {
            //     $cour_id[] = $cour->id;   
            // }

            // if(count($course)>0)
            // {
                $purchase_course = \DB::table('shop_cart_items')->where('shop_type','course')->where('course_season',$season)->where('orderID','!=',NULL)->groupBy('child_id')->paginate(10);
            // }else{
            //     $purchase_course = \DB::table('shop_cart_items')->where('shop_type','course')->where('course_season',$season)->where('orderID','!=',NULL)->groupBy('child_id')->paginate(10);
            // }

        }elseif(!empty($user_id) && empty($season))
        {
            $purchase_course = \DB::table('shop_cart_items')->where('shop_type','course')->where('child_id',$user_id)->where('orderID','!=',NULL)->groupBy('child_id')->paginate(10);

        }elseif(!empty($user_id) && !empty($season))
        {
            $course = Course::where('season',$season)->get(); 
            $shop[] = array();    
            foreach($course as $cour)
            {
                $cour_id[] = $cour->id;   
            }
            
            $purchase_course = \DB::table('shop_cart_items')->where('shop_type','course')->where('course_season',$season)->where('child_id',$user_id)->where('orderID','!=',NULL)->groupBy('child_id')->paginate(10);

        }else{

            $purchase_course = \DB::table('shop_cart_items')->where('shop_type','course')->where('child_id','!=',NULL)->where('orderID','!=',NULL)->where('order_id','!=',NULL)->groupBy('child_id')->paginate(10);
        }

        // dd($purchase_course);

        return view('admin.badge.assign-badge',compact('purchase_course'))
        ->with(['name' => 'Players Management', 'addLink' => 'admin.badge.showCreate']);
    }

    /*----------------------------------------
    |   Assign badges to players
    |----------------------------------------*/
    public function assign_badge($season,$child_id){  
        $purchase_course = \DB::table('shop_cart_items')->where('course_season',$season)->where('shop_type','course')->where('orderID','!=',NULL)->where('child_id',$child_id)->get();
        return view('admin.badge.badge-to-player',compact('purchase_course','child_id','season'));
    }

    public function save_assign_badge(Request $request){  

        if(!empty($request->badges))
        {
            $purchase_course = \DB::table('shop_cart_items')->where('shop_type','course')->where('child_id',$request->child_id)->where('orderID','!=',NULL)->where('order_id','!=',NULL)->groupBy('child_id')->first();

            // All selected badges
            $co_data = $request->badges;  
            if(!empty($co_data)){
                $badges = implode(',', $request->badges); 
            }else{
                $badges ="";
            }

            $selected_badges = explode(',',$badges);
            $points = array();

            foreach($selected_badges as $data=>$value){
                $badge =Badge::where('id',$value)->first(); 
                $points[] = $badge->points;
            }

            $total_points = array_sum($points);       

            $user_badge = UserBadge::where('user_id',$request->child_id)->first(); 

            if(!empty($user_badge))
            {
                // dd($user_badge);
                // if($user_badge->user_id == $request->child_id && $user_badge->season_id == $request->season_id)
                // {
                    $ca = UserBadge::find($user_badge->id);
                    $ca->user_id = $request->child_id;
                    $ca->season_id = $request->season_id; 
                    $ca->badges = $badges;
                    $ca->badges_points = $total_points;
                    $ca->save();

                   // UserBadge::where('season_id', $request->season_id)->where('user_id', $request->child_id)->update(array('badges' => $badges, 'badges_points' => $total_points));    
                // }
            }else{

                    $ca = new UserBadge;
                    $ca->user_id = $request->child_id;
                    $ca->season_id = $request->season_id; 
                    $ca->badges = $badges;
                    $ca->badges_points = $total_points;
                    $ca->save();
                }

            return redirect()->route('players_list',compact('purchase_course'))->with('flash_message','Badges assigned successfully.');
        }
        else
        {
           return \Redirect::back()->with('error','Badges field is required.'); 
        }
        
    }
    
    /*----------------------------------------
    |   Update badge sorting number 
    |-----------------------------------------*/
    public function update_badge_sort($sort_no,$badge_id) 
    {   
        $badge = Badge::find($badge_id);
        $badge->sort = $sort_no;
        $badge->save();

        $data = array(
            'sort_no'   => $badge,
        );

        echo json_encode($data);
    }

    /*----------------------------------------
    |   Badges Filter
    |-----------------------------------------*/
    public function selectedSeason(Request $request)
    {
        $season = $request->selectedSeason; 
        $shop = ShopCartItems::where('course_season',$request->selectedSeason)->where('orderID','!=',NULL)->get(); 

        if(count($shop) > 0)
        {
          // $output = '<option value="">All</option>';
          $output = '';

          foreach($shop as $sh)
          {
            $course = Course::where('season',$sh->course_season)->where('id',$sh->product_id)->get();

            foreach($course as $sh)
            {
              $output .= '<option value="'.$sh->id.'">'.$sh->title.'</option>';
            }
          }
        }else{
            $output = '<option value="">No data exists</option>';
        }

        $data = array(
            'option'   => $output,
        );

        echo json_encode($data);
        }

}