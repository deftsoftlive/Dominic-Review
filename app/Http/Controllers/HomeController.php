<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;      
use App\Traits\GeneralSettingTrait;
use App\User;
use App\Models\Admin\CmsPage;
use App\Category;
use App\VendorCategory;
use Carbon\Carbon;
use App\FAQs;
use App\Testimonial;
use App\ContactDetail;
use App\Course;
use App\Traits\ProductCart\UserCartTrait;
use App\Traits\EmailTraits\EmailNotificationTrait;

class HomeController extends Controller
{
    use RegistersUsers;
    use GeneralSettingTrait;
    use EmailNotificationTrait;
    use UserCartTrait;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function register()
    {
        if(Auth::check()){
              $url = url(route('request.messages')).'?type=logged';
              return redirect($url);
        }
        return view('auth.register2');
    }

    public function showCmsPage($slug) {
      $page = CmsPage::FindBySlugOrFail($slug);
      return view('cmspage')->with('page', $page);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {

        if(!empty($request->test)){
            return getUserNotifications();
            return \App\User::with('newVendorsBusinessMessages','newVendorsBusinessMessages.unReadMessages')->where('id',\Auth::user()->id)->first();
        }

      $slug = 'homepage';
      $categories = Category::where(['status'=> 1, 'parent'=> 0])->orderBy('label','ASC')->get();
      $testimonial = Testimonial::select(['id','title', 'description','status','slug','image'])->where('status','1')->get(); 

      return view('home', $this->getArrayValue($slug))->with('categories',$categories)->with('testimonial',$testimonial);
    }



#---------------------------------------------------------------------
# ajax register
#----------------------------------------------------------------------


public function userRegisterUpdate(Request $request,$token)
{

        $v= \Validator::make($request->all(), [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'id_proof' => ['required', 'image']
            
        ],[
            'id_proof.image' => 'Please upload image format of document'
        ]);


          $user = User::where('role','vendor')
                  ->where('custom_token',$token);
                    


 
        if($v->fails()){
             return response()->json(['status' => 0,'errors' => $v->errors()]);
        }elseif($user->count() == 0){
             return response()->json(['status' => 0,'errors' => ['Token has been Expired.']]);
        }else{
            
            $status = $this->updateAccount($request,$user->first());
            $url = url(route('request.messages')).'?type=account-updated';
            return response()->json([
                'status' => 8,
                'redirectLink' => $url
            ]);

        }
}




#---------------------------------------------------------------------
# ajax register
#----------------------------------------------------------------------

public function updateAccount($request,$u)
{
    $id_proof = uploadFileWithAjax('videos/vendors/cover/',$request->file('id_proof'));
     
    $u->first_name = $request->first_name;
    $u->last_name = $request->last_name;
    $u->name = $request->first_name.' '.$request->last_name;
    $u->phone_number = $request->phone_number;
    $u->user_location = $request->location;
    $u->website_url = $request->website_url;
    $u->ein_bs_number = $request->ein_bs_number;
    $u->age = Carbon::parse($request->age)->format('Y-m-d');
    $u->id_proof = $id_proof;
    $u->status = 0;
    $u->custom_token = null;
    $u->updated_status = 1;
    if($u->save()) {

        $this->NewVendorEmailSuccess($u);
         return 1;
    }
}


#---------------------------------------------------------------------
# ajax register
#----------------------------------------------------------------------


public function userRegister(Request $request)
{
        $v= \Validator::make($request->all(), [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
            'password' => ['required','min:6','confirmed']
        ]);


        // print_r($request->all());
        // die;

        if($v->fails()){
             return response()->json(['status' => 0,'errors' => $v->errors()]);
        }else{

            if(!empty($request->type)){
              $status = $this->saveNewVendor($request);
            }else{
              $status = $this->saveNewUser($request,'user');
            }
          

            return response()->json(['status' => 1,'message' => 'We sent you an activation code. Check your Email and click on the link to verify.']);

        }
}






#-----------------------------------------------------------------------
#  save new user
#-----------------------------------------------------------------------


public function saveNewVendor($request)
{


    $id_proof = uploadFileWithAjax('videos/vendors/cover/',$request->file('id_proof'));
    $u = new \App\User;
    $u->first_name = $request->first_name;
    $u->last_name = $request->last_name;
    $u->name = $request->first_name.' '.$request->last_name;
    $u->email = $request->email;
    $u->user_location = $request->user_location;
    $u->phone_number = $request->phone_number;
    $u->user_location = $request->location;
    $u->latitude = $request->latitude;
    $u->longitude = $request->longitude;
    $u->website_url = $request->website_url;
    $u->ein_bs_number = $request->ein_bs_number;
    $u->age = Carbon::parse($request->age)->format('Y-m-d');
    $u->id_proof = $id_proof;
    $u->refer_data = $this->getReferAccount($request);
    $u->status = 0;
    $u->role = 'vendor';
    $u->password = \Hash::make($request->password);
    if($u->save() && $this->addBusinessCategories($request,$u->id) == 1) {

          $u->sendEmailVerificationNotification();
          $this->NewVendorEmailSuccess($u);
         return 1;
    }

}

#-----------------------------------------------------------------------
#  save new user
#-----------------------------------------------------------------------

public function getReferAccount($request)
{
  if(!empty($request->reference_business_name)):
  $category = \App\Category::where('id',$request->business_type);

   $arr = [

     'business_type' => $category->count() > 0 ? $category->first()->label : 'N/A',
     'reference_business_name' => $request->reference_business_name,
     'reference_email' => $request->reference_email,
     'reference_contact_number' => $request->reference_contact_number,
     'business_address' => $request->business_address
      
   ];
   return json_encode($arr);
 endif;
}

#-----------------------------------------------------------------------
#  save new user
#-----------------------------------------------------------------------


public function addBusinessCategories($request,$user_id)
{
             foreach ($request->categories as $key => $value) {
                    
                 $parent = $this->categorySave($value,0,$user_id);
             }
             return 1;
}



#-----------------------------------------------------------------------
#  save new user
#-----------------------------------------------------------------------



public function categorySave($value,$parent=0,$user_id)
{
        $v= VendorCategory::where('parent',$parent)->where('category_id',$value)->where('user_id',$user_id);
        $id = 0;
        if($v->count() == 0){
            $vCate = new VendorCategory;
            $vCate->parent = $parent;
            $vCate->category_id = $value;
            $vCate->user_id = $user_id;
            $vCate->status = 1;
            $vCate->save();
            $id = $vCate->id;

        }else{
            $category = $v->first();
            $id = $category->id;
        }
        return $id;
}

#-----------------------------------------------------------------------
#  save new user
#-----------------------------------------------------------------------


public function saveNewUser($request,$role="user")
{
    
            $user = \App\User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'name' => $request->first_name.' '.$request->last_name,
                'email' => $request->email,
                'role' => $role,
                'password' => \Hash::make($request->password),
            ]);

 
           $user->sendEmailVerificationNotification();
           return 1;
}





