<?php

namespace App\Http\Controllers\Admin;

use App\User;   
use Image;
use Carbon\Carbon;
use Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\NotificationMail;
use Illuminate\Support\Facades\Mail;
use App\Mail\Profile_pic_rejection;

class UserController extends Controller
{
    public function showUsers() {
        $users = User::orderBy('lname')->paginate(30, ['*'], 'users_page');
        $profile_pic_changes = User::where('profile_pic_status',0)->orderByDesc('id')->paginate(30,['*'],'pic_changes_page');
        return view('admin/users/users_show', ['users' => $users, 'search' => '', 'profile_pic_changes' => $profile_pic_changes]);
    }

    public function searchUsers(Request $request) {
        $search_parameter = $request->search;
        
       if($search_parameter != "") {
        $filterUsers = User::where( 'fname', 'LIKE', '%' . $search_parameter . '%' )->orWhere( 'lname', 'LIKE', '%' . $search_parameter . '%' )
        ->get();
        $profile_pic_changes = User::where('profile_pic_status',0)->orderByDesc('id')->get();
        return view('admin/users/users_show', 
        [
            'users' => $filterUsers, 
            'search' => $request->search,
            'profile_pic_changes' => $profile_pic_changes
            ]);
       }
       return $this->showUsers();
    }

    public function showCreateUser() {
        return view('admin/users/user_create');
    }

    public function createUser(Request $request) {

        $validatedData = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'contact_no' => ['required', 'string', 'min:9', 'max:12', 'unique:users'],
        ]);
        $dob    = $request['date_of_birth'];
        $date_of_birth = Carbon::parse($dob)->format('Y-m-d');
        $email_verified_at = date('Y-m-d H:i:s');
        if(!$request->profile_picture) {
            $filename = "user.png";
        }
        else{
            $pic = $request->file('profile_picture');
            $filename = time() . '.' . $pic->getClientOriginalExtension();
            $path = public_path('/upload/images/'.$filename);
            Image::make($pic->getRealPath())->save($path);
        }
        $user = new \App\User([
            'fname' => $request['fname'],
            'lname' => $request['lname'],
            'nick_name' => $request['nick_name'],
            'contact_no' => $request['contact_no'],
            'gender' => $request['gender'],
            'date_of_birth' => $date_of_birth,
            'interesting_facts' => $request['interesting_facts'],
            'role_id' => $request['role'],
            'profile_picture' => $filename,
            'new_profile_picture' => $filename,
            'profile_pic_status' => '1',
            'email' => $request['email'],
            'status' => '1',
            'email_verified_at' => $email_verified_at,
            'password' => Hash::make($request->password),
        ]);
        $user->save();
        Mail::to($request['email'])->send(new NotificationMail($request['email'], $request['password']));

        return redirect()->route('admin.showUsers')
        ->with('flash_message', 'User has been added successfully');
    }

    public function showEditUser($slug) {
        $user = User::findBySlugOrFail($slug);
        return view('admin/users/user_edit', ['user' => $user]);
    }

    public function updateUser(Request $request, $slug) {
        $user = User::findBySlugOrFail($slug);
        $dob    = $request['date_of_birth'];
        $date_of_birth = Carbon::parse($dob)->format('Y-m-d');
        if(!$request->profile_picture) {
            $filename = $user->profile_picture;
        } else {
            $image_path = public_path('/upload/images/'.$user->profile_picture);
              
            $pic = $request->file('profile_picture');
            $filename = time() . '.' . $pic->getClientOriginalExtension();
            $path = public_path('/upload/images/'.$filename);
            Image::make($pic->getRealPath())->save($path);
            if($user->profile_picture != 'user.png') {
                if(file_exists($image_path)) {
                    unlink($image_path);
                }
            }
        }
        if($request['status'] == '2'){
            $email_verified_at = "";
        }
        elseif($request['status'] == '1' && ($user->email_verified_at) ==''){
            $email_verified_at = date('Y-m-d H:i:s');
        }
        else{
            $email_verified_at = $user->email_verified_at;
        }
        $user->update([
                'fname' => $request['fname'],
                'lname' => $request['lname'],
                'contact_no' => $request['contact_no'],
                'gender' => $request['gender'],
                'email' => $request['email'],
                'role_id' => $request['role'],
                'date_of_birth' => $date_of_birth,
                'interesting_facts' => $request['interesting_facts'],
                'status' => $request['status'],
                'nick_name' => $request['nick_name'],
                'email_verified_at' => $email_verified_at,
                'profile_picture' => $filename,
                'new_profile_picture' => $filename,
                'profile_pic_status' => '1',
            ]);

        return redirect()->route('admin.showUsers')
        ->with('flash_message','User has been updated successfully');
    }

    public function destroyUser(Request $request) {
        if ($request->id) {
           $user = User::find($request->id);
           $image_path = public_path('/upload/images/'.$user->profile_picture);
           
           if($user->profile_picture != 'user.png') {
                if(file_exists($image_path)) {
                    unlink($image_path);
                }
            }
           
           $user->delete();
           return response()->json(['message' => 'User has been deleted successfully'], 200);
        }
           return response()->json(['message' => 'User Id is required'], 400);
   }
   public function changeStatus(Request $request){
        $user = User::findBySlugOrFail($request->slug);
        $new_profile_pic = $user->new_profile_picture;
        $user->update([
            'profile_picture' => $new_profile_pic,
            'profile_pic_status' => '1'
        ]);
        return redirect()->route('admin.showUsers')
            ->with('flash_message','User profile picture has been approved successfully');
        }

    public function rejectpicture($slug){
        $user = User::findBySlugOrFail($slug);
        return view('admin/users/profile_pic_reject', ['user' => $user]);
    }
    public function rejected(Request $request, $slug){
        $user = User::findBySlugOrFail($slug);
        $reason = $request->reason;
        $user->update([
            'profile_pic_status' => 2
        ]);
        \Mail::to($user->email)->send(new Profile_pic_rejection($user,$reason));
        return redirect()->route('admin.showUsers')
            ->with('flash_message','User profile picture has been rejected and mail is sent successfully');
    }
}
