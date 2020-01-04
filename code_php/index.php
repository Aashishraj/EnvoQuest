<html>  
    <head>  
        <title>Upload Post</title>  
		
		<script src="jquery.min.js"></script>  
		<script src="bootstrap.min.js"></script>
		<script src="croppie.js"></script>
		<link rel="stylesheet" href="bootstrap.min.css" />
		<link rel="stylesheet" href="croppie.css" />
    <style>
    
body{
	background-color:rgb(0,0,0);
	font-size:20px;
	font-family:"Comic Sans MS";
}
    </style>
    </head>  
    <body>  
        <div class="container">
          <br />
    
      <br />
      <br />
			<div class="panel panel-default">
  				<div class="panel-heading">Select Image To Post</div>
  				<div class="panel-body" align="center">
          <form method="post" enctype="multipart/form-data" action="upload.php">
          <br>
          <hr>
          <table>
           <tr><td> <input type="file" name="upload_image" value="upload_image" id="upload_image" data-filetype="image/gif,image/jpeg,image/jpg,image/pjpeg,image/x-png,image/png" />
            </td></tr>
            <tr><td>
            &nbsp;
            </td></tr>
            <tr><td> Caption     
                     <input type="text" name="caption"> </td></tr>
                     </table>
                    <br>
                   
          <hr>
                     <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />  
          </form>
  					<br />
  					<div id="uploaded_image"></div>
  				</div>
  			</div>
  		</div>
    </body>  
</html>

<div id="uploadimageModal" class="modal" role="dialog" style="width:1250px; margin:auto;">
	<div class="modal-dialog" style="width:1250px; margin:auto;">
		<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
        		<h4 class="modal-title">Upload & Crop Image</h4>
      		</div>
      		<div class="modal-body">
        		<div class="row">
  					<div class="col-md-8 text-center">
          
              <div id="image_demo" style="width:900px; ">
                </div>
                
  					</div>
  					<div class="col-md-4" >
  					
              
              <span style="position:absolute;right:100px; top:100px;"><button class="btn btn-success crop_image" >Crop & Upload Image</button></span>
          
					</div>
				</div>
      		</div>
      		<div class="modal-footer" style="position:absolute; bottom:120px; right:120px;">
        		<button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
      		</div>
    	</div>
    </div>
</div>

<script>  
$(document).ready(function(){

	$image_crop = $('#image_demo').croppie({
    enableExif: true,
    viewport: {
      width:600,
      height:600,
      type:'square' //circle
    },
    boundary:{
      width:900,
      height:630
    }
  });




  $('#upload_image').on('change', function(){
   
    var fileInput = document.getElementById('upload_image');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if(!allowedExtensions.exec(filePath)){
        alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');
        fileInput.value = '';
        return false;
    }

    if(fileInput.value ==''){
      alert('Please select file to upload');
    }

    else{



    var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
    $('#uploadimageModal').modal('show');
  }
  });

  $('.crop_image').click(function(event){
    $image_crop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function(response){
      $.ajax({
        url:"upload.php",
        type: "POST",
        data:{"image": response},
        success:function(data)
        {
          $('#uploadimageModal').modal('hide');
          $('#uploaded_image').html(data);
        }
      });
    })
  });

});  
</script>