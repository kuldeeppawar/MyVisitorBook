<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8" />
<title>VISITORBOOK Admin Panel</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport" />
<meta content="" name="description" />
<meta content="" name="author" />
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<!-- <script src="<?php //echo base_url();?>themes/assets/global/plugins/jquery.min.js" type="text/javascript"></script> -->
<script src="<?php echo base_url();?>themes/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>

<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>themes/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>themes/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>themes/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>themes/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGINS -->

<link href="<?php echo base_url()?>themes/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url()?>themes/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>themes/assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
<!--<link href="<?php echo base_url()?>themes/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />-->
<link href="<?php echo base_url()?>themes/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url()?>themes/assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url()?>themes/assets/global/plugins/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url()?>themes/assets/global/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url()?>themes/assets/global/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL STYLES -->
<link href="<?php echo base_url()?>themes/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
<link href="<?php echo base_url()?>themes/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url()?>themes/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url()?>themes/assets/apps/css/ticket.min.css" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url()?>themes/assets/custom.css" rel="stylesheet" type="text/css" />
<!-- END THEME GLOBAL STYLES -->
<!-- BEGIN THEME LAYOUT STYLES -->
<link href="<?php echo base_url()?>themes/assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>themes/assets/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
<link href="<?php echo base_url()?>themes/assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
<!-- <script src="<?php //echo base_url();?>themes/assets/global/plugins/jquery.min.js" type="text/javascript"></script> -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="<?php echo base_url();?>themes/assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>

<script src="<?php echo base_url();?>themes/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>

<script src="<?php echo base_url();?>themes/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>

<script src="<?php echo base_url();?>themes/assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
<link href="<?php echo base_url();?>themes/assets/pages/css/profile.min.css" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url();?>themes/assets/hover.css" rel="stylesheet" media="all">



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
.error{
 color:#e73d4a
}

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

