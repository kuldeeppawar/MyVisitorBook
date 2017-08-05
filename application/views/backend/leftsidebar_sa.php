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
					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM --> <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box --> <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
					<form class="sidebar-search" action="page_general_search_3.html" method="POST">
						<a href="javascript:;" class="remove"> <i class="icon-close"></i>
						</a>
					</form> <!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>
<?php
	//$main_module=$this->user_management_model->getMainModule();
	
	$result=$this->db->query("SELECT * FROM tblmvbmainmodules WHERE mm_menu_id='0' and mm_submenu_id='0' and mm_sub_submenu_id='0' and 	mm_show='1' and mm_status='1' order by mm_priority");

	$main_module=$result->result();

	foreach($main_module as $menu)
	{						
			if(getAccessRights($menu->mm_module_code))
			{	

				if($menu->mm_url=="#")
				{
						$redirect_link="#";
				}
				else
				{
						$redirect_link=base_url()."head/".$menu->mm_url;	
				}

?>
				<li class="nav-item">
									<a href="<?php echo $redirect_link;?>" class="nav-link nav-toggle"> <i class="<?php echo $menu->mm_icon;?>"></i> 
										<span class="title"><?php echo $menu->mm_module_name;?></span> <span class="arrow"></span>
									</a>
<?php				
				 		//$sub_module=$this->user_management_model->getSubModule($menu->mm_id_pk);

						$result_sm=$this->db->query("SELECT * FROM tblmvbmainmodules WHERE mm_menu_id='".$menu->mm_id_pk."' and mm_submenu_id='0' and mm_sub_submenu_id='0' and mm_show='1' and mm_status='1'");
					
				    	$sub_module=$result_sm->result();
?>
						 <ul class="sub-menu">
<?php
						 foreach($sub_module as $sub_menu)
						 {	
							 		if(getAccessRights($sub_menu->mm_module_code))
							 		{
?>																						
													<li class="nav-item"><a href="<?php echo base_url();?>head/<?php echo $sub_menu->mm_url;?>" class="nav-link"><?php echo $sub_menu->mm_module_name;?> </a>
													</li>					
<?php		
									}
						 }
?>
						</ul>
				</li>
<?php				 
			}
	}

?>

</ul>
</div>
</div>