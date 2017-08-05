<?php
if (! defined('BASEPATH'))
	exit('No direct script access allowed');

class Sms_temp_request extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->model('sms_temp_request_model');
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
		
		setSAActivityLogs('Transaction_activity','SMS_temp_request_view');
		
		// ------------------------------- End Save Transaction Logs ------------------------------//
		
		$data['result']=$this->sms_temp_request_model->getAllSMSTemp();
		$data['include']='head/sms_temp_request/manage_sms_temp_request';
		$data['admin_section']='manage_sms_temp_request';
		$this->load->view('backend/container_sa',$data);
	
	}
	
	// ---Function used to add new Faq-//
	public function setStatus()
	{
		$this->Checklogin();
		$type=$_POST['type'];
		$sms_temp_id=$_POST['smstemp_id'];
		$comment=$_POST['comment_value'];
		
		$set_status=$this->sms_temp_request_model->setStatus($type,$sms_temp_id,$comment);

		if($type=='approved')
		{
			if(count($sms_temp_id)>1)
			{	
				    $this->session->set_flashdata('success','SMS template requests has been approved successfully');
			}
			else
			{
					$this->session->set_flashdata('success','SMS template request has been approved successfully');
			}
		}
		else
		{
			if(count($sms_temp_id)>1)
			{
					$this->session->set_flashdata('success','SMS template requests has been rejected successfully');
			}
			else
			{
					$this->session->set_flashdata('success','SMS template request has been rejected successfully');
			}
		}
	
	}

}

