	$(document).ready(function(){
            
            // FOR REGISTER PAGE
            var DOMAIN = "http://localhost/inv_project/publi_html";
    		$("#register_form").on("submit",function(){
    			//alert("dhdjhhjdfhj");
    			var status = false;
    			var name = $("#username");
    			var email = $("#email");
    			var pass1 = $("#password1");
    			var pass2 = $("#password2");
    			var type = $("#usertype");
    			//var n_patt =new regExp(/^[A-Za-z]+$/);
    			var e_patt =new RegExp(/^[a-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-]+)*(\.[a-z]{2,4})$/);

    			if (name.val == "" || name.val().length < 6) {
    				name.addClass("border-danger");
    				$("#u_error").html("<span class='text-danger'>Please Name Must be Entered Atleast 7 Characters </span>");
    				status = false;
    			}else{
    				name.removeClass("border-danger");
    				$("#u_error").html("<span class='text-danger'></span>");
    				status = true;
    			}

    			if (!e_patt.test(email.val())) {
    				email.addClass("border-danger");
    				$("#e_error").html("<span class='text-danger'>Please Enter a Valid Email Address </span>");
    				status = false;
    			}else{
    				email.removeClass("border-danger");
    				$("#e_error").html("<span class='text-danger'></span>");
    				status = true;
    			}

    			if (pass1.val() == "" || pass1.val().length < 8) {
    				pass1.addClass("border-danger");
    				$("#p1_error").html("<span class='text-danger'>Please Password Must Not Be Less Than 8 Characters</span>");
    				status = false;
    			}else{
    				pass1.removeClass("border-danger");
    				$("#p1_error").html("<span class='text-danger'></span>");
    				status = true;
    			}

    			if (pass2.val() == "" || pass2.val().length < 8) {
    				pass2.addClass("border-danger");
    				$("#p2_error").html("<span class='text-danger'>Please Password Must Not Be Less Than 8 Characters</span>");
    				status = false;
    			}else{
    				pass2.removeClass("border-danger");
    				$("#p2_error").html("<span class='text-danger'></span>");
    				status = true;
    			}

    			if (type.val() == "") {
    				type.addClass("border-danger");
    				$("#t_error").html("<span class='text-danger'>Please Select a Usertype</span>");
    				status = false;
    			}else{
    				type.removeClass("border-danger");
    				$("#t_error").html("<span class='text-danger'></span>");
    				status = true;
    			}

    			if ((pass1.val() == pass2.val()) && status == true) {
                    // LOADER SHOW
                    $(".overlay").show();
                    // LOADER SHOW END

    				$.ajax({
    					url : DOMAIN+"/includes/process.php",
    					method : "POST",
    					data : $("#register_form").serialize(),
    					success : function(data){
    						if (data == "EMAIL_ALREADY_EXISTS") {

                                // LOADER SHOW
                                $(".overlay").hide();
                                // LOADER SHOW END

    							alert("This Email Already Exists");
    						}else if (data == "SOME_ERROR") {
                                // LOADER SHOW
                                $(".overlay").hide();
                                // LOADER SHOW END

    							alert("Something Went Wrong");
    						}else{

                                // LOADER SHOW
                                $(".overlay").hide();
                                // LOADER SHOW END
                                
    							window.location.href = encodeURI(DOMAIN+"/index.php?msg=Registered Successfully.Enter Your Details to Login");
    						}
    					}
    				})
    				
    			}else{
    				pass2.addClass("border-danger");
    				$("#p2_error").html("<span class='text-danger'>Passwords Do No Match</span>");
    				status = true;
    				$
    			}
    		})

    		// END OF REGISTER PAGE

    		// FOR LOGIN PAGE

    		$("#form_login").on("submit", function(){
                
    			var email = $("#log_email");
    			var pass = $("#log_password");
    			var status = false;

    			if (email.val() == "") {
    				email.addClass("border-danger");
    				$("#e_error").html("<span class='text-danger'>Please Enter Email Address</span>");
    				status = false;
    			}else{
    				email.removeClass("border-danger");
    				$("#e_error").html("<span class='text-danger'></span>");
    				status = true;
    			}

    			if (pass.val() == "") {
    				pass.addClass("border-danger");
    				$("#p_error").html("<span class='text-danger'>Please Enter Password</span>");
    				status = false;
    			}else{
    				pass.removeClass("border-danger");
    				$("#p_error").html("<span class='text-danger'></span>");
    				status = true;
    			}

    			if (status) {
                    // LOADER SHOW
                    $(".overlay").show();
                    // LOADER SHOW END
                    
    				$.ajax({
    					url : DOMAIN+"/includes/process.php",
    					method : "POST",
    					data : $("#form_login").serialize(),
    					success : function(data){

    						if (data == "Not Registered") {

                                // LOADER HIDE
                                $(".overlay").hide();
                                // LOADER HIDE END

			    				pass.addClass("border-danger");
			    				$("#e_error").html("<span class='text-danger'>Incorrect Email Address</span>");
    						}else if (data == "Password Doesnot Match") {

                                // LOADER HIDE
                                $(".overlay").hide();
                                // LOADER HIDE END

			    				pass.addClass("border-danger");
			    				$("#p_error").html("<span class='text-danger'>Incorrect Password</span>");
			    				status = false;
    						}else{

                                // LOADER HIDE
                                $(".overlay").hide();
                                // LOADER HIDE END
                                if (data == "Admin") {

                                console.log(data);
                                //alert(data);
                                window.location.href = encodeURI(DOMAIN+"/dashboard.php?msg=Welcome To Your Dashboard");
                            }else{

                                console.log(data);
                                //alert(data);
                                window.location.href = encodeURI(DOMAIN+"/customer_dashboard.php?msg=Welcome To Your Dashboard");
                            }
    						}
    					}
    				})
    			}

    		})

            // TO FETCH CATEGORY
            
            fetch_category();
            function fetch_category(){
                $.ajax({
                    url : DOMAIN+"/includes/process.php",
                    method : "POST",
                    data : {getCategory:1},
                    success : function (data) {
                        var choose = "<option value=''>Root</option>";
                        var root = "<option value='0'>Root</option>";
                        $("#parent_cat").html(root + data);
                        $("#select_cat").html(choose + data);
                    }
                })
            }
           
            // TO FETCH BRAND
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

            // FOR ADD CATEGORY

            $("#category_form").on("submit", function(){
                if ($("#category_name").val() == "") {
                    $("#category_name").addClass("border-danger");
                    $("#cat_error").html("<span class='text-danger'>Please Enter Category Name</span>")
                }else{
                    $.ajax({
                        url : DOMAIN+"/includes/process.php",
                        method : "POST",
                        data : $("#category_form").serialize(),
                        success : function(data){
                            if (data = "CATEGORY_ADDED") {

                                $("#category_name").removeClass("border-danger");
                                $("#cat_error").html("<span class='text-danger'></span>");
                                $("#add_error").html("<span class='text-success center-text'>Category Added Successfully</span>");
                                $("#category_name").val(""); 
                                 fetch_category();

                            }else{
                                alert(data);
                                $("#category_name").val("");
                            }
                        }
                    })
                }

            })

            //  FOR ADD BRAND

            $("#brand_form").on("submit", function(){
                if ($("#brand_name").val() == "") {

                    $("#brand_name").addClass("border-danger");
                    $("#brand_error").html("<span class='text-danger'>Please Enter Brand Name</span>")
                }else{
                    $.ajax({
                        url : DOMAIN+"/includes/process.php",
                        method : "POST",
                        data : $("#brand_form").serialize(),
                        success : function(data){
                            if (data == "BRAND_ADDED") {
                                $("#brand_name").removeClass("border-danger");
                                $("#brand_error").html("<span class='text-danger'></span>");
                                $("#brand_success").html("<span class='text-success center-text'>Brand Added Successfully</span>");
                                $("#brand_name").val("");
                                fetch_brand();
                                
                            }else{
                                alert(data);
                                $("#brand_name").val("");
                            }
                        }
                        
                    })
                }
            })

            // FOR ADD PRODUCT

            $("#product_form").on("submit", function(){
                    $.ajax({
                        url : DOMAIN+"/includes/process.php",
                        method : "POST",
                        data : $("#product_form").serialize(),
                        success : function(data){
                            if (data == "NEW_PRODUCT_ADDED") {
                                $("#product_name").val("");
                                $("#product_price").val("");
                                $("#product_qty").val("");
                                alert("New Product Added Successfully");
                                
                            }else{
                                console.log(data);
                                alert(data);
                            }
                        }
                        
                    })

            })

    		
    	})