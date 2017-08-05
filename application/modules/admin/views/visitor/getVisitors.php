<script src="<?php echo base_url() ?>themes/jquery.redirect.js" type="text/javascript"></script>
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-md-12">
                <div class=" app-ticket-list">
                    <div class="page-bar row">
                        <div class="col-md-6">
                            <h3 class="page-title">	<?php getLocalkeyword('Visitor Management');?></h3>
                            <ul class="page-breadcrumb ">
                                <li><a href="<?php echo base_url() ?>admin/dashboard">	<?php getLocalkeyword('Home');?></a> <i class="fa fa-circle"></i></li>
                                <li><span>	<?php getLocalkeyword('Visitor Management');?></span></li>
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
                                    <?php
                                    if ($this->session->flashdata('success'))
                                    {
                                        ?>
                                        <div id="prefix_834140561262" class="custom-alerts alert alert-success fade in ">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><?php echo $this->session->flashdata('success'); ?></div>
                                        <?php
                                    }
                                    else if ($this->session->flashdata('error'))
                                    {
                                        ?>

                                        <div id="prefix_1445089440962" class="custom-alerts alert alert-danger fade in">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><?php echo $this->session->flashdata('error'); ?></div>
                                        <?php
                                    }
                                    ?>
                                    <div class="col-md-3 ">
                                        <ul class="nav navbar-nav pl0">
                                            <li class="dropdown dropdown-user"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" style="font-size: 18px; padding: 2px 0px;">Recently updated <i class="fa fa-angle-down"></i>
                                                    </span></a>
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
                                               <?php 
                                               if(getAdminAccessRights('mvbVisitoredit'))
                                               {
                                               ?>
                                                <a onclick="getDetails()" id="sb3" class="margin_rgt" style="display: inline;">
                                                    <i class="fa fa-pencil-square-o icon_custom" aria-hidden="true" title="Edit"></i>
                                                </a> 
                                               <?php 
                                               }
                                               if(getAdminAccessRights('mvbVisitorsendsms'))
                                               {
                                               ?> 
                                                <a onclick="send_sms()" class="margin_rgt p_element1">
                                                    <img src="<?php echo base_url() ?>themes/assets/sms.png"height="22" title="Send SMS"/>
                                                </a>
                                               <?php 
                                               }
                                               if(getAdminAccessRights('mvbVisitorsendemail'))
                                               {
                                               ?> 
                                                <a onclick="send_email()" class="margin_rgt p_element1"> 
                                                    <i class="fa fa-envelope-o fa-2x" title="Send Email" style="color: #828282;"></i>
                                                </a>
                                               <?php 
                                               }
                                               if(getAdminAccessRights('mvbVisitordelete'))
                                               {
                                               ?> 
                                                <a href="#" data-toggle="modal" data-target="#myModal_m" id="sb2" class="margin_rgt hide_element">
                                                    <i class="fa fa-trash fa-2x" title="Delete" style="color: #828282;"></i>
                                                </a>
                                               <?php 
                                               }
                                               ?> 
                                            </div>
                                            <?php 
                                            if(getAdminAccessRights('mvbVisitorimport'))
                                            {
                                            ?>
                                            <a href="#" data-toggle="modal" data-target="#otpimport" class="p_element11">	<?php getLocalkeyword('Import');?> </a> 
                                            <?php 
                                            }
                                            
                                            ?>
                                            <span class="p_element11">/</span>
                                            <?php 
                                            if(getAdminAccessRights('mvbVisitorexport'))
                                            {
                                            ?>
                                            <a href="#" class="p_element11" data-toggle="modal" data-target="#otp">	<?php getLocalkeyword('Export');?> </a>
                                            <?php 
                                            }
                                            ?>
                                            <div class="btn-group">
                                               <?php 
                                               if(checkPackageRights($this->session->userdata('client_id'),'visitor_records'))
                                                {
                                                       if(getAdminAccessRights('mvbVisitoradd'))
                                                       {
                                                       ?>
                                                        <a href="<?php echo base_url() ?>admin/visitor/addVisitor" id="sample_editable_1_new hvr-float-shadow" class="btn btn-primary">
                                                           <?php getLocalkeyword('Add Contact');?>
                                                        </a>
                                                       <?php 
                                                       }
                                                }
                                                else
                                                {       
                                               ?>
                                                        <div class="btn-group" style="margin-left: 5px;">
                                                               <font color="red">You have reached max limit to add visitor</font> 
                                                        </div> 
                                               <?php
                                               }
                                               ?>
                                            </div>
                                            <ul class="nav navbar-nav pl0 pull-right" style="margin-left: 5px;">
                                                <li class="dropdown dropdown-user burger_menu"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" style="margin-top: 0px;"><i class="fa fa-bars fa-2x" aria-hidden="true"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-default">
                                                        <li class="options" style="border-bottom: 1px solid #e7ecf1;"><a style="padding: 5px; margin-top: 5px;" onclick="printAddressLabeling();"><?php getLocalkeyword('Print Address Label');?></a></li>
                                                        <li class="options" style="border-bottom: 1px solid #e7ecf1;"><a href="#" style="padding: 5px; margin-top: 5px;"><?php getLocalkeyword('Change Contact Group');?></a></li>
                                                        <li class="options" style="border-bottom: 1px solid #e7ecf1;"><a href="<?php echo base_url() ?>admin/customfield/getVisitorform" style="padding: 5px; margin-top: 5px;"><?php getLocalkeyword('Manage custom Fields');?></a></li>
                                                        <!--<li class="options"> <a href="#" title="Custom Fields" style="padding: 5px; margin-top: 5px; " data-toggle="modal" data-target="#outout_popup">Opt Out</a></li>-->
                                                    </ul></li>
                                            </ul>
                                            <div id="otp" class="modal fade in" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">×</button>
                                                            <h4 class="modal-title text-left"><?php getLocalkeyword('Enter OTP Here');?></h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="col-md-2"></div>
                                                            <div class="col-md-7 form-group">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <label><?php getLocalkeyword('Enter OPT');?></label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="password" name="txtOtp" id="txtOtp"  class="form-control input-sm">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2"></div>
                                                            <a href="#" onclick="validateOtp('1')"><button type="button" class="btn btn-primary"><?php getLocalkeyword('Submit');?></button></a>
                                                        </div>
                                                        <div class="modal-footer"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="otpimport" class="modal fade in" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">×</button>
                                                            <h4 class="modal-title text-left"><?php getLocalkeyword('Enter OTP Here');?></h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="col-md-2"></div>
                                                            <div class="col-md-7 form-group">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <label><?php getLocalkeyword('Enter OTP');?></label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="password" name="txtOtpimport" id="txtOtpimport"  class="form-control input-sm">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2"></div>
                                                            <a href="#" onclick="validateOtp('0')"><button type="button" class="btn btn-primary"><?php getLocalkeyword('Submit');?></button></a>
                                                        </div>
                                                        <div class="modal-footer"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="myModal_m" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">×</button>
                                                            <h2 class="modal-title text-left">
                                                                <i class="fa fa-trash"></i> <?php getLocalkeyword('Are you sure to Delete?');?>
                                                            </h2>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="portlet-body form">
                                                                <!-- <form role="form"> -->
                                                                    <div class="form-body">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="modal-footer">
                                                                                    <a href class="btn btn-primary" onclick="deleteVisitor();"><?php getLocalkeyword('Yes');?></a>
                                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><?php getLocalkeyword('No');?></button>
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
                                            <div id="import" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="col-md-10">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h2 class="modal-title text-left"><?php getLocalkeyword('Upload CSV');?></h2>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="portlet-body form">
                                                                    <form role="form"  action="<?php echo base_url() ?>admin/visitor/uploadCsv" method="post" enctype="multipart/form-data">
                                                                        <div class="form-body">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label><?php getLocalkeyword('Upload CSV file');?><span class="mandatory"></span></label>
                                                                                        <input type="file" id="txtFile" name="txtFile" required="required" accept=".csv">
                                                                                    </div>

                                                                                    <a onclick="getSamplecsv()" href="#"><?php getLocalkeyword('Download CSV Sample');?></a>
                                                                                    <div class="modal-footer">

                                                                                        <button type="submit" name="btnSubmit" class="btn btn-primary"><?php getLocalkeyword('Save');?></button>
                                                                                        <button type="button"   data-dismiss="modal" class="btn btn-danger"><?php getLocalkeyword('Cancel');?></button>
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
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-primary">Send SMS</button>
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
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-primary">Send Email</button>
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
                                                                            <textarea class="form-control" rows="3" placeholder="Type Note">                                                   </textarea>
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
                                <div class="selected_rows col-md-6 pl0">
                                <font id="show_checkbox_selected"></font>
                                    <a id="selectall"><?php getLocalkeyword('Select All');?></a>
                                </div>
                                <div class="col-md-6 pr0">
                                    <span class="pull-right"> <strong>Total <?php echo count($resultVisitor); ?> Visitors Available</strong></span>
                                </div>
                                <div class="portlet light">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable allchekbox" id="sample_1_2" role="grid" aria-describedby="sample_1_2_info">
                                            <thead>
                                                <tr>
                                                    <th style="width: 35px;"><input type="checkbox" id="checkall" data-set="" name="all" /> <span id="growl-primary1"></span> </label></th>
                                                    <th><?php getLocalkeyword('Customer Name');?></th>
                                                    <th><?php getLocalkeyword('Mobile No.');?></th>
                                                    <th><?php getLocalkeyword('Email Id');?></th>
                                                    <th><?php getLocalkeyword('Business Name');?></th>
                                                    <th><?php getLocalkeyword('Location');?></th>
                                                    <th><?php getLocalkeyword('Registration On');?></th>
                                                    <th><?php getLocalkeyword('Last Revisit');?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                for ($i = 0; $i < count($resultVisitor); $i++)
                                                {
                                                    $j = $i + 1;

                                                    //
                                                    ?>

                                                    <tr class="odd gradeX">
                                                        <td><input name="chk<?php echo $j ?>" class="check_box" type="checkbox" data-ptag="sb1" id="chk<?php echo $j ?>" value="<?php echo $resultVisitor[$i]->vis_id_pk; ?>"></td>
                                                        <td><a onclick="getProfiledetails('<?php echo $resultVisitor[$i]->vis_id_pk ?>')" ><?php echo $resultVisitor[$i]->vis_firstName . " " . $resultVisitor[$i]->vis_lastName ?></a></td>
                                                        <td><?php echo $resultVisitor[$i]->vis_mobile ?></td>
                                                        <td><?php echo $resultVisitor[$i]->vis_email ?></td>
                                                        <td><?php echo $resultVisitor[$i]->vis_businessName ?></td>
                                                        <td class="center"><?php echo $resultVisitor[$i]->cty_name ?></td>
                                                        <td><?php echo $resultVisitor[$i]->vis_createdDate ?></td>
                                                        <td><?php echo $resultVisitor[$i]->vl_visitDate ?></td>

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
<div class="page-content-wrapper1" id="visitorProfile" >

</div>
</div>
</div>
<a href="javascript:;" class="page-quick-sidebar-toggler"> <i class="icon-login"></i>
</a>
<div class="page-quick-sidebar-wrapper" data-close-on-body-click="false">
    <div class="page-quick-sidebar">
        <ul class="nav nav-tabs">
            <li class="active"><a href="javascript:;" data-target="#quick_sidebar_tab_1" data-toggle="tab"> Users <span class="badge badge-danger">2</span>
                </a></li>
            <li><a href="javascript:;" data-target="#quick_sidebar_tab_2" data-toggle="tab"> Alerts <span class="badge badge-success">7</span>
                </a></li>
            <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> More <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu pull-right">
                    <li><a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab"> <i class="icon-bell"></i> Alerts
                        </a></li>
                    <li><a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab"> <i class="icon-info"></i> Notifications
                        </a></li>
                    <li><a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab"> <i class="icon-speech"></i> Activities
                        </a></li>
                    <li class="divider"></li>
                    <li><a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab"> <i class="icon-settings"></i> Settings
                        </a></li>
                </ul></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active page-quick-sidebar-chat" id="quick_sidebar_tab_1">
                <div class="page-quick-sidebar-chat-users" data-rail-color="#ddd" data-wrapper-class="page-quick-sidebar-list">
                    <h3 class="list-heading">Staff</h3>
                    <ul class="media-list list-items">
                        <li class="media">
                            <div class="media-status">
                                <span class="badge badge-success">8</span>
                            </div> <img class="media-object" src="../assets/layouts/layout/img/avatar3.jpg" alt="...">
                            <div class="media-body">
                                <h4 class="media-heading">Bob Nilson</h4>
                                <div class="media-heading-sub">Project Manager</div>
                            </div>
                        </li>
                        <li class="media"><img class="media-object" src="../assets/layouts/layout/img/avatar1.jpg" alt="...">
                            <div class="media-body">
                                <h4 class="media-heading">Nick Larson</h4>
                                <div class="media-heading-sub">Art Director</div>
                            </div></li>
                        <li class="media">
                            <div class="media-status">
                                <span class="badge badge-danger">3</span>
                            </div> <img class="media-object" src="../assets/layouts/layout/img/avatar4.jpg" alt="...">
                            <div class="media-body">
                                <h4 class="media-heading">Deon Hubert</h4>
                                <div class="media-heading-sub">CTO</div>
                            </div>
                        </li>
                        <li class="media"><img class="media-object" src="../assets/layouts/layout/img/avatar2.jpg" alt="...">
                            <div class="media-body">
                                <h4 class="media-heading">Ella Wong</h4>
                                <div class="media-heading-sub">CEO</div>
                            </div></li>
                    </ul>
                    <h3 class="list-heading">Customers</h3>
                    <ul class="media-list list-items">
                        <li class="media">
                            <div class="media-status">
                                <span class="badge badge-warning">2</span>
                            </div> <img class="media-object" src="../assets/layouts/layout/img/avatar6.jpg" alt="...">
                            <div class="media-body">
                                <h4 class="media-heading">Lara Kunis</h4>
                                <div class="media-heading-sub">CEO, Loop Inc</div>
                                <div class="media-heading-small">Last seen 03:10 AM</div>
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-status">
                                <span class="label label-sm label-success">new</span>
                            </div> <img class="media-object" src="../assets/layouts/layout/img/avatar7.jpg" alt="...">
                            <div class="media-body">
                                <h4 class="media-heading">Ernie Kyllonen</h4>
                                <div class="media-heading-sub">
                                    Project Manager, <br> SmartBizz PTL
                                </div>
                            </div>
                        </li>
                        <li class="media"><img class="media-object" src="../assets/layouts/layout/img/avatar8.jpg" alt="...">
                            <div class="media-body">
                                <h4 class="media-heading">Lisa Stone</h4>
                                <div class="media-heading-sub">CTO, Keort Inc</div>
                                <div class="media-heading-small">Last seen 13:10 PM</div>
                            </div></li>
                        <li class="media">
                            <div class="media-status">
                                <span class="badge badge-success">7</span>
                            </div> <img class="media-object" src="../assets/layouts/layout/img/avatar9.jpg" alt="...">
                            <div class="media-body">
                                <h4 class="media-heading">Deon Portalatin</h4>
                                <div class="media-heading-sub">CFO, H&D LTD</div>
                            </div>
                        </li>
                        <li class="media"><img class="media-object" src="../assets/layouts/layout/img/avatar10.jpg" alt="...">
                            <div class="media-body">
                                <h4 class="media-heading">Irina Savikova</h4>
                                <div class="media-heading-sub">CEO, Tizda Motors Inc</div>
                            </div></li>
                        <li class="media">
                            <div class="media-status">
                                <span class="badge badge-danger">4</span>
                            </div> <img class="media-object" src="../assets/layouts/layout/img/avatar11.jpg" alt="...">
                            <div class="media-body">
                                <h4 class="media-heading">Maria Gomez</h4>
                                <div class="media-heading-sub">Manager, Infomatic Inc</div>
                                <div class="media-heading-small">Last seen 03:10 AM</div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="page-quick-sidebar-item">
                    <div class="page-quick-sidebar-chat-user">
                        <div class="page-quick-sidebar-nav">
                            <a href="javascript:;" class="page-quick-sidebar-back-to-list"> <i class="icon-arrow-left"></i>Back
                            </a>
                        </div>
                        <div class="page-quick-sidebar-chat-user-messages">
                            <div class="post out">
                                <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
                                <div class="message">
                                    <span class="arrow"></span> <a href="javascript:;" class="name">Bob Nilson</a> <span class="datetime">20:15</span> <span class="body"> When could you send me the report ? </span>
                                </div>
                            </div>
                            <div class="post in">
                                <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />
                                <div class="message">
                                    <span class="arrow"></span> <a href="javascript:;" class="name">Ella Wong</a> <span class="datetime">20:15</span> <span class="body"> Its almost done. I will be sending it shortly </span>
                                </div>
                            </div>
                            <div class="post out">
                                <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
                                <div class="message">
                                    <span class="arrow"></span> <a href="javascript:;" class="name">Bob Nilson</a> <span class="datetime">20:15</span> <span class="body"> Alright. Thanks! :) </span>
                                </div>
                            </div>
                            <div class="post in">
                                <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />
                                <div class="message">
                                    <span class="arrow"></span> <a href="javascript:;" class="name">Ella Wong</a> <span class="datetime">20:16</span> <span class="body"> You are most welcome. Sorry for the delay. </span>
                                </div>
                            </div>
                            <div class="post out">
                                <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
                                <div class="message">
                                    <span class="arrow"></span> <a href="javascript:;" class="name">Bob Nilson</a> <span class="datetime">20:17</span> <span class="body"> No probs. Just take your time :) </span>
                                </div>
                            </div>
                            <div class="post in">
                                <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />
                                <div class="message">
                                    <span class="arrow"></span> <a href="javascript:;" class="name">Ella Wong</a> <span class="datetime">20:40</span> <span class="body"> Alright. I just emailed it to you. </span>
                                </div>
                            </div>
                            <div class="post out">
                                <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
                                <div class="message">
                                    <span class="arrow"></span> <a href="javascript:;" class="name">Bob Nilson</a> <span class="datetime">20:17</span> <span class="body"> Great! Thanks. Will check it right away. </span>
                                </div>
                            </div>
                            <div class="post in">
                                <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />
                                <div class="message">
                                    <span class="arrow"></span> <a href="javascript:;" class="name">Ella Wong</a> <span class="datetime">20:40</span> <span class="body"> Please let me know if you have any comment. </span>
                                </div>
                            </div>
                            <div class="post out">
                                <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
                                <div class="message">
                                    <span class="arrow"></span> <a href="javascript:;" class="name">Bob Nilson</a> <span class="datetime">20:17</span> <span class="body"> Sure. I will check and buzz you if anything needs to be corrected. </span>
                                </div>
                            </div>
                        </div>
                        <div class="page-quick-sidebar-chat-user-form">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Type a message here...">
                                <div class="input-group-btn">
                                    <button type="button" class="btn green">
                                        <i class="icon-paper-clip"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane page-quick-sidebar-alerts" id="quick_sidebar_tab_2">
                <div class="page-quick-sidebar-alerts-list">
                    <h3 class="list-heading">General</h3>
                    <ul class="feeds list-items">
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-info">
                                            <i class="fa fa-check"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc">
                                            You have 4 pending tasks. <span class="label label-sm label-warning "> Take action <i class="fa fa-share"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date">Just now</div>
                            </div>
                        </li>
                        <li><a href="javascript:;">
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-success">
                                                <i class="fa fa-bar-chart-o"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc">Finance Report for year 2013 has been released.</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date">20 mins</div>
                                </div>
                            </a></li>
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-danger">
                                            <i class="fa fa-user"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc">You have 5 pending membership that requires a quick review.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date">24 mins</div>
                            </div>
                        </li>
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-info">
                                            <i class="fa fa-shopping-cart"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc">
                                            New order received with <span class="label label-sm label-success"> Reference Number: DR23923 </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date">30 mins</div>
                            </div>
                        </li>
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-success">
                                            <i class="fa fa-user"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc">You have 5 pending membership that requires a quick review.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date">24 mins</div>
                            </div>
                        </li>
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-info">
                                            <i class="fa fa-bell-o"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc">
                                            Web server hardware needs to be upgraded. <span class="label label-sm label-warning"> Overdue </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date">2 hours</div>
                            </div>
                        </li>
                        <li><a href="javascript:;">
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-default">
                                                <i class="fa fa-briefcase"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc">IPO Report for year 2013 has been released.</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date">20 mins</div>
                                </div>
                            </a></li>
                    </ul>
                    <h3 class="list-heading">System</h3>
                    <ul class="feeds list-items">
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-info">
                                            <i class="fa fa-check"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc">
                                            You have 4 pending tasks. <span class="label label-sm label-warning "> Take action <i class="fa fa-share"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date">Just now</div>
                            </div>
                        </li>
                        <li><a href="javascript:;">
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-danger">
                                                <i class="fa fa-bar-chart-o"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc">Finance Report for year 2013 has been released.</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date">20 mins</div>
                                </div>
                            </a></li>
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-default">
                                            <i class="fa fa-user"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc">You have 5 pending membership that requires a quick review.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date">24 mins</div>
                            </div>
                        </li>
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-info">
                                            <i class="fa fa-shopping-cart"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc">
                                            New order received with <span class="label label-sm label-success"> Reference Number: DR23923 </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date">30 mins</div>
                            </div>
                        </li>
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-success">
                                            <i class="fa fa-user"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc">You have 5 pending membership that requires a quick review.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date">24 mins</div>
                            </div>
                        </li>
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-warning">
                                            <i class="fa fa-bell-o"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc">
                                            Web server hardware needs to be upgraded. <span class="label label-sm label-default "> Overdue </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date">2 hours</div>
                            </div>
                        </li>
                        <li><a href="javascript:;">
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-info">
                                                <i class="fa fa-briefcase"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc">IPO Report for year 2013 has been released.</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date">20 mins</div>
                                </div>
                            </a></li>
                    </ul>
                </div>
            </div>
            <div class="tab-pane page-quick-sidebar-settings" id="quick_sidebar_tab_3">
                <div class="page-quick-sidebar-settings-list">
                    <h3 class="list-heading">General Settings</h3>
                    <ul class="list-items borderless">
                        <li>Enable Notifications <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF">
                        </li>
                        <li>Allow Tracking <input type="checkbox" class="make-switch" data-size="small" data-on-color="info" data-on-text="ON" data-off-color="default" data-off-text="OFF">
                        </li>
                        <li>Log Errors <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF">
                        </li>
                        <li>Auto Sumbit Issues <input type="checkbox" class="make-switch" data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF">
                        </li>
                        <li>Enable SMS Alerts <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF">
                        </li>
                    </ul>
                    <h3 class="list-heading">System Settings</h3>
                    <ul class="list-items borderless">
                        <li>Security Level <select class="form-control input-inline input-sm input-small">
                                <option value="1">Normal</option>
                                <option value="2" selected>Medium</option>
                                <option value="e">High</option>
                            </select>
                        </li>
                        <li>Failed Email Attempts <input class="form-control input-inline input-sm input-small" value="5" />
                        </li>
                        <li>Secondary SMTP Port <input class="form-control input-inline input-sm input-small" value="3560" />
                        </li>
                        <li>Notify On System Error <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF">
                        </li>
                        <li>Notify On SMTP Error <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF">
                        </li>
                    </ul>
                    <div class="inner-content">
                        <button class="btn btn-success">
                            <i class="icon-settings"></i> Save Changes
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="http://listjs.com/assets/javascripts/list.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/list.pagination.js/0.1.1/list.pagination.min.js"></script>
<script>
    function getComment(id)
            {

            $.post("<?php echo base_url(); ?>admin/visitor/getComment", {id:id}, function(data){
            $("#viewComment").html(data);
            });
            }

    function chk_data()
            {

            // alert("Just Do It");
            }


    function saveComment()
            {

            var subject = $("#txtSubject").val();
            var comment = $("#txtComment").val();
            var visitorId = $("#txtVisitorid").val();
            var date = $("#txtDate").val();
            if (subject != "" && comment != "" && visitorId != "" && date != "")
            {
            $.post("<?php echo base_url(); ?>admin/visitor/saveComment", {subject:subject, comment:comment, visitorId:visitorId, date:date}, function(data){

            if (data > 0)
            {
            alert("Comment Saved");
            $("#txtSubject").val("");
            $("#txtComment").val("");
            $("#txtDate").val("");
            $.post("<?php echo base_url(); ?>admin/visitor/getupdateComment", {visitorId:visitorId}, function(data){
            $("#vlcdata").html(data);
            });
            }
            else
            {   alert("Something Went Wrong");
            }

            });
            }
            else
            {
            if (subject == "")
            {
            $("#txtSubject").attr("placeholder", "Please Enter Subject");
            }
            if (comment == "")
            {
            $("#txtComment").attr("placeholder", "Please Enter Comment");
            }
            if (Date == "")
            {

            $("#schedule1 :text").attr("placeholder", "Please Enter Date");
            }

            }




            }


    function send_sms()
            {
            var count ='<?php echo count($resultVisitor) ?>';
            var senderId = [];
            for (var i = 1; i <= count; i++)
            {
            if ($('#chk' + i).is(':checked'))
            {
            senderId.push($("#chk" + i).val());
            }
            }


            if (senderId.length === 0) {
            alert ("Please Select The User");
            }
            else
            {
            	$.redirect("<?php echo base_url(); ?>admin/sms_management/bulk_sms", {user:senderId,way:'user'});

            	  // var form = $('<form></form>');
               //    var path="<?php //echo base_url() ?>admin/sms_management/bulk_sms";
               //    form.attr("method", "post");
               //    form.attr("action", path);
               //    var field = $('<input></input>');
               //    field.attr("type", "hidden");
               //    field.attr("name", "user");
               //    field.attr("value", senderId);
               //    form.append(field);
               //    var field = $('<input></input>');
               //    field.attr("type", "hidden");
               //    field.attr("name", "way");
               //    field.attr("value", "user");
               //    form.append(field);
               //    // The form needs to be a part of the document in
               //    // order for us to be able to submit it.
               //    $(document.body).append(form);
               //    form.submit();
            }
        }


        function send_email()
        {
            var count ='<?php echo count($resultVisitor) ?>';
            var senderId = [];
            for (var i = 1; i <= count; i++)
            {
                if ($('#chk' + i).is(':checked'))
                {
                    senderId.push($("#chk" + i).val());
                }
            }
            if (senderId.length === 0) 
            {
                alert ("Please Select The User");
            }
            else
            {
            	$.redirect("<?php echo base_url(); ?>admin/email_management/bulk_email", {user:senderId,way:'user'});	

                
                // var form = $('<form></form>');
                // var path="<?php //echo base_url() ?>admin/email_management/bulk_email";
                // form.attr("method", "post");
                // form.attr("action", path);
                // var field = $('<input></input>');
                // field.attr("type", "hidden");
                // field.attr("name", "user");
                // field.attr("value", senderId);
                // form.append(field);
                // var field = $('<input></input>');
                // field.attr("type", "hidden");
                // field.attr("name", "way");
                // field.attr("value", "user");
                // form.append(field);
                // // The form needs to be a part of the document in
                // // order for us to be able to submit it.
                // $(document.body).append(form);
                // form.submit();
            }
        }


    function getDetails()
    {
		    var count ='<?php echo count($resultVisitor);?>';
		    var visitor;
		    for (var i = 1; i <= count; i++)
		    {
					    if ($('#chk' + i).is(':checked'))
					    {
							    visitor = $("#chk" + i).val();
							   
							    window.location.href = '<?php echo base_url() ?>admin/visitor/editVisitor/' + window.btoa(visitor);
					    }
		    }
    }


    function getSamplecsv()
            {  <?php $url = base_url() . 'uploads/csvsample/samplevisitor.csv'; ?>
            window.open("<?php echo $url; ?>", "_blank");
            }

    function getProfiledetails(id)
            {

            $(".page-content-wrapper").hide();
            $(".page-content-wrapper1").show();
            $.post("<?php echo base_url(); ?>admin/visitor/getSpecificvisitor", {id:id}, function(data)
            {

            $(".page-content-wrapper1").html(data);
            $(".date-picker").datetimepicker({});
            ////necessary 
            var monkeyList = new List('test-list', {

            valueNames: ['name'],
                    page: 10,
                    plugins: [ ListPagination({}) ]

            });
            $('#sb4').hide();
            $('.p_element1').css('visibility', 'hidden');
            $('.check_box1').change(function(){

            if ($('.check_box1:checked').length == 0){
            $('.p_element1').css('visibility', 'hidden');
            $('#sb4').hide();
            }
            else if ($('.check_box1:checked').length == 1){
            $('.p_element1').css('visibility', 'visible');
            $('#sb4').show();
            }

           else if ($('.check_box1:checked').length == 1){

            $('.p_element1').css('visibility', 'visible');
            $('#sb4').hide();
            }
            else {
            $('.p_element').hide();
            $('.check_box1:checked').each(function(){
            $('#' + $(this).attr('data-ptag')).show();
            $('#sb4').hide();
            });
            }
            });
    //     	  $("#desc1").click(function(){
    //     	      $(" #desc_show").show();
    //     	   	  $("#desc1").hide();
    //     	   });


            });
            }



    function closeProfileDiv()
            {
            $(".page-content-wrapper").show();
            $(".page-content-wrapper1").hide();
            }


    function deleteVisitor()
    {
                var count ='<?php echo count($resultVisitor) ?>';
                var visitorId;
                for (var i = 1; i <= count; i++)
                {
                        if ($('#chk' + i).is(':checked'))
                        {
                                visitorId = $("#chk" + i).val();
                                $.post("<?php echo base_url(); ?>admin/visitor/deleteVisitor", {visitorId:visitorId}, function(data){

                                location.reload();
                                });
                        }
                }
    }


    function deletespecificVisitor(id)
    {
            visitorId = id;
            $.post("<?php echo base_url(); ?>admin/visitor/deleteVisitor", {visitorId:visitorId}, function(data)
            {
            // location.reload();
            });
    }

    function validateOtp(val)
    {

            var activePassword = $("#txtOtp").val();
            var Password1 = $("#txtOtpimport").val();
            var activePassword1 = $("#txtOtp1").val();
            var Password11 = $("#txtOtpimport1").val();
            if (val == "1" && activePassword != "")
            {
                    var Password = activePassword;
                    $.post("<?php echo base_url(); ?>admin/visitor/validateOtp", {Password}, function(data){
                    if (data == 1)
                    {
                            window.open("<?php echo base_url(); ?>admin/visitor/getVisitorcsv", "_blank");
                            $('#otp').modal('hide');
                    }
                    else
                    {
                            alert("OTP MisMatch");
                    }
                    });
            }
            else if (val == "0" && Password1 != "")
            {
                var Password = Password1;
                $.post("<?php echo base_url(); ?>admin/visitor/validateOtp", {Password}, function(data){
                alert(data);
                if (data === 1)
                {
                        $('#otpimport').modal('hide');
                        $('#import').modal('show');
                }
                else
                {
                        alert("OTP MisMatch");
                }
                });
            }
            if (val == "1" && activePassword1 != "")
            {
                    var Password = activePassword1;
                    $.post("<?php echo base_url(); ?>admin/visitor/validateOtp", {Password}, function(data){
                    if (data == 1)
                    {
                    window.open("<?php echo base_url(); ?>admin/visitor/getVisitorcsv", "_blank");
                    $('#send_sms11').modal('hide');
                    }
                    else
                    {
                    alert("OTP MisMatch");
                    }
                    });
            }
            else if (val == "0" && Password11 != "")
            {
                    var Password = Password11;
                    $.post("<?php echo base_url(); ?>admin/visitor/validateOtp", {Password}, function(data){
                    if (data == 1)
                    {
                    $('#send_email2').modal('hide');
                    $('#import1').modal('show');
                    }
                    else
                    {
                    alert("OTP MisMatch");
                    }
                    });
            }
            else
            {
                    alert("ENTER PASSWORD");
            }
    }


    $(document).ready(function()
    {
    $("#tab1").click(function(){
    $("page-content-wrapper").hide();
    });
    $("#tab2").click(function(){
    $(".page-content-wrapper").hide();
    });
    $("#tab3").click(function(){
    $("page-content-wrapper").hide();
    });
    $("div.user_list_box").hide();
    $("#showsub").click(function(){

    $(".page-content-wrapper").hide();
    $("div.user_list_box").show();
    });
    $("div.user_list_box").hide();
    $("#showsub1").click(function(){

    $(".page-content-wrapper").hide();
    $("div.user_list_box").show();
    });
    $("div.user_list_box").hide();
    $("#showsub2").click(function(){
    $("page-content-wrapper").hide();
    $("div.user_list_box").show();
    });
    $("div.user_list_box").hide();
    $("#showsub3").click(function(){
    $(".page-content-wrapper").hide();
    $("div.user_list_box").show();
    });
    $("div.user_list_box").hide();
    $("#showsub4").click(function(){
    $(".page-content-wrapper").hide();
    $("div.user_list_box").show();
    });
    $("div.user_list_box").hide();
    $("#showsub5").click(function(){

    $(".page-content-wrapper").hide();
    $("div.user_list_box").show();
    });
    $("div.user_list_box").hide();
    $("#showsub6").click(function(){
    $("div.page-content").hide();
    $("div.user_list_box").show();
    });
    $("#showmain").click(function(){
    $(".page-content-wrapper").show();
    $("div.user_list_box").hide();
    });
    $("#close").click(function(){
    $(" .page-content-wrapper").show();
    $("div.user_list_box").hide();
    });
    $("#more1").click(function(){
    $(" #showOrHideDiv").show();
    $("#more1").hide();
    });
    $("#desc1").click(function(){
    $(" #desc_show").show();
    $("#desc1").hide();
    });
    });</script>
