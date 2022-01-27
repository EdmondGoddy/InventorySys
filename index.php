<?php
include_once("./database/constants.php");

if (isset($_SESSION["userid"])) {
	# code...
	header("location:".DOMAIN."/dashboard.php");
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
    <link rel="stylesheet" href="./includes/style.css">
    <style type="text/css">
      body{
        background-image: url("images/WEB/login6.jpg");
       /* background-repeat: no-repeat; */
        background-color: #cccccc;
      }
    </style>

    <title>Inventory Management System</title>
  </head>
  <body>
  	<!--  LOADER  -->
  	<div class="overlay"><div class="loader"></div></div>

  	<!--  NAVBAR  -->
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
	  	<div class="card mx-auto" style="width: 18rem;box-shadow: 0 0 25px 0 lightgray;">
		  <img class="card-img-top mx-auto" src="images/images.PNG" alt="Login Icon">
		  <div class="card-body">
		    <form id="form_login" onsubmit="return false">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Email address</label>
			    <input type="email" class="form-control" name="log_email" id="log_email" placeholder="Enter email">
			    <small id="e_error" class="form-text text-muted">We'll never share your email with anyone else.</small>
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Password</label>
			    <input type="password" class="form-control" name="log_password" id="log_password" placeholder="Password">
			    <small id="p_error" class="form-text text-muted"></small>
			  </div>
			  <button type="submit" class="btn btn-primary"><i class="fa fa-lock">&nbsp;</i> Login</button>
			  <span><a href="register.php">Register</a></span>
			</form>

		  </div>
		  <div class="card-footer"><a href="#">Forgot Password?</a></div>
		</div>
	</div>


    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js" rel="stylesheet" type="text/javascript"></script>
</body>
</html>