<div class="page-content-wrapper">
	<div class="page-content">
		<div class="row">
			<div class="col-md-12">
				<div class=" app-ticket-list">
					<div class="page-bar row">
						<div class="col-md-6">
							<h3 class="page-title"><?php getLocalkeyword('Add Renewal Package');?></h3>
							<ul class="page-breadcrumb ">
								<li><a href="
                                       <?php echo base_url()."head/dashboard" ?>"><?php getLocalkeyword('Home');?></a> <i class="fa fa-circle"></i></li>
								<li><a href="#"><?php getLocalkeyword('Package Management');?></a> <i class="fa fa-circle"></i></li>
								<li><a href="<?php echo base_url()."head/package/renewalPackage"?>"><span><?php getLocalkeyword('Renewal Package Management');?></span>
								</a> <i class="fa fa-circle"></i></li>
								<li><span><?php getLocalkeyword('Add Renewal Package Management');?></span></li>
							</ul>
						</div>
						<div class="col-md-6">
							<div id="reportrange" class="btn pull-right " style="padding-top: 12px;">
								<i class="fa fa-calendar"></i> &nbsp; <span class="thin uppercase hidden-xs">August 28, 2016 - September 26, 2016</span> <b class="fa fa-angle-down"></b>
							</div>
						</div>
					</div>
					<form role="form" id="frmSubmit" action="<?php echo base_url();?>head/package/addRenewalpackage" method="post">
						<div class="row">
							<div class="">
								<br> <br>
								<div class="">
									<div class="col-md-5 col-sm-5">
										<label class="label-control col-md-3"><?php getLocalkeyword('Package Type');?></label>
										<div class="form-group col-md-9">
											<select class="form-control" name="selPackagetype" id="selPackagetype" required="required">
												<option value="">Select Package Type</option>
												<option value="Basic">Basic</option>
												<option value="SMS Recharge">SMS Recharge</option>
												<option value="Email Recharge">Email Recharge</option>
												<option value="validity">Validity</option>
											</select>
										</div>
									</div>
									<div class="col-md-5 col-sm-5">
										<label class="label-control col-md-3"><?php getLocalkeyword('Package Name');?></label>
										<div class="form-group col-md-9">
											<input type="text" name="txtPackagename" id="txtPackagename" required="required" class=" form-control" placeholder="">
										</div>
									</div>
								</div>
								<div class="">
									<div class="col-md-5 col-sm-5">
										<label class="label-control col-md-3"><?php getLocalkeyword('Free SMS Credit');?></label>
										<div class="form-group col-md-9">
											<input type="number" step="any" min="0" name="txtSmscredit" id="txtSmscredit" class=" form-control" onkeyup="smsValue()" placeholder="Sms credit" required="required"
											>
										</div>
									</div>
									<div class="col-md-5 col-sm-5">
										<div class="form-group col-md-7">
											<input type="number" step="any" min="0" class=" form-control" name="txtSmsprice" id="txtSmsprice" placeholder="Price per unit" required="required" onkeyup="smsValue()">
										</div>
										<label class="label-control col-md-5" id="smsTotaldisplay"><?php getLocalkeyword('Total Price');?>:</p> <input type="hidden" id="smsTotal" value=""></label>
									</div>
									<div class="col-md-2 col-sm-2">
										<div class="form-group col-md-9">
											<input type="radio" name="optradio" id="optradio" value="0" onclick="validateFields('txtSmscredit', 'txtSmsprice','optSms');"><?php getLocalkeyword('NA');?>
										</div>
									</div>
								</div>
								<div class="">
									<div class="col-md-5 col-sm-5">
										<label class="label-control col-md-3"><?php getLocalkeyword('Free Email Credit');?></label>
										<div class="form-group col-md-9">
											<input type="number" step="any" min="0" name="txtEmail" id="txtEmail" class=" form-control" onkeyup="emailValue()" placeholder="Email credit" required="required"
											>
										</div>
									</div>
									<div class="col-md-5 col-sm-5">
										<div class="form-group col-md-7">
												<input type="number" step="any" min="0" name="txtEmailprice" id="txtEmailprice" class=" form-control" placeholder="Price per unit" required="required" onkeyup="emailValue()">
										</div>
										<label class="label-control col-md-5" id="emailTotaldisplay"><?php getLocalkeyword('Total Price');?>:</p> <input type="hidden" id="emailTotal" value=""></label>
										
									</div>
									<div class="col-md-2 col-sm-2">
										<div class="form-group col-md-9">
											<input type="radio" name="optradio" id="optradio" onclick="validateFields('txtEmail', 'txtEmailprice','optEmail');" value="0"><?php getLocalkeyword('NA');?>
										</div>
									</div>
								</div>
								<div class="">
									<div class="col-md-5 col-sm-5">
										<label class="label-control col-md-3"><?php getLocalkeyword('Validity');?></label>
										<div class="form-group col-md-9">
											<input type="number" step="any" min="0" name="txtValidity" id="txtValidity" class=" form-control" placeholder="Validity" required="required">
										</div>
									</div>
									<div class="col-md-5 col-sm-5">
										<div class="form-group col-md-9">
											<input type="radio" name="optradio" id="optradio" value="0" onclick="validateFields('txtValidity', 'txtValidity','optValidity');"><?php getLocalkeyword('NA');?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="">
								<div class="">
									<div class="col-md-8 col-sm-8">
										<ul class="nav nav-tabs" role="tablist">
											<li role="presentation" class="active"><a href="#tax" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true"><?php getLocalkeyword('Tax & Pricing');?></a></li>
											<li class=""><a data-toggle="tab" href="#tab4" aria-expanded="false"><?php getLocalkeyword('Payout');?></a></li>
										</ul>
										<div class="tab-content">
											<div role="tabpanel" class="tab-pane fade active in" id="tax">
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label class="">Select Tax</label> <br>
															<div class="col-md-5 pl0">
																<select class="form-control" name="seltax[]" id="seltax1" onchange="setTaxvalue(0, this.value)" required="required">
																	<option value="">Select</option>
                                                                    <?php for ($i=0 ; $i < count($resulttax); $i ++) { ?>
                                                                    <option
																		value="<?php echo $resulttax[$i]->tax_id_pk ." - ".$resulttax[$i]->tax_percentValue; ?>">
                                                                        <?php echo $resulttax[$i]->tax_name; ?>
                                                                    </option>
                                                                    <?php } ?>
                                                                </select>
															</div>
															<div class="col-md-4">
																<input type="text" class="form-control" id="txtTaxpercent0" name="taxPercent[]" placeholder="%" readonly>
															</div>
															<div class="col-md-3 pr0 ">
																<a onclick="addTax();"> <i class="fa fa-plus"></i><?php getLocalkeyword('Add More');?>
																</a>
															</div>
															<div class="clearfix"></div>
															<input type="hidden" id="txtTaxno" value='1'> <br>
														</div>
														<div id="moretax"></div>
													</div>
													<div class="clearfix"></div>
													<div class="col-md-12">
														<div class="form-group">
															<label class=""><?php getLocalkeyword('Price');?></label> <br>
															<div class="col-md-5 pl0">
																<input type="number" step="any" min="0" onclick="calculatePrice()" onkeyup="calculatePrice()" name="txtPrice" id="txtPrice" class=" form-control" placeholder="">
																<input type="hidden" class="form-control" value="0" id="txttaxPricing" Name="txttaxPricing" placeholder="Rs.">
															</div>
														</div>
													</div>
													<div class="clearfix"></div>
													<div class="col-md-12">
															<div class=" form-group"> 
															<p class="col-md-10"> 
															<strong id="totalPricebtax"><?php getLocalkeyword('Total Price');?>: Rs</strong> </p>
															</div>
															<div class="clearfix"></div>
															<div class="form-group"> <label class="" for="email"><?php getLocalkeyword('Discount');?></label><br>
																	<div class="col-md-5 pl0">
																		<input type="number" step="any" min="0" onclick="calculatePrice()" onkeyup="calculatePrice()" name="txtDiscount" id="txtDiscount" class=" form-control"
																			placeholder="Default Discount"> 
																		<input type="hidden" name="txtTotaltax" id="txtTotaltax" value="0"> <input type="hidden" name="txtFinalprice"
																			id="txtFinalprice" value="0">
																	</div>
															</div>
															<div class="clearfix"></div> <br>
															<p class="col-md-10"> <strong id="discountPrice"><?php getLocalkeyword('Total Price with discount ');?> Rs</strong>
															</p>
													</div>
												</div>
											</div>
											<div role="tabpanel" id="tab4" class="tab-pane fade">
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label class="" for="email"><?php getLocalkeyword('Dealer');?></label> <br>
															<div class="col-md-5 pl0">
																<input type="text" class="form-control" placeholder="" name="txtDealerPayment" id="txtDealerPayment" required>
															</div>
															<div class="col-md-4">
																<label class="radio-inline"> <input type="radio" name="radioDealer" value="0"><?php getLocalkeyword('Value');?>
																</label> <label class="radio-inline"> <input type="radio" name="radioDealer" value="1"><?php getLocalkeyword('Percentage');?>
																</label>
															</div>
														</div>
														<div class="clearfix"></div>
														<div class="form-group">
															<label class="" for="email"><?php getLocalkeyword('Sales Executive');?></label> <br>
															<div class="col-md-5 pl0">
																<input type="text" class="form-control" placeholder="" name="txtSalerPayment" id="txtSalerPayment" required>
															</div>
															<div class="col-md-4">
																<label class="radio-inline"> <input type="radio" name="radioSaler" value="0"><?php getLocalkeyword('Value');?>
																</label> <label class="radio-inline"> <input type="radio" name="radioSaler" value="1"><?php getLocalkeyword('Percentage');?>
																</label>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-12">
												<div class="modal-footer">
													<button type="submit" name="btnSubmit" class="btn btn-primary"><?php getLocalkeyword('Save');?></button>
													<a href="<?php echo base_url()."head/package/renewalPackage" ?>">
														<button type="button" data-dismiss="modal" class="btn btn-danger"><?php getLocalkeyword('Cancel');?></button>
													</a>
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
</div>
<div class="clearfix"></div>
<!-- END DASHBOARD STATS 1-->
<script type="text/javascript">
    function addTax()
    {
        var next = $("#txtTaxno").val();
        var data = '<div class="form-group" id="tx'+next+'">'+'<label class=""><?php getLocalkeyword('Select Tax');?></label><br>'+'<div class="col-md-5 pl0">'+'<select class="form-control" name="seltax[]" id="seltax'+next+'"onchange="setTaxvalue('+next+',this.value)">'+'<option value="0-0">Select</option>'+'<?php for($i=0;$i<count($resulttax);$i++) { ?>'+'<option value ="<?php echo $resulttax[$i]->tax_id_pk ."-".$resulttax[$i]->tax_percentValue;?>">'+'<?php echo $resulttax[$i]->tax_name; ?></option><?php } ?>'+'</select>'+'</div>'+'<div class="col-md-4">'+'<input type="text" class="form-control" id="txtTaxpercent'+next+'" name="taxPercent[]" placeholder="%" readonly>'+'</div>'+'<div class="col-md-3 pr0">'+'<a onclick="removeTax('+next+')"><?php getLocalkeyword('Remove');?></a>'+'</div>'+'<div class="clearfix"></div><br>'+'</div>';
        $("#moretax").append(data);
        next = parseInt(next) + 1;
        $("#txtTaxno").val(next);
    }

    function setTaxvalue(id, val) 
    {
        var next = val.split('-');
        $("#txtTaxpercent" + id).val(next[1]);
        calculatePrice();
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

		var txtSmscreditprice = $("#txtSmsprice").val();

		var next = parseFloat(txtSmscredit) * parseFloat(txtSmscreditprice);	
		if(isNaN(next))
		{	
				
		}
		else
		{
			$("#smsTotal").val(next);
			$("#smsTotaldisplay").html("Total Price : " + next + " Rs.");
		}		
	}

	function emailValue() 
	{
		var txtEmailcredit = $("#txtEmail").val();
		var txtEmailcreditprice = $("#txtEmailprice").val();
		var next = parseFloat(txtEmailcredit) * parseFloat(txtEmailcreditprice);
		if(isNaN(next))
		{

		}
		else
		{	
			$("#emailTotal").val(next);
			$("#emailTotaldisplay").html("Total Price : " + next + " Rs.");
		}	
	}

    function calculatePrice() 
    {
        var txtPricing = $("#txtPrice").val();
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

    function validateFields(id, val,chk_id) 
    {	
	        $("#" + id).val('0');
	        $("#" + id).attr('readonly',true);
	        $("#" + val).val('0');
	        $("#" + val).attr('readonly',true);

	        if(chk_id=='optSms')
	        {
	        		// $("#txtEmail").val('');
	        		// $("#txtEmailprice").val('');
	        		$("#txtEmail").attr('readonly',false);
	        		$("#txtEmailprice").attr('readonly',false);

	        		//$("#txtValidity").val('');	        		
	        		$("#txtValidity").attr('readonly',false);
	        		
	        }
	        else if(chk_id=='optEmail')
	        {
	        		// $("#txtSmscredit").val('');
	        		// $("#txtSmsprice").val('');
	        		$("#txtSmscredit").attr('readonly',false);
	        		$("#txtSmsprice").attr('readonly',false);

	        		//$("#txtValidity").val('');	        		
	        		$("#txtValidity").attr('readonly',false);
	        }   
	        else
	        {
	        		// $("#txtSmscredit").val('');
	        		// $("#txtSmsprice").val('');
	        		$("#txtSmscredit").attr('readonly',false);
	        		$("#txtSmsprice").attr('readonly',false);

	        		// $("#txtEmail").val('');
	        		// $("#txtEmailprice").val('');
	        		$("#txtEmail").attr('readonly',false);
	        		$("#txtEmailprice").attr('readonly',false);
	        } 
    }

    function validateData(id, val, a) 
    {
        //$("#" + id).prop('checked', false);
        $("#" + id).val('');
        //$("#" + a).prop('required', true);
    }

    $("#frmSubmit").validate({
        ignore: "",
        rules: {
            selPackagetype: {
                required: true
            },
            txtPackagename: {
                required: true,
				remote:
		        {
	                  url:"<?php echo base_url();?>head/package/verifyRenewPackageName",
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
            txtSmscredit: {
                required: true
            },
            txtSmsprice: {
                required: true
            },
            txtEmail: {
                required: true
            },
            txtEmailprice: {
                required: true
            },
            txtValidity: {
                required: true
            },
            'seltax[]': {
                required: true
            },
            txtPrice: {
                required: true,
				min: 0,
				number: true
            },
            txtDiscount: {
                required: true,
                range:[0,100],
				number: true
            },
            txtDealerPayment: {
                required: true
            },
            txtSalerPayment: {
                required: true
            },
            radioDealer: {
                required: true
            },
            radioSaler: {
                required: true
            },
            optradio:{
            	required: true
            }
        },
	errorPlacement:
	  function(error, element)
	  {
	      if(element.is(":radio"))
	      { 
	          error.appendTo(element.parent().parent());
	  	  }
	  	  else
	  	 { 
	          error.insertAfter(element); 
	     }
	  },
        messages: {
            selPackagetype: {
                required: "Please select package type"
            },
            txtPackagename: {
                required: "Please enter package name",
				remote:jQuery.validator.format("Package name already exists")
            },
            txtSmscredit: {
                required: "Please enter sms credit"
            },
            txtSmsprice: {
                required: "Please enter sms price"
            },
            txtEmail: {
                required: "Please enter email credit"
            },
            txtEmailprice: {
                required: "Please enter email price"
            },
            txtValidity: {
                required: "Please enter validity"
            },
            'seltax[]': {
                required: "Please select tax type"
            },
            txtPrice: {
                required: "Please enter price",
				min: jQuery.validator.format("Please enter positive number"),
				number: jQuery.validator.format("Please select positive number")
            },
            txtDiscount: {
                required: "Please enter discount",
				number: jQuery.validator.format("Please select only number")
            },
            txtDealerPayment: {
                required: "Please enter dealer payment"
            },
            txtSalerPayment: {
                required: "Please enter saler payment"
            },
            radioDealer: {
                required: "Please select dealer value type"
            },
            radioSaler: {
                required: "Please select saler value type"
            },
            optradio: {
            	required: "Please select"
            }
        }
    });
</script>