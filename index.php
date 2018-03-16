<?php
	require 'scripts/connect.php';
	session_start();
	$sql = "SELECT * FROM `products`";
	$res = mysqli_query($conn,$sql);
	if(isset($_SESSION['username'])){
		echo $_SESSION['role'];
		if($_SESSION['role']=='U')
			header('location:userhome.php');
		else
			header('location:adhome.php');
	}
	
	
?>
<html>
	<head>
		<title>Product Feedback</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css" >
		<script src="jquery/jqurey.js"></script>
		<script src="bootstrap/bootstrap.min.js"></script>
	</head>
	<style>
		#addproducts{
			margin-left:25%;
		}
		.styl p{
			float:left;
			padding:5%;	
		}
		
	</style>
	<body>
		<div class="navbar">
			<h1 class="navbar-brand">Product Feedback</h1>
			
			<button class="btn" style="float:right"><a href="userlogin.php">user login</a></button>
			<button class="btn"><a href="Adminlogin.php">Admin login</a></button>
			
		</div>
		<div id="products">
			
			<?php if($res){
				while($row= mysqli_fetch_array($res)){
					echo "<div class='styl'><img width='200px' height='auto' src='images/".$row[3]."'>";
					echo "<p><strong>Name:</strong>".$row[1]."</br><strong>Description:</strong>".$row[2]."</p></div><hr>";
		}
	}?>	
		</div>
		
	</body>
</html>
