<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyAL4zVECEggJ8bToruaMSdU4gr9O71UD-I" async="" defer="defer"></script>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


<style>

.panel1
{
	border-bottom: 2px solid #ddd;

	padding: 10px 15px;

	height:320px;
}	

</style>

<div class="page-content-wrapper">
	<!-- BEGIN CONTENT BODY -->
	<div class="page-content">
		<div class=" app-ticket-list">
			<div class="page-bar row">
				<div class="col-md-3">
					<h1 class="page-title" style="margin-bottom: 0px; margin-top: 12px;">
						<?php getLocalkeyword('Dashboard');?><br>
						<ul class="page-breadcrumb" style="padding-top: 0px;">
							<li><a href="<?php echo base_url()?>head/dashboard"><?php getLocalkeyword('Home');?></a> <i class="fa fa-circle"></i></li>
							<li><span><?php getLocalkeyword('Dashboard');?></span></li>
						</ul>
					</h1>
				</div>
				
				<div class="col-md-8 pull-right">
					<div class="page-toolbar pull-right">
						<div id="dashboard-report-range" style="padding-top: 22px;" class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
							<i class="icon-calendar"></i>&nbsp; <span class="thin uppercase hidden-xs"></span>&nbsp; <i class="fa fa-angle-down"></i>
						</div>
					</div>
					<!-- /input-group -->
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">
					<h4 style="color: #ed6b75; margin-bottom: 32px; margin-top: 28px;" class="blink">Welcome <?php echo $this->session->userdata('admin_name');?>, Good Morning..!</h4>
				</div>
			</div>
			<!-- BEGIN PAGE HEADER-->
			<!-- BEGIN DASHBOARD STATS 1-->
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<a class="dashboard-stat dashboard-stat-v2 blue" href="#">
						<div class="visual">
							<i class="fa fa-comments"></i>
						</div>
						<div class="details">
							<div class="number">
								<span data-counter="counterup" data-value="<?php echo $Info['totalNewearning'];?>"><?php echo $Info['totalNewearning'];?></span>
							</div>
							<div class="desc"><?php getLocalkeyword('Total Earnings from new sales');?></div>
						</div>
					</a>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<a class="dashboard-stat dashboard-stat-v2 red" href="#">
						<div class="visual">
							<i class="fa fa-bar-chart-o"></i>
						</div>
						<div class="details">
							<div class="number">
								<span data-counter="counterup" data-value="<?php echo $Info['totalrechargeearning'];?>"><?php echo $Info['totalrechargeearning'];?>
							</div>
							<div class="desc"><?php getLocalkeyword('Total Earnings from recharge sale');?></div>
						</div>
					</a>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<a class="dashboard-stat dashboard-stat-v2 green" href="#">
						<div class="visual">
							<i class="fa fa-shopping-cart"></i>
						</div>
						<div class="details">
							<div class="number">
								<span data-counter="counterup" data-value="<?php echo $Info['totalClients'];?>"><?php echo $Info['totalClients'];?></span>
							</div>
							<div class="desc"><?php getLocalkeyword('Total Client');?></div>
						</div>
					</a>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<a class="dashboard-stat dashboard-stat-v2 purple" href="#">
						<div class="visual">
							<i class="fa fa-globe"></i>
						</div>
						<div class="details">
							<div class="number">
								<span data-counter="counterup" data-value="<?php echo $Info['totalRecharge']?>"><?php echo $Info['totalRecharge']?></span>
							</div>
							<div class="desc"><?php getLocalkeyword('Total Recharge');?></div>
						</div>
					</a>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<a class="dashboard-stat dashboard-stat-v2 purple" href="#">
						<div class="visual">
							<i class="fa fa-globe"></i>
						</div>
						<div class="details">
							<div class="number">
								<span data-counter="counterup" data-value="<?php echo $Info['totalMonthclient']?>"><?php echo $Info['totalMonthclient']?></span>
							</div>
							<div class="desc"><?php getLocalkeyword('Total clients (current month)');?></div>
						</div>
					</a>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<a class="dashboard-stat dashboard-stat-v2 green" href="#">
						<div class="visual">
							<i class="fa fa-globe"></i>
						</div>
						<div class="details">
							<div class="number">
								<span data-counter="counterup" data-value="<?php echo $Info['totalmonthRecharge']?>"><?php echo $Info['totalmonthRecharge']?></span>
							</div>
							<div class="desc"><?php getLocalkeyword('Total Recharge clients (current month)');?></div>
						</div>
					</a>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<a class="dashboard-stat dashboard-stat-v2 red" href="#">
						<div class="visual">
							<i class="fa fa-globe"></i>
						</div>
						<div class="details">
							<div class="number">
								<span data-counter="counterup" data-value="<?php echo $Info['totalClientlogin']?>"><?php echo $Info['totalClientlogin']?></span>
							</div>
							<div class="desc"><?php getLocalkeyword('Total login clients (current month)');?></div>
						</div>
					</a>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<a class="dashboard-stat dashboard-stat-v2 blue" href="#">
						<div class="visual">
							<i class="fa fa-globe"></i>
						</div>
						<div class="details">
							<div class="number">
								<span data-counter="counterup" data-value="<?php echo $Info['monthSms'];?>"><?php echo $Info['monthSms'];?></span>
							</div>
							<div class="desc"><?php getLocalkeyword('Total SMSes sent (current month)');?></div>
						</div>
					</a>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<a class="dashboard-stat dashboard-stat-v2 blue" href="#">
						<div class="visual">
							<i class="fa fa-globe"></i>
						</div>
						<div class="details">
							<div class="number">
								<span data-counter="counterup" data-value="<?php echo $Info['monthEmail'];?>"><?php echo $Info['monthEmail'];?></span>
							</div>
							<div class="desc"><?php getLocalkeyword('Total Emails sent (current month)');?></div>
						</div>
					</a>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<a class="dashboard-stat dashboard-stat-v2 red" href="#">
						<div class="visual">
							<i class="fa fa-globe"></i>
						</div>
						<div class="details">
							<div class="number">
								<span data-counter="counterup" data-value="<?php echo $Info['totalDaysale'];?>"><?php echo $Info['totalDaysale'];?></span>
							</div>
							<div class="desc"><?php getLocalkeyword('Todays new sales');?></div>
						</div>
					</a>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<a class="dashboard-stat dashboard-stat-v2 green" href="#">
						<div class="visual">
							<i class="fa fa-globe"></i>
						</div>
						<div class="details">
							<div class="number">
								<span data-counter="counterup" data-value="<?php echo $Info['totalDayrecharge'];?>"><?php echo $Info['totalDayrecharge'];?></span>
							</div>
							<div class="desc"><?php getLocalkeyword('Todays new recharge sales');?></div>
						</div>
					</a>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<a class="dashboard-stat dashboard-stat-v2 purple" href="#">
						<div class="visual">
							<i class="fa fa-globe"></i>
						</div>
						<div class="details">
							<div class="number">
								<span data-counter="counterup" data-value="<?php echo $Info['totaltodayClients'];?>"><?php echo $Info['totaltodayClients'];?></span>
							</div>
							<div class="desc"><?php getLocalkeyword('Todays new clients');?></div>
						</div>
					</a>
				</div>
			</div>
			<div class="clearfix"></div>
			<hr class="hr1">
			<div class="row">
				<ul id="draggablePanelList" class="list-unstyled">
					<li class="panel1 col-md-6">
						<h4 class="text-center panel-heading1" style="color: #000">
						<?php getLocalkeyword('Top 5 revenue generated clients');?>	<span class="movable"><img src="<?php echo base_url();?>themes/assets/move_icon.png"/></span>
						</h4>
						<table class="table table-striped table-bordered table-hover table-checkable order-column th_color">
							<thead>
								<th><?php getLocalkeyword('Name');?></th>
								<th><?php getLocalkeyword('Mobile No.');?></th>
								<th><?php getLocalkeyword('Total Order');?></th>
								<th><?php getLocalkeyword('Total Revenue');?></th>
							</thead>
							<tbody>
							    <?php 
							    $revenueResult=$this->dashboard_model->getToprevenueclients();
							    for($i=0;$i<count($revenueResult);$i++)
							    {
							    ?>
							
								<tr class="odd gradeX">
									<td><?php echo $revenueResult[$i]->clnt_name;?></td>
									<td><?php echo $this->encryption->decrypt($revenueResult[$i]->clnt_mobile);?></td>
									<td><?php echo $revenueResult[$i]->total;?></td>
									<td><?php echo $revenueResult[$i]->price;?></td>
								</tr>
								<?php 
								}
								?>
							</tbody>
						</table> 
						<a href="<?php echo base_url()?>head/client_management">
							<button class="btn btn-danger pull-right"><?php getLocalkeyword('View More');?></button>
					    </a>
					</li>
					<li class="panel1 col-md-6">
						<h4 class="text-center panel-heading1" style="color: #000;">
							<?php getLocalkeyword('Top 5 Sales Executives for Sales Generation & Revenue Generation');?><span class="movable"><img src="<?php echo base_url();?>themes/assets/move_icon.png"></span>
						</h4>
						<table class="table table-striped table-bordered table-hover table-checkable order-column th_color">
							<thead>
								<th><?php getLocalkeyword('Name');?></th>
								<th><?php getLocalkeyword('Mobile No.');?></th>
								<th><?php getLocalkeyword('Total Order');?></th>
								<th><?php getLocalkeyword('Total Revenue');?></th>
							</thead>
							<tbody>
							<?php 
							    $revenueResult=$this->dashboard_model->getToprevenuesales();
							    for($i=0;$i<count($revenueResult);$i++)
							    {
							    ?>
							
								<tr class="odd gradeX">
									<td><?php echo $revenueResult[$i]->sysmu_username;?></td>
									<td><?php echo $this->encryption->decrypt($revenueResult[$i]->sysmu_mobile);?></td>
									<td><?php echo $revenueResult[$i]->total;?></td>
									<td><?php echo $revenueResult[$i]->price;	?></td>
								</tr>
								<?php 
								}
								?>
														</tbody>
						</table> <a href="<?php echo base_url()?>head/client_management">
							<button class="btn btn-danger pull-right"><?php getLocalkeyword('View More');?></button>
					    </a>
					</li>
					<li class="panel1 col-md-6">
						<h4 class="text-center panel-heading1" style="color: #000">
							<?php getLocalkeyword('Top 5 Resellers for Sales Generation & Revenue Generation');?><span class="movable"><img src="<?php echo base_url();?>themes/assets/move_icon.png"></span>
						</h4>
						<table class="table table-striped table-bordered table-hover table-checkable order-column th_color">
							<thead>
								<th><?php getLocalkeyword('Name');?></th>
								<th><?php getLocalkeyword('Mobile No.');?></th>
								<th><?php getLocalkeyword('Total Order');?></th>
								<th><?php getLocalkeyword('Total Revenue');?></th>
							</thead>
							<tbody>
								<?php 
									$revenueResult=$this->dashboard_model->getToprevenuereseller();
								    for($i=0;$i<count($revenueResult);$i++)
								    {
								    ?>
									  	<tr class="odd gradeX">
											<td><?php echo $revenueResult[$i]->sysmu_username;?></td>
											<td><?php echo $this->encryption->decrypt($revenueResult[$i]->sysmu_mobile);?></td>
											<td><?php echo $revenueResult[$i]->total;?></td>
											<td><?php echo $revenueResult[$i]->price;	?></td>
										</tr>
									<?php 
									}
								?>
							</tbody>
						</table> <a href="<?php echo base_url()?>head/client_management">
							<button class="btn btn-danger pull-right"><?php getLocalkeyword('View More');?></button>
					    </a>
					</li>
					<li class="panel1 col-md-6">
						<h4 class="text-center panel-heading1" style="color: #000;">
							<?php getLocalkeyword('Approvals For Sender Id');?><span class="movable"><img src="<?php echo base_url();?>themes/assets/move_icon.png"></span>
						</h4>
						<table class="table table-striped table-bordered table-hover table-checkable order-column th_color">
							<thead>
								<th><?php getLocalkeyword('Name');?></th>
								<th><?php getLocalkeyword('Mobile No.');?></th>
								<th><?php getLocalkeyword('Business Name');?></th>
								<th><?php getLocalkeyword('Sender Id');?></th>
							</thead>
							<tbody>
								<?php 
								  $result=$Info['smsSender'];
								  $j=count($result);
								  if(count($result)>5)
								  {
								  	$j=5;
								  }
								
								  for($i=0;$i<$j;$i++)
								  {	
								  
								  ?>
										<tr class="odd gradeX">
											<td><?php echo $result[$i]->sysu_name;?></td>
											<td><?php echo $this->encryption->decrypt($result [$i]->sysu_mobile);?></td>
											<td>Business 1</td>
											<td><?php echo $result[$i]->sid_content;?></td>
										</tr>
								<?php 
								  }
								?>
							</tbody>
						</table>  <a href="<?php echo base_url()?>head/senderid_request">
							<button class="btn btn-danger pull-right"><?php getLocalkeyword('Location');?>View More</button>
					</a>
					</li>
					<li class="panel1 col-md-6">
						<h4 class="text-center panel-heading1" style="color: #000;">
							<?php getLocalkeyword('Approvals For SMS Templates');?><span class="movable"><img src="<?php echo base_url();?>themes/assets/move_icon.png"></span>
						</h4>
						<table class="table table-striped table-bordered table-hover table-checkable order-column th_color">
							<thead>
								<th><?php getLocalkeyword('Name');?></th>
								<th><?php getLocalkeyword('Mobile No.');?></th>
								<th><?php getLocalkeyword('Business Name');?></th>
								<th><?php getLocalkeyword('Template Name');?></th>
							</thead>
							<tbody>
								<?php 
								$result=$Info['smsTemplate'];
								$j=count($result);
								if(count($result)>5)
								{
									$j=5;
								}
								//else if(count($j)==0)
								for($i=0;$i<$j;$i++)
								{
								
	                             ?>
										<tr class="odd gradeX">
											<td><?php echo $result[$i]->sysu_name;?></td>
											<td><?php echo $this->encryption->decrypt($result [$i]->sysu_mobile);?></td>
											<td>Business 1</td>
											<td><?php echo $result[$i]->str_template_name;?></td>
										</tr>
								<?php 
								  }
								?>
							</tbody>
						</table>  <a href="<?php echo base_url()?>head/sms_temp_request">
							<button class="btn btn-danger pull-right"><?php getLocalkeyword('View More');?></button>
					</a>
					</li>
					<li class="panel1 col-md-6">
						<h4 class="text-center panel-heading1" style="color: #000;">
							<?php getLocalkeyword('Approvals For Email Templates');?><span class="movable"><img src="<?php echo base_url();?>themes/assets/move_icon.png"></span>
						</h4>
						<table class="table table-striped table-bordered table-hover table-checkable order-column th_color">
							<thead>
								<th><?php getLocalkeyword('Name');?></th>
								<th><?php getLocalkeyword('Mobile No.');?></th>
								<th><?php getLocalkeyword('Business Name');?></th>
								<th><?php getLocalkeyword('Template Name');?></th>
							</thead>
							<tbody>
								<?php 
								$result=$Info['emailTemplate'];
								$j=count($result);
								if(count($result)>5)
								{
									$j=5;
								}
								//else if(count($j)==0)
								for($i=0;$i<$j;$i++)
								{
								
	                             ?>
										<tr class="odd gradeX">
											<td><?php echo $result[$i]->sysu_name;?></td>
											<td><?php echo $this->encryption->decrypt($result [$i]->sysu_mobile);?></td>
											<td>Business 1</td>
											<td><?php echo $result[$i]->etr_template_name;?></td>
										</tr>
								<?php 
								  }
								?>
								</tbody>
						</table> <a href="<?php echo base_url()?>head/email_temp_request">
							<button class="btn btn-danger pull-right"><?php getLocalkeyword('View More');?></button>
					</a>
					</li>
					<li class="panel1 col-md-6">
						<h4 class="text-center panel-heading1" style="color: #000;">
							<?php getLocalkeyword('Client Payments Info');?><span class="movable"><img src="<?php echo base_url();?>themes/assets/move_icon.png"></span>
						</h4>
						<table class="table table-striped table-bordered table-hover table-checkable order-column th_color">
							<thead>
								<th width="15%;"><?php getLocalkeyword('Location');?>Name</th>
								<th><?php getLocalkeyword('Location');?>Mobile No.</th>
								<th style="line-height: 19px;"><?php getLocalkeyword('Payment Date');?></th>
								<th style="line-height: 19px;"><?php getLocalkeyword('Payment Mode');?></th>
								<th style="line-height: 19px;"><?php getLocalkeyword('Payment Type');?></th>
								<th style="line-height: 19px;"><?php getLocalkeyword('Payment value/cheque no');?></th>
							</thead>
							<tbody>
							 <?php 
							 
							 $clientResult=$this->dashboard_model->getClientpayments();
							 for($i=0;$i<count($clientResult);$i++)
							 {
							 ?>
								<tr class="odd gradeX">
									<td><?php echo $clientResult[$i]->clnt_name;?></td>
									<td><?php echo $this->encryption->decrypt($clientResult[$i]->clnt_mobile);?></td>
									<td><?php echo $clientResult[$i]->ord_purchaseDate;?></td>
									<td><?php echo $clientResult[$i]->ord_paymentMode;?></td>
									<td><?php echo $clientResult[$i]->ord_paymentType;?></td>
									<td><?php echo $clientResult[$i]->ord_discountPrice;?></td>
								</tr>
							<?php 
						     }
							?>
							</tbody>
						</table> <a href="<?php echo base_url()?>head/client_management">
							<button class="btn btn-danger pull-right"><?php getLocalkeyword('View More');?></button>
					</a>
					</li>
					<li class="panel1 col-md-6"></li>
					<li class="panel1 col-md-6">
						<h4 class="text-center panel-heading1" style="color: #000;"><?php getLocalkeyword('Monthly Trends Line Graphs');?></h4> <img src="<?php echo base_url();?>themes/assets/graph1.jpg" style="width: 100%; height: 180px;">
					</li>
					<li class="panel1 col-md-6">
						<h4 class="text-center panel-heading1" style="color: #000;"><?php getLocalkeyword('Bar Charts For Sales Executive/Reseller Comparison');?></h4> <img src="<?php echo base_url();?>themes/assets/graph1.jpg" style="width: 100%; height: 180px;">
					</li>
					<li class="panel1 col-md-6">
						<h4 class="text-center panel-heading1" style="color: #000;"><?php getLocalkeyword('Heat Graph City/Area To Have See the Maximum Customers');?></h4> 
						<div id="geo_chart" style="width: 100%; height: 180px;"></div>
					</li>
					<li class="panel1 col-md-6">
						<h4 class="text-center panel-heading1" style="color: #000;"><?php getLocalkeyword('Target vs Achievement Details');?></h4> <img src="<?php echo base_url();?>themes/assets/graph2.jpg" style="width: 100%; height: 180px;">
					</li>
					<li class="panel1 col-md-6">
						<h4 class="text-center panel-heading1" style="color: #000;"><?php getLocalkeyword('Guage Chart For Target Vs Achievement');?></h4> <img src="<?php echo base_url();?>themes/assets/graph2.jpg" style="width: 100%; height: 180px;">
					</li>
				</ul>
			</div>
			<!-- END DASHBOARD STATS 1-->
		</div>
	</div>
	<!-- END CONTENT BODY -->
