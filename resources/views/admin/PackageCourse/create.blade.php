@extends('layouts.admin')
 
@section('content')
 <div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">{{$title}}</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url(route('admin_dashboard'))}}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item "><a href="{{ url('package-course') }}">View</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

       <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- /.card-header -->
       <!-- @include('admin.error_message') -->

        @if(Session::has('success'))
        <div class="alert_msg alert alert-success">
            <p>{{ Session::get('success') }} </p>
        </div>
        @endif

        @if(Session::has('error'))
        <div class="alert_msg alert alert-danger">
            <p>{{ Session::get('error') }} </p>
        </div>
        @endif
 
            <div class="card-body">


                    <div class="col-md-12">

                       <form class="ch_course" method="POST" action="{{route('admin.packageCourse.create')}}" enctype="multipart/form-data">
                
                        @csrf

                        @php
                          $count=1;  
                        @endphp

                          <label class="control-label">Select Parent<span class="cst-upper-star">*</span></label>
                          @php 
                            $parents = DB::table('users')->where('role_id','2')->get(); 
                          @endphp

                          <select class="form-control" id="parent_id" name="parent">
                            <option disabled selected="" value="">Select Parent</option>
                            @foreach($parents as $sh)
                              <option value="{{$sh->id}}">@php echo getUsername($sh->id); echo ' - '; echo getUseremail($sh->id); @endphp</option>
                            @endforeach
                          </select>
                          <input type="hidden" id="parent" class="" name="parent_id">

                          <label class="control-label">Select Player</label>
                          <select class="form-control" id="player_id" name="player">
                            <option disabled selected="" value="">Select Player</option>
                          </select>
                          <input type="hidden" id="player" name="player_id">

                          <label class="control-label">Payment Account Name<span class="cst-upper-star">*</span></label>
                          @php $stripe_accounts = DB::table('stripe_accounts')->where('status',1)->orderby('id','desc')->get(); @endphp
                          <select class="form-control" id="select_account" name="account">
                            <option disabled selected="" value="">Select Account</option>
                            @foreach($stripe_accounts as $acc)
                              <option value="{{$acc->id}}">{{$acc->account_name}}</option>
                            @endforeach
                          </select>

                          <input type="hidden" id="account_id" name="account_id">


                           <br/><br/>

                          <table class="add_on_services">
                          <thead>
                            <tr>
                                <th>Course</th>
                                <th class="course_content_center">Price</th>
                                <th><a onclick="addnewsection();" href="javascript:void(0);"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></th>
                            </tr>
                          </thead>
                          <tbody>

                             

                            <div class="form-group">
                              <label class="control-label" for="timelsots">Courses Data</label>

                              <p style="font-size:16px;color:#3f4d67;"><b>Please Note</b>: Courses will only appear if there are available spaces, the player has the correct age and they are not already booked on the course - Thank you!</p>
                              

                                <!-- ******************************
                                |     Courses Dates
                                | ********************************* -->
                              
                                  <input type="hidden" id="noOfQuetion" value="{{$count}}">
                                  <div class="mainQuestions" id="mainQuestions">

                                 <!--  <tr class="timeslots slots{{$count}}" value={{$count}}>
                                    <td>
                                      <select class="form-control append_courses-{{$count}}" name="course[{{$count}}]" required>
                                        <option selected="" disabled="">Select Course</option>
                                      </select>
                                    </td>
                                    <td><input type="text" class="form-control" name="price[{{$count}}]" required></td>
                                    <td><a onclick="removeSection({{$count}});" href="javascript:void(0);"><i class="fa fa-minus-circle" aria-hidden="true"></i></a></td>
                                        
                                  </tr> -->
                                  
                                  </div>
                                  </tbody>
                              </table>
                          

                        <div class="card-footer pl-0">
                          <button onclick="return confirm('Are you sure you want to send this course package payment link')" type="submit" id="btnVanue" class="btn btn-primary">Send Payment Link</button>
                        </div>
                     </form>


                    </div>


            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

 
     
@endsection

@section('scripts')

<script type="text/javascript">

    function AddMoreAjaxPackageCourse(parent,player,account,number)
    {
        console.log(parent,player,account,number);

        $.ajax({
            url:$base_url+"/admin/get-courses",
            method:'GET',
            data:{account:account,parent:parent,player:player,number:number},
            dataType:'json',
            success:function(data)
            {   
                $('.append_courses-'+data.number).html(data.option);
            },      
        })
    }

    function addnewsection(){
        //noOfattribute
        var number = parseInt($("#noOfQuetion").val());  
        var newnumber =number+1;                        
        $("#noOfQuetion").val(newnumber);

        $account = $("#account_id").val();
        $player  = $("#parent").val();
        $parent  = $("#player").val();
        $number  = number+1;  

        AddMoreAjaxPackageCourse($parent,$player,$account,$number);

        var mainHtml='<tr class="timeslots slots'+newnumber+'" value="'+newnumber+'"><td><select class="form-control append_courses-'+newnumber+'" name="course['+newnumber+']" required><option>Select Course</option></select></td>';

        mainHtml+='<td><input type="text" class="form-control" name="price['+newnumber+']" required></td>';

        mainHtml+='<td><a href="javascript:void(0);" onclick="removeSection('+newnumber+');"><i class="fa fa-minus-circle" aria-hidden="true"></i></a></td></tr>';

        $(".add_on_services").append(mainHtml);
  
    }


    function removeSection(counter){
        //noOfattribute
        var number = parseInt($("#noOfQuetion").val());  
        $(".slots"+ counter).remove();
    }

</script>
@endsection
