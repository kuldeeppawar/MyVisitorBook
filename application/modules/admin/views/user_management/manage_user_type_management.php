
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="row">
			<!--modal-->
			<!--end modal-->
			<div class="col-md-12">
				<div class=" app-ticket-list">
					<div class="page-bar row">
						<div class="col-md-6">
							<h3 class="page-title"><?php getLocalkeyword('User Type Management');?></h3>
							<ul class="page-breadcrumb ">
								<li><a href="<?php echo base_url()?>admin/dashboard"><?php getLocalkeyword('Home');?></a> <i class="fa fa-circle"></i></li>
								<li><a href="<?php echo base_url()?>admin/user_management"><?php getLocalkeyword('System User Management');?></a> <i class="fa fa-circle"></i></li>
								<li><span><?php getLocalkeyword('User Type Management');?></span></li>
							</ul>
						</div>
						<div class="col-md-6">
							<div id="reportrange" class="btn pull-right " style="padding-top: 12px;">
								<i class="fa fa-calendar"></i> &nbsp; <span class="thin uppercase hidden-xs">August 28, 2016 - September 26, 2016</span> <b class="fa fa-angle-down"></b>
							</div>
						</div>
					</div>
					<div class="row">
						<!--modal-->
						<!--end modal-->
						<div class="col-md-12">
							<div class="table-toolbar">
								<div class="row">
									<div class="col-md-3 ">
										<ul class="nav navbar-nav pl0">
											<li class="dropdown dropdown-user"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"
												style="font-size: 18px; padding: 2px 0px;"
											>Recently updated <i class="fa fa-angle-down"></i>
											</a>
												<ul class="dropdown-menu dropdown-menu-default">
													<li><a href="#">All Contacts</a></li>
													<li><a href="#">My Contacts </a></li>
													<li><a href="#">Recently viewed</a></li>
													<li><a href="#">Not updated in 30 Days</a></li>
												</ul></li>
										</ul>
									</div>
									<div class="col-md-5  pull-right">
										<div class="pull-right">
											<div style="float: left; margin-top: 8px; margin-right: 5px;">
												<!--<a href="#" class="margin_rgt hide_element"> <i class="fa fa-eye fa-2x" title="View" style="color:#828282; "></i></a>-->

                                                            <?php
																																																												if (getAdminAccessRights('mvbUmUtEdit'))
																																																												{
																																																													?> 
                                                                   <a class="margin_rgt hide_element" id="edit_user_type_anchor"> <i class="fa fa-pencil-square-o fa-2x" title="Edit"
													style="color: #828282;"
												></i></a>
                                                            <?php
																																																												}
																																																												?> 
                                                           
                                                        </div>

                                                        <?php
																																																								if (getAdminAccessRights('mvbUmUtAdd'))
																																																								{
																																																									?> 
                                                                  <div class="btn-group">
												<a href="<?php echo base_url();?>admin/user_management/addUserType" class="btn btn-primary"><?php getLocalkeyword('Add New User Type');?></a>
											</div>
                                                        <?php
																																																								}
																																																								
																																																								if (getAdminAccessRights('mvbUmUtActive') || getAdminAccessRights('mvbUmUtDeactive'))
																																																								{
																																																									?>
                                                              <ul class="nav navbar-nav pl0 pull-right" style="margin-left: 5px;">
												<li class="dropdown dropdown-user burger_menu"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" style="margin-top: 0px;"><i
														class="fa fa-bars fa-2x" aria-hidden="true"
													></i> </a>

                                                              <?php
																																																									if (getAdminAccessRights('mvbUmUtActive') || getAdminAccessRights('mvbUmUtDeactive'))
																																																									{
																																																										?>
                                                                      <ul class="dropdown-menu dropdown-menu-default">
                                                                      <?php
																																																										if (getAdminAccessRights('mvbUmUtActive'))
																																																										{
																																																											?>    
                                                                            <li class="options" style="border-bottom: 1px solid #e7ecf1;"><a title="Custom Fields"
															style="padding: 5px; margin-top: 5px;" onclick="chechCheckbox(1);"
														><?php getLocalkeyword('Active');?></a></li>
                                                                      <?php
																																																										}
																																																										
																																																										if (getAdminAccessRights('mvbUmUtDeactive'))
																																																										{
																																																											?>      
                                                                            <li class="options"><a title="Custom Fields" style="padding: 5px; margin-top: 5px;" onclick="chechCheckbox(0);"><?php getLocalkeyword('Deactive');?></a>
														</li>
                                                                      <?php
																																																										}
																																																										?>      
                                                                      </ul>
                                                                <?php
																																																									}
																																																									?>          
                                                                  </li>
											</ul>

                                                        <?php
																																																								}
																																																								?>          

                                                        <!-- modal ends -->
										</div>
									</div>
								</div>
								<div class="selected_rows">
									<font id="show_checkbox_selected"></font>
									<a id="selectall"><?php getLocalkeyword('select all');?></a>
								</div>
								<div class="portlet light">
									<div class="portlet-body">
										<table class="table table-striped table-bordered table-hover table-checkable order-column dataTable allchekbox" id="sample_1_2" role="grid" aria-describedby="sample_1_2_info">
											<thead>
												<tr>
													<th style="width: 35px;"><input type="checkbox" id="checkall" data-set="" name="all" /> </label></th>
													<th><?php getLocalkeyword('User Type');?></th>
													<th><?php getLocalkeyword('Created Date');?></th>
													<th><?php getLocalkeyword('Created By');?></th>
													<th><?php getLocalkeyword('Status');?></th>
												</tr>
											</thead>
											<tbody>

                                                        <?php
																																																								for($ut=0;$ut < count($result);$ut ++)
																																																								{
																																																									$j=$ut + 1;
																																																									
																																																									?>
                                                                    <tr class="odd gradeX">
													<td><input name="chk1" class="check_box" type="checkbox" data-ptag="sb1" id="chk<?php echo $j;?>" value="<?php echo $result[$ut]->utyp_id_pk;?>" onclick="edit_user_type();"></td>
													<td><?php echo $result[$ut]->utyp_userType;?></td>
													<td><?php echo $result[$ut]->created_date;?></td>
													<td><?php echo $result[$ut]->created_by;?></td>
													<td><?php echo $result[$ut]->status;?></td>
												</tr>   
                                                         <?php
																																																								}
																																																								?>
                                                                                                                     

                                                        </tbody>
										</table>
									</div>
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
<script type="text/javascript">
                   function edit_user_type()
                   {
                            var count=<?php echo count($result)?>; 
                      
                            var sender_id;                      
                        
                            for (var i=1;i<=count;i++)
                            {
                                  if($('#chk'+i).is(':checked'))
                                  {
                                      sender_id=$("#chk"+i).val();
                                  }
                            } 

                            $("#edit_user_type_anchor").attr("href", "<?php echo base_url();?>admin/user_management/editUserType/"+sender_id);

                            // $.get("<?php echo base_url();?>head/user_management/editUserType",{id:sender_id},function(data){
                            //       //location.reload(true);
                            //        });
                            
                   } 


                   function chechCheckbox(id)
                    {
                         var count=<?php echo count($result)?>;
                         var usertypeid=[];
                         
                         
                         for (var i=1;i<=count;i++)
                         {
                              if($('#chk'+i).is(':checked'))
                              {
                                  usertypeid.push($("#chk"+i).val());                              
                              }
                         } 

                         
                         if (usertypeid.length === 0) 
                         {
                                alert ("Please Select User Type Id");                          
                         }
                         else
                         {
                              $.post("<?php echo base_url();?>admin/user_management/changeUserTypeIdStatus",{id:id,user_type_id:usertypeid},function(data){
                                  location.reload(true);
                                   });
                              
                          }     
                    }

            </script>