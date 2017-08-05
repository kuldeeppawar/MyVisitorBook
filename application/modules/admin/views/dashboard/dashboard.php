<!-- <script type="text/javascript" src="https://www.google.com/jsapi?autoload={'modules':[{'name':'visualization','version':'1','packages':['geochart']}]}"></script> -->
<!-- <script type="text/javascript" src="<?php //echo base_url();?>themes/jsapi.js"></script> -->
<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyAL4zVECEggJ8bToruaMSdU4gr9O71UD-I" async="" defer="defer"></script>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 

<!-- <script type="text/javascript" src="http://www.google.com/jsapi?ext.js"></script> -->
 

<!-- <script type='text/javascript' src='./jsapi.js'></script> -->


<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<!-- BEGIN CONTENT BODY -->
	<div class="page-content">
		<div class=" app-ticket-list">
			<div class="page-bar row">
				<div class="col-md-3">
					<h1 class="page-title" style="margin-bottom: 0px; margin-top: 12px;">
						Dashboard<br>
						<ul class="page-breadcrumb" style="padding-top: 0px;">
							<li><a href="index.html">Home</a> <i class="fa fa-circle"></i></li>
							<li><span>Dashboard</span></li>
						</ul>
					</h1>
				</div>
				<div class="col-md-8 pull-right">
					<div class="page-toolbar pull-right">
						<div id="dashboard-report-range" style="padding-top: 22px;" class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom"
							data-original-title="Change dashboard date range">
							<i class="icon-calendar"></i>&nbsp; <span class="thin uppercase hidden-xs"></span>&nbsp; <i class="fa fa-angle-down"></i>
						</div>
					</div>
					<!-- /input-group -->
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">
					<h4 style="color: #ed6b75; margin-bottom: 32px; margin-top: 28px;" class="blink">Welcome Scott, Good Morning..!</h4>
				</div>
			</div>
			<!-- BEGIN PAGE HEADER-->
			<!-- BEGIN THEME PANEL -->
			<!-- END THEME PANEL -->
			<!-- BEGIN PAGE BAR -->
			<!-- END PAGE BAR -->
			<!-- BEGIN PAGE TITLE-->
			<!-- END PAGE TITLE-->
			<!-- END PAGE HEADER-->
			<!-- BEGIN DASHBOARD STATS 1-->
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<a class="dashboard-stat dashboard-stat-v2 blue" href="#">
						<div class="visual">
							<i class="fa fa-comments"></i>
						</div>
						<div class="details">
							<div class="number">
								<span data-counter="counterup" data-value="<?php echo $email_count;?>"><?php echo $email_sent;?></span>
							</div>
							<div class="desc">Total Email Sent</div>
						</div>
					</a>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<a class="dashboard-stat dashboard-stat-v2 red" href="#">
						<div class="visual">
							<i class="fa fa-bar-chart-o"></i>
						</div>
						<div class="details">
							<div class="number">
								<span data-counter="counterup" data-value="<?php echo $sms_count;?>"><?php echo $sms_count;?>
							</div>
							<div class="desc">Total SMS sents</div>
						</div>
					</a>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<a class="dashboard-stat dashboard-stat-v2 green" href="#">
						<div class="visual">
							<i class="fa fa-shopping-cart"></i>
						</div>
						<div class="details">
							<div class="number">
								<span data-counter="counterup" data-value="<?php echo $visitors_count;?>"><?php echo $visitors_count;?></span>
							</div>
							<div class="desc">Total Visitors</div>
						</div>
					</a>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<a class="dashboard-stat dashboard-stat-v2 purple" href="#">
						<div class="visual">
							<i class="fa fa-globe"></i>
						</div>
						<div class="details">
							<div class="number">
								<span data-counter="counterup" data-value="<?php echo $system_users_count;?>"><?php echo $system_users_count;?></span>
							</div>
							<div class="desc">Total System Users</div>
						</div>
					</a>
				</div>
			</div>
			<div class="clearfix"></div>
			<hr class="hr1">
			<div class="row">
				<ul id="draggablePanelList" class="list-unstyled">
					<li class="panel1 col-md-6" style="height: auto;">
						<form id="quick_add_form" name="quick_add_form" method="POST" action="<?php echo base_url()?>admin/dashboard/addQuickVisitor">
							<h4 class="text-center panel-heading1" style="color: #000;">
								Quick Add<span class="movable"><img src="<?php echo base_url()?>themes/assets/move_icon.png"</span>
							</h4>
							<div class="row">
							<?php
							if($quick_add_mgt[0]->predefine_show=='1')
							{
							?>
								<div class="col-md-4 form-group">
									<select class="form-control" id="" name="seltitle" id="seltitle">
										<option value="">Select Title</option>
										<option value="Mr.">Mr.</option>
										<option value="Ms.">Ms.</option>
										<option value="Mrs.">Mrs.</option>
									</select>
								</div>
							<?php
							}

							if($quick_add_mgt[1]->predefine_show=='1')
							{
							?>	
								<div class="col-md-4 form-group">
									<input type="text" class="form-control" placeholder="First name" id="txtfirstname" name="txtfirstname">
								</div>
								<div class="col-md-4 form-group">
									<input type="text" class="form-control" placeholder="Middle name" id="txtmiddlename" name="txtmiddlename">
								</div>
								<div class="col-md-4 form-group">
									<input type="text" class="form-control" placeholder="Last name" id="txtlastname" name="txtlastname">
								</div>
							<?php
							}

                            if($quick_add_mgt[18]->predefine_show=='1')
							{
							?>	
								<div class="col-md-4 form-group">
									<input type="text" class="form-control" placeholder="Middle name" id="txtmiddlename" name="txtmiddlename">
								</div>
							<?php
							}
							?>	
							</div>
							<div class="row">
							<?php

							if($quick_add_mgt[19]->predefine_show=='1')
							{
							?>
								<div class="col-md-4 form-group">
									<input type="text" class="form-control" placeholder="Last name" id="txtlastname" name="txtlastname">
								</div>
							<?php
							}

							if($quick_add_mgt[2]->predefine_show=='1')
							{
							?>	
								<div class="col-md-4 form-group">
									<input type="text" class="form-control" placeholder="Mobile no." id="txtmobile" name="txtmobile">
								</div>
							<?php
							}

							if($quick_add_mgt[3]->predefine_show=='1')
							{
							?>	
								<div class="col-md-4 form-group">
									<input type="text" class="form-control" placeholder="Email id" id="txtemail" name="txtemail">
								</div>
							<?php
							}
							?>	
							</div>
							<div class="row">
							<?php

							if($quick_add_mgt[6]->predefine_show=='1')
							{
							?>
								<div class="col-md-4 form-group">
									<input type="text" class="form-control" placeholder="Business name" id="txtbusiness" name="txtbusiness">
								</div>
							<?php
							}

							?>	
							</div>
							<div class="row">
							<?php

							if($quick_add_mgt[5]->predefine_show=='1')	
							{
							?>
								<div class="col-md-4 form-group">
									<select class="form-control" id="selbusinesscategory" name="selbusinesscategory">
											<option value="">Select business category</option>
											<option value="IT">IT</option>
											<option value="Manufacturing">Manufacturing</option>
											<option value="Logistics">Logistics</option>
									</select>
								</div>
							<?php
							}


							if($quick_add_mgt[4]->predefine_show=='1')
							{
							?>	
								<div class="col-md-4 form-group">
									<select class="form-control" id="selcontactgroup" name="selcontactgroup">
											<option value="">Select contact group</option>
											<?php
											for($cg=0;$cg<count($contact_group);$cg++)
											{
											?>
													<option value="<?php echo $contact_group[$cg]->grp_id_pk;?>"><?php echo $contact_group[$cg]->grp_name;?></option>
											<?php	
											}
											?>
									</select>
								</div>
							<?php
							}


							if($quick_add_mgt[7]->predefine_show=='1')
							{
							?>	
								<div class="col-md-4 form-group">
									<input type="text" class="form-control" placeholder="Address" id="txtaddress" name="txtaddress">
								</div>
							<?php
							}
							?>	
							</div>
							<div class="row">
							<?php

							if($quick_add_mgt[8]->predefine_show=='1')
							{
							?>
								<div class="col-md-4 form-group">
									<select class="form-control" id="selcountry" name="selcountry" onchange="getAllStateList(this.value);">
											<option value="">Select Country</option>
											<?php
											for($ct=0;$ct<count($country_list);$ct++)
											{
											?>
													<option value="<?php echo $country_list[$ct]->cntr_id_pk;?>"><?php echo $country_list[$ct]->cntr_name;?></option>	
											<?php	
											}
											?>
									</select>
								</div>
							<?php
							}

							if($quick_add_mgt[9]->predefine_show=='1')
							{
							?>	
								<div class="col-md-4 form-group">
									<select class="form-control" id="selstate" name="selstate" onchange="getAllCityList(this.value);">
											<option value="">Select State</option>
									</select>
								</div>
							<?php
							}

							if($quick_add_mgt[10]->predefine_show=='1')
							{
							?>	
								<div class="col-md-4 form-group">
									<select class="form-control" id="selcity" name="selcity">
											<option value="">Select City</option>
									</select>
								</div>
							<?php
							}
							?>	
							</div>
							<div class="row">
							<?php

							if($quick_add_mgt[11]->predefine_show=='1')
							{
							?>
								<div class="col-md-4 form-group">
									<input type="text" class="form-control" id="txtzipcode" name="txtzipcode" placeholder="Zip Code"/>
								</div>
							<?php
							}

							if($quick_add_mgt[12]->predefine_show=='1')
							{
							?>	
								<div class="col-md-4 form-group">
									<input type="text" class="form-control" id="txtwebsite" name="txtwebsite" placeholder="Website"/>
								</div>
							<?php
							}

							if($quick_add_mgt[13]->predefine_show=='1')
							{
							?>	
								<div class="col-md-4 form-group">
									<input type="text" class="form-control" id="txtlandline" name="txtlandline" placeholder="Landline No."/>
								</div>
							<?php
							}
							?>	
							</div>
							<div class="row">
							<?php
							if($quick_add_mgt[14]->predefine_show=='1')
							{
							?>
								<div class="col-md-4 form-group">
									<input type="text" class="form-control" id="txtfax" name="txtfax" placeholder="Fax"/>
								</div>
							<?php
							}

							if($quick_add_mgt[15]->predefine_show=='1')
							{
							?>	
								<div class="col-md-4 form-group">
									<div class="" >
										<input type="text"  data-date-format="dd-mm-yyyy" class="form-control date date-picker" id="txtdob" name="txtdob" placeholder="DOB"/>
									</div>	
								</div>
							<?php
							}

							if($quick_add_mgt[16]->predefine_show=='1')
							{
							?>	
								<div class="col-md-4 form-group">
									<div class="" >
										<input type="text" data-date-format="dd-mm-yyyy" class="form-control date date-picker" id="txtanni" name="txtanni" placeholder="Anniversary Date"/>
									</div>
								</div>
							<?php
							}
							?>	
							</div>
							<div class=" form-group">
							<?php
							if($quick_add_mgt[17]->predefine_show=='1')
							{
							?>
								<textarea class="form-control" rows="3" placeholder=" Note" id="txtnote" name="txtnote"></textarea>
							<?php
							}
							?>
							</div>
							<div class="row">
							<?php
							for($qf=0;$qf<count($add_quick_field);$qf++)
							{
								  if($add_quick_field[$qf]->visitfield_type=='text')
								  {	
							?>
										<div class="col-md-4 form-group">	
											<input type="text" class="form-control" id="<?php echo $add_quick_field[$qf]->visitfield_name;?>" name="<?php echo $add_quick_field[$qf]->visitfield_name;?>" placeholder="<?php echo $add_quick_field[$qf]->visitfield_name;?>"/>
										</div>			
							<?php	
								  }

								  if($add_quick_field[$qf]->visitfield_type=='textarea')
								  {
							?>
										<div class="col-md-4 form-group">								
											<textarea class="form-control" rows="3" placeholder="" id="<?php echo $add_quick_field[$qf]->visitfield_name;?>" name="<?php echo $add_quick_field[$qf]->visitfield_name;?>" placeholder="<?php echo $add_quick_field[$qf]->visitfield_name;?>" maxlength="<?php echo $add_quick_field[$qf]->visitfield_length;?>"></textarea>
										</div>
							<?php	  	
								  }

								  if($add_quick_field[$qf]->visitfield_type=='picklist')
								  {
								  		if($add_quick_field[$qf]->visitfield_selection=="2")
								  		{
								  				$selection_criteria="multiple";
								  		}
								  		else
								  		{
								  				$selection_criteria="";
								  		}

								  		$get_dropdown_data=$this->dashboard_model->getAllPicklistData($add_quick_field[$qf]->additional_visitfieldid_fk);
							?>
										<div class="col-md-4 form-group">								
											<select id="<?php echo $add_quick_field[$qf]->visitfield_name;?>" name="<?php echo $add_quick_field[$qf]->visitfield_name;?>" class="form-control" <?php echo $selection_criteria;?>>
													<option value="">Select <?php echo $add_quick_field[$qf]->visitfield_name?></option>
													<?php 
													for($dd=0;$dd<count($get_dropdown_data);$dd++)
													{
													?>
															<option value="<?php echo $get_dropdown_data[$dd]->visitval_value;?>"><?php echo $get_dropdown_data[$dd]->visitval_value;?></option>	
													<?php
													}
													?>
											</select>
										</div>
							<?php	  	
								  }

								  if($add_quick_field[$qf]->visitfield_type=='number' || $add_quick_field[$qf]->visitfield_type=='phone')
								  {	
							?>
										<div class="col-md-4 form-group">	
											<input type="number" class="form-control" id="<?php echo $add_quick_field[$qf]->visitfield_name;?>" name="<?php echo $add_quick_field[$qf]->visitfield_name;?>" placeholder="<?php echo $add_quick_field[$qf]->visitfield_name;?>" maxlength="<?php echo $add_quick_field[$qf]->visitfield_length;?>"/>
										</div>			
							<?php	
								  }

								  if($add_quick_field[$qf]->visitfield_type=='email')
								  {	
							?>
										<div class="col-md-4 form-group">	
											<input type="email" class="form-control" id="<?php echo $add_quick_field[$qf]->visitfield_name;?>" name="<?php echo $add_quick_field[$qf]->visitfield_name;?>" placeholder="<?php echo $add_quick_field[$qf]->visitfield_name;?>"/>
										</div>			
							<?php	
								  }

								  if($add_quick_field[$qf]->visitfield_type=='date')
								  {	
							?>
										<div class="col-md-4 form-group">	
											<input type="text" class="form-control date date-picker" id="<?php echo $add_quick_field[$qf]->visitfield_name;?>" name="<?php echo $add_quick_field[$qf]->visitfield_name;?>" placeholder="<?php echo $add_quick_field[$qf]->visitfield_name;?>"/>
										</div>			
							<?php	
								  }
							}
							?>
							</div>
							<button class="btn btn-danger pull-right" style="margin-top: 8px;" type="submit">Save</button>
						</form>
					</li>
					<li class="panel1 col-md-6" style="height: 550px;">
						<form id="quick_add_form" name="quick_add_form" method="POST" action="<?php echo base_url()?>admin/dashboard/trackRevisitors">
							<h4 class="text-center panel-heading1" style="color: #000;">
								Track Customer Revisit<span class="movable"><img src="<?php echo base_url()?>themes/assets/move_icon.png"</span>
							</h4>
							<div class=" form-group">
								<input type="text" class="form-control" placeholder="Mobile no." id="txtmobile" name="txtmobile">
							</div>
							<div class=" form-group">
								<textarea class="form-control" rows="9" placeholder=" Purpose" id="txtpurpose" name="txtpurpose"></textarea>
							</div>
							<button class="btn btn-danger pull-right" type="submit">Track</button>
						</form>
					</li>
					<li class="panel1 col-md-6">
						<h4 class="text-center panel-heading1" style="color: #000">
							Latest 5 Visitors<span class="movable"><img src="<?php echo base_url()?>themes/assets/move_icon.png"</span>
						</h4>
						<table class="table table-striped table-bordered table-hover table-checkable order-column th_color">
							<thead>
								<th width="25%">Date &amp; Time</th>
								<th>Name</th>
								<th>Mobile No.</th>
								<th>Email id</th>
							</thead>
							<tbody>
							<?php
							for($lv=0;$lv<count($latest_visitors);$lv++)
							{
							?>	
								<tr class="odd gradeX">
									<td><?php echo $latest_visitors[$lv]->created_date;?></td>
									<td><?php echo $latest_visitors[$lv]->vis_firstName.' '.$latest_visitors[$lv]->vis_lastName;?></td>
									<td><?php echo $latest_visitors[$lv]->vis_mobile;?></td>
									<td><?php echo $latest_visitors[$lv]->vis_email;?></td>
								</tr>
							<?php
							}
							?>	
							</tbody>
						</table> 
							<a class="btn btn-danger pull-right" href="<?php echo base_url();?>admin/dashboard/getLatestVisitors">View More</a>
					</a>
					</li>
					<li class="panel1 col-md-6">
						<h4 class="text-center panel-heading1" style="color: #000;">
							Recent 5 Revisits<span class="movable"><img src="<?php echo base_url()?>themes/assets/move_icon.png"</span>
						</h4>
						<table class="table table-striped table-bordered table-hover table-checkable order-column th_color">
							<thead>
								<th width="24%">Name</th>
								<th>Mobile No.</th>
								<th>Purpose</th>
								<th>Date &amp; Time</th>
							</thead>
							<tbody>
							<?php
							for($rr=0;$rr<count($recent_revisit);$rr++)
							{
							?>
								<tr class="odd gradeX">
									<td><?php echo $recent_revisit[$rr]->vis_firstName.' '.$recent_revisit[$rr]->vis_lastName;?></td>
									<td><?php echo $recent_revisit[$rr]->vis_mobile;?></td>
									<td><?php echo $recent_revisit[$rr]->rv_purpose;?></td>
									<td><?php echo $recent_revisit[$rr]->created_date; ?></td>
								</tr>	
							<?php
							}
							?>								
							</tbody>
						</table> <a href="<?php echo base_url();?>admin/dashboard/getRecentRevisitors">
							<button class="btn btn-danger pull-right">View More</button>
					</a>
					</li>
					<li class="panel1 col-md-6">
						<h4 class="text-center panel-heading1" style="color: #000;">
							Upcoming Birthday/Upcoming Anniversary<span class="movable"><img src="<?php echo base_url()?>themes/assets/move_icon.png"</span>
						</h4>
						<table class="table table-striped table-bordered table-hover table-checkable order-column th_color">
							<thead>
								<th width="24%">Name</th>
								<th>Mobile No.</th>
								<th>Date</th>
								<th>Type</th>
							</thead>
							<tbody>
							<?php
							for($up=0;$up<count($upcoming_birth);$up++)
							{
							?>
								<tr class="odd gradeX">
									<td><?php echo $upcoming_birth[$up]->vis_firstName.' '.$upcoming_birth[$up]->vis_lastName;?></td>
									<td><?php echo $upcoming_birth[$up]->vis_mobile;?></td>
									<td><?php echo $upcoming_birth[$up]->event_date;?></td>
									<td><?php echo $upcoming_birth[$up]->event_title;?></td>
								</tr>
							<?php
							}
							?>	
							</tbody>
						</table> <a href="<?php echo base_url();?>admin/dashboard/getUpcomingBirthAnni">
							<button class="btn btn-danger pull-right">View More</button>
					</a>
					</li>
					<li class="panel1 col-md-6">
						<h4 class="text-center panel-heading1" style="color: #000;">
							Top 5 Revisitors<span class="movable"><img src="<?php echo base_url()?>themes/assets/move_icon.png"</span>
						</h4>
						<table class="table table-striped table-bordered table-hover table-checkable order-column th_color">
							<thead>
								<th width="24%">Name</th>
								<th>Mobile No.</th>
								<th>Email</th>
							</thead>
							<tbody>
							<?php
							for($lr=0;$lr<count($latest_revisitors);$lr++)
							{
							?>
								<tr class="odd gradeX">
									<td><?php echo $latest_revisitors[$lr]->vis_firstName.' '.$latest_revisitors[$lr]->vis_lastName;?></td>
									<td><?php echo $latest_revisitors[$lr]->vis_mobile;?></td>
									<td><?php echo $latest_revisitors[$lr]->vis_email;?></td>
								</tr>
							<?php
							}
							?>	
							</tbody>
						</table> <a href="<?php echo base_url();?>admin/dashboard/getLatestRevisitors">
							<button class="btn btn-danger pull-right">View More</button>
					</a>
					</li>
					<li class="panel1 col-md-6">
						<h4 class="text-center panel-heading1" style="color: #000;">
							Recent Activities<span class="movable"><img src="<?php echo base_url()?>themes/assets/move_icon.png"</span>
						</h4>
						<div class="charts">
							<ul class="list-group">
							<?php
							for($ra=0;$ra<count($recent_activities);$ra++)
							{
							?>	
								<li class="list-group-item"><?php echo $recent_activities[$ra]->sysu_name;?> : <span class="badge badge-default"><?php echo $recent_activities[$ra]->atl_type;?> </span>
								</li>
							<?php
							}
							?>
							</ul>
						</div>
						<br>
						<a href="<?php echo base_url();?>admin/dashboard/getRecentActivities">
							<button class="btn btn-danger pull-right">View More</button>
					</a>
					</li>
					<li class="panel1 col-md-6">
						<h4 class="text-center panel-heading1" style="color: #000;">
							Customer Added Trend<span class="movable"><img src="<?php echo base_url()?>themes/assets/move_icon.png"</span>
						</h4>
						<div id="bar_chart_trends" style="width: 100%; height: 197px;"></div>
					</li>
					<li class="panel1 col-md-6">
						<h4 class="text-center panel-heading1" style="color: #000;">
							Customer Vs SMS Sent<span class="movable"><img src="<?php echo base_url()?>themes/assets/move_icon.png"</span>
						</h4>
						<div id="bar_chart_sms" style="width: 100%; height: 197px;"></div>
					</li>
					<li class="panel1 col-md-6">
						<h4 class="text-center panel-heading1" style="color: #000;">
							Heat Map-Location Wise Visitors<span class="movable"><img src="<?php echo base_url()?>themes/assets/move_icon.png"</span>
						</h4>
						<div id="geo_chart" style="width: 100%; height: 197px;"></div>
					</li>
				</ul>
			</div>
			<!-- END DASHBOARD STATS 1-->
		</div>
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
					<li><a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab"> <i class="icon-bell"></i> Alerts
					</a></li>
					<li><a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab"> <i class="icon-info"></i> Notifications
					</a></li>
					<li><a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab"> <i class="icon-speech"></i> Activities
					</a></li>
					<li class="divider"></li>
					<li><a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab"> <i class="icon-settings"></i> Settings
					</a></li>
				</ul></li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane active page-quick-sidebar-chat" id="quick_sidebar_tab_1">
				<div class="page-quick-sidebar-chat-users" data-rail-color="#ddd" data-wrapper-class="page-quick-sidebar-list">
					<h3 class="list-heading">Staff</h3>
					<ul class="media-list list-items">
						<li class="media">
							<div class="media-status">
								<span class="badge badge-success">8</span>
							</div> <img class="media-object" src="<?php echo base_url()?>themes/assets/layouts/layout/img/avatar3.jpg" alt="...">
							<div class="media-body">
								<h4 class="media-heading">Bob Nilson</h4>
								<div class="media-heading-sub">Project Manager</div>
							</div>
						</li>
						<li class="media"><img class="media-object" src="<?php echo base_url()?>themes/assets/layouts/layout/img/avatar1.jpg" alt="...">
							<div class="media-body">
								<h4 class="media-heading">Nick Larson</h4>
								<div class="media-heading-sub">Art Director</div>
							</div></li>
						<li class="media">
							<div class="media-status">
								<span class="badge badge-danger">3</span>
							</div> <img class="media-object" src="<?php echo base_url()?>themes/assets/layouts/layout/img/avatar4.jpg" alt="...">
							<div class="media-body">
								<h4 class="media-heading">Deon Hubert</h4>
								<div class="media-heading-sub">CTO</div>
							</div>
						</li>
						<li class="media"><img class="media-object" src="<?php echo base_url()?>themes/assets/layouts/layout/img/avatar2.jpg" alt="...">
							<div class="media-body">
								<h4 class="media-heading">Ella Wong</h4>
								<div class="media-heading-sub">CEO</div>
							</div></li>
					</ul>
					<h3 class="list-heading">Customers</h3>
					<ul class="media-list list-items">
						<li class="media">
							<div class="media-status">
								<span class="badge badge-warning">2</span>
							</div> <img class="media-object" src="<?php echo base_url()?>themes/assets/layouts/layout/img/avatar6.jpg" alt="...">
							<div class="media-body">
								<h4 class="media-heading">Lara Kunis</h4>
								<div class="media-heading-sub">CEO, Loop Inc</div>
								<div class="media-heading-small">Last seen 03:10 AM</div>
							</div>
						</li>
						<li class="media">
							<div class="media-status">
								<span class="label label-sm label-success">new</span>
							</div> <img class="media-object" src="<?php echo base_url()?>themes/assets/layouts/layout/img/avatar7.jpg" alt="...">
							<div class="media-body">
								<h4 class="media-heading">Ernie Kyllonen</h4>
								<div class="media-heading-sub">
									Project Manager, <br> SmartBizz PTL
								</div>
							</div>
						</li>
						<li class="media"><img class="media-object" src="<?php echo base_url()?>themes/assets/layouts/layout/img/avatar8.jpg" alt="...">
							<div class="media-body">
								<h4 class="media-heading">Lisa Stone</h4>
								<div class="media-heading-sub">CTO, Keort Inc</div>
								<div class="media-heading-small">Last seen 13:10 PM</div>
							</div></li>
						<li class="media">
							<div class="media-status">
								<span class="badge badge-success">7</span>
							</div> <img class="media-object" src="<?php echo base_url()?>themes/assets/layouts/layout/img/avatar9.jpg" alt="...">
							<div class="media-body">
								<h4 class="media-heading">Deon Portalatin</h4>
								<div class="media-heading-sub">CFO, H&D LTD</div>
							</div>
						</li>
						<li class="media"><img class="media-object" src="<?php echo base_url()?>themes/assets/layouts/layout/img/avatar10.jpg" alt="...">
							<div class="media-body">
								<h4 class="media-heading">Irina Savikova</h4>
								<div class="media-heading-sub">CEO, Tizda Motors Inc</div>
							</div></li>
						<li class="media">
							<div class="media-status">
								<span class="badge badge-danger">4</span>
							</div> <img class="media-object" src="<?php echo base_url()?>themes/assets/layouts/layout/img/avatar11.jpg" alt="...">
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
								<img class="avatar" alt="" src="<?php echo base_url()?>themes/assets/layouts/layout/img/avatar3.jpg" />
								<div class="message">
									<span class="arrow"></span> <a href="javascript:;" class="name">Bob Nilson</a> <span class="datetime">20:15</span> <span class="body"> When could you send me the report ?
									</span>
								</div>
							</div>
							<div class="post in">
								<img class="avatar" alt="" src="<?php echo base_url()?>themes/assets/layouts/layout/img/avatar2.jpg" />
								<div class="message">
									<span class="arrow"></span> <a href="javascript:;" class="name">Ella Wong</a> <span class="datetime">20:15</span> <span class="body"> Its almost done. I will be sending it
										shortly </span>
								</div>
							</div>
							<div class="post out">
								<img class="avatar" alt="" src="<?php echo base_url()?>themes/assets/layouts/layout/img/avatar3.jpg" />
								<div class="message">
									<span class="arrow"></span> <a href="javascript:;" class="name">Bob Nilson</a> <span class="datetime">20:15</span> <span class="body"> Alright. Thanks! :) </span>
								</div>
							</div>
							<div class="post in">
								<img class="avatar" alt="" src="<?php echo base_url()?>themes/assets/layouts/layout/img/avatar2.jpg" />
								<div class="message">
									<span class="arrow"></span> <a href="javascript:;" class="name">Ella Wong</a> <span class="datetime">20:16</span> <span class="body"> You are most welcome. Sorry for the
										delay. </span>
								</div>
							</div>
							<div class="post out">
								<img class="avatar" alt="" src="<?php echo base_url()?>themes/assets/layouts/layout/img/avatar3.jpg" />
								<div class="message">
									<span class="arrow"></span> <a href="javascript:;" class="name">Bob Nilson</a> <span class="datetime">20:17</span> <span class="body"> No probs. Just take your time :) </span>
								</div>
							</div>
							<div class="post in">
								<img class="avatar" alt="" src="<?php echo base_url()?>themes/assets/layouts/layout/img/avatar2.jpg" />
								<div class="message">
									<span class="arrow"></span> <a href="javascript:;" class="name">Ella Wong</a> <span class="datetime">20:40</span> <span class="body"> Alright. I just emailed it to you. </span>
								</div>
							</div>
							<div class="post out">
								<img class="avatar" alt="" src="<?php echo base_url()?>themes/assets/layouts/layout/img/avatar3.jpg" />
								<div class="message">
									<span class="arrow"></span> <a href="javascript:;" class="name">Bob Nilson</a> <span class="datetime">20:17</span> <span class="body"> Great! Thanks. Will check it right
										away. </span>
								</div>
							</div>
							<div class="post in">
								<img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />
								<div class="message">
									<span class="arrow"></span> <a href="javascript:;" class="name">Ella Wong</a> <span class="datetime">20:40</span> <span class="body"> Please let me know if you have any
										comment. </span>
								</div>
							</div>
							<div class="post out">
								<img class="avatar" alt="" src="<?php echo base_url()?>themes/assets/layouts/layout/img/avatar3.jpg" />
								<div class="message">
									<span class="arrow"></span> <a href="javascript:;" class="name">Bob Nilson</a> <span class="datetime">20:17</span> <span class="body"> Sure. I will check and buzz you if
										anything needs to be corrected. </span>
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
						<li><a href="javascript:;">
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
						</a></li>
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
						<li><a href="javascript:;">
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
						</a></li>
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
						<li><a href="javascript:;">
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
						</a></li>
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
						<li><a href="javascript:;">
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
						</a></li>
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

	 //google.charts.load('visualization', '1', {'packages': ['geochart']});
     

     // google.load('visualization', '1', {'packages': ['barchart']});
     // google.setOnLoadCallback(drawBarChart);

     google.charts.load('current', {'packages':['bar','geochart']});
     google.charts.setOnLoadCallback(drawGeoLocationMap);
     google.charts.setOnLoadCallback(drawBarChart);
     google.charts.setOnLoadCallback(drawBarChart_1);

     function drawBarChart() 
    {
        $.ajax({
        type: 'POST',
        url: '<?php echo base_url();?>admin/dashboard/getCustomerSmsSentData',
          
        success: function (data1) 
        {      
        		if(data1.length>0)
        		{	
					      //   // Create our data table out of JSON data loaded from server.
					        var data = new google.visualization.DataTable();					  
					      
					        data.addColumn('string', '');
					        data.addColumn('number', 'Customers');
					        data.addColumn('number', 'SMS Sent');
					        
					        var jsonData = $.parseJSON(data1);
					      
					        for (var i = 0; i < jsonData.length; i++) 
					        {
					              data.addRow([jsonData[i].customer_mnths, parseInt(jsonData[i].total_customer), parseInt(jsonData[i].total_sms_sent)]);
					        }
					        var options_bar_chart = {
							        bars:'vertical',
							        vAxis:{format:'decimal',title:''},
							        height: 280 
							      };
					      var chart = new google.charts.Bar(document.getElementById('bar_chart_sms'));
					      chart.draw(data, google.charts.Bar.convertOptions(options_bar_chart));
			  	}
			  	else
			  	{
			  			$("#bar_chart_sms").html('<div style="text-align:center;margin-top: 100px;"><b>No data found</b></div>');	
			  	}
       }
     });
    }

	function drawBarChart_1() 
    {   
		        $.ajax({
		        type: 'POST',
		        url: '<?php echo base_url();?>admin/dashboard/getAllCustomerAddedTrends',		          
		        success: function (data1) 
		        {
		        		if(data1.length>0)
		        		{
						        // Create our data table out of JSON data loaded from server.
						        var data = new google.visualization.DataTable();
						        data.addColumn('string', '');
						        data.addColumn('number', 'Customers');
						        
						        var jsonData = $.parseJSON(data1);
						      
						        for (var i = 0; i < jsonData.length; i++) 
						        {
						              data.addRow([jsonData[i].visitor_year, parseInt(jsonData[i].total_visitors)]);
						        }
						        var options_bar_chart = {
						        bars:'vertical',
						        vAxis:{format:'decimal',title:'Customers'},
						        height: 280 
						      };
						      var chart = new google.charts.Bar(document.getElementById('bar_chart_trends'));
						      chart.draw(data, google.charts.Bar.convertOptions(options_bar_chart));
					  	}
					  	else
					  	{
					  		  $("#bar_chart_trends").html('<div style="text-align:center;margin-top: 100px;"><b>No data found</b></div>');	
					  	}
		       }
		     });
    }     

    function drawGeoLocationMap() 
    {
      // Create our data table out of JSON data loaded from server.

            var data = new google.visualization.arrayToDataTable([
               ['City', 'Total'],
               <?php
                $branch_id=$this->session->userdata('branch_id');    

                $result_city_data=$this->db->query("select ct.cty_name,count(vs.vis_cityId_fk) as total_visitors from tblmvbvisitors vs left join tblmvbcity ct on (vs.vis_cityId_fk=ct.cty_id_pk) where vs.vis_branchId_fk='".$branch_id."' group by vs.vis_cityId_fk");

                $row_city_data=$result_city_data->result();

                if(count($row_city_data)>0)
                {
			                for($b=0;$b<count($row_city_data);$b++)
			                {
			                    //["mumbai",7172091],["pune",420556]
			                    //echo '["Pune",12]';
			                    echo '["'.$row_city_data[$b]->cty_name.'",'.$row_city_data[$b]->total_visitors.'],';
			                }
			    ?>]);    

			              //console.log(data);              

				            var options = 
				            {
				                    region: 'IN',
				                    displayMode: 'markers',
				                    colorAxis: {colors: ['green', 'blue','orange']},
				                    width:617,
				                    height:200
				            };

				          var chart = new google.visualization.GeoChart(document.getElementById('geo_chart'));
				          chart.draw(data, options);
				<?php          
			    }
			    else
			    {
			    ?>	
			    		  $("#geo_chart").html('<div style="text-align:center;margin-top: 100px;"><b>No data found</b></div>');
			    <?php }
			    ?>   
    }


       
    function getAllStateList(country_id)
    {
    			$.post("<?php echo base_url();?>admin/dashboard/getAllStateList",{countryId:country_id},function(data)
		        {
		                $("#selstate").html(data);
		        });
    }

    function getAllCityList(state_id)
    {
    			$.post("<?php echo base_url();?>admin/dashboard/getAllCityList",{stateId:state_id},function(data)
		        {
		                $("#selcity").html(data);
		        });
    }


</script>


<!-- <div id="geo_chart" style="width: 910px; height: 510px;"></div> -->