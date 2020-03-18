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
                <li class="breadcrumb-item"><a href="javascript:void(0)">Amenities</a></li>
            </ul>
        </div>
        <div class="side-btns-wrap">
         
        </div>
  </div>

@include('vendors.errors')

 

    <div class="row">
       <div class="col-lg-12">
          <div class="card vendor-dash-card">
          <div class="card-header"><h3>{{$title}}</h3></div>
           <div class="card-body">
               <form id="assignCategory">
              <div class="row ">
                @if($category->categoryAmenity->count() > 0) 
                

                <div class="col-lg-6">
                  <h4>Amenities</h4>
                 @foreach($category->categoryAmenity as $cate)


                   <div class="vendor-category">
                      <div class="category-checkboxes category-title">
                      <input type="checkbox" name="amenity[]" value="{{$cate->Amenity->id}}" id="category-{{$cate->Amenity->id}}"
                      {{amenities(\Auth::user()->id,$category->id,$cate->Amenity->id)}}>
                           <label for="category-{{$cate->Amenity->id}}">{{$cate->Amenity->name}}  </label>
                    </div>
                   </div>
 
                 @endforeach
                </div>



                <div class="col-lg-6">
                  <h4>Games</h4>
                 @foreach($category->CategoryGames as $cate)


                   <div class="vendor-category">
                      <div class="category-checkboxes category-title">
                      <input type="checkbox" name="amenity[]" value="{{$cate->Games->id}}" id="category-{{$cate->Games->id}}" {{amenities(\Auth::user()->id,$category->id,$cate->Games->id)}}
                      >
                           <label for="category-{{$cate->Games->id}}">{{$cate->Games->name}}  </label>
                    </div>
                   </div>
 
                 @endforeach
                </div>



                 <div class="col-md-12">
                      @csrf 
                      <div class="btn-wrap mt-2 mb-3">
                      <button class="cstm-btn" id="assignCategoryBtn">Assign</button>
                    </div>
                      <div class="errorMessages"></div>
                 </div>

                  @else
                   <div class="col-md-12">
                    <div class="alert alert-warning" role="alert">Amenities are not assigned to this Category.</div>
                  </div>

                 @endif
                 </div>
                </form>

           </div>
        </div>
     </div>
   </div>
</div>















@endsection


@section('scripts')
<script src="{{url('/js/validations/amenityValidation.js')}}"></script>

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
        txt += ErrorMsg('danger',value);
          //  txt +='<li>'+ value +'</li>';
      });
     /// txt +='</ul>';

      return txt;
}

  function assignCategory($this) {
      $.ajax({
         url : "<?= url(route('vendor_amenity_management',$category->slug)) ?>",
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
                     // $this[0].reset();
                      
                    // $this.find('.errorMessages').html(ErrorMsg('success',data.msg));
                      $("body").find('#globalMessages').html(ErrorMsg('success',data.msg));
                     
                     // window.location.href = data.redirect_links;
                     return true;

                } else if(parseInt(data.status) == 2) {
                    
                       //$this.find('.errorMessages').html(ErrorMsg('warning',data.msg));
                       $("body").find('#globalMessages').html(ErrorMsg('warning',data.msg));
                       $this.find('button').removeAttr('disabled');
                      $("body").find('.loadingDiv').hide();
                     
                }else if(parseInt(data.status) == 0){
                    
                      //$this.find('.errorMessages').html(erorrMessage(data.errors));
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