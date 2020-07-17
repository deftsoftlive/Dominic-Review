@extends('inc.homelayout')

@section('title', 'DRH|Listing')

@section('content')

@php $base_url = \URL::to('/'); @endphp
<style>
  img.disable-badge {
    opacity: 0.3;
}
  .badge-img{
    width: 50%;
}
</style>

<section class="football-course-sec" style="background: url({{$base_url}}/public/uploads/{{ getAllValueWithMeta('badges_banner_img', 'badges') }});">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="football-course-content">
              <h2 class="f-course-heading">{{ getAllValueWithMeta('badges_heading', 'badges') }}</h2>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- banner section ends here -->
    <!-- acount section starts here -->
    <section class="account-menu-sec player-badge-sec">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="account-menu-sec-heading">
                      <!-- <h1>ACCOUNT menu</h1> -->
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-md-12">
              <nav>
                      <div class="nav nav-tabs account-menu-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link menu-tab-link" id="nav-goals-tab" data-toggle="tab" href="#nav-goals" role="tab" aria-controls="nav-home" aria-selected="false"><span><i class="fas fa-bullseye"></i></span>Player Goals</a>
                        <a class="nav-item nav-link menu-tab-link active" id="nav-badges-tab" data-toggle="tab" href="#nav-badges" role="tab" aria-controls="nav-profile" aria-selected="true"><span><i class="fas fa-trophy"></i></span>Player Badges</a>
                        <a class="nav-item nav-link menu-tab-link" id="nav-reports-tab" data-toggle="tab" href="#nav-reports" role="tab" aria-controls="nav-contact" aria-selected="false"><span><i class="fas fa-clipboard-list"></i></span>Player Reports</a>
                        <a class="nav-item nav-link menu-tab-link" id="nav-schedule-tab" data-toggle="tab" href="#nav-schedule" role="tab" aria-controls="nav-schedule" aria-selected="true"><span><i class="fas fa-users"></i></span>Matches</a>
                        <a class="nav-item nav-link menu-tab-link" id="nav-schedule-tab" data-toggle="tab" href="#nav-schedule" role="tab" aria-controls="nav-schedule" aria-selected="false"><span><i class="fas fa-calendar-alt"></i></span>Schedule</a>
                        <a class="nav-item nav-link menu-tab-link" id="nav-stats-tab" data-toggle="tab" href="#nav-stats" role="tab" aria-controls="nav-stats" aria-selected="false"><span><i class="fas fa-cog"></i></span>Stats</a>
                      </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                      <div class="tab-pane fade" id="nav-goals" role="tabpanel" aria-labelledby="nav-goals-tab">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="page-description">
                              <p class="goal-setting-text">{{ getAllValueWithMeta('goals_desc', 'badges') }}</p> 
                            </div>
                          </div>
                        </div>

                        @if(Session::has('success'))
                        <div class="alert_msg alert alert-success">
                           <p>{{ Session::get('success') }} </p>
                        </div>
                        @endif

                        <div class="row">
                          <div class="col-md-12">
                            <form class="select-player-goal-form">
                              <div class="form-row">
                                <div class="form-group col-md-4">
                                  <label for="inputPlayer">Select Player :</label>
                                  <select id="inputPlayer" class="form-control">
                                  @foreach($purchase_course as $bd)
                                  @php
                                  $user = DB::table('users')->where('id',$bd->child_id)->first();
                                  @endphp
                                    <option selected="{{$bd->child_id}}">{{$user->name}}</option>
                                  @endforeach
                                  </select>                                                               
                                </div>   
                                <div class="form-group col-md-4">
                                  <label for="inputGoal">Select Goals :</label>
                                  <select id="inputGoal" class="form-control">
                                    <option selected="">Level 1</option>
                                    <option>...</option>
                                  </select>                                                               
                                </div>  
                              </div>
                            </form>                           
                          </div>
                          <div class="col-md-12">
                              <div class="player-goal-heading">
                                <h1>All of your goals apart from your Big Dreams should follow the acronym S.M.A.R.T.</h1>
                              </div>
                          </div>
                          <div class="col-md-12">
                            <fieldset class="player-goal-card">
                              <legend>MY BIG DREAMS</legend>
                              <p>What do you want to do or be when you are grown up? This doesn’t have to be tennis related</p>
                              <form>
                                <div class="form-group">
                                  <textarea class="form-control goal-textarea" rows="3"></textarea>
                                </div>
                              </form>
                            </fieldset>
                            <div class="goal-reciew-feedback">
                              <p>Write goal review feedback</p>
                              <form>
                                <div class="form-group">
                                  <textarea class="form-control goal-textarea" rows="3"></textarea>
                                </div>
                              </form>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <fieldset class="player-goal-card">
                              <legend>SHORT TERM TENNIS GOALS</legend>
                              <p>Between now and the end of the term</p>
                              <form>
                                <div class="form-group">
                                      <textarea class="form-control goal-textarea" rows="3"></textarea>
                                    </div>
                              </form>
                            </fieldset>
                            <div class="goal-reciew-feedback">
                              <p>Write goal review feedback</p>
                              <form>
                                <div class="form-group">
                                  <textarea class="form-control goal-textarea" rows="3"></textarea>
                                </div>
                              </form>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <fieldset class="player-goal-card">
                              <legend>MEDIUM TERM TENNIS GOALS</legend>
                              <p>3 to 6 months from now</p>
                              <form>
                                <div class="form-group">
                                      <textarea class="form-control goal-textarea" rows="3"></textarea>
                                    </div>
                              </form>
                            </fieldset>
                            <div class="goal-reciew-feedback">
                              <p>Write goal review feedback</p>
                              <form>
                                <div class="form-group">
                                  <textarea class="form-control goal-textarea" rows="3"></textarea>
                                </div>
                              </form>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <fieldset class="player-goal-card">
                              <legend>LONG TERM TENNIS GOALS</legend>
                              <p>6 to 12 months from now</p>
                              <form>
                                <div class="form-group">
                                      <textarea class="form-control goal-textarea" rows="3"></textarea>
                                    </div>
                              </form>
                            </fieldset>
                            <div class="goal-reciew-feedback">
                              <p>Write goal review feedback</p>
                              <form>
                                <div class="form-group">
                                  <textarea class="form-control goal-textarea" rows="3"></textarea>
                                </div>
                              </form>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="player-goal-info">
                              <ul class="player-goal-inner-text-wrap">
                              <li>
                                <h2>{{ getAllValueWithMeta('specific_title', 'badges') }}</h2>
                                <p>{{ getAllValueWithMeta('specific_desc', 'badges') }}</p>
                              </li>
                              <li>
                                <h2>{{ getAllValueWithMeta('measurable_title', 'badges') }}</h2>
                                <p>{{ getAllValueWithMeta('measurable_desc', 'badges') }}</p>
                              </li>
                              <li>
                                <h2>{{ getAllValueWithMeta('achievable_title', 'badges') }}</h2>
                                <p>{{ getAllValueWithMeta('achievable_desc', 'badges') }}</p>
                              </li>
                              <li>
                                <h2>{{ getAllValueWithMeta('realistic_title', 'badges') }}</h2>
                                <p>{{ getAllValueWithMeta('realistic_desc', 'badges') }}</p>
                              </li>
                              <li>
                                <h2>{{ getAllValueWithMeta('timed_title', 'badges') }}</h2>
                                <p>{{ getAllValueWithMeta('timed_desc', 'badges') }}</p>
                              </li>
                              </ul>
                              <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">“{{ getAllValueWithMeta('confirmation_msg', 'badges') }}”</label>
                              </div>
                              <div class="player-goal-date">
                                <p><span>Date :</span> {{ getAllValueWithMeta('goals_date', 'badges') }} </p>
                              </div>
                              <div class="set-goal-btn-wrap">
                                <a href="javascript:void(0);" class="cstm-btn">set goals</a>
                              </div>
                            </div>                          
                          </div>
                        </div>
                      </div>

                      <!-- Crop Functionality - Start -->
                     <!--  <div class="container">
                        <div class="panel panel-default">
                          <div class="panel-heading">Laravel crop image before upload using croppie plugins</div>
                          <div class="panel-body">

                            <div class="row">
                              <div class="col-md-4 text-center">
                              <div id="upload-demo" style="width:350px"></div>
                              </div>
                              <div class="col-md-4" style="padding-top:30px;">
                              <strong>Select Image:</strong>
                              <br/>
                              <input type="file" id="upload">
                              <br/>
                              <button class="btn btn-success upload-result">Upload Image</button>
                              </div>


                              <div class="col-md-4" style="">
                              <div id="upload-demo-i" style="background:#e1e1e1;width:300px;padding:30px;height:300px;margin-top:30px"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div> -->
                      <!-- Crop Functionality - End -->

                      <div class="tab-pane fade active show" id="nav-badges" role="tabpanel" aria-labelledby="nav-badges-tab">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="tab-page-heading">
                              <h1>My Badges</h1>
                              <p class="goal-setting-text">{{ getAllValueWithMeta('goals_desc', 'badges') }}</p>
                              <br/>
                            </div>


                            
                            <!-- <form class="select-player-goal-form"> -->
                            <form action="{{route('badges')}}" method="POST" class="select-player-goal-form">
                              @csrf
                              <div class="form-row badges-select-bar">
                                <div class="form-group col-lg-9 col-md-12 col-sm-12">

                                    <div class="col-md-4 col-sm-12 col-12   selt_opt ">
                                        <div class="outer-wrap">
                                            <ul class="stepl-list">
                                              <li>
                                                <a href="#">
                                                  <div class="inner-wrap">                                   
                                                    <span>step</span>
                                                    <p>1</p>                                    
                                                  </div>
                                                </a>
                                              </li>
                                            </ul>
                                            <select id="inputPlayer" name="user_id" class="form-control">
                                              <option selected="" disabled="">Select Player</option>
                                            @php
                                              $user_badges = DB::table('user_badges')->orderBy('id','asc')->get();
                                              $season = DB::table('seasons')->orderBy('id','asc')->get(); 
                                            @endphp 
                                            @foreach($user_badges as $bd)
                                            @php
                                            $user = DB::table('users')->where('id',$bd->user_id)->first();
                                            @endphp
                                              <option @if($user_id == $bd->user_id) selected @else  @endif value="{{$bd->user_id}}">{{$user->name}}</option>
                                            @endforeach
                                            </select>
                                      </div>
                                    </div>

                                 

                                    <div class="col-md-4 col-sm-12 col-12  selt_opt ">
                                      <div class="outer-wrap">
                                        <ul class="stepl-list">
                                          <li>
                                            <a href="#">
                                              <div class="inner-wrap">                                   
                                                <span>step</span>
                                                <p>2</p>                                    
                                              </div>
                                            </a>
                                          </li>
                                        </ul>
                                        <select id="season" name="season_id" class="form-control">
                                          <option selected="" disabled="">Select Term</option>
                                        @foreach($season as $se) 
                                          <option value="{{$se->id}}">{{$se->title}}</option>
                                        @endforeach
                                        </select>
                                      </div>
                                    </div>


                                    <div class="col-md-4  col-sm-12 selt_opt ">
                                      <div class="outer-wrap">
                                        <ul class="stepl-list">
                                          <li>
                                            <a href="#">
                                              <div class="inner-wrap">                                   
                                                <span>step</span>
                                                <p>3</p>                                    
                                              </div>
                                            </a>
                                          </li>
                                        </ul>
                                        <select id="course" name="course_id" class="form-control">
                                          <option selected="" disabled="">Select Course</option>
                                        </select>
                                      </div>
                                    </div>

                                  <!-- <div class="col-sm-1" style="margin-left:10px">
                                    <a href="" onclick="myFunction();" class="btn btn-primary">Reset</a>
                                  </div> -->                                                               
                                </div> 
                                <div class="col-lg-3 col-md-12 select-button" style="margin-right:10px;">
                                    <button type="submit" class="cstm-btn">Submit</button>
                                    <a href="{{url('/user/badges')}}" class="cstm-btn">Reset</a>
                                </div>
                              </div>  
                            </form>
                          </div>
                        </div>


                      @if(!empty($shop))
                        <div class="row">

                          <div class="col-md-12">
                            <div class="player-achievements-card">
                              
                              <div class="row">
                                <div class="col-lg-7 col-md-7">
                                  <div class="player-info">
                                    <figure class="player-img-wrap " id="badges-form">

                                    @if(!empty($user_id))

                                    @php $user = DB::table('users')->where('id',$user_id)->first();
                                    @endphp
                                    
                                    @else

                                    @php $user = DB::table('users')->where('id',$shop->child_id)->first();
                                    @endphp
                                    
                                    @endif
                                    
                                    <form  enctype="multipart/form-data" action="{{route('update_user_profile')}}"  method="POST">
                                    @csrf
                                      <input type="hidden" name="user_id" value="{{$user->id}}">
                                      <div class="profile--img pt-20">

                                        @if(!empty($user->profile_image))

                                          <!-- <div>
                                              <img src="{{URL::asset('/uploads')}}/{{$user->profile_image}}" id="cropbox" class="img" /><br />
                                          </div>
                                          <div id="btn">
                                              <input type='button' id="crop" value='CROP'>
                                          </div>
                                          <div>
                                              <img src="#" id="cropped_img" style="display: none;">
                                          </div> -->
                                          <img style="width:50%;" src="{{URL::asset('/uploads')}}/{{$user->profile_image}}" id="Image_Preview" alt="">
                                          <label for="upload_img" class="select-file"><i class="fas fa-pencil-alt"></i></label>
                                          <input id="upload_img" type="file" name="image" class="upload--profile-image" accept="image/*" onchange="ImagePreviewURL(this);">
                                          <input type="hidden" name="oldimage" value="{{URL::asset('/uploads')}}/{{$user->profile_image}}">
                                        @else
                                          <img style="width:50%;" src="{{ URL::asset('images/default.jpg')}}" id="Image_Preview" alt="">
                                          <label  for="upload_img" class="select-file"><i class="fas fa-pencil-alt"></i></label>
                                          <input id="upload_img" type="file" name="image" class="upload--profile-image" accept="image/*" onchange="ImagePreviewURL(this);">
                                          <input type="hidden" name="oldimage" value="{{URL::asset('/uploads')}}/{{$user->profile_image}}">
                                        @endif
                                      </div>
                                      <br/>
                                    <button type="submit" class="cstm-btn">Update</button>
                                    </form>

                                      <!-- @if(isset($user->profile_image))
                                      <img class="upload--profile-image" accept="image/*" onchange="ImagePreviewURL(this);" src="{{URL::asset('/uploads')}}/{{$user->profile_image}}">
                                      @else
                                      <img class="upload--profile-image" accept="image/*" onchange="ImagePreviewURL(this);" src="{{ URL::asset('images/default.jpg')}}">
                                      @endif -->
                                    
                                    </figure>
                                    <div class="player-name-points">
                                    @if(!empty($user_id))
                                      @php 
                                        $user = DB::table('users')->where('id',$user_id)->first();
                                        $course = DB::table('courses')->where('id',$course_id)->where('season',$season_id)->first();
                                        $badges_data = DB::table('user_badges')->where('user_id',$user_id)->first(); 
                                      @endphp
                                    @else
                                      @php
                                        $user = DB::table('users')->where('id',$shop->child_id)->first();
                                        $course = DB::table('courses')->where('id',$shop->product_id)->first();
                                        $badges_data = DB::table('user_badges')->where('user_id',$shop->child_id)->first(); 
                                      @endphp 
                                    @endif

                                    @if(!empty($user_id))
                                        <h2>{{$user->name}}</h2>
                                        <h2>Points : <span>{{isset($user_badge->badges_points) ? $user_badge->badges_points : ''}} Points</span></h2>
                                        <h2>Tennis club name : <input type="text" id="update_tennis_club" value="{{$user->tennis_club}}" data-shop="{{$shop->id}}" data-id="{{$user->id}}"></h2>
                                        <h2>Stage : <span> @if(!empty($course->subtype)) @php echo getProductCatname($course->subtype); @endphp @endif</span></h2>
                                        <h2>Course:  <span>@if(!empty($course->title)) {{$course->title}} @endif</span></h2>
                                    @else
                                        <h2>{{$user->name}}</h2>
                                        <h2>Points : <span>{{isset($user_badge->badges_points) ? $user_badge->badges_points : ''}} Points</span></h2>
                                        <h2>Tennis club name : <input type="text" id="update_tennis_club" value="{{$user->tennis_club}}" data-shop="{{$shop->id}}" data-id="{{$user->id}}"></h2>
                                        <h2>Stage : <span> @if(!empty($course->subtype)) @php echo getProductCatname($course->subtype); @endphp @endif</span></h2>
                                        <h2>Course:  <span>@if(!empty($course->title)) {{$course->title}} @endif</span></h2>
                                    @endif    
                                    </div>
                                  </div> 
                                </div>


                                
                                <div class="col-lg-5  col-md-5">
                                  <div class="player-achievements">
                                    
                                      <!-- <h2>achievements</h2> -->
                                      <ul class="achievement-medals">

                                      @php
                                        $badges_data = DB::table('user_badges')->where('user_id',$shop->child_id)->first(); 
                                        $selected_badges = explode(',',$badges_data->badges);  
                                        $all_badges = DB::table('badges')->get()->toArray();
                                      @endphp

                                      @foreach($all_badges as $badge)
                                      
                                      @if(in_array($badge->id,$selected_badges))
 
                                        <li><img class="active-badge" src="{{URL::asset('/uploads')}}/{{$badge->image}}">
                                        </li>
                                      
                                      @endif

                                      @endforeach

                                      </ul>                                  
                                  </div>
                                  <div class="player-achie-disable-list"> 
                                    <div class="inner-wrap">
                                      <p class="custom-heading">Still to achieve – Click to see what you need to do</p>
                                      <ul class="achievement-medals">  

                                      @foreach($all_badges as $badge)
                                      
                                      @if(in_array($badge->id,$selected_badges))
 
                                      @else
                                        <li title="{!! $badge->description !!}"><img class="disable-badge" src="{{URL::asset('/uploads')}}/{{$badge->image}}"></li>
                                      @endif

                                      @endforeach

                                      </ul>
                                    </div>
                                  </div> 
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>


                        <div class="row">
                          <div class="col-md-12">
                            <div class="achievement-day">
                            </div>
                          </div>  
                          <div class="col-md-12">
                            <div class="school-bages-card">
                              <div class="day-content">
                                <p class="day-wise">Badges</p>
                              </div>

                              @php
                                $badges_data = DB::table('user_badges')->where('user_id',$shop->child_id)->first();
                                $selected_badges = explode(',',$badges_data->badges);  
                                $all_badges = DB::table('badges')->get()->toArray(); 
                              @endphp

                              @foreach($all_badges as $badge)
                              
                              @if(in_array($badge->id,$selected_badges))

                              @php 
                                $sort_id = $badge->sort;
                                $next_id = $sort_id+1; 
                                $next_badges = DB::table('badges')->where('sort',$next_id)->get();
                              @endphp 
                              <div class="row">   
                                <div class="col-md-3">
                                  <div class="school-card">
                                    <figure>
                                      <!-- <img class="badge-img" src="{{URL::asset('/uploads')}}/{{$badge->image}}"> -->
                                    </figure>
                                    <p>{{$badge->name}}</p>
                                  </div>
                                </div>
                                <div class="col-md-6 offset-md-1">
                                  <div class="school-details">
                                    <!-- <p><span>Venu :</span> xyz school, uk</p>
                                    <p><span>Date :</span> Mon 10 February 2020</p>
                                    <p><span>Result :</span> Lorem Ipsum is simply dummy text of the printing</p> -->
                                    <p>{!! $badge->description !!}</p>
                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <div class="day-medal-wrap">
                                   <figure>
                                    <img src="{{URL::asset('/uploads')}}/{{$badge->image}}">
                                  </figure>
                                  </div>
                                </div>
                              </div><br/>
                              @endif
                              @endforeach

                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-12">
                            <div class="leader-bord-heading-wrap">
                              <h1>leader Board</h1>
                            </div>
                          </div>

                          <form action="{{route('badges')}}" method="POST" class="select-player-goal-form">
                              @csrf
                              <div class="form-row badges-select-bar">
                                <div class="form-group col-lg-9 col-md-12 col-sm-12">

                                    <div class="col-md-6 col-sm-12 col-12 selt_opt">
                                        <div class="outer-wrap">
                                            <ul class="stepl-list">
                                              <li>
                                                <a href="#">
                                                  <div class="inner-wrap">                                   
                                                    <span>step</span>
                                                    <p>1</p>                                    
                                                  </div>
                                                </a>
                                              </li>
                                            </ul>
                                            <select id="term" name="term" class="form-control">
                                              <option selected="" disabled="">Select Term</option>
                                            @php $season = DB::table('seasons')->get(); @endphp
                                            @foreach($season as $se) 
                                              <option value="{{$se->id}}">{{$se->title}}</option>
                                            @endforeach
                                            </select>
                                      </div>
                                    </div>

                                    <div class="col-md-6 col-sm-12 selt_opt">
                                      <div class="outer-wrap">
                                        <ul class="stepl-list">
                                          <li>
                                            <a href="#">
                                              <div class="inner-wrap">                                   
                                                <span>step</span>
                                                <p>2</p>                                    
                                              </div>
                                            </a>
                                          </li>
                                        </ul>
                                        <select id="stage" name="stage" class="form-control">
                                          <option selected="" disabled="">Select Stage</option>
                                          <option value="">All Age Groups</option> 

                                          @php
                                              $user_badges = DB::table('user_badges')->orderBy('id','asc')->get();  
                                          @endphp 
                                          @foreach($user_badges as $bd)
                                            @php
                                              $shop = DB::table('shop_cart_items')->where('shop_type','course')->where('orderID','!=',NULL)->where('child_id',$bd->user_id)->where('course_season',$bd->season_id)->get(); 
                                              $course = DB::table('courses')->where('season',$bd->season_id)->first();
                                              $subcat = [];  
                                            @endphp

                                            @foreach($shop as $sh)
                                              @php
                                                $course = DB::table('courses')->where('id',$sh->product_id)->first();
                                                $subcat = getProductCatname($course->subtype);
                                              @endphp
                                              <option value="{{$course->subtype}}">{{$subcat}}</option>
                                            @endforeach
                                              
                                          @endforeach

                                        </select>
                                      </div>
                                    </div>

                                  <!-- <div class="col-sm-1" style="margin-left:10px">
                                    <a href="" onclick="myFunction();" class="btn btn-primary">Reset</a>
                                  </div> -->                                                               
                                </div> 
                                <div class="col-lg-3 col-md-12 select-button" style="margin-right:10px;">
                                    <button type="submit" class="cstm-btn">Submit</button>
                                    <a href="{{url('/user/badges')}}" class="cstm-btn">Reset</a>
                                </div>
                              </div>  
                            </form>

                          <div class="col-md-12">
                            <div class="leader-board-table">
                              <div class="leadertable-wrap">
                              <table>
                                <thead>
                                  <tr>
                                    <th>Place</th>
                                    <th>Player Name</th>
                                    <th>Player Age</th>
                                    <th>Stage</th>
                                    <th>Tennis Club</th>
                                    <th>Points</th>
                                    <th>Achievements</th>
                                  </tr>
                                </thead>
                                <tbody> 
                                  @php 
                                    $i=1; 
                                  @endphp
                                  @if(!empty($user_badge1) && count($user_badge1)> 0)
                                  @foreach($user_badge1 as $bd)
                                  @php 
                                  $user = DB::table('users')->where('id',$bd->user_id)->first();
                                  $shop = DB::table('shop_cart_items')->where('shop_type','course')->where('orderID','!=',NULL)->where('child_id',$bd->user_id)->where('course_season',$bd->season_id)->get(); 

                                  $course_subcategory = [];
                                  @endphp

                                  @foreach($shop as $sh)
                                    @php
                                      $course = DB::table('courses')->where('id',$sh->product_id)->first();
                                      $course_subcategory[] = getProductCatname($course->subtype);
                                    @endphp
                                  @endforeach

                                  @php
                                  $selected_badges = explode(',',$bd->badges);

                                  $user_age = strtotime($user->date_of_birth); 
                                  $current_date = strtotime(date('Y-m-d')); 
                                  $age_diff = abs($current_date - $user_age);
                                  $years = floor($age_diff / (365*60*60*24));

                                  @endphp
                                  <tr>
                                    <td><p>@php echo $i++; @endphp</p></td>
                                    <td><p>{{$user->name}}</p></td>
                                    <td><p>{{$years}} Years</p></td>
                                    <td><p>{{implode(',',$course_subcategory)}}</p></td>
                                    <td><p>{{$user->tennis_club}}</p></td>
                                    <td><p>
                                    @php
                                      $points = array();
                                    @endphp
                                    @foreach($selected_badges as $data=>$value)

                                    @php 
                                      $badge = DB::table('badges')->where('id',$value)->first(); 
                                      $points[] = $badge->points;
                                    @endphp

                                    @endforeach

                                    @php $total_points = array_sum($points); @endphp
                                    {{$total_points}}
                                    </p></td>
                                    <td>
                                      <ul class="leader-bord-bages">
                                        <li>
                                          <figure>
                                          @foreach($selected_badges as $data=>$value)
                                          @php $badge = DB::table('badges')->where('id',$value)->first(); @endphp
                                            <li title="{!! $badge->description !!}"><img style="width:40px;height:40px; object-fit:contain;" src="{{URL::asset('/uploads')}}/{{$badge->image}}"></li>
                                          @endforeach
                                          </figure>
                                        </li>
                                      </ul>
                                    </td>
                                  </tr>
                                  @endforeach
                                  @else
                                  <tr><td colspan="7"><div class="offset-md-4 col-md-4 sorry_msg"><div class=""><br/><h3>No Data Found</h3></br></div></div></td></tr>
                                  @endif
                                </tbody>
                              </table>
                            </div>
                            {{$user_badge1->render()}}
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="nav-reports" role="tabpanel" aria-labelledby="nav-reports-tab">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="tab-page-heading">
                              <h1>Player Reports</h1>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                          
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="player-achievements-card">
                              <div class="row">

                                <div class="col-lg-7 col-md-7">
                                  <div class="player-info">

                                  </div> 
                                </div>
                              
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                    @php 
                      $logined_user_id = \Auth::user()->id; 
                      $children = DB::table('users')->where('parent_id',$logined_user_id)->orderBy('id','asc')->get();
                    @endphp
                    @if(count($children)> 0)
                    <div class="player-report-table tbl_shadow">
                      <div class="report-table-wrap">
                 

                        <div class="m-b-table">

                        <table>
                        <thead>
                          <tr>
                            <th>Date</th>
                            <th>Report Type</th>
                            <th>Player</th>
                            <th>Season</th>
                            <th>Course</th>
                            <th>Feedback</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>

                          @foreach($children as $rp)

                          @php 
                            $player_id = $rp->id;
                            $report = DB::table('player_reports')->where('player_id',$player_id)->get();
                          @endphp

                          @foreach($report as $sh)
                          <tr>
                            <td><p>@php echo date("d/m/Y", strtotime($sh->date)); @endphp</p></td>
                            <td><p>@if($sh->type == 'simple') End of Term Report @elseif($sh->type == 'complex') Player Report @endif</p></td>
                            <td><p>@php echo getUsername($sh->player_id); @endphp</p></td>
                            <td><p>@if($sh->season_id) @php echo getSeasonname($sh->season_id); @endphp @else - @endif</p></td>
                            <td><p>@if($sh->course_id) @php echo getCourseName($sh->course_id); @endphp @else - @endif</p></td>
                            <td><p>{!! Illuminate\Support\Str::words($sh->feedback, 5, ' ...') !!}</p></td>
                            <td><p><a href="{{url('user/player-report')}}/@php echo base64_encode($sh->id); @endphp">View Report</a></p></td> 
                          </tr>
                          @endforeach

                          @endforeach
                        </tbody>
                      </table>

                    </div>

                    </div>
                  </div>

                    @else
                      <div class="noData offset-md-4 col-md-4 sorry_msg">
                        <div class="no_results">
                          <h3>Sorry, no results</h3>
                          <p>No Report Found</p>
                        </div>
                      </div>
                    @endif


                            
                </div>

                      </div>
                      <div class="tab-pane fade" id="nav-matches" role="tabpanel" aria-labelledby="nav-matches-tab">
                        
                      </div>
                      <div class="tab-pane fade" id="nav-schedule" role="tabpanel" aria-labelledby="nav-schedule-tab">
                        
                      </div>
                      <div class="tab-pane fade" id="nav-stats" role="tabpanel" aria-labelledby="nav-stats-tab">
                        
                      </div>
                    @else
                      <div class="noData offset-md-4 col-md-4 sorry_msg">
                          <div class="no_results">
                            <h3>Sorry, no results</h3>
                            <p>No Data Found</p>
                          </div>
                      </div>
                    @endif


                    </div>                
            </div>
          </div>
        </div>
    </section>

    <!-- ******************************
    |   Testimonial - Start Here
    |********************************** -->
    <section class="testimonial-sec">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="testimonial-heading text-center">
              <div class="section-heading">
                  <h1 class="sec-heading">Testimonials</h1>
                </div>
            </div>    
          </div>
          <div class="col-md-12">
            <div class="testimonial-slider owl-carousel owl-theme">

            @foreach($testimonial as $test)
            <div class="item">
              <div class="testimonial-card alt-testimonial-card">
                <figure class="testimonial-img-wrap">
              <img src="{{ URL::asset('/images/testimonial-card-img-2.png')}}">
              </figure>
                <figcaption class="testimonial-caption">
                    <p>{{$test->description}}</p>
                    <div class="t-user">
                      <div class="round-arrow">
                        <img src="{{ URL::asset('/images/round-arrow-img.png')}}">
                      </div>
                      <h3>{{$test->title}}</h3>
                      <span>
                        @if($test->image)
                          <img src="{{ URL::asset('uploads')}}/{{$test->image}}">
                        @else
                          <img src="{{ URL::asset('images/default.jpg')}}">
                        @endif
                      </span>   
                    </div>
                  </figcaption>
              </div>
            </div>
            @endforeach

          </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ******************************
    |   Testimonial - End Here
    |********************************** -->

    <section class="click-here-sec">
      <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="click-sec-content">
                  <h2 class="click-sec-tagline">Need help with kids camps or our coaching courses?</h2>
                  <ul class="click-btn-content">
                    <li>
                      <figure>
                        <img src="http://49.249.236.30:8654/dominic-new/public/images/click-btn-img.png">
                      </figure>
                    </li>
                    <li>
                        <a href="#" class="cstm-btn">Click Here</a>
                    </li>
                    <li>
                      <figure>
                        <img src="http://49.249.236.30:8654/dominic-new/public/images/click-btn-img.png">
                      </figure>
                    </li>
                    </ul>
                </div>
            </div>
        </div>
      </div>
    </section>

@endsection
