<div class="page-content-wrapper">
    <div class="page-content" style="min-height:469px">
        <div class="row">
            <div class="col-md-12">
                <div class=" app-ticket-list">
                    <div class="page-bar row">
                        <div class="col-md-6">
                            <h3 class="page-title"><?php getLocalkeyword('Email Management');?></h3>
                            <ul class="page-breadcrumb ">
                                <li> <a href="<?php echo base_url();?>admin/dashboard"><?php getLocalkeyword('Home');?></a> <i class="fa fa-circle"></i> </li>
                                <li> <span><?php getLocalkeyword('Email Management');?></span> </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 pull-left" style="">
                            <!-- <img src="<?php //echo base_url(); ?>themes/assets/pages/img/area_graph.png" height="180px" width="100%"> --></div>
                        <div class="col-md-12">
                            <div class="table-toolbar">
                                <div class="row">
                                    <div id="otp1" class="modal fade in" role="dialog">
                                        <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                                    <h4 class="modal-title text-center">Enter OTP Here</h4> </div>
                                                <div class="modal-body">
                                                    <div class="col-md-2"></div>
                                                    <div class="col-md-7 form-group">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label>Enter OPT</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control input-sm">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2"></div>
                                                    <a href="set_password.html">
                                                        <button type="button" class="btn btn-primary">Submit</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                    

                                    <div class="col-md-5 pull-right">
                                        <div class="pull-right">
                                            <div style="float: left; margin-top: 8px; margin-right: 5px;">
                                                <?php if(getAdminAccessRights('mvbSmsExport'))
                                                      { 
                                                ?>
                                                          <a href="<?php echo base_url(); ?>admin/email_management/downloadCampCSV" class="margin_rgt" data-toggle="modal">
                                                          <?php getLocalkeyword('Export');?></a>
                                                <?php } 
                                                ?>
                                                  
                                                        <?php 
                                                            if(getAdminAccessRights('mvbSmsSend'))
                                                              { 
                                                        ?>
                                                                    <div class="btn-group"> <a href="<?php echo base_url(); ?>admin/email_management/bulk_email" id="sample_editable_1_new hvr-float-shadow" class="btn btn-primary pull-right" style="margin-right:0px;">
                                                                    <?php getLocalkeyword('Send Email');?></a> </div>
                                                        <?php } 
                                                        ?>
                                            </div>
                                            <!-- modal ends -->
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-12">
                                    <div class="selected_rows"><font id="show_checkbox_selected"></font>
                                        <a id="selectall">
                                            <?php getLocalkeyword('select all');?>
                                        </a>
                                    </div>
                                    <div class="portlet light">
                                        <div class="portlet-body">
                                            <!--  <div class="table-scrollable"> -->
                                            <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable allchekbox" id="sample_1_2" role="grid" aria-describedby="sample_1_2_info">
                                                <thead>
                                                    <th style="width: 35px;">
                                                        <label>
                                                            <input type="checkbox" id="checkall" data-set="" name="all" />
                                                            <span></span> </label>
                                                    </th>
                                                    <th style="width: 195px;"><?php getLocalkeyword('Campaign Name');?></th>
                                                    <th style="width: 288px;"><?php getLocalkeyword('Sent On /Scheduling Date');?></th>
                                                    <th style="width: 230px;"><?php getLocalkeyword('Message Details');?></th>
                                                    <th style="width: 176px;"><?php getLocalkeyword('Contact Group');?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>                                                    
                                                        <?php 
                                                        foreach($resultCampaign as $CampaignRecord)
                                                        {
                                                        ?>
                                                        <tr class="odd gradeX">
                                                            <td>
                                                                <label>
                                                                    <input name="chk1" class="check_box" type="checkbox" data-ptag="sb1" id="chk1" value="">
                                                                </label>
                                                            </td>

                                                            <td class="sorting_1">
                                                                <a href="#">
                                                                    <?php echo $CampaignRecord['campaignTitle']; ?>
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <?php echo $CampaignRecord['scheduleDateTime']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo substr($CampaignRecord['campaignContent'],0,50); ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $CampaignRecord['campaignContactGroup']; ?>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
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
        </div>
        <div class="clearfix"></div>
        <!-- END DASHBOARD STATS 1-->
    </div>
</div>
</div>