<script>
    jQuery('#growl-primary').click(function(){
    $("#myModal_m").hide();
    $(".modal-backdrop").removeClass();
    jQuery.gritter.add({
    title: 'Successfully Deleted!',
            //text: 'This will fade out after a certain amount of time.',
            class_name: 'growl-primary',
            //image: 'images/screen.png',
            sticky: false,
            time: ''
    });
    return false;
    });
</script>
<script>

    jQuery('#growl-primary').click(function(){
    jQuery.gritter.add({
    title: 'Successfully Deleted!',
            //text: 'This will fade out after a certain amount of time.',
            class_name: 'growl-primary',
            sticky: false,
            time: ''
    });
    return false;
    });
</script>
<!-- div show hide starts here -->
<!-- ends here -->
<script>
    jQuery('#growl-secondary').click(function(){
    $("#myModal_m").hide();
    $(".modal-backdrop").removeClass();
    jQuery.gritter.add({
    title: 'All Rows Are Successfully Cleared!',
            //text: 'This will fade out after a certain amount of time.',
            class_name: 'growl-primary',
            //image: 'images/screen.png',
            sticky: false,
            time: ''
    });
    return false;
    });
    $('#checkboxAll').click(function() {
    if ($(this).is(':checked')) {
    jQuery.gritter.add({
    title: 'All rows selected"',
            class_name: 'growl-primary',
            sticky: false,
            time: ''
    });
    }
    // return false;
    });
    $('#checkbox1').click(function() {

    if ($(this).is(':checked')) {

    jQuery.gritter.add({

    title: 'One row selected"',
            class_name: 'growl-primary',
            sticky: false,
            time: ''
    });
    }
    // return false;
    });
