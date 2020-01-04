<?php
//upload.php
if($_FILES["file"]["name"] != '')
{
    echo '<script>alert("starting")</script>';  
    






    
    $name = rand(100, 999).".jpg";

    $target_dir = "uploads/";
    $target_file = $target_dir . $name;


    $uploadOk = 1;
    echo  $target_file;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo "The file ".$name. " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    $image=basename($name,".jpg"); // used to store the filename in a variable




session_start();
 $con = mysqli_connect("localhost", "root", "");  
 if(!$con)
	{die('could not connectr'.mysqli_error($con));}
 mysqli_select_db($con,"envo");

 
     
 $email=$_SESSION['email'];
    
 $query="UPDATE users SET pic='$image' WHERE email='$email'"; 
 if(mysqli_query($con,$query))  
 {      
      echo '<script>alert("Image Inserted into Database")</script>';  
      $link = "<script>window.open(\"user.php\",\"_self\")</script>";
		echo $link;
 }









}
?>
