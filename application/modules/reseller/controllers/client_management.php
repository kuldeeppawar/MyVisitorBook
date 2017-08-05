<?php
if (! defined('BASEPATH'))
	exit('No direct script access allowed');

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
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('encryption');
		$this->form_validation->set_error_delimiters('<div class="error">','</div>');
	
	}
	
	// ==================== all page session check =====================
	public function Checklogin()
	{
		if ($this->session->userdata('reseller_email') == '')
		{
			redirect('reseller');
		}
	
	}

	public function index()
	{
		$data['resultClients']=$this->client_model->getAllClients();
		$data['include']='client_management/client_management';
		$data['admin_section']='manage_Client';
		$this->load->view('backend/container_r',$data);
	
	}

	public function getClientprofile()
	{
		$id=$this->input->post('userId');
		$resultUser=$this->client_model->getClientDetails($id);
		$resultmodifiedClients=$this->client_model->getAllClients();
		$resultOrderDetails=$this->client_model->getOrderDetails($id);
		?>
			<div id="otp1" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">×</button>
							<h4 class="modal-title text-center"><?php getLocalkeyword('Enter OTP Here');?></h4>
						</div>
						<div class="modal-body">
							<div class="col-md-2"></div>
							<div class="col-md-7 form-group">
								<div class="row">
									<div class="col-md-4">
										<label><?php getLocalkeyword('Enter OPT');?></label>
									</div>
									<div class="col-md-8">
										<input type="text" class="form-control input-sm">
									</div>
								</div>
							</div>
							<div class="col-md-2"></div>
							<a href="set_password.html">
								<button type="button" class="btn btn-primary"><?php getLocalkeyword('Submit');?></button>
							</a>
						</div>
						<div class="modal-footer"></div>
					</div>
				</div>
			</div>
			<div class="user_list_box">
				<div class="row">
					<div class="col-md-4">
						<div class="portlet light bordered">
							<div class="portlet-title">
								<div class="row">
									<div class="col-md-6 ">
										<ul class="nav navbar-nav ">
											<li class="dropdown dropdown-user"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"
												style="font-size: 14px; padding: 18px 5px;"
											>Recently updated <i class="fa fa-angle-down"></i> </span></a>
												<ul class="dropdown-menu dropdown-menu-default">
													<li><a href="#">All Contacts</a></li>
													<li><a href="#">My Contacts </a></li>
													<li><a href="#">Recently viewed</a></li>
													<li><a href="#">Not updated in 30 Days</a></li>
												</ul></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="portlet-body" style="overflow: auto;" id="test-list">
							
									<ul class="list-group All_list list">
							               <?php
												for($i=0;$i < count($resultmodifiedClients);$i ++)
												{
										   ?>
				                          <li class="list-group-item"><input type="checkbox" height="20" width="20" class="check_box2" name="chk<?php echo $i; ?>" id="chk<?php echo $i; ?>"/>
				                                       <?php echo $resultmodifiedClients[$i]->clnt_name; ?>
				                           </li>
							               <?php
												}
											?>
			                                </ul>
							
								<ul class="pagination pull-right"></ul>
							</div>
							
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
										<img src="<?php echo base_url(); ?>uploads/systemusers_images/<?php echo $resultUser[0]->sysu_profile; ?>" alt="" style="height: 100%; width: 100%;">
									</div>
								</div>
								<div class="col-md-7">
									<h3 style="margin-top: 3px;"margin-bottom:0px;><?php echo $resultUser[0]->sysu_name; ?></h3>
									<p style="color: #ababab;">
										Me at <a href="#"><?php echo $resultUser[0]->sysu_bussiness_name; ?></a> ( <a href="#"><?php echo $resultUser[0]->sysu_bussiness_category; ?></a> )
									</p>
									<p style="color: #ababab;"><?php echo $resultUser[0]->sysu_Info . "," . $resultUser[0]->sysu_addInfo; ?> </p>
									<div class="row pro_info">
										<ul class="list-inline">
											<li><i class="fa fa-envelope" aria-hidden="true"></i><?php
												$email=$resultUser[0]->sysu_email;
												$email=$this->encryption->decrypt($email);
												echo $email;
												?></li>
																		<li><i class="fa fa-mobile mob" aria-hidden="true"></i><?php
												$mobile=$resultUser[0]->sysu_mobile;
												$mobile=$this->encryption->decrypt($mobile);
												echo $mobile;
												?>
											</li>
											<li><i class="fa fa-phone" aria-hidden="true"></i><?php echo $resultUser[0]->sysu_landline_no; ?></li>
											<li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo $resultUser[0]->sysu_createdDate; ?></li>
											<li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo $resultUser[0]->sysu_modifiedDate; ?></li>
										</ul>
									</div>
								</div>
								<div class="col-md-3 pd0">
									<div class="btn-group pull-right">
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
											<li class="active"><a href="#gen_info" data-toggle="tab" id="info_general"><?php getLocalkeyword('Generat Info');?></a></li>
											<li><a href="#package1" data-toggle="tab" id="tab1"><?php getLocalkeyword('Package Details');?></a></li>
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
																	<span class="caption-subject font-blue-madison uppercase"><?php getLocalkeyword('Personal Info');?></span>
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
			        																<?php echo $resultUser[0]->sysu_zipcode; ?>
			        									   </div>
														</div>
													</div>
												</div>
											</div>
											<div id="package1" class="tab-pane fade in ">
												<div class="package_details" style="display: none;">
													
												</div>
												<div class="row" id="package_table" style="padding-left: 30px;">
													<div class="portlet light">
														<div class="portlet-body">
															<table class="table table-hover table-checkable order-column" id="sample_2" style="width: 100% !important;">
																<thead>
																	<tr>
																		<th><?php getLocalkeyword('Sr No.');?></th>
																		<th><?php getLocalkeyword('Order Id');?></th>
																		<th><?php getLocalkeyword('Purchase Date');?></th>
																		<th><?php getLocalkeyword('Package Type');?></th>
																		<th><?php getLocalkeyword('Package Name');?></th>
																	</tr>
																</thead>
																<tbody>
														        <?php
																for($i=0;$i < count($resultOrderDetails);$i ++)
																{
																	?>
			                                                            <tr class="odd gradeX">
																		<td><?php echo $i + 1; ?></td>
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
						</div>
					</div>
				</div>
			</div>
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
							<dd><?php echo $resultPackage[0]->clntp_validity;?> <?php getLocalkeyword('Month');?></dd>
							<dt><?php getLocalkeyword('Total Price');?>:</dt>
							<dd><?php echo $resultPackage[0]->clntp_smsPrice*$resultPackage[0]->clntp_smsCredit; ?><?php getLocalkeyword('Rs');?>.</dd>
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
								<dt><?php getLocalkeyword('Template SMS/Email');?>:</dt>
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
									<dt><?php getLocalkeyword('Telephonic Support');?> :</dt>
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
							<dt><?php getLocalkeyword('Package Type');?>:</dt>
							<dd><?php echo $packageType;?></dd>
							<dt><?php getLocalkeyword('SMS Credit');?>:</dt>
							<dd><?php echo $resultPackage[0]->cpr_smsCredit;?></dd>
							<dt><?php getLocalkeyword('Email Credit');?>:</dt>
							<dd><?php echo $resultPackage[0]->cpr_emailCredit;?></dd>
						</div>
						<div class="col-md-4">
							<dt><?php getLocalkeyword('Package Name');?>Package Name:</dt>
							<dd><?php echo $packageName;?></dd>
							<dt><?php getLocalkeyword('SMS Price Per Unit');?>SMS Price Per Unit:</dt>
							<dd><?php echo $resultPackage[0]->cpr_smsPrice;?> <?php getLocalkeyword('Rs');?>.</dd>
							<dt><?php getLocalkeyword('Email Price Per Unit');?>:</dt>
							<dd><?php echo $resultPackage[0]->cpr_emailPrice;?>  <?php getLocalkeyword('Rs');?>.</dd>
						</div>
						<div class="col-md-4">
							<dt><?php getLocalkeyword('Validity');?>:</dt>
							<dd><?php echo $resultPackage[0]->cpr_validity;?> <?php getLocalkeyword('Month');?></dd>
							<dt><?php getLocalkeyword('Total Price');?>:</dt>
							<dd><?php echo $resultPackage[0]->cpr_smsPrice*$resultPackage[0]->cpr_smsCredit; ?> <?php getLocalkeyword('Rs');?>.</dd>
							<dt><?php getLocalkeyword('Total Price');?>:</dt>
							<dd><?php echo $resultPackage[0]->cpr_emailPrice*$resultPackage[0]->cpr_emailCredit; ?></dd>
						</div>
					</dl>
					<div class="clearfix"></div>
					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#tab7" aria-expanded="false" ><?php getLocalkeyword('Tax & Pricing');?></a></li>
						<li class=""><a data-toggle="tab" href="#tab8" aria-expanded="false"><?php getLocalkeyword('Payout');?>Payout</a></li>
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
							</dl>
						</div>
					</div>
	         	<?php          	
	         }
		
		}	

}
