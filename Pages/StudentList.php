<?php 
include "../code/php/header.php";
include "../code/php/footer.php";
include "../code/php/connection.php";

session_start();
 ?>

 <!DOCTYPE html>

 <html>

	 <head>

	 		<title>UCC | Students</title>
	 		
	 		 
		      
		     <link rel="stylesheet" type="text/css" href="../code/css/homeStyle.css">
		     <link rel="stylesheet" type="text/css" href="../code/css/adminStyle.css">
		     <link rel="stylesheet" type="text/css" href="../code/css/teacherListStyle.css">
		     <link rel="stylesheet" type="text/css" href="../code/css/deleteTeacherStyle.css">
		     <link rel="stylesheet" type="text/css" href="../code/css/boxStyle.css">
		     <link rel="stylesheet" type="text/css" href="../code/css/studentList.css">



		     <script type="text/javascript">
               
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

       
        window.onclick = function(event) {
          if (!event.target.matches('.dropbtn')) {

            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
              var openDropdown = dropdowns[i];
              if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
              }
            }
          }
        }
      
    </script>


	 </head>


	 <body>

	 <?php 
      
      if(!isset($_SESSION['username'])){

      	head("Home","../index.php", "Feedback", "Teacher.php", "Students","#");

      }
      else{
       head("Home","../index.php", "Feedback", "Teacher.php", "Students","#", $_SESSION['username'], "Admin.php","Logout.php");

      }

      
       $classes = array('Six','Seven', 'Eight', 'Nine', 'Ten');



    for($i=0; $i<5;$i++){

	    $classN = $classes[$i];
	       
	          $query = "SELECT * FROM student WHERE Class='$classN'";
				       $result = mysqli_query($dbc, $query);

			       if(mysqli_num_rows($result)>=1){

			     echo '<div class="studentlist">';

			     echo '<div class="studentListHeading">';
			        echo '<label >Students of class '.$classes[$i].'</label><br>';
			     echo '</div>';
                       
                       echo '<div class="studentListBody">';

			              echo '<table class="studentListTable">';
			 				echo '<tr>';

			 					echo '<th>';
			 						 echo "<label><b>Name</b></label>";
			 					echo "</th>";

			 					echo '<th>';
			 						  echo "<label><b>ID</b></label>";
			 					echo "</th>";

			 					echo '<th>';
			 						  echo "<label><b>Contact</b></label>";
			 					echo "</th>";

			 				echo "</tr>";

						       	while ($row=mysqli_fetch_assoc($result)) {
			 					  echo '<tr>';

				 					echo '<td>';
				 						 echo $row['Name'];
				 					echo "</td>";

				 					echo '<td>';
				 						 echo $row['ID'];
				 					echo "</td>";

				 					echo '<td>';
			 							 echo $row['Contact'];
			 					    echo "</td>";

				 					 

			 				    echo "</tr>";
			 				   }

			 				   echo "</table>";

			 		   echo '</div>';

 				  echo '</div>';

                 }
 				

   	   		
         }

      footer();

	  ?>
	 
	 </body>

 </html>