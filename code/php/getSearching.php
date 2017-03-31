<?php 
include "connection.php";
 session_start();


      $currentT = date("y-m-d h:m:s");
		$query = "SELECT * FROM classteacher WHERE CurTime<date_sub($currentT, date_interval_create_from_date_string('30 min'))";
		$result=mysqli_query($dbc, $query);


           if($result){
			while($row = mysqli_fetch_assoc($result)){
		       $teacherId = $row['ID'];

		       $query = "DELETE FROM teacherstudent WHERE TecID= '$teacherId'";
		       if(!mysqli_query($dbc, $query)){
		       	echo 'Something Wrong deleting teacherstudent entry !!';
		       	 
		       }
		       $query = "DELETE FROM classteacher WHERE ID='$teacherId'";
		       if(!mysqli_query($dbc, $query)){
		       	echo 'Something Wrong deleting teacher !!';
		        
		       }
			}
		}


       $isLogedIn=false;

		 if(isset($_SESSION['username']) )
		 	{
		 		if($_SESSION['username']!="Admin")
		 		{
		 			$isLogedIn=true;
		 			$stuId = $_SESSION['username'];
		 		}
		}

		 

		$request = strtolower($_REQUEST['q']);

		$query = "SELECT * FROM teacher";
		$result = mysqli_query($dbc, $query);



    echo '<div class="teacher_details">';

	 echo '<div id=teacher_body>';

		echo '<table id="teacher_table">';

		echo '<tr class="table_row">';

	    	echo "<th>";
	        	echo '<label><b>Photo</b></label>';
	    	echo "</th>";

	    	echo "<th>";
	        	echo '<label><b>Qualification</b></label>';
	    	echo "</th>";

          
	    	echo "<th>";
	        	echo '<label><b>Rate Now</b></label>';
	    	echo "</th>";
            

	    	echo "<th>";
	        	echo '<label><b>Contact Info</b></label>';
	    	echo "</th>";

		echo "</tr>";

		while($row = mysqli_fetch_assoc($result)) {
		   
		    $name = $row["Name"];
            $allLow =strtolower($name); 

            $isLengthZero = false;
            $isFirstChar = false;

            $lr = strlen($request);
            $ln = strlen($allLow);
            $i=0;

               while ($i<$lr && $i<$ln) {
               	 if($request[$i]!=$allLow[$i]){
                      break;
               	 }
               	 $i++;
               }
              if($i==$lr || $i==$ln)
              	$isFirstChar=true;
            	

           if(strlen($request)>0)
           	$ret = strpos($allLow, $request);
           else 
           	$isLengthZero = true;

          if($isLengthZero || $isFirstChar || $ret!=false){
		   $photo = $row["Photo"];

		   if(empty($photo)){
		   	$photo = "../resource/images/Teachers/default.png";
		   }


           $id = $row["ID"];
           $qualific = $row['Qualification'];
		   $total = $row["One"]+$row["Two"]+$row["Three"]+$row["Four"]+$row["Five"];
   
           if($total>0){

		   $one = round(($row["One"]/$total)*100, 3);
		   $two = round (($row["Two"]/$total)*100, 3);
		   $three = round(($row["Three"]/$total)*100, 3);
		   $four = round(($row["Four"]/$total)*100, 3);
		   $five = round(($row["Five"]/$total)*100, 3);

		}
		else{

		   $one = 0;
		   $two = 0;
		   $three = 0;
		   $four = 0;
		   $five =0;
		}

		 $isvoted = false;

		if($isLogedIn){

		   $tecQuery = "SELECT * FROM classteacher WHERE ID='$id'";
		   $tecResult= mysqli_query($dbc, $tecQuery);

		   if(mysqli_num_rows($tecResult)==1){
		   	
		   	 $tecQuery = "SELECT * FROM teacherstudent WHERE TecID='$id' AND StuID='$stuId'";
		   	 $tecResult = mysqli_query($dbc, $tecQuery);

		   	 if(mysqli_num_rows($tecResult)!=0){
                 $isvoted=true;
		   	 }

		   }
		   else{
		   	$isvoted=true;
		   }

		}

		   $contact = $row["Contact"];

	       echo '<tr class="table_row">';
	       		echo '<td class="photo">';
	      			echo '<div class="namandphoto">';

	       				echo '<img src="'.$photo.'" width="80" height="80"><br>';
	       				echo '<label class="nam" id="name">'.$name.'</label>';

	       			echo "</div>";



	       			echo '<div class="details">';

	       				echo '<label>5 Star = </label>'.$five.'%<br>';
	       				echo '<label>4 Star = </label>'.$four.'%<br>';
	       				echo '<label>3 Star = </label>'.$three.'%<br>';
	       				echo '<label>2 Star = </label>'.$two.'%<br>';
	       				echo '<label>1 Star = </label>'.$one.'%<br>';


	       			echo "</div>";


	       		echo '</td>';

	       		echo '<td class="qualification">';
                 echo  $qualific;
	       		echo "</td>";
               echo '<td class="stars">' ;
               if($isLogedIn && !$isvoted){
               
	       		
	       		    echo '<center> <span id="'.$id.'">Good</span></center>';
	       		    echo"<br>";
	       		    echo '<center>';
                 	echo '<img  class="str name="'.$id.'[]" onmouseover="'."colorStar('$id', '1')".'" onmouseleave="'."colorStar('$id', '6')".'" onclick="'."saveRating('$id', 'One')".'" src="../resource/images/star.png" width="20" height="30">';

                 	echo '<img  class="str name="'.$id.'[]" onmouseover="'."colorStar('$id', '2')".'" onmouseleave="'."colorStar('$id', '6')".'" onclick="'."saveRating('$id', 'Two')".'" src="../resource/images/star.png" width="20" height="30">';

                 	echo '<img  class="str name="'.$id.'[]" onmouseover="'."colorStar('$id', '3')".'" onmouseleave="'."colorStar('$id', '6')".'" onclick="'."saveRating('$id', 'Three')".'" src="../resource/images/star.png" width="20" height="30">';

                 	echo '<img  class="str name="'.$id.'[]" onmouseover="'."colorStar('$id', '4')".'" onmouseleave="'."colorStar('$id', '6')".'" onclick="'."saveRating('$id', 'Four')".'" src="../resource/images/star.png" width="20" height="30">';

                 	echo '<img  class="str name="'.$id.'[]" onmouseover="'."colorStar('$id', '5')".'" onmouseleave="'."colorStar('$id', '6')".'" onclick="'."saveRating('$id', 'Five')".'" src="../resource/images/star.png" width="20" height="30">';
                 	echo '</center>';
	       		echo '</td>';
	       	}


	       		echo '<td class="contact">' .$contact. '</td>';
	       	echo "</tr>"; 
	       
	       } 

		}

		echo '</table>';

	echo "</div>";

echo "</div>";




 ?>