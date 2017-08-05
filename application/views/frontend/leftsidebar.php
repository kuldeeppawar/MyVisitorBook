
<!-- BEGIN SIDEBAR -->
			<div class="page-sidebar-wrapper">
				<!-- BEGIN SIDEBAR -->
				<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
				<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
				<div class="page-sidebar navbar-collapse collapse">
					<ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-closed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 18px">
						<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
						<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
						<li class="sidebar-toggler-wrapper hide">
							<div class="sidebar-toggler">
								<span></span>
							</div>
						</li>
						<!-- END SIDEBAR TOGGLER BUTTON -->
						<!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
						<li class="sidebar-search-wrapper">
							<!-- BEGIN RESPONSIVE QUICK SEARCH FORM --> <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box --> <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
							<form class="sidebar-search" action="page_general_search_3.html" method="POST">
								<a href="javascript:;" class="remove"> <i class="icon-close"></i>
								</a>
							</form> <!-- END RESPONSIVE QUICK SEARCH FORM -->
						</li>
						<li class="nav-item active open"><a href="index.html" class="nav-link nav-toggle"> <i class="icon-home"></i> <span class="title">Dashboard</span> <span
								class="selected"></span>
						</a></li>
						<li class="nav-item  "><a href="visitor_manage.html" class="nav-link nav-toggle"> <i class="icon-diamond"></i> <span class="title">Visitor Management</span>
						</a></li>
						<li class="nav-item  "><a href="group_manage.html" class="nav-link nav-toggle"> <i class="icon-users"></i> <span class="title">Groups Management</span>
						</a></li>
						<li class="nav-item"><a href="sms_manage.html" class="nav-link nav-toggle"> <i class="icon-speech"></i> <span class="title">SMS Management</span>
						</a></li>
						<li class="nav-item  "><a href="email_manage.html" class="nav-link nav-toggle"> <i class="icon-envelope-open"></i> <span class="title">Email Management</span>
						</a></li>
						<li class="nav-item  "><a href="reminder_management.html" class="nav-link nav-toggle"> <i class="icon-note"></i> <span class="title">Reminder Management</span> <span
								class="arrow"></span>
						</a></li>
						<li class="nav-item  "><a href="?p=" class="nav-link nav-toggle"> <i class="icon-settings"></i> <span class="title">Settings</span> <span class="arrow"></span>
						</a>
							<ul class="sub-menu" style="display: none;">
								<li class="nav-item  "><a href="sms_setting.html" class="nav-link nav-link nav-toggle"> <span class="title">SMS Settings</span> <span class="arrow"></span>
								</a>
									<ul class="sub-menu">
										<li class="nav-item "><a href="sms_setting.html" class="nav-link">SMS Templates </a></li>
										<li class="nav-item "><a href="sms_signature.html" class="nav-link "> SMS Signature</a></li>
										<!--<li class="nav-item ">



                                                <a href="#" class="nav-link "  > Custom SMS Settings </a>



                                            </li>-->
									</ul></li>
								<li class="nav-item  "><a href="email_setting.html" class="nav-link"> <span class="title">Email Settings</span>
								</a></li>
								<li class="nav-item"><a href="address_labeling.html" class="nav-link "> <span class="title">Address Labeling</span>
								</a></li>
								<li class="nav-item  "><a href="custom_fields.html" class="nav-link "> <span class="title">Custom Field(s)</span>
								</a></li>
								<li class="nav-item"><a href="mo_registration.html" class="nav-link "> <span class="title">MO Registration</span>
								</a></li>
								<li class="nav-item"><a href="otp_in_out.html" class="nav-link"> <span class="title">OPT - IN, OPT OUT</span>
								</a></li>
								<li class="nav-item"><a href="sms_email_reminder.html" class="nav-link">SMS/Email Reminder </a></li>
							</ul>
						<li class="nav-item  "><a href="javascript:;" class="nav-link nav-toggle"> <i class="icon-user"></i> <span class="title">User Management</span> <span class="arrow"></span>
						</a>
							<ul class="sub-menu">
								<li class="nav-item"><a href="<?php echo base_url()?>admin/branch" class="nav-link">Branch Management </a></li>
								<li class="nav-item "><a href="um_add_new_user.html" class="nav-link ">Add New User</a></li>
								<li class="nav-item "><a href="um_add_user_type.html" class="nav-link">User Type Management</a></li>
							</ul></li>
						<li class="nav-item  "><a href="report_management.html" class="nav-link nav-toggle"> <i class="icon-docs"></i> <span class="title">Reports Management</span>
						</a></li>
						<li class="nav-item  "><a href="<?php echo base_url()?>admin/senderid" class="nav-link nav-toggle"> <i class="icon-docs"></i> <span class="title">Sender Id Management</span>
						</a></li>
						<li class="nav-item  "><a href="<?php echo base_url()?>admin/festival" class="nav-link nav-toggle"> <i class="fa fa-magic"></i> <span class="title">Festival Management</span><span
								class="arrow"></span>
						</a></li>
					</ul>
					<!-- END SIDEBAR MENU -->
					<!-- END SIDEBAR MENU -->
				</div>
				<!-- END SIDEBAR -->
			</div>
<!-- END SIDEBAR -->