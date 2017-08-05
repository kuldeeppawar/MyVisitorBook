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
		$data ['include']='admin/reminder_management/reminder_management';
		$data ['admin_section']='reminder_management';
		$this->load->view('backend/container',$data);
	}


	public function getAllCalendarData()
	{
			$result=$this->reminder_management_model->getAllReminders();

			return $result;	
	}


	public function setCalendarData()
	{
			$type=$_POST['hidden_reminder_type'];

			if($type=='basic_type')
			{
					$date=date('Y-m-d H:i:s');

					$mobile_no=$_POST['txtrecipientmobile'];

					$recipient_name=$_POST['txtrecipientname'];

					$report_to=$_POST['txtreportto'];

					$reminder_text=$_POST['txtremindertext'];

					$recipent_name=$_POST['recipent_name'];

					$start_date=$_POST['txtdate'];

					$non_english=$_POST['txtnonenglish'];


					if(isset($non_english))
					{
							$check_box_checked='1';
					}
					else
					{
							$check_box_checked='0';
					}

					$data=array('rem_branch_id_fk'=>'0','rem_reminder_text'=>$reminder_text,'rem_report_to'=>$report_to,'rem_recipent_name'=>$recipent_name,'rem_non_english'=>$check_box_checked,'rem_reminder_type'=>$type,'rem_createdDate'=>$date,'rem_createdBy'=>'0','rem_from_date'=>$start_date,'rem_to_date'=>$start_date);

					$this->db->insert('tblmvbreminder',$data);

					$last_id=$this->db->insert_id();

					return  $last_id; 
			}	
			else
			{

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

