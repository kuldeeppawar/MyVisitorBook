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
								<li><a href="<?php echo base_url()?>admin/user_management"><span><?php getLocalkeyword('User Management');?> </span>></a><i class="fa fa-circle"></i></li>
								<li><span><?php getLocalkeyword('Add New User');?>Add New User</span></li>
							</ul>
						</div>
						<div class="col-md-6">
							<div id="reportrange" class="pull-right " style="padding-top: 14px;">
								<i class="fa fa-calendar"></i> &nbsp; <span class="thin uppercase hidden-xs">August 28, 2016 - September 26, 2016</span> <b class="fa fa-angle-down"></b>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="">
							<form role="form" action="<?php echo base_url()?>admin/user_management/addUser" method="post">
								<div class="form-body mtop10">
									<div class="col-md-3">
										<div class="form-group">
											<label><?php getLocalkeyword('Select Title');?> </label><select class="form-control" id="selUsertitle" name="selUsertitle" required onchange="getStateCountry(this.value)">
												<option value="">Select Title</option>
												<option value="Mr">Mr</option>
												<option value="Miss">Miss</option>
												<option value="Shri">Shri</option>
											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label><?php getLocalkeyword('First Name');?> </label> <input type="text" class="form-control" placeholder="First name" name="txtUsername" id="txtUsername" required>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label><?php getLocalkeyword('Middle Name');?> </label> <input type="text" class="form-control" placeholder="Middle Name" id="txtMiddlename" name="txtMiddlename" required>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label><?php getLocalkeyword('Last Name');?> </label> <input type="text" class="form-control" placeholder="Last Name" id="txtLastname" name="txtLastname">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label><?php getLocalkeyword('Select branch');?> <span class="mandatory">*</span></label> <select class="form-control" name="selBranch" id-="selbranch" required="required">
												<?php
												for($i=0;$i < count($resultBranch);$i ++)
												{
												
												 if($this->session->userdata('branch_id')==$resultBranch[$i]->brn_id_pk)
												 {	
												  ?>
                                                  <option value="<?php echo $resultBranch[$i]->brn_id_pk;?>" >
												  <?php echo $resultBranch[$i]->brn_name;?></option>
											 	  <?php
												 }
												}
												?>
                                            </select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label><?php getLocalkeyword('Select User Type');?> <span class="mandatory">*</span></label> <select class="form-control" name="selUsertype" id="selUsertype" required="required">
												<option value="">Select Usertype</option>
												<?php
												for($i=0;$i < count($resultUsertype);$i ++)
												{
													?>
                                                <option value="<?php echo $resultUsertype[$i]->utyp_id_pk;?>" <?php if($resultUsertype[$i]->utyp_status==0){  echo "disabled"; } ?>>
												<?php echo $resultUsertype[$i]->utyp_userType;?></option>
												<?php
												}
												?>
                                            </select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label><?php getLocalkeyword('Mobile No.');?></label> <input type="text" name="txtMobile" id="txtMobile" required="required" class="form-control" placeholder="Enter Mobile No. ">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label><?php getLocalkeyword('Email Id');?> </label> <input type="text" name="txtEmail" id="txtEmail" required="required" class="form-control" placeholder="Enter Email Id  " onblur="getValidateemail(this.value)">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label><?php getLocalkeyword('Address');?></label>
											<div class="form-group">
												<textarea class="form-control" rows="1" name="txtAddress" id="txtAddress" required="required" placeholder="Type Address"> </textarea>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label><?php getLocalkeyword('Country');?><span class="mandatory">*</span></label> 
											<select class="form-control" name="selCountry" id="selCountry" required="required" onfocus="getStateCountry(this.value)">
											<option value="">Select Country</option>
                                            <?php
													for($i=0;$i<count($resultCountry);$i++)
													{
											?>	
                                                			<option value="<?php echo $resultCountry[$i]->cntr_id_pk;?>" 
                                                			<?php if($resultCountry[$i]->cntr_status==0)
                                                				  {  
                                                				  	echo "disabled"; 
                                                				  } 
                                                			?>>	
															<?php echo $resultCountry[$i]->cntr_name;?></option>	
											<?php
													}
											?>
                                            </select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label><?php getLocalkeyword('State');?></label> <select class="form-control" onchange="getCity(this.value)" name="selState" id="selState" required="required">
											</select>
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="col-md-3">
										<div class="form-group">
											<label><?php getLocalkeyword('City');?></label> <select class="form-control" name="selCity" id="selCity" required="required">
											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="mt34">
											<label class="radio-inline"><input type="radio" value="1" name="optradio" id="auto_pwd"><?php getLocalkeyword('Generate Auto');?></label> <label class="radio-inline"><input type="radio" value="0" name="optradio" id="manual_pwd">Generate Manually</label>
										</div>
									</div>
									<div class="automatic" style="display: none;">
										<div class="col-md-3">
											<div class="form-group">
												<label><?php getLocalkeyword('Password');?></label><br> <label style="padding: 8px 0px 0 0;; color: #337ab7;" id="lblAutopassword"></label> <input type="hidden" name="txtAutopassword" id="txtAutopassword">
											</div>
										</div>
									</div>
									<div class="manual" style="display: none;">
										<div class="col-md-3">
											<div class="form-group">
												<label><?php getLocalkeyword('Password');?></label> <input type="text" autocomplete="off" name="txtPassword" id="txtPassword" class="form-control" placeholder="Enter Password">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label><?php getLocalkeyword('Confirm Password');?></label> <input type="text" autocomplete="off" name="txtConfirmpassword" id="txtConfirmpassword" class="form-control" onblur="validatePassword(this.value)" placeholder="Confirm your Password">
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="modal-footer">
										<button type="submit" name="btnSubmit" class="btn btn-primary"><?php getLocalkeyword('Save');?></button>
										<a href="<?php echo base_url()?>admin/user_management" class="btn btn-danger"><?php getLocalkeyword('Cancel');?></a>
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
							</div></li>
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
							</div></li>
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
							</div></li>
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
							</div></li>
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
						<li>Enable Notifications <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF">
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
						<li>Notify On System Error <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF">
						</li>
						<li>Notify On SMTP Error <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF">
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

