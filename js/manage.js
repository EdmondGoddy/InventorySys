	$(document).ready(function(){
            
            // FOR REGISTER PAGE
            var DOMAIN = "http://localhost/inv_project/publi_html";


            // FOR MANAGE CATEGORY

            manageCategory(1)
            function manageCategory(pn){
                $.ajax({
                    url : DOMAIN+"/includes/process.php",
                    method : "POST",
                    data : {manageCategory:1, pageno:pn},
                    success : function(data){
                            $("#get_category").html(data);
                            
                        }
                })
            }

            $("body").delegate(".page-link", "click", function(){
            	var pn = $(this).attr("pn");
            	manageCategory(pn);
            })

            // FOR DELETING CATEGORY

            $("body").delegate(".del_cat", "click", function(){
            	var did = $(this).attr("did");
            	if (confirm("Are you sure you want to delete...")) {
            		$.ajax({
	                    url : DOMAIN+"/includes/process.php",
	                    method : "POST",
	                    data : {deleteCategory:1,id:did},
	                    success : function(data){
                            
	                            if (data == "DEPENDENT_CATEGORY") {
	                            	alert("Sorry this category is dependent on other sub categories");
	                            }else if(data == "CATEGORY_DELETED") {
	                            	alert("Category Deleted Successfully");
                                    manageCategory(1);
	                            }else if(data == "DELETED") {
	                            	alert("Deleted Successfully");
	                            }else{
	                            	alert(data);
	                            }
                        }
                    })

            	}else{
            		alert("no")
            	}
            })


            // FOR FETCHING CATEGORY
            
            fetch_category();
            function fetch_category(){
                $.ajax({
                    url : DOMAIN+"/includes/process.php",
                    method : "POST",
                    data : {getCategory:1},
                    success : function (data) {
                        var root = "<option value='0'>Root</option>";
                        $("#parent_cat").html(root + data);
                    }
                })
            }

            // FOR RETRIEVING CATEGORY DATA FOR UPDATING 

            $("body").delegate(".edit_cat", "click", function(){
                var eid = $(this).attr("eid");
                //alert(eid);
                $.ajax({
                    url : DOMAIN+"/includes/process.php",
                    method : "POST",
                    dataType: "json",
                    data : {updateCategory:1,id:eid},
                    success : function(data){
                        console.log(data);
                        $("#cid").val(data["cid"]);
                        $("#update_category").val(data["category_name"]);
                        $("#parent_cat").val(data["parent_cat"]);

                    }
                })
            })

            // FOR UPDATING THE CATEGORY DATA

            $("#update_category_form").on("submit", function(){
                if ($("#update_category").val() == "") {
                    $("#update_category").addClass("border-danger");
                    $("#cat_error").html("<span class='text-danger'>Please Enter Category Name</span>")
                }else{
                    $.ajax({
                        url : DOMAIN+"/includes/process.php",
                        method : "POST",
                        data : $("#update_category_form").serialize(),
                        success : function(data){
                            if (data) {
                                //alert(data);
                                window.location.href = "";

                            }
                        }
                    })
                }

            })


            // FOR RETRIEVING BRAND DATA FOR DELETING

            manageBrand(1)
            function manageBrand(pn){
                $.ajax({
                    url : DOMAIN+"/includes/process.php",
                    method : "POST",
                    data : {manageBrand:1, pageno:pn},
                    success : function(data){
                            $("#get_brand").html(data);
                            
                        }
                })
            }


            $("body").delegate(".page-link", "click", function(){
                var pn = $(this).attr("pn");
                manageBrand(pn);
            })


            // FOR DELETING BRAND

            $("body").delegate(".del_brand", "click", function(){
                var did = $(this).attr("did");
                //alert(did);
                if (confirm("Are you sure you want to delete...")) {
                    $.ajax({
                        url : DOMAIN+"/includes/process.php",
                        method : "POST",
                        data : {deleteBrand:1,id:did},
                        success : function(data){
                            
                                if (data == "DELETED") {
                                    alert("Brand is deleted");
                                    manageBrand(1);
                                }else{
                                    alert(data);
                                }
                        }
                    })

                }
            })

            // FOR RETRIEVING BRAND DATA FOR UPDATING 

            $("body").delegate(".edit_brand", "click", function(){
                var eid = $(this).attr("eid");
                //alert(eid);
                $.ajax({
                    url : DOMAIN+"/includes/process.php",
                    method : "POST",
                    dataType: "json",
                    data : {updateBrand:1,id:eid},
                    success : function(data){
                        console.log(data);
                        $("#bid").val(data["bid"]);
                        $("#update_brand").val(data["brand_name"]);

                    }
                })
            })

            // FOR UPDATING THE BRAND DATA

            $("#update_brand_form").on("submit", function(){
                if ($("#update_brand").val() == "") {
                    $("#update_brand").addClass("border-danger");
                    $("#brand_error").html("<span class='text-danger'>Please Enter Please Name</span>")
                }else{
                    $.ajax({
                        url : DOMAIN+"/includes/process.php",
                        method : "POST",
                        data : $("#update_brand_form").serialize(),
                        success : function(data){
                            if (data) {
                                alert(data);
                                window.location.href = "";

                            }
                        }
                    })
                }

            })


            // FOR RETRIEVING PRODUCT DATA FOR DELETING

            manageProduct(1)
            function manageProduct(pn){
                $.ajax({
                    url : DOMAIN+"/includes/process.php",
                    method : "POST",
                    data : {manageProduct:1, pageno:pn},
                    success : function(data){
                            $("#get_product").html(data);
                            
                        }
                })
            }


            $("body").delegate(".page-link", "click", function(){
                var pn = $(this).attr("pn");
                manageProduct(pn);
            })


            // FOR DELETING PRODUCT

            $("body").delegate(".del_product", "click", function(){
                var did = $(this).attr("did");
                //alert(did);
                if (confirm("Are you sure you want to delete...")) {
                    $.ajax({
                        url : DOMAIN+"/includes/process.php",
                        method : "POST",
                        data : {deleteProduct:1,id:did},
                        success : function(data){
                            
                                if (data == "DELETED") {
                                    alert("Product is deleted");
                                    manageProduct(1);
                                }else{
                                    alert(data);
                                }
                        }
                    })

                }
            })

            // FOR RETRIEVING PRODUCT DATA FOR UPDATING 

            $("body").delegate(".edit_product", "click", function(){
                var eid = $(this).attr("eid");
                //alert(eid);
                $.ajax({
                    url : DOMAIN+"/includes/process.php",
                    method : "POST",
                    dataType: "json",
                    data : {updateProduct:1,id:eid},
                    success : function(data){
                        console.log(data);
                        $("#pid").val(data["pid"]);
                        $("#update_product").val(data["product_name"]);
                        $("#select_cat").val(data["cid"]);
                        $("#select_brand").val(data["bid"]);
                        $("#product_price").val(data["product_price"]);
                        $("#product_qty").val(data["product_stock"]);

                    }
                })
            })

            // FOR RETRIEVING CATEGORY DATA FOR UPDATING PRODUCT TABLE

            fetch_category();
            function fetch_category(){
                $.ajax({
                    url : DOMAIN+"/includes/process.php",
                    method : "POST",
                    data : {getCategory:1},
                    success : function (data) {
                        var choose = "<option value=''>Choose Category</option>";
                       // var root = "<option value='0'>Root</option>";
                       // $("#parent_cat").html(root + data);
                        $("#select_cat").html(choose + data);
                    }
                })
            }

            // FOR RETRIEVING BRAND DATA FOR UPDATING PRODUCT TABLE

            fetch_brand();
            function fetch_brand(){
                $.ajax({
                    url : DOMAIN+"/includes/process.php",
                    method : "POST",
                    data : {getBrand:1},
                    success : function (data) {
                        var choose = "<option value=''>Select Brand</option>"; 
                        $("#select_brand").html(choose + data);
                    }
                })
            }

            // FOR UPDATING THE PRODUCT DATA

            $("#update_product_form").on("submit", function(){
                if ($("#brand_name").val() == "") {

                    $("#brand_name").addClass("border-danger");
                    $("#brand_error").html("<span class='text-danger'>Please Enter Brand Name</span>")
                }else{
                    $.ajax({
                        url : DOMAIN+"/includes/process.php",
                        method : "POST",
                        data : $("#update_product_form").serialize(),
                        success : function(data){
                            if (data == "UPDATED") {
                                alert("Product Updated Successfully");
                                window.location.href = "";
                            }else{
                                alert(data);
                            }
                        }
                        
                    })
                }
            })
 

            

        })