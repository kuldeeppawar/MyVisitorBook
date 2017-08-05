<div class="page-content-wrapper">
	<div class="page-content">
		<div class="row">
			<div class="col-md-12">
				<div class=" app-ticket-list">
					<div class="page-bar row">
						<div class="col-md-6">
							<h3 class="page-title"><?php getLocalkeyword('Edit Renewal Package');?></h3>
							<ul class="page-breadcrumb ">
								<li><a href="<?php echo base_url()."head/dashboard"?>"><?php getLocalkeyword('Home');?></a> <i class="fa fa-circle"></i></li>
								<li><a href="<?php echo base_url()."head/package"?>"><?php getLocalkeyword('Package Management');?></a> <i class="fa fa-circle"></i></li>
								<li><a href="<?php echo base_url()."head/package/renewalPackage"?>"><span><?php getLocalkeyword('Renewal Package Management');?></span></a><i class="fa fa-circle"></i></li>
								<li><span><?php getLocalkeyword('Edit Renewal Package Management');?></span></li>
							</ul>
						</div>
						<div class="col-md-6">
							<div id="reportrange" class="btn pull-right " style="padding-top: 12px;">
								<i class="fa fa-calendar"></i> &nbsp; <span class="thin uppercase hidden-xs">August 28, 2016 - September 26, 2016</span> <b class="fa fa-angle-down"></b>
							</div>
						</div>
					</div>
					<form role="form" id="frmSubmit" action="<?php echo base_url()."head/package/editrenewalPackage"?>" method="post">
						<div class="row">
							<div class="">
								<br> <br> 
								<input type="hidden" name="package_id" value="<?php echo $result[0]->rpkg_id_pk; ?>">
								<div class="">
									<div class="col-md-5 col-sm-5">
										<label class="label-control col-md-3"><?php getLocalkeyword('Package Type');?></label>
										<div class="form-group col-md-9">
											<select class="form-control" name="selPackagetype" id="selPackagetype" required="required">
												<option value="">Select Package Type</option>
												<option value="Basic" <?php if($result[0]->rpkg_packageType=="Basic"){ echo "selected";} ?>>Basic</option>
												<option value="SMS Recharge" <?php if($result[0]->rpkg_packageType=="SMS Recharge"){ echo "selected";} ?>>SMS Recharge</option>
												<option value="Email Recharge" <?php if($result[0]->rpkg_packageType=="Email Recharge"){ echo "selected";} ?>>Email Recharge</option>
												<option value="validity" <?php if($result[0]->rpkg_packageType=="validity"){ echo "selected";} ?>>Validity</option>
											</select>
										</div>
									</div>
									<div class="col-md-5 col-sm-5">
										<label class="label-control col-md-3"><?php getLocalkeyword('Package Name');?></label>
										<div class="form-group col-md-9">
											<input type="text" name="txtPackagename" value="<?php echo $result[0]->rpkg_packageName; ?> " id="txtPackagename" required="required" class=" form-control" placeholder="">
										</div>
									</div>
								</div>
								<div class="">
									<div class="col-md-5 col-sm-5">
										<label class="label-control col-md-3"><?php getLocalkeyword('Free SMS Credit');?></label>
										<div class="form-group col-md-9">
											<input type="number" step="any" min="0" name="txtSmscredit" required="required" value="<?php echo $result[0]->rpkg_smsCredit; ?>" id="txtSmscredit" class=" form-control"
												onkeyup="smsValue()" placeholder="Sms Per Unit" <?php if($result[0]->rpkg_smsCredit==0 && $result[0]->rpkg_smsPrice==0){?> readonly <?php } ?>>
										</div>
									</div>
									<div class="col-md-5 col-sm-5">
										<div class="form-group col-md-9">
											<input type="number" step="any" min="0" value="<?php echo $result[0]->rpkg_smsPrice; ?>" required="required" class=" form-control" name="txtSmsprice" id="txtSmsprice"
												placeholder="Price per unit" <?php if($result[0]->rpkg_smsCredit==0 && $result[0]->rpkg_smsPrice==0){?> readonly <?php } ?> onkeyup="smsValue()">
										</div>
										<label class="label-control col-md-3" id="smsTotaldisplay"><?php getLocalkeyword('Total Price');?>: <?php echo $result[0]->rpkg_smsCredit * $result[0]->rpkg_smsPrice;?> Rs.<input type="hidden" id="smsTotal" value=""></label>
									</div>
									<div class="col-md-2 col-sm-2">
										<div class="form-group col-md-9">
											<input type="radio" name="optradio" id="optradio" value="<?php echo $result[0]->rpkg_emailCredit; ?>" onclick="validateFields('txtSmscredit','txtSmsprice','optSms');" <?php if($result[0]->rpkg_smsCredit==0 && $result[0]->rpkg_smsPrice==0){?> checked <?php } ?>><?php getLocalkeyword('NA');?>
										</div>
									</div>
								</div>
								<div class="">
									<div class="col-md-5 col-sm-5">
										<label class="label-control col-md-3"><?php getLocalkeyword('Free Email Credit');?></label>
										<div class="form-group col-md-9">
											<input type="number" step="any" min="0" required="required" value="<?php echo $result[0]->rpkg_emailCredit; ?>" name="txtEmail" id="txtEmail" class=" form-control"	onkeyup="emailValue()" placeholder="Email credit" <?php if($result[0]->rpkg_emailCredit==0 && $result[0]->rpkg_emailPrice==0){?> readonly <?php } ?>>
										</div>
									</div>
									<div class="col-md-5 col-sm-5">
										<div class="form-group col-md-9">
											<input type="number" step="any" min="0" required="required" value="<?php echo $result[0]->rpkg_emailPrice; ?>" name="txtEmailprice" id="txtEmailprice" class=" form-control"
												placeholder="Price per unit" <?php if($result[0]->rpkg_emailCredit==0 && $result[0]->rpkg_emailPrice==0){?> readonly <?php } ?> onkeyup="emailValue()">
										</div>
										<label class="label-control col-md-3" id="emailTotaldisplay"><?php getLocalkeyword('Total Price');?>: <?php echo $result[0]->rpkg_emailCredit * $result[0]->rpkg_emailPrice;?> Rs. <input type="hidden" id="emailTotal" value=""></label>
									</div>
									<div class="col-md-2 col-sm-2">
										<div class="form-group col-md-9">
											<input type="radio" name="optradio" id="optradio" value="<?php echo $result[0]->rpkg_smsCredit; ?>" onclick="validateFields('txtEmail','txtEmailprice','optEmail');" value="0" <?php if($result[0]->rpkg_emailCredit==0 && $result[0]->rpkg_emailPrice==0){?> checked <?php } ?>><?php getLocalkeyword('NA');?>
										</div>
									</div>
								</div>
								<div class="">
									<div class="col-md-5 col-sm-5">
										<label class="label-control col-md-3"><?php getLocalkeyword('Validity');?></label>
										<div class="form-group col-md-9">
											<input type="number" step="any" min="0" name="txtValidity" value="<?php echo $result[0]->rpkg_validity; ?>" id="txtValidity" name="txtValidity" class=" form-control" placeholder="Validity" required="required" <?php if($result[0]->rpkg_validity==0){?> readonly <?php }?> >
										</div>
									</div>
									<div class="col-md-5 col-sm-5">
										<div class="form-group col-md-9">
											<input type="radio" name="optradio" id="optradio" value="<?php echo $result[0]->rpkg_smsCredit; ?>" value="0" onclick="validateFields('txtValidity','txtValidity','optValidity');" <?php if($result[0]->rpkg_validity==0){?> checked <?php }?>><?php getLocalkeyword('NA');?>
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
											<li role="presentation" class="active"><a href="#tax" aria-controls="home" role="tab" data-toggle="tab"><?php getLocalkeyword('Tax & Pricing');?></a></li>
											<li class=""><a data-toggle="tab" href="#tab4" aria-expanded="false"><?php getLocalkeyword('Payout');?></a></li>
										</ul>
										<div class="tab-content">
											<div role="tabpanel" class="tab-pane active" id="tax">
												<div class="row">
													<div class="col-md-12">
                                          <?php 
