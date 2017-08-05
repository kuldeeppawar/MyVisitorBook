<?php
if (! defined('BASEPATH'))
	exit('No direct script access allowed');

class Opt_request extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->model('opt_request_model');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('jwt-master/JWT');
		$this->load->library('encrypt');
		
		$this->form_validation->set_error_delimiters('<div class="error">','</div>');
	
	}
	
	// ==================== all page session check ===================== //
	public function Checklogin()
	{
		if ($this->session->userdata('admin_email') == '')
		{
			redirect('head/');
		}
	
	}
	
	// --Load FAQ--//
	public function index()
	{
		$this->Checklogin();
		// ---------------------------------- Start Save Transaction Logs ---------------------------//
		setSAActivityLogs('Transaction_activity','OPT_temp_request_view');
		// ------------------------------- End Save Transaction Logs ------------------------------//
		$data['result']=$this->opt_request_model->getAllOPTrequest();
		$data['include']='head/opt_request/manage_opt_request';
		$data['admin_section']='manage_opt_request';
		$this->load->view('backend/container_sa',$data);
	
	}
	
	// ---Function used to add new Faq-//
	public function setStatus()
	{
		$this->Checklogin();
		
		$type=$_POST['type'];
		
		$sms_temp_id=$_POST['smstemp_id'];
		$comment=$_POST['comment_value'];
		
		$set_status=$this->opt_request_model->setStatus($type,$sms_temp_id,$comment);

		if($type=='approved')
		{
			if(count($sms_temp_id)>1)
			{	
				    $this->session->set_flashdata('success','OPT requests has been approved successfully');
			}
			else
			{
					$this->session->set_flashdata('success','OPT request has been approved successfully');
			}
		}
		else
		{
			if(count($sms_temp_id)>1)
			{
				$this->session->set_flashdata('success','OPT requests has been rejected successfully');
			}
			else
			{
				$this->session->set_flashdata('success','OPT request has been rejected successfully');
			}
		}
	
	}

	public function getOPTName()
	{
		$opt_id=$_POST['opt_id'];
		$get_opt_name=$this->opt_request_model->getOPTName($opt_id);
		echo $get_opt_name[0]->optreq_opt_name . '~' . $get_opt_name[0]->optreq_id_pk;
	
	}

	public function editOPTName()
	{
		$edit_opt_name=$this->opt_request_model->editOPTName();

		$this->session->set_flashdata('success','OPT name has been updated successfully');

		redirect('head/Opt_request');
	}

}

