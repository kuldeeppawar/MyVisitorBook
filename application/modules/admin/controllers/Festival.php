<?php
if (! defined('BASEPATH'))
	exit('No direct script access allowed');

class Festival extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->model('festival_model');
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
		setAActivityLogs('Transaction_activity','AAfestival_view');
		$data ['resultFestival']=$this->festival_model->getAllFestival();
		$data ['include']='admin/festival/festival';
		$data ['admin_section']='manage_festival';
		$this->load->view('backend/container',$data);
	
	}
	
	
	//--Function used to get confirm festival for branch--//
	
	public function getConfirmfestival()
	{
	     $this->Checklogin();	
	    
	     $festival=$this->input->post('festival');
	     
	     if (count($festival)>0)
	     {
	     	$a=$this->festival_model->getConfirmfestival($festival);
	     		
	     	
	     		$this->session->set_flashdata('success','Festival confirmed successfully');
	     	
	     	echo true;
	     } else
	     {
	     		
	     	$this->session->set_flashdata('error','Something went wrong');
	     	echo true;
	     }
		
	}
	
	

}

