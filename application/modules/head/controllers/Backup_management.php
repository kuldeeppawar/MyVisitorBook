<?php
if (! defined('BASEPATH'))
	exit('No direct script access allowed');

class Backup_management extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('backup_management_model');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->helper('file');
		$this->load->helper('download');
		$this->load->library('encryption');
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

	//-----function used to listing of user who has taken backup-----//
	public function index()
	{
		$this->Checklogin();
		// ---------------------------------- Start Save Transaction Logs ---------------------------//
		setSAActivityLogs('Transaction_activity','Backup_management_view');
		// ------------------------------- End Save Transaction Logs ------------------------------//
		$data['result']=$this->backup_management_model->getAllBackupDetails();
		$data['include']='head/backup_management/manage_backup_management';
		$data['admin_section']='manage_backup_management';
		$this->load->view('backend/container_sa',$data);
	
	}

	 public function getOTP()
	{
					$otp=  rand(1000, 9999);

					$admin_user_id=$this->session->userdata('admin_id');

					$result=$this->db->query("select sysu_mobile from tblmvbsystemusers where sysu_id_pk='".$admin_user_id."'");
					$row=$result->result();	

					$mobile_no=$row[0]->sysu_mobile;

				    $msg1 = urlencode("Hey! Welcome to Tokri.com. OTP(One Time Password) for export CSV  is ".$otp.".");
                     
                    //$url1 = "http://trans.kapsystem.com/api/v3/index.php?method=sms&api_key=A474c43f4d3174a71ae8a4e7978ddacea&to=".$global_mobile_no."&sender=ITOKRI&message=".$msg1."&format=php&custom=1,2&flash=0";

                    // $url1="";


                    // $c = curl_init(); 
                    // curl_setopt($c, CURLOPT_URL, $url1); 
                    // curl_setopt($c, CURLOPT_HEADER, 1); // get the header 
                    // curl_setopt($c, CURLOPT_NOBODY, 1); // and *only* get the header 
                    // curl_setopt($c, CURLOPT_RETURNTRANSFER, 1); // get the response as a string from curl_exec(), rather than echoing it 
                    // curl_setopt($c, CURLOPT_FRESH_CONNECT, 1); // don't use a cached version of the url 
                    // if (!curl_exec($c)) { return false; } 

                    // $httpcode = curl_getinfo($c, CURLINFO_HTTP_CODE); 
                    // curl_close($c);

                    
                    $this->db->query("Update tblmvbsysmainusers set sysmu_otp='".$otp."' where sysmu_id_pk='".$admin_user_id."'");


                    //------------------------------ Start Save Transaction Logs ---------------------------//
			
					setSAActivityLogs('Transaction_activity','OTP_sent_for_export');

				//-------------------------------  End Save Transaction Logs ------------------------------//

					echo $otp;

	} 

	public function verifyOTP()
	{
				$otp=$_POST['txtotp'];

				//print_r($_POST);

				$admin_user_id=$this->session->userdata('admin_id');

				$result=$this->db->query("SELECT sysmu_otp FROM tblmvbsysmainusers WHERE sysmu_id_pk='".$admin_user_id."'");
				$row=$result->result();


				//echo $row[0]->sysmu_otp.'=='.$otp;

				if($row[0]->sysmu_otp==$otp)
				{
						echo 'true';
				}
				else
				{
						echo 'false';
				}
	}

	//-----function used to download database from server-----//
	public function download_db()
	{
		$otp=$_POST['txtotp'];

		$admin_user_id=$this->session->userdata('admin_id');	

	    $result=$this->db->query("SELECT sysmu_otp FROM tblmvbsysmainusers WHERE sysmu_id_pk='".$admin_user_id."'");
		$row=$result->result();

		if($row[0]->sysmu_otp==$otp)
		{
				// ---------------------------------- Start Save Transaction Logs ---------------------------//
				setSAActivityLogs('Transaction_activity','Backup_management_download');
				// ------------------------------- End Save Transaction Logs ------------------------------//
				// Load the DB utility class
				 $this->load->dbutil();
				// Backup your entire database and assign it to a variable
				$backup=$this->dbutil->backup();
				$filename='db_backup_' . time();
				$this->backup_management_model->saveDbBackupLogs($filename);
				
		        force_download('db_backup_' . time() . '.zip',$backup);

		        //header("Location: head/backup_management");
		        //redirect('head/backup_management');
		}
	}

}

