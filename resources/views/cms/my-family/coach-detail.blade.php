@extends('inc.homelayout')

@section('title', 'DRH|Register')

@section('content')

@endsection

@php 
    $coach_id = $coach->id;   
    $coach_profile = DB::table('coach_profiles')->where('coach_id',$coach_id)->first();  
@endphp
<br/><br/>
<br/><br/>

<section class=" section-padding coach_detail">
  <div class="container">
    <div class="pink-heading">
    <h2>Coach details</h2>
  </div>

    @if(Session::has('success'))
    <div class="alert_msg alert alert-success">
       <p>{{ Session::get('success') }} </p>
    </div>
    @elseif(Session::has('error'))
    <div class="alert_msg alert alert-danger">
       <p>{{ Session::get('error') }} </p>
    </div>
    @endif

    <div class="all-members">
	  <div class="row">
	    <div class="offset-lg-0 col-lg-4 offset-md-3 col-md-6">
			<div class="activity-card text-center">
                <figure class="activity-card-img">
                    @if(!empty($coach_profile))
                        @if($coach_profile->image)
                            <img src="{{ URL::asset('/uploads').'/'.$coach_profile->image }}">
                        @else
                            <img src="{{ URL::asset('/images').'/default.jpg' }}">
                        @endif
                    @else
                        <img src="{{ URL::asset('/images').'/default.jpg' }}">
                    @endif
                </figure>
                <figcaption class="activity-caption"> 
                    <h2>{{$coach->name}}</h2>   
                </figcaption>
            </div>
		</div> <div class="col-lg-8 col-md-12">
            <div class="card coach_profile">
                <div class="card-header">Coach Profile</div>  
                        <div class="row">
                        	<div class=" col-md-12 coach details">
                        		<ul>
                        			<li>
                        				<strong>Profile Name <span>:</span> </strong>
                        				<span>{{isset($coach_profile->profile_name) ? $coach_profile->profile_name : '-'}}</span>
                        			</li>
                        			<li>
                        				<strong>Tennis Club <span>:</span> </strong>
                        				<span>{{isset($coach_profile->qualified_clubs) ? $coach_profile->qualified_clubs : '-'}}</span>
                        			</li>
                        			<li>
                        				<strong> Qualifications <span>:</span> </strong>
                        				<span>{{isset($coach_profile->qualifications) ? $coach_profile->qualifications : '-'}}</span>
                        			</li>
                        			<li>
                        				<strong> Personal Statement <span>:</span> </strong>
                        				<span>{{isset($coach_profile->personal_statement) ? $coach_profile->personal_statement : '-'}}</span>
                        			</li>
                        		</ul>
                        	 
                                <br/>


                        <form method="POST" id="request-coach" action="{{route('parent_coach')}}">
                            @csrf

                        @if(Auth::check())
                            @php 
                                $cp = DB::table('parent_coach_reqs')->where('coach_id',$coach_id)->where('parent_id',Auth::user()->id)->get();
                            @endphp 

                            <input type="hidden" name="parent_id" value="{{Auth::user()->id}}">
                            <input type="hidden" name="coach_id" value="{{$coach_id}}">
                            <select id="inputPlayer-3" name="child" class="form-control event-dropdown">
                                <option value="" selected="" disabled="">Select Player</option>
                                @if(Auth::check())
                                  @php 
                                    $children = DB::table('users')->where('parent_id',Auth::user()->id)->get(); 
                                  @endphp
                                @foreach($children as $child)
                                    <option value="{{$child->id}}">{{$child->name}}</option>
                                @endforeach
                                @endif
                            </select>
                            <br/>
                    <div class="col-md-12 form-btn pl-0"> 
                        <button type="submit" id="coach-link" class="cstm-btn">Link to this coach</button>
                    </div> 
            @else
                <div class="col-md-12 form-btn pl-0"> 
                    <a href="{{route('login')}}" id="coach-link" class="cstm-btn">Link to this coach</a>
                </div>
            @endif
        </form>
        </div> 
	  </div>
	</div>
  </div>
</section>