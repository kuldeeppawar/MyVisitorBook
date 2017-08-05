<div class="page-content-wrapper">

    <!-- BEGIN CONTENT BODY -->

    <div class="page-content" style="min-height: 956px;">

        <!-- BEGIN PAGE HEADER-->

        <!-- BEGIN PAGE TITLE-->

        <h1 class="page-title text-center"> Reset Password

            <small></small>

        </h1>

        <!-- END PAGE TITLE-->

        <!-- END PAGE HEADER-->

        <div class="row">

            <div class="col-md-12">

                <!-- BEGIN PROFILE SIDEBAR -->

                <!-- END BEGIN PROFILE SIDEBAR -->

                <!-- BEGIN PROFILE CONTENT -->

                <div class="profile-content">

                    <div class="row">

                        <div class="col-md-3"></div>

                        <div class="col-md-6">

                            <ul class="nav nav-tabs">

                                <!--  <li><a data-toggle="tab" href="#Package">Package Type</a></li>

                               <li><a data-toggle="tab" href="#password">Change Password</a></li> -->

                            </ul>

                            <form method="POST" action="<?php echo base_url(); ?>admin/myprofile/changepassword" id="password_change_form" name="password_change_form">

                                <div class="tab-content">

                                    <div id="password" class="tab-pane fade in active">

                                        <div class="row">

                                            <div class="col-md-2"></div>

                                            <div class="col-md-8">

                                                <div class="row">

                                                    <div class="col-md-12 form-group">

                                                        <label>New Password</label>

                                                        <input type="password" class="form-control input-sm" placeholder="Enter New password" name="txtPassword" id="txtPassword">

                                                    </div>

                                                    <br>
                                                    <br>
                                                    <br>

                                                    <div class="col-md-12 form-group">

                                                        <label>Confirm Password</label>

                                                        <input type="password" class="form-control input-sm" placeholder="Confirm New password" name="txtcPassword" id="txtcPassword">

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-md-2"></div>

                                        </div>

                                        <div class="row">

                                            <div class="col-md-4"></div>

                                            <div class="col-md-5">

                                                <div class="clearfix"></div>

                                                <br>

                                                <div class="col-md-12 form-group">
                                                    
                                                    <button type="submit" name="submit" class="btn btn-primary">Save</button>
                                                    <a href="<?php echo base_url(); ?>/admin/myprofile">
                                                        <button type="button" class="btn btn-danger">Cancel</button>
                                                    </a>

                                                </div>

                                            </div>

                                            <div class="col-md-3"></div>

                                        </div>

                            </form>

                            </div>

                            <div id="Package" class="tab-pane fade">

                                <ul class="list-inline">

                                    <li>Accounts type: <span> Gold </span></li>

                                    <li>Accounts Start Date: <span>10/9/2016</span></li>

                                    <li>Accounts End Date: <span>10/9/2016</span></li>

                                    <li class="pull-right"><a class="btn btn-danger" style="padding:5px 20px;">Refill</a></li>

                                </ul>

                                <div class="clearfix">

                                </div>

                                <br>

                            </div>

                            </div>

                        </div>

                        <div class="col-md-3"></div>

                    </div>

                </div>

            </div>

        </div>

        <!-- END TIMELINE ITEM WITH GOOGLE MAP -->

        <!-- TIMELINE ITEM -->

        <!-- END TIMELINE ITEM -->

        <!-- TIMELINE ITEM -->

        <!-- END TIMELINE ITEM -->

    </div>

</div>
<script>

    $("#password_change_form").validate({
                  rules:{             
                      txtPassword:{
                          required:true
                      },
                      txtcPassword:{
                          required:true,
                          validatepass:true
                      }
                  },
                  messages:{                      
                      txtPassword:{
                          required:"Please enter new password"
                      },
                      txtcPassword:{
                          required:"Please enter confirm password",
                          validatepass:"Confirm password doesn't match" 
                      }
                  }
                }); 


        jQuery.validator.addMethod("validatepass", function(value, element) {
      var password = $("#txtPassword").val();
      
         if(password != value)
        {
             return false;
        }
        else
        {           
            return true;
        }
    }, "Confirm password should be same as above."); 



    function validate() {
        var pass = document.getElementById("password1").value;
        var cpass = document.getElementById("confirmpassword").value;
        if ((pass == cpass) && (cpass != "")) {

            return true;
        } else {

            return false;
        }
    }
</script>