</script>
<script>

    $(document).ready(function(){

    $('[data-toggle="tooltip"]').tooltip();
    });


    function printAddressLabeling(action_type="",data_count="")
    {
        if(action_type=='multiple')
        {
                 var count=data_count;
              
                 var visitors=[];
                 
                 for (var i=1;i<=count;i++)
                 {
                      if($('#check_box'+i).is(':checked'))
                      {
                        visitors.push($("#check_box"+i).val()); 
                      }
                 }       

                 if(visitors.length === 0) 
                 {
                        alert ("Please select visitor");     
                 }
                 else
                 {
                      // $.post("<?php //echo base_url();?>admin/setting/addressLabeling",{all_visitors_id:visitors},function(data){

                      //   //alert(data);
                      //      });

                      $.redirect('<?php echo base_url(); ?>admin/setting/addressLabeling', {all_visitors_id: visitors});     
                 }
        }
        else if(action_type=='single')
        {
                 var visitors=[];
                 
                 visitors.push(data_count); 
                 
                 if(visitors.length === 0) 
                 {
                        alert ("Please select visitor");     
                 }
                 else
                 {
                      // $.post("<?php //echo base_url();?>admin/setting/addressLabeling",{all_visitors_id:visitors},function(data){

                      //   //alert(data);
                      //      });

                      $.redirect('<?php echo base_url(); ?>admin/setting/addressLabeling', {all_visitors_id: visitors});     
                 }
        }
        else
        {   
                 var count="<?php echo count($resultVisitor)?>";
              
                 var visitors=[];
                 
                 for (var i=1;i<=count;i++)
                 {
                      if($('#chk'+i).is(':checked'))
                      {
                        visitors.push($("#chk"+i).val()); 
                      }
                 }       

                 if(visitors.length === 0) 
                 {
                        alert ("Please select visitor");     
                 }
                 else
                 {
                      // $.post("<?php //echo base_url();?>admin/setting/addressLabeling",{all_visitors_id:visitors},function(data){

                      //   //alert(data);
                      //      });

                      $.redirect('<?php echo base_url(); ?>admin/setting/addressLabeling', {all_visitors_id: visitors});     
                 }
        }
    }


