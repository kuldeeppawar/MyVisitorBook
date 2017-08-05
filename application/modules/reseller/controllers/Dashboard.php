<?php

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('dashboard_model');
		$this->load->library('session');
	
	}
	
	public function checkLogin()
	{
		
		if($this->session->userdata('reseller_id')=="")
		{
			redirect('reseller/');
		}
	}

	public function index()
	{
		$this->checkLogin();
		$data['totalPackages']=$this->dashboard_model->getAllPackages();
		$data['totalRenewPackages']=$this->dashboard_model->getAllRenewPackages();
		$data['totalClients']=$this->dashboard_model->getAllclient();
		$data['totaltodayClients']=$this->dashboard_model->getTodayclient();
		$data['monthSms']=$this->dashboard_model->getMonthsms();
		$data['monthEmail']=$this->dashboard_model->getMonthemail();
		$data['include']='reseller/dashboard/dashboard';
		$this->load->view('backend/container_r',$data);
	
	}

	public function forgot_password()
	{
		$ret=$this->head_model->forgot_password();
		if ($ret)
			$this->session->set_flashdata('error_message','Password has been sent to your mailbox.');
		else
			$this->session->set_flashdata('error_message','Error sending mail. Please try again later.');
		
		redirect('reseller/');
	
	}

	public function setting()
	{
		if (isset($_POST['SUBMIT']))
		{
			$this->form_validation->set_error_delimiters('<div class="error">','</div>');
			
			$this->form_validation->set_rules('user','Username','trim|required|xss_clean');
			$this->form_validation->set_rules('email','Email id','trim|required|xss_clean|valid_email');
			
			if ($this->form_validation->run() != FALSE)
			{
				$user=$this->form_validation->xss_clean($this->input->post('user'));
				$email=$this->form_validation->xss_clean($this->input->post('email'));
				$this->head_model->update_setting($user,$email);
			}
		}
		
		$present_info=$this->head_model->admin_setting();
		$data['admin']=$present_info;
		$data['include']='siteadmin/dashboard/setting';
		$this->load->view('backend/container',$data);
	
	}

}
