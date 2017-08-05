<?php
	
class User_management extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('user_management_model');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('user_agent');
		$this->load->library('email');
		$this->load->library('encryption');
		$this->load->library('Mandrill');
	
	}

	public function Checklogin()
	{
	
		if ($this->session->userdata('admin_email') == "")
		{
			redirect('head/');
		}	
		
	}
	
	// ---Function used to load listing of system user --//
	public function index()
	{
		$this->Checklogin();

		//---------------------------------- Start Save Transaction Logs ---------------------------------//

			setSAActivityLogs('Transaction_activity','user_management_view');			

		//--------------------------------- End Save Transaction Logs ------------------------------------//

		$data ['result']=$this->user_management_model->getSystemuser();
		$data ['include']='user_management/manage_user_management';
		$data ['admin_section']='manage_user_management';
		$this->load->view('backend/container_sa',$data);
	
	}

	public function addUser()
	{
		$this->Checklogin();
		if (isset($_POST ['submit']))
		{
			$result=$this->user_management_model->addUser();
			
			if ($result > 0)
			{
				$this->session->set_flashdata('success','User has been added successfully.');
				redirect('head/user_management');
			} 
			else
			{
				$this->session->set_flashdata('error','Unable to save user details.');
				redirect($this->agent->referrer());
			}
		} 
		else
		{
			$data ['resultUsertype']=$this->user_management_model->getUsertypelist();
			$data ['resultCountry']=$this->user_management_model->getActiveCountry();
			$data ['include']='user_management/add_new_user';
			$data ['admin_section']='add_new_user';
			$this->load->view('backend/container_sa',$data);
		}
	
	}

	public function editUser($id)
	{
		$this->Checklogin();
		if (isset($_POST ['submit']))
		{
			$result=$this->user_management_model->editUser();
			
			if ($result > 0)
			{
				$this->session->set_flashdata('success','User has been updated successfully.');
				redirect('head/user_management');
			} else
			{
				$this->session->set_flashdata('error','Unable to update user details.');
				redirect($this->agent->referrer());
			}
		} else
		{
			$user_id=base64_decode($id);

			$data ['resultUser']=$this->user_management_model->getSpecificuser($user_id);
			$data ['resultUsertype']=$this->user_management_model->getAllusertype();
			$data ['resultCountry']=$this->user_management_model->getActiveCountry();
			$data ['resultState']=$this->user_management_model->getEditStateListing($data['resultUser'][0]->sysmu_country);
			$data ['resultCity']=$this->user_management_model->getEditLocationListing($data['resultUser'][0]->sysmu_state);
			$data ['include']='user_management/edit_new_user';
			$data ['admin_section']='edit_new_user';
			$this->load->view('backend/container_sa',$data);
		}
	
	}
	
	// --functin used to deactivate/activate User status--//
	public function changeuserStatus()
	{
		$this->Checklogin();
		$status=$this->input->post('id');
		$userid=$this->input->post('userId');
		
		if ($status == 0 || $status == 1)
		{
			$a=$this->user_management_model->changeuserStatus($status,$userid);
			
			if ($status == 0)
			{
                if(count($userid)>1)
                {
                		$this->session->set_flashdata('success','Users has been deactivated successfully');
                }
                else
                {
                		$this->session->set_flashdata('success','User has been deactivated successfully');
                }
			} 
			else
			{
				    if(count($userid)>1)
				    {
				    	$this->session->set_flashdata('success','Users has been activated successfully');
				    }
				    else
				    {
						$this->session->set_flashdata('success','User has been activated successfully');
				    }
			}
			echo true;
		} else
		{
			
			$this->session->set_flashdata('error','Something went wrong');
			echo true;
		}
	
	}
	
	// --Function Used To validate Email--//
	public function getValidateemail()
	{
		$this->Checklogin();
		$result=$this->user_management_model->getUserbyemail();
		echo $result;
	
	}
	
	// --function used to reset password--//
	public function resetUserpassword()
	{
		$this->Checklogin();
		
		$userid=$this->input->post('userId');
		
		if (! empty($userid))
		{
			$a=$this->user_management_model->resetUserpassword($userid);
			
			$this->session->set_flashdata('success','User password reset successfully');
			echo true;
		} 
		else
		{
			
			$this->session->set_flashdata('error','Something went wrong');
			echo true;
		}
	
	}
	
	// --Function Used to get User Details---//
	public function getUserprofile()
	{
		
		$this->Checklogin();
		
		$id=$this->input->post('userId');
		
		$resultUser=$this->user_management_model->getSpecificuser($id);
		$resultUsertype=$this->user_management_model->getAllusertype();
		$resultLocations=$this->user_management_model->getLocations();
		$result=$this->user_management_model->getSystemuser();
		$clientDetails=$this->user_management_model->getClientUserWise($id);
		$resultCountry=$this->user_management_model->getActiveCountry();
		$resultState=$this->user_management_model->getEditStateListing($resultUser[0]->sysmu_country);
		$resultCity=$this->user_management_model->getEditLocationListing($resultUser[0]->sysmu_state);
		$loc=$this->user_management_model->getLocationDetails($resultUser[0]->sysmu_location);
		
		
		?>
		   <div class="user_list_box">
					<div class="row">
						<div id="edit1" class="modal fade in" role="dialog">
							<div class="modal-dialog">
								<!-- Modal content-->
								<div class="modal-content">
										
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">×</button>
												<h2 class="modal-title text-left">
													<i class="fa fa-user"></i> <?php getLocalkeyword('Edit User');?>
												</h2>
											</div>
									
									<div class="modal-body">
										<div class="portlet-body form">
											<form  class=""  method="post" action="<?php echo base_url();?>head/user_management/editUser">
												<div class="form-body">
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label class=""><?php getLocalkeyword('User Type');?></label> 
																<select class="form-control" id="selUsertype" name="selUsertype" required>
																<option value="">Select User Type</option>
												                
												                <?php
												                    $type="";
																	for($i = 0; $i < count( $resultUsertype ); $i ++)
																	{
																													?>
												                   	<option value="<?php echo $resultUsertype[$i]->mutyp_id_pk?>" <?php if($resultUser[0]->sysmu_userTypeId_fk==$resultUsertype[$i]->mutyp_id_pk){ echo "selected"; 
												                   	$type= $resultUsertype[$i]->mutyp_userType;
												                   	}?>><?php echo $resultUsertype[$i]->mutyp_userType?></option>
												                   	<?php
																	}
																	?>
												               </select>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label class=""><?php getLocalkeyword('User Name');?></label> <input type="text" value="<?php echo $resultUser[0]->sysmu_username; ?>" class="form-control" placeholder="User name" id="txtUsername" name="txtUsername" required>
													<input type="hidden" name="txtUserid" id="txtUserid"  value="<?php echo $resultUser[0]->sysmu_id_pk; ?>">
														<input type="hidden" name="txtEmployeeid" value="<?php echo $resultUser[0]->sysmu_empid; ?>">
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
															<?php 
															       $userMobile = $this->encryption->decrypt($resultUser[0]->sysmu_mobile);
																  ?>
																<label class=""><?php getLocalkeyword('Mobile No.');?></label> <input type="number" step="any" min="0" value="<?php echo $userMobile;?>" class="form-control" placeholder="Mobile No." id="txtMobile" name="txtMobile" maxlength="10" minlength="10" required>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
															<?php 
												 $userEmail = $this->encryption->decrypt($resultUser[0]->sysmu_email);
												 $empId = $resultUser[0]->sysmu_empid;

												?>
																<label class=""><?php getLocalkeyword('Email Id');?></label> <input type="email" class="form-control" value="<?php echo  $userEmail;?>" placeholder="Email Id" id="txtEmail" readonly="readonly" name="txtEmail" autocomplete="off" onblur="getValidateemail(this.value)">
															</div>
														</div>
														<div class="col-md-6">
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
														<div class="col-md-6">
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
														<div class="col-md-6">
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
														<div class="col-md-6 col-sm-6">
															<div class="form-group">
																<label class=""><?php getLocalkeyword('Description');?></label>
																<textarea class="form-control" id="txtDescription" name="txtDescription" required><?php echo $resultUser[0]->sysmu_description;?></textarea>
															</div>
														</div>
														<div class="col-md-12 form-group">
															<div class="pull-right">
																<button type="submit" name="submit" class="btn btn-primary"><?php getLocalkeyword('Save');?></button>
																<button type="button" data-dismiss="modal" class="btn btn-danger"><?php getLocalkeyword('Cancel');?></button>
															</div>
														</div>
														<div class="clearfix"></div>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
							<div id="reset_pwd" class="modal fade in" role="dialog">
							<div class="modal-dialog">
								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" onclick="clearPasswordDetails()">×</button>
										<h2 class="modal-title text-left">
											<i class="fa fa-refresh"></i> <?php getLocalkeyword('Reset Password');?>
										</h2>
									</div>
									<div class="modal-body" id="passwordModel">
										<div class="portlet-body form">
											<form class="" action="#" >
												<div class="form-body">
												
													<div class=" col-md-6">
														<div class="form-group">
															<div class="radio">
																<label> <input type="radio" name="optradio" id="auto_pwd" value="1" onclick="generateAutopassword()"> <?php getLocalkeyword('Generate Auto');?>
																</label>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<div class="radio">
																<label> <input type="radio" name="optradio" id="manual_pwd" value="0"  onclick="generateManualpassword()"> <?php getLocalkeyword('Generate Manually');?>
																</label>
															</div>
														</div>
													</div>
													<div class="manual" style="display: none;">
														<div class="col-md-6">
															<div class="form-group">
																<label><?php getLocalkeyword('Password');?></label> <input type="password" class="form-control" name="txtPassword" id="txtPassword" placeholder="Enter Password">
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label><?php getLocalkeyword('Confirm Password');?></label> <input type="password" autocomplete="off"  class="form-control" name="txtConfirmpassword" id="txtConfirmpassword" placeholder="Confirm your Password">
															</div>
														</div>
													</div>
													<div class="automatic" style="display: none;">
														<div class="col-md-12">
															<div class="form-group">
																<label><?php getLocalkeyword('Password');?></label> <br> <label style="padding: 8px 0px 0 0;; color: #337ab7;" id="auto_pass_label"></label>
																<input type="hidden" id="txtAutopassword" name="txtAutopassword" >
																
															</div>
														</div>
													</div>
													<div class="modal-footer">
														<button type="button" onclick="validatePassword()" class="btn btn-primary"><?php getLocalkeyword('Save');?></button>
														<button type="button" onclick="clearPasswordDetails()" data-dismiss="modal" class="btn btn-danger"><?php getLocalkeyword('Cancel');?></button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="portlet light bordered">
								<div class="portlet-title">
									<div class="row">
										<div class="col-md-6 ">
											<ul class="nav navbar-nav ">
												<li class="dropdown dropdown-user"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"
													style="font-size: 14px; padding: 18px 5px;">Recently updated <i class="fa fa-angle-down"></i> </span></a>
													<ul class="dropdown-menu dropdown-menu-default">
														<li><a href="#">All Contacts</a></li>
														<li><a href="#">My Contacts </a></li>
														<li><a href="#">Recently viewed</a></li>
														<li><a href="#">Not updated in 30 Days</a></li>
													</ul></li>
											</ul>
										</div>
										<div class="col-md-6 col-sm-12  pull-right">
											<div class="" style="float: right; margin-left: 2px; margin-top: 12px;">
											<?php
												if(getAccessRights('mvbUmMuAdd'))
												{
											?>
													 <a href="<?php echo base_url()?>head/user_management/addUser" id="sample_editable_1_new hvr-float-shadow" class="btn btn-primary" data-title="Add Contact">+</a>
											<?php
												}

												if(getAccessRights('mvbUmMuActive') || getAccessRights('mvbUmMuDeactive') || getAccessRights('mvbUmMuRePass'))
												{													
											?>		
													<ul class="nav navbar-nav pl0 pull-right" style="margin-left: 5px;">
														<li class="dropdown dropdown-user burger_menu"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
															data-close-others="true" style="margin-top: 0px;"><i class="fa fa-bars fa-2x" aria-hidden="true"></i> </a>
														<?php
															if(getAccessRights('mvbUmMuActive') || getAccessRights('mvbUmMuDeactive') || getAccessRights('mvbUmMuRePass'))
															{
														?>
																<ul class="dropdown-menu dropdown-menu-default">
																<?php
																	if(getAccessRights('mvbUmMuActive'))
																	{
																?>
																		<li class="options"  style="border-bottom: 1px solid #e7ecf1;"><a  onclick="chechProfileCheckbox(1)" href="#" title="Custom Fields" style="padding: 5px; margin-top: 5px;">
																		<?php getLocalkeyword('Active');?></a>
																		</li>
																<?php
																	}

																	if(getAccessRights('mvbUmMuDeactive'))
																	{
																?>		
																		<li class="options"><a href="#" onclick="chechProfileCheckbox(0)" title="Custom Fields" style="padding: 5px; margin-top: 5px;"><?php getLocalkeyword('Deactive');?></a>
																		</li>
																<?php
																	}

																	if(getAccessRights('mvbUmMuRePass'))
																	{
																?>			
																		<li class="options"><a href="#" onclick="resetUserListingpassword()" title="Custom Fields" style="padding: 5px; margin-top: 5px;"><?php getLocalkeyword('Reset Password');?></a></li>
																<?php
																	}
																?>		
																</ul>
														<?php
															}
														?>	
															</li>
													</ul>
											<?php
												}
											?>		
											</div>
										</div>
									</div>
								</div>
								<div class="portlet-body" style="overflow: auto;">
									<div id="test-list">
										<ul class="list list-group All_list">
										    <?php 
										    
										    
										    	for($mu=0;$mu < count($result);$mu ++)
												{
													
													$j=$mu+1;
													?>
										
											        <li class="list-group-item <?php if($result[$mu]->sysmu_id_pk==$resultUser[0]->sysmu_id_pk){?> active <?php }?> ">
											        <input type="checkbox"  <?php if($result[$mu]->sysmu_id_pk==$resultUser[0]->sysmu_id_pk){?> checked <?php }?> "
											          name="profilechk<?php echo $j?>" id="profilechk<?php echo $j?>"
											          value="<?php echo $result[$mu]->sysmu_id_pk;?>" height="20" width="20" class="check_box1" /><?php echo $result[$mu]->sysmu_username;?><span class="pull-right"><?php echo $result[$mu]->sysmu_empid;?></span></li>
											
										 <?php }?>
										</ul>
										<ul class="pagination pull-right"></ul>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-8">
							<div class="row">
								<div class="" style="background: #fcfcfc; margin-bottom: 10px; padding: 10px 0px; float: left; margin-left: 12px; margin-right: 12px; border-bottom: 1px solid #e4e4e4;">
									<div class="col-md-2">
										<div class="profile-userpic">
											<img src="<?php echo base_url()?>themes/assets/profile_user.jpg" alt="" style="height: 100%; width: 100%;">
										</div>
									</div>
									<div class="col-md-7">
										<h3 style="margin-top: 3px;"margin-bottom:0px;><?php echo $resultUser[0]->sysmu_username; ?></h3>
										<p style="color: #ababab;"><?php echo $loc;?></p>
										<p style="color: #ababab;"><?php echo $resultUser[0]->sysmu_description; ?></p>
										<div class="row pro_info">
											<ul class="list-inline">
												<li><i class="fa fa-user" aria-hidden="true"></i><?php echo $resultUser[0]->sysmu_username; ?></li>
												<li><i class="fa fa-user" aria-hidden="true"></i> <?php echo $type;?></li>
												<li><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo  $userEmail;?></li>
												<li><i class="fa fa-mobile mob" aria-hidden="true"></i> <?php echo $userMobile;?></li>
												<li><i class="fa fa-group" aria-hidden="true"></i> <?php echo $empId;?></li>
												<li><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $loc;?></li>
											</ul>
										</div>
									</div>
									<div class="col-md-3 pd0">
										<div class="btn-group pull-right">
										<?php 
											if(getAccessRights('mvbUmMuEdit'))
											{	
										?>
													<a href="#" id="sample_editable_1_new hvr-float-shadow" data-toggle="modal" data-target="#edit1" class="btn btn-primary"><?php getLocalkeyword('Edit');?></a>
										<?php
											}

											if(getAccessRights('mvbUmMuActive') || getAccessRights('mvbUmMuDeactive') || getAccessRights('mvbUmMuRePass'))
											{
										?>			 
											<a class="btn  blue btn-primary btn-circle" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false"
												style="margin-left: 5px;"><?php getLocalkeyword('More');?>  <i class="fa fa-angle-down"></i>
											</a>
											<?php
													if(getAccessRights('mvbUmMuActive') || getAccessRights('mvbUmMuDeactive') || getAccessRights('mvbUmMuRePass'))
													{
											?>
														<div class="dropdown-menu dropdown-checkboxes pull-right">
														<?php
															if(getAccessRights('mvbUmMuRePass'))
															{
														?>
																	<li class="options" style="border-bottom: 1px solid #e7ecf1;"><a data-toggle="modal" data-target="#reset_pwd"
																		style="padding-top: 0px; margin-top: 5px; padding-left: 0px;"><?php getLocalkeyword('Reset Password');?></a>
																	</li>
														<?php
															}

															if(getAccessRights('mvbUmMuActive'))
															{
														?>		
																	<li class="options" style="border-bottom: 1px solid #e7ecf1;"><a data-toggle="modal" onclick="chechSpecificCheckbox(1,'<?php echo $resultUser[0]->sysmu_id_pk; ?>')"  data-target="#" style="padding-top: 0px; margin-top: 5px; padding-left: 0px;">
																	<?php getLocalkeyword('Active');?></a>
																	</li>
														<?php
															}

															if(getAccessRights('mvbUmMuDeactive'))
															{
														?>		
																	<li class="options"><a data-toggle="modal" data-target="#" onclick="chechSpecificCheckbox(0,'<?php echo $resultUser[0]->sysmu_id_pk; ?>')" style="padding-top: 0px; margin-top: 5px; padding-left: 0px;">
																	<?php getLocalkeyword('Deactive');?></a>
																	</li>
														<?php
															}
														?>		
														</div>
													<?php
													}
											}	
										?>		
														<a onclick="closProfileDiv();" class="close_section" title="Close" id="close"><i style="color: #616161; padding-top: 10px; margin-left: 7px; font-size: 35px;"
															class="fa fa-times fa-3x"></i></a>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="profile-content info_box">
									<div class="">
										<div class="col-md-12">
											<ul class="nav nav-tabs">
												<li class="active"><a href="#Package" id="tab2" data-toggle="tab" aria-expanded="true"><?php getLocalkeyword('History');?></a></li>
												<li><a href="#activity_tab" id="tab_act" data-toggle="tab" aria-expanded="true"><?php getLocalkeyword('Activity');?></a></li>
												<!--   <li><a data-toggle="tab" href="#password">Change Password</a></li> -->
											</ul>
											<!-- Modal -->
											<!-- ends -->
											<div class="tab-content">
												<div id="Package" class="tab-pane fade active in">
													<div class="row">
														<div class="col-md-12">
															<div class="portlet light portlet-fit bordered">
																<div class="portlet-body">
																	<div class="timeline">
																		<!-- TIMELINE ITEM -->
																		<div class="timeline-item">
																			<div class="timeline-badge">
																				<img class="timeline-badge-userpic" src="../assets/profile_user.jpg">
																			</div>
																			<div class="timeline-body">
																				<div class="timeline-body-arrow"></div>
																				<div class="timeline-body-head">
																					<div class="timeline-body-head-caption">
																						<a href="javascript:;" class="timeline-body-title font-blue-madison">Andres Iniesta</a> <span class="timeline-body-time font-grey-cascade">Replied at
																							7:45 PM</span>
																					</div>
																				</div>
																				<div class="timeline-body-content">
																					<span class="font-grey-cascade"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore
																						magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. </span>
																				</div>
																			</div>
																		</div>
																		<!-- END TIMELINE ITEM -->
																		<!-- TIMELINE ITEM -->
																		<div class="timeline-item">
																			<div class="timeline-badge">
																				<img class="timeline-badge-userpic" src="../assets/profile_user.jpg">
																			</div>
																			<div class="timeline-body">
																				<div class="timeline-body-arrow"></div>
																				<div class="timeline-body-head">
																					<div class="timeline-body-head-caption">
																						<a href="javascript:;" class="timeline-body-title font-blue-madison">Vanessa Bond</a> <span class="timeline-body-time font-grey-cascade">Posted new
																							post at 5:10 PM</span>
																					</div>
																					<div class="timeline-body-head-actions"></div>
																				</div>
																				<div class="timeline-body-content">
																					<span class="font-grey-cascade">
																						<p>Caulie dandelion maize lentil collard greens radish arugula sweet pepper water spinach kombu courgette lettuce. Celery coriander bitterleaf epazote
																							radicchio shallot winter purslane collard greens spring onion squash lentil. Artichoke salad bamboo shoot black-eyed pea brussels sprout garlic kohlrabi.
																							coriander bitterleaf epazote radicchio shallot winter purslane collard.</p>
																						<p>Coriander bitterleaf epazote radicchio shallot winter purslane collard. Caulie dandelion maize lentil collard greens radish arugula sweet pepper water
																							spinach kombu courgette lettuce. Celery coriander bitterleaf epazote radicchio shallot winter purslane collard greens spring onion squash lentil. Artichoke
																							salad bamboo shoot black-eyed pea brussels sprout garlic kohlrabi.</p>
																						<p>Caulie dandelion maize lentil collard greens radish arugula sweet pepper water spinach kombu courgette lettuce. Celery coriander bitterleaf epazote
																							radicchio shallot winter purslane collard greens spring onion squash lentil. Artichoke salad bamboo shoot black-eyed pea brussels sprout garlic kohlrabi
																							radicchio shallot winter purslane collard greens spring onion squash lentil.</p>
																						<p>Coriander bitterleaf epazote radicchio shallot winter purslane collard. Caulie dandelion maize lentil collard greens radish arugula sweet pepper water
																							spinach kombu courgette lettuce. Celery coriander bitterleaf epazote radicchio shallot winter purslane collard greens spring onion squash lentil. Artichoke
																							salad bamboo shoot black-eyed pea brussels sprout garlic kohlrabi.</p>
																					</span>
																				</div>
																			</div>
																		</div>
																		<!-- END TIMELINE ITEM -->
																		<!-- TIMELINE ITEM WITH GOOGLE MAP -->
																		<!-- END TIMELINE ITEM -->
																		<!-- TIMELINE ITEM -->
																		<!-- END TIMELINE ITEM -->
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div id="activity_tab" class="tab-pane fade">
													<div class="row">
														<div class="portlet light bordered">
															<div class="portlet-body">
																<div class="table-scrollable table-scrollable-borderless">
																	<table class="table table-hover table-light">
																		<thead>
																			<tr class="uppercase">
																				<th colspan="2">MEMBER</th>
																				<!-- <th>Total Client</th> -->
																				<th>Total Rev. For New A/c</th>
																				<th>Total Rev. on Recharge</th>
																				<th>Total SMS Qty Purchansed</th>
																				<th>Total Email Qty Purchansed</th>
																			</tr>
																		</thead>
																		<?php 
																		for($cl=0;$cl<count($clientDetails);$cl++)
																		{
																		?>
																		<tr>
																			<td class="fit"><img class="user-pic" src="../assets/pages/media/users/avatar3.jpg"></td>
																			<td><a href="<?php echo base_url();?>head/client_management" class="primary-link"><?php echo $clientDetails[$cl]->clnt_name;?> </a></td>
																			<td><?php echo $clientDetails[$cl]->total_rev_new_ac;?></td>
																			<td>0</td>
																			<td><?php echo $clientDetails[$cl]->total_sms_purchased;?></td>
																			<td><?php echo $clientDetails[$cl]->total_email_purchased;?></td>
																			
																		</tr>
																		<?php
																		}
																		?>
																	</table>
																</div>
															</div>
														</div>
														<div class="" style="display:none;">
															<div class="col-md-3  ">
																<div class="media">
																	<a class="media-left" href="#"> <img class="media-object" src="../assets/pages/media/users/avatar3.jpg" style="border-radius: 50% !important;">
																	</a>
																	<div class="media-body">
																		<a href="visitor_manage.html" class="item-name primary-link">Nick Larson</a>
																		<p>
																			<i class="fa fa-envelope item-label" aria-hidden="true"></i> abc@gmail.com
																		</p>
																		<p>
																			<i class="fa fa-mobile mob" aria-hidden="true"></i> 8446253249
																		</p>
																		<p>
																			<i class="fa fa-suitcase" aria-hidden="true"></i> Business 1
																		</p>
																	</div>
																</div>
															</div>
															<div class="col-md-3">
																<div class="media">
																	<a class="media-left" href="#"> <img class="media-object" src="../assets/pages/media/users/avatar3.jpg" style="border-radius: 50% !important;">
																	</a>
																	<div class="media-body">
																		<a href="visitor_manage.html" class="item-name primary-link">Nick Larson</a>
																		<p>
																			<i class="fa fa-envelope item-label" aria-hidden="true"></i> abc@gmail.com
																		</p>
																		<p>
																			<i class="fa fa-mobile mob" aria-hidden="true"></i> 8446253249
																		</p>
																		<p>
																			<i class="fa fa-suitcase" aria-hidden="true"></i> Business 2
																		</p>
																	</div>
																</div>
															</div>
															<div class="col-md-3  ">
																<div class="media">
																	<a class="media-left" href="#"> <img class="media-object" src="../assets/pages/media/users/avatar3.jpg" style="border-radius: 50% !important;">
																	</a>
																	<div class="media-body">
																		<a href="visitor_manage.html" class="item-name primary-link">Nick Larson</a>
																		<p>
																			<i class="fa fa-envelope item-label" aria-hidden="true"></i> abc@gmail.com
																		</p>
																		<p>
																			<i class="fa fa-mobile mob" aria-hidden="true"></i> 8446253249
																		</p>
																		<p>
																			<i class="fa fa-suitcase" aria-hidden="true"></i> Business 3
																		</p>
																	</div>
																</div>
															</div>
															<div class="col-md-3 ">
																<div class="media">
																	<a class="media-left" href="#"> <img class="media-object" src="../assets/pages/media/users/avatar3.jpg" style="border-radius: 50% !important;">
																	</a>
																	<div class="media-body">
																		<a href="visitor_manage.html" class="item-name primary-link">Nick Larson</a>
																		<p>
																			<i class="fa fa-envelope item-label" aria-hidden="true"></i> abc@gmail.com
																		</p>
																		<p>
																			<i class="fa fa-mobile mob" aria-hidden="true"></i> 8446253249
																		</p>
																		<p>
																			<i class="fa fa-suitcase" aria-hidden="true"></i> Business 4
																		</p>
																	</div>
																</div>
															</div>
															<div class="col-md-3 ">
																<div class="media">
																	<a class="media-left" href="#"> <img class="media-object" src="../assets/pages/media/users/avatar3.jpg" style="border-radius: 50% !important;">
																	</a>
																	<div class="media-body">
																		<a href="visitor_manage.html" class="item-name primary-link">Nick Larson</a>
																		<p>
																			<i class="fa fa-envelope item-label" aria-hidden="true"></i> abc@gmail.com
																		</p>
																		<p>
																			<i class="fa fa-mobile mob" aria-hidden="true"></i> 8446253249
																		</p>
																		<p>
																			<i class="fa fa-suitcase" aria-hidden="true"></i> Business 5
																		</p>
																	</div>
																</div>
															</div>
															<div class="col-md-3 ">
																<div class="media">
																	<a class="media-left" href="#"> <img class="media-object" src="../assets/pages/media/users/avatar3.jpg" style="border-radius: 50% !important;">
																	</a>
																	<div class="media-body">
																		<a href="visitor_manage.html" class="item-name primary-link">Nick Larson</a>
																		<p>
																			<i class="fa fa-envelope item-label" aria-hidden="true"></i> abc@gmail.com
																		</p>
																		<p>
																			<i class="fa fa-mobile mob" aria-hidden="true"></i> 8446253249
																		</p>
																		<p>
																			<i class="fa fa-suitcase" aria-hidden="true"></i> Business 6
																		</p>
																	</div>
																</div>
															</div>
															<div class="col-md-3 ">
																<div class="media">
																	<a class="media-left" href="#"> <img class="media-object" src="../assets/pages/media/users/avatar3.jpg" style="border-radius: 50% !important;">
																	</a>
																	<div class="media-body">
																		<a href="visitor_manage.html" class="item-name primary-link">Nick Larson</a>
																		<p>
																			<i class="fa fa-envelope item-label" aria-hidden="true"></i> abc@gmail.com
																		</p>
																		<p>
																			<i class="fa fa-mobile mob" aria-hidden="true"></i> 8446253249
																		</p>
																		<p>
																			<i class="fa fa-suitcase" aria-hidden="true"></i> Business 7
																		</p>
																	</div>
																</div>
															</div>
															<div class="col-md-3 ">
																<div class="media">
																	<a class="media-left" href="#"> <img class="media-object" src="../assets/pages/media/users/avatar3.jpg" style="border-radius: 50% !important;">
																	</a>
																	<div class="media-body">
																		<a href="visitor_manage.html" class="item-name primary-link">Nick Larson</a>
																		<p>
																			<i class="fa fa-envelope item-label" aria-hidden="true"></i> abc@gmail.com
																		</p>
																		<p>
																			<i class="fa fa-mobile mob" aria-hidden="true"></i> 8446253249
																		</p>
																		<p>
																			<i class="fa fa-suitcase" aria-hidden="true"></i> Business 8
																		</p>
																	</div>
																</div>
															</div>
															<div class="col-md-3 ">
																<div class="media">
																	<a class="media-left" href="#"> <img class="media-object" src="../assets/pages/media/users/avatar3.jpg" style="border-radius: 50% !important;">
																	</a>
																	<div class="media-body">
																		<a href="visitor_manage.html" class="item-name primary-link">Nick Larson</a>
																		<p>
																			<i class="fa fa-envelope item-label" aria-hidden="true"></i> abc@gmail.com
																		</p>
																		<p>
																			<i class="fa fa-mobile mob" aria-hidden="true"></i> 8446253249
																		</p>
																		<p>
																			<i class="fa fa-suitcase" aria-hidden="true"></i> Business 9
																		</p>
																	</div>
																</div>
															</div>
															<div class="col-md-3 ">
																<div class="media">
																	<a class="media-left" href="#"> <img class="media-object" src="../assets/pages/media/users/avatar3.jpg" style="border-radius: 50% !important;">
																	</a>
																	<div class="media-body">
																		<a href="visitor_manage.html" class="item-name primary-link">Nick Larson</a>
																		<p>
																			<i class="fa fa-envelope item-label" aria-hidden="true"></i> abc@gmail.com
																		</p>
																		<p>
																			<i class="fa fa-mobile mob" aria-hidden="true"></i> 8446253249
																		</p>
																		<p>
																			<i class="fa fa-suitcase" aria-hidden="true"></i> Business 10
																		</p>
																	</div>
																</div>
															</div>
															<div class="col-md-3 ">
																<div class="media">
																	<a class="media-left" href="#"> <img class="media-object" src="../assets/pages/media/users/avatar3.jpg" style="border-radius: 50% !important;">
																	</a>
																	<div class="media-body">
																		<a href="visitor_manage.html" class="item-name primary-link">Nick Larson</a>
																		<p>
																			<i class="fa fa-envelope item-label" aria-hidden="true"></i> abc@gmail.com
																		</p>
																		<p>
																			<i class="fa fa-mobile mob" aria-hidden="true"></i> 8446253249
																		</p>
																		<p>
																			<i class="fa fa-suitcase" aria-hidden="true"></i> Business 11
																		</p>
																	</div>
																</div>
															</div>
															<div class="col-md-3 ">
																<div class="media">
																	<a class="media-left" href="#"> <img class="media-object" src="../assets/pages/media/users/avatar3.jpg" style="border-radius: 50% !important;">
																	</a>
																	<div class="media-body">
																		<a href="visitor_manage.html" class="item-name primary-link">Nick Larson</a>
																		<p>
																			<i class="fa fa-envelope item-label" aria-hidden="true"></i> abc@gmail.com
																		</p>
																		<p>
																			<i class="fa fa-mobile mob" aria-hidden="true"></i> 8446253249
																		</p>
																		<p>
																			<i class="fa fa-suitcase" aria-hidden="true"></i> Business 12
																		</p>
																	</div>
																</div>
															</div>
															<div class="col-md-3 ">
																<div class="media">
																	<a class="media-left" href="#"> <img class="media-object" src="../assets/pages/media/users/avatar3.jpg" style="border-radius: 50% !important;">
																	</a>
																	<div class="media-body">
																		<a href="visitor_manage.html" class="item-name primary-link">Nick Larson</a>
																		<p>
																			<i class="fa fa-envelope item-label" aria-hidden="true"></i> abc@gmail.com
																		</p>
																		<p>
																			<i class="fa fa-mobile mob" aria-hidden="true"></i> 8446253249
																		</p>
																		<p>
																			<i class="fa fa-suitcase" aria-hidden="true"></i> Business 13
																		</p>
																	</div>
																</div>
															</div>
															<div class="col-md-3 ">
																<div class="media">
																	<a class="media-left" href="#"> <img class="media-object" src="../assets/pages/media/users/avatar3.jpg" style="border-radius: 50% !important;">
																	</a>
																	<div class="media-body">
																		<a href="visitor_manage.html" class="item-name primary-link">Nick Larson</a>
																		<p>
																			<i class="fa fa-envelope item-label" aria-hidden="true"></i> abc@gmail.com
																		</p>
																		<p>
																			<i class="fa fa-mobile mob" aria-hidden="true"></i> 8446253249
																		</p>
																		<p>
																			<i class="fa fa-suitcase" aria-hidden="true"></i> Business 14
																		</p>
																	</div>
																</div>
															</div>
															<div class="col-md-3 ">
																<div class="media">
																	<a class="media-left" href="#"> <img class="media-object" src="../assets/pages/media/users/avatar3.jpg" style="border-radius: 50% !important;">
																	</a>
																	<div class="media-body">
																		<a href="visitor_manage.html" class="item-name primary-link">Nick Larson</a>
																		<p>
																			<i class="fa fa-envelope item-label" aria-hidden="true"></i> abc@gmail.com
																		</p>
																		<p>
																			<i class="fa fa-mobile mob" aria-hidden="true"></i> 8446253249
																		</p>
																		<p>
																			<i class="fa fa-suitcase" aria-hidden="true"></i> Business 15
																		</p>
																	</div>
																</div>
															</div>
															<div class="col-md-3 ">
																<div class="media">
																	<a class="media-left" href="#"> <img class="media-object" src="../assets/pages/media/users/avatar3.jpg" style="border-radius: 50% !important;">
																	</a>
																	<div class="media-body">
																		<a href="visitor_manage.html" class="item-name primary-link">Nick Larson</a>
																		<p>
																			<i class="fa fa-envelope item-label" aria-hidden="true"></i> abc@gmail.com
																		</p>
																		<p>
																			<i class="fa fa-mobile mob" aria-hidden="true"></i> 8446253249
																		</p>
																		<p>
																			<i class="fa fa-suitcase" aria-hidden="true"></i> Business 16
																		</p>
																	</div>
																</div>
															</div>
														</div>
														<div>
															<ul class="pagination pull-right" style="margin-top: 23px;">			
															</ul>
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
			
     <?php
	
	}
	
	//---Function used to reset password---//
	
	public function resetUserspecificpassword()
	{
		
		$userid=$this->input->post('userId');
		$password_ini=$this->input->post('password');

		$result=$this->db->query("Select sysmu_email from tblmvbsysmainusers where sysmu_id_pk='".$userid."'");

		$row=$result->result();

		$final_email_id=$this->encryption->decrypt($row[0]->sysmu_email);		
	
		if ($userid !="")
		{
			    $password=$this->encryption->encrypt($password_ini);
				$data=array('sysmu_password'=>$password);
				$this->db->where('sysmu_id_pk',$userid);
				$this->db->update('tblmvbsysmainusers',$data);

				$this->session->set_flashdata("success","User password has been reset successfully");	

				$msg_to_send="Your password has been reset successfully.<br><br> Your new password are as follows: <br><br> Password - ".$password_ini;


				$this->user_management_model->sendMandrillEmail($final_email_id,'Reset Password',$msg_to_send);	

				echo true;		
		} 
		else
		{	
			echo false;
		}
		
	}



	public function manage_user_type()
	{
			$this->Checklogin();

		//---------------------------------- Start Save Transaction Logs ---------------------------------//

			setSAActivityLogs('Transaction_activity','user_type_view');			

		//--------------------------------- End Save Transaction Logs ------------------------------------//

			$data ['result']=$this->user_management_model->getUserType();
			$data ['include']='user_management/manage_user_type_management';
			$data ['admin_section']='manage_user_type_management';
			$this->load->view('backend/container_sa',$data);
	}
	

	public function addUserType()
	{
			$this->Checklogin();
			if (isset($_POST ['btnSubmit']))
			{
				$result=$this->user_management_model->addUserType();
				
				if ($result > 0)
				{
					$this->session->set_tempdata('success','User type has been added successfully.',3);
					redirect('head/user_management/manage_user_type');
				} 
				else
				{
					$this->session->set_tempdata('error','Unable to save user details.',3);
					redirect($this->agent->referrer());
				}
			} 
			else
			{
				$data ['module']=$this->user_management_model->getallmodule();
				$data ['resultUsertype']=$this->user_management_model->getAllUserTypeList();
				$data ['include']='user_management/add_user_type';
				$data ['admin_section']='add_user_type';
				$this->load->view('backend/container_sa',$data);
			}
	}

	public function editUserType($id="")
	{
			$this->Checklogin();
			if (isset($_POST ['btnSubmit']))
			{
				$result=$this->user_management_model->editUserType();
				
				if ($result > 0)
				{
					$this->session->set_tempdata('success','User type has been updated successfully.',3);
					redirect('head/user_management/manage_user_type');
				} 
				else
				{
					$this->session->set_tempdata('error','Unable to save user details.',3);
					redirect($this->agent->referrer());
				}
			} 
			else
			{
				$user_type_id=base64_decode($id);

				$data ['info']=$this->user_management_model->getIdWiseUserType($user_type_id);
				$data ['user_type_privileges']=$this->user_management_model->getIdWiseUserTypePrivileges($user_type_id);					
				$data ['module']=$this->user_management_model->getallmodule();
				$data ['resultUsertype']=$this->user_management_model->getAllUserTypeList();
				$data ['include']='user_management/edit_user_type';
				$data ['admin_section']='edit_user_type';
				$this->load->view('backend/container_sa',$data);
			}
	}


	public function getUserTypePrivileges()
	{
			$user_type_id=$_POST['user_type_id'];

			$module=$this->user_management_model->getallmodule();
			$info=$this->user_management_model->getIdWiseUserType($user_type_id);
			$user_type_privileges=$this->user_management_model->getIdWiseUserTypePrivileges($user_type_id);

			// $temp_array=array();

			// for($b=0;$b<count($user_type_privileges);$b++)
			// {
			// 		array_push($temp_array,);
			// }

            

			//$user_type_privileges=$this->user_management_model->getUserTypePrivileges($user_type_id);
?>
			
			 <form id="frmUserType" name="frmUserType" method="POST" action="<?php echo base_url();?>head/user_management/editUserType/<?php echo $user_type_id;?>">

                                                <div class="col-md-8">

                                                    <div class="row">

                                                        <div class="col-md-6">

                                                            <div class="form-group">

                                                                <label>User Type Name </label>

                                                                <input type="text" class="form-control" placeholder="Enter User Type Name" id="txtUserTypeName" name="txtUserTypeName" value="<?php echo $info['mutyp_userType'];?>" required>

                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="row">

                                                        <div class="col-md-12">

                                                            <h3 class="text-left" style="font-size: 18px; margin-top: 0px;">Assign Privileges:</h3>

                                                        </div>

                                                    </div>

                                                    <?php
                                                     $count_sub=1;
                                                    for($i=0;$i<count($module);$i++)
                                                    {                                                        
                                                    ?>
                                                            <div class="col-lg-6">
                                                                    <div class="checkbox" class="form-control">
                                                                        <label for="cname" class="control-label col-lg-3"></label>
                                                                        <input type="checkbox" class="main_module" onclick="checked_all(this,'<?php echo $module[$i]->mm_module_name?>_module',<?php echo $module[$i]->mm_id_pk;?>);" id="<?php echo $module[$i]->mm_module_name?>" name="modules[]" value="<?php echo $module[$i]->mm_id_pk?>" <?php if(in_array($module[$i]->mm_id_pk,$user_type_privileges)){?> checked <?php } ?>>&nbsp; <font style="font-weight:bold;"><?php echo $module[$i]->mm_module_name?></font>
                                                                    </div>
                                                                    <div class="submodule_checkbox" class="form-control"  id="<?php echo $module[$i]->mm_module_name?>_module" style="margin-left:160px;">
                                                                        <?php
                                                                        $sub_modulename=$this->user_management_model->getallsubmodule($module[$i]->mm_id_pk);
                                                                         for($j=0;$j<count($sub_modulename);$j++)
                                                                         {                  
                                                                        ?>
                                                                                <input type="checkbox" id="all_modules_<?php echo $count_sub;?>" class="module_<?php echo $sub_modulename[$j]->mm_menu_id?>" value="<?php echo $sub_modulename[$j]->mm_id_pk;?>" name="modules[]"  onclick="checked_all_sub(this,'<?php echo $module[$i]->mm_module_name?>_module',<?php echo $j+1;?>),checkSubmoduleCheck(<?php echo $sub_modulename[$j]->mm_menu_id?>,'<?php echo $module[$i]->mm_module_name?>');" <?php if(in_array($sub_modulename[$j]->mm_id_pk,$user_type_privileges)){?> checked <?php } ?>>&nbsp; <?php echo $sub_modulename[$j]->mm_module_name;?><br>

                                                                                <div class="sub_submodule_checkbox" class="form-control"  id="<?php echo $sub_modulename[$j]->mm_module_name?>_module" style="margin-left:90px;">

                                                                                <?php
                                                                                    $sub_sub_modulename=$this->user_management_model->getallsubsubmodule($module[$i]->mm_id_pk,$sub_modulename[$j]->mm_id_pk);

                                                                                    for($k=0;$k<count($sub_sub_modulename);$k++)
                                                                                    {
                                                                                ?>
                                                                                            <input type="checkbox" id="all_sub_modules_<?php echo $count_sub;?>" class="sub_module_<?php echo $j+1?>" value="<?php echo $sub_sub_modulename[$k]->mm_id_pk;?>" name="modules[]"
                                                                                            	onclick="checkSubSubmoduleCheck(<?php echo $j+1?>,<?php echo $count_sub;?>,'<?php echo $module[$i]->mm_module_name?>',<?php echo $sub_modulename[$j]->mm_menu_id?>);"
                                                                                             <?php if(in_array($sub_sub_modulename[$k]->mm_id_pk,$user_type_privileges)){?> checked <?php } ?>>&nbsp; <?php echo $sub_sub_modulename[$k]->mm_module_name;?>
                                                                                            <br>
                                                                                <?php
                                                                                    }
                                                                                 ?>
                                                                                </div>      
                                                                         <?php
                                                                            $count_sub++;   
                                                                         }   
                                                                        ?>
                                                                    </div>  
                                                            </div>
                                                    <?php
                                                        }
                                                    ?>    

                                                    <input type="hidden" id="hidden_sub_module" name="hidden_sub_module" value="<?php echo $count_sub?>">

                                                    <!-- <table class="table table-bordered">

                                                        <tbody>

                                                            <tr>

                                                                <td width="220">

                                                                    <label class="">

                                                                        <input type="checkbox"> System User Management <span></span> </label>

                                                                </td>

                                                                <td width="670">
                                                                    <div class="inp3">

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> View

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Add

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Edit

                                                                        </label>

                                                                    </div>
                                                                </td>

                                                            </tr>

                                                            <tr>

                                                                <td>

                                                                    <label class="">

                                                                        <input type="checkbox"> User Management <span></span> </label>

                                                                </td>

                                                                <td>
                                                                    <div class="inp3">

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> View

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Add

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Edit

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Active

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Deactive

                                                                        </label>

                                                                    </div>
                                                                </td>

                                                            </tr>

                                                            <tr>

                                                                <td>

                                                                    <label class="">

                                                                        <input type="checkbox"> User Type Management <span></span> </label>

                                                                </td>

                                                                <td>
                                                                    <div class="inp3">

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> View

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Add

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Edit

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Active

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Deactive

                                                                        </label>

                                                                    </div>
                                                                </td>

                                                            </tr>

                                                            <tr>

                                                                <td>

                                                                    <label class="">

                                                                        <input type="checkbox"> Festival Management <span></span> </label>

                                                                </td>

                                                                <td>
                                                                    <div class="inp3">

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> View

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Add

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Edit

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Active

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Deactive
                                                                            <label class="">

                                                                                <input type="checkbox" value=""> Import

                                                                            </label>

                                                                    </div>
                                                                </td>

                                                            </tr>

                                                            <tr>

                                                                <td>

                                                                    <label class="">

                                                                        <input type="checkbox"> Discount Management <span></span> </label>

                                                                </td>

                                                                <td>
                                                                    <div class="inp3">

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> View

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Add

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Edit

                                                                        </label>

                                                                    </div>
                                                                </td>

                                                            </tr>

                                                            <tr>

                                                                <td>

                                                                    <label class="">

                                                                        <input type="checkbox"> Generate Coupon <span></span> </label>

                                                                </td>

                                                                <td>
                                                                    <div class="inp3">

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> View

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Add Coupon</label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Download unused Coupon</label>

                                                                    </div>
                                                                </td>

                                                            </tr>

                                                            <tr>

                                                                <td>
                                                                    <label class="">

                                                                        <input type="checkbox"> Package Management <span></span> </label>
                                                                </td>

                                                                <td>
                                                                    <div class="inp3">

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> View

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Add

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Edit

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Active

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> De-active

                                                                        </label>

                                                                    </div>
                                                                </td>

                                                            </tr>

                                                            <tr>

                                                                <td>
                                                                    <label class="">

                                                                        <input type="checkbox"> Sender Id Management <span></span> </label>
                                                                </td>

                                                                <td>
                                                                    <div class="inp3">

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> View

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Add

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Edit

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Active

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> De-active

                                                                        </label>

                                                                    </div>
                                                                </td>

                                                            </tr>

                                                            <tr>

                                                                <td>
                                                                    <label class="">

                                                                        <input type="checkbox"> FAQ's Management <span></span> </label>
                                                                </td>

                                                                <td>
                                                                    <div class="inp3">

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> View

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Add

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Edit

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Active

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Push/Revoke

                                                                        </label>

                                                                    </div>
                                                                </td>

                                                            </tr>

                                                            <tr>

                                                                <td>
                                                                    <label class="">

                                                                        <input type="checkbox"> Email Management <span></span> </label>
                                                                </td>

                                                                <td>
                                                                    <div class="inp3">

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> View

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Add

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Edit

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Active

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> De-active

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Push/Revoke

                                                                        </label>

                                                                    </div>
                                                                </td>

                                                            </tr>

                                                            <tr>

                                                                <td>
                                                                    <label class="">

                                                                        <input type="checkbox"> Communication Management <span></span> </label>
                                                                </td>

                                                                <td>
                                                                    <div class="inp3">

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> View

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Send SMS</label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> View SMS</label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Send Email</label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> View Email</label>

                                                                    </div>
                                                                </td>

                                                            </tr>

                                                            <tr>

                                                                <td>
                                                                    <label class="">

                                                                        <input type="checkbox"> Backup Management <span></span> </label>
                                                                </td>

                                                                <td>
                                                                    <div class="inp3">

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Download Backup</label>

                                                                    </div>
                                                                </td>

                                                            </tr>

                                                            <tr>

                                                                <td>
                                                                    <label class="">

                                                                        <input type="checkbox"> Order Management <span></span> </label>
                                                                </td>

                                                                <td>
                                                                    <div class="inp3">

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> View

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Add

                                                                        </label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> View Emails/SMS</label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Refill Manually</label>

                                                                        <label class="">

                                                                            <input type="checkbox" value=""> Order Details</label>

                                                                    </div>
                                                                </td>

                                                            </tr>

                                                        </tbody>

                                                    </table> -->

                                                    <div class="col-md-12">

                                                        <div class="modal-footer">

                                                            <button type="submit" class="btn btn-primary" name="btnSubmit">Save</button>

                                                            <a href="<?php echo base_url();?>head/user_management/manage_user_type" class="btn btn-danger">Cancel</a> </div>

                                                    </div>

                                                </div>


             <input type="hidden" id="hidden_user_type_id" name="hidden_user_type_id" value="<?php echo $info['mutyp_id_pk'];?>"/>    

            </form> 

<?php					
	}



	public function changeUserTypeIdStatus()
	{
				$this->Checklogin();
				$status=$this->input->post('id');
				$usertypeid=$this->input->post('user_type_id');
								
				if ($status == 0 || $status == 1)
				{
					$a=$this->user_management_model->changeUserTypeIdStatus($status,$usertypeid);
					
					if ($status == 0)
					{
						if(count($usertypeid)>1)
						{
								$this->session->set_tempdata('success','User types has been deactivated successfully',3);
						}
						else
						{
								$this->session->set_tempdata('success','User type has been deactivated successfully',3);
						}
					} 
					else
					{
						if(count($usertypeid)>1)
						{
								$this->session->set_tempdata('success','User types has been activated successfully',3);
						}
						else
						{
								$this->session->set_tempdata('success','User type has been activated successfully',3);
						}						
					}
					echo true;
				}
				else
				{
					
					$this->session->set_tempdata('error','Something went wrong',3);
					echo true;
				}
	}
	
	
 
	public function userProfile()
	{
		
		$this->Checklogin();
		if (isset($_POST ['btnSubmit']))
		{
			$result=$this->user_management_model->userProfile();
				
			if ($result > 0)
			{
				$this->session->set_flashdata('success','User has been updated successfully.');
				redirect('head/user_management/userProfile');
			} else
			{
				$this->session->set_flashdata('error','Unable to save user details.');
				redirect($this->agent->referrer());
			}
		} else
		{
			$data['resultUser']=$this->user_management_model->getSpecificuser($this->session->userdata('admin_id'));
			$data ['resultLocations']=$this->user_management_model->getLocations();
			$data ['include']='user_management/userprofile';
			$data ['admin_section']='edit_new_user';
			$this->load->view('backend/container_sa',$data);
		}
		
		
		
	}
	
	public function userPassword()
	{
		$this->Checklogin();
		// if (isset($_POST ['btnSubmit']))
		// {
		// 	$result=$this->user_management_model->userPassword();
	
		// 	if ($result > 0)
		// 	{
		// 		$this->session->set_flashdata('success','User password has been updated successfully.');
		// 		redirect('head/user_management/userProfile');
		// 	} else
		// 	{
		// 		$this->session->set_flashdata('error','Unable to save password details.');
		// 		redirect($this->agent->referrer());
		// 	}
		// } else
		{
			$data ['include']='user_management/password';
			$data ['admin_section']='edit_new_user';
			$this->load->view('backend/container_sa',$data);
		}
	
	
	
	}
	
	//--function used to validate otp--//
	public function validateOtp()
	{
	
		$this->Checklogin();
		$pass=$this->input->post('Password');
		$admin_id=$this->session->userdata('admin_id');
		$result=$this->user_management_model->getSpecificuser($admin_id);
	
		if(count($result)>0)
		{
			$storedPassword=$this->encryption->decrypt($result[0]->sysmu_password);
				
			if($storedPassword==$pass)
			{
				echo 1;
			}
			else
			{
				echo 0;
			}
				
		}
		else
		{
			echo 0;
		}
	
	
	}
	
	//--function used to change otp--//
	public function changeOtp()
	{
	
		$this->Checklogin();
		$pass=$this->input->post('txtcPassword');
		$admin_id=$this->session->userdata('admin_id');
		$result=$this->user_management_model->changeOtp($pass,$admin_id);
	    redirect('head/dashboard');
	}


	public function deleteUserType()
	{
			$user_type_id=$_POST['user_type_id'];

                        
			$result_user_type=$this->user_management_model->checkUserTypeExists($user_type_id);
                        

			if(count($result_user_type)>0)
			{
                    $this->session->set_tempdata('error','User type is associated with one of system user',3);
					
			}
			else
			{
					$this->db->query("update tblmvbsysmainusertypes set mutyp_delete='1' where mutyp_id_pk='".$user_type_id."'");

					$this->session->set_tempdata('success','User type has been deleted successfully',3);
			}

			return true;
	}

	public function verifyOTP()
	{
				$otp=$_POST['txtOtp'];

				//print_r($_POST);

				$admin_user_id=$this->session->userdata('admin_id');

				$result=$this->db->query("SELECT sysmu_otp FROM tblmvbsysmainusers WHERE sysmu_id_pk='".$admin_user_id."'");
				$row=$result->result();


				//echo $row[0]->sysmu_otp.'=='.$otp;

				if($row[0]->sysmu_otp==$otp)
				{
						echo 'true';
				}
				else
				{
						echo 'false';
				}
	}


	public function getOTP()
	{
					$otp=  rand(1000, 9999);

					$admin_user_id=$this->session->userdata('admin_id');	

				    $msg1 = urlencode("OTP(One Time Password) is ".$otp.".");
                     
                    //$url1 = "http://trans.kapsystem.com/api/v3/index.php?method=sms&api_key=A474c43f4d3174a71ae8a4e7978ddacea&to=".$global_mobile_no."&sender=ITOKRI&message=".$msg1."&format=php&custom=1,2&flash=0";

                    // $url1="";


                    // $c = curl_init(); 
                    // curl_setopt($c, CURLOPT_URL, $url1); 
                    // curl_setopt($c, CURLOPT_HEADER, 1); // get the header 
                    // curl_setopt($c, CURLOPT_NOBODY, 1); // and *only* get the header 
                    // curl_setopt($c, CURLOPT_RETURNTRANSFER, 1); // get the response as a string from curl_exec(), rather than echoing it 
                    // curl_setopt($c, CURLOPT_FRESH_CONNECT, 1); // don't use a cached version of the url 
                    // if (!curl_exec($c)) { return false; } 

                    // $httpcode = curl_getinfo($c, CURLINFO_HTTP_CODE); 
                    // curl_close($c);

                    
                    $this->db->query("Update tblmvbsysmainusers set sysmu_otp='".$otp."' where sysmu_id_pk='".$admin_user_id."'");


                    //------------------------------ Start Save Transaction Logs ---------------------------//
			
					setSAActivityLogs('Transaction_activity','opt_in_export');

					//-------------------------------  End Save Transaction Logs ------------------------------//

					echo $otp;
	}


	

	public function selectLanguage()
	{
		$adminId=$this->session->userdata('admin_id');
		$language=$this->input->post('selLanguage');
	
		if($language!="")
		{
			$this->db->query("update tblmvbsysmainusers set sysmu_languageId_fk='".$language."' where sysmu_id_pk='".$adminId."'");
			setSAActivityLogs('Transaction_activity','userLanguage_change',"Language change User:-".$adminId." language".$language);
				
			$this->session->set_flashdata('success','Default Language Set');
			
		}

			redirect($this->agent->referrer());
	}


	public function verifyEmail()
	{
		$email_id=$_POST['txtEmail'];

		$result=$this->db->query("SELECT sysmu_id_pk,sysmu_languageId_fk,sysmu_username,sysmu_email,sysmu_mobile,sysmu_password,sysmu_empid,sysmu_userTypeId_fk FROM `tblmvbsysmainusers` WHERE sysmu_status='1'");
		$row=$result->result();
		
		for($i=0;$i < count($row);$i ++)
		{
				$user_email=$this->encryption->decrypt($row[$i]->sysmu_email);

				if($user_email == $email_id)
				{
						$status='false';						
				}				
		}

		if($status=='false')
		{
			echo 'false';
		}
		else
		{
			echo 'true';
		}
	}


	public function getStateListing()
	{
			$country_id=$_POST['countryId'];

			$result=$this->db->query("Select * from tblmvbstate where stat_countryId_fk='".$country_id."' and stat_status='1' and stat_delete='0'");

			$row=$result->result();
	?>
			<option value="">Select State</option>
	<?php		
			for($st=0;$st<count($row);$st++)
			{
	?>
					<option value="<?php echo $row[$st]->stat_id_pk;?>"><?php echo $row[$st]->stat_name;?></option>		
	?>	
	<?php	
			}
	}


	public function getLocationListing()
	{
			$state_id=$_POST['stateId'];

			$result=$this->db->query("Select * from tblmvbcity where cty_stateId_fk='".$state_id."' and cty_status='1' and cty_delete='0'");

			$row=$result->result();
	?>
			<option value="">Select City</option>
	<?php
		if(count($row)>0)
		{		
			for($st=0;$st<count($row);$st++)
			{
	?>
					<option value="<?php echo $row[$st]->cty_id_pk;?>"><?php echo $row[$st]->cty_name;?></option>		
	?>		
	<?php
			}
		}	
	}

}

