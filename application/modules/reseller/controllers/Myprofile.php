
<?php

class Myprofile extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('myprofile_model');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('user_agent');
		$this->load->library('email');
		$this->load->library('encryption');
	
	}

	public function Checklogin()
	{
		if ($this->session->userdata('reseller_email') == '')
		{
			redirect('reseller/');
		}
	
	}
	
	// ---Function used to load view and data of users --//
	public function index()
	{
		$this->Checklogin();
		$id=$this->session->userdata('reseller_id');
		$result=$this->myprofile_model->getProfileDetailes($id);
		$email=$this->encryption->decrypt($result[0]->sysmu_email);
		$phone=$this->encryption->decrypt($result[0]->sysmu_mobile);
		$resultinfo=array('email'=>$email,
						  'mobile'=>$phone)

		;
		$data['resultProfile']=$result;
		$data['usercred']=$resultinfo;
		$data['include']='myprofile/myprofile';
		$data['admin_section']='manage_reseller_management';
		$this->load->view('backend/container_r',$data);
	
	}
	// function to save data from my profile
	public function save()
	{
		$this->Checklogin();
		$id=$this->session->userdata('reseller_id');
		$k=$this->myprofile_model->savedata();
		if ($k)
		{
			$this->session->set_flashdata("success","Profile has been Saved successfully.");
			
			redirect('myprofile');
		} else
		{
			redirect('myprofile');
		}
	
	}
	// function to set Password
	public function setpassword()
	{
		$this->Checklogin();
		$otp=$this->input->post("otp");
		$id=$this->session->userdata('reseller_id');
		$dbotp=$this->myprofile_model->getOtp($id);
		if ($otp == $dbotp)
		{
			$data['sys_id']=$id;
			$data['include']='myprofile/set_password';
			$data['admin_section']='manage_reseller_management';
			$this->load->view('backend/container_r',$data);
		} else
		{
			$this->session->set_flashdata('error','Enter Correct OTP');
			
			$id=$this->session->userdata('reseller_id');
			$result=$this->myprofile_model->getProfileDetailes($id);
			$email=$this->encryption->decrypt($result[0]->sysmu_email);
			$phone=$this->encryption->decrypt($result[0]->sysmu_mobile);
			$resultinfo=array(
							'email'=>$email,
							'mobile'=>$phone)

			;
			$data['resultProfile']=$result;
			$data['usercred']=$resultinfo;
			$data['include']='myprofile/myprofile';
			$data['admin_section']='manage_reseller_management';
			$this->load->view('backend/container_r',$data);
		}
	
	}

	public function changepassword()
	{
		$password=$this->input->post('password');
		$id=$this->input->post('userid');
		$k=$this->myprofile_model->updatePassword($id,$password);
		if ($k)
		{
			$this->session->set_flashdata('success','Password Changed Successfully');
			
			$id=$this->session->userdata('reseller_id');
			$result=$this->myprofile_model->getProfileDetailes($id);
			$email=$this->encryption->decrypt($result[0]->sysmu_email);
			$phone=$this->encryption->decrypt($result[0]->sysmu_mobile);
			$resultinfo=array(
							'email'=>$email,
							'mobile'=>$phone)

			;
			$data['resultProfile']=$result;
			$data['usercred']=$resultinfo;
			$data['include']='myprofile/myprofile';
			$data['admin_section']='manage_reseller_management';
			$this->load->view('backend/container_r',$data);
		} else
		{
			$this->session->set_flashdata('error','Password Change unsuccessfull');
			
			$id=$this->session->userdata('reseller_id');
			$result=$this->myprofile_model->getProfileDetailes($id);
			$email=$this->encryption->decrypt($result[0]->sysmu_email);
			$phone=$this->encryption->decrypt($result[0]->sysmu_mobile);
			$resultinfo=array(
							'email'=>$email,
							'mobile'=>$phone)

			;
			$data['resultProfile']=$result;
			$data['usercred']=$resultinfo;
			$data['include']='myprofile/myprofile';
			$data['admin_section']='manage_reseller_management';
			$this->load->view('backend/container_r',$data);
		}
	
	}
	
	// --Function Used To validate Email--//
	public function getValidateemail()
	{
		$this->Checklogin();
		$result=$this->user_management_model->getUserbyemail();
		echo $result;
	
	}

}
