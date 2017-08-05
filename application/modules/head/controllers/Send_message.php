<?php
if (! defined('BASEPATH'))
	exit('No direct script access allowed');

class Send_message extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->model('send_message_model');
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
		if ($this->session->userdata('admin_email') == '')
		{
			redirect('head/');
		}
	
	}
	
	// --Load Client wise Message List--//
	public function index()
	{		

		$this->Checklogin();
		
		$data ['result']=$this->send_message_model->getAllSendMessage();
		$data ['clients']=$this->send_message_model->getAllClients();
		$data ['include']='head/send_message/send_message';
		$data ['admin_section']='send_message';
		$this->load->view('backend/container_sa',$data);
	}
	
	// ---Function used to add new Message-//
	public function sendMessage()
	{		
		$this->Checklogin();
		if (isset($_POST ['btnSubmit']))
		{	
			$data ['admin_section']='Send_message';
			$id=$this->send_message_model->addSendMessage();
			if ($id)
			{
				$this->session->set_flashdata('success','Message has been sent successfully.');
				redirect('head/send_message');
			} 
			else
			{
				$this->session->set_flashdata('error','Unable to sent message.');
				redirect('head/send_message');
			}
		} 
		else
		{
			redirect('head/send_message');
		}
	}
}

