<div class="page-content-wrapper">
	<!-- BEGIN CONTENT BODY -->
	<div class="page-content">
		<div class=" app-ticket-list">
			<div class="page-bar row">
				<div class="col-md-6">
					<h1 class="page-title" style="margin-bottom: 0px; margin-top: 12px;">
						<?php getLocalkeyword('Dashboard');?><br>
						<ul class="page-breadcrumb" style="padding-top: 0px;">
							<li><a href="<?php echo base_url(); ?>reseller/dashboard/"><?php getLocalkeyword('Home');?></a> <i class="fa fa-circle"></i></li>
							<li><span><?php getLocalkeyword('Dashboard');?></span></li>
						</ul>
					</h1>
				</div>
				<div class="col-md-6 pull-right">
					<div id="reportrange" class="btn pull-right " style="padding-top: 12px;">
						<i class="fa fa-calendar"></i> &nbsp; <span class="thin uppercase hidden-xs">August 28, 2016 - September 26, 2016</span> <b class="fa fa-angle-down"></b>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">
					<h4 style="color: #ed6b75; margin-bottom: 32px; margin-top: 28px;" class="blink">Welcome <?php echo $this->session->userdata('reseller_name');?></h4>
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
								<span data-counter="counterup" data-value="<?php echo $monthEmail; ?>"><?php echo $monthEmail; ?></span>
							</div>
							<div class="desc"><?php getLocalkeyword('Total Email Sent');?></div>
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
								<span data-counter="counterup" data-value="<?php echo $monthSms; ?>"><?php echo $monthSms; ?>
							
							</div>
							<div class="desc"><?php getLocalkeyword('Total SMS Sent');?></div>
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
								<span data-counter="counterup" data-value="<?php echo $totalClients; ?>"><?php echo $totalClients; ?></span>
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
								<span data-counter="counterup" data-value="89"><?php echo $totaltodayClients; ?></span>
							</div>
							<div class="desc"><?php getLocalkeyword('Total System Users');?></div>
						</div>
					</a>
				</div>
			</div>
			<div class="clearfix"></div>
			<hr class="hr1">
			<div class="row">
				<ul id="draggablePanelList" class="list-unstyled">
					<li class="panel1 col-md-6">
						<h4 class="text-center panel-heading1" style="color: #000;">
							<?php 
							getLocalkeyword('New Package');
							?><span class="movable"><img src="<?php echo base_url(); ?>themes/assets/move_icon.png"</span>
						</h4>
						<table class="table table-striped table-bordered table-hover table-checkable order-column th_color">
							<thead>
								<th><?php getLocalkeyword('Sr.No');?></th>
								<th><?php getLocalkeyword('Package Name');?></th>
								<th><?php getLocalkeyword('Cost');?></th>
								<th><?php getLocalkeyword('Payout');?></th>
							</thead>
							<tbody>
                           <?php	
                                for($i=0;$i < count($totalPackages);$i ++)
								{
									$j=$i + 1;
								?>
                                <tr class="odd gradeX">
									<td><?php echo $j; ?></td>
									<td><?php echo $totalPackages[$i]->pkg_name; ?></td>
									<td><?php echo $totalPackages[$i]->pkgd_finalPrice; ?></td>
									<td><?php 
									           if($totalPackages[$i]->pkgd_dealerPayMethod==1)
									           {
									           	
									           	echo ($totalPackages[$i]->pkgd_finalPrice/100)*$totalPackages[$i]->pkgd_dealerAmount;
									           	
									           }
									           else 
									           {
									           	 echo  $totalPackages[$i]->pkgd_dealerAmount;
									           }	
									           
									
									
									
									
									
									?></td>
								</tr>
                                <?php
								}
							?>
                                
                            </tbody>
						</table> <!--<a href="#">
                             <button class="btn btn-danger pull-right">View More</button>
                             </a>-->
					</li>
					<li class="panel1 col-md-6">
						<h4 class="text-center panel-heading1" style="color: #000;">
							<?php getLocalkeyword('Renewal Package');?><span class="movable"><img src="<?php echo base_url(); ?>themes/assets/move_icon.png"</span>
						</h4>
						<table class="table table-striped table-bordered table-hover table-checkable order-column th_color">
							<thead>
							    <th><?php getLocalkeyword('Sr.No');?></th>
								<th><?php getLocalkeyword('Package Name');?></th>
								<th><?php getLocalkeyword('Cost');?></th>
								<th><?php getLocalkeyword('Payout');?></th>
							</thead>
							<tbody>
                              <?php
								for($i=0;$i < count($totalRenewPackages);$i ++)
								{
									$j=$i + 1;
									
									?>
                                <tr class="odd gradeX">
									<td><?php echo $j; ?></td>
									<td><?php echo $totalRenewPackages[$i]->rpkg_packageName; ?></td>
									<td><?php echo $totalRenewPackages[$i]->rpkg_finalPrice; ?></td>
									<td><?php 
									
									if($totalRenewPackages[$i]->rpkg_dealerPayMethod==1)
									{
										 
										echo ($totalRenewPackages[$i]->rpkg_finalPrice/100)*$totalRenewPackages[$i]->rpkg_dealerAmount;
										 
									}
									else
									{
										echo  $totalRenewPackages[$i]->rpkg_dealerAmount;
									}
									
									
									?></td>
								</tr>
                                <?php
								}
								?>
                            </tbody>
						</table> <!--<a href="#">
                             <button class="btn btn-danger pull-right">View More</button>
                             </a>-->
					</li>
				</ul>
			</div>
			<!-- END DASHBOARD STATS 1-->
		</div>
	</div>
	<!-- END CONTENT BODY -->
</div>
<!-- END DASHBOARD STATS 1-->



