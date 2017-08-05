 <div class="page-content-wrapper">

                <div class="page-content">

                    <div class="row">

                        <div class="col-md-12">

                            <div class=" app-ticket-list">

                                <div class="page-bar row">

                                    <div class="col-md-6">

                                        <h3 class="page-title">Inbox</h3>

                                        <!-- <ul class="page-breadcrumb ">

                    <li> <a href="index.html">Home</a> <i class="fa fa-circle"></i> </li>

                    <li> <span>Sender Id</span> </li>

                  </ul>-->

                                    </div>

                                    <div class="col-md-6">

                                        <div id="reportrange" class="btn pull-right " style="padding-top: 12px;"> <i class="fa fa-calendar"></i> &nbsp; <span class="thin uppercase hidden-xs">August 28, 2016 - September 26, 2016</span> <b class="fa fa-angle-down"></b> </div>

                                    </div>

                                </div>

                                <div class="row">

                                    <!--modal-->

                                    <!--end modal-->

                                    <div class="col-md-12">
                                        <div class="table-toolbar">

                                            <!--<div class="selected_rows">1/17 row(s) selected <a id="selectall">select all</a></div>-->

                                            <div class="portlet light">

                                                <div class="portlet-body">

                                                    <table class="table table-hover table-checkable order-column" id="sample_1" style="width:100% !important;">

                                                        <thead>

                                                            <tr>

                                                                <th style="width: 35px;">
                                                                    <input type="checkbox" id="checkall" data-set="" name="all" />

                                                                    <span id="growl-primary1"></span>

                                                                    </label>

                                                                </th>

                                                                <th> Sr.No</th>

                                                                <th>Message Title</th>

                                                                <th>Message Content</th>

                                                                <th> Attachment </th>

                                                                <th> Received On </th>

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

                                                                <td><?php echo $result[$i]->smsg_title;?></td>

                                                                <td><?php echo $result[$i]->smsg_content;?></td>

                                                                <td><a href="<?php echo base_url();?>uploads/send_msg_files/<?php echo $result[$i]->smsg_attachment;?>"><i title="Download attachment" class="fa fa-download"></i></a> </td>

                                                                <td><?php echo $result[$i]->receive_on;?></td>

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