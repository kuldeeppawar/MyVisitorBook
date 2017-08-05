<div class="page-content-wrapper">
	<div class="page-content">
		<div class="row">
			<div class="col-md-12">
				<div class=" app-ticket-list">
					<div class="page-bar row">
						<div class="col-md-6">
							<h3 class="page-title"><?php getLocalkeyword('Add New User');?></h3>
							<ul class="page-breadcrumb ">
								<li><a href="<?php echo base_url()?>admin/dashboard"><?php getLocalkeyword('Home');?></a> <i class="fa fa-circle"></i></li>
								<li><span><?php getLocalkeyword('User Management');?></span> <i class="fa fa-circle"></i></li>
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
							<div class="table-toolbar">
								<div class="row">
									<?php
									
									if ($this->session->flashdata('success'))
									{
										?>
										<div id="prefix_834140561262" class="custom-alerts alert alert-success fade in ">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
											<?php echo $this->session->flashdata('success');?>
										</div>
										<?php
									} else if ($this->session->flashdata('error'))
									{
										?>
											<div id="prefix_1445089440962" class="custom-alerts alert alert-danger fade in">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
												<?php echo $this->session->flashdata('error');?>
											</div>
											<?php }    ?>
											<div class="col-md-3">
												<ul class="nav navbar-nav pl0">
													<li class="dropdown dropdown-user"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" style="font-size: 18px; padding: 2px 0px;"> Recently updated <i class="fa fa-angle-down"></i> </span></a>
														<ul class="dropdown-menu dropdown-menu-default">
															<li><a href="#">All Contacts</a></li>
															<li><a href="#">My Contacts </a></li>
															<li><a href="#">Recently viewed</a></li>
															<li><a href="#">Not updated in 30 Days</a></li>
														</ul>
													</li>
												</ul>
											</div>
											<div class="col-md-5 pull-right">
												<div class="pull-right">
													<div style="float: left; margin-top: 8px; margin-right: 5px;">
														<a href="#" class="margin_rgt"><i class="fa fa-eye icon_custom " id="sb2" aria-hidden="true" title="View"></i></a>
														<?php
												if (getAdminAccessRights('mvbUseredit'))
												{
													?>

															<a href="#" onclick="getUserdetails()" class="margin_rgt " id="sb3"><i class="fa fa-pencil-square-o icon_custom" aria-hidden="true" title="Edit"></i> </a>
															<?php
												}
												if (getAdminAccessRights('mvbUsersendsms'))
												{
													?>
																<a href="#" onclick="send_sms()" class="margin_rgt p_element1"><img src="<?php echo base_url()?>themes/assets/sms.png" height="22" title="Send SMS" /></a>
																<?php
												}
												if (getAdminAccessRights('mvbUsersendemail'))
												{
													?>
																	<a href="#" onclick="send_email()" class="margin_rgt p_element1"> <i class="fa fa-envelope-o fa-2x" title="Send Email" style="color: #828282;"></i></a>
																	<?php
												}
												?>
													</div>
													<!--<a href="#"> Import </a> / <a href="#"> Export  </a> -->
													<div class="btn-group" style="margin-left: 5px;">
														<?php
												if (getAdminAccessRights('mvbUseradd'))
												{
													?>
															<a href="<?php echo base_url()?>admin/user_management/addUser" id="sample_editable_1_new hvr-float-shadow" class="btn btn-primary">
																<?php getLocalkeyword('Add New User');?>
															</a>
															<?php
												}
												?>
													</div>
													<ul class="nav navbar-nav pl0 pull-right" style="margin-left: 7px;">
														<li class="dropdown dropdown-user burger_menu"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" style="margin-top: 0px;"><i
														class="fa fa-bars fa-2x" aria-hidden="true"
													></i> </a>
															<ul class="dropdown-menu dropdown-menu-default">
																<?php
														if (getAdminAccessRights('mvbUseractive'))
														{
															?>
																	<li class="options" style="border-bottom: 1px solid #e7ecf1;"><a href="#" onclick="chechCheckbox(1);" title="Custom Fields" style="margin-top: 5px; padding: 0px 5px;"><?php getLocalkeyword('Active');?></a></li>
																	<?php
														}
														
														if (getAdminAccessRights('mvbUserdeactive'))
														{
															?>

																		<li class="options" style="border-bottom: 1px solid #e7ecf1;"><a href="#" onclick="chechCheckbox(0);" title="Custom Fields" style="padding-top: 0px; margin-top: 5px; padding-left: 7px;"><?php getLocalkeyword('Deactive');?></a></li>
																		<?php
														}
														
														if (getAdminAccessRights('mvbUserresetPassword'))
														{
															?>

																			<li class="options"><a href="#" title="" onclick="resetUserpassword();" style="padding-top: 0px; margin-top: 5px; padding-left: 7px;"><?php getLocalkeyword('Reset Password');?></a></li>
																			<?php
														}
														?>
															</ul>
														</li>
													</ul>
													<div id="myModal_m" class="modal fade" role="dialog">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal">×</button>
																	<h2 class="modal-title text-center">
																		<i class="fa fa-trash"></i> Are you sure to Delete?
																	</h2>
																</div>
																<div class="modal-footer">
																	<a href class="btn btn-primary">Yes</a>
																	<button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
																</div>
															</div>
														</div>
													</div>
													<div id="send_sms" class="modal fade" role="dialog">
														<div class="modal-dialog">
															<div class="col-md-10">
																<div class="modal-content">
																	<div class="modal-header">
																		<button type="button" class="close" data-dismiss="modal">&times;</button>
																		<h2 class="modal-title text-center">
																			<i class="fa fa-envelope"></i> Send SMS
																		</h2>
																	</div>
																	<div class="modal-body">
																		<div class="portlet-body form">
																			<form role="form">
																				<div class="form-body">
																					<div class="row">
																						<div class="col-md-12">
																							<div class="form-group">
																								<label>Mobile no. <span class="mandatory"></span></label> <input type="text" class="form-control" value="9876548965" readonly>
																							</div>
																							<div class="form-group">
																								<label>Message <span class="mandatory"></span></label>
																								<textarea class="form-control" rows="4"></textarea>
																							</div>
																						</div>
																					</div>
																				</div>
																			</form>
																		</div>
																	</div>
																	<div class="modal-footer">
																		<button type="button" class="btn btn-primary">Send SMS</button>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div id="send_sms1" class="modal fade" role="dialog">
														<div class="modal-dialog">
															<div class="col-md-10">
																<div class="modal-content">
																	<div class="modal-header">
																		<button type="button" class="close" data-dismiss="modal">&times;</button>
																		<h2 class="modal-title text-center">
																			<i class="fa fa-envelope-o"></i> Send SMS
																		</h2>
																	</div>
																	<div class="modal-body">
																		<div class="portlet-body form">
																			<form role="form">
																				<div class="form-body">
																					<div class="row">
																						<div class="col-md-12">
																							<div class="form-group">
																								<label>Mobile no. <span class="mandatory"></span></label> <input type="text" class="form-control" value="9876548965" readonly>
																							</div>
																							<div class="form-group">
																								<label>Message <span class="mandatory"></span></label>
																								<textarea class="form-control" rows="4"></textarea>
																							</div>
																							<div class="modal-footer">
																								<button type="button" class="btn btn-primary">Send SMS</button>
																							</div>
																						</div>
																					</div>
																				</div>
																			</form>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div id="send_email" class="modal fade" role="dialog">
														<div class="modal-dialog">
															<!-- Modal content-->
															<div class="col-md-10">
																<div class="modal-content">
																	<div class="modal-header">
																		<button type="button" class="close" data-dismiss="modal">&times;</button>
																		<h2 class="modal-title text-center">
																			<i class="fa fa-envelope-o"></i> Send Email
																		</h2>
																	</div>
																	<div class="modal-body">
																		<div class="portlet-body form">
																			<form role="form">
																				<div class="form-body">
																					<div class="row">
																						<div class="col-md-12">
																							<div class="form-group">
																								<label>Email-id <span class="mandatory"></span></label> <input type="text" class="form-control" value="abc@gmail.com" readonly>
																							</div>
																							<div class="form-group">
																								<label>Subject <span class="mandatory"></span></label> <input type="text" class="form-control">
																							</div>
																							<div class="form-group">
																								<label>Message <span class="mandatory"></span></label>
																								<textarea class="form-control" rows="4"></textarea>
																							</div>
																						</div>
																					</div>
																				</div>
																			</form>
																		</div>
																	</div>
																	<div class="modal-footer">
																		<button type="button" class="btn btn-primary">Send Email</button>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div id="send_email1" class="modal fade" role="dialog">
														<div class="modal-dialog">
															<!-- Modal content-->
															<div class="col-md-10">
																<div class="modal-content">
																	<div class="modal-header">
																		<button type="button" class="close" data-dismiss="modal">&times;</button>
																		<h2 class="modal-title text-center">
																			<i class="fa fa-envelope-o"></i> Send Email
																		</h2>
																	</div>
																	<div class="modal-body">
																		<div class="portlet-body form">
																			<form role="form">
																				<div class="form-body">
																					<div class="row">
																						<div class="col-md-12">
																							<div class="form-group">
																								<label>Email-id <span class="mandatory"></span></label> <input type="text" class="form-control" value="abc@gmail.com" readonly>
																							</div>
																							<div class="form-group">
																								<label>Subject <span class="mandatory"></span></label> <input type="text" class="form-control">
																							</div>
																							<div class="form-group">
																								<label>Message <span class="mandatory"></span></label>
																								<textarea class="form-control" rows="4"></textarea>
																							</div>
																							<div class="modal-footer">
																								<button type="button" class="btn btn-primary">Send Email</button>
																							</div>
																						</div>
																					</div>
																				</div>
																			</form>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div id="comment" class="modal fade" role="dialog">
														<div class="modal-dialog">
															<!-- Modal content-->
															<div class="col-md-10">
																<div class="modal-content">
																	<div class="modal-header">
																		<button type="button" class="close" data-dismiss="modal">&times;</button>
																		<h2 class="modal-title text-center">Send Comment</h2>
																	</div>
																	<div class="modal-body">
																		<div class="portlet-body form">
																			<form role="form">
																				<div class="form-body">
																					<div class="row">
																						<div class="col-md-12">
																							<div class="form-group">
																								<label>Comment <span class="mandatory"></span></label>
																								<textarea class="form-control" rows="4"></textarea>
																							</div>
																							<div class="form-group">
																								<button type="button" class="btn btn-primary">Add Comment</button>
																							</div>
																						</div>
																					</div>
																				</div>
																			</form>
																		</div>
																	</div>
																	<div class="modal-footer">
																		<table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_2">
																			<thead>
																				<th>Comment</th>
																				<th>Added on</th>
																			</thead>
																			<tbody>
																				<tr>
																					<td>test</td>
																					<td>2016-08-17 <span>18:25:10</span></td>
																				</tr>
																			</tbody>
																		</table>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div id="myModal" class="modal fade" role="dialog">
														<div class="modal-dialog">
															<div class="modal-content" style="height: 600px; overflow: auto;">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal">&times;</button>
																	<h2 class="modal-title text-center">Add New Visitor</h2>
																</div>
																<div class="modal-body">
																	<div class="portlet-body form">
																		<form role="form">
																			<div class="form-body">
																				<div class="form-group">
																					<label>Select Title <span class="mandatory">*</span></label> <select class="form-control">
																				<option>Option 1</option>
																				<option>Option 2</option>
																				<option>Option 3</option>
																				<option>Option 4</option>
																				<option>Option 5</option>
																			</select>
																				</div>
																				<div class="row">
																					<div class="col-md-4">
																						<div class="form-group">
																							<div class="form-group">
																								<label>First name <span class="mandatory">*</span></label> <input type="text" class="form-control input-sm" placeholder="First name">
																							</div>
																						</div>
																					</div>
																					<div class="col-md-4">
																						<div class="form-group">
																							<div class="form-group">
																								<label>Middle Name <span class="mandatory">*</span></label> <input type="text" class="form-control input-sm" placeholder="Middle Name">
																							</div>
																						</div>
																					</div>
																					<div class="col-md-4">
																						<div class="form-group">
																							<div class="form-group">
																								<label>Last Name <span class="mandatory">*</span></label> <input type="text" class="form-control input-sm" placeholder="Last Name">
																							</div>
																						</div>
																					</div>
																				</div>
																				<div class="form-group">
																					<label>Mobile Number <span class="mandatory">*</span></label> <input type="text" class="form-control input-sm" placeholder="Mobile Number">
																				</div>
																				<div class="form-group">
																					<label>Email Id <span class="mandatory">*</span></label> <input type="text" class="form-control input-sm" placeholder="Email Id">
																				</div>
																				<div class="row">
																					<div class="col-md-8">
																						<div class="form-group">
																							<label>Contact Group</label> <select class="form-control">
																						<option>Option 1</option>
																						<option>Option 2</option>
																						<option>Option 3</option>
																						<option>Option 4</option>
																						<option>Option 5</option>
																					</select>
																						</div>
																					</div>
																					<div class="col-md-4">
																						<div class="btn btn-info btn-lg btn-group">
																							<a href="create_visitor.html">
																								<button id="sample_editable_1_new" class=" btn-primary" style="margin-top: 30px; margin-left: 15px;">
																							<i class="fa fa-plus"></i> Add New Visitor
																						</button>
																							</a>
																						</div>
																					</div>
																				</div>
																				<div class="form-group">
																					<label>Select bussiness category</label> <select class="form-control">
																				<option>Option 1</option>
																				<option>Option 2</option>
																				<option>Option 3</option>
																				<option>Option 4</option>
																				<option>Option 5</option>
																			</select>
																				</div>
																				<div class="form-group">
																					<label>Business Name</label> <input type="text" class="form-control input-sm" placeholder="Business Name">
																				</div>
																				<div class="form-group">
																					<label>Address</label> <input type="text" class="form-control input-sm" placeholder="Address">
																				</div>
																				<div class="form-group">
																					<label>Website</label> <input type="text" class="form-control input-sm" placeholder="Website URL">
																				</div>
																				<div class="form-group">
																					<label>Country</label> <select class="form-control">
																				<option>Option 1</option>
																				<option>Option 2</option>
																				<option>Option 3</option>
																				<option>Option 4</option>
																				<option>Option 5</option>
																			</select>
																				</div>
																				<div class="form-group">
																					<label>State</label> <select class="form-control">
																				<option>Option 1</option>
																				<option>Option 2</option>
																				<option>Option 3</option>
																				<option>Option 4</option>
																				<option>Option 5</option>
																			</select>
																				</div>
																				<div class="form-group">
																					<label>City</label> <select class="form-control">
																				<option>Option 1</option>
																				<option>Option 2</option>
																				<option>Option 3</option>
																				<option>Option 4</option>
																				<option>Option 5</option>
																			</select>
																				</div>
																				<div class="form-group">
																					<label>Zip Code</label> <input type="text" class="form-control input-sm" placeholder="Zip Code">
																				</div>
																				<div class="form-group">
																					<label>Landline No</label> <input type="text" class="form-control input-sm" placeholder="landline No">
																				</div>
																				<div class="form-group">
																					<label>Fax</label> <input type="text" class="form-control input-sm" placeholder="Fax">
																				</div>
																				<div class="col-md-6">
																					<label>DOB</label>
																					<div class="form-group">
																						<div class="input-group input-medium date date-picker" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
																							<input type="text" class="form-control" readonly> <span class="input-group-btn">
																						<button class="btn default" type="button">
																							<i class="fa fa-calendar"></i>
																						</button>
																					</span>
																						</div>
																						<!-- /input-group -->
																					</div>
																				</div>
																				<div class="col-md-6">
																					<label>Aniversary Date</label>
																					<div class="form-group">
																						<div class="input-group input-medium date date-picker" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
																							<input type="text" class="form-control" readonly> <span class="input-group-btn">
																						<button class="btn default" type="button">
																							<i class="fa fa-calendar"></i>
																						</button>
																					</span>
																						</div>
																						<!-- /input-group -->
																					</div>
																				</div>
																				<div class="form-group">
																					<label>Note</label>
																					<textarea class="form-control" rows="3" placeholder="Type Note">                                                   </textarea>
																				</div>
																			</div>
																		</form>
																	</div>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-primary">Save</button>
																	<button type="button" class="btn btn-danger">Cancel</button>
																</div>
															</div>
														</div>
													</div>
													<!-- modal ends -->
												</div>
											</div>
								</div>
								<div class="selected_rows">
									<font id="show_checkbox_selected"></font>
									<a id="selectall"><?php getLocalkeyword('select all');?></a>
								</div>
								<div class="portlet light">
									<div class="portlet-body">
										<table class="table table-striped table-bordered table-hover table-checkable order-column dataTable allchekbox" id="sample_1_2" role="grid" aria-describedby="sample_1_2_info">
											<thead>
												<tr>
													<th style="width: 35px;"><input type="checkbox" id="checkall" data-set="" name="all" /> <span id="growl-primary1"></span></th>
													<th><?php getLocalkeyword('Branch Name');?></th>
													<th><?php getLocalkeyword('User Type');?></th>
													<th><?php getLocalkeyword('User Name');?></th>
													<th><?php getLocalkeyword('Mobile No');?></th>
													<th><?php getLocalkeyword('Email Id Login Id');?></th>
													<th><?php getLocalkeyword('Location');?></th>
													<th><?php getLocalkeyword('Status');?></th>
												</tr>
											</thead>
											<tbody>
												<?php 	for($i=0;$i<count($resultUser);$i++)			
											       {		
											       	 $j=$i+1;	?>
												<tr class="odd gradeX">
													<td><input name="chk<?php echo $j;?>" class="check_box" type="checkbox" data-ptag="sb1" id="chk<?php echo $j;?>" value="<?php echo $resultUser[$i]->sysu_id_pk;?>"></td>
													<td>
														<?php echo $resultUser[$i]->brn_name;?>
													</td>
													<td>
														<?php echo $resultUser[$i]->utyp_userType;?>
													</td>
													<td>
														<?php echo $resultUser[$i]->sysu_name;?>
													</td>
													<td>
														<?php  echo  $this->encryption->decrypt($resultUser[$i]->sysu_mobile);?>
													</td>
													<td>
														<?php  echo  $this->encryption->decrypt($resultUser[$i]->sysu_email);?>
													</td>
													<td>
														<?php  echo $resultUser[$i]->cty_name; ?>
													</td>
													<td>
														<?php
												
												if ($resultUser[$i]->sysu_status)
												{
													echo "Active";
												} else
												{
													echo "Deactive";
												}
												?>
													</td>
												</tr>
												<?php
											}
											?>

											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
		<!-- END DASHBOARD STATS 1-->
	</div>
