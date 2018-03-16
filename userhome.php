<?php
	require 'scripts/connect.php';
	session_start();
	$sql = "SELECT * FROM `products`";
	$res = mysqli_query($conn,$sql);
	if(isset($_SESSION['username'])){
		if($_SESSION['role'] !== 'U')
			header('location : userlogin.php');
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
	<script>
		$(document).ready(function(){
			    $.fn.MessageBox = function () {
			    var Qkey = $(this).data("sample-id");
			    console.log('QKey';)
	}
		})
	</script>
	<body>
		<div class="navbar">
			<h1 class="navbar-brand">Product Feedback</h1>
			<button class="btn"><a href="logout.php">logout</a></button>
			
		</div>
		
		
		<div id="products">
			
			<?php if($res){
				while($row= mysqli_fetch_array($res)){
					echo "<div class='styl'><img width='200px' height='auto' src='images/".$row[3]."'>";
					echo "<p><strong>Name:</strong>".$row[1]."</br><strong>Description:</strong>".$row[2]."</p></div><button data-toggle='modal' onclick= 'chm(".$row[0].",'".$_SESSION['username']."')' data-target='#mymodal'>Comment</button><hr>";
		}
	}?>	
		</div>
		<div id="mymodal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
				<h4>Comments</h4>
					<button data-dismiss="modal" class="close" data-target="#mymodal">&times;</button>	
					<div id="addc" class="modal-body">
					
					</div>
				</div>
			</div>
		</div>
	</div>  
				
	</body>
</html>
