@extends('layouts.admin')
@section('content')

<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Course Register Template</h5>
                </div>
                <br/>
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

                        <h5>Course : {{$course->title}}</h5>
                       
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>

<section class="course-detail-table camp-detail-table">
    <div class="container">
        <div class="inner-cont">
            <div class="outer-wrap camp-person-detail">
            <table class="table table-bordered person-detail">
                <thead>
                    <tr>
                        <th>Category:</th>
                        <td>@php echo getProductCatname($course->type); @endphp</td>
                    </tr>
                    <tr>
                        <th>Group:</th>
                        <td>{{$course->age_group}}</td>
                    </tr>

                    <tr>
                        <th>Location:</th>
                        <td>{{$course->location}}</td>
                    </tr><tr>
                          <th>Season:</th>
                        <td>@php echo getSeasonname($course->season); @endphp</td>
                    </tr>

                    <tr>
                          <th>Coach:</th>
                        <td>@php echo getUsername($course->linked_coach); @endphp</td>
                    </tr>
                   <!--  <tr>
                          <th>Lorem ipsum:</th>
                        <td>Lorem ipsum:</td>
                    </tr> -->
                </thead>
            </table>
            <figure>
                <img src="http://49.249.236.30:8654/dominic-new/public/uploads/1584078701website_logo.png">
            </figure>
        </div>
            <table class="table table-bordered camp-table">
                <thead>
                    <tr>
                        <th>Player Name</th>
                        <th>Player DOB</th>
                        <th>Med Y/N</th>
                        <th>Parent Name</th>
                        <th>Parent Tel</th>
                        <th class="camp-date">Jun-27</th>
                        <th class="camp-date">Jul-4</th>
                        <th class="camp-date">Jul-11</th>
                        <th class="camp-date">Jul-18</th>
                        <th class="camp-date">Jul-25</th>
                        <th class="camp-date">Aug-01</th>
                        <th class="camp-date">Aug-08</th>
                        <th class="camp-date">Aug-15</th>
                        <th class="camp-date">Aug-22</th>
                        <th class="camp-date">Aug-29</th>
                        <th>Parent Email</th>
                     

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        
                        <td>1</td>
                        <td></td>
                        <td></td>
                        <td></td>                      
                        <td></td>                        
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>                        
                    </tr>
                    <tr>
                        
                        <td>2</td>
                        <td></td>
                        <td></td>
                        <td></td>                      
                        <td></td>                        
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>                        
                    </tr>
                    
                        
                </tbody>
            </table>
        </div>
        
    </div>
</section>
@endsection