@extends('users.layouts.layout') 
@section('content')



<section class="content">
   <div class="row">
      <div class="col-xl-12 col-md-12 m-b-30">
         <div class="card">
            <div class="card-body">
               <div class="row">
                <form method="post">
                  <div class="col-lg-12">
                      <h3>Add Review</h3>

                     
                           <div class="col-md-12">
                               {{textbox($errors,'Title','title')}}
                           </div>

                           <div class="col-md-12">
                              {{selectsimple2($errors,'Ratting','rating',[1 => 1,2 => 2,3 => 3,4 => 4,5 => 5])}}
                           </div>
                            <div class="col-md-12">
                               {{textarea($errors,'Review','review')}}
                           </div>
                            <div class="col-md-12">
                                 <button class="btn btn-primary">Save</button>
                            </div>
                            @csrf
                     <!--  Second row -->
                     <!--  =========================== -->
                  </div>
                </form>





 






















               </div>
            </div>
         </div>
      </div>

 


   </div>
</section>


























@endsection