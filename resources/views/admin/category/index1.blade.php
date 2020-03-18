@extends('layouts.admin')
@section('content')
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.min.css">
<div class="page-header">
   <div class="page-block">
      <div class="row align-items-center">
         <div class="col-md-12">
            <div class="page-header-title">
               <h5 class="m-b-10">{{$title}}</h5>
            </div>
            <ul class="breadcrumb">
               <li class="breadcrumb-item"><a href="{{url(route('admin_dashboard'))}}"><i class="feather icon-home"></i></a></li>
               <li class="breadcrumb-item"><a href="{{ url(route($addLink)) }}">Add</a></li>
            </ul>
         </div>
      </div>
   </div>
</div>
<section class="content">
   <div class="row">
      <div class="col-12">
         <div class="card">
            <div class="card-header">
               <h5>Drag & Drop List 
                  <small>Drag & Drop item arrange <b>Category</b></small>
               </h5>
               <!-- <span class="d-block m-t-5">use class <code>table-hover</code> inside table element</span> -->
            </div>
            @include('admin.error_message')
            <div class="card-body">
               <div class="col-md-12">
                  <!--  <h4 class="block"></h4> -->
                  <div class="portlet light bordered">
                     <div class="portlet-title">
                     </div>
                     <div class="portlet-body">
                        <div class="dd category-active" id="nestable_list_3">
                           <ol class="dd-list category-active">
                              @foreach($category as $cate)
                              <li class="dd-item dd3-item " data-id="<?= $cate->id ?>">
                                 <div class="dd-handle dd3-handle"> </div>
                                 <div class="dd3-content" id="dd3-content-<?= $cate->id ?>">
                                    {{$cate->label}} <sup class="{{$cate->status == 0 ? 'redbg' : ''}}"><span class="badge">
                                    <?= $cate->status == 1 ? 'Active' : 'Deactive' ?>
                                    </span></sup>
                                    <ul class="action-btn-wrap">
                                       <li><a href="{{url(route('category_variations', $cate->slug))}}" class=" action-btn btn pull-right btn-success" data-toggle="tooltip" title="Assign Variations"><i class="fa fa-plus"></i></a></li>
                                       <li><a href="{{url(route('edit_category',$cate->slug))}}" class=" action-btn btn pull-right btn-primary" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a> </li>
                                       <li><a href="{{url(route('delete_category', $cate->id))}}" class=" action-btn btn pull-right btn-danger" data-toggle="tooltip" title="Change Status"><i class="fas fa-toggle-on"></i></a></li>
                                    </ul>
                                 </div>
                                 <div class="collapse row" id="collapse<?= $cate->id ?>" aria-expanded="false" style="">
                                 </div>
                                 <ol class="dd-list">
                                    @foreach($cate->subCategory as $sub)
                                    <li class="dd-item dd3-item   " data-id="<?= $sub->id ?>">
                                       <div class="dd-handle dd3-handle"> </div>
                                       <div class="dd3-content" id="dd3-content-<?= $sub->id ?>">
                                          {{$sub->label}} <sup class="{{$sub->status == 0 ? 'redbg' : ''}}"><span class="badge">
                                          <?= $sub->status == 1 ? 'Active' : 'Deactive' ?>
                                          </span></sup>
                                          <ul class="action-btn-wrap">
                                             <li><a href="{{url(route('edit_category',$sub->slug))}}" class="btn pull-right btn-primary action-btn" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a></li>
                                             <li><a href="{{url(route('delete_category',$sub->id))}}" class="btn pull-right btn-danger action-btn" data-toggle="tooltip" title="Change Status"><i class="fa fa-toggle-on"></i></a></li>
                                          </ul>
                                       </div>
                                       <div class="collapse row" id="collapse<?= $sub->id ?>" aria-expanded="false" style="">
                                       </div>
                                       <ol class="dd-list">
                                          @foreach($sub->childCategory as $ch)
                                          <li class="dd-item dd3-item sub-items dd-nochildren"  data-id="<?= $ch->id ?>">
                                             <div class="dd-handle dd3-handle"> </div>
                                             <div class="dd3-content" id="dd3-content-<?= $ch->id ?>"> 
                                                {{$ch->label}} <sup class="{{$ch->status == 0 ? 'redbg' : ''}}"><span class="badge">
                                                <?= $ch->status == 1 ? 'Active' : 'Deactive' ?>
                                                </span></sup>
                                             </div>
                                             <div class="collapse row" id="collapse<?= $ch->id ?>" aria-expanded="false" style="">
                                             </div>
                                          </li>
                                          @endforeach
                                       </ol>
                                    </li>
                                    @endforeach
                                 </ol>
                              </li>
                              @endforeach
                           </ol>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection
@section('scripts')
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.min.js"></script>
<script>
   $(document).ready(function()
   {
   
       // activate Nestable for list 1
       $('#nestable_list_3').nestable()
       .on('change',function(){
            
            var aside_category_active = $('.dd.category-active').nestable('serialize');
   
            console.log(aside_category_active);
   
   
   
             // Begin Ajax
                  $.ajax({
                      url: "<?= url( route('sorting_category') ) ?>",
                      type: "POST",
                      data: { 'list' : aside_category_active }, // serializes the form's elements.
                      dataType: 'json',
                      success: function(res) {
              
                          if(res.status){
              
                              toastr.success(res.notificaltion , {timeOut: 300});
              
              
                          }else{
              
                              toastr.error(res.notificaltion , {timeOut: 300});
              
                          }
                      },
                  });
          // End Ajax
   
   
       });

   function C_collapse() {
      $('#nestable_list_3 .collapse').removeClass('in').attr('aria-expanded','false').html('');
     // $('.updatecategory').attr('data-check','closed');
   }
   
   
   
    
   
   $('.updatecategory').on('click', function () {
   
          C_collapse();
   
         var opened = $( this ).attr('data-check');
   
         if(opened == 'closed'){
   
   
             var id = $(this).attr('data-id');
             var IDDIv = $( this ).attr('aria-controls');
             var BodyDive =$('#'+IDDIv);
            BodyDive.addClass('in').attr('aria-expanded','true');
   
               BodyDive.html('<div class="loading_ajax" style="padding:0px;text-align:center;"><img src=" sasa" ></div>');
   
   
             $( this ).attr('data-check','opened');
             //var Modal = $('#myModalCategory');
              jQuery.ajax({url: "{{ url( route('edit_ajax_category') ) }}", 
                   data: {
                    category_id:id
                   },
                   type: 'get',
                  success: function(result){
                      console.log(result);
                       
                          
                          //Modal.modal('show');
                          BodyDive.html(result);
                  }});
   
         }else{
               $( this ).attr('data-check','closed');
               BodyDive.html('');
         }
   
              return false;
   }); 
       
   });
</script>
@endsection