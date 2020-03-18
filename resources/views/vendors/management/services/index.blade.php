@extends('layouts.vendor')
@section('vendorContents')


<div class="container-fluid">

 <div class="page_head-card">
    <div class="page-info">
            <div class="page-header-title">
                <h3 class="m-b-10">{{$title}}</h3>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('vendor_dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Services</a></li>
            </ul>
        </div>
        <div class="side-btns-wrap">
         
        </div>
  </div>
@include('vendors.errors')
 
       <form id="assignCategory">
    <div class="row">
       <div class="col-lg-12">
          <div class="card vendor-dash-card">
         <div class="card-header"><h3>{{$title}}</h3></div>
           <div class="card-body">

              
                 <div class="row ">
                    @if($cate->subcategory->count() > 0)
                          <input type="hidden" name="category_id" value="{{$category->category_id}}">
                          @foreach($cate->subcategory as $sub)
                         <div class="col-lg-6">
                             <div class="vendor-category">
                              <div class="category-checkboxes">
                                  <input type="checkbox" name="services[]" value="{{$sub->id}}" id="subcategory-{{$sub->id}}" {{categories(Auth::user()->id,$sub->id)}}>
                                  <label for="subcategory-{{$sub->id}}">{{$sub->label}}</label>
                               </div>
                             </div>

                         </div>

                          @endforeach

                    @endif


                    <input type="hidden" name="url" value="{{url(route('get_vendor_services_management',$category->slug))}}">
                       <div class="col-md-12">
                            @csrf 
                      <div class="btn-wrap mt-2 mb-3">
                            <button class="cstm-btn" id="assignCategoryBtn">Assign</button>
                          </div>
                            <div class="errorMessages"></div>
                       </div>
                  
                    </div>
                   </div>
                   
                 
                  
               </div>
                </form>
                 </div>
           </div>
        
</div>

@endsection

@section('scripts')
<script src="{{url('/js/validations/serviceValidation.js')}}"></script>

<script type="text/javascript">

    function ErrorMsg(type,message){

      var txt='';
          txt +='<div class="alert alert-'+type+'" role="alert">';
      txt +=message;
      txt +='</div>';
    return txt;
  }



function erorrMessage(errors) {
 


      var txt ="";
      $.each(errors, function( index, value ) {
        txt += ErrorMsg('error',value);
          //  txt +='<li>'+ value +'</li>';
      });
     /// txt +='</ul>';

      return txt;
}

  function assignCategory($this) {
      $.ajax({
               url : "<?= url(route('vendor_eservices_management',$category->slug)) ?>",
               data : $this.serialize(),
               type: 'POST',  // http method
               dataTYPE:'JSON',
               headers: {
                 'X-CSRF-TOKEN': $('input[name=_token]').val()
               },
                beforeSend: function() {
                     $this.find('button').attr('disabled','true');
                     $("body").find('.loadingDiv').show();
                },
                success: function (data) {
                    if(parseInt(data.status) == 1){
                           $this[0].reset();
                            $("body").find('#globalMessages').html(ErrorMsg('success',data.msg));
                            
                            // setTimeout(() => {
                            //   window.location.href = data.redirect_links;
                            // }, 3000)
                             
                            
                             return true;


                      }else{
                          
                           $("body").find('#globalMessages').html(erorrMessage(data.errors));

                            $this.find('button').removeAttr('disabled');
                            $("body").find('.loadingDiv').hide();
                           
                      }
                    
               },
               complete: function() {
                    $this.find('button').removeAttr('disabled');
                    $("body").find('.loadingDiv').hide();
               },
               error: function (jqXhr, textStatus, errorMessage) {
                     $this.find('button').removeAttr('disabled');
               }

        });
  }


  $("body").on('submit','#assignCategory',function(e){
      e.preventDefault();
      assignCategory($(this));
  });


</script>






@endsection