$("#new_user_frm").validate({
			    rules:{
			    	selUsertitle:{
			    		required:true
			    	},             
			    	selUsertype:{
			            required:true
			        },
			        txtUsername:{
			            required:true
			        },
			        txtMiddlename:{
			            required:true
			        },
			        txtLastname:{
			            required:true
			        },
			        txtMobile:{
			        	required:true
			        },
			        txtEmail:{
			            required:true
			        },
			        selCountry:{
			            required:true
			        },
			        selLocations:{
			            required:true
			        },
			        txtDescription:{
			            required:true
			        },
			        optradio:{
			            required:true
			        }
			    },
			    errorPlacement:
		          function(error, element){
		              if(element.is(":radio")){ 
		                  error.appendTo(element.parent().next());
		          }else{ 
		                  error.insertAfter(element); 
		               }
		          },
			    messages:{
			    	selUsertitle:{
			    		required:"Please select title"
			    	}                      
			    	selUsertype:{
			            required:"Please select user type"
			        },
			        txtUsername:{
			            required:"Please enter username"
			        },
			        txtMiddlename:{
			            required:"Please enter middle name"
			        },
			        txtLastname:{
			            required:"Please enter last name"
			        },
			        txtMobile:{
			        	required:"Please enter mobile number"
			        },
			        txtEmail:{
			            required:"Please enter name"
			        },
			        selCountry:{
			            required:"Please select country"
			        },
			        selLocations:{
			            required:"Please select location"
			        },
			        txtDescription:{
			            required:"Please enter description"
			        },
			        optradio:{
			            required:"Please select password mode"
			        }
			    }
			});


function getCity(val)
{	  
    
            $.post("<?php echo base_url();?>admin/user_management/getCity",{val:val},
            function(data){  
                $('#selCity').html(data);
            });
}

function getStateCountry(val)
{
			alert('');

            $.post("<?php echo base_url();?>admin/user_management/getState",{val:val},
            function(data){ 
                $('#selState').html(data);         
            }); 
}


        //---Function Used Validate Email--//
        function getValidateemail(value){
            $.post("<?php echo base_url();?>admin/user_management/getValidateemail",
            {
                email:value
            },
            function(data)
            {
                if(data==1)
                {
                    alert("Email Allready Used");
                    var au="";
                    $("#txtEmail").val(au);
                }
            });
        }

        function validatePassword(val)
        {
            var password = document.getElementById("txtPassword");
            
	        var confirm_password = document.getElementById("txtConfirmpassword");
	        if(password.value != confirm_password.value)
	        {
	            confirm_password.setCustomValidity("Passwords Don't Match");
	                        alert("Password Mismatch");
	                        password.value="";
	                       confirm_password.value="";
	        }
	        else
	        {
	        }
        }
    </script>