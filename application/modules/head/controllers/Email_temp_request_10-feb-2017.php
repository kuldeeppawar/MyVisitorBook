<?php
if (! defined('BASEPATH'))
	exit('No direct script access allowed');

class Email_temp_request extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->model('email_temp_request_model');
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
			
			setSAActivityLogs('Transaction_activity','Email_temp_request_view');

		//-------------------------------  End Save Transaction Logs ------------------------------//
		
		$data ['result']=$this->email_temp_request_model->getAllEmailTemp();
		$data ['include']='head/email_temp_request/manage_email_temp_request';
		$data ['admin_section']='manage_email_temp_request';
		$this->load->view('backend/container_sa',$data);
	
	}
	
	// ---Function used to add new Faq-//
	public function setStatus()
	{		
		$this->Checklogin();

		$type=$_POST['type'];

		$email_temp_id=$_POST['emailtemp_id'];
		$comment=$_POST['comment_value'];
				
		$set_status=$this->email_temp_request_model->setStatus($type,$email_temp_id,$comment);

	}


	public function getTemplateContent()
	{
			$email_temp_id=$_POST['email_temp_id'];

			$email_temp_content=$this->email_temp_request_model->getTemplateContent($email_temp_id);

			echo $email_temp_content[0]->email_description;	
	}
		
}

