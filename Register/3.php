<?php

$connect=mysqli_connect('localhost','root','linux123');
if(!$connect)
	echo "Connection to server failed!";
if(!mysqli_select_db($connect,'project'))
	echo "Database could not be selcted!";
if(isset($_POST["submit"])) 
{

//Guide variables
$guideName=$_POST['gname'];
$guideEmail=$_POST['gemail'];
$guideDepartment=$_POST['gdept'];
$guideNumber=$_POST['gno'];

/* get latest pId value and assign to $pId */

$res=mysqli_query($connect,"SELECT MAX(pId) FROM projectdetails");
$p=mysqli_fetch_assoc($res);
$pId=intval($p['pid']);

//insert guide details
$sql="INSERT INTO guideDetails VALUES('$pId','$guideName','$guideEmail','$guideDepartment','$guideNumber')";

if(!mysqli_query($connect,$sql)){
	echo "Not Inserted to guide details";
	printf("error: %s\n", mysqli_error($connect));
}
}
//redirect header(finish)
header('Location: ../index.html');

?>
