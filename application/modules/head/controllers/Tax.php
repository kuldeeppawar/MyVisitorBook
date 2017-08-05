<?php
if (! defined('BASEPATH'))
	exit('No direct script access allowed');

class Tax extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->model('tax_model');
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
		if ($this->session->userdata('admin_email') == '')
		{
			redirect('head/');
		}
	
	}

	public function index()
	{
		
		$this->Checklogin();
		setSAActivityLogs('Transaction_activity','SATax_view');
		$data ['result']=$this->tax_model->getAlltax();
		$data ['include']='head/tax/tax';
		$data ['admin_section']='Manage Tax';
		$this->load->view('backend/container_sa',$data);
	
	}
	
	// ---Function used to add New Tax-//
	public function addTax()
	{
		if (isset($_POST ['btnSubmit']))
		{
			
			$this->Checklogin();
			$data ['admin_section']='Tax';
			$id=$this->tax_model->addTax();
			if ($id)
			{
				$this->session->set_flashdata('success','Tax has been added successfully.');
				redirect('head/tax');
			} else
			{
				$this->session->set_flashdata('error','Unable to save Tax.');
				$data ['include']='head/tax/tax';
				$data ['admin_section']='manage_tax';
				$this->load->view('backend/container_sa',$data);
			}
		} else
		{
			redirect('head/tax');
		}
	
	}
	
	// ---Function used to add new Festival-//
	public function editTax()
	{
		$this->Checklogin();
		if (isset($_POST ['btnSubmit']))
		{
			
		
			$data ['admin_section']='Tax';
			$id=$this->tax_model->editTax();
			if ($id)
			{
				$this->session->set_flashdata('success','Tax has been updated successfully.');
				redirect('head/tax');
			} else
			{
				$this->session->set_flashdata('error','Unable to edit Tax.');
				$data ['include']='head/tax/tax';
				$data ['admin_section']='manage_tax';
				$this->load->view('backend/container_sa',$data);
			}
		} else
		{
			redirect('head/tax');
		}
	
	}
	
	// --functin used to deactivate/activate city--//
	public function changetaxStatus()
	{
		
		$this->Checklogin();
		$status=$this->input->post('id');
		$tax=$this->input->post('tax');
		$idlist=implode(",",$tax);
		
		if ($status == 0 || $status == 1)
		{
			$a=$this->tax_model->changetaxStatus($status,$tax);
			
			if ($status == 0)
			{
				setSAActivityLogs('Transaction_activity','SATax_status',"Updates Status Deactivated :- ".$idlist);
				if(count($tax)>1)
				{
						$this->session->set_flashdata('success','Taxes has been deactivated successfully');
				}
				else
				{
						$this->session->set_flashdata('success','Tax has been deactivated successfully');
				}
				
			} else
			{
				setSAActivityLogs('Transaction_activity','SATax_status',"Updates Status Activated :- ".$idlist);

				if(count($tax)>1)
				{
						$this->session->set_flashdata('success','Taxes has been activated successfully');
				}
				else
				{
						$this->session->set_flashdata('success','Tax has been activated successfully');
				}
				
			}
			echo true;
		} else
		{
			
			$this->session->set_flashdata('error','Something went wrong');
			echo true;
		}
	
	}

}

