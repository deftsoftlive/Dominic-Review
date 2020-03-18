<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Session;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
   protected function authenticated(Request $request, $user){
	if( Session::has('url_type') ){ 
		 Session::forget('url_type');
		return redirect()->route('user.myEvents');
	}

	 return redirect('/home');
	}

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
       // $path = url()->previous();
        $route = app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName();
		if($route == 'frontend.events'){
			Session::put('url_type', 'event');
		}else{
			Session::forget('url_type');
		}
        $this->middleware('guest')->except('logout');
    }
    
    protected function credentials(Request $request)
    {      

        // Load user from database
        $user = User::where($this->username(), $request->{$this->username()})->first();
        if(!empty($user)){
           if($user->status == 2){
            return ['email' => $request->{$this->username()}, 'password' => $request->password, 'status' => 2];
           }
        }
            return ['email' => $request->{$this->username()}, 'password' => $request->password, 'status' => 1];
    }


    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        $errors = [$this->username() => trans('auth.failed')];

         // Load user from database
        $user = User::where($this->username(), $request->{$this->username()})->first();

        if ($user && \Hash::check($request->password, $user->password) && $user->status == 0) {
             throw ValidationException::withMessages([
            $this->username() => [trans('auth.suspended')],
        ]);
        }else{
                   throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]); 
        }

        // throw ValidationException::withMessages([
        //     $this->username() => [trans('auth.failed')],
        // ]);
    }    

    public function logout() {
        Auth::guard('web')->logout();
       return redirect('/login');
    }
}