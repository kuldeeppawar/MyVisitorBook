<div class="page-content-wrapper">
	<div class="page-content">
		<div class="row">
			<div class="col-md-12">
				<div class=" app-ticket-list">
					<div class="page-bar row">
						<div class="col-md-6">
							<h3 class="page-title"><?php getLocalkeyword('SMS Templates');?></h3>
							<ul class="page-breadcrumb ">
								<li><a href="<?php echo base_url()?>head/dashboard"><?php getLocalkeyword('Home');?></a> <i class="fa fa-circle"></i></li>
								<li><span><?php getLocalkeyword('SMS Templates');?></span></li>
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
								<div class="row">
									<div class="col-md-3 ">
										<ul class="nav navbar-nav pl0">
											<li class="dropdown dropdown-user"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"
												style="font-size: 18px; padding: 2px 0px;">Recently updated <i class="fa fa-angle-down"></i>
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
												
												 <?php if(getAccessRights('mvbStmEdit'))
														{
														?>
														<a href="#" class="margin_rgt hide_element" id="edit1" onclick="getRecord()"> <i class="fa fa-pencil-square-o fa-2x" title="Edit" style="color: #828282;"></i></a> 
														<?php
														}
														
														if(getAccessRights('mvbStmPush'))
														{
														?>
															<a href="#" onclick="submitPushrevoke('1')"
														class="margin_rgt hide_elementp"> <i class="fa fa-mail-forward fa-2x" title="Push" style="color: #828282;"></i></a>
														<?php
														}

														if(getAccessRights('mvbStmRevoke'))
														{
														?>
															 <a href="#" class="margin_rgt hide_elementp"> <i
															class="fa fa-mail-reply fa-2x" title="Revoke" style="color: #828282;" onclick="submitPushrevoke('0')"></i></a>
										     	  <?php }

										     	  		if(getAccessRights('mvbStmDelete'))
														{
														?>	 
															<a data-toggle="modal" class="margin_rgt hide_element" data-target="#delete" onclick="assignDeleteFunc();">
																<i class="fa fa-trash fa-2x" title="Delete" style="color: #828282;"></i>
															</a>
														<?php 
														}
														?>
						
											</div>
											
											<?php
											if(getAccessRights('mvbStmAdd'))
											{
										    ?>
										 		<div class="btn-group">
													<a id="sms_template" class="btn btn-primary"><?php getLocalkeyword('Add Template');?></a>
												</div>
										    <?php		
											}

			              					if(getAccessRights('mvbStmActive') || getAccessRights('mvbStmDeactive') )
											{
											?>
												<ul class="nav navbar-nav pl0 pull-right" style="margin-left: 5px;">
													<li class="dropdown dropdown-user burger_menu"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"
														style="margin-top: 0px;"><i class="fa fa-bars fa-2x" aria-hidden="true"></i> </a>
														<?php
														if(getAccessRights('mvbStmActive') || getAccessRights('mvbStmDeactive') )
														{
														?>
																<ul class="dropdown-menu dropdown-menu-default">
																<?php
																	if(getAccessRights('mvbStmActive'))
																	{
																?>		
																		<li class="options" style="border-bottom: 1px solid #e7ecf1;"><a href="#" onclick="chechCheckbox(1)" style="padding: 5px; margin-top: 5px;">
																		<?php getLocalkeyword('Active');?></a></li>
																<?php
																	}

																	if(getAccessRights('mvbStmDeactive'))
																	{
																?>		
																					<li class="options"><a onclick="chechCheckbox(0)" style="padding: 5px; margin-top: 5px;">
																					<?php getLocalkeyword('Deactive');?></a></li>
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
													<th><?php getLocalkeyword('Template assigned to festival');?></th>
													<th><?php getLocalkeyword('Festival Date');?></th>
													<th><?php getLocalkeyword('Category');?></th>
													<th><?php getLocalkeyword('Template Name');?></th>
													<th><?php getLocalkeyword('Template Content');?></th>
													<th><?php getLocalkeyword('Status');?></th>
												</tr>
											</thead>
											<tbody>
												<?php 
											  for($i=0;$i<count($resultTemplate);$i++)
											  {
											  	 $j=$i+1;
											 ?>
												<tr class="odd gradeX">
													<td><input name="chk<?php echo $j;?>" class="check_box" type="checkbox" data-ptag="sb1" id="chk<?php echo $j;?>"
													    value="<?php echo $resultTemplate[$i]->sms_id_pk;?>"></td>
													<td><?php echo $j;?></td>
													<td><?php echo $resultTemplate[$i]->fest_name;?></td>
													<td><?php echo date("d-m-Y", strtotime($resultTemplate[$i]->fest_date));?></td>
													<td><?php 
													          if($resultTemplate[$i]->fest_category==1)
													          {
													          	echo "Mandatory";
													          }
													          else 
													          {
													          	echo "Not Mandatory";
													          }
													?></td>
													<td><?php echo $resultTemplate[$i]->sms_templateName;?></td>
													<td><a onclick="getTemplate('<?php echo $resultTemplate[$i]->sms_id_pk;?>')">
													       
													<?php 
                                                        if(strlen($resultTemplate[$i]->sms_description)>=30)
                                                        {
                                                        		$a=substr($resultTemplate[$i]->sms_description,0,30); 
													        	
													        	echo $a.'...';
                                                        }
                                                        else
                                                        {
                                                        		echo $resultTemplate[$i]->sms_description;
                                                        }  
													    
													?></a></td>
													<td>

													     <?php 
													        if($resultTemplate[$i]->sms_status==1)
													        {
													        	echo '<span class="label label-sm label-success">Active</span>';
													        }
													        else 
													        {
													        	echo '<span class="label label-sm label-danger">Deactive</span>';
													        }	
													     ?>

													 </td>
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
<div class="page-content-wrapper1">
	<div class="user_list_box">
		<div class="row">
			<div class="col-md-4">
				<div class="portlet light bordered">
					<div class="portlet-title1">
						<a style="font-size: 18px; padding: 2px 0px;"><?php getLocalkeyword('Available Templates');?> :</a>
						<div class="icone_place">
							<a class="margin_rgt" style="padding-top: 7px; display: inline-block;" data-target="#delete" data-toggle="modal"> <i id="show_delete_div" class="fa fa-trash fa-2x" title="Delete" style="color: #828282; visibility: hidden;"></i></a>
							<?php
							if(getAccessRights('mvbStmPush') || getAccessRights('mvbStmRevoke'))
							{
							?>
							<ul class="nav navbar-nav pl0 pull-right" style="margin-left: 5px;display: none;" id="show_pushrevoke_div">
								<li class="dropdown dropdown-user burger_menu"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"
									style="margin-top: 0px;"><i class="fa fa-bars fa-2x" aria-hidden="true"></i> </a>
									<ul class="dropdown-menu dropdown-menu-default">
									<?php
									if(getAccessRights('mvbStmPush'))
									{
									?>
										<li class="options" style="border-bottom: 1px solid #e7ecf1;"><a  style="padding: 5px; margin-top: 5px;" onclick="setPushRevoke('1');">
										<?php getLocalkeyword('Push');?></a></li>
									<?php
									}

									if(getAccessRights('mvbStmRevoke'))
									{
									?>
										<li class="options"><a style="padding: 5px; margin-top: 5px;" onclick="setPushRevoke('0');">
										<?php getLocalkeyword('Revoke');?></a></li>
									<?php
									}
									?>
									</ul></li>
							</ul>
							<?php
							}
							?>
						</div>
					</div>
					<div class="portlet-body" style="overflow: auto;">
					<div id="test-list">
						<ul class="list list-group All_list">
							 <?php 
								  for($i=0;$i<count($resultTemplate);$i++)
								  {
								  	 $j=$i+1;
								 ?>
							<li class="list-group-item"><input class="check_boxedit" name="chkProfile<?php echo $j;?>" id="chkProfile<?php echo $j;?>" onclick="getTemplatelist('<?php echo $resultTemplate[$i]->sms_id_pk;?>',this.id)"
							               type="checkbox" height="20" width="20" value="<?php echo $resultTemplate[$i]->sms_id_pk;?>" /> <?php echo $resultTemplate[$i]->sms_templateName;?></li>

												<?php 
											  }
												?>
						</ul>
						<ul class="pagination pull-right"></ul>
						</div>
					</div>
				</div>
		
			</div>
			<div class="col-md-8">
				<div class="row">
					<div class="" style="margin-bottom: 10px; padding: 10px 0px; margin-left: 12px; margin-right: 12px;">
						<a class="close_section pull-right" title="Close"> <i data-toggle="modal" data-target="#delete"  class="fa fa-trash fa-2x" title="Delete" style="color: #828282; cursor: pointer;visibility: hidden;" id="delete_emailtemp_id"></i> <i id="close"
							onclick="closProfileDiv();" style="color: #616161; padding-top: 10px;" class="fa fa-times fa-3x"></i>
						</a>
					</div>
				</div>
			<form action="<?php echo base_url()?>head/smstemplate/addTemplate" method="post" id="frmTemplate">
			
				<div class="row">

					<div class="col-md-6 ">
						<div class=" form-group">
							<label class=""><?php getLocalkeyword('Select State');?></label>
							 <select class="form-control" name="selState" id="selState" onchange="getFestivalDetails(this.value)" required="required">
								<option value="">--select state--</option>
								<?php 
								   for($st=0;$st<count($resultStates);$st++)
								   {
								  ?>
								  <option value="<?php echo $resultStates[$st]->stat_id_pk;?>">
								  <?php  echo $resultStates[$st]->stat_name;?>
								  </option>
								  <?php 
								   }
								  ?>
							</select>
						</div>
					</div><div class="clearfix"></div>	

					<div class="col-md-6 ">
						<div class="form-group">
							<label class=""><?php getLocalkeyword('Select Festival');?></label> <select class="form-control" name="selFestival" id="selFestival" onchange="getFestivaldate(this.value)" required="required">
								
							</select>
						</div>
					</div>
					<div class="col-md-6 ">
					<div class="form-group">
						<label class=""><?php getLocalkeyword('Festival Date');?></label>
							<div class="input-group  " data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
								<input type="text" id="txtFestivaldate" name="txtFestivaldate"  class="form-control" readonly> <span class="input-group-btn">
									<button class="btn default" type="button">
										<i class="fa fa-calendar"></i>
									</button>
								</span>
							</div>
						</div>
					</div>
					</div>
					<div class="clearfix"></div>
					<div class="col-md-6 pl0 form-group">
						<label class=""><?php getLocalkeyword('SMS Template Name');?></label> <input type="text" name="txtTemplatename" id="txtTemplatename" class=" input-sm form-control " placeholder="" required="required">
						    <input type="hidden" name="txtTemplateid" id="txtTemplateid" >
					</div>
					<div class="clearfix"></div>
					<div class="col-md-12">
						<div class="checkbox">
							<label><input type="checkbox" name="chkNonenglish" id="chkNonenglish" value="1"><?php getLocalkeyword('Non-english');?></label>
						</div>
					</div>
					<div class="form-group">
						<label class=""><?php getLocalkeyword('SMS Template Content');?></label>
						<textarea rows="4" class="form-control" name="txtDescription" id="txtDescription" onblur="getCount(this.id);" oninput="getCount(this.id)" required="required"></textarea>
						Char Count :-<span id="charcount"> </span> 
						
						 <input type="hidden" name="txtCharcount" id="txtCharcount" >
					</div>
								<div class="form-group">
						<button type="submit" name="btnSubmit" class="btn btn-primary"><?php getLocalkeyword('Save');?></button>
						<a href="#" onclick="closProfileDiv();" class="btn btn-danger"><?php getLocalkeyword('Cancel');?></a>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-12"></div>
</div>
</div>

<div id="delete" class="modal fade" role="dialog">
	        <div class="modal-dialog">

	                                        <div class="modal-content">

	                                            <div class="modal-header">

	                                                <button type="button" class="close" data-dismiss="modal">×</button>

	                                                <h4 class="modal-title text-left"> <i class="fa fa-trash"></i> Are you sure to delete? </h4>

	                                            </div>

	                                            <div class="modal-body">

	                                                <div class="portlet-body form">

	                                                    <!-- <form role="form"> -->

	                                                        <div class="form-body">
	                                                            <div class="row">

	                                                                <div class="col-md-12">

	                                                                    <div class="modal-footer"> 

	                                                                        <a class="btn btn-primary" id="delete_temp_func">Yes</a>

	                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>

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

</div>
</div>
</div>

<!-- too add pagination on add form check box listing -->

<script src="http://listjs.com/assets/javascripts/list.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/list.pagination.js/0.1.1/list.pagination.min.js"></script>

<script>

function getFestivalDetails(state_id)
{
		$.post("<?php echo base_url();?>head/smstemplate/getFestivalDetails",{stateId:state_id},function(data){
			  $("#txtFestivaldate").val('');		
              $("#selFestival").html(data);
               });
}

$(document).ready(function () {

	$(".page-content-wrapper1").hide();
	$("#sms_template,#edit1,#msg_detail1,#msg_detail2,#msg_detail3").click(function () {
		$(".page-content-wrapper").hide();


		$(".page-content-wrapper1").show();


	});


	$("#close").click(function () {


		$(" .page-content-wrapper").show();


		$(".page-content-wrapper1").hide();


	});

	var monkeyList = new List('test-list', {
	    	
	  	  valueNames: ['name'],
	  	
	  	  page: 10,
	  	
	  	  plugins: [ ListPagination({}) ] 
	  	
	  	});



});

function closProfileDiv()
{
	 $(" .page-content-wrapper").show();
		
    $(".page-content-wrapper1").hide();
    $('#frmTemplate').attr('action', '<?php echo base_url();?>head/smstemplate/addTemplate');
    location.reload(true);
    }

function getFestivaldate(value)
{   
       var festDate=value.split("/");  
	    $("#txtFestivaldate").val(festDate[1]);
   }

function getCount(id)
{
	var a= $("#"+id).val().length;
   
	 $("#charcount").html(a);
	 $("#txtCharcount").val(a);
 }


function chechCheckbox(id)
{
     var count='<?php echo count($resultTemplate);?>';
     var template=[];
     
     for (var i=1;i<=count;i++)
     {
   	  if($('#chk'+i).is(':checked'))
   	  {
   		template.push($("#chk"+i).val());
   	  	 
   		   
   	  }
      } 

     
     if (template.length === 0) {
   	   alert ("Please select the template name");
   	      
   	}
     else
     {


   	 

          $.post("<?php echo base_url();?>head/smstemplate/changetemplateStatus",{id:id,template:template},function(data){
              location.reload(true);
               });
          
      }  
    

} 

function submitPushrevoke(id)
{
     var count='<?php echo count($resultTemplate);?>';
     var template=[];
     
     for (var i=1;i<=count;i++)
     {
	   	  if($('#chk'+i).is(':checked'))
	   	  {
	   		template.push($("#chk"+i).val());  
	   	  }
     } 

     
     if (template.length === 0) 
     {
   	   alert ("Please select the template name");     
   	}
     else
     {
          $.post("<?php echo base_url();?>head/smstemplate/submitPushrevoke",{id:id,template:template},function(data){
              location.reload(true);
               });
          
      }  
    

} 


function getRecord()
{
  
 		 var count='<?php echo count($resultTemplate);?>';
	     var template;
	    
	    for (var i=1;i<=count;i++)
	    {
	  	  if($('#chk'+i).is(':checked'))
	  	  {
	  		template=$("#chk"+i).val(); 
	  	   }
	    }

	    getTemplate(template)  
	 
}

function getTemplate(id)
{
     
	  
	   $.post("<?php echo base_url();?>head/smstemplate/getTemplate",{id:id},function(data){
		
		     var arr=JSON.parse(data);
		     $('#txtTemplateid').val(id);
		     $('#selState').val(arr.state);
                 $.post("<?php echo base_url();?>head/smstemplate/getFestivalDetails",{stateId:arr.state},function(data){
	              $("#selFestival").html(data);
	              $('#selFestival').val(arr.fest);
	               });
             //$('#selFestival').html(arr.fest);
             $('#txtFestivaldate').val(arr.festDate);
             $('#txtTemplatename').val(arr.templateName);
             $('#txtDescription').val(arr.description);
             $('#txtCharcount').val(arr.count);
             $("#charcount").html(arr.count);
             $('#delete_emailtemp_id').css('visibility','visible');
            if(arr.check==1)
            {
            	  $("#chkNonenglish").prop("checked", true);
                }
            
           });

	       $('#frmTemplate').attr('action', '<?php echo base_url();?>head/smstemplate/editTemplate');
	       $("#delete_temp_func").attr('onclick',"deleteInnerTemplate('"+id+"')");
	       $(".page-content-wrapper").hide();
	       $(".page-content-wrapper1").show();
	  
}


function getTemplatelist(val,id)
{

             $(".check_boxedit").prop("checked", false);	
             $("#"+id).prop("checked", true);	
             $("#show_pushrevoke_div").css("display","block");	
             $("#show_delete_div").css("visibility","visible");
             getTemplate(val);  
}


$("#frmTemplate").validate({
    rules:{
    	selState:
    	{
	    	required:true
	    },             
    	selFestival:{
            required:true
        },
        txtTemplatename:{
            required:true
        },
        txtDescription:{
            required:true
        }
    },
    messages:{
    	selState:
    	{
	    		required:"Please select state"
	    },                      
    	selFestival:{
            required:"Please select festival"
        },
        txtTemplatename:{
            required:"Please enter template name"
        },
        txtDescription:{
            required:"Please enter template details"
        }
    }
});


function assignDeleteFunc()
{
	$("#delete_temp_func").attr('onclick',"deleteSTM()");	
}

	
function deleteSTM()
{
		var count='<?php echo count($resultTemplate)?>';
	     var template;
	    
	    for (var i=1;i<=count;i++)
	    {
	  	  if($('#chk'+i).is(':checked'))
	  	  {
	  		template=$("#chk"+i).val(); 
	  	   }
	    }

	    $.post("<?php echo base_url();?>head/smstemplate/deleteSTM",{template_id:template},function(data){
              location.reload(true);
               });
}	
	

function setPushRevoke(id)
{
		var count='<?php echo count($resultTemplate);?>';
	    var template_ids=[];
	    
	    for(var i=1;i<=count;i++)
	    {
		  	  if($('#chkProfile'+i).is(':checked'))
		  	  {
		  			template_ids.push($("#chkProfile"+i).val()); 
		  	  }
	    }

	    $.post("<?php echo base_url();?>head/smstemplate/submitPushrevoke",{id:id,template:template_ids},function(data){
              location.reload(true);
               });
}	


function deleteSelectedSTM()
{
		var count='<?php echo count($resultTemplate)?>';
	     var template;
	    
	    for (var i=1;i<=count;i++)
	    {
	  	  if($('#chkProfile'+i).is(':checked'))
	  	  {
	  		template=$("#chkProfile"+i).val(); 
	  	   }
	    }

	    $.post("<?php echo base_url();?>head/smstemplate/deleteSTM",{template_id:template},function(data){
              location.reload(true);
               });
}

function deleteInnerTemplate(template)
{			
	    $.post("<?php echo base_url();?>head/smstemplate/deleteSTM",{template_id:template},function(data){
              location.reload(true);
               });
} 


</script>
<!-- ends here -->
<script>



$(document).ready(function(){

   $('[data-toggle="tooltip"]').tooltip(); 



});
</script>


