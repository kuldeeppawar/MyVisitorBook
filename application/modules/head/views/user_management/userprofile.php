
			<!-- BEGIN CONTENT -->
			<div class="page-content-wrapper">
				<!-- BEGIN CONTENT BODY -->
				<div class="page-content" style="min-height: 956px;">
					<!-- BEGIN PAGE HEADER-->
					<!-- BEGIN PAGE TITLE-->
					<div class="page-bar">
						<ul class="page-breadcrumb">
							<li><?php getLocalkeyword('User Profile');?></li>
						</ul>
						<!-- END PAGE TITLE-->
						<!-- END PAGE HEADER-->
						<div class="row">
						<form role="form" id="new_user_frm" enctype='multipart/form-data'  name="new_user_frm" method="post" action="<?php echo base_url();?>head/user_management/userProfile">
							<div class="col-md-12">
								<!-- BEGIN PROFILE SIDEBAR -->
								<div class="profile-sidebar">
									<!-- PORTLET MAIN -->
									<div class="portlet light profile-sidebar-portlet ">
										<!-- SIDEBAR USERPIC -->
										<div class="profile-userpic">
										<?php 
										if($resultUser[0]->sysmu_profile=="")
										{	
										?>
											<img src="<?php echo base_url()?>themes/assets/global/img/profile_user.jpg" class="img-responsive" alt="">
										<?php 
										}
										else 
										{	
										?>
										<img src="<?php echo base_url()?>uploads/adminprofile/<?php echo $resultUser[0]->sysmu_profile;?>" class="img-responsive" alt="">
										<?php 
										}
										?>
										</div>
										<!-- END SIDEBAR USERPIC -->
										<!-- SIDEBAR USER TITLE -->
										<div class="profile-usertitle">
											<div class="profile-usertitle-name"><?php echo $resultUser[0]->sysmu_username?></div>
										</div>
										<!-- END SIDEBAR USER TITLE -->
										<!-- SIDEBAR BUTTONS -->
										<div class="profile-userbuttons">
