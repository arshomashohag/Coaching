<?php 
include "connection.php";

 $request = $_REQUEST['q'];
 $IDs = explode(".", $request);


   
	 
  if(!empty($IDs)){

	 foreach($IDs as $selected){
       $query = "SELECT * FROM teacher WHERE ID='$selected'";
       $result =  mysqli_query($dbc, $query);

       $row = mysqli_fetch_assoc($result);
       $photo=$row['Photo'];
            
       if(!empty($photo)){
         $photo="../".$photo;
         unlink($photo);
       }

	     $query = "DELETE FROM teacher WHERE ID='$selected'";
       $result = mysqli_query($dbc, $query);
       if(!$result){
       	echo "Error Encountered !! Please Try Again !";
       	return ;
       }
     		  
	}
  echo "Teacher's Profile Succesfully Deleted !!";
  return ;

}

else{
	echo 'No teacher selected!!';
	return ;
}


 ?>