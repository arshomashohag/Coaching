<?php 

include "connection.php";
include "feedbackbody.php";


 $request = $_REQUEST['q'];


 $values = explode(".",$request);
 $id = intval($values[0]);
 $rating = $values[1];
 $stuId = $values[2];
  
   

 $query = "SELECT * FROM teacher WHERE ID='$id'";
 $result = mysqli_query($dbc,  $query);

 $row = mysqli_fetch_assoc($result);

 $newrating = $row[$rating]+1;
 

 $query = "UPDATE teacher SET ".$rating."='$newrating' WHERE ID='$id'";
 $result = mysqli_query($dbc, $query);


 if($result){
 	$query = "INSERT INTO teacherstudent (TecID, StuID) VALUES ($id, $stuId)";

 	if(!mysqli_query($dbc, $query)){
      echo "Teacher and Student not inserted !";
 	}
 	else {
          session_start();
 		 teachersList();
 	}

 }
 else{
 	echo "Rating is not updated !! Try again.";
 }
 

 ?>