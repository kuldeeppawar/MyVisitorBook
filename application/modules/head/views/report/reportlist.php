<div class="page-content-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-md-12">
                <div class=" app-ticket-list">
                    <div class="page-bar row">
                        <div class="col-md-6">
                            <h3 class="page-title"><?php getLocalkeyword('Reports Management');?></h3>
                            <ul class="page-breadcrumb ">
                                <li><a href="<?php echo base_url()?>head/dashboard"><?php getLocalkeyword('Home');?></a>  <i class="fa fa-circle"></i>
                                </li>
                                <li><a href="#"><?php getLocalkeyword('Customization');?></a>  <i class="fa fa-circle"></i>
                                </li>
                                <li><span><?php getLocalkeyword('Reports Management');?></span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <div id="reportrange" class="btn pull-right " style="padding-top: 12px;">
                                <i class="fa fa-calendar"></i> &nbsp; <span class="thin uppercase hidden-xs">August 28, 2016 - September 26, 2016</span>  <b class="fa fa-angle-down"></b>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    	<?php
					
					if ($this->session->flashdata('success'))
					{
						?>
							<div id="prefix_834140561262" class="custom-alerts alert alert-success fade in "> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
								<?php echo $this->session->flashdata('success');?>
							</div>
							<?php
					} else if ($this->session->flashdata('error'))
					{
						?>
								<div id="prefix_1445089440962" class="custom-alerts alert alert-danger fade in"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
									<?php echo $this->session->flashdata('error');?>
								</div>
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
                                            <li class="dropdown dropdown-user"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" style="font-size: 18px; padding: 2px 0px;">Recently updated <i class="fa fa-angle-down"></i>
														</a>
                                                <ul class="dropdown-menu dropdown-menu-default">
                                                    <li><a href="#">All Contacts</a>
                                                    </li>
                                                    <li><a href="#">My Contacts </a>
                                                    </li>
                                                    <li><a href="#">Recently viewed</a>
                                                    </li>
                                                    <li><a href="#">Not updated in 30 Days</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-5  pull-right">
                                        <div class="pull-right">
                                            <div style="float: left; margin-top: 8px; margin-right: 5px;">
                                                <?php 
                                                if (getAccessRights('mvbSetRmEdit'))
                                                {	
                                                ?>
                                                
                                                <a href="#" onclick="editReport()" class="margin_rgt hide_element" id="edit1"> <i class="fa fa-pencil-square-o fa-2x" title="Edit" style="color: #828282;"></i>
                                                </a>
                                                <?php 
                                                }
                                                if (getAccessRights('mvbSetRmPush'))
                                                {
                                                ?>
                                                
                                                <a href="#" onclick="pushrevokeReport(1)" class="margin_rgt hide_element">
                                                    <i class="fa fa-mail-forward fa-2x" title="Push" style="color: #828282;"></i>
                                                </a>
                                               <?php 
                                                }
                                                if (getAccessRights('mvbSetRmRevoke'))
                                                {	
                                               ?> 
                                                
                                                <a href="#" onclick="pushrevokeReport(0)" class="margin_rgt hide_element"> <i class="fa fa-mail-reply fa-2x" title="Revoke" style="color: #828282;"></i>
                                                </a>
                                                <?php 
                                                }
                                                ?>

                                            </div>
                                            <div class="btn-group">
                                                <?php 
                                                if (getAccessRights('mvbSetRmAdd'))
                                                {	
                                                ?>
                                                <a href="<?php echo base_url()?>head/report/addReport" class="btn btn-primary"><?php getLocalkeyword('Add');?></a>
                                               <?php 
                                                }
                                               ?>
                                            </div>
                                            <!-- modal ends -->
                                        </div>
                                    </div>
                                </div>
                                <div class="selected_rows">
                                <a id="selectall"><?php getLocalkeyword('select all');?></a>
                                </div>
                                <div class="portlet light">
                                    <div class="portlet-body">
                                     <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable allchekbox" id="sample_1_2" role="grid" aria-describedby="sample_1_2_info">
                                            <thead>
                                                <tr>
                                                    <th style="width: 35px;">
                                                        <input type="checkbox" id="checkall" data-set="" name="all" />
                                                        </label>
                                                    </th>
                                                    <th><?php getLocalkeyword('Report Name');?></th>
                                                    <th><?php getLocalkeyword('Report Fields Name');?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                               
                                                 for($i=0;$i<count($resultReport);$i++)
                                                 {	
                                                 	?>
                                                
	                                                <tr class="odd gradeX">
	                                                    <td>
	                                                        <input name="chk1" class="check_box" type="checkbox" data-ptag="sb1" id="chk<?php echo $i;?>" value="<?php echo $resultReport[$i]->report_id_pk;?>">
	                                                    </td>
	                                                    <td><?php echo $resultReport[$i]->report_name;?></td>
	                                                    <td><?php echo $resultReport[$i]->report_field;?></td>
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
<<script type="text/javascript">
function pushrevokeReport(id) {
	var count = <?php echo count($resultReport)?>;
	var report = [];
	for (var i = 0; i < count; i++) {
		if ($('#chk' + i).is(':checked')) {
			report.push($("#chk" + i).val());
		}
	}
	if (report.length === 0) {
		alert("Please select the report ");
	} else {
		$.post("<?php echo base_url();?>head/report/pushrevokeReport", {
			id: id,
			report: report
		}, function(data) {
			location.reload(true);
		});
	}
}

function editReport()
{
     var count=<?php echo count($resultReport)?>;
     var report_id="";
     
     for (var i=0;i<count;i++)
     {
   	  if($('#chk'+i).is(':checked'))
   	  {
   		report_id=$("#chk"+i).val(); 
   	  }
      } 

     
     if (report_id == "") {
   	   alert ("Please select the Report");
   	      
   	}
     else
     {
      	 //var encode_id='<?php echo base64_encode();?>';
    	 window.location.replace("<?php echo base_url()."head/report/editReport/"?>"+window.btoa(report_id));
           
      }  
    

}
</script>
