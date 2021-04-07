<?php 
use App\User;

/*---------------------------------
|	Get user name using id
|---------------------------------*/
function GetUserName($id) {
  $user_name = User::where('id','=',$id)->first();
  $name = $user_name['name']; 
  return $name;
}

?>