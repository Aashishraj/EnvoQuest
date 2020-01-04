<html>
<head>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>

$(document).ready(function(){
$("#profile").click(function () {
    $("#file").click();
});
$("#profile").hover(function(){
    $(this).css({"background-color": "skyblue", "box-shadow" : "0 8px 16px 0 rgba(255,255,255,0.2), 0 6px 20px 0 rgba(255,255,255,0.19)"})
    }, function(){
    $(this).css({"background-color": "white", "box-shadow" : ""});
  });
  $(".img-hover-zoom--brightness").hover(function(){
    $(this).delay(100000000000).css({"box-shadow" : "0 8px 16px 0 rgba(255,255,255,0.2), 0 6px 20px 0 rgba(255,255,255,0.19)"})
    }, function(){
    $(this).delay(100000000000).css({"box-shadow" : ""}).delay(100000000000);
  });





});

</script>


<style>

.box1 img:hover {
  animation: shake 30s;
  animation-iteration-count: infinite;
}

@keyframes shake {
  0% { transform: translate(1px, 1px) rotate(0deg); }
  10% { transform: translate(-1px, -2px) rotate(-1deg); }
  20% { transform: translate(-3px, 0px) rotate(1deg); }
  30% { transform: translate(3px, 2px) rotate(0deg); }
  40% { transform: translate(1px, -1px) rotate(1deg); }
  50% { transform: translate(-1px, 2px) rotate(-1deg); }
  60% { transform: translate(-3px, 1px) rotate(0deg); }
  70% { transform: translate(3px, 1px) rotate(-1deg); }
  80% { transform: translate(-1px, -1px) rotate(1deg); }
  90% { transform: translate(1px, 2px) rotate(0deg); }
  100% { transform: translate(1px, -2px) rotate(-1deg); }
}



body{
	background-color:rgb(0,0,0);
	font-size:20px;
     
	
}






li.hi{

	color:black;
	display:inline-table;
	
	padding-left:1.4%;
	

	
}


.u1{
     display:inline-block;
     margin:auto;
     
}



a{	color:black;
	text-decoration:none;
}

#box1{	background-color:#1A1A1A;
	 position:fixed;
	 width:100%;
	 
	 padding-top:0.5%;
      margin-bottom:100px;
	 
      padding-left:5%;
      border-bottom:1px solid BLACK;
      z-index:15;
		
}
#home{
     text-decoration:none;
}

div.wrapper{
     
     display:none;
}

/*
#l3{
	position:absolute;
	top:100px;
}
*/



.img-hover-zoom--brightness img{
  transition: transform 0.3s, filter 0.3s ease-in-out;
  transform-origin: center center;
  transform: scale(1);
  filter: brightness(100%);
  overflow: hidden;
  filter: blur(0);
  
}
 

/* The Transformation */
.img-hover-zoom--brightness img:hover{
  filter: brightness(110%);
  transform: scale(1.3);
  filter: blur(0);
}


.img-hover-zoom--brightness img:not(:hover){
     filter: blur(0.5px);
}




</style>
</head>
<body>


<div id="box1" class="box1">

	<ul class="upper">
	<li class="hi" style="padding-left:11%;"><a id="home" href="homepage.php">
		<img src="http://localhost/envoquest/logo1" height="45px" style="margin-top:4%;"></a></li>
	
	<li class="hi" id="l3" style="padding-left:15%; padding-right:15%;">
		<!-- Search form -->
<form class="form-inline md-form form-sm mt-0">
  <i class="fas fa-search" aria-hidden="true"></i>
  <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search"
    aria-label="Search">
</form>
		</li>
	<li class="hi" id="l4"><a href="index.php"><img src="post1.png" height="25px" width="25px"></a></li>
	<li class="hi" id="l5"><a href="all.php"><img src="explore1.png" height="25px" width="25px"></a></li>
	
	
	<li class="hi" id="l1"><a href="user.php"><img src="profile1.png" height="25px" width="25px"></a></li>
	
	</ul>