#-----------------------------------------------------------------------
#  save new user
#-----------------------------------------------------------------------


public function userLogin(Request $request,$role="user")
{
       $v= \Validator::make($request->all(), [
           
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:6'],
            
        ]);

        if($v->fails()){
             return response()->json(['status' => 0,'errors' => $v->errors()]);
        }else{

            $role = $this->login($request);
            return response()->json($role);

        }
}


#-----------------------------------------------------------------------
#  save new user
#-----------------------------------------------------------------------


public function userLoginPopup(Request $request,$role="user")
{
       $v= \Validator::make($request->all(), [
           
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:6'],
            
        ]);

        if($v->fails()){
             return response()->json(['status' => 0,'errors' => $v->errors()]);
        }else{

                    if (Auth::attempt(['email' => $request->email, 'password' => $request->password,'role' => 'user']))
                    {
                            if(Auth::check() && Auth::user()->email_verified_at){
                               if(Auth::user()->status == 1):
                                       $arr = [
                                             'status' => 1,
                                             'message' => 'Please wait... Redirecting to your dashboard.',
                                             'redirectLink' => url(route('user_dashboard')),
                                             'users' => Auth::user(),
                                             'upcoming_events' => Auth::user()->UpcomingUserEvents
                                        ];
                                else:

                                     Auth::logout();
                                     
                                         $arr = [
                                             'status' => 2,
                                             'message' => 'Your account is blocked by the Admin.'
                                           
                                        ];

                                endif;

                            } else {

                              Auth::logout();
                             
                                 $arr = [
                                     'status' => 2,
                                     'message' => 'Your account is not verified yet.'
                                   
                                ];
                            }

                   } else {
                    
                         $arr = [
                               'status' => 2,
                               'message' => 'Invalid Email | Password'
                             
                          ];
                  }
            return response()->json($arr);

        }
}

#-----------------------------------------------------------------------
#  save new user
#-----------------------------------------------------------------------


