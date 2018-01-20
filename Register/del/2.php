<?php

$connect=mysqli_connect('localhost','root','linux123');
if(!$connect)
	echo "Connection to server failed!";
if(!mysqli_select_db($connect,'project'))
	echo "Database could not be selcted!";



$count=1; //to index team members


//insert student details

/* get latest pId value and assign to $pId */


echo $pId+1;
	
//redirect header(to page3.html)

?>