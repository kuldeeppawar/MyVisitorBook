<?php
if (! defined('BASEPATH'))
	exit('No direct script access allowed');

class Balanceremind extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->model('balanceremind_model');
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

	 //---Function Used to Load Mo registration page--//
	public function index()
	{
	
		$this->Checklogin();
		setAActivityLogs('Transaction_activity','AAddBalanceRemind_View');
		$data ['resultBalance']=$this->balanceremind_model->getClientreminder();
		$data ['include']='admin/balanceremind/remind';
		$data ['admin_section']='manage_balance';
		$this->load->view('backend/container',$data);
	
	}
	
	
	// ---Function used to add new Balance-//
	public function addBalance()
	{
	
		$this->Checklogin();
		if (isset($_POST ['btnSubmit']))
		{
	
			$data ['admin_section']='addBalance';
			$id=$this->balanceremind_model->addBalance();
			if ($id)
			{
				$this->session->set_flashdata('success','Balance reminder has been added successfully.');
				redirect('admin/balanceremind');
			} else
			{
				$this->session->set_flashdata('error','Unable to save balance reminder.');
				redirect('admin/balanceremind');
			}
		} else
		{
			redirect('admin/balanceremind');
		}
	
	}
	

}

