

<link href="<?php echo base_url();?>themes/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" />

<link href="<?php echo base_url();?>themes/assets/global/plugins/fullcalendar/fullcalendar.print.min.css" rel="stylesheet" media="print" />

<script src="<?php echo base_url();?>themes/assets/global/plugins/fullcalendar/lib/moment.min.js"></script>

<!-- <script src="<?php //echo base_url();?>themes/assets/global/plugins/fullcalendar/lib/jquery.min.js"></script>--> 

<script src="<?php echo base_url();?>themes/assets/global/plugins/fullcalendar/fullcalendar.min.js"></script>





<div class="page-content-wrapper">



    <div class="page-content">



        <div class="row">



            <div class="col-md-12">



                <div class=" app-ticket-list">



                    <div class="page-bar row">



                        <div class="col-md-6">



                            <h3 class="page-title"><?php getLocalkeyword('Reminder Management');?></h3>



                            <ul class="page-breadcrumb ">



                                <li> <a href="<?php echo base_url()?>admin/dashboard"><?php getLocalkeyword('Home');?></a> <i class="fa fa-circle"></i> </li>



                                <li> <span><?php getLocalkeyword('Reminder Management');?></span> </li>



                            </ul>



                        </div>



                        <div class="col-md-6"> </div>



                    </div>



                    <div class="row">



                        <div class="col-md-12">



                            <div class="table-toolbar">



                                <div class="row" style="margin-bottom: 12px;">



                                    <div class="col-md-3">



                                        <ul class="nav navbar-nav pl0">



                                            <li class="dropdown dropdown-user"> <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" style="font-size:18px;padding: 2px 0px;">Recently updated <i class="fa fa-angle-down"></i> </span></a>



                                                <ul class="dropdown-menu dropdown-menu-default">



                                                    <li> <a href="#">Recently updated </a> </li>



                                                    <li> <a href="#">All Contacts</a> </li>



                                                    <li> <a href="#">My Contacts </a> </li>



                                                    <li> <a href="#">Recently viewed</a> </li>



                                                    <li> <a href="#">Not updated in 30 Days</a> </li>



                                                </ul>



                                            </li>



                                        </ul>



                                    </div>



                                    <div class="col-md-5 pull-right" style="display:none;">



                                        <div class="pull-right">



                                            <div style="float: left; margin-top: 8px; margin-right: 5px;">

                                                <a href="#" data-target="#send_sms1" data-toggle="modal" class="margin_rgt"><img src="<?php echo base_url();?>themes/assets/sms.png" height="22" title="Send SMS" /></a>

                                                <a href="#" data-target="#send_email1" data-toggle="modal" class="margin_rgt"> <i class="fa fa-envelope-o fa-2x" title="Send Email" style="color:#828282; "></i></a>

                                                <a href="#" data-toggle="modal" data-target="#myModal_m" class="margin_rgt"> <i class="fa fa-trash fa-2x" title="Delete" style="color:#828282; "></i></a>

                                            </div>



                                            <a href="#"><?php getLocalkeyword('Import');?>  </a> / <a href="#"> <?php getLocalkeyword('Export');?> </a>



                                            <div class="btn-group" style="margin-left:5px;"> <a href="" data-target="#caledner_popup1" data-toggle="modal" id="sample_editable_1_new hvr-float-shadow" class="btn btn-primary">
                                            <?php getLocalkeyword('Add Reminder');?></a> </div>



                                            <ul class="nav navbar-nav pl0 pull-right">



                                                <li class="dropdown dropdown-user burger_menu"> <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" style="margin-top:0px;"><i class="fa fa-bars fa-2x" aria-hidden="true"></i> </a>



                                                    <ul class="dropdown-menu dropdown-menu-default">



                                                        <li class="options" style="border-bottom: 1px solid #e7ecf1;"> <a href="custom_fields.html" title="Custom Fields" style="padding-top: 0px; margin-top: 5px; padding-left: 0px;"><?php getLocalkeyword('Change Contact Group');?></a></li>



                                                        <li class="options"> <a href="custom_fields.html" title="Custom Fields" style="padding-top: 0px; margin-top: 5px; padding-left: 0px;"><?php getLocalkeyword('Manage custom Fields');?></a></li>



                                                    </ul>



                                                </li>



                                            </ul>



                                            <div id="myModal_m" class="modal fade" role="dialog">



                                                <div class="modal-dialog">



                                                    <div class="modal-content">



                                                        <div class="modal-header">



                                                            <button type="button" class="close" data-dismiss="modal">×</button>



                                                            <h2 class="modal-title text-center"> <i class="fa fa-trash"></i> Are you sure to Delete? </h2>



                                                        </div>



                                                        <div class="modal-footer"> <a href class="btn btn-primary">Yes</a>



                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>



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



                                                                <h2 class="modal-title text-center"><i class="fa fa-envelope"></i> Send SMS</h2>



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



                                                                <h2 class="modal-title text-center"><i class="fa fa-envelope-o"></i> Send SMS</h2>



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



                                                                <h2 class="modal-title text-center"><i class="fa fa-envelope-o"></i> Send Email</h2>



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



                                                                <h2 class="modal-title text-center"> <i class="fa fa-envelope-o"></i> Send Email </h2>



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



                                                    <div class="modal-content" style="height:600px; overflow:auto;">



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



                                                                                        <button id="sample_editable_1_new" class=" btn-primary" style="margin-top:30px; margin-left:15px;"><i class="fa fa-plus"></i> Add New Visitor </button>



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



                                                                                <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-viewmode="years">



                                                                                    <input type="text" class="form-control" readonly>



                                                                                    <span class="input-group-btn">



                                                                                      <button class="btn default" type="button"> <i class="fa fa-calendar"></i> </button>



                                                                                      </span> </div>



                                                                                <!-- /input-group -->



                                                                            </div>



                                                                        </div>



                                                                        <div class="col-md-6">



                                                                            <label>Aniversary Date</label>



                                                                            <div class="form-group">



                                                                                <div class="input-group input-medium date date-picker" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">



                                                                                    <input type="text" class="form-control" readonly>



                                                                                    <span class="input-group-btn">



                                                                                      <button class="btn default" type="button"> <i class="fa fa-calendar"></i> </button>



                                                                                      </span> </div>



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



                                <div class="row">



                                    <div class="col-lg-12 col-md-12 col-sm-12">

                                    	<div class="col-lg-1 col-md-1 col-sm-1"></div>



                                    	<div class="col-lg-10 col-md-10 col-sm-10">

		                                        <div id="calendar" class="has-toolbar"> </div>

		                                </div>

		                                <div class="col-lg-1 col-md-1 col-sm-1">

		 												<button type="button" id="add_event_btn" class="btn btn-primary" style="text-align:center;margin-top: 400%;display: none;" >
		 												<?php getLocalkeyword('Add Event');?>

		 												</button>

		                                </div>

                                    </div>

                                    



                                    <div class="modal fade" id="caledner_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false">



                                        <div class="modal-dialog">



                                            <div class="modal-content">



                                                <div class="modal-header">



                                                    <button type="button" id="close" class="close" data-dismiss="modal" aria-hidden="true">×</button>



                                                    <h4 class="modal-title"><i class="fa fa-envelope-o"></i> <?php getLocalkeyword('Add Event');?></h4>



                                                </div>



                                                <div class="modal-body">



                                                    <div class="row add_event">

                                                        



                                                            <div class="col-md-12 colform1-sm-12">



                                                                <div class="col-md-3 col-sm-3">



                                                                    <label class="control-label"><?php getLocalkeyword('Select Reminder');?></label>



                                                                </div>



                                                                <div class="col-md-5 col-sm-5">



                                                                    <select class="form-control" id="selremindertype" name="selremindertype">



                                                                        <option value="">--select--</option>



                                                                        <option value="basic" id="selremindertype" name="selremindertype">Basic Reminder</option>



                                                                        <option value="custom" id="selremindertype" name="selremindertype">Custom Reminder</option>



                                                                    </select>



                                                                </div>



                                                            </div>                                                       



	                                                        <div class="col-md-12">



	                                                            <form id="basic_form" name="basic_form" style="display:none;" method="POST" action="<?php echo base_url();?>admin/reminder_management/setReminder">



	                                                                <div class="form-body col-md-12">



	                                                                    <div class="form-group">



	                                                                        <label><?php getLocalkeyword('Recipent Mobile Number');?> <span class="mandatory">*</span></label>



	                                                                        <input type="text" class="form-control" placeholder="Mobile Number" id="txtrecipientmobile" name="txtrecipientmobile" required onkeyup="getRecipientName();" minlength="10" maxlength="10" pattern="[0-9 ]+" required>



	                                                                    </div>



	                                                                    <div class="form-group">



	                                                                        <label><?php getLocalkeyword('Recipent Name');?><span class="mandatory">*</span></label>



	                                                                        <input type="text" class="form-control " placeholder="Name" id="txtrecipientname" name="txtrecipientname" required readonly>



	                                                                    </div>



	                                                                    <div class="row">



	                                                                        <div class="col-md-12">



	                                                                            <div class="form-group">



	                                                                                <div class="input-group col-md-12">



                                                                                        <label><?php getLocalkeyword('Select Report To');?><span class="mandatory">*</span></label>



	                                                                                    <!-- <input type="text" class="search-query form-control" placeholder="Report To" id="txtreportto" name="txtreportto" required> -->



								                                            <select id="selLocation" name="selLocation[]"  class="form-control" data-placeholder="Select Location" multiple required="required">

								                                            <?php 

								                                           

								                                             for($rs=0;$rs<count($admin_report_to);$rs++)

								                                             {

								                                              ?>

								                                               			<option value="<?php echo $admin_report_to[$rs]->sysu_id_pk;?>"><?php echo $admin_report_to[$rs]->sysu_name;?></option>

								                                              <?php 

								                                             }

								                                            ?>

								                                    		</select>



	                                                                                    <!-- <span class="input-group-btn">



	                                                                                    <button class="btn btn-danger" type="button"> <span class=" glyphicon glyphicon-search"></span> </button>



	                                                                                    </span> -->

	                                                                                </div>



	                                                                            </div>



	                                                                        </div>



	                                                                        <div class="col-md-12">



	                                                                            <div class="mt-checkbox-list">



	                                                                                <label class="mt-checkbox mt-checkbox-outline" style="padding-left: 20px; line-height: 15px; margin-bottom:0px;"> <?php getLocalkeyword('Non English');?>



	                                                                                    <input type="checkbox" id="chknonenglish" name="chknonenglish">



	                                                                                    <span></span> </label>



	                                                                            </div>



	                                                                        </div>



	                                                                    </div>



	                                                                    <div class="form-group">



	                                                                        <label><?php getLocalkeyword('Reminder Text');?></label>



	                                                                        <textarea class="form-control" rows="3" placeholder="Type Here" id="txtremindertext" name="txtremindertext" required></textarea>



	                                                                    </div>



	                                                                    <div class="row">



	                                                                        <div class="col-md-8">



	                                                                            <div class="input-group date form_datetime">



	                                                                                <input type="text" size="16" readonly class="form-control" id="txtdate" name="txtdate" required>



	                                                                                <span class="input-group-btn">

	                                                                                    <button class="btn default date-reset" type="button">



	                                                                                    <i class="fa fa-times"></i>



	                                                                                    </button>



	                                                                                    <button class="btn default date-set" type="button">



	                                                                                    <i class="fa fa-calendar"></i>



	                                                                                    </button>



	                                                                                </span>



	                                                                            </div>



	                                                                        </div>



	                                                                    </div>



	                                                                    <!--<div class="col-md-3">



	                                                                      <div class="form-group">



	                                                                        <label>Minutes</label>



	                                                                        <input type="time" class="form-control input-sm" placeholder="Minutes">



	                                                                      </div>



	                                                                    </div>-->



	                                                                </div>



	                                                                <div class="modal-footer">

	                                                                    <input type="hidden" id="hidden_reminder_type" name="hidden_reminder_type" value="basic_type" />

	                                                                    <button type="submit" class="btn btn-primary" name="btnSubmit"><?php getLocalkeyword('Save');?></button>



	                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><?php getLocalkeyword('Cancel');?></button>



	                                                                </div>



	                                                            </form>



	                                                            <form id="custom_form" style="display:none;" action="<?php echo base_url();?>admin/reminder_management/setReminder" method="POST">



	                                                                <div class="form-body row">



	                                                                    <div class="col-md-12 col-sm-12">



	                                                                        <div class="col-md-4">



	                                                                            <div class="form-group">



	                                                                                <label> <?php getLocalkeyword('Custom Column');?> <span class="mandatory">*</span></label>



	                                                                                <select class="form-control" id="selcustomcolumn" name="selcustomcolumn" required>



	                                                                                <option value="">Select</option>	



	                                                                                 <?php 

	                                                                                 for($cc=0;$cc<count($custom_column);$cc++)

	                                                                                 {

	                                                                                 ?>

	                                                                                         <option value="<?php echo $custom_column[$cc]->cfi_id_pk;?>"><?php echo $custom_column[$cc]->cfi_label;?></option>       

	                                                                                 <?php   

	                                                                                 }   

	                                                                                 ?>

	                                                                                </select>



	                                                                            </div>



	                                                                        </div>



	                                                                        <div class="col-md-4">



	                                                                            <div class="form-group">



	                                                                                <label><?php getLocalkeyword('SMS Template');?><span class="mandatory">*</span></label>



	                                                                                <select class="form-control" id="selsmstemplate" name="selsmstemplate" required>



	                                                                                <option value="">Select</option>



	                                                                                 <?php 

	                                                                                 for($st=0;$st<count($sms_template);$st++)

	                                                                                 {

	                                                                                 ?>

	                                                                                         <option value="<?php echo $sms_template[$st]->str_id_pk;?>"><?php echo $sms_template[$st]->str_template_name;?></option>       

	                                                                                 <?php   

	                                                                                 }   

	                                                                                 ?>   



	                                                                                </select>



	                                                                            </div>



	                                                                        </div>



	                                                                        <div class="col-md-4">



	                                                                            <div class="form-group">



	                                                                                <label><?php getLocalkeyword('Interval');?><span class="mandatory">*</span></label>



	                                                                                <select class="form-control" id="selinterval" name="selinterval" required>



	                                                                                <option value="">Select</option>



	                                                                                    <option value="weekly">Weekly</option>



	                                                                                    <option value="monthly">Monthly</option>



	                                                                                    <option value="quaterly">Quaterly</option>



	                                                                                    <option value="Yearly">Yearly</option>



	                                                                                </select>



	                                                                            </div>



	                                                                        </div>



	                                                                        <div class="col-md-4">



	                                                                            <div class="form-group">



	                                                                                <label><?php getLocalkeyword('Before Days');?> </label>



	                                                                                <input type="text" class="form-control input-sm" placeholder="Before Days" id="txtbeforedays" name="txtbeforedays" value="0">



	                                                                            </div>



	                                                                        </div>



	                                                                        <div class="col-md-4">



	                                                                            <label><?php getLocalkeyword('From Date');?></label>



	                                                                            <div class="form-group">



	                                                                                <div class="input-group  date date-picker" data-date-format="yyyy-mm-dd" data-date-viewmode="years">



	                                                                                    <input type="text" class="form-control" readonly id="txtfromdate" name="txtfromdate" required>



	                                                                                    <span class="input-group-btn">



	                                                                                        <button class="btn default" type="button"> <i class="fa fa-calendar"></i> </button>



	                                                                                    </span>

	                                                                                </div>



	                                                                                <!-- /input-group -->



	                                                                            </div>



	                                                                        </div>



	                                                                        <div class="col-md-4">



	                                                                            <label><?php getLocalkeyword('To Date');?></label>



	                                                                            <div class="form-group">



	                                                                                <div class="input-group  date date-picker" data-date-format="yyyy-mm-dd" data-date-viewmode="years">



	                                                                                    <input type="text" class="form-control" readonly id="txttodate" name="txttodate" required>



	                                                                                    <span class="input-group-btn">



	                                                                                        <button class="btn default" type="button"> <i class="fa fa-calendar"></i> </button>



	                                                                                    </span>

	                                                                                </div>



	                                                                                <!-- /input-group -->



	                                                                            </div>



	                                                                        </div>



	                                                                        <div class="form-group">



	                                                                            <label><?php getLocalkeyword('Reminder Text');?></label>



	                                                                            <textarea class="form-control" rows="3" placeholder="Type Here" id="txtcustomremindertext" name="txtcustomremindertext" required></textarea>



	                                                                        </div>



	                                                                        <div class="col-md-9">



	                                                                            <div class="form-group">



	                                                                                <div class="input-group col-md-12" id="show_report_to">



	                                                                                    <label><?php getLocalkeyword('Select Report To');?><span class="mandatory">*</span></label>



	                                                                                    <!-- <input type="text" class="search-query form-control" placeholder="Report To" id="txtreportto" name="txtreportto" required> -->



								                                            <select id="selCustomLocation" name="selCustomLocation[]"  class="form-control" data-placeholder="Select Location" multiple required="required">

								                                            <?php 

								                                           

								                                             for($rs=0;$rs<count($admin_report_to);$rs++)

								                                             {

								                                              ?>

								                                               			<option value="<?php echo $admin_report_to[$rs]->sysu_id_pk;?>"><?php echo $admin_report_to[$rs]->sysu_name;?></option>

								                                              <?php 

								                                             }

								                                            ?>

								                                    		</select>



	                                                                                    <!-- <span class="input-group-btn">



	                                                                                    <button class="btn btn-danger" type="button"> <span class=" glyphicon glyphicon-search"></span> </button>



	                                                                                    </span> -->

	                                                                                </div>



	                                                                            </div>



	                                                                        </div>



	                                                                        <div class="col-md-3" style="margin-top: 50px;">



	                                                                            <div class="mt-checkbox-list">



	                                                                                <label class="mt-checkbox mt-checkbox-outline">  <?php getLocalkeyword('Optional');?>



	                                                                                    <input type="checkbox" id="chkoptional" name="chkoptional" onclick="setDisplayHide();" >



	                                                                                    <span></span> </label>



	                                                                            </div>



	                                                                        </div>



	                                                                        <div class="col-md-12">



	                                                                            <div class="modal-footer">

	                                                                                <input type="hidden" id="hidden_reminder_type" name="hidden_reminder_type" value="custom_type" />

	                                                                                <button type="submit" class="btn btn-primary"><?php getLocalkeyword('Save');?></button>



	                                                                                <button type="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><?php getLocalkeyword('Cancel');?></button>



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

    

    <!--  calender -->



    



    <!-- <script src="<?php //echo base_url();?>themes/assets/apps/scripts/calendar.min.js" type="text/javascript"></script> -->



    <!--  calender /-->





    <!-- script for calender popup starts here -->



    <script>

        $(document).ready(function() {



            $('#add_event_btn').click(function() 

            {

                $('#caledner_popup').modal('show');               

                

                document.getElementById("basic_form").reset();



                document.getElementById("custom_form").reset();



                $("#selremindertype").val('');



		        $('#basic_form').hide();



		        $('#custom_form').hide();

            });



            $("#add_event_btn").css("display","block");



        });

    </script>



    







