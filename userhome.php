<?php
	require 'scripts/connect.php';
	session_start();
	$usr = $_SESSION['username'];
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
	<script type="text/javascript">
		
		function displayC(pid){
			$("#addc").empty();
			$.getJSON("sendc.php",{id:pid}).done(function(res){
				$.each(res.result, function(i, result) {
					console.log(result.pid);
					content="<p><strong>"+result.uname+"</strong></p>";
					content+="<p>"+result.feedback+"</p><hr>";
					$(content).appendTo("#addc");
				})
			});
		}
		

		function myFunction(pid) {
			displayC(pid);
			$("#cbtn").click(function(){
				var cmt = $("#comnt").val();
				dta={
					id:pid,
					feedback:cmt
				}
				console.log(dta);
				if(pid!=0||pid!=null){
					$.post("uploadC.php", dta).done(function(data){
						displayC(pid);
						pid=null;
					})
				}
					
			})
		}
				
	

		
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
					echo "<p><strong>Name:</strong>".$row[1]."</br><strong>Description:</strong>".$row[2]."</p></div><button data-toggle='modal' onclick='myFunction(".$row[0].");' data-target='#mymodal'>Comment</button><hr>";
		}
	}?>	
		</div>
		<div id="mymodal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">

				<h4>Comments</h4>
					<button data-dismiss="modal" class="close" data-target="#mymodal">&times;</button>	
					</div>
					<div  class="modal-body">
						<div id="addc"></div>
						<textarea row="3" col="4" id ="comnt" ></textarea>
						<button style="float:right"id="cbtn">Comment</button>
					
				</div>
			</div>
		</div>
	</div>  
				
	</body>
</html>