</script>
<script id="template-upload" type="text/x-tmpl"> {% for (var i=0, file; file=o.files[i]; i++) { %}

    <tr class="template-upload fade">



    <td>

    <p class="name">{%=file.name%}</p>

    <strong class="error text-danger label label-danger"></strong>

    </td>

    <td>

    <p class="size">Processing...</p>

    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">

    <div class="progress-bar progress-bar-success" style="width:0%;"></div>

    </div>

    </td>

    <td> {% if (!i && !o.options.autoUpload) { %}

    <button class="btn blue start" >

    <i class="fa fa-upload"></i>

    <span>Start</span>

    </button> {% } %} {% if (!i) { %}

    <button class="btn red cancel">

    <i class="fa fa-ban"></i>

    <span>Cancel</span>

    </button> {% } %} </td>

    </tr> {% } %} </script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl"> {% for (var i=0, file; file=o.files[i]; i++) { %}

    <tr class="template-download fade">

    <td>

    <span class="preview"> {% if (file.thumbnailUrl) { %}

    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery>

    <img src="{%=file.thumbnailUrl%}">

    </a> {% } %} </span>

    </td>

    <td>

    <p class="name"> {% if (file.url) { %}

    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl? 'data-gallery': ''%}>{%=file.name%}</a> {% } else { %}

    <span>{%=file.name%}</span> {% } %} </p> {% if (file.error) { %}

    <div>

    <span class="label label-danger">Error</span> {%=file.error%}</div> {% } %} </td>

    <td>

    <span class="size">{%=o.formatFileSize(file.size)%}</span>

    </td>

    <td> {% if (file.deleteUrl) { %}

    <button class="btn red delete btn-sm" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}" {% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}' {% } %}>

    <i class="fa fa-trash-o"></i>

    <span>Delete</span>

    </button>

    <input type="checkbox" name="delete" value="1" class="toggle"> {% } else { %}

    <button class="btn yellow cancel btn-sm">

    <i class="fa fa-ban"></i>

    <span>Cancel</span>

    </button> {% } %} </td>

    </tr> {% } %} </script>