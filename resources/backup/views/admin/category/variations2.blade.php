@extends('layouts.admin')
 
@section('content')
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
               <h1>{{$title}}</h1> 
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"><a href="{{ url('master/') }}">Dashboard</a></li>
              <li class="breadcrumb-item "><a href="{{ url($addLink) }}">View</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
       <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- /.card-header -->
       @include('admin.error_message')
 
            <div class="card-body">



  <form role="form" id="formBrands" class="row categoryVariants">
      @csrf

        
        <div class="col-md-6">
           

                

                <h3 class="card-title">Choose Brands</h3>
                <ul class="unstyled centered">
                  @foreach($brands as $b)
  
                        <li>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="brand[]" id="styled-checkbox-{{$b->id}}" type="checkbox" value="{{$b->id}}" {{$ControllerOject->checkCheckBrand('brands',$category_id,$b->id)}}>
                            <label class="custom-control-label" for="styled-checkbox-{{$b->id}}">{{$b->brand_name}}</label>
                          </div>
                        </li>

                  @endforeach
                  
                </ul>
                <!-- radio -->




                <h3 class="card-title">Choose Techniques</h3>
                <ul class="unstyled centered">
                  @foreach($techniques as $t)
  
                        <li>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="techniques[]" id="techniques-checkbox-{{$t->id}}" type="checkbox" value="{{$t->id}}"
                             {{$ControllerOject->checkCheckBrand('techniques',$category_id,$b->id)}}>
                            <label class="custom-control-label"for="techniques-checkbox-{{$t->id}}">{{$t->technique_name}}</label>
                          </div>
                            
                        </li>

                  @endforeach
                  
                </ul>
                <!-- radio -->




                 <h3 class="card-title">Choose Styles</h3>
                <ul class="unstyled centered">
                  @foreach($styles as $s)
  
                        <li>
                             <input class="styled-checkbox brand-checkbox" name="styles[]" id="product-style-{{$s->id}}" type="checkbox" value="{{$s->id}}"
                              {{$ControllerOject->checkCheckBrand('styles',$category_id,$s->id)}}>
                             <label for="product-style-{{$s->id}}">{{$s->title}}</label>
                        </li>

                  @endforeach
                  
                </ul>
                <!-- radio -->





               <h3 class="card-title">Choose Materials</h3>
                <ul class="unstyled centered">
                  @foreach($materials as $s)
  
                        <li>
                             <input class="styled-checkbox brand-checkbox" name="materials[]" id="product-materials-{{$s->id}}" type="checkbox" value="{{$s->id}}"
                              {{$ControllerOject->checkCheckBrand('materials',$category_id,$s->id)}}>
                             <label for="product-materials-{{$s->id}}">{{$s->title}}</label>
                        </li>

                  @endforeach
                  
                </ul>
                <!-- radio -->



               <h3 class="card-title">Choose Mockup Capture Area</h3>
                <ul class="unstyled centered">
                  @foreach($CaptureArea as $s)
  
                        <li>
                             <input class="styled-checkbox brand-checkbox" name="CaptureArea[]" id="product-mockuparea-{{$s->id}}" type="checkbox" value="{{$s->id}}"
                              {{$ControllerOject->checkCheckBrand('CaptureArea',$category_id,$s->id)}}>
                             <label for="product-mockuparea-{{$s->id}}">{{$s->product_type}}</label>
                        </li>

                  @endforeach
                  
                </ul>
                <!-- radio -->




              


                           
                
        </div>
       

 


 






       <div class="col-md-6">


                  <h3 class="card-title">Choose Product Model</h3>
                <ul class="unstyled centered">
                  @foreach($ProductModel as $m)
  
                        <li>
                             <input class="styled-checkbox brand-checkbox" 
                             name="ProductModel[]" 
                             id="product-model-{{$m->id}}" type="checkbox" value="{{$m->id}}"
                              {{$ControllerOject->checkCheckBrand('models',$category_id,$m->id)}}>
                             <label for="product-model-{{$m->id}}">{{$m->title}}</label>
                        </li>

                  @endforeach
                  
                </ul>
                <!-- radio -->
          
 
                <h3 class="card-title">Choose Product Sizes</h3>

                <ul class="unstyled centered">
                  @foreach($ProductSize as $size)
  
                        <li>
                             <input class="styled-checkbox brand-checkbox" 
                             name="sizes[]" id="product-size-{{$size->id}}" type="checkbox" value="{{$size->id}}"
                              {{$ControllerOject->checkCheckBrand('sizes',$category_id,$size->id)}}>
                             <label for="product-size-{{$size->id}}">{{$size->title}}</label>
                        </li>

                  @endforeach
                  
                </ul>
                <!-- radio -->
 
        </div>














<div class="col-md-12">
          <div id="msg"></div>

      <button class="btn btn-primary">Save</button>
</div>


















 </form>








              
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

 
 




$('#formBrands').on('submit',function(){
   
   var formData = $( this ).serialize();

var request = $.ajax({
  url: "<?= url(route('store_variations',$category_id)) ?>",
  method: "POST",
  data: formData,
  dataTYPE:'json',
});
 
request.done(function( msg ) {
        if(msg == 0){
          $('#msg').html(msgbox('Invalid category','warning'));
        }else if(msg == 1){
          $('#msg').html(msgbox('Data saved!','success'));
        }
});
 
request.fail(function( jqXHR, textStatus ) {
  alert( "Request failed: " + textStatus );
  $('#msg').html(msgbox("Request failed: " + textStatus,'warning'));
});

 
   return false;

});



function msgbox(msg,ty) {
      text ='<div class="alert alert-'+ty+' alert-dismissible">';
      text +='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
      text +='<h5><i class="icon fa fa-check"></i> Alert!</h5>';
      text +=msg;
      text +='</div>';

      return text;
}



</script>


@endsection


 
