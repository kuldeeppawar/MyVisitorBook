<div class="page-content-wrapper">
	<div class="page-content">
		<div class="row">
			<div class="col-md-12">
				<div class=" app-ticket-list">
					<div class="page-bar row">
						<div class="col-md-6">
							<h3 class="page-title"><?php getLocalkeyword('Email Template Request');?></h3>
							<ul class="page-breadcrumb ">
								<li><a href="<?php echo base_url()?>head/dashboard">Home</a> <i class="fa fa-circle"></i></li>
								<li><a href="#"><?php getLocalkeyword('Approval Management');?></a> <i class="fa fa-circle"></i></li>
								<li><span><?php getLocalkeyword('Email Template Request');?></span></li>
							</ul>
						</div>
						<div class="col-md-6">
							<div id="reportrange" class="btn pull-right " style="padding-top: 12px;">
								<i class="fa fa-calendar"></i> &nbsp; <span class="thin uppercase hidden-xs">August 28, 2016 - September 26, 2016</span> <b class="fa fa-angle-down"></b>
							</div>
						</div>
					</div>
					<div class="row">
						<?php if ($this->session->flashdata('success')) { ?>
                        <div id="prefix_834140561262" class="custom-alerts alert alert-success fade in ">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            <?php echo $this->session->flashdata('success');?></div>
                        <?php } else if ($this->session->flashdata('error')) { ?>
                        <div id="prefix_1445089440962" class="custom-alerts alert alert-danger fade in">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            <?php echo $this->session->flashdata('error');?></div>
                        <?php } ?>
						<!--modal-->
						<div id="content_popup" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">×</button>
										<h4 class="modal-title text-left"><?php getLocalkeyword('Template Content');?></h4>
									</div>
									<!-- <form id="stemp_request_form" name="stemp_request_form" action="<?php //echo base_url();?>head/sms_temp_request/setApproveStatus" method="POST"> -->
									<div class="modal-body">
										<div class="col-md-1"></div>
										<div class="col-md-10 form-group">
											<div class="row">
												<div class="col-md-12" id="template_content_popup"></div>
											</div>
										</div>
										<div class="clearfix"></div>
									</div>
									<!-- </form> -->
								</div>
							</div>
						</div>
						<div id="approve_comment" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">×</button>
										<h4 class="modal-title text-left"><?php getLocalkeyword('Add Comment');?></h4>
									</div>
									<!-- <form id="stemp_request_form" name="stemp_request_form" action="<?php //echo base_url();?>head/sms_temp_request/setApproveStatus" method="POST"> -->
									<div class="modal-body">
										<div class="col-md-1"></div>
										<div class="col-md-10 form-group">
											<div class="row">
												<div class="col-md-12">
													<label><?php getLocalkeyword('Enter Comment');?></label>
												</div>
												<div class="col-md-12">
													<textarea rows="4" class="form-control" id="txtCommentApprove" name="txtCommentApprove" required></textarea>
												</div>
											</div>
										</div>
										<div class="col-md-1"></div>
										<div class="clearfix"></div>
										<div class="row">
											<div class="col-md-1"></div>
											<div class="col-md-11">
												<a href="#" style="margin-left: 10px;">
													<button type="button" class="btn btn-primary" name="btnSubmit" onclick="setStatus('approved');"><?php getLocalkeyword('Submit');?></button>
												</a>
												<button type="button" class="btn btn-danger" data-dismiss="modal"><?php getLocalkeyword('Cancel');?></button>
											</div>
										</div>
										<div class="modal-footer"></div>
									</div>
									<!-- </form> -->
								</div>
							</div>
						</div>
						<div id="reject_comment" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">×</button>
										<h4 class="modal-title text-left"><?php getLocalkeyword('Add Comment');?></h4>
									</div>
									<!-- <form id="stemp_request_form" name="stemp_request_form" action="<?php //echo base_url();?>head/sms_temp_request/setRejectStatus" method="POST"> -->
									<div class="modal-body">
										<div class="col-md-1"></div>
										<div class="col-md-10 form-group">
											<div class="row">
												<div class="col-md-12">
													<label><?php getLocalkeyword('Enter Comment');?></label>
												</div>
												<div class="col-md-12">
													<textarea rows="4" class="form-control" id="txtCommentReject" name="txtCommentReject" required></textarea>
												</div>
											</div>
										</div>
										<div class="col-md-1"></div>
										<div class="clearfix"></div>
										<div class="row">
											<div class="col-md-1"></div>
											<div class="col-md-11">
												<a href="#" style="margin-left: 10px;">
													<button type="button" onclick="setStatus('rejected');" class="btn btn-primary" name="btnSubmit"><?php getLocalkeyword('Submit');?></button>
												</a>
												<button type="button" class="btn btn-danger" data-dismiss="modal"><?php getLocalkeyword('Cancel');?></button>
											</div>
										</div>
										<div class="modal-footer"></div>
									</div>
									<!-- </form> -->
								</div>
							</div>
						</div>
						<!--end modal-->
						<div class="col-md-12">
							<div class="table-toolbar">
								<div class="row">
									<div class="col-md-3 ">
										<ul class="nav navbar-nav pl0">
											<li class="dropdown dropdown-user"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"
												style="font-size: 18px; padding: 2px 0px;">
												Recently updated <i class="fa fa-angle-down"></i>
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
												<!-- <a href="#" class="margin_rgt hide_element" data-toggle="modal" data-target="#addSender1"> <i class="fa fa-pencil-square-o fa-2x" title="edit" style="color:#828282; "></i></a> -->
											</div>
                                        <?php
										if (getAccessRights('mvbAmEtrApprove') || getAccessRights('mvbAmEtrReject'))
										{
											?>
                                                <ul class="nav navbar-nav pl0 pull-right" style="margin-left: 5px;">
												<li class="dropdown dropdown-user burger_menu"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" style="margin-top: 0px;"><i
														class="fa fa-bars fa-2x" aria-hidden="true"></i> </a>
                                                   <?php
													if (getAccessRights('mvbAmEtrApprove') || getAccessRights('mvbAmEtrReject'))
													{
 													  ?>    
                                                            <ul class="dropdown-menu dropdown-menu-default">
                                                       <?php
														if (getAccessRights('mvbAmEtrApprove'))
														{
														?>        
        	                                                <li class="options" style="border-bottom: 1px solid #e7ecf1;">
            	                                               <a id="approve_popup" data-toggle="modal" title="Approve"onclick="checkCB('approve');" 
                                                                          style="padding: 5px; margin-top: 5px;"><?php getLocalkeyword('Approve');?></a></li>
                                                         <?php
         		 									     }
														if (getAccessRights('mvbAmEtrReject'))
														{
														  ?>            
                                                            <li class="options"><a id="reject_popup" data-toggle="modal" title=" Reject" style="padding: 5px; margin-top: 5px;"
															           onclick="checkCB('reject');"><?php getLocalkeyword('Reject');?></a></li>
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
													<th style="width: 35px;"><input type="checkbox" id="checkall" data-set="" name="all" /> <span id="growl-primary1"></span> </label></th>
													<th><?php getLocalkeyword('Sr. No.');?></th>
													<th><?php getLocalkeyword('Client Name');?></th>
													<th><?php getLocalkeyword('Requested Date and Time');?></th>
													<th><?php getLocalkeyword('Template Name');?></th>
													<th><?php getLocalkeyword('Template Content');?></th>
													<th><?php getLocalkeyword('Approval/Reject Date and Time');?></th>
													<th><?php getLocalkeyword('Status');?></th>
												</tr>
											</thead>
											<tbody>
                                              <?php
												for($st=0;$st<count($result);$st++)
												{
													$mu=$st+1;
													?>
                                                    <tr class="odd gradeX">
													<td><input name="chk1" class="check_box" type="checkbox" data-ptag="sb1" id="chk<?php echo $mu;?>" value="<?php echo $result[$st]->etr_id_pk;?>"></td>
													<td><?php echo $mu;?></td>
													<td><?php echo $result[$st]->clnt_name;?></td>
													<td><?php echo $result[$st]->requested_date;?></td>
													<td><?php echo $result[$st]->etr_template_name;?></td>
													<td><a data-toggle="modal" data-target="#content_popup" id="email_template_content" onclick="getTemplateContent(<?php echo $result[$st]->etr_id_pk;?>);">View</a></td>
													<td><?php echo $result[$st]->app_rejt_date;?></td>
													<td><?php echo ucfirst($result[$st]->etr_admin_status);?> <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top"
														title="<?php echo $result[$st]->etr_comment;?>"></i>
													</td>
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
    function setStatus(value) {
        if (value == 'approved') {
            var comment = document.getElementById('txtCommentApprove').value;
        } else {
            var comment = document.getElementById('txtCommentReject').value;
        }

        var count = '<?php echo count($result)?>';
        var email_temp_id = [];

        for (var i = 1; i <= count; i++) {
            if ($('#chk' + i).is(':checked')) {
                email_temp_id.push($("#chk" + i).val());
            }
        }

        if (email_temp_id.length === 0) {
            alert("Please select email template name");
        } else {
            $.post("<?php echo base_url();?>head/email_temp_request/setStatus", {
                type: value,
                emailtemp_id: email_temp_id,
                comment_value: comment
            }, function(data) {
                location.reload(true);
            });

        }
    }

    function checkCB(type) {
        var count = <?php echo count($result)?>;
        var sms_temp_id = [];

        for (var i = 1; i <= count; i++) {
            if ($('#chk' + i).is(':checked')) {
                sms_temp_id.push($("#chk" + i).val());
            }
        }

        if (sms_temp_id.length === 0) {
            alert("Please select email template name");
        } else {
            if (type == 'approve') {
                $("#approve_popup").attr("data-target", "#approve_comment");
            } else {
                $("#reject_popup").attr("data-target", "#reject_comment");
            }
        }
    }

    function getTemplateContent(value) {
        $.post("<?php echo base_url();?>head/email_temp_request/getTemplateContent", {
            email_temp_id: value
        }, function(data) {
            $("#template_content_popup").html(data);
        });
    }
</script>