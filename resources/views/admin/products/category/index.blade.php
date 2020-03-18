@extends('layouts.admin')
 
@section('content')



<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.min.css">

 

 <section class="content-header">
      <div class="container-fluid">
        <div class="mb-2">
         
               <div class="page-header-title">
                    <h5 class="m-b-10">{{$title}}</h5>
                </div>
        
        
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('/admin') }}"><i class="feather icon-home"></i></a></li>
              <li class="breadcrumb-item active"><a href="{{ url('/admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item "><a href="{{ url($addLink) }}">Add</a></li>
            </ol>
       
        </div>
      </div><!-- /.container-fluid -->
    </section>
       <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- /.card-header -->
        
        @include('admin.error_message')

        <div class="card-header">
             <h5>Drag & Drop <b>Category</b> Items</h5>   
             <div class="cst-admin-filter">
                <a href="{{ url($addLink) }}" class="btn btn-primary">Add</a>
             </div>                                         
        </div>
        
            <div class="card-body">

  

<div class="col-md-12">
              <!--  <h4 class="block">Drag & Drop List 
                        <small>Drag & Drop item arrange <b>Category</b></small></h4> -->
                     <div class="portlet light bordered">
                        <div class="portlet-title">
                            
                        </div>
                        <div class="portlet-body">
                           <!-- Begin list Active -->
                           <div class="dd category-active" id="nestable_list_3">
                              <ol class="dd-list category-active">
                                 
                             @foreach($category as $cate)
                                 <li class="dd-item dd3-item " data-id="<?= $cate->id ?>">
                                    <div class="dd-handle dd3-handle"> </div>
                                    <div class="dd3-content" id="dd3-content-<?= $cate->id ?>">
                                    	<div class="dragDrop-content">
                                       <div class="dragDrop-title"> 
                                        {{$cate->label}} <sup class="{{$cate->status == 0 ? 'redbg' : ''}}"><span class="badge">
                                               <?= $cate->status == 1 ? 'Active' : 'Deactive' ?>
                                               </span></sup>
                                           </div> 

                                               <div class="dragDrop-btn-wrap">
                                               <a class="DragDrop-accordion-btn" data-toggle="collapse" href="#DragDrop-collapse-{{$cate->id}}" role="button" aria-expanded="false" aria-controls="DragDrop-collapse-{{$cate->id}}"><i class="fas fa-plus"></i></a>
                                        <!-- <a href="{{url(route('admin.products.category.edit',$cate->id))}}">Edit</a> -->
                                        <div class="dropdown uix-dropdown">
                                                    <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                     <span><i class="fas fa-user-cog"></i></span>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                     
                                                      <a class="dropdown-item" href="{{url(route('admin.products.category.edit',$cate->id))}}">Edit</a>
                                                    </div>
                                                  </div>
                                              </div>
                                           </div>
                                        </div>                              

                                    
                                     <!-- <div class="card card-body"> -->
 
                                    <ol class="dd-list">
                                      @foreach($cate->subCategory as $sub)
                                      
                                       <li class="dd-item dd3-item   " data-id="<?= $sub->id ?>">
                                          <div class="dd-handle dd3-handle"> </div>
                                          <div class="dd3-content" id="dd3-content-<?= $sub->id ?>"> 
                                             {{$sub->label}} <sup class="{{$sub->status == 0 ? 'redbg' : ''}}"><span class="badge">
                                               <?= $sub->status == 1 ? 'Active' : 'Deactive' ?>
                                               </span></sup>
                                               <!-- <a href="{{url(route('admin.products.category.edit',$sub->id))}}">Edit</a>
                                               <a href="{{url(route('admin.products.category.variation',$sub->id))}}">Add Variation</a> -->

                                                <div class="dropdown uix-dropdown">
                                                    <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                     <span><i class="fas fa-user-cog"></i></span>
                                                    </button>


                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                                      @if($sub->type == 'Product')
                                                        <a class="dropdown-item" href="{{url(route('admin.products.category.variation',$sub->id))}}">Add Variation</a>
                                                      @endif
                                                      <a class="dropdown-item" href="{{url(route('admin.products.category.edit',$sub->id))}}">Edit</a>
                                                    </div>
                                                  </div>                                                           
                                                </div>                                        
 
                                                  <ol class="dd-list">
                                                    @foreach($sub->childCategory as $ch)
                                                     <li class="dd-item dd3-item sub-items dd-nochildren"  data-id="<?= $ch->id ?>">
                                                        <div class="dd-handle dd3-handle"> </div>
                                                        <div class="dd3-content" id="dd3-content-<?= $ch->id ?>"> 
                                                                  {{$ch->label}} <sup class="{{$ch->status == 0 ? 'redbg' : ''}}"><span class="badge">
                                                                                      <?= $ch->status == 1 ? 'Active' : 'Deactive' ?>
                                                                   </span>
                                                                 </sup>
                                                                


                                                               <div class="dropdown uix-dropdown">
                                                    <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                     <span><i class="fas fa-user-cog"></i></span>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                     
                                                      <a class="dropdown-item" href="{{url(route('admin.products.category.edit',$ch->id))}}">Edit</a>
                                                    </div>
                                                  </div>



                                                         
                                                        </div>

                                                          

 


                                                   </li>

                                                   @endforeach
                                                </ol>


                                    </li>
                                    @endforeach
                                    </ol>
                                  <!-- </div> -->
                                

                                     </li>
                                    @endforeach
                                                 
                              </ol>
                           </div>
                           <!-- End list Active -->
                        </div>
                     </div>
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
                   url: "<?= url( route('admin.products.category.sorting') ) ?>",
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
