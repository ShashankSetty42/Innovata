<?php

$connect=mysqli_connect('localhost','root','linux123');
if(!$connect)
	echo "Connection to server failed!";
if(!mysqli_select_db($connect,'project'))
	echo "Database could not be selcted!";

//---------------------------------------------------------------------
//Project variables
$projectName=$_POST['pname'];
$stream=$_POST['branch'];
$themeContest=$_POST['theme']; //yes or no
$collegeAddress=$_POST['college']; //with name
$university=$_POST['uni'];
$eRequirements=$_POST['requirements']; //exhibition requirements
$projectAbstract=$_POST['abstract'];
//---------------------------------------------------------------------

$target_dir = "uploads/";
$uploadOk = 1;
$filename = basename($_FILES["projectimg"]["name"]);
$imageFileType = strtolower(pathinfo($filename,PATHINFO_EXTENSION));
$imagename = $projectName."-".$filename."-".time().".".$imageFileType;
$target_file = $target_dir . $imagename;


// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) 
{
    $check = getimagesize($_FILES["projectimg"]["tmp_name"]);
    if($check !== false) 
        $uploadOk = 1;
    else 
    {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) 
{
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["projectimg"]["size"] > 500000) 
{
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
{
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) 
{
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} 
else 
{
    if (move_uploaded_file($_FILES["projectimg"]["tmp_name"], $target_file)) 
    {
        echo "The file ". basename( $_FILES["projectimg"]["name"]). " has been uploaded.";
        $sql="INSERT INTO  projectdetails(pname,stream,theme,college,uni,req,abstract,img,loc) VALUES('$projectName','$stream','$themeContest','$collegeAddress','$university','$eRequirements','$abstract','$imagename','$target_dir')";
    
        if(!mysqli_query($connect,$sql))
        {
	       echo "Not Inserted to student 2";
	       printf("error: %s\n", mysqli_error($connect));
        }
    }
    else
        echo "Sorry, there was an error uploading your file.";
}
   
	
//redirect header(to page2.html)
header('Location: page2.html');

?>
