<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>themes/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>themes/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>themes/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>themes/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />

<!-- END GLOBAL MANDATORY STYLES -->

<!-- BEGIN PAGE LEVEL PLUGINS -->

<link href="<?php echo base_url(); ?>themes/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>themes/assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>themes/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>themes/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />

<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN THEME GLOBAL STYLES -->

<link href="<?php echo base_url(); ?>themes/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
<link href="<?php echo base_url(); ?>themes/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>themes/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>themes/assets/apps/css/ticket.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>themes/assets/custom.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>themes/assets/prettify.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>themes/assets/jquery.multiselect.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>themes/assets/jquery-ui.css" />

<!-- END THEME GLOBAL STYLES -->

<!-- BEGIN THEME LAYOUT STYLES -->

<link href="<?php echo base_url(); ?>themes/assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>themes/assets/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
<link href="<?php echo base_url(); ?>themes/assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>themes/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>themes/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>themes/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>themes/assets/global/plugins/clockface/css/clockface.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>themes/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
<link href="<?php echo base_url(); ?>themes/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />

<!-- END THEME LAYOUT STYLES -->

<link rel="shortcut icon" href="favicon.ico" />
<style type="text/css">
    .page-header-fixed .page-container {
        margin-top: 42px;
    }
    .page-content-wrapper .page-content {
        margin-left: 235px;
        margin-top: 0;
        min-height: 800px !important;
        padding: 25px 20px 10px;
        background-color: #fff;
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
    .nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
        color: #555;
        background-color: #fff;
        border: 1px solid #ddd;
        border-bottom-color: transparent;
        cursor: default;
        border-bottom: solid 3px #337ab7 !important;
    }
</style>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->
<script>
    $(document).ready(function () {
        $("#hide").click(function () {
            $(".plus").hide();
        });
        $("#show").click(function () {
            $(".plus").show();
        });
    });
</script>

