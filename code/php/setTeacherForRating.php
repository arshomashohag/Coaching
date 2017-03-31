<?php 
include "connection.php";

$query = 'CREATE EVENT delete_teacher
	ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 3 MINUTE
	DO BEGIN 
	DELETE FROM classteacher;
	DELETE FROM teacherstudent;
	END';

mysqli_query($dbc, $query);



$request = $_REQUEST['q'];

$teacherIdArray = explode('.', $request); 
$n = count($teacherIdArray);


$curTime = date("y-m-d h:m:s");

for($i=0; $i<$n; $i++){

	$temp = $teacherIdArray[$i];
	$query = "SELECT * FROM classteacher WHERE ID='$temp'";
	$result = mysqli_query($dbc, $query);

	if(mysqli_num_rows($result)){
      $query = "UPDATE classteacher SET CurTime='$curTime'";
	}

	else{
	$query = "INSERT INTO classteacher (ID, CurTime) VALUES ('$temp', '$curTime')";
   }

	if(!mysqli_query($dbc, $query)){
	  echo "Insertion Error !!!";
	  return ;
	}

}


$query = "UPDATE admin SET CurTime='$curTime'"; 

if(!mysqli_query($dbc, $query)){
  echo "Time not set !!! Please Try again !!";
  return ;
}

echo "Rating Time Started !!";


 ?>