<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\ChildActivity;
use App\CoachUploadPdf;
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

    /* ****************************************
    |
    | Add Activities for Child 
    |
    |******************************************/
    public function child_activities()
    {
        $activities = ChildActivity::orderBy('id','asc')->get(); 
        $count_activity = $activities->count();

        return view('admin.child-activities.activities',compact('count_activity','activities'));
    }

    public function save_child_activities(Request $request)
    {
        ChildActivity::truncate();
        $data = $request->all();  
   
        if(isset($data) && !(empty($data['ac_title'])))
        {

            foreach ($data['ac_title'] as $number => $value) 
            {                                      
                $ac =  new ChildActivity;
                $ac['ac_title'] = $data['ac_title'][$number]; 
                $ac->save(); 
            }
        }

            return redirect('/admin/activities/child')->with('flash_message',"Activities updated successfully.");
    }


    /* ****************************************
    |
    | Coach - Uploaded Invoice PDF's
    |
    |******************************************/
    public function uploaded_invoice(){
      $req = CoachUploadPdf::orderBy('id','ASC')->paginate(10);
      return view('admin.upload-invoice.index',compact('req'));
    }

    public function new_uploaded_invoice(){
      $req = CoachUploadPdf::orderBy('id','ASC')->where('status',2)->paginate(10);
      $req_count = count($req);
      return view('admin.upload-invoice.new-invoice',compact('req','req_count'));
    }

    public function accept_uploaded_invoice(){
      $req = CoachUploadPdf::where('status',1)->orderBy('id','ASC')->paginate(10);
      return view('admin.upload-invoice.accept',compact('req'));
    }

    public function reject_uploaded_invoice(){
      $req = CoachUploadPdf::where('status',0)->orderBy('id','ASC')->paginate(10); 
      return view('admin.upload-invoice.reject',compact('req'));
    }

    public function update_inv_status(Request $request){
      $id = $request->id;
      $st = CoachUploadPdf::find($id);
      $st->status = $request->status;
      $st->save();

      return \Redirect::back()->with('success','Status updated successfully.');
    }

    public function coach_search(Request $request)
    {
        if($request->ajax())
        {
            $query = $request->get('query'); 
            
            if($query != '')
            {
                $data = \DB::table('coach_upload_pdfs')
                ->leftjoin('users', 'coach_upload_pdfs.coach_id', '=', 'users.id')
                ->select('coach_upload_pdfs.*', 'users.name')
                ->orWhere( 'users.name', 'LIKE', '%' . $query . '%' )
                ->orderBy('coach_upload_pdfs.id','desc')->paginate (10)->setPath ( '' );
                
            }
            else
            {
                $data = \DB::table('coach_upload_pdfs')
                ->leftjoin('users', 'coach_upload_pdfs.coach_id', '=', 'users.id')
                ->select('coach_upload_pdfs.*', 'users.name')
                ->orWhere( 'users.name', 'LIKE', '%' . $query . '%' )
                ->orderBy('coach_upload_pdfs.id','desc')
                ->paginate (10);
                
            }
            $total_row = $data->count(); 
            
            if($total_row > 0)
            {
                $output = '';
                foreach($data as $row)
                {
                  $base_url = \URL::to('/');
                  $user = User::where('id',$row->coach_id)->first();
                    $output .= '<tr><td>'.$user->updated_at.'</td><td>'.$user->name.'</td><td>'.$row->invoice_name.'</td><td>'.$row->invoice_document.'</td><td>';
                      
                      if($row->status == 0){
                        $output .= '<h6 style="color:red;"><b>Rejected</b></h6>';
                      }elseif($row->status == 1){
                        $output .= '<h6 style="color:green;"><b>Accepted</b></h6>';
                      }elseif($row->status == 2)
                      { $output .= '<h6 style="color:green;"><b>Requested</b></h6>';
                      }

                      $output .= '</td>
                      <td><a target="_blank" href="'.$base_url.'/public/uploads/'.$row->invoice_document.'">View</a></td> 
                      <td>
                      <form id="upd_inv_status-'.$row->id.'" action="'.$base_url.'/admin/update_inv_status" method="POST">
                          <input type="hidden" name="_token" value="'.csrf_token().'">
                          <link rel="stylesheet" href="'.$base_url.'/public/admin-assets/css/style.css">
                          <input type="hidden" id="change_status" name="id" value="'.$row->id.'">
                          <label class="switch">
                            <input type="checkbox" onclick="checktoggle('.$row->id.');" id="toggle-'.$row->id.'" value="1" name="status"'; 
                            if($row->status == 1){
                              $output .= 'checked';
                            }
                            $output .= '><span class="slider round"></span>
                          </label>
                      </form>
                      </td>
                  </tr>';
                }
            }
            else
            {
                $output = '<tr><td colspan="7"><div class="no_results"><h3>No result found.</h3></div></td></tr>';
            }
   
            $data = array(
                'table_data'   => $output,
                'total_data'   => $total_row,
                'paginate'     => $data->withPath('/dominic-new/admin/uploaded-invoice/')->toHtml(),
            );

            echo json_encode($data);
        }  
    } 

    /******************************************
    |   Reject caoach invoice
    |******************************************/
    public function reject_invoice(Request $request)
    {
      $id = $request->id;
      $req = CoachUploadPdf::find($id);
      $req->status = 0;
      $req->reason_of_rejection = $request->reason_of_rejection;
      $req->save();

      return \Redirect::back()->with('success','Parent request has been rejected successfully!');
    }

    /******************************************
    |   Revenue Management
    |******************************************/
    public function revenue()
    {
      return view('admin.revenue.revenue-page');
    }

    public function course_revenue()
    {
      $purchased_courses = \DB::table('shop_cart_items')->where('shop_type','course')->where('type','order')->paginate(10);
      return view('admin.revenue.course-revenue',compact('purchased_courses'));
    }

    public function camp_revenue()
    {
      $purchased_camp = \DB::table('shop_cart_items')->where('shop_type','camp')->where('type','order')->paginate(10);
      return view('admin.revenue.camp-revenue',compact('purchased_camp'));
    }

    public function product_revenue()
    {
      $purchased_product = \DB::table('shop_cart_items')->where('shop_type','product')->where('type','order')->paginate(10);
      return view('admin.revenue.product-revenue',compact('purchased_product'));
    }

}