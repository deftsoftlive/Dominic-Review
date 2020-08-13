@extends('layouts.admin')
 
@section('content')

<style>
p.vou_prod_type {
    color: #3f4d67;
    font-weight: 600;
    border-radius: 12px;
    margin: 0px 60px 0px 0px;
}
</style>
 <div class="container-fluid">

<!-- header -->

<div class="page_head-card">
    <div class="page-info">
            <div class="page-header-title">
                <h5 class="m-b-10">Shop :: Products </h5>
            </div> 
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="http://49.249.236.30:8654/vendors"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">List</a></li>
            </ul>
        </div>
       <!--  <div class="side-btns-wrap">
        <a href="{{url(route('vendor.shop.products.create'))}}" class="add_btn"><i class="fa fa-plus"></i></a>
        </div> -->
  </div>


<!-- header -->


@php 
  $product_cat = DB::table('product_categories')->where('type','Product')->where('parent',0)->where('subparent',0)->get();
@endphp


          <div class="main-body">
              <div class="page-wrapper"> 
                  <div class="row"> 
                      <div class="col-xl-12">
                          <div class="card">
                              <div class="card-header"> 
                                  <h5>Shop :: Products</h5>
                                  <div class="cst-admin-filter">
                                     <a href="{{url(route('vendor.shop.products.create'))}}" class="btn btn-primary">Add</a>
                                     <a href="{{ url('admins/shop/products') }}" id="all_product_listing" class="btn btn-primary">All Products</a>
                                  </div>  
                              
                              </div>

                              <br/>

                              <!-- Filter Section - Start -->
                                <form action="{{route('vendor.shop.products.index')}}" method="POST" class="cst-selection">
                                @csrf
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                  <select id="people" name="type" class="form-control">
                                                
                                                  <option value="" disabled="" selected="">Select Product Category</option>
                                                  @foreach($product_cat as $cour)
                                                    <option value="{{$cour->id}}">{{$cour->label}}</option>
                                                  @endforeach
                                                </select>
                                            </div>
                                                
                                            <div class="col-sm-4">
                                                  <select id="inputAge" name="subtype" class="form-control event-dropdown">
                                                    <option value="1" selected="" disabled="">Select Product Subcategory</option>
                                                  </select>
                                            </div>
                                            
                                            <div class="col-sm-1" style="margin-right:10px;">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>

                                            <div class="col-sm-1" style="margin-left:10px">
                                                <a href="" onclick="myFunction();" class="btn btn-primary">Reset</a>
                                            </div>
                                        </div><br/>
                                    </div>
                                </form>
                              <!-- Filter Section - End -->



                              <!-- Success Message -->
                             <!--  @if(Session::has('flash_message'))               
                                  <div class="alert alert-success">
                                          <p>{{ Session::get('flash_message') }} </p>
                                      </div>
                                  </div>
                              @endif -->

                              <div class="card-block table-border-style">
                                  <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                              <tr>
                                                <th>Product ID</th>
                                                <th>Sort</th>
                                                <th>Name</th>
                                                <th>Image</th>
                                                <!-- <th>Available Stock</th> -->
                                                <th>Action</th>
                                              </tr>
                                            </thead>

                                            <tbody>
                                              @foreach($products as $k => $product)

                                                  <tr>
                                                     <!-- <td>{{$k + 1}}</td>  -->
                                                     <td>{{$product->id}}</td>
                                                     <td><input type="text" id="update_product_sort" data-id="{{$product->id}}" value="{{$product->sort}}" style="width:
                                                        50px">
                                                      </td>
                                                      
                                                      <td><p class="vou_prod_type" @if($product->vou_prod_type == 'voucher') style="background:#ffddd2" @elseif($product->vou_prod_type == 'normal') style="background:#c7f197" @endif>&nbsp;&nbsp;
                                                        @if($product->status == '1')
                                                            <span class="cst_active"><i class="fas fa-check-circle"></i></span>
                                                        @else
                                                            <span class="cst_in-active"><i class="fas fa-times-circle"></i></span>
                                                        @endif
                                                        {{$product->vou_prod_type}}</p>
                                                        <h5>{{$product->name}}</h5>
                                                        <p>{{$product->category != null && $product->category->count() > 0 ? $product->category->label : ''}} |
                                                        {{$product->subcategory != null && $product->subcategory->count() > 0 ? $product->subcategory->label : ''}} </p> 
                                                      </td>

                                                      <!-- <td>
                                                        {{$product->status == 0 ? 'In-Active' : 'Active'}}
                                                      </td> -->

                                                      <td><img src="{{url($product->thumbnail)}}" width="100"></td>


                                                    <td>

                                                      <div class="btn-group">
                                                          <button type="button" class="btn btn-primary">Action</button>
                                                          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span>
                                                          </button>

                                                          <div class="dropdown-menu" role="menu" x-placement="top-start">
                                                              <a href="{{url(route('vendor.shop.products.edit',$product->id))}}" class="dropdown-item">Edit</a>

                                                              <a href="{{url('admins/shop/products/duplicate')}}/{{$product->id}}" class="dropdown-item">Duplicate</a>

                                                              <a href="{{url('admins/shop/products/delete')}}/{{$product->id}}" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this product?')" >Delete</a>

                                                              <a href="{{url(route('vendor.shop.products.status',$product->id))}}"  class="dropdown-item">
                                                                    {{$product->status == 1 ? 'In-Active' : 'Active'}} </a>
                     
                                                          </div>
                                                      </div> 
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
              </div>
          </div>






<!-- 
    <div class="row">
       <div class="col-lg-12">
          <div class="card vendor-dash-card">
                  
		           <div class="card-body">
                       <table class="table cstm-eshop-table">
                       	<thead>
                       		<tr>
                       			<th>Sr.no</th> -->
                       			<!-- <th>Image</th> -->
                       			<!-- <th >Name</th>
                            <th>Status</th>
                            <th>Action</th>
                       		</tr>
                       	</thead>

                        <tbody>
                          @foreach($products as $k => $product)
                              <tr>
                                 <td>{{$k + 1}}</td> -->
                                 <!-- <td><img src="{{url($product->thumbnail)}}" width="100"></td> -->

                                 <!-- <td>
                                  <h3>{{$product->name}}</h3>
                                  <p>{{$product->category != null && $product->category->count() > 0 ? $product->category->label : ''}} |
                                  {{$product->subcategory != null && $product->subcategory->count() > 0 ? $product->subcategory->label : ''}} |
                                  {{$product->childcategory != null && $product->childcategory->count() > 0 ? $product->childcategory->label : ''}}</p> -->

                                  <!-- {!!shopStatus($product)!!} -->



<!-- 

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
   </div> -->







 </div>









@endsection

@section('scripts')
<script type="text/javascript">
function myFunction() {
        $("#all_product_listing")[0].click();
      }


$(document).ready(function(){
    $("select#people").change(function(){
        var selectedCat = $(this).children("option:selected").val();
        $base_url = "http://49.249.236.30:8654/dominic-new";
        $.ajax({
            url:$base_url+"/selectedCat/",
            method:'GET',
            data:{selectedCat:selectedCat},
            dataType:'json',
            success:function(data)
            {   
                $('#inputAge').html(data.option);
            },      
        })
    });
    });

</script>

<script>
  $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>

@endsection