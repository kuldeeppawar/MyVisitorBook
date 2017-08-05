<?php
if (! defined('BASEPATH'))
	exit('No direct script access allowed');

class OPT_request extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->model('OPT_request_model');
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
			
			setSAActivityLogs('Transaction_activity','OPT_temp_request_view');

		//-------------------------------  End Save Transaction Logs ------------------------------//
		
		$data ['result']=$this->OPT_request_model->getAllOPTrequest();
		$data ['include']='head/OPT_request/manage_OPT_request';
		$data ['admin_section']='manage_OPT_request';
		$this->load->view('backend/container_sa',$data);
	
	}
	
	// ---Function used to add new Faq-//
	public function setStatus()
	{		
		$this->Checklogin();

		$type=$_POST['type'];

		$sms_temp_id=$_POST['smstemp_id'];
		$comment=$_POST['comment_value'];
				
		$set_status=$this->OPT_request_model->setStatus($type,$sms_temp_id,$comment);

	}


	public function getOPTName()
	{
			$opt_id=$_POST['opt_id'];

			$get_opt_name=$this->OPT_request_model->getOPTName($opt_id);

			echo $get_opt_name[0]->opt_name.'~'.$get_opt_name[0]->opt_id_pk;
	}


	public function editOPTName()
	{
			$edit_opt_name=$this->OPT_request_model->editOPTName();		


			redirect('head/OPT_request');
		
	}

}

