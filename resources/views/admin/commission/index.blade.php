@extends('layouts.admin')
 
@section('content')
 <div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">{{$title}}</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url(route('admin_dashboard'))}}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item "><a href="javascript:void(0)">Edit</a></li>
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
       
 
            <div class="card-body">

@include('admin.error_message')
<div class="row">





 















<div class="col-md-12">
    <div class="card">
        <div class="card-body">
           <h5 class="card-title">Commission Slabs</h5>

             <div class="col-md-12 ">
                <form class="form-inline text-right" method="post">
                   @csrf
                  <input type="hidden" name="type" value="slab">
                  
                  <div class="form-group">
                    <label for="exampleInputEmail2">Slab Fee From</label>
                    <input type="number" class="form-control" id="exampleInputEmail2" name="slab_from" placeholder="Enter Commission Slab" min="0" required>
                    <p class="error">{{$errors->first('slab')}}</p>
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail2">Fee Slab To</label>
                    <input type="number" class="form-control" id="exampleInputEmail2" name="slab_to" placeholder="Enter Commission Slab" min="0" required>
                    <p class="error">{{$errors->first('slab')}}</p>
                  </div>
                  <button type="submit" class="btn btn-default">Save</button>
                </form>
             </div>
            <table class="table">
              <tr>
                <th>Slabs</th> 
              </tr>

              @foreach($slab as $s)

                  <tr>
                    <td>From <b>${{$s->slab_from}}</b> To <b>${{$s->slab_to}}</b></td>
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
  </div>
</div>
</section> 
     
@endsection

@section('scripts')
<script src="{{url('/admin-assets/js/validations/settings/globalSettingsValidation.js')}}"></script>
<script src="{{url('/js/validations/imageShow.js')}}"></script>
@endsection