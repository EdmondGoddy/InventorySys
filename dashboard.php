<?php

include_once("./database/constants.php");
//session_start();
if (!isset($_SESSION["userid"])) {
	# code...
	header("location:".DOMAIN."/");
}

?>

<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.6.3/css/font-awesome.min.css">

    <title>Inventory Management System</title>
  </head>
  <body>
  	<?php include_once("templates/header.php"); ?>
  	<br><br>
    <div class="container">
    	
    	<?php
    	if (isset($_GET["msg"]) AND !empty($_GET["msg"])) {
    		# code...
    		?>
             <div class="alert alert-primary alert-dismissible fade show text-center" role="alert">
			  <strong><?php echo $_GET["msg"];  ?></strong> 
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
    		<?php
    	}
    	?>
	  <div class="row">
	  	<div class="col-md-4">
	  		<div class="card mx-auto">
			  <img class="card-img-top mx-auto" style="height: 180px;width: 60%;" src="images/user.jpg" alt="User Avatar">
			  <div class="card-body">
			    <h4 class="card-title">Profile Info</h4>
			    <p class="card-text"><i class="fa fa-user">&nbsp;</i>Name: <?php echo $_SESSION["username"]; ?></p>
			    <p class="card-text"><i class="fa fa-user">&nbsp;</i>Role: <?php echo $_SESSION["usertype"]; ?></p>
			    <p class="card-text"><i class="fa fa-clock-o">&nbsp;</i>Last Login: <?php echo $_SESSION["last_login"]; ?></p>
			    <a href="#" class="btn btn-primary"><i class="fa fa-edit">&nbsp;</i>Edit Profile</a>
			  </div>
			</div>
	  	</div>
	  	<div class="col-md-8">
	  		<div class="jumbotron" style="width: 100%;height: 100%;">
	  			<h1>Welcome Admin</h1>
	  			<div class="row">
	  				<div class="col-sm-6">
	  					<iframe src="https://free.timeanddate.com/clock/i7zxi0kg/n2345/szw160/szh160/hoc009/hbw0/hfc9ff/cf100/hnc0f9/hwc000/fan2/fas16/fac555/fdi60/mqcf0f/mqs4/mql2/mqw4/mqd78/mhcf90/mhs4/mhl3/mhw4/mhd78/mmv0/hhc990/hhs2/hmc990/hms2/hscf09" frameborder="0" width="160" height="160"></iframe>

	  				</div>
	  				<div class="col-sm-6">
  					    <div class="card">
					      <div class="card-body">
					        <h4 class="card-title">New Orders</h4>
					        <p class="card-text">Make Invoices and Create new Orders</p>
					        <a href="#" class="btn btn-primary"><i class="fa fa-first-order">&nbsp;</i>New Orders</a>
					      </div>
					    </div>
	  				</div>
	  			</div>
	  		</div>
	  	</div>
	  </div>
	</div>

	<p></p>
	<p></p>

	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="card">
			      <div class="card-body">
			        <h4 class="card-title">Categories</h4>
			        <p class="card-text">Manage and Add New Parent and Sub Categories</p>
			        <a href="#" data-toggle="modal" data-target="#form_category" class="btn btn-primary"><i class="fa fa-plus">&nbsp;</i>Add</a>
			        <a href="manage_categories.php" class="btn btn-primary">Manage</a>
			      </div>
			    </div>
			</div>
			<div class="col-md-4">
				<div class="card">
			      <div class="card-body">
			        <h4 class="card-title">Brands</h4>
			        <p class="card-text">Manage and Add New Brands</p>
			        <a href="#" data-toggle="modal" data-target="#form_brand" class="btn btn-primary"><i class="fa fa-plus">&nbsp;</i>Add</a>
			        <a href="manage_brand.php" class="btn btn-primary">Manage</a>
			      </div>
			    </div>		
			</div>
			<div class="col-md-4">		
				<div class="card">
			      <div class="card-body">
			        <h4 class="card-title">Products</h4>
			        <p class="card-text">Manage and Add New Products</p>
			        <a href="#" data-toggle="modal" data-target="#form_products" class="btn btn-primary"><i class="fa fa-plus">&nbsp;</i>Add</a>
			        <a href="manage_product.php" class="btn btn-primary">Manage</a>
			      </div>
			    </div>
			</div>
		</div>
	</div>

	<?php 
	 // Category Form
	 include_once("templates/category.php"); 
	?>

	<?php 
	 // Brand Form
	 include_once("templates/brand.php"); 
	?>

	<?php 
	 // Product Form
	 include_once("templates/products.php"); 
	?>




    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js" type="text/javascript"></script>
</body>
</html>