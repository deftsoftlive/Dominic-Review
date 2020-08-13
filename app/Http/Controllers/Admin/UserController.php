<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\CoachDocument;
use App\ParentCoachReq;

class UserController extends Controller
{

	/*******************************
	|
	|	USER MANAGEMENT
	|
	|*******************************/


	/*******************************
	|	User Listing
	|*******************************/
    public function index() {

        $search_first_name = request()->get('search_first_name');
        $search_last_name = request()->get('search_last_name');
        $search_email = request()->get('search_email');

        if(!empty(request()->get('search_first_name')) && !empty(request()->get('search_last_name')) && !empty(request()->get('search_email'))){
          $users = \DB::table('users')
                     ->where('first_name', '=', $search_first_name)
                     ->where('last_name', '=', $search_last_name)
                     ->where('email', '=', $search_email)
                     ->where('role','!=','admin')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])
                     ->paginate(10);

        }else if(!empty(request()->get('search_first_name')) && !empty(request()->get('search_last_name')))
        {
          $users = \DB::table('users')
                     ->where('first_name', '=', $search_first_name)
                     ->where('last_name', '=', $search_last_name)
                     ->where('role','!=','admin')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])
                     ->paginate(10);

        }else if(!empty(request()->get('search_first_name')) && !empty(request()->get('search_email')))
        {
          $users = \DB::table('users')
                     ->where('first_name', '=', $search_first_name)
                     ->where('email', '=', $search_email)
                     ->where('role','!=','admin')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])
                     ->paginate(10);

        }else if(!empty(request()->get('search_last_name')) && !empty(request()->get('search_email')))
        {
          $users = \DB::table('users')
                     ->where('last_name', '=', $search_last_name)
                     ->where('email', '=', $search_email)
                     ->where('role','!=','admin')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])
                     ->paginate(10);

        }else if(!empty(request()->get('search_first_name')))
        {
          $users = \DB::table('users')
                     ->where('first_name', '=', $search_first_name)
                     ->where('role','!=','admin')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])
                     ->paginate(10);

        }else if(!empty(request()->get('search_last_name')))
        {
          $users = \DB::table('users')
                     ->where('last_name', '=', $search_last_name)
                     ->where('role','!=','admin')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])
                     ->paginate(10);

        }else if(!empty(request()->get('search_email')))
        {
          $users = \DB::table('users')
                     ->where('email', '=', $search_email)
                     ->where('role','!=','admin')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])
                     ->paginate(10);
        }else{
          $users = User::select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])->where('role','!=','admin')->paginate(10);
        }

    	return view('admin.user-vendor.users.index',compact('users'));	
    }

    /*******************************
    |   Add User 
    |*******************************/
    public function add_user() {
        return view('admin.user-vendor.users.create');
    }

    /*******************************
    |   Save User 
    |*******************************/
    public function save_user(Request $request) {

        $validatedData = $request->validate([
            'first_name' => ['required', 'string', 'max:25'],
            'last_name' => ['required', 'string', 'max:25'],
            'gender' => ['required'],
            'address' => ['required', 'string', 'max:255'],
            'town' => ['required', 'string', 'max:255'],
            'postcode' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'Numeric','min:7'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
        ]);

        $data = $request->all();

        $user               =    new User;
        $user->role_id      =    $data['role_id'];
        $user->name         =    $data['first_name'].' '.$data['last_name'];
        $user->first_name   =    $data['first_name'];
        $user->last_name    =    $data['last_name'];
        $user->gender       =    $data['gender'];
        $user->date_of_birth=    $data['date_of_birth'];
        $user->address      =    $data['address'];
        $user->town         =    $data['town'];
        $user->postcode     =    $data['postcode'];
        $user->county       =    $data['county'];
        $user->country      =    $data['country'];
        $user->phone_number =    $data['phone_number'];
        $user->email        =    $data['email'];
        $user->updated_status = '1';
        $user->email_verified_at = '2020-03-18 11:10:38';
        $user->save(); 
        
        return redirect('/admin/users')->with('flash_message',' User has been created successfully!');
    }

    /*******************************
	|	Edit User Data
	|*******************************/
    public function edit_users($id) {
    	$user = User::where('id',$id)->first();
        $user_role = $user['role_id'];

        if($user_role == 3)
        {
            $coach_document = CoachDocument::where('coach_id',$id)->get();
        }

    	return view('admin.user-vendor.users.edit',compact('user','coach_document'));
    }

    /*******************************
    |	Update User Data
    |*******************************/
    public function update_users(Request $request) {

        $validatedData = $request->validate([
            'first_name' => ['required', 'string', 'max:25'],
            'last_name' => ['required', 'string', 'max:25'],
            'gender' => ['required'],
            'address' => ['required', 'string', 'max:255'],
            'town' => ['required', 'string', 'max:255'],
            'postcode' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'Numeric','min:7'],
            'email' => ['required', 'string', 'email', 'max:255']
        ]);

        $user = User::find($request->id);

        if($request->updated_status == '1')
        {
            $user->updated_status = '1';
            $user->email_verified_at = '2020-03-18 11:10:38';
        }else{
            $user->updated_status = '0';
            $user->email_verified_at = '2020-03-18 11:10:38';
        }
        
        $user->update($request->all()); 
        return \Redirect::back()->with('flash_message',' User details has been updated successfully!');
    }

    /***********************************************
    |   Change the Verification status of the user
    |***********************************************/ 
    // public function user_Status($id) {
    //  $venue = User::find($id);

    //  if(!empty($venue)){
    //     $venue->updated_status = $venue->updated_status == 1 ? 0 : 1;
    //     $venue->save();
    //     $msg= $venue->updated_status == 1 ? 'Coach <b>'.$venue->first_name.'</b> is Verified' : 'Coach <b>'.$venue->first_name.'</b> is Not Verified';
    //    return redirect('admin/users/coach')->with('flash_message', $msg);
    //  }
    //  return redirect()->back()->with('flash_message', 'Something Went Woring!');
    // }

    /*******************************
    |   Delete User Record
    |*******************************/
    public function delete_user($id) {
        $user = User::find($id);
        $user->delete();
        return \Redirect::back()->with('flash_message',' User details has been deleted successfully!');
    }

    /*******************************
    |   Parent Listing
    |*******************************/
    public function parent_list(){

        $search_first_name = request()->get('search_first_name');
        $search_last_name = request()->get('search_last_name');
        $search_email = request()->get('search_email');

        if(!empty(request()->get('search_first_name')) && !empty(request()->get('search_last_name')) && !empty(request()->get('search_email'))){
          $users = \DB::table('users')
                     ->where('first_name', '=', $search_first_name)
                     ->where('last_name', '=', $search_last_name)
                     ->where('email', '=', $search_email)
                     ->where('role_id','2')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])
                     ->paginate(10);

        }else if(!empty(request()->get('search_first_name')) && !empty(request()->get('search_last_name')))
        {
          $users = \DB::table('users')
                     ->where('first_name', '=', $search_first_name)
                     ->where('last_name', '=', $search_last_name)
                     ->where('role_id','2')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])
                     ->paginate(10);

        }else if(!empty(request()->get('search_first_name')) && !empty(request()->get('search_email')))
        {
          $users = \DB::table('users')
                     ->where('first_name', '=', $search_first_name)
                     ->where('email', '=', $search_email)
                     ->where('role_id','2')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])
                     ->paginate(10);

        }else if(!empty(request()->get('search_last_name')) && !empty(request()->get('search_email')))
        {
          $users = \DB::table('users')
                     ->where('last_name', '=', $search_last_name)
                     ->where('email', '=', $search_email)
                     ->where('role_id','2')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])
                     ->paginate(10);

        }else if(!empty(request()->get('search_first_name')))
        {
          $users = \DB::table('users')
                     ->where('first_name', '=', $search_first_name)
                     ->where('role_id','2')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])
                     ->paginate(10);

        }else if(!empty(request()->get('search_last_name')))
        {
          $users = \DB::table('users')
                     ->where('last_name', '=', $search_last_name)
                     ->where('role_id','2')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])
                     ->paginate(10);

        }else if(!empty(request()->get('search_email')))
        {
          $users = \DB::table('users')
                     ->where('email', '=', $search_email)
                     ->where('role_id','2')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])
                     ->paginate(10);
        }else{
            $users = User::select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','type'])->where('role_id','2')->paginate(10);
        }
        return view('admin.user-vendor.users.parent-index',compact('users')); 
    }

    /*******************************
    |   Coach Listing
    |*******************************/
    public function coach_list(){

        $search_first_name = request()->get('search_first_name');
        $search_last_name = request()->get('search_last_name');
        $search_email = request()->get('search_email');

        if(!empty(request()->get('search_first_name')) && !empty(request()->get('search_last_name')) && !empty(request()->get('search_email'))){
          $users = \DB::table('users')
                     ->where('first_name', '=', $search_first_name)
                     ->where('last_name', '=', $search_last_name)
                     ->where('email', '=', $search_email)
                     ->where('role_id','3')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','enable_inovice','parent_id'])
                     ->paginate(10);

        }else if(!empty(request()->get('search_first_name')) && !empty(request()->get('search_last_name')))
        {
          $users = \DB::table('users')
                     ->where('first_name', '=', $search_first_name)
                     ->where('last_name', '=', $search_last_name)
                     ->where('role_id','3')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','enable_inovice','parent_id'])
                     ->paginate(10);

        }else if(!empty(request()->get('search_first_name')) && !empty(request()->get('search_email')))
        {
          $users = \DB::table('users')
                     ->where('first_name', '=', $search_first_name)
                     ->where('email', '=', $search_email)
                     ->where('role_id','3')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','enable_inovice','parent_id'])
                     ->paginate(10);

        }else if(!empty(request()->get('search_last_name')) && !empty(request()->get('search_email')))
        {
          $users = \DB::table('users')
                     ->where('last_name', '=', $search_last_name)
                     ->where('email', '=', $search_email)
                     ->where('role_id','3')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','enable_inovice','parent_id'])
                     ->paginate(10);

        }else if(!empty(request()->get('search_first_name')))
        {
          $users = \DB::table('users')
                     ->where('first_name', '=', $search_first_name)
                     ->where('role_id','3')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','enable_inovice','parent_id'])
                     ->paginate(10);

        }else if(!empty(request()->get('search_last_name')))
        {
          $users = \DB::table('users')
                     ->where('last_name', '=', $search_last_name)
                     ->where('role_id','3')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','enable_inovice','parent_id'])
                     ->paginate(10);

        }else if(!empty(request()->get('search_email')))
        {
          $users = \DB::table('users')
                     ->where('email', '=', $search_email)
                     ->where('role_id','3')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','enable_inovice','parent_id'])
                     ->paginate(10);
        }else{
            $users = User::select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','enable_inovice','country'])->where('role_id','3')->paginate(10);
        }
        return view('admin.user-vendor.users.coach-index',compact('users')); 
    }

    /*******************************
    |   Children Listing
    |*******************************/
    public function children_list(){

        $search_first_name = request()->get('search_first_name');
        $search_last_name = request()->get('search_last_name');
        $search_email = request()->get('search_email');

        if(!empty(request()->get('search_first_name')) && !empty(request()->get('search_last_name')) && !empty(request()->get('search_email'))){
          $users = \DB::table('users')
                     ->where('first_name', '=', $search_first_name)
                     ->where('last_name', '=', $search_last_name)
                     ->where('email', '=', $search_email)
                     ->where('role_id','4')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])
                     ->paginate(10);

        }else if(!empty(request()->get('search_first_name')) && !empty(request()->get('search_last_name')))
        {
          $users = \DB::table('users')
                     ->where('first_name', '=', $search_first_name)
                     ->where('last_name', '=', $search_last_name)
                     ->where('role_id','4')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])
                     ->paginate(10);

        }else if(!empty(request()->get('search_first_name')) && !empty(request()->get('search_email')))
        {
          $users = \DB::table('users')
                     ->where('first_name', '=', $search_first_name)
                     ->where('email', '=', $search_email)
                     ->where('role_id','4')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])
                     ->paginate(10);

        }else if(!empty(request()->get('search_last_name')) && !empty(request()->get('search_email')))
        {
          $users = \DB::table('users')
                     ->where('last_name', '=', $search_last_name)
                     ->where('email', '=', $search_email)
                     ->where('role_id','4')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])
                     ->paginate(10);

        }else if(!empty(request()->get('search_first_name')))
        {
          $users = \DB::table('users')
                     ->where('first_name', '=', $search_first_name)
                     ->where('role_id','4')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])
                     ->paginate(10);

        }else if(!empty(request()->get('search_last_name')))
        {
          $users = \DB::table('users')
                     ->where('last_name', '=', $search_last_name)
                     ->where('role_id','4')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])
                     ->paginate(10);

        }else if(!empty(request()->get('search_email')))
        {
          $users = \DB::table('users')
                     ->where('email', '=', $search_email)
                     ->where('role_id','4')
                     ->select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','role_id','parent_id'])
                     ->paginate(10);
        }else{
            $users = User::select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country','parent_id'])->where('role_id','4')->paginate(10);
        }
        return view('admin.user-vendor.users.children-index',compact('users')); 
    }

    /**********************************
    |   Unable/Disable Upload Invoice
    |**********************************/
    public function enable_inv_status(Request $request){
      $id = $request->id;
      $st = User::find($id);
      $st->enable_inovice = $request->enable_inovice;   
      $st->save();

      return \Redirect::back()->with('success','Status updated successfully.');
    }

    /*********************************
    |   Linked Coaches 
    |*********************************/
    public function linked_coaches()
    {
        $parentCoachReq = ParentCoachReq::orderBy('id','desc')->paginate(10);
        return view('admin.user-vendor.users.linked-coach',compact('parentCoachReq')); 
    }

}
