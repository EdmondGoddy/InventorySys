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
  	<!--  LOADER  -->
  	<div class="overlay"><div class="loader"></div></div>

  	<?php include_once("templates/header.php"); ?>
  	<br><br>
  	<div class="container">
  		<div class="row">
  			<div class="col-md-10 mx-auto">
  				<div class="card" style="box-shadow: 0 0 25px 0 lightgray;">
				  <div class="card-header">
				    <h2 class="text-center">New Orders</h2>
				  </div>
				  <div class="card-body">
				  	<form id="get_order_data" onsubmit="return false">
				  		<div class="form-group row">
				  			<label class="col-sm-3" align="right">Oredr Date</label>
				  			<div class="col-ms-6">
				  				<input type="text" id="order_date" class="form-control form-control-ms" name="order_date" value="<?php echo date('Y-d-m')?>" readonly>
				  			</div>
				  		</div>
				  		<div class="form-group row">
				  			<label class="col-sm-3" align="right">Customer Name*</label>
				  			<div class="col-ms-6">
				  				<input type="text" id="cust_name" class="form-control form-control-ms" name="cust_name" placeholder="Enter Customer Name" required="">
				  			</div>
				  		</div>

				  		<div class="card" style="box-shadow: 0 0 15px 0 lightgray;">
				  			<div class="card-body">
				  				<h4 class="text-center">Make an order list</h4>         
								<table class="table" align="center">
								    <thead class="text-center">
								      <tr>
								        <th>No</th>
								        <th>Item Name</th>
								        <th>Total Quanty</th>
								        <th>Quanty</th>
								        <th>Price</th>
								        <th>Total</th>
								      </tr>
								    </thead>
								    <tbody id="invoice_item">
								     <!-- <tr>
								      	<td><b id="number">1</b></td>
								      	<td>
								      		<select name="pid[]" class="form-control form-control-ms" required="">
								      			<option>Washing Machine</option>
								      		</select>
								      	</td>
								      	<td><input type="text" name="tqty[]" class="form-control form-control-ms" readonly=""></td>
								      	<td><input type="text" name="qty[]" class="form-control form-control-ms" required=""></td>
								      	<td><input type="text" name="Price[]" class="form-control form-control-ms" readonly=""></td>
								      	<td>$ 100</td>
								      </tr>  -->
								    </tbody>
							    </table>
							    <center>
							    	<button id="add" style="width: 150px;" class="btn btn-success">Add</button>
							    	<button id="remove" style="width: 150px;" class="btn btn-danger">Remove</button>
							    </center>
				  			</div>
				  		</div>

                        <p></p>
				  		<div class="form-group row">
				  			<label class="col-sm-3 col-form-label" align="right">Sub Total</label>
				  			<div class="col-ms-6">
				  				<input type="text"  class="form-control form-control-ms" name="sub_total" id="sub_total" readonly="" required="">
				  			</div>
				  		</div>	
				  		<div class="form-group row">
				  			<label class="col-sm-3 col-form-label" align="right">GST (18%)</label>
				  			<div class="col-ms-6">
				  				<input type="text"  class="form-control form-control-ms" name="gst" id="gst" readonly="" required="">
				  			</div>
				  		</div>	
				  		<div class="form-group row">
				  			<label class="col-sm-3 col-form-label" align="right">Discount</label>
				  			<div class="col-ms-6">
				  				<input type="text"  class="form-control form-control-ms" name="discount" id="discount" required="">
				  			</div>
				  		</div>	
				  		<div class="form-group row">
				  			<label class="col-sm-3 col-form-label" align="right">Net Total</label>
				  			<div class="col-ms-6">
				  				<input type="text"  class="form-control form-control-ms" name="net_total" id="net_total" readonly="" required="">
				  			</div>
				  		</div>	
				  		<div class="form-group row">
				  			<label class="col-sm-3 col-form-label" align="right">Paid</label>
				  			<div class="col-ms-6">
				  				<input type="text"  class="form-control form-control-ms" name="paid" id="paid" required="">
				  			</div>
				  		</div>	
				  		<div class="form-group row">
				  			<label class="col-sm-3 col-form-label" align="right">Due</label>
				  			<div class="col-ms-6">
				  				<input type="text"  class="form-control form-control-ms" name="due" id="due" readonly="" required="">
				  			</div>
				  		</div>	
				  		<div class="form-group row">
				  			<label class="col-sm-3 col-form-label" align="right">Payment Method</label>
				  			<div class="col-ms-6">
				  				<select name="payment_type" class="form-control form-control-ms" id="payment_type" required="">
				  					<option>Cash</option>
				  					<option>Card</option>
				  					<option>Draft</option>
				  					<option>Cheque</option>
				  				</select>
				  			</div>
				  		</div>
					    <center>
					    	<input type="submit" id="order_form" name="" style="width: 150px;" class="btn btn-info" value="Order">
					    	<input type="submit" id="print_invoice" name="" style="width: 150px;" class="btn btn-success d-none" value="Print Invoice"> 
					    </center>	

				  	</form>
				  </div>
				</div>
  			</div>
  		</div>
  	</div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/order.js" type="text/javascript"></script>
</body>
</html>