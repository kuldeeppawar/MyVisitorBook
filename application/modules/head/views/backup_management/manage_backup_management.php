<div class="page-content-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-md-12">
                <div class=" app-ticket-list">
                    <div class="page-bar row">
                        <div class="col-md-6">
                            <h3 class="page-title">Backup Management</h3>
                            <ul class="page-breadcrumb ">
                                <li><a href="<?php echo base_url()?>head/dashboard">Home</a> <i class="fa fa-circle"></i></li>
                                <li><span>Backup Management</span></li>
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
                                            <li class="dropdown dropdown-user"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" style="font-size: 18px; padding: 2px 0px;">Recently updated <i class="fa fa-angle-down"></i>											</a>
                                                <ul class="dropdown-menu dropdown-menu-default">
                                                    <li><a href="#">All Contacts</a></li>
                                                    <li><a href="#">My Contacts </a></li>
                                                    <li><a href="#">Recently viewed</a></li>
                                                    <li><a href="#">Not updated in 30 Days</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-5  pull-right">
                                        <?php if (getAccessRights( 'mvbBmDownload')) { ?>
                                            <div class="pull-right">
                                                <div class="btn-group"> <a id="sample_editable_1_new hvr-float-shadow" data-toggle="modal" data-target="#otp1" class="btn btn-primary" onclick="getOTP();" >Download Database</a> </div>
                                                <!-- modal ends -->
                                            </div>
                                            <?php } ?>
                                    </div>
                                </div>
                                <div class="selected_rows">
                                    <!-- 1/17 row(s) selected  --><a id="selectall">select all</a> </div>
                                <div class="portlet light">
                                    <div class="portlet-body">
                                        <table class="table table-hover table-checkable order-column" id="sample_1_2" style="width: 100% !important;">
                                            <thead>
                                                <tr>
                                                    
                                                    <th>Backup Download Date</th>
                                                    <th>System User Name</th>
                                                    <th>Email Id</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php for($bp=0;$bp < count($result);$bp ++)                                                      { ?>
                                                    <tr class="odd gradeX">
                                                        
                                                        <td>
                                                            <?php echo $result[$bp]->backup_date;?>
                                                        </td>
                                                        <td>
                                                            <?php echo $result[$bp]->sysmu_username;?>
                                                        </td>
                                                        <td>
                                                            <?php echo $this->encryption->decrypt($result[$bp]->sysmu_email);?>
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
                                <h4 class="modal-title text-left">Enter OTP & Verify</h4> 
                                <font style="color:green;"><span id="show_send_msg"></span></font>
                            </div>
                            <form id="otp_verify_form" name="otp_verify_form" method="POST" action="<?php echo base_url();?>head/backup_management/download_db">
                                <div class="modal-body">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-7 form-group">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Enter OTP</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control input-sm" id="txtotp" name="txtotp" required pattern="[0-9 ]+">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                     
                                    <input type="hidden" class="form-control input-sm" id="hidden_type" name="hidden_type" value="state_module">
                                    <input type="hidden" class="form-control input-sm" id="hidden_country_id" name="hidden_country_id" value="">  
                                    <a>
                                        <button type="submit" class="btn btn-primary" name="btnSubmit"  onclick="reloadPage();">Submit</button>
                                    </a>
                                </div>
                            </form>
                        </div>
                    </form>
                    </div>
            </div>
</div>

<script type="text/javascript">
        function reloadPage()
        {
                //alert('hello');
                setTimeout(function(){
              location.reload();
            }, 5000);
        }

        function getOTP()
        {
                    $.post("<?php echo base_url();?>head/backup_management/getOTP",{},function(data)
                    {                                        
                            $("#show_send_msg").html('OTP has been sent successfully to your registered mobile number '+data);
                    });
        }


      $("#otp_verify_form").validate({
                  rules:{             
                      txtotp:{
                          required:true,
                          remote:
                          {
                                  url:"<?php echo base_url();?>head/backup_management/verifyOTP",
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


            function getOTP()
            {
                        $.post("<?php echo base_url();?>head/backup_management/getOTP",{},function(data)
                        {                                        
                                $("#show_send_msg").html('OTP has been sent successfully to your registered mobile number '+data);
                        });
            }
</script>