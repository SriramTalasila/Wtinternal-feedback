<?php
	require 'scripts/connect.php';
	session_start();
	$sql = "SELECT * FROM `products`";
	$res = mysqli_query($conn,$sql);
	if(isset($_SESSION['username'])){
		if($_SESSION['role'] !== 'A')
			header('location : Adminlogin.php');
	}
	if(isset($_POST['additem'])){
		$pname = $_POST['pname'];
		$des = $_POST['description'];
		
		$upload_image= $_FILES['myimage']["name"];
		$folder="images/";
		move_uploaded_file($_FILES['myimage']['tmp_name'], "$folder".$_FILES['myimage']["name"]);
		$insertpath = "INSERT INTO `products`( `name`, `description`, `img`) VALUES('$pname','$des','$upload_image')";
		$var=mysqli_query($conn,$insertpath);
		
		if(!$var){
			$soe = "Product or image name already Exits";
		}
		else
			$soe = "Product added successfully";
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
			$("#products").css("display","none");
			$("#showproducts").click(function(){
				
				$("#products").css("display","block");
				$("#addproducts	").css("display","none");
			})
			$("#addp").click(function(){
				console.log("gdhf");
				$("#products").css("display","none");
				$("#addproducts	").css("display","block");
			})
			alert("<input type='text'>")
		})
	</script>
	<body>
		<div class="navbar">
			<h1 class="navbar-brand">Product Feedback</h1>
			<button class="btn"><a href="logout.php">logout</a></button>
			
		</div>
		<button class="btn" id="addp">Add product</button>
		<button class="btn" id="showproducts">View product</button>
		<div id="addproducts">
			<?php if(isset($soe)) { echo $soe ;} ?>
			<form method="POST" action="adhome.php" enctype="multipart/form-data">
				<h4>Add new product</h4>
				<div>
				<label for="usn">Name :</label><br>
				<input type="text" width="30%" id ="usn" name="pname"><br>
				</div>
				<div>
				<label for="sn">Description :</label><br>
				<textarea type="text" row="4" col="3" id ="sn" name="description"></textarea>
				</div><br>
 				<input type="file" name="myimage"><br><br>
 				<input type="submit" name="additem" value="Add">
			</form>
		</div>
		</div>
		<div id="products">
			<div class="styl">
				<img width="200px" height="250px" src="images/apple.jpg">
				<p><strong>Name:</strong>fdsfsd<br><strong>Description:</strong> sdsdsd</p>
			</div>
			<?php if($res){
				while($row= mysqli_fetch_array($res)){
					echo "<div class='styl'><img width='200px' height='auto' src='images/".$row[3]."'>";
					echo "<p><strong>Name:</strong>".$row[1]."</br><strong>Description:</strong>".$row[2]."</p></div><button data-toggle='modal' onclick= '$(this).MessageBox(); data-sample-id='".$row[0]."' data-target='#mymodal'>Comment</button><hr>";
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