</div>

           <br>




           <div class="container" style="padding-left:12%; ">  
                
               
                     
                <?php  
                session_start();
                
                $con = mysqli_connect("localhost", "root", "");  
                    if(!$con)
	                {die('could not connect'.mysqli_error($con));}
                    mysqli_select_db($con,"envo");
                $email=$_SESSION['email'];
                if(isset($_POST['submit'])){
                     echo"hello";
                    $query = "DELETE FROM photos where email=\"$email\"";  
                    mysqli_query($con, $query);  
                    $link = "<script>window.open(\"user.php\",\"_self\")</script>";
						echo $link;

                }
               
                $_SESSION['pic']="def_user.png";
             
                $query1 = "SELECT pic FROM users where email=\"$email\"";  
                $result1= mysqli_query($con, $query1);  
                
                while($row = mysqli_fetch_array($result1))  
                {
                    if($row['pic']==""){
                         $_SESSION['pic']="def_user.png";
                    }
                    else{
                    $_SESSION['pic']="uploads/".$row['pic'];
                    }
                }







                echo '
                 
                <!-- <div class="u1" style=" position:relative; top:-130px;">     <div class="u1" style="margin-left:10%; position:relative; top:-50px;">  -->


                <div class="box2" style="padding-top:12%;padding-bottom:4%;
                 color:rgb(100,100,100); vertical-align: baseline;">
                    





                    <div class="u1" style=" vertical-align: baseline;">
                         
                              <img src="http://localhost/envoquest/'.$_SESSION['pic'].'" id="profile" alt="no_image" class="rounded-circle" height="150px" width="150px" style="vertical-align: text-bottom;;border-radius:50%;object-fit: cover">
                         
                                   <div class="wrapper">
                                         <input  type="file" name="file" id="file" />
                                   </div>
                    </div>
                
                    





                    <div class="u1" style="margin-left:8%;vertical-align: baseline;">    
                    
                         <span style="font-size:25px; position:relative; top:4px;">'.$_SESSION['email'].'</span>&nbsp;&nbsp;&nbsp;
                         <button style=" font-size: 12px;padding:6px 12px  ;font-weight:550;border-radius: 2px; border: 2px solid lightgrey; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);">
                              <a href="user_update.php" style="text-decoration:none;">EDIT PROFILE</a>
                         </button>

                              &nbsp;&nbsp;&nbsp;<img src="http://localhost/envoquest/setting.png" alt="no_image" class="rounded-circle" height="35px" width="35px" onclick="DoSomething()";>

                         <br>
                         <b>Name</b>
                         <br>

                         description 
                         <br>
                         <br>
                         

                    </div>

                </div>
                </div>
                <hr style="border: 1px solid #959595; background-color:#959595; width:65%;">
                
                <p style="text-align: center;color:#959595;font-size:16px;"><img src="post_img1.png" height=18px style="  vertical-align: text-bottom;"> POSTS</p>
                ';








                echo '<div class="container" style="padding-left:4%; ">
                 <table > ';


                $query = "SELECT * FROM photos where email=\"$email\" ORDER BY udate";  
                $result = mysqli_query($con, $query);  
                $i=0;
                
                while($row = mysqli_fetch_array($result))  
                {  
                    
                    if($i%3==0){
                         echo '<tr>';
                    }
                     echo '  
                               <td style="padding:30px; border:none;">  
                               <div class="img-hover-zoom img-hover-zoom--brightness">
                               <img id=myImg src="http://localhost/envoquest/'.$row['photo'].'" style="overflow: hidden; height:290px;"  />
                               </div>
                                           
                               </td>  
                          
                          
                     '
                     ;
                     
                     $i=$i+1;
                     if($i%3==0){
                          echo '</tr>';
                     }

                }  
                ?>  
                </table>
                
                <br><br><br><br>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                 <b>Delete All Post &nbsp;<b><input type="submit" name="submit" style="background-color:red;">
                 </form>
           </div>  

      </body>  
 </html>  


 <script>
$(document).ready(function(){
 $(document).on('change', '#file', function(){
  var property = document.getElementById("file").files[0];
  var name=property.name;
  var ext = name.split('.').pop().toLowerCase();
  if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
  {
   alert("Invalid Image File");
  }
  
  else
  {
     var form_data = new FormData();
   form_data.append("file", property);
   $.ajax({
    url:"upload_profile.php",
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
     $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
    },   
    success:function(data)
    {
     $('#uploaded_image').html(data);
    }
   });
  }
 });
});
</script>