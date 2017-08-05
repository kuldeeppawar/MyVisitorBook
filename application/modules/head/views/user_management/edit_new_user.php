<div class="page-content-wrapper">
	<!-- BEGIN CONTENT BODY -->
	<div class="page-content">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class=" app-ticket-list">
					<div class="page-bar row">
						<div class="col-md-6">
							<h3 class="page-title"> <?php getLocalkeyword('Edit User');?></h3>
							<ul class="page-breadcrumb ">
								<li><a href="<?php echo base_url()?>head/dashboard"><?php getLocalkeyword('Home');?></a> <i class="fa fa-circle"></i></li>
								<li><a href="<?php echo base_url()?>head/user_management"><?php getLocalkeyword('User Management');?></a> <i class="fa fa-circle"></i></li>
								<li><span><?php getLocalkeyword('Edit User');?></span></li>
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
							<form role="form" id="new_user_frm" name="new_user_frm" method="post" action="<?php echo base_url();?>head/user_management/editUser">
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
									                   	<option value="<?php echo $resultUsertype[$i]->mutyp_id_pk?>" <?php if($resultUser[0]->sysmu_userTypeId_fk==$resultUsertype[$i]->mutyp_id_pk){ echo "selected"; }?>><?php echo $resultUsertype[$i]->mutyp_userType?></option>
									                   	<?php
														}
														?>
												</select>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<div class="form-group">
													<label><?php getLocalkeyword('Name');?> (First Name Last Name) </label> <input type="text" value="<?php echo $resultUser[0]->sysmu_username; ?>" class="form-control" placeholder="Name" id="txtUsername" name="txtUsername" required>
													<input type="hidden" name="txtUserid" value="<?php echo $resultUser[0]->sysmu_id_pk; ?>">
												</div>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<div class="form-group">
												<?php 
											       $userMobile = $this->encryption->decrypt($resultUser[0]->sysmu_mobile);
												?>
													<label><?php getLocalkeyword('Mobile No.');?> </label> <input type="number" step="any" min="0" value="<?php echo $userMobile;?>" class="form-control" placeholder="Mobile No." maxlength="10" minlength="10" id="txtMobile" name="txtMobile" required>
												</div>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<div class="form-group">
												<?php 
												 $userEmail = $this->encryption->decrypt($resultUser[0]->sysmu_email);
												?>
													<label><?php getLocalkeyword('Email Id');?></label> <input type="email" class="form-control" value="<?php echo  $userEmail;?>" placeholder="Email Id" id="txtEmail" readonly="readonly" name="txtEmail" autocomplete="off" onblur="getValidateemail(this.value)">
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-3">
											<div class="form-group">
											
												<label>Emp Id </label> <input type="text" class="form-control" placeholder="Emp Id" id="txtEmployeeid" name="txtEmployeeid" value="<?php echo $resultUser[0]->sysmu_empid; ?>" required>
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
									                   	<option value="<?php echo $resultCountry[$i]->cntr_id_pk?>" <?php if($resultUser[0]->sysmu_country==$resultCountry[$i]->cntr_id_pk){?> selected <?php } ?>><?php echo $resultCountry[$i]->cntr_name?></option>
									                   	<?php
														}
														?>
												</select>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label><?php getLocalkeyword('State');?> </label> <select class="form-control" id="selState" name="selState" onchange="getLocationListing(this.value);" required>
														<?php
														for($j = 0; $j < count( $resultState ); $j ++)
														{
																										?>
									                   	<option value="<?php echo $resultState[$j]->stat_id_pk?>" <?php if($resultUser[0]->sysmu_state==$resultState[$j]->stat_id_pk){?> selected <?php } ?>><?php echo $resultState[$j]->stat_name?></option>
									                   	<?php
														}
														?>
												</select>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label><?php getLocalkeyword('Location');?> </label> <select class="form-control" id="selLocations" name="selLocations" required>
														<?php
														for($k = 0; $k < count( $resultCity ); $k ++)
														{
																										?>
									                   	<option value="<?php echo $resultCity[$k]->cty_id_pk?>" <?php if($resultUser[0]->sysmu_location==$resultCity[$k]->cty_id_pk){?> selected <?php } ?>><?php echo $resultCity[$k]->cty_name?></option>
									                   	<?php
														}
														?>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label><?php getLocalkeyword('Description');?> </label>
												<textarea class="form-control" rows="2" id="txtDescription" name="txtDescription" required><?php echo $resultUser[0]->sysmu_description;?></textarea>
											</div>
										</div>
										<div class="clearfix"></div>
