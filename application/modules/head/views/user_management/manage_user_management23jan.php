<div class="page-content-wrapper">
	<div class="page-content">
		<div class="row">
			<!--modal-->
			<div id="edit" class="modal fade in" role="dialog">
				<div class="modal-dialog">
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">×</button>
							<h2 class="modal-title text-center">
								<i class="fa fa-user"></i> Edit Usersdss
							</h2>sd
						</div>
						<div class="modal-body">
							<div class="portlet-body form">
								<form class="">
									<div class="form-body">
										<div class="col-md-6">
											<div class="form-group">
												<label class="">User Type</label> <select class="form-control">
													<option>--Select type--</option>
													<option>User1</option>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="">User Name</label> <input type="text" class=" form-control " placeholder="">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="">Mobile No.</label> <input type="text" class="  form-control " placeholder="mobile no">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="">Email Id</label> <input type="text" class="  form-control " placeholder="Email id">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="">Location</label> <select class="form-control">
													<option>--select location--</option>
													<option>Pune</option>
													<option>Mumbai</option>
												</select>
											</div>
										</div>
										<div class="clearfix"></div>
										<div class="modal-footer">
											<button type="button" class="btn btn-primary">Save</button>
											<button type="button" data-dismiss="modal" class="btn btn-danger">Cancel</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--end modal-->
			<div class="col-md-12">
				<div class=" app-ticket-list">
					<div class="page-bar row">
						<div class="col-md-6">
							<h3 class="page-title">User Managmement</h3>
							<ul class="page-breadcrumb ">
								<li><a href="index.html">Home</a> <i class="fa fa-circle"></i></li>
								<li><span>User Management</span></li>
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
														if ($this->session->flashdata('success'))
														{
															?>
                    <div id="prefix_834140561262" class="custom-alerts alert alert-success fade in ">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><?php echo $this->session->flashdata('success');?></div>
                 <?php
														} else if ($this->session->flashdata('error'))
														{
															?>
             
                   <div id="prefix_1445089440962" class="custom-alerts alert alert-danger fade in">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><?php echo $this->session->flashdata('error');?></div>
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
											<div style="float: left; margin-top: 8px; margin-right: 5px;">
												<!--<a href="#" class="margin_rgt hide_element"> <i class="fa fa-eye fa-2x" title="View" style="color:#828282; "></i></a>-->
												<a href="#" onclick="editUser()" class="margin_rgt hide_element"> <i class="fa fa-pencil-square-o fa-2x" title="Edit" style="color: #828282;"></i></a>
											</div>
											<div class="btn-group">
												<a href="<?php echo base_url();?>head/user_management/addUser" class="btn btn-primary">Add new user</a>
											</div>
											<ul class="nav navbar-nav pl0 pull-right" style="margin-left: 5px;">
												<li class="dropdown dropdown-user burger_menu"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"
													style="margin-top: 0px;"><i class="fa fa-bars fa-2x" aria-hidden="true"></i> </a>
													<ul class="dropdown-menu dropdown-menu-default">
														<li class="options" style="border-bottom: 1px solid #e7ecf1;"><a title="Custom Fields" style="padding: 5px; margin-top: 5px;"
															onclick="chechCheckbox(1)">Active</a></li>
														<li class="options"><a href="#" title="Custom Fields" style="padding: 5px; margin-top: 5px;" onclick="chechCheckbox(0)">Deactive</a></li>
														<li class="options"><a href="#" title="Custom Fields" style="padding: 5px; margin-top: 5px;" onclick="resetUserpassword();">Reset Password</a></li>
														<!--<li class="options"> <a href="#" title="Custom Fields" style="padding: 5px; margin-top: 5px; " data-toggle="modal" data-target="#outout_popup">Opt Out</a></li>-->
													</ul></li>
											</ul>
											<!-- out out popup start -->
											<div class="modal fade" id="outout_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
															<h4 class="modal-title" id="myModalLabel">Opt Out</h4>
														</div>
														<div class="modal-body">
															<div class="col-md-12 col-sm-12" style="margin-bottom: 15px">
																<label class="label-control">Comment</label>
																<textarea class="form-control" placeholder="Enter Comment"></textarea>
															</div>
														</div>
														<div class="modal-footer">
															<div class="col-md-12 col-sm-12">
																<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																<button type="button" class="btn btn-primary">Save changes</button>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!-- out out popup End -->
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
													<th style="width: 35px;"><input type="checkbox" id="checkall" data-set="" name="all" /> </label></th>
														<th>User Id</th>
													<th>User Name</th>
													<th>Type</th>
													<th>Email id</th>
													<th>Empid</th>
													<th>Location</th>
												</tr>
											</thead>
											<tbody>


                            <?php
												for($mu=0;$mu < count($result);$mu ++)
												{
													
													$j=$mu+1;
													?>
                                                  <tr class="odd gradeX">
													<td><input name="chk<?php echo $j;?>" class="check_box" type="checkbox" data-ptag="sb1" id="chk<?php echo $j;?>" value="<?php echo $result[$mu]->sysmu_id_pk;?>"></td>
													<td><?php echo $result[$mu]->sysmu_id_pk;?></td>
													<td><a  onclick="getUserprofile('<?php echo $result[$mu]->sysmu_id_pk;?>');" ><?php echo $result[$mu]->sysmu_username;?></a></td>
													<td><?php echo $result[$mu]->mutyp_userType;?></td>
													<td><?php
														
														$userEmail=$this->encryption->decrypt($result [$mu]->sysmu_email);
														
														echo $userEmail;
																													?></td>
													<td><?php echo $result[$mu]->sysmu_empid;?></td>
													<td><?php echo $result[$mu]->cty_name;?></td>
													<td><?php 
                                                                      if($result[$mu]->sysmu_status=="1")
                                                                      {
                                                                     ?>
                                                                     
                                                                    <span class="label label-sm label-success"> Active </span>
                                                                     <?php 
                                                                      }
                                                                      else
                                                                      {    ?>
                                                                     
                                                                     <span class="label label-sm label-danger"> Deactive</span>
                                                                      <?php 
                                                                      }?>
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
<div class="page-content-wrapper1" id="userProfile">
</div>
</div>
</div>
</div>
<script src="http://listjs.com/assets/javascripts/list.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/list.pagination.js/0.1.1/list.pagination.min.js"></script>
	<script>

	function randomString() 
	{
	  var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
	  var string_length = 10;
	  var randomstring = '';
	  for (var i=0; i<string_length; i++) {
	    var rnum = Math.floor(Math.random() * chars.length);
	    randomstring += chars.substring(rnum,rnum+1);
	  }
	  return randomstring;
	}

	
	function generateAutopassword()
	{
		$(".automatic").show();

	    var auto_generate_pass=randomString(); 

	    $("#auto_pass_label").html(auto_generate_pass);

	    $("#txtAutopassword").val(auto_generate_pass);

	   $(".manual").hide();

	   document.getElementById("txtPassword").required = false;

	   document.getElementById("txtConfirmpassword").required = false;
	}


	function generateManualpassword()
	{
		   $(".manual").show();

		    $("#txtAutopassword").val('');

		  $(".automatic").hide();

		  document.getElementById("txtPassword").required = true;

		   document.getElementById("txtConfirmpassword").required = true;

	}
   



	

	function validatePassword(){
		

		 var a=$('form input[type=radio]:checked').val();
        if(a==0||a==1)
        {
               var userpass; 
        	   var password =  $("#txtPassword").val(); 
	   		   var confirm_password =$("#txtConfirmpassword").val();
	   		   var userId =$("#txtUserid").val();

	   		   var txtAutopassword =$("#txtAutopassword").val();
	   			
	     	     if(password != confirm_password) {
	   	            alert("Password Not Matched")
                          }  

	     	     else
	     	     {
	     	    	if(a==1)
		     	    	{
                               userpass=txtAutopassword;
		     	    	}
	     	    	else if(a==0)
	     	    	{
	     	    		 userpass=password;
		     	    	}	


	     	    	$.post("<?php echo base_url();?>head/user_management/resetUserspecificpassword",{userId:userId,password:userpass},function(data){

	     	    		
	     	    		$("#reset_pwd").modal("hide")
                        alert("User Password has been Reset Successfully");
                             
		                 		               });

		       }
	     	     
	             
  	   }
        else
	     {

	    	 alert("Please Select any 1 option");
            
    	     } 
        
	}


	
	function resetUserpassword()
	{
		 var count=<?php echo count($result)?>;
	     var userId=[];
	     
	     for (var i=1;i<=count;i++)
	     {
	   	  if($('#chk'+i).is(':checked'))
	   	  {
	   		userId.push($("#chk"+i).val()); 
	   	  }
	      } 
	
	     
	     if (userId.length === 0) {
	   	   alert ("Please Select The User ");
	   	      
	   	}
	     else
	     {
	         
	          $.post("<?php echo base_url();?>head/user_management/resetUserpassword",{userId:userId},function(data){
	
	                 location.reload(true);
	               });
	           
	      }  
	 
	}
	
	
	function chechCheckbox(id)
	{
	     var count=<?php echo count($result)?>;
	     var userId=[];
	     
	     for (var i=1;i<=count;i++)
	     {
	   	  if($('#chk'+i).is(':checked'))
	   	  {
	   		userId.push($("#chk"+i).val()); 
	   	  }
	      } 
	
	     
	     if (userId.length === 0) {
	   	   alert ("Please Select The User Name");
	   	      
	   	}
	     else
	     {
	         
	          $.post("<?php echo base_url();?>head/user_management/changeuserStatus",{id:id,userId:userId},function(data){
	
	                 location.reload(true);
	               });
	           
	      }  
	    
	
	}





	function resetUserListingpassword()
	{
		 var count=<?php echo count($result)?>;
	     var userId=[];
	     
	     for (var i=1;i<=count;i++)
	     {
	   	  if($('#profilechk'+i).is(':checked'))
	   	  {
	   		userId.push($("#profilechk"+i).val()); 
	   	  }
	      } 
	
	     
	     if (userId.length === 0) {
	   	   alert ("Please Select The User ");
	   	      
	   	}
	     else
	     {
	         
	          $.post("<?php echo base_url();?>head/user_management/resetUserpassword",{userId:userId},function(data){
	
	                alert("Password Has Been Reset");
	               });
	           
	      }  
	 
	}
	
	
	function chechProfileCheckbox(id)
	{
	     var count=<?php echo count($result)?>;
	     var userId=[];
	     
	     for (var i=1;i<=count;i++)
	     {
	   	  if($('#profilechk'+i).is(':checked'))
	   	  {
	   		userId.push($("#profilechk"+i).val()); 
	   	  }
	      } 
	
	     
	     if (userId.length === 0) {
	   	   alert ("Please Select The User ");
	   	      
	   	}
	     else
	     {
	         
	          $.post("<?php echo base_url();?>head/user_management/changeuserStatus",{id:id,userId:userId},function(data){
	                if(id==1)
	                {
	                	alert("User Activated");  }
	                else if(id==0)
	                {
	                	alert("User Deactivated");}
	                else
	                {
	                	alert("Something went Wrong"); } 
	        	    
	               });
	           
	      }  
	    
	
	}
	



	function chechSpecificCheckbox(id,val)
	{
	    
	     var userId=[];
	    	userId.push(val); 

	         
	          $.post("<?php echo base_url();?>head/user_management/changeuserStatus",{id:id,userId:userId},function(data){
	
	        	  if(id==1)
	                {
	                	alert("User Activated");  }
	                else if(id==0)
	                {
	                	alert("User Deactivated");}
	                else
	                {
	                	alert("Something went Wrong"); } 
	               });
	           
	    
	
	}
	
	
	
	function editUser()
	{
	     var count=<?php echo count($result)?>;
	     var user_id="";
	     
	     for (var i=1;i<=count;i++)
	     {
	   	  if($('#chk'+i).is(':checked'))
	   	  {
	   		user_id=$("#chk"+i).val(); 
	   	  }
	      } 
	
	     
	     if (user_id == "") {
	   	   alert ("Please Select The User Name");
	   	      
	   	}
	     else
	     {
	      
	    	 window.location.replace("<?php echo base_url()."head/user_management/editUser/"?>"+user_id);
	           
	      }  
	    
	
	}


	  function getUserprofile(userId)
	  {
		  $(".page-content-wrapper").hide();
			
		  $(".page-content-wrapper1").show();

		  $.post("<?php echo base_url();?>head/user_management/getUserprofile",{userId:userId},function(data){
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


	
	   $(document).ready(function()
		{
			
	
			$(".page-content-wrapper1").hide();
			
			$("#user_detail,#user_detail1,#user_detail2").click(function()
			{
				
				$(".page-content-wrapper").hide();
				
				$(".page-content-wrapper1").show();
				
			});
			
			$("#close").click(function()
			{
				
				$(" .page-content-wrapper").show();
				
				$(".page-content-wrapper1").hide();
				
			});
			
			$(document).ready(function()
			{
				
				$('.hide_element').css('visibility', 'hidden');
				
				$('.selected_rows').hide();
				
			});
			
		});

</script>