<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Match;
use App\User;
use App\Message;

class MessageController extends Controller
{
    //
	
	public function inbox(){
		$user_id = \Auth::user()->id;
		//code to show all the matches of the user

		/*$matches = Match::where(function($query) use ($user_id){
	            $query->where('user1_id', '=', $user_id)
	                  ->orWhere('user2_id', '=', $user_id);
	        })->where(['user2_match_status'=>1,'user1_match_status'=>1])->get();
			
			$arr1 = $arr2= $main_arr = $users = array();
			foreach($matches as $match){
				if($user_id == $match->user1_id){
					$arr1[] = $match->user2_id;
				}
				
				if($user_id == $match->user2_id){
					$arr2[] = $match->user1_id;
				}
			}
			
			$main_arr = array_merge($arr1, $arr2);
			
			if( !empty($main_arr) ){
				$users = User::whereIn('id', $main_arr)->get();
			}*/

			//code to show all the matches of the user with whom he/she has had a conversation
			$messages = Message::where(function($query) use ($user_id){
	            $query->where('from_id', '=', $user_id)
	                  ->orWhere('to_id', '=', $user_id);
	        })->get();
			
			$arr1 = $arr2= $main_arr = $users = array();
			foreach($messages as $message){
				if($user_id == $message->from_id){
					$arr1[] = $message->to_id;
				}
				
				if($user_id == $message->to_id){
					$arr2[] = $message->from_id;
				}
			}
			
			$main_arr = array_merge($arr1, $arr2);
			
			if( !empty($main_arr) ){
				$users = User::whereIn('id', $main_arr)->get();
			}

		return view('frontend.messages.inbox', compact('users') );
	}
	
	
	public function matchedUserDetail($slug){
		$current_user_id = \Auth::user()->id;
		$user = User::findBySlugOrFail($slug);
		$messages = Message::where(function($query) use ($current_user_id)
	        {
	            $query->where('to_id', $current_user_id)
	                  ->orWhere('from_id', $current_user_id);
	        })->where(function($query) use ($user)
	        {
	            $query->where('to_id', $user->id)
	                  ->orWhere('from_id', $user->id);
	        })->get();
		$check_status = Message::where('to_id',$current_user_id)->where('from_id', $user->id)->where('status',1)->get();
		if(count($check_status)>0){
			foreach($check_status as $check)
			$check->update([
				'status' => 0 ]);
		}
		//echo "<pre>";print_r($messages->toArray());die;
		return view('frontend/messages/user_detail', compact('user','current_user_id','messages') );
	}
	
	
	public function store(Request $request){
		$postdata = $request->all();
		$slug = $postdata['slug'];
		unset($postdata['slug']);
		unset($postdata['_token']);
		$create = Message::create($postdata);
		if( $create ){
			return redirect()->route('inbox-user-detail', $slug)->with('flash_message', 'Faq has been added successfully');
		}else{
			return redirect()->route('inbox-user-detail', $slug)->with('error_flash_message', 'Faq has been added successfully');
		}		
	}
	
	public function index(){
    	$users = User::where('role_id', 2)->where('status', 1)->orderBy('lname','asc')->paginate(30);
    	return view('admin/inbox/users_show', ['users' => $users, 'search' => '']);
    	}

   	public function userSearch(Request $request) {
        $search_parameter = $request->search;
        
       if($search_parameter != "") {
        $filterUsers = User::where('role_id',2)->where('status',1)->where(function($query) use ($search_parameter)
          {
              $query->where( 'fname', 'LIKE', '%' . $search_parameter . '%' )
                    ->orWhere( 'lname', 'LIKE', '%' . $search_parameter . '%' );
          })->orderBy('lname', 'asc')->paginate(30)->setPath( '' );
        return view('admin/inbox/users_show', 
        [
            'users' => $filterUsers, 
            'search' => $request->search,
            ]);
       }
       return $this->index();
    }
    public function matchedUser($slug){
    	$user1 = User::findBySlugOrFail($slug);
    	$user_id = $user1->id;
		$matches = Match::where(function($query) use ($user_id){
	            $query->where('user1_id', '=', $user_id)
	                  ->orWhere('user2_id', '=', $user_id);
	        })->where(['user2_match_status'=>1,'user1_match_status'=>1])->get();
			
			$arr1 = $arr2= $main_arr = $users = array();
			foreach($matches as $match){
				if($user_id == $match->user1_id){
					$arr1[] = $match->user2_id;
				}
				
				if($user_id == $match->user2_id){
					$arr2[] = $match->user1_id;
				}
			}
			
			$main_arr = array_merge($arr1, $arr2);
			
			if( !empty($main_arr) ){
				$users = User::whereIn('id', $main_arr)->get();
			}

		return view('admin.inbox.matchedUser', compact('users','user1') );
    }

    public function messages($slug,$id){
    	$user1_id = User::findBySlugOrFail($slug)->id;
		$user2_id = $id;
		$messages = Message::where(function($query) use ($user1_id)
	        {
	            $query->where('to_id', $user1_id)
	                  ->orWhere('from_id', $user1_id);
	        })->where(function($query) use ($user2_id)
	        {
	            $query->where('to_id', $user2_id)
	                  ->orWhere('from_id', $user2_id);
	        })->get();
		return view('admin/inbox/messages', compact('user1_id','user2_id','messages') );
    }
}
