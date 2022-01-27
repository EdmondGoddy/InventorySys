<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="./includes/style.css">

    <title>Inventory Management System</title>
  </head>
  <body>
  	<!--  LOADER  -->
  	<div class="overlay"><div class="loader"></div></div>
  	
  	<!--  NAVBAR  -->
  	<?php include_once("templates/header.php"); ?>
  	<br><br>
    <div class="container">
    	<div class="card mx-auto" style="width: 30rem;">
		  <div class="card-header text-center">Register</div>
		  <div class="card-body">
		  	<form id="register_form" onsubmit="return false" autocomplete="off">
			  <div class="form-group">
			    <label for="username">Full Name</label>
			    <input type="text" class="form-control" name="username" id="username" placeholder="Username">
			    <small id="u_error" class="form-text text-muted"></small>
			  </div>
			  <div class="form-group">
			    <label for="email">Email Address</label>
			    <input type="text" class="form-control" name="email" id="email" placeholder="Email Address">
			    <small id="e_error" class="form-text text-muted"></small>
			  </div>
			  <div class="form-group">
			    <label for="password1">Password</label>
			    <input type="password" class="form-control" name="password1" id="password1" placeholder="Password">
			    <small id="p1_error" class="form-text text-muted"></small>
			  </div>
			  <div class="form-group">
			    <label for="password2">Re-Enter Password</label>
			    <input type="password" class="form-control" name="password2" id="password2" placeholder="Password">
			    <small id="p2_error" class="form-text text-muted"></small>
			  </div>
			  <div class="form-group">
			    <label for="usertype">Usertype</label>
			    <select name="usertype" id="usertype" class="form-control">
			    	<option value="">Chose Role</option>
			    	<option value="1">Admin</option>
			    	<option value="2">Customer</option>
			    </select>
			    <small id="t_error" class="form-text text-muted"></small>
			  </div>
			  <button type="submit" name="user_register" class="btn btn-primary"><span class="fa fa-user">&nbsp;</span>Register</button>
			  <span><a href="index.php">Login</a></span>
			</form>
		  </div>
		  <div class="card-footer text-muted">
		  	
		  </div>
		</div>
	</div>


    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js" type="text/javascript"></script>
</body>
</html>