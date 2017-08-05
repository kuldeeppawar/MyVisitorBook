<?php
if (! defined('BASEPATH'))
	exit('No direct script access allowed');

class Visitor extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->model('visitor_model');
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
		if ($this->session->userdata('admin_email') == '')
		{
			redirect('admin');
		}
	
	}

	public function index()
	{
	
		$this->Checklogin();
		
		$data ['resultVisitor']=$this->visitor_model->getAllVisitors();
		$data ['include']='admin/visitor/getVisitors';
		$data ['admin_section']='manage_Visitors';
		$this->load->view('backend/container',$data);
	
	}
	
	// ---Function used to add new Visitor-//
	public function addVisitor()
	{
	
		$this->Checklogin();
		if (isset($_POST ['btnSubmit']))
		{
				
			$data ['admin_section']='Visitor';
			$id=$this->visitor_model->addVisitor();
			if ($id)
			{
				$this->session->set_flashdata('success','Visitor has been added successfully.');
				redirect('admin/visitor');
			} else
			{
				$this->session->set_flashdata('error','Unable to save Visitor.');
				redirect('admin/visitor');
			}
		} else
		{
			$data ['resultCountry']=$this->visitor_model->getCountrylist();
			$data ['resultGroup']=$this->visitor_model->getAllgroup();
			$data ['include']='admin/visitor/addVisitor';
			$data ['admin_section']='manage_Visitors';
			$this->load->view('backend/container',$data);
		}
	
	} 

	//--function to Edit Visitor--//

	public function editVisitor($id='')
	{
		$this->Checklogin();
		if (isset($_POST ['btnSubmit']))
		{
			$data ['admin_section']='Visitor';
			$id=$this->visitor_model->editVisitor();
			if ($id)
			{
				$this->session->set_flashdata('success','Visitor has been edit successfully.');
				redirect('admin/visitor');
			} else
			{
				$this->session->set_flashdata('error','Unable to edit Visitor details.');
				redirect('admin/visitor');
			}
		} else
		{
			$visitor=$this->visitor_model->getVisitordetails($id);
			$visitorgroup=$this->visitor_model->getVisitorgroupdetails($id);
			if(count($visitor)>0)
			{
				$data ['resultCountry']=$this->visitor_model->getCountrylist();
				$data ['resultVisitor']=$visitor;
				$data ['resultVisitorgroup']=$visitorgroup;
				$data ['resultGroup']=$this->visitor_model->getAllgroup();
				$data ['resultState']=$this->visitor_model->getStatelist($visitor[0]->vis_countryId_fk);
				$data ['resultCity']=$this->visitor_model->getCitylist($visitor[0]->vis_stateId_fk);
				$data ['include']='admin/visitor/editVisitor';
				$data ['admin_section']='manage_Visitors';
				$this->load->view('backend/container',$data);
			}	
			else 
			{
				$this->session->set_flashdata('success','Something Went Wrong.');
				redirect('admin/visitor');
			}	
	
		}
	
	}
	
	
	
  //---function used to get state list----//	
	public function getState()
	{
	
		$this->Checklogin();
		$id=$this->input->post('val');
	
		if ($id > 0)
		{
			
			$resultState=$this->visitor_model->getStatelist($id);
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
				
			$resultCity=$this->visitor_model->getCitylist($id);
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
	
	
	
	//----Function to get Visitors details---//
  Public function  getSpecificvisitor()
  {
  	
  	$insertid=$this->input->post('id');
  	
  	$resultVisitor=$this->visitor_model->getAllVisitors();
  	$resultSpecvisitor=$this->visitor_model->getSpecificVisitors($insertid);
  	$resultGroup=$this->visitor_model->getVisitorgroup($insertid);
  	$resultInvolved=$this->visitor_model->getVisitoruser($insertid);
  	$resultComment=$this->visitor_model->getAllcomment($insertid);
  	if(count($resultSpecvisitor)>0)
  	{	
  	
  	?>
  	    <div class="user_list_box">
		<div class="row">
			<div class="col-md-4">
				<div class="portlet light bordered">
					<div class="portlet-title">
						<div class="row">
							<div class="col-md-6 ">
								<ul class="nav navbar-nav ">
									<li class="dropdown dropdown-user"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" style="font-size: 14px; padding: 18px 5px;">Recently updated <i class="fa fa-angle-down"></i>
											</span></a>
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
													<form role="form">
														<div class="form-body">
															<div class="row">
																<div class="col-md-12">
																	<div class="form-group">
																		<label>Mobile no. <span class="mandatory"></span></label> <input type="text" class="form-control" value="9876548965" readonly>
																	</div>
																	<div class="form-group">
																		<label>Message <span class="mandatory"></span></label>
																		<textarea class="form-control" rows="4"></textarea>
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
													<form role="form">
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
																		<textarea class="form-control" rows="4"></textarea>
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
											<button type="button" class="close" data-dismiss="modal">×</button>
											<h2 class="modal-title text-center" style="font-size: 18px !important;">
												<i class="fa fa-trash"></i> Are you sure to Delete?
											</h2>
										</div>
										<div class="modal-body">
											<div class="portlet-body form">
												<form role="form">
													<div class="form-body">
														<div class="row">
															<div class="col-md-12">
																<div class="modal-footer">
																	<a href="#" class="btn btn-primary" onclick="deletelistVisitor()" >Yes</a>
																	<button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
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
							
							<div class="col-md-6 col-sm-12  pull-right">
								<div class="" style="float: right; margin-left: 2px; margin-top: 12px;">
									<a href="#" data-target="#send_sms11" data-toggle="modal" class="margin_rgt p_element1">
									     <img src="<?php echo base_url()?>themes/assets/sms.png" height="22" title="Send SMS"></a> 
									     <a href="#" data-target="#send_email2" data-toggle="modal" class="margin_rgt p_element1">
										<i class="fa fa-envelope-o fa-2x" title="Send Email" style="color: #828282;"></i>
									</a>
									 <a href="#" data-toggle="modal" data-target="#myModal_m12" class="margin_rgt" id="sb4"> 
									    <i class="fa fa-trash fa-2x " title="Delete" style="color: #828282;"></i>
									 </a> 
									 <a href="<?php echo base_url()?>admin/visitor/addVisitor" id="sample_editable_1_new hvr-float-shadow" class="btn btn-primary" data-title="Add Contact">+</a>
									<ul class="nav navbar-nav pl0" style="float: right; margin-left: 7px;">
										<li class="dropdown dropdown-user burger_menu">
										    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false">
										     <i class="fa fa-bars fa-2x" aria-hidden="true"></i> 
										    </a>
											<ul class="dropdown-menu dropdown-menu-default">
												<li class="options" style="border-bottom: 1px solid #e7ecf1;"><a href="#" title="Custom Fields" style="padding: 5px; margin-top: 5px;">Print Address Label</a></li>
												<li class="options" style="border-bottom: 1px solid #e7ecf1;"><a href="#" title="Custom Fields" style="padding: 0px 5px; margin-top: 5px;">Manage custom Fields</a></li>
												<li class="options" style="border-bottom: 1px solid #e7ecf1;"><a href="#" title="Custom Fields" style="padding: 0px 5px; margin-top: 5px;">Import Contact</a></li>
												<li class="options" style="border-bottom: 1px solid #e7ecf1;"><a href="#" title="Custom Fields" style="padding: 0px 5px;; margin-top: 5px;"> Export Contact</a></li>
											
											</ul>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="portlet-body" style="height: 470px; overflow: auto;" id="test-list">
						<ul class="list list-group All_list">
							<?php 
							for($i=0;$i<count($resultVisitor);$i++)
							{	
								$active="";
									
							   if($resultVisitor[$i]->vis_id_pk==$insertid)
							   {
							   	$active="active";
							   }
							   $j=$i+1;
								
							 ?>
							   <li class="list-group-item <?php echo $active;?>">
							       <input type="checkbox" height="20" width="20" class="check_box1" id="chklist<?php echo $j?>"
							        value="<?php echo $resultVisitor[$i]->vis_id_pk; ?>"/>
							       
							        <?php echo $resultVisitor[$i]->vis_firstName." ".$resultVisitor[$i]->vis_lastName;?>
							        <span class="pull-right"><?php echo $resultVisitor[$i]->vis_businessName ?></span>
							   </li>
							<?php 
							}?>
							
						</ul>
						<ul class="pagination pull-right"></ul>
					</div>
				</div>
                   <script type="text/javascript">

							function deletelistVisitor()
							{
								 var count=<?php echo count($resultVisitor)?>;
							     var visitorId;
							 
							    for (var i=1;i<=count;i++)
							    {
							  	  if($('#chklist'+i).is(':checked'))
							  	  {
								  	  
							  		visitorId=$("#chklist"+i).val(); 
							  	 
							  		  $.post("<?php echo base_url();?>admin/visitor/deleteVisitor",{visitorId:visitorId},function(data){

							  	        location.reload();
											  	     
							  	        });
							  	
							      }

							    }	

							}
							</script>
			</div>
			<div class="col-md-8">
				<div class="row">
					<div class="" style="background: #fcfcfc; margin-bottom: 10px; padding: 10px 0px; float: left; margin-left: 12px; margin-right: 12px; border-bottom: 1px solid #e4e4e4;">
						<div class="col-md-2 pd0 text-center">
							<div class="profile-userpic ">
								<img src="<?php echo base_url() ?>themes/assets/profile_user.jpg" alt="" style="height: 100%; width: 100%;">
							</div>
							<a href="<?php echo base_url()?>admin/visitor/editVisitor/<?php echo $insertid?>">Edit</a>
						</div>
						<div class="col-md-7">
							<h3 style="margin-top: 3px;"margin-bottom:0px;><?php echo $resultSpecvisitor[0]->vis_firstName." ".$resultSpecvisitor[0]->vis_lastName ;?></h3>
							<p style="color: #ababab;">
								Me at <a href="#"><?php echo $resultSpecvisitor[0]->vis_businessName;?></a> <a href="#">( <?php echo $resultSpecvisitor[0]->vis_businessCategory;?> )</a>
							</p>
							<p style="color: #ababab;">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							<div class="row pro_info">
								<ul class="list-inline">
									<li><i class="fa fa-envelope" aria-hidden="true"></i><?php echo $resultSpecvisitor[0]->vis_email;?></li>
									<li><i class="fa fa-mobile mob" aria-hidden="true"></i> <?php echo $resultSpecvisitor[0]->vis_mobile;?></li>
									<li><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $resultSpecvisitor[0]->vis_landline;?></li>
									<?php for($j=0;$j<count($resultGroup);$j++)
									{?>
									<li><a href="#"><i class="fa fa-group" aria-hidden="true"></i> <?php echo $resultGroup[$j]->grp_name;?></a></li>
									<?php }?>
									<!--<li><i class="fa fa-calendar" aria-hidden="true"></i> 13/10/2016</li>

					<li><i class="fa fa-calendar" aria-hidden="true"></i> 13/10/2016</li>-->
								</ul>
							</div>
						</div>
						<div class="col-md-3 pd0">
							<div class="btn-group pull-right">
								<a href="<?php echo base_url()?>admin/visitor/editVisitor/<?php echo $insertid?>" id="sample_editable_1_new hvr-float-shadow" class="btn btn-primary">Edit</a> <a class="btn  blue btn-primary btn-circle" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"
									aria-expanded="false" style="margin-left: 5px;"
								> More <i class="fa fa-angle-down"></i>
								</a>
								<div class="dropdown-menu dropdown-checkboxes pull-right">
									<li class="options" style="border-bottom: 1px solid #e7ecf1;"><a href="#" title="Custom Fields" style="padding: 5px; margin-top: 5px; padding: 5px !important; line-height: 10px">Print Address Label</a></li>
									<li class="options" style="border-bottom: 1px solid #e7ecf1;"><a href="bulk_sms.html" style="padding-top: 0px; margin-top: 5px; padding-left: 0px; padding: 5px !important; line-height: 10px">Send SMS</a></li>
									<li class="options" style="border-bottom: 1px solid #e7ecf1;"><a href="bulk_email.html" style="padding-top: 0px; margin-top: 5px; padding-left: 0px; padding: 5px !important; line-height: 10px">Send Email</a></li>
									<li class="options" style="border-bottom: 1px solid #e7ecf1;"><a href="#" title="Custom Fields" data-toggle="modal" data-target="#myModal_mm1"
										style="padding-top: 0px; margin-top: 5px; padding-left: 0px; padding: 5px !important; line-height: 10px"> Delete</a></li>
								</div>
								<a onclick="closeProfileDiv();" class="close_section" title="Close" id="close"><i style="color: #a9a3a3; padding-top: 10px; margin-left: 7px; font-size: 35px;" class="fa fa-times fa-3x"></i></a>
							</div>
						</div>
					</div>
					<div id="send_sms" class="modal fade" role="dialog">
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
											<form role="form">
												<div class="form-body">
													<div class="row">
														<div class="col-md-12">
															<div class="form-group">
																<label>Mobile no. <span class="mandatory"></span></label> <input type="text" class="form-control" value="9876548965" readonly>
															</div>
															<div class="form-group">
																<label>Message <span class="mandatory"></span></label>
																<textarea class="form-control" rows="4"></textarea>
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
					<div id="send_email" class="modal fade" role="dialog">
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
											<form role="form">
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
																<textarea class="form-control" rows="4"></textarea>
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
											<form role="form">
												<div class="form-body">
													<div class="row">
														<div class="col-md-12">
															<div class="form-group">
																<label>Mobile no. <span class="mandatory"></span></label> <input type="text" class="form-control" value="9876548965" readonly>
															</div>
															<div class="form-group">
																<label>Message <span class="mandatory"></span></label>
																<textarea class="form-control" rows="4"></textarea>
															</div>
														</div>
													</div>
												</div>
											</form>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-primary">Send SMS</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="send_emailm1" class="modal fade" role="dialog">
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
											<form role="form">
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
																<textarea class="form-control" rows="4"></textarea>
															</div>
														</div>
													</div>
												</div>
											</form>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-primary">Send Email</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="myModal_mm1" class="modal fade" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">×</button>
									<h2 class="modal-title text-center" style="font-size: 18px !important;">
										<i class="fa fa-trash"></i> Are you sure to Delete?
									</h2>
								</div>
								<div class="modal-body">
									<div class="portlet-body form">
										<form role="form">
											<div class="form-body">
												<div class="row">
													<div class="modal-footer">
														<a href class="btn btn-primary" onclick="deletespecificVisitor(<?php echo $insertid; ?>)">Yes</a>
														<button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
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
					<div class="profile-content info_box">
						<div class="">
							<div class="col-md-12">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#my_profile" data-toggle="tab" id="tab1">General Info</a></li>
									<li><a href="#Package" id="tab2" data-toggle="tab">History</a></li>
									<!--   <li><a data-toggle="tab" href="#password">Change Password</a></li> -->
									<li><a href="#password" data-toggle="tab" id="tab3">Notes</a></li>
								</ul>
								<!-- Modal -->
								<!-- ends -->
								<div class="tab-content">
									<div id="my_profile" class="tab-pane fade in active">
										<div class="row">
											<div class="col-md-6 tab-content123">
												<div class="row">
													<div class="col-md-12">
														<div class="caption caption-md" style="border-bottom: 1px solid #d0d0d0; padding-bottom: 5px; margin-bottom: 5px;">
															<span class="caption-subject font-blue-madison uppercase">Personal Info</span>
														</div>
													</div>
													<div class="col-md-12">
														<dl class="dl-horizontal">
															<dt>Registration:</dt>
															<dd><?php  
															echo date("d-m-Y",strtotime($resultSpecvisitor[0]->vis_createdDate));
															?></dd>
															<dt class="bb">Revisit:</dt>
															<dd class="bb"><?php 	echo date("d-m-Y",strtotime( $resultSpecvisitor[0]->vl_visitDate));?></dd>
															<dt>DOB:</dt>
															<dd><?php 	echo date("d-m-Y",strtotime( $resultSpecvisitor[0]->vis_dob));?></dd>
															<dt class="bb">Anniversary Date:</dt>
															<dd class="bb"><?php 	echo date("d-m-Y",strtotime( $resultSpecvisitor[0]->vis_anniversaryDate));?></dd>
															<dt>Website:</dt>
															<dd><?php echo $resultSpecvisitor[0]->vis_website;?></dd>
															<dt>Fax:</dt>
															<dd><?php echo $resultSpecvisitor[0]->vis_fax;?></dd>
														</dl>
													</div>
												</div>
											</div>
											<div class="col-md-6 tab-content123 pull-right" style="width: 48%;">
												<div class="row">
													<div class="col-md-12">
														<div class="caption caption-md" style="border-bottom: 1px solid #d0d0d0; padding-bottom: 5px; margin-bottom: 5px;">
															<span class="caption-subject font-blue-madison uppercase">Address</span>
														</div>
													</div>
													<div class="col-md-12">
														<?php echo $resultSpecvisitor[0]->vis_address;?>,<br> <?php echo $resultSpecvisitor[0]->cty_name;?>. <br> <?php echo $resultSpecvisitor[0]->vis_zipCode;?>
													</div>
												</div>
											</div>
											<div class="col-md-6 tab-content123 pull-right" style="width: 48%;">
												<div class="row">
													<div class="col-md-12">
														<div class="caption caption-md" style="border-bottom: 1px solid #d0d0d0; padding-bottom: 5px; margin-bottom: 5px;">
															<span class="caption-subject font-blue-madison uppercase">Other Contacts</span>
														</div>
													</div>
													<div class="col-md-12">
														<div class="general-item-list">
															<div class="item">
																<div class="item-head" style="border-bottom: 1px solid #e4e4e4; padding-bottom: 5px; padding-top: 5px;">
																	<div class="item-details">
																		<div style="float: left;">
																			<img class="item-pic" src="<?php echo base_url()?>themes/assets/pages/media/users/avatar3.jpg" style="width: 85%; border-radius: 50% !important;">
																		</div>
																		<div style="">
																			<a href="" class="item-name primary-link">Nick Larson</a>
																		</div>
																		<div style="float: left; padding-right: 10px;">
																			<i class="fa fa-envelope item-label" aria-hidden="true"></i> abc@gmail.com
																		</div>
																		<div style="float: left;">
																			<i class="fa fa-mobile mob" aria-hidden="true"></i> 8446253249
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-6 tab-content123">
												<div class="row">
													<div class="col-md-12">
														<div class="caption caption-md" style="border-bottom: 1px solid #d0d0d0; padding-bottom: 5px; margin-bottom: 5px;">
															<span class="caption-subject font-blue-madison uppercase">User(s) Involved</span>
														</div>
													</div>
													<div class="col-md-12">
													<?php 
													 for($i=0;$i<count($resultInvolved);$i++)
													 {
													?>
														<a href="#">
															<div class="img-id" style="float: left; width: 45px; margin-bottom: 5px; margin-right: 5px;">
																<img class="item-pic" src="<?php echo base_url()?>themes/assets/pages/media/users/avatar3.jpg" style="border-radius: 50% !important;">Id:
																<?php echo $resultInvolved[$i]->vc_sysuserId_fk ?>
															</div>
														</a>
													<?php 
													 }
													?>	 
													</div>
												</div>
											</div>
											<div class="col-md-6 tab-content123 pull-right" style="width: 48%;">
												<div class="row">
													<div class="col-md-12">
														<div class="caption caption-md" style="border-bottom: 1px solid #d0d0d0; padding-bottom: 5px; margin-bottom: 5px;">
															<span class="caption-subject font-blue-madison uppercase">Additional Info</span>
														</div>
													</div>
													<div class="col-md-12">
														<div style="margin-bottom: 10px;">
															<span style="color: #9a9a9a;">Desc</span><br><?php echo $resultSpecvisitor[0]->vis_note;?> .
														</div>
														<div style="margin-bottom: 10px;">
															<span style="color: #9a9a9a;">Home</span><br> <?php echo $resultSpecvisitor[0]->cty_name;?>
														</div>
														<div style="margin-bottom: 10px;">
															<span style="color: #9a9a9a;">Email</span> <?php echo $resultSpecvisitor[0]->vis_email;?>
														</div>
														<a href="#" id="desc1">See More</a>
														<div style="display: none;" id="desc_show">
															<?php /*?><div style="margin-bottom: 10px;">
																<span style="color: #9a9a9a;">Desc</span><br> Hide, Show, Toggle, Slide, Fade, and Animate. ... How to hide parts of text. ... With jQuery, you can hide and show HTML elements with the hide() and show() .
															</div>
															<div style="margin-bottom: 10px;">
																<span style="color: #9a9a9a;">Home</span><br> Pune
															</div>
															<div style="margin-bottom: 10px;">
																<span style="color: #9a9a9a;">Email</span> test@gmail.com
															</div><?*/?>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div id="Package" class="tab-pane fade">
										<div class="row">
											<div class="col-md-12">
												<div class="portlet light portlet-fit bordered">
													<div class="portlet-body">
														<div class="timeline">
															<!-- TIMELINE ITEM -->
															<div class="timeline-item">
																<div class="timeline-badge">
																	<img class="timeline-badge-userpic" src="../assets/profile_user.jpg">
																</div>
																<div class="timeline-body">
																	<div class="timeline-body-arrow"></div>
																	<div class="timeline-body-head">
																		<div class="timeline-body-head-caption">
																			<a href="javascript:;" class="timeline-body-title font-blue-madison">Andres Iniesta</a> <span class="timeline-body-time font-grey-cascade">Replied at 7:45 PM</span>
																		</div>
																	</div>
																	<div class="timeline-body-content">
																		<span class="font-grey-cascade"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci
																			tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. </span>
																	</div>
																</div>
															</div>
															<!-- END TIMELINE ITEM -->
															<!-- TIMELINE ITEM -->
															<div class="timeline-item">
																<div class="timeline-badge">
																	<img class="timeline-badge-userpic" src="../assets/profile_user.jpg">
																</div>
																<div class="timeline-body">
																	<div class="timeline-body-arrow"></div>
																	<div class="timeline-body-head">
																		<div class="timeline-body-head-caption">
																			<a href="javascript:;" class="timeline-body-title font-blue-madison">Vanessa Bond</a> <span class="timeline-body-time font-grey-cascade">Posted new post at 5:10 PM</span>
																		</div>
																		<div class="timeline-body-head-actions"></div>
																	</div>
																	<div class="timeline-body-content">
																		<span class="font-grey-cascade">
																			<p>Caulie dandelion maize lentil collard greens radish arugula sweet pepper water spinach kombu courgette lettuce. Celery coriander bitterleaf epazote radicchio shallot winter purslane collard greens spring onion squash lentil.
																				Artichoke salad bamboo shoot black-eyed pea brussels sprout garlic kohlrabi. coriander bitterleaf epazote radicchio shallot winter purslane collard.</p>
																			<p>Coriander bitterleaf epazote radicchio shallot winter purslane collard. Caulie dandelion maize lentil collard greens radish arugula sweet pepper water spinach kombu courgette lettuce. Celery coriander bitterleaf epazote
																				radicchio shallot winter purslane collard greens spring onion squash lentil. Artichoke salad bamboo shoot black-eyed pea brussels sprout garlic kohlrabi.</p>
																			<p>Caulie dandelion maize lentil collard greens radish arugula sweet pepper water spinach kombu courgette lettuce. Celery coriander bitterleaf epazote radicchio shallot winter purslane collard greens spring onion squash lentil.
																				Artichoke salad bamboo shoot black-eyed pea brussels sprout garlic kohlrabi radicchio shallot winter purslane collard greens spring onion squash lentil.</p>
																			<p>Coriander bitterleaf epazote radicchio shallot winter purslane collard. Caulie dandelion maize lentil collard greens radish arugula sweet pepper water spinach kombu courgette lettuce. Celery coriander bitterleaf epazote
																				radicchio shallot winter purslane collard greens spring onion squash lentil. Artichoke salad bamboo shoot black-eyed pea brussels sprout garlic kohlrabi.</p>
																		</span>
																	</div>
																</div>
															</div>
															<!-- END TIMELINE ITEM -->
															<!-- TIMELINE ITEM WITH GOOGLE MAP -->
															<!-- END TIMELINE ITEM -->
															<!-- TIMELINE ITEM -->
															<!-- END TIMELINE ITEM -->
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
										<div id="password" class="tab-pane fade row">
													<div class="col-md-6">
														<div class="form-group">
																
														 <input type="text" size="16" name="txtSubject" id="txtSubject" placeholder="Subject" class="form-control">
																 <input type="hidden" value="<?php echo $insertid;?>" name="txtVisitorid" id="txtVisitorid" >
															<br>
														     <div class="form-group">
																	<textarea class="form-control" name="txtComment" id="txtComment" rows="3" placeholder="Type Here" aria-invalid="false" ></textarea>
															</div>
															 <div class="form-group">
																
																<div class="input-group date date-picker" id="schedule1" >
															   
																<input type="text" name="txtDate" id="txtDate" size="16" readonly class="form-control"> <span class="input-group-btn">
																	<button class="btn default date-reset" type="button" style="margin-right: 0px; border-radius: 0px;">
																		<i class="fa fa-times"></i>
																	</button>
																	<button class="btn default date-set" type="button" style="margin-right: 0px; border-radius: 0px !important;">
																		<i class="fa fa-calendar"></i>
																	</button>
																</span>
															</div>
															<?php /*?>
															<div class="input-group date date-picker" id="schedule1" data-date-end-date="+0d" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
									                            <input type="text" size="16" readonly="" class="form-control">
									                            <span class="input-group-btn">
									                            <button class="btn default date-reset" type="button" style="margin-right:0px;border-radius:0px;"> <i class="fa fa-times"></i> </button>
									                            <button class="btn default date-set" type="button" style="margin-right:0px;border-radius:0px !important;"> <i class="fa fa-calendar"></i> </button>
									                            </span> </div><?php */?>
															</div>
															<div class="col-lg-12">
																<button type="button" class="btn green"  onclick="saveComment()">
																	<span> Save </span>
																	</button>
																</div><br><br>
														</div>
														<?php /* ?>
														<form id="fileupload" action="../assets/global/plugins/jquery-file-upload/server/php/" method="POST" enctype="multipart/form-data">
															<!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
															<div class="row fileupload-buttonbar">
																<div class="col-lg-12">
																	<!-- The fileinput-button span is used to style the file input field as button -->
																	<span class="btn green fileinput-button"> <i class="fa fa-plus"></i> <span> Add files... </span> <input type="file" name="files[]" multiple>
																	</span>
																	<button type="submit" class="btn blue start">
																		<i class="fa fa-upload"></i> <span> Start upload </span>
																	</button>
																	<button type="reset" class="btn warning cancel">
																		<i class="fa fa-ban-circle"></i> <span> Cancel upload </span>
																	</button>
																	<button type="button" class="btn red delete">
																		<i class="fa fa-trash"></i> <span> Delete </span>
																	</button>
																</div>
																<!-- The global progress information -->
																<div class="col-lg-5 fileupload-progress fade">
																	<!-- The global progress bar -->
																	<div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
																		<div class="progress-bar progress-bar-success" style="width: 0%;"></div>
																	</div>
																	<!-- The extended global progress information -->
																	<div class="progress-extended">&nbsp;</div>
																</div>
															</div>
															<!-- The table listing the files available for upload/download -->
															<table role="presentation" class="table table-striped clearfix">
																<tbody class="files">
																</tbody>
															</table>
														</form><?php */?>
													</div>
													<script src="<?php echo base_url()?>themes/assets/global/plugins/horizontal-timeline/horozontal-timeline.min.js" type="text/javascript"></script>
													<script src="<?php echo base_url()?>themes/assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
													<div class="col-md-6 col-sm-6">
														<div class="portlet light portlet-fit bordered">
															<div class="portlet-body">
																<div class="cd-horizontal-timeline mt-timeline-horizontal loaded" data-spacing="60">
																	<div class="timeline">
																		<div class="events-wrapper">
																			<div class="events" >
																				<ol>
																					<?php //count($resultComment) 
															                        for($i=0;$i<count($resultComment);$i++)
															                           {
															                              $staus='';
															                              if($i==0)
															                              {
															                              	$staus="selected";
															                              }
															                           	 
															                           	?>
															                          <li><a  onclick="getComment(<?php echo $resultComment[$i]->vc_id_pk;?>)"  href="#0" data-date=" <?php echo  date("d/m/Y",strtotime($resultComment[$i]->vc_date)); ?>"
															                             class="border-after-red bg-after-red <?php echo $staus;?>">
															                             <?php 
															                            echo   date("d M",strtotime($resultComment[$i]->vc_date))
															                             ?>
															                             
															                             </a></li>
															                           <?php 
															                          
																					    
																					   }
																					
																					?>
<!-- 																					<li><a href="#0" data-date="16/01/2014" class="border-after-red bg-after-red selected">16 Jan</a></li> -->
<!-- 																					<li><a href="#0" data-date="28/01/2014" class="border-after-red bg-after-red">28 Feb</a></li> -->
<!-- 																					<li><a href="#0" data-date="31/01/2014" class="border-after-red bg-after-red">20 Mar</a></li> -->
<!-- 																					<li><a href="#0" data-date="20/05/2014" class="border-after-red bg-after-red">20 May</a></li> -->
<!-- 																					<li><a href="#0" data-date="09/07/2014" class="border-after-red bg-after-red">09 Jul</a></li> -->
<!-- 																					<li><a href="#0" data-date="30/08/2014" class="border-after-red bg-after-red">30 Aug</a></li> -->
<!-- 																					<li><a href="#0" data-date="15/09/2014" class="border-after-red bg-after-red">15 Sep</a></li> -->
<!-- 																					<li><a href="#0" data-date="01/11/2014" class="border-after-red bg-after-red">01 Nov</a></li> -->
<!-- 																					<li><a href="#0" data-date="10/12/2014" class="border-after-red bg-after-red">10 Dec</a></li> -->
<!-- 																					<li><a href="#0" data-date="19/01/2015" class="border-after-red bg-after-red">29 Jan</a></li> -->
<!-- 																					<li><a href="#0" data-date="03/03/2015" class="border-after-red bg-after-red">3 Mar</a></li> -->
																					
																				</ol>
																				<span class="filling-line bg-red" aria-hidden="true"></span>
																			</div>
																			<!-- .events -->
																		</div>
																		<!-- .events-wrapper -->
																		<ul class="cd-timeline-navigation mt-ht-nav-icon">
																			<li><a href="#0" class="prev inactive btn btn-outline red md-skip"> <i class="fa fa-chevron-left"></i>
																			</a></li>
																			<li><a href="#0" class="next btn btn-outline red md-skip"> <i class="fa fa-chevron-right"></i>
																			</a></li>
																		</ul>
																		<!-- .cd-timeline-navigation -->
																	</div>
																	<!-- .timeline -->
																	<div class="events-content">
																		<ol id="viewComment">
																			<?php  for($i=0;$i<count($resultComment);$i++)
															                           {
															                              $staus='';
															                              if($i==0)
															                              {
															                              	$staus="selected";
															                              }
															                           	 
															                           	?>
																							<li class="<?php echo $staus;?>" data-date="<?php echo  date("d/m/Y",strtotime($resultComment[$i]->vc_date)); ?>">
																								<div class="mt-title">
																									<h2 class="mt-content-title"><?php echo $resultComment[$i]->vc_subject; ?></h2>
																								</div>
																								<div class="mt-author">
																									<div class="mt-avatar">
																										<img src="<?php echo base_url()?>themes/assets/pages/media/users/avatar3.jpg" />
																									</div>
																									<div class="mt-author-name">
																										<a href="javascript:;" class="font-blue-madison"><?php echo $resultComment[0]->sysu_name; ?></a>
																									</div>
																									<div class="mt-author-datetime font-grey-mint"><?php echo  date("d M Y",strtotime($resultComment[0]->vc_date)); ?></div>
																								</div>
																								<div class="clearfix"></div>
																								<div class="mt-content border-grey-steel">
																									<p><?php echo $resultComment[0]->vc_comment; ?></p>
																									<a href="javascript:;" class="btn btn-circle red btn-outline">Read More</a> <a href="javascript:;" class="btn btn-circle btn-icon-only blue"> <i class="fa fa-plus"></i>
																									</a> <a href="javascript:;" class="btn btn-circle btn-icon-only green pull-right"> <i class="fa fa-twitter"></i>
																									</a>
																								</div>
																							</li>
																			<?php }?>
																		</ol>
																	</div>
																	<!-- .events-content -->
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
		</div>
	</div>
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
  	$admin_id=$this->session->userdata('admin_id');
  	$result=$this->visitor_model->getSpecificuser($admin_id);
  
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
  
  
  
  // ----Function Used To download visitor csv----//
  public function getVisitorcsv()
  {
  	$this->Checklogin();
  	$resultVisitor=$this->visitor_model->getAllVisitors();
  
  	$contents='"Id","Customer Name","Mobile No","Email Id","Business Name","Location","Registration On","Last Revisit"';
  
  	$contents.="\n";
  	for($i=0;$i < count($resultVisitor);$i ++)
  	{
  		$j=$i+1;
  		$contents.='"' . $resultVisitor[$i]->vis_id_pk . '","' .  $resultVisitor[$i]->vis_firstName." ".$resultVisitor[$i]->vis_lastName . '","' . $resultVisitor[$i]->vis_mobile . '","' . $resultVisitor[$i]->vis_email . '","' . $resultVisitor[$i]->vis_businessName . '" ,"' .  $resultVisitor[$i]->cty_name . '","' . $resultVisitor[$i]->vis_createdDate . '","' .  $resultVisitor[$i]->vl_visitDate . '"';
  		$contents.="\n";
  	}
  
  	$contents=strip_tags($contents);
  
  	// header to make force download the file
  	Header("Content-Disposition: attachment; filename=Visitor.csv");
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
  		$id=$this->visitor_model->uploadCsv();
  		if ($id)
  		{
  			$this->session->set_flashdata('success',' CSV uploaded successfully.');
  			redirect('admin/visitor');
  		} else
  		{
  			$this->session->set_flashdata('success',' Something Went Wrong.');
  			redirect('admin/visitor');
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
  		$id=$this->visitor_model->deleteVisitor($visitorId);
  		if ($id)
  		{
  			$this->session->set_flashdata('success',' User Deleted.');
  			redirect('admin/visitor');
  		} else
  		{
  			$this->session->set_flashdata('success',' Something Went Wrong.');
  			redirect('admin/visitor');
  		}
  	
  
  }
  
  // ---Function used to add new Groups-//
  public function addGroup()
  {
  
     	$this->Checklogin();
  		$data ['admin_section']='Groups';
  		$id=$this->visitor_model->addGroup();
  		
  		echo $id;
  
  }
  
  
  // ---Function used to add new VisitorCommen-//
  public function saveComment()
  {
  
  	$this->Checklogin();
  	$data ['admin_section']='Groups';
  	$id=$this->visitor_model->saveComment();
  
  	echo $id;
  
  }
  
  
  //---function get comment--//
  public  function getComment()
  {
  	
  	 $id=$this->input->post('id');
  	 $resultComment=$this->visitor_model->getComment($id);
  	 if(count($resultComment)>0)
  	 {
  	 ?>
  	   
					<li class="selected" data-date="<?php echo  date("d/m/Y",strtotime($resultComment[0]->vc_date)); ?>">
						<div class="mt-title">
							<h2 class="mt-content-title"><?php echo $resultComment[0]->vc_subject; ?></h2>
						</div>
						<div class="mt-author">
							<div class="mt-avatar">
								<img src="<?php echo base_url()?>themes/assets/pages/media/users/avatar3.jpg" />
							</div>
							<div class="mt-author-name">
								<a href="javascript:;" class="font-blue-madison"><?php echo $resultComment[0]->sysu_name; ?></a>
							</div>
							<div class="mt-author-datetime font-grey-mint"><?php echo  date("d M Y",strtotime($resultComment[0]->vc_date)); ?></div>
						</div>
						<div class="clearfix"></div>
						<div class="mt-content border-grey-steel">
							<p><?php echo $resultComment[0]->vc_comment; ?>.</p>
<!-- 							<a  href="javascript:;" class="btn btn-circle red btn-outline">Read More</a> <a href="javascript:;" class="btn btn-circle btn-icon-only blue"> <i class="fa fa-plus"></i> -->
<!-- 							</a> <a href="javascript:;" class="btn btn-circle btn-icon-only green pull-right"> <i class="fa fa-twitter"></i> -->
							</a>
						</div>
					</li>
	<?php }?>
  	<?php 
  	
  	
  }
  
  
	
}

