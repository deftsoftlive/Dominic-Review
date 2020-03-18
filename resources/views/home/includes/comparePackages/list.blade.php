
<?php
$Price = '';
$Description = '';
$Menus = '';
$Amenities = '';
$Events = '';
$Games = '';
$Ons = '';
$Type = '';
$Persons = '';
$Hours = '';
$Days = '';
 

 $count = $packages->count() + 1;
 $width = ceil(100 / $count);
 $header = '<th width="'.$width.'%">Feature List</th>';
?>



@foreach($packages->get() as $p)
<?php
#-------------------------------------------------
$amty='';
foreach ($p->amenities as $k => $a) {
   $amty .=$k > 0 ? ', ': '';
   $amty .=$a->amenity->name;
}
#--------------------------------------------------
$event='';
foreach ($p->events as $k => $a) {
   $event .=$k > 0 ? ', ': '';
   $event .=$a->event->name;
}
#-------------------------------------------------
$game='';
foreach ($p->games as $k => $a) {
   $game .=$k > 0 ? ', ': '';
   $game .=$a->amenity->name;
}
#-------------------------------------------------
$package_addons='<ul>';
 

foreach ($p->package_addons as $k => $a) {
   $package_addons .=$k > 0 ? ', ': '';
   $package_addons .="<li>".$a->key." : $".$a->key_value."</li>";
}
$package_addons .='</ul>';
#-------------------------------------------------

$type = $p->price_type == 'fix' ? 'Fix Price' : 'Per Person';
$header .='<th width="'.$width.'%">'.$p->title.'</th>';
$Price .='<td>'.custom_format($p->price,2).'</td>';
$Description .='<td>'.$p->description.'</td>';
$Menus .='<td>'.$p->menus.'</td>';
$Amenities .='<td>'.$amty.'</td>';
$Events .='<td>'.$event.'</td>';
$Games .='<td>'.$game.'</td>';
$Ons .='<td>'.$package_addons.'</td>';
$Type .='<td>'.$type.'</td>';
$Persons .='<td>'.$p->max_person.'</td>';
$Hours .='<td>'.$p->no_of_hours.'</td>';
$Days .='<td><'.$p->no_of_days.'/td>';

?>
@endforeach



<table class="table table-bordered compere-table">
            <thead>
               <tr>
                  {!!$header!!}
                  
               </tr>
            </thead>
            <tbody>
               <tr>
                  <td><label>Price</label></td>
                  {!! $Price !!}
               </tr>
               <tr>
                  <td><label>Description</label></td>
                  {!! $Description !!}
               </tr>
               <tr>
                  <td><label>Menus</label></td>
                  {!! $Menus !!}
               </tr>
               <tr>
                  <td><label>Amenities</label></td>
                  {!! $Amenities !!}
               </tr>
               <tr>
                  <td><label>Events</label></td>
                  {!! $Events !!}
               </tr>
               <tr>
                  <td><label>Games</label></td>
                  {!! $Games !!}
               </tr>
               <tr>
                  <td><label>Add Ons</label></td>
                  {!! $Ons !!}
               </tr>
               <tr>
                  <td><label>Price Type</label></td>
                  {!! $Type !!}
               </tr>
               <tr>
                  <td><label>Persons</label></td>
                  {!! $Persons !!}
               </tr>
               <tr>
                  <td><label>Number Of Hours</label></td>
                  {!! $Hours !!}
               </tr>
               <tr>
                  <td><label>Number Of Days</label></td>
                  {!! $Days !!}
               </tr>
            </tbody>

 </table>