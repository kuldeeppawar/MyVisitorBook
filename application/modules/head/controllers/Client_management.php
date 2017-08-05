<?php
if (! defined('BASEPATH'))	exit('No direct script access allowed');

class Client_management extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('client_model');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('encryption');
		$this->form_validation->set_error_delimiters('<div class="error">','</div>');
	}
	
	// ==================== all page session check =====================--//
	public function Checklogin()
	{
		if ($this->session->userdata('admin_email') == '')
		{
			redirect('head');
		}
	}

    //----function used to all client listing and there orders---//
	public function index()
	{
		$this->Checklogin();
		$data['resultClients']=$this->client_model->getAllClients();
		$data['include']='client_management/order_management';
		$data['admin_section']='manage_Client';
		$this->load->view('backend/container_sa',$data);
	}

	//---Function used to add client and order details also add client form display----//
	public function addClient()
	{
		$this->Checklogin();
		if (isset($_POST['btnSubmit']))
		{
			$checkEmail=$this->client_model->checkEmail($this->input->post('txtEmail'));
			if($checkEmail)
			{	
				$data['admin_section']='manage_Client';
				$id=$this->client_model->addClient();
				if ($id)
				{
					$this->session->set_flashdata('success','Client has been added successfully.');
					redirect('head/client_management');
				} else
				{
					$this->session->set_flashdata('error','Unable to save Client Data.');
					redirect('head/client_management');
				}
			}
			else 
			{
				$this->session->set_flashdata('success','Email address allready registered.');
				redirect('head/client_management');
			}	
		} else
		{
			$data['resultCountry']=$this->client_model->getCountrylist();
			$data['resultPackage']=$this->client_model->getPackage();
			$data['resultReseller']=$this->client_model->getSalesTeam();
			$data['include']='head/client_management/client_management_view';
			$data['admin_section']='manage_Client';
			$this->load->view('backend/container_sa',$data);
		}
	
	}
	
	//----function to edit details of clients----//
	public function editClient($id=0)
	{
		$this->Checklogin();
		if (isset($_POST['btnSubmit']))
		{
			$data['admin_section']='Client';
			$id=$this->client_model->editClient();
			if ($id)
			{
				$this->session->set_flashdata('success','Client has been edit successfully.');
				redirect('head/client_management');
			} else
			{
				$this->session->set_flashdata('error','Unable to edit Client details.');
				redirect('head/client_management');
			}
		} else
		{
			
			
			$client=$this->client_model->getClientdetails($this->encryption->decrypt($id));
			
			if (count($client) > 0)
			{
				$email=$this->encryption->decrypt($client[0]->sysu_email);
				$mobile=$this->encryption->decrypt($client[0]->sysu_mobile);
				$usercred=array('email'=>$email,
								'mobile'=>$mobile);
				$data['usercred']=$usercred;
				$data['ClientId']=$this->encryption->decrypt($id);
				$data['resultCountry']=$this->client_model->getCountrylist();
				$data['resultClient']=$client;
				$data['resultState']=$this->client_model->getStatelist($client[0]->sysu_countryId_fk);
				$data['resultCity']=$this->client_model->getCitylist($client[0]->sysu_stateId_fk);
				$data['resultPackage']=$this->client_model->getPackage();
				$data['include']='head/client_management/client_edit';
				$data['admin_section']='manage_Client';
				$this->load->view('backend/container_sa',$data);
			} else
			{
				
				$this->session->set_flashdata('success','User Entry not Found in Client table');
				redirect('head/client_management');
			}
		}
	
	}
	
	// ---function used to get state list----//
	public function getState()
	{
		$this->Checklogin();
		$id=$this->input->post('val');
		
		if ($id > 0)
		{
			
			$resultState=$this->client_model->getStatelist($id);
			$msg="<option value=''>Select State</option>";
			
			for($i=0;$i < count($resultState);$i ++)
			{
				$disable="";
				if ($resultState[$i]->stat_status == 0)
				{
					$disable="disabled";
				}
				
				$msg=$msg . '<option  value="' . $resultState[$i]->stat_id_pk . '"' . $disable . '  >' . $resultState[$i]->stat_name . '</option>';
			}
			
			echo $msg;
		} else
		{
			
			echo false;
		}
	
	}
	
	// ---function used to get City list----//
	public function getCity()
	{
		$this->Checklogin();
		$id=$this->input->post('val');
		
		if ($id > 0)
		{
			
			$resultCity=$this->client_model->getCitylist($id);
			$msg="<option value=''>Select City</option>";
			
			for($i=0;$i < count($resultCity);$i ++)
			{
				$disable="";
				if ($resultCity[$i]->cty_status == 0)
				{
					$disable="disabled";
				}
				
				$msg=$msg . '<option  value="' . $resultCity[$i]->cty_id_pk . '"' . $disable . '  >' . $resultCity[$i]->cty_name . '</option>';
			}
			
			echo $msg;
		} else
		{
			
			echo false;
		}
	
	}

	public function getPackages()
	{
		$id=$this->input->post("clientid");
		$ptype=$this->input->post("ptype");
		if ($ptype == "New")
		{
			$resultPackage=$this->client_model->getAllPackageDetails();
			$msg="<option value=''>Select Package</option>";
			
			for($i=0;$i < count($resultPackage);$i ++)
			{
				$disable="";
				if ($resultPackage[$i]->pkg_status == 0)
				{
					$disable="disabled";
				}
				
				$msg=$msg . '<option  value="' . $resultPackage[$i]->pkg_id_pk . '"' . $disable . '  >' . $resultPackage[$i]->pkg_name . '</option>';
			}
			
			echo $msg;
		} else
		{
			$resultPackage=$this->client_model->getRenewalPackageDetails();
			$msg="<option value=''>Select Package</option>";
			
			for($i=0;$i < count($resultPackage);$i ++)
			{
				$disable="";
				if ($resultPackage[$i]->rpkg_status == 0)
				{
					$disable="disabled";
				}
				
				$msg=$msg . '<option  value="' . $resultPackage[$i]->rpkg_id_pk . '"' . $disable . '  >' . $resultPackage[$i]->rpkg_packageName . '</option>';
			}
			
			echo $msg;
		}
	
	}

	public function addNewOrder()
	{
		if (isset($_POST['submit']))
		{
			
			$oid=$this->client_model->addNewOrder();
			if ($oid)
			{
				$this->session->set_flashdata('success','Order Added successfully');
                redirect('head/client_management');
			} else
			{
				$this->session->set_flashdata('success','Order Failed');
				redirect('head/client_management');
			}
		}
	
	}

	public function getClientprofile()
	{
		$id=$this->input->post('userId');
		$resultUser=$this->client_model->getClientDetails($id);
		$resultmodifiedClients=$this->client_model->lastModifiedClients();
		$resultPackage=$this->client_model->getAllPackageDetails();
		$resultOrderDetails=$this->client_model->getOrderDetails($id);
		
		// $resultLocations=$this->client_model->getLocations();
		// $result=$this->client_model->getSystemuser();
		?>
			
			<div class="user_list_box">
				<div class="row">
					<div class="col-md-4">
						<div class="portlet light bordered">
							<div class="portlet-title">
								<div class="row">
									<div class="col-md-6 ">
										<ul class="nav navbar-nav ">
											<li class="dropdown dropdown-user"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"	style="font-size: 14px; padding: 18px 5px;">
											    Recently updated <i class="fa fa-angle-down"></i> </span></a>
												<ul class="dropdown-menu dropdown-menu-default">
													<li><a href="#">All Contacts</a></li>
													<li><a href="#">My Contacts </a></li>
													<li><a href="#">Recently viewed</a></li>
													<li><a href="#">Not updated in 30 Days</a></li>
												</ul></li>
										</ul>
									</div>
									<div class="col-md-5" style="float: right; margin-left: 2px; margin-top: 12px;">
										<div class="pull-right">
											<?php
											if(getAccessRights('mvbClSendsms'))
											{
											?>
											<a href="#" data-target="#send_sms11" data-toggle="modal" class="margin_rgt p_element12">
											      <img src="<?php echo base_url();?>themes/assets/sms.png" height="22" title="Send SMS"></a>
											<?php 
											}
											if(getAccessRights('mvbClSendemail'))
											{
											?>      
										   <a href="#" data-target="#send_email2" data-toggle="modal" class="margin_rgt p_element12">
										       <i class="fa fa-envelope-o fa-2x" title="Send Email" style="color: #828282;"></i></a>
										       <?php 
											}
											if(getAccessRights('mvbCldelete'))
											{
										       ?>
										        <a href="#" data-toggle="modal" data-target="#myModal_m12" class="margin_rgt" id="sb4"> 
										        <i class="fa fa-trash fa-2x " title="Delete" style="color: #828282;"></i>
												</a>
											<?php 
											}
											?>	
										</div>
									</div>
								</div>
							</div>
							<div class="portlet-body" style="overflow: auto;" id="test-list">
								<ul class="list-group All_list list">
									
						            <?php
										for($i=0;$i <count($resultmodifiedClients);$i ++)
										{
											?>
									          <li class="list-group-item">
									             <input type="checkbox" height="20" width="20" onclick="validateDivs()" class="check_box2" name="chkd<?php echo $i; ?>" id="chkd<?php echo $i; ?>" />
												 <?php echo $resultmodifiedClients[$i]->clnt_name; ?>
											 </li>
												  
							                <?php
										}
									?>
									
								</ul>
														<ul class="pagination pull-right"></ul>
							</div>
							
			
							<script type="text/javascript">
							 function validateDivs()
							 {
								var count = <?php echo count($resultmodifiedClients)?>;
								var userId = [];
							
								for (var i = 0; i < count; i++) 
							    {
									if ($('#chkd' + i).is(':checked')) 
									{
										
										userId.push($("#chkd" + i).val());
									}
								}

                              
								
								if(userId.length === 0)
							    {
									 $('.p_element12').css('visibility', 'hidden');
							         $('#sb4').hide();
								} 
								else if (userId.length === 1)
								{
                                     $('.p_element12').css('visibility', 'visible');
						             $('#sb4').show();
						        }
								else 
								{
									 $('.p_element12').css('visibility', 'visible');
							         $('#sb4').hide();
								}

								
							 }

							</script>
						</div>
<!-- 						<ul class="pagination pagination-sm pull-right"> -->
<!-- 							<li><a href="javascript:;"> <i class="fa fa-angle-left"></i> -->
<!-- 							</a></li> -->
<!-- 							<li><a href="javascript:;"> 1 </a></li> -->
<!-- 							<li class="active"><a href="javascript:;"> 2 </a></li> -->
<!-- 							<li><a href="javascript:;"> 3 </a></li> -->
<!-- 							<li><a href="javascript:;"> 4 </a></li> -->
<!-- 							<li><a href="javascript:;"> 5 </a></li> -->
<!-- 							<li><a href="javascript:;"> 6 </a></li> -->
<!-- 							<li><a href="javascript:;"> <i class="fa fa-angle-right"></i> -->
<!-- 							</a></li> -->
<!-- 						</ul> -->
					</div>
					<div class="col-md-8">
						<div class="row">
							<div class="" style="background: #fcfcfc; margin-bottom: 10px; padding: 10px 0px; float: left; margin-left: 12px; margin-right: 12px; border-bottom: 1px solid #e4e4e4;">
								<div class="col-md-2">
									<div class="profile-userpic">
										<img src="<?php echo base_url();?>uploads/systemusers_images/<?php echo $resultUser[0]->sysu_profile; ?>" alt="" style="height: 100%; width: 100%;">
									</div>
								</div>
								<div class="col-md-7">
									<h3 style="margin-top: 3px;"margin-bottom:0px;><?php echo $resultUser[0]->sysu_name; ?></h3>
									<p style="color: #ababab;">
										Me at <a href="#"><?php echo $resultUser[0]->sysu_bussiness_name; ?></a> ( <a href="#"><?php echo $resultUser[0]->sysu_bussiness_category; ?></a> )
									</p>
									<p style="color: #ababab;"><?php echo $resultUser[0]->sysu_Info.",".$resultUser[0]->sysu_addInfo; ?> </p>
									<div class="row pro_info">
										<ul class="list-inline">
											<li><i class="fa fa-envelope" aria-hidden="true"></i><?php $email=$resultUser[0]->sysu_email;  $email=$this->encryption->decrypt($email); echo $email;?></li>
											<li><i class="fa fa-mobile mob" aria-hidden="true"></i><?php $mobile=$resultUser[0]->sysu_mobile;  $mobile=$this->encryption->decrypt($mobile); echo $mobile;?></li>
											<li><i class="fa fa-phone" aria-hidden="true"></i><?php echo $resultUser[0]->sysu_landline_no; ?></li>
											<li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo $resultUser[0]->sysu_createdDate; ?></li>
											<li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo $resultUser[0]->sysu_modifiedDate; ?></li>
										</ul>
									</div>
								</div>
								<div class="col-md-3 pd0">
									<div class="btn-group pull-right">
										<?php 
										if(getAccessRights('mvbClEdit'))
										{
										?>
										<a href="<?php echo base_url()."head/client_management/editClient/".$this->encryption->encrypt($id);?>" id="sample_editable_1_new hvr-float-shadow" class="btn btn-primary">
										<?php getLocalkeyword('Edit');?></a> 
										<?php 
										}
										?>
										
										<a class="btn  blue btn-primary btn-circle" href="javascript:;" data-toggle="dropdown"
											data-hover="dropdown" data-close-others="true" aria-expanded="false" style="margin-left: 5px;"> More <i class="fa fa-angle-down"></i>
										</a>
										<div class="dropdown-menu dropdown-checkboxes pull-right">
											<?php 
											if(getAccessRights('mvbClSendsms'))
											{
											?>
											<li class="options" style="border-bottom: 1px solid #e7ecf1;">
											  <a data-toggle="modal" onclick="setMSgClientId('<?php echo $id;?>','sms');" data-target="#otp_sms" style="padding-top: 0px; margin-top: 5px; padding-left: 0px; padding: 5px !important; line-height: 10px"><?php getLocalkeyword('Send SMS');?></a>
											</li>
											<?php 
											}
											if(getAccessRights('mvbClSendemail'))
											{
											?>
											<li class="options" style="border-bottom: 1px solid #e7ecf1;">
											   <a data-toggle="modal" onclick="setMSgClientId('<?php echo $id;?>','email');" data-target="#otp_email" style="padding-top: 0px; margin-top: 5px; padding-left: 0px; padding: 5px !important; line-height: 10px"><?php getLocalkeyword('Send Email');?></a>
											</li>
											<?php 
											}
											if(getAccessRights('mvbCldelete'))
											{
											?>
											<li class="options" style="border-bottom: 1px solid #e7ecf1;">
											  <a href="#" title="Custom Fields" data-toggle="modal" data-target="#myModal_mm1" style="padding-top: 0px; margin-top: 5px; padding-left: 0px; padding: 5px !important; line-height: 10px"> <?php getLocalkeyword('Delete');?></a>
											  
											 </li>
										<?php 
											}
										?>
										
										</div>
										<a onclick="closProfileDiv();" class="close_section" title="Close" id="close"><i style="color: #a9a3a3; padding-top: 10px; margin-left: 7px; font-size: 35px;" class="fa fa-times fa-3x"></i></a>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="profile-content info_box">
								<div class="">
									<div class="col-md-12">
										<ul class="nav nav-tabs">
											<li class="active"><a href="#gen_info" data-toggle="tab" id="info_general"><?php getLocalkeyword('General Info');?></a></li>
											<li><a href="#package1" data-toggle="tab" id="tab1"><?php getLocalkeyword('Package Details');?></a></li>
											<li><a href="#pricing" id="tab2" data-toggle="tab"><?php getLocalkeyword('Package Pricing and Payment Details');?></a></li>
											<li><a href="#communicated_manage" id="tab3" data-toggle="tab"><?php getLocalkeyword('Communication Management');?></a></li>
											<!--   <li><a data-toggle="tab" href="#password">Change Password</a></li> -->
										</ul>
										<!-- Modal -->
										<!-- ends -->
										<div class="tab-content">
											<div id="gen_info" class="tab-pane fade in active">
												<div class="row">
													<div class="col-md-6 tab-content123">
														<div class="row">
															<div class="col-md-12">
																<div class="caption caption-md" style="border-bottom: 1px solid #d0d0d0; padding-bottom: 5px; margin-bottom: 5px;">
																	<span class="caption-subject font-blue-madison uppercase"> <?php getLocalkeyword('Personal Info');?></span>
																</div>
															</div>
															<div class="col-md-12">
																<dl class="dl-horizontal">
																	<dt><?php getLocalkeyword('DOB');?>:</dt>
																	<dd><?php echo $resultUser[0]->sysu_date_of_birth; ?></dd>
																	<br>
																	<dt class="bb"><?php getLocalkeyword('Anniversary Date');?>:</dt>
																	<dd class="bb"><?php echo $resultUser[0]->sysu_aniversary_date; ?></dd>
																	<br>
																	<dt><?php getLocalkeyword('Website');?>:</dt>
																	<dd><?php echo $resultUser[0]->sysu_website; ?></dd>
																	<br>
																	<dt><?php getLocalkeyword('Fax');?>:</dt>
																	<dd><?php echo $resultUser[0]->sysu_fax; ?></dd>
																</dl>
															</div>
														</div>
													</div>
													<div class="col-md-6 tab-content123 pull-right" style="width: 48%;">
														<div class="row">
															<div class="col-md-12">
																<div class="caption caption-md" style="border-bottom: 1px solid #d0d0d0; padding-bottom: 5px; margin-bottom: 5px;">
																	<span class="caption-subject font-blue-madison uppercase"><?php getLocalkeyword('Address');?></span>
																</div>
															</div>
															<div class="col-md-12"> <?php echo $resultUser[0]->sysu_address; ?><br> <br>
							                                <?php echo $resultUser[0]->sysu_zipcode; ?> </div>
														</div>
													</div>
												</div>
											</div>
											<div id="package1" class="tab-pane fade in ">
												<div class="package_details" style="display: none;">
													
												</div>
												<div class="row" id="package_table" style="padding-left: 30px;">
													<div class="selected_rows1">
<!-- 														1/17 row(s) selected  
<!-- 														<a id="selectall3">select all</a> -->
													</div>
													<div class="portlet light">
														<div class="portlet-body">
															<table class="table table-hover table-checkable order-column" id="sample_2" style="width: 100% !important;">
																<thead>
																	<tr>
																		<th><?php getLocalkeyword('Sr.No');?></th>
																		<th><?php getLocalkeyword('Order Id');?></th>
																		<th><?php getLocalkeyword('Purchase Date');?></th>
																		<th><?php getLocalkeyword('Package Type');?></th>
																		<th><?php getLocalkeyword('Package Name');?></th>
																		<th><?php getLocalkeyword('Price');?></th>
																		<th><?php getLocalkeyword('Coupon Code');?></th>
																	</tr>
																</thead>
																<tbody>
							                                    <?php
																for($i=0;$i < count($resultOrderDetails);$i ++)
																{
																	
																	?>
							                                  		<tr class="odd gradeX">
																		<td><?php echo $i+1;?></td>
																		<td><?php echo $resultOrderDetails[$i]->ord_id_pk; ?> </td>
																		<td><?php echo $resultOrderDetails[$i]->ord_purchaseDate; ?></td>
																		<td><?php echo $resultOrderDetails[$i]->ord_packageType; ?></td>
																		<td>
																		<?php 
																		if($resultOrderDetails[$i]->ord_packageType=="New")
																		{
																		?>
																		<a onclick="getPackagedetails(<?php echo  $resultOrderDetails[$i]->ord_packageId_fk;?>,'<?php echo $resultOrderDetails[$i]->ord_packageType; ?>',<?php echo $id?>,'<?php echo $resultOrderDetails[$i]->pkg_name; ?>','<?php echo $resultOrderDetails[$i]->ord_id_pk;?>')"><?php echo $resultOrderDetails[$i]->pkg_name; ?></a>
																		<?php 
																          }
																          else 
																          {
																		?>
																		<a onclick="getPackagedetails(<?php echo  $resultOrderDetails[$i]->ord_packageId_fk;?>,'<?php echo $resultOrderDetails[$i]->ord_packageType; ?>',<?php echo $id?>,'<?php echo $resultOrderDetails[$i]->rpkg_packageName; ?>','<?php echo $resultOrderDetails[$i]->ord_id_pk;?>')"><?php echo $resultOrderDetails[$i]->rpkg_packageName; ?></a>
																		 <?php }?>
																		 </td>
																		<td><?php echo $resultOrderDetails[$i]->ord_paymentType; ?></td>
																		<td><?php echo $resultOrderDetails[$i]->ord_couponValue; ?></td>
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
											<div id="pricing" class="tab-pane fade row">
												<div class="col-md-5">
													<form role="form" method="post" action="<?php echo base_url();?>head/client_management/addNewOrder">
														<input type="hidden" value="<?php echo $id; ?>" name="clientidforpackages" id="clientidforpackages">
														<div class="form-body">
															<div class="form-group">
																<label class=""><?php getLocalkeyword('Package Type');?></label> <br> <select class="form-control" name="selPackageType" onchange="getPackages(this.value);" required="required">
																	<option value="">Select Package Type</option>
																	<option value="New">New Package</option>
																	<option value="Renewal">Recharge Package</option>
																</select>
															</div>
															<div class="form-group">
																<label class=""><?php getLocalkeyword('Package Name');?></label> <br> <select class="form-control" name="selPackageName" id="selPackageName" required="required">
																	<option value="">Select Package Name</option>
																</select>
															</div>
															<div class="form-group">
																<label class=""><?php getLocalkeyword('Payment Mode');?></label> <br> <select class="form-control" name="selPaymentMode" id="selPaymentMode" required="required">
																	<option value="cheque">Cheque</option>
																	<option value="cash">Cash</option>
																	<option value="online">online</option>
																</select>
															</div>
															<div class="form-group">
																<label class=""><?php getLocalkeyword('Payment Type');?></label> <br> <select class="form-control" name="selPaymentType" onchange="getpackagePrice(this.value)" id="selPaymentType" required="required">
																	<option value="">select</option>
																	<option value="full">Full</option>
																	<option value="partial">Partial</option>
																</select>
															</div>
															<div class="form-group">
																<label class=""><?php getLocalkeyword('Payment Value');?> .</label> <br> <input type="number" step="any" class="form-control" id="txtPaymentValue" name="txtPaymentValue" required="required">
															</div>
															<div class="form-group">
																<label class=""><?php getLocalkeyword('Cheque No./Note');?></label> <br> <input type="text" class="form-control" name="txtPaymentNote">
															</div>
															<div class="col-md-12">
																<div class="modal-footer">
																	<button type="submit" class="btn btn-primary" name="submit" id="submit"><?php getLocalkeyword('Save');?></button>
																	<button type="button" data-dismiss="modal" class="btn btn-danger"><?php getLocalkeyword('Cancel');?></button>
																</div>
															</div>
														</div>
													</div>
												</form>
												<script type="text/javascript">
												 function getpackagePrice(val)
												 {
												        if(val=="full")
												        {
												                
												                 $("#txtPaymentValue").val('0');
												                 $("#txtPaymentValue").attr("readonly","readonly");
												                 
												         }
												        else
												        {

												        	$("#txtPaymentValue").val();
											                 $("#txtPaymentValue").removeAttr("readonly");
													        } 
												 }
												</script>
												<div class="col-md-7 col-sm-6">
													<div class="portlet light portlet-fit bordered">
														<div class="portlet-body">
															<div class=" cd-horizontal-timeline  mt-timeline-horizontal">
																<div class="timeline">
																	<div class="events-wrapper">
																		<div class="events">
																			<ol>
																				<?php
																				for($i=0;$i < count($resultOrderDetails);$i ++)
																				{
																					$staus='';
																					if($i==0)
																					{
																						$staus="selected";
																					}
																			   ?>
																				<li>
																				<a href="#" onclick="getComment(<?php echo $resultOrderDetails[$i]->ord_id_pk;?>)" data-date="<?php echo  date("d/m/Y",strtotime($resultOrderDetails[$i]->ord_purchaseDate));?>" 
																				   class="border-after-red bg-after-red <?php echo $staus?>"><?php echo   date("d M",strtotime($resultOrderDetails[$i]->ord_purchaseDate));?>
																				</a></li>
																				<?php 
																				}
																				?>
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
																<div id="odDetails">
																<?php if(count($resultOrderDetails)>0)
																{	
																
																	
																	$resultOd=$this->db->query("SELECT sum(op_payment_value) as total FROM tblmvborderpayments WHERE op_order_id='".$resultOrderDetails[0]->ord_id_pk."'");
																	$resultOd=$resultOd->result();
																	
																	$resultUser=$this->db->query("SELECT  `sysmu_username` FROM `tblmvbsysmainusers` WHERE sysmu_id_pk='".$resultOrderDetails[0]->ord_createdBy."'");
																	$resultUser=$resultUser->result();
																  ?> 
																 
																 <p class="col-md-6"><?php getLocalkeyword('Price');?>:<?php echo $resultOrderDetails[0]->ord_discountPrice;?></p>
																 <p class="col-md-6"><?php getLocalkeyword('Paid Amount');?>:<?php echo $resultOd[0]->total;?></p>
																 <br>
																 <ul class="list-unstyled col-md-12">
																		<li>Payment Date <?php getLocalkeyword('Payment Date');?> :<?php echo $resultOrderDetails[0]->ord_purchaseDate;?></li>
																		<li>Payment Type <?php getLocalkeyword('Payment Type');?>: <?php echo $resultOrderDetails[0]->ord_paymentMode;?></li>
<!-- 																		<li>Cash/cheque :10000Rs</li> -->
																		<?php if(count($resultUser)>0)
																		{?>
																	 	<li> <?php getLocalkeyword('System User Name');?>: <?php echo $resultUser[0]->sysmu_username;?></li>
																       <?php 
																		}
																		else 
																		{
																       ?><li><?php getLocalkeyword('System User Name');?> : </li><?php }?>
																</ul>
																<?php 
																}
																?>
																</div>
																
															   <script type="text/javascript">
															   	function getComment(id)
															    {
															         
																     $.post("<?php echo base_url(); ?>head/client_management/getComment", {id:id}, function(data){
																     $("#odDetails").html(data);
																   
																     });
															     }
															     

															   </script>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div id="communicated_manage" class="tab-pane fade in ">
												
													<div class="row">
														<div class="col-md-4">
															<div class="form-group">
																<label>Communication Type</label> 
																<select class="form-control" id="msg_type" name="msg_type">
																	<option value="sms">SMS</option>
																	<option value="email">Email</option>
																</select>
															</div>
														</div>
														<div class="col-md-4">
															<label>&nbsp;</label>
															<div class="input-group  date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
																<input type="date" class="form-control" id="filter_date" name="filter_date" placeholder="dd-mm-yyyy"> <span class="input-group-btn">
																	<!-- <button class="btn default" type="button">
																		<i class="fa fa-calendar"></i>
																	</button> -->
																</span>
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<br>
																<?php  if(getAccessRights('mvbClOrdersubmit'))
													            {?>
																<button type="button" class="btn btn-primary" onclick="getCommnMgtDetails(<?php echo $id;?>);">Submit</button>
																<?php 
																}
																?>
																<button type="button" class="btn btn-danger">Cancel</button>
															</div>
														</div>
													</div>
												
												<div class="row">
													<div class="col-md-12" id="commn_mgt_data_div">
														
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
			<script src="<?php echo base_url()?>themes/assets/global/plugins/horizontal-timeline/horozontal-timeline.min.js" type="text/javascript"></script>
<?php
	
	}

	
	public function getPackagedetails()
	{
		
		$packageId=$this->input->post('id');
		$packageType=$this->input->post('type');
		$clientId=$this->input->post('client');
		$packageName=$this->input->post('name');
		$orderId=$this->input->post('order_id');
		
        if($packageType=="New")
        {	
	        $resultPackage=$this->db->query("SELECT clntp_id_pk,clntp_packId_fk,clntp_branch,clntp_clntId_fk,clntp_startDate,clntp_endDate,clntp_smsCredit,clntp_emailCredit,clntp_smsPrice,
	        	                             clntp_emailPrice,clntp_validity,clntp_smsTemplate,clntp_emailTemplate,clntp_smsBulk,clntp_emailBulk,clntp_customFields,
	        	                             clntp_visitorRecord,clntp_documentSize,clntp_moRegstr,clntp_userMgt,clntp_senderId,clntp_emailSupport,clntp_techlSupport,
	        	                             clntp_scheduleReport,clntp_mobileApp,clntp_addressLebeling,clntp_price,clntp_discount,clntp_tax,clntp_dealerAmount,
	        	                             clntp_salerAmount,clntp_dealerPayMethod,clntp_salerPayMethod,clntp_finalPrice,clntp_createdDate,clntp_createdBy
	        	                             FROM tblmvbclientpackage WHERE clntp_packId_fk='".$packageId."' AND clntp_clntId_fk='".$clientId."'
	        	                             AND clntp_orderId_fk='".$orderId."'");  
	        $resultPackage=$resultPackage->result();
	      ?>
				<a onclick="closProfileDiv();" class="close_section pull-right" title="Close" id="close1"> <i style="color: #a9a3a3; padding-top: 10px; margin-left: 7px; font-size: 35px;" class="fa fa-times fa-3x"></i></a>
				<div class="clearfix"></div>
				<dl class="dl-horizontal">
					<div class="col-md-4">
						<dt><?php getLocalkeyword('Package Type');?>:</dt>
						<dd><?php echo $packageType;?></dd>
						<dt><?php getLocalkeyword('SMS Credit');?>:</dt>
						<dd><?php echo $resultPackage[0]->clntp_smsCredit;?></dd>
						<dt><?php getLocalkeyword('Email Credit');?>:</dt>
						<dd><?php echo $resultPackage[0]->clntp_emailCredit;?></dd>
					</div>
					<div class="col-md-4">
						<dt><?php getLocalkeyword('Package Name');?>:</dt>
						<dd><?php echo $packageName;?></dd>
						<dt><?php getLocalkeyword('SMS Price Per Unit');?>:</dt>
						<dd><?php echo $resultPackage[0]->clntp_smsPrice;?> Rs.</dd>
						<dt><?php getLocalkeyword('Email Price Per Unit');?>:</dt>
						<dd><?php echo $resultPackage[0]->clntp_emailPrice;?> Rs.</dd>
					</div>
					<div class="col-md-4">
						<dt><?php getLocalkeyword('Validity');?>:</dt>
						<dd><?php echo $resultPackage[0]->clntp_validity;?> Month</dd>
						<dt><?php getLocalkeyword('Total Price');?>:</dt>
						<dd><?php echo $resultPackage[0]->clntp_smsPrice*$resultPackage[0]->clntp_smsCredit; ?> Rs.</dd>
						<dt><?php getLocalkeyword('Total Price');?>:</dt>
						<dd><?php echo $resultPackage[0]->clntp_emailPrice*$resultPackage[0]->clntp_emailCredit; ?></dd>
					</div>
				</dl>
				<div class="clearfix"></div>
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#tab5" aria-expanded="true"><?php getLocalkeyword('General Feature');?></a></li>
					<li class=""><a data-toggle="tab" href="#tab6" aria-expanded="false"><?php getLocalkeyword('Usability & Support');?></a></li>
					<li class=""><a data-toggle="tab" href="#tab7" aria-expanded="false"><?php getLocalkeyword('Tax & Pricing');?></a></li>
					<li class=""><a data-toggle="tab" href="#tab8" aria-expanded="false"><?php getLocalkeyword('Payout');?></a></li>
				</ul>
				<!-- Modal -->
				<!-- ends -->
				<div class="tab-content form-horizontal">
					<div id="tab5" class="tab-pane fade active in">
						<dl class="dl-horizontal col-md-4">
							<dt>Template SMS/Email<?php getLocalkeyword('Template SMS/Email');?>:</dt>
							<dd><?php echo $resultPackage[0]->clntp_smsTemplate;?>/<?php echo $resultPackage[0]->clntp_emailTemplate;?></dd>
							<dt><?php getLocalkeyword('Bulk SMS/Email');?>:</dt>
							<dd><?php echo $resultPackage[0]->clntp_smsBulk;?>/<?php echo $resultPackage[0]->clntp_emailBulk;?></dd>
							<dt><?php getLocalkeyword('Custom Field');?>:</dt>
							<dd><?php echo $resultPackage[0]->clntp_customFields;?></dd>
							<dt><?php getLocalkeyword('Visitor Records');?>:</dt>
							<dd><?php echo $resultPackage[0]->clntp_visitorRecord;?></dd>
							<dt><?php getLocalkeyword('Document Size');?>:</dt>
							<dd><?php echo $resultPackage[0]->clntp_documentSize;?>MB</dd>
							<dt><?php getLocalkeyword('Mo Registration');?>:</dt>
							<dd><?php echo $resultPackage[0]->clntp_moRegstr;?></dd>
							<dt><?php getLocalkeyword('Branch');?>:</dt>
							<dd><?php echo $resultPackage[0]->clntp_branch;?></dd>
							<dt><?php getLocalkeyword('User Management');?>:</dt>
							<dd><?php echo $resultPackage[0]->clntp_userMgt;?></dd>
							<dt><?php getLocalkeyword('Sender Id');?>:</dt>
							<dd><?php echo $resultPackage[0]->clntp_senderId;?></dd>
						</dl>
					</div>
	
					<div id="tab6" class="tab-pane fade">
						<div class="row">
							<dl class="dl-horizontal col-md-4">
								<dt><?php getLocalkeyword('Email Support');?>:</dt>
								<dd><?php  if($resultPackage[0]->clntp_emailSupport==1){ echo "Yes";}else{echo "No";};?></dd>
								<dt><?php getLocalkeyword('Telephonic Support');?>:</dt>
								<dd><?php  if($resultPackage[0]->clntp_techlSupport==1){ echo "Yes";}else{echo "No";};?></dd>
								<dt><?php getLocalkeyword('Schedule Support');?>:</dt>
								<dd><?php  if($resultPackage[0]->clntp_scheduleReport==1){ echo "Yes";}else{echo "No";};?></dd>
								<dt><?php getLocalkeyword('Mobile App');?>:</dt>
								<dd><?php  if($resultPackage[0]->clntp_mobileApp==1){ echo "Yes";}else{echo "No";};?></dd>
								<dt><?php getLocalkeyword('Address Labelling');?>:</dt>
								<dd><?php  if($resultPackage[0]->clntp_addressLebeling==1){ echo "Yes";}else{echo "No";};?></dd>
								<dt><?php getLocalkeyword('Service Name');?>:</dt>
								<dd></dd>
							</dl>
						</div>
					</div>
					<div id="tab7" class="tab-pane fade">
						<dl class="dl-horizontal col-md-4">
							<dt><?php getLocalkeyword('Tax');?>:</dt>
							<dd><?php echo $resultPackage[0]->clntp_tax;?></dd>
							<dt><?php getLocalkeyword('Pricing');?>:</dt>
							<dd><?php echo $resultPackage[0]->clntp_price;?></dd>
							<dt><?php getLocalkeyword('Default Discount');?>:</dt>
							<dd><?php echo $resultPackage[0]->clntp_discount;?></dd>
						</dl>
					</div>
					<div id="tab8" class="tab-pane fade">
						<dl class="dl-horizontal col-md-4">
							<dt><?php getLocalkeyword('Dealer');?>:</dt>
							<dd><?php  if($resultPackage[0]->clntp_dealerPayMethod==1){ echo ($resultPackage[0]->clntp_price*100)/$resultPackage[0]->clntp_dealerAmount;}else{echo $resultPackage[0]->clntp_dealerAmount;};?></dd>
							<dt>s<?php getLocalkeyword('Sales Executive');?>:</dt>
							<dd><?php  if($resultPackage[0]->clntp_salerPayMethod==1){ echo ($resultPackage[0]->clntp_price*100)/$resultPackage[0]->clntp_salerAmount;}else{echo $resultPackage[0]->clntp_salerAmount;};?></dd>
						</dl>
					</div>
				</div>
			<?php
         }
         else 
         {
         	
         	$resultPackage=$this->db->query("SELECT `cpr_id_pk`,cpr_clntId_fk, `cpr_ordId_fk`, `cpr_renewId_fk`, `cpr_smsCredit`, `cpr_smsPrice`, `cpr_emailCredit`, `cpr_emailPrice`,
         		                            `cpr_validity`, `cpr_tax`, `cpr_total`, `cpr_discount`, `cpr_finalPrice`, `cpr_dealerAmount`, `cpr_salerAmount`, `cpr_dealerPayMethod`, 
         		                            `cpr_salerPayMetnod`, `cpr_createdBy`, `cpr_createdDate` FROM `tblmvbclientrenewpackage`
         		                             WHERE cpr_renewId_fk='".$packageId."' AND cpr_ordId_fk='".$orderId."' AND cpr_clntId_fk='".$clientId."'");
         	$resultPackage=$resultPackage->result();
         	
         	
         	?>
         	<a onclick="closProfileDiv();" class="close_section pull-right" title="Close" id="close1"> <i style="color: #a9a3a3; padding-top: 10px; margin-left: 7px; font-size: 35px;" class="fa fa-times fa-3x"></i></a>
				<div class="clearfix"></div>
				<dl class="dl-horizontal">
					<div class="col-md-4">
						<dt>Package Type<?php getLocalkeyword('Package Type');?>:</dt>
						<dd><?php echo $packageType;?></dd>
						<dt><?php getLocalkeyword('SMS Credit');?>:</dt>
						<dd><?php echo $resultPackage[0]->cpr_smsCredit;?></dd>
						<dt><?php getLocalkeyword('Email Credit');?>:</dt>
						<dd><?php echo $resultPackage[0]->cpr_emailCredit;?></dd>
					</div>
					<div class="col-md-4">
						<dt><?php getLocalkeyword('Package Name');?>:</dt>
						<dd><?php echo $packageName;?></dd>
						<dt><?php getLocalkeyword('SMS Price Per Unit');?>:</dt>
						<dd><?php echo $resultPackage[0]->cpr_smsPrice;?> Rs.</dd>
						<dt><?php getLocalkeyword('Email Price Per Unit');?>:</dt>
						<dd><?php echo $resultPackage[0]->cpr_emailPrice;?> Rs.</dd>
					</div>
					<div class="col-md-4">
						<dt><?php getLocalkeyword('Validity');?>:</dt>
						<dd><?php echo $resultPackage[0]->cpr_validity;?> Month</dd>
						<dt><?php getLocalkeyword('Total Price');?>:</dt>
						<dd><?php echo $resultPackage[0]->cpr_smsPrice*$resultPackage[0]->cpr_smsCredit; ?> Rs.</dd>
						<dt><?php getLocalkeyword('Total Price');?>:</dt>
						<dd><?php echo $resultPackage[0]->cpr_emailPrice*$resultPackage[0]->cpr_emailCredit; ?></dd>
					</div>
				</dl>
				<div class="clearfix"></div>
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#tab7" aria-expanded="false" ><?php getLocalkeyword('Tax & Pricing');?></a></li>
					<li class=""><a data-toggle="tab" href="#tab8" aria-expanded="false"><?php getLocalkeyword('Payout');?></a></li>
				</ul>
				<!-- Modal -->
				<!-- ends -->
				<div class="tab-content form-horizontal">
					<div id="tab7" class="tab-pane fade active in">
						<dl class="dl-horizontal col-md-4">
							<dt><?php getLocalkeyword('Tax');?>:</dt>
							<dd><?php echo $resultPackage[0]->cpr_tax;?></dd>
							<dt><?php getLocalkeyword('Pricing');?>:</dt>
							<dd><?php echo $resultPackage[0]->cpr_total;?></dd>
							<dt><?php getLocalkeyword('Default Discount');?>:</dt>
							<dd><?php echo $resultPackage[0]->cpr_discount;?></dd>
						</dl>
					</div>
					<div id="tab8" class="tab-pane fade">
						<dl class="dl-horizontal col-md-4">
							<dt><?php getLocalkeyword('Dealer');?>:</dt>
							<dd><?php  if($resultPackage[0]->cpr_dealerPayMethod==1){ echo ($resultPackage[0]->cpr_price*100)/$resultPackage[0]->cpr_dealerAmount;}else{echo $resultPackage[0]->cpr_dealerAmount;};?></dd>
							<dt><?php getLocalkeyword('Sales Executive');?>:</dt>
							<dd><?php  if($resultPackage[0]->cpr_salerPayMetnod==1){ echo ($resultPackage[0]->cpr_price*100)/$resultPackage[0]->cpr_salerAmount;}else{echo $resultPackage[0]->cpr_salerAmount;};?></dd>
						</dl>
					</div>
				</div>
         	<?php          	
         }
	
	}
	
	public function getComment()
	{
		$orderId=$this->input->post('id');
		
		$resultOrderDetails=$this->db->query("SELECT `ord_id_pk`, `ord_packageType`, `ord_purchaseDate`, `ord_price`, `ord_couponId_fk`, `ord_couponValue`, `ord_createdBy`,
			                                  `ord_createdDate`, `ord_clntId_fk`, `ord_packageId_fk`, `ord_discountPrice`, `ord_paymentMode`, `ord_paymentType`,
			                                   `ord_paymentNote` FROM `tblmvborders` WHERE ord_id_pk='".$orderId."'");
		
		$resultOrderDetails=$resultOrderDetails->result();
		$resultOd=$this->db->query("SELECT sum(op_payment_value) as total FROM tblmvborderpayments WHERE op_order_id='$orderId'");
		$resultOd=$resultOd->result();
			
		$resultUser=$this->db->query("SELECT  `sysmu_username` FROM `tblmvbsysmainusers` WHERE sysmu_id_pk='".$resultOrderDetails[0]->ord_createdBy."'");
		$resultUser=$resultUser->result();
		?>
																		 
		 <p class="col-md-6"><?php getLocalkeyword('Price');?> :<?php echo $resultOrderDetails[0]->ord_discountPrice;?></p>
		 <p class="col-md-6"><?php getLocalkeyword('Paid Amount');?> :<?php echo $resultOd[0]->total;?></p>
		 <br>
		 <ul class="list-unstyled col-md-12">
				<li><?php getLocalkeyword('Payment Date');?>:<?php echo $resultOrderDetails[0]->ord_purchaseDate;?></li>
				<li><?php getLocalkeyword('Payment Type');?>: <?php echo $resultOrderDetails[0]->ord_paymentMode;?></li>
            <!-- <li>Cash/cheque :10000Rs</li> -->
				<li><?php getLocalkeyword('System User Name');?> : <?php echo $resultUser[0]->sysmu_username;?></li>
		</ul>

		
		<?php 
	}


	public function getCommnMgt()
	{
			$client_id=$_POST['clientId'];
			$msg_type=$_POST['msgType'];
			$filter_date=$_POST['filterDate'];

			$resultCommnMgt=$this->client_model->getCommnMgt($client_id,$msg_type,$filter_date);

	?>
					<!-- <ul class="nav navbar-nav ">
						<li class="dropdown dropdown-user"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"
							style="font-size: 14px; padding: 18px 5px;" aria-expanded="false"
						>Single SMS <i class="fa fa-angle-down"></i>
						</a>
							<ul class="dropdown-menu dropdown-menu-default">
								
								<li><a href="#">Bulk SMS </a></li>
								<li><a href="#">Festival SMS</a></li>
								<li><a href="#">Birthday SMS</a></li>
							</ul></li>
					</ul> -->
					<div class=" col-md-5 pd0 pull-right">
						<a class="margin_rgt  pull-right" data-toggle="modal" onclick="getOTP('<?php echo $client_id;?>','<?php echo $msg_type;?>');" data-target="#otp1">Export</a>
					</div>
					<div class="portlet light">
						<div class="portlet-body">
							<table class="table table-striped table-bordered table-hover table-checkable order-column dataTable allchekbox" id="sample_1_2_3" role="grid" aria-describedby="sample_1_2_3_info">
								<thead>
									<tr>
										<!-- <th>Type</th> -->
										<th>Campaign Name</th>
										<th>Sent On /Scheduling Date</th>
										<th>Delivery Status</th>
										<th>Delivery Date and Time</th>
										<th>Message Details</th>
									</tr>
								</thead>
								<tbody>
								<?php
								for($cm=0;$cm<count($resultCommnMgt);$cm++)
								{
								?>	
									<tr class="odd gradeX">
										<!-- <td>Single SMS</td> -->
										<td class="center"><?php echo $resultCommnMgt[$cm]->osl_campaign_name;?></td>
										<td><?php echo $resultCommnMgt[$cm]->osl_sent_schedule_on;?></td>
										<td><?php echo $resultCommnMgt[$cm]->osl_delivery_status;?></td>
										<td><?php echo $resultCommnMgt[$cm]->delivery_time;?></td>
										<td><?php echo $resultCommnMgt[$cm]->osl_message_details;?></td>
									</tr>
								<?php
								}
								?>	
								</tbody>
							</table>
						</div>
					</div>
	<?php		
	}



	public function exportOrderSendLogs()
	{
			$otp=$_POST['txtotp'];

			$msg_type=$_POST['hidden_msg_type'];

			$client_id=$_POST['client_id'];

			$filter_date=$_POST['hidden_filter_date'];

			if($filter_date!="")
			{
					$condition="and osl_sent_schedule_date='".$filter_date."'";	
			}	
			else
			{
					$condition="";
			}

			$admin_user_id=$this->session->userdata('admin_id');	

		    $result=$this->db->query("SELECT sysmu_otp FROM tblmvbsysmainusers WHERE sysmu_id_pk='".$admin_user_id."'");
			$row=$result->result();

			if($row[0]->sysmu_otp==$otp)
			{
				if($msg_type=='sms')
				{
							$result=$this->db->query("select * from tblmvbordersendlogs where osl_msg_type='sms' and osl_client_id_fk='".$client_id."' $condition");
							$row=$result->result();
		
							$contents='"Campaign Name","Sent on/Schedule Date","Delivery Status","Message Details"';
		
							$contents.="\n";

							for($i=0;$i < count($row);$i ++)
							{
								$contents.='"' . $row [$i]->osl_campaign_name. '","' .$row [$i]->osl_sent_schedule_date. '","'.$row [$i]->osl_delivery_status.'","'.$row [$i]->osl_message_details.'"';
								$contents.="\n";
							}

							setSAActivityLogs('Transaction_activity','Communication Mgt sms export');
							$contents=strip_tags($contents);
							
							// header to make force download the file
							Header("Content-Disposition: attachment; filename=cmmn_mgt_sms_export.csv");
							print $contents;
							exit;
				}
				else
				{
							$result=$this->db->query("select * from tblmvbordersendlogs where osl_msg_type='email' and osl_client_id_fk='".$client_id."' $condition");
							$row=$result->result();
		
							$contents='"Campaign Name","Sent on/Schedule Date","Delivery Status","Message Details"';
		
							$contents.="\n";

							for($i=0;$i < count($row);$i ++)
							{												
								$contents.='"' . $row [$i]->osl_campaign_name. '","' .$row [$i]->osl_sent_schedule_date. '","'.$row [$i]->osl_delivery_status.'","'.$row [$i]->osl_message_details.'"';
								$contents.="\n";
							}
							setSAActivityLogs('Transaction_activity','Communication Mgt email export');
							$contents=strip_tags($contents);
							
							// header to make force download the file
							Header("Content-Disposition: attachment; filename=cmmn_mgt_email_export.csv");
							print $contents;
							exit;
				}									
			}
	}


	public function orderSendSms()
	{
			$client_id=$_POST['sms_client_id'];

			$campaign_name=$_POST['txtsmscampaignname'];

			$description=$_POST['txtsmsdescription'];

			$random_number=rand(100000,999999);

			if(isset($_POST['sms_schedule']))
			{
					$schedule=date('Y-m-d',strtotime($_POST['sms_schedule_date_time']));

					$schedule='1';
			}
			else
			{
					$schedule=date('Y-m-d');
			}	


			$data=array('osl_client_id_fk'=>$client_id,
						'osl_campaign_name'=>$campaign_name,
						'osl_message_details'=>$description,
						'osl_sent_schedule_date'=>$schedule,						
						'osl_unique_identifier'=>$random_number,
						'osl_msg_type'=>'sms');

			$this->db->insert('tblmvbordersendlogs',$data);

			$insert_id=$this->db->insert_id();

			$client_mobile_no=$this->client_model->getClientMobileno($client_id);

			$sms_api_credentials=explode("~",getSmsApiCredentials());

			$gateway_username=$sms_api_credentials[0];

			$gateway_password=$sms_api_credentials[1];

			$client_senderid_details=getClientSenderidDetails();

			$xmlstring.='<user>
                            <name>'.$gateway_username.'</name>
                            <password>'.$gateway_password.'</password>
                            <from>'.$client_sender_id.'</from>
                            <to>'.$client_mobile_no.'</to>
                            <text>'.$description.'</text> 
                            <coding>0</coding>
                        </user>';

            $url = 'http://49.50.67.32/nxmlapi/xmlsmsapi.jsp';
               
                        $objURL = curl_init($url);
                        curl_setopt($objURL, CURLOPT_HTTPHEADER,"content-type: application/xml");
                        curl_setopt($objURL, CURLOPT_RETURNTRANSFER, 1); 
                        curl_setopt($objURL, CURLOPT_POST,1);
                        curl_setopt($objURL, CURLOPT_POSTFIELDS,$xmlstring);
                        $retval = trim(curl_exec($objURL));

                        curl_close($objURL);    
                        $xml = new SimpleXMLElement($retval);

            $sms_ack_id=$xml->ackid;            
                        
            foreach($xml->msgid as $msg_id)
            {
                       $explode_msg_id=explode(",",$msg_id);

                       $explode_parts_msgid=$explode_msg_id[0];
                       $explode_parts_mobno=$explode_msg_id[1];

					   $this->db->query("Update tblmvbordersendlogs set osl_delivery_status='delivered',osl_delivery_date_time='".date('Y-m-d H:i:s')."',osl_ack_id='".$sms_ack_id."',osl_msg_id='".$explode_parts_msgid."' where osl_id_pk='".$insert_id."'");
            }

            $this->session->set_userdata("success","SMS has been sent successfully.");

            redirect('head/client_management');
	}


	public function orderSendEmail()
	{
			$client_id=$_POST['email_client_id'];

			$campaign_name=$_POST['txtemailcampaignname'];

			$description=$_POST['txtemaildescription'];

			$random_number=rand(100000,999999);

			if(isset($_POST['email_schedule']))
			{
					$schedule=date('Y-m-d',strtotime($_POST['email_schedule_date_time']));

					$schedule_status='1';
			}
			else
			{
					$schedule=date('Y-m-d');
			}	


			$data=array('osl_client_id_fk'=>$client_id,
						'osl_campaign_name'=>$campaign_name,
						'osl_message_details'=>$description,
						'osl_sent_schedule_date'=>$schedule,
						'osl_schedule'=>$schedule_status,
						'osl_unique_identifier'=>$random_number,
						'osl_msg_type'=>'email');

			$this->db->insert('tblmvbordersendlogs',$data);

			$insert_id=$this->db->insert_id();

			$client_email=$this->client_model->getClientEmail($client_id);

			$final_email_sent=$this->sendMandrillEmail($client_email,$campaign_name,$description);

			$email_sent_status=$final_email_sent[0]->sent;

			$email_reject_reason=$final_email_sent[0]->reject_reason;

			$email_status_id=$final_email_sent[0]->_id;


			if($email_sent_status=="sent")
			{
					$delivered="delivered";
			}	


			$this->db->query("Update tblmvbordersendlogs set osl_delivery_status='".$delivered."',osl_delivery_date_time='".date('Y-m-d H:i:s')."',osl_schedule='".$schedule_status."',osl_email_status_id='".$email_status_id."',osl_reject_status='".$email_reject_reason."' where osl_id_pk='".$insert_id."'");

			$this->session->set_userdata("success","Email has been sent successfully.");

			redirect('head/client_management');	
	}



	public function sendMandrillEmail($customer_email,$subject,$description)
	{
				$from_email_id='';

				try 
                {
                    $mandrill = new Mandrill('iuRU9pFj9JXaKLwJuYM2Fw');//new : t57dyzbulLFY5_eOzDsHIA (tokri account)   
                    //old:eR7u9tMyZL6LWKiBXROv7w   (sandesh account)
                    $template_name = 'Sample template';
                    $template_content = array(array('name' => 'main',//the name of the mc:edit editable region to inject into. Required
                                                    'content' =>'Hi *|NAME|*, thanks for signing up. '//the content to inject. Required
                                                    ),
                    							array('name' => 'footer',//the name of the mc:edit editable region to inject into. Required
                                                    'content' =>'Copyright 2017'//the content to inject. Required
                                                    )
                                            );
                    $message = array(
                                    'html' => '<p>'.$description.'</p>',//send html template if template not available on mailchimp
                                    'text' => 'Example text content',//optional full text content to be sent
                                    'subject' => $subject,//the message subject
                                    'from_email' => $from_email_id,//the sender email address
                                    'from_name' => 'MVB',//optional from name to be used
                                    'to' => array(
                                                    array(
                                                        'email' => $customer_email,//the email address of the recipient. Required
                                                        //the optional display name to use for the recipient
                                                        'type' => 'to'//the header type to use for the recipient, defaults to "to" if not provided. oneof(to, cc, bcc)
                                                        )
                                                ),
                                    'headers' => array('Reply-To' => $from_email_id),//optional extra headers to add to the message (most headers are allowed)
                                    'important' => true,//whether or not this message is important, and should be delivered ahead of non-important messages
                                    'track_opens' => null,//whether or not to turn on open tracking for the message
                                    'track_clicks' => null,//whether or not to turn on click tracking for the message
                                    'auto_text' => null,//whether or not to automatically generate a text part for messages that are not given text
                                    'auto_html' => null,//whether or not to automatically generate an HTML part for messages that are not given HTML
                                    'inline_css' => null,//whether or not to automatically inline all CSS styles provided in the message HTML - only for HTML documents less than 256KB in size
                                    'url_strip_qs' => null,//whether or not to strip the query string from URLs when aggregating tracked URL data
                                    'preserve_recipients' => null,//whether or not to expose all recipients in to "To" header for each email
                                    'view_content_link' => null,//set to false to remove content logging for sensitive emails
                                    'bcc_address' => null,//an optional address to receive an exact copy of each recipient's email
                                    'tracking_domain' => null,//a custom domain to use for tracking opens and clicks instead of mandrillapp.com
                                    'signing_domain' => null,//a custom domain to use for SPF/DKIM signing instead of mandrill (for "via" or "on behalf of" in email clients)
                                    'return_path_domain' => null,//a custom domain to use for the messages's return-path
                                    'merge' => true,//whether to evaluate merge tags in the message. Will automatically be set to true if either merge_vars or global_merge_vars are provided.
                                    'merge_language' => 'mailchimp',//the merge tag language to use when evaluating merge tags, either mailchimp or handlebars. oneof(mailchimp, handlebars)
                                    'global_merge_vars' => array(
                                                                array(
                                                                    'name' => 'MOBILE_NO',//the name of the mc:edit editable region to inject into. Required
                                                                    'content' => ''//$result[0]->vis_mobile//the content to inject. Required
                                                                ),
                                                                array(
                                                                    'name' => 'EMAIL_VAR',//the name of the mc:edit editable region to inject into. Required
                                                                    'content' => ''//base_url().'user/activate/'.$user_id//the content to inject. Required
                                                                )
                                                            ),
                                    'merge_vars' => array(
                                                            array(
                                                                'rcpt' => $customer_email,//the email address of the recipient that the merge variables should apply to. required
                                                                'vars' => array(
                                                                    array(
                                                                        'name' => 'MOBILE_NO',//the name of the mc:edit editable region to inject into. Required
                                                                        'content' => ''//$result[0]->vis_mobile//the content to inject. Required
                                                                    ),
                                                                    array(
                                                                        'name' => 'EMAIL_VAR',//the name of the mc:edit editable region to inject into. Required
                                                                        'content' => ''//base_url().'user/activate/'.$user_id//the content to inject. Required
                                                                    ),
                                                                    array(
                                                                        'name' => 'NAME',//the name of the mc:edit editable region to inject into. Required
                                                                        'content' => ''//$result[0]->vis_firstName//the content to inject. Required
                                                                    )
                                                                )
                                                            )
                                                        ),
                                    'tags' => array('password-resets'),//a single tag - must not start with an underscore. required
                                    'subaccount' => 'mvb_visitors',//the unique id of a subaccount for this message - must already exist or will fail with an error
                                    'google_analytics_domains' => array(),//an array of strings indicating for which any matching URLs will automatically have Google Analytics parameters appended to their query string automatically.
                                    'google_analytics_campaign' => null,//optional string indicating the value to set for the utm_campaign tracking parameter. If this isn't provided the email's from address will be used instead.
                                    'metadata' => array(),//metadata an associative array of user metadata. Mandrill will store this metadata and make it available for retrieval. In addition, you can select up to 10 metadata fields to index and make searchable using the Mandrill search api.
                                    'recipient_metadata' => array(
                                        array(
                                            'rcpt' => $customer_email,//the email address of the recipient that the metadata is associated with
                                            'values' => array('user_id' => '')//an associated array containing the recipient's unique metadata. If a key exists in both the per-recipient metadata and the global metadata, the per-recipient metadata will be used.
                                        )
                                    ),
                                    'attachments' => array(
                            //            array(
                            //                'type' => 'text/plain',//the MIME type of the attachment
                            //                'name' => 'myfile.txt',//the file name of the attachment
                            //                'content' => 'ZXhhbXBsZSBmaWxl'
                            //            )
                                    ),
                                    'images' => array(
                            //            array(
                            //                'type' => 'image/png',
                            //                'name' => 'IMAGECID',
                            //                'content' => 'ZXhhbXBsZSBmaWxl'
                            //            )
                                    )
                                );
                    $async = false;//enable a background sending mode that is optimized for bulk sending. In async mode, messages/send will immediately return a status of "queued" for every recipient. To handle rejections when sending in async mode, set up a webhook for the 'reject' event. Defaults to false for messages with no more than 10 recipients; messages with more than 10 recipients are always sent asynchronously, regardless of the value of async.
                    $ip_pool = 'Main Pool';//the name of the dedicated ip pool that should be used to send the message. If you do not have any dedicated IPs, this parameter has no effect. If you specify a pool that does not exist, your default pool will be used instead.
                    $send_at = null;//when this message should be sent as a UTC timestamp in YYYY-MM-DD HH:MM:SS format. If you specify a time in the past, the message will be sent immediately. An additional fee applies for scheduled email, and this feature is only available to accounts with a positive balance.
                    $result = $mandrill->messages->send($message, $async, $ip_pool, $send_at);
                    
                    return $result;
                } 
                catch(Mandrill_Error $e) 
                {
                    // Mandrill errors are thrown as exceptions
                    echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
                    // A mandrill error occurred: Mandrill_Unknown_Subaccount - No subaccount exists with the id 'customer-123'
                    throw $e;
                }
	}


	public function getOTP()
	{
					$otp=  rand(1000, 9999);

					$admin_user_id=$this->session->userdata('admin_id');

					$result=$this->db->query("select sysu_mobile from tblmvbsystemusers where sysu_id_pk='".$admin_user_id."'");
					$row=$result->result();	

					$mobile_no=$this->encryption->decrypt($row[0]->sysu_mobile);

				    $sms_api_credentials=getSmsApiCredentials();

					$gateway_username=$sms_api_credentials[0]->username;

					$gateway_password=$sms_api_credentials[0]->password;

					$gateway_senderid=$sms_api_credentials[0]->var_sender;

				    $msg1 = "OTP(One Time Password) for export CSV  is ".$otp;

				    $xmlstring.='<user>
                                    <name>'.$gateway_username.'</name>
                                    <password>'.$gateway_password.'</password>
                                    <from>'.$gateway_senderid.'</from>
                                    <to>'.$mobile_no.'</to>
                                    <text>'.$msg1.'</text> 
                                    <coding>0</coding>
                                </user>';			    

					$url = 'http://49.50.67.32/nxmlapi/xmlsmsapi.jsp';
                       
                    $objURL = curl_init($url);
                    curl_setopt($objURL, CURLOPT_HTTPHEADER,"content-type: application/xml");
                    curl_setopt($objURL, CURLOPT_RETURNTRANSFER, 1); 
                    curl_setopt($objURL, CURLOPT_POST,1);
                    curl_setopt($objURL, CURLOPT_POSTFIELDS,$xmlstring);
                    $retval = trim(curl_exec($objURL));
                    curl_close($objURL);    
		            

                    $this->db->query("Update tblmvbsysmainusers set sysmu_otp='".$otp."' where sysmu_id_pk='".$admin_user_id."'");


                    //------------------------------ Start Save Transaction Logs ---------------------------//
			
					setSAActivityLogs('Transaction_activity','OTP_commn_mgt_for_export');

					//-------------------------------  End Save Transaction Logs ------------------------------//

					echo $otp;

	}
}