public function login($request)
{
    $arr =[];
      if (Auth::attempt(['email' => $request->email, 'password' => $request->password,'role' => 'vendor']))
        {

           // return Auth::user();
            if(Auth::check() && Auth::user()->email_verified_at){

                                if(Auth::user()->status == 1):
                                            $u = User::find(Auth::user()->id);
                                            $u->login_count = ($u->login_count + 1);
                                            $u->save();

                                      $arr = [
                                                'status' => 1,
                                                'message' => 'Please wait... Redirecting to your dashboard.',
                                                'redirectLink' => url(route('vendor_dashboard'))
                                            ];
                                else:

                                            Auth::logout();
                                            $arr = [
                                                'status' => 2,
                                                'message' => 'Your account is under verification process.',
                                                'redirectLink' => url(route('vendor_dashboard'))
                                            ];

                                endif;
                
                

            
            }else{
              Auth::logout();
             

                  $arr = [
                    'status' => 2,
                    'message' => 'Your account is not verified yet.',
                    'redirectLink' => url(route('vendor_dashboard'))
                ];
            }

        }elseif (Auth::attempt(['email' => $request->email, 'password' => $request->password,'role' => 'admin']))
        {
              
                $arr = [
                    'status' => 1,
                    'message' => 'Please wait... Redirecting to your dashboard.',
                    'redirectLink' => url(route('admin_dashboard'))
                ];

        }elseif (Auth::attempt(['email' => $request->email, 'password' => $request->password,'role' => 'user']))
        {

           
            if(Auth::check() && Auth::user()->email_verified_at){

                         $url = !empty($request->redirectLink) ? $request->redirectLink : url(route('user_dashboard'));

               

                             if(Auth::user()->status == 1):
                                            $this->TransferCartItemToUserTable();
                                            $arr = [
                                                'status' => 1,
                                                'message' => 'Please wait... Redirecting to your dashboard.',
                                                'redirectLink' => $url
                                            ];
                                else:

                                            Auth::logout();
                                            $arr = [
                                                'status' => 2,
                                                'message' => 'Your account is blocked by the Admin.',
                                                'redirectLink' =>  $url
                                            ];

                                endif;



            } else {

              Auth::logout();
             
                 $arr = [
                    'status' => 2,
                     'message' => 'Your account is not verified yet.'
                   
                ];
            }

        } else {
          
               $arr = [
                    'status' => 2,
                     'message' => 'Invalid Email | Password'
                   
                ];
        }

        return $arr;
}







#-------------------------------------------------------------------------
#
#-----------------------------------------------------------------------



public function requestMessages(Request $request)
{
    $type = !empty($request->type) ? $request->type : 1;
     return view('auth.requestMessages')
          ->with('type',$type);
}


#-------------------------------------------------------------------------
#
#-----------------------------------------------------------------------



public function about()
{
    return view('home.cms.about_us');
}



#-------------------------------------------------------------------------
#
#-----------------------------------------------------------------------



public function contact()
{
    return view('home.cms.contact_us');
}


 
#-------------------------------------------------------------------------
# email for email template testing
#-----------------------------------------------------------------------



public function email()
{
   return $this->VendorOrderSuccessOrderSuccess(11);
             $o = \App\Models\Order::find(10);
             $order = \App\Models\EventOrder::where('order_id',$o->id)
                               //->where('vendor_id',35)
                                ->where('type','order')->get();
    return view('emails.customEmail')->with('order',$order)->with('o',$o);
}

#-------------------------------------------------------------------------
# email for email template testing
#-----------------------------------------------------------------------


public function faq() {
    $faqs = FAQs::whereIn('type', ['user', 'vendor'])->get();
    return view('home.faq.faq')->with(['faqs' => $faqs]);
}

#-------------------------------------------------------------------------
# email for email template testing
#-----------------------------------------------------------------------



public function vendorUpdate($token)
{
   $user = User::where('role','vendor')
                  ->where('custom_token',$token);
   if($user->count() == 0){
    return redirect(route('request.messages').'?type=token-expired');
   }
  
   return view('auth.updateVendor')->with('user',$user->first());
}


/*-------------------------------------
|   CMS PAGES 
|--------------------------------------*/

/* Add Report */
public function add_report()
{
    return view('cms.addreport');
}

/* Course Listing Page */
public function listing()
{
    $course = Course::orderBy('id','desc')->paginate(4);
    $testimonial = Testimonial::select(['id','title', 'description','status','slug','image'])->where('status','1')->get(); 
    return view('cms.listing',compact('testimonial','course'));
}

/* Course Detail Page */
public function course_detail($id)
{
    $decode_id = base64_decode($id);
    $course = Course::where('id','=',$decode_id)->first();
    return view('cms.course-listing-detail',compact('course'));
}

/* Goals Template Page */
public function set_goals()
{
    return view('cms.setgoals');
}

/* Contact Us Page */
public function contact_us()
{
    return view('cms.contact-us');
}

