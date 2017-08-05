<div class="page-content-wrapper">
	<div class="page-content">
		<div class="row">
			<?php                  
			if( $this->session->flashdata('success'))     
            {                  ?>
			<div id="prefix_834140561262" class="custom-alerts alert alert-success fade in ">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
				<?php echo $this->session->flashdata('success');?>
			</div>
			<?php   
			} 
			else   if( $this->session->flashdata('error'))              
            {?>
			<div id="prefix_1445089440962" class="custom-alerts alert alert-danger fade in">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
				<?php echo $this->session->flashdata('error');?>
			</div>
			<?php }                                            ?>
			<div class="col-md-12">
				<div class=" app-ticket-list">
					<div class="page-bar row">
						<div class="col-md-6">
							<h3 class="page-title"><?php getLocalkeyword('SMS Signature');?></h3>
							<ul class="page-breadcrumb ">
								<li><a href="<?php echo base_url()?>admin/dashboard"><?php getLocalkeyword('Home');?></a> <i class="fa fa-circle"></i></li>
								<li><a> <?php getLocalkeyword('Settings');?></a><i class="fa fa-circle"></i></li>
								<li><a> <?php getLocalkeyword('SMS Settings');?></a><i class="fa fa-circle"></i></li>
								<li><span><?php getLocalkeyword('SMS Signature');?> </span></li>
							</ul>
						</div>
						<div class="col-md-6">
							<div id="reportrange" class="btn pull-right " style="padding-top: 12px;">
								<i class="fa fa-calendar"></i> &nbsp; <span class="thin uppercase hidden-xs">August 28, 2016 - September 26, 2016</span> <b class="fa fa-angle-down"></b>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="table-toolbar">
								<div class="row">
									<div class="col-md-3">
										<ul class="nav navbar-nav pl0">
											<li class="dropdown dropdown-user"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" style="font-size: 18px; padding: 2px 0px;">Recently updated <i class="fa fa-angle-down"></i>
													</span></a>
												<ul class="dropdown-menu dropdown-menu-default">
													<li><a href="#">All Contacts</a></li>
													<li><a href="#">My Contacts </a></li>
													<li><a href="#">Recently viewed</a></li>
													<li><a href="#">Not updated in 30 Days</a></li>
												</ul>
											</li>
										</ul>
									</div>
									<div class="col-md-5 pull-right">
										<div class="pull-right">
											<div style="float: left; margin-top: 8px; margin-right: 5px;">
											   <?php if(getAdminAccessRights('mvbsmssignatureDefault'))
											   { ?>
												<a href="#" class="margin_rgt p_element" onclick="setDefault();">
												  <i class="fa fa-flag icon_custom" aria-hidden="true" title="Set as default"></i>
												 </a>
												<?php 
                                                  }
												if(getAdminAccessRights('mvbsmssignatureEdit'))
												{ ?>											
													<a href="#" onclick="getRecord();" class="margin_rgt p_element"><i
													class="fa fa-pencil-square-o icon_custom" aria-hidden="true" title="Edit"></i>
													</a>
												 <?php 
												}
												if(getAdminAccessRights('mvbsmssignatureDelete'))
												{	
													?>	
												<a href="#" data-toggle="modal" data-target="#myModal_m" class="margin_rgt p_elementd" id="sb1"> 
												<i class="fa fa-trash fa-2x" title="Delete" style="color: #828282;"></i>
												</a>
												<?php 
												}
												?>
											</div>
											<div class="btn-group" style="margin-left: 5px;">
												<?php 
												if(getAdminAccessRights('mvbsmssignatureAdd'))
												{
												?>
												<a href="#" data-toggle="modal" data-target="#myModal_m121" class="btn btn-primary">
													<?php getLocalkeyword('Add Signature');?>
												</a>
												<?php 
												}
												?>
											</div>
											<div id="myModal_m121" class="modal fade" role="dialog">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">×</button>
															<h2 class="modal-title text-left">
																<i class="fa fa-trash"></i><?php getLocalkeyword('Add Signature');?> 
															</h2>
														</div>
														<div class="modal-body">
															<div class="portlet-body form">
																<form role="form" action="<?php echo base_url()?>admin/setting/addsmsSignature" method="post">
																	<div class="form-body">
																		<div class="row">
																			<div class="col-md-12">
																				<div class="form-group">
																					<label><?php getLocalkeyword('Signature Title');?><span class="mandatory"></span></label> <input type="text" name="txtTitle" class="form-control" placeholder="Signature Title"
																					 required="required" maxlength="20">
																				</div>
																				<div class="input-group">
																					<div class="mt-checkbox-list" style="padding-top: 2px;">
																						<label> <input type="checkbox" name="chkEnglish" value="1"><?php getLocalkeyword('Non English');?>  <span></span>
																						</label>
																					</div>
																				</div>
																				<div class="form-group">
																					<label><?php getLocalkeyword('SMS Signature Text');?> <span class="mandatory"></span></label> <input type="text" name="txtSigntext" class="form-control" placeholder="SMS Signature Text"
																					 required="required" maxlength="20">
																				</div>
																				<P>* <?php getLocalkeyword('Character limit 20 max');?>.</p>
																				<div class="modal-footer">
																					<button type="submit" name="btnSubmit" class="btn btn-primary"><?php getLocalkeyword('Save');?></button>
																					<button type="button" class="btn btn-danger" data-dismiss="modal"><?php getLocalkeyword('Cancel');?></button>
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
											<div id="myModal_edit" class="modal fade" role="dialog"></div>
											<div id="myModal_m" class="modal fade" role="dialog">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">×</button>
															<h2 class="modal-title text-left">
																<i class="fa fa-trash"></i> <?php getLocalkeyword('Are you sure to Delete');?>?
															</h2>
														</div>
														<div class="modal-body">
															<div class="portlet-body form">
																<form role="form">
																	<div class="form-body">
																		<div class="row">
																			<div class="col-md-12">
																				<div class="modal-footer">
																					<button type="button" class="btn btn-primary" onclick="getDelete();"><?php getLocalkeyword('Yes');?></button>
																					<button type="button" class="btn btn-danger" data-dismiss="modal"><?php getLocalkeyword('No');?></button>
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
											<!-- modal ends -->
										</div>
									</div>
								</div>
								<p class="selected_rows">
									<font id="show_checkbox_selected"></font>
									<a id="selectall"><?php getLocalkeyword('select all');?></a>
								</p>
								<div class="portlet light">
									<div class="portlet-body">
										<table class="table table-striped table-bordered table-hover table-checkable order-column dataTable allchekbox" id="sample_1_2" role="grid" aria-describedby="sample_1_2_info">
											<thead>
												<tr>
													<th style="width: 35px;"><input type="checkbox" id="checkall" data-set="" name="all" /></th>
													<th><?php getLocalkeyword('Signature Name');?></th>
													<th><?php getLocalkeyword('Signtaure Details');?></th>
													<th><?php getLocalkeyword('Added Date & Time');?></th>
													<th><?php getLocalkeyword('Default');?></th>
												</tr>
											</thead>
											<tbody>
												<?php 		
												for($i=0;$i<count($resultSignature);$i++)															  {															    $j=$i+1;															  	?>
												<tr class="odd gradeX">
													<td><input name="chk<?php echo $j;?>" class="check_box" type="checkbox" data-ptag="sb1" id="chk<?php echo $j;?>" value="<?php echo $resultSignature[$i]->sig_id_pk;?>"></td>
													<td>
														<?php echo $resultSignature[$i]->sig_title;?>.</td>
													<td>
														<?php echo $resultSignature[$i]->sig_content;?>.</td>
													<td>
														<?php echo $resultSignature[$i]->sig_createdDate;?>.</td>
													<td>
														<?php if($resultSignature[$i]->sig_default==1){ echo "YES";}?>
													</td>
												</tr>
												<?php }?> </tbody>
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
</div>
</div>
<script>
function getRecord() {
	var count = <?php echo count($resultSignature)?>;
	var signId;
	for (var i = 1; i <= count; i++) {
		if ($('#chk' + i).is(':checked')) {
			signId = $("#chk" + i).val();
			$.post("<?php echo base_url();?>admin/setting/getSpecificsign", {
				signId: signId
			}, function(data) {
				$("#myModal_edit").html(data);
				$('#myModal_edit').modal('show');
			});
		}
	}
}

function setDefault() {
	var count = <?php echo count($resultSignature)?>;
	var signId;
	for (var i = 1; i <= count; i++) {
		if ($('#chk' + i).is(':checked')) {
			signId = $("#chk" + i).val();
			$.post("<?php echo base_url();?>admin/setting/setDefaultsmssign", {
				signId: signId
			}, function(data) {
				location.reload(true);
			});
		}
	}
}

function getDelete() {
	var count = <?php echo count($resultSignature) ?>;
	var signId = [];
	for (var i = 1; i <= count; i++) {
		if ($('#chk' + i).is(':checked')) {
			signId.push($("#chk" + i).val());
		}
	}
	if (signId.length === 0) {
		alert("Please Select The Signature");
	} else {
		$.post("<?php echo base_url();?>admin/setting/deletesmsSign", {
			signId: signId
		}, function(data) {
			location.reload(true);
		});
	}
}
</script>