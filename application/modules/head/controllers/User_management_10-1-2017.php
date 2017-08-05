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
	
	}

	public function Checklogin()
	{
		if ($this->session->userdata('admin_email') == '')
		{
			redirect('head/');
		}
	
	}
	
	// ---Function used to load listing of system user --//
	public function index()
	{
		$this->Checklogin();
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
			} else
			{
				$this->session->set_flashdata('error','Unable to save user details.');
				redirect($this->agent->referrer());
			}
		} else
		{
			$data ['resultUsertype']=$this->user_management_model->getUsertypelist();
			$data ['resultLocations']=$this->user_management_model->getActiveLocations();
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
				$this->session->set_flashdata('success','User has been Updated successfully.');
				redirect('head/user_management');
			} else
			{
				$this->session->set_flashdata('error','Unable to Update user details.');
				redirect($this->agent->referrer());
			}
		} else
		{
			$data ['resultUser']=$this->user_management_model->getSpecificuser($id);
			$data ['resultUsertype']=$this->user_management_model->getAllusertype();
			$data ['resultLocations']=$this->user_management_model->getLocations();
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
				$this->session->set_flashdata('success','User has been deactivated successfully');
			} else
			{
				$this->session->set_flashdata('success','User has been activated successfully');
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
			
			$this->session->set_flashdata('success','User Password Reset successfully');
			echo true;
		} else
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
		
		
		
		?>
		   <div class="user_list_box">
					<div class="row">
						<div id="edit1" class="modal fade in" role="dialog">
							<div class="modal-dialog">
								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">×</button>
										<h2 class="modal-title text-center">
											<i class="fa fa-user"></i> Edit User
										</h2>
									</div>
									<div class="modal-body">
										<div class="portlet-body form">
											<form class=""  method="post" action="<?php echo base_url();?>head/user_management/editUser">
												<div class="form-body">
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label class="">User Type</label> 
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
																<label class="">User Name</label> <input type="text" value="<?php echo $resultUser[0]->sysmu_username; ?>" class="form-control" placeholder="User name" id="txtUsername" name="txtUsername" required>
													<input type="hidden" name="txtUserid" id="txtUserid"  value="<?php echo $resultUser[0]->sysmu_id_pk; ?>">
														<input type="hidden" name="txtEmployeeid" value="<?php echo $resultUser[0]->sysmu_empid; ?>">
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
															<?php 
															       $userMobile = $this->encryption->decrypt($resultUser[0]->sysmu_mobile);
																  ?>
																<label class="">Mobile No.</label> <input type="number" step="any" min="0" value="<?php echo $userMobile;?>" class="form-control" placeholder="Mobile No." id="txtMobile" name="txtMobile" required>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
															<?php 
												 $userEmail = $this->encryption->decrypt($resultUser[0]->sysmu_email);
												?>
																<label class="">Email Id</label> <input type="email" class="form-control" value="<?php echo  $userEmail;?>" placeholder="Email Id" id="txtEmail" readonly="readonly" name="txtEmail" autocomplete="off" onblur="getValidateemail(this.value)">
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label class="">Location</label><select class="form-control" id="selLocations" name="selLocations" required>
													            <option value="">Select Locations</option>
									                
									                <?php
									                    $loc="";
														for($i = 0; $i < count( $resultLocations ); $i ++)
														{
																										?>
									                   	<option value="<?php echo $resultLocations[$i]->cty_id_pk?>"
									                   	 <?php if($resultUser[0]->sysmu_location==$resultLocations[$i]->cty_id_pk) { echo "selected";
									                   	          $loc= $resultLocations[$i]->cty_name;
									                   	       }
									                   	        if($resultLocations[$i]->cty_status==0 && $resultUser[0]->sysmu_location!=$resultLocations[$i]->cty_id_pk) { echo "disabled";}
									                   	 ?>
									                   	><?php echo $resultLocations[$i]->cty_name?></option>
									                   	<?php
														}
														?>
												</select>
															</div>
														</div>
														<div class="col-md-6 col-sm-6">
															<div class="form-group">
																<label class="">Description</label>
																<textarea class="form-control" id="txtDescription" name="txtDescription" required><?php echo $resultUser[0]->sysmu_description;?></textarea>
															</div>
														</div>
														<div class="col-md-12 form-group">
															<div class="pull-right">
																<button type="submit" name="submit" class="btn btn-primary">Save</button>
																<button type="button" data-dismiss="modal" class="btn btn-danger">Cancel</button>
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
										<button type="button" class="close" data-dismiss="modal">×</button>
										<h2 class="modal-title text-center">
											<i class="fa fa-refresh"></i> Reset Password
										</h2>
									</div>
									<div class="modal-body" id="passwordModel">
										<div class="portlet-body form">
											<form class="" action="#" >
												<div class="form-body">
												
													<div class=" col-md-6">
														<div class="form-group">
															<div class="radio">
																<label> <input type="radio" name="optradio" id="auto_pwd" value="1" onclick="generateAutopassword()"> Generate Auto
																</label>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<div class="radio">
																<label> <input type="radio" name="optradio" id="manual_pwd" value="0"  onclick="generateManualpassword()"> Generate Manually
																</label>
															</div>
														</div>
													</div>
													<div class="manual" style="display: none;">
														<div class="col-md-6">
															<div class="form-group">
																<label>Password</label> <input type="text" class="form-control" name="txtPassword" id="txtPassword" placeholder="Enter Password">
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label>Confirm Password</label> <input type="text" autocomplete="off"  class="form-control" name="txtConfirmpassword" id="txtConfirmpassword" placeholder="Confirm your Password">
															</div>
														</div>
													</div>
													<div class="automatic" style="display: none;">
														<div class="col-md-12">
															<div class="form-group">
																<label>Password</label> <br> <label style="padding: 8px 0px 0 0;; color: #337ab7;" id="auto_pass_label"></label>
																<input type="hidden" id="txtAutopassword" name="txtAutopassword" >
																
															</div>
														</div>
													</div>
													<div class="modal-footer">
														<button type="button" onclick="validatePassword()" class="btn btn-primary">Save</button>
														<button type="button" data-dismiss="modal" class="btn btn-danger">Cancel</button>
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
												<a href="<?php echo base_url()?>head/user_management/addUser" id="sample_editable_1_new hvr-float-shadow" class="btn btn-primary" data-title="Add Contact">+</a>
												<ul class="nav navbar-nav pl0 pull-right" style="margin-left: 5px;">
													<li class="dropdown dropdown-user burger_menu"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
														data-close-others="true" style="margin-top: 0px;"><i class="fa fa-bars fa-2x" aria-hidden="true"></i> </a>
														<ul class="dropdown-menu dropdown-menu-default">
															<li class="options"  style="border-bottom: 1px solid #e7ecf1;"><a  onclick="chechProfileCheckbox(1)" href="#" title="Custom Fields" style="padding: 5px; margin-top: 5px;">Active</a></li>
															<li class="options"><a href="#" onclick="chechProfileCheckbox(0)" title="Custom Fields" style="padding: 5px; margin-top: 5px;">Deactive</a></li>
															<li class="options"><a href="#" onclick="resetUserListingpassword()" title="Custom Fields" style="padding: 5px; margin-top: 5px;">Reset Password</a></li>
														</ul></li>
												</ul>
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
												<li><i class="fa fa-group" aria-hidden="true"></i> 101</li>
												<li><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $loc;?></li>
											</ul>
										</div>
									</div>
									<div class="col-md-3 pd0">
										<div class="btn-group pull-right">
											<a href="#" id="sample_editable_1_new hvr-float-shadow" data-toggle="modal" data-target="#edit1" class="btn btn-primary">Edit</a> <a
												class="btn  blue btn-primary btn-circle" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false"
												style="margin-left: 5px;"> More <i class="fa fa-angle-down"></i>
											</a>
											<div class="dropdown-menu dropdown-checkboxes pull-right">
												<li class="options" style="border-bottom: 1px solid #e7ecf1;"><a data-toggle="modal" data-target="#reset_pwd"
													style="padding-top: 0px; margin-top: 5px; padding-left: 0px;">Reset Password</a></li>
												<li class="options" style="border-bottom: 1px solid #e7ecf1;"><a data-toggle="modal" onclick="chechSpecificCheckbox(1,'<?php echo $resultUser[0]->sysmu_id_pk; ?>')"  data-target="#" style="padding-top: 0px; margin-top: 5px; padding-left: 0px;">Active</a>
												</li>
												<li class="options"><a data-toggle="modal" data-target="#" onclick="chechSpecificCheckbox(0,'<?php echo $resultUser[0]->sysmu_id_pk; ?>')" style="padding-top: 0px; margin-top: 5px; padding-left: 0px;">Deactive</a></li>
											</div>
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
												<li class="active"><a href="#Package" id="tab2" data-toggle="tab" aria-expanded="true">History</a></li>
												<li><a href="#activity_tab" id="tab_act" data-toggle="tab" aria-expanded="true">Activity</a></li>
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
																				<th>Total Client</th>
																				<th>Total Rev. For New A/c</th>
																				<th>Total Rev. on Recharge</th>
																				<th>Total SMS Qty Purchansed</th>
																				<th>Total Email Qty Purchansed</th>
																			</tr>
																		</thead>
																		<tr>
																			<td class="fit"><img class="user-pic" src="../assets/pages/media/users/avatar3.jpg"></td>
																			<td><a href="javascript:;" class="primary-link">Nick Larson</a></td>
																			<td>$345</td>
																			<td>45</td>
																			<td>124</td>
																			<td><span class="bold theme-font">80%</span></td>
																		</tr>
																		<tr>
																			<td class="fit"><img class="user-pic" src="../assets/pages/media/users/avatar3.jpg"></td>
																			<td><a href="javascript:;" class="primary-link">Nick Larson</a></td>
																			<td>$560</td>
																			<td>12</td>
																			<td>24</td>
																			<td><span class="bold theme-font">67%</span></td>
																		</tr>
																		<tr>
																			<td class="fit"><img class="user-pic" src="../assets/pages/media/users/avatar3.jpg"></td>
																			<td><a href="javascript:;" class="primary-link">Nick Larson</a></td>
																			<td>$1,345</td>
																			<td>450</td>
																			<td>46</td>
																			<td><span class="bold theme-font">98%</span></td>
																		</tr>
																		<tr>
																			<td class="fit"><img class="user-pic" src="../assets/pages/media/users/avatar3.jpg"></td>
																			<td><a href="javascript:;" class="primary-link">Nick Larson</a></td>
																			<td>$645</td>
																			<td>50</td>
																			<td>89</td>
																			<td><span class="bold theme-font">58%</span></td>
																		</tr>
																	</table>
																</div>
															</div>
														</div>
														<div class="">
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
															<ul class="pagination pagination-sm pull-right" style="margin-top: 23px;">
																<li><a href="javascript:;"> <i class="fa fa-angle-left"></i>
																</a></li>
																<li><a href="javascript:;"> 1 </a></li>
																<li class="active"><a href="javascript:;"> 2 </a></li>
																<li><a href="javascript:;"> 3 </a></li>
																<li><a href="javascript:;"> 4 </a></li>
																<li><a href="javascript:;"> 5 </a></li>
																<li><a href="javascript:;"> 6 </a></li>
																<li><a href="javascript:;"> <i class="fa fa-angle-right"></i>
																</a></li>
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
		$password=$this->input->post('password');
		
	
		if ($userid !="")
		{
			    $password=$this->encryption->encrypt($password);
				$data=array('sysmu_password'=>$password);
				$this->db->where('sysmu_id_pk',$userid);
				$this->db->update('tblmvbsysmainusers',$data);
			
				
		} else
		{
				
			
			echo false;
		}
		
	}
	
	

}