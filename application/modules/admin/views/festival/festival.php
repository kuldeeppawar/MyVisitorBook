
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="row">
			<div class="col-md-12">
				<div class=" app-ticket-list">
					<div class="page-bar row">
						<div class="col-md-6">
							<h3 class="page-title"><?php getLocalkeyword('Festival Management');?></h3>
							<ul class="page-breadcrumb ">
								<li><a href="<?php echo base_url()?>admin/dashboard"><?php getLocalkeyword('Home');?></a> <i class="fa fa-circle"></i></li>
								<li><span><?php getLocalkeyword('Festival Management');?></span></li>
							</ul>
						</div>
						<div class="col-md-6">
							<div id="reportrange" class="btn pull-right " style="padding-top: 12px;">
								<i class="fa fa-calendar"></i> &nbsp; <span class="thin uppercase hidden-xs">August 28, 2016 - September 26, 2016</span> <b class="fa fa-angle-down"></b>
							</div>
						</div>
					</div>
					<div class="row">
					
						<!--modal-->
						<!--end modal-->
						<div class="col-md-12">
							<div class="table-toolbar">
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
											<div class="btn-group">
											<?php if(getAdminAccessRights('mvbSetFestConfirm')){ ?>
												<a id="sample_editable_1_new hvr-float-shadow" class="btn btn-primary" onclick="getConfirmfestival()">
												<?php getLocalkeyword('Confirm Festival');?>
												</a>
											<?php } ?>												
											</div>
											</li>
											</ul>
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
													<th style="width: 35px;"><input  type="checkbox" id="checkall" data-set="" name="all" /> <span id="growl-primary1"></span> </label></th>
													<th><?php getLocalkeyword('Sr.No');?></th>
													<th><?php getLocalkeyword('Branch');?></th>
													<th><?php getLocalkeyword('Location');?></th>
													<th><?php getLocalkeyword('Festival Name');?></th>
													<th><?php getLocalkeyword('Festival Date');?></th>
													<th><?php getLocalkeyword('Status');?></th>
													<th><?php getLocalkeyword('Action');?></th>
												</tr>
											</thead>
											<tbody>
											  <?php 
											  
											  
											  
											     for($i=0;$i<count($resultFestival);$i++)
											     {
											     	
											     	$j=$i+1;
											     	$dt="chk".$j;
											      ?>
												<tr class="odd gradeX">
													<td>
													<input name="chk<?php echo $j;?>"    type="checkbox" data-ptag="sb1" id="chk<?php echo $j;?>" 
													 <?php if($resultFestival[$i]->fest_category==1){ echo "checked  ";  echo "disabled  ";  echo "class='check_box chkdisable'" ;   }
													          else if($resultFestival[$i]->brnfs_id_pk >0 ){ echo "checked  ";  echo "class='check_box'" ;}   
													          else{  echo "class='check_box'"; }
													 ?>       value="<?php echo $resultFestival[$i]->fest_id_pk."-".$resultFestival[$i]->brn_id_pk;?>">
													</td>
													<td><?php echo $j?></td>
													<td><?php echo $resultFestival[$i]->brn_name;?></td>
													<td><?php echo $resultFestival[$i]->stat_name;?></td>
													<td><?php echo $resultFestival[$i]->fest_name;?></td>
													<td><?php echo $resultFestival[$i]->fest_date;?></td>
													<td><?php if($resultFestival[$i]->brnfs_id_pk>0)
													            {
													            	echo "Selected";
													            }
													            else 
													            {
													            	echo "Not Selected";
													            }	
														?></td>
													<td><input type="checkbox"  class="make-switch" name="chk<?php echo $j;?>"   data-on-text="&nbsp;Select&nbsp;" data-off-text="&nbsp;Unselect&nbsp;" data-size="small"
													    <?php  if($resultFestival[$i]->fest_category==1 )
													          { echo "checked  ";  echo "disabled";  }
													          else if($resultFestival[$i]->brnfs_id_pk>0)
													           { echo "checked  ";}
													          
													       ?>>
													     
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
</div>
</div>
<script>
function getConfirmfestival()
{
     var count=<?php echo count($resultFestival)?>;
  
     var festival=[];
     
     for (var i=1;i<=count;i++)
     {
   	  if($('#chk'+i).is(':checked'))
   	  {
   		festival.push($("#chk"+i).val()); 
   	  }
      } 

     
     if (festival.length === 0) {
   	   alert ("Please Select Festivals Name");
   	      
   	}
     else
     {


          $.post("<?php echo base_url();?>admin/festival/getConfirmfestival",{festival:festival},function(data){
       	 location.reload(true);
               });
           
      }  
    

}




</script>