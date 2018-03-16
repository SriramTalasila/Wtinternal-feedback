<?php
	require 'scripts/connect.php';
	$sql = "SELECT * FROM `products`";
	$res = mysqli_query($conn,$sql);
	if($res){
		while($row= mysqli_fetch_array($res)){
			echo "<div><img width='200px' height='auto' src='images/".$row[3]."'>";
			echo "<p><strong>Name:</strong>".$row[1]."</br><strong>Description:</strong>".$row[2]."</p></div>";
		}
	}
?>
