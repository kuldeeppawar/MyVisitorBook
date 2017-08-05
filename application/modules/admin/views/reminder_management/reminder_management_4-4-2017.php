<div class="page-content-wrapper">

    <div class="page-content">

        <div class="row">

            <div class="col-md-12">

                <div class=" app-ticket-list">

                    <div class="page-bar row">

                        <div class="col-md-6">

                            <h3 class="page-title">Reminder Management</h3>

                            <ul class="page-breadcrumb ">

                                <li> <a href="index.html">Home</a> <i class="fa fa-circle"></i> </li>

                                <li> <span>Reminder Management</span> </li>

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
                                                <a href="#" data-target="#send_sms1" data-toggle="modal" class="margin_rgt"><img src="../assets/sms.png" height="22" title="Send SMS" /></a>
                                                <a href="#" data-target="#send_email1" data-toggle="modal" class="margin_rgt"> <i class="fa fa-envelope-o fa-2x" title="Send Email" style="color:#828282; "></i></a>
                                                <a href="#" data-toggle="modal" data-target="#myModal_m" class="margin_rgt"> <i class="fa fa-trash fa-2x" title="Delete" style="color:#828282; "></i></a>
                                            </div>

                                            <a href="#"> Import </a> / <a href="#"> Export </a>

                                            <div class="btn-group" style="margin-left:5px;"> <a href="" data-target="#caledner_popup1" data-toggle="modal" id="sample_editable_1_new hvr-float-shadow" class="btn btn-primary"><!-- <i class="fa fa-user-plus" title="Add Visitor"></i>  -->Add Reminder</a> </div>

                                            <ul class="nav navbar-nav pl0 pull-right">

                                                <li class="dropdown dropdown-user burger_menu"> <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" style="margin-top:0px;"><i class="fa fa-bars fa-2x" aria-hidden="true"></i> </a>

                                                    <ul class="dropdown-menu dropdown-menu-default">

                                                        <li class="options" style="border-bottom: 1px solid #e7ecf1;"> <a href="custom_fields.html" title="Custom Fields" style="padding-top: 0px; margin-top: 5px; padding-left: 0px;">Change Contact Group</a></li>

                                                        <li class="options"> <a href="custom_fields.html" title="Custom Fields" style="padding-top: 0px; margin-top: 5px; padding-left: 0px;">Manage custom Fields</a></li>

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

                                                                                <div class="input-group input-medium date date-picker" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">

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

                                        <div id="calendar" class="has-toolbar"> </div>

                                    </div>

                                    <div class="modal fade" id="caledner_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false">

                                        <div class="modal-dialog">

                                            <div class="modal-content">

                                                <div class="modal-header">

                                                    <button type="button" id="close" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                                                    <h4 class="modal-title"><i class="fa fa-envelope-o"></i> Add Event</h4>

                                                </div>

                                                <div class="modal-body">

                                                    <div class="row add_event">

                                                        <form role="form" id="reminder_form" name="reminder_form">

                                                            <div class="col-md-12 colform1-sm-12">

                                                                <div class="col-md-3 col-sm-3">

                                                                    <label class="control-label">Select Reminder</label>

                                                                </div>

                                                                <div class="col-md-5 col-sm-5">

                                                                    <select class="form-control" id="selremindertype" name="selremindertype">

                                                                        <option>--select--</option>

                                                                        <option value="basic">Basic Reminder</option>

                                                                        <option value="custom">Custom Reminder</option>

                                                                    </select>

                                                                </div>

                                                            </div>

                                                        </form>

                                                        <div class="col-md-12">

                                                            <form role="form" id="basic_form" name="basic_form" style="display:none;" method="POST" action="<?php echo base_url();?>admin/reminder_management/setCalendarData">

                                                                <div class="form-body col-md-12">

                                                                    <div class="form-group">

                                                                        <label>Recipent Mobile Number <span class="mandatory">*</span></label>

                                                                        <input type="text" class="form-control" placeholder="Mobile Number" id="txtrecipientmobile" name="txtrecipientmobile" required onkeyup="getRecipientName();" minlength="10" maxlength="10" pattern="[0-9 ]+">

                                                                    </div>

                                                                    <div class="form-group">

                                                                        <label>Recipent Name<span class="mandatory">*</span></label>

                                                                        <input type="text" class="form-control " placeholder="Name" id="txtrecipientname" name="txtrecipientname" required readonly>

                                                                    </div>

                                                                    <div class="row">

                                                                        <div class="col-md-12">

                                                                            <div class="form-group">

                                                                                <div class="input-group col-md-12">

                                                                                    <input type="text" class="search-query form-control" placeholder="Report To" id="txtreportto" name="txtreportto" required>

                                                                                    <span class="input-group-btn">

                                                                                    <button class="btn btn-danger" type="button"> <span class=" glyphicon glyphicon-search"></span> </button>

                                                                                    </span>
                                                                                </div>

                                                                            </div>

                                                                        </div>

                                                                        <div class="col-md-12">

                                                                            <div class="mt-checkbox-list">

                                                                                <label class="mt-checkbox mt-checkbox-outline" style="padding-left: 20px; line-height: 15px; margin-bottom:0px;"> Non English

                                                                                    <input type="checkbox" id="chknonenglish" name="chknonenglish">

                                                                                    <span></span> </label>

                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                    <div class="form-group">

                                                                        <label>Reminder Text</label>

                                                                        <textarea class="form-control" rows="3" placeholder="Type Here" id="txtremindertext" name="txtremindertext" required></textarea>

                                                                    </div>

                                                                    <div class="row">

                                                                        <div class="col-md-8">

                                                                            <div class="input-group date form_datetime" data-date="2012-12-21T15:25:00Z">

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
                                                                <input type="hidden" id="hidden_reminder_type" name="hidden_reminder_type" value="basic_type"/>
                                                                    <button type="submit" class="btn btn-primary" name="btnSubmit">Save</button>

                                                                    <button type="button" class="btn btn-danger">Cancel</button>

                                                                </div>          

                                                            </form>

                                                            <form role="form" id="custom_form" style="display:none;" method="POST" action="<?php echo base_url();?>admin/reminder_management/setCalendarData">

                                                            <div class="form-body row">

                                                                <div class="col-md-12 col-sm-12">

                                                                    <div class="col-md-4">

                                                                        <div class="form-group">

                                                                            <label> Custom Column <span class="mandatory">*</span></label>

                                                                            <select class="form-control" id="selcustomcolumn" name="selcustomcolumn" required>

                                                                                <option>Option 1</option>

                                                                                <option>Option 2</option>

                                                                                <option>Option 3</option>

                                                                                <option>Option 4</option>

                                                                                <option>Option 5</option>

                                                                            </select>

                                                                        </div>

                                                                    </div>

                                                                    <div class="col-md-4">

                                                                        <div class="form-group">

                                                                            <label>SMS Template<span class="mandatory">*</span></label>

                                                                            <select class="form-control" id="selsmstemplate" name="selsmstemplate" required>

                                                                                <option>Option 1</option>

                                                                                <option>Option 2</option>

                                                                                <option>Option 3</option>

                                                                                <option>Option 4</option>

                                                                                <option>Option 5</option>

                                                                            </select>

                                                                        </div>

                                                                    </div>

                                                                    <div class="col-md-4">

                                                                        <div class="form-group">

                                                                            <label>Interval<span class="mandatory">*</span></label>

                                                                            <select class="form-control" id="selinterval" name="selinterval" required>

                                                                                <option>Option 1</option>

                                                                                <option>Option 2</option>

                                                                                <option>Option 3</option>

                                                                                <option>Option 4</option>

                                                                                <option>Option 5</option>

                                                                            </select>

                                                                        </div>

                                                                    </div>

                                                                    <div class="col-md-4">

                                                                        <div class="form-group">

                                                                            <label>Before Days <span class="mandatory">*</span></label>

                                                                            <input type="text" class="form-control input-sm" placeholder="Before Days" id="txtbeforedays" name="txtbeforedays" required>

                                                                        </div>

                                                                    </div>

                                                                    <div class="col-md-4">

                                                                        <label>From Date</label>

                                                                        <div class="form-group">

                                                                            <div class="input-group  date date-picker" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">

                                                                                <input type="text" class="form-control" readonly id="txtfromdate" name="txtfromdate" required>

                                                                                <span class="input-group-btn">

                                                                                    <button class="btn default" type="button"> <i class="fa fa-calendar"></i> </button>

                                                                                </span>
                                                                            </div>

                                                                            <!-- /input-group -->

                                                                        </div>

                                                                    </div>

                                                                    <div class="col-md-4">

                                                                        <label>To Date</label>

                                                                        <div class="form-group">

                                                                            <div class="input-group  date date-picker" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">

                                                                                <input type="text" class="form-control" readonly id="txttodate" name="txttodate" required>

                                                                                <span class="input-group-btn">

                                                                                    <button class="btn default" type="button"> <i class="fa fa-calendar"></i> </button>

                                                                                </span> 
                                                                            </div>

                                                                            <!-- /input-group -->

                                                                        </div>

                                                                    </div>

                                                                    <div class="col-md-9">

                                                                        <div class="form-group">

                                                                            <div class="input-group col-md-12">

                                                                                <input type="text" class="  search-query form-control" placeholder="Report To" id="txtreportto" name="txtreportto" required>

                                                                                <span class="input-group-btn">

                                                                                <button class="btn btn-danger" type="button"> <span class=" glyphicon glyphicon-search"></span> </button>

                                                                                </span>
                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                    <div class="col-md-3">

                                                                        <div class="mt-checkbox-list">

                                                                            <label class="mt-checkbox mt-checkbox-outline"> Optional

                                                                                <input type="checkbox" id="chkoptional" name="chkoptional">

                                                                                <span></span> </label>

                                                                        </div>

                                                                    </div>

                                                                    <div class="col-md-12">

                                                                        <div class="modal-footer">
                                                                        <input type="hidden" id="hidden_reminder_type" name="hidden_reminder_type" value="custom_type"/>
                                                                            <button type="submit" class="btn btn-primary">Save</button>

                                                                            <button type="button" class="btn btn-danger">Cancel</button>

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

