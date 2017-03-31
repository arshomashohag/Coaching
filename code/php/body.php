<?php 
include "signin.php";
include "notice.php";
include "connection.php";

$notices=array();

function getNotices(){
   global $notices;
   $i=0;
   global $dbc;

    $query = "SELECT Notices FROM notice";

	$result = mysqli_query($dbc, $query);

  	while ($row = mysqli_fetch_assoc($result)){

          $notices[$i] = $row['Notices'];
          $i++;
      }

     
}



function body(){
    global $notices;
    
    $nrow = getNotices();

  echo '<div id="block_container">';
 signIn();
  notice($notices);
 
 echo "</div>";



}



?>