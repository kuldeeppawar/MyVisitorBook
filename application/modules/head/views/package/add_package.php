<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<!-- BEGIN CONTENT BODY -->
	<div class="page-content">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class=" app-ticket-list">
					<div class="page-bar row">
						<div class="col-md-6">
							<h3 class="page-title"><?php getLocalkeyword('Add New Package');?></h3>
							<ul class="page-breadcrumb ">
								<li><a href="<?php echo base_url()."head/dashboard"?>"><?php getLocalkeyword('Home');?></a><i class="fa fa-circle"></i></li>
								<li><a href="#"><?php getLocalkeyword('Package Management');?></a> <i class="fa fa-circle"></i></li>
								<li><span>Add New Package</span></li>
							</ul>
						</div>
						<div class="col-md-6">
							<div id="reportrange" class="btn pull-right " style="padding-top: 12px;"> <i class="fa fa-calendar"></i> &nbsp; <span class="thin uppercase hidden-xs">August 28, 2016 - September 26, 2016</span> <b class="fa fa-angle-down"></b> </div>
						</div>
					</div>
					<div class="row">
						<?php if ($this->session->flashdata('success')) { ?>
						<div id="prefix_834140561262" class="custom-alerts alert alert-success fade in "> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
							<?php echo $this->session->flashdata('success'); ?> </div>
						<?php } else if ($this->session->flashdata('error')) { ?>
						<div id="prefix_1445089440962" class="custom-alerts alert alert-danger fade in"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
							<?php echo $this->session->flashdata('error'); ?> </div>
						<?php } ?>
						<div class="col-md-12">
							<form role="form" id="submitform" method="post" action="<?php echo base_url()."head/package/addPackage"?>" class="">
								<div class="form-body" style="padding-top: 10px;">
									<div class="row">
										<div class="col-md-3">
											<div class="form-group"> <label><?php getLocalkeyword('Package Name');?></label> <input type="text" name="txtPackagename" id="txtPackagename" class="form-control" placeholder=" Add Package Name" required="required"> </div>
										</div>
										<div class="col-md-3">
											<div class="form-group"> <label><?php getLocalkeyword('Validity');?></label> <input type="number" min="0" name="txtValidity" id="txtValidity" class="form-control" placeholder="Validity In months" required="required"> </div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-3">
											<div class="form-group"> <label><?php getLocalkeyword('SMS Credit');?></label> <input type="number" step="any" min="0" name="txtSmscredit" id="txtSmscredit" onkeyup="smsValue()" class="form-control" placeholder="SMS per unit" required="required"> </div>
										</div>
										<div class="col-md-3">
											<div class="form-group"> <label>&nbsp;</label> <input type="number" step="any" min="0" name="txtSmscreditprice" id="txtSmscreditprice" class="form-control" onkeyup="smsValue()" placeholder="Price per unit" required="required"> </div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<p style="position: absolute; margin-top: 30px;" id="smsTotaldisplay"><?php getLocalkeyword('Total Price');?>:</p> <input type="hidden" id="smsTotal" value=""> </div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-3">
											<div class="form-group"> <label><?php getLocalkeyword('Email Credit');?></label> <input type="number" step="any" min="0" name="txtEmailcredit" id="txtEmailcredit" onkeyup="emailValue()" class="form-control" placeholder="Email per unit" required="required"> </div>
										</div>
										<div class="col-md-3">
											<div class="form-group"> <label>&nbsp;</label> <input type="number" step="any" min="0" name="txtEmailcreditprice" id="txtEmailcreditprice" class="form-control" onkeyup="emailValue()" placeholder="Price per unit" required="required"> </div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<p style="position: absolute; margin-top: 30px;" id="emailTotaldisplay"><?php getLocalkeyword('Total Price');?>:</p> <input type="hidden" id="emailTotal" value=""> </div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="profile-content">
											<div class="row">
												<div class="col-md-12">
													<ul class="nav nav-tabs">
														<li class="active"><a data-toggle="tab" href="#tab1" aria-expanded="true"><?php getLocalkeyword('General Feature');?></a></li>
														<li class=""><a data-toggle="tab" href="#tab2" aria-expanded="false"><?php getLocalkeyword('Usability & Support');?></a></li>
														<li class=""><a data-toggle="tab" href="#tab3" aria-expanded="false"><?php getLocalkeyword('Tax and Pricing');?></a></li>
														<li class=""><a data-toggle="tab" href="#tab4" aria-expanded="false"><?php getLocalkeyword('Payout');?></a></li>
													</ul>
													<!-- Modal -->
													<!-- ends -->
													<div class="tab-content form-horizontal">
														<div id="tab1" class="tab-pane fade active in">
															<div class="form-group"> <label class="control-label col-sm-2" for="email"><?php getLocalkeyword('Template');?>:</label>
																<div class="col-sm-3"> <input type="number" step="any" min="0" class="form-control" name="txtSmstemplate" id="txtSmstemplate" placeholder="SMS" required="required"> </div>
																<div class="col-sm-3"> <input type="number" step="any" min="0" class="form-control" id="txtEmailtemplate" name="txtEmailtemplete" placeholder="Email" required="required"> </div>
															</div>
															<div class="form-group"> <label class="control-label col-sm-2" for="email"><?php getLocalkeyword('Bulk SMS/Email');?>:</label>
																<div class="col-sm-3"> <input type="number" step="any" min="0" class="form-control" id="txtSmsbulk" name="txtSmsbulk" placeholder="SMS Max/day" required="required"> </div>
																<div class="col-sm-3"> <input type="number" step="any" min="0" class="form-control" id="txtEmailbulk" name="txtEmailbulk" placeholder="Email Max/day" required="required"> </div>
															</div>
															<div class="form-group"> <label class="control-label col-sm-2" for="email"><?php getLocalkeyword('Custom Field');?>:</label>
																<div class="col-sm-3"> <input type="number" step="any" min="0" class="form-control" id="txtCustomfields" value="" name="txtCustomfields" onclick="validateData('optCustomfields', this.value);" onkeyup="validateData('optCustomfields', this.value);" placeholder="Total Custom Field" required="required"> </div>
																<div class="col-sm-3"> <label class="radio-inline"> <input type="checkbox" name="optCustomfields" id="optCustomfields" onclick="validateFields('txtCustomfields','optCustomfields');" value="0"><?php getLocalkeyword('NA');?>
																	</label> </div>
															</div>
															<div class="form-group"> <label class="control-label col-sm-2" for="email"><?php getLocalkeyword('Visitor Records');?>:</label>
																<div class="col-sm-3"> <input type="number" step="any" min="0" class="form-control" value="" id="txtVisitorrecord" name="txtVisitorrecord" onclick="validateData('optVisitorrecord', this.value);" onkeyup="validateData('optVisitorrecord', this.value);" placeholder="Total Visitor Records" required="required"> </div>
																<div class="col-sm-3"> <label class="radio-inline"> <input type="checkbox" name="optVisitorrecord" id="optVisitorrecord" onclick="validateFields('txtVisitorrecord','optVisitorrecord');" value="0"><?php getLocalkeyword('NA');?>
																	</label> </div>
															</div>
															<div class="form-group"> <label class="control-label col-sm-2" for="email"><?php getLocalkeyword('Document Size');?>:</label>
																<div class="col-sm-3"> <input type="number" step="any" min="0" class="form-control" value="" id="txtDocsize" name="txtDocsize" onclick="validateData('optDocsize', this.value);" onkeyup="validateData('optDocsize', this.value);" placeholder="in MB" required="required"> </div>
																<div class="col-sm-3"> <label class="radio-inline"> <input type="checkbox" name="optDocsize" id="optDocsize" onclick="validateFields('txtDocsize','optDocsize');" value="0"><?php getLocalkeyword('NA');?>
																	</label> </div>
															</div>
															<div class="form-group"> <label class="control-label col-sm-2" for="email"><?php getLocalkeyword('Mo Registration');?>:</label>
																<div class="col-sm-3"> <input type="number" step="any" min="0" class="form-control" value="" id="txtMoregistration" name="txtMoregistration" onclick="validateData('optMoregistration', this.value);" onkeyup="validateData('optMoregistration', this.value);" placeholder="MO registration" required="required"> </div>
																<div class="col-sm-3"> <label class="radio-inline"> <input type="checkbox" id="optMoregistration" name="optMoregistration" onclick="validateFields('txtMoregistration','optMoregistration');" value="0"><?php getLocalkeyword('NA');?>
																	</label> </div>
															</div>
															<div class="form-group"> <label class="control-label col-sm-2" for="email"><?php getLocalkeyword('Branch');?>:</label>
																<div class="col-sm-3"> <input type="number" step="any" min="0" class="form-control" value="" id="txtBranch" name="txtBranch" onclick="validateData('optBranch', this.value);" onkeyup="validateData('optBranch', this.value);" placeholder="Branch" required="required"> </div>
																<div class="col-sm-3"> <label class="radio-inline"> <input type="checkbox" id="optBranch" name="optBranch" onclick="validateFields('txtBranch','optBranch');" value="0"><?php getLocalkeyword('NA');?>
																	</label> </div>
															</div>
															<div class="form-group"> <label class="control-label col-sm-2" for="email"><?php getLocalkeyword('User Management');?>:</label>
																<div class="col-sm-3"> <input type="number" step="any" min="0" class="form-control" value="" id="txtUsers" onclick="validateData('optUsers', this.value);" onkeyup="validateData('optUsers', this.value);" name="txtUsers" placeholder="Total no.of users" required="required"> </div>
																<div class="col-sm-3"> <label class="radio-inline"> <input type="checkbox" name="optUsers" onclick="validateFields('txtUsers','optUsers');" id="optUsers" value="0"><?php getLocalkeyword('NA');?>
																	</label> </div>
															</div>
															<div class="form-group"> <label class="control-label col-sm-2" for="email"><?php getLocalkeyword('Sender Id');?>:</label>
																<div class="col-sm-3"> <input type="number" step="any" min="0" class="form-control" value="" id="txtSendrid" onclick="validateData('optSenderid', this.value);" onkeyup="validateData('optSenderid', this.value);" name="txtSenderid" placeholder="Total Sender Id" required="required"> </div>
																<div class="col-sm-3"> <label class="radio-inline"> <input type="checkbox" name="optSenderid" onclick="validateFields('txtSendrid','optSenderid');" id="optSenderid" value="0"><?php getLocalkeyword('NA');?>
																	</label> </div>
															</div>
														</div>
														<div id="tab2" class="tab-pane fade">
															<div class="row">
																<div class="col-md-12">
																	<div class="form-group"> <label class="control-label col-sm-2" for="email"><?php getLocalkeyword('Email Support');?>:</label>
																		<div class="col-sm-3"> <label class="radio-inline"> <input type="radio" name="optEmailsupport" value="1"><?php getLocalkeyword('Yes');?>
																			</label> <label class="radio-inline"> <input type="radio" name="optEmailsupport" value="" checked="checked"><?php getLocalkeyword('No');?>
																			</label> </div>
																	</div>
																	<div class="form-group"> <label class="control-label col-sm-2" for="email"><?php getLocalkeyword('Telephonic Support');?>:</label>
																		<div class="col-sm-3"> <label class="radio-inline"> <input type="radio" name="optTechsupport" value="1"><?php getLocalkeyword('Yes');?>
																			</label> <label class="radio-inline"> <input type="radio" name="optTechsupport" value="" checked="checked"><?php getLocalkeyword('No');?>
																			</label> </div>
																	</div>
																	<div class="form-group"> <label class="control-label col-sm-2" for="email"><?php getLocalkeyword('Schedule Report');?>:</label>
																		<div class="col-sm-3"> <label class="radio-inline"> <input type="radio" name="optSchedule" value="1"><?php getLocalkeyword('Yes');?>
																			</label> <label class="radio-inline"> <input type="radio" name="optSchedule" value="" checked="checked"><?php getLocalkeyword('No');?>
																			</label> </div>
																	</div>
																	<div class="form-group"> <label class="control-label col-sm-2" for="email"><?php getLocalkeyword('Mobile App');?></label>
																		<div class="col-sm-3"> <label class="radio-inline"> <input type="radio" name="optMobileapp" value="1"><?php getLocalkeyword('Yes');?>
																			</label> <label class="radio-inline"> <input type="radio" name="optMobileapp" value="" checked="checked"><?php getLocalkeyword('No');?>
																			</label> </div>
																	</div>
																	<div class="form-group"> <label class="control-label col-sm-2" for="email"><?php getLocalkeyword('Address Labeling');?>:</label>
																		<div class="col-sm-3"> <label class="radio-inline"> <input type="radio" name="optAddresslebeling" value="1"><?php getLocalkeyword('Yes');?>
																			</label> <label class="radio-inline"> <input type="radio" name="optAddresslebeling" value="" checked="checked"><?php getLocalkeyword('No');?>
																			</label> </div>
																	</div>
																	<div class="form-group"> <label class="control-label col-sm-2" for="email"><?php getLocalkeyword('Service Name');?>:</label>
																		<div class="col-sm-3"> <input type="text" class="form-control" id="txtServicename1" name="txtServicename[]" placeholder="Name" required="required"> </div>
																		<div class="col-md-2">
																			<a id="add-more" onclick="addService()"> <i class="fa fa-plus"></i><?php getLocalkeyword('Add More');?> </a>
																		</div> <input type="hidden" id="txtServiceno" value="1"> </div>
																	<div id="moreservice"></div>
																</div>
															</div>
														</div>
														<div id="tab3" class="tab-pane fade">
															<div class="row">
																<div class="col-md-12">
																	<div class="form-group"> <label class="control-label col-sm-1" for="email"><?php getLocalkeyword('Tax');?>:</label>
																		<div class="col-sm-3"> <select class="form-control" name="seltax[]" id="seltax1" onchange="setTaxvalue(0, this.value)">
																				<option value="">Select</option>
                                                                                <?php
																				  for($i=0;$i < count($resulttax);$i ++)
																				  {
																					?>
                                                                                     <option value="<?php echo $resulttax[$i]->tax_id_pk."-".$resulttax[$i]->tax_percentValue; ?>">
                                                                                                <?php echo $resulttax[$i]->tax_name; ?>
                                                                                     </option>
                                                                                    <?php
																				  }
																				?>
                                                                            </select> </div>
																		<div class="col-sm-3"> <input type="text" class="form-control" id="txtTaxpercent0" value="0" name="taxPercent[]" onkeyup="calculatePrice()" placeholder="%" readonly> </div>
																		<div class="col-md-2">
																			<a onclick="addTax()"> <i class="fa fa-plus"></i><?php getLocalkeyword('Add More');?> </a>
																		</div>
																	</div> <input type="hidden" id="txtTaxno" value='1'>
																	<div id="moretax"></div>
																</div>
																<div class="clearfix"></div>
																<div class="col-md-12">
																	<div class="form-group"> <label class="control-label col-sm-1" for="email"><?php getLocalkeyword('Pricing');?></label>
																		<div class="col-sm-3"> <input type="number" step="any" min="0" class="form-control" id="txtPricing" value="0" onclick="calculatePrice()" onkeyup="calculatePrice()" Name="txtPricing" placeholder="Rs." required="required"> <input type="hidden" class="form-control" value="0" id="txttaxPricing" Name="txttaxPricing" placeholder="Rs."> </div>
																	</div>
																</div>
																<div class="clearfix"></div>
																<div class="col-md-12">
																	<div class=" form-group"> <label class="control-label col-sm-1" for="email"></label>
																		<p class="col-md-10"> <strong id="totalPricebtax"><?php getLocalkeyword('Total Price');?>: Rs</strong> </p>
																	</div>
																	<div class="clearfix"></div>
																	<div class="form-group"> <label class="control-label col-sm-1" for="email"><?php getLocalkeyword('Discount');?></label>
																		<div class="col-sm-3"> <input type="number" step="any" min="0" class="form-control" onclick="calculatePrice()" onkeyup="calculatePrice()" value="0" id="txtDiscount" Name="txtDiscount" placeholder="%"> </div>
																	</div>
																	<div class="clearfix"></div> <br>
																	<p> <strong id="discountPrice"><?php getLocalkeyword('Total Price with discount ');?> Rs</strong> <input type="hidden" name="txtFinalprice" id="txtFinalprice" value="0"> </p>
																</div>
															</div>
														</div>
														<div id="tab4" class="tab-pane fade">
															<div class="row">
																<div class="col-md-12">
																	<div class="form-group"> <label class="control-label col-sm-2" for="email"><?php getLocalkeyword('Dealer');?></label>
																		<div class="col-sm-2"> <input type="text" class="form-control" placeholder="" name="txtDealerPayment" id="txtDealerPayment"> </div>
																		<div class="col-sm-6 radio_group_dealer"> <label class="radio-inline"> <input type="radio" name="radioDealer" value="0"> <?php getLocalkeyword('Value');?>
																			</label> <label class="radio-inline"> <input type="radio" name="radioDealer" value="1"><?php getLocalkeyword('Percent');?>
																			</label> </div>
																	</div>
																	<div class="form-group"> <label class="control-label col-sm-2" for="email"><?php getLocalkeyword('Seller');?></label>
																		<div class="col-sm-2"> <input type="text" class="form-control" placeholder="" name="txtSalerPayment" id="txtSalerPayment"> </div>
																		<div class="col-sm-6 radio_group_saler"> <label class="radio-inline"> <input type="radio" name="radioSaler" value="0"><?php getLocalkeyword('Value');?>
																			</label> <label class="radio-inline"> <input type="radio" name="radioSaler" value="1"><?php getLocalkeyword('Percent');?>
																			</label> </div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-md-12">
															<div class=" pull-right"> <button type="submit" name="btnSubmit" class="btn btn-primary"><?php getLocalkeyword('Save');?></button> 
															<a type="button" href="<?php echo base_url()."head/package"?>" class="btn btn-danger"><?php getLocalkeyword('Cancel');?></a> </div>
														</div>
													</div>
												</div>
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
		<div class="clearfix"></div>
		<!-- END DASHBOARD STATS 1-->
	</div>
	<!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
