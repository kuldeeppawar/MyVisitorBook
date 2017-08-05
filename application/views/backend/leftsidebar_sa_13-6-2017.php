<div class="clearfix"></div>
<div class="page-container">
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
					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
					<!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
					<!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
					<form class="sidebar-search" action="page_general_search_3.html" method="POST">
						<a href="javascript:;" class="remove">
							<i class="icon-close"></i>
						</a>
					</form>
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>
				<li class="nav-item ">
					<a href="<?php echo base_url();?>head/dashboard" " class="nav-link nav-toggle">
						<i class="icon-home"></i>
						<span class="title">Dashboard</span>
						<span class="selected"></span>
					</a>
				</li>
				<li class="nav-item  ">
					<a href="javascript:;" class="nav-link nav-toggle">
						<i class="icon-user"></i>
						<span class="title">System User Management</span>
						<span class="arrow"></span>
					</a>
					<ul class="sub-menu">
						<li class="nav-item">
							<a href="
								<?php echo base_url();?>head/user_management" class="nav-link">User Management 
							</a>
						</li>
						<li class="nav-item ">
							<a href="
								<?php echo base_url();?>head/user_management/manage_user_type" class="nav-link "> User Type Management
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item  ">
					<a href="
						<?php echo base_url()."head/festival"?>" class="nav-link nav-toggle">
						<i class="fa fa-magic"></i>
						<span class="title">Festival Management</span>
					</a>
					<ul class="sub-menu">
						<li class="nav-item">
							<a href="
								<?php echo base_url()."head/festival/userFestival"?>" class="nav-link">User Festival Management 
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link nav-toggle">
						<i class="fa fa-clone"></i>
						<span class="title">Coupon Management</span>
						<span class="arrow"></span>
					</a>
					<ul class="sub-menu">
						<li class="nav-item">
							<a href="
								<?php echo base_url();?>head/coupon" class="nav-link">Generate Coupons 
							</a>
						</li>
						<li class="nav-item ">
							<a href="
								<?php echo base_url();?>head/coupon/manageCouponMapping" class="nav-link "> Coupon Mapping
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item  ">
					<a href="#" class="nav-link nav-toggle">
						<i class="fa fa-newspaper-o"></i>
						<span class="title">Package Management</span>
						<span class="arrow"></span>
					</a>
					<ul class="sub-menu">
						<li class="nav-item">
							<a href="
								<?php echo base_url()."head/package"?>" class="nav-link">New Package Management 
							</a>
						</li>
						<li class="nav-item">
							<a href="
								<?php echo base_url()."head/package/renewalPackage"?>" class="nav-link">Renewal Package Management 
							</a>
						</li>
						<li class="nav-item ">
							<a href="
								<?php echo base_url()."head/tax"?>" class="nav-link "> Tax Management
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item  ">
					<a href="
						<?php echo base_url()."head/sender_id_management"?>" class="nav-link nav-toggle">
						<i class="fa fa-send"></i>
						<span class="title">Sender Id Management</span>
						<span class="arrow"></span>
					</a>
				</li>
				<li class="nav-item active open  ">
					<a href="
						<?php echo base_url()."head/faq"?>" class="nav-link nav-toggle">
						<i class="fa fa-question"></i>
						<span class="title">FAQ Management</span>
					</a>
				</li>
				<li class="nav-item  ">
					<a href="
						<?php echo base_url()?>head/emailtemplate" class="nav-link nav-toggle">
						<i class="icon-envelope-open"></i>
						<span class="title">Email Template Management</span>
					</a>
				</li>
				<li class="nav-item  ">
					<a href="
						<?php echo base_url()?>head/smstemplate" class="nav-link nav-toggle">
						<i class="icon-speech"></i>
						<span class="title">SMS Template Management </span>
					</a>
				</li>
				
				<li class="nav-item  ">
					<a href="#" class="nav-link nav-toggle">
						<i class="fa fa-check-square-o"></i>
						<span class="title">Approval Management</span>
						<span class="arrow"></span>
					</a>
					<ul class="sub-menu">
						<li class="nav-item">
							<a href="
								<?php echo base_url()?>head/sms_temp_request" class="nav-link">SMS Template Request 
							</a>
						</li>
						<li class="nav-item ">
							<a href="
								<?php echo base_url()?>head/email_temp_request" class="nav-link "> Email Template Request
							</a>
						</li>
						<li class="nav-item ">
							<a href="
								<?php echo base_url()?>head/Opt_request" class="nav-link "> OPT Request
							</a>
						</li>
						<li class="nav-item ">
							<a href="
								<?php echo base_url()?>head/senderid_request" class="nav-link "> Sender Id Request
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item  ">
					<a href="<?php echo base_url()?>head/client_management" class="nav-link nav-toggle">
						<i class="fa fa-reorder"></i>
						<span class="title">Order Management</span>
					</a>
				</li>
				<li class="nav-item active open  ">
					<a href="
						<?php echo base_url()."head/backup_management";?>" class="nav-link nav-toggle">
						<i class="fa fa-database"></i>
						<span class="title">Back up Management</span>
					</a>
				</li>
				<li class="nav-item  ">
					<a href="
						<?php echo base_url();?>head/newsletter_management" class="nav-link nav-toggle">
						<i class="fa fa-rss"></i>
						<span class="title">Newsletter Management</span>
					</a>
				</li>
				<li class="nav-item  ">
					<a href="
						<?php echo base_url()."head/location";?>" class="nav-link nav-toggle">
						<i class="icon-pointer"></i>
						<span class="title">Location Management</span>
					</a>
				</li>
				<li class="nav-item  ">
					<a href="#" class="nav-link nav-toggle">
						<i class="fa fa-check-square-o"></i>
						<span class="title">Settings</span>
						<span class="arrow"></span>
					</a>
					<ul class="sub-menu">
						<li class="nav-item">
							<a href="
								<?php echo base_url()?>head/setting/getGaugechartvalue" class="nav-link">Gauge charts 
							</a>
						</li>
						<li class="nav-item">
							<a href="
								<?php echo base_url()?>head/setting/getVisitorform" class="nav-link">Add Visitor Form 
							</a>
						</li>
						<li class="nav-item ">
							<a href="
								<?php echo base_url()?>head/setting/getAddform" class="nav-link "> Quick Add Management
							</a>
						</li>
						<li class="nav-item ">
							<a href="<?php echo base_url()?>head/report" class="nav-link "> Reports Management</a>
						</li>
						<li class="nav-item ">
							<a href="
							<?php echo base_url()?>head/opt_out" class="nav-link "> OPT Out
							</a>
						</li>
						<li class="nav-item ">
							<a href="<?php echo base_url()?>head/localization" class="nav-link "> Multi - lingual</a>
						</li>
					</ul>
				</li>
			</ul>
			<!-- END SIDEBAR MENU -->
			<!-- END SIDEBAR MENU -->
		</div>
		<!-- END SIDEBAR -->
	</div>