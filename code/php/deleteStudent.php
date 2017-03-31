<?php 

include "connection.php";

function deleteStudent(){

global $dbc;
$query="SELECT * FROM student";
$result = mysqli_query($dbc, $query);


echo '<div class="deleteStudent">';

    echo '<div class="deleteStudentHead">';
		    echo '<label><b>Delete Studentship</b></label>';
    echo '</div>';


    echo '<div class="deleteBody">';
         
   	   		echo '<table class="studentListTable">';
 				echo '<tr>';

 					echo '<th>';
 						echo '<input class="check"  onClick="' . "toggle(this,'delStu[]', 'delStuOk')" . '" type="checkbox" id="select" value="selectAll"><label><b>Select</b></label>';
 					echo "</th>";

 					echo '<th>';
 						echo '<label class="id"><b>Id</b></label>';
 					echo "</th>";

 					echo '<th>';
 						echo '<label class="class"><b>Class</b></label>';
 					echo "</th>";

 					echo '<th>';
 						echo '<label class="contactdel"><b>Contact</b></label>';
 					echo "</th>";

 				echo "</tr>";
               

 				while ($row=mysqli_fetch_assoc($result)) {
 					  echo '<tr>';

	 					echo '<td>';
	 						echo '<input class="check" onClick="'. "enableButton('delStu[]', 'delStuOk')" .'" type="checkbox" name="delStu[]" value="'.$row["ID"].'">';
	 						echo '<label class="name"> '.$row["Name"].' </label>';
	 					echo "</td>";

	 					echo '<td>';
	 						echo '<label class="id"> '.$row["ID"].' </label>';
	 					echo "</td>";

	 					echo '<td>';
 							echo '<label class="class">'.$row["Class"].'</label>';
 					    echo "</td>";

	 					echo '<td>';
	 						echo '<label class="contactdel"> '.$row["Contact"].' </label>';
	 					echo "</td>";

 				    echo "</tr>";
 				}

   	   		echo "</table>";
         
            echo '<div class="deleteOk">';
         	     echo '<input type="button" onclick="deleteStudentProfile()" value="Ok" name="delStuOk" id="delStuOk" disabled>';
             echo '</div>';

         echo "</form>";

   	   echo "</div>";

echo "</div>";




}


 ?>