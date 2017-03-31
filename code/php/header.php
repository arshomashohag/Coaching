 	<?php 	 
	     function head(...$nav){
	         echo '<div class="header">'; 
 

            $num = count($nav);
            $flag = false;
            $notIndex=false;



            if($num>6){
              $flag = true;
              if($num>8)
                $notIndex=true;
              $num=6;
            }


               
               $num-=1;

             for($i=0; $i<$num; $i+=2){

                    if($i>0){
                    	echo " | ";
                    }

                  echo ' <a href=" '.  $nav[$i+1] . ' "> ' .$nav[$i]. '</a>';
                  
             }

             if($flag){
                 
                 echo " | ";
                echo '<div class="dropdown">';
                  
                  echo '<p onclick="myFunction()" class="dropbtn">'.$nav[$i].'</p>';

                  echo '<div id="myDropdown" class="dropdown-content">';
                   
                   if($notIndex){
 
                    if($nav[$i]=="Admin")
                      echo '<a href="'.$nav[$i+1].'">Pannel</a>';

                    echo '<a href="'.$nav[$i+2].'">Log Out</a>';

                   }

                   else{

                    if($nav[$i]=="Admin")
                      echo '<a href="Pages/Admin.php">Pannel</a>';

                    echo '<a href="Pages/logout.php">Log Out</a>';
                  }

                  echo '</div>';

                echo "</div>";
             } 


                
             
            echo "</div>";
	     }

	    
	 ?>


 