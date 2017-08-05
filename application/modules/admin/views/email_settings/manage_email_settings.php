<script src="http://listjs.com/assets/javascripts/list.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/list.pagination.js/0.1.1/list.pagination.min.js"></script>
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-md-12">
                <div class=" app-ticket-list">
                    <div class="page-bar row">
                        <div class="col-md-6">
                            <h3 class="page-title"><?php getLocalkeyword('Email Settings');?> </h3>
                            <ul class="page-breadcrumb ">
                                <li>
                                    <a href="<?php echo base_url()?>admin/dashboard">
                                        <?php getLocalkeyword('Home');?>
                                    </a> <i class="fa fa-circle"></i></li>
                                <li>
                                    <a>
                                        <?php getLocalkeyword('Settings');?>
                                    </a> <i class="fa fa-circle"></i></li>
                                <li><span><?php getLocalkeyword('Email Settings');?> </span></li>
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
                                            <li class="dropdown dropdown-user"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" style="font-size: 18px; padding: 2px 0px;">Recently updated <i class="fa fa-angle-down"></i> </span></a>
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
                                                <?php
													if (getAdminAccessRights('mvbSetEmailSetEdit'))
													{														?>
                                                    <a class="margin_rgt hide_element"><i class="fa fa-pencil-square-o icon_custom" aria-hidden="true" title="Edit" onclick="editEmailSettings();"></i></a>
                                                    <?php
													}

													if (getAdminAccessRights('mvbSetEmailSetDelete'))
													{														?>
                                                        <a href="#" data-toggle="modal" data-target="#myModal_m" class="margin_rgt hide_element" id="sb3"> <i class="fa fa-trash fa-2x" title="Delete" style="color: #828282;"></i></a>
                                                        <?php
													}
													?>
                                            </div>
                                            <?php
                                            	if(checkPackageRights($this->session->userdata('client_id'),'email_template_check'))
                                            	{
			                                            	if(getAdminAccessRights('mvbSetEmailSetAdd'))
															{			
											?>
				                                                <div class="btn-group" style="margin-left: 5px;">
				                                                    <a id="showsub2" class="btn btn-primary">
				                                                        <?php getLocalkeyword('Add Template');?>
				                                                    </a>
				                                                </div>
			                                <?php	
			                                            	}
	                                            }
	                                            else
	                                            {
	                                        ?>
	                                        			<div class="btn-group" style="margin-left: 5px;">
			                                                   <font color="red">You have reached max limit to create email template</font> 
			                                            </div>
	                                        <?php    	
	                                            }                                            
                                            ?>

                                                    <div id="myModal_m" class="modal fade" role="dialog">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                                                    <h2 class="modal-title text-left">
																<i class="fa fa-trash"></i> <?php getLocalkeyword('Are you sure to Delete');?> ?
															</h2>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="portlet-body form">
                                                                        <!-- <form role="form" id="" name="" method="POST" action="POST"> -->
                                                                        <div class="form-body">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="modal-footer">
                                                                                        <a class="btn btn-primary" onclick="deleteEmailTemp();">
                                                                                            <?php getLocalkeyword('Yes');?>
                                                                                        </a>
                                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                                                            <?php getLocalkeyword('No');?>
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!--  </form> -->
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
                                                                                                <label>Mobile no. <span class="mandatory"></span></label>
                                                                                                <input type="text" class="form-control" value="9876548965" readonly>
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
                                                                                                <label>Mobile no. <span class="mandatory"></span></label>
                                                                                                <input type="text" class="form-control" value="9876548965" readonly>
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
                                                                                                <label>Email-id <span class="mandatory"></span></label>
                                                                                                <input type="text" class="form-control" value="abc@gmail.com" readonly>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label>Subject <span class="mandatory"></span></label>
                                                                                                <input type="text" class="form-control">
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
                                                                                                <label>Email-id <span class="mandatory"></span></label>
                                                                                                <input type="text" class="form-control" value="abc@gmail.com" readonly>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label>Subject <span class="mandatory"></span></label>
                                                                                                <input type="text" class="form-control">
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
                                                                                    <label>Select Title <span class="mandatory">*</span></label>
                                                                                    <select class="form-control">
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
                                                                                                <label>First name <span class="mandatory">*</span></label>
                                                                                                <input type="text" class="form-control input-sm" placeholder="First name">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-4">
                                                                                        <div class="form-group">
                                                                                            <div class="form-group">
                                                                                                <label>Middle Name <span class="mandatory">*</span></label>
                                                                                                <input type="text" class="form-control input-sm" placeholder="Middle Name">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-4">
                                                                                        <div class="form-group">
                                                                                            <div class="form-group">
                                                                                                <label>Last Name <span class="mandatory">*</span></label>
                                                                                                <input type="text" class="form-control input-sm" placeholder="Last Name">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>Mobile Number <span class="mandatory">*</span></label>
                                                                                    <input type="text" class="form-control input-sm" placeholder="Mobile Number">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>Email Id <span class="mandatory">*</span></label>
                                                                                    <input type="text" class="form-control input-sm" placeholder="Email Id">
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-8">
                                                                                        <div class="form-group">
                                                                                            <label>Contact Group</label>
                                                                                            <select class="form-control">
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
                                                                                    <label>Select bussiness category</label>
                                                                                    <select class="form-control">
                                                                                        <option>Option 1</option>
                                                                                        <option>Option 2</option>
                                                                                        <option>Option 3</option>
                                                                                        <option>Option 4</option>
                                                                                        <option>Option 5</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>Business Name</label>
                                                                                    <input type="text" class="form-control input-sm" placeholder="Business Name">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>Address</label>
                                                                                    <input type="text" class="form-control input-sm" placeholder="Address">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>Website</label>
                                                                                    <input type="text" class="form-control input-sm" placeholder="Website URL">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>Country</label>
                                                                                    <select class="form-control">
                                                                                        <option>Option 1</option>
                                                                                        <option>Option 2</option>
                                                                                        <option>Option 3</option>
                                                                                        <option>Option 4</option>
                                                                                        <option>Option 5</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>State</label>
                                                                                    <select class="form-control">
                                                                                        <option>Option 1</option>
                                                                                        <option>Option 2</option>
                                                                                        <option>Option 3</option>
                                                                                        <option>Option 4</option>
                                                                                        <option>Option 5</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>City</label>
                                                                                    <select class="form-control">
                                                                                        <option>Option 1</option>
                                                                                        <option>Option 2</option>
                                                                                        <option>Option 3</option>
                                                                                        <option>Option 4</option>
                                                                                        <option>Option 5</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>Zip Code</label>
                                                                                    <input type="text" class="form-control input-sm" placeholder="Zip Code">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>Landline No</label>
                                                                                    <input type="text" class="form-control input-sm" placeholder="landline No">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>Fax</label>
                                                                                    <input type="text" class="form-control input-sm" placeholder="Fax">
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
                                    <a id="selectall">
                                        <?php getLocalkeyword('select all');?> l</a>
                                </div>
                                <div class="portlet light">
                                    <div class="portlet-body">
                                        <table class="table table-hover table-checkable order-column" id="sample_1" style="width: 100% !important;">
                                            <thead>
                                                <tr>
                                                    <th style="width: 35px;">
                                                        <label>
                                                            <input type="checkbox" id="checkall" data-set="" name="all" /> <span id="growl-primary1"></span>
                                                        </label>
                                                    </th>
                                                    <th>
                                                        <?php getLocalkeyword('Added Date & Time');?>
                                                    </th>
                                                    <th>
                                                        <?php getLocalkeyword('Template Name');?>
                                                    </th>
                                                    <th>
                                                        <?php getLocalkeyword('Status');?>
                                                    </th>
                                                    <th>
                                                        <?php getLocalkeyword('Status Date');?>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php														for($i=0;$i < count($result);$i ++)
													{														?>
                                                    <tr class="odd gradeX">
                                                        <td>
                                                            <label>
                                                                <input name="chk1" class="check_box" type="checkbox" data-ptag="sb1" id="chk1" value="<?php echo $result[$i]->etr_id_pk;?>"> <span></span>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <?php echo $result[$i]->requested_date;?>
                                                        </td>
                                                        <td>
                                                            <?php echo $result[$i]->etr_template_name;?>
                                                        </td>
                                                        <td>
                                                            <?php echo ucfirst($result[$i]->request_status);?>
                                                        </td>
                                                        <td>
                                                            <?php echo $result[$i]->app_rejt_date;?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                	}														?>
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
<div class="page-content-wrapper1">
    <div class="user_list_box">
        <div class="row">
            <div class="col-md-4">
                <div class="portlet light bordered">
                    <div class="portlet-title1">
                        <a style="font-size: 18px; padding: 2px 0px;">
                            <?php getLocalkeyword('Available Email Templates');?> :</a>
                        <div class="row">

                            <div id="send_email2" class="modal fade" role="dialog">
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
                                                                        <label>Email-id <span class="mandatory"></span></label>
                                                                        <input type="text" class="form-control" value="abc@gmail.com" readonly>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Subject <span class="mandatory"></span></label>
                                                                        <input type="text" class="form-control">
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
                            <div id="myModal_m12" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">×</button>
                                            <h2 class="modal-title text-center" style="font-size: 18px !important;">
												<i class="fa fa-trash"></i> Are you sure to Delete?
											</h2>
                                        </div>
                                        <div class="modal-footer">
                                            <a href class="btn btn-primary">Yes</a>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body" style="height: 650px; overflow: auto;" id="test-list">
                        <ul class="list list-group All_list">
                            <?php																			for($j=0;$j < count($result);$j ++)
								{																			?>
                                <li class="list-group-item">
                                    <input type="checkbox" height="20" width="20" value="<?php echo $result[$j]->etr_id_pk;?>" onclick="uncheck_checkbox_edit('<?php echo $result[$j]->etr_id_pk;?>','<?php echo $j;?>');" id="temp_id_exists<?php echo $j;?>" name="temp_id_exists" class="checkbox1" />
                                    <?php echo $result[$j]->etr_template_name;?>
                                </li>
                                <?php
								}																			?>
                        </ul>
                        <ul class="pagination pull-right"></ul>
                    </div>
                </div>

            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="" style="margin-bottom: 10px; padding: 10px 0px; margin-left: 12px; margin-right: 12px;">
                        <div class="col-md-2"></div>
                        <div class="col-md-7"></div>
                        <div class="col-md-3">
                            <a onclick="closProfileDiv();" class="close_section pull-right" title="Close" id="close"><i style="color: #616161; padding-top: 10px;" class="fa fa-times fa-3x"></i></a>
                        </div>
                    </div>

                    <div id="send_emailm1" class="modal fade" role="dialog">
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
                                                                <label>Email-id <span class="mandatory"></span></label>
                                                                <input type="text" class="form-control" value="abc@gmail.com" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Subject <span class="mandatory"></span></label>
                                                                <input type="text" class="form-control">
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
                    <div id="myModal_mm1" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                    <h2 class="modal-title text-center" style="font-size: 18px !important;">
										<i class="fa fa-trash"></i> Are you sure to Delete?
									</h2>
                                </div>
                                <div class="modal-footer">
                                    <a href class="btn btn-primary">Yes</a>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-6" id="email_temp_dynamic">
                            <form id="email_temp_form" name="email_temp_form" method="POST" action="<?php echo base_url();?>admin/email_settings/addEmailSettings">
                                <div class="form-group">
                                    <label>
                                        <?php getLocalkeyword('Email Template Name');?> <span class="mandatory">*</span></label>
                                    <input type="text" class="form-control" placeholder="Email Template Name" id="txttemplatename" name="txttemplatename" required>
                                </div>
                                <div class="form-group">
                                    <label>
                                        <?php getLocalkeyword('Enter Content');?>
                                    </label>
                                    <textarea class="form-control" rows="3" placeholder="Email Body" style="height: 240px;" id="txtemailcontent" name="txtemailcontent" required></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="btnSubmit">
                                        <?php getLocalkeyword('Save');?>
                                    </button>
                                    <a href="<?php echo base_url();?>head/email_settings" class="btn btn-danger">
                                        <?php getLocalkeyword('Cancel');?>
                                    </a>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12" style="height: 73px;"></div>
                                <div class="col-md-12">
                                    <label>
                                        <?php getLocalkeyword('Select Fields');?>
                                    </label>
                                    <select class="form-control" id="selfields" name="selfields" onchange="getFieldsOptions(this.value);">
                                        <option value="">Select Fields</option>
                                        <option value="basic_fields">Basic Fields</option>
                                        <option value="contact_details">Contact Details</option>
                                        <option value="personal_info">Personal Info</option>
                                        <option value="custom_fields">Custom Fields</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <ul class="list-group" style="height: 200px; overflow: auto; border: solid 1px #b3b3b3;" id="get_fields_details">
                                        <!-- <li class="list-group-item">Name </li>

                                        <li class="list-group-item">Business Name</li>

                                        <li class="list-group-item">Address</li>

                                        <li class="list-group-item">Location</li>

                                        <li class="list-group-item">Name </li>

                                        <li class="list-group-item">Business Name</li>

                                        <li class="list-group-item">Address</li>

                                        <li class="list-group-item">Location</li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12"></div>
        </div>
    </div>
