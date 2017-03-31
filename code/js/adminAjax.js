function getCode(str){
    var xmlhttp;

   document.getElementById("right").innerHTML="Hello !!!";
   return;
    

	if(str=="adminAccount"){

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