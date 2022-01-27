<?php

include_once("../database/constants.php");
include_once("DBOperation.php");
include_once("user.php");
include_once("DBOperation.php");
include_once("manage.php");

// FOR REGISTER PROCESSING
if (isset($_POST["username"]) AND isset($_POST["email"])) {
	# code...
	$user = new User();
	$result = $user->createUserAccount($_POST["username"],$_POST["email"],$_POST["password1"],$_POST["usertype"]);
	echo $result;
	exit();
}

// FOR LOGIN PROCESSING
if (isset($_POST["log_email"]) AND isset($_POST["log_password"])) {
	# code...
	$user = new User;
	$result = $user->userLogin($_POST["log_email"],$_POST["log_password"]);
	echo $result;
	exit();
}

// TO GET CATEGORY

if (isset($_POST["getCategory"])) {
	# code...
	$obj = new DBOperation();
	$rows = $obj->getAllRecord("categories");
	foreach ($rows as $row) {
		# code...
		echo "<option value='".$row["cid"]."'>".$row["category_name"]."</option>";
	}
	exit();

}

// TO GET BRAND

if (isset($_POST["getBrand"])) {
	# code...
	$obj = new DBOperation();
	$rows = $obj->getAllRecord("brands");
	foreach ($rows as $row) {
		# code...
		echo "<option value='".$row["bid"]."'>".$row["brand_name"]."</option>";
	}
	exit();

}

// TO ADD CATEGORY
if (isset($_POST["category_name"]) AND isset($_POST["parent_cat"])) {
	# code...
	$obj = new DBOperation();
	$result = $obj->addCategory($_POST["parent_cat"], $_POST["category_name"]);
	echo $result;
	exit();
}

// TO ADD BRAND
if (isset($_POST["brand_name"])) {
	# code...
	$obj = new DBOperation();
	$result = $obj->addBrand($_POST["brand_name"]);
	echo $result;
	exit();
}

// TO ADD PRODUCT
if (isset($_POST["product_name"]) AND isset($_POST["added_date"])) {
	# code...
	$obj = new DBOperation();
	$result = $obj->addProduct($_POST["select_cat"],$_POST["select_brand"],$_POST["product_name"],$_POST["product_price"],$_POST["product_qty"],$_POST["added_date"]);
	echo $result;
	exit();
}

//TO MANAGE CATEGORY

if (isset($_POST["manageCategory"])) {
	# code...
	$m = new Manage();
	$result = $m->manageRecordWithPagination("categories", $_POST["pageno"]);
	$rows = $result["rows"];
	$pagination = $result["pagination"];

	if (count($rows) > 0) {
		# code...
		$n = (($_POST["pageno"] - 1) * 5) + 1;
		foreach ($rows as $row) {
			# code...
			?>
			       <tr>
			        <td><?php echo $n; ?></td>
			        <td><?php echo $row["category"]; ?></td>
			        <td><?php echo $row["parent"]; ?></td>
			        <!--<td><a href="#" class="btn btn-success btn-sm"><i class="fa fa-light"></i>Active</a></td>-->
			        <td>
			        	<a href="#" did="<?php echo $row['cid']; ?>" class="btn btn-danger btn-sm del_cat"><i class="fa fa-trash">&nbsp;</i>Delete</a>
			        	<a href="#" eid="<?php echo $row['cid']; ?>" data-toggle="modal" data-target="#form_category" class="btn btn-info btn-sm edit_cat"><i class="fa fa-edit">&nbsp;</i>Edit</a>
			        </td>
			      </tr>
			<?php
			$n++;
		}
		?>
		  <tr><td colspan="5"><?php echo $pagination; ?></td></tr>
		<?php

		exit();
	}

}


	// TO DELETE CATEGORY

	if (isset($_POST["deleteCategory"])) {
		# code...
		$m = new Manage();
		$result = $m->deleteRecord("categories", "cid", $_POST["id"]);
		echo $result;
	}

	// TO RETRIEVE CATEGORY DATA FOR UPDATING 

	if (isset($_POST["updateCategory"])) {
		# code...
		$m = new Manage();
		$result = $m->getSingleRecord("categories", "cid", $_POST["id"]);
		echo json_encode($result);
		exit();

	}


	// TO UPDATE THE CATEGORY DATA RETRIEVED

	if (isset($_POST["update_category"])) {
		# code...
		$m = new Manage();
		$id = $_POST["cid"];
		$name = $_POST["update_category"];
		$parent = $_POST["parent_cat"];

		$result = $m->update_record("categories", ["cid" => $id], ["parent_cat" => $parent, "category_name" => "$name", "status" => 1]);
		echo $result;
	}


