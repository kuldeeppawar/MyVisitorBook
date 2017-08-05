<div class="page-content-wrapper">
	<div class="page-content">
		<div class="row">
			<div class="col-md-12">
				<div class=" app-ticket-list">
					<div class="page-bar row">
						<div class="col-md-6">
							<h3 class="page-title">OPT IN / OPT OUT</h3>
							<ul class="page-breadcrumb ">
								<li><a href="index.html">Home</a> <i class="fa fa-circle"></i></li>
								<li><a> Settings</a><i class="fa fa-circle"></i></li>
								<li><span>OPT IN / OPT OUT</span></li>
							</ul>
						</div>
						<div class="col-md-6"></div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="table-toolbar">
								<div class="row">
									<div class="col-md-3">
										<ul class="nav navbar-nav pl0">
											<li class="dropdown dropdown-user"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"
												style="font-size: 18px; padding: 2px 0px;"
											>Recently updated <i class="fa fa-angle-down"></i> </span></a>
												<ul class="dropdown-menu dropdown-menu-default">
													<li><a href="#">All Contacts</a></li>
													<li><a href="#">My Contacts </a></li>
													<li><a href="#">Recently viewed</a></li>
													<li><a href="#">Not updated in 30 Days</a></li>
												</ul></li>
										</ul>
									</div>
									<div class="col-md-5 pull-right">
										<div class="pull-right">
                                        <?php
										if (getAdminAccessRights('mvbSetOptinDelete'))
										{
											?>    
                                                    <div style="float: left; margin-top: 8px; margin-right: 5px;">
												<a data-toggle="modal" data-target="#myModal_m" class="margin_rgt hide_element"> <i class="fa fa-trash fa-2x" title="Delete" style="color: #828282;"></i></a>
											</div>
                                        <?php
										}
										?>        
                                        <?php
										if (getAdminAccessRights('mvbSetOptinAdd'))
										 {
										?>                                                
                                                <div class="btn-group" style="margin-left: 5px;" data-toggle="modal" data-target="#myModal_new1">
												<a id="sample_editable_1_new" class="btn btn-primary"> <i class="fa fa-long-arrow-down"></i> Search OPT IN
												</a>
											</div>
                                         <?php
										  }
										?>
                                            <div id="myModal_new1" class="modal fade" role="dialog">
												<div class="modal-dialog">
													<!-- Modal content-->
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">&times;</button>
															<h2 class="modal-title text-center">
																<i class="fa fa-search"></i> Search OPT IN
																</h3>
														
														</div>
														<div class="modal-body">
															<div class="portlet-body form">
																<form role="form" id="opt_in_form" name="opt_in_form" method="POST" action="<?php echo base_url();?>admin/opt_in_out/addOptInOut">
																	<div class="form-body">
																		<div class="row">
																			<div class="col-md-12 pull-left">
																				<div class="form-group">
																					<label>Search OPT -In Name<small> <b>(Char Limit 20)</b></small></label> <input type="text" class="form-control" placeholder="Search OPT -In Name" maxlength="20" id="txtoptname"
																						name="txtoptname"
																					>
																				</div>
																				<div class="modal-footer">
																					<button type="submit" class="btn btn-primary" id="btnSubmit" name="btnSubmit">Save</button>
																					<button type="button" data-dismiss="modal" class="btn btn-danger">Cancel</button>
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
											<div id="myModal_m" class="modal fade" role="dialog">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">×</button>
															<h2 class="modal-title text-center">
																<i class="fa fa-trash"></i> Are you sure to Delete?
															</h2>
														</div>
														<div class="modal-body">
															<div class="portlet-body form">
																<!-- <form role="form" id="opt_delete_form" name="opt_delete_form" method="POST" action="<?php echo base_url();?>admin/opt_in_out/deleteOptInOut"> -->
																<div class="form-body">
																	<div class="row">
																		<div class="col-md-12">
																			<div class="modal-footer">
																				<!-- <a href class="btn btn-primary">Yes</a> -->
																				<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="deleteOptInOut();">Yes</button>
																				<button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
																			</div>
																		</div>
																	</div>
																</div>
																<!-- </form> -->
															</div>
														</div>
													</div>
												</div>
											</div>
											<div id="send_sms" class="modal fade" role="dialog">
												<div class="modal-dialog">
													<div class="col-md-10">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h2 class="modal-title text-center">
																	<i class="fa fa-envelope"></i> Send SMS
																</h2>
															</div>
															<div class="modal-body">
																<div class="portlet-body form">
																	<form role="form">
																		<div class="form-body">
																			<div class="row">
																				<div class="col-md-12">
																					<div class="form-group">
																						<label>Mobile no. <span class="mandatory"></span></label> <input type="text" class="form-control" value="9876548965" readonly>
																					</div>
																					<div class="form-group">
																						<label>Message <span class="mandatory"></span></label>
																						<textarea class="form-control" rows="4"></textarea>
																					</div>
																				</div>
																			</div>
																		</div>
																	</form>
																</div>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-primary">Send SMS</button>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div id="send_sms1" class="modal fade" role="dialog">
												<div class="modal-dialog">
													<div class="col-md-10">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h2 class="modal-title text-center">
																	<i class="fa fa-envelope-o"></i> Send SMS
																</h2>
															</div>
															<div class="modal-body">
																<div class="portlet-body form">
																	<form role="form">
																		<div class="form-body">
																			<div class="row">
																				<div class="col-md-12">
																					<div class="form-group">
																						<label>Mobile no. <span class="mandatory"></span></label> <input type="text" class="form-control" value="9876548965" readonly>
																					</div>
																					<div class="form-group">
																						<label>Message <span class="mandatory"></span></label>
																						<textarea class="form-control" rows="4"></textarea>
																					</div>
																				</div>
																			</div>
																		</div>
																	</form>
																</div>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-primary">Send SMS</button>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div id="send_email" class="modal fade" role="dialog">
												<div class="modal-dialog">
													<!-- Modal content-->
													<div class="col-md-10">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h2 class="modal-title text-center">
																	<i class="fa fa-envelope-o"></i> Send Email
																</h2>
															</div>
															<div class="modal-body">
																<div class="portlet-body form">
																	<form role="form">
																		<div class="form-body">
																			<div class="row">
																				<div class="col-md-12">
																					<div class="form-group">
																						<label>Email-id <span class="mandatory"></span></label> <input type="text" class="form-control" value="abc@gmail.com" readonly>
																					</div>
																					<div class="form-group">
																						<label>Subject <span class="mandatory"></span></label> <input type="text" class="form-control">
																					</div>
																					<div class="form-group">
																						<label>Message <span class="mandatory"></span></label>
																						<textarea class="form-control" rows="4"></textarea>
																					</div>
																				</div>
																			</div>
																		</div>
																	</form>
																</div>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-primary">Send Email</button>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div id="send_email1" class="modal fade" role="dialog">
												<div class="modal-dialog">
													<!-- Modal content-->
													<div class="col-md-10">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h2 class="modal-title text-center">
																	<i class="fa fa-envelope-o"></i> Send Email
																</h2>
															</div>
															<div class="modal-body">
																<div class="portlet-body form">
																	<form role="form">
																		<div class="form-body">
																			<div class="row">
																				<div class="col-md-12">
																					<div class="form-group">
																						<label>Email-id <span class="mandatory"></span></label> <input type="text" class="form-control" value="abc@gmail.com" readonly>
																					</div>
																					<div class="form-group">
																						<label>Subject <span class="mandatory"></span></label> <input type="text" class="form-control">
																					</div>
																					<div class="form-group">
																						<label>Message <span class="mandatory"></span></label>
																						<textarea class="form-control" rows="4"></textarea>
																					</div>
																				</div>
																			</div>
																		</div>
																	</form>
																</div>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-primary">Send Email</button>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div id="comment" class="modal fade" role="dialog">
												<div class="modal-dialog">
													<!-- Modal content-->
													<div class="col-md-10">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h2 class="modal-title text-center">Send Comment</h2>
															</div>
															<div class="modal-body">
																<div class="portlet-body form">
																	<form role="form">
																		<div class="form-body">
																			<div class="row">
																				<div class="col-md-12">
																					<div class="form-group">
																						<label>Comment <span class="mandatory"></span></label>
																						<textarea class="form-control" rows="4"></textarea>
																					</div>
																					<div class="form-group">
																						<button type="button" class="btn btn-primary">Add Comment</button>
																					</div>
																				</div>
																			</div>
																		</div>
																	</form>
																</div>
															</div>
															<div class="modal-footer">
																<table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_2">
																	<thead>
																		<th>Comment</th>
																		<th>Added on</th>
																	</thead>
																	<tbody>
																		<tr>
																			<td>test</td>
																			<td>2016-08-17 <span>18:25:10</span></td>
																		</tr>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div id="myModal" class="modal fade" role="dialog">
												<div class="modal-dialog">
													<div class="modal-content" style="height: 600px; overflow: auto;">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">&times;</button>
															<h2 class="modal-title text-center">Add New Visitor</h2>
														</div>
														<div class="modal-body">
															<div class="portlet-body form">
																<form role="form">
																	<div class="form-body">
																		<div class="form-group">
																			<label>Select Title <span class="mandatory">*</span></label> <select class="form-control">
																				<option>Option 1</option>
																				<option>Option 2</option>
																				<option>Option 3</option>
																				<option>Option 4</option>
																				<option>Option 5</option>
																			</select>
																		</div>
																		<div class="row">
																			<div class="col-md-4">
																				<div class="form-group">
																					<div class="form-group">
																						<label>First name <span class="mandatory">*</span></label> <input type="text" class="form-control input-sm" placeholder="First name">
																					</div>
																				</div>
																			</div>
																			<div class="col-md-4">
																				<div class="form-group">
																					<div class="form-group">
																						<label>Middle Name <span class="mandatory">*</span></label> <input type="text" class="form-control input-sm" placeholder="Middle Name">
																					</div>
																				</div>
																			</div>
																			<div class="col-md-4">
																				<div class="form-group">
																					<div class="form-group">
																						<label>Last Name <span class="mandatory">*</span></label> <input type="text" class="form-control input-sm" placeholder="Last Name">
																					</div>
																				</div>
																			</div>
																		</div>
																		<div class="form-group">
																			<label>Mobile Number <span class="mandatory">*</span></label> <input type="text" class="form-control input-sm" placeholder="Mobile Number">
																		</div>
																		<div class="form-group">
																			<label>Email Id <span class="mandatory">*</span></label> <input type="text" class="form-control input-sm" placeholder="Email Id">
																		</div>
																		<div class="row">
																			<div class="col-md-8">
																				<div class="form-group">
																					<label>Contact Group</label> <select class="form-control">
																						<option>Option 1</option>
																						<option>Option 2</option>
																						<option>Option 3</option>
																						<option>Option 4</option>
																						<option>Option 5</option>
																					</select>
																				</div>
																			</div>
																			<div class="col-md-4">
																				<div class="btn btn-info btn-lg btn-group">
																					<a href="create_visitor.html">
																						<button id="sample_editable_1_new" class=" btn-primary" style="margin-top: 30px; margin-left: 15px;">
																							<i class="fa fa-plus"></i> Add New Visitor
																						</button>
																					</a>
																				</div>
																			</div>
																		</div>
																		<div class="form-group">
																			<label>Select bussiness category</label> <select class="form-control">
																				<option>Option 1</option>
																				<option>Option 2</option>
																				<option>Option 3</option>
																				<option>Option 4</option>
																				<option>Option 5</option>
																			</select>
																		</div>
																		<div class="form-group">
																			<label>Business Name</label> <input type="text" class="form-control input-sm" placeholder="Business Name">
																		</div>
																		<div class="form-group">
																			<label>Address</label> <input type="text" class="form-control input-sm" placeholder="Address">
																		</div>
																		<div class="form-group">
																			<label>Website</label> <input type="text" class="form-control input-sm" placeholder="Website URL">
																		</div>
																		<div class="form-group">
																			<label>Country</label> <select class="form-control">
																				<option>Option 1</option>
																				<option>Option 2</option>
																				<option>Option 3</option>
																				<option>Option 4</option>
																				<option>Option 5</option>
																			</select>
																		</div>
																		<div class="form-group">
																			<label>State</label> <select class="form-control">
																				<option>Option 1</option>
																				<option>Option 2</option>
																				<option>Option 3</option>
																				<option>Option 4</option>
																				<option>Option 5</option>
																			</select>
																		</div>
																		<div class="form-group">
																			<label>City</label> <select class="form-control">
																				<option>Option 1</option>
																				<option>Option 2</option>
																				<option>Option 3</option>
																				<option>Option 4</option>
																				<option>Option 5</option>
																			</select>
																		</div>
																		<div class="form-group">
																			<label>Zip Code</label> <input type="text" class="form-control input-sm" placeholder="Zip Code">
																		</div>
																		<div class="form-group">
																			<label>Landline No</label> <input type="text" class="form-control input-sm" placeholder="landline No">
																		</div>
																		<div class="form-group">
																			<label>Fax</label> <input type="text" class="form-control input-sm" placeholder="Fax">
																		</div>
																		<div class="col-md-6">
																			<label>DOB</label>
																			<div class="form-group">
																				<div class="input-group input-medium date date-picker" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
																					<input type="text" class="form-control" readonly> <span class="input-group-btn">
																						<button class="btn default" type="button">
																							<i class="fa fa-calendar"></i>
																						</button>
																					</span>
																				</div>
																				<!-- /input-group -->
																			</div>
																		</div>
																		<div class="col-md-6">
																			<label>Aniversary Date</label>
																			<div class="form-group">
																				<div class="input-group input-medium date date-picker" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
																					<input type="text" class="form-control" readonly> <span class="input-group-btn">
																						<button class="btn default" type="button">
																							<i class="fa fa-calendar"></i>
																						</button>
																					</span>
																				</div>
																				<!-- /input-group -->
																			</div>
																		</div>
																		<div class="form-group">
																			<label>Note</label>
																			<textarea class="form-control" rows="3" placeholder="Type Note"> </textarea>
																		</div>
																	</div>
																</form>
															</div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-primary">Save</button>
															<button type="button" class="btn btn-danger">Cancel</button>
														</div>
													</div>
												</div>
											</div>
											<!-- modal ends -->
										</div>
									</div>
								</div>
								<div class="selected_rows">
									<font id="show_checkbox_selected"></font>
									<a id="selectall">select all</a>
								</div>
								<div class="portlet light">
									<div class="portlet-body">
										<table class="table table-striped table-bordered table-hover table-checkable order-column dataTable allchekbox" id="sample_1_2" role="grid" aria-describedby="sample_1_2_info">
											<thead>
												<tr>
													<th style="width: 35px;"><label> <input type="checkbox" id="checkall" data-set="" name="all" /> <span id="growl-primary1"></span>
													</label></th>
													<th>Added Date and Time</th>
													<th>OPT-IN Name</th>
													<th>Status</th>
													<th>Status Date</th>
												</tr>
											</thead>
											<tbody>
                                            <?php
																																												for($i=0;$i < count($result);$i ++)
																																												{
																																													?>        
                                                        <tr class="odd gradeX">
													<td><label> <input name="chk1" class="check_box" type="checkbox" data-ptag="sb1" id="chk1" value="<?php echo $result[$i]->optreq_id_pk;?>">
													</label></td>
													<td><?php echo $result[$i]->requested_date;?></td>
													<td><?php echo $result[$i]->optreq_opt_name;?></td>
													<td><?php echo $result[$i]->request_status;?></td>
													<td> <?php echo $result[$i]->app_rejt_date;?></td>
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
<script>

    $("#opt_in_form").validate({
    rules:{             
        txtoptname:{
            required:true,
            remote:
           {
                  url:"<?php echo base_url();?>admin/opt_in_out/verifyOptName",
                  type:"POST",
                  data:
                  {
                        txtSenderid:function()
                        {
                               return $("#txtoptname").val().trim()
                        }       
                  }  
           }
        }
    },
    messages:{                      
        txtoptname:{
            required:"Please Enter OPT Name",
            remote:jQuery.validator.format("OPT Name already exists")
        }
    }
});


function deleteOptInOut()
{
        var count=<?php echo count($result)?>;
        var optid=0;
                 
         for(var i=1;i<=count;i++)
         {
              if($('#chk'+i).is(':checked'))
              {
                  optid=($("#chk"+i).val());                              
              }
         } 

        $.post("<?php echo base_url();?>admin/opt_in_out/deleteOptInOut",{opt_id:optid},function(data)
        {
                location.reload(true);
        });
}    


</script>