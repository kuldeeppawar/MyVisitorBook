<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8" />
<title>MyVisitorsBook</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport" />
<meta content="" name="description" />
<meta content="" name="author" />
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>themes/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>themes/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>themes/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>themes/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>themes/assets/global/plugins/bootstrap-summernote/summernote.css" rel="stylesheet" type="text/css" />
<!-- END GLOBAL MANDATORY STYLES -->

<link href="<?php echo base_url();?>themes/assets/global/plugins/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>themes/assets/global/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>themes/assets/global/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL STYLES -->
<link href="<?php echo base_url();?>themes/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
<link href="<?php echo base_url();?>themes/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>themes/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>themes/assets/apps/css/ticket.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>themes/assets/custom.css" rel="stylesheet" type="text/css" />
<!-- END THEME GLOBAL STYLES -->
<!-- BEGIN THEME LAYOUT STYLES -->
<link href="<?php echo base_url();?>themes/assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>themes/assets/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
<link href="<?php echo base_url();?>themes/assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>themes/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>themes/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>themes/assets/pages/css/profile.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>themes/assets/hover.css" rel="stylesheet" media="all">
<link href="<?php echo base_url();?>themes/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>themes/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>themes/assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" type="text/css" />
<!-- END THEME LAYOUT STYLES -->
<!-- <script src="<?php //echo base_url();?>themes/assets/global/plugins/jquery.min.js" type="text/javascript"></script> -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="<?php echo base_url();?>themes/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<link rel="shortcut icon" href="favicon.ico" />
<style type="text/css">
.page-header-fixed .page-container {
	margin-top: 42px;
}

.page-content-wrapper1 {
	float: left;
	width: 100%;
}

.user_list_box {
	overflow: auto;
}

.fa-2x {
	font-size: 20px !important;
}

.dropdown-menu {
	min-width: 70px !important;
	margin-right: 10px;
}

.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover
	{
	color: #555;
	background-color: #fff;
	border: 1px solid #ddd;
	border-bottom-color: transparent;
	cursor: default;
	border-bottom: solid 3px #337ab7 !important;
}

.send_sms {
	z-index: 999999 !important;
}