//TO MANAGE BRAND

if (isset($_POST["manageBrand"])) {
	# code...
	$m = new Manage();
	$result = $m->manageRecordWithPagination("brands", $_POST["pageno"]);
	$rows = $result["rows"];
	$pagination = $result["pagination"];

	if (count($rows) > 0) {
		# code...
		$n = (($_POST["pageno"] - 1) * 5) + 1;
		foreach ($rows as $row) {
			# code...
			?>
			       <tr>
			        <td><?php echo $n; ?></td>
			        <td><?php echo $row["brand_name"]; ?></td>
			        <!--<td><a href="#" class="btn btn-success btn-sm"><i class="fa fa-light"></i>Active</a></td>-->
			        <td>
			        	<a href="#" did="<?php echo $row['bid']; ?>" class="btn btn-danger btn-sm del_brand"><i class="fa fa-trash">&nbsp;</i>Delete</a>
			        	<a href="#" eid="<?php echo $row['bid']; ?>" data-toggle="modal" data-target="#form_brand" class="btn btn-info btn-sm edit_brand"><i class="fa fa-edit">&nbsp;</i>Edit</a>
			        </td>
			      </tr>
			<?php
			$n++;
		}
		?>
		  <tr><td colspan="5"><?php echo $pagination; ?></td></tr>
		<?php

		exit();
	}

}


	// TO DELETE BRAND

	if (isset($_POST["deleteBrand"])) {
		# code...
		$m = new Manage();
		$result = $m->deleteRecord("brands", "bid", $_POST["id"]);
		echo $result;
	}


	// TO RETRIEVE BRAND DATA FOR UPDATING 

	if (isset($_POST["updateBrand"])) {
		# code...
		$m = new Manage();
		$result = $m->getSingleRecord("brands", "bid", $_POST["id"]);
		echo json_encode($result);
		exit();

	}


	// TO UPDATE THE BRAND DATA RETRIEVED

	if (isset($_POST["update_brand"])) {
		# code...
		$m = new Manage();
		$id = $_POST["bid"];
		$name = $_POST["update_brand"];

		$result = $m->update_record("brands", ["bid" => $id], ["brand_name" => "$name", "status" => 1]);
		echo $result;
	}

	//TO MANAGE PRODUCT

	if (isset($_POST["manageProduct"])) {
		# code...
		$m = new Manage();
		$result = $m->manageRecordWithPagination("products", $_POST["pageno"]);
		$rows = $result["rows"];
		$pagination = $result["pagination"];

		if (count($rows) > 0) {
			# code...
			$n = (($_POST["pageno"] - 1) * 5) + 1;
			foreach ($rows as $row) {
				# code...
				?>
				       <tr>
				        <td><?php echo $n; ?></td>
				        <td><?php echo $row["product_name"]; ?></td>
				        <td><?php echo $row["category_name"]; ?></td>
				        <td><?php echo $row["brand_name"]; ?></td>
				        <td><?php echo $row["product_price"]; ?></td>
				        <td><?php echo $row["product_stock"]; ?></td>
				        <td><?php echo $row["added_date"]; ?></td>
				        <td><a href="#" class="btn btn-success btn-sm"><i class="fa fa-light"></i>Active</a></td>
				        <td>
				        	<a href="#" did="<?php echo $row['pid']; ?>" class="btn btn-danger btn-sm del_product"><i class="fa fa-trash">&nbsp;</i>Delete</a>
				        	<a href="#" eid="<?php echo $row['pid']; ?>" data-toggle="modal" data-target="#form_products" class="btn btn-info btn-sm edit_product"><i class="fa fa-edit">&nbsp;</i>Edit</a>
				        </td>
				      </tr>
				<?php
				$n++;
			}
			?>
			  <tr><td colspan="5"><?php echo $pagination; ?></td></tr>
			<?php

			exit();
		}

	}

	// TO DELETE BRAND

	if (isset($_POST["deleteProduct"])) {
		# code...
		$m = new Manage();
		$result = $m->deleteRecord("products", "pid", $_POST["id"]);
		echo $result;
	}


	// TO RETRIEVE PRODUCT DATA FOR UPDATING 

	if (isset($_POST["updateProduct"])) {
		# code...
		$m = new Manage();
		$result = $m->getSingleRecord("products", "Pid", $_POST["id"]);
		echo json_encode($result);
		exit();

	}


	// TO UPDATE THE PRODUCT DATA RETRIEVED

	if (isset($_POST["update_product"])) {
		# code...
		$m = new Manage();
		$id = $_POST["pid"];
		$name = $_POST["update_product"];
		$cat = $_POST["select_cat"];
		$brand = $_POST["select_brand"];
		$price = $_POST["product_price"];
		$qty = $_POST["product_qty"];
		$date = $_POST["added_date"];

		$result = $m->update_record("products", ["pid" => $id], ["cid" => $cat, "bid" => $brand, "product_name" => $name, "product_price" => $price, "product_stock" => $qty, "added_date" => $date]);
		echo $result;
	}

	//FOR ORDER PROCESSING

	if (isset($_POST["getNewOrderItem"])) {
		# code...
		$obj = new DBOperation();
		$rows = $obj->getAllRecord("products");
		?>

		<tr>
	      	<td><b class="number">1</b></td>
	      	<td>
	      		<select name="pid[]" class="form-control form-control-ms pid" required="">
	      			<option value="">Select Product</option>
	      			<?php
	      			   foreach ($rows as $row) {
	      			   	# code...
	      			   	?><option value="<?php echo $row['pid']; ?>"><?php echo $row["product_name"]; ?></option><?php
	      			   }
	      			?>
	      		</select>
	      	</td>
	      	<td><input type="text" name="tqty[]" class="form-control form-control-ms tqty" readonly=""></td>
	      	<td><input type="text" name="qty[]" class="form-control form-control-ms qty" required=""><small id="error" class="form-text text-muted"></td>
	      	<td><input type="text" name="price[]" class="form-control form-control-ms price" readonly=""></td>
	      	<td><input type="hidden" name="pro_name[]" class="form-control form-control-ms pro_name"></td>
	      	<td>$ <span class="amt">0</span></td>
	    </tr>

		<?php
		exit();

	}

	// FOR GETTING PRICE AND QTY OF ONE ITEM

	if (isset($_POST["getPriceAndQty"])) {
		# code...
		$m = new Manage();
		$result = $m->getSingleRecord("products", "pid", $_POST["id"]);
		echo json_encode($result);
		exit();
	}

	// FOR INSERTING INVOICE DATA

	if (isset($_POST["order_date"]) AND isset($_POST["cust_name"])) {
		# code...
		$order_date = $_POST["order_date"];
		$cust_name = $_POST["cust_name"];
        
        // ARRAYS
		$ar_tqty = $_POST["tqty"];
		$ar_qty = $_POST["qty"];
		$ar_price = $_POST["price"];
		$ar_pro_name = $_POST["price"];

		$ar_pro_name = $_POST["pro_name"];
		// END

		$sub_total = $_POST["sub_total"];
		$gst = $_POST["gst"];
		$discount = $_POST["discount"];
		$net_total = $_POST["net_total"];
		$paid = $_POST["paid"];
		$due = $_POST["due"];
		$payment_type = $_POST["payment_type"];

		$m = new Manage();
		$result = $m->storeCustomerOrderInvoice($order_date,$cust_name,$ar_tqty,$ar_qty,$ar_price,$ar_pro_name,$sub_total,$gst,$discount,$net_total,$paid,$due,$payment_type);
		echo $result;
	}





?>