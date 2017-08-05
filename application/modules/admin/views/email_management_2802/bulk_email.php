
    <div class="page-content-wrapper">

      <div class="page-content" style="min-height:591px !important">

        <div class="row">

          <div class="col-md-12">

            <div class=" app-ticket-list">

              <div class="page-bar row">

                <div class="col-md-6">

                  <h3 class="page-title">Send Bulk EMAIL</h3>

                  <ul class="page-breadcrumb ">

                    <li> <a href="index.html">Home</a> <i class="fa fa-circle"></i> </li>

                    <li> <a href="email_manage.html">EMAIL Management</a> <i class="fa fa-circle"></i> </li>

                    <li> <span>Send Bulk EMAIL</span> </li>

                  </ul>

                </div>

                <div class="col-md-6"> </div>

              </div>

              <div class="row">

                <div class="col-md-8">

                  <form role="form" action="<?php echo base_url(); ?>admin/email_management/addCampaign" id="CampaignForm" method="POST">

                    <div class="form-body">

                    <div class="col-md-12 pl0" style="padding-top: 5px;">

                      <div class="input-group col-md-3">

                        <div class="mt-checkbox-list">

            <label>

                          <input name="chk1" class="check_box" type="checkbox"   id="chk_email" value="SearchName">

                            Search by name,email 

              </label>

                        </div>

                      </div>

                      <div class="input-group col-md-1">

                        <div class="form-group" style="padding-top:8px; text-align: left;"> <b>OR</b> </div>

                      </div>

                      <div class="input-group col-md-3">

                        <div class="mt-checkbox-list">

                        <label>

                            <input name="chk1" class="check_box" type="checkbox"   id="chk_group" value="group">

                            Select your Group

              </label>

                        </div>

                      </div>

                      <div class="input-group col-md-1">

                        <div class="form-group" style="padding-top:8px; text-align: left;"> <b>OR</b> </div>

                      </div>

                      <div class="input-group col-md-3">

                        <div class="mt-checkbox-list">
                          <label>
                             <input name="chk1" class="check_box" type="checkbox"   id="adv_search" value="advanceSearch">
                            Advance your search 
              </label>
                        </div>
                      </div>
                    </div>
                   <!-- <div class="input-group col-md-4">
                                                <div class="mt-checkbox-list">
                                                   <label class="mt-checkbox mt-checkbox-outline">
                                                   <input type="checkbox" name="colorCheckbox" value="blue"> Select your Group
                                                   <span></span>
                                                   </label>
                                                </div>
                                                </div> -->
                    <div class="optional_box">
                      <div class="row">
                        <div class="col-md-4">
                          <div style="margin-bottom: 14px; display:none;"  id="search_11">
                            <div class="form-group">
                              <div class="input-group"> 
                                <!-- <input type="text" class="  search-query form-control" placeholder="Search by name,email id" /> name="example-list" -->
                                <select name="selectSearchName[]"  multiple="multiple" style="width:100%;" class="select1 searchCriteria1 search-query form-control">
                                <!--   <option value="option1">Option 1</option>
                                  <option value="option2">Option 2</option>
                                  <option value="option3">Option 3</option>
                                  <option value="option4">Option 4</option>
                                  <option value="option5">Option 5</option>
                                  <option value="option6">Option 6</option>
                                  <option value="option7">Option 7</option> -->
                                   <?php foreach($resultUser as $val){
                                    ?>
                                    <option value="<?php echo $val->vis_id_pk; ?>"><?php echo $val->vis_firstName ." ".$val->vis_lastName; ?></option>
                                    <?php
                                    } ?>
                                </select>

                                <span class="input-group-btn">

                                <button class="btn btn-danger" type="button"> <span class=" glyphicon glyphicon-search"></span> </button>

                                </span> </div>

                            </div>

                          </div>

                        </div>

                      </div>

                      <div class="row"> <?php //print_r($resultgetFieldsOptionsAll); ?>
                          <div class="" style="display:none;" id="advance_form">
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
                            <?php //print_r($resultgetFieldOperation); ?>
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
                          <div class="form-group col-md-2"> 
                            <select name="searchField4" class=" form-control searchField4">
                              <option value="">?</option>
                              <option value="1">And</option>
                              <option value="2">Or</option>
                            </select>
                          </div>
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
                          <a   class="btn btn-primary getExecute"  > Execute </a>
                          
                        </div><span id="userCount"></span>
                        <input type="hidden" name="advanceSearchUserId" id="advanceSearchUserId">
                        </div>
                        
                       
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                        <?php //print_r($resultGroup); ?>
                          <div class="" style="display:none;" id="select_group">
                            <div class="form-group">
                              <div class="input-group"> 
                                <!-- <input type="text" class="  search-query form-control" placeholder="Search by name,email id" /> example-list -->
                                <select name="selectgroup[]" multiple="multiple" style="width:100%;" class="select1 searchCriteria2 search-query form-control">
                                  <!-- <option value="option1">Option 1</option>
                                  <option value="option2">Option 2</option>
                                  <option value="option3">Option 3</option>
                                  <option value="option4">Option 4</option>
                                  <option value="option5">Option 5</option>
                                  <option value="option6">Option 6</option>
                                  <option value="option7">Option 7</option> -->
                                  <?php foreach($resultGroup as $val){
                                    ?>
                                    <option value="<?php echo $val->grp_id_pk; ?>"><?php echo $val->grp_name; ?></option>
                                    <?php
                                    } ?>
                                </select>
                                <span class="input-group-btn">
                                <button class="btn btn-danger" type="button"> <span class=" glyphicon glyphicon-search"></span> </button>
                                </span> </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row" style="">
                    <span id="executeMessage"></span>
                    <div class="col-md-12">
                      <div class="input-group col-md-3">
                        <div class="mt-checkbox-list" style="padding-top: 2px;">
                          <label>
                            <input type="checkbox">
                            Non English <span></span> </label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-11">
                      <div class="form-group ">
                        <label>Select EMAIL content from existing template</label>

                        <select name="selectTemplate" class="form-control smstemplate" >

                           <option value="">Select Template</option>

                          <!--<option>Option 2</option>

                          <option>Option 3</option>

                          <option>Option 4</option>

                          <option>Option 5</option> -->
                          <?php foreach($resultTemplateReq as $val){
                            ?>
                            <option value="<?php echo $val->email_id_pk; ?>" data-message="<?php echo htmlspecialchars($val->email_description); ?>"> <?php echo $val->email_templateName; ?></option>
                            <?php
                            }
                          ?>

                        </select>

                      </div>

                    </div>

                    <div class="input-group col-md-1">

                      <div class="form-group" style="padding-top:30px; text-align:center;"> <b>OR</b> </div>

                    </div>

                    <div class="clearfix"></div>

                    <!-- <div class="col-md-4 form-group">

                      <label>Select EMAIL Signature </label>

                      <select name="selectSignature" class="form-control">

                        <option value="">Select Signature</option>
                        <?php foreach($resultSmsSignature as $val){
                            ?>
                            <option value="<?php echo $val->sig_id_pk; ?>"><?php echo $val->sig_title; ?></option>
                            <?php
                            }
                          ?>

                      </select>

                    </div> -->

                  <!--   <div class="col-md-4 form-group">

                      <label>Select your sender Id </label>

                      <select name="selectSenderId" class="form-control">

                        <option value="">Select Sender</option>

                        
                         <?php foreach($resultSenders as $val){
                            ?>
                            <option value="<?php echo $val->sid_id_pk; ?>" <?php if($val->sid_default==1){ echo "selected"; } ?>><?php echo $val->sid_content; ?></option>
                            <?php
                            }
                          ?>

                      </select>

                    </div> -->

                    <div class="col-md-4 form-group">

                      <label>Campaign Name</label>

                      <input type="text" class="form-control" placeholder="Enter Campaign Name" name="campaignName">

                    </div>
                     <div class="col-md-4 form-group">

                      <label>Subject</label>

                      <input type="text" class="form-control" placeholder="Enter subject" name="subject">

                    </div>
                    <div class="col-md-6">

                      <div class="form-group">

                        <label>Enter Message</label>

                        <textarea class="form-control message required" rows="3" id="templateMessage" placeholder="Type Here" style="height: 152px;" name="txtMessage">



                                                   </textarea>

                      </div>

                    </div>

                    <div class="col-md-6">

                      <div class="row">

                        <div class="col-md-12">

                          <label>&nbsp;</label>
                          <select class="form-control" id="selfields" name="selfields" onchange="getFieldsOptions(this.value);">
                                        <option value="">Select Fields</option>
                                        <option value="basic_fields">Basic Fields</option>
                                        <option value="contact_details">Contact Details</option>
                                        <option value="personal_info">Personal Info</option>
                                        <option value="custom_fields">Custom Fields</option>
                          </select>
                          

                        </div>

                        <div class="col-md-12">

                          <ul class="list-group"  id="get_fields_details" style="height:121px; overflow:auto;cursor: pointer;">

                            <li class="list-group-item">Title </li>

                            <li class="list-group-item">First Name</li>

                            <li class="list-group-item">Middle Name</li>

                            <li class="list-group-item">Last Name</li>

                            <li class="list-group-item">Mobile Number </li>

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

                            <input type="checkbox" id="schedule" name="schedule" value="1">

                            Schedule <span></span> </label>

                         <div class="input-group date form_datetime" id="schedule1" data-date="2012-12-21T15:25:00Z" style=" display:none;">
                         <input type="hidden" name="scheduleDateTime">
                            <input type="text" size="16" readonly class="form-control" name="schedule_dt_time">

                            <span class="input-group-btn">

                            <button class="btn default date-reset" type="button" style="margin-right:0px;border-radius:0px;"> <i class="fa fa-times"></i> </button>

                            <button class="btn default date-set" type="button" style="margin-right:0px;border-radius:0px !important;"> <i class="fa fa-calendar"></i> </button>

                            </span> </div>

                        </div>

                        

                        <div class="col-md-6">

                         <div class="modal-footer" style="padding:22px 0px;">

             

                            <!-- <button type="button" class="btn btn-primary">Save</button> -->
                            <input type="submit" name="save" value="Save" class="btn btn-primary">

                            <a href="<?php echo base_url(); ?>admin/email_management" class="btn btn-danger">Cancel</a> </div>

                        </div>

                      </div>

                    </div>

                  </form>

                </div>

                <div class="col-md-2"></div>

              </div>

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
<script src="<?php echo base_url(); ?>themes/assets/global/scripts/datatable.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>themes/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>themes/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script> 
<!-- 
<script src="../assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>  -->
<script src="<?php echo base_url(); ?>themes/assets/global/scripts/datatable.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>themes/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>themes/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>themes/assets/pages/scripts/profile.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>themes/assets/pages/scripts/table-datatables-managed.min.js" type="text/javascript"></script> 
<link href="<?php echo base_url(); ?>themes/assets/jquery.gritter.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url(); ?>themes/assets/pages/scripts/jquery.gritter.min.js" type="text/javascript"></script> 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script> 
<!-- <script type="text/javascript" src="<?php //echo base_url(); ?>themes/assets/global/scripts/jquery.multiselect.js"></script>  -->
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>themes/assets/global/scripts/prettify.js"></script>  -->
<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>themes/assets/jquery-ui.css" /> -->
<script>

