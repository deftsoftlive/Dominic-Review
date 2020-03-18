<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
class AdminController extends Controller
{
    

#----------------------------------------------------------------------
# Admin Login
#----------------------------------------------------------------------

	public function index()
	{
        if(Auth::check()){
              $url = url(route('request.messages')).'?type=logged';
              return redirect($url);
        }
		return view('admin.login');
	}


#----------------------------------------------------------------------
# Admin Check
#----------------------------------------------------------------------




    public function check(Request $request)
    {
    	$this->validate($request,[
                  'email' => 'required|email',
                  'password' => 'required'
    	]);
      
		 if (Auth::attempt(['email' => $request->email, 'password' => $request->password,'role' => 'admin']))
        {
              //return Auth::user();
              return redirect()->intended('admin');

        }else{
        	return redirect()->route('admin_login')->with('messages','Invalid Email | Password');
        }
	 
    }



#----------------------------------------------------------------------
# Admin Login
#----------------------------------------------------------------------


    public function logout()
    {
    	   Auth::logout();

    	   return redirect()->route('admin_login');
    }



#----------------------------------------------------------------------
# Admin Login
#----------------------------------------------------------------------

public function dashboard(Request $request)
{
     $val = (!empty($request->type)) && $request->type == 2 ? 'e-shop' : 'event';
         
     \Session::put('currentLink',$val);

	return view('admin.dashboard');
}

#----------------------------------------------------------------------
# Admin profile settings
#----------------------------------------------------------------------

	public function profile()
	{
		return view('admin.profile',[
              'title' => 'Settings'

		]);
	}



public function change(Request $request, $id = null)
    { 
        
        $valid = [
            'old_password' => 'required',
            'password' => ['required', 'string', 'min:6', 'max:20', 'confirmed']
        ];

        $valid2 = ['password' => ['required', 'string', 'min:6', 'confirmed']];

        $validation = $id == null ? $valid : $valid2;

        $customMessages = [
            'password.max' => 'The password can not be greater than 20 characters',
        ];

        $this->validate($request, $validation, $customMessages);
        
        $user_id = Auth::User()->id;

        $u = $id != null ? User::where('id',$id)->where('role','super')->first() : User::find($user_id);


        if($id == null){

        

                if (\Hash::check($request->old_password , $u->password))
                 { 
                             $u->password= \Hash::make($request->password);
                             $u->save();
                             return redirect()->back()->with('flash_message',"your password has been changed");
                      
                           
                 }else{
                                 
                                  
                        return redirect()->back()->with('old_password',"invalid old password");
                 }

        }else{

                    $u->password= \Hash::make($request->password);
                     $u->save();
                     return redirect()->back()->with('flash_message',"your password has been changed");

        }
    

         

    }

public function changeProfileImage(Request $request) { 


    $this->validate($request,[
         'image' => ['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048']
    ]);
    $path = 'images/admin/';
     $u = User::find(Auth::user()->id);
     $u->profile_image = $request->hasFile('image') ? uploadFileWithAjax($path,$request->file('image')) : '';

     $u->save();
    
     return redirect()->back()->with('flash_message', "Your Profile image has been changed"); 
}




}