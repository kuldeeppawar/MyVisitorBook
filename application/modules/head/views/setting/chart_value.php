
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="row">
			<div class="col-md-12">
				<div class=" app-ticket-list">
					<div class="page-bar row">
						<div class="col-md-6">
							<h3 class="page-title"><?php getLocalkeyword('Setting');?></h3>
							<ul class="page-breadcrumb ">
								<li><a href="<?php echo base_url()?>head/dashboard"><?php getLocalkeyword('Home');?></a> <i class="fa fa-circle"></i></li>
								<li><span><?php getLocalkeyword('Gauge Charts');?></span></li>
							</ul>
						</div>
						<div class="col-md-6">
							<div id="reportrange" class="btn pull-right " style="padding-top: 12px;">
								<i class="fa fa-calendar"></i> &nbsp; <span class="thin uppercase hidden-xs">August 28, 2016 - September 26, 2016</span> <b class="fa fa-angle-down"></b>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="col-md-12 col-sm-12">
								<div class="col-md-8 col-sm-8">
									<h4><?php getLocalkeyword('LTD');?></h4>
								</div>
							</div>
							<div class="col-md-8 col-sm8">
								<label class="label-control col-md-3"><?php getLocalkeyword('Total Clients');?></label>
								<div class="form-group col-md-9">
									<input type="number" accept="any" value="<?php echo $resultValue[0]->gchart_totalclients;?>" name="txtTotalclients" id="txtTotalclients" class="form-control" placeholder="Total Clients" />
								</div>
							</div>
							<div class="col-md-8 col-sm8">
								<label class="label-control col-md-3"><?php getLocalkeyword('Total Recharges');?></label>
								<div class="form-group col-md-9">
									<input type="number" accept="any" value="<?php echo $resultValue[0]->gchart_totalrecharges;?>" name="txtTotalrecharges" id="txtTotalrecharges" class="form-control"
										placeholder="Total recheges"
									/>
								</div>
							</div>
							<div class="col-md-8 col-sm8">
								<label class="label-control col-md-3"><?php getLocalkeyword('Total Revenue');?></label>
								<div class="form-group col-md-9">
									<input type="number" accept="any" value="<?php echo $resultValue[0]->gchart_totalvevenue;?>" name="txtTotalrevenue" id="txtTotalrevenue" class="form-control" placeholder="Total revenue" />
								</div>
							</div>
							<div class="col-md-8 col-sm8">
								<div class="col-md-3"></div>
								<div class="col-md-2">
									<?php
									if(getAccessRights('mvbSetGcAdd'))
									{
								    ?>
									<button onclick="saveChartvalue()" class="btn btn-primary btn-block"><?php getLocalkeyword('Save');?></button>
								   <?php 
									}
								   ?>
								</div>
								<div class="col-md-2">
									<button class="btn btn-default btn-block"><?php getLocalkeyword('Cancel');?></button>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-sm-12">
							<div class="col-md-12 col-sm-12">
								<div class="col-md-8 col-sm-8">
									<h4><?php getLocalkeyword('MTD');?></h4>
								</div>
							</div>
							<div class="col-md-8 col-sm8">
								<label class="label-control col-md-3"> <?php getLocalkeyword('New Sales');?></label>
								<div class="form-group col-md-9">
									<input type="number" accept="any" value="<?php echo $resultValue[0]->gchart_newsales;?>" name="txtNewsales" id="txtNewsales" class="form-control" placeholder=" New sales" />
								</div>
							</div>
							<div class="col-md-8 col-sm8">
								<label class="label-control col-md-3"><?php getLocalkeyword('Recharge Sales');?></label>
								<div class="form-group col-md-9">
									<input type="number" accept="any" value="<?php echo $resultValue[0]->gchart_rechargesales;?>" name="txtRechargesales" id="txtRechargesales" class="form-control" placeholder="Recharge Sales" />
								</div>
							</div>
							<div class="col-md-8 col-sm8">
								<label class="label-control col-md-3"> <?php getLocalkeyword('New sales revenue');?></label>
								<div class="form-group col-md-9">
									<input type="number" accept="any" value="<?php echo $resultValue[0]->gchart_newsalesrevenue;?>" name="txtSalesrevenue" id="txtSalesrevenue" class="form-control"
										placeholder="New sales revenue"
									/>
								</div>
							</div>
							<div class="col-md-8 col-sm8">
								<label class="label-control col-md-3"><?php getLocalkeyword('Recharge sales revenue');?></label>
								<div class="form-group col-md-9">
									<input type="number" accept="any" value="<?php echo $resultValue[0]->gchart_rechargesalerevenue;?>" name="txtRechargesalesrevunue" id="txtRechargesalesrevunue" class="form-control"
										placeholder="recharge sales revenue"
									/>
								</div>
							</div>
							<div class="col-md-8 col-sm8">
								<div class="col-md-3"></div>
								<div class="col-md-2">
								   <?php
									if(getAccessRights('mvbGcAdd'))
									{
								    ?>
									<button onclick="saveChartvalue()" class="btn btn-primary btn-block"><?php getLocalkeyword('Save');?></button>
								  <?php 
									}
								  ?>
								</div>
								<div class="col-md-2">
									<button class="btn btn-default btn-block"><?php getLocalkeyword('Cancel');?></button>
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
</div>
</div>
<script type="text/javascript">
    function saveChartvalue()
    {
        var  txtTotalclients=$("#txtTotalclients").val();
        var  txtTotalrecharges=$("#txtTotalrecharges").val();
        var  txtTotalrevenue=$("#txtTotalrevenue").val();
        var  txtNewsales=$("#txtNewsales").val();
        var  txtRechargesales=$("#txtRechargesales").val();
        var  txtSalesrevenue=$("#txtSalesrevenue").val();
        var  txtRechargesalesrevunue=$("#txtRechargesalesrevunue").val();

     $.post("<?php echo base_url();?>head/setting/saveChartvalue", {
    	 txtTotalclients:txtTotalclients, txtTotalrecharges:txtTotalrecharges, txtTotalrevenue:txtTotalrevenue, txtNewsales:txtNewsales, txtRechargesales:txtRechargesales,
    	 txtSalesrevenue:txtSalesrevenue, txtRechargesalesrevunue:txtRechargesalesrevunue
        },
         function(data) {
            location.reload();
        });

        }
</script>
