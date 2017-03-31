<?php 
include "connection.php";


function startRating(){
	global $dbc;
     $query = "SELECT * FROM teacher";
     $result = mysqli_query($dbc, $query);
   
   echo '<div class="setRating">';

    echo '<div class="setRatingHead">';

   	   		echo '<label id="setRatLab"> <b>Select teacher who take classes today</b><label>';

   	   echo "</div>";

   	   echo '<div class="setRatBody">';
          
   	   		echo '<table class="teacherListTable">';
 				echo '<tr>';

 					echo '<th>';
 						echo '<input class="check"  onClick="' . "toggle(this,'setTec[]','setTecOk')" . '" type="checkbox" id="select" value="selectAll"><label><b>Select</b></label>';
 					echo "</th>";

 					echo '<th>';
 						echo '<label class="id"><b>Id</b></label>';
 					echo "</th>";

 				echo "</tr>";
        
        while($row = mysqli_fetch_assoc($result)){
          echo '<tr>';

            echo '<td>';
              echo '<input class="check" onClick="'. "enableButton('setTec[]', 'setTecOk')" .'" type="checkbox" name="setTec[]" value="'.$row["ID"].'">';
              echo '<label class="name"> '.$row["Name"].' </label>';
            echo "</td>";

            echo '<td>';
              echo '<label class="id"> '.$row["ID"].' </label>';
            echo "</td>";

            echo "</tr>";
        }

   	   		echo "</table>";
             echo '<div class="deleteOk">';
         	     echo '<input type="button" onclick="getSelectRating()"  value="Ok" name="setTecOk" id="setTecOk" disabled>';
             echo '</div>';

        

   	   echo "</div>";

   echo "</div>";
}



 ?>