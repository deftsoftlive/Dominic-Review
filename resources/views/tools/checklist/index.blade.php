
@extends('layouts.home')
@section('content')
 @include('admin.error_message')

 @include('tools.checklist.includes.popups')
 

<section class="log-sign-banner aos-init aos-animate" data-aos="fade-up" data-aos-duration="3000" "="" style="background:url('/frontend/images/banner-bg.png');">
    <div class="container">
            <div class="page-title text-center">
                   <h1>Event Checklist</h1>
                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
                </div>
            </div>    
        </section>



 
    <section class="services-tab-sec ">
        <div class="container">
      
           <div class="sec-card">
                <div class="tab-wrap">
                    <div class="form-tab-slider owl-carousel owl-theme">
                        <div class="item">
                            <div class="tab-button">
                                <div class="tab-item">
                                    <a href="javascript:void();" data-tag="twenty-three" >
                                        <span class="service-icon">
                                            <i class="fas fa-ring"></i>
                                        </span>
                                        <h3>My Wedding</h3>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="item">
                            <div class="tab-button">
                                <div class="tab-item active">
                                    <a href="{{url(route('user.tool.checklist',$event->slug))}}" data-tag="one" class="activelink">
                                        <span class="service-icon"><i class="fas fa-list"></i></span>
                                        <h3>Checklist</h3>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="tab-button">
                                <div class="tab-item">
                                    <a href="javascript:void();" data-tag="two" class="">
                                        <span class="service-icon"><i class="fas fa-folder-open"></i></span>
                                        <h3>Vendor Manager</h3>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="tab-button">
                                <div class="tab-item"> <a href="javascript:void();" data- tag="three" class="">
                                        <span class="service-icon"><i class="fas fa-users"></i></span>
                                        <h3>Guest List</h3>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="tab-button">
                                <div class="tab-item">
                                    <a href="javascript:void();" data-tag="four" class="">
                                        <span class="service-icon"><i class="fas fa-sliders-h"></i></span>
                                        <h3>Seating Chart</h3>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="tab-button">
                                <div class="tab-item">
                                    <a href="javascript:void();" data-tag="five" class="">
                                        <span class="service-icon"><i class="fas fa-calculator"></i></span>
                                        <h3>Bugget</h3>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="tab-button">
                                <div class="tab-item">
                                    <a href="javascript:void();" data-tag="six" class="">
                                        <span class="service-icon"><i class="fas fa-gift"></i></span>
                                        <h3>Registry </h3>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="tab-button">
                                <div class="tab-item">
                                    <a href="javascript:void();" data-tag="six" class="">
                                        <span class="service-icon"><i class="fas fa-wifi"></i></span>
                                        <h3>Wedding Website </h3>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <!-- tab 3 content -->
                    <div class="tab-data" id="twenty-three">
                        <div class="checklist-wrap">
                            <span class="aside-toggle">
                                <i class="fa fa-bars"></i>
                                <span class="cross-class">
                                    <i class="fas fa-times"></i>
                                </span>
                            </span>
                            <div class="row">
                                @include('tools.checklist.includes.sidebar')
                                <div class="col-md-9 col-sm-9">
                                    <div class="eventlist-text">
                                        <div class="event-task">
                                            <a href="javascirpt:void(0);" 
                                            data-toggle="modal" data-target="#addNewTaskModal" class="task-btn">
                                                Add a New task<span><i class="fas fa-plus"></i></span>
                                            </a>
                                            
                                            <div class="icons">
                                                <a href="{{route('user.tool.getPDFTaskContent',$event->slug)}}">
                                                    <i class="fas fa-file-download"></i>
                                                </a>
                                                <a href="{{route('user.tool.getprintTaskContent',$event->slug)}}" target="_blank" >
                                                    <i class="fas fa-print"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="planning-list-wrap main-planning-list" id="loadCheckListTasks">
                                            
                                   </div>
                                    
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner section starts Ends here -->           







 
     
@endsection



@section('scripts')
    <script type="text/javascript" src="{{url('/tools/checklist/script.js')}}"></script>
    <script type="text/javascript" src="{{url('/pintable/dist/jQuery.print.min.js')}}"></script>
    <script type="text/javascript">
             let $status = parseInt($("body").find('#chooseTaskModalStatus').val());
             function chooseTaskModalShow() {
                 var $modal = $("body").find('#chooseTaskModal');
                    $modal.modal({
                        backdrop: 'static',
                        keyboard: false
                    });
             }

                 $(".js-select2").select2();
                 $(".js-select2-multi").select2();

  $(".large").select2({
    dropdownCssClass: "big-drop",
  });
      
    </script>
@endsection
