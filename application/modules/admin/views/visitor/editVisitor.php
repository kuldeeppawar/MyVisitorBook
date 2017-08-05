<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<!-- BEGIN CONTENT BODY -->
	<div class="page-content">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class=" app-ticket-list">
					<div class="page-bar row">
						<div class="col-md-6">
							<h3 class="page-title"><?php getLocalkeyword('Edit Visitor');?></h3>
							<ul class="page-breadcrumb ">
								<li><a href="<?php echo base_url()?>admin/dashboard"><?php getLocalkeyword('Home');?></a> <i class="fa fa-circle"></i></li>
								<li><a href="<?php echo base_url()?>admin/visitor"><?php getLocalkeyword('Visitor Management');?></a> <i class="fa fa-circle"></i></li>
								<li><span><?php getLocalkeyword('Edit Visitor');?></span></li>
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
							<form role="form" id="frmAdd" method="post" action="<?php echo base_url()?>admin/visitor/editVisitor" enctype="multipart/form-data">
								<div class="form-body" style="padding-top: 10px;">
									<div class="row">
										<div class="col-md-3">
											<div class="form-group">
												<label><?php getLocalkeyword('Select Title');?><span class="mandatory">*</span></label> <select class="form-control" name="selTitle" id="selTitle" required="required">
													<option value="">Select Title</option>
													<option value="Mr" <?php if($resultVisitor[0]->vis_title=="Mr"){ echo "selected"; } ?>>Mr</option>
													<option value="Miss" <?php if($resultVisitor[0]->vis_title=="Miss"){ echo "selected"; } ?>>Miss</option>
													<option value="Shri" <?php if($resultVisitor[0]->vis_title=="Shri"){ echo "selected"; } ?>>Shri</option>
												</select>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<div class="form-group">
													<label><?php getLocalkeyword('First name');?> <span class="mandatory">*</span></label> <input type="text" value="<?php echo $resultVisitor[0]->vis_firstName;  ?>" class="form-control"
													 placeholder="First name" name="txtFirstname" id="txtFirstname" required="required"> <input type="hidden" name="txtId" value="<?php echo $resultVisitor[0]->vis_id_pk; ?>">
												</div>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<div class="form-group">
													<label><?php getLocalkeyword('Middle Name');?> <span class="mandatory">*</span></label> <input type="text" class="form-control" value="<?php echo $resultVisitor[0]->vis_middleName;  ?>"
													 placeholder="Middle Name" name="txtMiddlename" id="txtMiddlename" required="required">
												</div>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<div class="form-group">
													<label><?php getLocalkeyword('Last Name');?> <span class="mandatory">*</span></label> <input type="text" class="form-control" value="<?php echo $resultVisitor[0]->vis_lastName;  ?>"
													 placeholder="Last Name" name="txtLastname" id="txtLastname" required="required">
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-3">
											<div class="form-group">
												<label><?php getLocalkeyword('Mobile Number');?> <span class="mandatory">*</span></label> <input type="number" value="<?php echo $resultVisitor[0]->vis_mobile;  ?>" step="any" min="10"
												 class="form-control" placeholder="Mobile Number" name="txtMobilenumber" id="txtMobilenumber" required="required">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label><?php getLocalkeyword('Email Id');?> <span class="mandatory">*</span></label> <input type="email" value="<?php echo $resultVisitor[0]->vis_email;  ?>" class="form-control"
												 placeholder="Email Id" name="txtEmail" id="txtEmail" required="required">
											</div>
										</div>
									</div>
									<div class="profile-content">
										<div class="row">
											<div class="col-md-12">
												<ul class="nav nav-tabs">
													<li class="active"><a data-toggle="tab" href="#tab1"><?php getLocalkeyword('Contact Details');?></a></li>
													<li><a data-toggle="tab" href="#tab2"><?php getLocalkeyword('Personal Info');?></a></li>
													<li><a data-toggle="tab" href="#tab4"><?php getLocalkeyword('Notes');?></a></li>
													<li><a data-toggle="tab" href="#tab5"><?php getLocalkeyword('Additional Info');?></a></li>
													<li><a data-toggle="tab" href="#tab3"><?php getLocalkeyword('Profile Pic');?></a></li>
												</ul>
												<!-- Modal -->
												<!-- ends -->
												<div class="form-horizontal">
													<div class="tab-content">
														<div id="tab1" class="tab-pane fade in active">
															<div class="row">
																<div class="col-md-6" style="border-right: solid 1px #eaeaea;">
																	<div class="form-group">
																		<label class="control-label col-md-4"><?php getLocalkeyword('Enter Address');?> <span class="required"> * </span>
																		</label>
																		<div class="col-md-8">
																			<input type="text" value="<?php echo $resultVisitor[0]->vis_address;  ?>" class="form-control" name="txtAddress" id="txtAddress" placeholder="Enter Your address"
																			 required="required" />
																		</div>
																	</div>
																	<div class="form-group">
																		<label class="control-label col-md-4"><?php getLocalkeyword('Enter Country');?> <span class="required"> * </span>
																		</label>
																		<div class="col-md-8">
																			<select class="form-control" name="selCountry" id="selCountry" required="required" onchange="getState(this.value);">
																				<option value="">Select Country</option>
																				<?php	for($i=0;$i<count($resultCountry);$i++)
																				{
																				?>
																				<option value="<?php echo $resultCountry[$i]->cntr_id_pk;?>" <?php if($resultVisitor[0]->vis_countryId_fk==$resultCountry[$i]->cntr_id_pk){  echo "selected"; } ?>
																				<?php if($resultCountry[$i]->cntr_status==0 && $resultVisitor[0]->vis_countryId_fk!=$resultCountry[$i]->cntr_id_pk){  echo "disabled"; } ?>>
																				<?php echo $resultCountry[$i]->cntr_name;?>
																				</option>							
																				<?php 	}
																				?>
																				</select>
																		</div>
																	</div>
																	<div class="form-group">
																		<label class="control-label col-md-4"><?php getLocalkeyword('Enter State');?> <span class="required"> * </span>
																		</label>
																		<div class="col-md-8">
																			<select class="form-control" name="selState" id="selState" required="required" onchange="getCity(this.value)">
																				<option value="">Select State</option>
																				<?php	
																				  for($i=0;$i<count($resultState);$i++)
																				  {?>
																				  <option value="<?php echo $resultState[$i]->stat_id_pk;?>"
																				  <?php 
																				  if($resultVisitor[0]->vis_stateId_fk==$resultState[$i]->stat_id_pk){ echo "selected";}
																				  if($resultState[$i]->stat_status==0 && $resultUser[0]->sysu_stateId_fk!=$resultState[$i]->stat_id_pk){  echo "disabled"; } ?>	>
																				  <?php echo $resultState[$i]->stat_name;?>
																				 </option>																				
																				 <?php
 																					}				
 																				?>		 </select>
																		</div>
																	</div>
																	<div class="form-group">
																		<label class="control-label col-md-4"><?php getLocalkeyword('Enter City');?> <span class="required"> * </span>
																		</label>
																		<div class="col-md-8">
																			<select class="form-control" name="selCity" id="selCity" required="required">
																				<option value="">Select City</option>
																				<?php	
																				for($i=0;$i<count($resultCity);$i++)
																				{?>
																				<option 	value="<?php echo $resultCity[$i]->cty_id_pk;?>" 
																				<?php if($resultVisitor[0]->vis_cityId_fk==$resultCity[$i]->cty_id_pk){ echo "selected";}
																				      if($resultCity[$i]->cty_status==0 && $resultVisitor[0]->vis_cityId_fk!=$resultCity[$i]->cty_id_pk){  echo "disabled"; } ?>>
																					<?php echo $resultCity[$i]->cty_name;?>
																				</option>		
																				<?php 									
																				}
																				?>																																							
																				</select>
																		</div>
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label col-md-4"><?php getLocalkeyword('Enter Zip Code');?> <span class="required"> * </span>
																		</label>
																		<div class="col-md-8">
																			<input type="number" value="<?php echo $resultVisitor[0]->vis_zipCode;  ?>" min="0" class="form-control" name="txtZip" placeholder="Enter Zip Code" required="required"
																			/>
																		</div>
																	</div>
																	<div class="form-group">
																		<label class="control-label col-md-4"><?php getLocalkeyword('Your Website');?><span class="required"> * </span>
																		</label>
																		<div class="col-md-8">
																			<input type="text" class="form-control" value="<?php echo $resultVisitor[0]->vis_website;  ?>" name="txtWebsite" placeholder="Enter your website URL" required="required"
																			/>
																		</div>
																	</div>
																	<div class="form-group">
																		<label class="control-label col-md-4"><?php getLocalkeyword('Landline Number');?><span class="required"> * </span>
																		</label>
																		<div class="col-md-8">
																			<input type="number" class="form-control" value="<?php echo $resultVisitor[0]->vis_landline;  ?>" name="txtLandline" placeholder="Enter your Landline Number" required="required"
																			/>
																		</div>
																	</div>
																	<div class="form-group">
																		<label class="control-label col-md-4"><?php getLocalkeyword('Fax');?><span class="required"> * </span>
																		</label>
																		<div class="col-md-8">
																			<input type="number" min="0" class="form-control" value="<?php echo $resultVisitor[0]->vis_fax;  ?>" name="txtFax" placeholder="Enter your FAX Number" required="required">
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div id="tab2" class="tab-pane fade">
															<div class="row">
																<div class="col-md-8">
																	<div class="form-group">
																		<label class="control-label col-md-5"><?php getLocalkeyword('Select Contact Group');?> <?php //echo "<pre>"; print_r($resultGroup); print_r($resultVisitorgroup); ?><span class="required"> * </span>
																		</label>
																		<div class="col-md-6">
																			<select id="selGroup" name="selGroup[]" class="form-control" data-placeholder="Select Group"  required="required">			
																			<?php
																			
																			for($i=0;$i < count($resultGroup);$i ++)
																			{
																				
																				?>  <option value="<?php echo $resultGroup[$i]->grp_id_pk;?>"
																					<?php $this->visitor_model->getGroupVisitor($VisitorId,$resultGroup[$i]->grp_id_pk);?>
																					<?php if($resultGroup[$i]->grp_status==0  && $resultGroup[$i]->grp_id_pk!=$resultVisitorgroup[$i]->gv_grpId_fk){  echo "disabled"; } ?>
																				>	<?php echo $resultGroup[$i]->grp_name;  ?>
																				</option>	
																				<?php
																				
																			}
																			?>	
                                                                          </select>
																		</div>
																	</div>
																	<div class="form-group">
																		<label class="control-label col-md-5"><?php getLocalkeyword('Select Business Category');?><span class="required"> * </span>
																		</label>
																		<div class="col-md-6">
																			<select class="form-control" name="selBusiness" id="selBusiness" required="required">
																				<option value="">Select Category</option>
																				<option value="IT" <?php if($resultVisitor[0]->vis_businessCategory=="IT"){ echo "selected";}?>>IT</option>
																				<option value="Manufacturing" <?php if($resultVisitor[0]->vis_businessCategory=="Manufacturing"){ echo "selected";}?>>Manufacturing</option>
																				<option value="Logistick" <?php if($resultVisitor[0]->vis_businessCategory=="Logistick"){ echo "selected";}?>>Logistick</option>
																			</select>
																		</div>
																	</div>
																	<div class="form-group">
																		<label class="control-label col-md-5"><?php getLocalkeyword('Business Name');?> <span class="required"> * </span>
																		</label>
																		<div class="col-md-6">
																			<input type="text" class="form-control" value="<?php echo $resultVisitor[0]->vis_businessName;  ?>" placeholder="Enter Business Name" name="txtBusinessname" required="required"
																			/>
																		</div>
																	</div>
																	<div class="form-group">
																		<label class="control-label col-md-5"><?php getLocalkeyword('DOB');?><span class="required"> * </span>
																		</label>
																		<div class="col-md-6">
																			<div class="input-group input-medium date date-picker" data-date-end-date="+0d" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
																				<input type="text" value="<?php echo date(" d-m-Y ",strtotime($resultVisitor[0]->vis_dob));?>" class="form-control" readonly name="txtBirtdate" required="required">																				<span class="input-group-btn">
																					<button class="btn default" type="button">
																						<i class="fa fa-calendar"></i>
																					</button>
																				</span>
																			</div>
																		</div>
																	</div>
																	<!--  name="rpassword" -->
																	<div class="form-group">
																		<label class="control-label col-md-5"><?php getLocalkeyword('Anniversary Date');?><span class="required"> * </span>
																		</label>
																		<div class="col-md-6">
																			<div class="input-group input-medium date date-picker" data-date-end-date="+0d" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
																				<input type="text" class="form-control" value="<?php echo date(" d-m-Y ",strtotime($resultVisitor[0]->vis_anniversaryDate));?>" readonly name="txtAnniversary" required="required">																				<span class="input-group-btn">
																					<button class="btn default" type="button">
																						<i class="fa fa-calendar"></i>
																					</button>
																				</span>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col-md-4">
																	<!-- 																	<div class="form-group"> -->
																	<!-- 																		<div class="btn-group" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"> -->
																	<!-- 																			<button id="sample_editable_1_new" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1"> -->
																	<!-- 																				<i class="fa fa-plus"></i> Create Contact group -->
																	<!-- 																			</button> -->
																	<!-- 																		</div> -->
																	<!-- 																	</div> -->
																</div>
																<div class="clearfix"></div>
															</div>
														</div>
														<div id="tab3" class="tab-pane fade">
															<div class="profile-userbuttons col-md-6">
																<label><?php getLocalkeyword('Edit Visitor');?>Upload Profile Pic</label> <input type="file" class="form-control col-md-3" name="txtFile"> <input type="hidden" class="form-control col-md-3"
																 name="txtProfile" value="<?php echo $resultVisitor[0]->vis_profile; ?>">
																<!-- 																<button type="button" class="btn btn-circle green btn-sm">Upload</button> -->
																<br> <br>
															</div>
														</div>
														<div id="tab4" class="tab-pane fade">
															<h3 class="block"><?php getLocalkeyword('Provide your Other Details');?></h3>
															<div class="col-md-6">
																<div class="form-group">
																	<label><?php getLocalkeyword('Enter Note');?></label>
																	<textarea class="form-control" rows="3" placeholder="Type Here" name="txtInfo"><?php echo $resultVisitor[0]->vis_note; ?></textarea>
																</div>
															</div>
															<div class="clearfix"></div>
														</div>
														<div id="tab5" class="tab-pane fade">
														
														     <h6 class="block"><?php getLocalkeyword('Additional Info');?></h6>
														        <div class="col-md-6">
																<div class="form-group">
																<input type="hidden" name="head_count" value="<?php echo count($resultField)  ?>">
												                <?php for($i=0;$i < count($resultField);$i ++)
																    {
																	
																	$fieldType=$resultField[$i]->visitfield_type;
																	
																	$type="";
																	if ($fieldType == "text" || $fieldType == "date")
																	{
																		$type="text";
																	} else if ($fieldType == "picklist")
																	{
																		$type="select";
																	} else if ($fieldType == "email")
																	{
																		$type="email";
																	} else if ($fieldType == "number" || $fieldType == "phone")
																	{
																		$type="number";
																	} else
																	{
																		$type="textarea";
																	}
																	
																	
																	$verify_status="";
																	
																	?>
																	  <label><?php getLocalkeyword($resultField[$i]->visitfield_name);?></label>
																	  
																	    <input type="hidden" name="head1_<?php echo $i;?>" value="<?php echo $resultField[$i]->visitfield_id_pk;?>">	
																	  <?php 
																	  
																	     
																		   if($type!="textarea")
																			{
																				if ($type != "select")
																				{
																				   
																					$vsdata=$this->visitor_model->getvisitfieldvalue($resultField[$i]->visitfield_id_pk,$VisitorId);
																					$fieldval="";
																					if(count($vsdata)>0)
																					{
																						$fieldval=$vsdata[0]->vvf_value;
																					}
																				?>												     
																				  <input type="<?php echo $type;?>" name="head_<?php echo $i;?>[]" class="form-control" value="<?php echo $fieldval;?>"  >											        
																				  <?php	
																				 }	
																				 else		 	
																				 {  
																				 	
																				 	$vsdata=$this->visitor_model->getvisitfieldvalue($resultField[$i]->visitfield_id_pk,$VisitorId);
																				 	$fieldval="";
																				 	if(count($vsdata)>0)
																				 	{
																				 		$fieldval=$vsdata[0]->vvf_value;
																				 	}
																				 	 $v=$resultField[$i]->val;
																				     $v=explode(",",$v);
																				     $selcriteria="";
												                                     if($resultField[$i]->visitfield_selection==2)
												                                     {
												                                     	$selcriteria="multiple";
												                                     }
																				   
												                                     $selfield=explode(",",$fieldval);
																				     ?>
																				  
																				     <select class="form-control" <?php echo $selcriteria;?> name="head_<?php echo $i;?>[]" id="<?php echo $resultField[$i]->visitfield_id_pk;?>">
																				      <option value=""> Select </option>
																				     <?php 
																				     
																				     for($j=0;$j<count($v);$j++)			
																				     {	
																				     	for($m=0;$m<count($selfield);$m++)
																				     	{	
																				     	?>
																				     	<option value="<?php echo $v[$j];?>" <?php if($selfield[$m]==$v[$j]){ echo "Selected"; }?>
																				     	 ><?php echo $v[$j];?></option>
																				     	<?php 
																				     	}
																				     }	?>												
																				  </select>
																				    
																				  												
																				  <?php
																				    }
																				}
																			
																				else
																				{
																					
																					$vsdata=$this->visitor_model->getvisitfieldvalue($resultField[$i]->visitfield_id_pk,$VisitorId);
																					$fieldval="";
																					if(count($vsdata)>0)
																					{
																						$fieldval=$vsdata[0]->vvf_value;
																					}
																				?>											     
																				  <textarea name="head_<?php echo $i;?>[]" class="form-control"><?php echo $fieldval;?></textarea>											    
																				  <?php 											
																				 }
																			 ?>	
																	<br>
																	<?php
                                                                    }?>
                                                                    </div>
                                                               </div>
                                                               <div class="clearfix"></div>
                                                                 
														
														</div>
													</div>
													<div class="row">
														<div class="col-md-12">
															<div class=" pull-right">
																<button type="submit" name="btnSubmit" class="btn btn-primary"><?php getLocalkeyword('Save');?></button>
																<a type="button" href="<?php echo base_url(); ?>admin/visitor" class="btn btn-danger"><?php getLocalkeyword('Cancel');?></a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</form>
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
																			<label class="mt-checkbox mt-checkbox-outline" id="advance" style="line-height: 16px; margin-bottom: 0px;"> <input type="checkbox" name="colorCheckbox" value="green"> Advance your search <span></span>
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
					<div class="clearfix"></div>
					<!-- END DASHBOARD STATS 1-->
				</div>
				<!-- END CONTENT BODY -->
			</div>
			<!-- END CONTENT -->
			<!-- BEGIN QUICK SIDEBAR -->
			<a href="javascript:;" class="page-quick-sidebar-toggler"> <i class="icon-login"></i>
			</a>
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
												<span class="arrow"></span> <a href="javascript:;" class="name">Bob Nilson</a> <span class="datetime">20:17</span> <span class="body"> Sure. I will check and buzz you if anything needs to be corrected. </span>
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
									<li>Enable SMS Alerts <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default"
										 data-off-text="OFF">
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
			<!-- END QUICK SIDEBAR -->
		</div>
		<!-- END CONTAINER -->
		<script>
		function getCity(val) {
			$.post("<?php echo base_url();?>admin/visitor/getCity", {
				val: val
			}, function(data) {
				$('#selCity').html(data);
			});
		}

		function getState(val) {
			$.post("<?php echo base_url();?>admin/visitor/getState", {
				val: val
			}, function(data) {
				$('#selState').html(data);
			});
		}
		$("#frmAdd").validate({
			ignore: "",
			rules: {
				selTitle: {
					required: true
				},
				txtFirstname: {
					required: true
				},
				txtMiddlename: {
					required: true
				},
				txtLastname: {
					required: true
				},
				txtMobilenumber: {
					required: true,
					maxlength: 10
				},
				txtEmail: {
					required: true
				},
				txtAddress: {
					required: true
				},
				selCountry: {
					required: true
				},
				selState: {
					required: true
				},
				SelCity: {
					required: true
				},
				txtZip: {
					required: true
				},
				txtWebsite: {
					required: true
				},
				txtLandline: {
					required: true
				},
				txtFax: {
					required: true
				},
				selGroup: {
					required: true
				},
				selBusiness: {
					required: true
				},
				txtBusinessname: {
					required: true
				},
				txtBirtdate: {
					required: true
				},
				txtAnniversary: {
					required: true
				}
			},
			messages: {
				selTitle: {
					required: "Please Select Title"
				},
				txtFirstname: {
					required: "Please Enter First Name"
				},
				txtMiddlename: {
					required: "Please Enter Middle Name"
				},
				txtLastname: {
					required: "Please Enter Last Name"
				},
				txtMobilenumber: {
					required: "Please Enter Mobile Number"
				},
				txtEmail: {
					required: "Please Enter Email"
				},
				txtAddress: {
					required: "Please Enter Address"
				},
				selCountry: {
					required: "Please Select Country"
				},
				selState: {
					required: "Please Select State"
				},
				SelCity: {
					required: "Please Select City"
				},
				txtZip: {
					required: "Please Enter Zipcode"
				},
				txtWebsite: {
					required: "Please Enter Website Details"
				},
				txtLandline: {
					required: "Please Enter Landline Number"
				},
				txtFax: {
					required: "Please Enter Fax Details"
				},
				selGroup: {
					required: "Please Select Group"
				},
				selBusiness: {
					required: "Please Select Business Category"
				},
				txtBusinessname: {
					required: "Please Enter Business Name"
				},
				txtBirtdate: {
					required: "Please Enter Birth Date"
				},
				txtAnniversary: {
					required: "Please Enter Anniversary Date"
				}
			}
		});
		</script>