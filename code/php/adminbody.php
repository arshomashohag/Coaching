<?php 

   include 'connection.php';

  function adminBody(){
   
   global $dbc;

   $query = "SHOW EVENTS FROM codevrs";

   $result = mysqli_query($dbc, $query);
   $row = mysqli_fetch_assoc($result);


     echo '<div id="admin">';

     		echo '<div id="adminhead">';

 				echo '<label><b>Control Panel</b><label>';

     		echo "</div>";

     		echo '<div id="adminbody">';

     			echo '<div id="left">';
                    echo '<button class="controlbtn" onclick="';

                     if(isset($row['Name']))
                         echo "getCode('A rating event is running !!!')";

                       else 
                       echo "getCode('getRating')";

                     echo '" name="getrating" ';

                      

                    echo '>Rating Countdown</button>';

     				echo '<button id="adminAccount" class="controlbtn" onclick="'."getCode('adminAccount')".'" name="editAccount">Edit Account</button>';
     				echo '<button class="controlbtn" onclick="'. "getCode('addTeacher')".'"name="addTeacher">Add Teacher</button>';
     				echo '<button class="controlbtn" onclick="'. "getCode('deleteTeacher')".'" name="deleteTeacher">Delete Teacher</button>';

     				echo '<button class="controlbtn" onclick="'. "getCode('addStudent')".'" name="addStudent">Add Student</button>';
     				echo '<button class="controlbtn" onclick="'. "getCode('deleteStudent')".'" name="deleteStudent">Delete Student</button>';


     			echo '</div>';


     			echo '<div id="right">';
                  
     			echo "</div>";


     		echo '</div>';

     echo "</div>";

  }


 ?>