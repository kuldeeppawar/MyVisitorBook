<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>MyVisitorBook</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>themes/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>themes/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>themes/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>themes/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>themes/assets/global/plugins/bootstrap-summernote/summernote.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->

        <link href="<?php echo base_url(); ?>themes/assets/global/plugins/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>themes/assets/global/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>themes/assets/global/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo base_url(); ?>themes/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo base_url(); ?>themes/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>themes/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>themes/assets/apps/css/ticket.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>themes/assets/custom.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?php echo base_url(); ?>themes/assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>themes/assets/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?php echo base_url(); ?>themes/assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>themes/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>themes/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>themes/assets/pages/css/profile.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>themes/assets/hover.css" rel="stylesheet" media="all">
        <link href="<?php echo base_url(); ?>themes/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>themes/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>themes/assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <script src="<?php echo base_url(); ?>themes/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>themes/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <link rel="shortcut icon" href="favicon.ico" />
        <style type="text/css">
            .page-header-fixed .page-container {
                margin-top: 42px;
            }

            .page-content-wrapper1 {
                float: left;
                width: 100%;
            }

            .user_list_box {
                overflow: auto;
            }

            .fa-2x {
                font-size: 20px !important;
            }

            .dropdown-menu {
                min-width: 70px !important;
                margin-right: 10px;
            }

            .nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover
            {
                color: #555;
                background-color: #fff;
                border: 1px solid #ddd;
                border-bottom-color: transparent;
                cursor: default;
                border-bottom: solid 3px #337ab7 !important;
            }

            .send_sms {
                z-index: 999999 !important;
            }

            .error{
                color:#e73d4a
            }
        </style>
    </head>
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-content-white page-sidebar-closed">
        <div class="page-wrapper">

            <div class="page-header navbar navbar-fixed-top">

                <div class="page-header-inner ">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
                        <a href="index.html"> <img src="<?php echo base_url(); ?>themes/assets/layouts/layout/img/logo.png" alt="logo" class="logo-default" />
                        </a>
                        <div class="menu-toggler sidebar-toggler">
                            <span></span>
                        </div>
                    </div>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> <span></span>
                    </a>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <!-- BEGIN NOTIFICATION DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->

                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-user"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> <img alt=""
                                                                                                                                                                                          class="img-circle" src="<?php echo base_url(); ?>themes/assets/layouts/layout/img/avatar3_small.jpg" /> 
                                                                                                                                                                                          <span class="username username-hide-on-mobile"> <?php echo $this->session->userdata('reseller_name'); ?> </span> <i
                                                                                                                                                                                          class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li><a href="<?php echo base_url(); ?>reseller/myprofile"> <i class="icon-user"></i> <?php getLocalkeyword('My Profile');?>
                                        </a></li>

                                    <li><a href="<?php echo base_url(); ?>reseller/reseller/logOut"> <i class="icon-key"></i><?php getLocalkeyword('Log out ');?> 
                                        </a></li>
                                </ul></li>
                            <!-- END USER LOGIN DROPDOWN -->
                            <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <!-- END QUICK SIDEBAR TOGGLER -->
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END HEADER INNER -->
            </div>
              <div id="changeLanguages" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="col-md-10">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h2 class="modal-title text-left"><?php getLocalkeyword('Select Language');?></h2>
						</div>
						<div class="modal-body">
							<div class="portlet-body form">
								<form role="form" id="frmLanguage" action="<?php echo base_url()?>reseller/selectLanguage" method="post" enctype="multipart/form-data">
									<div class="form-body">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label><?php getLocalkeyword('Select Language');?><span class="mandatory"></span></label>
													<select name="selLanguage" id="selLanguage" required="required" class="form-control">
													  <option value="">Select Language</option>
													 <?php 
													 $headId=$this->session->userdata('reseller_id');
													 $result=$this->db->query("SELECT `sysmu_id_pk`,`sysmu_languageId_fk` FROM `tblmvbsysmainusers` WHERE sysmu_id_pk='".$headId."'");
													 $result=$result->result();
													 $lngId=$result[0]->sysmu_languageId_fk;
													    
													     $result=$this->db->query("SELECT `lng_id_pk`, `lng_name`, `lng_createdDate`, `lng_status`
													     	                       FROM `tblmvblanguages` where lng_status='1'");
													     $result=$result->result();
													     for($i=0;$i<count($result);$i++)
													     {	
													     	?>
													     	
													     	<option value="<?php echo $result[$i]->lng_id_pk?>"
													     	<?php if($lngId==$result[$i]->lng_id_pk){ echo "selected";}?>
													     	><?php echo $result[$i]->lng_name?></option>
													     	<?php 
													     }
													 ?>
													 </select>
												</div>
											  
												
												<div class="modal-footer">
												
													<button type="submit" name="btnSubmit" class="btn btn-primary"><?php getLocalkeyword('Save');?></button>
													<button type="button"   data-dismiss="modal" class="btn btn-danger"><?php getLocalkeyword('Cancel');?></button>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	  <script>
	  $(document).ready(function(){
		   $("#frmLanguage").validate({
		  	
		      rules:{             
		    	  selLanguage:{
		              required:true
		          }	        
		      },
		      messages:{                      
		      	
		    	  selLanguage:{
		              required:"Please Select Language"
		          }  		        
		      }
		  });
	  });

	  </script>	

            <?php $this->load->view('backend/leftsidebar_r'); ?>
