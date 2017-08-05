<?php

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('dashboard_model');
		$this->load->library('session');
		$this->load->library('encryption');
	
	}

	public function index()
	{
		
		 $display=array('totalNewearning'=>$this->dashboard_model->getTotalnewearning(),
		 		        'totalrechargeearning'=>$this->dashboard_model->getTotalrechargeearning(),
		 		        'totalClients'=>$this->dashboard_model->getAllclient(),
		 		        'totalMonthclient'=>$this->dashboard_model->getMonthclient(),  
		 		        'totalRecharge'=>$this->dashboard_model->getTotalrecharge(),
		 		        'totalmonthRecharge'=>$this->dashboard_model->getTotalrecharmonth(),
		 		        'totalClientlogin'=>$this->dashboard_model->getTotalclientlogin(),
		 		        'totalDaysale'=>$this->dashboard_model->getTotaldaysale(),
		 		        'totalDayrecharge'=>$this->dashboard_model->getTotaldayrecharge(),
		 		        'totaltodayClients'=>$this->dashboard_model->getTodayclient(), 
		 		        'monthSms'=>$this->dashboard_model->getMonthsms(),
		 		        'monthEmail'=>$this->dashboard_model->getMonthemail(),
		 		        'smsSender'=>$this->dashboard_model->getSenderId(),
		 		        'emailTemplate'=>$this->dashboard_model->getEMailtemplate(),
		 		        'smsTemplate'=>$this->dashboard_model->getSmstemplate(),
		 		      
		               );

		$data['Info']=$display;
		
		$data ['include']='head/dashboard/dashboard';
		$this->load->view('backend/container_sa',$data);
		
		
	}

	public function forgot_password()
	{
		$ret=$this->head_model->forgot_password();
		if ($ret)
			$this->session->set_flashdata('error_message','Password has been sent to your mailbox.');
		else
			$this->session->set_flashdata('error_message','Error sending mail. Please try again later.');
		
		redirect('head/');
	
	}

	public function setting()
	{
		if (isset($_POST ['SUBMIT']))
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
		$data ['admin']=$present_info;
		$data ['include']='siteadmin/dashboard/setting';
		$this->load->view('backend/container',$data);
	
	}

}