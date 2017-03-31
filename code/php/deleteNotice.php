<?php 
include "connection.php";


  if(isset($_POST['delNoteOk'])){
	 
  if(!empty($_POST['checknote'])){

	 foreach($_POST['checknote'] as $selected){

	   $query = "DELETE FROM notice WHERE ID='$selected'";
       $result = mysqli_query($dbc, $query);
     		  
	}	 
}

}
 
 header("Location:../../Pages/Admin.php");

 ?>