<?php 

   include "feedbackbody.php";
   include "connection.php";

   function deleteTeacher(){

     global $dbc;
     $query = "SELECT * FROM teacher";
     $result = mysqli_query($dbc, $query);


   	 echo'<div class="deleteTeacher">';

   	   echo '<div class="deleteHead">';

   	   		echo '<label id="delteclab"> <b> Delete Teachers History </b><label>';

   	   echo "</div>";

   	   echo '<div class="deleteBody">';
           
   	   		echo '<table class="teacherListTable">';
 				echo '<tr>';

 					echo '<th>';
 						echo '<input class="check"  onClick="' . "toggle(this,'delTec[]','delTecOk')" . '" type="checkbox" id="select" value="selectAll"><label><b>Select</b></label>';
 					echo "</th>";

 					echo '<th>';
 						echo '<label class="id"><b>Id</b></label>';
 					echo "</th>";

 					echo '<th>';
 						echo '<label class="contactdel"><b>Contact</b></label>';
 					echo "</th>";

 				echo "</tr>";
        
        while($row = mysqli_fetch_assoc($result)){
          echo '<tr>';

            echo '<td>';
              echo '<input class="check" onClick="'. "enableButton('delTec[]', 'delTecOk')" .'" type="checkbox" name="delTec[]" value="'.$row["ID"].'">';
              echo '<label class="name"> '.$row["Name"].' </label>';
            echo "</td>";

            echo '<td>';
              echo '<label class="id"> '.$row["ID"].' </label>';
            echo "</td>";

            echo '<td>';
              echo '<label class="contactdel">'.$row["Contact"].' </label>';
            echo "</td>";

            echo "</tr>";
        }

   	   		echo "</table>";
             echo '<div class="deleteOk">';
         	     echo '<input type="button" onclick="deleteTecProfile()" value="Ok" name="delTecOk" id="delTecOk" disabled>';
             echo '</div>';

         

   	   echo "</div>";

   	echo "</div>";
   }

 ?>