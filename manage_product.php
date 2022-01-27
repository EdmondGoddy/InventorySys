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
		<table class="table table-hover table-bordered">
		    <thead>
		      <tr>
		        <th>No</th>
		        <th>Product</th>
		        <th>Catgegory</th>
		        <th>Brand</th>
		        <th>Price</th>
		        <th>Stock</th>
		        <th>Added Date</th>
		        <th>Status</th>
		        <th>Action</th>
		      </tr>
		    </thead>
		    <tbody id="get_product">
		    <!--  <tr>
		        <td>1</td>
		        <td>Electronics</td>
		        <td>Selected</td>
		        <td><a href="#" class="btn btn-success btn-sm"><i class="fa fa-light"></i>Active</a></td>
		        <td>
		        	<a href="#" class="btn btn-danger btn-sm"><i class="fa fa-trash">&nbsp;</i>Delete</a>
		        	<a href="#" class="btn btn-info btn-sm"><i class="fa fa-edit">&nbsp;</i>Edit</a>
		        </td>
		      </tr>  -->
		    </tbody>
	    </table>
	</div>

  	<?php include_once("templates/update_products.php"); ?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/manage.js" type="text/javascript"></script>
</body>
</html>