<script>

    $('#close').click(function() {



        //$('#form1')[0].reset();



        $('#basic_form').hide();



        $('#custom_form').hide();



    });

    



    $('#close').click(function() {



        //$('#form1')[0].reset();



        $('#basic_form').hide();



        $('#custom_form').hide();



    });





    $("select").change(function() {

        $(this).find("option:selected").each(function() {



            if ($(this).attr("value") == "basic") {



                // $(".box").not(".red").hide();



                $("#basic_form").show();



                $("#custom_form").hide();



            } else if ($(this).attr("value") == "custom") {



                //  $(".box").not(".green").hide();



                $("#custom_form").show();



                $("#basic_form").hide();



            } else {



                $(".box").hide();



            }



        });



    }).change();







    $(document).ready(function() {



        $(".form_datetime").datetimepicker({});

        $(".date-picker").datepicker({});

        $(".select2-multiple").select2({});

  

        $.ajax({

            url: '<?php echo base_url();?>admin/reminder_management/getAllCalendarData',

            async: false,

            success: function(s) {

                //alert(s);



                json_events = s;

                console.log(json_events);

            }

        });



        $('#calendar').fullCalendar({

            header: {

                left: 'prev,next today',

                center: 'title',

                right: 'month,agendaWeek,agendaDay'

            },

            defaultDate: '2017-03-12',

            navLinks: true, // can click day/week names to navigate views

            selectable: true,

            selectHelper: true,

            editable: true,

            eventLimit: true, // allow "more" link when too many events

            events: JSON.parse(json_events),
            eventMouseover: function (data, event, view) {

            tooltip = '<div class="tooltiptopicevent" style="width:auto;height:auto;background:#feb811;position:absolute;z-index:10001;padding:10px 10px 10px 10px ;  line-height: 200%;">' + data.tooltip + '</div>';
            $("body").append(tooltip);
            $(this).mouseover(function (e) {
                $(this).css('z-index', 10000);
                $('.tooltiptopicevent').fadeIn('500');
                $('.tooltiptopicevent').fadeTo('10', 1.9);
            }).mousemove(function (e) {
                $('.tooltiptopicevent').css('top', e.pageY + 10);
                $('.tooltiptopicevent').css('left', e.pageX + 20);
            });
        },
        eventMouseout: function (data, event, view) {
            $(this).css('z-index', 8);
            $('.tooltiptopicevent').remove();
        }
        });
    });



    function setReminderDetails() {

        $.ajax({

            url: '<?php echo base_url();?>admin/reminder_management/setCalendarData',

            data: $("#reminder_form").serialize(),

            type: 'POST',

            dataType: 'json',

            success: function(response) {

                // event.id = response.eventid;

                // $('#calendar').fullCalendar('updateEvent',event);

                location.reload(true);

            },

            error: function(e) {

                console.log(e.responseText);

            }

        });       

    }





    function getRecipientName() {

        var mobile_no = document.getElementById('txtrecipientmobile').value;



        if (mobile_no.length >= 10) {

            $.post("<?php echo base_url();?>admin/reminder_management/getRecipientName", {

                mobile: mobile_no

            }, function(data) {

                $("#txtrecipientname").val(data);

            });

        }

    }





    function setDisplayHide()

    {

    		var opt_chk=document.getElementById('chkoptional').checked;



    		if(opt_chk)

    		{

					//document.getElementById('show_report_to').style.display='none';   

					$("#selCustomLocation").attr("disabled","true");

					$("#selCustomLocation").removeAttr("required"); 				

    		}

    		else

    		{

    				//document.getElementById('show_report_to').style.display='block';

    				$("#selCustomLocation").attr("required", "true");

    				$("#selCustomLocation").removeAttr("disabled");	

    		}	

    }



    // function getReporttoadmin()

    // {

    //          var admin_report_to=document.getElementById('txtreportto').value;



    //          if(strlen(admin_report_to)>=3)

    //          {

    //          		$.post("<?php //echo base_url();?>admin/reminder_management/getReporttoadmin", {

		  //               reminder_type: value

		  //           }, function(data) {

		  //               $("#reminder_form").val(data);

		  //           });

    //          }

    //          else

    //          {



    //          }

    // }





    	



    



</script>