<script>
    $('#close').click(function() {

        $('#form1')[0].reset();

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

        $.ajax({
            url: '<?php echo base_url();?>admin/reminder_management/getAllCalendarData',
            async: false,
            success: function(s) {
                //alert(s);

                json_events = s;
                console.log(s);
            }
        });


        // $('#calendar').fullCalendar(
        //         {
        //             header:
        //             {
        //                 left: 'prev,next today',
        //                 center: 'title',
        //                 right: 'month,agendaWeek,agendaDay'
        //             },
        //             defaultDate: '2015-02-12',
        //             editable: true,
        //             eventLimit: true, // allow "more" link when too many events
        //             events: [
        //             {
        //                 title: 'All Day Event',
        //                 start: '2017-02-01'
        //             },
        //             {
        //                 title: 'Long Event',
        //                 start: '2017-02-07',
        //                 end: '2017-02-10'
        //             },
        //             {
        //                 id: 999,
        //                 title: 'Repeating Event2',
        //                 start: '2017-02-09T16:00:00'
        //             },
        //             {
        //                 id: 999,
        //                 title: 'Repeating Event1',
        //                 start: '2017-02-16T16:00:00'
        //             },
        //             {
        //                 title: 'Conference1',
        //                 start: '2015-02-11',
        //                 end: '2017-02-13'
        //             },
        //             {
        //                 title: 'Meeting1',
        //                 start: '2017-02-12T10:30:00',
        //                 end: '2017-02-12T12:30:00'
        //             },
        //             {
        //                 title: 'Lunch',
        //                 start: '2017-02-12T12:00:00'
        //             },
        //             {
        //                 title: 'Meeting',
        //                 start: '2017-02-12T14:30:00'
        //             },
        //             {
        //                 title: 'Happy Hour',
        //                 start: '2017-02-12T17:30:00'
        //             },
        //             {
        //                 title: 'Dinner',
        //                 start: '2017-02-12T20:00:00'
        //             },
        //             {
        //                 title: 'Birthday Party you',
        //                 start: '2017-02-13T07:00:00'
        //             },
        //             {
        //                 title: 'FUCK for Google',
        //                 url: 'http://google.com/',
        //                 start: '2017-02-28'
        //             }]
        //         });

        $('#calendar1212').fullCalendar({
                events: JSON.parse(json_events),
                //events: [{"id":"14","title":"New Event","start":"2015-01-24T16:00:00+04:00","allDay":false}],
                utc: true,
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                editable: true,
                droppable: true, 
                slotDuration: '00:30:00'
                // eventReceive: function(event){
                //     //var reminder_type=$("#selremindertype").val();
                //     var title = event.title;
                //     var start = event.start.format("YYYY-MM-DD[T]HH:mm:SS");
                //     $.ajax({
                //         url: '<?php echo base_url();?>admin/reminder_management/setCalendarData',
                //         data: 'type='+reminder_type+'&title='+title+'&startdate='+start+'&zone='+zone,
                //         type: 'POST',
                //         dataType: 'json',
                //         success: function(response){
                //             event.id = response.eventid;
                //             $('#calendar').fullCalendar('updateEvent',event);
                //         },
                //         error: function(e){
                //             console.log(e.responseText);

                //         }
                //     });
                //     $('#calendar').fullCalendar('updateEvent',event);
                //     console.log(event);
                // }            
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

        // $('#calendar').fullCalendar({
        //         events: JSON.parse(json_events),
        //         //events: [{"id":"14","title":"New Event","start":"2015-01-24T16:00:00+04:00","allDay":false}],
        //         utc: true,
        //         header: 
        //         {
        //             left: 'prev,next today',
        //             center: 'title',
        //             right: 'month,agendaWeek,agendaDay'
        //         },
        //         editable: true,
        //         droppable: true, 
        //         slotDuration: '00:30:00',
        //         eventReceive: function(event)
        //         {
        //             //var reminder_type=$("#selremindertype").val();
        //             var title = event.title;
        //             var start = event.start.format("YYYY-MM-DD[T]HH:mm:SS");
        //             $.ajax({
        //                 url: '<?php echo base_url();?>admin/reminder_management/setCalendarData',
        //                 data: 'type='+reminder_type+'&title='+title+'&startdate='+start+'&zone='+zone,
        //                 type: 'POST',
        //                 dataType: 'json',
        //                 success: function(response)
        //                 {
        //                     event.id = response.eventid;
        //                     $('#calendar').fullCalendar('updateEvent',event);
        //                 },
        //                 error: function(e)
        //                 {
        //                     console.log(e.responseText);
        //                 }
        //             });
        //             $('#calendar').fullCalendar('updateEvent',event);
        //             console.log(event);
        //         }
        //         // eventDrop: function(event, delta, revertFunc) {
        //         //     var title = event.title;
        //         //     var start = event.start.format();
        //         //     var end = (event.end == null) ? start : event.end.format();
        //         //     $.ajax({
        //         //         url: 'process.php',
        //         //         data: 'type=resetdate&title='+title+'&start='+start+'&end='+end+'&eventid='+event.id,
        //         //         type: 'POST',
        //         //         dataType: 'json',
        //         //         success: function(response){
        //         //             if(response.status != 'success')                            
        //         //             revertFunc();
        //         //         },
        //         //         error: function(e){                     
        //         //             revertFunc();
        //         //             alert('Error processing your request: '+e.responseText);
        //         //         }
        //         //     });
        //         // },
        //         // eventClick: function(event, jsEvent, view) {
        //         //     console.log(event.id);
        //         //       var title = prompt('Event Title:', event.title, { buttons: { Ok: true, Cancel: false} });
        //         //       if (title){
        //         //           event.title = title;
        //         //           console.log('type=changetitle&title='+title+'&eventid='+event.id);
        //         //           $.ajax({
        //         //                 url: 'process.php',
        //         //                 data: 'type=changetitle&title='+title+'&eventid='+event.id,
        //         //                 type: 'POST',
        //         //                 dataType: 'json',
        //         //                 success: function(response){    
        //         //                     if(response.status == 'success')                            
        //         //                         $('#calendar').fullCalendar('updateEvent',event);
        //         //                 },
        //         //                 error: function(e){
        //         //                     alert('Error processing your request: '+e.responseText);
        //         //                 }
        //         //             });
        //         //       }
        //         // },
        //         // eventResize: function(event, delta, revertFunc) {
        //         //     console.log(event);
        //         //     var title = event.title;
        //         //     var end = event.end.format();
        //         //     var start = event.start.format();
        //         //     $.ajax({
        //         //         url: 'process.php',
        //         //         data: 'type=resetdate&title='+title+'&start='+start+'&end='+end+'&eventid='+event.id,
        //         //         type: 'POST',
        //         //         dataType: 'json',
        //         //         success: function(response){
        //         //             if(response.status != 'success')                            
        //         //             revertFunc();
        //         //         },
        //         //         error: function(e){                     
        //         //             revertFunc();
        //         //             alert('Error processing your request: '+e.responseText);
        //         //         }
        //         //     });
        //         // },
        //         // eventDragStop: function (event, jsEvent, ui, view) {
        //         //     if (isElemOverDiv()) {
        //         //         var con = confirm('Are you sure to delete this event permanently?');
        //         //         if(con == true) {
        //         //             $.ajax({
        //         //                 url: 'process.php',
        //         //                 data: 'type=remove&eventid='+event.id,
        //         //                 type: 'POST',
        //         //                 dataType: 'json',
        //         //                 success: function(response){
        //         //                     console.log(response);
        //         //                     if(response.status == 'success'){
        //         //                         $('#calendar').fullCalendar('removeEvents');
        //         //                         getFreshEvents();
        //         //                     }
        //         //                 },
        //         //                 error: function(e){ 
        //         //                     alert('Error processing your request: '+e.responseText);
        //         //                 }
        //         //             });
        //         //         }   
        //         //     }
        //         // }
        //     });
    }


    $("#basic_form").validate({
    rules:{
        txtrecipientmobile:{
            required:true,
            remote:
           {
                  url:"<?php echo base_url();?>admin/reminder_management/verifyMobileNo",
                  type:"POST",
                  data:
                  {
                        txtrecipientmobile:function()
                        {
                               return $("#txtrecipientmobile").val().trim()
                        }       
                  }  
           }
        },
        txtrecipientname:{
            required:true
        },
        txtreportto:{
            required:true
        },
        txtremindertext:{
            required:true
        },
        txtdate:{
            required:true
        }            
    },
    messages:{                      
        txtrecipientmobile:{
            required:"Please Enter Recipient Mobile No.",
            remote:jQuery.validator.format("Mobile No. not exists")
        },
        txtrecipientname:{
            required:"Please Enter Recipient Name"
        },
        txtreportto:{
            required:"Please Enter Report To"
        },
        txtremindertext:{
            required:"Please Enter Report To"
        },
        txtdate:{
            required:"Please Enter Date"
        }
    }
});

    $("#custom_form").validate({
    rules:{             
        selcustomcolumn:{
            required:true
        },
        selsmstemplate:{
            required:true
        },
        selinterval:{
            required:true
        },
        txtbeforedays:{
            required:true
        },
        txtfromdate:{
            required:true
        },
        txttodate:{
            required:true
        },
        txtreportto:{
            required:true
        }
    },
    messages:{                      
        selcustomcolumn:{
            required:"Please Select Custom Column"
        },
        selsmstemplate:{
            required:"Please Select Custom Column"
        },
        selinterval:{
            required:"Please Select Interval"
        },
        txtbeforedays:{
            required:"Please Enter Before Days"
        },
        txtfromdate:{
            required:"Please Enter From Date"
        },
        txttodate:{
            required:"Please Enter To Date"
        },
        txtreportto:{
            required:"Please Enter Report To"
        }
    }
});


function getRecipientName()
{
    var mobile_no=document.getElementById('txtrecipientmobile').value;

    if(mobile_no.length >=10)
    {
        $.post("<?php echo base_url();?>admin/reminder_management/getRecipientName",{mobile:mobile_no},function(data)
            {
                    $("#txtrecipientname").val(data);
            });
    }
}



</script>