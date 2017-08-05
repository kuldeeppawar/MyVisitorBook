<div class="page-content-wrapper">
	<div class="page-content">
		<div class="row">
			<div class="col-md-12">
				<div class=" app-ticket-list">
					<div class="page-bar row">
						<div class="col-md-6">
							<h3 class="page-title"><?php getLocalkeyword('Order Management');?></h3>
							<ul class="page-breadcrumb ">
								<li><a href="<?php echo base_url()?>head/dashboard"><?php getLocalkeyword('Home');?></a> <i class="fa fa-circle"></i></li>
								<li><span>Order Management</span></li>
							</ul>
						</div>
						<div class="col-md-6">
							<div id="reportrange" class="btn pull-right " style="padding-top: 12px;">
								<i class="fa fa-calendar"></i> &nbsp; <span class="thin uppercase hidden-xs">August 28, 2016 - September 26, 2016</span> <b class="fa fa-angle-down"></b>
							</div>
						</div>
					</div>
					<div class="row">
						<!--modal-->
						<div id="addSender" class="modal fade in" role="dialog">
							<div class="modal-dialog">
								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">×</button>
										<h2 class="modal-title text-center">
											<i class="fa fa-plus"></i> Add Sender Id
										</h2>
									</div>
									<div class="modal-body">
										<div class="portlet-body form">
											<form role="form">
												<div class="form-body">
													<div class="form-group">
														<select class="form-control">
															<option>--select --</option>
															<option>Name 1</option>
															<option>Name 2</option>
														</select>
													</div>
													<div class="form-group">
														<label class="">Sender Id 1</label> <br> <input type="text" class=" input-sm col-md-7 " placeholder=""> <label style="margin-top: 3px;"> <input type="checkbox" value=""> Set as Default
														</label>
													</div>
													<div class="form-group">
														<label class="">Sender Id 2</label> <br> <input type="text" class=" input-sm col-md-7 " placeholder=""> <label style="margin-top: 3px;"> <input type="checkbox" value=""> Set as Default
														</label>
													</div>
													<div class="form-group">
														<label class="">Sender Id 3</label> <BR> <input type="text" class=" input-sm col-md-7 " placeholder=""> <label style="margin-top: 3px;"> <input type="checkbox" value=""> Set as Default
														</label>
													</div>
													<a><i class="fa fa-plus"></i> Add more</a>
													<div class="modal-footer">
														<button type="button" class="btn btn-primary">Save</button>
														<button type="button" data-dismiss="modal" class="btn btn-danger">Cancel</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div id="addSender1" class="modal fade in" role="dialog">
							<div class="modal-dialog">
								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">×</button>
										<h2 class="modal-title text-center">
											<i class="fa fa-plus"></i> Add Sender Id
										</h2>
									</div>
									<div class="modal-body">
										<div class="portlet-body form">
											<form role="form">
												<div class="form-body">
													<div class="form-group">
														<p>Sumit Sharma</p>
													</div>
													<div class="form-group">
														<label class="">Sender Id 1</label> <br> <input type="text" class=" input-sm col-md-7 " placeholder=""> <label style="margin-top: 3px;"> <input type="checkbox" value=""> Set as Default
														</label>
													</div>
													<div class="form-group">
														<label class="">Sender Id 2</label> <br> <input type="text" class=" input-sm col-md-7 " placeholder=""> <label style="margin-top: 3px;"> <input type="checkbox" value=""> Set as Default
														</label>
													</div>
													<div class="form-group">
														<label class="">Sender Id 3</label> <BR> <input type="text" class=" input-sm col-md-7 " placeholder=""> <label style="margin-top: 3px;"> <input type="checkbox" value=""> Set as Default
														</label>
													</div>
													<a><i class="fa fa-plus"></i> Add more</a>
													<div class="modal-footer">
														<button type="button" class="btn btn-primary">Save</button>
														<button type="button" data-dismiss="modal" class="btn btn-danger">Cancel</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--end modal-->
						<div id="myModal_m" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">×</button>
										<h2 class="modal-title text-center">
											<i class="fa fa-trash"></i> Are you sure to Delete?
										</h2>
									</div>
									<div class="modal-body">
										<div class="portlet-body form">
											<form role="form">
												<div class="form-body">
													<div class="row">
														<div class="col-md-12">
															<div class="modal-footer">
																<a href="" class="btn btn-primary">Yes</a>
																<button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
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
                   <?php
						if ($this->session->flashdata('success') != NULL && $this->session->flashdata('success') != "")
						{
						?>
	                     <br> <br>
						<div class="alert alert-success">
	                        <?php echo $this->session->flashdata('success');?>
	                    </div>
	                    <?php
	                    }
                    ?>
                <div class="col-md-12">
							<div class="table-toolbar">
								<div class="row">
									<div class="col-md-3 ">
										<ul class="nav navbar-nav pl0">
											<li class="dropdown dropdown-user"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"
												style="font-size: 18px; padding: 2px 0px;">
												 Recently updated <i class="fa fa-angle-down"></i>
											</a>
												<ul class="dropdown-menu dropdown-menu-default">
													<li><a href="#">All Contacts</a></li>
													<li><a href="#">My Contacts </a></li>
													<li><a href="#">Recently viewed</a></li>
													<li><a href="#">Not updated in 30 Days</a></li>
												</ul></li>
										</ul>
									</div>
									<div class="col-md-5  pull-right">
										<div class="pull-right">
											<div style="float: left; margin-top: 8px; margin-right: 5px;">
												<?php 
												 if(getAccessRights('mvbClEdit'))
												 {
 												?>
												<a href="#" onclick="editClient()" data-toggle="modal" id="sb3" class="margin_rgt hide_element"><i class="fa fa-pencil-square-o icon_custom" aria-hidden="true" title="Edit"></i></a> 
												<?php 
												 }
												 
												 if(getAccessRights('mvbClSendsms'))
												 {
												 ?>
													<a href="#" data-toggle="modal" class="margin_rgt hide_elementp">
												  	<img src="<?php echo base_url(); ?>themes/assets/sms.png" height="22" title="Send SMS" />
												  	</a> 
												  <?php 
												 }
												 if(getAccessRights('mvbClSendemail'))
												 {
												  ?>
												  <a href="#" data-toggle="modal" class="margin_rgt hide_elementp"> 
												  <i class="fa fa-envelope-o fa-2x" title="Send Email" style="color: #828282;"></i></a> 
												 <?php 
												 }
												 if(getAccessRights('mvbCldelete'))
												 {
												 ?> 
												  <a href="#" data-toggle="modal" data-target="#myModal_m" id="sb2" class="margin_rgt hide_element"> 
												  <i class="fa fa-trash fa-2x" title="Delete" style="color: #828282;">
												 <?php 
												 }
												 ?> 
												 </i>
												</a>
											</div>
											<?php 
											if(getAccessRights('mvbClimport'))
											{
											?>
											<a href="#" data-toggle="modal" data-target="#import" class="p_element"> <?php getLocalkeyword('Import');?> </a> 
											<?php
											}
											?>
											<span class="p_element">/</span>
											<?php 
											if(getAccessRights('mvbClExport'))
											{
											?>
											 <a href="#" class="p_element" data-toggle="modal" data-target="#otp">
												<?php getLocalkeyword('Export');?> </a>
											<?php 
											}?>	
												
											<div class="btn-group">
												<?php 
												 if(getAccessRights('mvbClAdd'))
												 {
 												?>
												
												<a href="<?php echo base_url();?>head/client_management/addClient" id="sample_editable_1_new hvr-float-shadow" class="btn btn-primary"> 
												<?php getLocalkeyword('Add Client');?>
												</a>
												<?php 
												 }
												?>
											</div>
											<!-- modal ends -->
										</div>
									</div>
									
								</div>
								
								<div class="selected_rows">
									<font id="show_checkbox_selected"></font>	
								 <a id="selectall"><?php getLocalkeyword('select all');?></a></div>
								<div class="portlet light">
									<div class="portlet-body">
										<table class="table table-striped table-bordered table-hover table-checkable order-column dataTable allchekbox" id="sample_1_2" role="grid" aria-describedby="sample_1_2_info">
											<thead>
												<tr>
													<th style="width: 35px;"><input type="checkbox" id="checkall" data-set="" name="all" /></th>
													<th><?php getLocalkeyword('Client User Id');?></th>
													<th><?php getLocalkeyword('Client Name');?></th>
													<th><?php getLocalkeyword('Email Id');?></th>
													<th><?php getLocalkeyword('Mobile No');?></th>
													<th><?php getLocalkeyword('Location');?></th>
													<th><?php getLocalkeyword('Reseller Name');?></th>
												</tr>
											</thead>
											<tbody>
				                              <?php
												for($i=0;$i < count($resultClients);$i ++)
												{
													$email=$this->encryption->decrypt($resultClients[$i]->clnt_email);
													$mobile=$this->encryption->decrypt($resultClients[$i]->clnt_mobile);
													$j=$i + 1;
													?>
				                                    <tr class="odd gradeX">
													<td><input name="chk<?php echo $j; ?>" class="check_box" type="checkbox" data-ptag="sb1" id="chk<?php echo $j; ?>" value="<?php echo $this->encryption->encrypt($resultClients[$i]->clnt_id_pk);?>"></td>
													<td><?php echo $resultClients[$i]->clnt_id_pk; ?></td>
													<td>
													<a onclick="getClientprofile('<?php echo $resultClients[$i]->clnt_id_pk;?>');"><?php echo $resultClients[$i]->clnt_name; ?></a></td>
													<td><?php echo $email; ?></td>
													<td><?php echo $mobile; ?></td>
													<td><?php echo $resultClients[$i]->clnt_address; ?></td>
													<td><?php echo $resultClients[$i]->sysmu_username; ?></td>
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
<div class="page-content-wrapper1" id="clientProfile"></div>

	
<div id="otp1" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">×</button>
							<h4 class="modal-title text-left"><?php getLocalkeyword('Enter OTP Here');?></h4>
							<font style="color:green;"><span id="show_send_msg"></span></font>
						</div>
						<form id="export_commn_mgt" name="export_commn_mgt" action="<?php echo base_url();?>head/client_management/exportOrderSendLogs" method="post">
							<div class="modal-body">						
								<div class="col-md-2"></div>
								<div class="col-md-7 form-group">
									<div class="row">
										<div class="col-md-4">
											<label><?php getLocalkeyword('Enter OPT');?></label>
										</div>
										<div class="col-md-8">
											<input type="text" class="form-control input-sm" id="txtotp" name="txtotp">
										</div>
									</div>
								</div>
								<div class="col-md-2"></div>
								<input type="hidden" id="hidden_msg_type" name="hidden_msg_type" value=""/>
								<input type="hidden" id="client_id" name="client_id" value=""/>
								<input type="hidden" id="hidden_filter_date" name="hidden_filter_date" value=""/>
									<button type="submit" class="btn btn-primary"><?php getLocalkeyword('Submit');?></button>							
							</div>
						</form>
						<div class="modal-footer"></div>
					</div>
				</div>
</div>


<div id="otp_sms" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">×</button>
							<h4 class="modal-title text-left"><?php getLocalkeyword('Send SMS');?></h4>
							<font style="color:green;"><span id="show_send_msg"></span></font>
						</div>
						<div class="modal-body">
								<div class="portlet-body form">
									<form role="form" id="frmAdd" action="<?php echo base_url();?>head/client_management/orderSendSms" method="post" enctype="multipart/form-data">
										<div class="form-body">
											<div class="row">
												<div class="col-md-10 pull-left">
													<div class="form-group">
														<label><?php getLocalkeyword('Campaign Name');?> </label>
														 <input type="text" name="txtsmscampaignname" id="txtsmscampaignname" class="form-control input-sm" placeholder="Campaign Name" required="required">
													</div>
												</div>
												<div class="col-md-10 pull-left">
													<div class="form-group">
														<label><?php getLocalkeyword('Description');?></label>
														<textarea name="txtsmsdescription" id="txtsmsdescription" placeholder="Description" class="form-control" cols="6" rows="6" required="required"></textarea>
													</div>
												</div>
												<div class="col-md-10 pull-left">
													<div class="form-group">
														<label>
															<input name="sms_schedule" type="checkbox" id="sms_schedule" value="1">
	                                                       <?php getLocalkeyword('Schedule');?>  <span></span>
														</label>	
														<div class="input-group date date-picker" id="sms_schedule1" style=" display:none;">
                                                            <input name="sms_schedule_date_time" id="sms_schedule_date_time" type="text" size="16" readonly class="form-control">
                                                            <span class="input-group-btn">
                                                                <button class="btn default date-reset" type="button" style="margin-right:0px;border-radius:0px;"> <i class="fa fa-times"></i> </button>
                                                                <button class="btn default date-set" type="button" style="margin-right:0px;border-radius:0px !important;"> <i class="fa fa-calendar"></i> </button>
                                                            </span> 
                                                        </div>
													</div>
												</div>
											</div>
											<div class="modal-footer">
											        <input type="hidden" id="sms_client_id" name="sms_client_id" value=""/>
												 	<button type="submit" name="btnSubmit" class="btn btn-primary" >Save</button>
													<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
											</div>
										</div>
									</form>
									<div class="row"></div>
								</div>
						</div>
						
						<div class="modal-footer"></div>
					</div>
				</div>
</div>


<div id="otp_email" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">×</button>
							<h4 class="modal-title text-left"><?php getLocalkeyword('Send Email');?></h4>
							<font style="color:green;"><span id="show_send_msg"></span></font>
						</div>
						<div class="modal-body">
							<div class="portlet-body form">
								<form id="export_commn_mgt" name="export_commn_mgt" action="<?php echo base_url();?>head/client_management/orderSendEmail" method="post">
									<div class="form-body">
													<div class="row">
														<div class="col-md-10 pull-left">
															<div class="form-group">
																<label><?php getLocalkeyword('Campaign Name');?> </label>
																 <input type="text" name="txtemailcampaignname" id="txtemailcampaignname" class="form-control input-sm" placeholder="Campaign Name" required="required">
															</div>
														</div>
														<div class="col-md-10 pull-left">
															<div class="form-group">
																<label><?php getLocalkeyword('Description');?></label>
																<textarea name="txtemaildescription" id="txtemaildescription" placeholder="Description" class="form-control" cols="6" rows="6" required="required"></textarea>
															</div>
														</div>
														<div class="col-md-10 pull-left">
															<div class="form-group">
																<label>
																	<input name="email_schedule" type="checkbox" id="email_schedule" value="1">
			                                                       <?php getLocalkeyword('Schedule');?>  <span></span>
																</label>	
																<div class="input-group date date-picker" id="email_schedule1" style=" display:none;">
		                                                            <input name="email_schedule_date_time" id="email_schedule_date_time" type="text" size="16" readonly class="form-control">
		                                                            <span class="input-group-btn">
		                                                                <button class="btn default date-reset" type="button" style="margin-right:0px;border-radius:0px;"> <i class="fa fa-times"></i> </button>
		                                                                <button class="btn default date-set" type="button" style="margin-right:0px;border-radius:0px !important;"> <i class="fa fa-calendar"></i> </button>
		                                                            </span> 
		                                                        </div>
															</div>
														</div>
													</div>
													<div class="modal-footer">
													        <input type="hidden" id="email_client_id" name="email_client_id" value=""/>
														 	<button type="submit" name="btnSubmit" class="btn btn-primary" >Save</button>
															<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
													</div>
												</div>
								</form>
							</div>
						</div>			
						<div class="modal-footer"></div>
					</div>
				</div>
</div>



<script src="http://listjs.com/assets/javascripts/list.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/list.pagination.js/0.1.1/list.pagination.min.js"></script>
<script>

	$('#sms_schedule').click(function () 
	{
            if(document.getElementById("sms_schedule").checked===true)
            {
                $("#sms_schedule1").show();
            }
            else
            {
                $("#sms_schedule1").hide();
            }
    });

    $('#email_schedule').click(function () 
	{
            if(document.getElementById("email_schedule").checked===true)
            {
                $("#email_schedule1").show();
            }
            else
            {
                $("#email_schedule1").hide();
            }
    });

	$(document).ready(function() {
				 $(".date-picker").datepicker();	
	});


    function editClient()
	{
         var count=<?php echo count($resultClients)?>;
	     var user_id="";
	     for (var i=1;i<=count;i++)
	     {
	   	  if($('#chk'+i).is(':checked'))
	   	  {
	   		user_id=$("#chk"+i).val(); 
	   	  }
	     } 
	     
	     if(user_id == "")
		 {
	   	   alert ("Please Select The User Name");
	   	 }
	     else
	     {
             window.location.replace("<?php echo base_url()."head/client_management/editClient/"?>"+user_id);
	           
	     }  
	}


     function getClientprofile(userId)
	  {
          
		 
		  $(".page-content-wrapper").hide();
			
		  $(".page-content-wrapper1").show();
                 
		  $.post("<?php echo base_url();?>head/client_management/getClientprofile",{userId:userId},function(data){


                      $(".page-content-wrapper1").html(data);

                       $(".date-picker").datepicker();	
                      
                      var monkeyList = new List('test-list', {

                          valueNames: ['name'],
                                  page: 10,
                                  plugins: [ ListPagination({}) ]

                          });

                      $('#sb4').hide();
                      $('.p_element12').css('visibility', 'hidden');

                      $('#sample_2').dataTable( {
                    	} );

                     

                       $("#close").click(function()
                        {
                             $(" .page-content-wrapper").show();
                             $(".page-content-wrapper1").hide();
                             location.reload(true);
                       });

                    
                    	                       
		   });
	  }

     function getPackagedetails(id,type,client,name,order_id)
     {

	   	  $.post("<?php echo base_url();?>head/client_management/getPackagedetails",{id:id,client:client,type:type,name:name,order_id:order_id},function(data){
	   		      $(".package_details") .show();
	   		      $(".package_details") .html(data);
	 	          $("#package_table") .hide();        	                       
			});
    	
    	 
      }

    
      function closProfileDiv()
      {
    	  $(".package_details") .hide();
  		   $("#package_table") .show();
            
      }
   
     function getPackages(ptype)
     {
         var clientid=$("#clientidforpackages").val();
         $.post("<?php echo base_url();?>head/client_management/getPackages",{ptype:ptype,clientid:clientid},function(data){
               $('#selPackageName').html(data);
                                        
                });      
     }


     function getCommnMgtDetails(client_id)
     {
     			var msg_type=$("#msg_type").val();
     			var filter_date=$("#filter_date").val();

     			$.post("<?php echo base_url();?>head/client_management/getCommnMgt",{clientId:client_id,msgType:msg_type,filterDate:filter_date},function(data)
     			{
     					//console.log(data);
     				
               			$('#commn_mgt_data_div').html(data);    
               			$('#sample_1_2_3').dataTable({});                    
                });
     }


     function getOTP(client_id,msg_type)
	{
	            $.post("<?php echo base_url();?>head/client_management/getOTP",{},function(data)
	            {                     
	            		//alert(data);

	            		var filter_date=$("#filter_date").val();

	            		$("#hidden_msg_type").val(msg_type);
	            		$("#client_id").val(client_id);
	            		$("#hidden_filter_date").val(filter_date);

	                    $("#show_send_msg").html('OTP has been sent successfully to your registered mobile number '+data);
	            });
	}

	function setMSgClientId(client_id,msg_type)
	{
			if(msg_type=='sms')
			{	
				$("#sms_client_id").val(client_id);
			}
			else
			{
				$("#email_client_id").val(client_id);	
			}
	}



     $(document).ready(function()
        {        
            $(".page-content-wrapper1").hide();
        });
        
    </script>