/*
											       * ?>
											       * <div class="form-group">
											       * <label class="">Select Tax</label> <br>
											       * <div class="col-md-5 pl0">
											       * <select class="form-control" name="seltax[]" id="seltax1" onchange="setTaxvalue(0,this.value)">
											       * <option value="0-0">Select</option>
											       * <?php for ($i = 0; $i < count($resulttax); $i ++) { ?>
											       * <option value="<?php echo $resulttax[$i]->tax_id_pk."-".$resulttax[$i]->tax_percentValue; ?>"><?php echo $resulttax[$i]->tax_name; ?></option>
											       * <?php } ?>
											       * </select>
											       * </div>
											       * <div class="col-md-4"> <input type="text" class="form-control" id="txtTaxpercent0" name="taxPercent[]" placeholder="%"> </div>
											       * <div class="col-md-3 pr0 "> <a onclick="addTax()"><i class="fa fa-plus"></i>Add More</a> </div>
											       * <div class="clearfix"></div>
											       * </div>
											       * <?php
											       */
																																										?>																																		<?php 																	    $tx=0;																	    for ($j=0;$j<count($result_tax);$j++)																	      {																	         $a=$j+1;																	          ?>																	
                                          <div class="form-group" <?php if($j!=0){?> id="tx<?php echo $a;?>" <?php }?>>
															<label class="" for="email">Tax:</label><br>
															<div class="col-md-5 pl0">
																<select class="form-control" name="seltax[]" id="seltax<?php echo $a;?>" onchange="setTaxvalue(<?php echo $j;?>,this.value)">
																	<option value="0-0">Select</option>
                                                   <?php                                                                 for ($i = 0; $i < count($resulttax); $i ++) 		  {
                                                   	?>                         	
                                                   					<option <?php if($result_tax[$j]->rpkgt_taxId_fk==$resulttax[$i]->tax_id_pk){ echo "selected";}?>
																		value="<?php echo $resulttax[$i]->tax_id_pk."-".$resulttax[$i]->tax_percentValue; ?>"
																	><?php echo $resulttax[$i]->tax_name; ?></option>
                                                   <?php                                                                 }
                                                   ?>                         					
                                                				</select>
															</div>
															<div class="col-md-4">
																<input type="text" class="form-control" value="<?php echo $result_tax[$j]->rpkgt_taxIdpercent;?>" id="txtTaxpercent<?php echo $j;?>" name="taxPercent[]" placeholder="%" readonly>
															</div>
                                             			<?php 												 $tx=$tx+$result_tax[$j]->rpkgt_taxIdpercent;	?>																		
		                                             <div class="col-md-3 pr0">									<?php if($j==0)										{										
		                                             	?>					     									<a onclick="addTax()">
		                                             				<i class="fa fa-plus"></i><?php getLocalkeyword('Add More');?></a>
		                                             		<?php 
		                                             		}
		                                             		else
		                                             		{ 
		                                             		?>													<a onclick="removeTax('<?php echo $a;?>')">
		                                             			    <?php getLocalkeyword('Remove');?></a>
		                                             		<?php 
		                                             		} 
		                                             		?>											
		                                            </div>
												</div>
											<br>															<?php }?>														<input type="hidden" id="txtTaxno" value='<?php echo count($result_tax);?>'>
														<div id="moretax"></div>
													</div>
													<div class="col-md-12">
														<div class="form-group">
															<label class=""><?php getLocalkeyword('Price');?></label> <br>
															<div class="col-md-5 pl0">
																<input type="number" step="any" min="0" onclick="calculatePrice()" onkeyup="calculatePrice()" name="txtPrice" id="txtPrice" class=" form-control"
																	value="<?php echo $result[0]->rpkg_total; ?>" placeholder="Price">
																<input type="hidden" class="form-control" value="<?php echo $result[0]->rpkg_tax;?>" id="txttaxPricing" Name="txttaxPricing" placeholder="Rs.">
															</div>
															<!-- <div class="col-md-4">
																<input type="number" step="any" min="0" onclick="calculatePrice()" onkeyup="calculatePrice()" name="txtDiscount" id="txtDiscount" class=" form-control"
																	value="<?php //echo $result[0]->rpkg_discount; ?>" placeholder="Default Discount"
																> <input type="hidden" name="txtTotaltax" id="txtTotaltax" value="<?php //echo $tx;?>"> <strong id="discountPrice"><?php //getLocalkeyword('Total Price with discount');?> : <?php //echo $result[0]->rpkg_finalPrice; ?>  Rs</strong>
																<input type="hidden" name="txtFinalprice" id="txtFinalprice" value="<?php //echo $result[0]->rpkg_finalPrice; ?>">
															</div> -->
														</div>
													</div>
													<div class="clearfix"></div>
													<div class="col-md-12">
															<div class=" form-group"> 
															<p class="col-md-10"> 
															<strong id="totalPricebtax"><?php getLocalkeyword('Total Price');?> : <?php echo $result[0]->rpkg_total+(($result[0]->rpkg_total/100)*$tx)?> Rs</strong> </p>
															</div>
															<div class="clearfix"></div>
															<div class="form-group"> <label class="" for="email"><?php getLocalkeyword('Discount');?></label><br>
																	<div class="col-md-5 pl0">
																		<input type="number" step="any" min="0" onclick="calculatePrice()" onkeyup="calculatePrice()" name="txtDiscount" id="txtDiscount" class=" form-control"
																			placeholder="Default Discount" value="<?php echo $result[0]->rpkg_discount; ?>"> 
																		<input type="hidden" name="txtTotaltax" id="txtTotaltax" value="<?php echo $tx;?>"> <input type="hidden" name="txtFinalprice"
																			id="txtFinalprice" value="<?php echo $result[0]->rpkg_finalPrice; ?>">
																	</div>
															</div>
															<div class="clearfix"></div> <br>
															<p class="col-md-10"> <strong id="discountPrice"><?php getLocalkeyword('Total Price with discount ');?> : <?php echo $result[0]->rpkg_finalPrice; ?> Rs</strong>
															</p>
													</div>
												</div>
											</div>
											<div id="tab4" class="tab-pane fade">
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label class="" for="email"><?php getLocalkeyword('Dealer');?></label> <br>
															<div class="col-md-5 pl0">
																<input type="text" class="form-control" placeholder="" name="txtDealerPayment" id="txtDealerPayment" value="<?php echo $result[0]->rpkg_dealerAmount; ?>">
															</div>
															<div class="col-md-4">
																<label class="radio-inline"> <input type="radio" name="radioDealer" value="0" <?php if($result[0]->rpkg_dealerPayMethod==0) { echo "checked"; }?>> Value
																</label> <label class="radio-inline"> <input type="radio" name="radioDealer" value="1" <?php if($result[0]->rpkg_dealerPayMethod==1) { echo "checked"; }?>> Percentage
																</label>
															</div>
														</div>
														<div class="clearfix"></div>
														<div class="form-group">
															<label class="" for="email"><?php getLocalkeyword('Sales Executive');?></label> <br>
															<div class="col-md-5 pl0">
																<input type="text" class="form-control" placeholder="" name="txtSalerPayment" id="txtSalerPayment" value="<?php echo $result[0]->rpkg_salerAmount; ?>">
															</div>
															<div class="col-md-4">
																<label class="radio-inline"> <input type="radio" name="radioSaler" value="0" <?php if($result[0]->rpkg_salerPayMethod==0) { echo "checked"; }?>> Value
																</label> <label class="radio-inline"> <input type="radio" name="radioSaler" value="1" <?php if($result[0]->rpkg_salerPayMethod==1) { echo "checked"; }?>> Percentage
																</label>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-12">
												<div class="modal-footer">
													<button type="submit" name="btnSubmit" class="btn btn-primary"><?php getLocalkeyword('Save');?></button>
													<a href="<?php echo base_url()."head/package/renewalPackage"?>">
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
<div class="clearfix"></div>
<!-- END DASHBOARD STATS 1-->
</div>
</div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
    $("#frmSubmit").validate({
      ignore : "",
        rules:{
            selPackagetype:{
                required:true
            },
            txtPackagename:{
                required:true
            },
            txtSmscredit:{
                required:true
            },
            txtSmsprice:{
                required:true
            },
            txtEmail:{
                required:true
            },
            txtEmailprice:{
                required:true
            },
            txtValidity:{
                required:true
            },
            'seltax[]': {
                required: true
            },
            'taxPercent[]':{
                required:true
            },
            txtPrice:{
                required:true,
				min: 0,
				number: true
            },
            txtDiscount:{
                required:true,
                range:[0,100],
				number: true
            },
            txtDealerPayment:{
                required:true
            },
            txtSalerPayment:{
                required:true
            },
            radioDealer:{
                required:true
            },
            radioSaler:{
                required:true
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
        messages:{ 
            selPackagetype:{
                required:"Please Select Package Type"
            },
            txtPackagename:{
                required:"Please Enter Package Name"
            },
            txtSmscredit:{
                required:"Please Enter SMS Credit"
            },
            txtSmsprice:{
                required:"Please Enter Sms Price"
            },
            txtEmail:{
                required:"Please Enter Email Credit"
            },
            txtEmailprice:{
                required:"Please Enter Email Price"
            },
            txtValidity:{
                required:"Please Enter Validity"
            },
            'seltax[]': {
                required: "Please select tax type"
            },
            'taxPercent[]':{
                required:"Please enter tax value"
            },
            txtPrice:{
                required:"Please enter total",
				min: jQuery.validator.format("Please enter positive number"),
				number: jQuery.validator.format("Please select positive number")
            },
            txtDiscount:{
                required:"Please enter total with discount",
				number: jQuery.validator.format("Please select only number")
            },
            txtDealerPayment:{
                required:"Please enter dealer payment"
            },
            txtSalerPayment:{
                required:"Please enter saler payment"
            },
            radioDealer:{
                required:"Please select dealer value type"
            },
            radioSaler:{
                required:"Please select saler value type"
            },
            optradio: {
            	required: "Please select"
            }	
        }
    });	


    function setTaxvalue(id,val) 
    {
        var next= val.split('-');
        $("#txtTaxpercent"+id).val(next[1]);
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

    function addTax()
    { 
        var next=  $("#txtTaxno").val(); 
        var data='<div class="form-group" id="tx'+next+'"><label class="">Select Tax</label><br><div class="col-md-5 pl0">'+'<select class="form-control" name="seltax[]" id="seltax'+next+'" onchange="setTaxvalue('+next+',this.value)"> <option value="0-0">Select</option>'+'<?php for ($i = 0; $i < count($resulttax); $i ++) { ?>'+'<option value="<?php echo $resulttax[$i]->tax_id_pk . "-" . $resulttax[$i]->tax_percentValue; ?>"><?php echo $resulttax[$i]->tax_name; ?></option><?php } ?>'+'</select></div>	<div class="col-md-4"><input type="text" class="form-control" id="txtTaxpercent'+next+'" name="taxPercent[]" placeholder="%" readonly>'+'</div><div class="col-md-3 pr0 "><a onclick="removeTax('+next+')"><?php getLocalkeyword('Remove');?></a><div class="clearfix"></div><br></div>';
        $("#moretax").append(data);
        next=parseInt(next)+1;
        $("#txtTaxno").val(next);
    }

        function removeTax(id)
        {  
        	var next=  $("#txtTaxno").val();
	        $("#tx"+id).remove();
	        next=parseInt(next)-1;
	        //$("#txtTaxno").val(next);
	        calculatePrice();
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

    function validateData(id,val,a)
    {
        //$("#"+id).prop('checked',false); 
        $("#"+id).val('');    
        //$("#"+a).prop('required',true);   
    }
    </script>
