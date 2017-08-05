<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8" />
<title>Metronic | Dashboard</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport" />
<meta content="" name="description" />
<meta content="" name="author" />
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>themes/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>themes/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>themes/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>themes/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="<?php echo base_url()?>themes/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>themes/assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>themes/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>themes/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL STYLES -->
<link href="<?php echo base_url()?>themes/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
<link href="<?php echo base_url()?>themes/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
<!-- END THEME GLOBAL STYLES -->
<!-- BEGIN THEME LAYOUT STYLES -->
<link href="<?php echo base_url()?>themes/assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>themes/assets/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
<link href="<?php echo base_url()?>themes/assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
<!-- END THEME LAYOUT STYLES -->
<link rel="shortcut icon" href="favicon.ico" />
<style>
.blocks {
	background-color: #e73d4a;
	color: #fff;
	text-align: center;
	padding: 35px;
}

.hr1 {
	border-top: 2px solid #ccc;
}

.th_color th {
	color: #131313 !important;
}

.page-container-bg-solid .page-bar .page-breadcrumb, .page-content-white .page-bar .page-breadcrumb
	{
	padding: 2px 0 !important;
}

.blink {
	animation-duration: 1s !important;
	animation-name: blink;
	animation-iteration-count: infinite;
	animation-direction: alternate;
	animation-timing-function: ease-in-out;
}

#draggablePanelList .panel-heading1 {
	cursor: move;
}

.panel1 {
	border-bottom: 2px solid #ddd;
	padding: 10px 15px;
	height: 350px;
}

@
keyframes blink {from { opacity:1;
	
}

to {
	opacity: 0;
}

}

/*@keyframes blink {

    0% {

        opacity: 1;

    }

    80% {

        opacity: 1;

    }

    81% {

        opacity: 0;

    }

    100% {

        opacity: 0;

    }

}

*/
.charts {
	padding: 0px;
	text-align: left;
}

.search_fix {
	padding: 10px;
}

.movable {
	position: absolute;
	right: 15px;
}
</style>
</head>
<!-- END HEAD -->
<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-content-white page-sidebar-closed">
	<div class="page-wrapper">
		<!-- BEGIN HEADER -->
		<div class="page-header navbar navbar-fixed-top">
			<!-- BEGIN HEADER INNER -->
			<div class="page-header-inner ">
				<!-- BEGIN LOGO -->
				<div class="page-logo">
					<a href="index.html"> <img src="<?php echo base_url()?>themes/assets/layouts/layout/img/logo.png" alt="logo" class="logo-default" />
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
				<div class="top-menu pull-right">
					<ul class="nav navbar-nav pull-right">
						<!-- BEGIN NOTIFICATION DROPDOWN -->
						<li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar1"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown tooltip"
							data-hover="dropdown" data-close-others="true" title="SMS/Email Notification"> <i class="icon-bell"></i> <span class="badge badge-default"> 7 </span>
						</a>
							<ul class="dropdown-menu">
								<li class="external">
									<h3>
										<span class="bold">12 pending</span> notifications
									</h3> <a href="page_user_profile_1.html">view all</a>
								</li>
								<li>
									<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 250px;">
										<ul class="dropdown-menu-list scroller" style="height: 250px; overflow: hidden; width: auto;" data-handle-color="#637283" data-initialized="1">
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
										<div class="slimScrollBar"
											style="width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; background: rgb(99, 114, 131);"></div>
										<div class="slimScrollRail"
											style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(234, 234, 234);"></div>
									</div>
								</li>
							</ul></li>
						<li class="dropdown dropdown-extended dropdown-inbox" id="mail_counter"><a href="javascript:;" class="dropdown-toggle" data-toggle="" data-hover="dropdown tooltip"
							data-close-others="true" title="Email Counter"> <i class="icon-envelope-open"></i> <span class="badge badge-default">8</span>
						</a></li>
						<li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar1"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown tooltip"
							data-hover="dropdown" data-close-others="true" title="Low balance"> <i class="icon-bell"></i> <span class="badge badge-default"> 7 </span>
						</a></li>
						<!-- BEGIN USER LOGIN DROPDOWN -->
						<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
						<li class="dropdown dropdown-user"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> <img alt=""
								class="img-circle" src="../assets/layouts/layout/img/avatar3_small.jpg" /> <span class="username username-hide-on-mobile"> <i class="fa fa-angle-down"></i></a> </span><br>
							<ul class="dropdown-menu dropdown-menu-default">
								<li><a href="add_new_user.html"> <i class="icon-user"></i> My Profile
								</a></li>
								<li><a href="add_new_user.html#Package"> <i class="fa fa-cubes"></i> Package Type
								</a></li>
								<li><a href="add_new_user.html#password"> <i class="fa fa-lock"></i> Change password
								</a></li>
								<li><a href="page_user_login_1.html"> <i class="icon-key"></i> Log Out
								</a></li>
							</ul></li>
						<!-- END USER LOGIN DROPDOWN -->
						<!-- BEGIN QUICK SIDEBAR TOGGLER -->
						<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
						<!-- END QUICK SIDEBAR TOGGLER -->
					</ul>
				</div>
				<div class="col-md-4 pull-right">
					<div class="input-group search_fix">
						<div class="input-group-btn search-panel">
							<div class="dropdown dropdown-lg">
								<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
									<span id="search_concept"></span> <span class="caret"></span>
								</button>
								<ul class="dropdown-menu dropdown-menu-default">
									<li><a href="#"> <label class="checkbox-inline"> <input type="checkbox" value=""> Name
										</label>
									</a></li>
									<li><a href="#"> <label class="checkbox-inline"> <input type="checkbox" value=""> Email-id
										</label>
									</a></li>
									<li><a href="#"> <label class="checkbox-inline"> <input type="checkbox" value=""> Mobile
										</label>
									</a></li>
									<li><a href="#"> <label class="checkbox-inline"> <input type="checkbox" value=""> City
										</label>
									</a></li>
									<li><a href="#"> <label class="checkbox-inline"> <input type="checkbox" value=""> Business Name
										</label>
									</a></li>
									<li><a href="#"> <label class="checkbox-inline"> <input type="checkbox" value=""> Added Date
										</label>
									</a></li>
								</ul>
							</div>
						</div>
						<input type="hidden" name="search_param" value="all" id="search_param"> <input type="text" class="form-control" name="x" placeholder="Search term..."
							style="border-radius: 0px !important;"> <span class="input-group-btn">
							<button class="btn btn-default" type="button">
								<span class="glyphicon glyphicon-search"></span>
							</button>
						</span>
					</div>
				</div>
				<!-- END TOP NAVIGATION MENU -->
			</div>
			<!-- END HEADER INNER -->
		</div>
		<!-- END HEADER -->
		<!-- BEGIN HEADER & CONTENT DIVIDER -->
		<div class="clearfix"></div>
		<!-- END HEADER & CONTENT DIVIDER -->
		<!-- BEGIN CONTAINER -->
		<div class="page-container">
		 <?php $this->load->view('frontend/leftsidebar'); ?>
