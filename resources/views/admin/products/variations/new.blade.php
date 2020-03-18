@extends('layouts.admin')
 
@section('content')
 <div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">{{ $title }}</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url(route('admin_dashboard'))}}"><i class="feather icon-home"></i></a></li>
                    
                     
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
       @include('admin.error_message')
 
            <div class="card-body">

<div class="row">

<div class="col-md-4">

     <form role="form" method="post" class="row" id="faqForm" enctype="multipart/form-data">
    @csrf

          

         {{textbox($errors, 'Variation Name*', 'name',$val)}}

         <div class="form-group" style="opacity: 0">
              <label class="control-label">Selectable</label>
              <select class="form-control" name="selectable">
                 <option value="single">Single</option>
                 <option value="multiple">Single</option>
              </select>

         </div>


 
         <div>

        
                <ul class="unstyled centered" style="opacity: 0">
                    <li>
                       <div class="custom-control custom-checkbox">
                             <input type="checkbox" 
                                    class="custom-control-input" 
                                    id="checkbox-price" 
                                    type="checkbox" 
                                    value="price" 
                                    name="extra[]"
                                    {{$variation_id > 0 && !empty($vary) && in_array('price',$vary) ? 'checked' : ''}}>
                          <label class="custom-control-label" for="checkbox-price">Price vary for each Item</label>
                      </div>
                    </li>

                    <li>
                       <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="checkbox-stock" 
                          type="checkbox" value="stock" name="extra[]"  {{$variation_id > 0 && !empty($vary) && in_array('stock',$vary) ? 'checked' : ''}}>
                          <label class="custom-control-label" for="checkbox-stock">Quantities vary for each Item</label>
                      </div>
                    </li>

                </ul>


         </div>

 
         
       
         <div class="card-footer">
           <button type="submit" id="faqFormBtn" class="btn btn-primary">Create</button>
         </div>
    </form>


</div>
<div class="col-md-8">
  <div class="table-responsive">
    <table class="table cstm-admin-table">
      <tr>
        <th class="">Sr.no</th><th class="">Variation</th><th class="">Meta Tag</th><th class="">Status</th><th class="">Action</th>
      </tr>

      @foreach($variations as $k => $v)
        <tr>
          <td>{{$k + 1}}</td>
          <td>{{$v->name}}</td>
          <td>{{$v->type}}</td>
          <td>{{$v->status == 1 ? 'Active' : 'In-Active'}}</td>
          <td>
            <div class="btn-group">
              <button type="button" class="btn btn-primary">Action</button
                ><button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                  <span class="caret"></span><span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu" role="menu" x-placement="top-start" style="position: absolute; transform: translate3d(-18px, -82px, 0px); top: 0px; left: 0px; will-change: transform;">
                       <a href="{{url(route('admin.products.edit.variations',$v->id))}}" class="dropdown-item">Edit</a>
                       <div class="dropdown-divider"></div>
                       <a href="{{url(route('admin.products.custom.fields.variations',$v->type))}}" class="dropdown-item">Add Custom Fields</a>
                       <div class="dropdown-divider"></div>
                   
                  </div>
            </div>
          </td>
        </tr>
      @endforeach
    </table>
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
<script src="{{ asset('/admin-assets/js/validations/faqValidation.js') }}"></script>
<script src="{{ asset('js/cke_config.js') }}"></script>

<script type="text/javascript">
   CKEDITOR.replace('answer', options);

   

 function fetch() {
   var get=document.getElementById("get").value;
   let color = document.getElementById("color");
  color.value = get;
  color.focus();
} 
</script>
@endsection
