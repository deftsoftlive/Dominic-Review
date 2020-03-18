 <table style="width:100%" border="1" cellpadding="10" cellspacing="0">

 <tr>
   
     			<th style="text-align: left;">Status</th>
     			<th style="text-align: left;">Category</th>
     			<th style="text-align: left;">Task</th>
     			<th style="text-align: left;">Date</th>
     		 
 
</tr>	 

@if($taskCategories != null && $taskCategories->count() > 0)
   @foreach($taskCategories->get() as $k1)
<?php
$listing = $k1->taskListingWithFilters($requestArray);
 ?>

 

    
   
       @foreach($listing->get() as $k)
 <tr>
   
     			<td style="text-align: left;">{{$k->status == 1 ? 'Done' : 'Pending'}}</td>
     			<td style="text-align: left;">{{$k1->tasks->task}}</td>
     			<td style="text-align: left;">{{$k->task}}</td>
     			<td style="text-align: left;">{{$k->task_date}}</td>
     		 
 
</tr>

   @endforeach
 
 @endforeach
@endif

</table>
  