<?php 
include "connection.php";

if(isset($_POST['addTecOk'])){

		$target_dir = "../../resource/images/Teachers/";
		$base = basename($_FILES["fileToUpload"]["name"]);
		$target_file = $target_dir . $base;
		$database_save = '../resource/images/Teachers/'.$base;

		$uploadOk = 1;

		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image

		 
		    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		    if($check !== false) {
		        
		        $uploadOk = 1;
		    } else {
		         
		        $uploadOk = 0;
		    }

		// Check if file already exists
		if (file_exists($target_file)) {
		    $uploadOk = 0;
		}

		 
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 1) {		     
		    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file) ;

		} 
		else{
		    $database_save="";
		}

		$query = "SELECT * FROM ids WHERE ID='2'";
		$result = mysqli_query($dbc, $query);
        $row = mysqli_fetch_assoc($result);

		$last = $row['Teacher'];

		$id = $last+1;
        
         
        
		$query = "UPDATE ids SET Teacher='$id' WHERE ID='2'";
		$result = mysqli_query($dbc, $query);
         
           $Name =mysqli_real_escape_string($dbc, $_POST["name"]);
           $Contact =mysqli_real_escape_string($dbc, $_POST["contact"]);
           $Dept = mysqli_real_escape_string($dbc, $_POST["dept"]);
           $Qualification = mysqli_real_escape_string($dbc, $_POST["qualify"]);

         
         if(!empty($_POST["qualify"])){
         	$query = "INSERT INTO teacher (ID, Name, Contact, Photo, Department, Qualification, One, Two, Three, Four, Five) VALUES ('$id', '$Name', '$Contact', '$database_save', '$Dept', '$Qualification',0,0,0,0,0)";
         }
		 
		else{
			$query = "INSERT INTO teacher (ID, Name, Contact, Photo, Department , One, Two, Three, Four, Five) VALUES ('$id', '$Name', '$Contact', '$database_save', '$Dept',0,0,0,0,0)";
		}

		$result = mysqli_query($dbc, $query);

		header('Location:../../Pages/Admin.php');

}

 ?>