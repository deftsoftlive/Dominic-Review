@extends('layouts.vendor')
@section('vendorContents')

 <div class="container-fluid">


<!-- header -->

<div class="page_head-card">
    <div class="page-info">
            <div class="page-header-title">
                <h3 class="m-b-10">Shop :: Products </h3>
            </div>
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="http://49.249.236.30:8654/vendors"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">List</a></li>
            </ul>
        </div>
        <div class="side-btns-wrap">
        <a href="{{url(route('vendor.shop.products.create'))}}" class="add_btn"><i class="fa fa-plus"></i></a>
        </div>
  </div>


<!-- header -->













    <div class="row">
       <div class="col-lg-12">
          <div class="card vendor-dash-card">
                  
		           <div class="card-body">
                       <table class="table cstm-eshop-table">
                       	<thead>
                       		<tr>
                       			<th>Sr.no</th>
                       			<th>Image</th>
                       			<th >Name</th>
                            <th>Status</th>
                            <th>Action</th>
                       		</tr>
                       	</thead>

                        <tbody>
                          @foreach($products as $k => $product)
                              <tr>
                                 <td>{{$k + 1}}</td>
                                 <td><img src="{{url($product->thumbnail)}}" width="100"></td>

                                 <td>
                                  <h3>{{$product->name}}</h3>
                                  <p>{{$product->category != null && $product->category->count() > 0 ? $product->category->label : ''}} |
                                  {{$product->subcategory != null && $product->subcategory->count() > 0 ? $product->subcategory->label : ''}} |
                                  {{$product->childcategory != null && $product->childcategory->count() > 0 ? $product->childcategory->label : ''}}</p>

                                  {!!shopStatus($product)!!}





                                  </td>

                                  <td>
                                    {{$product->status == 0 ? 'In-Active' : 'Active'}}
                                  </td>
                                <td>
                                  <a href="{{url(route('vendor.shop.products.status',$product->id))}}" class="btn btn-danger btn-sm">
                                      {{$product->status == 1 ? 'In-Active' : 'Active'}}
                                  </a>
                                    
                                     <a href="{{url(route('vendor.shop.products.edit',$product->id))}}" data-toggle="tooltip" data-placement="top" title="Edit" class="add_btn"><i class="fa fa-pencil-alt"></i></a>
                                </td>
                              </tr>

                          @endforeach
                        </tbody>
                       	
                       </table>



		          </div>
         </div>
     </div>
   </div>
 </div>









@endsection
<script>
  $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>