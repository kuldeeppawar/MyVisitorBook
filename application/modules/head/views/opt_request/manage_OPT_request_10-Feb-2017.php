<div class="page-content-wrapper">



    <div class="page-content">



        <div class="row">



            <div class="col-md-12">



                <div class=" app-ticket-list">



                    <div class="page-bar row">



                        <div class="col-md-6">



                            <h3 class="page-title">OPT request</h3>



                            <ul class="page-breadcrumb ">



                                <li> <a href="index.html">Home</a> <i class="fa fa-circle"></i> </li>



                                <li> <a href="#">Approval Management</a> <i class="fa fa-circle"></i> </li>



                                <li> <span>OPT Request</span> </li>



                            </ul>



                        </div>



                        <div class="col-md-6">



                            <div id="reportrange" class="btn pull-right " style="padding-top: 12px;"> <i class="fa fa-calendar"></i> &nbsp; <span class="thin uppercase hidden-xs">August 28, 2016 - September 26, 2016</span> <b class="fa fa-angle-down"></b> </div>



                        </div>



                    </div>



                    <div class="row">



                        <!--modal-->



                        <div id="edit_data_popup" class="modal fade" role="dialog">



                            <div class="modal-dialog">



                                <!-- Modal content-->



                                <div class="modal-content">



                                    <div class="modal-header">



                                        <button type="button" class="close" data-dismiss="modal">×</button>



                                        <h4 class="modal-title text-center">Edit OPT Name</h4>



                                    </div>



                                    <form id="opt_request_form" name="opt_request_form" action="<?php echo base_url();?>head/OPT_request/editOPTName" method="POST">



                                        <div class="modal-body">



                                            <div class="col-md-1"></div>



                                            <div class="col-md-10 form-group">



                                                <div class="row">



                                                    <div class="col-md-12">

                                                        <label>OPT Name</label>

                                                    </div>



                                                    <div class="col-md-12">



                                                        <!-- <textarea rows="4" class="form-control" id="txtCommentApprove" name="txtCommentApprove" required></textarea> -->



                                                        <input type="text" id="edit_opt_name" name="edit_opt_name" value="" class="form-control" required/>



                                                    </div>

                                                </div>



                                            </div>



                                            <div class="col-md-1"></div>



                                            <div class="clearfix"></div>



                                            <div class="row">



                                                <div class="col-md-1"></div>



                                                <div class="col-md-11">



                                                    <input type="hidden" id="hidden_opt_id" name="hidden_opt_id" value="hidden_opt_id" />



                                                    <a href="#" style="margin-left:10px;">

                                                        <button type="Submit" class="btn btn-primary" name="btnSubmit">Submit</button>

                                                    </a>



                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>



                                                </div>



                                            </div>



                                            <div class="modal-footer"></div>

                                        </div>



                                    </form>



                                </div>



                            </div>



                        </div>



                        <div id="approve_comment" class="modal fade" role="dialog">



                            <div class="modal-dialog">



                                <!-- Modal content-->



                                <div class="modal-content">



                                    <div class="modal-header">



                                        <button type="button" class="close" data-dismiss="modal">×</button>



                                        <h4 class="modal-title text-center">Add Comment</h4>



                                    </div>



                                    <!-- <form id="stemp_request_form" name="stemp_request_form" action="<?php //echo base_url();?>head/sms_temp_request/setApproveStatus" method="POST"> -->



                                    <div class="modal-body">



                                        <div class="col-md-1"></div>



                                        <div class="col-md-10 form-group">



                                            <div class="row">



                                                <div class="col-md-12">

                                                    <label>Enter Comment</label>

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



                                                <a href="#" style="margin-left:10px;">

                                                    <button type="button" class="btn btn-primary" name="btnSubmit" onclick="setStatus('1');">Submit</button>

                                                </a>



                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>



                                            </div>



                                        </div>



                                        <div class="modal-footer">



                                        </div>



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



                                        <h4 class="modal-title text-center">Add Comment</h4>



                                    </div>



                                    <!-- <form id="stemp_request_form" name="stemp_request_form" action="<?php //echo base_url();?>head/sms_temp_request/setRejectStatus" method="POST"> -->



                                    <div class="modal-body">



                                        <div class="col-md-1"></div>



                                        <div class="col-md-10 form-group">



                                            <div class="row">



                                                <div class="col-md-12">

                                                    <label>Enter Comment</label>

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



                                                <a href="#" style="margin-left:10px;">

                                                    <button type="button" onclick="setStatus('2');" class="btn btn-primary" name="btnSubmit">Submit</button>

                                                </a>



                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>



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



                                    <div class="col-md-5  pull-right">



                                        <div class="pull-right">



                                            <div style="float: left; margin-top: 8px; margin-right: 5px;">



                                            <?php

                                                if(getAccessRights('mvbAmOrEdit'))

                                                {

                                            ?>    

                                                    <a data-target="#edit_data_popup" data-toggle="modal" class="margin_rgt hide_element" onclick="setoptname();"> <i class="fa fa-pencil-square-o fa-2x" title="edit" style="color:#828282; "></i></a>

                                            <?php

                                                }



                                                if(getAccessRights('mvbAmOrApprove'))

                                                {    

                                            ?>        

                                                    <a id="approve_popup" data-toggle="modal" title="Approve" style="padding: 5px; margin-top: 5px;" onclick="checkCB('1');"><i class="fa fa-2x fa-thumbs-o-up" aria-hidden="true" style="color:#828282; "></i></a>

                                            <?php

                                                }



                                                 if(getAccessRights('mvbAmOrReject'))

                                                { 

                                            ?>

                                                    <a id="reject_popup" data-toggle="modal"  title="Reject" style="padding: 5px; margin-top: 5px;" onclick="checkCB('2');"><i class="fa fa-2x fa-ban" aria-hidden="true" style="color:#828282; "></i></a>

                                            <?php

                                                }

                                            ?>        

                                            </div>



                                            <!--  <ul class="nav navbar-nav pl0 pull-right" style="margin-left:5px;">



                                                            <li class="dropdown dropdown-user burger_menu"> <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" style="margin-top:0px;"><i class="fa fa-bars fa-2x" aria-hidden="true"></i> </a>



                                                                  <ul class="dropdown-menu dropdown-menu-default">



                                                                    <li class="options" style="border-bottom: 1px solid #e7ecf1;"> <a id="approve_popup" data-toggle="modal"  title="Approve" onclick="checkCB('approve');" style="padding: 5px; margin-top: 5px;">Approve</a></li>



                                                                    <li class="options"> <a id="reject_popup" data-toggle="modal"  title=" Reject" style="padding: 5px; margin-top: 5px; " onclick="checkCB('reject');">Reject</a></li>



                                                                  </ul>



                                                            </li>



                                                        </ul> -->



                                            <!-- modal ends -->



                                        </div>



                                    </div>



                                </div>



                                <div class="selected_rows">1/17 row(s) selected <a id="selectall">select all</a></div>



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



                                                    <th> Client Name</th>



                                                    <th> Requested Date and Time</th>



                                                    <th>Client Registration Date</th>



                                                    <th> Business Name </th>



                                                    <th> OPT Name</th>



                                                    <th> Approval/Rejected Date and Time</th>



                                                    <th>Action</th>



                                                </tr>



                                            </thead>



                                            <tbody>



                                                <?php

                                                            for($st=0;$st<count($result);$st++)

                                                            {



                                                                 $mu=$st+1;   

                                                        ?>

                                                    <tr class="odd gradeX">



                                                        <td>

                                                            <input name="chk1" class="check_box" type="checkbox" data-ptag="sb1" id="chk<?php echo $mu;?>" value="<?php echo $result[$st]->optreq_id_pk;?>">

                                                        </td>



                                                        <td>

                                                            <?php echo $result[$st]->clnt_name;?>

                                                        </td>



                                                        <td>

                                                            <?php echo $result[$st]->requested_date;?>

                                                        </td>



                                                        <td>

                                                            <?php echo $result[$st]->created_date;?>

                                                        </td>



                                                        <td>

                                                            <?php echo '-';?>

                                                        </td>



                                                        <td>

                                                            <?php echo $result[$st]->opt_name;?>

                                                        </td>



                                                        <td>

                                                            <?php if($result[$st]->app_rejt_date=='00/00/0000,12:00 AM'){ echo '-';}else{ echo $result[$st]->app_rejt_date;}?>

                                                        </td>



                                                        <td>

                                                            <?php echo $result[$st]->request_status;?> <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="<?php echo $result[$st]->optreq_comment;?>"></i></td>



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

        if (value == '1') {

            var comment = document.getElementById('txtCommentApprove').value;

        } else {

            var comment = document.getElementById('txtCommentReject').value;

        }



        var count = <?php echo count($result)?>;

        var sms_temp_id = [];



        for (var i = 1; i <= count; i++) {

            if ($('#chk' + i).is(':checked')) {

                sms_temp_id.push($("#chk" + i).val());

            }

        }



        if (sms_temp_id.length === 0) {

            alert("Please Select OPT Request");

        } else {

            $.post("<?php echo base_url();?>head/OPT_request/setStatus", {

                type: value,

                smstemp_id: sms_temp_id,

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

            alert("Please Select OPT Request");

        } else {

            if (type == '1') {

                $("#approve_popup").attr("data-target", "#approve_comment");

            } else {

                $("#reject_popup").attr("data-target", "#reject_comment");

            }

        }

    }



    function setoptname() {

        var count = <?php echo count($result)?>;

        var opt_chk_id = 0;



        for (var i = 1; i <= count; i++) {

            if ($('#chk' + i).is(':checked')) {

                opt_chk_id = $("#chk" + i).val();

            }

        }



        $.post("<?php echo base_url();?>head/OPT_request/getOPTName", {

            opt_id: opt_chk_id

        }, function(data) {

            var explode_parts = data.split("~");



            $("#edit_opt_name").val(explode_parts[0]);

            $("#hidden_opt_id").val(explode_parts[1]);

        });

    }

</script>