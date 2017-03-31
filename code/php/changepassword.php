<?php 
include "connection.php";


 $request = $_REQUEST['q'];

 $query = "UPDATE admin SET Password=sha1('$request') WHERE id='Admin'";
 $result = mysqli_query($dbc, $query);
  
  if($result){
  	echo ' || Password Changed !!';
  }
  else{
  	echo ' || Sorry!! Password not changed . Try again';
  }

 ?>