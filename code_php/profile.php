<?php  
session_start();
 $con = mysqli_connect("localhost", "root", "");  
 if(!$con)
	{die('could not connectr'.mysqli_error($con));}
 mysqli_select_db($con,"envo");
 if(isset($_POST["insert"]))  
 {  
          //Process the image that is uploaded by the user
        
		 $valid_formats = array("jpg", "png", "gif", "bmp","jpeg");
		 $name = $_FILES['imageUpload']['name'];


		echo "$name";

		 if(strlen($name))
        {
        	list($txt, $ext) = explode(".", $name);
        	if(in_array($ext,$valid_formats))
        	{
          $target_dir = "uploads/";
          $target_file = $target_dir . basename($_FILES["imageUpload"]["name"]);


          $uploadOk = 1;
          echo  $target_file;
          $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
      
          if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file)) {
              echo "The file ". basename( $_FILES["imageUpload"]["name"]). " has been uploaded.";
          } else {
              echo "Sorry, there was an error uploading your file.";
          }
      
          $image=basename( $_FILES["imageUpload"]["name"],".jpg"); // used to store the filename in a variable
      
          
      
      
      
     
      $email=$_SESSION['email'];
    
      $query="UPDATE users SET pic='$image' WHERE email='$email'"; 
      if(mysqli_query($con,$query))  
      {  
           echo '<script>alert("Image Inserted into Database")</script>';  
      }

      }
      else {
        echo '<script>alert("only "jpg", "png", "gif", "bmp","jpeg" are allowed")</script>';  
      }
    }
 }  
 ?>  

]
 
 <html>  
      <head>  
                                     
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:500px;">  
                <h3 align="center">UPLOAD POST</h3>  
                <br />  
                <form method="post" enctype="multipart/form-data"> 
                    image UPLOAD
                 
                    <input type="file" name="imageUpload" id="imageUpload"> 
                
                     <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />  
                </form>  
                <br />  
                <br />  
                <table class="table table-bordered">  
                     <tr>  
                          <th>Image</th>  
                     </tr>  
                <?php  
               
                $email=$_SESSION['email'];
                $query = "SELECT pic FROM users where email=\"$email\"";  
                $result = mysqli_query($con, $query);  
                
                while($row = mysqli_fetch_array($result))  
                {   
                     echo '  
                          <tr>  
                               <td>     
                               <img id=myImg height=100px width=100px src="http://localhost/envoquest/uploads/'.$row['photo'].'" class="img-thumnail" /></td>
                                   
                                   
                               </td>  
                          </tr>  
                          <tr>
                                <td>'.$row['caption'].$row['photo'].'
                                </td>

                          </tr>
                     '
                     ;  
                }  
                ?>  
                </table>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#insert').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = <?php echo pathinfo($_FILES["file-input"]["name"], PATHINFO_EXTENSION) ;?>;  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      });  
 });  
 </script>  



















