<div class="page-content-wrapper">
	<div class="page-content">
		<div class="row">
			<!--modal-->
			<!--end modal-->
			<div class="col-md-12">
				<div class=" app-ticket-list">
					<div class="page-bar row">
						<div class="col-md-6">
							<h3 class="page-title"><?php getLocalkeyword('Quick Add Management');?></h3>
							<ul class="page-breadcrumb ">
								<li><a href="<?php echo base_url()?>head/dashboard"><?php getLocalkeyword('Home');?></a> <i class="fa fa-circle"></i></li>
								<li><a href="#"><?php getLocalkeyword('Setting');?></a> <i class="fa fa-circle"></i></li>
								<li><span><?php getLocalkeyword('Quick Add Management');?></span></li>
							</ul>
						</div>
						<div class="col-md-6">
							<div id="reportrange" class="btn pull-right " style="padding-top: 12px;">
								<i class="fa fa-calendar"></i> &nbsp; <span class="thin uppercase hidden-xs">August 28, 2016 - September 26, 2016</span> <b class="fa fa-angle-down"></b>
							</div>
						</div>
					</div>
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
						<!--end modal-->
						<div class="col-md-12">
							<div class="table-toolbar">
								<div class="portlet light">
									<div class="portlet-body">
										<div class="col-md-6">
											<h3 class="page-title" style="font-size: 18px;"><?php getLocalkeyword('Predefined Fields');?></h3>
											<div class="checkbox">
												<input type="checkbox" value="Title" name="chkPredefine[]" id="chkPredefine0"
												<?php 
												  if($resultPredefine[0]->predefine_show==1)
												  {
												  	echo "checked";
												  }
												?>> <select class="form-control">
													<option>Select Title</option>
												</select>
											</div>
											<div class="checkbox">
												<input type="checkbox" value="Name" name="chkPredefine[]" id="chkPredefine1"
												<?php 
												  if($resultPredefine[1]->predefine_show==1)
												  {
												  	echo "checked";
												  }
												?>>
												
												<div class="col-md-4 pl0">
													<input type="text" class=" form-control" placeholder="First name">
												</div>
												<div class="col-md-4">
													<input type="text" class=" form-control" placeholder="Middle name">
												</div>
												<div class="col-md-4 pr0">
													<input type="text" class=" form-control" placeholder="Last name">
												</div>
											</div>
											<div class="clearfix"></div>
											<div class="checkbox">
												<input type="checkbox" value="Mobile" name="chkPredefine[]" id="chkPredefine2"
												<?php 
												  if($resultPredefine[2]->predefine_show==1)
												  {
												  	echo "checked";
												  }
												?>>
												<div class="col-md-12 pd0">
													<input type="text" class=" form-control" placeholder="Mobile No.">
												</div>
											</div>
											<div class="clearfix"></div>
											<div class="checkbox">
												<input type="checkbox" value="Email" name="chkPredefine[]" id="chkPredefine3"
												<?php 
												  if($resultPredefine[3]->predefine_show==1)
												  {
												  	echo "checked";
												  }
												?>>
												<div class="col-md-12 pd0">
													<input type="text" class=" form-control" placeholder="Email Id">
												</div>
											</div>
											<div class="clearfix"></div>
											<div class="checkbox">
												<input type="checkbox" value="Group" name="chkPredefine[]" id="chkPredefine4"
												<?php 
												  if($resultPredefine[4]->predefine_show==1)
												  {
												  	echo "checked";
												  }
												?>> 
												<select class="form-control">
													<option>Contact group</option>
												</select>
											</div>
											<div class="clearfix"></div>
											<div class="checkbox">
												<input type="checkbox" value="BusinessCategory" name="chkPredefine[]" id="chkPredefine5"
												<?php 
												  if($resultPredefine[5]->predefine_show==1)
												  {
												  	echo "checked";
												  }
												?>>
												 <select class="form-control">
													<option>Select Business Category</option>
												</select>
											</div>
											<div class="clearfix"></div>
											<div class="checkbox">
												<input type="checkbox" value="BusinessName" name="chkPredefine[]" id="chkPredefine6"
												<?php 
												  if($resultPredefine[6]->predefine_show==1)
												  {
												  	echo "checked";
												  }
												?>>
												<div class="col-md-12 pd0">
													<input type="text" class=" form-control" placeholder="Business Name">
												</div>
												<div class="clearfix"></div>
												<div class="checkbox">
													<input type="checkbox" value="Address" name="chkPredefine[]" id="chkPredefine7"
													<?php 
												  if($resultPredefine[7]->predefine_show==1)
												  {
												  	echo "checked";
												  }
												?>>
													<div class="col-md-12 pd0">
														<input type="text" class=" form-control" placeholder="Address">
													</div>
													<div class="clearfix"></div>
													<div class="checkbox">
														<input type="checkbox" value="Country" name="chkPredefine[]" id="chkPredefine8"
														<?php 
												  if($resultPredefine[8]->predefine_show==1)
												  {
												  	echo "checked";
												  }
												?>>
														 <select class="form-control">
															<option>Country</option>
														</select>
													</div>
													<div class="clearfix"></div>
													<div class="checkbox">
														<input type="checkbox" value="State" name="chkPredefine[]" id="chkPredefine9"
														<?php  
												  if($resultPredefine[9]->predefine_show==1)
												  {
												  	echo "checked";
												  }
												?>
														> <select class="form-control">
															<option value="">State</option>
														</select>
													</div>
													<div class="clearfix"></div>
													<div class="checkbox">
														<input type="checkbox" value="City" name="chkPredefine[]" id="chkPredefine10"
														<?php 
												  if($resultPredefine[10]->predefine_show==1)
												  {
												  	echo "checked";
												  }
												?>> <select class="form-control">
															<option value="">City</option>
														</select>
													</div>
													<div class="clearfix"></div>
													<div class="checkbox">
														<input type="checkbox" value="Zipcode" name="chkPredefine[]" id="chkPredefine11"
														<?php 
												  if($resultPredefine[11]->predefine_show==1)
												  {
												  	echo "checked";
												  }
												?>>
														<div class="col-md-12 pd0">
															<input type="text" class=" form-control" placeholder="Zip Code">
														</div>
														<div class="clearfix"></div>
														<div class="checkbox">
															<input type="checkbox" value="Website" name="chkPredefine[]"  id="chkPredefine12"
															<?php 
												  if($resultPredefine[12]->predefine_show==1)
												  {
												  	echo "checked";
												  }
												?>>
															<div class="col-md-12 pd0">
																<input type="text" class=" form-control" placeholder="Website">
															</div>
															<div class="clearfix"></div>
															<div class="checkbox">
																<input type="checkbox" value="landline" name="chkPredefine[]" id="chkPredefine13"
																<?php 
												  if($resultPredefine[13]->predefine_show==1)
												  {
												  	echo "checked";
												  }
												?>>
																<div class="col-md-12 pd0">
																	<input type="text" class=" form-control" placeholder="Landline No.">
																</div>
																<div class="clearfix"></div>
																<div class="checkbox">
																	<input type="checkbox" value="Fax" name="chkPredefine[]" id="chkPredefine14"
																	<?php 
												  if($resultPredefine[14]->predefine_show==1)
												  {
												  	echo "checked";
												  }
												?>>
																	<div class="col-md-12 pd0">
																		<input type="text" class=" form-control" placeholder="Fax">
																	</div>
																	<div class="clearfix"></div>
																	<div class="checkbox">
																		<input type="checkbox" value="Birthdate" name="chkPredefine[]" id="chkPredefine15"
																		<?php 
												  if($resultPredefine[15]->predefine_show==1)
												  {
												  	echo "checked";
												  }
												?>>
																		<div class="col-md-12 pd0">
																			<div class="input-group  date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
																				<input type="text" class="form-control" readonly placeholder="DOB"> <span class="input-group-btn">
																					<button class="btn default" type="button">
																						<i class="fa fa-calendar"></i>
																					</button>
																				</span>
																			</div>
																		</div>
																	</div>
																	<div class="clearfix"></div>
																	<div class="checkbox">
																		<input type="checkbox" value="Anniversary" name="chkPredefine[]" id="chkPredefine16"
																		<?php 
												  if($resultPredefine[16]->predefine_show==1)
												  {
												  	echo "checked";
												  }
												?>>
																		<div class="col-md-12 pd0">
																			<div class="input-group  date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
																				<input type="text" class="form-control" readonly placeholder="Anniversary Date"> <span class="input-group-btn">
																					<button class="btn default" type="button">
																						<i class="fa fa-calendar"></i>
																					</button>
																				</span>
																			</div>
																		</div>
																	</div>
																	<div class="clearfix"></div>
																	<div class="checkbox">
																		<input type="checkbox" value="Note" name="chkPredefine[]" id="chkPredefine17"
																		<?php 
												  if($resultPredefine[17]->predefine_show==1)
												  {
												  	echo "checked";
												  }
												?>>
																		<div class="col-md-12 pd0">
																			<textarea rows="4" class="form-control" placeholder="Note"> </textarea>
																		</div>
																		<div class="clearfix"></div>
																		
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
										<div class="col-md-6">
											<h3 class="page-title" style="font-size: 18px;"><?php getLocalkeyword('Additional Fields');?></h3><br>																					<?php
											for($i=0;$i < count($resultField);$i ++)
											{
												
												$fieldType=$resultField[$i]->visitfield_type;
												
												$type="";
												if ($fieldType == "text" || $fieldType == "date")
												{
													$type="text";
												} elseif ($fieldType == "picklist")
												{
													$type="select";
												} elseif ($fieldType == "email")
												{
													$type="email";
												} elseif ($fieldType == "number" || $fieldType == "phone")
												{
													$type="number";
												} else
												{
													$type="textarea";
												}
												
												$verify=$this->db->query("SELECT `additional_id_pk`, `additional_visitfieldid_fk`, `additional_status` FROM `tblmvbquickadditional` 
													                      WHERE additional_visitfieldid_fk='".$resultField[$i]->visitfield_id_pk."'");
												$verify=$verify->result();
												
												$verify_status="";
												
												if(count($verify)>0)
												{
													$verify_status="checked";
												}	
												
												?>
											<div class="input-group">
												  <span class="input-group-addon bgnone">
												    <input type="checkbox" <?php echo $verify_status;?> value="<?php echo  $resultField[$i]->visitfield_id_pk?>" name="chkAdditional[]" id="chkAdditional<?php echo $i;?>" > 
												    <span>
												    </span> 
												  </span>
												  <?php 
											   if($type!="textarea")
												{
													if ($type != "select")
													{
													?>												     
													  <input type="<?php echo $type;?>" placeholder="<?php echo $resultField[$i]->visitfield_name?>" name="<?php echo $resultField[$i]->visitfield_name;?>" <?php if($fieldType=="text" || $fieldType=="email" || $fieldType=="number" || $fieldType=="phone"){?> maxlength="<?php echo $resultField[$i]->visitfield_length;?>" <?php } ?> <?php if($fieldType=='date'){?> class="form-control date-picker" <?php }else{ ?> class="form-control" <?php } ?>>											        
													  <?php	
													 }	
													 else 												 	
													 {   $v=$resultField[$i]->val;
													     $v=explode(",",$v);
													     $selcriteria="";
					                                     if($resultField[$i]->visitfield_selection==2)
					                                     {
					                                     	$selcriteria="multiple";
					                                     }
													   
													     ?>
													     <div class="col-md-4 input-group" >
													    <span class="bgnone"> 
													    
													      <select class="form-control" <?php echo $selcriteria;?> name="<?php echo $resultField[$i]->visitfield_name;?>" id="<?php echo $resultField[$i]->visitfield_name;?>">
													      <option value=""> Select <?php echo $resultField[$i]->visitfield_name?></option>
													     <?php 
													     
													     for($j=0;$j<count($v);$j++)			
													    
													     {	
													     	?>
													     	<option value="<?php echo $v[$j];?>"><?php echo $v[$j];?></option>
													     	<?php 
													     	
													     }	?>												
													  </select>
													    
													      <span> 
													      </span>
													    </span>
													  </div>												
													  <?php
													    }
													}
												
												else
												{
												?>											     
												  <textarea name="<?php echo $resultField[$i]->visitfield_name;?>" placeholder="<?php echo $resultField[$i]->visitfield_name?>" class="form-control">
												  </textarea>											    
												  <?php 												 }	?>											
												</div>
												<br>
												<?php }?>
													</div>
													<?php
													if(getAccessRights('mvbSetQamAdd'))
													{
													?>	
													<div class="col-md-12 pd0">
														<div class="form-group  pull-right">
															<button type="button" onclick="saveFields();" class="btn btn-primary"><?php getLocalkeyword('Save');?></button>
															<button type="button" data-dismiss="modal" class="btn btn-danger"><?php getLocalkeyword('Cancel');?></button>
														</div>
													</div>
													<?php
													}
													?>
	         	                                </div>
								</div>
							</div>
							
<script>
 function saveFields()
 {
	       var count =18;
	       var count2=<?php echo count($resultField);?>;
            var links_id = [];
            var links_id1 = [];

            for(var i = 0; i < count; i++) 
            {
                if ($('#chkPredefine' + i).is(':checked')) 
                {
                    links_id.push($("#chkPredefine" + i).val());
                }
            }
            for(var i = 0; i < count2; i++) 
            {
                if ($('#chkAdditional' + i).is(':checked')) 
                {
                    links_id1.push($("#chkAdditional" + i).val());
                }
            }

           
              

                $.post("<?php echo base_url();?>head/setting/setPredefinefields", {
                        all_links_id: links_id,all_links_id1: links_id1
                    }, function(data) {
                        location.reload(true);
                       // alert(data);
                    });  
            
     

	 }
</script>