jQuery(document).ready(function(){
  // Start Onclick Text append //  
  function getEventTarget(e) {
        e = e || window.event;
        return e.target || e.srcElement; 
    }

    var ul = document.getElementById('get_fields_details');
    ul.onclick = function(event) {
        var target = getEventTarget(event);
    var va=target.innerHTML;  
        //alert(va);
    var cursorPos = $('#templateMessage').prop('selectionStart');
            var v = $('#templateMessage').val();
            var textBefore = v.substring(0,  cursorPos );
            var textAfter  = v.substring( cursorPos, v.length );
            $('#templateMessage').val( textBefore+"##"+va+"##"+textAfter );
    };
// End Onclick Text append //

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


          $.post("<?php echo base_url();?>admin/email_management/getFilterCount", {
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
        $("#executeButton").show();
        $("#executeButton1").hide();
    });
    $("#show").click(function(){
        $(".plus").show();
        $("#executeButton").hide();
        $("#executeButton1").show();
    });
  jQuery("#CampaignForm").validate({
   rules: {
      selectTemplate: "required",
      campaignName: "required",
      selectSignature: "required",
      selectSenderId: "required",
      txtMessage: "required"
      
    },
    messages: {
      selectTemplate: "Please select template",
      campaignName: "Please enter campaign name",
      selectSignature: "Please select signature",
      selectSenderId: "Please select sender id",
      txtMessage: "Please enter message"
      
    }
  });
  
});
</script>

