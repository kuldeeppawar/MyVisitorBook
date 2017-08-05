<div class="page-content-wrapper">
	<div class="page-content">
		<div class="row">
			<div class="col-md-12">
				<div class=" app-ticket-list">
					<div class="page-bar row">
						<div class="col-md-6">
							<h3 class="page-title"><?php getLocalkeyword('Keyword Local Word Management');?></h3>
							<ul class="page-breadcrumb ">
								<li><a href="<?php echo base_url()."head/dashboard ";?>"><?php getLocalkeyword('Home');?></a> <i class="fa fa-circle"></i></li>
							   <li><span> <a href="<?php echo base_url()."head/localization";?>"><?php getLocalkeyword('Localization Management');?> </a>
							
								<li><span><?php getLocalkeyword('Keyword Local Word Management');?></span></li>
							</ul>
						</div>
						<div class="col-md-6">
							<div id="reportrange" class="btn pull-right " style="padding-top: 12px;"> <i class="fa fa-calendar"></i> &nbsp; <span class="thin uppercase hidden-xs">August 28, 2016 - September 26, 2016</span> <b class="fa fa-angle-down"></b> </div>
						</div>
					</div>
					<div class="row">
						<?php
					
					if ($this->session->flashdata('success'))
					{
						?>
							<div id="prefix_834140561262" class="custom-alerts alert alert-success fade in "> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
								<?php echo $this->session->flashdata('success');?>
							</div>
							<?php
					} else if ($this->session->flashdata('error'))
					{
						?>
								<div id="prefix_1445089440962" class="custom-alerts alert alert-danger fade in"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
									<?php echo $this->session->flashdata('error');?>
								</div>
								<?php
					}
					
					?>
								<!--modal-->
								<div id="addFestival" class="modal fade in" role="dialog">
									<div class="modal-dialog">
										<!-- Modal content-->
										<div class="modal-content">
											<div class="modal-header"> <button type="button" class="close" data-dismiss="modal">×</button>
												<h2 class="modal-title text-left"> <i class="fa fa-plus"></i><?php getLocalkeyword('Add Local Keyword');?>  </h2>
											</div>
											<div class="modal-body">
												<div class="portlet-body form">
													<form role="form" id="frmAdd" method="post" action="<?php echo base_url()."head/localization/addlocalKeyword "?>">
														<div class="form-body">
														   <div class="form-group"> <label class=""><?php getLocalkeyword('Language');?></label> <br> 
															<select class="input-sm form-control" name="selLanguage" id="selLanguage">
															 <option value=''>Select</option>
															 <?php 
															  for($i=0;$i<count($resultLanguage);$i++)
															  {
															  	?>
															  	<option value="<?php echo $resultLanguage[$i]->lng_id_pk;?>"><?php echo $resultLanguage[$i]->lng_name;?></option>
															  	<?php 
															  }
															 ?>
															
															</select>
																</div>
															
															
															<div class="form-group"> <label class=""><?php getLocalkeyword('Keyword Name');?></label> <br> 
															<input type="text" name="keyword" class="input-sm form-control " placeholder="insert Keyword" required="required"> 
															<input type="hidden" name="keyword_id" value="<?php echo $id;?>">
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
								<div id="addFestival1" class="modal fade in" role="dialog">
									<div class="modal-dialog">
										<!-- Modal content-->
										<div class="modal-content">
											<div class="modal-header"> <button type="button" class="close" data-dismiss="modal">×</button>
												<h2 class="modal-title text-left"> <i class="fa fa-plus"></i> <?php getLocalkeyword('Edit Keyword');?> </h2>
											</div>
											<div class="modal-body">
												<div class="portlet-body form">
													<form role="form" method="post" id="frmEdit" action="<?php echo base_url()."head/localization/editlocalKeyword "?>">
														<div class="form-body">
															<div class="form-group"> <label class=""><?php getLocalkeyword('Keyword Name');?></label> <br> 
															<input type="text" name="txtEditkeyword" id="txtEditkeyword" class="input-sm form-control " placeholder="insert Keyword" required="required"> 
															 <input type="hidden" name="txtEditkeywordid" id="txtEditkeywordid" class="input-sm form-control "> </div>
															 <input type="hidden" name="keyword_id" value="<?php echo $id;?>">
															<div class="modal-footer"> <button type="submit" name="submit" class="btn btn-primary"><?php getLocalkeyword('Save');?></button> 
															<button type="button" data-dismiss="modal" class="btn btn-danger"><?php getLocalkeyword('Cancel');?></button> </div>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!--end modal-->
								  <div id="otpimport" class="modal fade in" role="dialog">
												<div class="modal-dialog">
													<!-- Modal content-->
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">×</button>
															<h4 class="modal-title text-left"><?php getLocalkeyword('Enter OTP Here');?></h4>
														</div>
														<div class="modal-body">
															<div class="col-md-2"></div>
															<div class="col-md-7 form-group">
																<div class="row">
																	<div class="col-md-4">
																		<label><?php getLocalkeyword('Enter OPT');?></label>
																	</div>
																	<div class="col-md-8">
																		<input type="password" name="txtOtpimport" id="txtOtpimport"  class="form-control input-sm">
																	</div>
																</div>
															</div>
															<div class="col-md-2"></div>
															<a href="#" onclick="validateOtp('0')">
															<button type="button" class="btn btn-primary"><?php getLocalkeyword('Submit');?></button></a>
														</div>
														<div class="modal-footer"></div>
													</div>
												</div>
								       </div>
										    
										    <!--  Enter Otp Model-->
										    <div id="otp" class="modal fade in" role="dialog">
												<div class="modal-dialog">
													<!-- Modal content-->
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">×</button>
															<h4 class="modal-title text-left"><?php getLocalkeyword('Enter OTP Here');?></h4>
														</div>
														<div class="modal-body">
															<div class="col-md-2"></div>
															<div class="col-md-7 form-group">
																<div class="row">
																	<div class="col-md-4">
																		<label><?php getLocalkeyword('Enter OPT');?></label>
																	</div>
																	<div class="col-md-8">
																		<input type="password" name="txtOtp" id="txtOtp"  class="form-control input-sm">
																	</div>
																</div>
															</div>
															<div class="col-md-2"></div>
															<a href="#" onclick="validateOtp('1')"><button type="button" class="btn btn-primary"><?php getLocalkeyword('Submit');?></button></a>
														</div>
														<div class="modal-footer"></div>
													</div>
												</div>
											</div>
											
											<div id="import" class="modal fade" role="dialog">
												<div class="modal-dialog">
													<div class="col-md-10">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h2 class="modal-title text-left"><?php getLocalkeyword('Upload CSV');?></h2>
															</div>
															<div class="modal-body">
																<div class="portlet-body form">
																	<form role="form"  action="<?php echo base_url()?>head/localization/uploadkeywordCsv" method="post" enctype="multipart/form-data">
																		<div class="form-body">
																			<div class="row">
																				<div class="col-md-12">
																					<div class="form-group">
																						<label><?php getLocalkeyword('Upload CSV file');?><span class="mandatory"></span></label>
																						 <input type="file" id="txtFile" name="txtFile" required="required" accept=".csv">
																					</div>
																				
																					<a onclick="getSamplecsv1()" href="#"><?php getLocalkeyword('Download Sample CSV');?></a>
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
								<div class="col-md-12">
									<div class="table-toolbar">
										<div class="row">
											<div class="col-md-3 ">
												<ul class="nav navbar-nav pl0">
													<li class="dropdown dropdown-user"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" style="font-size: 18px; padding: 2px 0px;">Recently updated <i class="fa fa-angle-down"></i>
											</a>
														<!--                             <ul class="dropdown-menu dropdown-menu-default"> -->
														<!--                               <li> <a href="#">All Contacts</a> </li> -->
														<!--                               <li> <a href="#">My Contacts </a> </li> -->
														<!--                               <li> <a href="#">Recently viewed</a> </li> -->
														<!--                               <li> <a href="#">Not updated in 30 Days</a> </li> -->
														<!--                             </ul> -->
													</li>
												</ul>
											</div>
											<div class="col-md-5  pull-right">
												<div class="pull-right">
													<div style="float: left; margin-top: 8px; margin-right: 5px;">
											