</div>
</div>
</div>
<a href="javascript:;" class="page-quick-sidebar-toggler"> <i class="icon-login"></i></a>
<div class="page-quick-sidebar-wrapper" data-close-on-body-click="false">
	<div class="page-quick-sidebar">
		<ul class="nav nav-tabs">
			<li class="active"><a href="javascript:;" data-target="#quick_sidebar_tab_1" data-toggle="tab"> Users <span class="badge badge-danger">2</span>
			</a></li>
			<li><a href="javascript:;" data-target="#quick_sidebar_tab_2" data-toggle="tab"> Alerts <span class="badge badge-success">7</span>
			</a></li>
			<li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> More <i class="fa fa-angle-down"></i>
			</a>
				<ul class="dropdown-menu pull-right">
					<li>
						<a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab"> <i class="icon-bell"></i> Alerts
						</a>
					</li>
					<li>
						<a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab"> <i class="icon-info"></i> Notifications
						</a>
					</li>
					<li>
						<a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab"> <i class="icon-speech"></i> Activities
						</a>
					</li>
					<li class="divider"></li>
					<li>
						<a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab"> <i class="icon-settings"></i> Settings
						</a>
					</li>
				</ul>
			</li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane active page-quick-sidebar-chat" id="quick_sidebar_tab_1">
				<div class="page-quick-sidebar-chat-users" data-rail-color="#ddd" data-wrapper-class="page-quick-sidebar-list">
					<h3 class="list-heading">Staff</h3>
					<ul class="media-list list-items">
						<li class="media">
							<div class="media-status">
								<span class="badge badge-success">8</span>
							</div> <img class="media-object" src="../assets/layouts/layout/img/avatar3.jpg" alt="...">
							<div class="media-body">
								<h4 class="media-heading">Bob Nilson</h4>
								<div class="media-heading-sub">Project Manager</div>
							</div>
						</li>
						<li class="media"><img class="media-object" src="../assets/layouts/layout/img/avatar1.jpg" alt="...">
							<div class="media-body">
								<h4 class="media-heading">Nick Larson</h4>
								<div class="media-heading-sub">Art Director</div>
							</div>
						</li>
						<li class="media">
							<div class="media-status">
								<span class="badge badge-danger">3</span>
							</div> <img class="media-object" src="../assets/layouts/layout/img/avatar4.jpg" alt="...">
							<div class="media-body">
								<h4 class="media-heading">Deon Hubert</h4>
								<div class="media-heading-sub">CTO</div>
							</div>
						</li>
						<li class="media"><img class="media-object" src="../assets/layouts/layout/img/avatar2.jpg" alt="...">
							<div class="media-body">
								<h4 class="media-heading">Ella Wong</h4>
								<div class="media-heading-sub">CEO</div>
							</div>
						</li>
					</ul>
					<h3 class="list-heading">Customers</h3>
					<ul class="media-list list-items">
						<li class="media">
							<div class="media-status">
								<span class="badge badge-warning">2</span>
							</div> <img class="media-object" src="../assets/layouts/layout/img/avatar6.jpg" alt="...">
							<div class="media-body">
								<h4 class="media-heading">Lara Kunis</h4>
								<div class="media-heading-sub">CEO, Loop Inc</div>
								<div class="media-heading-small">Last seen 03:10 AM</div>
							</div>
						</li>
						<li class="media">
							<div class="media-status">
								<span class="label label-sm label-success">new</span>
							</div> <img class="media-object" src="../assets/layouts/layout/img/avatar7.jpg" alt="...">
							<div class="media-body">
								<h4 class="media-heading">Ernie Kyllonen</h4>
								<div class="media-heading-sub">
									Project Manager, <br> SmartBizz PTL
								</div>
							</div>
						</li>
						<li class="media"><img class="media-object" src="../assets/layouts/layout/img/avatar8.jpg" alt="...">
							<div class="media-body">
								<h4 class="media-heading">Lisa Stone</h4>
								<div class="media-heading-sub">CTO, Keort Inc</div>
								<div class="media-heading-small">Last seen 13:10 PM</div>
							</div>
						</li>
						<li class="media">
							<div class="media-status">
								<span class="badge badge-success">7</span>
							</div> <img class="media-object" src="../assets/layouts/layout/img/avatar9.jpg" alt="...">
							<div class="media-body">
								<h4 class="media-heading">Deon Portalatin</h4>
								<div class="media-heading-sub">CFO, H&D LTD</div>
							</div>
						</li>
						<li class="media"><img class="media-object" src="../assets/layouts/layout/img/avatar10.jpg" alt="...">
							<div class="media-body">
								<h4 class="media-heading">Irina Savikova</h4>
								<div class="media-heading-sub">CEO, Tizda Motors Inc</div>
							</div>
						</li>
						<li class="media">
							<div class="media-status">
								<span class="badge badge-danger">4</span>
							</div> <img class="media-object" src="../assets/layouts/layout/img/avatar11.jpg" alt="...">
							<div class="media-body">
								<h4 class="media-heading">Maria Gomez</h4>
								<div class="media-heading-sub">Manager, Infomatic Inc</div>
								<div class="media-heading-small">Last seen 03:10 AM</div>
							</div>
						</li>
					</ul>
				</div>
				<div class="page-quick-sidebar-item">
					<div class="page-quick-sidebar-chat-user">
						<div class="page-quick-sidebar-nav">
							<a href="javascript:;" class="page-quick-sidebar-back-to-list"> <i class="icon-arrow-left"></i>Back
							</a>
						</div>
						<div class="page-quick-sidebar-chat-user-messages">
							<div class="post out">
								<img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
								<div class="message">
									<span class="arrow"></span> <a href="javascript:;" class="name">Bob Nilson</a> <span class="datetime">20:15</span> <span class="body"> When could you send me the report ? </span>
								</div>
							</div>
							<div class="post in">
								<img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />
								<div class="message">
									<span class="arrow"></span> <a href="javascript:;" class="name">Ella Wong</a> <span class="datetime">20:15</span> <span class="body"> Its almost done. I will be sending it shortly </span>
								</div>
							</div>
							<div class="post out">
								<img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
								<div class="message">
									<span class="arrow"></span> <a href="javascript:;" class="name">Bob Nilson</a> <span class="datetime">20:15</span> <span class="body"> Alright. Thanks! :) </span>
								</div>
							</div>
							<div class="post in">
								<img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />
								<div class="message">
									<span class="arrow"></span> <a href="javascript:;" class="name">Ella Wong</a> <span class="datetime">20:16</span> <span class="body"> You are most welcome. Sorry for the delay. </span>
								</div>
							</div>
							<div class="post out">
								<img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
								<div class="message">
									<span class="arrow"></span> <a href="javascript:;" class="name">Bob Nilson</a> <span class="datetime">20:17</span> <span class="body"> No probs. Just take your time :) </span>
								</div>
							</div>
							<div class="post in">
								<img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />
								<div class="message">
									<span class="arrow"></span> <a href="javascript:;" class="name">Ella Wong</a> <span class="datetime">20:40</span> <span class="body"> Alright. I just emailed it to you. </span>
								</div>
							</div>
							<div class="post out">
								<img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
								<div class="message">
									<span class="arrow"></span> <a href="javascript:;" class="name">Bob Nilson</a> <span class="datetime">20:17</span> <span class="body"> Great! Thanks. Will check it right away. </span>
								</div>
							</div>
							<div class="post in">
								<img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />
								<div class="message">
									<span class="arrow"></span> <a href="javascript:;" class="name">Ella Wong</a> <span class="datetime">20:40</span> <span class="body"> Please let me know if you have any comment. </span>
								</div>
							</div>
							<div class="post out">
								<img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
								<div class="message">
									<span class="arrow"></span> <a href="javascript:;" class="name">Bob Nilson</a> <span class="datetime">20:17</span> <span class="body"> Sure. I will check and buzz you if anything needs to be
										corrected. </span>
								</div>
							</div>
						</div>
						<div class="page-quick-sidebar-chat-user-form">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Type a message here...">
								<div class="input-group-btn">
									<button type="button" class="btn green">
										<i class="icon-paper-clip"></i>
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane page-quick-sidebar-alerts" id="quick_sidebar_tab_2">
				<div class="page-quick-sidebar-alerts-list">
					<h3 class="list-heading">General</h3>
					<ul class="feeds list-items">
						<li>
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-info">
											<i class="fa fa-check"></i>
										</div>
									</div>
									<div class="cont-col2">
										<div class="desc">
											You have 4 pending tasks. <span class="label label-sm label-warning "> Take action <i class="fa fa-share"></i>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date">Just now</div>
							</div>
						</li>
						<li>
							<a href="javascript:;">
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-success">
												<i class="fa fa-bar-chart-o"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc">Finance Report for year 2013 has been released.</div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date">20 mins</div>
								</div>
							</a>
						</li>
						<li>
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-danger">
											<i class="fa fa-user"></i>
										</div>
									</div>
									<div class="cont-col2">
										<div class="desc">You have 5 pending membership that requires a quick review.</div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date">24 mins</div>
							</div>
						</li>
						<li>
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-info">
											<i class="fa fa-shopping-cart"></i>
										</div>
									</div>
									<div class="cont-col2">
										<div class="desc">
											New order received with <span class="label label-sm label-success"> Reference Number: DR23923 </span>
										</div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date">30 mins</div>
							</div>
						</li>
						<li>
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-success">
											<i class="fa fa-user"></i>
										</div>
									</div>
									<div class="cont-col2">
										<div class="desc">You have 5 pending membership that requires a quick review.</div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date">24 mins</div>
							</div>
						</li>
						<li>
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-info">
											<i class="fa fa-bell-o"></i>
										</div>
									</div>
									<div class="cont-col2">
										<div class="desc">
											Web server hardware needs to be upgraded. <span class="label label-sm label-warning"> Overdue </span>
										</div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date">2 hours</div>
							</div>
						</li>
						<li>
							<a href="javascript:;">
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-default">
												<i class="fa fa-briefcase"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc">IPO Report for year 2013 has been released.</div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date">20 mins</div>
								</div>
							</a>
						</li>
					</ul>
					<h3 class="list-heading">System</h3>
					<ul class="feeds list-items">
						<li>
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-info">
											<i class="fa fa-check"></i>
										</div>
									</div>
									<div class="cont-col2">
										<div class="desc">
											You have 4 pending tasks. <span class="label label-sm label-warning "> Take action <i class="fa fa-share"></i>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date">Just now</div>
							</div>
						</li>
						<li>
							<a href="javascript:;">
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-danger">
												<i class="fa fa-bar-chart-o"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc">Finance Report for year 2013 has been released.</div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date">20 mins</div>
								</div>
							</a>
						</li>
						<li>
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-default">
											<i class="fa fa-user"></i>
										</div>
									</div>
									<div class="cont-col2">
										<div class="desc">You have 5 pending membership that requires a quick review.</div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date">24 mins</div>
							</div>
						</li>
						<li>
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-info">
											<i class="fa fa-shopping-cart"></i>
										</div>
									</div>
									<div class="cont-col2">
										<div class="desc">
											New order received with <span class="label label-sm label-success"> Reference Number: DR23923 </span>
										</div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date">30 mins</div>
							</div>
						</li>
						<li>
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-success">
											<i class="fa fa-user"></i>
										</div>
									</div>
									<div class="cont-col2">
										<div class="desc">You have 5 pending membership that requires a quick review.</div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date">24 mins</div>
							</div>
						</li>
						<li>
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-warning">
											<i class="fa fa-bell-o"></i>
										</div>
									</div>
									<div class="cont-col2">
										<div class="desc">
											Web server hardware needs to be upgraded. <span class="label label-sm label-default "> Overdue </span>
										</div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date">2 hours</div>
							</div>
						</li>
						<li>
							<a href="javascript:;">
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-info">
												<i class="fa fa-briefcase"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc">IPO Report for year 2013 has been released.</div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date">20 mins</div>
								</div>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="tab-pane page-quick-sidebar-settings" id="quick_sidebar_tab_3">
				<div class="page-quick-sidebar-settings-list">
					<h3 class="list-heading">General Settings</h3>
					<ul class="list-items borderless">
						<li>Enable Notifications <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default"
							 data-off-text="OFF">
						</li>
						<li>Allow Tracking <input type="checkbox" class="make-switch" data-size="small" data-on-color="info" data-on-text="ON" data-off-color="default" data-off-text="OFF">
						</li>
						<li>Log Errors <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF">
						</li>
						<li>Auto Sumbit Issues <input type="checkbox" class="make-switch" data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF">
						</li>
						<li>Enable SMS Alerts <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF">
						</li>
					</ul>
					<h3 class="list-heading">System Settings</h3>
					<ul class="list-items borderless">
						<li>Security Level <select class="form-control input-inline input-sm input-small">
								<option value="1">Normal</option>
								<option value="2" selected>Medium</option>
								<option value="e">High</option>
						</select>
						</li>
						<li>Failed Email Attempts <input class="form-control input-inline input-sm input-small" value="5" />
						</li>
						<li>Secondary SMTP Port <input class="form-control input-inline input-sm input-small" value="3560" />
						</li>
						<li>Notify On System Error <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default"
							 data-off-text="OFF">
						</li>
						<li>Notify On SMTP Error <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default"
							 data-off-text="OFF">
						</li>
					</ul>
					<div class="inner-content">
						<button class="btn btn-success">
							<i class="icon-settings"></i> Save Changes
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
function getUserdetails() {
	var count = <?php echo count($resultUser)?>;
	var user;
	for (var i = 1; i <= count; i++) {
		if ($('#chk' + i).is(':checked')) {
			user = $("#chk" + i).val();
			window.location.href = '<?php echo base_url()?>admin/user_management/editUser/' + user;
		}
	}
}

