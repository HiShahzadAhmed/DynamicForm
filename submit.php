<?php 
	
	include"config/db.php";
	

	$array =  json_encode($_POST);

	$sql = "insert into `forms` (form) value ('$array')";
	$result = $con->query($sql);

	echo"Form Submitted";
?>