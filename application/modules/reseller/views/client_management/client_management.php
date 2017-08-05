<div class="page-content-wrapper">
	<!-- BEGIN CONTENT BODY -->
	<div class="page-content">
		<div class=" app-ticket-list">
			<div class="page-bar row">
				<div class="col-md-6">
					<h1 class="page-title" style="margin-bottom: 0px; margin-top: 12px;">
						<?php getLocalkeyword('Client Management');?><br>
						<ul class="page-breadcrumb" style="padding-top: 0px;">
							<li><a href="<?php echo base_url();?>reseller/dashboard/"><?php getLocalkeyword('Home');?></a> <i class="fa fa-circle"></i></li>
							<li><span><?php getLocalkeyword('Client management');?></span></li>
						</ul>
					</h1>
				</div>
				<div class="col-md-6 pull-right">
					<div id="reportrange" class="btn pull-right " style="padding-top: 12px;">
						<i class="fa fa-calendar"></i> &nbsp; <span class="thin uppercase hidden-xs">August 28, 2016 - September 26, 2016</span> <b class="fa fa-angle-down"></b>
					</div>
				</div>
			</div>
			<!-- BEGIN PAGE HEADER-->
			<!-- BEGIN DASHBOARD STATS 1-->
			<div class="portlet light">
				<div class="portlet-body">
                <?php
					$id1=$this->session->userdata('reseller_id');
			     ?>
              <h4>
						<strong><?php getLocalkeyword('Seller Id');?>: <?php echo $id1; ?></strong>
					</h4>
					<table class="table table-hover table-checkable order-column" id="sample_1" style="width: 100% !important;">
						<thead>
							<tr>
								<th style="width: 35px;"><input type="checkbox" id="checkall" data-set="" name="all" /> <span id="growl-primary1"></span> </label></th>
								<th><?php getLocalkeyword('Sr.No');?></th>
								<th><?php getLocalkeyword('Client User Id');?></th>
								<th><?php getLocalkeyword('Name');?></th>
								<th><?php getLocalkeyword('Email Id');?></th>
								<th><?php getLocalkeyword('Mobile No');?>.</th>
								<th><?php getLocalkeyword('Location');?></th>
							</tr>
						</thead>
						<tbody>
			                    <?php
								for($i=0;$i < count($resultClients);$i ++)
								{
									$email=$this->encryption->decrypt($resultClients[$i]->clnt_email);
									$mobile=$this->encryption->decrypt($resultClients[$i]->clnt_mobile);
									$j=$i + 1;
									
									?>
			                  			<tr class="odd gradeX">
											<td><input name="chk<?php echo $j; ?>" class="check_box" type="checkbox" data-ptag="sb1" id="chk<?php echo $j; ?>" value="<?php echo $resultClients[$i]->clnt_id_pk;?>"></td>
											<td><?php echo $j;?> </td>
											<td><?php echo $resultClients[$i]->clnt_id_pk; ?></td>
											<td><a onclick="getClientprofile('<?php echo $resultClients[$i]->clnt_id_pk;?>');"><?php echo $resultClients[$i]->clnt_name; ?></a></td>
											<td><?php echo $email; ?></td>
											<td><?php echo $mobile; ?></td>
											<td><?php echo $resultClients[$i]->clnt_address; ?></td>
										</tr>
			                 <?php
								}
								?>
                      </tbody>
					</table>
				</div>
			</div>
			<!-- END DASHBOARD STATS 1-->
		</div>
	</div>
	<!-- END CONTENT BODY -->
</div>
<div class="page-content-wrapper1" id="clientProfile"></div>
<script src="http://listjs.com/assets/javascripts/list.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/list.pagination.js/0.1.1/list.pagination.min.js"></script>
<script>
      function getClientprofile(userId)
	  {
             
		  $(".page-content-wrapper").hide();
		  $(".page-content-wrapper1").show();
                 
		  $.post("<?php echo base_url();?>reseller/client_management/getClientprofile",{userId:userId},function(data){
                      $( ".page-content-wrapper1" ).html(data);
                      var monkeyList = new List('test-list', {

                          valueNames: ['name'],
                                  page: 10,
                                  plugins: [ ListPagination({}) ]

                          });
                      $("#close").click(function()
                        {
                
                             $(" .page-content-wrapper").show();
                               $(".page-content-wrapper1").hide();
                                 location.reload(true);
                  
                       });
					  
		            });
	 
	  }

      function getPackagedetails(id,type,client,name,order_id)
      {

 	   	  $.post("<?php echo base_url();?>reseller/client_management/getPackagedetails",{id:id,client:client,type:type,name:name,order_id:order_id},function(data){
 	   		      $(".package_details") .show();
 	   		      $(".package_details") .html(data);
 	 	          $("#package_table") .hide();        	                       
 			});
     	
     	 
       }
       
      function closProfileDiv()
      {
    	  $(".package_details") .hide();
  		   $("#package_table") .show();
            
      }

    
    </script>
