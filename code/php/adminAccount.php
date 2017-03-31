<?php 
   
  include "Boxes.php";
  include "connection.php";


  

   function adminAccount(){
      global $dbc;

    $query = 'SELECT * FROM notice';
    $result = mysqli_query($dbc, $query);

     

     echo '<div class="adminaccount">';
     echo "<label><b>Update Account</d><label>";
     echo "</div>";
     
   	  echo '<div class="changePass">';

	        echo '<div class="headingLabel"><label>Change Password</label><label id="changepassCheck"></label></div> ';

	        echo '<div class="passbox">';
                  echo '<input id="passwrd" type="password" placeholder="New-Password" required>';
                  echo "<br>";
                  echo '<input id="repasswrd" type="password" placeholder="New-Password" required>';
                  echo "<br>";
                  echo '<input type="button" value="Ok" onClick="changePass()">';
	        echo "</div>";

   	  echo "</div>";

       echo '<div class="noticeBoard">';

          echo '<div class="headingLabel"><label><b>Add Notice</b></label><label id="addnoteCheck"></label></div>';

          echo '<div class="noticeBox">';
                  textBox("notices", 40, "notice", "Notes");
                   echo "<br>";
                  echo '<input type="button" value="Ok" onClick="addNotice()">';
          echo "</div>";

      echo "</div>";
    
     echo '<div class="delNotice">';

        echo '<div class="headingLabel">';
        echo '<input type="checkbox" id="select" onClick="'."toggle(this,'checknote[]','delNotice')".'"class="delNotchk" value="checkall">';
           echo "<label>";
          echo '<b>Delete Notice</b>';

          echo '</label><label id="delnoteCheck"></label>';

          echo '</div>';

          echo '<div class="noticeBox">';                  
            echo '<form action="../code/php/deleteNotice.php" method="post">';
               while($row = mysqli_fetch_assoc($result)){
                echo '<input type="checkbox" onClick="'. "enableButton('checknote[]', 'delNotice')" .'" name="checknote[]" value="'.$row["ID"].'">'.$row["Notices"].'<br>';
               }
            echo'<input type="submit" value="Ok" id="delNotice" name="delNoteOk" disabled>';
            echo "</form>";
             
          echo "</div>";

      echo "</div>";




   }


 ?>