<!-- 										<div class="col-md-12"> -->
											
<!-- 											<label class="radio-inline"><input type="radio" name="optradio" id="optAutopassword" value="1" required>Generate Auto </label> <label class="radio-inline"><input -->
<!-- 												type="radio" name="optradio" id="optManuallypassword" value="0" required>Generate Manually</label> -->
<!-- 										</div> -->
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
													<label><?php getLocalkeyword('Password');?></label> <input type="text" class="form-control" placeholder="Enter Password" id="txtPassword" name="txtPassword">
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label><?php getLocalkeyword('Confirm Password');?></label> <input type="text" class="form-control" placeholder="Confirm your Password" id="txtConfirmpassword" name="txtConfirmpassword">
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
									<div class="row">
										<div class="col-md-4"></div>
										<!-- crate group starts here -->
										<!-- Modal for add user-->
										<div id="myModal1" class="modal fade" role="dialog">
											<div class="modal-dialog">
												<!-- Modal content-->
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h2 class="modal-title text-center">
															<i class="fa fa-user-plus"></i> Create Contact Group
															</h3>
													
													</div>
													<div class="modal-body">
														<div class="portlet-body form">
															<form role="form">
																<div class="form-body">
																	<div class="row">
																		<div class="col-md-10 pull-left">
																			<label>Group Name <small>(char limit-20)</small></label> <input type="text" class="form-control" placeholder="Group Name" maxlength="20">
																		</div>
																		<div class="col-md-2 pull-right">
																			<button type="button" class="btn btn-primary" style="margin-top: 24px;">Save</button>
																		</div>
																	</div>
																	<div class="col-md-12">
																		<div class="row">
																			<div class="input-group col-md-6">
																				<div class="mt-checkbox-list">
																					<label class="mt-checkbox mt-checkbox-outline" id="advance" style="line-height: 16px; margin-bottom: 0px;"> <input type="checkbox" name="colorCheckbox"
																						value="green"> Advance your search <span></span>
																					</label>
																				</div>
																			</div>
																			<div class="" style="display: none;" id="advance_form">
																				<div class="row">
																					<div class="col-md-7 pull-left">
																						<div class="form-group">
																							<label>Select CSV File</label> <input type="file" class="form-control input-sm" placeholder="Business Name">
																						</div>
																					</div>
																					<div class="col-md-5 pull-right">
																						<button type="button" class="btn btn-danger" style="margin-top: 20px;">
																							<i class="fa fa-cloud-download"></i> Download sample csv
																						</button>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="modal-footer" style="float: right;">
																		<button type="button" class="btn btn-primary">
																			<i class="fa fa-level-down"></i> Import Contacts
																		</button>
																		<a href="visitor_manage.html" class="btn btn-danger">Cancel</a>
																	</div>
																</div>
															</form>
															<div class="row"></div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- modal ends -->
										<!-- ends here -->
									</div>
								</div>
						
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
			            required:true
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
			        }
			    },
			    messages:{                      
			    	selUsertype:{
			            required:"Please select user type"
			        },
			        txtMobile:{
			        	required:"Please enter mobile number",			     
			        	maxlength:"Mobile number should be 10 digits",
			        	minlength:"Mobile number should be 10 digits",
			        	number:"Please enter valid mobile number"
			        },
			        txtUsername:{
			            required:"Please enter username"
			        },
			        txtEmail:{
			            required:"Please enter email id"
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

    $(".automatic").show();

    var auto_generate_pass=randomString(); 

    $("#auto_pass_label").html(auto_generate_pass);

    $("#txtAutopassword").val(auto_generate_pass);

   $(".manual").hide();

   document.getElementById("txtPassword").required = false;

   document.getElementById("txtConfirmpassword").required = false;

});



$("#optManuallypassword").click(function(){
    $(".manual").show();

    $("#txtAutopassword").val('');

  $(".automatic").hide();

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
                    	 alert("Email Allready Used");
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
 			//alert(state_id);

 			$.post("<?php echo base_url();?>head/user_management/getLocationListing",{stateId:state_id},function(data)
 				{
 					  $("#selLocations").html('<option value="">Select City</option>');    
                	  $("#selLocations").html(data);	 
    			});
 }



</script>