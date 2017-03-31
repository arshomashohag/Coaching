<?php 


  function addTeacher(){
  	echo '<div class="teacherInfo">';

  		echo '<div class="infohead">';
  			echo '<label><b>Teachers Information</b></label>';
  		echo "</div>";

  		echo '<div class="information">';
        echo '<form action="../code/php/addTeachersql.php" method="post" enctype="multipart/form-data">';

    			echo '<label><b>Name</b></label><br>';
    			inputBox("tecName", "text", "name", "Mr.Example");
    			echo "<br>";

    			echo '<label><b>Department</b></label><br>';
          inputBox("department", "text", "dept","CSE");
          echo "<br>";

    			echo '<label><b>Qualification</b>(One Degree per line)</label><br>';
    			textBox("qualification",60,"qualify","MSc/BSc");
    			echo "<br>";

    			echo '<label><b>Contact Number</b></label><br>';
    			inputBox("techContact","text","contact","01*********");
    			echo "<br>";

          echo '<label><b>Add Photo</b></label><br>';
          echo '<input type="file" name="fileToUpload" id="fileToUpload" onchange="validatePhoto()"/>';
          echo '<label id="check"></label>';

          echo '<br>';


          echo '<input type="submit" id="tecOkButton" name="addTecOk" value="Ok">';

       echo "</form>";
  		echo "</div>";

  	echo "</div>";
  }


 ?>