<div class="page-content-wrapper">
	<div class="page-content">
		<div class="row">
			<div class="col-md-12">
				<div class=" app-ticket-list">
					<div class="page-bar row">
						<div class="col-md-6">
							<h3 class="page-title"><?php getLocalkeyword('City Management');?></h3>
							<ul class="page-breadcrumb ">
								<li><a href="<?php echo base_url()."head/dashboard ";?>"><?php getLocalkeyword('Home');?></a> <i class="fa fa-circle"></i></li>
								<li><span><a href="<?php echo base_url()."head/location";?>"><?php getLocalkeyword('Location Management');?></a></span> <i class="fa fa-circle"></i></li>
								<li><span><a href="<?php echo base_url()."head/location/getallState/".base64_encode($country_id);?>"><?php getLocalkeyword('State Management');?></a></span> <i class="fa fa-circle"></i></li>
								<li><span><?php getLocalkeyword('City Management');?></span></li>
							</ul>
						</div>
						<div class="col-md-6">
							<div id="reportrange" class="btn pull-right " style="padding-top: 12px;">
								<i class="fa fa-calendar"></i> &nbsp; <span class="thin uppercase hidden-xs">August 28, 2016 - September 26, 2016</span> <b class="fa fa-angle-down"></b>
							</div>
						</div>
					</div>
					<div class="row">
                        <?php if ($this->session->tempdata('success')) { ?>
                        <div id="prefix_834140561262" class="custom-alerts alert alert-success fade in ">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            <?php echo $this->session->tempdata('success');?></div>
                        <?php } else if ($this->session->flashdata('error')) { ?>
                        <div id="prefix_1445089440962" class="custom-alerts alert alert-danger fade in">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            <?php echo $this->session->flashdata('error');?></div>
                        <?php } ?>

                        <!--modal-->
						<div id="addFestival" class="modal fade in" role="dialog">
							<div class="modal-dialog">
								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" onclick="resetCityForm();">×</button>
										<h2 class="modal-title text-left">
											<i class="fa fa-plus"></i> <?php getLocalkeyword('Add City');?>
										</h2>
									</div>
									<div class="modal-body">
										<div class="portlet-body form">
											<form role="form" id="frmAdd" method="post" action="<?php echo base_url()."head/location/addCity"?>">
												<div class="form-body">
													<div class="form-group">
														<label class=""><?php getLocalkeyword('City Name');?></label> <br> <input type="text" name="txtCity" id="txtCity" class="input-sm form-control " placeholder="Enter city name" required="required"> <input type="hidden"
															name="txtCountry" id="txtCountry" class="input-sm form-control " value="<?php echo $country_id;?>"
														> <input type="hidden" name="txtState" id="txtState" class="input-sm form-control " value="<?php echo $state_id;?>">
													</div>
													<div class="modal-footer">
														<button type="submit" name="submit" class="btn btn-primary"><?php getLocalkeyword('Save');?></button>
														<button type="button" data-dismiss="modal" class="btn btn-danger" onclick="resetCityForm();"><?php getLocalkeyword('Cancel');?></button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div id="addFestival1" class="modal fade in" role="dialog">
							<div class="modal-dialog">
								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">×</button>
										<h2 class="modal-title text-left">
											<i class="fa fa-plus"></i> <?php getLocalkeyword('Edit City');?>
										</h2>
									</div>
									<div class="modal-body">
										<div class="portlet-body form">
											<form role="form" id="frmEdit" method="post" action="<?php echo base_url()."head/location/editCity "?>">
												<div class="form-body">
													<div class="form-group">
														<label class=""><?php getLocalkeyword('City Name');?></label> <br> <input type="text" name="txtEditcity" id="txtEditcity" class="input-sm form-control " placeholder="Enter city name" required="required"> <input
															type="hidden" name="txtEditcityid" id="txtEditcityid" class="input-sm form-control "
														> <input type="hidden" name="txtCountry" class="input-sm form-control " value="<?php echo $country_id;?>"> <input type="hidden" name="txtState" class="input-sm form-control "
															value="<?php echo $state_id;?>"
														>
													</div>
													<div class="modal-footer">
														<button type="submit" name="submit" class="btn btn-primary"><?php getLocalkeyword('Save');?></button>
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
 
                        <div id="delete" class="modal fade" role="dialog">

                                    <div class="modal-dialog">

                                        <div class="modal-content">

                                            <div class="modal-header">

                                                <button type="button" class="close" data-dismiss="modal">×</button>

                                                <h2 class="modal-title text-left"> <i class="fa fa-trash"></i> <?php getLocalkeyword('Are you sure to Delete');?>? </h2>

                                            </div>

                                            <div class="modal-body">

                                                <div class="portlet-body form">

                                                    <!-- <form role="form"> -->

                                                        <div class="form-body">
                                                            <div class="row">

                                                                <div class="col-md-12">

                                                                    <div class="modal-footer"> 

                                                                        <a onclick="deleteCity();" class="btn btn-primary"><?php getLocalkeyword('Yes');?></a>

                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><?php getLocalkeyword('No');?></button>

                                                                    </div>

                                                                </div>

                                                            </div>
                                                        </div>

                                                    <!-- </form> -->

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                        </div>

						<div class="col-md-12">
							<div class="table-toolbar">
								<div class="row">
									<div class="col-md-3 ">
										<ul class="nav navbar-nav pl0">
											<li class="dropdown dropdown-user"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"
												style="font-size: 18px; padding: 2px 0px;"
											>Recently updated <i class="fa fa-angle-down"></i>
											</a> <!--                             <ul class="dropdown-menu dropdown-menu-default"> --> <!--                               <li> <a href="#">All Contacts</a> </li> --> <!--                               <li> <a href="#">My Contacts </a> </li> -->
												<!--                               <li> <a href="#">Recently viewed</a> </li> --> <!--                               <li> <a href="#">Not updated in 30 Days</a> </li> --> <!--                             </ul> -->
											</li>
										</ul>
									</div>
									<div class="col-md-5  pull-right">
										<div class="pull-right">
											<div style="float: left; margin-top: 8px; margin-right: 5px;">
                                                                                       <?php if (getAccessRights( 'mvbLocstctEdit')) { ?>
                                                <a href="#" onclick=" get_record()" class="margin_rgt hide_element" style="visibility: hidden;" data-toggle="modal" data-target="#addFestival1"> <i
													class="fa fa-pencil-square-o fa-2x" title="edit" style="color: #828282;"
												></i>
												</a>
                                                                                          <?php } 

                                                                                          if(getAccessRights('mvbLocstctDelete'))
                                                                                         {   
                                                                                         ?>
                                                                                                     <a href="#" data-toggle="modal" data-target="#delete" class="margin_rgt hide_element" style="visibility: hidden;">
								                                     <i class="fa fa-trash fa-2x" title="Delete" style="color: #828282;"></i>
								                                      </a>       
                                                                                        <?php
                                                                                         }
                                                                                         ?>

                                                                                   </div>
											<div class="btn-group">
											<?php
											if(getAccessRights( 'mvbLocstctDownload'))
											{
											?>	
												<a id="sample_editable_1_new hvr-float-shadow" data-toggle="modal" data-target="#otp1" onclick="getOTP('<?php echo $state_id;?>');" class="btn btn-danger"><i
													class="fa fa-cloud-download"
												></i><?php getLocalkeyword('Download City CSV');?></a>
											<?php
											}
											?>
											</div>
                                            <?php if (getAccessRights( 'mvbLocstctAdd')) { ?>
                                            <div class="btn-group">
												<a id="sample_editable_1_new hvr-float-shadow" data-toggle="modal" data-target="#addFestival" class="btn btn-primary"> <!-- <i class="fa fa-user-plus" title="Add Visitor"></i>  -->Add City
												</a>
											</div>
                                            <?php } if (getAccessRights( 'mvbLocstctActivate') || getAccessRights( 'mvbLocstctDeactivate')) { ?>
                                            <ul class="nav navbar-nav pl0 pull-right" style="margin-left: 5px;">
												<li class="dropdown dropdown-user burger_menu"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" style="margin-top: 0px;"><i
														class="fa fa-bars fa-2x" aria-hidden="true"
													></i> </a>	
                                                    <?php if (getAccessRights( 'mvbLocstctActivate') || getAccessRights( 'mvbLocstctDeactivate')) { ?>
                                                    <ul class="dropdown-menu dropdown-menu-default">
                                                        <?php if (getAccessRights( 'mvbLocstctActivate')) { ?>
                                                        <li class="options" style="border-bottom: 1px solid #e7ecf1;"><a href="#" onclick="chechCheckbox(1)" 
															style="padding: 5px; margin-top: 5px;"
														><?php getLocalkeyword('Active');?></a></li>
                                                        <?php } if (getAccessRights( 'mvbLocstctDeactivate')) { ?>
                                                        <li class="options"><a onclick="chechCheckbox(0)" style="padding: 5px; margin-top: 5px;">
                                                        <?php getLocalkeyword('Deactive');?></a></li>
                                                        <?php } ?>
                                                    </ul>
                                                    <?php } ?>
                                                </li>
											</ul>
                                            <?php } ?>

                                            <!-- modal ends -->
										</div>
									</div>
								</div>
								<div class="selected_rows">
								<font id="show_checkbox_selected"></font>
									<a id="selectall"><?php getLocalkeyword('select all');?></a>
								</div>
								<div class="portlet light">
									<div class="portlet-body">
										<!-- <table class="table table-hover table-checkable order-column" id="sample_1" style="width: 100% !important;"> -->
										<table class="table table-striped table-bordered table-hover table-checkable order-column dataTable allchekbox" id="sample_1_2" role="grid" aria-describedby="sample_1_2_info">
											<thead>
												<tr>
													<th style="width: 35px;"><input type="checkbox" id="checkall" data-set="" name="all" /> <span id="growl-primary1"></span> </label></th>
													<th><?php getLocalkeyword('Sr. No');?></th>
													<th><?php getLocalkeyword('Country');?></th>
													<th><?php getLocalkeyword('State');?></th>
													<th><?php getLocalkeyword('City');?></th>
													<th><?php getLocalkeyword('Created Date');?></th>
													<th><?php getLocalkeyword('Created By');?></th>
													<th><?php getLocalkeyword('Modified Date');?></th>
													<th><?php getLocalkeyword('Modified By');?></th>
													<th><?php getLocalkeyword('Status');?></th>
												</tr>
											</thead>
											<tbody>
                                                <?php for($i=0;$i < count($result);$i ++) { $j=$i + 1; ?>
                                                <tr class="odd gradeX">
													<td><input name="chk<?php echo $j;?>" class="check_box" type="checkbox" data-ptag="sb1" id="chk<?php echo $j;?>" value="<?php echo $result[$i]->cty_id_pk;?>"></td>
													<td>
                                                        <?php echo $j;?>
                                                    </td>
													<td>
                                                        <?php echo $result[$i]->cntr_name;?></td>
													<td>
                                                        <?php echo $result[$i]->stat_name;?></td>
													<td>
                                                        <?php echo $result[$i]->cty_name;?>
                                                        <input type="hidden" id="city_list<?php echo $j;?>" value="<?php echo $result[$i]->cty_name; ?>"> <input type="hidden"
														id="city_id<?php echo $j;?>" value="<?php echo $result[$i]->cty_id_pk; ?>"
													>
													</td>
													<td>
                                                        <?php echo date( "d-m-Y H:i:s", strtotime($result[$i]->cty_createdDate));?></td>
													<td>
                                                        <?php echo $result[$i]->created_by;?></td>
													<td>
                                                        <?php echo date( "d-m-Y H:i:s", strtotime($result[$i]->cty_modifiedDate));?></td>
													<td>
                                                        <?php echo $result[$i]->modified_by;?></td>
													<td>
                                                        <?php if ($result[$i]->cty_status == 1) { ?> <span class="label label-sm label-success"> Active </span> 
                                                        <?php } else { ?> <span class="label label-sm label-danger"> Deactive</span> 
                                                        <?php } ?>
                                                    </td>
												</tr>
                                                <?php }?>

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
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="page-content-wrapper1">
            <div id="otp1" class="modal fade in" role="dialog">
                    <div class="modal-dialog">
                    
                        <!-- Modal content-->
                        <div class="modal-content" style="height: 150px;">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">×</button>
                                <h4 class="modal-title text-left"><?php getLocalkeyword('Enter OTP & Verify');?></h4> 
                                <font style="color:green;"><span id="show_send_msg"></span></font>
                            </div>
                            <form id="otp_verify_form" name="otp_verify_form" method="POST" action="<?php echo base_url();?>head/location/verifyExport">
                                <div class="modal-body">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-7 form-group">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label><?php getLocalkeyword('Enter OTP');?></label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control input-sm" id="txtotp" name="txtotp" required pattern="[0-9 ]+">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                     
                                    <input type="hidden" class="form-control input-sm" id="hidden_type" name="hidden_type" value="city_module">
                                    <input type="hidden" class="form-control input-sm" id="hidden_state_id" name="hidden_state_id" value="">  
                                    <a>
                                        <button type="submit" class="btn btn-primary" name="btnSubmit" onclick="reloadPage();"><?php getLocalkeyword('Submit');?></button>
                                    </a>
                                </div>
                            </form>
                        </div>
                    </form>
                    </div>
            </div>
