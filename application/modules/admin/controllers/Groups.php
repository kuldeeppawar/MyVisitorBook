<?php
if (! defined('BASEPATH'))
	exit('No direct script access allowed');

class Groups extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->model('groups_model');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('encryption');
		$this->form_validation->set_error_delimiters('<div class="error">','</div>');
	
	}
	
	// ==================== all page session check =====================
	public function Checklogin()
	{
		if ($this->session->userdata('admin_admin_email') == '')
		{
			redirect('admin');
		}
	
	}

	public function index()
	{
	
		$this->Checklogin();
		setAActivityLogs('Transaction_activity','AAGroup_view');
		$data ['resultGroup']=$this->groups_model->getAllGroups();
		$data ['include']='admin/groups/groups';
		$data ['admin_section']='manage_groups';
		$this->load->view('backend/container',$data);
	
	}

    public function recentlyUpdated()
    {

        $this->Checklogin();
        setAActivityLogs('Transaction_activity','AAGroup_view');
        $data1 = 'getRecentViewGroup';
        $data ['resultGroup']=$this->groups_model->getAllGroups($data1);
        $data ['include']='admin/groups/groups';
        $data ['admin_section']='manage_groups';
        $this->load->view('backend/container',$data);

    }

    public function mostViewed()
    {

        $this->Checklogin();
        setAActivityLogs('Transaction_activity','AAGroup_view');
        $data1 = 'getMostViewGroup';
        $data ['resultGroup']=$this->groups_model->getAllGroups($data1);
        $data ['include']='admin/groups/groups';
        $data ['admin_section']='manage_groups';
        $this->load->view('backend/container',$data);

    }

    public function getNotUpdatedRecently()
    {

        $this->Checklogin();
        setAActivityLogs('Transaction_activity','AAGroup_view');
        $data1 = 'getNotUpdatedRecently';
        $data ['resultGroup']=$this->groups_model->getAllGroups($data1);
        $data ['include']='admin/groups/groups';
        $data ['admin_section']='manage_groups';
        $this->load->view('backend/container',$data);

    }
	
	// ---Function used to add new Groups-//
	public function addGroups()
	{
	
		$this->Checklogin();
		if (isset($_POST ['btnSubmit']))
		{
				
			$data ['admin_section']='Groups';
			$id=$this->groups_model->addGroups();
			if ($id)
			{
				$this->session->set_flashdata('success','Group has been added successfully.');
				redirect('admin/groups');
			} else
			{
				$this->session->set_flashdata('error','Unable to save Group.');
				redirect('admin/groups');
			}
		} else
		{
			redirect('admin/groups');
		}
	
	} 

	//--function to Edit Groups--//

	public function editGroup($id='')
	{
		$this->Checklogin();
		if (isset($_POST ['btnSubmit']))
		{
			$data ['admin_section']='groups';
			$id=$this->groups_model->editGroup();
			if ($id)
			{
				$this->session->set_flashdata('success','Group has been updated successfully.');
				redirect('admin/groups');
			} else
			{
				$this->session->set_flashdata('error','Unable to edit Group details.');
				redirect('admin/groups');
			}
		} 
	
	    else 
	    {
	    	redirect('admin/groups');
	    }	
	}
	
	
	
  //---function used to get state list----//	
	public function getState()
	{
	
		$this->Checklogin();
		$id=$this->input->post('val');
	
		if ($id > 0)
		{
			
			$resultState=$this->groups_model->getStatelist($id);
			$msg="<option value=''>Select State</option>";
				
			for($i=0;$i<count($resultState);$i++)
			{
				$disable="";
				if($resultState[$i]->stat_status==0)
				{
					$disable="disabled";
				}
					
				$msg=$msg.'<option  value="'.$resultState[$i]->stat_id_pk.'"'  . $disable.'  >'.$resultState[$i]->stat_name.'</option>';
				
				
			}
			
			echo $msg;
		} else
		{
				
			echo false;
		}
	
	}
	
	
	//---function used to get City list----//
	public function getCity()
	{
	
		$this->Checklogin();
		$id=$this->input->post('val');
	
		if ($id > 0)
		{
				
			$resultCity=$this->groups_model->getCitylist($id);
			$msg="<option value=''>Select City</option>";
	
			for($i=0;$i<count($resultCity);$i++)
			{
				$disable="";
				if($resultCity[$i]->cty_status==0)
				{
					$disable="disabled";
				}
					
				$msg=$msg.'<option  value="'.$resultCity[$i]->cty_id_pk.'"'  . $disable.'  >'.$resultCity[$i]->cty_name.'</option>';
	
				
			}
				
			echo $msg;
		} else
		{
	
			echo false;
		}
	
	}
	
	
	
	//----Function to get Group details---//
  Public function  getSpecificgroup()
  {
  	
  	$insertid=$this->input->post('id');
    $resultGroup=$this->groups_model->getSpecificgroup($insertid);
    $resultGroupvisitor=$this->groups_model->getGroupvisitor($insertid);
  	if(count($resultGroup)>0)
  	{	
  	
  	?> 
	  		<div id="edit" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="col-md-10 modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h2 class="modal-title text-left">
							<?php getLocalkeyword('Edit');?>
							<h3></h3>
						</h2>
					</div>
					<div class="modal-body">
						<div class="portlet-body form">
							<form role="form" method="post" name="frmEdit" action="<?php echo base_url()?>admin/groups/editGroup">
								<div class="form-body">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label><?php getLocalkeyword('Group Name');?> <small>(char limit-20)</small></label> 
												 <input type="text" name="txteditGroup" class="form-control input-sm" placeholder="Group Name" maxlength="20" value="<?php echo $resultGroup[0]->grp_name; ?>">
												 <input type="hidden" name="txtGroupid" value="<?php echo $resultGroup[0]->grp_id_pk; ?>"> 
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<label><?php getLocalkeyword('Description');?></label>
												<textarea name="txteditDescription" placeholder="Description" class="form-control" cols="" rows=""><?php echo $resultGroup[0]->grp_description; ?></textarea>
											</div>
										</div>
										<div class="col-md-12">
											<button type="submit" name="btnSubmit" class="btn btn-primary"><?php getLocalkeyword('Save');?></button>
										</div>
									</div>
								</div>
							</form>
							<div class="row"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
  	
  	<div class="user_list_box">
  	   <div class="row">
			<div class="col-md-4">
				<div class="portlet light bordered">
					<div class="portlet-title">
						<div class="row">
							<div class="col-md-6">
								<ul class="nav navbar-nav pl0">
									<li class="dropdown dropdown-user"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" style="font-size: 14px; padding: 18px 5px;">Recently updated <i class="fa fa-angle-down"></i>
											<span></span></a>
										<ul class="dropdown-menu dropdown-menu-default">
											<li><a href="#">All Contacts</a></li>
											<li><a href="#">My Contacts </a></li>
											<li><a href="#">Recently viewed</a></li>
											<li><a href="#">Not updated in 30 Days</a></li>
										</ul></li>
								</ul>
							</div>
							<div id="send_sms11" class="modal fade" role="dialog">
								<div class="modal-dialog">
									<div class="col-md-10">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h2 class="modal-title text-center">
													<i class="fa fa-envelope"></i> Send SMS
												</h2>
											</div>
											<div class="modal-body">
												<div class="portlet-body form">
													<form role="form" action="">
														<div class="form-body">
															<div class="row">
																<div class="col-md-12">
																	<div class="form-group">
																		<label>Mobile no. <span class="mandatory"></span></label> <input type="text" class="form-control" value="9876548965" readonly>
																	</div>
																	<div class="form-group">
																		<label>Message <span class="mandatory"></span></label>
																		<textarea class="form-control" rows="4" cols=""></textarea>
																	</div>
																	<div class="modal-footer">
																		<button type="button" class="btn btn-primary">Send SMS</button>
																	</div>
																</div>
															</div>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div id="send_email2" class="modal fade" role="dialog">
								<div class="modal-dialog">
									<!-- Modal content-->
									<div class="col-md-10">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h2 class="modal-title text-center">
													<i class="fa fa-envelope-o"></i> Send Email
												</h2>
											</div>
											<div class="modal-body">
												<div class="portlet-body form">
													<form role="form" action="">
														<div class="form-body">
															<div class="row">
																<div class="col-md-12">
																	<div class="form-group">
																		<label>Email-id <span class="mandatory"></span></label> <input type="text" class="form-control" value="abc@gmail.com" readonly>
																	</div>
																	<div class="form-group">
																		<label>Subject <span class="mandatory"></span></label> <input type="text" class="form-control">
																	</div>
																	<div class="form-group">
																		<label>Message <span class="mandatory"></span></label>
																		<textarea class="form-control" rows="4" cols=""></textarea>
																	</div>
																	<div class="modal-footer">
																		<button type="button" class="btn btn-primary">Send Email</button>
																	</div>
																</div>
															</div>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div id="myModal_m12" class="modal fade" role="dialog">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal"></button>
											<h2 class="modal-title text-center" style="font-size: 18px !important;">
												<i class="fa fa-trash"></i> <?php getLocalkeyword('Are you sure to Delete');?>?
											</h2>
										</div>
										<div class="modal-body">
											<div class="portlet-body form">
												<form role="form" action="">
													<div class="form-body">
														<div class="row">
															<div class="col-md-12">
																<div class="modal-footer">
																	<a href="#" class="btn btn-primary" onclick="deletelistVisitor()"><?php getLocalkeyword('Yes');?></a>
																	<button type="button" class="btn btn-danger" data-dismiss="modal"><?php getLocalkeyword('No');?></button>
																</div>
															</div>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6 pull-right">
								<div class="" style="margin-top: 17px; float: right; margin-left: 2px;">
									<?php
									if(getAdminAccessRights('mvbSetgsms'))
									{
									?>
										<a href="#" onclick="send_smsuser()" class="margin_rgt p_element1"><img src="<?php echo base_url()?>themes/assets/sms.png" height="22" title="Send SMS" alt="">
										</a>
									<?php 
									}
									if(getAdminAccessRights('mvbSetgemail'))
									{
									?>	 
									<a href="#" onclick="send_emailuser()" class="margin_rgt p_element1"> <i class="fa fa-envelope-o fa-2x" title="Send Email"
										style="color: #828282;"></i>
									</a> 
									<?php 
									}
									if(getAdminAccessRights('mvbSetgdelete'))
									{
									?>
									<a href="#" data-toggle="modal" data-target="#myModal_m12" class="margin_rgt" id="sb3"> 
									 <i class="fa fa-trash fa-2x" title="Delete" style="color: #828282;"></i>
									 </a> 
									 <?php 
									}
									 ?>
									 <a href="<?php echo base_url(); ?>admin/visitor"
										id="sample_editable_1_new hvr-float-shadow" class="btn btn-primary" data-title="Add Contact"> <!-- <i class="fa fa-user-plus" title="Add Visitor"></i>  -->+
									</a>
									<ul class="nav navbar-nav pl0 pull-right" style="margin-left: 7px;">
										<li class="dropdown dropdown-user burger_menu">
										  <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" style="margin-top: 0px;" aria-expanded="false"><i class="fa fa-bars fa-2x"
												aria-hidden="true"></i> </a>
											<ul class="dropdown-menu dropdown-menu-default">
												<li class="options" style="border-bottom: 1px solid #e7ecf1;"><a href="#" title="Add Comment" style="padding-top: 0px; margin-top: 5px; padding-left: 0px;"><?php getLocalkeyword('Add Comment');?></a></li>
											</ul></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="portlet-body" style="height: 470px; overflow: auto;" id="test-list">
						<ul class="list list-group All_list ">
						<?php 
						
						for($i=0;$i<count($resultGroupvisitor);$i++)
						{
							
							
						   $j=$i+1;
						  ?>
							<li class="list-group-item ">
							 <input type="checkbox" height="20" width="20" class="check_box1" id="chklist<?php echo $j;?>"  value="<?php echo  $resultGroupvisitor[$i]->vis_id_pk; ?>"/>
							  <?php echo  $resultGroupvisitor[$i]->vis_firstName." ".$resultGroupvisitor[$i]->vis_lastName?>
							 
							 </li>
							<?php 
						}
						?>
						</ul>
						<ul class="pagination pull-right"></ul>
					</div>
				</div>
                   <script type="text/javascript">

							function deletelistVisitor()
							{
								 var count=<?php echo count($resultGroupvisitor)?>;
							     var visitorId;
							 
							    for (var i=1;i<=count;i++)
							    {
							  	  if($('#chklist'+i).is(':checked'))
							  	  {
								  	  
							  		visitorId=$("#chklist"+i).val(); 
							  	 
							  		  $.post("<?php echo base_url();?>admin/groups/deleteVisitor",{visitorId:visitorId,groupId:<?php echo $insertid ?>},function(data){

							  	        location.reload();
											  	     
							  	        });
							  	
							      }

							    }	

							}


							function deleteGroup(id)
							{
								
							  	 
							  		  $.post("<?php echo base_url();?>admin/groups/deleteGroup",{groupId:<?php echo $insertid ?>},function(data){

							  	        location.reload();
											  	     
							  	        });
							  	
							   

							   

							}

                            function createGroup(id)
                            {


                                $.post("<?php echo base_url();?>admin/groups/createGroup",{groupId:<?php echo $insertid ?>},function(data){

                                    location.reload();

                                });





                            }
							</script>
			</div>
			<div class="col-md-8">
				<div class="row">
					<div class="" style="background: #fcfcfc; margin-bottom: 10px; padding: 10px 0px; width: 96%; float: left; margin-left: 12px; margin-right: 12px; border-bottom: 1px solid #e4e4e4;">
						<div class="col-md-2">
							<div class="profile-userpic">
								<img src="<?php echo base_url()?>themes/assets/profile_user.jpg" alt="" style="border-radius: 50% !important; width: 100%;">
							</div>
						</div>
						<div class="col-md-6">
							<h3 style="margin-top: 3px; margin-bottom: 0px;"><?php echo $resultGroup[0]->grp_name;?></h3>
							<p style="color: #ababab;"><?php echo $resultGroup[0]->grp_description; ?></p>
							<p><?php getLocalkeyword('Total Contact');?> : <?php echo count($resultGroupvisitor);?></p>
<!--							<div class="row pro_info" style="display: none;">-->
<!--								<ul class="list-inline">-->
<!--									<li><i class="fa fa-envelope" aria-hidden="true"></i> abc@gmail.com</li>-->
<!--									<li><i class="fa fa-phone" aria-hidden="true"></i> (020 22484856)</li>-->
<!--									<li><i class="fa fa-map" aria-hidden="true"></i> Kothrud, Pune</li>-->
<!--								</ul>-->
<!--							</div>-->
							<div id="myModal_mm1" class="modal fade" role="dialog">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" onclick="closeProfileDiv()" data-dismiss="modal"></button>
											<h2 class="modal-title text-center" style="font-size: 18px !important;">
												<i class="fa fa-trash"></i><?php getLocalkeyword('Are you sure to Delete');?> ?
											</h2>
										</div>
										<div class="modal-body">
											<div class="portlet-body form">
												<form role="form" action="">
													<div class="form-body">
														<div class="row">
															<div class="modal-footer">
																<a href class="btn btn-primary"><?php getLocalkeyword('Yes');?></a>
																<button type="button" class="btn btn-danger" data-dismiss="modal"><?php getLocalkeyword('No');?></button>
															</div>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="btn-group pull-right">
								<?php if(getAdminAccessRights('mvbSetgedit'))
								{ ?>
								<a data-toggle="modal" data-target="#edit" id="sample_editable_1_new hvr-float-shadow" class="btn btn-primary"><?php getLocalkeyword('Edit');?></a>
								<?php 
								}?>
								 <a class="btn blue btn-primary btn-circle" style="margin-left: 5px;" href="javascript:;" data-toggle="dropdown"
									data-hover="dropdown" data-close-others="true" aria-expanded="false"><?php getLocalkeyword('More');?>  <i class="fa fa-angle-down"></i>
								</a>
								<div class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
									<?php
									if(getAdminAccessRights('mvbSetgsms'))
									{
									?>
									<li class="options" style="border-bottom: 1px solid #e7ecf1;">
									 <a href="#" onclick="send_smsgroup()" title="Custom Fields" style="padding-top: 0px; margin-top: 5px; padding-left: 0px;"><?php getLocalkeyword('Send SMS');?></a>
									</li>
									<?php 
									}
									if(getAdminAccessRights('mvbSetgemail'))
									{
									?>
									<li class="options" style="border-bottom: 1px solid #e7ecf1;">
									  <a href="#" onclick="send_emailgroup()" title="Custom Fields" style="padding-top: 0px; margin-top: 5px; padding-left: 0px;"><?php getLocalkeyword('Send Email');?></a>
									</li>
									<?php 
									}
									if(getAdminAccessRights('mvbSetgdelete'))
										{
												?>
									<li class="options">
									 
									 <a href="#" onclick="deleteGroup(<?php echo $insertid;?>)" title="Custom Fields" data-toggle="modal" data-target="#myModal_mm1" style="padding-top: 0px; margin-top: 5px; padding-left: 0px;"><?php getLocalkeyword('Delete');?> </a>
									</li>
									<?php 
										} ?>
								</div>
								<a onclick="closeProfileDiv();" class="close_section pull-right" title="Close" id="close"><i style="color: #616161; padding-top: 10px; margin-left: 7px; font-size: 35px;" class="fa fa-times fa-3x"></i></a>
							</div>
						</div>
					</div>

					
					<div id="myModal_mm1" class="modal fade" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">�</button>
									<h2 class="modal-title text-center" style="font-size: 18px !important;">
										<i class="fa fa-trash"></i> <?php getLocalkeyword('Are you sure to Delete');?>?
									</h2>
								</div>
								<div class="modal-body">
									<div class="portlet-body form">
										<form role="form" action="">
											<div class="form-body">
												<div class="row">
													<div class="col-md-12">
														<div class="modal-footer">
															<a href class="btn btn-primary"><?php getLocalkeyword('Yes');?></a>
															<button type="button" class="btn btn-danger" data-dismiss="modal"><?php getLocalkeyword('No');?></button>
														</div>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="profile-content">
						<div class="">
							<div class="col-md-12">
								<div class="tab-content">
									<div id="my_profile" class="tab-pane fade in active">
										<div class="row">
											<div  id="test-list2" >
											<ul class="list list-group All_list ">
						                       <?php 
						                       
						                       for($i=0;$i<count($resultGroupvisitor);$i++)
						                       {
						                      
						                       	?> 
						                        
												<div class="col-md-4">
													<div class="media" style="height: 90px;">
														<a class="media-left" href="#"> 
														<?php if($resultGroupvisitor[$i]->vis_profile=="")
														{	?>
														<img class="media-object" src="<?php echo base_url()?>themes/assets/pages/media/users/avatar3.jpg" style="border-radius: 50% !important;" alt="">
														<?php 
														}
														else 
														{	
														?>
															<img class="media-object" src="<?php echo base_url()?>uploads/visitor_image/<?php echo $resultGroupvisitor[$i]->vis_profile; ?>" style="border-radius: 50% !important;" alt="">
														<?php 
														}?>
														</a>
<!--                                                        --><?php //print_r($resultGroupvisitor); ?>
														<div class="media-body">
															<a onclick="getProfiledetails('<?php echo $resultGroupvisitor[$i]->vis_id_pk; ?>')" class="item-name primary-link"><?php echo $resultGroupvisitor[$i]->vis_firstName." ". $resultGroupvisitor[$i]->vis_lastName;?></a>
															<?php
                                                            if (!empty( $resultGroupvisitor[$i]->vis_email))
                                                            {
                                                               ?> <p>
                                                                <i class="fa fa-envelope item-label" aria-hidden="true"></i> <?php echo $resultGroupvisitor[$i]->vis_email; ?>
                                                                </p><?php
                                                            }

                                                                ?>


															<p>
																<i class="fa fa-mobile mob" aria-hidden="true"></i> <?php echo $resultGroupvisitor[$i]->vis_mobile; ?>
															</p>
														</div>
													</div>
												</div>
												<?php }?>
											
												</ul>
<!--						                       <ul class="pagination pull-right"></ul>-->
											</div>
											
											<div>
												
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
		<script type="text/javascript">

		function send_smsuser()
		{
		     var count=<?php echo count($resultGroupvisitor) ?>;
		     var senderId=[];
		    
		     for (var i=1;i<=count;i++)
		     {
		   	  if($('#chklist'+i).is(':checked'))
		   	  {
		   		senderId.push($("#chklist"+i).val()); 
		   	  }
		      } 

		     
		     if (senderId.length === 0) {
		   	   alert ("Please Select The User");
		   	      
		   	}
		     else
		     {

		    	 var form = $('<form></form>');
		         var path="<?php echo base_url() ?>admin/sms_management/bulk_sms";
		         form.attr("method", "post");
		         form.attr("action", path);
		         var field = $('<input></input>');
		         field.attr("type", "hidden");
		         field.attr("name", "user");
		         field.attr("value", senderId);
		         form.append(field);
		         var field = $('<input></input>');
		         field.attr("type", "hidden");
		         field.attr("name", "way");
		         field.attr("value", "user");
		         form.append(field);
		         // The form needs to be a part of the document in
		         // order for us to be able to submit it.
		         $(document.body).append(form);
		         form.submit();
		  
		         
		        
		           
		      }  
		}


		function send_emailuser()
		{
		     var count=<?php echo count($resultGroupvisitor) ?>;
		     var senderId=[];
		   
		     for (var i=1;i<=count;i++)
		     {
		   	  if($('#chklist'+i).is(':checked'))
		   	  {
		   		senderId.push($("#chklist"+i).val()); 
		   	  }
		      } 

		     
		     if (senderId.length === 0) {
		   	   alert ("Please Select The User");
		   	      
		   	}
		     else
		     {

		    	 var form = $('<form></form>');
		         var path="<?php echo base_url() ?>admin/email_management/bulk_email";
		         form.attr("method", "post");
		         form.attr("action", path);
		         var field = $('<input></input>');
		         field.attr("type", "hidden");
		         field.attr("name", "user");
		         field.attr("value", senderId);
		         form.append(field);
		         var field = $('<input></input>');
		         field.attr("type", "hidden");
		         field.attr("name", "way");
		         field.attr("value", "user");
		         form.append(field);
		         // The form needs to be a part of the document in
		         // order for us to be able to submit it.
		         $(document.body).append(form);
		         form.submit();
		      }  
		}


		function send_smsgroup()
		{
		    
		     var senderId=[];
		    
		    
		   		senderId.push(<?php echo $insertid;?>); 

		   		var form = $('<form></form>');
		        var path="<?php echo base_url() ?>admin/sms_management/bulk_sms";
		        form.attr("method", "post");
		        form.attr("action", path);
		        var field = $('<input></input>');
		        field.attr("type", "hidden");
		        field.attr("name", "user");
		        field.attr("value", senderId);
		        form.append(field);
		        var field = $('<input></input>');
		        field.attr("type", "hidden");
		        field.attr("name", "way");
		        field.attr("value", "group");
		        form.append(field);
		        // The form needs to be a part of the document in
		        // order for us to be able to submit it.
		        $(document.body).append(form);
		        form.submit(); 		    
		         		      
		}


		function send_emailgroup()
		{
		   
			var senderId=[];
		    
		    
	   		senderId.push(<?php echo $insertid;?>); 

	   	    var form = $('<form></form>');
	        var path="<?php echo base_url() ?>admin/email_management/bulk_email";
	        form.attr("method", "post");
	        form.attr("action", path);
	        var field = $('<input></input>');
	        field.attr("type", "hidden");
	        field.attr("name", "user");
	        field.attr("value", senderId);
	        form.append(field);
	        var field = $('<input></input>');
	        field.attr("type", "hidden");
	        field.attr("name", "way");
	        field.attr("value", "group");
	        form.append(field);
	        // The form needs to be a part of the document in
	        // order for us to be able to submit it.
	        $(document.body).append(form);
	        form.submit();

	     
		}
       </script>
	
  	<?php 
  	}
  	else 
  	{
  		?>
  		    <div class="row"><h4>Something Went Wrong</h4></div>
  		<?php 
  	}	
  }
	
	
  //--function used to validate otp--//
  public function validateOtp()
  {
  
  	$this->Checklogin();
  	$pass=$this->input->post('Password');
  	$admin_id=$this->session->userdata('admin_admin_id');
  	$result=$this->groups_model->getSpecificuser($admin_id);
  
  	if(count($result)>0)
  	{
  		$storedPassword=$this->encryption->decrypt($result[0]->sysu_password);
  		 
  		if($storedPassword==$pass)
  		{
  			echo 1;
  		}
  		else
  		{
  			echo 0;
  		}
  			
  	}
  	else
  	{
  		echo 0;
  	}
  
  
  }
  
  
  
  // ----Function Used To download Group csv----//
  public function getGroupcsv()
  {
  	$this->Checklogin();
  	$id=$this->session->userdata('admin_admin_id');
  	setAActivityLogs('Transaction_activity','AAGroup_csvdownload','csv download by'.$id);
  	$resultGroup=$this->groups_model->getAllGroups();
  
  	$contents='"Id","Group Name","No. Contact","Created On"';
  
  	$contents.="\n";
  	for($i=0;$i < count($resultGroup);$i ++)
  	{
  		$j=$i+1;
  		$contents.='"' . $j . '","' .  $resultGroup[$i]->grp_name.'", '.$resultGroup[$i]->group_count . ',"' . $resultGroup[$i]->grp_createdDate . '"';
  		$contents.="\n";
  	}
  
  	$contents=strip_tags($contents);
  
  	// header to make force download the file
  	Header("Content-Disposition: attachment; filename=group.csv");
  	print $contents;
  	exit();
  
 
  	
  }
  
  
  
  // ---Function used to upload Csv--//
  public function uploadCsv()
  {
  
  	$this->Checklogin();
  	if (isset($_POST ['btnSubmit']))
  	{
  			
  
  		$data ['admin_section']='Festival';
  		$id=$this->groups_model->uploadCsv();
  		if ($id)
  		{
  			$this->session->set_flashdata('success',' CSV uploaded successfully.');
  			redirect('admin/groups');
  		} else
  		{
  			$this->session->set_flashdata('success',' Something Went Wrong.');
  			redirect('admin/groups');
  		}
  	} else
  	{
  		redirect('admin/visitor');
  	}
  
  }
  
  // ---Function used to delete visitor--//
  public function deleteVisitor()
  {
  
     	$this->Checklogin();
  			
     	$visitorId=$this->input->post('visitorId');
     	$groupId=$this->input->post('groupId');
  		$id=$this->groups_model->deleteVisitor($visitorId,$groupId);

  		if ($id)
  		{
  			setAActivityLogs('Transaction_activity','AAGroup_deletevisitor','visitor id'.$visitorId.'Group Id:-'.$groupId);
  			$this->session->set_flashdata('success',' User Deleted.');
  			redirect('admin/groups');
  		} else
  		{
  			$this->session->set_flashdata('success',' Something Went Wrong.');
  			redirect('admin/groups');
  		}
  	
  
  }
  
  // ---Function used to delete Group--//
  public function deleteGroup()
  {
  
  	$this->Checklogin();

  	$groupId=$this->input->post('groupId');
  	$id=$this->groups_model->deleteGroup($groupId);
  
  	 
  	if ($id)
  	{
  		setAActivityLogs('Transaction_activity','AAGroup_deletevisitor','Group Id:-'.$groupId);
  			
  		$this->session->set_flashdata('success',' Group Deleted.');
  		redirect('admin/groups');
  	} else
  	{
  		$this->session->set_flashdata('success',' Something Went Wrong.');
  		redirect('admin/groups');
  	}
  	 
  
  }

    // ---Function used to delete Group--//
    public function createGroup()
    {

        $this->Checklogin();

        $groupId=$this->input->post('groupId');
        $id=$this->groups_model->createGroup($groupId);


        if ($id)
        {
            setAActivityLogs('Transaction_activity','AAGroup_deletevisitor','Group Id:-'.$groupId);

            $this->session->set_flashdata('success','Successfully created group');
            redirect('admin/groups');
        } else
        {
            $this->session->set_flashdata('success',' Something Went Wrong.');
            redirect('admin/groups');
        }


    }

}