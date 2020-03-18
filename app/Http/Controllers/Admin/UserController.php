<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

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
    	$users = User::select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country'])->where('role','!=','admin')->paginate(10);
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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
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
        $user->save(); 
        
        return redirect('/admin/users')->with('flash_message',' User has been created successfully!');
    }

    /*******************************
	|	Edit User Data
	|*******************************/
    public function edit_users($id) {
    	$user = User::where('id',$id)->first();
    	return view('admin.user-vendor.users.edit',compact('user'));
    }

    /*******************************
    |	Update User Data
    |*******************************/
    public function update_users(Request $request) {
        $user = User::find($request->id);
        $user->updated_status = $request->updated_status;
        $user->update($request->all()); 
        return \Redirect::back()->with('flash_message',' User details has been updated successfully!');
    }

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
        $users = User::select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country'])->where('role_id','2')->paginate(10);
        return view('admin.user-vendor.users.parent-index',compact('users')); 
    }

    /*******************************
    |   Coach Listing
    |*******************************/
    public function coach_list(){
        $users = User::select(['id','role', 'email','name','date_of_birth','phone_number','gender','address','town','postcode','country'])->where('role_id','3')->paginate(10);
        return view('admin.user-vendor.users.coach-index',compact('users')); 
    }

}
