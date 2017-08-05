<div class="page-content-wrapper">
	<!-- BEGIN CONTENT BODY -->
	<div class="page-content" style="min-height: 956px;">
		<!-- BEGIN PAGE HEADER-->
		<!-- BEGIN PAGE TITLE-->
		<h1 class="page-title text-center">
			<?php getLocalkeyword('Reset Password');?> <small></small>
		</h1>
		<!-- END PAGE TITLE-->
		<!-- END PAGE HEADER-->
		<div class="row">
			<div class="col-md-12">
				<!-- BEGIN PROFILE SIDEBAR -->
				<!-- END BEGIN PROFILE SIDEBAR -->
				<!-- BEGIN PROFILE CONTENT -->
				<div class="profile-content">
					<div class="row">
						<div class="col-md-3"></div>
						<div class="col-md-6">
							<ul class="nav nav-tabs">
								<!--  <li><a data-toggle="tab" href="#Package">Package Type</a></li>
                             
                               <li><a data-toggle="tab" href="#password">Change Password</a></li> -->
							</ul>
							<form method="POST" action="<?php echo base_url(); ?>reseller/myprofile/changepassword" onsubmit="return validate();">
								<div class="tab-content">
									<div id="password" class="tab-pane fade in active">
										<div class="row">
											<div class="col-md-2"></div>
											<div class="col-md-8">
												<div class="row">
													<div class="col-md-12 form-group">
														<label><?php getLocalkeyword('New Password');?></label> <input type="text" class="form-control input-sm" placeholder="Enter New password" name="password" id="password1">
													</div>
													<br>
													<br>
													<br>
													<div class="col-md-12 form-group">
														<label><?php getLocalkeyword('Confirm Password');?></label> <input type="text" class="form-control input-sm" placeholder="Confirm New password" name="confirmpassword" id="confirmpassword">
													</div>
												</div>
											</div>
											<div class="col-md-2"></div>
										</div>
										<div class="row">
											<div class="col-md-4"></div>
											<div class="col-md-5">
												<div class="clearfix"></div>
												<br>
												<div class="col-md-12 form-group">
													<input type="hidden" value="<?php echo $sys_id; ?>" name="userid" />
													<button type="submit" name="submit" class="btn btn-primary"><?php getLocalkeyword('Save');?></button>
													<a href="<?php echo base_url(); ?>/reseller/myprofile"><button type="button" class="btn btn-danger"><?php getLocalkeyword('Cancel');?></button></a>
												</div>
											</div>
											<div class="col-md-3"></div>
										</div>
							
							</form>
						</div>
						<div id="Package" class="tab-pane fade">
							<ul class="list-inline">
								<li>Accounts type: <span> Gold </span></li>
								<li>Accounts Start Date: <span>10/9/2016</span></li>
								<li>Accounts End Date: <span>10/9/2016</span></li>
								<li class="pull-right"><a class="btn btn-danger" style="padding: 5px 20px;">Refill</a></li>
							</ul>
							<div class="clearfix"></div>
							<br>
						</div>
					</div>
				</div>
				<div class="col-md-3"></div>
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
    function validate()
    {
        var pass = document.getElementById("password1").value;
        var cpass = document.getElementById("confirmpassword").value;
        if ((pass == cpass) && (cpass != ""))
        {


            return true;
        } else
        {

            return false;
        }
    }




</script>