.error{
 color:#e73d4a
}
</style>
</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-content-white page-sidebar-closed">
	<div class="page-wrapper">
		<div class="page-header navbar navbar-fixed-top">
			<div class="page-header-inner ">
				<!-- BEGIN LOGO -->
				<div class="page-logo">
					<a href="<?php echo base_url()?>head/dashboard"> <img src="<?php echo base_url();?>themes/assets/layouts/layout/img/logo.png" alt="logo" class="logo-default" />
					</a>
					<div class="menu-toggler sidebar-toggler">
						<span></span>
					</div>
				</div>
				<!-- END LOGO -->
				<!-- BEGIN RESPONSIVE MENU TOGGLER -->
				<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> <span></span>
				</a>
				<!-- END RESPONSIVE MENU TOGGLER -->
				<!-- BEGIN TOP NAVIGATION MENU -->
				<div class="top-menu">
					<ul class="nav navbar-nav pull-right">
						<li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
							<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"
							data-hover="dropdown" data-close-others="true" title="Sender Id Request" onclick="getAllRequestDetails('sender_id')"> <i class="icon-bell"></i> <span class="badge badge-default" id="notify_senderid_request">  </span>
							</a>
							<ul class="dropdown-menu">
								<li class="external">
									<!-- <h3>
										<span class="bold">12 pending</span> notifications
									</h3> <a href="page_user_profile_1.html">view all</a> -->
								</li>
								<li>
									<ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283" id="show_senderid_details">
									
									</ul>
								</li>
							</ul>
						</li>
						<!-- END NOTIFICATION DROPDOWN -->
						<!-- BEGIN INBOX DROPDOWN -->
						<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
						<li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
							<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" title="SMS Template Request" onclick="getAllRequestDetails('sms_temp')"> <i class="icon-envelope-open"></i> <span class="badge badge-default" id="notify_sms_temp_id">  </span>
							</a>
							<ul class="dropdown-menu">
								<li class="external">
									<!-- <h3>
										<span class="bold">12 pending</span> notifications
									</h3> <a href="page_user_profile_1.html">view all</a> -->
								</li>
								<li>
									<ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283" id="show_smstemp_details">
										
									</ul>
								</li>
							</ul></li>
						<!-- END INBOX DROPDOWN -->
						<!-- BEGIN TODO DROPDOWN -->
						<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
						<li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
							<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
								data-close-others="true" title="Email Template Request" onclick="getAllRequestDetails('email_temp')"> <i class="icon-envelope-open"></i> <span class="badge badge-default" id="notify_email_temp_id">  </span>
							</a>
							<ul class="dropdown-menu extended tasks">
								<li class="external">
									<!-- <h3>
										You have <span class="bold">12 pending</span> tasks
									</h3> <a href="app_todo.html">view all</a> -->
								</li>
								<li>
									<ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283" id="show_emailtemp_details">
									
									</ul>
								</li>
							</ul></li>
						<!-- END TODO DROPDOWN -->
						<!-- BEGIN USER LOGIN DROPDOWN -->
						<li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
							<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
								data-close-others="true" title="OPT Request" onclick="getAllRequestDetails('opt_request')"> <i class="icon-envelope-open"></i> <span class="badge badge-default" id="notify_otp_request">  </span>
							</a>
							<ul class="dropdown-menu extended tasks">
								<li class="external">
									<!-- <h3>
										You have <span class="bold">12 pending</span> tasks
									</h3> <a href="app_todo.html">view all</a> -->
								</li>
								<li>
									<ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283" id="show_opt_details">
									
									</ul>
								</li>
							</ul></li>

						<?php /*?>
						<!-- BEGIN NOTIFICATION DROPDOWN -->
						<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
						<li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"
							data-hover="dropdown" data-close-others="true" title="Sender Id Request"> <i class="icon-bell"></i> <span class="badge badge-default"> 7 </span>
						</a>
							<ul class="dropdown-menu">
								<li class="external">
									<h3>
										<span class="bold">12 pending</span> notifications
									</h3> <a href="page_user_profile_1.html">view all</a>
								</li>
								<li>
									<ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
										<li><a href="javascript:;"> <span class="time">just now</span> <span class="details"> <span class="label label-sm label-icon label-success"> <i class="fa fa-plus"></i>
												</span> New user registered.
											</span>
										</a></li>
										<li><a href="javascript:;"> <span class="time">3 mins</span> <span class="details"> <span class="label label-sm label-icon label-danger"> <i class="fa fa-bolt"></i>
												</span> Server #12 overloaded.
											</span>
										</a></li>
										<li><a href="javascript:;"> <span class="time">10 mins</span> <span class="details"> <span class="label label-sm label-icon label-warning"> <i class="fa fa-bell-o"></i>
												</span> Server #2 not responding.
											</span>
										</a></li>
										<li><a href="javascript:;"> <span class="time">14 hrs</span> <span class="details"> <span class="label label-sm label-icon label-info"> <i class="fa fa-bullhorn"></i>
												</span> Application error.
											</span>
										</a></li>
										<li><a href="javascript:;"> <span class="time">2 days</span> <span class="details"> <span class="label label-sm label-icon label-danger"> <i class="fa fa-bolt"></i>
												</span> Database overloaded 68%.
											</span>
										</a></li>
										<li><a href="javascript:;"> <span class="time">3 days</span> <span class="details"> <span class="label label-sm label-icon label-danger"> <i class="fa fa-bolt"></i>
												</span> A user IP blocked.
											</span>
										</a></li>
										<li><a href="javascript:;"> <span class="time">4 days</span> <span class="details"> <span class="label label-sm label-icon label-warning"> <i class="fa fa-bell-o"></i>
												</span> Storage Server #4 not responding dfdfdfd.
											</span>
										</a></li>
										<li><a href="javascript:;"> <span class="time">5 days</span> <span class="details"> <span class="label label-sm label-icon label-info"> <i class="fa fa-bullhorn"></i>
												</span> System Error.
											</span>
										</a></li>
										<li><a href="javascript:;"> <span class="time">9 days</span> <span class="details"> <span class="label label-sm label-icon label-danger"> <i class="fa fa-bolt"></i>
												</span> Storage server failed.
											</span>
										</a></li>
									</ul>
								</li>
							</ul></li>
						<!-- END NOTIFICATION DROPDOWN -->
						<!-- BEGIN INBOX DROPDOWN -->
						<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
						<li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
							data-close-others="true" title="SMS Template Request"> <i class="icon-envelope-open"></i> <span class="badge badge-default"> 4 </span>
						</a>
							<ul class="dropdown-menu">
								<li class="external">
									<h3>
										<span class="bold">12 pending</span> notifications
									</h3> <a href="page_user_profile_1.html">view all</a>
								</li>
								<li>
									<ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
										<li><a href="javascript:;"> <span class="time">just now</span> <span class="details"> <span class="label label-sm label-icon label-success"> <i class="fa fa-plus"></i>
												</span> New user registered.
											</span>
										</a></li>
										<li><a href="javascript:;"> <span class="time">3 mins</span> <span class="details"> <span class="label label-sm label-icon label-danger"> <i class="fa fa-bolt"></i>
												</span> Server #12 overloaded.
											</span>
										</a></li>
										<li><a href="javascript:;"> <span class="time">10 mins</span> <span class="details"> <span class="label label-sm label-icon label-warning"> <i class="fa fa-bell-o"></i>
												</span> Server #2 not responding.
											</span>
										</a></li>
										<li><a href="javascript:;"> <span class="time">14 hrs</span> <span class="details"> <span class="label label-sm label-icon label-info"> <i class="fa fa-bullhorn"></i>
												</span> Application error.
											</span>
										</a></li>
										<li><a href="javascript:;"> <span class="time">2 days</span> <span class="details"> <span class="label label-sm label-icon label-danger"> <i class="fa fa-bolt"></i>
												</span> Database overloaded 68%.
											</span>
										</a></li>
										<li><a href="javascript:;"> <span class="time">3 days</span> <span class="details"> <span class="label label-sm label-icon label-danger"> <i class="fa fa-bolt"></i>
												</span> A user IP blocked.
											</span>
										</a></li>
										<li><a href="javascript:;"> <span class="time">4 days</span> <span class="details"> <span class="label label-sm label-icon label-warning"> <i class="fa fa-bell-o"></i>
												</span> Storage Server #4 not responding dfdfdfd.
											</span>
										</a></li>
										<li><a href="javascript:;"> <span class="time">5 days</span> <span class="details"> <span class="label label-sm label-icon label-info"> <i class="fa fa-bullhorn"></i>
												</span> System Error.
											</span>
										</a></li>
										<li><a href="javascript:;"> <span class="time">9 days</span> <span class="details"> <span class="label label-sm label-icon label-danger"> <i class="fa fa-bolt"></i>
												</span> Storage server failed.
											</span>
										</a></li>
									</ul>
								</li>
							</ul></li>
						<!-- END INBOX DROPDOWN -->
						<!-- BEGIN TODO DROPDOWN -->
						<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
						<li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
							data-close-others="true" title="Email Template Request"> <i class="icon-envelope-open"></i> <span class="badge badge-default"> 3 </span>
						</a>
							<ul class="dropdown-menu extended tasks">
								<li class="external">
									<h3>
										You have <span class="bold">12 pending</span> tasks
									</h3> <a href="app_todo.html">view all</a>
								</li>
								<li>
									<ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
										<li><a href="javascript:;"> <span class="task"> <span class="desc">New release v1.2 </span> <span class="percent">30%</span>
											</span> <span class="progress"> <span style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"> <span
														class="sr-only">40% Complete</span>
												</span>
											</span>
										</a></li>
										<li><a href="javascript:;"> <span class="task"> <span class="desc">Application deployment</span> <span class="percent">65%</span>
											</span> <span class="progress"> <span style="width: 65%;" class="progress-bar progress-bar-danger" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"> <span
														class="sr-only">65% Complete</span>
												</span>
											</span>
										</a></li>
										<li><a href="javascript:;"> <span class="task"> <span class="desc">Mobile app release</span> <span class="percent">98%</span>
											</span> <span class="progress"> <span style="width: 98%;" class="progress-bar progress-bar-success" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100"> <span
														class="sr-only">98% Complete</span>
												</span>
											</span>
										</a></li>
										<li><a href="javascript:;"> <span class="task"> <span class="desc">Database migration</span> <span class="percent">10%</span>
											</span> <span class="progress"> <span style="width: 10%;" class="progress-bar progress-bar-warning" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"> <span
														class="sr-only">10% Complete</span>
												</span>
											</span>
										</a></li>
										<li><a href="javascript:;"> <span class="task"> <span class="desc">Web server upgrade</span> <span class="percent">58%</span>
											</span> <span class="progress"> <span style="width: 58%;" class="progress-bar progress-bar-info" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100"> <span
														class="sr-only">58% Complete</span>
												</span>
											</span>
										</a></li>
										<li><a href="javascript:;"> <span class="task"> <span class="desc">Mobile development</span> <span class="percent">85%</span>
											</span> <span class="progress"> <span style="width: 85%;" class="progress-bar progress-bar-success" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"> <span
														class="sr-only">85% Complete</span>
												</span>
											</span>
										</a></li>
										<li><a href="javascript:;"> <span class="task"> <span class="desc">New UI release</span> <span class="percent">38%</span>
											</span> <span class="progress progress-striped"> <span style="width: 38%;" class="progress-bar progress-bar-important" aria-valuenow="18" aria-valuemin="0"
													aria-valuemax="100"> <span class="sr-only">38% Complete</span>
												</span>
											</span>
										</a></li>
									</ul>
								</li>
							</ul></li>
						<!-- END TODO DROPDOWN -->
						<!-- BEGIN USER LOGIN DROPDOWN -->
						<li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
							data-close-others="true" title="OPT Request"> <i class="icon-envelope-open"></i> <span class="badge badge-default"> 3 </span>
						</a>
							<ul class="dropdown-menu extended tasks">
								<li class="external">
									<h3>
										You have <span class="bold">12 pending</span> tasks
									</h3> <a href="app_todo.html">view all</a>
								</li>
								<li>
									<ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
										<li><a href="javascript:;"> <span class="task"> <span class="desc">New release v1.2 </span> <span class="percent">30%</span>
											</span> <span class="progress"> <span style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"> <span
														class="sr-only">40% Complete</span>
												</span>
											</span>
										</a></li>
										<li><a href="javascript:;"> <span class="task"> <span class="desc">Application deployment</span> <span class="percent">65%</span>
											</span> <span class="progress"> <span style="width: 65%;" class="progress-bar progress-bar-danger" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"> <span
														class="sr-only">65% Complete</span>
												</span>
											</span>
										</a></li>
										<li><a href="javascript:;"> <span class="task"> <span class="desc">Mobile app release</span> <span class="percent">98%</span>
											</span> <span class="progress"> <span style="width: 98%;" class="progress-bar progress-bar-success" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100"> <span
														class="sr-only">98% Complete</span>
												</span>
											</span>
										</a></li>
										<li><a href="javascript:;"> <span class="task"> <span class="desc">Database migration</span> <span class="percent">10%</span>
											</span> <span class="progress"> <span style="width: 10%;" class="progress-bar progress-bar-warning" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"> <span
														class="sr-only">10% Complete</span>
												</span>
											</span>
										</a></li>
										<li><a href="javascript:;"> <span class="task"> <span class="desc">Web server upgrade</span> <span class="percent">58%</span>
											</span> <span class="progress"> <span style="width: 58%;" class="progress-bar progress-bar-info" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100"> <span
														class="sr-only">58% Complete</span>
												</span>
											</span>
										</a></li>
										<li><a href="javascript:;"> <span class="task"> <span class="desc">Mobile development</span> <span class="percent">85%</span>
											</span> <span class="progress"> <span style="width: 85%;" class="progress-bar progress-bar-success" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"> <span
														class="sr-only">85% Complete</span>
												</span>
											</span>
										</a></li>
										<li><a href="javascript:;"> <span class="task"> <span class="desc">New UI release</span> <span class="percent">38%</span>
											</span> <span class="progress progress-striped"> <span style="width: 38%;" class="progress-bar progress-bar-important" aria-valuenow="18" aria-valuemin="0"
													aria-valuemax="100"> <span class="sr-only">38% Complete</span>
												</span>
											</span>
										</a></li>
									</ul>
								</li>
							</ul></li>
							<?php */?>
						<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
						<li class="dropdown dropdown-user"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> <img alt=""
								class="img-circle" src="<?php echo base_url();?>themes/assets/layouts/layout/img/avatar3_small.jpg" /> <span class="username username-hide-on-mobile"> 
								<?php echo $this->session->userdata('admin_name'); ?> </span> <i
								class="fa fa-angle-down"></i>
						</a>
							<ul class="dropdown-menu dropdown-menu-default">
								<li><a href="<?php echo base_url()?>head/user_management/userProfile"> <i class="icon-user"></i> My Profile
								</a></li>
								<li><a href="<?php echo base_url()?>head/send_message"> <i class="icon-envelope-open"></i> Send Message
								</a></li>
								<li><a href="#" data-toggle="modal" data-target="#changeLanguages"> <i class="fa fa-language"></i> Change Language
								</a></li>
								<li><a href="<?php echo base_url()?>head/logout"> <i class="icon-key"></i> Log Out
								</a></li>
							</ul></li>
						<!-- END USER LOGIN DROPDOWN -->
						<!-- BEGIN QUICK SIDEBAR TOGGLER -->
						<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
						<!-- END QUICK SIDEBAR TOGGLER -->
					</ul>
				</div>
				<!-- END TOP NAVIGATION MENU -->
			</div>
			<!-- END HEADER INNER -->
		</div>
		
				  <div id="changeLanguages" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="col-md-10">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h2 class="modal-title text-left"><?php getLocalkeyword('Select Language');?></h2>
						</div>
						<div class="modal-body">
							<div class="portlet-body form">
								<form role="form" id="frmLanguage" action="<?php echo base_url()?>head/user_management/selectLanguage" method="post" enctype="multipart/form-data">
									<div class="form-body">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label><?php getLocalkeyword('Select Language');?><span class="mandatory"></span></label>
													<select name="selLanguage" id="selLanguage" required="required" class="form-control">
													  <option value="">Select Language</option>
													 <?php 
													 $headId=$this->session->userdata('admin_id');
													 $result=$this->db->query("SELECT `sysmu_id_pk`,`sysmu_languageId_fk` FROM `tblmvbsysmainusers` WHERE sysmu_id_pk='".$headId."'");
													 $result=$result->result();
													 $lngId=$result[0]->sysmu_languageId_fk;
													    
													     $result=$this->db->query("SELECT `lng_id_pk`, `lng_name`, `lng_createdDate`, `lng_status`
													     	                       FROM `tblmvblanguages` where lng_status='1'");
													     $result=$result->result();
													     for($i=0;$i<count($result);$i++)
													     {	
													     	?>
													     	
													     	<option value="<?php echo $result[$i]->lng_id_pk?>"
													     	<?php if($lngId==$result[$i]->lng_id_pk){ echo "selected";}?>
													     	><?php echo $result[$i]->lng_name?></option>
													     	<?php 
													     }
													 ?>
													 </select>
												</div>
											  
												
												<div class="modal-footer">
												
													<button type="submit" name="btnSubmit" class="btn btn-primary"><?php getLocalkeyword('Save');?></button>
													<button type="button"   data-dismiss="modal" class="btn btn-danger"><?php getLocalkeyword('Cancel');?></button>
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
	  <script>
	  $(document).ready(function(){
		   $("#frmLanguage").validate({
		  	
		      rules:{             
		    	  selLanguage:{
		              required:true
		          }	        
		      },
		      messages:{                      
		      	
		    	  selLanguage:{
		              required:"Please Select Language"
		          }  		        
		      }
		  });
	  });

	  </script>	

		<script type="text/javascript">
			
			$(function() {

				getStatus();

			});

			function getStatus() {
				$.ajax({
			        type : "POST",
			        url : "<?php echo base_url();?>head/getAllHeaderDetails",
			        success : function(data)
			        {
			        	var parts_data=data.split('~');       	
			            $("#notify_senderid_request").html(parts_data[0]);            
				        $('#notify_sms_temp_id').html(parts_data[1]);
				        $('#notify_email_temp_id').html(parts_data[2]);
				        $('#notify_otp_request').html(parts_data[3]);    				        
			        }
			    });	
				
				setTimeout("getStatus()",60000);
			}


			function getAllRequestDetails(type)
			{
					if(type=='sender_id')
					{
							$.post("<?php echo base_url();?>head/getAllRequestDetails",{notify:type},function(data)
                            {
                            		//alert(data);
                               		$("#show_senderid_details").html(data);
                            });							
					}
					else if(type=='sms_temp')
					{
							$.post("<?php echo base_url();?>head/getAllRequestDetails",{notify:type},function(data)
                            {
                               		$("#show_smstemp_details").html(data);
                            });
					}
					else if(type=='email_temp')
					{
							$.post("<?php echo base_url();?>head/getAllRequestDetails",{notify:type},function(data)
                            {
                               		$("#show_emailtemp_details").html(data);
                            });
					}
					else
					{
							$.post("<?php echo base_url();?>head/getAllRequestDetails",{notify:type},function(data)
                            {
                               		$("#show_opt_details").html(data);
                            });
					}	
			}


			function setShowStatus(notify_type,notify_id)
			{
					 $.post("<?php echo base_url();?>head/setNotifyShowStatus",{type:notify_type,notifyid:notify_id},function(data)
                    	{
                       		showNotifyModule(notify_type);
                    	});
			}

			function showNotifyModule(notify_type)
			{
					if(notify_type=='sender_id')
					{
							window.location="<?php echo base_url();?>head/senderid_request";
					}
					else if(notify_type=='sms_temp')
					{
							window.location="<?php echo base_url();?>head/sms_temp_request";
					}
					else if(notify_type=='email_temp')
					{
						    window.location="<?php echo base_url();?>head/email_temp_request";	
					}
					else
					{
							window.location="<?php echo base_url();?>head/OPT_request";
					}
			}

		</script>


  <?php $this->load->view('backend/leftsidebar_sa'); ?>