<!-- 											<button type="button" class="btn btn-circle green btn-sm">Upload Profile Pic</button> -->
											<br>
											<input type="file" name="txtUpload" class="btn btn-circle green btn-sm" accept=".jpg,.jpeg,.png">
											<input type="hidden" name="txtPrevious" value="<?php echo $resultUser[0]->sysmu_profile;?>">
											<br>
											<br>
										</div>
										<!-- END SIDEBAR BUTTONS -->
										<!-- SIDEBAR MENU -->
										<!-- END MENU -->
									</div>
									<!-- END PORTLET MAIN -->
									<!-- PORTLET MAIN -->
									<!-- END PORTLET MAIN -->
								</div>
								<!-- END BEGIN PROFILE SIDEBAR -->
								<!-- BEGIN PROFILE CONTENT -->
								<div class="profile-content">
									<div class="row">
										<div class="col-md-12">
											<ul class="nav nav-tabs">
												<li class="active"><a data-toggle="tab" href="#my_profile"><?php getLocalkeyword('My Profile');?></a></li>
												<!--   <li><a data-toggle="tab" href="#password">Change Password</a></li> -->
												<li><a data-toggle="modal" data-target="#myModal" onclick="getOTP();"><?php getLocalkeyword('Change Password');?></a></li>
											</ul>
											<!-- Modal -->
											
											
											
											<!-- ends -->
											<div class="tab-content">
												<div id="my_profile" class="tab-pane fade in active">
													
														<div class="col-md-4 form-group">
															<label><?php getLocalkeyword('Name');?> </label> <input type="text" class="form-control input-sm" value="<?php echo $resultUser[0]->sysmu_username?>" readonly>
														</div>
														<div class="col-md-4 form-group">
															<label><?php getLocalkeyword('Mobile');?> </label> <input type="text" class="form-control input-sm" value="<?php echo $this->encryption->decrypt($resultUser[0]->sysmu_mobile)?>" readonly>
														</div>
														<div class="col-md-4 form-group">
															<label><?php getLocalkeyword('Email');?> </label> <input type="text" class="form-control input-sm" value="<?php echo $this->encryption->decrypt($resultUser[0]->sysmu_email)?>" readonly>
														</div>

														<div class="col-md-4 form-group">
															<label>City </label> 
															<select class="form-control" name="selLocation">
																  <?php
														for($i = 0; $i < count( $resultLocations ); $i ++)
														{
																										?>
									                   	<option value="<?php echo $resultLocations[$i]->cty_id_pk?>"
									                   	 <?php if($resultUser[0]->sysmu_location==$resultLocations[$i]->cty_id_pk) { echo "selected";}
									                   	        if($resultLocations[$i]->cty_status==0 && $resultUser[0]->sysmu_location!=$resultLocations[$i]->cty_id_pk) { echo "disabled";}
									                   	 ?>
									                   	><?php echo $resultLocations[$i]->cty_name?></option>
									                   	<?php
														}
														?>
															</select>
														</div>
														<br> <br>
														<div class="col-md-12 form-group">
															<button type="submit" name="btnSubmit" class="btn btn-primary"><?php getLocalkeyword('Save');?></button>
															<button type="button" class="btn btn-danger"><?php getLocalkeyword('Cancel');?></button>
														</div>
													<!-- </form> -->
												</div>
												<!-- <div id="password" class="tab-pane fade">
													<form class="form-inline">
														<div class="col-md-8 form-group">
															<label class="col-md-4">New Password </label> <input type="text" class="col-md-6 form-control">
														</div>
														<br>
														<br>
														<br>
														<div class="col-md-8 form-group">
															<label class="col-md-4">Confirm Password </label> <input type="text" class="col-md-6 form-control ">
														</div>
														<div class="clearfix"></div>
														<br>
														<div class="col-md-12 form-group">
															<button type="button" class="btn btn-primary">Save</button>
															<button type="button" class="btn btn-danger">Cancel</button>
														</div>
												
												</div> -->
											</div>
										</div>
									</div>
								</div>
							</div>
								</form>
						</div>
						<!-- END TIMELINE ITEM WITH GOOGLE MAP -->
						<!-- TIMELINE ITEM -->
						<!-- END TIMELINE ITEM -->
						<!-- TIMELINE ITEM -->
						<!-- END TIMELINE ITEM -->
					</div>
				</div>
			</div>
			<!-- END DASHBOARD STATS 1-->
		</div>
		<!-- END CONTENT BODY -->
	</div>
	<!-- END CONTENT -->
	<!-- BEGIN QUICK SIDEBAR -->
	<div id="myModal" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title text-left"><?php getLocalkeyword('Enter OTP Here');?></h4>
						<font style="color:green;"><span id="show_send_msg"></span></font>
					</div>
					<form role="form" id="otp_verify_form" name="otp_verify_form" method="POST" action="<?php echo base_url()?>head/user_management/userPassword">
						<div class="modal-body">
							<div class="col-md-2"></div>
							<div class="col-md-7 form-group">
								<div class="row">
									<div class="col-md-4">
										<label><?php getLocalkeyword('Enter OTP');?></label>
									</div>
									<div class="col-md-8">
										<input type="text" name="txtOtp" id="txtOtp" class="form-control input-sm">
									</div>
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-primary" id="btnSubmit" name="btnSubmit"><?php getLocalkeyword('Submit');?></button>
							</div>
						</div>
					</form>
				</div>
			</div>											
	</div>
	<a href="javascript:;" class="page-quick-sidebar-toggler"> <i class="icon-login"></i>
	</a>
	<div class="page-quick-sidebar-wrapper" data-close-on-body-click="false">
		<!-- END CONTAINER -->
		<script type="text/javascript">

		function getOTP()
        {
                $.post("<?php echo base_url();?>head/user_management/getOTP",{},function(data)
                {                                        
                        $("#show_send_msg").html('OTP has been send successfully - '+data);
                });
        }

		$("#otp_verify_form").validate({
                  rules:{             
                      txtOtp:{
                          required:true,
                          remote:
                          {
                                  url:"<?php echo base_url();?>head/user_management/verifyOTP",
                                  type:"POST",
                                  data:
                                  {
                                        txtOtp:function()
                                        {
                                               return $("#txtOtp").val().trim()
                                        }       
                                  }  
                          }
                      }
                  },
                  messages:{                      
                      txtOtp:{
                          required:"Please enter OTP",
                          remote:jQuery.validator.format("OTP is not valid")
                      }
                  }
                });	


		function ValidateOtp()
		{


       //     var Password1=$("#txtOtpimport").val();
		  
       //       if( Password1!="")
		     // {
		     //       var Password=Password1;
		       
		     // 	   $.post("<?php //echo base_url();?>head/user_management/validateOtp",{Password},function(data){
                         
	      //               if(data==1)
		     //                {
		                    	
	                    	window.location = "<?php echo base_url()?>head/user_management/userPassword";
		                    	
		     //                    }
		     //                else
		     //                {
		     //                       alert("OTP mismatch");
		     //                    }
		     //            });


		     //     }
		  
		     // else
		     // {
		     //      alert("Enter password");
		     //   }
			     
			
		 }


		</script>
		
	