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
      .nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
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
</style>


        <div class="page-content-wrapper">
                  <div class="page-content">
                    <div class="row">
                      <div class="col-md-12">
                        <div class=" app-ticket-list">
                          <div class="page-bar row">
                            <div class="col-md-6">
                              <h3 class="page-title"><?php getLocalkeyword('Coupon Mapping');?> 
                              </h3>
                              <ul class="page-breadcrumb ">
                                <li> 
                                  <a href="<?php echo base_url();?>head/dashboard"><?php getLocalkeyword('Home');?>
                                  </a> 
                                  <i class="fa fa-circle">
                                  </i> 
                                </li>
                                <li> 
                                  <a href="<?php echo base_url();?>head/coupon"><?php getLocalkeyword('Coupon Management');?>
                                  </a> 
                                  <i class="fa fa-circle">
                                  </i> 
                                </li>
                                <li> 
                                  <span><?php getLocalkeyword('Coupon Mapping');?>
                                  </span> 
                                </li>
                              </ul>
                            </div>
                            <div class="col-md-6">
                              <div id="reportrange" class="btn pull-right " style="padding-top: 12px;"> 
                                <i class="fa fa-calendar">
                                </i> &nbsp; 
                                <span class="thin uppercase hidden-xs">August 28, 2016 - September 26, 2016
                                </span> 
                                <b class="fa fa-angle-down">
                                </b> 
                              </div>
                            </div>
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
                            <div id="mapping" class="modal fade in" role="dialog" >
                              <div class="modal-dialog"> 
                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">×
                                    </button>
                                    <h2 class="modal-title text-left">
                                      <i class="fa fa-send">
                                      </i>
                                      <?php getLocalkeyword('Coupon Mapping');?>
                                    </h2>
                                  </div>
                                  <div class="modal-body">
                                    <div class="portlet-body form">
                                      <form class="" id="coupon_mapping_form" name="coupon_mapping_form" method="POST" action="<?php echo base_url();?>head/coupon/addCouponMapping">
                                        <div class="form-body">
                                          <div class="col-md-6">
                                            <div class="form-group">
                                              <label class=""><?php getLocalkeyword('Coupon Sr No. From');?>
                                              </label>
                                              <input type="text" class=" input-sm form-control " placeholder="From" id="txtsrnofrom" name="txtsrnofrom" required pattern="[0-9]+">
                                            </div>
                                          </div>
                                          <div class="col-md-6">
                                            <div class="form-group">
                                              <label class=""><?php getLocalkeyword('Coupon Sr. To');?> 
                                              </label>
                                              <input type="text" class=" input-sm form-control " placeholder="To" id="txtsrnoto" name="txtsrnoto" required pattern="[0-9]+">
                                            </div>
                                          </div>
                                          <!-- <div class="col-md-6">
                                            <div class="form-group">
                                              <label class="">Coupon Code  
                                              </label>
                                              <input type="text" class=" input-sm form-control " placeholder="">
                                            </div>
                                          </div> -->
                                          <div class="clearfix">
                                          </div>
                                          <div class="col-md-6">
                                            <div class="form-group">
                                              <label class=""><?php getLocalkeyword('Select System User');?>  
                                              </label>
                                              <select class="form-control" id="selSysUserID" name="selSysUserID" onchange="changeUserValue('SysUser');" required>
                                                <option value="">Select System User</option>
                                                <?php 
                                                  for($su=0;$su<count($system_user);$su++)
                                                  {
                                                ?>
                                                      <option value="<?php echo $system_user[$su]->sysmu_id_pk;?>"><?php echo $system_user[$su]->sysmu_username;?></option>
                                                <?php
                                                  }
                                                ?>
                                              </select>
                                            </div>
                                          </div>
                                          <div class="col-md-1">
                                            <span style="margin-top:30px;position:absolute;">OR<?php //getLocalkeyword('Add Coupon');?>
                                            </span>
                                          </div>
                                          <div class="col-md-5">
                                            <div class="form-group">
                                              <label class=""><?php getLocalkeyword('Select Existing Client');?> 
                                              </label>
                                              <select class="form-control" id="selClientID" name="selClientID" onchange="changeUserValue('Client');" required>
                                                <option value="">Select Client</option>
                                                <?php
                                                  for($cl=0;$cl<count($clients);$cl++)
                                                  {
                                                ?>
                                                        <option value="<?php echo $clients[$cl]->sysu_id_pk;?>"><?php echo $clients[$cl]->sysu_name;?></option>
                                                <?php
                                                  }
                                                ?>
                                              </select>
                                            </div>
                                          </div>            
                                          <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" name="btnSubmit"><?php getLocalkeyword('Save');?></button>
                                            <button type="button" data-dismiss="modal" class="btn btn-danger"><?php getLocalkeyword('Cancel');?></button>
                                          </div>
                                        </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!--end modal-->
                            <div class="col-md-12"> 
                              <div class="table-toolbar">
                                <div class="row">
                                  <div class="col-md-3 ">
                                    <ul class="nav navbar-nav pl0">
                                      <li class="dropdown dropdown-user"> 
                                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" style="font-size:18px;padding: 2px 0px;">Recently updated 
                                          <i class="fa fa-angle-down">
                                          </i> 
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-default">
                                          <li> 
                                            <a href="#">All Contacts
                                            </a> 
                                          </li>
                                          <li> 
                                            <a href="#">My Contacts 
                                            </a> 
                                          </li>
                                          <li> 
                                            <a href="#">Recently viewed
                                            </a> 
                                          </li>
                                          <li> 
                                            <a href="#">Not updated in 30 Days
                                            </a> 
                                          </li>
                                        </ul>
                                      </li>
                                    </ul>
                                  </div>
                                  <?php
                                    if(getAccessRights('mvbCmCmAdd'))
                                    {  
                                  ?>  
                                        <div class="col-md-9">
                                            <div class="pull-right">
                                              <div class="btn-group"> 
                                                <a id="sample_editable_1_new hvr-float-shadow" data-toggle="modal" data-target="#mapping" href="#" class="btn btn-primary">
                                                  <!-- <i class="fa fa-user-plus" title="Add Visitor"></i>  --><?php getLocalkeyword('Map Coupon');?>
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
                                  <a id="selectall"><?php getLocalkeyword('select all');?>
                                  </a>
                                </div>
                                <div class="portlet light">
                                  <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable allchekbox" id="sample_1_2" role="grid" aria-describedby="sample_1_2_info">
                                      <thead>
                                        <tr>
                                          <th style="width: 35px;"> 
                                            <input type="checkbox" id="checkall" data-set="" name="all" />
                                        </label>
                                        </th>
                                      <th> <?php getLocalkeyword('Coupon Assigned To');?> </th>
                                      <th> <?php getLocalkeyword('Name');?> </th>                                      
                                      <th> <?php getLocalkeyword('No. of Coupons');?> </th>
                                      <th> <?php getLocalkeyword('Used Coupons');?> </th>
                                      </tr>
                                    </thead>
                                  <tbody>
                                  <?php 
                                     for($l=0;$l<count($result);$l++)
                                     {
                                              if($result[$l]->cm_sysuser_id_fk==0)
                                              {
                                                      $users_details=$this->coupon_model->getUserDetails($result[$l]->cm_client_id_fk,'client');

                                                      $user_type=$users_details[0]->utyp_userType;

                                                      $user_name=$users_details[0]->user_name;
                                              }
                                              else
                                              {
                                                      $users_details=$this->coupon_model->getUserDetails($result[$l]->cm_sysuser_id_fk,'sysuser');

                                                      $user_type=$users_details[0]->mutyp_userType;

                                                      $user_name=$users_details[0]->user_name;
                                              }
                                  ?>    
                                          <tr class="odd gradeX"><!--id="detail"-->
                                            <td><input name="chk1" class="check_box" type="checkbox" data-ptag="sb1" id="chk1" value="" ></td>
                                            <td><a id="detail" onclick="getCouponDetails(<?php echo $result[$l]->cm_id_pk;?>);"><?php echo $user_type;?></a></td>
                                            <td><?php echo $user_name;?></td>                                      
                                            <td><?php echo $result[$l]->No_of_coupons;?></td>
                                            <td><?php echo $result[$l]->Used_coupons;?></td>
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
        <div class="clearfix">
        </div>
        <!-- END DASHBOARD STATS 1--> 
      </div>
</div>

<div class="page-content-wrapper1">
                      <div class="user_list_box" id="set_coupon_details_div" style="padding-top: 30px;">
                        <!-- <div class="row">
                          <table class="table table-hover table-checkable order-column" id="sample_1" style="width:100% !important;"  >
                            <thead>
                              <tr>
                                <th style="width: 35px;"> 
                                  <input type="checkbox" id="checkall" data-set="" name="all" />
                              </label>
                              </th>
                            <th> Coupon Sr. No.
                            </th>
                            <th> Coupon Date
                            </th>
                            <th> Assign Date
                            </th>
                            <th> Coupon Type
                            </th>
                            <th>Coupon Value
                            </th>
                            <th>Coupon Validity
                            </th>
                            <th>Coupon Start Date,End Status
                            </th>
                            <th>Status
                            </th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr class="odd gradeX">
                              <td>
                                <input name="chk1" class="check_box" type="checkbox" data-ptag="sb1" id="chk1" value="" >
                              </td>
                              <td>100090
                              </td>
                              <td>5 July 2016
                              </td>
                              <td>19 Aug 2016 
                              </td>
                              <td>New Package
                              </td>
                              <td>5000
                              </td>
                              <td>3 month
                              </td>
                              <td>07 Jun 2016 to 7 Aug 2016
                              </td>
                              <td>Unused
                              </td>
                            </tr>
                            <tr class="odd gradeX">
                              <td>
                                <input name="chk1" class="check_box" type="checkbox" data-ptag="sb2" id="chk2" value="">
                              </td>
                              <td>100090
                              </td>
                              <td>5 July 2016
                              </td>
                              <td>19 Aug 2016 
                              </td>
                              <td>New Package
                              </td>
                              <td>5000
                              </td>
                              <td>3 month
                              </td>
                              <td>07 Jun 2016 to 7 Aug 2016
                              </td>
                              <td>Unused
                              </td>
                            </tr>
                          </tbody>
                          </table>
                        </div> -->
                      </div>
</div>


        
<script>
    $( document ).ready(function() {
      $(".page-content-wrapper1").hide();
      $("#detail").click(function(){
        $(".page-content-wrapper").hide();
        $(".page-content-wrapper1").show();
      }
                        );
      $('.hide_element').css('visibility','hidden');
      $('.selected_rows').hide();
    });



var srnofrom = document.getElementById("txtsrnofrom")
  , srnoto = document.getElementById("txtsrnoto");

function validateSrno(){
  if(srnofrom.value > srnoto.value) {
    srnoto.setCustomValidity("Should be greater than sr no. from");
  } else {
    srnoto.setCustomValidity('');
  }
}

srnofrom.onchange = validateSrno;
srnoto.onkeyup = validateSrno;


function changeUserValue(value)
{
      if(value=='Client')
      {
              document.getElementById('selSysUserID').value='';

              document.getElementById('selSysUserID').required=false;
      }
      else
      {
              document.getElementById('selClientID').value='';

              document.getElementById('selClientID').required=false;
      }
}


function getCouponDetails(value)
{       
        $("#set_coupon_details_div").html("<div class=''><br><center><img src='http://e-bri.com/img/src/ajax-loader.gif'></center><br><br></div>");

        $.post("<?php echo base_url().'head/coupon/getSenderIdRecord';?>",{coupon_map_id:value},function(data)
        {                   
 
                    $("#set_coupon_details_div").html("");

                    $("#set_coupon_details_div").html(data);

                    $("#sample_1_2").DataTable();
        });
}


$("#coupon_mapping_form").validate({
          rules:{             
              txtsrnofrom:{
                  required:true
              },              
              txtsrnoto: {
                  required:true
              }
          },
          messages:{                      
              txtsrnofrom:{
                  required:"Please enter sr. no. from"
              },              
              txtsrnoto: {
                  required:"Please enter sr. no to"
              }
          }
        });


</script>