</div>

<script>
function reloadPage(){
	//alert('hello');
	setTimeout(function(){
  location.reload();
}, 2000);
}

    function get_record() {
        var count = <?php echo count($result) ?> ;
        for (var i = 1; i <= count; i++) {
            if ($('#chk' + i).is(':checked')) {
                country = $("#chk" + i).val();
                var txtState = $("#city_list" + i).val();
                var txtStateid = $("#city_id" + i).val();
                $('#txtEditcityid').val(txtStateid);
                $('#txtEditcity').val(txtState);
            }
        }
    }

    function chechCheckbox(id) {
        var count = <?php echo count($result) ?> ;
        var city = [];
        for (var i = 1; i <= count; i++) {
            if ($('#chk' + i).is(':checked')) {
                city.push($("#chk" + i).val());
            }
        }
        if (city.length === 0) {
            alert("Please select the city name");
        } else {
            $.post("<?php echo base_url();?>head/location/changecityStatus", {
                id: id,
                city: city
            }, function(data) {
                location.reload(true);
            });
        }
    }
    $("#frmAdd").validate({
        rules: {
            txtCity: {
                required: true
            }
        },
        messages: {
            txtCity: {
                required: "Please enter city"
            }
        }
    });
    $("#frmEdit").validate({
        rules: {
            txtEditcity: {
                required: true
            }
        },
        messages: {
            txtEditcity: {
                required: "Please enter city"
            }
        }
    });

    $("#otp_verify_form").validate({
                  rules:{             
                      txtotp:{
                          required:true,
                          remote:
                          {
                                  url:"<?php echo base_url();?>head/location/verifyOTP",
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

		function getOTP(state_id)
		{
		            $.post("<?php echo base_url();?>head/location/getOTP",{},function(data)
		            {                                        
		            		$("#hidden_state_id").val(state_id); 
		                    $("#show_send_msg").html('OTP has been sent successfully to your registered mobile number '+data);
		            });
		}

		function deleteCity()
	    {
	                     var count=<?php echo count($result)?>;
	                     var cityid=[];                     
	                     
	                     for (var i=0;i<=count;i++)
	                     {
	                          if($('#chk'+i).is(':checked'))
	                          {
	                              cityid.push($("#chk"+i).val());                              
	                          }
	                     } 
	                                          
	                    $.post("<?php echo base_url();?>head/location/deleteCity",{city_id:cityid},function(data){                            
	                              location.reload(true);
	                         });                                                 
	    } 


	    function resetCityForm()
	    {
	    		$("#txtCity").val('');
	    		$("#frmAdd").validate().resetForm();
	    }


</script>
<a href="javascript:;" class="page-quick-sidebar-toggler"> <i class="icon-login"></i>
</a>
<div class="page-quick-sidebar-wrapper" data-close-on-body-click="false">
	<div class="page-quick-sidebar">
		<ul class="nav nav-tabs">
			<li class="active"><a href="javascript:;" data-target="#quick_sidebar_tab_1" data-toggle="tab"> Users <span class="badge badge-danger">2</span>
			</a></li>
			<li><a href="javascript:;" data-target="#quick_sidebar_tab_2" data-toggle="tab"> Alerts <span class="badge badge-success">7</span>
			</a></li>
			<li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> More <i class="fa fa-angle-down"></i>
			</a>
				<ul class="dropdown-menu pull-right">
					<li><a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab"> <i class="icon-bell"></i> Alerts
					</a></li>
					<li><a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab"> <i class="icon-info"></i> Notifications
					</a></li>
					<li><a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab"> <i class="icon-speech"></i> Activities
					</a></li>
					<li class="divider"></li>
					<li><a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab"> <i class="icon-settings"></i> Settings
					</a></li>
				</ul></li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane active page-quick-sidebar-chat" id="quick_sidebar_tab_1">
				<div class="page-quick-sidebar-chat-users" data-rail-color="#ddd" data-wrapper-class="page-quick-sidebar-list">
					<h3 class="list-heading">Staff</h3>
					<ul class="media-list list-items">
						<li class="media">
							<div class="media-status">
								<span class="badge badge-success">8</span>
							</div> <img class="media-object" src="../assets/layouts/layout/img/avatar3.jpg" alt="...">
							<div class="media-body">
								<h4 class="media-heading">Bob Nilson</h4>
								<div class="media-heading-sub">Project Manager</div>
							</div>
						</li>
						<li class="media"><img class="media-object" src="../assets/layouts/layout/img/avatar1.jpg" alt="...">
							<div class="media-body">
								<h4 class="media-heading">Nick Larson</h4>
								<div class="media-heading-sub">Art Director</div>
							</div></li>
						<li class="media">
							<div class="media-status">
								<span class="badge badge-danger">3</span>
							</div> <img class="media-object" src="../assets/layouts/layout/img/avatar4.jpg" alt="...">
							<div class="media-body">
								<h4 class="media-heading">Deon Hubert</h4>
								<div class="media-heading-sub">CTO</div>
							</div>
						</li>
						<li class="media"><img class="media-object" src="../assets/layouts/layout/img/avatar2.jpg" alt="...">
							<div class="media-body">
								<h4 class="media-heading">Ella Wong</h4>
								<div class="media-heading-sub">CEO</div>
							</div></li>
					</ul>
					<h3 class="list-heading">Customers</h3>
					<ul class="media-list list-items">
						<li class="media">
							<div class="media-status">
								<span class="badge badge-warning">2</span>
							</div> <img class="media-object" src="../assets/layouts/layout/img/avatar6.jpg" alt="...">
							<div class="media-body">
								<h4 class="media-heading">Lara Kunis</h4>
								<div class="media-heading-sub">CEO, Loop Inc</div>
								<div class="media-heading-small">Last seen 03:10 AM</div>
							</div>
						</li>
						<li class="media">
							<div class="media-status">
								<span class="label label-sm label-success">new</span>
							</div> <img class="media-object" src="../assets/layouts/layout/img/avatar7.jpg" alt="...">
							<div class="media-body">
								<h4 class="media-heading">Ernie Kyllonen</h4>
								<div class="media-heading-sub">
									Project Manager, <br>SmartBizz PTL
								</div>
							</div>
						</li>
						<li class="media"><img class="media-object" src="../assets/layouts/layout/img/avatar8.jpg" alt="...">
							<div class="media-body">
								<h4 class="media-heading">Lisa Stone</h4>
								<div class="media-heading-sub">CTO, Keort Inc</div>
								<div class="media-heading-small">Last seen 13:10 PM</div>
							</div></li>
						<li class="media">
							<div class="media-status">
								<span class="badge badge-success">7</span>
							</div> <img class="media-object" src="../assets/layouts/layout/img/avatar9.jpg" alt="...">
							<div class="media-body">
								<h4 class="media-heading">Deon Portalatin</h4>
								<div class="media-heading-sub">CFO, H&D LTD</div>
							</div>
						</li>
						<li class="media"><img class="media-object" src="../assets/layouts/layout/img/avatar10.jpg" alt="...">
							<div class="media-body">
								<h4 class="media-heading">Irina Savikova</h4>
								<div class="media-heading-sub">CEO, Tizda Motors Inc</div>
							</div></li>
						<li class="media">
							<div class="media-status">
								<span class="badge badge-danger">4</span>
							</div> <img class="media-object" src="../assets/layouts/layout/img/avatar11.jpg" alt="...">
							<div class="media-body">
								<h4 class="media-heading">Maria Gomez</h4>
								<div class="media-heading-sub">Manager, Infomatic Inc</div>
								<div class="media-heading-small">Last seen 03:10 AM</div>
							</div>
						</li>
					</ul>
				</div>
				<div class="page-quick-sidebar-item">
					<div class="page-quick-sidebar-chat-user">
						<div class="page-quick-sidebar-nav">
							<a href="javascript:;" class="page-quick-sidebar-back-to-list"> <i class="icon-arrow-left"></i>Back
							</a>
						</div>
						<div class="page-quick-sidebar-chat-user-messages">
							<div class="post out">
								<img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
								<div class="message">
									<span class="arrow"></span> <a href="javascript:;" class="name">Bob Nilson</a> <span class="datetime">20:15</span> <span class="body"> When could you send me the report ? </span>
								</div>
							</div>
							<div class="post in">
								<img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />
								<div class="message">
									<span class="arrow"></span> <a href="javascript:;" class="name">Ella Wong</a> <span class="datetime">20:15</span> <span class="body"> Its almost done. I will be sending it shortly </span>
								</div>
							</div>
							<div class="post out">
								<img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
								<div class="message">
									<span class="arrow"></span> <a href="javascript:;" class="name">Bob Nilson</a> <span class="datetime">20:15</span> <span class="body"> Alright. Thanks! :) </span>
								</div>
							</div>
							<div class="post in">
								<img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />
								<div class="message">
									<span class="arrow"></span> <a href="javascript:;" class="name">Ella Wong</a> <span class="datetime">20:16</span> <span class="body"> You are most welcome. Sorry for the delay. </span>
								</div>
							</div>
							<div class="post out">
								<img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
								<div class="message">
									<span class="arrow"></span> <a href="javascript:;" class="name">Bob Nilson</a> <span class="datetime">20:17</span> <span class="body"> No probs. Just take your time :) </span>
								</div>
							</div>
							<div class="post in">
								<img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />
								<div class="message">
									<span class="arrow"></span> <a href="javascript:;" class="name">Ella Wong</a> <span class="datetime">20:40</span> <span class="body"> Alright. I just emailed it to you. </span>
								</div>
							</div>
							<div class="post out">
								<img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
								<div class="message">
									<span class="arrow"></span> <a href="javascript:;" class="name">Bob Nilson</a> <span class="datetime">20:17</span> <span class="body"> Great! Thanks. Will check it right away. </span>
								</div>
							</div>
							<div class="post in">
								<img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />
								<div class="message">
									<span class="arrow"></span> <a href="javascript:;" class="name">Ella Wong</a> <span class="datetime">20:40</span> <span class="body"> Please let me know if you have any comment. </span>
								</div>
							</div>
							<div class="post out">
								<img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
								<div class="message">
									<span class="arrow"></span> <a href="javascript:;" class="name">Bob Nilson</a> <span class="datetime">20:17</span> <span class="body"> Sure. I will check and buzz you if anything needs to be
										corrected. </span>
								</div>
							</div>
						</div>
						<div class="page-quick-sidebar-chat-user-form">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Type a message here...">
								<div class="input-group-btn">
									<button type="button" class="btn green">
										<i class="icon-paper-clip"></i>
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane page-quick-sidebar-alerts" id="quick_sidebar_tab_2">
				<div class="page-quick-sidebar-alerts-list">
					<h3 class="list-heading">General</h3>
					<ul class="feeds list-items">
						<li>
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-info">
											<i class="fa fa-check"></i>
										</div>
									</div>
									<div class="cont-col2">
										<div class="desc">
											You have 4 pending tasks. <span class="label label-sm label-warning "> Take action <i class="fa fa-share"></i>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date">Just now</div>
							</div>
						</li>
						<li><a href="javascript:;">
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-success">
												<i class="fa fa-bar-chart-o"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc">Finance Report for year 2013 has been released.</div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date">20 mins</div>
								</div>
						</a></li>
						<li>
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-danger">
											<i class="fa fa-user"></i>
										</div>
									</div>
									<div class="cont-col2">
										<div class="desc">You have 5 pending membership that requires a quick review.</div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date">24 mins</div>
							</div>
						</li>
						<li>
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-info">
											<i class="fa fa-shopping-cart"></i>
										</div>
									</div>
									<div class="cont-col2">
										<div class="desc">
											New order received with <span class="label label-sm label-success"> Reference Number: DR23923 </span>
										</div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date">30 mins</div>
							</div>
						</li>
						<li>
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-success">
											<i class="fa fa-user"></i>
										</div>
									</div>
									<div class="cont-col2">
										<div class="desc">You have 5 pending membership that requires a quick review.</div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date">24 mins</div>
							</div>
						</li>
						<li>
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-info">
											<i class="fa fa-bell-o"></i>
										</div>
									</div>
									<div class="cont-col2">
										<div class="desc">
											Web server hardware needs to be upgraded. <span class="label label-sm label-warning"> Overdue </span>
										</div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date">2 hours</div>
							</div>
						</li>
						<li><a href="javascript:;">
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-default">
												<i class="fa fa-briefcase"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc">IPO Report for year 2013 has been released.</div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date">20 mins</div>
								</div>
						</a></li>
					</ul>
					<h3 class="list-heading">System</h3>
					<ul class="feeds list-items">
						<li>
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-info">
											<i class="fa fa-check"></i>
										</div>
									</div>
									<div class="cont-col2">
										<div class="desc">
											You have 4 pending tasks. <span class="label label-sm label-warning "> Take action <i class="fa fa-share"></i>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date">Just now</div>
							</div>
						</li>
						<li><a href="javascript:;">
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-danger">
												<i class="fa fa-bar-chart-o"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc">Finance Report for year 2013 has been released.</div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date">20 mins</div>
								</div>
						</a></li>
						<li>
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-default">
											<i class="fa fa-user"></i>
										</div>
									</div>
									<div class="cont-col2">
										<div class="desc">You have 5 pending membership that requires a quick review.</div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date">24 mins</div>
							</div>
						</li>
						<li>
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-info">
											<i class="fa fa-shopping-cart"></i>
										</div>
									</div>
									<div class="cont-col2">
										<div class="desc">
											New order received with <span class="label label-sm label-success"> Reference Number: DR23923 </span>
										</div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date">30 mins</div>
							</div>
						</li>
						<li>
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-success">
											<i class="fa fa-user"></i>
										</div>
									</div>
									<div class="cont-col2">
										<div class="desc">You have 5 pending membership that requires a quick review.</div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date">24 mins</div>
							</div>
						</li>
						<li>
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-warning">
											<i class="fa fa-bell-o"></i>
										</div>
									</div>
									<div class="cont-col2">
										<div class="desc">
											Web server hardware needs to be upgraded. <span class="label label-sm label-default "> Overdue </span>
										</div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date">2 hours</div>
							</div>
						</li>
						<li><a href="javascript:;">
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-info">
												<i class="fa fa-briefcase"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc">IPO Report for year 2013 has been released.</div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date">20 mins</div>
								</div>
						</a></li>
					</ul>
				</div>
			</div>
			<div class="tab-pane page-quick-sidebar-settings" id="quick_sidebar_tab_3">
				<div class="page-quick-sidebar-settings-list">
					<h3 class="list-heading">General Settings</h3>
					<ul class="list-items borderless">
						<li>Enable Notifications <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF">
						</li>
						<li>Allow Tracking <input type="checkbox" class="make-switch" data-size="small" data-on-color="info" data-on-text="ON" data-off-color="default" data-off-text="OFF">
						</li>
						<li>Log Errors <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF">
						</li>
						<li>Auto Sumbit Issues <input type="checkbox" class="make-switch" data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF">
						</li>
						<li>Enable SMS Alerts <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF">
						</li>
					</ul>
					<h3 class="list-heading">System Settings</h3>
					<ul class="list-items borderless">
						<li>Security Level <select class="form-control input-inline input-sm input-small">
								<option value="1">Normal</option>
								<option value="2" selected>Medium</option>
								<option value="e">High</option>
						</select>
						</li>
						<li>Failed Email Attempts <input class="form-control input-inline input-sm input-small" value="5" />
						</li>
						<li>Secondary SMTP Port <input class="form-control input-inline input-sm input-small" value="3560" />
						</li>
						<li>Notify On System Error <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF">
						</li>
						<li>Notify On SMTP Error <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF">
						</li>
					</ul>
					<div class="inner-content">
						<button class="btn btn-success">
							<i class="icon-settings"></i> Save Changes
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>