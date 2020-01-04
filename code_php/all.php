<html>  
      <head>  
            
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  






           <script>

$(document).ready(function(){

  $(".img-hover-zoom--brightness").hover(function(){
    $(this).delay(100000000000).css({"box-shadow" : "0 8px 16px 0 rgba(255,255,255,0.2), 0 6px 20px 0 rgba(255,255,255,0.19)"})
    }, function(){
    $(this).delay(100000000000).css({"box-shadow" : ""}).delay(100000000000);
  });





});

</script>




           
<style>


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

div.wrapper{
     
     display:none;
}





.img-hover-zoom--brightness img{
  transition: transform 0.5s, filter 0.5s ease-in-out;
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






           <br /><br />  <br />  
           <div class="container" style="margin-left:13%; padding:auto;">        
                
                <hr style="color:grey;width:65%;">
                
                <p style="text-align: center;color:#959595;font-size:16px;"><img src="post_img1.png" height=18px style="  vertical-align: text-bottom;"> POSTS</p>
                '
                <table >  
                     
                <?php  
                session_start();
                $con = mysqli_connect("localhost", "root", "");  
                    if(!$con)
	                {die('could not connectr'.mysqli_error($con));}
                    mysqli_select_db($con,"envo");
                $email=$_SESSION['email'];
                $query = "SELECT * FROM photos ORDER BY udate";  
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
                               <img id=myImg height=300px width=300px src="http://localhost/envoquest/'.$row['photo'].'" class="img-thumnail" />
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
           </div>  
      </body>  
 </html>  

 
<!--

<span aria-label="New Post" class="glyphsSpriteNew_post__outline__24__grey_9 u-__7"></span>

<div class="RxjQs" style="background-image: url(&quot;blob:https://www.instagram.com/e7d806a5-1b3f-43e8-8829-c93db2106029&quot;); position: absolute; height: 100%; left: 0%; top: 0%; width: 100%; transition: all 0.2s ease 0s; transform: rotate(360deg) rotate(0deg); transform-origin: 50% 50%;"></div>
<div class="vu-2I" style="left: 33%; top: 0%; width: 1px; height: 100%;"></div>
<div class="vu-2I" style="right: 33%; top: 0%; width: 1px; height: 100%;"></div>
<div class="vu-2I" style="top: 33%; left: 0%; height: 1px; width: 100%;"></div>
<div class="vu-2I" style="bottom: 33%; left: 0%; height: 1px; width: 100%;"></div>

-->