<div class="page-content-wrapper">
	<div class="page-content">
		<div class="row">
			<div class="col-md-12">
				<div class=" app-ticket-list">
					<div class="page-bar row">
						<div class="col-md-6">
							<h3 class="page-title"><?php getLocalkeyword('User Festival Management');?></h3>
							<ul class="page-breadcrumb ">
								<li><a href="<?php echo base_url()?>/dashboard"><?php getLocalkeyword('Home');?></a> <i class="fa fa-circle"></i></li>
								<li><a href="<?php echo base_url()?>/festival"><?php getLocalkeyword('Festival Management');?></a> <i class="fa fa-circle"></i></li>
								<li><span><?php getLocalkeyword('User Festival Management');?></span></li>
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
								</div>
								<div class="selected_rows">
									<font id="show_checkbox_selected"></font>
									 <a id="selectall"><?php getLocalkeyword('select all');?></a>
								</div>
								<div class="portlet light">
									<div class="portlet-body">
										<!--<table class="table table-hover table-checkable order-column" id="sample_1" style="width: 100% !important;">-->
                                                                                    <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable allchekbox" id="sample_1_2" role="grid" aria-describedby="sample_1_2_info">
											<thead>
												<tr>
													<th style="width: 35px;"><input type="checkbox" id="checkall" data-set="" name="all" /> </label></th>
													<th><?php getLocalkeyword('Sr.No');?></th>
													<th><?php getLocalkeyword('Client Name');?></th>
													<th><?php getLocalkeyword('Mobile No.');?></th>
													<th><?php getLocalkeyword('Email Id');?></th>
													<th><?php getLocalkeyword('Location');?></th>
												</tr>
											</thead>
											<tbody>
												<?php 
												for($i=0;$i<count($result);$i++)
												{	
												  $j=$i+1;	
												?>
												<tr class="odd gradeX">
													<td><input name="chk1" class="check_box" type="checkbox" data-ptag="sb1" id="chk1" value=""></td>
													<td><?php echo $j?></td>
													<td><a id="user_detail" onclick="getFestivals('<?php echo $result[$i]->sysu_id_pk?>');"><?php echo $result[$i]->sysu_name?></a></td>
													<td><?php echo $this->encryption->decrypt($result[$i]->sysu_mobile);?></td>
													<td><?php echo $this->encryption->decrypt($result[$i]->sysu_email);?></td>
													<td><?php echo $result[$i]->cty_name?></td>
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
<div class="page-content-wrapper1" id="demo">
	
</div>
</div>
</div>
<script>
$( document ).ready(function() {

	

	  $(".page-content-wrapper1").hide();

  $("#user_detail,#user_detail1,#user_detail2").click(function(){



      $(".page-content-wrapper").hide();

$(".page-content-wrapper1").show();

	});

	

	$("#close").click(function(){

    $(" .page-content-wrapper").show();



   $(".page-content-wrapper1").hide();



 });
});

function getFestivals(id)
{

	 $.post("<?php echo base_url();?>head/festival/getuserFestivals",{id:id},function(data){


        

		
		  $(".page-content-wrapper1").html(data);

              $('.make-switch').bootstrapSwitch('state', true);
	          $('.make-switch').on('switchChange.bootstrapSwitch', function (event, state) 
                  {
		         var switchState= state;
		         var switchName=this.name;   
		         var switchValue=this.value;
		         if(switchState==true)    
		         {
		         	  $.post("<?php echo base_url();?>head/festival/checkFestivalsTemplate",{festival_id:switchValue},function(data){
   									
   									if(data=="true")
									{
											$("#"+switchName).prop("checked", true);
						         			//getConfirmfestival();
									}
									else
									{
											alert('Template of these festival is not exists');

											window.location="<?php echo base_url();?>head/emailtemplate";
									}
		         	  	  });
		         }
		         else
		         {
						if ($("#"+switchName).is(':checked'))
						{
						   $("#"+switchName).prop("checked", false);
						   //getConfirmfestival();
						}
		         }
	          });
                     


		  $("#selectall1").click(function(){
			   
			    $('.hide_element').css('visibility','hidden');

			       if ($("input[type='checkbox']").prop("checked"))

			       {

			           $(':checkbox').prop('checked', false);
			           if($(".check_box").is(':disabled') )
						{
							
							$(".chkdisable").prop("checked", true);
						}

			           $(this).text('Select all');

			           $('.selected_rows').hide();

			           $('.hide_element').css('visibility','hidden');

			        }

			     else{

			         $(':checkbox').prop('checked', true);

			           $('.selected_rows').show();

			          $(this).text('Clear all');

			     }    

			 });

		  $("#checkall1").click(function () {

		        if ($("#checkall1").is(':checked')) {

		            $(".check_box").prop("checked", true);

		            $('.hide_element').css('visibility','hidden');

		             $('.selected_rows').show();
		             $('#selectall1').text('Clear all');



		        } else {

		            $(".check_box").prop("checked", false);

		            if($(".check_box").is(':disabled') )
					{
						
						$(".chkdisable").prop("checked", true);
					}
		             $('.selected_rows').hide();

		            $('.hide_element').css('visibility','hidden');

		        }

		    });
		  //$(".make-switch").bootstrapSwitch();
                  
                    
		  $("#sample_2").DataTable();


	
		  
		 });
           

	}
</script>