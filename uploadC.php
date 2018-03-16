<?php
	session_start();
	require 'scripts/connect.php';
	$pid = $_POST['id'];
    $feedback = $_POST['feedback'];
    $usr = $_SESSION['username'];
    $sql = "INSERT INTO `comments` (`pid`, `feedback`, `uname`) VALUES ('$pid','$feedback','$usr')";
    $res = mysqli_query($conn,$sql);
    
?>