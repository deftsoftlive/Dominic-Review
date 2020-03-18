<div class="col-lg-4">
				 <aside>
				 	<div class="side-form-wrap">
<h3 class="form-heading">{{getBasicInfo($vendor->vendors->id, $vendor->category_id,'basic_information','business_name')}}</h3>
       
				 		<h4>Progress Of Business</h4>

            <table class="table business-progress-table">
                 <tr>
                   <th>1. Basic Information About the Business. ({{$basicInfo}}/100)</th>
                 </tr>
                 <tr><td><?= ProgressBar($basicInfo) ?></td></tr>

                 <tr>
                   <th>2. Photo And Video Gallery. ({{$photoVideogalery}}/100)</th>
                 </tr>
                 <tr><td><?= ProgressBar($photoVideogalery) ?></td></tr>
                 <tr>
                   <th>3. Venue Details (Services & Events, Styles, Seasons). ({{$venuesPercent}}/100)</th>
                 </tr>
                 <tr><td><?= ProgressBar($venuesPercent) ?></td></tr>

                 <tr>
                   <th>4. Amenities & Games. ({{$amenitiesAndGames}}/100)</th>
                 </tr>
                 <tr><td><?= ProgressBar($amenitiesAndGames) ?></td></tr>

                   <tr>
                   <th>5. Payment Method. ({{$paymenMethod}}%)</th>
                 </tr>
                 <tr><td colspan="2"><?= ProgressBar($paymenMethod) ?></td></tr>


                 <tr>
                   <th>6. Business Proof. ({{$proof}}%)</th>
                 </tr>
                 <tr><td colspan="2"><?= ProgressBar($proof) ?></td></tr>

                 

                 <tr>
                   <th>Over All ({{$overAll}}/100)</th>
                 </tr>
                 <tr>
                    <td><?= ProgressBar($overAll) ?></td>
                 </tr>  
                 
                  
            </table> 

   

             <h3 class="form-heading">Business Proof</h3>
              <div>
              <a href="{{url(getBasicInfo($vendor->vendors->id, $vendor->category_id,'basic_information','bessiness_address_proof_1'))}}" 
              class="viewDocument cstm-btn" target="_blank">View Business address proof 1</a></div>

              <div>
              <a href="{{url(getBasicInfo($vendor->vendors->id, $vendor->category_id,'basic_information','bessiness_address_proof_2'))}}" 
              class="viewDocument cstm-btn" target="_blank">View Business address proof 2</a></div>

              <div>
              <a href="{{url(getBasicInfo($vendor->vendors->id, $vendor->category_id,'basic_information','business_registation_proof'))}}"  
              class="viewDocument cstm-btn" target="_blank">View Business Registration Proof</a></div>
           
			 
				 	</div>
				 </aside>
			</div>
