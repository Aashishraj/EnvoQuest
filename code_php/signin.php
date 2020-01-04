<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<style type="text/css">
body{
	background-color:rgb(30,30,30);
}

#box{	padding:10px;
	padding-right:200px;
	position:relative;
	top:50px;left:20px;
	margin:auto;
	
	font-size:20px;
	width:600px;
	margin-left:450px;
	margin-top:-380px;
	
}
#signin{
	background-color:rgb(255,255,255);
	padding:2px 30px;
	border:1px solid rgb(0,0,0);
	border-radius:20px;
	margin-left:140px;
	color:rgb(100,100,100);
	font-size:15px;
}

#logo{
	border-image: url(envoquest_logo.png) 30 round;
}
#main{
	margin-left:300px;
	border-radius:25px;
	margin-right:300px;
	padding-left:100px;
	padding-right:100px;
	
	
	background-color:rgb(240,240,240);
	padding-left:20px;
	padding-right:100px;
	margin-right:100px;
	border:1px solid rgb(220,255,220);
	
	margin-right:200px;
	border-width: thick;
	margin-top:20px;
	margin-bottom:50px;
	margin-right:270px;
	padding-bottom:80px;
}
#log{
	border:1px solid rgb(220,255,220);
	background-color:rgb(250,250,250);
	padding:10px;
	
	margin-left: 630px;
	margin-right:630px;
	margin-top:-10px;
	margin-bottom:50px;
	border-width:thick;
	border-radius:20px;
}
#login{
	color:rgb(10,200,10);
	background-color:rgb(250,250,250);
	border:1px solid rgb(250,250,250);
	margin-left:10px;
	border-radius:10px;
}
</style>

</head>
<body>
<div id="main">
<div class="line" style="position:relative;top:50px;left:20px;"><img src="envo_logof.png" id="logo" width="400"></div>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<div id="box" class="line">

   <div class="form-group">
    <label for="exampleInputEmail1">Username</label><br>
    <input type="text" name="name" placeholder="Enter username" class="form-control">
   
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
   
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>

<div class="form-group">
    <label for="exampleInputPassword1">RE-Password</label>
    <input type="password" name="repass" class="form-control" id="exampleInputPassword1" placeholder="re-type Password">
  </div>
  
<br>
 <input type="submit" name="submit" value="Sign in" id="signin">
</div>
</form>
</div>

<script >
function login(){
	window.open("login.php","_self");
}
</script>
<div id="log">
Have an account?<button  onclick="login()" id="login"> Log in</button>
</div>
</body>
</html>



<?php
if(isset($_POST['submit']))
{	
	$name=$_POST['name'];
	$pass=$_POST['pass'];
	$repass=$_POST['repass'];
	$email=$_POST['email'];
	if(strcmp($repass,$pass)!=0)
	{
		echo '<script type="text/javascript">';
			echo 'alert("ERROR:password and retype password are not same")';
			echo '</script>';
	
	}
	else
	{
	$con=mysqli_connect("localhost","root","");
	if(!$con){die('could not connectr'.mysqli_error($con));}
	mysqli_select_db($con,"envo");
	$sql="INSERT INTO users(uname,email,password,no_post,no_followers,no_following) values('$name','$email','$pass',0,0,0)";
	if(!mysqli_query($con,$sql)){
	die('error'.mysqli_error($con));
	}
	echo '<script type="text/javascript">';
			echo 'alert("1 record added")';
			echo '</script>';
			$link = "<script>window.open(\"login.php\",\"_self\")</script>";
			echo $link;
			
	
	mysqli_close($con);
	}
}
?>










