<?php
	session_start();
	require 'scripts/connect.php';
	$id = $_GET['id'];
    $sql = "SELECT `pid`, `feedback`, `uname` FROM `comments` WHERE pid=$id";
    $res = mysqli_query($conn,$sql);
    if($res){
        $outp = array();
		$outp = $res->fetch_all(MYSQLI_ASSOC);
		echo json_encode(array("result"=>$outp));
    }
?>