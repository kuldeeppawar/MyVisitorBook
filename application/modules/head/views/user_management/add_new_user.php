<div class="page-content-wrapper">
	<!-- BEGIN CONTENT BODY -->
	<div class="page-content">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class=" app-ticket-list">
					<div class="page-bar row">
						<div class="col-md-6">
							<h3 class="page-title"><?php getLocalkeyword('Add New User');?></h3>
							<ul class="page-breadcrumb ">
								<li><a href="<?php echo base_url()?>head/dashboard"><?php getLocalkeyword('Home');?></a> <i class="fa fa-circle"></i></li>
								<li><a href="<?php echo base_url()?>head/user_management"><?php getLocalkeyword('User Management');?></a> <i class="fa fa-circle"></i></li>
								<li><span><?php getLocalkeyword('Add New User');?></span></li>
							</ul>
						</div>
						<div class="col-md-6">
							<div id="reportrange" class="btn pull-right " style="padding-top: 12px;">
								<i class="fa fa-calendar"></i> &nbsp; <span class="thin uppercase hidden-xs">August 28, 2016 - September 26, 2016</span> <b class="fa fa-angle-down"></b>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<form role="form" id="new_user_frm" enctype='multipart/form-data' name="new_user_frm" method="post" action="<?php echo base_url();?>head/user_management/addUser">
								<div class="form-body" style="padding-top: 10px;">
									<div class="row">
										<div class="col-md-3">
											<div class="form-group">
												<label><?php getLocalkeyword('User Type');?></label> <select class="form-control" id="selUsertype" name="selUsertype" required>
													<option value="">Select User Type</option>
									                
									                <?php
														for($i = 0; $i < count( $resultUsertype ); $i ++)
														{
																										?>
									                   	<option value="<?php echo $resultUsertype[$i]->mutyp_id_pk?>"><?php echo $resultUsertype[$i]->mutyp_userType?></option>
									                   	<?php
														}
														?>
												</select>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<div class="form-group">
													<label><?php getLocalkeyword('Name');?>(First Name Last Name) </label> <input type="text" class="form-control" placeholder="Name" id="txtUsername" name="txtUsername" required>
												</div>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<div class="form-group">
													<label><?php getLocalkeyword('Mobile No.');?> </label> <input type="text" class="form-control" placeholder="Mobile No." id="txtMobile" name="txtMobile" maxlength="10" minlength="10" required>
												</div>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<div class="form-group">
													<label><?php getLocalkeyword('Email Id');?></label> <input type="email" class="form-control" placeholder="Email Id" id="txtEmail" name="txtEmail" autocomplete="off">
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-3">
											<div class="form-group">
												<label> <?php getLocalkeyword('Emp Id');?></label> <input type="text" class="form-control" placeholder="Emp Id" id="txtEmployeeid" name="txtEmployeeid" required>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label><?php getLocalkeyword('Country');?> </label> <select class="form-control" id="selCountry" name="selCountry" required onchange="getStateListing(this.value);">
													<option value="">Select Country</option>
									                
									                <?php
														for($i = 0; $i < count( $resultCountry ); $i ++)
														{
																										?>
									                   	<option value="<?php echo $resultCountry[$i]->cntr_id_pk?>"><?php echo $resultCountry[$i]->cntr_name?></option>
									                   	<?php
														}
														?>
												</select>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label><?php getLocalkeyword('State');?> </label> <select class="form-control" id="selState" name="selState" onchange="getLocationListing(this.value);" required>
													
												</select>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label><?php getLocalkeyword('City');?> </label> <select class="form-control" id="selLocations" name="selLocations" required>
													
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label><?php getLocalkeyword('Description');?> </label>
												<textarea class="form-control" rows="2" id="txtDescription" name="txtDescription" required></textarea>
											</div>
										</div>
										<div class="clearfix"></div>
										<div class="col-md-12 radio_group">
											
											<label class="radio-inline"><input type="radio" name="optradio" id="optAutopassword" value="1" required>
											<?php getLocalkeyword('Generate Auto');?> </label> <label class="radio-inline"><input
												type="radio" name="optradio" id="optManuallypassword" value="0" required><?php getLocalkeyword('Generate Manually');?></label>
										</div>
										<div class="automatic" style="display: none;">
											<div class="col-md-3">
												<div class="form-group">
													<label><?php getLocalkeyword('Password');?></label><br> <label style="padding: 8px 0px 0 0;; color: #337ab7;" id="auto_pass_label"></label> <input type="hidden" id="txtAutopassword"
														name="txtAutopassword" value="" />
												</div>
											</div>
										</div>
										<div class="manual" style="display: none;">
											<div class="col-md-3">
												<div class="form-group">
													<label><?php getLocalkeyword('Password');?></label> <input type="password" class="form-control" placeholder="Enter Password" id="txtPassword" name="txtPassword">
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label><?php getLocalkeyword('Confirm Password');?></label> <input type="password" class="form-control" placeholder="Confirm your Password" id="txtConfirmpassword" name="txtConfirmpassword">
												</div>
											</div>
										</div>
										<div class="col-md-12 form-group">
											<div class="pull-right">
												<button type="submit" class="btn btn-primary" name="submit"><?php getLocalkeyword('Save');?></button>
												<a href="<?php echo base_url()?>head/user_management" class="btn btn-danger"><?php getLocalkeyword('Cancel');?></a>
											</div>
										</div>
									</div>
									
								</div>
							</form>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
				<!-- END CONTENT BODY -->
			</div>
			<script type="text/javascript">

			$("#new_user_frm").validate({
			    rules:{             
			    	selUsertype:{
			            required:true
			        },
			        txtUsername:{
			            required:true
			        },
			        txtMobile:{
			        	required:true,
			        	maxlength:10,
			        	minlength:10,
			        	number:true
			        },
			        txtEmail:{
			            required:true,
			            remote:
		                {
		                          url:"<?php echo base_url();?>head/user_management/verifyEmail",
		                          type:"POST",
		                          data:
		                          {
		                                txtEmail:function()
		                                {
		                                       return $("#txtEmail").val().trim()
		                                }       
		                          }  
		                }
			        },
			        txtEmployeeid:{
			            required:true
			        },
			        selCountry:{
			            required:true
			        },
			        selState:{
			            required:true
			        },
			        selLocations:{
			            required:true
			        },
			        txtDescription:{
			            required:true
			        },
			        optradio:{
			            required:true
			        },
			        txtPassword:
			        {
			        	required:true
			        },
			        txtConfirmpassword:
			        {
			        	required:true,
			        	equalTo:"#txtPassword"
			        }
			    },
			    errorPlacement:
		          function(error, element){
		              if(element.is(":radio")){ 
		                  error.appendTo(element.parent().parent());
		          }else{ 
		                  error.insertAfter(element); 
		               }
		          },
			    messages:{                      
			    	selUsertype:{
			            required:"Please select user type"
			        },
			        txtUsername:{
			            required:"Please enter username"
			        },
			        txtMobile:{
			        	required:"Please enter mobile number",
			        	maxlength:"Mobile number should be 10 digits",
			        	minlength:"Mobile number should be 10 digits",
			        	number:"Please enter valid mobile number"
			        },
			        txtEmail:{
			            required:"Please enter email id",
			            remote:jQuery.validator.format("Email id already exists")
			        },
			        txtEmployeeid:{
			            required:"Please enter emp id"
			        },
			        selCountry:{
			            required:"Please select country"
			        },
			        selState:{
			            required:"Please select state"
			        },
			        selLocations:{
			            required:"Please select location"
			        },
			        txtDescription:{
			            required:"Please enter description"
			        },
			        optradio:{
			            required:"Please select password mode"
			        },
			        txtPassword:{
			        	required:"Please select password"
			        },
			        txtConfirmpassword:{
			        	required:"Please select confirm password",
			        	equalTo:"Password not matching"
			        }
			    }
			});



			
			
			
			
			
			
			
			
