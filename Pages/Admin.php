<?php 
include "../code/php/connection.php";

 session_start();
  if(!isset($_SESSION['username']))
      {
                header('Location:../');
     }
 
 ?>


<!DOCTYPE html>
<html>
    <head>
			<title>UCC | Admin</title>
			<?php 

			        include '../code/php/header.php';
			        include '../code/php/adminbody.php';
			        include '../code/php/footer.php';
		    ?>

		     <link rel="stylesheet" type="text/css" href="../code/css/homeStyle.css">
		     <link rel="stylesheet" type="text/css" href="../code/css/adminStyle.css">
		     <link rel="stylesheet" type="text/css" href="../code/css/teacherListStyle.css">
		     <link rel="stylesheet" type="text/css" href="../code/css/deleteTeacherStyle.css">
		     <link rel="stylesheet" type="text/css" href="../code/css/boxStyle.css">
		      




			  <script type="text/javascript">
					    	
						  function getCode(str){ 
						    var xmlhttp;
                            
							if(str.length>0){

								  if (window.XMLHttpRequest){

								  xmlhttp = new XMLHttpRequest();

								  }

								   else{ 
								     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
						          }

						       xmlhttp.onreadystatechange = function(){
						         
						         if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						                document.getElementById("right").innerHTML = xmlhttp.responseText;
						            }

						       }

						      xmlhttp.open("GET", "../code/php/getPhp.php?q=" + str, true);
						      xmlhttp.send();
							}

							else{
								document.getElementById("right").innerHTML="Hello !!!";
								return;
							}

						}					

			    </script> 


			    <script type="text/javascript">
			    	
			    	function getSelectRating(){


                           var  str="";
                           var checkboxes =  document.getElementsByName("setTec[]");
                           var flag=false;
                           var  n=checkboxes.length;

                           for (var i=0; i<n; i++) 
							 {
							    if (checkboxes[i].checked) {

								        if(!flag){
								        		str += checkboxes[i].value;
								        		flag=true;
								        	}


								        else{
								        	str += "."+checkboxes[i].value;
								        }

								    }

							}

							 
                         var xmlhttp;
                            
							if(str.length>0){

								  if (window.XMLHttpRequest){

								  xmlhttp = new XMLHttpRequest();

								  }

								   else{ 
								     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
						          }

						       xmlhttp.onreadystatechange = function(){
						         
						         if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						                document.getElementById("right").innerHTML = xmlhttp.responseText;
						            }

						       }

						      xmlhttp.open("GET", "../code/php/setTeacherForRating.php?q=" + str, true);
						      xmlhttp.send();
							}
                        
                        
			    	}

			    	 

			    </script>

			    <script type="text/javascript">
			    	
			    	function deleteTecProfile(){
                      var  str="";
                           var checkboxes =  document.getElementsByName("delTec[]");
                           var flag=false;
                           var  n=checkboxes.length;

                           for (var i=0; i<n; i++) 
							 {
							    if (checkboxes[i].checked) {

								        if(!flag){
								        		str += checkboxes[i].value;
								        		flag=true;
								        	}


								        else{
								        	str += "."+checkboxes[i].value;
								        }

								    }

							}

                         var xmlhttp;
                            
							if(str.length>0){

								  if (window.XMLHttpRequest){

								  xmlhttp = new XMLHttpRequest();

								  }

								   else{ 
								     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
						          }

						       xmlhttp.onreadystatechange = function(){
						         
						         if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						                document.getElementById("right").innerHTML = xmlhttp.responseText;
						            }

						       }

						      xmlhttp.open("GET", "../code/php/deleteTeacherSql.php?q=" + str, true);
						      xmlhttp.send();
							}

			    	}


			    </script>



			    <script type="text/javascript">
			    	function deleteStudentProfile(){

			    		  var  str="";
                           var checkboxes =  document.getElementsByName("delStu[]");
                           var flag=false;
                           var  n=checkboxes.length;

                           for (var i=0; i<n; i++) 
							 {
							    if (checkboxes[i].checked) {

								        if(!flag){
								        		str += checkboxes[i].value;
								        		flag=true;
								        	}


								        else{
								        	str += "."+checkboxes[i].value;
								        }

								    }

							}

                         var xmlhttp;
                            
							if(str.length>0){

								  if (window.XMLHttpRequest){

								  xmlhttp = new XMLHttpRequest();

								  }

								   else{ 
								     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
						          }

						       xmlhttp.onreadystatechange = function(){
						         
						         if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						                document.getElementById("right").innerHTML = xmlhttp.responseText;
						            }

						       }

						      xmlhttp.open("GET", "../code/php/deleteStudentSql.php?q=" + str, true);
						      xmlhttp.send();
							}

			    	}

			    </script>

			    <script type="text/javascript">
			    	function changePass(){


						    var xmlhttp;
                            var pass = document.getElementById("passwrd").value;
                            var retpass = document.getElementById("repasswrd").value;

                             if(pass.length==0 || retpass.length==0){
                                  document.getElementById("changepassCheck").innerHTML=" || Empty Password!!!";
                                 document.getElementById("passwrd").value="";
                                 document.getElementById("repasswrd").value="";
                             }
                            
							else if(pass==retpass){

								  if (window.XMLHttpRequest){

								  xmlhttp = new XMLHttpRequest();

								  }

								   else{ 
								     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
						          }

						       xmlhttp.onreadystatechange = function(){
						         
						         if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						                document.getElementById("changepassCheck").innerHTML = xmlhttp.responseText;
						                document.getElementById("passwrd").value="";
                                        document.getElementById("repasswrd").value="";
						            }

						       }

						      xmlhttp.open("GET", "../code/php/changepassword.php?q=" + pass, true);
						      xmlhttp.send();

							}


							else{
								document.getElementById("changepassCheck").innerHTML=" || Invalid Input!!!";
								 document.getElementById("passwrd").value="";
                                 document.getElementById("repasswrd").value="";
							}

					}

			    </script>






			    <script type="text/javascript">
			    	function addNotice(){


						    var xmlhttp;
                            var notice = document.getElementById("notices").value;
                            
                              
							 if(notice.length>0){

								  if (window.XMLHttpRequest){

								  xmlhttp = new XMLHttpRequest();

								  }

								   else{ 
								     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
						          }

						       xmlhttp.onreadystatechange = function(){
						         
						         if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						                document.getElementById("addnoteCheck").innerHTML = xmlhttp.responseText;
						            }

						       }

						      xmlhttp.open("GET", "../code/php/addNotice.php?q=" + notice, true);
						      xmlhttp.send();

							}


							else{
								document.getElementById("addnoteCheck").innerHTML=" || Empty Notice!";
								 
							} 

					}


			    </script>

 
			    <script type="text/javascript">
			    	
			    	function toggle(source, name, buton) {

							  checkboxes = document.getElementsByName(name);
							  for(var i=0, n=checkboxes.length;i<n;i++) {
							   
							    checkboxes[i].checked = source.checked;

							  }
							  if(i>0 && source.checked) 
							  	{
							  		document.getElementById(buton).disabled = false;

							  	}
							  else 
							  	document.getElementById(buton).disabled = true;

					}
					 
			 </script>

			  <script type="text/javascript">
			    	
			    	function enableButton(name, buton) {
			    	 							   
				    var checkboxs=document.getElementsByName(name);
				    var okay=false;
                     var i=0;
                     var l=0;

				    for(i=0,l=checkboxs.length;i<l;i++)
				    {
				        if(checkboxs[i].checked)
				        {
				            okay=true;
				            document.getElementById("select").checked=false;
				            break;
				        }
				    }
				   if(okay) document.getElementById(buton).disabled = false;

                   else  document.getElementById(buton).disabled = true;
				}
					
					 
		  </script>





			 <script type="text/javascript">
				   function validatePhoto(inpt){
				   var ext = document.getElementById("fileToUpload").value.split(".").pop();
				    if(ext.toLowerCase()!="jpg" && ext.toLowerCase()!="jpeg" && ext.toLowerCase()!="png"){
				    	document.getElementById("check").innerHTML = "Invalid image! jpg, jpeg or png are allowed.";
				    	document.getElementById("tecOkButton").disabled = true; 
				    }
				    else{
				    	document.getElementById("check").innerHTML = "Valid image!!";
				    	document.getElementById("tecOkButton").disabled = false; 
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

		</head>

		<body>

         <?php 
            
            
	          head("Home", "../", "Feedback", "Teacher.php","Students", "StudentList.php", "Admin","#","logout.php");
	          adminBody();
	          footer();

         ?>

		</body>
</html>