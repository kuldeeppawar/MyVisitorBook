<div class="page-content-wrapper">

                <div class="page-content">

                    <div class="row">

                        <div class="col-md-12">

                            <div class=" app-ticket-list">

                                <div class="page-bar row">

                                    <div class="col-md-6">

                                        <h3 class="page-title">Send Message</h3>

                                        <!--<ul class="page-breadcrumb ">

                                        <li> <a href="index.html">Home</a> <i class="fa fa-circle"></i> </li>

                                        <li> <span>Sender Id Management</span> </li>

                                      </ul>-->

                                    </div>

                                    <div class="col-md-6">

                                        <div id="reportrange" class="btn pull-right " style="padding-top: 12px;"> <i class="fa fa-calendar"></i> &nbsp; <span class="thin uppercase hidden-xs">August 28, 2016 - September 26, 2016</span> <b class="fa fa-angle-down"></b> </div>

                                    </div>

                                </div>

                                <div class="row">

                                    <!--modal-->

                                    <div id="send_msg" class="modal fade in" role="dialog">

                                        <div class="modal-dialog">

                                            <!-- Modal content-->

                                            <div class="modal-content">

                                                <div class="modal-header">

                                                    <button type="button" class="close" data-dismiss="modal">×</button>

                                                    <h2 class="modal-title text-center">

                                                      <i class="fa fa-plus"></i> Send Message

                                                    </h2>

                                                </div>

                                                <div class="modal-body">

                                                    <div class="portlet-body form">

                                                        <form role="form" id="send_msg_form" method="POST" action="<?php echo base_url();?>head/send_message/sendMessage" enctype="multipart/form-data">

                                                            <div class="form-body">

                                                                <div class="form-group">

                                                                    <label>Select Client</label>

                                                                    <select class="form-control" id="selClient" name="selClient" required>

                                                                        <option value="">--select --</option>

                                                                        <?php
                                                                        for($k=0;$k<count($clients);$k++)
                                                                        {
                                                                        ?>
                                                                        <option value="<?php echo $clients[$k]->clnt_id_pk;?>"><?php echo $clients[$k]->clnt_name;?></option>
                                                                        <?php    
                                                                        }
                                                                        ?>

                                                                    </select>

                                                                </div>

                                                                <div class="form-group">

                                                                    <label class="">Message Title</label>
                                                                    <br>

                                                                    <input type="text" class=" form-control " placeholder="" id="txtTitle" name="txtTitle" required>

                                                                </div>

                                                                <div class="form-group">

                                                                    <label class="">Message Content</label>
                                                                    <br>

                                                                    <textarea class="form-control" rows="3" id="txtContent" name="txtContent"></textarea>

                                                                </div>

                                                                <div class="form-group">

                                                                    <label class="">Attachment</label>
                                                                    <br>

                                                                    <input type="file" class="form-control" id="fileAttachment" name="fileAttachment"/>

                                                                </div>

                                                                <div class="modal-footer">

                                                                    <button type="submit" class="btn btn-primary" id="btnSubmit" name="btnSubmit">Send</button>

                                                                    <button type="button" data-dismiss="modal" class="btn btn-danger">Cancel</button>

                                                                </div>

                                                            </div>

                                                        </form>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <!--end modal-->

                                    <div class="col-md-12">
                                        <div class="table-toolbar">

                                            <div class="row">

                                                <!--<div class="col-md-3 ">

                                                    <ul class="nav navbar-nav pl0">

                                                      <li class="dropdown dropdown-user"> <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" style="font-size:18px;padding: 2px 0px;">Recently updated <i class="fa fa-angle-down"></i> </a>

                                                        <ul class="dropdown-menu dropdown-menu-default">

                                                          <li> <a href="#">All Contacts</a> </li>

                                                          <li> <a href="#">My Contacts </a> </li>

                                                          <li> <a href="#">Recently viewed</a> </li>

                                                          <li> <a href="#">Not updated in 30 Days</a> </li>

                                                        </ul>

                                                      </li>

                                                    </ul>

                                                  </div>-->
                                                <?php
                                                if(getAccessRights('mvbSmsgSendMsg'))
                                                {
                                                ?>  
                                                        <div class="col-md-5  pull-right">

                                                            <div class="pull-right">

                                                                <div class="btn-group"> <a id="sample_editable_1_new hvr-float-shadow" data-toggle="modal" data-target="#send_msg" class="btn btn-primary"><!-- <i class="fa fa-user-plus" title="Add Visitor"></i>  -->Send Message</a> </div>

                                                                </li>

                                                                </ul>

                                                                <!-- modal ends -->

                                                            </div>

                                                        </div>
                                                <?php
                                                }
                                                ?>

                                            </div>

                                            <div class="selected_rows">
                                            <font id="show_checkbox_selected"></font> 
                                            <a id="selectall">select all</a></div>

                                            <div class="portlet light">

                                                <div class="portlet-body">

                                                    <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable allchekbox" id="sample_1_2" role="grid" aria-describedby="sample_1_2_info">

                                                        <thead>

                                                            <tr>

                                                                <th style="width: 35px;">
                                                                    <input type="checkbox" id="checkall" data-set="" name="all" />

                                                                    <span id="growl-primary1"></span>

                                                                    </label>

                                                                </th>

                                                                <th>Sr.no</th>

                                                                <th>Client Name</th>

                                                                <th> Email Id</th>

                                                                <th> Mobile No. </th>

                                                                <th> Message Title</th>

                                                                <th> Message Content</th>

                                                                <th>Attachment</th>

                                                                <th>Sent On</th>

                                                            </tr>

                                                        </thead>

                                                        <tbody>
                                                        <?php
                                                        for($i=0;$i<count($result);$i++)
                                                        {
                                                            $j=$i+1;
                                                        ?>    
                                                            <tr class="odd gradeX">

                                                                <td>
                                                                    <input name="chk1" class="check_box" type="checkbox" data-ptag="sb1" id="chk1" value="">
                                                                </td>

                                                                <td><?php echo $j;?></td>

                                                                <td><?php echo $result[$i]->clnt_name;?></td>

                                                                <td><?php echo $this->encryption->decrypt($result[$i]->clnt_email);?> </td>

                                                                <td><?php echo $this->encryption->decrypt($result[$i]->clnt_mobile);?> </td>

                                                                <td><?php echo $result[$i]->smsg_title;?></td>

                                                                <td><?php echo $result[$i]->smsg_content;?></td>

                                                                <td><a href="<?php echo base_url();?>uploads/send_msg_files/<?php echo $result[$i]->smsg_attachment;?>"><i title="Download attachment" class="fa fa-download"></i></a></td>

                                                                <td><?php echo $result[$i]->sent_on;?></td>

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