function randomString() 
{
  var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
  var string_length = 10;
  var randomstring = '';
  for (var i=0; i<string_length; i++) {
    var rnum = Math.floor(Math.random() * chars.length);
    randomstring += chars.substring(rnum,rnum+1);
  }
  return randomstring;
}

$("#optAutopassword").click(function(){

    $(".automatic").css("display","block");

    $(".manual").css("display","none");

    var auto_generate_pass=randomString(); 

    $("#auto_pass_label").html(auto_generate_pass);

    $("#txtAutopassword").val(auto_generate_pass);

   document.getElementById("txtPassword").required = false;

   document.getElementById("txtConfirmpassword").required = false;

});



$("#optManuallypassword").click(function(){

	
    $(".manual").css("display","block");

    $(".automatic").css("display","none");

    $("#txtAutopassword").val('');

  //$(".automatic").hide();

  document.getElementById("txtPassword").required = true;

   document.getElementById("txtConfirmpassword").required = true;

});


var password = document.getElementById("txtPassword")
  , confirm_password = document.getElementById("txtConfirmpassword");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;




//---Function Used Validate Email--//

 function getValidateemail(value)
 {
   $.post("<?php echo base_url();?>head/user_management/getValidateemail",{email:value},function(data){
                    if(data==1)
                    {
                    	 alert("Email already exists");
                	  var au="";
                	  $("#txtEmail").val(au);
                	 
                     }
    });
 }


 function getStateListing(country_id)
 {
 			$.post("<?php echo base_url();?>head/user_management/getStateListing",{countryId:country_id},function(data)
 				{    
                	  $("#selState").html(data);	
                	  $("#selLocations").html('<option value="">Select City</option>'); 
    			});
 }

 function getLocationListing(state_id)
 {
 			$.post("<?php echo base_url();?>head/user_management/getLocationListing",{stateId:state_id},function(data)
 				{
 					  $("#selLocations").html('<option value="">Select City</option>');    
                	  $("#selLocations").html(data);	 
    			});
 }


</script>