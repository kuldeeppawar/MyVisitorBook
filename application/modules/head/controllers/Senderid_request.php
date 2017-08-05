<?php
if (! defined('BASEPATH'))
	exit('No direct script access allowed');

class Senderid_request extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->model('senderid_request_model');
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

		//---------------------------------- Start Save Transaction Logs ---------------------------//
			
			setSAActivityLogs('Transaction_activity','senderid_request_view');

		//-------------------------------  End Save Transaction Logs ------------------------------//
		
		$data ['result']=$this->senderid_request_model->getAllSenderidRequest();
		$data ['include']='head/senderid_request/manage_senderid_request';
		$data ['admin_section']='manage_senderid_request';
		$this->load->view('backend/container_sa',$data);
	
	}
	
	public function setStatus()
	{		
		$this->Checklogin();

		$type=$_POST['type'];

		$senderid_temp_id=$_POST['sendertemp_id'];
		$comment=$_POST['comment_value'];
				
		$set_status=$this->senderid_request_model->setStatus($type,$senderid_temp_id,$comment);

		if($type=='approved')
		{
			if(count($senderid_temp_id)>1)
			{	
				    $this->session->set_flashdata('success','Sender id requests has been approved successfully');
			}
			else
			{
					$this->session->set_flashdata('success','Sender id request has been approved successfully');
			}
		}
		else
		{
			if(count($senderid_temp_id)>1)
			{
				$this->session->set_flashdata('success','Sender id requests has been rejected successfully');
			}
			else
			{
				$this->session->set_flashdata('success','Sender id request has been rejected successfully');
			}
		}

	}


}

