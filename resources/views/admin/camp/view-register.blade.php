@extends('layouts.admin')
@section('content')

<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">View Register</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url(route('admin_dashboard'))}}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Registers</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- [ breadcrumb ] end -->
<div class="main-body">
    <div class="page-wrapper">
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ Hover-table ] start -->
            <div class="col-xl-12">
                <div class="card">
                  <div class="card-block table-border-style"> 
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr> 
                                    <th>Player Name</th>
                                    <th>Details</th>  
                                </tr>
                                </thead>
                                <tbody>

                                @if(count($shop)> 0)  
                                @foreach($shop as $cart)

                                  @if($cart->shop_type == 'camp')
                                  @php 
                                    $week = json_decode($cart->week); 
                                    $camp_id = $cart->product_id;
                                    $camp = DB::table('camps')->where('id',$camp_id)->first();  
                                    $child = DB::table('users')->where('id',$cart->child_id)->first();
                                  @endphp
                                    <tr>           
                                        <td>{{isset($child->name) ? $child->name : 'No Child Selected'}}</td>                               
                                        <td>
                                          <p><b>Camp</b> - {{$camp->title}}</p>
                                         
                                          <p>
                                            @foreach($week as $number=>$number_array)

                                            @foreach($number_array as $data=>$user_data)

                                              @foreach($user_data as $data1=>$user_data1)
                                                @php 
                                                  $split = explode('-',$user_data1);
                                                  $get_session = $split[2];
                                                @endphp
                                                @if($get_session == 'early')
                                                  {{$number}} - {{$data1}} - Early Drop Off<br/>
                                                @elseif($get_session == 'mor')
                                                  {{$number}} - {{$data1}} - Morning<br/>
                                                @elseif($get_session == 'noon')
                                                  {{$number}} - {{$data1}} - Afternoon<br/>
                                                @elseif($get_session == 'lunch')
                                                  {{$number}} - {{$data1}} - Lunch Club<br/>
                                                @elseif($get_session == 'late')
                                                  {{$number}} - {{$data1}} - Late Pickup<br/>
                                                @elseif($get_session == 'full')
                                                  {{$number}} - {{$data1}} - Full Day<br/>
                                                @endif
                                              @endforeach
                                            
                                              @endforeach

                                          @endforeach
                                          </p>
                                          
                                        </td>                                
                                    </tr> 
                                  @endif
                                @endforeach

                                @else
                                  <tr><td colspan="2"><div class="no_results"><h3>No result found.</h3></div></td></tr>
                                @endif
                                </tbody>
                            </table>
                        </div> 

                    </div>
                                               
              @include('admin.error_message')

          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('scripts')
<script type="text/javascript">
 
 
 
</script>
     
@endsection