.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {

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

.alert-danger

{display:none;

}

.tab-content123 .img-id {

    width: 52px !important;

    text-align: center;

    color: #333;

}

.bb{

    border-bottom: 1px solid #ddd;

    width: 45% !important;

    margin-bottom: -1px;

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
					<a href="<?php echo base_url()?>admin/dashboard"> <img src="<?php echo base_url()?>themes/assets/layouts/layout/img/logo.png" alt="logo" class="logo-default" />
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

						<li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar1">
							<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"
								data-hover="dropdown" data-close-others="true" title="SMS/Email Notification" onclick="getAllRequestDetails('sms_email_notify')"> <i class="icon-bell"></i> <span class="badge badge-default" id="show_sms_email_approved">  </span>
							</a>
							<ul class="dropdown-menu">
								<li class="external">
									<!-- <h3>
										<span class="bold">12 pending</span> notifications
									</h3> <a href="page_user_profile_1.html">view all</a> -->
								</li>
								<li>
									<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 250px;">
										<ul class="dropdown-menu-list scroller" style="height: 250px; overflow: hidden; width: auto;" data-handle-color="#637283" data-initialized="1" id="notify_smsemail_details">
											
										</ul>
										<!-- <div class="slimScrollBar"
											style="width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; background: rgb(99, 114, 131);">
										</div>
										<div class="slimScrollRail"
											style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(234, 234, 234);">
										</div> -->
									</div>
								</li>
							</ul>
						</li>
						<li class="dropdown dropdown-extended dropdown-inbox" id="mail_counter">
								<a href="javascript:;" class="dropdown-toggle" data-toggle="" data-hover="dropdown tooltip"
									data-close-others="true" title="Email Counter"> <i class="icon-envelope-open"></i> <span class="badge badge-default" id="show_email_counter"></span>
								</a>
								<ul class="dropdown-menu">
									<li class="external">
										<!-- <h3>
											<span class="bold">12 pending</span> notifications
										</h3> <a href="page_user_profile_1.html">view all</a> -->
									</li>
									<li>
										<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 250px;">
											<ul class="dropdown-menu-list scroller" style="height: 250px; overflow: hidden; width: auto;" data-handle-color="#637283" data-initialized="1" id="notify_email_counter">

											</ul>
										</div>
									</li>
								</ul>
						</li>
						<li class="dropdown dropdown-extended dropdown-inbox" id="mail_counter">
								<a href="javascript:;" class="dropdown-toggle" data-toggle="" data-hover="dropdown tooltip"
									data-close-others="true" title="SMS Counter" > <i class="icon-envelope-open"></i> <span class="badge badge-default" id="show_sms_counter"></span>
								</a>
								<ul class="dropdown-menu">
									<li class="external">
										<!-- <h3>
											<span class="bold">12 pending</span> notifications
										</h3> <a href="page_user_profile_1.html">view all</a> -->
									</li>
									<li>
										<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 250px;">
											<ul class="dropdown-menu-list scroller" style="height: 250px; overflow: hidden; width: auto;" data-handle-color="#637283" data-initialized="1" id="notify_sms_counter">

											</ul>
										</div>
									</li>
								</ul>
						</li>
						<li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar1">
								<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"
									data-hover="dropdown" data-close-others="true" title="Low balance" onclick="getAllRequestDetails('low_balance')"> <i class="icon-bell"></i> <span class="badge badge-default" id="show_low_balance">  </span>
								</a>
								<ul class="dropdown-menu">
									<li class="external">
										<!-- <h3>
											<span class="bold">12 pending</span> notifications
										</h3> <a href="page_user_profile_1.html">view all</a> -->
									</li>
									<li>
										<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 250px;">
											<ul class="dropdown-menu-list scroller" style="height: 250px; overflow: hidden; width: auto;" data-handle-color="#637283" data-initialized="1" id="notify_low_balance">

											</ul>
										</div>
									</li>
								</ul>
						</li>	

					    <?php /*?>
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
						</a></li> <?php */?>
						<!-- BEGIN USER LOGIN DROPDOWN -->
						<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
						<li class="dropdown dropdown-user"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> <img alt=""
								class="img-circle" src="<?php echo base_url()?>themes/assets/layouts/layout/img/avatar3_small.jpg" /> <span class="username username-hide-on-mobile"> <?php echo $this->session->userdata('admin_admin_name');?>
								<i class="fa fa-angle-down"></i></a> </span><br>
							
							<ul class="dropdown-menu dropdown-menu-default">
								<li><a href="<?php echo base_url(); ?>admin/myprofile"> <i class="icon-user"></i> My Profile
								</a></li>
								<li><a href="<?php echo base_url(); ?>admin/inbox"> <i class="fa fa-inbox"></i> Inbox
								</a></li>
								<li><a href="<?php echo base_url(); ?>admin/myprofile#Package"> <i class="fa fa-cubes"></i> Package Type
								</a></li>
								<li><a href="<?php echo base_url(); ?>admin/myprofile#password"> <i class="fa fa-lock"></i> Change password
								</a></li>
								<li><a href="#" data-toggle="modal" data-target="#changeLanguages"> <i class="fa fa-language"></i> Change Language
								</a></li>
								<li><a href="<?php echo base_url(); ?>admin/branch/selectbranch"> <i class="icon-key"></i> Logout From Branch
								</a></li>
								<li><a href="<?php echo base_url(); ?>admin/logout"> <i class="icon-key"></i> Log Out
								</a></li>
							</ul>
							</li>
						<!-- END USER LOGIN DROPDOWN -->
						<!-- BEGIN QUICK SIDEBAR TOGGLER -->
						<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
						<!-- END QUICK SIDEBAR TOGGLER -->
					</ul>
				</div>
					    
				<div class="col-md-4 pull-right">
					<div class="input-group search_fix">
						<div class="input-group-btn search-panel">
							<!-- <div class="dropdown dropdown-lg">
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
							</div> -->
						</div>
						<!-- <input type="hidden" name="search_param" value="all" id="search_param"> <input type="text" class="form-control" name="x" placeholder="Search term..."
							style="border-radius: 0px !important;"> <span class="input-group-btn">
							<button class="btn btn-default" type="button">
								<span class="glyphicon glyphicon-search"></span>
							</button> -->
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
								<form role="form" id="frmLanguage" action="<?php echo base_url()?>admin/user_management/selectLanguage" method="post" enctype="multipart/form-data">
									<div class="form-body">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label><?php getLocalkeyword('Select Language');?><span class="mandatory"></span></label>
													<select name="selLanguage" id="selLanguage" required="required" class="form-control">
													  <option value="">Select Language</option>
													 <?php 
													    
													     $adminId=$this->session->userdata('admin_admin_id');
													    
													    
													     $result=$this->db->query("SELECT `sysu_id_pk`, `sysu_languageId_fk` FROM `tblmvbsystemusers` Where sysu_id_pk='".$adminId."'");
													     $result=$result->result();
													     $lngId=$result[0]->sysu_languageId_fk;
													     
													     
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

	  $(function() {

				getStatus();

			});

			function getStatus() {
				$.ajax({
			        type : "POST",
			        url : "<?php echo base_url();?>admin/getAllHeaderDetails",
			        success : function(data)
			        {			   
			        	var parts_data=data.split('~');       	
			            $("#show_sms_email_approved").html(parts_data[0]);            
				        $('#show_email_counter').html(parts_data[1]);
				        $('#show_sms_counter').html(parts_data[2]);
				        $('#show_low_balance').html(parts_data[3]);    				        
			        }
			    });	
				
				setTimeout("getStatus()",60000);
			}

			

			function getAllRequestDetails(type)
			{
					if(type=='sms_email_notify')
					{
							$.post("<?php echo base_url();?>admin/getAllRequestDetails",{notify:type},function(data)
                            {
                            		//alert(data);
                            		$(".scroller").slimScroll();
                               		$("#notify_smsemail_details").html(data);
                            });							
					}
					// else if(type=='email_counter')
					// {
					// 		$.post("<?php //echo base_url();?>admin/getAllRequestDetails",{notify:type},function(data)
     //                        {
     //                           		$("#notify_email_counter").html(data);
     //                        });
					// }
					// else if(type=='sms_counter')
					// {
					// 		$.post("<?php //echo base_url();?>admin/getAllRequestDetails",{notify:type},function(data)
     //                        {
     //                           		$("#notify_sms_counter").html(data);
     //                        });
					// }
					else
					{
							$.post("<?php echo base_url();?>admin/getAllRequestDetails",{notify:type},function(data)
                            {
                               		$("#notify_low_balance").html(data);
                            });
					}	
			}


			function setShowStatus(notify_type,notify_id,notification_type='')
			{
					 $.post("<?php echo base_url();?>admin/setNotifyShowStatus",{type:notify_type,notifyid:notify_id},function(data)
                    	{
                       		showNotifyModule(notify_type,notification_type);
                    	});
			}

			function showNotifyModule(notify_type,notification_type)
			{
					if(notify_type=='sms_email_notify')
					{
						if(notification_type=='sms_notify')
						{
							window.location="<?php echo base_url();?>admin/sms_settings";
						}
						else
						{
							window.location="<?php echo base_url();?>admin/email_settings";
						}
					}
					else 
					{
							//window.location="<?php //echo base_url();?>admin/OPT_request";
							location.reload(true);
					}
			} 	




	  // $(document).ready(function(){
		 //   $("#frmLanguage").validate({
		  	
		 //      rules:{             
		 //    	  selLanguage:{
		 //              required:true
		 //          }	        
		 //      },
		 //      messages:{                      
		      	
		 //    	  selLanguage:{
		 //              required:"Please Select Language"
		 //          }  		        
		 //      }
		 //  });
	  // });

	  </script>			
		<div class="page-container">
		
		 <?php $this->load->view('backend/leftsidebar'); ?>
