
<div class="page-content-wrapper">
	<div class="page-content">
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
			<!--modal-->
			<div id="otp1" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">×</button>
							<h4 class="modal-title text-center"><?php getLocalkeyword('Enter OTP Here');?></h4>
						</div>
						<div class="modal-body">
							<div class="col-md-2"></div>
							<div class="col-md-7 form-group">
								<div class="row">
									<div class="col-md-4">
										<label><?php getLocalkeyword('Enter OTP');?></label>
									</div>
									<div class="col-md-8">
										<input type="text" class="form-control input-sm">
									</div>
								</div>
							</div>
							<div class="col-md-2"></div>
							<a href="#"><button type="button" class="btn btn-primary"><?php getLocalkeyword('Submit');?></button></a>
						</div>
						<div class="modal-footer"></div>
					</div>
				</div>
			</div>
			<div id="otp_edit" class="modal fade" role="dialog">
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
										<input type="text" name="txtEdit" id="txtEdit" class="form-control input-sm">
									</div>
								</div>
							</div>
							<div class="col-md-2"></div>
							<a href="#"><button type="button" class="btn btn-primary" onclick="verifyOtp('Edit')"><?php getLocalkeyword('Submit');?></button></a>
						</div>
						<div class="modal-footer"></div>
					</div>
				</div>
			</div>
			<div id="otp_deactive" class="modal fade" role="dialog">
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
										<input type="text" name="txtDeactive" id="txtDeactive" class="form-control input-sm">
									</div>
								</div>
							</div>
							<div class="col-md-2"></div>
							<a href="#"><button type="button" onclick="verifyOtp('Deactive')" class="btn btn-primary"><?php getLocalkeyword('Submit');?></button></a>
						</div>
						<div class="modal-footer"></div>
					</div>
				</div>
			</div>
			<div id="otp_active" class="modal fade" role="dialog">
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
										<label><?php getLocalkeyword('Enter OTP');?></label>
									</div>
									<div class="col-md-8">
										<input type="text" name="txtActive"   id="txtActive" class="form-control input-sm">
									</div>
								</div>
							</div>
							<div class="col-md-2"></div>
							<a href="#"><button type="button" class="btn btn-primary" onclick="verifyOtp('Active')"><?php getLocalkeyword('Submit');?></button></a>
						</div>
						<div class="modal-footer"></div>
					</div>
				</div>
			</div>
			<div id="myModal_m" class="modal fade" role="dialog ">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">×</button>
							<h2 class="modal-title text-left">
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
													<a class="btn btn-primary" onclick="deleteVisitor();">Yes</a>
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
			<div class="modal fade in" id="custom_field" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" id="close" class="close" data-dismiss="modal" aria-hidden="true" onclick="clearprefielddata();">×</button>
							<h4 class="modal-title text-left">
								<i class="fa fa-envelope-o"></i> <?php getLocalkeyword('Add Additional Field');?> 
							</h4>
						</div>
						<div class="modal-body">
							<div class="row add_event">
								<form role="form" id="form1" action="<?php echo base_url()?>head/setting/addVisitfield" method="post">
									<div class="col-md-12 col-sm-12">
										<div class="form-group">
											<label><?php getLocalkeyword('Field Type');?> </label> <select class="form-control" name="selFieldtype" id="selFieldtype" required="required" onclick="checkValidation(this.value);">
												<option value="">--select--</option>
												<option value="text">Text</option>
												<option value="number">Number</option>
												<option value="picklist">Picklist</option>
												<option value="date">Date</option>
												<option value="email">Email</option>
												<option value="phone">Phone</option>
												<option value="textarea">Textarea</option>
											</select>
										</div>
									</div>
									<div class="col-md-12">
										<div role="form">
											<div class="form-body">
												<div class="form-group" id="multiselct" style="display: none;">
													<label class="radio-inline" onclick="single()"> <input type="radio" name="optradio" id="opt1" value="1" > Single Select
													</label> <label class="radio-inline" onclick="single()"> <input type="radio" name="optradio" id="opt2" value="2" > Multi Select
													</label>
												</div>
												<div class="form-group" id="fieldlabel" style="display: none;">
													<label><?php getLocalkeyword('Field Label');?></label> <input type="text" name="txtTextfieldlabel" id="txtTextfieldlabel" class="form-control input-sm" placeholder="" >
												</div>
												<div class="form-group" id="fieldvalue" style="display: none;">
													<label><?php getLocalkeyword('Add List Value');?></label>
													<div id="field" class="input-group col-md-12">
														<input autocomplete="off" class="form-control " id="field1" name="field[]" type="text" placeholder="" data-items="8" style="width:91%">&nbsp;&nbsp;&nbsp;&nbsp;<button id="b1" class="btn add-more" type="button" onclick="addInput('first');">+</button>
													</div>
												</div>
												<br>
												<div id="first" class="form-group"></div>
												<input type="hidden" value="1" name="imgcounter" id="imgcounter" />
												<div class="form-group" id="fieldlength" style="display: none;">
													<label><?php getLocalkeyword('Length');?></label> <input type="text" name="txtTextfieldlength" id="txtTextfieldlength" class="form-control input-sm" placeholder="" required>
												</div>
												<div class="form-group" id="date" style="display: none;">
													<div class="input-group input-medium date date-picker" data-date="10/2012" data-date-format="mm/yyyy" data-date-viewmode="years" data-date-minviewmode="months">
														<input type="text" class="form-control" readonly=""> <span class="input-group-btn">
															<button class="btn default" type="button">
																<i class="fa fa-calendar"></i>
															</button>
														</span>
													</div>
												</div>
												<!-- <div class="form-group">
													<div class="input-group ">
														<label><?php //getLocalkeyword('Mandatory');?></label> <input type="checkbox" name="chkMandatory" id="chkMandatory" class="form-control" value="1">
													</div>
												</div> -->
												<br>
												
												<div class="modal-footer">
													<button type="submit" name="btnSubmit" class="btn btn-primary"><?php getLocalkeyword('Save');?></button>
													<button type="button" data-dismiss="modal" class="btn btn-danger" onclick="clearprefielddata();"><?php getLocalkeyword('Cancel');?></button>
												</div>
											</div>
										</div>
										
								
								</div>
								</form>
							</div>
							<div class="modal-footer"></div>
						</div>
					</div>
				</div>
			</div>
			<!--end modal-->
			<div class="col-md-12">
				<div class=" app-ticket-list">
					<div class="page-bar row">
						<div class="col-md-6">
							<h3 class="page-title"><?php getLocalkeyword('Add Visitor Form');?></h3>
							<ul class="page-breadcrumb ">
								<li><a href="<?php echo base_url()?>head/dashboard"><?php getLocalkeyword('Home');?></a> <i class="fa fa-circle"></i></li>
								<li><a href="#"><?php getLocalkeyword('Customization Management');?></a> <i class="fa fa-circle"></i></li>
								<li><span><?php getLocalkeyword('Add Visitor Form');?></span></li>
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
						<!--end modal-->
						<div class="col-md-12">
							<div class="table-toolbar">
								<div class="row">
									<div class="col-md-5  pull-right">
										<div class="pull-right">
											<div style="float: left; margin-top: 8px; margin-right: 5px;">
											
												
												<?php if(getAccessRights('mvbSetAvfEdit'))
													{
													?>
													<a data-toggle="modal" onclick="getRecord();" class="margin_rgt hide_element"> <i class="fa fa-pencil-square-o fa-2x" title="Edit" style="color: #828282;"></i></a> 
													<?php
													}
													?>
												
												<a href="#" class="margin_rgt hide_element" data-toggle="modal" data-target="#myModal_m" id="delete"> <i class="fa fa-trash fa-2x" title="Edit" style="color: #828282;"></i></a>
											</div>
											
											 <?php
											if(getAccessRights('mvbSetAvfAdd'))
											{
										    ?>
														<div class="btn-group">
																<a id="sample_editable_1_new hvr-float-shadow" data-toggle="modal" data-target="#custom_field" class="btn btn-primary">
																<?php getLocalkeyword('Add Additional field');?></a>
															</div>
										    <?php		
											}
							              	if(getAccessRights('mvbSetAvfActive') || getAccessRights('mvbSetAvfDeactive') )
											{
											?>
													<ul class="nav navbar-nav pl0 pull-right" style="margin-left: 5px;">
														<li class="dropdown dropdown-user burger_menu"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"
															style="margin-top: 0px;"><i class="fa fa-bars fa-2x" aria-hidden="true"></i> </a>
															<?php
															if(getAccessRights('mvbSetAvfActive') || getAccessRights('mvbSetAvfDeactive') )
															{
															?>
																	<ul class="dropdown-menu dropdown-menu-default">
																	<?php
																		if(getAccessRights('mvbSetAvfActive'))
																		{
																	?>		
																			<li class="options" style="border-bottom: 1px solid #e7ecf1;">
																			  <a href="#" onclick="chechCheckbox(1)" title="Custom Fields" style="padding: 5px; margin-top: 5px;">
																			  <?php getLocalkeyword('Active');?>
																			  </a></li>
																	<?php
																		}
			
																		if(getAccessRights('mvbSetAvfDeactive'))
																		{
																	?>		
																						<li class="options"><a onclick="chechCheckbox(0)" title="Custom Fields" style="padding: 5px; margin-top: 5px;">
																						<?php getLocalkeyword('Deactive');?>
																						</a></li>
																	<?php
																		}
			
																	
																		?>
																	</ul>
															<?php
															}
															?>
															</li>
													</ul>
											<?php
											}
											?>
										
										<!-- modal ends -->
										
										</div>
									</div>
								</div>
								<!-- <ul class="list-inline pull-right">
									<li><a style="color: #333"><?php //getLocalkeyword('Used Fields');?> :<span style="color: #333">1</span></a></li>
									<li><a style="color: #333"><?php //getLocalkeyword('Available Fields');?> :<span style="color: #333">100</span></a></li>
								</ul> -->
								<div class="selected_rows">
									 <font id="show_checkbox_selected"></font>
									 <a id="selectall"><?php getLocalkeyword('select all');?></a>
								</div>
								<div class="portlet light">
									<div class="portlet-body">
									<table class="table table-striped table-bordered table-hover table-checkable order-column dataTable allchekbox" id="sample_1_2" role="grid" aria-describedby="sample_1_2_info">
											<thead>
												<tr>
													<th style="width: 35px;"><input type="checkbox" id="checkall" data-set="" name="all" /> </label></th>
													<th><?php getLocalkeyword('Sr. No.');?></th>
													<th><?php getLocalkeyword('Field Label');?></th>
													<th><?php getLocalkeyword('Field Type');?></th>
													<th><?php getLocalkeyword('Length');?></th>
													<th><?php getLocalkeyword('Values');?></th>
													<th><?php getLocalkeyword('Created By');?></th>
													<th><?php getLocalkeyword('Created Date');?></th>
													<!-- <th><?php //getLocalkeyword('category');?></th> -->
													<th><?php getLocalkeyword('Status');?></th>
												</tr>
											</thead>
											<tbody>
											    <?php for($i=0;$i<count($resultField);$i++)
											           {
											           	 $j=$i+1;
											           	?>
											   
														<tr class="gradeX">
															<td><input name="chk<?php echo $j?>" class="check_box" type="checkbox" data-ptag="sb1" id="chk<?php echo $j?>" value="<?php echo $resultField[$i]->visitfield_id_pk;?>"></td>
															<td><?php echo $j;?></td>
															<td><?php echo $resultField[$i]->visitfield_name;?></td>
															<td><?php if($resultField[$i]->visitfield_type=="picklist"){ if($resultField[$i]->visitfield_selection==2){ $picklist_type="multiple";}else{ $picklist_type="single";} echo $resultField[$i]->visitfield_type.'('.$picklist_type.')';}else {echo $resultField[$i]->visitfield_type;}?></td>
															<td><?php echo $resultField[$i]->visitfield_length;?></td>
															<td><?php echo $resultField[$i]->val;?></td>
															<td><?php echo $resultField[$i]->created_by;?></td>
															<td><?php echo date("d-m-Y", strtotime($resultField[$i]->visitfield_createdDate));?></td>
															<!--<td>
															<?php 
															// if( $resultField[$i]->visitfield_category=='1')
															// {
															// 	echo "Mandatory";
															// }
															// else 
															// {
															// 	echo "Not Mandatory";
															// }				
															?></td>-->
																<td><?php 
							                              if($resultField[$i]->visitfield_status==1)
							                              {
							                             ?>
							                             
							                            <span class="label label-sm label-success"> Active </span>
							                             <?php 
							                              }
							                              else
							                              {    ?>
							                             
							                             <span class="label label-sm label-danger"> Deactive</span>
							                              <?php 
							                              }?></td>
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
<script>


function clearprefielddata()
{
	
	$("#form1").validate().resetForm();
	//$("#form1").reset();

	resetFields();

	// $("#fieldlabel").hide();
 //    $("#fieldlength").hide();
	// $("#fieldvalue").hide();
	// $("#multiselct").hide();
	// $("#date").hide();
	// $("#opt1").prop( "checked", false );
	// $("#opt2").prop( "checked", false );
}


$("#form1").validate({
		rules:{
			selFieldtype:{
				required:true
			},
			txtTextfieldlabel:{
				required:true
			},
			txtTextfieldlength:{
				required:true
			},
			'field[]':{
				required:true
			},
			optradio:{
				required:true
			}	
		},
	    errorPlacement:
          function(error, element){
              if(element.is(":radio")){ 
                  error.appendTo(element.parent().parent());
          }else{ 
                  error.insertAfter(element); 
               }
          },
		messages:{
			selFieldtype:{
				required:"Please select field type"	
			},
			txtTextfieldlabel:{
				required:"Please enter field label"
			},
			txtTextfieldlength:{
				required:"Please enter field length"
			},
			'field[]':{
				required:"Please enter list value"
			},
			optradio:{
				required:"Please select picklist type"
			}
		}
});


$("select").change(function(){
	
        $(this).find("option:selected").each(function(){

            if($(this).attr("value")=="text"){
                $("#fieldlabel").show();
                $("#fieldlength").show();
				 $("#fieldvalue").hide();
				 $("#multiselct").hide();
				  $("#date").hide();
				  $("#opt1").prop( "checked", false );
				  $("#opt2").prop( "checked", false );
                }

            else if($(this).attr("value")=="number"){

            	  $("#fieldlabel").show();
                  $("#fieldlength").show();
  				 $("#fieldvalue").hide();
  				 $("#multiselct").hide();
  				  $("#date").hide();
  				 $("#opt1").prop( "checked", false );
				  $("#opt2").prop( "checked", false );
            }

			else if($(this).attr("value")=="picklist"){

				  $("#fieldlabel").hide();
                  $("#fieldlength").hide();
  				 $("#fieldvalue").hide();
  				 $("#multiselct").show();
  				  $("#date").hide();
  				 $("#opt1").prop( "checked", false );
				  $("#opt2").prop( "checked", false );
            }

  
 			else if($(this).attr("value")=="date"){
 				  $("#fieldlabel").show();
 	                $("#fieldlength").hide();
 					 $("#fieldvalue").hide();
 					 $("#multiselct").hide();
 					  $("#date").hide();
 					 $("#opt1").prop( "checked", false );
 					  $("#opt2").prop( "checked", false );

             }

 			

 			else if($(this).attr("value")=="email"){

 				 $("#fieldlabel").show();
	                $("#fieldlength").show();
					 $("#fieldvalue").hide();
					 $("#multiselct").hide();
					  $("#date").hide();
					  $("#opt1").prop( "checked", false );
					  $("#opt2").prop( "checked", false );

             }

 	
 			else if($(this).attr("value")=="phone"){

 				 $("#fieldlabel").show();
	                $("#fieldlength").show();
					 $("#fieldvalue").hide();
					 $("#multiselct").hide();
					  $("#date").hide();
					  $("#opt1").prop( "checked", false );
					  $("#opt2").prop( "checked", false );

             }

 			

 			else if($(this).attr("value")=="textarea"){

 				 $("#fieldlabel").show();
	                $("#fieldlength").hide();
					 $("#fieldvalue").hide();
					 $("#multiselct").hide();
					  $("#date").hide();
					  $("#opt1").prop( "checked", false );
					  $("#opt2").prop( "checked", false );
             }

            else{

                //$(".box").hide();

                $("#fieldlabel").hide();
                $("#fieldlength").hide();
				$("#fieldvalue").hide();
				$("#multiselct").hide();
				$("#date").hide();
				$("#opt1").prop( "checked", false);
				$("#opt2").prop( "checked", false);

            }

        });

    }).change();

	
	function checkValidation(val)
	{
				if(val=="text")
				{
	                	$("#txtTextfieldlabel").attr("required","required");
	                	$("#txtTextfieldlength").attr("required","required");
	                	$("#txtTextfieldlabel").val('');
	                	$("#txtTextfieldlength").val('');
	                	$('input[type=radio]').prop('checked', false);
	            }
	            else if(val=="number")
	            {
	            		$("#txtTextfieldlabel").attr("required");
	                	$("#txtTextfieldlength").attr("required");
	                	$("#txtTextfieldlabel").val('');
	                	$("#txtTextfieldlength").val('');
	                	$('input[type=radio]').prop('checked', false);	  
	            }
				else if(val=="picklist")
				{
					  	$("#txtTextfieldlabel").removeAttr("required");
	                	$("#txtTextfieldlength").removeAttr("required");
	                	$("#opt1").attr("required");
	                	$("#opt2").attr("required");
	                	$("#txtTextfieldlabel").val('');
	                	$("#txtTextfieldlength").val('');
	                	$('input[type=radio]').prop('checked', false);
	            }
	 			else if(val=="date")
	 			{
	 				   $("#txtTextfieldlabel").attr("required");
	                	$("#txtTextfieldlength").removeAttr("required");
	                	$("#opt1").removeAttr("required");
	                	$("#opt2").removeAttr("required");
	                	$("#txtTextfieldlabel").val('');
	                	$("#txtTextfieldlength").val('');
	                	$('input[type=radio]').prop('checked', false);
	            }	 			
	 			else if(val=="email")
	 			{
	 				 	$("#txtTextfieldlabel").attr("required");
	                	$("#txtTextfieldlength").attr("required");
	                	$("#opt1").removeAttr("required");
	                	$("#opt2").removeAttr("required");
	                	$("#txtTextfieldlabel").val('');
	                	$("#txtTextfieldlength").val('');
	                	$('input[type=radio]').prop('checked', false);
	            }	 	
	 			else if(val=="phone")
	 			{
	 				 	$("#txtTextfieldlabel").attr("required");
	                	$("#txtTextfieldlength").attr("required");
	                	$("#opt1").removeAttr("required");
	                	$("#opt2").removeAttr("required");
	                	$("#txtTextfieldlabel").val('');
	                	$("#txtTextfieldlength").val('');
	                	$('input[type=radio]').prop('checked', false);
	            }
	 			else if(val=="textarea")
	 			{
	                	$("#txtTextfieldlabel").attr("required","required");	
	                	$("#txtTextfieldlength").removeAttr("required");
	                	$("#opt1").removeAttr("required");
	                	$("#opt2").removeAttr("required");
	                	$("#txtTextfieldlabel").val('');
	                	$("#txtTextfieldlength").val('');
	                	$('input[type=radio]').prop('checked', false);
	            }
	            else
	            {
	                $(".box").hide();
	            }
	}


	
   function viewFielddetails(val)
   {

	         if(val=="text"){
	                $("#fieldlabel").show();
	                $("#fieldlength").show();
					 $("#fieldvalue").hide();
					 $("#multiselct").hide();
					  $("#date").hide();
					  $("#opt1").prop( "checked", false );
					  $("#opt2").prop( "checked", false );
	                }

	            else if(val=="number"){

	            	  $("#fieldlabel").show();
	                  $("#fieldlength").show();
	  				 $("#fieldvalue").hide();
	  				 $("#multiselct").hide();
	  				  $("#date").hide();
	  				 $("#opt1").prop( "checked", false );
					  $("#opt2").prop( "checked", false );
	            }
				else if(val=="picklist"){

					  $("#fieldlabel").show();
	                  $("#fieldlength").hide();
	  				 $("#fieldvalue").show();
	  				 $("#multiselct").show();
	  				  $("#date").hide();
	  				 //$("#opt1").prop( "checked", false );
					  //$("#opt2").prop( "checked", false );
	            }
	 			else if(val=="date"){
	 				  $("#fieldlabel").show();
	 	                $("#fieldlength").hide();
	 					 $("#fieldvalue").hide();
	 					 $("#multiselct").hide();
	 					  $("#date").hide();
	 					 $("#opt1").prop( "checked", false );
	 					  $("#opt2").prop( "checked", false );

	             }	 			
	 			else if(val=="email"){

	 				 $("#fieldlabel").show();
		                $("#fieldlength").show();
						 $("#fieldvalue").hide();
						 $("#multiselct").hide();
						  $("#date").hide();
						  $("#opt1").prop( "checked", false );
						  $("#opt2").prop( "checked", false );

	             }	 	
	 			else if(val=="phone"){
	 				 $("#fieldlabel").show();
		                $("#fieldlength").show();
						 $("#fieldvalue").hide();
						 $("#multiselct").hide();
						  $("#date").hide();
						  $("#opt1").prop( "checked", false );
						  $("#opt2").prop( "checked", false );
	             }
	 			else if(val=="textarea"){
	 				 $("#fieldlabel").show();
		                $("#fieldlength").hide();
						 $("#fieldvalue").hide();
						 $("#multiselct").hide();
						  $("#date").hide();
						  $("#opt1").prop( "checked", false );
						  $("#opt2").prop( "checked", false );
	             }
	            else{
	                $(".box").hide();
	            }
	   }
      


	function single() {

    $("#fieldlabel").show();
    $("#fieldlength").hide();
	 $("#fieldvalue").show();
	 $("#multiselct").show();
	 $("#date").hide();

}


var counter = document.getElementById('imgcounter').value+1;

function addInput(divName)
{
		 var newdiv = document.createElement('Div');
	     newdiv.innerHTML = '<div id = "myDiv'+counter+'"><div class="input-group col-md-12"> <input type="text" id="field'+counter+'" name="field[]" class="form-control" required style="width:91%" />   &nbsp;&nbsp;&nbsp;&nbsp;<button class=\"content_body btn btn-info\" href=\'javascript:void(0)\' onclick=\'removeElement(\"' + counter + '\")\'> - </button></div><br><br></div></div>';
		 document.getElementById(divName).appendChild(newdiv); 
		  counter++;			
		  document.getElementById("imgcounter").value=counter;
	 
}

function removeElement(val)
{
	 var d = document.getElementById('myDiv' + val);

	d.remove();
}





	

    //var next = 1;

    // $(".add-more").click(function(e){

    //     e.preventDefault();

    //     var addto = "#field" + next;

    //     var addRemove = "#field" + (next);

    //     next = next + 1;

    //     var newIn = '<input autocomplete="off" class=" input-group  col-md-11" id="field' + next + '" name="field[]" type="text">';

    //     var newInput = $(newIn);

    //     var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" >-</button></div><div id="field">';

    //     var removeButton = $(removeBtn);

    //     $(addto).after(newInput);

    //     $(addRemove).after(removeButton);

    //     $("#field" + next).attr('data-source',$(addto).attr('data-source'));

    //     $("#count").val(next);  

        

    //         $('.remove-me').click(function(e){

    //             e.preventDefault();

    //             var fieldNum = this.id.charAt(this.id.length-1);

    //             var fieldID = "#field" + fieldNum;

    //             $(this).remove();

    //             $(fieldID).remove();

    //         });

    // });


    //  function addMore()
    //  {
    //            var addto = "#field" + next;

    // 	        var addRemove = "#field" + (next);

    // 	        next = next + 1;

    // 	        var newIn = '<input autocomplete="off" class=" input-group  col-md-11" id="field' + next + '" name="field[]" type="text">';

    // 	        var newInput = $(newIn);

    // 	        var removeBtn = '<a id="remove' + (next - 1) + '" class="btn btn-danger remove-me" onclick="removeMore(' + (next - 1) + ')" >-</a></div><div id="field">';

    // 	        var removeButton = $(removeBtn);

    // 	        $(addto).after(newInput);

    // 	        $(addRemove).after(removeButton);

    // 	        $("#field" + next).attr('data-source',$(addto).attr('data-source'));

    // 	        $("#count").val(next);  

    //      }
    
    //    function removeMore(id)
    //    {

    	  
        
    //        $("#field"+id).remove();
    //        $("#remove"+id).remove();
    //        $('#custom_field').modal('show'); 

          
    //    }


$(function () {


});



$("#selectall").click(function(){



$('.hide_element').css('visibility','visible');

 });



function chechCheckbox(id)
{

     var count='<?php echo count($resultField)?>';
     var field=[];
     
     for (var i=1;i<=count;i++)
     {
   	  if($('#chk'+i).is(':checked'))
   	  {
   		field.push($("#chk"+i).val());
   	  	 
   		   
   	  }
      } 


     if (field.length === 0) {
   	   alert ("Please select the field name");
   	      
   	}
     else
     {
    $.post("<?php echo base_url();?>head/setting/changefieldStatus",{id:id,field:field},function(data){
              
              location.reload(true);
               });
          
      }  
    

}


function getRecord()
{
			var count='<?php echo count($resultField)?>';

			var get_edit_records;

			var field_1;	

			var field;
	    

			for (var i=1;i<=count;i++)
	    	{
			  	  if($('#chk'+i).is(':checked'))
			  	  {
			  			field_1=$("#chk"+i).val(); 
		  		  }
			}

			var dd="";
//		get_edit_records=getEditRecordDetails(field_1);
		$.post("<?php echo base_url();?>head/setting/getEditRecordDetails",{record_id:field_1},function(data)
		{
						//console.log(data);

								 dd=data;					


						  		 $.post("<?php echo base_url();?>head/setting/getFieldrecord",{field:field_1},function(data)
						  		  {
						  		  			
						                    $('#custom_field').html(data);

						                  	if(dd!=0)
							  		 		{
								  			      if(dd==2)
								  			      {
								  			      		$("#optedit2").prop("checked",true);
								  			      }	
								  			      else
								  			      {
								  			      		$("#optedit1").prop("checked",true);
								  			      }
							  			  	}

						                  $('#custom_field').modal('show'); 
						                  //$('#otp_edit').modal('hide'); 
						                  $("select").change();
						                
						          });
		});	    	 
}


function getEditRecordDetails(edit_id)
{
		var return_data;

		// $.post("<?php //echo base_url();?>head/setting/getEditRecordDetails",{record_id:edit_id},function(data){
		// 				//console.log(data);

		// 				return_data=data;
  //               });
		//console.log(return_data);
		return return_data;
}


function verifyOtp(val)
{

    var activePassword=$("#txtActive").val();
    var dactivePassword=$("#txtDeactive").val();
    var editPassword=$("#txtEdit").val();

     if(val=="Active" && activePassword!="")
     {
           var Password=activePassword;
     	   $.post("<?php echo base_url();?>head/setting/validateOtp",{Password},function(data){
                    if(data==1)
                    {
                    	chechCheckbox(1);
                        }
                    else
                    {
                           alert("OTP mismatch");
                        }
                });


         }
     else if( val=="Deactive" && dactivePassword!="") 
     {
    	  var Password=dactivePassword;
    	   $.post("<?php echo base_url();?>head/setting/validateOtp",{Password},function(data){
                   if(data==1)
                   {
                   	chechCheckbox(0);
                       }
                   else
                   {
                          alert("OTP mismatch");
                       }
               });


          }
     else if(val=="Edit" && editPassword!="") 
     {

    	 var Password=editPassword;
  	     $.post("<?php echo base_url();?>head/setting/validateOtp",{Password},function(data){
                 if(data==1)
                 {
                 	  getRecord();
                     }
                 else
                 {
                        alert("OTP mismatch");
                     }
             });
         }
     else
     {
          alert("Enter password");
         }
	     
	
 }



 function deleteVisitor()
 {
 			var count=<?php echo count($resultField)?>;
            var visitorid=[];                     
                     
             for (var i=0;i<=count;i++)
             {
                  if($('#chk'+i).is(':checked'))
                  {
                      visitorid.push($("#chk"+i).val());                              
                  }
             } 
                                  
            $.post("<?php echo base_url();?>head/setting/deleteVisitor",{visitor_id:visitorid},function(data){               
                      location.reload(true);
                 });
 }


 function resetFields()
 {
 	// 	$("#form1").validate().resetForm();
		// $("#form1").reset();

		// $("#fieldlabel").hide();
	 //    $("#fieldlength").hide();
		// $("#fieldvalue").hide();
		// $("#multiselct").hide();
		// $("#date").hide();
		// $("#opt1").prop( "checked", false );
		// $("#opt2").prop( "checked", false );

			// $("#form1").validate().resetForm();
			// $("#form1").reset();

			$("#selFieldtype").val(0);
			$("#fieldlabel").hide();
            $("#fieldlength").hide();
			$("#fieldvalue").hide();
			$("#multiselct").hide();
			//$("#first").hide();
			$("#first").html('');
			$("#date").hide();
			$("#opt1").prop( "checked", false );
			$("#opt2").prop( "checked", false );


   //      	$("#fieldlabel").css("display","none");
   //          $("#fieldlength").css("display","none");
			// $("#fieldvalue").css("display","none");
			// $("#multiselct").css("display","none");
			// $("#date").css("display","none");
			// $("#opt1").prop( "checked", false );
			// $("#opt2").prop( "checked", false );


 }



</script>