<!-- 											<a href="#" class="p_element111" data-toggle="modal" data-target="#otpimport">  </a>  -->
											  <span class="p_element111">/</span> 
<!-- 											<a href="#" class="p_element111" data-toggle="modal" data-target="#otp">  -->
											 <?php //<?php getLocalkeyword('Import');getLocalkeyword('Export');?>
<!-- 										   </a> -->
											<?php
											
											if (getAccessRights('mvbLozEdit'))
											{
												?>
															<a href="#" onclick=" get_record()" class="margin_rgt hide_element" style="visibility: hidden;" data-toggle="modal" data-target="#addFestival1"> <i class="fa fa-pencil-square-o fa-2x" title="edit" style="color: #828282;"></i></a>
															<?php
											}
											?> </div>
											<?php
											if (getAccessRights('mvbLozAdd'))
											{
												?>
														<div class="btn-group"> <a id="sample_editable_1_new hvr-float-shadow" data-toggle="modal" data-target="#addFestival" class="btn btn-primary"><?php getLocalkeyword('Add Keyword');?></a> </div>
														<?php
											}
												?>
										
															<!-- modal ends -->
												</div>
											</div>
										</div>
										<div class="selected_rows"> <a id="selectall"><?php getLocalkeyword('select all');?></a> </div>
										<div class="portlet light">
											<div class="portlet-body">
												<table class="table table-striped table-bordered table-hover table-checkable order-column dataTable allchekbox" id="sample_1_2" role="grid" aria-describedby="sample_1_2_info">
													<thead>
														<tr>
															<th style="width: 35px;"><input type="checkbox" id="checkall" data-set="" name="all" /> <span id="growl-primary1"></span> </label>
															</th>
															<th><?php getLocalkeyword('Sr.No');?></th>
															<th><?php getLocalkeyword('Language');?></th>
															<th><?php getLocalkeyword('Keyword');?></th>
															
														</tr>
													</thead>
													<tbody>
														<?php
															for($i=0;$i < count($result);$i ++)
															{
																
																$j=$i + 1;
																?>
																			<tr class="odd gradeX">
																				<td><input name="chk<?php echo $j;?>" class="check_box" type="checkbox" data-ptag="sb1" id="chk<?php echo $j;?>" value="<?php echo $result[$i]->localise_id_pk;?>"></td>
																				<td><?php echo $j;?> </td>
																				<td><?php echo $result[$i]->lng_name;?> </td>
																				<td><?php echo $result[$i]->localise_keyword;?> 
																				<input type="hidden" id="keyword_list<?php echo $j;?>" value="<?php echo $result[$i]->localise_keyword; ?>"> 
																				<input type="hidden" id="keyword_id<?php echo $j;?>" value="<?php echo $result[$i]->localise_id_pk; ?>"></td>
																				
																			
																			
																			</tr>
															<?php }?> </tbody>
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
<script>
function get_record() {
	var count = <?php echo count($result)?>;
	var country;
	for (var i = 1; i <= count; i++) {
		if ($('#chk' + i).is(':checked')) {
			country = $("#chk" + i).val();
			var txtCountry = $("#keyword_list" + i).val();
			var txtCountryid = $("#keyword_id" + i).val();
			$('#txtEditkeywordid').val(txtCountryid);
			$('#txtEditkeyword').val(txtCountry);
		}
	}
}


