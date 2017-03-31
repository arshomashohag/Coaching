<?php 

include "code/php/connection.php";

$query = "SHOW PROCESSLIST";
$result = mysqli_query($dbc, $query);

if(mysqli_num_rows($result)<=1){
       mysqli_query($dbc, "SET GLOBAL event_scheduler = ON");
       mysqli_query($dbc, "SET @@global.event_scheduler = ON");
       mysqli_query($dbc, " SET GLOBAL event_scheduler = 1");
       mysqli_query($dbc, "SET @@global.event_scheduler = 1");
}

 session_start();

        if($_POST){

           
                $query = "SELECT * FROM admin WHERE ID='$_POST[uname]' AND Password=sha1('$_POST[psw]')";

                  $result = mysqli_query($dbc, $query);

                  $num = mysqli_num_rows($result);
                    

                  if($num==1){

                            $_SESSION['username'] = $_POST['uname'];
                            //header('location:../Pages/Admin.php');
                    }

                  else{
                         $query = "SELECT * FROM student WHERE ID='$_POST[uname]' AND Password='$_POST[psw]'";
                          $result = mysqli_query($dbc, $query);

                           $num = mysqli_num_rows($result);
                           if($num==1){

                            $_SESSION['username'] = $_POST['uname'];
                           // header('location:../Pages/Admin.php');
                    }

                  }                      
                          
      }

 ?>


<!DOCTYPE html>
<html>
	<head>
		<title>UCC | Home</title>
		<?php  
			 include 'code/php/header.php' ;
			 include 'code/php/footer.php' ; 
			 include 'code/php/body.php' ;
			 include "code/php/slider.php";
		 ?>

		<link rel="stylesheet" type="text/css" href="code/css/homeStyle.css">


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
		 
	</head>


	<body>

       <?php 

          global $dbc;

         $query = "SHOW EVENTS FROM codevrs";

         $result = mysqli_query($dbc, $query);
         $row = mysqli_fetch_assoc($result);

          if(!isset($_SESSION['username'])){           	
           	head("Home", "#",  "Feedback", "pages/Teacher.php", "Students", "pages/StudentList.php");
           }

           else{
              head("Home", "#",  "Feedback", "pages/Teacher.php","Students", "pages/StudentList.php", $_SESSION['username']);
           }

          slider();

          echo "<div id='mainbody'>";
          body();
          echo "</div>";
          footer();

        ?>


	</body>


</html>





