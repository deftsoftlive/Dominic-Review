@extends('layouts.admin')
@section('content')

<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Package Course</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url(route('admin_dashboard'))}}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Package Course</a></li>
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
                    <div class="card-header">
                      <h5>
                         Package Course 
                      </h5>
                    </div> 

                  <div class="card-block table-border-style"> 

                    <b style="font-size:16px; color:#3f4d67;">Player Name : {{isset($single_course->player_id) ? getUsername($single_course->player_id) : getUsername($single_course->parent_id)}}</b>
                    <br/>

                    <b style="font-size:16px; color:#3f4d67;">Package Issue Date : {{date('d-m-Y',strtotime($single_course->created_at))}}</b>
                    <br/>

                    <b style="font-size:16px; color:#3f4d67;">Payment Date : {{isset($single_course->payment_date) ? date('d-m-Y',strtotime($single_course->payment_date)) : '-'}}</b>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr> 
                                    <th width="80%">Package Course</th> 
                                    <th>Price Details</th> 
                                </tr>
                                </thead>
                                <tbody>

                                  @foreach($courses as $co)
                                    <tr>           
                                        <td>
                                          <p>
                                            @php 
                                              $course = DB::table('courses')->where('id',$co->course_id)->first();
                                            @endphp

                                            <b>Course Name</b> : {{$course->title}}<br/>
                                            <b>Location</b> : {{$course->location}}<br/>
                                            <b>Day/Time</b> : {{$course->day_time}}<br/>
                                          </p>  
                                        </td>
                                        <td>&pound;{{$co->price}}</td>                                
                                    </tr> 
                                  @endforeach

                                </tbody>
                            </table>
                        </div> 

                      <div class="row">
                        <div class="col-lg-6">
                        </div>

                        <div class="col-lg-6">
                             <div class="total-price-wrap full-invoice">
                                <div id="cartTotals">
                                  <div class="total-price-wrap">
                                  
                                 <div id="cartTotals">
                                    <div class="cart-totals ">
                                              <div class="text-center cst_heading">
                                              <h3>Full Invoice</h3>
                                            </div> 

                                              <table class="cart-table margin-top-5">
                                                 
                                                 
                                                <tbody>

                                                  <tr>
                                                    <th>Courses Subtotal</th>
                                                    <td>
                                                      @php 
                                                          $bookings = DB::table('package_courses')->where('booking_no',$booking_no)->get();
                                                          $total = [];
                                                      @endphp
                                                      @foreach($bookings as $book)
                                                         @php $total[] = $book->price;  @endphp
                                                      @endforeach
                                                      @php $package_cost = array_sum($total); @endphp
                                                      
                                                      <strong>&pound;{{$package_cost}}</strong>
                                                    </td>
                                                  </tr>
                                                               
                                              </tbody>
                                            </table>
                           
                                    </div>
                                 </div>
                                   
                                </div>
                              </div>
                             </div>
                        </div>
                      </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection