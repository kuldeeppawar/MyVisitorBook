<?php
if (! defined('BASEPATH'))
	exit('No direct script access allowed');

class Senderid extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->model('senderid_model');
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

	 //---Function Used to Load Sender Id Listing  page--//
	public function index()
	{
		$this->Checklogin();
		setAActivityLogs('Transaction_activity','AAsenderid_view');
		$data ['resultId']=$this->senderid_model->getAllsenderid();
		$data ['include']='admin/senderid/senderid';
		$data ['admin_section']='manage_sender';
		$this->load->view('backend/container',$data);
	
	}
	
	
	// ---Function used to add new Senderid-//
	public function addSenderid()
	{
	
		$this->Checklogin();
		if (isset($_POST ['btnSubmit']))
		{
	
			$data ['admin_section']='addSenderid';
			$id=$this->senderid_model->addSenderid();
			if ($id)
			{
				$this->session->set_flashdata('success','Sender id has been added successfully.');
				redirect('admin/senderid');
			} else
			{
				$this->session->set_flashdata('error','Unable to save sender id.');
				redirect('admin/senderid');
			}
		} else
		{
			redirect('admin/senderid');
		}
	
	}
	
	// ---Function used to edit Mo-//
	public function editSenderid()
	{
	
		$this->Checklogin();
		if (isset($_POST ['btnSubmit']))
		{
	
			$data ['admin_section']='MO';
			$id=$this->senderid_model->editSenderid();
			if ($id)
			{
				$this->session->set_flashdata('success','Sender id has been updated successfully.');
				redirect('admin/senderid');
			} else
			{
				$this->session->set_flashdata('error','Unable to update sender id.');
				redirect('admin/senderid');
			}
		} else
		{
			redirect('admin/senderid');
		}
	
	}
	
	
	// --functin used to deactivate/activate Sender Id status--//
	public function changeIdstatus()
	{
		$this->Checklogin();
		$status=$this->input->post('id');
		$senderId=$this->input->post('senderId');
	
		$idlist=implode(",",$senderId);
		
		if ($status == 0 || $status == 1)
		{
			$a=$this->senderid_model->changeIdstatus($status,$senderId);
				
			if ($status == 0)
			{
				$this->session->set_flashdata('success','Sender id has been deactivated successfully');
				setAActivityLogs('Transaction_activity','AAsenderid_status','Id Deactivated List:-'.$idlist);
			} else
			{
				$this->session->set_flashdata('success','Sender id has been activated successfully');
				setAActivityLogs('Transaction_activity','AAsenderid_status','Id Activated List:-'.$idlist);
			}
			echo true;
		} else
		{
				
			$this->session->set_flashdata('error','Something went wrong');
			echo true;
		}
	
	}
	
			
	
			

	
	// --functin used to get Specific mobile No details-//
	public function getSpecificSenderid()
	{
	
		$senderId=$this->input->post('senderId');
	    $result=$this->senderid_model->getSpecificSenderid($senderId);
	    $this->Checklogin();
		if(count($result)>0)
		{ 
			 ?>
			  <div class="modal-dialog">
								<!-- Modal content-->
								<div class="col-md-10 col-md-offset-2 modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">×</button>
										<h2 class="modal-title text-left">
											<i class="fa fa-plus"></i><?php getLocalkeyword('Edit Sender Id');?> 
										</h2>
									</div>
									<div class="modal-body">
										<div class="portlet-body form">
											<form role="form" id="frmEdit" action="<?php echo base_url()?>admin/senderid/editSenderid" method="post">
												<div class="form-body">
													<div class="form-group">
														<label class=""><?php getLocalkeyword('Sender Id');?> </label><br>
														 <input type="text" name="txtSenderid" value="<?php echo $result[0]->sid_content;?>" class=" form-control" placeholder="" required="required">
														  <input type="hidden" name="txtId" value="<?php echo $result[0]->sid_id_pk;?>">
													</div>
													<div class="modal-footer">
														<button type="Submit" name="btnSubmit" class="btn btn-primary"><?php getLocalkeyword('Save');?></button>
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
		else 
		{?>
			 <span>Something Went Wrong........!</span>
			<?php 
		}	
		
		
	}
	

	// --functin used to deletesmsSign--//
	public function setDefaultid()
	{
		$this->Checklogin();
		$senderId=$this->input->post('senderId');
	
		if(count(senderId)>0)
		{
			$a=$this->senderid_model->setDefaultid($senderId);
				
			$this->session->set_flashdata('success','Sender id has been set to default successfully');
			setAActivityLogs('Transaction_activity','AAsenderid_Default','Set Default Id:-'.$senderId);
			echo true;
		}
		else
		{
			$this->session->set_flashdata('success','Something Went Wrong.......!');
			echo true;
		}
	
	
	
	
	}
	
}

