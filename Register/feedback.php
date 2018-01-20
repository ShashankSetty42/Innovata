<?php

$connect=mysqli_connect('localhost','root','linux123');
if(!$connect)
	echo "Connection to server failed!";
if(!mysqli_select_db($connect,'project'))
	echo "Database could not be selcted!";

//Guide variables
$email=$_POST['email'];
$summary=$_POST['sum'];
$feedback=$_POST['feedback'];

//insert guide details
$sql="INSERT INTO Feedback VALUES('$email','$summary','$feedback')";

if(!mysqli_query($connect,$sql)){
	echo "Not inserted into feedback";
	printf("error: %s\n", mysqli_error($connect));
}

//redirect header(finish)
header('Location: ../index.html');

?>
