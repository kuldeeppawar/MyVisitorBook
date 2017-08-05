<?php

class Reseller extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('reseller_model');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('user_agent');
		$this->load->library('email');
		$this->load->library('encryption');
	
	}
	
	// --Function Used to Login for admin --//
	public function index()
	{
		if (isset($_POST['btnSubmit']))
		{
			$data=$this->reseller_model->checkLogin($this->input->post('txtUsername'),$this->input->post('txtPassword'));
			
			if ($data)
			{
				redirect('reseller/dashboard');
			} else
			{
				$this->session->set_flashdata('success','Invalid Credentials.');
				
				redirect(base_url()."reseller");
			}
		}
		
		$data['include']='reseller/login';
		$this->load->view('reseller/login',$data);
	
	}

	public function logOut()
	{
		setRSActivityLogs('Login_activity','Logout');
		$this->session->sess_destroy();
		$this->session->set_flashdata('success','You have logout Successfully');
		redirect('reseller/index');
	
	}

	public function forgot_password()
	{
		if (isset($_POST['submit']))
		{
			$email=$_POST['email'];
			$flag=0;
			$query_user=$this->db->query("SELECT * from tblmvbsysmainusers where  sysmu_userTypeId_fk=4");
			$array_user_id=$query_user->result();
			if (count($array_user_id) > 0)
			{
				for($i=0;$i < count($array_user_id);$i ++)
				{
					$message='';
					$email_id=$this->encryption->decrypt($array_user_id[$i]->sysmu_email);
					if ($email_id == $email)
					{
						
						$flag=1;
						$email_id=$this->encryption->decrypt($array_user_id[$i]->sysmu_email);
						$password=$this->encryption->decrypt($array_user_id[$i]->sysmu_password);
						// Send e-Mail to Employee....
						$subject="Forgot Password";
						$message.="Dear " . $array_user_id[$i]->sysmu_username . ",<br><br>";
						$message.="Your Login Information is as follow:<br>";
						$message.="User Name: " . $email_id . "<br>";
						$message.="Password: " . $password . "<br>";
						$message.="Thanks <br> For additional Information You can contact us.";
						$toEmail=$email_id;
						$this->sendEmail($toEmail,$subject,$message);
						$this->session->set_flashdata('success','Password has Mailed you Successfully');
						$data['include']='reseller/login';
						$this->load->view('reseller/login',$data);
					}
				}
				if ($flag == 1)
				{
					$this->session->set_flashdata('success','Password is sent On ' . $email);
					$data['include']='reseller/login';
					$this->load->view('reseller/login',$data);
				} else
				{
					$this->session->set_flashdata('success','No Entrys Found For' . $email);
					$data['include']='reseller/login';
					$this->load->view('reseller/login',$data);
				}
			} else
			{
				$this->session->set_flashdata('success','No Entrys Found For' . $email);
				$data['include']='reseller/login';
				$this->load->view('reseller/login',$data);
			}
		} else
		{
			$this->session->set_flashdata('success','Please Enter Valid Credentials');
			$data['include']='reseller/login';
			$this->load->view('reseller/login',$data);
		}
	
	}

	public function sendEmail($toEmail,$subject,$message)
	{
		$this->email->from('info@myvisitorbook.in','MyVisitorBook');
		$this->email->to($toEmail);
		$this->load->library('email');
		$this->email->set_mailtype("html");
		$this->email->subject($subject);
		$this->email->message($message);
		$this->email->send();
	
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

	public function check_email()
	{
		$email=$this->input->post('email');
		
		$query_user=$this->db->query("SELECT * from tblmvbsysmainusers where sysmu_email='" . $email . "'");
		$array_user_id=$query_user->result();
		
		if (count($array_user_id) > 0)
		{
			$result='true';
		} else
		{
			$result='false';
		}
		
		echo $result;
	
	}
	
	
	public function selectLanguage()
	{
		$adminId=$this->session->userdata('reseller_id');
		$language=$this->input->post('selLanguage');
	
		if($language!="")
		{
			$this->db->query("update tblmvbsysmainusers set sysmu_languageId_fk='".$language."' where sysmu_id_pk='".$adminId."'");
			setSAActivityLogs('Transaction_activity','userLanguage_change',"Language change User:-".$adminId." language".$language);
	
			$this->session->set_flashdata('success','Default Language Set');
				
		}

		redirect($this->agent->referrer());
	
	
	
	}

}