<div class="page-content-wrapper">
    <div class="page-content" style="min-height:591px !important">
        <div class="row">
            <div class="col-md-12">
                <div class=" app-ticket-list">
                    <div class="page-bar row">
                        <div class="col-md-6">
                            <h3 class="page-title"><?php getLocalkeyword('Send Bulk SMS');?></h3>
                            <ul class="page-breadcrumb ">
                                <li> <a href="<?php echo base_url(); ?>admin/dashboard"><?php getLocalkeyword('Home');?></a> <i class="fa fa-circle"></i> </li>
                                <li> <a href="<?php echo base_url(); ?>admin/sms_management"><?php getLocalkeyword('SMS Management');?></a> <i class="fa fa-circle"></i> </li>
                                <li> <span><?php getLocalkeyword('Send Bulk SMS');?></span> </li>
                            </ul>
                        </div>
                        <div class="col-md-6"> </div>
                    </div>
                    <?php
                    if ($this->session->flashdata('success'))
                    {
                        ?>
                        <div id="prefix_834140561262" class="custom-alerts alert alert-success fade in ">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><?php echo $this->session->flashdata('success'); ?></div>
                        <?php
                    }
                    else if ($this->session->flashdata('error'))
                    {
                        ?>

                        <div id="prefix_1445089440962" class="custom-alerts alert alert-danger fade in">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><?php echo $this->session->flashdata('error'); ?></div>
                        <?php
                    }
                    ?>
                    <div class="row">
                        <div class="col-md-8">
                            <form role="form" onsubmit="return checkForm();" action="<?php echo base_url(); ?>admin/sms_management/addCampaign" id="CampaignForm" method="POST">
                                <div class="form-body">
                                    <div class="col-md-12 pl0" style="padding-top: 5px;">
                                        <div class="input-group col-md-3">
                                            <div class="mt-checkbox-list">
                                                <label>
                                                    <input name="chk1" class="check_box" type="checkbox" <?php if($way=="user"){ echo "checked";}?> id="chk_email" value="1">
                                                   <?php getLocalkeyword('Search by name,email');?>  </label>
                                            </div>
                                        </div>
                                        <div class="input-group col-md-1">
                                            <div class="form-group" style="padding-top:8px; text-align: left;"> <b><?php getLocalkeyword('OR');?></b> </div>
                                        </div>
                                        <div class="input-group col-md-3">
                                            <div class="mt-checkbox-list">
                                                <label>
                                                    <input <?php if($way=="group"){ echo "checked";}?> name="chk1" class="check_box" type="checkbox"  id="chk_group" value="1">
                                                   <?php getLocalkeyword('Select your Group');?>  </label>
                                            </div>
                                        </div>
                                        <div class="input-group col-md-1">
                                            <div class="form-group" style="padding-top:8px; text-align: left;"> <b><?php getLocalkeyword('OR');?></b> </div>
                                        </div>
                                        <div class="input-group col-md-3">
                                            <div class="mt-checkbox-list">
                                                <label>
                                                    <input name="chk1" class="check_box" type="checkbox"  id="adv_search" value="1">
                                                   <?php getLocalkeyword('Advance your search');?>  </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 pl0"><div id="search_error" style="color:red; font-size:11px;" class="input-group col-md-12"></div></div>
                                    <div class="optional_box">
                                        <div class="row">
                                            <div class="col-md-4">
                                        <!------------------Search By Name & Email----------------------->
                                                
                                                <div <?php if($way=="user"){ ?> style="margin-bottom: 14px; display:block;" <?php } else { ?>style="margin-bottom: 14px; display:none;"<?php } ?>  id="search_11">
                                                    <div class="form-group">
                                                        <div class="input-group"> 
                                                            <select name="selectSearchName[]" id="selectSearchName"  multiple="multiple" style="width:100%;" class="select1 search-query form-control">
                                                                <?php 
                                                                foreach($resultUser as $val)
                                                                {
                                                                ?>
                                                                <option <?php if(in_array($val->vis_id_pk, $user)){ echo "selected"; } ?> value="<?php echo $val->vis_id_pk; ?>"><?php echo $val->vis_firstName ." ".$val->vis_lastName; ?></option>
                                                                <?php
                                                                } 
                                                                ?>
                                                            </select>
                                                            <span class="input-group-btn">
                                                                <button class="btn btn-danger" type="button"> <span class=" glyphicon glyphicon-search"></span> </button>
                                                            </span> </div>
                                                    </div>
                                                    <div class="col-md-12 pl0"><div id="search_by_name_error" style="color:red; font-size:11px;" class="input-group col-md-12"></div></div>
                                                </div>
                                                <!----------------End of search by Name & Email------------------->
                                            </div>
                                        </div>
                                        <!--------------------Search By Group----------------------->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="" <?php if($way=="group"){ ?> style="display:block;" <?php } else { ?>style="display:none;"<?php } ?> id="select_group">
                                                    <div class="form-group">
                                                        <div class="input-group"> 
                                                            <select name="selectSearchGroup[]" id="selectSearchGroup" multiple="multiple" style="width:100%;" class="select1 search-query form-control">
                                                                <?php
                                                                for($i=0;$i<count($resultGroup);$i++)
                                                                {
                                                                ?>
                                                                <option <?php if(in_array($resultGroup[$i]->grp_id_pk, $user)){ echo "selected"; } ?> value="<?php echo $resultGroup[$i]->grp_id_pk;?>"><?php echo $resultGroup[$i]->grp_name;?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                                
                                                            </select>
                                                            <span class="input-group-btn">
                                                                <button class="btn btn-danger" type="button"> <span class=" glyphicon glyphicon-search"></span> </button>
                                                            </span> </div>
                                                    </div>
                                                    <div class="col-md-12 pl0"><div id="search_by_group_error" style="color:red; font-size:11px;" class="input-group col-md-12"></div></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--------------------End of search By group------------------------->
                                        <!------------------Advance Search-------------------------->
                                        <div class="row">
                                            <div class="" style="display:none;" id="advance_form">
                                                <div class="form-group col-md-3"> 
                                                    <select name="searchField1" class=" form-control">
                                                        <option value="option1">Select column name</option>
                                                        <?php
                                                        foreach($resultgetFieldsOptionsAll as $val)
                                                        {
                                                        ?>
                                                        <option class="list-group-item" value="<?php echo $val ?>"><?php echo $val ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-3"> 
                                                    <select name="searchField2" class=" form-control">
                                                        <option value="option1">Select operation</option>
                                                        <?php
                                                        foreach ($resultgetFieldOperation as $key => $val) 
                                                        {
                                                        ?>
                                                        <option class="list-group-item" value="<?php echo $key; ?>"><?php echo $val; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <input type="text"  name="searchField3"  class="  search-query form-control" placeholder="Search by name,email id" />
                                                </div>
                                                <div class="form-group col-md-2"> 
                                                    <select name="example-list" class=" form-control searchField4">
                                                        <option value="option1">Select</option>
                                                        <option value="option2">?</option>
                                                        <option value="option3">And</option>
                                                        <option value="option4">Or</option>
                                                    </select>
                                                </div>
<!--                                                <div class="form-group col-md-1"> 
                                                    <a id="show" class="btn btn-primary" data-title="Add Contact" style="width:34px;">+</a> 
                                                </div>-->
                                                
                                                
                                                <div class="form-group col-md-3"> 
                            
                            <!-- <input type="text" class="  search-query form-control" placeholder="Search by name,email id" />-->
                            
                            <select name="searchField1" class=" form-control searchField1">
                              <option value="">Select column name</option>
                              <?php
                                foreach($resultgetFieldsOptionsAll as $val){
                                  ?>
                                  <option class="list-group-item" value="<?php echo $val ?>"><?php echo $val ?></option>
                                  <?php
                                }
                              ?>
                            </select>
                          </div>
                          <div class="form-group col-md-3"> 
                            
                            <!-- <input type="text" class="  search-query form-control" placeholder="Search by name,email id" />-->
                            
                            <select name="searchField2" class=" form-control searchField2">
                              <option value="">Select operation</option>
                              <?php
                              
                              foreach ($resultgetFieldOperation as $key => $val) {
                                 
                                ?>
                                <option class="list-group-item" value="<?php echo $key; ?>"><?php echo $val; ?></option>
                                <?php
                              }
                              ?>
                            </select>
                          </div>
                          <div class="form-group col-md-3 " >
                            <input type="text" name="searchField3" class="  search-query form-control searchField3" placeholder="Search by name,email id" />
                          </div>
                         <!--  <div class="form-group col-md-1"> <a id="show" class="btn btn-primary" data-title="Add Contact" style="width:34px;">+</a> </div> -->
                         <div class="form-group col-md-3 " class="plus" id="executeButton" style="display:none;">
                          <a   class="btn btn-primary getExecute"  > <?php getLocalkeyword('Execute');?> </a>
                          
                        </div><span id="userCount"></span>
                        <input type="hidden" name="advanceSearchUserId" id="advanceSearchUserId">
                                            </div>
                                            
                       
                                        </div>
                                        <!---------------End of advance search---------------------->
                                    </div>
                                    <div class="row" style="">
                                        <div class="col-md-12">
                                            <div class="input-group col-md-3">
                                                <div class="mt-checkbox-list" style="padding-top: 2px;">
                                                    <label>
                                                        <input type="checkbox" name="non_english" value="1">
                                                       <?php getLocalkeyword('Non English ');?> <span></span> </label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="clearfix"></div>
<!--                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Campaign Name</label>
                                                <input name="campain_name" type="text" id="campain_name" class="form-control" placeholder="Enter Campaign Name">
                                            </div>
                                            <div class="col-md-12 pl0"><div id="campain_error" style="color:red; font-size:11px;" class="input-group col-md-12"></div></div>
                                        </div>-->
                                        
                                        <div class="clearfix"></div>
                                        <div class="col-md-11">
                                            <div class="form-group">
                                                <label><?php getLocalkeyword('Select SMS content from existing template');?></label>
                                                <select name="selectTemplate" id="email_templates" class="form-control smstemplate">
                                                    <option value="">Select SMS Template</option>
                                                  
                                                    
                                                    <?php foreach($resultTemplateReq as $val){
                                                    ?>
                                                    <option value="<?php echo $val->str_id_pk; ?>" data-message="<?php echo $val->str_description; ?>"><?php echo $val->str_template_name; ?></option>
                                                    <?php
                                                    }
                                                  ?>
                            
                            
                            
                            
                                                </select>
                                            </div>
                                            <div class="col-md-12 pl0"><div id="template_error" style="color:red; font-size:11px;" class="input-group col-md-12"></div></div>
                                        </div>
                                        
                                       <div class="input-group col-md-1">

                      <div class="form-group" style="padding-top:30px; text-align:center;"> <b><?php getLocalkeyword('OR');?></b> </div>

                    </div>

                    <div class="col-md-4 form-group">

                      <label> <?php getLocalkeyword('Select SMS Signature');?></label>

                      <select name="selectSignature" class="form-control">

                        <option value="">Select Signature</option>

                       <!--  <option>Option 2</option>

                        <option>Option 3</option>

                        <option>Option 4</option>

                        <option>Option 5</option> -->
                        <?php foreach($resultSmsSignature as $val){
                            ?>
                            <option value="<?php echo $val->sig_id_pk; ?>" <?php if($val->sig_default==1){ echo "selected";  } ?>><?php echo $val->sig_title; ?></option>
                            <?php
                            }
                          ?>

                      </select>

                    </div>

                    <div class="col-md-4 form-group">

                      <label><?php getLocalkeyword('Select your sender Id');?> </label>

                      <select name="selectSenderId" class="form-control ">

                        <option value="">Select Sender</option>

                        <!-- <option>Option 2</option>

                        <option>Option 3</option>

                        <option>Option 4</option>

                        <option>Option 5</option> -->
                         <?php foreach($resultSenders as $val){
                            ?>
                            <option value="<?php echo $val->sid_id_pk; ?>" <?php if($val->sid_default==1){ echo "selected"; } ?>><?php echo $val->sid_content; ?></option>
                            <?php
                            }
                          ?>

                      </select>

                    </div>

                    <div class="col-md-4 form-group">

                      <label><?php getLocalkeyword('Campaign Name');?></label>

                      <input type="text" class="form-control" placeholder="Enter Campaign Name" name="campaignName">

                    </div>

                   
                                        
                                        
                                      
                                        
                                        
                                        
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><?php getLocalkeyword('Enter Message');?></label>
                                                <textarea class="form-control message required" rows="3" id="templateMessage" placeholder="Type Here" style="height: 152px;" name="txtMessage"></textarea>
                                            </div>
                                            <div class="col-md-12 pl0"><div id="message_error" style="color:red; font-size:11px;" class="input-group col-md-12"></div></div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>&nbsp;</label>
                                                    <select class="form-control" id="selfields" name="selfields" onchange="getFieldsOptions(this.value);">
                                                        <option value="basic_fields">Basic Fields</option>
                                                        <option value="contact_details">Contact Details</option>
                                                        <option value="personal_info">Personal Info</option>
                                                        <option value="custom_fields">Custom Fields</option>
                                                  </select>
                                                </div>
                                                <div class="col-md-12">
                                                    <ul class="list-group"  id="get_fields_details" style="height:121px; overflow:auto;cursor: pointer;">
                                                        <li class="list-group-item">Title</li>
                                                        <li class="list-group-item">First Name</li>
                                                        <li class="list-group-item">Middle Name</li>
                                                        <li class="list-group-item">Last Name</li>
                                                        <li class="list-group-item">Mobile Number</li>
                                                        <li class="list-group-item">Email Id</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="col-md-6">
                                                    <label>
                                                        <input name="schedule" type="checkbox" id="schedule" value="1">
                                                       <?php getLocalkeyword('Schedule');?>  <span></span> </label>
                                                        <div class="input-group date form_datetime" id="schedule1" data-date="2012-12-21T15:25:00Z" style=" display:none;">
                                                            <input name="schedule_dt_time" type="text" size="16" readonly class="form-control">
                                                            <span class="input-group-btn">
                                                                <button class="btn default date-reset" type="button" style="margin-right:0px;border-radius:0px;"> <i class="fa fa-times"></i> </button>
                                                                <button class="btn default date-set" type="button" style="margin-right:0px;border-radius:0px !important;"> <i class="fa fa-calendar"></i> </button>
                                                            </span> 
                                                        </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="modal-footer" style="padding:22px 0px;">
                                                        <input type="submit" value="<?php getLocalkeyword('Submit');?>" name="submit" class="btn btn-primary">
                                                        <a href="#" class="btn btn-danger"><?php getLocalkeyword('Cancel');?></a> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <div class="info1">
                                <h3 class="page-title">How to use it?</h3>
                                <p>Phasellus odio. Sed fermentum feugiat quam. Suuspendisse lorem. Morbi commodo vulputate lorem. Vestbum ac diam et eros auctor viverra. Integer adc lorem sit amet est rhoncus dapi bus. </p>
                                <p>Donec congue pede lu lacus. Morbi elit nunc molestie ultricspendisse lorem. Morbi commodo vulputate lorem. Vestbum ac diam et eros auctor viverra. Integer adc lorem sit amet est rhoncus dapi bus. Donec congue pede lu lacus. Morbi elit nunc molestie ultrices eu eleifend eu lorem. Mauris quis dolor Nulla frins gilla interdum metus. Vivamus elementum auctor augue.</p>
                                <p>Phasellus odio. Sed fermentum feugiat quam. Suuspendisse lorem. Morbi commodo vulputate lorem. Vestbum ac diam et eros auctor viverra. Integer adc lorem sit amet est rhoncus dapi bus. Donec congue pede lu lacus. Morbi elit nunc molestie ultricspendisse lorem. Morbi commodo vulputate lorem. </p>
                                <p>Phasellus odio. Sed fermentum feugiat quam. Suuspendisse lorem. Morbi commodo vulputate lorem. Vestbum ac diam et eros auctor viverra. Integer adc lorem sit amet est rhoncus dapi bus. Donec congue pede lu lacus. Morbi elit nunc molestie ultricspendisse lorem. Morbi commodo vulputate lorem. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- END DASHBOARD STATS 1--> 

    </div>
</div>
<script>
      $("#adv_search").click(function () {
        if ($("#adv_search").is(':checked')) {
            $("#adv_search").prop("checked", true);
        $("#chk_group").prop("checked",false );
       $("#chk_email").prop("checked", false);
      $("#advance_form").show();
      $("#executeButton").show();
      $("#search_11").hide();
      $("#select_group").hide();
        } else {
            $("#adv_search").prop("checked", false);
    $("#advance_form").hide();
        }
    }); 
    $(".getExecute").click( function (){
      var searchField1=[];
      var searchField2=[];
      var searchField3=[];
      var searchField4=[];
          for(var i=0;i<2;i++){
            searchField1[i]=$(".searchField1").eq(i).val();
            searchField2[i]=$(".searchField2").eq(i).val();
            searchField3[i]=$(".searchField3").eq(i).val();
            //searchField4[i]=$(".searchField4").eq(i).val();
          }
          var condition1=$(".searchField4").val();
         
          //alert(condition1);
          if($(".searchField1").eq(0).val()===""){
              alert('Select first column name');
          }else if($(".searchField1").eq(1).val()===""){
            alert('Select Second column name');
          }else if($(".searchField2").eq(0).val()===""){
              alert('Select first operator name');
          }else if($(".searchField2").eq(1).val()===""){
            alert('Select second operator name');
          }
          else if( condition1==='' || condition1 === 0){
            alert('Select operator');
          }else if($(".searchField3").eq(0).val() ===""){
            alert('enter first keyword');
          }else if($(".searchField3").eq(1).val() ===""){
            alert('enter second keyword');
          }
          else{


          $.post("<?php echo base_url();?>admin/sms_management/getFilterCount", {
            'searchField1':searchField1, 
            'searchField2':searchField2, 
            'searchField3':searchField3, 
            'searchField4':condition1
        }, function(data) {
          var spdata=data.split('@~~@');
          console.log(data+" "+spdata);
          $("#userCount").html('Total User count is '+spdata[0]);
          $("#advanceSearchUserId").val(spdata[1]);
            
        });
        }
          //console.log(searchField4+"-"+searchField4.length);
          //console.log(searchField1+"-"+searchField2+"-"+searchField3+"-"+searchField4);
    });

   $("#hide").click(function(){
        $(".plus").hide(); 
        //$("#executeButton").show();
        $("#executeButton").hide();
    });
    $("#show").click(function(){
        $(".plus").show(); 
        //$("#executeButton").hide();
        $("#executeButton").show();
    });
$('.smstemplate').on('change', function() {
   //$(".message").val(this.value);
   var selected = $(this).find('option:selected');
       var extra = selected.data('message'); 
  $(".message").val(extra);
})
    function getFieldsOptions(value) 
    {
        var fields_type = value;
        $.post("<?php echo base_url();?>admin/email_management/getFieldsOptions",{type_fields_id: fields_type}, function(data) 
        {
            $("#get_fields_details").html(data);
        });
    }

    
    $(document).ready(function()
    {
        function getEventTarget(e) 
        {
            e = e || window.event;
            return e.target || e.srcElement; 
        }
        var ul = document.getElementById('get_fields_details');
        ul.onclick = function(event) 
        {
            var target = getEventTarget(event);
            var va=target.innerHTML;  
            var cursorPos = $('#templateMessage').prop('selectionStart');
            var v = $('#templateMessage').val();
            var textBefore = v.substring(0,  cursorPos );
            var textAfter  = v.substring( cursorPos, v.length );
            $('#templateMessage').val( textBefore+"##"+va+"##"+textAfter );
        };
    });
    function checkForm()
    {
        clearError();
        var chk_email=document.getElementById("chk_email");
        var chk_group=document.getElementById("chk_group");
        var adv_search=document.getElementById("adv_search");
        var flag=false;
        if(chk_email.checked===true)
        {
            var k=checkSearchByNameEmail();
            if(k)
            {
                flag=true;
            }
            else
            {
                flag=false;
            }
        }
        else if(chk_group.checked===true)
        {
            var k=checkSearchByGroup();
            if(k)
            {
                flag=true;
            }
            else
            {
                flag=false;
            }
        }
        else if(adv_search.checked===true)
        {
            var k=searchAdvance();
            if(k)
            {
                flag=true;
            }
            else
            {
                flag=false;
            }
        }
        else
        {
            $("#search_error").html("Please select any one option from above.");
            flag=false;
        }
        //alert("Flag after 3 options check : "+flag);
        var campaing_flag=false;
        if(checkCampainName())
        {
            campaing_flag=true;
        }
        else
        {
            campaing_flag=false;
        }
        //alert("Campain Flag : "+campaing_flag);
        var email_flag=false;
        if(checkEmailTemplate())
        {
            email_flag=true;
        }
        else
        {
            email_flag=false;
        }
        if(!email_flag && checkTemplate())
        {
            email_flag=true;
        }
        else
        {
            if(email_flag===true)
            {
                email_flag=true;
            }
            else
            {
                email_flag=false;
            }
        }
        //alert("Email Flag : "+email_flag);
        var final_flag=false;
        if(email_flag && campaing_flag && flag)
        {
            final_flag=true;
        }
        else
        {
            final_flag=false;
        }
        return final_flag;
    }
    function clearError()
    {
        $("#search_error").html("");
        $("#search_by_name_error").html("");
        $("#search_by_group_error").html("");
        $("#template_error").html("");
        $("#campain_error").html("");
        $("#message_error").html("");
    }
    function checkSearchByNameEmail()
    {
        var selectSearchName=$("#selectSearchName").val();
        if(selectSearchName===null || selectSearchName.length<=0)
        {
            $("#search_by_name_error").html("Please select users from drop down.");
            return false;
        }
        else
        {
            $("#search_by_name_error").html("");
            return true;
        }
    }
    function checkSearchByGroup()
    {
        var selectSearchGroup=$("#selectSearchGroup").val();
        if(selectSearchGroup===null || selectSearchGroup.length<=0)
        {
            $("#search_by_group_error").html("Please select groups from drop down.");
            return false;
        }
        else
        {
            $("#search_by_group_error").html("");
            return true;
        }
    }
    function searchAdvance()
    {
        return false;
    }
    function checkEmailTemplate()
    {
        var email_templates=$("#email_templates").val();
        if(email_templates.length<=0 || email_templates===null)
        {
            $("#template_error").html("Please select templates from drop down or enter the below template details.");
            return false;
        }
        else
        {
            $("#template_error").html("");
            return true;
        }
    }
    function checkTemplate()
    {
        var flag1=true;
        var txtMessage=$("#templateMessage").val();
        if(txtMessage.length>0)
        {
            $("#template_error").html("");
            $("#message_error").html("");
            flag1=true;
        }
        else
        {
            $("#message_error").html("Please enter email temaplate body.");
            flag1=false;
        }
        return flag1;
    }
    function checkCampainName()
    {
        var flag1=true;
        var campain_name=$("#campain_name").val();
        if(campain_name.length>0)
        {
            $("#campain_error").html("");
            flag1=true;
        }
        else
        {
            $("#campain_error").html("Please enter campain name.");
            flag1=false;
        }
        return flag1;
    }
     $("#CampaignForm").validate({
   rules: {
      selectTemplate: 
      { 
        required: true
      },
      campaignName:
      {
        required: true
      },
      selectSignature:
      {
        required: true
      },
      selectSenderId: {
        required: true
      },
      txtMessage: {
        required: true      
        }
    },
    messages: {
      selectTemplate: 
      {
        required: "Please select template"
      },
      campaignName:{
        required: "Please enter campaign name"
      },
      selectSignature: {
        required: "Please select signature"
      },
      selectSenderId:{
        required: "Please select sender id"
      },
      txtMessage: 
      {
        required: "Please enter message"
        }      
    }
  });
</script>
<script src="<?php echo base_url(); ?>themes/assets/global/scripts/datatable.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>themes/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>themes/assets/global/plugins/jquery.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>themes/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>themes/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>themes/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script> 
<!-- END CORE PLUGINS --> 
<!-- BEGIN PAGE LEVEL PLUGINS --> 
<script src="<?php echo base_url(); ?>themes/assets/global/plugins/morris/raphael-min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>themes/assets/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>themes/assets/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script> 
<!-- BEGIN CORE PLUGINS --> 
<script src="<?php echo base_url(); ?>themes/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>themes/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>themes/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>themes/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script> 
<!-- END CORE PLUGINS --> 
<!-- BEGIN PAGE LEVEL PLUGINS --> 
<script src="<?php echo base_url(); ?>themes/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>themes/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>themes/assets/global/scripts/datatable.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>themes/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>themes/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script> 
<!-- END PAGE LEVEL PLUGINS --> 
<!-- BEGIN THEME GLOBAL SCRIPTS --> 
<script src="<?php echo base_url(); ?>themes/assets/global/scripts/app.min.js" type="text/javascript"></script> 
<!-- END THEME GLOBAL SCRIPTS --> 
<!-- BEGIN PAGE LEVEL SCRIPTS --> 
<script src="<?php echo base_url(); ?>themes/assets/pages/scripts/profile.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>themes/assets/pages/scripts/table-datatables-managed.min.js" type="text/javascript"></script> 
<!-- END PAGE LEVEL SCRIPTS --> 
<!-- BEGIN THEME LAYOUT SCRIPTS --> 
<script src="<?php echo base_url(); ?>themes/assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>themes/assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>themes/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<link href="<?php echo base_url(); ?>themes/assets/jquery.gritter.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url(); ?>themes/assets/pages/scripts/jquery.gritter.min.js" type="text/javascript"></script> 
<script>
    $('#growl-primary').click(function ()
    {
        $("#myModal_m").hide();
        $(".modal-backdrop").removeClass();
        jQuery.gritter.add({
            title: 'Successfully Deleted!',
            class_name: 'growl-primary',
            sticky: false,
            time: ''
        });
        return false;
    });
</script> 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>themes/assets/global/scripts/jquery.multiselect.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>themes/assets/global/scripts/prettify.js"></script> 
<script type="text/javascript">
    $(function () {
        $(".select1").multiselect({
        });
        $(".select1").multiselect({
            selectedText: function (numChecked, numTotal, checkedItems)
            {
                return numChecked + ' of ' + numTotal + ' checked';
            }
        });
        $('#schedule').click(function () {
            if(document.getElementById("schedule").checked===true)
            {
                $("#schedule1").show();
            }
            else
            {
                $("#schedule1").hide();
            }
        });
        $(function ()
        {
            $("#chk_email").click(function ()
            {
                if ($("#chk_email").is(':checked'))
                {
                    $("#chk_email").prop("checked", true);
                    $("#chk_group").prop("checked", false);
                    $("#adv_search").prop("checked", false);
                    $("#search_11").show();
                    $("#select_group").hide();
                    $("#advance_form").hide();
                } else
                {
                    $("#chk_email").prop("checked", false);
                    $("#search_11").hide();
                }
            });
            $("#chk_group").click(function ()
            {
                if ($("#chk_group").is(':checked'))
                {
                    $("#chk_group").prop("checked", true);
                    $("#chk_email").prop("checked", false);
                    $("#adv_search").prop("checked", false);
                    $("#select_group").show();
                    $("#search_11").hide();
                    $("#advance_form").hide();
                } else
                {
                    $("#chk_group").prop("checked", false);
                    $("#select_group").hide();
                }
            });
            $("#adv_search").click(function ()
            {
                if ($("#adv_search").is(':checked'))
                {
                    $("#adv_search").prop("checked", true);
                    $("#chk_group").prop("checked", false);
                    $("#chk_email").prop("checked", false);
                    $("#advance_form").show();
                    $("#search_11").hide();
                    $("#select_group").hide();
                } else
                {
                    $("#adv_search").prop("checked", false);
                    $("#advance_form").hide();
                }
            });
        });
    });
</script> 
<script src="<?php echo base_url(); ?>themes/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>themes/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>themes/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>themes/assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script> 

<!-- div show hide ends here --> 
<!-- END THEME LAYOUT SCRIPTS --> 
<!-- END THEME LAYOUT SCRIPTS -->