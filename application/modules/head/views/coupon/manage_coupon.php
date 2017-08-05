<div class="page-content-wrapper">
                <div class="page-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class=" app-ticket-list">
                                <div class="page-bar row">
                                    <div class="col-md-6">
                                        <h3 class="page-title"><?php getLocalkeyword('Generate Coupon');?></h3>
                                        <ul class="page-breadcrumb ">
                                            <li> <a href="<?php echo base_url();?>head/dashboard"><?php getLocalkeyword('Home');?></a> <i class="fa fa-circle"></i> </li>
                                            <li> <a href="#"><?php getLocalkeyword('Coupon Management');?></a> <i class="fa fa-circle"></i> </li>
                                            <li> <span><?php getLocalkeyword('Generate Coupon');?></span> </li>
                                        </ul>
                                    </div>
                                    <!-- <div class="col-md-6">
                                        <div id="reportrange" class="btn pull-right " style="padding-top: 12px;"> <i class="fa fa-calendar"></i> &nbsp; <span class="thin uppercase hidden-xs">August 28, 2016 - September 26, 2016</span> <b class="fa fa-angle-down"></b> </div>
                                    </div> -->
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
                                    <!--end modal-->
                                    <div class="col-md-12">
                                        <div class="table-toolbar">
                                            <div class="row">
                                                <div class="col-md-3 ">
                                                    <ul class="nav navbar-nav pl0">
                                                        <li class="dropdown dropdown-user">
                                                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" style="font-size:18px;padding: 2px 0px;">Recently updated <i class="fa fa-angle-down"></i> </a>
                                                            <ul class="dropdown-menu dropdown-menu-default">
                                                                <li> <a href="#">All Contacts</a> </li>
                                                                <li> <a href="#">My Contacts </a> </li>
                                                                <li> <a href="#">Recently viewed</a> </li>
                                                                <li> <a href="#">Not updated in 30 Days</a> </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <?php
                                                   if(getAccessRights('mvbCmGcAdd'))
                                                   {
                                                ?>
                                                        <div class="col-md-9">    
                                                            <div class="pull-right">
                                                                <div class="btn-group">
                                                                    <a id="sample_editable_1_new hvr-float-shadow" href="<?php echo base_url();?>head/coupon/addGenerateCoupon" class="btn btn-primary">
                                                                        <i class="fa fa-user-plus" title="Add Visitor"></i><?php getLocalkeyword('Add Coupons');?> 
                                                                    </a>
                                                                </div>
                                                                <!-- modal ends -->
                                                            </div>
                                                        </div>    
                                                <?php
                                                    }
                                                ?>    
                                            </div>
                                            <div class="selected_rows">
                                            <font id="show_checkbox_selected"></font>    
                                            <a id="selectall"><?php getLocalkeyword('select all');?></a>
                                            </div>
                                            <div class="portlet light">
                                                <div class="portlet-body">
                                                    <!-- <table class="table table-hover table-checkable order-column" id="sample_1" style="width:100% !important;"> -->
                                                    <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable allchekbox" id="sample_1_2" role="grid" aria-describedby="sample_1_2_info">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 35px;">
                                                                    <input type="checkbox" id="checkall" data-set="" name="all" />
                                                                    </label>
                                                                </th>
                                                                <th> <?php getLocalkeyword('Coupon Sr No.');?></th>
                                                                <th><?php getLocalkeyword('Coupon Code');?> </th>
                                                                <th><?php getLocalkeyword('Type');?> </th>
                                                                <th><?php getLocalkeyword('Coupon Value');?> </th>
                                                                <th><?php getLocalkeyword('Coupon Start Date-End Date');?></th>
                                                                <th><?php getLocalkeyword('Validity');?></th>
                                                                <th><?php getLocalkeyword('Created For');?></th>
                                                                <th><?php getLocalkeyword('Used Date');?></th>
                                                                <th><?php getLocalkeyword('Status');?></th>
                                                                <th><?php getLocalkeyword('Used By');?></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                            for($i=0;$i<count($result);$i++)
                                                            {
                                                        ?>        
                                                            <tr class="odd gradeX">
                                                                <td>
                                                                    <input name="chk1" class="check_box" type="checkbox" data-ptag="sb1" id="chk1" value="">
                                                                </td>
                                                                <td><?php echo $result[$i]->gc_serial_no;?></td>
                                                                <td><?php echo $result[$i]->gc_coupon_code;?></td>
                                                                <td><?php echo $result[$i]->pkg_name;?> </td>
                                                                <td><?php echo $result[$i]->gc_usage_limit.' '.$result[$i]->gc_usage_limit_type;?></td>
                                                                <td><?php echo $result[$i]->start_date.' to '.$result[$i]->end_date;?></td>
                                                                <td><?php echo $result[$i]->validity.' Days';?></td>
                                                                <td><?php echo $result[$i]->gc_customer_name;?></td>
                                                                <td><?php echo $result[$i]->used_date;?></td>
                                                                <td><?php echo $result[$i]->gc_status;?></td>
                                                                <td><?php echo $result[$i]->used_by;?></td>
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