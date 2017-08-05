<?php
if (! defined('BASEPATH'))
	exit('No direct script access allowed');

class Branch extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->model('branch_model');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('pagination');
		
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
		
		setAActivityLogs('Transaction_activity','AABranch_View');
		$data ['resultBranch']=$this->branch_model->getAllBranch();
		$data ['resultCity']=$this->branch_model->getActivecity();
		$data['resultCredit']=$this->branch_model->getCreditdetails();
		$data ['include']='admin/branch/branch';
		$data ['admin_section']='manage_branch';
		$this->load->view('backend/container',$data);
	
	}
	
	
	
	//----Function used to select Branch---//
	public function selectBranch()
	{
		$this->Checklogin();
	
		$data ['resultBranch']=$this->branch_model->getAllBranch();
		
		$data ['admin_section']='manage_branch';
		$this->load->view('admin/branch/selectbranch',$data);
	
	}
	
	// ---Function used to add new Branch-//
	public function addBranch()
	{
	
		$this->Checklogin();
		if (isset($_POST ['btnSubmit']))
		{
				
			$data ['admin_section']='Branch';
			$id=$this->branch_model->addBranch();
			if ($id)
			{
				$this->session->set_flashdata('success','Branch has been added successfully.');
				redirect('admin/branch');
			} else
			{
				$this->session->set_flashdata('error','Unable to save branch.');
				redirect('admin/branch');
			}
		} else
		{
			redirect('admin/branch');
		}
	
	} 

	//--function to Edit branch--//

	public function editBranch()
	{
		$this->Checklogin();
		if (isset($_POST ['btnSubmit']))
		{
			$data ['admin_section']='Festival';
			$id=$this->branch_model->editBranch();
			if ($id)
			{
				$this->session->set_flashdata('success','Branch has been updated successfully.');
				redirect('admin/branch');
			} else
			{
				$this->session->set_flashdata('error','Unable to edit branch.');
				redirect('admin/branch');
			}
		} else
		{
			redirect('admin/branch');
		}
	
	}
	
	
	
	//---Function to get branch details--//
	
	public function getBranchdetails()
	{
		$this->Checklogin();
		$branchId=$this->input->post('id');
		
		$resultBranch=$this->branch_model->getBranchdetails($branchId);
		$resultCredit=$this->branch_model->getCreditdetails();
		$resultCity=$this->branch_model->getAllcity();
		?>
			<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h2 class="modal-title text-left">
						<i class="fa fa-plus"></i> <?php getLocalkeyword('Edit Branch');?>
						</h3>
				
				</div>
				<div class="modal-body">
					<div class="portlet-body form">
						<form role="form" id="frmEdit" action="<?php echo base_url()?>admin/branch/editBranch" method="post" >
							<div class="form-body">
								<div class="form-group">
									<label><?php getLocalkeyword('Branch Name');?></label> <input type="text" value="<?php echo $resultBranch[0]->brn_name;?>" name="txtBranch"  id="txtBranch" class="form-control input-sm" placeholder="Enter Branch Name" required="required">
								   <input type="hidden" name="txtBranchid" value="<?php echo $branchId;?>">
								</div>
								<div class="form-group">
									<label><?php getLocalkeyword('Address');?></label> <input type="text" name="txtAddress" id="txtAddress" value="<?php echo $resultBranch[0]->brn_address;?>" required="required" class="form-control input-sm" placeholder="Enter Address">
								</div>
								<div class="form-group">
									<label><?php getLocalkeyword('City');?> </label> 
								
									<select class="form-control input-sm" name="selCity" id="selCity" required="required">
									 <option value="">Select City</option>
									 <?php 
									   for($i=0;$i<count($resultCity);$i++)
									   {
									 ?>
									   <option value="<?php echo $resultCity[$i]->cty_id_pk;?>"
									     <?php if($resultBranch[0]->brn_cityId_fk==$resultCity[$i]->cty_id_pk){ echo "selected";}
									     if($resultBranch[0]->brn_status==0){ echo " disable";}
									     ?>><?php echo $resultCity[$i]->cty_name;?></option>
									 <?php 
									   }?>
									</select>
								</div>
								<div class="row">
									<div class="col-md-12">
										<label><?php getLocalkeyword('Add Credit');?> </label>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input type="text"   onblur="getsmseditCount(this.id);" value="<?php echo $resultBranch[0]->brn_smsCredit;?>" name="txtSmscredit" id="txtSmscredit" class="form-control input-sm" placeholder="Add SMS Credit " required="required">
										     <input type="hidden" name="txtoldSms" id="txtoldSms" value="<?php echo $resultBranch[0]->brn_smsCredit;?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input type="text"  onblur="getemaileditCount(this.id);"  value="<?php echo $resultBranch[0]->brn_emailCredit;?>"class="form-control input-sm" name="txtEmailcredit" id="txtEmailcredit" placeholder="Add Email Credit " required="required">
										    <input type="hidden" name="txtoldEmail" id="txtoldEmail" value="<?php echo $resultBranch[0]->brn_emailCredit;?>">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<p id="smsCount"><?php getLocalkeyword('Current Status');?>: <?php echo $resultCredit[0]->clnt_totalSmsCredit; ?> <?php getLocalkeyword('SMS available');?></p>
										<input type="hidden" id="txtsmsCount" value="<?php echo $resultCredit[0]->clnt_totalSmsCredit; ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<p id="emailCount"><?php getLocalkeyword('Current Status');?>: <?php echo $resultCredit[0]->clnt_totalEmailCredit; ?><?php getLocalkeyword('Email available');?></p>
									       <input type="hidden" id="txtemailCount" value="<?php echo $resultCredit[0]->clnt_totalEmailCredit; ?>">
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="submit" name="btnSubmit" class="btn btn-primary"><?php getLocalkeyword('Save');?></button>
									<button type="button" data-dismiss="modal" class="btn btn-danger"><?php getLocalkeyword('Cancel');?></button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<?php 
		
		
		
	}
	
	
	//---Function used to get refill sms--//
	public  function refillSMS()
	{
		
		$this->Checklogin();
		$branchId=$this->input->post('branchId');
		
		$resultBranch=$this->branch_model->getBranchdetails($branchId);
		$resultCredit=$this->branch_model->getCreditdetails();
		
		?><div class="modal-dialog">
			<div class="col-md-10">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h2 class="modal-title text-center">
							<i class="fa fa-envelope-o"></i> <?php getLocalkeyword('Refill SMS');?>
						</h2>
					</div>
					<div class="modal-body">
						<div class="portlet-body form">
							<form role="form" id="frmSms" action="<?php echo base_url()?>admin/branch/addRefillsms" method="post">
								<div class="form-body">
									<div class="row">
										<div class="col-md-12">
										    <p id="smsrefillCount"><?php getLocalkeyword('Current Status');?>: <?php echo $resultCredit[0]->clnt_totalSmsCredit; ?><?php getLocalkeyword('SMS available');?></p>
									    	<input type="hidden" id="txtsmsrefillCount" value="<?php echo $resultCredit[0]->clnt_totalSmsCredit; ?>">
											<input type="hidden" name="txtBranchid" value="<?php echo $branchId?>">
											<div class="form-group">
												<label><?php getLocalkeyword('Add SMS Credit');?><span class="mandatory"></span></label>
												 <input type="text" name="txtRefillsms" id="txtRefillsms" class="form-control" value="" required="required" onblur="getVerifyrefillsms()">
											</div>
											<div class="modal-footer">
												<button type="submit"  name="btnSubmit" class="btn btn-primary"><?php getLocalkeyword('Save');?></button>
												<button type="button" class="btn btn-danger "  data-dismiss="modal"><?php getLocalkeyword('Cancel');?></button>
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
      <?php 
		
		
	}
	
	
	
	
	
	
	// ---Function used to refill  sms to Branch-//
	public function addRefillsms()
	{
	
		$this->Checklogin();
		if (isset($_POST ['btnSubmit']))
		{
	
			$data ['admin_section']='Branch';
			$id=$this->branch_model->addRefillsms();
			if ($id)
			{
				$this->session->set_flashdata('success','SMS refilled successfully in branch.');
				redirect('admin/branch');
			} else
			{
				$this->session->set_flashdata('error','Unable to refill sms.');
				redirect('admin/branch');
			}
		} else
		{
			redirect('admin/branch');
		}
	
	}
	
	
	//---Function used to get refill email--//
	public  function refillEmail()
	{
	
		$this->Checklogin();
		$branchId=$this->input->post('branchId');
	
		$resultBranch=$this->branch_model->getBranchdetails($branchId);
		$resultCredit=$this->branch_model->getCreditdetails();
	
		?><div class="modal-dialog">
				<div class="col-md-10">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h2 class="modal-title text-center">
								<i class="fa fa-envelope-o"></i> <?php getLocalkeyword('Refill Email');?>
							</h2>
						</div>
						<div class="modal-body">
							<div class="portlet-body form">
								<form role="form" id="frmEmail" action="<?php echo base_url()?>admin/branch/addRefillemail" method="post">
									<div class="form-body">
										<div class="row">
											<div class="col-md-12">
											    <p id="emailrefillCount"><?php getLocalkeyword('Current Status');?>: <?php echo $resultCredit[0]->clnt_totalEmailCredit; ?><?php getLocalkeyword('Email available');?> </p>
										    	<input type="hidden" id="txtemailrefillCount" value="<?php echo $resultCredit[0]->clnt_totalEmailCredit; ?>">
												<input type="hidden" name="txtBranchid" value="<?php echo $branchId?>">
												<div class="form-group">
													<label><?php getLocalkeyword('Add Email Credit');?><span class="mandatory"></span></label>
													 <input type="text" name="txtRefillemail" id="txtRefillemail" class="form-control" value="" required="required" onblur="getVerifyrefillemail()">
												</div>
												<div class="modal-footer">
													<button type="submit"  name="btnSubmit" class="btn btn-primary"><?php getLocalkeyword('Save');?></button>
													<button type="button" class="btn btn-danger "  data-dismiss="modal"><?php getLocalkeyword('Cancel');?></button>
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
	      <?php 
			
			
		}
	
	
	
	// ---Function used to refill  email to Branch-//
	public function addRefillemail()
	{
	
		$this->Checklogin();
		if (isset($_POST ['btnSubmit']))
		{
	
			$data ['admin_section']='Branch';
			$id=$this->branch_model->addRefillemail();
			if ($id)
			{
				$this->session->set_flashdata('success','Email refilled successfully in branch.');
				redirect('admin/branch');
			} else
			{
				$this->session->set_flashdata('error','Unable to refill email.');
				redirect('admin/branch');
			}
		} else
		{
			redirect('admin/branch');
		}
	
	}
	
	// --functin used to deactivate/activate Branch--//
	public function getActivatebranch()
	{
		$this->Checklogin();
	
		$branchId=$this->input->post('branchId');
	
		if (count($branchId)>0)
		{
			    $a=$this->branch_model->getActivatebranch($branchId);
				$this->session->set_flashdata('success','Branch has been activated successfully');
	        
				$idlist=implode(",",$branchId);
				setAActivityLogs('Transaction_activity','AABranch_status',"Activated branch=".$idlist);
				
				echo true;
		}
	    else
		 {
				
			$this->session->set_flashdata('error','Something went wrong');
			echo true;
		}
		echo true;
	}
	
	// --functin used to checkMainbranch--//
	public function checkMainbranch()
	{
		$this->Checklogin();
	
		$branchId=$this->input->post('branchId');
	
		if (count($branchId)>0)
		{
			$a=$this->branch_model->getBranchdetails($branchId[0]);
	
            if($a[0]->brn_isChildBranch==0)
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
	
	
	// --functin used to checkMainbranch--//
	public function mergeBranch()
	{
		$this->Checklogin();
	
		$branchId=$this->input->post('branchId');
		$mainbranchId=$this->input->post('selectBranch');
	
		if ($mainbranchId !=0 && $branchId !=0 )
		{
			$a=$this->branch_model->mergeBranch($branchId,$mainbranchId);
			
			$this->session->set_flashdata('success','Branch has been successfully merged');
			echo true;
				
				
		}
		else
		{

			$this->session->set_flashdata('success','Something went wrong');
			echo true;
		}
	
	}
	
	
	//--Assign Branch--//
	public function assignBranch($id)
	{
		
		
		$datanew=array('admin_admin_id'=>$this->session->userdata('admin_admin_id'),
				       'admin_admin_name'=>$this->session->userdata('admin_admin_name'),
					   'admin_admin_email'=>$this->session->userdata('admin_admin_email'),
					   'admin_mobile'=>$this->session->userdata('admin_mobile'),
					   'parent_client'=>$this->session->userdata('parent_client'),
					   'branch_id'=>$id,
					   'client_id'=>$this->session->userdata('client_id'),
					   'admin_admin_user_type_id'=>$this->session->userdata('admin_admin_user_type_id'));
		$this->session->set_flashdata('message','You have successfully logged in');
		$data=array();
		$this->session->unset_userdata($data);
		
		$this->session->set_userdata($datanew);
		redirect('admin/dashboard');
		
	}
	
	
}

