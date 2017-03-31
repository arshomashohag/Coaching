 <?php 
   session_start();
  ?>


<!DOCTYPE html>
<html>
	<head>
		<title>UCC | Teachers</title>

		 <?php 
	        include '../code/php/header.php';
	        include '../code/php/feedbackbody.php';
	        include '../code/php/footer.php';
		 ?>

		 <link rel="stylesheet" type="text/css" href="../code/css/homeStyle.css">
		 <link rel="stylesheet" type="text/css" href="../code/css/teacherListStyle.css">

		 <script type="text/javascript">
		 	function colorStar(id, n){
		 		var span = document.getElementById(id);

               if(n==1){
                   span.innerHTML = "Very Bad";
               }
               else if(n==2){
               	 span.innerHTML = "Bad";
               }

               else if(n==3){
               	 span.innerHTML = "Good";
               }
               else if(n==4){
               	 span.innerHTML = "Very Good";
               }
               else if(n==5){
               	 span.innerHTML = "Excillent";
               }
               else{
               	span.innerHTML = "Good";
               }
		 	}

		 </script>

<script type="text/javascript">
              /* When the user clicks on the button, 
        toggle between hiding and showing the dropdown content */
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown menu if the user clicks outside of it
        window.onclick = function(event) {
          if (!event.target.matches('.dropbtn')) {

            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
              var openDropdown = dropdowns[i];
              if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
              }
            }
          }
        }
      
    </script>

		 <script type="text/javascript">

		 	function saveRating(id, rating, stuid){
                            var xmlhttp;
                            var str = id+"."+rating+"."+stuid;
							if(rating.length>0){

								  if (window.XMLHttpRequest){

								  xmlhttp = new XMLHttpRequest();

								  }

								   else{ 
								     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
						          }

						       xmlhttp.onreadystatechange = function(){
						         
						         if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						                document.getElementById("teacher_list").innerHTML = xmlhttp.responseText;
						            }

						       }

						      xmlhttp.open("GET", "../code/php/addRating.php?q=" + str, true);
						      xmlhttp.send();
							}

							else{
								document.getElementById("warn").innerHTML="Rating is not saved.Please try again.";
								return;
							}

		 	}



		 </script>


		 <script type="text/javascript">
		 	function suggestion(str){

		 		 

		 		           var xmlhttp;
                            

								  if (window.XMLHttpRequest){

								  xmlhttp = new XMLHttpRequest();

								  }

								   else{ 
								     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
						          }

						       xmlhttp.onreadystatechange = function(){
						         
						         if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						                document.getElementById("teacher_list").innerHTML = xmlhttp.responseText;
						            }

						       }

						      xmlhttp.open("GET", "../code/php/getSearching.php?q=" + str, true);
						      xmlhttp.send();
							
                    return;							 

		 	}
		 </script>

	</head>

	<body>

       <?php 

         if(isset($_SESSION["username"])){

          head("Home","../", "Feedback","#","Students", "StudentList.php", $_SESSION['username'], "Admin.php","Logout.php");
         }
         else{
         	 head("Home","../", "Feedback","#",    "Students", "StudentList.php");
         }



          echo '<div id="teacher_head">';

	            echo '<label id="head_label"> <b>Our Respected Teachers</b></label><span id="warn"></span>';
 
				echo '<input type="text" id="src" onkeyup="suggestion(this.value)" placeholder="Search" name="search">';
				 
          echo '</div>';

          echo '<div id="teacher_list">';
 				
            teachersList();

          echo '</div>';
          
          footer();

        ?>



	</body>
</html>