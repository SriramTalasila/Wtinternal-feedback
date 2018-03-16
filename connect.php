<?php
	$conn = mysqli_connect("localhost","root","","feedback");
	if(!$conn){
		die('Connectio Failed:'.mysqli_error(!$conn));
	}
	
?>

