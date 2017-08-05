<?php
if (! defined('BASEPATH'))
	exit('No direct script access allowed');

class Faq extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->model('faq_model');
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
		
		$data ['result']=$this->faq_model->getAllFaq();
		$data ['include']='head/faq/faq';
		$data ['admin_section']='manage_festival';
		setSAActivityLogs('Transaction_activity','SAFaq_view');
		$this->load->view('backend/container_sa',$data);
	
	}
	
	// ---Function used to add new Faq-//
	public function addFaq()
	{
		
		$this->Checklogin();
		if (isset($_POST ['btnSubmit']))
		{
			
			
			$data ['admin_section']='Faq';
			$id=$this->faq_model->addFaq();
			if ($id)
			{
				$this->session->set_flashdata('success','Faq has been added successfully.');
				redirect('head/faq');
			} else
			{
				$this->session->set_flashdata('error','Unable to save faq.');
				redirect('head/faq');
			}
		} else
		{
			redirect('head/faq');
		}
	
	}
	
	// ---Function used to edit faq-//
	public function editFaq()
	{
		$this->Checklogin();
		if (isset($_POST ['btnSubmit']))
		{
			
			
			$data ['admin_section']='Festival';
			$id=$this->faq_model->editFaq();
			if ($id)
			{
				$this->session->set_flashdata('success','Faq has been updated successfully.');
				redirect('head/faq');
			} else
			{
				$this->session->set_flashdata('error','Unable to edit faq.');
				redirect('head/faq');
			}
		} else
		{
			redirect('head/faq');
		}
	
	}
	
	// --functin used to deactivate/activate faq--//
	public function changefaqStatus()
	{
		$this->Checklogin();
		$status=$this->input->post('id');
		$faqId=$this->input->post('faqId');
		
		$idlist=implode(",",$faqId);
		if ($status == 0 || $status == 1)
		{
			$a=$this->faq_model->changefaqStatus($status,$faqId);
			
			if ($status == 0)
			{
				setSAActivityLogs('Transaction_activity','SAFaq_status',"Updates Status Deactivated :- ".$idlist);

                                if(count($faqId)>1)
                                {
				         $this->session->set_flashdata('success','FAQs has been deactivated successfully');
                                }
                                else
                                {
                                         $this->session->set_flashdata('success','FAQ has been deactivated successfully'); 
                                }
			} else
			{
				setSAActivityLogs('Transaction_activity','SAFaq_status',"Updates Status Activated :- ".$idlist);
                           
                                if(count($faqId)>1)
                                {
				         $this->session->set_flashdata('success','FAQs has been activated successfully');
                                }
                                else
                                {
                                         $this->session->set_flashdata('success','FAQ has been activated successfully'); 
                                }
			}
			echo true;
		} else
		{
			
			$this->session->set_flashdata('error','Something went wrong');
			echo true;
		}
	
	}
	
	// --functin used to deactivate/activate faq--//
	public function getFaq()
	{
		
		$this->Checklogin();
		$faq=$this->input->post('faq');
		
		if ($faq > 0)
		{
			$a=$this->faq_model->getFaq($faq);
			
			$display ['question']=$a [0]->faq_question;
			$display ['description']=$a [0]->faq_description;
			
			echo json_encode($display);
		} else
		{
			
			echo false;
		}
	
	}

}

