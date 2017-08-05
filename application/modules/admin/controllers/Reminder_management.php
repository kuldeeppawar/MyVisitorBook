<?php
if (! defined('BASEPATH'))
	exit('No direct script access allowed');

class Reminder_management extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->model('reminder_management_model');
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
			redirect('/admin');
		}
	
	}

	public function index()
	{	
		$this->Checklogin();
		
		//$data ['result']=$this->reminder_management_model->getAllReminders();
		$data['custom_column']=$this->reminder_management_model->getCustomColumn();
		$data['sms_template']=$this->reminder_management_model->getSmsTemplate();
		$data['admin_report_to']=$this->reminder_management_model->getAdminReportTo();
		$data ['include']='admin/reminder_management/reminder_management';
		$data ['admin_section']='reminder_management';
		$this->load->view('backend/container',$data);
	}


	public function getAllCalendarData()
	{
			$result=$this->reminder_management_model->getAllReminders();

			return $result;	
	}


	public function setReminder()
	{
			$set_reminder_data=$this->reminder_management_model->setReminder();

			if($set_reminder_data>0)
			{
						$this->session->set_flashdata('success','Reminder has been added successfully.');
						redirect('admin/reminder_management');
			}
			else
			{
						$this->session->set_flashdata('error','Reminder has been added successfully.');
						redirect('admin/reminder_management');
			}
	}
		
	//--Function used to get confirm festival for branch--//
	
	
	public function verifyMobileNo()
	{
			$mobile_no=$_POST['txtrecipientmobile'];

			$result=$this->db->query("Select vis_id_pk,vis_firstName,vis_lastName From tblmvbvisitors where vis_mobile='".$mobile_no."'");
			$row=$result->result();

			if(count($row)>0)
			{
					echo 'true';
			}
			else
			{
					echo 'false';
			}
	}

	public function getRecipientName()
	{
			$mobile_no=$_POST['mobile'];

			$result=$this->db->query("Select vis_id_pk,vis_firstName,vis_lastName From tblmvbvisitors where vis_mobile='".$mobile_no."'");
			$row=$result->result();

			if(count($row)>0)
			{
					echo $row[0]->vis_firstName.' '.$row[0]->vis_lastName; 
			}
			else
			{
					echo '';
			}
	}

}