</div>

<script type="text/javascript">
	
	 google.charts.load('current', {'packages':['bar','geochart']});
     google.charts.setOnLoadCallback(drawGeoLocationMap);


     function drawGeoLocationMap() 
    {
      // Create our data table out of JSON data loaded from server.

            var data = new google.visualization.arrayToDataTable([
               ['City', 'Total'],
               <?php                

                $result_city_data=$this->db->query("select ct.cty_name,count(vs.vis_cityId_fk) as total_visitors from tblmvbvisitors vs left join tblmvbcity ct on (vs.vis_cityId_fk=ct.cty_id_pk) group by vs.vis_cityId_fk");

                $row_city_data=$result_city_data->result();

                for($b=0;$b<count($row_city_data);$b++)
                {
                    //["mumbai",7172091],["pune",420556]
                    //echo '["Pune",12]';
                    echo '["'.ucfirst($row_city_data[$b]->cty_name).'",'.$row_city_data[$b]->total_visitors.'],';
                }?>]);    

              //console.log(data);              

            var options = {
                    region: 'IN',
                    displayMode: 'markers',
                    colorAxis: {colors: ['green', 'blue','orange']},
                    width:617,
                    height:200
            };

          var chart = new google.visualization.GeoChart(document.getElementById('geo_chart'));
          chart.draw(data, options);   
    }

</script>