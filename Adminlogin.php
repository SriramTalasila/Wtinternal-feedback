<?php
	session_start();
	require 'scripts/connect.php';
	if(isset($_POST['username'])){
		$us = $_POST['username'];
		$pass = md5($_POST['pswd']);
		$sql = "SELECT `username`, `pass`,`role` FROM `login` WHERE username = '$us' and pass = '$pass'";
		$res = mysqli_query($conn,$sql);
		if(mysqli_num_rows($res)>0){
			$row = mysqli_fetch_array($res);
			$_SESSION['username'] = 'admin';
			$_SESSION['role'] = $row[2];
			header('location: adhome.php');
		}
		echo $_SESSION['username'];
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
		form{
			margin:10% 25% 0 25%;
			
		}
		.inputs{
			padding:3px;
		}
	</style>
	<body>
	
	<form action="Adminlogin.php" method="POST">
			<h3>Admin Login </h3>
			<div class="inputs">
			<label for="usn">Username :</label>
			<input type="text" width="30%" id ="usn" name="username">
			</div>
			<div class="inputs">
			<label for="pass">Password :</label>
			<input type="password" width="30%" id ="pass" name="pswd">
			</div>
			<input type="submit" name="submit" value="Login">
	</form>
	</body>
</html>
