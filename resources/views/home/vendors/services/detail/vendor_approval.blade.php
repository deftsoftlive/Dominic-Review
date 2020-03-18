<div class="col-lg-4">
				 <aside>
				 	<div class="side-form-wrap">

           <h3 class="form-heading">{{getBasicInfo($vendor->vendors->id, $vendor->category_id,'basic_information','business_name')}}</h3>
				 		<h4>Progress Of Business</h4>

            <table class="table business-progress-table">
                 <tr>
                   <th width="20px">1.</th><th> Basic Information About the Business. ({{$basicInfo}}%)</th>
                 </tr>
                 <tr><td colspan="2"><?= ProgressBar($basicInfo) ?></td></tr>

                 <tr>
                   <th>2.</th><th> Photo And Video Gallery. ({{$photoVideogalery}}%)</th>
                 </tr>
                 <tr><td colspan="2"><?= ProgressBar($photoVideogalery) ?></td></tr>
                 <tr>
                   <th>3.</th><th> Venue Details (Services & Events, Styles, Seasons). ({{$venuesPercent}}%)</th>
                 </tr>
                 <tr><td colspan="2"><?= ProgressBar($venuesPercent) ?></td></tr>

                 <tr>
                   <th>4.</th><th> Amenities & Games. ({{$amenitiesAndGames}}%)</th>
                 </tr>
                 <tr><td colspan="2"><?= ProgressBar($amenitiesAndGames) ?></td></tr>

                   <tr>
                   <th>5.</th><th> Payment Method. ({{$paymenMethod}}%)</th>
                 </tr>
                 <tr><td colspan="2"><?= ProgressBar($paymenMethod) ?></td></tr>


                 <tr>
                   <th>6.</th><th> Business Proof. ({{$proof}}%)</th>
                 </tr>
                 <tr><td colspan="2"><?= ProgressBar($proof) ?></td></tr>

                 

                 <tr>
                   <th colspan="2" width="100%">Full Business Progress ({{$overAll}}%)</th>
                 </tr>
                 <tr>
                    <td colspan="2" width="100%"><?= ProgressBar($overAll) ?></td>
                 </tr>  
                 
                  
            </table> 

             
            @if($overAll > 75 && $proof == 100 &&  $vendor->status == 1 && $paymenMethod >= 50)
                   
                    <form method="post">
                        @csrf
                          <button class="btn btn-block btn-success">Submit for Approval</button>
                    </form>
            @elseif($overAll > 75 && $proof == 100 &&  $vendor->status == 4 && $paymenMethod >= 50)
                   
                    <form method="post">
                        @csrf
                          <button class="btn btn-block btn-success">Resubmit for Approval</button>
                    </form>

            @else

              <div class="alert alert-warning" role="alert">{{ $currentStatus }}</div>
                 
            @endif
			 
				 	</div>
				 </aside>
			</div>