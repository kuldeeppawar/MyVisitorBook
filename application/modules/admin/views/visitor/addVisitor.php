<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class=" app-ticket-list">
                    <div class="page-bar row">
                        <div class="col-md-6">
                            <h3 class="page-title"><?php getLocalkeyword('Add New Visitor');?></h3>
                            <ul class="page-breadcrumb ">
                                <li><a href="<?php echo base_url()?>admin/dashboard"><?php getLocalkeyword('Home');?></a> <i class="fa fa-circle"></i></li>
                                <li><a href="<?php echo base_url()?>admin/visitor"><?php getLocalkeyword('Visitor Management');?></a> <i class="fa fa-circle"></i></li>
                                <li><span><?php getLocalkeyword('Add New Visitor');?></span></li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <div id="reportrange" class="btn pull-right " style="padding-top: 12px;">
                                <i class="fa fa-calendar"></i> &nbsp; <span class="thin uppercase hidden-xs">August 28, 2016 - September 26, 2016</span> <b class="fa fa-angle-down"></b>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <form role="form" id="frmAdd" method="post" action="<?php echo base_url()?>admin/visitor/addVisitor" enctype="multipart/form-data">
                                <div class="form-body" style="padding-top: 10px;">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label><?php getLocalkeyword('Select Title');?><span class="mandatory">*</span></label> <select class="form-control" name="selTitle" id="selTitle" required="required">
                                                    <option value="">Select Title</option>
                                                    <option value="Mr">Mr</option>
                                                    <option value="Miss">Miss</option>
                                                    <option value="Shri">Shri</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label><?php getLocalkeyword('First name');?> <span class="mandatory">*</span></label> <input type="text" class="form-control" placeholder="First name" name="txtFirstname" id="txtFirstname"
                                                                                                                                                  required="required">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label><?php getLocalkeyword('Middle Name');?> </label> <input type="text" class="form-control" placeholder="Middle Name" name="txtMiddlename" id="txtMiddlename">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label><?php getLocalkeyword('Last Name');?> <span class="mandatory">*</span></label> <input type="text" class="form-control" placeholder="Last Name" name="txtLastname" id="txtLastname"
                                                                                                                                                 required="required">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label><?php getLocalkeyword('Mobile Number');?> <span class="mandatory">*</span></label>
                                                <input type="text" maxlength="10" minlength="10" title="Mobile number should start with 7,8 or 9" class="form-control" pattern="^[0]?[789]\d{9}$"  name="txtMobilenumber" placeholder="Mobile Number" id="txtMobilenumber" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label><?php getLocalkeyword('Email Id');?> </label> <input type="email" class="form-control" placeholder="Email Id" name="txtEmail" id="txtEmail">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="profile-content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <ul class="nav nav-tabs">
                                                    <li class="active"><a data-toggle="tab" href="#tab1"><?php getLocalkeyword('Contact Details');?></a></li>
                                                    <li><a data-toggle="tab" href="#tab2"><?php getLocalkeyword('Personal Info');?></a></li>
                                                    <li><a data-toggle="tab" href="#tab4"><?php getLocalkeyword('Notes');?></a></li>
                                                    <li><a data-toggle="tab" href="#tab5"><?php getLocalkeyword('Additional Info');?></a></li>
                                                    <li><a data-toggle="tab" href="#tab3"><?php getLocalkeyword('Profile Pic');?></a></li>
                                                </ul>
                                                <!-- Modal -->
                                                <!-- ends -->
                                                <div class="form-horizontal">
                                                    <div class="tab-content">
                                                        <div id="tab1" class="tab-pane fade in active">
                                                            <div class="row">
                                                                <div class="col-md-6" style="border-right: solid 1px #eaeaea;">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3" style="text-align: left;"><?php getLocalkeyword('Enter Address');?>
                                                                        </label>
                                                                        <div class="col-md-8">
                                                                            <input type="text" class="form-control" name="txtAddress" id="txtAddress" placeholder="Enter Your address" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3" style="text-align: left;"><?php getLocalkeyword('Enter Country');?>
                                                                        </label>
                                                                        <div class="col-md-8">
                                                                            <select class="form-control" name="selCountry" id="selCountry" onchange="getState(this.value);">
                                                                                <option value="">Select Country</option>																				  <?php																					for($i=0;$i<count($resultCountry);$i++)																					{?>																					<option
                                                                                        value="<?php echo $resultCountry[$i]->cntr_id_pk;?>" <?php if($resultCountry[$i]->cntr_status==0){  echo "disabled"; } ?>
                                                                                >																					<?php echo $resultCountry[$i]->cntr_name;?></option>																					<?php 																					}																					?>																			</select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3" style="text-align: left;"><?php getLocalkeyword('Enter State');?>
                                                                        </label>
                                                                        <div class="col-md-8">
                                                                            <select class="form-control" name="selState" id="selState" onchange="getCity(this.value)">
                                                                                <option value="">Select State</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3" style="text-align: left;"><?php getLocalkeyword('Enter City');?>
                                                                        </label>
                                                                        <div class="col-md-8">
                                                                            <select class="form-control" name="selCity" id="selCity">
                                                                                <option value="">Select City</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3" style="text-align: left;"><?php getLocalkeyword('Enter Zip Code');?>
                                                                        </label>
                                                                        <div class="col-md-8">
                                                                            <input type="text" class="form-control" name="txtZip" placeholder="Enter Zip Code" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3" style="text-align: left;"><?php getLocalkeyword('Your Website');?>
                                                                        </label>
                                                                        <div class="col-md-8">
                                                                            <input type="text" class="form-control" name="txtWebsite" placeholder="Enter your website URL" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3" style="text-align: left;"><?php getLocalkeyword('Landline Number');?>
                                                                        </label>
                                                                        <div class="col-md-8">
                                                                            <input type="text" class="form-control" name="txtLandline" placeholder="Enter your Landline Number" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3" style="text-align: left;"><?php getLocalkeyword('Fax');?>
                                                                        </label>
                                                                        <div class="col-md-8">
                                                                            <input type="text"  class="form-control" name="txtFax" placeholder="Enter your FAX Number">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="tab2" class="tab-pane fade">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4" style="text-align: left;"><?php getLocalkeyword('Select Contact Group');?>
                                                                        </label>

                                                                        <link rel="stylesheet" href="<?php echo base_url(); ?>themes/assets/global/plugins/bootstrap-select/css/bootstrap-select.css">
                                                                        <!--                                                                        <script src="--><?php //echo base_url(); ?><!--themes/assets/global/plugins/bootstrap/js/bootstrap.min.js"></script>-->
                                                                        <script src="<?php echo base_url(); ?>themes/assets/global/plugins/bootstrap-select/js/bootstrap-select.js"></script>


                                                                        <div class="col-md-7">
                                                                            <select id="selGroup" name="selGroup[]" class="form-control" data-placeholder="Select Group">
                                                                                <option value="">Select Contact Group</option>
                                                                                <?php	for($i=0;$i<count($resultGroup);$i++)
                                                                                {	?>
                                                                                    <option	value="<?php echo $resultGroup[$i]->grp_id_pk;?>" <?php if($resultGroup[$i]->grp_status==0){  echo "disabled"; } ?>>
                                                                                        <?php echo $resultGroup[$i]->grp_name;?>
                                                                                    </option>
                                                                                    <?php
                                                                                }
                                                                                ?>
                                                                            </select>

                                                                            <!--                                                                            <select class="selectpicker form-control" id="selGroup" name="selGroup[]" multiple="multiple" data-selected-text-format="count > 3">-->
                                                                            <!--                                                                                --><?php
                                                                            //                                                                                for($i=0;$i<count($resultGroup);$i++)
                                                                            //                                                                                {  ?>
                                                                            <!--                                                                                    <option data-tokens="--><?php //echo $resultGroup[$i]->grp_name; ?><!--" value="--><?php //echo $resultGroup[$i]->grp_id_pk; ?><!--">--><?php //echo $resultGroup[$i]->grp_name; ?><!--</option>-->
                                                                            <!--                                                                                    --><?php
                                                                            //                                                                                } ?>
                                                                            <!--                                                                            </select>-->

                                                                            <!--                                                                            <select id="selectSearchName" name="selectSearchName[]" multiple="multiple" class="selectpicker form-control" multiple data-live-search="true">-->
                                                                            <!--                                                                                --><?php
                                                                            //                                                                                for($i=0;$i<count($resultGroup);$i++)
                                                                            //                                                                                {  ?>
                                                                            <!--                                                                                    <option data-tokens="--><?php //echo $resultGroup[$i]->grp_name; ?><!--" value="--><?php //echo$resultGroup[$i]->grp_id_pk;; ?><!--">--><?php //echo $resultGroup[$i]->grp_name; ?><!--</option>-->
                                                                            <!--                                                                                    --><?php
                                                                            //                                                                                } ?>
                                                                            <!--                                                                            </select>-->
                                                                        </div>


                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4" style="text-align: left;"><?php getLocalkeyword('Select Business Category');?>
                                                                        </label>
                                                                        <div class="col-md-7">
                                                                            <select class="form-control" name="selBusiness" id="selBusiness" >
                                                                                <option value="">Select Category</option>
                                                                                <option value="IT">IT</option>
                                                                                <option value="Manufacturing">Manufacturing</option>
                                                                                <option value="Logistick">Logistick</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4" style="text-align: left;"><?php getLocalkeyword('Business Name');?>
                                                                        </label>
                                                                        <div class="col-md-7">
                                                                            <input type="text" class="form-control" placeholder="Enter Business Name" name="txtBusinessname"/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4" style="text-align: left;"><?php getLocalkeyword('DOB');?>
                                                                        </label>
                                                                        <div class="col-md-7">
                                                                            <div class="input-group input-medium date date-picker" data-date-end-date="+0d" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                                                                                <input type="text" class="form-control" readonly name="txtBirtdate"> <span class="input-group-btn">
																					<button class="btn default" type="button">
																						<i class="fa fa-calendar"></i>
																					</button>
																				</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--  name="rpassword" -->
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4" style="text-align: left;"><?php getLocalkeyword('Anniversary Date');?>
                                                                        </label>
                                                                        <div class="col-md-7">
                                                                            <div class="input-group input-medium date date-picker" data-date-end-date="+0d" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                                                                                <input type="text" class="form-control" readonly name="txtAnniversary"> <span class="input-group-btn">
																					<button class="btn default" type="button">
																						<i class="fa fa-calendar"></i>
																					</button>
																				</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <div class="btn-group" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">
                                                                            <button id="sample_editable_1_new" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1">
                                                                                <i class="fa fa-plus"></i> <?php getLocalkeyword('Create Contact group');?>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        </div>
                                                        <div id="tab3" class="tab-pane fade">
                                                            <div class="profile-userbuttons col-md-6">
                                                                <label><?php getLocalkeyword('Upload Profile Pic');?></label> <input type="file" class="form-control col-md-3" name="txtFile">
                                                                <!-- 																<button type="button" class="btn btn-circle green btn-sm">Upload</button> -->
                                                                <br> <br>
                                                            </div>
                                                        </div>
                                                        <div id="tab4" class="tab-pane fade">
                                                            <h3 class="block"><?php getLocalkeyword('Provide your Other Details');?></h3>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label><?php getLocalkeyword('Enter Info');?></label>
                                                                    <textarea class="form-control" rows="3" placeholder="Type Here" name="txtInfo">

                                                                  </textarea>
                                                                </div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div id="tab5" class="tab-pane fade">

                                                            <h3 class="block">Additional Info</h3>
                                                            <!--														        <div class="col-md-6">-->
                                                            <!--																<div class="form-group">-->
                                                            <!--																<input type="hidden" name="head_count" value="--><?php //echo count($resultField)  ?><!--">-->
                                                            <!--												                --><?php //for($i=0;$i < count($resultField);$i ++)
                                                            //																    {
                                                            //
                                                            //																	$fieldType=$resultField[$i]->visitfield_type;
                                                            //
                                                            //																	$type="";
                                                            //																	if ($fieldType == "text" || $fieldType == "date")
                                                            //																	{
                                                            //																		$type="text";
                                                            //																	} elseif ($fieldType == "picklist")
                                                            //																	{
                                                            //																		$type="select";
                                                            //																	} elseif ($fieldType == "email")
                                                            //																	{
                                                            //																		$type="email";
                                                            //																	} elseif ($fieldType == "number" || $fieldType == "phone")
                                                            //																	{
                                                            //																		$type="number";
                                                            //																	} else
                                                            //																	{
                                                            //																		$type="textarea";
                                                            //																	}
                                                            //
                                                            //
                                                            //																	$verify_status="";
                                                            //
                                                            //
                                                            //																	?>
                                                            <!--																-->
                                                            <!--																	 --><?php /*/*?> <span class="input-group-addon bgnone">*/
                                                            /*																	    <input type="checkbox" <?php echo $verify_status;?> value="<?php echo  $resultField[$i]->visitfield_id_pk?>" name="chkAdditional[]" id="chkAdditional<?php echo $i;?>" > */
                                                            //																	    <span>
                                                            //																	    </span>
                                                            //																	  </span><?php */?>
                                                            <!--																	  <label>--><?php //getLocalkeyword($resultField[$i]->visitfield_name);?><!--</label>-->
                                                            <!--																	  -->
                                                            <!--																	    <input type="hidden" name="head1_--><?php //echo $i;?><!--" value="--><?php //echo $resultField[$i]->visitfield_id_pk;?><!--">	-->
                                                            <!--																	  --><?php //
                                                            //																		   if($type!="textarea")
                                                            //																			{
                                                            //																				if ($type != "select")
                                                            //																				{
                                                            //																				?><!--												     -->
                                                            <!--																				  <input type="--><?php //echo $type;?><!--" name="head_--><?php //echo $i;?><!--[]" class="form-control" -->
                                                            <!--																				  --><?php
                                                            //																				  if($type == "text" || $type == "number" || $type == "email" || $type == "phone")
                                                            //																					  {
                                                            //																				   ?><!--	  	-->
                                                            <!--																					  	   maxlength="--><?php //echo $resultField[$i]->visitfield_length;?><!--"-->
                                                            <!--																					--><?php //
                                                            //																					  }
                                                            //																					?><!--	-->
                                                            <!--																						>	        -->
                                                            <!--																				  --><?php	//
                                                            //																				 }
                                                            //																				 else
                                                            //																				 {   $v=$resultField[$i]->val;
                                                            //																				     $v=explode(",",$v);
                                                            //																				     $selcriteria="";
                                                            //												                                     if($resultField[$i]->visitfield_selection==2)
                                                            //												                                     {
                                                            //												                                     	$selcriteria="multiple";
                                                            //												                                     }
                                                            //
                                                            //																				     ?>
                                                            <!--																				  -->
                                                            <!--																				     <select class="form-control" --><?php //echo $selcriteria;?><!-- name="head_--><?php //echo $i;?><!--[]" id="--><?php //echo $resultField[$i]->visitfield_id_pk;?><!--">-->
                                                            <!--																				      <option value=""> Select </option>-->
                                                            <!--																				     --><?php //
                                                            //
                                                            //																				     for($j=0;$j<count($v);$j++)
                                                            //
                                                            //																				     {
                                                            //																				     	?>
                                                            <!--																				     	<option value="--><?php //echo $v[$j];?><!--">--><?php //echo $v[$j];?><!--</option>-->
                                                            <!--																				     	--><?php //
                                                            //
                                                            //																				     }	?><!--												-->
                                                            <!--																				  </select>-->
                                                            <!--																				    -->
                                                            <!--																				  												-->
                                                            <!--																				  --><?php
                                                            //																				    }
                                                            //																				}
                                                            //
                                                            //																			else
                                                            //																			{
                                                            //																			?><!--											     -->
                                                            <!--																			  <textarea name="head_--><?php //echo $i;?><!--[]" class="form-control">-->
                                                            <!--																			  </textarea>											    -->
                                                            <!--																			  --><?php //
                                                            //																			 }	?><!--											-->
                                                            <!--																			-->
                                                            <!--																	<br>-->
                                                            <!--																	--><?php
                                                            //                                                                    }?>
                                                            <!--                                                                    </div>-->
                                                            <!--                                                               </div>-->
                                                            <div class="clearfix"></div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <input type="hidden" name="custom_count" value="<?php echo count($resultCustom)  ?>">
                                                                    <?php
                                                                    //                                                                print_r($resultCustom);
                                                                    for($i=0;$i < count($resultCustom);$i ++)
                                                                    {

                                                                        $fieldType=$resultCustom[$i]->cfi_field_type;

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


                                                                        $verify_status="";


                                                                        ?>

                                                                        <?php /*?> <span class="input-group-addon bgnone">
																	    <input type="checkbox" <?php echo $verify_status;?> value="<?php echo  $resultField[$i]->visitfield_id_pk?>" name="chkAdditional[]" id="chkAdditional<?php echo $i;?>" >
																	    <span>
																	    </span>
																	  </span><?php */?>
                                                                        <label><?php getLocalkeyword($resultCustom[$i]->cfi_label);?></label>

                                                                        <input type="hidden" name="custom1_<?php echo $i;?>" value="<?php echo $resultCustom[$i]->cfi_id_pk;?>">
                                                                        <?php
                                                                        if($type!="textarea")
                                                                        {
                                                                            if ($type != "select")
                                                                            {
                                                                                ?>
                                                                                <input type="<?php echo $type;?>" <?php if(!empty($resultCustom[$i]->cfi_length)){ ?> maxlength="<?php echo $resultCustom[$i]->cfi_length;  } ?> ?>" <?php if($resultCustom[$i]->cfi_category == '1'){ ?> required="required" <?php   } ?> name="custom_<?php echo $i;?>[]" class="form-control">	<?php
                                                                            }
                                                                            else
                                                                            {
                                                                                $v=$resultCustom[$i]->val;
                                                                                $v=explode(",",$v);
                                                                                $selcriteria="";
                                                                                if($resultCustom[$i]->cfi_picklist_type=='multiple')
                                                                                {
                                                                                    $selcriteria="multiple";
                                                                                }

                                                                                ?>

                                                                                <select class="form-control" <?php echo $selcriteria;?> name="custom_<?php echo $i;?>[]" id="<?php echo $resultCustom[$i]->cfi_id_pk;?>">
                                                                                    <option value=""> Select </option>
                                                                                    <?php

                                                                                    for($j=0;$j<count($v);$j++)

                                                                                    {
                                                                                        ?>
                                                                                        <option value="<?php echo $v[$j];?>"><?php echo $v[$j];?></option>
                                                                                        <?php

                                                                                    }	?>
                                                                                </select>


                                                                                <?php
                                                                            }
                                                                        }

                                                                        else
                                                                        {
                                                                            ?>
                                                                            <textarea name="custom_<?php echo $i;?>[]" class="form-control">
																			  </textarea>
                                                                            <?php
                                                                        }	?>

                                                                        <br>
                                                                        <?php
                                                                    }?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class=" pull-right">
                                                                <button type="submit" name="btnSubmit" class="btn btn-primary"><?php getLocalkeyword('Save');?></button>
                                                                <a type="button" href="<?php echo base_url()?>admin/visitor" class="btn btn-danger"><?php getLocalkeyword('Cancel');?></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <!-- crate group starts here -->
                                <!-- Modal for add user-->
                                <div id="myModal1" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h2 class="modal-title text-left">
                                                    <i class="fa fa-user-plus"></i><?php getLocalkeyword('Create Contact Group');?>
                                                </h2>

                                            </div>
                                            <div class="modal-body">
                                                <div class="portlet-body form">
                                                    <div class="form-body">
                                                        <div class="row" id="frmAddgroup">
                                                            <div class="col-md-10 pull-left">
                                                                <label><?php getLocalkeyword('Group Name');?> <small>(char limit-20)</small></label> <input type="text" name="txtGroupname" id="txtGroupname" class="form-control" placeholder="Group Name"
                                                                                                                                                            maxlength="20">
                                                            </div>
                                                            <div class="col-md-2 pull-right">
                                                                <button type="submit" onclick="submitgroupDetails();" class="btn btn-primary" style="margin-top: 24px;"><?php getLocalkeyword('Save');?></button>
                                                            </div>
                                                        </div>
                                                        <?php /*?>
														<div class="col-md-12">
															<div class="row">
																<div class="input-group col-md-6">
																	<div class="mt-checkbox-list"> <label class="mt-checkbox mt-checkbox-outline" id="advance" style="line-height: 16px; margin-bottom: 0px;"> <input type="checkbox" name="colorCheckbox" value="green"> Advance your search <span></span>																					</label>																		</div>
																</div>
																<div class="" style="display: none;" id="advance_form">
																	<div class="row">
																		<div class="col-md-7 pull-left">
																			<div class="form-group"> <label>Select CSV File</label> <input type="file" class="form-control input-sm" placeholder="Business Name"> </div>
																		</div>
																		<div class="col-md-5 pull-right"> <button type="button" class="btn btn-danger" style="margin-top: 20px;">																							<i class="fa fa-cloud-download"></i> Download sample csv																						</button>																			</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="modal-footer" style="float: right;"> <button type="button" class="btn btn-primary">																			<i class="fa fa-level-down"></i> Import Contacts																		</button> <a href="visitor_manage.html"
															 class="btn btn-danger">Cancel</a> </div>
														<?php */?> </div>
                                                    <div class="row"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- modal ends -->
                                <!-- ends here -->
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <!-- END DASHBOARD STATS 1-->
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->
            <a href="javascript:;" class="page-quick-sidebar-toggler"> <i class="icon-login"></i>
            </a>

            <!-- END QUICK SIDEBAR -->
        </div>
        <!-- END CONTAINER -->
        <script>
            function getCity(val) {
                $.post("<?php echo base_url();?>admin/visitor/getCity", {
                    val: val
                }, function(data) {
                    $('#selCity').html(data);
                });
            }

            function getState(val) {
                $.post("<?php echo base_url();?>admin/visitor/getState", {
                    val: val
                }, function(data) {
                    $('#selState').html(data);
                });
            }
            $("#frmAdd").validate({
                ignore: "",
                rules: {
                    selTitle: {
                        required: true
                    },
                    txtFirstname: {
                        required: true
                    },
//				txtMiddlename: {
//					required: true
//				},
                    txtLastname: {
                        required: true
                    },
                    txtMobilenumber: {
                        required: true,
                        maxlength: 10,
                        remote:
                            {
                                url:"<?php echo base_url();?>admin/visitor/verifyMobile",
                                type:"POST",
                                data:
                                    {
                                        txtMobilenumber:function()
                                        {
                                            return $("#txtMobilenumber").val().trim()
                                        }
                                    }
                            }
                    },
                    txtEmail: {
//					required: true,
                        remote:
                            {
                                url:"<?php echo base_url();?>admin/visitor/verifyEmail",
                                type:"POST",
                                data:
                                    {
                                        txtEmail:function()
                                        {
                                            return $("#txtEmail").val().trim()
                                        }
                                    }
                            }
                    }
//				txtAddress: {
//					required: true
//				},
//				selCountry: {
//					required: true
//				},
//				selState: {
//					required: true
//				},
//				SelCity: {
//					required: true
//				},
//				txtZip: {
//					required: true
//				},
//				txtWebsite: {
//					required: true
//				},
//				txtLandline: {
//					required: true
//				},
//				txtFax: {
//					required: true
//				},
//				selGroup: {
//					required: true
//				},
//				selBusiness: {
//					required: true
//				},
//				txtBusinessname: {
//					required: true
//				},
//				txtBirtdate: {
//					required: true
//				},
//				txtAnniversary: {
//					required: true
//				}
                },
                messages: {
                    selTitle: {
                        required: "Please Select Title"
                    },
                    txtFirstname: {
                        required: "Please Enter First Name"
                    },
//				txtMiddlename: {
//					required: "Please Enter Middle Name"
//				},
                    txtLastname: {
                        required: "Please Enter Last Name"
                    },
                    txtMobilenumber: {
                        required: "Please Enter Mobile Number",
                        remote:jQuery.validator.format("Mobile Number is already exists")
                    },
                    txtEmail: {
//					required: "Please Enter Email",
                        remote:jQuery.validator.format("Email id already exists")
                    }
//				txtAddress: {
//					required: "Please Enter Address"
//				},
//				selCountry: {
//					required: "Please Select Country"
//				},
//				selState: {
//					required: "Please Select State"
//				},
//				SelCity: {
//					required: "Please Select City"
//				},
//				txtZip: {
//					required: "Please Enter Zipcode"
//				},
//				txtWebsite: {
//					required: "Please Enter Website Details"
//				},
//				txtLandline: {
//					required: "Please Enter Landline Number"
//				},
//				txtFax: {
//					required: "Please Enter Fax Details"
//				},
//				selGroup: {
//					required: "Please Select Group"
//				},
//				selBusiness: {
//					required: "Please Select Business Category"
//				},
//				txtBusinessname: {
//					required: "Please Enter Business Name"
//				},
//				txtBirtdate: {
//					required: "Please Enter Birth Date"
//				},
//				txtAnniversary: {
//					required: "Please Enter Anniversary Date"
//				}
                }
            });

            function submitgroupDetails() {
                var grpName = $("#txtGroupname").val();
                if (grpName != "") {
                    $.post("<?php echo base_url();?>admin/visitor/addGroup", {
                        grpName: grpName
                    }, function(data) {
//                     	location.reload();
//                    var select = document.getElementById("selGroup");
//                    var option = document.createElement('option');
//                    option.text = option.value = grpName;
//                    select.add(option, 0);
//                    data-tokens="<?php //echo $resultGroup[$i]->grp_name; ?>//"

                        $("#selGroup").append('<option data-tokens="'+grpName+'" value="'+data+'">'+grpName+'</option>');
                        $('#myModal1').modal('hide');
                    });
                } else {
                    alert("Please Enter The Group Name");
                }
            }
        </script>