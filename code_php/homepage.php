<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
	$("#leaf_n").attr("class","leaf_n");
$("img.leaf_n").click(function(){$(this).attr({"src":"http://localhost/envoquest/leaf_c","class":"leaf_c"})});
$("img.leaf_c").dblclick(function(){$(this).attr({"src":"http://localhost/envoquest/leaf_n","class":"leaf_n"})});
});

document.addEventListener("DOMContentLoaded", function(event) {
    document.getElementById('send').disabled = "true";
});
function myFunction() {
    var nameInput = document.getElementById('com').value;
    console.log(nameInput);
    if (nameInput === "") {
        document.getElementById('send').disabled = true;
    } else {
        document.getElementById('send').disabled = false;
    }
}
</script>

<style type="text/css">


body{
	background-color:rgb(0,0,0);
	font-size:20px;
	font-family:"arial";
}





#l1panel{
	background-color:rgb(240,240,240);
	color:black;
	border: 1px solid grey;
	
	display:none;
	z-index:1;
	
}

#l2panel{
	background-color:rgb(200,200,200);
	color:black;
	border: 1px solid grey;
	
	display:none;
	z-index:1;
}





li.hi{

	color:black;
	display:inline-table;
	
	padding-left:20px;
	

	
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
     
      z-index:15;
		
}
#home{
     text-decoration:none;
}

/*
#l3{
	position:absolute;
	top:100px;
	<!--style="background-color:#959595"-->
}
*/
</style>
</head>
<body>


<div id="box1">

	<ul class="upper">
	<li class="hi" style="padding-left:11%;"><a id="home" href="homepage.php">
		<img src="http://localhost/envoquest/logo1" height="45px" style="margin-top:4%;"></a></li>
	
	<li class="hi" id="l3" style="padding-left:15%; padding-right:15%;">
		<!-- Search form -->
<form class="form-inline md-form form-sm mt-0">
  <i class="fas fa-search" aria-hidden="true"></i>
  <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search" style="border-color:#959595;background-color:rgb(40,40,40);"
    aria-label="Search">
</form>
		</li>
	<li class="hi" id="l4"><a href="index.php"><img src="post1.png" height="25px" width="25px"></a></li>
	<li class="hi" id="l5"><a href="all.php"><img src="explore1.png" height="25px" width="25px" ></a></li>
	
	
	<li class="hi" id="l1"><a href="user.php"><img src="profile1.png" height="25px" width="25px" ></a></li>
	
	</ul>
</div>

<div class="container" style="width:500px;margin-left:300px;">  

<?php
   session_start();
?>

 <table  >  
		 <?php  
		 
		 $con = mysqli_connect("localhost", "root", "");  
			 if(!$con)
			 {die('could not connectr'.mysqli_error($con));}
			 mysqli_select_db($con,"envo");
		 $email=$_SESSION['email'];
		 $query = "SELECT * FROM photos ORDER BY udate DESC";  
		 $result = mysqli_query($con, $query);  
		 
		 while($row = mysqli_fetch_array($result))  
		 {  $i=$row['comments'];
			$j=$i;
			$l=$row['likes'];
			  echo ' 

				   <tr >  
						<td>  
						<br>
						
						<div style="padding-top:30px;padding-bottom:0px;
			  border:1px solid black;
			  border-radius:15px; color:rgb(100,100,100);margin-right:460px; background-color:rgb(20,20,20);padding-left:1px;"> 
								<hr style="border: 1px solid black;">
							  <img id=myImg height=600px width=600px src="http://localhost/envoquest/'.$row['photo'].'" class="img-thumnail" />
							  <br><br>
							  <div style="padding:10px;" class="likes">
							  <img id=myImg height=25px width=25px src="http://localhost/envoquest/leaf_n1" style="vertical-align: text-bottom;"id="leaf_n">
							  &nbsp;
								'.$l.' 
							  </div>
								<div style="padding:20px;">
							  <div style="color:rgb(10,150,10)"> '.$row['email']."</div>".$row['caption'].'<br>
							  ';

							  while($i>0){
								echo
								  '<div style="padding:10px;">'.$row['comment'.$i].'</div>';
								  $i=$i-1;
							  }
							  
							  if($j==1){
								echo
								'
								<br><div class="comments" style="color:grey"> '.$j.' comment</div><br> ';}
							  if($j>1){
							  echo
							  '
							  <br><div class="comments" style="color:grey"> '.$j.' comments</div><br> ';}
							 echo 
							  '
							  <br>
								<hr style="border: 1px solid black;">
							  <form method="post" enctype="multipart/form-data">
							  <input hidden name="photo" value="'.$row['photo'].'"> 
								 <input type="text" name="com" id="com" onkeyup="myFunction()" size="56%" placeholder="Enter comment......." style="border:none; border-radius:10px; background-color:black; padding:10px;">
								 <input type="submit" id="send" name="post" value="post" style="color:lightblue;background-color:black;border-radius:10px;  padding:10px;border:none;" >
							 
								 </form> 
								</div>
							  
							  

							  ';

							  
							 
							  echo 
							  '
							  </div>
						</td>
							  
						
						

				   </tr>  
				  
				   <br>
				   
			  '

			  
			  ;  

		 }  
		 if(isset($_POST['post'])){

				$photo=$_POST['photo'];
				$query="SELECT * FROM photos where photo=\"$photo\"";
				$result=mysqli_query($con,$query);
				
				
				while($row=mysqli_fetch_array($result))
				{	$com='<b><u>'.$_SESSION['email'].'</u></b>&nbsp'.$_POST['com'];
					$i=$row["comments"];
					$i=$i+1;
					$query="ALTER TABLE photos ADD COLUMN comment$i VARCHAR(100)";

					if(!mysqli_query($con,$query))
						echo "error".mysqli_error();
					$query="UPDATE photos SET comments=$i WHERE photo=\"$photo\""; 
					if(!mysqli_query($con,$query))
						echo "error".mysqli_error();
					$query="UPDATE photos SET comment$i=\"$com\" WHERE photo=\"$photo\"";
					if(!mysqli_query($con,$query))
						echo "error".mysqli_error();
						$link = "<script>window.open(\"homepage.php\",\"_self\")</script>";
						echo $link;
					break;
				}

			/*$i=0;
			$query="ALTER TABLE photos
			ADD COLUMN comment1 VARCHAR(100);";
			
			$query="UPDATE photos
			SET comments=$i	
			WHERE
			email = $email;";  


			if(mysqli_query($con,$query))  
			{  
				 echo '<script>alert("Image Inserted into Database")</script>';  
			}
			*/
		 }

		 ?>  
		 </table>  
		
	</div> 




</body>
</html>
