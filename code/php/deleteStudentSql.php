<?php 
include "connection.php";


$request = $_REQUEST['q'];
 $IDs = explode(".", $request);

	 
  if(!empty($IDs)){

	 foreach($IDs as $selected){

	   $query = "DELETE FROM student WHERE ID='$selected'";
       $result = mysqli_query($dbc, $query);

       if(!$result){
       	echo "Error Encountered !! Please Try Again !";
       	return ;
       }
     		  
	}

	echo "Student's Profile Succesfully Deleted !!";
	return;

}

else{
	echo 'No student selected!!';
	return ;
}


 ?>