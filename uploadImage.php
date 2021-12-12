<?php 
if(isset($_POST['up']))
	{
		$url = "images/". basename($_FILES['image']['name']);
	
		$image = $_FILES['image']['name'];
	
		if(move_uploaded_file($_FILES['image']['tmp_name'], $url)){
			echo "good";
		}else{
			echo "baaad";
		}
	}

 ?>



<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post" action="uploadImage.php" enctype="multipart/form-data">
		<input type="file" name="image">
		<input type="submit" value="OK" name="up">
	</form>
</body>
</html>