/* Save contact form details */
public function save_contact_us(Request $request)
{
    $contact = ContactDetail::create($request->all()); 
    $contact->save;

    $participant_name = $contact->participant_name;
    $participant_dob = $contact->participant_dob;
    $participant_gender = $contact->participant_gender;
    $parent_name = $contact->parent_name;
    $parent_email = $contact->parent_email;
    $parent_telephone = $contact->parent_telephone;
    $class = $contact->class;

    // Admin Email
    $admin_email = getAllValueWithMeta('admin_email', 'admin-email'); 

    // Mail to admin
    \Mail::send('emails.contact-us.admin', ['participant_name'=>$participant_name, 'participant_dob'=>$participant_dob, 'participant_gender'=>$participant_gender, 'parent_name'=>$parent_name, 'parent_email'=>$parent_email, 'parent_telephone'=>$parent_telephone, 'class'=>$class] , 

             function($message) use($admin_email){
                $message->to($admin_email);
                $message->subject('Subject : Book a Free Taster Class');
        });

    // Mail to parent
    \Mail::send('emails.contact-us.parent', ['name' => $contact->parent_email] , 
             function($message) use($contact){
                 $message->to($contact->parent_email);
                 $message->subject('Subject : '.'Book a Free Taster Class');
               });


    return view('cms.success');
} 

  /* Success Page */
  public function success_page(Request $request){
    return view('cms.success');
  }


  /*-------------------------------------
  |   Course Page Search
  |--------------------------------------*/
  public function course_search(Request $request) 
  {
    if($request->ajax())
        {
            $query = $request->get('query'); 
            
            if($query != '')
            {
                $data = \DB::table('courses')
                ->select('courses.*')
                ->where( 'title', 'LIKE', '%' . $query . '%' )
                ->orderBy('courses.id','desc')->paginate (4)->setPath ( '' );
                
            }
            else
            {
                $data = \DB::table('courses')
                ->select('courses.*')
                ->orderBy('courses.id','desc')
                ->paginate(4); 
            }

            $total_row = $data->count(); 
            
            if($total_row > 0)
            {
                $output = '';
                $list = '';
                foreach($data as $row)
                {
                  $output .= '
                    <div class="col-md-6">
                      <ul class="events-wrap">
                        <li>
                          <div class="event-card">
                            <div class="event-card-heading">
                                <h3>'.$row->title.'</h3>
                                          </div>
                                          <div class="event-info">
                                            <p><span>Age :</span>'.$row->age.'</p>
                                            <p><span>Session dates (12 weeks) :</span>'.$row->session_date.'</p>
                                            <p><span>Location :</span>'.$row->location.'</p>
                                            <p><span>Day/Time :</span> '.$row->day_time.'</p>
                                            <p>'.$row->description.'</p>
                                          </div>
                                          <div id="accordion-1" class="myaccordion">
                            <div class="card">
                              <div class="card-header" id="headingFirst">
                                <h2 class="mb-0">
                                  <button class="d-flex align-items-center justify-content-between btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFirst'.$row->id.'" aria-expanded="false" aria-controls="collapseFirst'.$row->id.'">
                                   More Information
                                  </button>
                                </h2>
                              </div>
                              <div id="collapseFirst'.$row->id.'" class="collapse" aria-labelledby="headingFirst" data-parent="#accordion-1">
                                <div class="card-body">
                                  '.$row->more_info.' 
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="event-card-form">
                              <form>
                                <div class="form-group">
                                                    <label for="inputPlayer-3">Select Player</label>
                                                    <select id="inputPlayer-3" class="form-control event-dropdown">
                                                      <option selected value="Player1">Player1</option>
                                                    </select>                                                               
                                                  </div>                                  
                              </form>
                            </div>
                          <div class="event-booking">
                            <h1 class="event-booking-price"><span>£</span>'.$row->price.'</h1>
                            <a href="javascript:void(0);" class="cstm-btn">Book Now</a>&nbsp;
                            <a href="'.\URL::to("/course-detail").'/'.$row->id.'" class="cstm-btn">Read More</a>
                          </div>
                          </div>
                        </li>
                      </ul>
                    </div>';

                    $list .= '<li><a href="'.\URL::to("/course-detail").'/'.$row->id.'">'.$row->title.'</a></li>';
                }
            }
            else
            {
                $output = '<tr><td colspan="8"><div class="no_results"><h3>Sorry, no results</h3><p>No Course Found</p></div></td></tr>';
                $list = '';
            }
            
            $data = array(
                'table_data'   => $output,
                'total_data'   => $total_row,
                'table_list'   => $list,
            );

            echo json_encode($data);
        }  
  }

}
