<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8" />
<title>My Visitors Book Admin Panel Login</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport" />
<meta content="" name="description" />
<meta content="" name="author" />
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>themes/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>themes/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>themes/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>themes/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="<?php echo base_url();?>themes/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>themes/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL STYLES -->
<link href="<?php echo base_url();?>themes/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
<link href="<?php echo base_url();?>themes/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
<!-- END THEME GLOBAL STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="<?php echo base_url();?>themes/assets/pages/css/login-5.min.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN THEME LAYOUT STYLES -->
<!-- END THEME LAYOUT STYLES -->
<link rel="shortcut icon" href="favicon.ico" />
</head>
<!-- END HEAD -->
<body class=" login">
	<!-- BEGIN : LOGIN PAGE 5-1 -->
	<div class="user-login-5">
		<div class="row bs-reset">
			<div class="col-md-6 bs-reset mt-login-5-bsfix">
				<div class="login-bg" style="background-image: url(../themes/assets/pages/img/login/bg1.jpg)"></div>
			</div>
			<div class="col-md-6 login-container bs-reset mt-login-5-bsfix">
				<div class="login-content">
					<img class="login-logo" src="<?php echo base_url();?>themes/assets/pages/img/login/logo.png" style="margin-left: 170px; margin-top: 50px;" />
					<h3>Sign in to your MyVisitorsBook Account</h3>
					
					<form class="login-form" action="<?php echo base_url();?>admin/" method="post">
						<div class="alert alert-danger display-hide">
							<button class="close" data-close="alert"></button>
							<span>Enter valid Email and password. </span>
						</div>
						<p><?php echo $this->session->flashdata('message');?> </p>
						<div class="row">
							<?php
								if ($this->session->flashdata ( 'success' ))
								{
									?>
                     <div id="prefix_834140561262" class="custom-alerts alert alert-success fade in ">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><?php echo $this->session->flashdata('success');?></div>
                  <?php
								} else if ($this->session->flashdata ( 'error' ))
								{
									?>
              
                    <div id="prefix_1445089440962" class="custom-alerts alert alert-danger fade in">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><?php echo $this->session->flashdata('error');?></div>
              <?php
								
                                    }
								
								?>
							<div class="col-xs-6">
								<input class="form-control form-control-solid placeholder-no-fix form-group" type="text" autocomplete="off" placeholder="Username" name="txtUsername" required />
							</div>
							<div class="col-xs-6">
								<input class="form-control form-control-solid placeholder-no-fix form-group" type="password" autocomplete="off" placeholder="Password" name="txtPassword" required />
							</div>
						</div>
						<div class="row">
							<div class="col-sm-2">
								<input class="btn green" type="submit" name="btnSubmit" value="Submit">
							</div>
							<!-- <div class="col-sm-4">
                                    <div class="rem-password">
                                        <label class="rememberme mt-checkbox mt-checkbox-outline">
                                            <input type="checkbox" name="remember" value="1" /> Remember me
                                            <span></span>
                                        </label>
                                    </div>
                                </div> -->
							<div class="col-sm-8 text-right">
								<div class="forgot-password">
									<a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>
								</div>
							</div>
						</div>
					</form>
					<!-- BEGIN FORGOT PASSWORD FORM -->
					<form class="forget-form" action="<?php echo base_url();?>admin/forgot_password" method="post" id="forgot_pass_form" novalidate="novalidate">
						<h3>Forgot Password ?</h3>
						<p>Enter your e-mail address below to reset your password.</p>
						<br>
						<div class="form-group">
							<input class="form-control placeholder-no-fix form-group" type="text" id="email" autocomplete="off" placeholder="Enter Email Id" name="email" />
						</div>
						<div class="form-actions">
							<button type="button" id="back-btn" class="btn green btn-outline" onclick="loadForm();">Back</button>
							<button type="submit" name="submit" class="btn btn-success uppercase pull-right">Submit</button>
						</div>
					</form>
					<!-- END FORGOT PASSWORD FORM -->
					<hr />
					
				</div>
			</div>
		</div>
	</div>
	<!-- END : LOGIN PAGE 5-1 -->
	<!--[if lt IE 9]>
<script src="<?php echo base_url();?>themes/assets/global/plugins/respond.min.js"></script>
<script src="<?php echo base_url();?>themes/assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
	<!-- BEGIN CORE PLUGINS -->
	<script src="<?php echo base_url();?>themes/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>themes/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>themes/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>themes/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>themes/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>themes/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script src="<?php echo base_url();?>themes/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>themes/assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>themes/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>themes/assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN THEME GLOBAL SCRIPTS -->
	<script src="<?php echo base_url();?>themes/assets/global/scripts/app.min.js" type="text/javascript"></script>
	<!-- END THEME GLOBAL SCRIPTS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="<?php echo base_url();?>themes/assets/pages/scripts/login-5.min.js" type="text/javascript"></script>
	<!-- END PAGE LEVEL SCRIPTS -->
	<!-- BEGIN THEME LAYOUT SCRIPTS -->
	<!-- END THEME LAYOUT SCRIPTS -->
</body>
</html>
<script>

window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 4000);

function loadForm()
{
        $('#email').val('');
        $('#email-error').load(document.URL + '#email-error');
 }


$(document).ready(function() {           
   var stringUrl="http://localhost/myvisitorbook/";         
            // Form Validation 
            $("#forgot_pass_form").validate({
                    rules: {
                        email: {
                            required:true,
                            remote: {
                                url: "<?php echo base_url(); ?>admin/check_email",
                                type: "POST",
                                    data:{
                                        email: function(){
                                          return $("#email").val();
                                      }
                                    }
                                }                        
                        }                       
                    },
                    messages: {
                        required: "Please Enter Email",
                        remote: jQuery.validator.format("{0} is already in use")
                    },
                    submitHandler: function(form) 
                    {
                        
                             $.ajax({
                                 type: "POST",
                                 url: stringUrl+'admin/forgot_password',
                                 data: $("#forgot_pass_form").serialize(),
                                 success: function(result) {
                                  
                                  if(result)
                                  {          
                                                alert('Password sent to email id please check your mail');
                                                window.location.reload();  
                                  }
                                  else
                                  {
                                                alert('Problem to send reset password link to email id please try again');  
                                  }                              
                                    //console.log(json);

                                 }
                            });
                        }
                });
        });
</script>