function chechCheckbox(id) {
	var count = <?php echo count($resultUser)?>;
	var userId = [];
	for (var i = 1; i <= count; i++) {
		if ($('#chk' + i).is(':checked')) {
			userId.push($("#chk" + i).val());
		}
	}
	if (userId.length === 0) {
		alert("Please Select The User Name");
	} else {
		$.post("<?php echo base_url();?>admin/user_management/changeuserStatus", {
			id: id,
			userId: userId
		}, function(data) {
			location.reload(true);
		});
	}
}

function resetUserpassword() {
	var count = <?php echo count($resultUser)?>;
	var userId = [];
	for (var i = 1; i <= count; i++) {
		if ($('#chk' + i).is(':checked')) {
			userId.push($("#chk" + i).val());
		}
	}
	if (userId.length === 0) {
		alert("Please Select The User ");
	} else {
		$.post("<?php echo base_url();?>admin/user_management/resetUserpassword", {
			userId: userId
		}, function(data) {
			location.reload(true);
		});
	}
}


function send_sms()
{
var count =<?php echo count($resultUser) ?>;
var senderId = [];
for (var i = 1; i <= count; i++)
{
if ($('#chk' + i).is(':checked'))
{
senderId.push($("#chk" + i).val());
}
}


if (senderId.length === 0) {
alert ("Please Select The User");
}
else
{


	  var form = $('<form></form>');
      var path="<?php echo base_url() ?>admin/sms_management/bulk_sms";
      form.attr("method", "post");
      form.attr("action", path);
      var field = $('<input></input>');
      field.attr("type", "hidden");
      field.attr("name", "user");
      field.attr("value", senderId);
      form.append(field);
      var field = $('<input></input>');
      field.attr("type", "hidden");
      field.attr("name", "way");
      field.attr("value", "user");
      form.append(field);
      // The form needs to be a part of the document in
      // order for us to be able to submit it.
      $(document.body).append(form);
      form.submit();
      
      <?php /*?>  $.redirect("<?php echo base_url() ?>admin/sms_management/bulk_sms",
        {
        user: senderId,
                way:"user",
        },
          "POST", "");<?php */?>
}
}


function send_email()
{
    var count =<?php echo count($resultUser) ?>;
    var senderId = [];
    for (var i = 1; i <= count; i++)
    {
        if ($('#chk' + i).is(':checked'))
        {
            senderId.push($("#chk" + i).val());
        }
    }
    if (senderId.length === 0) 
    {
        alert ("Please Select The User");
    }
    else
    {
        
        var form = $('<form></form>');
        var path="<?php echo base_url() ?>admin/email_management/bulk_email";
        form.attr("method", "post");
        form.attr("action", path);
        var field = $('<input></input>');
        field.attr("type", "hidden");
        field.attr("name", "user");
        field.attr("value", senderId);
        form.append(field);
        var field = $('<input></input>');
        field.attr("type", "hidden");
        field.attr("name", "way");
        field.attr("value", "user");
        form.append(field);
        // The form needs to be a part of the document in
        // order for us to be able to submit it.
        $(document.body).append(form);
        form.submit();
        
//        alert("Bye");
//        $.redirect("<?php echo base_url() ?>admin/email_management/bulk_email",
//        {
//        user: senderId,
//                way:"user",
//        },
//                "POST", "");
    }
}

</script>