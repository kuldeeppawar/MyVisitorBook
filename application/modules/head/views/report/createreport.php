
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="portlet-body">
			<style>
.breadcrumb {
	height: auto;
	background: #fbfbfb
}

.crumbs {
	height: 40px;
	margin: 0;
	padding: 0 490px 0 0;
	display: inline-block;
	font-family: sans-serif;
	position: relative;
	width: 100%
}

.crumbs .stepText {
	width: 75%
}

.crumbs li: after {
	content: '\0000a0';
	width: 0;
	height: 0;
	border-left: 20px solid #ececec;
	border-top: 20px solid transparent;
	border-bottom: 20px solid transparent;
	display: inline-block;
	position: absolute;
	top: -20px;
	right: -20px
}

.crumbs li {
	height: 0;
	border-top: 20px solid #ececec;
	border-bottom: 20px solid #ececec;
	border-left: 20px solid transparent;
	display: inline-block;
	cursor: pointer;
	position: relative;
	width: 19%
}

.crumbs li: first-child {
	border-top: 20px solid #ececec;
	border-bottom: 20px solid #ececec;
	border-left: 0
}

.crumbs li: hover {
	height: 0;
	border-top: 20px solid #fbfbfb;
	border-bottom: 20px solid #fbfbfb
}

.crumbs li: hover: after {
	border-left: 20px solid #fbfbfb !important
}

.crumbs li.active {
	height: 0;
	border-top: 20px solid #596875;
	border-bottom: 20px solid #596875
}

.crumbs li.active: after {
	border-left: 20px solid #596875 !important
}

.crumbs li a {
	display: block;
	margin-top: -14px;
	font-size: 14px;
	font-weight: bold;
	color: #666;
	text-decoration: none
}

.crumbs li: first-child a .stepNum {
	margin-left: 8px
}

.stepText {
	white-space: nowrap;
	overflow: hidden;
	font-size: 13px;
	width: 60%;
	display: inline-block;
	text-overflow: ellipsis;
	vertical-align: middle
}

.active .stepText, .active .stepNum {
	color: #fff
}

