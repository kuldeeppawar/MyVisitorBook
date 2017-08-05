<div class="page-content-wrapper">
	<!-- BEGIN CONTENT BODY -->
	<div class="page-content" style="min-height: 956px;">
		<!-- BEGIN PAGE HEADER-->
		<!-- BEGIN PAGE TITLE-->
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li><?php getLocalkeyword('User Profile');?></li>
			</ul>
                 <?php
					if($this->session->flashdata('success') != NULL && $this->session->flashdata('success') != "")
					  {
					  ?>
             <br> <br>
			<div class="alert alert-success">
				<strong>Success!</strong> <?php echo $this->session->flashdata('success');?>
                    </div>
                    <?php
					     $this->session->set_flashdata('success','');
					 }
 				 ?>
                        <!-- END PAGE TITLE-->
			<!-- END PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PROFILE SIDEBAR -->
					<form method="post" action="<?php echo base_url(); ?>reseller/myprofile/save" enctype="multipart/form-data" onsubmit="return validateinfo();">
						<div class="profile-sidebar">
							<!-- PORTLET MAIN -->
							<div class="portlet light profile-sidebar-portlet ">
								<!-- SIDEBAR USERPIC -->
								<div class="profile-userpic">
								  <?php if( $resultProfile[0]->sysmu_profile!="")
								  {?>
									<img src="<?php echo base_url();?>/uploads/systemusers_images/<?php echo $resultProfile[0]->sysmu_profile; ?>" class="img-responsive" alt="" id="profile" name="profile">
								   <?php 
								  }
								  else 
								  {
								  	?>
								  	<img src="<?php echo base_url();?>/uploads/systemusers_images/abc.jpg" class="img-responsive" alt="" id="profile" name="profile">
								
								  	<?php 
								  }	
								   ?>
								</div>
								<!-- END SIDEBAR USERPIC -->
								<!-- SIDEBAR USER TITLE -->
								<div class="profile-usertitle">
									<div class="profile-usertitle-name"><?php echo $resultProfile[0]->sysmu_username; ?> </div>
								</div>
								<!-- END SIDEBAR USER TITLE -->
								<!-- SIDEBAR BUTTONS -->
								<div class="profile-userbuttons">
									<input type="hidden" name="pfilename" id="pfilename" value="<?php echo $resultProfile[0]->sysmu_profile; ?>"> <input type="file" name="profilepic" id="profilepic" onchange="readURL(this);"
										value="<?php echo $resultProfile[0]->sysmu_profile; ?>"
									>
									<!--                                            <button type="button" class="btn btn-circle green btn-sm">Upload Profile Pic</button>-->
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
										<li><a data-toggle="modal" data-target="#myModal"><?php getLocalkeyword('Change Password');?></a></li>
									</ul>
									<!-- ends -->
									<div class="tab-content">
										<div id="my_profile" class="tab-pane fade in active">
											<div class="col-md-4 form-group">
												<label><?php getLocalkeyword('Name');?> </label> <input type="text" class="form-control input-sm" value="<?php echo $resultProfile[0]->sysmu_username; ?>" name="txtName" id="txtName">
											</div>
											<div class="col-md-4 form-group">
												<label><?php getLocalkeyword('Mobile');?> </label> <input type="text" class="form-control input-sm" value="<?php echo $usercred['mobile']; ?>" name="txtMobile" id="txtMobile">
											</div>
											<div class="col-md-4 form-group">
												<label><?php getLocalkeyword('Email');?></label> <input type="text" class="form-control input-sm" value="<?php echo $usercred['email']; ?>" name="txtEmail" id="txtEmail">
											</div>
											<div class="col-md-4 form-group">
												<label><?php getLocalkeyword('Address');?> </label>
												<textarea class="form-control" rows="2" name="txtLocation" id="txtLocation"><?php echo $resultProfile[0]->sysmu_location; ?></textarea>
											</div>
										</div>
										<br> <br>
										<div class="col-md-12 form-group">
											<button type="submit" class="btn btn-primary" name="submit"><?php getLocalkeyword('Save');?></button>
											<a href="<?php echo base_url();?>reseller/dashboard"><button type="button" class="btn btn-danger"><?php getLocalkeyword('Cancel');?></button></a>
										</div>
					
					</form>
				</div>
				<!-- Modal -->
				<form method="POST" action="<?php echo base_url();?>reseller/myprofile/setpassword" onsubmit="return validateotp();">
					<div id="myModal" class="modal fade" role="dialog">
						<div class="modal-dialog">
							<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title text-center"><?php getLocalkeyword('Enter OTP Here');?></h4>
								</div>
								<div class="modal-body">
									<div class="col-md-2"></div>
									<div class="col-md-7 form-group">
										<div class="row">
											<div class="col-md-4">
												<label><?php getLocalkeyword('Enter OPT');?></label>
											</div>
											<div class="col-md-8">
												<input type="text" class="form-control input-sm" id="otp" name="otp">
											</div>
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="modal-footer">
										<button type="submit" class="btn btn-primary"><?php getLocalkeyword('Submit');?></button>
								</div>
				
				</form>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- END TIMELINE ITEM WITH GOOGLE MAP -->
<!-- TIMELINE ITEM -->
<!-- END TIMELINE ITEM -->
<!-- TIMELINE ITEM -->
<!-- END TIMELINE ITEM -->
</div>
</div>
<script>
      function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#profile').attr('src', e.target.result);
                    document.getElementById("pfilename").value="";
                    
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        function validateotp()
        {
            var otp=$('#otp').val();
            if(otp==null || otp=="")
            {
                alert('Please Enter OTP');
                return false;
            }
            return true;
        }
        function validateinfo()
        {
            var name=$("#txtName").val();
            var email=$("#txtEmail").val();
            var mobile=$("#txtMobile").val();
            var address=$("#txtLocation").val();
            if(name=="" || email=="" || mobile=="" || address==""  )
            {
                alert('All Fields are Compulsary');
                return false;
            }
            return true;
            
            
        }
        
    </script>