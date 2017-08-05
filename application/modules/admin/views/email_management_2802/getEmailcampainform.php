<div class="page-content-wrapper"> 
      <div class="page-content" style="min-height:469px">
        <div class="row">
          <div class="col-md-12"> 
             <div class=" app-ticket-list">
              <div class="page-bar row">
                <div class="col-md-6">
                  <h3 class="page-title">EMAIL Management</h3>
                  <ul class="page-breadcrumb ">
                    <li> <a href="index.html">Home</a> <i class="fa fa-circle"></i> </li>
                    <li> <span>EMAIL Management</span> </li>
                  </ul>
                </div>
                <div class="col-md-6">
                </div>
              </div>
              <div class="row">
			  <div class="col-md-12 pull-left" style=""> <img src="<?php echo base_url(); ?>themes/assets/pages/img/area_graph.png" height="180px" width="100%"> </div>
                <div class="col-md-12">
                  <div class="table-toolbar">
                    <div class="row">
<div id="otp1" class="modal fade in" role="dialog">  <div class="modal-dialog">    <!-- Modal content-->    <div class="modal-content">      <div class="modal-header">        <button type="button" class="close" data-dismiss="modal">×</button>        <h4 class="modal-title text-center">Enter OTP Here</h4>      </div>      <div class="modal-body">      <div class="col-md-2"></div>        <div class="col-md-7 form-group">        <div class="row">            <div class="col-md-4"><label>Enter OPT</label></div>            <div class="col-md-8"><input type="text" class="form-control input-sm"></div>                                </div>          </div>                        <div class="col-md-2"></div>                         <a href="set_password.html"><button type="button" class="btn btn-primary">Submit</button></a>      </div>    </div>  </div></div>
                      <div class="col-md-3">
                        <ul class="nav navbar-nav">
                          <li class="dropdown dropdown-user"> <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" style="font-size:18px;padding: 2px 0px;">Recently updated <i class="fa fa-angle-down"></i> </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                              <li> <a href="#">All Contacts</a> </li>
                              <li> <a href="#">My Contacts </a> </li>
                              <li> <a href="#">Recently viewed</a> </li>
                              <li> <a href="#">Not updated in 30 Days</a> </li>
                           </ul>
                          </li>
                        </ul>
                      </div>

                      <div class="col-md-5 pull-right">
                        <div class="pull-right"> 
						<div style="float: left; margin-top: 8px; margin-right: 5px;">
            <?php if(getAdminAccessRights('mvbSmsExport')){ ?>
<a href="<?php echo base_url(); ?>admin/email_management/downloadCampCSV" class="margin_rgt" data-toggle="modal" >Export</a> 
<?php } ?>
					<!-- data-target="#otp11111" <a href="#" data-target="#send_sms1" data-toggle="modal" class="margin_rgt"><img src="../assets/sms.png" height="22" title="Send EMAIL" /></a>
						<a href="#" data-target="#send_email1" data-toggle="modal" class="margin_rgt"> <i class="fa fa-envelope-o fa-2x" title="Send Email" style="color:#828282; "></i></a> 
						<a href="#" data-toggle="modal" data-target="#myModal_m" class="margin_rgt"> <i class="fa fa-trash fa-2x" title="Delete" style="color:#828282; " ></i></a></div>
                          <a href="#"> Import </a> / <a href="#"> Export  </a> -->
                          <?php if(getAdminAccessRights('mvbSmsSend')){ ?>
                          <div class="btn-group"> <a href="<?php echo base_url(); ?>admin/email_management/bulk_email" id="sample_editable_1_new hvr-float-shadow" class="btn btn-primary pull-right" style="margin-right:0px;">Send EMAIL</a> </div>
                          <?php } ?>
                          <!--<ul class="nav navbar-nav pl0 pull-right">
                            <li class="dropdown dropdown-user burger_menu"> <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" style="margin-top:0px;"><i class="fa fa-bars fa-2x" aria-hidden="true"></i> </a>
                              <ul class="dropdown-menu dropdown-menu-default">
							  <li class="options" style="border-bottom: 1px solid #e7ecf1;"> <a href="custom_fields.html" title="Custom Fields" style="padding-top: 0px; margin-top: 5px; padding-left: 0px;">Change Contact Group</a></li>
                               <li class="options"> <a href="custom_fields.html" title="Custom Fields" style="padding-top: 0px; margin-top: 5px; padding-left: 0px;">Manage custom Fields</a></li>
                              </ul>-->
                          <div id="myModal_m" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">×</button>
                                  <h2 class="modal-title text-center"> <i class="fa fa-trash"></i> Are you sure to Delete? </h2>
                                </div>
                                <div class="modal-footer"> <a href="" class="btn btn-primary">Yes</a>
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
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                    <h2 class="modal-title text-center"><i class="fa fa-envelope"></i> Send EMAIL</h2>
                                  </div>
                                  <div class="modal-body">
                                    <div class="portlet-body form">
                                      <form role="form">
                                        <div class="form-body"><div class="row">
                                          <div class="col-md-12">
                                            <div class="form-group">
                                             <label>Mobile no. <span class="mandatory"></span></label>
                                              <input type="text" class="form-control" value="9876548965" readonly="">
                                            </div>
                                            <div class="form-group">
                                              <label>Message <span class="mandatory"></span></label>
                                              <textarea class="form-control" rows="4"></textarea>
                                            </div>
                                          </div>
                                        </div></div>
                                      </form>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-primary">Send EMAIL</button>
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
                                  <button type="button" class="close" data-dismiss="modal">×</button>
                                  <h2 class="modal-title text-center"><i class="fa fa-envelope-o"></i> Send EMAIL</h2>
                                </div>
                                <div class="modal-body">
                                  <div class="portlet-body form">
                                   <form role="form">
                                      <div class="form-body">
                                      <div class="row">
                                        <div class="col-md-12">
                                          <div class="form-group">
                                            <label>Mobile no. <span class="mandatory"></span></label>
                                            <input type="text" class="form-control" value="9876548965" readonly="">
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
                                  <button type="button" class="btn btn-primary">Send EMAIL</button>
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
                                <button type="button" class="close" data-dismiss="modal">×</button>
                                <h2 class="modal-title text-center"><i class="fa fa-envelope-o"></i> Send Email</h2>
                              </div>
                              <div class="modal-body">
                                <div class="portlet-body form">
                                  <form role="form">
                                    <div class="form-body"><div class="row">
                                      <div class="col-md-12">
                                        <div class="form-group">
                                          <label>Email-id <span class="mandatory"></span></label>
                                          <input type="text" class="form-control" value="abc@gmail.com" readonly="">
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
                                    </div></div>
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
                              <button type="button" class="close" data-dismiss="modal">×</button>
                              <h2 class="modal-title text-center">
                              <i class="fa fa-envelope-o"></i> Send Email
                              </h2>
                            </div>
                            <div class="modal-body">
                              <div class="portlet-body form">
                               <form role="form">
                                  <div class="form-body"> <div class="row">
                                   <div class="col-md-12">
                                     <div class="form-group">
                                       <label>Email-id <span class="mandatory"></span></label>
                                        <input type="text" class="form-control" value="abc@gmail.com" readonly="">
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
                                  </div></div>
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
                            <button type="button" class="close" data-dismiss="modal">×</button>
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
                        <!--   <div class="modal-footer">
                            <div id="sample_2_wrapper" class="dataTables_wrapper no-footer"><div class="row"><div class="col-md-6 col-sm-6"><div class="dataTables_length" id="sample_2_length"><label>Show <select name="sample_2_length" aria-controls="sample_2" class="form-control input-sm input-xsmall input-inline"><option value="5">5</option><option value="15">15</option><option value="20">20</option><option value="-1">All</option></select></label></div></div><div class="col-md-6 col-sm-6"><div id="sample_2_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm input-small input-inline" placeholder="" aria-controls="sample_2"></label></div></div></div><div class="table-scrollable"><table class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer" id="sample_2" role="grid" aria-describedby="sample_2_info">
                              <thead>
                              <tr role="row"><th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Comment" style="width: 0px;">Comment</th><th class="sorting_asc" tabindex="0" aria-controls="sample_2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Added on: activate to sort column descending" style="width: 0px;">Added on</th></tr></thead>
                              <tbody>
                              <tr role="row" class="odd">
                                  <td>test</td>
                                  <td class="sorting_1">2016-08-17 <span>18:25:10</span></td>
                                </tr></tbody>
                            </table></div><div class="row"><div class="col-md-5 col-sm-5"><div class="dataTables_info" id="sample_2_info" role="status" aria-live="polite">Showing 1 to 1 of 1 records</div></div><div class="col-md-7 col-sm-7"><div class="dataTables_paginate paging_bootstrap_extended" id="sample_2_paginate"><div class="pagination-panel"> Page <a href="#" class="btn btn-sm default prev disabled"><i class="fa fa-angle-left"></i></a><input type="text" class="pagination-panel-input form-control input-sm input-inline input-mini" maxlenght="5" style="text-align:center; margin: 0 5px;"><a href="#" class="btn btn-sm default next disabled"><i class="fa fa-angle-right"></i></a> of <span class="pagination-panel-total">1</span></div></div></div></div></div>
                          </div> -->
                        </div>
                      </div>
                    </div>
                  </div>
                
              </div>
              <!-- modal ends --> 
            </div>
          </div>
        </div>
		<div class="clearfix"></div>
         <div class="col-md-12">
		 <div class="selected_rows">1/17 row(s) selected <a id="selectall">select all</a></div>
        <div class="portlet light">
          <div class="portlet-body">
           <!--  <div class="table-scrollable"> -->
             <table class="table table-hover table-checkable order-column" id="sample_1" style=""  >
              <thead>
                <th style="width: 35px;"> <label>
                <input type="checkbox" id="checkall" data-set="" name="all" />
                <span></span> </label>
                </th>
                            <th  style="width: 195px;">Campaign Name</th>
                            <th  style="width: 288px;">Sent On /Scheduling Date</th>
                              <th  style="width: 230px;">Message Details</th>
                              <th  style="width: 176px;">Contact Group</th>
                               </tr>
              </thead>
              <tbody>
              <tr class="odd gradeX">
              <?php 
                          //print_r($resultCampaign);
                          foreach($resultCampaign as $CampaignRecord){
                           // print_r($CampaignRecord['campaignTitle']);
                            //echo $CampaignRecord->campaignTitle;
                            //die();*/
                          ?>
                            <td><label>
                              <input name="chk1" class="check_box" type="checkbox" data-ptag="sb1" id="chk1" value="" >
 </label></td>
                            
                            <td class="sorting_1"><a href="#"><?php echo $CampaignRecord['campaignTitle']; ?></a></td>
                            <td> <?php echo $CampaignRecord['scheduleDateTime']; ?> </td>
                            <td><?php echo substr($CampaignRecord['campaignContent'],0,50); ?></td>
                            <td><?php echo $CampaignRecord['campaignContactGroup']; ?></td>							  
                             
                            </tr>
                          <?php } ?>  
                          </tbody>
            </table></div>
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