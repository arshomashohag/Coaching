<?php 
 include "adminAccount.php";
 include "addTeacher.php";
 include "deleteTeacher.php";
 include "deleteStudent.php";
 include "addStudent.php";
 include "startRating.php";
   
  $request = $_REQUEST['q'];

  if($request=="adminAccount"){
  	adminAccount();
  }
  else if($request=="addTeacher"){
  	addTeacher();
  }

  else if($request=="deleteTeacher"){
     deleteTeacher();
  }

  else if($request=="addStudent"){
   addStudent();
  }

  else if($request=="deleteStudent"){
  	deleteStudent();
  }
  else if($request=="getRating"){
       startRating();
  }

  else{
  	echo $request;
  }

 ?>