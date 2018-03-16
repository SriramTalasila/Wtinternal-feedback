<?php
	session_start();
	require 'scripts/connect.php';
	if(isset($_POST['submit'])){
		if($_POST['submit']=='Login'){
			$us = $_POST['username'];
			$pass = md5($_POST['pswd']);
			$sql = "SELECT `username`, `pass`,`role` FROM `login` WHERE username = '$us' and pass = '$pass'";
			$res = mysqli_query($conn,$sql);
			if(mysqli_num_rows($res)>0){
				$row = mysqli_fetch_array($res);
				$_SESSION['username'] = $row[0];
				$_SESSION['role'] = $row[2];
				header('location: userhome.php');
			}
		}
		else{
			$us = $_POST['Rusername'];
			$pass = md5($_POST['Rpswd']);
			$email = $_POST['email'];
			$sql = "INSERT INTO `login`( `email`, `username`, `pass`, `role`) VALUES('$email','$us','$pass','U')";
			$res = mysqli_query($conn,$sql);
			if(!$res)
				echo "Registeration failed";
		}
		//if(mysqli_num_rows($res)>0){
		//	$row = mysqli_fetch_array($res);
		//	$_SESSION['username'] = 'admin';
		//	$_SESSION['role'] = $row[2];
		//	header('location: adhome.php');
	//	}
	//	echo $_SESSION['username'];
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
	<script>
		$(document).ready(function(){
			$("#register").css("display","none");
			$("#resbtn").click(function(){
				$("#register").css("display","block");
				$("#login").css("display","none");
			})
			$("#logbtn").click(function(){
				console.log("gdhf");
				$("#register").css("display","none");
				$("#login").css("display","block");
			})
		})
	</script>
	<body>
	<div id="login" >
	<form action="userlogin.php" method="POST">
			<h3>User Login </h3>
			<div class="inputs">
			<label for="usn">Username :</label>
			<input type="text" width="30%" id ="usn" name="username">
			</div>
			<div class="inputs">
			<label for="pass">Password :</label>
			<input type="password" width="30%" id ="pass" name="pswd">
			</div>
			
			<input class="btn" type="submit" name="submit" value="Login">
			<a  id="resbtn">register</a>
	</form>
	</div>
	<div id="register" >
	<form action="userlogin.php" method="POST">
			<h3>User Registration </h3>
			<div class="inputs">
			<label for="us">Email :</label>
			<input type="email" width="30%" id ="us" name="email">
			</div>
			<div class="inputs">
			<label for="usn">Username :</label>
			<input type="text" width="30%" id ="usn" name="Rusername">
			</div>
			<div class="inputs">
			<label for="pass">Password :</label>
			<input type="password" width="30%" id ="pass" name="Rpswd">
			</div>
			
			<input class="btn" type="submit" name="submit" value="Register">
			<a  id = "logbtn">Login</a>
	</form>
	</div>
	</body>
</html>