function getSamplecsv1()
{  <?php $url= base_url().'uploads/csvsample/localkeywordsample.csv';?>
	window.open("<?php echo  $url;?>", "_blank");
}
function validateOtp(val)
{

    var activePassword=$("#txtOtp").val();
    var Password1=$("#txtOtpimport").val();
  

     if(val=="1" && activePassword!="")
     {
           var Password=activePassword;
     	   $.post("<?php echo base_url();?>head/localization/validateOtp",{Password},function(data){
                    if(data==1)
                    {
                    	window.open("<?php echo  base_url();?>head/localization/getKeywordcsv", "_blank");
                    	$('#otp').modal('hide');
                    	
                        }
                    else
                    {
                           alert("OTP MisMatch");
                        }
                });


         }
     else if(val=="0" && Password1!="")
     {
           var Password=Password1;
       
     	   $.post("<?php echo base_url();?>head/localization/validateOtp",{Password},function(data){
                    if(data==1)
                    {
                    	$('#otpimport').modal('hide');
                    	$('#import').modal('show');
                    	
                    	
                        }
                    else
                    {
                           alert("OTP MisMatch");
                        }
                });


         }
  
     else
     {
          alert("ENTER PASSWORD");
         }
	     
	
 }




$("#frmAdd").validate({
	rules: {
		keyword: {
			required: true
		},
		selLanguage: {
			required: true
		}
	},
	messages: {
		keyword: {
			required: "Please Enter Keyword"
		},
		selLanguage: {
			required: "Please Select language"
		}
		
	}
});
$("#frmEdit").validate({
	rules: {
		txtEditkeyword: {
			required: true
		}
	},
	messages: {
		txtEditkeyword: {
			required: "Please Enter Keyword"
		}
	}
});
</script>
<a href="javascript:;" class="page-quick-sidebar-toggler"> <i class="icon-login"></i></a>
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
					<li>
						<a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab"> <i class="icon-bell"></i> Alerts </a>
					</li>
					<li>
						<a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab"> <i class="icon-info"></i> Notifications </a>
					</li>
					<li>
						<a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab"> <i class="icon-speech"></i> Activities </a>
					</li>
					<li class="divider"></li>
					<li>
						<a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab"> <i class="icon-settings"></i> Settings </a>
					</li>
				</ul>
			</li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane active page-quick-sidebar-chat" id="quick_sidebar_tab_1">
				<div class="page-quick-sidebar-chat-users" data-rail-color="#ddd" data-wrapper-class="page-quick-sidebar-list">
					<h3 class="list-heading">Staff</h3>
					<ul class="media-list list-items">
						<li class="media">
							<div class="media-status"> <span class="badge badge-success">8</span> </div> <img class="media-object" src="../assets/layouts/layout/img/avatar3.jpg" alt="...">
							<div class="media-body">
								<h4 class="media-heading">Bob Nilson</h4>
								<div class="media-heading-sub">Project Manager</div>
							</div>
						</li>
						<li class="media"><img class="media-object" src="../assets/layouts/layout/img/avatar1.jpg" alt="...">
							<div class="media-body">
								<h4 class="media-heading">Nick Larson</h4>
								<div class="media-heading-sub">Art Director</div>
							</div>
						</li>
						<li class="media">
							<div class="media-status"> <span class="badge badge-danger">3</span> </div> <img class="media-object" src="../assets/layouts/layout/img/avatar4.jpg" alt="...">
							<div class="media-body">
								<h4 class="media-heading">Deon Hubert</h4>
								<div class="media-heading-sub">CTO</div>
							</div>
						</li>
						<li class="media"><img class="media-object" src="../assets/layouts/layout/img/avatar2.jpg" alt="...">
							<div class="media-body">
								<h4 class="media-heading">Ella Wong</h4>
								<div class="media-heading-sub">CEO</div>
							</div>
						</li>
					</ul>
					<h3 class="list-heading">Customers</h3>
					<ul class="media-list list-items">
						<li class="media">
							<div class="media-status"> <span class="badge badge-warning">2</span> </div> <img class="media-object" src="../assets/layouts/layout/img/avatar6.jpg" alt="...">
							<div class="media-body">
								<h4 class="media-heading">Lara Kunis</h4>
								<div class="media-heading-sub">CEO, Loop Inc</div>
								<div class="media-heading-small">Last seen 03:10 AM</div>
							</div>
						</li>
						<li class="media">
							<div class="media-status"> <span class="label label-sm label-success">new</span> </div> <img class="media-object" src="../assets/layouts/layout/img/avatar7.jpg" alt="...">
							<div class="media-body">
								<h4 class="media-heading">Ernie Kyllonen</h4>
								<div class="media-heading-sub"> Project Manager, <br> SmartBizz PTL </div>
							</div>
						</li>
						<li class="media"><img class="media-object" src="../assets/layouts/layout/img/avatar8.jpg" alt="...">
							<div class="media-body">
								<h4 class="media-heading">Lisa Stone</h4>
								<div class="media-heading-sub">CTO, Keort Inc</div>
								<div class="media-heading-small">Last seen 13:10 PM</div>
							</div>
						</li>
						<li class="media">
							<div class="media-status"> <span class="badge badge-success">7</span> </div> <img class="media-object" src="../assets/layouts/layout/img/avatar9.jpg" alt="...">
							<div class="media-body">
								<h4 class="media-heading">Deon Portalatin</h4>
								<div class="media-heading-sub">CFO, H&D LTD</div>
							</div>
						</li>
						<li class="media"><img class="media-object" src="../assets/layouts/layout/img/avatar10.jpg" alt="...">
							<div class="media-body">
								<h4 class="media-heading">Irina Savikova</h4>
								<div class="media-heading-sub">CEO, Tizda Motors Inc</div>
							</div>
						</li>
						<li class="media">
							<div class="media-status"> <span class="badge badge-danger">4</span> </div> <img class="media-object" src="../assets/layouts/layout/img/avatar11.jpg" alt="...">
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
							<a href="javascript:;" class="page-quick-sidebar-back-to-list"> <i class="icon-arrow-left"></i>Back </a>
						</div>
						<div class="page-quick-sidebar-chat-user-messages">
							<div class="post out"> <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
								<div class="message"> <span class="arrow"></span> <a href="javascript:;" class="name">Bob Nilson</a> <span class="datetime">20:15</span> <span class="body"> When could you send me the report ? </span> </div>
							</div>
							<div class="post in"> <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />
								<div class="message"> <span class="arrow"></span> <a href="javascript:;" class="name">Ella Wong</a> <span class="datetime">20:15</span> <span class="body"> Its almost done. I will be sending it shortly </span> </div>
							</div>
							<div class="post out"> <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
								<div class="message"> <span class="arrow"></span> <a href="javascript:;" class="name">Bob Nilson</a> <span class="datetime">20:15</span> <span class="body"> Alright. Thanks! :) </span> </div>
							</div>
							<div class="post in"> <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />
								<div class="message"> <span class="arrow"></span> <a href="javascript:;" class="name">Ella Wong</a> <span class="datetime">20:16</span> <span class="body"> You are most welcome. Sorry for the delay. </span> </div>
							</div>
							<div class="post out"> <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
								<div class="message"> <span class="arrow"></span> <a href="javascript:;" class="name">Bob Nilson</a> <span class="datetime">20:17</span> <span class="body"> No probs. Just take your time :) </span> </div>
							</div>
							<div class="post in"> <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />
								<div class="message"> <span class="arrow"></span> <a href="javascript:;" class="name">Ella Wong</a> <span class="datetime">20:40</span> <span class="body"> Alright. I just emailed it to you. </span> </div>
							</div>
							<div class="post out"> <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
								<div class="message"> <span class="arrow"></span> <a href="javascript:;" class="name">Bob Nilson</a> <span class="datetime">20:17</span> <span class="body"> Great! Thanks. Will check it right away. </span> </div>
							</div>
							<div class="post in"> <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />
								<div class="message"> <span class="arrow"></span> <a href="javascript:;" class="name">Ella Wong</a> <span class="datetime">20:40</span> <span class="body"> Please let me know if you have any comment. </span> </div>
							</div>
							<div class="post out"> <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
								<div class="message"> <span class="arrow"></span> <a href="javascript:;" class="name">Bob Nilson</a> <span class="datetime">20:17</span> <span class="body"> Sure. I will check and buzz you if anything needs to be
										corrected. </span> </div>
							</div>
						</div>
						<div class="page-quick-sidebar-chat-user-form">
							<div class="input-group"> <input type="text" class="form-control" placeholder="Type a message here...">
								<div class="input-group-btn"> <button type="button" class="btn green">
										<i class="icon-paper-clip"></i>
									</button> </div>
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
										<div class="label label-sm label-info"> <i class="fa fa-check"></i> </div>
									</div>
									<div class="cont-col2">
										<div class="desc"> You have 4 pending tasks. <span class="label label-sm label-warning "> Take action <i class="fa fa-share"></i>
											</span> </div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date">Just now</div>
							</div>
						</li>
						<li>
							<a href="javascript:;">
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-success"> <i class="fa fa-bar-chart-o"></i> </div>
										</div>
										<div class="cont-col2">
											<div class="desc">Finance Report for year 2013 has been released.</div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date">20 mins</div>
								</div>
							</a>
						</li>
						<li>
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-danger"> <i class="fa fa-user"></i> </div>
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
										<div class="label label-sm label-info"> <i class="fa fa-shopping-cart"></i> </div>
									</div>
									<div class="cont-col2">
										<div class="desc"> New order received with <span class="label label-sm label-success"> Reference Number: DR23923 </span> </div>
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
										<div class="label label-sm label-success"> <i class="fa fa-user"></i> </div>
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
										<div class="label label-sm label-info"> <i class="fa fa-bell-o"></i> </div>
									</div>
									<div class="cont-col2">
										<div class="desc"> Web server hardware needs to be upgraded. <span class="label label-sm label-warning"> Overdue </span> </div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date">2 hours</div>
							</div>
						</li>
						<li>
							<a href="javascript:;">
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-default"> <i class="fa fa-briefcase"></i> </div>
										</div>
										<div class="cont-col2">
											<div class="desc">IPO Report for year 2013 has been released.</div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date">20 mins</div>
								</div>
							</a>
						</li>
					</ul>
					<h3 class="list-heading">System</h3>
					<ul class="feeds list-items">
						<li>
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-info"> <i class="fa fa-check"></i> </div>
									</div>
									<div class="cont-col2">
										<div class="desc"> You have 4 pending tasks. <span class="label label-sm label-warning "> Take action <i class="fa fa-share"></i>
											</span> </div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date">Just now</div>
							</div>
						</li>
						<li>
							<a href="javascript:;">
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-danger"> <i class="fa fa-bar-chart-o"></i> </div>
										</div>
										<div class="cont-col2">
											<div class="desc">Finance Report for year 2013 has been released.</div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date">20 mins</div>
								</div>
							</a>
						</li>
						<li>
							<div class="col1">
								<div class="cont">
									<div class="cont-col1">
										<div class="label label-sm label-default"> <i class="fa fa-user"></i> </div>
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
										<div class="label label-sm label-info"> <i class="fa fa-shopping-cart"></i> </div>
									</div>
									<div class="cont-col2">
										<div class="desc"> New order received with <span class="label label-sm label-success"> Reference Number: DR23923 </span> </div>
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
										<div class="label label-sm label-success"> <i class="fa fa-user"></i> </div>
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
										<div class="label label-sm label-warning"> <i class="fa fa-bell-o"></i> </div>
									</div>
									<div class="cont-col2">
										<div class="desc"> Web server hardware needs to be upgraded. <span class="label label-sm label-default "> Overdue </span> </div>
									</div>
								</div>
							</div>
							<div class="col2">
								<div class="date">2 hours</div>
							</div>
						</li>
						<li>
							<a href="javascript:;">
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-info"> <i class="fa fa-briefcase"></i> </div>
										</div>
										<div class="cont-col2">
											<div class="desc">IPO Report for year 2013 has been released.</div>
										</div>
									</div>
								</div>
								<div class="col2">
									<div class="date">20 mins</div>
								</div>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="tab-pane page-quick-sidebar-settings" id="quick_sidebar_tab_3">
				<div class="page-quick-sidebar-settings-list">
					<h3 class="list-heading">General Settings</h3>
					<ul class="list-items borderless">
						<li>Enable Notifications <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
						<li>Allow Tracking <input type="checkbox" class="make-switch" data-size="small" data-on-color="info" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
						<li>Log Errors <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
						<li>Auto Sumbit Issues <input type="checkbox" class="make-switch" data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
						<li>Enable SMS Alerts <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
					</ul>
					<h3 class="list-heading">System Settings</h3>
					<ul class="list-items borderless">
						<li>Security Level <select class="form-control input-inline input-sm input-small">
								<option value="1">Normal</option>
								<option value="2" selected>Medium</option>
								<option value="e">High</option>
						</select> </li>
						<li>Failed Email Attempts <input class="form-control input-inline input-sm input-small" value="5" /> </li>
						<li>Secondary SMTP Port <input class="form-control input-inline input-sm input-small" value="3560" /> </li>
						<li>Notify On System Error <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
						<li>Notify On SMTP Error <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
					</ul>
					<div class="inner-content"> <button class="btn btn-success">
							<i class="icon-settings"></i> Save Changes
						</button> </div>
				</div>
			</div>
		</div>
	</div>
</div>