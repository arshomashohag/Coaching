<?php 
include "connection.php";

if(isset($_POST['addStudentOk'])){

		$query = "SELECT * FROM ids WHERE ID='2'";
		$result = mysqli_query($dbc, $query);
        $row = mysqli_fetch_assoc($result);

		$last = $row['Student'];

		$id = $last+1;
        
         
        
		$query = "UPDATE ids SET Student='$id' WHERE ID='2'";
		$result = mysqli_query($dbc, $query);
         
           $Name =mysqli_real_escape_string($dbc, $_POST["name"]);
           $Contact =mysqli_real_escape_string($dbc, $_POST["contact"]);
           $Email = mysqli_real_escape_string($dbc, $_POST["email"]);
           $Class = mysqli_real_escape_string($dbc, $_POST["class"]);
           $Temp = uniqid($Name);

           $Password = sha1($Temp);

           $message = 'Hello '.$Name.'\nWelcome to UCC.\n Your Id is '.$id.' and Password is '.$Temp;
           //mail($Email, "Id and Password", $message, "shohag_92_ru@yahoo.com");
         
          
         	$query = "INSERT INTO student (ID, Name, Class, Email, Password, Contact) VALUES ('$id', '$Name', '$Class','$Email', '$Temp', '$Contact')";
         

		$result = mysqli_query($dbc, $query);

		header('Location:../../Pages/Admin.php');

}

 ?>