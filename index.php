<!DOCTYPE html>
<html>
<head><title>image</title>
	</head>
	 <link rel="stylesheet" type="text/css" href="styles.css">
	<body>
      <div class="container">
		<div class="form">
		<h1>UPLOAD THE IMAGE</h1>
		<form action="" method="post" enctype="multipart/form-data">
			select an image
			<input type="file" name="pics"><br>
			<center><input type="submit" name="submit"></center>

		</form>
	</div>
</div>
	</body>
	</html>
	

<?php 
	
if(isset($_FILES["pics"])){

	$errors= array();
	$image_name = $_FILES['pics']['name'];
	$image_size = $_FILES['pics']['size'];
	$image_tmp = $_FILES['pics']['tmp_name'];
	$image_type = $_FILES['pics']['type'];

	$file_ext=strtolower(end(explode('.',$_FILES['pics']['name'])));

	$extension= array("jpg","jpeg","png");

	if(in_array($file_ext,$extension)===false){
	$errors[]="file must be jpg,png or jpeg";
	}

	if($image_size >2097152){
	$errors[]="file size must be 2MB";
	}

	if(empty($errors)==true){
		move_uploaded_file($image_tmp,"./upload/".$image_name);
		echo "success";
	} else {
		print_r($errors);	
	}

 }
	 
    

?>



