<div class="page-content-wrapper">
	<div class="page-content">
		<div class="row">
			<div class="col-md-12">
				<div class=" app-ticket-list">
					<div class="page-bar row">
						<div class="col-md-6">
							<h3 class="page-title"><?php getLocalkeyword('Report Management');?></h3>
							<ul class="page-breadcrumb ">
								<li><a href="<?php echo base_url()?>admin/dashboard"><?php getLocalkeyword('Home');?></a> <i class="fa fa-circle"></i></li>
								<li><span><?php getLocalkeyword('Report Management');?></span></li>
							</ul>
						</div>
						<div class="col-md-6"></div>
					</div>

					<div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN VALIDATION STATES-->
                            <div class="portlet light portlet-fit portlet-form bordered">
                      
                                <div class="portlet-body">
                                    <!-- BEGIN FORM -->
                                  
                                        <div class="form-body form-horizontal" >
                                            <div class="form-group">
                                                <label class="control-label col-md-3">
                                                 <?php getLocalkeyword('Select Report');?>
                                                </label>
                                                <div class="col-md-4">
                                                    <select class="form-control" name="selReport" id="selReport" onchange="getFilters(this.value)">
                                                    	<option value=""> Select Report </option>
                                                        <?php 
															for($i=0;$i<count($resultReport);$i++)
															{
																
																?>
														       <option value="<?php echo $resultReport[$i]->report_id_pk;?>"><?php echo $resultReport[$i]->report_name;?></option>	
															    <?php 
															}
															?>
															
                                                    </select>
                                                 </div>
                                            </div>
                                            <div id="frm">
                                            </div>
                               
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <a class="btn green" onclick="getReport()">Submit</a>
                                                    <button type="button" class="btn grey-salsa btn-outline">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                 
                                    <!-- END FORM-->
                                </div>
                            </div>
                            <!-- END VALIDATION STATES-->
                        </div>
                    </div>
                    <div class="portlet light" id="showRecord">
									<div class="portlet-body">
										<table class="table table-hover table-checkable order-column" id="sample_1_2" style="width: 100% !important;">
											
										</table>
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
<a href="javascript:;" class="page-quick-sidebar-toggler"> <i class="icon-login"></i>
</a>
<script type="text/javascript">
function getFilters(val)
{
	
    if(val !="")
    {   
       $.post("<?php echo base_url();?>admin/report/getReportfield",{val:val},function(data){
         $("#frm").html(data);
       
        });

       
    } 

}

function getReport()
{
   var val=$("#txtValidate").val();

   
   if(val==1)
   {
	   var report=$("#selReport").val();

	  
	    if(report!= "" )
	    {  
	    	//$( "#frmsubmit" ).submit();
          
		   $.post("<?php echo base_url();?>admin/report/getReportcsv",{val:report},function(data){
			 
			    $("#sample_1_2").html(data);
        		  // $("#sample_1").dataTable({});    
	        });
	    }
	    else
	    {
              alert("Please Select Report");
		 }   
    }  
   else   if(val==2)
   {
	   var report=$("#selReport").val(); 
	   var count=$("#txtCount").val();

	   if(count==1)
	   {
		   var val1=$("#txtConditions1").val();
		 
          if(val1!="" && val1!=null)
          {
        	//  $( "#frmsubmit" ).submit();
       	   $.post("<?php echo base_url();?>admin/report/getReportcsv",{val:report,val1:val1},function(data){

       		 
      		   $("#sample_1_2").html(data);
        		 //  $("#sample_1").dataTable({});    
   	           });
   	          
                
           } 
          else
          {
               alert("Please Insert All Field");
              }   


		} 
	   if(count==2)
	   {
		   var val1=$("#txtConditions1").val();
		   var val2=$("#txtConditions2").val();
          if(val1!="" && val2!="" && val1!=null && val2!=null)
          {
        	 // $( "#frmsubmit" ).submit();
        	   $.post("<?php echo base_url();?>admin/report/getReportcsv",{val:report,val1:val1,val2:val2},function(data){
        		 
        		   $("#sample_1_2").html(data);
        		 //  $("#sample_1").dataTable({});    
   	        });
   	        

           } 
          else
          {
               alert("Please Insert All Field");
              } 


		} 
	   if(count==3)
	   {
		   var val1=$("#txtConditions1").val();
		   var val2=$("#txtConditions2").val();
		   var val3=$("#txtConditions3").val()
          if(val1!="" && val3!="" && val2!="" && val1!=null && val3!=null && val2!=null)
          {
        	  //$( "#frmsubmit" ).submit();
        	  
        	   $.post("<?php echo base_url();?>admin/report/getReportcsv",{val:report,val1:val1,val2:val2,val3:val3},function(data){
        		   
                 
        		   $("#sample_1_2").html(data);
        		   //$("#sample_1").dataTable({});    
         		  
        		   
           	   });
   	       
   	       

           } 
          else
          {
               alert("Please Insert All Field");
              } 


		} 
       
          
	   
   }
   else
   {
	   alert("Please Select Report");
   }    
	   
   
}



</script>
