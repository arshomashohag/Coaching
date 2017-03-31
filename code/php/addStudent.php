<?php 

function addStudent(){


	echo '<div class="studentInfo">';

  		echo '<div class="infohead">';
  			echo '<label><b>Student Information</b></label>';
  		echo "</div>";

  		echo '<div class="information">';
        echo '<form action="../code/php/addStudentSql.php" method="post">';
  			echo '<label><b>Name</b></label><br>';
  			inputBox("tecName", "text", "name", "Mr.Example");
  			echo "<br>";
  			echo '<label><b>Class</b></label><br>';
            echo ' <select name="class">
                <option value="Six">Six</option>
                <option value="Seven">Seven</option>
                <option value="Eight">Eight</option>
                <option value="Nine">Nine</option>
                <option value="Ten">Ten</option>
            </select>';
            echo "<br>";
  			echo '<label><b>Email</b></label><br>';
  			inputBox("email","email","email","example@example.com");
  			echo "<br>";
  			echo '<label><b>Contact Number</b></label><br>';
  			inputBox("techContact","text","contact","01*********");
  			echo "<br>";
            
         echo '<input type="submit" name="addStudentOk" value="Ok" id="stuOk">';
        echo "</form>";
  		echo "</div>";

  	echo "</div>";
}




 ?>