<script type="text/javascript">
$("#submitform").validate({
	ignore : "",
	rules: {
		txtCustomfields:{
			required:true
		},
		txtVisitorrecord:{
			required:true
		},
		txtDocsize:{
			required:true
		},
		txtMoregistration:{
			required:true
		},
		txtBranch:{
			required:true
		},
		txtUsers:{
			required:true
		},
		txtSenderid:{
			required:true
		},
		txtPackagename: {
			required: true,
			remote:
	        {
                  url:"<?php echo base_url();?>head/package/verifyPackageName",
                  type:"POST",
                  data:
                  {
                        txtPackagename:function()
                        {
                               return $("#txtPackagename").val();
                        }       
                  }  
	        }
		},
		txtValidity: {
			required: true
		},
		txtSmscredit: {
			required: true
		},
		txtSmscreditprice: {
			required: true
		},
		txtEmailcredit: {
			required: true
		},
		txtEmailcreditprice: {
			required: true
		},
		txtSmstemplate: {
			required: true
		},
		txtEmailtemplete: {
			required: true
		},
		txtSmsbulk: {
			required: true
		},
		txtEmailbulk: {
			required: true
		},
		'txtServicename[]': {
			required: true
		},
		txtDiscount:{
			required:true,
			range:[0,100],
			number: true
		},
		txtPricing: {
			required: true,
			min: 0,
			number: true
		},
		'seltax[]':{
			required:true
		},
        radioDealer:{
                required:true
        },
        radioSaler:{
                required:true
        },
        txtDealerPayment:{
                required:true
        },
        txtSalerPayment:{
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
	messages: {
		txtCustomfields:{
			required:"Please enter custom field count"
		},
		txtVisitorrecord:{
			required:"Please enter visitor record count"
		},
		txtDocsize:{
			required:"Please enter document size"
		},
		txtMoregistration:{
			required:"Please enter mo registration count"
		},
		txtBranch:{
			required:"Please enter branch count"
		},
		txtUsers:{
			required:"Please enter user management count"
		},
		txtSenderid:{
			required:"Please enter sender id count"
		},
		txtPackagename: {
			required: "Please enter package name",
			remote:jQuery.validator.format("Package name already exists")
		},
		txtValidity: {
			required: "Please enter validity"
		},
		txtSmscredit: {
			required: "Please enter sms credit"
		},
		txtSmscreditprice: {
			required: "Please enter sms price"
		},
		txtEmailcredit: {
			required: "Please enter email credit"
		},
		txtEmailcreditprice: {
			required: "Please enter email price"
		},
		txtSmstemplate: {
			required: "Please enter sms template"
		},
		txtEmailtemplete: {
			required: "Please enter email template"
		},
		txtSmsbulk: {
			required: "Please enter bulk sms"
		},
		txtEmailbulk: {
			required: "Please enter bulk email"
		},
		'txtServicename[]': {
			required: "Please enter service name"
		},
		txtDiscount:{
			required:"Please enter discount amount",
			number: jQuery.validator.format("Please select only number")
		},
		txtPricing: {
			required: "Please enter price",
			min: jQuery.validator.format("Please enter positive number"),
			number: jQuery.validator.format("Please select positive number")
		},
		'seltax[]':{
			required:"Please select tax type"
		},
		radioDealer:{
                required:"Please select dealer value type"
        },
        radioSaler:{
                required:"Please select seller value type"
        },
        txtDealerPayment:{
                required:"Please enter dealer payment"
        },
        txtSalerPayment:{
                required:"Please enter seller payment"
        }
	}
});

function addService() 
{
	var next = $("#txtServiceno").val();
	var data = '<div class="form-group" id="ser'+ next +'"><label class="control-label col-sm-2" for="email"><?php getLocalkeyword('Service Name');?>:</label><div class="col-sm-3"><input type="text" class="form-control"	id="txtServicename'+next+'"	name="txtServicename[]"	placeholder="Name"></div><div class="col-md-2"><a id="remove" onclick="removeService('+next+')"><i ></i><?php getLocalkeyword('Remove');?></a></div></div>';
	           $("#moreservice").append(data); 
	 next = parseInt(next)+1;
	 $("#txtServiceno").val(next); 
 }

 function removeService(id) 
 {
	var next = $("#txtServiceno").val();
	$("#ser" + id).remove();
	 next = parseInt(next)-1;
	$("#txtServiceno").val(next);
}

function setTaxvalue(id, val) {

	if(val=="")
	{
			$("#txtTaxpercent" + id).val(0);
			calculatePrice();
	}
	else
	{
			var next = val.split('-');
			$("#txtTaxpercent" + id).val(next[1]);
			calculatePrice();
	}	
}

function addTax()
{
	var next=$("#txtTaxno").val();
	var data ='<div class="form-group" id="tx'+next+'"><label class="control-label col-sm-1" for="email"><?php getLocalkeyword('Tax');?>:</label><div class="col-sm-3">'+
	          '<select class="form-control"	name="seltax[]"	id="seltax'+next+'"	onchange="setTaxvalue('+next+',this.value)" ><option value="">Select</option>' +
	          '<?php for ($i = 0; $i < count($resulttax); $i ++) { ?>'+
	          '<option value="<?php echo $resulttax[$i]->tax_id_pk."-".$resulttax[$i]->tax_percentValue;?>">'+'<?php echo $resulttax[$i]->tax_name; ?>'+'</option><?php }?>'+
	          '</select></div><div class="col-sm-3"><input type="text" class="form-control"	id="txtTaxpercent'+next+'"name = "taxPercent[]"	placeholder="%" readonly value="0" onkeyup="calculatePrice()">'+
	          '</div><div class="col-md-2"><a onclick="removeTax('+next+')"><?php getLocalkeyword('Remove');?></a></div> </div>';
	$("#moretax").append(data); 
	next = parseInt(next) + 1;
	$("#txtTaxno").val(next);
}

function removeTax(id) 
{
	var next = $("#txtTaxno").val();
	$("#tx" + id).remove();
	next = parseInt(next) - 1;
	//$("#txtTaxno").val(next);
	calculatePrice();
}

function smsValue() 
{
	var txtSmscredit = $("#txtSmscredit").val();
	var txtSmscreditprice = $("#txtSmscreditprice").val();
	var next = parseFloat(txtSmscredit) * parseFloat(txtSmscreditprice);	
	if(isNaN(next))
	{	
			
	}
	else
	{
		$("#smsTotal").val(next);
		$("#smsTotaldisplay").html("Total Price :" + next);
	}		
}

function emailValue() 
{
	var txtEmailcredit = $("#txtEmailcredit").val();
	var txtEmailcreditprice = $("#txtEmailcreditprice").val();
	var next = parseFloat(txtEmailcredit) * parseFloat(txtEmailcreditprice);
	if(isNaN(next))
	{

	}
	else
	{	
		$("#emailTotal").val(next);
		$("#emailTotaldisplay").html("Total Price :" + next);
	}	
}

function calculatePrice() 
{
	var txtPricing = $("#txtPricing").val();
	var notax = $("#txtTaxno").val();
	var txtDiscount = $("#txtDiscount").val();
	var totaltax = 0;
	var totaltaxpre = 0;
	var tx = (parseFloat(txtPricing) / 100) * parseFloat(txtDiscount);
	var a = parseFloat(txtPricing) - parseFloat(tx);
	for (var i = 0; i < notax; i++) 
	{	
		if($("#txtTaxpercent" + i).length)
		{
				totaltax = parseFloat(totaltax) + (parseFloat(a) / 100) * parseFloat($("#txtTaxpercent" + i).val());
				totaltaxpre = parseFloat(totaltaxpre) + (parseFloat(txtPricing) / 100) * parseFloat($("#txtTaxpercent" + i).val());
		}		
	}

	var b = parseFloat(txtPricing) + parseFloat(totaltaxpre);

	if(isNaN(b))
	{
		b=0;
	}

	$("#totalPricebtax").html('Total Price: ' + b + 'Rs ');
	var finalTax = parseFloat(a) + parseFloat(totaltax);

	if(isNaN(finalTax))
	{
			finalTax=0;
	}
	

	$("#discountPrice").html("Total Price with discount " + finalTax + " Rs");
	$("#txtFinalprice").val(finalTax);
	$("#txttaxPricing").val(totaltax);
}

function validateFields(id,checkbox_id) 
{
	if($('#'+checkbox_id).is(':checked'))
	{	
			$("#" + id).val('0');
			$("#" + id).attr('readonly',true);
	}
	else
	{
			$("#" + id).attr('readonly',false);
	}	
}


function check_checkbox_validate(id)
{	
	
}


function validateData(id, val) 
{
	$("#" + id).prop('checked', false);
	$("#" + id).val('');
}
</script>
<!-- BEGIN QUICK SIDEBAR -->
<a href="javascript:;" class="page-quick-sidebar-toggler"> <i class="icon-login"></i> </a>
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
<!-- END QUICK SIDEBAR -->
</div>
<!-- END CONTAINER -->