.stepNum {
	display: inline-block;
	padding: 0 5px;
	overflow: hidden;
	font-size: 20px;
	vertical-align: middle;
	color: #39f
}
</style>
	<form id="submitform" action="<?php echo base_url();?>head/report/saveReport" method="post" >
			<div class="breadcrumb">
				<ul class="crumbs">
					<li class="step first active" style="z-index: 9" id="tab1">
					   <a id="tab11"  data-toggle="tab" aria-expanded="true"> 
					       <span class="stepNum">1</span> <span class="stepText" title="Report Details"><?php getLocalkeyword('Report Details');?></span>
					  </a>
					</li>
					<li class="step" style="z-index: 8" id="tab2">
					 <a id="tab12"  data-toggle="tab" aria-expanded="false">
					       <span class="stepNum">2</span> <span class="stepText" title="Select Columns"><?php getLocalkeyword('Select Columns');?></span>
					 </a>
					</li>
					<li class="step" style="z-index: 7" id="tab3">
						<a id="tab13"  data-toggle="tab" aria-expanded="false">
						      <span class="stepNum">3</span> <span class="stepText" title="Filters"><?php getLocalkeyword('Filters');?></span>
						</a> 
					</li>
				</ul>
			</div>
			<div class="tab-content">
		
				<div class="tab-pane fade active in" id="tab_2_1">
					
						<div class="form-body">
							<div class="form-group">
								<label class="control-label col-md-3"><?php getLocalkeyword('Report Name');?><span class="required"> * </span>
								</label>
								<div class="col-md-4">
									<input type="text" name="txtName" id="txtName" data-required="1" class="form-control" />
									<span id="report-name" class="help-block help-block-error"></span>
								</div>
							</div><br><br><br>
							<div class="form-group">
								<label class="control-label col-md-3"><?php getLocalkeyword('Description');?><span class="required"> * </span>
								</label>
								<div class="col-md-4">
									<input name="txtDescription" id="txtDescription" type="text" class="form-control" />
									<span id="report-description" class="help-block help-block-error"></span>
								</div>
							</div><br><br><br>
							<div class="form-group">
								<label class="control-label col-md-3"><?php getLocalkeyword('Select Table');?><span class="required" aria-required="true"> * </span>
								</label>
								<div class="col-md-4">
									<select id="selTable" name="seltable[]" class="form-control select2-multiple" multiple   data-placeholder="Select Table" onchange="checkTable(this.value)" >
										<?php 
										for ($i=0;$i<count($resultTable);$i++)
										{
											?>
											 <option value="<?php echo $resultTable[$i]->Tables_in_mvbcellx_visitorbook;?>">  <?php echo $resultTable[$i]->Tables_in_mvbcellx_visitorbook;?></option>
											<?php 
										}
										
										?>
									</select>
									<span id="report-table" class="help-block help-block-error"></span><br>
								</div>
							</div><br><br><br>
							<div class="form-group">
								<label class="control-label col-md-3"><?php getLocalkeyword('Select Columns');?>(MAX 20) <span class="required"> * </span>
								</label>
								<div class="col-md-4">
									<select  id="selfield" name="selfield[]" class="form-control select2-multiple" multiple   data-placeholder="Select Field" onchange="checkField(this.value)">
									</select>
									<span id="report-field" class="help-block help-block-error"></span>
								</div>
							</div>
						</div>
		
				
					<div class="row clearfix">
						<div class="textAlignCenter col-lg-12 col-md-12 col-lg-12 ">
							<a class="btn btn-success green-haze" type="submit" onclick="getnextTab(2)"><?php getLocalkeyword('Next');?></a>
							&nbsp;&nbsp; <a href="<?php echo base_url();?>head/report" class="btn default"><?php getLocalkeyword('Cancel');?></a>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="tab_2_2">
					<div class="form-group">
						<div class="row">
							<label class="col-lg-4 col-md-4 col-sm-4 padding-none"><b><?php getLocalkeyword('Select Field');?></b></label> 
						    <label class="col-lg-1 col-md-1 col-sm-1 padding-none"><b><?php getLocalkeyword('Group By');?></b></label> 
						    <label class="col-lg-7 col-md-7 col-sm-7 padding-none"><b><?php getLocalkeyword('Sort Order');?></b></label>
						</div>
						   <div id="groupDiv">
						        <input type="hidden" id="groupCount" value='2'>
								<div class="row sortFieldRow" style="padding-bottom: 10px;" id="group1">
											<span>
												<div class="col-lg-4 col-md-4 col-sm-4 padding-none">
													<div class="col-md-12 padding-none">
														<select id="selgroupField1" name="selgroupField[]" class="form-control select2 sqlgroup"    data-placeholder="Select Fiels" >
															
														</select>
													</div>
												</div>
											</span> <span class="col-lg-1 col-md-1 col-sm-1 padding-none">
												<div class="">
													<span class="col-lg-2 col-md-2 col-sm-2 padding-none">
														<div>
															<input class="calculationType" name="rdbGroup1" id="rdbGroup1" onclick="verifyGroup(this.id)" type="radio" value="1">
														</div>
													</span>
												</div>
											</span> 
											<span class="col-lg-7 col-md-7 col-sm-7 padding-none ">
												<div class="">
													<span class="col-lg-7 col-md-7 col-sm-7 padding-none">
													 <input type="radio" style="top: 3px;" name="rdbOrder1" id="rdbOrder1" onclick="verifyOrder(this.id)" class="sortOrder" value="ASC">&nbsp;<span><?php getLocalkeyword('Ascending');?></span>&nbsp;&nbsp;
													 <input type="radio" style="top: 3px;" name="rdbOrder1" id="rdbOrder11" onclick="verifyOrder(this.id)" class="sortOrder" value="DESC">&nbsp;<span><?php getLocalkeyword('Descending');?></span></span>
												</div>
											</span>
								  </div>
						 </div>
					</div>
					<div class="addCondition">
						<button type="button" class="btn btn-default" onclick="addGroup()">
							<i class="fa fa-plus"></i>&nbsp;&nbsp;<?php getLocalkeyword('Add More');?>
						</button>
					</div>
					<br>
					<div class="form-group" id="joinConditions">
					</div>
					<div class="">
						<div class="portlet-body">
							<div class=""  id="cndTable" style="width: 80% !important;">
								
							</div>
							<div class="row clearfix">
								<div class="textAlignCenter col-lg-12 col-md-12 col-sm-12 ">
									<a type="button" class="btn btn-danger red-mint" onclick="getnextTab(1)"><?php getLocalkeyword('Back');?></a>
									&nbsp;&nbsp;
									<a type="button" class="btn btn-success green-haze" onclick="getnextTab(3)"><?php getLocalkeyword('Next');?></a>
									&nbsp;&nbsp;<a class="cancelLink btn default" href="<?php echo base_url();?>head/report"><?php getLocalkeyword('Cancel');?></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="tab_2_3">
				  <div class="row">
						<div class="col-lg-3 col-md-3 col-sm-3">
							<h5>
								<span><strong><?php getLocalkeyword('Fixed Conditions');?></strong></span>&nbsp;<span></span>
							</h5>
						</div>
						<br>
						<br>
						<div class="" id="fixedConditions">
						     
							
						</div>
					</div>
					<div class="row">
						<div class="col-lg-3 col-md-3 col-sm-3">
							<h5>
								<span><strong><?php getLocalkeyword('Choose Conditions');?></strong></span>&nbsp;<span></span>
							</h5>
						</div>
						<br>
						<br>
						<div class="" id="optConditionDiv">
						     <input type="hidden" id="txtoptCount" name="txtoptCount" value='0'>
							
						</div>
					</div>
					<br>
					<div class="addCondition">
						<button type="button" class="btn btn-default" onclick="getOptConditions()">
							<i class="fa fa-plus"></i>&nbsp;&nbsp;<?php getLocalkeyword('Add Condition');?>
						</button>
					</div>
					<br>
					<div class="row clearfix">
						<div class="textAlignCenter col-lg-12 col-md-12 col-sm-12 ">
							<a type="button" class="btn btn-danger red-mint" onclick="getnextTab(2)"><?php getLocalkeyword('Back');?></a>
							&nbsp;&nbsp;
							<a type="button"  name="btnSubmit" class="btn btn-success green-haze" id="generateReport" onclick="generateReport()">
								<strong><?php getLocalkeyword('Save & Generate Report');?> </strong>
							</a>
							&nbsp;&nbsp; <a class="cancelLink btn default" href="<?php echo base_url();?>head/report><?php getLocalkeyword('Cancel');?></a>
						</div>
					</div>
				</div>
					
			</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">

  function verifyOrder(id)
  {
     var count=$("#groupCount").val();
    
     for(var i=1;i<count;i++)
     {
   	   $("#rdbOrder"+i).prop("checked", false);
   	   $("#rdbOrder1"+i).prop("checked", false);
     } 

      $("#"+id).prop("checked", true);
  }

  function verifyGroup(id)
  {
     var count=$("#groupCount").val();
    
     for(var i=1;i<count;i++)
     {
   	   $("#rdbGroup"+i).prop("checked", false);
   	 } 

      $("#"+id).prop("checked", true);
  }
  


  function getnextTab(val)
  {

	  var table=$("#selTable").val();
	  if (val==2)
	  {
		  
		   var field=$("#selfield").val();
		 
		  if(field=="" || field==null)
		  {
			  $("#report-field").html("Please Select Fields");
		  }	  
		  else
		  {
			  $("#report-field").html("");
		  }	  
		  var name=$("#txtName").val();
		  if(name=="")
		  {
			 $("#report-name").html("Please Insert Report Name");
		  }	
		  else
		  {
			  $("#report-name").html("");
		  }	  
		  var desc=$("#txtDescription").val();
		  if(desc=="")
		  {
			 $("#report-description").html("Please Insert Description");
		  }	
		  else
		  {
			  $("#report-description").html("");
		  }	  
		
		  if(table=="" || table==null)
		  {
			 $("#report-table").html("Please Select Table");
		  }	
		  else
		  {
			  $("#report-table").html("");
		  }	  

           if(table!="" && table!=null && name!="" && desc!="" && field!="" && field!=null)
           {
     		  $( "#tab_2_2" ).show();
     		  $( "#tab_2_1" ).hide();
     		  $( "#tab_2_3" ).hide();
     		  $( "#tab_2_2" ).addClass("tab-pane fade active in" );
     		  $( "#tab_2_1" ).addClass("tab-pane fade active in" );
     		  $( "#tab_2_3" ).addClass("tab-pane fade active in" );
     		  $( "#tab2" ).removeClass( "step active" ).addClass( "step active" );
     		  $( "#tab1" ).removeClass( "step active" ).addClass( "step" );
     		  $( "#tab3" ).removeClass( "step active" ).addClass( "step" );
            } 


		  
	  }
	  if (val==1)
	  {
		  $( "#tab_2_2" ).hide();
		  $( "#tab_2_1" ).show();
		  $( "#tab_2_3" ).hide();
		  $( "#tab_2_2" ).addClass("tab-pane fade" );
		  $( "#tab_2_1" ).addClass("tab-pane fade active in" );
		  $( "#tab_2_3" ).addClass("tab-pane fade" );
		  $( "#tab2" ).removeClass( "step active" ).addClass( "step " );
		  $( "#tab1" ).removeClass( "step active" ).addClass( "step active" );
		  $( "#tab3" ).removeClass( "step active" ).addClass( "step" );
		 

	  }
	  if (val==3)
	  {

          if(table.length>1)
          {

        	  if(table.length==4)
        	  {
                 var join1=$("#selJoin1").val();
                 var join2=$("#selJoin2").val();
                 var join3=$("#selJoin3").val();

                 var joinwith1=$("#selJoinwith1").val();
                 var joinwith2=$("#selJoinwith2").val();
                 var joinwith3=$("#selJoinwith3").val();

                 if(join1!="" && join2!="" && join3!="" && joinwith1!="" && joinwith2!="" && joinwith3!="")
                 {
                	  $( "#tab_2_2" ).hide();
	           		  $( "#tab_2_1" ).hide();
	           		  $( "#tab_2_3" ).show();
	           		  $( "#tab_2_2" ).addClass("tab-pane fade" );
	           		  $( "#tab_2_1" ).addClass("tab-pane fade" );
	           		  $( "#tab_2_3" ).addClass("tab-pane fade active in" );
	           		  $( "#tab2" ).removeClass( "step active" ).addClass( "step " );
	           		  $( "#tab1" ).removeClass( "step active" ).addClass( "step" );
	           		  $( "#tab3" ).removeClass( "step active" ).addClass( "step active" );

                 }  
                 else
                 {
                	 alert("Please Select Proper Conditions"); 
                   }  
              }	  

        	  if(table.length==3)
        	  {
                 var join1=$("#selJoin1").val();
                 var join2=$("#selJoin2").val();

                 var joinwith1=$("#selJoinwith1").val();
                 var joinwith2=$("#selJoinwith2").val();

                 if(join1!="" && join2!="" && joinwith1!="" && joinwith2!="" )
                 {
                	  $( "#tab_2_2" ).hide();
	           		  $( "#tab_2_1" ).hide();
	           		  $( "#tab_2_3" ).show();
	           		  $( "#tab_2_2" ).addClass("tab-pane fade" );
	           		  $( "#tab_2_1" ).addClass("tab-pane fade" );
	           		  $( "#tab_2_3" ).addClass("tab-pane fade active in" );
	           		  $( "#tab2" ).removeClass( "step active" ).addClass( "step " );
	           		  $( "#tab1" ).removeClass( "step active" ).addClass( "step" );
	           		  $( "#tab3" ).removeClass( "step active" ).addClass( "step active" );

                 } 
                 else
                 {
                	 alert("Please Select Proper Conditions"); 
                  }
                 
              }	 

        	  if(table.length==2)
        	  {
                 var join1=$("#selJoin1").val();
           
                 var joinwith1=$("#selJoinwith1").val();
           
                 if(join1!=""  && joinwith1!=""  )
                 {
                	  $( "#tab_2_2" ).hide();
	           		  $( "#tab_2_1" ).hide();
	           		  $( "#tab_2_3" ).show();
	           		  $( "#tab_2_2" ).addClass("tab-pane fade" );
	           		  $( "#tab_2_1" ).addClass("tab-pane fade" );
	           		  $( "#tab_2_3" ).addClass("tab-pane fade active in" );
	           		  $( "#tab2" ).removeClass( "step active" ).addClass( "step " );
	           		  $( "#tab1" ).removeClass( "step active" ).addClass( "step" );
	           		  $( "#tab3" ).removeClass( "step active" ).addClass( "step active" );

                 } 
                 else
                 {
                	 alert("Please Select Proper Conditions"); 
                  }
                 
              }	 

             
          }
          else
          {


        	  $( "#tab_2_2" ).hide();
    		  $( "#tab_2_1" ).hide();
    		  $( "#tab_2_3" ).show();
    		  $( "#tab_2_2" ).addClass("tab-pane fade" );
    		  $( "#tab_2_1" ).addClass("tab-pane fade" );
    		  $( "#tab_2_3" ).addClass("tab-pane fade active in" );
    		  $( "#tab2" ).removeClass( "step active" ).addClass( "step " );
    		  $( "#tab1" ).removeClass( "step active" ).addClass( "step" );
    		  $( "#tab3" ).removeClass( "step active" ).addClass( "step active" );


              
          }
	  }

  }


  function generateReport()
  {
	   var client=$("#selectFixcilent").val();
	   var branch=$("#selectFixbranch").val();
	   var count=$("#txtoptCount").val();

	  
	   if (count==3)
	   {
	       var field1=$("#optConditionField1").val();
	       var field2=$("#optConditionField2").val();
	       var field3=$("#optConditionField3").val();
	       var cnd1=$("#optCondition1").val(); 
	       var cnd2=$("#optCondition2").val(); 
	       var cnd3=$("#optCondition3").val();
	
	     if((client!="" || field!="") && field1!=""&& field2!=""&& field3!="" 
	     	&& cnd1!=""&& cnd2!=""&& cnd3!="")
	      {
	    	 $("#submitform").submit();
	    	
	      }	
	     else
	     {
	     	
	          alert("Please Select All Conditions");
	     }   
	        
	           
	   }  
	
	   if (count==2)
	   {
	       var field1=$("#optConditionField1").val();
	       var field2=$("#optConditionField2").val();
	     
	       var cnd1=$("#optCondition1").val(); 
	       var cnd2=$("#optCondition2").val(); 
	     
	     if((client!="" || field!="") && field1!=""&& field2!=""
	     	&& cnd1!=""&& cnd2!="")
	      {
	     	 
	    	 $("#submitform").submit();
	      }	
	     else
	     {
	     	
	          alert("Please Select All Conditions");
	     }   
	   }  
	
	
	   if (count==1)
	   {
	       var field1=$("#optConditionField1").val();
	      
	       var cnd1=$("#optCondition1").val(); 
	       
	     if((client!="" || field!="") && field1!=""	&& cnd1!="")
	      {
	    	 $("#submitform").submit();
	      }	
	     else
	     {
	     	
	          alert("Please Select All Conditions");
	     }   
	   }  
	   else
	   {
          if(branch=="" && client=="")
          {  
		    alert("Please Select Any 1 Fixed Conditions");
          }  
          else
          {
        	 $("#submitform").submit();
        	  
            }   
	   }  
  }

  function getOptConditions()
  {
     var count=$("#txtoptCount").val();


     if(count<3)
     {   
		     var next=parseInt(count)+1;
		 	 $("#txtoptCount").val(next);
		   
			  var data='<div class="row" id="optcnddiv'+next+'">'+
					   '<br>'+
						'<div class="col-lg-3 col-md-3 col-sm-3">'+
							'<div class="">'+
								'<select class="form-control select2 optconditions" data-placeholder="Select Field" name="optConditionfields[]" id="optConditionField'+next+'">'+
									'<option value="">Select...</option>'+
									'<option value="Category 1">Category 1</option>'+
									'<option value="Category 2">Category 2</option>'+
									'<option value="Category 3">Category 5</option>'+
									'<option value="Category 4">Category 4</option>'+
								'</select>'+
							'</div>'+
						'</div>'+
						'<div class="col-lg-3 col-md-3 col-sm-3">'+
							'<div class="">'+
								'<select class="form-control" name="optCondition[]" id="optCondition'+next+'" >'+
											'<option value="equals">equals</option>'+
											'<option value="not equal to">not equal to</option>'+
											'<option value="starts with">starts with</option>'+
											'<option value="ends with">ends with</option>'+
											'<option value="contains">contains</option>'+
											'<option value="does not contain">does not contain</option>'+
											'<option value="is empty">is empty</option>'+
											'<option value="is not empty">is not empty</option>'+
								'</select>'+
							'</div>'+
						'</div>'+
						'<div class="col-lg-3 col-md-3 col-sm-3">'+
							'<a onclick="deleteoptConditions('+next+')"><i class="glyphicon glyphicon-trash" title="Delete"></i></a>'+
						'</div>'+
					'</div>';    
					 
			  $("#optConditionDiv").append(data); 
			  $(".optconditions").select2();
		
			   var val=$("#selTable").val();
			  $.post("<?php echo base_url();?>head/report/getData",{val:val},function(data){
		        
		          $(".optconditions").html(data);
		        }); 
     }
     else
     {

       alert("You Can Choose Only 3 Conditions");
     }          


  }


   function deleteoptConditions(val)
   {
	   
	    var next = $("#txtoptCount").val();
		next = parseInt(next)-1;
		 $("#txtoptCount").val(next);
		 $("#optcnddiv" +val).remove();
	

   }

  


                         //---functionused to get fields
                                      function checkTable()
                                      {
                                             $("#selTable").select2({
                                                        maximumSelectionLength: 4,
                                            	        formatSelectionTooBig: function (limit) {
                                            	         return 'You Can Select Only 4 Options';
                                            	        }
                                             });

                                            
                                            var val=$("#selTable").val();
                                            
                                            if(val !="")
                                            {   
                                               $.post("<?php echo base_url();?>head/report/getData",{val:val},function(data){
	                                               $("#selfield").html(data);
	                                               $(".sql").html(data);
	                                               $(".sqlgroup").html(data);
                                              }); 

                                               $.post("<?php echo base_url();?>head/report/getIntegerField",{val:val},function(data){
                                                   $("#cndTable").html(data);
                                                  });
                                               
                                               $.post("<?php echo base_url();?>head/report/getJoinConditions",{val:val},function(data){
                                                   $("#joinConditions").html(data);
                                                  });

                                               $.post("<?php echo base_url();?>head/report/getFixedcondition",{val:val},function(data){
                                                   $("#fixedConditions").html(data);

                                                   $(".fixedConditions").select2();
                                                  });
                                            }
                                            else
                                            {      
                                                   data="";
                                            	   $("#selfield").html(data);
	                                               $(".sql").html(data);
	                                               $(".sqlgroup").html(data);
	                                               $("#cndTable").html(data);
	                                               $("#joinConditions").html(data);
	                                               $("#fixedConditions").html(data);
                                             }    
                                             
                                      }

                                      function getTablefields()
                                      {
                                    	  var val=$("#selTable").val();
                                          if(val !="")
                                          {   
                                             $.post("<?php echo base_url();?>head/report/getData",{val:val},function(data){
                                               $(".sqlgroup").html(data);
                                              });

                                             
                                          } 

                                      }

                                    //---functionused to Check fields
                                      function checkField()
                                      {
                                             $("#selfield").select2({
                                                        maximumSelectionLength: 20,
                                            	        formatSelectionTooBig: function (limit) {
                                            	         return 'You Can Select Only 20 Options';
                                            	        }
                                             });
                                                
                                             
                                      }


                                      function addGroup() 
                                      {
                                      	var next = $("#groupCount").val();

                                        var exe=parseInt(next)-1;
                                      	
                                       	var data ='<div class="row sortFieldRow" style="padding-bottom: 10px;" id="group'+next+'">'+
												  '<span>'+
														'<div class="col-lg-4 col-md-4 col-sm-4 padding-none">'+
															'<div class="col-md-12 padding-none">'+
																'<select id="selgroupField'+next+'" name="selgroupField[]" class="form-control select2 sqlgroup" data-placeholder="Select Fiels" >'+
																'</select>'+
															'</div>'+
														'</div>'+
													'</span> <span class="col-lg-1 col-md-1 col-sm-1 padding-none">'+
														'<div class="">'+
															'<span class="col-lg-2 col-md-2 col-sm-2 padding-none">'+
																'<div>'+
																	'<input class="calculationType" name="rdbGroup'+next+'"  id="rdbGroup'+next+'" onclick="verifyGroup(this.id)" type="radio" value="1">'+
																'</div>'+
															'</span>'+
														'</div>'+
													'</span>'+ 
													'<span class="col-lg-7 col-md-7 col-sm-7 padding-none ">'+
														'<div class="">'+
															'<span class="col-lg-7 col-md-7 col-sm-7 padding-none">'+
															 '<input type="radio" style="top: 3px;" name="rdbOrder'+next+'" id="rdbOrder'+next+'" class="sortOrder" onclick="verifyOrder(this.id)" value="ASC">&nbsp;<span>Ascending</span>&nbsp;&nbsp;'+
															 '<input type="radio" style="top: 3px;" name="rdbOrder'+next+'" id="rdbOrder1'+next+'" class="sortOrder" onclick="verifyOrder(this.id)" value="DESC">&nbsp;<span>Descending</span></span>'+
														'</div><a onclick="removeGroup('+next+')"><i class="glyphicon glyphicon-trash" title="Delete"></i></a>'+
													'</span>'+
										  		  '</div>';
                                                      
				    					 if(next<3)	
				    					 {	 	
	                                      	 $("#groupDiv").append(data); 
	                                      	 next = parseInt(next)+1;
	                                      	 $("#groupCount").val(next); 
	                                       	 getTablefields();
				    					 }
				    					 else
				    					 {
                                             alert("You Can Add Only 1 Field");
 
					    			     }		 	
                                       }

                                       function removeGroup(id) 
                                       {
	                                      	var next = $("#groupCount").val();
	                                      	 next = parseInt(next)-1;
	                                      	 $("#groupCount").val(next);
	                                      	$("#group" + id).remove();
                                      	
                                      }
                                                                            
                                   
								</script>
