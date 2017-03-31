<?php 

  

  function slider(){
  
  echo '<div class="slider">';
  
	  echo '<img class="mySlides" src="resource/images/slider/image1.jpg">';
	  echo '<img class="mySlides" src="resource/images/slider/image2.jpg">';
	  echo '<img class="mySlides" src="resource/images/slider/image3.jpg">';
	  echo '<img class="mySlides" src="resource/images/slider/image4.jpg">';

	  echo '<a class="btn" onclick="plusDivs(-1)">Prev</a>';
	  echo '<a class="btn" onclick="plusDivs(1)">Next</a>';

  echo '</div>';


 echo '<script>
   var slideIndex = 1;
   showDivs(slideIndex);

    function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  x[slideIndex-1].style.display = "block";
}
</script>';
     
  }



 ?>