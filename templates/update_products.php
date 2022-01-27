
	<!-- Modal -->
	<div class="modal fade" id="form_products" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Update Products</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form id="update_product_form" onsubmit="return false">
			  <div class="form-row">
			    <div class="form-group col-md-6">
			      <input type="hidden" name="pid" id="pid" value="">	
			      <label for="">Date</label>
			      <input type="text" class="form-control" id="added_date" name="added_date" value="<?php echo date('Y-m-d'); ?>" readonly>
			    </div>
			    <div class="form-group col-md-6">
			      <label for="">Product Name</label>
			      <input type="text" class="form-control" id="update_product" name="update_product" required="">
			    </div>
			  </div>
			    <div class="form-group">
			      <label for="">Category</label>
			      <select id="select_cat" name="select_cat" class="form-control" required="">

			      </select>
			    </div>
			    <div class="form-group">
			      <label for="">Brand</label>
			      <select id="select_brand" name="select_brand" class="form-control" required="">
			      	
			      </select>
			    </div>
			    <div class="form-group">
			      <label for="">Product Price</label>
			      <input type="text" class="form-control" id="product_price" name="product_price" placeholder="Enter product Price" required="">
			    </div>
			    <div class="form-group">
			      <label for="">Product Quantity</label>
			      <input type="text" class="form-control" id="product_qty" name="product_qty" placeholder="Enter product Quantity" required="">
			    </div>
			  <button type="submit" class="btn btn-success">Update Product</button>
			</form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>