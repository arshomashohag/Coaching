<?php 

function inputBox($class, $type, $name, $placeholder){
	echo '<input class= '.$class.' type= '.$type.' placeholder= '.$placeholder.' name= '.$name.' required>';
}

function textBox($id, $col, $name, $placeholder){ 
	echo '<textarea id= '.$id.' col= '.$col.' placeholder= '.$placeholder.' name= '.$name.'></textarea>';
 }

 function okButton($class, $value, $name){
     echo '<button class= '.$class.' onclick="doneEdit(this.value)" value= '.$value.' name= '.$name.'>OK</button>';
 }

     
 ?> 
