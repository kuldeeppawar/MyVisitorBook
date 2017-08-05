<div class="page-content-wrapper">
	<!-- BEGIN CONTENT BODY -->
	<div class="page-content">
		<!-- BEGIN PAGE HEADER-->
		<!-- BEGIN PAGE TITLE-->
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>User Profile</li>
			</ul>
                    <?php
						if ($this->session->flashdata('success') != NULL && $this->session->flashdata('success') != "")
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
                     <?php		 																		
				   if ($this->session->flashdata('error') != NULL && $this->session->flashdata('error') != "")
				   {
					?>
                <div class="alert alert-error">
				<strong>Error!</strong> <?php echo $this->session->flashdata('error');?>
                 </div>
                 <?php
						$this->session->set_flashdata('error','');
 				  }
				  ?>
                  <!-- END PAGE TITLE-->
			<!-- END PAGE HEADER-->
			<div class="row">
			<form method="POST" action="<?php echo base_url(); ?>admin/myprofile/save" enctype="multipart/form-data">
				<div class="col-md-12">
					<!-- BEGIN PROFILE SIDEBAR -->
					<div class="profile-sidebar">
						<!-- PORTLET MAIN -->
						
							<div class="portlet light profile-sidebar-portlet ">
								<!-- SIDEBAR USERPIC -->
								<div class="fileinput fileinput-new " data-provides="fileinput">
									<div class="fileinput-new  profile-userpic" style="height: 150px; width: 300px">
										<img src="<?php echo base_url().'uploads/systemusers_images/'.$resultProfile[0]->sysu_profile; ?>" alt="" id="profile" name="profile" />
									</div>
									<div class="fileinput-preview fileinput-exists  profile-userpic"></div>
									<div style="margin-left: 20px; margin-top: 10px;">
										<span class="btn btn-circle green btn-sm btn-file"> <span class="fileinput-new "> Upload image </span> <span class="fileinput-exists"> Change </span> <input type="hidden" name="pfilename"
											id="pfilename" value="<?php echo $resultProfile[0]->sysu_profile; ?>"
										> <input type="file" name="profilepic" id="profilepic" onchange="readURL(this);">
										</span> <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
									</div>
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
									<li class="active"><a data-toggle="tab" href="#my_profile">My Profile</a></li>
									<?php 
								if($this->session->userdata('parent_client')==1)
								{	
								?>
									<li><a data-toggle="tab" href="#Package">Package Type</a></li>
								<?php }?>
									<li><a data-toggle="modal" data-target="#myModal" onclick="getOTP();">Change Password</a></li>
								</ul>
								<!-- Modal -->
								<!-- ends -->
								<div class="tab-content">
									<div id="my_profile" class="tab-pane fade in active">
										<div class="col-md-4 form-group">
											<label>Name </label> <input type="text" name="name" id="name" class="form-control input-sm" value="<?php echo $resultProfile[0]->sysu_name; ?>">
										</div>
										<input type="hidden" value="<?php echo $resultProfile[0]->sysu_profile;?>" name="txtProfile">
										<div class="col-md-4 form-group">
											<label>Mobile </label> <input type="text" name="mobile" id="mobile" class="form-control input-sm" value="<?php echo $usercred['mobile']; ?>">
										</div>
										<div class="col-md-4 form-group">
											<label>Email </label> <input type="text" name="email" id="email" class="form-control input-sm" value="<?php echo $usercred['email']; ?>">
										</div>
										<div class="col-md-4 form-group">
											<label>Address </label>
											<textarea class="form-control" name="address" id="address" rows="1"><?php echo $resultProfile[0]->sysu_address; ?></textarea>
										</div>
										<div class="col-md-4 form-group">
											<label>Country </label> <select class="form-control" name="country" id="country">
												<option>-Select Country-</option>
                                                <?php
												$result1=$this->db->query("select * from tblmvbcountry");
												$result_country=$result1->result();
												for($i=0;$i < count($result_country);$i ++)
												{
												?>
                                              		<option value="<?php echo $result_country[$i]->cntr_id_pk; ?>"
													<?php if ($resultProfile[0]->sysu_countryId_fk == $result_country[$i]->cntr_id_pk) {echo "selected";} ?>
												     > <?php echo $result_country[$i]->cntr_name; ?> </option>             
                                                    <?php
												}
												?>
                                                </select>
										</div>
										<div class="col-md-4 form-group">
                                            <?php
												$res=$this->db->query("select * from tblmvbstate where stat_countryId_fk='" . $resultProfile[0]->sysu_countryId_fk . "'");
												$result2=$res->result();
											?>
                                              <label>State </label> <select class="form-control" name="state" id="state">
												<option>-Select State-</option>
                                             <?php
												for($i=0;$i < count($result2);$i ++)
												{
									        	?>  <option value="<?php echo $result2[$i]->stat_id_pk; ?>"
													<?php if ($resultProfile[0]->sysu_stateId_fk == $result2[$i]->stat_id_pk)
													{	echo "selected";}?>> <?php echo $result2[$i]->stat_name; ?> </option>             
                                                        <?php
												}?>              
                                                </select>
										</div>
										<div class="col-md-4 form-group">
                                        <?php
										  $res2=$this->db->query("select * from tblmvbcity where cty_countryId_fk='" . $resultProfile[0]->sysu_countryId_fk . "' and cty_stateId_fk='" . $resultProfile[0]->sysu_stateId_fk . "'");
										  $result3=$res2->result();
 								         ?>
                                           <label>City </label> <select class="form-control" name="city" id="city">
										   <option>-Select City-</option>
                                           <?php
												for($i=0;$i < count($result3);$i ++)
												{
											?><option value="<?php echo $result3[$i]->cty_id_pk; ?>"
											<?php if ($resultProfile[0]->sysu_cityId == $result3[$i]->cty_id_pk)
												  { 	echo "selected";}?>
												> <?php echo $result3[$i]->cty_name; ?> </option>             
                                                     <?php
                                             	 }?>              
                                                </select>
										</div>
										<br> <br>
										<div class="col-md-12 form-group">
											<input type="hidden" name="sys_userid" value="<?php echo $resultProfile[0]->sysu_id_pk; ?>">
											<button type="submit" class="btn btn-primary">Save</button>
											<button type="button" class="btn btn-danger">Cancel</button>
										</div>
										<!-- </form> -->
									</div>
									<div id="Package" class="tab-pane fade">
										<ul class="list-inline">
										<!-- <li>Accounts type: <span> Gold </span></li> -->

                                            <?php 
                                            if(count($resultClient)>0)
                                            {	
                                            ?>      
											<li>Accounts Start Date: <span><?php echo date("d-m-Y", strtotime($resultClient[0]->clnt_createdDate));?></span></li>
												<?php
												if($resultClient[0]->clnt_expiryDate!="0000-00-00 00:00:00")
												{
												?>	
												<li>Accounts End Date: <span><?php echo date("d-m-Y",strtotime($resultClient[0]->clnt_expiryDate));?></span></li>
												<?php
												} 
                                            }
											?>
											<li class="pull-right"><a class="btn btn-danger" style="padding: 5px 20px;">Refill</a></li>
										</ul>
										<div class="clearfix"></div>
										<br>
										<table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
											<thead>
												<tr>
													<th>Order ID</th>
													<th>Package Name</th>
													<th>Allocated SMS</th>
													<th>Allocated Email</th>
													
												</tr>
											</thead>
											<tbody>
	                                           <?php 
	                                         
	                                           for($i=0;$i<count($resultOrder);$i++)
	                                           {
	                                           	
	                                           	   $data=$this->myprofile_model->getClientPackage($resultOrder[$i]->ord_id_pk, $resultOrder[$i]->ord_packageType,
	                                           	   	                                              $resultOrder[$i]->ord_clntId_fk, $resultOrder[$i]->ord_packageId_fk);
	                                              
	                                            
	                                           	  
	                                           	 ?>
		                                           
		                                           <tr class="gradeX odd" role="row">
															<td><?php echo $resultOrder[$i]->ord_id_pk;?></td>
															<td><?php echo $data['name'];?></td>
															<td><?php echo $data['sms'];?></td>	
															<td><?php  echo $data['email'];?></td>
												    </tr>
												<?php 
	                                           }
												?>
											</tbody>
										</table>
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
										</form>
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
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title text-left">Enter OTP Here</h4>
					<font style="color:green;"><span id="show_send_msg"></span></font>
				</div>
				<form id="otp_verify_form" name="otp_verify_form" method="POST" action="<?php echo base_url();?>admin/myprofile/setpassword">
				<div class="modal-body">
					<div class="col-md-2"></div>
					<div class="col-md-7 form-group">
						<div class="row">
							<div class="col-md-4">
								<label>Enter OTP</label>
							</div>
							<div class="col-md-8">
								<input type="text" class="form-control input-sm" id="txtOtp" name="txtOtp" required>
							</div>
						</div>
					</div>
				<div class="clearfix"></div>
				<div class="modal-footer">
					<!-- <input type="hidden" name="userid" value="<?php //echo $resultProfile[0]->sysu_id_pk; ?>"> -->
					<button type="submit" class="btn btn-primary" id="btnSubmit" name="btnSubmit">Submit</button>
				</div>
				</div>
				</form>
			</div>
	
	</div>
</div>

<script type="text/javascript">
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
        

        function getOTP()
        {
                $.post("<?php echo base_url();?>admin/myprofile/getOTP",{},function(data)
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
                                  url:"<?php echo base_url();?>admin/myprofile/verifyOTP",
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


        
        
        
        
        
    </script>
