<?php 
include "connection.php";


 $request = $_REQUEST['q'];

 $query = "INSERT INTO notice (Notices) VALUES ('$request')";
 $result = mysqli_query($dbc, $query);
  
  if($result){
  	echo ' || Notice Added!!';
  }
  else{
  	echo ' || Sorry!! Can not added. Try again.';
  }

 ?>