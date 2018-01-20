<?php

$connect=mysqli_connect('localhost','root','linux123');
if(!$connect)
	echo "Connection to server failed!";
if(!mysqli_select_db($connect,'project'))
	echo "Database could not be selcted!";

if(isset($_POST["submit"])) 
{
//person variables
//name
$name1=$_POST['name1'];
$name2=$_POST['name2'];
$name3=$_POST['name3'];
$name4=$_POST['name4'];

//semester
$sem1=$_POST['sem1'];
$sem2=$_POST['sem2'];
$sem3=$_POST['sem3'];
$sem4=$_POST['sem4'];


//Accommodation
$acc1=$_POST['p1acc'];
$acc2=$_POST['p2acc'];
$acc3=$_POST['p3acc'];
$acc4=$_POST['p4acc'];


//Phone Numbers
$pNo1=$_POST['no1'];
$pNo2=$_POST['no2'];
$pNo3=$_POST['no3'];
$pNo4=$_POST['no4'];


//email
$pEmail1=$_POST['email1'];
$pEmail2=$_POST['email2'];
$pEmail3=$_POST['email3'];
$pEmail4=$_POST['email4'];


//Gender
$g1=$_POST['gender1'];
$g2=$_POST['gender2'];
$g3=$_POST['gender3'];
$g4=$_POST['gender4'];


//not applicable
$na3=$_POST['na3'];
$na4=$_POST['na4'];

$count=1; //to index team members


//insert student details

/* get latest pId value and assign to $pId */

$res=mysqli_query($connect,"SELECT MAX(pId) FROM projectdetails");
$p=mysqli_fetch_assoc($res);
$pId=intval($p['pid']);



//person1
$sql="INSERT INTO studentdetails VALUES('$pId','$count','$name1','$sem1','$acc1','$pNo1','$pEmail1','$g1')";
$count++;

if(!mysqli_query($connect,$sql)){
	echo "person 1 not inserted";
	printf("error: %s\n", mysqli_error($connect));
}
	
//person2
$sql="INSERT INTO studentdetails VALUES('$pId','$count','$name2','$sem2','$acc2','$pNo2','$pEmail2','$g2')";
$count++;

if(!mysqli_query($connect,$sql)){
	echo "person 2 not interested";
	printf("error: %s\n", mysqli_error($connect));
}
	
//person3
if(na3==false) $sql="INSERT INTO studentdetails VALUES('$pId','$count',$name3','$sem3','$acc3','$pNo3','$pEmail3','$g3')";
$count++;

if(!mysqli_query($connect,$sql)){
	echo "person 3 not inserted";
	printf("error: %s\n", mysqli_error($connect));
}
	
//person4
if(na4==false) $sql="INSERT INTO studentdetails VALUES('$pId','$count','$name4','$sem4','$acc4','$pNo4','$pEmail4','$g4')";

if(!mysqli_query($connect,$sql)){
	echo "person 4 not inserted";
	printf("error: %s\n", mysqli_error($connect));
}
}
	
//redirect header(to page3.html)
header('Location: page3.html');
?>