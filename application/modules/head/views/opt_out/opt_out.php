 <div class="page-content-wrapper">

                <div class="page-content">

                    <div class="row">

                        <div class="col-md-12">

                            <div class=" app-ticket-list">

                                <div class="page-bar row">

                                    <div class="col-md-6">

                                        <h3 class="page-title"><?php getLocalkeyword('OPT Out');?></h3>

                                        <ul class="page-breadcrumb ">

                                            <li> <a href="<?php echo base_url()?>head/dashboard"><?php getLocalkeyword('Home');?></a> <i class="fa fa-circle"></i> </li>

                                            <li> <span><?php getLocalkeyword('OPT Out');?></span> </li>

                                        </ul>

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
                                                            if(getAccessRights('mvbSetOptin'))
                                                            {
                                                        ?>
                                                                <a class="margin_rgt hide_element"><i class="fa fa-2x fa-check-square-o" aria-hidden="true" title="OPT In" onclick="setOptIn();"></i></a>
                                                        <?php
                                                            }

                                                            if(getAccessRights('mvbSetOptAdd'))
                                                            {
                                                        ?>
                                                            <a id="sample_editable_1_new hvr-float-shadow" data-toggle="modal" data-target="#opt_out" class="btn btn-primary"><?php getLocalkeyword('OPT Out');?></a>
                                                        <?php
                                                            }

                                                            if(getAccessRights('mvbSetOptExport'))
                                                            {
                                                        ?>
                                                            <!--<a href="#" class="margin_rgt hide_element"> <i class="fa fa-eye fa-2x" title="View" style="color:#828282; "></i></a>-->

                                                            <a class="margin_rgt export" data-toggle="modal" data-target="#otp1" onclick="getOTP();"><?php getLocalkeyword('Export');?></a>
                                                        <?php
                                                            }
                                                        ?>        
                                                        </div>

                                                        <div class="btn-group"> </div>

                                                        <!-- modal ends -->

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="selected_rows">
                                             <font id="show_checkbox_selected"></font>   
                                            <a id="selectall"><?php getLocalkeyword('select all');?></a></div>

                                            <div class="portlet light">

                                                <div class="portlet-body">

                                                    <table class="table table-hover table-checkable order-column" id="sample_1" style="width:100% !important;">

                                                        <thead>

                                                            <tr>

                                                                <th style="width: 35px;">
                                                                    <input type="checkbox" id="checkall" data-set="" name="all" />

                                                                    </label>

                                                                </th>

                                                                <th><?php getLocalkeyword('Sr.No');?></th>

                                                                <th><?php getLocalkeyword('Name');?></th>

                                                                <th><?php getLocalkeyword('Mobile No');?></th>

                                                                <th><?php getLocalkeyword('Email Id');?></th>

                                                                <th><?php getLocalkeyword('Client User Id');?></th>

                                                                <th><?php getLocalkeyword('Client Name');?></th>

                                                                <th><?php getLocalkeyword('Status');?></th>

                                                                <th><?php getLocalkeyword('OPT Out By');?></th>

                                                                <th><?php getLocalkeyword('OPT In By');?></th>

                                                                <th><?php getLocalkeyword('Date');?></th>

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
                                                                    <input name="chk1" class="temp_check_box" type="checkbox" data-ptag="sb1" id="chk<?php echo $j;?>" value="<?php echo $result[$i]->oo_id_pk;?>">
                                                                </td>

                                                                <td><?php echo $j;?></td>

                                                                <td><?php echo $result[$i]->customer_name;?></td>

                                                                <td><?php echo $result[$i]->vis_mobile;?></td>

                                                                <td><?php echo $result[$i]->vis_email;?></td>

                                                                <td><?php echo $result[$i]->clnt_id_pk;?></td>

                                                                <td><?php echo $result[$i]->clnt_name;?></td>

                                                                <td><?php echo $result[$i]->status;?></td>

                                                                <td><?php echo $result[$i]->opt_out_by;?></td>

                                                                <td><?php echo $result[$i]->opt_in_by;?></td>

                                                                <td><?php echo $result[$i]->created_date;?></td>
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

            <div class="page-content-wrapper1">

                <div id="otp1" class="modal fade in" role="dialog">
                    <div class="modal-dialog">
                    
                        <!-- Modal content-->
                        <div class="modal-content" style="height: 150px;">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">×</button>
                                <h4 class="modal-title text-left"><?php getLocalkeyword('Enter OTP Here');?></h4> 
                                <font style="color:green;"><span id="show_send_msg"></span></font>
                            </div>
                            <form id="otp_verify_form" name="otp_verify_form" method="POST" action="<?php echo base_url();?>head/opt_out/verifyExport">
                                <div class="modal-body">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-7 form-group">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label><?php getLocalkeyword('Enter OTP');?></label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="password" class="form-control input-sm" id="txtotp" name="txtotp" required pattern="[0-9 ]+">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                    <a>
                                        <button type="submit" class="btn btn-primary" name="btnSubmit"><?php getLocalkeyword('Submit');?></button>
                                    </a>
                                </div>
                            </form>
                        </div>
                    <!-- </form> -->
                    </div>
                </div>

                <!-- <div class="user_list_box">

                    <div class="row">

                        <div class="col-md-12">

                            <div class="selected_rows col-md-7 pd0">1/17 row(s) selected <a id="selectall">select all</a></div>
                            <div class=" col-md-5 pd0 pull-right"> <a href="#" class="margin_rgt  pull-right" data-toggle="modal" data-target="#otp1">Export</a></div>

                            <div class="portlet light">

                                <div class="portlet-body">

                                    <table class="table table-hover table-checkable order-column display" id="sample_1" style="width:100% !important;">

                                        <thead>

                                            <tr>

                                                <th style="width: 35px;">
                                                    <input type="checkbox" id="checkall" data-set="" name="all" />

                                                    </label>

                                                </th>

                                                <th>Type</th>

                                                <th>Campaign Name</th>

                                                <th>Sent On /Scheduling Date

                                                </th>

                                                <th>Split Count</th>

                                                <th>Delivery Status </th>

                                                <th>Delivery Date and Time</th>

                                                <th>Type</th>

                                                <th>GUID</th>

                                                <th>Message Details</th>

                                                <th>Contact Group</th>

                                            </tr>

                                        </thead>

                                        <tbody>

                                            <tr class="odd gradeX">

                                                <td>
                                                    <input name="chk1" class="check_box" type="checkbox" data-ptag="sb1" id="chk1" value="">
                                                </td>

                                                <td> Single SMS</td>

                                                <td class="center">Hello How r u ? </td>

                                                <td> 2016-08-14, 6:09PM </td>

                                                <td>1</td>

                                                <td>1</td>

                                                <td>1</td>

                                                <td>1</td>

                                                <td>1</td>

                                                <td>happy independence day </td>

                                                <td>NA</td>

                                            </tr>

                                            <tr class="odd gradeX">

                                                <td>
                                                    <input name="chk1" class="check_box" type="checkbox" data-ptag="sb2" id="chk2" value="">
                                                </td>

                                                <td> Single SMS</td>

                                                <td class="center">Hello How r u ? </td>

                                                <td> 2016-08-14, 6:09PM </td>

                                                <td>1</td>

                                                <td>1</td>

                                                <td>1</td>

                                                <td>1</td>

                                                <td>1</td>

                                                <td>happy independence day </td>

                                                <td>NA</td>

                                            </tr>

                                            <tr class="odd gradeX">

                                                <td>
                                                    <input name="chk1" class="check_box" type="checkbox" data-ptag="sb2" id="chk3" value="">
                                                </td>

                                                <td> Single SMS</td>

                                                <td class="center">Hello How r u ? </td>

                                                <td> 2016-08-14, 6:09PM </td>

                                                <td>1</td>

                                                <td>1</td>

                                                <td>1</td>

                                                <td>1</td>

                                                <td>1</td>

                                                <td>happy independence day </td>

                                                <td>NA</td>

                                            </tr>

                                        </tbody>

                                    </table>

                                </div>

                            </div>

                        </div>

                    </div>

                </div> -->

            </div>

            <div id="opt_out" class="modal fade in" role="dialog">

                <div class="modal-dialog">

                    <!-- Modal content-->

                    <div class="modal-content">

                        <div class="modal-header">

                            <button type="button" class="close" data-dismiss="modal">×</button>

                            <h4 class="modal-title text-left"><?php getLocalkeyword('OPT Out');?></h4>

                        </div>

                        <div class="modal-body">

                            <div class="row">

                                <div class="col-md-1"></div>

                                <div class="col-md-10">
                                   
                                    <form id="opt_out_form" name="opt_out_form" action="<?php echo base_url();?>head/opt_out/addOptOut" method="POST">

                                        <div class="form-body">

                                            <div class="form-group">

                                                <label class=""><?php getLocalkeyword('Mobile No.');?></label>

                                                <br>

                                                <input type="text" class=" input-sm form-control " placeholder="" id="txtmobileno" name="txtmobileno" required pattern="[0-9]+" minlength="10" maxlength="10">

                                            </div>

                                            <div class="modal-footer">

                                                <button type="submit" class="btn btn-primary" name="btnSubmit"><?php getLocalkeyword('OPT Out');?></button>

                                                <button type="button" data-dismiss="modal" class="btn btn-danger" onclick="resetData();"><?php getLocalkeyword('Cancel');?></button>

                                            </div>

                                        </div>

                                    </form>

                                </div>

                                <div class="col-md-1"></div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <script>

                    function setOptIn()
                    {
                            var count=<?php echo count($result)?>;
                            var optId=[];
                             
                            for (var i=1;i<=count;i++)
                            {
                                  if($('#chk'+i).is(':checked'))
                                  {
                                        optId.push($("#chk"+i).val()); 
                                  }
                            }                            

                            $.post("<?php echo base_url();?>head/opt_out/addOptIn",{opt_out_id:optId},function(data)
                            {
                               window.location.reload();
                                //console.log(data);
                                //alert("OPT In Has Been Done Successfully");
                            });
                    }

                    function getOTP()
                    {
                            $.post("<?php echo base_url();?>head/opt_out/getOTP",{},function(data)
                            {                                        
                                    $("#show_send_msg").html('OTP has been send successfully - '+data);
                            });
                    }


                    $("#opt_out_form").validate({
                  rules:{             
                      txtmobileno:{
                          required:true,
                          remote:
                          {
                                  url:"<?php echo base_url();?>head/opt_out/verifyMobile",
                                  type:"POST",
                                  data:
                                  {
                                        txtmobileno:function()
                                        {
                                               return $("#txtmobileno").val().trim()
                                        }       
                                  }  
                          }
                      }
                  },
                  messages:{                      
                      txtmobileno:{
                          required:"Please enter mobile no",
                          remote:jQuery.validator.format("Mobile Number does not exists")
                      }
                  }
                });

                    $("#otp_verify_form").validate({
                  rules:{             
                      txtotp:{
                          required:true,
                          remote:
                          {
                                  url:"<?php echo base_url();?>head/opt_out/verifyOTP",
                                  type:"POST",
                                  data:
                                  {
                                        txtotp:function()
                                        {
                                               return $("#txtotp").val().trim()
                                        }       
                                  }  
                          }
                      }
                  },
                  messages:{                      
                      txtotp:{
                          required:"Please enter OTP",
                          remote:jQuery.validator.format("OTP is not valid")
                      }
                  }
                });


                $('.temp_check_box').change(function(){

                        if($('.temp_check_box:checked').length==0){

                            $('.hide_element').css('visibility','hidden');

                            $('.selected_rows').hide();

                        }

                        else if($('.temp_check_box:checked').length==1){

                        $('.hide_element').css('visibility','visible');

                         $('.selected_rows').show();

                       }



                        else if($('.temp_check_box:checked').length>=1){

                         $('.hide_element').css('visibility','visible');

                      $('.selected_rows').show();

                        }

                        else {

                            $('.temp_check_box:checked').each(function(){

                                $('#'+$(this).attr('data-ptag')).show();

                            });

                        }

                    });    

                function resetData()
                {
                    $("#opt_out_form").validate().resetForm();

                    $("#txtmobileno").val('');
                }

            </script>