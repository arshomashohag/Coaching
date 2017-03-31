<?php 

  function signIn(){

      echo '<div id="block1">';

         echo '<form action="index.php" method="post" role="form">';

              echo '<div id=loginhead>';
               echo '<label><b>Sign In</b></label>';
              echo '</div>';

                echo '<div id="userId">'; 
                      
                   echo '<label><b>User ID</b></label><br>';

                    echo '<input type="text" placeholder="Enter Userid" name="uname" required>';

                echo "</div>"; 


                echo '<div id="password">'; 
                    echo '<label><b>Password</b></label><br>';
                    echo '<input type="password" placeholder="Enter Password" name="psw" required>';
                echo "</div>"; 
                 
                echo '<div id="submit">'; 
                    echo '<input id="login" type="submit" name="commit" value="Login" ';
                      if(isset($_SESSION['username']))
                        { 
                          echo "disabled";
                         }
                        echo ">";

                echo "</div>"; 

         echo "</form>";

    echo "</div>"; 


   }


 ?>