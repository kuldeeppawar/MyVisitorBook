<?php
if (! defined('BASEPATH'))
	exit('No direct script access allowed');

class Inbox extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->model('inbox_model');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('jwt-master/JWT');
		$this->load->library('encryption');
		
		$this->form_validation->set_error_delimiters('<div class="error">','</div>');
	
	}
	
	// ==================== all page session check ===================== //
	public function Checklogin()
	{
		if ($this->session->userdata('admin_admin_email') == '')
		{
			redirect('admin/');
		}
	
	}
	
	// --Load Client wise Message List--//
	public function index()
	{
		$this->Checklogin();
		
		$data ['result']=$this->inbox_model->getAllInboxMessage();
		$data ['include']='admin/inbox/inbox';
		$data ['admin_section']='inbox';
		$this->load->view('backend/container_sa',$data);
	}
}