</div>
<script>
    $("div.user_list_box").hide();

    $("#showsub2").click(function() {

        $(".page-content-wrapper").hide();

        $("div.user_list_box").show();

    });

    function closProfileDiv() {
        $(".page-content-wrapper").show();

        $(".page-content-wrapper1").hide();
    }

    function getFieldsOptions(value) {
        var fields_type = value;

        $.post("<?php echo base_url();?>admin/email_settings/getFieldsOptions", {
            type_fields_id: fields_type
        }, function(data) {
            $("#get_fields_details").html(data);
        });
    }

    function getTemplateDetails(email_temp_id) {
        $.post("<?php echo base_url();?>admin/email_settings/getTemplateDetails", {
            temp_id: email_temp_id
        }, function(data) {
            $("#email_temp_dynamic").html(data);
        });
    }

    $("#email_temp_form").validate({
        rules: {
            txttemplatename: {
                required: true
            },
            txtemailcontent: {
                required: true
            }
        },
        messages: {
            txttemplatename: {
                required: "Please Enter Template Name"
            },
            txtemailcontent: {
                required: "Please Enter Content"
            }
        }
    });

    function editEmailSettings() {
        $(".page-content-wrapper").hide();

        $("div.user_list_box").show();

        var count = <?php echo count($result)?>;
        var tempid = 0;

        for (var i = 1; i <= count; i++) {
            if ($('#chk' + i).is(':checked')) {
                tempid = ($("#chk" + i).val());
            }
        }

        $.post("<?php echo base_url();?>admin/email_settings/getRecordById", {
            hidden_temp_id: tempid
        }, function(data) {
            var monkeyList = new List('test-list', {
                valueNames: ['name'],

                page: 12,

                plugins: [ListPagination({})]
            });

            $(".user_list_box").html(data);
        });
    }

    function deleteEmailTemp() {
        var count = <?php echo count($result)?>;
        var tempid = 0;

        for (var i = 1; i <= count; i++) {
            if ($('#chk' + i).is(':checked')) {
                tempid = ($("#chk" + i).val());
            }
        }

        $.post("<?php echo base_url();?>admin/email_settings/deleteEmailTemp", {
            temp_id: tempid
        }, function(data) {
            location.reload(true);
        });
    }

    function uncheck_checkbox_edit(value, value1) {
        var count = $('input:checkbox.checkbox1').length;

        for (var i = 0; i < count; i++) {
            if (value1 != i) {
                document.getElementById("temp_id_exists" + i).checked = false;
            }
        }

        getTemplateDetails(value);
    }

    var monkeyList = new List('test-list', {

        valueNames: ['name'],

        page: 12,

        plugins: [ListPagination({})]

    });
</script>