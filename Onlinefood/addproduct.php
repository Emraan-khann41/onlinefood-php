<?php
	include('conn.php');

	$pname=$_POST['pname'];
	$price=$_POST['price'];
	$category=$_POST['category'];
	$place=$_POST['place'];

	$fileinfo=PATHINFO($_FILES["photo"]["name"]);

	if(empty($fileinfo['filename'])){
		$location="";
	}
	else{
	$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
	move_uploaded_file($_FILES["photo"]["tmp_name"],"upload/" . $newFilename);
	$location="upload/" . $newFilename;
	}
	
	$sql="insert into product (productname, categoryid, price, photo,place) values ('$pname', '$category', '$price', '$location','$place')";
	$conn->query($sql);

	header('location:product.php');

?>