<script type="text/javascript">
function getFieldsOptions(value) {
        var fields_type = value;

        $.post("<?php echo base_url();?>admin/email_management/getFieldsOptions", {
            type_fields_id: fields_type
        }, function(data) {
            $("#get_fields_details").html(data);
        });
    }


$('.smstemplate').on('change', function() {
   //$(".message").val(this.value);
   var selected = $(this).find('option:selected');
       var extra = selected.data('message'); 
  $(".message").val(extra);
})




$(function(){
  $(".select1").multiselect({

    //selectedList: 4
  });
  $(".select1").multiselect({
   selectedText: function(numChecked, numTotal, checkedItems){
      return numChecked + ' of ' + numTotal + ' checked';
   }
});

 $('#schedule').click(function(){

    $("#schedule1").show();
 });
  $(function () {
    $("#chk_email").click(function () {
        if ($("#chk_email").is(':checked')) {
            $("#chk_email").prop("checked", true);
       $("#chk_group").prop("checked", false);
        $("#adv_search").prop("checked", false);
      $("#search_11").show();
      $("#select_group").hide();
      $("#advance_form").hide();
      $("#advance_form1").hide();
      $(".searchCriteria2").multiselect("uncheckAll");
        } else {
            $("#chk_email").prop("checked", false);
    $("#search_11").hide();
        }
    });
  $("#chk_group").click(function () {
        if ($("#chk_group").is(':checked')) {
            $("#chk_group").prop("checked", true);
     $("#chk_email").prop("checked", false);
       $("#adv_search").prop("checked", false);
      $("#select_group").show();
      $("#search_11").hide();
      $("#advance_form").hide();
      $("#advance_form1").hide();
      $(".searchCriteria1").multiselect("uncheckAll");
        } else {
            $("#chk_group").prop("checked", false);
      $("#select_group").hide();

        }
    });
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
});
});
</script> 

<script src="<?php echo base_url(); ?>themes/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>themes/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>themes/assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>


