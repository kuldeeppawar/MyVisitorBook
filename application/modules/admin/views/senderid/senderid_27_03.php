
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="row">
			<div class="col-md-12">
				<div class=" app-ticket-list">
					<div class="page-bar row">
						<div class="col-md-6">
							<h3 class="page-title">Sender Id</h3>
							<ul class="page-breadcrumb ">
								<li><a href="<?php echo base_url()?>admin/dashboard">Home</a> <i class="fa fa-circle"></i></li>
								<li><span>Sender Id</span></li>
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
              
            if( $this->session->flashdata('success'))
              {
                  ?>
                     <div id="prefix_834140561262" class="custom-alerts alert alert-success fade in "><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><?php echo $this->session->flashdata('success');?></div>
                  <?php 
              }
              else   if( $this->session->flashdata('error'))
              {?>
              
                    <div id="prefix_1445089440962" class="custom-alerts alert alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><?php echo $this->session->flashdata('error');?></div>
              <?php }   
              
             
              ?>
						<!--modal-->
						<div id="addSender" class="modal fade in" role="dialog">
							<div class="modal-dialog">
								<!-- Modal content-->
								<div class="col-md-10 col-md-offset-2 modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">×</button>
										<h2 class="modal-title text-center">
											<i class="fa fa-plus"></i> Add Sender Id
										</h2>
									</div>
									<div class="modal-body">
										<div class="portlet-body form">
											<form role="form" id="frmAdd" action="<?php echo base_url()?>admin/senderid/addSenderid" method="post">
												<div class="form-body">
													<div class="form-group">
														<label class="">Sender Id </label><br>
														 <input type="text" name="txtSenderid" class=" form-control" placeholder="" required="required">
													</div>
													<div class="modal-footer">
														<button type="Submit" name="btnSubmit" class="btn btn-primary">Save</button>
														<button type="button" data-dismiss="modal" class="btn btn-danger">Cancel</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div id="editSender" class="modal fade in" role="dialog">
							
						</div>
						<!--end modal-->
						<div class="col-md-12">
							<div class="table-toolbar">
								<div class="row">
									<div class="col-md-3 ">
										<ul class="nav navbar-nav pl0">
											<li class="dropdown dropdown-user"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" style="font-size: 18px; padding: 2px 0px;">Recently updated <i class="fa fa-angle-down"></i>
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
												<a href="#" onclick="getRecord();" class="margin_rgt hide_element" data-toggle="modal" > <i class="fa fa-pencil-square-o fa-2x" title="edit" style="color: #828282;"></i></a>
												 <a href="#"  onclick="setDefault();" class="margin_rgt hide_element"> <i
													class="fa fa-asterisk fa-2x" title="Set as Default" style="color: #828282;"
												></i></a>
											</div>
											<div class="btn-group">
												<a id="sample_editable_1_new hvr-float-shadow" data-toggle="modal" data-target="#addSender" class="btn btn-primary"> <!-- <i class="fa fa-user-plus" title="Add Visitor"></i>  -->Add Sender Id
												</a>
											</div>
											<ul class="nav navbar-nav pl0 pull-right" style="margin-left: 5px;">
												<li class="dropdown dropdown-user burger_menu"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" style="margin-top: 0px;"><i class="fa fa-bars fa-2x" aria-hidden="true"></i>
												</a>
													<ul class="dropdown-menu dropdown-menu-default">
														<li class="options" style="border-bottom: 1px solid #e7ecf1;"><a href="#"  onclick="chechCheckbox(1);" title="Custom Fields" style="padding: 5px; margin-top: 5px;">Active</a></li>
														<li class="options"><a href="#" title="Custom Fields"   onclick="chechCheckbox(0);" style="padding: 5px; margin-top: 5px;">Deactive</a></li>
													</ul></li>
											</ul>
											<!-- modal ends -->
										</div>
									</div>
								</div>
								<div class="selected_rows">
									1/17 row(s) selected <a id="selectall">select all</a>
								</div>
								<div class="portlet light">
									<div class="portlet-body">
										<table class="table table-hover table-checkable order-column" id="sample_1" style="width: 100% !important;">
											<thead>
												<tr>
													<th style="width: 35px;"><input type="checkbox" id="checkall" data-set="" name="all" /> <span id="growl-primary1"></span> </label></th>
													<th>Sr.No</th>
													<th>Sender Id</th>
													<th>Added Date</th>
													<th>Default</th>
													<th>Status</th>
												</tr>
											</thead>
											<tbody>
												
												<?php for($i=0;$i<count($resultId);$i++)
												{	
												   $j=$i+1;
													?>
												<tr class="odd gradeX">
													<td><input name="chk<?php echo $j;?>" class="check_box" type="checkbox" data-ptag="sb1" id="chk<?php echo $j;?>"
													 value="<?php echo $resultId[$i]->sid_id_pk;?>"></td>
													<td><?php  echo $j;?></td>
													<td><?php echo $resultId[$i]->sid_content;?></td>
													<td><?php echo $resultId[$i]->sid_createdDate;?></td>
													<th><?php  if($resultId[$i]->sid_default==1){ echo "YES";}?></th>
													<td><?php   if($resultId[$i]->sid_status==1){ echo "Active";} else { echo "Deactive";}?></td>
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
function chechCheckbox(id)
{
     var count=<?php echo count($resultId) ?>;
     var senderId=[];
     
     for (var i=1;i<=count;i++)
     {
   	  if($('#chk'+i).is(':checked'))
   	  {
   		senderId.push($("#chk"+i).val()); 
   	  }
      } 

     
     if (senderId.length === 0) {
   	   alert ("Please Select The sender Id");
   	      
   	}
     else
     {
         
          $.post("<?php echo base_url();?>admin/senderid/changeIdstatus",{id:id,senderId:senderId},function(data){

                 location.reload(true);
               });
           
      }  
}

function getRecord()
{
     var count=<?php echo count($resultId)?>;
  
     var senderId;
     
     for (var i=1;i<=count;i++)
     {
   	  if($('#chk'+i).is(':checked'))
   	  {
   		senderId=$("#chk"+i).val(); 
   	
   	      $.post("<?php echo base_url();?>admin/senderid/getSpecificSenderid",{senderId:senderId},function(data){

              $("#editSender").html(data);
              $('#editSender').modal('show'); 
		              $("#frmEdit").validate({
		            	  rules:{             
		            	    	txtSenderid:{
		            	            required:true
		            	        }
		            	    },
		            	    messages:{                      
		            	    	txtSenderid:{
		            	            required:"Please Enter Sender Id"
		            	        }
		            	    }
		            });
           });
   	  }
     } 

}

function setDefault()
{
     var count=<?php echo count($resultId)?>;
  
     var senderId;
     
     for (var i=1;i<=count;i++)
     {
   	  if($('#chk'+i).is(':checked'))
   	  {
   		senderId=$("#chk"+i).val(); 
   	
   	       $.post("<?php echo base_url();?>admin/senderid/setDefaultid",{senderId:senderId},function(data){

   	    	location.reload(true);
           });
   	  }
     } 

}

$("#frmAdd").validate({
    rules:{             
    	txtSenderid:{
            required:true
        }
    },
    messages:{                      
    	txtSenderid:{
            required:"Please Enter Sender Id"
        }
    }
});




</script>