
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
							<li><a href="<?php echo base_url()?>admin/dashboard">Home</a> <i class="fa fa-circle"></i></li>
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
					<h4 style="color: #ed6b75; margin-bottom: 32px; margin-top: 28px;" class="blink">Welcome <?php echo $this->session->userdata('admin_admin_name');?>, Good Morning..!</h4>
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
			<?php /*?><div class="row">
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
					<li class="panel1 col-md-6">
						<form id="quick_add_form" name="quick_add_form" method="POST" action="<?php echo base_url()?>admin/dashboard/addQuickVisitor">
							<h4 class="text-center panel-heading1" style="color: #000;">
								Quick Add<span class="movable"><img src="<?php echo base_url()?>themes/assets/move_icon.png"</span>
							</h4>
							<div class="row">
								<div class="col-md-4 form-group">
									<select class="form-control" id="" name="seltitle" id="seltitle">
										<option>Title</option>
										<option>title name</option>
									</select>
								</div>
								<div class="col-md-4 form-group">
									<input type="text" class="form-control" placeholder="First name" id="txtfirstname" name="txtfirstname">
								</div>
								<div class="col-md-4 form-group">
									<input type="text" class="form-control" placeholder="Middle name" id="txtmiddlename" name="txtmiddlename">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4 form-group">
									<input type="text" class="form-control" placeholder="Last name" id="txtlastname" name="txtlastname">
								</div>
								<div class="col-md-4 form-group">
									<input type="text" class="form-control" placeholder="Mobile no." id="txtmobile" name="txtmobile">
								</div>
								<div class="col-md-4 form-group">
									<input type="text" class="form-control" placeholder="Email id" id="txtemail" name="txtemail">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4 form-group">
									<input type="text" class="form-control" placeholder="Business name" id="txtbusiness" name="txtbusiness">
								</div>
								<div class="col-md-4 form-group">
									<input type="text" class="form-control" placeholder="DOB" id="txtdob" name="txtdob">
								</div>
								<div class="col-md-4 form-group">
									<input type="text" class="form-control" placeholder="Anniversary Date" id="txtanniversary" name="txtanniversary">
								</div>
							</div>
							<div class=" form-group">
								<textarea class="form-control" rows="3" placeholder=" Note" id="txtnote" name="txtnote"></textarea>
							</div>
							<button class="btn btn-danger pull-right" style="margin-top: 8px;" type="submit">Save</button>
						</form>
					</li>
					<li class="panel1 col-md-6">
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
						</table> <a href="latest5_visitors.html">
							<a class="btn btn-danger pull-right" href="<?php echo base_url();?>admin/latest_visitors">View More</a>
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
						</table> <a href="recent5_revisits.html">
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
									<td>Rahul joshi</td>
									<td>9865745896</td>
									<td>17/6/2016</td>
									<td>DOB</td>
								</tr>
							<?php
							}
							?>	
							</tbody>
						</table> <a href="Upcoming_bda_anive.html">
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
						</table> <a href="top5_visitors.html">
							<button class="btn btn-danger pull-right">View More</button>
					</a>
					</li>
					<li class="panel1 col-md-6">
						<h4 class="text-center panel-heading1" style="color: #000;">
							Recent Activities<span class="movable"><img src="<?php echo base_url()?>themes/assets/move_icon.png"</span>
						</h4>
						<div class="charts">
							<ul class="list-group">
								<li class="list-group-item">Cellx : <span class="badge badge-default">Ravi Mane </span>
								</li>
								<li class="list-group-item">Client-side Scripting : <span class="badge badge-success"> New Visitor Added</span>
								</li>
								<li class="list-group-item">Nilesh Rodge : <span class="badge badge-danger"> Revisit</span>
								</li>
							</ul>
						</div>
					</li>
					<li class="panel1 col-md-6">
						<h4 class="text-center panel-heading1" style="color: #000;">
							Customer Added Trend<span class="movable"><img src="<?php echo base_url()?>themes/assets/move_icon.png"</span>
						</h4>
						<div class="charts">
							<img src="<?php echo base_url()?>themes/assets/graph1.jpg" style="width: 100%; height: 197px;">
						</div>
					</li>
					<li class="panel1 col-md-6">
						<h4 class="text-center panel-heading1" style="color: #000;">
							Customer Vs SMS Sent<span class="movable"><img src="<?php echo base_url()?>themes/assets/move_icon.png"</span>
						</h4>
						<div class="charts">
							<img src="<?php echo base_url()?>themes/assets/graph2.jpg" style="width: 100%; height: 197px;">
						</div>
					</li>
					<li class="panel1 col-md-6">
						<h4 class="text-center panel-heading1" style="color: #000;">
							Heat Map-Location Wise Visitors<span class="movable"><img src="<?php echo base_url()?>themes/assets/move_icon.png"</span>
						</h4>
						<div class="charts">
							<img src="<?php echo base_url()?>themes/assets/map.jpg" style="width: 100%; height: 197px;">
						</div>
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
<!-- END CONTAINER --><?php */?>
