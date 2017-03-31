<?php 

   function notice($notices){

       $count = count($notices, 0);

       echo '<div id="block2">';

		       echo '<div class="notice_header">';
		          echo "<label><b>Notice</b></label>";      
		       echo '</div>';


		       echo '<div class="notice_body">';
		        
		        for($i=0; $i<$count; $i++){
		        	echo '<p><b id="star"> * </b>' . $notices[$i] . '</p>';
		        }
		        if($i==0){
		        	echo '<b id="star">No Notices !!</b>';
		        }
	        

	            echo '</div>';


       echo '</div>';


   }
    

 ?>